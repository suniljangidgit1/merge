<?php
session_start();
if($_SESSION['Login']==""){
      echo "<script>window.location='http://".$_SERVER['SERVER_NAME']."'</script>";  
   }
   if($_SESSION['Login']=='fincrm'){
     $_SESSION['Login']="admin";
   }  
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
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
     <link href="fonts/Roboto/Roboto.css" rel="stylesheet">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
     <link rel="stylesheet" href="css/jquery-confirm.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/favicon.png">
     <link href="icons-reference/Google-Material-Icons.css" rel="stylesheet">
    <!-- Favicon-->
   <!--  <link rel="shortcut icon" href="img/favicon.ico"> -->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script>
			onload =function(){ 
			  var ele = document.querySelectorAll('.number-only')[0];
			  ele.onkeypress = function(e) {
				 if(isNaN(this.value+""+String.fromCharCode(e.charCode)))
					return false;
			  }
			  ele.onpaste = function(e){
				 e.preventDefault();
			  }
			}
		</script>
     <style type="text/css">
       .material-icons {
        font-size: 18px;
      }
      .material-icons-outlined {
          font-size: 18px;
      }
      </style>
      
      <script src="js/typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
	    $('input.typeahead').typeahead({
	        name: 'typeahead',
	        remote:'search.php?key=%QUERY',
	        limit : 10
	      });
    });
    </script>
      
  </head>
  <body>
    <!-- Side Navbar -->
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
        <div class="main-menu" style="padding-top: 20px;">
          <ul id="side-main-menu" class="side-menu list-unstyled">
            <li title="Files/Folders"><a href="index.php" title="Files/Folders"> <i class="material-icons-outlined">folder</i><span>Files/Folders</span></a></li>
            <li title="Create Folder"><a href="creatFolder.php" title="Create Folder"> <i class="material-icons-outlined">create_new_folder</i><span>Create Folder</span></a></li>
            <li title="Upload Files"><a href="uploadFile.php" title="Upload Files"> <i class="material-icons-outlined">cloud_upload</i><span>Upload Files</span></a></li>
           <!-- <li><a href="documents.php?page_no=1"> <i class="fas fa-file"></i>Documents</a></li> -->
           <!-- <li title="Media Files"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse" title="Media Files"> <i class="material-icons-outlined">perm_media</i><span>Media Files</span></a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
               <li title="Pictures"><a href="viewPictures.php" title="Pictures"><i class="material-icons-outlined">collections</i><span>Pictures</span></a></li>
                <li title="Audio"><a href="viewAudio.php" title="Audio"><i class="material-icons-outlined">library_music</i><span>Audio</span></a></li>
                <li title="Video"><a href="viewVideo.php" title="Video"><i class="material-icons-outlined">video_library</i><span>Video</span></a></li>
              </ul>
            </li>-->
            
            <!-- <li title="Media Files" class="dropdown position-relative dropright" id="dd">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-boundary="dd" data-display="static" title="Media Files"> <i class="material-icons-outlined">perm_media</i><span>Media Files</span></a>
			    <div class="dropdown-menu position-fixed media-files">
			    	<a class="dropdown-item" href="viewPictures.php" title="Pictures"><i class="material-icons-outlined">collections</i><span>Pictures</span></a>
			    	<a href="viewAudio.php" class="dropdown-item" title="Audio"><i class="material-icons-outlined">library_music</i><span>Audio</span></a>
			    	<a href="viewVideo.php" class="dropdown-item" title="Video"><i class="material-icons-outlined">video_library</i><span>Video</span></a>
			    </div>
			  </li> -->
            <?php
              if($_SESSION["Login"]=="admin")
              {
                /*echo'<li title="Set Default File Size"><a href="setDefaultSizeLimit.php" title="Set Default File Size"><i class="material-icons-outlined">settings_backup_restore</i><span>Set Default File Size</span></a></li>';*/
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
          <div class="container-fluid nav-menu-admin">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
             <div class="navbar-header" ><a id="toggle-btn1" href="#" class="menu-btn  navbar-header-top"><i class="fa fa-bars" aria-hidden="true"></i></a>
               </div>
               
               <div class="input-group bs-example">
              <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Search">
              <div class="input-group-btn">
              <a class="btn btn-link global-searcy-button" id="search_header_btn" data-action="search" style="border-radius:0px;position: relative;left:-36px;">
                <i class="material-icons">search</i>
            </a>
                </div>
          </div>
               
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Go To Dashboard-->
               <li class="nav-item" title="Go to Dashboard">
                <a href="../../../../" class=" logout" title="Go to Dashboard"> <span class=" dashbtn d-sm-inline-block">Go To Dashboard</span></a>
              </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      
      <!-- Breadcrumb-->
     <!--  <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Folder       </li>
          </ul>
        </div>
      </div> -->

      <!-- Header Section-->
      <section class="dashboard-header section-padding">
        <div class="container-fluid pdeditfile">
          <div class="row d-flex align-items-md-stretch">
          	<div class="col-xs-12 col-sm-12 col-md-6 offset-md-3"> 
              <div class="mt40">
                <div class="row">
                  <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 main">
                    <div class="dm_upload_Limit">
                     <h2 class="text-center mb-4">Set Default File Size</h2>
                      <form action="" method="post">
                        <input type="hidden" name="usercount" id="inputcountusers">
                          <div class="form-group row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                               <label>Set Default Size Limit</label>
                            </div>
                            <div class="col-8 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            	<?php
							
									$query="Select * from default_size_limit";
									// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
									// if ($conn->connect_error) { // Check connection
									// 	die("Connection failed: " . $conn->connect_error);
									// } 
									$fire_query=mysqli_query($conn,$query);
									$show_data= mysqli_fetch_array($fire_query);
									//echo $show_data['size'];
								?>	
                             	<input type="text" class="form-control number-only" name="setDefaultSizeLimit" placeholder="Enter file size in MB" data-toggle="tooltip" data-placement="right" title="Current default file size is  <?php echo $show_data['size']." MB";  ?>" required>
                            </div>
                          
                            <div class="col-4 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <button class="btn btn-primary form-control" type="submit" value="Save" name="sizesave" style="color:#fff;">Save</button>
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
      </section>
    
      
    </div>
    <!-- JavaScript files-->
    
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
      <script src="js/jquery-confirm.min.js"></script>


      <?php
  if(isset($_POST['sizesave']))
  {
    $size= $_POST['setDefaultSizeLimit'];
    date_default_timezone_set('Asia/Kolkata');
    // $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
    // if ($conn->connect_error) { // Check connection
    //   die("Connection failed: " . $conn->connect_error);
    // } 
    $sql= "SELECT * from default_size_limit where id='1'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['id']== ''){
      $result=mysqli_query($conn, "INSERT INTO default_size_limit (size, createdAt) values ('".$size."', '".date("d-m-Y h:i:s A")."')");
      if($result)
      {

        echo"<script>
                $.confirm({
                  title: '',
                  content: 'Default Size Updated Successfully',
                   type: 'dark',
                buttons: {
                    ok: function () {
                          window.location.href='setDefaultSizeLimit.php';
                    }
                }
            });
            </script>";

        /*echo"<script>
        $.confirm({
                  title: '',
                  content: 'Default Size Updating...',
                  autoClose: 'Updating|600',
                   type: 'dark',
            buttons: {
                Updating: function () {
                     $.alert('Default Size Updated Successfully');
                      window.location.href='setDefaultSizeLimit.php';
                }
            }
        });
        </script>";*/

        /*echo"<script>
        alert('Default size updated successfully !!!!');
        history.go(-2);
        </script>";*/
      }
      else{
        echo"<script>
        $.alert('Something Went Wrong');
        </script>";
      }
      //header('location:successForDefaultSize.html');
    }else{
      $result1=mysqli_query($conn, "UPDATE default_size_limit SET size='".$size."' WHERE id='1' ");
      if($result1)
      {
        echo"<script>
                $.confirm({
                  title: '',
                  content: 'Default Size Updated Successfully',
                   type: 'dark',
                buttons: {
                    ok: function () {
                          window.location.href='setDefaultSizeLimit.php';
                    }
                }
            });
            </script>";
        
        /*echo"<script>
        $.confirm({
                  title: '',
                  content: 'Default Size Updating...',
                  autoClose: 'Updating|700',
                   type: 'dark',
            buttons: {
                Updating: function () {
                     $.alert('Default Size Updated Successfully');
                      window.location.href='setDefaultSizeLimit.php';
                }
            }
        });
        </script>";*/

        /*echo"<script>
        alert('Default size updated successfully !!!!');
        history.go(-2);
        </script>";*/
      }
      else{
        echo"<script>
        $.alert('Something Went Wrong');
        </script>";
      }
      //header('location:successForDefaultSize.html');  
    }
  }
?>
  </body>
</html>
