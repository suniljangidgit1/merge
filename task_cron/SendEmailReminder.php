<?php
include('/var/www/html/crm.fincrm.net/crm/task_cron/email_templates/EmailNotification.php');
//include($_SERVER['DOCUMENT_ROOT'].'/task_cron/email_templates/EmailNotification.php');
    use Aws\S3\S3Client;
    use Aws\Exception\AwsException;

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    
    $sendTo=null;
    $emailBody= null;
    $subject= null;
    $file_name=null;
    $email_cc=null;
    date_default_timezone_set('Asia/Calcutta'); 
    $DateTime = new DateTime();
    $currentDate= $DateTime->format('Y-m-d');
    $_SERVER['SERVER_NAME']="crm.fincrm.net";
    //get connection

    
    $filePath      ='/var/www/html/crm.fincrm.net/crm/data/config.php';
    //$filePath      = $_SERVER['DOCUMENT_ROOT'].'/data/config.php';
    include($filePath);
        
    $comm_sql  =    "SELECT * FROM email_reminder where send_email_date='".$currentDate."' AND send_email_time='".date("H:i")."' AND email_status='Active' AND deleted = '0' ";

    $result_e  =    mysqli_query($conn,$comm_sql);
    $num_rows  =    mysqli_num_rows($result_e);

    for($i=0; $i<$num_rows; $i++){

        if($num_rows>0){
            while($row_e = mysqli_fetch_assoc($result_e)) {
                
                $id=$row_e['id'];
                $sendTo= $row_e['email_to'];
                $emailBody= $row_e['email_body'];
                $subject= $row_e['subject'];
                $file_name= $row_e['file_name'];
                $email_cc= $row_e['email_cc'];
                $assigned_user_id= $row_e['assigned_user_id'];
                $send_email_date = $row_e['send_email_date'];
                $created_by_id = $row_e['created_by_id'];
                $send_email_date_time= $row_e['send_email_date_time'];
                $email_status = $row_e['email_status'];
                $created_at=$row_e['created_at'];
                $send_email_time= $row_e['send_email_time'];
                $subdomain_url  = $row_e['subdomain_url'];
                $userName=$row_e['user_name'];
                //$fileName=$row_e['file_name'];
                $file_path_extract = '';
                
                //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = ''; // secure transfer enabled REQUIRED for Gmail
                $mail->Host = SMTPHOST;
                $mail->Port = SMTPPORT; // or 587
                $mail->IsHTML(true);
                $mail->AllowEmpty = true;
                $mail->Username = USERNAME;
                $mail->Password = PASSWORD;
                $mail->SetFrom(FROMMAIL,FROMNAME);
                $mail->Subject = $subject;
                $mail->Body = $emailBody;
                $data=$sendTo;
                $splittedstring=explode(",",$data);
                
                foreach ($splittedstring as $key => $value) {
                    $mail->AddAddress($value);
                }
                
                //Adding Multiple attachment
                if( $file_name!='') {
                    // transfer file from s3 buckets to local
                    // include ('/var/www/html/efs-mount/'.$subdomain_url.'/crm/task_cron/S3Connect.php');
                    require '/var/www/html/crm.fincrm.net/crm/task_cron/vendor/autoload.php';
                    //require $_SERVER['DOCUMENT_ROOT'].'/task_cron/vendor/autoload.php';
                    $client = S3Client::factory(array(
                        'endpoint' => 'https://s3.us-west-1.wasabisys.com',
                        'profile' => 'wasabi',
                        'region' => 'us-west-1',
                        'version' => 'latest',
                        'use_path_style_endpoint' => true,
                        'credentials' => [
                            'key'    => "GI3UTP02EJ725OAN0YFG",
                            'secret' => "CKNVXvmLog113PJwrRU04oyISYmIPznDEwfz4k57",
                        ]
                    ));
                    // Where the files will be source from
                    $source = 'Production/'.$subdomain_url.'/email_reminder_files/'.$userName.'/'.$id.'/'.$file_name;

                    // Where the files will be transferred to
                    $dest = '/var/www/html/crm.fincrm.net/crm/client/res/templates/reminder/uploads/'.$file_name;
                    //$dest = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/reminder/uploads/';

                    // Create a transfer object
                    // $manager = new \Aws\S3\Transfer($s3, $source, $dest);

                    // //Perform the transfer synchronously
                    // $manager->transfer();

                    $result = $client->getObject(array(
                        'Bucket' => 'fincrm',
                        'Key'    => $source,
                        'SaveAs' => $dest,
                    ));

                    $file_path_extract = '/var/www/html/crm.fincrm.net/crm/client/res/templates/reminder/uploads/'.$file_name;
                    //$file_path_extract = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/reminder/uploads/'.$file_name;

                    $ExtractPath = '/var/www/html/crm.fincrm.net/crm/client/res/templates/reminder/uploads/'.$file_name.'1/';
                    //$ExtractPath = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/reminder/uploads/'.$file_name.'1/';
                    $ExtractFileName = '';

                    $zip = new ZipArchive;
                    $res = $zip->open($file_path_extract);
                    if ($res === TRUE) {
                        $zip->extractTo($ExtractPath);
                        for($i = 0; $i < $zip->numFiles; $i++) {
                            $ExtractFileName = $zip->getNameIndex($i);

                            $filePath = "/var/www/html/crm.fincrm.net/crm/client/res/templates/reminder/uploads/".$file_name.'1/'.$ExtractFileName;
                            //$filePath = $_SERVER['DOCUMENT_ROOT']."/client/res/templates/reminder/uploads/".$file_name.'1/'.$ExtractFileName;
                            $mail->AddAttachment($filePath);
                        }
                    $zip->close();
                    }
                    
                }
                // Adding Multiple CC
                if($email_cc)
                {
                    $dataForMultipleCC=$email_cc;
                    $splittedstringForMultipleCC=explode(",",$dataForMultipleCC);
                    foreach($splittedstringForMultipleCC as $keyForcc => $valueForcc){
                        $mail->AddCC($valueForcc);
                    }
                }
    
                if($mail->Send())
                {
                    $email_status = 'Sent';
                }
                else
                {
                    $email_status = 'Not-Delivered';
                    //echo "errors".$mail->ErrorInfo;
                }
                // delete extract directory
                if($file_name!=''){
                    deleteDir($ExtractPath);
                }
                //delete zip file
                if(file_exists($file_path_extract))
                {
                    unlink($file_path_extract);
                }

                //$recordId= getToken(17);

                $sql        =   "SELECT `host_name`, `db_name`, `password`, `user_name` FROM `host_record` WHERE `domain_url` = '".$subdomain_url."'";
                $result     =   mysqli_query($conn,$sql);   
                $row        =   mysqli_fetch_assoc($result);

                $servername     =   $row['host_name'];
                $username       =   $row['user_name'];
                $password       =   $row['password'];
                $dbname         =   $row['db_name'];

                // Create subdomain connection
                $new_conn = mysqli_connect($servername, $username, $password, $dbname);
                $sql = "insert into sent_email_reminder(id, email_to, email_cc, subject, email_body, send_email_date,email_status, created_at, created_by_id,send_email_time,assigned_user_id,send_email_date_time, file_name) values('$id','$sendTo','$email_cc','$subject','$emailBody','$send_email_date','$email_status', '$created_at', '$created_by_id', '$send_email_time', '$assigned_user_id', '$send_email_date_time', '$file_name')";
                save_email_reminder_in_fincrm($sql,$id,$new_conn);
                // mysqli_query($conn,$sql);
                $sql = "DELETE FROM email_reminder WHERE id='".$id."'";
                mysqli_query($conn,$sql);
                
                
                echo $email_status;
        }
    }
}

 function deleteDir($dirPath) {
    // if (! is_dir($dirPath)) {
    //     throw new InvalidArgumentException("$dirPath must be a directory");
    // }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            $this->deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
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
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}   

function save_email_reminder_in_fincrm($comm_db_sql,$delete_id,$new_conn){
    $result = mysqli_query($new_conn, $comm_db_sql);
     if (!$result) {
      echo("Error description: " . mysqli_error($new_conn));
    }

    $sql = "DELETE FROM email_reminder WHERE id='".$delete_id."'";
    mysqli_query($new_conn,$sql);
   
}           
?>
