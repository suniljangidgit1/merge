<!DOCTYPE html>
<html>
<head>
	<title>Email Reminder Listing</title>

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
			<button class="btn btn-primary addModal" style="float: right;">+Add Reminder</button>
		</div>
		<hr>
		<hr>

		<div class="col-md-12">
			<div class="table-responsive">
				
				<table id="emailList" class="table table-striped table-hover">
					<thead>
						<th>Sr. No</th>
						<th>Subject</th>
						<th>To</th>
						<th>CC</th>
						<th>Created Date</th>
						<th>Sent Date</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php if( !empty($email_list) ){ ?>

							<?php foreach ($email_list as $key => $value) { ?>

								<tr>
									<td><?php echo $key+1; ?></td>

									<td class="text-left"><?php echo $value["er_subject"]; ?></td>

									<td class="text-left"><?php echo $value["er_emailTo"]; ?></td>

									<td class="text-left"><?php echo $value["er_emailCc"]; ?></td>

									<td class="text-left"><?php echo date( "d M Y", strtotime($value["er_createdAt"]) ); ?></td>

									<td class="text-left"><?php echo date( "d M Y", strtotime($value["er_sendEmailDateTime"]) ); ?></td>

									<td>
										
										<span class="label label-<?php echo ($value['er_emailStatus'] != '1') ? 'warning' : 'success'; ?>"><?php echo ($value["er_emailStatus"] != "1") ? "Pending" : "Sent" ?></span>
									</td>

									<td>
                                        <?php if($value['er_emailStatus'] != "1" ){ ?>
                                            <?php base_url('reminder/editEmailReminder/').$value['er_id']; ?>
                                            <a href="javascript:void(0);" data-id="<?php echo $value['er_id']; ?>" class="editModal" >Edit</a> | <a href="<?php echo base_url('reminder/emailChangeStatus/').$value['er_id'].'/'.$value['er_status']; ?>"><?php echo ($value["er_status"] == "0") ? "Active" : "Inactive" ?></a>
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
<div class="modal fade" id="addReminderModal" role="dialog">
    <div class="modal-dialog model-emailwidth">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Add Email Reminder</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <form class="reminder-form" id="add-reminder-form" action="<?php echo base_url('reminder/emailAdd'); ?>" enctype="multipart/form-data" method="post" autocomplete="off" >
                                <!-- <h2 class="text-center">Email Reminder</h2> -->
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="input-group">
                                            <!-- <label>Date:</label> -->
                                            <input class="form-control" required date-format="dd/mm/yyyy" id="date" name="date" placeholder="Select Date" type="text" onchange="checkDate()" />
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <!-- <label>Email:</label> -->
                                        <div class="clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                            <input type="text" required name="time" id="time" placeholder="Select Time" class="form-control" onchange="checkTime()" />
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                        <script type="text/javascript">
                                            $('.clockpicker').clockpicker();
                                        </script>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="mrt-5">
                                            <input type="email" id="to" name="to" class="form-control" placeholder="To:" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="mrt-5">
                                            <input type="email" name="cc" placeholder="CC:" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="mrt-5">
                                            <input type="text" name="subject" placeholder="Subject" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="mrt-5">
                                            <textarea class="ckeditor" cols="0" id="editor1" name="editor1" rows="0"></textarea>
                                            <script>
                                                CKEDITOR.replace('editor1');
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="row mrt-10">
                                            <div class="col-xs-12 col-sm-12 col-md-2">
                                                <div class="clip-upload">
                                                    <label for="file-input">
                                                        <span class="btn"><i class="fa fa-paperclip fa-lg" style="color:black; font-size:21px;" aria-hidden="true"></i></span>
                                                    </label>

                                                    <input type="file" class="file-input hide" multiple name="attachment[]" onchange="getFileInfo()" id="file-input" />
                                                    <div class="filename-container hide"></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-10">
                                                <input type="text" id="fileName" name="" style="border:none" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="mrt-10 file_name_append">
										<!-- dynamic name append. -->
									</div>
								</div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="mrt-10">
										<!-- <button type="submit" value="Save" class="btn btn-orange pull-right" onclick="saveEmailReminder()">Save</button> -->
										<button type="submit" value="Save" class="btn btn-orange pull-right" >Save</button>
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
<div class="modal fade" id="editReminderModal" role="dialog">
    <div class="modal-dialog model-emailwidth">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Edit Email Reminder</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <form class="reminder-form" id="edit-reminder-form" action="<?php echo base_url('reminder/emailEdit'); ?>" enctype="multipart/form-data" method="post" autocomplete="off" >
                                <!-- <h2 class="text-center">Email Reminder</h2> -->
                                <input type="hidden" name="er_id" id="er_id" value="">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="input-group">
                                            <!-- <label>Date:</label> -->
                                            <input class="form-control" required date-format="dd/mm/yyyy" id="date1" name="date1" placeholder="Select Date" type="text" onchange="checkDate1()" />
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <!-- <label>Email:</label> -->
                                        <div class="clockpicker1 input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                            <input type="text" required name="time1" id="time1" placeholder="Select Time" class="form-control" onchange="checkTime1()" />
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                        <script type="text/javascript">
                                            $('.clockpicker1').clockpicker();
                                        </script>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="mrt-5">
                                            <input type="email" id="to1" name="to1" class="form-control" placeholder="To:" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="mrt-5">
                                            <input type="email" id="cc1" name="cc1" placeholder="CC:" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="mrt-5">
                                            <input type="text" id="subject1" name="subject1" placeholder="Subject" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="mrt-5">
                                            <textarea class="ckeditor" cols="0" id="editor2" name="editor2" rows="0"></textarea>
                                            <script>
                                                CKEDITOR.replace('editor2');
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="row mrt-10">
                                            <div class="col-xs-12 col-sm-12 col-md-2">
                                                <div class="clip-upload">
                                                    <label for="file-input1">
                                                        <span class=""><i class="fa fa-paperclip fa-lg" style="color:black; font-size:21px;" aria-hidden="true"></i></span>
                                                    </label>

                                                    <input type="file" class="file-input1 hide" multiple name="attachment1[]" onchange="getFileInfo1()" id="file-input1" />
                                                    <div class="filename-container hide"></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-10">
                                                <input type="text" id="fileName1" name="" style="border:none" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
    									<div class="mrt-10 file_name_exists">
    										<!-- dynamic name append. -->
    									</div>
                                        <div class="mrt-10 file_name_append1">
                                            <!-- dynamic name append. -->
                                        </div>
    								</div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
    									<div class="mrt-10">
    										<button type="submit" value="Save" class="btn btn-orange pull-right" >Update</button>
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
	$("#emailList").DataTable({
        "columnDefs": [
            { "orderable": false, "targets": [4,5] }
        ],
    });

	// Modal open for add remainder
	$(".addModal").click( function(){
		$('#add-reminder-form').bootstrapValidator('resetForm', true);
		$("#add-reminder-form").trigger("reset");
		CKEDITOR.instances.editor1.setData('');
		$("#addReminderModal").modal("show");
	});

	// Modal open for edit remainder
	// $(".editModal").click( function(){
    $(document).on("click", ".editModal", function(){

		var er_id = $(this).data("id");
		getReminderEmailDetails(er_id);

        $('#edit-reminder-form').bootstrapValidator('resetForm', true);
		$("#edit-reminder-form").trigger("reset");
		CKEDITOR.instances.editor2.setData('');
		$("#editReminderModal").modal("show");
	});



	function getReminderEmailDetails(er_id){

		$.ajax({
			type 		: "GET",
			url 		: "<?php echo base_url('reminder/emailRminderGet/'); ?>"+er_id,
			dataType 	: "json",
			processData : false,
			contentType : false,
			success: function(data)
			{
				// console.log(data);
				if(data.status == 'true'){

					$("#date1").val(data.data.er_sendEmailDate);
					$("#time1").val(data.data.er_sendEmailTime);
					$("#to1").val(data.data.er_emailTo);
					$("#cc1").val(data.data.er_emailCc);
					$("#subject1").val(data.data.er_subject);
                    $("#er_id").val(data.data.er_id);

                    var array = data.data.er_fileName.split(',');
                    // console.log(array);
                    console.log(array.length);

                    if( array.length > 0 ){
                        $.each(array, function( index, value ) {

                            if( value != "" ){
                                $(".file_name_exists").append("<p> "+value+" <i class='fa fa-trash unlinkFile ' data-id='"+data.data.er_id+"' data-name='"+value+"'  aria-hidden='true' ></i></p>");
                            }
                        });
                    }
					// $("#editor2").val(data.data.er_emailBody);
					CKEDITOR.instances.editor2.setData(data.data.er_emailBody);

				}else{


				}
			}
		});
	}

    // Delete file from directory
    $(document).on("click", ".unlinkFile", function(){
        
        var er_id       = $(this).data("id");
        var er_fileName = $(this).data("name");
        $(this).parent().remove();
        console.log(er_fileName);

        $.ajax({
            type        : "POST",
            url         : "<?php echo base_url(); ?>/reminder/unlinkFile",
            data        : { er_id : er_id , er_fileName : er_fileName },
            dataType    : "json",
            /*processData : false,
            contentType : false,*/
            success: function(data)
            {
                console.log(data);
                if(data.status == 'true'){
                    $.alert({
                        title: 'Success!',
                        content: data.msg,
                        type: 'dark',
                        typeAnimated: true,
                    });

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

    });
       
	
	// Datetime Picker - Add
	$('.input-group.date').datepicker({format: "dd/mm/yyyy",}); 

	var date_input 	= $('input[name="date"]'); //our date input has the name "date"
	var container 	= $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	date_input.datepicker({
		format 			: 'dd/mm/yyyy',
		container 		: container,
		todayHighlight 	: true,
		autoclose 		: true,
		orientation		: "bottom",
		startDate		: new Date(),
 		endDate 		: new Date(new Date().setDate(new Date().getDate() + 365))
	});



	// Datetime Picker - Edit
	$('.input-group.date1').datepicker({format: "dd/mm/yyyy",}); 

	var date_input1 	= $('input[name="date1"]'); //our date input has the name "date"
	var container1 		= $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	date_input1.datepicker({
		format 			: 'dd/mm/yyyy',
		container 		: container1,
		todayHighlight 	: true,
		autoclose 		: true,
		orientation		: "bottom",
		startDate		: new Date(),
 		endDate 		: new Date(new Date().setDate(new Date().getDate() + 365))
	});

	// Display selected file name - Add
	function getFileInfo(){
        
        $(".file_name_append").html("");
        var files = $('#file-input').prop("files");
        var names = $.map(files, function(val) { 
        	$(".file_name_append").append("<p>"+val.name+"</p>");
        });

  	}		

	// Display selected file name - Edit
	function getFileInfo1(){
        
        $(".file_name_append1").html("");
        var files = $('#file-input1').prop("files");
        var names = $.map(files, function(val) { 
        	$(".file_name_append1").append("<p>"+val.name+"</p>");
            console.log(val.name);
        });

  	}		
	

</script>

<script >

	var count=0;
	function checkDate() {
       
		count++;

		// if(count=="2"){

			var selectedText = document.getElementById("date").value;
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

				document.getElementById('date').value='';
				count=0;
			}else{
				count=0;
			}
		// }
        $('#add-reminder-form').bootstrapValidator('revalidateField', 'date');
	}


	function checkTime(){
		
		var selectedText1 = document.getElementById('date').value;

		if(selectedText1==""){
			$.alert({
				title: 'Alert!',
				content: 'Please select date first',
				type: 'dark',
				typeAnimated: true
			});
			// alert("Please select date first");
			document.getElementById('time').value="";
		}

		var parts1 			= selectedText1.split('/');
		var selectedText1 	= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
		var selectedDate1 	= new Date(selectedText1);
		var today 			= new Date();

		var dd1 	= selectedDate1.getDate();
		var mm1 	= selectedDate1.getMonth()+1; 
		var yyyy1 	= selectedDate1.getFullYear();

		var dd 		= today.getDate();
		var mm 		= today.getMonth()+1; 
		var yyyy 	= today.getFullYear();


		if(dd== dd1 && mm==mm1 && yyyy==yyyy1){

			var selectedTime= document.getElementById('time').value;
			var insertedTime= new Date(selectedTime);

			var strArray= selectedTime.split(':');

			var selHRS= strArray[0];
			var selMints= strArray[1];

			var hrs= today.getHours();
			var mints= today.getMinutes();
		

			if(hrs>=selHRS){
				
				if(hrs == selHRS){

					if(mints>selMints){

						$.alert({
							title: 'Alert!',
							content: 'Reminder can not be set for a past time',
							type: 'dark',
							typeAnimated: true
						});

						document.getElementById('time').value='';
					}
				}else{
				
					$.alert({
						title: 'Alert!',
						content: 'Reminder can not be set for a past time',
						type: 'dark',
						typeAnimated: true
					});
					document.getElementById('time').value='';
				}


			}
		}
        $('#add-reminder-form').bootstrapValidator('revalidateField', 'time');
	}


</script>


<script >

  	function checkTime1(){
        var selectedText1 = document.getElementById('date1').value;
    
        if(selectedText1==""){
            $.alert({
                  title: 'Alert!',
                  content: 'Please select date first',
                   type: 'dark',
                   typeAnimated: true
              });
           // alert("Please select date first");
            document.getElementById('time1').value="";
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

			var selectedTime 	= document.getElementById('time1').value;
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

				  
				  		document.getElementById('time1').value='';
				  	}

				}else{

				  	$.alert({
				      	title: 'Alert!',
				      	content: 'Reminder can not be set for a past time',
				       	type: 'dark',
				       	typeAnimated: true,
				  	});
				  	document.getElementById('time1').value='';
				}


			}
		}
        $('#edit-reminder-form').bootstrapValidator('revalidateField', 'time1');
  	}


	var count=0;
  	function checkDate1() {
	
    	count++;
    	
    	// if(count=="2"){
      		var selectedText = document.getElementById("date1").value;
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
				document.getElementById('date1').value='';
				count=0;
			}else{
			  count=0;
			}
    	// }
        $('#edit-reminder-form').bootstrapValidator('revalidateField', 'date1');
  	}
</script>


<script>
	/*function saveEmailReminder(){
		
		var salDate = document.getElementById('date').value;
		var salTime = document.getElementById('time').value;
		var to 		= document.getElementById('to').value;

		if( salDate!="" && salTime!="" && to!="" ){
		
			$.alert({
				title: 'Success!',
				content: 'Reminder saved successfully !!',
				type: 'dark',
				typeAnimated: true,
			});
		}else{
			
			$.alert({
				title: 'Warning!',
				content: 'Please enter required fields',
				type: 'dark',
				typeAnimated: true,
			});
		}

	}*/

	

	// Save details in databse - Add

	$("#add-reminder-form").bootstrapValidator({
		
		message: 'Please enter valid input',
        feedbackIcons: { },
        excluded: [':disabled'],
        fields: {
            "date": {
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
            "time": {
                validators: {
                    notEmpty: {
                        message: 'The time is required and cannot be empty'
                    },
                }
            },
            "to": {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                }
            },
            "cc": {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                }
            },
        },

	}).on('success.form.bv', function (event, data) {
		
        $(".loader").show();
        CKEDITOR.instances.editor1.updateElement();

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

	$("#edit-reminder-form").bootstrapValidator({
        
        message: 'Please enter valid input',
        feedbackIcons: { },
        excluded: [':disabled'],
        fields: {
            "date1": {
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
            "time1": {
                validators: {
                    notEmpty: {
                        message: 'The time is required and cannot be empty'
                    },
                }
            },
            "to1": {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                }
            },
            "cc1": {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                }
            },
        },

    }).on('success.form.bv', function (event, data) {
        
        $(".loader").show();
        CKEDITOR.instances.editor2.updateElement();

        // Prevent form submission
        event.preventDefault();

        var form  = $(this);
        var url   = form.attr('action');
        form      = new FormData(form[0]);

        $.ajax({
            type        : "POST",
            url         : url,
            data        : form,
            dataType    : "json",
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
