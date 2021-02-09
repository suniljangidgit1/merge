<div class="list-container">
    <div class="list list-expanded">
        <ul class="list-group things">
        </ul>
    </div>
</div>


<script >

    // ################ TODAYS COUNT ################ 

    // Get todays to do things
    function getThingdToDoToday() {

        $(".things").html('');

        $.ajax({
            url         : "../../../../../client/res/templates/custom_dashboard/overviewAjaxController.php",
            type        : "GET",
            dataType    : "JSON",
            data        : { methodName : "getThingdToDoToday", parameters : "true" },
            /*processData : false,
            contentType : false,*/
            success     : function(response) {

                if( response.status == "true" ){
                    // console.log(response.msg);
                    $(".things").html(response.data.html);
                }else{
                    // console.log(response.msg);
                    // $(".things_no_data").html('No Data');
                    $(".things").html('<li data-id="" class="container list-group-item list-row" style="font-size:14px !important;">No Data</li>');
                }
            },
        });
    } 


    getThingdToDoToday();

    // ################ TODAYS COUNT ################ 
   
    
</script>