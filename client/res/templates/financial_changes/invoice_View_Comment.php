<?php
session_start();
$user_name = $_SESSION['Login'];
// echo $user_name;
error_reporting(~E_ALL);
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id=$_GET['dataId'];

$sql1="select * from invoice_comments where invoice_id='$id'";
	$result1=mysqli_query($conn,$sql1);
	$attachment_arr=array();
	while($row1=mysqli_fetch_assoc($result1))
	{	
		$date1=$row1['date'];
		$date=date("d/M/Y h:i:s",strtotime($date1));
		$orderdate = explode('/', $date);
		$month = $orderdate[0];
		$day   = $orderdate[1];
		// $orderdate1 = explode(' ', $day );
		// $day1=$orderdate1[0];

		$date=$month . ' ' .$day ;
		// echo $date;
		$attachment_arr[] = array("comment" => $row1['comment'], "date" => $date, "user_name" => $row1['posted_by'],"filenames" => $row1['comment_attachment']);
		
	}
// print_r($attachment_arr);die;

$output="";

$output .= '
<form name="invoice_comment_form" id="invoice_comment_form" class="invoice_comment_form" method="post" autocomplete="off">
	<div class="panel panel-default feedback">
		<div class="panel-heading">
			<h4>Feedback</h4>
		</div>
		<div class="panel-body">
			<div class="row button_section">
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control messanger-text-field" placeholder="Type your reply here..." name="feedback" id="feedback" autocomplete="off" required >
						<input type="hidden" class="form-control" name="invoice_id" id="invoice_id" value="'.$id.'" >
					</div>
				</div>
			</div>
			<div class="row button_section button_section_post">
				<div class="col-xs-4 col-md-1 clearfix" style="width:65px !important;">
				<button type="submit" id="invoice_user_feedback" value="" name="post" class="btn post_btn ">POST</button>
			</div>

			<div class="form-group reviewer_attach_section ">
				<div class="custom-file-upload ">
					<div class="invoice-feedback-custom-file-upload">
						<input type="file" name="feedback_attachment[]" id="invoice_feedback_attachment" class="form-control invoice_feedback_attachment" value="" onchange="invoicegetFileInfo()" multiple >
						<input type="hidden" name="current_feedback[]" id="current_feedback" class="form-control current_feedback" value="" multiple >
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-md-6">
					<ul class="invoice_review_file list-unstyled clearfix"></ul>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div>
				<div class="invoice_comments">
					<div class="list-container"><div class="list list-expanded"><ul class="list-group invoice_feedback_existing_append"></ul></div></div>
				</div>
			</div>
		</div>
	</div>	
</form>';                   

$arr = array("popup_form" => $output, "list_arr" => $attachment_arr);
	echo json_encode($arr);


?>






