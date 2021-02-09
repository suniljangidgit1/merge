

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content content-main-header" style="padding-bottom: 0px;">
   <div class="row">
      <div class="col-md-12">
         <!-- Bar chart -->
         <div class="box">
            <div class="box-body review_body">
               <div class="row">
                  <div class="col-xs-12 col-md-12">
                     <div class="">
                        <h4>
                           <!-- <i class="material-icons-outlined attach_money">assignment</i>  -->

                        Accepted Daily Sheet</h4>
                     </div>
                  </div>
                  <!-- <div class="col-xs-6 col-md-4">
                  </div> -->
               </div>
               <div class="row dailysheet_search_filter ">
                  <div class="col-lg-4 col-md-4 col-xs-7 pr10" >
                     <div class="search_bar">
                        <div class="searchfilter">
                           <div class="input-group">
                              <input type='text' id='searchByName' class="form-control search-main" name="searchByName" placeholder="Search...">
                              <div class="input-group-btn">
                                 <button class="btn btn-default search btn-icon" type="button">
                                    <!-- <i class="glyphicon glyphicon-search"></i> -->
                                    <i class="material-icons-outlined" style="font-size: 18px;">search</i>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-1 col-md-2 refresh  col-xs-5 plr0">
                     <div class="searchfilter">
                        <button type="button" class="btn btn-default btn-icon-refresh refresh-button" data-action="reset" title="Reset">
                        <i class="material-icons-outlined" aria-hidden="true">refresh</i>&nbsp;
                        </button>
                     </div>
                     <div class="dropdown_filter searchfilter_combine" >
                        <div class="dropdown add_filter">
                           <button type="button" class="btn filter-btn btn-icon-refresh dropdown-toggle" id="add_filter_dropdown" data-toggle="dropdown" data-action="filter" title="filter">
                           <i class="material-icons-outlined first_filter_icon" aria-hidden="true">filter_list</i>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="add_filter_dropdown">
                              <li  data-name="select_status_list_item" id="filter_status"><a href='#' data-name='action'>User</a></li>
                              <li data-name="select_user_list_item" id="filter_user"><a href="#" data-value="another action">Working From</a></li>
                              <li  data-name="select_team_list_item" id="filter_team"><a href="#" data-value="another action">Date</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-7 col-md-6 col-xs-12 filters">
                     <div class="row container_append">
                        <div class="col-md-3 selected_user col-xs-12 col-sm-4" >
                           <div class="form-group Common">
                              <label class="small">User</label>
                              <i class="material-icons-outlined close1 right_alignment" id="">close</i>
                              <select class="form-control select" id="allusernames" name="allusernames[]" multiple="" style="width: 100%">
                                 <?php foreach($allusernames as $row):?>
                                 <option value="<?php echo $row['id'];?>"><?php echo $row['first_name']." ".$row['last_name'];?></option>
                                 
                                 <?php endforeach;?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3 selected_date col-xs-12 col-sm-4">
                           <div class="form-group Common">
                              <label class="small">Date</label>
                              <i class="material-icons-outlined close1 right_alignment">close</i>
                              <select class="form-control " id="datefilter" name="datefilter" placeholder="Date" style="width: 100%">
                                 <option value="">Select</option>
                                 <option value="7day" >Last 7 Days</option>
                                 <option value="today"  >Today</option>
                                 <option value="yesterday"  >Yesterday</option>
                                 <option value="30day" >Last 30 Days</option>
                                 <option value="thismonth" >This Month</option>
                                 <option value="lastmonth" >Last Month</option>
                                 <option value="custom" >Custom</option>
                              </select>
                           </div>
                           <div class="start_date ">
                              <div class="form-group">
                                 <!-- <label class="small">Start Date</label> -->
                                 <div class="input-group date">
                                    <input  type="text" class="form-control" name="filter_date_start" id="filter_date_start" autocomplete="off" onkeydown="return false">
                                    <div class="input-group-addon" >
                                       <label for="filter_date_start"><i class="material-icons-outlined create_popup">date_range</i></label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="end_date">
                              <div class="form-group">
                                 <!-- <label class="small">End Date</label> -->
                                 <div class="input-group date">
                                    <input  type="text" class="form-control" name="filter_date_end" id="filter_date_end" autocomplete="off" onkeydown="return false">
                                    <div class="input-group-addon" >
                                       <label for="filter_date_end"><i class="material-icons-outlined create_popup">date_range</i></label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 selected_location col-xs-12 col-sm-4" >
                           <div class="form-group Common">
                              <label class="small">Working From</label>
                              <i class="material-icons-outlined close1 right_alignment">close</i>
                              <select class="form-control location" id="location" name="location" placeholder="Working From" multiple="" style="width: 100%">
                                 <?php foreach($select_braches as $row):?>
                                 <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                 <?php endforeach;?>
                                 <option value="Client Place">Client Place</option>
                                 <option value="Home">Home</option>
                                 
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row accepted_total">
                  <div class="col-md-12">
                     <div class="text-muted total-count">
                        Total: <span class="total-count-span">0</span>
                     </div>
                  </div>
               </div>
               <!-- </div> -->
            </div>
         </div>
      </div>
