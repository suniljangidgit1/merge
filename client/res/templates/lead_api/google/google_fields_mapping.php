<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<br><br><br><br>
<?php
$google_key = "test@111";
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

$sql = "SELECT  google_fields_name, google_fields_value,google_key FROM user_campaign_data WHERE google_key = '$google_key'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
  	$google_fields_name 	= $row['google_fields_name'];
  	$google_fields_value 	= $row['google_fields_value'];
  	$google_key				= $row['google_key'];
  	
  }
} else {
  echo "please add callback url & key in google ads manager & refresh page";
}

$google_fields_name_array = explode(',', $google_fields_name);
$google_fields_value_array = explode(',', $google_fields_value);

?>
<form action="saveFormFieldsMapping.php" method="POST">
	<input type="hidden" name="google_key" value="<?php echo $google_key; ?>">
	<input type="hidden" name="google_fields_name" value="<?php echo $google_fields_name; ?>">
	<input type="hidden" name="google_fields_value" value="<?php echo $google_fields_value; ?>">
<?php
$length = count($google_fields_name_array);
for($i=0;$i<$length;$i++)
{
?>
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-3">
			<b> <?php echo $google_fields_name_array[$i].':'; ?> </b>
		</div>
		<div class="col-sm-3">
			<select name="<?php echo $google_fields_name_array[$i]; ?>">
				<option value="">select fields</option>
				<?php 
					$sql = "SELECT * FROM crm_leads_data";
					$except_fields = array('id','all_data','leadgen_id','created_date','updated_date','delete_status');
					$result = mysqli_query($conn, $sql);
					print_r(mysqli_fetch_field($result));


					if ($result) {
					  while ($fieldinfo = mysqli_fetch_field($result)) {
					  	if(!in_array($fieldinfo->name, 
					  		$except_fields))
					  	{
					  		echo '<option value="'.$fieldinfo->name.'">'.$fieldinfo->name.'</option>';

						}
					  }
					}
					else
					{
						echo "result not found";
					}
				?>				
			</select>
		</div>

		<div class="col-sm-3">
			<b> <?php echo $google_fields_value_array[$i]; ?> </b>
		</div>
	</div><br>
<?php } ?>
	<br>
	<div class="row">
		<center><button type="submit">Run Export</button></center>
	</div>
</form>

<?php
// connection closing
mysqli_close($conn);
?>
</body>
</html>