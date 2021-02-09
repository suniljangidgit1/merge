
<script type="text/javascript">
    var Today   = new Date();
    var endDate = new Date();
    // Today.setDate(Today.getDate() -1);
    
    $('#daterange').daterangepicker({
        startDate: Today, // after open picker you'll see this dates as picked
        endDate: endDate,
        locale: {
           // format: 'MM/DD/YYYY',
           format: 'DD/MM/YYYY',
        }
    });  
                var currentDomain = window.location.hostname;
                
                $.ajax({
                type    : "GET",
                url     : "../../../../client/src/views/domain_status/check_domain_status.php",
                dataType  : "json",
                data    : {currentDomain:currentDomain},
                async: false,
                success: function(data)
                {   
                    domain_status = data.domain_status;
                    if(domain_status == 'Blocked'){
                        $('a[data-action="logout"]').trigger('click');
                        
                    }
                },
                });

                $.ajax({
                type    : "GET",
                url     : "../../../../client/src/views/software_update/check_software_update.php",
                dataType  : "json",
                data    : {currentDomain:currentDomain},
                // async: false,
                success: function(data)
                { 
                   software_update = data.software_update;
                   version         = data.s_version;
                   description     = data.s_description;
                        if(software_update == 1){

                            $.alert({
                            title: 'Alert!',
                            content: 'A new update is available. Please click on the button below.',
                            type: 'dark',
                            typeAnimated: true,
                            closeIcon: true,
                            buttons: {
                                UPDATE: function () {
                               
                                var currentDomain = window.location.hostname;
                                $.ajax({
                                type    : "GET",
                                url     : "../../../../client/src/views/software_update/clear_br_cache.php",
                                dataType  : "json",
                                data    : {currentDomain:currentDomain,version:version,description:description},
                                // async: false,
                                success: function(data)
                                { 
                                   // alert(data);
                                  window.location.reload(true);
                                },
                                });
                               
                                },
                                
                            }
                  
                            });
                        }

                      
                } ,
                }); 
</script>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div>
                <h3 style="font-weight: 600;margin-bottom: 0px;">Dashboard</h3>
            </div>
        </div>
    </div>
</div>

