<?php 
//get connection
//include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Create subdomain connection
$conn = mysqli_connect('localhost', 'root', 'root', 'installationfirst.crm.com');

// Check subdomain connection
if (!$conn) {
  die("Sub Domain Connection failed: " . mysqli_connect_error());
}

$query = file_get_contents('custom_entity.sql');
$query = explode(';', $query);

foreach($query as $sql) {
	mysqli_query($conn, $sql);
}
?>