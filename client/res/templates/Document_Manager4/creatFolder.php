<?php
error_reporting(0);
session_start();

if ($_SESSION['Login'] == "")
{
    echo "<script>window.location='http://" . $_SERVER['SERVER_NAME'] . "'</script>";
}
if ($_SESSION['Login'] == 'fincrm')
{
    $_SESSION['Login'] = "admin";
}
$userName = $_SESSION['Login'];

//get connection
include ($_SERVER['DOCUMENT_ROOT'] . '/task_cron/subdomain_connection.php');

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
   
     <link href="css/customA11ySelect.css" rel="stylesheet">
        <script src="vendor/jquery/jquery.min.js"></script>
        <style type="text/css">
          .material-icons {
              font-size: 18px;
          }
          .material-icons-outlined {
              font-size: 18px;
          }

          .custom-a11yselect-container{
  margin-right: 0px !important;
}


.removeButton{
  padding: 11px 0px !important;
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
            <a href="../../../../finnovaadvisory"> <img src="img/logo.png" alt="person" class="img-fluid"></a>
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
if ($_SESSION["Login"] == "admin")
{
    /*echo '<li title="Set Default File Size"><a href="setDefaultSizeLimit.php" title="Set Default File Size"><i class="material-icons-outlined">settings_backup_restore</i><span>Set Default File Size</span></a></li>';*/
    echo '<li title="Delete Requests"><a href="deleteFileRequests.php" title="Delete Requests" title="Delete Requests"><i class="material-icons-outlined">delete</i><span>Delete Requests</span></a></li>';
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
        <div class="container-fluid pdeditfile">
          <div class="row d-flex align-items-md-stretch">
            <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3"> 
              <div class="">
                <div class="alert">
                  <a class="close" data-dismiss="alert"><i class="icon-remove"></i></a>
                  <strong><?php echo $msg; ?></strong>
                </div>
                <div class="row">
                  <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 main">
                    <div class="dm_upload">
                     <h2 class="text-center mb-4" style="margin-right: 40px;">Create Folder</h2>
                      <form method="post" id="first_form">
                        <input type="hidden" name="usercount" id="inputcountusers">
             <input type="hidden" name="flagvalue" id="flagvalue" VALUE="0">
                          <div class="form-group row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                               <label>Folder Name</label>
                            </div>
                            <div class="col-11 col-xs-11 col-sm-11 col-md-11 col-lg-11">
                              <input type="text" id="folder_Name" class="form-control" name="folderName" placeholder="Enter folder name" required>
                            </div>
                          </div>
                         <div class="form-group row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                               <label>Assign Users</label>
                            </div>
                            <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <select name="user" id="idfisrtselectbox" class="classfisrtselectbox form-control">
                                <option value="">Select User</option>
                                <?php
$assignusr = array();
$i = 0;
if ($conn->connect_error)
{
    die("Connection Failed" . $conn->connect_error);
}
$result = mysqli_query($conn, "SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0' AND is_portal_user='0' AND user_name<>'" . $userName . "' AND is_active<>'0' ORDER BY first_name");
while ($row = mysqli_fetch_array($result))
{

    echo "<option value=" . $row['user_name'] . ">" . $row['first_name'] . " " . $row['last_name'] . "</option>";
}

?>
                              </select>
                            </div>
                             <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                             <select name="userAccess" class="accessfisrtselectbox form-control">
                              <option value="">Select Access</option>
                              <option value="upload">Upload</option>
                              <option value="Download">Download</option>
                              <option value="Both">Both</option>
                            </select>
                            </div>
                          </div>
                          <div id="test"></div>
                          <div class="form-group row btns_Create_folder">
                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
                              <div class="createbtn" id="main">
                                <button type="button" class="btn btn-primary bt" id="btAdd" value="Add User"><i class="material-icons-outlined">add</i> Add User</button>
                              </div>
                                <script>
                                    $(document).ready(function() {
                                      var iCnt = 0;
                                      var selectcnt=0;
                                      var show_cnt=1; 
                                      var selectedextrauser;
                                      var selectcount="";               
                                      var arr = [];
                                     
                                      if(selectcount=='')
                                          {
                                            $("#btAdd").attr("disabled", "disabled");
                                          }
                                      
                                      $('#btAdd').click(function() {
                                        
                                          if (iCnt >= 0) {
                                            iCnt = iCnt + 1;
                                          selectcnt= selectcnt + 1;
                                          
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

                                          // ADD TEXTBOX.
                                          $('#test').append('<div class="row form-group" id="removeRow'+selectcnt+'"><div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6" id="extrauser"><select class="assignExtraUser form-control" id="idselectbox'+selectcnt+'" style="height:40px;" data-selecteduserno-id="'+selectcnt+'" name="extrausername'+selectcnt+'" required="required"><option value="">Select User</option></select></div><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5"><select class="accessuser form-control" style="height:40px;" name="extradefineaccess'+selectcnt+'" ><option value="">Select Access</option><option value="Upload">Upload</option><option value="Download">Download</option><option value="Both">Both</option></select></div><div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1"><i class="removeButton fas fa-times" id='+selectcnt+'></i></div></div>');
                                          
                                          $.ajax({
                                              url:"testing_demo.php",
                                              method:"post",
                                              data:{arr:arr},
                                              
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
                                       
                                      });
                                      
                                      $(document).on("change",".classfisrtselectbox",function(){
                                        //alert("assignExtraUser"+selectcnt);
                                        $("#btAdd").removeAttr("disabled");
                                      var selecteduser = $(this).children("option:selected").val();
                                                          
                                        $.ajax({
                                            url:"testing_demo.php",
                                            method:"post",
                                            data:{selecteduser:selecteduser},
                                            
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
                                            data:{arr:arr},
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
                      var removeselectbox_value = $("#idselectbox"+button_id).children("option:selected").val();
                      $("#removeRow"+button_id).remove();
                      //alert(removeselectbox_value);
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
                            </div>
                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
                              <button class="btn btn-primary form-control" id="extraassigniser" type="submit" value="Create Folder" name="createfolder" style="color:#fff;">Create Folder</button>
                            </div>
                            <div class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3">
                              <button class="btn btn-danger form-control" onclick="goBack()" id="cancel" type="button" value="cancel" name="cancel" style="">Cancel</button>
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
      <script>
        function goBack(){
          window.location="index.php";
        }
      </script>
      
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
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
    function myFunction(p1) {
      document.getElementById('flagvalue').value =p1;
    }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
             $('#idfisrtselectbox').customA11ySelect();
             $('.accessfisrtselectbox').customA11ySelect();
        });
        
        </script>
        <script>
          function goToIndexPage(){
            window.location='index.php';
          }

          function goToViewFodlerFiles(id){
            if(id==0){
              window.location='index.php';
            }else{
              window.location.href='viewFolderFiles.php?id='+id;  
            }
            
          }

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
<?php
if (isset($_POST['createfolder']))
{
    session_start();
      
    

    $flag = 0;


    $userName = $_SESSION["Login"];
    /// Check duplicate Entry.....
    $sql = "SELECT * FROM folder_master_3 WHERE folder_name='" . $_POST['folderName'] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $folderNameFromDB = $row['folder_name'];

    $_SESSION['folderName'] = $_POST['folderName'];
    $_SESSION['assignUser'] = $_POST['user'];
    $_SESSION['userAccess'] = $_POST['userAccess'];

    $data = array();
    $defineaccessData = array();

    date_default_timezone_set('Asia/Kolkata');
    $folderName = $_POST['folderName'];
    $createdBy = $userName;
    $assignedUserId = $_POST['user'];
    $defineAccess = $_POST['userAccess'];

    $data[0] = $assignedUserId;
    $defineaccessData[0] = $defineAccess;
    //assign more user name
    $extrausersession = $_POST['usercount'];
    $temp_cnt = 0;

    for ($i = 1;$i <= $extrausersession;$i++)
    {
        if ($i == $extrausersession)
        {
            $data[$i] = $_POST['extrausername' . $i];
            $defineaccessData[$i] = $_POST['extradefineaccess' . $i];
        }
        else
        {
            $data[$i] = $_POST['extrausername' . $i];
            $defineaccessData[$i] = $_POST['extradefineaccess' . $i];
        }

    }
    $datauser_array = array_filter($data);
    $dataaccess_array = array_filter($defineaccessData);

    $datauser = implode(",", $datauser_array);
    $dataaccess = implode(",", $dataaccess_array);

    $_SESSION['flagvalue'] = $_POST['flagvalue'];
    //echo $_SESSION['flagvalue'];
    if ($folderNameFromDB != $_POST['folderName'])
    {
        
        // // Create S3 object ....  
        // include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');  
        // // Create S3Client object ....
        //  $result = $s3->putObject([
        //     'Bucket' => 'fincrm',
        //     'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$folderName,
        //     //'SourceFile' => $temp_file_location         
        // ]);

         // print_r($result);
         // die;
        $result = mysqli_query($conn, "INSERT INTO folder_master_3(folder_name, created_user_id, assigned_user_id, define_access) VALUES ('" . $folderName . "', '" . $createdBy . "', '" . $datauser . "', '" . $dataaccess . "')");

        echo "<script>
                $.confirm({
                  title: '',
                  content: 'Folder Created Successfully',
                   type: 'dark',
            buttons: {
                ok: function () {
                    window.location.href='index.php';
                }
            }
        });
        </script>";

    }
    else if (isset($folderNameFromDB) == isset($_POST['folderName']))
    {
        echo "<script>

   $.confirm({
                  title: 'Folder Rename',
                  content: 'Do you want to rename folder?',
                   type: 'dark',
 buttons: {
        Ok: function () {
            window.location.href='renameFolder.php';
        },
        Cancel: function () {
      window.location.href='creatFolder.php';
        },
      },
   });
  </script>";
    }

}

?>
