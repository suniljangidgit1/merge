<?php

function create_file_upload()
{
	$data["error"] = "true";
	$data["status"] = "false";
	$data["msg"] = "Invalid request.";
	if(!empty($_FILES['invoice_attachment']['name'][0]) )
	{
		$target_dir = 'invoice/uploads/';

		if(!is_dir($target_dir))
		{
			mkdir($target_dir, 0777, true);
		}

		$index = 0;

		$allowed = array('jpg','JPG','jpeg','JPEG','png','PNG','doc','DOC','docx','DOCX','xls','XLS','xlsx','XLSX','pdf','PDF','zip','ZIP','rar','RAR','txt','TXT','csv','CSV');

		foreach($_FILES['invoice_attachment']['name'] as $filename)
		{
			$innerFileName = str_replace(' ', '_', $filename);

			$ext = pathinfo($filename, PATHINFO_EXTENSION);

			if(in_array($ext, $allowed))
			{
				$target_file = $target_dir.$innerFileName;
				move_uploaded_file($_FILES['invoice_attachment']['tmp_name'][$index], $target_file);
			}

			$index++;
		}

		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "File upload Successfully.";
		return $data;
	}
	return $data;
}

function edit_file_upload()
{
	$data["error"] = "true";
	$data["status"] = "false";
	$data["msg"] = "Invalid request.";
	if(!empty($_FILES['attachment']['name'][0]) )
	{
		$target_dir = 'invoice/uploads/';
		if(!is_dir($target_dir))
		{
			mkdir($target_dir, 0777, true);
		}

		$index = 0;

		$allowed = array('jpg','JPG','jpeg','JPEG','png','PNG','doc','DOC','docx','DOCX','xls','XLS','xlsx','XLSX','pdf','PDF','zip','ZIP','rar','RAR','txt','TXT','csv','CSV');

		foreach($_FILES['attachment']['name'] as $filename)
		{
			$innerFileName = str_replace(' ', '_', $filename);

			$ext = pathinfo($filename, PATHINFO_EXTENSION);

			if(in_array($ext, $allowed))
			{
				$target_file = $target_dir.$innerFileName;
				move_uploaded_file($_FILES['attachment']['tmp_name'][$index], $target_file);
			}

			$index++;
		}
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "File upload Successfully.";
		return $data;
	}
	return $data;
}

function convert_file_upload()
{
	$data["error"] = "true";
	$data["status"] = "false";
	$data["msg"] = "Invalid request.";
	if(!empty($_FILES['file_convert']['name'][0]) )
	{
		$target_dir = 'estimate/uploads/';
		if(!is_dir($target_dir))
		{
			mkdir($target_dir, 0777, true);
		}

		$index = 0;

		$allowed = array('jpg','JPG','jpeg','JPEG','png','PNG','doc','DOC','docx','DOCX','xls','XLS','xlsx','XLSX','pdf','PDF','zip','ZIP','rar','RAR','txt','TXT','csv','CSV');

		foreach($_FILES['file_convert']['name'] as $filename)
		{
			$innerFileName = str_replace(' ', '_', $filename);

			$ext = pathinfo($filename, PATHINFO_EXTENSION);

			if(in_array($ext, $allowed))
			{
				$target_file = $target_dir.$innerFileName;
				move_uploaded_file($_FILES['file_convert']['tmp_name'][$index], $target_file);
			}

			$index++;
		}
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Please try later.";
		return $data;
	}
	return $data;
}

function delete_current_file()
{
	$data["error"] = "true";
	$data["status"] = "false";
	$data["msg"] = "Invalid request.";
	$target_dir = 'invoice/uploads/'.$_GET["deleteFile"];

	if(file_exists($target_dir))
	{
		unlink($target_dir);
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Please try later.";
		return $data;
	}
	return $data;
}

function delete_all_current_file()
{
	$data["error"] = "true";
	$data["status"] = "false";
	$data["msg"] = "Invalid request.";
	$target_dir = 'invoice/uploads/';
	$zipFile = glob($target_dir."/*");
 	$flag = 0;
 	foreach($zipFile as $file)
 	{
	    if(is_file($file))
	    {
	        unlink($file);
	        $flag = 1;
	    }
	}
	
	$zip_target_dir = 'invoice/zipFolder/';
	$zip_files = glob($zip_target_dir.'/*');
	foreach($zip_files as $file)
 	{
	    if(is_file($file))
	    {
	        unlink($file);
	        $flag = 1;
	    }
	}
	
	if(!$flag)
	{
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Please try later.";
		return $data;
	}
	else {
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Files deleted successfully.";
		return $data;
	}
	return $data;
}

