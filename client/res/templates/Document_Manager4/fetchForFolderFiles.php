<html>
<head>
<script src="js3/jquery.min.js"></script>
<style>

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

</style>
</head>

<?php
	session_start();
	$folderID= $_SESSION['folderID'];
	
	$offset=$_POST['offset_data'];
	$total_records_per_page=$_POST['total_records_per_page_data'];
	//echo $offset." ".$total_records_per_page;

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	$connect=$conn;
	// $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	$output = '';
	if(isset($_POST["query"]))
	{
		$search = mysqli_real_escape_string($connect, $_POST["query"]);
		$query = "
		SELECT * FROM document_master WHERE document_name LIKE '%".$search."%' 
		AND folder_id= '".$folderID."' LIMIT $offset,$total_records_per_page";
	}
	else
	{	
		$query = "
		SELECT * FROM document_master WHERE folder_id= '".$folderID."' LIMIT $offset,$total_records_per_page";
	}
	$result = mysqli_query($connect, $query);

	if(isset($_POST["query"]))
	{
		$search = mysqli_real_escape_string($connect, $_POST["query"]);
		$query2 = " SELECT * FROM sub_folder_master WHERE folder_name LIKE '%".$search."%' AND folder_master_id='".$folderID."' LIMIT $offset,$total_records_per_page";
		
	}
	else
	{
		$query2 = "
		SELECT * FROM sub_folder_master WHERE folder_master_id='".$folderID."' LIMIT $offset,$total_records_per_page";
		
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
			$_SESSION['subfolderID']=$rowForFolder['id'];
			//echo $rowForFolder['id']."<br>";
			
				$share=$rowForFolder['assigned_user_id'];

					if($share=='')
					{
						$shre_folder_icon_image="Blank-Folder-icon.png";
					}
					else
					{
						$shre_folder_icon_image="share_folder2.png";
					}


			$output .= '
				<tr>
					<td><a href="viewSubFolderFiles.php?id='.$rowForFolder['id'].'"><img src="icon/'.$shre_folder_icon_image.'" width="35" height="35" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$rowForFolder["folder_name"].'</a></td>
					<td>'.$rowForFolder["created_user_id"].'</td>
					<td>'.$rowForFolder["createdAt"].'</td>
					<td><a href="newdownloadSubFolder.php?id='.$rowForFolder['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="editSubFolder.php?id='.$rowForFolder['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; <a class="btndeletesubfolder1" href="#" data-deletesubfolder-id="'.$rowForFolder['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
				</tr>
			';
		}					
		while($row = mysqli_fetch_array($result))
		{
			$file_type	= $row['document_type'];
								
				if($file_type == 'mp3' || $file_type == 'aif' || $file_type == 'cda' || $file_type == 'mid' || $file_type == 'midi' || $file_type == 'mpa' || $file_type == 'ogg' || $file_type == 'wav' || $file_type == 'wna' || $file_type == 'aac')
				{
					$icon_color="audioicon.png";
					$icon_title="Audio icon";
				}
				else if($file_type == 'mp4' || $file_type == '3gp' || $file_type == '3gp2' || $file_type == '3g2' || $file_type == '3gpp' || $file_type == '3gpp2' || $file_type == 'ogg' || $file_type == 'oga' || $file_type == 'ogv' || $file_type == 'ogx' || $file_type == 'wnv' || $file_type == 'wma' || $file_type == 'asf' || $file_type == 'webm' || $file_type == 'flv' || $file_type == 'avi' || $file_type == 'gif')
				{
					$icon_color="video-icon.png";
					$icon_title="video icon";
				}
				else if($file_type == 'xlsx' || $file_type == 'xls')
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
				else if($file_type == 'txt')
				{
					$icon_color="text-icon1.PNG";
					$icon_title="Text icon";
				}
				else if($file_type == 'zip')
				{
					$icon_color="rar.png";
					$icon_title="ZIP icon";
				}
				else if($file_type == 'jpg' || $file_type == 'png' || $file_type == 'svg' || $file_type=='jpeg')
				{
					$icon_color="image-icon1.png";
					$icon_title="image icon";
				}
				
			
			
			
			$output .= '
				<tr>
					<td><img src="icon/'.$icon_color.'" width="35" height="35" alt="Excel icon" title="'.$icon_title.'">&nbsp;&nbsp;'.$row["document_name"].'</td>
					<td>'.$row["created_user_id"].'</td>
					<td>'.$row["createdAt"].'</td>
					<td><a href="downloadFile.php?id='.$row['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="editFile.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" class="btndeletesubfolderfile" data-deletesubfolderfile-id='.$row['id'].'><i class="fa fa-trash fa-1x"></i></a></td>
				</tr>
			';
		}
		echo $output;
	}
	else
	{
		echo 'Data Not Found';
	}
?>
<script type="text/javascript">
$(document).ready(function(){
	
	$(document).on("click",".btndeletesubfolder1",function()
	{
		var id=$(this).data("deletesubfolder-id");
	//	alert(id);
		var msg=confirm("Do you want to delete folder");
		if(msg == true)
		{
			$.ajax({
				url:"beforeDeleteSubFolder.php",
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
					//alert(data);
					location.reload();
				}
				
			});
		}
		
	});
});

$(document).ready(function(){
	
	$(document).on("click",".btndeletesubfolderfile",function()
	{
		var id=$(this).data("deletesubfolderfile-id");
	//	alert(id);
		var msg=confirm("Do you want to delete folder");
		if(msg == true)
		{
			$.ajax({
				url:"newbeforeDeleteFile.php",
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
					//alert(data);
					location.reload();
				}
				
			});
		}
		
	});
});
</script>

</html>