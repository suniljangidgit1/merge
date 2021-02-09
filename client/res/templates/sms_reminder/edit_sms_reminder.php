<?php

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//include custom function
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

$id             = isset($_GET['sr_id']) ? $_GET['sr_id'] : NULL;

$data["error"] 	= "true";
$data["status"] = "false";
$data["msg"] 	= "Invalid request!";

$sql = 'SELECT sr.id, sr.mobile_no, sr.sms_body, sr.reminder_time as sr_reminderTime, DATE_FORMAT(sr.reminder_date, "%d/%m/%Y") as sr_reminderDate, sr.created_at, sr.send_sms_date_time, sr.sms_status, sr.status, sr.send_from, sr.content_template_name FROM s_m_s_reminder as sr WHERE id="'.$id.'" ORDER BY sr.id ASC ';

$result = mysqli_fetch_array(mysqli_query($conn, $sql));
if( !empty($result) ){
  $id                 =   $result['id'];
  $mobile_no          =   $result['mobile_no'];
  $sms_body           =   $result['sms_body'];
  $sr_reminderDate    =   $result['sr_reminderDate'];
  $sr_reminderTime    =   $result['sr_reminderTime'];
  $sendFrom           =   $result['send_from'];
  $templateName       =   $result['content_template_name'];

  $output = '                    
            <input type="hidden" name="sr_id" id="sr_id" value="'.$id.'">
            <div class="row mrb-10">
              <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                  <div class="field">
                      <select name="edit_smssenderid" id="edit_smssenderid" class="form-control">
                        <option value="">Select Sender id</option>
            ';
                        $category       =  'Transactional ';
                        $getSenderId    =   getSenderId($category);

                        foreach ($getSenderId as $key => $value) {
                          
                          $output .= '<option value="'.$key.'"'; 
                              if($key == $sendFrom)
                              {
                                  $output .= ' selected';
                              }


                          $output .= '>'.$key.'</option>';
                        }

  $output .=     '    </select>
                      <span class="edit_SMS_error_main text-danger" style="display: none;">Please select sender id</span>
                  </div>    
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-9  form-group">
                <div  class="field"> 
                  <select name="edit_smscontent_template" id="edit_smscontent_template" class="form-control">
                        <option value="">Select Content Template</option>
            ';
                        $getContentTemplate   = getContentTemplate($sendFrom);
                        
                        foreach ($getContentTemplate as $key => $value) {

                          $output .= '<option value="'.$value.'"'; 
                              if($key == $templateName) {

                                  $output .= ' selected';
                              }
                          $output .= '>'.$key.'</option>';
                        }

  $output .=     '</select>
                  <span class="edit_SMS_error_main text-danger" style="display: none;">Please select content template</span>
                </div> 
              </div>
            </div>
            <div class="row mrb-10">
              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                <div class="">
                  <input class="form-control number-only" id="smsMobileNo2" maxlength="10" placeholder="Mobile Number" pattern="\d{10}" required type="text" name="smsMobileNo2" value="'.$mobile_no.'" />
                </div>
              </div>
            </div>
            <div class="row mrb-10">
              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                <div class="mrt-10">
                  <textarea class="form-control input-sm" id="smsBody2" placeholder="Message" required style="resize:none;" cols="16" rows="10" name="smsBody2">'.$sms_body.'</textarea>
                  <div>
                    <span>Characters: <b class="edit_smsBodyLenght">0</b></span> 
                    <span> SMS Credits: <b class="edit_smscount">0</b></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-12 col-sm-2 col-md-2">
                  <label>Send SMS: </label>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                  <input type="radio" id="edit_send_sms" name="edit_send_sms" value="immediately" class="edit_SMS_hideDateTime"> Immediately
                              &nbsp;&nbsp;
                  <input type="radio" id="edit_send_sms" name="edit_send_sms" value="sms_date" class="edit_SMS_showDateTime"> Schedule At
                </div>
                <div class="mrb-10" id="edit_showDateTimeInput" style="display: none;">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                          <div class="form-group">
                            <div id="filterDate2">
                              <div class="input-group smsDate2" data-date-format="dd.mm.yyyy">
                                <input  type="text" id="smsDate2" name="smsDate2" class="form-control" placeholder="Select Date" onkeydown="return false" onclick="editgetDateEvent1(this)" value="'.$sr_reminderDate.'" required onchange="smsDatecheck2()">
                                <label class="btn-default_gray input-group-addon" for="smsDate2">
                                  <i class="material-icons-outlined" style="font-size: 16px !important;position: relative;">date_range</i>
                                </label>
                              </div>  
                            </div>    
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                          <div class="sms-clockpicker clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true"> 
                              <input type="text" required id="smsTime2" name="smsTime2" placeholder="Select Time" class="form-control edit_clockpicker_position" onfocus="editgetEvent1(this)" onkeydown="return false" value="'.$sr_reminderTime.'" onchange="smsTimeCheck2()" />
                              <span class="btn-default_gray input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                          </div> 
                        </div>
                                    <script type="text/javascript">
                                        $(".clockpicker").clockpicker({
                                                placement : "top",
                                            });
                                    </script>
                    </div>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="bg bg-danger" style="padding: 10px;margin-bottom:10px;">
                      <p><b>Note : </b></p>
                      <p style="white-space: pre-line;">1) SMS reminder service can be used only for transactional messages and not promotional messages.</p>
                      <p style="white-space: pre-line;">2) The delivery status of this message will be updated within 1 minute of sending.</p>
                   </div>
                </div>
            </div>
            <div class="row mrb-10">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="mrt-5">
                  <button type="submit" id="update_sms_reminder" value="Save"  class="btn btn-primary pull-right" >Update</button>
                </div>
              </div>
            </div>
        ';

		//count lenght
    $smsLengthCount          =    strlen($sms_body);

    //count sms
    $smsCount   =   $smsLengthCount  /  160 ;
    $smsCount   =   ceil($smsCount);

		$data["error"] 	          =   "false";
		$data["status"]           =   "true";
		$data["msg"] 	            =   "Record found!";
		$data["data"] 	          =   $output;
    $data['smsCount']         =   $smsCount;
    $data['smsLengthCount']   =   $smsLengthCount;
		echo json_encode($data);return;
	}

echo json_encode($data);return;