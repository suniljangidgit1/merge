<script type="text/javascript">
    // To check whether logged in user is admin or not script start
    $.ajax({
      url: "../../../../client/res/templates/header-forUser/header_forUser_controller.php",
      type: "get",
      async: false,
      success: function(result)  {
        //alert(result);
        if(result != 'admin'){
          $('.EmailCampaigns').remove();
        }
      }
    });
    // To check whether logged in user is admin or not script end

    var currentDomain = window.location.hostname;
    var methodName = 'getTrailDays';   
    // alert(currentDomain);
    $.ajax({
      type    : "GET",
      url     : "../../../../client/res/templates/site/check_validity/check_domain_validity.php",
      dataType  : "json",
      data : {methodName:methodName,currentDomain:currentDomain},
      success: function(data)
      {
        $("#days").text(data);
        if(data == -1){
            // alert("PAID");
            $(".upgrade-btn").hide();
        }else{
            if(data != ""){
                $("#days").text(data);
            }else if(data == 0){
               $(".upgrade-btn").hide(); 
            }
        }
      }
    });  
   
   $(document).on("click",".btn-orange_upgrade",function(){
     var methodName = 'getUpgradeUrl';
    $.ajax({
      type    : "GET",
      url     : "../../../../client/res/templates/site/check_validity/check_domain_validity.php",
      dataType  : "json",
      data    : {methodName:methodName,currentDomain:currentDomain},
      success: function(data)
      {   console.log(data);
          $(location).attr("href",data.url);
      },
   });
   });

    var afterhash_portal = window.location.pathname;
    afterhash_portal.indexOf(1);
    afterhash_portal.toLowerCase();
    afterhash_portal = afterhash_portal.split("/")[1];
    // alert(afterhash_portal);
    if(afterhash_portal == 'portal')
    {
        // alert("InPortal");
        $(".portal_hide").css("display","none");
        var length = $(".entitydrop li").length;
        //alert(length);
        if(length<=0)
        {
            //alert("Entity Empty");
            $("#header .nav>li.myentities> .submenu").removeClass("entitydrop");
            $(".myentities").hide();
            $("#header .nav>li.myentities> .submenu").css({"top":"200px !important","height":"auto"});
        }
        else
        {
            // alert("Entity not Empty");
            
            $("#header .nav>li.myentities> .submenu").addClass("entitydrop");
            $(".myentities").show();
        }
    }
    else
    {
        // alert("InCRM");
        var length = $(".entitydrop li").length;
        // alert(length);
        if(length<=0)
        {
            // alert("Entity Empty");
            $("#header .nav>li.myentities> .submenu").removeClass("entitydrop");
            $(".myentities").hide();
            $("#header .nav>li.Campaigns> .submenu").removeClass("MyCampaignsdrop");
            $("#header .nav>li.Campaigns> .submenu").addClass("entitydrop");
            $("#header .nav>li.myentities> .submenu").css({"top":"200px !important","height":"auto"});
        }
        else
        {
            // alert("Entity not Empty");
            $("#header .nav>li.Campaigns> .submenu").removeClass("entitydrop");
            $("#header .nav>li.myentities> .submenu").addClass("entitydrop");
            $("#header .nav>li.Campaigns> .submenu").addClass("MyCampaignsdrop");
            $(".myentities").show();
        }
    }
</script>

