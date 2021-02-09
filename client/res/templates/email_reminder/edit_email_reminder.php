<?php  session_start();
$userName       =   $_SESSION['Login'];

//INCLUDE CUSTOM FUNCTION
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/customFunctions.php');

//DATABASE OPERATIONS
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/databaseOperations.php');

// get user details
$sql        =  "SELECT id FROM user WHERE user_name = '$userName'";
$row        =  $databaseOperations->getRecordArray($sql);
$userId     =  $row['id'];

$id         =   isset($_GET['id']) ? $_GET['id'] : NULL;
$json       =   true;

$data["error"] 	= "true";
$data["status"] = "false";
$data["msg"] 	= "Invalid request!";

// select data
$sql = 'SELECT er.id, er.subject, er.email_to, er.email_cc, er.email_body, send_email_time as er_sendEmailTime, DATE_FORMAT(er.send_email_date, "%d/%m/%Y") as er_sendEmailDate, er.file_name, er.created_at, er.send_email_date_time, er.email_status, er.status FROM email_reminder as er WHERE id="'.$id.'" ORDER BY er.id ASC ';

// fetch data
$result             =   $databaseOperations->getRecordArray($sql);
$id                 =   $result['id'];
$sendEmailDate      =   $result['er_sendEmailDate'];
$er_sendEmailTime   =   $result['er_sendEmailTime'];
$email_to           =   $result['email_to'];
$email_cc           =   $result['email_cc'];
$subject            =   $result['subject'];
$email_body         =   $result['email_body'];
$file_name          =   explode(",",$result['file_name']);
$fileHtml           =   "";

$deleteDir      =   $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/zipFolder/";

//delete existing files
if( is_dir($deleteDir) ) {
    deleteDir($deleteDir);
}

