<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

require($_SERVER['DOCUMENT_ROOT'].'/pdf/estimate.php');

$id = $_REQUEST['estimate_recordId'];

$sql5 = "select * from estimate where id='$id'";
$result5 = mysqli_query($conn,$sql5);
$row5 = mysqli_fetch_assoc($result5);

$to_email = $row5['billingtoemail'];


/*Array
(
    [estimate_recordId] => 4afxfcj8k70tbmdhj
    [estimate_to] => ayush@test.com
    [estimate_cc] => endaitsachin11@gmail.com
    [estimate_mail_body] => Hello sir,
Please check the estimate.
)*/

$to = $_REQUEST['estimate_to'];
$subject = $_REQUEST['estimate_subject'];

$message = $_REQUEST['estimate_mail_body'];

// $headers = "From:abc@somedomain.com \r\n";
/*$headers = "";
if($_REQUEST['estimate_cc']!=""){
	$headers .= "Cc:".$_REQUEST['estimate_cc']." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html\r\n";
}

$retval = mail($to,$subject,$message,$headers);

if($retval == true) {
	echo "1";
}else {
	echo "0";
}*/


$to = "100090@fincrm.net";
$subject = "This is subject";

$message = "<b>This is HTML message.</b>";
$message .= "<h1>This is headline.</h1>";

$header = "From:100090@fincrm.net \r\n";
// $header .= "Cc:100090@fincrm.net \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail($to,$subject,$message,$header);

if( $retval == true ) {
	echo "Message sent successfully...";
}else {
	echo "Message could not be sent...";
}
?>