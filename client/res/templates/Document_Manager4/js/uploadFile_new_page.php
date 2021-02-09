<?php
	session_start();
	//echo "<script>alert('IN ISSET SUBMIT FUNCTION');</script>";
	$json=json_decode(stripslashes($_POST['data']), true);
		
		//$path    = '../server/php/files';
		//$files = scandir($path);
		
		$data = $_POST['data'];
		
		//print_r($data);
		echo "<br>";
		//echo "FOLDER NAME IN PHP PAGE". $folderName;
		echo "<br>";
		//echo "FILE UPLOADED SUCCESSFULLY";
		$conn2 = mysqli_connect('localhost', 'root', 'root', 'dms');
		if($conn2->connect_error){
			die("Connection Failed ". $conn2->connect_error);
		}
		if($conn2){
			//echo "CONNECTION DONE";
		}
		
		mysqli_query($conn2, "INSERT INTO demo (id, nameStd) VALUES (1, '".$json."')");
		
		
?>