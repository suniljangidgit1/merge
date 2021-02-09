<div class="list-container">
    <div class="list list-expanded">
        <ul class="list-group MyUserEntities MyUserEntitiesAppend">
            
            <!-- <li data-id="" class="container list-group-item list-row">
                <div class="row">
                    <div class="col-xs-12 pl0">
                        <div class="pull-right right cell" data-name="buttons">
                            <div class="list-row-buttons btn-group pull-right">
                                <button type="button" class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="" class="action" data-action="quickView" data-id="">View</a></li>
                                    <li><a href="" class="action" data-action="quickEdit" data-id="">Edit</a></li>
                                    <li><a href="javascript:" class="action" data-action="setCompleted" data-id="">Complete</a></li>
                                    <li><a href="javascript:" class="action" data-action="quickRemove" data-id="" data-scope="Task">Remove</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="expanded-row expanded-assign">
                            <span class="cell task_data col-xs-5" data-name="name"><a href="" class="link" data-id="" title="Account" style="color:#283278;font-weight:600;">Account</a>
                            </span>
                            <span class="cell task_data col-xs-5" data-name="status" style="padding-left: 15px;"><span class="text-default circles"><span>05</span> Records</span>
                            </span>
                            </span>
                        </div>
                    </div>
                </div>
            </li> -->
            <div class="list-container MyUserEntitiesNoData">No Data</div>
            
        </ul>
    </div>
</div>


<script >
    
    // GET USER DATA
    function getDomainEntitiesData() {
        
        var filterDate = $("#daterange").val();
        var filterUser = $(".users").val();
        var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/userTabAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getDomainEntitiesData", isRecords : "false", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                $(".MyUserEntitiesAppend").html("");
                if( response.status == "true" ){
                    $(".MyUserEntitiesAppend").html(response.data);
                }else{
                    $(".MyUserEntitiesAppend").html('<div class="list-container MyUserEntitiesNoData pd15">No Data</div>');
                }
            },
        });
    }   

    getDomainEntitiesData();

</script>