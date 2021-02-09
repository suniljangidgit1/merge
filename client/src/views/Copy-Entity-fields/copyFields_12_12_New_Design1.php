<?php
    session_start();
    $id= $_SESSION["entityID"];
	$name= $_SESSION["name"];
?>
<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Copy Entity Fields</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../../../res/templates/Document_Manager4/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../../../res/templates/Document_Manager4/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="../../../res/templates/Document_Manager4/css/fontastic.css">
    <!-- Google fonts - Roboto -->
     <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="../../../res/templates/Document_Manager4/css/grasp_mobile_progress_circle-1.0.0.min.css">

      <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="../../../res/templates/Document_Manager4/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../../../res/templates/Document_Manager4/css/style.default.css" id="theme-stylesheet">
    
    <link rel="stylesheet" href="css/style.default_copyentity.css" id="theme-stylesheet">
    
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../../../res/templates/Document_Manager4/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../../../res/templates/Document_Manager4/img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <link rel="stylesheet" type="text/css" href="../../../../html/dist/bootstrap-clockpicker.min.css">

    
    <link href="css/gijgo.min.css" rel="stylesheet" type="text/css" />

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
       


        <style>
        .btnprimary{
				color:#fff;
			}

		.selectbox:focus{
			box-shadow: none;
			border-color: #ced4da;
		}

    .material-icons {
        font-size: 18px;
    }
    .material-icons-outlined {
        font-size: 18px;
    }

    .form-control{
      font-size: 14px;
    }

     .mrb-10{
        margin-bottom: 10px;
      }

      .mrt-10{
        margin-top: 10px;
      }

      .mrt-5{
        margin-top: 5px;
      }

      form{
        background-color: #fff;
        padding: 20px;
        /*margin-top: 110px;
          margin-bottom: 55px;*/
      }

      .modal-header{
        border-bottom: none;
      }

      .modal-header h4{
        color:#fd7e14;
        font-weight: normal;
        font-size: 23px;
      }

      .btn-orange{
        background-color: #fd7e14;
          color: #fff;
          border-color: #fd7e14;
          padding: 6px 18px;
          font-size: 16px;
          font-weight: 600;
      }

      .btn-orange:hover{
        color:#fff;
      }

      .btn-attach{
        background-color: #fd7e14;
          border-color: #fd7e14;
          padding: 6px 7px;
          font-size: 14px;
      }

      i.fa.fa-paperclip.fa-lg{
        cursor: pointer;
      }

      .input-group-text{
        background-color: #eee !important;
        border-color:#e0e0e0 !important;
        color:#555 !important;
        border-radius: 0px !important;
      }

      .input-group-append{
        background-color: #eee !important;
        border-color:#e0e0e0 !important;
        color:#555 !important;
        border-radius: 0px !important;
      }

      .modal-header .close{
        border:none;
        outline: none;
      }


		</style>
       


  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center">
		  <img src="../../../res/templates/Document_Manager4/img/logo.png" alt="person" class="img-fluid rounded-circle">
            
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
        <!--   <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>D</strong><strong class="text-primary">M</strong></a></div> -->
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu" style="padding-top: 20px;">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
          <!--   <li><a href="../../../../../finnovaadvisory/#Account"> <i class="material-icons-outlined">receipt</i><span>Accounts</span></a></li>
            <li><a href="http://localhost:8080/DEMO_CRM1/#Contact"> <i class="material-icons-outlined">group</i><span>Contacts</span></a></li>
            <li><a href="http://localhost:8080/DEMO_CRM1/#Lead"> <i class="material-icons-outlined">account_box</i><span>Leads</span> </a></li>
            <li><a href="http://localhost:8080/DEMO_CRM1/#Opportunitie"> <i class="material-icons-outlined">attach_money</i><span>Opportunities</span></a></li>
            <li><a href="http://localhost:8080/DEMO_CRM1/#Case"> <i class="material-icons-outlined">donut_small</i><span>Cases</span></a></li>
            <li><a href="http://localhost:8080/DEMO_CRM1/#Calendar"><i class="material-icons-outlined">date_range</i><span>Calendar</span></a></li>
            <li><a href="http://localhost:8080/DEMO_CRM1/#Meeting"> <i class="material-icons-outlined">business_center</i><span>Meetings</span></a></li>
            <li><a href="http://localhost:8080/DEMO_CRM1/#Call"> <i class="material-icons-outlined">call</i><span>Calls</span></a></li>
            <li><a href="http://localhost:8080/DEMO_CRM1/#Task"> <i class="material-icons-outlined">event_note</i><span>Tasks</span></a></li> -->
            <li title="Dashboard">
              <a href="#" title="Dashboard"> <i class="material-icons-outlined">home</i><span>Dashboard</span></a>
            </li>

            <li title="Manage" class="dropdown position-relative dropright" id="dd">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-boundary="dd" data-display="static" title="Manage"> <i class="material-icons-outlined">brightness_low</i><span>Manage</span></a>
          <div class="dropdown-menu position-fixed manage">
           <a  class="dropdown-item" href="../../../../../finnovaadvisory/#Account""> <i class="material-icons-outlined">receipt</i><span>Accounts</span></a>
            <a class="dropdown-item" href="../../../../../finnovaadvisory/#Contact"> <i class="material-icons-outlined">group</i><span>Contacts</span></a>
            <a class="dropdown-item" href="../../../../../finnovaadvisory/#Lead"> <i class="material-icons-outlined">account_box</i><span>Leads</span> </a>
            <a class="dropdown-item" href="../../../../../finnovaadvisory/#Opportunity"> <i class="material-icons-outlined">attach_money</i><span>Opportunities</span></a>
            <a class="dropdown-item" href="../../../../../finnovaadvisory/#Case"> <i class="material-icons-outlined">donut_small</i><span>Cases</span></a>
            <a class="dropdown-item" href="../../../../../finnovaadvisory/#Calendar"><i class="material-icons-outlined">date_range</i><span>Calendar</span></a>
            <a class="dropdown-item" href="../../../../../finnovaadvisory/#Meeting"> <i class="material-icons-outlined">business_center</i><span>Meetings</span></a>
            <a class="dropdown-item" href="../../../../../finnovaadvisory/#Call"> <i class="material-icons-outlined">call</i><span>Calls</span></a>
            <a class="dropdown-item" href="../../../../../finnovaadvisory/#Task"> <i class="material-icons-outlined">event_note</i><span>Tasks</span></a>
           <!--  <a class="dropdown-item" href="viewPictures.php" title="Pictures"><i class="material-icons-outlined">collections</i><span>Pictures</span></a>
            <a href="viewAudio.php" class="dropdown-item" title="Audio"><i class="material-icons-outlined">library_music</i><span>Audio</span></a>
            <a href="viewVideo.php" class="dropdown-item" title="Video"><i class="material-icons-outlined">video_library</i><span>Video</span></a> -->
            </div>
           </li>

            <li title="Master" class="dropdown position-relative dropright" id="dd">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-boundary="dd" data-display="static" title="Master"> <i class="material-icons-outlined">pages</i><span>Master</span></a>
                <div class="dropdown-menu position-fixed master">
                  <a  class="dropdown-item" href="../../../res/templates/Users Settings/userSettings.php"> <i class="material-icons-outlined">build</i><span>Default Settings</span></a>
                  <a class="dropdown-item" href="../../../res/templates/userLists.php"> <i class="material-icons-outlined">supervised_user_circle</i><span>Registered Users</span></a>
                  <a class="dropdown-item" href="http://fincrm.net/finnovaadvisory/#OfficeLocation"> <i class="material-icons-outlined">room</i><span>Office Location</span></a>
                  
                </div>
           </li>

            <li title="Financials" class="dropdown position-relative dropright" id="dd">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-boundary="dd" data-display="static" title="Financials"> <i class="material-icons-outlined">monetization_on</i><span>Financials</span></a>
                <div class="dropdown-menu position-fixed master finance">
                  <a  class="dropdown-item" href="http://fincrm.net/finnovaadvisory/#Estimates"> <i class="material-icons-outlined">insert_comment</i><span>Estimates</span></a>
                  <a class="dropdown-item" href="http://fincrm.net/finnovaadvisory/#Invoice"> <i class="material-icons-outlined">local_atm</i><span>Invoices</span></a>
                   <a class="dropdown-item" href="http://fincrm.net/finnovaadvisory/#Payments"> <i class="material-icons-outlined">description</i><span>Payment history</span></a>
                </div>
           </li>

            <li title="Reminders" class="dropdown position-relative dropright" id="dd">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-boundary="dd" data-display="static" title="Reminders"> <i class="material-icons-outlined">schedule</i><span>Reminders</span></a>
                <div class="dropdown-menu position-fixed master reminders">
                  <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#EmailModal"> <i class="material-icons-outlined">email</i><span>Email Reminder</span></a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#SMSModal"> <i class="material-icons-outlined">sms</i><span>SMS Reminder</span></a>
                </div>
           </li>

           <li title="My Entities" class="dropdown position-relative dropright" id="dd">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-boundary="dd" data-display="static" title="My Entities"> <i class="material-icons-outlined">dns</i><span>My Entities</span></a>
                <div class="dropdown-menu position-fixed master myentity">
                  <a  class="dropdown-item" href="../../../../../finnovaadvisory/#Campaign"> <i class="fas fa-chart-line"></i><span>Campaigns</span></a>
                  <a class="dropdown-item" href="../../../../../finnovaadvisory/#Stream"> <i class="far fa-newspaper"></i><span>Stream</span></a>
                   <a  class="dropdown-item" href="../../../../../finnovaadvisory/#User"> <i class="fas fa-user-circle"></i><span>Users</span></a>
                   <?php
                      //get connection
                      include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

                      $resForEntity= mysqli_query($conn, "select * from entity_master");

                      while($rowForEntity= mysqli_fetch_array($resForEntity)){
                          $entityName= $rowForEntity['entity_name'];
                        ?>
                          <a  class="dropdown-item" href="../../../../../finnovaadvisory/#".$entityName> <span><?php echo $rowForEntity['entity_name_original'] ; ?></span></a>
                        <?php
                          
                        
                      }


                   ?>
                </div>
           </li>

           <li title="Document Manager">
              <a href="../../../../client/res/templates/Document_Manager3/index.php" title="Document Manager"> <i class="material-icons-outlined">create_new_folder</i><span>Document Manager</span></a>
            </li>

            <li title="Reports">
              <a href="../../../../client/res/templates/report" title="Reports"> <i class="material-icons-outlined">assignment</i><span>Reports</span></a>
            </li>


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
          <div class="container-fluid">
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
          <div class="row d-flex align-items-md-stretch">
          
            <div class="col-xs-12 col-sm-12 col-md-12"> 
		          <div class="">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<h4 class="text-center mb-3">Copy Entity Record</h4>
					<form action="copy_entity_fields_1.php" method="POST">
						<div class="row">
							<div class="col-md-8">
								<div>
									<?php
										//get connection
                    include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

										$sql= "SELECT * FROM entity_master";
										$result= mysqli_query($conn, $sql);
									?>
										<select class="form-control selectbox" name="entityList">
											<option >Select Entity</option>
									<?php	
											while($row=mysqli_fetch_array($result)){
												echo "<option value='".$row['entity_name']."'>".$row['entity_name_original']." </option>";				
											}
									?>
										</select>
						
								</div>
							</div>
							<div class="col-md-4">
								<div>
									<button type="submit" class="btn btn-primary btnprimary form-control" value="Copy Record">Copy Record</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="mt-5">
			    		<div id="showdata"></div>
			   		</div>
				</div>
			</div>
				</div>
      		</div>     
          </div>
        </div>
      </section>

      <div class="container">
        <!-- The Email Modal -->
        <div class="modal" id="EmailModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Email Reminder</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
                     <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 ">
            <form action="../../../res/templates/SaveEmailReminder.php" enctype="multipart/form-data" method="post">
            <!-- <h2 class="text-center">Email Reminder</h2> -->
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="input-group">
                  <!-- <label>Date:</label> -->
                  <input class="form-control" required  id="date" name="date" placeholder="Select Date" type="text" onchange="checkDate()"/>
                  <span class="input-group-append" style="display: none;">
                    <i class="fas fa-calendar-alt input-group-text"></i>
                    <!-- <i class="material-icons-outlined input-group-text">date_range</i> -->
                  </span> 
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <!-- <label>Email:</label> -->
                <div class="clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                <input type="text" required  name="time" id="time" placeholder="Select Time" class="form-control" onchange="checkTime()"/>
                <span class="input-group-append">
                  <i class="far fa-clock input-group-text" aria-hidden="true" style="padding-top: 11px;"></i>
                  <!-- <i class="material-icons-outlined input-group-text">alarm</i> -->
                </span>
                </div>
                <script type="text/javascript">
                  $('.clockpicker').clockpicker();
                </script>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="mrt-5">
                  <input type="email" id="to" name="to"  class="form-control" placeholder="To:" required/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="mrt-5">
                  <input type="email" name="cc" placeholder="CC:" class="form-control"/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="mrt-5">
                  <input type="text" name="subject" placeholder="Subject" class="form-control"/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="mrt-5">
                  <textarea class="ckeditor" cols="0" id="editor1" name="editor1" rows="0"></textarea>
                  <script>
                                CKEDITOR.replace( 'editor1' );
                          </script>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="row mrt-10">
                  <div class="col-xs-12 col-sm-12 col-md-2">
                    <div class="clip-upload">
                    <label for="file-input">
                      <span class="btn"><i class="fa fa-paperclip fa-lg" style="color:black; font-size:21px;" aria-hidden="true"></i></span>
                    </label> 
                    
                    <input type="file"  class="file-input d-none" multiple name="attachment[]" onblur="getFileInfo()" id="file-input"/ >
                    <div class="filename-container hide"></div>
                  </div>
                </div>
                  <div class="col-xs-12 col-sm-12 col-md-10">
                    <input type="text" id="fileName" name="" style="border:none"/>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="mrt-10">
                  <button type="submit" value="Save" class="btn btn-orange pull-right" onclick="saveEmailReminder()">Save</button>
                </div>
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



        <!-- The SMS Modal -->
        <div class="modal" id="SMSModal">
          <div class="modal-dialog">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">SMS Reminder</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
                    <div class="container">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12 ">
                          <!--  <form action="client/res/templates/saveSMSReminder.php" method="post" name="form" >  -->
                              <!-- <h2 class="text-center">SMS Reminder</h2> -->
                              <div class="row mrb-10">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                   <div class="form-group">
                                      <div id="filterDate2">
                                          <div class="input-group date">
                                              <input  type="text" id="date1" name="date" class="form-control" placeholder="Select Date" required onchange="checkDate1()">
                                              <span class="btn-default_gray input-group-append" style="display: none;">
                                                 <i class="fas fa-calendar-alt input-group-text"></i>
                                                <!-- <i class="material-icons-outlined input-group-text">date_range</i> -->
                                              </span>
                                          </div>  
                                      </div>    
                                  </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                   <div class="clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true"> 
                                  <input type="text" required id="time1" name="time" placeholder="Select Time" class="form-control" onchange="checkTime1()"/>
                                  <span class=" btn-default_gray input-group-append">
                                    <i class="far fa-clock input-group-text" aria-hidden="true" style="padding-top: 11px;"></i>
                                    <!-- <i class="material-icons-outlined input-group-text">alarm</i> -->
                                  </span>
                                  </div> 
                                   
                                </div>
                              </div>
                              <div class="row mrb-10">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="">
                                    <input class="form-control number-only" id="mobile_no" maxlength="10" minlength="10" placeholder="Mobile Number" pattern="\d{10}" required type="text" name="mobileNO"  onblur="validation()" />
                                  </div>
                                </div>
                              </div>
                              <div class="row mrb-10">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="mrt-10">
                                    <textarea class="form-control input-sm" id="msgbody" placeholder="Message : Only 140 characters" required style="resize:none;" maxlength="140" cols="16" rows="10" name="smsbody"></textarea>
                                  </div>
                                </div>
                              </div>
                            
                              <div class="row mrb-10">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="mrt-5">
                                    <button type="submit" value="Save"  onclick="saveSMSReminder()"  class="btn btn-orange pull-right" >Save</button>
                                  </div>
                                </div>
                              </div>

                          <!--  </form>  -->
                          </div>
                        </div>
                      </div>
              </div>
             
              
            </div>
          </div>
        </div>









      </div>  <!--End Container-->
    
      
    </div>
    <!-- JavaScript files-->




     <script src="../../../res/templates/Document_Manager4/vendor/jquery/jquery.min.js"></script>


    <script type="text/javascript" src="../../../../html/dist/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript" src="../../../../html/ckeditor/ckeditor.js"></script>

    <script src="../../../res/templates/Document_Manager4/js/typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
      });
    });
    </script>
    
    <script src="../../../res/templates/Document_Manager4/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../../../res/templates/Document_Manager4/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../res/templates/Document_Manager4/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="../../../res/templates/Document_Manager4/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../../../res/templates/Document_Manager4/vendor/chart.js/Chart.min.js"></script>
    <script src="../../../res/templates/Document_Manager4/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../../res/templates/Document_Manager4/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../../res/templates/Document_Manager4/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="../../../res/templates/Document_Manager4/js/front.js"></script>
    <script src="js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>



       <script>
