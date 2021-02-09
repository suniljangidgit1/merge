<!DOCTYPE html>
<html>
<head>
	<title>SMS Reminder Listing</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- JQUERY JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


	<!-- CSS SECTION -->
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- TIMEPICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/bootstrap-clockpicker.min.css'); ?>">

    <!-- DATEPICKER -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>

	<!-- DATATABLE -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>

	<!-- CONFIRMJS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" />

	<!-- fonstawesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- BOOTSTRAP VALIDATION CSS -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>

	

	<!-- JS SECTION -->
	<!-- BOOTSTRAP -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- CKEDITOR -->
	<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>

    <!-- CLOCKPICKER -->
	<script src="<?php echo base_url('assets/dist/bootstrap-clockpicker.min.js'); ?>"></script>

	<!-- DATEPICKER -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" ></script>

	<!-- DATATABLE -->
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>

	<!-- CONFIRMJS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" ></script>

	<!-- BOOTSTRAP VALIDATION JS -->
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>


	<style >
		.help-block{
			color: red;
		}
		.input-group, input{
			margin-bottom: 5px;
		}
        table .text-left{
            text-align: left;
        }
        .loader{
            background: transparent;
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 10000;
            display: none;
        }
        .loader img{
            position: absolute;
            top: 50%;
            left: 50%;
            height: 10%;
            width: : 10%;
            transform: translate(-50%,-50%);
            z-index: 10000;
        }
	</style>

</head>
<body class="body">


<div class="loader">
    <img src="<?php echo base_url('assets/images/loading.gif') ?>">
</div>


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


	<div class="row mt-5">
		
		<div class="col-md-12">
			<button class="btn btn-primary addSmsModal" style="float: right;">+Add Reminder</button>
		</div>
		<hr>
		<hr>

		<div class="col-md-12">
			<div class="table-responsive">
				
				<table id="smsList" class="table table-striped table-hover">
					<thead>
						<th>Sr. No</th>
						<th>Mobile Number</th>
						<th>SMS Body</th>
						<th>Created Date</th>
						<th>Sent Date</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php if( !empty($sms_list) ){ ?>

							<?php foreach ($sms_list as $key => $value) { ?>

								<tr>
									<td><?php echo $key+1; ?></td>

									<td class="text-left"><?php echo $value["sr_mobileNo"]; ?></td>

									<td class="text-left"><?php echo $value["sr_smsBody"]; ?></td>


									<td class="text-left"><?php echo date( "d M Y", strtotime($value["sr_createdAt"]) ); ?></td>

									<td class="text-left"><?php echo date( "d M Y", strtotime($value["sr_sendSmsDateTime"]) ); ?></td>

									<td>
										
										<span class="label label-<?php echo ($value['sr_smsStatus'] != '1') ? 'warning' : 'success'; ?>"><?php echo ($value["sr_smsStatus"] != "1") ? "Pending" : "Sent" ?></span>
									</td>

									<td>
                                        <?php if($value['sr_smsStatus'] != "1" ){ ?>
                                            <?php base_url('reminder/editEmailReminder/').$value['sr_id']; ?>
                                            <a href="javascript:void(0);" data-id="<?php echo $value['sr_id']; ?>" class="editSmsModal" >Edit</a> | <a href="<?php echo base_url('reminder/smsChangeStatus/').$value['sr_id'].'/'.$value['sr_status']; ?>"><?php echo ($value["sr_status"] == "0") ? "Active" : "Inactive" ?></a>
                                        <?php }else{ ?>
                                            ---
                                        <?php } ?>

									</td>
								</tr>

							<?php } ?>

						<?php } ?>

						
					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>

<!-- add remainder modal -->
<div class="modal fade" id="addSmsReminderModal" role="dialog">
    <div class="modal-dialog model-emailwidth">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add SMS Reminder</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <form class="sms-reminder-form" id="add-sms-reminder-form" action="<?php echo base_url('reminder/smsAdd'); ?>" enctype="multipart/form-data" method="post" autocomplete="off" >

								<div class="row mrb-10">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<div id="filterDate2">
												<div class="input-group smsDate1" data-date-format="dd.mm.yyyy">
													<input  type="text" id="smsDate1" name="smsDate1" class="form-control" placeholder="Select Date" required onchange="smsDatecheck1()">
													<div class="btn-default_gray input-group-addon" >
														<span class="glyphicon glyphicon-calendar"></span>
													</div>
												</div>  
											</div>    
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="sms-clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true"> 
											<input type="text" required id="smsTime1" name="smsTime1" placeholder="Select Time" class="form-control" onchange="smsTimeCheck1()"/>
											<span class="btn-default_gray input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
										</div> 
									</div>
								</div>
								<div class="row mrb-10">
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="">
											<input class="form-control number-only" id="smsMobileNo1" maxlength="10" minlength="10" placeholder="Mobile Number" pattern="\d{10}" required type="text" name="smsMobileNo1"  />
										</div>
									</div>
								</div>
								<div class="row mrb-10">
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="mrt-10">
											<textarea class="form-control input-sm" id="smsBody1" placeholder="Message : Only 140 characters" required style="resize:none;" maxlength="140" cols="16" rows="10" name="smsBody1"></textarea>
										</div>
									</div>
								</div>
								<div class="row mrb-10">
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="mrt-5">
											<button type="submit" value="Save"  class="btn btn-orange pull-right" >Save</button>
										</div>
									</div>
								</div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- add remainder modal -->


