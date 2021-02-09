<?php
//set timezone
date_default_timezone_set('UTC'); 

session_start();
date_default_timezone_set('UTC');
/*
* To built ucfirst of each word of string
* @return 	= (string)
*/
function optionText($string=""){
	
    // $string 	= 'hi_abc_xyz';
	$newString 	= str_replace( "_", " ", $string);
	$stringArr	= explode(" ", $newString);

	$capString = "";
	foreach ($stringArr as $key => $value) {
		
		$capString .= ucfirst($value)." ";
	}

	return $capString;
}


/*
* To genrate token
* @return 	= (string)
*/
function getToken($length)
{
	$token = "";
	$codeAlphabet = "abcdefghijklmnopqrstuvwxyz1234567890";
	$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	$codeAlphabet.= "0123456789";
	$max = strlen($codeAlphabet); // edited
	for ($i=0; $i < $length; $i++) {
		$token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
	}
	return $token;
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}


/*
* To export csv file
* @return 	= (json)
*/

$data["status"] = "false";
$data["msg"]    = "Invalid request!";
$data["data"]   = array();

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

if ( !mysqli_connect_errno() ) {
    
    // Get logged in id
    $userName 	= $_SESSION['Login'];
    $res 		= mysqli_query($conn, "SELECT id FROM user WHERE user_name='".$userName. "'");
    $row 		= mysqli_fetch_array($res);
    $userId 	= $row['id'];

    
    if( !empty($_POST['export-entity-type']) ){
        
        $id             = getToken(17);
        $table 	        = isset($_POST['export-entity-type']) ? strtolower(preg_replace('/\B([A-Z])/', '_$1', $_POST['export-entity-type'])) : NULL;
    	$description 	= isset($_POST['export_description']) ? $_POST['export_description'] : NULL;
    	$cols 		    = isset($_POST['entity_columns']) ? $_POST['entity_columns'] : NULL;
    	$ExportAll 	    = isset($_POST['export_all']) ? $_POST['export_all'] : NULL;
    	$cronJob 	    = isset($_POST['cron_job']) ? $_POST['cron_job'] : NULL;
    	
    	$status         = "0";
    	$createdBy 	    = $userId;
    	$createdAt 	    = date("Y-m-d H:i:s");
    	
    	$headers 	    = array();
    	
    	$file 		    = $_POST['export-entity-type'].date("_dmYHis").".csv";
    	// $filename 		= "export_files/".$file;
        if(empty($ExportAll) && empty($cols))
        {
            $data["status"] = "false";
            $data["msg"]    = "Please select the fields that you wish to export or select export all fields option.";
            $data["data"]   = array();
            echo json_encode($data); 
            return true;
        }

        // check folder exists or not
        $uploads_dir    = 'export_files';
        if(!is_dir($uploads_dir)) {
            mkdir($uploads_dir);
        }

        $filename       = $uploads_dir."/".$file;
    	$is_cron_job    = "0";
    	$is_exported    = "Completed";
    	
    	if( !empty($cronJob) ){
    	    
    	    $is_cron_job = "1";
    	    $is_exported = "Pending";
    	    
    	    if( empty($ExportAll) ){
            	if( !empty($cols) ){
            		foreach ( $cols as $val ) {		
            			if( !empty($val) ){
            			    
            			    if ( strpos( strtolower($val), 'id' ) == false &&strpos( strtolower($val), 'at' ) == false && strtolower($val) != "id" && strtolower($val) != "deleted" ) {
            			        
            			            $headers[]      = $val;
            			            
            			    }
            			}
            		}          		
            		$headerString 	= implode(",", $headers);
            	}
            	
        	}else{
        	    $query1 	= "SHOW COLUMNS FROM ".strtolower($table)."";
                $result1 	= mysqli_query($conn,$query1);
    
                $custTitle 	= array();
                while ($row1 = mysqli_fetch_row($result1)) {
                    
                    if ( strpos( strtolower($row1[0]), 'id' ) == false &&strpos( strtolower($row1[0]), 'at' ) == false && strtolower($row1[0]) != "id" && strtolower($row1[0]) != "deleted" ) {
    	                
    	                $headers[]      = $row1[0];
    	                
                    }
                }
                $headers[] = 'Email';
                $headers[] = 'Phone';
                $headerString 	= implode(",", $headers);
        	}
        	
            $headerString1 = $headerString;
            $headerStringArr = explode(',', $headerString);
            
            $headerString = explode(',', $headerString);
            if (($key = array_search('Email', $headerString)) !== false) {
                unset($headerString[$key]);
            }
            if (($key = array_search('Phone', $headerString)) !== false) {
                unset($headerString[$key]);
            }
            if(count($headerString)>0)
            {
                $headerString = implode(',', $headerString);
                $addComma = ',';
            }
            else
            {
                $headerString = '';
                 $addComma = '';
            }
            
            
            $query = "SELECT $headerString";    
            if(in_array('Email', $headerStringArr) || !empty($ExportAll))
            {
                $query .= $addComma."(SELECT ea.name FROM email_address ea WHERE ea.id = eea.email_address_id AND ea.deleted = 0) as email";
                $addComma = ',';
            }
            if(in_array('Phone', $headerStringArr) || !empty($ExportAll))
            {
                $query .= $addComma."(SELECT pn.name FROM phone_number pn WHERE pn.id = epn.phone_number_id AND pn.deleted = 0) as phone_number";
            }
            $query .= " FROM $table c LEFT JOIN entity_phone_number epn ON c.id = epn.entity_id LEFT JOIN entity_email_address eea ON c.id = eea.entity_id WHERE c.deleted = 0";




        	$sql = "INSERT INTO export_result (id, entity, description, is_cron_job, db_query, columns, is_exported, `status`, created_by_id, created_at, assigned_user_id ) VALUES ('".$id."', '".$_POST['export-entity-type']."','".$description."', '".$is_cron_job."', '".$query."', '".$headerString1."', '".$is_exported."', '".$status."', '".$createdBy."', '".$createdAt."', '".$createdBy."')";
        	
    	}else{
    	    
        	$fp 			= fopen($filename, 'w');
        
            header('Content-type: application/csv');
        	header('Content-Disposition: attachment; filename='.$filename);
        	
        	// Build header array [ unset empty value from post cols ] 
        	if( empty($ExportAll) ){
            	if( !empty($cols) ){
            		foreach ( $cols as $val ) {		
            			if( !empty($val) ){
            			    
            			    if ( strpos( strtolower($val), 'id' ) == false &&strpos( strtolower($val), 'at' ) == false && strtolower($val) != "id" && strtolower($val) != "deleted" ) {
            			        
    				                $headerTitle[]  = optionText($val);
            				        $headers[]      = $val;
            				        
            			    }
            			}
            		}
            		
                    // $headerTitle[] = 'Email';
                    // $headerTitle[] = 'Phone';
            		fputcsv($fp, $headerTitle);
            		
            		$headerString 	= implode(",", $headers);
            	}
        	}else{
        	    
        	    $query1 	= "SHOW COLUMNS FROM ".strtolower($table)."";
                $result1 	= mysqli_query($conn,$query1);
    
                $custTitle 	= array();
                while ($row1 = mysqli_fetch_row($result1)) {
                    
                    if ( strpos( strtolower($row1[0]), 'id' ) == false &&strpos( strtolower($row1[0]), 'at' ) == false && strtolower($row1[0]) != "id" && strtolower($row1[0]) != "deleted" ) {
    	                
    	                $headerTitle[]  = optionText($row1[0]);
    	                $headers[]      = $row1[0];
    	                
                    }
                }
                $headerTitle[] = 'Email';
                $headerTitle[] = 'Phone';
                fputcsv($fp, $headerTitle);
                $headerString 	= implode(",", $headers);
        	}
            $headerStringArr = explode(',', $headerString);

            $headerString = explode(',', $headerString);
            if (($key = array_search('Email', $headerString)) !== false) {
                unset($headerString[$key]);
            }
            if (($key = array_search('Phone', $headerString)) !== false) {
                unset($headerString[$key]);
            }
            if(count($headerString)>0)
            {
                $headerString = implode(',', $headerString);
                $addComma = ',';
            }
            else
            {
                $headerString = '';
                 $addComma = '';
            }
            
            
            $query = "SELECT $headerString";    
            if(in_array('Email', $headerStringArr) || !empty($ExportAll))
            {
                $query .= $addComma."(SELECT ea.name FROM email_address ea WHERE ea.id = eea.email_address_id AND ea.deleted = 0) as email";
                $addComma = ',';
            }
            if(in_array('Phone', $headerStringArr) || !empty($ExportAll))
            {
                $query .= $addComma."(SELECT pn.name FROM phone_number pn WHERE pn.id = epn.phone_number_id AND pn.deleted = 0) as phone_number";
            }
            $query .= " FROM $table c LEFT JOIN entity_phone_number epn ON c.id = epn.entity_id LEFT JOIN entity_email_address eea ON c.id = eea.entity_id WHERE c.deleted = 0";
        	
        	//$query 		= "SELECT $headerString FROM $table";
            //$query = "SELECT $headerString, (SELECT ea.name FROM email_address ea WHERE ea.id = eea.email_address_id AND ea.deleted = 0) as email,(SELECT pn.name FROM phone_number pn WHERE pn.id = epn.phone_number_id AND pn.deleted = 0) as phone_number FROM $table c LEFT JOIN entity_phone_number epn ON c.id = epn.entity_id LEFT JOIN entity_email_address eea ON c.id = eea.entity_id WHERE c.deleted = 0";
           //echo $query;

        	$result 	= mysqli_query($conn, $query);
        	$i 			= 0;
        	
        	// Add rows in CSV
        	while( $row = mysqli_fetch_row($result) ) {
        	    fputcsv($fp, $row);
        	    $i++;
        	}
        	
        	fclose($fp);
        	
        	$sql = "INSERT INTO export_result (id, entity, description, is_cron_job, file, db_query, columns, is_exported, `status`, created_by_id, created_at, assigned_user_id ) VALUES ('".$id."', '".$_POST['export-entity-type']."','".$description."', '".$is_cron_job."', '".$file."', '".$query."', '".$headerString."', '".$is_exported."', '".$status."', '".$createdBy."', '".$createdAt."', '".$createdBy."')";
    	}

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
        

        // To check s3 bucket existing folder size in gb

        $size = filesize($filename.'.zip');

        include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');

        $objS3buket         = new S3bucketfoldersize();
        $s3BucketSize       = $objS3buket->FolderSize();
        $currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
        $planStorageLimit   = $objS3buket->getDomainStorageLimit();
        $finalExisting      = ( $s3BucketSize + $currentFileSize );
        // $finalExisting = $objS3buket->formatSizeUnits( $finalExisting, "GB" );;
        $planStorageLimit   = $objS3buket->convertMemorySize( $planStorageLimit."Gb", "b" );
        if( $finalExisting > $planStorageLimit ){

            // delete local file
            $deleteFile = $filename.'.zip';
            if( file_exists($deleteFile) ){
                unlink($deleteFile);
            }

            $data["status"] = "false";
            $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
            $data["data"]   = array();
            echo json_encode($data); 
            return true;
        }
           
        // To check s3 bucket existing folder size in gb

    	if( mysqli_query($conn, $sql) ){
    		$data["status"] = "true";
    		if( empty($is_cron_job) ){
                // s3 bucket transfer
                include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
                // Where the files will be source from
                $source = 'export_files/'.$file.'.zip';
                // Where the files will be transferred to
                $dest = 'Production/'.$_SERVER['SERVER_NAME'].'/export_files/'.$userName.'/'.$id.'/'.$file.'.zip';

            
                // Create a transfer object
                // $manager = new \Aws\S3\Transfer($s3, $source, $dest);

                // //Perform the transfer synchronously
                // $manager->transfer();

                $result = $client->putObject([
                    'Bucket' => 'fincrm',
                    'Key'    => $dest,
                    'SourceFile' => $source         
                ]);

                // delete local file
                $deleteFile = $filename.'.zip';
                if( file_exists($deleteFile) ){
                    unlink($deleteFile);
                }

                $data["msg"]    = "Export successfully!";
                $data["data"]   = $file;
                $data["tableId"]= $id;
    		}else{
    		    $data["msg"]    = "You have requested successfully! Once export completed will let you know.";
    		    $data["data"]   = array();
    		} 
    	}
    }else{
        
        $data["status"] = "false";
        $data["msg"]    = "Please select entity!";
        $data["data"]   = array();
    }
}
// echo "<pre>***";print_r(data);die;
echo json_encode($data); 
return true;
