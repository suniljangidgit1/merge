<select id="enumselect" class="form-control search-type input-sm" style="display:none;">
    {{options searchTypeList searchType field='searchRanges'}}
</select>
<div class="input-container statuspriorities"><input id="enumselect" class="main-element" type="text"></div>

<script>
	$(document).on("change", "#enumselect", function(){
		$('button[data-action="search"]').trigger('click');
	});

	// $(document).on('click','.add-filter',function(){
		//function addPlaceholder(e){
        //var a = e;
        /*var filterplaceholder = sessionStorage.getItem("key");
        alert(filterplaceholder);
        	$('.statuspriorities .selectize-input input').attr('placeholder',filterplaceholder);
        	$('.statuspriorities .selectize-input input').css('width','100%');*/
        
        
	        //}
    // });

    /*$('.filter.filter-status[data-name="status"] .statuspriorities .selectize-input input').attr('placeholder','djdfhj');
    $('.filter.filter-status[data-name="status"] .statuspriorities .selectize-input input').css('width','100%');*/
</script>