<!-- edit remainder modal -->
<div class="modal fade" id="editSmsReminderModal" role="dialog">
    <div class="modal-dialog model-emailwidth">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Edit SMS Reminder</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <form class="sms-reminder-form" id="edit-sms-reminder-form" action="<?php echo base_url('reminder/smsEdit'); ?>" enctype="multipart/form-data" method="post" autocomplete="off" >
                                
                            	<input type="hidden" name="sr_id" id="sr_id" value="">
								<div class="row mrb-10">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<div id="filterDate2">
												<div class="input-group smsDate2" data-date-format="dd.mm.yyyy">
													<input  type="text" id="smsDate2" name="smsDate2" class="form-control" placeholder="Select Date" required onchange="smsDatecheck2()">
													<div class="input-group-addon" >
														<span class="glyphicon glyphicon-calendar"></span>
													</div>
												</div>  
											</div>    
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="sms-clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true"> 
											<input type="text" required id="smsTime2" name="smsTime2" placeholder="Select Time" class="form-control" onchange="smsTimeCheck2()"/>
											<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
										</div> 
									</div>
								</div>
								<div class="row mrb-10">
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="">
											<input class="form-control number-only" id="smsMobileNo2" maxlength="10" minlength="10" placeholder="Mobile Number" pattern="\d{10}" required type="text" name="smsMobileNo2"  />
										</div>
									</div>
								</div>
								<div class="row mrb-10">
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="mrt-10">
											<textarea class="form-control input-sm" id="smsBody2" placeholder="Message : Only 140 characters" required style="resize:none;" maxlength="140" cols="16" rows="10" name="smsBody2"></textarea>
										</div>
									</div>
								</div>
								<div class="row mrb-10">
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="mrt-5">
											<button type="submit" value="Save"  class="btn btn-orange pull-right" >Save</button>
										</div>
									</div>
								</div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- remainder modal -->

</body>
</html>



<script >

	// Datatable
	$("#smsList").DataTable({ 
		"columnDefs": [
			{ "orderable": false, "targets": [3,4] }
		],
	});

	// Modal open for add remainder
	$(".addSmsModal").click( function(){
		$("#add-sms-reminder-form").trigger("reset");
		$('#add-sms-reminder-form').bootstrapValidator('resetForm', true);
		$("#addSmsReminderModal").modal("show");
	});

	// Modal open for edit remainder
    $(document).on("click", ".editSmsModal", function(){

		var sr_id = $(this).data("id");
		getReminderSmsDetails(sr_id);

		$("#edit-sms-reminder-form").trigger("reset");
        $('#edit-sms-reminder-form').bootstrapValidator('resetForm', true);
		$("#editSmsReminderModal").modal("show");
	});

	// SMS Datetime Picker - Add
	$('.input-group .smsDate1').datepicker({format: "dd/mm/yyyy",}); 

	var sms_date_input1 	= $('input[name="smsDate1"]'); //our date input has the name "date"
	var sms_container1 		= $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	sms_date_input1.datepicker({
		format 			: 'dd/mm/yyyy',
		container 		: sms_container1,
		todayHighlight 	: true,
		autoclose 		: true,
		orientation		: "bottom",
		startDate		: new Date(),
 		endDate 		: new Date(new Date().setDate(new Date().getDate() + 365))
	});

	// SMS Datetime Picker - edit
	$('.input-group .smsDate2').datepicker({format: "dd/mm/yyyy",}); 

	var sms_date_input1 	= $('input[name="smsDate2"]'); //our date input has the name "date"
	var sms_container1 		= $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	sms_date_input1.datepicker({
		format 			: 'dd/mm/yyyy',
		container 		: sms_container1,
		todayHighlight 	: true,
		autoclose 		: true,
		orientation		: "bottom",
		startDate		: new Date(),
 		endDate 		: new Date(new Date().setDate(new Date().getDate() + 365))
	});


	// SMS time picker -add
	$('.sms-clockpicker').clockpicker();


