<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
table, td {
  border: 1px solid black;
}
</style>
</head>
<body>
	<div class="col-sm-8 col-md-8 table-responsiv" style="position:relative; top:100px; left:100px;">
		<form action="saveFolder_DEMO.php" method="post">
			<table class="table" style="width:800px; border:none;">
				<tr>
					<td>Folder Name</td>
					<td colspan="2">
						<input type="text" class="form-control" name="folderName" />
					</td>
				</tr>
				<tr>
					<td>Assign Users:</td>
					<td>
						
						<select name="assignUser" class="form-control">
							<option value="">Select User</option>
							<?php 
								// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
								// if($conn->connect_error){
								// 	die("Connection Failed ". $conn->connect_error);
								// }
								$sql="SELECT * FROM user";
								$result= mysqli_query($conn,$sql); 
								while($row= mysqli_fetch_array($result)){
									
									$userName= $row['user_name'];
									echo "<option value=".$userName.">".$userName."</option>";
									
								}
								
							?>
						</select>
						<select name="assignUser" class="form-control">
							<option value="">Define Access</option>
							<option value="Upload">Upload</option>
							<option value="Download">Download</option>
							<option value="Both">Both</option>
						</select>
					</td>
				</tr>
			</table>
			<table id="myTable" class="table" style="width:800px;">  
				
				<tr>
					<td colspan="3" align="center">
						<input type="submit" class="btn btn-success form-control" value="Create Folder" />
					</td>
				</tr>
			</table>
		</form>
		<button class="btn btn-primary" onclick="myFunction()">Add</button>
		
		
		
	</div>
	
	<!--	<div class="col-sm-9 col-sm-offset-2 main" style="position:absolute; top:500px; left:500px; width:520px;" >	
		<div class="container">
			<div class="form-group">
				<div class="input-group">
					<input type="button" value="ADD" name="search_text" id="search_text"/>
				</div>
			</div>
			<br/>
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		
	</div>	<!--/.main-->
	<script>
		var funCall=0;
		function myFunction() {
			funCall++;	
		//	alert(funCall);
			var table = document.getElementById("myTable");
			var row = table.insertRow(0);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			
			cell1.innerHTML = "<td>Assign User :</td>";
			cell2.innerHTML = "<td> <select class='form-control' name="+funCall+"> <option>Select User</option> </select></td><td><select name="+funCall+" class='form-control'> <option>Define Access</option><option value='Upload'>Upload</option> <option value='Download'>Download</option> <option value='Both'>Both</option> </select> </td>";
			
		}
	</script>
	
	<script>
$(document).click(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetchForAddSelectField.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').click(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
	

</body>
</html>
