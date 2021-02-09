<script type="text/javascript">
     var afterhash = window.location.hash;
      if(afterhash =='#ClosedTask')
    {
      $("#create_record").css("display","none");
    }
</script>
<!-- Change password button in user profile page script Start -->
<script type="text/javascript">
$( document ).ready(function(){
  $.ajax({
        url: "../../../client/res/templates/header-forUser/header_forUser_controller.php",
        type: "get",
        async: false,
        success: function(result)  {
          //alert(result);
        if(result == 'user'){
          var user_view = window.location.href; 
          user_view.indexOf(0);
          user_view.toLowerCase();
          user_view = user_view.split("/")[3];
          //alert(user_view);
          if(user_view == '#User'){
            $('.edit_detail_page').css("display","none");
            $('.changed_pass').css("display","inline-block");
          }
        }
        }

    });
});
</script>
<!-- Change password button in user profile page script End -->
<div class="detail" id="{{id}}">
    {{#unless buttonsDisabled}}
    <div class="detail-button-container button-container record-buttons clearfix">
        <div id="test" class="btn-group actions-btn-group" role="group">
            <a href="javascript:" class="action" data-action="changePassword"><button class="btn btn-primary action changed_pass" data-action="" type="button" style="display: none;">Change Password</button></a>
            {{#each buttonList}}{{button name scope=../../entityType label=label style=style hidden=hidden html=html}}{{/each}}
            {{#if dropdownItemList}}
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-item-list-button{{#if dropdownItemListEmpty}} hidden{{/if}} edit_detail_page" data-toggle="dropdown">
                <span class="caret"></span>
                <!-- <span class="fas fa-ellipsis-h"></span> -->
            </button>
            <ul class="dropdown-menu pull-left">
                {{#each dropdownItemList}}
                {{#if this}}
                <li class="{{#if hidden}}hidden{{/if}}"><a href="javascript:" class="action" data-action="{{name}}" {{#each data}} data-{{@key}}="{{./this}}"{{/each}}>{{#if html}}{{{html}}}{{else}}{{translate label scope=../../../entityType}}{{/if}}</a></li>
                {{else}}
                    {{#unless @first}}
                    {{#unless @last}}
                    <li class="divider"></li>
                    {{/unless}}
                    {{/unless}}
                {{/if}}
                {{/each}}
            </ul>
            {{/if}}
        </div>
        {{#if navigateButtonsEnabled}}
        <div class="pull-right">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default btn-icon action {{#unless previousButtonEnabled}} disabled{{/unless}}" data-action="previous" title="{{translate 'Previous Entry'}}">
                    <span class="fas fa-chevron-left"></span>
                </button>
                <button type="button" class="btn btn-default btn-icon action {{#unless nextButtonEnabled}} disabled{{/unless}}" data-action="next" title="{{translate 'Next Entry'}}">
                    <span class="fas fa-chevron-right"></span>
                </button>
            </div>
        </div>
        {{/if}}
        <!-- <button type="button" id="oppurtunity_form1" class="btn btn-primary " data-toggle="modal" data-target="#oppurtunity_form" style="float:right;display:none;margin-right: 10px;"> Convert to Opportunity</button>

         <button type="button" id="cac" class="btn btn-primary" style="float:right;display:none;margin-right: 10px;"> Convert to Account & Contact</button>
          -->
         <a href="javascript:" class="btn btn-default action convertLeadsButton" data-name="convert" data-action="convert">Convert</a>

        <div id="closing_status" style="display:none">
            <span class="btn btn-default">Pending for closure</span>
        </div>

       <!--  <button id="copy" class="btn btn-default"  data-target="#copyData" style="position:relative;  left:5px;" onclick="callCopyEntityPage()" >Copy</button> -->


        <button class="btn btn-default" id="closed" style="position:relative;display:none" onclick="update_status()" >Mark Closed</button>

      

        <button class="btn btn-default" id="started" style="position:relative;display:none;" onclick="started_update_status()" >Mark Started</button>

         <button class="btn btn-default" id="completed" style="position:relative;display:none;" onclick="completed_update_status()" >Mark Completed</button>
    </div>
    <div class="detail-button-container button-container edit-buttons hidden clearfix">
        <div class="btn-group actions-btn-group" role="group">
        {{#each buttonEditList}}{{button name scope=../../entityType label=label style=style hidden=hidden html=html}}{{/each}}
        {{#if dropdownEditItemList}}
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="fas fa-ellipsis-h"></span>
        </button>
        <ul class="dropdown-menu pull-left">
            {{#each dropdownEditItemList}}
            {{#if this}}
            <li class="{{#if hidden}}hidden{{/if}}"><a href="javascript:" class="action" data-action="{{name}}">{{#if html}}{{{html}}}{{else}}{{translate label scope=../../../entityType}}{{/if}}</a></li>
            {{else}}
                {{#unless @first}}
                {{#unless @last}}
                <li class="divider"></li>
                {{/unless}}
                {{/unless}}
            {{/if}}
            {{/each}}
        </ul>
        {{/if}}
        </div>
         
    </div>
    {{/unless}}

    <div class="row">
        <div class="left{{#if isWide}} col-md-12{{else}}{{#if isSmall}} col-md-7{{else}} col-md-8{{/if}}{{/if}}">
            <div class="middle">{{{middle}}}</div>
            <div class="extra">{{{extra}}}</div>
            <div class="bottom">{{{bottom}}}</div>
        </div>
        <div class="side{{#if isWide}} col-md-12{{else}}{{#if isSmall}} col-md-5{{else}} col-md-4{{/if}}{{/if}}">
        {{{side}}}
        </div>
    </div>
</div>

<input type="hidden" name="deleted_gst_ids" id="deleted_gst_ids" value="" />
<!-- Convert to opportunity modal -->
<!-- Modal -->
  <div class="modal fade" id="oppurtunity_form" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Convert to Opportunity</h4>
        </div>
        <div class="modal-body" style="padding-top:0px;">
    <form action="client/res/templates/lead_opportunity_changes/save_oppurtunity.php" method="post" enctype='multipart/form-data' id="convertToOpportunity">
        <input type="hidden"  name="lead_id" id="lead_id" class="form-control" placeholder="" >

          <div class="">
              <div class="row">
                <div class="col-md-12">
                  <div class="">
                    <button type="submit" id="generate" class="btn btn-primary">Convert</button>
                   <!--  <button type="button" class="btn btn-default">Cancel</button> -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                    <h4>Details</h4>
                  </div>
                </div>
              </div>

              
          
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label >Project Name <span class="text-danger">*</span></label>
                      <input type="text"  name="name" id="" class="form-control" placeholder="Name" required>
                   </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label >Stage <span class="text-danger">*</span></label>
                        <select name="stage" id="stage" class="form-control" placeholder="Stage" required>
                                <option value="Prospecting" selected="">Prospecting</option>
                                <option value="Qualification">Qualification</option>
                                <option value="Proposal">Proposal</option>
                                <option value="Negotiation">Negotiation</option>
                                <option value="Closed Won">Closed Won</option>
                                <option value="Closed Lost">Closed Lost</option>
                        </select>
                   </div>
                </div>
              </div>



               <div class="row" id="" style="">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Amount <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <input id="" type="text" class="form-control" name="amount" placeholder="" required>
                        <span class="input-group-addon" style="padding: 0px;border:none">
                        <select name="amount_sign" style="padding: 5px 3px;border-color: #d1d5d6;border-radius: 5px;">
                          <option>INR</option>
                        </select>
                        </span>
                        
                      </div>
                   </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label >Probability % <span class="text-danger">*</span></label>
                      <input type="text"  name="probability" id="probability" class="form-control" value="10" placeholder="Probability" required>
                   </div>
                </div>
              </div>



              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label >Close Date <span class="text-danger require">*</span></label>
                      <div class="input-group date" data-date-format="dd.mm.yyyy">
                       <input value=""  type="text" id="closeddate" name="closeddate" class="form-control" placeholder="Select Date"  onkeydown="return false;">
                          <div class="input-group-addon btn btn-default_gray" >
                              <i class="material-icons-outlined">date_range</i>
                          </div>
                      </div>

                    <script>
                          $( function() {
                            $( "#closeddate" ).datepicker({format: "dd/mm/yyyy",
                              autoclose: true, 
                              todayHighlight: true,
                              changeMonth: true,
                              changeYear: true,
                            });
                          } );
                    </script>
                   </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                     <label for="">Description</label>
                      <textarea  type="text" value=""  name="description" id="description" class="form-control" placeholder="" ></textarea>
                   </div>
                </div>
              </div>


                <div class="row">
                <div class="col-md-12">
                  <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                    <h4>Account Details</h4>
                  </div>
                </div>
              </div>



                <div class="row" id="" style="">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Account Name</label>
                      <input type="text"  name="AccountName" id="AccountName" class="form-control" placeholder="Account Name">
                   </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label >Contact Person</label>
                      <input type="text"  name="ContactPerson" id="ContactPerson" class="form-control" placeholder="Contact Person">
                   </div>
                </div>
              </div>

              <div class="row" id="" style="">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Email</label>
                      <input type="email"  name="Email" id="email" class="form-control" placeholder="Email">
                   </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label >Phone</label>
                      <input type="text"  name="Phone" id="phone" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Phone">
                   </div>
                </div>
              </div>



              <div class="row" id="" style="">
                <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                <label for="">Address</label>
                                  <input type="text"  name="Street" id="street" class="form-control" placeholder="Street">
                               </div>
                        </div>
                     </div>
                  
                   <div class="row">
                      <div class="col-md-4" style="padding-right: 0px;">
                          <div class="form-group">
                            <input type="text"  name="city" id="city" class="form-control" placeholder="City" >
                          </div>
                      </div>
                       <div class="col-md-4" style="padding-right: 0px;">
                          <div class="form-group"> 
                             <input type="text"  name="state" id="state" class="form-control" placeholder="State" >
                          </div>
                      </div>
                       <div class="col-md-4">
                          <div class="form-group">
                            <input type="text"  name="postal_code" id="postal_code" class="form-control postal_code" placeholder="Postal Code" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  onblur="postal_code()">
                          </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text"  name="country" id="country" class="form-control" placeholder="Country">
                               </div>
                        </div>
                     </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label >Website</label>
                      <input type="text"  name="Website" id="Website" class="form-control" placeholder="Website">
                   </div>
                </div>
              </div>
            </div>
            </form>
      </div>
    </div>
  </div>
 </div>


 <script type="text/javascript">
   $('#convertToOpportunity').bootstrapValidator({
    
      message: 'Please enter valid input',
          feedbackIcons: { },
          excluded: [':disabled'],
          fields: {
              'name': {
                  validators: {
                      notEmpty: {
                          message: 'Please enter name.'
                      },
                  }
              },
              'stage': {
                  validators: {
                      notEmpty: {
                          message: 'Please select stage.'
                      },
                  }
              },
              'amount': {
                  validators: {
                      notEmpty: {
                          message: 'Please enter amount.'
                      },
                  }
              },
              'probability': {
                  validators: {
                      notEmpty: {
                          message: 'Please enter probability.'
                      },
                  }
              },
              'closeddate': {
                  validators: {
                      notEmpty: {
                          message: 'Please select date.'
                      },
                      date: {
                          format: 'DD/MM/YYYY',
                          message: 'The date format is not valid'
                      },
                  }
              },
          },

    });

   $(document).on('click','#oppurtunity_form .close', function(){
            $('.cell').removeClass('has-success');
            $('.cell').removeClass('has-error');
            $('#convertToOpportunity').bootstrapValidator('resetForm', true);
          });
 </script>
<!-- Convert to opportunity modal -->
<script type="text/javascript">
    $(".detail #test button[data-action='edit']").css("border-top-right-radius","0px");
    $(".detail #test button[data-action='edit']").css("border-bottom-right-radius","0px");
    $(".detail #test button[data-action='access']").css("border-radius","0px");
    $(".detail #test button[data-action='access']").css("margin-left","0px");
    $(".detail #test button[data-action='access']").removeClass("btn-default");
    $(".detail #test button[data-action='access']").addClass("btn-primary");
</script>
<script type="text/javascript">
      /*Changed the UI of action history record detail small in modal script start*/
      
      var abc = $('.detail').attr("id");
      abc.toLowerCase();
      abc1 = abc.split("-").slice(0, -1).join("-");
      //alert(abc1);
      if(abc1 == "action-history-record-detail-small"){
        $('.detail .left').removeClass("col-md-7").addClass("col-md-12");
         $('.modal-footer .btn-group.additional-btn-group').addClass("pull-left");
      }

      /*Changed the UI of action history record detail small in modal script start*/


      var first_view = $(location).attr('href'); 
      //alert(first_view);
      first_view.indexOf(1);
      //alert(first_view);
      first_view.toLowerCase();
      first_view1 = first_view.split("/")[4];
      first_view2 = first_view.split("/")[3];
     /*alert(first_view1);
     alert(first_view2);*/

      var task_view_text = first_view2+"/"+first_view1;
      //alert(task_view_text);
      if(first_view1 == "view"){
        $(".page-header").css("background","transparent");
        $(".page-header").css("padding","15px 0px");
      }

      if(task_view_text == "#Task/view"){
        $(".text-started").css({"background-color":"transparent","padding":"0px","color":"#F0AD4E","font-weight":"600"});
        $(".text-open").css({"background-color":"transparent","padding":"0px","color":"#5BC0DE","font-weight":"600"});
        $(".text-completed").css({"background-color":"transparent","padding":"0px","color":"#5CB85C","font-weight":"600"});
      }
</script>
<script type="text/javascript">
      var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2]; 
$('.text-muted a').addClass('myclass');
if(first=='portal')
{
    
 $('div[data-name="assignedUser"]').addClass('myclass');
 $('.myclass a').removeAttr('href');

 $('span[data-name="createdBy"]').addClass('myclass');
 $('.myclass a').removeAttr('href');

 $('span[data-name="modifiedBy"]').addClass('myclass');
 $('.myclass a').removeAttr('href');

 $('span .text-muted').addClass('myclass');
 $('.myclass a').removeAttr('href');
 
 $('span[data-name="assignedUser"]').addClass('myclass');
 $('.myclass a').removeAttr('href');
}
</script> 
<style>
    .copyEntity{
        width:500px;
    }
   
</style>
<script>

var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2];

        $(document).ready(function() {

 
         if(first=='portal')
        {
        
            $("#test").css("display","none");
        }
       
        

        else
        {

        var afterhash = window.location.hash;
        afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];
      if(afterhash=='#Task' || afterhash=='#ClosedTask' )
      {

        $.ajax({url: "../../client/src/views/record/edit_icon_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
            $("#test").css("display","inline-block");
            $("#test").css("margin-left","0px");
        }
        else if(result==0)
        {
            $("#test").css("display","none");
        }
       
        }

        });
        }else{
          $("#test").css("display","inline-block");  
          $("#test").css("margin-left","0px");
        }
        }


        if(first=='portal')
        {
        
            $("#copy").css("display","none");
          
        }      
        else
        {

                var afterhash = window.location.hash;
                afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];
               // alert(afterhash);
if(afterhash=='#Task')
{
        $.ajax({url: "../../client/src/views/record/copy_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
           
            $("#copy").css("display","inline-block");
           
        }
        else if(result==0)
        {
            $("#copy").css("display","none");
          
           

        }
       
        }

        });
        }
        }

         if(first=='portal')
        {
                var afterhash = window.location.hash;
                afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];

if(afterhash=='#Task')
{
                 $.ajax({url: "../../client/src/views/record/closed_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
            $("#closed").css("display","inline-block");

           

           
        }
        else if(result==0)
        {
            $("#closed").css("display","none");

        }
       
        }

        });
        }
        }
        else
        {
                var afterhash = window.location.hash;
                afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];



if(afterhash=='#Task')
{

         $.ajax({url: "../../client/src/views/record/closed_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
            $("#closed").css("display","inline-block");
   
        }
        else if(result==0)
        {
            $("#closed").css("display","none");

        }
       
        }

        });

        }
        }

        if(first=='portal')
        {
                var afterhash = window.location.hash;
                afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];
if(afterhash=='#Task')
{
         $.ajax({url: "../../client/src/views/record/disabled_closed_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
            $("#status_closed").css("display","inline-block");
        }
        else if(result==0)
        {
            $("#status_closed").css("display","none");

        }
       
        }

        });    
        }
        }

        else
        {
                var afterhash = window.location.hash;
                afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];
if(afterhash=='#Task')
{

        $.ajax({url: "../../client/src/views/record/disabled_closed_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
            $("#status_closed").css("display","inline-block");
        }
        else if(result==0)
        {
            $("#status_closed").css("display","none");

        }
       
        }

        });
        }
        }

         if(first=='portal')
        {
                var afterhash = window.location.hash;
                afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];
if(afterhash=='#Task')
{
            $.ajax({url: "../../client/src/views/record/closing_status_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
            $("#closing_status").css("display","inline-block");
           
        }
        else if(result==0)
        {
            $("#closing_status").css("display","none");
        }
       
        }

        });
        }
}
        else
        {

        var afterhash = window.location.hash;
        afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];
if(afterhash=='#Task')
{
        $.ajax({url: "../../client/src/views/record/closing_status_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
            $("#closing_status").css("display","inline-block");
           
        }
        else if(result==0)
        {
            $("#closing_status").css("display","none");
        }
       
        }

        });
        
        }
}

  if(first=='portal') 
        {
        var afterhash = window.location.hash;
        afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];
if(afterhash=='#Task')
{
 $.ajax({url: "../../client/src/views/record/started_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
            $("#started").css("display","inline-block")
           
        }
         else if(result==2)
        {
            $("#started").css("display","none")
           
        }
        else if(result==0)
        {
            $("#started").css("display","none")
           
        }
       
        }

        });
        }
}
        else
        {

        var afterhash = window.location.hash;
        afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];
if(afterhash=='#Task')
{

 $.ajax({url: "../../client/src/views/record/started_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
            $("#started").css("display","inline-block")
           
        }
         else if(result==2)
        {
            $("#started").css("display","inline-block");
           
        }
        else if(result==0)
        {
            $("#started").css("display","none")
           
        }
       
        }

        });
        }

}
  if(first=='portal')
        {
                var afterhash = window.location.hash;
                afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];
if(afterhash=='#Task')
{
$.ajax({url: "../../../../client/src/views/record/completed_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
            $("#completed").css("display","inline-block")
           
        }
        else if(result==2)
        {
          $("#completed").css("display","none");
           
        }
        else if(result==0)
        {
            $("#completed").css("display","none")
           
        }
       
        }

        });
        }
        }

        else
        {
                var afterhash = window.location.hash;
                afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];
if(afterhash=='#Task')
{
$.ajax({url: "../../client/src/views/record/completed_show_hide.php", success: function(result)
        {
    
        if(result==1)
        {
            $("#completed").css("display","inline-block")
           
        }
        else if(result==2)
        {
          $("#completed").css("display","none")
           
        }
        else if(result==0)
        {
            $("#completed").css("display","none")
           
        }
       
        }

        });
        }
        }
          });

    function callCopyEntityPage(){
        //alert("HIII");
        window.location="client/src/views/Copy-Entity-fields/copyFields.php";
        //window.location="html/copyFields.php";
    }

    
    function update_status()
    {

     if(first=='portal')
        {

$.confirm({
        title: 'Warning!',
        content: 'Are you sure, you want to close the task',
            buttons: {
        Yes: function () {

   $.ajax({url: "../../../../client/res/templates/Task_Changes/update_status.php", success: function(result)
            {
            if(result==1)
            {

             

                   $.confirm({
        title: 'Success!',
        content: 'Status updated!',
            buttons: {
        Ok: function () {
           // window.location.href = "espocrmtest1.com/#Task";
           window.location.href = "/#Task";
            }
        }

    });
               

               
            }
            else if(result==0)
            {


                $.confirm({
        title: 'Failed!',
        content: 'Status not updated!',
            buttons: {
        Ok: function () {
            window.location.reload();
        }
        }
    });
            }         
            }

            });
            },
            No: function () {
            //close
        },

        }
        });
        }

        else
        {





$.confirm({
        title: 'Warning!',
        content: 'Are you sure, you want to close the task',
            buttons: {
        Yes: function () {
            
             $.ajax({url: "../../client/res/templates/Task_Changes/update_status.php", success: function(result)
            {
            if(result==1)
            {

             

                   $.confirm({
        title: 'Success!',
        content: 'Status updated!',
            buttons: {
        Ok: function () {
           window.location.href = "/#Task";
           // window.location.href = "espotest1.com/#Task";

            }
        }

    });
               

               
            }
            else if(result==0)
            {
                $.confirm({
        title: 'Failed!',
        content: 'Status not updated!',
            buttons: {
        Ok: function () {
            window.location.reload();
        }
        }
    });
            }         
            }

            });


            },
            No: function () {
            //close
        },
        }

    });













           
            }
    }

    function started_update_status()
    {

     if(first=='portal')
        {
          $.ajax({url: "../../../../client/res/templates/Task_Changes/started_update_status.php", success: function(result)
            {
            if(result==1)
            {
                $.confirm({
        title: 'Success!',
        content: 'Status updated!',
            buttons: {
        Ok: function () {
            window.location.reload();
            }
        }

    });
               
               
            }
            else if(result==0)
            {
               $.confirm({
        title: 'Failed!',
        content: 'Status not updated!',
            buttons: {
        Ok: function () {
            window.location.reload();
        }
        }
    });

            }         
            }

            });
        }

        else
        {


            $.ajax({url: "../../client/res/templates/Task_Changes/started_update_status.php", success: function(result)
            {
            if(result==1)
            {
                $.confirm({
        title: 'Success!',
        content: 'Status updated!',
            buttons: {
        Ok: function () {
            window.location.reload();
            }
        }

    });
               
               
            }
            else if(result==0)
            {
               $.confirm({
        title: 'Failed!',
        content: 'Status not updated!',
            buttons: {
        Ok: function () {
            window.location.reload();
        }
        }
    });

            }         
            }

            });
            }
    }

    function completed_update_status()
    {

     if(first=='portal')
        {
            $.ajax({url: "../../../../client/res/templates/Task_Changes/completed_update_status.php", success: function(result)
            {
            if(result==1)
            {
               $.confirm({
        title: 'Success!',
        content: 'Status updated!',
            buttons: {
        Ok: function () {
            window.location.reload();
            }
        }

    });
               
               
            }
            else if(result==0)
            {
                $.confirm({
        title: 'Failed!',
        content: 'Status not updated!',
            buttons: {
        Ok: function () {
            window.location.reload();
        }
        }
    });

            }         
            }

            });
        }

        else
        {

            $.ajax({url: "../../client/res/templates/Task_Changes/completed_update_status.php", success: function(result)
            {
            if(result==1)
            {
               $.confirm({
        title: 'Success!',
        content: 'Status updated!',
            buttons: {
        Ok: function () {
            window.location.reload();
            }
        }

    });
               
               
            }
            else if(result==0)
            {
                $.confirm({
        title: 'Failed!',
        content: 'Status not updated!',
            buttons: {
        Ok: function () {
            window.location.reload();
        }
        }
    });

            }         
            }

            });
            }
    }
