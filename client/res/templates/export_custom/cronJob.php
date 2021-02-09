<?php

session_start();

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
* To export csv file & save
* @return   = (json)
*/

$data["status"] = "false";
$data["msg"]    = "Invalid request!";
$data["data"]   = array();

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

if ( !mysqli_connect_errno() ) {
    
    // Get individual records
    $sql        = "SELECT id, entity, db_query, columns, is_exported FROM export_result WHERE is_cron_job='1' AND is_exported='Pending' ORDER BY created_at ASC LIMIT 1 ";
    $result     = mysqli_query($conn, $sql );
    $dbQuery    = mysqli_fetch_array($result);
    
    if( !empty($dbQuery["entity"]) && !empty($dbQuery["db_query"]) ){
        
        $cronId         = $dbQuery["id"];
        $cronEntity     = $dbQuery["entity"];
        $cronQuery      = $dbQuery["db_query"];
        $cronColumns    = $dbQuery["columns"];
        $cronIsExported = $dbQuery["is_exported"];
        $cornUpdatedAt  = date("Y-m-d H:i:s");
        
        $file           = $dbQuery["entity"].date("_dmYHis").".csv";
        // $filename        = "export_files/".$file;

        // check folder exists or not
        $uploads_dir    = 'export_files/'.$_SERVER['SERVER_NAME'];
        if(!is_dir($uploads_dir)) {
            mkdir($uploads_dir);
        }

        $filename       = $uploads_dir."/".$file;
        
        $fp             = fopen($filename, 'w');
        
        // Build header array if columns
        if( !empty($cronColumns) && $cronColumns != "*" ) {
                
            $headerString   = explode(",", $cronColumns);
            foreach ( $headerString as $val ) {     
                if( !empty($val) ){
                    $headerTitle[]  = optionText($val);
                }
            }
                
            fputcsv($fp, $headerTitle);
        }
        
        $records        = mysqli_query( $conn, $cronQuery );
        $i              = 0;
        
        while( $row = mysqli_fetch_row($records) ) {
            
            /*if( !empty($cronColumns) && $cronColumns == "*" && $i == "0" ){
                
                $table = strtolower(preg_replace('/.(?=[A-Z])/', '$0_', $cronEntity ));
                $query1     = "SHOW COLUMNS FROM ".strtolower($table)."";
                $result1    = mysqli_query($conn,$query1);
    
                $custTitle  = array();
                while ($row1 = mysqli_fetch_row($result1)) {
                    $custTitle[] = optionText($row1[0]);
                }
                
                fputcsv($fp, $custTitle);
            }*/
          
            fputcsv($fp, $row);
            $i++;
        }
        
        fclose($fp);

        // create zip file
        $zip = new ZipArchive;
        if ($zip->open($filename.'.zip', ZipArchive::CREATE) == TRUE)
        {
            $zip->addFile($filename);
            $zip->close();
        }

        if( file_exists($filename) ){
            unlink($filename);
        }
        
        $cronUpdateQuery = "UPDATE export_result SET file='".$file."' , is_exported='Completed' WHERE id='".$cronId."' ";
        
        if( mysqli_query($conn, $cronUpdateQuery) ){
            $data["status"] = "true";
            $data["msg"]    = "Export successfully!";
            $data["data"]   = $file;
        }
    }
    
    
}

// echo "<pre>***";print_r(data);die;
echo json_encode($data); 
return true;