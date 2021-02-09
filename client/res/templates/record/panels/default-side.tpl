<script>
var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2];

if(first=='portal'){
    $('.follow').css("display","none");
}
else{
    $.ajax({
        url: "../../client/src/views/record/row-actions/hide_view_edit_followers.php",
        type: "get", 
        async: false,
        success: function(result)
        {
                if(result==2)
                {
                $('.follow').css("display","none");
                //$('.action[data-action=quickEdit]').css("display","none");
                }
                   
        }

    });
}
</script>

<div class="panel-heading  default-side-panel" style=""><h4 class="panel-title">Overview</h4></div>




{{#unless complexDateFieldsDisabled}}
<div class="row">
    {{#if hasComplexCreated}}
    <div class="cell form-group col-sm-6 col-md-12" data-name="complexCreated">
        <label class="control-label" data-name="complexCreated"><span class="label-text">{{translate 'Created'}}</span></label>
        <div class="field" data-name="complexCreated">
            <span data-name="createdAt" class="field">{{{createdAtField}}}</span> <span class="text-muted">&raquo;</span> <span data-name="createdBy" class="field">{{{createdByField}}}</span>
        </div>
    </div>
    {{/if}}
    {{#if hasComplexModified}}
    <div class="cell form-group col-sm-6 col-md-12" data-name="complexModified">
        <label class="control-label" data-name="complexModified"><span class="label-text">{{translate 'Modified'}}</span></label>
        <div class="field" data-name="complexModified">
            <span data-name="modifiedAt" class="field">{{{modifiedAtField}}}</span> <span class="text-muted">&raquo;</span> <span data-name="modifiedBy" class="field">{{{modifiedByField}}}</span>
        </div>
    </div>
    {{/if}}
</div>
{{/unless}}


{{#if fieldList.length}}
<div class="row">
{{#each fieldList}}
<div class="cell form-group col-sm-6 col-md-12{{#if hidden}} hidden-cell{{/if}}" data-name="{{name}}">
    <label class="control-label{{#if hidden}} hidden{{/if}}" data-name="{{name}}"><span class="label-text">{{translate name scope=../model.name category='fields'}}</span></label>
    <div class="field{{#if hidden}} hidden{{/if}}" data-name="{{name}}">
    {{{var viewKey ../this}}}
    </div>
</div>
{{/each}}
</div>
{{/if}}

{{#if followersField}}
<div class="row">
    <div class="cell form-group col-sm-6 col-md-12" data-name="followers">
        <label class="control-label" data-name="followers"><span class="label-text">{{translate 'Followers'}}</span></label>
        <div class="row">
            <div class="col-md-10">
                <div class="field" data-name="followers">
                    {{{followersField}}}
                </div>
            </div>
             <div class="col-md-2">
                <div class="" id="" >
                    <a href="#" class="pull-right inline-edit-link follow" onclick="getFollowers()" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-pencil" ></span></a>
                </div>
            </div>
        </div>
    </div>
   
        </div>

{{/if}}



<script>
    function getFollowers(){
        var afterhash = window.location.hash;
        afterhash.indexOf(2);
        afterhash.toLowerCase();
        var entityName= afterhash.split("/")[0];
        var id = afterhash.split("/")[2];
        //alert(entityName);
        //alert(id);
        
        $.ajax({
            url: "../../client/res/templates/record/editFollowers.php", 
            data:{id:id,entityName:entityName},
            success: function(result)
            {
                
                var count= result.length;
                $("#followersList").empty();
                 div = $("<table class='table' style='border:none;'>"); 
                 //div.append("<table class='table'>");
                for(var i=0; i<count; i++){
                    div.append("<tr><td >"+result[i].firstName+" "+result[i].lastName +"</td><td><a href='javascript:void(0);' class='btnRemove' data-update-id='"+result[i].id +"' id='removeFollowers'><span class='glyphicon glyphicon-remove'></span></a></td></tr>");
                }
                 $("#followersList").append(div);
            } 

        });
        
        
    }
</script>
<script>
$(document).ready(function(){
    $(document).on("click",".btnRemove",function()
    {
        $("#myModal1").modal('toggle');
        var id=$(this).data("update-id");
        //alert("IN REMOVE ITEM FUNCTION");
        //alert(id);
        //var msg= confirm("Do you want to remove followers");
            $.confirm({
                    title: 'Warning!',
                    content: 'Do you want to remove followers',
                    type: 'dark',
                    typeAnimated: true,
                buttons:{
                    ok:function(){
                            var afterhash = window.location.hash;
                                afterhash.indexOf(2);
                                afterhash.toLowerCase();
                                var entityName= afterhash.split("/")[0];
                                var record_id = afterhash.split("/")[2];
                                $.ajax({
                                    url: "../../client/res/templates/record/checkFollowers_assignuser.php",
                                    data:{id:id,record_id:record_id,entityName:entityName},
                                    success: function(result)
                                    {
                                        //alert(result);
                                        if(result==2){
                                            //var msg1= confirm("Selected followers and assigned user is same");
                                            
                                            $.confirm({
                                            title: 'Warning!',
                                            content: 'The selected follower is also the assigned user for this record. Do you still want to remove the user ?',
                                            type: 'dark',
                                            typeAnimated: true,
                                            buttons: {
                                                Yes: function () {
                                                    var dataVal="same";
                                                    $.ajax({
                                                        url: "../../client/res/templates/record/removeFollowers.php", 
                                                        data:{id:id,dataVal:dataVal,entityName:entityName,record_id:record_id},
                                                        success: function(result)
                                                        {
                                                            
                                                            if(result==1){
                                                                $.confirm({
                                                                    title: 'Confirm!',
                                                                    content: 'User removed successfully!',
                                                                    type: 'dark',
                                                                    typeAnimated: true,
                                                                    buttons: {
                                                                        ok: function () {
                                                                            window.location.reload();
                                                                        }
                                                                    }
                                                                });
                                                            }
                                                        } 

                                                    });
                                                },
                                                No: function () {
                                                }
                                            }
                                        });
                                            
                                            
                                        
                                        }
                                        if(result==3){
                                            var dataVal="Not Same";
                                                $.ajax({
                                                    url: "../../client/res/templates/record/removeFollowers.php", 
                                                    data:{id:id,dataVal:dataVal,entityName:entityName,record_id:record_id},
                                                    success: function(result)
                                                    {
                                                        //alert(result);
                                                        if(result==1){
                                                        
                                                            $.confirm({
                                                                title: 'Confirm!',
                                                                content: 'User removed successfully!',
                                                                type: 'dark',
                                                                typeAnimated: true,
                                                                buttons: {
                                                                    ok: function () {
                                                                        window.location.reload();
                                                                    }
                                                                }
                                                            });
                                                            
                                                        }else{
                                                            //alert("");
                                                        }
                                                    } 

                                                });
                                        }
                                        
                                    }
                                });
                    },
                    Cancel: function(){
                    }
                }
                });
        
        //alert(msg);
        if(msg==true){
            var afterhash = window.location.hash;
            afterhash.indexOf(2);
            afterhash.toLowerCase();
            var entityName= afterhash.split("/")[0];
            var record_id = afterhash.split("/")[2];
            $.ajax({
                url: "../../client/res/templates/record/checkFollowers_assignuser.php",
                data:{id:id,record_id:record_id,entityName:entityName},
                success: function(result)
                {
                    //alert(result);
                    if(result==2){
                        var msg1= confirm("Selected followers and assigned user is same");
                        if(msg1==true){
                            var dataVal="same";
                            $.ajax({
                                url: "../../client/res/templates/record/removeFollowers.php", 
                                data:{id:id,dataVal:dataVal,entityName:entityName,record_id:record_id},
                                success: function(result)
                                {
                                    //alert(result);
                                    if(result==1){
                                        alert("User removed successfully!");
                                        window.location.reload();
                                    }else{
                                        //alert("");
                                    }
                                } 

                            });
                        }
                    }
                    if(result==3){
                        var dataVal="Not Same";
                            $.ajax({
                                url: "../../client/res/templates/record/removeFollowers.php", 
                                data:{id:id,dataVal:dataVal,entityName:entityName,record_id:record_id},
                                success: function(result)
                                {
                                    //alert(result);
                                    if(result==1){
                                        alert("User removed successfully");
                                        window.location.reload();
                                    }else{
                                        //alert("");
                                    }
                                } 

                            });
                    }
                    
                }
            });
            //$.ajax({
            //  url: "../../client/res/templates/record/removeFollowers.php", 
            //  data:{id:id},
            //  success: function(result)
            //  {
            //      //alert(result);
            //      if(result==1){
            //          alert("Record deleted successfully");
            //          window.location.reload();
            //      }else{
            //          //alert("");
            //      }
            //  } 

            //});
        }
        if(msg==false){
        }
                
        
    }); 
});


    
</script>

<!-- Modal -->
<div class="container">
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog" style="width:380px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Followers List</h4>
        </div>
        <div class="modal-body">
            
                    <div id="followersList" style="height:200px;overflow:auto;"></div>
                
                <div class="" style="margin-top:15px">
                    <button id="addFollowers" class='btn btn-primary addFollowers' onclick="getUserList()" data-toggle="modal" data-target="#addFollowersUser">Add Followers</button>
                        
                </div>
            
        </div>
        
        
      </div>
      
    </div>
  </div>

 </div>
<script>
    function getUserList(){
        //alert("IN GET USER LIST");
        $.ajax({
            url: "../../client/res/templates/record/getUsersList.php", 
            data:{},
            success: function(result)
            {
                //alert(result);
                var count= result.length;
                $("#userList").empty();
                div = $("<table class='table table-bordered'>"); 
                for(var i=0; i<count; i++){
                    div.append("<tr><td><a href='javascript:void(0);' class='addFolloweruser' data-adduser-id='"+result[i].id +"'>"+result[i].firstName+" "+result[i].lastName +"</a></td>/tr>");
                }
                $("#userList").append(div);
            } 
        });
    }   
</script>

<!-- Modal -->
<div id="addFollowersUser" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:380px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User List</h4>
      </div>
      <div class="modal-body">
        <div id="userList" class="userList" style="height:250px;overflow:auto;"></div>
      </div>
      
    </div>

  </div>
</div> 
 <script>
    $(document).ready(function(){
        $(document).on("click",".addFolloweruser",function()
        {
            var id=$(this).data("adduser-id");
            var afterhash = window.location.hash;
            afterhash.indexOf(2);
            afterhash.toLowerCase();
            var entityName= afterhash.split("/")[0];
            var record_id = afterhash.split("/")[2];
            //alert(id);
            //alert(entityName);
            //alert(record_id);
            $.ajax({
                url: "../../client/res/templates/record/addUserTOFollower.php", 
                data:{userid:id,entityName:entityName,record_id:record_id},
                success: function(result)
                {
                    if(result==1){
                        //$.alert("User added to follower");
                        //window.location.reload();
                        $.confirm({
                            title: 'Confirm!',
                            content: 'Follower added successfully!',
                            type: 'dark',
                            typeAnimated: true,
                            buttons: {
                                ok: function () {
                                    window.location.reload();
                                }
                            }
                        });
                    }
                    if(result==2){
                        $.confirm({
                            title: 'Confirm!',
                            content: 'Selected user already exist in follower list!',
                            type: 'dark',
                            typeAnimated: true,
                            buttons: {
                                ok: function () {
                                    window.location.reload();
                                }
                            }
                        });
                    }
                } 
            });
            
            
        });
    });
 </script> 