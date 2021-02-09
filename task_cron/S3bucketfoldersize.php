<?php 

// include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

/* To get s3 bucket folder size */
class S3bucketfoldersize {

	/* Define constructor */
	public function __construct() {
    	//$this->folder = $_SERVER["SERVER_NAME"];
  	}

	/* To get AWS s3 bucket domain folder size */
	public function FolderSize() {
	    
	    /*$s3 = S3Client::factory(array(
	                'key' => "your key",
	                'secret' => "your secret key",
    			));*/

		include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');

	    $size 		= 0;
	    $bucket 	= "fincrm";
		$folder 	= isset( $_SERVER["SERVER_NAME"] ) ? $_SERVER["SERVER_NAME"] : ""; 
	    $objects 	= $client->getIterator('ListObjects', array(
	        "Bucket" => $bucket,
	        "Prefix" => "Production/".$folder."/",
	    ));

	    $i = 0;
	    foreach ($objects as $object) {
	        $size = $size+$object['Size'];
	    }

	    // echo "<pre><br> Size of $folder is : => ".$this->formatSizeUnits($size);die;
	    return $this->formatSizeUnits( $size, "BYTES" );

	}

	/* To convert folder byte size into GB/MB/KB/byte */
	function formatSizeUnits( $bytes, $sizeIn = "GB" ) {

	    /*if ($bytes >= 1073741824) {
	        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
	    } elseif ($bytes >= 1048576) {
	        $bytes = number_format($bytes / 1048576, 2) . ' MB';
	    } elseif ($bytes >= 1024) {
	        $bytes = number_format($bytes / 1024, 2) . ' KB';
	    } elseif ($bytes > 1) {
	        $bytes = $bytes . ' bytes';
	    } elseif ($bytes == 1) {
	        $bytes = $bytes . ' byte';
	    } else {
	        $bytes = '0 bytes';
	    }*/

	    if ( $sizeIn == "GB" ) {
	        $bytes = number_format($bytes / 1073741824, 2);
	    } elseif ( $sizeIn == "MB" ) {
	        $bytes = number_format($bytes / 1048576, 2);
	    } elseif ( $sizeIn == "KB" ) {
	        $bytes = number_format($bytes / 1024, 2);
	    } elseif ( $sizeIn == "BYTES" ) {
	        $bytes = $bytes;
	    } else {
	        $bytes = '0';
	    }

	    return $bytes;
	}
    
    /* To convert GB to bytes*/
   function convertMemorySize( $strval, string $to_unit = 'b' ) {
        
        /*https://stackoverflow.com/questions/2510434/format-bytes-to-kilobytes-megabytes-gigabytes
       */

        $strval    = strtolower(str_replace(' ', '', $strval));
        $val       = floatval($strval);
        $to_unit   = strtolower(trim($to_unit))[0];
        $from_unit = str_replace($val, '', $strval);
        $from_unit = empty($from_unit) ? 'b' : trim($from_unit)[0];
        $units     = 'kmgtph';  // (k)ilobyte, (m)egabyte, (g)igabyte and so on...

        // Convert to bytes
        if ($from_unit !== 'b')
            $val *= 1024 ** (strpos($units, $from_unit) + 1);

        // Convert to unit
        if ($to_unit !== 'b')
            $val /= 1024 ** (strpos($units, $to_unit) + 1);

        return $val;
    }


	/* To get domain storage limit */
	function getDomainStorageLimit() {

		include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

		$dbWebName		= "fincrm_web"; // CHANGE DATBASE IF FINCRM WEBSITE DB NAME CHANGED
		
		$connWeb 		= mysqli_connect($servername, $username, $password , $dbWebName);
		if (!$connWeb) {
		  	die("Connection failed: " . mysqli_connect_error());
		}

		// To get domain user limit as per plan
		$sql = "
			SELECT u.u_id,rzom.id,pm.pId,pm.pStorageLimit FROM users as u 
			INNER JOIN rz_order_master as rzom ON u.rz_om_id = rzom.id AND u.u_id = rzom.uId
			INNER JOIN plan_master as pm ON rzom.pId = pm.pId
			WHERE u.u_domain_name = '".trim($dbname)."' ";
		
		$res 		= mysqli_query($connWeb, $sql);
	    $row 		= mysqli_fetch_array($res); 
	 	// echo "<pre>";print_r($row);
	 	return $count = isset( $row["pStorageLimit"] ) ? $row["pStorageLimit"] : 0 ;

	}

}


// HOW TO USER OR CALLED IN ANTHOTHER FILE EXAMPLE.
/*$objS3buket = new S3bucketfoldersize();
$existing 	= $objS3buket->FolderSize();
$new 		= $objS3buket->formatSizeUnits(990000000, "GB" );
echo "<br>existing : ".$existing;
echo "<br>new : ".$new;
echo "<br> Total : ".( $existing + $new );
*/