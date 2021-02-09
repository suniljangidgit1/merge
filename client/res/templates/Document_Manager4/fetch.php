<html>
<head>
<script src="js3/jquery.min.js"></script>
<style>
@media(min-width:767px){
.pictable{
	table-layout: fixed;
  width: 100%;
  white-space: nowrap;
}

.pictable td{
	white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.picname {
  width: 50%;
}
.piccreateby {
  width: 20%;
}
.piccreateat {
  width: 20%;
}
.picoption {
  width: 10%;
}
}
</style>
</head>
<script type="text/javascript">
$(document).ready(function(){
	
	$(document).on("click",".btnUpdate",function()
	{
		var id=$(this).data("update-id");
		var msg=confirm("Do you want to delete folder");
		if(msg == true)
		{
			$.ajax({
				url:"newbeforeDeleteFolder.php",
				method:"post",
				data:{id:id},
				success:function(data)
				{
					//alert(data);
					//$('#result').html(data);
					location.reload();
				}
				
			});
		}
		else{
			$.ajax({
				success:function(data)
				{
					//$('#result').html(data);
					location.reload();
				}
				
			});
		}
		
	});
	$(document).on("click",".btndocumentUpdate",function()
	{
		var id=$(this).data("documentupdate-id");
		//alert(id);
		var msg=confirm("Do you want to delete folder");
		if(msg == true)
		{
			$.ajax({
				url:"newbeforeDeleteFile.php",
				method:"post",
				data:{id:id},
				success:function(data)
				{
					//$('#result').html(data);
					location.reload();
				}
				
			});
		}
		else{
			$.ajax({
				success:function(data)
				{
					//$('#result').html(data);
					location.reload();
				}
				
			});
		}
		
	});
});	
</script>

<?php
error_reporting(0);
	session_start();
	$userName=$_SESSION["Login"];  
	$offset=$_POST['offset_data'];
	$total_records_per_page=$_POST['total_records_per_page_data'];
	//echo $offset." ".$total_records_per_page;
	//$userName= "achyut";
	//echo $userName; 
	if($userName== "admin"){
 	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
 	$connect=$conn;
		// $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
		
		$output = '';
		if(isset($_POST["query"]))
		{
			
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query1 = "
			SELECT * FROM document_master WHERE document_name LIKE '%".$search."%' 
			AND folder_id= '0' LIMIT $offset, $total_records_per_page";
		}
		else
		{
			$query1 = "
			SELECT * FROM document_master WHERE folder_id= '0' ORDER BY id LIMIT $offset, $total_records_per_page";
		}
		$result = mysqli_query($connect, $query1);
		if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query2 = " SELECT * FROM folder_master WHERE folder_name LIKE '%".$search."%' LIMIT $offset, $total_records_per_page";
		}
		else
		{
			$query2 = "
			SELECT * FROM folder_master ORDER BY id LIMIT $offset, $total_records_per_page";
		}	
		
		$resultForFolder = mysqli_query($connect, $query2);
		if(mysqli_num_rows($result) > 0 || mysqli_num_rows($resultForFolder) > 0 )
		{
			$output .= '<div class="table-responsive">
						<table class="table bordered pictable">
				<tr>
					<th class="picname">Name</th>
					<th class="piccreateby">Created By</th>
					<th class="piccreateat">Created At</th>
					<th class="picoption">Options</th>
				</tr>';
							
			while($rowForFolder = mysqli_fetch_array($resultForFolder)){
				
				$share=$rowForFolder['assigned_user_id'];
				
				if($share=='')
				{
					$sharefolder_icon='Blank-Folder-icon.png';
				}	
				else{
					$sharefolder_icon='share_folder2.png';
				}
					$output .= '
						<tr>
						<td><a href="viewFolderFiles.php?id='.$rowForFolder['id'].'"><img src="icon/'.$sharefolder_icon.'" width="35" height="35" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$rowForFolder["folder_name"].'</a></td>
						<td>'.$rowForFolder["created_user_id"].'</td>
						<td>'.$rowForFolder["createdAt"].'</td>
						<td><a href="download_zip_file.php?id='.$rowForFolder['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFolder.php?id='.$rowForFolder['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btnUpdate" data-update-id="'.$rowForFolder['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
						</tr>
					';
			
			}

			
			
			while($row_file = mysqli_fetch_array($result))
			{
				$icon_color="DEFAULT.png";
				$file_type	= $row_file['document_type'];
				//echo $file_type;				
				if($file_type == 'mp3' || $file_type == 'aif' || $file_type == 'cda' || $file_type == 'mid' || $file_type == 'midi' || $file_type == 'mpa' || $file_type == 'ogg' || $file_type == 'wav' || $file_type == 'wna' || $file_type == 'aac')
				{
					$icon_color="audioicon.png";
					$icon_title="Audio icon";
				}
				else if($file_type == 'mp4' || $file_type == '3gp' || $file_type == '3gp2' || $file_type == '3g2' || $file_type == '3gpp' || $file_type == '3gpp2' || $file_type == 'ogg' || $file_type == 'oga' || $file_type == 'ogv' || $file_type == 'ogx' || $file_type == 'wnv' || $file_type == 'wma' || $file_type == 'asf' || $file_type == 'webm' || $file_type == 'flv' || $file_type == 'avi' || $file_type == 'gif' || $file_type == 'wmv')
				{
					$icon_color="video-icon.png";
					$icon_title="video icon";
				}
				else if($file_type == 'xlsx' || $file_type=='xls')
				{
					$icon_color="Excel-icon.png";
					$icon_title="Excel icon";
				}
				else if($file_type == 'docx')
				{
					$icon_color="Word-icon.png";
					$icon_title="docx icon";
				}
				else if($file_type == 'pdf')
				{
					$icon_color="Adobe-Reader.PNG";
					$icon_title="Pdf icon";
				}
				else if($file_type == 'txt')
				{
					$icon_color="text-icon1.PNG";
					$icon_title="Text icon";
				}
				else if($file_type == 'jpg' || $file_type == 'png' || $file_type == 'svg' || $file_type=='jpeg')
				{
					$icon_color="image-icon1.png";
					$icon_title="image icon";
				}
				else if($file_type == 'zip')
				{
					$icon_color="rar.png";
					$icon_title="zip icon";
				}
				
				$output .= '
					<tr>
					<td><img src="icon/'.$icon_color.'" width="35" height="35" alt="Excel icon" title="'.$icon_title.'">&nbsp;&nbsp;'.$row_file["document_name"].'</td>
					<td>'.$row_file["created_user_id"].'</td>
					<td>'.$row_file["createdAt"].'</td>
					<td><a href="downloadFile.php?id='.$row_file['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row_file['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" data-udate-id="'.$row_file['id'].'"><a href="#" class="btndocumentUpdate" data-documentupdate-id="'.$row_file['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
					</tr>
				';
				$icon_color='';
			}
			echo $output;
		}
		else
		{
			//echo 'Data Not Found';
		}
	}
	if($userName!="admin"){
		
		$showcnt_main_createdUser=0;
		$startno_main_createdUser=$offset;
		$end_no_main_createdUser=$_POST['pageno']*$total_records_per_page;
		
		$showcnt_sub_createdUser=0;
		$startno_sub_createdUser=$offset;
		$end_no_sub_createdUser=$_POST['pageno']*$total_records_per_page;
		
		$showcnt_document=0;
		$startno_document=$offset;
		$end_no_document=$_POST['pageno']*$total_records_per_page;
		//echo $showcnt_sub_createdUser." ".$startno_sub_createdUser." ".$end_no_sub_createdUser; 
		
		// $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
		$output = '';
		
		$output .= '<div class="table-responsive">
						<table class="table bordered">
							<tr>
								<th>Name</th>
								<th>Created By</th>
								<th>Created At</th>
								<th>Options</th>
							</tr>';
							
		//show main folder created by user
		if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query4 =mysqli_query($connect,"SELECT * FROM folder_master WHERE folder_name LIKE '%".$search."%' AND created_user_id='".$userName."'");
		}
		else
		{
			$query4 = mysqli_query($connect,"SELECT * FROM folder_master WHERE created_user_id='".$userName."'");
		}
		while($row_user_mainfolder=mysqli_fetch_array($query4))
		{
			
					$share=$row_user_mainfolder['assigned_user_id'];
				
					if($share=='')
					{
						$sharefolder_icon='Blank-Folder-icon.png';
					}	
					else{
						$sharefolder_icon='share_folder2.png';
					}
					 if($showcnt_main_createdUser>=$startno_main_createdUser && $showcnt_main_createdUser<$end_no_main_createdUser)
					{ 
							$output .= '
							<tr>
							<td><a href="viewFolderFiles.php?id='.$row_user_mainfolder['id'].'"><img src="icon/'.$sharefolder_icon.'" width="35" height="35" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$row_user_mainfolder["folder_name"].'</a></td>
							<td>'.$row_user_mainfolder["created_user_id"].'</td>
							<td>'.$row_user_mainfolder["createdAt"].'</td>
							<td><a href="download_zip_file.php?id='.$row_user_mainfolder['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFolder.php?id='.$row_user_mainfolder['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="beforeDeleteFolder.php?id='.$row_user_mainfolder['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
							</tr>
						';
					}
					$showcnt_main_createdUser++;
				
				
		}//end of main folder created by user
							
		////show main folder assign to user
		if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query41 =mysqli_query($connect,"SELECT * FROM folder_master WHERE folder_name LIKE '%".$search."%'");
		}
		else
		{
			$query41 = mysqli_query($connect,"SELECT * FROM folder_master");
		}
		while($row_user_mainfolder=mysqli_fetch_array($query41))
		{
			$assign_user_array_mainfolder=explode(",",$row_user_mainfolder['assigned_user_id']);
			
			
				if(in_array($userName,$assign_user_array_mainfolder))
				{
					
					$share_main=$row_user_mainfolder['assigned_user_id'];
					
					if($share_main=='')
					{
						$sharefolder_icon='Blank-Folder-icon.png';
					}	
					else{
						$sharefolder_icon='share_folder2.png';
					}
						
						if($showcnt_main_createdUser>=$startno_main_createdUser && $showcnt_main_createdUser<$end_no_main_createdUser)
						{ 
							//echo $row_user_mainfolder["folder_name"];;
						$output .= '
						<tr>
						<td><a href="viewFolderFiles.php?id='.$row_user_mainfolder['id'].'"><img src="icon/'.$sharefolder_icon.'" width="35" height="35" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$row_user_mainfolder["folder_name"].'</a></td>
						<td>'.$row_user_mainfolder["created_user_id"].'</td>
						<td>'.$row_user_mainfolder["createdAt"].'</td>
						<td><a href="download_zip_file.php?id='.$row_user_mainfolder['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFolder.php?id='.$row_user_mainfolder['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="beforeDeleteFolder.php?id='.$row_user_mainfolder['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
						</tr>
						';
					  }
					  $showcnt_main_createdUser++;
					
					
				}
				
		}//end of main folder assign to user					
							
							
							
		//show sub folder is created by user
		if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$str_user_data_subFolder=mysqli_query($connect,"SELECT * FROM sub_folder_master WHERE folder_name LIKE '%".$search."%' AND created_user_id = '".$userName."'");
		}
		else
		{
			$str_user_data_subFolder=mysqli_query($connect,"SELECT * FROM sub_folder_master WHERE created_user_id = '".$userName."'");					
		}
		while($row_user_data_subfolder=mysqli_fetch_array($str_user_data_subFolder))
		{
			$assign_user_array_subfolder=explode(",",$row_user_data_subfolder['assigned_user_id']);
			//echo $row_user_data_subfolder['folder_name']."<br>";
				//print_r($assign_user_array_subfolder);
			if(in_array($userName,$assign_user_array_subfolder))
			{
				 
				$shared_sub=$row_user_data_subfolder['assigned_user_id'];
				
				if($shared_sub='')
				{
					if($showcnt_sub_createdUser>=$startno_sub_createdUser && $showcnt_sub_createdUser<$end_no_sub_createdUser)
						{
					$output .= '
								<tr>
								<td><a href="viewFolderFiles.php?id='.$row_user_data_subfolder['id'].'"><img src="icon/Blank-Folder-icon.png" width="35" height="35" alt="folder icon" title="folder icon">&nbsp;&nbsp;'.$row_user_data_subfolder["folder_name"].'</a></td>
								<td>'.$row_user_data_subfolder["created_user_id"].'</td>
								<td>'.$row_user_data_subfolder["createdAt"].'</td>
								<td><a href="newdownloadSubFolder.php?id='.$row_user_data_subfolder['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFolder.php?id='.$row_user_data_subfolder['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="beforeDeleteSubFolderFiles.php?id='.$row_user_data_subfolder['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
								</tr>
								';	
						}
						$showcnt_main_createdUser++;
			
					
				}
			
			}
			
		}//end sub folder not created user
		
		
		//show sub folder assign to user
		if(isset($_POST["query"])){
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query5 = mysqli_query($connect," SELECT * FROM sub_folder_master WHERE folder_name LIKE '%".$search."%' AND created_user_id='".$userName."' LIMIT $offset, $total_records_per_page");
		}else{
			$query5 = mysqli_query($connect," SELECT * FROM sub_folder_master");
		}
		while($row_subfolder_created_user=mysqli_fetch_array($query5))
		{
			$assign_user_array_subfolder_assign_user=explode(",",$row_subfolder_created_user['assigned_user_id']);	
			if(in_array($userName,$assign_user_array_subfolder_assign_user))
			{
				$shared_sub_createby_user=$row_subfolder_created_user[''];
				if($shared_sub_createby_user='')
				{
					$sharefolder_icon='Blank-Folder-icon.png';
				}
				else
				{
					$sharefolder_icon='share_folder2.png';
				}
					
					$output .= '
							<tr>
							<td><a href="viewFolderFiles.php?id='.$row_subfolder_created_user['id'].'"><img src="icon/'.$sharefolder_icon.'" width="35" height="35" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$row_subfolder_created_user["folder_name"].'</a></td>
							<td>'.$row_subfolder_created_user["created_user_id"].'</td>
							<td>'.$row_subfolder_created_user["createdAt"].'</td>
							<td><a href="newdownloadSubFolder.php?id='.$row_subfolder_created_user['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFolder.php?id='.$row_subfolder_created_user['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="beforeDeleteFolder.php?id='.$row_subfolder_created_user['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
							</tr>
						   ';
			}

		}
		
		
		// show document when folder id is 0
		if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$str_user_data=mysqli_query($connect,"SELECT * FROM document_master WHERE document_name LIKE '%".$search."%' AND folder_id= '0' AND created_user_id<>'".$userName."'");
		}
		else
		{
			$str_user_data=mysqli_query($connect,"SELECT * FROM document_master WHERE folder_id= '0' AND created_user_id<>'".$userName."'");
		}
		while($row_user_data=mysqli_fetch_array($str_user_data))
		{
			$assign_user_array=explode(",",$row_user_data['assigned_user_id']);
			//print_r($assign_user_array);
			if(in_array($userName,$assign_user_array))
			{
				$new_userdata=implode(",",$assign_user_array);
				//echo $new_userdata."<br>";
	
				//echo $row_user_data['document_name']."<br>";
				$file_type	= $row_user_data['document_type'];
								
				if($file_type == 'mp3' || $file_type == 'aif' || $file_type == 'cda' || $file_type == 'mid' || $file_type == 'midi' || $file_type == 'mpa' || $file_type == 'ogg' || $file_type == 'wav' || $file_type == 'wna' || $file_type == 'aac')
				{
					$icon_color="audioicon.png";
					$icon_title="Audio icon";
				}
				else if($file_type == 'mp4' || $file_type == '3gp' || $file_type == '3gp2' || $file_type == '3g2' || $file_type == '3gpp' || $file_type == '3gpp2' || $file_type == 'ogg' || $file_type == 'oga' || $file_type == 'ogv' || $file_type == 'ogx' || $file_type == 'wnv' || $file_type == 'wma' || $file_type == 'asf' || $file_type == 'webm' || $file_type == 'flv' || $file_type == 'avi' || $file_type == 'gif' || $file_type=='wmv')
				{
					$icon_color="video-icon.png";
					$icon_title="video icon";
				}
				else if($file_type == 'xlsx')
				{
					$icon_color="Excel-icon.png";
					$icon_title="Excel icon";
				}
				else if($file_type == 'docx')
				{
					$icon_color="Word-icon.png";
					$icon_title="docx icon";
				}
				else if($file_type == 'pdf')
				{
					$icon_color="Adobe-Reader.PNG";
					$icon_title="Pdf icon";
				}
				else if($file_type == 'txt')
				{
					$icon_color="text-icon1.PNG";
					$icon_title="Text icon";
				}
				else if($file_type == 'jpg' || $file_type == 'png' || $file_type == 'svg' || $file_type=='jpeg')
				{
					$icon_color="image-icon1.png";
					$icon_title="image icon";
				}
				else if($file_type == 'zip')
				{
					$icon_color="rar.png";
					$icon_title="zip icon";
				}
				/* <a href="#" class="btndocumentUpdate" data-documentupdate-id="'.$row_file['id'].'"><i class="fa fa-trash fa-1x"></i></a></td> */
				//echo $row_user_data["document_name"];
				if($showcnt_document>=$startno_document && $showcnt_document<$end_no_document)
							{
				$output .= '
					<tr>
					<td><img src="icon/'.$icon_color.'" width="35" height="35" alt="Excel icon" title="'.$icon_title.'">&nbsp;&nbsp;'.$row_user_data["document_name"].'</td>
					<td>'.$row_user_data["created_user_id"].'</td>
					<td>'.$row_user_data["createdAt"].'</td>
					<td><a href="downloadFile.php?id='.$row_user_data['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row_user_data['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btndocumentUpdate" data-documentupdate-id="'.$row_user_data['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
					</tr>
				';
							}
							$showcnt_document++;
		
			}
		}//end document
		
		
		//show assign document
		if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$str_document_data_assign_in_folder = mysqli_query($connect,"SELECT * FROM document_master WHERE document_name LIKE '%".$search."%' AND created_user_id='".$userName."' LIMIT $offset, $total_records_per_page");
		}else{
			
			$str_document_data_assign_in_folder= mysqli_query($connect,"SELECT * FROM document_master WHERE created_user_id='".$userName."' LIMIT $offset, $total_records_per_page");
			
		}
		while($row_user_data_infolder=mysqli_fetch_array($str_document_data_assign_in_folder))
		{
			$assign_user_array_infolder=explode(",",$row_user_data_infolder['assigned_user_id']);
			
			//print_r($assign_user_array_infolder)."<br>";
			/* if(in_array($userName,$assign_user_array_infolder))
			{ */
				$new_userdata=implode(",",$assign_user_array_infolder);
				//echo $new_userdata."<br>";
	
				//echo $row_user_data_infolder['document_name']."<br>";
				$file_type	= $row_user_data_infolder['document_type'];
					
				if($file_type == 'mp3' || $file_type == 'aif' || $file_type == 'cda' || $file_type == 'mid' || $file_type == 'midi' || $file_type == 'mpa' || $file_type == 'ogg' || $file_type == 'wav' || $file_type == 'wna' || $file_type == 'aac')
				{
					$icon_color="audioicon.png";
					$icon_title="Audio icon";
				}
				else if($file_type == 'mp4' || $file_type == '3gp' || $file_type == '3gp2' || $file_type == '3g2' || $file_type == '3gpp' || $file_type == '3gpp2' || $file_type == 'ogg' || $file_type == 'oga' || $file_type == 'ogv' || $file_type == 'ogx' || $file_type == 'wnv' || $file_type == 'wma' || $file_type == 'asf' || $file_type == 'webm' || $file_type == 'flv' || $file_type == 'avi' || $file_type == 'gif' || $file_type == 'wmv')
				{
					$icon_color="video-icon.png";
					$icon_title="video icon";
				}
				else if($file_type == 'xlsx' || $file_type=='xls')
				{
					$icon_color="Excel-icon.png";
					$icon_title="Excel icon";
				}
				else if($file_type == 'docx')
				{
					$icon_color="Word-icon.png";
					$icon_title="docx icon";
				}
				else if($file_type == 'pdf')
				{
					$icon_color="Adobe-Reader.png";
					$icon_title="Pdf icon";
				}
				else if($file_type == 'txt' || $file_type =='TXT')
				{
					
					$icon_color="text-icon1.PNG";
					$icon_title="Text icon";
				}
				else if($file_type == 'jpg' || $file_type == 'png' || $file_type == 'PNG' || $file_type == 'svg' || $file_type=='jpeg')
				{
					$icon_color="image-icon1.png";
					$icon_title="image icon";
				}
				else if($file_type == 'zip')
				{
					$icon_color="rar.png";
					$icon_title="zip icon";
				}
				
				//echo $row_user_data_infolder['document_name'];
				if($showcnt_document>=$startno_document && $showcnt_document<$end_no_document)
							{
				$output .= '
					<tr>
					<td><img src="icon/'.$icon_color.'" width="35" height="35" alt="Excel icon" title="'.$icon_title.'">&nbsp;&nbsp;'.$row_user_data_infolder["document_name"].'</td>
					<td>'.$row_user_data_infolder["created_user_id"].'</td>
					<td>'.$row_user_data_infolder["createdAt"].'</td>
					<td><a href="downloadFile.php?id='.$row_user_data_infolder['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row_user_data_infolder['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btndocumentUpdate" data-documentupdate-id="'.$row_user_data_infolder['id'].'"><i class="fa fa-trash fa-1x"></i></a></td></td>
					</tr>
				';
							}
						$showcnt_document++;
		
			//}
		}//end document
		
		
		
		
		
		
		$result = mysqli_query($connect, $query);
		/* if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query = " SELECT * FROM folder_master WHERE folder_name LIKE '%".$search."%' AND created_user_id <> '".$userName."' AND assigned_user_id= '".$userName."' LIMIT $offset, $total_records_per_page";
		}
		else
		{
			$query = "
			SELECT * FROM folder_master WHERE assigned_user_id='".$userName."' AND created_user_id <> '".$userName."' ORDER BY id LIMIT $offset, $total_records_per_page";
		}	 */
		
		
		/* if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query1 = " SELECT * FROM sub_folder_master WHERE folder_name LIKE '%".$search."%'  AND created_user_id <> '".$userName."'  AND assigned_user_id= '".$userName."' LIMIT $offset, $total_records_per_page";
		}
		else
		{
			$query1 = "
			SELECT * FROM sub_folder_master WHERE assigned_user_id='".$userName."'  AND created_user_id <> '".$userName."' ORDER BY id LIMIT $offset, $total_records_per_page";
		}	 */

		
		/* if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query2 = " SELECT * FROM document_master WHERE document_name LIKE '%".$search."%' LIMIT $offset, $total_records_per_page";
		}else{
			$query2 = " ";
			
		} */
		
		
		/* if(isset($_POST["query"])){
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query3 = " SELECT * FROM document_master WHERE document_name LIKE '%".$search."%' AND created_user_id='".$userName."' LIMIT $offset, $total_records_per_page";
		}else{
			$query3 = " SELECT * FROM document_master WHERE created_user_id='".$userName."' LIMIT $offset, $total_records_per_page";
		} */
		
		
		/* if(isset($_POST["query"])){
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query4 = " SELECT * FROM folder_master WHERE folder_name LIKE '%".$search."%' AND created_user_id='".$userName."' LIMIT $offset, $total_records_per_page";
		}else{
			$query4 = " SELECT * FROM folder_master WHERE created_user_id='".$userName."' LIMIT $offset, $total_records_per_page";
		} */
		
		
		/* if(isset($_POST["query"])){
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query5 = " SELECT * FROM sub_folder_master WHERE folder_name LIKE '%".$search."%' AND created_user_id='".$userName."' LIMIT $offset, $total_records_per_page";
		}else{
			$query5 = " SELECT * FROM sub_folder_master WHERE created_user_id='".$userName."' LIMIT $offset, $total_records_per_page";
		} */
			
		
		
		/* $resultForFolder = mysqli_query($connect, $query);
		$resultForSubFolder = mysqli_query($connect, $query1);
		$resultForDocuments= mysqli_query($connect, $query2);
		
		$resultForDocumentsWithCreatedBy= mysqli_query($connect, $query3);
		$resultForFoldersWithCreatedBy= mysqli_query($connect, $query4);
		$resultForSubFoldersWithCreatedBy= mysqli_query($connect, $query5);
		
		if(mysqli_num_rows($result) > 0 || mysqli_num_rows($resultForFolder) > 0 || mysqli_num_rows($resultForSubFolder) > 0 || mysqli_num_rows($resultForDocuments) > 0 || mysqli_num_rows($resultForDocumentsWithCreatedBy) > 0 || mysqli_num_rows($resultForFoldersWithCreatedBy) > 0 || mysqli_num_rows($resultForSubFoldersWithCreatedBy) > 0 )
		{
		    
		    $output .= '<div class="table-responsive" style="width:1000px;">
						<table class="table bordered">
							<tr>
								<th>Name</th>
								<th>Created By</th>
								<th>Created At</th>
								<th>Options</th>
							</tr>';
							
			while($rowForFoldersWithCreatedBy = mysqli_fetch_array($resultForFoldersWithCreatedBy)){
				$output .= '
					<tr>
					<td><a href="viewFolderFiles.php?id='.$rowForFoldersWithCreatedBy['id'].'"><img src="icon/Blank-Folder-icon.png" width="35" height="35" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$rowForFoldersWithCreatedBy["folder_name"].'</a></td>
					<td>'.$rowForFoldersWithCreatedBy["created_user_id"].'</td>
					<td>'.$rowForFoldersWithCreatedBy["createdAt"].'</td>
					<td><a href="download_zip_file.php?id='.$rowForFoldersWithCreatedBy['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFolder.php?id='.$rowForFoldersWithCreatedBy['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="beforeDeleteFolder.php?id='.$rowForFoldersWithCreatedBy['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
					</tr>
				';
			}
								
			while($rowForFolder = mysqli_fetch_array($resultForFolder)){
				$output .= ' 
					<tr>
					<td><a href="viewFolderFiles.php?id='.$rowForFolder['id'].'"><img src="icon/Blank-Folder-icon.png" width="35" height="35" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$rowForFolder["folder_name"].'</a></td>
					<td>'.$rowForFolder["created_user_id"].'</td>
					<td>'.$rowForFolder["createdAt"].'</td>
					<td><a href="download_zip_file.php?id='.$rowForFolder['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFolder.php?id='.$rowForFolder['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="beforeDeleteFolder.php?id='.$rowForFolder['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
					</tr>
				';
			}	
			
			while($rowForSubFoldersWithCreatedBy= mysqli_fetch_array($resultForSubFoldersWithCreatedBy)){
				$output .= '
					<tr>
					<td><a href="viewFolderFiles.php?id='.$rowForSubFoldersWithCreatedBy['id'].'"><img src="icon/Blank-Folder-icon.png" width="35" height="35" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$rowForSubFoldersWithCreatedBy["folder_name"].'</a></td>
					<td>'.$rowForSubFoldersWithCreatedBy["created_user_id"].'</td>
					<td>'.$rowForSubFoldersWithCreatedBy["createdAt"].'</td>
					<td><a href="newdownloadSubFolder.php?id='.$rowForSubFoldersWithCreatedBy['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFolder.php?id='.$rowForSubFoldersWithCreatedBy['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="beforeDeleteFolder.php?id='.$rowForSubFoldersWithCreatedBy['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
					</tr>
				';
			}
			
			//while($rowForSubFolder = mysqli_fetch_array($resultForSubFolder)){
			    
				$sql_for_main_folder= "select DISTINCT * from folder_master where assigned_user_id <> '".$userName."'";
				$result_for_main_folder= mysqli_query($connect, $sql_for_main_folder);
				while($row_for_main_folder= mysqli_fetch_array($result_for_main_folder)){
					
					$sql_for_sub_folder= "select DISTINCT * from sub_folder_master where assigned_user_id='".$userName."' And folder_master_id='".$row_for_main_folder['id']."' ";
					$result_for_sub_folder= mysqli_query($connect, $sql_for_sub_folder);
						while($row_for_sub_folder= mysqli_fetch_array($result_for_sub_folder)){
							
							$output .= '
						<tr>
						<td><a href="viewFolderFiles.php?id='.$row_for_sub_folder['id'].'"><img src="icon/Blank-Folder-icon.png" width="35" height="35" alt="folder icon" title="folder icon">&nbsp;&nbsp;'.$row_for_sub_folder["folder_name"].'</a></td>
						<td>'.$row_for_sub_folder["created_user_id"].'</td>
						<td>'.$row_for_sub_folder["createdAt"].'</td>
						<td><a href="newdownloadSubFolder.php?id='.$row_for_sub_folder['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFolder.php?id='.$row_for_sub_folder['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="beforeDeleteSubFolderFiles.php?id='.$row_for_sub_folder['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
						</tr>
						';	
						}
						
					
				}
			//}	
			while($row = mysqli_fetch_array($result))
			{
				
				$file_type	= $row['document_type'];
								
				if($file_type == 'mp3' || $file_type == 'aif' || $file_type == 'cda' || $file_type == 'mid' || $file_type == 'midi' || $file_type == 'mpa' || $file_type == 'ogg' || $file_type == 'wav' || $file_type == 'wna' || $file_type == 'aac')
				{
					$icon_color="audioicon.PNG";
					$icon_title="Audio icon";
				}
				else if($file_type == 'mp4' || $file_type == '3gp' || $file_type == '3gp2' || $file_type == '3g2' || $file_type == '3gpp' || $file_type == '3gpp2' || $file_type == 'ogg' || $file_type == 'oga' || $file_type == 'ogv' || $file_type == 'ogx' || $file_type == 'wnv' || $file_type == 'wma' || $file_type == 'asf' || $file_type == 'webm' || $file_type == 'flv' || $file_type == 'avi' || $file_type == 'gif')
				{
					$icon_color="video-icon.png";
					$icon_title="video icon";
				}
				else if($file_type == 'xlsx')
				{
					$icon_color="Excel-icon.png";
					$icon_title="Excel icon";
				}
				else if($file_type == 'docx')
				{
					$icon_color="Word-icon.png";
					$icon_title="docx icon";
				}
				else if($file_type == 'pdf')
				{
					$icon_color="Adobe-Reader.PNG";
					$icon_title="Pdf icon";
				}
				else if($file_type == 'txt')
				{
					$icon_color="text-icon1.PNG";
					$icon_title="Text icon";
				}
				else if($file_type == 'jpg' || $file_type == 'png' || $file_type == 'svg' || $file_type=='jpeg')
				{
					$icon_color="Image-icon1.png";
					$icon_title="image icon";
				}
				else if($file_type == 'zip')
				{
					$icon_color="rar.png";
					$icon_title="zip icon";
				}
				
				
				$output .= '
					<tr>
					<td><img src="icon/'.$icon_color.'" width="35" height="35" alt="Excel icon" title="'.$icon_title.'">&nbsp;&nbsp;'.$row["document_name"].'</td>
					<td>'.$row["created_user_id"].'</td>
					<td>'.$row["createdAt"].'</td>
					<td><a href="downloadFile.php?id='.$row['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="beforeDeleteFile.php?id='.$row['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
					</tr>
				';
			}
			
		    $sql_for_get_folderId_from_folder_master_which_not_accessed_by_this_user= "select * from folder_master where assigned_user_id<>'".$userName."'";
			$result_for_get_folderId_from_folder_master_which_not_accessed_by_this_user=mysqli_query($connect, $sql_for_get_folderId_from_folder_master_which_not_accessed_by_this_user);
			while($row_for_get_folderId_from_folder_master_which_not_accessed_by_this_user= mysqli_fetch_array($result_for_get_folderId_from_folder_master_which_not_accessed_by_this_user)){
        		$folderId_from_folder_master= $row_for_get_folderId_from_folder_master_which_not_accessed_by_this_user['id'];
        		$sql_for_get_folderId_from_sub_folder_master_which_not_accessed_by_this_user="select * from sub_folder_master where assigned_user_id<>'".$userName."' AND folder_master_id='".$folderId_from_folder_master."'";
        		$result_for_get_folderId_from_sub_folder_master_which_not_accessed_by_this_user= mysqli_query($connect, $sql_for_get_folderId_from_sub_folder_master_which_not_accessed_by_this_user);
        		while($row_for_get_folderId_from_sub_folder_master_which_not_accessed_by_this_user= mysqli_fetch_array($result_for_get_folderId_from_sub_folder_master_which_not_accessed_by_this_user)){
        			$folderId_from_sub_folder_master= $row_for_get_folderId_from_sub_folder_master_which_not_accessed_by_this_user['id'];
        			$sql_for_get_files_from_doc_master_which_accessed_by_this_user= "select * from document_master where assigned_user_id='".$userName."' AND folder_id='".$folderId_from_sub_folder_master."'";
        			$result_for_get_files_from_doc_master_which_accessed_by_this_user= mysqli_query($connect, $sql_for_get_files_from_doc_master_which_accessed_by_this_user);
        			while($row_for_get_files_from_doc_master_which_accessed_by_this_user= mysqli_fetch_array($result_for_get_files_from_doc_master_which_accessed_by_this_user)){
        				
						$file_type	= $row_for_get_files_from_doc_master_which_accessed_by_this_user['document_type'];
								
				if($file_type == 'mp3' || $file_type == 'aif' || $file_type == 'cda' || $file_type == 'mid' || $file_type == 'midi' || $file_type == 'mpa' || $file_type == 'ogg' || $file_type == 'wav' || $file_type == 'wna' || $file_type == 'aac')
				{
					$icon_color="audioicon.PNG";
					$icon_title="Audio icon";
				}
				else if($file_type == 'mp4' || $file_type == '3gp' || $file_type == '3gp2' || $file_type == '3g2' || $file_type == '3gpp' || $file_type == '3gpp2' || $file_type == 'ogg' || $file_type == 'oga' || $file_type == 'ogv' || $file_type == 'ogx' || $file_type == 'wnv' || $file_type == 'wma' || $file_type == 'asf' || $file_type == 'webm' || $file_type == 'flv' || $file_type == 'avi' || $file_type == 'gif')
				{
					$icon_color="video-icon.png";
					$icon_title="video icon";
				}
				else if($file_type == 'xlsx')
				{
					$icon_color="Excel-icon.png";
					$icon_title="Excel icon";
				}
				else if($file_type == 'docx')
				{
					$icon_color="Word-icon.png";
					$icon_title="docx icon";
				}
				else if($file_type == 'pdf')
				{
					$icon_color="Adobe-Reader.PNG";
					$icon_title="Pdf icon";
				}
				else if($file_type == 'txt')
				{
					$icon_color="text-icon1.PNG";
					$icon_title="Text icon";
				}
				else if($file_type == 'jpg' || $file_type == 'png' || $file_type == 'svg' || $file_type=='jpeg')
				{
					$icon_color="Image-icon1.png";
					$icon_title="image icon";
				}
				else if($file_type == 'zip')
				{
					$icon_color="rar.png";
					$icon_title="zip icon";
				}
										
						$output .= '
        					<tr>
        					<td><img src="icon/'.$icon_color.'" width="35" height="35" alt="Excel icon" title="'.$icon_title.'">&nbsp;&nbsp;'.$row_for_get_files_from_doc_master_which_accessed_by_this_user["document_name"].'</td>
        					<td>'.$row_for_get_files_from_doc_master_which_accessed_by_this_user["created_user_id"].'</td>
        					<td>'.$row_for_get_files_from_doc_master_which_accessed_by_this_user["createdAt"].'</td>
        					<td><a href="downloadFile.php?id='.$row_for_get_files_from_doc_master_which_accessed_by_this_user['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row_for_get_files_from_doc_master_which_accessed_by_this_user['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="beforeDeleteFile.php?id='.$row_for_get_files_from_doc_master_which_accessed_by_this_user['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
        					</tr>
        				';
        				
        			}
        			
        			
        		}
        		
        	}
			while($rowForGetDocumentsCreatedByUser= mysqli_fetch_array($resultForDocumentsWithCreatedBy)){
				
				$file_type	= $rowForGetDocumentsCreatedByUser['document_type'];
								
				if($file_type == 'mp3' || $file_type == 'aif' || $file_type == 'cda' || $file_type == 'mid' || $file_type == 'midi' || $file_type == 'mpa' || $file_type == 'ogg' || $file_type == 'wav' || $file_type == 'wna' || $file_type == 'aac')
				{
					$icon_color="audioicon.PNG";
					$icon_title="Audio icon";
				}
				else if($file_type == 'mp4' || $file_type == '3gp' || $file_type == '3gp2' || $file_type == '3g2' || $file_type == '3gpp' || $file_type == '3gpp2' || $file_type == 'ogg' || $file_type == 'oga' || $file_type == 'ogv' || $file_type == 'ogx' || $file_type == 'wnv' || $file_type == 'wma' || $file_type == 'asf' || $file_type == 'webm' || $file_type == 'flv' || $file_type == 'avi' || $file_type == 'gif')
				{
					$icon_color="video-icon.png";
					$icon_title="video icon";
				}
				else if($file_type == 'xlsx')
				{
					$icon_color="Excel-icon.png";
					$icon_title="Excel icon";
				}
				else if($file_type == 'docx')
				{
					$icon_color="Word-icon.png";
					$icon_title="docx icon";
				}
				else if($file_type == 'pdf')
				{
					$icon_color="Adobe-Reader.PNG";
					$icon_title="Pdf icon";
				}
				else if($file_type == 'txt')
				{
					$icon_color="text-icon1.PNG";
					$icon_title="Text icon";
				}
				else if($file_type == 'jpg' || $file_type == 'png' || $file_type == 'svg' || $file_type=='jpeg')
				{
					$icon_color="Image-icon1.png";
					$icon_title="image icon";
				}
				else if($file_type == 'zip')
				{
					$icon_color="rar.png";
					$icon_title="zip icon";
				}
				
				
				
				
				$output .= '
        		<tr>
        			<td><img src="icon/'.$icon_color.'" width="35" height="35" alt="Excel icon" title="'.$icon_title.'">&nbsp;&nbsp;'.$rowForGetDocumentsCreatedByUser["document_name"].'</td>
        			<td>'.$rowForGetDocumentsCreatedByUser["created_user_id"].'</td>
        			<td>'.$rowForGetDocumentsCreatedByUser["createdAt"].'</td>
        			<td><a href="downloadFile.php?id='.$rowForGetDocumentsCreatedByUser['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$rowForGetDocumentsCreatedByUser['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="beforeDeleteFile.php?id='.$rowForGetDocumentsCreatedByUser['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
        		</tr>
        		';
			}
			 */
			echo $output;
		}
		else
		{
			//echo 'Data Not Found';
		}	
	//}
	//}
//include('paggination.php');	
?>

</html>
