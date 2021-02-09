
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- display loader while apply any filter -->
	<div class="loader">
    	<img src="<?php echo base_url('assets/images/loading.gif') ?>">
    </div>

    <section class="content header_section_kanban">
      	<div class="row">
         	<div class="col-md-12">
	            <!-- Bar chart -->
	            <div class="box box-header">
	               	<div class="box-body">
	                  	<!-- End of main page -->
	                  	<div class="graph-section">
                     		<div class="header border-bottom">
		                        <div class="row">
		                           	<div class="col-md-9 col-xs-12">
		                              	<div class="leads_report">
		                                 	<h4>
		                                 		<!-- <i class="material-icons-outlined">assignment</i> -->

		                                 		<?php echo isset($page_title) ? $page_title : "Report"; ?></h4>
		                              	</div>
		                           	</div>
		                           	<!-- <div class="col-md-3 col-xs-5">
		                              	<div class="save_export_section">
		                                 	<span class="border-right"><i class="material-icons-outlined">save_alt</i>Save</span>
		                                 	<span class="Export"><i class="material-icons-outlined">import_export</i>Export</span>  
		                              	</div>
		                           	</div> -->
		                        </div>
	                     	</div>

	                     	<div class="header-middle">
		                        <div class="row">
		                           	<div class="col-md-3 col-xs-12 col-sm-7">
		                              	<div class="form-group date_daily_add">
		                                 	<div class="input-group">
		                                    	<input type="text" class="form-control" id="reportrange" name="reportrange" >
		                                    	<label for="reportrange" class="input-group-addon">
		                                    		<!-- <i class="fa fa-calendar"></i> -->
		                                    		<i class="material-icons-outlined date_range_icon">date_range</i>
		                                    	</label>
		                                 	</div>
		                              	</div>
		                           	</div>
		                           	<div class="col-md-2 col-sm-6 col-xs-12">
		                              	<div class="form-group date_daily_add daily">
		                                 	<select class="form-control reportSelect" id="reportType" name="reportType" >
												<option value="" >Select Report Type</option>
												<option value="y" >Yearly</option>
												<option value="m" >Monthly</option>
												<!-- <option value="w" >Weekly</option> -->
												<option value="d" selected >Daily</option>
												<!-- <option value="h" >Hourly</option> -->
											</select>
		                              	</div>
		                           	</div>

		                           	<div class="col-md-2 col-sm-6 col-xs-12 select_source" >
	                              		<div class="form-group Common">
	                                 		<label>Source</label>
		                                 	<i class="material-icons-outlined close" id="">close</i>
		                                 	<select class="form-control reportSelect" id="reportSource" name="reportSource" >
												<option value="">Select Source</option>
												<?php if( !empty($sourceArr) ){ ?>   
								                	<?php foreach( $sourceArr as $key => $value ){ ?>   
														<option value="<?php echo $value; ?>"><?php echo $value; ?></option>      
								                	<?php } ?>         
								                <?php } ?>  
											</select>
		                              	</div>
		                           	</div>

		                           	<div class="col-md-2 col-sm-6 col-xs-12 select_status" >
	                              		<div class="form-group Common">
	                                 		<label>Status</label>
		                                 	<i class="material-icons-outlined close" id="">close</i>
		                                 	<select class="form-control reportSelect" id="reportStatus" name="reportStatus" >
												<option value="">Select Status</option>
												<?php if( !empty($statusArr) ){ ?>   
								                	<?php foreach( $statusArr as $key => $value ){ ?>   
														<option value="<?php echo $value; ?>"><?php echo $value; ?></option>      
								                	<?php } ?>         
								                <?php } ?>  
											</select>
		                              	</div>
		                           	</div>

		                           	<div class="col-md-2 col-sm-6 col-xs-12 select_lead_type" >
	                              		<div class="form-group Common">
	                                 		<label>Type</label>
		                                 	<i class="material-icons-outlined close" id="">close</i>
		                                 	<select class="form-control reportSelect" id="reportLeadType" name="reportLeadType" >
												<option value="">Select Type</option>
												<?php if( !empty($leadTypeArr) ){ ?>   
								                	<?php foreach( $leadTypeArr as $key => $value ){ ?>   
														<option value="<?php echo $value; ?>"><?php echo $value; ?></option>      
								                	<?php } ?>         
								                <?php } ?>  
											</select>
		                              	</div>
		                           	</div>

		                           	<div class="col-md-2 col-sm-6 col-xs-12 select_branch" >
	                              		<div class="form-group Common">
	                                 		<label>Branch</label>
		                                 	<i class="material-icons-outlined close" id="">close</i>
		                                 	<select class="form-control reportSelect" id="reportBranch" name="reportBranch" >
												<option value="">Select Branch</option>
												<?php if( !empty($branchArr) ){ ?>   
								                	<?php foreach( $branchArr as $key => $value ){ ?>   
														<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
								                	<?php } ?>         
								                <?php } ?>  
											</select>
		                              	</div>
		                           	</div>

		                           	<?php if( !empty($userList) && count($userList) > 1 ){ ?>   
		                           	<div class="col-md-2 col-sm-6 col-xs-12 selected_user" >
		                              	<div class="form-group Common">
		                                 	<label class="user">User</label>
		                                 	<i class="material-icons-outlined close">close</i>
											<select class="form-control " id="userId" name="userId[]" multiple="" >
							                	<?php foreach( $userList as $key => $value ){ ?>   
							                		<option value="<?php echo $value['u_id']; ?>"><?php echo $value['name']; ?></option>      
							                	<?php } ?>         
								            </select>
		                              	</div>
		                           	</div>
		                           	<?php } ?>  

		                           	<?php if( !empty($teamArr) && count($teamArr) > 1 ){ ?>   
		                           	<div class="col-md-2 col-sm-6 col-xs-12 selected_team">
		                              	<div class="form-group Common">
	                                 		<label>Team</label>
		                                 	<i class="material-icons-outlined close">close</i>
											<select class="form-control " id="teamId" name="teamId[]" multiple="" >
							                	<?php foreach( $teamArr as $key => $value ){ ?>   
							                		<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>      
							                	<?php } ?>         
								            </select>
		                              	</div>
		                           	</div>
		                           	<?php } ?> 


		                           	<div class="col-md-3 col-sm-6 col-xs-12 add_filter">
		                              	<div class="form-group date_daily_add" >
		                                 	<div class="dropdown">
		                                    	<span class="dropdown-toggle" id="add_filter_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		                                    		<i class="material-icons-outlined">filter_list</i>
		                                    		<!-- Add Filter -->
		                                        </span>
		                                    	<ul class="dropdown-menu" aria-labelledby="add_filter_dropdown">
		                                       		
		                                       		<li data-name="select_source_list_item" id="filter_source"><a href='#' data-name='action'>Select Source</a></li>

		                                       		<li data-name="select_status_list_item" id="filter_status"><a href='#' data-name='action'>Select Status</a></li>

		                                       		<li data-name="select_lead_type_list_item" id="filter_lead_type"><a href='#' data-name='action'>Select Type</a></li>
													
													<li data-name="select_branch_list_item" id="filter_branch"><a href='#' data-name='action'>Select Branch</a></li>

		                                       		<?php if( !empty($userList) && count($userList) > 1 ){ ?>
		                                       		<li data-name="select_user_list_item" id="filter_user"><a href="#" data-value="another action">Select User</a></li>
		                                       		<?php } ?>

		                                       		<?php if( !empty($teamArr) && count($teamArr) > 1 ){?> 
		                                       		<li data-name="select_team_list_item" id="filter_team"><a href="#" data-value="another action">Select Team</a></li>
		                                       		<?php } ?>
		                                    	</ul>
		                                 	</div>
		                              	</div>
		                           	</div>
		                           
		                        </div>
	                     	</div>
	                  	</div>
	               	</div>
	            </div>
         	</div>
      	</div>
   	</section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
         <!-- Bar chart -->
          <div class="box">
            
            <div class="box-body">
               
            	<!-- End of main page -->
				<div class="graph-section">
					<?php if( !empty($result) ){ ?>
						<div class="graph-container">
							<div id="curve_chart" style="width: 100% !important; min-height: 400px;" ></div>
						</div>
					<?php }else{  ?>
						<div class="container">
							<p class="text-center"><!-- Invalid request! --></p>
						</div>
					<?php }  ?>

				</div>
				<!-- End of main page -->

            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
      </div>
      <!-- /.row -->
    </section>
    

    <!-- start tabular view -->
	<section class="content list_section">
	   	<div class="row">
	      	<div class="col-md-12">
	         	<div class="box">
	            	<div class="">
	               	
	               		<div class="">
	               			<input type="hidden" class="form-control" id="tabular_data_point" name="tabular_data_point" >
	                  		<div class="table-responsive">
	                     		<table class="table table_tabular">
	                        		<thead>
	                           			<tr>
	                              			<th >SR NO</th>
											<th >NAME</th>
											<th >SOURCE</th>
											<th >STATUS</th>
											<th >EMAIL</th>
											<th >ASSIGNED USER</th>
											<th >CREATED AT</th>
	                           			</tr>
	                        		</thead>
                        			<tbody>
	                           			<!-- Append tbody here -->
	                        		</tbody>
	                     		</table>
	                  		</div>
	               		</div>

               			<div class="button_section">
	                  		<button type="button" class="btn btn-primary left_alignment" id="load_more_tabular" value="1" onclick="load_more_tabular(this);" >Show More</button>
	                  		<span class="right_alignment tabular_remaining">Remaining:0</span>
	               		</div>

	            	</div>
	         	</div>
	      	</div>
	   	</div>
	</section>
    <!-- end tabular view -->

   
