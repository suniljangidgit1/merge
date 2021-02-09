<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_name=$_SESSION['name'];

include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');;

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id=$_GET['idsRemoved'];
$entity=$_GET['entity'];
// print_r($id);die;
$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$user=$row4['user_name'];

if($entity=="Estimate"||$entity=="Invoice"||$entity=="EmailReminder" || $entity == "SMSReminder")
{
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

                include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
                
                $result = $client->deleteObject(array(
                    'Bucket' => 'fincrm',
                    'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$est_id.'/'.$name.'.zip',
                ));
                $sql2="delete from estimate_files where estimate_id='$est_id'";
                $result2=mysqli_query($conn,$sql2); 

            }
        }

    }else if( $entity=="EmailReminder" ) {

        //DATABASE OPERATIONS
        include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/databaseOperations.php');
        foreach ($id as $key => $er_id) {
        // echo "<pre>".$er_id; die;

            $sql12      =    "select * from email_reminder where id='$er_id'";
            $result12   =   mysqli_query($conn,$sql12);
            while( $row12 = mysqli_fetch_assoc($result12) )
            {
                $file   =  $row12['file_name'];
                $er_id  =  $row12['id'];
                
                if(!empty($file)){
                    // $temp   =  explode('.', $file);
                    // $ext    =  array_pop($temp);
                    // $name   =  implode('.', $temp);
                    // // echo 'Production/'.$_SERVER['SERVER_NAME'].'/email_reminder_files/'.$user.'/'.$er_id; die;
                    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
                    
                    $result = $client->deleteObject(array(
                        'Bucket' => 'fincrm',
                        'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/email_reminder_files/'.$user.'/'.$er_id.'/'.$file,
                    ));
                }    
                // echo $file; die;

                

                $deleteRecordCdbSql    =  "DELETE FROM email_reminder WHERE id='$er_id'";
                //$result2=mysqli_query($conn,$sql2); 

                $databaseOperations->exicuteQueryOnCommonDatabase($deleteRecordCdbSql);
            }
        }
    }elseif( $entity=="SMSReminder" ) {

        //DATABASE OPERATIONS
        include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/databaseOperations.php');

        foreach ($id as $key => $er_id) {

            $deleteRecordCdbSql    =  "DELETE FROM s_m_s_reminder WHERE id='$er_id'";

            //also delete this record on common database
            $databaseOperations->exicuteQueryOnCommonDatabase($deleteRecordCdbSql);
        }
    }
    elseif($entity=="Invoice")
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
                include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
                
                $result = $client->deleteObject(array(
                    'Bucket' => 'fincrm',
                    'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$inv_id.'/'.$name.'.zip',
                ));

                $sql2="delete from invoice_files where invoice_id='$inv_id'";
                $result2=mysqli_query($conn,$sql2); 
            }
        }
    }
}
elseif($entity=="ExportResult"){

foreach ($id as $key => $ex_id) 
        {

            $sql12="select * from export_result where id='$ex_id'";
            $result12=mysqli_query($conn,$sql12);
            while( $row12=mysqli_fetch_assoc($result12))
            {
                $file=$row12['file'];
                $export_id=$row12['id'];

                // $temp = explode('.', $file);
                // $ext  = array_pop($temp);
                // $name = implode('.', $temp);

                include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
                
                $result = $client->deleteObject(array(
                    'Bucket' => 'fincrm',
                    'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/export_files/'.$user.'/'.$ex_id.'/'.$file.'.zip',
                
                ));
                $sql2="delete from export_result where id='$ex_id'";
                $result2=mysqli_query($conn,$sql2); 
            }
        }

}else
{
    foreach ($id as $key => $stream_id) 
    {

        $sql25="select * from attachment where parent_id='$stream_id'";
        $result25=mysqli_query($conn,$sql25);
        while( $row25=mysqli_fetch_assoc($result25))
        {
            $attchId=$row25['id'];
            include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
            
            $result = $client->deleteObject(array(
                'Bucket' => 'fincrm',
                'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/data/'.$attchId,
            ));
                $sql2="update attachment set deleted ='1' where id='$attchId'";
                $result2=mysqli_query($conn,$sql2);
           
        }
    }

    foreach ($id as $key => $stream_id)
    {
        $sql5="select * from note where parent_id='$stream_id'";
        $result5=mysqli_query($conn,$sql5);
        while($row5=mysqli_fetch_assoc($result5))
        {
            $noteId=$row5['id'];

            $sql25="select * from attachment where parent_id='$noteId'";
            $result25=mysqli_query($conn,$sql25);
            while($row25=mysqli_fetch_assoc($result25))
            {
                $streamId=$row25['id'];
                // echo 'Development/'.$_SERVER['SERVER_NAME'].'/data/'.$streamId;die;
                include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
                
                $result = $client->deleteObject(array(
                    'Bucket' => 'fincrm',
                    'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/data/'.$streamId,
                ));
                $sql2="update attachment set deleted ='1' where id='$streamId'";
                $result2=mysqli_query($conn,$sql2);
            }    
        }
    }
}

echo 1;
  
?>