
<div class="NewLeads">
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<div class="">
					<h4>New Leads</h4>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="NewLeadsCount pull-right">
					<span>0</span>
				</div>
			</div>
		</div>
	</div>
</div>


<script >

    var tb = $("#dashboardLeadsCountListingTable").dataTable();

    // Get counts
    function getNewLeadsCounts() {

        var filterDate = $("#daterange").val();
        var filterUser = $(".users").val();
        var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/leadsAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getCounts", isRecords : "false", status : "New", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                if( response.status == "true" ){
                    // console.log(response.msg);
                    $(".NewLeadsCount span").html(response.data.count);
                }else{
                    // console.log(response.msg);
                }
            },
        });
    } 

    getNewLeadsCounts();


    // Get records
    function getNewLeadsRecords() {

        var filterDate = $("#daterange").val();
        var filterUser = $(".users").val();
        var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/leadsAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getRecords", isRecords : "true", status : "New", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate  },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                if( response.status == "true" ){
                    // console.log(response.msg);
                    tb.dataTable().fnClearTable();
                    tb.dataTable().fnDestroy();
                    $("#dashboardLeadsCountListing").modal("show");
                    $("#dashboardLeadsCountListing .modal-title").html("New Leads");
                    $("#dashboardLeadsCountListing .append_rows").html(response.data.html);
                    $("#dashboardLeadsCountListingTable").dataTable();
                }else{
                    // console.log(response.msg);
                }
            },
        });
    }

    $(document).on( "click", ".NewLeads", function() {
        getNewLeadsRecords();
    });

    $(document).on("change","#daterange",function(){
        getNewLeadsCounts();
    });

    $(document).on("change",".users",function(){
        $(".teams").val("");
        getNewLeadsCounts();
    });
    
    $(document).on("change",".teams",function(){
        $(".users").val("");
        getNewLeadsCounts();
    });

</script>