</div>
<!-- /.content-wrapper -->


<!-- START SCRIPT SECTION -->



<script >

<?php if( !empty($result) ) { ?>
	$(document).ready(function(){

		var start 	= moment().subtract(6, 'days');
		var end 	= moment();

		$('#reportrange').daterangepicker({
			startDate: start,
			endDate: end,
			// minDate: moment(), // min date validation
			maxDate: moment(),
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			"alwaysShowCalendars": true,
			// locale: { format: "M/D/YYYY" },
			locale: { 
				format: "DD-MM-YYYY",
				separator: ' To ',
        	},

		});

		// Default display none or block - only display block if cilck on graph data point
		// $(".kanban_content").css("display","none");
		$(".list_section").css("display","none");


		// Select display none default
		$(".select_source").css("display","none");
		$(".select_status").css("display","none");
		$(".select_lead_type").css("display","none");
		$(".select_branch").css("display","none");
	   	$(".selected_user").css("display","none");
	   	$(".selected_team").css("display","none");

		// select to for user dropdown
		$("#userId").select2({
			allowClear :true,
			placeholder: 'Select User',
		});
		
		// select to for team dropdown
		$("#teamId").select2({
			allowClear :true,
			placeholder: 'Select Team',
		});

		
		// select to for reportType, reportSource, reportStatus, reportLeadType, reportBranch dropdown
		$('.reportSelect').customA11ySelect();

		$("#reportType-option-0 button").prop('disabled', true);
		$("#reportType-option-1 button").prop('disabled', true);
		$("#reportType-option-2 button").prop('disabled', true);
		$("#reportType-option-3 button").prop('disabled', false);

		// Start Filter functionality : select box display none or block
		$(document).on('click', '.add_filter .dropdown-menu li a', function(){
      
			var item=$(this).text();
			var len=$(".add_filter .dropdown-menu li a").length;
			
			if(item=="Select Source") {
			 	$(".select_source").css("display","block");
			 	$(this).remove();
			}

			if(item=="Select Status") {
			 	$(".select_status").css("display","block");
			 	$(this).remove();
			}

			if(item=="Select Type") {
			 	$(".select_lead_type").css("display","block");
			 	$(this).remove();
			}

			if(item=="Select Branch") {
			 	$(".select_branch").css("display","block");
			 	$(this).remove();
			}

			if(item=="Select User") {
			 	$(".selected_user").css("display","block");
			  	$(".selected_user .select2-container").css("width","100%");
			 	$(".select2-search--inline .select2-search__field").css("width","100%");
			 	$(".add_filter .dropdown-menu li[data-name='select_team_list_item'] a").remove();
			 	$(this).remove();
			}

			if(item=="Select Team") {
			 	$(".selected_team").css("display","block");
			  	$(".selected_team .select2-container").css("width","100%");
			 	$(".select2-search--inline .select2-search__field").css("width","100%");
			 	$(this).remove();
			 	$(".add_filter .dropdown-menu li[data-name='select_user_list_item'] a").remove();
			 	len=len-1;     
			}

			if($(".add_filter .dropdown-menu li a").length==0) {
			  	$(".add_filter").css("display","none");
			 	// $(".add_filter .dropdown-menu").remove();
			}

   		});
   		// End Filter functionality : select box display none or block
		

   		// Start Filter functionality : close select box
		$(".close").click(function(){
			$(this).closest(".Common").parent().css("display","none");
			
			var label=$(this).closest(".Common").find("label").text();

			if($(".add_filter .dropdown-menu li a").length!=0) {
			  	
			  	if(label=="Source") {
			 		$("#filter_source").append("<a href='javascript:void(0);' data-name='action'>Select Source</a>");
			 		$(".list_section").css("display","none");
			 		//$('#reportSource').prop('selectedIndex', 0);
					$(".select_source #reportStatus-button").attr('aria-activedescendant','reportSource-option-0');

					$(".select_source #reportSource-selected").text('Select Source');

					$(".select_source .custom-a11yselect-menu").removeClass('custom-a11yselect-reversed');
					$(".select_source .custom-a11yselect-option").removeClass('custom-a11yselect-selected');
					$(".select_source .custom-a11yselect-option").removeClass('custom-a11yselect-focused');
					$(".select_source #reportSource-option-0").addClass('custom-a11yselect-selected');
					$(".select_source #reportSource-option-0").addClass('custom-a11yselect-focused');

					onChangeGrphDraw();
			 		
				}

				if(label=="Status") {
			 		
			 		$("#filter_status").append("<a href='javascript:void(0);' data-name='action'>Select Status</a>");
			 		$(".list_section").css("display","none");
			 		//$('#reportStatus').prop('selectedIndex', 0);

			 		$(".select_status #reportStatus-button").attr('aria-activedescendant','reportStatus-option-0');

					$(".select_status #reportStatus-selected").text('Select Status');

					$(".select_status .custom-a11yselect-menu").removeClass('custom-a11yselect-reversed');
					$(".select_status .custom-a11yselect-option").removeClass('custom-a11yselect-selected');
					$(".select_status .custom-a11yselect-option").removeClass('custom-a11yselect-focused');
					$(".select_status #reportStatus-option-0").addClass('custom-a11yselect-selected');
					$(".select_status #reportStatus-option-0").addClass('custom-a11yselect-focused');

					onChangeGrphDraw();
				}

				if(label=="Type") {
			 		
			 		$("#filter_lead_type").append("<a href='javascript:void(0);' data-name='action'>Select Type</a>");
			 		$(".list_section").css("display","none");
			 		//$('#reportLeadType').prop('selectedIndex', 0);

			 		$(".select_lead_type #reportLeadType-button").attr('aria-activedescendant','reportLeadType-option-0');

					$(".select_lead_type #reportLeadType-selected").text('Select Type');

					$(".select_lead_type .custom-a11yselect-menu").removeClass('custom-a11yselect-reversed');
					$(".select_lead_type .custom-a11yselect-option").removeClass('custom-a11yselect-selected');
					$(".select_lead_type .custom-a11yselect-option").removeClass('custom-a11yselect-focused');
					$(".select_lead_type #reportLeadType-option-0").addClass('custom-a11yselect-selected');
					$(".select_lead_type #reportLeadType-option-0").addClass('custom-a11yselect-focused');

					onChangeGrphDraw();
				}

				if(label=="Branch") {
			 		
			 		$("#filter_branch").append("<a href='javascript:void(0);' data-name='action'>Select Branch</a>");
			 		$(".list_section").css("display","none");
			 		//$('#reportBranch').prop('selectedIndex', 0);

			 		$(".select_branch #reportBranch-button").attr('aria-activedescendant','reportBranch-option-0');

					$(".select_branch #reportBranch-selected").text('Select Branch');

					$(".select_branch .custom-a11yselect-menu").removeClass('custom-a11yselect-reversed');
					$(".select_branch .custom-a11yselect-option").removeClass('custom-a11yselect-selected');
					$(".select_branch .custom-a11yselect-option").removeClass('custom-a11yselect-focused');
					$(".select_branch #reportBranch-option-0").addClass('custom-a11yselect-selected');
					$(".select_branch #reportBranch-option-0").addClass('custom-a11yselect-focused');

					onChangeGrphDraw();
				}

				if(label=="User") {

					<?php if( !empty($userList) && count($userList) > 1 ){ ?>
			 		$("#filter_user").append("<a href='javascript:void(0);' data-value='another action'>Select User</a>");
			 		<?php } ?>

					<?php if( !empty($teamArr) && count($teamArr) > 1 ){ ?>  
			 		$("#filter_team").append("<a href='javascript:void(0);' data-value='another action'>Select Team</a>");
			 		<?php } ?>
			 		// $('#userId').prop('selectedIndex', -1);
			 		$('#userId').val('').select2({ allowClear :true, placeholder: 'Select User', });
			 		$(".list_section").css("display","none");

			 		onChangeGrphDraw();
				}

				if(label=="Team") {

					<?php if( !empty($userList) && count($userList) > 1 ){ ?>
					$("#filter_user").append("<a href='javascript:void(0);' data-value='another action'>Select User</a>");
			 		<?php } ?>

					<?php if( !empty($teamArr) && count($teamArr) > 1 ){ ?>  
			  		$("#filter_team").append("<a href='javascript:void(0);' data-value='another action'>Select Team</a>");
			 		<?php } ?>
			  		// $('#teamId').prop('selectedIndex', -1);
			  		$('#teamId').val('').select2({ allowClear :true, placeholder: 'Select Team', });

			  		onChangeGrphDraw();
				}
			} else {

				if(label=="Source") {
					$(".add_filter").css("display","block");
					$(".add_filter .dropdown-menu").append("<li data-name='select_source_list_item' id='filter_source'><a href='javascript:void(0);' data-name='action'>Select Source</a></li>");
					$(".list_section").css("display","none");
					//$('#reportSource').prop('selectedIndex', 0);

					$(".select_source #reportStatus-button").attr('aria-activedescendant','reportSource-option-0');

					$(".select_source #reportSource-selected").text('Select Source');

					$(".select_source .custom-a11yselect-menu").removeClass('custom-a11yselect-reversed');
					$(".select_source .custom-a11yselect-option").removeClass('custom-a11yselect-selected');
					$(".select_source .custom-a11yselect-option").removeClass('custom-a11yselect-focused');
					$(".select_source #reportSource-option-0").addClass('custom-a11yselect-selected');
					$(".select_source #reportSource-option-0").addClass('custom-a11yselect-focused');

					onChangeGrphDraw();
				}

				if(label=="Status") {
					$(".add_filter").css("display","block");
					$(".add_filter .dropdown-menu").append("<li data-name='select_status_list_item' id='filter_status'><a href='javascript:void(0);' data-name='action'>Select Status</a></li>");
					$(".list_section").css("display","none");
					//$('#reportStatus').prop('selectedIndex', 0);

					$(".select_status #reportStatus-button").attr('aria-activedescendant','reportStatus-option-0');

					$(".select_status #reportStatus-selected").text('Select Status');

					$(".select_status .custom-a11yselect-menu").removeClass('custom-a11yselect-reversed');
					$(".select_status .custom-a11yselect-option").removeClass('custom-a11yselect-selected');
					$(".select_status .custom-a11yselect-option").removeClass('custom-a11yselect-focused');
					$(".select_status #reportStatus-option-0").addClass('custom-a11yselect-selected');
					$(".select_status #reportStatus-option-0").addClass('custom-a11yselect-focused');

					onChangeGrphDraw();
				}

				if(label=="Type") {
					$(".add_filter").css("display","block");
					$(".add_filter .dropdown-menu").append("<li data-name='select_lead_type_list_item' id='filter_lead_type'><a href='javascript:void(0);' data-name='action'>Select Type</a></li>");
					$(".list_section").css("display","none");
					//$('#reportLeadType').prop('selectedIndex', 0);

					$(".select_lead_type #reportLeadType-button").attr('aria-activedescendant','reportLeadType-option-0');

					$(".select_lead_type #reportLeadType-selected").text('Select Type');

					$(".select_lead_type .custom-a11yselect-menu").removeClass('custom-a11yselect-reversed');
					$(".select_lead_type .custom-a11yselect-option").removeClass('custom-a11yselect-selected');
					$(".select_lead_type .custom-a11yselect-option").removeClass('custom-a11yselect-focused');
					$(".select_lead_type #reportLeadType-option-0").addClass('custom-a11yselect-selected');
					$(".select_lead_type #reportLeadType-option-0").addClass('custom-a11yselect-focused');

					onChangeGrphDraw();
				}

				if(label=="Branch") {
					$(".add_filter").css("display","block");
					$(".add_filter .dropdown-menu").append("<li data-name='select_branch_list_item' id='filter_branch'><a href='javascript:void(0);' data-name='action'>Select Branch</a></li>");
					$(".list_section").css("display","none");
					//$('#reportBranch').prop('selectedIndex', 0);

					$(".select_branch #reportBranch-button").attr('aria-activedescendant','reportBranch-option-0');

					$(".select_branch #reportBranch-selected").text('Select Branch');

					$(".select_branch .custom-a11yselect-menu").removeClass('custom-a11yselect-reversed');
					$(".select_branch .custom-a11yselect-option").removeClass('custom-a11yselect-selected');
					$(".select_branch .custom-a11yselect-option").removeClass('custom-a11yselect-focused');
					$(".select_branch #reportBranch-option-0").addClass('custom-a11yselect-selected');
					$(".select_branch #reportBranch-option-0").addClass('custom-a11yselect-focused');

					onChangeGrphDraw();
				}
			
				if(label=="User") {
			  		$(".add_filter").css("display","block");

			  		<?php if( !empty($userList) && count($userList) > 1 ){ ?>
			 		$(".add_filter .dropdown-menu").append("<li data-name='select_user_list_item' id='filter_user'><a href='javascript:void(0);' data-value='another action'>Select User</a></li>");
			 		<?php } ?>

			 		<?php if( !empty($teamArr) && count($teamArr) > 1 ){ ?>  
			 		$(".add_filter .dropdown-menu").append("<li data-name='select_team_list_item' id='filter_team'><a href='javascript:void(0);' data-value='another action'>Select Team</a></li>");
			 		<?php } ?>
			 		// $('#userId').prop('selectedIndex', -1);
			 		$('#userId').val('').select2({ allowClear :true, placeholder: 'Select User', });

			 		onChangeGrphDraw();
				}

				if(label=="Team") {
			 		$(".add_filter").css("display","block");

			  		<?php if( !empty($userList) && count($userList) > 1 ){ ?>
			 		$(".add_filter .dropdown-menu").append("<li data-name='select_user_list_item' id='filter_user'><a href='javascript:void(0);' data-value='another action'>Select User</a></li>");
			 		<?php } ?>

			 		<?php if( !empty($teamArr) && count($teamArr) > 1 ){ ?>  
			 		$(".add_filter .dropdown-menu").append("<li data-name='select_team_list_item' id='filter_team'><a href='javascript:void(0);' data-value='another action'>Select Team</a></li>");
			 		<?php } ?>
			  		// $('#teamId').prop('selectedIndex', -1);
			  		$('#teamId').val('').select2({ allowClear :true, placeholder: 'Select Team', });

			  		onChangeGrphDraw();
				}
			}

		});
		// End Filter functionality : close select box


		// Start Filter functionality : close button display or hide
		$(".Common").mouseover(function(){
		    $(this).find(".close").css("display","block");
	   	});

	  	$(".Common").mouseleave(function(){
		    $(this).find(".close").css("display","none");
	   	});
	   	// End Filter functionality : close button display or hide


	   	// Start toogle tabular viewr 
		$('.select_source select').change(function(){
			// $(".kanban_content").css("display","none");
	       	$(".list_section").css("display","none");
		});

		$('.select_status select').change(function(){
			// $(".kanban_content").css("display","none");
	       	$(".list_section").css("display","none");
		});

		$('.select_lead_type select').change(function(){
			// $(".kanban_content").css("display","none");
	       	$(".list_section").css("display","none");
		});

		$('.select_branch select').change(function(){
			// $(".kanban_content").css("display","none");
	       	$(".list_section").css("display","none");
		});
		// End toogle tabular viewr 


		// call google graph function
		google.charts.load('current', {'packages':['corechart','line']});
		google.charts.setOnLoadCallback(drawChart);

		// draw google graph data
		function drawChart(ajaxData="", xTitle="", yTitle="", title="", dateFormat="dd MMM yyyy") {
			
			if( ajaxData == "" ){
				
			 	var parent = <?php echo $result; ?>;
				
				$.each(parent.rows, function(i, obj) {
				  	// console.log(obj['c'][0]['v']);
				  	var child = parent['rows'][i];
				  	$.each(child, function(i1, obj1) {
				  		var t1 = obj['c'][0]['v'].split(" - ",1);
				  		// console.log(" t1 => "+t1);
				  		// obj1[0]['v']= new Date(t1);
				  		obj1[0]['v']= new Date(obj['c'][0]['v']);
				  	});
				});

				var data = new google.visualization.DataTable( parent );

			}else{

				$.each(ajaxData.rows, function(i2, obj2) {
				  	// console.log(obj['c'][0]['v']);
				  	var child2 = ajaxData['rows'][i2];
				  	$.each(child2, function(i3, obj3) {
				  		var t2 = obj2['c'][0]['v'].split(" - ",1);
				  		// console.log(" t2 => "+t2);
				  		// obj3[0]['v']= new Date(t2);
				  		obj3[0]['v']= new Date(obj2['c'][0]['v']);
				  	});
				});

				// console.log( " ajaxData => "+JSON.stringify(ajaxData));
				var data = new google.visualization.DataTable( ajaxData );

			}

			if( xTitle != "" && yTitle != "" ){
				var xTitle = xTitle;
				var yTitle = yTitle;
			}else{
				var xTitle = "<?php echo isset($xTitle) ? $xTitle : ''; ?>";
				var yTitle = "<?php echo isset($yTitle) ? $yTitle : ''; ?>";
			}

			if( title != "" ){
				title = title+" leads";
			}else{
				title = "Leads";
			}

			var options = {
				
				title 		: title,
				fontSize 	: 10,
				legend 		: {position:'top'},
				pointSize 	: 5,
				hAxis 		: {title: xTitle,  titleTextStyle: {color: 'black'}, format: "dd MMM yyyy", gridlines: { count: 5, color : '#f5f5f5' } },
				vAxis 		: {title: yTitle,  titleTextStyle: {color: 'black'}, maxValue: 1, gridlines: { count: 5, color : '#f5f5f5' }, viewWindowMode: "explicit", viewWindow:{ min: 0 } },
		        focusTarget: 'category',
		        tooltip: {  trigger: 'select', /*isHtml: true*/  },
		        highlighter: { 
		        	show: true, 
		            showTooltip: true,      // show a tooltip with data point values.
		            tooltipLocation: 'nw',  // location of tooltip: n, ne, e, se, s, sw, w, nw.
		            tooltipAxes: 'both',    // which axis values to display in the tooltip, x, y or both.
		            lineWidthAdjust: 2.5   // pixels to add to the size line stroking the data point marker
	            },
		        animation:{
		            duration: 1000,
		            startup: true,
		        },
		        curveType : 'function',
				lineWidth: 2,
				intervals: { 'style':'line' },

			};

			// Change date format 
			var date_formatter = new google.visualization.DateFormat({ 
			    pattern: dateFormat
			}); 
			date_formatter.format(data, 0);

			//Classic chart
			var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
			chart.draw(data, options);
			google.visualization.events.addListener(chart, 'onmouseover', uselessHandler2);
         	google.visualization.events.addListener(chart, 'onmouseout', uselessHandler3);
			chart.draw(data, options);

			google.visualization.events.addListener(chart, 'select', selectHandler);


			function uselessHandler2() {
			 $('#curve_chart').css('cursor','pointer')
			  }  
			        function uselessHandler3() {
			 $('#curve_chart').css('cursor','default')
			  } 

			// on select get x axis values
			function selectHandler() {
			  
			  	var selection = chart.getSelection();
			  	var message = '';
			  
			  	for (var i = 0; i < selection.length; i++) {
			  		var item = selection[i];
			  
				    if (item.row != null && item.column != null) {
				      
			      		var str = data.getFormattedValue(item.row, item.column);
				      	var category = data
				      	.getValue(chart.getSelection()[0].row, 0)
				      	var type
				    
				      	/*if (item.column == 1) {
				        	type = "sale";
				      	} else if(item.column == 2){
				        	type = "Expense";
				      	}else{
				        	type = "Profit";
				      	}*/

				      	/*message += '{row:' + item.row + ',column:' + item.column
				      	+ '} = ' + str + '  The Category is:' + category
				      	+ ' it belongs to : ' + type + '\n';*/
				    
				    } else if (item.row != null) {
				    
			      		var str = data.getFormattedValue(item.row, 0);
			      		message += 'Data point value : '+str;
				      	/*message += '{row:' + item.row
				      	+ ', column:none}; value (col 0) = ' + str
				      	+ '  The Category is:' + category + '\n';*/

				      	// console.log("Step 1 ----> ");

				      	// Start ajax : Get filter data on click of graph data point
				      	// $(".kanban_content").css("display","none");
						$(".list_section").css("display","none");

						var reportrange 	= $("#reportrange").val();
						//var reportType 		= $("#reportType").val();
						var reportType 		= $("#reportType-menu .custom-a11yselect-selected").attr('data-val');
						//var reportSource 	= $("#reportSource").val();
						var reportSource 	= $("#reportSource-menu .custom-a11yselect-selected").attr('data-val');
						//var reportStatus 	= $("#reportStatus").val();
						var reportStatus 	= $("#reportStatus-menu .custom-a11yselect-selected").attr('data-val');
						//var reportLeadType 	= $("#reportLeadType").val();
						var reportLeadType 	= $("#reportLeadType-menu .custom-a11yselect-selected").attr('data-val');
						//var reportBranch 	= $("#reportBranch").val();
						var reportBranch 	= $("#reportBranch-menu .custom-a11yselect-selected").attr('data-val');
						var teamId 			= $("#teamId").val();
						var userId 			= $("#userId").val();
						var dataPoint 		= str;
						// var dateFormat 		= checkDateFormat(reportType);
						
						// set datapoint value
						$("#tabular_data_point").val(dataPoint);
						// $("#kanban_data_point").val(dataPoint);

						$.ajax({

							url			: '<?php echo base_url("get-lead-data"); ?>',
							method		: 'POST',
							dataType	: "json",
							data		: { "reportrange" : reportrange, "reportType" : reportType, "reportSource" : reportSource, "reportStatus" : reportStatus, "reportLeadType" : reportLeadType, "reportBranch" : reportBranch, "teamId" : teamId, "userId" : userId, "dataPoint" : dataPoint  },
							success 	: function(response){

								// console.log(" data point : "+JSON.stringify(response) );
								// if data found
								$('#load_more_tabular').val("1");
								if( response.status == true ){

									if( response.viewType == "tabular" ){

										// append tabular rows dynamically
										if( response.data.html != "" ){
											$(".table_tabular tbody").html(response.data.html);
											$(".tabular_remaining").html("Remaining:"+response.data.remaining);
										}

										// enable or disabled show more
										// console.log(" response.data.remaining -> "+response.data.remaining);
										if( response.data.remaining <= 0 ){
											$("#load_more_tabular").css("display", "none");
											$(".tabular_remaining").css("display", "none");
										}else{
											$("#load_more_tabular").css("display", "block");
											$(".tabular_remaining").css("display", "block");
										}
									
										$(".list_section").css("display","block");
										// $(".kanban_content").css("display","none");

									}else{

										$(".list_section").css("display","none");
										// $(".kanban_content").css("display","none");

									}

								}
								
							},

						});

				      	// End  ajax : Get filter data on click of graph data point


				    } else if (item.column != null) {
				    
			      		var str = data.getFormattedValue(0, item.column);
				     	/*message += '{row:none, column:' + item.column
				      	+ '}; value (row 0) = ' + str
				      	+ '  The Category is:' + category + '\n';*/

				    }
				    
			  	}

			  	// alert('You selected ' + message);

			}

		}


		// calculation of no. of days between two date  
		function dateDiffrenceInDays(startDate="", endDate=""){

			// To set two dates to two variables 
			var date1 = new Date(startDate); 
			var date2 = new Date(endDate); 
			
			// To calculate the time difference of two dates 
			var Difference_In_Time = date2.getTime() - date1.getTime(); 

			// To calculate the no. of days between two dates 
			var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 

			// console.log("Total number of days between dates is - "+ Difference_In_Days); 
			return Difference_In_Days;
		}

		function enabledDisabledOptions(elementId="", noOfDays="") {
			
			$("#reportType-option-0 button").removeAttr('disabled');
			$("#reportType-option-1 button").removeAttr('disabled');
			$("#reportType-option-2 button").removeAttr('disabled');
			$("#reportType-option-3 button").removeAttr('disabled');

			if( noOfDays >= 0 && noOfDays <= 7 ){
				$("#reportType-option-0 button").prop('disabled', true);
				$("#reportType-option-1 button").prop('disabled', true);
				$("#reportType-option-2 button").prop('disabled', true);
			}else if( noOfDays >= 8 && noOfDays <= 30 ){
				$("#reportType-option-0 button").prop('disabled', true);
				$("#reportType-option-1 button").prop('disabled', true);
				$("#reportType-option-2 button").prop('disabled', true);
			}else if( noOfDays >= 31 && noOfDays <= 365 ){
				$("#reportType-option-0 button").prop('disabled', true);
				$("#reportType-option-1 button").prop('disabled', true);
			}
			
		}

		// trigger if change date of range picker
		$('input[name="reportrange"]').on('apply.daterangepicker', function(ev, picker) {
			
			var startDate 	= picker.startDate.format('MM/DD/YYYY');
			var endDate 	= picker.endDate.format('MM/DD/YYYY');
			var noOfDays 	= dateDiffrenceInDays( startDate, endDate );
			enabledDisabledOptions("reportType", noOfDays );

		});

		// Call if you want to change date format according to report type
		function checkDateFormat(reportType=""){

			// console.log("checkDateFormat => "+reportType);
			if( reportType == "y" ){
				return "yyyy";
			}else if( reportType == "m" ){
				return "MMM yyyy";
			}else if( reportType == "w" ){
				return "dd MMM yyyy";
			}else if( reportType == "d" ){
				return "dd MMM yyyy";
			}else{
				return "dd MMM yyyy";
			}

		}

		// On change of filters ajax request
		function onChangeGrphDraw(){

			var reportrange 	= $("#reportrange").val();
			//var reportType 		= $("#reportType").val();
			var reportType 		= $("#reportType-menu .custom-a11yselect-selected").attr('data-val');
			//var reportSource 	= $("#reportSource").val();
			var reportSource 	= $("#reportSource-menu .custom-a11yselect-selected").attr('data-val');
			//var reportStatus 	= $("#reportStatus").val();
			var reportStatus 	= $("#reportStatus-menu .custom-a11yselect-selected").attr('data-val');
			//var reportLeadType 	= $("#reportLeadType").val();
			var reportLeadType 	= $("#reportLeadType-menu .custom-a11yselect-selected").attr('data-val');
			//var reportBranch 	= $("#reportBranch").val();
			var reportBranch 	= $("#reportBranch-menu .custom-a11yselect-selected").attr('data-val');
			var teamId 			= $("#teamId").val();
			var userId 			= $("#userId").val();
			var dateFormat 		= checkDateFormat(reportType);

			$(".loader").css("display","block");

			$.ajax({
				url			: '<?php echo base_url("lead-report"); ?>',
				method		: 'POST',
				dataType	: "json",
				data		: { "reportrange" : reportrange, "reportType" : reportType, "reportSource" : reportSource, "reportStatus" : reportStatus, "reportLeadType" : reportLeadType, "reportBranch" : reportBranch,  "teamId" : teamId, "userId" : userId },
				success 	: function(response){
					// console.log(response);
					drawChart(response.data, response.xTitle, response.yTitle, reportSource, dateFormat);
					$(".loader").css("display","none");
				},

			});

		}


		// trigger if change date range picker
		$("#reportrange").change(function(){
			onChangeGrphDraw();
		});

		// trigger if change report type
		$("#reportType").change(function(){
			onChangeGrphDraw();
		});

		// trigger if change source 
		$("#reportSource").change(function(){
			onChangeGrphDraw();
		});

		// trigger if change status 
		$("#reportStatus").change(function(){
			onChangeGrphDraw();
		});

		// trigger if change lead type 
		$("#reportLeadType").change(function(){
			onChangeGrphDraw();
		});

		// trigger if change branch 
		$("#reportBranch").change(function(){
			onChangeGrphDraw();
		});

		// trigger if change team 
		$("#teamId").change(function(){

			$('#userId').val('').select2({ allowClear :true, placeholder: 'Select User', });
			onChangeGrphDraw();
		});

		// trigger if change users 
		$("#userId").change(function(){

			$('#teamId').val('').select2({ allowClear :true, placeholder: 'Select Team', });
			onChangeGrphDraw();

		});

	});


	// ######## START TABULAR SCRIPT ######## 

	function load_more_tabular(element){
        var page = $(element).val();
    	tabluarLoadMore(page);
 	}

  	function tabluarLoadMore(page){

    	// $("#loader").show();
    	var reportrange 	= $("#reportrange").val();
		//var reportType 		= $("#reportType").val();
		var reportType 		= $("#reportType-menu .custom-a11yselect-selected").attr('data-val');
		//var reportSource 	= $("#reportSource").val();
		var reportSource 	= $("#reportSource-menu .custom-a11yselect-selected").attr('data-val');
		//var reportStatus 	= $("#reportStatus").val();
		var reportStatus 	= $("#reportStatus-menu .custom-a11yselect-selected").attr('data-val');
		//var reportLeadType 	= $("#reportLeadType").val();
		var reportLeadType 	= $("#reportLeadType-menu .custom-a11yselect-selected").attr('data-val');
		//var reportBranch 	= $("#reportBranch").val();
		var reportBranch 	= $("#reportBranch-menu .custom-a11yselect-selected").attr('data-val');
		var teamId 			= $("#teamId").val();
		var userId 			= $("#userId").val();
		var dataPoint 		= $("#tabular_data_point").val();
		
        $.ajax({
            url:"<?php echo base_url() ?>lead-load-more",
            type:'POST',
            dataType : 'json',
            data: { "page" : page, "reportrange" : reportrange, "reportType" : reportType, "reportSource" : reportSource, "reportStatus" : reportStatus, "reportLeadType" : reportLeadType, "reportBranch" : reportBranch,  "teamId" : teamId, "userId" : userId, "dataPoint" : dataPoint   },
            success : function(response){

            	if( response.status == true ){

					$('#load_more_tabular').val( parseInt( $('#load_more_tabular').val() ) + parseInt(1)  );

					// append tabular rows dynamically
					if( response.data.html != "" ){
						$(".table_tabular tbody").append(response.data.html);
						$(".tabular_remaining").html("Remaining:"+response.data.remaining);

					}

					// enable or disabled show more
					if( response.data.remaining <= 0 ){
						$("#load_more_tabular").css("display", "none");
						$(".tabular_remaining").css("display", "none");
					}else{
						$("#load_more_tabular").css("display", "block");
						$(".tabular_remaining").css("display", "block");
					}
					
					$(".list_section").css("display","block");

				}
        	},
    	});

    }


	// ######## END TABULAR SCRIPT ######## 

	

<?php }  ?>

$(document).on('click', function (event) {
  if (!$(event.target).closest('.oppo_menu').length) {
    // ... clicked on the 'body', but not inside of #menutop
    $(".treeview-menu").css("display","none");
  }
});
</script> 
