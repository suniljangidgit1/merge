<link href="{{basePath}}client/res/templates/site/css/style.css" rel="stylesheet">
<script>
//alert("test");
  var first = window.location.pathname;
  //alert(first);
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2]; 

if(first=='portal')
{
  $(".portal_hide").css("display","none");
}
else{
  $(".CRM_Show").css("display","none");
}
</script>
<style>
      /*body{
        background-color: #fff;
      }*/
    
        
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

      .modal-header h4{
        color:#000;
        font-size: 20px;
        font-weight: 600 !important;
      }

      .btn-orange{
        background-color: #fd7e14;
          color: #fff;
          border-color: #fd7e14;
          padding: 6px 18px;
          font-size: 16px;
          font-weight: 600;
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

      .model-width{
        width:500px;
      }

      .model-emailwidth{
        width:700px;
      }

      #EmailModal{
        position: fixed;
        top:-49px;
      }

      .modal-header .close{
        border:none;
        outline: none;
      }

      @media(min-width:320px) and (max-width: 768px){
        .model-emailwidth{
          width:381px;
          margin-top:75px;      
        }

        .model-width{
              width: 382px;
              margin-top: 23px;
              margin-left: 15px;
        }
      }

      
    </style>
    <script>
        
       function clearData() {
            //alert("Hii");
            $('.modal-content').find('input:text').val('');  
            $('#msgbody').val('');
        }

    </script>

