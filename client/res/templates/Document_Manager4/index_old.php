<?php
  session_start();
  $_SESSION["Login"]='admin';
  $_SESSION['idsForDelete']="";
?>
<?php
	error_reporting(0);
	$folderId= $_GET['id'];
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	$sql ="SELECT * FROM folder_master_3 WHERE id='".$folderId."'";
	$result = mysqli_query($conn, $sql);
	$row= mysqli_fetch_array($result);
	$assign_user=$row['assigned_user_id'];
	
	$access_user=$row['define_access'];
	$_SESSION['folderId']=$folderId;
	$_SESSION['oldFolderName']=$row['folder_name'];
?>
<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document Manager</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

<style>

 .material-icons {
        font-size: 18px;
    }
    .material-icons-outlined {
        font-size: 18px;
    }
    
    


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

.piccheck{
	width:4%;
}

.picname {
  width: 44%;
}
.piccreateby {
  width: 15%;
}
.piccreateat {
  width: 25%;
}
.picoption {
  width: 12%;
}
}

body {
    font-family: 'Roboto', sans-serif !important;
}

.button {
  cursor: pointer
}
.button-default {
    background-color: rgb(248, 248, 248);
    border: 1px solid rgba(204, 204, 204, 0.5);
    color: #5D5D5D;
}
.button-danger {
    background-color: #f44336;
    border: 1px solid #d32f2f;
    color: #f5f5f5
}
.link {
  padding: 5px 10px;
  cursor: pointer
}
</style>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <script src="vendor/jquery/jquery.min.js"></script>
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
		<script src="js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center">
		   	<a href="../../../../"> <img src="img/logo.png" alt="person" class="img-fluid"></a>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
        <!--   <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>D</strong><strong class="text-primary">M</strong></a></div> -->
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu" style="padding-top: 20px;">
          <ul id="side-main-menu" class="side-menu list-unstyled">
            <li title="Files/Folders"><a href="index.php" title="Files/Folders"> <i class="material-icons-outlined">folder</i><span>Files/Folders</span></a></li>
            <li title="Create Folder"><a href="creatFolder.php" title="Create Folder"> <i class="material-icons-outlined">create_new_folder</i><span>Create Folder</span></a></li>
            <li title="Upload Files"><a href="uploadFile.php" title="Upload Files"> <i class="material-icons-outlined">cloud_upload</i><span>Upload Files</span></a></li>
           <!-- <li><a href="documents.php?page_no=1"> <i class="fas fa-file"></i>Documents</a></li> -->
            <li title="Media Files"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse" title="Media Files"> <i class="material-icons-outlined">perm_media</i><span>Media Files</span></a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                 <li title="Pictures"><a href="viewPictures.php" title="Pictures"><i class="material-icons-outlined">collections</i><span>Pictures</span></a></li>
                <li title="Audio"><a href="viewAudio.php" title="Audio"><i class="material-icons-outlined">library_music</i><span>Audio</span></a></li>
                <li title="Video"><a href="viewVideo.php" title="Video"><i class="material-icons-outlined">video_library</i><span>Video</span></a></li>
              </ul>
            </li>
            <?php
              if($_SESSION["Login"]=="admin")
              {
                echo'<li title="Set Default File Size"><a href="setDefaultSizeLimit.php" title="Set Default File Size"><i class="material-icons-outlined">settings_backup_restore</i><span>Set Default File Size</span></a></li>';
                 echo'<li title="Delete Requests"><a href="deleteFileRequests.php" title="Delete Requests" title="Delete Requests"><i class="material-icons-outlined">delete</i><span>Delete Requests</span></a></li>';
              }
            ?>
          </ul>
        </div>
        	 <div class="navbar-header minimized-icon navbar-header-down">
             <a id="toggle-btn" href="#" class="menu-btn" style="color:#fff;text-decoration: none;"><i class="fas fa-chevron-left" aria-hidden="true"></i></a>
        	</div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header" ><a id="toggle-btn1" href="#" class="menu-btn  navbar-header-top"><i class="fa fa-bars" aria-hidden="true"></i></a>
               </div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Go To Dashboard-->
                <li class="nav-item"><a href="../../../../" class="nav-link logout"> <span class=" dashbtn d-sm-inline-block">Go To Dashboard</span></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <!-- Header Section-->
      <section class="dashboard-header section-padding">
        <div class="container-fluid">
           <div class="row d-flex align-items-md-stretch">
          
            <div class="col-xs-12 col-sm-12 col-md-12"> 
          <div class="">
          <div class="row mb-3">
          	<div class="col-md-6">
          		<h3 class="text-left">Files/Folders</h3>
          	</div>
            <div class="col-md-6" id="action">
              <div class="dropdown" >
								  <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown">Actions
								  </button>
								  <div class="dropdown-menu">
								  	<a  class="dropdown-item"  href="#" onclick="getFilesNameForShare()">Share</a>
								    <a class="dropdown-item"  href="downloadMultipleFilesAndFolders.php">Download</a>
								    <a href="#" onclick="deletedMultipleSelectedFiles()" class="dropdown-item">Delete</a>
								  </div>
								</div>
            </div>
          </div>

        <div id="result"></div>
        <script>
        	function getFilesNameForShare(){
        		//alert("INT GET FILE NAME FOR SHARE");
        		$.confirm({
                  title: '',
                  content: 'Do you want to Share files and folders?',
                   type: 'dark',
			         buttons: {
			            Ok: function () {
			              $.ajax({
			                url:"getFilesNameForShare.php",
			                method:"post",
			                //data:{ids:checkValues},
			                success:function(checkValues)
			                {
			                	var div= document.getElementById('filesNameForShare');
			                	div.innerHTML+=checkValues;
			                 	//alert(checkValues);

			                 	$("#ShareFolderModal").modal()	;
			                }
			              });
			            },
			            Cancel: function () {
			              location.reload();
			            },
			            },
			      });
        	}

        </script>
        
<?php

      $userName=$_SESSION['Login'];
	  $icon_color= "DEFAULT.png";
	  //echo $userName;
     $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	if($conn->connect_error){
		die("Connection Failed: ".$conn->connect_error);
	}
	if($userName== "admin"){
		$result = mysqli_query($conn, "SELECT * FROM folder_master_3");
		$output='';
		$output.= '<div class="table-responsive">
		<table id="example" class="display pictable" style="width:100%">
								<thead>
								<tr>
									 <th class="piccheck"><input type="checkbox" id="checkAll"></th>
									<th class="picname">Name</th>
               						<th class="piccreateby">Created By</th>
                					<th class="piccreateat">Last Modified</th>
				        			<th class="picsize">File Size</th>
              						<th class="picoption"></th>
								</tr>
								</thead>
								';
								
		while($row = mysqli_fetch_array($result)){
			$share=$row['assigned_user_id'];
					
						if($share=='')
						{
							$sharefolder_icon='Blank-Folder-icon.png';
						}	
						else{
							$sharefolder_icon='share_folder2.png';
						}
						$idForcheckBox=$row['prefix']." ".$row['id'];
			$output .= '
							<tr>
							<td><input type="checkbox" class="dropdown-item btnCheckBox" data-check-id="'.$idForcheckBox.'"  name="checkboxlist" value="'.$idForcheckBox.'"></td>
							<td title="'.$row["folder_name"].'"><a href="viewFolderFiles.php?id='.$row['id'].'"><img src="icon/'.$sharefolder_icon.'" width="30" height="30" alt="Excel icon" title="">&nbsp;&nbsp;'.$row["folder_name"].'</a></td>
							<td>'.$row["created_user_id"].'</td>
							<td>'.$row["createdAt"].'</td>
							<td>--</td>
							<td style="overflow:inherit"><div class="dropdown">
								  <button type="button" class="btn dropdown-toggle pull-right" data-toggle="dropdown">
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item" href="download_zip_file.php?id='.$row['id'].'">Download</a>
									<a  class="dropdown-item btnRename" data-rename-id="'.$idForcheckBox.'" href="#">Rename</a>
								    <a  class="dropdown-item btnShareSingle" data-sharesingle-id="'.$idForcheckBox.'" href="#">Share</a>
								    <a href="#" class="dropdown-item btnUpdate" data-update-id="'.$idForcheckBox.'">Delete</a>
								  </div>
								</div>
							</td>

							
							</tr>
						';
		}
		
		
		$result_for_docs = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=0");
		
		while($row_for_docs = mysqli_fetch_array($result_for_docs)){
			$file_type	= $row_for_docs['document_type'];
			//echo "File type== ".$file_type;
			//$icon_color= "DEFAULT.png";
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
					else if($file_type == 'docx' || $file_type =='doc')
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
					else
					{
						//$icon_color="DEFAULT.png";
						//$icon_title="Unknown icon";
					}
					$idForcheckBox=$row_for_docs['prefix']." ".$row_for_docs['id'];
			$output .= '
							<tr>
							<td><input type="checkbox" class="dropdown-item btnCheckBox" data-check-id="'.$idForcheckBox.'" name="checkboxlist" value="'.$idForcheckBox.'" ></td>
							<td title="'.$row_for_docs["document_name"].'"><img src="icon/'.$icon_color.'" width="30" height="30" alt="Excel icon">&nbsp;&nbsp;'.$row_for_docs["document_name"].'</td>
							<td>'.$row_for_docs["created_user_id"].'</td>
							<td>'.$row_for_docs["createdAt"].'</td>
							<td>'.number_format((float)$row_for_docs["document_size"]/(1024*1024),2,'.','').' MB</td>
							<td style="overflow:inherit"><div class="dropdown">
								  <button type="button" class="btn dropdown-toggle pull-right" data-toggle="dropdown">
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item" href="downloadFile.php?id='.$row_for_docs['id'].'">Download</a>
								    <a  class="dropdown-item btnRename" data-rename-id="'.$idForcheckBox.'" href="#">Rename</a>
								    <a  class="dropdown-item btnShareSingle" data-sharesingle-id="'.$idForcheckBox.'" href="#">Share</a>
								    <a href="#" class="dropdown-item btndocumentUpdate" data-documentupdate-id="'.$idForcheckBox.'">Delete</a>
								  </div>
								</div>
							</td>

							
							</tr>
						';
		}
		$output.='</table></div>';
		echo $output;
	}