</script>
<script>
    
    var afterhash = window.location.hash;
    afterhash.indexOf(0);
    afterhash.toLowerCase();
    afterhash = afterhash.split("/")[0];
    if(afterhash=='#Lead'){
        //var val=$('.text-success').innerText;
        var val= $('.text-success').html();
        if(val=='Converted'){
            //$('#oppurtunity_form1').css("display","none");
            $("#oppurtunity_form1").attr("disabled", true);
            // alert(val);
        }
       
    }
    //var val2=$('div[data-name="stage"] .text-danger').html();
    //alert(val2);
   // alert(afterhash);
   if(afterhash=='#Opportunity'){
       var val1=$('.text-success').html(); 
       //alert(val1);
       var val2=$('div[data-name="stage"] .text-danger').html();
      // alert(val2);
       if(val1=='Closed Won'){
            $("#cac").attr("disabled",true);
       }
       if(val2=="Closed Lost"){
            $("#cac").attr("disabled",true);
       }
       
   }
    
    
        
    // $('div[data-name="assignedUser"] a').addClass('myclass');
    // $('span[data-name="createdBy"] a').addClass('myclass');
    // $('span[data-name="modifiedBy"] a').addClass('myclass');
//    $('span .text-muted').addClass('myclass');

    // $(".myclass").click(function(){
    //     var val1= $(this).attr('href');
    //     //alert(val1);

    //      $.ajax({
    //       url: "../../client/res/templates/record/getDeletedUserList.php", 
    //      data:{id:val1},
    //     success: function(result)
    //     {
    //         if(result==1){
    //             $.alert({
    //                 title: 'Warning!',
    //                 content: 'User deleted',
    //                 type: 'dark',
    //                 typeAnimated: true
    //             });

    //               window.location.href='#Task';
    //         }else{

    //         }
       
    //     }

    //     });
        
    // });
    