<div class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-body">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img id="logoimg" class="img-responsive" src="{{basePath}}client/res/templates/site/img/logo2.png" alt="Logo Image">
        </a>
    </div>

    <div class="collapse navbar-collapse navbar-body">
        <ul class="nav navbar-nav tabs">
           <li class=" ">
                <a class="nav-link dashboard" href="#" title="Dashboard">
                    <span class="full-label">Dashboard</span>
                        <span class="short-label" title="Dashboard" style="">
                        <i class="material-icons-outlined">subtitles</i>
                    </span>
                </a>
            </li>
            
              {{#each tabDefsList}}
            {{#unless isInMore}}
            <li class="CRM_Show" data-name="{{name}}" class="not-in-more tab">
                <a href="{{link}}" class="nav-link"{{#if color}} style="border-color: {{color}}"{{/if}}>
                    <span class="full-label">{{label}}</span>
                    <span class="short-label" title="{{label}}">
                        {{#if iconClass}}
                        <i class="material-icons-outlined">{{iconClass}}</i>
                        {{else}}
                        {{#if colorIconClass}}
                        <span class="{{colorIconClass}}" style="color: {{color}}"></span>
                        {{/if}}
                        <span class="short-label-text">{{shortLabel}}</span>
                        {{/if}}
                    </span>
                </a>
            </li>
            {{/unless}}
            {{/each}}

            
            <li class="dropdown more portal_hide" style:"display:block">
                <a id="nav-more-tabs-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="full-label">Manage</span>
                   <span class="short-label" title="Manage" style="">
                        <i class="material-icons-outlined">brightness_low</i>
                    </span>
                </a>
                <ul class="managedrop dropdown-menu submenu" role="menu" aria-labelledby="nav-more-tabs-dropdown">
                    {{#each tabDefsList}}
                    {{#unless isInMore}}
                    <li data-name="{{name}}" class="not-in-more tab">
                        <a href="{{link}}" class="nav-link"{{#if color}} style="border-color: {{color}}"{{/if}}>
                            <span class="short-label" title="{{label}}">
                                {{#if iconClass}}
                                {{!--<span class="{{iconClass}}"></span>--}}
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
            
            <script>
            var first = window.location.pathname;
             //alert(first);
            first.indexOf(2);
            first.toLowerCase();
            first = first.split("/")[2];
            if(first=="portal"){
               // alert("PORTAL");
                $.ajax({
                url: "../../../../client/res/templates/site/checkLoginUser.php",
                type: "get", 
               // async: false,
                success: function(result)
                {
                      //alert(result);
                        if(result==1)
                        {
                          $('#masterList').css("display","none");
                       
                        }

                           
                }

              });

            }else{
               // alert("NOT PORTAL");
                 $.ajax({
                url: "../../../../finnovaadvisory/client/res/templates/site/checkLoginUser.php",
                type: "get", 
               // async: false,
                success: function(result)
                {
                      //alert(result);
                        if(result==1)
                        {
                          $('#masterList').css("display","none");
                       
                        }

                           
                }

              });
            }
            
             

            </script>
         
         

      {{!--  <li  class="portal_hide" id="masterList">
            <a class="nav-link collapsed master" data-toggle="collapse" data-target="#collapsemaster" aria-expanded="false" aria-controls="collapsemaster" title="Master">
              <span class="full-label">Master 
              </span>
                    <span class="short-label" title="Master" style="">
                       <i class="material-icons-outlined">pages</i>
                    </span>
                <span style="float: right; padding-right: 4px;"> <i class="fas fa-angle-right rotate2"></i></span>
            </a>
                <ul id="collapsemaster" class="collapse reportdrop submenu" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
               <li data-name="DefaultSettings">
                 <a class="nav-link " href="client/res/templates/Users Settings/userSettings.php" onclick="" title="Users Settings">
                     <span class="full-label" style="position:absolute;margin-left:28px;">Default Settings</span>
                     <span class="short-label" title="Default Settings" style="">
                        <i class="material-icons-outlined">build</i>
                    </span>
                  </a>
                </li>
                <script>
                    function pop_upForUserSettngs(url){
                        var url="client/res/templates/Users Settings/userSettings.php";
                        window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=900,height=700,directories=no,location=no') 
                    }
                    </script>
                <li data-name="RegisteredUsers">
                 <a class="nav-link " href="client/res/templates/userLists.php" title="Registered Users">
                     <span class="full-label">Registered Users</span>
                     <span class="short-label" title="Registered Users" style="">
                        <i class="material-icons-outlined">supervised_user_circle</i>
                    </span>
                  </a>
                </li>
                <li data-name="OfficeLocation">
                 <a class="nav-link " href="http://fincrm.net/finnovaadvisory/#OfficeLocation" title="Office Location">
                     <span class="full-label">Office Location</span>
                     <span class="short-label" title="Office Location" style="">
                        <i class="material-icons-outlined">room</i>
                    </span>
                  </a>
                </li>
             </ul> 
        </li>--}}
        
        
        


          {{!--  <li  class="portal_hide">
            <a class="nav-link collapsed finance" data-toggle="collapse" data-target="#collapsefinance" aria-expanded="false" aria-controls="collapsefinance" title="Financials">
              <span class="full-label">Financials  
              </span>
                    <span class="short-label" title="Financials" style="">
                        <i class="material-icons-outlined">monetization_on</i>
                    </span>

                <span style="float: right; padding-right: 4px;"> <i class="fas fa-angle-right rotate3"></i></span>
            </a>
                <ul id="collapsefinance" class="collapse reportdrop submenu" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
               <li>
                 <a class="nav-link " href="http://fincrm.net/finnovaadvisory/#Estimates" title="Estimates">
                     <span class="full-label" style="position:absolute;margin-left:28px;">Estimates</span>
                     <span class="short-label" title="Estimates" style="">
                       <i class="material-icons-outlined">insert_comment</i>
                    </span>
                  </a>
                </li>
                <li>
                 <a class="nav-link " href="http://fincrm.net/finnovaadvisory/#Invoice" title="Invoices">
                     <span class="full-label">Invoices</span>
                     <span class="short-label" title="Invoices" style="">
                        <i class="material-icons-outlined">local_atm</i>
                    </span>
                  </a>
                </li>
                <li>
                 <a class="nav-link " href="http://fincrm.net/finnovaadvisory/#Payments" title="Payment history">
                     <span class="full-label">Payment history</span>
                     <span class="short-label" title="Payment history" style="">
                        <i class="material-icons-outlined">description</i>
                    </span>
                  </a>
                </li>
                   
             </ul> 
        </li>
        --}}
        
         <li class="dropdown more portal_hide" style:"display:block">
                <a id="nav-more-tabs-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#">
                 <span class="full-label">Financials</span>
                    <span class="short-label" title="Financials" style="">
                        <i class="material-icons-outlined">monetization_on</i>
                    </span>
                </a>
                <ul class="financedrop dropdown-menu submenu" role="menu" aria-labelledby="nav-more-tabs-dropdown">
                  <li>
                 <a class="nav-link " href="http://fincrm.net/finnovaadvisory/#Estimates" title="Estimates">
                     <span class="short-label" title="Estimates" style="">
                       <i class="material-icons-outlined">insert_comment</i>
                    </span>
                     <span class="full-label">Estimates</span>
                     
                  </a>
                </li>
                <li>
                 <a class="nav-link " href="http://fincrm.net/finnovaadvisory/#Invoice" title="Invoices">
                     <span class="short-label" title="Invoices" style="">
                        <i class="material-icons-outlined">local_atm</i>
                    </span>
                     <span class="full-label">Invoices</span>
                     
                  </a>
                </li>
                <li>
                 <a class="nav-link " href="http://fincrm.net/finnovaadvisory/#Payments" title="Payment history">
                      <span class="short-label" title="Payment history" style="">
                        <i class="material-icons-outlined">description</i>
                    </span>
                     <span class="full-label">Payment history</span>
                    
                  </a>
                </li>
                </ul>
            </li>
            
        {{!--<li  class="portal_hide">
            <a class="nav-link collapsed reminder"  data-toggle="collapse" data-target="#collapsereminder" aria-expanded="false" aria-controls="collapsereminder" title="Reminders">
              <span class="full-label">Reminders  
              </span>
                    <span class="short-label" title="Reminders" style="">
                        <i class="material-icons-outlined">schedule</i>
                    </span>

                <span style="float: right; padding-right: 4px;"> <i class="fas fa-angle-right rotate4"></i></span>
            </a>
                <ul id="collapsereminder" class="collapse reportdrop submenu" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
               <li>
                 <a class="nav-link " href="#" title="Email Reminder" data-toggle="modal" data-target="#EmailModal">
                     <span class="full-label" style="position:absolute;margin-left:28px;">Email Reminder</span>
                     <span class="short-label" title="Email Reminder" style="">
                        <i class="material-icons-outlined">email</i>
                    </span>
                  </a>
                </li>
                <li>
                 <a class="nav-link " href="#" title="SMS Reminder" data-toggle="modal" data-target="#SMSModal">
                     <span class="full-label">SMS Reminder</span>
                     <span class="short-label" title="SMS Reminder" style="">
                        <i class="material-icons-outlined">sms</i>
                    </span>
                  </a>
                </li>
             </ul> 
        </li>
            --}}
            
         <li  class="dropdown more portal_hide">
            <a id="nav-more-tabs-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#" title="Reminders">
              <span class="full-label">Reminders</span>
                    <span class="short-label" title="Reminders" style="">
                        <i class="material-icons-outlined">schedule</i>
                    </span>
            </a>
                <ul class="reminderdrop dropdown-menu submenu" role="menu" aria-labelledby="nav-more-tabs-dropdown">
               <li>
                 <a class="nav-link " href="http://fincrm.net/finnovaadvisory/#EmailReminder" title="Email Reminder" >
                     <span class="short-label" title="Email Reminder" style="">
                        <i class="material-icons-outlined">email</i>
                    </span>
                     <span class="full-label">Email Reminder</span>
                     
                  </a>
                </li>
                <li>
                 <a class="nav-link " href="http://fincrm.net/finnovaadvisory/#SMSReminder" title="SMS Reminder" >
                     <span class="short-label" title="SMS Reminder" style="">
                        <i class="material-icons-outlined">sms</i>
                    </span>
                     <span class="full-label">SMS Reminder</span>
                     
                  </a>
                </li>
             </ul> 
        </li>    
        <li  class="portal_hide">
            <a class="nav-link collapsed" href="client/res/templates/dailysheet/daily-sheet" target="_blank  data-toggle="collapse" data-target="#collapsedocument" aria-expanded="false" aria-controls="collapsedocument" title="Dailysheet">
              <span class="full-label">Dailysheet</span>
                    <span class="short-label" title="Document Manager" style="">
                        <i class="material-icons-outlined">create_new_folder</i>
                    </span>
            </a>
          
        </li>
        
          
             <li class="entitymore portal_hide dropdown more">
                <a id="nav-more-tabs-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#">
                     <span class="full-label">My Entities</span>
                    <span class="short-label" title="My Entities" style="">
                        <i class="material-icons-outlined">dns</i>
                    </span>
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
            

           <li  class="portal_hide">
            <a class="nav-link collapsed" href="client/res/templates/Document_Manager4/index.php" target="_blank  data-toggle="collapse" data-target="#collapsedocument" aria-expanded="false" aria-controls="collapsedocument" title="Document Manager">
              <span class="full-label">Documents</span>
                    <span class="short-label" title="Document Manager" style="">
                        <i class="material-icons-outlined">create_new_folder</i>
                    </span>
            </a>
          
        </li>
        


             <li  class="portal_hide">
            <a class="nav-link collapsed" href="client/res/templates/report/status-lead-report" target="_blank" data-toggle="collapse" data-target="#collapsereport" aria-expanded="false" aria-controls="collapsereport" title="Reports">
              <span class="full-label">Reports</span>
                    <span class="short-label" title="Reports" style="">
                        <i class="material-icons-outlined">assignment</i>
                    </span>
            </a>
			</li>


         {{!--<li class="entitymore portal_hide" style="margin-bottom: 40px;">
                <a id="nav-more-tabs-dropdown" class="entityicon" data-toggle="collapse" data-target="#myentity" aria-expanded="false" aria-controls="myentity" title="My Entities">
                <span class="full-label">My Entities
                       
                </span>
                    <span class="short-label" title="My Entities" style="">
                        <i class="material-icons-outlined">dns</i>
                    </span>

                    <span style="float: right; padding-right: 4px;">  <i class="fas fa-angle-right rotate1"></i></span>
                </a>
                <ul id="myentity" class="reportdrop collapse submenu" aria-labelledby="nav-more-tabs-dropdown" >
                    {{#each tabDefsList}}
                {{#if isInMore}}
                    <li data-name="{{name}}" class="in-more tab">
                        <a href="{{link}}" class="nav-link"{{#if color}} style="border-color: {{color}}"{{/if}} title="{{label}}">
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
                            <span class="full-label1">{{label}}</span>
                        </a>
                    </li>
                {{/if}}
                {{/each}}
                </ul>
            </li>--}}
            
            
          
            
            
            <li class="dropdown more portal_hide" id="masterList" style:"display:block;">
                <a id="nav-more-tabs-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="full-label">Master </span>
                    <span class="short-label" title="Master" style="">
                       <i class="material-icons-outlined">pages</i>
                    </span>
                </a>
                <ul class="masterdrop dropdown-menu submenu" role="menu" aria-labelledby="nav-more-tabs-dropdown">
                  <li data-name="DefaultSettings">
                 <a class="nav-link " href="client/res/templates/Users Settings/userSettings.php" onclick="" title="Users Settings">
                     <span class="short-label" title="Default Settings" style="">
                        <i class="material-icons-outlined">build</i>
                    </span>
                     <span class="full-label">Default Settings</span>
                     
                  </a>
                </li>
                <script>
                    function pop_upForUserSettngs(url){
                        var url="client/res/templates/Users Settings/userSettings.php";
                        window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=900,height=700,directories=no,location=no') 
                    }
                    </script>
                <li data-name="RegisteredUsers">
                 <a class="nav-link " href="client/res/templates/userLists.php" title="Registered Users">
                     <span class="short-label" title="Registered Users" style="">
                        <i class="material-icons-outlined">supervised_user_circle</i>
                    </span>
                     <span class="full-label">Registered Users</span>
                     
                  </a>
                </li>
                <li data-name="OfficeLocation">
                 <a class="nav-link " href="http://fincrm.net/finnovaadvisory/#OfficeLocation" title="Office Location">
                     <span class="short-label" title="Office Location" style="">
                        <i class="material-icons-outlined">room</i>
                    </span>
                     <span class="full-label">Office Location</span>
                     
                  </a>
                </li>
                </ul>
            </li>

            
            <a class="minimizer" href="javascript:">
             <span class="fas fa-chevron-right right" style="position: relative;
    left: 4px;top: -5px;"></span>
            <span class="fas fa-chevron-left left" style="position: relative;
    left: 80px;"></span>
            </a>



			
           

          


        </ul>
        <ul class="nav navbar-nav navbar-right">
             <li class="nav navbar-nav navbar-form global-search-container pull-left" title="search">
                {{{globalSearch}}}
            </li>

           {{!-- <li class="search-global1">
              <a class="btn btn-link " id="add_dashlet1"><i class="material-icons-outlined">subject</i></a>
            </li>

            <li class="search-global2">
                {{#unless layoutReadOnly}}
                <span class=" pull-right dashboard-buttons1">
                     <a class="btn-link" data-action="addDashlet" title="{{translate 'Add Dashlet'}}" style="padding:3px; color:#0f243f;cursor:pointer;"><i class="material-icons-outlined">add</i></a>
                    <a class="btn-link" data-action="editTabs" title="{{translate 'Edit Dashboard'}}" style="padding:3px;color:#0f243f;cursor:pointer;"><i class="material-icons-outlined">edit</i></a>
                   
                </span>
                {{/unless}}

                {{#ifNotEqual dashboardLayout.length 1}}
                <div class="btn-group pull-right dashboard-tabs">
                    {{#each dashboardLayout}}
                        <button class="btn btn-default{{#ifEqual @index ../currentTab}} active{{/ifEqual}}" data-action="selectTab" data-tab="{{@index}}">{{name}}</button>
                    {{/each}}
                </div>
                {{/ifNotEqual}}
            </li>
           
           <script>
              $(".dashboard-buttons1").hide();
                $("#add_dashlet1").click(function(){
                  $(".dashboard-buttons1").toggle();

                  if ($(this).find('i').text() == 'subject'){
                      $(this).find('i').text('filter_list');
                  } else {
                      $(this).find('i').text('subject');
                  }  
                });
          </script>

          --}}

            <li class="upgrade-btn" title="Upgrade Now">
               <span>15 Days of Trial Remaining<span>
                <a class="btn btn-orange_upgrade" href="#">UPGRADE NOW</a>
            </li>
            
           
          <li class="menu-container1" title="Refresh" style="float:left;">
                <a href="javascript:void(0);" onclick="refreshPage()" title="Refresh">
                <i class="material-icons-outlined">sync</i></a>
            </li>
            <script>
              function refreshPage(){
                
                window.location.reload();
              }
            </script>

            <li class="dropdown notifications-badge-container" title="Notifications">
                {{{notificationsBadge}}}
            </li>

              {{#if enableQuickCreate}}
            <li class="dropdown hidden-xs quick-create-container" title="quickCreateList" style="margin-right:10px;">
                <a id="nav-quick-create-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="material-icons-outlined">
                add</i></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="nav-quick-create-dropdown">
                    <li class="dropdown-header">{{translate 'Create'}}</li>
                    {{#each quickCreateList}}
                    <li><a href="#{{./this}}/create" data-name="{{./this}}" data-action="quick-create">{{translate this category='scopeNames'}}</a></li>
                    {{/each}}
                </ul>
            </li>
            {{/if}}


           
            <li class="dropdown menu-container" title="Menu" style="margin-right:20px;">
                <a id="nav-menu-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#" title="{{translate 'Menu'}}">
                <i class="material-icons-outlined">account_circle</i></a>
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
</div>

<div class="container"> 
  <!-- Modal -->
  <div class="modal fade" id="SMSModal" role="dialog">
    <div class="modal-dialog model-width">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">SMS Reminder</h4>
        </div>
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
                          <div class="input-group date" data-date-format="dd.mm.yyyy">
                              <input  type="text" id="date1" name="date" class="form-control" placeholder="Select Date" required onchange="checkDate1()">
                              <div class="btn-default_gray input-group-addon" >
                                <span class="glyphicon glyphicon-calendar"></span>
                              </div>
                          </div>  
                      </div>    
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                   <div class="clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true"> 
                  <input type="text" required id="time1" name="time" placeholder="Select Time" class="form-control" onchange="checkTime1()"/>
                  <span class="btn-default_gray input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
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
  
</div>

<div class="container"> 
  <!-- Modal -->
  <div class="modal fade" id="EmailModal" role="dialog">
    <div class="modal-dialog model-emailwidth">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Email Reminder</h4>
        </div>
        <div class="modal-body">
          <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 ">
            <form action="client/res/templates/SaveEmailReminder.php" enctype="multipart/form-data" method="post">
            <!-- <h2 class="text-center">Email Reminder</h2> -->
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="input-group">
                  <!-- <label>Date:</label> -->
                  <input class="form-control" required date-format="dd/mm/yyyy"  id="date" name="date" placeholder="Select Date" type="text" onchange="checkDate()"/>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <!-- <label>Email:</label> -->
                <div class="clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                <input type="text" required  name="time" id="time" placeholder="Select Time" class="form-control" onchange="checkTime()"/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
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
                    
                    <input type="file"  class="file-input hide" multiple name="attachment[]" onblur="getFileInfo()" id="file-input"/>
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
  
</div>
<script >

  $('#header ul.tabs>li>a').click(function(){
    $('#header ul.tabs>li>a').removeClass('dashboard');
    $(this).addClass('dashboard');

  });
</script>
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
        $('.input-group.date').datepicker({format: "dd/mm/yyyy"}); 
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
                  url: '../../client/res/templates/saveSMSReminder.php',
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
          $('.filename-container').append("<span  class='filename'>" + $file + "</span>").show();
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
	   //  alert("Hii");
        count++;
     //   alert("COUNT => "+ count);
        if(count=="2"){
          var selectedText = document.getElementById("date").value;
          var parts =selectedText.split('/');
          var selectedText= parts[1]+"-"+parts[0]+"-"+parts[2];
          var selectedDate = new Date(selectedText);
          var now = new Date();
      //    alert("SELECTED DATE => "+selectedDate);
      //    alert("CURRENT DATE => "+now);
          now.setDate(now.getDate() - 1);
          if (now > selectedDate) {
            $.alert({
                  title: 'Alert!',
                  content: 'Reminder can not be set for a past date',
                  type: 'dark',
                  typeAnimated: true,
              });
           
            document.getElementById('date').value='';
            count=0;
          }else{
              count=0;
          }
        }
        
      }


      function checkTime(){
        //alert("HIII");
        var selectedText1 = document.getElementById('date').value;
        
        if(selectedText1==""){
            $.alert({
                  title: 'Alert!',
                  content: 'Please select date first',
                   type: 'dark',
                   typeAnimated: true
              });
           // alert("Please select date first");
            document.getElementById('time').value="";
        }
        
        var parts1 =selectedText1.split('/');
		var selectedText1= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
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
      function checkTime1(){
        //alert("HIII");
        var selectedText1 = document.getElementById('date1').value;
        
        if(selectedText1==""){
            $.alert({
                  title: 'Alert!',
                  content: 'Please select date first',
                   type: 'dark',
                   typeAnimated: true
              });
           // alert("Please select date first");
            document.getElementById('time1').value="";
        }
        
        var parts1 =selectedText1.split('/');
		var selectedText1= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
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


       var count=0;
      function checkDate1() {
    //alert("Hii");
        count++;
        //alert("COUNT => "+ count);
        if(count=="2"){
          var selectedText = document.getElementById("date1").value;
          var parts =selectedText.split('/');
		   var selectedText= parts[1]+"-"+parts[0]+"-"+parts[2];
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
            count=0;
          }else{
              count=0;
          }
        }
        
      }

    </script>
    
<script>
  $(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'dd/mm/yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
      orientation: "top" 
    })
  })
</script>

    <script type="text/javascript">
       $('.clockpicker').clockpicker();
    </script>

{{!--<script>
   $(".manageicon").click(function(){
         $(".rotate").toggleClass("down");
    })

    $(".entityicon").click(function(){
        $(".rotate1").toggleClass("down1");
    })

    $(".master").click(function(){
        $(".rotate2").toggleClass("down2");
    })

     $(".finance").click(function(){
        $(".rotate3").toggleClass("down3");
    })
    
     $(".reminder").click(function(){
        $(".rotate4").toggleClass("down3");
    })
    
    
</script> --}}