//user section
if($userName!= "admin"){
		
		
		/* Code for get assigned user list and defined access */
		
		$result_fgmau = mysqli_query($conn, "SELECT * FROM folder_master_3");
		while($row_fgmau = mysqli_fetch_array($result_fgmau)){
			$assigned_user_id_array = array();
			$access_aaray = array();
			
			$assigned_user_id_array[] = preg_split("/\,/",$row_fgmau['assigned_user_id']);
			$access_aaray [] = preg_split("/\,/",$row_fgmau['define_access']);
			
			
			//echo "<br>ASSIGNED USER LIST = ".$row_fgmau['assigned_user_id']."<br>";
			//echo "<br>DEFINED ACCESS LIST = ".$row_fgmau['define_access']."<br>";
			
			$arrayLength= count($assigned_user_id_array);
			$arrayLengthDA= count($access_aaray);
			
			
		}
		/* End of code get assigned user list and defined access */
		
		
		
		
		//$result = mysqli_query($conn, "SELECT * FROM folder_master fm WHERE fm.assigned_user_id='achyut' OR fm.created_user_id='achyut'");
		
		$result = mysqli_query($conn, "SELECT * FROM folder_master_3");
		$output = '';
		$output.= '<div class="table-responsive">
							<table id="example" class="display table bordered pictable" style="width:100%">
								<thead>
								<tr>
									 <th class="piccheck"><input type="checkbox" id="checkAll"></th>
									<th class="picname">Name</th>
               						<th class="piccreateby">Created By</th>
                					<th class="piccreateat">Last Modified</th>
				        			<th class="picsize">File Size</th>
              						<th class="picoption"></th>
								</tr>
								</thead>';
		while($row = mysqli_fetch_array($result)){
								
					$share=$row['assigned_user_id'];
					
						if($share=='')
						{
							$sharefolder_icon='Blank-Folder-icon.png';
						}	
						else{
							$sharefolder_icon='share_folder2.png';
						}	
				$assign_array=explode(",",$row['assigned_user_id']);
					
				if(in_array($userName,$assign_array) || $row['created_user_id']==$userName)
				{		
				    $idForcheckBox=$row['prefix']." ".$row['id'];
			$output .= '
							<tr>
							<td><input type="checkbox" name="checkboxlist" value="'.$idForcheckBox.'" class="dropdown-item btnCheckBox" data-check-id="'.$idForcheckBox.'"></td>
							<td title="'.$row["folder_name"].'"><a href="viewFolderFiles.php?id='.$row['id'].'"><img src="icon/'.$sharefolder_icon.'" width="30" height="30" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$row["folder_name"].'</a></td>
							<td>'.$row["created_user_id"].'</td>
							<td>'.$row["createdAt"].'</td>
							<td>--</td>
							<td style="overflow:inherit"><div class="dropdown">
								  <button type="button" class="btn dropdown-toggle pull-right" data-toggle="dropdown">
								  </button>
								  <div class="dropdown-menu">
								     <a class="dropdown-item" href="download_zip_file.php?id='.$row['id'].'">Download</a>
								    <a class="dropdown-item btnRename" data-rename-id="'.$idForcheckBox.'" href="#">Rename</a>
								    <a  class="dropdown-item btnShareSingle" data-sharesingle-id="'.$idForcheckBox.'" href="#">Share</a>
								    <a href="#" class="btnUpdate dropdown-item" data-update-id="'.$idForcheckBox.'">Delete</a>
								  </div>
								</div>
							</td>
							</tr>
						';	
				}						
		}
		
		
		// remaining multiple user access
		
		
		$result_for_sub_folder = mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
		
		while($row_for_sub_folder = mysqli_fetch_array($result_for_sub_folder)){
			
			$assign_array_document=explode(",",$row_for_sub_folder['assigned_user_id']);
			
			if(in_array($userName,$assign_array_document) OR $row_for_sub_folder['created_user_id']==$userName)
			{
					//print_r($assign_array_document);echo" - ".$row_for_sub_folder['created_user_id']." - ".$row_for_sub_folder['folder_name'] ."<br>";
			$folder_master_id= $row_for_sub_folder['folder_master_id'];
			//echo "<br>Folder Master Id = ".$folder_master_id. "<br>";
			
			$result_for_main_folder_check= mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id='".$folder_master_id."'");
			
			while($row_for_main_folder = mysqli_fetch_array($result_for_main_folder_check)){
				$assign_array_document=explode(",",$row_for_main_folder['assigned_user_id']);
				
				
				if(!in_array($userName,$assign_array_document) && $row_for_main_folder['created_user_id']!=$userName){
					//echo "<br> Sub folder assigned user == ".$row_for_main_folder['assigned_user_id']."<br>"; 
					
					$idForcheckBox=$row_for_sub_folder['prefix']." ".$row_for_sub_folder['id'];
					$output .= '
							<tr>
							<td><input type="checkbox"name="checkboxlist" value="'.$idForcheckBox.'" class="dropdown-item btnCheckBox" data-check-id="'.$idForcheckBox.'"></td>
							<td title="'.$row_for_sub_folder["folder_name"].'"><a href="viewSubFolderFiles.php?id='.$row_for_sub_folder['id'].'"><img src="icon/'.$sharefolder_icon.'" width="30" height="30" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$row_for_sub_folder["folder_name"].'</a></td>
							<td>'.$row_for_sub_folder["created_user_id"].'</td>
							<td>'.$row_for_sub_folder["createdAt"].'</td>
							<td>--</td>
							<td style="overflow:inherit"><div class="dropdown">
								  <button type="button" class="btn dropdown-toggle pull-right" data-toggle="dropdown">
								  </button>
								  <div class="dropdown-menu">
								  		<a class="dropdown-item" href="newdownloadSubFolder.php?id='.$row_for_sub_folder['id'].'">Download</a>
								  	<a class="dropdown-item btnRename" data-rename-id="'.$idForcheckBox.'" href="#">Rename</a>
								  	<a  class="dropdown-item btnShareSingle" data-sharesingle-id="'.$idForcheckBox.'" href="#">Share</a>
								  	<a href="#" class="btnUpdate dropdown-item" data-update-id="'.$idForcheckBox.'">Delete</a>
								  </div>
								</div>
							</td>
							</tr>
						';	
				}
				
			}
		}
				
		}
		
		$result_for_docs = mysqli_query($conn, "SELECT * FROM document_master_3");
		
		while($row_for_docs = mysqli_fetch_array($result_for_docs)){
			
			$assign_array_document1=explode(",",$row_for_docs['assigned_user_id']);
			
			if(in_array($userName,$assign_array_document1) OR $row_for_docs['created_user_id']==$userName)
			{
				
			
			$folder_id = $row_for_docs['folder_id'];
			
			//echo "<br>FOLDER ID == ". $folder_id."<br>";
			$result_for_check_access = mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id='".$folder_id."'");
			
			
			while($row_for_check_access = mysqli_fetch_array($result_for_check_access)){
				$assigned_user_id_for_folder = $row_for_check_access['assigned_user_id'];
				$created_by_id = $row_for_check_access['created_user_id'];
				
				$file_type	= $row_for_docs['document_type'];
				//echo "File type== ".$file_type;
				//$icon_color= "DEFAULT.png";
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
					else if($file_type == 'docx' || $file_type == 'doc')
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
					$assign_array=explode(",",$row_for_check_access['assigned_user_id']);
			//print_r($assign_array);
				if(!in_array($userName,$assign_array) && $row_for_check_access['created_user_id']!=$userName)
				{
					$idForcheckBox=$row_for_docs['prefix']." ".$row_for_docs['id'];
					$output .= '
							<tr>
							<td><input type="checkbox" name="checkboxlist" value="'.$idForcheckBox.'" class="dropdown-item btnCheckBox" data-check-id="'.$idForcheckBox.'"></td>
							<td title="'.$row_for_docs["document_name"].'"><img src="icon/'.$icon_color.'" width="30" height="30" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$row_for_docs["document_name"].'</td>
							<td>'.$row_for_docs["created_user_id"].'</td>
							<td>'.$row_for_docs["createdAt"].'</td>
							<td>'.number_format((float)$row_for_docs["document_size"]/(1024*1024),2,'.','').' MB</td>

							<td style="overflow:inherit"><div class="dropdown">
								  <button type="button" class="btn dropdown-toggle pull-right" data-toggle="dropdown">
								  </button>
								  <div class="dropdown-menu">
								  	<a class="dropdown-item" href="downloadFile.php?id='.$row_for_docs['id'].'">Download</a>
								  	<a class="dropdown-item btnRename" data-rename-id="'.$idForcheckBox.'" href="#">Rename</a>
								  	<a  class="dropdown-item btnShareSingle" data-sharesingle-id="'.$idForcheckBox.'" href="#">Share</a>
								  	<a href="#" class="btnUpdate dropdown-item" onclick="Confirm(title, msg, $true, $false, $link)" data-update-id="'.$idForcheckBox.'">Delete</a>
								  </div>
								</div>
							</td>
						';
				}
			}
		}	
			
		}
		
		$res5 = mysqli_query($conn, "SELECT * FROM document_master_3 dm WHERE dm.folder_id='0' AND (dm.created_user_id='".$userName."' OR dm.assigned_user_id='".$userName."') ");
		while($row5 = mysqli_fetch_array($res5)){
		    	$file_type	= $row5['document_type'];
				//echo "File type== ".$file_type;
				//$icon_color= "DEFAULT.png";
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
					else if($file_type == 'docx' || $file_type == 'doc')
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
					$idForcheckBox=$row5['prefix']." ".$row5['id'];
		    $output .= '
							<tr>
							<td><input type="checkbox" name="checkboxlist" value="'.$idForcheckBox.'" class="dropdown-item btnCheckBox" data-check-id="'.$idForcheckBox.'"></td>
							<td title="'.$row5["document_name"].'"><img src="icon/'.$icon_color.'" width="30" height="30" alt="Excel icon" title="folder icon">&nbsp;&nbsp;'.$row5["document_name"].'</td>
							<td>'.$row5["created_user_id"].'</td>
							<td>'.$row5["createdAt"].'</td>
							<td>'.number_format((float)$row5["document_size"]/(1024*1024),2,'.','').' MB</td>

							<td style="overflow:inherit"><div class="dropdown">
								  <button type="button" class="btn dropdown-toggle pull-right" data-toggle="dropdown">
								  </button>
								  <div class="dropdown-menu">
								  	<a class="dropdown-item" href="downloadFile.php?id='.$row5['id'].'">Download</a>
								  	<a class="dropdown-item btnRename" data-rename-id="'.$idForcheckBox.'" href="#">Rename</a>
								  	<a  class="dropdown-item btnShareSingle" data-sharesingle-id="'.$idForcheckBox.'" href="#">Share</a>
								  	<a href="#" class="btnUpdate dropdown-item" onclick="Confirm(title, msg, $true, $false, $link)" data-update-id="'.$idForcheckBox.'">Delete</a>
								  </div>
								</div>
							</td>
							</tr>
						';
		
		}
		
		echo $output;
	}	
