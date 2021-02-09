<?php
error_reporting(0);
	// $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	$connect=$conn;
	$output = '';
	if(isset($_POST["query"]))
	{
		$search = mysqli_real_escape_string($connect, $_POST["query"]);
		$query = "
		SELECT * FROM folder_master WHERE folder_name='".$search."' ";
	}
	$result = mysqli_query($connect, $query);
	$row=mysqli_fetch_array($result);
	$folderId= $row['id'];
	$sql= "SELECT * FROM sub_folder_master WHERE folder_master_id='".$folderId."'";
	$resultForSubFolder= mysqli_query($connect, $sql);
	if(mysqli_num_rows($resultForSubFolder) > 0 )
	{
		while($rowForSubFolder = mysqli_fetch_array($resultForSubFolder)){
			$output .= '
				<select >
					<option>Select Sub Folder</option>
				</select>
			';
		}					
		echo $output;
	}
	else
	{
		echo 'Data Not Found';
	}
?>