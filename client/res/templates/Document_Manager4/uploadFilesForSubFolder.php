<?php
  session_start();
  $_SESSION['folderIDForUpload']= $_GET['id'];
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
      //get the input and UL list
      var input = document.getElementById('filesToUpload');
      var list = document.getElementById('fileList');
      //empty list for now...
      while (list.hasChildNodes()) {
        list.removeChild(ul.firstChild);
      }
      //for every file...
      for (var x = 0; x < input.files.length; x++) {
        //add to list
        var li = document.createElement('li');
        li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
        list.append(li);
      }
    </script>
    <script>
      updateList = function() {
        var input = document.getElementById('file-input');
        var output = document.getElementById('fileList');
        output.innerHTML = '<ul>';
        for (var i = 0; i < input.files.length; ++i) {
          output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
        }
        output.innerHTML += '</ul>';
      }
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
           <!--  <li><a href="documents.php?page_no=1"> <i class="fas fa-file"></i>Documents</a></li> -->
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
            /*echo'<li><a href="setDefaultSizeLimit.php"><i class="fas fa-database"></i>Set Default File Size</a></li>';*/
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
                <li class="nav-item"><a href="../../../../" class="nav-link logout"> <span class=" dashbtn d-sm-inline-block">Go To Dashboard <i class="fas fa-sign-out-alt"></i></span></a></li>
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
            <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3"> 
              <div class="">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 main">
                    <div class="">
                     <h2 class="text-center mb-4">Upload Files</h2>
                       <form action="upload_in_sub_folder.php" method="post" enctype="multipart/form-data">
                       <input type="hidden" name="usercount" class="inputcountusers">
                          <div class="form-group row">
                            <div class="col-md-12">
                               <label for="fname">Select File</label>
                            </div>
                            <div class="col-md-11">
                             <input type="file" class="file-input form-control" name="attachment[]" class="fa fa-papercli" onchange="javascript:updateList()"  id="file-input" multiple required  style="padding: 4px;">
                                <div class="filename-container hide"></div> 
                            </div>
                          </div>
                         
                         <div class="form-group row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                               <label>Assign Users</label>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                             <select name="user" class="classfisrtselectbox form-control" id="idfisrtselectbox" style="height:40px;">
                                <option value="">Select User</option>
                                <?php
                                  // $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
                                  // if($conn->connect_error){
                                  //   die("Connection Failed". $conn->connect_error);
                                  // }

                          //get connection
                          include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
                                  $result=mysqli_query($conn, "SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0'");
                                  while($row= mysqli_fetch_array($result)){
                                      if($row['password']!=""){
                                    echo "<option value=".$row['user_name'].">".$row['user_name']."</option>";
                                      }
                                  }
                                ?>
                              </select>
                            </div>
                             <div class="col-xs-5 col-sm-5 col-md-5">
                                 <select name="userAccess" class="form-control" style="height:40px;">
                                    <option value="">Select Access</option>
                                    <option value="Download">Download</option>
                                </select>
                            </div>
                          </div>
                          <div id="test"></div>
                          <div class="form-group row">
                              <div class="col-md-12">
                                  <div id="fileList"></div>
                              </div>
                            <div class="col-md-4">
                              <div class="createbtn" id="main">
                                <button type="button" class="btn btn-primary bt" id="btAdd" value="Add User">Add User</button>
                              </div>
                              
                            </div>
                            <div class="col-md-7">
                              <button class="btn btn-primary form-control" id="extraassigniser" type="submit" value="Upload" style="color:#fff;">Upload Files</button>
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
    <script>
              $(document).ready(function() {
                var iCnt = 0;
                var selectcnt=0;
                var show_cnt=1; 
                var selectedextrauser;
                var selectcount="";               
                var arr = [];
                
                var container = $(document.createElement('div')).css({
                  position: 'absolute', left: '150px', top:'150px', padding: '5px', margin: '20px', width: '170px',
                  borderTopColor: '#999', borderBottomColor: '#999',
                  borderLeftColor: '#999', borderRightColor: '#999'
                });
                
                if(selectcount=='')
                    {
                      $("#btAdd").attr("disabled", "disabled");
                    }
                
                
                $('#btAdd').click(function() {
                  
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

                   // ADD TEXTBOX.
                                          $('#test').append('<div class="row form-group" id="removeRow'+selectcnt+'"><div class="col-md-6" id="extrauser"><select class="assignExtraUser form-control" id="idselectbox'+selectcnt+'" style="height:40px;" data-selecteduserno-id="'+selectcnt+'" name="extrausername'+selectcnt+'" required="required"><option value="">Select User</option></select></div><div class="col-md-5"><select class="accessuser form-control" style="height:40px;" name="extradefineaccess'+selectcnt+'" ><option value="">Select Access</option><option value="Upload">Upload</option><option value="Download">Download</option><option value="Both">Both</option></select></div><div class="col-md-1"><i class="fas fa-times mt-2"></i></div></div>');
                    
                    $.ajax({
                        url:"testing_demo.php",
                        method:"post",
                        data:{arr:arr},
                        
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
                    $(".inputcountusers").val(selectcnt);
                    //alert(selectcnt);
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
  </body>
</html>