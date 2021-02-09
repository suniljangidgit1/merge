<?php 

//get connection
include('/var/www/html/crm.fincrm.net/crm/task_cron/subdomain_connection.php');

// $input = '{"lead_id":"MTE5ODQ5NTExMzI3OmxlYWRfaWQ6MTU4ODk0MDYyMDE4NA","user_column_data":[{"column_name":"Full Name","string_value":"1Rajesh Polshetwar","column_id":"FULL_NAME"},{"column_name":"User Phone","string_value":"1767023021","column_id":"PHONE_NUMBER"},{"column_name":"User Email","string_value":"1rajesh@gmail.com","column_id":"EMAIL"}],"api_version":"1.0","form_id":119849511327,"campaign_id":10035259086,"google_key":"FinCRM@1162170202011210","is_test":true,"gcl_id":"123abc456def","adgroup_id":20000000000,"creative_id":30000000000}';
$input = file_get_contents('php://input');
$input_array = json_decode($input);

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

// print_r($google_fields_value1);

$sql = "SELECT crm_leads_structure, created_by_id, assigned_by_id FROM google_form_fields_mapping WHERE google_key = '$google_key'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) {

		$crm_leads_structure = explode(',', $row["crm_leads_structure"]);
		$crm_leads_structure_count = count($crm_leads_structure);

		$id = getToken(17);
		for($i=0;$i<$crm_leads_structure_count;$i++)
		{
			if($crm_leads_structure[$i] == 'phone')
			{
				$phone_number_id = getToken(17);
				$sender_phone = $google_fields_value1[$i];

                  $sql = "INSERT INTO `entity_phone_number`(`entity_id`, `phone_number_id`, `entity_type`, `primary`, `deleted`) VALUES ('$id','$phone_number_id','Lead','1','0')";

                  mysqli_query($conn, $sql);

                  $sql = "INSERT INTO `phone_number`(`id`, `name`, `deleted`, `type`, `numeric`, `invalid`, `opt_out`) VALUES ('$phone_number_id','$sender_phone','0','Mobile','$sender_phone','0','0')";

                  mysqli_query($conn, $sql);
			}
			else if($crm_leads_structure[$i] == 'email')
			{
				// add email id
                  $email_id = getToken(17);
                  $sender_email = $google_fields_value1[$i];

                  $sql = "INSERT INTO `entity_email_address`( `entity_id`, `email_address_id`, `entity_type`, `primary`, `deleted`) VALUES ('$id','$email_id','Lead','1','0')";

                  mysqli_query($conn, $sql);

                  $sql = "INSERT INTO `email_address`(`id`, `name`, `deleted`, `lower`, `invalid`, `opt_out`) VALUES ('$email_id','$sender_email','0','$sender_email','0','0')";

                  mysqli_query($conn, $sql);
			}
			else
			{
				$fields_name[] = $crm_leads_structure[$i];
				$fields_value[] = "'".$google_fields_value1[$i]."'";
			}

		}

		// $fields_name = $row["crm_leads_structure"].','.'google_key';
		// $leads_values = "'".implode("','", $google_fields_value1)."',"."'".$google_key."'";
		$DateTime       = new DateTime();
        $createdAt      = $DateTime->format('Y-m-d H:i:s');
		$fields_name[] = 'created_at';
		$fields_value[] = "'".$createdAt."'";

		$fields_name[] = 'created_by_id';
		$fields_value[] = "'".$row['created_by_id']."'";

		$fields_name[] = 'assigned_user_id';
		$fields_value[] = "'".$row['assigned_by_id']."'";

		$fields_name[] = '`source`';
		$fields_value[] = "'google.com'";

		$fields_name[] = 'id';
		$fields_value[] = "'".$id."'";

		$fields_name 	= implode(',', $fields_name);
		$fields_value 	= implode(',', $fields_value);

		$sql = "INSERT INTO lead ($fields_name) VALUES ($fields_value)";

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
	$sql = "INSERT INTO google_webhook_response(google_key, campaign_id, form_id, lead_id, google_fields_name, google_fields_value) VALUES ('$google_key','$campaign_id','$form_id','$lead_id','$google_fields_name','$google_fields_value')";

	$result = mysqli_query($conn, $sql);

	if ($result){
		echo "user campaign data stored successfully".'<br>';
	}else {
	    echo "data already inserted, please configure field mapping for your lead";
	}
}

// connection closing
mysqli_close($conn);

//get token id
function getToken($length)
{
  $token = "";
  $codeAlphabet = "abcdefghijklmnopqrstuvwxyz1234567890";
  $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
  $codeAlphabet.= "0123456789";
  $max = strlen($codeAlphabet); // edited
  for ($i=0; $i < $length; $i++) {
    $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
  }
  return $token;
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}
?>