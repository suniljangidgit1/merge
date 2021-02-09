<style>
	
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- display loader while apply any filter -->
	<div class="loader">
    	<!-- <img src="<?php echo base_url('assets/images/loading.gif') ?>"> -->
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
		                              	<div class="customerwise_report">
		                                 	<h4><i class="material-icons-outlined">monetization_on</i><?php echo isset($page_title) ? $page_title : "Report"; ?></h4>
		                              	</div>
		                           	</div>
		                        </div>
	                     	</div>
	                     	<div class="header-middle">
	                     		<div class="row">
	                     			<div class="col-md-3 col-xs-12 col-sm-7">
		                              	<div class="form-group date_daily_add">
		                                 	<label>Invoice date</label>
		                                 	<div class="input-group">
		                                    	<input type="text" class="form-control" id="customerwise_reportrange" name="customerwise_reportrange" >
		                                    	<label for="customerwise_reportrange" class="input-group-addon">
		                                    		<i class="material-icons-outlined date_range_icon">date_range</i>
		                                    	</label>
		                                 	</div>
		                              	</div>
		                           	</div>
	                     			<!-- <div class="col-md-3 col-xs-7">
		                              	<div class="form-group date_daily_add">
		                                    <label>Due date</label>
		                                 	<div class="input-group">
		                                    	<input type="text" class="form-control" id="customerwise_duereportrange" name="customerwise_duereportrange" />
		                                    	<label for="customerwise_duereportrange" class="input-group-addon">
		                                    		<i class="fa fa-calendar"></i>
		                                    	</label>
		                                 	</div>
		                              	</div>
		                           	</div>
	                     			<div class="col-md-3 col-xs-7">
		                              	<div class="form-group date_daily_add">
		                                    <label>Payment date</label>
		                                 	<div class="input-group">
		                                    	<input type="text" class="form-control" id="customerwise_paymentreportrange" name="customerwise_paymentreportrange" />
		                                    	<label for="customerwise_paymentreportrange" class="input-group-addon">
		                                    		<i class="fa fa-calendar"></i>
		                                    	</label>
		                                 	</div>
		                              	</div>
		                           	</div> -->
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
            
            <div class="box-body list" id="customer_wise_report_main" style="padding: 15px 0px;" >
               <div class="table-responsive">
               		<table id="customer_wise_report" class="table" style="width:100%">
               		<thead class="schedularth">
               			<tr>
               				<th><span><b>Billing Entity Name</b></span></th>
               				<th><span><b>Billed To Name</b></span></th>
               				<th><span><b>Total No of invoices raised</b></span></th>
               				<th><span><b>Total invoices value</b></span></th>
               				<th><span><b>Total payment received</b></span></th>
               				<th><span><b>Total TDS Deducted</b></span></th>
               				<th><span><b>Total amount receivable</b></span></th>
               				<th><span><b>Status</b></span></th>
               			</tr>
               		</thead>
               		<tbody><?php
               			if(!empty($customerArr)){
               				// echo '<pre>';print_r($customerArr);//die;
               				foreach($customerArr as $custArr)
               				{
               					if(count($customerArr) > 0){ ?>
           							<tr>
           								<td><?php echo $custArr['account_name'];?></td>
           								<td><?php echo $custArr['billing_entity_name'];?></td>
           								<td><?php echo $custArr['total_invoices'];?></td>
           								<td><?php echo ($custArr['total']) ? '₹ '.number_format($custArr['total'],2) : '₹ 0';?></td>
           								<td><?php echo ($custArr['total_credited']) ? '₹ '.number_format($custArr['total_credited'],2) : '₹ 0';?></td>
           								<td><?php echo ($custArr['total_tds']) ? '₹ '.number_format($custArr['total_tds'],2) : '₹ 0';?></td>
           								<td><?php echo ($custArr['total_receivable']) ? '₹ '.number_format($custArr['total_receivable'],2) : '₹ 0';?></td>
           								<td><?php echo $custArr['status'];?></td>
           							</tr><?php
               					}
               					else { ?>
           							<tr>
               							<td class="cell">---</td>
               							<td class="cell">₹ 0</td>
               							<td class="cell">₹ 0</td>
               							<td class="cell">₹ 0</td>
               							<td class="cell">₹ 0</td>
               							<td class="cell">₹ 0</td>
               							<td class="cell">---</td>
           							</tr><?php
               					}
               				}

               				/*foreach($customerArr as $custArr){
               					$invoice_array = getcustomer_invoices($custArr['id'], $filterData);
               					// echo '<pre>';print_r($invoice_array);die;
               					$cnt = 0;
               					
           						if(count($invoice_array) >= 1){ ?>
           							<!-- <td class="list-row" colspan="7">
           								<table class="table"> --><?php
	               							foreach($invoice_array as $invoices){
	               								$invoice_details = getbillingentitiesinvoices($invoices['billing_entity_id'], $filterData);

               									$amt_receivable = $invoice_details['total_billed_amt'] - $invoice_details['total_credited'] - $invoice_details['total_tds'];

               									if($amt_receivable > 0){
               										$status = "Due";
               									}
               									else {
               										$status = "Paid";
               									} ?>
	               								<tr>
	               									<td class="cell">
				               							<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/#Account/view/<?php echo $custArr['id'];?>"><?php echo $custArr['name'];?></a>
				               						</td>
	               									<td class="cell"><?php echo $invoices['billfromname'];?></td>
	               									<td class="cell"><?php echo $invoices['total_invoices'];?></td>
	               									<td class="cell"><?php echo ($invoice_details['total_billed_amt']) ? '₹ '.number_format($invoice_details['total_billed_amt'], 2) : '₹ 0';?></td>
	               									<td class="cell"><?php echo ($invoice_details['total_credited']) ? '₹ '.number_format($invoice_details['total_credited'], 2) : '₹ 0';?></td>
	               									<td class="cell"><?php echo ($invoice_details['total_tds']) ? '₹ '.number_format($invoice_details['total_tds'], 2) : '₹ 0';?></td>
	               									<td class="cell"><?php echo ($amt_receivable) ? '₹ '.number_format($amt_receivable, 2) : '₹ 0';?></td>
	               									<td class="cell"><?php echo $status;?></td>
	               								</tr><?php
	               							}	?>
               							<!-- </table>
           							</td> --><?php
           						}
           						else { ?>
           							<tr>
               							<td class="cell">---</td>
               							<td class="cell">₹ 0</td>
               							<td class="cell">₹ 0</td>
               							<td class="cell">₹ 0</td>
               							<td class="cell">₹ 0</td>
               							<td class="cell">₹ 0</td>
               							<td class="cell">---</td>
           							</tr><?php
           						} ?>
           						<?php
               				}*/
               			} ?>
               		</tbody>
               		</table>
           	   </div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
      </div>
      <!-- /.row -->
    </section>
    

    <!-- start kaban view -->
    <section class="content kanban_content">
   		<div class="row">
      		<div class="col-md-12">
         	
	         	<div class="box" style="background: transparent;box-shadow: unset;">
	            	<div class="box-body">
	               		<div class="">

	               			<input type="hidden" class="form-control" id="kanban_data_point" name="kanban_data_point" value="" >

	                  		<div class=" kanban table-responsive">
	                     		<table class="table main_table" >
	                        		<thead>
	                        		</thead>
		                    		<tbody>
		                           		<tr class="kanban_individual_stage">
		                           			<!-- Append dynamically individual status html here -->
		                              	</tr>
		                          	</tbody>
		                      	</table>
		                  	</div>
		              	</div>
		          	</div>
		      	</div>
		  	</div>
		</div>
	</section>
    <!-- end kaban view -->


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
											<th >STAGE</th>
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
<script>
$(document).ready(function() {
    $('#customer_wise_report').DataTable( {
        /*"language" : {
	        sLengthMenu: "Show _MENU_"
	    },
	    "info": false,*/
        "pagingType": "full_numbers",
        "dom": '<"pull-left"f><"pull-right"l>tip',
        "lengthMenu": [20, 50, 75, 100 ],
        "pageLength": 20
    } );
} );
</script>


