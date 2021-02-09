<?php
  error_reporting(0);
	session_start();
	$id= $_GET['id'];
	$_SESSION['fileID']=$id;
 //get connection
  include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
  $connForGetName=$conn;
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection failed: " . $conn->connect_error);
	// }
	$sql= "SELECT * FROM document_master WHERE id='".$id."'";	
	$result= mysqli_query($conn, $sql);
	$row= mysqli_fetch_array($result);
	//echo  $row['assigned_user_id'];
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
    <!-- Favicon-->
   <link rel="shortcut icon" href="img/favicon.png">
   <link href="icons-reference/Google-Material-Icons.css" rel="stylesheet">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <script src="vendor/jquery/jquery.min.js"></script>
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
         <style type="text/css">
    	 .material-icons {
        font-size: 18px;
	    }
	    .material-icons-outlined {
	        font-size: 18px;
	    }
	    </style>
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
			        <input type="text" name="typeahead" id="typeahead"  class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Search">
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
            <div class=" col-xs-12 col-sm-12 col-md-6 offset-md-3"> 
              <div class="">
                <div class="row">
                  <div class="col-12 col-xs-12 col-sm-12 col-md-12 main">
                    <div class="">
                     <h2 class="text-center mb-4">Edit File</h2>
                      <form action="" method="post">
                        <input type="hidden" name="usercount" id="inputcountusers">
                          <div class="form-group row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12">
                               <label>File Name</label>
                            </div>
                            <div class="col-11 col-xs-11 col-sm-11 col-md-11">
                              <?php
								// $connForGetName= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
								// if($connForGetName->connect_error){
								// 	die("Connection failed: " . $connForGetName->connect_error);
								// }
								$sqlForGetName= "SELECT * FROM user WHERE id='".$row['assigned_user_id']."'";
								$resultForGetName= mysqli_query($connForGetName, $sqlForGetName);
								$rowForGetName= mysqli_fetch_array($resultForGetName);
								$_SESSION['old_file_name']=$row['document_name'];
								$fileName=$row['document_name'];
								$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
							?>
							<input class="form-control" type="text" name="fileName" value="<?php echo $row['document_name']; ?>">
                            </div>
							
                          </div>
						  
                         <div class="form-group row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12">
							
                            	<?php
					
					//echo $rowForGetName[''];
					
					// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
					// 				if($conn->connect_error){
					// 					die("Connection Error" . $conn->connect_error);
					// 				}
									
									$total_usr= mysqli_query($conn, "SELECT count(*) as cnt_row FROM user where deleted='0'");
									$total_usr=mysqli_fetch_array($total_usr);
									$total_usr_chk=$total_usr['cnt_row'];	
									//echo $total_usr_chk;
									
									
								?>
								<?php
									// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
									$relt= mysqli_query($conn, "SELECT * FROM document_master WHERE id='".$id."'");
									while($ro= mysqli_fetch_array($relt)){
										$str_arr = preg_split ("/\,/", $row['assigned_user_id']);
									}
									if($str_arr[0]!=''){
								?>
                               <label>Assigned User</label>
							   <?php
									}
								?>
                            </div>
                          </div>
						
						<div class="form-group row">
                            <div class="col-11 col-xs-11 col-sm-11 col-md-11">
							  	
							  <?php
									
									
									//if($ro['assigned_user_id']=='')
									//{
										//print_r($str_arr);
										if($str_arr[0]!=''){
											for($i=0; $i<count($str_arr); $i++){
												$res11= mysqli_query($conn, "SELECT * FROM user WHERE user_name='".$str_arr[$i]."'");
												
												$row11= mysqli_fetch_array($res11);
												$f_name= $row11['first_name'];
												$l_name= $row11['last_name'];
												
												echo "<select id='idfisrtselectbox$i' class=
												'classfisrtselectbox form-control' name='assignUser$i' style='height:40px;'><option value=".$str_arr[$i].">".$f_name." ".$l_name."</option>";
												$relt = mysqli_query($conn, "SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0'");
												while($ro= mysqli_fetch_array($relt)){
													if($ro['user_name']!=$str_arr[$i]){
														echo "<option value=".$ro['user_name'].">".$ro['first_name']." ".$ro['last_name']."</option>";
													}
												}
												echo "</select><br>";
											}
										}
									//}
									
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
							<div class="col-1 col-xs-1 col-sm-1 col-md-1">
								 
							<?php
								if($str_arr[0]!=''){
									for($i=0; $i<count($str_arr); $i++){
										echo "<div><i class='removeButton fas fa-times mt-3' id='$i' onclick='removeRow($i)'></i></div><br>";
									}
								}
							?>
						 
							</div>
							 
                         
                          </div>
                          <div id="test"></div>
                          <div class="row">
                            <div class="col-5 col-xs-4 col-sm-4 col-md-4 col-lg-4">
                              <div class="createbtn" id="main">
                                <button type="button" class="btn btn-primary bt" id="btAdd" value="Add User">Add User</button>
                                <!-- <button type="button" class="btn btn-primary bt" id="btRemove" value="Remove">Remove</button> -->
                               <!--  <button type="button" class="btn btn-primary bt" id="btRemoveAll" value="Remove All">Remove All</button> -->
                              </div>
                            </div>
                            <div class="col-6 col-xs-7 col-sm-7 col-md-7 col-lg-7 ">
                              <button class="btn btn-primary form-control" id="extraassigniser" type="submit" value="Edit File" name="editfile" style="color:#fff;">Save Changes</button>
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

       <script>
							$(document).ready(function() {
								var iCnt = 0;
								var selectcnt=0;
								var show_cnt=1;	
								var selectedextrauser;
								var selectcount="";								
								var arr = [];
								var usr_cnt=0;
								var arr_assign_user= [];
								/*var container = $(document.createElement('div')).css({
									position: 'absolute', left: '150px', top:'150px', padding: '5px', margin: '20px', width: '170px',
									borderTopColor: '#999', borderBottomColor: '#999',
									borderLeftColor: '#999', borderRightColor: '#999'
								});*/
								
								/* if(selectcount=='')
										{
											$("#btAdd").attr("disabled", "disabled");
										}
								
								 */
								$('#btAdd').click(function() {
									var assign_user_count= document.getElementById('assign_user_count').value;
										//alert(assign_user_count);
										
										for(var i=0; i<assign_user_count; i++){
											//alert('idfisrtselectbox'+i);
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

										// ADD TEXTBOX.
										 usr_cnt = '<?php echo $total_usr_chk; ?>';
										//alert(usr_cnt+' '+selectcnt);
										if(usr_cnt!=selectcnt)
										{
										 // ADD TEXTBOX.
                                          $('#test').append('<div class="row form-group" id="removeRow'+selectcnt+'"><div class="col-11 col-xs-11 col-sm-11 col-md-11" id="extrauser"><select class="assignExtraUser form-control" id="idselectbox'+selectcnt+'" style="height:40px;" data-selecteduserno-id="'+selectcnt+'" name="extrausername'+selectcnt+'" required="required"><option value="">Select User</option></select></div><div class="col-1 col-xs-1 col-sm-1 col-md-1"><i class="removeButton fas fa-times mt-2" id='+selectcnt+'></i></div></div>');
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
						<script>
							function removeRow(i){
								var removeId= i;
								
								//alert(removeId);
								
								var userTab= document.getElementById('idfisrtselectbox'+removeId);
								
								userTab.parentNode.removeChild(userTab);
								
								
								
								var closeTab= document.getElementById(removeId);
								closeTab.parentNode.removeChild(closeTab);
								//alert(userTab);
							}
						</script>
  </body>
</html>
<?php
if(isset($_POST['editfile']))
{
	session_start();
	$assignUserArr= array();
	$id=$_SESSION['fileID'];
	$newfileName= $_POST['fileName'];
	$assignUser= $_POST['assignUser'];
	$access= $_POST['userAccess'];
	$filename="";
	$withoutExtOldFile = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_SESSION['old_file_name']);
	$withoutExtNewFile = preg_replace('/\\.[^.\\s]{3,4}$/', '', $newfileName);
	$path= "upload/".$newfileName;
	
	$data=array();
	$defineaccessData=array();
	
	$data[0]=$assignUser;
	$defineaccessData[0]=$access;
	$extrausersession=$_POST['usercount'];
	
	for($j=0; $j<count($str_arr); $j++){
		if($_POST["assignUser$j"]!=''){
			$assignUserArr[$j]= $_POST["assignUser$j"];
		}
		
	}
	$assignUserFromArr= implode(",", $assignUserArr);
	
	/* echo "<script>alert('Assign User List =".$assignUserFromArr."');</script>"; */
	
	//echo $extrausersession;
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
			//print_r("<script>alert(".$data.");</script>");
			 $datauser=implode(",",$data);
			 
			 //echo "<script>alert('Assign User List in DATA =".$datauser."');</script>";
			 
			 $dataaccess=rtrim(implode(",",$defineaccessData), ',');
			 
			 if($datauser != ""){
				 $allUsers= trim ($assignUserFromArr.$datauser, ",");
			 }else{
				 $allUsers= trim($assignUserFromArr, ",");
			 }
			 
		//	 echo $datauser." ".$dataaccess;
	
	
	$old_file_extension=end(explode(".", $_SESSION['old_file_name']));
	$new_file_extension=end(explode(".", $newfileName));
	$oldFileTorename= $withoutExtOldFile.".".$old_file_extension;
	$newFileTorename= $withoutExtNewFile.".".$new_file_extension; 
	rename("upload/".$oldFileTorename, "upload/".$newFileTorename);
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die('Connection Failed:' . $conn->connect_error);	
	// }
	
	//echo "USERS === ". $allUsers;
	
	$result=mysqli_query($conn, "UPDATE document_master SET document_name='".$newfileName."', assigned_user_id='".$allUsers."', define_access='download' WHERE id='".$id."'");
	
	
			if($result)
			{

				echo"<script>
                $.confirm({
                  title: '',
                  content: 'File Updated Successfully',
                   type: 'dark',
            buttons: {
                ok: function () {
                     history.go(-2);
                }
            }
        });
        </script>";
        
				/*echo"<script>
				$.confirm({
				          title: '',
				          content: 'File Updating...',
				          autoClose: 'Updating|500',
				           type: 'dark',
				    buttons: {
				        Updating: function () {
				            history.go(-2);
				             $.alert('File Updated Successfully');
				        }
				    }
				});
				</script>";*/

				/*echo"<script>
				alert('File updated successfully !!!!');
				history.go(-2);
				</script>";*/
			}
			else{
				echo"<script>
				 $.alert('Something Went Wrong');
				history.go(-2);</script>";
				/*alert('Something went wrong  !!');*/
			}
}	
	
?>