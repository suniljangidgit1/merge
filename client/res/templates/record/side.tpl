
{{#each panelList}}
<div class="panel panel-{{#if style}}{{style}}{{else}}default{{/if}} panel-{{name}}{{#if hidden}} hidden{{/if}}{{#if sticked}} sticked{{/if}}" data-name="{{name}}" data-name="{{name}}">
    {{#if label}}
    <div class="panel-heading">
        <div class="pull-right btn-group panel-actions-container">{{{var ../actionsViewKey ../../this}}}</div>
        <h4 class="panel-title">
            {{#unless notRefreshable}}
            <span style="cursor: pointer;" class="action" title="{{translate 'clickToRefresh' category='messages'}}" data-action="refresh" data-panel="{{name}}">
            {{/unless}}
            {{#if titleHtml}}
                {{{titleHtml}}}
            {{else}}
                {{title}}
            {{/if}}
            {{#unless notRefreshable}}
            </span>
            {{/unless}}
        </h4>
    </div>
    {{/if}}
    <div class="panel-body{{#if isForm}} panel-body-form{{/if}}" data-name="{{name}}">
        {{{var name ../this}}}
    </div>
</div>
{{/each}}
<script type="text/javascript">
var afterhash = window.location.hash;
afterhash.indexOf(0);
afterhash.toLowerCase();
afterhash = afterhash.split("/")[0];
if(afterhash != '#Account'){
  $('.invoice_summary').css('display', 'none');
}else{
  $('.invoice_summary').css('display', 'block');
}
</script>

 <div class="panel panel-default invoice_summary" style="" id="invoice_summary">
   <div class="panel-heading">
      <h4 class="panel-title">
         Invoice Summary
      </h4>
   </div>
   <div class="panel-body">
      <div class="row">
         <div class="col-xs-7 col-sm-7 col-md-7">
            <span style="font-weight: 600;font-size: 13px;">Invoice Value</span>
         </div>
         <div class="col-xs-5 col-sm-5 col-md-5">
            <span style="text-align:right" id="inv_val"></span> 
         </div>
         <div class="col-xs-7 col-sm-7 col-md-7">
            <span style="font-weight: 600;font-size: 13px;">Payment Against Invoice</span>
         </div>
         <div class="col-xs-5 col-sm-5 col-md-5">
            <span style="text-align:right" id="payment_received"></span> 
         </div>
         <div class="col-xs-7 col-sm-7 col-md-7">
            <span style="font-weight: 600;font-size: 13px;">TDS</span>
         </div>
         <div class="col-xs-5 col-sm-5 col-md-5">
            <span style="text-align:right" id="tds1"></span> 
         </div>
         <div class="col-xs-7 col-sm-7 col-md-7">
            <span style="font-weight: 600;font-size: 13px;">Balance</span>
         </div>
         <div class="col-xs-5 col-sm-5 col-md-5">
            <span style="text-align:right" id="balance"></span> 
         </div>
         
         <!-- <div class="col-md-12">
            <b>Invoice Value </b>: <span style="text-align:right" id="inv_val"></span> 
         </div>
         <div class="col-md-12">
            <b>Payment Against Invoice</b> : <span style="text-align:right" id="payment"></span> 
         </div> -->
         
         <!--    <div class="col-md-12">
            <b>Payment Against Account</b> : <span style="text-align:right" id="payment_account"></span> 
            </div>-->
         {{!--
         <div class="col-md-12">
            <b> TDS </b>: <span style="text-align:right" id="tds1"></span> 
         </div>
         <div class="col-md-12">
            <b> Balance </b>: <span style="text-align:right" id="balance"></span> 
         </div>
         --}}
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="button" id="generate_statement1" class="btn btn-default" data-toggle="modal" data-target="#generate_statement" style="margin-top:10px;margin-bottom:10px;"> Generate Statement</button>
         </div>
      </div>
   </div>
</div>



  <!-- Modal -->
<div class="modal fade" id="generate_statement" role="dialog">
<div class="modal-dialog modal-lg">
   <!-- Modal content-->
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Generate Statement</h4>
      </div>
      <div class="modal-body" style="padding-top:0px;">
         <div class="">
            <div class="row">
               <div class="col-md-12">
                  <div class="">
                     <button type="submit" id="generate" class="btn btn-primary">Generate</button>
                     <!--  <button type="button" class="btn btn-default">Cancel</button> -->
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                     <h4>Overview</h4>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6 col-md-6" >
                  <div class="form-group">
                     <label for="">From date<span class="text-danger">*</span></label>
                     <div  id="datepicker2" class="input-group date" data-date-format="mm-dd-yyyy">
                        <input type="text"  name="from_date" id="from_date" class="form-control" placeholder="" required>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-6" >
                  <div class="form-group">
                     <label for="">To date <span class="text-danger">*</span></label>
                     <div id="datepicke3" class="input-group date" data-date-format="mm-dd-yyyy">
                        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="" required>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                     </div>
                  </div>
               </div>
            </div>
            <button class="btn btn-success" id="" style="visibility: hidden;margin-bottom: 20px;">Add Item</button> 
         </div>
      </div>
   </div>
</div>

<script>
 var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2];

var afterhash = window.location.hash;    
afterhash.indexOf(0);                 
afterhash.toLowerCase();
afterhash = afterhash.split("/")[0];

if(afterhash=='#Account')
{
  var hash = window.location.hash; 
  if(hash=="#Account/create"){
    $("#invoice_summary").css("display","none");
  }
  else{
    // $("#invoice_summary").css("display","none");
  }

  if(first=='portal')
  {
    var id = window.location.hash;
    id.indexOf(2);                 
    id.toLowerCase();
    id = id.split("/")[2];

    $.ajax({
        url: "../../../../client/res/templates/fetch_account_invoice_data.php?id="+id,
        type: "post", 
        dataType: 'json',
        async: false,
        success: function(result)
        {
              var len=result.length;
              for (var i = 0; i < len; i++) {
                $("#inv_val").html("&#x20b9; "+numberWithCommas(result[i].invoice_val));
                $("#payment_received").html("&#x20b9; "+numberWithCommas(result[i].received_amount));
                // $("#payment_account").html("&#x20b9; "+numberWithCommas(result[i].received_amount_account));
                $("#tds1").html("&#x20b9; "+numberWithCommas(result[i].tds));
                $("#balance").html("&#x20b9; "+numberWithCommas(result[i].balance));
              }
        }
    });

    function numberWithCommas(x) {
      x=x.toString();
      var afterPoint = '';
      if(x.indexOf('.') > 0)
         afterPoint = x.substring(x.indexOf('.'),x.length);
      x = Math.floor(x);
      x=x.toString();
      var lastThree = x.substring(x.length-3);
      var otherNumbers = x.substring(0,x.length-3);
      if(otherNumbers != '')
          lastThree = ',' + lastThree;
      var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;

      return res;
    }
  }
  else
  {
      var id = window.location.hash;         
      id.indexOf(2);                 
      id.toLowerCase();
      id = id.split("/")[2];

      $.ajax({
        url: "../../client/res/templates/fetch_account_invoice_data.php?id="+id,
        type: "post", 
        dataType: 'json',
        async: false,
        success: function(result)
        {
            /*var len=result.length;
            for (var i = 0; i < len; i++)
            {
              $("#inv_val").html("&#x20b9; "+numberWithCommas(result[i].invoice_val));
              $("#payment").html("&#x20b9; "+numberWithCommas(result[i].received_amount));
              $("#payment_account").html("&#x20b9; "+numberWithCommas(result[i].received_amount_account));
              $("#tds1").html("&#x20b9; "+numberWithCommas(result[i].tds));
              $("#balance").html("&#x20b9; "+numberWithCommas(result[i].balance));
            }*/
            $("#inv_val").html("&#x20b9; "+numberWithCommas(result.invoice_val));
            $("#payment_received").html("&#x20b9; "+numberWithCommas(result.received_amount));
            // $("#payment_account").html("&#x20b9; "+numberWithCommas(result.received_amount_account));
            $("#tds1").html("&#x20b9; "+numberWithCommas(result.tds));
            $("#balance").html("&#x20b9; "+numberWithCommas(result.balance));
        }
      });

      function numberWithCommas(x) {
        x=x.toString();
        var afterPoint = '';
        if(x.indexOf('.') > 0)
           afterPoint = x.substring(x.indexOf('.'),x.length);
        x = Math.floor(x);
        x=x.toString();
        var lastThree = x.substring(x.length-3);
        var otherNumbers = x.substring(0,x.length-3);
        if(otherNumbers != '')
            lastThree = ',' + lastThree;
        var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;

        return res;
      }
  }
}
else 
{
  $("#invoice_summary").css("display","none");
}


    $('#from_date').datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
      endDate:  new Date(),
    }); 

        $('#to_date').datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
      endDate:  new Date(),
    }); 

$("#generate").click(function(){
   
 var from_date=$("#from_date").val(); 
 var to_date=$("#to_date").val();

 var datearray = from_date.split("/");
 var datearray1 = to_date.split("/");

 var sDate = datearray[1] + '/' + datearray[0] + '/' + datearray[2];
 var eDate = datearray1[1] + '/' + datearray1[0] + '/' + datearray1[2];

 var sDate = new Date(sDate);
 var eDate = new Date(eDate);


 if(from_date =='')
 {
        $.confirm({
        title: 'Warning!',
        content: 'Please select From Date',
            buttons: {
        Ok: function () {
           
            }
        }

    });
 }
 else if(to_date=='')
 {
    $.confirm({
        title: 'Warning!',
        content: 'Please select To Date',
            buttons: {
        Ok: function () {
           
            }
        }

    });
 }
 else if(sDate > eDate)
 {

        $.confirm({
        title: 'Warning!',
        content: 'Please select To Date greater than From Date',
            buttons: {
        Ok: function () {
           $("#from_date").val("");
           $("#to_date").val("");
            }
        }

    });

 }
 else
 {
 window.open('http://'+domain_name+'/'+folder_name+'/pdf/statement.php?id='+id+'&from_date='+from_date+'&to_date='+to_date, '_blank');
   
 }
});


</script>