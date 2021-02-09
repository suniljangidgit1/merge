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
			<a href="index.php" >Files</a>
			<a href="createFolder.php" >Create Folder</a>
			<a href="uploadFile.php" >Upload File</a>
			<a href="viewAllFile.php" class="active">Documents</a>
			<a>
			</a>
		</div>
		
	</body>
</html>