$(document).on("change",".selectbox",function(){
	
var selectedvalue = $(this).children("option:selected").val();
										
	$.ajax({
			url:"fetch_data.php",
			method:"post",
			data:{selectedvalue:selectedvalue},
			
			success:function(data)
			{
				$('#showdata').html(data);	
			}
			
	});

}); 
</script>
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




    <!--Start Clock and datepicker Scripts-->

    <script>
      function saveEmailReminder(){
      var salDate= document.getElementById('date').value;
      var salTime= document.getElementById('time').value;
      var to = document.getElementById('to').value;
     // alert("SELECTED DATE = "+salDate);
     // alert("SELECTED TIME = "+salTime);
     // alert("TO = "+to);

      if(salDate!="" && salTime!="" && to!=""){
       $.alert({
                  title: 'Success!',
                  content: 'Reminder saved successfully !!',
                   type: 'dark',
                   typeAnimated: true,
              });
      }else{
         $.alert({
                  title: 'Warning!',
                  content: 'Please enter required fields',
                   type: 'dark',
                   typeAnimated: true,
              });
      }

      }
 </script> 

 <script type="text/javascript">
        $(function() {

 $('#date').datepicker({
          format: "mm/dd/yyyy",
           uiLibrary: 'bootstrap4',
           iconsLibrary: 'fontawesome',
           locale: 'en-us',

        }); 

  
});


        

        $('#date1').datepicker({
          format: "mm/dd/yyyy",
           uiLibrary: 'bootstrap4',
           iconsLibrary: 'fontawesome',
           locale: 'en-us',
        }); 
     </script> 

     
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

  <script>
      function saveSMSReminder(){
        //alert("HIii");
        var selected_date= document.getElementById('date1').value;
        var selected_time= document.getElementById('time1').value;
        var selected_mobile_no= document.getElementById('mobile_no').value;
        var selected_msgbody= document.getElementById('msgbody').value;
        var data= "NULL";
      //  alert("DATE "+ selected_date + " TIME "+ selected_time + "MOBILE NO "+  selected_mobile_no + "BODY " + selected_msgbody);
        
        //alert("Hii");
        if(selected_date!="" && selected_time!="" && selected_mobile_no!="" && selected_msgbody!=""){ 
              $.ajax({
                  url: '../../../res/templates/saveSMSReminder.php',
                  type: 'get',
                  async: false,
                 data: {date:selected_date,time:selected_time,mobileNO:selected_mobile_no,smsbody:selected_msgbody },
                  success:function(data)
              {
               $('#SMSModal').modal('toggle');
               if(data=='1'){

                $.alert({
                          title: 'Success!',
                          content: 'Reminder saved successfully !!',
                           type: 'dark',
                           typeAnimated: true,
                      });
                
             
                //alert(data);
               }
              
                
                 
                       
              }
              });

        }else{
          $.alert({
                          title: 'Warning!',
                          content: 'All Fields are required',
                           type: 'dark',
                           typeAnimated: true,
                      });
        }
      


        
      }
      
      //var result = saveSMSReminder();
    </script> 

