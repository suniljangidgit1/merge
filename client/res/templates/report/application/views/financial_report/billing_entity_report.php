<style>
	div.dataTables_wrapper div.dataTables_filter{
		text-align: right;
	}

	.dataTables_filter{
		display:none;
	}
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
		                              	<div class="billing_entity_report">
		                                 	<h4><!-- <i class="material-icons-outlined">monetization_on</i> --><?php echo isset($page_title) ? $page_title : "Report"; ?></h4>
		                              	</div>
		                           	</div>
		                           	
		                        </div>
	                     	</div>
	                     	<!-- <div class="header-middle"> -->
	                     		<!-- <div class="row"> -->
	                     			<!-- <div class="col-md-3 col-xs-12 col-sm-7">
		                              	<div class="form-group date_daily_add">
		                                    <label>Invoice date</label>
		                                 	<div class="input-group">
		                                    	<input type="text" class="form-control" id="billingentity_reportrange" name="billingentity_reportrange" />
		                                    	<label for="billingentity_reportrange" class="input-group-addon">
		                                    		<i class="material-icons-outlined date_range_icon">date_range</i>
		                                    	</label>
		                                 	</div>
		                              	</div>
		                           	</div> -->
	                     			<!-- <div class="col-md-3 col-xs-7">
		                              	<div class="form-group date_daily_add">
		                                    <label>Due date</label>
		                                 	<div class="input-group">
		                                    	<input type="text" class="form-control" id="billingentity_duereportrange" name="billingentity_duereportrange" />
		                                    	<label for="billingentity_duereportrange" class="input-group-addon">
		                                    		<i class="fa fa-calendar"></i>
		                                    	</label>
		                                 	</div>
		                              	</div>
		                           	</div>
	                     			<div class="col-md-3 col-xs-7">
		                              	<div class="form-group date_daily_add">
		                                    <label>Payment date</label>
		                                 	<div class="input-group">
		                                    	<input type="text" class="form-control" id="billingentity_paymentreportrange" name="billingentity_paymentreportrange" />
		                                    	<label for="billingentity_paymentreportrange" class="input-group-addon">
		                                    		<i class="fa fa-calendar"></i>
		                                    	</label>
		                                 	</div>
		                              	</div>
		                           	</div> -->
	                     		<!-- </div> -->
	                     	<!-- </div> -->

	                     	<div class="searchBarDiv">
	                     		<div class="row ">
	                     			<div class="col-lg-5 col-md-6 col-sm-6 ">
	                     				<div class="form-group">
	                     					<div class="input-group" id="Search-bar-group">
										      <input class="form-control search-main" placeholder="Search..." name="srch-term " id="srch-term" type="text" autocomplete="off">
										      <div class="input-group-btn">
										        <button type="button" class="btn search btn-icon" id="search-btn-icon">
								                    <span class="material-icons-outlined">search</span>
								                </button>
								                <button type="button" class=" refresh-button btn  btn-icon-refresh"><i class="material-icons-outlined" aria-hidden="true" >refresh</i>&nbsp;
						                         </button>
										      </div>
										    </div>
	                     				</div>
	                     			</div>
	                     			<div class="col-lg-3 col-md-5 col-xs-12 col-sm-6 date-range-section-col">
		                              	<div class="form-group date_daily_add header-middle">
		                                    <label>Invoice date</label>
		                                 	<div class="input-group">
		                                    	<input type="text" class="form-control" id="billingentity_reportrange" name="billingentity_reportrange" />
		                                    	<label for="billingentity_reportrange" class="input-group-addon">
		                                    		<i class="material-icons-outlined date_range_icon">date_range</i>
		                                    	</label>
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
            
            <div class="box-body list" id="billing_entity_table_main" style="padding: 15px 0px;">
               <div class="table-responsive">
               		<table id="billing_entity_table" class="table" style="width:100%">
	               		<thead class="schedularth">
	               			<tr>
	               				<th><span>Billing Entity name</span></th>
	               				<th><span>Billed amount</span></th>
	               				<th><span>Received amount</span></th>
	               				<th><span>TDS Receivable</span></th>
	               				<th><span>Amount Receivable</span></th>
	               				<th><span>See Details</span></th>
	               			</tr>
	               		</thead>
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

	<!-- <section class="content list_section">
	   	<div class="row">
	      	<div class="col-md-12">
	         	<div class="box">
	            	<div class="box-body">
	               	
	               		<div class="">
	               			<input type="hidden" class="form-control" id="tabular_data_point" name="tabular_data_point" >
	                  		<div class="table-responsive">
	                     		<table class="table table_tabular">
	                        		<thead>
	                           			<tr>
	                              			<th>SR NO</th>
											<th>BILLING ENTITY NAME</th>
											<th>TOTAL BILLED AMOUNT</th>
											<th>RECEIVED AMOUNT</th>
											<th>TDS AVAILABLE</th>
											<th>AMOUNT RECEIVABLE</th>
											<th>SEE DETAILS</th>
	                           			</tr>
	                        		</thead>
                        			<tbody><?php
                        				/*if(!empty($billEntityArr)){
				               				$i = 1;
				               				foreach($billEntityArr as $billEntArr){
				               					$p = getbillingentitiesinvoices($billEntArr['id'], $filterData);?>
				               					<tr class="list-row">
				               						<td class="cell">
				               							<a href="http://fincrm.crm.com/#BillingEntity/view/<?php echo $billEntArr['id'];?>"><?php echo $billEntArr['name'];?></a>
				               						</td>
				               						<td class="cell"><?php echo '₹ '.($p['total_billed_amt']) ? number_format($p['total_billed_amt'],2) : '₹ 0';?></td>
						               				<td class="cell"><?php echo '₹ '.($p['total_credited']) ? number_format($p['total_credited'],2) : '₹ 0';?></td>
						               				<td class="cell"><?php echo '₹ '.($p['total_tds']) ? number_format($p['total_tds'],2) : '₹ 0';?></td>
						               				<td class="cell"><?php echo '₹ '.($p['amt_receivable']) ? number_format($p['amt_receivable'],2) : '₹ 0';?></td>
						               				<td class="cell">
						               					<a href="" class="view_details" data-id="<?php echo $billEntArr['id'];?>">View</a>
						               				</td>
				               					</tr><?php
				               					$i++;
				               				}
				               			}
				               			else { ?>
				               				<tr>
				               					<td colspan="6">No Data</td>
				               				</tr>
				               				<?php
				               			}*/  ?>
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
	</section>-->
    <!-- end tabular view -->
   
