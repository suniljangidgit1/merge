<?php
session_start();
// error_reporting(~E_ALL);
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

$estimate_id = $_GET['id'];

//get invoice number
$sql1="select * from estimates_items where estimate_id='$estimate_id'";
$result1=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_assoc($result1))
{
    $id=$row1['id'];
    $sql2="delete from estimates_items where id='$id'";
    $result2=mysqli_query($conn,$sql2);
}

/*$folder_path='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$estimate_id;

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

$sql22="select * from estimate_files where estimate_id='$estimate_id'";
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
        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$estimate_id.'/'.$name.'.zip',
    ));

  
    $sql21="delete from estimate_files where id='$id'";
    $result21=mysqli_query($conn,$sql21);
}*/

$sql = "select * from estimate where id = '$estimate_id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row["filename"]!="")
{
    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'.'wasabi_connect.php');

    $result = $client->deleteObject(array(
        'Bucket' => 'fincrm',
        'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$estimate_id.'/'.$row["filename"],
    ));

    $result = $client->deleteObject(array(
        'Bucket' => 'fincrm',
        'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$estimate_id,
    ));
}

// delete payment data
$sql3="delete from estimate where id='$estimate_id'";
$result3=mysqli_query($conn,$sql3);

$project = explode('/', $_SERVER['REQUEST_URI'])[1];

if($result3)
{
    $sql3="select * from estimate where deleted = '0' ";
    $result3=mysqli_query($conn,$sql3);
    $estimate_num_rows = mysqli_num_rows($result3);

    // echo json_encode(array("msg" => "Estimate removed successfully!", "project_name" => $project));
    // $data["msg"] = 'Estimate removed successfully!';
    // $data["project_name"] = $project;
    echo json_encode(array("msg" => "Estimate removed successfully!", "project_name" => $project, "estimate_count" => $estimate_num_rows));
}
else {
    return false;
}


/*echo "<script>
$.confirm({
        title: 'Success!',
        content: 'Estimate Removed!',
       
            buttons: {
        Ok: function () {
            window.location='http://".$_SERVER['SERVER_NAME']."/".$project."#Estimate';
            }
        }
    });
</script>";*/
?>