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
    
    
        
    $('div[data-name="assignedUser"] a').addClass('myclass');
    $('span[data-name="createdBy"] a').addClass('myclass');
    $('span[data-name="modifiedBy"] a').addClass('myclass');
//    $('span .text-muted').addClass('myclass');

    $(".myclass").click(function(){
        var val1= $(this).attr('href');
        //alert(val1);

         $.ajax({
          url: "../../client/res/templates/record/getDeletedUserList.php", 
         data:{id:val1},
        success: function(result)
        {
            if(result==1){
                $.alert({
                    title: 'Warning!',
                    content: 'User deleted',
                    type: 'dark',
                    typeAnimated: true
                });

                  window.location.href='#Task';
            }else{

            }
       
        }

        });
        
    });
    

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
                 $.ajax({url: "../../../../client/src/views/record/closed_show_hide.php", success: function(result)
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
         $.ajax({url: "../../../../client/src/views/record/disabled_closed_show_hide.php", success: function(result)
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
            $.ajax({url: "../../../../client/src/views/record/closing_status_show_hide.php", success: function(result)
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
 $.ajax({url: "../../../../client/src/views/record/started_show_hide.php", success: function(result)
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
        content: 'Are you Sure, you want to Close the task',
            buttons: {
        Yes: function () {

   $.ajax({url: "../../../../client/res/templates/update_status.php", success: function(result)
            {
            if(result==1)
            {

             

                   $.confirm({
        title: 'Success!',
        content: 'Status updated!',
            buttons: {
        Ok: function () {
           window.location.href = "http://fincrm.net/finnovaadvisory/#Task";
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
        content: 'Are you Sure, you want to Close the task',
            buttons: {
        Yes: function () {
            
             $.ajax({url: "../../client/res/templates/update_status.php", success: function(result)
            {
            if(result==1)
            {

             

                   $.confirm({
        title: 'Success!',
        content: 'Status updated!',
            buttons: {
        Ok: function () {
           window.location.href = "http://fincrm.net/finnovaadvisory/#Task";

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
          $.ajax({url: "../../../../client/res/templates/started_update_status.php", success: function(result)
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


            $.ajax({url: "../../client/res/templates/started_update_status.php", success: function(result)
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
            $.ajax({url: "../../../../client/res/templates/completed_update_status.php", success: function(result)
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

            $.ajax({url: "../../client/res/templates/completed_update_status.php", success: function(result)
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
<script type="text/javascript">
    $(".detail #test button[data-action='edit']").css("border-top-right-radius","0px");
    $(".detail #test button[data-action='edit']").css("border-bottom-right-radius","0px");
</script>

<div class="detail" id="{{id}}">

    {{#if buttonsTop}}
    <div  class="detail-button-container button-container record-buttons clearfix" >

        <div id="test" style="display:none;margin-bottom:0px;" class="btn-group" role="group">
            {{#each buttonList}}{{button name scope=../../entityType label=label style=style hidden=hidden html=html}}{{/each}}
            {{#if dropdownItemList}}


            <button type="button" class="btn btn-primary edit_detail_page dropdown-toggle dropdown-item-list-button{{#if dropdownItemListEmpty}} hidden{{/if}}" data-toggle="dropdown">
                <span class="caret"></span>

            </button>
            
            <ul class="dropdown-menu pull-left">
                {{#each dropdownItemList}}
                <li class="{{#if hidden}}hidden{{/if}}"><a href="javascript:" class="action" data-action="{{name}}">{{#if html}}{{{html}}}{{else}}{{translate label scope=../../entityType}}{{/if}}</a></li>
                {{/each}}
            </ul>
            {{/if}}

        </div>

       
        <div id="closing_status" style="display:none">
            <span class="btn btn-default_blue">Pending for closure</span>
        </div>

        <button id="copy" class="btn btn-default_blue"  data-target="#copyData" style="position:relative;  left:5px;" onclick="callCopyEntityPage()" >Copy</button>


        <button class="btn btn-default_blue" id="closed" style="position:relative;display:none" onclick="update_status()" >Mark Closed</button>

      

        <button class="btn btn-default_blue" id="started" style="position:relative;display:none;" onclick="started_update_status()" >Mark Started</button>

         <button class="btn btn-default_blue" id="completed" style="position:relative;display:none;" onclick="completed_update_status()" >Mark Completed</button>


        {{#if navigateButtonsEnabled}}
        <div class="pull-right">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default_blue action {{#unless previousButtonEnabled}} disabled{{/unless}}" data-action="previous" title="{{translate 'Previous Entry'}}">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </button>
                <button type="button" class="btn btn-default_blue action {{#unless nextButtonEnabled}} disabled{{/unless}}" data-action="next" title="{{translate 'Next Entry'}}">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </button>
            </div>
        </div>
        {{/if}}
        
         <button type="button" id="oppurtunity_form1" class="btn btn-primary " data-toggle="modal" data-target="#oppurtunity_form" style="float:right;display:none"> Convert to Opportunity</button>
         <button type="button" id="cac" class="btn btn-primary" style="float:right;display:none"> Convert to Account & Contact</button>
        
    </div>
    <div class="detail-button-container button-container edit-buttons hidden clearfix">
        <div class="btn-group" role="group">
        {{#each buttonEditList}}{{button name scope=../../entityType label=label style=style hidden=hidden html=html}}{{/each}}
        {{#if dropdownEditItemList}}
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu pull-left">
            {{#each dropdownEditItemList}}
            <li class="{{#if hidden}}hidden{{/if}}"><a href="javascript:" class="action" data-action="{{name}}">{{#if html}}{{{html}}}{{else}}{{translate label scope=../../entityType}}{{/if}}</a></li>
            {{/each}}
        </ul>
        {{/if}}
        </div>
    </div>
    {{/if}}
	
	<div class="row">
        <div class="{{#if isWide}} col-md-12{{else}}{{#if isSmall}} col-md-7{{else}} col-md-8{{/if}}{{/if}}">
            <div class="middle">{{{middle}}}</div>
            <div class="extra">{{{extra}}}</div>
            <div class="bottom">{{{bottom}}}</div>
        </div>
        <div class="side {{#if isWide}} col-md-12{{else}}{{#if isSmall}} col-md-5{{else}} col-md-4{{/if}}{{/if}}">
        {{{side}}}
        </div>
    </div>

    {{#if buttonsBottom}}
    <div class="button-container record-buttons">
        <div class="btn-group" role="group">
        {{#each buttonList}}{{button name scope=../../entityType label=label style=style html=html}}{{/each}}
        {{#if dropdownItemList}}
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu pull-left">
            {{#each dropdownItemList}}
            <li><a href="javascript:" class="action" data-action="{{name}}">{{#if html}}{{{html}}}{{else}}{{translate label scope=../../entityType}}{{/if}}</a></li>
            {{/each}}
        </ul>
        </div>
        {{/if}}
    </div>
    </div>
    <div class="detail-button-container button-container edit-buttons hidden">
        <div class="btn-group" role="group">
        {{#each buttonEditList}}{{button name scope=../../entityType label=label style=style html=html}}{{/each}}
        {{#if dropdownEditItemList}}
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu pull-left">
            {{#each dropdownEditItemList}}
            <li><a href="javascript:" class="action" data-action="{{name}}">{{#if html}}{{{html}}}{{else}}{{translate label scope=../../entityType}}{{/if}}</a></li>
            {{/each}}
        </ul>
        {{/if}}
        </div>
    </div>
    {{/if}}
</div>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="copyData" role="dialog">
    <div class="modal-dialog copyEntity" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Copy Entity</h4>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
					<div class="col-md-8">
						<select class="form-control "  name="entityList">
                            <option>Select Entity</option> 
							{foreach from=$query item=item key=key}
								<option value='{$item.entity_name}'>{$item.entity_name}</option>
							{/foreach} 
						</select>
					</div>
					<div class="col-md-4">
                        <button type="submit" class="btn btn-danger form-control" value="Copy Record">Copy Record</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


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
    <form action="client/res/templates/save_oppurtunity.php" method="post" enctype='multipart/form-data'>
        <input type="hidden"  name="lead_id" id="lead_id" class="form-control" placeholder="" >

          <div class="container">
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
                    <label >Project Name<span class="text-danger">*</span></label>
                      <input type="text"  name="name" id="" class="form-control" placeholder="Name" required>
                   </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label >Stage<span class="text-danger">*</span></label>
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
                    <label for="">Amount<span class="text-danger">*</span></label>
                      <div class="input-group">
                        <input id="" type="text" class="form-control" name="amount" placeholder="" required>
                        <span class="input-group-addon" style="padding: 0px;">
                        <select name="amount_sign" style="padding: 5px 3px;border: none;">
                          <option>INR</option>
                        </select>
                        </span>
                        
                      </div>
                   </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label >Probability % <span class="text-danger">*</span></label>
                      <input type="text"  name="probability" id="probability" class="form-control" value="10" placeholder="probability" required>
                   </div>
                </div>
              </div>



              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label >Close Date<span class="text-danger require">*</span></label>
                      <div class="input-group date" data-date-format="dd.mm.yyyy">
                       <input value=""  type="text" id="closeddate" name="closeddate" class="form-control" placeholder="Select Date"  >
                          <div class="input-group-addon" >
                              <span class="glyphicon glyphicon-calendar"></span>
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
                      <input type="text"  name="Phone" id="phone" class="form-control" minlength="10"  maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Phone">
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
                            <input type="text"  name="postal_code" id="postal_code" class="form-control postal_code" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  onblur="postal_code()">
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


<script>
var hash=window.location.hash;
hash.indexOf(2);
hash.toLowerCase();
hash = hash.split("/")[2];

var afterhash=window.location.hash;
afterhash.indexOf(0);
afterhash.toLowerCase();
afterhash = afterhash.split("/")[0];

if(afterhash=='#Lead')
{
    $("#oppurtunity_form1").css("display","inline-block");

    $.ajax({
    url: "../../client/res/templates/fetch_lead_data.php?id="+hash,
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
$("#phone").blur(function(){
    
 var no=$("#phone").val();

if(no!='' && no.length!=10)
{

  $.confirm({
        title: 'Warning!',
        content: 'Please Enter 10 Digit Mobile Number',
            buttons: {
        Ok: function () {
           $("#phone").val("");
            }
        }

    });
  
}

});

  </script>

    <script>
        $("#email").blur(function(){
            
        var email=$("#email").val();

       if(email!='' && IsEmail(email)==false)
            {

              $.confirm({
                    title: 'Warning!',
                    content: 'Please Enter Valid Email Address',
                        buttons: {
                    Ok: function () {
                       $("#email").val("");
                        }
                    }

                });
            }

        function IsEmail(email) {
          var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if(!regex.test(email)) {
            return false;
          }else{
            return true;
          }
        }

        });

  </script>

   <script type="text/javascript">

        $(".require").hide();
      
        $(document).on('change',"#stage", function(){ 
            var item = this.value ;
            
            if(item =='Prospecting')
            {
                 $("#probability").val("10")
            }
            else if(item =='Qualification')
            {
                 $("#probability").val("20")
            }
            else if(item =='Proposal')
            {
                 $("#probability").val("50")
            }
            else if(item =='Negotiation')
            {
                 $("#probability").val("80")
            }
            else if(item =='Closed Won')
            {
                 $("#probability").val("100")
            }
            else if(item =='Closed Lost')
            {
                 $("#probability").val("0")
            }

            
            if(item =='Closed Won' || item =='Closed Lost' ){
                $("#closeddate").attr("required","required");
                $(".require").show();
            }
            
             else if(item =='Prospecting' || item =='Qualification' || item =='Proposal'|| item =='Negotiation'){
                $("#closeddate").removeAttr("required","required");
                $(".require").hide();
            }

           });
    </script>


    <!-- Create Estimate Postal code valiadtion Script -->
<script>
      function postal_code(){
        var val1 = $('#postal_code').val();
   
        if(val1==""){
          $.alert({
                  title: 'Alert!',
                  content: 'Please enter postal code',
                   type: 'dark',
                   typeAnimated: true
              });
        }
        else{
          if (/^\d{6}$/.test(val1)) {
              
          } else {
              $.alert({
                    title: 'Alert!',
                    content: 'Postal code must be of 6 digits',
                     type: 'dark',
                     typeAnimated: true,
                     buttons: {
                      ok: function () {
                      if(val1){
                        $('#postal_code').val("");
                      }
                          
                      }
                    }
                });
             }
        }
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


        window.location='http://'+domain_name+'/'+folder_name+'/client/res/templates/convert_account_contact.php?id='+hash; 

        

    });
    </script>
    
    <script>

count=0;
$("#closeddate").on("change", function(){
count++;
var GivenDate = $("#closeddate").val();
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
CurrentDate = dd + '/' + mm + '/' + yyyy;

var stage=$("select[name=stage]").val();
;
if(GivenDate > CurrentDate && (stage=='Closed Won' || stage=='Closed Lost')){
if(count==3)
{ 
$.confirm({
        title: 'Warning!',
        content: 'You can not select future date',
     buttons: {
        Ok: function () {
             $("#closeddate").val("");
             delete(count);
             count=0;
            }
        }

    }); 

    }
}
else
{
    if(count==3)
{ 
delete(count);
count=0;
}
}
});

</script>


