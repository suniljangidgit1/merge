<?php
// This file is used to fetch email id of to whom to send estimate mail
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$id=$_GET['dataId'];

$sql5="select * from estimate where id='$id'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$from_email = $row5['billingfromemail'];
$to_email = $row5['billingtoemail'];

$date_year = date("y")."-".(date("y")+1);

$email_subject = "Estimate - ".$date_year."/".$row5['invoice_number']." from ".$row5['billfromname']."";

echo json_encode(array("estimate_id" => $id, "email_id" => $to_email, "from_email" => $from_email, "mail_subject" => $email_subject));
?>