<?php
error_reporting(0);
?>
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
	
	$(document).on("click",".btndocumentdelete",function()
	{
		var id=$(this).data("deletefile-id");
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
	$offset=$_POST['offset_data'];
	$total_records_per_page=$_POST['total_records_per_page_data'];
	//echo $offset." ".$total_records_per_page."<br>";
	$output = '';
		
		$output .= '<div class="table-responsive">
			<table class="table bordered pictable">
				<tr>
					<th class="picname">Name</th>
					<th class="piccreateby">Created By</th>
					<th class="piccreateat">Created At</th>
					<th class="picoption">Options</th>
				</tr>';
	
	if($userName== "admin"){
    	
    	
		$doc_Type_array= array();

		//get connection
		include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

		// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
		// if ($conn->connect_error) { // Check connection
		// 	die("Connection failed: " . $conn->connect_error);
		// } 
				
		$sql="SELECT * FROM document_master LIMIT ".$offset.",".$total_records_per_page;
		$result= mysqli_query($conn, $sql);
				
		while($row = mysqli_fetch_array($result)){
			$doc_type=$row['document_type'];
			$doc_name=$row['document_name'];
			//echo $doc_type."<br>";
			//echo "<br>";
			//$doc_Type_array[]=$row['document_type'];
    		$documentType_allowed = array('doc', 'DOC', 'docx', 'DOCX', 'pdf', 'PDF', 'TXT', 'txt', 'xls', 'xlsx','zip');
    		//if(in_array($doc_type, $documentType_allowed)) {
    			//$doc_Type_array[]= 	$doc_name;
				
			}	
    	//foreach($doc_Type_array as $type){	
    		// $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
    		if(isset($_POST["query"]))
    		{
    			$search = mysqli_real_escape_string($conn, $_POST["query"]);
    			$document_query = "SELECT * FROM document_master WHERE document_type='doc' OR document_type='DOC' OR document_type='docx' OR document_type='DOCX' OR document_type='pdf' OR document_type='PDF' OR document_type='TXT' OR document_type='xls' OR document_type='xlsx' OR document_name LIKE '%".$search."%' LIMIT ".$offset.",".$total_records_per_page;
				
				
    		}
    		else
    		{
    			$document_query = "SELECT * FROM document_master WHERE document_type='doc' OR document_type='DOC' OR document_type='docx' OR document_type='DOCX' OR document_type='pdf' OR document_type='PDF' OR document_type='TXT' OR document_type='xls' OR document_type='xlsx' OR document_type='zip' LIMIT ".$offset.",".$total_records_per_page;
					//echo "<br>".$document_query."<br>";
    		}
    		$result_document = mysqli_query($conn, $document_query);
    		//$index--;
    		if(mysqli_num_rows($result_document) > 0)
    		{
    			while($row = mysqli_fetch_array($result_document))
    			{
    				$file_type	= $row['document_type'];
							
					if($file_type == 'xlsx' || $file_type=='xls')
					{
						$icon_color="Excel-icon.png";
						$icon_title="Excel icon";
					}
					else if($file_type == 'docx')
					{
						$icon_color="Word-icon.png";
						$icon_title="docx icon";
					}
					else if($file_type == 'doc')
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
						$icon_title="Zip icon";
					}		
						
					$output .= '
    						<tr>
    							<td><img src="icon/'.$icon_color.'" width="35" height="35" alt="Excel icon" title="'.$icon_title.'">&nbsp;&nbsp;'.$row["document_name"].'</td>
    							<td>'.$row["created_user_id"].'</td>
    							<td>'.$row["createdAt"].'</td>
    							<td><a href="downloadFile.php?id='.$row['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btndocumentdelete" data-deletefile-id='.$row['id'].'"><i class="fa fa-trash fa-1x"></i></a></td>
    						</tr>
    					';
    			}
    		}
					else
					{
						echo 'Data Not Found';
					}
					//echo "INDEX VALUE= ".$index;
					//$index--;
				//}
				echo $output;
				
    		//}
    	
    	//print_r($doc_Type_array);
    	$index=count($doc_Type_array)-1;
    	//echo "INDEX VALUE== ".$index;
    	
	}
	if($userName!= "admin"){
	    
		//echo $offset;
		$showcnt=0;
		$startno=$offset;
		$end_no=$_POST['pageno']*$total_records_per_page;
		/* echo "start record  = ".$startno."<br>";
		echo "end record  = ".$end_no."<br>";
		echo" showcnt =  ".$showcnt."<br>"; */
		
		$l=0;
		$document_id_array=array();
		//echo "login name = ".$userName."<br><br>";
    	$doc_Type_array= array();
    	// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
    	// if ($conn->connect_error) { // Check connection
    	// 	die("Connection failed: " . $conn->connect_error);
    	// } 
		
		
    	
		$allowed = array('doc', 'docx', 'DOC', 'DOCX', 'pdf', 'PDF','TXT', 'txt', 'xls', 'xlsx', 'zip');
		$output = '';
    	
							
				if(isset($_POST["query"]))
				{
					$search = mysqli_real_escape_string($conn, $_POST["query"]);
					
					$str="SELECT * FROM document_master WHERE document_name LIKE '%".$search."%'";
					$user_chk_query = mysqli_query($conn,$str);
					
				}
				else
				{
					$str="SELECT * FROM document_master";
					
					$user_chk_query=mysqli_query($conn,$str);
				
					
				}
		//echo $user_chk_query;
		if(mysqli_num_rows($user_chk_query) > 0){
			
			$output .= '<div class="table-responsive">
    					<table class="table bordered pictable">
				<tr>
					<th class="picname">Name</th>
					<th class="piccreateby">Created By</th>
					<th class="piccreateat">Created At</th>
					<th class="picoption">Options</th>
				</tr>';
							/* while($row_data_array=mysqli_fetch_array($user_chk_query))
							{
								$assigned_data_array=explode(",",$row_data_array['assigned_user_id']);
								if(in_array($userName,$assigned_data_array))
								{
									if(in_array($row_data_array['document_type'],$allowed))
									{
										$document_id_array[$l]=$row_data_array['id'];
										$l++;
									}
								}
							} */
							
							//print_r($document_id_array);
		while($row_chk_user=mysqli_fetch_array($user_chk_query))
		{
    		
			$assigned_data_array=explode(",",$row_chk_user['assigned_user_id']);
			
			if(in_array($userName,$assigned_data_array))
			{
					
					//echo $userName." ".$total_records_per_page."<br>";
					$new_login_userdata=implode(",",$assigned_data_array);
					
					
					
					if(in_array($row_chk_user['document_type'],$allowed))
					{
							
						if($showcnt>=$startno && $showcnt<$end_no)
						{
							$file_type	= $row_chk_user['document_type'];
										
							if($file_type == 'xlsx')
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
							else if($file_type == 'zip')
							{
								$icon_color="rar.PNG";
								$icon_title="Zip icon";
							}	
								
							
							$output .= '
									<tr>
										<td><img src="icon/'.$icon_color.'" width="35" height="35" alt="Excel icon" title="'.$icon_title.'">&nbsp;&nbsp;'.$row_chk_user["document_name"].'</td>
										<td>'.$row_chk_user["created_user_id"].'</td>
										<td>'.$row_chk_user["createdAt"].'</td>
										<td><a href="downloadFile.php?id='.$row_chk_user['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row_chk_user['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btndocumentdelete" data-deletefile-id='.$row_chk_user['id'].'><i class="fa fa-trash fa-1x"></i></a></td>
									</tr>
								';
								
						}	
							$showcnt++;
						
					}
						
			 }	
			 else if($row_chk_user['created_user_id']==$userName)
			{
					
					//echo $userName." ".$total_records_per_page."<br>";
					$new_login_userdata=implode(",",$assigned_data_array);
					
					
					
					if(in_array($row_chk_user['document_type'],$allowed))
					{
							
						if($showcnt>=$startno && $showcnt<$end_no)
						{
							$file_type	= $row_chk_user['document_type'];
										
							if($file_type == 'xlsx')
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
								$icon_color="text-icon1.png";
								$icon_title="Text icon";
							}	
							else if($file_type == 'zip')
							{
								$icon_color="rar.png";
								$icon_title="Zip icon";
							}	
								
							
							$output .= '
									<tr>
										<td><img src="icon/'.$icon_color.'" width="35" height="35" alt="Excel icon" title="'.$icon_title.'">&nbsp;&nbsp;'.$row_chk_user["document_name"].'</td>
										<td>'.$row_chk_user["created_user_id"].'</td>
										<td>'.$row_chk_user["createdAt"].'</td>
										<td><a href="downloadFile.php?id='.$row_chk_user['id'].'"><i class="fa fa-download fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editFile.php?id='.$row_chk_user['id'].'"><i class="fa fa-pencil-square-o fa-1x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btndocumentdelete" data-deletefile-id='.$row_chk_user['id'].'><i class="fa fa-trash fa-1x"></i></a></td>
									</tr>
								';
								
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