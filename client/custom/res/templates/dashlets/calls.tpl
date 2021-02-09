<div class="container">
	<div class="row">
		<div class="col-xs-6 plr0">
			<div class="text-center Today_Calls">
				<h3>Today's Calls</h3>
				<span class="today-call" >0</span>
			</div>
		</div>
		<div class="col-xs-6 plr0">
			<div class="text-center Today_Meetings" style="">
				<h3>Today's Meetings</h3>
				<span class="today-meetings" >0</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 plr0">
			<div class="text-center Today_Tasks">
				<h3>Today's Task</h3>
				<span class="today-task" >0</span>
			</div>
		</div>
		<div class="col-xs-6 plr0">
			<div class="text-center Today_Stream Today_Overdue_Task">
				<h3>Overdue Task</h3>
				<span class="today-overdue-task" >0</span>
			</div>
		</div>
	</div>
</div>


<script >
	
	 var tb = $("#todaysListingTable").dataTable();

	// ################ TODAYS COUNT ################ 

	// Get todays call count
	function getTodayCallCount() {

		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getTodayCallCount", parameters : "false" },
		 	// processData : false,
    		// contentType : false,
			success 	: function(response) {
				
				if( response.status == "true" ){
					$(".today-call").html(response.data.count);
				}else{
					//console.log(response.msg);
				}
			},
		});
	} 

	// Get todays meetings count
	function getTodayMeetingsCount() {

		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getTodayMeetingsCount", parameters : "false" },
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){
					$(".today-meetings").html(response.data.count);
				}else{
					// console.log(response.msg);
				}
			},
		});
	} 

	// Get todays task count
	function getTodayTaskCount() {

		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getTodayTaskCount", parameters : "false" },
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){
					$(".today-task").html(response.data.count);
				}else{
					// console.log(response.msg);
				}
			},
		});
	} 

	// Get todays overdue task count
	function getTodayOverdueTaskCount() {

		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getTodayOverdueTaskCount", parameters : "false" },
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){
					$(".today-overdue-task").html(response.data.count);
				}else{
					// console.log(response.msg);
				}
			},
		});
	} 


	getTodayCallCount();
	getTodayMeetingsCount();
	getTodayTaskCount();
	getTodayOverdueTaskCount();

	// ################ TODAYS COUNT ################ 
	
	// ################ TODAYS RECORDS ################ 

	// Get todays overdue task records
	function getTodayCallRecords() {

		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getTodayCallRecords", parameters : "true" },
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){

					// console.log(response.msg);
                    tb.dataTable().fnClearTable();
                    tb.dataTable().fnDestroy();
					$("#todaysListing").modal("show");
					$("#todaysListing .modal-title").html("Today's Call Listing");
					$("#todaysListing .append_rows").html(response.data.html);
                    $("#todaysListingTable").dataTable();

				}else{
					// console.log(response.msg);
				}
			},
		});
	} 

	// Get todays meetings records
	function getTodayMeetingsRecords(){

		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getTodayMeetingsRecords", parameters : "true" },
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){

					// console.log(response.msg);
                    tb.dataTable().fnClearTable();
                    tb.dataTable().fnDestroy();
					$("#todaysListing").modal("show");
					$("#todaysListing .modal-title").html("Today's Meetings Listing");
					$("#todaysListing .append_rows").html(response.data.html);
                    $("#todaysListingTable").dataTable();

				}else{
					// console.log(response.msg);
				}
			},
		});
	} 

	// Get todays task records
	function getTodayTaskRecords() {

		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getTodayTaskRecords", parameters : "true" },
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){

					// console.log(response.msg);
                    tb.dataTable().fnClearTable();
                    tb.dataTable().fnDestroy();
					$("#todaysListing").modal("show");
					$("#todaysListing .modal-title").html("Today's Task Listing");
					$("#todaysListing .append_rows").html(response.data.html);
                    $("#todaysListingTable").dataTable();

				}else{
					// console.log(response.msg);
				}
			},
		});
	} 

	// Get todays overdue task records
	function getTodayOverdueTaskRecords() {

		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getTodayOverdueTaskRecords", parameters : "true" },
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){

					// console.log(response.msg);
                    tb.dataTable().fnClearTable();
                    tb.dataTable().fnDestroy();
					$("#todaysListing").modal("show");
					$("#todaysListing .modal-title").html("Today's Overdue Task Listing");
					$("#todaysListing .append_rows").html(response.data.html);
					$("#todaysListingTable").dataTable();

				}else{
					// console.log(response.msg);
				}
			},
		});
	} 

	$(document).on( "click", ".Today_Calls", function() {
		getTodayCallRecords();
	});

	$(document).on( "click", ".Today_Meetings", function() {
		getTodayMeetingsRecords();
	});
	
	$(document).on( "click", ".Today_Tasks", function() {
		getTodayTaskRecords();
	});
	
	$(document).on( "click", ".Today_Overdue_Task", function() {
		getTodayOverdueTaskRecords();
	});

	// ################ TODAYS RECORDS ################ 


	
	
</script>