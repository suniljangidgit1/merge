<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$page_name			=	$_POST['page_name'];
$page_id 			=   $_POST['page_id'];
$page_access_token	= 	$_POST['page_access_token'];
$user_id			=	$_POST['user_id'];
$user_name			=	$_POST['user_name'];
$user_email			=	$_POST['user_email'];

$path = "https://graph.facebook.com/v6.0/oauth/access_token?grant_type=fb_exchange_token&client_id=244980656911492&client_secret=a9c8015e91b3f4460294b94f4662c652&fb_exchange_token=".$page_access_token;

$input = json_decode(file_get_contents($path));

$long_lived_page_access_token = $input->access_token;


$sql = "INSERT INTO facebook_ads_user_info(user_id, user_name, user_email,page_id, page_name, page_access_token) VALUES ('$user_id', '$user_name', '$user_email','$page_id','$page_name','$long_lived_page_access_token')";

$result = mysqli_query($conn, $sql);

if ($result){
	$data['status'] = 'success';
	$data['msg'] = 'success';
	return $data;
}else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    $data['status'] = 'error';
	$data['msg'] = 'error';
	return $data;
	//return false;
}


// connection closing
mysqli_close($conn);
?>