</section>
<section class="content table_content">
<div class="row">
  <div class="col-md-12">
<!-- Bar chart -->
    <div class="box">
      <div class="box-body table_box_body">
        <div class="col-md-12 table_padd">
            <div id="review_dailysheet_datatable" class="table-responsive">
            <table id='empTable_review' class='display dataTable' style="width:100%">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>User Name</th>
                  <th>Working From</th>
                  <th>Date</th>
                  <th>In Time</th>
                  <th>Out Time</th>
                  <th>Status</th>
                  </tr>
                </thead>
            </table>
            </div>
        </div>
      </div>
<!-- /.box-body-->
    </div>
<!-- /.box -->
  </div>
<!-- /.col (LEFT) -->
</div>
<!-- /.row -->
</section>
<!-- Main content -->
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- reviewer form start -->
<div class="container review_popup_section" >
   <!-- Modal -->
   <div class="modal fade" id="myReviewModal" role="dialog">
      <div class="modal-dialog modal-lg">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Accepted Daily Sheet</h4>
            </div>
            <div class="modal-body" >
               <form class="from" id="dailySheet_review_form" method="POST" >
                  <div class="row">
                     <div class="col-md-12">
                        <button type="button" name="accept" id="accept" value="3" class="btn feedback-btn insert " onclick="submitCheck(this);"> Accept</button>
                        <button type="button" id="reject" name="reject" value="4" class="btn feedback-btn reject-btn insert" onclick="submitCheck(this);"> Reject</button>
                     </div>
                  </div>
                  <div class="panel panel-default main_review_task_section">
                     <div class="panel-heading">
                        <h4>Task Information</h4>
                     </div>
                     <div class="panel-body" id="review_task_section">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="name_label">Name</label>
                                 <input type="text" class="form-control" name="user_name" id="user_name" value="" readonly="">
                              </div>
                              <input type="hidden" class="form-control" name="daily_sheet_id" id="daily_sheet_id" value="" >
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Reporting Authority</label>
                                 <input type="text" class="form-control" name="parent_name" id="parent_name" value="" readonly="">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group datepicker">
                                       <label >Date</label>
                                       <input  type="text" class="form-control" name= "daily_sheet_date" value="" id="daily_sheet_date" readonly="">
                                       <div class="input-group-btn" >
                                          <span class="btn btn-default "  ><i class="material-icons review_popup review_popup">date_range</i></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Working from</label>
                                       <div class="input-group">
                                          <input class="form-control review_select_field"  name="working_from" id='working_from' value="" readonly="">
                                          <div class="input-group-btn">
                                             <span class="btn btn-default" ><i class="material-icons review_popup">home_work</i></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>In Time</label>
                                       <div class="input-group clockpicker">
                                          <input type="text" class="form-control" name="in_time" value="" id="in_time" readonly="">
                                          <div class="input-group-addon">
                                             <span class="" ><i class="material-icons review_popup">access_time</i></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                       <label>Out Time</label>
                                       <div class="input-group clockpicker">
                                          <input type="text" class="form-control" value="" name="out_time"  id="out_time" readonly="">
                                          <div class="input-group-addon">
                                             <span class="" ><i class="material-icons review_popup">access_time</i></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="">
                     <div class="panel panel-default ">
                        <div class="panel-heading">
                           <h4>Activities</h4>
                        </div>
                        <div class="panel-body activity ">
                           <div class ="files">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="panel panel-default feedback">
                     <div class="panel-heading">
                        <h4>Feedback</h4>
                     </div>
                     <div class="panel-body">
                        <div class="reviewer">
                        </div>
                        <div class="row button_section">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <input type="text" class="form-control messanger-text-field"  placeholder="Type your reply here..."  name="feedback" id="feedback" >
                              </div>
                           </div>
                        </div>
                        <div class="row button_section button_section_post">
                           <div class="col-xs-2 col-md-2 plr0">
                              <button type="submit" id="post" value="6" name="post" class="btn post_btn " onclick="submitCheck(this);">POST</button>
                           </div>
                           <div class="col-xs-10 col-md-10 plr0">
                              <div class="form-group custom-file-upload">
                                 <input type="file" name="feedback_attachment[]" id="feedback_attachment" class="form-control feedback_attachment" value="" multiple >
                                 <input type="hidden" name="current_feedback[]" id="current_feedback" class="form-control current_feedback" value="" multiple >
                                 <!-- <div class="col-xs-offset-2 col-xs-10 col-md-offset-2 col-md-10"> -->
                                 <ul class="review_file"></ul>
                                 <!-- </div> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<script type = "text/javascript" >

    /*if ($(window).width() < 767) {
        $('#review_dailysheet_datatable').addClass("table-responsive");
    }
    else {

    $('#review_dailysheet_datatable').removeClass("table-responsive");
}*/

