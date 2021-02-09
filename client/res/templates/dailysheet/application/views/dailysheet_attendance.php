
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="processing_data">Please Wait...</div>

    <section class="content content-main-header attendance_header" style="padding-bottom: 0px;">
      <div class="row">
        <div class="col-md-12">
         <!-- Bar chart -->
          <div class="box">
            
            <div class="box-body ">
             <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="">
                       <h4>
                        <!-- <i class="material-icons-outlined attach_money" style="top:4px;">list_alt</i>&nbsp; -->

                      Attendance Sheet</h4>
                    </div>
                 </div>
                 <!-- <div class="col-xs-6 col-md-4">
                   
                 </div> -->
              </div>

                <div class="row">
                  <div class="col-md-4 col-lg-4 col-xs-7 pr10" >
                      <div class="search_bar">
                             <div class="searchfilter">
                           
                                  <div class="input-group">
                                    <input type='hidden' id='isuser' class="form-control isuser" name="isuser" value="<?php echo $isuser; ?>">
                                    <input type='text' id='searchByName' class="form-control search-main" name="searchByName" placeholder="Search...">
                                    <?php foreach($activate_date as $row):?>
                                     <input type='hidden' id="activate_date" value="<?php echo $row['u_created_at']; ?>" >
                                     <?php endforeach;?>
                                    <div class="input-group-btn">
                                      <button class="btn btn-default search btn-icon" type="button"><span class="material-icons-outlined" style="font-size: 18px;">search</span></button>
                                    </div>
                                  </div>
                             
                              </div>

                          </div>
                  </div>
                  <div class="col-md-2 col-lg-1 col-xs-5 refresh plr0">
                     <div class="searchfilter">
                                  <button type="button" class=" refresh-button btn btn-default btn-icon-refresh" data-action="reset" title="Reset">
                                  <i class="material-icons-outlined" aria-hidden="true" >refresh</i>&nbsp;
                                  </button>
                     </div>
                      <div class="dropdown_filter searchfilter_combine" >
                            <div class="dropdown add_filter">
                                <button type="button" class="btn filter-btn btn-icon-refresh dropdown-toggle" id="add_filter_dropdown" data-toggle="dropdown" data-action="filter" title="filter">
                                  <i class="material-icons-outlined first_filter_icon" aria-hidden="true" >filter_list</i>
                               </button>
                               
                                <ul class="dropdown-menu" aria-labelledby="add_filter_dropdown">
                                             <?php if($isuser==1){ ?>
                                              <li  data-name="" id="filter_branch"><a href="#" data-value="another action">Branch</a></li>
                                              <li  data-name="" id="filter_user"><a href="#" data-value="another action">User</a></li>
                                              <?php }else if($isuser==2) {?>
                                              <li  data-name="" id="filter_user"><a href="#" data-value="another action">User</a></li> 
                                              <?php } ?>
                                </ul>      

                          
                              </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-7 col-xs-12 filters">
                    <div class="row container_append">
                      <div class="col-md-3 selected_branch col-sm-4 col-xs-12">
                        <div class="form-group Common">
                          <label class="small">Branch</label>
                          <i class="material-icons-outlined close1 right_alignment" id="">close</i>
                          <select class="form-control" id="allbranches" name="allbranches" style="width: 100%"  >
                          <option value="">Select Branch</option>
                          <?php foreach($branches as $row):?>
                                    
                          <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>

                          <?php endforeach;?>
                                  
                          </select>

                        </div>
                      </div>


                       <div class="col-md-3 selected_user col-sm-4 col-xs-12">
                        <div class="form-group Common">
                          <label class="small">User</label>
                          <i class="material-icons-outlined close1 right_alignment" id="">close</i>
                          <select class="form-control" id="allusernames" name="allusernames" style="width: 100%" >
                          <option value="">Select User</option>
                          </select>

                        </div>
                      </div>

                      <div class="col-md-3 selected_user_onload col-sm-4 col-xs-12">
                        <div class="form-group Common">
                          <label class="small">User</label>
                          <i class="material-icons-outlined close1 right_alignment" id="">close</i>
                          <select class="form-control" id="allusernames_load" name="allusernames_load" style="width: 100%" >
                          <option value="">Select User</option>
                          <?php foreach($AllUserName as $row):?>
                                    
                          <option value="<?php echo $row['id'];?>"><?php echo $row['first_name']." ".$row['last_name'];?></option>

                          <?php endforeach;?>
                                  
                          </select>

                        </div>
                      </div>


                    </div>
                  </div>
                </div>
                

                <!-- <div class="row">
                  <div class="col-md-12">
                    <div class="text-muted total-count">
                        Total: <span class="total-count-span">4</span>
                    </div>
                  </div>
                </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>


     <section class="content ">
      <div class="row">
        <div class="col-md-12">
         <!-- Bar chart -->
          <div class="box">
            
            <div class="box-body attendance_section">

              <div class="row">
                <div class=" col-lg-9 col-md-8 calender_section">
                   <div id="demo1" class="demo1"></div>
                </div>
                <div class="col-lg-3 col-md-4 attendance_border">
                 
                 <div class="row Export1">
                   <div class="col-md-12">
                       <button type="button" class=" btn btn-primary create_pdf" style="float: right;"data-toggle="modal" data-target="#myModal">Export</button>
                   </div>
                 </div>

                 <div class="row Summary_section">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                       <p class="attendance_heading">Summary</p>
                       <button type="button" class="Export2  btn btn-primary create_pdf" style="float: right;"data-toggle="modal" data-target="#myModal">Export</button>
                     </div> 
                    <div class="col-md-12 month_wise_section">
                      <p> Working Days - <span class="attendance-count Working_days">00</span></p>
                      <p> Present Days -<span class="attendance-count no_of_present">00</span></p>
                      <p>Absent Days-<span class="attendance-count no_of_leaves working_hours">00</span></p>

                     </div>

               </div>


                  <div class="row main_legand_section">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="attendance_heading legand">Legend</p>
                     </div>
                     
                       <div class="col-md-6 col-sm-4 col-xs-7 ">

                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                   <span class="attendance_div attendance_present"></span>
                                   <span  class="attendance_name">&nbsp;-&nbsp;Present</span>
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <div>
                                   <span class="attendance_div attendance_weekly"></span>
                                   <span  class="attendance_name">&nbsp;-&nbsp;Weekly Off</span>
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <div>
                                   <span class="attendance_div attendance_holiday"></span>
                                   <span  class="attendance_name">&nbsp;-&nbsp;Holiday</span>
                                </div>
                            </div>
                          </div>
                          
                       </div>
                       <div class="col-md-6 col-sm-8 col-xs-5 legand_section2">

                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                   <span class="attendance_div attendance_absent"></span>
                                   <span  class="attendance_name">&nbsp;-&nbsp;Absent</span>
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <div>
                                   <span class="attendance_div attendance_leave"></span>
                                   <span  class="attendance_name">&nbsp;-&nbsp;Leave</span>
                                </div>
                            </div>
                          </div>


                       </div>
                     <!-- </div> -->
                  </div>


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

  </div>
  <!-- /.content-wrapper -->


