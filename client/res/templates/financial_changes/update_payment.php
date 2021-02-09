<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
// $entity_name=$_SESSION['name'];
date_default_timezone_set('asia/kolkata');   


//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if(mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$invoiceno=$_REQUEST['invoiceno'];

$account_name=$_REQUEST['account_name'];
$payment_type=$_REQUEST['payment_type'];
$due_amount= $_REQUEST['due_amount'];

$sql15="select * from account where id='$account_name'";
$result15=mysqli_query($conn,$sql15);
$row15=mysqli_fetch_assoc($result15);

$payment_id=$_POST['recordId'];

$sql4="select * from invoice where invoiceno='$invoiceno'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$total_amount=$row4['total'];
$invoiceno=$row4['invoiceno'];


if($payment_type=='Against Invoice')
{
        $account_id=$row4['account_id'];
}
else if($payment_type=='On account payment')
{
        $account_id=$row15['id'];
}

$oldDate1= strtr($_REQUEST['payment_date'], '/', '-');
    $oldDate= strtotime($oldDate1);
    // $payment_date= date("Y-m-d", $oldDate);
    $payment_date= date("Y-m-d", $oldDate);


$sql6="select * from user where user_name='$user_name'";
$result6=mysqli_query($conn,$sql6);
$row6=mysqli_fetch_assoc($result6);

$created_by_id=$row6['id'];
// $date=date("Y-m-d");
$date=date("Y-m-d");

$payment_date_varchar=date("d M Y",strtotime($payment_date));
$invoice_date_varchar=date("d M Y",strtotime($payment_date));

if($payment_type=='Against Invoice')
{
$mode1=$_REQUEST['mode1'];
$transaction_id1=$_REQUEST['transaction_id1'];
$tds1=$_REQUEST['tds1'];
$net_amount1=$_REQUEST['net_amount1'];


        $sql_payment="update payments set invoiceno='$invoiceno',pdate='$payment_date',amountcredited='$net_amount1',mode='$mode1',transactionid='$transaction_id1',tds='$tds1',created_by_id='$created_by_id',paymentstatus='Success',createddate='$date',paymentdate='$payment_date_varchar',account_id='$account_id',paymenttype='$payment_type' where id='$payment_id'";


$result_payment=mysqli_query($conn,$sql_payment);


$lastid = mysqli_insert_id($conn); 


$received_amount=0;
$tds=0;
$sql5="select * from payments where invoiceno='$invoiceno'";
$result5=mysqli_query($conn,$sql5);
while($row5=mysqli_fetch_assoc($result5))
{
    $received_amount=$received_amount + $row5['amountcredited'];
    $tds=$tds + $row5['tds'];
}


$balance=$total_amount - $received_amount - $tds;
// $invoicedate1= date("Y-m-d");
$invoicedate1= date("d-m-Y");

function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);  
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
} 

// Function call to find date difference 
$dateDiff = dateDiffInDays($invoicedate1, $date); 

if(strtotime($date) == strtotime(date("Y-m-d")) && $balance==$total_amount)
{
    $paymentstatus="Due today";
}
else if($balance==0)
{
    $paymentstatus="Paid";
}
else if(strtotime($date) > strtotime(date("Y-m-d")) && $balance==$total_amount)
{
    $paymentstatus="Due in ".$dateDiff." days";
}
else  if(strtotime($date) < strtotime(date("Y-m-d")) && $balance==$total_amount)
{
    $paymentstatus="Over Due by ".$dateDiff." days";
}
else
{
    $paymentstatus="Partially paid";
}


$sql_invoice_update="update invoice set paymentstatus='$paymentstatus',payment_date='$invoice_date_varchar',paymentdate='$payment_date',balance='$due_amount' where invoiceno='$invoiceno'";

$result_invoice_update=mysqli_query($conn,$sql_invoice_update);


}
else if($payment_type=='On account payment')
{
        $sql_payment="update payments set pdate='$payment_date',amountcredited='$billed_amount',mode='$mode',transactionid='$transaction_id',balance='0',tds='$tds',created_by_id='$created_by_id',paymentstatus='Success',createddate='$date',paymentdate='$payment_date_varchar',account_id='$account_id',paymenttype='$payment_type' where id='$payment_id'";

       $result_payment=mysqli_query($conn,$sql_payment);
}

echo 1;
?>