</script>

<script>
var hash=window.location.hash;
hash.indexOf(2);
hash.toLowerCase();
hash = hash.split("/")[2];
//alert(hash);
var afterhash=window.location.hash;
afterhash.indexOf(0);
afterhash.toLowerCase();
afterhash = afterhash.split("/")[0];

if(afterhash=='#Lead')
{
    $("#oppurtunity_form1").css("display","inline-block");

    $.ajax({
    url: "../../client/res/templates/lead_opportunity_changes/fetch_lead_data.php?id="+hash,
    type: "post", 
    dataType: 'json',
    async: false,
    success: function(result)
    {
      var len=result.length;
      for (var i = 0; i < len; i++) 
      {
            $("#AccountName").val(result[i].AccountName);
            $("#ContactPerson").val(result[i].ContactPerson);
            $("#email").val(result[i].email);
            $("#phone").val(result[i].phone);
            $("#street").val(result[i].street);
            $("#city").val(result[i].city);
            $("#state").val(result[i].state);
            $("#postal_code").val(result[i].postal_code);
            $("#country").val(result[i].country);
            $("#Website").val(result[i].Website);
            $("#lead_id").val(result[i].lead_id);

      }
    }
    })
}


</script>
 <script>
    var afterhash=window.location.hash;
        afterhash.indexOf(0);
        afterhash.toLowerCase();
        afterhash = afterhash.split("/")[0];

        if(afterhash=='#Opportunity')
        {

            $("#cac").css("display","inline-block");
        }


    $("#cac").click(function(){

        var hash=window.location.hash;
        hash.indexOf(2);
        hash.toLowerCase();
        hash = hash.split("/")[2];

        var folder_name = window.location.pathname;
        folder_name.indexOf(1);
        folder_name.toLowerCase();
        folder_name = folder_name.split("/")[1];

        var domain_name=window.location.hostname; 
        var site_protocal=window.location.protocol;

        $.ajax({
          type    : "GET",
          url     : '../../../../client/res/templates/lead_opportunity_changes/convert_account_contact.php?id='+hash,
          dataType  : "json",
          processData : false,
          contentType : false,
          success: function(data)
          {
            $.alert({
                title: 'Alert!',
                content: data.msg,
                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                buttons: {
                Ok: function () {
                    window.location = site_protocal + '/#Account';
                    }
                }
            });
          }
        });
        //window.location='http://'+domain_name+'/'+folder_name+'/client/res/templates/lead_opportunity_changes/convert_account_contact.php?id='+hash; 
    });
    </script>

 
<!-- TASK EDIT START & DUE DATE VALIDATION -->

<script >


    $(document).on("click", "div[data-name='dateStart'] .fa-pencil-alt, div[data-name='dateEnd'] .fa-pencil-alt, div[data-name='endDate'] .fa-pencil-alt, div[data-name='startDate'] .fa-pencil-alt, div[data-name='weeklyendDate'] .fa-pencil-alt, div[data-name='weeklystartDate'] .fa-pencil-alt, div[data-name='monthlyEndDate'] .fa-pencil-alt, div[data-name='monthlyStartDate'] .fa-pencil-alt, div[data-name='customStartDate1'] .fa-pencil-alt, div[data-name='customStartDate2'] .fa-pencil-alt, div[data-name='customStartDate3'] .fa-pencil-alt, div[data-name='customStartDate4'] .fa-pencil-alt, div[data-name='customStartDate5'] .fa-pencil-alt, div[data-name='customStartDate6'] .fa-pencil-alt ",function(){
       
        setTimeout(
          function() 
          {
              
            $("input[data-name='dateEnd'], input[data-name='dateStart'], input[data-name='endDate'], input[data-name='startDate'], input[data-name='weeklyendDate'], input[data-name='weeklystartDate'], input[data-name='monthlyEndDate'], input[data-name='monthlyStartDate'], input[data-name='customStartDate1'], input[data-name='customStartDate2'], input[data-name='customStartDate3'], input[data-name='customStartDate4'], input[data-name='customStartDate5'], input[data-name='customStartDate6']").attr("readonly","readonly");

          }, 10);
    });

    // <!-- dateEnd validation script start -->
    var count=0;
    $(document).on("change","input[data-name='dateEnd']",function(e){
        
        e.stopImmediatePropagation();
        count++;

        if( $("input[data-name=dateStart]").val() != undefined ) {

          var textDateStart   = $("input[data-name=dateStart]").val();
          var stringDateStart = textDateStart.split('/');
          var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );
          
          var textDateEnd     = $("input[data-name=dateEnd]").val();
          var stringDateEnd   = textDateEnd.split('/');
          var formatDateEnd   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

        }else{

          var textDateStart   = $("div[data-name=dateStart] .field").text();
          var stringDateStart = textDateStart.split(' ');
          var stringDateStart = stringDateStart[0].split('/');
          var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );

          var textDateEnd     = $("input[data-name=dateEnd]").val();
          var stringDateEnd   = textDateEnd.split('/');
          var formatDateEnd   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

        }

        // alert("Count : "+count+" | Start date : "+formatDateStart+" | End date : "+formatDateEnd );

        if(count==3){
            if( textDateStart == "" )
            { 
              $.confirm({
                  title: 'Warning!',
                  content: 'Please select start date first',
                  buttons: {
                      Ok: function (){
                          $("input[data-name=dateEnd]").val("");
                          delete(count);
                          count=0;
                      }
                  }
              });
            }
            else{
                if( formatDateStart > formatDateEnd ) {
                    $.confirm({
                        title: 'Warning!',
                        content: 'Please select date greater than start date',
                        buttons: {
                            Ok: function (){
                                $("input[data-name=dateEnd]").val("");
                                delete(count);
                                count=0;
                            }
                        }
                    });
                }
            } 
        }

        if( count >= 3 ) {
            delete(count);
            count=0;
        }
    });
</script>

<script>
    
    // <!-- dateStart validation script start -->
    count1=0;
    $(document).on("change","input[data-name='dateStart']",function(e){

        e.stopImmediatePropagation();
        count1++;

        if( $("input[data-name=dateEnd]").val() != undefined ) {

          var textDateStart   = $("input[data-name=dateStart]").val();
          var stringDateStart = textDateStart.split('/');
          var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );
          
          var textDateEnd     = $("input[data-name=dateEnd]").val();
          var stringDateEnd   = textDateEnd.split('/');
          var formatDateEnd   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

        }else{

          var textDateStart   = $("input[data-name=dateStart]").val();
          var stringDateStart = textDateStart.split('/');
          var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );

          var textDateEnd     = $("div[data-name=dateEnd] .field").text();
          var stringDateEnd   = textDateEnd.split(' ');
          var stringDateEnd   = stringDateEnd[0].split('/');
          var formatDateEnd   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

        }

        var today       = new Date();
        var dd          = String(today.getDate()).padStart(2, '0');
        var mm          = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy        = today.getFullYear();
        var formatTodayDate = Date.parse( mm + ' ' + dd + ' ' + yyyy );

        // alert( "Count : "+count1+" | Start date : "+formatDateStart+" | End date : "+formatDateEnd+" | formatTodayDate : "+formatTodayDate );

        if(count1==3)
        {
            if( formatDateStart < formatTodayDate )
            { 
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select future date',
                    buttons: {
                        Ok: function () {
                            $("input[data-name=dateStart]").val("");
                            delete(count1);
                            count1=0;
                        }
                    }
                }); 
            }else if( textDateEnd != "" && formatDateEnd < formatDateStart ) {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select date less than end date',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=dateStart]").val("");
                            delete(count1);
                            count1=0;
                        }
                    }
                });
            }
        }

        if(count1>=3) { 
            delete(count1);
            count1=0;
        }
    });
</script>

<script>
    
    // <!-- dateEnd-time validation script start -->
    count2=0;
    $(document).on("change","input[data-name='dateStart-time']",function(e){
        
        e.stopImmediatePropagation();
        count2++;
        if( $("input[data-name=dateEnd]").val() != undefined ) {
          
          var textDateStart   = $("input[data-name=dateStart]").val();
          var stringDateStart = textDateStart.split('/');
          var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );
          
          var textDateEnd     = $("input[data-name=dateEnd]").val();
          var stringDateEnd   = textDateEnd.split('/');
          var formatDateEnd   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

          var textStartTime   = $("input[data-name=dateStart-time]").val().replace("pm"," PM").replace("am"," AM");
          var formatStartTime = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2]+" "+textStartTime );

          var textEndTime     = $("input[data-name=dateEnd-time]").val().replace("pm"," PM").replace("am"," AM");
          var formatEndTime   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2]+" "+textEndTime );
        
        }else{

          var textDateStart   = $("input[data-name=dateStart]").val();
          var stringDateStart = textDateStart.split('/');
          var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );

          var textStartTime   = $("input[data-name=dateStart-time]").val().replace("pm"," PM").replace("am"," AM");
          var formatStartTime = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2]+" "+textStartTime );

          var textEndTime     = $("div[data-name=dateEnd] .field").text().replace("pm"," PM").replace("am"," AM");
          var formatEndTime   = textEndTime.split(' ');
          var formatEndTime1  = formatEndTime[0].split('/');
          var formatEndTime   = Date.parse( formatEndTime1[1]+" "+formatEndTime1[0]+" "+formatEndTime1[2]+" "+formatEndTime[1]+" "+formatEndTime[2]+" "+formatEndTime[3] );
        }

        // alert(" @@@ count : "+count2+" | formatStartTime : "+formatStartTime+" | formatEndTime : "+formatEndTime);

        if( parseInt(formatStartTime) >= parseInt(formatEndTime) )
        {
            $.confirm({
                title: 'Warning!',
                content: 'Please select start time less than end time',
                buttons: {
                    Ok: function () {
                        $("input[data-name='dateStart-time']").val("");
                        delete(count2);
                        count2=0;
                    }
                }
            });
        }
    });
</script>

