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

$billing_entity_id=$_GET['id'];

// delete billing entity
$sql3="update billing_entity set deleted='1' where id='$billing_entity_id'";
// $sql3="delete billing_entity set deleted='1' where id='$billing_entity_id'";
$result3=mysqli_query($conn,$sql3);

$sql3="update billing_entity_bankdetails set deleted='1' where billing_entity_id='$billing_entity_id'";
// $sql3="delete billing_entity_bankdetails where billing_entity_id='$billing_entity_id'";
$result3=mysqli_query($conn,$sql3);

$sql3="update billing_entity_gstdetails set deleted='1' where billing_entity_id='$billing_entity_id'";
// $sql3="delete billing_entity_gstdetails where billing_entity_id='$billing_entity_id'";
$result3=mysqli_query($conn,$sql3);

$project = explode('/', $_SERVER['REQUEST_URI'])[1];

if($result3)
{
    $sql3="select * from billing_entity where deleted = '0'";
    $result3=mysqli_query($conn,$sql3);
    $billing_entity_num_rows = mysqli_num_rows($result3);

    // echo json_encode(array("msg" => "Estimate removed successfully!", "project_name" => $project));
    // $data["msg"] = 'Estimate removed successfully!';
    // $data["project_name"] = $project;
    echo json_encode(array("msg" => "Billing Entity removed successfully!", "project_name" => $project, "billentity_count" => $billing_entity_num_rows));
}
else {
    return false;
}

/*echo "<script>
$.confirm({
        title: 'Success!',
        content: 'Billing Entity Removed!',
       
            buttons: {
        Ok: function () {
            window.location='http://".$_SERVER['SERVER_NAME']."/".$project."#BillingEntity';
            }
        }
    });
</script>";*/
?>