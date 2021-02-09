

    {{#unless noEdit}}
    <div class="pull-right right-container cell-buttons">
    {{{right}}}
    </div>
    {{/unless}}
    
     <div class="pull-right stream-date-container">
        <span class="text-muted small">{{{createdAt}}}</span>
    </div>

    <div class="stream-head-container">
        <div class="pull-left">
            {{{avatar}}}
        </div>
        <div class="stream-head-text-container stream-head-text1">
            {{#if iconHtml}}{{{iconHtml}}}{{/if}}
            <span class="text-muted message">{{{message}}}</span>
        </div>
    </div>

   

