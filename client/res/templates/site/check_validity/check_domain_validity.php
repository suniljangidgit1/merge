<?php
			
	include($_SERVER['DOCUMENT_ROOT']."/task_cron/fincrmWebsiteConnection.php");
	
    function upgrade_plan($conn,$servername){
    	$currentDomain = $_GET['currentDomain'];
	    $domain = explode(".",$currentDomain);
	    $domain = $domain[0];
        
	    $res = mysqli_query($conn, "SELECT u.u_id, u.rz_om_id, u.u_email, u.u_mobile, rm.requestType, rm.endDate, rm.pId FROM users u, rz_order_master rm WHERE u.rz_om_id = rm.id AND u.u_domain_name = '".$domain."'");
	    // print_r($res);die;

	    while($row = mysqli_fetch_assoc($res)){
        	$u_id        = $row['u_id'];
        	$pId         = $row['pId'];
        	$requestType = $row['requestType'];
        	$res_pm = mysqli_query($conn, "SELECT pSlug FROM plan_master WHERE pId = '".$row['pId']."'");

        while($row_new = mysqli_fetch_assoc($res_pm)){
         // {
        $pSlug = $row_new['pSlug'];
        }
        
			if($servername == 'localhost'){
				$server_name = 'fincrm_web.com';
			}else{
				$server_name = 'fincrm.net';
			}

			$userId = base64_encode($u_id);
			$domain = base64_encode($domain);
		    $pSlug  = base64_encode($pSlug);
			$tokan  = md5( rand(111111, 999999)); 


			$res = mysqli_query($conn, "SELECT * FROM users_token WHERE uId='".base64_decode($userId)."'");
	        $row = mysqli_fetch_assoc($res);

	        	if($row['uId']==0){

	        	mysqli_query($conn, "INSERT INTO users_token (`uId`, `upgrade_token`) VALUES (".base64_decode($userId).", '$tokan')");
		        }else{
		        	mysqli_query($conn, "UPDATE users_token SET upgrade_token='$tokan' WHERE uId=".base64_decode($userId));
		        }
             $url   = "http://".$server_name."/upgrade-plan/".$userId."/".$tokan."";
             $paid_user_url ='http://'.$server_name.'/pre-payment/'.$domain.'/'.$pId.'/'.$pSlug.'';
             $response = array(
		       "url" => $url,
		       "paid_user_url" => $paid_user_url,
		       "requestType" => $requestType,
		     );

		echo json_encode($response); 
			
		}
	}
	
    function hide_upgrade($conn){
    
    $currentDomain = $_GET['currentDomain'];

	$domain = explode(".",$currentDomain);
	$res = mysqli_query($conn, "SELECT u.u_id, u.rz_om_id, u.u_email, u.u_mobile, rm.requestType, rm.endDate FROM users u, rz_order_master rm WHERE u.rz_om_id = rm.id AND u.u_domain_name = '".$domain[0]."'");
	$row = mysqli_fetch_array($res);

	$rz_om_id = $row['rz_om_id'];
	$requestType = $row['requestType'];
	$u_email = $row['u_email'];
	$u_mobile = $row['u_mobile'];

    if($requestType == "razorpay"){
		echo -1;
	}else{
		$current_date = new DateTime(); 
		$end_date = $row['endDate'];
		$end_date = new DateTime($end_date);
		// echo $end_date. "   ". $current_date;
		if($current_date < $end_date){
			$days= date_diff($current_date, $end_date);
			$remaningDays = $days->format("%d")+1;

			if($remaningDays < 0){
				$remaningDays = 0;
			}
		    echo $remaningDays;//die;
		}else{
			echo 0;
		}
		
	}
  // } 

    }
	


$methodName = isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;
if($methodName == 'getUpgradeUrl'){
	$responce = upgrade_plan($conn,$servername);
	return $responce;
}elseif($methodName == 'getTrailDays'){
    $responce = hide_upgrade($conn);
    return $responce;
}


    

	

