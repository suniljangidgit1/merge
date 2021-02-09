<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$user=$row4['user_name'];

$invoice_id=$_GET['id'];
//delete invoice items
$sql1="select * from invoice_items where invoice_id='$invoice_id'";
$result1=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_assoc($result1))
{
    $id=$row1['id'];
    $sql2="delete from invoice_items where id='$id'";
    $result2=mysqli_query($conn,$sql2);
}

$sql4="select * from invoice where id='$invoice_id'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

$invoiceno = $row4['invoiceno'];
/*$sql5="select * from payments where invoiceno='$invoiceno'" ;
$result5=mysqli_query($conn,$sql5);
while($row5=mysqli_fetch_assoc($result5))
{
    $payment_id=$row5['id'];
    $sql6="update payments set invoiceno='',paymenttype='On account payment' where id='$payment_id'";
    $result6=mysqli_query($conn,$sql6);
}

$folder_path='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$invoice_id;

// $folder_path = "myGeeks"; 
   
// List of name of files inside 
// specified folder 
$files = glob($folder_path.'/*');  
   
// Deleting all the files in the list 
foreach($files as $file) { 
   
    if(is_file($file))  
    
        // Delete the given file 
        unlink($file);  
} 

rmdir($folder_path);

$sql22="select * from invoice_files where invoice_id='$invoice_id'";
$result22=mysqli_query($conn,$sql22);
while($row22=mysqli_fetch_assoc($result22))
{
    $id=$row22['id'];
    $file=$row22['original_filename'];
    $temp = explode('.', $file);
    $ext  = array_pop($temp);
    $name = implode('.', $temp);
    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
    
    $result = $s3->deleteObject(array(
        'Bucket' => 'fincrm',
        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$invoice_id.'/'.$name.'.zip',
    ));

  
    $sql21="delete from invoice_files where id='$id'";
    $result21=mysqli_query($conn,$sql21);

}*/

$sql = "select * from estimate where id = '$invoice_id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row["filename"]!="")
{
    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'.'wasabi_connect.php');

    $result = $client->deleteObject(array(
        'Bucket' => 'fincrm',
        'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$invoice_id.'/'.$row["filename"],
    ));

    $result = $client->deleteObject(array(
        'Bucket' => 'fincrm',
        'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$invoice_id,
    ));
}

//delete invoice
$sql3="delete from invoice where id='$invoice_id'";
$result3=mysqli_query($conn,$sql3);

$project = explode('/', $_SERVER['REQUEST_URI'])[1];

if($result3)
{
    $sql3="select * from invoice";
    $result3=mysqli_query($conn,$sql3);
    $estimate_num_rows = mysqli_num_rows($result3);

    // echo json_encode(array("msg" => "Estimate removed successfully!", "project_name" => $project));
    // $data["msg"] = 'Estimate removed successfully!';
    // $data["project_name"] = $project;
    echo json_encode(array("msg" => "Invoice removed successfully!", "project_name" => $project, "invoice_count" => $estimate_num_rows));
}
else {
    return false;
}

/*echo "<script>
$.confirm({
        title: 'Success!',
        content: 'Invoice Removed!',
       
            buttons: {
        Ok: function () {
            window.location='http://".$_SERVER['SERVER_NAME']."/".$project."#Invoice';
            }
        }
    });
</script>";*/

?>