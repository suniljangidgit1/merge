<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$account_name=base64_decode(urldecode($_GET['account_name']));


// echo $account_name."<br>";
// echo urldecode('We%27re%20proud%20to%20introduce%20the%20Amazing');
// echo urldecode($account_name);

$sql5="select * from account where name='$account_name'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$account_id=$row5['id'];


$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

$created_by_id=$row4['id'];
$is_admin=$row4['is_admin'];

if($is_admin=='1')
{
 	//fetching data for admin using account
	$sql1="select * from invoice where account_id='$account_id' and (balance > 0 or balance='' or balance IS NULL) and deleted=0";
	$result1=mysqli_query($conn,$sql1);
	while($row1=mysqli_fetch_assoc($result1))
	{		
		if($row1['balance'] > 0 ||  $row1['balance']=='' || $row1['balance'] =='NULL')
		{
		    $invoice_arr[] = array("id" => $row1['id'], "invoiceno" => $row1['invoiceno'], "invoicedate" => date("d-m-Y",strtotime($row1['invoicedate'])), "total" => $row1['total'], "balance" => $row1['balance']);
		}

	}
}
else
{
	//fetching data for user using account
	$sql1="select * from invoice where account_id='$account_id'  and (balance > 0 or balance='' or balance IS NULL) and deleted=0 ";
	$result1=mysqli_query($conn,$sql1);
	
	while($row1=mysqli_fetch_assoc($result1))
	{
 		if($row1['balance'] > 0 || $row1['balance']=='' || $row1['balance'] =='NULL')
 		{
		    $invoice_arr[] = array("id" => $row1['id'], "invoiceno" => $row1['invoiceno'], "invoicedate" => date("d-m-Y",strtotime($row1['invoicedate'])), "total" => $row1['total'], "balance" => $row1['balance']);
		}
	}
}

// encoding array to json format
echo json_encode($invoice_arr);

?>