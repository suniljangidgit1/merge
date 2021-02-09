<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// $result= mysqli_query($conn, "SELECT * FROM lead LIMIT 20");
// $out= "";
// $out.="<div class='table-responsive' style='position:relative; height:300px;'><table class='table bordered pictable'>
// 			<tr>
// 			<th>First Name</th>
// 			<th>Last Name</th>
// 			<th>Created At</th></tr>";
// while($row= mysqli_fetch_array($result)){
// 	if($row['first_name']!="" && $row['last_name']!=""){
// 		$out.="<tr>
// 					<td>".$row['first_name']."</td>
// 					<td>".$row['last_name']."</td>
// 					<td>".$row['created_at']."</td>
// 				</tr>";
// 	}
	
// }

// $out.="</table></div>";
$result= mysqli_query($conn, "SELECT count(*) FROM lead");

$row= mysqli_fetch_array($result);


$result1= mysqli_query($conn, "SELECT count(*) FROM lead WHERE DATE_FORMAT(created_at, '%m') = '03'");

$row1= mysqli_fetch_array($result1);

$out= "<dic class='dashlet-container' style='position: relative;left: 50px;top: 30px;font-size: 18px;
    font-weight: 600;'><div class='row'>
  <div class='col-sm-6' style=''>Total Leads</div>
  <div class='col-sm-6' style=''>".$row[0]."</div> 
  </div><div class='row'>
  <div class='col-sm-6' style=''>Last Months Leads</div>
  <div class='col-sm-6' style=''>".$row1[0]."</div> 

</div></div>";
echo json_encode($out, true);