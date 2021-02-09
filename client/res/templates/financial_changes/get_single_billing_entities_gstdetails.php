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

$sql="select * from billing_entity_gstdetails where id=".$id." and deleted='0'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$sql0="select * from billing_entity where id='".$row['billing_entity_id']."' and deleted='0'";
$result0=mysqli_query($conn,$sql0);
$row0=mysqli_fetch_assoc($result0);
//echo '<pre>';print_r($row0);echo '</pre>';die;
$sql8="select * from billing_entity_gstdetails where billing_entity_id='".$row['billing_entity_id']."' and deleted='0'";
$result8=mysqli_query($conn,$sql8);
$row8=mysqli_fetch_assoc($result8);
$total_gst_nums=mysqli_num_rows($result8);

$sql1="select * from billing_entity_gstdetails where id=".$id." and deleted='0'";
$result1=mysqli_query($conn,$sql1);
$nums=mysqli_num_rows($result1);

$name = $row0['name'];
$panno = $row0['panno'];
$udyam_registration_no = ($row0['udyam_registration_no']) ? $row0['udyam_registration_no'] : '';

$sql9="select * from billing_entity_bankdetails where billing_entity_id='".$row['billing_entity_id']."' and deleted='0'";
$result9=mysqli_query($conn,$sql9);
$row9=mysqli_fetch_assoc($result9);
$total_bank_details=mysqli_num_rows($result9);

if($nums)
{
	$sql8="select * from billing_entity where deleted='0'";
	$result8=mysqli_query($conn,$sql8);
	$row8=mysqli_fetch_assoc($result8);
	$total_billing_entity_nums=mysqli_num_rows($result8);

	$row1=mysqli_fetch_assoc($result1);
	//echo '<pre>';print_r($row1);echo '</pre>';die;
	$email = ($row0['emailid']) ? $row0['emailid'] : '';
	$phone = ($row0['phoneno']) ? $row0['phoneno'] : '';
	$street = ($row0['addressstreet']) ? $row0['addressstreet'] : '';
	$city = ($row0['addresscity']) ? $row0['addresscity'] : '';
	$state = ($row0['addressstate']) ? $row0['addressstate'] : '';
	$zipcode = ($row0['addresspostalcode']) ? $row0['addresspostalcode'] : '';
	$gst_num = ($row0['gstno']) ? $row0['gstno'] : ($row1['gst_number']) ? $row1['gst_number'] : '';

	$street = ($street) ? $street : '';
	$city = ($city) ? $city : '';
	$state = ($state) ? $state : '';
	$zipcode = ($zipcode) ? $zipcode : '';

	$address = $street.$city.$state.$zipcode;
	
	if($address!=""){
		$street_label = ($row0['addressstreet']) ? $row0['addressstreet'].', ' : '';
		$city_label = ($row0['addresscity']) ? $row0['addresscity'].', ' : '';
		$state_label = ($row0['addressstate']) ? $row0['addressstate'].' - ' : '';
		$zipcode_label = ($row0['addresspostalcode']) ? $row0['addresspostalcode'] : '';
		
		$address = $street_label.$city_label.$state_label.$zipcode_label;
	}
	//echo json_encode(array('gst_num' => $row1['gst_number'], 'street' => $row1['street'], 'city' => $row1['city'], 'state' => $row1['state'], 'postal_code' => $row1['postal_code']));

	echo json_encode(array('billing_entity_id'=> $row['billing_entity_id'], 'name' => $name, 'address' => $address, 'emailid' => $email, 'phoneno' => $phone, 'gst_num' => $gst_num, 'panno' => $panno, 'udyam_registration_no' => $udyam_registration_no, 'street' => $street, 'city' => $city, 'state' => $state, 'postal_code' => $zipcode, 'total_entities' => $total_billing_entity_nums, 'total_gst_nums' => $total_gst_nums, 'total_bank_details' => $total_bank_details));
}
else
{
	echo "0";
}
?>