<script>
    
    // <!-- dateEnd-time validation script start -->
    count22=0;
    $(document).on("change","input[data-name='dateEnd-time']",function(e){
        
        count22++;

        if( $("input[data-name=dateStart]").val() != undefined ) {
          
          var textDateStart   = $("input[data-name=dateStart]").val();
          var stringDateStart = textDateStart.split('/');
          var formatDateStart = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2] );
          
          var textDateEnd     = $("input[data-name=dateEnd]").val();
          var stringDateEnd   = textDateEnd.split('/');
          var formatDateEnd   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

          var textStartTime   = $("input[data-name=dateStart-time]").val().replace("pm"," PM").replace("am"," AM");
          var formatStartTime = Date.parse( stringDateStart[1]+" "+stringDateStart[0]+" "+stringDateStart[2]+" "+textStartTime );

          var textEndTime     = $("input[data-name=dateEnd-time]").val().replace("pm"," PM").replace("am"," AM");
          var formatEndTime   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2]+" "+textEndTime );

        }else{

          var textStartTime     = $("div[data-name=dateStart] .field").text().replace("pm"," PM").replace("am"," AM");
          var formatStartTime   = textStartTime.split(' ');
          var formatStartTime1  = formatStartTime[0].split('/');
          var formatStartTime   = Date.parse( formatStartTime1[1]+" "+formatStartTime1[0]+" "+formatStartTime1[2]+" "+formatStartTime[1]+" "+formatStartTime[2]+" "+formatStartTime[3] );
          
          var textDateEnd     = $("input[data-name=dateEnd]").val();
          var stringDateEnd   = textDateEnd.split('/');
          var formatDateEnd   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2] );

          var textEndTime     = $("input[data-name=dateEnd-time]").val().replace("pm"," PM").replace("am"," AM");
          var formatEndTime   = Date.parse( stringDateEnd[1]+" "+stringDateEnd[0]+" "+stringDateEnd[2]+" "+textEndTime );
        }

        // alert(" $$$ count : "+count22+" | formatStartTime : "+formatStartTime+" | formatEndTime : "+formatEndTime);

        if( parseInt(formatStartTime) >= parseInt(formatEndTime) )
        {
            $.confirm({
                title: 'Warning!',
                content: 'Please select end time greater than start time',
                buttons: {
                    Ok: function () {
                        $("input[data-name='dateEnd-time']").val("");
                        delete(count22);
                        count22=0;
                    }
                }
            });
        }
    });
</script>


