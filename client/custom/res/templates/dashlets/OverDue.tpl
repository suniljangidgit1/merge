

<div class="list-container" style="padding: 0px !important;">
   <div class="row">
      <div class="col-xs-12">
         <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#home" class="home">Task (0)</a></li>
            <li class="active"><a data-toggle="tab" href="#menu1" class="menu1">Meetings (0)</a></li>
            <li><a data-toggle="tab" href="#menu2" class="menu2">Calls (0)</a></li>
         </ul>
         <div class="tab-content">
            <div id="home" class="tab-pane fade">
                <div class="">
                  <div class="list list-expanded">
                     <ul class="list-group overtasks">
                        
                     </ul>
                  </div>
               </div>
            </div>
            <div id="menu1" class="tab-pane fade in active">
               <div class="">
                  <div class="list list-expanded">
                     <ul class="list-group overmettings">
                        
                     </ul>
                  </div>
               </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="">
                  <div class="list list-expanded">
                     <ul class="list-group overcalls">
                        
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script >

   // ################ Overdews ################ 

   // Get Overdew tasks
   function getOverdueTask() {

      $.ajax({
         url         : "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
         type     : "GET",
         dataType : "JSON",
         data     : { methodName : "getOverdueTask", parameters : "true" },
         // processData : false,
         // contentType : false,
         success  : function(response) {
             
            if( response.status == "true" ){
               $("#home").find(".overmettings").html('');
               $(".home").html("");
               $("#home").find(".overtasks").html(response.data.htmlOfLi);
               $(".home").html("Task("+response.data.count+")");
            }else{
            $("#home").find(".overmettings").html('');
            $(".home").html("");
            //$("#home").find(".overtasks").html('<tr><td class="" colspan="5" >No Data</td></tr>');
            $("#home").find(".overtasks").html('<li data-id="" class="container list-group-item list-row" style="border:none !important;">No Data</li>');
            $(".home").html("Task(0)");
            
            }
         },
      });
   } 

   // Get Overdew calls
   function getOverdueCall() {

      $.ajax({
         url         : "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
         type     : "GET",
         dataType : "JSON",
         data     : { methodName : "getOverdueCall", parameters : "true" },
         /*processData : false,
            contentType : false,*/
         success  : function(response) {
            if( response.status == "true" ){
               $("#menu2").find(".overmettings").html('');
               $(".menu2").html("");
               $("#menu2").find(".overcalls").html(response.data.htmlOfLi);
               $(".menu2").html("Call("+response.data.count+")");
            }else{
               $("#menu2").find(".overmettings").html('');
               $(".menu2").html("");
               // console.log(response.msg);
               //$("#menu2").find(".overcalls").html('<tr><td class="" colspan="5" >No Data</td></tr>');
               $("#menu2").find(".overcalls").html('<li data-id="" class="container list-group-item list-row" style="border:none;">No Data</li>');
               $(".menu2").html("Call(0)");
                
            }
         },
      });
   } 

   // Get Overdew meetings
   function getOverdueMeeting() {

      $.ajax({
         url         : "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
         type     : "GET",
         dataType : "JSON",
         data     : { methodName : "getOverdueMeeting", parameters : "true" },
         /*processData : false,
            contentType : false,*/
         success  : function(response) {

            if( response.status == "true" ){
               $("#menu1").find(".overmettings").html('');
               $(".menu1").html("");
               $("#menu1").find(".overmettings").html(response.data.htmlOfLi);
               $(".menu1").html("Meetings("+response.data.count+")");
            }else{
              $("#menu1").find(".overmettings").html('');
              $(".menu1").html("");
            //$("#menu1").find(".overmettings").html('<tr><td class="" colspan="5" >No Data</td></tr>');
            $("#menu1").find(".overmettings").html('<li data-id="" class="container list-group-item list-row" style="border:none;">No Data</li>');
               $(".menu1").html("Meetings(0)");
               // console.log(response.msg);
                
            }
         },
      });
   } 

   


   getOverdueTask();
   getOverdueCall();
   getOverdueMeeting();
   

   // ################ OVERDEW ################ 
   
   
</script>
