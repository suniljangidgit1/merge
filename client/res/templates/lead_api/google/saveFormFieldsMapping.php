<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');


$google_key 			= $_POST['google_key'];
$google_lead_structure	= $_POST['google_fields_name'];
$google_fields_name		= explode(',', $google_lead_structure);
$google_fields_value  	= explode(',', $_POST['google_fields_value']);

// $sql = "SELECT  ud.id, ud.db_host, ud.db_user_name, ud.db_password, ud.db_name  FROM google_user_details gud INNER JOIN user_details ud ON gud.user_id = ud.id  WHERE gud.google_key = '$google_key' AND ud.delete_status = '0'";

// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) 
// {
// 	while($row = mysqli_fetch_assoc($result)) {

// 		$localhost = $row["db_host"];
// 		$db_user_name = $row["db_user_name"];
// 		$db_password = $row["db_password"];
// 		$db_name = $row["db_name"];
// 		$conn = mysqli_connect($localhost,$db_user_name,$db_password,$db_name);
// 	}
// }

foreach($google_fields_name as $row)
{
	$crm_leads_form_array[] = $_POST[$row];
}
$crm_leads_form = implode(',', $crm_leads_form_array);

$sql = "INSERT INTO form_fields_mapping(google_key, google_lead_structure, crm_leads_structure) VALUES ('$google_key','$google_lead_structure','$crm_leads_form')";

$result = mysqli_query($conn, $sql);

if ($result){
	echo "Fields inserted formate".'<br>';
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// connection closing
mysqli_close($conn);
?>
<table border="2">
	<tr>
		<?php foreach($crm_leads_form_array as $row):?>
			<th><?php echo $row; ?></th>
		<?php endforeach; ?>
	</tr>
	<tr>
		<?php foreach($google_fields_value  as $row):?>
			<td><?php echo $row; ?></td>
		<?php endforeach; ?>
	</tr>
</table>