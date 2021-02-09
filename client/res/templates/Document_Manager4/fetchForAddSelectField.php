<?php
  	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	// $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	$output = '';
	//$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "SELECT * FROM user ";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result))
	{
		$output = "<select name=".$row['user_name']."><option >".$row["user_name"];
	}
	echo $output;
?>