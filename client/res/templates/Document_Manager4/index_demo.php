<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<!--Custom Font-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<script type="text/javascript">
			$(function() 
			{
				$(".search_button").click(function() 
				{
					var search_word = $("#search_box").val();
					var dataString = 'search_word='+ search_word;
					if(search_word=='')
					{
					}
					else
					{
						$.ajax({
							type: "GET",
							url: "searchingdata.php",
							data: dataString,
							cache: false,
							beforeSend: function(html) 
							{
								document.getElementById("insert_search").innerHTML = ''; 
								$("#flash").show();
								$("#searchword").show();
								$(".searchword").html(search_word);
								$("#flash").html('<img src="ajax-loader_2.gif" /> Loading Results...');
							},
							success: function(html){
								$("#insert_search").show();
								$("#insert_search").append(html);
								$("#flash").hide();
							}
						});
					}
					return false;
				});
			});
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</head>
	<body>
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="">
			<ul class="nav menu">
				<li class="active"><a href="#"><em class="fa fa-dashboard">&nbsp;</em> Files</a></li>
				<li><a href="createFolder.php"><em class="fa fa-calendar">&nbsp;</em> Create Folder</a></li>
				<li><a href="uploadFile.php"><em class="fa fa-bar-chart">&nbsp;</em> Upload File</a></li>
				<li><a href="documents.php"><em class="fa fa-toggle-off">&nbsp;</em> Documents</a></li>
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
				<li><a href="setDefaultSizeLimit.php"><em class="fa fa-file">&nbsp;</em> Set Default File Size</a></li>
			</ul>
		</div><!--/.sidebar--><br>
		<div class="col-sm-9 col-sm-offset-2 main" style="position:relative; width:150px;" >	
			<div class="container">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">Search</span>
						<input type="text" name="search_text" id="search_text" style="width:220px;" placeholder="Search by File/Folder Name" class="form-control" />
					</div>
				</div>
				<br/>
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
						url:"fetch.php",
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