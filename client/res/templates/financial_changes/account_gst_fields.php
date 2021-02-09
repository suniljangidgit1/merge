<?php
session_start();
error_reporting(~E_ALL);

unset($_SESSION['account_gst']);
unset($_SESSION['number_of_gst']);
unset($_SESSION['account_gst_details']);
//$_SESSION['account_gst_details'] = '';
// echo '<pre>';print_r($_REQUEST);die;
if($_REQUEST['have_gst']=='Yes')
{
	if(isset($_REQUEST['number_of_gst']) && $_REQUEST['number_of_gst']!='NaN')
	{
		$_SESSION['number_of_gst'] = $_REQUEST['number_of_gst'];
	}
	else
	{
		$_SESSION['number_of_gst'] = '1';
		$_REQUEST['number_of_gst'] = '1';
	}

	$_SESSION['have_gst'] = $_REQUEST['have_gst'];
	$_SESSION['account_gst_details'] = $_REQUEST;
	//echo '<pre>';print_r($_SESSION);die;
	echo json_encode($_REQUEST);
}
else if($_REQUEST['have_gst']=='No')
{
	$_SESSION['number_of_gst'] = '1';
	$_SESSION['account_gst_details'] = $_REQUEST;
	//echo '<pre>';print_r($_SESSION);die;
}
else {
	echo '0';
}
?>