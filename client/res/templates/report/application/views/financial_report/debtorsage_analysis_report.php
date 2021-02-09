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
		                              	<div class="ageanalysis_report">
		                                 	<h4><!-- <i class="material-icons-outlined">monetization_on</i> --><?php echo isset($page_title) ? $page_title : "Report"; ?></h4>
		                              	</div>
		                           	</div>
		                        </div>
	                     	</div>
	                     	<div class="searchBarDiv">
	                     		<div class="row">
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
		                                    	<input type="text" class="form-control" id="ageanalysis_reportrange" name="ageanalysis_reportrange" >
		                                    	<label for="ageanalysis_reportrange" class="input-group-addon">
		                                    		<i class="material-icons-outlined date_range_icon">date_range</i>
		                                    	</label>
		                                 	</div>
		                              	</div>
		                           	</div>
	                     			<!-- <div class="col-md-3 col-xs-7">
		                              	<div class="form-group date_daily_add">
		                                    <label>Due date</label>
		                                 	<div class="input-group">
		                                    	<input type="text" class="form-control" id="ageanalysis_duereportrange" name="ageanalysis_duereportrange" />
		                                    	<label for="ageanalysis_duereportrange" class="input-group-addon">
		                                    		<i class="fa fa-calendar"></i>
		                                    	</label>
		                                 	</div>
		                              	</div>
		                           	</div>
	                     			<div class="col-md-3 col-xs-7">
		                              	<div class="form-group date_daily_add">
		                                    <label>Payment date</label>
		                                 	<div class="input-group">
		                                    	<input type="text" class="form-control" id="ageanalysis_paymentreportrange" name="ageanalysis_paymentreportrange" />
		                                    	<label for="ageanalysis_paymentreportrange" class="input-group-addon">
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
            
            <div class="box-body list" id="age_analysis_table_main" style="padding: 15px 0px;">
               <div class="table-responsive">
               		<span id="ageAnalysisTable">
	               		<table id="age_analysis_table" class="table" style="width:100%">
		               		<thead class="schedularth">
		               			<!-- <tr> -->
		               				<!-- <th style="background: #EFF3F6 !important">&nbsp;</th>
		               				<th style="background: #EFF3F6 !important">&nbsp;</th>
		               				<th colspan="2" style="background: #EFF3F6 !important"><center><strong>Number Of Days Overdue</strong></center></th>
		               				<th style="background: #EFF3F6 !important">&nbsp;</th>
		               				<th colspan="2" style="background: #EFF3F6 !important">&nbsp;</th> -->
		               			<!-- </tr> -->

		               			<h1 class="no_of_days_overdue">NUMBER OF DAYS OVERDUE</h1>

		               			<tr>
		               				<th></th>
		               				<th style="text-align:right;"><span>Not Yet Overdue</span></th>
		               				<th style="text-align:right;"><span>30 or less</span></th>
		               				<th style="text-align:right;"><span>31 to 60</span></th>
		               				<th style="text-align:right;"><span>61 to 90</span></th>
		               				<th style="text-align:right;"><span>91 or more</span></th>
		               				<th style="text-align:right;"><span>Unpaid</span></th>
		               			</tr>
		               		</thead>
		               		<tbody><?php
		               			if(!empty($invoiceArr)){ 
		               				// echo '<pre>';print_r($invoiceArr);die;
		               				$total_not_overdue_balance = 0;
		               				$total_not_overdue_invoices = 0;
		               				$thirtyorless_balance = 0;
		               				$thirtyorless_invoices = 0;
		               				$thirtyonetosixty_balance = 0;
		               				$thirtyonetosixty_invoices = 0;
		               				$sixtyonetoninety_balance = 0;
		               				$sixtyonetoninety_invoices = 0;
		               				$ninetyoneormore_balance = 0;
		               				$ninetyoneormore_invoices = 0;
		               				$totalunpaid = 0;
		               				foreach($invoiceArr as $invoices)
		               				{
		               					// $overdue_details = get_invoice_details_frombillingentity($invoices['account_id']);
										?>
			               				<tr>
			               					<td><?php echo $invoices['name'];?></td>
			               					<td style="text-align:right;"><?php
			               						if($invoices['notoverdue_balance']!=0){
			               							echo "₹ ".number_format($invoices['notoverdue_balance'],2);
			               							echo "<br/><span style='font-size:10px;color:gray;'>".$invoices['notoverdue_invoice_count']." invoices</span>";

			               							$total_not_overdue_balance += $invoices['notoverdue_balance'];
			               							$total_not_overdue_invoices += $invoices['notoverdue_invoice_count'];
			               						}
			               					?></td>
			               					<td style="background-color:aliceblue;text-align:right;"><?php
			               						if($invoices['thirtyorless_invoice_count']!=0){
			               							echo "₹ ".number_format($invoices['thirtyorless_balance'],2);
			               							echo "<br/><span style='font-size:10px;color:gray;'>".$invoices['thirtyorless_invoice_count']." invoices</span>";

			               							$thirtyorless_balance += $invoices['thirtyorless_balance'];
			               							$thirtyorless_invoices += $invoices['thirtyorless_invoice_count'];
		               							}
			               					?></td>
			               					<td style="background-color:aliceblue;text-align:right;"><?php
			               						if($invoices['thirtyonetosixty_invoice_count']!=0){
				               						echo "₹ ".number_format($invoices['thirtyonetosixty_balance'],2);
				               						echo "<br/><span style='font-size:10px;color:gray;'>".$invoices['thirtyonetosixty_invoice_count']." invoices</span>";

				               						$thirtyonetosixty_balance += $invoices['thirtyonetosixty_balance'];
				               						$thirtyonetosixty_invoices += $invoices['thirtyonetosixty_invoice_count'];
			               						}
			               					?></td>
			               					<td style="background-color:aliceblue;text-align:right;"><?php
			               						if($invoices['sixtyonetoninety_invoice_count']!=0){
				               						echo "₹ ".number_format($invoices['sixtyonetoninety_balance'],2);
				               						echo "<br/><span style='font-size:10px;color:gray;'>".$invoices['sixtyonetoninety_invoice_count']." invoices</span>";

				               						$sixtyonetoninety_balance += $invoices['sixtyonetoninety_balance'];
				               						$sixtyonetoninety_invoices += $invoices['sixtyonetoninety_invoice_count'];
			               						}
			               					?></td>
			               					<td style="background-color:aliceblue;text-align:right;"><?php
			               						if($invoices['ninetyoneormore_invoice_count']!=0){
				               						echo "₹ ".number_format($invoices['ninetyoneormore_balance'],2);
				               						echo "<br/><span style='font-size:10px;color:gray;'>".$invoices['ninetyoneormore_invoice_count']." invoices</span>";

				               						$ninetyoneormore_balance += $invoices['ninetyoneormore_balance'];
				               						$ninetyoneormore_invoices += $invoices['ninetyoneormore_invoice_count'];
			               						}
			               					?></td>
			               					<td style="text-align:right;"><?php
			               						if($invoices['totalunpaid']!=0){
			               							echo "₹ ".number_format($invoices['totalunpaid'],2);

			               							$totalunpaid += $invoices['totalunpaid'];
			               						}
			               					?></td>
			               				</tr><?php
		               				} ?>
		               				<tr>
		               					<td style="text-align:right;"><b>Total Unpaid</b></td>
		               					<td style="text-align:right;"><b><?php
		               						//if($total_not_overdue_invoices){
		               							echo "₹ ".number_format($total_not_overdue_balance,2); echo "<br/><span style='font-size:10px;color:gray;'>".$total_not_overdue_invoices." invoices</span>";
		               							//} ?></b></td>
		               					<td style="text-align:right;"><b><?php echo "₹ ".number_format($thirtyorless_balance,2); echo "<br/><span style='font-size:10px;color:gray;'>".$thirtyorless_invoices." invoices</span>";?></b></td>
		               					<td style="text-align:right;"><b><?php echo "₹ ".number_format($thirtyonetosixty_balance,2); echo "<br/><span style='font-size:10px;color:gray;'>".$thirtyonetosixty_invoices." invoices</span>";?></b></td>
		               					<td style="text-align:right;"><b><?php echo "₹ ".number_format($sixtyonetoninety_balance,2); echo "<br/><span style='font-size:10px;color:gray;'>".$sixtyonetoninety_invoices." invoices</span>";?></b></td>
		               					<td style="text-align:right;"><b><?php echo "₹ ".number_format($ninetyoneormore_balance,2); echo "<br/><span style='font-size:10px;color:gray;'>".$ninetyoneormore_invoices." invoices</span>";?></b></td>
		               					<td style="text-align:right;"><b><?php echo "₹ ".number_format($totalunpaid,2);?></b></td>
		               				</tr>
		               				<?php
		               			}
		               			else { ?>
		               				<tr>
		               					<td colspan="7">No Data</td>
		               				</tr><?php
		               			} ?>
		               		</tbody>
	               		</table>
               		</span>
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
   