?>




</div>
      </div>
      <div style="clear:both"></div>
                  
          </div>
        </div>
      </section>
    
      
    </div>

  <!-- The Edit File Modal -->
<div class="modal" id="EditFileModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit File</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12"> 
              <div class="">
                <div class="row">
                  <div class="col-12 col-xs-12 col-sm-12 col-md-12 main">
                    <div class="">
                    <!--  <h2 class="text-center mb-4">Edit Folder</h2> -->
                      <form action="" method="post">
                        <!-- <input type="hidden" name="usercount" id="inputcountusers"> -->
                          <div class="row mb-3">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12">
                               <label>File Name</label>

                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12">
                              <input class="form-control" type="text" name="folderName" value="" >
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <button class="btn btn-default form-control" id="extraassigniser" type="submit" value="Edit Folder" name="editfolder" style="color:#0f243f;">Save Changes</button>
                            </div>
							
                          </div>
                       </form>
                    </div>
                  </div>
                </div>
              </div>
           </div>  
      </div>

    </div>
  </div>
</div>



    <!-- The Edit Folder Modal -->
<div class="modal" id="EditFolderModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Folder</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12"> 
              <div class="">
                <div class="row">
                  <div class="col-12 col-xs-12 col-sm-12 col-md-12 main">
                    <div class="">
                    <!--  <h2 class="text-center mb-4">Edit Folder</h2> -->
                      <!-- <form action="" method="post"> -->
                        <input type="hidden" name="usercount" id="inputcountusers">
                          <div class="row mb-3">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12">
                               <label>Folder Name</label>

                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12">
                              <input class="form-control" type="text" name="folderName" id="folderOrFileName" >
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <button class="btn btn-default form-control saveRenameBtn" style="color:#0f243f;">Save Changes</button>
                            </div>
							
                          </div>
                       <!-- </form> -->
                    </div>
                  </div>
                </div>
              </div>
           </div>  
      </div>

    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $(document).on("click",".saveRenameBtn",function()
			{
	//function saveRename(){
		alert("in saveRenameFileName");
		var val= document.getElementById('folderOrFileName').value;
		$.ajax({
			url:"saveRenameFileOrFolder.php",
			method:"post",
			data:{fileName:val},
			success:function(data)
			{
				
				//alert(data);
				if(data==1){
				    $.alert({
                        title: 'Success!',
                        content: 'Folder or file renamed successfully!',
                        buttons: {
                            Ok: function () {
                                window.location.reload();
                            },
                    });
				    
				//alert("Folder or file renamed successfully!");
					//window.location.reload();
				}
				if(data==0){
				     $.alert({
                        title: 'Alert!',
                        content: 'This folder/file name already exists!',
                        buttons: {
                            Ok: function () {
                                $("#EditFolderModal").modal();
                            },
                    });
					//alert("This folder/file name already exists");
					//$("#EditFolderModal").modal();
				}
				

				
			}
		}	
		//alert(val);
	}
	
		});
//	}
});	
});
</script>
<!-- The Share Folder Modal -->
<div class="modal" id="ShareFolderModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Share Folders/Files</h4>
        <button type="button" class="close" onclick="reloadPage()" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body modal-height">
      	
           <?php
					$conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
									if($conn->connect_error){
										die("Connection Error" . $conn->connect_error);
									}
									
									$total_usr= mysqli_query($conn, "SELECT count(*) as cnt_row FROM user where deleted='0'");
									$total_usr=mysqli_fetch_array($total_usr);
									$total_usr_chk=$total_usr['cnt_row'];	
									//echo $total_usr_chk;
								?>
            <div class="col-xs-12 col-sm-12 col-md-12 "> 
              <div class="">
                <div class="row">
                  <div class="col-12 col-xs-12 col-sm-12 col-md-12 main">
                    <div class="">
                    <form action="#" method="post"> 
                      <!-- 	<form action="" method="post"> -->
                       <!--  <input type="hidden" name="usercount" id="inputcountusers"> -->
                       <div class="row">
                         		<div class="" id="filesNameForShare" style="width:100%;">
                            			
                               
                           		 </div>
                           		 <input type="hidden" name="accessCount"  id="accessCount"/>
                       </div>
                         <div class="row">
                          
                            <div class="col-5 col-xs-5 col-sm-5 col-md-5">
							<?php
								
								
								$str_arr = preg_split ("/\,/", $assign_user); 
								//print_r("<script>alert(".$str."");</script>");
								if($str_arr!=''){
										for($i=0; $i<count($str_arr); $i++){
											if($str_arr[$i]!=""){
											$res11= mysqli_query($conn, "SELECT * FROM user WHERE user_name='".$str_arr[$i]."'");
												
												$row11= mysqli_fetch_array($res11);
												$f_name= $row11['first_name'];
												$l_name= $row11['last_name'];
												
											echo "<select name='assignUser$i' id='idfisrtselectbox$i' class='classfisrtselectbox form-control' style='height:40px;'><option value='".$str_arr[$i]."'>".$f_name." ".$l_name."</option>";
											$relt = mysqli_query($conn, "SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0'");
											while($ro= mysqli_fetch_array($relt)){
												echo "<option value=".$ro['user_name'].">".$ro['first_name']." ".$ro['last_name']."</option>";
											}
											echo"</select><br>";
											}
										}
								}	
										
							?>
							  <input type="hidden" name="assign_user_count" id="assign_user_count" value="<?php echo $i ?>" />	
                              <select id="idfisrtselectbox" hidden>
								<option value="">Select User</option>
								<?php
									$result = mysqli_query($conn, "SELECT * FROM user");
									while($row= mysqli_fetch_array($result)){
										echo "<option value=".$row['user_name'].">".$row['first_name']." ".$row['last_name']."</option>";
									}
								?>
							  </select>
                            </div>
                         <div class="col-5 col-xs-5 col-sm-5 col-md-5">
						 <?php
							$str_arr = preg_split ("/\,/", $access_user);  


							//print_r($str_arr);
							if($str_arr!=''){
										
										for($i=0; $i<count($str_arr); $i++){
											if($str_arr[$i]!=''){
												
											echo "<select name='userAccess$i' id='userAccess$i' class='accessfisrtselectbox form-control' style='height:40px;'><option value=".$str_arr[$i].">".$str_arr[$i]."</option>--<option value='Upload'>Upload</option><option value='Download'>Download</option><option value='Both'>Both</option></select><br>";
											}
										}
										
							}							
						 ?>
                             
                          </div>
						  <div class="col-2 col-xs-2 col-sm-2 col-md-2">
							<?php
								if($str_arr!=''){
									for($i=0; $i<count($str_arr); $i++){
										if($str_arr[$i]!=''){
										echo "<div><i class='removeButton fas fa-times' id='$i' onclick='removeRow($i)' style='margin-top:15px'></i></div><br>";
										}
									}
								}
							?>
						  </div>
						  
                          </div>
                          <div class="row">
                          		<div id="test" style="width:100%;"></div>
                          </div>
                          <div class="row">
                            <div class="col-5 col-xs-4 col-sm-4 col-md-4 col-lg-4">
                              <div class="createbtn" id="main">
                                <button type="button" class="btn btn-primary bt" id="btAdd" value="Add User" onclick="getCount()">Add User</button>
                                <!-- <button type="button" class="btn btn-primary bt" id="btRemove" value="Remove">Remove</button> -->
                               <!--  <button type="button" class="btn btn-primary bt" id="btRemoveAll" value="Remove All">Remove All</button> -->
                              </div>
                            </div>
                            <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <button class="btn btn-primary form-control" id="extraassigniser" type="submit" value="Edit Folder" onclick="saveChangesOfShare()" name="sharefolderAndFiles" style="color:#fff;">Save Changes</button>
                            </div>
							
                          </div>
                       </form>
                    </div>
                  </div>
                </div>
              </div>
           </div>   
      </div>

    </div>
  </div>
