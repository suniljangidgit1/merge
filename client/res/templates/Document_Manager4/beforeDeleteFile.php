<?php
	session_start();
	
	$id=$_GET['id'];
	$_SESSION['fileId']=$id;
	if($id!=''){
		echo "<script>";
		echo "var msg= confirm('Do you want to delete file?')
			if(msg== true){
				window.location='deleteFile.php';
			}
			if(msg==false){
				window.location='index.php';
			}
			";
		echo "</script>";
	}
?>

