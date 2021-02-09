<?php

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$payment_id=$_GET['id'];
//get invoice number
$sql1="select * from payments where id='$payment_id'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$invoiceno=$row1['invoiceno'];

//delete payment data
$sql2="delete from payments where id='$payment_id'";
$result2=mysqli_query($conn,$sql2);


$sql4="select * from invoice where invoiceno='$invoiceno'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

$total_amount=$row4['total'];
$duedate=$row4['duedate'];

$received_amount=0;
$tds=0;
$sql5="select * from payments where invoiceno='$invoiceno'" ;
$result5=mysqli_query($conn,$sql5);
while($row5=mysqli_fetch_assoc($result5))
{
    $received_amount=$received_amount + $row5['amountcredited'];
    $tds=$tds + $row5['tds'];
}


$balance=$total_amount - $received_amount - $tds;
$invoicedate1= date("Y-m-d");

function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);  
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
} 
// Function call to find date difference 
$dateDiff = dateDiffInDays($invoicedate1, $duedate); 

if(strtotime($duedate) == strtotime(date("Y-m-d")) && $balance==$total_amount)
{
    $paymentstatus="Due today";
}
else if($balance==0)
{
    $paymentstatus="Paid";
}
else if(strtotime($duedate) > strtotime(date("Y-m-d")) && $balance==$total_amount)
{
    $paymentstatus="Due in ".$dateDiff." days";
}
else  if(strtotime($duedate) < strtotime(date("Y-m-d")) && $balance==$total_amount)
{
    $paymentstatus="Over Due by ".$dateDiff." days";
}
else
{
    $paymentstatus="Partially paid";
}

$sql_invoice_update="update invoice set paymentstatus='$paymentstatus',balance='$balance' where invoiceno='$invoiceno'";

$result_invoice_update = mysqli_query($conn, $sql_invoice_update);

$project = explode('/', $_SERVER['REQUEST_URI'])[1];

if($result_invoice_update)
{
    $sql3="select * from payments";
    $result3=mysqli_query($conn,$sql3);
    $payment_num_rows = mysqli_num_rows($result3);

    echo json_encode(array("msg" => "Payment removed successfully!", "project_name" => $project, "payment_count" => $payment_num_rows));
}
else {
    return false;
}

/*echo "<script>
$.confirm({
        title: 'Success!',
        content: 'Payment Removed!',
       
            buttons: {
        Ok: function () {
                        window.location='http://".$_SERVER['SERVER_NAME']."/".$project."#Payments';

            }
        }
    });
</script>";*/

?>