</div>


<!-- The Share Folder Modal -->
<div class="modal" id="ShareFolderModalSingle">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Share Folders/Files</h4>
        <button type="button" class="close" onclick="reloadPage()" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	
           <?php
					$conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
									if($conn->connect_error){
										die("Connection Error" . $conn->connect_error);
									}
									
									$total_usr= mysqli_query($conn, "SELECT count(*) as cnt_row FROM user where deleted='0'");
									$total_usr=mysqli_fetch_array($total_usr);
									$total_usr_chk=$total_usr['cnt_row'];	
									//echo $total_usr_chk;
								?>
            <div class="col-xs-12 col-sm-12 col-md-12 "> 
              <div class="">
                <div class="row">
                  <div class="col-12 col-xs-12 col-sm-12 col-md-12 main">
                    <div class="">
                    <form action="#" method="post"> 
                      <!-- 	<form action="" method="post"> -->
                       <!--  <input type="hidden" name="usercount" id="inputcountusers"> -->
                       <div class="row">
                         		<div class="" id="filesNameForShareSingle" style="width:100%;">
                            			
                               
                           		 </div>
                           		 <input type="hidden" name="accessCount1"  id="accessCount1"/>
                       </div>
                         <div class="row">
                          
                            <div class="col-5 col-xs-5 col-sm-5 col-md-5">
							<?php
								
								
								$str_arr = preg_split ("/\,/", $assign_user); 
								//print_r("<script>alert(".$str."");</script>");
								if($str_arr!=''){
										for($i=0; $i<count($str_arr); $i++){
											if($str_arr[$i]!=""){
											$res11= mysqli_query($conn, "SELECT * FROM user WHERE user_name='".$str_arr[$i]."'");
												
												$row11= mysqli_fetch_array($res11);
												$f_name= $row11['first_name'];
												$l_name= $row11['last_name'];
												
											echo "<select name='assignUser$i' id='idfisrtselectbox$i' class='classfisrtselectbox form-control' style='height:40px;'><option value='".$str_arr[$i]."'>".$f_name." ".$l_name."</option>";
											$relt = mysqli_query($conn, "SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0'");
											while($ro= mysqli_fetch_array($relt)){
												echo "<option value=".$ro['user_name'].">".$ro['first_name']." ".$ro['last_name']."</option>";
											}
											echo"</select><br>";
											}
										}
								}	
										
							?>
							  <input type="hidden" name="assign_user_count" id="assign_user_count" value="<?php echo $i ?>" />	
                              <select id="idfisrtselectbox" hidden>
								<option value="">Select User</option>
								<?php
									$result = mysqli_query($conn, "SELECT * FROM user");
									while($row= mysqli_fetch_array($result)){
										echo "<option value=".$row['user_name'].">".$row['first_name']." ".$row['last_name']."</option>";
									}
								?>
							  </select>
                            </div>
                         <div class="col-5 col-xs-5 col-sm-5 col-md-5">
						 <?php
							$str_arr = preg_split ("/\,/", $access_user);  


							//print_r($str_arr);
							if($str_arr!=''){
										
										for($i=0; $i<count($str_arr); $i++){
											if($str_arr[$i]!=''){
												
											echo "<select name='userAccess$i' id='userAccess$i' class='accessfisrtselectbox form-control' style='height:40px;'><option value=".$str_arr[$i].">".$str_arr[$i]."</option>--<option value='Upload'>Upload</option><option value='Download'>Download</option><option value='Both'>Both</option></select><br>";
											}
										}
										
							}							
						 ?>
                             
                          </div>
						  <div class="col-2 col-xs-2 col-sm-2 col-md-2">
							<?php
								if($str_arr!=''){
									for($i=0; $i<count($str_arr); $i++){
										if($str_arr[$i]!=''){
										echo "<div><i class='removeButton fas fa-times' id='$i' onclick='removeRow($i)' style='margin-top:15px'></i></div><br>";
										}
									}
								}
							?>
						  </div>
						  
                          </div>
                          <div class="row">
                          		<div id="testSingle" style="width:100%;"></div>
                          </div>
                          <div class="row">
                            <div class="col-5 col-xs-4 col-sm-4 col-md-4 col-lg-4">
                              <div class="createbtn" id="main">
                                <button type="button" class="btn btn-primary bt" id="btAddsingle" value="Add User" onclick="getCount()">Add User</button>
                                <!-- <button type="button" class="btn btn-primary bt" id="btRemove" value="Remove">Remove</button> -->
                               <!--  <button type="button" class="btn btn-primary bt" id="btRemoveAll" value="Remove All">Remove All</button> -->
                              </div>
                            </div>
                            <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <button class="btn btn-primary form-control" id="extraassigniser" type="submit" value="Edit Folder" onclick="saveChangesOfShareSingle()" name="sharefolderAndFiles" style="color:#fff;">Save Changes</button>
                            </div>
							
                          </div>
                       </form>
                    </div>
                  </div>
                </div>
              </div>
           </div>   
      </div>

    </div>
  </div>
</div>

<!-- <script>
	function getNumberOfElement(){
		var element = document.getElementById("usersList");
		//alert(getCountOfElement(element, false));
		function getCountOfElement(parent, getChildrensChildren){
		    var relevantChildren = 0;
		    var children = parent.childNodes.length;
		    for(var i=0; i < children; i++){
		        if(parent.childNodes[i].nodeType != 3){
		            if(getChildrensChildren)
		                relevantChildren += getCount(parent.childNodes[i],true);
		            relevantChildren++;
		        }
		    }
		    return relevantChildren;
		}
	}
	

