<?php
session_start();
$fileArray = array();
	



?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery File Upload Demo</title>
<meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap styles -->
 <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link rel="stylesheet" href="css/fontastic.css">
 <link rel="stylesheet" href="fonts/Roboto/Roboto.css">
  <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default1.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="css/style1.css">
<link rel="shortcut icon" href="img/favicon.png">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
 
    <style>
.userList{
    padding: 10px;
    display:none;
}

.userList li{
  list-style: none;
  display: inline;
  cursor: pointer;
}

.userListoption{
  position: absolute;
    top: 0px;
    left: 501px;
    padding: 7px;
    border-radius: 5px;
}

.userListoption:focus{
  outline: none;
}

@media(min-width:320px) and (max-width:767px){ 

  .userListoption{
   position: absolute;
    top: 40px;
    left: 244px;
    padding: 8px;
    border-radius: 5px;
    width: 109px;
}

.folderListoption:focus{
  outline: none;
}

@media(min-width:420px) and (max-width:867px){ 

  .folderListoption{
   position: absolute;
    top: 40px;
    left: 484px;
    padding: 8px;
    border-radius: 5px;
    width: 109px;
}

.btngroup{
  margin-top:10px;
}

.dashboard-header .card{
  padding: 0px;
  margin-bottom: 10px;
  margin-top: 10px;
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
      <a href="../../../../"><img src="img/logo.png" alt="person" class="img-fluid"></a>
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
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-grip-horizontal"></i>Media Files </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
               <li><a href="viewPictures.php?page_no=1"><i class="fas fa-images"></i>Pictures</a></li>
                <li><a href="viewAudio.php?page_no=1"><i class="fas fa-music"></i>Audio</a></li>
                <li><a href="viewVideo.php?page_no=1"><i class="fas fa-video"></i>Video</a></li>
              </ul>
            </li>
           <li><a href="setDefaultSizeLimit.php"><i class="fas fa-database"></i>Set Default File Size</a></li>
          
    
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
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars" aria-hidden="true"></i></a>
               </div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Go To Dashboard-->
              <li class="nav-item"><a href="../../../../" class="nav-link logout"> <span class=" dashbtn d-sm-inline-block">Go To Dashboard </span></a></li>
                 <li class="nav-item"><a href="../../../../" class="nav-link logout"> <span class=" dashbtn d-sm-inline-block">Logout <i class="fas fa-sign-out-alt"></i></span></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <section class="dashboard-header section-padding">
        <div class="container-fluid">
          <div class="row">
           <div class="col-sm-12 col-md-12">
                <!-- The file upload form used as target for the file upload widget -->
                    <form id="fileupload"  method="POST"  enctype="multipart/form-data">
                        <!-- Redirect browsers with JavaScript disabled to the origin page -->
                        <noscript><input type="hidden" name="redirect" value=""></noscript>
                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                        <div class="row fileupload-buttonbar">
                            <div class="col-sm-12 col-md-9 col-lg-9">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Add files...</span>
                                    <input type="file" name="files" multiple>
                                </span>
                                <button type="submit" id="startUpload" name="startUpload" onclick="getUploadedFiles()" class="btn btn-primary start" >
                                    <i class="glyphicon glyphicon-upload"></i>
                                    <span>Start upload</span>
                                </button>
                                <button type="reset" class="btn btn-warning cancel">
                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                    <span>Cancel upload</span>
                                </button>
                                <button type="button" class="btn btn-danger delete">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    <span>Delete</span>
                                </button>
                                <input type="checkbox" class="toggle">
                                <div class="userList">
      
                                 </div>
                               
                                <select class="userListoption fileinput-button" onchange="selectIngredient(this);">
                                   <option value="">Assigned User</option>
                                   <?php

										//get connection
                    include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
										if($conn->connect_error){
											die("Conection Failed : ". $conn->connect_error);
										}
										
										$getUser= mysqli_query($conn, "SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0'");
										
										while($getUserRow = mysqli_fetch_array($getUser)){
											if($getUserRow['password']!=""){
												echo "<option value=".$getUserRow['user_name'].">".$getUserRow['user_name']."</option>";
											}
										}
										
								   ?>
									
                                </select>
								
								<select class="folderListoption" id="folderName" name="folderName" onchange="getFolderName()" style="position:absolute; left:640px; top:0px; padding: 8px;
								border-radius: 5px; width: 209px;" >
                                   <option value="">Select Folder</option>
                                   <?php
									$sqlForFolder= mysqli_query($conn, "SELECT * FROM folder_master");
									
									while($rowForFolder= mysqli_fetch_array($sqlForFolder)){
										echo "<option value=".$rowForFolder['id'].">".$rowForFolder['folder_name']."</option>";
									}
								   ?>
									
                                </select>
								<input type="hidden" name="fileName" id="fileName" />
								<!-- <input type="text" id="count" name="count" /> -->
								
								
								
                                <!-- The global file processing state -->
                                <span class="fileupload-process"></span>
                            </div>
                            <!-- The global progress state -->
                            <div class="col-sm-12 col-md-3 col-lg-3 fileupload-progress fade">
                                <!-- The global progress bar -->
                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                </div>
                                <!-- The extended global progress state -->
                                <div class="progress-extended">&nbsp;</div>
                            </div>
                        </div>
                        <!-- The table listing the files available for upload/download -->
                        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                    </form>
                </div>
                <div class="col-md-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Notes</h3>
                        </div>
                        <div class="panel-body">
						<?php
							$result= mysqli_query($conn, "SELECT * FROM default_size_limit WHERE id=1");
							$row = mysqli_fetch_array($result);
							
							$folderDefaultSize= $row['size'];
						?>
                            <ul>
                                <li>The maximum file size for uploads in this demo is <strong><?php echo $folderDefaultSize ?> MB</strong> (default file size is unlimited).</li>
                                <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).</li>
                                <li>Uploaded files will be deleted automatically after <strong>5 minutes or less</strong> (demo files are stored in memory).</li>
                                <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage (see <!--<a href="https://github.com/blueimp/jQuery-File-Upload/wiki/Browser-support">-->Browser support<!--</a> -->).</li>
                                <li>Please refer to the <!--<a href="https://github.com/blueimp/jQuery-File-Upload"> -->project website<!-- </a> --> and <!--<a href="https://github.com/blueimp/jQuery-File-Upload/wiki"> -->documentation<!--</a> --> for more information.</li>
                                <li>Built with the <!-- <a href="http://getbootstrap.com/"> -->Bootstrap<!--</a> --> CSS framework and Icons from<!-- <a href="http://glyphicons.com/"> --> Glyphicons<!--</a> -->.</li>
                            </ul>
                        </div>
                    </div>
                </div>
          </div>
        </div>
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
      </section>
    </div>

 <script>
	var userList=[];
	function getFolderName(){
		 var folderName= document.getElementById('folderName').value;
		  //document.getElementById("folderN").value= folderName;
		 $.ajax({
			type: 'POST',		
			url: 'getFolderName.php',
			data: {data: folderName},
			success: function (response) {
				//var response = response;
				alert(response);
			}
			// dataType: 'html'
		}); 
		  
	}
	
		var count=0
		
      function selectIngredient(select)
      {
		  count++;
		  alert($(select).val());
        document.getElementsByClassName('userList')[0].style.display = 'block';
        var $ul = $(select).prev('div');
         
        if ($ul.find('input[value=' + $(select).val() + ']').length == 0)
        $ul.append('<li onclick="$(this).remove();">' +
          '<input id="name'+count+'" name="name'+count+'" type="text" name="ingredients[]" value="' + 
          $(select).val() + '" style="border:none;" />&times;' +
          $(select).find('option[selected]').text() + '</li>');
		  
		  alert(count);
		  alert("name"+count);
		  userList.push($(select).val());
		  //document.getElementById("count").value="name"+count;
		  document.getElementById("count").value = count;
			
		 $.ajax({
			type: 'POST',		
			url: 'getUserList.php',
			data: {data: userList},
			success: function (response) {
				//var response = response;
				alert(response);
			}
			// dataType: 'html'
		}); 	
			
		  
		  
      }
</script>

<!-- The template to display files available for upload -->
<script>
	function getUploadedFiles(){
		//alert("HII");
		var fil= document.getElementById("fil").value;
		alert(fil);
		
		//window.location= "uploadFromNew.php?file="+fil;
	}
	
</script>

<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            
			<p class="name">{%=file.name%}</p>
			
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <input type="text" name="folderN" id="folderN" />
			<input type="text" name="count" id="count" />
			<p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
		<td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
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
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
						
			
					
					<?php
						//$userName=$_SESSION["Login"];
						$userName="admin";
						//$fileName= "<script>fileName</script>";
						//$fileName= mysqli_real_escape_string($conn,'{%=file.name%}');
						$fileSize= mysqli_real_escape_string($conn,'{%=file.size%}');
						$fileT= mysqli_real_escape_string($conn,'{%=file.type%}');
						//echo "<br>";
						//echo $fileName;
						////echo "<br>";
						//echo $fileSize;
						echo "<br>";
						$userListFinal= implode(",",$_SESSION["userList"]);
						echo "USERLIST = ".$userListFinal;
						$folderName= $_SESSION['folderName'];
						echo "FOLDER NAME". $folderName;
						//date_default_timezone_set('Asia/Kolkata');
						//$created_at= $DateTime->format('d-m-Y h:i:s A');
						$created_at="NULL";
						//mysqli_query($conn, "INSERT INTO document_master (folder_id, document_name, document_type, document_size, document_content, created_user_id, assigned_user_id, define_access, createdAt) VALUES ('".$folderName."', '".$fileName."', '".$fileT."', '".$fileSize."', 'NULL', '".$userName."', '".$userListFinal."', 'Download', '".$created_at."')");
						
						
					?>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
				
					
					
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
			<?php
				//$_SESSION["userList"]="";
			?>
	
		
    </tr>
{% } %}

</script>
<script src="vendor/jquery/jquery.min.js"></script>

 <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="js/uploadjs/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="js/uploadjs/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="js/uploadjs/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<!-- blueimp Gallery script -->
<script src="js/uploadjs/jquery.blueimp-gallery.min.js"></script>
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




</body>
</html>
