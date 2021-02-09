<select id="createddateselect" class="form-control search-type input-sm">
    {{options searchTypeList searchType field='dateSearchRanges'}}
</select>
<div class="input-group primary">
    <input id="createddateselect" class="main-element form-control input-sm" type="text" data-name="{{name}}" value="{{dateValue}}" autocomplete="espo-{{name}}">
    <span class="input-group-btn">
        <button type="button" class="btn btn-default_gray btn-icon btn-sm date-picker-btn" tabindex="-1"><i class="material-icons-outlined">date_range</i></button>
    </span>
</div>
<div class="input-group{{#ifNotEqual searchType 'between'}} hidden{{/ifNotEqual}} additional">
    <input id="createddateselect" class="main-element form-control input-sm additional" type="text" value="{{dateValueTo}}" autocomplete="espo-{{name}}">
    <span class="input-group-btn">
        <button type="button" class="btn btn-default_gray btn-icon btn-sm date-picker-btn" tabindex="-1"><i class="material-icons-outlined">date_range</i></button>
    </span>
</div>
<div class="hidden additional-number">
    <input id="createddateinput" class="main-element form-control input-sm number" type="number" value="{{number}}" placeholder ="{{translate 'Number'}}" autocomplete="espo-{{name}}">
</div>

<script>
    $(document).on("keyup", "#createddateinput", function(){
        $('button[data-action="search"]').trigger('click');
    });

    $(document).on("change", "#createddateselect", function(){
        $('button[data-action="search"]').trigger('click');
    });
</script>