<div class="navbar_header_white" style=""></div>
<div class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-action="toggleCollapsable">
            <span class="fas fa-bars"></span>
        </button>
        <div class="navbar-logo-container"><a class="navbar-brand nav-link" href="#"><img src="{{logoSrc}}" class="logo"></span></a></div>
        {{!--<a href="javascript:" class="side-menu-button"><span class="fas fa-bars"></span></a>--}}
    </div>

    <div class="navbar-collapse navbar-body">
        <ul class="nav navbar-nav tabs">
            <li class=" ">
                <a class="nav-link dashboard" href="#" title="Dashboard">
                    <span class="short-label" title="Dashboard" style="">
                        <i class="material-icons-outlined">subtitles</i>
                    </span>
                    <span class="full-label">Dashboard</span>
                </a>
            </li>
            <li class="dropdown more">
                <a id="nav-more-tabs-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#" title="Manage">
                    <span class="short-label" title="Manage" style="">
                        <i class="material-icons-outlined" title="Manage">brightness_low</i>
                    </span>
                    <span class="full-label" title="Manage">Manage</span>
                </a>
                <ul class="managedrop dropdown-menu submenu" role="menu" aria-labelledby="nav-more-tabs-dropdown">
                {{#each tabDefsList}}
                {{#unless isInMore}}
                <li data-name="{{name}}" class="not-in-more tab">
                    
                    <a href="{{link}}" class="nav-link"{{#if color}} style="border-color: {{color}}"{{/if}}>
                        <span class="short-label" title="{{label}}"{{#if color}} style="color: {{color}}"{{/if}}>
                            {{#if iconClass}}
                            <i class="material-icons-outlined">{{iconClass}}</i>
                            {{else}}
                            {{#if colorIconClass}}
                            <span class="{{colorIconClass}}" style="color: {{color}}"></span>
                            {{/if}}
                            <span class="short-label-text">{{shortLabel}}</span>
                            {{/if}}
                        </span>
                        <span class="full-label">{{label}}</span>
                    </a>
                    
                </li>
                {{/unless}}
                {{/each}}
                </ul>
            </li>
            <li class="dropdown more portal_hide">
                <a id="nav-more-tabs-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="short-label" title="Financials" style="" title="Financials">
                        <i class="material-icons-outlined" title="Financials">monetization_on</i>
                    </span>
                    <span class="full-label" title="Financials">Financials</span>
                </a>
                <ul class="financedrop dropdown-menu submenu" role="menu" aria-labelledby="nav-more-tabs-dropdown">
                    <li class="not-in-more tab">
                        <a class="nav-link " href="#BillingEntity" title="Billing Entites">
                             <span class="short-label" title="Billing Entites" style="">
                               <i class="material-icons-outlined">description</i>
                            </span>
                             <span class="full-label">Billing Entites</span>
                        </a>
                    </li>
                    <li class="not-in-more tab">
                        <a class="nav-link " href="/#Estimate" title="Estimates">
                             <span class="short-label" title="Estimates" style="">
                               <i class="material-icons-outlined">insert_comment</i>
                            </span>
                             <span class="full-label">Estimates</span>
                        </a>
                    </li>
                    <li class="not-in-more tab">
                     <a class="nav-link " href="/#Invoice" title="Invoices">
                         <span class="short-label" title="Invoices" style="">
                            <i class="material-icons-outlined">local_atm</i>
                        </span>
                         <span class="full-label">Invoices</span>
                         
                      </a>
                    </li>
                    <li class="not-in-more tab">
                     <a class="nav-link " href="/#Payments" title="Payment history">
                          <span class="short-label" title="Payment history" style="">
                            <i class="material-icons-outlined">payments</i>
                        </span>
                         <span class="full-label">Payment history</span>
                        
                      </a>
                    </li>
                    <li class="not-in-more tab">
                     <a class="nav-link " target="_blank" href="/client/res/templates/report/billing_entitywise-report" title="Reports">
                          <span class="short-label" title="Reports" style="">
                            <i class="material-icons-outlined">assignment</i>
                        </span>
                         <span class="full-label">Reports</span>
                        
                      </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown more portal_hide">
                <a id="nav-more-tabs-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#" title="Reminders">
                    <span class="short-label" title="Reminders" style="">
                        <i class="material-icons-outlined">schedule</i>
                    </span>
                    <span class="full-label">Reminders</span>
                </a>
                <ul class="reminderdrop dropdown-menu submenu" role="menu" aria-labelledby="nav-more-tabs-dropdown">
                    <li class="not-in-more tab">
                        <a class="nav-link " href="#SMSReminder" title="SMS Reminder" >
                            <span class="short-label" title="SMS Reminder" style="">
                            <i class="material-icons-outlined">sms</i>
                            </span>
                            <span class="full-label">SMS Reminders</span>
                        </a>
                    </li>

                    <li class="not-in-more tab">
                        <a class="nav-link " href="#EmailReminder" title="Email Reminder" >
                             <span class="short-label" title="Email Reminder" style="">
                                <i class="material-icons-outlined">email</i>
                            </span>
                             <span class="full-label">Email Reminders</span>
                             
                        </a>
                    </li>  
                </ul>
            </li>
            <li class="dropdown more myentities">
                <a id="nav-more-tabs-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#" title="My Entities">
                    <span class="short-label" title="My Entities" style="">
                        <i class="material-icons-outlined" title="My Entities">dns</i>
                    </span>
                    <span class="full-label" title="My Entities">My Entities</span>
                </a>
                <ul class="entitydrop dropdown-menu submenu" role="menu" aria-labelledby="nav-more-tabs-dropdown">
                {{#each tabDefsList}}
                {{#if isInMore}}
                    <li data-name="{{name}}" class="in-more tab">
                        <a href="{{link}}" class="nav-link"{{#if color}} style="border-color: {{color}}"{{/if}}>
                            <span class="short-label"{{#if color}} style="color: {{color}}"{{/if}}>
                                {{#if iconClass}}
                                <span class="{{iconClass}}"></span>
                                {{else}}
                                {{#if colorIconClass}}
                                <span class="{{colorIconClass}}" style="color: {{color}}"></span>
                                {{/if}}
                                <span class="short-label-text">&nbsp;</span>
                                {{/if}}
                            </span>
                            <span class="full-label">{{label}}</span>
                        </a>
                    </li>
                {{/if}}
                {{/each}}
                </ul>
            </li>
            <li class="dropdown more Campaigns portal_hide">
                <a id="nav-more-tabs-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#" title="Campaigns">
                    <span class="short-label" title="Campaigns" style="">
                        <i class="material-icons-outlined">insert_chart_outlined</i>
                    </span>
                    <span class="full-label">Campaigns</span>
                </a>
                <ul class="MyCampaignsdrop dropdown-menu submenu" role="menu" aria-labelledby="nav-more-tabs-dropdown">
                    <!-- <li class="not-in-more tab">
                        <a class="nav-link " href="#MessageLog" title="Message Logs" >
                             <span class="short-label" title="Message Logs" style="">
                                <i class="material-icons-outlined">list_alt</i>
                            </span>
                             <span class="full-label">Message Logs</span>
                             
                        </a>
                    </li> -->
                    <li class="not-in-more tab">
                        <a class="nav-link " href="#ContactList" title="Contact Lists" >
                             <span class="short-label" title="Contact Lists" style="">
                                <i class="material-icons-outlined">contacts</i>
                            </span>
                             <span class="full-label">Contact Lists</span>
                             
                        </a>
                    </li>
                    <li class="not-in-more tab">
                        <a class="nav-link " href="#MyCampaigns" title="My Campaigns" >
                            <span class="short-label" title="My Campaigns" style="">
                            <i class="material-icons-outlined">recent_actors</i>
                            </span>
                            <span class="full-label">My Campaigns</span>
                        </a>
                    </li>
                    <li class="not-in-more tab">
                        <a class="nav-link " href="#ContentTemplate" title="Content Templates" >
                            <span class="short-label" title="Content Templates" style="">
                            <i class="material-icons-outlined">category</i>
                            </span>
                            <span class="full-label">Content Templates</span>
                        </a>
                    </li>
                    <li class="not-in-more tab EmailCampaigns">
                        <a class="nav-link " href="http://email-campaign.fincrm.net/" title="Email Campaigns" target="_blank">
                            <span class="short-label" title="Email Campaigns" style="">
                            <i class="material-icons-outlined">email</i>
                            </span>
                            <span class="full-label">Email Campaigns</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="portal_hide">
                <a id="nav-more-tabs-dropdown" target="_blank" class=""  href="client/res/templates/dailysheet/daily-sheet" title="Dailysheet">
                    <span class="short-label" title="Dailysheet" target="_blank" style="">
                        <i class="material-icons-outlined">create_new_folder</i>
                    </span>
                    <span class="full-label" title="Dailysheet">Dailysheet</span>
                </a>
            </li>
            <li class="portal_hide">
                <a id="nav-more-tabs-dropdown" target="_blank" class=""  href="/client/res/templates/report/lead-report" title="Reports">
                    <span class="short-label" title="Reports" target="_blank" style="">
                        <i class="material-icons-outlined">assignment</i>
                    </span>
                    <span class="full-label" title="Reports">Reports</span>
                </a>
            </li>
            <li class="portal_hide">
                <a id="nav-more-tabs-dropdown" target="_blank" class=""  href="client/res/templates/Document_Manager4/index.php" title="Documents">
                    <span class="short-label" title="Documents" target="_blank" style="">
                        <i class="material-icons-outlined">create_new_folder</i>
                    </span>
                    <span class="full-label" title="Documents">Documents</span>
                </a>
            </li>
           <!--  <li class="dropdown more portal_hide" id="masterList">
                <a id="nav-more-tabs-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#" title="Master">
                    <span class="short-label" title="Master" style="">
                        <i class="material-icons-outlined">pages</i>
                    </span>
                    <span class="full-label">Master</span>
                </a>
                <ul class="masterdrop dropdown-menu submenu" role="menu" aria-labelledby="nav-more-tabs-dropdown">
                    <li data-name="DefaultSettings" class="not-in-more tab">
                       <a class="nav-link " href="#" onclick="" title="Users Settings">
                            <span class="short-label" title="Default Settings" style="">
                            <i class="material-icons-outlined">build</i>
                            </span>
                            <span class="full-label">Default Settings</span>
                        </a>
                    </li>
                    <li data-name="RegisteredUsers" class="not-in-more tab">
                        <a class="nav-link " href="#" title="Registered Users">
                             <span class="short-label" title="Registered Users" style="">
                                <i class="material-icons-outlined">supervised_user_circle</i>
                            </span>
                             <span class="full-label">Registered Users</span>
                        </a>
                    </li>
                    <li data-name="OfficeLocation" class="not-in-more tab">
                         <a class="nav-link " href="#OfficeLocation" title="Office Location">
                             <span class="short-label" title="Office Location" style="">
                                <i class="material-icons-outlined">room</i>
                            </span>
                             <span class="full-label">Office Location</span>
                         </a>
                    </li>
                </ul>
            </li> -->
            
        </ul>
        <div class="navbar-right-container">
        <ul class="nav navbar-nav navbar-right">
            <li class="nav navbar-nav navbar-form global-search-container">
                {{{globalSearch}}}
            </li>
            <li class="upgrade-btn" title="Upgrade Now">
               <span><span id="days"></span> Days of Trial Remaining<span>
               <!-- <span id="validity"><span> -->
                <a class="btn btn-orange_upgrade">UPGRADE NOW</a>
            </li>
            <li class="menu-container1" title="Refresh">
                <a href="javascript:void(0);" onclick="refreshPage()" title="Refresh">
                <i class="material-icons-outlined">sync</i></a>
            </li>
            <script>
              function refreshPage(){
                
                window.location.reload();
              }
            </script>
            <li class="dropdown notifications-badge-container">
                {{{notificationsBadge}}}
            </li>
            {{#if enableQuickCreate}}
            <li class="dropdown hidden-xs quick-create-container">
                <a id="nav-quick-create-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#" title="{{translate 'Create'}}"><i class="material-icons-outlined">add</i></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="nav-quick-create-dropdown">
                    <li class="dropdown-header">{{translate 'Create'}}</li>
                    {{#each quickCreateList}}
                    <li><a href="#{{./this}}/create" data-name="{{./this}}" data-action="quick-create">{{translate this category='scopeNames'}}</a></li>
                    {{/each}}
                </ul>
            </li>
            {{/if}}
            <li class="dropdown menu-container">
                <a id="nav-menu-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#" title="{{translate 'Menu'}}"><span class="material-icons-outlined">account_circle</span></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="nav-menu-dropdown">
                    {{#each menuDataList}}
                        {{#unless divider}}
                            <li><a href="{{#if link}}{{link}}{{else}}javascript:{{/if}}" class="nav-link{{#if action}} action{{/if}}"{{#if action}} data-action="{{action}}"{{/if}}>{{#if html}}{{{html}}}{{else}}{{label}}{{/if}}</a></li>
                        {{else}}
                            <li class="divider"></li>
                        {{/unless}}
                    {{/each}}
                </ul>
            </li>
        </ul>
        </div>
        <a class="minimizer" href="javascript:">
            <span class="fas fa-chevron-right right" style="position: relative;
    left: 4px;top: -5px;"></span>
            <span class="fas fa-chevron-left left" style="position: relative;
    left: 80px;"></span>
        </a>
    </div>
</div>



<script >
  $('#header ul.tabs>li>a').click(function(){
    $('#header ul.tabs>li>a').removeClass('dashboard');
    $(this).addClass('dashboard');
  });
</script>