function delete_all_editcurrent_file()
{
	$data["error"] = "true";
	$data["status"] = "false";
	$data["msg"] = "Invalid request.";
	$target_dir = 'invoice/uploads/';
	$zipFile = glob($target_dir.'/*');

	$flag = 0;
	foreach($zipFile as $file)
    {
        if(is_file($file))
        {
            unlink($file);
            $flag = 1;
        }
    }
	
    $edit_target_dir = 'invoice/zipFolder/';
	$edit_zipFile = glob($edit_target_dir.'/*');
	foreach($edit_zipFile as $file)
    {
        if(is_file($file))
        {
            unlink($file);
            $flag = 1;
        }
    }
	
    if(!$flag)
	{
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Please try later.";
		return $data;
	}
	else {
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Files deleted successfully.";
		return $data;
	}
	return $data;
}

function delete_all_convert_file()
{
	$data["error"] = "true";
	$data["status"] = "false";
	$data["msg"] = "Invalid request.";
	$target_dir = 'estimate/uploads/';
	$files = glob($target_dir.'/*');
 	$flag = 0;
 	
 	foreach($files as $file)
 	{
	    if(is_file($file))
	    {
	        unlink($file);
	        $flag = 1;
	    }
	}
	
	$convert_target_dir = 'estimate/zipFolder/';
	$convert_files = glob($convert_target_dir.'/*');
 	$flag = 0;
 	
 	foreach($convert_files as $file)
 	{
	    if(is_file($file))
	    {
	        unlink($file);
	        $flag = 1;
	    }
	}
	
	if(!$flag)
	{
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Please try later.";
		return $data;
	}
	else {
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Files deleted successfully.";
		return $data;
	}
	return $data;
}

function delete_current_convert_file()
{
	$data["error"] = "true";
	$data["status"] = "false";
	$data["msg"] = "Invalid request.";
	$target_dir = 'estimate/uploads/'.$_GET["deleteFile"];

	if(file_exists($target_dir))
	{
		unlink($target_dir);
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Please try later.";
		return $data;
	}

	$target_dir = 'estimate/zipFolder/'.$_GET["deleteFile"];

	if(file_exists($target_dir))
	{
		unlink($target_dir);
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Please try later.";
		return $data;
	}
	return $data;
}

function invoice_editdelete_all_current_file()
{
	$data["error"] = "true";
	$data["status"] = "false";
	$data["msg"] = "Invalid request.";
	$target_dir = 'invoice/uploads/';
	$zipFile = glob($target_dir.'/*');

	$flag = 0;
	foreach($zipFile as $file)
    {
        if(is_file($file))
        {
            unlink($file);
            $flag = 1;
        }
    }
    
    $edit_target_dir = 'invoice/zipFolder/';
	$edit_zipFile = glob($edit_target_dir.'/*');
	foreach($edit_zipFile as $file)
    {
        if(is_file($file))
        {
            unlink($file);
            $flag = 1;
        }
    }
    
    if(!$flag)
	{
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Please try later.";
		return $data;
	}
	else {
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "Files deleted successfully.";
		return $data;
	}
	return $data;
}

function deleteFolder()
{
	$data["error"] = "true";
	$data["status"] = "false";
	$data["msg"] = "Invalid request.";

	$filePath1 = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_changes/invoice/uploads';
	$filePath2 = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_changes/invoice/zipFolder';

	if(!empty($filePath1) || !empty($filePath2))
	{
		if(!empty($filePath1))
		{
			foreach(glob($filePath1.'/*.*') as $v)
			{
				unlink($v);
			}
		}

		if(!empty($filePath2))
		{
			foreach(glob($filePath2.'/*.*') as $v2)
			{
				unlink($v2);
			}
		}
		$data["error"] = "false";
		$data["status"] = "true";
		$data["msg"] = "files deleted Successfully.";
		return $data;
	}
	return $data;
}

$methodName = isset( $_POST["methodName"] ) ? $_POST["methodName"] : NULL ;
$methodName1 = isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;

if($methodName=="create_file_upload")
{
	$response = create_file_upload();
	echo json_encode($response);return;
}
elseif($methodName=="edit_file_upload")
{
	$response = edit_file_upload();
	echo json_encode($response);return;
}
elseif($methodName=="convert_file_upload")
{
	$response = convert_file_upload();
	echo json_encode($response);return;
}
elseif($methodName1=="delete_current_file")
{
	$response = delete_current_file();
	echo json_encode($response);return;
}
elseif($methodName1=="delete_all_current_file")
{
	$response = delete_all_current_file();
	echo json_encode($response);return;
}
elseif($methodName1=="delete_all_convert_file")
{
	$response = delete_all_convert_file();
	echo json_encode($response);return;
}
elseif($methodName1=="delete_current_convert_file")
{
	$response = delete_current_convert_file();
	echo json_encode($response);return;
}
elseif($methodName1=="deleteFolder")
{
	$response = deleteFolder();
	echo json_encode($response);return;
}


?>