<?php
session_start();
// error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];
date_default_timezone_set('asia/kolkata');   


//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// echo '<pre>';print_r($_REQUEST);die;

$account_name = $_REQUEST['account_name'];
// $payment_type='Against Invoice';
$payment_type = $_REQUEST['record_payment_type'];
// $mode=$_REQUEST['mode_name'];
// $transaction_id=$_REQUEST['transaction_id1'];

$tds = $_REQUEST['payment_tds'];
// $net_amount=$_REQUEST['payment_net_amount1'];

$invoiceno = $_REQUEST['invoiceno'];
$invoicedate = $_REQUEST['invoicedate'];
$payment_invoice_amount = $_REQUEST['payment_invoice_amount'];
$payment_due_amount = $_REQUEST['payment_due_amount'];
$payment_tds = $_REQUEST['payment_tds'];
$payment_net_amount1 = $_REQUEST['payment_net_amount1'];
$mode_name = $_REQUEST['mode_name'];
$transaction_id1 = $_REQUEST['transaction_id1'];

$oldDate1 = strtr($_REQUEST['record_payment_date'], '/', '-');
$oldDate = strtotime($oldDate1);
$payment_date = date("Y-m-d", $oldDate);
$payment_date1 = date("d M Y", $oldDate);
$payment_due_amount = $_REQUEST['payment_due_amount'];
$date = date("Y-m-d");

$sql6 = "select * from user where user_name='$user_name'";
$result6 = mysqli_query($conn,$sql6);
$row6 = mysqli_fetch_assoc($result6);

$created_by_id = $row6['id'];

$sql15="select * from account where name='$account_name'";
$result15=mysqli_query($conn,$sql15);
$row15=mysqli_fetch_assoc($result15);
$account_id=$row15['id'];

$balance=  $payment_due_amount-$payment_tds;

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

$payment_id=getToken(17);

$sql4="select * from invoice where invoiceno='$invoiceno'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

$total_amount=$row4['total'];
$duedate=$row4['duedate'];

$invoicedate1= date("Y-m-d");

// Function call to find date difference 
$dateDiff = dateDiffInDays($invoicedate1, $duedate); 

if(strtotime($duedate) == strtotime(date("Y-m-d")) && $payment_due_amount==$total_amount)
{
    $paymentstatus="Due today";
}
else if($payment_due_amount==0)
{
    $paymentstatus="Fully paid";
}
else if(strtotime($duedate) > strtotime(date("Y-m-d")) && $payment_due_amount==$total_amount)
{
    $paymentstatus="Due in ".$dateDiff." days";
}
else  if(strtotime($duedate) < strtotime(date("Y-m-d")) && $payment_due_amount==$total_amount)
{
    $paymentstatus="Over Due by ".$dateDiff." days";
}
else
{
    $paymentstatus="Partially paid";
}

$sql_invoice_update="update invoice set paymentstatus='$paymentstatus',payment_date='$payment_date1',balance='$payment_due_amount' where invoiceno='$invoiceno'";

$result_invoice_update=mysqli_query($conn,$sql_invoice_update);

$sql_payment="insert into payments(name, amountcredited,tds,invoiceno,pdate,mode,transactionid,id,created_by_id,paymentstatus,createddate,paymentdate,account_id,paymenttype,balance,billedamount,account_name1)
 values
 ('$account_name','$payment_net_amount1','$payment_tds','$invoiceno','$payment_date','$mode_name','$transaction_id1','$payment_id','$created_by_id','Success','$date','$payment_date1','$account_id','$payment_type','$payment_due_amount','$payment_invoice_amount','$account_name')";
// echo $sql_payment;die;
$result_payment=mysqli_query($conn,$sql_payment);

// ==================== Code added for reports part starts here =============================
/*$account_id = $_REQUEST['pay_account_id'];
$billing_entity_id = $_REQUEST['pay_billing_entity_id'];

$get_report_rec = "select * from financial_reports where billing_entity_id = '$billing_entity_id' and account_id = '$account_id' ";
$result_get_finance=mysqli_query($conn,$get_report_rec);
$row_report=mysqli_fetch_assoc($result_get_finance);
if($row_report["credited_amount"]==0){
    $paid_amt = $payment_net_amount1;
}
else {
    $paid_amt = $row_report["credited_amount"] + $payment_net_amount1;
}

if($row_report["tds_amount"]==0){
    $tds_amt = $payment_tds;
}
else {
    $tds_amt = $row_report["tds_amount"] + $payment_tds;
}

$update_finance_report_entry = "update financial_reports set credited_amount = '$paid_amt', tds_amount = '$tds_amt' where billing_entity_id = '$billing_entity_id' and account_id = '$account_id' ";
$result_finance=mysqli_query($conn,$update_finance_report_entry);

$update_report_dates = "update financial_report_dates set payment_date = '$oldDate', payment_date_show = '$payment_date' where invoice_id = '$invoiceno' ";
$result_finance_dates=mysqli_query($conn,$update_report_dates);*/
// ==================== Code added for reports part ends here ==============================

function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);  
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
} 

echo json_encode(1);

?>