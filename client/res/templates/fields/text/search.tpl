
<select id="textselect" class="form-control search-type input-sm" style="display:none;">
    {{options searchTypeList searchType field='varcharSearchRanges'}}
</select>
<input id="userName" type="text" class="main-element form-control input-sm" data-name="{{name}}" value="{{searchData.value}}" {{#if params.maxLength}} maxlength="{{params.maxLength}}"{{/if}}{{#if params.size}} size="{{params.size}}"{{/if}} autocomplete="espo-{{name}}" placeholder="{{translate 'Value'}}">

<script>
	$(document).on("keyup", "#userName", function(){
		$('button[data-action="search"]').trigger('click');
	});

	$(document).on("change", "#textselect", function(){
		$('button[data-action="search"]').trigger('click');
	});
</script>
