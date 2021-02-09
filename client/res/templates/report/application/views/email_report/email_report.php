<!-- End of main page -->
<div class="col-md-9 main-page">
	<?php if( !empty($result) ){ ?>
		<div class="loader">
		    <img src="<?php echo base_url('assets/images/loading.gif') ?>">
		</div>

		<div class="">
			<div class="row">

				<div class="col-md-3">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" id="reportrange" name="reportrange" >
					        <span class="input-group-addon">
					        	<i class="fa fa-calendar"></i>
				         	</span>
				        </div>
				    </div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<select class="form-control" id="reportType" name="reportType" >
							<option value="" disabled >Select Report Type</option>
							<option value="y" disabled >Yearly</option>
							<option value="m" disabled >Monthly</option>
							<option value="w" disabled >Weekly</option>
							<option value="d" >Daily</option>
							<option value="h" >Hourly</option>
							<!-- <option value="l30" disabled >Last 30 Days</option>
							<option value="l7" selected disabled >Last 7 Days</option> -->
						</select>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<select class="form-control" id="reportStatus" name="reportStatus" >
							<option value="3">All</option>
							<option value="0">Pending</option>
							<option value="1">Sent</option>
						</select>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<select class="form-control " id="userId" name="userId[]" multiple="" >
							<!-- <option value="">Select User</option> -->
			                <?php if( !empty($userList) ){ ?>   
			                	<?php foreach( $userList as $key => $value ){ ?>   
			                		<option value="<?php echo $value['u_id']; ?>"><?php echo $value['name']; ?></option>      
			                	<?php } ?>         
			                <?php } ?>  

			            </select>
		           	</div>
				</div>


				<div class="col-md-12">
					<hr>
				</div>

				<div class="col-md-12 graph-container">
					<div id="curve_chart" style="width: 100%; height: 500px;" ></div>
				</div>

			</div>
		</div>

	<?php }else{  ?>
		<div class="container">
			<p class="text-center">Invalid request!</p>
		</div>
	<?php }  ?>

