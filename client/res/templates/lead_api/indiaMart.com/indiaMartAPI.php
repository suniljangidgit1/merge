<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// geting data API link
$url = "https://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/7767023021/GLUSR_MOBILE_KEY/MTU4NTcyMTkxMy44NDc0IzEwMzUyNzIzMQ==/";

$data = file_get_contents($url);
$data = json_decode($data);
if($data[0]->Error_Message)
{
	echo "It is advised to hit this API once in every 15 minutes,but it seems that you have crossed this limit. please try again after 15 minutes.";
	exit();
}

// count enquiries
$count = count($data);

// fetching data 
for($i=0;$i<$count;$i++)
{
	$sender_name 		=	$data[$i]->SENDERNAME;
	$sender_email		= 	$data[$i]->SENDEREMAIL;
	$sender_phone		=	str_replace('+91-', '', $data[$i]->MOB);
	$sender_subject		=	$data[$i]->SUBJECT;
	$sender_message		=	str_replace("'", "", $data[$i]->ENQ_MESSAGE);
	$sender_address		=	$data[$i]->ENQ_ADDRESS;
	$sender_city		=	$data[$i]->ENQ_CITY;
	$sender_state		=	$data[$i]->ENQ_STATE;
	$sender_query_id	=	$data[$i]->QUERY_ID;
	$lead_source		= 	'indiamart.com'

	$sql = "INSERT INTO india_mart_enquiry_data( sender_name, sender_email, sender_phone, sender_subject, sender_message, sender_address, sender_city, sender_state, sender_query_id,lead_sorce) VALUES ('$sender_name','$sender_email','$sender_phone','$sender_subject','$sender_message','$sender_address','$sender_city','$sender_state','$sender_query_id','$lead_sorce')";

	// inserting data in database
	$result = mysqli_query($conn, $sql);

	if (!$result) {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

// connection closing
mysqli_close($conn);
?>
