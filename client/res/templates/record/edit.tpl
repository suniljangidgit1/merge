<div class="edit" id="{{id}}">
    {{#unless buttonsDisabled}}
    <div class="detail-button-container button-container record-buttons clearfix">
        <div class="btn-group actions-btn-group" role="group">
        {{#each buttonList}}{{button name scope=../../entityType label=label style=style html=html}}{{/each}}
        {{#if dropdownItemList}}
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="fas fa-ellipsis-h"></span>
        </button>
        <ul class="dropdown-menu pull-left">
            {{#each dropdownItemList}}
            {{#if this}}
            <li><a href="javascript:" class="action" data-action="{{name}}">{{#if html}}{{{html}}}{{else}}{{translate label scope=../../../entityType}}{{/if}}</a></li>
            {{else}}
                {{#unless @first}}
                {{#unless @last}}
                <li class="divider"></li>
                {{/unless}}
                {{/unless}}
            {{/if}}
            {{/each}}
        </ul>
        {{/if}}
        </div>
    </div>
    {{/unless}}

    <div class="row">
        <div class="left {{#if isWide}} col-md-12{{else}}{{#if isSmall}} col-md-7{{else}} col-md-8{{/if}}{{/if}}">
            <div class="middle">{{{middle}}}</div>
            <div class="extra">{{{extra}}}</div>
            <div class="bottom">{{{bottom}}}</div>
        </div>
        <div class="side{{#if isWide}} col-md-12{{else}}{{#if isSmall}} col-md-5{{else}} col-md-4{{/if}}{{/if}}">
        {{{side}}}
        </div>
    </div>
</div>


<script >

    $(document).ready(function(){
       
        $("input[data-name='dateEnd'], input[data-name='dateStart'], input[data-name='endDate'], input[data-name='startDate'], input[data-name='weeklyendDate'], input[data-name='weeklystartDate'], input[data-name='monthlyEndDate'], input[data-name='monthlyStartDate'], input[data-name='customStartDate1'], input[data-name='customStartDate2'], input[data-name='customStartDate3'], input[data-name='customStartDate4'], input[data-name='customStartDate5'], input[data-name='customStartDate6']").attr("readonly","readonly");

    });

    // <!-- dateEnd validation script start -->
    var count=0;
    $(document).on("change","input[data-name='dateEnd']",function(e){
        
        e.stopImmediatePropagation();
        count++;
        var textDateStart   = $("input[data-name=dateStart]").val();
        var stringDateStart = textDateStart.split('/');
        var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );
        
        var textDateEnd     = $("input[data-name=dateEnd]").val();
        var stringDateEnd   = textDateEnd.split('/');
        var formatDateEnd   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

        // alert("Count : "+count+" | Start date : "+formatDateStart+" | End date : "+formatDateEnd );

        if(count==3){
            if( textDateStart == "" )
            { 
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select start date first',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=dateEnd]").val("");
                            delete(count);
                            count=0;
                        }
                    }
                });
            }
            else{
                if( formatDateStart > formatDateEnd ) {
                    $.confirm({
                        title: 'Warning!',
                        content: 'Please select date greater than start date',
                        buttons: {
                            Ok: function (){
                                $("input[data-name=dateEnd]").val("");
                                delete(count);
                                count=0;
                            }
                        }
                    });
                }
            } 
        }

        if( count >= 3 ) {
            delete(count);
            count=0;
        }
    });
</script>

<script>
    
    // <!-- dateStart validation script start -->
    count1=0;
    $(document).on("change","input[data-name='dateStart']",function(e){

        e.stopImmediatePropagation();
        count1++;
        var textDateStart   = $("input[data-name=dateStart]").val();
        var stringDateStart = textDateStart.split('/');
        var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );
        
        var textDateEnd     = $("input[data-name=dateEnd]").val();
        var stringDateEnd   = textDateEnd.split('/');
        var formatDateEnd   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

        var today       = new Date();
        var dd          = String(today.getDate()).padStart(2, '0');
        var mm          = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy        = today.getFullYear();
        var formatTodayDate = Date.parse( mm + ' ' + dd + ' ' + yyyy );

        // alert( "Count : "+count+" | Start date : "+formatDateStart+" | End date : "+formatDateEnd+" | formatTodayDate : "+formatTodayDate );

        if(count1==3)
        {
            if( formatDateStart < formatTodayDate )
            { 
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select future date',
                    buttons: {
                        Ok: function () {
                            $("input[data-name=dateStart]").val("");
                            delete(count1);
                            count1=0;
                        }
                    }
                }); 
            }else if( textDateEnd != "" && formatDateEnd < formatDateStart ) {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select date less than end date',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=dateStart]").val("");
                            delete(count1);
                            count1=0;
                        }
                    }
                });
            }
        }

        if(count1>=3) { 
            delete(count1);
            count1=0;
        }
    });
</script>

<script>
    
    // <!-- dateEnd-time validation script start -->
    count2=0;
    $(document).on("change","input[data-name='dateStart-time']",function(e){
        
        e.stopImmediatePropagation();
        count2++;
        var textDateStart   = $("input[data-name=dateStart]").val();
        var stringDateStart = textDateStart.split('/');
        var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );
        
        var textDateEnd     = $("input[data-name=dateEnd]").val();
        var stringDateEnd   = textDateEnd.split('/');
        var formatDateEnd   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

        var textStartTime   = $("input[data-name=dateStart-time]").val().replace("pm"," PM").replace("am"," AM");
        var formatStartTime = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2]+" "+textStartTime );

        var textEndTime     = $("input[data-name=dateEnd-time]").val().replace("pm"," PM").replace("am"," AM");
        var formatEndTime   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2]+" "+textEndTime );

        // alert(" count : "+count2+" | formatDateStart : "+formatDateStart+" | formatDateEnd : "+formatDateEnd+" | formatStartTime : "+formatStartTime+" | formatEndTime : "+formatEndTime);
        /*if(count2==3)
        {*/
            if( parseInt(formatStartTime) >= parseInt(formatEndTime) )
            {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select start time less than end time',
                    
                    buttons: {
                        Ok: function () {
                            $("input[data-name='dateStart-time']").val("");
                            delete(count2);
                            count2=0;
                        }
                    }
                });
            }
        /*}
        if(count2>=3)  
        {
            delete(count2);
            count2=0;
        }*/
    });
</script>

<script>
    
    // <!-- dateEnd-time validation script start -->
    count22=0;
    $(document).on("change","input[data-name='dateEnd-time']",function(e){
        
        e.stopImmediatePropagation();
        count22++;
        var textDateStart   = $("input[data-name=dateStart]").val();
        var stringDateStart = textDateStart.split('/');
        var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );
        
        var textDateEnd     = $("input[data-name=dateEnd]").val();
        var stringDateEnd   = textDateEnd.split('/');
        var formatDateEnd   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

        var textStartTime   = $("input[data-name=dateStart-time]").val().replace("pm"," PM").replace("am"," AM");
        var formatStartTime = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2]+" "+textStartTime );

        var textEndTime     = $("input[data-name=dateEnd-time]").val().replace("pm"," PM").replace("am"," AM");
        var formatEndTime   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2]+" "+textEndTime );

        // alert(" count : "+count22+" | formatDateStart : "+formatDateStart+" | formatDateEnd : "+formatDateEnd+" | formatStartTime : "+formatStartTime+" | formatEndTime : "+formatEndTime);
        /*if(count22==3)
        {*/
            if( parseInt(formatStartTime) >= parseInt(formatEndTime) )
            {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select end time greater than start time',
                    buttons: {
                        Ok: function () {
                            $("input[data-name='dateEnd-time']").val("");
                            delete(count22);
                            count22=0;
                        }
                    }
                });
            }
        /*}
        if(count22>=3)  
        {
            delete(count22);
            count22=0;
        }*/
    });
