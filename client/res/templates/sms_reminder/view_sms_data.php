<?php
//set timezone
date_default_timezone_set('UTC'); 

$id	    =	isset($_GET['id']) ? $_GET['id'] : NULL;

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$sql = "SELECT mobile_no, sms_body, reminder_date, reminder_time, sms_status,name, delivery_status, send_sms_date_time FROM send_s_m_s_data WHERE deleted='0'	AND id='".$id."'";

$result     =   mysqli_query($conn,$sql);
$row        =   mysqli_fetch_array($result);

$sms_name 		       = 	$row['name'];
$mobile_no 			   = 	$row['mobile_no'];
$sms_body 			   = 	$row['sms_body'];
$send_sms_date         = 	$row['reminder_date'];
$send_sms_time         =    $row['reminder_time'];
$sms_status 		   = 	$row['sms_status'];
$delivery_status 	   = 	$row['delivery_status'];
$scheduledAt           =    $row['send_sms_date_time'];

$output  = '';

//check sms type
if(!empty($scheduledAt)) {
    $output .= '
            <div class="row mrb-10">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <div id="filterDate2">
                            <div class="input-group smsDate1" data-date-format="dd.mm.yyyy">
                                <input type="text" id="smsDate1" name="smsDate1" class="form-control" placeholder="Select Date" value="'.date('d/m/Y', strtotime($send_sms_date)).'" readonly>
                                <div class="input-group-addon" >
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                        <input type="text" required id="smsTime1" name="smsTime1" placeholder="Select Time" class="form-control" onchange="smsTimeCheck1()" value="'.$send_sms_time.'" readonly/>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                </div>
            </div>
    ';
}

$output .= '
        <div class="row mrb-10">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input class="form-control number-only" id="smsMobileNo1" maxlength="10" minlength="10" placeholder="Mobile Number" pattern="\d{10}" required type="text" name="smsMobileNo1" value="'.$mobile_no.'" readonly/>
                </div>
            </div>
        </div>
        <div class="row mrb-10">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="mrt-10">
                    <textarea class="form-control input-sm" id="smsBody1" placeholder="Message : Only 140 characters" required style="resize:none;" maxlength="140" cols="16" rows="10" name="smsBody1" readonly>'.$sms_body.' </textarea>
                </div>
            </div>
        </div>
        <div class="row mrb-10">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="mrt-5">
                    </div>
                </div>
            </div>
';	

$data['data'] = $output;
echo json_encode($data);return;
?>