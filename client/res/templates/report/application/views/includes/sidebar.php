<!-- New navbar html Start -->
          <!--Navbar-->
          <nav class=" navbar navbar-light light-blue lighten-4 mobile_view" style="display: none;">
            <!-- Collapse button -->
            <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="dark-blue-text">
                    <i class="fas fa-bars" style="font-size: 15px;"></i>
                </span>
            </button>
            <!-- Navbar brand -->
            <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER["HTTP_HOST"]; ?>">
              <img src="<?php echo base_url()?>assets/dist/img/logo_new.png" alt="person" class="img-responsive">
            </a>

            <a href="../../../../" class="pull-right" title="Go to Dashboard"> <span class=" dashbtn d-sm-inline-block">Go To Dashboard</span></a>
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <!-- Links -->
      
                  <!-- sidebar menu: : style can be found in sidebar.less -->
                  <ul class="col-xs-9 sidebar-menu navbar-nav mr-auto main_list list-unstyled" data-widget="tree">
                    <li class="<?php echo (isset($activeMenu) && $activeMenu===1) ? 'active' : '';?>">
                        <a href="<?php echo base_url();?>lead-report" title="Lead Report">
                            <i class="material-icons-outlined" title="Lead Report">account_box</i>
                            <span title="Lead Report">Lead Report</span>
                        </a>
                    </li>

                    <li class="dropdown opportunities<?php echo (isset($activeMenu) && $activeMenu===2) ? ' active' : '';?>" style="height: auto;">
                        <a href="#" title="Opportunities Report" class="dropdown-toggle" data-toggle="dropdown" >
                            <i class="material-icons-outlined" title="Opportunities Report">assignment</i>
                            <span title="Opportunities Report">Opportunities</span>
                        </a>
                      <ul class="col-xs-6 dropdown-menu">
                        <li>
                            <a href="<?php echo base_url();?>opportunity-stage-report" title="Opp. by Stage Report">
                                <i class="material-icons-outlined" title="Opp. by Stage Report">equalizer</i>
                                <span title="Opp. by Stage Report">Opp. By Stage Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>opportunity-revenue-report" title="Opp. by Revenue Report">
                                <i class="material-icons-outlined" title="Opp. by Revenue Report">monetization_on</i>
                                <span title="Opp. by Revenue Report">Opp. By Revenue Report</span>
                            </a>
                        </li>
                      </ul>
                    </li>

                    <li class="dropdown Financial<?php echo (isset($activeMenu) && $activeMenu===3) ? ' active' : '';?>" style="height: auto;">
                        <a href="#" title="Financial" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons-outlined" title="Financial">monetization_on</i>
                            <span title="Financial">Financial</span>
                        </a>
                      <ul class="col-xs-6 dropdown-menu">
                        <li>
                            <a href="<?php echo base_url();?>billing_entitywise-report" title="Billing entity wise Report">
                                <i class="material-icons-outlined" title="Billing entity wise Report">equalizer</i>
                                <span title="Billing entity wise Report">Billing Entity Wise Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>customerwise-report" title="Customer wise report">
                                <i class="material-icons-outlined" title="Customer wise report">account_circle</i>
                                <span title="Customer wise report">Customer Wise Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>aginganalysis-report" title="Debtors ageing analysis report">
                                <i class="material-icons-outlined" title="Debtors ageing analysis Report">history</i>
                                <span title="Debtors aging analysis report">Debtors Ageing Analysis Report</span>
                            </a>
                        </li>
                      </ul>
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
        <span class="logo-lg"><img  class="img-responsive" src="<?php echo base_url()?>assets/dist/img/logo_new.png" width=125px></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top custom-sidebar-nav">
    
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
    <section class="sidebar custom-sidebar-nav">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="<?php echo (isset($activeMenu) && $activeMenu===1) ? 'active' : '';?>">
                <a href="<?php echo base_url();?>lead-report" title="Lead Report">
                    <i class="material-icons-outlined" title="Lead Report">account_box</i>
                    <span title="Lead Report">Lead Report</span>
                </a>
            </li>

            <li class="treeview opportunities<?php echo (isset($activeMenu) && $activeMenu===2) ? ' active' : '';?> oppo_menu" style="height: auto;">
                <a href="#" title="Opportunities Report">
                    <i class="material-icons-outlined" title="Opportunities Report">assignment</i>
                    <span title="Opportunities Report">Opportunities</span>
                </a>
              <ul class="treeview-menu">
                <li>
                    <a href="<?php echo base_url();?>opportunity-stage-report" title="Opp. by Stage Report">
                        <i class="material-icons-outlined" title="Opp. by Stage Report">equalizer</i>
                        <span title="Opp. by Stage Report">Opp. By Stage Report</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>opportunity-revenue-report" title="Opp. by Revenue Report">
                        <i class="material-icons-outlined" title="Opp. by Revenue Report">monetization_on</i>
                        <span title="Opp. by Revenue Report">Opp. By Revenue Report</span>
                    </a>
                </li>
              </ul>
            </li>

            <li class="treeview oppo_menu Financial<?php echo (isset($activeMenu) && $activeMenu===3) ? ' active' : '';?>" style="height: auto;">
                <a href="#" title="Financial">
                    <i class="material-icons-outlined" title="Financial">monetization_on</i>
                    <span title="Financial">Financial</span>
                </a>
              <ul class="treeview-menu">
                <li>
                    <a href="<?php echo base_url();?>billing_entitywise-report" title="Billing entity wise Report">
                        <i class="material-icons-outlined" title="Billing entity wise Report">equalizer</i>
                        <span title="Billing entity wise Report">Billing Entity Wise Report</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>customerwise-report" title="Customer wise report">
                        <i class="material-icons-outlined" title="Customer wise report">account_circle</i>
                        <span title="Customer wise report">Customer Wise Report</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>aginganalysis-report" title="Debtors ageing analysis report">
                        <i class="material-icons-outlined" title="Debtors ageing analysis Report">history</i>
                        <span title="Debtors aging analysis report">Debtors Ageing Analysis Report</span>
                    </a>
                </li>
              </ul>
            </li>

            <!-- <li>
                <a href="<?php echo base_url();?>lead-report" title="Opportunities Report">
                    <i class="material-icons-outlined" title="Opportunities Report">assignment</i>
                    <span title="Opportunities Report">Opportunities</span>
                </a>
            </li> -->
            
                
            <a href="#" id="togg" class="sidebar-toggle sidebar-toggle-menu toggleWidth-Full abcd" data-toggle="push-menu" role="button">
                <span id="icons" class="fas fa-chevron-left"></span>
                <span class="sr-only">Toggle navigation</span>
            </a>

        </ul>

    </section>
    <!-- /.sidebar -->

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

    $('.sidebar-menu li, .treeview-menu li').click(function(){
        $('.sidebar-menu li, .treeview-menu li').removeClass('active');
        $(this).addClass('active');

    });

    $(document).on('click', function (event) {
      if (!$(event.target).closest('.oppo_menu').length) {
        // ... clicked on the 'body', but not inside of #menutop
        $(".treeview-menu").css("display","none");
      }
    });
</script>