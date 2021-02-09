<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$account_id = $_GET['id'];

$invoice_val = 0;
$balance = 0;
$sql1 = "select * from invoice where account_id='$account_id' and deleted=0";
$result1 = mysqli_query($conn,$sql1);
while($row1 = mysqli_fetch_assoc($result1))
{
	$invoice_val = $invoice_val + $row1['total'];
	$balance = $balance + $row1['balance'];
}

$received_amount_account = 0;
$received_amount = 0;
$tds = 0;
$sql2 = "select * from payments where account_id='$account_id' and deleted=0";
$result2 = mysqli_query($conn,$sql2);
while($row2 = mysqli_fetch_assoc($result2))
{
	if($row2['invoiceno']!='')
	{
    	$received_amount = $received_amount + $row2['amountcredited'];
    	$tds = $tds + $row2['tds'];
	}
	else
	{
		$received_amount_account = $received_amount_account + $row2['amountcredited'];
	}
}

if($invoice_val=='' || is_null($invoice_val))
{
	$invoice_val = 0;
}
    		
// $account_invoice_arr[] = array("invoice_val" => $invoice_val, "balance" => $balance, "received_amount" => $received_amount, "tds" => $tds,"received_amount_account"=>$received_amount_account);

$account_invoice_arr = array("invoice_val" => $invoice_val, "balance" => $balance, "received_amount" => $received_amount, "tds" => $tds,"received_amount_account"=>$received_amount_account);

//encoding array to json format
echo json_encode($account_invoice_arr);

?>