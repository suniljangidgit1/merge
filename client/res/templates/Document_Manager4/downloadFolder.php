<?php
    session_start();
    error_reporting(0);
    $userName=$_SESSION["Login"];
    //get connection
    include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
    if($userName== "admin"){
        $folderID=$_GET['id'];
    	// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
    	// if($conn->connect_error){
    	// 	die("Connection Failed".$conn->connect_error);
    	// }
    	$sql= "SELECT * FROM folder_master WHERE id='".$folderID."'";
    	$result= mysqli_query($conn, $sql);
    	$row= mysqli_fetch_array($result);
    	$folderName= $row['folder_name'];
    	/// CODE FOR GET FILES RELATED TO FOLDER NAME...
    	$resultForGetFiles= mysqli_query($conn, "SELECT * FROM document_master WHERE folder_id='".$folderID."'");
    	//print_r($resultForGetFiles);
    	$zipname = $folderName.'.zip';
    	if(file_exists($zipname)){
    	    unlink($zipname);    
    	}
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
    	while($rowForGetFiles= mysqli_fetch_array($resultForGetFiles)){
    		$zip->addFile("upload/".$rowForGetFiles['document_name']);
    	}
    	$zip->close();
    	header('Content-Type: application/zip');
        header("Content-Disposition: attachment; filename='adcs.zip'");
        header('Content-Length: ' . filesize($zipname));
        header("Location: ".$folderName.".zip");    
    }else{
        $folderID=$_GET['id'];
    	// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
    	// if($conn->connect_error){
    	// 	die("Connection Failed".$conn->connect_error);
    	// }
    	$sql= "SELECT * FROM folder_master WHERE id='".$folderID."'";
    	$result= mysqli_query($conn, $sql);
    	$row= mysqli_fetch_array($result);
    	$folderName= $row['folder_name'];
    	$defineAccess=$row['define_access'];
    	if($defineAccess=="Download"){
    	    /// CODE FOR GET FILES RELATED TO FOLDER NAME...
        	$resultForGetFiles= mysqli_query($conn, "SELECT * FROM document_master WHERE folder_id='".$folderID."'");
        	//print_r($resultForGetFiles);
        	$zipname = $folderName.'.zip';
        	if(file_exists($zipname)){
        	    unlink($zipname);    
        	}
            $zip = new ZipArchive;
            $zip->open($zipname, ZipArchive::CREATE);
        	while($rowForGetFiles= mysqli_fetch_array($resultForGetFiles)){
        		$zip->addFile("upload/".$rowForGetFiles['document_name']);
        	}
        	$zip->close();
        	header('Content-Type: application/zip');
            header("Content-Disposition: attachment; filename='adcs.zip'");
            header('Content-Length: ' . filesize($zipname));
            header("Location: ".$folderName.".zip");        
    	}else if($defineAccess=="Both"){
    	    /// CODE FOR GET FILES RELATED TO FOLDER NAME...
        	$resultForGetFiles= mysqli_query($conn, "SELECT * FROM document_master WHERE folder_id='".$folderID."'");
        	//print_r($resultForGetFiles);
        	$zipname = $folderName.'.zip';
        	if(file_exists($zipname)){
        	    unlink($zipname);    
        	}
            $zip = new ZipArchive;
            $zip->open($zipname, ZipArchive::CREATE);
        	while($rowForGetFiles= mysqli_fetch_array($resultForGetFiles)){
        		$zip->addFile("upload/".$rowForGetFiles['document_name']);
        	}
        	$zip->close();
        	header('Content-Type: application/zip');
            header("Content-Disposition: attachment; filename='adcs.zip'");
            header('Content-Length: ' . filesize($zipname));
            header("Location: ".$folderName.".zip");        
    	}else{
    	    
			/* 	echo "<script type='text/javascript'>";
			echo "alert('You dont have permission to download this file...');
					window.location='index.php'	;
			";
			echo "</script>"; */
    	}
    
	}
    	
    	
    	
    
	
    
?>