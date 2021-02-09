
<script src="<?php echo base_url()?>assets/js/jquery-validation/jquery.validate.min.js"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <p class="processing_text" style="display:none"></p>

    <section class="content content-main-header" style="padding-bottom: 0px;">
      <div class="row">
        <div class="col-md-12">
         <!-- Bar chart -->
          <div class="box">
            <div class="box-body">
             <div class="row">
                <div class="col-xs-10 col-md-8">
                    <div class="">
                       <h4>
                        <!-- <i class="material-icons-outlined attach_money">create</i>  -->

                        Create Daily Sheet
                      </h4>
                    </div>
                 </div>
                 <div class="col-xs-2 col-md-4">
                    <button type="button" class="btn btn-primary create_form" style="float: right;"data-toggle="modal" data-target="#myModal"><i class="material-icons-outlined" >add</i><span id="create_form_span">Create Daily Sheet</span></button>
                 </div>
              </div>

                <div class="row">
                  <div class="col-md-4 col-lg-4  col-xs-7 pr10" >
                      <div class="search_bar">
                             <div class="searchfilter">
                           
                                  <div class="input-group">
                                    <input type='text' id='searchByName' class="form-control search-main" name="searchByName" placeholder="Search...">
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
                                              <li  data-name="select_status_list_item" id="filter_status"><a href='#' data-name='action'>Status</a></li>
                                              <li data-name="select_user_list_item" id="filter_user"><a href="#" data-value="another action">Working From</a></li>
                                              <li  data-name="select_team_list_item" id="filter_team"><a href="#" data-value="another action">Date</a></li>
                                </ul>

                          
                              </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-7 col-xs-12 filters">
                    
                    <div class="row container_append">
                            
                      <div class="col-md-3 selected_status col-xs-12 col-sm-4 " >
                        <div class="form-group Common">
                          <label class="user small">Status</label>
                            <i class="material-icons-outlined close1 right_alignment">close</i>
                            <select class="form-control location" id="statusfilter" name="statusfilter" multiple="" style="width: 100%">
                               
                               <option value="1">Save as Draft</option>
                                <option value="2">Submitted</option>
                                <option value="3">Accepted</option>
                                <option value="4">Rejected</option>
                            </select>
                         </div>
                      </div>

                      <div class="col-md-3 selected_date col-xs-12 col-sm-4 ">
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


                      <div class="col-md-3 selected_location col-xs-12 col-sm-4 " >
                            <div class="form-group Common">
                              <label class="user small">Working From</label>
                                <i class="material-icons-outlined close1 right_alignment">close</i>
                                <select class="form-control location" id="location" name="location"  multiple="" style="width:100%">
                                   
                                   <?php foreach($select_braches as $row):?>
                                             <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                             <?php endforeach;?>
                                             <!-- <option value="d3ffdedewsawsdeds">Client Place</option>
                                             <option value="d3ffpdedjwsapsaes">Home</option> -->
                                             <option value="Client Place">Client Place</option>
                                             <option value="Home">Home</option>
                                </select>
                             </div>
                      </div>
                    </div>


                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="text-muted total-count">
                        Total: <span class="total-count-span">0</span>
                    </div>
                  </div>
                </div>
            
          </div>
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
                  
                <div id='create_dailysheet' class="table-responsive">
        
                   <table id='empTable' class='display dataTable' style="width:100%">
                     <thead>
                       <tr>
                         <th>No</th>
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

  <!-- pop up form start for add daily sheet -->
  <div class="container create_popup_section" >
     <!-- Modal -->
     <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
           <!-- Modal content-->
           <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close dailysheet_close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title create_title">Create &gt; Daily Sheet</h4>
              </div>
              <div class="modal-body" >
                 <form action="" method="post" id="dailySheet_form" autocomplete="off">
                    <div class="row">
                      <div class="col-md-12">
                          <button type="submit" name="submit" id="submit" value="1" class="btn insert footer-btn" onclick="submitCheck(this);"> Save as draft</button>
                          <button  type="submit" name ="submit_btn" id="submit_btn" value="2" class="btn footer-btn insert footer-btn2" onclick="submitCheck(this);"> Submit</button>

                          <span  class="btn edit">Edit</span>
                      </div>
                    </div>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" >
                    <div class="panel panel-default main_task_section">
                       <div class="panel-heading">
                        <h4>Task Information</h4>
                       </div>
                       <div class="panel-body" id="task_section">
                          <div class="row">
                             <div class="col-md-6">
                                <div class="form-group employee_Name_group">
                                   <label>Name<span class="text-danger">  *</span></label>
                                   <input type="text" class="form-control employee_name" name="employee_name" id="employee_name" value="<?php echo trim($_SESSION['username']," ");?>" readonly>
                                   <input type="hidden" class="form-control employee_name" name="employee_id" id="employee_id" value="<?php echo trim($_SESSION['userId']," ");?>" >
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group reporting_name_group">
                                   <label>Reporting Authority<span class="text-danger">  *</span></label>
                                   <input type="text" class="form-control reporting_name" name="reporting_name" value="<?php echo $_SESSION['reviewer'];?>" id="reporting_name" readonly>
                                   <input type="hidden" class="form-control reporting_name" name="reporting_id" id="reporting_id" value="<?php echo $_SESSION['reviewerId'];?>">
                                </div>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-6">
                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group date_1_group">
                                         <label >Date<span class="text-danger">  *</span></label>
                                         <div class="input-group">
                                            <input type="text" class="form-control date_1" name="date_1" id="date_1" onclick="getDateEvent(this)" onkeydown="return false" readonly>
                                            <span class="input-group-addon" onclick="focus_datepicker(this)">
                                               <span class="date_section"  ><i class="material-icons-outlined create_popup">date_range</i></span>
                                            </span>
                                         </div>
                                         <div class="date_error"></div>
                                         <input type="text" class="form-control duplicate_of_date display_none date_1" >
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group working_from_group">
                                         <label>Working From<span class="text-danger" >  *</span></label>
                                         <div class="input-group">
                                            <select class="form-control working_from" name="working_from" id="working_from" style="display: none;">
                                               <option value="">Select</option>
                                               
                                               <?php foreach($select_braches as $row):?>
                                               <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                               <?php endforeach;?>
                                              <!--  <option value="d3ffdedewsawsdeds">Client Place</option>
                                               <option value="d3ffpdedjwsapsaes">Home</option> -->

                                               <option value="Client Place">Client Place</option>
                                             <option value="Home">Home</option>
                                               
                                            </select>
                                            <div class="input-group-addon">
                                               <span class="" ><i class="material-icons-outlined create_popup">home_work</i></span>
                                            </div>
                                         </div>
                                          <input type="text" name="" class="form-control duplicate_working_from display_none">
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group inTime_group">
                                         <label>In Time<span class="text-danger">  *</span></label>
                                         <div class="input-group">
                                            <input type="text" name="inTime" id="inTime"class="form-control inTime clockpicker clockpicker_position"  onfocus="getEvent(this)" onkeydown="return false" readonly>
                                            <span class="input-group-addon add_clockpicker" onclick="getAddEvent(this)">
                                               <span class="" ><i class="material-icons-outlined create_popup">access_time</i></span>
                                            </span>
                                         </div>
                                            <input type="text" class="form-control duplicate_add_intime_clockpicker display_none">
                                      </div>
                                      
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group outTime_group">
                                         <label>Out Time<span class="text-danger">  *</span></label>
                                         <div class="input-group">
                                            <input type="text" name="outTime" id="outTime" class="form-control outTime clockpicker" onfocus="getEvent(this)" onkeydown="return false" readonly>
                                            <span class="input-group-addon add_clockpicker"onclick="getAddEvent(this)">
                                               <span class="" ><i class="material-icons-outlined create_popup">access_time</i></span>
                                            </span>
                                         </div>
                                            <input type="text" class="form-control duplicate_add_outtime_clockpicker display_none">
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
                          <div class="panel-body parent-append">
                             <div class="main_body clone-panel "  >
                                <div class="row hello">
                                   <div class="col-md-6">
                                      <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group new_start_time_group">
                                               <label>Start Time<span class="text-danger">  *</span></label>
                                               <div class="input-group">
                                                  <input type="text" class="form-control new_start_time clockpicker" name="activity_inTime[]"  onchange="new_start_time_on_change(this);" onfocus="getEvent(this)" onkeydown="return false" readonly>
                                                  <span class="input-group-addon add_clockpicker" onclick="getAddEvent(this)">
                                                     <span class="" ><i class="material-icons-outlined create_popup">schedule</i></span>
                                                  </span>
                                               </div>
                                                  <input type="text" class="form-control duplicate_add_newtime_clockpicker display_none">
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group new_end_time_group">
                                               <label>End Time<span class="text-danger">  *</span></label>
                                               <div class="input-group">
                                                  <input type="text" class="form-control new_end_time clockpicker"  name="activity_outTime[]"   onchange="new_end_time_on_change(this);" onfocus="getEvent(this)" onkeydown="return false"readonly>
                                                  <span class="input-group-addon add_clockpicker" onclick="getAddEvent(this)">
                                                     <span class="" ><i class="material-icons-outlined create_popup">schedule</i></span>
                                                  </span>
                                               </div>
                                                  <input type="text" class="form-control duplicate_add_endtime_clockpicker display_none">
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <span class="material-icons-outlined delete" style="float: right;">delete_outline</span>
                                      <!-- <span class="glyphicon glyphicon-trash delete" ></span> -->
                                   </div>
                                </div>
                                <div class="row ">
                                   <div class="col-md-12">
                                      <div class="form-group activity_group">
                                         <label>Description<span class="text-danger">  *</span></label>
                                         <textarea class="form-control new_activity_text" name="activity_msg[]" onfocusout="new_activity_on_change(this);" onkeyup="textAreaAdjust_add(this)"></textarea> 
                                      </div>
                                   </div>
                                </div>
                                <div class="row">
                                   <div class="col-xs-2 col-sm-1 col-md-1">
                                      <div class="form-group attach_section">
                                        <label>Attachments</label>
                                         <input type="file" class="file-upload form-control attachment" id="attachment[0]" name="attachment[0][]" multiple onchange="uploadFiles(this)"/>
                                         <input type="hidden" class="form-control attach_files" id="attach_files[0]" name="attach_files[0]" value=""/>
                                         <button type="button" class="openFileBrowse file-upload-button"><i class="material-icons-outlined">attach_file</i> </button>
                                       
                                      </div>
                                   </div>
                                   <div class="col-xs-10 col-sm-11 col-md-11 attach">
                                      <div>
                                         <ul class="fileList" ></ul>
                                         <ul class="fileList_text" ></ul>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <!-- clone HTML  -->
                             <div class="main_body  hide " id="optionTemplate" >
                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group new_start_time_group">
                                               <label>Start Time<span class="text-danger">  *</span></label>
                                               <div class="input-group">
                                                  <input type="text" class="form-control new_start_time clockpicker" name="" id="clone_start_time" onchange="new_start_time_on_change(this);" onfocus="getEvent(this)" onkeydown="return false" readonly>
                                                  <span class="input-group-addon add_clockpicker" onclick="getAddEvent(this)">
                                                     <span class="" ><i class="material-icons create_popup">schedule</i></span>
                                                  </span>
                                               </div>
                                                  <input type="text" class="form-control duplicate_add_newtime_clockpicker display_none">
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group new_end_time_group">
                                               <label>End Time<span class="text-danger">  *</span></label>
                                               <div class="input-group">
                                                  <input type="text" class="form-control new_end_time clockpicker"  name="" id="clone_end_time"  onchange="new_end_time_on_change(this);" onfocus="getEvent(this)" onkeydown="return false" readonly>
                                                  <span class="input-group-addon add_clockpicker" onclick="getAddEvent(this)">
                                                     <span class="" ><i class="material-icons create_popup">schedule</i></span>
                                                  </span>
                                               </div>
                                                  <input type="text" class="form-control duplicate_add_endtime_clockpicker display_none">
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <span class="material-icons-outlined delete" style="float: right;">delete_outline</span>
                                   </div>
                                </div>
                                <div class="row ">
                                   <div class="col-md-12">
                                      <div class="form-group activity_group">
                                         <label>Description<span class="text-danger">  *</span></label>
                                         <textarea class="form-control new_activity_text" name="" onfocusout="new_activity_on_change(this);" onkeyup="textAreaAdjust_add(this)" ></textarea> 
                                      </div>
                                   </div>
                                </div>
                                <div class="row">
                                   <div class="col-xs-2 col-sm-1 col-md-1">
                                      <div class="form-group">
                                         <label>Attachments</label>
                                         <input type="file" name="file" class="file-upload attachment" id="" multiple onchange="uploadFiles(this)"/>
                                         <input type="hidden" class="form-control attach_files" id="" name="" value=""/>
                                         <button type="button" class="openFileBrowse file-upload-button"><i class="material-icons-outlined">attach_file</i> </button>
                                      </div>
                                   </div>
                                   <div class="col-xs-10 col-sm-11 col-md-11">
                                      <div>
                                         <ul class="fileList" ></ul>
                                         <ul class="fileList_text" ></ul>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <!-- clone HTML, -->
                          </div>
                       </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12">
                          <!-- <input type="text" name="create_action_perform" id="create_action_perform" value="" > -->
                          <button type="button" class="btn footer-btn clone addButton footer-btn3"> Add Activity</button>
                       </div>
                    </div>
                 </form>
              </div>
           </div>
        </div>
     </div>
  </div>
  <!-- pop up of add daily sheet  form end -->

  <!-- pop up of edit daily sheet  form end -->

  <div class="container create_edit_popup_section" >
     <!-- Modal -->
     <div class="modal fade" id="editDailySheet" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
           <!-- Modal content-->
           <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close edit_dailysheet_close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title edit_title">Edit Daily Sheet</h4>
              </div>
              <div class="modal-body" >
                 <form action="" method="post" id="update_dailySheet_form" autocomplete="off" >
                    <div class="row">
                      <div class="col-md-12">
                          <button type="submit" name="update_submit" id="update_submit" value="1" class="btn insert footer-btn" onclick="submitCheck(this);"> Save as draft</button>
                          <button  type="submit" name="update_submit_btn" id="update_submit_btn" class="btn footer-btn footer-btn2" onclick="submitCheck(this);" value="2"> Submit</button>
                          <span class="btn update_edit">Edit</span>
                      </div>
                    </div>
                    <div class="panel panel-default main-update_task_section">
                       <div class="panel-heading "><h4 class="border-bottom">Task Information</h4>
                       </div>
                       <div class="panel-body" id="update_task_section">
                          <div class="row">
                             <div class="col-md-6">
                                <div class="form-group update_employee_Name_group">
                                   <label>Name<span class="text-danger">  *</span></label>
                                   
                                   <input type="text" class="form-control update_employee_Name" name="update_employee_Name" id="update_employee_Name" value=""  readonly >
                                   <input type="hidden" class="form-control daily_sheet_id" name="daily_sheet_id" id="daily_sheet_id" value="">
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group update_reporting_name_group">
                                   <label>Reporting Authority<span class="text-danger">*</span></label>
                                   <input type="text" class="form-control update_reporting_name" name="update_reporting_name" id="update_reporting_name" value=""  readonly >
                                  
                                </div>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-6">
                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group update_date_1_group">
                                         <label >Date<span class="text-danger">  *</span></label>
                                         <div class="input-group">
                                            <input type="text" class="form-control update_date_1" name="update_date_1" id="update_date_1" value="" onclick="getUpdateDateEvent(this)" onkeydown="return false">
                                            <label class="input-group-btn" for="update_date_1">
                                               <span class="btn btn-default date_section"  ><i class="material-icons create_popup" style="padding: 4px 0px;">date_range</i></span>
                                            </label>
                                         </div>
                                          <div class="date_error"></div>
                                          <input type="text" class="form-control duplicate_update_date update_date_1 display_none" name="">
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group update_working_from_group">
                                         <label>Working From<span class="text-danger">  *</span></label>
                                         <div class="input-group">
                                            <select class="form-control update_working_from" name="update_working_from" id="update_working_from" style="display: none;">
                                               <option value="">Select</option>
                                               
                                               <?php foreach($select_braches as $row):?>
                                               <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                               <?php endforeach;?>
                                               <!-- <option value="d3ffdedewsawsdeds">Client Place</option>
                                               <option value="d3ffpdedjwsapsaes">Home</option> -->

                                               <option value="Client Place">Client Place</option>
                                             <option value="Home">Home</option>
                                               
                                            </select>
                                            <div class="input-group-btn">
                                               <span class="btn btn-default" ><i class="material-icons create_popup" style="padding: 4px 0px;">home_work</i></span>
                                            </div>
                                         </div>
                                         <input type="text" name="" class="form-control update_duplicate_working_from display_none">
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="row">
                                   <div class="col-md-6 update_inTime_group">
                                      <div class="form-group">
                                         <label>In Time<span class="text-danger">  *</span></label>
                                         <div class="input-group">
                                            <input type="text" name="update_inTime" class="form-control update_inTime update_clockpicker"  id="update_inTime" value="" onfocus="getEventUpdate(this)" onkeydown="return false">
                                            <span class="input-group-addon"   onclick="getIcon(this)">
                                               <span class="" ><i class="material-icons create_popup">access_time</i></span>
                                            </span>
                                         </div>
                                          <input type="text" class="form-control duplicate_update_intime_clockpicker display_none">
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group update_outTime_group">
                                         <label>Out Time<span class="text-danger">  *</span></label>
                                         <div class="input-group">
                                            <input type="text" name="update_outTime" class="form-control update_outTime update_clockpicker"  id="update_outTime" value="" onfocus="getEventUpdate(this)" onkeydown="return false">
                                            <span class="input-group-addon"  onclick="getIcon(this)" >
                                               <span class="" ><i class="material-icons create_popup">access_time</i></span>
                                            </span>
                                         </div>
                                         <input type="text" class="form-control duplicate_update_outtime_clockpicker display_none">
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="panel panel-default edit_activity ">
                       <div class="panel-heading"><h4>Activities</h4></div>
                       <div class="panel-body update-parent-append ">
                          <!-- // Update modal : clone HTML  -->
                          <div class="main_body  hide " id="update_optionTemplate" >
                             <div class="row">
                                <div class="col-md-6">
                                   <div class="row">
                                      <div class="col-md-6">
                                         <div class="form-group update_new_start_time_group">
                                            <label>Start Time<span class="text-danger">  *</span></label>
                                            <div class="input-group">
                                               <input type="text" class="form-control update_new_start_time update_clockpicker" name="" id="" onchange="update_new_start_time_on_change(this);" onfocus="getEventUpdate(this)" onkeydown="return false">
                                               <span class="input-group-addon" onclick="getIcon(this)">
                                                  <span class="" ><i class="material-icons create_popup">schedule</i></span>
                                               </span>
                                            </div>
                                             <input type="text" class="form-control duplicate_update_newtime_clockpicker display_none">
                                         </div>
                                      </div>
                                      <div class="col-md-6">
                                         <div class="form-group update_new_end_time_group">
                                            <label>End Time<span class="text-danger">  *</span></label>
                                            <div class="input-group">
                                               <input type="text" class="form-control update_new_end_time update_clockpicker"  name="" id=""  onchange="update_new_end_time_on_change(this);" onfocus="getEventUpdate(this)" onkeydown="return false">
                                               <span class="input-group-addon" onclick="getIcon(this)" >
                                                  <span class="" ><i class="material-icons create_popup">schedule</i></span>
                                               </span>
                                            </div>
                                              <input type="text" class="form-control duplicate_update_endtime_clockpicker display_none">
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="material-icons-outlined update_delete" style="float: right;">delete_outline</span>
                                   
                                </div>
                             </div>
                             <div class="row ">
                                <div class="col-md-12">
                                   <div class="form-group update_activity_group">
                                      <label>Description<span class="text-danger">  *</span></label>
                                      <textarea class="form-control update_new_activity_text"  name="" onfocusout="update_new_activity_on_change(this);"  onkeyup="textAreaAdjust(this)" ></textarea> 
                                   </div>
                                </div>
                             </div>
                             <div class="row edit_attach">
                                <div class="col-xs-2 col-sm-1 col-md-1">
                                   <div class="form-group ">
                                      <label>Attachments</label>
                                      <input type="file" id="" class="update_file-upload" multiple onchange="update_uploadFiles(this)"/>
                                      <input type="hidden" class="form-control update_Attachment" />
                                      <input type="hidden" class="form-control current_Attachment" />
                                      <input type="hidden" class="form-control update_ifAttachmentExiting" value=""/>
                                      <button type="button" class="update_openFileBrowse update_file-upload-button"><i class="material-icons-outlined">attach_file</i> </button>
                                   </div>
                                </div>
                                <div class="col-xs-10 col-sm-11 col-md-11">
                                   <div>
                                      <ul class="update_fileList"></ul>
                                      <ul class="current_update_fileList"></ul>
                                   </div>
                                </div>
                             </div>
                             <!-- // Update modal : clone HTML  -->
                             <!-- HERE DYNAMIC APPEND HTML -->
                          </div>
                       </div>
                    </div>
                   
                  

                    <!-- // Update modal : Feedback HTML  -->
                  

                    <div class="panel panel-default feedback">
                       <div class="panel-heading "><h4 class="border-bottom">Feedback</h4></div>
                       <div class="panel-body ">
                         
                          <!-- feedback new post feedback -->
                          <div class="row button_section feedback-attach">
                             <div class="col-md-12">
                                <input type="text" class="form-control messanger-text-field" name="feedback" id="feedback" value="" placeholder="Type your reply here" >
                                <p class="feedback_error " id ="feedback_error" style="display:none;">please enter your Feedback.</p>
                             </div>
                             
                           

                              <div class="col-md-2">
                                    <div class="">
                                      <div class="form-group sender_attach_files">
                                       <input type="file" class="feedback_update_file-upload" multiple name="feedback_attachment[]" id="feedback_attachment" onchange="fbuploadFiles(this)"/>
                                       <input type="hidden" name="current_feedback[]" id="current_feedback" class="form-control current_feedback" value="" >
                                       <div class="review_file"></div>
                                       <button type="button" name="user_feedback" id="user_feedback" value="5" class="btn post_btn user_feedback " onclick="submitCheck(this);">POST</button>
                                       <button type="button" class="update_feedback_openFileBrowse update_file-upload-button"><i class="material-icons-outlined">attach_file</i> </button>
                                    </div>
                                    </div>
                              </div>
                              <div class="col-md-10 pl0">
                                  <div>
                                   <ul class="update_feedback_fileList"></ul>
                                   <ul class="text_update_feedback_fileList"></ul>
                              </div>
                          </div>
                                
                            

                             <!-- <div class="col-md-12">
                                <div>
                                   <ul class="update_feedback_fileList"></ul>
                                </div>
                             </div> -->
                          </div>
                          <!-- feedback new post feedback -->
                        <div class="feedback_existing_append">
                             <!-- HTML APPEND HERE -->
                          </div>
                       </div>
                   
                    </div>
                    <!-- // Update modal : Feedback HTML  -->
                    <div class="row">
                       <div class="col-md-12">
                          <button type="button" class="btn footer-btn update_clone addButton update_footer-btn3"> Add Activity</button>
                       </div>
                    </div>
                 </form>
              </div>
           </div>
        </div>
     </div>
  </div>

  <!-- pop up of edit daily sheet  form end -->



