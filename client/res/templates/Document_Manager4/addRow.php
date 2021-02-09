<?php

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
?>

<DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script>
		$(document).ready(function() {
		  var i = 1;
		  $("#add_row").click(function() {
		  $('tr').find('input').prop('disabled',false)
			$('#addr' + i).html("<td>Assign User</td><td><select class='form-control' name=auser" + (i + 1) + "><option value=''>Select User</option></select></td><td><select class='form-control' name=daccess" + (i + 1) + "><option value=''>Define Access</option><option value='Download'>Download</option><option value='Upload'>Upload</option><option value='Both'>Both</option></select></td>");

			$('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
			i++;
		  });
		});
			
		</script>
		<script type="javaScrpt">
			function countNumberOfRow(){
				alert("HIII");
				var totalRowCount = 0;
				var rowCount = 0;
				var table = document.getElementById("tab_logic");
				var rows = table.getElementsByTagName("tr"); 
				for (var i = 0; i < rows.length; i++) {
					totalRowCount++;
					if (rows[i].getElementsByTagName("td").length > 0) {
						rowCount++;
					}
				}
				var message = "Total Row Count: " + totalRowCount;
				message += "\nRow Count: " + rowCount;
				alert(message); 
			}
		
		</script>
	</head>
	<body>
		<div class="container" style="position:relative; top:50px; width:600px;">
		  <div class="row clearfix">
			<div class="col-md-12 column">
				<form action="addFolder.php" method="post">
			  <table class="table table-bordered table-hover" id="tab_logic">
				<tbody>
					<tr>
						<td>Folder Name </td>
						<td colspan="2">
							<input type="text" id="folderName" class="form-control" name="folderName" placeholder="Enter folder name.."/>
						</td>
					</tr>	
				  <tr id='addr0'>
					<td>
					  Asign Usder
					</td>
					<td>
					  <select id="assignUser" name="assignUser" class="form-control">
						<option>Select User</option>
						<?php
								// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
								// if($conn->connect_error){
								// 	die("Connection Failed". $conn->connect_error);
								// }
								$result=mysqli_query($conn, "SELECT * FROM user");
								$index=0;
								while($row= mysqli_fetch_array($result)){
									echo "<option id=".$index." value=".$row['user_name'].">".$row['user_name']."</option>";
									$index++;
								}
							?>
						
					  </select>
					</td>
					<td>
					  <select name="defineAccess" class="form-control">
						<option>Define Access</option>
						<option value="Upload">Upload</option>
						<option value="Download">Download</option>
						<option value="Both">Both</option>
					  </select>
					</td>
					
				  <tr id='addr1'></tr>
				 
				</tbody>
			  </table>
			  <table id="addRowTable" class="table">
					<tr>
						<td>
							<input type="submit" onclick="countNumberOfRow()" class="form-control btn btn-info btn-lg pull-left" value="Add Folder" />
						</td>
					</tr>
			  </table>
			  </form>
			</div>
		  </div>
		  <button id="add_row" style="width:100px; height:50px;" class="btn btn-info btn-lg pull-left">add</button>
		</div>	
	</body>
</html>	



