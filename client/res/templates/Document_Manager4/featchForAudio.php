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
<script type="text/javascript">
$(document).ready(function(){
	
	$(document).on("click",".btnaudiodelete",function()
	{
		var id=$(this).data("deleteaudio-id");
		var msg=confirm("Do you want to delete folder");
		//alert(id);
		//alert(msg);
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
		else
		{
			//$('#result').html(data);
					location.reload(true);
		}
		
	});
});	
</script>

<?php
	session_start();
  $userName=$_SESSION["Login"];

 	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	//echo $userName;
	$offset=$_POST['offset_data'];
	$total_records_per_page=$_POST['total_records_per_page_data'];
	
	if($userName=="admin"){
		//echo $userName;
		$allowed= array();
		// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
		// if ($conn->connect_error) { // Check connection
		// 	die("Connection failed: " . $conn->connect_error);
		// } 
		
		$sql="SELECT * FROM document_master LIMIT ".$offset.",".$total_records_per_page;
		
		$result= mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)){
			$doc_type=$row['document_type'];
			$doc_name=$row['document_name'];
			
			$allowed = array('mp3', 'MP3', 'msv');
			
			
			//if(in_array($doc_type, $allowed))
			//{
				//echo $doc_type;
					$output = '';
					
		
			// $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
			if(isset($_POST["query"]))
			{
				$search = mysqli_real_escape_string($conn, $_POST["query"]);
				$query = "
					SELECT * FROM document_master WHERE document_name LIKE '%".$search."%' LIMIT ".$offset.",".$total_records_per_page;
			}
			else
			{
				$query = "
						SELECT * FROM document_master WHERE document_type='mp3' OR document_type='MP3' OR document_type='msv' LIMIT ".$offset.",".$total_records_per_page;
			}
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result) > 0)
			{
				$output .='<div class="table-responsive">
			<table class="table bordered pictable">
				<tr>
					<th class="picname">Name</th>
					<th class="piccreateby">Created By</th>
					<th class="piccreateat">Created At</th>
					<th class="picoption">Options</th>
				</tr>';
				
				while($row = mysqli_fetch_array($result))
				{
					if(in_array($row['document_type'],$allowed))
					{
						$output .= '
									<tr>
										<td><img src="icon/audioicon.png" width="35" height="35" alt="Video icon" title="Video icon">&nbsp;&nbsp;'.$row["document_name"].'</td>
										<td>'.$row["created_user_id"].'</td>
										<td>'.$row["createdAt"].'</td>
										<td><a href="downloadFile.php?id='.$row['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btnaudiodelete" data-deleteaudio-id='.$row['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
									</tr>
								';
					}
					
				}
			}
			else
			{
				echo 'Data Not Found';
			}
			//$index--;
		echo $output;
				
				
				
			//}
		}
		//print_r($doc_Type_array);
		//$index=count($doc_Type_array)-1;
		//echo "INDEX VALUE== ".$index;
		
		/*foreach($doc_Type_array as $type){	
			$connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
			if(isset($_POST["query"]))
			{
				$search = mysqli_real_escape_string($connect, $_POST["query"]);
				$query = "
				SELECT * FROM document_master WHERE document_name LIKE '%".$search."%' 
					AND document_name= '".$doc_Type_array[$index]."' ";
			}
			else
			{
				$query = "
					SELECT * FROM document_master WHERE document_name= '".$doc_Type_array[$index]."'";
			}
			$result = mysqli_query($connect, $query);
			//$index--;
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
					$output .= '
						<tr>
							<td><img src="icon/Audioicon.png" width="35" height="35" alt="Audio icon" title="Audio icon">&nbsp;&nbsp;'.$row["document_name"].'</td>
							<td>'.$row["created_user_id"].'</td>
							<td>'.$row["createdAt"].'</td>
							<td><a href="downloadFile.php?id='.$row['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" class="btnaudiodelete" data-deleteaudio-id='.$row['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
						</tr>
					';
				}
			}
			else
			{
				//echo 'Data Not Found';
			}
			//echo "INDEX VALUE= ".$index;
			$index--;
		}
		echo $output;*/
	}
	
	if($userName!= "admin"){
		
		$showcnt=0;
		$startno=$offset;
		$end_no=$_POST['pageno']*$total_records_per_page;
		
		$doc_Type_array= array();
		// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
		// if ($conn->connect_error) { // Check connection
		// 	die("Connection failed: " . $conn->connect_error);
		// } 
		$sql="SELECT * FROM document_master WHERE assigned_user_id= '".$userName."' LIMIT ".$offset.",".$total_records_per_page;
		$result= mysqli_query($conn, $sql);
		$allowed_user = array('mp3', 'MP3', 'msv');
		
		$output = '';
		
		if(isset($_POST["query"]))
				{
					$search = mysqli_real_escape_string($conn, $_POST["query"]);
					$user_chk_query = mysqli_query($conn,"SELECT * FROM document_master WHERE document_name LIKE '%".$search."%'");
					
				}
				else
				{
					$user_chk_query = mysqli_query($conn,"SELECT * FROM document_master");
				}
		if(mysqli_num_rows($user_chk_query) > 0){
			
			$output .='<div class="table-responsive">
			<table class="table bordered pictable">
				<tr>
					<th class="picname">Name</th>
					<th class="piccreateby">Created By</th>
					<th class="piccreateat">Created At</th>
					<th class="picoption">Options</th>
				</tr>';
						
		
			while($row_chk_user=mysqli_fetch_array($user_chk_query))
			{
				
				$assigned_data_array=explode(",",$row_chk_user['assigned_user_id']);
				
				if(in_array($userName,$assigned_data_array))
				{
						$new_login_userdata=implode(",",$assigned_data_array);
			
					// $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
					
					if(in_array($row_chk_user['document_type'],$allowed_user))
					{
					
						if($showcnt>=$startno && $showcnt<$end_no)
							{
						$output .= '
							<tr>
								<td><img src="icon/audioicon.png" width="35" height="35" alt="Audio icon" title="Audio icon"></i>&nbsp;&nbsp;'.$row_chk_user["document_name"].'</td>
								<td>'.$row_chk_user["created_user_id"].'</td>
								<td>'.$row_chk_user["createdAt"].'</td>
								<td><a href="downloadFile.php?id='.$row_chk_user['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row_chk_user['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" class="btnaudiodelete" data-deleteaudio-id='.$row_chk_user['id'].'><i class="fa fa-trash fa-1x"></i></td>
							</tr>
						';
							}
							$showcnt++;
					}
					
				}
				else if($row_chk_user['created_user_id']==$userName)
				{
						$new_login_userdata=implode(",",$assigned_data_array);
			
					// $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
					
					if(in_array($row_chk_user['document_type'],$allowed_user))
					{
					
						if($showcnt>=$startno && $showcnt<$end_no)
							{
						$output .= '
							<tr>
								<td><img src="icon/audioicon.png" width="35" height="35" alt="Audio icon" title="Audio icon"></i>&nbsp;&nbsp;'.$row_chk_user["document_name"].'</td>
								<td>'.$row_chk_user["created_user_id"].'</td>
								<td>'.$row_chk_user["createdAt"].'</td>
								<td><a href="downloadFile.php?id='.$row_chk_user['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row_chk_user['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" class="btnaudiodelete" data-deleteaudio-id='.$row_chk_user['id'].'><i class="fa fa-trash fa-1x"></i></td>
							</tr>
						';
							}
							$showcnt++;
					}
					
				}
			}
		}
		else
		{
			echo 'Data Not Found';
		}
		echo $output;
	}
?>
</html>