<?php
	session_start();
	echo "IN GETUSERLIST PAGE";
	
	$userList = $_POST['data'];
	
	$_SESSION["userList"]=$userList;
?>