<!------------------------- start script section  ------------------------->
  <script type="text/javascript">

  $(document).ready(function(){
    $("*").dblclick(function(e){
      e.preventDefault();
    });
  }); 

</script>


  <script >
    
    var globalSubmitvalue = null;
    
    function submitCheck(element){
      globalSubmitvalue = $(element).val();
      
    }

  </script>
  <script>

    $.fn.dataTable.ext.buttons.reload = {
    text: 'Reload',
      action: function ( e, dt, node, config ) {
          dt.ajax.reload();
      }
    };

    $(document).ready(function(){
    
      var dataTable = $('#empTable').DataTable({
      'processing': true,
      "language": {
              processing: '<p>Please Wait...</p>'},
   
      'serverSide': true,
      'serverMethod': 'post',
      'pageLength' :20,
       
    //'searching': false, // Remove default Search Control
      'ajax': {
         'url':'<?php echo base_url("dailysheet/fetch_data"); ?>',
         "type": "POST",
         'dataType': "json",
         'data': function(data){
            // Read values
          var name = $('#searchByName').val();
            // Append to data
          data.searchByName = name;
          data.locationfilter   = filterLocation();
          data.datefilter       = filterDatefilter();
          data.statusfilter       = filterStatusfilter();
          data.filter_date_start       = filter_date_start();
          data.filter_date_end       = filter_date_end();
         }
      },
     'order': [[0,"desc" ]],
     
     'columns': [
       {data : 'id'},
       { data: 'working_from' },
       { data: 'daily_sheet_date' },
       { data: 'in_time' },
       { data: 'out_time' },
       { data: 'activity_status' }  
      ],

     'columnDefs': [{
         'targets': 0,
            'searchable': false,
            'orderable': false,
      
            'createdCell':  function (td, cellData, rowData, row, col) {
              
               $(".total-count-span").text(rowData.TotalDisplayRecords);
               $(td).attr('id', rowData.srNo); 
               $(td).attr('data-value', rowData.data_value); 
            } 
      }]
    
  });

  
  $('#searchByName').keyup(function(){
    dataTable.draw();
  });
  
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

  $(document).on("change", "#statusfilter", function(){
    dataTable.draw();
  });
  
  function filterStatusfilter(){
    var datefilter    = $("#statusfilter").val();
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
  
  $('#filter_date_start,#filter_date_end').datepicker({
   format: "dd/mm/yyyy",
   autoclose: true,
   todayHighlight: true
  });
    
  });


  $("#location").select2({
    allowClear :true,
    placeholder: 'Select Location',
  });

  $("#statusfilter").select2({
   allowClear :true,
   placeholder: 'Select Status',
  });

  


  </script>


  <script type="text/javascript">

  $(".working_from,.update_working_from").customA11ySelect();

  // clockpicker adjust position on 

  function getEvent(e){
    $(".clockpicker").removeClass("clockpicker_position");
    $(e).addClass("clockpicker_position");
  }

  function getAddEvent(e){
    $(".clockpicker").removeClass("clockpicker_position");
    $(e).closest("div").find(".clockpicker").addClass("clockpicker_position");
  }
    
    // clockpicker adjust position on scroll
  function getEventUpdate(e){
    // alert(e);
    $(".update_clockpicker").removeClass("update_clockpicker_position");
    $(e).addClass("update_clockpicker_position");
  }

  function getDateEvent(e){
    $(".datepicker").removeClass("date_position");
    $(e).addClass("date_position");
  }

  function getUpdateDateEvent(e){
    $(".update_date_1").removeClass("update_date_position");
    $(e).addClass("update_date_position");
  }
   

  function getIcon(e){
    $(".update_clockpicker").removeClass("update_clockpicker_position");
    $(e).closest("div").find(".update_clockpicker").addClass("update_clockpicker_position");
  }
   
  </script>

  <script type="text/javascript">
  $("#myModal").scroll(function() {
     var add_clockpicker=$("input[class$='clockpicker_position']");
      if(add_clockpicker.length)
      {
         var topPos = add_clockpicker.offset().top;
         var leftPos = add_clockpicker.offset().left;
         $(".popover").css("top", topPos+35);
         $(".popover").css("left", leftPos);
      }

      var add_date=$("input[class$='date_position']");
      if(add_date.length)
      {
        var date_topPos = add_date.offset().top;
        var date_leftPos = add_date.offset().left;
        $(".datepicker").css("top", date_topPos+35);
        $(".datepicker").css("left", date_leftPos);
      }
  });
  </script>
  <script type="text/javascript">

    $("#editDailySheet").scroll(function() {
       var update_clockpicker_scroll=$("input[class$='update_clockpicker_position']");
       if(update_clockpicker_scroll.length)
       {
        var update_topPos = update_clockpicker_scroll.offset().top;
        var update_leftPos = update_clockpicker_scroll.offset().left;
       
        $(".popover").css("top", update_topPos+35);
        $(".popover").css("left", update_leftPos);
       }

       var update_date_scroll=$("input[class$='update_date_position']");
        if(update_date_scroll.length){
          var update_date_topPos = $("input[class$='update_date_position']").offset().top;
          var update_date_leftPos = $("input[class$='update_date_position']").offset().left;
          $(".datepicker").css("top", update_date_topPos+35);
          $(".datepicker").css("left", update_date_leftPos);
        }
    });
  </script>

  <!-- file handling script -->
  <script type="text/javascript">
    var input = "";

    $(document).on("change", ".file-upload", function(event){
        var attachment_id = $(this).closest(".clone-panel").find(".attachment").attr("id");
        input= document.getElementById(attachment_id);
        var output = $('.file-upload').closest('.clone-panel').find(".fileList").html();
        var children = "";

        for (var i = 0; i < input.files.length; i++) { //Progress bar and status label's for each file genarate dynamically
          var fileId = i;
         //alert(input.files.item(i).name);
           if(fileId == 0){

            children += '<li class="att_file_list file'+fileId+'" style="display: inline-block !important;margin-right: 15px;">' + input.files.item(i).name +'</li><br/>'+'<div class="progress_'+fileId+' progress_style" style="margin: 10px;position: relative;width: 40%;margin-left: 0px;"><div class="bar_'+fileId+'" style="background-color: #008DE6;height: 20px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;transition: width 0.3s ease 0s;width: 0;">&nbsp;</div ><p class="status_'+fileId+'" style="text-align: left;margin-right:-15px;font-weight:bold;color:saddlebrown"></p><div class="percent_'+fileId+'" style="color: #333;left: 48%;position: absolute;top: 0;">0%</div ></div><br/>';
           }else{
            children += '<li class="att_file_list file'+fileId+'" style="display: inline-block !important;margin-right: 15px;">' + input.files.item(i).name + '</li><br/>'+'<div class="progress_'+fileId+' progress_style" style="margin: 10px;position: relative;width: 40%;margin-left: 0px;"><div class="bar_'+fileId+'" style="background-color: #008DE6;height: 20px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;transition: width 0.3s ease 0s;width: 0;">&nbsp;</div ><p class="status_'+fileId+'" style="text-align: left;margin-right:-15px;font-weight:bold;color:saddlebrown;"></p><div class="percent_'+fileId+'" style="color: #333;left: 48%;position: absolute;top: 0;">0%</div ></div><br/>';
           }
      }
      
      $(this).closest('.clone-panel').find(".fileList").html(children);
      $('.file-upload').trigger('click');
    });
    var up_attach_file = "";
    var filename_arr = [];
    $(document).on("click",".file-upload",function(){
      up_attach_file = "";
      filename_arr = [];
    });
    $(document).on("click",".file-upload-button",function(){
      
      $("p.create_attach_error").closest('div').remove();
    });
    
    function uploadFiles(element) {
      //All files
      
      var file_input = $(element).closest(".clone-panel").find(".attachment").attr("id");
        file= document.getElementById(file_input);
      for (var i = 0; i < file.files.length; i++) {

            // var filePath = file.value; 
          
            // // Allowing file type 
            // var allowedExtensions =  
            //         /(\.jpg|\.jpeg|\.png|\.docx|\.doc|\.xlsx|\.xls|\.zip|\.rar|\.pdf|\.txt|\.csv)$/i; 
            // if (!allowedExtensions.exec(filePath)) { 
            //     file.value = ''; 
            //     $(element).closest(".row").before().append("<div><p class='text-danger create_attach_error' style='margin-top: 30px;'>File format not supported</p></div>");
            //     setTimeout(function () {
            //       $("p.create_attach_error").html("");
            //     }, 5000)
            //     // alert('File format not supported');
            //     return false; 
            // }  
            upload_single_file(file.files.item(i).name, i,element);
            $(".progress_style").css("display","none");
      }
    }



    var count = 0,file_count=0,temp_file_size=null;
    $( ".file-upload" ).unbind( "change" );
    // $(document).on("change", ".file-upload", function(event){
    function upload_single_file(file,i,element){
      

      event.preventDefault();
      var fileId = i;
      var up_attach_file = "";
      $(".progress").css('display',"block");
      $(".progress").width('0%');
      var thisval         = ".file-upload";
      var form_data       = $("#dailySheet_form");
      form_data           = new FormData(form_data[0]);
      var attachment_id = $(element).closest(".clone-panel").find(".attachment").attr("id");

      var attach_files_id = $(element).closest(".clone-panel").find(".attach_files").attr("id");
      
      form_data.append("last_files", $(element).closest(".form-group").find(".attach_files").val());
      form_data.append("current_index", $(element).attr("name"));
      form_data.append("uploaded_file", file);
      // form_data.append("totalfilecount", filecount);
      var file_attachment = "";
      var nerestFilesText = $(element).closest('.clone-panel').find(".attach_files").val();
      $.ajax({
         
        url     : '<?php echo base_url(); ?>dailysheet/upload_file',
        type    : 'POST',
        dataType: "JSON",
        data    : form_data,
        processData: false,
        contentType: false,
        
        xhr: function () {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener("progress", function (evt) {
            if (evt.lengthComputable) {
              var percentComplete = evt.loaded / evt.total;
              percentComplete = parseInt(percentComplete * 100);
              $(".status_" + fileId).text(percentComplete + "% uploaded, please wait...");
              $('.percent_' + fileId).text(percentComplete + '%');
              $('.progress_' + fileId).css('width','40%');
              $('.bar_' + fileId).css('width', percentComplete + '%');
               
            }

          }, false);
                            
          xhr.addEventListener("error", function (e) {
           $(".status_" + fileId).text("Upload Failed");
          },false);
          
          return xhr;
          
          }, 
        
        success: function(response){
          
          if( response.status != "true" ) {
            
            $(element).closest('.clone-panel').find(".fileList").html();
            
            
            $(".progress_" + fileId).css('display',"none");
            $(element).closest('.clone-panel').find(".fileList li:eq("+fileId+")").text("");
            $(element).closest('.clone-panel').find(".fileList .file"+fileId+"").remove();
            $(element).closest('.clone-panel').find(".fileList div").remove();
            $(element).closest('.clone-panel').find(".fileList br").remove();
            
           
            $(element).closest(".clone-panel").find('.fileList_text').after().append("<div><p class='text-danger create_attach_error' style='font-size: 14px;padding-top: 5px;'>"+response.msg+"</p></div>");
           
          
              setTimeout(function () {
                  $("p.create_attach_error").closest('div').remove();
                }, 10000)  
       }
                

      if(response.files != ""){
           $(element).closest('.clone-panel').find(".fileList").html('');
            
            if(up_attach_file.length != ""){
              up_attach_file = up_attach_file+','+response.files ;
            }else{
              up_attach_file = up_attach_file+response.files ;
            }

            
        
            var uploaded_attachment = up_attach_file.split(',');
            
            var temp="";
            console.log("uploaded_attachment"+uploaded_attachment);
            $.each(uploaded_attachment, function(idx2,val2) { 
            
              temp = temp+"<li class='file_list' style='list-style-type: none;color: #707070;'>"+val2+"<span class='material-icons close_fileList'  id="+idx2+" onclick='delete_files(this);'>close</span></li>";

              file_count++;
              filename_arr.push(val2);
              file_string = val2;
              if($(element).next('.attach_files').val()){
                var new_file_string = $(element).next('.attach_files').val();
                file_string = file_string+','+new_file_string;
              }
              $(element).next('.attach_files').val(file_string);
            });   
            $(element).closest('.clone-panel').find(".fileList_text").append(temp);
            count++;
          }
          $('.file-upload').val('');
        }, 

       
      });
      
    }



  function delete_files(element) {
    
    var deleteHtml = $(element).closest('li');
    var singleFileDeleteName =  $(deleteHtml).text().split("close");
    var nerestFilesText = $(deleteHtml).closest('.clone-panel').find(".attach_files").val();
    
    if( singleFileDeleteName[0] != "" && nerestFilesText != "" ){
      nerestFinalFilesText = [];

      if( nerestFilesText.indexOf(',') != -1 ){
        nerestFinalFilesText = nerestFilesText.split(",");
      }else{
        nerestFinalFilesText[0] = nerestFilesText;
      }

      for(var i = 0; i < nerestFinalFilesText.length; i++){

        if (nerestFinalFilesText[i] === singleFileDeleteName[0]) {

          nerestFinalFilesText.splice(i, 1);

        }

      }

        $(deleteHtml).closest('.clone-panel').find(".attach_files").val(nerestFinalFilesText);
        $(element).closest('li').remove();
        
    }

  }


</script>
  <!-- file handling script -->

  <!------------------------- start script Add modal  ------------------------->

  <script type="text/javascript">
    date_limit();
    function date_limit(){
    // Add modal : datepicker dates valiudation (selected dates enabled )
    $.ajax({
         
      url     : '<?php echo base_url(); ?>dailysheet/date_limit',
      type    : 'POST',
      dataType: "JSON",
      data    : {},
        // processData: false,
        // contentType: false,
      success: function(response){
        var len = 0;
        var tempenableDates = response.uncommon_dates;
        $.each(tempenableDates, function (i, obj) {
          len++;
        });

        var enableDatesArray  = [];
        var sortDatesArry     = [];

        for (var i = 0; i < len; i++) {

          var dt = tempenableDates[i].replace('-', '/').replace('-', '/');
          var dd, mm, yyy;

          if (parseInt(dt.split('/')[0]) <= 9 || parseInt(dt.split('/')[1]) <= 9) {
            
            dd  = parseInt(dt.split('/')[0]);
            mm  = parseInt(dt.split('/')[1]);
            yyy = dt.split('/')[2];
            enableDatesArray.push(dd + '/' + mm + '/' + yyy);
            sortDatesArry.push(new Date(yyy + '/' + dt.split('/')[1] + '/' + dt.split('/')[0]));
          } else {
          
            enableDatesArray.push(dt);
            sortDatesArry.push(new Date(dt.split('/')[2] + '/' + dt.split('/')[1] + '/' + dt.split('/')[0] + '/'));
          }
        }


        var maxDt = new Date(Math.max.apply(null, sortDatesArry));
        var minDt = new Date(Math.min.apply(null, sortDatesArry));

        // Add modal : apply datepicker
        $("#date_1").datepicker('remove');
        $('#date_1').datepicker({
          
          format    : "dd/mm/yyyy",
          autoclose : true,
          startDate : minDt,
          endDate   : maxDt,
          container : '#myModal',
          beforeShowDay: function (date) {
            var dt_ddmmyyyy = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
            return (enableDatesArray.indexOf(dt_ddmmyyyy) != -1);
          }
        }).on('changeDate', function(e){
          
         });

        // Edit modal : apply datepicker
        $('#update_date_1').datepicker('remove');
        $('#update_date_1').datepicker({
              
              format    : "dd/mm/yyyy",
              autoclose : true,
              startDate : minDt,
              endDate   : maxDt,
              container : '#editDailySheet',
              beforeShowDay: function (date) {
                var dt_ddmmyyyy = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
                return (enableDatesArray.indexOf(dt_ddmmyyyy) != -1);
              }
          }).on('changeDate', function(e){
           
               var nav = $("input[class$='datepicker']");
               if (nav.length) {
               var date_topPos = $("input[class$='datepicker']").offset().top;
               var date_leftPos = $("input[class$='datepicker']").offset().left;
                $(".datepicker").css("top", date_topPos+35);
                $(".datepicker").css("left", date_leftPos); 
              }

          });

          },
        });
}

  </script>

  <script>

    var inTime            = "";
    var outTime           = "";
    var new_start_time    = "";
    var new_end_time      = "";
    var n                 = "";
    var clone_panel       = "";
    var a="",b="";
    var append_start_time ="";
    var new_activity_text ="";

    var name              ="";      
    var reporting_name    ="";  
    var date_1            ="";     
    var working_from      =""; 
    var in_time_of_office ="";
    var out_time_of_office="";
    var Activity_text     ="";

    var $template="",$clone="";

    var $checkEmpty = false;

    $(".clone").prop("readonly","true");
    $(".edit").css("display", "none");
    $(".delete").css("display", "none");

    //  working from group

    var add_selectedCountry ="";
    $(".working_from_group select").change(function(){
        add_selectedCountry = $(".working_from_group #working_from-button .custom-a11yselect-text").text();
        $(".duplicate_working_from").val(add_selectedCountry);
    });

    // Add modal : add activity here
    function addButton() {

      // Add modal : Apply css
      $("#dailySheet_form #task_section :input").prop("readonly", true);
      $("#dailySheet_form #task_section .date_1").removeAttr("id");
      
      $("#dailySheet_form #task_section :input").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none"});
      $("#dailySheet_form #task_section .input-group-btn span").css("display","none");
      $("#dailySheet_form #task_section :input").css("padding-left","0px");
      $("#dailySheet_form #task_section .form-control").css("padding-top","0px !important");
        
       // working from group
       
      $(".working_from_group .input-group").addClass("display_none");
      $(".duplicate_working_from").removeClass("display_none").val(add_selectedCountry);      

      // for date
      $(".date_1_group .input-group").addClass("display_none");
      var value= $(".date_1_group .input-group .date_1").val();
      $(".date_1_group input").removeClass("display_none").val(value);

      // Add modal : add clone object 
      clone_panel = $(".clone-panel").last().clone();
        
      $(".clone-panel .new_start_time,.clone-panel .new_end_time,.clone-panel .new_activity_text,.clone-panel .duplicate_add_newtime_clockpicker,.clone-panel .duplicate_add_endtime_clockpicker").prop("readonly", true);
      $(".clone-panel .new_start_time,.clone-panel .new_end_time,.clone-panel .new_activity_text,.clone-panel .duplicate_add_newtime_clockpicker,.clone-panel .duplicate_add_endtime_clockpicker").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none"});
      $(".input-group-btn span").css("display","none");
      //$(".input-group-addon").css({"display":"none","border":"none"});
      $(".delete").css("display", "inline-block");
      $(".clone-panel .fileList").css("padding-top","6px");
      $("#dailySheet_form .clone-panel input,.clone-panel textarea").css("padding-left","0px");
      $("#dailySheet_form .clone-panel .form-control,.clone-panel textarea").css("padding-top","0px !important");
      $("#dailySheet_form #task_section :input").css("padding-top","0px !important");
     
      // Add modal : set empty
      new_start_time    = "";
      new_end_time      = "";
      new_activity_text = "";
      
      a = $(".clone-panel:nth-last-child(2)").find(".new_start_time").val();
      b = $(".clone-panel:nth-last-child(2)").find(".new_end_time").val();

      append_start_time = $(clone_panel).find(".new_start_time").attr("class").split(" ")[1];
        
      clone_panel.find("input,textarea").val("");

      $(".edit").css("display", "inline-block");
      
      applyClocpicker();

      // for clock

      $(".duplicate_add_intime_clockpicker").val($(".inTime_group input").val());
      $(".duplicate_add_outtime_clockpicker").val($(".outTime_group input").val());

      var size=$(".clone-panel").length;
      $(".inTime_group .input-group,.outTime_group .input-group,.clone-panel .new_start_time_group .input-group,.clone-panel .new_end_time_group .input-group").addClass("display_none");
      
      for(var k=0;k<size;k++)
      {

        $(".clone-panel").eq(k).find(".duplicate_add_newtime_clockpicker").val($(".clone-panel").eq(k).find(".new_start_time").val());
        $(".clone-panel").eq(k).find(".duplicate_add_endtime_clockpicker").val($(".clone-panel").eq(k).find(".new_end_time").val());
        $(".clone-panel").eq(k).find(".new_activity_text").val($.trim($(".clone-panel").eq(k).find(".new_activity_text").val()));

      }

      $(".duplicate_add_intime_clockpicker,.duplicate_add_outtime_clockpicker,.clone-panel .duplicate_add_newtime_clockpicker,.clone-panel .duplicate_add_endtime_clockpicker").removeClass("display_none");

  }

    // Add modal : on change in time
     $("#inTime").change(function(){

      $(".has-success .input-group-addon").css("background-color","#fff");

       new_start_time   = "";
       new_end_time     = "";
       outTime          = "";
       inTime = $(this).val();

       $(".temp-error").remove();
      
       if(inTime==outTime) {
      
        $(this).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'> In time should not be same as out time </small> ");
        $("#inTime").val("");

       }else if(inTime>outTime && outTime!="") {
        
        $(this).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'> In time should be less than out time </small> ");
        $("#inTime").val("");
       }

       $(this).closest("#task_section").find("#outTime").val("");

       $(".new_start_time").val("");
          $(".new_end_time").val("");

       });

    // Add modal : on change out time
    $("#outTime").change(function(){
      
      outTime=$(this).val();
     
      $(".temp-error").remove();
    
      if(inTime>outTime) {
        
        $(this).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'> Out time should be greater than in time </small> ");
        $("#outTime").val("");

      }else if( inTime == outTime ) {
        $(this).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'> Out time should not be same as in time </small> ");
        $("#outTime").val("");

      }else if( inTime=="" ) {
        $(this).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'>Please select in time </small> ");
        $("#outTime").val("");
        $("#inTime").focus();
        outTime="";
      }
      
        $(".new_start_time").val("");
        $(".new_end_time").val("");

    });

     
    
    // Add modal : on click delete activity div
    $(document).on("click", ".delete", function(){


      var clone_panel_delete = $(this).closest(".clone-panel").html();

      $field1 = $(clone_panel_delete).find(".new_start_time").attr("name");
      $field2 = $(clone_panel_delete).find(".new_end_time").attr("name");
      $field3 = $(clone_panel_delete).find(".new_activity_text").attr("name");

      var clone_panel = $(this).closest(".clone-panel").remove();

     $(".clone-panel:first-child").removeClass("border-top");
      var is_many     = $(".clone-panel").length;

       name       =$(".employee_Name").val();
       reporting_name   =$(".reporting_name").val();
       date_1       =$(".date_1").val();
       working_from   =$(".working_from_group #working_from-button .custom-a11yselect-text").text();
       in_time_of_office=$(".inTime").val();
       out_time_of_office=$(".outTime").val();
        
      if( is_many <= 1 ){
        $(".clone-panel").removeClass("border-top");
        $(".delete").css("display", "none");
        $(".clone").removeAttr("readonly");

        var p = $(".clone-panel").find(".new_start_time").val();
        var q = $(".clone-panel").find(".new_end_time").val();
        new_activity_text=$(".clone-panel").find(".new_activity_text").val();

        new_start_time=p;
        new_end_time=q;

        if( p=="" && q=="" ) {
          
          a = "";
          b = "";

        }

      } else {

        a = $(".clone-panel:nth-last-child(2)").find(".new_start_time").val();
        b = $(".clone-panel:nth-last-child(2)").find(".new_end_time").val();

        if(a=="undefined" || a=="") {

          a = $(".clone-panel:nth-last-child(3)").find(".new_start_time").val();
          b = $(".clone-panel:nth-last-child(3)").find(".new_end_time").val();
        }

      }

      $(".clone").removeAttr("readonly");
    });

    // Add modal : on change start time
    function new_start_time_on_change(id){

    inTime = $("#inTime").val();
    outTime = $("#outTime").val();

    var len=$(".clone-panel").length;

    $(id).closest(".form-group").find(".temp-error_on_add").remove();
    var data="";
    var checkMe = $(id).closest(".clone-panel");
    var check   = $(".parent-append").find(checkMe).is(":first-child");
    
    if( check ){
      a = "";
      b = "";

      data=$(id).closest(".clone-panel").find("p").text();
      
    }else{
      a = $(checkMe).prev(".clone-panel").find(".new_start_time").val();
      b = $(checkMe).prev(".clone-panel").find(".new_end_time").val();

      new_end_time="";
    }

    $(id).closest(".clone-panel").find(".new_end_time").val("");
    // check is first clone div 

    new_start_time  = $(id).val();
    new_end_time  = $(id).closest(".clone-panel").find(".new_end_time").val();
    
    $(".temp-error").remove();

    if(inTime=="")
    {
      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'>Please select the in time </small> ");
      $(id).val("");
      $("#inTime").focus();
      new_start_time="";
      
    } else if( outTime=="") {
      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'>Please select the out time</small> ");
      $(id).val("");
      $("#outTime").focus();
      new_start_time="";
      
    } else if(new_start_time<b || new_start_time<a) {
      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'>Your new activity time should be greater than previous activity time</small> ");
      $(id).val("");
      
    } else if(new_start_time>inTime && new_start_time>outTime) {
      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'>Your activity time should be less than the out time</small> ");
      $(id).val("");
      
    } else if(new_start_time<inTime) {
      
      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'>Your new activity time should be greater than or equal to in time</small> ");
      $(id).val("");
      
    } else if(new_start_time==new_end_time) {
      
      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'> Start and end time should be different </small> ");
      $(id).val("");
      
    }  
      
      clearAllActivitiesTime(id);
      oops_onchange_of_start_time(id);
      
    }


    // Add modal : on change end time
    function new_end_time_on_change(id){

      inTime = $("#inTime").val();
      outTime = $("#outTime").val();

      // for_disabled();
      var len=$(".clone-panel").length;
      $(id).closest(".form-group").find(".temp-error_on_add").remove();
    
  // check is first clone div 
      var checkMe = $(id).closest(".clone-panel");
   
      var check = $(".parent-append").find(checkMe).is(":first-child");

      if( check ){
        a = "";
        b = "";
      }else{
        a = $(checkMe).prev(".clone-panel").find(".new_start_time").val();
        b = $(checkMe).prev(".clone-panel").find(".new_end_time").val();

      }
    // check is first clone div 

      new_start_time=$(id).closest(".clone-panel").find(".new_start_time").val();
      new_end_time = $(id).val();

    $(".temp-error").remove();
     
     if(inTime=="")
     {
      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'>Please select the in time </small> ");
      $(id).val("");
      $("#inTime").focus();
        
      new_end_time="";
      
     }else if( outTime==""){
      
      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'>Please select the out time</small> ");
      $(id).val("");
      $("#outTime").focus();
        new_end_time="";
    
     }else if(new_start_time==""){
        
      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'> Please select the start time </small> ");
      $(id).val("");
      $(id).closest(".clone-panel").find(".new_start_time").focus();
      new_end_time="";

     }else if(new_end_time<new_start_time) {

      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'> Your new activity end time should be greater than new start activity time </small> ");
      $(id).val("");
     }else if(new_end_time>new_start_time && new_end_time>outTime) {

      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'> Your new activity end time should be less than or equal to out time </small> ");
      $(id).val("");
     }else if(new_start_time==new_end_time) {

      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'> Start and end time should be different </small> ");
      $(id).val("");
     }else if(new_end_time<b){

      $(id).closest(".form-group").append("<small class='temp-error' style='color:#a94442;'> Your new activity end time should be greater than previous activity time </small> ");
      $(id).val("");
     }else {
      $(".temp-error").remove();
     }

      clearAllActivitiesTime(id);
      oops_onchange_of_end_time(id);
     
     }

  function oops_onchange_of_start_time(id){

      var length1=$(".clone-panel").length;

      for(var k=0;k<length1;k++)
      {
        if($(".clone-panel").eq(k).find(".new_start_time_group small").hasClass("temp-error_on_add"))
        {

            $(".clone-panel").eq(k).find(".new_start_time_group").addClass("has-error");
        }
        else{
         
          $(".clone-panel").eq(k).find(".new_start_time_group").removeClass("has-error");
        }
      }
  } 

  function oops_onchange_of_end_time(id)
  {
      var length1=$(".clone-panel").length;

      for(var k=0;k<length1;k++)
      {
        if($(".clone-panel").eq(k).find(".new_end_time_group small").hasClass("temp-error_on_add"))
        {
            $(".clone-panel").eq(k).find(".new_end_time_group").addClass("has-error");
        }
        else{

          $(".clone-panel").eq(k).find(".new_end_time_group").removeClass("has-error");
        }
      }
  } 

    
    // Add modal : on change new activity (textarea)
  function new_activity_on_change(id) {
      new_activity_text = $(id).val();

  }

  $(".employee_Name").keyup(function(){
    $(this).closest(".form-group").find(".temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");
  });

  $(".reporting_name").keyup(function(){
    $(this).closest(".form-group").find(".temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");
  });

  $(".date_1").change(function(){
    $(this).closest(".form-group").find(".temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");
  });

  $(".working_from").change(function(){
      $(this).closest(".form-group").find(".temp-error_on_add").remove();
      $(this).closest(".form-group").removeClass("has-error");
      $(".working_from_group .custom-a11yselect-btn").removeClass('has-error1');
  });

  $("#inTime").change(function(){
    $(this).closest(".form-group").find(".temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");
  });

  $("#outTime").change(function(){
    $(this).closest(".form-group").find(".temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");
  });

    // Add modal : check validation 
  function validation_on_add_activity_btn() {

    name = $(".employee_name").val();
    reporting_name = $(".reporting_name").val();
    date_1 = $(".date_1").val();
    working_from = $(".working_from_group #working_from-button .custom-a11yselect-text").text();
    in_time_of_office = $(".inTime").val();
    out_time_of_office = $(".outTime").val();

    $(".temp-error_on_add,.temp-error").remove();

    var check_last = "";

    var length1 = $(".clone-panel").length;
    if (name == "") {
        $(".employee_Name_group").append("<small class='temp-error_on_add' style='color:#a94442;'> Please enter your name</small> ");
        $(".employee_Name_group").addClass("has-error");
    }

    if (reporting_name == "") {
        $(".reporting_name_group").append("<small class='temp-error_on_add' style='color:#a94442;'> Please enter your reporting authority name</small> ");
        $(".reporting_name_group").addClass("has-error");
    }
    if (date_1 == "") {
        $(".date_1_group").append("<small class='temp-error_on_add' style='color:#a94442;'> Please select the date</small> ");
        $(".date_1_group").addClass("has-error");
    }
    if (working_from == "Select") {
        $(".working_from_group").append("<small class='temp-error_on_add' style='color:#a94442;'> Please select the working from</small> ");
        $(".working_from_group").addClass("has-error");
        $(".working_from_group .custom-a11yselect-btn").addClass('has-error1');
    }
    if (in_time_of_office == "") {
        $(".inTime_group").append("<small class='temp-error_on_add' style='color:#a94442;'>Please enter in time</small> ");
        $(".inTime_group").addClass("has-error");
    }
    if (out_time_of_office == "") {
        $(".outTime_group").append("<small class='temp-error_on_add' style='color:#a94442;'>Please enter out time </small> ");
        $(".outTime_group").addClass("has-error");
    }

        for (var i = 0; i < length1; i++) {
          check_last = $(".clone-panel").eq(i);
          new_start_time = $(".clone-panel").eq(i).find(".new_start_time").val();
          new_end_time = $(".clone-panel").eq(i).find(".new_end_time").val();
          new_activity_text = $(".clone-panel").eq(i).find(".new_activity_text").val();
      
          if (new_start_time == "") {
              check_last.find(".new_start_time_group").append("<small class='temp-error_on_add' style='color:#a94442;'> Please enter activity start time</small> ");
              check_last.find(".new_start_time_group").addClass("has-error");
          } else {
      
              check_last.find(".new_start_time_group").removeClass("has-error");
          }

          if (new_end_time == "") {
              check_last.find(".new_end_time_group").append("<small class='temp-error_on_add' style='color:#a94442;'> Please enter activity end time</small> ");
              check_last.find(".new_end_time_group").addClass("has-error");
          } else {
              check_last.find(".new_end_time_group").removeClass("has-error");
          }

          if (new_activity_text == "" || new_activity_text == null || !new_activity_text.replace(/\s/g, '').length) {

              check_last.find(".activity_group").append("<small class='temp-error_on_add' style='color:#a94442;'> Please enter activity message </small> ");
              check_last.find(".activity_group").addClass("has-error");
          } else {
              check_last.find(".activity_group").removeClass("has-error");
          }

        }
    }


    // add modal:check empty

    function overview_check_empty()
    {
         $checkEmpty1 = false;

         var  over_name                =$(".employee_Name").val();
         var  over_reporting_name      =$(".reporting_name").val();
         var  over_date_1              =$(".date_1").val();
         var  over_working_from        =$(".working_from_group #working_from-button .custom-a11yselect-text").text();
         var  over_in_time_of_office   =$(".inTime").val();
         var  over_out_time_of_office  =$(".outTime").val();

         if(over_name == "")
         {
            $checkEmpty1 = true;
         }
         if(over_reporting_name == "")
         {
            $checkEmpty1 = true;
         }
         if(over_date_1 == "")
         {
            $checkEmpty1 = true;
         }
         if(over_working_from == "Select")
         {
            $checkEmpty1 = true;
         }
         if(over_in_time_of_office == "")
         {
            $checkEmpty1 = true;
         }
         if(over_out_time_of_office == "")
         {
          $checkEmpty1 = true;
         }

         return $checkEmpty1; 

    }

    function check_empty() {
    
    $checkEmpty = false;

    $(".clone-panel .new_start_time").each(function() {
       var element = $(this);
      
       if (element.val() == "") {
          $checkEmpty = true;
       }

    });
    $(".clone-panel .new_end_time").each(function() {
       var element = $(this);
       if (element.val() == "") {
        $checkEmpty = true;
       }
    });
    $(".clone-panel .new_activity_text").each(function() {
       var element = $(this);
       if (element.val() == "" || !element.val().replace(/\s/g, '').length) {
        $checkEmpty = true;
       }
    });
    
    return $checkEmpty;
  }



 var emp_name    = $("#employee_name").val();
 var emp_id      = $("#employee_id").val();
 var rep_name    = $("#reporting_name").val();
 var rep_id      = $("#reporting_id").val();
    
$(document).on('click','#submit,#submit_btn',function(){

          var validate_empty  = check_empty();
          var validate_empty1 = overview_check_empty();
          if(validate_empty || validate_empty1) {
          validation_on_add_activity_btn();
          return false;
          } else {
        event.preventDefault();
        var form_data = $("#dailySheet_form");
        form_data = new FormData(form_data[0]);
        form_data.append('status', globalSubmitvalue);
        
        $.ajax({
          url: '<?php echo base_url(); ?>daily-sheet/add',
          type: 'POST',
          dataType: "JSON",
          data: form_data,
          processData: false,
          contentType: false,
          success: function (json) {
            $("#dailySheet_form").trigger('reset');
            $(".attach_files").val("");
     
            $("#dailySheet_form #task_section :input").removeAttr("style");
            $("#dailySheet_form #task_section .input-group-btn span").removeAttr("style");
            $("#dailySheet_form #task_section .input-group-addon").removeAttr("style");
            $(".edit").css("display", "none");
            $(".fileList").empty();
            $(".fileList_text").empty();
            $(".clone-panel .new_start_time,.clone-panel .new_end_time,.clone-panel .new_activity_text,.clone-panel .duplicate_add_newtime_clockpicker,.clone-panel .duplicate_add_endtime_clockpicker").removeAttr("readonly");
            $(".clone-panel .new_start_time,.clone-panel .new_end_time,.clone-panel .new_activity_text").removeAttr("style");
            $(" .input-group-btn span").removeAttr("style");
            $(".input-group-addon").removeAttr("style");

            $("#dailySheet_form #task_section .date_1_group .input-group,.working_from_group .input-group,.inTime_group .input-group,.outTime_group .input-group,.new_start_time_group .input-group,.new_end_time_group .input-group ").removeClass("display_none");

            $("#dailySheet_form #task_section .date_1_group .duplicate_of_date,.duplicate_working_from,.duplicate_add_intime_clockpicker,.duplicate_add_outtime_clockpicker,.duplicate_add_newtime_clockpicker,.duplicate_add_endtime_clockpicker").addClass("display_none");
            
            $("#dailySheet_form #task_section .working_from").css("display","none");
            $("#working_from").customA11ySelect('refresh');


            $("#employee_name").val(emp_name);
            $("#employee_id").val(emp_id);
            $("#reporting_name").val(rep_name);
            $("#reporting_id").val(rep_id);
            $(".temp-error_on_add").empty();
            $(".reset_clone").remove();
            
            if ( json.status == "true" ) {
               date_limit();
            
            $.ajax({
              url: '<?php echo base_url(); ?>dailysheet/delete_folder',
              success: function (result) {

              },

           });
            $('#myModal').each(function(){
                $(this).modal('hide');
            });

            $('#empTable').each(function() {
                dt = $(this).dataTable();
                dt.fnDraw();
            })

            } else {
              // alert("hello1");
              
              $.alert({
              title: 'Alert!',
              content: json.msg,
              type: 'dark',
              typeAnimated: true,

            });

            }

            $('#myModal').each(function(){
                $(this).modal('hide');
            });

            $('#empTable').each(function() {
                dt = $(this).dataTable();
                dt.fnDraw();
            })

          },
        });
}

});




$(document).on('click','.clone',function(){

          var validate_empty=check_empty();
          var validate_empty1 = overview_check_empty();

          if(validate_empty || validate_empty1) {
          validation_on_add_activity_btn();
          return false;
          } else {

              addButton();

               // Add modal : make clone of activity
              var $template = $('#optionTemplate'),
              $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .removeAttr('id')
                            .addClass('clone-panel')
                            .addClass('reset_clone')
                            .insertBefore($template);
            
              var reappendHtml = $(".clone-panel:nth-last-child(3)");
             
              reappendNo = $(reappendHtml).find("input[type='file']").attr("name");

              reappendNo = reappendNo.replace(/\D/g,'');
              appendNo = parseInt(reappendNo) + 1;

              applyClocpicker();
            
              $($clone).find("input[type='file']").attr("name", "attachment["+appendNo+"][]");
              $($clone).find("input[type='file']").attr("id", "attachment["+appendNo+"]");
              $($clone).find(".new_start_time").attr("name", "activity_inTime[]");
              $($clone).find(".new_end_time").attr("name", "activity_outTime[]");
              $($clone).find(".new_activity_text").attr("name", "activity_msg[]");
              $($clone).find(".attach_files").attr("name", "attach_files["+appendNo+"]");
              $($clone).find(".attach_files").attr("id", "attach_files["+appendNo+"]");
             
              var new_time_clone=$clone.find('[name="activity_inTime[]"]');
              var end_time_clone=$clone.find('[name="activity_outTime[]"]');
              var activity_clone=$clone.find('[name="activity_msg[]"]');
            
              $clone.find('.input-group-addon').removeAttr("style");

              $(".clone-panel").last().addClass("border-top");

              $(".clone").prop("readonly","true");  

           }


});


  </script>

  <script type="text/javascript">
    // Add modal : edit activity 
    $(".edit").click(function(){
     
      $("#dailySheet_form #task_section :input").removeAttr("readonly");
      $("#dailySheet_form #task_section :input").removeAttr("style");

      $("#dailySheet_form #task_section .working_from").css("display","none");

      $("#dailySheet_form #task_section .input-group-btn span").removeAttr("style");
      $("#dailySheet_form #task_section .input-group-addon").removeAttr("style");
      $("#dailySheet_form #task_section .employee_name,#dailySheet_form #task_section .reporting_name").attr("readonly",true);
      $("#dailySheet_form #task_section .employee_name,#dailySheet_form #task_section .reporting_name").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none","padding-left":"0px"});

      $(".clone-panel .new_start_time,.clone-panel .new_end_time,.clone-panel .new_activity_text,.clone-panel .duplicate_add_newtime_clockpicker,.clone-panel .duplicate_add_endtime_clockpicker").removeAttr("readonly");
      $(".clone-panel .new_start_time,.clone-panel .new_end_time,.clone-panel .new_activity_text").removeAttr("style");
      $(" .input-group-btn span").removeAttr("style");
      $(".input-group-addon").removeAttr("style");
    
      $(".fileList li span").removeClass('close_fileList');
      $(".fileList_text li span").removeClass('close_fileList');
      // end enable 
      $(".edit").css("display", "none");

       //  for working from
      $(".working_from_group .input-group").removeClass("display_none");
      $(".duplicate_working_from").addClass("display_none"); 
      $(".date_1_group .input-group").removeClass("display_none");
      $(".date_1_group .duplicate_of_date").addClass("display_none");

       //  for clock

       $(".inTime_group .input-group,.outTime_group .input-group,.new_start_time_group .input-group,.new_end_time_group .input-group").removeClass("display_none");
       $(".duplicate_add_intime_clockpicker,.duplicate_add_outtime_clockpicker,.duplicate_add_newtime_clockpicker,.duplicate_add_endtime_clockpicker").addClass("display_none");
    });

  </script>
        
  <script type="text/javascript">
    
    applyClocpicker();

    function applyClocpicker(){
      
      $('.clockpicker').clockpicker({
        placement: 'bottom',
        align: 'left',
        default:'now',
        autoclose: true,
        donetext: 'Select',
      
      }).on('change', function(e){
      });
    }

  </script>

  <script type="text/javascript">

    // Add modal : file browse
    $(document).on("click", ".openFileBrowse", function(){
      var parent = $(this).closest(".clone-panel");
      $(parent).find(".file-upload").trigger("click");
    });
    
  // Add modal : on click of submit clear temp error 
    $("#footer-btn2").click(function(){
      $(".temp-error").remove();
    });

    function clearAllActivitiesTime(id){

      $(id).closest(".clone-panel").nextAll(".clone-panel").find(".new_start_time").val("");
      $(id).closest(".clone-panel").nextAll(".clone-panel").find(".new_end_time").val("");
    }

    function textAreaAdjust_add(o) {
      $(o).closest(".form-group").find(".temp-error_on_add").remove();
      if ($(o).val() == "" || !$(o).val().replace(/\s/g, '').length) {

          $(o).closest(".form-group").append("<small class='temp-error_on_add' style='color:#a94442;'> Please enter activity message </small> ");
          $(o).closest(".form-group").addClass("has-error");
      } 
      else
      {
       $(o).closest(".form-group").find(".temp-error_on_add").remove(); 
          $(o).closest(".form-group").removeClass("has-error");

      }

      o.style.height = "1px";
      o.style.height = (2+o.scrollHeight)+"px";
    }

   </script>
  <!------------------------- end script Add modal  ------------------------->



  <!------------------------- start script Edit modal  ------------------------->

  <script>

// Edit modal : time validation

    var update_inTime              = "";
    var update_outTime             = "";
    var update_new_start_time      = "";
    var update_new_end_time        = "";
    var update_n                   ="";
    var update_clone_panel         = "";
    var update_a="",update_b="";
    var update_append_start_time   ="";
    var update_new_activity_text   ="";
    var update_name="";      
    var update_reporting_name      ="";  
    var update_date_1 ="";     
    var update_working_from        =""; 
    var update_in_time_of_office   ="";
    var update_out_time_of_office  ="";
    var update_Activity_text       ="";

    var $update_template="",$update_clone="";

    var $update_checkEmpty = false;

    $(".update_footer-btn3").css("display","none");

    $(".update_clone").prop("readonly","true");

    $(".update_delete").css("display", "none");

    // Edit modal : on click css
   
      

  function update_addButton() {

     $("#update_submit,#update_submit_btn").removeAttr("disabled"); 
     $("#update_dailySheet_form .form-control").removeClass("padding_css");
     $("#update_dailySheet_form #update_task_section :input").prop("readonly", true);
     $("#update_dailySheet_form #update_task_section :input").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none"});
     $("#update_dailySheet_form #update_task_section .input-group-btn span").css("display","none");
     $("#update_dailySheet_form #update_task_section .input-group-addon").css({"display":"none","border":"none"});
     $("#update_dailySheet_form #update_task_section .form-control").css("padding-left","0px");
       
      update_clone_panel = $(".update_clone-panel").last().clone();
     
     $(".update_clone-panel .update_new_start_time,.update_clone-panel .update_new_end_time,.update_clone-panel .update_new_activity_text,.duplicate_update_newtime_clockpicker,.duplicate_update_endtime_clockpicker").prop("readonly", true);
     $(".update_clone-panel .update_new_start_time,.update_clone-panel .update_new_end_time,.update_clone-panel .update_new_activity_text,.duplicate_update_newtime_clockpicker,.duplicate_update_endtime_clockpicker").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none"});
     $(" .input-group-btn span").css("display","none");
     //$(".input-group-addon").css({"display":"none","border":"none"});
     $(".update_delete").css("display", "inline-block");
     $("#update_dailySheet_form .update_clone-panel .form-control").css("padding-left","0px");
        
     update_new_start_time      = "";
     update_new_end_time        = "";
     update_new_activity_text   = "";
      
     update_a = $(".update_clone-panel:nth-last-child(1)").find(".update_new_start_time").val();
     update_b = $(".update_clone-panel:nth-last-child(1)").find(".update_new_end_time").val();
     update_append_start_time=$(update_clone_panel).find(".update_new_start_time").attr("class").split(" ")[1];
     update_clone_panel.find("input,textarea").val("");
     $(update_clone_panel).find(".update_fileList").html("");
      //$(".update_clone-panel").html("");
     $(".update_edit").css("display", "inline-block");
      update_applyClocpicker();
      // for working from
     $(".update_working_from_group .input-group").addClass("display_none");
     $(".update_duplicate_working_from").removeClass("display_none");
       

      // date

      var update_date=$(".update_date_1_group .input-group input").val(); 
       
      $(".duplicate_update_date").val(update_date);
      $(".update_date_1_group .input-group").addClass("display_none");
       
      $(".update_date_1_group .duplicate_update_date").removeClass("display_none");

       // clockpicker

      $(".duplicate_update_intime_clockpicker").val($(".update_inTime_group .update_inTime").val());
      $(".duplicate_update_outtime_clockpicker").val($(".update_outTime_group .update_outTime").val());

      var len=$(".update_clone-panel").length;
       
      for(var k=0;k<len;k++)
       {
        $(".update_clone-panel").eq(k).find(".duplicate_update_newtime_clockpicker").val($(".update_clone-panel").eq(k).find(".update_new_start_time").val());
        $(".update_clone-panel").eq(k).find(".duplicate_update_endtime_clockpicker").val($(".update_clone-panel").eq(k).find(".update_new_end_time").val());
        $(".update_clone-panel").eq(k).find(".update_new_activity_text").val($.trim($(".update_clone-panel").eq(k).find(".update_new_activity_text").val()));
       }


       $("#update_dailySheet_form .update_inTime_group .input-group,#update_dailySheet_form .update_outTime_group .input-group,.update_clone-panel .update_new_start_time_group .input-group,.update_clone-panel .update_new_end_time_group .input-group").addClass("display_none");
       $("#update_dailySheet_form .duplicate_update_intime_clockpicker, #update_dailySheet_form .duplicate_update_outtime_clockpicker,#update_dailySheet_form .update_clone-panel .duplicate_update_newtime_clockpicker,#update_dailySheet_form .update_clone-panel .duplicate_update_endtime_clockpicker").removeClass("display_none");
     }

    // Edit modal : on change In Time
    $("#update_inTime").change(function(){

      $(".has-success .input-group-addon").css("background-color","#fff");
      
          update_new_start_time    = "";
          update_new_end_time      = "";
          update_outTime           = "";
          update_inTime = $(this).val();

      $(".update_temp-error").remove();
      
      if(update_inTime==update_outTime) {
      
        $(this).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'> In Time should not be same as outTime </small> ");
        $("#update_inTime").val("");

      }else if(update_inTime>update_outTime && update_outTime!="") {
        
        $(this).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'> In Time should be less than outTime </small> ");
        $("#update_inTime").val("");
      }

      $(this).closest("#update_task_section").find("#update_outTime").val("");

      $(".update_new_start_time").val("");
          $(".update_new_end_time").val("");

    });

    // Edit modal : on change out time
    $("#update_outTime").change(function(){
    
       update_outTime=$(this).val();

       $(".update_temp-error").remove();
       
       if(update_inTime>update_outTime) {
        
        $(this).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'> Out time should be greater than in time </small> ");
        $("#update_outTime").val("");
       } else if( update_inTime == update_outTime ) {
        $(this).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'> Out time should not be same as in time </small> ");
        $("#update_outTime").val("");

       }else if( update_inTime=="" ) {
        $(this).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'>Please select in time </small> ");
        $("#update_outTime").val("");
        $("#update_inTime").focus();
        update_outTime="";
      }

      $(".update_new_start_time").val("");
      $(".update_new_end_time").val("");


    });

    // Edit modal : on click delete activity div
    $(document).on("click", ".update_delete", function(){

      var clone_panel_delete = $(this).closest(".update_clone-panel");

      $field4 = clone_panel_delete.find(".update_new_start_time").attr("name");
      $field5 = clone_panel_delete.find(".update_new_end_time").attr("name");
      $field6 = clone_panel_delete.find(".update_new_activity_text").attr("name");

      var update_clone_panel = $(this).closest(".update_clone-panel").remove();


      var update_is_many   = $(".update_clone-panel").length;
      
      if( update_is_many <= 1 ){
        
        $(".update_delete").css("display", "none");
        $(".update_clone").removeAttr("readonly");

        var update_p=$(".update_clone-panel").find(".update_new_start_time").val();
        var update_q=$(".update_clone-panel").find(".update_new_end_time").val();

        if(update_p=="" && update_q=="")
        {
          update_a="";
          update_b="";

        } 
      } else {

        update_a=$(".update_clone-panel:nth-last-child(2)").find(".update_new_start_time").val();
        update_b=$(".update_clone-panel:nth-last-child(2)").find(".update_new_end_time").val();

        if(update_a=="undefined" || update_a=="") {

          update_a=$(".update_clone-panel:nth-last-child(3)").find(".update_new_start_time").val();
          update_b=$(".update_clone-panel:nth-last-child(3)").find(".update_new_end_time").val();
        }

      }

      $(".update_clone").removeAttr("readonly");

    });
    
    // Edit modal : on change start time
    function update_new_start_time_on_change(id){
      
       update_inTime=$(".update_inTime").val();
       update_outTime=$(".update_outTime").val();

    var update_len=$(".update_clone-panel").length;

    $(id).closest(".form-group").find(".update_temp-error_on_add").remove();
    var update_data="";

    // check is first clone div 
    
    var update_checkMe = $(id).closest(".update_clone-panel");
    var update_check   = $(".parent-append").find(update_checkMe).is(":first-child");
    
    if( update_check ){
      update_a = "";
      update_b = "";

      update_data=$(id).closest(".update_clone-panel").find("p").text();
      
    }else{
      update_a = $(update_checkMe).prev(".update_clone-panel").find(".update_new_start_time").val();
      update_b = $(update_checkMe).prev(".update_clone-panel").find(".update_new_end_time").val();

      update_new_end_time="";
    }
    $(id).closest(".update_clone-panel").find(".update_new_end_time").val("");
    // check is first clone div 
    update_new_start_time  = $(id).val();
    update_new_end_time  = $(id).closest(".update_clone-panel").find(".update_new_end_time").val();
    
    $(".update_temp-error").remove();

    if(update_inTime=="")
    {
        $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'>Please select the in time </small> ");
      $(id).val("");
      $("#update_inTime").focus();
      update_new_start_time="";
      
    } else if( update_outTime=="") {
      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'>Please select the out time</small> ");
      $(id).val("");
      $("#update_outTime").focus();
      update_new_start_time="";
      
    } else if(update_new_start_time<update_b || update_new_start_time<update_a) {
      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'>Your new activity time should be greater than previous activity time</small> ");
      $(id).val("");
      
    } else if(update_new_start_time>update_inTime && update_new_start_time>update_outTime) {
      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'>Your activity time should be less than the out time</small> ");
      $(id).val("");
      
    } else if(update_new_start_time<update_inTime) {
      
      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'>Your new activity time should be greater than or equal to in time</small> ");
      $(id).val("");
      
    } else if(update_new_start_time==update_new_end_time) {
      
      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'> Start and end time should be different </small> ");
      $(id).val("");
      
    }  
    $("#update_submit,#update_submit_btn").removeAttr("disabled");

    update_clearAllActivitiesTime(id);
    update_oops_onchange_of_start_time(id);
    
    }

    //Edit Model: on change end time
  function update_new_end_time_on_change(id){

     update_inTime=$(".update_inTime").val();
     update_outTime=$(".update_outTime").val();

     var update_len=$(".update_clone-panel").length;
      
     $(id).closest(".form-group").find(".update_temp-error_on_add").remove();
    
    // check is first clone div 
    var update_checkMe = $(id).closest(".update_clone-panel");
   

    var update_check = $(".parent-append").find(update_checkMe).is(":first-child");

    if( update_check ){
      update_a = "";
      update_b = "";
    }else{
      update_a = $(update_checkMe).prev(".update_clone-panel").find(".update_new_start_time").val();
     update_b = $(update_checkMe).prev(".update_clone-panel").find(".update_new_end_time").val();

    }
    // check is first clone div 

    update_new_start_time=$(id).closest(".update_clone-panel").find(".update_new_start_time").val();
    update_new_end_time = $(id).val();

    $(".update_temp-error").remove();
     if(update_inTime=="")
    {
      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'>Please select the in time </small> ");
      $(id).val("");
      $("#update_inTime").focus();
        
      update_new_end_time="";
      
    }
    else if( update_outTime=="")
    {
      
      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'>Please select the out time</small> ");
      $(id).val("");
      $("#update_outTime").focus();
        update_new_end_time="";
    
    }else if(update_new_start_time=="")
    {
        
      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'> Please select start time </small> ");
      $(id).val("");
      $(id).closest(".update_clone-panel").find(".update_new_start_time").focus();
      update_new_end_time="";
    }
     else if(update_new_end_time<update_new_start_time) {

      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'> Your new activity end time should be greater than new start activity time </small> ");
      $(id).val("");
    } else if(update_new_end_time>update_new_start_time && update_new_end_time>update_outTime) {

      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'> Your new activity end time should be less than or equal to out time </small> ");
      $(id).val("");
    } else if(update_new_start_time==update_new_end_time) {
      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'> Start and end time should be different </small> ");
      $(id).val("");
    } 
    else if(update_new_end_time<update_b)
    {
      $(id).closest(".form-group").append("<small class='update_temp-error' style='color:#a94442;'> Your new activity end time should be greater than previous activity time </small> ");
      $(id).val("");
    }else {
      $(".update_temp-error").remove();
    }

    
       update_clearAllActivitiesTime(id);
       update_oops_onchange_of_end_time(id);
       $("#update_submit,#update_submit_btn").removeAttr("disabled");
      
    }

    // Edit modal : on change new activity (textarea)
    function update_new_activity_on_change(id) {

      update_new_activity_text=$(id).val();
      update_validation_on_add_activity_btn();
    }

function update_oops_onchange_of_start_time(id)
  {

      var update_length1=$(".update_clone-panel").length;

      for(var k=0;k<update_length1;k++)
      {
        if($(".update_clone-panel").eq(k).find(".update_new_start_time_group small").hasClass("update_temp-error_on_add"))
        {
         
            $(".update_clone-panel").eq(k).find(".update_new_start_time_group").addClass("has-error");
        }
        else{
          
          $(".update_clone-panel").eq(k).find(".update_new_start_time_group").removeClass("has-error");
        }
      }

    
  } 

  function update_oops_onchange_of_end_time(id)
  {

      var update_length1=$(".update_clone-panel").length;

      for(var k=0;k<update_length1;k++)
      {
        
        if($(".update_clone-panel").eq(k).find(".update_new_end_time_group small").hasClass("update_temp-error_on_add"))
        {
         
            $(".update_clone-panel").eq(k).find(".update_new_end_time_group").addClass("has-error");
        }
        else{
        
          $(".update_clone-panel").eq(k).find(".update_new_end_time_group").removeClass("has-error");
        }
      }

    
  } 

function update_new_activity_on_change(id) 
  {
    
  update_new_activity_text=$(id).val();

  }

  $(".update_employee_Name").keyup(function(){
    $(this).closest(".form-group").find(".update_temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");
  });
  $(".update_reporting_name").keyup(function(){
    $(this).closest(".form-group").find(".update_temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");

  });
  $(".update_date_1").change(function(){
    $(this).closest(".form-group").find(".update_temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");

  });

  $(".update_working_from").change(function(){
    $(this).closest(".form-group").find(".update_temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");
    $(".update_working_from_group .custom-a11yselect-btn").removeClass('has-error1');  

  });

  $("#update_inTime").change(function(){
    $(this).closest(".form-group").find(".update_temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");

  });
  $("#update_outTime").change(function(){
    $(this).closest(".form-group").find(".update_temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");

  });
   $(".update_new_start_time").change(function(){
    $(this).closest(".form-group").find(".update_temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");

  });
  $(".update_new_end_time").change(function(){
    $(this).closest(".form-group").find(".update_temp-error_on_add").remove();
    $(this).closest(".form-group").removeClass("has-error");

  });

  
    

    // Edit Model: check validation 
    function update_validation_on_add_activity_btn() {
      // 27-03-2020    
      $isFormValidate = false;
      
      update_name      =$(".update_employee_Name").val();
      update_reporting_name   =$(".update_reporting_name").val();
      update_date_1       =$(".update_date_1").val();
      update_working_from   =  $(".update_working_from_group #update_working_from-button .custom-a11yselect-text").text();
      update_in_time_of_office=$(".update_inTime").val();
      update_out_time_of_office=$(".update_outTime").val();

      $(".update_temp-error_on_add,.update_temp-error").remove();

      var update_check_last="";

      var update_length1=$(".update_clone-panel").length;

      if(update_name=="") {
        $(".update_employee_Name_group").append("<small class='update_temp-error_on_add' style='color:#a94442;'> Please enter your name</small> ");
        $(".update_employee_Name_group").addClass("has-error");
        
        // 27-03-2020
        $isFormValidate = true;
    }

    if(update_reporting_name=="") {
        $(".update_reporting_name_group").append("<small class='update_temp-error_on_add' style='color:#a94442;'> Please enter your reporting authority name</small> ");
        $(".update_reporting_name_group").addClass("has-error");
      $isFormValidate = true;
    } 
    
    if(update_date_1=="") {
      $(".update_date_1_group").append("<small class='update_temp-error_on_add' style='color:#a94442;'> Please select the date</small> ");
      $(".update_date_1_group").addClass("has-error");
        
        // 27-03-2020
      $isFormValidate = true;
    }
    
    if(update_working_from=="Select") {
      $(".update_working_from_group").append("<small class='update_temp-error_on_add' style='color:#a94442;'> Please select the working from</small> ");
      $(".update_working_from_group").addClass("has-error");
      $(".update_working_from_group .custom-a11yselect-btn").addClass('has-error1');  
      // 27-03-2020
      $isFormValidate = true;
    }

    if( update_in_time_of_office=="") {
      $(".update_inTime_group").append("<small class='update_temp-error_on_add' style='color:#a94442;'>Please enter in time</small> ");
      $(".update_inTime_group").addClass("has-error");
        
      // 27-03-2020
      $isFormValidate = true;
    } 

    if(update_out_time_of_office=="") {
      $(".update_outTime_group").append("<small class='update_temp-error_on_add' style='color:#a94442;'>Please enter out time </small> ");
      $(".update_outTime_group").addClass("has-error");
        
      // 27-03-2020
      $isFormValidate = true;
    }

    for(var i=0;i<update_length1;i++) {

      update_check_last=$(".update-parent-append .update_clone-panel").eq(i);
      update_new_start_time=$(".update_clone-panel").eq(i).find(".update_new_start_time").val();
      update_new_end_time=$(".update_clone-panel").eq(i).find(".update_new_end_time").val();
      update_new_activity_text=$(".update_clone-panel").eq(i).find(".update_new_activity_text").val();
     
     if(update_new_start_time=="") {

        update_check_last.find(".update_new_start_time_group").append("<small class='update_temp-error_on_add' style='color:#a94442;'> Please enter activity start time</small> ");
        update_check_last.find(".update_new_start_time_group").addClass("has-error");
        
        // 27-03-2020
        $isFormValidate = true;
      }
        

      if(update_new_end_time=="") {
        update_check_last.find(".update_new_end_time_group").append("<small class='update_temp-error_on_add' style='color:#a94442;'> Please enter activity end time</small> ");
        update_check_last.find(".update_new_end_time_group").addClass("has-error");
        
        // 27-03-2020
        $isFormValidate = true;
      }
        

     if(update_new_activity_text=="" || !update_new_activity_text.replace(/\s/g, '').length) {

        update_check_last.find(".update_activity_group").append("<small class='update_temp-error_on_add' style='color:#a94442;'> Please enter activity message </small> ");
        update_check_last.find(".update_activity_group").addClass("has-error");
        
        // 27-03-2020
        $isFormValidate = true;
      }
    }
}


    function update_overview_check_empty()
    {
         $edit_checkEmpty1 = false;

        var edit_update_name      =$(".update_employee_Name").val();
        var edit_update_reporting_name  =$(".update_reporting_name").val();
        var edit_update_date_1      =$(".update_date_1").val();
        var edit_update_working_from  = $(".update_working_from_group #update_working_from-button .custom-a11yselect-text").text();
        var edit_update_in_time_of_office=$(".update_inTime").val();
        var edit_update_out_time_of_office=$(".update_outTime").val();

         if(edit_update_name == "")
         {
            $edit_checkEmpty1 = true;
         }
         if(edit_update_reporting_name == "")
         {
            $edit_checkEmpty1 = true;
         }
         if(edit_update_date_1 == "")
         {
            $edit_checkEmpty1 = true;
         }
         if(edit_update_working_from == "Select")
         {
            $edit_checkEmpty1 = true;
         }
         if(edit_update_in_time_of_office == "")
         {
            $edit_checkEmpty1 = true;
         }
         if(edit_update_out_time_of_office == "")
         {
          $edit_checkEmpty1 = true;
         }

         return $edit_checkEmpty1; 

    }



function update_check_empty() {
  
  $update_checkEmpty = false;  
    
  $(".update_clone-panel .update_new_start_time").each(function() {
     var element = $(this);
    
     if (element.val() == "") 
     {
        $update_checkEmpty = true;
     }
  });

  $(".update_clone-panel .update_new_end_time").each(function() {
     var element = $(this);
     if (element.val() == "") 
     {
      $update_checkEmpty = true;
     }
  });
  
  $(".update_clone-panel .update_new_activity_text").each(function() {
     var element = $(this);
     if (element.val() == "" || !element.val().replace(/\s/g, '').length) 
     {
      $update_checkEmpty = true;
     }
  });
    
    return $update_checkEmpty;
  }


$(document).on("click","#update_submit",function(){
$(".dataTables_wrapper .dataTables_processing").html("Saving...");
});
var enableSubmit = function(ele) {
    $(ele).removeAttr("disabled");
}

// edit jquery validation

$(document).on('click','.update_clone',function(){
        
        var update_validate_empty  = update_check_empty();
        var update_validate_empty1 = update_overview_check_empty();
        
        if(update_validate_empty || update_validate_empty1) {
          update_validation_on_add_activity_btn();
          return false;
        } else {

            update_addButton();

            var update_date=$(".update_date_1_group .input-group input").val();
 
            var $update_template = $("#update_optionTemplate").clone();
            
            $update_clone  = $update_template.removeClass('hide').removeAttr('id').addClass('update_clone-panel');
            $update_template.addClass('edit_reset_clone');
                        // .insertBefore($update_template),
           
            $(".update-parent-append").append($update_template); 

            update_applyClocpicker();
            var update_reappendHtml = $(".update_clone-panel:nth-last-child(2)");
                update_reappendNo = $(".update_clone-panel:nth-last-child(2)").find("input[type='file']").attr("name");
                update_reappendNo = update_reappendNo.replace(/\D/g,'');
                update_appendNo = parseInt(update_reappendNo) + 1;

            $($update_clone).find("input[type='file']").attr("name", "update_attachment["+update_appendNo+"][]");
            $($update_clone).find(".update_Attachment").attr("name", "update_Attachment["+update_appendNo+"]");
            $($update_clone).find(".update_file-upload").attr("id", "update_Attachment["+update_appendNo+"]");
            $($update_clone).find(".update_file-upload").attr("id", "current_Attachment["+update_appendNo+"]");
             $($update_clone).find(".update_ifAttachmentExiting").attr("name", "update_ifAttachmentExiting["+update_appendNo+"]");
            $($update_clone).find(".update_new_start_time").attr("name", "activity_update_inTime[]");
            $($update_clone).find(".update_new_end_time").attr("name", "activity_update_outTime[]");
            $($update_clone).find(".update_new_activity_text").attr("name", "update_activity_msg[]");
       
            $activity_update_inTime = $update_clone.find('[name="activity_update_inTime[]"]');
            $activity_update_outTime= $update_clone.find('[name="activity_update_outTime[]"]');
            $update_activity_msg    = $update_clone.find('[name="update_activity_msg[]"]');

            $update_clone.find('.input-group-addon').removeAttr("style");
            $update_clone.find('.update_new_start_time').removeAttr("readonly");
            $update_clone.find('.update_new_start_time').removeAttr("style");
            $update_clone.find('.edit_attach .update_file-upload-button').css("display","inline-block");

            $(".update_clone").prop("readonly","true");  
            $update_clone.find(".form-control").css("padding-left","12px");
            $(".update_clone-panel").last().addClass("border-top");

        }     
    
});


$(document).on('click','#update_submit , #update_submit_btn',function()
{
        var update_validate_empty=update_check_empty();
        var update_validate_empty1 = update_overview_check_empty();
          
        if(update_validate_empty || update_validate_empty1) {
          update_validation_on_add_activity_btn();
          return false;
        } else {
        event.preventDefault();
        var form_data = $("#update_dailySheet_form");

        form_data = new FormData(form_data[0]);
        form_data.append('status', globalSubmitvalue);
        form_data.append('daily_sheet_id', $('#daily_sheet_id').val());
        form_data.append('update_working_from', $('#update_working_from').val());
        form_data.append('update_inTime', $('#update_inTime').val());
        form_data.append('update_outTime', $('#update_outTime').val());
   
        $.ajax({
          url: '<?php echo base_url(); ?>daily-sheet/edit',
          type: 'POST',
          dataType: "JSON",
          data: form_data,
          processData: false,
          contentType: false,
          success: function (json) {
             date_limit();
             var status = "Saved";
             $(".processing_text").html(status);
             $(".processing_text").css("display","inline-block");
             setTimeout(function(){
             $(".processing_text").css("display","none");
             }, 2000);
             $("#editDailySheet").trigger("reset");
             $(".update_temp-error_on_add").empty();
             $(".edit_clone").remove();
             $("#editDailySheet .update_clone-panel").removeClass("border-top");
             $(".edit_reset_clone").remove();
            if ( json.status == "true" ) {
              $('#editDailySheet').each(function(){
                $(this).modal('hide');
            });
            $('#empTable').each(function() {
                dt = $(this).dataTable();
                dt.fnDraw();
            })
            } else {
              
              $.confirm({
                title: 'Confirm!',
                content: json.msg,
                buttons: {
                  ok: function () {
                    // 27-03-2020
                    //window.location = "<?php echo base_url('daily-sheet')?>";
                  },
                }

              });
            }

          },
        });
}

  
});

  </script>

  <script type="text/javascript">
    
    // Edit Model: edit activity 
    $(".update_edit").click(function(){
      
      $(".edit_attach").css("display","block");
      
      $(".update_file-upload-button,.update_file_unlink,.update_delete_attachment,.update_delete").css("display","inline-block");
      
      $(".update_feedback_openFileBrowse.update_file-upload-button").css("display","none");
       
      $("#update_dailySheet_form #update_task_section :input").removeAttr("readonly");

      $("#update_dailySheet_form #update_task_section :input").removeAttr("style");

      $("#update_dailySheet_form #update_task_section .update_working_from").css("display","none");
      
      $("#update_dailySheet_form #update_task_section .input-group-btn span").removeAttr("style");
      
      $("#update_dailySheet_form #update_task_section .input-group-addon").removeAttr("style");

      $("#update_dailySheet_form #update_task_section .update_employee_Name").prop("readonly",true);
      $("#update_dailySheet_form #update_task_section .update_reporting_name").prop("readonly",true);
      $("#update_dailySheet_form #update_task_section .update_employee_Name").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none"});
      $("#update_dailySheet_form #update_task_section .update_reporting_name").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none"});
      $(".update_clone-panel .update_new_start_time,.update_clone-panel .update_new_end_time,.update_clone-panel .update_new_activity_text").removeAttr("readonly");
      $(".update_clone-panel .update_new_start_time,.update_clone-panel .update_new_end_time,.update_clone-panel .update_new_activity_text").removeAttr("style");
      $(" .input-group-btn span").removeAttr("style");
      $(".input-group-addon").removeAttr("style");
    
      $(".update_fileList li span").removeClass('close_update_fileList');
      
      $(".update_edit").css("display", "none");
   
      $(".update_footer-btn3").css("display","inline-block").removeAttr("readonly");
      
     // $(".feedback").css("display","none");
      $(".edit_attach .update_delete_attachment").css("display","inline-block");
      $(".form-control").css("padding-left","12px");
      $("#update_dailySheet_form #update_task_section .update_employee_Name ,#update_dailySheet_form #update_task_section .update_reporting_name").css("padding-left","0px");
      
      $(".update_clone").removeAttr("readonly");

      // for working from

      $(".update_working_from_group .input-group,.update_date_1_group .input-group").removeClass("display_none");
      
      $(".update_duplicate_working_from,.update_date_1_group .duplicate_update_date").addClass("display_none");

     //clockpicker
           
       $("#update_dailySheet_form .update_inTime_group .input-group,#update_dailySheet_form .update_outTime_group .input-group,.update_clone-panel .update_new_start_time_group .input-group,.update_clone-panel .update_new_end_time_group .input-group").removeClass("display_none");
       
       $(".duplicate_update_intime_clockpicker,.duplicate_update_outtime_clockpicker,.duplicate_update_newtime_clockpicker,.duplicate_update_endtime_clockpicker").addClass("display_none");   
  

       var leng=$(".update-parent-append .update_clone-panel").length;
       if(leng>1)
       {
        $(".update-parent-append .update_clone-panel .update_delete").css("display","inline-block");
       }
       else
       {
        $(".update-parent-append .update_clone-panel .update_delete").css("display","none");

       }

      var value = $(".update_duplicate_working_from").val(); 

      $("#update_dailySheet_form .update_working_from_group .custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
      
      $("#update_dailySheet_form .update_working_from_group .custom-a11yselect-menu .custom-a11yselect-option[data-val='"+value+"'] ").addClass("custom-a11yselect-selected custom-a11yselect-focused");

      var val_id = $(".update_working_from_group .custom-a11yselect-menu .custom-a11yselect-selected ").attr('id');

      var val_text=$(".update_working_from_group .custom-a11yselect-menu .custom-a11yselect-selected ").text();

      $("#update_dailySheet_form .update_working_from_group #update_working_from-button").attr("aria-activedescendant",val_id);

      $("#update_dailySheet_form .update_working_from_group #update_working_from-button .custom-a11yselect-text").text(val_text);


    });

$(".update_working_from").change(function(){

var update_loc = $(".update_working_from_group #update_working_from-button .custom-a11yselect-text").text();

$(".update_duplicate_working_from").val(update_loc);

});



  </script>

  <script type="text/javascript">
      
   // Edit Model: date picker
    $('#update_date_1').datepicker({

      maxDate: new Date(),
      autoclose: true,
    container:'#editDailySheet'
    }).on('changeDate', function(e){
    });

  </script>

  <script type="text/javascript">
    // Edit Model: clock picker
    update_applyClocpicker();
    function update_applyClocpicker(){
      $('.update_clockpicker').clockpicker({
        placement: 'bottom',
        align: 'left',
        default:'now',
        autoclose: true,
        donetext: 'Select',
      }).on('change', function(e){
      });

    }

  </script>

  <script type="text/javascript">
    var input = "";

$(document).on("change", ".update_file-upload", function(event){
  var attachment_id =  $(this).closest(".update_clone-panel").find(".update_file-upload").attr("id");
$(".current_update_fileList").css("display","block");
$(".current_update_fileList").val("");
// $(".update_fileList").css("display","none");

  input= document.getElementById(attachment_id);
  
var children = "";
for (var i = 0; i < input.files.length; i++) { //Progress bar and status label's for each file genarate dynamically
          var fileId = i;
         if(fileId == 0){

          children += '<li class="att_file_list file'+fileId+'" style="display: inline-block !important;margin-right: 15px;">' + input.files.item(i).name +'</li><br/>'+'<div class="progress_'+fileId+' progress_style" style="margin: 10px;position: relative;width: 40%;margin-left: 0px;"><div class="bar_'+fileId+'" style="background-color: #008DE6;height: 20px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;transition: width 0.3s ease 0s;width: 0;">&nbsp;</div ><p class="status_'+fileId+'" style="text-align: left;margin-right:-15px;font-weight:bold;color:saddlebrown"></p><div class="percent_'+fileId+'" style="color: #333;left: 48%;position: absolute;top: 0;">0%</div ></div><br/>';
         }else{
        children += '<li class="att_file_list file'+fileId+'" style="display: inline-block !important;margin-right: 15px;">' + input.files.item(i).name + '</li><br/>'+'<div class="progress_'+fileId+' progress_style" style="margin: 10px;position: relative;width: 40%;margin-left: 0px;"><div class="bar_'+fileId+'" style="background-color: #008DE6;height: 20px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;transition: width 0.3s ease 0s;width: 0;">&nbsp;</div ><p class="status_'+fileId+'" style="text-align: left;margin-right:-15px;font-weight:bold;color:saddlebrown;"></p><div class="percent_'+fileId+'" style="color: #333;left: 48%;position: absolute;top: 0;">0%</div ></div><br/>';
       }
      }
      $(this).closest(".update_clone-panel").find(".current_update_fileList").append(children);
     
      $('.update_file-upload').trigger('click');
});
    


    $(document).on("click", ".update_openFileBrowse", function(){
      var update_parent = $(this).closest(".update_clone-panel");
      $(update_parent).find(".update_file-upload").trigger("click");
      $("p.edit_attach_error").closest('div').remove();

    });
    
    var uploaded_edit_attachment="";

    function update_uploadFiles(element) {
      // $(".current_update_fileList").find("li").remove();
      // $(".current_update_fileList").find("br").remove();
      var update_parent   = $(element).closest(".update_clone-panel");
     $(".current_update_fileList").val();
     var current_li = $(".current_update_fileList").html();
            $(".current_update_fileList").val("");
      var update_input_file = $(element).closest(".update_clone-panel").find(".update_file-upload").attr("id");//All files
      file = document.getElementById(update_input_file);
      var files_count = file.files.length;
      for (var i = 0; i < file.files.length; i++) {
          update_upload_single_file(file.files.item(i).name, i,element,files_count);
          $(".progress_style").css("display","none");
    }


    }
    var update_count=0,update_file_count=0,update_temp_file_size=null;
    var current_files ="";
    
      function  update_upload_single_file(file, i,element,files_count){

      event.preventDefault();
      var fileId = i;
      var uploaded_edit_attachment = "";
      var current_files = "";
      $(".progress").css('display',"block");
      $(".progress").width('0%');
      var thisval         = this;
      var form_data       = $("#update_dailySheet_form");
      form_data           = new FormData(form_data[0]);
      form_data.append("current_index", $(element).attr("name") );
      form_data.append("edit_uploaded_file", file );

      var update_parent   = $(element).closest(".update_clone-panel");
      $(update_parent).find(".update_file-upload").trigger("click");
     
      $.ajax({
        url     : '<?php echo base_url(); ?>dailysheet/edit_upload_file',
        type    : 'POST',
        dataType: "JSON",
        data    : form_data,
        processData: false,
        contentType: false,

        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    percentComplete = parseInt(percentComplete * 100);
                                    
                                    $(".status_" + fileId).text(percentComplete + "% uploaded, please wait...");
                                    $('.percent_' + fileId).text(percentComplete + '%');
                                    $('.progress_' + fileId).css('width','40%');
                                    $('.bar_' + fileId).css('width', percentComplete + '%');
                                   
                                }

                            }, false);
                            
                            xhr.addEventListener("error", function (e) {
                             $(".status_" + fileId).text("Upload Failed");
                            },false);
                            
                            return xhr;
                            
                        }, 
        
        success: function(response){
  
          if(response.status != "true") {
            
             $(update_parent).find('.update_fileList').before().append("<div><p class='text-danger edit_attach_error' style='font-size: 14px;padding-top: 5px;'>"+response.msg+"</p></div>");
                
                setTimeout(function () {
                  $("p.edit_attach_error").closest('div').remove();
                }, 10000)
              }


            // }
         
          $(".current_update_fileList").css("display","none");
            $(".current_update_fileList").find(".progress_style").remove();
            $(".current_update_fileList").find("li").remove();
            $(".current_update_fileList").find("br").remove();
              // $(current_li).remove();
            $(".update_fileList").css("display","block");
            // if((i+1)==files_count){

            if(response.files!= ""){
              
              var update_temp = "";

             if(uploaded_edit_attachment!=""){
               uploaded_edit_attachment  = uploaded_edit_attachment+','+response.files.split(',');
             }else{
               uploaded_edit_attachment  = uploaded_edit_attachment+response.files.split(',');
             }
             if(current_files!=""){
              var allattachfiles        = current_files+","+response.files.split(',');
             }else{

              var allattachfiles        = current_files+response.files.split(',');
             }
              
               final_attach_files = response.files.split(',');
              $.each(final_attach_files, function(idx2,update_val2) { 
               var edit_file_string = update_val2;
               var text_edit_file_string = update_val2;
                update_temp = update_temp+"<li class='file_list' style='list-style-type: none;color: #707070;'>"+update_val2+"<span class='material-icons close_update_fileList' style='cursor: pointer;font-size: 15px;vertical-align: middle; margin-left:4px;color: #707070;' onclick='update_delete_files(this);' >close</span></li>";

                if($(element).closest('.update_clone-panel').find(".update_ifAttachmentExiting").val()){

                var text_file_name = $(element).closest('.update_clone-panel').find(".update_ifAttachmentExiting").val();
                
                edit_file_string = edit_file_string+','+text_file_name;
              
              $(element).closest('.update_clone-panel').find(".update_ifAttachmentExiting").val(edit_file_string);
              
              }else{

              $(element).closest('.update_clone-panel').find(".update_ifAttachmentExiting").val(edit_file_string);
              }

              if($(element).closest('.update_clone-panel').find(".update_Attachment").val()){

                var edit_text_file_name = $(element).closest('.update_clone-panel').find(".update_Attachment").val();
                
                text_edit_file_string = text_edit_file_string+','+edit_text_file_name;
              
              $(element).closest('.update_clone-panel').find(".update_Attachment").val(text_edit_file_string);
              
              }else{

              $(element).closest('.update_clone-panel').find(".update_Attachment").val(text_edit_file_string);
              }

                update_file_count++;

              });   
             
              $(update_parent).find(".update_fileList").append(update_temp);
              
              update_count++;
              
              }
          
          $('.update_file-upload').val('');
        },

      });
      
        if( $(update_parent).find(".update_fileList").length == 1 ){
       
        }
    
          

    }


     // Edit Model: delete attachment 
    function update_delete_files(element) {
      
      var deleteHtml            = $(element).closest('li');
      
      var singleFileDeleteName  = $(deleteHtml).text().split("close");
     
      var nerestFilesText       = $(deleteHtml).closest('.update_clone-panel').find(".update_Attachment").val();
      var deletedtFilesText       = $(deleteHtml).closest('.update_clone-panel').find(".update_ifAttachmentExiting").val();

      if( singleFileDeleteName[0] != "" && nerestFilesText != "" &&  deletedtFilesText != ""){

        nerestFinalFilesText = [];
        deleteFinalFilesText = [];
        if( nerestFilesText.indexOf(',') != -1 ){
          nerestFinalFilesText = nerestFilesText.split(",");
        
        }else{
          nerestFinalFilesText[0] = nerestFilesText;
        }

        if( deletedtFilesText.indexOf(',') != -1 ){
          deleteFinalFilesText = deletedtFilesText.split(",");
        
        }else{
          deleteFinalFilesText[0] = deletedtFilesText;
        }


        
        for (var i = 0; i < nerestFinalFilesText.length; i++) {

          if (nerestFinalFilesText[i] === singleFileDeleteName[0]) {
          
            nerestFinalFilesText.splice(i, 1);

          }

        }

        for (var i = 0; i < deleteFinalFilesText.length; i++) {

          if (deleteFinalFilesText[i] === singleFileDeleteName[0]) {
          
            deleteFinalFilesText.splice(i, 1);

          }

        }
        
          $(deleteHtml).closest('.update_clone-panel').find(".update_ifAttachmentExiting").val(deleteFinalFilesText);
        
          $(deleteHtml).closest('.update_clone-panel').find(".update_Attachment").val(nerestFinalFilesText);
          $(element).closest('li').remove();
         
      }

    }

    var deleted_file ="";
    function update_file_unlink(id,a_id) {
      
      var deleteHtml            = $(id).closest('li');
      
      var singleFileDeleteName  = $(deleteHtml).text().split("close");
    
      var nerestFilesText       = $(deleteHtml).closest('.update_clone-panel').find(".update_ifAttachmentExiting").val();
      
      var updated_delete_file = $(deleteHtml).closest('.update_clone-panel').find(".delete_ifAttachmentExiting").val();
     
      var dailySheetId          = $("#daily_sheet_id").val();

      nerestFinalFilesText = [];
      
      if( nerestFilesText.indexOf(',') != -1 ){
          nerestFinalFilesText = nerestFilesText.split(",");
      }else{
          nerestFinalFilesText[0] = nerestFilesText;
      }

      for (var i = 0; i < nerestFinalFilesText.length; i++) {
          
          singleFileDeleteName1= $.trim(singleFileDeleteName[0]);
          
          if (nerestFinalFilesText[i] == singleFileDeleteName1) {
            nerestFinalFilesText.splice(i, 1);
         
          if(updated_delete_file==""){
              updated_delete_file = updated_delete_file+singleFileDeleteName1;
           }else{
              updated_delete_file = updated_delete_file +','+singleFileDeleteName1;
           }
        }
      }
      
      $(deleteHtml).closest('.update_clone-panel').find(".update_ifAttachmentExiting").val(nerestFinalFilesText);
      
      $(deleteHtml).closest('.update_clone-panel').find(".delete_ifAttachmentExiting").val(updated_delete_file);
      
      $(deleteHtml).remove();
      
    }

  
    // Edit Model: remove error 
    $(".update_clone").click(function(){
      $(".update_temp-error").remove();
    });

    // Edit Model: clear activity time 
    function update_clearAllActivitiesTime(id){

      $(id).closest(".update_clone-panel").nextAll(".update_clone-panel").find(".update_new_start_time").val("");
      $(id).closest(".update_clone-panel").nextAll(".update_clone-panel").find(".update_new_end_time").val("");

     }

  </script>

  <script type="text/javascript">
  // Edit Model: on click feedback 

    var feedback_count=0,feedback_file_count=0,feedback_temp_file_size=null;
    
    $(document).on("click", ".update_feedback_openFileBrowse", function(){
      var feedback_parent = $(this).closest(".feedback");
      
      $(feedback_parent).find(".feedback_update_file-upload").trigger("click");
    });

    
