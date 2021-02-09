<?php


session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$id=$_GET['id'];


$sql1="select * from lead where id='$id'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);

$sql2="select * from entity_email_address where entity_id='$id'" ;
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);

$email_id=$row2['email_address_id'];

$sql3="select * from email_address where id='$email_id'" ;
$result3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_assoc($result3);


$sql4="select * from entity_phone_number where entity_id='$id'" ;
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

$phone_id=$row4['phone_number_id'];

$sql5="select * from phone_number where id='$phone_id'" ;
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

   		
$account_invoice_arr[] = array("AccountName" => $row1['account_name'], "ContactPerson" => $row1['contactperson'], "Website" => $row1['website'], "street" => $row1['address_street'],"city"=>$row1['address_city'],"state"=>$row1['address_state'],"postal_code"=>$row1['address_postal_code'],"country"=>$row1['address_country'],"email"=>$row3['name'],"phone"=>$row5['name'],"lead_id"=>$id);

//encoding array to json format
echo json_encode($account_invoice_arr);
?>