</div>
<!-- /.content-wrapper -->

<!-- Popup to show the list of all invoices of billing entity -->
<div class="container">
	<div class="modal fade" id="addBillingEnitityInvoiceModal" role="dialog">
	    <div class="modal-dialog" style="width:1000px;">
	        <!-- Modal content-->
	        <div class="modal-content" style="border-radius: 20px !important;">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                <h4 class="modal-title"><b>Invoice List</b></h4>
	            </div>
	            <div class="modal-body">
	            	
	            </div>
	        </div>
	    </div>
	</div>
</div>
<!-- Popup to show the list of all invoices of billing entity -->

<!-- Popup to show the list of all invoices of billing entity -->
<div class="container">
	<div class="modal fade" id="InvoicePaymentSummaryModal" role="dialog">
	    <div class="modal-dialog" style="width:1000px;">
	        <!-- Modal content-->
	        <div class="modal-content" style="border-radius: 20px !important;">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                <h4 class="modal-title"><b>Payment Summary</b></h4>
	            </div>
	            <div class="modal-body">
                   <div class="payment_SummaryForm"></div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<!-- Popup to show the list of all invoices of billing entity -->

<!-- START SCRIPT SECTION -->
<script>
	$(document).ready(function(){

		var start 	= moment().subtract(6, 'days');
		var end 	= moment();

		var startDateInvoice 	= start.format('MM/DD/YYYY');
		var endDateInvoice 		= end.format('MM/DD/YYYY');

		var table = $('#billing_entity_table').DataTable({
	    	"pagingType": "full_numbers",
	        "dom": '<"pull-left"f><"pull-right"l>tip',
	        "lengthMenu": [20, 50, 75, 100 ],
	        "pageLength": 20,
	        'serverMethod': 'post',
	        'ajax': {
				'url':'<?php echo base_url("Financial/get_records_billing_entitywise"); ?>',
				"dataSrc": "",
				'data': function(data){
					// Read values
					data.invoice_start_date = startDateInvoice;
					data.invoice_end_date = endDateInvoice;
					data.searchName = $("#srch-term").val();
				}
			},
			'columns': [
				{ data: 'name' }, 
				{ data: 'total_billed_amt' }, 
				{ data: 'total_credited' },
				{ data: 'total_tds' },
				{ data: 'amt_receivable' },
				{ data: 'view' },
			],
			"searching": true,
			"bInfo": false,
			"bLengthChange" : false,
	    });


		$(document).on("keyup", "#srch-term", function(){
			table.search($("#srch-term").val()).draw();
		});

		$(document).on("click", ".btn-icon-refresh", function(){
			$("#srch-term").val("");
			$("#billingentity_reportrange").daterangepicker({
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
			table.search("").draw();
		});

	});
</script>

<script >
	$("#example_invoices").DataTable({
		"pagingType": "full_numbers",
        "dom": '<"pull-left"f><"pull-right"l>tip',
        "lengthMenu": [20, 50, 75, 100 ],
        "pageLength": 20,
	});

	$(document).on("click", ".view_details", function(e){
		e.preventDefault();
		var dataId = $(this).data("id");

		$.ajax({
	        type: "GET",
	        url: "<?php echo base_url();?>financial/getbilling_entity_invoices/"+dataId,
	        data: { "invoice_start_date" : $(this).data("startdate"), "invoice_end_date" : $(this).data("enddate")},
	        success: function (data){
	            $("#addBillingEnitityInvoiceModal .modal-body").html(data);
				$("#addBillingEnitityInvoiceModal").modal("show");
	        }
	    });
	});

	$(document).on("click", ".view_summary", function(e){
		var dataId = $(this).attr("data-id");

        // url: "../../../../client/res/templates/financial_changes/Payment_summary.php",
		$.ajax({
	        type: "GET",
	        url: "<?php echo base_url();?>financial/get_payment_summary/",
	        data: { dataId : dataId },
	        success: function (data){
	            $(".payment_SummaryForm").html(data);
            	$("#InvoicePaymentSummaryModal").modal();
	        }
	    });
	});



var start 	= moment().subtract(6, 'days');
var end 	= moment();

// =========== Date range picker for invoice date starts here =============
$('#billingentity_reportrange').daterangepicker({
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


<?php if( !empty($billEntityArr) ) { ?>
	$(document).ready(function(){

		var start 	= moment().subtract(6, 'days');
		var end 	= moment();

		// =========== Date range picker for invoice date starts here =============
		$('#billingentity_reportrange').daterangepicker({
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
		// =========== Date range picker for invoice date ends here =============

		// =========== Date range picker for due date starts here  =============
		$('#billingentity_duereportrange').daterangepicker({
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
		$('#billingentity_paymentreportrange').daterangepicker({
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
		
		// select to for reportType, reportStage dropdown
		$('.reportSelect').customA11ySelect();

		$("#reportType-option-0 button").prop('disabled', true);
		$("#reportType-option-1 button").prop('disabled', true);
		$("#reportType-option-2 button").prop('disabled', true);
		$("#reportType-option-3 button").prop('disabled', false);

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


		// Calculation of no. of days between two date  
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

		// trigger if change date of invoice date range picker
		$('input[name="billingentity_reportrange"]').on('apply.daterangepicker', function(ev, picker) {
			var startDateInvoice 	= picker.startDate.format('MM/DD/YYYY');
			var endDateInvoice 		= picker.endDate.format('MM/DD/YYYY');
			
		 	$("#billing_entity_table").DataTable().destroy();
			var table = $('#billing_entity_table').DataTable({
				"pagingType": "full_numbers",
				"dom": '<"pull-left"f><"pull-right"l>tip',
				"lengthMenu": [20, 50, 75, 100 ],
    			"pageLength": 20,
    			"searching": false,
    			"bInfo": false,
    			"bLengthChange" : false,
    			'serverMethod': 'post',
    			"ajax":{
    				'url':'<?php echo base_url("Financial/get_records_billing_entitywise"); ?>',
					"dataSrc": "",
					'data': function(data){
						// Read values
						data.invoice_start_date = startDateInvoice;
						data.invoice_end_date = endDateInvoice;
						data.searchName = $("#srch-term").val();
					} 
    			},
		        "columns": [
		            { "data": "name" },
		            { "data": "total_billed_amt" },
		            { "data": "total_credited" },
		            { "data": "total_tds" },
		            { "data": "amt_receivable" },
		            { "data": "view" },
		        ] 
			});
			/*$.ajax({
				url			: '<?php echo base_url("billing_entitywise-report/1"); ?>',
				method		: 'POST',
				dataType	: "json",
				data		: { "invoice_start_date" : startDateInvoice, "invoice_end_date" : endDateInvoice },
				success 	: function(response){
					$("#billing_entity_table").DataTable().destroy();
					$("#billing_entity_table").DataTable({
						// "info": false,
						"pagingType": "full_numbers",
						"dom": '<"pull-left"f><"pull-right"l>tip',
						"lengthMenu": [20, 50, 75, 100 ],
	        			"pageLength": 20
					});

					$("#billing_entity_table").html(response.html);
					// drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
					// $(".loader").css("display","none");
				},
			});*/

		// 	/*var dataTable = $('#billing_entity_table').DataTable({
		// 		'processing': true,
		// 	    'serverSide': true,
		// 	    'serverMethod': 'post',
		// 	    //'searching': false, // Remove default Search Control
		// 	    'ajax': {
		// 			'url':'<?php //echo base_url("billing_entitywise-report/1"); ?>',
		// 			'data': function(data){
		// 				// Read values
		// 				var invoice_start_date = startDateInvoice;
		// 				var invoice_end_date = endDateInvoice;

		// 				// Append to data
		// 				// data.searchByGender = invoice_start_date;
		// 				// data.searchByName = name;
		// 			}
		// 		},
		// 		'columns': [
		// 			{ data: 'total_billed_amt' }, 
		// 			{ data: 'total_credited' },
		// 			{ data: 'total_tds' },
		// 			{ data: 'amt_receivable' },
		// 		]
		// 	});
		// 	dataTable.draw();*/
		});

		// trigger if change date of due date range picker
		$('input[name="billingentity_duereportrange"]').on('apply.daterangepicker', function(ev, picker) {
			var startDateDue 	= picker.startDate.format('MM/DD/YYYY');
			var endDateDue 		= picker.endDate.format('MM/DD/YYYY');
			$.ajax({
				url			: '<?php echo base_url("billing_entitywise-report"); ?>',
				method		: 'POST',
				dataType	: "json",
				data		: { "due_start_date" : startDateDue, "due_end_date" : endDateDue },
				success 	: function(response){
					// drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
					// $(".loader").css("display","none");
				},
			});
		});

		// trigger if change date of report date range picker
		$('input[name="billingentity_paymentreportrange"]').on('apply.daterangepicker', function(ev, picker) {
			var startDatePayment 	= picker.startDate.format('MM/DD/YYYY');
			var endDatePayment 		= picker.endDate.format('MM/DD/YYYY');
			$.ajax({
				url			: '<?php echo base_url("billing_entitywise-report"); ?>',
				method		: 'POST',
				dataType	: "json",
				data		: { "payment_start_date" : startDatePayment, "payment_end_date" : endDatePayment },
				success 	: function(response){
					// drawChart(response.data, response.xTitle, response.yTitle, reportStage, dateFormat);
					// $(".loader").css("display","none");
				},
			});
		});
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

    	var billingentity_reportrange 	= $("#billingentity_reportrange").val();
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
            data: { "kanbanPage" : kanbanPage, "billingentity_reportrange" : billingentity_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId, "dataPoint" : dataPoint, "kanbanStatus" : kanbanStatus   },
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

    	var billingentity_reportrange 	= $("#billingentity_reportrange").val();
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
            data: { "page" : page, "billingentity_reportrange" : billingentity_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId, "dataPoint" : dataPoint   },
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