</script>

<!-- reviewer form end -->
<script>
  $(document).ready(function(){

  var dataTable = $('#empTable_review').DataTable({
    'processing': true,
    "language": {
            processing: '<p>Please Wait...</p>'},
    'serverSide': true,
    'serverMethod': 'post',
    'pageLength' :20,
    //'searching': false, // Remove default Search Control

    'ajax': {
       'url':'<?php echo base_url("dailysheet/accepted_fetch_data"); ?>',
       "type": "POST",
       'dataType': "json",
       'data': function(data){
          // Read values
          var name                     = $('#searchByName').val();
          // Append to data
          data.searchByName            = name;
          data.allusernames            = filterAllusernames();
          data.locationfilter          = filterLocation();
          data.datefilter              = filterDatefilter();
          data.filter_date_start       = filter_date_start();
          data.filter_date_end         = filter_date_end();
       }
    },
    'order': [[0,"desc"]],
    'columns': [
      
       { data: 'id' },
       { data: 'first_name' },
       { data: 'working_from' },
       { data: 'daily_sheet_date' },
       { data: 'in_time' },
       { data: 'out_time' },
       { data: 'activity_status' },
       
    ],
    'columnDefs': [
    {
            'targets': 0,
            'searchable': false,
            'orderable': false,
      
            'createdCell':  function (td, cellData, rowData, row, col) {
              $(".total-count-span").text(rowData.iTotalDisplayRecords);
                $(td).attr('id', rowData.srNo); 
                $(td).attr('data-value', rowData.data_value); 
            }
        }
      ]
    
});
  
  $('#searchByName').keyup(function(){
    dataTable.draw();
  });
 
 $(document).on("change", "#allusernames", function(){
    dataTable.draw();
  });
  
  function filterAllusernames(){
    var allusernames  = $("#allusernames").val();
    return allusernames;
  }
  
  // here username filter call 
  $(document).on("change", "#location", function(){
    dataTable.draw();
  });

  function filterLocation(){
    var location      = $("#location").val();
    return location;
  }

  // here username filter call 
  $(document).on("change", "#datefilter", function(){
    dataTable.draw();
  });
  
  function filterDatefilter(){
    var datefilter    = $("#datefilter").val();
    return datefilter;
  }


  function filter_date_start(){
    var filter_date_start    = $("#filter_date_start").val();
    return filter_date_start;
  }

  function filter_date_end(){
    var filter_date_end    = $("#filter_date_end").val();
    return filter_date_end;
  }

$(document).on("change", "#filter_date_end", function(){
    dataTable.draw();
  });
  
$('#filter_date_start,#filter_date_end').datepicker({format    : "dd/mm/yyyy",autoclose : true,todayHighlight: true});
 
});

$("#location").select2({
      allowClear :true,
      placeholder: 'Select Location',
    });

$("#allusernames").select2({
         allowClear :true,
         placeholder: 'Select User',
      });


</script>

