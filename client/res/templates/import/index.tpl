<div class="page-header" style="background-color: transparent;">
	<div class="row">
	    <div class="col-lg-7 col-sm-7">
	        <h3>{{translate 'Import' category='scopeNames'}}</h3>
	    </div>
	    <div class="col-lg-5 col-sm-5">
	        <div class="header-buttons btn-group pull-right">
				<a href="#ImportResult" class="btn btn-primary">
					{{translate 'Import Results' scope='Import'}}</a>
	        </div>
	    </div>
	</div>
</div>

<!-- <div class="import-container">
   {{{step}}}
</div> -->

<div class="New-Import-container">
	<div class="panel panel-default">
            <div class="panel-heading"><h4 class="panel-title">What to Import?</h4></div>
            <div class="panel-body panel-body-form">
            	<form enctype="multipart/form-data" method="post" id="choose-import-file">
	                <div class="row">
	                    <div class="col-sm-4 form-group cell">
	                        <label class="control-label">Entity Type</label>
	                        <select class="form-control importEntityType import-entity-type" id="NewimportEntityType" name="import-entity-type">
	                            <option value="">Select Entity Type</option>
	                        </select>
	                        <span class="text-danger importEntityType-error" style="display: none;">Please select entity type</span>
	                    </div>
	                    <div class="col-sm-4 form-group cell upload-section">
	                        <label class="control-label">File (.CSV)</label>
	                        <div>

	                         <input type="file" name="import_file" value="" id="NewimportFile" accept=".csv" required>
	                        </div>
	                        <span class="text-danger temp-error" style="display: none;">Please select .csv file.</span>
	                    </div>
	                </div>

	                <!-- begin -->
	                <div class="row">
	                	<div class="col-12  col-sm-12 col-md-12">
	                		<div class="bg bg-danger" style="padding: 10px;margin-bottom:10px;">
		                		<p>Note :</p>
		                		<p>1) Maximum 5,000 records can be imported at a time.</p>
		                	    <p>2) Make sure the first row contains field labels like Name, Email etc. to import data properly.</p>
		                	    <p>3) While uploading csv file with date column please enter date in "DD/MM/YYYY" format (Example: 28/06/2020).</p>
	                		</div>
	                	</div>
	                </div>
	                <!-- end -->

                </form>
            </div>
    </div>
    <div class="ImportFieldMapping">
    	<form method="POST" action="../../../../client/res/templates/custom_import/runImport.php" id="run-import">
			<div class="panel panel-default">
		        <div class="panel-heading"><h4 class="panel-title">Field Mapping</h4></div>
		        <div class="panel-body">
		            <div id="fieldmappingcontainer">
		            	<table class="table table-bordered" style="table-layout: fixed;">
		        			<thead>
		        				<tr>
									<th width="25%" style="border-bottom: 0px;">Header Row Value</th>
									<th width="25%" style="border-bottom: 0px;">Field</th>
									<th style="border-bottom: 0px;">First Row Value</th>
								</tr>
		        			</thead>
							<tbody class="Mapping-section" id="import-field-mapping">
							</tbody>
						</table>
					</div>
		        </div>
		    </div>

		    <div class="panel panel-default">
		        <div class="panel-heading"><h4 class="panel-title">Default Values</h4></div>
		        <div class="panel-body">
					<div id="import-default-values">
						<div class="cell form-group col-sm-3 import-default-values-main assigned_user_group">
							<label class="control-label">Assigned User
							</label>
							<select class="form-control Assigned_User" id="Assigned_User" name="assign_user">
							</select>
						</div>
						<div class="cell form-group col-sm-3 import-default-values-main team_group">
							<label class="control-label">Team
							</label>
							<select class="form-control team" id="team" name="team">
							</select>
						</div>
						

					</div>
				</div>
		    </div>

		    <div style="padding-bottom: 10px;" class="clearfix">
		        <button class="btn btn-danger pull-right RunImport" type="button">Run Import</button>
		    </div>
	   </form>
    </div>
</div> <!-- container close -->

<div class="bg-style import-progress-loader " style="display:none;">
  	<div class="vertical-centered-box">
		<div class="content"> Importing ...
			<div class="loader-circle"></div>
			<div class="loader-line-mask">
			   <div class="loader-line"></div>
			</div>
		</div>
 	</div>
</div>

<div class="import-blur-effect" style="display: none;"></div>

<script type="text/javascript">

$('.ImportFieldMapping').hide();
$('.import-data-loader').hide();
$('.importEntityType-error').hide();

