<script>
    
    function getMonthlyIncome(filterUser ="",filterTeam ="") {
        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/opportunitiesAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getMonthlyIncome", parameters : "true", filterUser : filterUser, filterTeam : filterTeam},
            success     : function(response) {
                
                if( response.status == "true" ){
                    var chart = AmCharts.makeChart("chartdiv_forecast", {
                    "type": "serial",
                    "theme": "light",
                    "marginTop":20,
                    "marginRight": 5,
                    "hideCredits":true,
                    "dataProvider": response.value ,
                    
                    "valueAxes": [{
                        // "axisAlpha": 0,
                        "stackType": "regular",
                        "position": "left",
                        "title": "Revenue in Amount (Per Lakhs)"
                    }],

                    "graphs": [{
                        "id":"g1",
                        "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                        "bullet": "round",
                        "bulletSize": 8,
                        "lineColor": "#1F57A0",
                        "lineThickness": 2,
                        "negativeLineColor": "#637bb6",
                        /* "type": "smoothedLine", */
                        "valueField": "value"
                    }],
                    "chartCursor": {
                        "categoryBalloonDateFormat": "MMM",
                        "cursorAlpha": 0,
                        "valueLineEnabled":true,
                        "valueLineBalloonEnabled":true,
                        "valueLineAlpha":0.1,
                        "fullWidth":true
                    },
                    
                    "categoryField": "month",
                    "categoryAxis": {
                        "minPeriod": "MM",
                        "parseDates": true,
                        "minorGridAlpha": 0.1,
                        "minorGridEnabled": true,
                        // "parseDates": true ,
                        // "minPeriod": "MM",
                        
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
   
    getMonthlyIncome();

    $(document).on("change",".users", function(){
      $(".teams").val("");
      filterUser = $(".users").val();
      filterTeam = $(".teams").val();
       
      getMonthlyIncome( filterUser, filterTeam);
    });

    $(document).on("change",".teams", function(){
      $(".users").val("");
      filterUser = $(".users").val();
      filterTeam = $(".teams").val(); 

      getMonthlyIncome( filterUser, filterTeam);
      
    });

   

</script>

<div class="col-xs-12">
  <div id="chartdiv_forecast" class="chartdiv"></div>
</div>