<script>

  var filenames = Array();
  var feedback_file_count ="";
  var feedback_count ="";
  var review_files="";
  var file_attachment = "";
 
  $(document).on("change", ".feedback_attachment", function(){

    var thisval = this;
       
    event.preventDefault();
      
    var form_data       = $("#dailySheet_review_form");
    form_data           = new FormData(form_data[0]);
    var file_attachment = $("#current_feedback ").val();
    
    $.ajax({
        url     : '<?php echo base_url(); ?>dailysheet/feedback_upload_file',
        type    : 'POST',
        dataType: "JSON",
        data    : form_data,
        processData: false,
        contentType: false,
        success: function(response){
          if(response.status == "true")
          {
            if(response.files !=""){
              var feedback_temp="";
          
              $(thisval).closest(".custom-file-upload").find('.review_file').empty();
              //review_files = response.files;
                if(file_attachment.length != ""){
                  file_attachment = file_attachment+','+response.files ;
                }else{
                  file_attachment = file_attachment+response.files ;
                }
              
              $(thisval).closest(".custom-file-upload").find('.current_feedback').val(file_attachment);
            
              review_feedback_attachment  = file_attachment.split(',');

              $.each(review_feedback_attachment, function(idx2,val2) { 
            
              feedback_temp = feedback_temp+"<li class='file_list' style='list-style-type: none;color: #707070;'>"+val2+"<span class='material-icons close_feedback_fileList' style='cursor: pointer;font-size: 15px;vertical-align: middle; margin-left:4px;color: #707070;' onclick='update_feedback_delete_files(this);' >close</span></li>";

              feedback_file_count++;

              });   

              $(thisval).closest(".custom-file-upload").find('.review_file').append(feedback_temp);
         
              feedback_count++;
         

            }
          }
        },
    });
  });

  nerestFinalFilesText = [];

  function update_feedback_delete_files(element) {
      
      var deleteHtml            = $(element).closest('li');
      var singleFileDeleteName  = $(deleteHtml).text().split("close");
      var nerestFilesText       = $(deleteHtml).closest('.custom-file-upload').find(".current_feedback").val();

      if( singleFileDeleteName[0] != "" && nerestFilesText != "" ){

        if( nerestFilesText.indexOf(',') != -1 ){
          
          nerestFinalFilesText = nerestFilesText.split(",");

        }else{

          nerestFinalFilesText[0] = nerestFilesText;

        }

        for (var i = 0; i < nerestFinalFilesText.length; i++) {

          if (nerestFinalFilesText[i] === singleFileDeleteName[0]) {
          
            nerestFinalFilesText.splice(i, 1);

          }

        }
        
          $(deleteHtml).closest('.custom-file-upload').find(".current_feedback").val(nerestFinalFilesText);
          $(element).closest('li').remove(); 
      }
    }
 

 function GetMonthName(monthNumber) {
  var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June',
  'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  return months[monthNumber-1];
  }
  
 var  username = "";
 var  reviwerName = "";