<script>
      function validation(){
        var val = document.getElementById('mobile_no').value;
        if(val!=""){


          if (/^\d{10}$/.test(val)) {
              // value is ok, use it
          } else {
              $.alert({
                    title: 'Alert!',
                    content: 'Mobile number must be of 10 digits',
                     type: 'dark',
                     typeAnimated: true
                });
              
              document.getElementById('mobile_no').value="";
              //document.form.mobileNO.focus();
          }
        }
        if(val==""){
          $.alert({
                  title: 'Alert!',
                  content: 'Please enter mobile number',
                   type: 'dark',
                   typeAnimated: true
              });
        }
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
    
    <script>
      $(document).ready(function() {
        $('.file-input').change(function() {
          $file = $(this).val();
          $file = $file.replace(/.*[\/\\]/, ''); //grab only the file name not the path
          $('.filename-container').append("<div  class='filename'>" + $file + "</div>").show();
        })
      })
    </script> 
    <script>
      $('#file-input').on('change', function() {
      var name=document.getElementById('file-input').value;
        document.getElementById('fileName').value=name;
     // alert("IN ON CHANGE FILES");
        var selectedFiles= document.getElementById('file-input').files.length;
       // alert(selectedFiles);
        var form_data = new FormData();
        for(var i=0; i<selectedFiles; i++){
          var file_data = $('#file-input').prop('files')[i];   
          form_data.append('file[]', file_data);
        }
         

         // alert(form_data);                             
          $.ajax({
              url: '../../client/res/templates/site/getFiles.php', // point to server-side PHP script 
              dataType: 'text',  // what to expect back from the PHP script, if anything
              cache: false,
              contentType: false,
              processData: false,
              data: form_data,                         
              type: 'post',
              success: function(php_script_response){
                //  alert(php_script_response); // display response from the PHP script, if any
              }
           });
      });
      function getFileInfo(){
        var name=document.getElementById('file-input').value;
        document.getElementById('fileName').value=name;
      }
    </script>
    <script >
        var count=0;
      function checkDate() {
      
          var selectedText = document.getElementById("date").value;
          //alert(selectedText);
         
          var selectedDate = new Date(selectedText);
          var now = new Date();
       //alert("SELECTED DATE => "+selectedDate);
       //alert("CURRENT DATE => "+now);
          now.setDate(now.getDate()-1);
          if (now > selectedDate) {
            $.alert({
                  title: 'Alert!',
                  content: 'Reminder can not be set for a past date',
                  type: 'dark',
                  typeAnimated: true,
              });
           
            document.getElementById('date').value='';
           
          }else{
             
          }
        }
        
    


      function checkTime(){

         //alert("Hello Time");
        var selectedText1 = document.getElementById('date').value;
        //alert(selectedText1);
        var selectedDate1 = new Date(selectedText1);
        //alert(selectedDate1); 
        var today = new Date();
        //alert(today);
        
        var dd1= selectedDate1.getDate();
        var mm1 = selectedDate1.getMonth()+1; 
        var yyyy1 = selectedDate1.getFullYear();
        
        var dd = today.getDate();
        var mm = today.getMonth()+1; 
        var yyyy = today.getFullYear();
        
        //alert(dd1);
        //alert(mm1);
        //alert(yyyy1);
        
        if(dd== dd1 && mm==mm1 && yyyy==yyyy1){
          //alert("You have seleted todays date");
          
          var selectedTime= document.getElementById('time').value;
          var insertedTime= new Date(selectedTime);
          //alert(selectedTime);
          var strArray= selectedTime.split(':');
          
          var selHRS= strArray[0];
          var selMints= strArray[1];
        
          var hrs= today.getHours();
          var mints= today.getMinutes();
          //alert(hrs);
          //alert(mints);
          //alert("SELECTED HRS= "+selHRS + " CURRENT HRS=> "+hrs);
          //alert("SELECTED MINTS= "+selMints + " CURRENT MINITS=> "+mints);
          
          if(hrs>=selHRS){
            //alert("selected time is must be feature time");
            //alert("CURRENT HRS-> "+hrs+ " SELECTED HRS-> "+ selHRS);
            if(hrs == selHRS){
              //alert("CURRENT M-> "+mints+ " SELECTED HRS-> "+ selMints);
              if(mints>selMints){

              $.alert({
                  title: 'Alert!',
                  content: 'Reminder can not be set for a past time',
                   type: 'dark',
                   typeAnimated: true
              });
             
              document.getElementById('time').value='';
              }
            }else{
              $.alert({
                  title: 'Alert!',
                  content: 'Reminder can not be set for a past time',
                   type: 'dark',
                   typeAnimated: true
              });
              document.getElementById('time').value='';
            }
            
            
          }
        }
      }
    </script>
    <script>

       var count=0;
      function checkDate1() {
              //alert("Hello date1");
       
          var selectedText = document.getElementById("date1").value;
          var selectedDate = new Date(selectedText);
          var now = new Date();
         // alert("SELECTED DATE => "+selectedDate);
         // alert("CURRENT DATE => "+now);
          now.setDate(now.getDate() - 1);
          if (now > selectedDate) {
            $.alert({
                  title: 'Alert!',
                  content: 'Reminder can not be set for a past date',
                   type: 'dark',
                   typeAnimated: true,
              });
            document.getElementById('date1').value='';
           
          }else{
              
          }
       
        
      }


      function checkTime1(){
         //alert("Hello Time1");
        var selectedText1 = document.getElementById('date1').value;
        //alert(selectedText1);
        var selectedDate1 = new Date(selectedText1);
        //alert(selectedDate1); 
        var today = new Date();
        //alert(today);
        
        var dd1= selectedDate1.getDate();
        var mm1 = selectedDate1.getMonth()+1; 
        var yyyy1 = selectedDate1.getFullYear();
        
        var dd = today.getDate();
        var mm = today.getMonth()+1; 
        var yyyy = today.getFullYear();
        
        //alert(dd1);
        //alert(mm1);
        //alert(yyyy1);
        
        if(dd== dd1 && mm==mm1 && yyyy==yyyy1){
          //alert("You have seleted todays date");
          
          var selectedTime= document.getElementById('time1').value;
          var insertedTime= new Date(selectedTime);
          //alert(selectedTime);
          var strArray= selectedTime.split(':');
          
          var selHRS= strArray[0];
          var selMints= strArray[1];
        
          var hrs= today.getHours();
          var mints= today.getMinutes();
          //alert(hrs);
          //alert(mints);
          //alert("SELECTED HRS= "+selHRS + " CURRENT HRS=> "+hrs);
          //alert("SELECTED MINTS= "+selMints + " CURRENT MINITS=> "+mints);
          
          if(hrs>=selHRS){
            //alert("selected time is must be feature time");
            //alert("CURRENT HRS-> "+hrs+ " SELECTED HRS-> "+ selHRS);
            if(hrs == selHRS){
              //alert("CURRENT M-> "+mints+ " SELECTED HRS-> "+ selMints);
              if(mints>selMints){
               $.alert({
                  title: 'Alert!',
                  content: 'Reminder can not be set for a past time',
                   type: 'dark',
                   typeAnimated: true,
              });

              
              document.getElementById('time1').value='';
              }
            }else{
              $.alert({
                  title: 'Alert!',
                  content: 'Reminder can not be set for a past time',
                   type: 'dark',
                   typeAnimated: true,
              });
              document.getElementById('time1').value='';
            }
            
            
          }
        }
      }



    </script>
    
<!-- <script>
  $(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'mm/dd/yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
      orientation: "top" 
    })
  })
</script> -->

                <script type="text/javascript">
                  $('.clockpicker').clockpicker();
                </script>




    <!--End Clock and datepicker Scripts-->
   
  </body>
</html>








