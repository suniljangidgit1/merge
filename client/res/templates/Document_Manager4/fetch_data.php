<?php
if(isset($_POST['folderName']))
{
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	$folderID = $_POST['folderName'];
	$find=mysqli_query($conn, "select folder_name from sub_folder_master where folder_master_id=".$folderID."");
	while($row=mysqli_fetch_array($find))
	{
		echo "<option>".$row['folder_name']."</option>";
	}
	exit;
}
?>