</script>

<script >
	function getReminderSmsDetails(sr_id){

		$.ajax({
			type 		: "GET",
			url 		: "<?php echo base_url('reminder/smsRminderGet/'); ?>"+sr_id,
			dataType 	: "json",
			processData : false,
			contentType : false,
			success: function(data)
			{
				console.log(data);
				if(data.status == 'true'){

					$("#smsMobileNo2").val(data.data.sr_mobileNo);
					$("#smsBody2").val(data.data.sr_smsBody);
					$("#smsDate2").val(data.data.sr_reminderDate);
					$("#smsTime2").val(data.data.sr_reminderTime);
                    $("#sr_id").val(data.data.sr_id);

				}else{

					$.alert({
						title: 'Alert!',
						content: data.msg,
						type: 'dark',
						typeAnimated: true,
					});
				}
			}
		});
	}
</script>

<script >

  	function smsTimeCheck1(){
        var selectedText1 = document.getElementById('smsDate1').value;
    
        if(selectedText1==""){
            $.alert({
              	title: 'Alert!',
              	content: 'Please select date first',
               	type: 'dark',
               	typeAnimated: true
          	});
           	// alert("Please select date first");
           	document.getElementById('smsTime1').value="";
        }
    
        var parts1 =selectedText1.split('/');
		var selectedText1= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
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
    
  
    	if(dd== dd1 && mm==mm1 && yyyy==yyyy1){
			//alert("You have seleted todays date");

			var selectedTime 	= document.getElementById('smsTime1').value;
			var insertedTime	= new Date(selectedTime);
			//alert(selectedTime);
			var strArray 	= selectedTime.split(':');

			var selHRS		= strArray[0];
			var selMints	= strArray[1];

			var hrs 		= today.getHours();
			var mints 		= today.getMinutes();
			
      
			if(hrs>=selHRS){
			
				if(hrs == selHRS){
				  
				  	if(mints>selMints){
				   	
					   	$.alert({
					      	title: 'Alert!',
					      	content: 'Reminder can not be set for a past time',
					       	type: 'dark',
					       	typeAnimated: true,
					  	});
				  		document.getElementById('smsTime1').value='';
				  	}

				}else{

				  	$.alert({
				      	title: 'Alert!',
				      	content: 'Reminder can not be set for a past time',
				       	type: 'dark',
				       	typeAnimated: true,
				  	});
				  	document.getElementById('smsTime1').value='';
				}


			}
		}

		$('#add-sms-reminder-form').bootstrapValidator('revalidateField', 'smsTime1');
  	}


	var count=0;
  	function smsDatecheck1() {
	
    	count++;
    	
    	// if(count=="2"){
      		var selectedText = document.getElementById("smsDate1").value;
      		var parts =selectedText.split('/');
	   		var selectedText= parts[1]+"-"+parts[0]+"-"+parts[2];
      		var selectedDate = new Date(selectedText);
      		var now = new Date();
     
			now.setDate(now.getDate() - 1);
			
			if (now > selectedDate) {
				
				$.alert({
			      	title: 'Alert!',
			      	content: 'Reminder can not be set for a past date',
			       	type: 'dark',
			       	typeAnimated: true,
		  		});
				document.getElementById('smsDate1').value='';
				count=0;
			}else{
			  count=0;
			}
    	// }
    	$('#add-sms-reminder-form').bootstrapValidator('revalidateField', 'smsDate1');
  	}
</script>
	


