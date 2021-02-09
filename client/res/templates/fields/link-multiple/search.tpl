<select id="multiplelinkeselect" class="form-control search-type input-sm" style="display:none;">
    {{options searchTypeList searchType field='searchRanges'}}
</select>

<div class="link-group-container hidden">

    <div class="link-container list-group">
    </div>

    <div class="input-group add-team">
        <input id="multiplelinkeselect" class="main-element form-control" type="text" value="" autocomplete="espo-{{name}}" placeholder="{{translate 'Select Team'}}">
        <span class="input-group-btn">
            <button data-action="selectLink" class="btn btn-default_gray btn-icon btn-sm" type="button" tabindex="-1" title="{{translate 'Select'}}"><span class="fas fa-angle-up"></span></button>
        </span>
    </div>

    <input id="multilinkinput" type="hidden" data-name="{{name}}Ids" value="{{searchParams.value}}" class="ids">
</div>

<script>
    $(document).on("keyup", "#multilinkinput", function(){
        $('button[data-action="search"]').trigger('click');
    });

    $(document).on("change", "#multiplelinkeselect", function(){
        $('button[data-action="search"]').trigger('click');
    });
</script>
