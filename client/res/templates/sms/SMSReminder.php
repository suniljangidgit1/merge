<?php
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>SMS Reminder</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
		<script src="ckeditor/ckeditor.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/github.min.css">
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
		<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>
		<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
		<!--Font Awesome (added because you use icons in your prepend/append)-->
		<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
		<!-- Inline CSS based on choices in "Settings" tab -->
		<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
		
		<style>
			.rounded {
				height: 30px;
				border-radius: 4px;
				padding: 4px;
			}
			.in1 {
				width: 120px;
			}				
			.in2 {
				width: 350px;
			}
			i {
				margin: 0 8px;
			}
			.filename-container {
				margin: 20px 20px 0 0;
			}
			.filename {
				display: inline-block;
				padding: 0 10px;
				margin-right: 10px;
				background-color: #ccc;
				border: 1px solid black;
				border-radius: 15px;
				height: 20px;
				line-height: 20px;
				text-align: center;
				font-weight: 700;
				font-size: 12px;
				font-family: 'verdana', sans-serif;
			}
			.hide {
				display: none;
			}
		</style>
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
		
		<script>
			$(document).ready(function() {
				$('.file-input').change(function() {
					$file = $(this).val();
					$file = $file.replace(/.*[\/\\]/, ''); //grab only the file name not the path
					$('.filename-container').append("<span  class='filename'>" + $file + "</span>").show();
				})
			})
		</script>	
		<script>
			function getFileInfo(){
				var name=document.getElementById('file-input').value;
				document.getElementById('fileName').value=name;
			}
		</script>
		<script >
			function checkDate() {
				var selectedText = document.getElementById('date').value;
				var selectedDate = new Date(selectedText);
				var now = new Date();
				now.setDate(now.getDate() - 1);
				if (now > selectedDate) {
					alert("Date must be in the future");
					document.getElementById('date').value='';
				}
			}
		</script>
		<script>
			function checkTime(){
				//alert("HIII");
				var selectedText1 = document.getElementById('date').value;
				//alert(selectedText1);
				var selectedDate1 = new Date(selectedText1);
				//alert(selectedDate1);	
				var today = new Date();
				//alert(today);
				
				var dd1= selectedDate1.getDate();
				var mm1 = selectedDate1.getMonth()+1; 
				var yyyy1 = selectedDate1.getFullYear();
				
				var dd = today.getDate();
				var mm = today.getMonth()+1; 
				var yyyy = today.getFullYear();
				
				//alert(dd1);
				//alert(mm1);
				//alert(yyyy1);
				
				if(dd== dd1 && mm==mm1 && yyyy==yyyy1){
					//alert("You have seleted todays date");
					
					var selectedTime= document.getElementById('time').value;
					var insertedTime= new Date(selectedTime);
					//alert(selectedTime);
					var strArray= selectedTime.split(':');
					
					var selHRS= strArray[0];
					var selMints= strArray[1];
				
					var hrs= today.getHours();
					var mints= today.getMinutes();
					//alert(hrs);
					//alert(mints);
					//alert("SELECTED HRS= "+selHRS + " CURRENT HRS=> "+hrs);
					//alert("SELECTED MINTS= "+selMints + " CURRENT MINITS=> "+mints);
					
					if(hrs>=selHRS){
						//alert("selected time is must be feature time");
						//alert("CURRENT HRS-> "+hrs+ " SELECTED HRS-> "+ selHRS);
						if(hrs == selHRS){
							//alert("CURRENT M-> "+mints+ " SELECTED HRS-> "+ selMints);
							if(mints>selMints){
							alert("selected time is must be feature time");
							document.getElementById('time').value='';
							}
						}else{
							alert("selected time is must be feature time");
							document.getElementById('time').value='';
						}
						
						
					}
					
					/* var systemTime= today.getTime();
					var selTime=insertedTime.getTime();
					
					alert("SYSTEM TIME= "+systemTime);
					alert("SELECTED TIME= "+selTime);
					
					if(hrs<strArray[0] && mints<strArray[1]){
						alert("selected time is must be feature time");
					}
					 */
					
				}
			}
		</script>
		
	</head>
	<body>
		<div class="form-group border border-light" style="position:absolute; left:20px; top:20px; width:500px; background-color:#efefef;">
			<center><h4>SMS Reminder</h4></center>
			<form action="saveSMSReminder.php" method="post">
				<table class="table">
					<tr>
						<td>Date:</td>
						<td>
							<div style="position:relative; width:150px;">
							<input class="form-control input-sm" placeholder="Select Date" onchange="checkDate()" required type="text" id="date" name="date" />
							</div>
						</td>
					
						<td>Time:</td>
						<td>
							<div class="input-group clockpicker" style="width:180px;" data-placement="bottom" data-align="top" data-autoclose="true">
							<input class="form-control input-sm" id="time" onchange="checkTime()" placeholder="Select time" required type="text" name="time" />
							</div>
						</td>
						<script type="text/javascript">
							$('.clockpicker').clockpicker();
						</script>
					</tr>
					<tr>
						<td>Mobile No.</td>
						<td colspan="3">
							<input class="form-control input-sm" placeholder="Enter Mobile Number(0000000000,1111111111,2222222222)" required type="text" name="mobileNO" />
						</td>
					</tr>
					<tr>
						<td>SMS Body</td>
						<td colspan="3">
							<textarea class="form-control input-sm" required style="resize:none;" maxlength="140" cols="20" rows="10" name="smsbody"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<input class="btn btn-success" type="submit" value="Save Reminder"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'mm/dd/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
			orientation: "top" 
		})
	})
</script>
	</body>
</html>