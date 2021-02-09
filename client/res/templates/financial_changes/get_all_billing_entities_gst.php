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

$entity_id = $_GET['entity_id'];

if(preg_match('/[\'"]/', $entity_id))
{
	$sql1="select * from billing_entity_gstdetails where billing_entity_id=".$entity_id." and deleted='0'";
}
else if(!preg_match('/[\'"]/', $entity_id))
{
	$sql1="select * from billing_entity_gstdetails where billing_entity_id='".$entity_id."' and deleted='0'";
}

$result1=mysqli_query($conn,$sql1);
$gst_nums=mysqli_num_rows($result1);

if($gst_nums == 1){
	$row1=mysqli_fetch_assoc($result1);
	// echo json_encode(array('total_gst' => $gst_nums, 'gst_num' => $row1['gst_number'], 'street' => $row1['street'], 'city' => $row1['city'], 'state' => $row1['state'], 'postal_code' => $row1['postal_code']));

	$sql13="select * from billing_entity where deleted='0'";
	$result13=mysqli_query($conn,$sql13);
	$row13=mysqli_fetch_assoc($result13);
	$total_entity_nums=mysqli_num_rows($result13);

	$sql1="select * from billing_entity where id=".$entity_id." and deleted='0'";
	$result1=mysqli_query($conn,$sql1);
	$row0=mysqli_fetch_assoc($result1);
	$nums=mysqli_num_rows($result1);

	$name = $row0['name'];
	$panno = $row0['panno'];
	$udyam_registration_no = ($row0['udyam_registration_no']) ? $row0['udyam_registration_no'] : '';
	$street = ($row0['addressstreet']) ? $row0['addressstreet'] : '';
	$city = ($row0['addresscity']) ? $row0['addresscity'] : '';
	$state = ($row0['addressstate']) ? $row0['addressstate'] : '';
	$zipcode = ($row0['addresspostalcode']) ? $row0['addresspostalcode'] : '';
	
	$address = $street.$city.$state.$zipcode;

	if($address!=""){
		$street_label = ($row0['addressstreet']) ? $row0['addressstreet'].', ' : '';
		$city_label = ($row0['addresscity']) ? $row0['addresscity'].', ' : '';
		$state_label = ($row0['addressstate']) ? $row0['addressstate'].' - ' : '';
		$zipcode_label = ($row0['addresspostalcode']) ? $row0['addresspostalcode'] : '';
		
		$address = $street_label.$city_label.$state_label.$zipcode_label;
	}
	
	$email = ($row0['emailid']) ? $row0['emailid'] : '';
	$phone = ($row0['phoneno']) ? $row0['phoneno'] : '';

	echo json_encode(array('billing_entity_id'=>$entity_id, 'total_entities' => $total_entity_nums, 'total_gst_nums' => $gst_nums, 'total_gst' => $gst_nums, 'name' => $name, 'address' => $address, 'emailid' => $email, 'phoneno' => $phone, 'gst_num' => $row1['gst_number'], 'panno' => $panno, 'udyam_registration_no' => $udyam_registration_no, 'street' => $street, 'city' => $city, 'state' => $state, 'postal_code' => $zipcode));

}
else if($gst_nums > 1)
{
	$str = '';
	$new_str = '';
	$s = 1;
	while($row1=mysqli_fetch_assoc($result1))
	{
		$str .= "<option value='".$row1['gst_number']."' data-id='".$row1['id']."'>".$row1['gst_number']."</option>";
		$s++;
	}
	if($str!='')
		echo json_encode(array('total_gst' => $gst_nums, 'str_opt' => $str));
	else
		echo "0";
}
else
{
	$sql8="select * from billing_entity where deleted='0'";
	$result8=mysqli_query($conn,$sql8);
	$row8=mysqli_fetch_assoc($result8);
	$total_billing_entity_nums=mysqli_num_rows($result8);
	
	$sql1="select * from billing_entity where id=".$entity_id." and deleted='0'";
	$result1=mysqli_query($conn,$sql1);
	$row0=mysqli_fetch_assoc($result1);
	$nums=mysqli_num_rows($result1);

	$name = $row0['name'];
	$panno = $row0['panno'];
	$udyam_registration_no = ($row0['udyam_registration_no']) ? $row0['udyam_registration_no'] : '';
	$street = ($row0['addressstreet']) ? $row0['addressstreet'] : '';
	$city = ($row0['addresscity']) ? $row0['addresscity'] : '';
	$state = ($row0['addressstate']) ? $row0['addressstate'] : '';
	$zipcode = ($row0['addresspostalcode']) ? $row0['addresspostalcode'] : '';
	$gst_num = 0;

	// $address = $street.', '.$city.', '.$state.' - '.$zipcode;
	$address = $street.$city.$state.$zipcode;
	if($address!=""){
		$street_label = ($row0['addressstreet']) ? $row0['addressstreet'].', ' : '';
		$city_label = ($row0['addresscity']) ? $row0['addresscity'].', ' : '';
		$state_label = ($row0['addressstate']) ? $row0['addressstate'].' - ' : '';
		$zipcode_label = ($row0['addresspostalcode']) ? $row0['addresspostalcode'] : '';
		
		$address = $street_label.$city_label.$state_label.$zipcode_label;
	}
	
	$email = $row0['emailid'];
	$phone = $row0['phoneno'];

	echo json_encode(array('billing_entity_id'=>$entity_id, 'total_gst' => $nums, 'name' => $name, 'address' => $address, 'emailid' => $email, 'phoneno' => $phone, 'gst_num' => $gst_num, 'panno' => $panno, 'udyam_registration_no' => $udyam_registration_no, 'street' => $street, 'city' => $city, 'state' => $state, 'postal_code' => $zipcode, 'total_entities' => $total_billing_entity_nums, 'total_gst_nums' => $gst_nums));
}
?>