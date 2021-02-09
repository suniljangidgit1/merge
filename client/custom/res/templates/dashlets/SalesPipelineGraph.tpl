
<script>

    function getOpportunityStageWiseIncome() {
        var filterDate = $("#daterange").val();
        var filterUser = $(".users").val();
        var filterTeam = $(".teams").val();
        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/opportunitiesAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getOpportunityStageWiseIncome", parameters : "true", filterUser : filterUser, filterTeam : filterTeam , filterDate : filterDate },
            success     : function(response) {
                
                if( response.status == "true" ){
                    var chart = AmCharts.makeChart("chartdiv_sales", {
                    "theme": "light",
                    "type": "serial",
                    "hideCredits":true,
                    "dataProvider": response.value ,
                    "valueAxes": [{
                        "stackType": "regular",
                        "position": "left",
                        "title": "Revenue in Amount (Per Lakhs)",
                    }],
                    "startDuration": 1,
                    "graphs": [{
                        "balloonText": "Revenue in [[category]] ("+filterDate+"): <b>[[value]]</b>",
                        "fillAlphas": 0.9,
                        "lineAlpha": 0.2,
                         "lineColor": "#1F57A0",
                        "lineThickness": 2,
                        "title": "2004",
                        "type": "column",
                        "columnWidth":0.5,
                        "valueField": "back",
                        "fillColorsField": "color"
                    }],
                    "plotAreaFillAlphas": 0.1,
                    "categoryField": "country",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "autoRotateAngle": 25,
                         "autoRotateCount": 5,
                         "title": "Stage of Opportunities",
                    },
                    "export": {
                        "enabled": true
                     }

                });

                }else{
                    //console.log(response.msg);
                }
            },
        });
    } 
   
    getOpportunityStageWiseIncome();

    $(document).on("change",".users", function(){
      $(".teams").val("");
      getOpportunityStageWiseIncome();
    });

    $(document).on("change",".teams", function(){
      $(".users").val("");
      getOpportunityStageWiseIncome();
      
    });

    $(document).on("change","#daterange",function(){
     getOpportunityStageWiseIncome();
});
   

</script>
<div class="col-xs-12">
  <div id="chartdiv_sales" class="chartdiv_sales"></div>
</div>

