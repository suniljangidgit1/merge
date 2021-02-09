<?php
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
  	$con       =    $conn;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		
		<!--Custom Font-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			* {
				box-sizing: border-box;
			}
			input[type=text], select, textarea {
				width: 100%;
				padding: 12px;
				border: 1px solid #ccc;
				border-radius: 4px;
				resize: vertical;
			}
			label {
				padding: 12px 12px 12px 0;
				display: inline-block;
			}
			input[type=submit] {
				background-color: #4CAF50;
				color: white;
				padding: 12px 20px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
				float: right;
			}
			input[type=submit]:hover {
				background-color: #45a049;
			}
			.container {
				border-radius: 5px;
				background-color: #f2f2f2;
				padding: 20px;
			}
			.col-25 {
				float: left;
				width: 25%;
				margin-top: 6px;
			}
			.col-75 {
				float: left;
				width: 75%;
				margin-top: 6px;
			}
			/* Clear floats after the columns */
			.row:after {
				content: "";
				display: table;
				clear: both;
			}
			/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
			@media screen and (max-width: 600px) {
				.col-25, .col-75, input[type=submit] {
					width: 100%;
					margin-top: 0;
				}
			}
		</style>
		<script>
			var input = document.getElementById('filesToUpload');
			var list = document.getElementById('fileList');
			//empty list for now...
			while (list.hasChildNodes()) {
				list.removeChild(ul.firstChild);
			}
			//for every file...
			for (var x = 0; x < input.files.length; x++) {
				//add to list
				var li = document.createElement('li');
				li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
				list.append(li);
			}
		</script>
		<script>
			updateList = function() {
				var input = document.getElementById('file-input');
				var output = document.getElementById('fileList');
				output.innerHTML = '<ul>';
				for (var i = 0; i < input.files.length; ++i) {
					output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
				}
				output.innerHTML += '</ul>';
			}
		</script>
	</head>
	<body>
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
			<ul class="nav menu">
				<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Folders</a></li>
				<li><a href="createFolder.php"><em class="fa fa-folder">&nbsp;</em> Create Folder</a></li>
				<li class="active"><a href="#"><em class="fa fa-upload">&nbsp;</em> Upload File</a></li>
				<li><a href="documents.php"><em class="fa fa-file">&nbsp;</em> Documents</a></li>
				<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
					<em class="fa fa-navicon">&nbsp;</em> Media Files <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-1">
						<li><a class="" href="viewPictures.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Pictures
						</a></li>
						<li><a class="" href="viewAudio.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Audio
						</a></li>
						<li><a class="" href="viewVideo.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Video
						</a></li>
					</ul>
				</li>
				<li><a href="setDefaultSizeLimit.php"><em class="fa fa-database">&nbsp;</em> Set File Default Size</a></li>
				<!--	<li><a href="viewFileAccessLog.php"><em class="fa fa-file">&nbsp;</em> File Access Log</a></li> -->
			</ul>
		</div><!--/.sidebar-->
		<div class="col-sm-10 col-sm-offset-4 col-lg-12 col-lg-offset-2 main">
			<div class="container">
				<form action="upload_DEMO.php" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-25">
							<label for="fname">Select File</label>
						</div>
						<div class="col-30">
							<input type="file" class="file-input form-control" style="width:300px;" name="attachment[]" class="fa fa-papercli" onchange="javascript:updateList()"  id="file-input" multiple>
							<div class="filename-container hide"></div> 
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="fname">Select Folder</label>
						</div>
						<div class="col-30">
							<?php
								// $con = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
								// if (!$con) {
								// 	die('Could not connect: ' . mysqli_error($con));
								// }
								mysqli_select_db($con,"finnovaa_democrm_final");
								$sql="SELECT id, folder_name FROM folder_master ";
								$result = mysqli_query($con,$sql);
								echo "<select name='folderID' class='form-control' style='width:300px; height:50px;'>";	
								echo "<option value='#'>Select Folder</option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='".$row['id']."'>";
									echo $row['folder_name'];
									echo "</option>";	
								}
								echo "</select>"	;
							?>
						</div>
					</div> 
					<div class="row">
						<div class="col-25"></div>
						<div class="col-30">
							<div id="fileList"></div>
						</div>
					</div>	
					<div class="row">
						<div class="col-25"></div>
						<div class="col-35">
							<input type="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>	
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/chart.min.js"></script>
		<script src="js/chart-data.js"></script>
		<script src="js/easypiechart.js"></script>
		<script src="js/easypiechart-data.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/custom.js"></script>
		<script>
			window.onload = function () {
				var chart1 = document.getElementById("line-chart").getContext("2d");
				window.myLine = new Chart(chart1).Line(lineChartData, {
					responsive: true,
					scaleLineColor: "rgba(0,0,0,.2)",
					scaleGridLineColor: "rgba(0,0,0,.05)",
					scaleFontColor: "#c5c7cc"
				});
			};
		</script>
	</body>
</html>