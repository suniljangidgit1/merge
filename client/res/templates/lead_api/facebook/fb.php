<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

if(!defined('STDIN'))  define('STDIN',  fopen('php://stdin',  'rb'));
if(!defined('STDOUT')) define('STDOUT', fopen('php://stdout', 'wb'));
if(!defined('STDERR')) define('STDERR', fopen('php://stderr', 'wb'));

require __DIR__ . '\vendor\autoload.php';

use FacebookAds\Object\Lead;
use FacebookAds\Api;	
use FacebookAds\Logger\CurlLogger;

$access_token = 'EAADezwEINIQBAD8gmvAXZCC7GC9A6eRe1E9ucFSDipz7M94cG8MOYSeF3iZBBEpGOyn7qhX0yYhLNKOYFcJqdTt2jJZCP3M6FyztLZCOVyFtLyAPrJuIGVeMvQGPiGZBg2VKuJ8sOPEq00WecUHhctYmHwnwhi5QfesjhtgIGDExBfOyDF8HZC2rHycymIuH2iJmDY9vwMKwZDZD';
$app_secret = 'a9c8015e91b3f4460294b94f4662c652';
$app_id = '244980656911492';
$id = '1150544575302366';

$api = Api::init($app_id, $app_secret, $access_token);
$api->setLogger(new CurlLogger());

$fields = array(
);
$params = array(
);
$leads_data = json_encode((new Lead($id))->getSelf(
  $fields,
  $params
)->exportAllData(), JSON_PRETTY_PRINT);

$data = json_decode($leads_data);
print_r($data);
echo "<br>";
$all_data = '';
$length = count($data->field_data);

for($i=0;$i<$length;$i++)
{
	$fields_array[$data->field_data[$i]->name] = $data->field_data[$i]->values[0];
}

$leadgen_id				= $data->id;
$full_name 				= isset($fields_array['full_name']) ? $fields_array['full_name']:'';
$email 					= isset($fields_array['email']) ? $fields_array['email']:'';
$phone_number 			= isset($fields_array['phone_number']) ? $fields_array['phone_number']:'';
$city 					= isset($fields_array['city']) ? $fields_array['city']:'';
$state 					= isset($fields_array['state']) ? $fields_array['state']:'';
$country 				= isset($fields_array['country']) ? $fields_array['country']:'';
$zip_code 				= isset($fields_array['zip_code']) ? $fields_array['zip_code']:'';

$first_name 			= isset($fields_array['first_name']) ? $fields_array['first_name']:'';
$last_name 				= isset($fields_array['last_name']) ? $fields_array['last_name']:'';
$date_of_birth 			= isset($fields_array['date_of_birth']) ? $fields_array['date_of_birth']:'';
$gender 				= isset($fields_array['gender']) ? $fields_array['gender']:'';
$marital_status 		= isset($fields_array['marital_status']) ? $fields_array['marital_status']:'';
$military_status		= isset($fields_array['military_status']) ? $fields_array['military_status']:'';
$job_title 				= isset($fields_array['job_title']) ? $fields_array['job_title']:'';
$relationship_status   	= isset($fields_array['relationship_status']) ? $fields_array['relationship_status']:'';
$work_phone_number   	= isset($fields_array['work_phone_number']) ? $fields_array['work_phone_number']:'';
$work_email   	= isset($fields_array['work_email']) ? $fields_array['work_email']:'';
$company_name   	= isset($fields_array['company_name']) ? $fields_array['company_name']:'';
$cpf_brazil  	= isset($fields_array['cpf_(brazil)']) ? $fields_array['cpf_(brazil)']:'';
$dni_argentina  	= isset($fields_array['dni(argentina)']) ? $fields_array['dni(argentina)']:'';
$dni_peru  	= isset($fields_array['dni_(peru)']) ? $fields_array['dni_(peru)']:'';
$rut_chile  	= isset($fields_array['rut_(chile)']) ? $fields_array['rut_(chile)']:'';
$cc_colombia  	= isset($fields_array['cc_(colombia)']) ? $fields_array['cc_(colombia)']:'';
$ci_ecuador  	= isset($fields_array['ci_(ecuador)']) ? $fields_array['ci_(ecuador)']:'';

// $insData = array(
//     'full_name' 			=> $full_name,
//     'email' 				=> $email,
//     'phone_number' 			=> $phone_number,
//     'city' 					=> $city,
//     'state' 				=> $state,
//     'country' 				=> $country,
//     'zip_code' 				=> $zip_code,
//     'first_name' 			=> $first_name,
//     'last_name' 			=> $last_name,
//     'date_of_birth' 		=> $date_of_birth,
//     'gender' 				=> $gender,
//     'marital_status' 		=> $marital_status,
//     'military_status' 		=> $military_status,
//     'job_title' 			=> $job_title,
//     'relationship_status' 	=> $relationship_status,
//     'work_phone_number' 	=> $work_phone_number,
//     'work_email' 			=> $work_email,
//     'company_name' 			=> $company_name,
//     'cpf_brazil' 			=> $cpf_brazil,
//     'dni_argentina' 		=> $dni_argentina,
//     'dni_peru' 				=> $dni_peru,
//     'rut_chile' 			=> $rut_chile,
//     'cc_colombia' 			=> $cc_colombia,
//     'ci_ecuador' 			=> $ci_ecuador,
//     'all_data' 				=> $all_data,
//     'leadgen_id' 			=> $leadgen_id
//  );

$sql = "INSERT INTO facebook_ads_leads_data(full_name, email, phone_number, city, state, country, zip_code, first_name, last_name, date_of_birth, gender, marital_status, military_status, job_title, relationship_status, work_phone_number, work_email, company_name, cpf_brazil, dni_argentina, dni_peru, rut_chile, cc_colombia, ci_ecuador, all_data, leadgen_id) VALUES ('$full_name', '$email', '$phone_number', '$city', '$state', '$country', '$zip_code', '$first_name', '$last_name', '$date_of_birth', '$gender', '$marital_status', '$military_status', '$job_title', '$relationship_status', '$work_phone_number', '$work_email', '$company_name', '$cpf_brazil', '$dni_argentina', '$dni_peru', '$rut_chile', '$cc_colombia', '$ci_ecuador', '$all_data', '$leadgen_id')";

$result = mysqli_query($conn, $sql);

if ($result){
	echo "data fatch succeffully";
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// connection closing
mysqli_close($conn);
?>
