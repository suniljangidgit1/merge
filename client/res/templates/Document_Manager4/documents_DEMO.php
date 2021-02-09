<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
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
</head>
<body>
	
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Files</a></li>
			<li><a href="createFolder.php"><em class="fa fa-calendar">&nbsp;</em> Create Folder</a></li>
			<li><a href="uploadFile.php"><em class="fa fa-bar-chart">&nbsp;</em> Upload File</a></li>
			<li class="active"><a href="#"><em class="fa fa-toggle-off">&nbsp;</em> Documents</a></li>
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
			<!-- <li><a href="setDefaultSizeLimit.php"><em class="fa fa-file">&nbsp;</em> Set Default File Size</a></li> -->
		<!--	<li><a href="viewFileAccessLog.php"><em class="fa fa-file">&nbsp;</em> File Access Log</a></li> -->
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-2 col-lg-8 col-lg-offset-1 main" style="position:relative; left:50px; width:100%;">
		<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Documents List</b></h4>	
		<?php
			/* $doc_Type_array= array();
			$conn= mysqli_connect('localhost', 'root', 'root', 'dms');
			if ($conn->connect_error) { // Check connection
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql="SELECT * FROM document_master";
			$result= mysqli_query($conn, $sql);
			
			while($row = mysqli_fetch_array($result)){
				$doc_type=$row['document_type'];
				$doc_name=$row['document_name'];
				//echo $doc_type;
				//echo "<br>";
				//$doc_Type_array[]=$row['document_type'];
				$allowed = array('doc', 'docx', 'DOC', 'DOCX', 'pdf', 'PDF', 'txt', 'xls', 'xlsx');
				if(in_array($doc_type, $allowed)) {
					$doc_Type_array[]= 	$doc_name;
				}
			}
			//print_r($doc_Type_array);
			//echo count($doc_Type_array);
			$index=count($doc_Type_array) - 1;
			
				//echo $doc_Type_array[$index];
				echo "<br>";
				
					echo "<div class='table-responsive col-md-9'>";
					echo "<table class='table-striped table-bordered table-condensed ' style='width:100%;'>
					<tr class='success'>
						<thead class='thead-light'>
							<th><center>File Name</center></th>
							<th><center>Created By</center></th>
							<th><center>Created At</center></th>
							<th><center>Option</center></th>
						</thead>
					</tr>";
				foreach($doc_Type_array as $type){	
					$connForGetData= mysqli_connect('localhost', 'root', 'root', 'dms');
					if ($connForGetData->connect_error) { // Check connection
						die("Connection failed: " . $connForGetData->connect_error);
					} 
					$sqlForGetData= "SELECT * FROM document_master WHERE document_name='".$doc_Type_array[$index]."'";
					$resultForGetData= mysqli_query($connForGetData, $sqlForGetData);
					while($rowForGetData = mysqli_fetch_array($resultForGetData)){
						echo "<tr class='success'>";
						
						echo "<td><i class='fa fa-file fa-2x'></i>&nbsp;&nbsp;&nbsp;&nbsp;" . $rowForGetData['document_name'] . "</td>";
				
						$connForGetUserName= mysqli_connect('localhost', 'root', 'root', 'crm_for_user');
						if ($connForGetUserName->connect_error) {
							die("Connection failed: " . $connForGetUserName->connect_error);
						} 
						$sqlForGetUserName= "SELECT * FROM user WHERE id='".$rowForGetData['created_user_id']."'";
						$resultForGetUserName= mysqli_query($connForGetUserName, $sqlForGetUserName);
						$rowForGetUserName= mysqli_fetch_array($resultForGetUserName);
				
						echo "<td><center>" . $rowForGetUserName['user_name'] . "</center></td>";
						echo "<td><center>" . $rowForGetData['createdAt'] . "</center></td>";
						echo "<td><center> <a href='editUser.php?id=".$row['id']."'>Edit</a> </center></td>";
						echo "</tr>";	
					}
				
				
				$index --;
			} */
		
		?>
		
		<div class="container">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" style="width:220px;" placeholder="Search by File/Folder Name" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		
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
	
	<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"featchForDocuments.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
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