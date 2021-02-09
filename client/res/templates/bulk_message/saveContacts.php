<?php  error_reporting(0);

ini_set('max_execution_time', '0');
session_start();

//set timezone
date_default_timezone_set('UTC'); 

$userName= $_SESSION['Login'];
// set timezone
//date_default_timezone_set('asia/kolkata'); 

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$res= mysqli_query($conn, "SELECT id FROM user WHERE user_name='".$userName. "'");
$row=mysqli_fetch_array($res);

$userId			= 	$row['id'];
$createdBy 		= 	$userId;
$list_id 		=	$_POST['list_id'];

$upload_file    =   $_FILES['upload_file']['name'];
$copy_paste     =   $_POST['copy_paste'];
$crmEntityName  =   $_POST['crmEntityName'];
$individual     =   $_POST['individual'];
$user_name      =   $_POST['user_name'];
$user_email     =   $_POST['user_email'];

if(empty($upload_file) && empty($copy_paste) && empty($individual) && empty($crmEntityName) && empty($user_email))
{
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "OOP's! Please select/upload contacts.";
    echo json_encode($data);return;
}

$totalRecords   = 0;
$totalPhones    = 0;
$totalEmails    = 0;

// add induvidual
if(!empty($individual) || !empty($user_email)) {

    $totalRecords   = 1;
    $totalPhones    = 1;
    $totalEmails    = 1;

    $sql = "INSERT INTO contacts(list_id, phone, user_email, user_name ) VALUES ('$list_id','$individual','$user_email','$user_name')";     
}

// file upload throw excel
if($upload_file)
{

    include('parsecsv/parsecsv.lib.php');
    $csv = new parsecsv();
    $file = $_FILES['upload_file']['name'];

        $upload = 'uploads/';
        if(!file_exists($upload)){
            mkdir('uploads');
        }

         // Allow certain file formats
        $target_file   = $upload.$_FILES['upload_file']['name'];
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if( $imageFileType != 'csv' ) {
            $data["error"]  = "true";
            $data["status"] = "false";
            $data["msg"]    = "Please select .csv file. ";
            echo json_encode($data);return;
        }

        $allowed = array('.csv');
        $ext = substr($file, strpos($file, '.'), strlen($file)-1);

        if(!in_array($ext, $allowed)){
            $data['error'] = 'empty';
        }

        $file = str_replace(' ', '-', $file);
        $file = strtolower($file);
        //check for existance
        $date=date('Y-m-d H:i:s');
        if(move_uploaded_file($_FILES['upload_file']['tmp_name'], $upload.$file)){

            $new_file = $upload.$file;

            $csv->heading = false;
            $csv->auto($new_file);
            $all_contacts = array_slice($csv->data, 1);
            $count=count($all_contacts);

            $sql = "INSERT INTO contacts(list_id, phone, user_email, user_name ) VALUES ";
            $totalRecords = $count;

            for($i=0;$i<$count;$i++)
            {
                $user_name      =  $all_contacts[$i][0];
                $user_email     =  $all_contacts[$i][1];
                $user_phone     =  $all_contacts[$i][2];

                if(!empty($user_phone)) {
                    $totalPhones++;
                }

                if(!empty($user_email)) {
                    $totalEmails++;
                }

                if(!empty($user_email) || !empty($user_phone))
                {
                    $user_name  = removeColun($user_name);
                    $sql .= "('$list_id','$user_phone','$user_email','$user_name'),";
                    $user_phone ='';
                    $user_email = '';
                }
                
            }
        }

    $sql = rtrim($sql,',');

    // deleted uploaded files
    unlink($new_file);
}

// copy paste
if($copy_paste)
{
    $copy_paste = explode(',', $copy_paste);
    $nameCount = 0;
    $emailCount= 1;
    $phoneCount= 2;

    $sql = "INSERT INTO contacts(list_id, phone, user_email, user_name ) VALUES ";
    $copy_paste_count = count($copy_paste);

    $totalRecords = $copy_paste_count/3;
    $totalRecords = round($totalRecords);

    for($i=0;$i<$copy_paste_count;$i++)
    {
        if($copy_paste[$nameCount])
        {
            $user_name = $copy_paste[$nameCount];
            $nameCount = $nameCount + 3;
        }
        $i++;

        if($copy_paste[$emailCount])
        {
            $user_email = $copy_paste[$emailCount];
            $emailCount = $emailCount + 3;
        }
        $i++;

        if($copy_paste[$phoneCount])
        {
            $user_phone = $copy_paste[$phoneCount];
            $phoneCount = $phoneCount + 3;
        }

        if(!empty($user_phone)) {
            $totalPhones++;
        }

        if(!empty($user_email)) {
            $totalEmails++;
        }

        if(!empty($user_email) || !empty($user_phone))
        {
            $user_name  = removeColun($user_name);
            $sql .= "('$list_id','$user_phone','$user_email','$user_name'),"; 
            $user_phone ='';
            $user_email = '';
        }
        
    }
    //die;
    
    $sql = rtrim($sql,',');
}

