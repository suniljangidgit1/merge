<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//$allmails = array('rajeshwarpolshetwar@gmail.com','suchitapolshetwar@gmail.com');
//fatch all mail id's in array
$allmails = array();
$output = '';

$sql = "SELECT `id`,`first_name`,`last_name` FROM `user` WHERE `deleted`='0' AND id != 'system'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result)) {
    $output .= '<option value="'.$row['id'].'">'.$row['first_name'].' '.$row['last_name'].'</option>';
  }
}

//$output .='</select>';
$data['data'] = $output;
echo json_encode($data); return ;

?>