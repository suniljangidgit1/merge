<script type="text/javascript">
	 var afterhash_admin = window.location.hash;
	 
	 if(afterhash_admin == '#Admin'){
	 	$(".page-header").css("background","transparent");
        $(".page-header").css("padding","15px 0px");
	 }
</script>

<div class="page-header"><h3>{{translate 'Administration' scope='Admin'}}</h3></div>

<div class="admin-content">
	<div class="row">
		<div class="col-md-7">
			<div class="admin-tables-container">
				{{#each panelDataList}}
				<div>
					<h4>{{translate label scope='Admin'}}</h4>
					<table class="table table-admin-panel" data-name="{{name}}">
					    {{#each itemList}}
					    <tr>
					        <td>
					        	<div>
					        	{{#if iconClass}}
					        	<span class="icon {{iconClass}}"></span>
					        	{{/if}}
					            <a class="admin_settngs" href="{{#if url}}{{url}}{{else}}javascript:{{/if}}"{{#if action}} data-action="{{action}}"{{/if}}>{{translate label scope='Admin' category='labels'}}</a>
					        	</div>
					        </td>
					        <td>{{translate description scope='Admin' category='descriptions'}}</td>
					    </tr>
					    {{/each}}
					</table>
				</div>
				{{/each}}
			</div>
		</div>
		<!-- <div class="col-md-5 admin-right-column">
            <div class="notifications-panel-container">{{{notificationsPanel}}}</div>
			<iframe src="{{iframeUrl}}" style="width: 100%; height: {{iframeHeight}}px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div> -->
	</div>
</div>

<script type="text/javascript">
	var user_manual = window.location.href; 
    user_manual.indexOf(0);
    user_manual.toLowerCase();
    user_manual = user_manual.split("/")[3];

    $('.admin_settngs').click(function(){
    var UserManual = $(this).text();
    if(UserManual == 'User Manual'){
    	$(this).attr('target','_blank');
    }
    });
</script>