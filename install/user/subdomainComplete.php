<?php
//get user details
require_once('getUserSubdomainDetails.php');

$sql = "UPDATE `users` SET domain_status = 'Active' WHERE u_id = '".$userId."'";

if (mysqli_query($connWeb, $sql)) {

	// add CRM custom tables
	createCustomTables($servername, $username, $password, $databaseName);
	// create subdoamin folder
	createSubdomainFolder($databaseName);
  
  	// Create virtual Host for registred domain
	$newVirtualHost ="\n\n<VirtualHost *:80>\n\tServerAdmin $domainName\n\tServerName $domainName\n\tServerAlias www.$domainName\n\tDocumentRoot /var/www/html/crm.fincrm.net/\n\tErrorLog /var/www/html/Logs/crm.fincrm.net/error.log\n\tCustomLog /var/www/html/Logs/crm.fincrm.net/access.log combined\n</VirtualHost>";


	$fp = fopen('../../../VirtualHosts/vhost.conf', 'a');//opens file in append mode

	fwrite($fp, $newVirtualHost);

	fclose($fp);

	//create folder on s3 bucket
	include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

	$s3->putObject([
	        'Bucket' => 'fincrm',
	        'Key'    => 'Development/'.$domainName,        
	    ]);

	echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($connWeb);
}
// close connection
mysqli_close($connWeb);

//create custom tables
function createCustomTables($servername, $username, $password, $databaseName) {

	// Create subdomain connection
	$conn = mysqli_connect($servername, $username, $password, $databaseName);

	// Check subdomain connection
	if (!$conn) {
	  die("custom tables connections failed: " . mysqli_connect_error());
	}

	$query = file_get_contents('customTables.sql');
	$query = explode(';', $query);

	foreach($query as $sql) {
		if(!empty($sql)) {
			mysqli_query($conn, $sql);
		}
	}

	// close connection
	mysqli_close($conn);
}

// copy file from once directory to onather directory
function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
}

// create domain name folder, copy & past folder and replace domain name in files
function createSubdomainFolder($databaseName)  {
	$dst  = '../../custom/Finnova/Custom/'.$databaseName.'/';
	$src  = '../../custom/Finnova/Custom/fincrm/';
	//create folder
	if(!is_dir($dst)) {
		mkdir($dst);
	}
	recurse_copy($src, $dst);

	//find & replace string in a file
	$src = '../../custom/Finnova/Custom/'.$databaseName.'/*';
	foreach(glob($src) as $path_to_file) {
		$src1 = $path_to_file.'/*';
		$src2 = '../../custom/Finnova/Custom/'.$databaseName.'/Resources/*';
		if($src1  != $src2){
			foreach(glob($src1) as $path_to_file1) {
			    $file_contents = file_get_contents($path_to_file1);
			    $file_contents = str_replace("fincrm",$databaseName,$file_contents);
			    file_put_contents($path_to_file1,$file_contents);
			}
		}
	}
}
?>