<?php
error_reporting(0);
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	$con=$conn;
	$id=$_POST['id'];
	
	$allfolder_id_array=array();
	$allfolder_id_array2=array();
	// $con=mysqli_connect('localhost','root','root','fincrm');
	 if($con->connect_error){
    		die("Connection Failed" . $con->connect_error);
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
				echo"sub folder data<br>";
				//$conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
				// if($con->connect_error){
				// 	die("Connection Failed". $con->connect_error);
				// }
				$sub_of_main_folder=array();
				$i=0;
				$y=0;
				$rlt= mysqli_query($con, "SELECT * FROM folder_master fm, sub_folder_master sfm WHERE fm.id=sfm.folder_master_id AND fm.id='".$_POST['id']."'");
				while ($rw= mysqli_fetch_array($rlt))
				{
					$sub_of_main_folder[$i]=$rw['id'];
					$sub_folder_id= $rw['id'];
					$subfolder_name=$rw['folder_name'];
					echo "<br>".$subfolder_name."<br>";
					echo "<br>".$sub_folder_id."<br>";
					
					$allfolder_id_array[$y]=$sub_folder_id;
					//create Sub folder
					
					
					$result_document_sub=mysqli_query($con, "DELETE FROM document_master WHERE folder_id='".$rw['id']."'");
							/* while($row_document_sub=mysqli_fetch_array($result_document_sub))
							{ */
								//echo $rw['id']."realted doc deleted";
					$y++;		//} 
					$i++;	
				
				/* print_r($sub_of_main_folder);
				echo "<br>"; */
					$result_check=mysqli_query($con,"SELECT * FROM sub_folder_master");
					
				  $length= count($sub_folder_master_id);
				  $x=0;
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
								
								/* echo "<br>";
								echo "SUB FOLDER NAME @@@ ". $sub_folder_name;
								echo "<br>";
								echo "SUB FOLDER ID IN LOOP @@@ ".$sub_folder_id; */
								
								$allfolder_id_array2[$x]=$sub_folder_id;
								$result_document_subfolder=mysqli_query($con, "DELETE FROM document_master WHERE folder_id='".$sub_folder_id."'");
								/* while($row_document_subfolder=mysqli_fetch_array($result_document_subfolder))
								{ */
									//echo"deleted";
									
								//} 
								$x++;
							}
							
						  }
						  
					  }
					  
				  }
					print_r($allfolder_id_array);  
				 print_r($allfolder_id_array2);

				for($b=0;$b<count($allfolder_id_array2);$b++)
				{
					echo "DELETE FROM sub_folder_master WHERE id='".$allfolder_id_array2[$b]."'";
					//mysqli_query($con,"DELETE FROM sub_folder_master WHERE id='".$allfolder_id_array2[$b]."'");
				} 
				
				 for($a=0;$a<count($allfolder_id_array);$a++)
				{
					echo "DELETE FROM sub_folder_master WHERE id='".$allfolder_id_array[$a]."'";
					//mysqli_query($con,"DELETE FROM sub_folder_master WHERE id='".$allfolder_id_array[$a]."'");
				} 
	 
	 
	 
?>	