</div>
<!-- /.content-wrapper -->

<!-- Popup to show the list of all invoices of billing entity -->
<div class="modal fade" id="addBillingEnitityInvoiceModal" role="dialog">
    <div class="modal-dialog" style="width:800px;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Invoice List</h4>
            </div>
            <div class="modal-body">
            	
            </div>
        </div>
    </div>
</div>
<!-- Popup to show the list of all invoices of billing entity -->

<!-- START SCRIPT SECTION -->
<script>
/*$(document).ready(function() {
	$('#age_analysis_table').DataTable({
     	// "info": false,
		"pagingType": "full_numbers",
		"dom": '<"pull-left"f><"pull-right"l>tip',
		"lengthMenu": [20, 50, 75, 100 ],
		"pageLength": 20
	});
});*/
$(document).ready(function() {
	var start 	= moment().subtract(6, 'days');
	var end 	= moment();

	var startDateInvoice 	= start.format('MM/DD/YYYY');
	var endDateInvoice 		= end.format('MM/DD/YYYY');
		
	var dataTable1 = $('#age_analysis_table').DataTable({
     	// "info": false,
		"pagingType": "full_numbers",
		"dom": '<"pull-left"f><"pull-right"l>tip',
		"lengthMenu": [20, 50, 75, 100 ],
		"pageLength": 20,
		"searching": true,
		"bInfo": false,
		"bLengthChange" : false,
	});

	$(document).on("keyup", "#srch-term", function(){
		dataTable1.search($("#srch-term").val()).draw();
	});

	$(document).on("click", ".btn-icon-refresh", function(){
		$("#srch-term").val("");
		$("#ageanalysis_reportrange").daterangepicker({
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
		dataTable1.search("").draw();
	});
});
</script>

<script >

	$(".view_details").click( function(e){
		e.preventDefault();
		var dataId = $(this).data("id");
		$.ajax({
	        type: "GET",
	        url: "<?php echo base_url();?>financial/getbilling_entity_invoices/"+dataId,
	        success: function (data){
	            $("#addBillingEnitityInvoiceModal .modal-body").html(data);
				$("#addBillingEnitityInvoiceModal").modal("show");
	        }
	    });
	});


var start 	= moment().subtract(6, 'days');
var end 	= moment();

$('#ageanalysis_reportrange').daterangepicker({
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



<?php if( !empty($invoiceArr) ) { ?>
	$(document).ready(function(){

		var start 	= moment().subtract(6, 'days');
		var end 	= moment();

		$('#ageanalysis_reportrange').daterangepicker({
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

		$('#ageanalysis_duereportrange').daterangepicker({
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

		$('#ageanalysis_paymentreportrange').daterangepicker({
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
		$('input[name="ageanalysis_reportrange"]').on('apply.daterangepicker', function(ev, picker) {
			
			var startDateInvoice= picker.startDate.format('MM/DD/YYYY');
			var endDateInvoice 	= picker.endDate.format('MM/DD/YYYY');
			// url			: '<?php echo base_url("aginganalysis-report/1"); ?>',
			$.ajax({
				url			: '<?php echo base_url("Financial/get_debtors_agingrecords"); ?>',
				method		: 'POST',
				dataType	: "json",
				data		: { "invoice_start_date" : startDateInvoice, "invoice_end_date" : endDateInvoice, 'searchName' : $("#srch-term").val() },
				success 	: function(response){
					// var table_1 = $("#age_analysis_table").DataTable().destroy();
					$("#age_analysis_table").remove();
					$("#ageAnalysisTable").html(response.html);
					var dataTable1 = $("#age_analysis_table").DataTable({
				     	// "info": false,
						"pagingType": "full_numbers",
						"dom": '<"pull-left"f><"pull-right"l>tip',
						"lengthMenu": [20, 50, 75, 100 ],
						"pageLength": 20,
						"searching": true,
						"bInfo": false,
						"bLengthChange" : false
					});
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

    	var ageanalysis_reportrange 	= $("#ageanalysis_reportrange").val();
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
            data: { "kanbanPage" : kanbanPage, "ageanalysis_reportrange" : ageanalysis_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId, "dataPoint" : dataPoint, "kanbanStatus" : kanbanStatus   },
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

    	var ageanalysis_reportrange 	= $("#ageanalysis_reportrange").val();
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
            data: { "page" : page, "ageanalysis_reportrange" : ageanalysis_reportrange, "reportType" : reportType, "reportStage" : reportStage, "teamId" : teamId, "userId" : userId, "dataPoint" : dataPoint   },
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
