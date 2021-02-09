<?php
	session_start();
	$id=$_GET['id'];
	$_SESSION['folderId']=$id;
	if($id!=''){
		echo "<script>";
		echo "var msg= confirm('Do you want to delete Folder?')
			if(msg== true){
				window.location='deleteFolder.php';
			}
			if(msg==false){
				window.location='index.php?page_no=1';
			}
			";
		echo "</script>";
	} 
?>