// $(".modalopenreview").click( function(event){
$(document).on("click" , "tr[role=row]" , function(event){
  var thisval = $(this);
  $(thisval).prop('disabled', true);
  event.preventDefault();
  if(!event.detail || event.detail==1){
  var statusAction = $(this).find("td").attr("data-value");
  
  var editId = $(this).find("td").attr("id");//

  $('.activity').html('');
  $('.reviewer').html('');
  $(".main_body").html('');

  $.ajax({
    url: '<?php echo base_url(); ?>daily-sheet/review-details',
    type: 'POST',
    dataType: "JSON",
    data: {"editId":editId},
    async  : false,
    
    success: function (response) {

      if (response.status == "true") {
         url = response.data.url;
      
        $("#daily_sheet_id").val(response.data.main.id);
        $("#user_name").val($.trim(response.data.main.user_name));
        $("#parent_name").val(response.data.main.parent_name);
        $("#daily_sheet_date").val(response.data.main.daily_sheet_date);
        $("#working_from").val(response.data.main.working_from);
        $("#in_time").val(response.data.main.in_time);
        $("#out_time").val(response.data.main.out_time);

         // append main daily sheet activity details in modal
        for(i=0 ; i<(response.data.activities).length; i++){
          
          var ifAttachment  = ""; 
          var attachment    = response.data.activities[i].attachment;
          var nameArr       = attachment.split(',');
          // console.log(attachment);
          if((response.data.activities[i].attachment).length  > 0){

            for(j=0; j<(nameArr).length; j++){
             
              if(nameArr[j]!=""){
              
                ifAttachment = ifAttachment+'<a class="download" data="s3://fincrm/Development/'+url+'/daily_sheet/create&review/'+response.data.main.id+'/'+nameArr[j]+'" target="_blank"><span class="glyphicon glyphicon-download-alt"></span><span>&nbsp;&nbsp;&nbsp;'+nameArr[j]+'</span></a>';
             
              }
            }

          }else{
           var ifAttachment  = ""; 
          }

          $('.activity').append('<div class="main_body  activity_border"><div class="row"><div class="col-md-6"><div class="row"><div class="col-md-6"><div class="form-group "><label>Start Time</label><div class="input-group clockpicker"><input type="text" class="form-control new_start_time " name="start_time" id="start_time" value='+response.data.activities[i].start_time+' readonly><div class="input-group-addon"><span class="" ><i class="material-icons review_popup">schedule</i></span></div></div></div></div><div class="col-md-6"><div class="form-group "><label>End Time</label><div class="input-group clockpicker"><input type="text" class="form-control new_end_time"  id="end_time"  name="end_time"  value='+response.data.activities[i].end_time+' readonly><div class="input-group-addon"><span class="" ><i class="material-icons review_popup">schedule</i></span></div></div></div></div></div></div><div class="col-md-6"></div></div><div class="row "><div class="col-md-12"><div class="form-group "><label>Description</label><p class="form-control new_activity_text"  name="activity"  id="activity" value ="" readonly style="word-break:break-all;height:auto">'+$.trim(response.data.activities[i].activity)+'</p></div></div></div><div class="row review_activity"><div class="col-md-12"><label>Attachments</label><div class="form-group custom-file-upload"><div class="dwnload-files">'+ifAttachment+'</div> </div></div></div></div></div></div>');
         
         

         if(attachment.length == 0 ){
             var act_len = $(".main_body").length;
              $(".main_body").eq(act_len-1).find(".review_activity").css("display","none");
         }

          $(".activity .activity_border").addClass("border-bottom");
          $(".activity .activity_border").last().removeClass("border-bottom");
          $(".activity .border-bottom").css("margin-bottom","15px");
          }   
          
          if(statusAction == 'accept'  ){
               if((response.data.feedback).length >0 ){
            $("#accept,#reject").css("display", "none");
            $("[type='submit']").css("display", "none");
            $(".feedback").css("display", "block");
           
            $('#feedback,.file-upload-button').css("display","none");
          }else{
            $("#accept,#reject").css("display", "none");
            $("[type='submit']").css("display", "none");
           
            $('.feedback,.file-upload-button').css("display","none");
          }
          }else{
            $('#feedback').css("display","inline-block");
          }

          if((response.data.feedback).length >0 ){ 
            
            for(i=0 ; i<(response.data.feedback).length; i++){
              var feedback_Attachment=""; 
              var feedback_Attachment_img=""; 
              var feedback_file = response.data.feedback[i].feedback_attachment;
              var separated_feedback_file       = feedback_file.split(',');
             if((response.data.feedback[i].feedback_attachment).length  > 0){
               
                for(k=0; k<(separated_feedback_file).length; k++){
                 
                      if(feedback_Attachment !=""){
                         feedback_Attachment = feedback_Attachment+'</br><a class="download" data="s3://fincrm/Development/'+url+'/daily_sheet/create&review/'+response.data.main.id+'/'+separated_feedback_file[k]+'" target="_blank"><i class="feedback-material-icons-outlined">attach_file</i>&nbsp;'+separated_feedback_file[k]+'</a>';
                      }else{
                         feedback_Attachment = feedback_Attachment+'<a class="download" data="s3://fincrm/Development/'+url+'/daily_sheet/create&review/'+response.data.main.id+'/'+separated_feedback_file[k]+'" target="_blank"><i class="feedback-material-icons-outlined">attach_file</i>&nbsp;'+separated_feedback_file[k]+'</a>';
                      }
                }
           }else if((response.data.feedback[i].feedback_attachment).length = 0){
             feedback_Attachment="";
           }
              var time = response.data.feedback[i].created_at.split(" ")[0];
              var month = time.split("-")[1];
              var monthName = GetMonthName(month);
              var day = time.split("-")[2];
              if ( response.data.feedback[i].feedback_by == "6" ){

                   var senderExsitingFeedback ='<div class="feedback_file_attach row"><div class="row feedback_alignment"><div class=""><div class="part1"><div class="pull-left"><span><img class="avatar image_align" width="20" src="<?php base_url(); ?>assets/dist/img/stream.png"><span class="text_info user_font">'+response.data.feedback[i].feedback_given_by+' posted</span></span></div><div class="pull-right"><span class="text-muted small_text" title='+response.data.feedback[i].created_at+'>'+day+' '+monthName+'</span></div></div></div></div><div class="row part2"><div class="col-md-12 feedback_text_info"><p>'+response.data.feedback[i].feedback+'</p></div></div><div class="row part3"><div class=""><div class="imgs">'+feedback_Attachment+'</div></div></div></div>';
                     
                  $(".reviewer").prepend(senderExsitingFeedback);
                
                } else{

                   var reciverExsitingFeedback ='<div class="feedback_file_attach row"><div class="row feedback_alignment"><div class=""><div class="part1"><div class="pull-left"><span><img class="avatar image_align" width="20" src="<?php base_url(); ?>assets/dist/img/stream.png"><span class="text_info user_font">'+response.data.feedback[i].feedback_given_by+' posted</span></span></div><div class="pull-right"><span class="text-muted small_text" title='+response.data.feedback[i].created_at+'>'+day+' '+monthName+'</span></div></div></div></div><div class="row part2"><div class="col-md-12 feedback_text_info"><p>'+response.data.feedback[i].feedback+'</p></div></div><div class="row part3"><div class=""><div class="imgs">'+feedback_Attachment+'</div></div></div></div>';

                  $(".reviewer").prepend(reciverExsitingFeedback);

                }
                var first_feedback = $(".feedback_file_attach").last();
                first_feedback.addClass("last_fb_section");
                first_feedback.addClass("accept_feedback");
                
            }
          }

          $("#myReviewModal").modal({backdrop: 'static'},"show");

         
          
          $(".review_popup_section #dailySheet_review_form #review_task_section input").prop("disabled", true); 
          $("#review_task_section input").css("padding-left","0px");

          $(".review_popup_section #dailySheet_review_form #review_task_section input").css({"background-color":"#fff","border":"none","box-shadow":"unset"});
          $(".review_popup_section #dailySheet_review_form #review_task_section .input-group-btn span").css("display","none");

          $(".review_popup_section #dailySheet_review_form #review_task_section .input-group-addon").css({"display":"none","border":"none"});

          $(".review_popup_section #dailySheet_review_form #review_task_section  .review_select_field").css({"box-shadow":"unset","border":"none"});


          $(".review_popup_section #dailySheet_review_form .new_start_time").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none","padding-left":"0px"});
          $(" .review_popup_section #dailySheet_review_form .new_end_time").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none","padding-left":"0px"});
          $(" .review_popup_section #dailySheet_review_form .new_activity_text").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none","padding-left":"0px"});   
          $(" .review_popup_section #dailySheet_review_form .input-group-btn span").css("display","none");
          $(" .review_popup_section #dailySheet_review_form .input-group-addon").css({"display":"none","border":"none"});

        // }
      
      
    }else if(response.status == "false") {
        
       
      }
    },
  });

  // return false;
 }
     $(thisval).prop('disabled', false);
});



