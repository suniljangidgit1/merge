<?php
// get super admin connection 
$filePath      = '/var/www/html/crm.fincrm.net/crm/data/config.php';

include($filePath);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `integration_lead`";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
  	$user_id 			= 	$row['id'];
    $first_name 		= 	$row['first_name'];
    $last_name 			= 	$row['last_name'];
    $email 				= 	$row['email'];
    $phone 				= 	$row['phone'];
    $subject 			= 	$row['subject'];
    $source 			= 	$row['source'];
    $lead_from 			= 	$row['lead_from'];
    $address_city 		= 	$row['address_city'];
    $address_state 		= 	$row['address_state'];
    $address_country 	= 	$row['address_country'];
    $description 		= 	$row['description'];
    $created_at 		= 	$row['created_at'];
    $created_by_id 		= 	$row['created_by_id'];
    $assigned_user_id 	= 	$row['assigned_user_id'];
    $id             	= getToken(17);

    // fetch subdomain connection details
    $sql                =   "SELECT hr.host_name, hr.db_name, hr.password, hr.user_name FROM integrations_users iu INNER JOIN host_record hr on iu.subdomain_url = hr.domain_url WHERE iu.user_email = '$lead_from'";

    $domain_details     =   getRow($sql);
    $host_name			=	$domain_details['host_name'];
    $db_name			=	$domain_details['db_name'];
    $pass				=	$domain_details['password'];
    $user_name			=	$domain_details['user_name'];

    // Create subdomain connection
	$subdomain_conn = mysqli_connect($host_name, $user_name, $pass, $db_name);

	// Check subdomain connection
	if (!$subdomain_conn) {
	  die("Subdomain Connection failed: " . mysqli_connect_error());
	}

	//add phone number 
	if(!empty($phone)) {

      $phone_number_id = getToken(17);

      $sql = "INSERT INTO `entity_phone_number`(`entity_id`, `phone_number_id`, `entity_type`, `primary`, `deleted`) VALUES ('$id','$phone_number_id','Lead','1','0')";

      mysqli_query($subdomain_conn, $sql);

      $sql = "INSERT INTO `phone_number`(`id`, `name`, `deleted`, `type`, `numeric`, `invalid`, `opt_out`) VALUES ('$phone_number_id','$phone','0','Mobile','$phone','0','0')";

      mysqli_query($subdomain_conn, $sql);
	}

	// add email id
	if(!empty($email)){
      $email_id = getToken(17);

      $sql = "INSERT INTO `entity_email_address`( `entity_id`, `email_address_id`, `entity_type`, `primary`, `deleted`) VALUES ('$id','$email_id','Lead','1','0')";

      mysqli_query($subdomain_conn, $sql);

      $sql = "INSERT INTO `email_address`(`id`, `name`, `deleted`, `lower`, `invalid`, `opt_out`) VALUES ('$email_id','$email','0','$email','0','0')";

      mysqli_query($subdomain_conn, $sql);
	}

	//transfer lead from common database to subdomain database.
	$sql = "INSERT INTO `lead`(`id`, `deleted`, `first_name`, `last_name`, `subject`, `source`, `lead_from`, `address_city`, `address_state`, `address_country`, `description`, `created_at`, `created_by_id`, `assigned_user_id`) VALUES ('$id', '0', '$first_name', '$last_name', '$subject', '$source', '$lead_from', '$address_city', '$address_state', '$address_country', '$description', '$created_at', '$created_by_id', '$assigned_user_id')";

	$subdomain_result = mysqli_query($subdomain_conn, $sql);

	  if (!$subdomain_result) {
	      echo "Error for lead transfer: " . $sql . "<br>" . mysqli_error($conn);
	  } else {
	      echo "lead transfer successfully".'<br>';
	  }
	  mysqli_close($subdomain_conn);

	  //delete lead from common database
	  $sql = "DELETE FROM integration_lead WHERE id='".$user_id."'";
      mysqli_query($conn,$sql);
    
  }
} else {
  echo "no any lead available for transfer";
  exit();
}

function getRow($sql){
	GLOBAL $conn;
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0) {
	  $row = mysqli_fetch_array($result);
	  return $row;
	} else {
	  echo "subdomain connection doesn't exists.";
	  exit();
	}
}

//get token id
function getToken($length) {
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

function crypto_rand_secure($min, $max) {
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