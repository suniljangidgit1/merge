<div class="container">
	<div class="row">
		<div class="col-xs-4 pl0">
			<div class="NewOpportunites New_Opportunites">
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="">
							<h4>New Opportunites</h4>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="NewOpportunitesCount pull-right">
							<span class="new-opportunities">0</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="NewOpportunites Won_Opportunites">
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="">
							<h4>Won Opportunites</h4>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="NewOpportunitesCount pull-right">
							<span class="won-opportunities">0</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-4 pr0">
			<div class="NewOpportunites Lost_Opportunites">
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="">
							<h4>Lost Opportunites</h4>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="NewOpportunitesCount pull-right">
							<span class="lost-opportunities">0</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script >

	// ################ TODAYS COUNT ################ 
    var oppTb = $("#opportunitiesListingTable").dataTable();
	// Get New opportunities count
	function getNewOpportunitiesCounts() {
		var filterUser = $(".users").val();
	    var filterTeam = $(".teams").val();
	    var filterDate = $("#daterange").val();
		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/opportunitiesAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getOpportunities", parameters : "false", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate , stage : 'Unqualified'},
		 	// processData : false,
    		// contentType : false,
			success 	: function(response) {
				
				if( response.status == "true" ){
					
					$(".new-opportunities").html(response.data.count);
				}else{
					//console.log(response.msg);
				}
			},
		});
	} 

	// Get Won opportunities count
	function getWonOpportunitiesCounts() {
		var filterUser = $(".users").val();
	    var filterTeam = $(".teams").val();
	    var filterDate = $("#daterange").val();
		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/opportunitiesAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getOpportunities", parameters : "false", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate , stage : 'Closed Won'},
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){
					$(".won-opportunities").html(response.data.count);
				}else{
					// console.log(response.msg);
				}
			},
		});
	} 

	// Get Lost opportunities count
	function getLostOpportunitiesCounts() {
		var filterUser = $(".users").val();
	    var filterTeam = $(".teams").val();
	    var filterDate = $("#daterange").val();
		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/opportunitiesAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getOpportunities", parameters : "false" , filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate , stage : 'Closed Lost'},
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){
					$(".lost-opportunities").html(response.data.count);
				}else{
					// console.log(response.msg);
				}
			},
		});
	} 

	

	getNewOpportunitiesCounts();
	getWonOpportunitiesCounts();
	getLostOpportunitiesCounts();

	// ################ OPPORTUNITIES COUNT ################ 
	
	// ################ OPPORTUNITIES RECORDS ################ 

	// Get NEW opportunities records
	function getNewOpportunitiesRecords() {
		var filterUser = $(".users").val();
	    var filterTeam = $(".teams").val();
	    var filterDate = $("#daterange").val();
		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/opportunitiesAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getOpportunities", parameters : "true", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate , stage : 'Unqualified'},
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){
					oppTb.dataTable().fnClearTable();
                    oppTb.dataTable().fnDestroy();
					$("#opportunitiesListing").modal("show");
					$("#opportunitiesListing .modal-title").html("New opportunities Listing");
					$("#opportunitiesListing .append_rows").html(response.data.html);
					$("#opportunitiesListingTable").dataTable();
				}else{
					// console.log(response.msg);
				}
			},
		});
	} 

	// Get Won opportunities records
	function getWonOpportunitiesRecords(){
		var filterUser = $(".users").val();
	    var filterTeam = $(".teams").val();
	    var filterDate = $("#daterange").val();
		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/opportunitiesAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getOpportunities", parameters : "true", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate , stage : 'Closed Won' },
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){
					oppTb.dataTable().fnClearTable();
                    oppTb.dataTable().fnDestroy();
					$("#opportunitiesListing").modal("show");
					$("#opportunitiesListing .modal-title").html("Won Opportunities Listing");
					$("#opportunitiesListing .append_rows").html(response.data.html);
                    $("#opportunitiesListingTable").dataTable();
				}else{
					// console.log(response.msg);
				}
			},
		});
	} 

	// Get Lost opportunities records
	function getLostOpportunitiesRecords() {
		var filterUser = $(".users").val();
	    var filterTeam = $(".teams").val();
	    var filterDate = $("#daterange").val();
		$.ajax({
			url			: "../../../../../client/res/templates/custom_dashboard/opportunitiesAjaxController.php",
			type		: "GET",
			dataType	: "JSON",
			data		: { methodName : "getOpportunities", parameters : "true" , filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate , stage : 'Closed Lost'},
		 	/*processData : false,
      		contentType : false,*/
			success 	: function(response) {

				if( response.status == "true" ){
					oppTb.dataTable().fnClearTable();
                    oppTb.dataTable().fnDestroy();
					$("#opportunitiesListing").modal("show");
					$("#opportunitiesListing .modal-title").html("Lost Opportunities Listing");
					$("#opportunitiesListing .append_rows").html(response.data.html);
					 $("#opportunitiesListingTable").dataTable();
				}else{
					// console.log(response.msg);
				}
			},
		});
	} 

	

	$(document).on( "click", ".New_Opportunites", function() {
		getNewOpportunitiesRecords();
	});

	$(document).on( "click", ".Won_Opportunites", function() {
		getWonOpportunitiesRecords();
	});
	
	$(document).on( "click", ".Lost_Opportunites", function() {
		getLostOpportunitiesRecords();
	});
	
  	$(document).on("change",".users", function(){
	  $(".teams").val("");
	  getNewOpportunitiesCounts();
	  getWonOpportunitiesCounts();
	  getLostOpportunitiesCounts();
	  
	});

	$(document).on("change","#daterange", function(){
	  getNewOpportunitiesCounts();
	  getWonOpportunitiesCounts();
	  getLostOpportunitiesCounts();
	});

	$(document).on("change",".teams", function(){
	  $(".users").val("");
	  getNewOpportunitiesCounts();
	  getWonOpportunitiesCounts();
	  getLostOpportunitiesCounts();
	});
	// ################ TODAYS RECORDS ################ 


	
	
</script>