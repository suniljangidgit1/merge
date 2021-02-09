<?php


/*
* To built ucfirst of each word of string
* @return   = (string)
*/
function optionText($string=""){
    
    // $string  = 'hi_abc_xyz';
    $newString  = str_replace( "_", " ", $string);
    $stringArr  = explode(" ", $newString);

    $capString = "";
    foreach ($stringArr as $key => $value) {
        
        $capString .= ucfirst($value)." ";
    }

    return $capString;
}


/*
* To get entity columns dynamically from database
* @return   = (json)
*/

$data["status"] = "false";
$data["msg"]    = "Invalid request!";
$data["data"]   = array();


//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

if ( !mysqli_connect_errno() ) {
   
    if( !empty($_GET['entityName']) ){
        
        $table = strtolower(preg_replace('/\B([A-Z])/', '_$1', $_GET['entityName']));
        // echo  "TABLE NAME ===> ".$table;
        $query  = "SHOW COLUMNS FROM `".$table."`";

        // echo "<br>MYSQL QUERY ===> ".$query."<br>";
        $result = mysqli_query($conn,$query);

        $columns = array();
        while ($row = mysqli_fetch_row($result)) {
            
            if ( strpos( strtolower($row[0]), 'id' ) == false &&strpos( strtolower($row[0]), 'at' ) == false && strtolower($row[0]) != "id" && strtolower($row[0]) != "deleted" ) {
                
                $optionText = optionText($row[0]);
                $columns[$row[0]] = $optionText;
            }
        }
        $columns['Email'] = 'Email';
        $columns['Phone'] = 'Phone';
        
        $data["status"] = "true";
        $data["msg"]    = "Entity list fetch successfully!";
        $data["data"]   = $columns;
    }else{
        $data["status"] = "fasle";
        $data["msg"]    = "Please select entity!";
        $data["data"]   = array();
    }
}

 // echo "<pre>";print_r($data);die;
echo json_encode( $data );die;