</script> -->
<script>
		
		$(document).ready(function(){
		
			$(document).on("click",".btnShareSingle",function()
			{
				alert("Hii");	
				var id=$(this).data("sharesingle-id");
				alert(id);

				$.ajax({
					url:"shareSingleFile.php",
					method:"post",
					data:{id:id},
					success:function(data)
					{
						var div= document.getElementById('filesNameForShareSingle');
			            div.innerHTML+=data;
						//alert("FOLDER SHARED SUCCESSFULLY");
						$("#ShareFolderModalSingle").modal();
					}
				});	
				
			});
		});		
	</script>
	<script>
		
		$(document).ready(function(){
		
			$(document).on("click",".btnRename",function()
			{
				alert("Hii");	
				var id=$(this).data("rename-id");
				alert(id);
				//function renameFile(id){
					alert(id);
					//alert(table);
					$.ajax({
						url:"getFileNameForRename.php",
						method:"post",
						data:{id:id},
						success:function(data)
						{
						//	alert(data);
							document.getElementById('folderOrFileName').value=data;
							$("#EditFolderModal").modal();
						}
					});
				//}
				
			});
		});		
	</script>
<script>
	function saveChangesOfShareSingle(){
		var accessCount1= document.getElementById('accessCount1').value;
	//	alert(accessCount1);
		var arrForUsers= [];
		var arrForAccess= [];
		var i;	
		var singleFileName= "";
	//	alert(singleFileName);
		for(i=1; i<=accessCount1; i++){
			var u1= 'idselectbox'+i;
			var a1= 'extradefineaccess'+i;

		//	alert(u1); alert(a1);	
			var user=document.getElementById('idselectbox'+i).value;
			var access=document.getElementById('extradefineaccess'+i).value;
		//	alert(user);
		//	alert(access);
			arrForUsers.push(user);
			arrForAccess.push(access);
		}
		if(arrForUsers==""){
			arrForUsers.push("");
		}
		if(arrForAccess==""){
			arrForAccess.push("");
		}
	//	alert("USERS == "+arrForUsers);
	//	alert("ACCESS == "+arrForAccess);
		$.ajax({
			url:"saveShareFoldersAndFilesSingle.php",
			method:"post",
			data:{accessCount1:accessCount1,arrForUsers:arrForUsers,arrForAccess:arrForAccess,singleFileName:singleFileName},
			success:function(data)
			{
				//$('#idselectbox'+ selectCnt).html(data);
				//location.reload();
	//			alert(data);
				alert("Folder shared successfully");
			}
		});	


	}	

</script>	


<script>
	var n=0;
	function reloadPage(){
		window.location.reload();
	}

	function getCount(){
		n=n+1;

		document.getElementById('accessCount').value=n;
		document.getElementById('accessCount1').value=n;
	}

</script>









    <!-- JavaScript files-->
    
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>

       <script type="text/javascript">
      $(function() 
      {
        $(".search_button").click(function() 
        {
          var search_word = $("#search_box").val();
          var dataString = 'search_word='+ search_word;
      
          if(search_word=='')
          {
          }
          else
          {
            $.ajax({
              type: "GET",
              url: "searchingdata.php",
              data: dataString,
              cache: false,
              beforeSend: function(html) 
              {
                document.getElementById("insert_search").innerHTML = ''; 
                $("#flash").show();
                $("#searchword").show();
                $(".searchword").html(search_word);
                $("#flash").html('<img src="ajax-loader_2.gif" /> Loading Results...');
              },
              success: function(html){
                $("#insert_search").show();
                $("#insert_search").append(html);
                $("#flash").hide();
              }
            });
          }
          return false;
        });
      });
      $(document).ready(function(){

        // Number of rows selection
        $("#num_rows").change(function(){

          // Submitting form
          $("#form").submit();

        });
      });
    </script>

      <script>
      window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
          responsive: true,
          scaleLineColor: "rgba(0,0,0,.2)",
          scaleGridLineColor: "rgba(0,0,0,.05)",
          scaleFontColor: "#c5c7cc"
        });
      };
    </script>

  


    <script type="text/javascript">