<script >

  	function smsTimeCheck2(){
        var selectedText1 = document.getElementById('smsDate2').value;
    
        if(selectedText1==""){
            $.alert({
              	title: 'Alert!',
              	content: 'Please select date first',
               	type: 'dark',
               	typeAnimated: true
          	});
           	// alert("Please select date first");
           	document.getElementById('smsTime2').value="";
        }
    
        var parts1 =selectedText1.split('/');
		var selectedText1= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
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
    
  
    	if(dd== dd1 && mm==mm1 && yyyy==yyyy1){
			//alert("You have seleted todays date");

			var selectedTime 	= document.getElementById('smsTime2').value;
			var insertedTime	= new Date(selectedTime);
			//alert(selectedTime);
			var strArray 	= selectedTime.split(':');

			var selHRS		= strArray[0];
			var selMints	= strArray[1];

			var hrs 		= today.getHours();
			var mints 		= today.getMinutes();
			
      
			if(hrs>=selHRS){
			
				if(hrs == selHRS){
				  
				  	if(mints>selMints){
				   	
					   	$.alert({
					      	title: 'Alert!',
					      	content: 'Reminder can not be set for a past time',
					       	type: 'dark',
					       	typeAnimated: true,
					  	});
				  		document.getElementById('smsTime2').value='';
				  	}

				}else{

				  	$.alert({
				      	title: 'Alert!',
				      	content: 'Reminder can not be set for a past time',
				       	type: 'dark',
				       	typeAnimated: true,
				  	});
				  	document.getElementById('smsTime2').value='';
				}


			}
		}
		$('#edit-sms-reminder-form').bootstrapValidator('revalidateField', 'smsTime2');
  	}


	var count=0;
  	function smsDatecheck2() {
	
    	count++;
    	
    	// if(count=="2"){
      		var selectedText = document.getElementById("smsDate2").value;
      		var parts =selectedText.split('/');
	   		var selectedText= parts[1]+"-"+parts[0]+"-"+parts[2];
      		var selectedDate = new Date(selectedText);
      		var now = new Date();
     
			now.setDate(now.getDate() - 1);
			
			if (now > selectedDate) {
				
				$.alert({
			      	title: 'Alert!',
			      	content: 'Reminder can not be set for a past date',
			       	type: 'dark',
			       	typeAnimated: true,
		  		});
				document.getElementById('smsDate2').value='';
				count=0;
			}else{
			  count=0;
			}
    	// }
    	$('#edit-sms-reminder-form').bootstrapValidator('revalidateField', 'smsDate2');
  	}
</script>
	


<script>

	// Save details in databse - Add

	$("#add-sms-reminder-form").bootstrapValidator({
		
		message: 'Please enter valid input',
        feedbackIcons: { },
        excluded: [':disabled'],
        fields: {
            "smsDate1": {
                validators: {
                    notEmpty: {
                        message: 'The date is required and cannot be empty'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The date format is not valid'
                    },
                }
            },
            "smsTime1": {
                validators: {
                    notEmpty: {
                        message: 'The time is required and cannot be empty'
                    },
                }
            },
            "smsMobileNo1": {
                validators: {
                    notEmpty: {
                        message: 'The mobile is required and cannot be empty'
                    },
                }
            },
            "smsBody1": {
                validators: {
                    notEmpty: {
                        message: 'The body is required and cannot be empty'
                    },
                }
            },
        },

	}).on('success.form.bv', function (event, data) {
		
		$(".loader").show();

		// Prevent form submission
		event.preventDefault();

		var form  = $(this);
		var url   = form.attr('action');
		form      = new FormData(form[0]);

		$.ajax({
			type 		: "POST",
			url 		: url,
			data 		: form,
			dataType 	: "json",
			processData : false,
			contentType : false,
			success: function(data)
			{
				// console.log(data);
				$(".loader").hide();
				if(data.status == 'true'){
					$.alert({
						title: 'Success!',
						content: data.msg,
						type: 'dark',
						typeAnimated: true,
					});
					setInterval(function(){ 
						window.location.reload();
					}, 2000);

				}else{
					$.alert({
						title: 'Alert!',
						content: data.msg,
						type: 'dark',
						typeAnimated: true,
					});
				}
			}
		});

		return false;
	});
	

	// Save details in databse - Edit

	$("#edit-sms-reminder-form").bootstrapValidator({
		
		message: 'Please enter valid input',
        feedbackIcons: { },
        excluded: [':disabled'],
        fields: {
            "smsDate2": {
                validators: {
                    notEmpty: {
                        message: 'The date is required and cannot be empty'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The date format is not valid'
                    },
                }
            },
            "smsTime2": {
                validators: {
                    notEmpty: {
                        message: 'The time is required and cannot be empty'
                    },
                }
            },
            "smsMobileNo2": {
                validators: {
                    notEmpty: {
                        message: 'The mobile is required and cannot be empty'
                    },
                }
            },
            "smsBody2": {
                validators: {
                    notEmpty: {
                        message: 'The body is required and cannot be empty'
                    },
                }
            },
        },

	}).on('success.form.bv', function (event, data) {
		
		$(".loader").show();

		// Prevent form submission
		event.preventDefault();

		var form  = $(this);
		var url   = form.attr('action');
		form      = new FormData(form[0]);

		$.ajax({
			type 		: "POST",
			url 		: url,
			data 		: form,
			dataType 	: "json",
			processData : false,
			contentType : false,
			success: function(data)
			{
				// console.log(data);
				$(".loader").hide();

				if(data.status == 'true'){
					$.alert({
						title: 'Success!',
						content: data.msg,
						type: 'dark',
						typeAnimated: true,
					});
					setInterval(function(){ 
						window.location.reload();
					}, 2000);

				}else{
					$.alert({
						title: 'Alert!',
						content: data.msg,
						type: 'dark',
						typeAnimated: true,
					});
				}
			}
		});

		return false;
	});
	


 </script> 
