<?php
session_start();
error_reporting(0);
unset($_SESSION['folderName']);
unset($_SESSION['userNames']);
unset($_SESSION['arrForFileName']);
unset($_SESSION['arrForFileSize']);
$duplicateFileName= $_SESSION['fileName'];

if($_GET['id']!=""){
   // echo "<script>alert(".$_GET['id'].")</script>";
	$_SESSION['folderName']=$_GET['id'];
}else{
   // echo "<script>alert(".$_GET['id'].")</script>";
    $_SESSION['folderName']="0";
}

//$_SESSION['Login']="admin";
$userName= $_SESSION['Login'];
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document Manager</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
<title>File Upload</title>
<meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap styles -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="fonts/Roboto/Roboto.css">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default2.css" id="theme-stylesheet">
	<link rel="stylesheet" href="chosen.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="css/style.css">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
 <link rel="shortcut icon" href="img/favicon.png">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
 <script src="js3/jquery.min.js"></script>
 <style>
  @media(min-width:320px) and (max-width: 767px){
    .pictable{
    table-layout: fixed;
  width: 100%;
  white-space: nowrap;
}

.pictable td>p{
    white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.uploadbtn{
  display: none;
}

.uploadfilebtn{
  text-align: center;
}

.uploadfilebtn>span{
  padding-right: 3px !important;
}

.renamefile{
  display: none;
}

/*
.picimg {
  width: 50%;
}*/
.picname {
  width: 40%;
}
.picsize {
  width: 20%;
}
.picstatus{
   width: 20%;
}
.picoption {
  width: 20%;
}

  }
@media(min-width:767px){
    .pictable{
    table-layout: fixed;
  width: 100%;
  white-space: nowrap;
}

.pictable td>p{
    white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
/*
.picimg {
  width: 50%;
}*/
.picname {
  width: 40%;
}
.picsize {
  width: 20%;
}
.picstatus{
	 width: 20%;
}
.picoption {
  width: 20%;
}

}
</style>
</head>
<body>

<nav class="side-navbar web_view">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center">
     <a href="../../../../DEMO_CRM"> <img src="img/logo.png" alt="person" class="img-fluid"></a>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
        <!--   <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>D</strong><strong class="text-primary">M</strong></a></div> -->
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="index.php?page_no=1"> <i class="far fa-folder"></i>Files/Folders                             </a></li>
            <li><a href="creatFolder.php"> <i class="fas fa-folder-plus"></i>Create Folder                             </a></li>
            <li><a href="uploadFile.php"> <i class="fas fa-file-upload"></i>Upload Files                             </a></li>
            <!-- <li><a href="documents.php?page_no=1"> <i class="fas fa-file"></i>Documents</a></li> -->
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Media Files </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
               <li><a href="viewPictures.php?page_no=1"><i class="fas fa-images"></i>Pictures</a></li>
                <li><a href="viewAudio.php?page_no=1"><i class="fas fa-music"></i>Audio</a></li>
                <li><a href="viewVideo.php?page_no=1"><i class="fas fa-video"></i>Video</a></li>
              </ul>
            </li>
           <?php
          if($_SESSION["Login"]=="admin")
          {
            echo'<li><a href="setDefaultSizeLimit.php"><i class="fas fa-database"></i>Set Default File Size</a></li>';
			echo'<li><a href="deleteFileRequests.php"><i class="fas fa-archive"></i>Delete Requests</a></li>';
          }
        ?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page">

      <!-- New navbar html Start -->
          <!--Navbar-->
          <nav class=" navbar navbar-light light-blue lighten-4 mobile_view" style="display: none;">
            <!-- Collapse button -->
            <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
                  class="fas fa-bars fa-1x"></i></span>
            </button>
            <!-- Navbar brand -->
            <a class="navbar-brand" href="../../../../">
              <img src="img/logo.png" alt="person" class="img-fluid">
            </a>

            <a href="../../../../" class="pull-right" title="Go to Dashboard"> <span class=" dashbtn d-sm-inline-block">Go To Dashboard</span></a>
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <!-- Links -->
              <ul class="navbar-nav mr-auto main_list">
                <li class="nav-item active" title="Files/Folders">
                  <a class="nav-link" href="index.php" title="Files/Folders"> <i class="material-icons-outlined">folder</i><span>Files/Folders</span>
                  </a>
                </li>
                <li class="nav-item" title="Create Folder">
                  <a class="nav-link" href="creatFolder.php" title="Create Folder"> <i class="material-icons-outlined">create_new_folder</i><span>Create Folder</span>
                  </a>
                </li>
                <li class="nav-item" title="Upload Files">
                  <a class="nav-link" href="uploadFile.php" title="Upload Files"> <i class="material-icons-outlined">cloud_upload</i><span>Upload Files</span>
                  </a>
                </li>
                
                <?php
                     if($_SESSION["Login"]=="admin")
                     {
                       /*echo'<li  class="nav-item" title="Set Default File Size"><a class="nav-link" href="setDefaultSizeLimit.php" title="Set Default File Size"><i class="material-icons-outlined">settings_backup_restore</i><span>Set Default File Size</span></a></li>';*/
                        echo'<li class="nav-item" title="Delete Requests"><a class="nav-link" href="deleteFileRequests.php" title="Delete Requests"><i class="material-icons-outlined">delete</i><span>Delete Requests</span></a>
                          </li>';
                     }
                     ?>
              </ul>
              <!-- Links -->
              <ul class="navbar-nav mr-auto global-search">
                <li class="nav-item">
                  <div class="input-group bs-example">
                    <input type="text" name="typeahead" id="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Search">
                    <div class="input-group-btn">
                      <a class="btn btn-link global-searcy-button" id="search_header_btn" data-action="search" style="border-radius: 0px;position: relative;right: 0px;color: #fff;"> <i class="material-icons">search</i>
                      </a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <!-- Collapsible content -->
          </nav>
          <!--/.Navbar-->
        <!-- New navbar html End -->

      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars" ></i></a>
               </div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center" style="float:right;">
                <!-- Go To Dashboard-->
              <li class="nav-item" style="display: inline-block;"><a href="../../../../" class="nav-link logout"> <span class=" dashbtn d-sm-inline-block">Go To Dashboard <i class="fas fa-sign-out-alt"></i></span></a></li>
                 <!-- <li class="nav-item" style="display: inline-block;"><a href="../../../../" class="nav-link logout"> <span class=" dashbtn d-sm-inline-block">Logout <i class="fas fa-sign-out-alt"></i></span></a></li> -->
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Header Section-->
      <section class="dashboard-header section-padding">
        <div class="container-fluid pdeditfile">
                <form id="fileupload" action="https://jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
                    <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                  <div class="row">
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="">
                            <?php 
                            $data       =    include('../../../../data/fincrm_config.php');
  $host       =    $data['database']['host'];
  $user       =    $data['database']['user'];
  $password   =    $data['database']['password'];
  $dbname     =    $data['database']['dbname'];
  $conn       =    mysqli_connect($host, $user, $password, $dbname);
                            if($_GET['id']){
                // $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
                //                 if($conn->connect_error){
                //   die("Connection Failed". $conn->connect_error);
                //                 }
                ?>
                <label>Folder Name</label>
                              <select id="folder" name="folder" class="form-control" onchange="getFolderNameVal()"  >
                <?php
                $res= mysqli_query($conn, "SELECT * FROM folder_master where id='".$_GET['id']."'");
                    if($res!=""){
                      while($row1=mysqli_fetch_array($res)){
                      echo "<option value=".$row1['id'].">".$row1['folder_name']."</option>";
                      }
                    }
                    $res1= mysqli_query($conn, "SELECT * FROM sub_folder_master where id='".$_GET['id']."'");
                    if($res1!=""){
                      while($row2=mysqli_fetch_array($res1)){
                      echo "<option value=".$row2['id'].">".$row2['folder_name']."</option>";
                      }
                    }
                ?>
                </select>
              <?php
							}else{
								
						?>
							
                           <label>Folder Name</label>
                              <select id="folder" name="folder" class="form-control" onchange="getFolderNameVal()">
                                <option value="">Select Folder</option> 
                                    <?php
                                        //  $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
                                        // if($conn->connect_error){
                                        //     die("Connection Failed". $conn->connect_error);
                                        // }
                                        $assignedUserArr= array();
										$userAccessArr = array();
                                        $res= mysqli_query($conn, "SELECT * FROM folder_master");
                                        while($row= mysqli_fetch_array($res)){
											$assigneedUser= $row['assigned_user_id'];
											$userAccess= $row['define_access'];
											$assignedUserArr = explode(",", $assigneedUser);
											$userAccessArr = explode(",", $userAccess);
											for($i=0; $i<count($assignedUserArr) ; $i++){
												$singleUser= $assignedUserArr[$i];
												$singleUserAccess= $userAccessArr[$i];
												/* echo "<br>";
												echo "Single User== ".$singleUser;
												echo "<br>"; */
												if($singleUser==$userName AND ($singleUserAccess==="Both" OR $singleUserAccess==="Upload")){
												
													echo "<option value=".$row['id'].">".$row['folder_name']."</option>";
												}
			
											}
		
											//$res1= mysqli_query($conn, "SELECT *");
											if($row['created_user_id']===$userName){
												echo "<option value=".$row['id'].">".$row['folder_name']."</option>";
											}
										}
                                        
                                    ?>
                                </select>
                            <?php } 
							
							?>
                        </div>
                    </div>
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="">
                            <label>Assign User</label>
                              <select id="second" name="second[]" data-placeholder="Select  Users" class="chosen-select form-control" multiple style="" tabindex="4" onchange="getUser()">
                                  <option value=""></option> 
                                  <?php
                                  $resForUsers= mysqli_query($conn, "SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0'");
                                                        while($row2=mysqli_fetch_array($resForUsers)){
                                                            echo "<option value=".$row2['user_name'].">".$row2['first_name']." ".$row2['last_name']."</option>";
                                                        }
                                  ?>
                              </select>
                        </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 16px;">
                    <div class="fileupload-buttonbar">
                      <div class="col-12 col-xs-12 col-sm-12 col-md-8 col-lg-8">
                          <div class="">
                              <!-- The fileinput-button span is used to style the file input field as button -->
                              <span class="btn btn-success fileinput-button" title="Add Files">
                                  <i class="fas fa-plus"></i>
                                  <span>Add files...</span>
                                  <input type="file" onclick="clearFileArray()" name="files[]" multiple>
                              </span>
                              <button type="submit" class="btn btn-primary start" title="Start Upload" >
                                  <i class="fas fa-arrow-circle-up"></i>
                                  <span>Start upload</span>
                              </button>
                              <button type="reset" class="btn btn-warning cancel" title="Cancel Upload">
                                  <i class="fas fa-ban"></i>
                                  <span>Cancel upload</span>
                              </button>
							  <a href="renameFile.php"><span class="btn btn-primary"><i class="fas fa-edit"></i> Rename File</span></a>
                            <!--  <a href="#"><button type="" class="btn btn-primary" title="Rename Files">
                                  <i class="fas fa-edit"></i>
                                  <span>Rename</span>
                              </button></a> -->
                              <button type="button" class="btn btn-danger delete" title="Delete Files">
                                  <i class="fas fa-trash-alt"></i>
                                  <span>Delete</span>
                              </button>
                              <input type="checkbox" class="toggle">
                              <!-- The global file processing state -->
                              <span class="fileupload-process"></span>
                          </div>
                      </div>
                      <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4">
                          <div class="fileupload-progress fade">
                              <!-- The global progress bar -->
                              <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                  <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                              </div>
                              <!-- The extended global progress state -->
                              <div class="progress-extended" style="font-size:1.4rem;">&nbsp;</div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 16px;">
                      <div class="col-lg-12">
                          <div class="table-responsive">
                            <table role="presentation" class="table pictable"><tbody class="files">
                                 <tr style="background-color: #43648e;color: #fff;">
                                    <!-- <th  class="picimg">Images/Videos</th> -->
                                    <th class="picname">File Name</th>
                                    <th class="picsize">File Size</th>
									                   <th class="picstatus">Status</th>
                                    <th class="picoption">Options</th>
                                  </tr>
                            </tbody>

                            </table>
                            </div>
                      </div>
                  </div>
                </form>

                <div class="row" style="padding-top: 16px;">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h3 class="panel-title" style="font-size: 1.5rem;">Demo Notes</h3>
                              </div>
                          <?php
                            $resultForDefaultSize= mysqli_query($conn, "SELECT * FROM default_size_limit WHERE id='1'");
                            
                            $rowForDefaultSize = mysqli_fetch_array($resultForDefaultSize);
                            $defaultSizeLimit= $rowForDefaultSize['size'];
                          ?>
                              <div class="panel-body">
                                  <ul>
                                      <li>The maximum file size for uploads in this demo is <strong><?php echo $defaultSizeLimit; ?> MB</strong>.</li>
                                      <li>Only files (<strong>gif, jpeg/jpg, png, docx/doc, mp3, mp4, mkv, xlsx/xls, zip, rar, pdf, txt, csv</strong>) are allowed.</li>
                                      <li>Uploaded files will be deleted automatically after <strong>1 minutes or less</strong>.</li>
                                      <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage.</li>
                                  </ul>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
          
        
      </section>
    
      
    </div>

<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">

{% for (var i=0, file; file=o.files[i]; i++) { %}

    <tr class="template-upload fade">
        <td>
            {% if (window.innerWidth > 480 || !o.options.loadImageFileTypes.test(file.type)) { %}
                <p class="name">{%=file.name%}</p>

            {% } %}
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
		<td></td>
        <td >
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="fas fa-arrow-circle-up"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                   <i class="fas fa-ban"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">

{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
			
			<p class="name">
				{% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span class="label label-danger">Error</span> {%=file.name[0]%}
                {% } %}
            </p>
			
            {% if (file.error) { %}
				{% if (file.name=="File already exist") { %}
				{% }else if(file.name=="File size is to large"){ %}
				{% }else if(file.name=="File Type Not Allowed"){ %}
				{% }else{ %}
                <div><span class="label label-danger">Error</span> {%=file.name[1]%}</div>
				{% } %}
				
            {% } %}
        </td>
        <td>
			
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
		<td>
			{% if (file.error) { %}
			<div class="uploadfilebtn" style="padding-top: 2px;" title="Uploading Failed !"><span class="label label-danger " style="padding:4px; padding-right: 33px;"><i class="fas fa-bug"></i><span class="uploadbtn">&nbsp;&nbsp;&nbsp;Uploading Failed !.</span></span></div>
			{% }else{ %}
			<div class="uploadfilebtn" style="padding-top: 2px;" title="Uploaded Successfully !"><span class="label label-success" style="padding:4px; margin-top:4px;"><i class="fas fa-check-square"></i><span class="uploadbtn">&nbsp;&nbsp;&nbsp;Uploaded Successfully !.</span></span></div>
			{% } %}
		</td>
        <td>
			{% if (file.name[1]=="File already exist") { %}
				
				<a href="renameSingleFile.php?fileName={%=file.name[0]%}&fileSize={%=file.name[2]%}" title="Rename File"><span class="btn btn-primary"><i class="fas fa-edit"></i> <span class="renamefile">Rename File</span></span></a>
			 {% } %}
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %} title="Delete">
                    <i class="fas fa-trash-alt"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel" title="Cancel">
                   <i class="fas fa-ban"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>  -->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="js/uploadjs/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="js/uploadjs/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="js/uploadjs/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- blueimp Gallery script -->
<script src="js/uploadjs/jquery.blueimp-gallery.min.js"></script>

 <script src="chosen.jquery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->


<script>
	function getFolderNameVal(){
		var folderName= document.getElementById('folder').value;
		/* if(folderName===""){
			var folderName= document.getElementById('folder1').value;
		} */
		//alert($arr);
		//alert("FOLDER NAME = "+folderName);
		$.ajax({
            url:"getFolderName.php",
			method:"post",
            data:{folderName:folderName},
                        
            success:function(data)
            {
				//$('#idselectbox'+selectcnt).html(data);
            }
        });
		
	}
	
</script>
<script>
	$(".chosen-select").chosen();
$('button').click(function() {
  $(".chosen-select").val('').trigger("chosen:updated");
});
</script>
<script>
var arr = [];
	function getUser(){
		
		//arr.push(document.getElementById('second').value);
		
		var values = $('#second').val();
		//alert(values);
		//alert();
		$.ajax({
            url:"getUserName.php",
			method:"post",
            data:{userName:values},
                        
            success:function(data)
            {
				//$('#idselectbox'+selectcnt).html(data);
            }
        });
	}
	
</script>
<script>
	function clearFileArray(){
		alert("IN CLEAR ARRAY METHOD");
		//window.location.reload();
		{% for (var i=0, file; file=o.files[i]; i++) { %}
			${%=file.name=''%}
		{% } %}
	}
</script>
</body>
</html>
