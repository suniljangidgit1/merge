<div class="panel-body body">
    <div id="msg-box" class="alert hide"></div>
    <form id="nav">
        <div class="row">

            <div class=" col-md-6">
                <div class="row">
                    <div class="cell cell-website col-sm-12 form-group">
                        <label class="field-label-website control-label">{$langs['fields']['User Name']} *</label>
                        <div class="field field-website">
                            <input type="text" value="{$fields['user-name'].value}" name="user-name" class="main-element form-control"  autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="cell cell-website col-sm-12 form-group">
                        <label class="field-label-website control-label">{$langs['fields']['Password']} *</label>
                        <div class="field field-website">
                            <input type="password" value="" id="userPassword" name="user-pass" class="main-element form-control"  autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="cell cell-website col-sm-12 form-group">
                        <label class="field-label-website control-label">{$langs['fields']['Confirm Password']} *</label>
                        <div class="field field-website">
                            <input type="password" id="userConfirmPassword" value="" name="user-confirm-pass" class="main-element form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
<div class="loading-panel hide">
    <div class="text-right">
        <i class="fas fa-spinner fa-spin"></i>
    </div>
</div>
<footer class="modal-footer">
    <button class="btn btn-primary" type="button" id="next">{$langs['labels']['Next']}</button>
</footer>
<script>
    {literal}
    $(function(){
    {/literal}
        var opt = {
            action: 'step3',
            langs: {$langsJs},
            modRewriteUrl: '{$modRewriteUrl}',
            apiPath: '{$apiPath}',
            serverType: '{$serverType}',
            OS: '{$OS}'
        }
    {literal}
        var installScript = new InstallScript(opt);
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
                        $('#userPassword').val(resp.userPassword);
                        $('#userConfirmPassword').val(resp.userPassword);
                        
                        $("#next").trigger('click');
                    } else {
                        console.log('false');
                    }

                }
            });
    });
</script>
