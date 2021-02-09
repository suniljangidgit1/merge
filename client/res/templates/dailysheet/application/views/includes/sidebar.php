<!-- New navbar html Start -->
          <!--Navbar-->
          <nav class=" navbar navbar-light light-blue lighten-4 mobile_view" style="display: none;">
            <!-- Collapse button -->
            <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text">
              <i class="fas fa-bars" style="font-size: 15px;"></i></span>
            </button>
            <!-- Navbar brand -->
            <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"]; ?>">
              <img src="<?php echo base_url()?>assets/dist/img/logo_new.png" alt="person" class="img-responsive">
            </a>

            <a href="../../../../" class="pull-right" title="Go to Dashboard"> <span class=" dashbtn d-sm-inline-block">Go To Dashboard</span></a>
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <!-- Links -->
                <?php $isActive = $this->uri->segment("1"); ?> 
      
                  <!-- sidebar menu: : style can be found in sidebar.less -->
                  <ul class="col-xs-8 sidebar-menu navbar-nav mr-auto main_list list-unstyled" data-widget="tree">
                    <li class="<?php echo ( $isActive == 'daily-sheet' ) ? 'active' : '';  ?> ">
                      <a href="<?php echo base_url();?>daily-sheet" title="Create">
                        <i class="material-icons-outlined" title="Create">create</i>
                        <span title="Create">Create</span>
                      </a>
                    </li>
                       <?php if($isuser==1){?>

                     <li class="<?php echo ( $isActive == 'review-daily-sheet' ) ? 'active' : '';  ?> ">
                      <a href="<?php echo base_url();?>review-daily-sheet" title="Review">
                        <i class="material-icons-outlined" title="Review">rate_review</i>
                        <span title="Review">Review</span>
                      </a>
                    </li>
                     
                     <li class="<?php echo ( $isActive == 'accepted-daily-sheet' ) ? 'active' : '';  ?> " >
                     <a href="<?php echo base_url();?>accepted-daily-sheet" title="Accepted">
                        <i class="material-icons-outlined" title="Accepted">assignment</i>
                        <span title="Accepted">Accepted</span>
                      </a>
                    </li>
                     
             <?php } ?>
                      
                       <li class="<?php echo ( $isActive == 'dailysheet-attendance' ) ? 'active' : '';  ?> " >
                     <a href="<?php echo base_url();?>dailysheet-attendance" title="Accepted">
                        <i class="material-icons-outlined" title="Attendance">list_alt</i>
                        <span title="Attendance">Attendance</span>
                      </a>
                    </li>

              </ul>
              <!-- Links -->
            </div>
            <!-- Collapsible content -->
          </nav>
          <!--/.Navbar-->
        <!-- New navbar html End -->

<header class="main-header web_view"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Logo -->
    <a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"]; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
     <!--  <span class="logo-mini"><b>A</b>LT</span> -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img  class="img-responsive" src="<?php echo base_url()?>assets/dist/img/logo_new.png" style="width: 125px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo 'http://'.$_SERVER["HTTP_HOST"]; ?>" class="dashbtn_report"> <span class="dashbtn d-sm-inline-block">Go To Dashboard</span></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

       <?php $isActive = $this->uri->segment("1"); ?> 
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php echo ( $isActive == 'daily-sheet' ) ? 'active' : '';  ?> ">
          <a href="<?php echo base_url();?>daily-sheet" title="Create">
            <i class="material-icons-outlined" title="Create">create</i>
            <span title="Create">Create</span>
          </a>
        </li>
           <?php if($isuser==1){?>

         <li class="<?php echo ( $isActive == 'review-daily-sheet' ) ? 'active' : '';  ?> ">
          <a href="<?php echo base_url();?>review-daily-sheet" title="Review">
            <i class="material-icons-outlined" title="Review">rate_review</i>
            <span title="Review">Review</span>
          </a>
        </li>
         
         <li class="<?php echo ( $isActive == 'accepted-daily-sheet' ) ? 'active' : '';  ?> " >
         <a href="<?php echo base_url();?>accepted-daily-sheet" title="Accepted">
            <i class="material-icons-outlined" title="Accepted">assignment</i>
            <span title="Accepted">Accepted</span>
          </a>
        </li>
         
 <?php } ?>
          
           <li class="<?php echo ( $isActive == 'dailysheet-attendance' ) ? 'active' : '';  ?> " >
         <a href="<?php echo base_url();?>dailysheet-attendance" title="Accepted">
            <i class="material-icons-outlined" title="Attendance">list_alt</i>
            <span title="Attendance">Attendance</span>
          </a>
        </li>

        <a href="#" id="togg" class="sidebar-toggle sidebar-toggle-menu toggleWidth-Full abcd" data-toggle="push-menu" role="button">
          <span id="icons" class="fas fa-chevron-left"></span>
        <span class="sr-only">Toggle navigation</span>
      </a>


      </ul>
    </section>
    <!-- /.sidebar -->


    <!--  <div class="menu-toggle toggleWidth-Full">
      
      </div> -->
  </aside>


  <script>
    $(document).ready(function(){
        $(".sidebar-toggle-menu").click(function(){
            var val= $('#togg').attr('class');
            var val1= $('#icons').attr('class');
            var arr= val.split(" ");
            var arr1= val1.split(" ");
           

            if(arr.includes("toggleWidth-Full")){
              $(".sidebar-toggle-menu").removeClass("toggleWidth-Full");
              $(".sidebar-toggle-menu").addClass("toggleWidth");
              $("#icons").removeClass("fas fa-chevron-left");
               $("#icons").addClass("fas fa-chevron-right");
            }

            if(arr.includes("toggleWidth")){
               $(".sidebar-toggle-menu").removeClass("toggleWidth");
               $(".sidebar-toggle-menu").addClass("toggleWidth-Full");
               $("#icons").removeClass("fas fa-chevron-right");
               $("#icons").addClass("fas fa-chevron-left");
            }
           
      });
        
         
    });
</script>