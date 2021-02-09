
<div class="row search-row">
    <div class="form-group{{#if isWide}} col-lg-5{{/if}} col-md-5 col-sm-5 searchfilter">
        <div class="input-group">
            <!-- <div class="input-group-btn left-dropdown{{#unless leftDropdown}} hidden{{/unless}}">
                <button type="button" class="btn btn-default dropdown-toggle filters-button" title="{{translate 'Filter'}}" data-toggle="dropdown" tabindex="-1">
                    <span class="filters-label"></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-left filter-menu">

                    <li><a class="preset" tabindex="-1" href="javascript:" data-name="" data-action="selectPreset"><div>{{translate 'all' category='presetFilters' scope=entityType}}</div></a></li>
                    {{#each presetFilterList}}
                    <li><a class="preset" tabindex="-1" href="javascript:" data-name="{{name}}" data-action="selectPreset"><div>{{#if label}}{{label}}{{else}}{{translate name category='presetFilters' scope=../../entityType}}{{/if}}</div></a></li>
                    {{/each}}
                    <li class="divider preset-control hidden"></li>


                    <li class="preset-control remove-preset hidden"><a tabindex="-1" href="javascript:" data-action="removePreset">{{translate 'Remove Filter'}}</a></li>
                    <li class="preset-control save-preset hidden"><a tabindex="-1" href="javascript:" data-action="savePreset">{{translate 'Save Filter'}}</a></li>
                    {{#if boolFilterList.length}}
                        <li class="divider"></li>
                    {{/if}}

                    {{#each boolFilterList}}
                        <li class="checkbox"><label><input type="checkbox" data-role="boolFilterCheckbox" data-name="{{./this}}" {{#ifPropEquals ../bool this true}}checked{{/ifPropEquals}}> {{translate this scope=../entityType category='boolFilters'}}</label></li>
                    {{/each}}
                </ul>
            </div> -->
            {{#unless textFilterDisabled}}<input type="text" class="form-control text-filter search-main" data-name="textFilter" placeholder="Search..." value="{{textFilter}}" tabindex="1" autocomplete="espo-text-search">{{/unless}}
            <div class="input-group-btn">
                <button type="button" class="btn search btn-icon" data-action="search" title="{{translate 'Search'}}">
                    <span class="material-icons-outlined" style="font-size: 18px;">search</span>
                </button>
                <button type="button" class="btn btn-text btn-icon-wide" data-action="reset" title="{{translate 'Reset'}}">
                    <span class="material-icons-outlined"  aria-hidden="true" style="font-size: 17px;position:relative;top: 2px;">refresh</span>
                </button>
                <button type="button" class="btn btn-text btn-icon-wide dropdown-toggle add-filter-button" data-toggle="dropdown" tabindex="-1">
                    <span class="material-icons-outlined" style="font-size: 17px;position: relative;
                        top: 2px;">filter_list</span>
                </button>
                <ul class="dropdown-menu pull-left filter-list" style="left:95px;">
                    <!-- <li class="dropdown-header">{{translate 'Add Field'}}</li> -->
                    {{#each advancedFields}}
                        <li data-name="{{name}}" class="{{#if checked}}hidden{{/if}}"><a href="javascript:" class="add-filter" data-action="addFilter" data-name="{{name}}">{{translate name scope=../entityType category='fields'}}</a></li>
                    {{/each}}
                </ul>
            </div>
        </div>
    </div>
    <div class="form-group{{#if isWide}} col-lg-2{{/if}} col-md-2 col-sm-4 searchfilter" style="float:right;">
        {{#if hasViewModeSwitcher}}
        <div class="btn-group view-mode-switcher-buttons-group">
            {{#each viewModeDataList}}
            <button type="button" data-name="{{name}}" data-action="switchViewMode" class="btn btn-icon btn-icon task-btn-kanban btn-text{{#ifEqual name ../viewMode}} active{{/ifEqual}}" title="{{title}}"><span class="{{iconClass}}"></span></button>
            {{/each}}
        </div>
        {{/if}}
    </div>
    
    <div class="advanced-filters-bar" style="margin-bottom: 12px;"></div>
    <div class="form-group col-md-5 col-sm-3 col-xs-12">
    <div class="advanced-filters hidden grid-auto-fill-sm">
    {{#each filterDataList}}
        <div class="filter filter-{{name}}" data-name="{{name}}">
            {{{var key ../this}}}
        </div>
    {{/each}}
    </div>
    </div>
</div>


<script>

    $(document).on("keyup", ".search-main", function(){
        $('button[data-action="search"]').trigger('click');
    });
// $(document).ready(function(){$(".search-main").(function(){
//     setTimeout(function() {
//         $('button[data-action="search"]').trigger('click');
//     s}, 0);});
// });

    $(document).on("click", "body .filter-list .add-filter", function(){
        /*
        alert("I'm In---!!!");
        alert($(".advanced-filters ").html());
        alert($(".advanced-filters .filter-attachments ").length);*/

        $("#multiplelinkeselect").css("display", "none");
        var len = $(".advanced-filters .filter-attachments ").length;
        if( len >= 1 ) {
            $("#multiplelinkeselect").css("display", "block");
        }else{
            $("#multiplelinkeselect").css("display", "none");
        }
    });

    $('.add-filter').click(function(){
        var a = $(this).text();
        //addPlaceholder(a);
        sessionStorage.setItem("key", a);
    });
</script>