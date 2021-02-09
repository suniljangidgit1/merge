<?php
	session_start();
	$id=preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_GET['id']);
	$_SESSION['subFolderID']= $id;
	error_reporting(0);

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
        <link href="css/customA11ySelect.css" rel="stylesheet">
        <script src="vendor/jquery/jquery.min.js"></script>
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
    <nav class="side-navbar">
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
            <!--<li title="Media Files"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse" title="Media Files"> <i class="material-icons-outlined">perm_media</i><span>Media Files</span></a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li title="Pictures"><a href="viewPictures.php" title="Pictures"><i class="material-icons-outlined">folder</i><span>Pictures</span></a></li>
                <li title="Audio"><a href="viewAudio.php" title="Audio"><i class="material-icons-outlined">folder</i><span>Audio</span></a></li>
                <li title="Video"><a href="viewVideo.php" title="Video"><i class="material-icons-outlined">folder</i><span>Video</span></a></li>
              </ul>
            </li>-->
             <li title="Media Files" class="dropdown position-relative dropright" id="dd">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-boundary="dd" data-display="static" title="Media Files"> <i class="material-icons-outlined">perm_media</i><span>Media Files</span></a>
			    <div class="dropdown-menu position-fixed media-files">
			    	<a class="dropdown-item" href="viewPictures.php" title="Pictures"><i class="material-icons-outlined">collections</i><span>Pictures</span></a>
			    	<a href="viewAudio.php" class="dropdown-item" title="Audio"><i class="material-icons-outlined">library_music</i><span>Audio</span></a>
			    	<a href="viewVideo.php" class="dropdown-item" title="Video"><i class="material-icons-outlined">video_library</i><span>Video</span></a>
			    </div>
			  </li>
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
               <li class="nav-item" title="Go to Dashboard"><a href="../../../../" class=" logout" title="Go to Dashboard"> <span class=" dashbtn d-sm-inline-block"><i class="material-icons-outlined">home</i></span></a></li>
                    <!-- Menu -->
                    <li class="nav-item dropdown adminmenu">
                    <a href="#" class="dropdown-toggle logout" title="Menu" id="navbardrop" data-toggle="dropdown"> <span class=" dashbtn d-sm-inline-block"><i class="material-icons-outlined">account_circle</i></span></a>
                    <div class="dropdown-menu admin_list">
                        <ul class="list-unstyled">
                                 <li>
                                    <a class="dropdown-item" href="../../../../#User/view/1">
                                       Admin
                                       <hr>
                                    </a>
                                 </li>
                                 <li><a class="dropdown-item" href="../../../../#Admin">Administration</a></li>
                                 <li>
                                    <a class="dropdown-item" href="../../../../#LastViewed">
                                       Last Viewed
                                       <hr>
                                    </a>
                                 </li>
                                 <li><a class="dropdown-item" href="../../../../#Logout">Log out</a></li>
                              </ul>
                    </div>
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
              <div class="">
                <div class="row">
				<div class="col-md-12">
                  <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 main">
                    <div class="">
                     <h2 class="text-center mb-4">Create Sub Folder</h2>
			             <?php
							//echo "IN CREATE SUB FOLDER PAGE";
							//echo $_GET['id'];
							$id= $_GET['id'];
							$noQuotes = str_replace( "'",'',$id );
							//echo "<br>";
							//echo $noQuotes;
						?>		
                      <form action="" method="post">
                        <input type="hidden" name="usercount" id="inputcountusers">
                          <div class="form-group row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                               <label>Folder Name</label>
                            </div>
                            <div class="col-11 col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            	<input class="form-control" type="text" name="subFolderName" placeholder="Enter folder name" required style="font-size:17px;"/>
                            </div>
                          </div>
                         <div class="form-group row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                               <label>Assign Users</label>
                            </div>
                            <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <select id="idfisrtselectbox" class="classfisrtselectbox form-control" name="assignUser" style="height:40px;">
									<option value="">Select User</option>
									<?php
										// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
										// if($conn->connect_error){
										// 	die("Connection Failed". $conn->connect_error);
										// }
										$result=mysqli_query($conn, "SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0' AND is_portal_user='0' AND is_active<>'0' ORDER BY first_name");
										while($row= mysqli_fetch_array($result)){
										    if($row['password']!=""){
											echo "<option value=".$row['user_name'].">".$row['first_name']." ".$row['last_name']."</option>";
										    }
										}
									?>
								</select>
                            </div>
                             <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                             <select name="userAccess" class="accessfisrtselectbox form-control" style="height:40px;">
								<option value="">Select Access</option>
								<option value="upload">Upload</option>
								<option value="Download">Download</option>
								<option value="Both">Both</option>
							</select>
                            </div>
                          </div>
                          <div id="test"></div>
                          <div class="form-group row">
                            <div class="col-5 col-xs-4 col-sm-4 col-md-4 col-lg-4">
                              <div class="createbtn" id="main">
                                <button type="button" class="btn btn-primary bt" id="btAdd" value="Add User">Add User</button>
                              </div>
                                <script>
							$(document).ready(function() {
								var iCnt = 0;
								var selectcnt=0;
								var show_cnt=1;	
								var selectedextrauser;
								var selectcount="";								
								var arr = [];
								
								/*var container = $(document.createElement('div')).css({
									position: 'absolute', left: '150px', top:'150px', padding: '5px', margin: '20px', width: '170px',
									borderTopColor: '#999', borderBottomColor: '#999',
									borderLeftColor: '#999', borderRightColor: '#999'
								});*/
								
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
                                          $('#test').append('<div class="row form-group" id="removeRow'+selectcnt+'"><div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6" id="extrauser"><select class="assignExtraUser form-control" id="idselectbox'+selectcnt+'" style="height:40px;" data-selecteduserno-id="'+selectcnt+'" name="extrausername'+selectcnt+'" required="required"><option value="">Select User</option></select></div><div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5"><select class="accessuser form-control" style="height:40px;" name="extradefineaccess'+selectcnt+'" ><option value="">Select Access</option><option value="Upload">Upload</option><option value="Download">Download</option><option value="Both">Both</option></select></div><div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1"><i class="removeButton fas fa-times mt-2" id='+selectcnt+'></i></div></div>');
										
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
										$("#inputcountusers").val(selectcnt);
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
                            </div>
                            <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
                              <button class="btn btn-primary form-control" id="extraassigniser" type="submit" name="createsubfolder" value="Create Sub Folder" style="color:#fff;">Create Sub Folder</button>
                            </div>
                            <div class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3">
                              <button class="btn btn-default form-control" onclick="goBack()" id="cancel" type="button" value="cancel" name="cancel" style="">Cancel</button>
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
        $(document).ready(function() {
             $('#idfisrtselectbox').customA11ySelect();
             $('.accessfisrtselectbox').customA11ySelect();
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
<?php
if(isset($_POST['createsubfolder']))
{	
	$userName=$_SESSION["Login"];
	date_default_timezone_set('Asia/Kolkata');
	// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ". $conn->connect_error);
	// }
	
	// Check duplicate Entry.....
	$Folder_Name=$_POST['subFolderName'];
	$sql= "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$_GET['id']." AND folder_name='".$Folder_Name."'";
	
	$result= mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
	$subFolderNameInDB= $row['folder_name'];
	
	$mainFolderId=$_SESSION['subFolderID'];
	$_SESSION['subFolderName']=$_POST['subFolderName']; //user enter folder name
	$_SESSION['assignUser']=$_POST['assignUser'];
	$_SESSION['userAccess']= $_POST['userAccess'];
	if($subFolderNameInDB == $_POST['subFolderName']){?>

		<script>
		   $.confirm({
		                  title: '',
		                  content: 'Folder name already exist, do you want to rename folder ?',
		                   type: 'dark',
		 buttons: {
		        Ok: function () {
		            window.location.href='renameSubFolder.php';
		        },
		        Cancel: function () {
					window.location.href='viewFolderFiles.php?id=<?php echo $mainFolderId; ?>';
		        },
		      },
		   });
		  </script>
		<!-- /*echo "<script>
					var msg1= confirm('Folder name already exist, do you want to rename folder ?'); 
					if(msg1==false){
						
						window.location.href= 'createSubFolder.php';
						
						
					}
					else{
						
						window.location.href= 'renameSubFolder.php';
						
					}
				
				
		</script>";
		*/ -->
	
	
	<?php
	
	}
	
	
	$folderID=$_SESSION['subFolderID'];
	$assignedUserId= $_POST['assignUser'];
	$defineAccess= $_POST['userAccess'];
	
	$data=array();
	$defineaccessData=array();
	
	$data[0]=$assignedUserId;
	$defineaccessData[0]=$defineAccess;	
	$extrausersession=$_POST['usercount'];
	$temp_cnt=0;
			
			for($i=1; $i<=$extrausersession;$i++)
			{
				if($i==$extrausersession)
				{
					$data[$i]=$_POST['extrausername'.$i];
					$defineaccessData[$i]=$_POST['extradefineaccess'.$i];
				}
				else
				{
					$data[$i]=$_POST['extrausername'.$i];
					$defineaccessData[$i]=$_POST['extradefineaccess'.$i];
				}
				
			}
			 
			 $datauser=implode(",",$data);
			 $dataaccess=implode(",",$defineaccessData);
		//	 echo $datauser." ".$dataaccess;
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ". $conn->connect_error);
	// }
	

	if($subFolderNameInDB != $_POST['subFolderName']){
		
		$result_orignal_for_folder=mysqli_query($conn , "INSERT INTO sub_folder_master_3(folder_master_id, folder_name, created_user_id, assigned_user_id, defineAccess) VALUES('".$folderID."', '".$_POST['subFolderName']."', '".$userName."', '".$datauser."', '".$dataaccess."')");
	
	
	
			if($result_orignal_for_folder)
			{
				?>
				<script>
                $.confirm({
		                  title: '',
		                  content: 'Sub Folder Created Successfully',
		                   type: 'dark',
		            buttons: {
		                ok: function () {
		                    window.location.href='viewFolderFiles.php?id=<?php echo $mainFolderId; ?>';
		                }
		            }
		        });
		        </script>
		     <?php   
				/*echo"<script>
		                $.confirm({
		                  title: '',
		                  content: 'Sub Folder Creating...',
		                  autoClose: 'Creating|500',
		                   type: 'dark',
		            buttons: {
		                Creating: function () {
		                   history.go(-2);
		                     $.alert('Sub Folder Created Successfully');
		                }
		            }
		        });
				</script>";*/

				/*echo"<script>
				alert('Folder created successfully !!!!');
				history.go(-2);
				</script>";*/
			}
			else{
				echo"<script>
				  $.alert('Something Went Wrong');
				history.go(-2);
				</script>";
			}
	}		
}	
?>