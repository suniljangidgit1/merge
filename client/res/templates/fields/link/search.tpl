<select id="linkselect" class="form-control search-type input-sm" style="display:none;">
    {{options searchTypeList searchType field='searchRanges'}}
</select>
<div class="primary">
	<div class="input-group">
	    <input id="linkselect" class="form-control input-sm" type="text" data-name="{{nameName}}" value="{{searchData.nameValue}}" autocomplete="espo-{{name}}" placeholder="{{translate 'Select Account'}}">
	    <span class="input-group-btn">
	        <button type="button" class="btn btn-sm  btn-default_gray btn-icon" data-action="selectLink" tabindex="-1" title="{{translate 'Select'}}"><i class="fas fa-angle-up"></i></button>
	        <button type="button" class="btn btn-sm  btn-default_gray btn-icon" data-action="clearLink" tabindex="-1"><i class="fas fa-times"></i></button>
	    </span>
	</div>
	<input id="linkinput" type="hidden" data-name="{{idName}}" value="{{searchData.idValue}}">
</div>

<div class="one-of-container hidden">
    <div class="link-one-of-container link-container list-group">
    </div>

    <div class="input-group add-team">
        <input id="linkselect" class="form-control input-sm element-one-of" type="text" value="" autocomplete="espo-{{name}}" placeholder="{{translate 'Select'}}">
        <span class="input-group-btn">
            <button data-action="selectLinkOneOf" class="btn  btn-default_gray btn-sm btn-icon" type="button" tabindex="-1" title="{{translate 'Select'}}"><span class="fas fa-angle-up"></span></button>
        </span>
    </div>
</div>

<script>
    $(document).on("keyup", "#linkinput", function(){
        $('button[data-action="search"]').trigger('click');
    });

    $(document).on("change", "#linkselect", function(){
        $('button[data-action="search"]').trigger('click');
    });
</script>