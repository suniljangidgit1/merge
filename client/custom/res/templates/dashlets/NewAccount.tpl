<div class="list-container account_no_data">
   <div class="list list-expanded">
      <ul class="list-group new_account">
         
      </ul>
   </div>
</div>

<script>
  // Get todays task count
  function getNewlyAccounts( filterUser="", filterTeam = "" , filterDate = "" ) {
     var filterDate = $("#daterange").val();
    $.ajax({
      url     : "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
      type    : "GET",
      dataType  : "JSON",
      data    : { methodName : "getNewlyAccounts", parameters : "true", filterUser : filterUser, filterTeam : filterTeam , filterDate: filterDate},
      /*processData : false,
          contentType : false,*/
      success   : function(response) {

        if( response.status == "true" ){
          $(".list").find(".new_account").html(response.data.htmlOfLi);
        }else{
          // console.log(response.msg);
          $(".list").find(".new_account").html('<li class="container list-group-item list-row" style="font-size:14px !important;">No Data</li>');
          // $(".account_no_data").html('No Data');
        }
      },
    });
  } 

getNewlyAccounts();

$(document).on("change",".users",function(){
  $(".teams").val("");
  var filterUser = $(".users").val();
  var filterTeam = $(".teams").val();
  var filterDate = $("#daterange").val();
  getNewlyAccounts( filterUser, filterTeam , filterDate );
});

$(document).on("change","#daterange",function(){
  var filterUser = $(".users").val();
  var filterTeam = $(".teams").val();
  var filterDate = $("#daterange").val();
  
  getNewlyAccounts( filterUser, filterTeam , filterDate );
});

$(document).on("change",".teams",function(){
  $(".users").val("");
  var filterUser = $(".users").val();
  var filterTeam = $(".teams").val();
  var filterDate = $("#daterange").val();
  
  getNewlyAccounts( filterUser, filterTeam , filterDate );
});
</script>