var entityName  = '';
var fileName    = '';
var importLogId = '';
var field_default_value;

$(document).ready(function(){
    $("#NewimportFile").change(function(){
    	var import_entity_type = $("#NewimportEntityType-button #NewimportEntityType-selected").text();
    	if(import_entity_type == 'Select Entity Type'){
    		$('.importEntityType-error').show();
    		$('#NewimportFile').val("");
    	}else{
    			//upload file
    			var form  = $('#choose-import-file');
			    var url   = form.attr('action');
			    form      = new FormData(form[0]);
			    jQuery.each(jQuery('#NewimportFile')[0].files, function(i, file) {
			      form.append('import_file['+i+']', file);
			    }); 
				
				var fileCancleCheck  = $('#NewimportFile').val();

			    if(fileCancleCheck){

			    $.ajax({
				      type    : "POST",
				      url     : '../../../../client/res/templates/custom_import/getImportFile.php',
				      data    : form,
				      dataType  : "json",
				      processData : false,
				      contentType : false,
				      success: function(data) {

				        if(data.status == 'true'){
				        	
				        	$('.ImportFieldMapping').show();
				        	$('#import-field-mapping').html(data.fieldMapping);
				        	$(".fieldmappingselect").customA11ySelect();
				        	
				        	$('#Assigned_User').empty();
				        	$('#Assigned_User').html(data.assignedUsers);
				        	$(".Assigned_User").customA11ySelect();

				        	// reset assigned user start
					           var current = $(".assigned_user_group");
							   var id      = $(".assigned_user_group .custom-a11yselect-menu li:first").attr("id");
						       var text    = $(".assigned_user_group .custom-a11yselect-menu li:first button").text();
						       reset(current,id,text);
				        	// reset assigned user end

				        	$('.team').empty();
				        	$('#team').html(data.getTeams);
				        	$(".team").customA11ySelect();

				        	// reset Team start
					           var current = $(".team_group");
							   var id      = $(".team_group .custom-a11yselect-menu li:first").attr("id");
						       var text    = $(".team_group .custom-a11yselect-menu li:first button").text();
						       reset(current,id,text);
				        	// reset Team end

				        	entityName  = data.entityName;
				        	fileName    = data.fileName;
				        	importLogId = data.importLogId;

                            $(".fieldmappingselect").closest("td").find(".custom-a11yselect-btn").attr("onclick","btnClick(this)");
                            
                            field_default_value =$(".Mapping-section tr").first().find(".custom-a11yselect-menu .custom-a11yselect-selected button").text();

						}else{

							 //hide field mapping & reset choose file value
				        	 $('#NewimportFile').val("");
				        	 $('.ImportFieldMapping').hide();

					         $.alert({
					            title: 'Alert!',
					            content: data.msg,
					            type: 'dark',
					            typeAnimated: true,
					            draggable: false,
					          });
				        	}
				      }
				    });
				}
    		}
    }); 

    $("#NewimportEntityType").change(function(){
    	var import_entity_type_select = $("#NewimportEntityType-button #NewimportEntityType-selected").text();
    	if(import_entity_type_select == 'Select Entity Type'){
    		$('.importEntityType-error').show();
		    $('.ImportFieldMapping').hide();
    		$('#NewimportFile').val("");
    	}else{
    		$('.importEntityType-error').hide();
    		$('.ImportFieldMapping').hide();
    		$('#NewimportFile').val("");
    	}
    });
});


function reset(element,id,text_msg) {

	element.find(".custom-a11yselect-btn").attr("aria-activedescendant",id);
	element.find(".custom-a11yselect-btn .custom-a11yselect-text").text(text_msg);
	element.find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
	element.find(".custom-a11yselect-menu .custom-a11yselect-option button:contains('"+text_msg+"')").closest("li").addClass("custom-a11yselect-selected custom-a11yselect-focused");
}


$('#NewimportFile').on('input', function() {
  var strr=lastFourDigit();
  if(strr.toLowerCase()=='.csv')
	$(".upload-section .temp-error").hide();
});

// var previous = field_default_value;
var previous = $(".Mapping-section tr").first().find(".custom-a11yselect-menu .custom-a11yselect-selected").attr('data-val');
// alert(previous);

function btnClick(element) {

	// previous = $(element).closest("td").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
	previous = $(element).closest("td").find(".custom-a11yselect-menu  .custom-a11yselect-selected").attr('data-val');
    // console.log("previous = > "+previous);

}
   
