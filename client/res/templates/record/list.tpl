<!-- Added margin-bottom for search container While No Data list are displayed Script Start-->
<script type="text/javascript">
  var list_container_data = $('.list-container .No_data').text();
  var list_container_data_str = $.trim(list_container_data);
  var currentLocation_listbtn = window.location.hash;
  if(list_container_data_str == 'No Data'){
     $('.search-container').css({'margin-bottom':'15px','border-radius':'0px 0px 15px 15px'});

     if(currentLocation_listbtn == '#MyCampaigns')
    {
        var sent_messages = '<a href="#SentMessages" type="button" class="btn btn-primary" id="sent_messages" style="position: relative; display: none;margin-bottom:15px;">Executed Campaigns</a>';
        $(".search-container").append(sent_messages);
    }
    if(currentLocation_listbtn == '#SMSReminder')
    {
        var sent_sms_campaigns = '<a href="#SendSMSData" type="button" class="btn btn-primary" id="sent_sms" style="position: relative; display: none;margin-bottom:15px;">Sent SMS Data</a>';
        $(".search-container").append(sent_sms_campaigns);
    }
    if(currentLocation_listbtn == '#EmailReminder')
    {
        var sent_email_campaigns = '<a href="#SentEmailReminder" type="button" class="btn btn-primary" id="sent_email" style="position: relative; display:none;margin-bottom:15px;">Sent Email Data</a>';
        $(".search-container").append(sent_email_campaigns);
    }
    if(currentLocation_listbtn == '#Task')
    {
        var show_closed_task = '<a href="#ClosedTask" type="button" class="btn btn-primary" id="show_closed" style="position: relative; display: inline-block;margin-bottom:15px;">Show Closed Data</a>';
        $(".search-container #headerbtns").html(show_closed_task);
    }
  }
  else{
    $('.search-container').css({'margin-bottom':'0px','border-radius':'0px'});
    if(currentLocation_listbtn == '#MyCampaigns')
    {
        $(".search-container #sent_messages").remove();
    }
    if(currentLocation_listbtn == '#SMSReminder')
    {
        $(".search-container #sent_sms").remove();
    }
    if(currentLocation_listbtn == '#EmailReminder')
    {
        $(".search-container #sent_email").remove();
    }
    if(currentLocation_listbtn == '#Task')
    {
        $(".search-container #show_closed").remove();
    }
  }
</script>
<!-- Added margin-bottom for search container While No Data list are displayed Script End-->

<!-- Custom Export Form Hide and Show Script Start--> 
<script type="text/javascript">
  var afterhash = window.location.hash;

//hide filter in expot result
if(afterhash=='#ExportResult'){
    $(".add-filter-button").css('display','none');
}

if(afterhash !='#Export'){
    $('.export_form').css("display","none");

}else{
    $('.export_form').css("display","block");
}

/*Custom Export Form Hide and Show Script End */

/*Custom Holiday Calender Form Hide and Show Script Start */

if(afterhash !='#HolidayCalender'){
    $('.holiday_calender').css("display","none");

}else{
    $('.holiday_calender').css("display","block");
}

/*Custom Holiday Calender Form Hide and Show Script End */


</script>




