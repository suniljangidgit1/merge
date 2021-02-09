<input id="boolinput" type="checkbox"{{#ifEqual searchParams.type 'isTrue'}} checked{{/ifEqual}} data-name="{{name}}" class="main-element">
<script>
	$(document).on("change", "#boolinput", function(){
		$('button[data-action="search"]').trigger('click');
	});
</script>
