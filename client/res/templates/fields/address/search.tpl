
<input type="text" id="addressinput" class="main-element form-control input-sm" data-name="{{name}}" value="{{searchData.value}}" {{#if params.maxLength}} maxlength="{{params.maxLength}}"{{/if}}{{#if params.size}} size="{{params.size}}"{{/if}} autocomplete="espo-{{name}}">

<script>
	$(document).on("keyup", "#addressinput", function(){
		$('button[data-action="search"]').trigger('click');
	});
</script>