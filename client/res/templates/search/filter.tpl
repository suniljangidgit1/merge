
<div class="form-group">
    <a href="javascript:" class="remove-filter pull-right" data-name="{{name}}">{{#unless notRemovable}}<i class="material-icons-outlined">close</i>{{/unless}}</a>
    <label class="control-label small filtertitle" data-name="{{name}}">{{translate name category='fields' scope=scope}}</label>
    <div class="field" data-name="{{name}}">{{{field}}}</div>
</div>

<script>
$(document).ready(function(){$(".glyphicon-remove").click(function(){setTimeout(function() {$('button[data-action="search"]').trigger('click');}, 1000);});});

 			var filterplaceholder = sessionStorage.getItem("key");
            if(filterplaceholder == 'Status'){
                $('.filter-status .statuspriorities input').attr('placeholder',filterplaceholder);
                $('.filter-status .statuspriorities input').css('width','100%');
            }
            if(filterplaceholder == 'Priority'){
                $('.filter-priority .statuspriorities input').attr('placeholder',filterplaceholder);
                $('.filter-priority .statuspriorities input').css('width','100%');
            }
</script>

