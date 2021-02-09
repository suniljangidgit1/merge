<?php error_reporting(0);
//set timezone
date_default_timezone_set('UTC'); 

$id	=	$_GET['id'];
$json=true;

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$sql = "SELECT id,listname FROM contact_list WHERE deleted = '0' AND id ='".$id."'";

	$result=mysqli_query($conn,$sql);
	//$row=mysqli_fetch_array($result);
	while($row = mysqli_fetch_assoc($result)) {
		$listname = $row['listname'];
		$list_id  = $row['id'];
	}

	$output ='
			  <input id="list_name" type="text" name="list_name" placeholder="List Name" class="form-control" required="" value="'.$listname.'">
              <input id="list_id" type="hidden" name="list_id" value="'.$list_id.'">';
      

$data['data'] = $output;
echo json_encode($data);return;
?>