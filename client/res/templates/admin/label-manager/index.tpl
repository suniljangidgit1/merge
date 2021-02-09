<div class="page-header labelmanager_header"><h3><a href="#Admin">{{translate 'Administration'}}</a> &raquo {{translate 'Label Manager' scope='Admin'}}</h3></div>

<div class="row">
    <div class="col-sm-3">
        <!-- <div class="panel panel-default">
            <div class="panel-body">
                <div class="cell">
                    <div class="field">
                        <select data-name="language" class="form-control">
                            {{#each languageList}}
                            <option value="{{this}}"{{#ifEqual this ../language}} selected{{/ifEqual}}>{{translateOption this field='language'}}</option>
                            {{/each}}
                        </select>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="panel panel-default labelmanager">
            <div class="panel-body">
                <ul class="list-unstyled listbg" style="overflow-x: hidden;">
                {{#each scopeList}}
                    <li onclick="changeColor(this)">
                        <button   class="btn btn-link" data-name="{{./this}}" data-action="selectScope">{{translate this category='scopeNames'}}</button>
                    </li>
                {{/each}}
                </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-9">
        <div class="language-record">
            {{{record}}}
        </div>
    </div>
</div>

"<script type=""text/javascript"">
/*$("#textbox1.disabled").closest("li").css("background-color","blue");*/
//  var x = document.getElementByClassName("textbox1").parentNode.nodeName;
/*var data = $(".disabled").parents();
data.css("background-color","blue");*/

function changeColor(element){
    alert("in change color method");
    element.style.backgroundColor = "#337ab7";
    
    var labelbtn = $(".listbg li button").find("disabled");
    
    
    if(labelbtn == "disabled"){
        alert("dhfghgf");
    }
}
 
</script>"







