
<div class="ConvertedLeads">
	<div class="container">
		<div class="row">
			<div class="col-xs-8">
				<div class="">
					<h4>Converted Leads</h4>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="ConvertedLeadsCount pull-right">
					<span>0</span>
				</div>
			</div>
		</div>
	</div>
</div>



<script >
    
    var tb = $("#dashboardLeadsCountListingTable").dataTable();
    
    // Get counts
    function getConvertedLeadsCounts() {
    	
		var filterDate = $("#daterange").val();
		var filterUser = $(".users").val();
		var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/leadsAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getCounts", isRecords : "false", status : "Converted", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                if( response.status == "true" ){
                    // console.log(response.msg);
                    $(".ConvertedLeadsCount span").html(response.data.count);
                }else{
                    // console.log(response.msg);
                }
            },
        });
    }

    getConvertedLeadsCounts();


    // Get records
    function getConvertedLeadsRecords() {

		var filterDate = $("#daterange").val();
		var filterUser = $(".users").val();
		var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/leadsAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getRecords", isRecords : "true", status : "Converted", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                if( response.status == "true" ){
                    // console.log(response.msg);
                    tb.dataTable().fnClearTable();
                    tb.dataTable().fnDestroy();
					$("#dashboardLeadsCountListing").modal("show");
					$("#dashboardLeadsCountListing .modal-title").html("Converted Leads");
                    $("#dashboardLeadsCountListing .append_rows").html(response.data.html);
                    $("#dashboardLeadsCountListingTable").dataTable();
                }else{
                    // console.log(response.msg);
                }
            },
        });
    }

    $(document).on( "click", ".ConvertedLeads", function() {
		getConvertedLeadsRecords();
	});

	$(document).on("change","#daterange",function(){
		getConvertedLeadsCounts();
	});

	$(document).on("change",".users",function(){
		$(".teams").val("");
		getConvertedLeadsCounts();
	});
	
	$(document).on("change",".teams",function(){
		$(".users").val("");
		getConvertedLeadsCounts();
	});

</script>