$(document).on("change", "input[type=file]", function(event){
var feedback_parent = $(".feedback_update_file-upload").closest(".feedback");
var input = document.getElementById("feedback_attachment");
var output = $(feedback_parent).find(".text_update_feedback_fileList").html();
var children = "";
for (var i = 0; i < input.files.length; i++) { //Progress bar and status label's for each file genarate dynamically
          var fileId = i;
         if(fileId == 0){
          children += '<li class="att_file_list file'+fileId+'" style="display: inline-block !important;margin-right: 15px;">' + input.files.item(i).name +'</li><br/>'+'<div class="progress_'+fileId+' progress_style" style="margin: 10px;position: relative;width: 40%;margin-left: 0px;"><div class="bar_'+fileId+'" style="background-color: #008DE6;height: 20px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;transition: width 0.3s ease 0s;width: 0;">&nbsp;</div ><p class="status_'+fileId+'" style="text-align: left;margin-right:-15px;font-weight:bold;color:saddlebrown"></p><div class="percent_'+fileId+'" style="color: #333;left: 48%;position: absolute;top: 0;">0%</div ></div><br/>';
         }else{
        children += '<li class="att_file_list file'+fileId+'" style="display: inline-block !important;margin-right: 15px;">' + input.files.item(i).name + '</li><br/>'+'<div class="progress_'+fileId+' progress_style" style="margin: 10px;position: relative;width: 40%;margin-left: 0px;"><div class="bar_'+fileId+'" style="background-color: #008DE6;height: 20px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;transition: width 0.3s ease 0s;width: 0;">&nbsp;</div ><p class="status_'+fileId+'" style="text-align: left;margin-right:-15px;font-weight:bold;color:saddlebrown;"></p><div class="percent_'+fileId+'" style="color: #333;left: 48%;position: absolute;top: 0;">0%</div ></div><br/>';
       }
      }
      $(feedback_parent).find(".update_feedback_fileList").append(children);

      $('.file-upload').trigger('click');
});
  
  var fb_up_attach_file = "";
    
    $(document).on("click",".feedback_update_file-upload",function(){
      fb_up_attach_file = "";
    });
    $(document).on("click",".update_feedback_openFileBrowse .update_file-upload-button",function(){
      $("p.feedback_attach_error").closest('div').remove();
    });
    function fbuploadFiles(element) {
   var file = document.getElementById("feedback_attachment")//All files
   for (var i = 0; i < file.files.length; i++) {
    
          fb_upload_single_file(file.files.item(i).name, i);
          //$(".progress_style").css("display","none");
   }
}
    // Edit Model: on chenge find files of closest feedback
    //$(document).on("change",".feedback_update_file-upload", function(){
     function fb_upload_single_file(file,i){

      event.preventDefault();
      var fileId = i;
      var fb_up_attach_file = "";
      $(".progress").css('display',"block");
      $(".progress").width('0%');
      var feedback_parent = $(".feedback_update_file-upload").closest(".feedback");
      $(feedback_parent).find(".feedback_update_file-upload").trigger("click");
      // var thisval = this;
      event.preventDefault();
      var form_data       = $("#update_dailySheet_form");
      form_data           = new FormData(form_data[0]);
      
      form_data.append("feedback_uploaded_file", file );
      $.ajax({
        url     : '<?php echo base_url(); ?>dailysheet/feedback_upload_file',
        type    : 'POST',
        dataType: "JSON",
        data    : form_data,
        processData: false,
        contentType: false,


        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    percentComplete = parseInt(percentComplete * 100);
                                   
                                    $(".status_" + fileId).text(percentComplete + "% uploaded, please wait...");
                                    $('.percent_' + fileId).text(percentComplete + '%');
                                    $('.progress_' + fileId).css('width','40%');
                                    $('.bar_' + fileId).css('width', percentComplete + '%');
                                   
                                }

                            }, false);
                            
                            xhr.addEventListener("error", function (e) {
                             $(".status_" + fileId).text("Upload Failed");
                            },false);
                            
                            return xhr;
                            
                        }, 
        
        success: function(response){
          
          if( response.status != "true" ) {

          // }else{
            var success_feedback_parent = $(".feedback_update_file-upload").closest(".feedback");
             $('.progress_' + fileId).css('display','none');
             var feedback_parent = $(".feedback_update_file-upload").closest(".feedback");
             $(feedback_parent).find(".update_feedback_fileList .file"+fileId+"").remove();
             $(feedback_parent).find(".update_feedback_fileList .progress_"+fileId+"").remove();
             $("br").remove();
          $(success_feedback_parent).find('.text_update_feedback_fileList').before().append("<div><p class='text-danger feedback_attach_error' style='font-size: 14px;padding-top: 5px;'>"+response.msg+"</p></div>");
                
            setTimeout(function () {
              $("p.feedback_attach_error").closest('div').remove();
            }, 10000)
       }
       

         if(response.files != ""){
          
            var success_feedback_parent = $(".feedback_update_file-upload").closest(".feedback");
            $(success_feedback_parent).find(".update_feedback_fileList").empty();

            if(fb_up_attach_file.length != ""){
              fb_up_attach_file = fb_up_attach_file+','+response.files ;
            }else{
              fb_up_attach_file = fb_up_attach_file+response.files ;
            }

            
             
            review_feedback_attachment  = fb_up_attach_file.split(',');
          
            var feedback_temp = "";
            $.each(review_feedback_attachment, function(idx2,val2) { 
              var feedback_file_string = val2;
              feedback_temp = feedback_temp+"<li class='file_list'>"+val2+"<span class='material-icons close_update_fileList' style='cursor: pointer;font-size: 15px;vertical-align: middle; margin-left:4px;color: #707070;' onclick='update_feedback_delete_files(this);' >close</span></li>";
              if($(success_feedback_parent).find('.current_feedback').val()){

              var text_file_name = $(success_feedback_parent).find('.current_feedback').val();
                feedback_file_string = feedback_file_string+','+text_file_name;
              
              $(success_feedback_parent).find('.current_feedback').val(feedback_file_string);
              
              }else{

              $(success_feedback_parent).find('.current_feedback').val(feedback_file_string);
              }
              
              feedback_file_count++;

            });   
 
            $(success_feedback_parent).find(".text_update_feedback_fileList").append(feedback_temp);

            feedback_count++;

         }


        },

    });
}

    // Edit Model: delete feedback Attachment
     function update_feedback_delete_files(element) {
      alert('hiiii');
      var deleteHtml            = $(element).closest('li');
      var singleFileDeleteName  = $(deleteHtml).text().split("close");
      var nerestFilesText       = $(deleteHtml).closest('.feedback').find(".current_feedback").val();
     
      if( singleFileDeleteName[0] != "" && nerestFilesText != "" ){
        
        nerestFinalFilesText = [];

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
        

        $(deleteHtml).closest('.feedback').find(".current_feedback").val(nerestFinalFilesText);
        $(element).closest('li').remove();

      }
    }
    
  </script>


  <script type="text/javascript">
   
  // Edit Model: textarea css 
  function textAreaAdjust(o) {
    $(o).closest(".form-group").find(".update_temp-error_on_add").remove();

    if ($(o).val() == "" || !$(o).val().replace(/\s/g, '').length) {

          $(o).closest(".form-group").append("<small class='update_temp-error_on_add' style='color:#a94442;'> Please enter activity message </small> ");
          $(o).closest(".form-group").addClass("has-error");
        } 
      else
      {
       $(o).closest(".form-group").find(".update_temp-error_on_add").remove();
       $(o).closest(".form-group").removeClass("has-error");
      }

    o.style.height = "1px";
    o.style.height = (2+o.scrollHeight)+"px";
  }



    
  </script>

  <script >

  function GetMonthName(monthNumber) {
  var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June',
  'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  return months[monthNumber-1];
  }
  // Edit Model: draf edit modal - ajax 
  var username ="";
  var reviwerName = "";
  $(document).on("click", "tr[role=row]" , function(event){
     var thisval = $(this);
     $(thisval).prop('disabled', true);
     $(".update_feedback_fileList").empty();
     $(".text_update_feedback_fileList").empty();
     $("#feedback").val("");
     $("#current_feedback").val("");
     $("#editDailySheet").trigger("reset");
     $(".update_temp-error_on_add").empty();
     $(".edit_clone").remove();
     $("#editDailySheet .update_clone-panel").removeClass("border-top");
     $(".edit_reset_clone").remove();
     event.preventDefault();
      if(!event.detail || event.detail==1){
        date_limit();
     $(".date_error").val("");
     $(".update_footer-btn3").css("display","none");
     $(".feedback .update_file-upload-button,.user_feedback").css("display","none");
     $(".update_feedback_openFileBrowse .update_file-upload-button").css("display","none");
     $("#update_submit_btn,#update_submit").removeAttr("disabled");

    var statusAction = $(this).find("td").attr("data-value");
  
     editId = $(this).find("td").attr("id");//
    
    $(".feedback_existing_append").html("");

    
    $.ajax({
      url: '<?php echo base_url(); ?>daily-sheet/review-details',
      type: 'POST',
      dataType: "JSON",
      data: {"editId":editId},
      async  : false,
     
      success: function (response) {
        
        if( response.status == "true" ){
          // if success request
          url = response.data.url;
          username = response.data.main.user_name;
          // append main activity details 
          $(".daily_sheet_id").val(response.data.main['id']);
          $(".update_employee_id").val(response.data.main['user_id']);
          $(".update_reporting_id").val(response.data.main['user_parent_id']);
          $(".update_employee_Name").val($.trim(response.data.main['user_name']));
          $(".update_reporting_name").val($.trim(response.data.main['parent_name']));
          $('.update_date_1').val(response.data.main['daily_sheet_date']);
          $(".update_working_from").val(response.data.main['working_from']);
          var cur_val=response.data.main['working_from'];

          $("#update_dailySheet_form .update_working_from_group .custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
      
          $("#update_dailySheet_form .update_working_from_group .custom-a11yselect-menu .custom-a11yselect-option[data-val='"+cur_val+"'] ").addClass("custom-a11yselect-selected custom-a11yselect-focused");

          var val_id = $(".update_working_from_group .custom-a11yselect-menu .custom-a11yselect-selected ").attr('id');

          var val_text=$(".update_working_from_group .custom-a11yselect-menu .custom-a11yselect-selected ").text();

          $("#update_dailySheet_form .update_working_from_group #update_working_from-button").attr("aria-activedescendant",val_id);

          $("#update_dailySheet_form .update_working_from_group #update_working_from-button .custom-a11yselect-text").text(val_text);

           $(".update_duplicate_working_from").val(response.data.main['working_from']);
          $(".update_inTime").val(response.data.main['in_time']);
          $(".update_outTime").val(response.data.main['out_time']);

          var a=$(".update_duplicate_working_from").val();
          
           // assign in time & out time in global varibale
          update_inTime   = response.data.main['in_time'];
          update_outTime  = response.data.main['out_time'];
          
          // append existing activity
          for(i=0 ; i<(response.data.activities).length; i++){
             
            var ifAttachment        = ""; 
            var ifAttachmentExiting = ""; 

            if( response.data.activities[i].attachment != null ) {
             
              var attachment    = response.data.activities[i].attachment;
              var nameArr       = attachment.split(',');
              
              for(j=0; j<(nameArr).length; j++){
                 
                if( nameArr[j] != "" ){
                  
                  ifAttachmentExiting = ifAttachmentExiting+nameArr[j]+",";
                  ifAttachment = ifAttachment+'<li><a class="download" data="s3://fincrm/Development/'+url+'/daily_sheet/create&review/'+response.data.main.id+'/'+nameArr[j]+'" target="_blank"><span class="glyphicon glyphicon-download-alt"></span><span>&nbsp;&nbsp;&nbsp;'+nameArr[j]+'</span></a><span class="material-icons update_file_unlink" style="cursor: pointer;font-size: 15px;vertical-align: middle; margin-left:4px;color: #707070;" onclick="update_file_unlink(this,'+response.data.activities[i].id+');" data-id="" >close</span></li>';
                }
              }

            }

            // build update activity html
            updateExistActivity = '<div class="main_body update_clone-panel edit_clone border-top"> <div class="row"> <div class="col-md-6"> <div class="row"> <div class="col-md-6"><div class="form-group  update_new_start_time_group"><label>Start Time<span class="text-danger">  *</span></label><div class="input-group"><input type="text" class="form-control update_new_start_time update_clockpicker" name="activity_update_inTime[]" value="'+response.data.activities[i].start_time+'" id=""  onkeydown="return false" required onchange="update_new_start_time_on_change(this);" onfocus="getEventUpdate(this)"><span class="input-group-addon" for="exist_start" onclick="getIcon(this)"><span class="" ><i class="material-icons create_popup">schedule</i></span></span></div><input type="text" class="form-control duplicate_update_newtime_clockpicker display_none" value="'+response.data.activities[i].start_time+'"></div></div><div class="col-md-6"><div class="form-group  update_new_end_time_group"><label>End Time<span class="text-danger">  *</span></label><div class="input-group"><input type="text" class="form-control update_new_end_time update_clockpicker"  name="activity_update_outTime[]" value="'+response.data.activities[i].end_time+'"id=""  onchange="update_new_end_time_on_change(this);" required onfocus="getEventUpdate(this)" onkeydown="return false"><span class="input-group-addon" for="exist_end" onclick="getIcon(this)"><span class="" ><i class="material-icons create_popup">schedule</i></span></span></div><input type="text" class="form-control duplicate_update_endtime_clockpicker display_none" value="'+response.data.activities[i].end_time+'"></div></div></div></div><div class="col-md-6"><span class="material-icons-outlined update_delete" style="float: right;">delete_outline</span></div></div><div class="row "><div class="col-md-12"><div class="form-group update_activity_group"><label>Description<span class="text-danger">  *</span></label><textarea class="form-control update_new_activity_text" name="update_activity_msg[]" onfocusout="update_new_activity_on_change(this);" onkeyup="textAreaAdjust(this)" required>'+$.trim(response.data.activities[i].activity)+'</textarea></div></div></div><div class="row edit_attach"><div class="col-xs-2 col-sm-1 col-md-1 update_delete_attachment"><div class="form-group "><label>Attachments</label><input type="file" class="update_file-upload form-control" name="update_attachment['+i+'][]" id="update_attachment['+i+']" multiple onchange="update_uploadFiles(this)"/><button type="button" class="update_openFileBrowse update_file-upload-button"><i class="material-icons-outlined">attach_file</i>  </button></div></div><div class="col-xs-10 col-sm-11 col-md-11"><div><ul class="current_update_fileList"></ul><ul class="update_fileList">'+ifAttachment+'</ul> <div class="update_existing_file"> <input type="hidden" class="update_ifAttachmentExiting" name="update_ifAttachmentExiting['+i+']" value="'+ifAttachmentExiting+'"><input type="hidden" class="delete_ifAttachmentExiting" name="delete_ifAttachmentExiting['+i+']" value=""><input type="hidden" class="update_Attachment" name="update_Attachment['+i+']"><input type="hidden" class="current_Attachment" name="current_Attachment['+i+']">  </div> </div></div></div></div>';

            update_a = response.data.activities[i].start_time;
            update_b = response.data.activities[i].end_time;

            $(".update-parent-append").append(updateExistActivity);

            if( response.data.activities[i].attachment == "" ){
              var act_len = $(".main_body").length;
              $(".main_body").eq(act_len-1).find(".edit_attach").css("display","none");
            }
            //Remove border and apply readonly attribute for update form Start
               
              $(".update_clone-panel").last().removeClass("border-bottom");

              $("#update_dailySheet_form #update_task_section :input").prop("readonly", true);
              $("#update_dailySheet_form #update_task_section :input").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none","padding-left":"0px"});
              $("#update_dailySheet_form #update_task_section .input-group-btn span").css("display","none");
              $("#update_dailySheet_form #update_task_section .input-group-addon").css({"display":"none","border":"none"});

              $(".update_new_start_time,.update_clone-panel .update_new_end_time,.update_clone-panel .update_new_activity_text,.duplicate_update_newtime_clockpicker,.duplicate_update_endtime_clockpicker").prop("readonly", true);
              $(".update_new_start_time,.update_clone-panel .update_new_end_time,.update_clone-panel .update_new_activity_text,.duplicate_update_newtime_clockpicker,.duplicate_update_endtime_clockpicker").css({"background-color":"#fff","border":"none","box-shadow":"unset","box-shadow":"unset","outline":"none","padding-left":"0px"});
              $(".update_clone-panel .input-group-addon").css({"display":"none","border":"none"});
              $(".update_delete").css("display", "none");
              $(".edit_attach .update_delete_attachment").css("display","none");
              $("#update_dailySheet_form .form-control").addClass("padding_css");
          }

          // append feedback

          if(statusAction == "accept"){
           $('.edit_title').text('Daily Sheet');
           if((response.data.feedback).length >0){
                 
            $("[type='submit']").css("display", "none");
           
            $('#feedback,.update_edit,.update_file_unlink,.update_file-upload-button').css("display","none");

             $('.feedback,.update_delete_attachment').css("display","block");
             $(".bv-hidden-submit").css("display","none");
          }else{
             
             $("[type='submit']").css("display", "none");
            
             $('.update_file-upload-button,.update_file_unlink,.feedback,.update_edit').css("display","none");
              $('#feedback,.update_delete_attachment').css("display","block");
             $(".bv-hidden-submit").css("display","none");
          }
            
          }else if(statusAction == "draft" ){
            $('.edit_title').text('Edit Daily Sheet');
            if((response.data.feedback).length >0){
            $("[type='submit']").css("display", "inline-block");
           
            $('.update_edit').css("display","inline-block");
            
               $('.feedback,#feedback,.update_delete_attachment').css("display","block");
                $(".bv-hidden-submit,.update_file_unlink,.update_file-upload-button").css("display","none");
                $(".feedback .update_file-upload-button").css("display","none");
           }else{
            $('#feedback,.update_edit,.update_delete_attachment').css("display","inline-block");
            $("[type='submit']").css("display", "inline-block");
            $('.feedback,.update_file_unlink,.update_file-upload-button').css("display","none");
            $(".feedback .update_file-upload-button").css("display","none");
              $(".bv-hidden-submit").css("display","none");
          }
                
          }else if(statusAction == "pending_review"){
            $('.edit_title').text('Daily Sheet');
             if((response.data.feedback).length >0){
              
                $('.update_edit').hide();
                $("[type='submit']").css("display", "none");
                $('#feedback,.update_file_unlink,.update_file-upload-button').css("display","none");
                $(".feedback .update_file-upload-button").css("display","none");
                $('.feedback,.update_delete_attachment').css("display","block");
                 $(".bv-hidden-submit").css("display","none");
            
             }else{
              $('.feedback').css("display","none");
              $("[type='submit']").css("display", "none");
              $('.update_file_unlink,.update_file-upload-button').css("display","none");
              $(".feedback .update_file-upload-button").css("display","none");
              $('.update_edit').hide();

               $('#feedback,.update_delete_attachment').css("display","inline-block");
                $(".bv-hidden-submit").css("display","none");
             }

          }else if(statusAction == "reject"){
             $('.edit_title').text('Edit Daily Sheet');
             $("[type='submit']").css("display", "inline-block");
           
            $('#feedback,.update_edit').css("display","inline-block");
            
               $('.feedback,.update_file_unlink,.update_file-upload-button,.update_delete_attachment').css("display","block");
               $(".update_file_unlink").css("display","inline-block");
                $(".bv-hidden-submit,.feedback .update_file-upload-button").css("display","none");
          }
            
           

            if((response.data.feedback).length >0 ){ 
              
              for(i=0 ; i<(response.data.feedback).length; i++){
               
                var feedback_Attachment     =""; 
                var feedback_file           = response.data.feedback[i].feedback_attachment;
                var separated_feedback_file = feedback_file.split(',');
                
                if((response.data.feedback[i].feedback_attachment).length  > 0){
                 
                  for(k=0; k<(separated_feedback_file).length; k++){
                   
                      if(feedback_Attachment !=""){
                         feedback_Attachment = feedback_Attachment+'</br><a class="download" data="s3://fincrm/Development/'+url+'/daily_sheet/create&review/'+response.data.main.id+'/'+separated_feedback_file[k]+'" target="_blank" ><i class="feedback-material-icons-outlined">attach_file</i>&nbsp;'+separated_feedback_file[k]+'</a>';
                      }else{
                         feedback_Attachment = feedback_Attachment+'<a class="download" data="s3://fincrm/Development/'+url+'/daily_sheet/create&review/'+response.data.main.id+'/'+separated_feedback_file[k]+'" target="_blank" ><i class="feedback-material-icons-outlined">attach_file</i>&nbsp;'+separated_feedback_file[k]+'</a>';
                      }
                        
                }
                
                } else {
                  
                  feedback_Attachment = "";
                }
             
                
                   var time = response.data.feedback[i].created_at.split(" ")[0];
                   var month = time.split("-")[1];
                   var monthName = GetMonthName(month);
                   var day = time.split("-")[2];
                
                if ( response.data.feedback[i].feedback_by == "5" ){
                   
                   var senderExsitingFeedback ='<div class="feedback_file_attach row"><div class="row feedback_alignment"><div class=""><div class="part1"><div class="pull-left"><span><img class="avatar image_align" width="20" src="<?php base_url(); ?>assets/dist/img/stream.png"><span class="text_info user_font">'+response.data.feedback[i].feedback_given_by+' posted</span></span></div><div class="pull-right"><span class="text-muted small_text" title='+response.data.feedback[i].created_at+'>'+day+' '+monthName+'</span></div></div></div></div><div class="row part2"><div class="col-md-12 feedback_text_info"><p>'+response.data.feedback[i].feedback+'</p></div></div><div class="row part3"><div class=""><div class="imgs">'+feedback_Attachment+'</div></div></div></div>';
                  $(".feedback_existing_append").prepend(senderExsitingFeedback);
                
                } else{

                  var time = response.data.feedback[i].created_at.split(" ")[1];
                   var reciverExsitingFeedback ='<div class="feedback_file_attach row"><div class="row feedback_alignment"><div class=""><div class="part1"><div class="pull-left"><span><img class="avatar image_align" width="20" src="<?php base_url(); ?>assets/dist/img/stream.png"><span class="text_info user_font">'+response.data.feedback[i].feedback_given_by+' posted</span></span></div><div class="pull-right"><span class="text-muted small_text" title='+response.data.feedback[i].created_at+'>'+day+' '+monthName+'</span></div></div></div></div><div class="row part2"><div class="col-md-12 feedback_text_info"><p>'+response.data.feedback[i].feedback+'</p></div></div><div class="row part3"><div class=""><div class="imgs">'+feedback_Attachment+'</div></div></div></div>';

                  $(".feedback_existing_append").prepend(reciverExsitingFeedback);
                    var first_feedback = $(".feedback_file_attach").last();
                first_feedback.addClass("last_fb_section");
                }
              }
            }

          //}

          $("#editDailySheet").modal({backdrop: 'static'},"show");

            // for working from

          $(".update_working_from_group .input-group,.update_date_1_group .input-group").addClass("display_none");
          $(".update_duplicate_working_from,.update_date_1_group .duplicate_update_date").removeClass("display_none");

           // clockpicker
          $(".duplicate_update_intime_clockpicker").val($(".update_inTime_group .update_inTime").val());
          $(".duplicate_update_outtime_clockpicker").val($(".update_outTime_group .update_outTime").val());
           
          $("#update_dailySheet_form .update_inTime_group .input-group,#update_dailySheet_form .update_outTime_group .input-group,.update_clone-panel .update_new_start_time_group .input-group,.update_clone-panel .update_new_end_time_group .input-group").addClass("display_none");
          $(".duplicate_update_intime_clockpicker,.duplicate_update_outtime_clockpicker,.duplicate_update_newtime_clockpicker,.duplicate_update_endtime_clockpicker").removeClass("display_none");


          // apply clockpicker 
          update_applyClocpicker();

        }else{

          // if error or invalid request
          //alert(response.msg);
        }


      },

    });
    
    }
      $(thisval).prop('disabled', false);
  });



  var filenames = Array();
  $(document).on("change", "#feedback_attachment", function(){

       filenames = Array.from(this.files).map(function(f) {
        return f.name;
        
      });
 });

  $(".feedback .update_file-upload-button,.user_feedback").css("display","none");
  
  $(document).on("click","#feedback", function(){
     $(".feedback .update_file-upload-button,.user_feedback").css("display","inline-block");
    $(".feedback_error").css("display","none");
  });

  $(document).on("click",".feedback_alignment,.feedback_text_info,.imgs", function(){
     $(".feedback .update_file-upload-button,.user_feedback").css("display","none");
   
  });

  $(".user_feedback").click( function(event){
  
    // feedback post
    if($(this).attr('value') == 5){
      
      if($("#feedback").val()==""){
   
        $(".feedback_error").css("display","block");
      }
    }

    event.preventDefault();
 
    var form_data = $("#update_dailySheet_form");
    form_data = new FormData(form_data[0]);
    form_data.append('daily_sheet_id', $('#daily_sheet_id').val());
    form_data.append('status', $(this).attr('value'));
    form_data.append('feedback_given_by', username);
    var daily_sheet_feedback  = $('#feedback').val();
    var daily_sheet_id        = $('#daily_sheet_id').val();
    
  
    $.ajax({
      url: '<?php echo base_url(); ?>dailysheet/addFeedback',
      type: 'POST',
      dataType: "JSON",
      data: form_data,
      processData: false,
      contentType: false,
      success: function (response) {
       
        if(response.status == "true"){
          $(".feedback .update_file-upload-button,.user_feedback").css("display","none");
        var separated_feedback_attach = response.data.feedback[0].feedback_attachment.split(',');
        
        var feedback_Attach = "";
        
        for(k=0; k<(separated_feedback_attach).length; k++){
           if(separated_feedback_attach[k]!=""){          
            
                      if(feedback_Attach !=""){
                         feedback_Attach = feedback_Attach+'</br><a class="download" data="s3://fincrm/Development/'+url+'/daily_sheet/create&review/'+response.data.feedback[0].daily_sheet_id+'/'+separated_feedback_attach[k]+'" target="_blank" ><i class="feedback-material-icons-outlined">attach_file</i>&nbsp;'+separated_feedback_attach[k]+'</a>';
                      }else{
                         feedback_Attach = feedback_Attach+'<a class="download" data="s3://fincrm/Development/'+url+'/daily_sheet/create&review/'+response.data.feedback[0].daily_sheet_id+'/'+separated_feedback_attach[k]+'" target="_blank" ><i class="feedback-material-icons-outlined">attach_file</i>&nbsp;'+separated_feedback_attach[k]+'</a>';
                      }
                      
                }
              }
      
        if(response.data.feedback[0] != ""){

          var time = response.data.feedback[0].created_at.split(" ")[0];
          var month = time.split("-")[1];
          var monthName = GetMonthName(month);
          var day = time.split("-")[2];
          var senderExsitingFeedback ='<div class="feedback_file_attach row"><div class="row feedback_alignment"><div class=""><div class="part1"><div class="pull-left"><span><img class="avatar image_align" width="20" src="<?php base_url(); ?>assets/dist/img/stream.png"><span class="text_info user_font">'+username+' posted</span></span></div><div class="pull-right"><span class="text-muted small_text" title='+response.data.feedback[0].created_at+'>'+day+' '+monthName+'</span></div></div></div></div><div class="row part2"><div class="col-md-12 feedback_text_info"><p>'+response.data.feedback[0].feedback+'</p></div></div><div class="row part3"><div class=""><div class="imgs">'+feedback_Attach+'</div></div></div></div><div style="border-top: solid 1px #FFF";></div>';
              
            $(".feedback_existing_append").prepend(senderExsitingFeedback);
        }

        if (response.status == "true") {
          $('#myModal').each(function(){
                $(this).modal('hide');
            });
            $('#empTable').each(function() {
                dt = $(this).dataTable();
                dt.fnDraw();
            })
          $("#feedback ").val("");
          $("#current_feedback ").val("");
          $(".update_feedback_fileList ").html("");
          $(".text_update_feedback_fileList ").html("");

        }else if(response.status == "false") { 
          $.alert({
              title: 'Confirm!',
              content: response.msg ,
              });
        }
      }
    }
      // return false;

    });

    //$("#feedback").val("");

  });


  </script>

  <!------------------------- start script Edit modal  ------------------------->


<!-- common code for close button -->
<script>
  $(".edit_dailysheet_close").click(function(){
      $("p.feedback_attach_error").html("");
      $("p.edit_attach_error").html("");
      $("#editDailySheet").trigger("reset");
      $(".update_temp-error,.update_temp-error_on_add").remove();
      $(".update_temp-error_on_add").empty();
      $(".edit_clone").remove();
      $("#editDailySheet .form-group").removeClass("has-error");
      $("#editDailySheet .update_working_from_group .custom-a11yselect-btn").removeClass("has-error1");
      $("#editDailySheet .update_clone-panel").removeClass("border-top");
      $(".edit_reset_clone").remove();
      $("#update_dailySheet_form #update_task_section .update_working_from").css("display","none");
      $("#update_working_from").customA11ySelect('refresh');
      
    });
    
    var emp_name= $("#employee_name").val();

   var emp_id=     $("#employee_id").val();
     var rep_name=   $("#reporting_name").val();
     var rep_id=   $("#reporting_id").val();

  $(".dailysheet_close").click(function(){
      $("p.create_attach_error").html("");
      $("#dailySheet_form").trigger('reset');
      $(".fileList").find("li").remove();
      $(".fileList_text").find("li").remove();
      $("#dailySheet_form .form-group").removeClass("has-error");
      $(".temp-error_on_add,.temp-error").remove();
      $(".fileList").find(".progress_style").remove();
      $(".attach_files").val("");
      $(".delete").css("display","none");
      $("#dailySheet_form #task_section :input").removeAttr("style");

      $("#dailySheet_form #task_section .input-group-btn span").removeAttr("style");
      $("#dailySheet_form #task_section .input-group-addon").removeAttr("style");
       $(".edit").css("display", "none");
      $(".clone-panel .new_start_time,.clone-panel .new_end_time,.clone-panel .new_activity_text,.clone-panel .duplicate_add_newtime_clockpicker,.clone-panel .duplicate_add_endtime_clockpicker").removeAttr("readonly");
      $(".clone-panel .new_start_time,.clone-panel .new_end_time,.clone-panel .new_activity_text").removeAttr("style");
      $(" .input-group-btn span").removeAttr("style");
      $(".input-group-addon").removeAttr("style");

      $("#dailySheet_form #task_section .date_1_group .input-group,.working_from_group .input-group,.inTime_group .input-group,.outTime_group .input-group,.new_start_time_group .input-group,.new_end_time_group .input-group ").removeClass("display_none");
      $("#dailySheet_form #task_section .date_1_group .duplicate_of_date,.duplicate_working_from,.duplicate_add_intime_clockpicker,.duplicate_add_outtime_clockpicker,.duplicate_add_newtime_clockpicker,.duplicate_add_endtime_clockpicker").addClass("display_none");
      
       $("#employee_name").val(emp_name);
        $("#employee_id").val(emp_id);
        $("#reporting_name").val(rep_name);
        $("#reporting_id").val(rep_id);

        $(".temp-error_on_add").empty();
        $(".reset_clone").remove();

      $("#dailySheet_form #task_section .working_from").css("display","none");

      $("#dailySheet_form .working_from_group .custom-a11yselect-btn").removeClass("has-error1");


      $("#working_from").customA11ySelect('refresh');
         
      $.ajax({
      url: '<?php echo base_url(); ?>dailysheet/delete_folder',
      success: function (result) {

      },

    });
    
  });
</script>
<!-- common code for close button -->


<!------------------------- end script section  ------------------------->


<script type="text/javascript">
  $(document).on("click", "#editDailySheet .input-group-addon ", function(){
 
    $(this).closest("div").find(".update_clockpicker").trigger('click');
  });
 

  $(document).on("click", "#dailySheet_form  .add_clockpicker ", function(){
   
    $(this).closest("div").find(".clockpicker").trigger('click');
  });

function focus_datepicker(e)
{
  $(e).closest("div").find("input").focus();
  getDateEvent($(e).closest("div").find("input"));
}

</script>

<script >
  $(document).on("change", ".date_1,.update_date_1", function(event){
      $('.date_error').html('');
      event.preventDefault();
      var task_date= $(this).val();
      var thisval = $(this);
      $.ajax({
        url     : '<?php echo base_url(); ?>dailysheet/check_date',
        type    : 'POST',
        dataType: "JSON",
        data    : {"task_date" : task_date},
        // processData: false,
        // contentType: false,
        success: function(response){
          if(response.status == "true")
          {
          }else{
            $('.date_error').html('<div><p>'+response.msg+'</p></div>');
            thisval.val("");
          }
        },
      });
    });
  
</script>
<script>

  $('.search-select').on('click', function(){
    var classn =$(this).find(":selected").val();
    $('.'+classn).show();
})</script>

<script>
  var options1 = "";
 $(document).on("change", '#options', function(event){
    
    var options = $(this).find(":selected").text();
     options1= $(this).find(":selected").val();
    $(this).find(":selected").remove();
    $('#container').append(elem);
  });
    
</script>

<script type="text/javascript">
  
  $(".selected_status,.selected_date,.selected_location,.start_date,.end_date").css("display","none"); 

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
      $(".selected_status").css("display","inline-block");
      

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
      
      

   if(class_name1=="selected_status")
   {
    // alert("hbsbd")
     $('#statusfilter').val('').select2({ allowClear :true, placeholder: 'Select Status', });
 $('#empTable').dataTable().fnFilter('');
    len+=1;

    $('#statusfilter').val([]);
    $(".searchfilter_combine .add_filter .dropdown-menu li:first").css("display","inline-block");
    $('#empTable').dataTable().fnFilter('');
   }
   if(class_name1=="selected_date")
   {
    $('#datefilter').val('').select2({ allowClear :true, placeholder: 'Select Date', });
    $("#datefilter").val("");
     $('#empTable').dataTable().fnFilter('');
    len+=1;
    $(".searchfilter_combine .add_filter .dropdown-menu li:last").css("display","inline-block");
   }if(class_name1=="selected_location")
   {
    len+=1;
    $('#location').val('').select2({ allowClear :true, placeholder: 'Select Location', });
     $('#location').val([]);
      $('#empTable').dataTable().fnFilter('');
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

$(".selected_status,.selected_date,.selected_location").css("display","none");
len +=3;
 
 $('#location').val('').select2({ allowClear :true, placeholder: 'Select Location', });
 $('#statusfilter').val('').select2({ allowClear :true, placeholder: 'Select Status', });
 $('#location').val([]);
 $('#statusfilter').val([]);
 
 $("#datefilter").val("");
 $("#searchByName").val("");
 $('#empTable').dataTable().fnFilter('');
 $(".add_filter .dropdown-menu").removeAttr("style");
 $(".searchfilter_combine .add_filter .dropdown-menu li:first").css("display","inline-block");
 $(".searchfilter_combine .add_filter .dropdown-menu li:last").css("display","inline-block");
 $(".searchfilter_combine .add_filter .dropdown-menu li:nth-child(2)").css("display","inline-block");

  $('#datefilter').select2({
  allowClear :true,
  placeholder: 'Select Date'
   });
 $("#filter_date_start,#filter_date_end").val('');

 $(".selected_date .start_date ,.selected_date .end_date").css("display","none");

});
</script>

<script type="text/javascript">
    $("#datefilter").change(function(){
        var selectedCountry = $(this).children("option:selected").val();
       
        if(selectedCountry==="custom")
        $(".start_date,.end_date").css("display","inline-block");
        else
        {
          $(".start_date,.end_date").css("display","none");
        }
    });
</script>

<script>
  $(document).on("click",".create_form" , function(){
     $("#submit,#submit_btn").css("display","inline-block");
     $(".delete").css("display","none");
     $("#myModal").modal({backdrop: 'static'},"show");
      date_limit();
     $(".date_error").html('');

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