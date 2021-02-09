<div class="page-header labelmanager_header"><h3><a href="#Admin">{{translate 'Administration'}}</a> &raquo {{translate 'Entity Manager' scope='Admin'}}</h3></div>

<div class="button-container">
    <button class="btn btn-primary createEntity" data-action="createEntity">{{translate 'Create Entity' scope='Admin'}}</button>
</div>

<table class="table">
    <thead>
        <tr>
            <th>{{translate 'name' scope='EntityManager' category='fields'}}</th>
            <th>{{translate 'label' scope='EntityManager' category='fields'}}</th>
            <th>{{translate 'type' scope='EntityManager' category='fields'}}</th>
            <th>&nbsp;Fields</th>
            <th>&nbsp;Relationships</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    {{#each scopeDataList}}           
        <tr data-scope="{{name}}">
            <td width="25%">
                {{name}}
            </td>
            <td width="">
                {{label}}
            </td>
            <td width="120">
                {{#if type}}
                {{translateOption type field='type' scope='EntityManager'}}
                {{/if}}
            </td>
            <td width="120">
                {{#if customizable}}
                <a href="#Admin/fieldManager/scope={{name}}">{{translate 'Fields' scope='EntityManager'}}</a>
                {{/if}}
            </td>
            <td width="120">
                {{#if customizable}}
                <a href="#Admin/linkManager/scope={{name}}">{{translate 'Relationships' scope='EntityManager'}}</a>
                {{/if}}
            </td>
            <td align="right" width="120">
                {{#if customizable}}
                {{#if isEdit}}
                <a href="javascript:" data-action="editEntity" data-scope="{{name}}" title="{{translate 'Edit'}}">
                    {{translate 'Edit'}}
                </a>
                {{/if}}
                {{/if}}
            </td>
            <td class="cell" align="right" width="40" data-name="buttons">
                {{#if customizable}}
                {{#if isEdit}}
                <div class="list-row-buttons btn-group pull-right">
                     <a href="javascript:" id="entityName" data-action="removeEntity" data-scope="{{name}}" > 
                    <button type="button" class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown">
                       <!--  <span class="caret"></span> -->
                       {{#if isRemovable}}
                        <span class="fs20">&times;</span>
                         {{/if}}
                    </button></a>
                   <!--  <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:" data-action="editFormula" data-scope="{{name}}">{{translate 'Formula' scope='EntityManager'}}</a></li>
                        {{#if isRemovable}}
                            <li><a href="javascript:" data-action="removeEntity" data-scope="{{name}}">{{translate 'Remove'}}</a></li>
                        {{/if}}
                    </ul> -->
                </div>
                {{/if}}
                {{/if}}
            </td>
        </tr>
    {{/each}}
    </tbody>
</table>

<script>
 $(document).on("click", ".createEntity" , function(){
         // alert("HIII");
        $('div[data-name="stream"]'). prop("checked", true);
     });
window.onload = function() {
    $('.container #main .table tr[data-scope="Account"]').css('display', 'none');
}
</script>