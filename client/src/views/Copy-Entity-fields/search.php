<?php
    $key=$_GET['key'];
    $array = array();
    //get connection
    include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

    $query=mysqli_query($conn, "select * from account where name LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['name'];
    }
	
	$query1= mysqli_query($conn, "select * from task where name LIKE '%{$key}%'");
	while ($row1= mysqli_fetch_array($query1)){
		$array[] = $row1['name'];
	}
    echo json_encode($array);
    mysqli_close($con);
?>
