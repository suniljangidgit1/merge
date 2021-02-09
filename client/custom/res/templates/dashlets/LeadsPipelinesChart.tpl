
<style type="text/css">
  #chartdiv {
    width: 152%;
    height: 90%;
    font-size: 11px;
}     

.leadsPipelineChartNoData {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
    display: none;
}
</style>


<script type="text/javascript">

    var chart;

    function drawLeadsPipelineChart( newLeadsCount = 0, openLeadsCount = 0, qualifiedLeadsCount = 0, convertedLeadsCount = 0  ) {
        chart = AmCharts.makeChart( "chartdiv", {
            "type": "funnel",
            "theme": "light",
            "dataProvider": [ 
            {
                "title": "New Leads",
                "value": newLeadsCount
            }, {
                "title": "Open Leads",
            "value": openLeadsCount
            }, {
                "title": "Qualified Leads",
                "value": qualifiedLeadsCount
            }, {
                "title": "Converted Leads",
                "value": convertedLeadsCount
            } ],
            "balloon": {
                "fixedPosition": true
            },
            "valueField": "value",
            "titleField": "title",
            "marginRight": 240,
            "marginLeft": 15,
            "startX": -500,
            "depth3D": 25,
            "angle": 70,
            "outlineAlpha": 1,
            "pullSlice":false,
            "labelsEnabled": false,
            "outlineColor": "#FFFFFF",
            "outlineThickness": 2,
            "labelPosition": "right",
            "balloonText": "[[title]]: [[value]][[description]]",
            "export": {
                "enabled": true
            }
        } );
        
        jQuery( '.chart-input' ).off().on( 'input change', function() {
            
            var property = jQuery( this ).data( 'property' );
            var target = chart;
            var value = Number( this.value );
            chart.startDuration = 0;

            if ( property == 'innerRadius' ) {
                value += "%";
            }

            target[ property ] = value;
            chart.validateNow();

        } );
    }


    // To fetch leads count
    function getLeadsPipelineChartData() {

        var filterDate = $("#daterange").val();
        var filterUser = $(".users").val();
        var filterTeam = $(".teams").val();

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/leadsAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getLeadsPipelineChartData", isRecords : "false", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                $(".leadsPipelineChartNoData").hide();
                if( response.data.hide == "false" ){
                    $(".leadsPipelineChartNoData").show();
                }

                if( response.status == "true" ){

                    // console.log(response.msg);
                    drawLeadsPipelineChart( response.data.newLeadsCount, response.data.openLeadsCount, response.data.qualifiedLeadsCount, response.data.convertedLeadsCount  );

                }else{
                    // console.log(response.msg);
                }
            },
        });
    }

    getLeadsPipelineChartData();

    $(document).on("change","#daterange",function(){
        getLeadsPipelineChartData();
    });

    $(document).on("change",".users",function(){
        $(".teams").val("");
        getLeadsPipelineChartData();
    });
    
    $(document).on("change",".teams",function(){
        $(".users").val("");
        getLeadsPipelineChartData();
    });

</script>


<div class="text-center" style="position:relative;">
    <p class="leadsPipelineChartNoData">Insufficient data to produce graph.<p>
</div>

<div id="chartdiv"></div>

<div class="container-fluid">
    <div class="row text-center" style="overflow:hidden; display:none;">
        <div class="col-sm-3" style="float: none !important;display: inline-block;">
            <label class="text-left">Angle:</label>
            <input class="chart-input" data-property="angle" type="range" min="0" max="60" value="40" step="1"/>  
        </div>

        <div class="col-sm-3" style="float: none !important;display: inline-block;">
            <label class="text-left">Depth:</label>
            <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="100" step="1"/>
        </div>
    </div>
</div>                                              
