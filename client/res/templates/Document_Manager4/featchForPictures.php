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
	
	$(document).on("click",".btnpicturedelete",function()
	{
		var id=$(this).data("deletepicture-id");
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
	session_start();
	$userName=$_SESSION["Login"];
	//$userName= "admin";
	$offset=$_POST['offset_data'];
	$total_records_per_page=$_POST['total_records_per_page_data'];
	//echo $offset." ".$total_records_per_page;
	
	if($userName== "admin"){
		
		$output = '';
		
		
		$doc_Type_array= array();
		//get connection
		include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
		// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
		// if ($conn->connect_error) { // Check connection
		// 	die("Connection failed: " . $conn->connect_error);
		// } 
				
		$sql=mysqli_query($conn,"SELECT * FROM document_master LIMIT ".$offset.",".$total_records_per_page);
						
		/* while($row = mysqli_fetch_array($result)){
			$doc_type=$row['document_type'];
			$doc_name=$row['document_name']; */
			//echo $doc_type;
			//echo "<br>";
			//$doc_Type_array[]=$row['document_type'];
			$allowed = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG');
			
			
				//$doc_Type_array[]= 	$doc_name;
				
			//$connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
			if(isset($_POST["query"]))
			{
				$search = mysqli_real_escape_string($conn, $_POST["query"]);
				$query_picture = "
					SELECT * FROM document_master WHERE document_name LIKE '%".$search."%' LIMIT ".$offset.",".$total_records_per_page;
					//echo $query_picture."<br>";
			}
			else
			{
				$query_picture = "
					SELECT * FROM document_master WHERE document_type='jpg' OR document_type='JPG' OR document_type='msv' OR document_type='jpeg' OR document_type='JPEG' OR document_type='png' OR document_type='PNG' LIMIT ".$offset.",".$total_records_per_page;
					//echo $query_picture."<br>";
			}
			$result = mysqli_query($conn, $query_picture);
			//$index--;
			if(mysqli_num_rows($result) > 0)
			{
				$output .= '<div class="table-responsive">
			<table class="table bordered pictable">
				<tr>
					<th class="picname">Name</th>
					<th class="piccreateby">Created By</th>
					<th class="piccreateat">Created At</th>
					<th class="picoption">Options</th>
				</tr>';
		
				while($row = mysqli_fetch_array($result))
				{
					//echo $row['document_type']."<br>";
					if(in_array($row['document_type'], $allowed)) {
					
					$output .= '
						<tr>
							<td><img src="icon/image-icon1.png" width="35" height="35" alt="picture icon" title="picture icon">&nbsp;&nbsp;'.$row["document_name"].'</td>
							<td>'.$row["created_user_id"].'</td>
							<td>'.$row["createdAt"].'</td>
							<td><a href="downloadFile.php?id='.$row['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btnpicturedelete" data-deletepicture-id='.$row['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
						</tr>';
						}
				}
			}else
			{
				echo 'Data Not Found';
			}
			//echo "INDEX VALUE= ".$index;
			//$index--;
		
		echo $output;
				
				
			
		//}
		//print_r($doc_Type_array);
		$index=count($doc_Type_array)-1;
				
		//echo "INDEX VALUE== ".$index;
		/*$output = '';
		
		$output .= '<div class="table-responsive" style="width:1000px;">
			<table class="table bordered">
				<tr>
					<th>Name</th>
					<th>Created By</th>
					<th>Created At</th>
					<th>Options</th>
				</tr>';
		 foreach($doc_Type_array as $type){	
			$connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
			if(isset($_POST["query"]))
			{
				$search = mysqli_real_escape_string($connect, $_POST["query"]);
				$query_picture = "
					SELECT * FROM document_master WHERE document_name LIKE '%".$search."%' 
						AND document_name= '".$doc_Type_array[$index]."'";
			}
			else
			{
				$query_picture = "
					SELECT * FROM document_master WHERE document_name= '".$doc_Type_array[$index]."'";
					echo $query_picture."<br>";
			}
			$result = mysqli_query($connect, $query_picture);
			//$index--;
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
					$output .= '
						<tr>
							<td><img src="icon/image-icon1.png" width="35" height="35" alt="picture icon" title="picture icon">&nbsp;&nbsp;'.$row["document_name"].'</td>
							<td>'.$row["created_user_id"].'</td>
							<td>'.$row["createdAt"].'</td>
							<td><a href="downloadFile.php?id='.$row['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btnpicturedelete" data-deletepicture-id='.$row['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
						</tr>';
				}
			}else
			{
				//echo 'Data Not Found';
			}
			//echo "INDEX VALUE= ".$index;
			$index--;
		}
		echo $output; */
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
		$allowed_user = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG');	
		
		
		$index=count($doc_Type_array)-1;
		
		$output = '';
		
		
				if(isset($_POST["query"]))
				{
					$search = mysqli_real_escape_string($conn, $_POST["query"]);
					
					$str_user=mysqli_query($conn,"SELECT * FROM document_master WHERE document_name LIKE '%".$search."%'");
				}
				else
				{
					$str_user=mysqli_query($conn,"SELECT * FROM document_master");
				}
		if(mysqli_num_rows($str_user) > 0){
			
			$output .= '<div class="table-responsive">
			<table class="table bordered pictable">
				<tr>
					<th class="picname">Name</th>
					<th class="piccreateby">Created By</th>
					<th class="piccreateat">Created At</th>
					<th class="picoption">Options</th>
				</tr>';
			
			
		while($row_user=mysqli_fetch_array($str_user))
		{
				$assign_array=explode(",",$row_user['assigned_user_id']);
				//print_r($assign_array)."<br>";
			if(in_array($userName,$assign_array))
			{
				
				$new_login_userdata=implode(",",$assign_array);
				
						if(in_array($row_user['document_type'],$allowed_user))
						{
							if($showcnt>=$startno && $showcnt<$end_no)
							{
							$output .= '
								<tr>
									<td><img src="icon/image-icon1.png" width="35" height="35" alt="picture icon" title="picture icon">&nbsp;&nbsp;'.$row_user["document_name"].'</td>
									<td>'.$row_user["created_user_id"].'</td>
									<td>'.$row_user["createdAt"].'</td>
									<td><a href="downloadFile.php?id='.$row_user['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row_user['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btnpicturedelete" data-deletepicture-id='.$row_user['id'].'><i class="fa fa-trash fa-1x"></i></a></td>
								</tr>';
							}
							$showcnt++;
						}
			}
			else if($row_user['created_user_id']==$userName)
			{
				
				$new_login_userdata=implode(",",$assign_array);
				
						if(in_array($row_user['document_type'],$allowed_user))
						{
							if($showcnt>=$startno && $showcnt<$end_no)
							{
							$output .= '
								<tr>
									<td><img src="icon/image-icon1.png" width="35" height="35" alt="picture icon" title="picture icon">&nbsp;&nbsp;'.$row_user["document_name"].'</td>
									<td>'.$row_user["created_user_id"].'</td>
									<td>'.$row_user["createdAt"].'</td>
									<td><a href="downloadFile.php?id='.$row_user['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row_user['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btnpicturedelete" data-deletepicture-id='.$row_user['id'].'><i class="fa fa-trash fa-1x"></i></a></td>
								</tr>';
							}
							$showcnt++;
						}
			}
		}
	}
	else{
		echo 'Data Not Found';
	}
echo $output;	
			
	}
?>
</html>