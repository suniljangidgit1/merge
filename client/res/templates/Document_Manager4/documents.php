<?php
session_start();
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
$connect=$conn;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
    <link rel="stylesheet" href="fonts/Roboto/Roboto.css">
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script>    
      $(document).ready(function(){

        // Number of rows selection
        $("#num_rows").change(function(){

          // Submitting form
          $("#form").submit();

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
       <div  class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="index.php?page_no=1" title="Files/Folders"> <i class="far fa-folder"></i><span>Files/Folders</span></a></li>
            <li><a href="creatFolder.php" title="Create Folder"> <i class="fas fa-folder-plus"></i><span>Create Folder</span></a></li>
            <li><a href="uploadFile.php" title="Upload Files"> <i class="fas fa-file-upload"></i> <span>Upload Files</span></a></li>
            <!-- <li><a href="documents.php?page_no=1"> <i class="fas fa-file"></i>Documents</a></li> -->
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows" title="Media Files"></i><span>Media Files</span></a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
               <li><a href="viewPictures.php?page_no=1" title="Pictures"><i class="fas fa-images"></i><span>Pictures</span></a></li>
                <li><a href="viewAudio.php?page_no=1" title="Audio"><i class="fas fa-music"></i><span>Audio</span></a></li>
                <li><a href="viewVideo.php?page_no=1" title="Video"><i class="fas fa-video"></i><span>Video</span></a></li>
              </ul>
            </li>
           <?php
          if($_SESSION["Login"]=="admin")
          {
            /*echo'<li><a href="setDefaultSizeLimit.php" title="Set Default File Size"><i class="fas fa-database"></i><span>Set Default File Size<span></a></li>';*/
      echo'<li><a href="deleteFileRequests.php" title="Delete Requests"><i class="fas fa-archive"></i><span>Delete Requests</span></a></li>';
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
        <div class="container-fluid">
          <div class="row d-flex align-items-md-stretch">
          
            <div class="col-xs-12 col-sm-12 col-md-12"> 
          <div class="">
            <h3 class="text-center mt-2">Documents</h3>
          <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
              <div class="form-group">
                   <h6>
                    <?php 
                      //echo "USER NAME-> ". $_SESSION['Login'];
                    ?>
                  </h6> 
                   <div class="input-group mb-3">
                      <input type="text" name="search_text" id="search_text" placeholder="Search by File/Folder Name" class="formborderrad form-control">
                    </div>
               
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
               <div class="pull-right countpage mt-2">
                  <form method="post" action="" id="form">
                    <select id="num_rows" class="form-control" name="num_rows">
                                <?php
                                $numrows_arr = array("10","25","50","100","250");
                                foreach($numrows_arr as $nrow){
                                    if(isset($_POST['num_rows']) && $_POST['num_rows'] == $nrow){
                                        echo '<option value="'.$nrow.'" selected="selected">'.$nrow.'</option>';
                                    }else{
                                        echo '<option value="'.$nrow.'">'.$nrow.'</option>';
                                    }
                                }
                                ?>
                            </select>
                    </form>
               </div>
            </div>
          </div>
        <div id="result"></div>
        
        
<?php

      $username=$_SESSION['Login'];
      if($username=='admin')
      {
        //echo $username;
if (isset($_GET['page_no']) && $_GET['page_no']!="") 
    {
      $page_no = $_GET['page_no'];
    }
    else 
    {
      $page_no = 1;
    }
    $rowperpage = 10;
            if(isset($_POST['num_rows'])){
                $rowperpage = $_POST['num_rows'];
            }
      
    $document_total_records_per_page = $rowperpage;
    $offset = ($page_no-1) * $document_total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 
    
    //'doc', 'DOC', 'docx', 'DOCX', 'pdf', 'PDF', 'TXT', 'txt', 'xls', 'xlsx'
    
    // $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
    $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM document_master WHERE document_type='doc' OR document_type='DOC' OR document_type='docx' OR document_type='DOCX' OR document_type='pdf' OR document_type='PDF' OR document_type='TXT' OR document_type='xls' OR document_type='xlsx'");
    
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $document_total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1
?>    
            

<ul class="pagination pull-right">
  <?php if($page_no > 1){ echo "<li class='page-item'><a class='page-link' href='?page_no=1'>First Page</a></li>"; } ?>
    
  <li class='page-item' <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
  <a class='page-link' <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
  </li>
       
    <?php 
  if ($total_no_of_pages <= 10){     
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
      if ($counter == $page_no) {
       echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
        }else{
           echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
        }
        }
  }
  elseif($total_no_of_pages > 10){
    
  if($page_no <= 4) {     
   for ($counter = 1; $counter < 6; $counter++){     
      if ($counter == $page_no) {
       echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
        }else{
           echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
        }
        }
    echo "<li class='page-item'><a class='page-link' >...</a></li>";
    echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
    echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    }

   elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
    echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
    echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
           if ($counter == $page_no) {
       echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
        }else{
           echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
        }                  
       }
       echo "<li class='page-item'><a class='page-link'>...</a></li>";
     echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
     echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
    
    else {
        echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
    echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
       echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
        }else{
           echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
        }                   
                }
            }
  }
?>
    
  <li class='page-item' <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
  <a class='page-link' <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
  </li>
    <?php if($page_no < $total_no_of_pages){
    echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    } ?>
</ul>
<?php
      }
?>


<?php

      if($username!='admin')
      {
      
if (isset($_GET['page_no']) && $_GET['page_no']!="") 
    {
      $page_no = $_GET['page_no'];
    }
    else 
    {
      $page_no = 1;
    }
      $rowperpage = 10;
            if(isset($_POST['num_rows'])){
                $rowperpage = $_POST['num_rows'];
            }  
      
    $document_total_records_per_page = $rowperpage;
    $offset = ($page_no-1) * $document_total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 
    
    $documenttype=array('doc', 'DOC', 'docx', 'DOCX', 'pdf', 'PDF', 'TXT', 'txt', 'xls', 'xlsx','zip');
    
    // $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
    
   
    $datacount=0;
    
    $user_cnt_query=mysqli_query($connect,"SELECT * FROM document_master");
    while($row_cnt_user=mysqli_fetch_array($user_cnt_query))
    {
        
      $assigned_data_array=explode(",",$row_cnt_user['assigned_user_id']);
      
      if(in_array($username,$assigned_data_array))
      {
      
        
        $new_login_userdata=implode(",",$assigned_data_array);
       
          if(in_array($row_cnt_user['document_type'],$documenttype))
          {
            //echo $row_cnt_user['document_type'];
            $datacount++;
            //echo $datacount."<br>"; 
            
          }
       
      }
    } 
   // echo $datacount;
    //$total_records = mysqli_fetch_array($result_count);
    $total_records =$datacount;
    $total_no_of_pages = ceil($total_records / $document_total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1
?>    
            

<ul class="pagination pull-right">
  <?php  if($page_no > 1){ echo "<li class='page-item'><a class='page-link' href='?page_no=1'>First Page</a></li>"; } ?>
    
  <li class='page-item' <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
  <a class='page-link' <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
  </li>
       
    <?php 
  if ($total_no_of_pages <= 10){     
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
      if ($counter == $page_no) {
       echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
        }else{
           echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
        }
        }
  }
  elseif($total_no_of_pages > 10){
    
  if($page_no <= 4) {     
   for ($counter = 1; $counter < 8; $counter++){     
      if ($counter == $page_no) {
       echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
        }else{
           echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
        }
        }
    
    }

   elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
    
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
           if ($counter == $page_no) {
       echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
        }else{
           echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
        }                  
       }
            
            }
    
    else {
        

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
       echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
        }else{
           echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
        }                   
                }
            }
  }
?>
    
  <li class='page-item' <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
  <a class='page-link' <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
  </li>
    <?php if($page_no < $total_no_of_pages){
    echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    } ?>
</ul>
<?php
      }
?>




</div>
      </div>
      <div style="clear:both"></div>
                  
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
    <script>
      $(document).ready(function(){
        load_data();
        function load_data(query)
        {
          var offset_data = '<?php echo $offset; ?>';
          var total_records_per_page_data = '<?php echo $document_total_records_per_page; ?>';
		  var pageno=<?php echo $_GET['page_no']; ?>
          //alert(total_records_per_page_data);
          $.ajax({
            url:"featchForDocuments.php",
            method:"post",
            data:{query:query,offset_data:offset_data,total_records_per_page_data:total_records_per_page_data,pageno:pageno},
            success:function(data)
            {
              $('#result').html(data);
            }
          });
        }
        $('#search_text').keyup(function(){
          var search = $(this).val();
          if(search != '')
          {
            load_data(search);
          }
          else
          {
            load_data();      
          }
        });
      });
    </script>
  </body>
</html>