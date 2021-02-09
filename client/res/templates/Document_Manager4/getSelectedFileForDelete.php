<?php
	session_start();
	$ids=$_POST['ids'];
	$_SESSION['idsForDelete']= $ids;
	
	print_r($ids);
?>