</script>

<script>

    // <!-- Daily validation script start -->
    var count3=0;
    $(document).on("change","input[data-name='endDate']",function(e){
        
        e.stopImmediatePropagation();
        count3++;
        
        if(count3==3){

            var textStartDate   = $("input[data-name=startDate]").val();
            var stringStartDate = textStartDate.split('/');
            var formatStartDate = Date.parse( stringStartDate[1]+" "+stringStartDate[0]+" "+stringStartDate[2] );
            
            var textEndDate     = $("input[data-name=endDate]").val();
            var stringEndDate   = textEndDate.split('/');
            var formatEndDate   = Date.parse( stringEndDate[1]+" "+stringEndDate[0]+" "+stringEndDate[2] );

            // alert("$$$ Count : "+count3+" | Start date : "+formatStartDate+" | End date : "+formatEndDate );

            if(textStartDate== "")
            {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select start date first',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=endDate]").val("");
                            delete(count3);
                            count3=0;
                        }
                    }
                });
            }
            else{

                if( formatStartDate > formatEndDate )
                {
                    $.confirm({
                        title: 'Warning!',
                        content: 'Please select date greater than start date',
                        buttons: {
                            Ok: function (){
                                $("input[data-name=endDate]").val("");
                                delete(count3);
                                count3=0;
                            }
                        }
                    });
                }
            } 
        }

        if( count3 >= 3 ) {
            delete(count3);
            count3=0;
        }
    });

    
    // <!-- startDate validation script start -->
    count4=0;
    $(document).on("change","input[data-name='startDate']",function(e){

        e.stopImmediatePropagation();
        count4++;

        var textStartDate   = $("input[data-name=startDate]").val();
        var stringStartDate = textStartDate.split('/');
        var formatStartDate = Date.parse( stringStartDate[1]+" "+stringStartDate[0]+" "+stringStartDate[2] );
        
        var textEndDate     = $("input[data-name=endDate]").val();
        var stringEndDate   = textEndDate.split('/');
        var formatEndDate   = Date.parse( stringEndDate[1]+" "+stringEndDate[0]+" "+stringEndDate[2] );

        var today       = new Date();
        var dd          = String(today.getDate()).padStart(2, '0');
        var mm          = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy        = today.getFullYear();
        var formatTodayDate = Date.parse( mm + ' ' + dd + ' ' + yyyy );

        // alert( "@@@@ Count : "+count4+" | Start date : "+formatStartDate+" | End date : "+formatEndDate+" | formatTodayDate : "+formatTodayDate );

        if(count4==3)
        {
            if(formatStartDate < formatTodayDate)
            { 
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select future date',
                    buttons: {
                        Ok: function () {
                            $("input[data-name=startDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                }); 
            }else if( textEndDate != "" && formatEndDate < formatStartDate ) {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select date less than end date',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=startDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                });
            }
        }

        if(count4>=3) { 
            delete(count4);
            count4=0;
        }
    });
</script>

<!-- Weekly validation script start -->
<script >
    
    var count=0;
    $(document).on("change","input[data-name='weeklyendDate']",function(e){
        
        e.stopImmediatePropagation();
        count++;

        var textWeeklyStartDate     = $("input[data-name=weeklystartDate]").val();
        var stringWeeklyStartDate   = textWeeklyStartDate.split('/');
        var formatWeeklyStartDate   = Date.parse( stringWeeklyStartDate[1]+" "+stringWeeklyStartDate[0]+" "+stringWeeklyStartDate[2] );
        
        var textWeeklyEndDate       = $("input[data-name=weeklyendDate]").val();
        var stringWeeklyEndDate     = textWeeklyEndDate.split('/');
        var formatWeeklyEndDate     = Date.parse( stringWeeklyEndDate[1]+" "+stringWeeklyEndDate[0]+" "+stringWeeklyEndDate[2] );

        // alert("Count : "+count+" | Start date : "+formatWeeklyStartDate+" | End date : "+formatWeeklyEndDate );

        if(count==3){
            
            if(textWeeklyStartDate== "")
            {
                
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select start date first',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=weeklyendDate]").val("");
                            delete(count);
                            count=0;
                        }
                    }
                });
            }
            else{

                if( formatWeeklyStartDate > formatWeeklyEndDate )
                {
                    $.confirm({
                        title: 'Warning!',
                        content: 'Please select date greater than start date',
                        buttons: {
                            Ok: function (){
                                $("input[data-name=weeklyendDate]").val("");
                                delete(count);
                                count=0;
                            }
                        }
                    });
                }
            } 
        }

        if( count >= 3 ) {
            delete(count);
            count=0;
        }

    });

    
    count4=0;
    $(document).on("change","input[data-name='weeklystartDate']",function(e){

        e.stopImmediatePropagation();
        count4++;

        var textWeeklyStartDate     = $("input[data-name=weeklystartDate]").val();
        var stringWeeklyStartDate   = textWeeklyStartDate.split('/');
        var formatWeeklyStartDate   = Date.parse( stringWeeklyStartDate[1]+" "+stringWeeklyStartDate[0]+" "+stringWeeklyStartDate[2] );
        
        var textWeeklyEndDate       = $("input[data-name=weeklyendDate]").val();
        var stringWeeklyEndDate     = textWeeklyEndDate.split('/');
        var formatWeeklyEndDate     = Date.parse( stringWeeklyEndDate[1]+" "+stringWeeklyEndDate[0]+" "+stringWeeklyEndDate[2] );

        var today       = new Date();
        var dd          = String(today.getDate()).padStart(2, '0');
        var mm          = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy        = today.getFullYear();
        var formatTodayDate = Date.parse( mm + ' ' + dd + ' ' + yyyy );

        // alert( "Count : "+count4+" | Start date : "+textWeeklyStartDate+" | End date : "+textWeeklyEndDate+" | formatTodayDate : "+formatTodayDate );

        if(count4==3)
        {
            
            if(formatWeeklyStartDate < formatTodayDate)
            { 
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select future date',
                    buttons: {
                        Ok: function () {
                            $("input[data-name=weeklystartDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                }); 
            }else if( textWeeklyEndDate != "" && formatWeeklyEndDate < formatWeeklyStartDate ) {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select date less than end date',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=weeklystartDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                });
            }
        }
        
        if(count4>=3) { 
            delete(count4);
            count4=0;
        }
    });
</script>

<!-- Monthly validation script start -->
<script >
    
    var count=0;
    $(document).on("change","input[data-name='monthlyEndDate']",function(e){
        
        e.stopImmediatePropagation();
        count++;

        var textMonthlyStartDate   = $("input[data-name=monthlyStartDate]").val();
        var striMgmonthlyStartDate = textMonthlyStartDate.split('/');
        var formMtmonthlyStartDate = Date.parse( striMgmonthlyStartDate[1]+" "+striMgmonthlyStartDate[0]+" "+striMgmonthlyStartDate[2] );
        
        var textmonthlyEndDate     = $("input[data-name=monthlyEndDate]").val();
        var stringmonthlyEndDate   = textmonthlyEndDate.split('/');
        var formatmonthlyEndDate   = Date.parse( stringmonthlyEndDate[1]+" "+stringmonthlyEndDate[0]+" "+stringmonthlyEndDate[2] );

        // alert("Count : "+count+" | Start date : "+formMtmonthlyStartDate+" | End date : "+formatmonthlyEndDate );

        if(count==3){
            
            if( textMonthlyStartDate == "")
            {
                
                $.confirm({
                  title: 'Warning!',
                  content: 'Please select start date first',
                  buttons: {
                      Ok: function (){
                          $("input[data-name=monthlyEndDate]").val("");
                          delete(count);
                          count=0;
                      }
                  }
              });
            }
            else{

                if( formMtmonthlyStartDate > formatmonthlyEndDate ) {
                    $.confirm({
                        title: 'Warning!',
                        content: 'Please select date greater than start date',
                        buttons: {
                            Ok: function (){
                                $("input[data-name=monthlyEndDate]").val("");
                                delete(count);
                                count=0;
                            }
                        }
                    });
                }

            } 
        }

        if( count >= 3 ) {
            delete(count);
            count=0;
        }
    });

    count4=0;
    $(document).on("change","input[data-name='monthlyStartDate']",function(e){

        e.stopImmediatePropagation();
        count4++;

        var textMonthlyStartDate   = $("input[data-name=monthlyStartDate]").val();
        var strigMonthlyStartDate = textMonthlyStartDate.split('/');
        var formatMonthlyStartDate = Date.parse( strigMonthlyStartDate[1]+" "+strigMonthlyStartDate[0]+" "+strigMonthlyStartDate[2] );
        
        var textMonthlyEndDate     = $("input[data-name=monthlyEndDate]").val();
        var stringMonthlyEndDate   = textMonthlyEndDate.split('/');
        var formatMonthlyEndDate   = Date.parse( stringMonthlyEndDate[1]+" "+stringMonthlyEndDate[0]+" "+stringMonthlyEndDate[2] );

        var today       = new Date();
        var dd          = String(today.getDate()).padStart(2, '0');
        var mm          = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy        = today.getFullYear();
        var formatTodayDate = Date.parse( mm + ' ' + dd + ' ' + yyyy );

        // alert( "Count : "+count+" | Start date : "+formatMonthlyStartDate+" | End date : "+formatMonthlyEndDate+" | formatTodayDate : "+formatTodayDate );

        if(count4==3)
        {
            if(formatMonthlyStartDate < formatTodayDate)
            { 
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select future date',
                    buttons: {
                        Ok: function () {
                            $("input[data-name=monthlyStartDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                }); 
            }else if( textMonthlyEndDate != "" && formatMonthlyEndDate < formatMonthlyStartDate ) {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select date less than end date',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=monthlyStartDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                });
            }
        }
        
        if(count4>=3) { 
            delete(count4);
            count4=0;
        }
    });
</script>


<script>

    // RECURING SERIES TASK CUSTOM DDL
    count10=0;
    $(document).on("change","input[data-name='customStartDate1'], input[data-name='customStartDate2'], input[data-name='customStartDate3'], input[data-name='customStartDate4'], input[data-name='customStartDate5'], input[data-name='customStartDate6']",function(e){

        e.stopImmediatePropagation();
        count10++;

        var textCustomStartDate     = $(this).val();
        var strigCustomStartDate    = textCustomStartDate.split('/');
        var formatCustomStartDate   = Date.parse( strigCustomStartDate[1]+" "+strigCustomStartDate[0]+" "+strigCustomStartDate[2] );

        var today       = new Date();
        var dd          = String(today.getDate()).padStart(2, '0');
        var mm          = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy        = today.getFullYear();
        var formatTodayDate = Date.parse( mm + ' ' + dd + ' ' + yyyy );

        // alert( "Count : "+count+" | Start date : "+formatCustomStartDate+" | formatTodayDate : "+formatTodayDate );

        if(count10==3)
        {
            if(formatCustomStartDate < formatTodayDate)
            { 
                $(this).val("");
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select future date',
                    buttons: {
                        Ok: function () {
                            delete(count10);
                            count10=0;
                        }
                    }
                }); 
            }
        }
        
        if(count10>=3) { 
            delete(count10);
            count10=0;
        }

    });
</script>

<script>
    var hash=window.location.hash;
    hash.indexOf(0);
    hash.toLowerCase();
    hash = hash.split("/")[2];

    var afterhash=window.location.hash;

    afterhash.indexOf(0);
    afterhash.toLowerCase();
    afterhash1 = afterhash.split("/")[0];
    afterhash2 = afterhash.split("/")[1];

    var leadConvertUrl  = afterhash1 + '/' + afterhash2;

    if(afterhash=='#Account/create' || leadConvertUrl=='#Lead/convert')
    {
        $("select[data-name='wanttoaddgstdetails']").attr("id", "account_gst_allowed");
        $("select[data-name='howmanygstdetails']").attr("id", "account_gst_num");
        $("button[data-action='save']").attr("id", "save_account_data");
        $("button[data-action='save']").attr("onclick", "getGSTVal()");
        $("select[data-name='howmanygstdetails']").attr("onchange", "numof_GST(this.value);");

        $("div[data-name='doyouhavegstnum']").find('.field').append("<input type='hidden' id='totalGSTCntChangedAdd' value='0'>");
        $("div[data-name='doyouhavegstnum']").find('.field').append("<input type='hidden' id='totalGSTCntChangedAdd1' value='0'>");
        $("div[data-name='doyouhavegstnum']").find('.field').append("<input type='hidden' id='gstpanelshow' value='None'>");
        
        $("div[data-name='totalnumberofgst']").hide();
        $("div[data-name='howmanygstdetails']").hide();
        $("select[data-name='doyouhavegstnum']").attr("id", "have_gst_num");

        $(document).on("change", "#have_gst_num", function(){
            if($(this).val() == 'Yes')
            {
                $("div[data-name='howmanygstdetails']").show();
                numof_GST(1);
                $("#account_gst_num").val(1);
            }
            else {
                $("div[data-name='howmanygstdetails']").hide();
                $("#gstpanelshow").val(0);
                $("#last_child_panel").hide();
            }
        });

        function numof_GST(num)
        {
            //$("#last_child_panel").remove();
            if(num!='None')
            {
                num = parseInt(num);
                //$("#totalGSTCntChangedAdd").val(num);

                if($("#gstpanelshow").val() == 'None'){
                    $(".middle").append('<div id="last_child_panel" class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">GST Details</h4></div><div class="panel-body panel-body-form" id="numofgst"><div class="row" id="gst_no"></div></div></div>');
                }

                var newNum = num - parseInt($("#totalGSTCntChangedAdd1").val());

                if(num < parseInt($("#totalGSTCntChangedAdd1").val())){
                    var totalRemov = parseInt($("#totalGSTCntChangedAdd1").val()) - num;
                    $("#numofgst > .gst").slice(-totalRemov).remove();
                    $("#totalGSTCntChangedAdd1").val(num);
                }

                //$("#gst_no").nextAll('.gst').remove();

                //var s = $("#numofgst .gst").length + 1;
                var s = parseInt($("#totalGSTCntChangedAdd1").val());
                var m = parseInt($("#totalGSTCntChangedAdd1").val()) + 1;

                for(var i=0;i<newNum;i++)
                {
                    //$("#gstno"+i).remove();

                    $("#numofgst").append('<div class="row gst" id="gst_'+s+'"><div class="cell col-sm-6 form-group"  data-name="gstno'+s+'"><label class="control-label" data-name="gstno'+s+'">GST NO '+m+'</label><div class="field" data-name="gstno'+s+'"><input type="text" class="main-element form-control acc_gst" id="gstno'+s+'" name="gstno[]" data-name="gstno'+s+'" value="" maxlength="40" autocomplete="espo-gstno'+s+'" onblur="acc_getGST_state(this.value, '+s+')"><div class="row"><div class="col-sm-4 col-xs-4"><button type="button" class="btn btn-danger" onclick="acc_removeGST('+s+')"><span class="fas fa-trash-alt fa-sm"></span></button></div></div></div></div><div class="cell col-sm-6 form-group" data-name="acc_gstAddress'+s+'"><label class="control-label" data-name="acc_gstAddress'+s+'"><span class="label-text">Address '+m+'</span></label><div class="field" data-name="acc_gstAddress'+s+'"><textarea class="form-control auto-height" data-name="acc_gstAddressStreet'+s+'" id="acc_gstAddressStreet'+s+'" name="acc_gstAddressStreet[]" rows="1" placeholder="Street" autocomplete="espo-acc_gststreet'+s+'" maxlength="255"></textarea><div class="row"><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" id="acc_gstcity'+s+'" data-name="acc_gstAddressCity'+s+'" name="acc_gstAddressCity[]" value="" placeholder="City" autocomplete="espo-acc_gstcity'+s+'" maxlength="255"></div><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" id="acc_gststate'+s+'" name="acc_gstAddressState[]" data-name="acc_gstAddressState'+s+'" value="" placeholder="State" autocomplete="espo-acc_gststate'+s+'" maxlength="255"></div><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" id="acc_gstpostalcode'+s+'" name="acc_gstAddressPostalCode[]" data-name="acc_gstAddressPostalCode'+s+'" value="" placeholder="Postal Code" autocomplete="espo-acc_gstpostalCode'+s+'" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></div></div></div></div>');


                    $("#acc_gstpostalcode"+i).keyup(function(){
                        limitText(this,6);
                    });

                    s++;
                    m++;

                    changed_num = $("#totalGSTCntChangedAdd1").val(num);
                }
                $("#gstpanelshow").val(1);
            }
            else {
                $("#totalGSTCntChangedAdd").val('');
                $("#totalGSTCntChangedAdd1").val('');
                $("#gstpanelshow").val('');
                $("#totalGSTCntChangedAdd").val(0);
                $("#totalGSTCntChangedAdd1").val(0);
                $("#gstpanelshow").val('None');
                //$("#last_child_panel").hide();
                $("#numofgst").closest('.panel-default').remove();
            }
        }

        function limitText(limitField, limitNum) {
            if (limitField.value.length > limitNum) {
                limitField.value = limitField.value.substring(0, limitNum);
            }
        }

        function acc_removeGST(div_id){
            $.confirm({
                title: 'Warning',
                content: 'Do you want to remove GST details?',
                type: 'dark',
                typeAnimated: true,
                buttons: {
                    Ok: function() {
                        $("#gst_"+div_id).remove();
                        var dropDownVal = $("#account_gst_num").val();
                        if(dropDownVal==1){
                            $("#account_gst_num").val('None');
                            $("div[data-name='howmanygstdetails']").hide();
                            $("#have_gst_num").val('No');
                            $("#last_child_panel").remove();
                            $("#gstpanelshow").val('None');
                            $("#totalGSTCntChangedAdd1").val(0);
                        }
                        else {
                            var newDropDownVal = dropDownVal - 1;
                            $("#account_gst_num option[value='"+newDropDownVal+"']").attr("selected", "selected");
                            $("#account_gst_num").val(newDropDownVal);
                        }
                    },
                    Cancel: function() {
                    }
                }
            });
        }

        function acc_getGST_state(stCode, id)
        {
            var inputvalues = stCode;
            var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');

            if(inputvalues == ""){
            }
            else{
                if (gstinformat.test(inputvalues)) {
                    var obj = [{
                        "01":"Jammu and Kashmir",
                        "02":"Himachal Pradesh",
                        "03":"Punjab",
                        "04":"Chandigarh",
                        "05":"Uttarakhand",
                        "06":"Haryana",
                        "07":"Delhi",
                        "08":"Rajasthan",
                        "09":"Uttar Pradesh",
                        "10":"Bihar",
                        "11":"Sikkim",
                        "12":"Arunachal Pradesh",
                        "13":"Nagaland",
                        "14":"Manipur",
                        "15":"Mizoram",
                        "16":"Tripura",
                        "17":"Meghalaya",
                        "18":"Assam",
                        "19":"West Bengal",
                        "20":"Jharkhand",
                        "21":"Odisha",
                        "22":"Chhattisgarh",
                        "23":"Madhya Pradesh",
                        "24":"Gujarat",
                        "25":"Daman and Diu",
                        "26":"Dadra and Nagar Haveli",
                        "27":"Maharashtra",
                        "28":"Andhra Pradesh",
                        "29":"Karnataka",
                        "30":"Goa",
                        "31":"Lakshadweep",
                        "32":"Kerala",
                        "33":"Tamil Nadu",
                        "34":"Puducherry",
                        "35":"Andaman & Nicobar",
                        "36":"Telangana",
                        "37":"Andhrapradesh(New)",
                        "38":"Ladakh",
                    }];

                    var stCode = stCode.substring(0, 2);

                    if ( stCode in obj[0] ) {
                        $("#acc_gststate"+id).val(obj[0][stCode]);
                    }
                    else{
                        $("#acc_gststate"+id).val('');
                    }

                    return true;
                }
                else {
                    $.alert({
                        title: 'Warning!',
                        content: 'Please Enter Valid GSTIN Number',
                    });
                    $("#gstno"+id).val('');
                    $("#acc_gstAddressStreet"+id).val('');
                    $("#acc_gstcity"+id).val('');
                    $("#acc_gststate"+id).val('');
                    $("#acc_gstpostalcode"+id).val('');
                    $("#gstno"+id).focus();
                }
            }
        }
    }
    else if(hash && afterhash1=='#Account')
    {   
        $(".modal-container #invoice_summary").remove();
        if($(".modal-container").is(":visible"))
        {
            // Edit form which is loaded from clicking of full form button on edit popup
            var rec_present = 0;
            $.ajax({
                url: "../../client/res/templates/financial_changes/account_gst_fields_fetch.php?account_id="+hash,
                type: "post", 
                dataType: 'json',
                async: false,
                success: function(result)
                {
                    $("select[data-name='howmanygstdetails']").attr('id', 'account_gst_num');
                    $("select[data-name='doyouhavegstnum']").attr('name', 'have_gst');
                    $("div[data-name='doyouhavegstnum']").find('.field').append("<input type='hidden' id='gstpanelshow' value='None'>");
                    
                    if(result)
                    {
                        rec_present = 1;
                        $("button[data-action='save']").attr('onclick', 'getGSTVal(1)');
                        $(".middle").append(result);
                        $("textarea[data-name='description']").append("<input type='hidden' id='yeshasrec' value='1' />");
                    }
                    else
                    {
                        $("div[data-name='doyouhavegstnum']").find('.field').append("<input type='hidden' id='totalGSTCntChanged' value='0'>");
                        $("div[data-name='doyouhavegstnum']").find('.field').append("<input type='hidden' id='totalGSTCntChanged1' value='0'>");
                        $("select[data-name='howmanygstdetails']").attr('onchange', 'numof_GST(this.value, '+rec_present+')');

                        $("div[data-name='description']").find('.field').append('<input type="hidden" data-name="staticVal" id="totalGSTCnt1" value="None" /><input type="hidden" data-name="staticValChanged" id="totalGSTCntChanged1" value="0" /><input type="hidden" data-name="staticValChanged" id="rec_present" value="0" />');

                        $("button[data-action='save']").attr('onclick', 'getGSTVal(0)');
                        
                        if($("div[data-name='doyouhavegstnum'] .field").find('span').text() == 'Yes')
                        {
                            $("div[data-name='howmanygstdetails']").show();
                            $("div[data-name='howmanygstdetails'] .field").find('span').text('1');
                        }
                        else {
                            $("div[data-name='howmanygstdetails']").hide();
                        }
                    }
                    $("select[data-name='howmanygstdetails']").attr('onchange', 'numof_GST(this.value, '+rec_present+')');
                    //alert($(".middle").children("#last_child_panel_edit").length);
                }
            });
            if($("select[data-name='doyouhavegstnum']").val() == 'Yes')
            {   
                $("div[data-name='howmanygstdetails']").show();
                if(rec_present == 0)
                {
                    numof_GST(1);
                }
                else
                {
                    numof_GST($("#totalGSTCnt").val());
                }
            }
            
            $("select[data-name='doyouhavegstnum']").on("change", function(){
                if($(this).val() == 'Yes')
                {
                    $("div[data-name='howmanygstdetails']").show();
                    $("#gstpanelshow").val('None');
                    $("select[data-name='howmanygstdetails']").val('1');
                    $("#last_child_panel_edit").show();
                    if($("#yeshasrec").val())
                    {
                        if($("select[data-name='doyouhavegstnum']").is(":visible") && $("div[data-name='doyouhavegstnum']").find('a.inline-cancel-link').length == 0)
                        {
                             var str = '<div class="cell col-sm-6 form-group" data-name="howmanygstdetails"><a href="javascript:" class="pull-right inline-edit-link hidden"><span class="fas fa-pencil-alt fa-sm"></span></a><label class="control-label" data-name="howmanygstdetails"><span class="label-text">How many GST details to add ?</span></label><div class="field" data-name="howmanygstdetails"><select data-name="howmanygstdetails" class="form-control main-element"><option value="None">None</option>';
                             for(var m=1;m<38;m++)
                             {
                                var selected = '';
                                if(m==1) selected = ' selected';

                                str += '<option value="'+m+'"'+selected+'>'+m+'</option>';
                             }
                             str += '</select></div></div>';
                             $("div[data-name='doyouhavegstnum']").closest('.row').append(str);
                        }
                    }
                    numof_GST(1);
                }
                else
                {
                    $("div[data-name='howmanygstdetails']").hide();
                    $("#totalGSTCntChanged1").val('0');
                    $("#totalRec_new").val('0');
                    $("select[data-name='howmanygstdetails']").val('None');
                    if(rec_present == 0)
                    {
                        $("#last_child_panel_edit").remove();
                    }
                    else
                    {
                        $("#last_child_panel_edit").hide();
                    }
                }
            });

            $("div[data-name='howmanygstdetails']").click(function(){
                $("select[data-name='howmanygstdetails']").attr('onchange', 'numof_GST(this.value)');       
                $("select[data-name='howmanygstdetails']").attr('id', 'account_gst_num_edit');
                
                // Disable dropdown options upto already added count
                if($("#totalGSTCnt").val())
                {
                    $("select[data-name='howmanygstdetails'] option").filter(function() {
                        return parseInt($(this).val()) <= parseInt($("#totalGSTCnt").val());
                    }).prop('disabled', true);
                }
            });

            function numof_GST(num)
            {         
                if(num!='None')
                {
                    num = parseInt(num);
                    //$("#totalGSTCntChangedAdd").val(num);

                    //if($("#gstpanelshow").val() == 'None'){ alert("Hello");
                    if(parseInt($("#totalGSTCntChanged").val()) == 0){
                        $(".middle").append('<div id="last_child_panel_edit" class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">GST Details</h4></div><div class="panel-body panel-body-form" id="numofgst_edit"><div class="row" id="gst_no"></div></div></div>');
                    }
                    else if(!$("#totalGSTCntChanged").val())
                    {
                        $(".middle").append('<div id="last_child_panel_edit" class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">GST Details</h4></div><div class="panel-body panel-body-form" id="numofgst_edit"><div class="row" id="gst_no"></div></div></div>');
                    }

                    if($("#rec_present").val() == 1)
                    {   
                        if(num < parseInt($("#totalGSTCntChanged").val())){
                            var totalRemov = parseInt($("#totalGSTCntChanged").val()) - num;
                            $("#numofgst_edit > .gst").slice(-totalRemov).remove();
                            $("#totalGSTCntChanged").val(num);
                        }

                        var newNum = num - parseInt($("#totalGSTCntChanged").val());

                        var s = parseInt($("#totalGSTCntChanged").val());
                        var m = parseInt($("#totalGSTCntChanged").val()) + 1;
                    }
                    else
                    {  
                        if($("#totalGSTCntChanged1").val()){
                            var newNum = num - parseInt($("#totalGSTCntChanged1").val());

                            if(num < parseInt($("#totalGSTCntChanged1").val())){
                                var totalRemov = parseInt($("#totalGSTCntChanged1").val()) - num;
                                $("#numofgst_edit > .gst").slice(-totalRemov).remove();
                                $("#totalGSTCntChanged1").val(num);
                            }

                            var s = parseInt($("#totalGSTCntChanged1").val());
                            var m = parseInt($("#totalGSTCntChanged1").val()) + 1;    
                        } 
                        else
                        {
                            var newNum = num;
                            var s = num -1;
                            var m = num;   
                        }  
                    }
                    //alert(newNum);
                    for(var i=0;i < newNum;i++)
                    {
                        $("#numofgst_edit").append('<div class="row gst" id="gst_'+s+'_edit"><div class="cell col-sm-6 form-group" data-name="gstno'+s+'"><label class="control-label" data-name="gstno'+s+'">GST NO '+m+'</label><div class="field" data-name="gstno'+s+'"><input type="text" class="main-element form-control acc_gst" id="gstnoedit'+s+'" name="gstno_edit[]" data-name="gstno'+s+'" value="" maxlength="40" autocomplete="espo-gstno'+s+'" onblur="acc_getGST_state_edit(this.value, '+s+')"><div class="row"><div class="col-sm-4 col-xs-4"><button type="button" class="btn btn-danger" onclick="acc_editremoveGST_edit('+s+')"><span class="fas fa-trash-alt fa-sm"></span></button></div></div></div></div><div class="cell col-sm-6 form-group" data-name="acc_gstAddress'+s+'"><label class="control-label" data-name="acc_gstAddress'+s+'"><span class="label-text">Address '+m+'</span></label><div class="field" data-name="acc_gstAddress'+s+'"><textarea class="form-control auto-height" data-name="acc_gstAddressStreet'+s+'" id="acc_gstAddressStreetEdit'+s+'" name="acc_gstAddressStreet_edit[]" rows="1" placeholder="Street" autocomplete="espo-acc_gststreet'+s+'" maxlength="255"></textarea><div class="row"><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" id="acc_gstcityedit'+s+'" data-name="acc_gstAddressCity'+s+'" name="acc_gstAddressCity_edit[]" value="" placeholder="City" autocomplete="espo-acc_gstcity'+s+'" maxlength="255"></div><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" id="acc_gststateedit'+s+'" name="acc_gstAddressState_edit[]" data-name="acc_gstAddressState'+s+'" value="" placeholder="State" autocomplete="espo-acc_gststate'+s+'" maxlength="255"></div><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" id="acc_gstpostalcodeedit'+s+'" name="acc_gstAddressPostalCode_edit[]" data-name="acc_gstAddressPostalCode'+s+'" value="" placeholder="Postal Code" autocomplete="espo-acc_gstpostalCode'+s+'" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></div></div></div></div>');


                        $("#acc_gstpostalcodeedit"+i).keyup(function(){
                            limitText(this,6);
                        });

                        s++;
                        m++;

                        if($("#rec_present").val() == 1)
                        {
                            changed_num = $("#totalGSTCntChanged").val(num);
                        }
                        else
                        {
                            changed_num = $("#totalGSTCntChanged1").val(num);
                        }
                    }
                    $("#gstpanelshow").val(1);
                }
                else {
                    $("#totalGSTCntChanged1").val('');
                    $("#gstpanelshow").val('');
                    $("#totalGSTCntChanged1").val(0);
                    $("#totalGSTCntChanged1").val(0);
                    $("#gstpanelshow").val('None');
                    //$("#last_child_panel").hide();
                    //$("#numofgst_edit").closest('.panel-default').remove();
                    $("#numofgst_edit").hide();
                }
            }

            function acc_getGST_state_edit(stCode, id)
            {
                var inputvalues = stCode;
                var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');

                if(inputvalues == ""){
                }
                else{
                    if (gstinformat.test(inputvalues)) {
                        var obj = [{
                            "01":"Jammu and Kashmir",
                            "02":"Himachal Pradesh",
                            "03":"Punjab",
                            "04":"Chandigarh",
                            "05":"Uttarakhand",
                            "06":"Haryana",
                            "07":"Delhi",
                            "08":"Rajasthan",
                            "09":"Uttar Pradesh",
                            "10":"Bihar",
                            "11":"Sikkim",
                            "12":"Arunachal Pradesh",
                            "13":"Nagaland",
                            "14":"Manipur",
                            "15":"Mizoram",
                            "16":"Tripura",
                            "17":"Meghalaya",
                            "18":"Assam",
                            "19":"West Bengal",
                            "20":"Jharkhand",
                            "21":"Odisha",
                            "22":"Chhattisgarh",
                            "23":"Madhya Pradesh",
                            "24":"Gujarat",
                            "25":"Daman and Diu",
                            "26":"Dadra and Nagar Haveli",
                            "27":"Maharashtra",
                            "28":"Andhra Pradesh",
                            "29":"Karnataka",
                            "30":"Goa",
                            "31":"Lakshadweep",
                            "32":"Kerala",
                            "33":"Tamil Nadu",
                            "34":"Puducherry",
                            "35":"Andaman & Nicobar",
                            "36":"Telangana",
                            "37":"Andhrapradesh(New)",
                            "38":"Ladakh",
                        }];

                        var stCode = stCode.substring(0, 2);

                        if ( stCode in obj[0] ) {
                            $("#acc_gststateedit"+id).val(obj[0][stCode]);
                        }
                        else{
                            $("#acc_gststateedit"+id).val('');
                        }

                        return true;
                    }
                    else {
                        $.alert({
                            title: 'Warning!',
                            content: 'Please Enter Valid GSTIN Number',
                        });
                        $("#gstnoedit"+id).val('');
                        $("#acc_gstAddressStreetEdit"+id).val('');
                        $("#acc_gstcityedit"+id).val('');
                        $("#acc_gststateedit"+id).val('');
                        $("#acc_gstpostalcodeedit"+id).val('');
                        $("#gstnoedit"+id).focus();
                    }
                }
            }

            function acc_editremoveGST_edit(div_id)
            {
                $.confirm({
                    title: 'Warning',
                    content: 'Do you want to remove GST details?',
                    type: 'dark',
                    typeAnimated: true,
                    buttons: {
                        Ok: function() {
                            $("#gst_"+div_id+"_edit").remove();
                            var dropDownVal = $("#account_gst_num_edit").val();
                            if(dropDownVal==1){
                                // $("#account_gst_num_edit").val('None');
                                $("#last_child_panel_edit").remove();
                                $("select[data-name='doyouhavegstnum'] option").prop('selected', false); 
                                $("select[data-name='doyouhavegstnum'] option").prop('disabled', false); 
                                
                                $("select[data-name='doyouhavegstnum'] option[value='No']").prop("selected", true);
                                $("select[data-name='doyouhavegstnum']").val('No');
                                
                                $("div[data-name='howmanygstdetails']").remove();
                            }
                            else {
                                $("#account_gst_num_edit").val('');
                                var newDropDownVal = dropDownVal - 1;
                                $("#account_gst_num_edit option[value='"+newDropDownVal+"']").attr("selected", "selected");
                                $("#account_gst_num_edit").val(newDropDownVal);

                                $("select[data-name='howmanygstdetails'] option").prop('selected', false); 
                                $("select[data-name='howmanygstdetails'] option").prop('disabled', false); 
                                
                                $("select[data-name='howmanygstdetails'] option[value='"+newDropDownVal+"']").prop("selected", true);
                                
                                $("select[data-name='howmanygstdetails']").val(newDropDownVal);
                                
                                $('#account_gst_num_edit').filter(function() {
                                    return $(this).val() < (parseInt(newDropDownVal) - 1);
                                }).prop('disabled', true);

                                $("#totalGSTCntChanged").val(newDropDownVal);
                            }

                            /*$.ajax({
                                type    : "POST",
                                url     : "../../client/res/templates/financial_changes/remove_account_gst_details.php?account_id=".hash,
                                dataType  : "json",
                                processData : false,
                                contentType : false,
                                success: function(data){

                                }
                            });*/

                        },
                        Cancel: function() {
                        }
                    }
                });
            }
        }
    }
    
    function getGSTVal(rec_present='')
    {
        if($("#account_gst_num").val())
        {
            var totalgst = $("#account_gst_num").val();
        }
        else
        {
            var totalgst = $("#account_gst_num_edit").val();
        }
        //alert("rec_present => "+rec_present);return false;
        var flag = true;
        if(totalgst != 'None')
        {
            var zipRegex = /^\d{6}$/;
            if(rec_present === 1)
            {   
                var len = $("input[name='gstno_edit[]']").length;
                
                if($("input[data-name='name']").val() == "")
                {   
                    $("input[data-name='name']").css('border-color', '#ad4846');

                    $("button[data-action='save']").removeClass('disabled');
                    $("button[data-action='save']").removeAttr('disabled');
                    $("button[data-action='cancel']").removeClass('disabled');
                    $("button[data-action='cancel']").removeAttr('disabled');

                    $("input[data-name='name']").focus();
                    $("input[data-name='name']").attr('data-toggle', 'popover-name');
                    $('[data-toggle="popover-name"]').popover({
                        delay: {
                            "show": 500,
                            "hide": 100
                        },
                        content: 'Name required',
                        placement: 'bottom',
                    }).popover('show').on('shown.bs.popover', function () {
                        setTimeout(function (a) {
                            a.popover('hide');
                        }, 3000, $(this));
                    });

                    flag = false;
                }
                else if($("input[data-name='name']").val()!="")
                {
                    for(var i=0;i<len;i++)
                    {
                        if($("#gstnoedit"+i).val() == "")
                        {   
                            $("#gstnoedit"+i).css('border-color', '#ad4846');

                            $("button[data-action='save']").removeClass('disabled');
                            $("button[data-action='save']").removeAttr('disabled');
                            $("button[data-action='cancel']").removeClass('disabled');
                            $("button[data-action='cancel']").removeAttr('disabled');

                            $("#gstnoedit"+i).focus();
                            $("#gstnoedit"+i).attr('data-toggle', 'popover-gstnoedit'+i);
                            $('[data-toggle="popover-gstnoedit'+i+'"]').popover({
                                delay: {
                                    "show": 500,
                                    "hide": 100
                                },
                                content: 'Please enter GST number.',
                                placement: 'bottom'
                            }).popover('show').on('shown.bs.popover', function () {
                                setTimeout(function (a) {
                                    a.popover('hide');
                                }, 3000, $(this));
                            });

                            flag = false;
                        }
                        else if($("#gstnoedit"+i).val() != "")
                        {
                            if($("#acc_gstAddressStreetEdit"+i).val() == ""){
                                $("#acc_gstAddressStreetEdit"+i).css('border-color', '#ad4846');

                                $("button[data-action='save']").removeClass('disabled');
                                $("button[data-action='save']").removeAttr('disabled');
                                $("button[data-action='cancel']").removeClass('disabled');
                                $("button[data-action='cancel']").removeAttr('disabled');

                                $("#acc_gstAddressStreetEdit"+i).focus();
                                $("#acc_gstAddressStreetEdit"+i).attr('data-toggle', 'popover-acc_gstAddressStreetEdit'+i);
                                $('[data-toggle="popover-acc_gstAddressStreetEdit'+i+'"]').popover({
                                    delay: {
                                        "show": 500,
                                        "hide": 100
                                    },
                                    content: 'Please enter street.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                        a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag = false;
                            }
                            else if($("#acc_gstcityedit"+i).val() == "")
                            {
                                $("#acc_gstcityedit"+i).css('border-color', '#ad4846');
                                
                                $("button[data-action='save']").removeClass('disabled');
                                $("button[data-action='save']").removeAttr('disabled');
                                $("button[data-action='cancel']").removeClass('disabled');
                                $("button[data-action='cancel']").removeAttr('disabled');
                                
                                $("#acc_gstcityedit"+i).focus();
                                $("#acc_gstcityedit"+i).attr('data-toggle', 'popover-acc_gstcityedit'+i);
                                $('[data-toggle="popover-acc_gstcityedit'+i+'"]').popover({
                                    delay: {
                                        "show": 500,
                                        "hide": 100
                                    },
                                    content: 'Please enter city.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                        a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag = false;
                            }
                            else if($("#acc_gstpostalcodeedit"+i).val() == "")
                            {
                                $("#acc_gstpostalcodeedit"+i).css('border-color', '#ad4846');
                                
                                $("button[data-action='save']").removeClass('disabled');
                                $("button[data-action='save']").removeAttr('disabled');
                                $("button[data-action='cancel']").removeClass('disabled');
                                $("button[data-action='cancel']").removeAttr('disabled');
                                
                                $("#acc_gstpostalcodeedit"+i).focus();
                                $("#acc_gstpostalcodeedit"+i).attr('data-toggle', 'popover-acc_gstpostalcodeedit'+i);
                                $('[data-toggle="popover-acc_gstpostalcodeedit'+i+'"]').popover({
                                    delay: {
                                        "show": 500,
                                        "hide": 100
                                    },
                                    content: 'Please enter postal code.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                        a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag = false;
                            }
                            else if(!zipRegex.test($("#acc_gstpostalcodeedit"+i).val())) {
                                $("#acc_gstpostalcodeedit"+i).css('border-color', '#ad4846');
                                $("#acc_gstpostalcodeedit"+i).focus();

                                $("#acc_gstpostalcodeedit"+i).attr('data-toggle', 'popover-acc_gstpostalcodeedit'+i);
                                $('[data-toggle="popover-acc_gstpostalcodeedit'+i+'"]').popover({
                                    delay: {
                                        "show": 500,
                                        "hide": 100
                                    },
                                    content: 'Please enter valid postal code.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                        a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag = false;
                            }
                        }

                        $("input[data-name='name']").keyup(function(){
                            if($(this).length == 0){
                                $("#name").val('');
                            }
                            $(this).removeAttr('style');
                        });

                        $("#gstnoedit"+i).keyup(function(){
                            $(this).removeAttr('style');
                        });

                        $("#acc_gstAddressStreetEdit"+i).keyup(function(){
                            $(this).removeAttr('style');
                        });

                        $("#acc_gstcityedit"+i).keyup(function(){
                            $(this).removeAttr('style');
                        });

                        $("#acc_gststateedit"+i).keyup(function(){
                            $(this).removeAttr('style');
                        });

                        $("#acc_gstpostalcodeedit"+i).keyup(function(){
                            $(this).removeAttr('style');
                        });

                        $("input[name='name']").keyup(function(){
                            if($(this).length == 0)
                            {
                                $("input[name='name']").val('');
                            }
                            $(this).removeAttr('style');
                        });
                    }
                }
            }
            else
            {        
                if($("input[data-name='name']").val() == "")
                {   
                    $("input[data-name='name']").css('border-color', '#ad4846');

                    $("button[data-action='save']").removeClass('disabled');
                    $("button[data-action='save']").removeAttr('disabled');
                    $("button[data-action='cancel']").removeClass('disabled');
                    $("button[data-action='cancel']").removeAttr('disabled');

                    $("input[data-name='name']").focus();
                    $("input[data-name='name']").attr('data-toggle', 'popover-name');
                    $('[data-toggle="popover-name"]').popover({
                        delay: {
                            "show": 500,
                            "hide": 100
                        },
                        content: 'Name is required',
                        placement: 'bottom'
                    }).popover('show').on('shown.bs.popover', function () {
                        setTimeout(function (a) {
                            a.popover('hide');
                        }, 3000, $(this));
                    });

                    flag = false;
                }
                else if($("input[data-name='name']").val() != "")
                {
                    var len = $("input[name='gstno[]']").length;
                    for(var i=0;i<len;i++)
                    {
                        if($("#gstno"+i).val() == "")
                        {   
                            $("#gstno"+i).css('border-color', '#ad4846');

                            $("button[data-action='save']").removeClass('disabled');
                            $("button[data-action='save']").removeAttr('disabled');
                            $("button[data-action='cancel']").removeClass('disabled');
                            $("button[data-action='cancel']").removeAttr('disabled');

                            $("#gstno"+i).focus();
                            $("#gstno"+i).attr('data-toggle', 'popover-gstno'+i);
                            $('[data-toggle="popover-gstno'+i+'"]').popover({
                                delay: {
                                    "show": 500,
                                    "hide": 100
                                },
                                content: 'Please enter GST number.',
                                placement: 'bottom'
                            }).popover('show').on('shown.bs.popover', function () {
                                setTimeout(function (a) {
                                    a.popover('hide');
                                }, 3000, $(this));
                            });

                            flag = false;
                        }
                        else if($("#gstno"+i).val() != "")
                        {
                            if($("#acc_gstAddressStreet"+i).val() == ""){
                                $("#acc_gstAddressStreet"+i).css('border-color', '#ad4846');

                                $("button[data-action='save']").removeClass('disabled');
                                $("button[data-action='save']").removeAttr('disabled');
                                $("button[data-action='cancel']").removeClass('disabled');
                                $("button[data-action='cancel']").removeAttr('disabled');

                                $("#acc_gstAddressStreet"+i).focus();
                                $("#acc_gstAddressStreet"+i).attr('data-toggle', 'popover-acc_gstAddressStreet'+i);
                                $('[data-toggle="popover-acc_gstAddressStreet'+i+'"]').popover({
                                    delay: {
                                        "show": 500,
                                        "hide": 100
                                    },
                                    content: 'Please enter street.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                        a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag = false;
                            }
                            else if($("#acc_gstcity"+i).val() == "")
                            {
                                $("#acc_gstcity"+i).css('border-color', '#ad4846');
                                
                                $("button[data-action='save']").removeClass('disabled');
                                $("button[data-action='save']").removeAttr('disabled');
                                $("button[data-action='cancel']").removeClass('disabled');
                                $("button[data-action='cancel']").removeAttr('disabled');
                                
                                $("#acc_gstcity"+i).focus();
                                $("#acc_gstcity"+i).attr('data-toggle', 'popover-acc_gstcity'+i);
                                $('[data-toggle="popover-acc_gstcity'+i+'"]').popover({
                                    delay: {
                                        "show": 500,
                                        "hide": 100
                                    },
                                    content: 'Please enter city.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                        a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag = false;
                            }
                            else if($("#acc_gstpostalcode"+i).val() == "")
                            {
                                $("#acc_gstpostalcode"+i).css('border-color', '#ad4846');
                                
                                $("button[data-action='save']").removeClass('disabled');
                                $("button[data-action='save']").removeAttr('disabled');
                                $("button[data-action='cancel']").removeClass('disabled');
                                $("button[data-action='cancel']").removeAttr('disabled');
                                
                                $("#acc_gstpostalcode"+i).focus();
                                $("#acc_gstpostalcode"+i).attr('data-toggle', 'popover-acc_gstpostalcode'+i);
                                $('[data-toggle="popover-acc_gstpostalcode'+i+'"]').popover({
                                    delay: {
                                        "show": 500,
                                        "hide": 100
                                    },
                                    content: 'Please enter postal code.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                        a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag = false;
                            }
                            else if(!zipRegex.test($("#acc_gstpostalcode"+i).val())) {
                                $("#acc_gstpostalcode"+i).css('border-color', '#ad4846');
                                $("#acc_gstpostalcode"+i).focus();

                                $("#acc_gstpostalcode"+i).attr('data-toggle', 'popover-acc_gstpostalcode'+i);
                                $('[data-toggle="popover-acc_gstpostalcode'+i+'"]').popover({
                                    delay: {
                                        "show": 500,
                                        "hide": 100
                                    },
                                    content: 'Please enter valid postal code.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                        a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag = false;
                            }
                        }

                        $("input[data-name='name']").keyup(function(){
                            if($(this).length == 0){
                                $("#name").val('');
                            }
                            $(this).removeAttr('style');
                        });

                        $("#gstno"+i).keyup(function(){
                            $(this).removeAttr('style');
                        });

                        $("#acc_gstAddressStreet"+i).keyup(function(){
                            $(this).removeAttr('style');
                        });

                        $("#acc_gstcity"+i).keyup(function(){
                            $(this).removeAttr('style');
                        });

                        $("#acc_gststate"+i).keyup(function(){
                            $(this).removeAttr('style');
                        });

                        $("#acc_gstpostalcode"+i).keyup(function(){
                            $(this).removeAttr('style');
                        });

                        $("input[name='name']").keyup(function(){
                            if($(this).length == 0)
                            {
                                $("input[name='name']").val('');
                            }
                            $(this).removeAttr('style');
                        });
                    }
                }
            }
            
            if(flag == false)
            {
                return false;
            }
            else
            {
                var tot_len = $("input[name='gstno[]']").length;
                if(rec_present == 1)
                {
                    var hidfld_val = $("#totalGSTCnt").val();
                }
                else
                {
                    var hidfld_val = $("#totalGSTCnt1").val();
                }

                var formdata = $('form');
                form      = new FormData(formdata[0]);

                form.append('have_gst', $("select[data-name='doyouhavegstnum']").val()); 
                
                if(tot_len == hidfld_val)
                { 
                    form.append('number_of_gst', hidfld_val);
                }
                else
                { 
                    if($("select[data-name='howmanygstdetails']").val() == 'None'){
                        var howMany_gst = $("select[data-name='howmanygstdetails']").val();
                    }
                    else {
                        if($("select[data-name='howmanygstdetails']").val()!="")
                        {
                            var howMany_gst = parseInt($("select[data-name='howmanygstdetails']").val());
                        }
                        else
                        {
                            var howMany_gst = ($("#totalRec_new").val()!=0) ? parseInt($("#totalRec_new").val()) : 'None';
                        }
                    }
                    form.append('number_of_gst', howMany_gst);
                }

                if(hash)
                {
                    $("input[name='gstno_edit[]']").each(function() {
                      form.append('gstno_edit[]', $(this).val()); 
                    });
                    $("textarea[name='acc_gstAddressStreet_edit[]']").each(function() {
                      form.append('acc_gstAddressStreet_edit[]', $(this).val()); 
                    });
                    $("input[name='acc_gstAddressCity_edit[]']").each(function() {
                      form.append('acc_gstAddressCity_edit[]', $(this).val()); 
                    });
                    $("input[name='acc_gstAddressState_edit[]']").each(function() {
                      form.append('acc_gstAddressState_edit[]', $(this).val()); 
                    });
                    $("input[name='acc_gstAddressPostalCode_edit[]']").each(function() {
                      form.append('acc_gstAddressPostalCode_edit[]', $(this).val()); 
                    });
                }
                else
                {   
                    $("input[name='gstno[]']").each(function() {
                      form.append('gstno[]', $(this).val()); 
                    });
                    $("textarea[name='acc_gstAddressStreet[]']").each(function() {
                      form.append('acc_gstAddressStreet[]', $(this).val()); 
                    });
                    $("input[name='acc_gstAddressCity[]']").each(function() {
                      form.append('acc_gstAddressCity[]', $(this).val()); 
                    });
                    $("input[name='acc_gstAddressState[]']").each(function() {
                      form.append('acc_gstAddressState[]', $(this).val()); 
                    });
                    $("input[name='acc_gstAddressPostalCode[]']").each(function() {
                      form.append('acc_gstAddressPostalCode[]', $(this).val()); 
                    });
                }

                /*for (var value of form.values()) {
                    console.log(value); 
                }
                return false;*/

                if($("select[data-name='doyouhavegstnum']").val() == 'Yes')
                {
                    $.ajax({
                        type    : "POST",
                        url     : "../../client/res/templates/financial_changes/account_gst_fields.php",
                        dataType  : "json",
                        processData : false,
                        contentType : false,
                        data:form,
                        success: function(data){

                        }
                    });
                }
            }
        }
        //alert("Save button is clicked");return false;
    }
</script>
<!-- Script for GST fields on create account form -->