</script>


<script>
 
  ;(function($) {

        // Browser supports HTML5 multiple file?
        var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
        isIE = /msie/i.test( navigator.userAgent );

        $.fn.customFile = function() {

            return this.each(function() {

              var $file = $(this).addClass('custom-file-upload-hidden'), // the original file input
                $wrap = $('<div class="file-upload-wrapper">'),
                $input = $('<input type="hidden"  class="file-upload-input" multiple/>'),
                // Button that will be used in non-IE browsers
                $button = $('<button type="button" class="file-upload-button"><i class="material-icons-outlined">attach_file</i> </button>'),
                // Hack for IE
                $label = $('<label class="file-upload-button" for="'+ $file[0].id +'"><i class="material-icons-outlined">attach_file</i> </label>');

                // Hide by shifting to the left so we
                // can still trigger events
                $file.css({
                  position: 'absolute',
                  left: '-9999px'
                });

                $wrap.insertAfter( $file ).append( $file, $input, ( isIE ? $label : $button ) );

                // Prevent focus
                $file.attr('tabIndex', -1);
                $button.attr('tabIndex', -1);

                $button.click(function () {
                  $file.focus().click(); // Open dialog
                });

                $file.change(function() {

                  var files = [], fileArr, filename;

                  // If multiple is supported then extract
                  // all filenames from the file array
                  if ( multipleSupport ) {
                    
                    fileArr = $file[0].files;
                      for ( var i = 0, len = fileArr.length; i < len; i++ ) {
                        files.push( fileArr[i].name );
                      }
                      filename = files.join(', ');

                    // If not supported then just take the value
                    // and remove the path to just show the filename
                  } else {
                    filename = $file.val().split('\\').pop();
                  }

                  $input.val( filename ) // Set the value
                  .attr('title', filename) // Show filename in title tootlip
                  .focus(); // Regain focus

              });

                
                $input.on({
                  
                  blur: function() { $file.trigger('blur'); },
                  keydown: function( e ) {
                      
                      if ( e.which === 13 ) { // Enter
                        if ( !isIE ) { $file.trigger('click'); }
                      
                      } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
                        // On some browsers the value is read-only
                        // with this trick we remove the old input and add
                        // a clean clone with all the original events attached
                        $file.replaceWith( $file = $file.clone( true ) );
                        $file.trigger('change');
                        $input.val('');
                      } else if ( e.which === 9 ){ // TAB
                        return;
                      } else { // All other keys
                        return false;
                      }
                  }
                });

            });

          };


          // Old browser fallback
          if ( !multipleSupport ) {
            
            $( document ).on('change', 'input.customfile', function() {

                var $this = $(this),
                // Create a unique ID so we
                // can attach the label to the input
                uniqId = 'customfile_'+ (new Date()).getTime(),
                $wrap = $this.parent(),

                // Filter empty input
                $inputs = $wrap.siblings().find('.file-upload-input')
              .filter(function(){ return !this.value }),

                $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

                // 1ms timeout so it runs after all other events
                // that modify the value have triggered
              setTimeout(function() {
                  
                  // Add a new input
          if ( $this.val() ) {
            // Check for empty fields to prevent
            // creating new inputs when changing files
            if ( !$inputs.length ) {
              $wrap.after( $file );
              $file.customFile();
            }
                    // Remove and reorganize inputs
                  } else {
                    
                      $inputs.parent().remove();
                      // Move the input so it's always last on the list
                      $wrap.appendTo( $wrap.parent() );
                      $wrap.find('input').focus();
                  }

                }, 1);

            });
        }

  }(jQuery));

  $('input[type=file]').customFile();
