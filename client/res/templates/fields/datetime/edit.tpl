
<div class="input-group">
    <input class="main-element form-control" type="text" data-name="{{name}}" value="{{date}}" autocomplete="espo-{{name}}">
    <span class="input-group-btn">
        <button type="button" class="btn btn-default_gray btn-icon date-picker-btn" tabindex="-1" style="padding-bottom:2px;"><i class="material-icons-outlined" style="font-size: 18px !important;position: relative;">date_range</i></button>
    </span>
    <input class="form-control time-part" type="text" data-name="{{name}}-time" value="{{time}}" autocomplete="espo-{{name}}" onkeydown="return false;">
    <span class="input-group-btn time-part-btn">
        <button type="button" class="btn btn-default_gray btn-icon time-picker-btn" tabindex="-1"><i class="far fa-clock"></i></button>
    </span>
</div>
