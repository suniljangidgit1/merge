<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$page_id 		= $_POST['page_id'];
$form_id 		= $_POST['form_id'];
$fb_form_leads  = $_POST['fb_form_leads'];
$fb_form_leads_array  = explode(',', $fb_form_leads);

$fb_form_leads_value = explode(',', $_POST['fb_form_leads_value']);

foreach($fb_form_leads_array as $row)
{
	$crm_leads_form_array[] = $_POST[$row];
}
$crm_leads_form = implode(',', $crm_leads_form_array);

$sql = "INSERT INTO fb_form_fields_mapping(page_id, form_id, fb_leads_structure, crm_leads_structure) VALUES ('$page_id','$form_id','$fb_form_leads','$crm_leads_form')";

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
		<?php foreach($fb_form_leads_value as $row):?>
			<td><?php echo $row; ?></td>
		<?php endforeach; ?>
	</tr>
</table>