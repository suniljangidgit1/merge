<?php
			
    	$currentDomain = $_GET['currentDomain'];
    	$userName = isset($_GET['userName']) ? $_GET['userName'] : NULL;
    	$is_admin = 0;
    	$domain = explode(".",$currentDomain);
	    $domain = $domain[0];

        if($userName != NULL){
        	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	        $sql11="SELECT is_admin FROM user where user_name='".$userName."'";
	        $result_e = mysqli_query($conn,$sql11);
	        $row = mysqli_fetch_assoc($result_e);
	        $is_admin = $row['is_admin'];

        }

        include($_SERVER['DOCUMENT_ROOT']."/task_cron/fincrmWebsiteConnection.php");

	    $res = mysqli_query($conn, "SELECT domain_status FROM users WHERE u_domain_name = '".$domain."'");
	    // print_r($res);die;

	    while($row = mysqli_fetch_assoc($res)){
        	 
             $response = array(
		       "domain_status" => $row['domain_status'],
		       "is_admin" => $is_admin,
		       "servername"=> $servername,
		     );

		echo json_encode($response); 
			
		}

    
	



    

	

