<div class="table-responsive LeadsStatus">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="info" style="width:25%">
                    <div class="row">
                        <div class="col-xs-6">
                            New
                        </div>
                        <div class="col-xs-6">
                            <span class="pull-right kanabanNewLeadsCount">
                                0
                            </span>
                        </div>
                    </div>
                </th>
                <th class="success" style="width:25%">
                    <div class="row">
                        <div class="col-xs-6">
                            Open
                        </div>
                        <div class="col-xs-6">
                            <span class="pull-right kanabanOpenLeadsCount">
                                0
                            </span>
                        </div>
                    </div>
                </th>
                <th class="danger" style="width:25%">
                    <div class="row">
                        <div class="col-xs-6">
                            Qualified
                        </div>
                        <div class="col-xs-6">
                            <span class="pull-right kanabanQualifiedLeadsCount">
                                0
                            </span>
                        </div>
                    </div>
                </th>
                <th class="warning" style="width:25%">
                    <div class="row">
                        <div class="col-xs-6">
                            Converted
                        </div>
                        <div class="col-xs-6">
                            <span class="pull-right kanabanConvertedLeadsCount">
                                0
                            </span>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
    <tbody>
        
        <tr>
            <td class="kanabanNewLeads"> <!-- new leads  --> </td>
            <td class="kanabanOpenLeads"> <!-- open leads  --> </td>
            <td class="kanabanQualifiedLeads"> <!-- qualified leads  --> </td>
            <td class="kanabanConvertedLeads"> <!-- converted leads  --> </td>
        </tr>

    </tbody>
  </table>
</div>


<script >

    // Get counts
    function getLeadsKanbanData() {
      
        var filterDate = $("#daterange").val();
        var filterUser = $(".users").val();
        var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/leadsAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getLeadsKanbanData", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                if( response.status == "true" ){
                    
                    // console.log(response.msg);
                    $(".kanabanNewLeadsCount, .kanabanOpenLeadsCount, .kanabanQualifiedLeadsCount, .kanabanConvertedLeadsCount").html(0);

                    if( response.data.NewLeads.New.count != "" ){
                        $(".kanabanNewLeadsCount").html(response.data.NewLeads.New.count);
                    }
                    if( response.data.NewLeads.New.html != "" ){
                        $(".kanabanNewLeads").html("");
                        $(".kanabanNewLeads").html(response.data.NewLeads.New.html);
                    }
                    if( response.data.OpenLeads.Open.count != "" ){
                        $(".kanabanOpenLeadsCount").html(response.data.OpenLeads.Open.count);
                    }
                    if( response.data.OpenLeads.Open.html != "" ){
                        $(".kanabanOpenLeads").html("");
                        $(".kanabanOpenLeads").html(response.data.OpenLeads.Open.html);
                    }
                    if( response.data.QualifiedLeads.Qualified.count != "" ){
                        $(".kanabanQualifiedLeadsCount").html(response.data.QualifiedLeads.Qualified.count);
                    }
                    if( response.data.QualifiedLeads.Qualified.html != "" ){
                        $(".kanabanQualifiedLeads").html("");
                        $(".kanabanQualifiedLeads").html(response.data.QualifiedLeads.Qualified.html);
                    }
                    if( response.data.ConvertedLeads.Converted.count != "" ){
                        $(".kanabanConvertedLeadsCount").html(response.data.ConvertedLeads.Converted.count);
                    }
                    if( response.data.ConvertedLeads.Converted.html != "" ){
                        $(".kanabanConvertedLeads").html("");
                        $(".kanabanConvertedLeads").html(response.data.ConvertedLeads.Converted.html);
                    }

                }else{
                    // console.log(response.msg);
                }
            },
        });
    }

    getLeadsKanbanData();

    $(document).on("change","#daterange",function(){
        getLeadsKanbanData();
    });

    $(document).on("change",".users",function(){
        $(".teams").val("");
        getLeadsKanbanData();
    });
    
    $(document).on("change",".teams",function(){
        $(".users").val("");
        getLeadsKanbanData();
    });

</script>