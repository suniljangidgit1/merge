<?php
function create_file_upload() {

	$data["error"]       	= 	"true";
	$data["status"]         = 	"false";
	$data["msg"] 	        = 	"Invalid request.";

	$attachmentFileName  	= 	array();
	$fileSuccess         	= 	array();

	if( !empty($_FILES['attachment']['name'][0]) ) {

		$target_dir		 =	 '../reminder/uploads/';
		if( !is_dir($target_dir) ) { mkdir($target_dir); }

		$index 			= 	0;
		foreach($_FILES['attachment']['name'] as $filename) {

			$innerFileName 	= 	str_replace(' ', '_', $filename);
		    $targetFile 	= 	$target_dir.$innerFileName;

		    // Allow certain file formats
		    $target_file   	= 	$target_dir.$_FILES["attachment"]["name"][$index];
		    $imageFileType 	= 	strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		    $formateAllowed = 	array("jpeg", "jpg", "png", "docx", "doc", "xlsx", "xls", "zip", "rar", "pdf", "txt", "csv");

			if( !in_array($imageFileType, $formateAllowed) ) {

			  $attachmentFileName[$innerFileName] = 'File format not supported.';
			} else {

				$fileSuccess[$innerFileName]  = $innerFileName;
				move_uploaded_file($_FILES['attachment']['tmp_name'][$index], $targetFile);
			}
			$index++;		
		}

		$data["error"] 			= 	"false";
		$data["status"] 		= 	"true";
		$data["msg"] 			= 	"File uploaded successfully.";
		$data["fileError1"]  	= 	$attachmentFileName;
		$data["fileSuccess1"]	= 	$fileSuccess;
		return $data;
	}
	return $data;
}

function edit_file_upload() {
	$data["error"]       	= "true";
	$data["status"]         = "false";
	$data["msg"] 	        = "Invalid request.";

	$attachmentFileName  = array();
	$fileSuccess         = array();

	if(!empty($_FILES['attachment1']['name'][0]) )
	{
		$target_dir = '../reminder/uploads/';
		if(!is_dir($target_dir))
		{
			mkdir($target_dir);
		}

		$index 			= 0;
		foreach($_FILES['attachment1']['name'] as $filename) {
			$innerFileName = str_replace(' ', '_', $filename);
		    $targetFile = $target_dir.$innerFileName;

		    // Allow certain file formats
		    $target_file   = $target_dir.$_FILES["attachment1"]["name"][$index];
		    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		    $formateAllowed = array("jpeg", "jpg", "png", "docx", "doc", "xlsx", "xls", "zip", "rar", "pdf", "txt", "csv");

			if( !in_array($imageFileType, $formateAllowed) ) {

			  $attachmentFileName[$innerFileName] = 'File format not supported.';
			} else {

				$fileSuccess[$innerFileName]  = $innerFileName;
				move_uploaded_file($_FILES['attachment1']['tmp_name'][$index], $targetFile);
			}
			$index++;		
		}

		$data["error"] 			= 	"false";
		$data["status"] 		= 	"true";
		$data["msg"] 			= 	"File uploaded successfully.";
		$data["fileError"]  	= 	$attachmentFileName;
		$data["fileSuccess"]	= 	$fileSuccess;
		return $data;
	}
	return $data;
}

function delete_current_file() {

	$data["error"]       	= "true";
	$data["status"]         = "false";
	$data["msg"] 	        = "Invalid request.";
	$target_dir = '../reminder/uploads/'.$_GET["deleteFile"];

	if(file_exists($target_dir)){
		unlink($target_dir);
		$data["error"] 	= "false";
		$data["status"] = "true";
		$data["msg"] 	= "Please try later.";
		return $data;
	}

	return $data;

}

function deleteFolder(){
	$data["error"]       	= "true";
    $data["status"]         = "false";
    $data["msg"] 	        = "Invalid request.";

    $filePath1 = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/reminder/uploads';
    	
	if( !empty($filePath1)) {
	   foreach(glob($filePath1.'/*.*') as $v){
         unlink($v);
       }
       
		$data["error"] 	= "false";
        $data["status"] = "true";
        $data["msg"] 	= "files deleted Successfully.";
        return $data;
	
	}
   	return $data;
}

$methodName 	= 	isset( $_POST["methodName"] ) ? $_POST["methodName"] : NULL ;
$methodName1 	= 	isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;

if( $methodName  ==  "create_file_upload" ) {
 $response = create_file_upload();
 echo json_encode($response);return;

} elseif( $methodName  ==  "edit_file_upload" ) {
	$response = edit_file_upload();
	echo json_encode($response);return;

}
elseif( $methodName1   ==  "delete_current_file"){
	$response = delete_current_file();
	echo json_encode($response);return;

} elseif( $methodName1 ==  "deleteFolder" ){
	$response = deleteFolder();
	echo json_encode($response);return;

}