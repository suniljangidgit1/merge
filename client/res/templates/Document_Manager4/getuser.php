<?php
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	error_reporting(0);
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	session_start();
	//echo $_POST['selecteduser'];
	
		//echo $_POST['selecteduser'];
		$str_user=array($_POST['selecteduser']);
		//print_r($str_user);
		
		$str="SELECT * FROM user where deleted='0'";
		$result=mysqli_query($conn, $str);
			while($row= mysqli_fetch_array($result)){
				for($i=0;$i<count($str_user);$i++)
				{
					if($row['user_name']!=$str_user[$i])
					{
						echo "<option value=".$row['user_name'].">".$row['user_name']."</option>";
						
					}
				}
			}
	
?>	