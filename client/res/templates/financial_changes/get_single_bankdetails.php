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

$sql="select * from billing_entity_bankdetails where id=".$id." and deleted='0'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

// $sql0="select * from billing_entity where id='".$row['billing_entity_id']."' and deleted='0'";
// $result0=mysqli_query($conn,$sql0);
// $row0=mysqli_fetch_assoc($result0);
//echo '<pre>';print_r($row0);echo '</pre>';die;

$sql1="select * from billing_entity_bankdetails where id=".$id." and deleted='0'";
$result1=mysqli_query($conn,$sql1);
$nums=mysqli_num_rows($result1);

$bank_name = $row['bank_name'];
$ifsc = $row['ifsc'];
// $udyam_registration_no = ($row0['udyam_registration_no']) ? $row0['udyam_registration_no'] : '';

if($nums){
	$row1=mysqli_fetch_assoc($result1);
	//echo '<pre>';print_r($row1);echo '</pre>';die;
	$beneficiary_name = ($row['beneficiary_name']) ? $row['beneficiary_name'] : '';
	$bank_name = ($row['bank_name']) ? $row['bank_name'] : '';
	$account_no = ($row['account_no']) ? $row['account_no'] : '';
	$ifsc_code = ($row['ifsc_code']) ? $row['ifsc_code'] : '';
	$account_type = ($row['account_type']) ? $row['account_type'] : '';
	$upi_id = ($row['upi_id']) ? $row['upi_id'] : '';

	// $street = ($street) ? $street : '';
	// $city = ($city) ? $city : '';
	// $state = ($state) ? $state : '';
	// $zipcode = ($zipcode) ? $zipcode : '';

	// $address = $street.', '.$city.', '.$state.' - '.$zipcode;
	// echo json_encode(array('gst_num' => $row1['billing_entity_id'], 'street' => $row1['beneficiary_name'], 'city' => $row1['bank_name'], 'state' => $row1['account_no'], 'postal_code' => $row1['ifsc_code']));die;

	echo json_encode(array('billing_entity_id'=> $row['billing_entity_id'], 'beneficiary_name' => $beneficiary_name, 'bank_name' => $bank_name, 'account_no' => $account_no, 'ifsc_code' => $ifsc_code, 'account_type' => $account_type, 'upi_id' => $upi_id));
}
else
{
	echo "0";
}
?>