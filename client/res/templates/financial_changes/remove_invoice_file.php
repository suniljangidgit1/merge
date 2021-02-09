<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];


//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

    $id=$_GET['id'];
    // echo $id;
    $sql1="select * from invoice_files where id='$id'";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $file=$row1['original_filename'];
    $inv_id=$row1['invoice_id'];

    $temp = explode('.', $file);
    $ext  = array_pop($temp);
    $name = implode('.', $temp);

    $sql4="select * from user where user_name='$user_name'";
    $result4=mysqli_query($conn,$sql4);
    $row4=mysqli_fetch_assoc($result4);
    $user=$row4['user_name'];

    $filepath=$row1['filepath'];

    @unlink($filepath);

    $sql2="delete from invoice_files where id='$id'";
    $result2=mysqli_query($conn,$sql2);
    
     include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
     $result = $s3->deleteObject(array(
        'Bucket' => 'fincrm',
        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$inv_id.'/'.$name.'.zip',
    ));

    if($result2)
    {
        echo "1";
    }
    else
    {
        echo "0";
    }


?>