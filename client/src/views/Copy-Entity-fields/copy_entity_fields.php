<?php
/*	session_start();
	echo "INTO COPY ENTITY FIELDS.";
	echo "<br>";
	
	$length=17;
	date_default_timezone_set("Asia/Calcutta"); 
	$id= $_SESSION["entityID"];// Entity record id.
	$name= $_SESSION["name"];// Entity Name.
	$copyIntoEntity= $_POST['entityList']; // Selected Entity Name for copy paste.
	$copyIntoEntityTableName=strtolower(preg_replace('/\B([A-Z])/', '_$1', $copyIntoEntity));// lower case of selected entity name.
	$tableName=strtolower(preg_replace('/\B([A-Z])/', '_$1', $name)); // Table name of selected entity record to copy.
	
	
	echo "ENTITY ID= ".$id;
	echo "<br>";
	echo "ENTITY NAME= ".$name;
	echo "<br>";
	echo "SELECTED ENTITY= ".$copyIntoEntity;
	echo "<br>";
	echo "TABLE NAME FOR PASTE RECORD= ". $copyIntoEntityTableName;
	echo "<br>";
	echo "TABLE NAME FORM COPY RECORD= ".$tableName;
	echo "<br>";
	
	$conn = mysqli_connect('localhost', 'finnovaa_democrm', 'Fin$%184#', 'finnovaa_democrm_final'); // Database connection.
	if($conn->connect_error){
		die("Connection Failed ". $conn->connect_error);
	}
	
	$sql= "SELECT * FROM $tableName WHERE id= '".$id."'"; // Query for get data for selected record for copy.
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_array($result)){
		$entity_name= $row['name'];
		$entity_deleted= $row['deleted'];
		$entity_description= $row['description'];
		$entity_website= $row['website'];
		$entity_billing_address_street=$row['billing_address_street'];
		$entity_billing_address_city= $row['billing_address_city'];
		$entity_billing_address_state=$row['billing_address_state'];
		$entity_billing_address_country = $row['billing_address_country'];
		$entity_billing_address_postal_code = $row['billing_address_postal_code'];
		$entity_shipping_address_street = $row['shipping_address_street'];
		$entity_shipping_address_city = $row['shipping_address_city'];
		$entity_shipping_address_state = $row['shipping_address_state'];
		$entity_shipping_address_country = $row['shipping_address_country'];
		$entity_shipping_address_postal_code = $row['shipping_address_postal_code'];
		$entity_created_at = $row['created_at'];
		$entity_modified_at = $row['modified_at'];
		$entity_created_by_id = $row['created_by_id'];
		$entity_modified_by_id = $row['modified_by_id'];
		$entity_assigned_user_id = $row['assigned_user_id'];
		
		echo "<br>";
		print_r($row);
		echo "<br>";
		$new_id_for_entity= getToken($length);
		
		echo "<br>";
		echo "".$new_id_for_entity;
		echo "<br>";
		
		mysqli_query($conn, "INSERT INTO $copyIntoEntityTableName (id, name, deleted, description, website, billing_address_street, billing_address_city, billing_address_state, billing_address_country, billing_address_postal_code, shipping_address_street, shipping_address_city, shipping_address_state, shipping_address_country, shipping_address_postal_code, created_at, modified_at, created_by_id, modified_by_id, assigned_user_id) VALUES ('".$new_id_for_entity."', '".$entity_name."', '".$entity_deleted."', '".$entity_description."', '".$entity_website."', '".$entity_billing_address_street."', '".$entity_billing_address_city."', '".$entity_billing_address_state."', '".$entity_billing_address_country."', '".$entity_billing_address_postal_code."', '".$entity_shipping_address_street."', '".$entity_shipping_address_city."', '".$entity_shipping_address_state."', '".$entity_shipping_address_country."', '".$entity_shipping_address_postal_code."', '".$entity_created_at."', '".$entity_modified_at."', '".$entity_created_by_id."', '".$entity_modified_by_id."', '".$entity_assigned_user_id."')");
		
	
	}
	
	// Code start for get phone_number_id from entity_phone_number Table. //
	
	$sql_EPN = "SELECT * FROM entity_phone_number WHERE entity_id='".$id."'"; 
	$result_EPN = mysqli_query($conn, $sql_EPN);
		
	while($row_EPN = mysqli_fetch_array($result_EPN)){
		$entity_PN_ID= $row_EPN['phone_number_id'];	
		$entity_type= $row_EPN['entity_type'];	
		$entity_primary= $row_EPN['primary'];
		echo "<br>";
		print_r($row_EPN);
		echo "<br>";
		echo "PHONE NUMBER ID FROM ENTITY PHONE NUMBER = ". $entity_PN_ID;
		echo "<br>";
		echo "ENTITY TYPE FROM ENTITY PHONE NUMBER = ". $entity_type;
		echo "<br>";
		
		
		// Code start for get phone numbers from the phone_number table. //
		
		$sql_PN = "SELECT * FROM phone_number WHERE id='".$entity_PN_ID."'"; 
		$result_PN = mysqli_query($conn, $sql_PN);
		
		while($row_PN = mysqli_fetch_array($result_PN)){
			$phone_no= $row_PN['name'];
			$number_type= $row_PN['type'];
			
			echo "<br>";
			echo "PHONE NUMBER = ". $phone_no;
			echo "<br>";
			print_r($row_PN);
			echo "<br>";
			$new_PN_ID= getToken($length);
			echo "<br>";
			echo "<br>";
			echo "NEW ID FOR PHONE NUMBER = ". $new_PN_ID;
			echo "<br>";
			echo "<br>";
			mysqli_query($conn, "INSERT INTO phone_number(id, name, deleted, type) VALUES ('".$new_PN_ID."', '".$phone_no."', '0', '".$number_type."')");
			mysqli_query($conn, "INSERT INTO entity_phone_number (`entity_id`, `phone_number_id`, `entity_type`, `primary`, `deleted`) VALUES ('".$new_id_for_entity."', '".$new_PN_ID."', '".$entity_type."', '".$entity_primary."', '0')");
		}
		
		// Code end for get phone numbers from the phone_number table. //
	
	}// Code end for get phone_number_id from entity_phone_number Table. //
	
	// Code start for get email_address_id from entity_email_address Table. //
	$sql_EEA = "SELECT * FROM entity_email_address WHERE entity_id='".$id."'";
	$result_EEA = mysqli_query($conn, $sql_EEA);
	while($row_EEA = mysqli_fetch_array($result_EPN)){
		echo "INSIDE WHILE LOOP OF ENTITY_EMAIL_ADDRESS";
		echo "<br>";
		print_r($row_EEA);
		echo "<br>";
	}		
	
	
	// Code start for get phone_number_id from entity_phone_number Table. //
	
	
	// Code start for create new id . //
	function getToken($length)
	{
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
	
	function crypto_rand_secure($min, $max)
    {
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
	// Code end for create new id . //
	
	*/
	
	
	session_start();
	//echo "INTO COPY ENTITY FIELDS.";
	//echo "<br>";
	$length=17;
	$new_id_for_entity= getToken($length);
	
	echo "ID FOR NEWLY CREATED ENTITY --- -- -- -- -- -- -- ".$new_id_for_entity;
	echo "<br>";

	date_default_timezone_set("Asia/Calcutta"); 
	$id= $_SESSION["entityID"];// Entity record id.
	$name= $_SESSION["name"];// Entity Name.
	$copyIntoEntity= $_POST['entityList']; // Selected Entity Name for copy paste.
	$copyIntoEntityTableName=strtolower(preg_replace('/\B([A-Z])/', '_$1', $copyIntoEntity));// lower case of selected entity name.
	$tableName=strtolower(preg_replace('/\B([A-Z])/', '_$1', $name)); // Table name of selected entity record to copy.
		
	echo "ENTITY ID= ".$id;
	echo "<br>";
	echo "ENTITY NAME= ".$name;
	echo "<br>";
	echo "SELECTED ENTITY= ".$copyIntoEntity;
	echo "<br>";
	echo "TABLE NAME FOR PASTE RECORD= ". $copyIntoEntityTableName;
	echo "<br>";
	echo "TABLE NAME FORM COPY RECORD= ".$tableName;
	echo "<br>";
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	
	$connForStoreData= $conn;
	if($connForStoreData->connect_error){
		die("Connection Failed ". $connForStoreData->connect_error);
	}
	
	$sql= "SELECT * FROM $tableName WHERE id= '".$id."'"; // Query for get data for selected record for copy.
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_array($result)){
		$entity_name= $row['name'];
		$entity_deleted= $row['deleted'];
		$entity_description= $row['description'];
		$entity_website= $row['website'];
		$entity_billing_address_street=$row['billing_address_street'];
		$entity_billing_address_city= $row['billing_address_city'];
		$entity_billing_address_state=$row['billing_address_state'];
		$entity_billing_address_country = $row['billing_address_country'];
		$entity_billing_address_postal_code = $row['billing_address_postal_code'];
		$entity_shipping_address_street = $row['shipping_address_street'];
		$entity_shipping_address_city = $row['shipping_address_city'];
		$entity_shipping_address_state = $row['shipping_address_state'];
		$entity_shipping_address_country = $row['shipping_address_country'];
		$entity_shipping_address_postal_code = $row['shipping_address_postal_code'];
		$entity_created_at = $row['created_at'];
		$entity_modified_at = $row['modified_at'];
		$entity_created_by_id = $row['created_by_id'];
		$entity_modified_by_id = $row['modified_by_id'];
		$entity_assigned_user_id = NULL;
		
		echo "<br>";
		print_r($row);
		echo "<br>";
		
		
		echo "<br>";
		echo "NEW ID FOR ENTITY==== ".$new_id_for_entity;
		echo "<br>";
		$_SESSION['new_entity_id']= $new_id_for_entity;
		mysqli_query($conn, "INSERT INTO $copyIntoEntityTableName (id, name, deleted, description, website, billing_address_street, billing_address_city, billing_address_state, billing_address_country, billing_address_postal_code, shipping_address_street, shipping_address_city, shipping_address_state, shipping_address_country, shipping_address_postal_code, created_at, modified_at, created_by_id, modified_by_id, assigned_user_id) VALUES ('".$new_id_for_entity."', '".$entity_name."', '".$entity_deleted."', '".$entity_description."', '".$entity_website."', '".$entity_billing_address_street."', '".$entity_billing_address_city."', '".$entity_billing_address_state."', '".$entity_billing_address_country."', '".$entity_billing_address_postal_code."', '".$entity_shipping_address_street."', '".$entity_shipping_address_city."', '".$entity_shipping_address_state."', '".$entity_shipping_address_country."', '".$entity_shipping_address_postal_code."', '".$entity_created_at."', '".$entity_modified_at."', '".$entity_created_by_id."', '".$entity_modified_by_id."', '".$entity_assigned_user_id."')");
	}
	
	
	
	
	/* include "copy_phone_number.php";
	include "copy_email_address.php";
	include "copy_notes.php";
	include "copy_attachments.php"; */
	
	
	
	// Code start for get phone_number_id from entity_phone_number Table. //
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	
	$sql_EPN = "SELECT * FROM entity_phone_number WHERE entity_id='".$id."'"; 
	$result_EPN = mysqli_query($conn, $sql_EPN);
		
	while($row_EPN = mysqli_fetch_array($result_EPN)){
		$entity_PN_ID= $row_EPN['phone_number_id'];	
		$entity_type= $row_EPN['entity_type'];	
		$entity_primary= $row_EPN['primary'];
		echo "<br>";
		print_r($row_EPN);
		echo "<br>";
		echo "PHONE NUMBER ID FROM ENTITY PHONE NUMBER = ". $entity_PN_ID;
		echo "<br>";
		echo "ENTITY TYPE FROM ENTITY PHONE NUMBER = ". $entity_type;
		echo "<br>";
				
		// Code start for get phone numbers from the phone_number table. //
		$sql_PN = "SELECT * FROM phone_number WHERE id='".$entity_PN_ID."'"; 
		$result_PN = mysqli_query($conn, $sql_PN);
		
		while($row_PN = mysqli_fetch_array($result_PN)){
			$phone_no= $row_PN['name'];
			$number_type= $row_PN['type'];
			
			echo "<br>";
			echo "PHONE NUMBER = ". $phone_no;
			echo "<br>";
			print_r($row_PN);
			echo "<br>";
			$new_PN_ID= getToken($length);
			echo "<br>";
			echo "<br>";
			echo "NEW ID FOR PHONE NUMBER = ". $new_PN_ID;
			echo "<br>";
			echo "<br>";
			mysqli_query($conn, "INSERT INTO phone_number(id, name, deleted, type) VALUES ('".$new_PN_ID."', '".$phone_no."', '0', '".$number_type."')");
			mysqli_query($conn, "INSERT INTO entity_phone_number (`entity_id`, `phone_number_id`, `entity_type`, `primary`, `deleted`) VALUES ('".$new_id_for_entity."', '".$new_PN_ID."', '".$entity_type."', '".$entity_primary."', '0')");
		}
		
		// Code end for get phone numbers from the phone_number table. //
		
	}// Code end for get phone_number_id from entity_phone_number Table. //	
	
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	
	// Code start for get email_address_id from entity_email_address Table. //
	$sql_EEA = "SELECT * FROM entity_email_address WHERE entity_id='".$id."'";
	$result_EEA = mysqli_query($conn, $sql_EEA);
	while($row_EEA = mysqli_fetch_array($result_EEA)){
		//echo "INSIDE WHILE LOOP OF ENTITY_EMAIL_ADDRESS";
		$entity_EAID= $row_EEA['email_address_id'];
		$entity_primary_EA= $row_EEA['primary'];
		
		echo "<br>";
		print_r($row_EEA);
		echo "<br>";
		echo "ID OF ENTITY EMAIL ADDRESS = ". $entity_EAID;
		echo "<br>";
			
		$sql_EA= "SELECT * FROM email_address WHERE id= '".$entity_EAID."'";
		$result_EA= mysqli_query($conn, $sql_EA);
		while($row_EA = mysqli_fetch_array($result_EA)){
			$name_EA= $row_EA['name'];
			$lower_EA= $row_EA['lower'];
			echo "<br>";
			print_r($row_EA);
			echo "<br>";
			echo "EMAIL ADDRESS = ". $name_EA;
			echo "<br>";
			echo "EMAIL ADDRESS IN LOWER = ".$lower_EA;
			echo "<br>";
			$new_ID_EA= getToken($length);
			mysqli_query($conn, "INSERT INTO email_address(id, name, deleted, lower, invalid, opt_out) VALUES ('".$new_ID_EA."', '".$name_EA."', '0', '".$lower_EA."', '0', '0')");
			
			echo "ID FOR ADDED EMAIL ADDRESS = ".$new_ID_EA;
			
			$new_ID_EEA = getToken($length);
			mysqli_query($conn, "INSERT INTO entity_email_address(`entity_id`, `email_address_id`, `entity_type`, `primary`, `deleted`) VALUES ('".$new_id_for_entity."', '".$new_ID_EA."', '".$entity_type."', '".$entity_primary_EA."', '0')");
			
			
			
			
		}			
	}	
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	
	$sql_note = "SELECT * FROM note where parent_id='".$id."' AND parent_type='".$name."'";
	$result_note = mysqli_query($conn, $sql_note); 
	
	while($row_note = mysqli_fetch_array($result_note)){
		echo "<br>";
		echo "<br>";
		print_r($row_note);
		echo "<br>";
		echo "<br>";
		
		$note_id= $row_note['id'];
		$_SESSION['note_id']= $note_id;
		
		
		$note_deleted = $row_note['deleted'];
		$note_post = $row_note['post'];		
		$note_data = $row_note['data'];
		$note_type = $row_note['type'];
		$note_target_type = $row_note['target_type'];
		$note_is_global = $row_note['is_global'];
		$note_is_internal = $row_note['is_internal'];
		$note_created_at = $row_note['created_at'];
		$note_modified_at = $row_note['modified_at'];
		$note_parent_id = $row_note['parent_id'];
		$note_parent_type = $row_note['parent_type'];
		$note_related_id = $row_note['related_id'];
		$note_related_type = $row_note['related_type'];
		$note_created_by_id = $row_note['created_by_id'];
		$note_related_type = $row_note['modified_by_id'];
		$note_super_parent_id = $row_note['super_parent_id'];
		$note_super_parent_type = $row_note['super_parent_type'];
		
		echo "<br>";
		echo "######## ".$note_deleted;
		echo "<br>";
		echo "######## ".$note_post;
		echo "<br>";
		echo "######## ".$note_data;
		echo "<br>";
		echo "######## ".$note_type;
		echo "<br>";
		echo "######## ".$note_target_type;
		echo "<br>";
		echo "######## ".$note_is_global;
		echo "<br>";
		echo "######## ".$note_is_internal;
		echo "<br>"; 
		echo "######## ".$note_created_at;
		echo "<br>"; 
		echo "######## ".$note_modified_at;
		echo "<br>";
		echo "######## ".$note_parent_id;
		echo "<br>";
		echo "######## ".$note_parent_type;
		echo "<br>";
		echo "######## ".$note_related_id;
		echo "<br>";
		echo "######## ".$note_related_type;
		echo "<br>";
		echo "######## ".$note_created_by_id;
		echo "<br>";
		echo "######## ".$note_related_type;
		echo "<br>";
		echo "######## ".$note_super_parent_id;
		echo "<br>";
		echo "######## ".$note_super_parent_type;
		echo "<br>";
		
		$new_id_N = getToken($length);
		
		echo "NEW ID FRO NOTE ADDED = ".$new_id_N;
		
		echo "<br>";
		echo "<br>";
		echo "NEW ENTITY ID TO CREATED NOTES. =#=#=#=#=#=#=#=#=#= ".$new_id_for_entity;
		echo "<br>";
		echo "<br>";
		
		mysqli_query($conn, "INSERT INTO note (`id`, `deleted`, `post`, `data`, `type`, `target_type`, `number`, `is_global`, `is_internal`, `created_at`, `modified_at`, `parent_id`, `parent_type`, `related_id`, `related_type`, `created_by_id`, `modified_by_id`, `super_parent_id`, `super_parent_type`)VALUES ('".$new_id_N."', '".$note_deleted."', '".$note_post."', '{}', 'Post', NULL, 0, '0', '0', '".$note_created_at."', '".$note_modified_at."', '".$new_id_for_entity."', '".$name."', NULL, NULL, '1', '1', NULL, NULL)");
		
	}
	
	
	// Code start for create new id . //
	function getToken($length)
	{
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
	
	function crypto_rand_secure($min, $max)
    {
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
	// Code end for create new id . //
	
?>