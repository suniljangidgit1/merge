<?php 
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$input = '{"lead_id":"MTE5ODQ5NTExMzI3OmxlYWRfaWQ6MTU4ODk0MDYyMDE4NA","user_column_data":[{"column_name":"Full Name","string_value":"FirstName LastName","column_id":"FULL_NAME"},{"column_name":"User Phone","string_value":"+16505550123","column_id":"PHONE_NUMBER"}],"api_version":"1.0","form_id":119849511327,"campaign_id":10035259086,"google_key":"test@111","is_test":true,"gcl_id":"123abc456def","adgroup_id":20000000000,"creative_id":30000000000}';
//$input = file_get_contents('php://input');

$input_array = json_decode($input);

// echo "<pre>";
// print_r($input_array);
// exit();

$lead_id		=	$input_array->lead_id;

$form_id		=	$input_array->form_id;
$campaign_id	=	$input_array->campaign_id;
$google_key		=	$input_array->google_key;

foreach ($input_array->user_column_data as $value) {
	$google_fields_name[] = str_replace(' ', '_', $value->column_name);
	$google_fields_value1[] = $value->string_value;
}

$google_fields_name 	= implode(',', $google_fields_name);
$google_fields_value	= implode(',', $google_fields_value1);

$sql = "SELECT  ud.id, ud.db_host, ud.db_user_name, ud.db_password, ud.db_name  FROM google_user_details gud INNER JOIN user_details ud ON gud.user_id = ud.id  WHERE gud.google_key = '$google_key' AND ud.delete_status = '0'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) {

		// $localhost = $row["db_host"];
		// $db_user_name = $row["db_user_name"];
		// $db_password = $row["db_password"];
		// $db_name = $row["db_name"];
		// $conn = mysqli_connect($localhost,$db_user_name,$db_password,$db_name);

		// if (mysqli_connect_errno()) {
		//   echo "Failed to connect to MySQL1: " . mysqli_connect_error();
		//   exit();
		// }

		$sql = "SELECT crm_leads_structure FROM form_fields_mapping WHERE google_key = '$google_key'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) 
		{
			while($row = mysqli_fetch_assoc($result)) {
				$fields_name = $row["crm_leads_structure"].','.'google_key';
				$leads_values = "'".implode("','", $google_fields_value1)."',"."'".$google_key."'";

				$sql = "INSERT INTO crm_leads_data($fields_name) VALUES ($leads_values)";

				$result = mysqli_query($conn, $sql);

				if ($result){
					echo "lead inserted successfully";
				}else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
		else
		{
			$sql = "INSERT INTO user_campaign_data(google_key, campaign_id, form_id, lead_id, google_fields_name, google_fields_value) VALUES ('$google_key','$campaign_id','$form_id','$lead_id','$google_fields_name','$google_fields_value')";

			$result = mysqli_query($conn, $sql);

			if ($result){
				echo "user campaign data stored successfully".'<br>';
			}else {
			    echo "data already inserted, please configure field mapping for your lead";
			}
		}
	}
}
else
{
	echo 'user not exit'. $sql . "<br>" . mysqli_error($conn);
}

// connection closing
mysqli_close($conn);

?>