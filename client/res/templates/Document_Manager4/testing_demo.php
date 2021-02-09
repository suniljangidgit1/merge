<?php
	session_start();
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed". $conn->connect_error);
	// }

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
  
	$firstUserArr= array();
	$firstUserArr= $_POST['selecteduser'];
	$_SESSION['firstUserArr']=$firstUserArr;
	$_SESSION['folderName']= $_POST['fid'];
		
	 //echo $_POST['selecteduser'];
	if(isset($_POST['selecteduser']))
	{
		//echo $_POST['selecteduser'];
		$str_user=array($_POST['selecteduser']);
		//print_r($str_user);
		
		$str="SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0' AND is_portal_user='0' AND is_active<>'0' ORDER BY first_name";
		$result=mysqli_query($conn, $str);
		
		echo "<option>Select user</option>";
			while($row= mysqli_fetch_array($result)){
				/* for($i=0;$i<count($str_user);$i++)
				{ */
					if(in_array($row['user_name'],$str_user))
					{						
					}
					else{ 
						echo "<option value=".$row['user_name'].">".$row['first_name']." ".$row['last_name']. "</option>";
					}
				//}
			}	
	} 
	if(isset($_POST['arr']))
	{
		$arr_check=$_POST['arr'];
		$_SESSION['selectedUsers']=$_POST['arr']; 
		//array_push($arr,$_POST['selectcount']);
		//print_r($arr_check);
		
		//$selectArray = array($_POST['selecteduser']);
		//$_SESSION['selectuser'] = implode(",",$selectArray);
		//$_SESSION['selectuserarray'] = $selectArray;
		//echo $_SESSION['selectuser'];
		/* if(isset($_POST['selecteduser']))
		{ */
		
	//	echo $_POST['selectedCountry'];
		
		//$str_user=array($_POST['selectcount']);
		//print_r($str_user);
		
		  $str="SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0' AND is_portal_user='0' ORDER BY first_name";
		$result=mysqli_query($conn, $str);
		echo"<option>Select user</option>";
		while($row= mysqli_fetch_array($result)){
			/* for($i=0;$i<count($arr_check);$i++)
			{ */
				 if(in_array($row['user_name'], $arr_check))
				{					
				}
				else{ 
					echo "<option value=".$row['user_name'].">".$row['first_name']." ".$row['last_name']."</option>";
				//}
			}
		}
	}
			
?>
