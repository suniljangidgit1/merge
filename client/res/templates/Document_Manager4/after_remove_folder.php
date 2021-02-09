<?php
error_reporting(0);
//session_start();
 $userName=$_SESSION['Login'];
 /* if($userName=="admin")
 { */
	//echo $userName."<br>";
	 // $con=mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
  $con      =  $conn;	


	 if($con->connect_error){
    		die("Connection Failed" . $con->connect_error);
    	}
		
	 $query_result_mainfolder_name=mysqli_query($con,"SELECT * FROM folder_master WHERE id=".$_GET['id']);
	 $row_mainfolder_name=mysqli_fetch_array($query_result_mainfolder_name);
	 
	 //echo "Main Folder = ".$row_mainfolder_name['folder_name']."<br>";
	 
	 $foldername= $row_mainfolder_name['folder_name'];
	 
	 $structure = "for_download_folder/".$foldername;
	// echo "Folder Name -  ".$structure."<br>";
		 
	 
	  $query_result_document=mysqli_query($con, "SELECT * FROM document_master WHERE folder_id=".$_GET['id']);
	if(mysqli_num_rows($query_result_document))
	 { 
	 while($row_document_mainfolder=mysqli_fetch_array($query_result_document))
		 {
			
		 
			 $folder1 = "for_download_folder/".$foldername."/".$row_document_mainfolder['document_name'];
 
									//Get a list of all of the file names in the folder.
									unlink($folder1);
		 }
		 
	 }

		$sub_folder_master_id=array();
				  $j=0;
				  $resul_check_subfolder=mysqli_query($con, "SELECT * FROM sub_folder_master");
				  while($row_check_subfolder=mysqli_fetch_array($resul_check_subfolder))
				  {
					  $sub_folder_master_id[$j]=$row_check_subfolder['folder_master_id'];
					  $j++;
				  }
				
				
				
				$sub_folder_id=0;
				//echo"sub folder data<br>";
				//$conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
				if($con->connect_error){
					die("Connection Failed". $conn->connect_error);
				}
				$cnt=0;
				$sub_of_main_folder=array();
				$i=0;
				$rlt= mysqli_query($con, "SELECT * FROM folder_master fm, sub_folder_master sfm WHERE fm.id=sfm.folder_master_id AND fm.id=".$_GET['id']);
				while ($rw= mysqli_fetch_array($rlt))
				{
					
					$sub_of_main_folder[$i]=$rw['id'];
					$sub_folder_id= $rw['id'];
					$subfolder_name=$rw['folder_name'];
					//echo "<br>".$subfolder_name."<br>";
					//echo "<br>".$sub_folder_id."<br>";
					
					//create Sub folder
					
					$result_document_sub=mysqli_query($con, "SELECT * FROM document_master WHERE folder_id='".$rw['id']."'");
							while($row_document_sub=mysqli_fetch_array($result_document_sub))
							{
								
								

							 
						//	 echo "sub document old path = ".$file."<br>";
						//	 echo "sub document new path = ".$newfile."<br>";
								 $folder2 = $structure."/".$subfolder_name."/".$row_document_sub['document_name'];
 
									//Get a list of all of the file names in the folder.
									
									 unlink($folder2);
									
							} 
					$i++;	
				
				/* print_r($sub_of_main_folder);
				echo "<br>"; */
				
					
				  
				  
				$result_check=mysqli_query($con,"SELECT * FROM sub_folder_master");
					
				  $length= count($sub_folder_master_id);
				  
				  for($i= 0; $i<$length; $i++){
					  
					  $id_from_array = $sub_folder_master_id[$i];
					  /* echo "<br>";
					  echo "ID FROM ARRAY = ". $id_from_array; */
					  if($sub_folder_id == $id_from_array){
						  
						  $sql1= "SELECT * FROM sub_folder_master WHERE folder_master_id='".$sub_folder_id."'";
						  
						  $result1= mysqli_query($con, $sql1);
						  
						  while($row1= mysqli_fetch_array($result1)){
							  
							$sub_folder_name= $row1['folder_name'];
							$sub_folder_id= $row1['id'];	
							/* 
							echo "<br>";
							echo "SUB FOLDER NAME @@@ ". $sub_folder_name;
							echo "<br>";
							echo "SUB FOLDER ID IN LOOP @@@ ".$sub_folder_id;
							echo "<br>"; */
							
							$folder3 = $structure."/".$subfolder_name."/".$sub_folder_name;
							
									//Get a list of all of the file names in the folder.
									$files3 = glob($folder3 . '/*');
									 
									//Loop through the file list.
									foreach($files3 as $file3){
										//Make sure that this is a file and not a directory.
										if(is_file($file3)){
											//Use the unlink function to delete the file.
											unlink($file3);
										}
									}
									// echo "Under sub folder - ".$structure."/".$subfolder_name;
									rmdir($structure."/".$subfolder_name."/".$sub_folder_name);
							
						  }
						  // echo "Under sub folder - ".$structure."/".$subfolder_name;
						  rmdir($structure."/".$subfolder_name); 
						  
					  }
					  
					  
				  }
				  	
					 
				} 

				 
	rmdir($structure); 	
	unlink($structure.".zip");
 //}

?>
