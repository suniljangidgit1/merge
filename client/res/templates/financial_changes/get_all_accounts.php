<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql1="select * from account where deleted='0'";
$result1=mysqli_query($conn,$sql1);
$total_nums=mysqli_num_rows($result1);
if($total_nums > 1){
	$str = '';
	$new_str = '';
	$s = 1;
	while($row1=mysqli_fetch_assoc($result1))
	{
		$str .= "<option value='".$row1['name']."' data-id='".$row1['id']."'>".$row1['name']."</option>";
		$s++;
	}
	if($str!='')
		echo json_encode(array('total_num' => $total_nums, 'str_opt' => $str));
	else
		echo "0";
}
else if($total_nums == 1)
{
	$row1=mysqli_fetch_assoc($result1);
	// echo '<pre>';print_r($row1);

	// Getting one email address for selected account
	$email_sql = "select entity_id, email_address_id from entity_email_address where entity_id='".$row1['id']."' and entity_type = 'Account' order by id desc limit 1";
	$result_email=mysqli_query($conn,$email_sql);
	$result_row=mysqli_fetch_assoc($result_email);
	$emailsql = "select name from email_address where id='".$result_row['email_address_id']."'";
	$resultemail=mysqli_query($conn,$emailsql);
	$resultrowemail=mysqli_fetch_assoc($resultemail);
	// echo $resultrowemail['name'];die;
	
	// Getting one phone number for selected account
	$phone_sql = "select entity_id, phone_number_id from entity_phone_number where entity_id='".$row1['id']."' and entity_type = 'Account' order by id desc limit 1";
	$result_phone=mysqli_query($conn,$phone_sql);
	$result_row=mysqli_fetch_assoc($result_phone);
	$phonesql = "select name from phone_number where id='".$result_row['phone_number_id']."'";
	$resultphone=mysqli_query($conn,$phonesql);
	$resultrowphone=mysqli_fetch_assoc($resultphone);
	
	$sql2="select * from account_gst_details where account_id='".$row1['id']."' and deleted='0'";
	$result2=mysqli_query($conn,$sql2);
	$nums=mysqli_num_rows($result2);
	if($nums == 1)
	{
		$row2=mysqli_fetch_assoc($result2);
		$address = $row2['acc_gst_street'].', '.$row2['acc_gst_city'].', '.$row2['acc_gst_state'].', '.$row2['acc_gst_postalcode'];

		$email = ($resultrowemail['name']) ? $resultrowemail['name'] : '';
		$phone = ($resultrowphone['name']) ? $resultrowphone['name'] : '';
		/*$gst_num = ($row2['gst_number']) ? $row2['gst_number'] : '';
		$pan_num = ($row2['panno']) ? $row2['panno'] : '---';
		$udyam_num = ($row2['udyam_registration_no']) ? $row2['udyam_registration_no'] : '';*/

		$gst_num = ($row2['acc_gst_no']) ? $row2['acc_gst_no'] : '';
		$pan_num = ($row1['panno']) ? $row1['panno'] : '';
		$udyam_num = ''; // ($row1['udyam_registration_no']) ? $row1['udyam_registration_no'] : '';

		echo json_encode(array('total_num' => $total_nums, 'total_accounts' => $total_nums, 'total_gst' => $nums, 'name' => $row1['name'], 'address' => $address, 'emailid' => $email, 'phoneno' => $phone, 'gst_num' => $gst_num, 'pan_num' => $pan_num, 'udyam_no' => $udyam_num, 'street' => $row1['shipping_address_street'], 'city' => $row1['shipping_address_city'], 'state' => $row1['shipping_address_state'], 'postal_code' => $row1['shipping_address_postal_code']));
	}
	else if($nums > 1)
	{
		$str = '';
		$new_str = '';
		$s = 1;
		while($row3=mysqli_fetch_assoc($result2))
		{
			$str .= "<option value='".$row3['acc_gst_no']."' data-id='".$row3['id']."'>".$row3['acc_gst_no']."</option>";
			$s++;
		}
		$row2=mysqli_fetch_assoc($result2);
		$street = ($row1['addressstreet']) ? $row1['addressstreet'].', ' : '';
		$city = ($row1['addresscity']) ? $row1['addresscity'].', ' : '';
		$state = ($row1['addressstate']) ? $row1['addressstate'].' - ' : '';
		$zipcode = ($row1['addresspostalcode']) ? $row1['addresspostalcode'] : '';

		$address = $street.$city.$state.$zipcode;

		$email = ($resultrowemail['name']) ? $resultrowemail['name'] : '';
		$phone = ($resultrowphone['name']) ? $resultrowphone['name'] : '';
		$gst_num = ($row2['gst_number']) ? $row2['gst_number'] : '';;
		$pan_num = ($row2['panno']) ? $row2['panno'] : '---';
		$udyam_num = ($row2['udyam_registration_no']) ? $row2['udyam_registration_no'] : '';

		if($str!='')
			// echo json_encode(array('total_gst' => $nums, 'str_opt' => $str));
			echo json_encode(array('total_num' => $total_nums, 'total_gst' => $nums, 'name' => $row1['name'], 'address' => $address, 'emailid' => $email, 'phoneno' => $phone, 'gst_num' => $gst_num, 'pan_num' => $pan_num, 'udyam_no' => $udyam_num, 'total_gst' => $nums, 'str_opt' => $str));
		else
			echo "0";
	}
	else
	{
		$row2=mysqli_fetch_assoc($result2);
		$street = ($row1['shipping_address_street']) ? $row1['shipping_address_street'].',' : '';
		$city = ($row1['shipping_address_city']) ? $row1['shipping_address_city'].', ' : '';
		$state = ($row1['shipping_address_state']) ? $row1['shipping_address_state'].'- ' : '';
		$zipcode = ($row1['shipping_address_postal_code']) ? $row1['shipping_address_postal_code'] : '';

		$address = $street.$city.$state.$zipcode;
		
		$email = ($resultrowemail['name']) ? $resultrowemail['name'] : '';
		$phone = ($resultrowphone['name']) ? $resultrowphone['name'] : '';
		$gst_num = ($row1['gstno']) ? $row1['gstno'] : '';
		$pan_num = ($row1['gstno']) ? $row1['gstno'] : '';
		$udyam_num = ($row2['udyam_registration_no']) ? $row2['udyam_registration_no'] : '';
		// echo 'total_num'.$total_nums.'name'.$row1['name'].'address'.$address;
		echo json_encode(array('total_num' => $total_nums, 'total_gst' => $nums, 'name' => $row1['name'], 'address' => $address, 'emailid' => $email, 'phoneno' => $phone, 'gst_num' => $gst_num, 'pan_num' => $pan_num, 'udyam_no' => $udyam_num));
	}
}
else{
	echo "0";
}

?>