<?php session_start();

//set timezone
date_default_timezone_set('UTC'); 

$userName       =   $_SESSION['Login'];

//INCLUDE CUSTOM FUNCTION
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/customFunctions.php');

//DATABASE OPERATIONS
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/databaseOperations.php');

$id	    =	isset($_GET['id']) ? $_GET['id'] : NULL;
$json   =   true;

// get user details
$sql        =  "SELECT id FROM user WHERE user_name = '$userName'";
$row        =  $databaseOperations->getRecordArray($sql);
$userId     =  $row['id'];

$sql        =   "SELECT send_email_time,email_to, email_cc, subject, email_body, send_email_date,email_status,name, send_email_date_time, file_name FROM sent_email_reminder WHERE deleted='0'	AND id='".$id."'";

$row                =   $databaseOperations->getRecordArray($sql);

$email_name 		= 	$row['name'];
$email_to 			= 	$row['email_to'];
$email_cc 			= 	$row['email_cc'];
$send_email_date 	= 	$row['send_email_date']; 
$send_email_date    =   date("d-m-Y", strtotime($send_email_date));
$send_email_time    =   $row['send_email_time'];
$email_body 		= 	$row['email_body'];
$subject 			= 	$row['subject'];
$email_status 		=	$row['email_status'];
$scheduledAt        =   $row['send_email_date_time'];
$file_name          =   $row['file_name'];


$output = '';

$deleteDir      =   $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/zipFolder/";

//delete existing files
if( is_dir($deleteDir) ) {
    deleteDir($deleteDir);
}

$extractPath =  $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/uploads/";
if( is_dir($extractPath) ) {
    deleteDir($extractPath);
}

// get zip files name
if( !empty($file_name) ) {

    if( !is_dir($deleteDir) ) {
        mkdir($deleteDir);
    }

    // transfer file from s3 buckets to local
	include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
	// Where the files will be source from
	$source = 'Production/'.$_SERVER['SERVER_NAME'].'/email_reminder_files/'.$userName.'/'.$id.'/'.$file_name;

	// Where the files will be transferred to
	$dest = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/reminder/zipFolder/'.$file_name;

	// Create a transfer object
	// $manager = new \Aws\S3\Transfer($s3, $source, $dest);

	// //Perform the transfer synchronously
	// $manager->transfer();

	$result = $client->getObject(array(
	'Bucket' => 'fincrm',
	'Key' => $source,
	'SaveAs' => $dest,
	));


    $file_path = '../reminder/zipFolder/'.$file_name;

    $ExtractFileName = '';
    $zip = new ZipArchive;
    $res = $zip->open($file_path);
    $count = 1;
    if ($res === TRUE) {

        $zip->extractTo($extractPath);

        $fileHtml = "<label>Attachments:</label>";
        for($i = 0; $i < $zip->numFiles; $i++) {
            
            $ExtractFileName = $zip->getNameIndex($i);

            $downloadFilePath = "../../client/res/templates/reminder/uploads/".$ExtractFileName;
            
            $fileHtml = $fileHtml."<p><a href = '$downloadFilePath' style = 'text-decoration: none;' download>".$count.". ".$ExtractFileName."</a></p>";

            $count++;

        }
        $zip->close();
    } 
}

if(!empty($scheduledAt)) {
    $output .='
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 form-group">
            <div class="input-group">
                <!-- <label>Date:</label> -->
                <input class="form-control" required date-format="dd/mm/yyyy" id="date100" name="date100" placeholder="Select Date" type="text" value="'.date('d/m/Y', strtotime($send_email_date)).'" readonly/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 form-group">
            <!-- <label>Email:</label> -->
            <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                <input type="text" required name="time100" id="time100" placeholder="Select Time" class="form-control" value="'.$send_email_time.'" readonly/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
            </div>
            <script type="text/javascript">
                $(".clockpicker").clockpicker();
            </script>
        </div>
    </div>';

}

$output  .= '
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <input type="text" id="to" name="to" class="form-control" placeholder="To: Email id 1, Email id 2, Email id 3..." value="'.$email_to.'" readonly/>
            <span id="emailerror" class="text-danger_error" style="display: none;">Please enter valid Email</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <input type="text" id="cc" name="cc" placeholder="CC: Email id 1, Email id 2, Email id 3..." class="form-control" value="'.$email_cc.'" readonly/>
            <span id="emailccerror" class="text-danger_error" style="display: none;">Please enter valid Email</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <input type="text" name="subject" placeholder="Subject" class="form-control" value="'.$subject.'" readonly/>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <textarea class="ckeditor" cols="0" id="editor1000" name="editor100" rows="0" readonly>'.$email_body.' </textarea>
            <script>
                CKEDITOR.replace("editor1000");
            </script>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="mrt-10 file_name_exists">'.$fileHtml.'
    </div>

    <div class="mrt-10 file_name_append1"></div>

    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="row mrt-10">
            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="clip-upload">
                    <label for="file-input">

                    </label>

                    <div class="filename-container "></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10">
                <input type="hidden" id="fileName" name="" style="border:none" />
            </div>
        </div>
    </div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="mrt-10 file_name_append">
        <!-- dynamic name append. -->
    </div>
</div>
';

$data['data'] = $output;
	
echo json_encode($data);return;
?>