<script >

<?php if( !empty($customerArr) ) { ?>
	$(document).ready(function(){

		var start 	= moment().subtract(6, 'days');
		var end 	= moment();

		// =========== Date range picker for invoice date starts here =============
		$('#customerwise_reportrange').daterangepicker({
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
		// =========== Date range picker for invoice date ends here =============

		// =========== Date range picker for due date starts here  =============
		$('#customerwise_duereportrange').daterangepicker({
			startDate: start,
			endDate: end,
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
			locale: { 
				format: "DD-MM-YYYY",
				separator: ' To ',
        	},
		});
		// =========== Date range picker for due date ends here  =============
		
		// =========== Date range picker for payment date starts here  =============
		$('#customerwise_paymentreportrange').daterangepicker({
			startDate: start,
			endDate: end,
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
			locale: { 
				format: "DD-MM-YYYY",
				separator: ' To ',
        	},
		});
		// =========== Date range picker for payment date ends here  =============

		// Default display none or block - only display block if cilck on graph data point
		$(".kanban_content").css("display","none");
		$(".list_section").css("display","none");


		// Select display none default
		$(".select_stage").css("display","none");
	   	$(".selected_user").css("display","none");
	   	$(".selected_team").css("display","none");

		// select to for reportType, reportStage dropdown
		$('.reportSelect').customA11ySelect();

		$("#reportType-option-0 button").prop('disabled', true);
		$("#reportType-option-1 button").prop('disabled', true);
		$("#reportType-option-2 button").prop('disabled', true);
		$("#reportType-option-3 button").prop('disabled', false);

		// Start Filter functionality : select box display none or block
		$(document).on('click', '.add_filter .dropdown-menu li a', function(){
      
			var item=$(this).text();
			var len=$(".add_filter .dropdown-menu li a").length;
			
			if(item=="Select Stage") {
			 	$(".select_stage").css("display","block");
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
		

   		
		// Start Filter functionality : close button display or hide
		$(".Common").mouseover(function(){
		    $(this).find(".close").css("display","block");
	   	});

	  	$(".Common").mouseleave(function(){
		    $(this).find(".close").css("display","none");
	   	});
	   	// End Filter functionality : close button display or hide


	   	// Start toogle kanban view & tabula viewr 

		$('.select_stage select').change(function(){
			$(".kanban_content").css("display","none");
	       	$(".list_section").css("display","none");
		});
		// End toogle kanban view & tabula viewr 


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
			
			// console.log(" noOfDays - "+noOfDays);
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
		$('input[name="customerwise_reportrange"]').on('apply.daterangepicker', function(ev, picker) {
			
			var startDateInvoice= picker.startDate.format('MM/DD/YYYY');
			var endDateInvoice 	= picker.endDate.format('MM/DD/YYYY');
			// console.log( startDate + ' <-> ' + endDate );

			$.ajax({
				url			: '<?php echo base_url("customerwise-report/1"); ?>',
				method		: 'POST',
				dataType	: "json",
				data		: { "invoice_start_date" : startDateInvoice, "invoice_end_date" : endDateInvoice },
				success 	: function(response){

					$("#customer_wise_report").html(response.html);
					// drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
					// $(".loader").css("display","none");
				},
			});
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


		// trigger if change date range picker
		$("#customerwise_reportrange").change(function(){

			var customerwise_reportrange 	= $("#customerwise_reportrange").val();
			//var reportType 		= $("#reportType").val();
			var reportType 		= $("#reportType-menu .custom-a11yselect-selected").attr('data-val');
			//var reportStage 	= $("#reportStage").val();
			var reportStage 	= $("#reportStage-menu .custom-a11yselect-selected").attr('data-val');
			var teamId 			= $("#teamId").val();
			var userId 			= $("#userId").val();
			var dateFormat 		= checkDateFormat(reportType);

			if( customerwise_reportrange != "" ){

				$(".loader").css("display","block");
				$.ajax({
					url			: '<?php echo base_url("opportunity-stage-report"); ?>',
					method		: 'POST',
					dataType	: "json",
					data		: { "customerwise_reportrange" : customerwise_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId },
					success 	: function(response){
						// console.log(response);
						drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
						$(".loader").css("display","none");
					},

				});
			}else{
				alert("Please select date range or report type.")
			}
			
		});

		// trigger if change report type
		$("#reportType").change(function(){

			var customerwise_reportrange 	= $("#customerwise_reportrange").val();
			var reportType 		= $(this).val();
			//var reportStage 	= $("#reportStage").val();
			var reportStage 	= $("#reportStage-menu .custom-a11yselect-selected").attr('data-val');
			var teamId 			= $("#teamId").val();
			var userId 			= $("#userId").val();
			var dateFormat 		= checkDateFormat(reportType);
			

			if( customerwise_reportrange != "" ){

				$(".loader").css("display","block");
				$.ajax({
					url			: '<?php echo base_url("opportunity-stage-report"); ?>',
					method		: 'POST',
					dataType	: "json",
					data		: { "customerwise_reportrange" : customerwise_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId },
					success 	: function(response){
						// console.log(response);
						drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
						$(".loader").css("display","none");
					},

				});
			}else{
				alert("Please select date range or report type.")
			}
			
		});

		// trigger if change users 
		$("#reportStage").change(function(){

			/*var customerwise_reportrange = $("#customerwise_reportrange").val();
			var reportType 	= $("#reportType").val();
			var reportStage= $(this).val();
			var teamId 		= $("#teamId").val();
			var userId 		= $("#userId").val();
			var dateFormat 		= checkDateFormat(reportType);
			

			if( customerwise_reportrange != "" ){

				$(".loader").css("display","block");
				$.ajax({

					url			: '<?php echo base_url("opportunity-stage-report"); ?>',
					method		: 'POST',
					dataType	: "json",
					data		: { "customerwise_reportrange" : customerwise_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId },
					success 	: function(response){
						// console.log(response);
						drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
						$(".loader").css("display","none");
					},

				});
				
			}*/

			var current_val= $(this).val();

			onChangeOfReportStage(current_val);

		});


		function onChangeOfReportStage(current_val)
			{

			//alert("On stage Change "+current_val);
			var customerwise_reportrange = $("#customerwise_reportrange").val();
			var reportType = $("#reportType").val();
			var reportStage= current_val;
			// var reportStage= $(this).val();
			var teamId = $("#teamId").val();
			var userId = $("#userId").val();
			var dateFormat = checkDateFormat(reportType);


			if( customerwise_reportrange != "" ){

			$(".loader").css("display","block");
			$.ajax({

			url : '<?php echo base_url("opportunity-stage-report"); ?>',
			method : 'POST',
			dataType : "json",
			data : { "customerwise_reportrange" : customerwise_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId },
			success : function(response){
			// console.log(response);
			drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
			$(".loader").css("display","none");
			},

			});

			}
			}

		// trigger if change users 
		$("#teamId").change(function(){

			/*$('#userId').val('').select2({ allowClear :true, placeholder: 'Select User', });

			var customerwise_reportrange 	= $("#customerwise_reportrange").val();
			var reportType 		= $("#reportType").val();
			var reportStage	    = $("#reportStage").val();
			var teamId 			= $(this).val();
			var userId 			= $("#userId").val();
			var dateFormat 		= checkDateFormat(reportType);
			

			if( customerwise_reportrange != "" ){

				$(".loader").css("display","block");
				$.ajax({

					url			: '<?php echo base_url("opportunity-stage-report"); ?>',
					method		: 'POST',
					dataType	: "json",
					data		: { "customerwise_reportrange" : customerwise_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId },
					success 	: function(response){
						// console.log(response);
						drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
						$(".loader").css("display","none");
					},

				});
				
			}*/

			var current_val= $(this).val();

			onChangeOfTeam(current_val);
		});

		function onChangeOfTeam(current_val)
			{
			//alert("On change Of team"+current_val);

			$('#userId').val('').select2({ allowClear :true, placeholder: 'Select User', });

			var customerwise_reportrange = $("#customerwise_reportrange").val();
			var reportType = $("#reportType").val();
			var reportStage = $(".select_stage .custom-a11yselect-menu .custom-a11yselect-selected").attr('data-val');
			var teamId = current_val;
			var userId = $("#userId").val();
			var dateFormat = checkDateFormat(reportType);


			if( customerwise_reportrange != "" ){

			$(".loader").css("display","block");
			$.ajax({

			url : '<?php echo base_url("opportunity-stage-report"); ?>',
			method : 'POST',
			dataType : "json",
			data : { "customerwise_reportrange" : customerwise_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId },
			success : function(response){
			// console.log(response);
			drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
			$(".loader").css("display","none");
			},

			});



			}
			}


		// trigger if change users 
		$("#userId").change(function(){

			/*$('#teamId').val('').select2({ allowClear :true, placeholder: 'Select Team', });

			var customerwise_reportrange 	= $("#customerwise_reportrange").val();
			var reportType 		= $("#reportType").val();
			var reportStage		= $("#reportStage").val();
			var teamId 			= $("#teamId").val();
			var userId 			= $(this).val();
			var dateFormat 		= checkDateFormat(reportType);
			

			if( customerwise_reportrange != "" ){

				$(".loader").css("display","block");
				$.ajax({

					url			: '<?php echo base_url("opportunity-stage-report"); ?>',
					method		: 'POST',
					dataType	: "json",
					data		: { "customerwise_reportrange" : customerwise_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId },
					success 	: function(response){
						// console.log(response);
						drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
						$(".loader").css("display","none");
					},

				});
				
			}*/

			var current_val=$(this).val();
			onChangeOfUser(current_val);
		});

		function onChangeOfUser(current_val)
		{


		$('#teamId').val('').select2({ allowClear :true, placeholder: 'Select Team', });

		var customerwise_reportrange = $("#customerwise_reportrange").val();
		var reportType = $("#reportType").val();
		var reportStage = $(".select_stage .custom-a11yselect-menu .custom-a11yselect-selected").attr('data-val');
		var teamId = $("#teamId").val();
		var userId = current_val;
		var dateFormat = checkDateFormat(reportType);

		//alert(userId);
		if( customerwise_reportrange != "" ){

		$(".loader").css("display","block");
		$.ajax({

		url : '<?php echo base_url("opportunity-stage-report"); ?>',
		method : 'POST',
		dataType : "json",
		data : { "customerwise_reportrange" : customerwise_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId },
		success : function(response){
		// console.log(response);
		drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
		$(".loader").css("display","none");
		},

		});

		}

		}

	});

	

	// ######## START KANBAN SCRIPT ######## 

	function load_more_kanban(element){
        // e.preventDefault();
        // var kanbanStatus 	= $(element).attr("class").split(' ')[0];
        var kanbanStatus 	= $(element).attr("class").replace("btn btn-primary left_alignment", "");
        var kanbanPage 		= $(element).attr("value");
    	kanbanLoadMore(element, kanbanStatus, kanbanPage);
 	}



  	function kanbanLoadMore(element, kanbanStatus, kanbanPage){

    	// $("#loader").show();

    	var customerwise_reportrange 	= $("#customerwise_reportrange").val();
		//var reportType 		= $("#reportType").val();
		var reportType 		= $("#reportType-menu .custom-a11yselect-selected").attr('data-val');
		//var reportStage 	= $("#reportStage").val();
		var reportStage 	= $("#reportStage-menu .custom-a11yselect-selected").attr('data-val');
		var teamId 			= $("#teamId").val();
		var userId 			= $("#userId").val();
		var dataPoint 		= $("#kanban_data_point").val();
		
        $.ajax({
            url:"<?php echo base_url() ?>opp-stage-tabular-data",
            type:'POST',
            dataType : 'json',
            data: { "kanbanPage" : kanbanPage, "customerwise_reportrange" : customerwise_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId, "dataPoint" : dataPoint, "kanbanStatus" : kanbanStatus   },
            success : function(response){

            	// console.log(" response -> "+JSON.stringify(response) );
            	if( response.status == true ){

					// append tabular rows dynamically
					if( response.data.html != "" ){
						$(element).closest("tbody").find("tr:last").css("display", "none");
						$(element).closest("tbody").append(response.data.html);
					}

				}else{

					$(".list_section").css("display","none");
				}
        	},
    	});

    }


	// ######## END KANBAN SCRIPT ######## 
	

	// ######## START TABULAR SCRIPT ######## 

	function load_more_tabular(element){
        // e.preventDefault();
        var page = $(element).val();
    	tabluarLoadMore(page);
 	}

  	function tabluarLoadMore(page){

    	// $("#loader").show();

    	var customerwise_reportrange 	= $("#customerwise_reportrange").val();
		//var reportType 		= $("#reportType").val();
		var reportType 		= $("#reportType-menu .custom-a11yselect-selected").attr('data-val');
		//var reportStage 	= $("#reportStage").val();
		var reportStage 	= $("#reportStage-menu .custom-a11yselect-selected").attr('data-val');
		var teamId 			= $("#teamId").val();
		var userId 			= $("#userId").val();
		var dataPoint 		= $("#tabular_data_point").val();
		
        $.ajax({
            url:"<?php echo base_url() ?>opp-stage-tabular-data",
            type:'POST',
            dataType : 'json',
            data: { "page" : page, "customerwise_reportrange" : customerwise_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId, "dataPoint" : dataPoint   },
            success : function(response){

            	if( response.status == true ){

					$('#load_more_tabular').val( parseInt( $('#load_more_tabular').val() ) + parseInt(1)  );

					// append tabular rows dynamically
					if( reportStage != "" && response.data.html != "" ){
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

    function tabluarScroll(){
    	// console.log(" tabluarScroll innn -> called ");
        $('html, body').animate({
            scrollTop: $('#load_more_tabular').offset().top
        }, 1000);
    };

	// ######## END TABULAR SCRIPT ######## 

	

<?php }  ?>

</script> 