</script>





</script>

<script type="text/javascript">

     $(".close").click(function(){
       $("#dailySheet_review_form").trigger('reset');
      
      $('#dailySheet_review_form').bootstrapValidator('resetForm',true);
    $.ajax({
      url: '<?php echo base_url(); ?>dailysheet/delete_folder',
      success: function (result) {
        
      },
    });
  });
</script>

<script type="text/javascript">
  
   $(".selected_location,.selected_user,.selected_date,.start_date,.end_date").css("display","none");

 $('#datefilter').select2({
  allowClear :true,
  placeholder: 'Select Date'
   });

  
  $(".Common .close1").css("display","none");
  
  $(".Common").mouseenter(function(){
    $(this).find(".close1").css("display","inline-block");
  });
  $(".Common").mouseleave(function(){
   $(this).find(".close1").css("display","none");
  });

  var len=$(".searchfilter_combine .dropdown .dropdown-menu li").length;
 $(".add_filter li ").click(function(){
    
     $(".select2-search__field").css("width","100%");

     if($(this).index()==0)
     {
      $(".selected_user").css("display","inline-block");
      $(this).css("display","none");
      len-=1;
     }
     if($(this).index()==1)
     {
      $(".selected_location").css("display","inline-block");
      $(this).css("display","none");

      len-=1;
     }
     if($(this).index()==2)
     {
      $(this).css("display","none");
      $(".selected_date").css("display","inline-block");
      len-=1;
     }
     // alert(len);
    

  });


 $(".close1").click(function(){
 
   var closest_div= $(this).closest("div");
   var parent_div=closest_div.parent().css("display","none");
   
   var class_name1=parent_div.attr("class").split(" ")[1];
  
   if(class_name1=="selected_user")
   {
    $('#allusernames').val('').select2({ allowClear :true, placeholder: 'Select User', });
    $("#allusernames").select2("val","");
    $('#empTable_review').dataTable().fnFilter('');
    len+=1;
    $(".searchfilter_combine .add_filter .dropdown-menu li:first").css("display","inline-block");
   }
   if(class_name1=="selected_date")
   {
    $('#datefilter').val('').select2({ allowClear :true, placeholder: 'Select Date', });
    $("#datefilter").val("");
    $('#empTable_review').dataTable().fnFilter('');
    len+=1;
    $(".searchfilter_combine .add_filter .dropdown-menu li:last").css("display","inline-block");
   }if(class_name1=="selected_location")
   {
    $('#location').val('').select2({ allowClear :true, placeholder: 'Select Location', });
    $("#location").val([]);
    $('#empTable_review').dataTable().fnFilter('');
    len+=1;
    $(".searchfilter_combine .add_filter .dropdown-menu li:nth-child(2)").css("display","inline-block");
   }

   });

 $(".add_filter").click(function(){
  if(len==0)
     {
      $(".add_filter .dropdown-menu").css("display","none");
     }
     else
     {
       $(".add_filter .dropdown-menu").removeAttr("style");
     }
 });


