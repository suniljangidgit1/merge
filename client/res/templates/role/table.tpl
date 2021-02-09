
<div class="panel panel-default role_table">
    <div class="panel-heading">
        <h4 class="panel-title">{{translate 'Scope Level' scope='Role'}}</h4>
    </div>
    <div class="panel-body">
        <div class="no-margin">
            <table class="table table-bordered no-margin">
                <tr>
                    <th></th>
                    <th width="20%">{{translate 'Access' scope='Role'}}</th>
                    {{#each actionList}}
                        <th width="11%">{{translate this scope='Role' category='actions'}}</th>
                    {{/each}}
                </tr>
                {{#each tableDataList}}
                <tr>
                    <td><b>{{translate name category='scopeNamesPlural'}}</b></td>

                    <td>
                        <span style="color: {{prop ../colors access}};">{{translateOption access scope='Role' field='accessList'}}</span>
                    </td>

                    {{#ifNotEqual type 'boolean'}}
                        {{#each ../list}}
                            <td>
                                {{#ifNotEqual ../../access 'not-set'}}
                                    <span style="color: {{prop ../../../../colors level}};">{{translateOption level field='levelList' scope='Role'}}</span>
                                {{/ifNotEqual}}
                            </td>
                        {{/each}}
                    {{/ifNotEqual}}
                </tr>
                {{/each}}
            </table>
        </div>
    </div>
</div>


