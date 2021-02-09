<div class="list-container dashboard-leads-tab" style="padding: 0px !important;">
   <div class="row">
      <div class="col-xs-12">
         <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#home" class="hotLeadsCount">Hot (0)</a></li>
            <li class="active"><a data-toggle="tab" href="#menu1" class="warmLeadsCount">Warm (0)</a></li>
            <li><a data-toggle="tab" href="#menu2" class="coldLeadsCount">Cold (0)</a></li>
            <li><a data-toggle="tab" href="#menu3" class="deadLeadsCount">Dead (0)</a></li>
         </ul>
         <div class="tab-content">
            
            <div id="home" class="tab-pane fade">
                <div class="">
                    <div class="list list-expanded">
                        <ul class="list-group Leadstabs hotLeads">
                            <!-- append here dynamic html -->
                        </ul>
                    </div>
                </div>
            </div>
            
            <div id="menu1" class="tab-pane fade active in">
                <div class="">
                    <div class="list list-expanded">
                        <ul class="list-group Leadstabs warmLeads">
                            <!-- append here dynamic html -->
                        </ul>
                    </div>
                </div>
            </div>
            
            <div id="menu2" class="tab-pane fade">
                <div class="">
                    <div class="list list-expanded">
                        <ul class="list-group Leadstabs coldLeads">
                            <!-- append here dynamic html -->
                        </ul>
                    </div>
                </div>
            </div>
            
            <div id="menu3" class="tab-pane fade">
                <div class="">
                    <div class="list list-expanded">
                        <ul class="list-group Leadstabs deadLeads">
                            <!-- append here dynamic html -->
                        </ul>
                    </div>
                </div>
            </div>

         </div>
      </div>
   </div>
</div>



<script >

    // Get counts
    function getLeadsTabData() {

        var filterDate = $("#daterange").val();
        var filterUser = $(".users").val();
        var filterTeam = $(".teams").val();

        $(".hotLeadsCount").html("Hot (0)");
        $(".warmLeadsCount").html("Warm (0)");
        $(".coldLeadsCount").html("Cold (0)");
        $(".deadLeadsCount").html("Dead (0)");
        $(".hotLeads").html("");
        $(".warmLeads").html("");
        $(".coldLeads").html("");
        $(".deadLeads").html("");
                
        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/leadsAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getLeadsTabData", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                if( response.status == "true" ){
                    
                    // console.log(response.msg);

                    if( response.data.hotLeads.hot.count != "" ){
                        $(".hotLeadsCount").html("Hot ("+response.data.hotLeads.hot.count+")");
                    }
                    if( response.data.hotLeads.hot.html != "" ){
                        $(".hotLeads").html("");
                        $(".hotLeads").html(response.data.hotLeads.hot.html);
                    }
                    if( response.data.warmLeads.warm.count != "" ){
                        $(".warmLeadsCount").html("Warm ("+response.data.warmLeads.warm.count+")");
                    }
                    if( response.data.warmLeads.warm.html != "" ){
                        $(".warmLeads").html("");
                        $(".warmLeads").html(response.data.warmLeads.warm.html);
                    }
                    if( response.data.coldLeads.cold.count != "" ){
                        $(".coldLeadsCount").html("Cold ("+response.data.coldLeads.cold.count+")");
                    }
                    if( response.data.coldLeads.cold.html != "" ){
                        $(".coldLeads").html("");
                        $(".coldLeads").html(response.data.coldLeads.cold.html);
                    }
                    if( response.data.deadLeads.dead.count != "" ){
                        $(".deadLeadsCount").html("Dead ("+response.data.deadLeads.dead.count+")");
                    }
                    if( response.data.deadLeads.dead.html != "" ){
                        $(".deadLeads").html("");
                        $(".deadLeads").html(response.data.deadLeads.dead.html);
                    }

                }else{
                    // console.log(response.msg);
                }

            },
        });

        $(".dashboard-leads-tab ul li").removeClass("active");
        $("#home").removeClass("active in");
        $("#menu1").removeClass("active in");
        $("#menu2").removeClass("active in");
        $("#menu3").removeClass("active in");
        $(".dashboard-leads-tab .warmLeadsCount").parent("li").addClass("active");
        $("#menu1").addClass("active in");
    }

    getLeadsTabData();

    $(document).on("change","#daterange",function(){
        getLeadsTabData();
    });

    $(document).on("change",".users",function(){
        $(".teams").val("");
        getLeadsTabData();
    });
    
    $(document).on("change",".teams",function(){
        $(".users").val("");
        getLeadsTabData();
    });

</script>