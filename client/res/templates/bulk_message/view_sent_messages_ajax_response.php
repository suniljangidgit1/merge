<?php
//set timezone
date_default_timezone_set('UTC'); 

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
$con = $conn;

$request = $_GET['request'];

    $sent_message_id =  $_GET['sent_message_id'];
    ## Read value
    $draw = $_GET['draw'];
    $row = $_GET['start'];
    $rowperpage = $_GET['length']; // Rows display per page
    $columnIndex = $_GET['order'][0]['column']; // Column index
    $columnName = $_GET['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_GET['order'][0]['dir']; // asc or desc
    $searchValue = $_GET['search']['value']; // Search value

    ## Search 
    $searchQuery = " ";
    if($searchValue != ''){
        $searchQuery .= " and (phones like '%".$searchValue."%' ";
        $searchQuery .= " or status like '%".$searchValue."%') ";
    }

    ## Total number of records without filtering
    $sel = mysqli_query($con,"select count(*) as allcount from sent_bulk_sms where sent_message_id='".$sent_message_id."'");
    $records = mysqli_fetch_assoc($sel);
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $sel = mysqli_query($con,"select count(*) as allcount from sent_bulk_sms WHERE sent_message_id='".$sent_message_id."' ".$searchQuery);
    $records = mysqli_fetch_assoc($sel);
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $empQuery = "select * from sent_bulk_sms WHERE sent_message_id='".$sent_message_id."'" .$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;

    $empRecords = mysqli_query($con, $empQuery);
    $data = array();

    $id=1 + $row;

    while ($row = mysqli_fetch_assoc($empRecords)) {
        // $date = $row['sent_sms_date'];
        // $date = date("d/m/Y h:i A", strtotime($row['sent_sms_date']));
        $date =  date("d/m/Y h:i A", strtotime($row['sent_sms_date']));
        // $date = date("h:i ", $row['sent_sms_date']);
        // $endTime = strtotime("+10 minutes", strtotime($date));
        // $date =  date('h:i', $endTime);

        $data[] = array(
                "id"=>$id,
                "phones"=>$row['phones'],
                // "status"=>$row['status'],
                "sent_sms_date"=>$date
            );
        $id++;
    }

    ## Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
    exit();


//add  Minute
function increaseTime($date = "") {
  
  if(!empty($date)) {
    $minutes_to_add = 330;    //minute
    $time = new DateTime($date);
    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

    $stamp = $time->format('Y-m-d H:i');
    return $stamp;
  }
}