// get zip files name
if( !empty($file_name) ) {

	foreach( $file_name as $key => $value ) {

		if( $value!="" ) {

            if( !is_dir($deleteDir) ) {
                mkdir($deleteDir);
            }

            // transfer file from s3 buckets to local
            include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
            // Where the files will be source from
            $source = 'Production/'.$_SERVER['SERVER_NAME'].'/email_reminder_files/'.$userName.'/'.$id.'/'.$value;

            // Where the files will be transferred to
            $dest = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/reminder/zipFolder/'.$value;

            // Create a transfer object
            $result = $client->getObject(array(     
                'Bucket' => 'fincrm',
                'Key'    => $source,
                'SaveAs' => $dest,
            ));

            $file_path = '../reminder/zipFolder/'.$value;
        
            $ExtractFileName = '';
            $zip = new ZipArchive;
            $res = $zip->open($file_path);

            if ($res === TRUE) {
                for($i = 0; $i < $zip->numFiles; $i++) {
                    $ExtractFileName = $zip->getNameIndex($i);
                    $fileHtml= $fileHtml."<div class='row edit_emailattachment_remove_after'><div class='col-xs-6'>".$ExtractFileName." </div><div class='col-xs-6'><span class='material-icons-outlined unlinkFile' data-id='".$id."' data-name='".$ExtractFileName."'  aria-hidden='true' onclick='unLinkfile(this);' style='cursor: pointer;' >close</span></div></div>";
                }
                $zip->close();
            } 
		}
	}
}
$output ='
        <input type="hidden" name="er_id" id="er_id" value="'.$id.'">
        <input type="hidden" id="existing_file_name" name="existing_file_name" value="'.$file_name[0].'">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                <div class="">
                    <input type="text" onkeyup="validateMultipleEmailsCommaSeparatedEdit(this)" id="to1" name="to1" class="form-control" placeholder="To: Email id 1, Email id 2, Email id 3..." required value="'.$email_to.'"/>
                    <span id="emailerror121" class="text-danger_error text-danger" style="display: none;font-size:12px;">Please enter a valid e-mail id.</span>
                    <span id="emailToMaxFiveEdit" class="text-danger_error text-danger" style="display: none;font-size:12px;">You can enter a maximum of 5 E-mail ids</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="text" onkeyup="validateMultipleEmailsCcCommaSeparatedEdit(this)" id="cc1" name="cc1" placeholder="Cc: Email id 1, Email id 2, Email id 3..." class="form-control" value="'.$email_cc.'"/>
                    <span id="emailccerror1211" class="text-danger_error text-danger" style="display: none;font-size:12px;">Please enter a valid e-mail id.</span>
                    <span id="emailCcMaxFiveEdit" class="text-danger_error text-danger" style="display: none;font-size:12px;">You can enter a maximum of 5 E-mail ids</span>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                <div class="">
                    <input type="text" id="subject1" name="subject1" placeholder="Subject" class="form-control" value="'.$subject.'"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                <div class="">
                    <textarea class="ckeditor" cols="0" id="editor201" name="editor201" rows="0">'.$email_body.'</textarea>
                    <script>
                        CKEDITOR.replace("editor201");
                    </script>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12 col-sm-2 col-md-2">
                <label>Send Email:</label>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <input type="radio" name="edit_emailReminder_send_email" value="edit_emailReminder_immediately" class="edit_emailReminder_hideDateTime"> Immediately &nbsp;&nbsp;
                <input type="radio" name="edit_emailReminder_send_email" value="edit_emailReminder_sms_date" class="edit_emailReminder_showDateTime"> Schedule At
            </div>
            <div class="mrb-10 hidden" id="edit_email_reminderDateTime">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <div class="input-group">
                                <input class="form-control" required date-format="dd/mm/yyyy" id="date15" name="date15" placeholder="Select Date" type="text" onclick="editgetDateEvent(this)" onkeydown="return false" onchange="checkDate1()" value="'.$sendEmailDate.'" />
                                <label class="btn-default_gray input-group-addon" for="date15"><i class="material-icons-outlined" style="font-size: 16px !important;position: relative;">date_range</i></label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <div class="clockpicker1 input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" required name="time15" id="time15" placeholder="Select Time" class="form-control edit_clockpicker_position" onkeydown="return false" onchange="checkTime1()" onfocus="editgetEvent(this)" value="'.$er_sendEmailTime.'"/>
                                    <span class="btn-default_gray input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            </div>
                                <span id="time_error121" class="text-danger_error" style="display: none;">Reminder can not be set for a past time</span>
                                        <script type="text/javascript">
                                            $(".clockpicker1").clockpicker({
                                                placement : "top",
                                            }
                                            );
                                        </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <div class="clip-upload edit-upload">
                            <label for="file-input1">
                                <span class="btn btn-default_gray btn-icon"><i class="fa fa-paperclip fa-lg" style="font-size:21px; cursor: pointer;" aria-hidden="true"></i></span>
                            </label>

                            <input type="file" class="file-input1 hide" multiple name="attachment1[]" id="file-input1" />
                            <div class="filename-container hide"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-10">
                        <input type="text" id="fileName1" name="" style="border:none" />
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="col-xs-6 col-sm-6 col-md-6 pl0 pr0">
                <div class="mrt-10 file_name_exists">'.$fileHtml.'</div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-6 col-sm-6 col-md-6 pl0 pr0">
                    <div class="mrt-10 file_name_append1"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bg bg-danger" style="padding: 10px;margin-bottom:10px;margin-top: 10px;">
                    <span><b>Note : </b></span> <p style="white-space: pre-line;display: inline;">Supported File Formats – &lt; jpeg/jpg, png, docx/doc, xlsx/xls, zip, rar, pdf, txt, csv &gt;.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <button type="submit" id="updateEmailReminder" value="Save" class="btn btn-primary pull-right" >Update</button>
                </div>
            </div>
        </div>

     <script>

        function unLinkfile(elem){

        var er_id       = $(elem).data("id");
        var er_fileName = $(elem).data("name");
        $(elem).parent().parent().remove();


        $.ajax({
            type        : "GET",
            url         : "../../client/res/templates/email_reminder/unlink_file.php",
            data        :  {"er_id":er_id,"er_fileName":er_fileName},
            dataType    : "json",
           
            success: function(data)
            {
              
                    if(data.status == "true"){
                        $.alert({
                            title: "Success!",
                            content: data.msg,
                            type: "dark",
                            typeAnimated: true,
                        });

                        // alert(data.new_file_name);
                        //$("#existing_file_name").val(data.new_file_name);

                    }else{
                        $.alert({
                            title: "Alert!",
                            content: data.msg,
                            type: "dark",
                            typeAnimated: true,
                        });
                    } 
            }
        });
        }

        $("input#to1, input#cc1").on({
            keydown: function(e) {
              if (e.which === 32)
                return false;
            },
            change: function() {
              this.value = this.value.replace(/\s/g, "");
            }
          });
        </script>';

if( !empty($result) ){

	$data["error"] 	= "false";
	$data["status"] = "true";
	$data["msg"] 	= "Record found!";
	$data["data"] 	= $output;

	if( !$json ){
		return $result;
	}
	echo json_encode($data);return;
}

echo json_encode($data);return;
die;
?>