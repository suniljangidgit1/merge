<div class="page-header labelmanager_header"><h3><a href="#Admin">{{translate 'Administration'}}</a> &raquo {{translate 'Integrations' scope='Admin'}}</h3></div>

<div class="row">
    <div id="integrations-menu" class="col-sm-3">
        <ul class="list-group list-group-panel">
        {{#each integrationList}}
            <li class="list-group-item"><a href="javascript:" class="integration-link" data-name="{{./this}}">{{{translate ./this scope='Integration' category='titles'}}}</a></li>
        {{/each}}
        </ul>
    </div>

    <div id="integration-panel" class="col-sm-9">
        <div class="row">
            <div class="col-md-8 integration-Subpanel">
                <div class="col-sm-1">
                    <div class="">
                        <div class="Header_img">
                            <img src="" id="header_input_img">
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 ml25">
                    <div class="find_data">
                        <p>When this happens...</p>
                    </div>
                    <div class="">
                        <h4 id="integration-header" style="margin-top: 0px;font-weight: 600;"></h4>
                    </div>
                </div>
            </div>
        </div>
        <div id="integration-content">
            {{{content}}}
        </div>
    </div>
</div>

<script type="text/javascript">
$(".integration-Subpanel").css("display","none");
$(".integration-link[data-name='GoogleMaps']").closest(".list-group-item").css("display","none");
</script>