<script src="assets/js/calender_js/moment-with-locales.min.js"></script> 
<script src="assets/js/calender_js/ion.calendar.js"></script> 
<script src="assets/js/customA11ySelect.js"></script> 

<script type="text/javascript">
</script>
<script type="text/javascript">

$("[data-toggle='tooltip']").tooltip({
    classes   : "tooltip",
    content:null,
    persistent  : true,
    plainText   : false,
    position  : "auto-right-middle",
    target  : "body",
    trigger   : "hover",

})
  

</script>

<script type="text/javascript">

$(document).mouseup(function(e){
    var container = $(".ic__days .ic__day");

    if(!container.is(e.target) && container.has(e.target).length === 0){
     
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
$(".processing_data").css("display","block");
var pdfdata = [];
var Present = "";
$(document).on('click', '.create_pdf' , function() {
var month = $(".ic__month-select").val();
var year = $(".ic__year-select").val();
var  AllUserNames = null;

if($(".selected_user_onload").css('display') == "block"){
  AllUserNames = $("#allusernames_load").val();
}else if($(".selected_user").css('display') == "block"){
  AllUserNames = $("#allusernames").val();
}else{
  AllUserNames = $("#allusernames_load").val();
}
var SearchByName = $("#searchByName").val();
var arraydata = [];
var TotalHrs  = "";
  $.ajax({
      url: '<?php echo base_url(); ?>dailysheet/SummaryOfAttendance/true',
      type: 'POST',
      data: {"month":month,"year":year,"AllUserNames":AllUserNames,"SearchByName":SearchByName},
      dataType: "JSON",
     
      success: function (data) {
        
        if( data.status == "true" ) {
          
          downloadURI(data.url,data.file_name);
          fuleUnlink(data.path);

        }else{

          $.alert({
            title: 'Alert!',
            content: data.msg,
            type: 'dark',
            typeAnimated: true,
          });

        }

        
       
    
      },

  });

});


var select_date ="";
$( document ).ready(function() {
  //Get System Activation date
  var activate_date= $("#activate_date").val();
  var split = activate_date.split('-');
  var activate_month=('month', split[1]);
  var activate_year=('year', split[0]); //Registration year

  //Get current date
  var d = new Date();
  var current_month = d.getMonth();
  var current_year = d.getFullYear();   //current year

  function summaryfunction (){
     var i="";
    for(i=1; i<=12; i++)
    {
      if(current_month < i)
      {
        $(".ic__month-select option[value=" + i + "]").hide();
      }
    }

  $("#demo1").ionCalendar({
    lang:"en", // set the language of the calendar. Each additional language requires its own localization file
     years:activate_year+"-"+current_year, // Specifies the years range
    sundayFirst: true,
    format: "YYYY-MM-DD",
   });

   $(document).ready(function() {
  $('.ic__month-select, .ic__year-select').customA11ySelect();
  });

    var month = $(".ic__month-select").val();
    var year = $(".ic__year-select").val();
    var  AllUserNames = null;
    if($(".selected_user_onload").css('display') == "block"){
      AllUserNames = $("#allusernames_load").val();
    }else if($(".selected_user").css('display') == "block"){
      AllUserNames = $("#allusernames").val();
    }else{
      AllUserNames = $("#allusernames_load").val();
    }
    var SearchByName = $("#searchByName").val();
    $.ajax({
    url: '<?php echo base_url(); ?>dailysheet/SummaryOfAttendance',
    type: 'POST',
    data: {"month":month,"year":year,"AllUserNames":AllUserNames,"SearchByName":SearchByName},
    dataType: "JSON",
    success: function (data) {
      if(data != null){
    title = $(".ic__day").attr("title");
     $("tr .ic__day").css({'background-color': ''});
     $("tr .ic__day").removeClass('holiday_section');
  
    for(j=1; j < ($('tr').length +1); j++)
     {
      for(i=1; i < 8; i++)
        {
          var day = $("tr:nth-child("+j+") .ic__day:nth-child("+i+")").text();
          var current_day = $(".ic__day_state_current").text();
          
        if(day !=""){
        
          for(var k=0; k < (data.containt).length ; k++){
             dbdate = data.containt[k].daily_sheet_date;
             var new_val =  dbdate.split('-');
             dateDay = parseInt(new_val[2]);
             var wOffDays = null;
             var notSetEweeklyOff = true;
           for($r = 0 ; $r < data.weekly_of_days.length ;$r++){
           
           if(wOffDays != null){
            offdays = data.containt[k].day == data.weekly_of_days[$r];
            notOffdays = data.containt[k].day != data.weekly_of_days[$r];
            wOffDays = wOffDays || offdays;
            notSetEweeklyOff = notSetEweeklyOff && notOffdays;
           }else{
            offdays = data.containt[k].day == data.weekly_of_days[$r];
            notOffdays = data.containt[k].day != data.weekly_of_days[$r];
            wOffDays = offdays;
            notSetEweeklyOff = notOffdays;
           }
           
           }
          //dailysheet feel
           if(day == dateDay && new_val[1]==(parseInt(month)+1) && data.containt[k].intime != "NA" && (notSetEweeklyOff) && new_val[0]==year){
            $("tr:nth-child("+j+") .ic__day:nth-child("+i+")").css("background-color","#86CF68");
             $("tr:nth-child("+j+") .ic__day:nth-child("+i+")").attr("title","In Time - "+data.containt[k].intime+"\n"+"Out Time - "+data.containt[k].outtime+"\n"+"Hours - "+data.containt[k].occesion+"");
           }
           
           
          if(day == dateDay && new_val[1]==(parseInt(month)+1) && (wOffDays) && new_val[0]==year){
            
          $("tr:nth-child("+j+") .ic__day:nth-child("+i+")").css("background-color","#DDDDDD");
          $("tr:nth-child("+j+") .ic__day:nth-child("+i+")").attr("title","In Time - "+data.containt[k].intime+"\n"+"Out Time - "+data.containt[k].outtime+"\n"+"Hours - "+data.containt[k].occesion+"");
          }
          
          if(day == dateDay && new_val[1]==(parseInt(month)+1) &&  data.containt[k].intime == "NA" &&  (notSetEweeklyOff) && new_val[0]==year){
          
          $("tr:nth-child("+j+") .ic__day:nth-child("+i+")").css("background-color","#46C5E5");
           $("tr:nth-child("+j+") .ic__day:nth-child("+i+")").attr("title","\n"+data.containt[k].occesion+"");
          }

          if(parseInt(day) > parseInt(current_day)) {
       
          $("tr:nth-child("+j+") .ic__day:nth-child("+i+")").css("background-color","#f4f4f4");
          $("tr:nth-child("+j+") .ic__day:nth-child("+i+")").removeAttr("title");
          }

          if(new Date().getMonth() < month && (new Date).getFullYear() <= year ){
           $(".ic__day").css("background-color","#f4f4f4");
          }

          if(day == dateDay && new_val[1]==(parseInt(month)+1) && new_val[0]==year && data.containt[k].intime == "NA" &&  data.containt[k].hours == "Holiday" ){
          $("tr:nth-child("+j+") .ic__day:nth-child("+i+")").addClass("holiday_section");
          }

        }
       
      }
     
    }
    
  }

  
    $(".Working_days").text(data.summary.WorkingDays);
    $(".no_of_leaves").text(data.summary.leaves);
    $(".no_of_present").text(data.summary.totalRecords);
    $(".processing_data").css("display","none");
   }
    },
  });
}


  $(document).on("change","#allbranches", function(){

     var AllBranches              = $("#allbranches").val();

      $.ajax({
        url: '<?php echo base_url(); ?>dailysheet/filterHtmlOfUser',
        type: 'POST',
        data: {"AllBranches":AllBranches},
        dataType: "JSON",
        success: function (data) {
           $("#allusernames").html(data.userHtml);
        },

      });
  }); 


$(document).ready(function() { 

$("#allbranches").select2({
    allowClear :true,
    placeholder: 'Select Branch',
}); 

$("#allusernames,#allusernames_load").select2({
    allowClear :true,
    placeholder: 'Select User',
});    

$(".processing_data").css("display","block");
  summaryfunction() });

$(document).on("change",".ic__month-select, #allusernames,#allusernames_load,.ic__year-select" , function() { 
$(".processing_data").css("display","block");
  summaryfunction() });

$(document).on("click",".ic__prev,.ic__next,.close1,.refresh-button" , function() { 
$(".processing_data").css("display","block");
  summaryfunction() });


$(document).on("keyup","#searchByName" , function() { 
$(".processing_data").css("display","block");
  summaryfunction() });
});
$(".selected_branch,.selected_user").css("display","none");

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
       if($("#isuser").val()==1){
        if($(this).index()==0)
        {
        
          if($(".selected_user_onload").css("display") =="block"){
          $(".selected_branch").css("display","inline-block");
          $(".selected_user").css("display","inline-block");
          $(".selected_user_onload").css("display","none");
          $(this).css("display","none");
          len-=1;
        }else{
          $(".selected_branch").css("display","inline-block");
          $(".selected_user").css("display","inline-block");
          $(this).css("display","none");
          len-=2;
       
        }
      }
       
       if($(this).index()==1)
        {
        $(this).css("display","none");
        $(".selected_user_onload").css("display","inline-block");
        len-=1;
        }
      }else if($("#isuser").val()==2){
        if($(this).index()==0)
        {
        $(this).css("display","none");
        $(".selected_user_onload").css("display","inline-block");
        len-=1;
        }
      }
        
  });

 $(document).on("click",".close1",function(){
  
   var closest_div= $(this).closest("div");
   var parent_div=closest_div.parent().css("display","none");
   $(".selected_user,.selected_branch,.selected_user_onload").css("display","none");
   var class_name1=parent_div.attr("class").split(" ")[1];
      
    if(class_name1=="selected_branch")
     {
      
      $("#allbranches").val("");
      $("#allusernames").val("");
      var select_user = '<option value="">Select Branch</option>';
      $("#allusernames").html(select_user);
      var select_user1 = '<option value="">Select User</option>';
      $("#allusernames").html(select_user1);
      len+=2;
      $(".searchfilter_combine .add_filter .dropdown-menu li:first").css("display","inline-block");
      $(".searchfilter_combine .add_filter .dropdown-menu li:last").css("display","inline-block");
     
     }

     if(class_name1=="selected_user")
     {
      var select_user = '<option value="">Select User</option>';
      $("#allusernames").html(select_user);
      $("#allusernames").val("");
      $("#allbranches").val("");
      len+=2;
      $(".searchfilter_combine .add_filter .dropdown-menu li:first").css("display","inline-block");
      $(".searchfilter_combine .add_filter .dropdown-menu li:last").css("display","inline-block");
     
     }

     if(class_name1=="selected_user_onload")
     {
      $("#allusernames_load").val("");
      len+=1;
      $(".searchfilter_combine .add_filter .dropdown-menu li:first").css("display","inline-block");
      $(".searchfilter_combine .add_filter .dropdown-menu li:last").css("display","inline-block");
     
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

  $(document).on('click','.refresh-button', function(){
    
    $(".selected_user,.selected_branch,.selected_user_onload").css("display","none");
    len =2;
    $('#allusernames').val("");
    $('#allbranches').val("");
    $("#allusernames_load").val("");
    $("#allusernames").html('<option value="">Select User</option>');
    $(".add_filter .dropdown-menu").removeAttr("style");
    $(".searchfilter_combine .add_filter .dropdown-menu li:first").removeAttr("style");
    $(".searchfilter_combine .add_filter .dropdown-menu li:last").removeAttr("style");

  });

</script>


