<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id=$_GET['id'];
// $id='5aj9ueg4kr8ums4zq';
// echo $id;die;
if(preg_match('/[\'"]/', $id)){
	$sql1="select * from billing_entity_bankdetails where billing_entity_id=".$id." and deleted='0'";
}
else if(!preg_match('/[\'"]/', $id)){
	$sql1="select * from billing_entity_bankdetails where billing_entity_id='".$id."' and deleted='0'";
}
$result1=mysqli_query($conn,$sql1);
$total_nums=mysqli_num_rows($result1);
if($total_nums > 1){
	$str = '';
	$new_str = '';
	$s = 1;
	while($row1=mysqli_fetch_assoc($result1))
	{
		$str .= "<option value='".$row1['bank_name']."' data-id='".$row1['id']."'>".$row1['bank_name']."</option>";
		$s++;
	}
	if($str!=''){
		echo json_encode(array('total_num' => $total_nums, 'str_opt' => $str));
	}
	else{
		echo "0";
	}
}
else if($total_nums == 1){
	$row1=mysqli_fetch_assoc($result1);

	$sql2="select * from billing_entity_bankdetails where billing_entity_id='".$row1['billing_entity_id']."' and deleted='0'";
	$result2=mysqli_query($conn,$sql2);
	$nums=mysqli_num_rows($result2);
	if($nums == 1){
		$row2=mysqli_fetch_assoc($result2);
		$beneficiary_name = $row1['beneficiary_name'];
		$bank_name = $row1['bank_name'];
		$account_no = $row1['account_no'];
		$ifsc_code = $row1['ifsc_code'];
		$upi_id = $row1['upi_id'];
		$account_type = $row1['account_type'];
	}
	else{
		$beneficiary_name = '';
		$bank_name = '';
		$account_no = '';
		$ifsc_code = '';
		$upi_id = '';
		$account_type = '';
	}
	echo json_encode(array('total_num' => $total_nums ,'beneficiary_name' => $beneficiary_name,'bank_name' => $bank_name, 'account_no' => $account_no, 'ifsc_code' => $ifsc_code, 'upi_id' => $upi_id, 'account_type' => $account_type));
}
else {
	echo "0";
}
?>