$('.refresh-button').on('click', function(){

 $(".selected_location,.selected_user,.selected_date,.start_date,.end_date").css("display","none");
len +=3;
 $('#location').val('').select2({ allowClear :true, placeholder: 'Select Users', });
 $('#allusernames').val('').select2({ allowClear :true, placeholder: 'Select Users', });
 //$('#statusfilter').val([]);
  $('#location').val([]);

 $('#allusernames').val([]);
 $("#datefilter").val("");
 $("#searchByName").val("");

 $('#empTable_review').dataTable().fnFilter('');
 $(".add_filter .dropdown-menu").removeAttr("style");
 $(".searchfilter_combine .add_filter .dropdown-menu li:first").css("display","inline-block");
 $(".searchfilter_combine .add_filter .dropdown-menu li:last").css("display","inline-block");
 $(".searchfilter_combine .add_filter .dropdown-menu li:nth-child(2)").css("display","inline-block");

 $('#datefilter').select2({
  allowClear :true,
  placeholder: 'Select Date'
   });
 $("#filter_date_start,#filter_date_end").val('');
   
});
</script>


<script type="text/javascript">
    $("#datefilter").change(function(){
        var selectedCountry = $(this).children("option:selected").val();
       
        if(selectedCountry==="custom")
        {
          $(".start_date,.end_date").css("display","inline-block");
        }
        else
        {
          $(".start_date,.end_date").css("display","none");
        }
    });
</script>
<script>
function downloadURI(uri, name) {
  var link = document.createElement("a");
  link.download = name;
  link.href = uri;
  link.click();
}

function fuleUnlink(filePath="") {
  if( filePath != "" ){
    $.ajax({
         
      url     : '<?php echo base_url(); ?>dailysheet/unlinkFile',
      type    : 'POST',
      dataType: "JSON",
      data    : {"filePath": filePath},
      success : function(response) {
      }
    });
  }
}
 $(document).on("click",".download",function(){
  var link = $(this).attr("data");
  $.ajax({
         
        url     : '<?php echo base_url(); ?>dailysheet/unzipfolder',
        type    : 'POST',
        dataType: "JSON",
        data    : {"link": link},
       
        success: function(response){
        downloadURI(response.path,response.file_name);
        fuleUnlink(response.deleteFolder);
        },
 });
 });
</script>



<!-- validation for start date and end date -->

<script type="text/javascript">
  
var date_count=0;
var date_count1=0;
$(document).on('change','#filter_date_end',function(){

  date_count++;

  var textDateStart   = $("#filter_date_start").val();
  var stringDateStart = textDateStart.split('/');
  var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );

  var textDateEnd   = $(this).val();
  var stringDateEnd = textDateEnd.split('/');
  var formatDateEnd = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

  // alert(formatDateStart + " "+formatDateStart);

  if(date_count == 3){

   if( formatDateEnd < formatDateStart )
   { 
      $.confirm({
          title: 'Warning!',
          content: 'End Date should be after Start Date',
          buttons: {
              Ok: function () {
                  $("#filter_date_end").val("");
                  // delete_date(count1);
                  date_count=0;
              }
          }
      }); 
   }

  }

  if(date_count>=3) 
  { 
      // delete_date(count1);
      date_count = 0;
      // count1=0;
  }



});

$(document).on('change','#filter_date_start',function(){

  date_count1++;

  var textDateStart   = $(this).val();
  var stringDateStart = textDateStart.split('/');
  var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );

  var textDateEnd   = $("#filter_date_end").val();
  var stringDateEnd = textDateEnd.split('/');
  var formatDateEnd = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

  // alert(formatDateStart + " "+formatDateStart);

  if(date_count1 == 3){

   if( formatDateStart > formatDateEnd )
   { 
      $.confirm({
          title: 'Warning!',
          content: 'Start Date should be before End Date',
          buttons: {
              Ok: function () {
                  $("#filter_date_start").val("");
                  // delete_date(count1);
                  date_count1=0;
              }
          }
      }); 
   }

  }

  if(date_count1>=3) 
  { 
      // delete_date(count1);
      date_count1 = 0;
      // count1=0;
  }



});

</script>