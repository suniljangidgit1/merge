<div class="list-container">
    <div class="list list-expanded">
        <ul class="list-group SubscriptionDetails SubscriptionDetailsAppend">
            <li data-id="" class="container list-group-item list-row">
                <div class="row">
                    <div class="col-xs-12 pl0">
                        <div class="pull-right right cell" data-name="buttons">
                            <div class="list-row-buttons btn-group pull-right">
                                <!-- <button type="button" class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="" class="action" data-action="quickView" data-id="">View</a></li>
                                    <li><a href="" class="action" data-action="quickEdit" data-id="">Edit</a></li>
                                    <li><a href="javascript:" class="action" data-action="setCompleted" data-id="">Complete</a></li>
                                    <li><a href="javascript:" class="action" data-action="quickRemove" data-id="" data-scope="Task">Remove</a></li>
                                </ul> -->
                            </div>
                        </div>
                        <div class="expanded-row expanded-header">
                            <span class="cell task_data col-xs-10" data-name="name">
                                <a href="javascript:void(0);" class="link planNameAppend" data-id="" title="---">---</a>
                            </span>
                        </div>
                        <div class="expanded-row expanded-expiry">
                            <span class="cell task_data col-xs-10">
                                <span class="fs12 expiryDateAppend">Expiry on: ---</span>
                            </span>
                        </div>
                    </div>
                </div>
            </li>
            <li data-id="" class="container list-group-item list-row">
                <div class="row">
                    <div class="col-xs-12 pl0">
                        <div class="expanded-row expanded-header">
                            <span class="cell task_data col-xs-10"><a href="javascript:void(0);" class="link" data-id="" title="Subscription Plan Details">Subscription Plan Details:</a>
                            </span>
                        </div>
                        <div class="expanded-row expanded-assign">
                            <span class="cell task_data col-xs-6">
                                <span class="text-default circles userAppend ">0 Users</span>
                            </span>
                            <span class="cell task_data col-xs-5 pull-right mr5 circles storageAppend ">
                                0 GB Storage
                            </span>
                        </div>
                        <div class="expanded-row expanded-assign">
                            <span class="cell task_data col-xs-6">
                                <span class="text-default circles smsAppend ">0 SMS/month</span>
                            </span>
                            <span class="cell task_data col-xs-5 pull-right mr5 circles">
                                All CRM Features
                            </span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>


<script >
    
    // GET USER DATA
    function getDomainSubscriptionData() {
        
        var filterDate = $("#daterange").val();
        var filterUser = $(".users").val();
        var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/userTabAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getDomainSubscriptionData", isRecords : "false", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                $(".SubscriptionDetailsAppend .planNameAppend ").attr("title","---");
                $(".SubscriptionDetailsAppend .planNameAppend ").html("");
                $(".SubscriptionDetailsAppend .expiryDateAppend ").html("Expiry on: ---");
                $(".SubscriptionDetailsAppend .userAppend ").html("0 Users");
                $(".SubscriptionDetailsAppend .smsAppend ").html("0 GB Storage");
                $(".SubscriptionDetailsAppend .storageAppend ").html("0 SMS/month");

                if( response.status == "true" ){
                    
                    $(".SubscriptionDetailsAppend .planNameAppend ").attr("title", response.data.pName );
                    $(".SubscriptionDetailsAppend .planNameAppend ").html(response.data.pName);
                    $(".SubscriptionDetailsAppend .expiryDateAppend ").html("Expiry on: "+response.data.endDate);
                    $(".SubscriptionDetailsAppend .userAppend ").html(response.data.pUserLimit+" Users");
                    $(".SubscriptionDetailsAppend .storageAppend ").html(response.data.pStorageLimit+" GB Storage");
                    $(".SubscriptionDetailsAppend .smsAppend ").html(response.data.pSmsLimit+" SMS/month");

                }else{
                    
                }
            },
        });
    }   

    getDomainSubscriptionData();

</script>