<script>

    // <!-- Daily validation script start -->
    var count3=0;
    $(document).on("change","input[data-name='endDate']",function(e){
        
        e.stopImmediatePropagation();
        count3++;
        
        if(count3==3){

            if( $("input[data-name=startDate]").val() != undefined ) {

              var textStartDate   = $("input[data-name=startDate]").val();
              var stringStartDate = textStartDate.split('/');
              var formatStartDate = Date.parse( stringStartDate[1]+" "+stringStartDate[0]+" "+stringStartDate[2] );
              
              var textEndDate     = $("input[data-name=endDate]").val();
              var stringEndDate   = textEndDate.split('/');
              var formatEndDate   = Date.parse( stringEndDate[1]+" "+stringEndDate[0]+" "+stringEndDate[2] );

            }else{

              var textStartDate   = $("div[data-name=startDate] .field").text();
              var stringStartDate = textStartDate.split('/');
              var formatStartDate = Date.parse( stringStartDate[1]+" "+stringStartDate[0]+" "+stringStartDate[2] );
              
              var textEndDate     = $("input[data-name=endDate]").val();
              var stringEndDate   = textEndDate.split('/');
              var formatEndDate   = Date.parse( stringEndDate[1]+" "+stringEndDate[0]+" "+stringEndDate[2] );

            }

            // alert("DAILY - Count : "+count3+" | Start date : "+formatStartDate+" | End date : "+formatEndDate );

            if(textStartDate== "")
            {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select start date first',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=endDate]").val("");
                            delete(count3);
                            count3=0;
                        }
                    }
                });
            }
            else{

                if( formatStartDate > formatEndDate )
                {
                    $.confirm({
                        title: 'Warning!',
                        content: 'Please select date greater than start date',
                        buttons: {
                            Ok: function (){
                                $("input[data-name=endDate]").val("");
                                delete(count3);
                                count3=0;
                            }
                        }
                    });
                }
            } 
        }

        if( count3 >= 3 ) {
            delete(count3);
            count3=0;
        }
    });

    
    // <!-- startDate validation script start -->
    count4=0;
    $(document).on("change","input[data-name='startDate']",function(e){

        e.stopImmediatePropagation();
        count4++;

        if( $("input[data-name=endDate]").val() != undefined ) {

          var textStartDate   = $("input[data-name=startDate]").val();
          var stringStartDate = textStartDate.split('/');
          var formatStartDate = Date.parse( stringStartDate[1]+" "+stringStartDate[0]+" "+stringStartDate[2] );
          
          var textEndDate     = $("input[data-name=endDate]").val();
          var stringEndDate   = textEndDate.split('/');
          var formatEndDate   = Date.parse( stringEndDate[1]+" "+stringEndDate[0]+" "+stringEndDate[2] );

          var today       = new Date();
          var dd          = String(today.getDate()).padStart(2, '0');
          var mm          = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          var yyyy        = today.getFullYear();
          var formatTodayDate = Date.parse( mm + ' ' + dd + ' ' + yyyy );

        }else{

          var textStartDate   = $("input[data-name=startDate]").val();
          var stringStartDate = textStartDate.split('/');
          var formatStartDate = Date.parse( stringStartDate[1]+" "+stringStartDate[0]+" "+stringStartDate[2] );

          var textEndDate     = $("div[data-name=endDate] .field").text();
          var stringEndDate   = textEndDate.split('/');
          var formatEndDate   = Date.parse( stringEndDate[1]+" "+stringEndDate[0]+" "+stringEndDate[2] );

          var today       = new Date();
          var dd          = String(today.getDate()).padStart(2, '0');
          var mm          = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          var yyyy        = today.getFullYear();
          var formatTodayDate = Date.parse( mm + ' ' + dd + ' ' + yyyy );

        }

        // alert( "@@@@-: Count : "+count4+" | Start date : "+formatStartDate+" | End date : "+formatEndDate );

        if(count4==3)
        {
            if(formatStartDate < formatTodayDate)
            { 
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select future date',
                    buttons: {
                        Ok: function () {
                            $("input[data-name=startDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                }); 
            }else if( textEndDate != "" && formatEndDate < formatStartDate ) {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select date less than end date',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=startDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                });
            }
        }

        if(count4>=3) { 
            delete(count4);
            count4=0;
        }
    });
</script>

<!-- Weekly validation script start -->
<script >
    
    var count=0;
    $(document).on("change","input[data-name='weeklyendDate']",function(e){
        
        e.stopImmediatePropagation();
        count++;

        if( $("input[data-name=weeklystartDate]").val() != undefined ) {
          
          var textWeeklyStartDate     = $("input[data-name=weeklystartDate]").val();
          var stringWeeklyStartDate   = textWeeklyStartDate.split('/');
          var formatWeeklyStartDate   = Date.parse( stringWeeklyStartDate[1]+" "+stringWeeklyStartDate[0]+" "+stringWeeklyStartDate[2] );
          
          var textWeeklyEndDate       = $("input[data-name=weeklyendDate]").val();
          var stringWeeklyEndDate     = textWeeklyEndDate.split('/');
          var formatWeeklyEndDate     = Date.parse( stringWeeklyEndDate[1]+" "+stringWeeklyEndDate[0]+" "+stringWeeklyEndDate[2] );

        }else{

          var textWeeklyStartDate     = $("div[data-name=weeklystartDate] .field").text();
          var stringWeeklyStartDate   = textWeeklyStartDate.split('/');
          var formatWeeklyStartDate   = Date.parse( stringWeeklyStartDate[1]+" "+stringWeeklyStartDate[0]+" "+stringWeeklyStartDate[2] );
          
          var textWeeklyEndDate       = $("input[data-name=weeklyendDate]").val();
          var stringWeeklyEndDate     = textWeeklyEndDate.split('/');
          var formatWeeklyEndDate     = Date.parse( stringWeeklyEndDate[1]+" "+stringWeeklyEndDate[0]+" "+stringWeeklyEndDate[2] );

        }

        // alert("Weekly end - Count : "+count+" | Start date : "+formatWeeklyStartDate+" | End date : "+formatWeeklyEndDate );

        if(count==3){
            
            if(textWeeklyStartDate== "")
            {
                
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select start date first',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=weeklyendDate]").val("");
                            delete(count);
                            count=0;
                        }
                    }
                });
            }
            else{

                if( formatWeeklyStartDate > formatWeeklyEndDate )
                {
                    $.confirm({
                        title: 'Warning!',
                        content: 'Please select date greater than start date',
                        buttons: {
                            Ok: function (){
                                $("input[data-name=weeklyendDate]").val("");
                                delete(count);
                                count=0;
                            }
                        }
                    });
                }
            } 
        }

        if( count >= 3 ) {
            delete(count);
            count=0;
        }

    });

    
    count4=0;
    $(document).on("change","input[data-name='weeklystartDate']",function(e){

        e.stopImmediatePropagation();
        count4++;

        if( $("input[data-name=weeklyendDate]").val() != undefined ) {
          
          var textWeeklyStartDate     = $("input[data-name=weeklystartDate]").val();
          var stringWeeklyStartDate   = textWeeklyStartDate.split('/');
          var formatWeeklyStartDate   = Date.parse( stringWeeklyStartDate[1]+" "+stringWeeklyStartDate[0]+" "+stringWeeklyStartDate[2] );
          
          var textWeeklyEndDate       = $("input[data-name=weeklyendDate]").val();
          var stringWeeklyEndDate     = textWeeklyEndDate.split('/');
          var formatWeeklyEndDate     = Date.parse( stringWeeklyEndDate[1]+" "+stringWeeklyEndDate[0]+" "+stringWeeklyEndDate[2] );
        
        }else{

          var textWeeklyStartDate     = $("input[data-name=weeklystartDate]").val();
          var stringWeeklyStartDate   = textWeeklyStartDate.split('/');
          var formatWeeklyStartDate   = Date.parse( stringWeeklyStartDate[1]+" "+stringWeeklyStartDate[0]+" "+stringWeeklyStartDate[2] );
          
          var textWeeklyEndDate       = $("div[data-name=weeklyendDate] .field").text();
          var stringWeeklyEndDate     = textWeeklyEndDate.split('/');
          var formatWeeklyEndDate     = Date.parse( stringWeeklyEndDate[1]+" "+stringWeeklyEndDate[0]+" "+stringWeeklyEndDate[2] );

        }

        var today       = new Date();
        var dd          = String(today.getDate()).padStart(2, '0');
        var mm          = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy        = today.getFullYear();
        var formatTodayDate = Date.parse( mm + ' ' + dd + ' ' + yyyy );

        // alert( "Weekly start - Count : "+count4+" | Start date : "+textWeeklyStartDate+" | End date : "+textWeeklyEndDate+" | formatTodayDate : "+formatTodayDate );

        if(count4==3)
        {
            
            if(formatWeeklyStartDate < formatTodayDate)
            { 
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select future date',
                    buttons: {
                        Ok: function () {
                            $("input[data-name=weeklystartDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                }); 
            }else if( textWeeklyEndDate != "" && formatWeeklyEndDate < formatWeeklyStartDate ) {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select date less than end date',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=weeklystartDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                });
            }
        }
        
        if(count4>=3) { 
            delete(count4);
            count4=0;
        }
    });
</script>

<!-- Monthly validation script start -->
<script >
    
    var count=0;
    $(document).on("change","input[data-name='monthlyEndDate']",function(e){
        
        e.stopImmediatePropagation();
        count++;

        var textMonthlyStartDate   = $("input[data-name=monthlyStartDate]").val();
        var striMgmonthlyStartDate = textMonthlyStartDate.split('/');
        var formMtmonthlyStartDate = Date.parse( striMgmonthlyStartDate[1]+" "+striMgmonthlyStartDate[0]+" "+striMgmonthlyStartDate[2] );
        
        var textmonthlyEndDate     = $("input[data-name=monthlyEndDate]").val();
        var stringmonthlyEndDate   = textmonthlyEndDate.split('/');
        var formatmonthlyEndDate   = Date.parse( stringmonthlyEndDate[1]+" "+stringmonthlyEndDate[0]+" "+stringmonthlyEndDate[2] );

        // alert("Count : "+count+" | Start date : "+formMtmonthlyStartDate+" | End date : "+formatmonthlyEndDate );

        if(count==3){
            
            if( textMonthlyStartDate == "")
            {
                
                $.confirm({
                  title: 'Warning!',
                  content: 'Please select start date first',
                  buttons: {
                      Ok: function (){
                          $("input[data-name=monthlyEndDate]").val("");
                          delete(count);
                          count=0;
                      }
                  }
              });
            }
            else{

                if( formMtmonthlyStartDate > formatmonthlyEndDate ) {
                    $.confirm({
                        title: 'Warning!',
                        content: 'Please select date greater than start date',
                        buttons: {
                            Ok: function (){
                                $("input[data-name=monthlyEndDate]").val("");
                                delete(count);
                                count=0;
                            }
                        }
                    });
                }

            } 
        }

        if( count >= 3 ) {
            delete(count);
            count=0;
        }
    });

    count4=0;
    $(document).on("change","input[data-name='monthlyStartDate']",function(e){

        e.stopImmediatePropagation();
        count4++;

        var textMonthlyStartDate   = $("input[data-name=monthlyStartDate]").val();
        var strigMonthlyStartDate = textMonthlyStartDate.split('/');
        var formatMonthlyStartDate = Date.parse( strigMonthlyStartDate[1]+" "+strigMonthlyStartDate[0]+" "+strigMonthlyStartDate[2] );
        
        var textMonthlyEndDate     = $("input[data-name=monthlyEndDate]").val();
        var stringMonthlyEndDate   = textMonthlyEndDate.split('/');
        var formatMonthlyEndDate   = Date.parse( stringMonthlyEndDate[1]+" "+stringMonthlyEndDate[0]+" "+stringMonthlyEndDate[2] );

        var today       = new Date();
        var dd          = String(today.getDate()).padStart(2, '0');
        var mm          = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy        = today.getFullYear();
        var formatTodayDate = Date.parse( mm + ' ' + dd + ' ' + yyyy );

        // alert( "Count : "+count+" | Start date : "+formatMonthlyStartDate+" | End date : "+formatMonthlyEndDate+" | formatTodayDate : "+formatTodayDate );

        if(count4==3)
        {
            if(formatMonthlyStartDate < formatTodayDate)
            { 
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select future date',
                    buttons: {
                        Ok: function () {
                            $("input[data-name=monthlyStartDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                }); 
            }else if( textMonthlyEndDate != "" && formatMonthlyEndDate < formatMonthlyStartDate ) {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select date less than end date',
                    buttons: {
                        Ok: function (){
                            $("input[data-name=monthlyStartDate]").val("");
                            delete(count4);
                            count4=0;
                        }
                    }
                });
            }
        }
        
        if(count4>=3) { 
            delete(count4);
            count4=0;
        }
    });
</script>

<script>

    // RECURING SERIES TASK CUSTOM DDL
    count10=0;
    $(document).on("change","input[data-name='customStartDate1'], input[data-name='customStartDate2'], input[data-name='customStartDate3'], input[data-name='customStartDate4'], input[data-name='customStartDate5'], input[data-name='customStartDate6']",function(e){

        e.stopImmediatePropagation();
        count10++;

        var textCustomStartDate     = $(this).val();
        var strigCustomStartDate    = textCustomStartDate.split('/');
        var formatCustomStartDate   = Date.parse( strigCustomStartDate[1]+" "+strigCustomStartDate[0]+" "+strigCustomStartDate[2] );

        var today       = new Date();
        var dd          = String(today.getDate()).padStart(2, '0');
        var mm          = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy        = today.getFullYear();
        var formatTodayDate = Date.parse( mm + ' ' + dd + ' ' + yyyy );

        // alert( "Count : "+count+" | Start date : "+formatCustomStartDate+" | formatTodayDate : "+formatTodayDate );

        if(count10==3)
        {
            if(formatCustomStartDate < formatTodayDate)
            { 
                $(this).val("");
                $.confirm({
                    title: 'Warning!',
                    content: 'Please select future date',
                    buttons: {
                        Ok: function () {
                            delete(count10);
                            count10=0;
                        }
                    }
                }); 
            }
        }
        
        if(count10>=3) { 
            delete(count10);
            count10=0;
        }

    });
</script>
<!-- TASK EDIT START & DUE DATE VALIDATION -->

<script>
  var afterhash=window.location.hash;
  afterhash.indexOf(0);
  afterhash.toLowerCase();

  var convertLeadsUrl =  afterhash.toLowerCase();

  afterhash = afterhash.split("/")[0];

  //show convert button on leads view record section
  convertLeadsUrl = convertLeadsUrl.split("/")[1];
  if(convertLeadsUrl == 'view' && afterhash == '#Lead'){
    $('.convertLeadsButton').show();
  } else {
    $('.convertLeadsButton').hide();
  }


  var hash=window.location.hash;
  hash.indexOf(0);
  hash.toLowerCase();
  hash = hash.split("/")[2];

  if(hash && afterhash=='#Account')
  { 
      var hash=window.location.hash;
      hash.indexOf(0);
      hash.toLowerCase();
      hash = hash.split("/")[2];

      var rec_present = 0;
      var howmanygst_val = 0;

      $.ajax({
        url: "../../client/res/templates/financial_changes/account_gst_fields_fetch.php?account_id="+hash,
        type: "post", 
        dataType: 'json',
        async: false,
        success: function(result)
        {
          if(result)
          { 
              rec_present = 1;
              $(".middle").append(result);
              $("textarea[data-name='description']").append("<input type='hidden' id='yeshasrec' value='1' />");
              // $("textarea[data-name='description']").closest('input#totalGSTCnt').remove();
              // $("textarea[data-name='description']").closest('input#staticValChanged').remove();
              //$(".detail button[data-action='edit']").attr("onclick", "acc_editvalidateGST()");
          }
          else
          {   
              // alert("Else case");  
              // $("div[data-name='description']").find('.field').append('<input type="hidden" data-name="staticVal" id="totalGSTCnt" value="0" /><input type="hidden" data-name="staticValChanged" id="totalGSTCntChanged" value="0" /><input type="hidden" id="changedHaveGST" value="No">');

              if($("div[data-name='doyouhavegstnum'] .field").find('span').text() == 'Yes'){
                  $("div[data-name='howmanygstdetails']").show();
                  $("div[data-name='howmanygstdetails'] .field").find('span').text('1');
              }
              else
              {   
                  $("div[data-name='howmanygstdetails']").hide();
              }
          }
        }
      });


      $("div[data-name='description']").find('.field').append('<input type="hidden" id="no_of_gst_clicked" value="0">');

      $("div[data-name='doyouhavegstnum']").find('span.fa-pencil-alt').addClass('newpencilclass');
      
      if($("div[data-name='doyouhavegstnum'] .field").find('span').text() == 'Yes')
      { 
          var num_ofGST = ($("div[data-name='howmanygstdetails'] .field").find('span').text()) ? $("div[data-name='howmanygstdetails'] .field").find('span').text() : 1;
          
          $.ajax({
            url: "../../client/res/templates/financial_changes/account_details_get.php?account_id="+hash,
            type: "post", 
            dataType: 'json',
            async: false,
            success: function(result)
            {
              if(result)
              {   
                  howmanygst_val = result.no_of_gst;

                  $("#totalGSTCnt").remove();
                  $("#totalGSTCntChanged").remove();
                  $("div[data-name='description']").find('.field').append('<input type="hidden" data-name="staticVal" id="totalGSTCnt" value="'+howmanygst_val+'" /><input type="hidden" data-name="staticValChanged" id="totalGSTCntChanged" value="0" /><input type="hidden" id="gethowmanygstfld" value="'+howmanygst_val+'"><input type="hidden" id="havegst_fld" value="'+result.havegst+'">');
                  $("div[data-name='howmanygstdetails'] .field").find('span').text(howmanygst_val);
                  how_many_gst(howmanygst_val);
              }
              else
              {  
                  how_many_gst(1);
              }
            }
          });

      }

      /*$("div[data-name='doyouhavegstnum']").click(function(){
        $("select[data-name='doyouhavegstnum']").attr('onchange', 'have_gst(this.value)');       
      });*/

      function have_gst(optVal, rec_present='')
      { 
        if(optVal=='No')
        {
            $("div[data-name='howmanygstdetails']").hide();
            $("#last_child_panel_edit").hide();
            $("#no_of_gst_clicked").val(0);
            $("#totalRec_new").val(0);
            $("div[data-name='howmanygstdetails'] .field").find('span').text('1');
        }
        else 
        { 
            if(rec_present==0)
            {
              $("div[data-name='description']").find('.field').append('<input type="hidden" data-name="staticVal" id="totalGSTCnt" value="0" /><input type="hidden" data-name="staticValChanged" id="totalGSTCntChanged" value="0" /><input type="hidden" id="changedHaveGST" value="No">');
              
              $("div[data-name='howmanygstdetails']").find('a.inline-edit-link').attr('id', 'hmgst');
            }

            $("#last_child_panel_edit").remove();
            $("div[data-name='howmanygstdetails']").show();
            
            //$(".detail button[data-action='edit']").attr("onclick", "acc_editvalidateGST()");
            if($("#yeshasrec").val())
            {
                if($("select[data-name='doyouhavegstnum']").is(":visible") && $("div[data-name='doyouhavegstnum']").find('a.inline-cancel-link').length == 0)
                {
                     var str = '<div class="cell col-sm-6 form-group" data-name="howmanygstdetails"><a href="javascript:" class="pull-right inline-edit-link hidden"><span class="fas fa-pencil-alt fa-sm"></span></a><label class="control-label" data-name="howmanygstdetails"><span class="label-text">How many GST number(s) do you have ?</span></label><div class="field" data-name="howmanygstdetails"><select data-name="howmanygstdetails" class="form-control main-element"><option value="1">1</option>';
                     for(var m=1;m<38;m++)
                     {
                        var selected = '';
                        if(m==1) selected = ' selected';

                        str += '<option value="'+m+'"'+selected+'>'+m+'</option>';
                     }
                     str += '</select></div></div>';
                     $("div[data-name='doyouhavegstnum']").closest('.row').append(str);
                }
                else
                { 
                    /*var str = '<div class="cell col-sm-6 form-group" data-name="howmanygstdetails"><a href="javascript:" class="pull-right inline-edit-link hidden"><span class="fas fa-pencil-alt fa-sm"></span></a><label class="control-label" data-name="howmanygstdetails"><span class="label-text">How many GST details to add ?</span></label><div class="field" data-name="howmanygstdetails"><span class="text-default">1</span></div></div>';

                    $("div[data-name='doyouhavegstnum']").closest('.row').append(str);*/
                    $("div[data-name='howmanygstdetails']").show();
                    $("div[data-name='howmanygstdetails'] .field").find('span').text('1');
                }
            }
            else
            {
                $("div[data-name='howmanygstdetails']").show();
                $("div[data-name='howmanygstdetails'] .field").find('span').text('1');
            }
            // how_many_gst(1);
            $("#last_child_panel_edit").show();
        }
      }

      $("div[data-name='howmanygstdetails']").click(function(){
        
        if($("textarea[data-name='description']").length){
          // Condition when number of gst dropdown not changed from inline edit opened from top edit button 
          $("select[data-name='howmanygstdetails']").attr('onchange', 'how_many_gst(this.value)');
        }
        
        $("select[data-name='howmanygstdetails']").attr('id', 'account_gst_num_edit');
        //$("button[data-action='save']").attr("onclick", "acc_editvalidateGST()");

        // Disable dropdown options upto already added count
        if($("#totalGSTCnt").val())
        {
          $("select[data-name='howmanygstdetails'] option").filter(function() {
              return parseInt($(this).val()) <= parseInt($("#totalGSTCnt").val());
          }).prop('disabled', true);
        }
      });

      var changed_num = '';

      function how_many_gst(num, mainCancel='')
      {
        // Script to get the number of records from database starts here
        var total_gst_in_db = 0;
        $.ajax({
            url: "../../client/res/templates/financial_changes/account_details_get.php?account_id="+hash,
            type: "POST",
            processData : false,
            contentType : false, 
            dataType: 'json',
            async: false,
            success: function(result)
            {
                if(result)
                {   
                    total_gst_in_db = result.no_of_gst;
                }
            }
        });
        // alert("total_gst_in_db: "+total_gst_in_db);
          // $("#last_child_panel_edit").show();
          $("#account_gst_num_edit option").removeAttr('selected');
          $("#account_gst_num_edit option[value='"+num+"']").attr("selected", "selected");
          $("#account_gst_num_edit").val(num);

          $('#account_gst_num_edit').filter(function() {
              return $(this).val() < num;
          }).prop('disabled', true);

          var total_db_rec = '';
          if(rec_present)
          { 
              total_db_rec = parseInt($("#totalRec_new").val());
          }
          else
          {
              total_db_rec = 0;
          }

          // alert("num : "+num+" === totalGSTCntChanged : "+parseInt($("#totalGSTCntChanged").val())+" === total_db_rec : "+total_db_rec);
          // if(parseInt($("#totalGSTCntChanged").val()) == 0)
          // if(total_db_rec === 0 && num >= 1)

          // alert($("#totalGSTCntChanged").length+" === "+num+" === "+total_gst_in_db);
          // if(total_gst_in_db == 1 || num == total_gst_in_db)
          if($("#totalGSTCntChanged").length == 0 || total_gst_in_db == 1 || num == total_gst_in_db)
          {
              /*if($("#last_child_panel_edit").length > 1){
                  // $(".middle").children("#last_child_panel_edit").not(':first-child').remove();
                  $("#last_child_panel_edit").remove();
              }*/
              $(".middle").append('<div id="last_child_panel_edit" class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">GST Details</h4></div><div class="panel-body panel-body-form" id="numofgst_edit"><div class="row" id="gst_no_edit"></div></div></div>');
          }
          /*else if(!$("#totalGSTCntChanged").val())
          {
              $(".middle").append('<div id="last_child_panel_edit" class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">GST Details</h4></div><div class="panel-body panel-body-form" id="numofgst_edit"><div class="row" id="gst_no_edit"></div></div></div>');
          }*/

          num = parseInt(num);
          
          if(num > total_db_rec)
          { 
            if(mainCancel==='Yes')
            { 
              var newNum = num;
              var s = num;
              var m = num + 1;
            }
            else
            {
                var t = $("#totalGSTCntChanged").val();
                if($("#totalGSTCntChanged").length == 0)
                { 
                    var newNum = 1;
                    var s = 1;
                    var m = parseInt($("#totalGSTCntChanged").length) + 1;
                }
                else if(num > total_gst_in_db)
                {   
                    // var newNum = num - parseInt($("#totalGSTCntChanged").val());
                    var s = 0;
                    if($("#totalGSTCntChanged").val()!=0){
                      var newNum = num - parseInt($("#totalGSTCntChanged").val());
                      var m = parseInt($("#totalGSTCntChanged").val()) + 1;
                    }
                    else {
                      var newNum = num - total_gst_in_db;
                      var m = parseInt(total_gst_in_db) + 1;
                    }
                }
                else
                {
                    var newNum = total_gst_in_db - parseInt($(".gst").length);
                    var s = 0;
                    var m = parseInt($("#totalGSTCntChanged").val()) + 1;
                }
            }

            if(num < parseInt($("#totalGSTCntChanged").val()))
            { 
              var totalRemove = parseInt($("#totalGSTCntChanged").val()) - num;
              $('#numofgst_edit > .gst').slice(-totalRemove).remove();
              $("#totalGSTCntChanged").val(num);
              $("#totalRec_new").val(num);
            }
            
            // alert("num: "+num+" === newNum: "+newNum);
            for(var i=0;i<newNum;i++)
            { 
              $("#numofgst_edit").append('<div class="row gst" id="gst_'+s+'_edit"><div class="cell col-sm-6 form-group" data-name="gstnoedit'+s+'"><label class="control-label" data-name="gstnoedit'+s+'">GST NO '+m+'</label><div class="field" data-name="gstnoedit'+s+'"><input type="hidden" class="main-element form-control acc_gst" id="gstnoedit_id'+s+'" name="gstno_edit_id[]" data-name="gstnoedit_id'+s+'" value="" autocomplete="espo-gstnoedit_id'+s+'"><input type="text" class="main-element form-control acc_gst" id="gstnoedit'+s+'" name="gstno_edit[]" data-name="gstnoedit'+s+'" value="" maxlength="40" autocomplete="espo-gstnoedit'+s+'" onblur="acc_getGST_state_edit(this.value, '+s+')"><div class="row"><div class="col-sm-4 col-xs-4"><button type="button" class="btn btn-danger" onclick="acc_editremoveGST_edit('+s+')"><span class="fas fa-trash-alt fa-sm"></span></button></div></div></div></div><div class="cell col-sm-6 form-group" data-name="acc_gstAddressEdit'+s+'"><label class="control-label" data-name="acc_gstAddressEdit'+s+'"><span class="label-text">Address '+m+'</span></label><div class="field" data-name="acc_gstAddressEdit'+s+'"><textarea class="form-control auto-height" data-name="acc_gstAddressStreet'+s+'" id="acc_gstAddressStreetEdit'+s+'" name="acc_gstAddressStreet_edit[]" rows="1" placeholder="Street" autocomplete="espo-acc_gststreetedit'+s+'" maxlength="255"></textarea><div class="row"><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" id="acc_gstcityedit'+s+'" data-name="acc_gstAddressCityEdit'+s+'" name="acc_gstAddressCity_edit[]" value="" placeholder="City" autocomplete="espo-acc_gstcityedit'+s+'" maxlength="255"></div><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" id="acc_gststateedit'+s+'" name="acc_gstAddressState_edit[]" data-name="acc_gstAddressStateEdit'+s+'" value="" placeholder="State" autocomplete="espo-acc_gststateedit'+s+'" maxlength="255"></div><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" id="acc_gstpostalcodeedit'+s+'" name="acc_gstAddressPostalCode_edit[]" data-name="acc_gstAddressPostalCodeEdit'+s+'" value="" placeholder="Postal Code" autocomplete="espo-acc_gstpostalCodeEdit'+s+'" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></div></div></div></div>');

              s++;
              m++;

              // changed_num = $("#totalGSTCntChanged").val(num);
              $("#totalGSTCntChanged").val(num);
              $("#totalRec_new").val(num);
            }
          }
          else
          {
              var totalRemove = parseInt($("#totalGSTCntChanged").val()) - num;
              $('#numofgst_edit > .gst').slice(-totalRemove).remove();
              $("#totalGSTCntChanged").val(num);
              $("#totalRec_new").val(num);
          }

          if($(".middle #last_child_panel_edit").length > 1){
             $(".middle #last_child_panel_edit").last().remove(); 
          }
      }

      function acc_editremoveGST_edit(div_id){
        $.confirm({
            title: 'Warning',
            content: 'Do you want to remove GST details?',
            type: 'dark',
            typeAnimated: true,
            buttons: {
                Ok: function() {
                    var len = $("input[name='gstno_edit[]']").length;
                    if(len == 1)
                    { 
                        $("#numofgst_edit").hide();
                        $("#account_gst_num_edit").val('1');
                        $("#totalGSTCntChanged").val(0);
                        $("#totalRec_new").val(0);
                        $("#totalGSTCnt").val('0');
                        
                        $("select[data-name='doyouhavegstnum'] option").prop('selected', false); 
                        $("select[data-name='doyouhavegstnum'] option").prop('disabled', false); 
                        
                        $("select[data-name='doyouhavegstnum'] option[value='No']").prop("selected", true);
                        $("select[data-name='doyouhavegstnum']").val('No');
                        $("div[data-name='doyouhavegstnum'] .field").find('span').text('No');

                        if($("#yeshasrec").val() && $("div[data-name='doyouhavegstnum']").find('a.inline-cancel-link').length == 0)
                        {
                            $("div[data-name='howmanygstdetails']").remove();
                        }
                        else
                        {
                            $("div[data-name='howmanygstdetails']").hide();
                        }

                        $("#last_child_panel_edit").remove();
                        $("#gethowmanygstfld").val(0);
                    }
                    else
                    { 
                        // $("#gst_"+div_id+"_edit").remove();

                        $("#gst_"+div_id+"_edit").hide();

                        $("#gst_"+div_id+"_edit input").attr("disabled", true);

                        var old_val = $("#deleted_gst_ids").val();
                        
                        var get_gst_val = $("#gst_"+div_id+"_edit").find("input[name='gstno_edit_id[]']").val();

                        if(get_gst_val)
                        {
                            // $("div[data-name='description']").find('.field').append('<input type="hidden" name="deleted_gst_ids" id="deleted_gst_ids" />');

                            // alert(old_val+" ===== "+get_gst_val);
                            $("#deleted_gst_ids").val(old_val+","+get_gst_val);
                        }

                        $("#gst_"+div_id+"_edit").find("input[type='text'], textarea").attr("type", "hidden");
                        
                        $("#gst_"+div_id+"_edit").find("input[name='gstno_edit[]']").attr("name","del_gstno_edit[]");

                        $("#gst_"+div_id+"_edit").find("input[name='gstno_edit_id[]']").attr("name","del_gstno_edit_id[]");

                        $("#gst_"+div_id+"_edit").find("input[name='acc_gstAddressStreet_edit[]']").attr("name","del_acc_gstAddressStreet_edit[]");

                        $("#gst_"+div_id+"_edit").find("input[name='acc_gstAddressCity_edit[]']").attr("name","del_acc_gstAddressCity_edit[]");

                        $("#gst_"+div_id+"_edit").find("input[name='acc_gstAddressState_edit[]']").attr("name","del_acc_gstAddressState_edit[]");

                        $("#gst_"+div_id+"_edit").find("input[name='acc_gstAddressPostalCode_edit[]']").attr("name","del_acc_gstAddressPostalCode_edit[]");

                        $("#gst_"+div_id+"_edit").find("input[type='text'], textarea").attr("name", "del_acc_gstAddressStreet_edit[]");

                        // alert($("#gst_"+div_id+"_edit").html());
                        
                        if($("#totalRec").val())
                        {
                            var dropDownVal = $("#gethowmanygstfld").val();
                        }
                        else
                        {  
                            var dropDownVal = ($("#account_gst_num_edit").val()) ? $("#account_gst_num_edit").val() : $("#gethowmanygstfld").val();
                        }
                        
                        if(dropDownVal==1)
                        {
                            $("#totalRec_new").val(0);
                            // $("#last_child_panel_edit").remove();
                        }
                        else
                        {  
                            $("#account_gst_num_edit").val('');
                            var newDropDownVal = dropDownVal - 1;
                            $("select[data-name='howmanygstdetails'] option").removeAttr('selected');
                            $("select[data-name='howmanygstdetails'] option").removeAttr('disabled');
                            $("select[data-name='howmanygstdetails'] option[value='"+newDropDownVal+"']").val(newDropDownVal);
                            $("select[data-name='howmanygstdetails'] option[value='"+newDropDownVal+"']").attr("selected", "selected");
                            $("div[data-name='howmanygstdetails'] .field").find('span').text(newDropDownVal);

                            $('#account_gst_num_edit').filter(function() {
                                return $(this).val() < (parseInt(newDropDownVal) - 1);
                            }).prop('disabled', true);

                            $("#totalGSTCntChanged").val(newDropDownVal);
                            $("#totalRec_new").val(newDropDownVal);
                            $("#gethowmanygstfld").val(newDropDownVal);
                        }
                    }
                    
                    /*$.ajax({
                        type    : "GET",
                        url     : "../../../../client/res/templates/financial_changes/remove_account_gst_details.php?account_id="+
                        hash,
                        dataType  : "json",
                        processData : false,
                        contentType : false,
                        success: function(data){

                        }
                    });*/
                },
                Cancel: function() {
                }
            }
        });
      }

      function acc_getGST_state_edit(stCode, id){
          var inputvalues = stCode;
          var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');

          if(inputvalues == ""){
          }
          else{
              if (gstinformat.test(inputvalues)) {
                  var obj = [{
                      "01":"Jammu and Kashmir",
                      "02":"Himachal Pradesh",
                      "03":"Punjab",
                      "04":"Chandigarh",
                      "05":"Uttarakhand",
                      "06":"Haryana",
                      "07":"Delhi",
                      "08":"Rajasthan",
                      "09":"Uttar Pradesh",
                      "10":"Bihar",
                      "11":"Sikkim",
                      "12":"Arunachal Pradesh",
                      "13":"Nagaland",
                      "14":"Manipur",
                      "15":"Mizoram",
                      "16":"Tripura",
                      "17":"Meghalaya",
                      "18":"Assam",
                      "19":"West Bengal",
                      "20":"Jharkhand",
                      "21":"Odisha",
                      "22":"Chhattisgarh",
                      "23":"Madhya Pradesh",
                      "24":"Gujarat",
                      "25":"Daman and Diu",
                      "26":"Dadra and Nagar Haveli",
                      "27":"Maharashtra",
                      "28":"Andhra Pradesh",
                      "29":"Karnataka",
                      "30":"Goa",
                      "31":"Lakshadweep",
                      "32":"Kerala",
                      "33":"Tamil Nadu",
                      "34":"Puducherry",
                      "35":"Andaman & Nicobar",
                      "36":"Telangana",
                      "37":"Andhrapradesh(New)",
                      "38":"Ladakh",
                  }];

                  var stCode = stCode.substring(0, 2);

                  if ( stCode in obj[0] ) {
                      $("#acc_gststateedit"+id).val(obj[0][stCode]);
                      $("#acc_gststateedit"+id).removeAttr('style');
                  }
                  else{
                      $("#acc_gststateedit"+id).val('');
                      $("#acc_gststateedit"+id).css('border-color', '#ad4846');
                  }

                  return true;
              }
              else {
                  $.alert({
                      title: 'Warning!',
                      content: 'Please Enter Valid GSTIN Number',
                  });
                  $("#gstnoedit"+id).val('');
                  $("#acc_gstAddressStreetEdit"+id).val('');
                  $("#acc_gstcityedit"+id).val('');
                  $("#acc_gststateedit"+id).val('');
                  $("#acc_gstpostalcodeedit"+id).val('');
                  $("#gstnoedit"+id).focus();
              }
          }
      }

      function cancelEditAccount(mainCancel='')
      { 
          var len = $("input[name='gstno_edit[]']").length;
          var has_gst = $("select[data-name='doyouhavegstnum']").val();

          var total_gst_in_db = 0;
          var num_of_gst = 0;
          $.ajax({
              url: "../../client/res/templates/financial_changes/account_gst_fields_get.php?account_id="+hash,
              type: "POST",
              processData : false,
              contentType : false, 
              dataType: 'json',
              async: false,
              success: function(result)
              {
                  if(result)
                  {   
                      total_gst_in_db = result.length;
                  }
              }
          });

          $.ajax({
              url: "../../client/res/templates/financial_changes/account_details_get.php?account_id="+hash,
              type: "POST",
              processData : false,
              contentType : false, 
              dataType: 'json',
              async: false,
              success: function(result)
              {
                  if(result)
                  {   
                      num_of_gst = result.no_of_gst;
                  }
              }
          });

          if(num_of_gst === total_gst_in_db){
            how_many_gst(total_gst_in_db);
          }
          else if(num_of_gst === 1 && total_gst_in_db === 0){
            how_many_gst(num_of_gst);
          }
          // alert("total_gst_in_db: "+total_gst_in_db);


          /*if(mainCancel && has_gst === "Yes"){
            $("#last_child_panel_edit").remove();
            $.ajax({
              url: "../../client/res/templates/financial_changes/account_gst_fields_fetch.php?account_id="+hash,
              type: "post", 
              dataType: 'json',
              async: false,
              success: function(result)
              {
                if(result)
                { 
                  $(".middle").append(result);
                }
                else {
                  how_many_gst(howmanygst_val);
                }
              }
            });
          }
          else {*/
            // alert("totalGSTCnt: "+$("#totalGSTCnt").val()+" === totalGSTCntChanged: "+$("#totalGSTCntChanged").val());

            /*if($("#totalGSTCnt").val()!="0" && parseInt($("#totalGSTCntChanged").val()) != parseInt($("#totalRec").val()))
            { 
                if(len > parseInt($("#totalGSTCntChanged").val()))
                { 
                    var totalRemove = parseInt($("#totalGSTCntChanged").val()) - parseInt($("#totalGSTCnt").val());
                    $('#numofgst_edit > .row').slice(-totalRemove).remove();
                    $("#totalGSTCntChanged").val(parseInt($("#totalGSTCntChanged").val()));
                    $("#totalRec_new").val(parseInt($("#totalRec_new").val()));
                }
                else
                { 
                    $("#last_child_panel_edit").remove();
                    $.ajax({
                      url: "../../client/res/templates/financial_changes/account_gst_fields_fetch.php?account_id="+hash,
                      type: "post", 
                      dataType: 'json',
                      async: false,
                      success: function(result)
                      {
                        if(result)
                        {
                            $(".middle").append(result);
                            if(mainCancel === 1){
                              $("#totalGSTCnt").val(0);
                            }
                            else{
                              $("textarea[data-name='description']").closest('input#totalGSTCnt').remove();
                            }
                            $("textarea[data-name='description']").closest('input#staticValChanged').remove();
                        }
                        else
                        {
                          $("#totalGSTCntChanged").val(0);
                          
                          if($("#totalGSTCntChanged").val() === $("#gethowmanygstfld").val()){
                            var totalVal = $("#gethowmanygstfld").val();
                          }
                          else
                          {
                            var totalVal = $("#totalGSTCnt").val();
                          }
                          how_many_gst(totalVal);
                        }
                      }
                    });
                    var extra_added_rows = parseFloat($("#totalGSTCntChanged").val()) - parseFloat($("#totalGSTCnt").val());
                    $("#totalGSTCntChanged").val(extra_added_rows);
                }
            }
            else if(len >= 1 && $("#totalGSTCnt").val()==="0")
            { 
                if(len > 1)
                {   
                    if(len > parseInt($("#gethowmanygstfld").val()))
                    {   
                        var totalRemove = len - parseInt($("#gethowmanygstfld").val());
                        $('#numofgst_edit > .gst').slice(-totalRemove).remove();
                        $("#totalGSTCntChanged").val(parseInt($("#gethowmanygstfld").val()));
                        $("#totalRec_new").val(parseInt($("#gethowmanygstfld").val()));
                    }
                    else if(len != parseInt($("#gethowmanygstfld").val()))
                    {  
                      $("#numofgst_edit .gst").not(':first').remove();
                      $("#totalGSTCntChanged").val(1);
                      $("#totalRec_new").val(1);
                      how_many_gst(howmanygst_val);
                    }
                    else
                    { //alert("If case of else if"); 
                      $("#last_child_panel_edit").remove();
                      $("#totalGSTCntChanged").val(0);
                      $("#gethowmanygstfld").val(howmanygst_val);
                      how_many_gst(howmanygst_val);
                    }
                }   
                else
                { 
                    if(!mainCancel)
                    { 
                      $("#last_child_panel_edit").show();
                      $("#no_of_gst_clicked").val(0);
                      $("#gethowmanygstfld").val(howmanygst_val);
                      how_many_gst(howmanygst_val);
                    }
                    else
                    { 
                      how_many_gst(howmanygst_val, 'Yes');
                      $("#last_child_panel_edit").show();
                      $("#no_of_gst_clicked").val(0);
                    }
                }
                for(var i=0;i<len;i++)
                {
                    $("#gstnoedit"+i).removeAttr('style');
                    $("#acc_gstAddressStreetEdit"+i).removeAttr('style');
                    $("#acc_gstcityedit"+i).removeAttr('style');
                    $("#acc_gststateedit"+i).removeAttr('style');
                    $("#acc_gstpostalcodeedit"+i).removeAttr('style');
                }
            }*/
          // }
      }

      function acc_editvalidateGST(updateBtnClicked)
      {
        var totalgst_edit = $("#account_gst_num_edit").val();

        var updateBtn = 0;
        var tot_len = $("input[name='gstno_edit[]']").length;
        var hidfld_val = $("#totalGSTCnt").val();
        
        if(updateBtnClicked && tot_len >= hidfld_val)
        {
            updateBtn = 1;
            $("#no_of_gst_clicked").val(1);
        }
        //alert("updateBtn : "+updateBtn+" === tot_len : "+tot_len+" === hidfld_val: "+hidfld_val);return false;
        var flag_edit = true;
        if(updateBtn===1)
        {
            var len_edit = $("input[name='gstno_edit[]']").length;

            if($("input[data-name='name']").val() == "")
            {   
                $("input[data-name='name']").css('border-color', '#ad4846');
                $("input[data-name='name']").focus();

                $("input[data-name='name']").attr('data-toggle', 'popover-name');
                $('[data-toggle="popover-name"]').popover({
                    delay: {
                        "show": 500,
                        "hide": 100
                    },
                    content: 'Name required',
                    placement: 'bottom'
                }).popover('show').on('shown.bs.popover', function () {
                    setTimeout(function (a) {
                        a.popover('hide');
                    }, 3000, $(this));
                });

                flag = false;
            }
            else
            {
              for(var i=0;i<len_edit;i++)
              {
                  var zipRegex = /^\d{6}$/;
                  
                  if($("#gstnoedit"+i).val() == "")
                  { 
                      $("#gstnoedit"+i).css('border-color', '#ad4846');
                      $("#gstnoedit"+i).focus();

                      $("#gstnoedit"+i).attr('data-toggle', 'popover-gstnoedit'+i);
                      $('[data-toggle="popover-gstnoedit'+i+'"]').popover({
                          delay: {
                              "show": 500,
                              "hide": 100
                          },
                          content: 'Please enter GST number.',
                          placement: 'bottom'
                      }).popover('show').on('shown.bs.popover', function () {
                          setTimeout(function (a) {
                              a.popover('hide');
                          }, 3000, $(this));
                      });

                      flag_edit = false;
                  }
                  else if($("#acc_gstAddressStreetEdit"+i).val() == ""){
                      $("#acc_gstAddressStreetEdit"+i).css('border-color', '#ad4846');
                      $("#acc_gstAddressStreetEdit"+i).focus();

                      $("#acc_gstAddressStreetEdit"+i).attr('data-toggle', 'popover-acc_gstAddressStreetEdit'+i);
                      $('[data-toggle="popover-acc_gstAddressStreetEdit'+i+'"]').popover({
                          delay: {
                              "show": 500,
                              "hide": 100
                          },
                          content: 'Please enter street.',
                          placement: 'bottom'
                      }).popover('show').on('shown.bs.popover', function () {
                          setTimeout(function (a) {
                              a.popover('hide');
                          }, 3000, $(this));
                      });
                      flag_edit = false;
                  }
                  else if($("#acc_gstcityedit"+i).val() == ""){
                      $("#acc_gstcityedit"+i).css('border-color', '#ad4846');
                      $("#acc_gstcityedit"+i).focus();

                      $("#acc_gstcityedit"+i).attr('data-toggle', 'popover-acc_gstcityedit'+i);
                      $('[data-toggle="popover-acc_gstcityedit'+i+'"]').popover({
                          delay: {
                              "show": 500,
                              "hide": 100
                          },
                          content: 'Please enter city.',
                          placement: 'bottom'
                      }).popover('show').on('shown.bs.popover', function () {
                          setTimeout(function (a) {
                              a.popover('hide');
                          }, 3000, $(this));
                      });

                      flag_edit = false;
                  }
                  else if($("#acc_gststateedit"+i).val() == ""){
                      $("#acc_gststateedit"+i).css('border-color', '#ad4846');
                      $("#acc_gststateedit"+i).focus();

                      $("#acc_gststateedit"+i).attr('data-toggle', 'popover-acc_gststateedit'+i);
                      $('[data-toggle="popover-acc_gststateedit'+i+'"]').popover({
                          delay: {
                              "show": 500,
                              "hide": 100
                          },
                          content: 'Please enter postal code.',
                          placement: 'bottom'
                      }).popover('show').on('shown.bs.popover', function () {
                          setTimeout(function (a) {
                              a.popover('hide');
                          }, 3000, $(this));
                      });

                      flag_edit = false;
                  }
                  else if($("#acc_gstpostalcodeedit"+i).val() == ""){
                      $("#acc_gstpostalcodeedit"+i).css('border-color', '#ad4846');
                      $("#acc_gstpostalcodeedit"+i).focus();

                      $("#acc_gstpostalcodeedit"+i).attr('data-toggle', 'popover-acc_gstpostalcodeedit'+i);
                      $('[data-toggle="popover-acc_gstpostalcodeedit'+i+'"]').popover({
                          delay: {
                              "show": 500,
                              "hide": 100
                          },
                          content: 'Please enter postal code.',
                          placement: 'bottom'
                      }).popover('show').on('shown.bs.popover', function () {
                          setTimeout(function (a) {
                              a.popover('hide');
                          }, 3000, $(this));
                      });

                      flag_edit = false;
                  }
                  else if(!zipRegex.test($("#acc_gstpostalcodeedit"+i).val())) {
                      $("#acc_gstpostalcodeedit"+i).css('border-color', '#ad4846');
                      $("#acc_gstpostalcodeedit"+i).focus();

                      $("#acc_gstpostalcodeedit"+i).attr('data-toggle', 'popover-acc_gstpostalcodeedit'+i);
                        $('[data-toggle="popover-acc_gstpostalcodeedit'+i+'"]').popover({
                            delay: {
                                "show": 500,
                                "hide": 100
                            },
                            content: 'Valid postal code is required',
                            placement: 'bottom'
                        }).popover('show').on('shown.bs.popover', function () {
                            setTimeout(function (a) {
                                a.popover('hide');
                            }, 3000, $(this));
                        });

                      flag_edit = false;
                  }


                  $("input[data-name='name']").keyup(function(){
                      if($(this).length == 0){
                          $("#name").val('');
                      }
                      $(this).removeAttr('style');
                  });

                  $("#gstnoedit"+i).keyup(function(){
                      $(this).removeAttr('style');
                  });

                  $("#acc_gstAddressStreetEdit"+i).keyup(function(){
                      $(this).removeAttr('style');
                  });

                  $("#acc_gstcityedit"+i).keyup(function(){
                      $(this).removeAttr('style');
                  });

                  $("#acc_gststateedit"+i).keyup(function(){
                      if($(this).val() == ""){
                          $(this).css('border-color', '#ad4846');
                          flag_edit = false;
                      }
                      else {
                          $(this).removeAttr('style');
                      }
                  });

                  $("#acc_gstpostalcodeedit"+i).keyup(function(){
                      $(this).removeAttr('style');
                  });
              }
            }
        }
        
        if(flag_edit == false)
        {
            return false;
        }
        else
        { 
            $("#account_gst_num_edit").val(totalgst_edit);

            var formdata = $('form');
            form = new FormData(formdata[0]);

            if($("div[data-name='doyouhavegstnum'] .field").find('span').text()=='Yes')
            {
                form.append('have_gst', $("div[data-name='doyouhavegstnum'] .field").find('span').text());
            }

            if($("select[data-name='doyouhavegstnum']").val() == 'Yes')
            {
                form.append('have_gst', $("select[data-name='doyouhavegstnum']").val());
            }

            if($("#totalRec_new").val()==0)
            {
                form.append('have_gst', 'No');
            }

            if($("select[data-name='howmanygstdetails']").val() != '0')
            {
                var howMany_gst = parseInt($("#totalRec_new").val());
            }
            else
            {
                var howMany_gst = $("select[data-name='howmanygstdetails']").val();
            }
            form.append('number_of_gst', howMany_gst);

            $("input[name='gstno_edit_id[]']").each(function() {
              form.append('gstno_edit_id[]', $(this).val()); 
            });
            $("input[name='gstno_edit[]']").each(function() {
              form.append('gstno_edit[]', $(this).val()); 
            });
            $("textarea[name='acc_gstAddressStreet_edit[]']").each(function() {
              form.append('acc_gstAddressStreet_edit[]', $(this).val()); 
            });
            $("input[name='acc_gstAddressCity_edit[]']").each(function() {
              form.append('acc_gstAddressCity_edit[]', $(this).val()); 
            });
            $("input[name='acc_gstAddressState_edit[]']").each(function() {
              form.append('acc_gstAddressState_edit[]', $(this).val()); 
            });
            $("input[name='acc_gstAddressPostalCode_edit[]']").each(function() {
              form.append('acc_gstAddressPostalCode_edit[]', $(this).val()); 
            });

            /*for (var value of form.values()) {
                console.log(value); 
            }
            return false;*/

            if($("select[data-name='doyouhavegstnum']").val() == 'Yes')
            {
              $.ajax({
                  type    : "POST",
                  url     : "../../client/res/templates/financial_changes/account_gst_fields.php",
                  dataType  : "json",
                  processData : false,
                  contentType : false,
                  data:form,
                  success: function(data){

                  }
              });
            }
        }
      }

      function cancelHaveGST()
      {   
          if($("select[data-name='doyouhavegstnum']").val() == 'Yes' || $("div[data-name='doyouhavegstnum'] .field").find('span').text() == 'Yes' || $("#havegst_fld").val() == 'Yes')
          {
              $("#last_child_panel_edit").remove();
              $("div[data-name='howmanygstdetails']").show();
              if($("#havegst_fld").val() == 'Yes' && $("#gethowmanygstfld").val() == '0')
              {
                  $("#gethowmanygstfld").val(howmanygst_val);
                  $("div[data-name='howmanygstdetails'] .field").find('span').text(howmanygst_val);
                  how_many_gst(howmanygst_val);
              }
              else
              { 
                  /*var formdata = $('form');
                  form = new FormData(formdata[0]);
                  $.ajax({
                      type    : "POST",
                      url     : "../../client/res/templates/financial_changes/account_gst_fields.php",
                      dataType  : "json",
                      processData : false,
                      contentType : false,
                      data:form,
                      success: function(data){

                      }
                  });   
                  $("#last_child_panel_edit").show();
                  $("#gethowmanygstfld").val(howmanygst_val);
                  $("#totalGSTCntChanged").val(0);
                  $("div[data-name='howmanygstdetails'] .field").find('span').text(howmanygst_val);
                  how_many_gst(howmanygst_val);*/

                  $.ajax({
                    url: "../../client/res/templates/financial_changes/account_gst_fields_fetch.php?account_id="+hash,
                    type: "post", 
                    dataType: 'json',
                    async: false,
                    success: function(result)
                    {
                      if(result)
                      {
                          $(".middle").append(result);
                          $("textarea[data-name='description']").closest('input#totalGSTCnt').remove();
                          $("textarea[data-name='description']").closest('input#staticValChanged').remove();
                      }
                      else
                      {
                        if($("#totalGSTCntChanged").val() == $("#gethowmanygstfld").val()){
                          var totalVal = $("#gethowmanygstfld").val();
                        }
                        else
                        {
                          var totalVal = $("#totalGSTCnt").val();
                        }
                        how_many_gst(totalVal);
                      }
                    }
                  });
              }
          }
          else
          {
              $("div[data-name='howmanygstdetails']").hide();
              $("#last_child_panel_edit").hide();
          }

          /*if($("div[data-name='howmanygstdetails'] .field").find('span').text() == 'None')
          { 
              if($("#totalRec").val())
              {
                $("div[data-name='howmanygstdetails']").show();
                $("#last_child_panel_edit").show();
                $("div[data-name='howmanygstdetails'] .field").find('span').text($("#totalRec").val());
                $("select[data-name='howmanygstdetails']").val($("#totalRec").val());
              }
              else
              {
                $("div[data-name='howmanygstdetails']").hide();
                $("#last_child_panel_edit").hide();
              }    
          }
          else
          { 
              if($("select[data-name='doyouhavegstnum']").val() == 'Yes' && $("div[data-name='howmanygstdetails'] .field").find('span').text() == 'None')
              {     
                  //$("div[data-name='howmanygstdetails']").hide();
                  $("#last_child_panel_edit").hide();
              }
              else
              {
                  if($("#changedHaveGST").val() == 'Yes')
                  {
                      $("div[data-name='howmanygstdetails']").show();
                      $("#last_child_panel_edit").show();
                  }
                  else
                  { 
                      var tot_fld_len = ($("#totalGSTCntChanged").val()) ? $("#totalGSTCntChanged").val() : 'None';
                      
                      $("select[data-name='howmanygstdetails'] option").removeAttr('selected'); 
                      $("select[data-name='howmanygstdetails'] option").removeAttr('disabled'); 
                      $("select[data-name='howmanygstdetails'] option[value='"+tot_fld_len+"']").attr("selected", "selected");
                      $("div[data-name='howmanygstdetails'] .field").find('span').text(tot_fld_len);
                      $("select[data-name='howmanygstdetails']").val(tot_fld_len);

                      if($("#totalRec_new").val()==0)
                      { 
                          $("select[data-name='doyouhavegstnum'] option").removeAttr('selected'); 
                          $("select[data-name='doyouhavegstnum'] option").removeAttr('disabled'); 
                          $("select[data-name='doyouhavegstnum'] option[value='No']").attr("selected", "selected");
                          $("div[data-name='doyouhavegstnum'] .field").find('span').text('No');
                          $("select[data-name='doyouhavegstnum']").val('No');
                      }

                      $("div[data-name='howmanygstdetails']").hide();
                      $("#last_child_panel_edit").remove();
                      $("#totalGSTCntChanged").val(0);
                      $(".middle #totalRec_new").val(0);
                  }
              }
          }*/
      }

      function checkGSTCount(){
        var have_gst = $("select[data-name='howmanygstdetails']").val();
        if(have_gst == '0')
        {
          $("#howmanygstdetails").css('border-color', '#ad4846');
          $("#howmanygstdetails").focus();
          return false;
        }
        else
        {
          $("#howmanygstdetails").removeAttr('style');
          return true;
        }
      }
  }
</script>
