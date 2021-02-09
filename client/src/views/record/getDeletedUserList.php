<?php

	//echo "IN DELETED USSER FIND PAGE";

	//echo $_GET['id'];

	$link= $_GET['id'];

	$link1=str_replace("#User/view/", "",$link );

	//echo "LINK= ". $link1; 

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$res=mysqli_query($conn, "SELECT * FROM user WHERE id='".$link1."'");

	$row= mysqli_fetch_array($res);
	$deleted= $row['deleted'];
	if($deleted=="1"){
		echo "1";
	}else{
		echo "0";
	}

