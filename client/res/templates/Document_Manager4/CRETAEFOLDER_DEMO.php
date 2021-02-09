<?php
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<li ><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Folders</a></li>
			<li class="active"><a href="#"><em class="fa fa-folder">&nbsp;</em> Create Folder</a></li>
			<li><a href="uploadFile.php"><em class="fa fa-upload">&nbsp;</em> Upload File</a></li>
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
			<!-- <li><a href="setDefaultSizeLimit.php"><em class="fa fa-database">&nbsp;</em> Set Default File Size</a></li> -->
		<!--	<li><a href="viewFileAccessLog.php"><em class="fa fa-file">&nbsp;</em> File Access Log</a></li> -->
		</ul>
	</div><!--/.sidebar-->
		<br><br><br>
	<div class="col-sm-9 col-sm-offset-3 main" style="width:100%;">
		<div class="row">
			<form action="saveFolder.php" method="post">
			<table class="table" style="position:relative; left:150px; width:500px;">
				<tr>
					<td>Folder Name:</td>
					<td colspan="2">
						<input type="text" name="folderName"/>
					</td>
				</tr>
				<tr>
					<td>Assign Users:</td>
					<td>
						<select name="user">
							<option value="">Select User</option>
							<?php
								// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
								// if($conn->connect_error){
								// 	die("Connection Failed". $conn->connect_error);
								// }
								$result=mysqli_query($conn, "SELECT * FROM user");
								while($row= mysqli_fetch_array($result)){
									echo "<option value=".$row['user_name'].">".$row['user_name']."</option>";
								}
							?>
							
						</select>
					</td>
					<td>
						<select name="userAccess">
							<option value="">Select Access</option>
							<option value="upload">Upload</option>
							<option value="Download">Download</option>
							<option value="Both">Both</option>
						</select>
					</td>
				</tr>
				<tr>
					<div id="main">
					<td>
						<input type="button" class="btn btn-primary" id="btAdd" value="Add" class="bt" />
					</td>
					<td>		
						<input type="button" class="btn btn-primary" id="btRemove" value="Remove" class="bt" />
					</td>
					<td>
						<input type="button" class="btn btn-primary" id="btRemoveAll" value="Remove All" class="bt" /><br />
					</td>
					</div>
				</tr>
				<tr>
					
				<script>
					$(document).ready(function() {

						var iCnt = 0;
						// CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.
						var container = $(document.createElement('div')).css({
							position: 'absolute', left: '150px', top:'150px', padding: '5px', margin: '20px', width: '170px',
							borderTopColor: '#999', borderBottomColor: '#999',
							borderLeftColor: '#999', borderRightColor: '#999'
						});
						$('#btAdd').click(function() {
							if (iCnt <= 19) {
								iCnt = iCnt + 1;
								// ADD TEXTBOX.
								$(container).append('<tr><td><select><option>Select User</option></select></td> <td><select><option>Select Access</option><option value="Upload">Upload</option><option value="Download">Download</option><option value="Both">Both</option></select></td></tr>');
								// SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.
								if (iCnt == 1) {
									var divSubmit = $(document.createElement('div'));
									/* $(divSubmit).append('<input type=button class="bt"' + 
									'onclick="GetTextValue()"' + 
										'id=btSubmit value=Submit />'); */
								} 
								// ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
								$('#main').after(container, divSubmit);
							}
							// AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
							// (20 IS THE LIMIT WE HAVE SET)
						else {      
							$(container).append('<label>Reached the limit</label>'); 
							$('#btAdd').attr('class', 'bt-disable'); 
							$('#btAdd').attr('disabled', 'disabled');
						}
						});

						// REMOVE ONE ELEMENT PER CLICK.
						$('#btRemove').click(function() {
							if (iCnt != 0) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; }
							if (iCnt == 0) { 
								$(container)
								.empty() 
								.remove(); 
								$('#btSubmit').remove(); 
								$('#btAdd')
								.removeAttr('disabled') 
								.attr('class', 'bt');
							}
						});
						// REMOVE ALL THE ELEMENTS IN THE CONTAINER.
						$('#btRemoveAll').click(function() {
							$(container)
							.empty()
							.remove(); 
							$('#btSubmit').remove(); 
							iCnt = 0; 
							$('#btAdd')
							.removeAttr('disabled') 
							.attr('class', 'bt');
						});
					});
					// PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
					var divValue, values = '';
					function GetTextValue() {
						$(divValue) 
						.empty() 
						.remove(); 
						values = '';
						$('.input').each(function() {
							divValue = $(document.createElement('div')).css({
								padding:'5px', width:'200px'
							});
							values += this.value + '<br />'
						});
						$(divValue).append('<p><b>Your selected values</b></p>' + values);
						$('body').append(divValue);
					}
				</script>
				</tr>
				<tr>
					<td colspan="3">
						<input class="btn btn-primary" type="submit" value="Save"/>
					</td>
					
				</tr>
			</table>
			</form>
		</div>
	</div>	<!--/.main-->
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