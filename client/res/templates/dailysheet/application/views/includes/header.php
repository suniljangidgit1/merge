<!DOCTYPE html>
<html>
<head>
  <title><?php echo isset($title) ? $title : "Fincrm"; ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--   <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
 -->
  <link href="<?php echo base_url()?>assets/Roboto/Roboto.css" rel="stylesheet">

  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- CONFIRMJS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/confirm-css/jquery-confirm.min.css" />
  <!-- BOOTSTRAP VALIDATION CSS -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" > -->

  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/boostrapValidator/bootstrapValidator.min.css" >

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/daily_sheets.css'); ?>">
  <!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url('assets/css/edit_daily_sheet.css'); ?>"> -->

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/morris.js/morris.css"> -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="shortcut icon" href="<?php echo base_url()?>assets/dist/img/favicon.ico">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/fonts/openSans.css">

<!-- dataTables CSS -->

 <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/dataTables.bootstrap4.min.css"> -->

<link href="<?php echo base_url()?>assets/datepicker/datepicker.css" rel="stylesheet" type="text/css" />
 <!-- Datepicker script -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dist/time_picker/bootstrap-clockpicker.min.css">
<link href="<?php echo base_url()?>assets/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/daterangepicker.css" />
<link href="<?php echo base_url()?>assets/icons/google-material.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
 -->
<!-- DATATABLE -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.dataTables.min.css">

<link href="assets/css/calender_css/ion.calendar.css" rel="stylesheet" type="text/css"> 

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/customA11ySelect.css">


<!-- jQuery 3 -->



<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/select2.min.js"></script>
<!-- Morris.js charts -->
<!-- <script src="<?php echo base_url()?>assets/bower_components/raphael/raphael.min.js"></script> -->
<!-- <script src="<?php echo base_url()?>assets/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>

<!-- dataTables Script -->
    <!-- <script src="<?php echo base_url()?>assets/dist/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url()?>assets/dist/js/dataTables.buttons.min.js"></script> -->

<!-- FONT AWESOME -->
    <script src="<?php echo base_url()?>assets/icons/fontawesome.js"></script>
<!-- BOOTSTRAP VALIDATION JS -->
 <!--  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script> -->

<!-- progress bar js -->
<script src="<?php echo base_url()?>assets/file-upload/jquery.fileupload.js"></script>
  <script src="<?php echo base_url()?>assets/file-upload/jquery.iframe-transport.js"></script>
<!-- progress bar js -->

<script src="<?php echo base_url()?>assets/css/boostrapValidator/bootstrapValidator.min.js" ></script>


 <!-- CONFIRMJS -->
  <script src="<?php echo base_url()?>assets/js/confirm-js/jquery-confirm.min.js" ></script>
    <!-- datatables -->
    <!-- <script src="<?php echo base_url()?>assets/js/dataTables.buttons.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script> -->
    <script src="<?php echo base_url()?>assets/js/pdfjs/jszip.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vfs_fonts.js"></script>
   <!--  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> -->


<!-- CKEditor-->
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/ckeditor/ckeditor.js"></script>

<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker/bootstrap-datepicker.js"></script>


<script type="text/javascript" src="<?php echo base_url()?>assets/dist/time_picker/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/daterangepicker.min.js"></script>

<!-- dataTables Script -->
    <script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>

<!-- customA11ySelect js -->
 <script src="<?php echo base_url()?>assets/js/customA11ySelect.js"></script>    

<script src="<?php echo base_url()?>assets/js/orgchart.js"></script>
<script type="text/javascript">

/*$(document).ready(function() {
   $('#example').dataTable( {

      dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  
} );
} );*/


</script>
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> -->



</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
