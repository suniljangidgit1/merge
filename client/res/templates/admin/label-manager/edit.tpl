<div class="page-header">
    <h4>{{translate scope category='scopeNames'}}</h4>
</div>

{{#unless categoryList.length}}
    {{translate 'No Data'}}
{{else}}
    <div class="button-container labelmanager_btn">
        <div class="btn-group">
            <button class="btn btn-primary" data-action="save">{{translate 'Save'}}</button>
            <button class="btn btn-default" data-action="cancel">{{translate 'Cancel'}}</button>
        </div>
    </div>
{{/unless}}

{{#each categoryList}}
<div class="panel panel-default labelmanager_details" data-name="{{./this}}">
    <div class="panel-heading clearfix labmangerbdr">
        <div class="pull-left" style="margin-right: 10px;">
            <a href="javascript:" data-action="showCategory" data-name="{{./this}}" class="action"><span class="material-icons-outlined">arrow_drop_down</span></a>
            <a href="javascript:" data-action="hideCategory" data-name="{{./this}}" class="hidden action"><span class="material-icons-outlined">arrow_drop_up</span></a>
        </div>
        <h4 class="panel-title">
            <span class="action" style="cursor: pointer;" data-action="showCategory" data-name="{{./this}}">
            {{translate this}}
            </span>
        </h4>
    </div>
    <div class="panel-body hidden" data-name="{{./this}}">
    </div>
</div>
{{/each}}