<?php session_start();
/*
* To download export csv file using ajax request
* @return 	= (string)
*/
$data["status"] = "false";
$data["msg"]    = "Invalid request!";
$data["data"]   = array();

function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
          if ($object != "." && $object != "..") {
            if (filetype($dir."/".$object) == "dir") 
               rrmdir($dir."/".$object); 
            else unlink   ($dir."/".$object);
          }
        }
        reset($objects);
        //rmdir($dir);
    }
}

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Get logged in user name
$userName   = $_SESSION['Login'];

if ( !mysqli_connect_errno() ) {
    
    $tableId        = isset($_GET["tableId"]) ? $_GET["tableId"] : NULL;
    $tableEntity    = "export_result";
    
    if( !empty($tableEntity) && !empty($_GET["tableId"]) ){
        
        $res 		= mysqli_query($conn, "SELECT file FROM ".$tableEntity." WHERE id='".$tableId. "'");
        $row 		= mysqli_fetch_array($res); 
        if( !empty($row['file']) ){
            
            $data["status"] = "true";
            $data["msg"]    = "File found!";
            $data["data"]   = $row['file'];

//             // s3 bucket transfer
             include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
//             // Where the files will be source from
//             $source = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/export_files/'.$userName.'/'.$tableId.'/';

//             // Where the files will be transferred to
//             $dest = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/export_custom/export_files/';

//             // Create a transfer object
//             $manager = new \Aws\S3\Transfer($s3, $source, $dest);

//             //Perform the transfer synchronously
//             $manager->transfer();
            $result = $client->getObject(array(
                'Bucket' => 'fincrm',
                'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/export_files/'.$userName.'/'.$tableId.'/'.$row['file'].".zip",
                'SaveAs' => $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/export_custom/export_files/'.$row['file'].".zip"
            ));

            
            // $path = "export_files/".$row['file'];
            $path           = "export_files/".$row['file'].".zip";
            $unZipPath      = "export_files/";

            // check folder exists or not
            // if(!is_dir($unZipPath)) {
            //     mkdir($unZipPath);
            // }

            $zip = new ZipArchive;
            if ($zip->open($path) === TRUE) {
                $zip->extractTo($unZipPath);
                $zip->close();
                // echo 'ok';
            } else {
                // echo 'failed';
            }

            $downloadFile = "export_files/export_files/".$row['file'];

            $deleteFolder = "export_files/";

            // header('Content-Descriptin: Fiole Transfer');
            // header('Content-Type: application/force-download');
            // header("Content-type:" .pathinfo($row['file'], PATHINFO_EXTENSION));
            header("Content-Type: text/csv");
            // header("Content-Disposition: attachment; filename=\"" . basename($path) . "\";");
            header("Content-Disposition: attachment; filename=\"" . basename($downloadFile) . "\";");
            // header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            // header('Cache-Control: must-revalidate');
            // header('Pragma: public');
            // header('Content-Length: ' . $size);
            ob_clean();
            flush();

           
            readfile($downloadFile); //showing the path to the server where the file is to be download
             
            // delete folder or file after download
            rrmdir($deleteFolder);
            exit;
            
        }
    }else{
    
        $data["status"] = "false";
        $data["msg"]    = "File not found!";
        $data["data"]   = array();
    }
}
