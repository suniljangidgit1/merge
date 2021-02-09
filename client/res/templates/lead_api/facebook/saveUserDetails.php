<?php session_start(); //START SESSION
$userName       =   $_SESSION['Login'];

//DATABASE OPERATIONS
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/lead_api/facebook/databaseOperations.php');

//CONSTANTS
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/lead_api/facebook/constants.php');

//GET USER DETAILS
$sql        		=   "SELECT id FROM user WHERE user_name = '$userName'";
$row        		=   $databaseOperations->getRecordArray($sql);
$createdBy     		=   $row['id'];

$page_name			=	isset($_GET['page_name']) ? $_GET['page_name'] : NULL;
$page_id 			=   isset($_GET['page_id']) ? $_GET['page_id'] : NULL;
$page_access_token	= 	isset($_GET['page_access_token']) ? $_GET['page_access_token'] : NULL;
$user_id			=	isset($_GET['user_id']) ? $_GET['user_id'] : NULL;
$user_name			=	isset($_GET['user_name']) ? $_GET['user_name'] : NULL;
$user_email			=	isset($_GET['user_email']) ? $_GET['user_email'] : NULL;
$userImage			=	isset($_GET['user_image']) ? $_GET['user_image'] : NULL;
$createdAt          =   date("Y-m-d h:i:s");

//GET LONG LIVED PAGE ACCESS TOKEN
$path 		= 	"https://graph.facebook.com/v6.0/oauth/access_token?grant_type=fb_exchange_token&client_id=".CLIENTID."&client_secret=".CLIENTSECRET."&fb_exchange_token=".$page_access_token;

$input 		= 	json_decode(file_get_contents($path));
$long_lived_page_access_token = $input->access_token;

if( !empty($userImage) ){

	//REQUIRED VALIDATION
	/*if(empty($user_name) || empty($user_email) || empty($user_id)){
		$data['status'] = 'error';
		$data['msg'] 	= 'Please enter required field';
		echo json_encode($data);return;
	}*/

	//GET USER DETAILS
	$userSQL 		 = 	"INSERT INTO `facebook_ads_users`(`facebook_user_id`, `user_name`, `user_email`, `user_image`, `status`, `deleted`, `created_at`, `modified_at`, `created_by`) VALUES ('$user_id', '$user_name', '$user_email','$userImage','Active','0','$createdAt','$createdAt','$createdBy')";

	$userResult 	 = 	$databaseOperations->executeQuery($userSQL);

	$userPagesResult =  true;
} else {

	//REQUIRED VALIDATION
	/*if(empty($user_name) || empty($user_email) || empty($user_id) || empty($page_id) || empty($page_name) || empty($long_lived_page_access_token) ){
		$data['status'] = 'error';
		$data['msg'] 	= 'Please enter required field';
		echo json_encode($data);return;
	}*/

 	//GET ALL PAGES DETAILS
	$userPagesSQL 	 = 	"INSERT INTO facebook_ads_user_pages(user_id, user_name, user_email,page_id, page_name, page_access_token) VALUES ('$user_id', '$user_name', '$user_email','$page_id','$page_name','$long_lived_page_access_token')";

	$userPagesResult = 	$databaseOperations->executeQuery($userPagesSQL);

	$userResult = true; 
}

if( $userResult  &&  $userPagesResult ){
	$data['status'] = 'success';
	$data['msg'] 	= 'success';
	echo json_encode($data);return;
}else{
    $data['status'] = 'error';
	$data['msg'] 	= 'opps! somthing went wrong.';
	echo json_encode($data);return;
}
?>