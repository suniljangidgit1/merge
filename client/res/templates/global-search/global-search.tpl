<div class="input-group has-feedback">
    <input id="global-search-input" type="text" class="form-control global-search-input" placeholder="{{translate 'Search'}}" autocomplete="espo-global-search">
    <div class="input-group-btn">
        <a class="btn btn-link global-search-button" data-action="search" title="{{translate 'Search'}}"><span class="material-icons-outlined">
		search</span></a>
    </div>
</div>
<div class="global-search-panel-container"></div>
<script>
	$(document).on("keyup", "#global-search-input", function(){
		$('button[data-action="search"]').trigger('click');
	});
</script>