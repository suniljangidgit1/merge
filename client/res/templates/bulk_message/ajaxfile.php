<?php
//set timezone
date_default_timezone_set('UTC'); 

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
$con = $conn;

$request = $_GET['request'];

// Datatable data
if($request == 1){
    $list_id =  $_GET['list_id'];
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
        $searchQuery .= " and (phone like '%".$searchValue."%'";
        $searchQuery .= " or user_email like '%".$searchValue."%' ";
        $searchQuery .= " or user_name like '%".$searchValue."%') ";
    }

    ## Total number of records without filtering
    $sel = mysqli_query($con,"select count(*) as allcount from contacts where list_id='".$list_id."'");
    $records = mysqli_fetch_assoc($sel);
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $sel = mysqli_query($con,"select count(*) as allcount from contacts WHERE list_id='".$list_id."' ".$searchQuery);
    $records = mysqli_fetch_assoc($sel);
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $empQuery = "select * from contacts WHERE list_id='".$list_id."'" .$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;

    //$empQuery = "select * from contacts WHERE deleted='0' ";

    $empRecords = mysqli_query($con, $empQuery);
    $data = array();

    $id=1 + $row;

    while ($row = mysqli_fetch_assoc($empRecords)) {
        //$date = date("d/m/Y h:i ", strtotime($row['created_at']));
        $date =  date("d/m/Y h:i A", strtotime($row['created_at']));
        $data[] = array(
                "id"=>$id,
                "user_name"=>$row['user_name'],
                "user_email"=>$row['user_email'],
                "phone"=>$row['phone'],
                "created_at"=>$date,
                "action"=>"<input type='checkbox' class='delete_check' id='delcheck_".$row['id']."' onclick='checkcheckbox();' value='".$row['id']."'>"
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
}

// Delete record
if($request == 2) {

   $count           =   0;
   $deleteids_arr   =   $_REQUEST['deleteids_arr'];
   $deleteids       =   implode(',', $deleteids_arr);
   $contacts        =   $deleteids_arr[0];
   $emailCount      =   0;
   $phoneCount      =   0;

   $sql       =   "SELECT c.*, cl.totalcontacts, cl.total_emails FROM `contacts` c INNER JOIN contact_list cl ON c.`list_id` = cl.id WHERE c.id IN ($deleteids)";
   
   $result    =   mysqli_query($con,$sql);

   if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {

      $listId         = $row["list_id"];
      $totalContacts  = $row['totalcontacts'];
      $totalEmails    = $row['total_emails'];

      //for phone count
      if(!empty($row["phone"])) {
        $phoneCount++;
      }

      //for email count
      if(!empty($row["user_email"])) {
        $emailCount++;
      }
    }

    $result1 = mysqli_query($con,"DELETE FROM contacts WHERE id IN ($deleteids)");

    if($totalContacts > 0){
      $totalContacts = $totalContacts - $phoneCount;
    }

   
    if($totalEmails > 0){
      $totalEmails  = $totalEmails - $emailCount;
    }

    $sql      =   "UPDATE `contact_list` SET `totalcontacts`='$totalContacts', total_emails='$totalEmails' WHERE id = '$listId'";
    $result   =   mysqli_query($con,$sql);

    echo 1;
  }
  exit;
}

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