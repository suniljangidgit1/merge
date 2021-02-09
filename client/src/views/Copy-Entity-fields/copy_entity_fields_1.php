<?php
	session_start();
	//echo "<br>";
	//echo "Entity ID= ".$_SESSION["entityID"];
	//echo "<br>";
	$length=17;
	$id= $_SESSION["entityID"];
	$name= $_SESSION["name"];
	//echo "ENTITY NAME----------------------------= ".$name;
	
	$entity_type= $name;
	//echo "<br>";
	$copyIntoEntity= $_POST['entityList'];
	//echo "COPY INTO = > ".$copyIntoEntity;
	//echo "<br>";
	$copyIntoEntityTableName=strtolower(preg_replace('/\B([A-Z])/', '_$1', $copyIntoEntity));
	//echo "COPY INTO ENTITY TABLE=  = > ".$copyIntoEntityTableName;
	//echo "<br>";
	$tableName=strtolower(preg_replace('/\B([A-Z])/', '_$1', $name));
	//echo "<br>";
	//echo $tableName;
	//echo "<br>";
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	/* $entity_email_address_id= $row_for_get_email['email_address_id'];
	//$entity_type= $row_for_get_email['entity_type'];
	$_SESSION['entity_type']=$entity_type;
	echo "<br>";
	echo "ENTITY EMAIL ADDRESS ID = ".$entity_email_address_id;
	echo "<br>";
	echo "<br>";
	echo "ENTITY Type = ".$entity_type;
	echo "<br>"; */
	
	/* $sql_for_get_entity_email_address= "select * from email_address where id='".$entity_email_address_id."'";
	$result_for_get_entity_email_address= mysqli_query($conn, $sql_for_get_entity_email_address);
	$row_for_get_entity_email_address= mysqli_fetch_array($result_for_get_entity_email_address);
	
	$entity_email_address= $row_for_get_entity_email_address['lower'];
	
	echo "<br>";
	echo "ENTITY EMAIL ADDRESS=> ".$entity_email_address;
	echo "<br>";
	
	echo "ENTITY EMAIL ADDRESS IN LOWER = ". strtolower($entity_email_address); */
	
	/* $sql_for_get_phone_number= "select * from entity_phone_number where entity_id='".$id."'";
	$result_for_get_phone_number=mysqli_query($conn, $sql_for_get_phone_number);
	
	while($row_for_get_phone_number = mysqli_fetch_array($result_for_get_phone_number)){
		$phone_number_id = $row_for_get_phone_number['phone_number_id'];
		echo "<br>";
		echo "ENTITY PHONE NUMBER ID= ".$phone_number_id;
		echo "<br>";
		$sql_for_get_entity_phone_number = "select * from phone_number where id='".$phone_number_id."'";
		$result_for_get_entity_phone_number= mysqli_query($conn, $sql_for_get_entity_phone_number);
		$row_for_get_entity_phone_number= mysqli_fetch_array($result_for_get_entity_phone_number);	
		$entity_phone_number= $row_for_get_entity_phone_number['name'];
		$phone_number_type= $row_for_get_entity_phone_number['type'];
		$phone_number_id_new= getToken($length);
		$result_for_phone= mysqli_query($conn, "INSERT INTO phone_number (id, name, deleted, type) VALUES ('".$phone_number_id_new."', '".$entity_phone_number."', '0', 'Mobile')");
		
		if($result_for_phone){
			echo "<br>";
			echo "Record inserted successfully..";
			echo "<br>";
		}else{
			echo "<br>";
			echo "Record not inserted..";
			echo "<br>";
		}
		
			
	} */
	
	
	/* echo "<br>";
	echo "ENTITY PHONE NUMBER = ".$entity_phone_number;
	echo "<br>";
	
	echo "<br>";
	echo "ENTITY PHONE NUMBER TYPE = ".$phone_number_type;
	echo "<br>"; */
	
	
	
	$new_id_for_entity= getToken($length);
	
	/* echo "<br>";
	echo "NEW ID FOR ENTITY = ".$new_id_for_entity;
	echo "<br>";
	 */
	
	$new_id_for_email_address= getToken($length);
	
	/* echo "<br>";
	echo "NEW ID FOR EMAIL ADDRESS = ".$new_id_for_email_address;
	echo "<br>";
	 */
	$new_id_for_phone_number= getToken($length);
	
	/* echo "<br>";
	echo "NEW ID FOR PHONE NUMBER  = ".$new_id_for_phone_number;
	echo "<br>";
	 */
	$sql= "SELECT * from $tableName WHERE id='".$id."'";
	$result= mysqli_query($conn, $sql);
	
	$row= mysqli_fetch_array($result);
	
	$name= mysqli_real_escape_string($conn,$row['name']);
	$deleted= $row['deleted'];
	$description= mysqli_real_escape_string($conn,$row['description']);
	$website= $row['website'];
	$billing_address_street=mysqli_real_escape_string($conn,$row['billing_address_street']);
	$billing_address_city= mysqli_real_escape_string($conn,$row['billing_address_city']);
	$billing_address_state=mysqli_real_escape_string($conn,$row['billing_address_state']);
	$billing_address_country = mysqli_real_escape_string($conn,$row['billing_address_country']);
	$billing_address_postal_code = $row['billing_address_postal_code'];
	$shipping_address_street = mysqli_real_escape_string($conn,$row['shipping_address_street']);
	$shipping_address_city = mysqli_real_escape_string($conn,$row['shipping_address_city']);
	$shipping_address_state = mysqli_real_escape_string($conn,$row['shipping_address_state']);
	$shipping_address_country = mysqli_real_escape_string($conn,$row['shipping_address_country']);
	$shipping_address_postal_code = $row['shipping_address_postal_code'];
	$created_at = $row['created_at'];
	$modified_at = $row['modified_at'];
	$created_by_id = $row['created_by_id'];
	$modified_by_id = $row['modified_by_id'];
	$assigned_user_id = $row['assigned_user_id'];
	
	

		
		$result_for_entity_data= mysqli_query($conn, "INSERT INTO $copyIntoEntityTableName (id, name, deleted, description, website, billing_address_street, billing_address_city, billing_address_state, billing_address_country, billing_address_postal_code, shipping_address_street, shipping_address_city, shipping_address_state, shipping_address_country, shipping_address_postal_code, created_at, modified_at, created_by_id, modified_by_id, assigned_user_id) VALUES ('".$new_id_for_entity."', '".$name."', '".$deleted."', '".$description."', '".$website."', '".$billing_address_street."', '".$billing_address_city."', '".$billing_address_state."', '".$billing_address_country."', '".$billing_address_postal_code."', '".$shipping_address_street."', '".$shipping_address_city."', '".$shipping_address_state."', '".$shipping_address_country."', '".$shipping_address_postal_code."', '".$created_at."', '".$modified_at."', '".$created_by_id."', '".$modified_by_id."', '".$assigned_user_id."')");
		
		if($result_for_entity_data){
			/* echo "<br>";
			echo "Record inserted successfully";
			echo "<br>"; */
		}else{
			/* echo "<br>";
			echo "Record not inserted";
			echo "<br>";
			echo "MY SQL ERROR = ". mysqli_error($conn); */
		}
	
	
	/// Code for get Email Address ...
	
	// Code start for get email_address_id from entity_email_address Table. //
	$sql_EEA = "SELECT * FROM entity_email_address WHERE entity_id='".$id."'";
	$result_EEA = mysqli_query($conn, $sql_EEA);
	while($row_EEA = mysqli_fetch_array($result_EEA)){
		//echo "INSIDE WHILE LOOP OF ENTITY_EMAIL_ADDRESS";
		$entity_EAID= $row_EEA['email_address_id'];
		$entity_primary_EA= $row_EEA['primary'];
		
		/* echo "<br>";
		print_r($row_EEA);
		echo "<br>";
		echo "ID OF ENTITY EMAIL ADDRESS = ". $entity_EAID;
		echo "<br>"; */
			
		$sql_EA= "SELECT * FROM email_address WHERE id= '".$entity_EAID."'";
		$result_EA= mysqli_query($conn, $sql_EA);
		while($row_EA = mysqli_fetch_array($result_EA)){
			$name_EA= $row_EA['name'];
			$lower_EA= $row_EA['lower'];
			/* echo "<br>";
			print_r($row_EA);
			echo "<br>";
			echo "EMAIL ADDRESS = ". $name_EA;
			echo "<br>";
			echo "EMAIL ADDRESS IN LOWER = ".$lower_EA;
			echo "<br>"; */
			$new_ID_EA= getToken($length);
			mysqli_query($conn, "INSERT INTO email_address(id, name, deleted, lower, invalid, opt_out) VALUES ('".$new_ID_EA."', '".$name_EA."', '0', '".$lower_EA."', '0', '0')");
			
			//echo "ID FOR ADDED EMAIL ADDRESS = ".$new_ID_EA;
			
			$new_ID_EEA = getToken($length);
			mysqli_query($conn, "INSERT INTO entity_email_address(`entity_id`, `email_address_id`, `entity_type`, `primary`, `deleted`) VALUES ('".$new_id_for_entity."', '".$new_ID_EA."', '".$copyIntoEntity."', '".$entity_primary_EA."', '0')");
		
		}			
	}		
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	//// CODE START FOR GET PONE NUMBER/........
	
	$sql_EPN = "SELECT * FROM entity_phone_number WHERE entity_id='".$id."'"; 
	$result_EPN = mysqli_query($conn, $sql_EPN);
		
	while($row_EPN = mysqli_fetch_array($result_EPN)){
		$entity_PN_ID= $row_EPN['phone_number_id'];	
		//$entity_type= $row_EPN['entity_type'];	
		$entity_primary= $row_EPN['primary'];
		/* echo "<br>";
		print_r($row_EPN);
		echo "<br>";
		echo "PHONE NUMBER ID FROM ENTITY PHONE NUMBER = ". $entity_PN_ID;
		echo "<br>";
		echo "ENTITY TYPE FROM ENTITY PHONE NUMBER = ". $entity_type;
		echo "<br>"; */
				
		// Code start for get phone numbers from the phone_number table. //
		$sql_PN = "SELECT * FROM phone_number WHERE id='".$entity_PN_ID."'"; 
		$result_PN = mysqli_query($conn, $sql_PN);
		
		while($row_PN = mysqli_fetch_array($result_PN)){
			$phone_no= $row_PN['name'];
			$number_type= $row_PN['type'];
			
			/* echo "<br>";
			echo "PHONE NUMBER = ". $phone_no;
			echo "<br>";
			print_r($row_PN);
			echo "<br>"; */
			$new_PN_ID= getToken($length);
			/* echo "<br>";
			echo "<br>";
			echo "NEW ID FOR PHONE NUMBER = ". $new_PN_ID;
			echo "<br>";
			echo "<br>"; */
			mysqli_query($conn, "INSERT INTO phone_number(id, name, deleted, type) VALUES ('".$new_PN_ID."', '".$phone_no."', '0', '".$number_type."')");
			mysqli_query($conn, "INSERT INTO entity_phone_number (`entity_id`, `phone_number_id`, `entity_type`, `primary`, `deleted`) VALUES ('".$new_id_for_entity."', '".$new_PN_ID."', '".$copyIntoEntity."', '".$entity_primary."', '0')");
			/* echo "<br>";echo "<br>";echo "<br>";
			
			echo "MYSQL ERROR WHILE INSERT PHONE NUMBER = ". mysqli_error($conn);
			
			echo "<br>";echo "<br>"; */
			
		}
		
		// Code end for get phone numbers from the phone_number table. //
		
	}// Code end for get phone_number_id from entity_phone_number Table. //	
	
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/* mysqli_query($conn, "INSERT INTO entity_email_address(`entity_id`, `email_address_id`, `entity_type`, `primary`, `deleted`) VALUES ('".$new_id_for_entity."', '".$new_id_for_email_address."', '".$copyIntoEntity."', '1', '0')");
	
	mysqli_query($conn, "INSERT INTO email_address(id, name, deleted, lower, invalid, opt_out)VALUES('".$new_id_for_email_address."', '".$entity_email_address."', '0', '".strtolower($entity_email_address)."', '0', '0')"); */
	
	/* mysqli_query($conn, "INSERT INTO entity_phone_number (`entity_id`, `phone_number_id`, `entity_type`, `primary`, `deleted`)VALUES ('".$new_id_for_entity."', '".$phone_number_id."', '".$copyIntoEntity."', '1', '0') ");
	
    mysqli_query($conn, "INSERT INTO phone_number (name, deleted, type) VALUES ('".$entity_phone_number."', '0', '$phone_number_type')"); */
	
	
	$sql_for_get_all_note_of_entity= "select * from note where parent_id='".$id."' AND parent_type='".$entity_type."'";
	$result_for_get_all_note_of_entity= mysqli_query($conn, $sql_for_get_all_note_of_entity);
	$note_id= null;
	
	if($result_for_get_all_note_of_entity){
	
		while($row_for_get_all_nnnnote_of_entity= mysqli_fetch_array($result_for_get_all_note_of_entity)){
			
			$note_id= $row_for_get_all_nnnnote_of_entity['id'];
			/* echo "<br>";
			echo "OLD NOTE ID === ".$note_id; 
			
			echo "<br>"; */
			$id_for_note= getToken($length);
			/* echo "<br>";
			echo "ID FOR NEW NOTE= ".$id_for_note; */
			
			$_SESSION['id_for_note']= $id_for_note;
			
			$deleted=0;
			/* echo "<br>";
			echo "DELETED = ".$deleted; */
			$post= mysqli_real_escape_string($conn, $row_for_get_all_nnnnote_of_entity['post']);
			/* echo "<br>";
			echo "POST = ".$post; */
			$data= $row_for_get_all_nnnnote_of_entity['data'];
			/* echo "<br>";
			echo "DATA = ".$data; */
			$type= $row_for_get_all_nnnnote_of_entity['type'];
			/* echo "<br>";
			echo "TYPE = ".$type; */
			$target_type= $row_for_get_all_nnnnote_of_entity['target_type'];
			/* echo "<br>";
			echo "TARGET TYPE = ".$target_type; */
			$number= $row_for_get_all_nnnnote_of_entity['number'];
			/* echo "<br>";
			echo "NUMBER = ".$number; */
			$is_global= $row_for_get_all_nnnnote_of_entity['is_global'];
			/* echo "<br>";
			echo "IS GLOBAL = ".$is_global; */
			$is_internal= $row_for_get_all_nnnnote_of_entity['is_internal'];
			/* echo "<br>";
			echo "IS INTERNAL = ".$is_internal; */
			$created_at=$row_for_get_all_nnnnote_of_entity['created_at'];
			/* echo "<br>";
			echo "CREATED AT = ".$created_at; */
			$modified_at=$row_for_get_all_nnnnote_of_entity['modified_at'];
			/* echo "<br>";
			echo "MODIFIED AT = ".$modified_at; */
			$parent_id= $new_id_for_entity;
			/* echo "<br>";
			echo "PARENT ID = ".$parent_id; */
			$parent_type= $copyIntoEntity;
			/* echo "<br>";
			echo "PARENT TYPE = ".$parent_type; */
			$related_id= $row_for_get_all_nnnnote_of_entity['related_id'];
			/* echo "<br>";
			echo "RELATED ID = ".$related_id; */
			$related_type=$row_for_get_all_nnnnote_of_entity['related_type'];
			/* echo "<br>";
			echo "RELATED TYPE = ".$related_type; */
			$created_by_id=$row_for_get_all_nnnnote_of_entity['created_by_id'];
			/* echo "<br>";
			echo "CREATED BY ID = ".$created_by_id; */
			$modified_by_id=$row_for_get_all_nnnnote_of_entity['modified_by_id'];
			/* echo "<br>";
			echo "MODIFIED BY ID = ".$modified_by_id; */
			$super_parent_id=$row_for_get_all_nnnnote_of_entity['super_parent_id'];
			/* echo "<br>";
			echo "SUPER PARENT ID = ".$super_parent_id; */
			$super_parent_type=$row_for_get_all_nnnnote_of_entity['super_parent_type'];
			/* echo "<br>";
			echo "SUPER PARENT TYPE = ".$super_parent_type; */
			
			$sql_for_number= "SELECT Max(number) from note";
			$result_for_number= mysqli_query($conn, $sql_for_number);
			
			$row_for_number= mysqli_fetch_array($result_for_number);
			
			$max_number_val= $row_for_number['0'];
			
			$max_number_val=$max_number_val+1;
			
			/* echo "MAX VALUE OF NUMBER = ". $max_number_val; */
		   
			 $insert= mysqli_query($conn, "INSERT INTO note (`id`, `deleted`, `post`, `data`, `type`, `target_type`, `number`, `is_global`, `is_internal`, `created_at`, `modified_at`, `parent_id`, `parent_type`, `related_id`, `related_type`, `created_by_id`, `modified_by_id`, `super_parent_id`, `super_parent_type`)VALUES ('".$id_for_note."', '0', '".$post."', '{}', '".$type."', '', '".$max_number_val."', '0', '0', '".$created_at."', '".$modified_at."', '".$parent_id."', '".$parent_type."', '', '', '".$created_by_id."', '".$modified_by_id."', '', '')");
			/* echo "<br>"; */
			if($insert){
				/* echo "Record Inserted"; */
			}else{
				/* echo "Record not inserted..."; */
			}
			
			
	 
			 //// Code start for get Attachment ....
			/// CODE START FOR GET ATTACHMENT ....................
			
			
			$sql_attachment = "select * from attachment where parent_id='".$note_id."' AND parent_type='Note'";
			$result_attachment= mysqli_query($conn, $sql_attachment);
			
			if($result_attachment){
			
				while($row_attachment = mysqli_fetch_array($result_attachment)){
					/* echo "<h1>ATTACHMENT CODE START.....</h1>";
					echo "<br>";
					echo "<br>";
					//print_r($row_attachment);
					echo "<br>";
					echo "<br>"; */
					$attachment_id= $row_attachment['id'];
					$attachment_name= $row_attachment['name'];
					$attachment_deleted= $row_attachment['deleted'];
					$attachment_type= $row_attachment['type'];
					$attachment_size= $row_attachment['size'];
					$attachment_source_id= $row_attachment['source_id'];
					$attachment_field= $row_attachment['field'];
					$attachment_created_at= $row_attachment['created_at'];
					$attachment_role= $row_attachment['role'];
					$attachment_storage= $row_attachment['storage'];
					$attachment_storage_file_path= $row_attachment['storage_file_path'];
					$attachment_global= $row_attachment['global'];
					$attachment_parent_id= $new_id_for_entity;
					$attachment_parent_type= $name;
					$attachment_related_id= $row_attachment['related_id'];
					$attachment_related_type= $row_attachment['related_type'];
					$attachment_created_by_id= $row_attachment['created_by_id'];
					
					/* echo "<br>";
					echo "Attachement ID= ".$attachment_id;
					echo "<br>";
					echo "Attachement Name= ".$attachment_name;
					echo "<br>";
					echo "Attachement Deleted= ".$attachment_deleted;
					echo "<br>";
					echo "Attachment Type= ".$attachment_type;
					echo "<br>";
					echo "Attachment Size= ".$attachment_size;
					echo "<br>";
					echo "Attachment Source ID= ".$attachment_source_id;
					echo "<br>";
					echo "Attachment Filed= ". $attachment_field;
					echo "<br>";
					echo "Attachment Created At= ". $attachment_created_at;
					echo "<br>";
					echo "Attachment Role= ".$attachment_role;
					echo "<br>";
					echo "Attachment Storage= ".$attachment_storage;
					echo "<br>";
					echo "Attachment Global= ".$attachment_global;
					echo "<br>";
					echo "Attachment Parent Id= ".$attachment_parent_id;
					echo "<br>";
					echo "Attachment Parent Type= ".$attachment_parent_type;
					echo "<br>";
					echo "Attachment Related ID= ".$attachment_related_id;
					echo "<br>";
					echo "Attachment Related Type= ".$attachment_related_type;
					echo "<br>";
					echo "Attachment Created By ID= ".$attachment_created_by_id; */
					
					$new_id_attachment= getToken($length);
					
					/* echo "<br>";
					echo "NEW ID FOR ATTACHMENT = ". $new_id_attachment;
					echo "<br>";
					echo "<br>"; */
					copy("../../../../data/upload/".$attachment_id, "../../../../data/upload/".$new_id_attachment);
					$result_attachment=mysqli_query($conn, "INSERT INTO attachment (id, name, deleted, type, size, source_id, field, created_at, role, storage, storage_file_path, global, parent_id, parent_type, related_id, related_type, created_by_id) VALUES ('".$new_id_attachment."', '".$attachment_name."', '".$attachment_deleted."', '".$attachment_type."', '".$attachment_size."', '".$attachment_source_id."', '".$attachment_field."', '".$attachment_created_at."', '".$attachment_role."', '".$attachment_storage."', '".$attachment_storage_file_path."', '".$attachment_global."', '".$id_for_note."', 'Note', '".$attachment_related_id."', '".$attachment_related_type."', '".$attachment_created_by_id."')");
					
					if($result_attachment){
						/* echo "<br>";
						echo "Attachment Added Successfully !!"; */
					}else{
						/* echo "<br>";
						echo "Attachment Not Added  !!"; */
					}
					
				}  
			}else{
				/* echo "There is no attachment"; */
			}			
			// Code end for get Attachment.....  
			
		}
	}else{
		/* echo "There is no strems for this record"; */
	}
	//include "copy_attachments.php";
	
	/* echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "Name=>  ".$name;
	echo "<br>";
	echo "Description=>  ".$description;
	echo "<br>";
	echo "Website=>  ".$website;
	echo "<br>";
	echo "Billing Address Street=>  ".$billing_address_street;
	echo "<br>";
	echo "Billing Address City=>  ".$billing_address_city;
	echo "<br>";
	echo "Billing Address State=>  ".$billing_address_state;
	echo "<br>";
	echo "Billing Address Country=>  ".$billing_address_country;
	echo "<br>";
	echo "Billing Address Postal Code=>  ".$billing_address_postal_code;
	echo "<br>";
	echo "Shipping Address Street=>  ".$shipping_address_street;
	echo "<br>";
	echo "Shipping Address City=>  ".$shipping_address_city;
	echo "<br>";
	echo "Shipping Address State=>  ".$shipping_address_state;
	echo "<br>";
	echo "Shipping Address Country=>  ".$shipping_address_country;
	echo "<br>";
	echo "Shipping Address Postal Code=>  ".$shipping_address_postal_code;
	echo "<br>";
	echo "Created At=>  ".$created_at;
	echo "<br>";
	echo "Modified At=>  ".$modified_at;
	echo "<br>";
	echo "Created By Id=>  ".$created_by_id;
	echo "<br>";
	echo "Modified By Id=>  ".$modified_by_id;
	echo "<br>";
	echo "Assigned User Id=>  ".$assigned_user_id;
	echo "<br>";  */

	
	
	
	
	
	
	header('location:http://fincrm.net/finnovaadvisory/#'.$copyIntoEntity);
	
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
	
?>