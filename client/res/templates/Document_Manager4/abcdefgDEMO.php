							<?php 
								// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');; 
								//get connection
								include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');


								if($conn->connect_error){
									die("Connection Failed ". $conn->connect_error);
								}
								$sql="SELECT * FROM user";
								$result= mysqli_query($conn,$sql); 
								while($row= mysqli_fetch_array($result)){
									
									$userName= $row['user_name'];
									echo "<option value=".$userName.">".$userName."</option>";
									
								}
								
							?>