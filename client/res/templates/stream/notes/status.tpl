

    {{#unless noEdit}}
    <div class="pull-right right-container">
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
            <span class="label label-{{style}}">{{statusText}}</span>
            <span class="text-muted message">{{{message}}}</span>
        </div>
    </div>

    