<div class="page-header dashboard-header labelmanager_header dashlet-dashboard-header">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 clearfix">
            {{!-- {{#unless layoutReadOnly}}
            <div class="btn-group pull-right dashboard-buttons">
                <button class="btn btn-text btn-icon" data-action="editTabs" title="{{translate 'Edit Dashboard'}}"><span class="fas fa-pencil-alt fa-sm"></span></button>
                <button class="btn btn-text btn-icon" data-action="addDashlet" title="{{translate 'Add Dashlet'}}"><span class="far fa-plus-square"></span></button>
            </div>
            {{/unless}} --}}
            {{#ifNotEqual dashboardLayout.length 1}}
            <div class="btn-group dashboard-tabs">
                {{#each dashboardLayout}}
                    <button class="btn btn-text{{#ifEqual @index ../currentTab}} active{{/ifEqual}}" data-action="selectTab" data-tab="{{@index}}"><span>{{name}}</span></button>
                {{/each}}
            </div>
            {{/ifNotEqual}}
        </div>
        {{!--<div class="col-sm-4">
            {{#if displayTitle}}
            <h3>{{translate 'Dashboard' category='scopeNames'}}</h3>
            {{/if}}
        </div>--}}
        <div class="col-xs-12 col-sm-12 col-md-7 mt15">
            <div class="row">
                <div class="col-xs-6 col-sm-4 space_show hidden">
                    <input type="hidden"/>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="filter-date" style="display: none;">
                        <div class="input-group">
                            <input type="text" class="form-control" name="daterange" id="daterange" value="" placeholder="select Date" title="Select Date" />
                            <label for="daterange" class="input-group-addon btn btn-default_white">
                               <i class="material-icons-outlined" style="font-size: 16px !important;position: relative;">date_range</i>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4 filter-team" style="display: none;">
                    <div class="">
                        <select class="form-control teams" title="Select Team">
                            <!-- <option value="">Select Teams</option> -->
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4 filter-user" style="display: none;">
                    <div class="">
                        <select class="form-control users" title ="Select User">
                            <!-- <option value="">Select Users</option> -->
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="dashlets grid-stack grid-stack-4">{{{dashlets}}}</div>

<!-- Modal for Leads data -->
<!-- Modal -->
<div id="leadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Current Month Lead List</h4>
      </div>
      <div class="modal-body">
        <div class="leadListData1 table-responsive"></div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>
<!-- Modal for Leads data -->



        
<!-- Todays listing modal -->

<div class="modal fade" id="todaysListing" role="dialog">
    <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Listing</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="todaysListingTable" class="table " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Sr. No</th>
                                <th class="th-sm">Title</th>
                                <th class="th-sm">Time</th>
                                <th class="th-sm">Created At</th>
                            </tr>
                        </thead>
                        <tbody class="append_rows">
                            <!-- <tr colspan="3" >No Records Found!</tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
</div>

<!-- Todays listing modal -->
        
<!-- Dashboard : Leads counts -->

<div class="modal fade" id="dashboardLeadsCountListing" role="dialog">
    <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Listing</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="dashboardLeadsCountListingTable" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Sr. No</th>
                                <th class="th-sm">Lead Name</th>
                                <th class="th-sm">Assigned User</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">Created At</th>
                            </tr>
                        </thead>
                        <tbody class="append_rows">
                            <!-- <tr colspan="5" >No Records Found!</tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
</div>

<!-- Dashboard : Leads counts -->

<!-- opportunities listing modal -->

<div class="modal fade" id="opportunitiesListing" role="dialog">
    <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Listing</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="opportunitiesListingTable" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Sr No</th>
                                <th class="th-sm">Title</th>
                                <th class="th-sm">Assigned User</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">Created At</th>
                            </tr>
                        </thead>
                        <tbody class="append_rows">
                            <!-- <tr colspan="3" >No Records Found!</tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
</div>

<!-- Todays listing modal -->

<!-- User transaction details modal -->

<div class="modal fade" id="transactionDetailsModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Transaction Details</h4>
            </div>
            <div class="modal-body transactionDetailsModalBody ">
                <div class="list-container transactionDetailsModalNoData">No Data</div>
            </div>
        </div>   
    </div>
</div>

<!-- User transaction details modal -->

<script>
    
    function getLeadeListForCurrentMonth(){
        // alert("IN GET CURRENT MONTH LIST OF LEADS");

         $.ajax({
                    url: "../../../client/res/templates/getLeadeListForCurrentMonth.php",
                    type: "GET", 
                    
                    dataType: "json",
                   
                    
                    success: function(result)
                    {
                      $(".leadListData1").html(result);
                      //$("#addDataForAddWindow").html(result);
                    }
                });

        $("#leadModal").modal("show");
    }
</script>




<script >
    
    function getFilterTeamList() {

        $(".filter-team select").html('<option value="">All Teams</option>');

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/filterAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getFilterTeamList", parameters : "false" },
            // processData : false,
            // contentType : false,
            success     : function(response) {
                
                if( response.status == "true" ){
                    
                    if( response.data.hide == "false" ) {

                        $(".filter-team select").html('');
                        $(".filter-team select").append('<option value="">Select Team</option>');
                        $(".filter-team select").append(response.data.html);
                        $(".filter-team").show();
                        $(".filter-date").show();
                        $('.teams').customA11ySelect();
                    }

                }else{
                    
                    if( response.data.hide == "true" ) {
                        $(".filter-team").hide();
                        $(".space_show").removeClass("hidden");
                    }else{
                        $(".filter-team select").html('');
                        $(".filter-team select").append('<option value="">Select Team</option>');
                        $(".filter-team").show();
                        $(".filter-date").show();
                        $('.teams').customA11ySelect();
                    }
                }
            },
        });

    }

    function getFilterUserList() {

        $(".filter-user select").html('<option value="">All Users</option>');

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/filterAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getFilterUserList", parameters : "false" },
            // processData : false,
            // contentType : false,
            success     : function(response) {
                
                if( response.status == "true" ){
                    

                    if( response.data.hide == "false" ) {

                        $(".filter-user select").html('');
                        $(".filter-user select").append('<option value="">Select User</option>');
                        $(".filter-user select").append(response.data.html);
                        $(".filter-user").show();
                        $(".filter-date").show();
                        $('.users').customA11ySelect();
                    }


                }else{
                    
                    if( response.data.hide == "true" ) {
                        // $(".filter-user").hide();
                        $(".filter-user select").html('');
                        $(".filter-user select").append('<option value="">Select User</option>');
                        $(".filter-user select").append(response.data.html);
                        $(".filter-user").show();
                        $(".filter-date").show();
                        $('.users').customA11ySelect();
                    }
                }
            },
        });

    }

    getFilterUserList();
    getFilterTeamList();

    $(document).on( "click", ".close-modal", function() {
        $("#dashboardLeadsCountListing").modal("hide");
        $("#todaysListing").modal("hide");
        $("#opportunitiesListing").modal("hide");
    });
   
</script>

<script type="text/javascript">
   $(".dashboard-tabs button[data-action='selectTab'] span").click(function(){
        var dashboard_tabs = $(this).text();
        
        if(dashboard_tabs == 'Leads'){
            
            $(".dashlets .grid-stack-item[data-name='things']").css("height","412px !important");
            $(".dashlets .grid-stack-item[data-name='things']").css("background","red !important");
        }
   }); 

</script>
