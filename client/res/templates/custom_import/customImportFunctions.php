<?php
/*
* To Get Entity Columns
* @para  -> $getEntityName   = (string)
* @return 	= (array)
*/
if( !function_exists( 'getColumnName' ) ) {

	function getColumnName($getEntityName = ""){

	GLOBAL $conn;

	if(!empty($getEntityName)){

		$table = strtolower(preg_replace('/\B([A-Z])/', '_$1', $getEntityName));

	    $query 	= "SHOW COLUMNS FROM `".$table."`";
	    $result = mysqli_query($conn,$query);

	    $columns = array();
	    
	    $hiddenColumns = array("id", "deleted", "created_at", "modified_at", "created_by_id", "modified_by_id", "assigned_user_id");

	    while ($row = mysqli_fetch_row($result)) {

	        //if ( strpos( strtolower($row[0]), 'id' ) == false && strpos( strtolower($row[0]), 'at' ) == false && strtolower($row[0]) != "id" && strtolower($row[0]) != "deleted" ) 

	        if(!in_array($row[0],$hiddenColumns) && strpos(strtolower($row[0]), '_id') == false) {
	            
	            $optionText = optionText($row[0]);
	            $columns[$row[0]] = $optionText;
	        }
	    }

	    //add email & phone fields
	    $columns["phone"]  = "Phone";
	    $columns["email"]  = "Email";

	    //sorting array in ascending oder
	    //asort($columns);

	    return $columns;
	}
	}
}

/*
* To built ucfirst of each word of string
* @para -> $string   = (string)
* @return 	= (string)
*/
if( !function_exists( 'optionText' ) ) {

	function optionText($string = ""){

		$newString 	= str_replace( "_", " ", $string);
		$stringArr	= explode(" ", $newString);

		$capString = "";
		foreach ($stringArr as $key => $value) {
			
			$capString .= ucfirst($value)." ";
		}

		return $capString;
	}
}

/*
* To get file header
* @para -> $targetfile  = (string)
* @return 	= (array)
*/
if( !function_exists( 'getFileHeader' ) ) {

	function getFileHeader($targetfile = "") {

		if(!empty($targetfile)) {

			$handle = 	fopen($targetfile, "r");

	    	$getRecord = fgetcsv($handle);

	    	return $getRecord;
		}
	}
}

/*
* To get file value
* @para -> $targetfile  = (string)
* @return 	= (array)
*/
if( !function_exists( 'getFileValue' ) ) {

	function getFileValue($targetfile = "") {

		if(!empty($targetfile)) {

			$handle 	= 	fopen($targetfile, "r");
			$getValues  = 	array();
			$count      =   0;
			$oneRecord	= 	0;

			while(! feof($handle) && $oneRecord <= 1 ) { 

		    	$getRecord = fgetcsv($handle);

		    	if(is_array($getRecord)){

		    		if(count($getRecord) > 1){

			    		if($count == 1){

			    			foreach($getRecord as $getValue){
			    				$getValues[]  = $getValue;
			    			}

			    			break;
			    		}
			    	}
		    	}
		    	
		    	$count++;
		    	$oneRecord++;
			}

	    	return $getValues;
		}
	}
}

/*
* To get field mapping
* @para -> $columns  	   = (array)
* @para -> $getFileHeader  = (array)
* @para -> $getFileValue   = (array)
* @return 	= (string)
*/
if( !function_exists( 'getFieldMapping' ) ) {

	function getFieldMapping($columns = array(), $getFileHeader = array(), $getFileValue = array()) {

		$fileValueCount 	= 	0;
		$fieldMapping    	= 	'';

		$fieldMapping      .= '
								<tr>';

							foreach($getFileHeader as $getHeaderName){

								$fieldMapping    .= '
									<td>'.$getHeaderName.'</td>
								<td>
								<select class="form-control fieldmappingselect" name="'.$fileValueCount.filterString($getHeaderName).'">
										<option value="">-Skip-</option>
								';

								foreach( $columns as $columnKey => $columnVal ){

									$fieldMapping    .= '
										<option value="'.$columnKey.'">'.$columnVal.'</option>
									';
								}

								$fieldMapping    .= '
										</select>
										
									</td>
									<td style="overflow: hidden;">'.$getFileValue[$fileValueCount].'</td>
								</tr>
								';
								$fileValueCount++;
							}

		return $fieldMapping;
	}
}

/*
* To get Assigned users
* @return 	= (string)
*/
if( !function_exists( 'getAssignedUsers' ) ) {

	function getAssignedUsers(){

		GLOBAL $conn;

		$output = '';

		$output .= '<option value="">Select User</option>';

		$sql = "SELECT `id`,`first_name`,`last_name` FROM `user` WHERE `deleted`='0' AND id != 'system'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0)
		{
		  while ($row = mysqli_fetch_assoc($result)) {
		    $output .= '<option value="'.$row['id'].'">'.ucfirst($row['first_name']).' '.ucwords($row['last_name']).'</option>';
		  }
		}

		return $output;
	}
}

