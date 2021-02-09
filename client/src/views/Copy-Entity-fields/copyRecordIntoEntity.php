<?php
	session_start();
	$length=17;
	date_default_timezone_set("Asia/Calcutta"); 
	$id= $_SESSION["entityID"];
	$name= $_SESSION["name"];
	$copyIntoEntity= $_POST['entityList'];
	$copyIntoEntityTableName=strtolower(preg_replace('/\B([A-Z])/', '_$1', $copyIntoEntity));
	$tableName=strtolower(preg_replace('/\B([A-Z])/', '_$1', $name));
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$sql_for_get_entity_email="select * from entity_email_address where entity_id='".$id."'";
	$result_for_get_email=mysqli_query($conn, $sql_for_get_entity_email);
	$row_for_get_email=mysqli_fetch_array($result_for_get_email);
	$entity_email_address_id= $row_for_get_email['email_address_id'];
	$entity_type= $row_for_get_email['entity_type'];
	$sql_for_get_entity_email_address= "select * from email_address where id='".$entity_email_address_id."'";
	$result_for_get_entity_email_address= mysqli_query($conn, $sql_for_get_entity_email_address);
	$row_for_get_entity_email_address= mysqli_fetch_array($result_for_get_entity_email_address);
	$entity_email_address= $row_for_get_entity_email_address['lower'];
	$sql_for_get_phone_number= "select * from entity_phone_number where entity_id='".$id."'";
	$result_for_get_phone_number=mysqli_query($conn, $sql_for_get_phone_number);
	$row_for_get_phone_number = mysqli_fetch_array($result_for_get_phone_number);
	$phone_number_id = $row_for_get_phone_number['phone_number_id'];
	$sql_for_get_entity_phone_number = "select * from phone_number where id='".$phone_number_id."'";
	$result_for_get_entity_phone_number= mysqli_query($conn, $sql_for_get_entity_phone_number);
	$row_for_get_entity_phone_number= mysqli_fetch_array($result_for_get_entity_phone_number);
	$entity_phone_number= $row_for_get_entity_phone_number['name'];
	$phone_number_type= $row_for_get_entity_phone_number['type'];
	$new_id_for_entity= getToken($length);
	$new_id_for_email_address= getToken($length);
	$new_id_for_phone_number= getToken($length);
	$sql= "SELECT * from $tableName WHERE id='".$id."'";
	$result= mysqli_query($conn, $sql);
	$row= mysqli_fetch_array($result);
	$name= $row['name'];
	$deleted= $row['deleted'];
	$description= $row['description'];
	$website= $row['website'];
	$billing_address_street=$row['billing_address_street'];
	$billing_address_city= $row['billing_address_city'];
	$billing_address_state=$row['billing_address_state'];
	$billing_address_country = $row['billing_address_country'];
	$billing_address_postal_code = $row['billing_address_postal_code'];
	$shipping_address_street = $row['shipping_address_street'];
	$shipping_address_city = $row['shipping_address_city'];
	$shipping_address_state = $row['shipping_address_state'];
	$shipping_address_country = $row['shipping_address_country'];
	$shipping_address_postal_code = $row['shipping_address_postal_code'];
	$created_at = $row['created_at'];
	$modified_at = $row['modified_at'];
	$created_by_id = $row['created_by_id'];
	$modified_by_id = $row['modified_by_id'];
	$assigned_user_id = $row['assigned_user_id'];
	
	mysqli_query($conn, "INSERT INTO $copyIntoEntityTableName (id, name, deleted, description, website, billing_address_street, billing_address_city, billing_address_state, billing_address_country, billing_address_postal_code, shipping_address_street, shipping_address_city, shipping_address_state, shipping_address_country, shipping_address_postal_code, created_at, modified_at, created_by_id, modified_by_id, assigned_user_id) VALUES ('".$new_id_for_entity."', '".$name."', '".$deleted."', '".$description."', '".$website."', '".$billing_address_street."', '".$billing_address_city."', '".$billing_address_state."', '".$billing_address_country."', '".$billing_address_postal_code."', '".$shipping_address_street."', '".$shipping_address_city."', '".$shipping_address_state."', '".$shipping_address_country."', '".$shipping_address_postal_code."', '".$created_at."', '".$modified_at."', '".$created_by_id."', '".$modified_by_id."', '".$assigned_user_id."')");
	if($new_id_for_email_address!=""){
	mysqli_query($conn, "INSERT INTO entity_email_address(`entity_id`, `email_address_id`, `entity_type`, `primary`, `deleted`) VALUES ('".$new_id_for_entity."', '".$new_id_for_email_address."', '".$copyIntoEntity."', '1', '0')");
	}
	if($entity_email_address!=""){
	mysqli_query($conn, "INSERT INTO email_address(id, name, deleted, lower, invalid, opt_out)VALUES('".$new_id_for_email_address."', '".$entity_email_address."', '0', '".strtolower($entity_email_address)."', '0', '0')");
	}
	if($phone_number_id!=""){
	mysqli_query($conn, "INSERT INTO entity_phone_number (`entity_id`, `phone_number_id`, `entity_type`, `primary`, `deleted`)VALUES ('".$new_id_for_entity."', '".$phone_number_id."', '".$copyIntoEntity."', '1', '0') ");
	}
	if($phone_number_type!=""){
    mysqli_query($conn, "INSERT INTO phone_number (name, deleted, type) VALUES ('".$entity_phone_number."', '0', '$phone_number_type')"); 
	}
	
	$sql_for_get_all_note_of_entity= "select * from note where parent_id='".$id."' AND parent_type='".$_SESSION["name"]."'";
	$result_for_get_all_note_of_entity= mysqli_query($conn, $sql_for_get_all_note_of_entity);
	$row_for_get_all_note_of_entity= mysqli_fetch_array($result_for_get_all_note_of_entity);
	
	while($row_for_get_all_note_of_entity= mysqli_fetch_array($result_for_get_all_note_of_entity)){
	    $note_id=$row_for_get_all_note_of_entity['id'];
	    $id_for_note= getToken($length);
	    $deleted=0;
	    $post= $row_for_get_all_note_of_entity['post'];
	    $data= $row_for_get_all_note_of_entity['data'];
	    $type= $row_for_get_all_note_of_entity['type'];
	    $target_type= $row_for_get_all_note_of_entity['target_type'];
	    $number= $row_for_get_all_note_of_entity['number'];
	    $is_global= $row_for_get_all_note_of_entity['is_global'];
	    $is_internal= $row_for_get_all_note_of_entity['is_internal'];
	    $created_at=date('Y-m-d g:i:s');
	    $modified_at=date('Y-m-d g:i:s');
	    $parent_id= $new_id_for_entity;
	    $parent_type= $copyIntoEntity;
	    $related_id= $row_for_get_all_note_of_entity['related_id'];
	    $related_type=$row_for_get_all_note_of_entity['related_type'];
	    $created_by_id=$row_for_get_all_note_of_entity['created_by_id'];
	    $modified_by_id=$row_for_get_all_note_of_entity['modified_by_id'];
	    $super_parent_id=$row_for_get_all_note_of_entity['super_parent_id'];
	    $super_parent_type=$row_for_get_all_note_of_entity['super_parent_type'];
	    //mysqli_query($conn, "INSERT INTO note (`id`, `deleted`, `post`, `data`, `type`, `target_type`, `number`, `is_global`, `is_internal`, `created_at`, `modified_at`, `parent_id`, `parent_type`, `related_id`, `related_type`, `created_by_id`, `modified_by_id`, `super_parent_id`, `super_parent_type`) VALUES ('".$id_for_note."', '".$deleted."', '".$post."', '".$data."', '".$type."', '".$target_type."', '".$number."', '".$is_global."', '".$is_internal."', '".$created_at."', '".$modified_at."', '".$parent_id."', '".$parent_type."', '".$related_id."', '".$related_type."', '".$created_by_id."', '".$modified_by_id."', '".$super_parent_id."', '".$super_parent_type."')");
	    mysqli_query($conn, "INSERT INTO note (`id`, `deleted`, `post`, `data`, `type`, `target_type`, `number`, `is_global`, `is_internal`, `created_at`, `modified_at`, `parent_id`, `parent_type`, `related_id`, `related_type`, `created_by_id`, `modified_by_id`, `super_parent_id`, `super_parent_type`)VALUES ('".$id_for_note."', '".$deleted."', '".$post."', '{}', 'Post', '', '', '0', '0', '".$created_at."', '".$modified_at."', '".$parent_id."', '".$parent_type."', '', '', '".$created_by_id."', '1', '', '')");
	    $sql_for_get_attachment= "select * from attachment where parent_id='".$note_id."' AND parent_type='Note'";
        $result_for_get_attachment= mysqli_query($conn, $sql_for_get_attachment);
	    
	    while($row_for_get_attachment= mysqli_fetch_array($result_for_get_attachment)){
            $attachment_id_for_copy= $row_for_get_attachment['id'];
            $attachment_id=getToken($length);
            $attachment_name=$row_for_get_attachment['name'];
            $attachment_deleted=$row_for_get_attachment['deleted'];
            $attachment_type=$row_for_get_attachment['type'];
            $attachment_size=$row_for_get_attachment['size'];
            $attachment_source_id=$row_for_get_attachment['source_id'];
            $attachment_field=$row_for_get_attachment['field'];
            $attachment_created_at=$row_for_get_attachment['created_at'];
            $attachment_role=$row_for_get_attachment['role'];
            $attachment_storage=$row_for_get_attachment['storage'];
            $attachment_storage_file_path=$row_for_get_attachment['storage_file_path'];
            $attachment_global=$row_for_get_attachment['global'];
            $attachment_parent_id=$id_for_note;
            $attachment_parent_type=$row_for_get_attachment['parent_type'];
            $attachment_related_id=$row_for_get_attachment['related_id'];
            $attachment_related_type=$row_for_get_attachment['related_type'];
            $attachment_created_by_id=$row_for_get_attachment['created_by_id'];
            
            copy("../../../../data/upload/".$attachment_id_for_copy, "../../../../data/upload/".$attachment_id);
            mysqli_query($conn, "INSERT INTO attachment(id, name, deleted, type, size, source_id, field, created_at, role, storage, storage_file_path, global, parent_id, parent_type, related_id, related_type, created_by_id) VALUES ('".$attachment_id."', '".$attachment_name."', '".$attachment_deleted."', '".$attachment_type."', '".$attachment_size."', '".$attachment_source_id."', '".$attachment_field."', '".$attachment_created_at."', '".$attachment_role."', '".$attachment_storage."', '".$attachment_storage_file_path."', '".$attachment_global."', '".$attachment_parent_id."', '".$attachment_parent_type."', '".$attachment_related_id."', '".$attachment_related_type."', '".$attachment_created_by_id."')");       
        }
	}
    header('location:success.html');
	
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