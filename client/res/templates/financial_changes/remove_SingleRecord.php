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

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$user=$row4['user_name'];
$id=$_GET['id'];


if($id!="")
{    
     
    
    if ( $entity_name == "EmailReminder" ) {

        $sql25      =   "select * from email_reminder where id='$id'";
        $result25   =   mysqli_query($conn,$sql25);

        while( $row25   =   mysqli_fetch_assoc($result25) ) {

            $er_id    =   $row25['id'];
            $file     =   $row25['file_name'];
            if(!empty($file)){
                include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
                
                $result156 = $client->deleteObject(array(
                    'Bucket' => 'fincrm',
                    'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/email_reminder_files/'.$user.'/'.$er_id.'/'.$file,
                ));
                
            }

            //DATABASE OPERATIONS
            $deleteRecordCdbSql  =  "DELETE FROM email_reminder WHERE id='$er_id'";

            include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/databaseOperations.php');
            
            //also delete this record on common database
            $databaseOperations->exicuteQueryOnCommonDatabase($deleteRecordCdbSql);
           
        }
   }else if( $entity_name == "SMSReminder" ) {

        $deleteRecordCdbSql    =  "DELETE FROM s_m_s_reminder WHERE id='$id'";

        //DATABASE OPERATIONS
        include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/databaseOperations.php');

        $databaseOperations->exicuteQueryOnCommonDatabase($deleteRecordCdbSql);

    }elseif($entity_name== 'ExportResult'){

        $sql12="select * from export_result where id='$id'";
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
                    'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/export_files/'.$user.'/'.$id.'/'.$file.'.zip',
                
                ));
            // $sql2="update export_result set deleted ='1' where id='$export_id'";
            // $result2=mysqli_query($conn,$sql2);
            }

    }else{

    $sql25="select * from attachment where parent_id='$id'";
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
    

    $sql5="select * from note where parent_id='$id'";
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