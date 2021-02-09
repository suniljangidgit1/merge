<select id="linkparentselect" class="form-control search-type input-sm" style="display:none;">
    {{options searchTypeList searchType field='searchRanges'}}
</select>
<div class="primary">
    <select id="linkparentselect" class="form-control input-sm entity-type" data-name="{{typeName}}">
        {{options foreignScopeList searchData.typeValue category='scopeNames'}}
    </select>
    <div class="input-group">
        <input id="linkparentselect" class="form-control input-sm" type="text" data-name="{{nameName}}" value="{{searchData.nameValue}}" autocomplete="espo-{{name}}" placeholder="{{translate 'Select'}}">
        <span class="input-group-btn">
            <button type="button" class="btn btn-sm  btn-default_gray btn-icon" data-action="selectLink" tabindex="-1" title="{{translate 'Select'}}"><i class="fas fa-angle-up"></i></button>
            <button type="button" class="btn btn-sm  btn-default_gray btn-icon" data-action="clearLink" tabindex="-1"><i class="fas fa-times"></i></button>
        </span>
    </div>
    <input id="linkparentinput" type="hidden" data-name="{{idName}}" value="{{searchData.idValue}}">
</div>

<script>
    $(document).on("keyup", "#linkparentinput", function(){
        $('button[data-action="search"]').trigger('click');
    });

    $(document).on("change", "#linkparentselect", function(){
        $('button[data-action="search"]').trigger('click');
    });
</script>
