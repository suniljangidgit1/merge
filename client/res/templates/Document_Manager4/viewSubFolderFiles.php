<?php
   // error_reporting(0);
    //echo "IN FOLDER FILES";
    session_start();
    error_reporting(0);
    if($_SESSION['Login']==""){
      echo "<script>window.location='http://".$_SERVER['SERVER_NAME']."'</script>";  
   }
   if($_SESSION['Login']=='fincrm'){
     $_SESSION['Login']="admin";
   }   
    $subfolderId= $_GET['id'];
    $_SESSION['subfolderID']=$subfolderId;
    $userName=$_SESSION['Login'];
    //$userName= 'gaikwad';
    unset($_SESSION['idsForDelete']);
   
    $_SESSION['idsForDelete']="";
   //get connection
  include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
  $con          =$conn;
  $connect      =$conn;
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
      <!-- theme stylesheet-->
      <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
      <!-- Custom stylesheet - for your changes-->
      <link rel="stylesheet" href="css/custom.css">
      <!-- Favicon-->
      <link rel="shortcut icon" href="img/favicon.png">
      <link rel="stylesheet" href="css/jquery-confirm.min.css">
      <link href="icons-reference/Google-Material-Icons.css" rel="stylesheet">
      <!-- Tweaks for older IEs--><!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <link href="css/customA11ySelect.css" rel="stylesheet">
      <link rel="stylesheet" href="css/jquery.dataTables.min.css">
      <style>
         .material-icons {
         font-size: 18px;
         }
         .material-icons-outlined {
         font-size: 18px;
         }
         /*#action .btn{
         border-left:0px;
         padding: 8px;
         }*/
         @media(min-width:767px){
         .pictable{
         table-layout: fixed;
         /*width: 100%;*/
         white-space: nowrap;
         }
         .pictable td{
         white-space: nowrap;
         overflow: hidden;
         text-overflow: ellipsis;
         }
         .piccheck{
         width:5%;
         }
         .picname {
         width: 40%;
         }
         .piccreateby {
         width: 13%;
         }
         .piclastmody {
         width: 22%;
         }
         .picsize{
         width: 12%;
         }
         .picoption {
         width: 5%;
         }
         }
      </style>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script>
         $(document).ready(function() {
          $('#example').DataTable( {
            "pagingType": "full_numbers",
             "lengthMenu": [20, 50, 75, 100 ],
              "pageLength": 20
          } );
         } );
      </script>
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
      <script type="text/javascript">
         $(document).ready(function(){
          $(document).on("click",".btndeletesubfolder",function()
          {
            var id=$(this).data("deletesubfolder-id");
            $.confirm({
                           title: 'Folder Delete',
                           content: 'Do you want to delete folder?',
                            type: 'dark',
                 buttons: {
                    Ok: function () {
                      $.ajax({
                        url:"newbeforeDeleteFolder.php",
                        method:"post",
                        data:{id:id},
                        success:function(checkValues)
                        {
          var res = checkValues.substring(0, 1);
                          //alert(checkValues);
                           //$.alert("Files and folders deleted successfully");
                           //$('#result').html(data);
                           //window.location.href='index.php';
                           //window.location.reload();
                           if(res=="1"){
                               
                                $.confirm({
                                     title: 'Success!',
                                     content: 'Folder Delete request sent successfully',
                                      type: 'dark',
                                       buttons: {
                                     Ok: function () {
                                       window.location.reload();
                                       }
                                     
                                     }
                 
                                   });
                               
                           }else{
                                $.confirm({
                                     title: 'Success!',
                                     content: 'Folder Deleted successfully',
                                      type: 'dark',
                                       buttons: {
                                     Ok: function () {
                                       window.location.reload();
                                       }
                                     
                                     }
                 
                                   });
                           }
         
                          
                          
                        }
                      });
                    },
                    Cancel: function () {
                      location.reload();
                    },
                    },
              });
          });
          $(document).on("click",".btndocumentUpdate",function()
          {
            var id=$(this).data("documentupdate-id");
            $.confirm({
                           title: 'File Delete',
                           content: 'Do you want to delete File?',
                            type: 'dark',
                 buttons: {
                    Ok: function () {
                      $.ajax({
                        url:"newbeforeDeleteFile.php",
                        method:"post",
                        data:{id:id},
                        success:function(checkValues)
                        {
                          // alert(checkValues);
                           //$.alert("Files and folders deleted successfully");
                           //$('#result').html(data);
                           //window.location.href='index.php';
                           //window.location.reload();
                           if(checkValues=="Not Admin"){
                               $.confirm({
                             title: 'Success!',
                             content: 'File Delete request sent successfully',
                              type: 'dark',
                               buttons: {
                             Ok: function () {
                               window.location.reload();
                               }
                             
                             }
         
                           });
         
                           }else{
                               
                               $.confirm({
                             title: 'Success!',
                             content: 'File Deleted successfully',
                              type: 'dark',
                               buttons: {
                             Ok: function () {
                               window.location.reload();
                               }
                             
                             }
         
                           });
                               
                           }
         
                          
                          
                        }
                      });
                    },
                    Cancel: function () {
                      location.reload();
                    },
                    },
              });
            
            
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
                  <img src="img/logo.png" alt="person" class="img-fluid rounded-circle">
               </div>
               <br>
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
                  <!--<li title="Media Files"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse" title="Media Files"> <i class="material-icons-outlined">perm_media</i><span>Media Files</span></a>
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
         <!-- Header Section-->
         <section class="dashboard-header section-padding">
            <div class="container-fluid">
               <div class="">
                        <div class="row pb-3">
                           <div class="col-12 col-xs-7 col-sm-7 col-md-7">
                              <div class="">
                                 <h3><?php $id= $_GET['id']; ?></h3>
                                 <?php
                                    // $con=mysqli_connect('localhost', 'root', 'root', 'fincrm');;
                                    // if($con->connect_error){
                                    //     die("Connection Failed" . $con->connect_error);
                                    //   }
                                    $folder_array=array();
                                    
                                    $str=mysqli_query($con,"SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$_GET['id']);
                                     // print_r($str);echo "<br>";    
                                    $result_str=mysqli_fetch_array($str);
                                     // echo "<pre>"; print_r($result_str);
                                    $_SESSION['sub_folder_name']=$result_str['folder_name'];
                                    // echo $_SESSION['sub_folder_name']; 
                                    $str1=mysqli_query($con,"SELECT * FROM sub_folder_master_3 WHERE id=".$_GET['id']);   
                                    $result_str1=mysqli_fetch_array($str1);
                                    $folderMasterID=$result_str1['folder_master_id'];
                                    
                                    $folder_path='';
                                    $last_folder_name=$result_str1['folder_name'];
                                    $i=0;
                                    while($_SESSION['sub_folder_name']!=$last_folder_name)
                                    { 
                                    
                                    $str2=mysqli_query($con,"SELECT * FROM sub_folder_master_3 WHERE id=".$folderMasterID);
                                    $find_record=mysqli_num_rows($str2);
                                    
                                    if($find_record)
                                    {
                                      $result_str2=mysqli_fetch_array($str2);
                                      $folderID=$result_str2['id'];
                                        
                                        $folderNAME=$result_str2['folder_name'];
                                        //$folder_array[$i]=" > ".$result_str2['folder_name'];
                                        $folder_path.=","."<a href='?id=$folderID'>$folderNAME</a>";
                                        $i=$i+1;
                                        $last_folder_name=$result_str2['folder_name'];
                                        $folderMasterID=$result_str2['folder_master_id'];
                                    }
                                    else
                                    {
                                      break;
                                    } 
                                    
                                    
                                    }
                                    
                                    
                                    $main_foldername=$_SESSION['Main_folder_name'];
                                    $main_folder_ID=$_SESSION['Main_folder_id'];
                                    
                                    echo "<h3><a href='index.php'><i class='fas fa-home'></i></a>&nbsp; » &nbsp;";
                                    echo "<a href='viewFolderFiles.php?id=$main_folder_ID'>$main_foldername</a>";
                                    
                                    $convert_int_array=explode(",",$folder_path);
                                    $reverse_folderName_array=(array_reverse($convert_int_array));
                                    for($a=0;$a<count($reverse_folderName_array);$a++)
                                    {
                                    echo "  » ".$reverse_folderName_array[$a];
                                    }
                                    
                                    $current_folder_ID=$result_str1['id'];
                                    $current_folder_NAME=$result_str1['folder_name'];
                                    echo "<a href='?id=$current_folder_ID'>$current_folder_NAME</a></h3>";
                                    
                                    ?>
                              </div>
                           </div>
                           <div class="col-12 col-xs-5 col-sm-5 col-md-5">
                              <div class="row pb-3">
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="pull-right">
                                       <div class="btn-group pull-right mt10" role="group">
                                          <?php
                                             if($userName!="admin"){
                                              // echo "NOT ADMIN";
                                              // $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
                                              // if($conn->connect_error){
                                              //   die("Connection Failed ".$conn->connect_error);
                                              // }
                                              $assignUserArr= array();
                                              $defineAccessArr=array();
                                              $res= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id='".$subfolderId."'");
                                              $row= mysqli_fetch_array($res);
                                              $assignedUser= $row['assigned_user_id'];
                                              // echo "$defineAccess ==". $defineAccess;
                                              $defineAccess= $row['defineAccess'];
                                              $createdUserId= $row['created_user_id'];
                                              $assignUserArr= explode(",", $assignedUser);
                                              // print_r($defineAccess);die;
                                              $defineAccessArr= explode(",", $defineAccess);
                                              for($i=0; $i<count($assignUserArr); $i++){
                                                if($assignUserArr[$i]!=""){
                                                $singleUser= $assignUserArr[$i];
                                                $singleDefineAccess= $defineAccessArr[$i];
                                                
                                                if($singleUser==$userName AND ($singleDefineAccess=="Both" OR $singleDefineAccess=="Upload" )){
                                                  
                                                  ?>
                                          <button type="button" class="btn btn-danger"><a class="bt" href="uploadFile.php?id=<?php echo $subfolderId; ?>" style="color:#337AB7;text-decoration: none;"><i class="material-icons-outlined" style="position:relative;top:3px;">cloud_upload</i> Upload File</a></button>
                                          <?php
                                             }
                                             else if($createdUserId==$userName){
                                              ?>
                                          <button type="button" class="btn btn-danger"><a class="bt" href="uploadFile.php?id=<?php echo $subfolderId; ?>" style="color:#337AB7;text-decoration: none;"><i class="material-icons-outlined" style="position:relative;top:3px;">cloud_upload</i> Upload File</a></button>
                                          <?php
                                             }
                                             
                                             
                                             }
                                             ?>
                                          <button type="button" class="btn btn-danger bt"><a class="bt" href="createSubFolder.php?id=<?php echo $subfolderId; ?>"style="color:#337AB7;text-decoration: none;"><i class="material-icons-outlined" style="position:relative;top:3px;">create_new_folder</i> Create Sub Folder</a></button>
                                          <!-- <button type="button" class="btn btn-danger bt" onclick="deletedMultipleSelectedFiles()"> <a class="bt" href="#" style="color:#337AB7;text-decoration: none;"><i class="fas fa-trash-alt"></i> Delete</a></button> -->
                                          <div class="dropdown" id="action">
                                             <button type="button" class="btn btn-primary dropdown-toggle pull-right" data-toggle="dropdown">Actions
                                             </button>
                                             <div class="dropdown-menu actionViewDrop1">
                                                <a  class="dropdown-item" onclick="getFilesNameForShare()" href="#">Share</a>
                                                <a class="dropdown-item" href="downloadMultipleFilesAndFolders.php">Download</a>
                                                <a href="#" onclick="deletedMultipleSelectedFiles()" class="dropdown-item">Delete</a>
                                             </div>
                                          </div>
                                          <?php
                                             }
                                             }
                                             
                                             if($userName=="admin"){
                                              //echo "ADMIN";
                                             ?>
                                          <!--<a class="btn btn-danger bt" href="uploadFile.php?id=<?php echo $folderId; ?>">Upload File</a> -->
                                          <button type="button" class="btn btn-danger"><a class="bt" href="uploadFile.php?id=<?php echo $subfolderId; ?>" style="color:#337AB7;text-decoration: none;"><i class="material-icons-outlined" style="position:relative;top:3px;">cloud_upload</i> Upload File</a></button>
                                          <button type="button" class="btn btn-danger bt"><a class="bt" href="createSubFolder.php?id=<?php echo $subfolderId; ?>"style="color:#337AB7;text-decoration: none;"><i class="material-icons-outlined" style="position:relative;top:3px;">create_new_folder</i> Create Sub Folder</a></button>
                                          <!-- <button type="button" class="btn btn-danger bt" onclick="deletedMultipleSelectedFiles()"> <a class="bt" href="#" style="color:#337AB7;text-decoration: none;"><i class="fas fa-trash-alt"></i> Delete</a></button> -->
                                          <div class="dropdown" id="action">
                                             <button type="button" class="btn btn-primary dropdown-toggle pull-right" data-toggle="dropdown">Actions
                                             </button>
                                             <div class="dropdown-menu actionViewDrop1">
                                                <a  class="dropdown-item" onclick="getFilesNameForShare()" href="#">Share</a>
                                                <a class="dropdown-item" href="downloadMultipleFilesAndFolders.php">Download</a>
                                                <a href="#" onclick="deletedMultipleSelectedFiles()" class="dropdown-item">Delete</a>
                                             </div>
                                          </div>
                                          <?php 
                                             }
                                             ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- <div class="row mb-3" id="action">
                           <div class="col-md-12">
                             <div class="dropdown">
                           <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown">Action
                           </button>
                           <div class="dropdown-menu">
                           <a  class="dropdown-item" onclick="getFilesNameForShare()" href="#">Share</a>
                           <a class="dropdown-item" href="downloadMultipleFilesAndFolders.php">Download</a>
                           <a href="#" onclick="deletedMultipleSelectedFiles()" class="dropdown-item">Delete</a>
                           </div>
                           </div>
                           </div>
                           </div> -->
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
                           
                                        $("#ShareSubViewFolderFilesModal").modal()  ;
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
                        <div id="result"></div>
                        <?php
                           $folderID= $_SESSION['subfolderID'];
                           
                           //echo $offset." ".$total_records_per_page;
                           // $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
                           $output = '';
                           
                           
                            $query1 = "
                            SELECT * FROM document_master_3 WHERE folder_id=$subfolderId";
                           
                           $result = mysqli_query($connect, $query1);
                           
                           
                            $query2 = "
                            SELECT * FROM sub_folder_master_3 WHERE folder_master_id=$subfolderId";
                           
                           $resultForFolder = mysqli_query($connect, $query2);
                           
                            $output .= '<div class="row"><div class="col-md-12"><div class="dm_table"><div class="table-responsive" style="overflow-x:hidden;">
                              <table id="example" class="display table  pictable bordered">
                                <thead>
                                  <tr>
                                    <th class="piccheck"><input type="checkbox" id="checkAll"></th> 
                                    <th class="picname">Name</th>
                                              <th class="piccreateby">Created By</th>
                                              <th class="piclastmody">Last Modified</th>
                                        <th class="picsize">File Size</th>
                                              <th class="picoption"></th>
                                  </tr>
                                </thead>';
                            while($rowForFolder = mysqli_fetch_array($resultForFolder)){
                              $_SESSION['subfolderID']=$rowForFolder['id'];
                              
                              $share=$rowForFolder['assigned_user_id'];
                           
                                  if($share=='')
                                  {
                                    $shre_folder_icon_image="Blank-Folder-icon.png";
                                  }
                                  else
                                  {
                                    $shre_folder_icon_image="share_folder2.png";
                                  }
                                          $idForcheckBox=$rowForFolder['prefix']." ".$rowForFolder['id']; 
                                           $resForUserName= mysqli_query($connect, "select * from user where user_name='".$rowForFolder["created_user_id"]."'");
                           
                                $rowForUserName= mysqli_fetch_array($resForUserName);
                           
                                $userFName= $rowForUserName['first_name'];
                                $userLName= $rowForUserName['last_name'];
                           
                              $output .= '
                                <tr>
                                  <td><input type="checkbox" id="'.$idForcheckBox.'" name="checkboxlist" value="'.$idForcheckBox.'" class="btnCheckBox" onclick="getCheckBoxValue(this)"></td>
                                  <td title="'.$rowForFolder["folder_name"].'"><a href="viewSubFolderFiles.php?id='.$rowForFolder['id'].'"><img src="icon/'.$shre_folder_icon_image.'" width="20" height="20" alt="Excel icon" title="folder icon">'.$rowForFolder["folder_name"].'</a></td>
                                  <td>'.$userFName.' '.$userLName.'</td>
                                  <td>'.date('d/m/Y H:i:s',strtotime($rowForFolder["createdAt"])).'</td>
                                  <td>--</td>
                                  <td style="overflow:inherit"><div class="dropdown">
                                          <button type="button" class="btn dropdown-toggle pull-right" data-toggle="dropdown">
                                          </button>
                                          <div class="dropdown-menu">
                                             <a class="dropdown-item" href="download_zip_file.php?id='.$rowForFolder['id'].'">Download</a>
                                            <a  class="dropdown-item btnRename" data-rename-id="'.$idForcheckBox.'" href="#">Rename</a>
                                            <a  class="dropdown-item btnShareSingle" data-sharesingle-id="'.$idForcheckBox.'"  href="#">Share</a>
                                            <a href="#" class="dropdown-item btndeletesubfolder" data-deletesubfolder-id="'.$idForcheckBox.'">Delete</a>
                                          </div>
                                        </div>
                                    </td>
                                </tr>
                              ';
                            }         
                            while($row = mysqli_fetch_array($result))
                            {
                              $file_type  = $row['document_type'];
                              $icon_color="DEFAULT.png";
                              $icon_title="";
                            //  echo "FILE TYPE = ". $file_type;          
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
                                else if($file_type == 'xlsx' || $file_type == 'xls' || $file_type=='csv')
                                {
                                  $icon_color="Excel-icon.png";
                                  $icon_title="Excel icon";
                                }
                                else if($file_type == 'docx' || $file_type == 'doc')
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
                                  $icon_color="text-icon1.png";
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
                                $idForcheckBox=$row['prefix']." ".$row['id'];
                                  $resForUserName1= mysqli_query($connect,"select * from user where user_name='".$row["created_user_id"]."'");
                           
                                $rowForUserName1= mysqli_fetch_array($resForUserName1);
                           
                                $userFName= $rowForUserName1['first_name'];
                                $userLName= $rowForUserName1['last_name'];
                              $output .= '
                                <tr>
                                  <td><input type="checkbox" id="'.$idForcheckBox.'" name="checkboxlist" value="'.$idForcheckBox.'" class="btnCheckBox" onclick="getCheckBoxValue(this)"></td>
                                  <td title="'.$row["document_name"].'"><img src="icon/'.$icon_color.'" width="20" height="20" alt="Excel icon" title="'.$icon_title.'">&nbsp;&nbsp;'.$row["document_name"].'</td>
                                  <td>'.$userFName.' '.$userLName.'</td>
                                  <td>'.date('d/m/Y H:i:s',strtotime($row["createdAt"])).'</td>
                                  <td>'.number_format((float)$row["document_size"]/(1024*1024),2,'.','').' MB</td>
                           
                                  <td style="overflow:inherit"><div class="dropdown">
                                          <button type="button" class="btn dropdown-toggle pull-right" data-toggle="dropdown">
                                          </button>
                                          <div class="dropdown-menu">
                                           <a class="dropdown-item" href="downloadFile.php?id='.$row['id'].'">Download</a>
                                            <a  class="dropdown-item btnRename" data-rename-id="'.$idForcheckBox.'" href="#">Rename</a>
                                            <a  class="dropdown-item btnShareSingle" data-sharesingle-id="'.$idForcheckBox.'"  href="#">Share</a>
                                            <a href="#" class="dropdown-item btndocumentUpdate" data-documentupdate-id="'.$idForcheckBox.'">Delete</a>
                                          </div>
                                        </div>
                                    </td>
                                </tr>
                              ';
                              
                            }

                            $output.="</table></div></div></div></div>";
                            echo $output;
                           
                           ?>
                     
                     <div style="clear:both"></div>
               </div>
            </div>
         </section>
      </div>
      <!-- JavaScript files-->
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
                                    <input type="hidden" name="usercount" id="inputcountusers">
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
                                          <button class="btn btn-primary form-control" id="extraassigniser" type="submit" value="Edit Folder" name="editfolder">Save Changes</button>
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
                  <h4 class="modal-title">Edit Folders/Files</h4>
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
                                    <input type="hidden" name="usercount" id="inputcountusers">
                                    <div class="row mb-3">
                                       <div class="col-12 col-xs-12 col-sm-12 col-md-12">
                                          <label>Folders/Files Name</label>
                                       </div>
                                       <div class="col-12 col-xs-12 col-sm-12 col-md-12">
                                          <input class="form-control" type="text" name="folderName" id="folderOrFileName" >
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                          <button class="btn btn-primary form-control" id="extraassigniser" type="button" value="Edit Folder" name="editfolder" onclick="saveRename()">Save Changes</button>
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
      <script>
         $(document).ready(function(){
         
           $(document).on("click",".btnRename",function()
           {
            // alert("Hii"); 
             var id=$(this).data("rename-id");
            // alert(id);
             //function renameFile(id){
            //   alert(id);
               //alert(table);
               $.ajax({
                 url:"getFileNameForRename.php",
                 method:"post",
                 data:{id:id},
                 success:function(data)
                 {
                 //  alert(data);
                   document.getElementById('folderOrFileName').value=data;
                   $("#EditFolderModal").modal();
                 }
               });
             //}
             
           });
         });   
      </script>
      <script>
         $(document).ready(function(){
         
           $(document).on("click",".btnShareSingle",function()
           {
           //  alert("Hii"); 
             var id=$(this).data("sharesingle-id");
           //  alert(id);
         
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
         function renameFile(id){
          // alert(id);
           $.ajax({
             url:"getFileNameForRename.php",
             method:"post",
             data:{id:id},
             success:function(data)
             {
          //     alert(data);
               document.getElementById('folderOrFileName').value=data;
               $("#EditFolderModal").modal();
             }
           });
         }
      </script>
      <script>
         function saveRename(){
           //alert("in saveRenameFileName");
           var val= document.getElementById('folderOrFileName').value;
           $.ajax({
             url:"saveRenameFileOrFolder.php",
             method:"post",
             data:{fileName:val},
             success:function(data)
             {
               
               if(data==1){
                   $.confirm({
                           title: 'Success!',
                           content: 'Folder/file renamed successfully!',
                           type: 'dark',
                           typeAnimated: true,
                           buttons: {
                           ok: function () {
                           location.reload();
                           }
                           }
                           });
                 //alert("FOLDER OR FILE SAVED SUCCESSFULLY");
                // window.location.reload();  
               }
               if(data==0){
                    $.confirm({
                               title: 'Warning!',
                               content: 'This folder/file name already exists!',
                               type: 'dark',
                               typeAnimated: true,
                               buttons: {
                               Ok: function () {
                               $("#EditFolderModal").modal();
                               }
                               }
                               });
                // alert("This folder/file name already exist");
                 //$("#EditFolderModal").modal();
               }
         
               
             }
           }); 
           //alert(val);
         }
      </script>
      <!-- The Share View FolderFiles Modal -->
      <div class="modal" id="ShareSubViewFolderFilesModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Share Folders/Files</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body modal-height">
                  <?php
                     // $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
                     //        if($conn->connect_error){
                     //          die("Connection Error" . $conn->connect_error);
                     //        }
                            
                            $total_usr= mysqli_query($conn, "SELECT count(*) as cnt_row FROM user where deleted='0'");
                            $total_usr=mysqli_fetch_array($total_usr);
                            $total_usr_chk=$total_usr['cnt_row']; 
                            //echo $total_usr_chk;
                            $access_user="";
                            $assign_user="";
                          ?>
                  <div class="col-xs-12 col-sm-12 col-md-12 ">
                     <div class="">
                        <div class="row">
                           <div class="col-12 col-xs-12 col-sm-12 col-md-12 main">
                              <div class="">
                                 <form action="#" method="post">
                                    <!--  <form action="" method="post"> -->
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
                                          <button class="btn btn-primary form-control" id="extraassigniser" type="button" value="Edit Folder" onclick="saveChangesOfShare()" name="sharefolderAndFiles" style="color:#fff;">Save Changes</button>
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
      <!-- The Share Single Folder Modal -->
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
                     // $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
                     //         if($conn->connect_error){
                     //           die("Connection Error" . $conn->connect_error);
                     //         }
                             
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
                                    <!--  <form action="" method="post"> -->
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
                                          <button class="btn btn-primary form-control" id="extraassigniser" type="button" value="Edit Folder" onclick="saveChangesOfShareSingle()" name="sharefolderAndFiles" style="color:#fff;">Save Changes</button>
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
      <script>
         function saveChangesOfShare(){
          var accessCount= $('#accessCount').val();
          //alert(accessCount);
          var arrForUsers= [];
          var arrForAccess= [];
          var i;  
           //alert("USER NAME= "+document.getElementById('idselectbox'+1).value);
          for(i=1; i<=accessCount; i++){
            var u1= 'idselectbox'+i;
            var a1= 'extradefineaccess'+i;
         
            //alert(u1); alert(a1); 
            var user=document.getElementById('idselectbox'+i).value;
            var access=document.getElementById('extradefineaccess'+i).value;
            //alert(user);
            //alert(access);
            arrForUsers.push(user);
            arrForAccess.push(access);  
          }
          //alert(arrForUsers);
          //alert(arrForAccess);
          //alert("IN SAVE CHANGES OF SHARE");
          $.ajax({
            url:"saveShareFoldersAndFiles.php",
            method:"post",
            data:{accessCount:accessCount,arrForUsers:arrForUsers,arrForAccess:arrForAccess},
            success:function(data)
            {
            $.confirm({
                                                            title: 'Success!',
                                                            content: 'Folder shared successfully!',
                                                            type: 'dark',
                                                            typeAnimated: true,
                                                            buttons: {
                                                            Ok: function () {
                                                            location.reload();
                                                            }
                                                            }
                                                            });
              //alert("FOLDER SHARED SUCCESSFULLY");
            }
          }); 
         }
         
      </script>
      <script>
         function saveChangesOfShareSingle(){
          var accessCount1= document.getElementById('accessCount1').value;
          //alert(accessCount1);
          var arrForUsers= [];
          var arrForAccess= [];
          var i;  
          var singleFileName= "";
          //alert(singleFileName);
          for(i=1; i<=accessCount1; i++){
            var u1= 'idselectbox'+i;
            var a1= 'extradefineaccess'+i;
         
          //  alert(u1); alert(a1); 
            var user=document.getElementById('idselectbox'+i).value;
            var access=document.getElementById('extradefineaccess'+i).value;
          //  alert(user);
          //  alert(access);
            arrForUsers.push(user);
            arrForAccess.push(access);
          }
          if(arrForUsers==""){
            arrForUsers.push("");
          }
          if(arrForAccess==""){
            arrForAccess.push("");
          }
          //alert("USERS == "+arrForUsers);
          //alert("ACCESS == "+arrForAccess);
          $.ajax({
            url:"saveShareFoldersAndFilesSingle.php",
            method:"post",
            data:{accessCount1:accessCount1,arrForUsers:arrForUsers,arrForAccess:arrForAccess,singleFileName:singleFileName},
            success:function(data)
            {
              $.confirm({
                                                            title: 'Success!',
                                                            content: 'Folder shared successfully!',
                                                            type: 'dark',
                                                            typeAnimated: true,
                                                            buttons: {
                                                            Ok: function () {
                                                            location.reload();
                                                            }
                                                            }
                                                            });
              //alert("FOLDER SHARED SUCCESSFULLY");
            }
          }); 
         
         
         }  
         
      </script> 
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
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/jquery-confirm.min.js"></script>
      <script src="js/customA11ySelect.js"></script>
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
         $('#action').hide();
         $("#checkAll").change(function () {
         $('#action').show();
         $("input:checkbox").prop('checked', $(this).prop("checked"));
         var checkValues = $('input[name=checkboxlist]:checked').map(function()
         {
          return $(this).val();
         }).get();
         
         if(checkValues==""){
          $('#action').hide();
         }
         //alert("ALL SELECTED FILES= "+checkValues);
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
         function deletedMultipleSelectedFiles(){
           
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
                         ///alert(checkValues);
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
         function getCheckBoxValue(val){
          var val = $(val).val();
          //alert(val);
          //alert("Hii IN getCheckBoxValue");
          //$('#action').show();
          if($('.btnCheckBox').is(":checked"))   
              $('#action').show();
            else
              $('#action').hide();
          /*if($(val).prop("checked")==true){
                       // alert("Checkbox is checked.");
                    }*/
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
                                            $('#test').append('<div class="row form-group" id="removeRow'+selectcnt+'"><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5" id="extrauser"><select class="assignExtraUser form-control" id="idselectbox'+selectcnt+'" style="height:40px;" data-selecteduserno-id="'+selectcnt+'" name="extrausername'+selectcnt+'" required="required"><option value="">Select User</option></select></div><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5"><select class="accessuser form-control" style="height:40px;" name="extradefineaccess'+selectcnt+'" id="extradefineaccess'+selectcnt+'" ><option value="">Select Access</option><option value="Upload">Upload</option><option value="Download">Download</option><option value="Both">Both</option></select></div><div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2"><i class="removeButton fas fa-times mt-2" id='+selectcnt+'></i></div></div>');
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
              $('.assignExtraUser').customA11ySelect();
                                      $('.accessuser').customA11ySelect();
                  
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
         // alert("USER NAME= "+i);
          //alert("USER ACCESS= "+j);
          var removeId= i;
          var arrId= removeId.split(',');
         // alert("ARRAY AFTER SPLIT = "+ arrId); 
         // alert(removeId);
         
          $.ajax({
                url:"removeUserAndAccess.php",
                method:"post",
                data:{i:i},
                
                success:function(data)
                {
                //  alert(data);
                  //$('#idselectbox1').html(data);
                  //location.reload();
                }
                
            });
         
         
          var closeTab= document.getElementById(removeId);
          closeTab.parentNode.removeChild(closeTab);
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
                                     $('#testSingle').append('<div class="row form-group" id="removeRow'+selectcnt+'"><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5" id="extrauser"><select class="assignExtraUser form-control" onchange="checkDuplicateUser2('+selectcnt+')" id="idselectbox'+selectcnt+'" style="height:40px;" data-selecteduserno-id="'+selectcnt+'" name="extrausername'+selectcnt+'" required="required"><option value="">Select User</option></select></div><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5"><select class="accessuser form-control" style="height:40px;" id="extradefineaccess'+selectcnt+'" name="extradefineaccess'+selectcnt+'" ><option value="">Select Access</option><option value="Upload">Upload</option><option value="Download">Download</option><option value="Both">Both</option></select></div><div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2"><i class="removeButton fas fa-times mt-2" id='+selectcnt+'></i></div></div>');
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
                       $('.assignExtraUser').customA11ySelect();
                       $('.accessuser').customA11ySelect();
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
                 $.confirm({
                               title: 'Success!',
                               content: 'This user is already Assigned For this File/Folder!',
                               type: 'dark',
                               typeAnimated: true,
                               buttons: {
                                   Ok: function () {
                                       var id1 ='idselectbox'+i +'-selected';
                                       var a = document.getElementById(id1).innerHTML ="Select User";
                                   }
                               }
                           });
                 //document.getElementById(id).value="Select user";
         
               }
               //$('#result').html(data);
               //location.reload();
               
               
             }
           });
         
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
      <script type="text/javascript">
         $(document).ready(function() {
               $('#data_no').customA11ySelect();
            });
         
      </script>
      <script type="text/javascript">
         var gaq = gaq || [];
         _gaq.push(['_setAccount', 'UA-36251023-1']);
         _gaq.push(['_setDomainName', 'jqueryscript.net']);
         _gaq.push(['_trackPageview']);
         
         (function() {
           var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
           ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
           var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
         })();
         
      </script>
      <script>
         function goToIndexPage(){
          //alert("IN GO TO INDEX PAGE");
         
          window.location='index.php';
         }
         
         function goToViewFodlerFiles(id){
          if(id==0){
            window.location='index.php';
          }else{
            window.location.href='viewFolderFiles.php?id='+id;  
          }
          //alert(" IN GO TO VIEW FOLDER FILES PAGE ");
          
         }
         
      </script>
   </body>
</html>