$(document).on('change','.fieldmappingselect',function() {
	// alert("hehe");
	// if(previous != field_default_value) {
	if(previous != '' && previous != 'phone' && previous != 'email') {

  		// $('tbody .fieldmappingselect').not(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option button:contains('"+previous+"')").css("display","block");
  		$('tbody .fieldmappingselect').not(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option[data-val='"+previous+"']").css("display","block");

	}

	// var current=$(this).closest("td").find(".custom-a11yselect-btn .custom-a11yselect-text").text();
	var current=$(this).closest("td").find(".custom-a11yselect-menu  .custom-a11yselect-selected").attr('data-val');
	if(current!=field_default_value)
		$(this).closest("td").find(".temp-error").hide();
	else
		$(this).closest("td").find(".temp-error").show();

	var current_tr=$(this).closest("tr");

	// if(current != field_default_value)
	if(current != '' && current != 'phone' && current != 'email')
		{
	    // $('tbody .fieldmappingselect').not(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option button:contains('"+current+"')").css("display","none");
	    $('tbody .fieldmappingselect').not(this).closest("td").find(".custom-a11yselect-menu .custom-a11yselect-option[data-val='"+current+"']").css("display","none");
	}
    // console.log("current= > "+current);

});

function lastFourDigit() {

	var  input =$("#NewimportFile").val();     //input string
	var  lastFourDigits = "";     //substring containing last 4 characters
	 
	if (input.length > 4)  {
	    lastFourDigits = input.substring(input.length - 4);
	}  else {
	    lastFourDigits = input;
	}
	 
	// console.log(lastFourDigits);
	return lastFourDigits;
}
	

function validation() {

    var Entity_type = $("#NewimportEntityType-button  .custom-a11yselect-text").text();
    
    var file_name   = $("#NewimportFile").val();

    var regex       = /^([a-zA-Z0-9\s_\\.\-:])+(.csv)$/;
	
	var len         = $(".Mapping-section tr").length;

	var strr=lastFourDigit();

	if(Entity_type == "Select Entity Type") {
		$(".importEntityType-error").show();
	}

	// if(file_name == "" || strr.toLowerCase() != '.csv') {
	// 	$(".upload-section .temp-error").show();
	// }
}

$(".RunImport").click(function() {

  var regex        = /^([a-zA-Z0-9\s_\\.\-:])+(.csv)$/;
  
  var Entity_type  = $("#NewimportEntityType-button .custom-a11yselect-text").text();
  
  var file_name    = $("#NewimportFile").val();

  var strr=lastFourDigit();

  if( Entity_type != 'Select Entity Type' ) {
  	
	$(".upload-section .temp-error").hide();

	// start loader
    $('.import-progress-loader').show();
    $(".import-blur-effect").show();

	// upload file
	var form  = $('#run-import');
    var url   = form.attr('action');
    form      = new FormData(form[0]);
    form.append("entityName",entityName);
    form.append("fileName",fileName);
    form.append("importLogId",importLogId);

    $.ajax({
	      type    : "POST",
	      url     : '../../../../client/res/templates/custom_import/runImport.php',
	      data    : form,
	      dataType  : "json",
	      timeout: 3000000,
	      processData : false,
	      contentType : false,
	      success: function(data) {

	        if(data.status == 'true'){

	        	//hide loader
	        	$('.import-progress-loader').hide();
	    		$(".import-blur-effect").hide();

	        	$.alert({
                        title: 'Import Successful!',
                        content: data.msg,
                        type: 'dark',
                        typeAnimated: true,
                        draggable: false,
                        buttons: {
                              OK: function () {
                                 window.location = "#ImportResult";
                            },
                        }
                      });
	        }else{

	        	  //hide loader
	        	  $('.import-progress-loader').hide();
	    		  $(".import-blur-effect").hide();

		          $.alert({
		            title: 'Alert!',
		            content: data.msg,
		            type: 'dark',
		            typeAnimated: true,
		            draggable: false,
		          });
	        	}
	      }
	    });
  } else {
    validation();
  }
});

//get CRM entity
var currenURL = window.location.hash;
if (currenURL == '#Import') {

	$.ajax({
		"type"      : "POST",
		"url"       : "../../../../client/res/templates/custom_import/getImportEntity.php",
		"dataType"  : "json",
		success     : function (response){
		    
		    if( response.status == "true" ){
		    
		        $.each(response.data, function (key, val) {
		        
		            $(".import-entity-type").append('<option value="'+val+'" >'+key+' </option>');
		        });
		        $(".importEntityType").customA11ySelect();
		    }
		},
	});
}
</script>