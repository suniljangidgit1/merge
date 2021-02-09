<style>
  .OpportunitiesByLeadSourceNoData {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
    display: none;
}
</style>
<script>

    function getEachLeadSourceCount() {
        var filterDate = $("#daterange").val();
        var filterUser = $(".users").val();
        var filterTeam = $(".teams").val();
        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/opportunitiesAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getEachLeadSourceCount", parameters : "true", filterUser : filterUser, filterTeam : filterTeam , filterDate : filterDate },
            success     : function(response) {
                $(".OpportunitiesByLeadSourceNoData").hide();
                if(response.hide == "false"){
                $(".OpportunitiesByLeadSourceNoData").show();
                }
                if( response.status == "true" ){
                  var chart = AmCharts.makeChart("Pie_chartdiv", {
                  "type": "pie",
                  "startDuration": 0,
                  "theme": "light",
                  "addClassNames": true,
                  "innerRadius": "50%",
                  "defs": {
                    "filter": [{
                      "id": "shadow",
                      "width": "150%",
                      "height": "150%",
                      "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                      },
                      "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                      },
                      "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                      }
                    }]
                  },

                  "dataProvider": response.value,
                  "pullSlice":true,
                  "hideCredits":true,
                  "labelsEnabled": false,
                  "valueField": "litres",
                  "titleField": "country",
                  
                });
                
                chart.addListener("init", handleInit);

                chart.addListener("rollOverSlice", function(e) {
                  handleRollOver(e);
                });

                function handleInit(){
                  chart.legend.addListener("rollOverItem", handleRollOver);
                }

                function handleRollOver(e){
                  var wedge = e.dataItem.wedge.node;
                  wedge.parentNode.appendChild(wedge);
                }
                }else{
                    //console.log(response.msg);
                }
            },
        });
    } 
   
    getEachLeadSourceCount();

    $(document).on("change",".users", function(){
      $(".teams").val("");
      getEachLeadSourceCount();
    });

    $(document).on("change",".teams", function(){
      $(".users").val("");
      getEachLeadSourceCount();
      
    });

    $(document).on("change","#daterange",function(){
      getEachLeadSourceCount();
    });
   
    
</script>
        <div class="text-center" style="position:relative;">
        <p class="OpportunitiesByLeadSourceNoData">Insufficient data to produce graph.<p>
        </div>
        <div class="col-xs-12" >
            <div id="Pie_chartdiv"></div>
           <!--  <div id="legend"></div> -->
        </div> 
       

