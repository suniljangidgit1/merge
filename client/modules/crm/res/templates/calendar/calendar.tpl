<link href="{{basePath}}client/modules/crm/css/fullcalendar.css" rel="stylesheet">
<link href="{{basePath}}client/modules/crm/css/fullcalendar.print.css" rel="stylesheet" media="print">
<style type="text/css">
    .popover_pos{
        top:20% !important;
    }

    .popover_pos_bottom{
        top:66% !important;
    }
</style>
{{#if header}}
<div class="row button-container">
    <div class="col-sm-4 col-xs-5">
        <div class="btn-group range-switch-group">
            <button class="btn btn-text btn-icon" data-action="prev"><span class="fas fa-chevron-left"></span></button>
            <button class="btn btn-text btn-icon" data-action="next"><span class="fas fa-chevron-right"></span></button>
        </div>
        <button class="btn btn-text strong" data-action="today" title="{{todayLabel}}">
            <span class="hidden-sm hidden-xs">{{todayLabel}}</span><span class="visible-sm visible-xs">{{todayLabelShort}}</span>
        </button>

        <button class="btn btn-text{{#unless isCustomView}} hidden{{/unless}} btn-icon" data-action="editCustomView" title="{{translate 'Edit'}}"><span class="fas fa-pencil-alt fa-sm"></span></button>

    </div>

    <div class="date-title col-sm-4 col-xs-7"><h4><span style="cursor: pointer;" data-action="refresh" title="{{translate 'Refresh'}}"></span></h4></div>

    <div class="col-sm-4 col-xs-12">
        <div class="btn-group pull-right mode-buttons">
            {{{modeButtons}}}
        </div>
    </div>
</div>
{{/if}}

<div class="calendar"></div>


<script type="text/javascript">

// create datable object
var tb = $("#todaysListingTable").dataTable();

// Get calendar data
function getCalendarTaskData( calendarDate = "", parameters = false ) {

    var filterUser = $(".users").val();
    var filterTeam = $(".teams").val();

    $.ajax({
        url         : "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
        type        : "GET",
        dataType    : "JSON",
        data        : { methodName : "getCalendarTaskData", parameters : parameters, filterUser : filterUser, filterTeam : filterTeam, calendarDate : calendarDate },
        // processData : false,
        // contentType : false,
        success     : function(response) {
            
            if( response.status == "true" ){

                if( parameters == false ){
                    $(".getCalendarTaskData .count").html(response.data.count);
                }else{
                    tb.dataTable().fnClearTable();
                    tb.dataTable().fnDestroy();
                    $("#todaysListing").modal("show");
                    $("#todaysListing .modal-title").html("Tasks");
                    $("#todaysListing .append_rows").html(response.data.html);
                    $("#todaysListingTable").dataTable();
                }
            
            }else{
                //console.log(response.msg);
            }
        },
    });

    $(".getCalendarTaskData").data( "date", calendarDate );
}

// Get calendar data
function getCalendarMeetingsData( calendarDate = "", parameters = false ) {

    var filterUser = $(".users").val();
    var filterTeam = $(".teams").val();

    $.ajax({
        url         : "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
        type        : "GET",
        dataType    : "JSON",
        data        : { methodName : "getCalendarMeetingsData", parameters : parameters, filterUser : filterUser, filterTeam : filterTeam, calendarDate : calendarDate },
        // processData : false,
        // contentType : false,
        success     : function(response) {
            
            // console.log(response);
            if( response.status == "true" ){

                if( parameters == false ){
                    $(".getCalendarMeetingsData .count").html(response.data.count);
                }else{
                    tb.dataTable().fnClearTable();
                    tb.dataTable().fnDestroy();
                    $("#todaysListing").modal("show");
                    $("#todaysListing .modal-title").html("Meetings");
                    $("#todaysListing .append_rows").html(response.data.html);
                    $("#todaysListingTable").dataTable();
                }

            }else{
                //console.log(response.msg);
            }
        },
    });

    $(".getCalendarMeetingsData").data( "date", calendarDate );
}

// Get calendar data
function getCalendarCallsData( calendarDate = "", parameters = false ) {

    var filterUser = $(".users").val();
    var filterTeam = $(".teams").val();

    $.ajax({
        url         : "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
        type        : "GET",
        dataType    : "JSON",
        data        : { methodName : "getCalendarCallsData", parameters : parameters, filterUser : filterUser, filterTeam : filterTeam, calendarDate : calendarDate },
        // processData : false,
        // contentType : false,
        success     : function(response) {
            
            // console.log(response);
            if( response.status == "true" ){

                if( parameters == false ){
                    $(".getCalendarCallsData .count").html(response.data.count);
                }else{
                    tb.dataTable().fnClearTable();
                    tb.dataTable().fnDestroy();
                    $("#todaysListing").modal("show");
                    $("#todaysListing .modal-title").html("Calls");
                    $("#todaysListing .append_rows").html(response.data.html);
                    $("#todaysListingTable").dataTable();
                }

            }else{
                //console.log(response.msg);
            }
        },
    });

    $(".getCalendarCallsData").data( "date", calendarDate );
}


$(document).on("mouseenter", ".fc-day-number", function() {
    $('.fc-day-number').not(this).popover('hide');
    $(".fc-day-top .fc-day-number").attr({
        "data-toggle": "popover",
        "data-placement": "right",
        "data-trigger": "click"
    });
    
    $("#nofitication").css("display", "none");

    $('[data-toggle=popover]').popover({
        html: true,
        trigger: "click",
        container: 'body',
        content: "<div class='getCalendarTaskData' style='font-size:10px !important;display:inline-block;padding-bottom:4px;' data-date='' ><a href='javascript:void(0);'><b>Tasks</b> - <span class='count' >0 </a> </span></div><br><div class='getCalendarMeetingsData' style='font-size:10px !important;display:inline-block;padding-bottom:4px;' data-date='' ><a href='javascript:void(0);'><b>Meetings</b> - <span class='count' >0 </a> </span></div><br><div class='getCalendarCallsData' style='font-size:10px !important;display:inline-block;' data-date='' ><a href='javascript:void(0);'><b>Calls</b> - <span class='count' >0 </a> </span></div>"
    });

});

$(document).on("click", ".fc-day-number", function() {
    $(".fc-day-top .fc-day-number").attr({
        "data-toggle": "popover",
        "data-placement": "right",
        "data-trigger": "click"
    });

    $("#nofitication").css("display", "none");

    var calendarDate = $(this).parent(".fc-day-top").data("date");
    getCalendarMeetingsData( calendarDate );
    getCalendarTaskData( calendarDate );
    getCalendarCallsData( calendarDate );
    
});

// on click get list for datatable 

$(document).on("click", ".getCalendarTaskData a", function() {
    var calendarDate = $(this).parent(".getCalendarTaskData").data("date");
    getCalendarTaskData( calendarDate, true );
    $(".popover").remove();
});

$(document).on("click", ".getCalendarMeetingsData a", function() {
    var calendarDate = $(this).parent(".getCalendarMeetingsData").data("date");
    getCalendarMeetingsData( calendarDate, true );
    $(".popover").remove();
});

$(document).on("click", ".getCalendarCallsData a", function() {
    var calendarDate = $(this).parent(".getCalendarCallsData").data("date");
    getCalendarCallsData( calendarDate, true );
    $(".popover").remove();
});

</script>

<!-- Calender popover UI script start -->

<script type="text/javascript">
    
    $(document).on("click", ".dashlets div[data-name='Calendar'] .panelhdrradius .action", function(){
        $(".popover").remove();
    });

    $(document).on('click',".dashboard-tabs .btn",function(){
        $(".popover").remove();
    });

</script>

<!-- Calender popover UI script end  -->