<?php

if(!defined('STDIN'))  define('STDIN',  fopen('php://stdin',  'rb'));
if(!defined('STDOUT')) define('STDOUT', fopen('php://stdout', 'wb'));
if(!defined('STDERR')) define('STDERR', fopen('php://stderr', 'wb'));

require __DIR__ . '\vendor\autoload.php';

use FacebookAds\Object\Lead;
use FacebookAds\Api;	
use FacebookAds\Logger\CurlLogger;

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$lead_sql = "SELECT wh.form_id, wh.leadgen_id, wh.page_id, fm.fb_leads_structure, fm.crm_leads_structure ,  uf.page_access_token FROM facebook_ads_webhook wh INNER JOIN facebook_ads_user_info uf ON wh.page_id = uf.page_id INNER JOIN fb_form_fields_mapping fm ON fm.form_id = wh.form_id  WHERE wh.delete_status = '0' ORDER BY uf.id DESC LIMIT 1";
$lead_result = mysqli_query($conn,$lead_sql);
if (mysqli_num_rows($lead_result) > 0) {

    while($lead_row = mysqli_fetch_assoc($lead_result)) {
        
        $form_id  = $lead_row['form_id'];
        $leadgen_id = $lead_row['leadgen_id'];
        $page_id = $lead_row['page_id'];
        $fb_leads_structure = explode(',', $lead_row['fb_leads_structure']);
        $crm_leads_structure = explode(',', $lead_row['crm_leads_structure']);
        $page_access_token = $lead_row['page_access_token'];

        //$access_token = $page_access_token;
         //$access_token = "EAADezwEINIQBAPgkgT4NTYegMztqt6ET9ZCgDGDyhhXqZCKFZCJHy9jd9Q0BPiyQ3uPmaZCbXqMdwNObaVvfwd36RHrSchlOJWSab9TWgOKXqJ1HduEQv5I99InOZAbAbGzolTwov0NrOxoz5XChqEXihU0evSrnJmLQvNodFCNgLxqwVCuViFI4oKbd7t54T7pKuuwbT9wZDZD";
        $access_token = "EAADezwEINIQBAPk5Dnaeptqkp9Ad0nLNWOkAnsmjZCOQjLZA1hfJB3TOqCVZAVtvAbr6PKSReZCcnhykbOmDnLlPOjnZBdloO0u5qpmyiAM0x3f4Nd7nXL9wtinLZBD8N1c6LorCNIW77LBSSBn6LS0tJk09lOMfLEqHtwzj9ZBPAZDZD";
        
		$app_secret = 'a9c8015e91b3f4460294b94f4662c652';
		$app_id = '244980656911492';
		$id = $leadgen_id;

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
		$length = count($data->field_data);

		for($i=0;$i<$length;$i++)
		{
			$fields_array[$data->field_data[$i]->name] = $data->field_data[$i]->values[0];
		}

		foreach($fb_leads_structure as $fb_rows)
		{
			$fb_rows 				= isset($fields_array[$fb_rows]) ? $fields_array[$fb_rows]:'';
			$leads_values[] = $fb_rows;
		}

		$fields_name = implode(",", $crm_leads_structure).','.'leadgen_id';
		$leads_values = "'".implode("','", $leads_values)."',".$data->id;

		$sql = "INSERT INTO facebook_ads_leads_data($fields_name) VALUES ($leads_values)";

		$result = mysqli_query($conn, $sql);

		if ($result){
			echo "data fatch succeffully";
			$sql = "UPDATE facebook_ads_webhook SET delete_status = '1' WHERE leadgen_id = '$data->id'";
			mysqli_query($conn, $sql);
		}else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

    }
} else {
    echo "No Leads Found";
}

// connection closing
mysqli_close($conn);
?>
