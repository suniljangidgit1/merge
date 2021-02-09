<?php
   session_start();
   //$_SESSION["Login"]='admin';
   if($_SESSION['Login']=='fincrm'){
     $_SESSION['Login']="admin";
   }  
   //get connection
   include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
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
      <link href="css/customA11ySelect.css" rel="stylesheet">
      <link rel="stylesheet" href="css/jquery.dataTables.min.css">
      <!-- theme stylesheet-->
      <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
      <!-- Custom stylesheet - for your changes-->
      <link rel="stylesheet" href="css/custom.css">
      <!-- Favicon-->
      <link rel="shortcut icon" href="img/favicon.png">
      <link href="icons-reference/Google-Material-Icons.css" rel="stylesheet">
      <link rel="stylesheet" href="css/jquery-confirm.min.css">
      
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
        /* width: 100%;*/
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
         width: 55%;
         }
         .picusern {
         width: 15%;
         }
         .piccreateby {
         width: 12%;
         }
         .picoption {
         width: 12%;
         }
         }
      </style>
      <!-- Tweaks for older IEs--><!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/customA11ySelect.js"></script>
     
      <script>
         $(document).ready(function() {
             $('#example12').DataTable( {
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
                 <!--  <li title="Media Files" class="dropdown position-relative dropright" id="dd">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-boundary="dd" data-display="static" title="Media Files"> <i class="material-icons-outlined">perm_media</i><span>Media Files</span></a>
                     <div class="dropdown-menu position-fixed media-files">
                        <a class="dropdown-item" href="viewPictures.php" title="Pictures"><i class="material-icons-outlined">collections</i><span>Pictures</span></a>
                        <a href="viewAudio.php" class="dropdown-item" title="Audio"><i class="material-icons-outlined">library_music</i><span>Audio</span></a>
                        <a href="viewVideo.php" class="dropdown-item" title="Video"><i class="material-icons-outlined">video_library</i><span>Video</span></a>
                     </div>
                  </li> -->
                  <?php
                      $fileN = "";
                      $icon_color = "";
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
                    $fileN = "";
                      $icon_color = "";
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
                        <div class="row mt-4">
                           <div class="col-12 col-xs-7 col-sm-7 col-md-7">
                              <h3>Delete Requests</h3>
                           </div>
                           <div class="col-12 col-xs-5 col-sm-5 col-md-5">
                              <div class="btn-group pull-right mb-3">
                                 <button class="btn btn-danger" onclick="AcceptdMultipleSelectedFiles()"><i class="fas fa-check-square fa-1x"></i> Accept</button>
                                 <button class="btn btn-danger" onclick="CancleMultipleSelectedFiles()"><i class="fas fa-ban fa-1x"></i> Cancel</button>
                              </div>
                           </div>
                        </div>
                        <?php 
                           // $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
                           // if($conn->connect_error){
                           //  die("Connection Failed ".$conn->connect_error);
                           // }
                           
                           $res= mysqli_query($conn , "SELECT * FROM file_delete_request WHERE status='0'");
                           
                           echo "<div class='row'><div class='col-md-12'><div class='dm_table'><div class='table-responsive' style='overflow-x:hidden;'>
                           <table id='example12' class='table bordered pictable'>";
                           echo "<thead>";
                           echo "<tr>";
                           /*echo "<th>Sr. No.</th>";*/
                           echo "<th class='piccheck'><input type='checkbox' id='checkAll'></th>";
                           echo "<th class='picname'>Folder/File Name</th>";
                           echo "<th class='picusern'>User Name</th>";
                           echo "<th class='piccreateby'>Request Date</th>";
                           echo "<th class='picoption'></th>";  
                           echo "</tr>";
                           echo "</thead>";
                           $index=1;
                           while($row= mysqli_fetch_array($res)){
                            // GET USER NAME 
                            $res1= mysqli_query($conn, "SELECT * FROM user WHERE id='".$row['user_id']."'");
                            $row1= mysqli_fetch_array($res1);
                            $user_f= $row1['first_name'];
                            $user_l= $row1['last_name'];
                            
                            // GET FILE NAME...
                            $res2= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id='".$row['file_id']."'");
                            
                            $row2= mysqli_fetch_array($res2);
                            if($row2!=""){
                              $fileN= $row2['document_name'];
                            }else{
                              $res3= mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id='".$row['file_id']."'");
                              $row3= mysqli_fetch_array($res3);
                              if($row3!=""){
                                $fileN= $row3['folder_name'];
                                $icon_color="Blank-Folder-icon.png";
                              }else{
                                $res4= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id='".$row['file_id']."'");
                                $row4= mysqli_fetch_array($res4);
                                
                                if($row4!=""){
                                  $fileN= $row4['folder_name'];
                                  $icon_color="Blank-Folder-icon.png";
                                }
                              }
                              
                            }
                            
                            $type = pathinfo($fileN, PATHINFO_EXTENSION); 
                           // echo "FILE TYPE= ". $type;
                            if($type == 'mp3' || $type == 'aif' || $type == 'cda' || $type == 'mid' || $type == 'midi' || $type == 'mpa' || $type == 'ogg' || $type == 'wav' || $type == 'wna' || $type == 'aac')
                                  {
                                    $icon_color="audioicon.png";
                                    $icon_title="Audio icon";
                                  }
                                  else if($type == 'mp4' || $type == '3gp' || $type == '3gp2' || $type == '3g2' || $type == '3gpp' || $type == '3gpp2' || $type == 'ogg' || $type == 'oga' || $type == 'ogv' || $type == 'ogx' || $type == 'wnv' || $type == 'wma' || $type == 'asf' || $type == 'webm' || $type == 'flv' || $type == 'avi' || $type == 'gif' || $type == 'wmv')
                                  {
                                    $icon_color="video-icon.png";
                                    $icon_title="video icon";
                                  }
                                  else if($type == 'xlsx' || $type=='xls')
                                  {
                                    $icon_color="Excel-icon.png";
                                    $icon_title="Excel icon";
                                  }
                                  else if($type == 'docx' || $type == 'doc')
                                  {
                                    $icon_color="Word-icon.png";
                                    $icon_title="docx icon";
                                  }
                                  else if($type == 'pdf')
                                  {
                                    $icon_color="Adobe-Reader.png";
                                    $icon_title="Pdf icon";
                                  }
                                  else if($type == 'txt')
                                  {
                                    $icon_color="text-icon1.png";
                                    $icon_title="Text icon";
                                  }
                                  else if($type == 'jpg' || $type == 'png' || $type == 'PNG' || $type == 'svg' || $type=='jpeg')
                                  {
                                    $icon_color="image-icon1.png";
                                    $icon_title="image icon";
                                  }
                                  else if($type == 'zip' || $type == 'rar')
                                  {
                                    $icon_color="rar.png";
                                    $icon_title="zip icon";
                                  }else if($icon_color== ''){
                                     $icon_color="DEFAULT.png";
                                    $icon_title="zip icon"; 
                                  }
                            echo "<tr>";
                            /*echo "<td>".$index."</td>"  ;*/
                            echo "<td><input type='checkbox' name='checkboxlist' value='".$row['file_id']."' onclick='getCheckBoxValue(".$row['file_id'].")'></td>";
                            echo "<td><img src='icon/$icon_color' width='20' height='20'/>&nbsp;&nbsp;".$fileN."</td>"  ;
                            echo "<td>".$user_f. " ".$user_l."</td>"  ;
                            echo "<td>".date('d-m-Y H:i:s',strtotime($row['createdAt']))."</td>"  ;
                            echo "<td style='overflow:inherit'><div class='dropdown'><button type='button' class='btn dropdown-toggle pull-right' data-toggle='dropdown'></button><div class='dropdown-menu'><a href='#' class='btnUpdate dropdown-item' title='Accept' data-update-id='".$row['file_id']."'>Accept</a><a href='#' title='Cancel' class='btnUpdate1 dropdown-item' data-update-id='".$row['id']."'>Cancel</a></div></div></td>";
                            echo "</tr>";
                            $index++;//echo "FILE ID = ".$row['file_id'];
                           }
                           
                           echo "</table></div></div></div></div>";
                           ?>
                    
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

       <script type="text/javascript">
         $(document).ready(function() {
               $('#data_no').customA11ySelect();
            });
         
      </script>

      <!-- Select all checkboxes -->
      <script type="text/javascript">
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
              //alert(checkValues);
              //$('#result').html(data);
              //location.reload();
            }
          });
          
         });
      </script>
      <!-- Delete Files/folders-->
      <script>
         $(document).on("click",".btnUpdate",function()
         {
          var id=$(this).data("update-id");
          //alert(id);
          $.confirm({
                          title: 'Folder Delete',
                          content: 'Do you want to delete folder?',
                           type: 'dark',
               buttons: {
                  Ok: function () {
                    $.ajax({
                      url:"deleteFileByAdmin.php",
                      method:"post",
                      data:{id:id},
                      success:function(checkValues)
                      {
                        //alert(checkValues);
                        //$.alert("Files and folders deleted successfully");
                        //$('#result').html(data);
                        //window.location.href='index.php';
                        //window.location.reload();
                        
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
                    });
                  },
                  Cancel: function () {
                    location.reload();
                  },
                  },
            });
          /*var msg=confirm("Do you want to delete folder");
          if(msg == true)
          {
            $.ajax({
              url:"deleteFileByAdmin.php",
              method:"post",
              data:{id:id},
              success:function(data)
              {
                alert(data);
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
          }*/
          
         });
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
         $(document).on("click",".btnUpdate1",function()
         {
          var id=$(this).data("update-id");
          $.confirm({
                          title: '',
                          content: 'Do you want to cancle delete file request?',
                           type: 'dark',
                 buttons: {
                    Ok: function () {
                      $.ajax({
                        url:"cancleDeleteFileByAdmin.php",
                        method:"post",
                        data:{id:id},
                        success:function(checkValues)
                        {
                          //alert(checkValues);
                          //$.alert("Files and folders deleted successfully");
                          //$('#result').html(data);
                          //window.location.href='index.php';
                          //window.location.reload();
                          
                           $.confirm({
                            title: 'Success!',
                            content: 'Request canceled successfully',
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
         
         
          /*var msg=confirm("Do you want to cancle delete file request");
          if(msg == true)
          {
            $.ajax({
              url:"cancleDeleteFileByAdmin.php",
              method:"post",
              data:{id:id},
              success:function(data)
              {
                alert(data);
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
          }*/
          
         });
      </script>
      <script>
         function AcceptdMultipleSelectedFiles(){
         
           $.confirm({
                          title: '',
                          content: 'Do you want to delete selected folders and files?',
                           type: 'dark',
                 buttons: {
                    Ok: function () {
                      $.ajax({
                        url:"AcceptMultipleSelectedFiles.php",
                        method:"post",
                        //data:{ids:checkValues},
                        success:function(checkValues)
                        {
                          //alert(checkValues);
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
             
         
         
          /*var msg= confirm("Do you want to delete selected folder and files?");
          if(msg){
            $.ajax({
              url:"AcceptMultipleSelectedFiles.php",
              method:"post",
              //data:{ids:checkValues},
              success:function(checkValues)
              {
                alert("SUCCESS BLOCK OF ACCEPTDMULTIPLESELECTEDFILES.");
                alert(checkValues);
                alert("Files and folders deleted successfully");
                //$('#result').html(data);
                location.reload();
              }
            });
          }*/
         }
      </script>
      <script>
         function CancleMultipleSelectedFiles(){
         
          $.confirm({
                          title: '',
                          content: 'Do you want to Cancel delete request for selected folder and files?',
                           type: 'dark',
                 buttons: {
                    Ok: function () {
                      $.ajax({
                        url:"CancleMultipleSelectedFiles.php",
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
             
          
          /*var msg= confirm("Do you want to Cancel delete request for selected folder and files?");
          if(msg){
            $.ajax({
              url:"CancleMultipleSelectedFiles.php",
              method:"post",
              //data:{ids:checkValues},
              success:function(checkValues)
              {
                alert("SUCCESS BLOCK OF ACCEPTDMULTIPLESELECTEDFILES.");
                alert(checkValues);
                alert("Files and folders deleted successfully");
                //$('#result').html(data);
                location.reload();
              }
            });
          }*/
         }
      </script>   
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