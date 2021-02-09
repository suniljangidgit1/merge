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
    <!--<link rel="stylesheet" href="../../../res/templates/Document_Manager4/css/style.default.css" id="theme-stylesheet">-->
 <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../../../res/templates/Document_Manager4/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../../../res/templates/Document_Manager4/img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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
		</style>
        <script src="../../../res/templates/Document_Manager4/vendor/jquery/jquery.min.js"></script>

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

  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center">
		  <a href="../../../../">
		      <img src="../../../res/templates/Document_Manager4/img/logo.png" alt="person" class="img-fluid rounded-circle">
		  </a>
            
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
        <!--   <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>D</strong><strong class="text-primary">M</strong></a></div> -->
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu" style="padding-top: 20px;">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
          <!--   <li><a href="../../../finnovaadvisory/#Account"> <i class="material-icons-outlined">receipt</i><span>Accounts</span></a></li>
            <li><a href="../../../../../finnovaadvisory/#Contact"> <i class="material-icons-outlined">group</i><span>Contacts</span></a></li>
            <li><a href="../../../../../finnovaadvisory/#Lead"> <i class="material-icons-outlined">account_box</i><span>Leads</span> </a></li>
            <li><a href="../../../../../finnovaadvisory/#Opportunitie"> <i class="material-icons-outlined">attach_money</i><span>Opportunities</span></a></li>
            <li><a href="../../../../../finnovaadvisory/#Case"> <i class="material-icons-outlined">donut_small</i><span>Cases</span></a></li>
            <li><a href="../../../../../finnovaadvisory/#Calendar"><i class="material-icons-outlined">date_range</i><span>Calendar</span></a></li>
            <li><a href="../../../../../finnovaadvisory/#Meeting"> <i class="material-icons-outlined">business_center</i><span>Meetings</span></a></li>
            <li><a href="../../../../../finnovaadvisory/#Call"> <i class="material-icons-outlined">call</i><span>Calls</span></a></li>
            <li><a href="../../../../../finnovaadvisory/#Task"> <i class="material-icons-outlined">event_note</i><span>Tasks</span></a></li> -->
            <li title="Dashboard">
              <a href="../../../../" title="Dashboard"> <i class="material-icons-outlined">home</i><span>Dashboard</span></a>
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
                <!--<div class="dropdown-menu position-fixed master reminders">
                  <a  class="dropdown-item" href="#" > <i class="material-icons-outlined">email</i><span>Email Reminder</span></a>
                  <a class="dropdown-item" href="#"> <i class="material-icons-outlined">sms</i><span>SMS Reminder</span></a>
                </div>-->
           </li>

           <li title="Document Manager">
              <a href="#" title="Document Manager"> <i class="material-icons-outlined">create_new_folder</i><span>Document Manager</span></a>
            </li>

            <li title="Reports">
              <a href="#" title="Reports"> <i class="material-icons-outlined">assignment</i><span>Reports</span></a>
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
    
      
    </div>
    <!-- JavaScript files-->
    
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
   
  </body>
</html>








