<?php error_reporting(0);
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
$con = $conn;

$request = $_GET['request'];

    $table_name_input =  $_GET['table_name'];
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
        $searchQuery .= " and (pn.numeric like '%".$searchValue."%' ";
        $searchQuery .= " or ea.name like '%".$searchValue."%'";

        $sql = "SHOW columns from ".$table_name_input." where field='name'";
        //echo "num rows-";
        $r=mysqli_num_rows(mysqli_query($con,$sql));
        if ($r==0){
            $nameArr      = explode(' ', $searchValue);
            $fname        = $nameArr[0];
            $lname        = $nameArr[1];
            if(empty($lname)) {
               $lname     = $fname; 
            }

            $searchQuery .= " or ntbl.first_name like '%".$fname."%'";
            $searchQuery .= " or ntbl.last_name like '%".$lname."%'";
        }else {
            $searchQuery .= " or ntbl.name like '%".$searchValue."%'";
        }

        $searchQuery     .= ")";
    }

    ## Total number of records without filtering
    $sel = mysqli_query($con,"SELECT count(*) as allcount FROM phone_number pn INNER JOIN entity_phone_number epn ON pn.id = epn.phone_number_id INNER JOIN $table_name_input ntbl ON ntbl.id = epn.entity_id INNER JOIN entity_email_address eea ON ntbl.id = eea.entity_id INNER JOIN email_address ea ON ea.id = eea.email_address_id WHERE epn.deleted = '0' AND pn.deleted = '0' AND ntbl.deleted = '0' AND eea.deleted = '0' AND ea.deleted = '0'");
    $records = mysqli_fetch_assoc($sel);
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $sql = "SELECT count(*) as allcount FROM phone_number pn INNER JOIN entity_phone_number epn ON pn.id = epn.phone_number_id INNER JOIN $table_name_input ntbl ON ntbl.id = epn.entity_id INNER JOIN entity_email_address eea ON ntbl.id = eea.entity_id INNER JOIN email_address ea ON ea.id = eea.email_address_id WHERE epn.deleted = '0' AND pn.deleted = '0' AND ntbl.deleted = '0' AND eea.deleted = '0' AND ea.deleted = '0' ".$searchQuery;
    $sel = mysqli_query($con,$sql);
    $records = mysqli_fetch_assoc($sel);
    $totalRecordwithFilter = $records['allcount'];

    ##identify name conversion
    $sql = "SHOW columns from ".$table_name_input." where field='name'";
    $r=mysqli_num_rows(mysqli_query($con,$sql));
    if ($r==0){
        $field_name = 'ntbl.first_name,ntbl.last_name';
    }else {
        $field_name = 'ntbl.name';
    }

    ## Fetch records
    $empQuery = "SELECT $field_name, ea.name as email, pn.numeric FROM phone_number pn INNER JOIN entity_phone_number epn ON pn.id = epn.phone_number_id INNER JOIN $table_name_input ntbl ON ntbl.id = epn.entity_id INNER JOIN entity_email_address eea ON ntbl.id = eea.entity_id INNER JOIN email_address ea ON ea.id = eea.email_address_id WHERE epn.deleted = '0' AND pn.deleted = '0' AND ntbl.deleted = '0' AND eea.deleted = '0' AND ea.deleted = '0' " .$searchQuery." order by pn.".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;

    $empRecords = mysqli_query($con, $empQuery);
    $data = array();

    $id=1 + $row;

    while ($row = mysqli_fetch_assoc($empRecords)) {
        $name = $row['first_name'].' '.$row['last_name'].' '.$row['name'];
        $data[] = array(
                "name"=>$name,
                "email"=>$row['email'],
                "numeric"=>$row['numeric']
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
