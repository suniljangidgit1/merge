<div class="list-container">
   <div class="list list-expanded">
      <ul class="list-group closingmonth">
      </ul>
   </div>
</div>

<script>
   // Get NEW opportunities records
   function getClosingThisMonthRecords(filterUser="", filterTeam="") {
      $(".closingmonth").html("");
      $.ajax({
         url         : "../../../../../client/res/templates/custom_dashboard/opportunitiesAjaxController.php",
         type     : "GET",
         dataType : "JSON",
         data     : { methodName : "getClosingThisMonthRecords", parameters : "true", filterUser : filterUser, filterTeam : filterTeam},
         /*processData : false,
            contentType : false,*/
         success  : function(response) {

            if( response.status == "true" ){
               $(".closingmonth").html(response.data.html);
            }else{
               
            }
         },
      });
   } 
 getClosingThisMonthRecords()

 $(document).on("change",".users", function(){
     $(".teams").val("");
      filterUser = $(".users").val();
      filterTeam = $(".teams").val();
     getClosingThisMonthRecords(filterUser,filterTeam);
     
   });

 $(document).on("change",".teams", function(){
     $(".users").val("");
      filterUser = $(".users").val();
      filterTeam = $(".teams").val();
     getClosingThisMonthRecords(filterUser,filterTeam);
     
   });
</script>