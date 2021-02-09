<script>
$.ajax({
        url: "../../../client/src/views/getLeadeList.php",
        type: "GET", 
        dataType: "json",
        success: function(result)
        {
        	// alert(result);
        	$("div[data-name=addWindow] .dashlet-body").attr("onclick", "getLeadeListForCurrentMonth()");
        	$("div[data-name=addWindow] .dashlet-body").attr("onchange", "getReq()");
            $("div[data-name=addWindow] .dashlet-body").html(result);

        }
    });
</script>