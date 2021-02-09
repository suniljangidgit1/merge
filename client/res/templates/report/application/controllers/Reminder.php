<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder extends CI_Controller {

	public function index()
	{	
		$url    = $_SERVER["HTTP_HOST"];
        $domain = explode(".", $url);
        $domain = $domain[0];
        $domainStatus = $this->Dailysheet_model->getDomainStatus($domain);
        
        if($domainStatus['domain_status'] == "Blocked")
        	if(isset($_SERVER["HTTP_X_FORWARDED_PROTO"])){
        		$addr = 'https://';
        	}else
        	{
        		$addr = 'http://';
        	}
           session_destroy();
           // echo $_SESSION['Login'];die;
           redirect($addr.$_SERVER["HTTP_HOST"]);
        }
		// echo "<br>";print_r("Welcome to remainder controller!");
		// echo "<br>";print_r($_SERVER['REMOTE_ADDR']);
		$this->load->view("menu");
	}

	
	/*
	* To get email reminder list
	* @parm 	- none
	* @return 	- none
	*/
	public function emailList(){

		// echo "<pre>";print_r("Email remainder list!");

		$data 	= array();

		$id 	= NULL; // Dynamic id of logged in user here

		// $sql = 'SELECT er.er_id, er.er_subject, er.er_emailTo, er.er_emailCc, er.er_createdAt, er.er_sendEmailDateTime, er.er_emailStatus, er.er_status FROM email_reminder as er WHERE er_createdBy="'.$id.'" ORDER BY er.er_id DESC ';
		$sql = 'SELECT er.er_id, er.er_subject, er.er_emailTo, er.er_emailCc, er.er_createdAt, er.er_sendEmailDateTime, er.er_emailStatus, er.er_status FROM email_reminder as er WHERE 1=1 ORDER BY er.er_id DESC ';

		$result = $this->db->query($sql)->result_array();
		// echo "<br>";print_r ($this->db->last_query());
		// echo "<pre>";print_r($result);die;

		$data['email_list'] = $result;
		$this->load->view( "email_list", $data );
		
	}


	/*
	* To add email reminder
	* @parm 	- none
	* @return 	- (json) $data
	*/
	public function emailAdd(){

		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Invalid request!";

		$er_emailTo 		= isset($_POST["to"]) ? $_POST["to"] : NULL; 
		$er_emailCc 		= isset($_POST["cc"]) ? $_POST["cc"] : NULL; 
		$er_subject 		= isset($_POST["subject"]) ? $_POST["subject"] : NULL; 
		$er_emailBody 		= isset($_POST["editor1"]) ? $_POST["editor1"] : NULL;
		$er_sendEmailDate 	= isset($_POST["date"]) ? $_POST["date"] : NULL; 
		$er_sendEmailTime 	= isset($_POST["time"]) ? $_POST["time"] : NULL; 

		$oldDate 			= strtr($er_sendEmailDate, '/', '-');
		$oldDate 			= strtotime($oldDate);
		$er_sendEmailDate 	= date("Y-m-d", $oldDate);
		
		$er_sendEmailDateTime 	= $er_sendEmailDate." ".$er_sendEmailTime;

		$file_name 			= null;
		$file_type 			= null;
		$file_size 			= null;
		
		$fileName 			= array();
		$fileType 			= array();
		$fileSize 			= array();
		
		// FILE UPLOAD
		/////////////////////////////////////////////////
		$uploads_dir 	= "uploads/";
		$index 			= 0;

		foreach($_FILES['attachment']['name'] as $filename) {
			
			$deleted 	= 0;
			$extension 	= pathinfo($_FILES['attachment']['name'][$index], PATHINFO_EXTENSION);
			// $file_name	= $index."_".time().date("YmdHis").".".$extension;
			$file_name	= $index.time().date("YmdHis")."_".$_FILES['attachment']['name'][$index];


			$file_type	= $_FILES["attachment"]["type"][$index];
			$file_size	= $_FILES["attachment"]["size"][$index];

			move_uploaded_file($_FILES["attachment"]["tmp_name"][$index], $uploads_dir. basename($file_name));
			
			$DateTime = new DateTime();
			$DateTime->modify('-2 hours');
			
			$created_at 	= $DateTime->format('Y-m-d g:i:s');
			$role 			= "Attachment";
			
			if( !empty($_FILES["attachment"]["name"][$index]) ){
				array_push( $fileName, $file_name );
			}

			array_push( $fileType, $file_type );
			array_push( $fileSize, $file_size );

			$index++;
						
		} 

		if( !empty($fileName) ){
			$er_fileName  	= implode(", ", $fileName);
		}else{
			$er_fileName  	= NULL;
		}
		/////////////////////////////////////////////////
		// FILE UPLOAD

		// $er_fileName  	= implode(", ", $fileName);
		$er_fileType  	= NULL; //implode(", ", $fileType);
		$er_fileSize  	= NULL; //implode(", ", $fileSize);
		$er_folderName  = NULL; // PLEAS ADD HERE DOMAIN NAME

		$er_emailStatus = 0;
		$er_status 		= 1;
		$DateTime 		= new DateTime();
		$er_createdBy 	= "1"; // PLEAS ADD HERE USER SESSION USER_ID
		$er_createdAt 	= $DateTime->format('Y-m-d H:i:s');


		$sql = "INSERT INTO email_reminder (er_emailTo, er_emailCc, er_subject, er_emailBody, er_fileName, er_fileType, er_fileSize, er_sendEmailDate, er_sendEmailTime, er_sendEmailDateTime, er_folderName, er_emailStatus, er_status, er_createdBy, er_createdAt) VALUES ('".$er_emailTo."', '".$er_emailCc."', '".$er_subject."', '".$er_emailBody."', '".$er_fileName."', '".$er_fileType."', '".$er_fileSize."', '".$er_sendEmailDate."', '".$er_sendEmailTime."', '".$er_sendEmailDateTime."', '".$er_folderName."', '".$er_emailStatus."', '".$er_status."', '".$er_createdBy."', '".$er_createdAt."')";

		if( $this->db->query($sql) ){

			$data["error"] 	= "false";
			$data["status"] = "true";
			$data["msg"] 	= "Reminder added successfully.";
			echo json_encode($data);return;
		}else{
			$data["error"] 	= "true";
			$data["status"] = "false";
			$data["msg"] 	= "Oops! Something went wrong.";
			echo json_encode($data);return;
		}

		echo json_encode($data);return;

	}



	/*
	* To get email reminder details
	* @parm 	- (int) $id
	* @parm 	- (bool) $json
	* @return 	- (json) $data
	*/
	public function emailRminderGet($id="", $json=true){

		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Invalid request!";

		$sql = 'SELECT er.er_id, er.er_subject, er.er_emailTo, er.er_emailCc, er.er_emailBody, DATE_FORMAT(er.er_sendEmailTime, "%H:%i") as er_sendEmailTime, DATE_FORMAT(er.er_sendEmailDate, "%d/%m/%Y") as er_sendEmailDate, er.er_fileName, er.er_createdAt, er.er_sendEmailDateTime, er.er_emailStatus, er.er_status FROM email_reminder as er WHERE er_id="'.$id.'" ORDER BY er.er_id ASC ';
		
		$result = $this->db->query($sql)->row_array();

		if( !empty($result) ){
			
			$data["error"] 	= "false";
			$data["status"] = "true";
			$data["msg"] 	= "Record found!";
			$data["data"] 	= $result;

			if( !$json ){
				return $result;
			}
			echo json_encode($data);return;
		}

		echo json_encode($data);return;
		die;
		
	}


	/*
	* To get email reminder details
	* @parm 	- none
	* @parm 	- none
	* @return 	- (json) $data
	*/
	public function unlinkFile(){

		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Invalid request!";

		$er_id 			= isset($_POST["er_id"]) ? $_POST["er_id"] : NULL;
		$er_fileName 	= isset($_POST["er_fileName"]) ? $_POST["er_fileName"] : NULL;
		$er_fileName	= str_replace(" ", "", $er_fileName);

		$result = $this->emailRminderGet($er_id, $json=false);

		if( !empty($er_id) && !empty($er_fileName) && !empty($result) ){

			if( !empty($result["er_fileName"]) ){

				$result["er_fileName"]	= str_replace(" ", "", $result["er_fileName"]);
				$temp = explode(",", $result["er_fileName"]);

				if ( in_array($er_fileName, $temp) ){

					$filePath = $_SERVER['DOCUMENT_ROOT']."/fincrm/uploads/".trim($er_fileName);

					if( file_exists($filePath) ){

						$indexUnset = array_search(trim($er_fileName), $temp);
						unlink($filePath);
						unset($temp[$indexUnset]);
					}
				}

				// echo "<pre> temp - ";print_r($temp);
				$updateTemp = implode(",", $temp);
				// Update file names
				$sql = "UPDATE email_reminder SET er_fileName = '".$updateTemp."' WHERE er_id = '".$er_id."' ";
				// echo "<br>";print_r($sql);die;

				if( $this->db->query($sql) ){

					$data["error"] 	= "false";
					$data["status"] = "true";
					$data["msg"] 	= "File deleted successfully.";
					echo json_encode($data);return;

				}

		
			}
		}

		echo json_encode($data);return;
		die;
	}


	/*
	* To edit email reminder details
	* @parm 	- none
	* @parm 	- none
	* @return 	- (json) $data
	*/
	public function emailEdit(){

		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Invalid request!";

		$er_id 			= isset($_POST["er_id"]) ? $_POST["er_id"] : NULL; 
		$record 		= $this->emailRminderGet($er_id, $json=false);

		if( empty($record) || empty($er_id) ){
			$data["msg"] 	= "No record found!";
			echo json_encode($data);return;
		}

		$er_emailTo 		= isset($_POST["to1"]) ? $_POST["to1"] : $record["er_emailTo"]; 
		$er_emailCc 		= isset($_POST["cc1"]) ? $_POST["cc1"] : $record["er_emailCc"]; 
		$er_subject 		= isset($_POST["subject1"]) ? $_POST["subject1"] : $record["er_subject"]; 
		$er_emailBody 		= isset($_POST["editor2"]) ? $_POST["editor2"] : $record["er_emailBody"];
		$er_sendEmailDate 	= isset($_POST["date1"]) ? $_POST["date1"] : $record["er_sendEmailDate"]; 
		$er_sendEmailTime 	= isset($_POST["time1"]) ? $_POST["time1"] : $record["er_sendEmailTime"]; 

		$oldDate 			= strtr($er_sendEmailDate, '/', '-');
		$oldDate 			= strtotime($oldDate);
		$er_sendEmailDate 	= date("Y-m-d", $oldDate);
		
		$er_sendEmailDateTime 	= $er_sendEmailDate." ".$er_sendEmailTime;

		$file_name 			= null;
		$file_type 			= null;
		$file_size 			= null;
		
		$fileName 			= array();
		$fileType 			= array();
		$fileSize 			= array();
		
		// FILE UPLOAD
		/////////////////////////////////////////////////
		$uploads_dir 	= "uploads/";
		$index 			= 0;

		// echo "<pre>";print_r($_FILES);
		if( !empty($_FILES) ){

			foreach($_FILES['attachment1']['name'] as $filename) {
				
				$deleted 	= 0;
				$extension 	= pathinfo($_FILES['attachment1']['name'][$index], PATHINFO_EXTENSION);
				// $file_name	= $index."_".time().date("YmdHis").".".$extension;
				$file_name	= $index.time().date("YmdHis")."_".$_FILES['attachment1']['name'][$index];

				$file_type	= $_FILES["attachment1"]["type"][$index];
				$file_size	= $_FILES["attachment1"]["size"][$index];

				move_uploaded_file($_FILES["attachment1"]["tmp_name"][$index], $uploads_dir. basename($file_name)); 
				$DateTime = new DateTime();
				$DateTime->modify('-2 hours');
				
				$created_at 	= $DateTime->format('Y-m-d g:i:s');
				$role 			= "Attachment";

				if( !empty($_FILES["attachment1"]["name"][$index]) ){
					array_push( $fileName, $file_name );
				}

				array_push( $fileType, $file_type );
				array_push( $fileSize, $file_size );

				$index++;
							
			} 

			if( !empty($fileName) ){
				$er_fileName  	= $record["er_fileName"].",".implode(", ", $fileName);
			}else{
				$er_fileName  	= NULL;
			}

		}else{

			$er_fileName  	= $record["er_fileName"];

		}
		/////////////////////////////////////////////////
		// FILE UPLOAD

		$er_fileType  	= NULL; //implode(", ", $fileType);
		$er_fileSize  	= NULL; //implode(", ", $fileSize);
		$er_folderName  = NULL; // PLEAS ADD HERE DOMAIN NAME

		// $er_emailStatus = 0;
		// $er_status 		= 1;
		$DateTime 		= new DateTime();
		$er_createdBy 	= "1"; // PLEAS ADD HERE USER SESSION USER_ID
		$er_updatedAt 	= $DateTime->format('Y-m-d H:i:s');

		$sql = "UPDATE email_reminder SET er_emailTo = '".$er_emailTo."', er_emailCc = '".$er_emailCc."', er_subject = '".$er_subject."', er_emailBody = '".$er_emailBody."', er_fileName = '".$er_fileName."', er_fileType = '".$er_fileType."', er_fileSize = '".$er_fileSize."', er_sendEmailDate = '".$er_sendEmailDate."', er_sendEmailTime = '".$er_sendEmailTime."', er_sendEmailDateTime = '".$er_sendEmailDateTime."', er_folderName = '".$er_folderName."',  er_createdBy = '".$er_createdBy."', er_updatedAt = '".$er_updatedAt."' WHERE er_id = '".$er_id."' ";
		// echo "<br>";print_r($sql);die;

		if( $this->db->query($sql) ){

			$data["error"] 	= "false";
			$data["status"] = "true";
			$data["msg"] 	= "Reminder updated successfully.";
			echo json_encode($data);return;
		}else{
			$data["error"] 	= "true";
			$data["status"] = "false";
			$data["msg"] 	= "Oops! Something went wrong.";
			echo json_encode($data);return;
		}

		echo json_encode($data);return;

	}


	/*
	* To chnage email reminder status
	* @parm 	- (int) $id
	* @parm 	- (int) $currStatus
	* @return 	- none
	*/
	public function emailChangeStatus( $id="", $currStatus="" ){

		if( !empty($id) ){

			if( $currStatus == "0" ){

				$sql 	= 'UPDATE email_reminder as er SET er.er_status = 1 WHERE er.er_id = "'.$id.'" ';
			}else{

				$sql 	= 'UPDATE email_reminder as er SET er.er_status = 0 WHERE er.er_id = "'.$id.'" ';
			}

			$status = $this->db->query($sql);

			if( $status ){
				redirect(base_url('reminder/emailList'));die;
			}else{
				echo "<pre>";print_r("Oops! Something went wrong.");die;
			}
			redirect(base_url('reminder/emailList'));die;

		}else{

			echo "<pre>";print_r("Invalid request!");die;

		} 


	}












	/*
	* To get sms reminder list
	* @parm 	- none
	* @parm 	- none
	* @return 	- none
	*/
	public function smsList(){

		$data 	= array();
		$id 	= NULL; // Dynamic id of logged in user here

		// $sql = 'SELECT * FROM sms_reminder as sr WHERE sr_createdBy="'.$id.'" ORDER BY sr.sr_id DESC ';
		$sql = 'SELECT * FROM sms_reminder as sr WHERE 1=1 ORDER BY sr.sr_id DESC ';

		$result = $this->db->query($sql)->result_array();
		// echo "<br>";print_r ($this->db->last_query());
		// echo "<pre>";print_r($result);die;

		$data['sms_list'] = $result;

		$this->load->view( "sms_list", $data );

	}


	/*
	* To check user sms reminder limit
	* @parm 	- (int) $userId
	* @return 	- (string) $isExcceded
	*/
	public function checkSmsLimitOfUser($userId=""){

		$isExcceded = "no";
		if( !empty($userId) ){

			$sql 		= " SELECT COUNT(sr.sr_id) as count FROM sms_reminder as sr WHERE sr.sr_createdBy = '".$userId."' ";
			$result 	= $this->db->query($sql)->row_array();
		 	// echo "<pre>";print_r($result);

		 	$limitSql 	= " SELECT usl.usl_limit FROM user_sms_limit as usl WHERE usl.usl_userId ='".$userId."' ";
		 	$maxLimit 	= $this->db->query($limitSql)->row_array();
		 	// echo "<pre>";print_r($maxLimit);
			
			if( !empty($maxLimit) ){
				$isExcceded = "yes";
			}
			if( !empty($result["count"]) && $result["count"] > $maxLimit['usl_limit'] ){
				$isExcceded = "yes";
			}else{
				$isExcceded = "no";
			}
		}
		
		// echo $isExcceded;die;
		return $isExcceded;

	}



	/*
	* To add sms reminder
	* @parm 	- none
	* @parm 	- none
	* @return 	- (json) $data
	*/
	public function smsAdd(){

		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Invalid request!";

		// echo "<pre>";print_r($_POST);

		$sr_mobileNo 		= isset($_POST["smsMobileNo1"]) ? $_POST["smsMobileNo1"] : NULL; 
		$sr_smsBody 		= isset($_POST["smsBody1"]) ? $_POST["smsBody1"] : NULL; 
		$sr_reminderDate 	= isset($_POST["smsDate1"]) ? $_POST["smsDate1"] : NULL; 
		$sr_reminderTime 	= isset($_POST["smsTime1"]) ? $_POST["smsTime1"] : NULL;

		$oldDate 			= strtr($sr_reminderDate, '/', '-');
		$oldDate 			= strtotime($oldDate);
		$sr_reminderDate 	= date("Y-m-d", $oldDate);
		$sr_sendSmsDateTime = $sr_reminderDate." ".$sr_reminderTime;

		$sr_folderName  = NULL; // PLEASE ADD HERE DOMAIN NAME
		$sr_smsStatus 	= 0;
		$sr_status 		= 1;
		$sr_createdBy 	= 1; // PLEASE ADD HERE USER SESSION USER_ID
		$DateTime 		= new DateTime();
		$sr_createdAt 	= $DateTime->format('Y-m-d H:i:s');

		// Check limit excceded of user 
		$limiExcced = $this->checkSmsLimitOfUser($sr_createdBy); // CHEKC HERE LIMIT OF USER
		if( !empty($sr_createdBy) && $limiExcced == "yes" ){

			$data["error"] 	= "true";
			$data["status"] = "false";
			$data["msg"] 	= "Limit excceded! Please contact to admin.";
			echo json_encode($data);return;
		}
		// Check limit excceded of user 


		$sql = "INSERT INTO sms_reminder (sr_mobileNo, sr_smsBody, sr_reminderDate, sr_reminderTime, sr_sendSmsDateTime, sr_folderName, sr_createdBy, sr_smsStatus, sr_status, sr_createdAt ) VALUES ('".$sr_mobileNo."', '".$sr_smsBody."', '".$sr_reminderDate."', '".$sr_reminderTime."', '".$sr_sendSmsDateTime."', '".$sr_folderName."', '".$sr_createdBy."', '".$sr_smsStatus."', '".$sr_status."', '".$sr_createdAt."')";
		// echo "<pre>";print_r($sql);die;

		if( $this->db->query($sql) ){

			$data["error"] 	= "false";
			$data["status"] = "true";
			$data["msg"] 	= "Reminder added successfully.";
			echo json_encode($data);return;
		}else{
			$data["error"] 	= "true";
			$data["status"] = "false";
			$data["msg"] 	= "Oops! Something went wrong.";
			echo json_encode($data);return;
		}

		echo json_encode($data);return;

	}



	/*
	* To get sms reminder details
	* @parm 	- (int) @id
	* @parm 	- (bool) $json
	* @return 	- (json) $data
	*/
	public function smsRminderGet($id="", $json=true){

		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Invalid request!";

		$sql = 'SELECT sr.sr_id, sr.sr_mobileNo, sr.sr_smsBody, DATE_FORMAT(sr.sr_reminderTime, "%H:%i") as sr_reminderTime, DATE_FORMAT(sr.sr_reminderDate, "%d/%m/%Y") as sr_reminderDate, sr.sr_createdAt, sr.sr_sendSmsDateTime, sr.sr_smsStatus, sr.sr_status FROM sms_reminder as sr WHERE sr_id="'.$id.'" ORDER BY sr.sr_id ASC ';
		
		$result = $this->db->query($sql)->row_array();
		// echo "<br>";print_r ($this->db->last_query());
		// echo "<pre>";print_r($result);die;

		if( !empty($result) ){
			
			$data["error"] 	= "false";
			$data["status"] = "true";
			$data["msg"] 	= "Record found!";
			$data["data"] 	= $result;

			if( !$json ){
				return $result;
			}
			echo json_encode($data);return;
		}

		echo json_encode($data);return;
		die;
		
	}



	/*
	* To edit sms reminder details
	* @parm 	- none
	* @parm 	- none
	* @return 	- (json) $data
	*/
	public function smsEdit(){

		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Invalid request!";

		// echo "<pre>";print_r($_POST);

		$sr_id 				= isset($_POST["sr_id"]) ? $_POST["sr_id"] : NULL; 
		$record 			= $this->smsRminderGet($sr_id, $json=false);
		// echo "<pre>";print_r($record);die;

		if( empty($record) || empty($sr_id) ){
			$data["msg"] 	= "No record found!";
			echo json_encode($data);return;
		}

		// Check limit excceded of user 
		$sr_createdBy = 1;
		$limiExcced = $this->checkSmsLimitOfUser($sr_createdBy); // CHEKC HERE LIMIT OF USER
		if( !empty($sr_createdBy) && $limiExcced == "yes" ){

			$data["error"] 	= "true";
			$data["status"] = "false";
			$data["msg"] 	= "Limit excceded! Please contact to admin.";
			echo json_encode($data);return;
		}
		// Check limit excceded of user 


		$sr_mobileNo 		= isset($_POST["smsMobileNo2"]) ? $_POST["smsMobileNo2"] : $record["sr_mobileNo"]; 
		$sr_smsBody 		= isset($_POST["smsBody2"]) ? $_POST["smsBody2"] : $record["sr_smsBody"]; 
		$sr_reminderDate 	= isset($_POST["smsDate3"]) ? $_POST["smsDate3"] : $record["sr_reminderDate"]; 
		$sr_reminderTime 	= isset($_POST["smsTime2"]) ? $_POST["smsTime2"] : $record["sr_reminderTime"];

		$oldDate 			= strtr($sr_reminderDate, '/', '-');
		$oldDate 			= strtotime($oldDate);
		$sr_reminderDate 	= date("Y-m-d", $oldDate);
		$sr_sendSmsDateTime = $sr_reminderDate." ".$sr_reminderTime;

		$DateTime 			= new DateTime();
		$sr_updatedAt 		= $DateTime->format('Y-m-d H:i:s');


		$sql = "UPDATE sms_reminder SET sr_mobileNo = '".$sr_mobileNo."', sr_smsBody = '".$sr_smsBody."', sr_reminderDate = '".$sr_reminderDate."', sr_reminderTime = '".$sr_reminderTime."', sr_sendSmsDateTime = '".$sr_sendSmsDateTime."', sr_updatedAt = '".$sr_updatedAt."' WHERE sr_id = '".$sr_id."' ";
		// echo "<pre>";print_r($sql);die;

		if( $this->db->query($sql) ){
		// echo "<pre>";print_r($sql);die;

			$data["error"] 	= "false";
			$data["status"] = "true";
			$data["msg"] 	= "Reminder updated successfully.";
			echo json_encode($data);return;
		}else{
			$data["error"] 	= "true";
			$data["status"] = "false";
			$data["msg"] 	= "Oops! Something went wrong.";
			echo json_encode($data);return;
		}

		echo json_encode($data);return;

	}



	/*
	* To change sms reminder status
	* @parm 	- (int) $id
	* @parm 	- (int) $currStatus
	* @return 	- none
	*/
	public function smsChangeStatus( $id="", $currStatus="" ){

		if( !empty($id) ){

			if( $currStatus == "0" ){

				$sql 	= 'UPDATE sms_reminder as sr SET sr.sr_status = 1 WHERE sr.sr_id = "'.$id.'" ';
			}else{

				$sql 	= 'UPDATE sms_reminder as sr SET sr.sr_status = 0 WHERE sr.sr_id = "'.$id.'" ';
			}

			$status = $this->db->query($sql);

			if( $status ){
				redirect(base_url('reminder/smsList'));die;
			}else{
				echo "<pre>";print_r("Oops! Something went wrong.");die;
			}
			redirect(base_url('reminder/smsList'));die;

		}else{

			echo "<pre>";print_r("Invalid request!");die;

		} 


	}


	/*
	* To delete inactive sms reminder i.e. all sms reminder will delete before 1 month
	* @parm 	- (none) 
	* @parm 	- (int)
	* @return 	- none
	*/
	public function cronJobDeleteInactiveSms(){

		$sql = " DELETE FROM sms_reminder WHERE sr_createdAt < NOW() - INTERVAL 7 MONTH AND sr_smsStatus = '0' AND sr_status = '0' ";
		
		if( $this->db->query($sql) ){

			echo "Sms remider deleted successfully.";die;
		}else{

			echo "Oops! Something went wrong.";die;
		}
	}


	/*
	* To delete inactive email reminder i.e. all email reminder will delete before 1 month
	* @parm 	- (none) 
	* @parm 	- (int)
	* @return 	- none
	*/
	public function cronJobDeleteInactiveEmail(){

		$sql = " DELETE FROM email_reminder WHERE er_createdAt < NOW() - INTERVAL 10 MONTH AND er_emailStatus = '0' AND er_status = '0' ";
		
		if( $this->db->query($sql) ){

			echo "Email remider deleted successfully.";die;
		}else{

			echo "Oops! Something went wrong.";die;
		}
	}

	
}