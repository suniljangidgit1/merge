<?php
   session_start();
   if($_SESSION['Login']==""){
      echo "<script>window.location='http://".$_SERVER['SERVER_NAME']."'</script>";  
   }
   if($_SESSION['Login']=='fincrm'){
     $_SESSION['Login']="admin";
   }  
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
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
      <link href="fonts/Roboto/Roboto.css" rel="stylesheet">
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
      <!-- <link rel="stylesheet" href="css/blueimp-gallery.min.css"> -->

      <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">

      <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
      <link rel="stylesheet" href="css/jquery.fileupload.css">
      <link rel="stylesheet" href="css/jquery.fileupload-ui.css">
      <link rel="shortcut icon" href="img/favicon.png">
      <link href="icons-reference/Google-Material-Icons.css" rel="stylesheet">
      <link href="css/customA11ySelect.css" rel="stylesheet">
      <!-- CSS adjustments for browsers with JavaScript disabled -->
      <noscript>
         <link rel="stylesheet" href="css/jquery.fileupload-noscript.css">
      </noscript>
      <noscript>
         <link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css">
      </noscript>
      <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
      <script src="js3/jquery.min.js"></script>
      <style>
         .material-icons {
         font-size: 18px;
         }
         .material-icons-outlined {
         font-size: 18px;
         }
         @media(min-width:320px) and (max-width: 767px){
         .pictable{
         table-layout: fixed;
         /*width: 100%;*/
         white-space: nowrap;
         margin-bottom: 0px;
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
         .picimg {
         width: 3%;
         }
         .picname {
         width: 37%;
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
         margin-bottom: 0px;
         }
         .pictable td>p{
         white-space: nowrap;
         overflow: hidden;
         text-overflow: ellipsis;
         }
         .picimg {
         width: 3%;
         }
         .picname {
         width: 37%;
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
         body {
         overflow-x: hidden;
         }
         /* Toggle Styles */
         #wrapper {
         padding-left: 0;
         -webkit-transition: all 0.6s ease;
         -moz-transition: all 0.6s ease;
         -o-transition: all 0.6s ease;
         transition: all 0.6s ease;
         }
         #wrapper.toggled {
         padding-left: 200px;
         }
         #sidebar-wrapper {
         z-index: 1000;
         position: fixed;
         left: 250px;
         width: 0;
         height: 100%;
         margin-left: -250px;
         /* overflow-y: auto;*/
         -webkit-transition: all 0.5s ease;
         -moz-transition: all 0.5s ease;
         -o-transition: all 0.5s ease;
         transition: all 0.5s ease;
         }
         #wrapper.toggled #sidebar-wrapper {
         width: 38px;
         }
         #page-content-wrapper {
         width: 100%;
         position: absolute;
         padding: 10px;
         }
         #wrapper.toggled #page-content-wrapper {
         position: absolute;
         margin-left:-250px;
         }
         /* Sidebar Styles */
         .sidebar-nav {
         position: absolute;
         top: 0;
         right:15px;
         width: 200px;
         margin: 0;
         padding: 0;
         list-style: none;
         }
         .sidebar-nav li {
         text-indent: 20px;
         line-height: 40px;
         }
         .sidebar-nav li a {
         display: block;
         text-decoration: none;
         color: #999999;
         }
         .sidebar-nav li a:hover {
         text-decoration: none;
         color: #fff;
         background: #312A25;
         }
         .sidebar-nav li a:active,
         .sidebar-nav li a:focus {
         text-decoration: none;
         }
         .sidebar-nav > .sidebar-brand {
         height: 65px;
         font-size: 18px;
         line-height: 60px;
         }
         .sidebar-nav > .sidebar-brand a {
         color: #999999;
         }
         .sidebar-nav > .sidebar-brand a:hover {
         color: #fff;
         background: none;
         }
         @media(min-width:768px) {
         #wrapper {
         /*padding-left: 220px;*/
         }
         #wrapper.toggled {
         padding-left: 0;
         }
         #sidebar-wrapper {
         width: 200px;
         }
         #wrapper .toggled #sidebar-wrapper {
         width: 38px;
         text-align: center;
         }
         .toggled .side-navbar span{
         display:none;
         }
         .toggled .side-navbar .media-files span {
         display: inline-block !important;
         font-size: 14px;
         }
         #wrapper.toggled   i {
         font-size: 16px;/*
         margin-right: 10px;
         margin-left: 10px;*/
         } 
         #page-content-wrapper {
         padding: 20px;
         position: relative;
         }
         #wrapper.toggled #page-content-wrapper {
         position: relative;
         margin-right: 0;
         }
         }
         @media(max-width:414px) {
         #wrapper.toggled #page-content-wrapper {
         position: absolute;
         margin-right:60px;
         }
         #wrapper.toggled {
         padding-right: 60px;
         }
         #wrapper {
         padding-left: 20px;
         }
         #wrapper.toggled {
         padding-left: 0;
         }
         #sidebar-wrapper {
         width: 38px;
         }
         #wrapper.toggled #sidebar-wrapper {
         width: 140px;
         }
         #wrapper.toggled span {
         visibility:visible;
         position:relative;
         left:70px;
         bottom:13px;
         }
         #wrapper span {
         display:none;
         }
         #wrapper.toggled   i {
         float:right;
         } 
         #wrapper   i {
         float:right;
         } 
         #page-content-wrapper {
         padding: 5px;
         position: relative;
         }
         #wrapper.toggled #page-content-wrapper {
         position: relative;
         margin-right: 0;
         }
         }
         .sideli{
         font-size: 14px;
         padding: 7px 10px;
         }
         .disnon{
         display: none;
         }
         .pagewidth{
         width:calc(100% - 38px);
         }
         .uploadfont{
         font-size: 1.3rem;
         padding-left: 5px;
         padding-right: 5px;
         }
         .files tr th{
         font-size: 14px;
         font-weight: 400px;
         }
         .fachevronleft{
         padding-left: 75px;
         font-size: 14px;
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
      <div id="wrapper" >
         <nav  id="sidebar-wrapper" class="side-navbar web_view">
            <div  class="side-navbar-wrapper">
               <!-- Sidebar Header    -->
               <div class="sidenav-header d-flex align-items-center justify-content-center">
                  <!-- User Info-->
                  <div class="sidenav-header-inner text-center">
                     <a href="../../../../"> <img src="img/logo.png" alt="person" class="img-fluid logo"></a>
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
                     <!--<li title="Media Files"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse" title="Media Files"> <i class="material-icons-outlined">perm_media</i><span>Media Files</span></a>
                        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                          <li title="Pictures"><a href="viewPictures.php" title="Pictures"><i class="material-icons-outlined">collections</i><span>Pictures</span></a></li>
                          <li title="Audio"><a href="viewAudio.php" title="Audio"><i class="material-icons-outlined">library_music</i><span>Audio</span></a></li>
                          <li title="Video"><a href="viewVideo.php" title="Video"><i class="material-icons-outlined">video_library</i><span>Video</span></a></li>
                        </ul>
                        </li>-->
                     <!-- <li title="Media Files" class="dropdown" id="dd">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Media Files"> <i class="material-icons-outlined">perm_media</i><span>Media Files</span></a>
                        <div class="dropdown-menu  media-files">
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
               <div class="navbar-header minimized-icon navbar-header-down"><a href="#menu-toggle"  id="menu-toggle" class="menu-btn" style="color:#fff;text-decoration: none;"><i class="fas fa-chevron-left fachevronleft" aria-hidden="true"></i></a>
               </div>
            </div>
         </nav>
      </div>
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
              <ul class="navbar-nav mr-auto main_list list-unstyled">
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
              <ul class="navbar-nav mr-auto global-search list-unstyled">
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
                     <div class="navbar-header"><a href="#menu-toggle"  id="menu-toggle1" class="menu-btn navbar-header-top"><i class="fa fa-bars"aria-hidden="true"></i></a>
                     </div>
                     <div class="input-group bs-example">
                        <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Search">
                        <div class="input-group-btn">
                           <a class="btn btn-link global-searcy-button" id="search_header_btn" data-action="search" style="border-radius:0px;position: relative;left:-36px;color:#0f243f;">
                           <i class="material-icons">search</i>
                           </a>
                        </div>
                     </div>
                     <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center" style="float:right;display:inline-block;margin-top: 5px;">
                        <!-- Go To Dashboard-->
                        <li class="nav-item" title="Go to Dashboard">
                         <a href="../../../../" class=" logout" title="Go to Dashboard"> <span class=" dashbtn d-sm-inline-block">Go To Dashboard</span></a>
                       </li>
                     </ul>
                  </div>
               </div>
            </nav>
            <script>
               $(document).ready(function(){
                     $(".side-navbar li a").toggleClass("sideli");
                    $("#menu-toggle1").click(function(e) {
                     e.preventDefault();
                     $("#wrapper").toggleClass("toggled");
                     $(".side-navbar li a").toggleClass("uploadfont");
                     $(".logo").toggleClass("disnon");
                     $(".page").toggleClass("pagewidth");
                     
                 });
               
                    $("#menu-toggle").click(function(e) {
                     e.preventDefault();
                     $("#wrapper").toggleClass("toggled");
                     $(".fa-chevron-left").toggleClass("fachevronleft");
                     $(".side-navbar li a").toggleClass("uploadfont");
                     $(".logo").toggleClass("disnon");
                     $(".page").toggleClass("pagewidth");
                     
                 });
               
               
               });
                
                 
            </script>
         </header>
         <!-- Header Section-->
        
         <section class="dashboard-header section-padding">

            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div>
                     <?php

   //get connection
   include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
  $con                   =$conn;
  $conForGetFolderName   =$conn;
            // echo "<a href='index.php'><i class='fas fa-home'></i></a>";
             // $conForGetFolderName= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
             // if ($conForGetFolderName->connect_error) {
             //   die("Connection failed: " . $conForGetFolderName->connect_error);
             // }
             $arrForFodlerMasterIDs= array(); 
             $resForGetFolderMasterIDS= mysqli_query($conForGetFolderName, "select * from folder_master");
            
             while($rowForGetFolderMasterIDS = mysqli_fetch_array($resForGetFolderMasterIDS)){
               $arrForFodlerMasterIDs[]= $rowForGetFolderMasterIDS['id'];
             }
            
             if(in_array($id, $arrForFodlerMasterIDs)){
               $sqlForGetFolderName= "SELECT * FROM folder_master_3 WHERE id='".$id."'";
               $resultForGetFolderName= mysqli_query($conForGetFolderName, $sqlForGetFolderName);
               $rowForGetFolderName=mysqli_fetch_array($resultForGetFolderName);
               
               $folderName= $rowForGetFolderName['folder_name'];
               $folderID= $rowForGetFolderName['id'];
               echo "<h3><a href='index.php'><i class='fas fa-home'></i></a>&nbsp; » &nbsp;<a href='?id=$folderID'>$folderName</a></h3>";
            
               $_SESSION['Main_folder_id']=$folderID;
               $_SESSION['Main_folder_name']=$folderName;
             }else{
              
            // $con=mysqli_connect('localhost', 'root', 'root', 'fincrm');;
            // if($con->connect_error){
            // die("Connection Failed" . $con->connect_error);
            // }
            $folder_array=array();
            
            $str=mysqli_query($con,"SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$_GET['id']);    
            $result_str=mysqli_fetch_array($str);
            $_SESSION['sub_folder_name']==$result_str['folder_master_id'];
            
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
            echo "  »  ".$reverse_folderName_array[$a];
            }
            
            $current_folder_ID=$result_str1['id'];
            $current_folder_NAME=$result_str1['folder_name'];
            echo "<a href='viewFolderFiles.php?id=$current_folder_ID'>$current_folder_NAME</a></h3>";
           /* echo "<br>"; echo "<br>"; echo "<br>";*/
            
             }
             
            ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="container-fluid pdeditfile">
               <form id="fileupload" action="https://jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
                  <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                  <div class="dm_upload mt10">
                  <div class="row">
                     <div class="col-6 col-xs-6 col-sm-6 col-md-5 col-lg-5">
                        <div class="">
                           <?php 
                              if($_GET['id']){
                              // $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
                                  if($conn->connect_error){
                              die("Connection Failed". $conn->connect_error);
                                  }
                              ?>
                           <label>Folder Name</label>
                           <select id="folder" name="folder" class="form-control foldername" onchange="getFolderNameVal()"  >
                           <?php
                              $res= mysqli_query($conn, "SELECT * FROM folder_master_3 where id='".$_GET['id']."'");
                                  if($res!=""){
                                    while($row1=mysqli_fetch_array($res)){
                                    echo "<option value=".$row1['id'].">".$row1['folder_name']."</option>";
                                    }
                                  }
                                  $res1= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 where id='".$_GET['id']."'");
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
                           <select id="folder" name="folder" class="form-control foldername" onchange="getFolderNameVal()">
                              <option value="">Select Folder</option>
                              <?php
                                 // $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
                                 // if($conn->connect_error){
                                 //    die("Connection Failed". $conn->connect_error);
                                 // }
                                 $assignedUserArr= array();
                                 $userAccessArr = array();
                                 $res= mysqli_query($conn, "SELECT * FROM folder_master_3");
                                 while($row= mysqli_fetch_array($res)){
                                    if($_SESSION['Login']!="admin"){
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
                                 else{
                                    echo "<option value=".$row['id'].">".$row['folder_name']."</option>";
                                 }
                                 }
                                 ?>
                           </select>
                           <?php } 
                              ?>
                        </div>
                     </div>
                     <div class="col-6 col-xs-6 col-sm-6 col-md-4 col-lg-4">
                        <div class="">
                           <label>Assign User</label>
                           <select id="second" name="second[]" data-placeholder="Select  Users" class="chosen-select form-control" multiple style="" tabindex="4" onchange="getUser()">
                              <?php
                                 $resForUsers= mysqli_query($conn, "SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0' AND is_portal_user='0' AND is_active<>'0' ORDER BY first_name");
                                                       while($row2=mysqli_fetch_array($resForUsers)){
                                                           echo "<option value=".$row2['user_name'].">".$row2['first_name']." ".$row2['last_name']."</option>";
                                                       }
                                 ?>
                           </select>
                        </div>
                     </div>
                      <div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="fileupload-buttonbar" style="margin-top: 28px;">
                              <a href="renameFile.php"><span class="btn btn-danger"><i class="fas fa-edit"></i> Rename File</span></a>
                              <!-- <button type="button" class="btn btn-danger delete" title="Delete Files">
                              <i class="fas fa-trash-alt"></i>
                              <span>Delete</span>
                              </button> -->
                        </div>
                      </div>
                  </div>
                  <div class="row" style="padding-top: 16px;">
                     <div class="fileupload-buttonbar">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-8 col-lg-8">
                           <div class="">
                              <!-- The fileinput-button span is used to style the file input field as button -->
                              <span class="btn btn-primary fileinput-button" title="Add Files" >
                              <i class="fas fa-plus"></i>
                              <span>Add files...</span>
                              <input type="file" onclick="clearFileArray()" name="files[]" multiple>
                              </span>
                              <button type="submit" class="btn btn-danger start" title="Start Upload">
                              <i class="fas fa-arrow-circle-up"></i>
                              <span>Start upload</span>
                              </button>
                              <button type="reset" class="btn btn-danger cancel" title="Cancel Upload">
                              <i class="fas fa-ban"></i>
                              <span>Cancel upload</span>
                              </button>
                              <!-- <a href="renameFile.php"><span class="btn btn-danger"><i class="fas fa-edit"></i> Rename File</span></a> -->
                              <!--  <a href="#"><button type="" class="btn btn-primary" title="Rename Files">
                                 <i class="fas fa-edit"></i>
                                 <span>Rename</span>
                                 </button></a> -->
                              <!-- <button type="button" class="btn btn-danger delete" title="Delete Files">
                              <i class="fas fa-trash-alt"></i>
                              <span>Delete</span>
                              </button> -->
                              <!--<input type="checkbox" class="toggle">-->
                              <!-- The global file processing state -->
                              <span class="fileupload-process"></span>
                           </div>
                           <span>You may also drag and drop files here.</span>
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
                  </div>
                  <div class="dm_upload mt10">
                    <div class="row">
                       <div class="col-lg-12">
                          <label style="color:#337ab7;">Upload History</label>
                       </div>
                       <div class="col-lg-12 Plr0">
                          <div class="table-responsive">
                             <table role="presentation" class="table pictable">
                                <tbody class="files">
                                   <tr style="background-color: #fff;color: #0f243f;text-transform: uppercase;border-bottom: 2px solid #ccc;border-top: 2px solid #ccc;">
                                      <!-- <th  class="picimg">Images/Videos</th> -->
                                      <th class="picimg fileupload-buttonbar" style="font-weight:400;font-size:14px;"> <input type="checkbox" class="toggle"></th>
                                      <th class="picname" style="font-weight:400;font-size:14px;">File Name</th>
                                      <th class="picsize" style="font-weight:400;font-size:14px;">File Size</th>
                                      <th class="picstatus" style="font-weight:400;font-size:14px;">Status</th>
                                      <th class="picoption" style="font-weight:400;font-size:14px;">Options</th>
                                   </tr>
                                </tbody>
                             </table>
                          </div>
                       </div>
                    </div>
                  </div>
               </form>
               <div class="row" style="padding-top: 16px;">
                  <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     <div class="">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title" style="font-size: 1.5rem;">Important Instructions</h3>
                           </div>
                           <?php
                              $resultForDefaultSize= mysqli_query($conn, "SELECT * FROM default_size_limit WHERE id='1'");
                              
                              $rowForDefaultSize = mysqli_fetch_array($resultForDefaultSize);
                              $defaultSizeLimit= $rowForDefaultSize['size'];
                              ?>
                           <div class="panel-body">
                              <ul>
                                 <li>Maximum size of file which can be uploaded is <strong> 100 MB</strong>.</li>
                                 <li>Formats allowed to upload – (<strong>jpeg/jpg, png, docx/doc, xlsx/xls, zip, rar, pdf, txt, csv</strong>).</li>
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
                 <td class="picimg fileupload-buttonbar" style="font-weight:400;font-size:14px;"> 
                 <input type="checkbox" class="toggle">
                 </td>
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
                         <button class="btn btn-danger cancel">
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
                     <input type="checkbox" name="delete" value="1" class="toggle">
                 </td>
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
              <div class="uploadfilebtn" style="padding-top: 2px;" title="Uploading Failed !"><span class="label label-danger " style="padding:4px; padding-right: 33px;"><i class="fas fa-bug"></i><span class="uploadbtn">&nbsp;&nbsp;&nbsp;Uploading Failed </span></span></div>
              {% }else{ %}
              <div class="uploadfilebtn" style="padding-top: 2px;" title="Uploaded Successfully"><span class="label label-success" style="padding:4px; margin-top:4px;"><i class="fas fa-check-square"></i><span class="uploadbtn">&nbsp;&nbsp;&nbsp;Uploaded Successfully</span></span></div>
              {% } %}
            </td>
                 <td>
              {% if (file.name[1]=="File already exist") { %}
                
                <a href="renameSingleFile.php?fileName={%=file.name[0]%}&fileSize={%=file.name[2]%}" title="Rename File"><span class="btn btn-primary"><i class="fas fa-edit"></i> <span class="renamefile">Rename File</span></span></a>
               {% } %}
                     {% if (file.deleteUrl) { %}
                        
                         
                     {% } else { %}
                         <button class="btn btn-danger cancel" title="Cancel">
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
      <!-- <script src="js/uploadjs/tmpl.min.js"></script> -->
      <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
      <!-- <script src="js/uploadjs/load-image.all.min.js"></script> -->
      <!-- The Canvas to Blob plugin is included for image resizing functionality -->
      <!-- <script src="js/uploadjs/canvas-to-blob.min.js"></script> -->

      <!-- The Templates plugin is included to render the upload/download listings -->
      <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
      <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
      <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
      <!-- The Canvas to Blob plugin is included for image resizing functionality -->
      <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>


      <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <!-- blueimp Gallery script -->
      <!-- <script src="js/uploadjs/jquery.blueimp-gallery.min.js"></script> -->

      <!-- blueimp Gallery script -->
      <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>

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
      <script src="js/customA11ySelect.js"></script>
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
      <script >
          function clearFileArray(){
          
          // {% for (var i=0, file; file=o.files[i]; i++) { %}
          //   ${%=file.name=''%}
          // {% } %}
         }
      </script>
      <script type="text/javascript">
         $('#menu-toggle').click(function() {
         $("i", this).toggleClass("fas fa-chevron-left fas fa-chevron-right");
         $(".fa-chevron-right").css('font-size','14px');
         $(".fa-chevron-right").css('padding-left','10px');
         $(".fa-chevron-left").css('padding-left','75px');
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function() {
         $('.foldername').customA11ySelect();
         });
         
      </script>
      <!-- <script type="text/javascript">
         var gaq = gaq || [];
         _gaq.push(['_setAccount', 'UA-36251023-1']);
         _gaq.push(['_setDomainName', 'jqueryscript.net']);
         _gaq.push(['_trackPageview']);
         
         (function() {
         var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
         ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
         var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
         })();
         
      </script> -->
      <script>
        //code for logout on hit of url when domain is blocked
        var currentDomain = window.location.hostname;
                
                $.ajax({
                type    : "GET",
                url     : "../../../../client/src/views/domain_status/check_domain_status.php",
                dataType  : "json",
                data    : {currentDomain:currentDomain},
                async: false,
                success: function(data)
                {   
                    domain_status = data.domain_status;
                    servername = '<?php echo $servername; ?>';

                    if(domain_status == 'Blocked'){
                      if(servername == 'localhost'){
                         addr = 'http://';
                      }else{
                         addr = 'https://';
                      } 
                        sessionStorage.clear();
                        window.location=addr+currentDomain;
                        
                    }
                },
                });
      </script>
   </body>
</html>