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

$id = $_GET['id'];

$sql="select * from account_gst_details where id=".$id." and deleted='0'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$sql0="select * from account where id='".$row['account_id']."' and deleted='0'";
$result0=mysqli_query($conn,$sql0);
$row0=mysqli_fetch_assoc($result0);

$sql8="select * from account_gst_details where account_id='".$row0['id']."' and deleted='0'";
$result8=mysqli_query($conn,$sql8);
$row8=mysqli_fetch_assoc($result8);
$total_gst_nums=mysqli_num_rows($result8);

$sql1="select * from account_gst_details where id=".$id." and deleted='0'";
$result1=mysqli_query($conn,$sql1);
$nums=mysqli_num_rows($result1);

$name = $row0['name'];
$panno = (isset($row0['panno'])) ? $row0['panno'] : '';
$udyam_registration_no = '';

if($nums){
	
	$sql8="select * from account where deleted='0'";
	$result8=mysqli_query($conn,$sql8);
	$row8=mysqli_fetch_assoc($result8);
	$total_account_nums=mysqli_num_rows($result8);

	$row1=mysqli_fetch_assoc($result1);
	//echo '<pre>';print_r($row0);die;
	$street = ($row0['billing_address_street']!="") ? $row0['billing_address_street'] : $row1['acc_gst_street'];
	$city = ($row0['billing_address_city']!="") ? $row0['billing_address_city'] : $row1['acc_gst_city'];
	$state = ($row0['billing_address_state']!="") ? $row0['billing_address_state'] : $row1['acc_gst_state'];
	$zipcode = ($row0['billing_address_postal_code']!="") ? $row0['billing_address_postal_code'] : $row1['acc_gst_postalcode'];

	$address = $street.', '.$city.', '.$state.' - '.$zipcode;

	// ========== Code to get a single email address of a customer ==================
	$sql2="select * from entity_email_address where entity_id='".$row['account_id']."' and deleted='0' and entity_type='Account' order by id limit 1";
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
	$sql4="select * from entity_phone_number where entity_id='".$row['account_id']."' and deleted='0' and entity_type='Account' order by id limit 1";
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

	//echo json_encode(array('gst_num' => $row1['acc_gst_no'], 'street' => $row1['acc_gst_street'], 'city' => $row1['acc_gst_city'], 'state' => $row1['acc_gst_state'], 'postal_code' => $row1['acc_gst_postalcode']));

	echo json_encode(array('name' => $name, 'address' => $address, 'emailid' => $email, 'phoneno'=> $phoneno, 'gst_num' => $row1['acc_gst_no'], 'panno' => $panno, 'udyam_registration_no' => $udyam_registration_no, 'street' => $street, 'city' => $city, 'state' => $state, 'postal_code' => $zipcode, 'total_accounts' => $total_account_nums, 'total_gst_nums' => $total_gst_nums));
}
else
{
	echo "0";
}
?>