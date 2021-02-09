<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$sql="SELECT `id`, `delivery_status`, `sms_shoot_id` FROM `send_s_m_s_data` WHERE delivery_status = 'Not-Delivered'";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$api_key = '45D303BAF92352';
		$sms_shoot_id = $row['sms_shoot_id'];
        echo $sms_shoot_id;
		$api_url = "http://bulksms.smsroot.com/app/miscapi/".$api_key."/getDLR/".$sms_shoot_id;

		$response = file_get_contents($api_url);
		$dlr_array = json_decode($response);

		$delivery_status = $dlr_array[0]->DLR;
        echo $delivery_status;
		if($delivery_status == 'Delivered')
		{
			$dlrs_sql = "UPDATE send_s_m_s_data SET delivery_status='Delivered' WHERE id='".$row['id']."'";
			mysqli_query($conn,$dlrs_sql);
		}
	}
}
?> 