$(document).ready(function(){
	
	$(document).on("click",".btnUpdate",function()
	{
	//	alert("hi");
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
		var msg=confirm("Do you want to delete File");
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


    <script>
							$(document).ready(function() {
								var iCnt = 0;
								var selectcnt=0;
								var show_cnt=1;	
								var selectedextrauser;
								var selectcount="";								
								var arr = [];
								var arr_assign_user= [];
								
								/*var container = $(document.createElement('div')).css({
									position: 'absolute', left: '150px', top:'150px', padding: '5px', margin: '20px', width: '170px',
									borderTopColor: '#999', borderBottomColor: '#999',
									borderLeftColor: '#999', borderRightColor: '#999'
								});*/
								
								/* if(selectcount=='')
										{
											$("#btAdd").attr("disabled", "disabled");
										} */
								
								
								$('#btAdd').click(function() {
									//alert('Hii');
										var assign_user_count= document.getElementById('assign_user_count').value;
										//alert(assign_user_count);
										
										for(var i=1; i<assign_user_count; i++){
											var data= document.getElementById('idfisrtselectbox'+i).value;
											arr_assign_user.push(data);
											//alert(data);
											//alert(arr_assign_user);
										}
										//alert(arr_assign_user);
										if (iCnt >= 0) {
											iCnt = iCnt + 1;
										selectcnt= selectcnt + 1;
										 //alert(selectcnt);
										
										 if(selectcnt==1)
										 {  
											selectcount = $("#idfisrtselectbox").children("option:selected").val();
											arr.push(selectcount);
										 } 
											
											for(var i=1; i<selectcnt; i++)
											{
												selectedextrauser = $("#idselectbox"+i).children("option:selected").val();
												arr.push(selectedextrauser);
											}  
											usr_cnt = '<?php echo $total_usr_chk; ?>';
										//alert(usr_cnt+' '+selectcnt);
										if(usr_cnt!=selectcnt)
										{
										 // ADD TEXTBOX.
                                          $('#test').append('<div class="row form-group" id="removeRow'+selectcnt+'"><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5" id="extrauser"><select class="assignExtraUser form-control"  id="idselectbox'+selectcnt+'" style="height:40px;" data-selecteduserno-id="'+selectcnt+'" name="extrausername'+selectcnt+'" required="required"><option value="">Select User</option></select></div><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5"><select class="accessuser form-control" style="height:40px;" id="extradefineaccess'+selectcnt+'" name="extradefineaccess'+selectcnt+'" ><option value="">Select Access</option><option value="Upload">Upload</option><option value="Download">Download</option><option value="Both">Both</option></select></div><div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2"><i class="removeButton fas fa-times mt-2" id='+selectcnt+'></i></div></div>');
										}
										else{
											$("#btAdd").attr("disabled", "disabled");
										}
										var arr2= $.merge( arr, arr_assign_user );
										$.ajax({
												url:"testing_demo.php",
												method:"post",
												data:{arr:arr2},
												
												success:function(data)
												{
													$('#idselectbox'+selectcnt).html(data);
												
												}
											
												});
										
										
										
										
										// SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.
										if (iCnt == 1) {
											var divSubmit = $(document.createElement('div'));
											
										} 
										// ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
										$('#main').after(container, divSubmit);
									}
									// AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
									// (20 IS THE LIMIT WE HAVE SET)
									else {      
										$(container).append('<label>Reached the limit</label>'); 
										$('#btAdd').attr('class', 'bt-disable'); 
										$('#btAdd').attr('disabled', 'disabled');
									}
									//var str=str+","+extrausername;
									//$("#inputuserdata").val(str);
									
								});
								
								$(document).on("change",".classfisrtselectbox",function(){
									//alert("assignExtraUser"+selectcnt);
									$("#btAdd").removeAttr("disabled");
								var selecteduser = $(this).children("option:selected").val();
																		
									$.ajax({
											url:"testing_demo.php",
											method:"post",
											data:{selecteduser:arr_assign_user},
											
											success:function(data)
											{
												//alert(data);
												$('#idselectbox1').html(data);
												//location.reload();
											}
											
									});
								
								}); 
								  var selectedextrauser;															
								$(document).on("change",".assignExtraUser",function(){
									show_cnt++;
									
									// = $(this).children("option:selected").val();
									var selectCnt=$(this).data("selecteduserno-id");
									 var selectcount = $("#idfisrtselectbox").children("option:selected").val();
									 var arr = [];
									 for(var i=1; i<=selectcnt; i++)
									{
										selectedextrauser = $("#idselectbox"+i).children("option:selected").val();
										arr.push(selectedextrauser);
									}  
									selectCnt += 1;
									arr.push(selectcount);
									//alert(arr);
									 $.ajax({
											url:"testing_demo.php",
											method:"post",
											data:{arr:arr_assign_user},
											success:function(data)
											{
												$('#idselectbox'+ selectCnt).html(data);
												//location.reload();
											}
											
									});
								
								});
								 
								 $("#extraassigniser").click(function(){
										//<var s=10
										$("#inputcountusers").val(selectcnt);
								  });
								
								  $(document).on("click",".removeButton",function(){
									var button_id=$(this).attr("id");
									$("#removeRow"+button_id).remove();
									//n=n-1;
									//document.getElementById('accessCount').value=n;
								  });
								
																
								// REMOVE ALL THE ELEMENTS IN THE CONTAINER.
								$('#btRemoveAll').click(function() {
									$('#test')
									.empty()
									.remove(); 
									$('#btSubmit').remove(); 
									iCnt = 0; 
									$('#btAdd')
									.removeAttr('disabled') 
									.attr('class', 'bt');
								});
								
								
								
							});
							
							// PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
							var divValue, values = '';
							function GetTextValue() {
								$(divValue) 
								.empty() 
								.remove(); 
								values = '';
								$('.input').each(function() {
									divValue = $(document.createElement('div')).css({
										padding:'5px', width:'200px'
									});
									values += this.value + '<br/>'
								});
								$(divValue).append('<p><b>Your selected values</b></p>' + values);
								$('body').append(divValue);
							}
							
	</script>
	<script>
							function removeRow(i){
								var removeId= i;
								
							//	alert(removeId);
								
								var userTab= document.getElementById('idfisrtselectbox'+removeId);
								
								userTab.parentNode.removeChild(userTab);
								
								var accessTab= document.getElementById('userAccess'+removeId);
								accessTab.parentNode.removeChild(accessTab);
								
								var closeTab= document.getElementById(removeId);
								closeTab.parentNode.removeChild(closeTab);

								document.getElementById('accessCount').value=n-1;	
							//	alert(n);
							}
						</script>


<script type="text/javascript">
	$('#action').hide();

	$("#checkAll").change(function () {
		$('#action').show();
		//alert($("input:checkbox").prop('checked', $(this).prop("checked")));
		$("input:checkbox").prop('checked', $(this).prop("checked"));
		var checkValues = $('input[name=checkboxlist]:checked').map(function()
		{
			return $(this).val();
		}).get();
		//alert("ALL SELECTED FILES= "+checkValues);
		if(checkValues==""){
			$('#action').hide();
		}
		$.ajax({
			url:"getSelectedFileForDelete.php",
			method:"post",
			data:{ids:checkValues},
			success:function(checkValues)
			{
				//alert(checkValues);
				//$('#result').html(data);
				//location.reload();
				
				
			}
		});
		
	});
</script>
<script>
	function checkDuplicateUser2(i){
		//alert('IN CHECK DUPLICATE USERS..');
		//alert('idselectbox'+i);
		var id='idselectbox'+i;
		var val= document.getElementById(id).value;
		///var fileName= document.getElementById('singleFileName').value;
		//alert("SELECTED USER= "+val);
		$.ajax({
			url:"checkDuplicateAssignedUsers.php",
			method:"post",
			data:{id:id,val:val},
			success:function(checkValues)
			{
				//alert("IN respond = "+checkValues);
				if(checkValues==1){
				     $.alert({
                        title: 'Alert!',
                        content: 'This user is already Assigned For this File/Folder!',
                        buttons: {
                            Ok: function () {
                                document.getElementById(id).value="Select user";
                            },
                    });
					//alert("This user is already Assigned For this File/Folder");
					//document.getElementById(id).value="Select user";

				}
				//$('#result').html(data);
				//location.reload();
				
				
			}
		});

	}	

</script>
<script>

	function getCheckBoxValue(val){
		//alert(val);
		//alert("Hii IN getCheckBoxValue");
		$('#action').show();
		$.ajax({
			url:"getSingleCheckBoxValue.php",
			method:"post",
			data:{ids:val},
			success:function(checkValues)
			{
				//alert(checkValues);
				//$('#result').html(data);
				//location.reload();
			}
		});
	}
</script>
<!-- <script type="text/javascript">
	$("#checkAll").change(function () {
		$("input:checkbox").prop('checked', $(this).prop("checked"));
		var checkValues = $('input[name=checkboxlist]:checked').map(function()
		{
			return $(this).val();
		}).get();
		//alert("ALL SELECTED FILES= "+checkValues);
		$.ajax({
			url:"getSelectedFileForDelete.php",
			method:"post",
			data:{ids:checkValues},
			success:function(checkValues)
			{
				alert(checkValues);
				//$('#result').html(data);
				//location.reload();
			}
		});
		
	});
</script> -->
<script>
  function deletedMultipleSelectedFiles(){
    //alert("IN DELETE MULTIPLES FILES");
     $.confirm({
                  title: '',
                  content: 'Do you want to Delete files and folders?',
                   type: 'dark',
         buttons: {
            Ok: function () {
              $.ajax({
                url:"deletedMultipleSelectedFiles.php",
                method:"post",
                //data:{ids:checkValues},
                success:function(checkValues)
                {
                  //alert("CHECK VALUES = "+checkValues);
                  //$.alert("Files and folders deleted successfully");
                  //$('#result').html(data);
                  //window.location.href='index.php';
                  //window.location.reload();
                  
                   $.confirm({
                    title: 'Success!',
                    content: 'Files and folders deleted successfully',
                     type: 'dark',
                      buttons: {
                    Ok: function () {
                      window.location.reload();
                      }
                    
                    }

                  });

                  
                  
                }
              });
            },
            Cancel: function () {
              location.reload();
            },
            },
      });
     
     /* var msg= confirm("Do you want to delete selected folder and files?");
    //alert(msg);
    if(msg){
      //alert("in if block");
      $.ajax({
        url:"deletedMultipleSelectedFiles.php",
        method:"post",
        //data:{ids:checkValues},
        success:function(checkValues)
        {
          ///alert(checkValues);
          alert("Files and folders deleted successfully");
          //$('#result').html(data);
          location.reload();
        }
      });
    }  */
  }
</script>



<script>
							$(document).ready(function() {
								var iCnt = 0;
								var selectcnt=0;
								var show_cnt=1;	
								var selectedextrauser;
								var selectcount="";								
								var arr = [];
								var arr_assign_user= [];
								
								/*var container = $(document.createElement('div')).css({
									position: 'absolute', left: '150px', top:'150px', padding: '5px', margin: '20px', width: '170px',
									borderTopColor: '#999', borderBottomColor: '#999',
									borderLeftColor: '#999', borderRightColor: '#999'
								});*/
								
								/* if(selectcount=='')
										{
											$("#btAdd").attr("disabled", "disabled");
										} */
								
								
								$('#btAdd').click(function() {
									//alert('Hii');
										var assign_user_count= document.getElementById('assign_user_count').value;
										//alert(assign_user_count);
										
										for(var i=1; i<assign_user_count; i++){
											var data= document.getElementById('idfisrtselectbox'+i).value;
											arr_assign_user.push(data);
											//alert(data);
											//alert(arr_assign_user);
										}
										//alert(arr_assign_user);
										if (iCnt >= 0) {
											iCnt = iCnt + 1;
										selectcnt= selectcnt + 1;
										 //alert(selectcnt);
										
										 if(selectcnt==1)
										 {  
											selectcount = $("#idfisrtselectbox").children("option:selected").val();
											arr.push(selectcount);
										 } 
											
											for(var i=1; i<selectcnt; i++)
											{
												selectedextrauser = $("#idselectbox"+i).children("option:selected").val();
												arr.push(selectedextrauser);
											}  
											usr_cnt = '<?php echo $total_usr_chk; ?>';
										//alert(usr_cnt+' '+selectcnt);
										if(usr_cnt!=selectcnt)
										{
										 // ADD TEXTBOX.
                                          $('#test').append('<div class="row form-group" id="removeRow'+selectcnt+'"><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5" id="extrauser"><select class="assignExtraUser form-control"  id="idselectbox'+selectcnt+'" style="height:40px;" data-selecteduserno-id="'+selectcnt+'" name="extrausername'+selectcnt+'" required="required"><option value="">Select User</option></select></div><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5"><select class="accessuser form-control" style="height:40px;" name="extradefineaccess'+selectcnt+'" ><option value="">Select Access</option><option value="Upload">Upload</option><option value="Download">Download</option><option value="Both">Both</option></select></div><div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2"><i class="removeButton fas fa-times mt-2" id='+selectcnt+'></i></div></div>');
										}
										else{
											$("#btAdd").attr("disabled", "disabled");
										}
										var arr2= $.merge( arr, arr_assign_user );
										$.ajax({
												url:"testing_demo.php",
												method:"post",
												data:{arr:arr2},
												
												success:function(data)
												{
													$('#idselectbox'+selectcnt).html(data);
												
												}
											
												});
										
										
										
										
										// SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.
										if (iCnt == 1) {
											var divSubmit = $(document.createElement('div'));
											
										} 
										// ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
										$('#main').after(container, divSubmit);
									}
									// AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
									// (20 IS THE LIMIT WE HAVE SET)
									else {      
										$(container).append('<label>Reached the limit</label>'); 
										$('#btAdd').attr('class', 'bt-disable'); 
										$('#btAdd').attr('disabled', 'disabled');
									}
									//var str=str+","+extrausername;
									//$("#inputuserdata").val(str);
									
								});
								
								$(document).on("change",".classfisrtselectbox",function(){
									//alert("assignExtraUser"+selectcnt);
									$("#btAdd").removeAttr("disabled");
								var selecteduser = $(this).children("option:selected").val();
																		
									$.ajax({
											url:"testing_demo.php",
											method:"post",
											data:{selecteduser:arr_assign_user},
											
											success:function(data)
											{
												//alert(data);
												$('#idselectbox1').html(data);
												//location.reload();
											}
											
									});
								
								}); 
								  var selectedextrauser;															
								$(document).on("change",".assignExtraUser",function(){
									show_cnt++;
									
									// = $(this).children("option:selected").val();
									var selectCnt=$(this).data("selecteduserno-id");
									 var selectcount = $("#idfisrtselectbox").children("option:selected").val();
									 var arr = [];
									 for(var i=1; i<=selectcnt; i++)
									{
										selectedextrauser = $("#idselectbox"+i).children("option:selected").val();
										arr.push(selectedextrauser);
									}  
									selectCnt += 1;
									arr.push(selectcount);
									//alert(arr);
									 $.ajax({
											url:"testing_demo.php",
											method:"post",
											data:{arr:arr_assign_user},
											success:function(data)
											{
												$('#idselectbox'+ selectCnt).html(data);
												//location.reload();
											}
											
									});
								
								});
								 
								 $("#extraassigniser").click(function(){
										//<var s=10
										$("#inputcountusers").val(selectcnt);
								  });
								
								  $(document).on("click",".removeButton",function(){
									var button_id=$(this).attr("id");
									$("#removeRow"+button_id).remove();
								  });
								
																
								// REMOVE ALL THE ELEMENTS IN THE CONTAINER.
								$('#btRemoveAll').click(function() {
									$('#test')
									.empty()
									.remove(); 
									$('#btSubmit').remove(); 
									iCnt = 0; 
									$('#btAdd')
									.removeAttr('disabled') 
									.attr('class', 'bt');
								});
								
								
								
							});
							
							// PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
							var divValue, values = '';
							function GetTextValue() {
								$(divValue) 
								.empty() 
								.remove(); 
								values = '';
								$('.input').each(function() {
									divValue = $(document.createElement('div')).css({
										padding:'5px', width:'200px'
									});
									values += this.value + '<br/>'
								});
								$(divValue).append('<p><b>Your selected values</b></p>' + values);
								$('body').append(divValue);
							}
							
						</script>
						<script>
							function removeRow(i){
								var removeId= i;
								
								//alert(removeId);
								
								var userTab= document.getElementById('idfisrtselectbox'+removeId);
								
								userTab.parentNode.removeChild(userTab);
								
								var accessTab= document.getElementById('userAccess'+removeId);
								accessTab.parentNode.removeChild(accessTab);
								
								var closeTab= document.getElementById(removeId);
								closeTab.parentNode.removeChild(closeTab);
								//alert(userTab);
							}
						</script>
						<script>
							function removeRow1(i){
								//alert("USER NAME= "+i);
								//alert("USER ACCESS= "+j);
								var removeId= i;
								var arrId= removeId.split(',');
								//alert("ARRAY AFTER SPLIT = "+ arrId);	
								//alert(removeId);

								$.ajax({
											url:"removeUserAndAccess.php",
											method:"post",
											data:{i:i},
											
											success:function(data)
											{
												//alert(data);
												//$('#idselectbox1').html(data);
												//location.reload();
											}
											
									});


								var closeTab= document.getElementById(removeId);
								closeTab.parentNode.removeChild(closeTab);
							}

						</script>
						<script>
							function shareSingleFileOrFolder(id){
								var id= id;
								//alert(id);

								$.ajax({
									url:"shareSingleFile.php",
									method:"post",
									data:{id:id},
									success:function(data)
									{
										var div= document.getElementById('filesNameForShareSingle');
			                			div.innerHTML+=data;
										//alert("FOLDER SHARED SUCCESSFULLY");
										$("#ShareFolderModalSingle").modal();
									}
											
								});	

							}

						</script>
						<script>
							function saveChangesOfShare(){
								var accessCount= $('#accessCount').val();
								//alert(accessCount);
								 var arrForUsers= [];
								 var arrForAccess= [];
								 var i;	
								// alert("USER NAME= "+document.getElementById('idselectbox'+1).value);
								for(i=1; i<=accessCount; i++){
									var u1= 'idselectbox'+i;
									var a1= 'extradefineaccess'+i;

								//	alert(u1); alert(a1);	
									var user=document.getElementById('idselectbox'+i).value;
									var access=document.getElementById('extradefineaccess'+i).value;
								//	alert(user);
								//	alert(access);
									arrForUsers.push(user);
									arrForAccess.push(access);	
								}

							//	alert("USER ARRAY DATA = "+arrForUsers);
							//	alert("USER ACCESS ARRAY DATA = "+arrForAccess);
							//	alert("IN SAVE CHANGES OF SHARE");
								$.ajax({
											url:"saveShareFoldersAndFiles.php",
											method:"post",
											data:{accessCount:accessCount,arrForUsers:arrForUsers,arrForAccess:arrForAccess},
											success:function(data)
											{
												//$('#idselectbox'+ selectCnt).html(data);
												//location.reload();
													//alert(data);
												alert("Folder shared successfully");
											}
											
									});	
								
							}

							function getFilesNameForDownload(){
								//alert("IN getFilesNameForDownload");
								$("input:checkbox").prop('checked', $(this).prop("checked"));
								var checkValues = $('input[name=checkboxlist]:checked').map(function()
								{
									return $(this).val();
								}).get();

								//alert(checkValues);

								// $.ajax({
								// 	url:"downloadMultipleFilesAndFolders.php",
								// 	method:"post",
								// 	data:{ids:checkValues},
								// 	success:function(checkValues)
								// 	{
								// 		//alert(checkValues);
								// 		//$('#result').html(data);
								// 		//location.reload();
										
										
								// 	}
								// });
							}
						</script>




						 <script>
							$(document).ready(function() {
								var iCnt = 0;
								var selectcnt=0;
								var show_cnt=1;	
								var selectedextrauser;
								var selectcount="";								
								var arr = [];
								var arr_assign_user= [];
								
								/*var container = $(document.createElement('div')).css({
									position: 'absolute', left: '150px', top:'150px', padding: '5px', margin: '20px', width: '170px',
									borderTopColor: '#999', borderBottomColor: '#999',
									borderLeftColor: '#999', borderRightColor: '#999'
								});*/
								
								/* if(selectcount=='')
										{
											$("#btAdd").attr("disabled", "disabled");
										} */
								
								
								$('#btAddsingle').click(function() {
									//alert('Hii');
										var assign_user_count= document.getElementById('assign_user_count').value;
										//alert(assign_user_count);
										
										for(var i=1; i<assign_user_count; i++){
											var data= document.getElementById('idfisrtselectbox'+i).value;
											arr_assign_user.push(data);
											//alert(data);
											//alert(arr_assign_user);
										}
										//alert(arr_assign_user);
										if (iCnt >= 0) {
											iCnt = iCnt + 1;
										selectcnt= selectcnt + 1;
										 //alert(selectcnt);
										
										 if(selectcnt==1)
										 {  
											selectcount = $("#idfisrtselectbox").children("option:selected").val();
											arr.push(selectcount);
										 } 
											
											for(var i=1; i<selectcnt; i++)
											{
												selectedextrauser = $("#idselectbox"+i).children("option:selected").val();
												arr.push(selectedextrauser);
											}  
											usr_cnt = '<?php echo $total_usr_chk; ?>';
										//alert(usr_cnt+' '+selectcnt);
										if(usr_cnt!=selectcnt)
										{
										 // ADD TEXTBOX.
                                          $('#testSingle').append('<div class="row form-group" id="removeRow'+selectcnt+'"><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5" id="extrauser"><select class="assignExtraUser form-control" onchange="checkDuplicateUser2('+selectcnt+');"  id="idselectbox'+selectcnt+'" style="height:40px;" data-selecteduserno-id="'+selectcnt+'" name="extrausername'+selectcnt+'" required="required"><option value="">Select User</option></select></div><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5"><select class="accessuser form-control" style="height:40px;" id="extradefineaccess'+selectcnt+'" name="extradefineaccess'+selectcnt+'" ><option value="">Select Access</option><option value="Upload">Upload</option><option value="Download">Download</option><option value="Both">Both</option></select></div><div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2"><i class="removeButton fas fa-times mt-2" id='+selectcnt+'></i></div></div>');
										}
										else{
											$("#btAddsingle").attr("disabled", "disabled");
										}
										var arr2= $.merge( arr, arr_assign_user );
										$.ajax({
												url:"testing_demo.php",
												method:"post",
												data:{arr:arr2},
												
												success:function(data)
												{
													$('#idselectbox'+selectcnt).html(data);
												
												}
											
												});
										
										
										
										
										// SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.
										if (iCnt == 1) {
											var divSubmit = $(document.createElement('div'));
											
										} 
										// ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
										$('#main').after(container, divSubmit);
									}
									// AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
									// (20 IS THE LIMIT WE HAVE SET)
									else {      
										$(container).append('<label>Reached the limit</label>'); 
										$('#btAddsingle').attr('class', 'bt-disable'); 
										$('#btAddsingle').attr('disabled', 'disabled');
									}
									//var str=str+","+extrausername;
									//$("#inputuserdata").val(str);
									
								});
								
								$(document).on("change",".classfisrtselectbox",function(){
									//alert("assignExtraUser"+selectcnt);
									$("#btAddsingle").removeAttr("disabled");
								var selecteduser = $(this).children("option:selected").val();
																		
									$.ajax({
											url:"testing_demo.php",
											method:"post",
											data:{selecteduser:arr_assign_user},
											
											success:function(data)
											{
												//alert(data);
												$('#idselectbox1').html(data);
												//location.reload();
											}
											
									});
								
								}); 
								  var selectedextrauser;															
								$(document).on("change",".assignExtraUser",function(){
									show_cnt++;
									
									// = $(this).children("option:selected").val();
									var selectCnt=$(this).data("selecteduserno-id");
									 var selectcount = $("#idfisrtselectbox").children("option:selected").val();
									 var arr = [];
									 for(var i=1; i<=selectcnt; i++)
									{
										selectedextrauser = $("#idselectbox"+i).children("option:selected").val();
										arr.push(selectedextrauser);
									}  
									selectCnt += 1;
									arr.push(selectcount);
									//alert(arr);
									 $.ajax({
											url:"testing_demo.php",
											method:"post",
											data:{arr:arr_assign_user},
											success:function(data)
											{
												$('#idselectbox'+ selectCnt).html(data);
												//location.reload();
											}
											
									});
								
								});
								 
								 $("#extraassigniser").click(function(){
										//<var s=10
										$("#inputcountusers").val(selectcnt);
								  });
								
								  $(document).on("click",".removeButton",function(){
									var button_id=$(this).attr("id");
									$("#removeRow"+button_id).remove();
									//n=n-1;
									//document.getElementById('accessCount').value=n;
								  });
								
																
								// REMOVE ALL THE ELEMENTS IN THE CONTAINER.
								$('#btRemoveAll').click(function() {
									$('#test')
									.empty()
									.remove(); 
									$('#btSubmit').remove(); 
									iCnt = 0; 
									$('#btAdd')
									.removeAttr('disabled') 
									.attr('class', 'bt');
								});
								
								
								
							});
							
							// PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
							var divValue, values = '';
							function GetTextValue() {
								$(divValue) 
								.empty() 
								.remove(); 
								values = '';
								$('.input').each(function() {
									divValue = $(document.createElement('div')).css({
										padding:'5px', width:'200px'
									});
									values += this.value + '<br/>'
								});
								$(divValue).append('<p><b>Your selected values</b></p>' + values);
								$('body').append(divValue);
							}
							
	</script>
	<script>
		function renameFile(id){
			//alert(id);
			$.ajax({
				url:"getFileNameForRename.php",
				method:"post",
				data:{id:id},
				success:function(data)
				{
				//	alert(data);
					document.getElementById('folderOrFileName').value=data;
					$("#EditFolderModal").modal();
				}
			});
		}
	</script>
	
  </body>
</html>

<?php
 if(isset($_POST['sharefolderAndFiles'])){
 // 	$.ajax({
	// 	url:"testing_demo.php",
	// 	method:"post",
	// 	data:{arr:arr_assign_user},
	// 	success:function(data)
	// 	{
	// 		$('#idselectbox'+ selectCnt).html(data);
	// 		//location.reload();
	// 	}
											
	// });
 }
// {
// 	echo "<script>alert('IN EDIT FOLDER');</script>";	
// 	session_start();
// 	$assignUserArr= array();
// 	$defAccessArr= array();
// 	$oldFolderName= $_SESSION['oldFolderName'];

// 	//echo $oldFolderName;
// 	$conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
// 	if($conn->connect_error){
// 		die("Connection failed: " . $conn->connect_error);	
// 	}
// 	$id= $_SESSION['folderId'];
// 	$folderName= $_POST['folderName'];
// 	$assignUser= $_POST['assignUser'];
// 	$accessUser= $_POST['userAccess'];
// 	//echo $assignUser." ".$accessUser;
// 	$data=array();
// 	$defineaccessData=array();
	
// 	$data[0]=$assignUser;
// 	$defineaccessData[0]=$accessUser;
// 	$extrausersession=$_POST['usercount'];
// 	//echo "<script>alert(".$extrausersession.");</script>";
// //	echo $extrausersession;
// //	print_r($str_arr);
// 	for($j=0; $j<count($str_arr); $j++){
// 		if($_POST["assignUser$j"]!=''){
// 			$assignUserArr[$j]= $_POST["assignUser$j"];
// 			echo "<script>alert(".$_POST["assignUser$j"].");</script>";
// 		}
// 		if($_POST["userAccess$j"]!=''){
// 			$defAccessArr[$j]= $_POST["userAccess$j"];
// 		}
// 	}
// 	//print_r( "<script>alert(".$assignUserArr.");</script>");
// 	//print_r( "<script>alert(".$defAccessArr.");</script>");
// 	$assignUserFromArr= implode(",", $assignUserArr);
// 	$defAccessArrFromArr = implode(",", $defAccessArr);
// 	//echo "<script>alert('Assign User List =".$assignUserFromArr."');</script>"; 
	
// 	$temp_cnt=0;
			
// 			for($i=1; $i<=$extrausersession;$i++)
// 			{
// 				if($i==$extrausersession)
// 				{
// 					$data[$i]=$_POST['extrausername'.$i];
// 					$defineaccessData[$i]=$_POST['extradefineaccess'.$i];
// 				}
// 				else
// 				{
// 					$data[$i]=$_POST['extrausername'.$i];
// 					$defineaccessData[$i]=$_POST['extradefineaccess'.$i];
// 				}
				
// 			}
			 
// 			  $datauser_array = array_filter($data); 
// 			 $dataaccess_array = array_filter($defineaccessData);
			 
// 			 $datauser=implode(",",$datauser_array);
// 			 $dataaccess=implode(",",$dataaccess_array);
			 
// 			 if($datauser != ""){
// 				 $allUsers= $assignUserFromArr.",".$datauser;
// 			 }else{
// 				 $allUsers= $assignUserFromArr;
// 			 }
			 
// 			 if($dataaccess!=""){
// 				 $allUserAccess= $defAccessArrFromArr.",".$dataaccess;
// 			 }else{
// 				 $allUserAccess= $defAccessArrFromArr;
// 			 }
			 
			
			
// 			//echo "<script>alert('ALL USERS LIST= '".$allUsers."');</script> ";
	
// 	$result=mysqli_query($conn, "UPDATE folder_master SET folder_name='".$folderName."', assigned_user_id='".$allUsers."', define_access='".$allUserAccess."' WHERE id='".$id."'  ");
	
// 			if($result)
// 			{
// 				echo"<script>
//                 $.confirm({
//                   title: '',
//                   content: 'Folder Updated Successfully',
//                    type: 'dark',
// 		            buttons: {
// 		                ok: function () {
// 		                     history.go(-2);
// 		                }
// 		            }
// 		        });
// 		        </script>";

// 			/*	echo"<script>
// 				$.confirm({
// 				          title: '',
// 				          content: 'Folder Updating...',
// 				          autoClose: 'Updating|500',
// 				           type: 'dark',
// 				    buttons: {
// 				        Updating: function () {
// 				            history.go(-2);
// 				             $.alert('Folder Updated Successfully');
// 				        }
// 				    }
// 				});
// 				</script>";*/

// 				/*echo"<script>
// 				alert('Folder updated successfully !!!!');
// 				history.go(-2);
// 				</script>";*/
// 			}
// 			else{
// 				echo"<script>
// 				$.alert('Something Went Wrong');
// 				history.go(-2);</script>";
// 			}
// }
?>