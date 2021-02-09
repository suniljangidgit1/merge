<?php session_start();
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
$list_id		=	getToken(17);
$list_name 		=	$_POST['list_name'];
$created_at		=	date("Y-m-d h:i:s ");
$modified_at	=	date("Y-m-d h:i:s ");

if(!$list_name){
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! List Name is required";
    echo json_encode($data);return;
}

$sql = "SELECT id from contact_list WHERE listname = '$list_name' AND deleted = '0'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! List Already exists";
    echo json_encode($data);return;
}


$sql="INSERT INTO contact_list(id,  created_at, modified_at,totalcontacts, listname,created_by_id, total_emails, assigned_user_id) VALUES ('$list_id','$created_at','$modified_at','0','$list_name','$userId','0','$userId')";
$result=mysqli_query($conn,$sql);

if($result){
    $data["error"]  	= "false";
    $data["status"] 	= "true";
    $data["msg"]    	= "Contact List Created!";
    $data["list_id"] 	= $list_id;
    $data["list_name"]	= $list_name;
    echo json_encode($data);return;
}else{
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! Contact List Already Created";
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
?>