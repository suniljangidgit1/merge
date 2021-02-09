<?php
error_reporting(0);
 // $con=mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	$con=$conn;
	 if($con->connect_error){
    		die("Connection Failed" . $con->connect_error);
    	}
    	// echo "connected";
		

		$sub_folder_master_id=array();
				  $j=0;
				  $resul_check_subfolder=mysqli_query($con, "SELECT * FROM sub_folder_master");
				  while($row_check_subfolder=mysqli_fetch_array($resul_check_subfolder))
				  {
					  $sub_folder_master_id[$j]=$row_check_subfolder['folder_master_id'];
					  $j++;
				  }
				
				$structure = "for_download_folder";
				
				$sub_folder_id=0;
				// $data       =    include('../../../../data/fincrm_config.php');
				//   $host       =    $data['database']['host'];
				//   $user       =    $data['database']['user'];
				//   $password   =    $data['database']['password'];
				//   $dbname     =    $data['database']['dbname'];
				  // $conn       =    mysqli_connect($host, $user, $password, $dbname);
				// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
				// if($con->connect_error){
				// 	die("Connection Failed". $conn->connect_error);
				// }
				$sub_of_main_folder=array();
				$i=0;
				$rlt= mysqli_query($con, "SELECT * FROM sub_folder_master WHERE id='".$_GET['id']."'");
				while ($rw= mysqli_fetch_array($rlt))
				{
					$sub_of_main_folder[$i]=$rw['id'];
					$sub_folder_id= $rw['id'];
					$subfolder_name=$rw['folder_name'];

					
					$result_document_sub=mysqli_query($con, "SELECT * FROM document_master WHERE folder_id='".$rw['id']."'");
							while($row_document_sub=mysqli_fetch_array($result_document_sub))
							{

								
									$folder2 = $structure."/".$subfolder_name."/".$row_document_sub['document_name'];
 
									//Get a list of all of the file names in the folder.
									
									 unlink($folder2);
							} 
					$i++;	
				
				  
				$result_check=mysqli_query($con,"SELECT * FROM sub_folder_master");
					
				  $length= count($sub_folder_master_id);
				  
				  for($i= 0; $i<$length; $i++){
					  
					  $id_from_array = $sub_folder_master_id[$i];
					
					  if($sub_folder_id == $id_from_array){
						  
						  $sql1= "SELECT * FROM sub_folder_master WHERE folder_master_id='".$sub_folder_id."'";
						  
						  $result1= mysqli_query($con, $sql1);
						  
						  while($row1= mysqli_fetch_array($result1)){
							  
							$sub_folder_name= $row1['folder_name'];
							$sub_folder_id= $row1['id'];	
							

							
							$result_document_subfolder=mysqli_query($con, "SELECT * FROM document_master WHERE folder_id='".$sub_folder_id."'");
							while($row_document_subfolder=mysqli_fetch_array($result_document_subfolder))
							{

								
															 
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
							 rmdir($structure."/".$subfolder_name);
						  }
						  
					  }
					  
				  }
					 
				}  
				rmdir($structure); 	
				unlink($structure."/".$subfolder_name.".zip");
?>