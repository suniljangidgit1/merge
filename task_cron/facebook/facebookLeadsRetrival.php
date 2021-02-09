<?php
date_default_timezone_set('UTC');

if(!defined('STDIN'))  define('STDIN',  fopen('php://stdin',  'rb'));
if(!defined('STDOUT')) define('STDOUT', fopen('php://stdout', 'wb'));
if(!defined('STDERR')) define('STDERR', fopen('php://stderr', 'wb'));

//require __DIR__ . '\vendor\autoload.php';
require '/var/www/html/crm.fincrm.net/crm/task_cron/vendor/autoload.php';

use FacebookAds\Object\Lead;
use FacebookAds\Api;	
use FacebookAds\Logger\CurlLogger;

$filePath      = '/var/www/html/crm.fincrm.net/crm/data/config.php';
//$filePath      	= 	$_SERVER['DOCUMENT_ROOT'].'/data/config.php';
include($filePath);

//GET CONSTANTS
$cPath = '/var/www/html/crm.fincrm.net/crm/client/res/templates/lead_api/facebook/constants.php';
// $cPath = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/lead_api/facebook/constants.php';
include($cPath);

// CREATE COMMON DATABASE CONNECTIONS
$commonDbConn 	= 	mysqli_connect($servername, $username, $password, $dbname);

// CHECK CONNECTION
if (!$commonDbConn) {
  die("Common Database Connection failed: " . mysqli_connect_error());
}

$commonDbSql = "SELECT hr.host_name,hr.db_name,hr.password, hr.user_name, fw.leadgen_id, fw.page_id, fw.form_id FROM facebook_ads_users fu INNER JOIN facebook_ads_webhook fw ON fu.form_id = fw.form_id INNER JOIN host_record hr ON fu.domain_name = hr.domain_url";

$commonDbResult 	= 	mysqli_query($commonDbConn,$commonDbSql);
$commonDbNumRows 	=	mysqli_num_rows($commonDbResult);

if($commonDbNumRows>0){

	while($commonDbRows = mysqli_fetch_assoc($commonDbResult)) {

		$hostName 			= 	$commonDbRows['host_name'];
		$userName 			= 	$commonDbRows['user_name'];
		$password 			= 	$commonDbRows['password'];
		$databaseName 		= 	$commonDbRows['db_name'];
		$leadgenId 			= 	$commonDbRows['leadgen_id'];
		$pageId 			= 	$commonDbRows['page_id'];
		$formId 			= 	$commonDbRows['form_id'];
		$whId 				= 	$commonDbRows['form_id'];

		// CREATE SUB DOMAIN DATABASE CONNECTION
		$conn = mysqli_connect($hostName, $userName, $password, $databaseName);

		// CHECK CONNECTION
		if (!$conn) {
		  die("Sub-domain Database Connection failed: " . mysqli_connect_error());
		}

		$leadSql  = "SELECT fm.created_by_id, fm.fb_leads_structure, fm.crm_leads_structure , up.page_access_token FROM facebook_ads_user_pages up INNER JOIN fb_form_fields_mapping fm ON up.page_id = fm.page_id WHERE fm.page_id = '$pageId' AND fm.form_id = '$formId'";

		$leadResult 	= mysqli_query($conn,$leadSql);
		$leadResultRows = mysqli_num_rows($leadResult);
		if ( $leadResultRows > 0 ) {

		    while( $leadRow = mysqli_fetch_assoc($leadResult) ) {

		        $fb_leads_structure 	= 	explode(',', $leadRow['fb_leads_structure']);
		        $crm_leads_structure 	= 	explode(',', $leadRow['crm_leads_structure']);
		        $page_access_token 		= 	$leadRow['page_access_token'];
		        $createdBy              =   $leadRow['created_by_id'];

		        $app_id 		= APPID;
				$app_secret 	= CLIENTSECRET;

				$api 		= 	Api::init($app_id, $app_secret, $page_access_token);
				$api->setLogger(new CurlLogger());

				$fields 	= 	array();
				$params 	= 	array();
			
				$leads_data = json_encode((new Lead($leadgenId))->getSelf(
				  $fields,
				  $params
				)->exportAllData(), JSON_PRETTY_PRINT);

				$data 		= 	json_decode($leads_data);
				$length 	= 	count($data->field_data);

				for( $i = 0; $i < $length; $i++ ) {
					$fields_array[$data->field_data[$i]->name] = $data->field_data[$i]->values[0];
				}

				foreach( $fb_leads_structure  as  $fb_rows ) {
					$fb_rows 		= isset($fields_array[$fb_rows]) ? $fields_array[$fb_rows]:'';
					$leads_values[] = $fb_rows;
				}

				$id  			=  getToken(20);
				$DateTime       =   new DateTime();
                $createdAt      =   $DateTime->format('Y-m-d H:i:s');

				//INSERT PHONE
				if(in_array('phone', $crm_leads_structure)){
					$phonePosition = array_search('phone', $crm_leads_structure);
					$phone = $leads_values[$phonePosition];

					if(!empty($phone)) {
						$phone_number_id = getToken(17);

				      	$sql = "INSERT INTO `entity_phone_number`(`entity_id`, `phone_number_id`, `entity_type`, `primary`, `deleted`) VALUES ('$id','$phone_number_id','Lead','1','0')";

				      	mysqli_query($subdomain_conn, $sql);

				      	$sql = "INSERT INTO `phone_number`(`id`, `name`, `deleted`, `type`, `numeric`, `invalid`, `opt_out`) VALUES ('$phone_number_id','$phone','0','Mobile','$phone','0','0')";

				      	mysqli_query($subdomain_conn, $sql);
					}

					unset($crm_leads_structure[$phonePosition]);
					unset($leads_values[$phonePosition]);	
				}

				//INSERT EMAIL
				if(in_array('email', $crm_leads_structure)){
					$emailPosition = array_search('email', $crm_leads_structure);
					$email = $leads_values[$emailPosition];

					if(!empty($email)) {
						$email_id = getToken(17);

				      	$sql = "INSERT INTO `entity_email_address`( `entity_id`, `email_address_id`, `entity_type`, `primary`, `deleted`) VALUES ('$id','$email_id','Lead','1','0')";

				      	mysqli_query($conn, $sql);

				      	$sql = "INSERT INTO `email_address`(`id`, `name`, `deleted`, `lower`, `invalid`, `opt_out`) VALUES ('$email_id','$email','0','$email','0','0')";

				      	mysqli_query($conn, $sql);
					}

					unset($crm_leads_structure[$emailPosition]);
					unset($leads_values[$emailPosition]);	
				}

				$fields_name 	= 	'`id`, `deleted`,'.implode(",", $crm_leads_structure).','.'source, `created_at`, `created_by_id`, `assigned_user_id`';
				$leads_values 	= 	"'$id','0','".implode("','", $leads_values)."','facebook.com','$createdAt','$createdBy','$createdBy'";

				$sql 			= 	"INSERT INTO lead($fields_name) VALUES ($leads_values)";
				$result 		= 	mysqli_query($conn, $sql);

				if( $result ) {
					echo "data fatch succeffully";
					$whSql = "DELETE FROM `facebook_ads_webhook` WHERE id = '$whId'";
					mysqli_query($commonDbConn, $whSql);
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		    }
		}
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