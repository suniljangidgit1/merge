<?php
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>DMS: FinnovaCRM</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<style>
			.vertical-menu {
				position:absolute;
				width: 200px;
				left:10px;
				top:50px;
			}
			.vertical-menu a {
				background-color: #eee;
				color: black;
				display: block;
				padding: 12px;
				text-decoration: none;
			}
			.vertical-menu a:hover {
				background-color: #ccc;
			}
			.vertical-menu a.active {
				background-color: #4CAF50;
				color: white;
			}
		</style>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="vertical-menu">
			<a href="#" class="active">Files</a>
			<a href="createFolder.php">Create Folder</a>
			<a href="uploadFile.php">Upload File</a>
			<a href="viewAllFile.php">Documents</a>
			<a>
			</a>
		</div>
		<div class="container col-xs-9 col-md-10 table-responsive" style="position:relative; left:90px; top:50px;">
			
			<?php
			
			$conForCheckFolderList = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
			if (!$conForCheckFolderList) {
				die('Could not connect: ' . mysqli_error($conForCheckFolderList));
			}
			mysqli_select_db($conForCheckFolderList,"DEMO_CRM");
			$sqlForCheckFolderList="SELECT * FROM folder_master";
			$resultForCheckFolderList = mysqli_query($conForCheckFolderList,$sqlForCheckFolderList);
			$rowForCheckFolderList = mysqli_fetch_array($resultForCheckFolderList);
			
			if($rowForCheckFolderList['id']!= ''){
				echo "<h6 class='col-md-6'>Folder List</h6>";
				$con = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
				if (!$con) {
					die('Could not connect: ' . mysqli_error($con));
				}
				mysqli_select_db($con,"DEMO_CRM");
				$sql="SELECT * FROM folder_master";
				$result = mysqli_query($con,$sql);
				echo "<div class='table-responsive col-md-9'>";
				echo "<table class='table table-striped'>
				<tr class=''>
					<center><th></th></center>
					<center><th>&nbsp;Folder&nbsp;Name</th></center>
					<center><th>&nbsp;Created&nbsp;By</th></center>
					<center><th>&nbsp;&nbsp;&nbsp;Assigned&nbsp;User</th></center>
					<center><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Created&nbsp;At</th></center>
					<center><th>&nbsp;Option</th></center>
				</tr>";
				while($row = mysqli_fetch_array($result)) {
					echo "<tr class=''>";
					echo "<td><center><i class='fa fa-folder fa-3x' style='color:rgb(146, 206, 255);'></i></td>";
					echo "<td><a href='editFolder.php?id=".$row['id']."'><center>" . $row['folder_name'] . "</center></a></td>";
					$connForGetCreatedUserName= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
					if (!$connForGetCreatedUserName) {
						die('Could not connect: ' . mysqli_error($connForGetCreatedUserName));
					}	
					mysqli_select_db($con,"DEMO_CRM");
					$sqlForGetUserName="SELECT last_name FROM user where id='".$row['created_user_id']."' ";
					$resultForGetUserName = mysqli_query($connForGetCreatedUserName,$sqlForGetUserName);
					$rowForGetUser=mysqli_fetch_array($resultForGetUserName);
					echo "<td><center>" . $rowForGetUser['last_name'] . "</center></td>";
					echo "<td><center>" . $row['assigned_user_id'] . "</center></td>";
					echo "<td><center>" . $row['createdAt'] . "</center></td>";
					echo "<td><center> <button data-toggle='collapse' data-target='#demo'>...</button> </center></td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "</div>";
				mysqli_close($con);
			}
		?>
		</div>
	</body>
</html>