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

$account_id = $_GET['account_id'];
$sql1="select * from account_gst_details where account_id=".$account_id." and deleted='0'";
$result1=mysqli_query($conn,$sql1);
$gst_nums=mysqli_num_rows($result1);


// ========== Code to get a single email address of a customer ==================
$sql2="select * from entity_email_address where entity_id=".$account_id." and deleted='0' and entity_type='Account' order by id limit 1";
$result2=mysqli_query($conn,$sql2);
$email_entity_nums=mysqli_num_rows($result2);
if($email_entity_nums){
	$row2 = mysqli_fetch_assoc($result2);

	$sql3="select * from email_address where id='".$row2['email_address_id']."' and deleted='0'";
	$result3=mysqli_query($conn,$sql3);
	$email_address_nums=mysqli_num_rows($result3);
	if($email_address_nums){
		$row3 = mysqli_fetch_assoc($result3);
		$email = $row3['name'];
	}
	else{
		$email = '';
	}
}
else{
	$email = '';
}

// =========== Code to get a single phone number of a customer ==============
$sql4="select * from entity_phone_number where entity_id=".$account_id." and deleted='0' and entity_type='Account' order by id limit 1";
$result4=mysqli_query($conn,$sql4);
$phoneno_entity_nums=mysqli_num_rows($result4);
if($phoneno_entity_nums){
	$row4 = mysqli_fetch_assoc($result4);

	$sql5="select * from phone_number where id='".$row4['phone_number_id']."' and deleted='0'";
	$result5=mysqli_query($conn,$sql5);
	$phoneno_nums=mysqli_num_rows($result5);
	if($phoneno_nums){
		$row5 = mysqli_fetch_assoc($result5);
		$phoneno = $row5['numeric'];
	}
	else{
		$phoneno = '';
	}
}
else{
	$phoneno = '';
}

/*if($gst_nums == 1){
	$row1=mysqli_fetch_assoc($result1);
	echo json_encode(array('total_gst' => $gst_nums, 'gst_num' => $row1['acc_gst_no'], 'street' => $row1['acc_gst_street'], 'city' => $row1['acc_gst_city'], 'state' => $row1['acc_gst_state'], 'postal_code' => $row1['acc_gst_postalcode']));
}
else*/ if($gst_nums > 1)
{
	$str = '';
	$new_str = '';
	$s = 1;
	while($row1=mysqli_fetch_assoc($result1))
	{
		$str .= "<option value='".$row1['acc_gst_no']."' data-id='".$row1['id']."'>".$row1['acc_gst_no']."</option>";
		$s++;
	}
	if($str!='')
		echo json_encode(array('total_gst' => $gst_nums, 'str_opt' => $str));
	else
		echo "0";
}
else
{
	$row0=mysqli_fetch_assoc($result1);
	// echo '<pre>';print_r($row0);die;

	$sql1="select * from account where id=".$account_id." and deleted='0'";
	$result1=mysqli_query($conn,$sql1);
	$row01=mysqli_fetch_assoc($result1);
	$nums=mysqli_num_rows($result1);

	$sql30="select * from account where deleted='0'";
	$result30=mysqli_query($conn,$sql30);
	$row30=mysqli_fetch_assoc($result30);
	$nums20=mysqli_num_rows($result30);

	$name = $row01['name'];
	$panno = (isset($row01['panno'])) ? $row01['panno'] : '';
	$udyam_registration_no = (isset($row01['udyam_registration_no'])) ? $row01['udyam_registration_no'] : '';
	$street = ($row01['billing_address_street']) ? $row01['billing_address_street'] : '';
	$city = ($row01['billing_address_city']) ? $row01['billing_address_city'] : '';
	$state = ($row01['billing_address_state']) ? $row01['billing_address_state'] : '';
	$zipcode = ($row01['billing_address_postal_code']) ? $row01['billing_address_postal_code'] : '';
	$gst_num = ($row0['acc_gst_no']) ? $row0['acc_gst_no'] : '';

	$address = $street.$city.$state.$zipcode;

	$street_label = ($street) ? $street.', ' : '';
	$city_label = ($city) ? $city.', ' : '';
	$state_label = ($state) ? $state.' - ' : '';
	$zipcode_label = ($zipcode) ? $zipcode : '';

	if($address!=""){
		$address = $street_label.$city_label.$state_label.$zipcode_label;
	}

	echo json_encode(array('total_gst' => $nums, 'total_accounts' => $nums20, 'total_gst_nums' => $gst_nums, 'name' => $name, 'address' => $address, 'emailid' => $email, 'phoneno'=> $phoneno, 'gst_num' => $gst_num, 'panno' => $panno, 'udyam_registration_no' => $udyam_registration_no, 'street' => $street, 'city' => $city, 'state' => $state, 'postal_code' => $zipcode));
}
?>