<div class="panel panel-default panelradius kanbanheight">
    <div class="panel-body panelradius">
        {{#each layoutDataList}}
        <div>
            {{#if isFirst}}
            {{#unless rowActionsDisabled}}
            <div class="pull-right item-menu-container">{{{../../../itemMenu}}}</div>
            {{/unless}}
            {{/if}}
            <div class="form-group">
                <div class="field{{#if isAlignRight}} field-right-align{{/if}}{{#if isLarge}} field-large{{/if}}" data-name="{{name}}">{{{var key ../this}}}</div>
            </div>
        </div>
        {{/each}}
    </div>
</div>