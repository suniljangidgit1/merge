<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$result= mysqli_query($conn, "SELECT * FROM lead WHERE DATE_FORMAT(created_at, '%m') = '04'");

$output="";

$output.= '<div class="table-responsive" >
						<table class="table bordered leadListData">
							<tr>
								<th><b>Name</b></th>
								<th><b>Created By</b></th>
								<th><b>Created At</b></th>
								<th><b>City</b></th>
								
							</tr>';

while($row= mysqli_fetch_array($result)){
	$created_by_id = $row["created_by_id"];

	$res= mysqli_query($conn, "SELECT first_name, last_name FROM user WHERE id= '".$created_by_id."'");
	$ro= mysqli_fetch_array($res);

	$created_by_name= $ro['first_name']." ".$ro['last_name'];
	$output.='<tr>
			<td>'.$row["first_name"].' '.$row["last_name"].'</td>
			<td>'.$created_by_name.'</td>
			<td>'.$row["created_at"].'</td>
			<td>'.$row["address_city"].'</td>
	</tr>';
}

$output.= '</table></div>';

echo json_encode($output, true);