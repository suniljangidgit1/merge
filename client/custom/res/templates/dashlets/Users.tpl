<style type="text/css">

</style>

<div class="container">
	<div class="row">
		<div class="col-xs-4 pl0">
			<div class="Users New_users">
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="">
							<h4>Users</h4>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="UsersCount pull-right">
							<div class="UsersProgressBar">
                				<div class="progress" data-percentage="0">
			          				<span class="progress-left">
			          					<span class="progress-bar"></span>
			          				</span>
			          				<span class="progress-right">
			          					<span class="progress-bar"></span>
			          				</span>
			          				<div class="progress-value">
			          					<div class="userTabUsersCount">
			          						0<span>/0</span>
			          					</div>
			          				</div>
          						</div>
              				</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-4 SMS_User_tiles">
			<div class="Users Won_users">
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="">
							<h4>SMS</h4>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="UsersCount pull-right">
					     	<div class="SMSProgressBar">
								<div class="progress" data-percentage="0">
									<span class="progress-left">
										<span class="progress-bar"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar"></span>
									</span>
									<div class="progress-value">
										<div class="userTabSmsCount">
											0<span>/0</span>
										</div>
	                  				</div>
	                			</div>
              				</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-4 pr0">
			<div class="Users Lost_users">
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="">
							<h4>Storage</h4>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="UsersCount pull-right">
							<div class="StorageProgressBar">
                				<div class="progress" data-percentage="8">
                  					<span class="progress-left">
                    					<span class="progress-bar"></span>
                  					</span>
                  					<span class="progress-right">
                    					<span class="progress-bar"></span>
                  					</span>
                  					<div class="progress-value">
                    					<div class="userTabStorageCount">
                    						0 <span>/0</span>
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
</div>


<script >
    
    // GET USER DATA
    function getDomainUserData() {
    	
		var filterDate = $("#daterange").val();
		var filterUser = $(".users").val();
		var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/userTabAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getDomainUserData", isRecords : "false", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                // console.log(response);
                $(".UsersProgressBar .progress").attr("data-percentage","0");
            	$(".userTabUsersCount").html("0<span>/0</span>");
                if( response.status == "true" ){
                	var appenVar = response.data.userCountData+"<span>/"+response.data.usersLimitData+"</span>";
                	$(".UsersProgressBar .progress").attr("data-percentage",response.data.userDataPercentage);
                    $(".userTabUsersCount").html(appenVar);
                }else{
                    // console.log(response.msg); // error
                }
            },
        });
    }   

    // GET SMS DATA
    function getDomainSmsData() {
    	
		var filterDate = $("#daterange").val();
		var filterUser = $(".users").val();
		var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/userTabAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getDomainSmsData", isRecords : "false", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                // console.log(response);
                $(".SMSProgressBar .progress").attr("data-percentage","0");
            	$(".userTabSmsCount").html("0<span>/0</span>");
                if( response.status == "true" ){
                	var appenVar = response.data.smsCountData+"<span>/"+response.data.smsLimitData+"</span>";
                	$(".SMSProgressBar .progress").attr("data-percentage",response.data.userDataPercentage);
                    $(".userTabSmsCount").html(appenVar);
                }else{
                    // console.log(response.msg); // error
                }
            },
        });
    }   

    // GET STORAGE DATA
    function getDomainStorageData() {
    	
		var filterDate = $("#daterange").val();
		var filterUser = $(".users").val();
		var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/userTabAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getDomainStorageData", isRecords : "false", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                // console.log(response);
                $(".StorageProgressBar .progress").attr("data-percentage","0");
            	$(".userTabStorageCount").html("0 <span>/0</span>");
                if( response.status == "true" ){
                	var appenVar = response.data.storageCountData+" <span>/"+response.data.storageLimitData+"</span>";
                	$(".StorageProgressBar .progress").attr("data-percentage",response.data.userDataPercentage);
                    $(".userTabStorageCount").html(appenVar);
                }else{
                    // console.log(response.msg); // error
                }
            },
        });
    }

    getDomainUserData();
    getDomainSmsData();
    getDomainStorageData();

</script>