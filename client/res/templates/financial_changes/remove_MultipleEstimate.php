
<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');;

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id=$_GET['idsRemoved'];
$entity=$_GET['entity'];

$sql1="select * from estimate_files where estimate_id='$id'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$file=$row1['original_filename'];
$estimate_id=$row1['estimate_id'];

    $temp = explode('.', $file);
    $ext  = array_pop($temp);
    $name = implode('.', $temp);

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$user=$row4['user_name'];

    if($entity=="Estimate")
    {
        foreach ($id as $key => $est_id) 
        {

            $sql12="select * from estimate_files where estimate_id='$est_id'";
            $result12=mysqli_query($conn,$sql12);
            while( $row12=mysqli_fetch_assoc($result12))
            {
                $file=$row12['original_filename'];
                $estimate_id=$row12['estimate_id'];

                $temp = explode('.', $file);
                $ext  = array_pop($temp);
                $name = implode('.', $temp);

                include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
                
                $result = $s3->deleteObject(array(
                    'Bucket' => 'fincrm',
                    'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$est_id.'/'.$name.'.zip',
                ));
                $sql2="delete from estimate_files where estimate_id='$est_id'";
                $result2=mysqli_query($conn,$sql2); 
            }
        }

    }
    else
    {
        foreach ($id as $key => $inv_id) 
        {

            $sql12="select * from invoice_files where invoice_id='$inv_id'";
            $result12=mysqli_query($conn,$sql12);
            while( $row12=mysqli_fetch_assoc($result12))
            {
                $file=$row12['original_filename'];
                $invoice_id=$row12['invoice_id'];

                $temp = explode('.', $file);
                $ext  = array_pop($temp);
                $name = implode('.', $temp);
                include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
                
                $result = $s3->deleteObject(array(
                    'Bucket' => 'fincrm',
                    'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$inv_id.'/'.$name.'.zip',
                ));

                $sql2="delete from invoice_files where invoice_id='$inv_id'";
                $result2=mysqli_query($conn,$sql2); 
            }
                

        }
    }

echo 1;
  
?>