/*
* To get Teams
* @return 	= (string)
*/
if( !function_exists( 'getTeams' ) ) {

	function getTeams(){

		GLOBAL $conn;
		$output  = '';

		$output .= '<option value="">Select Team</option>';

		$sql = "SELECT `id`,`name` FROM `team` WHERE `deleted`='0' ";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0)
		{
		  while ($row = mysqli_fetch_assoc($result)) {
		    $output .= '<option value="'.$row['id'].'">'.ucwords($row['name']).'</option>';
		  }
		}

		return $output;
	}
}

/*
* To empty folder
* @para -> $columns  = (string)
* @return 	= null
*/
if( !function_exists( 'emptyFolder' ) ) {

	function emptyFolder($target_dir = ""){

		$files = glob($target_dir.'*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
		    unlink($file); // delete file
		}
	}
}


/*
* To get total records
* @para -> $targetfile  = (string)
* @return 	= (integer)
*/
if( !function_exists( 'getFileTotalRecords' ) ) {

	function getFileTotalRecords($targetfile = "") {

		if(!empty($targetfile)) {

			$handle 	= 	fopen($targetfile, "r");
			$count      =   0;

			while(! feof($handle) ) {

		    	$getRecord = fgetcsv($handle);
		    	$count++;

		    	if( $count > 5002 ) {
		    		return $count - 2;die;
		    	}
			}

	    	return $count - 2;
		}
	}
}

/*
* To get token
* @para -> $length  	   = (integer)
* @return 	= (string)
*/
if( !function_exists( 'getToken' ) ) {

	function getToken($length = "") {

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
}

/*
* To get token encryption
* @para -> $min  	   = (integer)
* @para -> $max  	   = (integer)
* @return 	= (string)
*/
if( !function_exists( 'crypto_rand_secure' ) ) {

	function crypto_rand_secure($min, $max) {
		
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
}

/*
* Import Log
* @return 	= (boolean)
*/
if( !function_exists( 'unlinkLogs' ) ) {

	function unlinkLogs() {

		GLOBAL $conn;

		//get current time
		$DateTime 		 = 	new DateTime();
		$createdAt 		 = 	$DateTime->format('Y-m-d H:i:s');

		$createdAt 		 =	deacreaseTime('120', $createdAt);

		$unlinkLogSQL	 =	"SELECT `id`, `file_name`, `created_at` FROM `import_log` WHERE created_at < '".$createdAt."'";

		$unlinkLogResult =  mysqli_query($conn, $unlinkLogSQL);

		if (mysqli_num_rows($unlinkLogResult) > 0) {

		  while($row = mysqli_fetch_assoc($unlinkLogResult)) {

		  	//delete log
		    deleteFile($row["id"], $row["file_name"]);
		  }
		}
	}
}

/*
* Decrease Time
* @para  -> $minutes    = (integer)
* @para  -> $dateTime   = (dateTime)
* @return 	= (dateTime)
*/
if( !function_exists( 'deacreaseTime' ) ) {

	function deacreaseTime($minutes = "", $dateTime = ""){
		$minutes_to_minus = $minutes;		//minute
		$time = new DateTime($dateTime);
		$time->sub(new DateInterval('PT' . $minutes_to_minus . 'M'));

		$getDate	    = $time->format('Y-m-d H:i:s');
		return $getDate;
	}
}

/*
* Delete file
* @para  -> $id         = (string)
* @para  -> $fileName   = (string)
* @return 	= (boolean)
*/
if( !function_exists( 'deleteFile' ) ) {

	function deleteFile($id = "", $fileName = "") {

		GLOBAL $conn;

		// Check connection
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}

		$targetFile 	= 	$_SERVER['DOCUMENT_ROOT']."/client/res/templates/custom_import/uploads/".$fileName;

		if(file_exists($targetFile)) { 
			unlink($targetFile);
		}

		$deleteFileSQL  	= 	"DELETE FROM `import_log` WHERE id = '".$id."'";
		$deleteFileResult   = 	mysqli_query($conn, $deleteFileSQL);

		return $deleteFileResult;
	}
}

/*
* Import Log
* @para  -> $fileName   = (string)
* @return 	= (boolean)
*/
if( !function_exists( 'importLog' ) ) {

	function importLog($fileName = "") {

		GLOBAL $conn;

		//get current time
		$DateTime 		 = 	new DateTime();
		$createdAt 		 = 	$DateTime->format('Y-m-d H:i:s'); 

		$importLogSQL	 =	"INSERT INTO `import_log`(`file_name`, `created_at`) VALUES ('$fileName','$createdAt')";

		$importLogResult =  mysqli_query($conn, $importLogSQL);

		if($importLogResult) { 
			return mysqli_insert_id($conn);
		} else {
			return false;
		}
	}
}

/*
* FILTER STRING
* @para  -> $string   = (string)
* @return 	= (string)
*/
if( !function_exists( 'filterString' ) ) {

	function filterString( $string = "" ) {

		// Remove all characters except A-Z, a-z, 0-9, hyphens and spaces 
		$string = preg_replace('/[^A-Za-z0-9 -]/', '', $string);

		// Replace sequences of spaces with hyphen
		$string = preg_replace('/  */', '-', $string);

		return $string;
	}
}