//insert contacts throw crm entity
if($crmEntityName)
{
    ##identify name conversion
    $sql = "SHOW columns from ".$crmEntityName." where field='name'";
    $r=mysqli_num_rows(mysqli_query($conn,$sql));
    if ($r==0){
        $field_name = 'ntbl.first_name,ntbl.last_name';
    }else {
        $field_name = 'ntbl.name';
    }

    $sql = "SELECT  $field_name, ea.name as email, pn.numeric FROM phone_number pn INNER JOIN entity_phone_number epn ON pn.id = epn.phone_number_id INNER JOIN $crmEntityName ntbl ON ntbl.id = epn.entity_id INNER JOIN entity_email_address eea ON ntbl.id = eea.entity_id INNER JOIN email_address ea ON ea.id = eea.email_address_id WHERE epn.deleted = '0' AND pn.deleted = '0' AND ntbl.deleted = '0' AND eea.deleted = '0' AND ea.deleted = '0' ";

    $result = mysqli_query($conn, $sql);

    $sql = "INSERT INTO contacts(list_id, phone, user_email, user_name ) VALUES ";

    $crmCount = mysqli_num_rows($result);
    $totalRecords = $crmCount;
    if($crmCount > 0)
    {
        while ($row = mysqli_fetch_assoc($result)) {
            $user_name = $row['first_name'].' '.$row['last_name'].' '.$row['name'];
            $user_email = $row['email'];
            $user_phone = $row['numeric'];

            if(!empty($user_phone)) {
                    $totalPhones++;
            }

            if(!empty($user_email)) {
                $totalEmails++;
            }

            if(!empty($user_phone) || !empty($user_email)) {
              $user_name  = removeColun($user_name);
              $sql .= "('$list_id','$user_phone','$user_email','$user_name'),";
               $user_phone ='';
               $user_email = '';   
            }
        }
    }
    else
    {
        $data["error"]  = "true";
        $data["status"] = "false";
        $data["msg"]    = "Oops! No data available in our entity. ";
        echo json_encode($data);return;
    }

     $sql = rtrim($sql,',');
}

$result=mysqli_query($conn,$sql);
if(!$result){
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! Somthing went's wrong.";
    //$data["msg"]    = "Oops! Somthing went's wrong. ->".mysqli_error($conn);
    echo json_encode($data);return;
}

$sql="UPDATE contact_list SET totalcontacts='$totalPhones', total_emails='$totalEmails' WHERE id = '$list_id'";
$result=mysqli_query($conn,$sql);

$message = "
            <b>Total Records : ".$totalRecords."<br>
            Total Phone Number : ".$totalPhones."<br>
            Total Emails : ".$totalEmails."<br>
            List uploaded!</b>
";

if($result){
    $data["error"]  = "false";
    $data["status"] = "true";
    $data["msg"]    = $message;
    echo json_encode($data);return;
}else{
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! Something went wrong.";
    echo json_encode($data);return;
}


function getToken($length)
{
	$token = "";
	$codeAlphabet = "abcdefghijklmnopqrstuvwxyz1234567890";
	$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	$codeAlphabet.= "0123456789";
	$max = strlen($codeAlphabet); // edited
	for ($i=0; $i < $length; $i++) {
		$token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
	}
	return $token;
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 0) {
        return $min;
    }
    ## Not so random
    $log = log($range, 2);
    $bytes = (int) ($log / 8) + 1;
    ## Length in bytes
    $bits = (int) $log + 1;
    ## Length in bits
    $filter = (int) (1 << $bits) - 1;
    ## Set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter;
        ## Discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}

function removeColun($value){
    $value  = str_replace("'", " ", $value);
    $value  = stripslashes($value);
    $value  = trim($value);
    return $value;
}
?>