{{#if collection.models.length}}

{{#if topBar}}
<div class="list-buttons-container clearfix">
    {{#if paginationTop}}
    <div>
        {{{pagination}}}
    </div>
    {{/if}}

    {{#if displayActionsButtonGroup}}
    <div class="btn-group actions">
        {{#if massActionList}}
        <button type="button" class="btn btn-primary dropdown-toggle actions-button hidden" data-toggle="dropdown">
        {{translate 'Actions'}}
        <span class="caret"></span>
        </button>
        {{/if}}
        {{#if buttonList.length}}
        {{#each buttonList}}
            {{button name scope=../../scope label=label style=style hidden=hidden}}
        {{/each}}
        {{/if}}
        <div class="btn-group">
            {{#if dropdownItemList.length}}
            <button type="button" class="btn btn-text dropdown-toggle dropdown-item-list-button" data-toggle="dropdown">
                <span class="fas fa-ellipsis-h"></span>
            </button>
            <ul class="dropdown-menu pull-left">
                {{#each dropdownItemList}}
                {{#if this}}
                <li class="{{#if hidden}}hidden{{/if}}"><a href="javascript:" class="action" data-action="{{name}}">{{#if html}}{{{html}}}{{else}}{{translate label scope=../../../entityType}}{{/if}}</a></li>
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
        {{#if massActionList}}
        <ul class="dropdown-menu actions-menu">
            {{#each massActionList}}
            {{#if this}}
            <li><a href="javascript:" data-action="{{./this}}" class='mass-action'>{{translate this category="massActions" scope=../../scope}}</a></li>
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

    <div class="sticked-bar hidden">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle actions-button hidden" data-toggle="dropdown">
            {{translate 'Actions'}}
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu actions-menu">
                {{#each massActionList}}
                {{#if this}}
                <li><a href="javascript:" data-action="{{./this}}" class='mass-action'>{{translate this category="massActions" scope=../../scope}}</a></li>
                {{else}}
                {{#unless @first}}
                {{#unless @last}}
                <li class="divider"></li>
                {{/unless}}
                {{/unless}}
                {{/if}}
                {{/each}}
            </ul>
        </div>
        
    </div>
    <a  href="#ClosedTask" type="button"  class="btn btn-primary" id="show_closed" style="position:relative;display:none;"  >Show Closed Data</a>

    <a href="#SentEmailReminder" type="button" class="btn btn-primary" id="sent_email" style="position:relative;display: none;">Sent Email Data</a>

    <a href="#SendSMSData" type="button" class="btn btn-primary" id="sent_sms" style="position: relative; display: none;">Sent SMS Data</a>

    <a href="#SentMessages" type="button" class="btn btn-primary" id="sent_messages" style="position: relative; display: none;">Executed Campaigns</a>

    {{/if}}
   
    {{#if displayTotalCount}}
        <div class="text-muted total-count">
        {{translate 'Total'}}: <span class="total-count-span">{{totalCountFormatted}}</span>
        </div>
    {{/if}}
</div>
{{/if}}

<div class="list">
    <table class="table">
        {{#if header}}
        <thead class="schedularth">
            <tr>
                {{#if checkboxes}}
                <th width="40" data-name="r-checkbox">
                    <span class="select-all-container"><input type="checkbox" class="select-all"></span>
                    {{#unless checkAllResultDisabled}}
                    <div class="btn-group checkbox-dropdown">
                        <a class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:" data-action="selectAllResult">{{translate 'Select All Results'}}</a></li>
                        </ul>
                    </div>
                    {{/unless}}

                </th>
                {{/if}}
                {{#each headerDefs}}
                <th {{#if width}} width="{{width}}"{{/if}}{{#if align}} style="text-align: {{align}};"{{/if}}>
                    {{#if this.isSortable}}
                        <a href="javascript:" class="sort" data-name="{{this.name}}">{{label}}</a>
                        {{#if this.isSorted}}{{#unless this.isDesc}}<span class="fas fa-chevron-down fa-sm"></span>{{else}}<span class="fas fa-chevron-up fa-sm"></span>{{/unless}}{{/if}}
                    {{else}}{{label}}{{/if}}
                </th>
                {{/each}}
            </tr>
        </thead>
        {{/if}}
        <tbody>
        {{#each rowList}}
            <tr data-id="{{./this}}" class="list-row">
            {{{var this ../this}}}
            </tr>
        {{/each}}
        </tbody>
    </table>
    {{#unless paginationEnabled}}
    {{#if showMoreEnabled}}
    <div class="show-more{{#unless showMoreActive}} hide{{/unless}}">
        <a type="button" href="javascript:" class="btn btn-default btn-block" data-action="showMore" {{#if showCount}}title="{{translate 'Total'}}: {{totalCountFormatted}}"{{/if}}>
            {{#if showCount}}
            <div class="pull-right text-muted more-count">{{moreCountFormatted}}</div>
            {{/if}}
            <span>{{translate 'Show more'}}</span>
        </a>
    </div>
    {{/if}}
    {{/unless}}
</div>

{{#if bottomBar}}
<div>
{{#if paginationBottom}} {{{pagination}}} {{/if}}
</div>
{{/if}}

{{else}}
    <div class="No_data">
    {{translate 'No Data'}}
    </div>
{{/if}}

<!-- Custom Export Form Code Start -->
<div class="export_form" style="display: none;">
    <form id="form_export" name="form_export" method="post" >
        <div class="export-container">
            <div class="panel panel-default panelradius">
                <div class="panel-heading panelhdrradius">
                <h4 class="panel-title">What to Export?</h4>
            </div>
            <div class="panel-body panel-body-form">
                <div class="row">
                    <div class="col-sm-4 form-group cell">
                        <label class="control-label">Entity Type</label>
                        <select id="export-entity-type" name="export-entity-type" class="form-control">
                            {{!--<option value="" >Please select entity</option>--}}
                        </select>
                    </div>
                    <div class="col-sm-4 form-group cell">
                        <label class="control-label">Description</label>
                        <input class="form-control" type="text" id="export_description" name="export_description" placeholder="Description">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default panelradius">
            <div class="panel-heading panelhdrradius">
                <h4 class="panel-title">Field List</h4>
            </div>
            <div class="panel-body panel-body-form">
                <div id="export-properties">
                    <div class="row">
                        <div class="col-sm-12 form-group cell">
                            <div style="margin-bottom: 80px;">
                                <select multiple id="entity_columns" name="entity_columns[]" class="form-control">
                                    <option value="">Please choose fields</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group cell">
                            <label class="control-label">Export All Fields</label>
                        <div>
                        <input type="checkbox" id="export_all" name="export_all" value="yes">
                    </div>
                </div>
                <!-- <div class="col-sm-4 form-group cell">
                    <label class="control-label">Execute in idle (For big data; via cron)</label>
                    <div>
                        <input type="checkbox" id="cron_job" name="cron_job" value="yes">
                    </div>
                </div> -->
            </div>
        </div>
        </div>
        </div>
            <div style="padding-bottom: 10px;" class="clearfix">
                <button class="btn btn-success pull-right" id="export_csv" name="export_csv" >Export Field</button>
            </div>
        </div>
    </form>
</div>
<!-- Custom Export Form Code End -->

<!-- Custom Holiday Calender Form Code Start -->

<section class="holiday_calender">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-9 col-lg-7">
            <!-- <div>
               <h3 class="header-title"><span class="material-icons">receipt</span>Holiday Calendar</h3>
            </div> -->
            <form action="" method="" id="registerForm" >

               <div class="button-group button-container" id="save_btns">
                  <button type="button" class="btn btn-primary save" onclick=" checkBranches()">Save</button>

                  <button type="button" class="btn btn-default cancel" onclick="cancel()">Cancel</button>
               </div>
               <div class="button-group button-container display_none" id="edit_btns" >
                  <button type="button" class="btn btn-primary edit" onclick="editable()">Edit</button>
               </div>
               <div class="panel-append">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h5  class="branch_label">Select Branch <span class="required-sign"> *</span></h5>
                        <div class="row borderbottom">
                           <div class="col-xs-9 col-md-9">
                              <div class="form-group branch_group">
                                 <select class="form-control branch" placeholder="Select Branch" name="branch_field[0]" id="branch_field[0]">
                                 </select>
                                 <span class="empty text-danger display_none">Please Select Branch</span>
                              </div>
                              <!-- for edit  -->
                              <span class="branch_copy clone-element calender-heading branch_name_header"></span>
                           </div>
                           <div class="col-xs-3 col-md-3">
                              <div class="pull-right">

                                 <button type="button" class="btn btn-primary" onclick="holiday_export(this)">Export</button>
                              </div>
                           </div>
                        </div>

                     </div>
                     <div class="panel-body panel-body-form">
                        <div class="row">
                           <div class="col-xs-10 col-md-10">
                              <h5 class="calender-heading">Yearly Calendar</h5>
                           </div>
                           <div class="col-xs-2 col-md-2">
                              <div class="panel_delete_icon pull-right">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-xs-5 col-md-5">
                              <h5>Date<span class="required-sign"> *</span></h5>
                           </div>
                           <div class="col-xs-5 col-md-5">
                              <h5>Name of Holiday<span class="required-sign"> *</span></h5>
                           </div>
                        </div>
                        <div class="holidays-append">
                           <div class="holidays-main">
                              <div class="row">
                                 <div class="col-xs-5 col-md-5">
                                    <div class="form-group date_group">
                                       <div class='input-group date' id="datepicker0">
                                          <input type='text' class="form-control date date_input select_date" placeholder="Select Date " name="date_field[0][0]" id="date_field[0][0]" onkeydown="return false"  onclick="dateOnChange(this)" />
                                          <span class="input-group-addon">
                                          <span class="material-icons-outlined btn-default_gray" onclick="dateOnChange(this)">date_range</span>
                                          </span>
                                       </div>
                                       <span class="empty text-danger display_none">Please Select Date</span>
                                       
                                    </div>

                                    <!-- for edit -->
                                    <input type="text"  class="form-control date_copy clone-element" name="" readonly>

                                 </div>
                                 <div class="col-xs-3 col-md-5">
                                    <div class="form-group holiday_group">

                                       <input type="text" class="form-control holiday_input" placeholder="Enter Holiday" name="holiday_field[0][0]" id="holiday_field[0][0]">

                                       <!-- for edit -->
                                       <input type="text" class="form-control holiday_copy clone-element" name="" readonly>
                                       <span class="empty text-danger display_none">Please Enter Name of Holiday</span>
                                    </div>
                                 </div>
                                 <div class="col-xs-4 col-md-2">
                                    <div class="icon-group">
                                       <button type="button" class="btn btn-primary addBtn" onclick="add_yearly_holiday(this)"><span  class="material-icons-outlined">add</span></button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="weekly-off-section">
                           <div class="row">
                              <div class="col-xs-12 col-md-12">
                                 <h5>Weekly Off<span class="required-sign"> *</span></h5>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-xs-9 col-md-9">
                                 <div class="weekly-off-main">
                                    <div class="form-group weekly_group">
                                       <div class="input-group">
                                          <select class="form-control weekly" data-placeholder="Select Day" name="weekly_field[0][]" id="weekly_field[0][]" multiple>
                                             <option value="" disabled>Select Day</option>
                                             <option value="Monday">Monday</option>
                                             <option value="Tuesday">Tuesday</option>
                                             <option value="Wednesday">Wednesday</option>
                                             <option value="Thursday">Thursday</option>
                                             <option value="Friday">Friday</option>
                                             <option value="Saturday">Saturday</option>
                                             <option value="Sunday">Sunday</option>
                                          </select>
                                          <span class="input-group-addon">
                                          <span class="material-icons-outlined week_down_arrow btn-default_gray">arrow_drop_down</span>
                                          </span>
                                       </div>
                                       <span class="empty text-danger display_none">Please Select Day</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xs-3 col-md-3">
                                 <div class="pull-right">
                                    <button type="button" class="btn btn-primary duplicate" onclick="duplicate_panel(this)">Duplicate</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <div class="text-center">
               <button id="btnAdd" type="button"  class="btn btn-primary"><span  class="material-icons-outlined">add</span>&nbsp; Add Branch&nbsp;</button>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Custom Holiday Calender Form Code End -->

<!-- Selectize Script for field for Export data Start --> 

<script type="text/javascript">
    
    var selectizeCustom = null;
    
    var afterhash = window.location.hash;
    
    if(afterhash =='#Export'){
        $('.No_data').css("display","none");
    }

    if(afterhash =='#HolidayCalender'){
        $('.No_data').css("display","none");
    }

    $(function() {
        $('#entity_columns').selectize({
            plugins: ['remove_button'],
        });
    });
    
    // 15-05-2020 : Sunil Jangid
    
    $( document ).ready(function() {
        getDynamicEntity();
    });
    
    // To get dynamic entity list
    function getDynamicEntity(){
        
        $.ajax({
            "type"      : "get",
            "url"       : "../../../../client/res/templates/export_custom/getEntity.php",
            "dataType"  : "json",
            success     : function (response){
                
                $("#export-entity-type").html('');
                
                $("#export-entity-type").append('<option value="" >Please select entity</option>');
                
                if( response.status == "true" ){
                
                    $.each(response.data, function (key, val) {
                    
                        $("#export-entity-type").append('<option value="'+val+'" >'+val+' </option>');
                    });
                }
            },
        });
        
    }
        
    // To get dynamic entity columns list
    $(document).on( "change", "#export-entity-type", function(){ 
        
        var entityName = $(this).val();
        
        if( entityName != "" ){

            $.ajax({

                "url"       : "../../client/res/templates/export_custom/getEntityColumns.php",
                "type"      : "get",
                "dataType"  : "json",
                "data"      : { "entityName" : entityName },
                "success"   : function(response){
                    
                    if( response.status == "true" && response.data.length != "0" ){
                        
                        // console.log("length -> "+response.data.length );
                        
                        var option = '<option value="">Please choose fields</option>';
                        $.each( response.data, function( key, value ) {
                            
                            option = option+'<option value="'+key+'" >'+value+'</option>';
                            
                        });
                        
                        $("#entity_columns").empty();
                        $("#entity_columns")[0].selectize.destroy();
                        $("#entity_columns").html(option);
                        $('#entity_columns').selectize({
                            plugins: ['remove_button'],
                        });
                        
                    }else{
                        $("#entity_columns").empty();
                        $("#entity_columns")[0].selectize.destroy();
                        $("#entity_columns").html('<option value="">Please choose fields</option>');
                        $('#entity_columns').selectize({
                            plugins: ['remove_button'],
                        });
                    }
                },

            });
        }else{
            
            $("#entity_columns").empty();
            $("#entity_columns")[0].selectize.destroy();
            $("#entity_columns").html('<option value="">Please choose fields</option>');
            $('#entity_columns').selectize({
                plugins: ['remove_button'],
            });
        }
    });
        
    
    // Export CSV
    var exportCount = 0;
    $(document).on( "click", "#export_csv", function(event){
        
        event.preventDefault();
        //exportCount++;
        
        if($("#export-entity-type").val() == "" && exportCount == 0 ){
            var cnt = 0;
            if( exportCount == "0" && cnt == "0" ){
                // $.confirm("Please entity or fields!");
                cnt++;
            }
            return false;
        
        }
        if( exportCount == "0"){
            
            exportCount = 1;
            
            var entity_type         = $("#export-entity-type").val();
            var entity_columns      = $("#entity_columns").val();
            var export_description  = $("#export_description").val();
            var export_all          = null;
            var cron_job            = null;
            
            if($("#export_all").prop("checked") == true){
                export_all = "yes";
            }
            
            if( $("#cron_job").prop("checked") == true ){
                cron_job = "yes";
            }
            
            var form  = $("#form_export");
            // var url   = form.attr('action');
            form      = new FormData(form[0]);
            
            $.ajax({
               "url"        : "../../client/res/templates/export_custom/exportCsv.php",
                "type"      : "post",
                "dataType"  : "json",
                "data"      : form,
                "processData" : false,
                "contentType" : false,
                "success"   : function(response){
                    
                    //$.confirm(response.msg);
                    if( response.status == "true" ){
                        getDynamicEntity();
                        
                        $("#export_description").val("");
                        
                        $("#entity_columns").empty();
                        $("#entity_columns")[0].selectize.destroy();
                        $("#entity_columns").html('<option value="">Please choose fields</option>');
                        $('#entity_columns').selectize({
                            plugins: ['remove_button'],
                        });
                        
                        $('input:checkbox').removeAttr('checked');
                        exportCount = 0;

                        $.alert({
                            title: 'Success!',
                            content: response.msg,
                            type: 'dark',
                            typeAnimated: true,
                            buttons: {
                              OK: function () {
                                  
                                var tableId = ''
                                tableId = response.tableId;
                                window.location.href = "../../client/res/templates/export_custom/downloadExportCsv.php?tableId="+tableId;
                              },
                              
                            }
                          });
                        window.location = "#ExportResult";
                    }
                    else
                    {
                        $.alert({
                            title: 'Alert!',
                            content: response.msg,
                            type: 'dark',
                            typeAnimated: true,
                          });
                         exportCount = 0;
                    }                    
                }
            });
        }
        
        
       // exportCount++;
    });
    
    // 15-05-2020 : Sunil Jangid
    
</script>

 <!-- Selectize Script for field for Export data End -->

<script type="text/javascript">
    function pop_upForTask(url)
    {
         var url="/#ClosedTask";
                    window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=900,height=700,directories=no,location=no') 
    }

</script>

<script>
    //Email Sent Data
    var currentLocation = window.location.hash;
    // alert(currentLocation);
    if(currentLocation == '#EmailReminder')
    {
        //document.getElementById("sent_email").style.display = "inline-block";
        $("#sent_email").css("display","inline-block");
    }
    

    // Sent SMS Data
    if(currentLocation == '#SMSReminder')
    {
        // alert("IN SMSReminder IF BLOCK");
        //document.getElementById("sent_sms").style.display = "inline-block";
        $("#sent_sms").css("display","inline-block");
    }

    // Sent Messages
    if(currentLocation == '#MyCampaigns')
    {
        // alert("IN SMSReminder IF BLOCK");
        //document.getElementById("sent_messages").style.display = "inline-block";
        $("#sent_messages").css("display","inline-block");
    }
    
</script>

<script type="text/javascript">
    

    var first = window.location.pathname;
    first.indexOf(2);
    first.toLowerCase();
    first = first.split("/")[2];

    var afterhash = window.location.hash;

    if(first=='portal')
    {
       if(afterhash=='#Task')
        {

             $("#show_closed").css("display","inline-block");
        }
        else 
        {
             $("#show_closed").css("display","none");
        }
    }
    else
    {
        if(afterhash=='#Task')
        {
             $("#show_closed").css("display","inline-block");
        }
        else 
        {
             $("#show_closed").css("display","none");
        }
    }
</script>

<script>
// window.location.reload();
// $(".action[data-action=RemoveEmailRecord],.action[data-action=RemoveEmailRecord]").click(function(){
//       var afterhash = window.location.hash;

//     if(afterhash=='#EmailReminder')
//     {
//         var er_id=$(this).attr('data-id');
//         var thisval = $(this);
//           $.ajax({
//                 url: "../../client/res/templates/email_reminder/delete_email_reminder.php",
//                 type: "get", 
//                 async: false,
//                 data: { er_id: er_id, },
//                 success: function(result)
//                 {
//                 if(result.status == 'true'){
//                   // $(this).notify('Removed', 'success');
//                   thisval.closest(".list-row").remove();
//                   console.log(thisval.closest("tr").html());
//                 }
//                 }
//             });
//     }
//     });

$(".action[data-action=quickedit],.action[data-action=quickEdit]").click(function(){
    var count=0;
    count++;
    var afterhash = window.location.hash;
    
    if(afterhash=='#Task')
    {

        var task_id=$(this).attr('data-id');

        var first = window.location.pathname;
        first.indexOf(2);
        first.toLowerCase();
        first = first.split("/")[2]; 

        if(first=='portal')
        {
            $.ajax({
                url: "../../client/src/views/record/row-actions/edit_hide_show.php",
                type: "get", 
                async: false,
                data: { task_id: task_id, },
                success: function(result)
                {
                assign_val(result);
                }
            });
        }
        else
        {
            $.ajax({
                url: "../../client/src/views/record/row-actions/edit_hide_show.php",
                type: "get", 
                async: false,
                data: { task_id: task_id, },
                success: function(result)
                {
                    assign_val(result);
                }
            });
        }


        function assign_val(result)
        {
            sessionStorage.removeItem("result_val"); 
            sessionStorage.setItem("result_val",result); 
        }

        if(sessionStorage.length != 0) 
        {
            var result_val1=sessionStorage.getItem("result_val");
        }

        if(result_val1==1)
        {
            if(count==2){
                $(this).attr("href", "#Task/edit/"+task_id);
                $(this).data('action','quickEdit');
                $(".action[data-action=quickEdit]")[0].click();
            }    
        }
        else
        {
            $.confirm({
                title: 'Warning!',
                content: 'You are not allowed to edit this task!',
                buttons: {
                    Ok: function () {
                        delete(count);
                        count=0;
                    },
                }
            });
            return false;
        }
    }
});
</script>

<!-- Custom Holiday Calender scripts Code Start -->
<!-- by pooja bachhav -->
<script type="text/javascript">
function getbranchById(branchid,len){
  $.ajax({   
  url: "../../../../client/res/templates/holiday_calendar/holidayCalender.php",
  type: "get",
  dataType: "json",
  data: {methodName : "getbranchById",inputbranch : branchid},
  success     : function(response) {
    if( response.status == "true" ){
    $(".panel-append .panel").eq(len).find(".branch_copy").text(response.data.brname);
    }
  },
  });

}

 function calendarData(dbbrnames,j,branchCount,branchid){


  $.ajax({   
   url: "../../../../client/res/templates/holiday_calendar/holidayCalender.php",
   type: "get",
   dataType: "json",
   data: {methodName : "getbranches"},
   success     : function(response) {
     if( response.status == "true" ){

        $(".panel-append .panel:last-child .branch").html(response.data.html);

        $(".panel-append .panel").eq(j).find(".branch").val(branchid);
                                 
        $(".panel-append .panel:last-child .branch").customA11ySelect();
        $(".panel-append .panel .panel-heading select").eq(j).closest('div').addClass('has-success');
        $(".panel-append .panel .panel-heading select").eq(j).closest('div').find('small').attr('data-bv-result','VALID');
        $(".panel-append .panel .panel-heading ").eq(j).find('.custom-a11yselect-container button span').text(dbbrnames);

        var dropdownliLen = $(".panel-append .panel").eq(j).find(".custom-a11yselect-container ul li").length;
        $(".panel-append .panel").eq(j).find(".custom-a11yselect-container ul li").eq(0).css("display","none");
        $(".panel-append .panel").eq(j).find(".custom-a11yselect-container ul li").eq(0).removeClass("custom-a11yselect-focused");
        $(".panel-append .panel").eq(j).find(".custom-a11yselect-container ul li").eq(0).removeClass("custom-a11yselect-selected");
                         
        var liId ="";
        
        for(var s = 0; s < dropdownliLen; s++){
            
            if($(".panel-append .panel").eq(j).find(".custom-a11yselect-container ul li button").eq(s).text() == dbbrnames){
                            
                $(".panel-append .panel").eq(j).find(".custom-a11yselect-container ul li").eq(s).css("display","none");
                           
                liId = $(".panel-append .panel").eq(j).find(".custom-a11yselect-container ul li").eq(s).attr("id");

                $(".panel-append .panel").eq(j).find(".custom-a11yselect-container ul li").eq(s).addClass("custom-a11yselect-focused");

                $(".panel-append .panel").eq(j).find(".custom-a11yselect-container ul li").eq(s).addClass("custom-a11yselect-selected");
            }
        }
                        
        if(liId != null){
            
            $(".panel-append .panel").eq(j).find(".custom-a11yselect-container button ").attr("aria-activedescendant",liId);
        }
        
        for(var v =0; v < branchCount ; v++){

            if($(".panel-append .panel").eq(j).find(".custom-a11yselect-container ul li button").eq(s).text() == dbbrnames[v]){
                            
                  for(var r = 0; r < dropdownliLen; r++){
                             
                      $(".panel-append .panel").eq(j).find(".custom-a11yselect-container ul li").eq(s).css("display","none");
                  }

            }
        }

      }else{
                                 
           }
    },
 });

 }

 var dbbranches = []; 
 var dbbrnames  = [];
 var dbdatesarr = [];
// $(document).ready(function(){
  // function getCalendarData(){
    $.ajax({   
    url: "../../../../client/res/templates/holiday_calendar/holidayCalender.php",
    type: "get",
    dataType: "json",
    data: {methodName : "getHolidayCalendarData"},
                    
      success     : function(response) {
                  
        if( response.data.yearly != '' ){
            function remove_duplicates_es6(arr) {
                let s = new Set(arr);
                let it = s.values();
                return Array.from(it);
            }
                       
        count = response.data.yearly.length;
        wcount = response.data.weekly.length;
        for(i= 0 ; i < count ; i++){
            dbbranches[i] = response.data.yearly[i].h_branch_id;
            dbbrnames[i] = response.data.yearly[i].name;
                        
        }
        
        countbarnch = remove_duplicates_es6(dbbranches);
        dbbrnames = remove_duplicates_es6(dbbrnames);
        var branchCount = dbbrnames.name ;
        for(j=0 ; j < countbarnch.length; j++){
                           
            if(j!=0){
                            
              $(".panel-append").append(add_panel);

            }

            if(j == 0){
             $(".panel-append .panel").eq(j).find('.weekly').chosen('destroy');

            }
                          
          var findbranch ="";
          calendarData(dbbrnames[j],j,branchCount,countbarnch[j]);
                           
          $(".panel-append .panel:last-child").find(".branch").attr("name","branch_field["+j+"]");
          $(".panel-append .panel:last-child").find(".branch").attr("id","branch_field["+j+"]");
          $(".panel-append .panel:last-child").find(".weekly").attr("name","weekly_field["+j+"][]");
          $(".panel-append .panel:last-child").find(".weekly").attr("id","weekly_field["+j+"][]");

          getbranchById(countbarnch[j],j);

          $(".panel-append .panel").eq(j).find(".branch_copy").val(countbarnch[j]);
                             
                           //panel_count++;
          var panel_count=$(".panel-append .panel").length;
          
          if(panel_count>1)
            {
              $(".panel-append .panel-body-form .panel_delete_icon .deleteBtn").remove();

              $(".panel-append .panel-body-form .panel_delete_icon").append(delete_panel_HTML);
            }
                           
          var dbholidays  = []; 
          var dbresone    = [];   
          for(k= 0 ; k < count ; k++){
                            
              if(countbarnch[j] == response.data.yearly[k].h_branch_id)
                  {
                    dbholidays[k] = response.data.yearly[k].holiday_date;
                    dbresone[k] = response.data.yearly[k].holiday_resone;
                              
                  }
                            
              }
          var dboff    = [];
          for(m= 0 ; m < wcount ; m++){
              if(countbarnch[j] == response.data.weekly[m].w_branch_id)
                  {
                    dboff[m] = response.data.weekly[m].w_off_days;
                              
                  }
                            
              }
                          
              dbholidays = jQuery.grep(dbholidays, function(n){ return (n); });
              dbresone = jQuery.grep(dbresone, function(n){ return (n); });
              dboff = jQuery.grep(dboff, function(n){ return (n); });
                          
          for(l = 0 ; l < dbholidays.length ; l++){
              if(l!= 0){
                            
                  $('.panel:last-child').find('.holidays-append').append(holidays_HTML);
                             
              }

            last_holiday_feild =  $('.panel:last-child').closest(".holidays-append").find(".holidays-main:last-child");
            $('.panel:last-child').find(".holidays-append .holidays-main").eq(l).find(".date_input").attr('name','date_field['+j+']['+l+']');
            $('.panel:last-child').find(".holidays-append .holidays-main").eq(l).find(".date_input").attr('id','date_field['+j+']['+l+']');
            $('.panel:last-child').find(".holidays-append .holidays-main").eq(l).find(".holiday_input").attr('name','holiday_field['+j+']['+l+']');
            $('.panel:last-child').find(".holidays-append .holidays-main").eq(l).find(".holiday_input").attr('id','holiday_field['+j+']['+l+']');
                                
            $('.panel:last-child').find(".holidays-append .holidays-main").eq(l).find(".date_input").val(dbholidays[l]);
            $('.panel:last-child').find(".holidays-append .holidays-main").eq(l).find(".holiday_input").val(dbresone[l]);

            var dbdateval = $('.panel:last-child').find(".holidays-append .holidays-main").eq(l).find(".date_input").val();
                          
            if(dbdateval != null){
                if (dbdatesarr.indexOf(dbdateval) > -1) {
                }else{
                    dbdatesarr.push(dbdateval);
                }

            }
                          
              // console.log("Edit date = > "+edit_date);
              
            $(".panel-append .panel").eq(j).find(".holidays-main:eq('"+l+"') .date_copy").attr('value',dbholidays[l]);
              
            $(".panel-append .panel").eq(j).find(".holidays-main:eq('"+l+"') .holiday_copy").attr('value',dbresone[l]);
                            
        }   
                        /////done////
        $('#date_field[0][0]').datepicker('update');
        $('#date_field[0][0]').datepicker({
            format: 'd/m/yyyy',
            beforeShowDay: function(date){
                dmy = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
                if(dbdatesarr.indexOf(dmy) != -1){
                    return false;
                }
                else{
                    return true;
                }
            }

        }).on('change',function(){
            $(".datepicker").hide();
        });
                         
        $('.date').datepicker({
              format: 'd/m/yyyy',
              beforeShowDay: function(date){
                  dmy = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
                  if(dbdatesarr.indexOf(dmy) != -1){
                      return false;
                  }
                  else{
                      return true;
                  }
              }

        }).on('change',function(){
            $(".datepicker").hide();
        });

                          // for Weekly Day
        var week_copy=String(dboff);
        var items=week_copy.split(',');

        $(".panel-append .panel").eq(j).find(".weekly-off-main .weekly_copy").remove();
                     
        for(var w=0;w<items.length;w++)
          {
            if(items[w]!="")
              {
                $(".panel-append .panel").eq(j).find(".weekly-off-main").append('<span class="weekly_copy clone-element">'+items[w]+'</span>');
              }

          }
                        // assign weekly value
        $(".panel-append .panel").eq(j).find('.weekly').val(dboff);
            
            // for chosen select field
        $(".panel-append .panel").eq(j).find('.weekly').chosen();
        e_holidays_count = dbholidays.length;

        if(e_holidays_count>1)
            {

              $('.panel-append .panel').eq(j).find(".holidays-append .holidays-main .closeBtn").remove();
              
              $('.panel-append .panel').eq(j).find(".holidays-append .holidays-main .icon-group").append(holidays_removeBtn);

              $('.panel-append .panel').eq(j).find('.holidays-append .holidays-main:last-child .icon-group').append(holidays_addBtn);
            }
             

        $('.panel-append .panel').eq(j).find(".holidays-append .holidays-main:not(:last-child) .addBtn").remove();
         
      }
                      
      $(".holiday_calender #save_btns,.holiday_calender #btnAdd,.holiday_calender .duplicate,.holiday_calender .addBtn,.holiday_calender .closeBtn,.holiday_calender .branch_group,.holiday_calender .deleteBtn,.holiday_calender .weekly_group,.branch_label").addClass("display_none");
     
      $(".holiday_calender #edit_btns").removeClass("display_none");

      $(".holiday_calender .clone-element").removeClass("display_none");

      $(".holiday_calender .date_group,.holiday_calender .holiday_input").addClass("display_none");
             
      }else{
                            //console.log(response.msg);
      }
      },
    });
  // }



  $.ajax({   
      url: "../../../../client/res/templates/holiday_calendar/holidayCalender.php",
      type: "get",
      dataType: "json",
      data: {methodName : "getbranches"},
      // processData: false,
      // contentType: false,
      success     : function(response) {
          if( response.status == "true" ){
             $('.branch').html(response.data.html);
              $(".branch").customA11ySelect();
          }else{
              //console.log(response.msg);
          }
      },
  });
          
</script>

<script type="text/javascript">

    $(".weekly").chosen();
    // for chosen has error
    $(".panel-append .panel").find(".chosen-container-multi .chosen-choices").addClass("form-control");
    // for select has error
    $(".panel-append .panel").find(".custom-a11yselect-container .custom-a11yselect-btn").addClass("form-control");
 
    $(document).on('click','.week_down_arrow',function()
    {
        $(this).closest('.panel').find(".weekly").trigger("chosen:open");
    });

</script>

<!-- Element hide after clone -->

<script type="text/javascript">
   $(".holiday_calender .clone-element").addClass("display_none");
</script>

<!-- panel section -->
<script type="text/javascript">
    
    // panel append
    var add_panel='<div class="panel panel-default"><div class="panel-heading"><h5 class="branch_label">Select Branch<span class="required-sign"> *</span></h5><div class="row borderbottom"><div class="col-xs-9 col-md-9"><div class="form-group branch_group"><select class="form-control branch" placeholder="Select Branch" name="branch_field" id="branch_field" ></select><span class="empty text-danger display_none">Please Select Branch</span></div><span class="branch_copy clone-element calender-heading branch_name_header"></span></div><div class="col-xs-3 col-md-3"><div class="pull-right"><button type="button" class="btn btn-primary" onclick="holiday_export(this)">Export</button></div></div></div></div><div class="panel-body panel-body-form"><div class="row"><div class="col-xs-10 col-md-10"><h5 class="calender-heading">Yearly Calendar</h5></div><div class="col-xs-2 col-md-2"><div class="panel_delete_icon pull-right"></div></div></div><div class="row"><div class="col-xs-5 col-md-5"><h5>Date<span class="required-sign"> *</span></h5></div><div class="col-xs-5 col-md-5"><h5>Name of Holiday<span class="required-sign"> *</span></h5></div></div><div class="holidays-append"><div class="holidays-main"><div class="row"><div class="col-xs-5 col-md-5"><div class="form-group date_group"><div class="input-group date"><input type="text" class="form-control date date_input select_date" placeholder="Select Date" name="date_field[]" id="date_field[]" onkeydown="return false"  onclick="dateOnChange(this)"/><span class="input-group-addon"><span class="material-icons-outlined btn-default_gray" onclick="dateOnChange(this)">date_range</span></span></div><span class="empty text-danger display_none">Please Select Date</span></div><input type="text"  class="form-control date_copy clone-element" name="" readonly></div><div class="col-xs-3 col-md-5"><div class="form-group holiday_group"><input type="text" class="form-control holiday_input" placeholder="Enter Holiday" name="holiday_field[]" id="holiday_field[]"><input type="text" class="form-control holiday_copy clone-element" name="" readonly><span class="empty text-danger display_none">Please Enter Name of Holiday</span></div></div><div class="col-xs-4 col-md-2"><div class="icon-group"><button type="button" class="btn btn-primary addBtn" onclick="add_yearly_holiday(this)"><span  class="material-icons-outlined">add</span></button></div></div></div></div></div><div class="weekly-off-section"><div class="row"><div class="col-xs-12 col-md-12"><h5>Weekly Off<span class="required-sign"> *</span></h5></div></div><div class="row"><div class="col-xs-9 col-md-9"><div class="weekly-off-main"><div class="form-group weekly_group"><div class="input-group"><select class="form-control weekly" data-placeholder="Select Day" name="weekly_field" id="weekly_field" multiple><option value="" disabled>Select Day</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option><option value="Sunday">Sunday</option></select><span class="input-group-addon"><span class="material-icons-outlined week_down_arrow btn-default_gray">arrow_drop_down</span></span></div><span class="empty text-danger display_none">Please Select Day</span></div></div></div><div class="col-xs-3 col-md-3"><div class="pull-right"><button type="button" class="btn btn-primary duplicate" onclick="duplicate_panel(this)">Duplicate</button></div></div></div></div></div></div>';


    var delete_panel_HTML='<button type="button" class="btn deleteBtn btn-default_gray" onclick="delete_panel(this)"><span class="material-icons-outlined">delete_outline</span></button>';

    //var panel_count=1;

    var panel_count=$(".panel-append .panel").length; // for edit and add

    // for delete panel

    function delete_panel(element)
    {

        var delete_panel_branch_value=$(element).closest(".panel").find(".custom-a11yselect-selected").attr("data-val");

        var current_panel=$(element).closest(".panel");

        $(element).closest(".panel").remove();
        
        var panel_count=$(".panel-append .panel").length;

        if(panel_count<=1)
          {
            $(".panel-append .panel-body-form .panel_delete_icon .deleteBtn").remove();
          }

        $(".panel-append .panel .custom-a11yselect-menu").find("li[data-val='" + delete_panel_branch_value + "']").show();

        check();
      
    }


//Holiday Section

    var holidays_HTML='<div class="holidays-main"><div class="row"><div class="col-xs-5 col-md-5"><div class="form-group date_group"><div class="input-group date"><input type="text" class="form-control date date_input select_date" placeholder="Select Date" name="date_field[]" id="date_field[]" onkeydown="return false"  onclick="dateOnChange(this)"/><span class="input-group-addon"><span class="material-icons-outlined btn-default_gray" onclick="dateOnChange(this)">date_range</span></span></div><span class="empty text-danger display_none">Please Select Date</span></div><input type="text"  class="form-control date_copy clone-element" name="" readonly></div><div class="col-xs-3 col-md-5"><div class="form-group holiday_group"><input type="text" class="form-control holiday_input" placeholder="Enter Holiday" name="holiday_field[]" id="holiday_field[]"><input type="text" class="form-control holiday_copy clone-element" name="" readonly><span class="empty text-danger display_none">Please Enter Name of Holiday</span></div></div><div class="col-xs-4 col-md-2"><div class="icon-group"></div></div></div></div>';

    var holidays_addBtn='<button type="button" class="btn btn-primary addBtn" onclick="add_yearly_holiday(this)"><span  class="material-icons-outlined">add</span></button>';

    var holidays_removeBtn='<button type="button" class="btn btn-default_gray closeBtn"><span class="material-icons-outlined " onclick="remove_yearly_holiday(this)">close</span></button>';

    var index_of_current_panel="";

    var holidays_count="";

  function add_yearly_holiday(element)
   {

    index_of_current_panel=$(element).closest('.panel').index();

    holiday_name_field =$(element).closest(".holidays-append").find(".holidays-main").length;

    var current_add=$(element);

    current_add.closest('.holidays-append').append(holidays_HTML);
    $(".holiday_calender .clone-element").addClass("display_none");
    last_holiday_feild = $(element).closest(".holidays-append").find(".holidays-main:last-child");
    last_holiday_feild = $(element).closest(".holidays-append").find(".holidays-main:last-child");
  // bootstrap validations
    $(last_holiday_feild).find('.date_group .date').attr('id','datepicker'+index_of_current_panel+''+holiday_name_field);
    $(last_holiday_feild).find('.date_input').attr('name','date_field['+index_of_current_panel+']['+holiday_name_field+']');
    $(last_holiday_feild).find('.date_input').attr('id','date_field['+index_of_current_panel+']['+holiday_name_field+']');
    $(last_holiday_feild).find('.holiday_input').attr('name','holiday_field['+index_of_current_panel+']['+holiday_name_field+']');
    $(last_holiday_feild).find('.holiday_input').attr('id','holiday_field['+index_of_current_panel+']['+holiday_name_field+']');
    $add_option1=$(element).closest(".holidays-append .holidays-main").find('[name="date_field['+index_of_current_panel+']['+holiday_name_field+']"]');
    $add_option2=$(element).closest(".holidays-append .holidays-main").find('[name="holiday_field['+index_of_current_panel+']['+holiday_name_field+']"]');
   // Add new field
   
    holidays_count=$(element).closest(".holidays-append").find(".holidays-main").length;
  // var dateval = $(element).closest(".holidays-append").find(".holidays-main").length;
   
    var datesarr = [];
    for(q=0 ; q < holidays_count; q++  ){
    var dateval = $(element).closest(".holidays-append").find(".holidays-main .date_input").eq(q).val();
      if(dateval != null){
          if (datesarr.indexOf(dateval) > -1) {
          }else{
          datesarr.push(dateval);
          }

      }
    }

    if(holidays_count>1)
    {

      $(element).closest('.holidays-append').find(".holidays-main .closeBtn").remove();
  
      $(element).closest('.holidays-append').find(".holidays-main .icon-group").append(holidays_removeBtn);
    }
 
    $(element).closest('.holidays-append').find('.holidays-main:last-child .icon-group').append(holidays_addBtn);

    $(element).closest('.holidays-append').find(".holidays-main:not(:last-child) .addBtn").remove();
  /////done//////
    $('.date').datepicker({
          format: 'd/m/yyyy',
          beforeShowDay: function(date){
              dmy = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
              if(datesarr.indexOf(dmy) != -1){
                  return false;
              }
              else{
                  return true;
              }
          }
    
    }).on('change',function(){
      
       $(".datepicker").hide();
    });
   }

  function remove_yearly_holiday(element)
  {
    index_of_current_panel=$(element).closest('.panel').index();

    var current_delete=$(element).closest('.holidays-main');
   
      // remove field
    var dateattr = current_delete.find('.date_input').attr("name");
    var holidayattr = current_delete.find('.date_input').attr("name");
    var holidaydateVal = current_delete.find('.date_input').val();
    var removedatesarr = [];
    var dateLen = $(element).closest(".holidays-append").find(".holidays-main").length;
    for(q=0 ; q<dateLen; q++  ){
        var dateval = $(element).closest(".holidays-append").find(".holidays-main .date_input").eq(q).val();
      if(dateval != null){
        if (removedatesarr.indexOf(dateval) > -1) {
        }else{
          removedatesarr.push(dateval);
        }

      }
    }

    removedatesarr.splice(removedatesarr.indexOf(holidaydateVal), 1);
    $('.date').datepicker('remove').datepicker({
        format: 'd/m/yyyy',
        beforeShowDay: function(date){
            dmy = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
            if(removedatesarr.indexOf(dmy) != -1){
                return false;
            }
            else{
                return true;
            }
        }
  
    }).on('change',function(){
       
     $(".datepicker").hide();
    });

    $(element).closest('.holidays-main').remove();
      
    holidays_count=$('.panel-append .panel').eq(index_of_current_panel).find(".holidays-append .holidays-main").length;
    // console.log("on delete ========== "+holidays_count);
    if(holidays_count<=1)
    {
    
    $('.panel-append .panel').eq(index_of_current_panel).find('.holidays-append .holidays-main .closeBtn').remove();
    
    }
    
    $('.panel-append .panel').eq(index_of_current_panel).find('.holidays-append .holidays-main .addBtn').remove();
    $('.panel-append .panel').eq(index_of_current_panel).find('.holidays-append .holidays-main:last-child .icon-group').append(holidays_addBtn);

  }

// For Duplicate 

  function duplicate_panel(element)
    {
      validation();
        // for validations

      var branch_value=$(".branch").val();
      var date_value=$(".date_input").val();
      var holiday_value=$('.holiday_input').val();
      var weekly_value=$(".weekly").val();
      var validate_empty= check_empty();

      if(validate_empty) {
       //$("#registerForm").data('bootstrapValidator').validate();
      return false;
      }
      else 
      {
        var duplicate_holiday_len=$(element).closest('.panel').find(".holidays-append .holidays-main").length;
            
        panel_index_of_current_panel=$(".panel-append").find('.panel').length;

        panel_index_length = parseInt(panel_index_of_current_panel);
        $(".panel-append").append('<div class="panel panel-default">'); // start of panel
           
        $(".panel-append .panel:last-child").append('<div class="panel-heading"><h5 class="branch_label">Select Branch<span class="required-sign"> *</span></h5><div class="row borderbottom"><div class="col-xs-9 col-md-9"><div class="form-group branch_group"><select class="form-control branch" placeholder="Select Branch" name="branch_field['+panel_index_length+']" id="branch_field['+panel_index_length+']"></select><span class="empty text-danger display_none">Please Select Branch</span></div><span class="branch_copy clone-element calender-heading branch_name_header"></span></div><div class="col-xs-3 col-md-3"><div class="pull-right"><button type="button" class="btn btn-primary holiday_export" onclick="holiday_export(this)">Export</button></div></div></div></div>');// end of panel heading

        $(".panel-append .panel:last-child").append('<div class="panel-body panel-body-form">');// start panel body

        $('.panel-append .panel:last-child .panel-body-form').append('<div class="row"><div class="col-xs-10 col-md-10"><h5 class="calender-heading">Yearly Calendar</h5></div><div class="col-xs-2 col-md-2"><div class="panel_delete_icon pull-right"></div></div></div>'); // yearly calender heading section

        $(".panel-append .panel:last-child .panel-body-form").append('<div class="row"><div class="col-xs-5 col-md-5"><h5>Date<span class="required-sign"> *</span></h5></div><div class="col-xs-5 col-md-5"><h5>Name of Holiday<span class="required-sign"> *</span></h5></div></div>'); // heading of date and holiday

        $(".panel-append .panel:last-child .panel-body-form").append('<div class="holidays-append">');// date and holiday textbox section append start
        
        var duplicatedatesarr = [];

        for(var k=0;k<duplicate_holiday_len;k++)
            {
              var duplicate_date=$(element).closest('.panel').find(".holidays-append .holidays-main").eq(k).find(".date_input").val();
              var name_attr_date=$(element).closest('.panel').find(".holidays-append .holidays-main").eq(k).find(".date_input").attr('name');

              var duplicate_holiday=$(element).closest('.panel').find(".holidays-append .holidays-main").eq(k).find(".holiday_input").val();
              var name_attr_holiday=$(element).closest('.panel').find(".holidays-append .holidays-main").eq(k).find(".holiday_input").attr('name');

             if(duplicate_date != null){
                 if (duplicatedatesarr.indexOf(duplicate_date) > -1) {
                 }else{
                 duplicatedatesarr.push(duplicate_date);
                 }

             }

             $(".panel-append .panel:last-child .holidays-append").append('<div class="holidays-main"><div class="row"><div class="col-xs-5 col-md-5"><div class="form-group date_group"><div class="input-group date"><input type="text" class="form-control date date_input select_date" placeholder="Select Date " name="date_field['+panel_index_length+']['+k+']" id="date_field['+panel_index_length+']['+k+']" onkeydown="return false" value='+duplicate_date+'  onclick="dateOnChange(this)"/><span class="input-group-addon"><span class="material-icons-outlined btn-default_gray" onclick="dateOnChange(this)">date_range</span></span></div><span class="empty text-danger display_none">Please Select Date</span></div><input type="text"  class="form-control date_copy clone-element" name="" readonly></div><div class="col-xs-3 col-md-5"><div class="form-group holiday_group"><input type="text" class="form-control holiday_input" placeholder="Enter Holiday" name="holiday_field['+panel_index_length+']['+k+']" id="holiday_field['+panel_index_length+']['+k+']" value="'+duplicate_holiday+'"><input type="text" class="form-control holiday_copy clone-element" name="" readonly><span class="empty text-danger display_none">Please Enter Name of Holiday</span></div></div><div class="col-xs-4 col-md-2"><div class="icon-group"><button type="button" class="btn btn-primary addBtn" onclick="add_yearly_holiday(this)"><span  class="material-icons-outlined">add</span></button></div></div></div></div>'); // textbox of date and holiday
            }


            $(".panel-append .panel:last-child").append('</div>'); // date and holiday textbox section append end

            $(".holiday_calender .clone-element").addClass("display_none");
            $(".panel-append .panel:last-child .panel-body-form").append('<div class="weekly-off-section"><div class="row"><div class="col-xs-12 col-md-12"><h5>Weekly Off<span class="required-sign"> *</span></h5></div></div><div class="row"><div class="col-xs-9 col-md-9"><div class="weekly-off-main"><div class="form-group weekly_group"><div class="input-group"><select class="form-control weekly" data-placeholder="Select Day" name="weekly_field['+panel_index_length+'][]" id="weekly_field['+panel_index_length+'][]" multiple><option value="" disabled>Select Day</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option><option value="Sunday">Sunday</option></select><span class="input-group-addon"><span class="material-icons-outlined week_down_arrow btn-default_gray">arrow_drop_down</span></span></div><span class="empty text-danger display_none">Please Select Day</span></div></div></div><div class="col-xs-3 col-md-3"><div class="pull-right"><button type="button" class="btn btn-primary duplicate" onclick="duplicate_panel(this)">Duplicate</button></div></div></div></div>');
            // weekly off section

            $(".panel-append").append('</div>'); // end of panel body

            $(".panel-append .panel:last-child").append('</div>'); // end of panel

            // assign weekly value
            $(".panel-append .panel:last-child .weekly").val($(element).closest(".panel").find(".weekly").val());
            
            // for chosen select field
            $(".panel-append .panel:last-child .weekly").chosen();

            // for branch field
            $.ajax({   
                url: "../../../../client/res/templates/holiday_calendar/holidayCalender.php",
                type: "get",
                dataType: "json",
                data: {methodName : "getbranches"},
                    // processData: false,
                    // contentType: false,
                success     : function(response) {
                  if( response.status == "true" ){
                    $(".panel-append .panel:last-child .branch").html(response.data.html);
                    $(".panel-append .panel:last-child .branch").customA11ySelect();

                    var cur_branch=$(element).closest(".panel").find(".branch_group .custom-a11yselect-btn .custom-a11yselect-text").text();

                    $(".panel-append .panel:last-child .branch_group .custom-a11yselect-btn .custom-a11yselect-text").text(cur_branch);

                    $(".panel-append .panel:last-child .branch_group .custom-a11yselect-menu li").removeClass('custom-a11yselect-focused custom-a11yselect-selected');

                    $(".panel-append .panel:last-child .branch_group .custom-a11yselect-menu li button:contains('"+cur_branch+"')").closest('li').addClass(' custom-a11yselect-focused custom-a11yselect-selected');

                    check();
                  }else{
                        //console.log(response.msg);
                  }
                },
            });
   
            // for chosen has error

            $(".panel-append .panel:last-child").find(".chosen-container-multi .chosen-choices").addClass("form-control");

            if(duplicate_holiday_len>1)
            {
                $('.panel:last-child .holidays-main').find(".addBtn,.closeBtn").remove();

                $(".panel:last-child .holidays-main").find(".icon-group").append('<button type="button" class="btn btn-default_gray closeBtn"><span class="material-icons-outlined " onclick="remove_yearly_holiday(this)">close</span></button>');
            }   

            if(duplicate_holiday_len<=1)
            {
                $('.panel:last-child .holidays-main').find(".addBtn,.closeBtn").remove();
            }   

            $(".panel:last-child .holidays-main:last-child").find('.icon-group').append('<button type="button" class="btn btn-primary addBtn" onclick="add_yearly_holiday(this)"><span  class="material-icons-outlined">add</span></button>');


            // for panel delete
            var panel_count=$(".panel-append .panel").length;
            // panel_count++;

            if(panel_count>1)
            {
                $(".panel-append .panel-body-form .panel_delete_icon .deleteBtn").remove();

                $(".panel-append .panel-body-form .panel_delete_icon").append(delete_panel_HTML);
            }

            // for datepicker
            /////done/////
            $('.date').datepicker({
            format: 'd/m/yyyy',
            beforeShowDay: function(date){
                dmy = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
                if(duplicatedatesarr.indexOf(dmy) != -1){
                    return false;
                }
                else{
                    return true;
                }
            }
  
            }).on('change',function(){
               
               $(".datepicker").hide();
           });

              // for branch has error

            $(".panel-append .panel:last-child").find(".custom-a11yselect-container .custom-a11yselect-btn").addClass("form-control");

      }


  }
    
// ##################################### validations #################################

  function check_empty() {

    $checkEmpty = false;

    $(".panel .branch_group .custom-a11yselect-btn .custom-a11yselect-text").each(function() {
    var element = $(this);

    if (element.text() == "" || element.text()=='Select Branch') {
    $checkEmpty = true;
    }

    });

    $(".panel .date_input").each(function() {
    var element = $(this);
      if (element.val() == "") {
      $checkEmpty = true;
      }
    });

    $(".panel .holiday_input").each(function() {
    var element = $(this);
      if (element.val() == "") {
      $checkEmpty = true;
      }
    });

    $(".panel .weekly").each(function() {
    var element = $(this);
      if (element.val() == "" || element.val() == null ) {
      $checkEmpty = true;

      }
    });

  return $checkEmpty;
  }

  $("#btnAdd").on('click',function(event){
      validation();
      var branch_value=$(".branch").val();
      var date_value=$(".date_input").val();
      var holiday_value=$('.holiday_input').val();
      var weekly_value=$(".weekly").val();

      var validate_empty=check_empty();
      
      panel_index_of_current_panel=$(".panel-append").find('.panel').length;

      panel_index_length = parseInt(panel_index_of_current_panel);

      if(validate_empty) {
      //$("#registerForm").data('bootstrapValidator').validate();
      return false;
      }
      else 
      {
        var arr = [];
        for(var l=0;l<$(".panel-append .panel").length;l++)
          {
            var last_branch_value=$(".panel-append .panel").eq(l).find(".branch").val();
            arr.push(last_branch_value);
          }

              // console.log("last_branch_value == > "+last_branch_value);

        $(".panel-append .panel-body-form .panel_delete_icon .deleteBtn").remove();

        $(".panel-append").append(add_panel);
        $(".holiday_calender .clone-element").addClass("display_none");

        $(".panel-append .panel:last-child").find(".branch").attr("name","branch_field["+panel_index_length+"]");
        $(".panel-append .panel:last-child").find(".branch").attr("id","branch_field["+panel_index_length+"]");
        $(".panel-append .panel:last-child").find(".date_input").attr("name","date_field["+panel_index_length+"][0]");
        $(".panel-append .panel:last-child").find(".date_input").attr("id","branch_field["+panel_index_length+"][0]");
        $(".panel-append .panel:last-child").find(".holiday_input").attr("name","holiday_field["+panel_index_length+"][0]");
        $(".panel-append .panel:last-child").find(".holiday_input").attr("id","branch_field["+panel_index_length+"][0]");
        $(".panel-append .panel:last-child").find(".weekly").attr("name","weekly_field["+panel_index_length+"][]");
        $(".panel-append .panel:last-child").find(".weekly").attr("id","weekly_field["+panel_index_length+"][]");

               // for branch field
        $.ajax({   
              url: "../../../../client/res/templates/holiday_calendar/holidayCalender.php",
              type: "get",
              dataType: "json",
              data: {methodName : "getbranches"},
              // processData: false,
              // contentType: false,
              success     : function(response) {
                  if( response.status == "true" ){
                    $(".panel-append .panel:last-child .branch").html(response.data.html);
                     $(".panel-append .panel:last-child").find(".branch").customA11ySelect();
                     check();
                  }else{
                      //console.log(response.msg);
                  }
              },
        });
      

              // for branch has error

        $(".panel-append .panel:last-child").find(".custom-a11yselect-container .custom-a11yselect-btn").addClass("form-control");

        
        var panel_count=$(".panel-append .panel").length;

        if(panel_count>1)
          {
             
            $(".panel-append .panel-body-form .panel_delete_icon .deleteBtn").remove();

            $(".panel-append .panel-body-form .panel_delete_icon").append(delete_panel_HTML);
          }

                
        $('.date').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'd/m/yyyy'
            }).on('change',function(){
             //$('#registerForm').bootstrapValidator('revalidateField', $('.date_input'));   
             $(".datepicker").hide();
          });

          $('.panel-append .panel:last-child').find(".weekly").chosen(); 

              // for chosen has error

          $(".panel-append .panel:last-child").find(".chosen-container-multi .chosen-choices").addClass("form-control");

        }
    
  });

</script>

<!-- save button validation -->

<script type="text/javascript">
   
  function holiday_export(element){
      
    var branch_value=$(element).closest(".panel").find(".custom-a11yselect-selected").text();
    var weekly_value=$(element).closest('.panel').find(".weekly").val();
    var duplicate_holiday_len=$(element).closest('.panel').find(".holidays-append .holidays-main").length;
    var duplicate_date    = [];
    var duplicate_holiday = [];
    var methodeName       = "export";
    var parameters        = "";
    for(var k=0; k < duplicate_holiday_len; k++)
    {
      duplicate_date[k] = $(element).closest('.panel').find(".holidays-append  .holidays-main").eq(k).find(".date_input").val();
          
      duplicate_holiday[k] = $(element).closest('.panel').find(".holidays-append .holidays-main").eq(k).find(".holiday_input").val();
             
    }

    $.ajax({
        url: "../../../../client/res/templates/holiday_calendar/holidayCalender.php",
        type: "get",
        dataType: "json",
        data: { methodName: methodeName, parameters: parameters , branch_value: branch_value, weekly_value: weekly_value, duplicate_date: duplicate_date , duplicate_holiday: duplicate_holiday },
      
        success   : function(response) {
          downloadURI(response.data.url, response.data.name);
          fileUnlink(response.data.filepath);
          console.log(response.data.filepath);
        },
    });
  };
   
  function fileUnlink(filePath="") {
     if( filePath != "" ){
        $.ajax({
             
          url: "../../../../client/res/templates/holiday_calendar/holidayCalender.php",
          type: "GET",
          dataType: "JSON",
          data    : {"filePath": filePath, methodName : "unlinkFile", parameters : ""},
          success : function(response) {
           
          },
        });
      }
  }

  function downloadURI(url, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = url;
    link.click();
  }

    
  function dateOnChange(event){
    var datesarr = [];
    var dateLen = $(event).closest(".holidays-append").find(".holidays-main").length;
    for(q=0 ; q<dateLen; q++  ){
    var dateval = $(event).closest(".holidays-append").find(".holidays-main .date_input").eq(q).val();
      if(dateval != null){
        if (datesarr.indexOf(dateval) > -1) {
        }else{
         datesarr.push(dateval);
        }
      }
    }
    // var dateValArr = getInputDates(inputVal);
    var inputbranch = $(event).closest('.panel').find(".branch").val();
    
    var selectId = $(event).closest(".holidays-main .date").attr('id');
    $('.date').datepicker('remove');
    $('.date').datepicker({
        format: 'd/m/yyyy',
        beforeShowDay: function(date){
            dmy = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
            if(datesarr.indexOf(dmy) != -1){
                return false;
            }
            else{
                return true;
            }
        }
  
    }).on('change',function(){
       
      $(".datepicker").hide();
    });
  }
    
  
</script>


<script type="text/javascript">

  function check()
    {
      var branches=[];
      var arr = [];
            // all branches

      $(".panel-append .panel:last-child").find(".custom-a11yselect-menu li").each(function(){
      branches.push($(this).attr("data-val"));
      });
            
            // console.log("================= all branches ==============")
            // selected branches

            for(var l=0;l<$(".panel-append .panel").length;l++)
            {
              //var last_branch_value=$(".panel-append .panel").eq(l).find(".branch").val();
              var last_branch_value=$(".panel-append .panel").eq(l).find(".branch_group .custom-a11yselect-menu .custom-a11yselect-selected").attr('data-val');
              arr.push(last_branch_value);
            }
            // console.log("================= selected branches ==============");
            // unmatched elements for hide and show branches

            var f=0,count_branch=0;
            for(var c=0;c<branches.length;c++)
            {
                f=0;
                for(var d=0;d<arr.length;d++)
                {
                    if(branches[c]==arr[d] && f==0)
                    {
                        $(".panel-append .panel .custom-a11yselect-menu").find("li[data-val='" + branches[c] + "']").hide();
                        f=1;
                    }
               }

                if(f==0)
                {
                    // console.log(" ######## unmatch  ########## "+branches[c]);
                        $(".panel-append .panel .custom-a11yselect-menu").find("li[data-val='" + branches[c] + "']").show();
                }

                
            }

            // when only select branch remaining in dropdown remove dropdown from select branch field

            var flag=0,counter=0;
            for(var m=1;m<branches.length;m++)
            {
                flag=0;
                for(var n=0;n<arr.length;n++)
                {
                    if(branches[m]==arr[n] && flag==0)
                    {
                        flag=1;
                        counter++;
                    }
                }
            }

            if(counter==(branches.length-1))
            {
                $(".panel-append .panel").find(".custom-a11yselect-menu").addClass("display_none");
                
                $(".panel-append .panel").find(".custom-a11yselect-btn").click(function(){
                    // alert("hey........");
                    $(this).find(".icon-carrat-up").css({"border-top":" .3em solid #333","border-left": ".3em solid transparent","border-right": ".3em solid transparent","border-bottom":"0px"});
                });

                $(".panel-append .panel").find(".duplicate").attr("disabled",true);
                $("#btnAdd").attr("disabled",true);
                
            }

            if(counter!=(branches.length-1))
            {
                $(".panel-append .panel").find(".custom-a11yselect-menu").removeClass("display_none");
                $(".panel-append .panel").find(".custom-a11yselect-btn").click(function(){
                    $(this).find(".icon-carrat-up").removeAttr("style");
                });

                $(".panel-append .panel").find(".duplicate").removeAttr("disabled");
                $("#btnAdd").removeAttr("disabled");
            }
    }


    $(document).on('change','.branch',function(){

        var selected_value=$(this).val();
        check();
          // my new changes = friday
        var branch_value=$(this).closest(".branch_group").find(".custom-a11yselect-btn span").text();

        $(this).closest(".branch_group").find(".empty").addClass("display_none");

        if(branch_value=="" || branch_value=="Select Branch" )
          {

           $(this).closest(".branch_group").find(".empty").removeClass("display_none");

          }
    });

  function checkBranches()
  {
    validation();
    var validate_empty=check_empty();

    if(validate_empty) {
      return true;  
    }else{
      var len=$(".panel-append .panel").length;

      var arr=[];

      for(var k=0;k<len;k++)
      {
        //var branch_value=$(".panel-append .panel").eq(k).find(".branch").val();
        var branch_value=$(".panel-append .panel").eq(k).find(".branch_group .custom-a11yselect-btn .custom-a11yselect-text").text();
        arr.push(branch_value);
      }

      var flag=0;

      for(var s=0;s<arr.length;s++)
      {
        for(var t=0;t<arr.length;t++)
        {
          if(s!=t && arr[s]==arr[t] && flag==0)
          {
            flag=1;
          }
        }
        
     
      }

      if(flag==1)
      {
           $.alert({
                title: 'Alert!',
                content: 'Please select a different branch',
                type: 'dark',
                typeAnimated: true,
            });
       return false;
       } 

      event.preventDefault();
          var form_data = $("#registerForm");
         form_data = new FormData(form_data[0]);
         form_data.append("methodName","insertHolidays");
         
      $.ajax({   
          url: "../../../../client/res/templates/holiday_calendar/holidayCalender.php",
          type: "post",
          dataType: "json",
          data: form_data,
          processData: false,
          contentType: false,
          success   : function(response) {
            if( response.status == "true" ){
           
              $(".holiday_calender #save_btns,.holiday_calender #btnAdd,.holiday_calender .duplicate,.holiday_calender .addBtn,.holiday_calender .closeBtn,.holiday_calender .branch_group,.holiday_calender .deleteBtn,.holiday_calender .weekly_group,.branch_label").addClass("display_none");
     
              $(".holiday_calender #edit_btns").removeClass("display_none");

              $(".holiday_calender .clone-element").removeClass("display_none");

              $(".holiday_calender .date_group,.holiday_calender .holiday_input").addClass("display_none");

      // for assigning value hidden element on button click

              var save_panel_len=$(".panel-append .panel").length;

              for(var e=0;e<save_panel_len;e++)
                {

        // for branch

                  var b_copy=$(".panel-append .panel").eq(e).find(".branch").val();
        
                  getbranchById(b_copy,e);

        // for Weekly Day

                  var w_copy=$(".panel-append .panel").eq(e).find(".weekly").val();

                  var week_copy=String(w_copy);

                  var items=week_copy.split(',');

                  $(".panel-append .panel").eq(e).find(".weekly-off-main .weekly_copy").remove();
       
                  for(var w=0;w<items.length;w++)
                    {
                      if(items[w]!="")
                      {
                        $(".panel-append .panel").eq(e).find(".weekly-off-main").append('<span class="weekly_copy clone-element">'+items[w]+'</span>');
                      }

                    }
      
        // for date and holiday 
                  var save_holiday_len=$(".panel-append .panel").eq(e).find(".holidays-main").length;
                  for(var h=0;h<save_holiday_len;h++)
                    {
                  
                  var save_date=$(".panel-append .panel").eq(e).find(".holidays-main:eq('"+h+"') .date_input").val();
            
                  $(".panel-append .panel").eq(e).find(".holidays-main:eq('"+h+"') .date_copy").attr('value',save_date);
            
                   var save_holiday=$(".panel-append .panel").eq(e).find(".holidays-main:eq('"+h+"') .holiday_input").val();
            
                  $(".panel-append .panel").eq(e).find(".holidays-main:eq('"+h+"') .holiday_copy").attr('value',save_holiday);
                  }
                }   
            }else{

            }
          },
      });
    }
//return true;
  }


// for edit

  function editable()
  {
    $(".holiday_calender #save_btns,.holiday_calender #btnAdd,.holiday_calender .duplicate,.holiday_calender .addBtn,.holiday_calender .closeBtn,.holiday_calender .deleteBtn,.holiday_calender .weekly_group,.branch_label").removeClass("display_none");
     $(".holiday_calender #edit_btns").addClass("display_none");

     $(".holiday_calender .clone-element").addClass("display_none");

     $(".holiday_calender .date_group,.holiday_calender .holiday_input,.holiday_calender .branch_group").removeClass("display_none");
    
  }

//for cancel button 

  function cancel()
  {

  location.reload();
    
  }


</script>

<script type="text/javascript">

  $(document).on('change','.date_input',function(){
  $(this).closest(".date_group").find(".empty").addClass("display_none");
  });

  $(document).on('keyup','.holiday_input',function(){
  $(this).closest(".holiday_group").find(".empty").addClass("display_none");
  });

  $(document).on('change','.weekly',function(){

    var len=$(this).closest(".weekly_group").find(".chosen-container .chosen-choices .search-choice").length;

    for(var w=0;w<len;w++)
    {
    var value=$(this).closest(".weekly_group").find(".chosen-container .chosen-choices .search-choice").eq(w).find("span").text();

      if(len>=1)
      {
      $(this).closest(".weekly_group").find(".empty").addClass("display_none")
      }

      if(len==1 && value=='Select Day')
      {
      $(this).closest(".weekly_group").find(".empty").removeClass("display_none")

      }

    }

  });



  function validation()
  {
  var panel_length=$(".holiday_calender .panel").length;

  for(var p=0;p<panel_length;p++)
  {
    var branch_value=$(".holiday_calender .panel").eq(p).find(".branch_group .custom-a11yselect-btn span").text();

    var weekly_value=$(".holiday_calender .panel").eq(p).find(".weekly_group .chosen-results .result-selected").text();
    // for weekly
    var selected_week=$(".holiday_calender .panel").eq(p).find(".weekly_group .chosen-container .chosen-choices .search-choice").length;

    var value="";
// alert(selected_week);

    for(var w=0;w<selected_week;w++)
    {
    value+=$(".holiday_calender .panel").eq(p).find(".weekly_group .chosen-container .chosen-choices .search-choice").eq(w).find("span").text();
    }


    var holidays_length=$(".holiday_calender .panel").eq(p).find(".holidays-append .holidays-main").length;

    for(var h=0;h<holidays_length;h++)
    {
    var selctor=$(".holiday_calender .panel").eq(p).find(".holidays-append .holidays-main").eq(h);

    var date_value=selctor.find(".date_input").val();

    var holiday_value=selctor.find('.holiday_input').val();

      if(date_value=="")
      {
        selctor.find(".date_group .empty").removeClass("display_none");
      }

      if(holiday_value=="")
      {
      selctor.find(".holiday_group .empty").removeClass("display_none");
      }

    }

    if(branch_value=="" || branch_value=="Select Branch" )
    {
    $(".holiday_calender .panel").eq(p).find(".branch_group .empty").removeClass("display_none");
    }

    if(selected_week<=0 || (selected_week==1 && value=='Select Day') )
    {
    $(".holiday_calender .panel").eq(p).find(".weekly_group .empty").removeClass("display_none");
    }
  }

  }

  $(document).on( "click", ".date .date_input", function() {
    $(this).closest(".date_group").find(".material-icons-outlined ").trigger("click");
  });

</script>

<!-- Custom Holiday Calender scripts Code End -->

<!-- Custom Approved Sender IDs Script Start -->
<script type="text/javascript">
  var approvedSenderIdList = $("#create").attr('href');
  if(approvedSenderIdList =='#SenderID/create'){
    $("#main>.list-container>.list>table th:first-child,#main>.list-container>.list>table td:first-child").css("display","none");
    $("#main>.list-container>.list>table th:last-child,#main>.list-container>.list>table td:last-child").css("display","none");
  }
</script>
<!-- Custom Approved Sender IDs Script End -->
