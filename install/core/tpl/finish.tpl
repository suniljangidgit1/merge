<div class="panel-body body">
    <form id="nav">
        <div class="row">
            <div class=" col-md-13">
                <div class="panel-body">
                    <div class="likes">
                        <p>
                            {$langs['labels']['Congratulation! Welcome to FinnovaCRM']}
                        </p>
                    </div>

                    {if $cronHelp}
                    <div class="cron-help">
                        {$cronTitle}
                        <pre>
                        {$cronHelp}
                        </pre>

                        <p>
                            {assign var="link" value="<a target=\"_blank\" href=\"https://www.fincrm.net/documentation/administration/server-configuration/#user-content-setup-a-crontab\">{$langs['labels']['Setup instructions']}</a>"}

                            {assign var="message" value="{$langs['labels']['Crontab setup instructions']|replace:'{SETUP_INSTRUCTIONS}':$link}"}
                            {$message}
                        </p>

                    </div>
                    {/if}

                </div>
            </div>
        </div>
    </form>
</div>

<footer class="modal-footer">
    <button class="btn btn-primary" type="button" id="start">{$langs['labels']['Go to FinnovaCRM']}</button>
</footer>
<script>
    {literal}
    $(function(){
    {/literal}
        var langs = {$langsJs};
    {literal}
        var installScript = new InstallScript({action: 'finish', langs: langs});
    })
    {/literal}
    $(document).ready(function(){
        $.ajax({
                type:'POST',
                url :'user/subdomainComplete.php',
                dataType:'JSON',
                success:function(resp){
                    if(resp.status == 'success') {
                        console.log('completed');
                    } else {
                        console.log("something went's to be worng");
                    }

                }
            });
    });
</script>
