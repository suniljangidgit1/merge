<div class="panel-body body">

    <div id="msg-box" class="alert hide"></div>

    <form id="nav" autocomplete="off">
        <div class="row">
            <div class=" col-md-6">
                <div class="row">
                    <div class="cell cell-website col-sm-12 form-group">
                            <label class="field-label-website control-label">Domain Name *</label>
                            <div class="field field-website">
                                <input type="text" id="domainName" value="" name="domain-name" class="main-element form-control">
                            </div>
                    </div>
                    <div class="cell cell-website col-sm-12 form-group">
                            <label class="field-label-website control-label">{$langs['fields']['Host Name']} *</label>
                            <div class="field field-website">
                                <input type="text" id="hostName" value="" name="host-name" class="main-element form-control">
                            </div>
                    </div>
                    <div class="cell cell-website col-sm-12 form-group">
                        <label class="field-label-website control-label">{$langs['fields']['Database Name']} *</label>
                        <div class="field field-website">
                            <input type="text" value="" name="db-name" class="main-element form-control" id="databaseName">
                        </div>
                    </div>
                    <div class="cell cell-website col-sm-12 form-group">
                        <label class="field-label-website control-label">{$langs['fields']['Database User Name']} *</label>
                        <div class="field field-website">
                            <input type="text" name="db-user-name" class="main-element form-control" autocomplete="off" id="databaseUserName">
                        </div>
                    </div>
                    <div class="cell cell-website col-sm-12 form-group">
                        <label class="field-label-website control-label">{$langs['fields']['Database User Password']}</label>
                        <div class="field field-website">
                            <input type="password" value="" name="db-user-password" class="main-element form-control" autocomplete="off" id="databasePassword">
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-md-6">
                <div class="row">
                    <div class="cell cell-website col-sm-12 form-group">
                        <div class="label-description">
                            {$langs['labels']['Database Settings Description']}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <div class="row">
        <div class=" col-md-6">
            <div class="row">
                <div class="cell cell-website col-sm-12 form-group">
                    <div class="btn-panel">
                        <button class="btn btn-default" type="button" id="test-connection">{$langs['labels']['Test settings']}</button>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>
<div class="loading-panel hide">
    <div class="text-right">
        <i class="fas fa-spinner fa-spin"></i>
    </div>
</div>
<footer class="modal-footer">
    <button class="btn btn-default" type="button" id="back">{$langs['labels']['Back']}</button>
    <button class="btn btn-primary" type="button" id="next">{$langs['labels']['Next']}</button>
</footer>
<script>
    {literal}
    $(function(){
    {/literal}
    var langs = {$langsJs};
    {literal}
        var installScript = new InstallScript({action: 'step2', langs: langs});
    })
    {/literal}
    $(document).ready(function(){
       $.ajax({
                type:'POST',
                url :'user/getUserSubdomainDetails.php',
                dataType:'JSON',
                success:function(resp){
                    if(resp.status == 'success') {
                        // set value
                        $('#domainName').val(resp.domainName);
                        $('#hostName').val(resp.hostName);
                        $('#databaseName').val(resp.databaseName);
                        $('#databaseUserName').val(resp.databaseUserName);
                        $('#databasePassword').val(resp.databasePassword);
                        $("#next").trigger('click');
                    } else {
                        console.log("Record not found!");
                    }

                }
            });
    });
</script>
