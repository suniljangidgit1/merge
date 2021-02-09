<?php
//set timezone
date_default_timezone_set('UTC'); 

$id	=	isset($_GET["id"]) ? $_GET["id"] : NULL;;

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//include custom function
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

//fetch data
$sql           =    "SELECT `id`, `campaigns_name`, `list_name`, `list_id`, `sms_body`, `send_from`, `send_sms_date`, `send_sms_time`, `content_template_id`, `content_template_name` FROM `my_campaigns` WHERE id='".$id."'";

$result		     =	  mysqli_query($conn,$sql);
$row 		       =	  mysqli_fetch_array($result);

if(!empty($row) && count($row) > 0 && isset($row)) {

  $templateId    =    $row["content_template_id"];
  $templateName  =    $row["content_template_name"];
  $smsBody       =    $row['sms_body'];

  $sender_id     =    $row['send_from'];
  $output        =    '';

  $output        =     '
                          <div class="row">
                            <div class="col-xs-4">
                              <label>Sender Id : </label><br>
                            </div>
                            <div class="col-xs-8">
                              <select id="editSmsSenderId" name="editSmsSenderId" class="form-control">
                                <option value="">Select Sender Id</option>
                       ';

                        $category       =  'Promotional';
                        $getSenderId    =   getSenderId($category);

                        foreach ($getSenderId as $key => $value) {
                          
                          $output .= '<option value="'.$key.'"'; 
                              if($key == $sender_id)
                              {
                                  $output .= ' selected';
                              }


                          $output .= '>'.$key.'</option>';
                        }


  $output       .=     '      </select>
                            </div>
                          </div><br>

                          <div class="row">
                            <div class="col-xs-4">
                              <label>Content Template : </label><br>
                            </div>
                            <div class="col-xs-8">
                              <select id="editSmsContentTemplate" name="editSmsContentTemplate" class="form-control">
                                <option value="">Select Content Template</option>
                       ';

                        $getContentTemplate   = getContentTemplate($sender_id);
                        
                        foreach ($getContentTemplate as $key => $value) {

                          $output .= '<option value="'.$value.'"'; 
                              if($key == $templateName) {

                                  $output .= ' selected';
                              }
                          $output .= '>'.$key.'</option>';
                        }


  $output       .=     '     </select>
                            </div>
                          </div><br>
                       ';

  	
  $output .='

            <div class="row">
                  <div class="col-xs-4">
                    <label>Campaigns Name : </label>
                  </div>
                  <div class="col-xs-8">
                    <input type="text" id="campaigns_name" name="campaigns_name" class="form-control" placeholder="Campaign Name" value="'.$row['campaigns_name'].'">
                    <input type="hidden" value="'.$row['id'].'" name="id">
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-xs-4">
                    <label>SMS Text: </label><br>
                    <div>
                      <span>Characters: <b class="editSmsBodyLenght">0 </b></span> 
                      <span>SMS Credits: <b class="editSmscount">0</b></span>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <textarea id="sms_text_edit" placeholder="Add SMS Body here..." rows="6" name="sms_text" class="form-control" readonly>'.$smsBody.'</textarea>
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-xs-4">
                    <label>Recipients: </label><br>
                  </div>
                  <div class="col-xs-8 addRecipientsList">
                    <select id="sms_recipients" name="sms_recipients" class="form-control">';

                        $sql = "SELECT id,listname FROM contact_list WHERE deleted = '0'";

                        $result=mysqli_query($conn,$sql);
                        while($list_row = mysqli_fetch_assoc($result)) {
                            $output .= '<option value="'.$list_row['id'].','.$list_row['listname'].'"'; 
                            if($list_row['id'] == $row['list_id'])
                            {
                                $output .= ' selected';
                            }


                            $output .= '>'.$list_row['listname'].'</option>';
                        }


  $output .='                   </select>

                  </div>
                </div><br>

                 <!-- <div class="row recipients_show" style="display:block;">
                  <div class="col-xs-4">
                  </div>
                  <div class="col-xs-8">
                    <textarea rows="6" name="copy_paste" id="recipients" placeholder="Type or paste phone numbers, must be comma seprated." class="form-control"></textarea>
                  </div>
                </div><br> -->

                <div class="row">
                  <div class="col-xs-4"><label>Send SMS: </label></div>
                  <div class="col-xs-8">
                    <input type="radio" name="edit_send_sms" value="edit_immediately" class="edit_hideDateTime"> Immediately<br>
                    <input type="radio" name="edit_send_sms" value="edit_sms_date" class="edit_showDateTime"> Schedule At
                  </div>                 
                </div><br>
                <div class="row form-group hidden" id="edit_sendsms_showDateTime">
                    <div class="col-xs-4">
                    </div>
                    <div class="col-xs-4">
                    <style>.bv-form .help-block {white-space: break-spaces !important;}</style>
                    <div class="input-group">
                      <!-- <label>Date:</label> -->
                      <input class="form-control update_campaigns_date" required="" date-format="dd/mm/yyyy" id="send_sms_date1" name="date" placeholder="Select Date" type="text" data-bv-field="send_sms_date" value="'.str_replace('-', '/', $row['send_sms_date']).'" onchange="edit_my_campaigns_date()" onkeydown="return false" onclick="getDateEvent(this)">
                      <label class="btn-default_gray input-group-addon" for="send_sms_date1"><i class="material-icons-outlined" style="font-size: 16px !important;position: relative;">date_range</i></label>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="send_sms_clockpicker1 input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                      <input type="text" required="" name="time" id="send_sms_time1" placeholder="Select Time" class="form-control send_sms_time1 clockpicker_position" onchange="edit_campaign_checkTime()" data-bv-field="send_sms_time" value="'.$row['send_sms_time'].'" onkeydown="return false" onfocus="getEvent(this)">
                      <span class="btn-default_gray input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>                        
                  </div>
                      <script>
                        $(".send_sms_clockpicker1").clockpicker({
                          placement: "top",   
                          align: "left"
                        });

                        $(".input-group.date").datepicker({format: "dd/mm/yyyy",});

                          var date_input  = $(".update_campaigns_date"); //our date input has the name "date"
                          var container   = $(".bootstrap-iso form").length>0 ? $(".bootstrap-iso form").parent() : "body";

                          date_input.datepicker({
                            format      : "dd/mm/yyyy",
                            container     : container,
                            todayHighlight  : true,
                            autoclose     : true,
                            
                            startDate   : new Date(),
                            endDate     : new Date(new Date().setDate(new Date().getDate() + 365))
                          });
                        </script>
                </div>
                <div class="row">
                  <div class="col-sm-8"></div>
                  <div class="col-sm-4">
                    <button type="submit" value="updateCampaigns" class="btn btn-primary pull-right" id="sendSMSbtn">Update</button>
                  </div>
                </div>
        
    ';

  	
  $data['data'] = $output;

  //count lenght
  $smsLengthCount          =    strlen($smsBody);

  //count sms
  $smsCount   =   $smsLengthCount  /  160 ;
  $smsCount   =   ceil($smsCount);

  $data['smsCount']         =   $smsCount;
  $data['smsLengthCount']   =   $smsLengthCount;
  $data['status']           =   'true';
  echo json_encode($data);return;

} else {
    $data['status']           =   'false';
    echo json_encode($data);return;
}
?>