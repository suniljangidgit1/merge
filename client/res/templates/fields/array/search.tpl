
<select id="arrayselect" class="form-control search-type input-sm">
    {{options searchTypeList searchType field='searchRanges'}}
</select>
<div class="input-container">
    <input class="main-element" type="text" autocomplete="espo-off">
</div>

<script>
	$(document).on("change", "#arrayselect", function(){
		$('button[data-action="search"]').trigger('click');
	});
</script>