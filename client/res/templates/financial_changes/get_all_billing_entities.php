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

$sql1="select * from billing_entity where deleted='0'";
$result1=mysqli_query($conn,$sql1);
$total_nums=mysqli_num_rows($result1);
// echo $total_nums;die;
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

	$sql2="select * from billing_entity_gstdetails where billing_entity_id='".$row1['id']."' and deleted='0'";
	$result2=mysqli_query($conn,$sql2);
	$nums=mysqli_num_rows($result2);
	
	if($nums == 1)
	{
		$row2=mysqli_fetch_assoc($result2);
		$address = $row1['addressstreet'].$row1['addresscity'].$row1['addressstate'].$row1['addresspostalcode'];
		$email = $row1['emailid'];
		$phone = $row1['phoneno'];

		if($email!="" && $phone!=""){
			$email_phone = $email.', '.$phone;
		}
		else if($email!="" && $phone==""){
			$email_phone = $email;
		}
		else if($email=="" && $phone!=""){
			$email_phone = $phone;
		}
		else {
			$email_phone = '';
		}

		$street = ($row1['addressstreet']) ? $row1['addressstreet'] : '';
		$city = ($row1['addresscity']) ? $row1['addresscity'] : '';
		$state = ($row1['addressstate']) ? $row1['addressstate'] : '';
		$zipcode = ($row1['addresspostalcode']) ? $row1['addresspostalcode'] : '';

		if($address!=""){
			$street_label = ($row1['addressstreet']) ? $row1['addressstreet'].', ' : '';
			$city_label = ($row1['addresscity']) ? $row1['addresscity'].', ' : '';
			$state_label = ($row1['addressstate']) ? $row1['addressstate'].' - ' : '';
			$zipcode_label = ($row1['addresspostalcode']) ? $row1['addresspostalcode'] : '';
			$address = $street_label.$city_label.$state_label.$zipcode_label;
		}
		else {
			$address = $street.','.$city.','.$state.'-'.$zipcode;
		}

		$gst_num = ($row2['gst_number']) ? $row2['gst_number'] : '';;
		$pan_num = ($row2['panno']) ? $row2['panno'] : ($row1['panno']) ? $row1['panno'] : '---';
		$udyam_num = ($row2['udyam_registration_no']) ? $row2['udyam_registration_no'] : ($row1['udyam_registration_no']) ? $row1['udyam_registration_no'] : '';

		echo json_encode(array('total_num' => $total_nums, 'name' => $row1['name'], 'address' => $address, 'emailid' => $email, 'phoneno' => $phone, 'gst_num' => $gst_num, 'pan_num' => $pan_num, 'udyam_no' => $udyam_num, 'street' => $street, 'city' => $city, 'state' => $state, 'postal_code' => $zipcode, 'total_gst' => $nums));
	}
	else if($nums > 1)
	{
		$str = '';
		$new_str = '';
		$s = 1;
		while($row3=mysqli_fetch_assoc($result2))
		{
			$str .= "<option value='".$row3['gst_number']."' data-id='".$row3['id']."'>".$row3['gst_number']."</option>";
			$s++;
		}

		$row2=mysqli_fetch_assoc($result2);
		// $address = $row1['addressstreet'].', '.$row1['addresscity'].', '.$row1['addressstate'].', '.$row1['addresspostalcode'];
		
		$street = ($row1['addressstreet']) ? $row1['addressstreet'].', ' : '';
		$city = ($row1['addresscity']) ? $row1['addresscity'].', ' : '';
		$state = ($row1['addressstate']) ? $row1['addressstate'].' - ' : '';
		$zipcode = ($row1['addresspostalcode']) ? $row1['addresspostalcode'] : '';

		$address = $street.$city.$state.$zipcode;

		$email = $row1['emailid'];
		$phone = $row1['phoneno'];
		$gst_num = ($row2['gst_number']) ? $row2['gst_number'] : '';;
		$pan_num = ($row2['panno']) ? $row2['panno'] : '---';
		$udyam_num = ($row2['udyam_registration_no']) ? $row2['udyam_registration_no'] : '';

		if($str!='')
			// echo json_encode(array('total_gst' => $nums, 'str_opt' => $str));
			echo json_encode(array('total_num' => $total_nums, 'total_gst' => $nums, 'name' => $row1['name'], 'address' => $address, 'emailid' => $email, 'phoneno' => $phone, 'gst_num' => $gst_num, 'pan_num' => $pan_num, 'udyam_no' => $udyam_num, 'street' => $street, 'city' => $city, 'state' => $state, 'postal_code' => $zipcode, 'total_gst' => $nums, 'str_opt' => $str));
		else
			echo "0";
	}
	else{

		$address = $row1['addressstreet'].$row1['addresscity'].$row1['addressstate'].$row1['addresspostalcode'];
		$email = $row1['emailid'];
		$phone = $row1['phoneno'];

		if($email!="" && $phone!=""){
			$email_phone = $email.', '.$phone;
		}
		else if($email!="" && $phone==""){
			$email_phone = $email;
		}
		else if($email=="" && $phone!=""){
			$email_phone = $phone;
		}
		else {
			$email_phone = '';
		}

		$street = ($row1['addressstreet']) ? $row1['addressstreet'] : '';
		$city = ($row1['addresscity']) ? $row1['addresscity'] : '';
		$state = ($row1['addressstate']) ? $row1['addressstate'] : '';
		$zipcode = ($row1['addresspostalcode']) ? $row1['addresspostalcode'] : '';

		if($address!=""){
			$street_label = ($row1['addressstreet']) ? $row1['addressstreet'].', ' : '';
			$city_label = ($row1['addresscity']) ? $row1['addresscity'].', ' : '';
			$state_label = ($row1['addressstate']) ? $row1['addressstate'].' - ' : '';
			$zipcode_label = ($row1['addresspostalcode']) ? $row1['addresspostalcode'] : '';
			$address = $street_label.$city_label.$state_label.$zipcode_label;
		}
		else {
			$address = $street.','.$city.','.$state.'-'.$zipcode;
		}

		$gst_num = ($row1['gst_number']) ? $row1['gst_number'] : '';;
		$pan_num = ($row1['panno']) ? $row1['panno'] : ($row1['panno']) ? $row1['panno'] : '---';
		$udyam_num = '';

		echo json_encode(array('total_num' => $total_nums, 'name' => $row1['name'], 'address' => $address, 'emailid' => $email, 'phoneno' => $phone, 'gst_num' => $gst_num, 'pan_num' => $pan_num, 'udyam_no' => $udyam_num, 'street' => $street, 'city' => $city, 'state' => $state, 'postal_code' => $zipcode, 'total_gst' => $nums));

		/*$address = '';
		$email = '';
		$phone = '';
		$gst_num = '';
		$pan_num = '';
		$udyam_num = '';*/
	}
}
else {
	echo "0";
}

?>