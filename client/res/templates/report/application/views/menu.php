<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Reminder menu's</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<!-- JQUERY JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


	<!-- CSS SECTION -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- TIMEPICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/bootstrap-clockpicker.min.css'); ?>">
    <!-- DATEPICKER -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>


	<!-- JS SECTION -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- CKEDITOR -->
	<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
    <!-- CLOCKPICKER -->
	<script src="<?php echo base_url('assets/dist/bootstrap-clockpicker.min.js'); ?>"></script>
	<!-- DATEPICKER -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" ></script>

</head>
<body class="body">

<div class="container text-center mt-5">
	<div class="row">
		<div class="col-md-12">
			<ul class="list-group">
				<li class="list-group-item">
					<a href="<?php echo base_url('reminder/emailList'); ?>"> Email Reminder</a>
				</li>
				<li class="list-group-item">
					<a href="<?php echo base_url('reminder/smsList'); ?>"> SMS Reminder</a>
				</li>
			</ul>
		</div>
	</div>
</div>


</body>
</html>