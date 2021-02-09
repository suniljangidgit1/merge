<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$google_key = $_GET['google_key'];

$sql = "SELECT  google_fields_name, google_fields_value,google_key FROM google_webhook_response WHERE google_key = '$google_key'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
  	$google_fields_name 	= $row['google_fields_name'];
  	$google_key				= $row['google_key'];
  	
  }
} else {
	$data["error"]  = "true";
    $data["status"] = "false";
	$data['data'] = '<b>Please add callback URL & google key in your google ads manager and refresh field if there are any changes.</b><br><br>';
	echo json_encode($data);return;
}

if($google_fields_name)
{
	$google_fields_name_array = explode(',', $google_fields_name);
}

$output = '';
$length = count($google_fields_name_array);

for($i=0;$i<$length;$i++)
{
	$output  .= '<div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="Title">'.ucwords(str_replace('_', ' ', $google_fields_name_array[$i])).' <span class="text-danger">*</span></label> <br />
                        <select name="'.$google_fields_name_array[$i].'" class="form-control">
							';

							$sql = "SELECT * FROM lead";
							$except_fields = array('id','deleted','status','created_at','modified_at','created_by_id','modified_by_id','assigned_user_id','campaign_id','created_account_id','created_contact_id','created_opportunity_id','data_type','latest_rating_date','lead_type','lead_from','subject','date','');
							$result = mysqli_query($conn, $sql);
							if ($result) {
								$output .= '<option value="email">Email</option>';
								$output .= '<option value="phone">Phone</option>';

							  while ($fieldinfo = mysqli_fetch_field($result)) {
							  	if(!in_array($fieldinfo->name, 
							  		$except_fields))
							  	{
							  		$output .= '<option value="'.$fieldinfo->name.'">'.ucwords(str_replace('_', ' ', $fieldinfo->name)).'</option>';

								}
							  }
							}
							else
							{
								echo "result not found";
							}
							$output .='</select></div></div>';
}

$output .= '<input type="hidden" name="google_key" value="'.$google_key.'">';
$output .= '<input type="hidden" name="google_fields_name" value="'.$google_fields_name.'">';

$data["error"]      = "false";
$data["status"]     = "true";
$data['data'] = $output;
echo json_encode($data);return;
?>