</div>
<!-- End of main page -->


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


		// select to for user dropdown
		$("#userId").select2({
			allowClear :true,
			placeholder: 'Select User',
		});
		
		// call google graph function
		google.charts.load('current', {'packages':['corechart','line']});
		google.charts.setOnLoadCallback(drawChart);

		// draw google graph data
		function drawChart(ajaxData="", xTitle="", yTitle="") {
			
			if( ajaxData == "" ){
				var data = google.visualization.arrayToDataTable(
					<?php echo $result; ?>
				);

			}else{
				var data = google.visualization.arrayToDataTable(
					ajaxData,
				);
			}

			if( xTitle != "" && yTitle != "" ){
				var xTitle = xTitle;
				var yTitle = yTitle;
			}else{
				var xTitle = "<?php echo isset($xTitle) ? $xTitle : ''; ?>";
				var yTitle = "<?php echo isset($yTitle) ? $yTitle : ''; ?>";
			}

			var options = {
				
				title 		: 'Users',

				fontSize 	: 11,

				legend 		: {position:'top'},

				pointSize 	: 3,

				colors 		: ["blue","green","yellow","orange","red","grey","pink","gold","#00111a","#006699","#1ab2ff","#0080ff","#ccffff","#00e6e6","#006666","#669999","#79d2a6","#194d33","#00ff80","#33ff33","#808000","#999966","#cccc00","#ffcc99","#ff3399"],

				series 		: { 0:{color:'blue'}, 1:{color:'green'}, 2:{color:'yellow'}, 3:{color:'orange'}, 4:{color:'red'}, 5:{color:'grey'}, 6:{color:'pink'}, 7:{color:'gold'}, 8:{color:'#00111a'}, 9:{color:'#1ab2ff'}, 10:{color:'#0080ff'}, 11:{color:'#ccffff'}, 12:{color:'#00e6e6'}, 13:{color:'#006666'}, 14:{color:'#669999'}, 15:{color:'#79d2a6'}, 16:{color:'#194d33'}, 17:{color:'#00ff80'}, 18:{color:'#33ff33'}, 19:{color:'#808000'}, 20:{color:'#999966'}, },

				hAxis 		: {title: xTitle,  titleTextStyle: {color: 'black'}},

				vAxis 		: {title: yTitle,  titleTextStyle: {color: 'black'},maxValue: 1, format: '0'},

		        focusTarget: 'category',

		        tooltip: {  trigger: 'select' },

		        // aggregationTarget: 'series',
		        // aggregationTarget: 'category',
				// pieHole: 0.4,
				/*backgroundColor:"#e8ffff",
				series:{ 
					0:{
						areaOpacity: 0.2,
						lineWidth: 2,
		    			color: 'lightblue',
		        		type: 'area',
		        		visibleInLegend: true,
		        	}, 
		        },
		        animation:{
		            duration: 3000,
		            startup: true
		        },*/

			};

			//Classic chart
			var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
			chart.draw(data, options);
			google.visualization.events.addListener(chart, 'onmouseover', uselessHandler2);
         	google.visualization.events.addListener(chart, 'onmouseout', uselessHandler3);
			chart.draw(data, options);
		}

		function uselessHandler2() {
		 $('#curve_chart').css('cursor','pointer')
		  }  
		        function uselessHandler3() {
		 $('#curve_chart').css('cursor','default')
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
			
			console.log(" noOfDays - "+noOfDays);
			$("#"+elementId+" option").prop("disabled", true);

			if( noOfDays >= 0 && noOfDays <= 7 ){
				// console.log(" noOfDays >= 0 && noOfDays <= 7 ");
				$("#"+elementId+" option[value='h']").removeAttr("disabled");
				$("#"+elementId+" option[value='d']").removeAttr("disabled");
			}else if( noOfDays >= 8 && noOfDays <= 30 ){
				// console.log(" noOfDays >= 8 && noOfDays <= 30 ");
				$("#"+elementId+" option[value='h']").removeAttr("disabled");
				$("#"+elementId+" option[value='d']").removeAttr("disabled");
				$("#"+elementId+" option[value='w']").removeAttr("disabled");
			}else if( noOfDays >= 31 && noOfDays <= 365 ){
				// console.log(" noOfDays >= 31 && noOfDays <= 365 ");
				$("#"+elementId+" option[value='h']").removeAttr("disabled");
				$("#"+elementId+" option[value='d']").removeAttr("disabled");
				$("#"+elementId+" option[value='w']").removeAttr("disabled");
				$("#"+elementId+" option[value='m']").removeAttr("disabled");
			}else if( noOfDays > 365 ){
				// console.log(" noOfDays > 365 ");
				$("#"+elementId+" option[value='h']").removeAttr("disabled");
				$("#"+elementId+" option[value='d']").removeAttr("disabled");
				$("#"+elementId+" option[value='w']").removeAttr("disabled");
				$("#"+elementId+" option[value='m']").removeAttr("disabled");
				$("#"+elementId+" option[value='y']").removeAttr("disabled");
			}
		}

		// trigger if change date of range picker
		$('input[name="reportrange"]').on('apply.daterangepicker', function(ev, picker) {
			
			var startDate 	= picker.startDate.format('MM/DD/YYYY');
			var endDate 	= picker.endDate.format('MM/DD/YYYY');
			// console.log( startDate + ' <-> ' + endDate );

			var reportType 	= $("#reportType").val("");
			var noOfDays 	= dateDiffrenceInDays( startDate, endDate );
			// console.log(noOfDays);
			enabledDisabledOptions("reportType", noOfDays );
			

		});

		// trigger if change report type
		$("#reportType").change(function(){

			var reportType 		= $(this).val();
			var reportrange 	= $("#reportrange").val();
			var reportStatus 	= $("#reportStatus").val();
			var userId 			= $("#userId").val();

			if( reportrange != "" && reportType != "" ){

				$(".loader").css("display","block");
				$.ajax({
					url			: '<?php echo base_url("email-report"); ?>',
					method		: 'POST',
					dataType	: "json",
					data		: { "reportrange" : reportrange, "reportType" : reportType, "reportStatus" : reportStatus, "userId" : userId },
					success 	: function(response){
						// console.log(response);
						drawChart(response.data, response.xTitle, response.yTitle);
						$(".loader").css("display","none");
					},

				});
			}else{
				alert("Please select date range or report type.")
			}
			
		});

		// trigger if change users 
		$("#reportStatus").change(function(){

			var reportrange = $("#reportrange").val();
			var reportType 	= $("#reportType").val();
			var reportStatus= $(this).val();
			var userId 		= $("#userId").val();

			if( reportrange != "" && reportType != "" ){

				$(".loader").css("display","block");
				$.ajax({

					url			: '<?php echo base_url("email-report"); ?>',
					method		: 'POST',
					dataType	: "json",
					data		: { "reportrange" : reportrange, "reportType" : reportType, "reportStatus" : reportStatus, "userId" : userId },
					success 	: function(response){
						// console.log(response);
						drawChart(response.data, response.xTitle, response.yTitle);
						$(".loader").css("display","none");
					},

				});
				
			}

		});

		// trigger if change users 
		$("#userId").change(function(){

			var reportrange = $("#reportrange").val();
			var reportType 	= $("#reportType").val();
			var reportStatus= $("#reportStatus").val();
			var userId 		= $(this).val();

			if( reportrange != "" && reportType != "" ){

				$(".loader").css("display","block");
				$.ajax({

					url			: '<?php echo base_url("email-report"); ?>',
					method		: 'POST',
					dataType	: "json",
					data		: { "reportrange" : reportrange, "reportType" : reportType, "reportStatus" : reportStatus, "userId" : userId },
					success 	: function(response){
						// console.log(response);
						drawChart(response.data, response.xTitle, response.yTitle);
						$(".loader").css("display","none");
					},

				});
				
			}
		});

	

	});

<?php }  ?>

</script> 
