

<script>

var afterhash = window.location.hash;


if(afterhash=='#ClosedTask')
{
$(".actions").css("visibility","hidden");
$(".view-mode-switcher-buttons-group").css("visibility","hidden");

}

    $( 'td[data-name="assignedUser"]' ).each(function() {
    $('[data-name="assignedUser"] a').addClass('myclass');
   
    });


        var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2];

if(first=='portal')
{
var afterhash = window.location.hash;
if(afterhash=='#Estimates' || afterhash=='#Invoice' || afterhash=='#Payments')
{

            $('.action[data-action=quickView]').css("display","none");
            $('.action[data-action=quickEdit]').css("display","none");
            $('.action[data-action=quickRemove]').css("display","none");

            }
               
 
}
else
{
var afterhash = window.location.hash;
if(afterhash=='#Estimates' || afterhash=='#Invoice' || afterhash=='#Payments')
{

            $('.action[data-action=quickView]').css("display","none");
            $('.action[data-action=quickEdit]').css("display","none");
            }
               
    }

   
    
</script>


<script>
    $(".table").on("click", ".schedulartb .list-row .cell .myclass", function(){
        //alert("Hii");
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
            }
            else{

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

if(first=='portal')
{

$('td[data-name="assignedUser"]').addClass('myclass');
 $('.myclass a').removeAttr('href');
    
 $('div[data-name="assignedUser"]').addClass('myclass');
 $('.myclass a').removeAttr('href');

 $('span[data-name="createdBy"]').addClass('myclass');
 $('.myclass a').removeAttr('href');

 $('span[data-name="modifiedBy"]').addClass('myclass');
 $('.myclass a').removeAttr('href');

 $('span .text-muted .message').addClass('myclass');
 $('.myclass a').removeAttr('href');
 
 $('span[data-name="assignedUser"]').addClass('myclass');
 $('.myclass a').removeAttr('href');
}
</script> 

<script>

var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2];

var afterhash = window.location.hash;


 if(first=='portal')
    {


    
       if(afterhash=='#Task')
        {

             $("#show_closed").css("display","block");
        }
        else 
        {
             $("#show_closed").css("display","none");
        }
   
    }
    else
    {
 if(afterhash=='#Task')
{

             $("#show_closed").css("display","block");
        }
        else 
        {
             $("#show_closed").css("display","none");
        }
   
   
        }
        


// $(document).ready(function(){
   // alert("Hii");
   
// });





function pop_upForTask(url)
{
     var url="/#ClosedTask";
                window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=900,height=700,directories=no,location=no') 
}
</script>
    

{{#if collection.models.length}}

{{#if topBar}}
<div class="col-md-12 col-sm-12 col-xs-12 list-buttons-container clearfix" style="padding: 0px 15px;">


    {{#if paginationTop}}
    <div>
        {{{pagination}}}
    </div>
    {{/if}}

    {{#if checkboxes}}
    {{#if massActionList}}
    
	  <div class="btn-group actions" style="margin-left: 0px;">

		<button type="button" class="btn btn-primary dropdown-toggle actions-button hidden" data-toggle="dropdown" style="margin-right:10px;">
        {{translate 'Actions'}}
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" style="text-align: left;">
            {{#each massActionList}}
            <li><a href="javascript:" data-action="{{./this}}" class='mass-action'>{{translate this category="massActions" scope=../scope}}</a></li>
            {{/each}}
        </ul>

         <button type="button"  class="btn btn-primary" id="show_closed" style="position:relative;display:none;" onclick="pop_upForTask(this);" >Show Closed Data</button>

    </div>

    {{/if}}
    {{/if}}

     {{#if displayTotalCount}}
        

        <div class="text-muted total-count" style="margin-bottom: 10px;">
         {{!--<button class="btn btn-primary" id="show_closed" style="position:relative;border-radius: 4px;display:none;margin-bottom: 13px;" onclick="pop_upForTask(this);" >Show Closed Data</button>--}}

        {{translate 'Total'}}: <span class="total-count-span">{{collection.total}}</span>

        </div>
    {{/if}}

    {{#each buttonList}}
        {{button name scope=../../scope label=label style=style}}
    {{/each}}
</div>
{{/if}}

<div class="list list-width mlr-0"  style="margin-left: 0px;box-shadow:unset;border-radius: 15px;">
    <table class="table">
        {{#if header}}
        <thead class="schedularth">
            <tr>
                {{#if checkboxes}}
                <th width="45" data-name="r-checkbox">
                    <span class="select-all-container"><input type="checkbox" class="select-all"></span>
                    {{#unless checkAllResultDisabled}}
                    <div class="btn-group checkbox-dropdown">
                        <a class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:" data-action="selectAllResult">{{translate 'Select All Results'}}</a></li>
                        </ul>
                    </div>
                    {{/unless}}
                    
                    

                </th>
                {{/if}}
                {{#each headerDefs}}
                <th {{#if width}} width="{{width}}"{{/if}}{{#if align}} style="text-align: {{align}};"{{/if}}>
                    {{#if this.sortable}}
                        <a href="javascript:" class="sort" data-name="{{this.name}}">{{#if this.hasCustomLabel}}{{this.customLabel}}{{else}}{{translate this.name scope=../../../collection.name category='fields'}}{{/if}}</a>
                        {{#if this.sorted}}{{#if this.asc}}<span class="caret"></span>{{else}}<span class="caret-up"></span>{{/if}}{{/if}}
                    {{else}}
                        {{#if this.hasCustomLabel}}
                            {{this.customLabel}}
                        {{else}}
                            {{translate this.name scope=../../../collection.name category='fields'}}
                        {{/if}}
                    {{/if}}
                </th>
                {{/each}}
            </tr>
        </thead>
        {{/if}}
        <tbody class="schedulartb">
        {{#each rowList}}
            <tr data-id="{{./this}}" class="list-row">
            {{{var this ../this}}}
            </tr>
            
            
            
        
        {{/each}}
        </tbody>
    </table>
    {{#unless paginationEnabled}}
    {{#if showMoreEnabled}}
    <div class="show-more{{#unless showMoreActive}} hide{{/unless}} show-more-btn-table">
        <a type="button" href="javascript:" class="btn btn-default btn-block" data-action="showMore" {{#if showCount}}title="{{translate 'Total'}}: {{collection.total}}"{{/if}}>
            {{#if showCount}}
            <div class="pull-right text-muted more-count">{{moreCount}}</div>
            {{/if}}
            <span>{{translate 'Show more'}}

           
            </span>
        </a>
    </div>
    {{/if}}
    {{/unless}}
</div>

{{#if bottomBar}}
<div>
{{#if paginationBottom}} {{{pagination}}} {{/if}}
</div>
{{/if}}

{{else}}
    {{translate 'No Data'}}
{{/if}}


<script>
// window.location.reload();

$(".action[data-action=quickedit],.action[data-action=quickEdit]").click(function(){

var afterhash = window.location.hash;

if(afterhash=='#Task')
{

var task_id=$(this).attr('data-id');

var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2]; 

if(first=='portal')
{
$.ajax({
url: "../../../../client/src/views/record/row-actions/edit_hide_show.php",
type: "get", 
async: false,
data: { task_id: task_id, },
success: function(result)
{
assign_val(result);
}

});
}
else
{
$.ajax({
url: "../../client/src/views/record/row-actions/edit_hide_show.php",
type: "get", 
async: false,
data: { task_id: task_id, },
success: function(result)
{
assign_val(result);
}


});
}

function assign_val(result)
{
sessionStorage.removeItem("result_val"); 
sessionStorage.setItem("result_val",result); 
}

if(sessionStorage.length != 0) 
{
var result_val1=sessionStorage.getItem("result_val");
}

if(result_val1==1)
{
$(this).attr("href", "#Task/edit/"+task_id);
$(this).data('action','quickEdit');
$(".action[data-action=quickEdit]")[0].click();
}
else
{
$.confirm({
title: 'Warning!',
content: 'You are not allowed to edit this task!',
buttons: {
Ok: function () {


},

}

});
}
}
});
</script>
 <script>

</script>

