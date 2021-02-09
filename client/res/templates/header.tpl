<style type="text/css">
  .static_create
  {
    padding: 14px 14px 2px 14px !important;
  }
</style>

<style type="text/css">
  /*New Create Estimate Form and Create Invoice Form Css Start*/
  .material-icons-outlined{
    font-size: 18px;
    position: relative;
    cursor: pointer;
  }

  #estimate_main_details .panel-default .panel-heading,
  #Invoice_main_details .panel-default .panel-heading{
    background-color: #ECF0F3;
    color: #0A6783 !important;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    font-weight: 600 !important;
    padding: 6px 10px;
    font-size: 15px;
}

#estimate_main_details .modal-header,
#Invoice_main_details .modal-header{
    padding: 15px;
    border-bottom: 0px solid #e5e5e5;
}

#estimate_main_details .form-control,
#Invoice_main_details .form-control{
    height: 30px;
    font-size: 12px;
    font-weight: 400;
}

#estimate_main_details .panel,
#Invoice_main_details .panel{
  border-radius: 15px;
  border: 1px solid #dcdcdc;
  box-shadow: unset;
 }

 #estimate_main_details .BillingFromCard,
 #estimate_main_details .BillingToCard,
 #Invoice_main_details .invoice_BillingFromCard,
 #Invoice_main_details .invoice_BillingToCard{
  border: 1px solid #DEDEDE;
    border-radius: 15px;
    padding: 35px;
    width: 63%;
    cursor: pointer;
    margin-bottom: 20px;
 }

 #estimate_main_details .BillingFromAddress,
 .BillingFrom_address_and_gst,
  #estimate_main_details .BillingToAddress,
  .BillingTo_address_and_gst,
  #Invoice_main_details .invoice_BillingFromAddress,
 .invoice_BillingFrom_address_and_gst,
  #Invoice_main_details .invoice_BillingToAddress,
  .invoice_BillingTo_address_and_gst{
  font-size: 12px;
  width: 68%;
 }

 #Invoice_main_details .Invoice_AccountDetails{
  font-size: 12px;
 }

 #Invoice_main_details .Invoice_AccountDetails .form-group{
  margin-bottom: 0px;
 }

 #estimate_main_details .BillingFromAddress .form-group,
 #estimate_main_details .BillingToAddress .form-group,
 #Invoice_main_details .invoice_BillingFromAddress .form-group,
 #Invoice_main_details .invoice_BillingToAddress .form-group{
  margin-bottom: 5px;
 }


 #estimate_main_details .usericoncard,
 #Invoice_main_details .usericoncard{
  font-size: 35px;
  color: #337AB7;
 }

 #estimate_main_details .billingcardtitle,
 #Invoice_main_details .invoice_billingcardtitle{
  display: inline-block;
    margin-left: 10px;
    font-weight: 600;
    position: relative;
    top: -8px;
 }

 #estimate_main_details .pr0,
 #Invoice_main_details .pr0{
  padding-right: 0px;
 }

 #estimate_main_details .overflowhide,
 #Invoice_main_details .overflowhide{
  overflow: hidden;
 }

 #estimate_main_details #Address_Details .form-group,
 #estimate_main_details #Address_Details_BillTo .form-group,
 #Invoice_main_details #invoice_Address_Details .form-group,
 #Invoice_main_details #invoice_Address_Details_BillTo .form-group{
    margin-bottom: 10px;
}

#estimate_main_details #Address_Details .input-group-addon,
#Invoice_main_details #invoice_Address_Details .input-group-addon{
  padding: 3px 7px;
}

#estimate_main_details #participantTable td input[type=checkbox], 
#estimate_main_details #participantTable th input[type=checkbox],
#Invoice_main_details #invoice_participantTable td input[type=checkbox], 
#Invoice_main_details #invoice_participantTable th input[type=checkbox] {
    margin: 0;
    position: relative;
    top: 2px;
    width: 11px;
    height: 11px;
}

#estimate_main_details #participantTable,
#Invoice_main_details #invoice_participantTable{
  background: #ECF0F3;
  /*margin-top: 20px;*/
  margin-bottom: 0px;
}

#estimate_main_details #participantTable .main_amount,
#Invoice_main_details #invoice_participantTable .main_amount{
  font-size: 12px;
}

#estimate_main_details #participantTable .estimate_remove,
#Invoice_main_details #invoice_participantTable .Invoice_remove{
  cursor: pointer;
}

#estimate_main_details #estimate_billedto #addButtonRow .Estimate_add,
#Invoice_main_details .Invoice_add{
  cursor: pointer;
  color: #337AB7;
  font-weight: 600;
  margin-top: 10px;
}

#estimate_main_details #participantTable .main_amount,
#FinanceInvoiceModal .invoice_main_amount
{
  font-size: 12px !important;
}

#estimate_main_details #participantTable_discounts .main_amount,
#estimate_main_details #Calculate_discounts .main_amount,
#Invoice_main_details #invoice_participantTable .invoice_main_amount,
#Invoice_main_details #invoice_Calculate_discounts .invoice_main_amount{
  font-size: 12px;
  font-weight: 400;
  display: inline-block;
    padding-left: 5px;
}

#estimate_main_details #participantTable_discounts,
#Invoice_main_details #invoice_participantTable_discounts{
  background: #ECF0F3;
}

#estimate_main_details #Calculate_discounts,
#Invoice_main_details #invoice_Calculate_discounts{
  background: #ECF0F3;
}

#estimate_main_details #participantTable .custom-a11yselect-container,
#estimate_main_details #Calculate_discounts .custom-a11yselect-container,
#Invoice_main_details #invoice_participantTable .custom-a11yselect-container,
#Invoice_main_details #invoice_Calculate_discounts .custom-a11yselect-container{
  margin-right: 0px;
}

#estimate_main_details #participantTable.table>tbody>tr>td,
#estimate_main_details #Calculate_discounts.table>tbody>tr>td,
#Invoice_main_details #invoice_participantTable.table>tbody>tr>td,
#Invoice_main_details #invoice_Calculate_discounts.table>tbody>tr>td{
  border-top: none !important;
}

#estimate_main_details #Calculate_discounts,
#Invoice_main_details #invoice_Calculate_discounts{
  margin-bottom: 0px;
  font-size: 12px;
  color:#000;
}

#estimate_main_details #participantTable_discounts.table>tbody>tr:last-child
#Invoice_main_details #invoice_participantTable_discounts.table>tbody>tr:last-child{
  border-bottom: 2px solid #ddd;
}

#estimate_main_details #main_calculation .form-group,
#Invoice_main_details #invoice_main_calculation .form-group{
  margin-bottom: 10px;
}

#estimate_main_details #main_calculation .form-group:first-child,
#Invoice_main_details #invoice_main_calculation .form-group:first-child{
  margin-top:15px;
}

#estimate_main_details #main_calculation .form-group:last-child,
#Invoice_main_details #invoice_main_calculation .form-group:last-child{
  background: #ECF0F3;
  font-weight: 800;
}

#estimate_main_details .estimate_remove_discount,
#estimate_main_details .estimate_remove_adddiscount,
#Invoice_main_details .invoice_remove_discount,
#Invoice_main_details .invoice_remove_adddiscount{
  cursor: pointer;
}

#estimate_main_details .width_20,
#Invoice_main_details .width_20{
  width:22%;
}

#estimate_main_details .width_15,
#Invoice_main_details .width_15{
  width:15%;
}

#estimate_main_details .width_10,
#Invoice_main_details .width_10{
  width:10%;
}

#estimate_main_details .width_5,
#Invoice_main_details .width_5{
  width:5%;
}

#estimate_main_details .estimateDiffBillingEntity,
#estimate_main_details .estimateDiffGSTNum,
#estimate_main_details .estimateDiffcustomer,
#estimate_main_details .estimateDiffcustomergst,
#Invoice_main_details .invoice_DiffBillingEntity,
#Invoice_main_details .invoice_DiffGSTNum,
#Invoice_main_details .invoice_Diffcustomer,
#Invoice_main_details .invoiceDiffcustomergst,
.Invoice_AccountDetails_Link{
  color: #337AB7;
    cursor: pointer;
    font-size: 14px;
}

@media screen and (max-width: 767px){
  #estimate_main_details .BillingFromCard,
 #estimate_main_details .BillingToCard,
 #Invoice_main_details .invoice_BillingFromCard,
 #Invoice_main_details .invoice_BillingToCard{
  width: 100%;
 margin-bottom: 15px;
 }

 #estimate_main_details .modal-content#estimate_main_details .table-responsive,
 #Invoice_main_details .modal-content#Invoice_main_details .table-responsive{
  margin-bottom: 0px;
  border:none;
 }
}

/* my css */
.textarea-content
{
  height: 125px !important;
}

#FinanceEstimateModal #estimate_calculation .custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-reversed,
#edit_estimateModal #edit_estimate_calculation .custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-reversed,
#FinanceInvoiceModal #invoice_calculation .custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-reversed,
#edit_invoiceModal #edit_invoice_calculation .custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-reversed
{
  border-top: none; 
  border-right: none; 
  border-left: none; 
}

#FinanceEstimateModal #estimate_calculation .custom-a11yselect-container .custom-a11yselect-menu,
#edit_estimateModal #edit_estimate_calculation .custom-a11yselect-container .custom-a11yselect-menu,
#FinanceInvoiceModal #invoice_calculation .custom-a11yselect-container .custom-a11yselect-menu,
#edit_invoiceModal #edit_invoice_calculation .custom-a11yselect-container .custom-a11yselect-menu
{
  top: 100% !important;
}

#edit_estimateModal #edit_estimate_calculation .custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-reversed ,
 #edit_invoiceModal #edit_invoice_calculation  .custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-reversed
 {
  bottom: unset;
 }


#convert_invoice_main_details #convert_invoice_billedto #invoice_convert_addButtonRow .convert_Invoice_add, .convert_Invoice_AccountDetails_Link{
  font-weight: normal;
}

  /*New Create Estimate Form and Create Invoice Form Css End*/
</style>

<script type="text/javascript">
  $(document).ready(function(){
    /* New Create Estimate form Script Strat */
    var DiscountTypeitem = $(".Estimate_IGSTandCGST").val();
    if(DiscountTypeitem =='IGST'){
      $("#SGST_Discount").hide();
    }
    else if(DiscountTypeitem == 'CGST'){
       $("#SGST_Discount").show();
    }

    var Calculate_IGSTandCGST = $(".Calculate_IGSTandCGST").val();
    if(Calculate_IGSTandCGST =='IGST'){
      $("#SGST_Calculate").hide();
    }
    else if(Calculate_IGSTandCGST == 'CGST'){
       $("#SGST_Calculate").show();
    }
    
    $(document).on("click", "#create_estimate", function()
    {
      $("#save_estimateBTN_new").removeAttr("disabled");
      var el = $("#FinanceEstimateModal .close");
      resetData_estimate(el);
    });

    /* New Create Estimate form Script End */

    /* New Create Invoice form Script Start */

    var DiscountTypeitem = $("#Invoice_IGSTandCGST").val();
    if(DiscountTypeitem =='IGST'){
      $("#invoice_SGST_Discount").hide();
    }
    else if(DiscountTypeitem == 'CGST'){
       $("#invoice_SGST_Discount").show();
    }

    var invoice_Calculate_IGSTandCGST = $(".invoice_Calculate_IGSTandCGST").val();
    if(invoice_Calculate_IGSTandCGST =='IGST'){
      $("#invoice_SGST_Calculate").hide();
    }
    else if(invoice_Calculate_IGSTandCGST == 'CGST'){
       $("#invoice_SGST_Calculate").show();
    }
    $("#create_invoice").click(function(){
      var el1 = $("#FinanceInvoiceModal .close");
      resetData(el1);
    });
    /* New Create Invoice form Script End */
  });
</script>

<!-- <script>   -->

<!-- Added margin-bottom for search container While user and team list are displayed Script Start-->
<script type="text/javascript">
  $( document ).ready(function(){
    $.ajax({
      url: "../../../../client/res/templates/header-forUser/header_forUser_controller.php",
      type: "get",
      async: false,
      success: function(result)  {
        //alert(result);
        if(result == 'user'){
          var user_view = window.location.href; 
          user_view.indexOf(0);
          user_view.toLowerCase();
          user_view = user_view.split("/")[3];
          if(user_view == '#User' || user_view == '#Team'){
            $('.search-container').css({'margin-bottom':'15px','border-radius':'0px 0px 15px 15px'});
          }
        }
      }
    });

  var page_header = window.location.hash;
  if(page_header == "#KnowledgeBaseCategory"){
    $('.page-header').css({"background":"transparent","padding":"15px 0px"});
  }

  if(page_header == "#ImportResult"){
   $('#create').hide();
   $('.search-container').hide();
   $('#import_form_id').show();
  }
});
</script>
<!-- Added margin-bottom for search container While user and team list are displayed Script End-->


<script>

  //for meeting reminder validation
  var current_url = window.location.hash;
  var meeting_count = 0;
  //if(current_url == '#Meeting/create')
  // {
    $(document).on("change" ,'[name="seconds"]', function () {

      var seconds = new Array();
      $('[name="seconds"]').each(function() {
         seconds.push($(this).val());
      });

      var date    = $('input[data-name="dateStart"]').val();
      var time    = $('input[data-name="dateStart-time"]').val();
      if(!date){
        var input = { curl : current_url, rsec : seconds  };
      } else {
        var input = { rdate : date, rtime : time, rsec : seconds };
      }
      if(meeting_count == '0'){
        meeting_count ++;
        $.ajax({
          url     : '../../client/res/templates/meeting/time_validation.php',
          type    : 'GET',
          data : input,
          dataType: 'json',
          success : function(json) {
              if(json.type == 'false') {
                $('[name="seconds"]').prop('selectedIndex',0);
                // $('[name="seconds"] option[value="0"]').attr("selected", "selected");
                $.alert({
                  title: 'Alert!',
                  content: json.message,
                  type: 'dark',
                  typeAnimated: true,
                  draggable: false,
                });
                meeting_count =0;
              }
              else {
                meeting_count =0;
              }
            }
        });
      }
    });
  // }

// ============== Append js files to head tag for financial module ================= 
  var get_url = window.location.hash;
  if(get_url == "#Estimate")
  {
     appendScript('{{basePath}}client/js/financial_estimate_calculations.js');
     appendScript('{{basePath}}client/js/financial_estimate_calculations_edit.js');
     appendScript('{{basePath}}client/js/financial_convert_to_invoice_calculation.js');
  }
  if(get_url == "#Invoice")
  {
     appendScript('{{basePath}}client/js/financial_invoice_calculations.js');
     appendScript('{{basePath}}client/js/financial_invoice_calculations_edit.js');
  }

  function appendScript(lib)
  {
      var script = document.createElement('script');
      script.setAttribute('src', lib);
      document.getElementsByTagName('head')[0].appendChild(script);
      return script;
  }
// ============== Append js files to head tag for financial module =================


  //hide square icon which is appered before header
  //$('.breadcrumb-item span.fa-square-full').css('display','none !important');

  //Remove the page-header background color
  var afterhash_portal1 = window.location.href; 
  afterhash_portal1.indexOf(6);
  afterhash_portal1.toLowerCase();
  afterhash_portal1 = afterhash_portal1.split("/")[6]; 

  if(afterhash_portal1 == "create" || afterhash_portal1 == "view"){
    $('.page-header').css({"background":"transparent","padding":"15px 0px"});
  }

  //hide create button & showing custom button
  var href = $("#create").attr('href');

  if(href=='#ContactList/create'){
    $("#create").css('display','none');
    $("#create_contactList").css('display', 'block');
  }
  if(href=='#BillingEntity/create'){
    $("#create").css('display','none');
    $("#create_billing_entity").css('display', 'block');
  }
  if(href=='#ContentTemplate/create'){
    $("#create").css('display','none');
    $("#create_contentTemplate").css('display', 'block');
  }


//show contact list model
$(".addContactListModal").click( function(){
  $("#add-contactList-form").trigger("reset");

    var today       = new Date();
    var dd    = today.getDate();
    var mm    = today.getMonth()+1; 
    var yyyy  = today.getFullYear();

    var hrs     = today.getHours();
    var mints   = today.getMinutes();
    var sec     = today.getSeconds();

    document.getElementById("list_name").value = 'New List ' + dd + '-' + mm + '-' + yyyy + '-' + hrs  + mints  + sec;

        $("#addContactListModal").modal({
            backdrop: 'static',
            keyboard: false
        });
});


//hide sent message button
if(href=='#SentMessages/create'){
    $("#create").css('display','none');
  }

$("#add-contactList-form").bootstrapValidator({
    
    message: 'Please enter valid input',
        feedbackIcons: { },
        excluded: [':disabled'],
        fields: {
            "list_name": {
                validators: {
                    notEmpty: {
                        message: 'The list name is required and cannot be empty'
                    },
                }
            },
        },

  }).on('success.form.bv', function (event, data) {

  event.preventDefault();
    var form  = $(this);
    var url   = form.attr('action');
    form      = new FormData(form[0]);
    $.ajax({
      type    : "POST",
      url     : url,
      data    : form,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
        if(data.status == 'true'){

           $(function () {
             $('#addContactListModal').modal('toggle');

             $("#uploadContactListModal").modal({
                  backdrop: 'static',
                  keyboard: false
              });

             $.ajax({
              type    : "GET",
              url     : "../../client/res/templates/bulk_message/getCRMEntity.php",
              dataType  : "json",
              processData : false,
              contentType : false,
              success: function(data)
              {
                 if(data){
                   $(".crmEntityList").html(data.crmEntityList);
                   $(".getEntityContactsEdit").customA11ySelect(); 
                 }
              }
            });


          });
           //$('#add-contactList-form')[0].reset();
           var today       = new Date();
          var dd    = today.getDate();
          var mm    = today.getMonth()+1; 
          var yyyy  = today.getFullYear();

          var hrs     = today.getHours();
          var mints   = today.getMinutes();
          var sec     = today.getSeconds();

          document.getElementById("list_name").value = 'New List ' + dd + '-' + mm + '-' + yyyy + '-' + hrs  + mints  + sec;

           document.getElementById('list_name_res').innerHTML = data.list_name;
           document.getElementById('list_id_res').value = data.list_id;

        }else{
          $.alert({
            title: 'Alert!',
            content: data.msg,
            type: 'dark',
            typeAnimated: true,
            draggable: false,
          });

          // $('button[data-action="reset"]').trigger('click');
        }
      }
    });

    return false;
});

// Get Entity data
$(document).on("change" ,"#getEntityContacts", function (event1) {
    event1.preventDefault();
    event1.stopImmediatePropagation();
    var entity_name = $('#getEntityContacts').val();
    if(entity_name == 'select')
    {
      $('.entityContacts').css("display","none");
    }
    else
    {
        $('.entityContacts').css("display","block");
        document.getElementById('crmEntityName').value = entity_name;
        var dataTable;

         // Initialize datatable
         dataTable = $('#viewEntityContacts').DataTable({
            'destroy': true,
            "processing": true,
            "serverSide": true,

           'ajax': {
              'type':'GET',
              'url':'../../client/res/templates/bulk_message/getCRMEntityContacts.php',
              'data': function(data){
                 
                 data.request = 1;
                 data.table_name=entity_name;

              },
           },
           'columns': [
              { data: 'name' },
              { data: 'email' },
              { data: 'numeric' },
           ],
           'columnDefs': [ {
             'targets': [2], 
             'orderable': false,
           }]
         });
    }

    //reset upload contact form While changing tabs
    tabevent(active_tab);

  });

//hide entity datatable
$('.hideEntityDatatable').click(function(){
  $('.entityContacts').css("display","none");
  document.getElementById('crmEntityName').value = "";
});

//upload contacts
$('#upload-contacts-form').submit(function(event){
    $(".loader_gif").show();
    event.preventDefault();
    var form  = $(this);
    var url   = form.attr('action');
    form      = new FormData(form[0]);
    $.ajax({
      type    : "POST",
      url     : url,
      data    : form,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
        if(data.status == 'true'){
          $(".loader_gif").hide();
          $.alert({
            title: 'Success!',
            content: data.msg,
            type: 'dark',
            typeAnimated: true,
            draggable: false,
            buttons: {
                Ok: function () {
                    $('button[data-action="reset"]').trigger('click');
                    $(function () {
                      $('#uploadContactListModal').modal('toggle');
                    });
                    $('#upload-contacts-form')[0].reset();
                    $('.entityContacts').css("display","none");
                }
            }
          });
        }else{
          $(".loader_gif").hide();
          $.alert({
            title: 'Alert!',
            content: data.msg,
            type: 'dark',
            typeAnimated: true,
            draggable: false,
          });
        }
      }
    });

    return false;
});



</script>

<!-- add contact list modal -->
<div class="container">
<div class="modal fade" id="addContactListModal" role="dialog">
<div class="modal-dialog modal-emailwidth">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add Contact List</h4>
</div>
<div class="modal-body">
  <div class="">

    <form class="reminder-form" id="add-contactList-form" action="../../client/res/templates/bulk_message/saveContactList.php" enctype="multipart/form-data" method="post" autocomplete="off" >
    <!-- <h2 class="text-center">Email Reminder</h2> -->

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">

        <input id="list_name" type="text" name="list_name" placeholder="List Name" class="form-control" required="">

      </div>
    </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12"><br>
            <button value="addContactList" class="btn btn-primary pull-right" id="myBtn">Add</button>
          </div>
        </div>

    </form>

  </div>
</div>

</div>

</div>
</div>
</div>
<!-- close modal -->

<!-- add contacts modal -->
<div class="container">
  <div class="modal fade" id="uploadContactListModal" role="dialog">
    <div class="modal-dialog model-emailwidth">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="add_contacts_form_close" data-dismiss="modal">&times;</button>
          <!-- <button type="button" id="add_contacts_form_close" style="float: right;">×</button> -->
          <h4 class="modal-title text-center">Upload Contacts: <b><div id="list_name_res"></div></b></h4>
        </div>
        <div class="modal-body">
          <div class="container pl0 pr0">
                <form class="reminder-form" id="upload-contacts-form" action="../../client/res/templates/bulk_message/saveContacts.php" enctype="multipart/form-data" method="post" autocomplete="off" >

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="mrt-5">

                      <!-- hide & show nav-bar tab -->
                      <ul class="nav nav-tabs">
                        <!-- add data-toggle attribute to the anchors -->
                        <li class="active hideEntityDatatable activetab"><a data-toggle="tab" href="#home" onclick="activeTabs(this)">Upload File</a></li>
                        <li class="hideEntityDatatable"><a data-toggle="tab" href="#menu1" onclick="activeTabs(this)">Copy & Paste</a></li>
                        <li class="hideEntityDatatable"><a data-toggle="tab" href="#menu2" onclick="activeTabs(this)">Individual Entry</a></li>
                        <li><a data-toggle="tab" href="#menu3" onclick="activeTabs(this)">CRM Contacts</a></li>
                      </ul>
                      <br>
                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        <div class="bg bg-danger" style="padding: 10px;white-space: pre-line;">Note:Supported File Format is CSV.<!-- ,XLS,XLSX --> <a href="../../client/res/templates/bulk_message/FinCRM-Sample-File.csv" download>Download sample file</a></div>

                        <br>
                        <label>Choose file to upload: </label><br>
                        <input type="file" name="upload_file" value="" class="form-control" accept=".csv">
                      </div>
                      <div id="menu1" class="tab-pane fade">
                        <div class="bg bg-danger">
                          <span style="padding: 10px;white-space: pre-line;display:inline-block;">Note: Data must be comma(,) separated and you can skip a field by using space. Eg - abc, , 1234567890</span></div>
                        <br>
                        <label>Copy & Paste Contacts:</label>
                        <textarea placeholder="Your Name, Email, Phone" rows="5" cols="70" name="copy_paste" class="form-control"></textarea>
                      </div>
                      <div id="menu2" class="tab-pane fade">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label>User Name: </label><br>
                            <input class="form-control" placeholder="User Name" type="text" name="user_name" data-bv-field="user_name">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label>Email: </label><br>
                            <input class="form-control" placeholder="Email" type="text" name="user_email" data-bv-field="user_email">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>Phone: </label><br>
                            <input class="form-control number-only" placeholder="Mobile Number" type="text" name="individual" data-bv-field="individual">
                            <!--maxlength="10" minlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" -->
                          </div>
                        </div>
                      </div>
                      <div id="menu3" class="tab-pane fade">
                                  <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                      <label>Select Entity: </label>
                                      <span class="crmEntityList"></span>
                                    </div>
                                    
                                  </div>
                                  
                                  <!-- <div class="crmEntityData"></div> -->
                                </div>

                              </div>
                            <input type="hidden" name="list_id" id="list_id_res">
                          </div>
                        </div>
                    </div><br>

                    <div class="entityContacts" style="display: none">
                      <input type="hidden" id="crmEntityName" name="crmEntityName">
                      <table id='viewEntityContacts' class='display dataTable' style="width: 100%;background: #f1efef;">
                           <thead>
                             <tr>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Phone</th>
                             </tr>
                           </thead>
                         </table>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="mrt-10 file_name_append">
                        <!-- dynamic name append. -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="mrt-10"><br>
                          <button value="uploadContacts" class="btn btn-primary pull-right" id="myBtn" name="copy_paste_btn">Upload</button>
                        </div>
                      </div>
                    </div>
                    <div class="">
                      <img src="{{basePath}}client/img/loader2.gif" alt="loader" class="img-responsive loader_gif" style="display: none;">
                    </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- close modal -->

<script>

  if(href=='#MyCampaigns/create'){
    $("#create").css('display','none');
    $("#create_myCampaigns").css('display', 'block');
  }

  // close add contact model
  $('#add_contacts_form_close').click( function(){
    $('button[data-action="reset"]').trigger('click');
    $('#uploadContactListModal').modal('toggle');
    $(".modal-backdrop.in").remove();
  });


  //reset upload contact modal forms while clicking on close button start

  $('#uploadContactListModal').on('hidden.bs.modal', function () {
    $('#uploadContactListModal form')[0].reset();
    $('.entityContacts').hide();
    $('#upload-contacts-form .nav-tabs li').removeClass('active');
    $('#upload-contacts-form .nav-tabs li:first').addClass('active');
    $('#upload-contacts-form .tab-content .tab-pane').removeClass('active in');
    $('#upload-contacts-form .tab-content .tab-pane:first').addClass('active in');
    });

  //reset upload contact modal forms while clicking on close button End

  function resetSelectEntity(){
    $.ajax({
type : "GET",
url : "../../client/res/templates/bulk_message/getCRMEntity.php",
dataType : "json",
processData : false,
contentType : false,
success: function(data)
    {
    if(data){
    // $(".crmEntityList").html(data.crmEntityList);
    // $(".getEntityContactsEdit").customA11ySelect();
        $("#menu3 .crmEntityList").empty();
        $("#menu3 .crmEntityList").append(data.crmEntityList);
        $("#menu3 #getEntityContacts").customA11ySelect('refresh');
      }
    }
    });
  }

  //reset upload contact modal forms while clicking on new tab Start
  var active_tab = '';
  function activeTabs(element){
  active_tab = $(element).text();
  previous_active_tab = $('#upload-contacts-form .nav-tabs li.activetab a').text();
  $('#upload-contacts-form .nav-tabs li').removeClass('activetab');
  $(element).closest('li').addClass('activetab');

  var crmcontact = $("#menu3 select").children("option:selected").val();
  if(crmcontact != "select"){
    $('.entityContacts').show();
  }

  }

 var flag = 0;
  function tabevent(active_tab){
    flag = 0;
    var a = $("#upload-contacts-form #home input[name='upload_file']").val();
    var b = $("#upload-contacts-form #menu1 textarea[name='copy_paste']").val();
    var c = $("#upload-contacts-form #menu2 input[name='user_name']").val();
    var d = $("#upload-contacts-form #menu2 input[name='user_email']").val();
    var e = $("#upload-contacts-form #menu2 input[name='individual']").val();
    var f = $("#upload-contacts-form #menu3 select").children("option:selected").val();

    if(active_tab == 'Upload File'){
      if(b != '' || c != '' || d != '' || e != '' || f != 'select'){
        flag = 1;
      }
    }
    else if(active_tab == 'Copy & Paste'){
      if(a != '' || c != '' || d != '' || e != '' || f != 'select'){
        flag = 1;
      }
    }
    else if(active_tab == 'Individual Entry'){
      if(a != '' || b != '' || f != 'select'){
        flag = 1;
      }
    }
    else if(active_tab == 'CRM Contacts'){
      if(a != '' || b != '' || c != '' || d != '' || e != ''){
        flag = 1;
      }
    }


    if(flag==1){
      $.confirm({
        title: 'Confirm!',
        content: 'You have entered data using other input method. Do you wish to change your input? This will reset your earlier selection',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
        buttons: {
            ok: function () {
                $("#upload-contacts-form #home input[name='upload_file']").val('');
                $("#upload-contacts-form #menu1 textarea[name='copy_paste']").val('');
                $("#upload-contacts-form #menu2 input[name='user_name']").val('');
                $("#upload-contacts-form #menu2 input[name='user_email']").val('');
                $("#upload-contacts-form #menu2 input[name='individual']").val('');
                //$("#menu3 select").prop('selectedIndex',0);

                resetSelectEntity();
                $('.entityContacts').hide();  
            },
            cancel: function () {
              //$("#menu3 select").prop('selectedIndex',0);
              if(previous_active_tab == 'Upload File'){
                  if(a != ''){
                    //$("#menu3 select").prop('selectedIndex',0);
                    $('#upload-contacts-form .nav-tabs li').removeClass('active activetab'); 
                    $("a[href='#home']").closest('li').addClass('active activetab');   
                    $(".tab-content .tab-pane").removeClass('active in');   
                    $(".tab-content #home").addClass('active in'); 
                    resetSelectEntity();
                    $('.entityContacts').hide();
                  }
                }

              else if(previous_active_tab == 'Copy & Paste'){
                  if(b != ''){
                    //$("#menu3 select").prop('selectedIndex',0);
                    $('#upload-contacts-form .nav-tabs li').removeClass('active activetab'); 
                    $("a[href='#menu1']").closest('li').addClass('active activetab');   
                    $(".tab-content .tab-pane").removeClass('active in');   
                    $(".tab-content #menu1").addClass('active in');  
                    resetSelectEntity();
                    $('.entityContacts').hide();
                  }
                }

              else if(previous_active_tab == 'Individual Entry'){
                  if(c != '' || d != '' || e != ''){
                    //$("#menu3 select").prop('selectedIndex',0);
                    $('#upload-contacts-form .nav-tabs li').removeClass('active activetab'); 
                    $("a[href='#menu2']").closest('li').addClass('active activetab');   
                    $(".tab-content .tab-pane").removeClass('active in');   
                    $(".tab-content #menu2").addClass('active in'); 
                    resetSelectEntity();
                    $('.entityContacts').hide();
                  }
                }

              else if(previous_active_tab == 'CRM Contacts'){
                  if(f != 'select'){
                    $('#upload-contacts-form .nav-tabs li').removeClass('active activetab'); 
                    $("a[href='#menu3']").closest('li').addClass('active activetab');   
                    $(".tab-content .tab-pane").removeClass('active in');   
                    $(".tab-content #menu3").addClass('active in');  
                    $('.entityContacts').show();
                  }
                }
            }
        }
    });
    }
  }

  $("#upload-contacts-form #menu2 input[name='user_name'] ,#upload-contacts-form #menu2 input[name='user_email'], #upload-contacts-form #menu2 input[name='individual'], #upload-contacts-form #home input[name='upload_file'] , #upload-contacts-form #menu1 textarea[name='copy_paste']").focus(function(event){
    //alert("in Focus");
    event.preventDefault();
    event.stopImmediatePropagation();
    tabevent(active_tab);
  });


//reset upload contact modal forms while clicking on new tab End


  // show my campaigns model
  $(".sendSMSButton").click( function(){
    $("#send-sms-form").trigger("reset");
    //$("#sendSMS").modal("show");
    $("#sendSMS").modal({
        backdrop: 'static',
        keyboard: false
    });


     $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/bulk_message/getSendSMSData.php",
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
           if(data){
             $(".select-sender-id").html('');
             $(".select-sender-id").html('<option value="" > Select Sender ID </option>');

             if(data.senderIds){
                 $.each(data.senderIds, function (key, val) {
                    $(".select-sender-id").append('<option value="'+val+'" >'+key+' </option>');
                 });
             }


             $("#sms_content_template").html('');

             $("#sms_content_template").html('<option value="" > Select Content Template </option>');

             $(".select-sender-id,#sms_content_template").customA11ySelect('refresh');

             $(".remaining_messages").html(data.remaining_messages);
             $(".campaigns_name").html(data.campaigns_name);
             $(".sendSMSFrom").html(data.sendSMS);
             $(".addRecipientsList").html(data.data); 
             $(".sendSMSFrom select[name=sms_from]").customA11ySelect();
             $("#sms_recipients,#sms_content_template").customA11ySelect();

             $('#send-sms-form').bootstrapValidator('addField', 'campaigns_name', {
                validators: {
                    notEmpty: {
                        message: 'Please enter campaign name.'
                    }
                }
            }); 

            $('#send-sms-form').bootstrapValidator('addField', 'sms_from', {
                validators: {
                    notEmpty: {
                        message: 'Please select sender id.'
                    }
                }
            });

            $('#send-sms-form').bootstrapValidator('addField', 'sms_text', {
                validators: {
                    notEmpty: {
                        message: 'Please enter message.'
                    }
                }
            });

            $('#send-sms-form').bootstrapValidator('addField', 'copy_paste', {
                validators: {
                    notEmpty: {
                        message: 'Please enter recipients.'
                    }
                }
            });

            $('#send-sms-form').bootstrapValidator('addField', 'send_sms', {
                validators: {
                    notEmpty: {
                        message: 'Please select one option.'
                    }
                }
            });

            $('#send-sms-form').bootstrapValidator('addField', 'sms_content_template', {
                validators: {
                    notEmpty: {
                        message: 'Please select content template.'
                    }
                }
            });

             //set defualt sms count & length
             $('.sendSmsBodyLenght').html('0');
             $('.sendSmscount').html('0');

             //hide date picker
             $("#showDateTimeInput").css('display','none');
             $('#send-sms-form').bootstrapValidator('enableFieldValidators', 'date', false);
             $('#send-sms-form').bootstrapValidator('enableFieldValidators', 'time', false);

             //show manully capy paste textarea
             $(".recipients_show").css("display","block");
             $("#send-sms-form").bootstrapValidator("enableFieldValidators", "copy_paste", true);
           }
        }
      });
  });

  $(".showDateTime").click( function(){
    $("#showDateTimeInput").css('display','block');
    $('#send-sms-form').bootstrapValidator('enableFieldValidators', 'date', true); 
    $('#send-sms-form').bootstrapValidator('enableFieldValidators', 'time', true);
  });

  $(".hideDateTime").click( function(){
    $("#showDateTimeInput").css('display','none');
    $('#send-sms-form').bootstrapValidator('enableFieldValidators', 'date', false);
    $('#send-sms-form').bootstrapValidator('enableFieldValidators', 'time', false);
  });


// send sms 
  $("#send-sms-form").bootstrapValidator({
    
    message: 'Please enter valid input',
        feedbackIcons: { },
        excluded: [':disabled'],
        fields: {
            "sms_text": {
                validators: {
                    notEmpty: {
                        message: 'Please enter message.'
                    },
                }
            },
            "campaigns_name": {
                validators: {
                    Empty: {
                        message: 'Please enter campaign name.'
                    },
                }
            },
            "sms_from": {
                validators: {
                    Empty: {
                        message: 'Please select sender id.'
                    },
                }
            },
            "copy_paste": {
                validators: {
                    notEmpty: {
                        message: 'Please enter recipients.'
                    },
                }
            },
            "send_sms": {
                validators: {
                    notEmpty: {
                        message: 'Please select one option.'
                    },
                }
            },
            "date": {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a date for the reminder.'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The date format is not valid'
                    },
                }
            },
            "time": {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a time for the reminder.'
                    },
                }
            },
            "sms_content_template": {
                validators: {
                    notEmpty: {
                        message: 'Please select content template.'
                    },
                }
            },
        },

  }).on('success.form.bv', function (event, data) {

  event.preventDefault();

  // server side current date & time validation
  var selectedText1 = document.getElementById('send_sms_date').value;
   
    var parts1      = selectedText1.split('/');
    var selectedText1   = parts1[1]+"-"+parts1[0]+"-"+parts1[2];
    var selectedDate1   = new Date(selectedText1);   

    var today       = new Date();

    var dd1   = selectedDate1.getDate();
    var mm1   = selectedDate1.getMonth()+1; 
    var yyyy1   = selectedDate1.getFullYear();

    var dd    = today.getDate();
    var mm    = today.getMonth()+1; 
    var yyyy  = today.getFullYear();


    if(dd== dd1 && mm==mm1 && yyyy==yyyy1){
      var selectedTime= document.getElementById('send_sms_time').value;
      var insertedTime= new Date(selectedTime);
      var strArray= selectedTime.split(':');
      var selHRS= strArray[0];
      var selMints= strArray[1];

      var hrs= today.getHours();
      var mints= today.getMinutes();

      if(hrs>=selHRS){
        
        if(hrs == selHRS){

          if(mints>=selMints){

            $.alert({
              title: 'Alert!',
              content: 'Reminder can not be set for a past time',
              type: 'dark',
              typeAnimated: true,
              draggable: false,
            });

            document.getElementById('send_sms_time').value='';
            return false;
          }
        }else{
        
          $.alert({
            title: 'Alert!',
            content: 'Reminder can not be set for a past time',
            type: 'dark',
            typeAnimated: true,
            draggable: false,
          });
          document.getElementById('send_sms_time').value='';
          return false;
        }


      }
    }

    //  $.confirm({
    //     title: 'Confirm!',
    //     content: 'Simple confirm!',
    //     buttons: {
    //         confirm: function () {

    //            return true; 
    //         },
    //         cancel: function () {
    //             //console.log('cancel');
    //             //return false;
    //         }    }
    // });


    var form  = $(this);
    var url   = form.attr('action');
    form      = new FormData(form[0]);
    $.ajax({
      type    : "POST",
      url     : url,
      data    : form,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
        if(data.status == 'true'){
          $.alert({
            title: 'Success!',
            content: data.msg,
            type: 'dark',
            typeAnimated: true,
            draggable: false,
            buttons: {
                    Ok: function () {
                        $('#send-sms-form').bootstrapValidator('resetForm', true);
                        // $("#send-sms-form").trigger("reset");

                        $('#send-sms-form').bootstrapValidator('enableFieldValidators', 'copy_paste', true);

                        $("#sendSMS").modal("hide");

                        //$("#sendSMS .close").click();
                        $('button[data-action="reset"]').trigger('click');
                        // $(function () {
                        //    $('#sendSMS').modal('toggle');
                        // });
                        //  $('#send-sms-form')[0].reset();

                         $(".recipients_show").css("display","block");
                         $("#showDateTimeInput").css('display','none');
                         $("#smsBodyLenght").html(0);

                    }
                }
          });


        }else{
          $.alert({
            title: 'Alert!',
            content: data.msg,
            type: 'dark',
            typeAnimated: true,
            draggable: false,
          });

           //$('button[data-action="reset"]').trigger('click');
        }
      }
    });

    return false;
});

  function close_send_sms_model()
  {
    //$('#sendSMS').modal('toggle');
    $("#sendSMS .close").click();
    $('#send-sms-form')[0].reset();
    $(".recipients_show").css("display","block");
    $("#showDateTimeInput").css('display','none');
    $("#smsBodyLenght").html(0);
    $('#sendSMS .help-block').hide();

    $('.sendSmsBodyLenght').html('0');
    $('.sendSmscount').html('0');
    $("#sms_content_template").customA11ySelect('refresh');

  }
</script>

<!-- My campaigns add model -->
<div class="container">
  <div class="modal fade" id="sendSMS" role="dialog">
    <div class="modal-dialog modal-emailwidth">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="close_send_sms_model()" data-dismiss="modal">&times;</button>
          <!-- <br><button type="button" onclick="close_send_sms_model()" style="float: right;">&times;</button> -->
          <h4 class="modal-title">Add Campaign</h4>
        </div>
        <div class="modal-body">
          <div class="container panel-body-margin">
            <div class="row">
              <div class="col-sm-12 remaining_messages"></div>
            </div><br>

            <form class="reminder-form" id="send-sms-form" action="../../client/res/templates/bulk_message/sendSMS.php" enctype="multipart/form-data" method="post" autocomplete="off" >

                <div class="row">
                  <div class="col-xs-4">
                    <label>SMS From: </label>
                  </div>
                  <div class="col-xs-8">
                    <select name="sms_from" class="form-control select-sender-id" data-bv-field="sms_sender_id">
                    </select>
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-xs-4">
                    <label>Content Template : </label>
                  </div>
                  <div class="col-xs-8">
                    <select name="sms_content_template" class="form-control" id="sms_content_template">
                    </select>
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-xs-4">
                    <label>Campaigns Name : </label>
                  </div>
                  <div class="col-xs-8 campaigns_name">
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-xs-4">
                    <label>SMS Text: </label><br>
                    <!-- <i>160 symbols, 1 SMS</i><br>
                    <i>Current Length : <i id="smsBodyLenght">0</i></i> -->
                    <div>
                      <span>Characters: <b class="sendSmsBodyLenght">0 </b></span> 
                      <span>SMS Credits: <b class="sendSmscount">0</b></span>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <textarea id="sms_text" placeholder="Add SMS Body here..." rows="6" name="sms_text" class="form-control" readonly=""></textarea>
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-xs-4">
                    <label>Recipients: </label><br>
                  </div>
                  <div class="col-xs-8 addRecipientsList">

                  </div>
                </div><br>

                 <div class="row recipients_show" style="display:block;">
                  <div class="col-xs-4">
                  </div>
                  <div class="col-xs-8">
                    <textarea rows="6" name="copy_paste" id="recipients" placeholder="Type or paste phone numbers. Must be comma separated." class="form-control"></textarea>
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-xs-4">
                    <label>Send SMS: </label>
                  </div>
                  <div class="col-xs-8">
                    <input type="radio" name="send_sms" value="immediately" class="hideDateTime"> Immediately<br>
                    <input type="radio" name="send_sms" value="sms_date" class="showDateTime"> Schedule At
                  </div>
                </div><br>

                <div class="row" id="showDateTimeInput" style="display: none;">
                  <div class="col-xs-4"></div>
                  <div class="col-xs-8">
                    <div class="row">
                      <div class="col-sm-6">
                       <!--  <input type="date" id="sendSMSDate" name="date" class="form-control"> -->
                        <div class="input-group">
                            <!-- <label>Date:</label> -->
                            <input class="form-control send_sms_date" required="" date-format="dd/mm/yyyy" id="send_sms_date" name="date" placeholder="Select Date" type="text" data-bv-field="send_sms_date" onchange="send_sms_checkDate()" onkeydown="return false" onclick="getDateEvent(this)">
                            <label class="btn-default_gray input-group-addon" for="send_sms_date"><i class="material-icons-outlined" style="font-size: 16px !important;position: relative;">date_range</i></label>
                        </div>

                      </div>
                      <div class="col-sm-6">
                        <div class="send_sms_clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                            <input type="text" required="" name="time" id="send_sms_time" placeholder="Select Time" class="form-control send_sms_time" onchange="send_sms_checkTime()" data-bv-field="send_sms_time" onkeydown="return false" onfocus="getEvent(this)">
                            <span class="btn-default_gray input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>                        
                      </div>
                    </div><br>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-8"></div>
                  <div class="col-sm-4">
                    <button value="sendSMS" class="btn btn-primary pull-right" id="sendSMSbtn">Save</button>
                  </div>
                </div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- close modal -->

<script>
$('#sms_text').on("keypress", function() {

var smsBodyLenght = $('#sms_text').val().length;
  $("#smsBodyLenght").html(smsBodyLenght);
});
//showing time & date picker
$('.send_sms_clockpicker').clockpicker({
  placement: 'top',   
  align: 'left'
});
// Datetime Picker - Add
$('.input-group.date').datepicker({format: "dd/mm/yyyy",autoclose: true,todayHighlight  : true});

  var date_input  = $('input[name="date"]'); //our date input has the name "date"
  var container   = $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

  date_input.datepicker({
    format      : 'dd/mm/yyyy',
    container     : container,
    todayHighlight  : true,
    autoclose     : true,
    
    startDate   : new Date(),
    endDate     : new Date(new Date().setDate(new Date().getDate() + 365))
  });

  function send_sms_checkDate()
  {
    var selectedText1 = document.getElementById('send_sms_date').value;
    if(selectedText1){
      $("#send-sms-form").bootstrapValidator("enableFieldValidators", "date", false);
    }else{
      $("#send-sms-form").bootstrapValidator("enableFieldValidators", "date", true);
    }
  }

  function send_sms_checkTime(){

    var selectedText1 = document.getElementById('send_sms_date').value;
   
    if(selectedText1==""){
      $.alert({
        title: 'Alert!',
        content: 'Please select date first',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
      });
      
      document.getElementById('send_sms_time').value="";
    }

    var selectedTime1= document.getElementById('send_sms_time').value;
    if(selectedTime1)
    {
      $("#send-sms-form").bootstrapValidator("enableFieldValidators", "time", false);
    }
    else
    {
      $("#send-sms-form").bootstrapValidator("enableFieldValidators", "time", true);
    }

    var parts1      = selectedText1.split('/');
    var selectedText1   = parts1[1]+"-"+parts1[0]+"-"+parts1[2];
    var selectedDate1   = new Date(selectedText1);   

    var today       = new Date();

    var dd1   = selectedDate1.getDate();
    var mm1   = selectedDate1.getMonth()+1; 
    var yyyy1   = selectedDate1.getFullYear();

    var dd    = today.getDate();
    var mm    = today.getMonth()+1; 
    var yyyy  = today.getFullYear();


    if(dd== dd1 && mm==mm1 && yyyy==yyyy1){
      var selectedTime= document.getElementById('send_sms_time').value;
      var insertedTime= new Date(selectedTime);
      var strArray= selectedTime.split(':');
      var selHRS= strArray[0];
      var selMints= strArray[1];

      var hrs= today.getHours();
      var mints= today.getMinutes();

      if(hrs>=selHRS){
        
        if(hrs == selHRS){

          if(mints>=selMints){

            $.alert({
              title: 'Alert!',
              content: 'Reminder can not be set for a past time',
              type: 'dark',
              typeAnimated: true,
              draggable: false,
            });

            document.getElementById('send_sms_time').value='';
          }
        }else{
        
          $.alert({
            title: 'Alert!',
            content: 'Reminder can not be set for a past time',
            type: 'dark',
            typeAnimated: true,
            draggable: false,
          });
          document.getElementById('send_sms_time').value='';
        }


      }
    }
        //$('#send-sms-form').bootstrapValidator('revalidateField', 'send_sms_time');
  }
</script>

<!-- Custom Export script Start -->
<script type="text/javascript">
    var afterhash = window.location.hash;
    if(afterhash =='#Export'){
        $('.search-container').css("display","none");
        $('.page-header').css({"background":"transparent","padding":"15px 5px"});
        $('.list-buttons-container').css("display","none");
        $('.list').css("display","none");
        $('.No_data').css("display","none");
        $('.export_form').css("display","block");
    }
    
    if( afterhash == "#ExportResult" ){
        $('button[data-action="reset"]').trigger('click');
    }
    if(afterhash =='#ClosedTask')
    {
      $("#create").css("display","none");
    }
</script>
<!-- Custom Export script End -->

<!-- Custom Holiday Calender script Start -->
<script type="text/javascript">
    var afterhash = window.location.hash;
    if(afterhash =='#HolidayCalender'){
        $('.search-container').css("display","none");
        $('.page-header').css({"background":"transparent","padding":"15px 15px"});
        $('.list-buttons-container').css("display","none");
        $('.list').css("display","none");
        $('.No_data').css("display","none");
        $('.holiday_calender').css("display","block");
        $('[href="#HolidayCalender/create"]').css("display","none");
        $('.breadcrumb-item').prepend('<span class="material-icons-outlined">receipt</span>&nbsp;');
    }

</script>
<!-- Custom Holiday Calender script End -->


<script>
    // hiding create button in Email and SMS sent model
    var href = $("#create").attr('href');
    if(href=='#SendSMSData/create' || href=='#SentEmailReminder/create')
    {
      $("#create").css('display','none');  

      $("#create_estimate").css('display','none');
    }
    //end

    /* Custom Export display export result and export btn from export in Crm Start */

    if(href == '#Export/create'){
      $("#create").css('display','none'); 
      $("#export_result").css("display","block");
    }
    
    if(href == '#ExportResult/create'){
      $("#create").css('display','none'); 
      $("#export_form_id").css("display","block");
    }
    /* Custom Export display export result and export btn from export in crm End */
    
    // Add plus btn in externalAccounts & calendar Start
  var afterhash_admin1 = window.location.hash;
  if(afterhash_admin1 == '#User/view/1'){
      $(".page-header-column-2 .header-buttons #externalAccounts").prepend('<i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i>');
      $(".page-header-column-2 .header-buttons #calendar span").remove();
      $(".page-header-column-2 .header-buttons #calendar").prepend('<i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i>');
      $(".page-header-column-2 .header-buttons .btn-group button").removeClass("btn-primary");
      $(".page-header-column-2 .header-buttons .btn-group button").addClass("btn-default");
  }
    // Add plus btn in externalAccounts & calendar End







    $(document).ready(function() {
          var afterhashForName = window.location.hash;
          afterhashForName.indexOf(0);
         // alert("FIRST ALERT= "+afterhashForName);
          afterhashForName.toLowerCase();
          afterhashForName= afterhashForName.split("/")[0];
          //alert(afterhashForName);
          var afterhash = window.location.hash;
          afterhash.indexOf(2);
          afterhash.toLowerCase();
          afterhash = afterhash.split("/")[1];
          if(afterhash =='view')
          {
           $("#create_record").css({'display':'inline-none','margin-left':'5px'});
           $("#createFormLink").css('text-decoration', 'none');
           $("#create_record").html("<i class='material-icons-outlined' style='font-size: 13px;position: relative;top: 2px;'>add</i> Create "+(afterhashForName.replace(/[^a-zA-Z ]/g, "")).replace(/([A-Z])/g, ' $1').trim());
           //$("#createFormLink").setAttribute(href, afterhashForName);
           var a = document.getElementById('createFormLink'); //or grab it by tagname etc
            a.href = afterhashForName+"/create";
          }
        });
</script>
<script type="text/javascript">
      
      var first_view = $(location).attr('href'); 
      //alert(first_view);
      first_view.indexOf(1);
      //alert(first_view);
      first_view.toLowerCase();
      first_view = first_view.split("/")[4];
      //alert(first_view);
      if(first_view == "create" || first_view == "edit"){
        $(".page-header").css("background","transparent");
        $(".page-header").css("padding","15px 0px");
      }
</script>

<style>
  .header-buttons a[data-name="follow"]{
      display:none;
  }
  .header-buttons a[data-name="unfollow"]{
      
      display:none;
  }
  #convert{
      
      display:none;
  }
  #cac{
      
      display:none;
  }

  #setCompletedMain{
      
      display:none;
  }

  #create{
      
  }

  .modal-emailwidth {
    width: 700px;
}


  .modal { overflow: auto !important; }

</style>
<script type="text/javascript">
$(document).ready(function(){
  var main_header_btn_name= $("#main_header_create .header-buttons .create_btn_mobile").html();
 $(window).resize(function(){
  if ($(window).width() < 767)
    {
      $("#main_header_create .header-buttons .create_btn_mobile").text('');
      $("#main_header_create .header-buttons .create_btn_mobile").html('<i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i>');
    }
    else{
      $("#main_header_create .header-buttons .create_btn_mobile").html(main_header_btn_name);
    }
  });

 if ($(window).width() < 767)
    {
      $("#main_header_create .header-buttons .create_btn_mobile,#addVariable,#edit_addVariable").text('');
      $("#main_header_create .header-buttons .create_btn_mobile,#addVariable,#edit_addVariable").html('<i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i>');
    }
  });
</script>


<div class="page-header-row" id="main_header_create">
    <div class="{{#if noBreakWords}} no-break-words{{/if}} page-header-column-1">
        <h3 class="header-title">{{{header}}}</h3>
    </div>
    <div class="page-header-column-2">
        <div class="header-buttons btn-group pull-right">
            {{#each items.buttons}}

                    <a {{#if link}}href="{{link}}"{{else}}href="javascript:"{{/if}}  class="btn btn-{{#if style}}{{style}}{{else}}default{{/if}} action{{#if hidden}} hidden{{/if}} create_btn_mobile" id="{{name}}" data-name="{{name}}" data-action="{{action}}"{{#each data}} data-{{@key}}="{{./this}}"{{/each}}{{#if title}} title="{{title}}"{{/if}}>
                    {{#if iconHtml}}{{{iconHtml}}} {{/if}} 
                    {{#if html}}{{{html}}}{{else}}{{translate label scope=../../scope}}{{/if}}
                    </a>
            {{/each}}

            {{#if items.actions}}
                <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    {{translate 'Actions'}} <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                    {{#each items.actions}}
                    <li class="{{#if hidden}}hidden{{/if}}"><a {{#if link}}href="{{link}}"{{else}}href="javascript:"{{/if}} class="action" data-name="{{name}}" data-action="{{action}}"{{#each data}} data-{{@key}}="{{./this}}"{{/each}}>{{#if html}}{{{html}}}{{else}}{{translate label scope=../../../scope}}{{/if}}</a></li>
                    {{/each}}
                </ul>
                </div>
            {{/if}}

            <a id="createFormLink"><button type="button" id="create_record" style="display:none;" class="btn btn-primary"></button></a> 
            <!-- Create Estimate -->
            <button type="button" id="create_estimate" style="display:none" class="btn btn-primary create_btn_mobile" data-toggle="modal" data-target="#FinanceEstimateModal" data-backdrop="static" data-keyboard="false"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Create Estimate</button>
            <!-- Create Estimate -->

            <!-- Create Billing Entity -->
            <button type="button" id="create_billing_entity" style="display:none" class="btn btn-primary create_btn_mobile " data-toggle="modal" data-target="#billing_entity"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Create Billing Entity</button>
            <!-- Create Invoice -->

            <!-- Create Invoice -->
            <button type="button" id="create_invoice" style="display:none" class="btn btn-primary create_btn_mobile" data-toggle="modal" data-target="#FinanceInvoiceModal" data-backdrop="static" data-keyboard="false"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Create Invoice</button>
            <!-- Create Invoice -->

            <!-- Create Payment -->
            <button type="button" id="create_payment" style="display:none" class="btn btn-primary create_btn_mobile " data-toggle="modal" data-target="#payment"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Create Payment</button>
            <!-- Create Payment -->

            <!-- Create Email Reminder -->
            <button type="button" id="create_email" style="display:none" class="btn btn-primary create_btn_mobile addModal"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Create Email Reminder</button>
            <!-- Create Email Reminder -->

            <!-- Create SMS Reminder -->
            <button type="button" id="create_sms" style="display:none" class="btn btn-primary create_btn_mobile addSmsModal"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Create SMS Reminder</button>
            <!-- Create SMS Reminder -->

            <!-- create contact list -->
            <button type="button" id="create_contactList" style="display:none" class="btn btn-primary create_btn_mobile addContactListModal"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Create Contact List</button>
            <!-- create contact list -->

            <!-- created my campaigns button -->
            <button type="button" id="create_myCampaigns" style="display:none" class="btn btn-primary sendSMSButton create_btn_mobile"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Create Campaign</button>
            
            <!-- Custom Export add export result and export btn from export in page-header Start -->

            <a href="#ExportResult" style="text-decoration:none;"><button type="button" id="export_result" style="display:none" class="btn btn-primary create_btn_mobile "><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Export Result</button></a>
            
            <a href="#Export" style="text-decoration:none;"><button type="button" id="export_form_id" style="display:none" class="btn btn-primary create_btn_mobile "><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Export</button></a>
            
            <!-- Custom Export add export result and export btn from export in page-header End -->

            <!-- Custom Import add import btn from import in page-header Start -->

            <a href="#Import" style="text-decoration:none;"><button type="button" id="import_form_id" style="display:none" class="btn btn-primary create_btn_mobile ">New Import</button></a>
            
            <!-- Custom Import add import btn from import in page-header End -->


            <!-- Custom Content Templates btn from Campaigns in page-header Start -->

             <button type="button" id="create_contentTemplate" data-toggle="modal" data-target="#create_contentTemplateModal" data-backdrop="static" data-keyboard="false" style="display:none" class="btn btn-primary create_btn_mobile"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Create Template</button>

            <!-- Custom Content Templates btn from Campaigns in page-header End -->
            

            {{#if items.dropdown}}
                <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <!-- <span class="fas fa-ellipsis-h"></span> --><span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                    {{#each items.dropdown}}
                    {{#if this}}
                    <li class="{{#if hidden}}hidden{{/if}}"><a {{#if link}}href="{{link}}"{{else}}href="javascript:"{{/if}} class="action" data-name="{{name}}" data-action="{{action}}"{{#each data}} data-{{@key}}="{{./this}}"{{/each}}>{{#if iconHtml}}{{{iconHtml}}} {{/if}}{{#if html}}{{{html}}}{{else}}{{translate label scope=../../../scope}}{{/if}}</a></li>
                    {{else}}
                        {{#unless @first}}
                        {{#unless @last}}
                        <li class="divider"></li>
                        {{/unless}}
                        {{/unless}}
                    {{/if}}
                    {{/each}}
                </ul>
                </div>
            {{/if}}
        </div>
    </div>
</div>

<!-- Payment Modal -->

<!-- Modal -->
  <div class="modal fade" id="payment" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-record_payment_width">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button id="update_data" type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Payment History</h4>
        </div>
        <div class="modal-body" style="padding-top:0px;">
          <form id="createPaymentForm" method="post" autocomplete="off">
          <div class="">
              <div class="row">
                <div class="col-md-12">
                  <div class="">
                    <button type="submit" class="btn btn-primary" id="save_paymentBTN">Save</button>
                   <!--  <button type="butto" class="btn btn-default">Cancel</button> -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                    <h4 style="color: #0A6783 !important;font-size: 15px;font-weight: 600;">Overview</h4>
                  </div>
                </div>
              </div>

               <div class="row">

               <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                     <label>Account <span class="text-danger">*</span></label>
                    <div class="input-group">
                      <input type="text"  id="payment_account_id" name="account_name" class="form-control readonly" placeholder="Please Select Account" required>
                      <span class="btn btn-default_gray input-group-addon"  data-toggle="modal" data-target="#paymentModal"><i class="glyphicon glyphicon-arrow-up"></i></span>
                    </div>
                   </div>
                </div>
                 <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label >Payment Type <span class="text-danger">*</span></label>
                      <select id="payment_type" name="payment_type" class="form-control" disabled required>
                        {{!--<option value="Select Payment Type">Select Payment Type</option>--}}
                        <option value="Against Invoice">Against Invoice</option>
                      </select>
                   </div>
                </div>
               
               
                
              </div>
          
               <div class="row">
                <div class="col-sm-6 col-md-6" id="payment_date_div" style="display:none">
                  <div class="form-group">
                    <label for="">Date of Payment <span class="text-danger">*</span></label>
                      <div  id="datepicker2" class="input-group date" data-date-format="mm-dd-yyyy">
                      <input type="text"  name="payment_date" class="form-control" placeholder="" required>
                      <span class="btn btn-default_gray input-group-addon"><i class="material-icons-outlined" style="font-size:16px !important;">date_range</i></span>
                    </div>
                   </div>
                </div>
                <div class="col-sm-6 col-md-6" id="invoiceno_div" style="visibility:hidden">
                  <div class="form-group">
                    <label >Invoice Number</label>
                      
                   </div>
                </div>
                
              </div>

               <div class="row">
                <div class="col-md-6" id="billed_amount_div" style="display:none">
                  <div class="form-group">
                    <label >Amount</label>
                      <input type="text" id="billed_amount" name="billed_amount" class="form-control" placeholder="" readonly>
                   </div>
                </div>
                <div class="col-md-6" id="tds_div" style="visibility:hidden">
                  <div class="form-group">
                    <label >TDS Deducted</label>
                   </div>
                </div>
              </div>
             <!-- <div class="row">
                <div class="col-md-6" id="net_amount_div" style="display:none">
                  <div class="form-group">
                    <label >Net Amount Received</label>
                      <input type="text" id="net_amount"  name="net_amount" class="form-control" placeholder="">
                   </div>
                </div>
               
              </div>    -->

              <div class="row">
                 <div class="col-md-6" id="mode_div" style="display:none">
                  <div class="form-group">
                    <label>Mode<span class="text-danger">*</span></label>
                      <select name="mode" id="mode" class="form-control" required>
                      
                        <option value="Cheque">Cheque</option>
                        <option value="Cash">Cash</option>
                        <option value="RTGS/NEFT/IMPS">RTGS/NEFT/IMPS</option>
                        <option value="Online">Online</option>
                        <option value="Others">Others</option>
                      </select>
                   </div>
                </div>
                <div class="col-md-6" id="transaction_id_div" style="display:none">
                  <div class="form-group">
                      <label>Reference Id</label>
                      <input type="text" id="transaction_id" name="transaction_id" class="form-control" placeholder="">
                   </div>
                </div>               
              </div>


              <div class="row" id="payment_table" style="display:none;">
                <div class="col-md-12">
                  <div class="form-group">
                      <div class="table-responsive Finance_custom-a11yselect">
                      <table class="table">
                          <thead>
                            <tr>
                              <th>Invoice No</th>
                              <th>Invoice Date</th>
                              <th>Invoice Amount</th>
                              <th>Due Amount</th>
                              <th>TDS</th>
                              <th>Received Amount</th>
                              <th>Mode</th>
                              <th>Ref ID</th>
                            </tr>
                          </thead>
                           <div style="display: none;" class="alert alert-danger" id="error">
                            </div>
                          <tbody id="payment_data"></tbody>
                        </table>
                      </div>
                   </div>
                </div>               
              </div>

          </div>
          </form> 
        </div>
        
      </div>
      
    </div>
  </div>

</div>


 <!-- Payment Account Modal -->
  <div class="modal fade" id="paymentModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Account   </h4>

        </div>
        <div class="modal-body">
            <table id="examplepayment" class="table" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="color:black" class="th-sm">Name
                  </th>
                  <th style="color:black" class="th-sm">City
                  </th>
                </tr>
              </thead>
            </table>
        </div>
       
      </div>
      
    </div>
  </div>




<!-- Payment Modal -->

<!-- Billing Entity -->
<div class="">
  <style type="text/css">
     .material-icons-outlined{
     font-size: 18px;
     position: relative;
     /*top:4px;*/
     }
     .panel-default .panel-heading .panel-title{
     background-color: #fff;
     color: #0A6783 !important;
     border-top-left-radius: 15px;
     border-top-right-radius: 15px;
     font-weight: 600;
     }
     .modal-header {
     padding: 15px;
     border-bottom: 0px solid #e5e5e5;
     }
     .Gstin_Que{
     color: #0A6783;
     font-weight: 600;
     }
     .add_gst_deatils, .add_bank_deatils, #add_bank_deatils{
     padding: 4px 9px 5px;
     font-size: 13px;
     }
     .form-control {
     height: 31px;
     }
     .panel{
     border-radius: 15px;
     }
     .bank_deleteBtn{
     padding: 3px 7px;
     }

     .GST_deleteBtn{
        padding: 3px 7px;
     }
     .display_none
     {
     display: none;
     }
  </style>
  <div class="modal fade" id="billing_entity" role="dialog" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
               <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Create Billing Entity</h4>
            </div>
            <div class="modal-body" style="padding-top:0px;">
              <form id="createBillingEntityForm" method="post" enctype='multipart/form-data' autocomplete="off">
                <input type="hidden" name="" id="static_input" value="1">
                <div class="row">
                   <div class="col-md-12">
                      <div class="" style="margin-bottom: 15px;">
                         <button type="button" class="btn btn-primary" id="save_billingEntityBTN" onclick="create_save_operation()">Save</button>
                         <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                   </div>
                </div>
                <div class="panel panel-default">
                   <div class="panel-body panel-body-form">
                      <div class="Overview_details">
                         <div class="row">
                            <div class="col-md-12">
                               <div class="panel-heading" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;">
                                  <h4 class="panel-title">
                                     Overview
                                  </h4>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                               <div class="form-group name_group">
                                  <label >Name <span class="text-danger">*</span></label>
                                  <input type="text" name="billing_entityname" class="form-control name">
                                  <span class="temp-error display_none text-danger">Please enter name</span>
                               </div>
                               <div class="form-group email_group">
                                  <label >Email-Id</label>
                                  <input type="email" name="billing_entityemail" class="form-control email">
                                  <span class="temp-error display_none text-danger">Please enter your e-mail id</span>
                                  <span class="Invalid-temp-error display_none text-danger">Please enter valid e-mail id</span>
                               </div>
                               <div class="form-group address_group">
                                  <label >Address</label>
                                  <input type="text" name="billingEntityAddressStreet" class="form-control address" maxlength="56" placeholder="Street">
                                  <span class="temp-error display_none text-danger">Please enter your address</span>
                               </div>
                               <div class="row">
                                  <div class="col-md-4">
                                     <div class="form-group city_group">
                                        <input type="text" name="billingEntityAddressCity" class="form-control city" placeholder="City">
                                        <span class="temp-error display_none text-danger">Please enter your city</span>
                                     </div>
                                  </div>
                                  <div class="col-md-4">
                                     <div class="form-group state_group">
                                        <select name="billingEntityAddressState" id="overview_state" class="form-control Select_state" onchange="getStateName(this.value);">
                                           <option value="">State</option>
                                           <option value="Andhra Pradesh">Andhra Pradesh</option>
                                           <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                           <option value="Assam">Assam</option>
                                           <option value="Bihar">Bihar</option>
                                           <option value="Chhattisgarh">Chhattisgarh</option>
                                           <option value="Goa">Goa</option>
                                           <option value="Gujarat">Gujarat</option>
                                           <option value="Haryana">Haryana</option>
                                           <option value="Himachal Pradesh">Himachal Pradesh</option>
                                           <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                           <option value="Jharkhand">Jharkhand</option>
                                           <option value="Karnataka">Karnataka</option>
                                           <option value="Kerala">Kerala</option>
                                           <option value="Madhya Pradesh">Madhya Pradesh</option>
                                           <option value="Maharashtra">Maharashtra</option>
                                           <option value="Manipur">Manipur</option>
                                           <option value="Meghalaya">Meghalaya</option>
                                           <option value="Mizoram">Mizoram</option>
                                           <option value="Nagaland">Nagaland</option>
                                           <option value="Odisha">Odisha</option>
                                           <option value="Punjab">Punjab</option>
                                           <option value="Rajasthan">Rajasthan</option>
                                           <option value="Sikkim">Sikkim</option>
                                           <option value="Tamil Nadu">Tamil Nadu</option>
                                           <option value="Tripura">Tripura</option>
                                           <option value="Uttarakhand">Uttarakhand</option>
                                           <option value="Uttar Pradesh">Uttar Pradesh</option>
                                           <option value="West Bengal">West Bengal</option>
                                           <option value="Andaman & Nicobar">Andaman & Nicobar</option>
                                           <option value="Chandigarh">Chandigarh</option>
                                           <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                           <option value="Daman and Diu">Daman and Diu</option>
                                           <option value="Delhi">Delhi</option>
                                           <option value="Lakshadweep">Lakshadweep</option>
                                           <option value="Pondicherry">Pondicherry</option>
                                           <option value="Telangana">Telangana</option>
                                           <option value="Andhrapradesh(New)">Andhrapradesh(New)</option>
                                           <option value="Ladakh">Ladakh</option>
                                        </select>
                                        <span class="temp-error display_none text-danger">Please select state</span>
                                     </div>
                                  </div>
                                  <div class="col-md-4">
                                     <div class="form-group postal_code_group">
                                        <input type="text"  name="billingEntityAddressPostalCode" class="form-control overview_postal_code" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                        <span class="temp-error display_none text-danger">Please enter your postal code</span>
                                     </div>
                                  </div>
                               </div>
                               <div class="form-group pan_no_group">
                                  <label >PAN No. <span class="text-danger">*</span></label>
                                  <input type="text" name="billing_entitypanno" class="form-control overview_panno" minlength="10" maxlength="10" placeholder="PAN No." style="text-transform:uppercase">
                                  <span class="temp-error display_none text-danger">Please enter PAN no.</span>
                                  <span class="Invalid-temp-error display_none text-danger">Please enter valid pan number</span>
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group website_group">
                                  <label >Website</label>
                                  <input type="text" name="billing_entitywebsite" class="form-control website">
                                  <span class="temp-error display_none text-danger">Please enter website</span>
                               </div>
                               <div class="form-group phone_no_group">
                                  <label >Phone</label>
                                  <input type="text" name="billing_entityphone" id="billing_entityphone" class="form-control phone" minlength="12" maxlength="12" onkeypress='return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 32)'>
                                  <span class="temp-error display_none text-danger">Please enter your phone no.</span>
                               </div>
                               <div class="form-group reg_group">
                                  <label>Udyam Registration No.</label>
                                  <input type="text" name="billing_entityudyamno" class="form-control regno">
                                  <span class="temp-error display_none text-danger">Please enter registeration no.</span>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="panel panel-default main_bank_deatils">

                  <div class="static_create">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="panel-heading" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;">
                              <h4 class="panel-title" style="display:inline-block;">
                                 Bank Details
                              </h4>
                           </div>
                        </div>
                      </div>
                   </div>

                   <div class="panel-body panel-body-form bank-append">
                       
                      <div class="addbankdetails1">
                         <!-- <div class="row">
                            <div class="col-md-12">
                               <div class="panel-heading" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;">
                                  <h4 class="panel-title" style="display:inline-block;">
                                     Bank Details
                                  </h4>
                               </div>
                            </div>
                          </div> -->
                          <div class="row">
                            <div class="col-md-12">
                               <div class="panel-heading" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;">
                                  <h4 class="panel-title bank_title" style="display:inline-block;">
                                     Bank Account 1
                                  </h4>
                                  <button type="button" class="btn btn-danger bank_deleteBtn pull-right" style="display: none;"><span class="material-icons-outlined">close</span></button>
                               </div>
                            </div>
                          </div>
                         <div class="row">
                            <div class="col-sm-6 col-md-6">
                               <div class="form-group Beneficiary_group">
                                  <label for="">Beneficiary Name</label>
                                  <input type="text" name="billingentity_bank_beneficiary[]" value="" class="form-control beneficiary_nm" placeholder="Beneficiary Name">
                                  <span class="temp-error display_none text-danger">Please enter beneficiary name</span>
                               </div>
                            </div>
                            <div class="col-sm-6   col-md-6">
                               <div class="form-group bankName_group">
                                  <label for="">Name of Bank</label>
                                  <input type="text" name="billingentity_bank_name[]" value=""  class="form-control bank_nm" placeholder="Name of bank">
                                  <span class="temp-error display_none text-danger">Please enter bank name</span>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6 col-md-6">
                               <div class="form-group IFSC_group">
                                  <label for="">IFSC Code</label>
                                  <input type="text" name="billingentity_bank_ifc[]" value="" class="form-control bank_ifsc" placeholder="IFSC Code">
                                  <span class="temp-error display_none text-danger">Please enter IFSC code</span>
                               </div>
                            </div>
                            <div class="col-sm-6   col-md-6">
                               <div class="form-group account_group">
                                  <label for="">Account No.</label>
                                  <input type="text" name="billingentity_bank_accountno[]" value="" class="form-control bank_ano" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" placeholder="Account No.">
                                  <span class="temp-error display_none text-danger">Please enter account no.</span>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                               <div class="form-group accounttype_group">
                                  <label >Account Type</label>
                                  <select id="Type_Account" name="billingentity_bank_accounttype[]" class="form-control bank_account_type">
                                     <option value="">Select Account Type</option>
                                     <option value="Saving">Saving</option>
                                     <option value="Current">Current</option>
                                     <option value="Cash Credit">Cash Credit</option>
                                     <option value="Overdraft">Overdraft</option>
                                  </select>
                                  <span class="temp-error display_none text-danger">Please select account type</span>
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group UPI_group">
                                  <label for="">UPI ID</label>
                                  <input type="text" name="billingentity_bank_upi[]" class="form-control bank_upiId" placeholder="UPI ID">
                                  <span class="temp-error display_none text-danger">Please enter UPI id</span>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="Bank_details_Panel"></div>
                <div class=""  style="margin-bottom:15px;">
                   <div class="row">
                      <div class="col-md-12 text-center">
                         <span class="btn btn-primary" id="add_bank_deatils" onclick="create_add_more_bank()"><span class="material-icons-outlined" style="top:3px;font-size:16px;">add</span>Add More</span> 
                      </div>
                   </div>
                </div>
                <div class="panel panel-default" id="main_gst_deatils">
                   <div class="panel-body panel-body-form">
                      <div id="gst_deatils">
                         <div class="row">
                            <div class="col-md-12">
                               <div class="panel-heading" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;">
                                  <h4 class="panel-title">
                                     GST Details
                                  </h4>
                               </div>
                            </div>
                         </div>
                         <div class="GST_details_Panel">
                            <div class="GST_added_panel">
                               <div class="row">
                                  <div class="col-md-12">
                                     <button type="button" class="btn btn-danger GST_deleteBtn pull-right" onclick="delete_gst_panel(this)" style=""><span class="material-icons-outlined">close</span></button>
                                  </div>
                               </div>
                               <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                     <div class="form-group gst_no_group">
                                        <label for="" class="gst_bank_title">GST 1</label>
                                        <input type="text" name="billingentity_gst[]" class="form-control gst_deatils_GST_1" placeholder="GST No" onblur="getGST_state(this.value, 0);" onchange="create_gst(this)">
                                        <span class="temp-error display_none text-danger">Please enter GST no</span>
                                     </div>
                                  </div>
                                  <div class="col-sm-6   col-md-6">
                                     <div class="form-group gst_addr_group">
                                        <label >Address</label>
                                        <input type="text" name="billingEntityGSTAddressStreet[]" class="form-control gst_addr" placeholder="Street" maxlength="56">
                                        <span class="temp-error display_none text-danger">Please enter your address</span>
                                     </div>
                                     <div class="row">
                                        <div class="col-md-4" style="padding-right: 0px;">
                                           <div class="form-group gst_city_group">
                                              <input type="text" name="billingEntityGSTAddressCity[]" class="form-control gst_city" placeholder="City" >
                                              <span class="temp-error display_none text-danger">Please enter city</span>
                                           </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 0px;">
                                           <div class="form-group gst_state_group">
                                              <input type="text" class="form-control gst_state_edit" id="gst_state0" data-id="billingEntityGSTAddressState0" data-name="billingEntityGSTAddressState[]" name="billingEntityGSTAddressState[]" value="" placeholder="State" autocomplete="espo-state" maxlength="255">
                                              <span class="temp-error display_none text-danger">Please enter state</span>
                                           </div>
                                        </div>
                                        <div class="col-md-4">
                                           <div class="form-group gst_postal_group">
                                              <input type="text" name="billingEntityGSTAddressPostalCode[]" class="form-control GST_Details_postal_code gst_postal_code" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                              <span class="temp-error display_none text-danger">Please enter postal code</span>
                                              <span class="digit-temp-error display_none text-danger">Please enter 6 digits postal code</span>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <!-- <div class="GST_details_Panel"></div> -->
                         <div class="" style="margin-bottom: 20px !important;">
                            <div class="row">
                               <div class="col-md-12 text-center">
                                  <span class="btn btn-primary add_gst_deatils" id="gst_deatils_add" onclick="create_gst_add_more()" ><span class="material-icons-outlined" style="top:3px;font-size: 16px;">add</span>Add More</span> 
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="row" id="main_GSTIN_fields">
                   <div class="col-md-12">
                      <div id="GSTIN_fields" class="">
                         <span class="Gstin_Que">Do you have GST registration?</span>&nbsp;&nbsp;
                         <span class="form-check-inline">
                         <label class="form-check-label"><input type="radio" class="form-check-input" name="optradio" id="optradio_yes" value="Yes"> Yes</label>
                         </span>
                         <span class="form-check-inline">
                         <label class="form-check-label"><input type="radio" class="form-check-input" name="optradio" id="optradio_no" value="No" checked="checked"> No</label>
                         </span> 
                      </div>
                   </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<!-- Billing Entity -->


<!-- Invoice Modal -->
<div class="">
   <div class="modal fade" id="invoice" role="dialog" data-backdrop="static">
      <div class="modal-dialog modal-lg">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Create Invoice</h4>
            </div>
            <div class="modal-body" style="padding-top:0px;">
               <form id="createInvoiceForm" method="post" enctype='multipart/form-data'>
                  <div class="container" id="createInvoiceForm">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="">
                              <button type="submit" class="btn btn-primary" id="save_invoiceBTN">Save</button>
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
                        <div class="col-md-6">
                           <div class="form-group">
                              <label >Bill From<span class="text-danger">*</span></label>
                              <input type="text" value=""  name="billfromname" id="" class="form-control" placeholder="Name" required>
                           </div>
                           <div class="form-group">
                              <input type="text" value=""  name="billing_address_street" id="" class="form-control" placeholder="Street" maxlength="56"  required>
                           </div>
                           <div class="row">
                              <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                 <div class="form-group">
                                    <input type="text" value=""  name="billing_address_city" id="billing_address_city" class="form-control" placeholder="City" required>
                                 </div>
                              </div>
                              <div class="col-md-4" style="padding-right: 0px;">
                                 <div class="form-group">
                                    <select value="" name="billing_address_state"  id="billing_address_state_invoice" class="form-control" placeholder="State" required>
                                       <option value="">Select State</option>
                                       <option value="Andhra Pradesh">Andhra Pradesh</option>
                                       <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                       <option value="Assam">Assam</option>
                                       <option value="Bihar">Bihar</option>
                                       <option value="Chhattisgarh">Chhattisgarh</option>
                                       <option value="Goa">Goa</option>
                                       <option value="Gujarat">Gujarat</option>
                                       <option value="Haryana">Haryana</option>
                                       <option value="Himachal Pradesh">Himachal Pradesh</option>
                                       <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                       <option value="Jharkhand">Jharkhand</option>
                                       <option value="Karnataka">Karnataka</option>
                                       <option value="Kerala">Kerala</option>
                                       <option value="Madhya Pradesh">Madhya Pradesh</option>
                                       <option value="Maharashtra">Maharashtra</option>
                                       <option value="Manipur">Manipur</option>
                                       <option value="Meghalaya">Meghalaya</option>
                                       <option value="Mizoram">Mizoram</option>
                                       <option value="Nagaland">Nagaland</option>
                                       <option value="Odisha">Odisha</option>
                                       <option value="Punjab">Punjab</option>
                                       <option value="Rajasthan">Rajasthan</option>
                                       <option value="Sikkim">Sikkim</option>
                                       <option value="Tamil Nadu">Tamil Nadu</option>
                                       <option value="Tripura">Tripura</option>
                                       <option value="Uttarakhand">Uttarakhand</option>
                                       <option value="Uttar Pradesh">Uttar Pradesh</option>
                                       <option value="West Bengal">West Bengal</option>
                                       <option value="Andaman & Nicobar">Andaman & Nicobar</option>
                                       <option value="Chandigarh">Chandigarh</option>
                                       <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                       <option value="Daman and Diu">Daman and Diu</option>
                                       <option value="Delhi">Delhi</option>
                                       <option value="Lakshadweep">Lakshadweep</option>
                                       <option value="Pondicherry">Pondicherry</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <input type="text" value="" name="billing_address_postal_code" id="billing_address_postal_code1" class="form-control postal_code" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required  onchange="postal_code1()">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <input type="text" value="" name="billing_address_country" id="billing_address_country" class="form-control" placeholder="Country" required>
                           </div>
                           <div class="form-group">
                              <input type="text" value="" name="billingaddressgstin" class="form-control gstinnumber_invoice" id="gst_no_invoice" placeholder="GSTIN" >
                           </div>
                           <script>
                              $(document).on('blur',".gstinnumber_invoice", function(e){  
                              e.stopImmediatePropagation();  
                                var inputvalues = $(this).val();
                                var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
                              
                                if(inputvalues == ""){
                              
                                }
                              
                                else{
                                  if (gstinformat.test(inputvalues)) {
                                   
                                    return true;
                                  } else {
                              
                                    $.alert({
                                        title: 'Warning!',
                                        content: 'Please enter valid GSTIN number',
                                        type: 'dark',
                                        typeAnimated: true,
                                        draggable: false,
                                    });
                                    //$.alert('Please Enter Valid GSTIN Number');
                                    $(".gstinnumber_invoice").val('');
                                    $(".gstinnumber_invoice").focus();
                                  }
                                }
                              });
                           </script> 
                           <div class="form-group">
                      <input type="text" value="" name="billingaddresspanno_invoice" class="form-control billingaddresspanno_invoice" minlength="10"  maxlength="10" placeholder="PAN No" style="text-transform:uppercase" >
                    </div>
                    <script>
                      $(document).on('blur',".billingaddresspanno_invoice", function(e){  
                        e.stopImmediatePropagation();  
                        var inputvalues_invoice = $(this).val().toUpperCase();
                        var inputvalues_shippinginvoice = $('.shippingaddresspanno_invoice').val().toUpperCase();
                        var gstinformat_invoice = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');

                        if(inputvalues_invoice == ""){
                            return true;
                        }
                        else if (inputvalues_invoice == inputvalues_shippinginvoice) {
                            $.alert({
                                title: 'Warning!',
                                content: 'PAN Number should not be equal',
                                type: 'dark',
                                typeAnimated: true,
                                draggable: false,
                                buttons: {
                                    Ok: function() {
                                        $('.billingaddresspanno_invoice,.shippingaddresspanno_invoice').val("");
                                    }
                                }
                            });
                        }
                        else{
                          if (gstinformat_invoice.test(inputvalues_invoice)) {
                            return true;
                          } else {

                            $.alert({
                                title: 'Warning!',
                                content: 'Please enter valid PAN number',
                                type: 'dark',
                                typeAnimated: true,
                                draggable: false,
                            });
                                //$.alert('Please Enter Valid GSTIN Number');
                                $(".billingaddresspanno_invoice").val('');
                                $(".billingaddresspanno_invoice").focus();
                          }
                        }
                      });
                    </script> 
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label >Bill To<span class="text-danger">*</span></label>
                              <input type="text" value=""  name="billtoname" id="" class="form-control" placeholder="Name" required>
                           </div>
                           <div class="form-group">
                              <input type="text" value=""  name="shipping_address_street" id="" class="form-control" placeholder="Street" maxlength="56"  required>
                           </div>
                           <div class="row">
                              <div class="col-md-4" style="padding-right: 0px;">
                                 <div class="form-group">
                                    <input type="text" value=""  name="shipping_address_city" id="shipping_address_city" class="form-control" placeholder="City" required>
                                 </div>
                              </div>
                              <div class="col-md-4" style="padding-right: 0px;">
                                 <div class="form-group">
                                    <select  value=""  name="shipping_address_state" id="shipping_address_state" class="form-control" placeholder="State" required>
                                       <option value="">Select State</option>
                                       <option value="Andhra Pradesh">Andhra Pradesh</option>
                                       <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                       <option value="Assam">Assam</option>
                                       <option value="Bihar">Bihar</option>
                                       <option value="Chhattisgarh">Chhattisgarh</option>
                                       <option value="Goa">Goa</option>
                                       <option value="Gujarat">Gujarat</option>
                                       <option value="Haryana">Haryana</option>
                                       <option value="Himachal Pradesh">Himachal Pradesh</option>
                                       <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                       <option value="Jharkhand">Jharkhand</option>
                                       <option value="Karnataka">Karnataka</option>
                                       <option value="Kerala">Kerala</option>
                                       <option value="Madhya Pradesh">Madhya Pradesh</option>
                                       <option value="Maharashtra">Maharashtra</option>
                                       <option value="Manipur">Manipur</option>
                                       <option value="Meghalaya">Meghalaya</option>
                                       <option value="Mizoram">Mizoram</option>
                                       <option value="Nagaland">Nagaland</option>
                                       <option value="Odisha">Odisha</option>
                                       <option value="Punjab">Punjab</option>
                                       <option value="Rajasthan">Rajasthan</option>
                                       <option value="Sikkim">Sikkim</option>
                                       <option value="Tamil Nadu">Tamil Nadu</option>
                                       <option value="Tripura">Tripura</option>
                                       <option value="Uttarakhand">Uttarakhand</option>
                                       <option value="Uttar Pradesh">Uttar Pradesh</option>
                                       <option value="West Bengal">West Bengal</option>
                                       <option value="Andaman & Nicobar">Andaman & Nicobar</option>
                                       <option value="Chandigarh">Chandigarh</option>
                                       <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                       <option value="Daman and Diu">Daman and Diu</option>
                                       <option value="Delhi">Delhi</option>
                                       <option value="Lakshadweep">Lakshadweep</option>
                                       <option value="Pondicherry">Pondicherry</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <input type="text" value="" name="shipping_address_postal_code" id="shipping_address_postal_code1" class="form-control postal_code" minlength="6"  maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  placeholder="Postal Code" required onchange="shipping_postal_code1()">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <input type="text"  value="" name="shipping_address_country" id="shipping_address_country" class="form-control" placeholder="Country" required>
                           </div>
                           <div class="form-group">
                              <input type="text" value="" name="shippingaddressgstin" class="form-control shippingaddressgstin" placeholder="GSTIN" >
                           </div>
                           <script>
                              $(document).on('change',".shippingaddressgstin", function(e){
                              e.stopImmediatePropagation();    
                                var inputvalues = $(this).val();
                                var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
                                if(inputvalues == ""){
                              
                                }
                              
                                else{
                                if (gstinformat.test(inputvalues)) {
                                 return true;
                                } else {
                              
                              $.alert({
                                title: 'Warning!',
                                content: 'Please enter valid GSTIN number',
                                type: 'dark',
                                typeAnimated: true,
                                draggable: false,
                              });
                                    //$.alert('Please Enter Valid GSTIN Number');
                                    $(".shippingaddressgstin").val('');
                                    $(".shippingaddressgstin").focus();
                                }
                                }
                              });
                           </script> 
                           <div class="form-group">
                      <input type="text" value="" name="shippingaddresspanno_invoice" minlength="10"  maxlength="10" class="form-control shippingaddresspanno_invoice" placeholder="PAN No" style="text-transform:uppercase">
                   </div>
                   <script>
                $(document).on('blur',".shippingaddresspanno_invoice", function(e){  
                e.stopImmediatePropagation();  
                  var inputvalues_invoice = $(this).val().toUpperCase();
                  var inputvalues_shippinginvoice = $('.billingaddresspanno_invoice').val().toUpperCase();
                  var gstinformat_invoice = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');

                  if(inputvalues_invoice == ""){
                    
                    return true;
                  }
                  else if (inputvalues_invoice == inputvalues_shippinginvoice) {
                                $.alert({
                                    title: 'Warning!',
                                    content: 'PAN Number should not be equal',
                                    type: 'dark',
                                    typeAnimated: true,
                                    draggable: false,
                                    buttons: {
                                        Ok: function() {
                                            $('.billingaddresspanno_invoice,.shippingaddresspanno_invoice').val("");
                                        }
                                    }
                                });
                            }

                  else{

                    if (gstinformat_invoice.test(inputvalues_invoice)) {
                     
                   return true;
                  } else {

                  $.alert({
                      title: 'Warning!',
                      content: 'Please enter valid PAN number',
                      type: 'dark',
                      typeAnimated: true,
                      draggable: false,
                  });
                          //$.alert('Please Enter Valid GSTIN Number');
                          $(".shippingaddresspanno_invoice").val('');
                          $(".shippingaddresspanno_invoice").focus();
                      }


                  }

                  
                  
                  
              });
              </script> 
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Account<span class="text-danger">*</span></label>
                              <div class="input-group">
                                 <input type="text" id="invoice_account_id"  name="account_id" value="" class="form-control readonly" placeholder="Please Select Account" required>
                                 <span class="input-group-addon"  data-toggle="modal" data-target="#myinvoice"><i class="glyphicon glyphicon-arrow-up" required></i></span>
                              </div>
                           </div>
                        </div>
                        <script>
                           $(".readonly").on('keydown paste', function(e){
                                 e.preventDefault();
                              });
                        </script>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Invoice Date</label>
                              <div class="input-group date">
                                 <input type="text" id="date1" name="invoicedate" class="form-control invDate" placeholder="Select Date"  >
                                 <div class="input-group-addon" >
                                    <span class="glyphicon glyphicon-calendar"></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        {{!-- 
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Date</label>
                              <div class="input-group date" data-date-format="dd.mm.yyyy">
                                 <input value=""  type="text" id="date" name="date" class="form-control" placeholder="Select Date"  >
                                 <div class="input-group-addon" >
                                    <span class="glyphicon glyphicon-calendar"></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        --}}
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Order Date</label>
                              <div class="input-group date" data-date-format="dd.mm.yyyy">
                                 <input value=""  type="text" id="date3" name="orderdate" class="form-control" placeholder="Select Date"  >
                                 <div class="input-group-addon" >
                                    <span class="glyphicon glyphicon-calendar"></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Due Date</label>
                              <div class="input-group date" data-date-format="dd/mm/yyyy">
                                 <input value=""  type="text" id="date2" name="duedate" class="form-control" placeholder="Select Date"  >
                                 <div class="input-group-addon" >
                                    <span class="glyphicon glyphicon-calendar"></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Place of Supply</label>
                              <select name="placeofsupply" class="form-control" id="placeofsupply_invoice" >
                                 <option value="">Select State</option>
                                 <option value="Andhra Pradesh">Andhra Pradesh</option>
                                 <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                 <option value="Assam">Assam</option>
                                 <option value="Bihar">Bihar</option>
                                 <option value="Chhattisgarh">Chhattisgarh</option>
                                 <option value="Goa">Goa</option>
                                 <option value="Gujarat">Gujarat</option>
                                 <option value="Haryana">Haryana</option>
                                 <option value="Himachal Pradesh">Himachal Pradesh</option>
                                 <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                 <option value="Jharkhand">Jharkhand</option>
                                 <option value="Karnataka">Karnataka</option>
                                 <option value="Kerala">Kerala</option>
                                 <option value="Madhya Pradesh">Madhya Pradesh</option>
                                 <option value="Maharashtra">Maharashtra</option>
                                 <option value="Manipur">Manipur</option>
                                 <option value="Meghalaya">Meghalaya</option>
                                 <option value="Mizoram">Mizoram</option>
                                 <option value="Nagaland">Nagaland</option>
                                 <option value="Odisha">Odisha</option>
                                 <option value="Punjab">Punjab</option>
                                 <option value="Rajasthan">Rajasthan</option>
                                 <option value="Sikkim">Sikkim</option>
                                 <option value="Tamil Nadu">Tamil Nadu</option>
                                 <option value="Tripura">Tripura</option>
                                 <option value="Uttarakhand">Uttarakhand</option>
                                 <option value="Uttar Pradesh">Uttar Pradesh</option>
                                 <option value="West Bengal">West Bengal</option>
                                 <option value="Andaman & Nicobar">Andaman & Nicobar</option>
                                 <option value="Chandigarh">Chandigarh</option>
                                 <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                 <option value="Daman and Diu">Daman and Diu</option>
                                 <option value="Delhi">Delhi</option>
                                 <option value="Lakshadweep">Lakshadweep</option>
                                 <option value="Pondicherry">Pondicherry</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">GST</label>
                              <select id="g_s_t_invoice" name="g_s_t" class="form-control" onchange="getVal3()">
                                <option value="">Select GST</option>
                                 <option value="IGST">IGST</option>
                                 <option value="CGST/SGST">CGST/SGST</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Invoice Number<span class="text-danger">*</span></label>
                              <input type="text" value="" id="invoiceno12"  name="invoiceno" class="form-control" placeholder="" required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Buyer order Number</label>
                              <input type="text" value=""  name="buyerorderno" class="form-control" placeholder="" >
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label for="">Discount Type</label>
                              <select id="edit_discount_type_invoice" name="discount_type_invoice" class="form-control " >
                                 <option value="Select Discount Type">Select Discount Type</option>
                                 <option value="At item level">At item level</option>
                                 <option  value="At invoice level">At invoice level</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="container" id="addbankdetails1">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                              <h4>Bank Details</h4>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label for="">Beneficiary</label>
                              <input type="text" value=""  name="beneficiary" class="form-control" placeholder="">
                           </div>
                        </div>
                        <div class="col-sm-6   col-md-6">
                           <div class="form-group">
                              <label for="">Bank Name</label>
                              <input type="text" value=""  name="bankname" id="" class="form-control" placeholder="">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label for="">Branch</label>
                              <input type="text" value=""  name="branch" class="form-control" placeholder="">
                           </div>
                        </div>
                        <div class="col-sm-6   col-md-6">
                           <div class="form-group">
                              <label for="">Account No</label>
                              <input type="text" value=""  name="accountno" id="" class="form-control" placeholder="Please Select Account" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label for="">IFSC Code</label>
                              <input type="text" value=""  name="ifsc" class="form-control" placeholder="">
                           </div>
                        </div>
                        <div class="col-md-6" style="visibility:hidden;">
                           <div class="form-group">
                              <label for="">Amount</label>
                              <input type="text"  id="amount" name="amount[]" class="form-control" placeholder="">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="item1" id="additem_invoice">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                              <h4>Add Item</h4>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label for="">Item Name<span class="text-danger">*</span></label>
                              <input type="hidden" value="">
                              <input type="text" value=""  name="item_name[]" id="item_name" class="form-control" maxlength="40" placeholder="" required>
                           </div>
                        </div>
                        <div class=" col-sm-6 col-md-6">
                           <div class="form-group">
                              <label for="">Description</label>
                              <textarea  type="text" value=""  name="description[]" id="description" class="form-control" maxlength="180" placeholder=""></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label for="">HSN/SAC</label>
                              <input type="text" value=""  name="hsn[]" class="form-control" placeholder="">
                           </div>
                        </div>
                        <div class="col-sm-6   col-md-6">
                           <div class="form-group">
                              <label for="">Quantity<span class="text-danger">*</span></label>
                              <input type="text" value=""  name="quantity[]" id="quantity" class="form-control quantity" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label for="">Rate<span class="text-danger">*</span></label>
                              <input type="text" value=""  name="rate[]" id="rate" class="form-control rate" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Gst Rate</label>
                              <select name="gst_rate[]" id="gst_rate_invoice" class="form-control">
                                 <option value="">Select GST Rste</option>
                                 <option value="0">0</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="12">12</option>
                                 <option value="18">18</option>
                                 <option value="28">28</option>
                              </select>
                           </div>
                        </div>
                        <!-- <div class="col-md-6">
                           <div class="form-group">
                             <label for="">Amount</label>
                               <input type="text"  id="amount" name="amount[]" class="form-control" placeholder="">
                            </div>
                           </div>-->
                     </div>
                     <!-- <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Gst Rate</label>
                              <select name="gst_rate[]" id="gst_rate_invoice" class="form-control">
                                 <option value="0">0</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="12">12</option>
                                 <option value="18">18</option>
                                 <option value="28">28</option>
                              </select>
                           </div>
                        </div>
                     </div> -->
                     <!-- <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Total</label>
                              <input type="text"  name="total" id="total" class="form-control" placeholder="">
                           </div>
                        </div>
                        </div> -->
                     <div class="row"  id="discount_invoice" style="padding-bottom:5px;display: none;">
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label for="">Discount</label>
                              <div class="input-group">
                                 <input id="" type="text" class="form-control discount_invoice1" name="invoice_discount_amount_item[]" placeholder="">
                                 <span class="input-group-addon" style="padding: 0px;">
                                    <select style="padding: 5px 3px;border: none;" name="invoice_discount_option_item[]" id="option_create">
                                       <option>%</option>
                                       <option>Rs</option>
                                    </select>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class=" col-sm-6 col-md-6">
                        </div>
                     </div>
                  </div>
                  <div class="container" id="textboxDiv_invoice"></div>
                  <div class="container">
                     <div class="row">
                        <div class=" col-sm-6 col-md-6 col-lg-6">
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                           <div class="">
                              <div class="row">
                                 <div class=" col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                       <a class="btn btn-primary" id="calculate_invoice" >Calculate</a>
                                    </div>
                                 </div>
                                 <div class=" col-sm-9 col-md-9 col-lg-9">
                                    <div class="form-group" style="visibility:hidden;">
                                       <input  type="text" value=""  name="" id="" class="form-control" placeholder="" >
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class=" col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                       <label for="" style="margin-top:5px;">Subtotal:</label>
                                    </div>
                                 </div>
                                 <div class=" col-sm-9 col-md-9 col-lg-9">
                                    <div class="form-group">
                                       <input readonly type="text" value=""  name="subtotal" id="invoice_subtotal" class="form-control" placeholder="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row" id="IGST_INV" style=" display:none;">
                                 <div class=" col-sm-3 col-md-3">
                                    <div class="form-group">
                                       <label for="" style="margin-top:5px;">IGST :</label>
                                    </div>
                                 </div>
                                 <div class=" col-sm-9 col-md-9">
                                    <div class="form-group">
                                       <input readonly type="text" value=""  name="INV_IGST" id="INV_IGST" class="form-control" placeholder="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row" id="SGST_INV" style=" display:none;">
                                 <div class=" col-sm-3 col-md-3">
                                    <div class="form-group">
                                       <label for="" style="margin-top:5px;">SGST :</label>
                                    </div>
                                 </div>
                                 <div class=" col-sm-9 col-md-9">
                                    <div class="form-group">
                                       <input readonly type="text" value=""  name="SGST" id="INV_SGST" class="form-control" placeholder="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row" id="CGST_INV" style=" display:none;">
                                 <div class=" col-sm-3 col-md-3">
                                    <div class="form-group">
                                       <label for="" style="margin-top:5px;">CGST :</label>
                                    </div>
                                 </div>
                                 <div class=" col-sm-9 col-md-9">
                                    <div class="form-group">
                                       <input readonly type="text" value=""  name="CGST" id="INV_CGST" class="form-control" placeholder="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row" id="discount_invo" style="display: none;">
                                 <div class=" col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                       <label for="" style="margin-top:5px;" >Discount:</label>
                                    </div>
                                 </div>
                                 <div class=" col-sm-9 col-md-9 col-lg-9">
                                    <div class="form-group">
                                       <div class="input-group">
                                          <input id="discount_calculate_invoice" type="text" class="form-control discount_calculate_invoice1" name="invoice_discount_amount_invoice" placeholder="">
                                          <span class="input-group-addon" style="padding: 0px;">
                                             <select style="padding: 5px 3px;border: none;" name="invoice_discount_option_invoice" id="option_create1">
                                                <option>%</option>
                                                <option>Rs</option>
                                             </select>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class=" col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                       <label for="" style="margin-top:5px;">Adjustment:</label>
                                    </div>
                                 </div>
                                 <div class=" col-sm-9 col-md-9 col-lg-9">
                                    <div class="form-group">
                                       <input type="text" value=""  name="invoice_adjustment" id="adjustment_calculate_invoice" class="form-control" placeholder="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class=" col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                       <label for="" style="margin-top:5px;">Total:</label>
                                    </div>
                                 </div>
                                 <div class=" col-sm-9 col-md-9 col-lg-9">
                                    <div class="form-group">
                                       <input readonly type="text" value=""  name="invoice_total" id="invoice_total" class="form-control" placeholder="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <input class="" type="file" name="file[]" id="file" multiple>
                         </div>   
                      </div>
                    </div>
                  </div>
               </form>
               <div class="container">
                    <div class="row">
                      <div class="col-md-12" >

                          <button class="btn btn-success" id="Add_invoice">Add Item</button>             
                       </div>
                    </div>
                  </div>
               
            </div>
         </div>
      </div>
   </div>
   <!-- Modal -->
   <div class="modal fade" id="myinvoice" role="dialog">
      <div class="modal-dialog modal-lg">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Account</h4>
               <button type="button" id="invoice_create_account1"  class="btn btn-primary" data-toggle="modal" data-target="#invoice_create_account">Create Account</button>
            </div>
            <div class="modal-body">
               <table id="example_invoice" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th style="color:black" class="th-sm">Name
                        </th>
                        <th style="color:black" class="th-sm">Country
                        </th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Invoice Modal -->

<!-- Estimate Modal -->
<div class="container">
   <!-- Modal -->
   <div class="modal fade" id="estimate" role="dialog" data-backdrop="static">
      <div class="modal-dialog modal-lg">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Create Estimate</h4>
            </div>
            <div class="modal-body" style="padding-top:0px;">
               <form id="createEstimateForm" method="post" enctype='multipart/form-data'>
                  <div class="">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="">
                              <button type="submit" class="btn btn-primary save_estimateBTN" id="save_estimateBTN">Save</button>
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
                        <div class="col-md-6">
                           <div class="form-group">
                              <label >Bill From<span class="text-danger">*</span></label>
                              <input type="text"  name="billfromname" id="" class="form-control" placeholder="Name" required>
                           </div>
                           <div class="form-group">
                              <input type="text"  name="billing_address_street" id="" class="form-control" placeholder="Street" required maxlength="56">
                           </div>
                           <div class="row">
                              <div class="col-md-4" style="padding-right: 0px;">
                                 <div class="form-group">
                                    <input type="text"  name="billing_address_city" id="billing_address_city" class="form-control" placeholder="City" required>
                                 </div>
                              </div>
                              <div class="col-md-4" style="padding-right: 0px;">
                                 <div class="form-group">
                                    <select name="billing_address_state" id="billing_address_state_estimate" class="form-control" placeholder="State" required>
                                       <option value="">State</option>
                                       <option value="Andhra Pradesh">Andhra Pradesh</option>
                                       <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                       <option value="Assam">Assam</option>
                                       <option value="Bihar">Bihar</option>
                                       <option value="Chhattisgarh">Chhattisgarh</option>
                                       <option value="Goa">Goa</option>
                                       <option value="Gujarat">Gujarat</option>
                                       <option value="Haryana">Haryana</option>
                                       <option value="Himachal Pradesh">Himachal Pradesh</option>
                                       <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                       <option value="Jharkhand">Jharkhand</option>
                                       <option value="Karnataka">Karnataka</option>
                                       <option value="Kerala">Kerala</option>
                                       <option value="Madhya Pradesh">Madhya Pradesh</option>
                                       <option value="Maharashtra">Maharashtra</option>
                                       <option value="Manipur">Manipur</option>
                                       <option value="Meghalaya">Meghalaya</option>
                                       <option value="Mizoram">Mizoram</option>
                                       <option value="Nagaland">Nagaland</option>
                                       <option value="Odisha">Odisha</option>
                                       <option value="Punjab">Punjab</option>
                                       <option value="Rajasthan">Rajasthan</option>
                                       <option value="Sikkim">Sikkim</option>
                                       <option value="Tamil Nadu">Tamil Nadu</option>
                                       <option value="Tripura">Tripura</option>
                                       <option value="Uttarakhand">Uttarakhand</option>
                                       <option value="Uttar Pradesh">Uttar Pradesh</option>
                                       <option value="West Bengal">West Bengal</option>
                                       <option value="Andaman & Nicobar">Andaman & Nicobar</option>
                                       <option value="Chandigarh">Chandigarh</option>
                                       <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                       <option value="Daman and Diu">Daman and Diu</option>
                                       <option value="Delhi">Delhi</option>
                                       <option value="Lakshadweep">Lakshadweep</option>
                                       <option value="Pondicherry">Pondicherry</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <input type="text"  name="billing_address_postal_code" id="billing_address_postal_code" class="form-control postal_code" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required onchange="postal_code()">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <input type="text"  name="billing_address_country" id="billing_address_country" class="form-control" placeholder="Country" required>
                           </div>
                           <div class="form-group">
                              <input type="text"  name="billingaddressgstin" class="form-control gstinnumber" id="gst_no_estimate" placeholder="GSTIN" >
                           </div>

                           <script>
                              $(document).on('blur',".gstinnumber", function(e){
                              e.stopImmediatePropagation();    
                                var inputvalues = $(this).val();
                                //alert(inputvalues);
                                var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
                              
                                if(inputvalues == ""){
                                 
                              
                                }
                              
                                else{
                              
                                if (gstinformat.test(inputvalues)) {
                                  
                                 return true;
                                } else {
                              
                              $.alert({
                                title: 'Warning!',
                                content: 'Please enter valid GSTIN number',
                                type: 'dark',
                                typeAnimated: true,
                                draggable: false,
                              });
                                    //$.alert('Please Enter Valid GSTIN Number');
                                    $(".gstinnumber").val('');
                                    $(".gstinnumber").focus();
                                }
                              
                                }
                               
                                
                              });
                           </script> 
                           <div class="form-group">
                              <input type="text"  name="billingaddresspanno" class="form-control pannumber" id="pan_no_estimate" minlength="10"  maxlength="10" placeholder="PAN No" style="text-transform:uppercase">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label >Bill To<span class="text-danger">*</span></label>
                              <input type="text"  name="billtoname" id="" class="form-control" placeholder="Name" required>
                           </div>
                           <div class="form-group">
                              <input type="text"  name="shipping_address_street" id="" class="form-control" placeholder="Street" maxlength="56"  required>
                           </div>
                           <div class="row">
                              <div class="col-md-4" style="padding-right: 0px;">
                                 <div class="form-group">
                                    <input type="text"  name="shipping_address_city" id="shipping_address_city" class="form-control" placeholder="City" required>
                                 </div>
                              </div>
                              <div class="col-md-4" style="padding-right: 0px;">
                                 <div class="form-group">
                                    <select name="shipping_address_state" id="shipping_address_state" class="form-control" placeholder="State" required>
                                       <option value="">State</option>
                                       <option value="Andhra Pradesh">Andhra Pradesh</option>
                                       <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                       <option value="Assam">Assam</option>
                                       <option value="Bihar">Bihar</option>
                                       <option value="Chhattisgarh">Chhattisgarh</option>
                                       <option value="Goa">Goa</option>
                                       <option value="Gujarat">Gujarat</option>
                                       <option value="Haryana">Haryana</option>
                                       <option value="Himachal Pradesh">Himachal Pradesh</option>
                                       <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                       <option value="Jharkhand">Jharkhand</option>
                                       <option value="Karnataka">Karnataka</option>
                                       <option value="Kerala">Kerala</option>
                                       <option value="Madhya Pradesh">Madhya Pradesh</option>
                                       <option value="Maharashtra">Maharashtra</option>
                                       <option value="Manipur">Manipur</option>
                                       <option value="Meghalaya">Meghalaya</option>
                                       <option value="Mizoram">Mizoram</option>
                                       <option value="Nagaland">Nagaland</option>
                                       <option value="Odisha">Odisha</option>
                                       <option value="Punjab">Punjab</option>
                                       <option value="Rajasthan">Rajasthan</option>
                                       <option value="Sikkim">Sikkim</option>
                                       <option value="Tamil Nadu">Tamil Nadu</option>
                                       <option value="Tripura">Tripura</option>
                                       <option value="Uttarakhand">Uttarakhand</option>
                                       <option value="Uttar Pradesh">Uttar Pradesh</option>
                                       <option value="West Bengal">West Bengal</option>
                                       <option value="Andaman & Nicobar">Andaman & Nicobar</option>
                                       <option value="Chandigarh">Chandigarh</option>
                                       <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                       <option value="Daman and Diu">Daman and Diu</option>
                                       <option value="Delhi">Delhi</option>
                                       <option value="Lakshadweep">Lakshadweep</option>
                                       <option value="Pondicherry">Pondicherry</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <input type="text"  name="shipping_address_postal_code" id="shipping_address_postal_code" class="form-control postal_code" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required onchange="shipping_postal_code()">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <input type="text"   name="shipping_address_country" id="shipping_address_country" class="form-control" placeholder="Country" required>
                           </div>
                           <div class="form-group">
                              <input type="text"  name="shippingaddressgstin" class="form-control shippinggstinnumber" placeholder="GSTIN" >
                           </div>
                           <script>
                              $(document).on('blur',".shippinggstinnumber", function(e){
                              e.stopImmediatePropagation();    
                                var inputvalues = $(this).val();
                                var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
                                  if(inputvalues == ""){
                                  
                              
                                }
                              
                                else{
                                
                                if (gstinformat.test(inputvalues)) {
                                 return true;
                                } else {
                              
                              $.alert({
                                title: 'Warning!',
                                content: 'Please enter valid GSTIN number',
                                type: 'dark',
                                typeAnimated: true,
                                draggable: false,
                              });
                                    //$.alert('Please Enter Valid GSTIN Number');
                                    $(".shippinggstinnumber").val('');
                                    $(".shippinggstinnumber").focus();
                                }
                                }
                              });
                           </script>
                           <div class="form-group">
                            <input type="text"  name="shippingaddresspanno" class="form-control shippingpannumber" minlength="10"  maxlength="10" placeholder="PAN No" style="text-transform:uppercase" >
                         </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Account<span class="text-danger">*</span></label>
                              <div class="input-group">
                                 <input type="text" id="estimate_account_id"  name="account_id" class="form-control readonly" placeholder="Please Select Account" required>
                                 <span class="input-group-addon"  data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-arrow-up"></i></span>
                              </div>
                           </div>
                        </div>
                        <script>
                           $(".readonly").on('keydown paste', function(e){
                                 e.preventDefault();
                              });
                        </script>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Estimate Date</label>
                              <div class="input-group date" data-date-format="dd.mm.yyyy">
                                 <input  type="text" id="date" name="date" class="form-control" placeholder="Select Date"  required>
                                 <div class="input-group-addon" >
                                    <span class="glyphicon glyphicon-calendar"></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Estimate Number<span class="text-danger">*</span></label>
                              <input type="text" id="estimate_no" name="invoice_number" class="form-control" placeholder="" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Status</label>
                              <select name="status" class="form-control" >
                                 <option value="Pending">Pending</option>
                                 <option value="Accepted">Accepted</option>
                                 <option value="Declined">Declined</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Place of Supply</label>
                              <select name="placeofsupply" class="form-control" id="placeofsupply_estimate">
                                 <option value="">Select State</option>
                                 <option value="Andhra Pradesh">Andhra Pradesh</option>
                                 <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                 <option value="Assam">Assam</option>
                                 <option value="Bihar">Bihar</option>
                                 <option value="Chhattisgarh">Chhattisgarh</option>
                                 <option value="Goa">Goa</option>
                                 <option value="Gujarat">Gujarat</option>
                                 <option value="Haryana">Haryana</option>
                                 <option value="Himachal Pradesh">Himachal Pradesh</option>
                                 <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                 <option value="Jharkhand">Jharkhand</option>
                                 <option value="Karnataka">Karnataka</option>
                                 <option value="Kerala">Kerala</option>
                                 <option value="Madhya Pradesh">Madhya Pradesh</option>
                                 <option value="Maharashtra">Maharashtra</option>
                                 <option value="Manipur">Manipur</option>
                                 <option value="Meghalaya">Meghalaya</option>
                                 <option value="Mizoram">Mizoram</option>
                                 <option value="Nagaland">Nagaland</option>
                                 <option value="Odisha">Odisha</option>
                                 <option value="Punjab">Punjab</option>
                                 <option value="Rajasthan">Rajasthan</option>
                                 <option value="Sikkim">Sikkim</option>
                                 <option value="Tamil Nadu">Tamil Nadu</option>
                                 <option value="Tripura">Tripura</option>
                                 <option value="Uttarakhand">Uttarakhand</option>
                                 <option value="Uttar Pradesh">Uttar Pradesh</option>
                                 <option value="West Bengal">West Bengal</option>
                                 <option value="Andaman & Nicobar">Andaman & Nicobar</option>
                                 <option value="Chandigarh">Chandigarh</option>
                                 <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                 <option value="Daman and Diu">Daman and Diu</option>
                                 <option value="Delhi">Delhi</option>
                                 <option value="Lakshadweep">Lakshadweep</option>
                                 <option value="Pondicherry">Pondicherry</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">GST</label>
                              <select id="g_s_t_estimate" name="g_s_t" class="form-control" onchange="checkVal()" >
                                 <option value="">Select GST</option>
                                 <option value="IGST">IGST</option>
                                 <option value="CGST/SGST">CGST/SGST</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 col-md-6 ">
                        </div>
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label for="">Discount Type</label>
                              <select id="edit_discount_type" name="discount_type" class="form-control estimate_discount_type" >
                                 <option value="Select Discount Type">Select Discount Type</option>
                                 <option value="At item level">At item level</option>
                                 <option  value="At invoice level">At invoice level</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="item" id="additem">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                              <h4>Add Item</h4>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Item Name<span class="text-danger">*</span></label>
                              <input type="text"  name="item_name[]" id="item_name" class="form-control" placeholder="" maxlength="40" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Description</label>
                              <textarea  type="text"  name="description[]" id="description" class="form-control" placeholder="" maxlength="180"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">HSN/SAC</label>
                              <input type="text"  name="hsn[]" class="form-control" placeholder="">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Quantity<span class="text-danger">*</span></label>
                              <input type="text"  name="quantity[]" id="quantity" class="form-control estimate_quantity" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="" required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Rate<span class="text-danger">*</span></label>
                              <input type="text"  name="rate[]" id="rate" class="form-control estimate_rate" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                           </div>
                        </div>
                        <!-- <div class="col-md-6">
                           <div class="form-group">
                             <label for="">Amount</label>
                               <input type="text"  id="amount" name="amount[]" class="form-control" placeholder="">
                            </div>
                           </div>-->
                           <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Gst Rate</label>
                              <select name="gst_rate[]" id="gst_rate" class="form-control"  >
                                 <option value="">Select GST Rate</option>
                                 <option value="0">0</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="12">12</option>
                                 <option value="18">18</option>
                                 <option value="28">28</option>
                              </select>
                           </div>
                        </div>
                     </div>
<!--                      <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Gst Rate</label>
                              <select name="gst_rate[]" id="gst_rate" class="form-control"  >
                                 <option value="0">0</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="12">12</option>
                                 <option value="18">18</option>
                                 <option value="28">28</option>
                              </select>
                           </div>
                        </div>
                     </div> -->
                     <!-- <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Total</label>
                              <input type="text"  name="total" id="total" class="form-control" placeholder="">
                           </div>
                        </div>
                        </div> -->
                     <div class="row" id="discount_estimate" style="padding-bottom:5px;display: none;">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Discount</label>
                              <div class="input-group">
                                 <input id="" type="text" class="form-control edit_dynamic_discount1" name="estimate_discount_amount_item[]" placeholder="">
                                 <span class="input-group-addon" style="padding: 0px;">
                                    <select name="estimate_discount_option_item[]" style="padding: 5px 3px;border: none;" id="option_esti">
                                       <option>%</option>
                                       <option>Rs</option>
                                    </select>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                     </div>
                  </div>
                  <div id="textboxDiv"></div>
                  <div class="row">
                     <div class="col-sm-6 col-md-6">
                     </div>
                     <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                           <label for=""></label>
                           <div class="row">
                              <div class=" col-sm-3 col-md-3">
                                 <div class="form-group">
                                    <a class="btn btn-primary" id="calculate_estimate" >Calculate</a>
                                 </div>
                              </div>
                              <div class=" col-sm-9 col-md-9">
                                 <div class="form-group" style="visibility:hidden;">
                                    <input  type="text" value=""  name="" id="" class="form-control" placeholder="" >
                                 </div>
                              </div>
                           </div>
                           <div class="row" style="">
                              <div class=" col-sm-3 col-md-3">
                                 <div class="form-group">
                                    <label for="" style="margin-top:5px;">Subtotal:</label>
                                 </div>
                              </div>
                              <div class=" col-sm-9 col-md-9">
                                 <div class="form-group">
                                    <input readonly type="text" value=""  name="subtotal" id="subtotal" class="form-control" placeholder="">
                                 </div>
                              </div>
                           </div>
                           <div class="row" id="IGST_EST" style="display:none;">
                              <div class=" col-sm-3 col-md-3">
                                 <div class="form-group">
                                    <label for="" style="margin-top:5px;">IGST :</label>
                                 </div>
                              </div>
                              <div class=" col-sm-9 col-md-9">
                                 <div class="form-group">
                                    <input readonly type="text" value=""  name="IGST" id="IGST" class="form-control" placeholder="">
                                 </div>
                              </div>
                           </div>
                           <div class="row" id="SGST_EST" style="display:none;">
                              <div class=" col-sm-3 col-md-3">
                                 <div class="form-group">
                                    <label for="" style="margin-top:5px;">SGST :</label>
                                 </div>
                              </div>
                              <div class=" col-sm-9 col-md-9">
                                 <div class="form-group">
                                    <input readonly type="text" value=""  name="SGST" id="SGST" class="form-control" placeholder="">
                                 </div>
                              </div>
                           </div>
                           <div class="row" id="CGST_EST" style=" display:none;">
                              <div class=" col-sm-3 col-md-3">
                                 <div class="form-group">
                                    <label for="" style="margin-top:5px;">CGST :</label>
                                 </div>
                              </div>
                              <div class=" col-sm-9 col-md-9">
                                 <div class="form-group">
                                    <input readonly type="text" value=""  name="CGST" id="CGST" class="form-control" placeholder="">
                                 </div>
                              </div>
                           </div>
                           <div class="row" id="discount_esti" style="display: none;">
                              <div class=" col-sm-3 col-md-3">
                                 <div class="form-group">
                                    <label for="" style="margin-top:5px;" >Discount:</label>
                                 </div>
                              </div>
                              <div class=" col-sm-9 col-md-9">
                                 <div class="form-group">
                                    <div class="input-group">
                                       <input id="discount_calculate_estimate" type="text" class="form-control discount_calculate_estimate1" name="estimate_discount_amount_invoice" placeholder="">
                                       <span class="input-group-addon" style="padding: 0px;">
                                          <select style="padding: 5px 3px;border: none;" name="estimate_discount_option_invoice" id="option_esti1">
                                             <option>%</option>
                                             <option>Rs</option>
                                          </select>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class=" col-sm-3 col-md-3">
                                 <div class="form-group">
                                    <label for="" style="margin-top:5px;">Adjustment:</label>
                                 </div>
                              </div>
                              <div class=" col-sm-9 col-md-9">
                                 <div class="form-group">
                                    <input type="text" value=""  name="adjustment" id="adjustmemt_calculate_estimate" class="form-control" placeholder="">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class=" col-sm-3 col-md-3">
                                 <div class="form-group">
                                    <label for="" style="margin-top:5px;">Total:</label>
                                 </div>
                              </div>
                              <div class=" col-sm-9 col-md-9">
                                 <div class="form-group">
                                    <input readonly type="text" value=""  name="total" id="total" class="form-control" placeholder="">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="file" name="file[]" id="file" multiple>
                        </div>
                      </div>
                    </div>
                   </div>       
               </form>
               <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <!-- <div class="form-group"> -->
                          <button class="btn btn-success" id="Add" >Add Item</button> 
                        <!-- </div> -->
                      </div>
                    </div>
                   </div>       
            </div>
         </div>
      </div>
   </div>
   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Account </h4>
               <button type="button" id="estimate_create_account1"  class="btn btn-primary" data-toggle="modal" data-target="#estimate_create_account">Create Account</button>
            </div>
            <div class="modal-body">
               <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th style="color:black" class="th-sm">Name
                        </th>
                        <th style="color:black" class="th-sm">Country
                        </th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </div>
   <script>
      function checkVal(){
          var val= $("#g_s_t_estimate").val();      
         // alert(val);
          if(val=="IGST"){
            //alert("IGST");
            $("#SGST_EST").css("display", "none");
            $("#CGST_EST").css("display", "none");
            $("#IGST_EST").css("display", "block");
          }if(val=="CGST/SGST"){
            //alert("CGST/SGST");
            $("#CGST_EST").css("display", "block");
            $("#SGST_EST").css("display", "block");
            $("#IGST_EST").css("display", "none");
          }
      }
   </script>
   <!-- Modal -->
   <div class="modal fade" id="estimate1" role="dialog">
      <div class="modal-dialog modal-lg" style="width:1045px;">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button id="update_data" type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Create Payment Histroy</h4>
            </div>
            <div class="modal-body" style="padding-top:0px;">
               <form action="client/res/templates/save_payment.php" method="post" onsubmit="return checkChanges(event)">
                  <div class="">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="">
                              <button type="submit" class="btn btn-primary">Save</button>
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
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label>Account <span class="text-danger">*</span></label>
                              <div class="input-group">
                                 <input type="text"  id="payment_account_id" name="account_name" class="form-control readonly" placeholder="Please Select Account" required>
                                 <span class="input-group-addon"  data-toggle="modal" data-target="#paymentModal"><i class="glyphicon glyphicon-arrow-up"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label >Payment type <span class="text-danger">*</span></label>
                              <select id="payment_type" name="payment_type" class="form-control" disabled required>
                                 {{!--
                                 <option value="Select Payment Type">Select Payment Type</option>
                                 --}}
                                 <option value="Against Invoice">Against Invoice</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 col-md-6" id="payment_date_div" style="display:none">
                           <div class="form-group">
                              <label for="">Date of Payment <span class="text-danger">*</span></label>
                              <div  id="datepicker2" class="input-group date" data-date-format="mm-dd-yyyy">
                                 <input type="text"  name="payment_date" class="form-control" placeholder="" required>
                                 <span class="input-group-addon"><i class="material-icons-outlined" style="font-size:16px !important;">date_range</i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-6" id="invoiceno_div" style="visibility:hidden">
                           <div class="form-group">
                              <label >Invoice Number</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6" id="billed_amount_div" style="display:none">
                           <div class="form-group">
                              <label >Amount</label>
                              <input type="text" id="billed_amount" name="billed_amount" class="form-control" placeholder="" readonly>
                           </div>
                        </div>
                        <div class="col-md-6" id="tds_div" style="visibility:hidden">
                           <div class="form-group">
                              <label >TDS Deducted</label>
                           </div>
                        </div>
                     </div>
                     <!-- <div class="row">
                        <div class="col-md-6" id="net_amount_div" style="display:none">
                          <div class="form-group">
                            <label >Net Amount Received</label>
                              <input type="text" id="net_amount"  name="net_amount" class="form-control" placeholder="">
                           </div>
                        </div>
                        
                        </div>    -->
                     <div class="row">
                        <div class="col-md-6" id="mode_div" style="display:none">
                           <div class="form-group">
                              <label>Mode <span class="text-danger">*</span></label>
                              <select name="mode" id="mode" class="form-control" required>
                                 <option value="Cheque">Cheque</option>
                                 <option value="Cash">Cash</option>
                                 <option value="RTGS/NEFT/IMPS">RTGS/NEFT/IMPS</option>
                                 <option value="Online">Online</option>
                                 <option value="Others">Others</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6" id="transaction_id_div" style="display:none">
                           <div class="form-group">
                              <label>Reference Id</label>
                              <input type="text" id="transaction_id" name="transaction_id" class="form-control" placeholder="">
                           </div>
                        </div>
                     </div>
                     <div class="row" id="payment_table" style="display:none;">
                        <div class="col-md-12">
                           <div class="form-group">
                              <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <th style="color:#0f243f;">Invoice No</th>
                                          <th style="color:#0f243f;">Invoice Date</th>
                                          <th style="color:#0f243f;">Invoice Amount</th>
                                          <th style="color:#0f243f;">Due Amount</th>
                                          <th style="color:#0f243f;">TDS</th>
                                          <th style="color:#0f243f;">Net Amount</th>
                                          <th style="color:#0f243f;">Mode</th>
                                          <th style="color:#0f243f;">Ref ID</th>
                                       </tr>
                                    </thead>
                                    <div style="display: none;" class="alert alert-danger" id="error">
                                    </div>
                                    <tbody id="payment_data"></tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
               <button class="btn btn-success" id="" style="visibility: hidden;margin-bottom: 20px;">Add Item</button> 
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Estimate Modal -->

<!-- Create Account For Estimate Modal -->
  <div class="modal fade" id="estimate_create_account" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Account</h4>
        </div>
        <div class="modal-body" style="padding-top:0px;">
          <div class="">
              <div class="row">
                <div class="col-md-12">
                  <div class="">
                    <button type="submit" id="estimate_account_save" class="btn btn-primary">save</button>
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
                    <label for="">Name<span class="text-danger">*</span></label>
                      <input type="text"  name="estimate_account_name" id="estimate_account_name" class="form-control" placeholder="" required>
                  
                   </div>
                   </div>
                   <div class="col-sm-6 col-md-6" >
                  <div class="form-group">
                    <label for="">Email</label>
                      
                      <input type="email" name="estimate_account_email" id="estimate_account_email" class="form-control" placeholder="" >
                    
                   </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6 col-md-6" >
                  <div class="form-group">
                    <label for="">Mobile Number</label>
                      <input type="text"  name="estimate_account_no" id="estimate_account_no" class="form-control"  minlength="10"  maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="" >
                  
                   </div>
                   </div>
                   </div>

          <button class="btn btn-success" id="" style="visibility: hidden;margin-bottom: 20px;">Add Item</button> 
        </div>
        
      </div>
      
    </div>
  </div>
</div>
<!-- Create Account For Estimate Modal -->


<script type="text/javascript">
  var first = window.location.pathname;
   // alert(first);
  first.indexOf(2);
  first.toLowerCase();
  first = first.split("/")[1]; 
  // alert(first);
  if(first=='portal')
  {
    var href = $("#create").attr('href');

    if(href=='#Estimate/create')
    {
          $("#create").css('display','none');  

         $("#create_estimate").css('display','none');
    }
    if(href=="#BillingEntity/create"){
        $("#create").css('display','none');  
        $("#create_billing_entity").css('display','none');
    }
    if(href=="#Invoice/create"){
        $("#create").css('display','none');  
        $("#create_invoice").css('display','none');
    }
  }
  else
  {
    // alert("in else");
     var href = $("#create").attr('href');
     // alert(href);
     if(href=='#Estimate/create')
    {
        // alert("in if of else");
          $("#create").css('display','none');  

         $("#create_estimate").css('display','block');
         //$("#estimateForm #Address_Details .BillingFromCard").removeAttr('style');
         //$("#estimateForm #Address_Details .BillingToCard").removeAttr('style');
    } 

    if(href=="#BillingEntity/create"){
      
      $("#create").css('display','none');  
      $("#create_billing_entity").css('display','block');
    } 

    if(href=="#Invoice/create"){
      
      $("#create").css('display','none');  
      $("#create_invoice").css('display','block');
    } 

    if(href=="#Payments/create"){
      
      $("#create").css('display','none');  
      $("#create_payment").css('display','block');

    }

    if(href=='#EmailReminder/create'){
      $("#create").css('display','none');
      $("#create_email").css('display', 'block');
    }else{
      $("#create_email").css('display', 'none'); 
    }

    if(href=='#SMSReminder/create'){
      $("#create").css('display','none');
      $("#create_sms").css('display', 'block');
    }else{
       $("#create_sms").css('display', 'none');
    }

  }   
</script>

<script>  
      var count1=0;
        $(document).ready(function() {  
            $("#Add_invoice").on("click", function() { 

              var inputvalues = $('.gstinnumber_invoice').val();
               var item_dynamic_invoice = $('#edit_discount_type_invoice').val();

                $("#textboxDiv_invoice").append('<div class="item1" id="'+count1+'"><div style="margin-top:10px;margin-bottom:5px;"><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Item Name<span class="text-danger">*</span></label><input type="text"  name="item_name[]" class="form-control" placeholder="" maxlength="40" required></div></div><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Description</label><textarea  type="text"  name="description[]" class="form-control" placeholder="" maxlength="180"></textarea></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">HSN/SAC</label><input type="text"  name="hsn[]" class="form-control" placeholder=""></div></div><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Quantity<span class="text-danger">*</span></label><input type="text"  name="quantity[]" class="form-control quantity" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></div></div></div><div class="row" style="padding-bottom:5px;"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Rate<span class="text-danger">*</span></label><input type="text"  name="rate[]" class="form-control rate" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></div></div><div class="col-sm-6  col-md-6"><div class="form-group"><label for="">Gst Rate</label><select class="form-control gst_dynamic_invoice" name="gst_rate[]" id="gst_rate_dynamic_invoice'+count1+'" ><option value="">Select GST Rate</option><option>0</option><option>1</option><option>2</option><option>3</option><option>5</option><option>6</option><option>12</option><option>18</option><option>28</option></select></div></div></div></div><div class="row edit_dynamic_discount_invoice" id="edit_dynamic_discount_invoice'+count1+'"  style="padding-bottom:5px;"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Discount</label><div class="input-group"><input id="discount_invoice1" type="text" class="form-control discount_invoice1" name="invoice_discount_amount_item[]" placeholder=""><span class="input-group-addon" style="padding: 0px;"><select name="invoice_discount_option_item[]" id="option_create" style="padding: 5px 3px;border: none;"><option>%</option><option>Rs</option></select></span></div></div></div><div class=" col-sm-6 col-md-6"></div></div><button class="btn btn-primary btnUpdate1" data-update-id1="'+count1+'" id="remove_field1'+count1+'" style="margin-bottom:10px;">Remove Item</button> </div>')

                if(inputvalues == ""){
                   
                  }
              else{
                
              }

                if(item_dynamic_invoice =='At item level'){
              $('#edit_dynamic_discount_invoice'+count1).css('display','inline-block');
               $("#discount_invo").css('display','none');
            }
            else if(item_dynamic_invoice == 'At invoice level'){
               $('#edit_dynamic_discount_invoice'+count1).css('display','none');
               $("#discount_invo").css('display','inline-block');
            }
            else if(item_dynamic_invoice == 'Select Discount Type'){
               $('#edit_dynamic_discount_invoice'+count1).css('display','none');
                $("#discount_invo").css('display','none');
            }


                count1++;
            });  

            var no=0;
            $(document).on("click",".btnUpdate1",function(e)
            {
              e.stopImmediatePropagation();
            if(no==2){
              var id1 =$(this).data("update-id1");

              $.confirm({
                title: 'Warning',
                content: 'Do you want to remove item?',
                type: 'dark',
                typeAnimated: true,
                draggable: false,
                buttons: {
                    Ok: function () {
                        $("#"+id1).closest("div").remove();

                    },
                     Cancel: function () {
                      

                    }
                }
            });
              no=0;
            }no++;
            });
        });  
    </script> 
     <script>  

      var count=0;
        $(document).ready(function() {  
            $("#Add").on("click", function() { 

                var inputvalues = $('.gstinnumber').val();
                var item_dynamic = $('#edit_discount_type').val();

                $("#textboxDiv").append('<div class="item" id="'+count+'"><div class="row"><div class="col-md-6">         <div class="form-group"><label for="">Item Name<span class="text-danger">*</span></label><input type="text"  name="item_name[]" class="form-control" placeholder="" maxlength="40" required></div></div>      <div class="col-md-6">         <div class="form-group"><label for="">Description</label><textarea  type="text"  name="description[]" class="form-control" placeholder="" maxlength="180"></textarea></div>      </div>   </div>   <div class="row">      <div class="col-md-6">         <div class="form-group"><label for="">HSN/SAC</label><input type="text"  name="hsn[]" class="form-control" placeholder=""></div>      </div>      <div class="col-md-6">         <div class="form-group"><label for="">Quantity<span class="text-danger">*</span></label><input type="text"  name="quantity[]" required class="form-control estimate_quantity" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder=""></div>      </div>   </div>   <div class="row">      <div class="col-md-6">         <div class="form-group"><label for="">Rate<span class="text-danger">*</span></label><input type="text"  name="rate[]" class="form-control estimate_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="" required></div>      </div>      <div class="col-md-6">         <div class="form-group">            <label for="">Gst Rate</label>            <select class="form-control gst_rate_estimate" name="gst_rate[]" id="gst_rate_dynamic'+count+'"><option value="">Select GST Rate</option> <option>0</option>               <option>1</option>               <option>2</option>               <option>3</option>               <option>5</option>               <option>6</option>               <option>12</option>               <option>18</option>               <option>28</option>            </select>         </div>      </div>   </div>   <div class="row edit_dynamic_discount" id="edit_dynamic_discount'+count+'"  style="padding-bottom:5px;">      <div class="col-sm-6 col-md-6">         <div class="form-group">            <label for="">Discount</label><div class="input-group">               <input id="" type="text" class="form-control edit_dynamic_discount1" name="estimate_discount_amount_item[]" placeholder=""><span class="input-group-addon" style="padding: 0px;"><select name="estimate_discount_option_item[]" style="padding: 5px 3px;border: none;" id="option_esti"><option>%</option><option>Rs</option></select></span></div></div></div>      <div class=" col-sm-6 col-md-6"></div></div><button class="btn btn-primary btnUpdate" data-update-id="'+count+'" id="remove_field'+count+'" style="margin-bottom:10px;">Remove Item</button> </div>')

                if(inputvalues == "")
                {
                    
                }
              else{
                
              }


                if(item_dynamic =='At item level'){
              $('#edit_dynamic_discount'+count).css('display','inline-block');
               $("#discount_esti").css('display','none');
            }
            else if(item_dynamic == 'At invoice level'){
               $('#edit_dynamic_discount'+count).css('display','none');
               $("#discount_esti").css('display','inline-block');
               $("#discount_calculate_estimate").css('display','inline-block');
            }
            else if(item_dynamic == 'Select Discount Type'){
               $('#edit_dynamic_discount'+count).css('display','none');
                $("#discount_esti").css('display','none');
            }

                 count++;
            });  

            var no1=0;
             $(document).on("click",".btnUpdate",function()
            {
              if(no1==2){
                var id=$(this).data("update-id");

                 $.confirm({
                  title: 'Warning',
                  content: 'Do you want to remove item?',
                  type: 'dark',
                  typeAnimated: true,
                  draggable: false,
                  buttons: {
                      Ok: function () {
                          $("#"+id).closest("div").remove();

                      },
                       Cancel: function () {
                      }
                  }
              });
              no1=0;
            }no1++;

            });
        });
        //var id=$("#invoiceno").val();

        var first = window.location.pathname;
       // alert(first);
        first.indexOf(2);
        first.toLowerCase();
        first = first.split("/")[2];
        var afterhash = window.location.hash;
      //  alert(first+"  ......  "+afterhash)
        if(afterhash=='#Estimate')
        {
        //  alert("IN IF OF GET ACCOUNT DATA");

          // var table = $('#example1').dataTable({
          //   "bProcessing": true,
          //   "sAjaxSource": "../../../../client/res/templates/financial_changes/generate_account_table.php",
          //   "bPaginate":true,
          //   "sPaginationType":"full_numbers",
          //   "iDisplayLength": 5,
          //   "aoColumns": [
          //     { mData: 'Name' ,
          //       "render": function (data) 
          //       {


          //         return "<a href='javascript:void(0);' onclick='setaccount(\""+data+"\")'>"+data+"</a>";
          //       }
          //     } ,
          //     { mData: 'Country' },
          //   ]
          // });
        }  

        if(first!='portal' && afterhash=='#Invoice')
        {
          // var table = $('#example_invoice').dataTable({
          //   "bProcessing": true,
          //   "sAjaxSource": "../../../../client/res/templates/financial_changes/generate_account_table.php",
          //   "bPaginate":true,
          //   "sPaginationType":"full_numbers",
          //   "iDisplayLength": 5,
          //   "aoColumns": [
          //     { mData: 'Name' ,
          //       "render": function (data) 
          //       { 
          //         return "<a href='javascript:void(0);' onclick='setaccount1(\""+data+"\")'>"+data+"</a>";
          //       }
          //     } ,
          //     { mData: 'Country' },
          //   ]
          // });
        }

        if(first!='portal' && afterhash=='#Payments')
        {
          var table = $('#examplepayment').dataTable({
            "bProcessing": true,
            "sAjaxSource": "../../../../client/res/templates/financial_changes/generate_account_table.php",
            "bPaginate":true,
            "sPaginationType":"full_numbers",
            "iDisplayLength": 5,
            "aoColumns": [
            { mData: 'Name' ,
            "render": function (data) 
            {


            return "<a href='javascript:void(0);' onclick='setaccount2(\""+data+"\")'>"+data+"</a>";
            }
            } ,
            { mData: 'City' },
            ]
          });
        }
    </script> 
    <script type="text/javascript">
      function setaccount(data)
      {
          $("#estimate_account_id").val(data);
          $('#myModal').modal('toggle');
      }


      function setaccount1(data)
      {
          $("#invoice_account_id").val(data);
          $('#myinvoice').modal('toggle');
      }

      function setaccount2(data)
      {
          $("#payment_account_id").val(data);

           $("#payment_type").removeAttr("disabled");
          $('#paymentModal').modal('toggle');
          fetch_invoices();
      }
    </script>
    <script>
    $("#estimate_account_save").click(function(){
       
     var name=$("#estimate_account_name").val(); 
     var email=$("#estimate_account_email").val();
     var no=$("#estimate_account_no").val();

    if(name=='')
    {
      $.confirm({
            title: 'Warning!',
            content: 'Please enter name',
            type: 'dark',
            typeAnimated: true,
            draggable: false,
                buttons: {
            Ok: function () {
               
                }
            }

        });
    }
    else if(email!='' && IsEmail(email)==false)
    {

      $.confirm({
            title: 'Warning!',
            content: 'Please enter valid e-mail address',
            type: 'dark',
            typeAnimated: true,
            draggable: false,
                buttons: {
            Ok: function () {
               $("#estimate_account_email").val("");
                }
            }

        });
    }


    else if(no!='' && no.length!=10)
    {

      $.confirm({
            title: 'Warning!',
            content: 'Please enter 10 digits mobile number',
            type: 'dark',
            typeAnimated: true,
            draggable: false,
                buttons: {
            Ok: function () {
               $("#estimate_account_no").val("");
                }
            }

        });
      
    }

    else 
    {

        $.ajax({
        url: "../../client/res/templates/financial_changes/save_account.php?name="+name+"&email="+email+"&no="+no,
        type: "post", 
        async: false,
        success: function(result)
        {
            if(result==1)
            {

                $("#estimate_account_id").val(name);

                $("#estimate_account_name").val("");
                $("#estimate_account_no").val("");
                $("#estimate_account_email").val("");

                $('#estimate_create_account').modal('toggle');
                $('#myModal').modal().modal('toggle');
            } 
            else
            {
               $.confirm({
            title: 'Warning!',
            content: 'Failed to create account',
            type: 'dark',
            typeAnimated: true,
            draggable: false,
                buttons: {
            Ok: function () {
                }
            }

        });
            }       
        }
        }); 
    }


    function IsEmail(email) {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if(!regex.test(email)) {
        return false;
      }else{
        return true;
      }
    }

    });

      </script>
      <script>
        $(document).on('change',"#placeofsupply_estimate,#billing_address_state_estimate", function(){ 
        var gstno = $('#gst_no_estimate').val();
       

        var placeofsupply_est = $('#placeofsupply_estimate').val();
       

        var bill_state_est = $('#billing_address_state_estimate').val();
        


        if(gstno != ""){
          if(placeofsupply_est == bill_state_est){

            
          }
          else{
            

          }

        }


        });
    </script>
    <script>
                $(document).on('blur',".shippinggstinnumber", function(){    
                  var inputvalues = $(this).val();
                  var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
                    if(inputvalues == ""){
                    

                  }

                  else{
                  
                  if (gstinformat.test(inputvalues)) {
                   return true;
                  } else {

              $.alert({
                  title: 'Warning!',
                  content: 'Please enter valid GSTIN number',
                  type: 'dark',
                  typeAnimated: true,
                  draggable: false,
              });
                      //$.alert('Please Enter Valid GSTIN Number');
                      $(".shippinggstinnumber").val('');
                      $(".shippinggstinnumber").focus();
                  }
                  }
              });
              </script>

              <!-- Datepicker script -->
<script>
  $( function() {
    $( "#date" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
  } );


  $('#estimate_no').blur(function(e){
e.stopImmediatePropagation();
no=$('#estimate_no').val();
if(first=='portal')
{
$.ajax({
    url: "../../../../client/res/templates/financial_changes/check_estimate_no.php?no="+no,
    type: "post", 
    async: false,
    success: function(result)
    {
           
          if(result==1)
          {
             $.confirm({
        title: 'Warning!',
        content: 'Estimate number exist,please enter another one!',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
            buttons: {
        Ok: function () {
            $('#estimate_no').val("");
            }
        }

    });
          }     
    }

    });
}
else
{
$.ajax({
    url: "../../client/res/templates/financial_changes/check_estimate_no.php?no="+no,
    type: "post", 
    async: false,
    success: function(result)
    {
          if(result==1)
          {
             $.confirm({
        title: 'Warning!',
        content: 'Estimate number exist,please enter another one!',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
            buttons: {
        Ok: function () {
            $('#estimate_no').val("");
            }
        }

    });
          }      
               
    }

    });
    }
     });
  </script>

  <script>
  $( function() {
    $( "#date1" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
  } );
  </script>
   <script>
  $( function() {
    $( "#date2" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
  } );
  </script>
   <script>
  $( function() {
    $( "#date3" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
  } );
  </script>
  <script type="text/javascript">
  $("#calculate_estimate").click(function(e){
     e.stopImmediatePropagation();

var formdata=$('#createEstimateForm').serialize();
// alert(formdata);

   $.ajax({
    url: "../../client/res/templates/financial_changes/calculate_estimate.php",
    type: "GET", 
    async: false,
    dataType: "json",
    data : formdata,
    
    success: function(result)
    {
       var len=result.length;
    //   alert(len);
    //   alert("ALERT 3=  "+result);
      for (var i = 0; i < len; i++) {

        //   alert(result[i].CGST);

        $("#subtotal").val(result[i].subtotal);
        $("#total").val(result[i].total_amount);
        $("#IGST").val(result[i].IGST);
        $("#SGST").val(result[i].SGST);
        $("#CGST").val(result[i].CGST);
      }
      
    }
    });


});

</script>

<!-- Create Estimate Save data script Start -->
      <script type="text/javascript">
        
          $(document).on("click", "#save_estimateBTN", function(event){
            // alert("hi");
            $('#createEstimateForm').submit(function(event){   
            
            event.preventDefault();
            event.stopImmediatePropagation();
            
              var formdata= $('#createEstimateForm');
              form      = new FormData(formdata[0]);
              jQuery.each(jQuery('#file')[0].files, function(i, file) {
                    form.append('file['+i+']', file);
              });
                
                $.ajax({
                  type    : "POST",
                  url     : "../../client/res/templates/financial_changes/save_estimate.php",
                  dataType  : "json",
                  processData: false,
                  contentType: false,
                  data: form,
                  success: function(data)
                  {

                     if(data.status == "true" )
                     {
                         $.confirm({
                            title: 'Success!',
                            content: data.msg,
                            type: 'dark',
                            typeAnimated: true,
                            draggable: false,
                            buttons: {
                              Ok: function () {
                                //window.location.reload();
                                $('button[data-action="reset"]').trigger('click');
                                $(function () {
                                $('#estimate').modal('toggle');
                                $('#createEstimateForm')[0].reset();
                              });
                              }
                            }
                         });
                     }else{

                      $.alert({
                        title: 'Alert!',
                        content: data.msg,
                        type: 'dark',
                        typeAnimated: true,
                        draggable: false,
                      });

                     }
 

                  }
                });
               
          });
      });
    </script>
    <!-- Create Estimate Save data script End -->

<!-- Create Estimate Discount validation script Start -->
<script type="text/javascript">

      $(document).on("change",".edit_dynamic_discount1", function(){ 

          var discount_est = this.value ; 

          var parent = $(this).closest(".item");
          var option_esti= parent.find("#option_esti").val();
          var qtyVal = parent.find(".estimate_quantity").val();
          var rateVal = parent.find(".estimate_rate").val();
          
      
        if(option_esti== "Rs")
        {

          var total_est = qtyVal * rateVal;

            if(total_est < discount_est)
            {
              $.alert("Discount cannot be more than product value.");
              $(this).val("");
            }
        }
        else if(option_esti=="%")
        {

            if(discount_est>100)
            {

               $.alert("Discount % cannot be more than 100%.");
               $(this).val("");

            }
        }

    });

  </script>


   <script type="text/javascript">
        
      $(document).on("change",".discount_calculate_estimate1", function(){ 
          var discount_est = this.value ; 
          // alert(discount_est);
           // var parent = $(this).closest(".item");

          var option_esti= $("#option_esti1").val();
          // alert(option_esti);
          var qtyVal = $(".estimate_quantity").val();
          // alert(qtyVal);
          var rateVal = $(".estimate_rate").val();
          // alert(rateVal);
         
         if(option_esti=="Rs")
         {
            var total_est = qtyVal * rateVal;

            if(total_est <= discount_est)
            {
              $.alert("Discount cannot be more than product value.");
              $(this).val("");
            }
        }

        else if(option_esti=="%")
        {
          // alert(elseif);
          if(discount_est>100)
          {

             $.alert("Discount % cannot be more than 100%.");
               $(this).val("");

          }
        }
     });

  </script>
<!-- Create Estimate Discount validation script End -->


<!-- Create Estimate Postal code valiadtion Script -->
<script>
  var postal=0;
    function postal_code()
    {
      if(postal==2){
          // e.stopImmediatePropagation();
        var val1 = $('#billing_address_postal_code').val();
        if(val1==""){
          $.alert({
            title: 'Alert!',
            content: 'Please enter postal code',
             type: 'dark',
             typeAnimated: true,
             draggable: false,
          });
        }
        else{
          if (/^\d{6}$/.test(val1)) {
          } 
          else {
            $.alert({
              title: 'Alert!',
              content: 'Postal code must be of 6 digits',
              type: 'dark',
              typeAnimated: true,
              draggable: false,
              buttons: {
                ok: function () {
                  if(val1){
                    $('#billing_address_postal_code').val("");
                  }
                }
              }
            });
          }
        } 
        postal=0;
      }postal++; 
    }
</script>

    <script>
      function shipping_postal_code(){
        // e.stopImmediatePropagation();
        var val1 = $('#shipping_address_postal_code').val();
   
        if(val1==""){
          $.alert({
                  title: 'Alert!',
                  content: 'Please enter postal code',
                   type: 'dark',
                   typeAnimated: true,
                  draggable: false,
              });
        }
        else{
          if (/^\d{6}$/.test(val1)) {
              
          } else {
              $.alert({
                    title: 'Alert!',
                    content: 'Postal code must be of 6 digits',
                     type: 'dark',
                     typeAnimated: true,
                     draggable: false,
                     buttons: {
                      ok: function () {
                      if(val1){
                        $('#shipping_address_postal_code').val("");
                      }
                          
                      }
                    }
                });
             }
        }
      }
    </script>

<!-- Create Invoice script start -->
<script type="text/javascript">
$('.invoice_number').blur(function(e){
e.stopImmediatePropagation();
no=$('.invoice_number').val();
if(first=='portal')
{
$.ajax({
    url: "../../../../client/res/templates/financial_changes/check_invoice_no.php?no="+no,
    type: "post", 
    async: false,
    success: function(result)
    {
           
          if(result==1)
          {
             $.confirm({
        title: 'Warning!',
        content: 'invoice number exist,please enter another one!',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
            buttons: {
        Ok: function () {
            $('.invoice_number').val("");
            }
        }

    });
          }     
    }

    });
}
else
{
$.ajax({
    url: "../../client/res/templates/financial_changes/check_invoice_no.php?no="+no,
    type: "post", 
    async: false,
    success: function(result)
    {
          if(result==1)
          {
             $.confirm({
        title: 'Warning!',
        content: 'Invoice number exist,please enter another one!',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
            buttons: {
        Ok: function () {
            $('.invoice_number').val("");
            }
        }

    });
          }      
               
    }

    });
    }
     });
  </script>
<!-- Create Invoice Save data script start -->
  <script type="text/javascript">
        // var uppdateInvoiceBtn=0;

          $(document).on("click", "#save_invoiceBTN", function(event){
             $("#createInvoiceForm").submit(function(event) {

            event.preventDefault();
             event.stopImmediatePropagation();
            // if(uppdateInvoiceBtn==2)
            // {
                 var formdata=$('#createInvoiceForm');
                 form      = new FormData(formdata[0]);
                jQuery.each(jQuery('#file')[0].files, function(i, file) {
                    form.append('file['+i+']', file);
                });
  

               $.ajax({
                  type    : "POST",
                  url     : "../../client/res/templates/financial_changes/save_invoice.php",
                  dataType  : "json",
                  processData : false,
                  contentType : false,
                  data:form,
                  success: function(data)
                  {
                    
                     if( data.status == "true" )
                             {
                                 $.confirm({
                                    title: 'Success!',
                                    content: data.msg,
                                    type: 'dark',
                                    typeAnimated: true,
                                    draggable: false,
                                    buttons: {
                                      Ok: function () {
                                        //window.location.reload();
                                        $('button[data-action="reset"]').trigger('click');
                                        $(function () {
                                         $('#invoice').modal('toggle');
                                          });
                                         $('#createInvoiceForm')[0].reset();
                                         //return false;
                                      }
                                    }
                                 });
                             }else{

                              $.alert({
                                title: 'Alert!',
                                content: data.msg,
                                type: 'dark',
                                typeAnimated: true,
                                draggable: false,
                              });

                             }
 

                  }
                });
              
                // uppdateInvoiceBtn=0;
                
            // }
            // uppdateInvoiceBtn++;
          });
      });
      </script>
<!-- Create Invoice Save data script end -->

<!-- Create Invoice Discount validation script start -->

      <script type="text/javascript">
         // var dis_count=0;
         $(document).on("change",".discount_invoice1", function(){ 
          var discount_inv = this.value ; 

          var parent = $(this).closest(".item1");
          var option_create= parent.find("#option_create").val();
          var quantity = parent.find(".quantity").val();
          var rate = parent.find(".rate").val(); 
          if(option_create=="Rs")
          {
            var total_inv = quantity * rate;
            if(total_inv < discount_inv)
            {
              $.alert("Discount cannot be more than product value.");
              $(this).val("");
            }
        }
        else if(option_create=="%"){

          if(discount_inv>100)
          {
            $.alert("Discount % cannot be more than 100%.");
            $(this).val("");
          }
        }
        });

  </script>


 <script type="text/javascript">
         // var dis_count=0;
         $(document).on("change",".discount_calculate_invoice1", function(){ 
          var discount_inv = this.value;

          // var parent = $(this).closest(".item1");
          var option_create1= $("#option_create1").val();

          var quantity = $(".quantity").val();

          var rate = $(".rate").val();

         
         if(option_create1=="Rs"){
          var total_inv = quantity * rate;
          if(total_inv < discount_inv)
          {
            $.alert("Discount cannot be more than product value.");
            $(this).val("");
          }
        }
        else if(option_create1=="%"){
          if(discount_inv>100)
          {
            $.alert("Discount % cannot be more than 100%.");
            $(this).val("");
          }
        }
        });

  </script>
<!-- Create Invoice Discount validation script End -->


<!-- Create Invoice Postal code valiadtion Script -->


    <script>
      function postal_code1(){
        // e.stopImmediatePropagation();
        var val1 = $('#billing_address_postal_code1').val();
   
        if(val1==""){
          $.alert({
                  title: 'Alert!',
                  content: 'Please enter postal code',
                   type: 'dark',
                   typeAnimated: true,
                   draggable: false,
              });
        }
        else{
          if (/^\d{6}$/.test(val1)) {
              
          } else {
              $.alert({
                    title: 'Alert!',
                    content: 'Postal code must be of 6 digits',
                     type: 'dark',
                     typeAnimated: true,
                     draggable: false,
                     buttons: {
                      ok: function () {
                      if(val1){
                        $('#billing_address_postal_code1').val("");
                      }
                          
                      }
                    }
                });
             }
        }
      }
    </script>

    <script>
      function shipping_postal_code1(){
        // e.stopImmediatePropagation();
        var val1 = $('#shipping_address_postal_code1').val();
   
        if(val1==""){
          $.alert({
                  title: 'Alert!',
                  content: 'Please enter postal code',
                   type: 'dark',
                   typeAnimated: true,
                   draggable: false,
              });
        }
        else{
          if (/^\d{6}$/.test(val1)) {
              
          } else {
              $.alert({
                    title: 'Alert!',
                    content: 'Postal code must be of 6 digits',
                     type: 'dark',
                     typeAnimated: true,
                     draggable: false,
                     buttons: {
                      ok: function () {
                      if(val1){
                        $('#shipping_address_postal_code1').val("");
                      }
                          
                      }
                    }
                });
             }
        }
      }
    </script>

     <script type="text/javascript">
      
        $(document).on('change',"#edit_discount_type", function(){ 
            var item = this.value ;

            if(item=='At item level'){
              $("#discount_estimate").css('display','inline-block');
               $(".edit_dynamic_discount").css('display','inline-block');
               $("#discount_esti").css('display','none');
               // $(".item").css('display','inline-block');
            }
            else if(item== 'At invoice level'){
               $("#discount_estimate").css('display','none');
               $(".edit_dynamic_discount").css('display','none');
               $("#discount_esti").css('display','inline-block');
               // $(".item").css('display','inline');
            }
            else if(item == 'Select Discount Type'){
               $("#discount_estimate").css('display','none');
                $("#discount_esti").css('display','none');
                $(".edit_dynamic_discount").css('display','none');
                // $(".item").css('display','inline');
            }

           });
    </script>

    <script type="text/javascript">
      
        $(document).on('change',"#edit_discount_type_invoice", function(){ 
            var item_invoice = this.value ;

            if(item_invoice =='At item level'){
              $("#discount_invoice").css('display','inline-block');
               $(".edit_dynamic_discount_invoice").css('display','inline-block');
               $("#discount_invo").css('display','none');
                // $(".item1").css('display','inline-block');
              
            }
            else if(item_invoice == 'At invoice level'){
               $("#discount_invoice").css('display','none');
               $(".edit_dynamic_discount_invoice").css('display','none');
               $("#discount_invo").css('display','inline-block');
               // $(".item1").css('display','inline');

            }
            else if(item_invoice == 'Select Discount Type'){
               $("#discount_invoice").css('display','none');
                $("#discount_invo").css('display','none');
                $(".edit_dynamic_discount_invoice").css('display','none');
                // $(".item1").css('display','inline');
            }

           });
    </script>
     <script>
                    $(document).on('blur',".pannumber", function(e){
                    e.stopImmediatePropagation();    
                      var inputvalues_panno = $(this).val().toUpperCase() ;
                      //alert(inputvalues_panno);
                      var inputvaluesship_pan = $('.shippingpannumber').val().toUpperCase();
                      var gstinformat_panno = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');

                      if(inputvalues_panno == ""){
                       return true;

                      }
                      else if (inputvalues_panno == inputvaluesship_pan) {
                                $.alert({
                                    title: 'Warning!',
                                    content: 'PAN Number should not be equal',
                                    type: 'dark',
                                     typeAnimated: true,
                                     draggable: false,
                                    buttons: {
                                        Ok: function() {
                                            $('.shippingpannumber,.pannumber').val("");
                                        }
                                    }
                                });
                            }

                      else{

                      if (gstinformat_panno.test(inputvalues_panno)) {
                        
                       return true;
                      } else {

                  $.alert({
                      title: 'Warning!',
                      content: 'Please enter valid PAN number',
                      type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                  });
                          //$.alert('Please Enter Valid PAN Number');
                          $(".pannumber").val('');
                          $(".pannumber").focus();
                      }
                      }
                  });
              </script> 
              <script>
                    $(document).on('blur',".shippingpannumber", function(e){
                    e.stopImmediatePropagation();    
                      var inputvalues_shippanno = $(this).val().toUpperCase();
                      var inputvalues_panno = $('.pannumber').val().toUpperCase();
                      // alert(inputvalues_shippanno);
                      var gstinformat_shippanno = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');

                      if(inputvalues_shippanno == ""){
                       
                          return true;
                      }

                      else if(inputvalues_shippanno == inputvalues_panno ) {
                                $.alert({
                                    title: 'Warning!',
                                    content: 'PAN Number should not be equal',
                                    type: 'dark',
                                     typeAnimated: true,
                                     draggable: false,
                                    buttons: {
                                        Ok: function() {
                                            $('.shippingpannumber,.pannumber').val("");
                                        }
                                    }
                                });
                            }

                      else{

                      if (gstinformat_shippanno.test(inputvalues_shippanno)) {
                        
                       return true;
                      } else {

                  $.alert({
                      title: 'Warning!',
                      content: 'Please enter valid PAN number',
                      type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                  });
                          //$.alert('Please Enter Valid PAN Number');
                          $(".shippingpannumber").val('');
                          $(".shippingpannumber").focus();
                      }
                      }
                  });
              </script> 
              <script type="text/javascript">
                function getVal3(){
                  var val =$("#g_s_t_invoice").val();
                 // alert(val);
                  if(val=="IGST"){
                      $("#IGST_INV").css("display", "block");
                      $("#SGST_INV").css("display", "none");
                      $("#CGST_INV").css("display", "none");
                      
                  }else if(val="CGST/SGST"){
                      $("#IGST_INV").css("display", "none");
                      $("#SGST_INV").css("display", "block");
                      $("#CGST_INV").css("display", "block");
                  }
              }
              </script>

               <!-- Create Account For Invoice Modal -->
  <div class="modal fade" id="invoice_create_account" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Account</h4>
        </div>
        <div class="modal-body" style="padding-top:0px;">
          <div class="">
              <div class="row">
                <div class="col-md-12">
                  <div class="">
                    <button type="submit" id="invoice_account_save" class="btn btn-primary">save</button>
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
                    <label for="">Name<span class="text-danger">*</span></label>
                      <input type="text"  name="invoice_account_name" id="invoice_account_name" class="form-control" placeholder="" required>
                  
                   </div>
                   </div>
                   <div class="col-sm-6 col-md-6" >
                  <div class="form-group">
                    <label for="">Email</label>
                      
                      <input type="email" name="invoice_account_email" id="invoice_account_email" class="form-control" placeholder="" >
                    
                   </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6 col-md-6" >
                  <div class="form-group">
                    <label for="">Mobile Number</label>
                      <input type="text"  name="invoice_account_no" id="invoice_account_no" class="form-control"  minlength="10"  maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="" >
                  
                   </div>
                   </div>
                   </div>

          <button class="btn btn-success" id="" style="visibility: hidden;margin-bottom: 20px;">Add Item</button> 
        </div>
        
      </div>
      
    </div>
  </div>
</div>
<!-- add remainder modal -->
<div class="container">
<div class="modal fade" id="addReminderModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog model-emailwidth">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close email_close" data-dismiss="modal" id="emptyAttachments">&times;</button>
                <h4 class="modal-title">Add Email Reminder</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <form class="reminder-form" id="add-reminder-form" action="../../client/res/templates/reminder/saveEmailReminder.php" enctype="multipart/form-data" method="post" autocomplete="off" >
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="to" name="to" class="form-control" placeholder="To: Email id 1, Email id 2, Email id 3..." onkeyup="validateMultipleEmailsCommaSeparated1(this)"  required/>
                                            <span id="emailerror" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">Please enter a valid e-mail id</span>
                                            <span id="emailToMaxFive" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">You can enter a maximum of 5 E-mail ids</span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input id="email-reminder-create-cc" type="text" name="cc" placeholder="Cc: Email id 1, Email id 2, Email id 3..." class="form-control" onkeyup="validateMultipleEmailsCcCommaSeparated1(this)"/>
                                            <span id="emailccerror" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">Please enter a valid e-mail id</span>
                                            <span id="emailCcMaxFive" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">You can enter a maximum of 5 E-mail ids</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="subject" placeholder="Subject" id="subject11" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <textarea class="ckeditor" cols="0" id="editor100" name="editor100" rows="0"></textarea>
                                             <script>
                                                CKEDITOR.replace('editor100');
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                  <div class="col-xs-12 col-sm-2 col-md-2">
                                      <label>Send Email:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                      <input type="radio" name="add_emailReminder_send_email" value="add_emailReminder_immediately" class="add_emailReminder_hideDateTime"> Immediately &nbsp;&nbsp;
                                      <input type="radio" name="add_emailReminder_send_email" value="add_emailReminder_sms_date" class="add_emailReminder_showDateTime"> Schedule At
                                    </div>
                                     <div class="mrb-10 hidden" id="add_email_reminderDateTime">
                                  <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="row">
                                      <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                        <div class="input-group">
                                            <!-- <label>Date:</label> -->
                                            <input class="form-control date100" required date-format="dd/mm/yyyy" id="date100" name="date100" placeholder="Select Date" type="text" onchange="checkDate()" onkeydown="return false" onclick="getDateEvent(this)"/>
                                            <label class="btn-default_gray input-group-addon" for="date100"><i class="material-icons-outlined" style="font-size: 16px !important;position: relative;">date_range</i></label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                        <!-- <label>Email:</label> -->
                                        <div class="clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                            <input type="text" required name="time100" id="time100" placeholder="Select Time" class="form-control time100" onchange="checkTime()" onkeydown="return false" onfocus="getEvent(this)"/>
                                            <span class="btn-default_gray input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                        <span id="time_error" class="text-danger" class="text-danger_error" style="display: none;">Reminder can not be set for a past time</span>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-2">
                                                <div class="clip-upload">
                                                    <label for="file-input">
                                                        <span class=""><i class="fa fa-paperclip fa-lg" style="color:#000; font-size:20px;cursor: pointer;" aria-hidden="true"></i></span>
                                                    </label>

                                                    <input type="file" class="file-input hide" multiple name="attachment[]"  id="file-input" />
                                                    <input type="hidden" class="form-control attach_files" id="attach_files[]" name="attach_files[]" value=""/>
                                                    <div class="filename-container "></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-10">
                                                <input type="hidden" id="fileName" name="" style="border:none" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="mrt-10 file_name_append2">
                                  <!-- dynamic name append. -->
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="bg bg-danger" style="padding: 10px;margin-bottom:10px;margin-top: 10px;">
                                        <span><b>Note : </b></span> <p style="white-space: pre-line;display: inline;">Supported File Formats – < jpeg/jpg, png, docx/doc, xlsx/xls, zip, rar, pdf, txt, csv >.</p>
                                     </div>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="mrt-10">
                                    <button type="submit" id="myBtn" value="Save" class="btn btn-primary pull-right createEmailReminder" >Save</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <img src="../../client/img/import-loader.gif" width="22px" class="email-loader" alt="loader" style="display: none;">
  <div class="email-blur-effect" style="display: none;"></div>
</div>
<!-- add remainder modal -->

<!-- add remainder modal -->
<div class="modal fade" id="addSmsReminderModal" role="dialog">
    <div class="modal-dialog modal-emailwidth">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add SMS Reminder</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <form class="sms-reminder-form" id="add-sms-reminder-form" action="../../client/res/templates/reminder/saveSMSReminder.php" enctype="multipart/form-data" method="post" autocomplete="off" >

                              <div class="row mrb-10">
                                <div class="col-sm-12 addSmsReminderError"></div>
                              </div>
                              <div class="row mrb-10">
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                  <div class="form-group">
                                    <div class="field">
                                        <select name="smssenderid" id="smssenderid" class="form-control">
                                          <option value="">Select Sender id</option>
                                        </select>
                                        <span class="SMS_error_main text-danger" style="display: none;">Please select sender id</span>
                                    </div>    
                                  </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-9  form-group">
                                  <div  class="field"> 
                                    <select name="smscontent_template" id="smscontent_template" class="form-control">
                                          <option value="">Select Content Template</option>
                                    </select>
                                    <span class="SMS_error_main text-danger" style="display: none;">Please select content template</span>
                                  </div> 
                                </div>
                              </div>
                              <div class="row mrb-10">
                                <div class="col-xs-12 col-sm-12 col-md-12  form-group">
                                  <div class="">
                                    <input class="form-control number-only" id="smsMobileNo1" maxlength="10" placeholder="Mobile Number" pattern="\d{10}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required type="text" name="smsMobileNo1"  />
                                  </div>
                                </div>
                              </div>
                              <div class="row mrb-10">
                                <div class="col-xs-12 col-sm-12 col-md-12  form-group">
                                  <div class="mrt-10">
                                    <textarea class="form-control input-sm" id="smsBody1" placeholder="Message" required style="resize:none;" cols="16" rows="10" name="smsBody1"></textarea>
                                    <div>
                                      <span>Characters: </span> <b class="Add_smsBodyLenght"> 0</b>

                                      <span> SMS Credis: <b class="Add_smscount">0</b></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row form-group">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                  <label>Send SMS: </label>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                  <input type="radio" name="add_send_sms" value="immediately" class="SMS_hideDateTime"> Immediately
                                  &nbsp;&nbsp;
                                  <input type="radio" name="add_send_sms" value="sms_date" class="SMS_showDateTime"> Schedule At
                                </div>
                                <div class="mrb-10" id="Add_showDateTimeInput1" style="display: none;">
                                  <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="row">
                                      <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                          <div id="filterDate2">
                                            <div class="input-group smsDate1" data-date-format="dd.mm.yyyy">
                                              <input  type="text" id="smsDate1" name="smsDate1" onclick="getDateEvent(this)" class="form-control smsDate1" placeholder="Select Date" onchange="smsDatecheck1()" onkeydown="return false">

                                              <label class="btn-default_gray input-group-addon" for="smsDate1" >
                                                <i class="material-icons-outlined" style="font-size: 16px !important;position: relative;">date_range</i>
                                              </label>
                                            </div>  
                                          </div>    
                                        </div>
                                      </div>
                                      <div class="col-xs-12 col-sm-6 col-md-6  form-group">
                                        <div class="clockpicker input-group" data-placement="bottom" data-align="top" data-autoclose="true"> 
                                          <input type="text" id="smsTime1" name="smsTime1" placeholder="Select Time" class="form-control smsTime1 clockpicker_position" onchange="smsTimeCheck1()" onkeydown="return false" onfocus="getEvent(this)"/>
                                          <span class="btn-default_gray input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div> 
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="bg bg-danger" style="padding: 10px;margin-bottom:10px;">
                                        <p><b>Note : </b></p>
                                        <p style="white-space: pre-line;">1) SMS reminder service can be used only for transactional messages and not promotional messages.</p>
                                        <p style="white-space: pre-line;">2) The delivery status of this message will be updated within 1 minute of sending.</p>
                                     </div>
                                  </div>
                              </div>
                              <div class="row mrb-10">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="mrt-5">
                                    <button type="submit" value="Save"  class="btn btn-primary pull-right" id="save_sms_reminder" >Save</button>
                                  </div>
                                </div>
                              </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- add remainder modal -->
<script>
  //EMPTY SPACE VALIDATION
  $("input#to, input#email-reminder-create-cc").on({
    keydown: function(e) {
      if (e.which === 32)
        return false;
    },
    change: function() {
      this.value = this.value.replace(/\s/g, "");
    }
  });

$("#invoice_account_save").click(function(){
   
 var name=$("#invoice_account_name").val(); 
 var email=$("#invoice_account_email").val();
 var no=$("#invoice_account_no").val();

if(name=='')
{
  $.confirm({
        title: 'Warning!',
        content: 'Please enter name',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
            buttons: {
        Ok: function () {
           
            }
        }

    });
}
else if(email!='' && IsEmail(email)==false)
{

  $.confirm({
        title: 'Warning!',
        content: 'Please enter valid e-mail address',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
            buttons: {
        Ok: function () {
           $("#invoice_account_email").val("");
            }
        }

    });
}


else if(no!='' && no.length!=10)
{

  $.confirm({
        title: 'Warning!',
        content: 'Please enter 10 digits mobile number',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
            buttons: {
        Ok: function () {
           $("#invoice_account_no").val("");
            }
        }

    });
  
}

else 
{

    $.ajax({
    url: "../../client/res/templates/financial_changes/save_account.php?name="+name+"&email="+email+"&no="+no,
    type: "post", 
    async: false,
    success: function(result)
    {
        if(result==1)
        {

            $("#invoice_account_id").val(name);

            $("#invoice_account_name").val("");
            $("#invoice_account_no").val("");
            $("#invoice_account_email").val("");

            $('#invoice_create_account').modal('toggle');
            $('#myinvoice').modal().modal('toggle');
        } 
        else
        {
           $.confirm({
        title: 'Warning!',
        content: 'Failed to create account',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
            buttons: {
        Ok: function () {
            }
        }

    });
        }       
    }
    }); 
}



function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}

});

  </script>
  <script>

        var count=0;
        var count1=0;
        $(document).on("change","#date1",function(){

            //alert("Hi IN INVOICE DATE ");
            var val1= $(".invDate").val();
            var val= document.getElementById("date3").value;
           // alert(val1);
            var parts =val1.split('/');
            var selectedINVDate= parts[1]+"-"+parts[0]+"-"+parts[2];
            var selectedINVDate = new Date(selectedINVDate);

            //alert("SELECTED INV DATE = "+selectedINVDate);

            var parts1 =val.split('/');
            var selectedORDDate= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
            var selectedORDDate = new Date(selectedORDDate);

           // alert("SELECTED ORD DATE = "+ selectedORDDate);

            if(selectedINVDate < selectedORDDate){
              count1++;
              if(count1== 3){
                $.alert("INVOICE DATE NOT THE PAST DATE OF ORDER DATE");
                $(".invDate").val("");
                count1=0;
              }
            }

        });

         $(document).on("change","#date2",function(event){
          //  alert("HII");
          //  alert("ON CLICK OF DUE DATE");
            event.preventDefault();
            event.stopImmediatePropagation();
            var val1= $(".invDate").val();

          //  alert(val1);
            var val= document.getElementById("date2").value;

         //   alert("DATE SELECTED FOR INVOICE DATE= "+val1);
         //   alert("DATE SELECTED FOR DUE DATE= "+val);

            //var invDate= new Date(val1);
            var parts =val1.split('/');
            var selectedINVDate= parts[1]+"-"+parts[0]+"-"+parts[2];
            var selectedINVDate = new Date(selectedINVDate);

            var dueDate= new Date(val);
         //   alert("SELECTED INV DATE= "+selectedINVDate);

             var parts1 =val.split('/');
            var selectedDUEDate= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
            var selectedDUEDate = new Date(selectedDUEDate);


        //    alert("SELECTED DUE DATE = "+selectedDUEDate);
            
                if(selectedINVDate > selectedDUEDate){
                  count++;
                    if(count==3){
                      $.alert("Due date can not be before invoice date.");

                      document.getElementById("date2").value="";
                      count=0;
                    }  
                }

            
         });   
</script>

<script>

$("#adjustment_calculate_invoice").blur(function(e){
 e.stopImmediatePropagation();
var formdata=$('#createInvoiceForm').serialize();


   $.ajax({
    url: "../../client/res/templates/financial_changes/calculate_invoice.php",
    type: "get", 
    async: false,
    dataType: "json",
    data : formdata,
    success: function(result)
    {
       var len=result.length;


      for (var i = 0; i < len; i++) {
        $("#invoice_subtotal").val(result[i].subtotal);
        $("#invoice_total").val(result[i].total_amount);
        $("#INV_IGST").val(result[i].IGST);
        $("#INV_CSGT").val(result[i].CGST);
        $("#INV_SGST").val(result[i].SGST);

      }
      
    }
    });


});
// $("#discount_calculate_invoice").blur(function(){

// var formdata=$('#createInvoiceForm').serialize();


//    $.ajax({
//     url: "../../client/res/templates/financial_changes/calculate_invoice.php",
//     type: "get", 
//     async: false,
//     dataType: "json",
//     data : formdata,
//     success: function(result)
//     {
//        var len=result.length;


//       for (var i = 0; i < len; i++) {
//         $("#invoice_subtotal").val(result[i].subtotal);
//         $("#invoice_total").val(result[i].total_amount);
//         $("#INV_IGST").val(result[i].IGST);
//         $("#INV_CSGT").val(result[i].CGST);
//         $("#INV_SGST").val(result[i].SGST);
//       }
      
//     }
//     });


// });


$("#calculate_invoice").click(function(){

var formdata=$('#createInvoiceForm').serialize();


   $.ajax({
    url: "../../client/res/templates/financial_changes/calculate_invoice.php",
    type: "get", 
    async: false,
    dataType: "json",
    data : formdata,
    success: function(result)
    {
       var len=result.length;


      for (var i = 0; i < len; i++) {
        $("#invoice_subtotal").val(result[i].subtotal);
        $("#invoice_total").val(result[i].total_amount);
        $("#INV_IGST").val(result[i].IGST);
        $("#INV_CGST").val(result[i].CGST);
        $("#INV_SGST").val(result[i].SGST);
      }
      
    }
    });


});

</script>

<script>
  
  function setaccount(data)
{
    $("input[name=account_id]").val(data);
    $('#myModal').modal('toggle');
}


function setaccount1(data)
{
    $("#invoice_account_id").val(data);
    $('#myinvoice').modal('toggle');
}

function setaccount2(data)
{
    $("#payment_account_id").val(data);

     $("#payment_type").removeAttr("disabled");
    $('#paymentModal').modal('toggle');
    fetch_invoices();
}

function fetch_invoices(){

  var value_pt=$("#payment_type").val();
  var account_name=$("#payment_account_id").val();
  if(value_pt=='Against Invoice')
  {
  
  $("#payment_data").empty();
  $("#billed_amount").attr("readonly", true); 
  $("#billed_amount").val(""); 
  $("#invoiceno_div").css("display","block");
  $("#payment_date_div").css("display","block");
  $("#billed_amount_div").css("display","none");
  $("#mode_div").css("display","none");
  $("#transaction_id_div").css("display","none");

  $("#payment_type").attr("readonly", true);


$.ajax({
    url: "../../client/res/templates/financial_changes/fetch_invoice.php?account_name="+encodeURIComponent(window.btoa(account_name)),
    type: "get", 
    dataType: 'json',
    async: false,
    success: function(result)
    {

    $('#payment_table').show();
          var len=result.length;
          tdLen= len;
      for (var i = 0; i < len; i++) 
      {

             $("#payment_data").append('<tr><td><div class="form-group"><input type="text" id="invoiceno" name="invoiceno[]" value="' + result[i].invoiceno + '" class="form-control" placeholder="" readonly></div></td><td><div class="form-group"><input type="text" id=""  name="invoicedate[]" value="' + result[i].invoicedate + '" class="form-control" readonly placeholder="" ></div></td><td> <div class="form-group"><input type="text" id="invoice_amount'+i+'"  name="invoice_amount[]" class="form-control" readonly value="' + result[i].total + '" placeholder="" ></div></td><td> <div class="form-group"><input readonly type="text" id="due_amount'+i+'" value="' + result[i].balance + '"  name="due_amount[]" value="0" data-count="'+i+'" class="form-control due_amount" placeholder="" ><input type="hidden" id="due_amount_'+i+'" value="' + result[i].balance + '"  name="due_amount[]" value="0" data-count="'+i+'" class="form-control due_amount" placeholder="" ></div></td><td> <div class="form-group"><input type="text" id="tds1'+i+'"  name="tds1[]" data-count="'+i+'" onchange="cal(\''+i+'\')"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control tds2" placeholder="" ></div></td><td> <div class="form-group"><input type="text" value="0" id="net_amount'+i+'" data-count="'+i+'" onchange="cal1(\''+i+'\')" name="net_amount[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control net_amount" placeholder="" ></div></td><td> <select name="mode1[]" id="" class="payment_mode_history form-control" ><option value="Cheque">Cheque</option><option value="Cash">Cash</option><option value="RTGS/NEFT/IMPS">RTGS/NEFT/IMPS</option><option value="Online">Online</option><option value="Others">Others</option></select></td><td> <div class="form-group"><input type="text" id="transaction_id" name="transaction_id1[]" class="form-control" placeholder="" ></div></td></tr>');
      }
      $(".payment_mode_history").customA11ySelect();
    }
    });


  }
               else if(value_pt=='On account payment')
               {
               
                  $("#invoiceno_div").css("display","none");
                  $("#billed_amount").attr("readonly", false);
                  $("#billed_amount").val(""); 
                  $("#payment_date_div").css("display","block");
                  $("#billed_amount_div").css("display","block");
                  $("#mode_div").css("display","block");
                  $("#transaction_id_div").css("display","block");
                   $("#net_amount_div").css("display","none");
                  $("#tds_div").css("display","none");
                  $('#payment_table').hide();
               }
               else if(value_pt=='Select Payment Type')
               {
                  $("#payment_date_div").css("display","none");
                  $("#billed_amount_div").css("display","none");
                  $("#mode_div").css("display","none");
                  $("#transaction_id_div").css("display","none");
                  $("#invoiceno_div").css("display","none");
                  $("#net_amount_div").css("display","none");
                  $("#tds_div").css("display","none");
                  $('#payment_table').hide();
               }
               }

</script>
<script>
  

    $('#datepicker2').datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    }); 

</script>

<script>
  
  function cal(id){
 
        var count = id;
        var balance=parseFloat($("#due_amount"+count).val());
        var tds1=parseFloat($("#tds1"+count).val());
        var invoice_amount=parseFloat($("#invoice_amount"+count).val());
        var net_amount1=parseFloat($("#net_amount"+count).val());
        var due_amount1 = parseFloat($("#due_amount_"+count).val());

        // var due_amount2= balance- (tds1 + net_amount1);
        var due_amount2= balance-tds1;
        // var net_amount2=balance - tds1;

        if(due_amount2 <= balance && due_amount2 >= 0)
        {
          $("#net_amount"+count).val(net_amount1);
          $("#due_amount"+count).val(due_amount2);

        }
        else if(due_amount2 < 0)
        {
          // $("#net_amount"+count).val("0");

          // $.alert("The amount entered is more than the balance due for selected invoice");
          $.alert({
            title: 'Alert!',
            content: "The amount entered is more than the balance due for selected invoice.",
            type: 'dark',
            typeAnimated: true,
            draggable: false,
            buttons: {
              Ok: function () {
                $("#tds1"+count).val("0");
                due_amount1 = due_amount1 - net_amount1; 
                $("#due_amount"+count).val(due_amount1);
              }
            },
          });
        }
        
    }


 function cal1(id){

 var count = id;
    var balance=parseFloat($("#due_amount"+count).val());
    var tds1=parseFloat($("#tds1"+count).val());
    var invoice_amount=parseFloat($("#invoice_amount"+count).val());
    var net_amount1=parseFloat($("#net_amount"+count).val());
    var due_amount1 = parseFloat($("#due_amount_"+count).val());

    // var due_amount2= balance- (tds1 + net_amount1);
    var due_amount2= balance-  net_amount1;
    // var net_amount2=balance - tds1;

    if(due_amount2 >= 0)
    {
        $("#net_amount"+count).val(net_amount1);
        $("#due_amount"+count).val(due_amount2);
        
    }
    else if(due_amount2 < 0)
    {
        // $("#net_amount"+count).val("0");
        // $("#error").css("display","block");
        // $.alert("The amount entered is more than the balance due for selected invoice");
        $.alert({
          title: 'Alert!',
          content: "The amount entered is more than the balance due for selected invoice.",
          type: 'dark',
          typeAnimated: true,
          draggable: false,
          buttons: {
              Ok: function () {
                $("#net_amount"+count).val("0");
                due_amount1 = due_amount1 - tds1; 
                $("#due_amount"+count).val(due_amount1);
              }
            },
        });
        // $("#update_data").attr("disabled","disabled");
    }

}

    
</script>
<!-- <script>
      function checkChanges(){
        // alert("IN CHECK CHANGES FUN");
        //for()
        // alert(tdLen);
        var arrForNetVal= [];
        for(var i=0; i<tdLen; i++){
            var val= $('#net_amount'+i).val();
            if(val!=""){
              arrForNetVal.push(val);
            }
            
           // alert(val);


        }
        // alert(arrForNetVal.length);
        if(arrForNetVal.length){
          return true;
        }else{
          $.alert("Please Enter Net Amount for invouce");
         

          return false;
        }
      }

  </script> -->

<!-- Create Payment Save data script Start -->
      <script type="text/javascript">
        
          $(document).on("click", "#save_paymentBTN", function(event){
            // alert("hi");
            $('#createPaymentForm').submit(function(event){   

            event.preventDefault();
            event.stopImmediatePropagation();
            
              var formdata= $('#createPaymentForm');
              form      = new FormData(formdata[0]);
              // jQuery.each(jQuery('#file')[0].files, function(i, file) {
                    // form.append('file['+i+']', file);
              // });
                
                $.ajax({
                  type    : "POST",
                  url     : "../../client/res/templates/financial_changes/save_payment.php",
                  dataType  : "json",
                  processData: false,
                  contentType: false,
                  data: form,
                  success: function(data)
                  {

                     if(data)
                             {
                                 $.confirm({
                                    title: 'Success!',
                                    content: 'Created Successfully!',
                                    type: 'dark',
                                    typeAnimated: true,
                                    draggable: false,
                                    buttons: {
                                      Ok: function () {
                                        //window.location.reload();
                                        $('button[data-action="reset"]').trigger('click');
                                        $(function () {
                                         $('#payment').modal('toggle');
                                      });
                                       $('#createPaymentForm')[0].reset();
                                      }
                                    }
                                 });
                             }
 

                  }
                });
               
          });
      });
    </script>
    <!-- Create Payment Save data script End -->


    <!-- Create Payment history after closing modal reset script Start -->
    <script type="text/javascript">
      $(document).on("click", "#payment #update_data", function(){
        $('#payment_date_div').css("display","none");
        $('#payment_table').css("display","none");
        $('#createPaymentForm')[0].reset();
        $('#datepicker2').datepicker('setDate', null);
      });
    </script>
    <!-- Create Payment history after closing modal reset script End -->


<!-- Email Reminder Scripts -->
<script type="text/javascript">
  
 $(document).on("change",".clip-upload",function(){
      event.preventDefault();
      var form_data       = $("#add-reminder-form");
      form_data           = new FormData(form_data[0]);
      form_data.append('methodName', 'create_file_upload');
      $.ajax({
          type    : "POST",
          url     : "../../../../client/res/templates/email_reminder/file_upload.php",
          dataType  : "json",
          data    : form_data,
          processData: false,
          contentType: false,
          success: function(data)
          {
            var $fileHtml1 = '';

            if(data.fileSuccess1){

              $.each(data.fileSuccess1, function (key,val) {

                $fileHtml1 = $fileHtml1+"<div class='row emailattachment_remove'><div class='col-xs-6'><span class='email_reminder_attachment'>"+key+"</span></div><div class='col-xs-6'><span class='material-icons-outlined unlinkFile' data-id='' data-name='"+key+"'  aria-hidden='true' onclick='unLinkfile(this);' style='cursor: pointer;' >close</span></div></div>";

              });
              $("#file-input").val("");

            } 

            if(data.fileError1) {

              $.each(data.fileError1, function (key,val) {

                  $fileHtml1 = $fileHtml1+"<div class='row text-danger'><div class='col-xs-12'>"+key + " - " +  val +"</div></div>";

              });
                
            }
            
            $(".file_name_append2").append($fileHtml1);
          }
      });
 });

 $(document).on("click","#create_email",function(){

      $.ajax({
          type    : "GET",
          url     : "../../../../client/res/templates/email_reminder/file_upload.php",
          dataType  : "json",
          data    : { methodName: "deleteFolder"},
          
          success: function(data)
          {
          }
      });
 });

   $(".addModal").click( function(){
      //alert("Hiiii");
      $('#add-reminder-form').bootstrapValidator('resetForm', true);
      $("#add-reminder-form").trigger("reset");
      $(".file_name_append2").empty();
      CKEDITOR.instances.editor100.setData('');
      
      //$("#addReminderModal").modal("show");
      $("#addReminderModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    });

   // Datetime Picker - Add
  $('.input-group.date100').datepicker({format: "dd/mm/yyyy",autoclose     : true,}); 

    var date_input  = $('input[name="date100"]'); //our date input has the name "date"
    var container   = $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format      : 'dd/mm/yyyy',
      container     : container,
      todayHighlight  : true,
      autoclose     : true,
      
      startDate   : new Date(),
      endDate     : new Date(new Date().setDate(new Date().getDate() + 365))
    });
</script>
<script >

  var count=0;
  function checkDate() {
       
    count++;
    //alert(count);
     if(count=="2"){
     // alert("in if block");
      var selectedText = document.getElementById("date100").value;
      var parts =selectedText.split('/');
      var selectedText= parts[1]+"-"+parts[0]+"-"+parts[2];
      var selectedDate = new Date(selectedText);
      //alert(selectedDate);
      var now = new Date();
      //alert(now);
      now.setDate(now.getDate() - 1);
      
      if (now > selectedDate) {
        $.alert({
          title: 'Alert!',
          content: 'Reminder can not be set for a past date',
          type: 'dark',
                   typeAnimated: true,
                   draggable: false,
        });

        document.getElementById('date100').value='';
        count=0;
      }else{
        count=0;
      }
     }
        $('#add-reminder-form').bootstrapValidator('revalidateField', 'date100');
  }


  function checkTime(){
   // alert(document.getElementById('time100').value);
    var selectedText1 = document.getElementById('date100').value;
   // alert(selectedText1);
    if(selectedText1==""){
      $.alert({
        title: 'Alert!',
        content: 'Please schedule a date for the reminder.',
        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
      });
      // alert("Please select date first");
      document.getElementById('time100').value="";
    }

    var parts1      = selectedText1.split('/');
    var selectedText1   = parts1[1]+"-"+parts1[0]+"-"+parts1[2];
    var selectedDate1   = new Date(selectedText1);
      
   // alert(selectedDate1);    

    var today       = new Date();

    // alert(today);

    var dd1   = selectedDate1.getDate();
    var mm1   = selectedDate1.getMonth()+1; 
    var yyyy1   = selectedDate1.getFullYear();

    var dd    = today.getDate();
    var mm    = today.getMonth()+1; 
    var yyyy  = today.getFullYear();


    if(dd== dd1 && mm==mm1 && yyyy==yyyy1){

      var selectedTime= document.getElementById('time100').value;
      var insertedTime= new Date(selectedTime);

      var strArray= selectedTime.split(':');
      var selHRS= strArray[0];
      var selMints= strArray[1];

      var hrs= today.getHours();
      var mints= today.getMinutes();
      if(hrs>=selHRS){
        
        if(hrs == selHRS){

          if(mints>=selMints ){

            $.alert({
              title: 'Alert!',
              content: 'Reminder can not be set for a past time',
              type: 'dark',
                   typeAnimated: true,
                   draggable: false,
            });

            document.getElementById('time100').value='';
          }
        }else{
        
          $.alert({
            title: 'Alert!',
            content: 'Reminder can not be set for a past time',
            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
          });
          document.getElementById('time100').value='';
        }


      }
    }
        $('#add-reminder-form').bootstrapValidator('revalidateField', 'time100');
  }

    function unLinkfile(event){

      $(event).closest(".emailattachment_remove").remove();
      var deleteFile = $(event).closest("span").attr("data-name");
      $.ajax({
          type    : "GET",
          url     : "../../../../client/res/templates/email_reminder/file_upload.php",
          dataType  : "json",
          data    : { methodName: "delete_current_file", deleteFile: deleteFile},
          
          success: function(data)
          {

          }
      });
      
    }
 
    // Datetime Picker - Add
  $('.input-group.date100').datepicker({format: "dd/mm/yyyy",autoclose:true,}); 

  var date_input  = $('input[name="date100"]'); //our date input has the name "date"
  var container   = $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  date_input.datepicker({
    format      : 'dd/mm/yyyy',
    container     : container,
    todayHighlight  : true,
    autoclose     : true,
    
    startDate   : new Date(),
    endDate     : new Date(new Date().setDate(new Date().getDate() + 365))
  });

  var emailErrorCount = 0;

  function validateMultipleEmailsCommaSeparated1(element) {
    //  alert(element);
//   var toemail = document.getElementById('to').value;
   var toemail = element.value;
//   alert(toemail);
  if(toemail)
  {
    var result = toemail.split(',');
    if(result.length >= 6)
    {
      emailErrorCount = 1;
      $("#emailToMaxFive").css('display','block');
      $('.createEmailReminder').attr('disabled','disabled');
      return false;  
    }
    else
    {
      emailErrorCount = 0;
      $("#emailToMaxFive").css('display','none');
      $('.createEmailReminder').removeAttr('disabled');
      //return true;
    }
    for(var i = 0;i < result.length;i++)
    if(!validateEmail(result[i])) 
    {
      emailErrorCount = 1;
      $("#emailerror").css('display','block');
      //document.getElementById("myBtn").disabled = true;
      $('.createEmailReminder').attr('disabled','disabled');
      return false;  

    }
    emailErrorCount = 0;
    $("#emailerror").css('display','none');
    $('.createEmailReminder').removeAttr('disabled');
    return true;
  }else
  {
    $("#emailerror").css('display','none');
    emailErrorCount = 0;
    $('.createEmailReminder').removeAttr('disabled');
  }
}

 var emailErrorCountCc = 0;

function validateMultipleEmailsCcCommaSeparated1(element) {
  var toemail = element.value;
//   alert(toemail);
  if(toemail)
  {
    var result = toemail.split(',');
    if(result.length >= 6)
    {
      emailErrorCountCc = 1;
      $('.createEmailReminder').attr('disabled','disabled');
      $("#emailCcMaxFive").css('display','block');
      document.getElementById("myBtn").disabled = true;
      return false;  
    }
    else
    {
      emailErrorCountCc = 0;
      $('.createEmailReminder').removeAttr('disabled');
      $("#emailCcMaxFive").css('display','none');
      document.getElementById("myBtn").disabled = false;
    }
    for(var i = 0;i < result.length;i++)
    if(!validateEmail(result[i])) 
    {
      emailErrorCountCc = 1;
      $('.createEmailReminder').attr('disabled','disabled');
      $("#emailccerror").css('display','block');
      document.getElementById("myBtn").disabled = true;
        return false;  

    }
    emailErrorCountCc = 0;
    $('.createEmailReminder').removeAttr('disabled');
    $("#emailccerror").css('display','none');
    document.getElementById("myBtn").disabled = false;
    return true;
  }else
  {
    emailErrorCountCc = 0;
    $('.createEmailReminder').removeAttr('disabled');
    $("#emailccerror").css('display','none');
  }
}


</script>
<script>
  // function mybtnd()
  // {
  //    document.getElementById("myBtn").disabled = false;
  //    console.log('false');
  //   return true;
        
  // }
  $('.clockpicker').clockpicker({
    placement : 'top',
    autoclose: true
  });

  $("#add-reminder-form").bootstrapValidator({
    
    message: 'Please enter valid input',
        feedbackIcons: { },
        excluded: [':disabled'],
        fields: {
            "date100": {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a date for the reminder.'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The date format is not valid'
                    },
                }
            },
            "time100": {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a time for the reminder.'
                    },
                }
            },
            "subject": {
                validators: {
                    Empty: {
                        message: 'Please enter subject.'
                    },
                }
            },
            "to": {
               validators: {
                    notEmpty: {
                        message: 'Please enter recipient e-mail id for the reminder.'
                    },
                }
            },
            "add_emailReminder_send_email": {
               validators: {
                    notEmpty: {
                        message: 'Please select one option.'
                    },
                }
            },            
        },

  }).on('success.form.bv', function (event, data) {

      if( emailErrorCount == 1 || emailErrorCountCc == 1) { console.log('false'); return false; }
    
      CKEDITOR.instances.editor100.updateElement();
      //pase time server side validation
      var selectedText1 = document.getElementById('date100').value;
      if(selectedText1)
      {
          var parts1      = selectedText1.split('/');
          var selectedText1   = parts1[1]+"-"+parts1[0]+"-"+parts1[2];
          var selectedDate1   = new Date(selectedText1);
          
          var today       = new Date();
          var dd1   = selectedDate1.getDate();
          var mm1   = selectedDate1.getMonth()+1; 
          var yyyy1   = selectedDate1.getFullYear();

          var dd    = today.getDate();
          var mm    = today.getMonth()+1; 
          var yyyy  = today.getFullYear();

          if(dd== dd1 && mm==mm1 && yyyy==yyyy1)
          {
            // time validation
            var selectedTime= document.getElementById('time100').value;
            var insertedTime= new Date(selectedTime);

            var strArray= selectedTime.split(':');
            var selHRS= strArray[0];
            var selMints= strArray[1];

            var hrs= today.getHours();
            var mints= today.getMinutes();
            if(hrs>=selHRS){
              
              if(hrs == selHRS){

                if(mints>=selMints ){

                  $.alert({
                    title: 'Alert!',
                    content: 'Reminder can not be set for a past time',
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                  });

                  document.getElementById('time100').value='';

                  return false;
                }
              }else{
              
                $.alert({
                  title: 'Alert!',
                  content: 'Reminder can not be set for a past time',
                  type: 'dark',
                  typeAnimated: true,
                });
                document.getElementById('time100').value='';

                return false;
              }
            }
          }
      }

    event.preventDefault();

    var form  = $(this);
    var url   = form.attr('action');
    form      = new FormData(form[0]);
    jQuery.each(jQuery('#file-input')[0].files, function(i, file) {
      form.append('attachment['+i+']', file);
    });  

    function submit(){

      // show loader
      $(".email-loader").show();
      $(".email-blur-effect").show();

     $.ajax({
      type    : "POST",
      url     : url,
      data    : form,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
        // console.log(data);
          $(".loader").hide();
        if(data.status == 'true'){
          $.alert({
            title: 'Success!',
            content: data.msg,
            type: 'dark',
            typeAnimated: true,
            draggable: false,
            buttons: {
              OK: function () {
                  // $.alert('Confirmed!');
                   $("#addReminderModal").modal("hide");

                   //hide date & time & reset bootstrap 
                   $("#add_email_reminderDateTime").addClass('hidden');
                   
                   $('#add-reminder-form').bootstrapValidator('resetForm', true);
                   $('button[data-action="reset"]').trigger('click');
                   $(".file_name_append2").html("");
                   $("#date100").datepicker('setDate', null);
              },
            }
          });
         
          // setInterval(function(){ 
          //   window.location.reload();
          // }, 2000);
         //$(".loader").hide();
        }else{
          $.alert({
            title: 'Alert!',
            content: data.msg,
            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
          });
        }

        //hide loader
         $(".email-loader").hide();
         $(".email-blur-effect").hide();
      }
    });
       // var check = confirm("Do you want to schedule without any subject?");
  }

    var subject = document.getElementById('subject11').value;
    var body = document.getElementById('editor100').value;
    if(!subject || !body)
    {
      if(!subject){
         $.alert({
            title: 'Alert!',
            content: "Do you want to schedule without any subject?",
            type: 'dark',
            typeAnimated: true,
            draggable: false,
            async : false,
            buttons: {
              OK: function () {
                  if(!body){
                    $.alert({
                    title: 'Alert!',
                    content: "Do you want to schedule without any Message?",
                    type: 'dark',
                    typeAnimated: true,
                    buttons: {
                      OK: function () {
                            submit();
                      },

                      CANCEL: function(){
                        
                        document.getElementById("editor100").focus();
                        document.getElementById("myBtn").disabled = false;
                        
                      },
              
                    }
                    });
                  }else{
                    submit();
                  }
                  

              },

              CANCEL: function(){
                
                document.getElementById("subject11").focus();
                document.getElementById("myBtn").disabled = false;
                
      },
              
          }
            });
      }else if(!body){
        $.alert({
        title: 'Alert!',
        content: "Do you want to schedule without any Message?",
        type: 'dark',
        typeAnimated: true,
        buttons: {
          OK: function () {
                submit();
          },

          CANCEL: function(){
            
            document.getElementById("editor100").focus();
            document.getElementById("myBtn").disabled = false;
            
          },
              
        }
        });
      }else{
            submit();
      }

      
      // if(!check)
      // {
      //   document.getElementById("subject11").focus();
      //   document.getElementById("myBtn").disabled = false;
      //   return false;
      // }
    }else{
      submit();
    }   

    
        
    return false;
  });
  function validateEmail(field) {
    var regex=/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i;
    return (regex.test(field)) ? true : false;
}

function validateMultipleEmailsCommaSeparated(element) {
  var toemail = document.getElementById('to').value;
  if(toemail)
  {
    var result = toemail.split(',');
    for(var i = 0;i < result.length;i++)
    if(!validateEmail(result[i])) 
    {
      $("#emailerror").css('display','block');
      document.getElementById("myBtn").disabled = true;
        return false;  

    }
    $("#emailerror").css('display','none');
    document.getElementById("myBtn").disabled = false;
    return true;
  }
}

function validateMultipleEmailsCcCommaSeparated(element) {
  var toemail = document.getElementById('cc').value;
  if(toemail)
  {
    var result = toemail.split(',');
    for(var i = 0;i < result.length;i++)
    if(!validateEmail(result[i])) 
    {
      $("#emailccerror").css('display','block');
      document.getElementById("myBtn").disabled = true;
        return false;  

    }
    $("#emailccerror").css('display','none');
    document.getElementById("myBtn").disabled = false;
    return true;
  }
}

/* Select send email option in add Email reminder Start */
$(".add_emailReminder_showDateTime").click( function(){
$("#add_email_reminderDateTime").removeClass('hidden');
$('#add-reminder-form').bootstrapValidator('enableFieldValidators', 'date100', true);
$('#add-reminder-form').bootstrapValidator('enableFieldValidators', 'time100', true);
$("#add_email_reminderDateTime .input-group-addon").css({'background-color':'transparent','border-color':'#d1d5d6','color':'#0a6783 !important'});
    $("#add_email_reminderDateTime .form-control").css({'border':' 1px solid #d1d5d6','box-shadow':'unset'});
});

$(".add_emailReminder_hideDateTime").click( function(){
$("#add_email_reminderDateTime").addClass('hidden');
$('#add-reminder-form').bootstrapValidator('enableFieldValidators', 'date100', false);
$('#add-reminder-form').bootstrapValidator('enableFieldValidators', 'time100', false);
});

/* Select send email option in add Email reminder End */
</script>
<!-- Email Reminder Scripts  start-->

<!-- SMS REMINDER SCRIPT -->
<script type="text/javascript">
  //Hide jquery validation errors while clicking on close modal

  $('.email_close').click(function(){
    $('#emailerror').hide();
    $('#emailToMaxFive').hide();
    $('#emailccerror').hide();
    $('#emailCcMaxFive').hide();
    $('#add_email_reminderDateTime').addClass('hidden');
  });


 // Modal open for add remainder
  $(".addSmsModal").click( function(){
    $("#add-sms-reminder-form").trigger("reset");
    $('#add-sms-reminder-form').bootstrapValidator('resetForm', true);
    //$("#addSmsReminderModal").modal("show");
    $("#addSmsReminderModal").modal({
        backdrop: 'static',
        keyboard: false
    });

    $("#Add_showDateTimeInput1").closest('.form-group').removeClass('has-success');

    $(".Add_smsBodyLenght").html('0');
    $(".Add_smscount").html('0');

    $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/sms_reminder/getSmsSenderId.php",
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         if(data){

           $("#smscontent_template").html('');
           $("#smscontent_template").html('<option value="" > Select Content Template </option>');

           $("#smssenderid").html('');
           $("#smssenderid").html('<option value="" > Select Sender ID </option>');

           if(data.senderIds){
               $.each(data.senderIds, function (key, val) {
                  $("#smssenderid").append('<option value="'+val+'" >'+key+' </option>');
               });
           }

           $("#smssenderid, #smscontent_template").customA11ySelect('refresh');
           $('#smssenderid-button,#smscontent_template-button').addClass('form-control');

           $('#add-sms-reminder-form').bootstrapValidator('addField', 'smssenderid', {
                validators: {
                    notEmpty: {
                        message: 'Please select sender id.'
                    }
                }
            });

           $("#Add_showDateTimeInput1").css('display','none');

           $(".addSmsReminderError").html(data.errorMessage);
         }
      }
    });
  });

  // $('#addSmsReminderModal').on('hide.bs.modal', function(){
  $(document).on('click','#addSmsReminderModal .close', function(){
            $(this).removeData('bs.modal');
            $('.cell').removeClass('has-success');
            $('.cell').removeClass('has-error');
            $('.cell .help-block').hide();
            $('.SMS_error_main').hide();
            $('#Add_showDateTimeInput').hide();
            $('.add-sms-reminder-form').bootstrapValidator('resetForm', true);
            $("#smscontent_template, #smssenderid").customA11ySelect('refresh');
        });


  //Select validation add sms reminder start

  $("#smscontent_template, #smssenderid").customA11ySelect();

  $(".SMS_showDateTime").click( function(){
    $("#Add_showDateTimeInput1").css('display','block');
    $('#add-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'smsDate1', true); 
    $('#add-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'smsTime1', true);
    $("#Add_showDateTimeInput1 .input-group-addon").css({'background-color':'transparent','border-color':'#d1d5d6','color':'#0a6783 !important'});
    $("#Add_showDateTimeInput1 .form-control").css({'border':' 1px solid #d1d5d6','box-shadow':'unset'});
  });

  $(".SMS_hideDateTime").click( function(){
    $("#Add_showDateTimeInput1").css('display','none');
    $('#add-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'smsDate1', false);
    $('#add-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'smsTime1', false);
  });

// SMS Datetime Picker -Set Scroll position

    $("#addSmsReminderModal, #addReminderModal").scroll(function() {
        var add_clockpicker=$("input[class$='clockpicker_position']");
        if(add_clockpicker.length)
        {
        var topPos = add_clockpicker.offset().top;
        var leftPos = add_clockpicker.offset().left;
        $(".popover").css("top", topPos-270);
        $(".popover").css("left", leftPos);
        }

        var add_date=$("input[class$='date_position']");
        if(add_date.length)
        {
        var date_topPos = add_date.offset().top;
        var date_leftPos = add_date.offset().left;
        $(".datepicker").css("top", date_topPos-215);
        $(".datepicker").css("left", date_leftPos);
        }
    });

    $("#sendSMS").scroll(function() {
        var add_clockpicker=$("input[class$='clockpicker_position']");
        if(add_clockpicker.length)
        {
        var topPos = add_clockpicker.offset().top;
        var leftPos = add_clockpicker.offset().left;
        $(".popover").css("top", topPos-270);
        $(".popover").css("left", leftPos);
        }

        var add_date=$("input[class$='date_position']");
        if(add_date.length)
        {
        var date_topPos = add_date.offset().top;
        var date_leftPos = add_date.offset().left;
        $(".datepicker").css("top", date_topPos-220);
        $(".datepicker").css("left", date_leftPos);
        }
    });



    // clockpicker adjust position on

    function getEvent(e){
      $(".smsTime1, .time100, .send_sms_time").removeClass("clockpicker_position");
      $(e).addClass("clockpicker_position");
    }

    // Datepicker adjust position on

    function getDateEvent(e){
    $(".smsDate1, .date100, .send_sms_date").removeClass("date_position");
    $(e).addClass("date_position");
  }

  // SMS Datetime Picker - Add
  $('.input-group .smsDate1').datepicker({format: "dd/mm/yyyy",autoclose:true,todayHighlight:true}); 

  var sms_date_input1   = $('input[name="smsDate1"]'); //our date input has the name "date"
  var sms_container1    = $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  sms_date_input1.datepicker({
    format      : 'dd/mm/yyyy',
    container     : sms_container1,
    todayHighlight  : true,
    autoclose     : true,
   
    startDate   : new Date(),
    endDate     : new Date(new Date().setDate(new Date().getDate() + 365))
  });


   function smsTimeCheck1(){
        var selectedText1 = document.getElementById('smsDate1').value;
    
        if(selectedText1==""){
            $.alert({
                title: 'Alert!',
                content: 'Please select date first',
                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
            });
            // alert("Please select date first");
            document.getElementById('smsTime1').value="";
        }
    
        var parts1 =selectedText1.split('/');
        var selectedText1= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
        //alert(selectedText1);
        var selectedDate1 = new Date(selectedText1);
        //alert(selectedDate1); 
        var today = new Date();
        //alert(today);
        
        var dd1= selectedDate1.getDate();
        var mm1 = selectedDate1.getMonth()+1; 
        var yyyy1 = selectedDate1.getFullYear();
        
        var dd = today.getDate();
        var mm = today.getMonth()+1; 
        var yyyy = today.getFullYear();
    
  
      if(dd== dd1 && mm==mm1 && yyyy==yyyy1){
      //alert("You have seleted todays date");

      var selectedTime  = document.getElementById('smsTime1').value;
      var insertedTime  = new Date(selectedTime);
      //alert(selectedTime);
      var strArray  = selectedTime.split(':');

      var selHRS    = strArray[0];
      var selMints  = strArray[1];

      var hrs     = today.getHours();
      var mints     = today.getMinutes();
      
      
      if(hrs>=selHRS){
      
        if(hrs == selHRS){
          
            if(mints>selMints){
            
              $.alert({
                  title: 'Alert!',
                  content: 'Reminder can not be set for a past time',
                  type: 'dark',
                   typeAnimated: true,
                   draggable: false,
              });
              document.getElementById('smsTime1').value='';
            }

        }else{

            $.alert({
                title: 'Alert!',
                content: 'Reminder can not be set for a past time',
                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
            });
            document.getElementById('smsTime1').value='';
        }


      }
    }

    $('#add-sms-reminder-form').bootstrapValidator('revalidateField', 'smsTime1');
    }


  function smsDatecheck1() {

      var selectedText = document.getElementById("smsDate1").value;
      var parts =selectedText.split('/');
      var selectedText= parts[1]+"-"+parts[0]+"-"+parts[2];
      var selectedDate = new Date(selectedText);
      var now = new Date();
     
      now.setDate(now.getDate() - 1);
      
      if (now > selectedDate) {
        
        $.alert({
              title: 'Alert!',
              content: 'Reminder can not be set for a past date',
              type: 'dark',
                   typeAnimated: true,
                   draggable: false,
          });
        document.getElementById('smsDate1').value='';
      }

      $('#add-sms-reminder-form').bootstrapValidator('revalidateField', 'smsDate1');
    }

    //Added  select dropdown validation in add sma reminder start

    $("#add-sms-reminder-form #save_sms_reminder").click(function(){
       var SMS_content_type2 = $("#smscontent_template-button span").text();
       var SMS_Sender_Id2 = $("#smssenderid-button span").text();
      if(SMS_content_type2 == "Select Content Template" ) {
        $("#smscontent_template").parent('.field').find('.SMS_error_main').css("display","inline-block");
      }else{
        $("#smscontent_template").parent('.field').find('.SMS_error_main').css("display","none");
      } 

      if( SMS_Sender_Id2 == "Select Sender id"){
         $("#smssenderid").parent('.field').find('.SMS_error_main').css("display","inline-block");
         //alert($("#smssenderid").parent('.field').find('.SMS_error_main').text());
      } else{
        $("#smssenderid").parent('.field').find('.SMS_error_main').css("display","none");
      } 
    });

    /*$(document).on("change","#smssenderid",function(){
       var SMS_Sender_Id = $(this).val();
      if( SMS_Sender_Id == ""){
         $("#smssenderid").parent('.field').find('.SMS_error_main').css("display","inline-block");
         //alert($("#smssenderid").parent('.field').find('.SMS_error_main').text());
      } else{
        $("#smssenderid").parent('.field').find('.SMS_error_main').css("display","none");
      } 
    });

    $(document).on("change","#smscontent_template",function(){
       var SMS_content_type1 = $(this).val();
      if(SMS_content_type1 == "" ) {
        $("#smscontent_template").parent('.field').find('.SMS_error_main').css("display","inline-block");
      }else{
        $("#smscontent_template").parent('.field').find('.SMS_error_main').css("display","none");
      } 
    });*/


    //Added  select dropdown validation in add sma reminder End


    // ADD SMS Reminder Count Characters in textarea on type
    var Add_SMSCount = 1;
    var Add_smsBodyLenght1 = 0;
    $('#smsBody1').on("keyup", function(event_sms) {
     Add_smsBodyLenght1 = $(this).val().length;

     if(Add_SMSCount == 0){
        Add_SMSCount = 1;
     }

    $(".Add_smsBodyLenght").html(Add_smsBodyLenght1);
    if(Add_smsBodyLenght1%160 == 0){
      if (event_sms.keyCode == 8 || event_sms.keyCode == 46) {
        if (Add_SMSCount >=1){
          Add_SMSCount--;
        }
          
         event_sms.preventDefault();
      }
      else{
      Add_SMSCount++;
      }
    }
      $(".Add_smscount").html(Add_SMSCount); 

    });


    $("#add-sms-reminder-form").bootstrapValidator({
    
    message: 'Please enter valid input',
        feedbackIcons: { },
        excluded: [':disabled'],
        fields: {
            "smsDate1": {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a date for the reminder.'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The date format is not valid'
                    },
                }
            },
            "smsTime1": {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a time for the reminder.'
                    },
                }
            },
            "smsMobileNo1": {
                validators: {
                    notEmpty: {
                        message: 'Please enter recipient mobile number for the reminder.'
                    },
                }
            },
            "smsBody1": {
                validators: {
                    notEmpty: {
                        message: 'Please enter a reminder message. '
                    },
                }
            },
            "add_send_sms": {
                validators: {
                    notEmpty: {
                        message: 'Please select one option.'
                    },
                }
            },
            "smssenderid": {
                validators: {
                    notEmpty: {
                        message: 'Please select sender id.'
                    },
                }
            },
            "smscontent_template": {
                validators: {
                    notEmpty: {
                        message: 'Please select content template.'
                    },
                }
            },
        },

  }).on('success.form.bv', function (event, data) {
    
    $(".loader").show();
    //pase time server side validation

      var selectedText1 = document.getElementById('smsDate1').value;
      var sendSmsTypeAdd = $('input[name=add_send_sms]:checked', '#add-sms-reminder-form').val();

      if(selectedText1 && sendSmsTypeAdd =='sms_date')
      {
          var parts1      = selectedText1.split('/');
          var selectedText1   = parts1[1]+"-"+parts1[0]+"-"+parts1[2];
          var selectedDate1   = new Date(selectedText1);
          
          var today       = new Date();
          var dd1   = selectedDate1.getDate();
          var mm1   = selectedDate1.getMonth()+1; 
          var yyyy1   = selectedDate1.getFullYear();

          var dd    = today.getDate();
          var mm    = today.getMonth()+1; 
          var yyyy  = today.getFullYear();

          if(dd== dd1 && mm==mm1 && yyyy==yyyy1)
          {
            var selectedTime  = document.getElementById('smsTime1').value;
            var insertedTime  = new Date(selectedTime);
            //alert(selectedTime);
            var strArray  = selectedTime.split(':');

            var selHRS    = strArray[0];
            var selMints  = strArray[1];

            var hrs     = today.getHours();
            var mints     = today.getMinutes();
            
            
            if(hrs>=selHRS){
            
              if(hrs == selHRS){
                
                  if(mints>=selMints){
                  
                    $.alert({
                        title: 'Alert!',
                        content: 'Reminder can not be set for a past time',
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                    });
                    document.getElementById('smsTime1').value='';
                    return false;
                  }

              }else{

                  $.alert({
                      title: 'Alert!',
                      content: 'Reminder can not be set for a past time',
                      type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                  });
                  document.getElementById('smsTime1').value='';
                  return false;
              }


            }
          }
      }

    // Prevent form submission
    event.preventDefault();

    var form  = $(this);
    var url   = form.attr('action');
    form      = new FormData(form[0]);

    $.ajax({
      type    : "POST",
      url     : url,
      data    : form,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
        // console.log(data);
        $(".loader").hide();
        if(data.status == 'true'){
          $.alert({
            title: 'Success!',
            content: data.msg,
            type: 'dark',
            typeAnimated: true,
            draggable: false,
            buttons: {
              OK: function () {
                   // $(function () {
                   //    $("#addSmsReminderModal").modal("hide");
                   //  });
                   $("#addSmsReminderModal .close").click();
                   $('button[data-action="reset"]').trigger('click');
                   $("#Add_showDateTimeInput").css('display','none');
                   $('#add-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'smsDate1', false);
                   $('#add-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'smsTime1', false);
                    $("#smsDate1").datepicker('setDate', null);
              },
              
            }
          });
        }else{
          $.alert({
            title: 'Alert!',
            content: data.msg,
            type: 'dark',
            typeAnimated: true,
            draggable: false,
          });
        }
      }
    });

    return false;
  });
</script>
<!-- SMS REMINDER SCRIPT -->


<!-- Manage Billing Entity  Start-->
<script>
  /*$(function(){
    $("#create_billing_entity").on('click', function(){
      $('.modal-body').load('../../client/res/templates/financial_changes/create_billing_entity_form.php',function(){
        $('#billing_entity').modal({show:true});
      });
    });
  });*/
</script>
<script>
  var count1=0;

    $(document).on("click", "#Add_billingentityaddress", function(){

      $("#addressRow_billingentity").append('<div id="billentaddr'+count1+'" class="col-md-12"><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_address_street[]" id="" class="form-control" placeholder="Street" maxlength="56" required></div></div><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_address_city[]" id="" class="form-control" placeholder="City" maxlength="56" required></div></div><div class="col-md-3"><div class="form-group"><select value="" name="billingentity_address_state[]" id="billingentity_address_state" class="form-control" placeholder="State" required><option value="">Select State</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu and Kashmir">Jammu and Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Odisha">Odisha</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Tripura">Tripura</option><option value="Uttarakhand">Uttarakhand</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="West Bengal">West Bengal</option><option value="Andaman & Nicobar">Andaman & Nicobar</option><option value="Chandigarh">Chandigarh</option><option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman and Diu">Daman and Diu</option><option value="Delhi">Delhi</option><option value="Lakshadweep">Lakshadweep</option><option value="Pondicherry">Pondicherry</option></select></div></div><div class="col-md-3"><div class="form-group"><input type="text" value="" name="billingentity_address_postal_code[]" id="billingentity_address_postal_code1'+count1+'" class="form-control postal_code" placeholder="Postal Code" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required onchange="postal_code1()"></div></div><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_address_country[]" id="" class="form-control" placeholder="Country" maxlength="56" required></div></div><button class="btn btn-primary btnUpdate2" data-update-id2="'+count1+'" id="remove_field2'+count1+'" style="margin-bottom:10px;">Remove Item</button></div>');

        count1++;

        var n=0;
        $(".btnUpdate2").on("click",function(e)
        {
          e.stopImmediatePropagation();
          if(n==2){
            var id2 =$(this).data("update-id2");

            $.confirm({
              title: 'Warning',
              content: 'Do you want to remove address?',
              type: 'dark',
              typeAnimated: true,
              draggable: false,
              buttons: {
                  Ok: function () {
                      $("#billentaddr"+id2).remove();
                  },
                  Cancel: function () {

                  }
              }
            });
            n=0;
          }n++;
        });
      });
</script>
<script>
  var cnt1=2;
  var count1=0;
  var count_1=1;
  
    $(document).on("click", "#Add_billingentitybankdetails", function(){

      $("#bankDetRow_billingentity").append('<div id="billentbank'+count1+'" class="col-md-12"><div class="row"><div class="col-md-6"><div class="form-group"><label>Bank Account '+cnt1+'</label></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_bank_beneficiary[]" data-id="'+count1+'" id="billingentity_bank_beneficiary'+count_1+'" class="form-control" placeholder="Beneficiary name" maxlength="56" onblur="checkBankValidation('+count_1+')"></div></div><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_bank_name[]" data-id="'+count1+'" id="billingentity_bank_name'+count_1+'" class="form-control" placeholder="Bank name" maxlength="56" onblur="checkBankValidation('+count_1+')"></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_bank_ifc[]" data-id="'+count1+'" id="billingentity_bank_ifc'+count_1+'" class="form-control" placeholder="IFSC Code" maxlength="56" onblur="checkBankValidation('+count_1+')"></div></div><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_bank_accountno[]" data-id="'+count1+'" id="billingentity_bank_accountno'+count_1+'" class="form-control" placeholder="Account No." maxlength="56"onkeypress="return event.charCode >= 48 && event.charCode <= 57" onblur="checkBankValidation('+count_1+')"></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><select value="" name="billingentity_bank_accounttype[]" data-id="'+count1+'" id="billingentity_bank_accounttype'+count_1+'" class="form-control" placeholder="Account type" onchange="checkBankValidation('+count_1+')"><option value="">Select Account Type</option><option value="Savings">Savings</option><option value="Current">Current</option><option value="Cash Credit">Cash Credit</option><option value="Overdraft">Overdraft</option></select></div></div><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_bank_upi[]" id="billingentity_bank_upi'+count_1+'" class="form-control" placeholder="UPI ID" maxlength="56"></div></div></div><button class="btn btn-primary btnUpdate3" data-update-id3="'+count1+'" id="remove_field3'+count1+'" style="margin-bottom:10px;">Remove Bank</button></div>');

      count1++;
      cnt1++;
      count_1++;

      var n=0;
      $(".btnUpdate3").on("click",function(e)
      {
        e.stopImmediatePropagation();
        if(n==2){
          var id2 =$(this).data("update-id3");

          $.confirm({
            title: 'Warning',
            content: 'Do you want to remove bank details?',
            type: 'dark',
            typeAnimated: true,
            draggable: false,
            buttons: {
                Ok: function () {
                    $("#billentbank"+id2).remove();
                },
                Cancel: function () {

                }
            }
          });
          n=0;
        }n++;
      });
    });
</script>


<script>
  var cnt2=2;
  var count1=0;
  var count_1=1;
    
    $(document).on("click", "#Add_billingentitygst", function() {

      $("#gstDetRow_billingentity").append('<div id="billentgst'+count1+'" class="col-md-12"><div class="row"><div class="col-md-6"><div class="form-group"><label >GST '+(cnt2)+'</label><input type="text" value="" name="billingentity_gst[]" data-id="'+count_1+'" id="" class="form-control" placeholder="GST NO" maxlength="56" onblur="getGST_state(this.value, '+count_1+')"></div></div><div class="cell col-sm-6 form-group" data-name="billingEntityGSTAddress"><label class="control-label" data-name="billingEntityGSTAddress"><span class="label-text">Address '+(cnt2)+'</span></label><div class="field" data-name="billingEntityGSTAddress"><textarea class="form-control auto-height" data-id="billingEntityGSTAddressStreet'+count_1+'" name="billingEntityGSTAddressStreet[]" rows="1" placeholder="Street" autocomplete="espo-street" maxlength="255"></textarea><div class="row"><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" data-id="billingEntityGSTAddressCity'+count_1+'" data-name="billingEntityGSTAddressCity" name="billingEntityGSTAddressCity[]" value="" placeholder="City" autocomplete="espo-city" maxlength="255"></div><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" id="billingEntityGSTAddressState'+count_1+'" data-id="billingEntityGSTAddressState'+count_1+'" data-name="billingEntityGSTAddressState" name="billingEntityGSTAddressState[]" value="" placeholder="State" autocomplete="espo-state" maxlength="255"></div><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" data-id="billingEntityGSTAddressPostalCode'+count_1+'" data-name="billingEntityGSTAddressPostalCode" name="billingEntityGSTAddressPostalCode[]" value="" placeholder="Postal Code" autocomplete="espo-postalCode" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></div></div></div></div></div><button class="btn btn-primary btnUpdate4" data-update-id4="'+count1+'" id="remove_field4'+count1+'" style="margin-bottom:10px;">Remove Item</button></div>');

      count1++;
      cnt2++;

      var n=0;
      $(".btnUpdate4").on("click",function(e)
      {
        e.stopImmediatePropagation();
        if(n==2){
          var id4 =$(this).data("update-id4");

          $.confirm({
            title: 'Warning',
            content: 'Do you want to remove gst details?',
            type: 'dark',
            typeAnimated: true,
            draggable: false,
            buttons: {
                Ok: function () {
                    $("#billentgst"+id4).remove();
                },
                Cancel: function () {

                }
            }
          });
          n=0;
        }n++;
      });
    });
</script>


<script type="text/javascript">

var cnt1=2;
var count1=0;
var count_1=1;

var backaccounthead = 1;

label_count_add(1);

function label_count_add(no)
{
  $(".main_bank_deatils .panel-body .bank_title").text("");  

  for(var t=0;t<no;t++)
  {
    var s=t+1;
    $(".main_bank_deatils .panel-body").eq(t).find(".bank_title").text("Bank Account "+s);
  }


}

function label_count_gst(no)
{
  $(".GST_details_Panel .GST_added_panel .gst_bank_title").text("");  

  for(var t=0;t<no;t++)
  {
    var s=t+1;
    $(".GST_details_Panel .GST_added_panel").eq(t).find(".gst_bank_title").text("GST "+s);
  }


}


  function create_add_more_bank()
  {
    var check = add_more_validation();
    if (!check) {
        //My change 
        backaccounthead++;

        $(".main_bank_deatils").append('<div class="panel-body panel-body-form bank-append"><div class="addbankdetails1"><div class="row"><div class="col-md-12"><div class="panel-heading"style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;"><h4 class="panel-title text-uppercase bank_title" style="display:inline-block;"></h4><button type="button" class="btn btn-danger bank_deleteBtn pull-right"><span class="material-icons-outlined">close</span></button></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group Beneficiary_group"><label for="">Beneficiary Name</label><input type="text" name="billingentity_bank_beneficiary[]" value="" class="form-control beneficiary_nm" placeholder="Beneficiary Name"><span class="temp-error display_none text-danger">Please enter beneficiary name</span></div></div><div class="col-sm-6 col-md-6"><div class="form-group bankName_group"><label for="">Name of Bank</label><input type="text" value="" class="form-control bank_nm" placeholder="Bank name" name="billingentity_bank_name[]"><span class="temp-error display_none text-danger">Please enter bank name</span></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group IFSC_group"><label for="">IFSC Code</label><input type="text" name="billingentity_bank_ifc[]" value="" class="form-control bank_ifsc" placeholder="IFSC Code"><span class="temp-error display_none text-danger">Please enter IFSC code</span></div></div><div class="col-sm-6 col-md-6"><div class="form-group account_group"><label for="">Account No.</label><input type="text" name="billingentity_bank_accountno[]" value="" class="form-control bank_ano" placeholder="Account No." onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"><span class="temp-error display_none text-danger">Please enter account no.</span></div></div></div><div class="row"><div class="col-md-6"><div class="form-group accounttype_group"><label>Account Type</label><select class="form-control bank_account_type" name="billingentity_bank_accounttype[]"><option value="">Select Account Type</option><option value="Saving">Saving</option><option value="Current">Current</option><option value="Cash Credit">Cash Credit</option><option value="Overdraft">Overdraft</option></select><span class="temp-error display_none text-danger">Please select account type</span></div></div><div class="col-md-6"><div class="form-group UPI_group"><label for="">UPI ID</label><input type="text" name="billingentity_bank_upi[]" class="form-control bank_upiId" placeholder="UPI ID"><span class="temp-error display_none text-danger">Please enter UPI id</span></div></div></div></div></div>');

        var length = $(".main_bank_deatils .panel-body").length;

        $(".main_bank_deatils .panel-body:last-child .bank_account_type").customA11ySelect();


        if (length > 0) {
            $(".main_bank_deatils .panel-body").eq(0).find(".bank_deleteBtn").css("display", "inline-block");
        }
        label_count_add(length);


    }



    count1++;
    cnt1++;
    count_1++;
}


/*delete panel*/
/*$(document).on('click','.bank_deleteBtn',function(){

// function delete_panel(element) {
    //My change
    $(element).closest(".panel-body").remove();
    // backaccounthead--;
    var length = $(".main_bank_deatils .panel-body").length;
    if (length <= 1) {
        $(".main_bank_deatils .panel-body").eq(0).find(".bank_deleteBtn").css("display", "none")

    }

    label_count_add(length);

});*/
$(document).on('click','.bank_deleteBtn',function(){
// function delete_panel(element) {
    // My change
    $(this).closest(".panel-body").remove();
    // backaccounthead--;
    var length1 = $(".main_bank_deatils .panel-body").length;
    if (length1 <= 1) {
        $(".main_bank_deatils .panel-body").eq(0).find(".bank_deleteBtn").css("display", "none")
    }
    label_count_add(length1);

// }
});

var cnt2=2;
var count1=0;
var count_1=1;

var gst_label = 1;

function create_gst_add_more()
{

    var check = gst_validation();

    if (!check) {

        gst_label++;

        $(".GST_details_Panel").append('<div class="GST_added_panel"><div class="row"><div class="col-md-12"><button type="button" class="btn btn-danger GST_deleteBtn pull-right" onclick="delete_gst_panel(this)"><span class="material-icons-outlined">close</span></button></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group gst_no_group"><label for="" class="gst_bank_title"></label><input type="text" name="billingentity_gst[]" class="form-control gst_deatils_GST_1" placeholder="GST No" onblur="getGST_state(this.value, '+count_1+')" onchange="create_gst(this)" ><span class="temp-error display_none text-danger">Please enter GST no</span></div></div><div class="col-sm-6 col-md-6"><div class="form-group gst_addr_group"><label>Address</label><input type="text" name="billingEntityGSTAddressStreet[]" class="form-control gst_addr" placeholder="Street" maxlength="56"> <span class="temp-error display_none text-danger">Please enter your address</span></div><div class="row"><div class="col-md-4"style="padding-right: 0px;"><div class="form-group gst_city_group"><input type="text" name="billingEntityGSTAddressCity[]" class="form-control gst_city" placeholder="City"> <span class="temp-error display_none text-danger">Please enter city</span></div></div><div class="col-md-4"style="padding-right: 0px;"><div class="form-group gst_state_group" ><input type="text" class="form-control gst_state_edit" id="gst_state'+count_1+'" data-id="billingEntityGSTAddressState'+count_1+'" data-name="billingEntityGSTAddressState" name="billingEntityGSTAddressState[]" value="" placeholder="State" autocomplete="espo-state" maxlength="255"><span class="temp-error display_none text-danger">Please enter state</span></div></div><div class="col-md-4"><div class="form-group gst_postal_group"><input type="text" name="billingEntityGSTAddressPostalCode[]" class="form-control GST_Details_postal_code gst_postal_code" placeholder="Postal Code" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> <span class="temp-error display_none text-danger">Please enter postal code</span><span class="digit-temp-error display_none text-danger">Please enter 6 digits postal code</span></div></div></div></div></div></div>');

        $("#main_gst_deatils .GST_details_Panel .GST_added_panel:last-child .gst_state").customA11ySelect();


        var length = $(".GST_details_Panel .GST_added_panel").length;

        if (length > 0) {
            $("#main_gst_deatils .GST_details_Panel .GST_added_panel").eq(0).find(".GST_deleteBtn").css("display", "inline-block");

        }

    label_count_gst(length);

    }
    cnt2++;
    count1++;
    count_1++;
}

/*delete GST Details panel*/

function delete_gst_panel(element) {
    var length = $(".GST_details_Panel .GST_added_panel").length;

    var len="";

    if (length == 1) {
        $("#main_gst_deatils").hide();
        $("#main_GSTIN_fields").show();
        $("input[name='optradio']").prop('checked', false);
        $("#optradio_no").prop('checked', true);
    } else {
        $(element).closest(".GST_added_panel").remove();
        gst_label--;
    }
    label_count_gst(length);

}

  
</script>


<script type = "text/javascript" >
    $(".Select_state").customA11ySelect();
$(".bank_account_type").customA11ySelect();

$('#main_gst_deatils').hide();

$("#GSTIN_fields input[type='radio']").click(function() {
    var radio_btn_value = $(this).closest('.form-check-label').text();
    if (radio_btn_value == " Yes") {

   var g=$(".GST_details_Panel .GST_added_panel").length;

   $(".GST_details_Panel .GST_added_panel .temp-error,.GST_added_panel .digit-temp-error").addClass("display_none");

   $(".GST_details_Panel .GST_added_panel input").val("");

   if(g==0)
   {
    $('.GST_details_Panel').append('<div class="GST_added_panel"><div class="row"><div class="col-md-12"><button type="button" class="btn btn-danger GST_deleteBtn pull-right" onclick="delete_gst_panel(this)" style=""><span class="material-icons-outlined">close</span></button></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group gst_no_group"><label for="" class="gst_bank_title">GST 1</label><input type="text" name="billingentity_gst[]" class="form-control gst_deatils_GST_1" placeholder="GST No" onblur="getGST_state(this.value, 0);" onchange="create_gst(this)"><span class="temp-error display_none text-danger">Please enter GST no</span></div></div><div class="col-sm-6   col-md-6"><div class="form-group gst_addr_group"><label >Address</label><input type="text" name="billingEntityGSTAddressStreet[]" class="form-control gst_addr" placeholder="Street" maxlength="56"><span class="temp-error display_none text-danger">Please enter your address</span></div><div class="row"><div class="col-md-4" style="padding-right: 0px;"><div class="form-group gst_city_group"><input type="text" name="billingEntityGSTAddressCity[]" class="form-control gst_city" placeholder="City" ><span class="temp-error display_none text-danger">Please enter city</span></div></div><div class="col-md-4" style="padding-right: 0px;"><div class="form-group gst_state_group"><input type="text" class="form-control gst_state_edit" id="gst_state0" data-id="billingEntityGSTAddressState0" data-name="billingEntityGSTAddressState[]" name="billingEntityGSTAddressState[]" value="" placeholder="State" autocomplete="espo-state" maxlength="255"><span class="temp-error display_none text-danger">Please enter state</span></div></div><div class="col-md-4"><div class="form-group gst_postal_group"><input type="text" name="billingEntityGSTAddressPostalCode[]" class="form-control GST_Details_postal_code gst_postal_code" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><span class="temp-error display_none text-danger">Please enter postal Code</span><span class="digit-temp-error display_none text-danger">Please enter 6 digits postal code</span></div></div></div></div></div></div>');
   
   }

        $('#main_GSTIN_fields').hide();
        $('#main_gst_deatils').show();
        label_count_gst(1);


    } else {
        $(".GST_details_Panel .GST_added_panel .temp-error").addClass("display_none");
        $('#main_gst_deatils').hide();
        $('#main_GSTIN_fields').show();
    }
});

</script>

<script >
     function create_gst(element)
      {

        var inputvalues = $(element).val();
        var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
        if (gstinformat.test(inputvalues)) {
            return true;
        } else {
            $.alert({
                title: 'Warning!',
                content: 'Please enter valid GSTIN number',
                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
            });
            $(element).val('');
            $(".gst_deatils_GST_1").focus();
            $(element).closest(".GST_added_panel").find(".gst_state_edit").val("");
    
        }
      }

   $(document).on('change', ".overview_postal_code", function() 
   {
        var val1 = $(this).val();

        if (val1 == "") {
            $.alert({
                title: 'Alert!',
                content: 'Please enter postal code',
                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
            });
        } else {
            if (/^\d{6}$/.test(val1)) {

            } else {
                $.alert({
                    title: 'Alert!',
                    content: 'Postal code must be of 6 digits',
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                    buttons: {
                        ok: function() {
                            if (val1) {
                                $(this).val("");
                            }

                        }
                    }
                });
            }
        }
    });


// $(document).on('change', ".gst_postal_code", function() {
//     var val1 = $(this).val();

//     if (val1 == "") {
//         $.alert({
//             title: 'Alert!',
//             content: 'Please enter postal code',
//             type: 'dark',
//             typeAnimated: true
//         });
//     } else {
//         if (/^\d{6}$/.test(val1)) {

//         } else {
//             $.alert({
//                 title: 'Alert!',
//                 content: 'Postal code must be of 6 digits',
//                 type: 'dark',
//                 typeAnimated: true,
//                 buttons: {
//                     ok: function() {
//                         if (val1) {
//                             $(this).val("");
//                         }

//                     }
//                 }
//             });
//         }
//     }
// });


</script>

<script type="text/javascript">
$(".name").keyup(function() {

    if ($(this).val().length > 0) {
        $(".name_group .temp-error").addClass("display_none");
        $(".name_group").removeClass("has-error");
    } else {
        $(".name_group .temp-error").removeClass("display_none");
        $(".name_group").addClass("has-error");
    }

});

var gstinformat_invoice = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');

$(document).on('keyup', ".overview_panno", function(e) {


    var inputvalues_invoice = $(".overview_panno").val().toUpperCase();

    e.stopImmediatePropagation();

    $(".pan_no_group .temp-error").addClass("display_none");
    $(".pan_no_group").removeClass("has-error");
    if (gstinformat_invoice.test(inputvalues_invoice)) {
        $(".pan_no_group .Invalid-temp-error").addClass("display_none");
        $(".pan_no_group").removeClass("has-error");
        return true;
    } else {
        $(".pan_no_group .Invalid-temp-error").removeClass("display_none");
        $(".pan_no_group").addClass("has-error");
    }

});


var email_reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

$(document).on('keyup', ".email", function(e) {

    var emailinputvalues_invoice = $(this).val().toLowerCase();

    if ($(this).val().length > 0) {
        $(".email_group .temp-error").addClass("display_none");
        $(".email_group").removeClass("has-error");
        if (email_reg.test(emailinputvalues_invoice)) {
            $(".email_group .Invalid-temp-error").addClass("display_none");
            $(".email_group").removeClass("has-error");
            return true;
        }

        $(".email_group .Invalid-temp-error").removeClass("display_none");
        $(".email_group").addClass("has-error");

    }
    if ($(this).val().length == 0) {
        $(".email_group .Invalid-temp-error").addClass("display_none");
        $(".email_group").removeClass("has-error");
    }

});


$(document).on('keyup', ".beneficiary_nm", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");

});

$(document).on('keyup', ".bank_ifsc", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});

$(document).on('keyup', ".bank_nm", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});

$(document).on('keyup', ".bank_ano", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});

$(document).on('keyup', ".gst_no_group", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});

$(document).on('keyup', ".gst_addr", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});

$(document).on('keyup', ".gst_city", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});



$(document).on('keyup', ".bank_ano", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});

$(document).on('keyup', ".gst_postal_code", function(e) {


    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");

    if($(this).val().length!=6)
    {

    $(this).closest(".form-group").find(".digit-temp-error").removeClass("display_none");
    $(this).closest(".form-group").addClass("has-error");

    }
    if($(this).val().length==6)
    {
    $(this).closest(".form-group").find(".digit-temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");

    }

});


$(document).on('change', "#overview_state", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
    $(this).closest(".form-group .custom-a11yselect-btn").removeClass("form-control");
});

$(document).on('change', ".gst_state_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
    $(this).closest(".form-group .custom-a11yselect-btn").removeClass("form-control");
});

$(document).on('change', ".bank_account_type", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
    $(this).closest(".form-group .custom-a11yselect-btn").removeClass("form-control");

});

</script>

<!-- for bank details  -->

<script type="text/javascript">
   
var $check_empty = "";

// To show errors if all fields of bank details  are empty
function check_empty_fields(p) {

    var C_name = $(".name").val();
    var C_email = $(".email").val();
    var C_address = $(".address").val();
    var C_city = $(".city").val();
    var C_state = $("#overview_state-menu .custom-a11yselect-selected").attr('data-val');
    var C_postal_code = $(".overview_postal_code").val();
    var C_overview_panno = $(".overview_panno").val().toUpperCase();
    var C_website = $(".website").val();
    var C_phone = $(".phone").val();
    var C_regno = $(".regno").val();

    var Current = $(".main_bank_deatils .panel-body");

    var beneficiary_nm = Current.eq(p).find(".beneficiary_nm").val();
    var bank_ifsc = Current.eq(p).find(".bank_ifsc").val();
    var accountType = Current.eq(p).find(".accounttype_group .custom-a11yselect-menu .custom-a11yselect-selected").attr('data-val');
    var bank_nm = Current.eq(p).find('.bank_nm').val();
    var accountNo = Current.eq(p).find('.bank_ano').val();
    var UPI_Id = Current.eq(p).find('.bank_upiId').val();


    $check_empty = false;

    // name and pan no validation

    if (C_name != "" && C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == true && beneficiary_nm != "" && bank_ifsc != "" && accountType != "" && bank_nm != "" && accountNo != "") {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");
        $(".main_bank_deatils .form_group").removeClass("has-error");

        $check_empty = false;

        if (C_email != "") {
            if (email_reg.test($(".email").val().toLowerCase()) == true) {
                $(".email_group .temp-error,.email_group .Invalid-temp-error").addClass("display_none");
                $(".email_group").removeClass("has-error");
                $check_empty = false;
            } else {
                $check_empty = true;
            }
        }

    } else {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");

        $check_empty = true;

        if (C_name == "") {
            $(".name_group .temp-error").removeClass("display_none");
            $(".name_group").addClass("has-error");
        }

        if (C_overview_panno == "") {
            $(".pan_no_group .temp-error").removeClass("display_none");
            $(".pan_no_group").addClass("has-error");
        }

        if (C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == false) {
            $(".pan_no_group .Invalid-temp-error").removeClass("display_none");
            $(".pan_no_group").addClass("has-error");

        }

        if (beneficiary_nm == "") {
            Current.eq(p).find(".Beneficiary_group .temp-error").removeClass("display_none");
            Current.eq(p).find(".Beneficiary_group").addClass("has-error");
        }

        if (bank_ifsc == "") {
            Current.eq(p).find(".IFSC_group .temp-error").removeClass("display_none");
            Current.eq(p).find(".IFSC_group").addClass("has-error");
        }

        if (accountType == "") {
            Current.eq(p).find(".accounttype_group .temp-error").removeClass("display_none");
            Current.eq(p).find(".accounttype_group").addClass("has-error");
            Current.eq(p).find(".accounttype_group .custom-a11yselect-btn").addClass("form-control");
        }

        if (bank_nm == "") {
            Current.eq(p).find(".bankName_group .temp-error").removeClass("display_none");
            Current.eq(p).find(".bankName_group").addClass("has-error");
        }

        if (accountNo == "") {
            Current.eq(p).find(".account_group .temp-error").removeClass("display_none");
            Current.eq(p).find(".account_group").addClass("has-error");
        }

    }

    return $check_empty;
}

// called on add more of bank details

function add_more_validation() {
    var p_body_length = $(".main_bank_deatils .panel-body").length;

    var $addMore = "";

    var flag = 0;

    for (var p = 0; p < p_body_length; p++) {
        $addMore = check_empty_fields(p);

        if ($addMore == true && flag == 0) {
            flag = 1;
        }

    }

    if (flag == 1) {
        return true;
    } else {
        return false;
    }



}


// for last details of bank

function for_empty_bank_details_check(p) {

    // overviews values

    var C_name = $(".name").val();
    var C_email = $(".email").val();
    var C_overview_panno = $(".overview_panno").val().toUpperCase();
    
    var Current = $(".main_bank_deatils .panel-body");

    var beneficiary_nm = Current.eq(p).find(".beneficiary_nm").val();
    var bank_ifsc = Current.eq(p).find(".bank_ifsc").val();
    var accountType = Current.eq(p).find(".accounttype_group .custom-a11yselect-menu .custom-a11yselect-selected").attr('data-val');
    var bank_nm = Current.eq(p).find('.bank_nm').val();
    var accountNo = Current.eq(p).find('.bank_ano').val();
    var UPI_Id = Current.eq(p).find('.bank_upiId').val();

    $check_empty = false;

    // name and pan no validation

    if (C_name != "" && C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == true) {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");
        $('.name_group,.pan_no_group').removeClass('has-error');

        Current.eq(p).find(".temp-error").addClass("display_none");
        Current.eq(p).find(".form-group").removeClass('has-error');

        $check_empty = false;

        // email validation

        if (C_email != "" && beneficiary_nm == "" && bank_ifsc == "" && accountType == "" && bank_nm == "" && accountNo == "") {

          Current.eq(p).find(".temp-error").addClass("display_none");
          Current.eq(p).find(".form-group").removeClass('has-error');


            if (email_reg.test($(".email").val().toLowerCase()) == true) {
                $(".email_group .temp-error,.email_group .Invalid-temp-error,.main_bank_deatils .temp-error").addClass("display_none");
                $(".email_group,.main_bank_deatils .form-group").removeClass('has-error');
                $check_empty = false;
            } else {
                $check_empty = true;
            }

        } else if (C_email == "" && (beneficiary_nm != "" || bank_ifsc != "" || accountType != "" || bank_nm != "" || accountNo != "")) {

            $check_empty = true;

            if (beneficiary_nm == "") {
                Current.eq(p).find(".Beneficiary_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".Beneficiary_group").addClass("has-error");
            }

            if (bank_ifsc == "") {
                Current.eq(p).find(".IFSC_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".IFSC_group").addClass("has-error");
            }

            if (accountType == "") {
                Current.eq(p).find(".accounttype_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".accounttype_group").addClass("has-error");
            }

            if (bank_nm == "") {
                Current.eq(p).find(".bankName_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".bankName_group").addClass("has-error");
            }

            if (accountNo == "") {
                Current.eq(p).find(".account_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".account_group").addClass("has-error");
            }

            if (beneficiary_nm != "" && bank_ifsc != "" && accountType != "" && bank_nm != "" && accountNo != "") {
                Current.eq(p).find(".temp-error").addClass("display_none");
                Current.eq(p).find(".form-group").removeClass("has-error");
                $check_empty = false;

            }

        } else if (C_email != "" && (beneficiary_nm != "" || bank_ifsc != "" || accountType != "" || bank_nm != "" || accountNo != "")) {

            $check_empty = true;

            if (email_reg.test($(".email").val().toLowerCase()) == false) {
                $(".email_group .Invalid-temp-error").removeClass("display_none");
                $(".email_group").addClass("has-error");
            }

            if (beneficiary_nm == "") {
                Current.eq(p).find(".Beneficiary_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".Beneficiary_group").addClass("has-error");
            }

            if (bank_ifsc == "") {
                Current.eq(p).find(".IFSC_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".IFSC_group").addClass("has-error");
            }

            if (accountType == "") {
                Current.eq(p).find(".accounttype_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".accounttype_group").addClass("has-error");
            }

            if (bank_nm == "") {
                Current.eq(p).find(".bankName_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".bankName_group").addClass("has-error");
            }

            if (accountNo == "") {
                Current.eq(p).find(".account_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".account_group").addClass("has-error");
            }

            if (beneficiary_nm != "" && bank_ifsc != "" && accountType != "" && bank_nm != "" && accountNo != "" && email_reg.test($(".email").val().toLowerCase()) == true) {
                $(".email_group .temp-error,.email_group .Invalid-temp-error").addClass("display_none");
                $(".email_group").removeClass("has-error");

                Current.eq(p).find(".temp-error").addClass("display_none");
                Current.eq(p).find(".form-group").removeClass("has-error");
                $check_empty = false;

            }

        }
       
    }
    else {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");

        $(".name_group,.pan_no_group").removeClass('has-error');

        $check_empty = true;

        if (C_name == "") {
            $(".name_group .temp-error").removeClass("display_none");
            $(".name_group").addClass('has-error');
        }

        if (C_overview_panno == "") {
            $(".pan_no_group .temp-error").removeClass("display_none");
            $(".pan_no_group").addClass('has-error');
        }

        if (C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == false) {
            $(".pan_no_group .Invalid-temp-error").removeClass("display_none");
            $(".pan_no_group ").addClass("has-error");
        }

        if(beneficiary_nm != "" || bank_ifsc != "" || accountType != "" || bank_nm != "" || accountNo != "")
        {
            if (beneficiary_nm == "") {
                Current.eq(p).find(".Beneficiary_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".Beneficiary_group").addClass('has-error');
            }

            if (bank_ifsc == "") {
                Current.eq(p).find(".IFSC_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".IFSC_group").addClass('has-error');

            }

            if (accountType == "") {
                Current.eq(p).find(".accounttype_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".accounttype_group").addClass('has-error');
                Current.eq(p).find(".accounttype_group .custom-a11yselect-btn").addClass('form-control');

            }

            if (bank_nm == "") {
                Current.eq(p).find(".bankName_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".bankName_group").addClass('has-error');

            }

            if (accountNo == "") {
                Current.eq(p).find(".account_group .temp-error").removeClass("display_none");
                Current.eq(p).find(".account_group").addClass('has-error');

            }
        }
        else if(beneficiary_nm == "" && bank_ifsc == "" && accountType == "" && bank_nm == "" && accountNo == "")
        {
          Current.eq(p).find(".temp-error").addClass("display_none");
          Current.eq(p).find(".form-group").removeClass("has-error");
        }

    }

    return $check_empty;

}



// called on save button (check if fields are empty then show errors)

function onSaveCheckFields() {

    var p_body_length = $(".main_bank_deatils .panel-body").length;

    var $empty1 = "",
        $empty2 = "",
        f = 0;

    for (var p = 0; p < p_body_length; p++) {
        if (p < p_body_length - 1) {
            $empty1 = check_empty_fields(p);
            if (f == 0 && $empty1 == true) {
                f = 1;
            }
        }
        if (p == p_body_length - 1) {

            $empty2 = for_empty_bank_details_check(p);
        }

    }
    if (f == 1 || $empty2 == true) {
        return true;
    } else {
        return false;
    }
}


</script>

<!--  for GST  -->

<script type="text/javascript">
   

   // To check empty fields and show errors for gst HTML

var $gst_chek_empty = "";

function gst_check_empty_fields(g) {

    // overviews values

    var C_name = $(".name").val();
    var C_email = $(".email").val();
    var C_overview_panno = $(".overview_panno").val().toUpperCase();
    var current = $(".GST_details_Panel .GST_added_panel");

    // gst values

    var gst_no = current.eq(g).find(".gst_deatils_GST_1").val();
    var gst_addr = current.eq(g).find(".gst_addr").val();
    var gst_city = current.eq(g).find(".gst_city").val();
    var gst_state = current.eq(g).find(".gst_state_edit").val();
    var gst_code = current.eq(g).find(".GST_Details_postal_code").val();

    // alert(gst_code.length);
    $gst_chek_empty = false;

    if (C_name != "" && C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == true && gst_no != "" && gst_addr != "" && gst_city != "" && gst_state != "" && gst_code != "" && gst_code.length==6) {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");
        $("#gst_deatils .form-group").removeClass('has-error');

        $gst_chek_empty = false;

        current.eq(g).find(".temp-error,.digit-temp-error").addClass("display_none");
    } else {
        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");
        $("#gst_deatils .form-group").removeClass('has-error');
        $gst_chek_empty = true;

        if (C_name == "") {
            $(".name_group .temp-error").removeClass("display_none");
            $(".name_group").addClass("has-error");
        }

        if (C_overview_panno == "") {
            $(".pan_no_group .temp-error").removeClass("display_none");
            $(".pan_no_group").addClass("has-error");
        }

        if (C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == false) {
            $(".pan_no_group .Invalid-temp-error").removeClass("display_none");
            $(".pan_no_group").addClass("has-error");
        }

        if (gst_no == "") {
            current.eq(g).find(".gst_no_group .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_no_group").addClass("has-error");
        }

        if (gst_addr == "") {
            current.eq(g).find(".gst_addr_group .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_addr_group").addClass("has-error");
        }

        if (gst_city == "") {
            current.eq(g).find(".gst_city_group .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_city_group").addClass("has-error");
        }

        if (gst_state == "") {
            current.eq(g).find(".gst_state_group .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_state_group").addClass("has-error");
        }

        if (gst_code == "") {
            current.eq(g).find(".gst_postal_group .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_postal_group .digit-temp-error").addClass("display_none");
            current.eq(g).find(".gst_postal_group").addClass("has-error");

        }

        if (gst_code != "" && gst_code.length!=6) {
            current.eq(g).find(".gst_postal_group .temp-error").addClass("display_none");
            current.eq(g).find(".gst_postal_group .digit-temp-error").removeClass("display_none");
            current.eq(g).find(".gst_postal_group").addClass("has-error");
        }

       
    }

    return $gst_chek_empty;

}

//  Called On GST hTml append


function gst_validation() {

    var gst_len = $(".GST_details_Panel .GST_added_panel").length;

    var $addMore = "";

    var flag = 0;

    for (var g = 0; g < gst_len; g++) {
        $addMore = gst_check_empty_fields(g);

        if ($addMore == true && flag == 0) {
            flag = 1;
        }

    }

    if (flag == 1) {
        return true;
    } else {
        return false;
    }


}

function for_last_gst_details_check(g) {


    var current = $(".GST_details_Panel .GST_added_panel");

    var gst_no = current.eq(g).find(".gst_deatils_GST_1").val();
    var gst_addr = current.eq(g).find(".gst_addr").val();
    var gst_city = current.eq(g).find(".gst_city").val();
    var gst_state = current.eq(g).find(".gst_state_edit").val();
    var gst_code = current.eq(g).find(".GST_Details_postal_code").val();

    $gst_chek_empty = false;

    if (gst_no != "" || gst_addr != "" || gst_city != "" || gst_state != "" || gst_code != "") {

        $gst_chek_empty = true;

        if (gst_no == "") {
           current.eq(g).find(".gst_no_group .temp-error").removeClass("display_none");
           current.eq(g).find(".gst_no_group").addClass("has-error");
        }

        if (gst_addr == "") {
            current.eq(g).find(".gst_addr_group .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_addr_group").addClass("has-error");
        }

        if (gst_city == "") {
            current.eq(g).find(".gst_city_group .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_city_group").addClass("has-error");
        }

        if (gst_state == "") {
            current.eq(g).find(".gst_state_group .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_state_group").addClass("has-error");
        }

        if (gst_code == "") {
            current.eq(g).find(".gst_postal_group .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_postal_group").addClass("has-error");
        }
       
        if (gst_no != "" && gst_addr != "" && gst_city != "" && gst_state != "" && gst_code != ""&& gst_code.length == 6) {
            current.eq(g).find(".temp-error,.digit-temp-error").addClass("display_none");
            current.eq(g).find(".form-group").removeClass("has-error");
            $gst_chek_empty = false;

        }

    } else if (gst_no == "" && gst_addr == "" && gst_city == "" && gst_state == "" && gst_code == "") {
        current.eq(g).find(".temp-error,.digit-temp-error").addClass("display_none");
        current.eq(g).find(".form-group").removeClass("has-error");
        $gst_chek_empty = false;
    }

    return $gst_chek_empty;

}


function onSaveGstCheckFields() {

    var gst_len = $(".GST_details_Panel .GST_added_panel").length;

    var $empty1 = "",
        $empty2 = "",
        f = 0;

    for (var g = 0; g < gst_len; g++) {
        if (g < gst_len - 1) {
            $empty1 = gst_check_empty_fields(g);
            if (f == 0 && $empty1 == true) {
                f = 1;
            }
        }
        if (g == gst_len - 1) {
         $empty2 = for_last_gst_details_check(g);
        }

    }
    if (f == 1 || $empty2 == true) {
        return true;
    } else {
        return false;
    }
}



</script>

<!-- On Save Button Click -->

<script type="text/javascript">
   // $(document).on('click', '#save_billingEntityBTN', function() {

function create_save_operation()
{

    var radioValue = $("#GSTIN_fields input[name='optradio']:checked").val();

    var bank_check = onSaveCheckFields();

    var gst_check = "";

    if (radioValue == 'Yes') {
        gst_check = onSaveGstCheckFields();
    }


    if ((bank_check == false && gst_check == false)) {
        var formdata=$('#createBillingEntityForm');
        form      = new FormData(formdata[0]);

      $(".main_bank_deatils .panel-body .temp-error").addClass("display_none");

      $.ajax({
        type    : "POST",
        url     : "../../client/res/templates/financial_changes/save_billing_entity_data.php",
        dataType  : "json",
        processData : false,
        contentType : false,
        data:form,
        success: function(data)
        {
          if(data)
          {
            $.confirm({
              title: 'Success!',
              content: 'Created successfully!',
              type: 'dark',
              typeAnimated: true,
              draggable: false,
              buttons: {
              Ok: function () {
                $('button[data-action="reset"]').trigger('click');
                $(function () {
                  $('#billing_entity').modal('toggle');
                });
                $('#createBillingEntityForm')[0].reset();
                $(".modal-backdrop.in").remove();
                }
              }
            });
          }
        }
      });

    } else {}


    return false;
}

</script>
<!-- Get state name automatically from GST number -->
<script>
  function getGST_state(stCode, id){

    //$(document).on('blur',".gstinnumber_invoice", function(e){  
      //e.stopImmediatePropagation();  
      var inputvalues = stCode;
      var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
    
      if(inputvalues == ""){
      }
      else{
        if (gstinformat.test(inputvalues)) {
          var obj = [{
            "01":"Jammu and Kashmir",
            "02":"Himachal Pradesh",
            "03":"Punjab",
            "04":"Chandigarh",
            "05":"Uttarakhand",
            "06":"Haryana",
            "07":"Delhi",
            "08":"Rajasthan",
            "09":"Uttar Pradesh",
            "10":"Bihar",
            "11":"Sikkim",
            "12":"Arunachal Pradesh",
            "13":"Nagaland",
            "14":"Manipur",
            "15":"Mizoram",
            "16":"Tripura",
            "17":"Meghalaya",
            "18":"Assam",
            "19":"West Bengal",
            "20":"Jharkhand",
            "21":"Odisha",
            "22":"Chhattisgarh",
            "23":"Madhya Pradesh",
            "24":"Gujarat",
            "25":"Daman and Diu",
            "26":"Dadra and Nagar Haveli",
            "27":"Maharashtra",
            "28":"Andhra Pradesh",
            "29":"Karnataka",
            "30":"Goa",
            "31":"Lakshadweep",
            "32":"Kerala",
            "33":"Tamil Nadu",
            "34":"Pondicherry",
            "35":"Andaman & Nicobar",
            "36":"Telangana",
            "37":"Andhrapradesh(New)",
            "38":"Ladakh",
          }];


          var stCode = stCode.substring(0, 2);

          if ( stCode in obj[0] ) {

            $("#gst_state"+id).val(obj[0][stCode]);
            $("#gst_state"+id).next().closest('span').addClass("display_none");

          }
          else{
            $("#gst_state"+id).val('');
          }

          return true;
        }
        else {
          $.alert({
              title: 'Warning!',
              content: 'Please enter valid GSTIN number for test',
              type: 'dark',
                   typeAnimated: true,
                   draggable: false,
          });
          $("#gst_state"+id).val('');
          $("#gst_state"+id).focus();
        }
      }
  }

  function getStateName(myState){
    $("input[name='billingEntityAddressState']").val(myState);
  }

  var currentDomain = window.location.hostname;
                
  $.ajax({
  type    : "GET",
  url     : "../../../../client/src/views/domain_status/check_domain_status.php",
  dataType  : "json",
  data    : {currentDomain:currentDomain},
  async: false,
  success: function(data)
  {   
      domain_status = data.domain_status;
      if(domain_status == 'Blocked'){
          $('a[data-action="logout"]').trigger('click');
          
      }
  },
  });
</script>
<script>
$('#billing_entity .close').on('click', function(e) {
  document.getElementById("createBillingEntityForm").reset();

  $(".Overview_details .temp-error,.Overview_details .Invalid-temp-error").addClass("display_none");
  // for account type

  $(".accounttype_group .custom-a11yselect-btn").attr("aria-activedescendant","Type_Account-option-0"); 

  $(".accounttype_group .custom-a11yselect-btn .custom-a11yselect-text").text("Select Account Type");

  $(".accounttype_group .custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
  $(".accounttype_group .custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-selected custom-a11yselect-focused");

  // state 

   $(".state_group .custom-a11yselect-btn").attr("aria-activedescendant","overview_state-option-0"); 

  $(".state_group .custom-a11yselect-btn .custom-a11yselect-text").text("State");

  $(".state_group .custom-a11yselect-menu li").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
  $(".state_group .custom-a11yselect-menu li[data-val='']").addClass("custom-a11yselect-selected custom-a11yselect-focused"); 


});

$(document).on('click','#create_billing_entity',function()
{
  $(".main_bank_deatils .bank-append").remove();
  var n=$(".main_bank_deatils .bank-append").length;
  if(n==0)
  {
   $(".main_bank_deatils").append('<div class="panel-body panel-body-form bank-append"><div class="addbankdetails1"><div class="row"><div class="col-md-12"><div class="panel-heading" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;"><h4 class="panel-title bank_title" style="display:inline-block;"> Bank Account 1</h4><button type="button" class="btn btn-danger bank_deleteBtn pull-right" style="display: none;"><span class="material-icons-outlined">close</span></button></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group Beneficiary_group"><label for="">Beneficiary Name</label><input type="text" name="billingentity_bank_beneficiary[]" value="" class="form-control beneficiary_nm" placeholder="Beneficiary Name"><span class="temp-error display_none text-danger">Please enter beneficiary name</span></div></div><div class="col-sm-6   col-md-6"><div class="form-group bankName_group"><label for="">Name of Bank</label><input type="text" name="billingentity_bank_name[]" value=""  class="form-control bank_nm" placeholder="Bank name"><span class="temp-error display_none text-danger">Please enter bank name</span></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group IFSC_group"><label for="">IFSC Code</label><input type="text" name="billingentity_bank_ifc[]" value="" class="form-control bank_ifsc" placeholder="IFSC Code"><span class="temp-error display_none text-danger">Please enter IFSC code</span></div></div><div class="col-sm-6   col-md-6"><div class="form-group account_group"><label for="">Account No.</label><input type="text" name="billingentity_bank_accountno[]" value="" class="form-control bank_ano" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" placeholder="Account No."> <span class="temp-error display_none text-danger">Please enter account no</span></div></div></div><div class="row"><div class="col-md-6"><div class="form-group accounttype_group"><label >Account Type</label><select id="Type_Account" name="billingentity_bank_accounttype[]" class="form-control bank_account_type"><option value="">Select Account Type</option><option value="Saving">Saving</option><option value="Current">Current</option><option value="Cash Credit">Cash Credit</option><option value="Overdraft">Overdraft</option></select><span class="temp-error display_none text-danger">Please select account type</span></div></div><div class="col-md-6"><div class="form-group UPI_group"> <label for="">UPI ID</label><input type="text" name="billingentity_bank_upi[]" class="form-control bank_upiId" placeholder="UPI ID"><span class="temp-error display_none text-danger">Please enter UPI id</span></div></div></div></div></div>');
  $(".main_bank_deatils .bank-append:last-child .bank_account_type").customA11ySelect();
  }



   $("#main_gst_deatils").css("display","none");
   
   $(".GST_details_Panel .GST_added_panel").remove();
   
   var g=$(".GST_details_Panel .GST_added_panel").length;
   
   $("#main_GSTIN_fields").css("display","block");




});

</script>
<!-- Get state name automatically from GST number -->

<!-- Manage Billing Entity -->

<!-- New Create Estimate Form Start -->

<!-- Modal -->
  <div id="FinanceEstimateModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content" id="estimate_main_details">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="resetData_estimate(this)">&times;</button>
          <h4 class="modal-title">Create Estimate</h4>
        </div>
        <div class="modal-body">
          <form name="estimateForm" id="estimateForm" method="post" autocomplete="off">
            <div class="row">
              <div class="col-md-12">
                <div class="" style="margin-bottom: 15px;">
                  <button type="button" class="btn btn-default" id="previewEstimate">Preview</button>
                  <button type="submit" class="btn btn-primary" id="save_estimateBTN_new">Save</button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default" id="estimate_billedfrom">
                  <div class="panel-heading">Billed From</div>
                  <div class="panel-body" id="Address_Details">
                    <div class="row">
                      <div class="col-md-7">
                        <div class="BillingFromCard">
                          <h5><span class="material-icons-outlined usericoncard">person_add_alt_1</span><span class="billingcardtitle">Add a billing entity</span></h5>
                        </div>
                        <div class="BillingFromAddress" style="display: none;">
                            <div id="BillFromAddress_name" class="form-group"></div>
                            <div id="BillFromAddress_street" class="form-group"></div>
                            <div id="BillFromAddress_email_phone" class="form-group"></div>
                            <div id="BillFromAddress_num" class="form-group"></div>
                            <div id="BillFromAddress_panno" class="form-group"></div>
                            <div id="BillFromAddress_udyam" class="form-group"></div>
                            <div class="form-group diff_billing_entity"><span class="estimateDiffBillingEntity">Choose a different billing entity</span></div>
                            <div class="form-group diff_gst_number"><span class="estimateDiffGSTNum">Choose a different GSTIN</span></div>

                            <!--<div class="form-group">  <span><b>Finnova Advisory Services Private Limited</b></span>
                            </div>
                            <div class="form-group">  <span>Office No 1, Tower No 2, Mayfair Towers, Shivaji Nagar Pune, Maharashtra - 411005</span>
                            </div>
                            <div class="form-group">  <span>fincrm@gmail.com</span>, <span>020 4004 7890</span>
                            </div>
                            <div class="form-group">  <span><b>GSTIN</b> - 29ABCDE1234F2Z5</span>
                            </div>
                            <div class="form-group">  <span><b>PAN</b> - CRAHS123AF</span>
                            </div>
                            <div class="form-group">  <span><b>UDYAM REGISTRATION NO.</b> - ADADA788945646</span>
                            </div>
                            <div class="form-group">  <span class="estimateDiffBillingEntity">Choose a different Billing Entity</span>
                            </div>-->
                        </div>
                        <div class="BillingFrom_address_and_gst" style="display: none;">
                          <div class="form-group BillingFrom_address_main">
                            <select name="" id="BillingFrom_addr" class="BillingFrom_address form-control BillingFrom_addr">
                              <option value="">Select Billing Entity</option>
                              <!--<option value="Finnova Advisory Services Private Limited">Finnova Advisory Services Private Limited</option>
                              <option value="Asbestos company Private Limited">Asbestos company Private Limited</option>
                              <option value="Bita level Private Limited">Bita level Private Limited</option>-->
                            </select>
                          </div>
                          <div class="form-group BillingFrom_gst_main" style="display: none;">
                            <div class="form-group BillingFromGSTDetails_dropdown">
                                <select name="" id="BillingFrom_gstno" class="BillingFrom_gst form-control BillingFrom_gstno">
                                    <option value="">Select GSTIN</option>
                                    <!--<option value="29ABCDE1234F2Z5">29ABCDE1234F2Z5</option>
                                    <option value="32SAFSSA234FF4T">32SAFSSA234FF4T</option>-->
                                </select>
                            </div>
                            <div class="form-group BillingFromGSTDetails">
                                <div id="BillFromGST_name" class="form-group"></div>
                                <div id="BillFromGST_street" class="form-group"></div>
                                <div id="BillFromGST_email_phone" class="form-group"></div>
                                <div id="BillFromGST_num" class="form-group"></div>
                                <div id="BillFromGST_panno" class="form-group"></div>
                                <div id="BillFromGST_state" class="form-group"></div>
                                <div class="form-group diff_billing_entity"><span class="estimateDiffBillingEntity">Choose a different billing entity</span></div>
                                <div class="form-group diff_gst_number"><span class="estimateDiffGSTNum">Choose a different GSTIN</span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">Estimate Number <span class="text-danger">*</span></span>
                          </label>
                          <div class="col-md-7">
                            <div class="">
                              <input name="estimate_number" id="estimate_number" class="form-control" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">P.O./S.O. Number</span>
                          </label>
                          <div class="col-md-7">
                            <div class="">
                              <input name="po_so_number" class="form-control" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">Estimate Date <span class="text-danger">*</span></span>
                          </label>
                          <div class="col-md-7">
                            <!-- <div id="datepicker_estimate" class="input-group date estimate_datepicker" data-date-format="dd-mm-yyyy"> -->
                            <div id="" class="input-group date estimate_datepicker" data-date-format="dd-mm-yyyy">
                              <input name="estimate_date" class="form-control " type="text" onClick="estimate_getDateEvent(this);" id="datepicker_estimate" onkeydown="return false"> <span class="btn btn-default_gray input-group-addon" onclick="estimate_focus_datepicker(this)"><span class="material-icons-outlined">date_range</span></span>
                           
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default" id="estimate_billedto">
                  <div class="panel-heading">Billed To</div>
                  <div class="panel-body" id="Address_Details_BillTo">
                    <div class="row">
                      <div class="col-md-7">
                        <div class="BillingToCard">
                          <h5><span class="material-icons-outlined usericoncard">person_add_alt_1</span><span class="billingcardtitle">Add a customer</span></h5>
                        </div>
                        <div class="BillingToAddress" style="display: none;">
                          <div id="BillToAddress_name" class="form-group"></div>
                          <div id="BillToAddress_street" class="form-group"></div>
                          <div id="BillToAddress_email_phone" class="form-group"></div>
                          <div id="BillToAddress_num" class="form-group"></div>
                          <div id="BillToAddress_panno" class="form-group"></div>
                          <div id="BillToAddress_udyam" class="form-group"></div>
                          <div class="form-group diff_customer_link"><span class="estimateDiffcustomer">Choose a different customer</span></div>
                          <div class="form-group diff_customer_gst"><span class="estimateDiffcustomergst">Choose a different GSTIN</span></div>
                        </div>
                        <div class="BillingTo_address_and_gst" style="display: none;">
                          <div class="form-group BillingTo_address_main">
                            <select name="" id="BillingTo_addr" class="BillingTo_address form-control ">
                              <option value="">Select Customer</option>
                            </select>
                          </div>
                          <div class="form-group BillingTo_gst_main" style="display: none;">
                            <div class="form-group BillingToGSTDetails_dropdown">
                              <select name="" id="BillingTo_gstno" class="BillingTo_gst form-control">
                                <option value="">Select GSTIN</option>
                                <!--<option value="29ABCDE1234F2Z5">29ABCDE1234F2Z5</option>
                                <option value="32SAFSSA234FF4T">32SAFSSA234FF4T</option>-->
                              </select>
                            </div>
                            <div class="form-group BillingToGSTDetails">
                                <!--<div id="BillToGST_num" class="form-group"></div>
                                <div id="BillToGST_street" class="form-group"></div>
                                <div id="BillToGST_city" class="form-group"></div>
                                <div id="BillToGST_state" class="form-group"></div>
                                <div id="BillToGST_zipcode" class="form-group"></div>-->
                                <div id="BillToGST_name" class="form-group"></div>
                                <div id="BillToGST_address" class="form-group"></div>
                                <div id="BillToGST_email_phone" class="form-group"></div>
                                <div id="BillToGST_gst" class="form-group"></div>
                                <div id="BillToGST_pan" class="form-group"></div>
                                <div id="BillToGST_udyam" class="form-group"></div>
                                <div class="form-group diff_customer_link"><span class="estimateDiffcustomer">Choose a different customer</span></div>
                                <div class="form-group diff_customer_gst"><span class="estimateDiffcustomergst">Choose a different GSTIN</span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="table-responsive Finance_custom-a11yselect">
                        <table class="table" id="participantTable">
                          <thead>
                            <tr>
                              <th>
                                <input type="checkbox" class="header_checkbox">
                              </th>
                              <th class="text-center">S.N</th>
                              <th class="text-center">Item description</th>
                              <th class="width_15 text-center">HSN/SAC</th>
                              <th class="width_10 text-center">Quantity</th>
                              <th class="width_10 text-center">Rate (₹)</th>
                              <th>Amount (₹)</th>
                              <th><span class="material-icons-outlined header_delete" style="display: none;">delete_outline</span>
                              </th>
                            </tr>
                          </thead>
                          <tbody class="participantRow">
                            <input type="hidden" name="total_items" id="total_items" value="1" />
                            <tr class="main-group">
                              <td>
                                <input type="checkbox" class="checkbox sub_checkbox">
                              </td>
                              <td class="sno"><span>1</span>
                              </td>
                              <td>
                                <input name="item_descr[]" id="item_descr0" type="text" value="" class="form-control item_descr">
                              </td>
                              <td>
                                <input name="item_hsn[]" id="item_hsn0" type="text" value="" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                              </td>
                              <td>
                                <input name="item_qty[]" id="item_qty0" type="text" value="" class="form-control item_qty" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                              </td>
                              <td>
                                <input name="item_rate[]" id="item_rate0" type="text" value="" class="form-control item_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                              </td>
                              <td>
                                <input type="text" class="form-control main_amount" name="item_main_amount[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                              </td>
                              <td>  <span class="material-icons-outlined estimate_remove">delete_outline</span>
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount (At item level)</span>
                              </td>
                              <td class="width_15 discount_section">
                                <select name="item_discount_type[]" id="item_discount_type0" class="Estimate_Percentage form-control ">
                                  <option value="" selected="selected">Select Type</option>
                                  <option value="Percentage">Percentage</option>
                                  <option value="Amount">Amount</option>
                                </select>
                              </td>
                              <td class="width_10">
                                <input name="item_discount_rate[]" id="item_discount_rate0" type="text" value="" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                              </td>
                              <td class="width_15"><span class="main_amount">₹ 0000.00 <input type="hidden" name="calculated_discount[]" class="calculated_discount" value="0"></span>
                              </td>
                              <td class="width_10"><span class="material-icons-outlined estimate_remove_discount" style="display: none;">delete_outline</span>
                              </td>
                            </tr>
                            <tr class="CGST_TR_section">
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At item level)</span>
                              </td>
                              <td class="width_15 GST_section">
                                <!-- id="IGSTandCGST" -->
                                <select name="item_gst_type[]" id="item_gst_type0" class="Estimate_IGSTandCGST common_Estimate_IGSTandCGST form-control">
                                  <option value="" selected="selected">Select Type</option>
                                  <option value="IGST">IGST</option>
                                  <option value="CGST">CGST</option>
                                </select>
                              </td>
                              <td class="width_10 rate_data">
                                <select name="item_gst_discont[]" id="item_gst_discont0" class="DiscountPer form-control">
                                  <option value="0">0%</option>
                                  <option value="1">1%</option>
                                  <option value="2">2%</option>
                                  <option value="3">3%</option>
                                  <option value="5">5%</option>
                                  <option value="6">6%</option>
                                  <option value="12">12%</option>
                                  <option value="18">18%</option>
                                  <option value="28">28%</option>
                                </select>
                                <input type='hidden' class='item_igst_amount' name='item_igst_amount[]' value='0' />
                                <input type='hidden' class='item_cgst_amount' name='item_cgst_amount[]' value='0' />
                                <input type='hidden' class='item_sgst_amount' name='item_sgst_amount[]' value='0' />
                              </td>
                              <td class="width_15"><span class="main_amount">₹ 0000.00</span>
                              </td>
                              <td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount" style="display: none;">delete_outline</span>
                              </td>
                            </tr>
                            <tr id="SGST_Discount" class="SGST_Discount" style="display: none;">
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
                              </td>
                              <td class="width_15">
                                <input name="SGST" value="SGST" class="SGST form-control" type="text">
                              </td>
                              <td class="width_10 rate_data">
                                <!--<select name="item_sgst_discount[]" id="item_sgst_discount0" class="DiscountPer form-control ">
                                  <option value="">None</option>
                                  <option value="18%">18%</option>
                                  <option value="19%">19%</option>
                                </select>-->
                              </td>
                              <td class="width_15"><span class="main_amount">₹ 0000.00</span>
                              </td>
                              <td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount">delete_outline</span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div id="addButtonRow"> <span>
                        <center>
                          <div class="Estimate_add" type="button"><span class="material-icons-outlined" style="top:4px;">add_circle_outline</span> Add item</div>
                        </center>
                        </span><input type='hidden' name="items_selected_gst_type" id="items_selected_gst_type" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default" id="estimate_calculation">
              <div class="panel-heading">
                <div class="table-responsive">
                  <table class="table" id="Calculate_discounts">
                    <tr class="estimate_effect">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount (At estimate level)</span>
                      </td>
                      <td class="width_15 discount_section">
                        <select name="Estimate_Percentage_select" id="Estimate_Percentage_select" class="Estimate_Percentage form-control">
                          <option value="" selected="selected">Select Type</option>
                          <option value="Percentage">Percentage</option>
                          <option value="Amount">Amount</option>
                        </select>
                      </td>
                      <td class="width_10">
                        <input name="estimate_disc_amt" id="estimate_disc_amt" type="text" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        <input type="hidden" name="estimate_calculated_disc_amt" id="estimate_calculated_disc_amt" value="0" />
                      </td>
                      <td class="width_15"><span class="main_amount">₹ 0000.00</span>
                      </td>
                      <td class="width_10"><span class="material-icons-outlined estimate_remove_discount" style="display: none;">delete_outline</span>
                      </td>
                    </tr>
                    <tr class="estimate_effect CGST_TR_section">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At estimate level)</span>
                      </td>
                      <td class="width_15 GST_section">
                        <select name="estimate_gst_type" id="Calculate_IGSTandCGST_select" class="Calculate_IGSTandCGST common_Estimate_IGSTandCGST form-control Estimate_IGSTandCGST">
                          <option value="" selected="selected">Select Type</option>
                          <option value="IGST">IGST</option>
                          <option value="CGST">CGST</option>
                        </select>
                      </td>
                      <td class="width_10 rate_data">
                        <select name="calculate_rate" id="Calculate_rate" class="DiscountPer form-control">
                          <option value="0" selected="selected">0%</option>
                          <option value="1">1%</option>
                          <option value="2">2%</option>
                          <option value="3">3%</option>
                          <option value="5">5%</option>
                          <option value="6">6%</option>
                          <option value="12">12%</option>
                          <option value="18">18%</option>
                          <option value="28">28%</option>
                        </select>
                        <input type='hidden' class='estimate_igst_amount' name='estimate_igst_amount' value='0' />
                        <input type='hidden' class='estimate_cgst_amount' name='estimate_cgst_amount' value='0' />
                        <input type='hidden' class='estimate_sgst_amount' name='estimate_sgst_amount' value='0' />
                      </td>
                      <td class="width_15"><span class="main_amount">₹ 0000.00</span>
                      </td>
                      <td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount" style="display: none;">delete_outline</span>
                      </td>
                    </tr>
                    <tr id="SGST_Calculate" class="SGST_Discount" style="display: none;">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
                      </td>
                      <td class="width_15">
                        <input name="SGST" value="SGST" class="SGST form-control" type="text">
                      </td>
                      <td class="width_10 rate_data">
                        <!--<select name="SGST_Calculate_rate" id="SGST_Calculate_rate" class="DiscountPer form-control">
                          <option value="">None</option>
                          <option value="18%">18%</option>
                          <option value="19%">19%</option>
                        </select>-->
                      </td>
                      <td class="width_15"><span class="main_amount">₹ 0000.00</span>
                      </td>
                      <td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount">delete_outline</span>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="panel-body" id="Address_Details_Calculation">
                <div class="row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
                  <div class="col-md-12">
                    <div id="CalculateBtn"> <span>
                            <center>
                              <div class="form-group">
                                <button class="btn btn-primary text-center" type="button" onclick="calculate_estimate_summary()">Calculate</button>
                              </div>
                              <input type="hidden" name="total_estimate_val" id="total_estimate_value" value="0" />
                              <input type="hidden" name="estimate_summary_value" id="estimate_summary_value" value="0" />
                              <input type="hidden" name="estimate_items_discount_selected" id="estimate_items_discount_selected" value="0" />
                              <input type="hidden" name="estimate_items_gst_type_selected" id="estimate_items_gst_type_selected" value="0" />
                            </center>
                          </span>
                    </div>
                  </div>
                </div>
                <div class="row" id="main_calculation">
                  <div class="col-xs-12 col-md-offset-8 col-md-4">
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Subtotal</label>
                      <div class="col-xs-7 col-md-7"> <span class="estimate_subtotal">
                                ₹ 0000.00
                              </span><input type="hidden" name="estimate_subtotal_amount" id="estimate_subtotal_amount" value="0">
                      </div>
                    </div>
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total Discount</label>
                      <div class="col-xs-7 col-md-7"> <span class="estimate_total_discount">
                                ₹ 0000.00
                              </span><input type="hidden" name="estimate_totaldiscount_amount" id="estimate_totaldiscount_amount" value="0">
                      </div>
                    </div>
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total Taxes</label>
                      <div class="col-xs-7 col-md-7"> <span class="estimate_total_taxes">
                                ₹ 0000.00
                              </span><input type="hidden" name="estimate_totaltaxes_amount" id="estimate_totaltaxes_amount" value="0">
                      </div>
                    </div>
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total Amount</label>
                      <div class="col-xs-7 col-md-7"> <span class="estimate_total_amount">
                                ₹ 0000.00
                              </span><input type="hidden" name="estimatetotal_amount" id="estimatetotal_amount" value="0">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default" id="Terms_Conditions">
              <div class="panel-heading">Add Terms & Conditions</div>
              <div class="panel-body" id="">
                <div class="row">
                  <div class="col-md-12">
                    <div class="">
                      <textarea name="estimate_terms_conditions" id="estimate_terms_conditions" class="form-control textarea-content"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="estimate-custom-file-upload">
              <input type="file" name="attachment[]" value="" id="estimate_attachment" onchange="estimate_getFilenames()" multiple>
            </div>
          </div>

          <div class="col-xs-6 col-md-6">
            <div class="">
              <div class="">
                <ul class="estimate_filesList list-unstyled"></ul>
              </div>
            </div>
          </div>

        </div>

        </form>
      </div>
      </div>
    </div>
  </div>


<div id="EstimatePrviewModel" class="modal fade" role="dialog"></div>

<!-- New Create Estimate Form End -->

<!-- New Create Invoice Form Start -->

<div id="FinanceInvoiceModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content" id="Invoice_main_details">
      <div class="modal-header">
        <button type="button" id="close_button" class="close" data-dismiss="modal" onclick="resetData(this)">&times;</button>
        <h4 class="modal-title">Create Invoice</h4>
      </div>
      <div class="modal-body">
        <form id="invoiceForm" method="post" autocomplete="off">
          <div class="row">
            <div class="col-md-12">
              <div class="" style="margin-bottom: 15px;">
                <button type="button" class="btn btn-default" id="previewInvoice">Preview</button>
                <button type="submit" class="btn btn-primary" id="save_invoice_BTN_new">Save</button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default" id="Invoice_billedfrom">
                <div class="panel-heading">Billed From</div>
                <div class="panel-body" id="invoice_Address_Details">
                  <div class="row">
                    <div class="col-md-7">
                      <div class="invoice_BillingFromCard">
                        <h5><span class="material-icons-outlined usericoncard">person_add_alt_1</span><span class="invoice_billingcardtitle">Add a billing entity</span></h5>
                      </div>

                      <div class="invoice_BillingFromAddress" style="display: none;">
                            <div id="invoice_BillFromAddress_name" class="form-group"></div>
                            <div id="invoice_BillFromAddress_street" class="form-group"></div>
                            <div id="invoice_BillFromAddress_email_phone" class="form-group"></div>
                            <div id="invoice_BillFromAddress_num" class="form-group"></div>
                            <div id="invoice_BillFromAddress_panno" class="form-group"></div>
                            <div id="invoice_BillFromAddress_udyam" class="form-group"></div>
                        <div class="form-group  invoice_diff_billing_entity">  <span class="invoice_DiffBillingEntity">Choose a different billing entity</span>
                        </div>
                        <div class="form-group invoice_diff_gst_number"><span class="invoice_DiffGSTNum">Choose a different GSTIN</span></div>

                     <!--  <div class="form-group">  <span><b>Finnova Advisory Services Private Limited</b></span>
                        </div>
                        <div class="form-group">  <span>Office No 1, Tower No 2, Mayfair Towers, Shivaji Nagar Pune, Maharashtra - 411005</span>
                        </div>
                        <div class="form-group">  <span>fincrm@gmail.com</span>, <span>020 4004 7890</span>
                        </div>
                        <div class="form-group">  <span><b>GSTIN</b> - 29ABCDE1234F2Z5</span>
                        </div>
                        <div class="form-group">  <span><b>PAN</b> - CRAHS123AF</span>
                        </div>
                        <div class="form-group">  <span><b>UDYAM REGISTRATION NO.</b> - ADADA788945646</span>
                        </div> -->

                      </div>
                      <div class="invoice_BillingFrom_address_and_gst" style="display: none;">
                        <div class="form-group invoice_BillingFrom_address_main">
                          <select name="" id="invoice_BillingFrom_addr" class="invoice_BillingFrom_address form-control invoice_BillingFrom_addr">
                            <option value="">Select Billing Entity</option>

                           <!--  <option value="Finnova Advisory Services Private Limited">Finnova Advisory Services Private Limited</option> -->
                            <!-- <option value="Asbestos company Private Limited">Asbestos company Private Limited</option> -->
                            <!-- <option value="Bita level Private Limited">Bita level Private Limited</option> -->
                          </select>
                        </div>
                        <div class="form-group invoice_BillingFrom_gst_main">
                          <div class="form-group invoice_BillingFromGSTDetails_dropdown">
                            <select name="" id="invoice_BillingFrom_gstno" class="invoice_BillingFrom_gst form-control invoice_BillingFrom_gstno">
                              <option value="">Select GSTIN</option>
                              <!-- <option value="29ABCDE1234F2Z5">29ABCDE1234F2Z5</option> -->
                              <!-- <option value="32SAFSSA234FF4T">32SAFSSA234FF4T</option> -->
                            </select>
                        </div>
                        <div class="form-group invoice_BillingFromGSTDetails">
                                <div id="invoice_BillFromGST_name" class="form-group"></div>
                                <div id="invoice_BillFromGST_street" class="form-group"></div>
                                <div id="invoice_BillFromGST_email_phone" class="form-group"></div>
                                <div id="invoice_BillFromGST_num" class="form-group"></div>
                                <div id="invoice_BillFromGST_panno" class="form-group"></div>
                                <div id="invoice_BillFromGST_state" class="form-group"></div>
                                <div class="form-group invoice_diff_billing_entity"><span class="invoice_DiffBillingEntity">Choose a different billing entity</span></div>
                                <div class="form-group invoice_diff_gst_number"><span class="invoice_DiffGSTNum">Choose a different GSTIN</span></div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="row form-group">
                        <label class="col-md-5 pr0"><span class="pull-right">Invoice Number <span class="text-danger">*</span></span>
                        </label>
                        <div class="col-md-7">
                          <div class="">
                            <input name="invoice_number" id="invoice_number" class="form-control invoice_number " type="text">
                          </div>
                        </div>
                      </div>
                      <div class="row form-group">
                        <label class="col-md-5 pr0"><span class="pull-right">P.O./S.O. Number</span>
                        </label>
                        <div class="col-md-7">
                          <div class="">
                            <input name="invoice_po_so_number" class="form-control" type="text">
                          </div>
                        </div>
                      </div>
                      <div class="row form-group">
                        <label class="col-md-5 pr0"><span class="pull-right">Invoice Date <span class="text-danger">*</span></span>
                        </label>
                        <div class="col-md-7">

                          <div class="input-group date">
                            <input name="invoice_date" id="invoice_date" class="form-control invoice_date invoice_datepicker" type="text" onkeydown="return false" onfocus="invoice_getEvent(this)"> <span class="btn btn-default_gray input-group-addon" onclick="invoice_getAddEvent(this)"><span class="material-icons-outlined">date_range</span></span>
                          
                          </div>
                        </div>
                      </div>
                      <div class="row form-group">
                        <label class="col-md-5 pr0"><span class="pull-right">Due Date</span>
                        </label>
                        <div class="col-md-7">
                          <div  class="input-group date">
                            <input name="due_date" id="due_date" class="form-control due_date invoice_datepicker" type="text" onkeydown="return false" onfocus="invoice_getEvent(this)"> <span class="btn btn-default_gray input-group-addon" onclick="invoice_getAddEvent(this)"><span class="material-icons-outlined">date_range</span></span>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default" id="invoice_billedto">
                <div class="panel-heading">Billed To</div>
                <div class="panel-body" id="invoice_Address_Details_BillTo">
                  <div class="row">
                    <div class="col-md-7">
                      <div class="invoice_BillingToCard">
                        <h5><span class="material-icons-outlined usericoncard">person_add_alt_1</span><span class="invoice_billingcardtitle">Add a customer</span></h5>
                      </div>
                      <div class="invoice_BillingToAddress" style="display: none;">
                        <div id="invoice_BillToAddress_name" class="form-group"></div>
                          <div id="invoice_BillToAddress_street" class="form-group"></div>
                          <div id="invoice_BillToAddress_email_phone" class="form-group"></div>
                          <div id="invoice_BillToAddress_num" class="form-group"></div>
                          <div id="invoice_BillToAddress_panno" class="form-group"></div>
                          <div id="invoice_BillToAddress_udyam" class="form-group"></div>
                        <div class="form-group invoice_diff_customer_link">  <span class="invoice_Diffcustomer">Choose a different customer</span></div>
                        <div class="form-group invoice_diff_customer_gst"><span class="invoiceDiffcustomergst">Choose a different GSTIN</span></div>
                        <!-- <div class="form-group">  <span><b>Ryson Technologies Private Limited</b></span>
                        </div>
                        <div class="form-group">  <span>Dummy Address, Lorem Ipsum Sit Amet, Shivaji Nagar Pune, Maharashtra - 411005</span>
                        </div>
                        <div class="form-group">  <span>fincrm@gmail.com</span>, <span>020 4004 7890</span>
                        </div>
                        <div class="form-group">  <span><b>GSTIN</b> - 29ABCDE1234F2Z5</span>
                        </div>
                        <div class="form-group">  <span><b>PAN</b> - CRAHS123AF</span>
                        </div>
                        <div class="form-group">  <span><b>UDYAM REGISTRATION NO.</b> - ADADA788945646</span>
                        </div> -->
                      </div>
                      <div class="invoice_BillingTo_address_and_gst" style="display: none;">
                        <div class="form-group invoice_BillingTo_address_main">
                          <select name="" id="invoice_BillingTo_addr" class="invoice_BillingTo_address form-control">
                            <option value="">Select Customer</option>
                            <!-- <option value="Finnova Advisory Services Private Limited">Finnova Advisory Services Private Limited</option>
                            <option value="Asbestos company Private Limited">Asbestos company Private Limited</option>
                            <option value="Bita level Private Limited">Bita level Private Limited</option> -->
                          </select>
                        </div>
                        <div class="form-group invoice_BillingTo_gst_main" style="display: none;">
                          <div class="form-group invoice_BillingToGSTDetails_dropdown">
                          <select name="" id="invoice_BillingTo_gstno" class="invoice_BillingTo_gst form-control">
                            <option value="">Select GSTIN</option>
                            <!-- <option value="29ABCDE1234F2Z5">29ABCDE1234F2Z5</option> -->
                            <!-- <option value="32SAFSSA234FF4T">32SAFSSA234FF4T</option> -->
                          </select>
                        </div>
                        <div class="form-group invoice_BillingToGSTDetails">
                                <!--<div id="BillToGST_num" class="form-group"></div>
                                <div id="BillToGST_street" class="form-group"></div>
                                <div id="BillToGST_city" class="form-group"></div>
                                <div id="BillToGST_state" class="form-group"></div>
                                <div id="BillToGST_zipcode" class="form-group"></div>-->
                                <div id="invoice_BillToGST_name" class="form-group"></div>
                                <div id="invoice_BillToGST_address" class="form-group"></div>
                                <div id="invoice_BillToGST_email_phone" class="form-group"></div>
                                <div id="invoice_BillToGST_gst" class="form-group"></div>
                                <div id="invoice_BillToGST_pan" class="form-group"></div>
                                <div id="invoice_BillToGST_udyam" class="form-group"></div>
                                <div class="form-group invoice_diff_customer_link"><span class="invoice_Diffcustomer">Choose a different customer</span></div>
                                <div class="form-group invoice_diff_customer_gst"><span class="invoiceDiffcustomergst">Choose a different GSTIN</span></div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="table-responsive Finance_custom-a11yselect">
                      <table class="table" id="invoice_participantTable">
                        <thead>
                          <tr>
                            <th>
                              <input type="checkbox" class="invoice_header_checkbox">
                            </th>
                            <th class="text-center">S.N</th>
                            <th class="text-center">Item description</th>
                            <th class="width_15 text-center">HSN/SAC</th>
                            <th class="width_10 text-center">Quantity</th>
                            <th class="width_10 text-center">Rate (₹)</th>
                            <th>Amount (₹)</th>
                            <th><span class="material-icons-outlined invoice_header_delete" style="display: none;">delete_outline</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="invoice_participantRow">
                           <input type="hidden" name="invoice_total_items" id="invoice_total_items" value="1" />
                          <tr class="invoice_main-group">
                            <td>
                              <input type="checkbox" class="checkbox invoice_sub_checkbox">
                            </td>
                            <td class="invoice_sno"><span>1</span>
                            </td>
                            <td>
                               <input name="invoice_item_descr[]" id="invoice_item_descr0" type="text" value="" class="form-control invoice_item_descr">
                            </td>
                            <td>
                              <input name="invoice_item_hsn[]" id="invoice_item_hsn0" type="text" value="" class="form-control invoice_item_hsn" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </td>
                            <td>
                              <input name="invoice_item_qty[]" id="invoice_item_qty0" type="text" value="" class="form-control invoice_item_qty" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </td>
                            <td>
                              <input name="invoice_item_rate[]" id="invoice_item_rate0" type="text" value="" class="form-control invoice_item_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </td>
                            <td>
                              <!-- <span class="main_amount">₹ 10500.00</span> -->
                              <input type="text" class="form-control invoice_main_amount" name="invoice_item_main_amount[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </td>
                            <td>
                              <!-- <button class="btn btn-danger remove" type="button">Remove</button> -->  <span class="material-icons-outlined Invoice_remove">delete_outline</span>
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount (At item level)</span>
                            </td>
                            <td class="width_15 invoice_discount_section">
                             <select name="invoice_item_discount_type[]" id="invoice_item_discount_type0" class="Invoice_Percentage form-control ">
                                <option value="">Select Type</option>
                                <option value="Percentage">Percentage</option>
                                <option value="Amount">Amount</option>
                              </select>
                            </td>
                            <td class="width_10">
                              <input name="invoice_item_discount_rate[]" id="invoice_item_discount_rate0" type="text" value="" class="form-control invoice_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </td>
                            <td class="width_15"><span class="invoice_main_amount">₹ 0000.00</span>
                            </td>
                            <td class="width_10"><span class="material-icons-outlined invoice_remove_discount" style="display: none;">delete_outline</span>
                            </td>
                          </tr>
                          <tr class="invoice_CGST_TR_section">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At item level)</span>
                            </td>
                            <td class="width_15 invoice_GST_section">
                              <select name="invoice_item_gst_type[]" id="invoice_item_gst_type0" class="Invoice_IGSTandCGST common_Invoice_IGSTandCGST form-control">
                                <option value="">Select Type</option>
                                <option value="IGST">IGST</option>
                                <option value="CGST">CGST</option>
                              </select>
                            </td>
                            <td class="width_10 invoice_rate_data">
                              <select name="invoice_item_gst_discont[]" id="invoice_item_gst_discont0" class="invoice_DiscountPer form-control">
                                <option value="0">0%</option>
                                  <option value="1">1%</option>
                                  <option value="2">2%</option>
                                  <option value="3">3%</option>
                                  <option value="5">5%</option>
                                  <option value="6">6%</option>
                                  <option value="12">12%</option>
                                  <option value="18">18%</option>
                                  <option value="28">28%</option>
                              </select>
                              <input type='hidden' class='invoice_item_igst_amount' name='invoice_item_igst_amount[]' value='0' />
                                <input type='hidden' class='invoice_item_cgst_amount' name='invoice_item_cgst_amount[]' value='0' />
                                <input type='hidden' class='invoice_item_sgst_amount' name='invoice_item_sgst_amount[]' value='0' />
                            </td>
                            <td class="width_15" style="font-size:12px;"><span class="invoice_main_amount">₹ 0000.00</span>
                            </td>
                            <td class="width_10"><span class="material-icons-outlined invoice_remove_adddiscount invoice_rm_discount" style="display: none;">delete_outline</span>
                            </td>
                          </tr>
                          <tr id="invoice_SGST_Discount" class="invoice_SGST_Discount" style="display: none;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
                            </td>
                            <td class="width_15">
                              <input name="invoice_SGST" value="SGST" class="invoice_SGST form-control" type="text">
                            </td>
                            <td class="width_10 invoice_rate_data">
                              <!-- <select name="" id="" class="DiscountPer form-control">
                                <option value="">None</option>
                                <option value="18%">18%</option>
                                <option value="19%">19%</option>
                              </select> -->
                            </td>
                            <td class="width_15" style="font-size:12px;"><span class="invoice_main_amount">₹ 0000.00</span>
                            </td>
                            <td class="width_10"><span class="material-icons-outlined invoice_remove_adddiscount ">delete_outline</span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div id="invoice_addButtonRow"> <span>
                          <center>
                            <div class="Invoice_add" type="button"><span class="material-icons-outlined" style="top:4px;">add_circle_outline</span> Add item</div>
                      </center>
                      </span><input type='hidden' name="invoice_items_selected_gst_type" id="invoice_items_selected_gst_type" value="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default" id="invoice_calculation">
            <div class="panel-heading">
              <div class="table-responsive">
                <table class="table" id="invoice_Calculate_discounts">
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    <td class="width_40" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount (At Invoice level)</span>
                    </td>
                    <td class="width_15 invoice_discount_section">
                      <select name="Invoice_Percentage_select" id="Invoice_Percentage_select" class="Invoice_Percentage form-control">
                        <option value="" selected="selected">Select Type</option>
                        <option value="Percentage">Percentage</option>
                        <option value="Amount">Amount</option>
                      </select>
                    </td>
                    <td class="width_10">
                      <input name="invoice_disc_amt" id="invoice_disc_amt" type="text" value="" class="form-control invoice_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                      <input type="hidden" name="invoice_calculated_disc_amt" id="invoice_calculated_disc_amt" value="0" />
                    </td>
                    <td class="width_15"><span class="invoice_main_amount">₹ 0000.00</span>
                    </td>
                    <td class="width_10"><span class="material-icons-outlined invoice_remove_discount" style="display: none;">delete_outline</span>
                    </td>
                  </tr>
                  <tr class="invoice_CGST_TR_section">
                    <td></td>
                      <td></td>
                      <td></td>
                    <td class="width_40" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At Invoice level)</span>
                    </td>
                    <td class="width_15 invoice_GST_section">
                      <select name="invoice_gst_type" id="invoice_Calculate_IGSTandCGST_select" class="invoice_Calculate_IGSTandCGST common_Invoice_IGSTandCGST form-control Invoice_IGSTandCGST">
                        <option value="" selected="selected">Select Type</option>
                        <option value="IGST">IGST</option>
                        <option value="CGST">CGST</option>
                      </select>
                    </td>
                    <td class="width_10 invoice_rate_data">
                      <select name="invoice_calculate_rate" id="invoice_Calculate_rate" class="invoice_DiscountPer form-control">
                          <option value="0" selected="selected">0%</option>
                          <option value="1">1%</option>
                          <option value="2">2%</option>
                          <option value="3">3%</option>
                          <option value="5">5%</option>
                          <option value="6">6%</option>
                          <option value="12">12%</option>
                          <option value="18">18%</option>
                          <option value="28">28%</option>
                        </select>
                        <input type='hidden' class='invoice_igst_amount' name='invoice_igst_amount' value='0' />
                        <input type='hidden' class='invoice_cgst_amount' name='invoice_cgst_amount' value='0' />
                        <input type='hidden' class='invoice_sgst_amount' name='invoice_sgst_amount' value='0' />
                    </td>
                    <td class="width_15"><span class="invoice_main_amount">₹ 0000.00</span>
                    </td>
                    <td class="width_10"><span class="material-icons-outlined invoice_remove_adddiscount invoice_rm_discount" style="display: none;">delete_outline</span>
                    </td>
                  </tr>
                  <tr id="invoice_SGST_Calculate" class="invoice_SGST_Discount" style="display: none;">
                     <td></td>
                      <td></td>
                      <td></td>
                    <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
                    </td>
                    <td class="width_15">
                      <input name="invoice_SGST" value="SGST" class="invoice_SGST form-control" type="text">
                    </td>
                    <td class="width_10 invoice_rate_data">
                      <!-- <select name="" id="" class="DiscountPer form-control"> -->
                        <!-- <option value="">None</option>
                        <option value="18%">18%</option>
                        <option value="19%">19%</option> -->
                      <!-- </select> -->
                    </td>
                    <td class="width_15"><span class="invoice_main_amount">₹ 0000.00</span>
                    </td>
                    <td class="width_10"><span class="material-icons-outlined invoice_remove_adddiscount">delete_outline</span>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="panel-body" id="invoice_Address_Details_Calculation">
              <div class="row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
                <div class="col-md-12">
                  <div id="invoice_CalculateBtn"> <span>
                            <center>
                              <div class="form-group">
                                <button class="btn btn-primary text-center" type="button" onclick="calculate_invoice_summary()">Calculate</button>
                              </div>
                              <input type="hidden" name="total_invoice_val" id="total_invoice_value" value="0" />
                              <input type="hidden" name="invoice_summary_value" id="invoice_summary_value" value="0" />
                              <input type="hidden" name="invoice_items_discount_selected" id="invoice_items_discount_selected" value="0" />
                              <input type="hidden" name="invoice_items_gst_type_selected" id="invoice_items_gst_type_selected" value="0" />
                            </center>
                          </span>
                  </div>
                </div>
              </div>
              <div class="row" id="invoice_main_calculation">
                <div class="col-xs-12 col-md-offset-8 col-md-4">
                  <div class="form-group form-control">
                    <label class="col-xs-5 col-md-5 pr0 control-label">Subtotal</label>
                    <div class="col-xs-7 col-md-7"> <span class="invoice_subtotal">
                                ₹ 0000.00
                              </span><input type="hidden" name="invoice_subtotal_amount" id="invoice_subtotal_amount" value="0">
                    </div>
                  </div>
                  <div class="form-group form-control">
                    <label class="col-xs-5 col-md-5 pr0 control-label">Total Discount</label>
                    <div class="col-xs-7 col-md-7"> <span class="invoice_total_discount">
                                ₹ 0000.00
                              </span><input type="hidden" name="invoice_totaldiscount_amount" id="invoice_totaldiscount_amount" value="0">
                    </div>
                  </div>
                  <div class="form-group form-control">
                    <label class="col-xs-5 col-md-5 pr0 control-label">Total Taxes</label>
                    <div class="col-xs-7 col-md-7"> <span class="invoice_total_taxes">
                                ₹ 0000.00
                              </span><input type="hidden" name="invoice_totaltaxes_amount" id="invoice_totaltaxes_amount" value="0">
                    </div>
                  </div>
                  <div class="form-group form-control">
                    <label class="col-xs-5 col-md-5 pr0 control-label">Total Amount</label>
                    <div class="col-xs-7 col-md-7"> <span class="invoice_total_amount">
                                ₹ 0000.00
                              </span><input type="hidden" name="invoicetotal_amount" id="invoicetotal_amount" value="0">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default" id="invoice_Terms_Conditions">
            <div class="panel-heading">Add Terms & Conditions</div>
            <div class="panel-body" id="">
              <div class="row">
                <div class="col-md-12">
                  <div class="">
                   <textarea name="invoice_terms_conditions" id="invoice_terms_conditions" class="form-control textarea-content"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default" id="BankInvoice_Details">
            <div class="panel-heading">Add Bank details</div>
            <div class="panel-body" id="">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group invoice_select_account_main">
                    <select name="invoice_select_account" id="invoice_select_account" class="invoice_select_account form-control">
                      <option value="">Select Account</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="Invoice_AccountDetails" style="display: none;">

                   <!--   <div class="form-group">  <span>A/c Holder Name - <b>Finnova Advisory Services Private Limited Bank</b></span>
                    </div>
                    <div class="form-group">  <span>Name - <b>Kotak Mahindra</b></span>
                    </div>
                    <div class="form-group">  <span>A/C No. - <b>789456123789</b></span>
                    </div>
                    <div class="form-group">  <span>IFSC Code - <b>ADADA788945646</b></span>
                    </div>
                    <div class="form-group">  <span>UPI - <b>qwertyuiioij@kotak</b></span>
                    </div> -->

                    <div id="Holder_name" class="form-group"></div>
                    <div id="bank_name" class="form-group"></div>
                    <div id="acc_no" class="form-group"></div>
                    <div id="IFSC_Code" class="form-group"></div>
                    <div id="accountType" class="form-group"></div>
                    <div id="UPI" class="form-group"></div>
                    <div class="form-group">  <span class="Invoice_AccountDetails_Link">Choose a different bank details</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="row">
          <div class="col-xs-12">
                <div class="custom-file-upload">
                  <input type="file" name="invoice_attachment[]" id="invoice_attachment" onchange="getFilenames()"multiple>
                </div>
          </div>
          <div class="col-xs-12 col-md-6">
            <div class="">
              <div class="">
                <ul class="invoice_filesList list-unstyled"></ul>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<div id="InvoicePrviewModel" class="modal fade" role="dialog"></div>

<!-- New Create Invoice Form End -->
<script type="text/javascript">
// ################ MY code #######################
function ResetDiscount(element,id,text_msg)
{
  element.find(".custom-a11yselect-btn").attr("aria-activedescendant",id);
  element.find(".custom-a11yselect-btn .custom-a11yselect-text").text('');
  element.find(".custom-a11yselect-btn .custom-a11yselect-text").text(text_msg);
  element.find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
  element.find(".custom-a11yselect-menu .custom-a11yselect-option button:contains('"+text_msg+"')").closest("li").addClass("custom-a11yselect-selected custom-a11yselect-focused");
}
$(".Estimate_Percentage").customA11ySelect();
$(".Estimate_IGSTandCGST").customA11ySelect();
$(".Calculate_IGSTandCGST").customA11ySelect();
//$(".BillingFrom_address").customA11ySelect();
//$(".BillingFrom_gst").customA11ySelect();
//$(".BillingTo_address").customA11ySelect();
//$(".BillingTo_gst").customA11ySelect();
$(".DiscountPer").customA11ySelect();
$(".diff_billing_entity").hide();
$(".diff_gst_number").hide();
$(".diff_customer_link").hide();
$(".diff_customer_gst").hide();

$("#estimateForm #Address_Details .BillingFromCard").removeAttr("style");
$("#estimateForm #Address_Details_BillTo .BillingToCard").removeAttr("style");

$("#datepicker").datepicker({ 
    autoclose: true, 
    todayHighlight: true
}).datepicker('update', new Date());

//  On click of modal close
function resetData_estimate(current)
{
    /*$('#FinanceEstimateModal').on('hide.bs.modal', function(){
        $("#estimateForm").trigger("reset");
        $("#estimateForm").removeData('bs.modal');
        $("#BillingFrom_addr, #BillingFrom_gstno, #BillingTo_addr, #BillingTo_gstno, .Estimate_Percentage, .Estimate_IGSTandCGST, .DiscountPer, #Estimate_Percentage_select, #Calculate_IGSTandCGST_select, #Calculate_rate").customA11ySelect('refresh');
    });*/

    // resetHiddenFields();
    var modal_id=$(current).closest(".modal").find("form").attr("id");

    // $("#"+modal_id)[0].reset();
    // $("#"+modal_id).trigger("reset");

    $(".participantRow tr").remove();

    // ============ Code added by Sachin ============
    $("#total_items").val(1);
    $("#billfromname").remove();
    $("#billtoname").remove();
    $(".estimate_filesList ").empty();
    $("#estimateForm .BillingFromCard").removeAttr("style");
    $("#estimateForm .BillingToCard").removeAttr("style");
    $("#Address_Details .BillingFrom_address_and_gst").hide();
    $("#Address_Details_BillTo .BillingTo_address_and_gst").hide();
    $('#estimate_number').closest("div").find(".err").remove();
    $('#estimate_number').removeAttr("style");
    $('#selected_files').val("");

    $(".BillingFromAddress").css("display","none");
    $(".BillingToAddress").css("display","none");

    // ============ Code added by Sachin ============

    var element=$(".participantRow .main-group").length;

    if(element==0)
    {
        $('.participantRow').append(estimate_items_add);
        $(".Estimate_Percentage,.Estimate_IGSTandCGST,.DiscountPer").customA11ySelect();
    }

    // $("#datepicker").datepicker({ 
    //     autoclose: true, 
    //     todayHighlight: true
    // }).datepicker('update', new Date());

    // for discount
    var Calculate_discount_id=$("#Calculate_discounts .discount_section .custom-a11yselect-menu li:first").attr('id');

    var Calculate_discount_text=$("#Calculate_discounts .discount_section .custom-a11yselect-menu li:first button").text();

    var current_row=$("#Calculate_discounts .discount_section");

    ResetDiscount(current_row,Calculate_discount_id,Calculate_discount_text);

    //  for gst

    var Calculate_gst_id=$("#Calculate_discounts .GST_section .custom-a11yselect-menu li:first").attr('id');

    var Calculate_gst_text=$("#Calculate_discounts .GST_section .custom-a11yselect-menu li:first button").text();

    var current_gst_row=$("#Calculate_discounts .GST_section ");

    ResetDiscount(current_gst_row,Calculate_gst_id,Calculate_gst_text);

    //  for gst rate

    var Calculate_gst_rate_id=$("#Calculate_discounts .CGST_TR_section .rate_data .custom-a11yselect-menu li:first").attr('id');

    var Calculate_gst_rate_text=$("#Calculate_discounts .CGST_TR_section .rate_data .custom-a11yselect-menu li:first button").text();

    var current_gst_rate_row=$("#Calculate_discounts .CGST_TR_section .rate_data ");

    ResetDiscount(current_gst_rate_row,Calculate_gst_rate_id,Calculate_gst_rate_text);

    // for sgst rate

    var Calculate_sgst_rate_id=$("#Calculate_discounts .SGST_Discount .rate_data .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$("#Calculate_discounts .SGST_Discount .rate_data .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$("#Calculate_discounts .SGST_Discount .rate_data ");

    ResetDiscount(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);


    // for Bill from Select Billing Entity

    var Calculate_sgst_rate_id=$(".BillingFrom_address_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".BillingFrom_address_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".BillingFrom_address_main");

    ResetDiscount(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);

    // for Bill from Select select GSTIN

    var Calculate_sgst_rate_id=$(".BillingFrom_gst_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".BillingFrom_gst_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".BillingFrom_gst_main");

    ResetDiscount(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);

    // for Bill To Select Customer

    var Calculate_sgst_rate_id=$(".BillingTo_address_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".BillingTo_address_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".BillingTo_address_main");

    ResetDiscount(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);

    // for Bill To Select select GSTIN

    var Calculate_sgst_rate_id=$(".BillingTo_gst_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".BillingTo_gst_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".BillingTo_gst_main");

    ResetDiscount(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);

    $("#Calculate_discounts .SGST_Discount,#Calculate_discounts .estimate_remove_adddiscount,#Calculate_discounts .estimate_remove_discount").hide();

    $("#Calculate_discounts .main_amount").text("₹ 0000.00");
    $("#estimate_subtotal_amount, #estimate_totaldiscount_amount, #estimate_totaltaxes_amount, #estimatetotal_amount, #estimate_summary_value").val(0);
    $("#main_calculation .estimate_subtotal").text("₹ 0000.00");
    $("#main_calculation .estimate_total_discount").text("₹ 0000.00");
    $("#main_calculation .estimate_total_taxes").text("₹ 0000.00");
    $("#main_calculation .estimate_total_amount").text("₹ 0000.00");
    $("#summary_error").hide();
    $("#estimateForm")[0].reset();

    $("#total_estimate_val").val(0);
    $("#estimate_items_discount_selected").val(0);
    $("#estimate_items_gst_type_selected").val(0);
    $("#Calculate_discounts tr:first-child").removeAttr("style");

    $("#Calculate_discounts .CGST_TR_section").closest("tr").show();

    $("#FinanceEstimateModal #estimate_calculation .panel-heading").removeClass("remove-panel-color");

    $("#FinanceEstimateModal .header_delete").css("display","none");
}
</script>
<!-- New Create estimate script End -->

<!-- New Create Invoice Script start-->

<script type="text/javascript">
function ResetDiscount_inv(element,id,text_msg)
{
  element.find(".custom-a11yselect-btn").attr("aria-activedescendant",id);
  element.find(".custom-a11yselect-btn .custom-a11yselect-text").text('');
  element.find(".custom-a11yselect-btn .custom-a11yselect-text").text(text_msg);
  element.find(".custom-a11yselect-menu .custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
  element.find(".custom-a11yselect-menu .custom-a11yselect-option button:contains('"+text_msg+"')").closest("li").addClass("custom-a11yselect-selected custom-a11yselect-focused");
}
$(".Invoice_Percentage").customA11ySelect();
$(".Invoice_IGSTandCGST").customA11ySelect();
$(".invoice_Calculate_IGSTandCGST").customA11ySelect();
//$(".BillingFrom_address").customA11ySelect();
//$(".BillingFrom_gst").customA11ySelect();
//$(".BillingTo_address").customA11ySelect();
//$(".BillingTo_gst").customA11ySelect();
$(".invoice_DiscountPer").customA11ySelect();
$("#invoice_select_account").customA11ySelect();
$(".invoice_diff_billing_entity").hide();
$(".invoice_diff_gst_number").hide();
$(".invoice_diff_customer_link").hide();
$(".invoice_diff_customer_gst").hide();

$("#invoiceForm #invoice_Address_Details .invoice_BillingFromCard").removeAttr("style");
$("#invoiceForm #invoice_Address_Details_BillTo .invoice_BillingToCard").removeAttr("style");

// $("#datepicker").datepicker({ 
//     autoclose: true, 
//     todayHighlight: true
// }).datepicker('update', new Date());

//  On click of modal close
function resetData(current)
{
    var modal_id=$(current).closest(".modal").find("form").attr("id");

    $("#"+modal_id)[0].reset();
    // $("#FinanceInvoiceModal")[0].reset();

    $(".invoice_participantRow tr").remove();

    // ============ Code added by Sachin ============
    $("#invoice_billfromname").remove();
    $("#invoice_billtoname").remove();
    $("#invoice_total_items").val(1);
    // $(".invoice_select_account_main").remove();
    $("#invoice_select_account_main").empty().append('<option value="">Select Account</option>');
    $("#invoice_select_account_main").customA11ySelect('refresh');
    $("#invoiceForm .invoice_BillingFromCard").removeAttr("style");
    $("#invoiceForm .invoice_BillingToCard").removeAttr("style");
    $("#invoice_Address_Details .invoice_BillingFrom_address_and_gst").hide();
    $("#invoice_Address_Details_BillTo .invoice_BillingTo_address_and_gst").hide();
    $('#invoice_number').closest("div").find(".err").remove();
    $('#invoice_number').removeAttr("style");
    $('#Invoice_main_details #selected_files').val("");

    $(".invoice_BillingFromAddress").css("display","none");
    $(".invoice_BillingToAddress").css("display","none");

    // ============ Code added by Sachin ============

    var element=$(".invoice_participantRow .invoice_main-group").length;

    if(element==0)
    {
        $('.invoice_participantRow').append(invoice_items_add);
        $(".Invoice_Percentage,.Invoice_IGSTandCGST,.invoice_DiscountPer").customA11ySelect();
    }

    // $("#datepicker").datepicker({ 
    //     autoclose: true, 
    //     todayHighlight: true
    // }).datepicker('update', new Date());

    // for discount
    var Calculate_discount_id=$("#invoice_Calculate_discounts .invoice_discount_section .custom-a11yselect-menu li:first").attr('id');

    var Calculate_discount_text=$("#invoice_Calculate_discounts .invoice_discount_section .custom-a11yselect-menu li:first button").text();

    var current_row=$("#invoice_Calculate_discounts .invoice_discount_section");

    ResetDiscount_inv(current_row,Calculate_discount_id,Calculate_discount_text);

    //  for gst

    var Calculate_gst_id=$("#invoice_Calculate_discounts .invoice_GST_section .custom-a11yselect-menu li:first").attr('id');

    var Calculate_gst_text=$("#invoice_Calculate_discounts .invoice_GST_section .custom-a11yselect-menu li:first button").text();

    var current_gst_row=$("#invoice_Calculate_discounts .invoice_GST_section ");

    ResetDiscount_inv(current_gst_row,Calculate_gst_id,Calculate_gst_text);

    //  for gst rate

    var Calculate_gst_rate_id=$("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_rate_data .custom-a11yselect-menu li:first").attr('id');

    var Calculate_gst_rate_text=$("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_rate_data .custom-a11yselect-menu li:first button").text();

    var current_gst_rate_row=$("#invoice_Calculate_discounts .invoice_CGST_TR_section .invoice_rate_data ");

    ResetDiscount_inv(current_gst_rate_row,Calculate_gst_rate_id,Calculate_gst_rate_text);

    // for sgst rate

    var Calculate_sgst_rate_id=$("#invoice_Calculate_discounts .invoice_SGST_Discount .invoice_rate_data .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$("#invoice_Calculate_discounts .invoice_SGST_Discount .invoice_rate_data .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$("#invoice_Calculate_discounts .invoice_SGST_Discount .invoice_rate_data ");

    ResetDiscount_inv(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);


    // for Bill from Select Billing Entity

    var Calculate_sgst_rate_id=$(".invoice_BillingFrom_address_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".invoice_BillingFrom_address_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".invoice_BillingFrom_address_main");
    var bank_detail=$(".invoice_select_account_main .custom-a11yselect-menu li:first");

    ResetDiscount_inv(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text,bank_detail);

    // for Bill from Select select GSTIN

    var Calculate_sgst_rate_id=$(".invoice_BillingFrom_gst_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".invoice_BillingFrom_gst_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".invoice_BillingFrom_gst_main");

    ResetDiscount_inv(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);

    // for Bill To Select Customer

    var Calculate_sgst_rate_id=$(".invoice_BillingTo_address_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".invoice_BillingTo_address_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".invoice_BillingTo_address_main");

    ResetDiscount_inv(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);

    // for Bill To Select select GSTIN

    var Calculate_sgst_rate_id=$(".invoice_BillingTo_gst_main .custom-a11yselect-menu li:first").attr('id');

    var Calculate_sgst_rate_text=$(".invoice_BillingTo_gst_main .custom-a11yselect-menu li:first button").text();

    var current_sgst_rate_row=$(".invoice_BillingTo_gst_main");

    ResetDiscount_inv(current_sgst_rate_row,Calculate_sgst_rate_id,Calculate_sgst_rate_text);

    $("#invoice_Calculate_discounts .invoice_SGST_Discount,#invoice_Calculate_discounts .invoice_remove_adddiscount,#invoice_Calculate_discounts .invoice_remove_discount").hide();

    $("#invoice_Calculate_discounts .invoice_main_amount").text("₹ 0000.00");
    $("#invoice_subtotal_amount, #invoice_totaldiscount_amount, #invoice_totaltaxes_amount, #invoicetotal_amount, #invoice_summary_value").val(0);
    $("#invoice_main_calculation .invoice_subtotal").text("₹ 0000.00");
    $("#invoice_main_calculation .invoice_total_discount").text("₹ 0000.00");
    $("#invoice_main_calculation .invoice_total_taxes").text("₹ 0000.00");
    $("#invoice_main_calculation .invoice_total_amount").text("₹ 0000.00");
    $("#invoice_summary_error").hide();
    $("#invoiceForm")[0].reset();

    $("#total_invoice_value").val(0);
    $("#invoice_items_discount_selected").val(0);
    $("#invoice_items_gst_type_selected").val(0);
    $("#FinanceInvoiceModal #invoice_calculation .panel-heading ").removeClass("remove-panel-color");
    $("#FinanceInvoiceModal .invoice_header_delete").css("display","none");
    $("#invoice_Calculate_discounts tr:first-child").removeAttr("style");

    $("#invoice_Calculate_discounts .invoice_CGST_TR_section").closest("tr").show();
    $(".Invoice_AccountDetails").hide();
    $("#Holder_name,#bank_name,#acc_no,#IFSC_Code,#accountType,#UPI").empty();
    $(".invoice_select_account_main #invoice_select_account").css("display","block !important");
    $(".Invoice_AccountDetails").css("display","none");
    $(".Invoice_AccountDetails #Holder_name,.Invoice_AccountDetails #bank_name,.Invoice_AccountDetails #acc_no,.Invoice_AccountDetails #IFSC_Code,.Invoice_AccountDetails #accountType,.Invoice_AccountDetails #UPI").empty();
    $("#invoice_select_account-button").css("display","block");

    var add_bank_id=$(".invoice_select_account_main .custom-a11yselect-menu li:first").attr('id');

    var add_bank_text=$(".invoice_select_account_main .custom-a11yselect-menu li:first button").text();

    var add_bank_row=$(".invoice_select_account_main");

    ResetDiscount_inv(add_bank_row,add_bank_id,add_bank_text);

    $('#invoice_select_account').find('option').remove();
    $('#invoice_select_account').append('<option value="">Select Account</option>');
    $("#invoice_select_account").customA11ySelect('refresh');



}
</script>
<!-- New Create Invoice Script start-->

<script type="text/javascript">
$(function () {
$("#invoice_date, #due_date").datepicker({
autoclose: true,
todayHighlight: true,
format: "dd/mm/yyyy",
orientation: "top"
}).datepicker('update', new Date());
});
</script>

<!-- New Create Invoice Script start-->

<!-- Estimate datepicked -->
<script type="text/javascript">
// $(function () {
// $(".estimate_datepicker").datepicker({
// autoclose: true,
// todayHighlight: true,
// format: "dd/mm/yyyy",
// orientation: "top"
// }).datepicker('update', new Date());
// });


// $(document).on("click", ".date", function(){
//     $( ".date" ).datepicker({
//       format: "dd/mm/yyyy",
//       autoclose: true, 
//       todayHighlight: true,
//       orientation: "top"
//     });
// });


</script>

<!-- Date validation script start  -->
<!-- <script>

$(document).on("change","#due_date_val",function(){
        var invDate = $(".invoice_date").val();
        var dueDate = $(".due_date").val();
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        CurrentDate = dd + '/' + mm + '/' + yyyy;
        if(invDate==""){
            $.alert("Please select invoice date first");
        }
        else(invDate>dueDate)
        {
            $.confirm({
                title: 'Warning!',
                content: 'Please select date greater than invoice date',
                buttons: {
                    Ok: function (){
                        $(".due_date").val("");
                        // delete(count);
                    }
                }
            });
        }
});
</script> -->

<!-- convert attach file icon to material icon script start here -->
<script>
    ;(function($) {
      //alert("Hello....");
        // Browser supports HTML5 multiple file?
        var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
        isIE = /msie/i.test( navigator.userAgent );

        $.fn.customFile = function() 
        {
          //alert("hi");
            return this.each(function(){
              //alert("hi");
                var $file = $(this).addClass('custom-file-upload-hidden'), // the original file input
                $wrap = $('<div class="file-upload-wrapper">'),
                $input = $('<input id="selected_files" type="hidden" name="feedback_attachment[]" class="file-upload-input" multiple/>'),
                // Button that will be used in non-IE browsers
                $button = $('<button type="button" class="file-upload-button"><i class="material-icons-outlined">attach_file</i> </button>'),
                // Hack for IE
                $label = $('<label class="file-upload-button" for="'+ $file[0].id +'"><i class="material-icons-outlined">attach_file</i> </label>');

                // Hide by shifting to the left so we
                // can still trigger events
                $file.css({
                position: 'absolute',
                left: '-9999px'
                });

                $wrap.insertAfter( $file ).append( $file, $input, ( isIE ? $label : $button ) );

                // Prevent focus
                $file.attr('tabIndex', -1);
                $button.attr('tabIndex', -1);

                $button.click(function () {
                $file.focus().click(); // Open dialog
                });

                $file.change(function(){
                    var files = [], fileArr, filename;
                    // If multiple is supported then extract
                    // all filenames from the file array
                    if ( multipleSupport ){
                        fileArr = $file[0].files;
                        for ( var i = 0, len = fileArr.length; i < len; i++ )
                        {
                        files.push( fileArr[i].name );
                        }
                        filename = files.join(', ');

                        // If not supported then just take the value
                        // and remove the path to just show the filename
                    } else
                    {
                        filename = $file.val().split('\\').pop();
                    }

                    $input.val( filename ) // Set the value
                    .attr('title', filename) // Show filename in title tootlip
                    .focus(); // Regain focus
                });


                $input.on({

                    blur: function() { $file.trigger('blur'); },
                    keydown: function( e ) {

                        if ( e.which === 13 ) { // Enter
                            if ( !isIE ) { $file.trigger('click'); }

                        }else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
                            // On some browsers the value is read-only
                            // with this trick we remove the old input and add
                            // a clean clone with all the original events attached
                            $file.replaceWith( $file = $file.clone( true ) );
                            $file.trigger('change');
                            $input.val('');
                        } else if ( e.which === 9 ){ // TAB
                            return;
                        } else { // All other keys
                            return false;
                        }
                    }
                });
            });
        };

        // Old browser fallback
        if ( !multipleSupport ) {

            $( document ).on('change', 'input .customfile', function() {

                var $this = $(this),
                // Create a unique ID so we
                // can attach the label to the input
                uniqId = 'customfile_'+ (new Date()).getTime(),
                $wrap = $this.parent(),

                // Filter empty input
                $inputs = $wrap.siblings().find('.file-upload-input')
                .filter(function(){ return !this.value }),

                $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

                setTimeout(function() {
                    // Add a new input
                    if ( $this.val() ) {

                        if ( !$inputs.length ) {
                            $wrap.after( $file );
                            $file.customFile();
                        }
                    } else {
                        $inputs.parent().remove();
                        $wrap.appendTo( $wrap.parent() );
                        $wrap.find('input').focus();
                    }

                }, 1);
            });
        }
    }(jQuery));

  $('#FinanceInvoiceModal input[type=file]').customFile();
   $('#FinanceEstimateModal input[type=file]').customFile();
    
</script>
<!-- Edit attach file icon to material icon script end here -->

<!-- <script type="text/javascript">
  // $( document ).ready(function() {
  // $('.invoice_date').blur(function(){
  // var count=0;
  $(document).on("change",".invoice_date",function(){
    // alert("in fun");
        var invDate = $(".invoice_date").val();
        var dueDate = $(".due_date").val();
        // alert("invDate"+invDate);
        // alert("dueDate"+dueDate);
        // if(count==2){
        if(invDate>dueDate)
        {
            $('.invoice_date').confirm({
                title: 'Warning!',
                content: 'Invoice date is greater than due date',
                buttons: {
                    Ok: function (){
                        $(".edit_due_date").val(invDate); 
                        // delete(count);
                    }
                }
            });
        }
        // count++;
    // }
    // count=0;
  });


 // function dueDateval(){
    $(document).on("change",".due_date",function(){
      // alert("In due date ");
        var invDate = $(".invoice_date").val();
        var dueDate = $(".due_date").val();
        // alert("invDate"+invDate);
        // alert("dueDate"+dueDate);


        if(invDate==""){
            $('.due_date').confirm({
                content: "Please select invoice date first",
            });
        }
        else(invDate>dueDate)
        {
             $('.due_date').confirm({
                content: "Please select date greater than invoice date",
            });
        }
    });



  // });

</script> -->


<script>

    $(document).on("change","input[name='estimate_date']",function(){
        $(this).removeAttr('style');
        $(this).closest(".input-group").parent().find(".err").remove();
    });

        var count=0;
        var count1=0;
        $(document).on("change","#invoice_date",function(event){
            event.preventDefault();
            event.stopImmediatePropagation();
            var val1= $(".invoice_date").val();
            var val= document.getElementById("due_date").value;
            var parts =val1.split('/');
            var selectedINVDate= parts[1]+"-"+parts[0]+"-"+parts[2];
            var selectedINVDate = new Date(selectedINVDate);

            var parts1 =val.split('/');
            var selectedORDDate= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
            var selectedORDDate = new Date(selectedORDDate);

            if(selectedINVDate  >  selectedORDDate){
              count1++;
              if(count1== 2){
                $.alert("Due date can not be before invoice date.");
                $(".due_date").val('');
                $(".invoice_date").val("");
                count1=0;
              }
            }
            $(this).removeAttr('style');
            $(this).closest(".input-group").parent().find(".err").remove();
        });

         $(document).on("change","#due_date",function(event){
            event.preventDefault();
            event.stopImmediatePropagation();
            var val1= $(".invoice_date").val();
            var val= document.getElementById("due_date").value;
            var parts =val1.split('/');
            var selectedINVDate= parts[1]+"-"+parts[0]+"-"+parts[2];
            var selectedINVDate = new Date(selectedINVDate);

            var dueDate= new Date(val);
            var parts1 =val.split('/');
            var selectedDUEDate= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
            var selectedDUEDate = new Date(selectedDUEDate);

            if(selectedINVDate > selectedDUEDate){
              count++;
              if(count==2){
                $.alert("Due date can not be before invoice date.");
                // document.getElementById("due_date").val(val1);
                $(".due_date").val('');
                count=0;
              }  
            }
         });   
</script>


<!-- Estimate datepicker popover position -->
<script type="text/javascript">
//  for datepicker position start

function estimate_getDateEvent(e){
    $("#FinanceEstimateModal .datepicker").removeClass("date_position1");
    $(e).addClass("date_position1");
}

$("#FinanceEstimateModal").scroll(function() {
     var add_date1=$("input[class$='date_position1']");
    // alert(" GetDateEvent "+add_date1);

      if(add_date1.length)
      {
        var date_topPos = add_date1.offset().top;
        var date_leftPos = add_date1.offset().left;
        $(".datepicker").css("top", date_topPos+35);
        $(".datepicker").css("left", date_leftPos);
      }
  });

function estimate_focus_datepicker(e)
{
  $(e).closest("div").find("input").focus();
  estimate_getDateEvent($(e).closest("div").find("input"));
 
}


// for datepicker position end

</script>

<script type="text/javascript">

  function invoice_getEvent(e)
  {
      $(".invoice_datepicker").removeClass("invoice_datepicker_position");
      $(e).addClass("invoice_datepicker_position");
  }
  function invoice_getAddEvent(e)
  {
      $(".invoice_datepicker").removeClass("invoice_datepicker_position");
      $(e).closest("div").find(".invoice_datepicker").addClass("invoice_datepicker_position");
  }

    $("#FinanceInvoiceModal").scroll(function() {
     var invoice_datePicker=$("input[class$='invoice_datepicker_position']");
      if(invoice_datePicker.length)
      {
         var topPos = invoice_datePicker.offset().top;
         var leftPos = invoice_datePicker.offset().left;
         $(".datepicker").css("top", topPos+35);
         $(".datepicker").css("left", leftPos);
      }

      
  });
  </script>

<!-- Manage Billing Entity -->


<!-- Custom Content Templates Form Modal in Campaigns Start -->

<!-- Modal -->
<div id="create_contentTemplateModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-emailwidth">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Content Template</h4>
      </div>
      <div class="modal-body">
        <form class="ContentTemplatesForm" action="../../client/res/templates/bulk_message/contentTemplate/saveContentTemplate.php" method="POST" style="border: 1px solid #ccc;padding: 15px;border-radius: 15px;">
          <div class="row">
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Template Name</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <input type="text" class="main-element form-control" name="TemplateName" value="" placeholder="Template Name" required="">
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Principle Entity Id</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <input type="text" class="main-element form-control" name="PrincipleEntityId" value="" placeholder="Principle Entity Id" required="">
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Template Id</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <input type="text" class="main-element form-control" name="TemplateId" value="" placeholder="Template Id" required="">
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Content Type</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <select name="content_type" id="content_type" class="form-control" required="">
                    <option value="">Select Content Type</option>
                    <option value="Transactional">Transactional</option>
                    <option value="Promotional">Promotional</option>
                    <option value="Service Explicit">Service Explicit</option>
                    <option value="Service Implicit">Service Implicit</option>
                  </select>
                  <span class="error_main text-danger" style="display: none;">Please select content type</span>
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Category Type</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <select name="category_type" id="category_type" class="form-control" required="">
                    <option value="">Select Category Type</option>
                    <option value="Banking/Insurance/Financial products/ credit cards">Banking/Insurance/Financial products/ credit cards </option>
                    <option value="Real Estate">Real Estate</option>
                    <option value="Education">Education</option>
                    <option value="Health">Health</option>
                    <option value="Consumer goods and automobiles">Consumer goods and automobiles</option>
                    <option value="Communication/Broadcasting/Entertainment/IT">Communication/Broadcasting/Entertainment/IT</option>
                    <option value="Tourism and Leisure">Tourism and Leisure</option>
                    <option value="Food and Beverages">Food and Beverages</option>
                    <option value="Others">Others</option>
                  </select>
                  <span class="error_main text-danger" style="display: none;">Please select category type</span>
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Sender Id</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <select name="Sender_Id" id="Sender_Id" class="form-control" required="">
                    <option value="">Select Sender Id</option>
                  </select>
                  <span class="error_main text-danger" style="display: none;">Please select sender id</span>
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Template Type</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <select name="unicodeType" id="unicodeType" class="form-control" required="">
                    <option value="">Select Template Type</option>
                    <option value="Text Template">Text Template</option>
                    <option value="Unicode Template">Unicode Template</option>
                  </select>
                  <span class="error_main text-danger" style="display: none;">Please select template type</span>
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <div class="row">
                  <div class="col-xs-9">
                     <label class="control-label" style="margin-top: 10px;display: inline-block;"><span class="label-text">Template Content</span><span class="required-sign"> *</span>
                    </label>
                  </div>
                  <div class="col-xs-3">
                    <button type="button" class="btn btn-primary pull-right" id="addVariable" style="font-size: 11px;"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Add Variable</button>
                  </div>
                </div>
                <div class="field">
                  <textarea id="TemplateContents" name="TemplateContents" class="form-control" placeholder="Type Message Here" rows="4" required="" value=""></textarea>
                  <div>
                    <span>Characters: <b class="smsBodyLenght">0 </b></span> 
                    <span> SMS Credits: <b class="smscount">0</b></span>
                  </div>
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <div class="bg bg-danger" style="padding: 10px;white-space: pre-line;"><b>Note:</b> Add Variable within curly brackets with hash(#) mark . Ex: Dear {#var#}, Good morning.</div>
              </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary pull-right" id="save_changes">Save Changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<!-- Custom Content Templates Form Modal in Campaigns End -->

<!-- Custom Content Templates Form Modal in Campaigns Script Start -->
  
  <script type="text/javascript">
$(document).ready(function() {
    $("#content_type, #category_type, #unicodeType").customA11ySelect();

    // Append a text in textarea on add variable btn click
    $(document).on('click',"#addVariable",function(add_eventVariable){
      //$('#TemplateContents').append('{#var#}');
      add_eventVariable.preventDefault();
      add_eventVariable.stopImmediatePropagation();
      var char = $("#TemplateContents").val()+"{#var#}";
      $("#TemplateContents").empty("");
      $("#TemplateContents").val(char);
    });

    // Count Characters in textarea on type
    var SMSCount = 1;
    var smsBodyLenght1 = 0;
    $('#TemplateContents').on("keyup", function(event) {
     smsBodyLenght1 = $(this).val().length;
     if(SMSCount == 0){
      SMSCount = 1;
     }

    $(".smsBodyLenght").html(smsBodyLenght1);
    if(smsBodyLenght1%160 == 0){
      if (event.keyCode == 8 || event.keyCode == 46) {
        if (SMSCount >=1){
          SMSCount--;
        }
          
         event.preventDefault();
      }
      else{
        SMSCount++;
      }
    }

      $(".smscount").html(SMSCount); 

    });


    $( "#inputBank" ).change(function() {
    $(this).closest('form').bootstrapValidator('revalidateField', $(this).prop('name'));
    });

    // $('#create_contentTemplateModal').on('hide.bs.modal', function(){
    $(document).on('click','#create_contentTemplateModal .close', function(){
            $(this).removeData('bs.modal');
            $('.cell').removeClass('has-success');
            $('.cell').removeClass('has-error');
            $('.ContentTemplatesForm').bootstrapValidator('resetForm', true);
            $(".smsBodyLenght").html(0);
            $(".smscount").html(0); 
            $(".error_main").hide(); 
            $("#content_type, #category_type, #unicodeType, #Sender_Id").customA11ySelect('refresh');
        });

    $('#create_contentTemplateModal input[type="text"],#create_contentTemplateModal select, #create_contentTemplateModal textarea').focus(function(){
      $('.cell').removeClass('has-success');
    });

  /*All select Change event jquery validation Start*/

    $('#content_type-button,#category_type-button,#unicodeType-button,#Sender_Id-button').addClass('form-control');


  $(document).on('change',"#content_type",function(){
    var content_type = $(this).val();
    if(content_type == "" ) {
        $("#content_type").parent('.field').find('.error_main').css("display","inline-block");
        $(this).closest('.form-group').addClass('has-error');
        $(this).closest('.form-group').find('.custom-a11yselect-btn .custom-a11yselect-text').css('color','#9999A6');
      }else{
        $(this).closest('.form-group').find('.custom-a11yselect-btn .custom-a11yselect-text').removeAttr('style');
        $("#content_type").parent('.field').find('.error_main').css("display","none");
        $(this).closest('.form-group').removeClass('has-error');
      } 
  });

   $(document).on('change',"#category_type",function(){
    var category_type = $(this).val();
    if( category_type == "" ){
        $("#category_type").parent('.field').find('.error_main').css("display","inline-block");
        $(this).closest('.form-group').addClass('has-error');
        $(this).closest('.form-group').find('.custom-a11yselect-btn .custom-a11yselect-text').css('color','#9999A6');
      } else{
        $(this).closest('.form-group').find('.custom-a11yselect-btn .custom-a11yselect-text').removeAttr('style');
        $("#category_type").parent('.field').find('.error_main').css("display","none");
        $(this).closest('.form-group').removeClass('has-error');
      } 
  });

    $(document).on('change',"#Sender_Id",function(){
    var Sender_Id = $(this).val();
    if( Sender_Id == ""){
         $("#Sender_Id").parent('.field').find('.error_main').css("display","inline-block");
         $(this).closest('.form-group').addClass('has-error');
         $(this).closest('.form-group').find('.custom-a11yselect-btn .custom-a11yselect-text').css('color','#9999A6');
         //alert($("#Sender_Id").parent('.field').find('.error_main').text());
      } else{
        $(this).closest('.form-group').find('.custom-a11yselect-btn .custom-a11yselect-text').removeAttr('style');
        $("#Sender_Id").parent('.field').find('.error_main').css("display","none");
        $(this).closest('.form-group').removeClass('has-error');
      }  
  });

     $(document).on('change',"#unicodeType",function(){
    var unicodeType = $(this).val();
    if( unicodeType == "" ){
          $("#unicodeType").parent('.field').find('.error_main').css("display","inline-block");
          $(this).closest('.form-group').addClass('has-error');
          $(this).closest('.form-group').find('.custom-a11yselect-btn .custom-a11yselect-text').css('color','#9999A6');
        }
      else{
        $(this).closest('.form-group').find('.custom-a11yselect-btn .custom-a11yselect-text').removeAttr('style');
        $("#unicodeType").parent('.field').find('.error_main').css("display","none");
        $(this).closest('.form-group').removeClass('has-error');
      } 
  });

  /*All select Change event jquery validation End*/

/*Custom Content Templates Form Modal in Campaigns bootstrap validation Script Start*/
$('#create_contentTemplateModal .custom-a11yselect-container .custom-a11yselect-btn .custom-a11yselect-text').css('color','#9999A6');
    $("#save_changes").click(function(){

      var content_type1 = $("#content_type").val();
      var category_type1 = $("#category_type").val();
      var Sender_Id1 = $("#Sender_Id").val();
      var unicodeType1 = $("#unicodeType").val();
      //alert(content_type1);
      if(content_type1 == "" ) {
        $("#content_type").parent('.field').find('.error_main').css("display","inline-block");
        $('#content_type').closest('.form-group').addClass('has-error');
      }else{
        $("#content_type").parent('.field').find('.error_main').css("display","none");
      } 

      if( category_type1 == "" ){
        $("#category_type").parent('.field').find('.error_main').css("display","inline-block");
        $('#category_type').closest('.form-group').addClass('has-error');
      } else{
        $("#category_type").parent('.field').find('.error_main').css("display","none");
      } 

      if( Sender_Id1 == ""){
         $("#Sender_Id").parent('.field').find('.error_main').css("display","inline-block");
         $('#Sender_Id').closest('.form-group').addClass('has-error');
         // console.log($("#Sender_Id").parent('.field').find('.error_main').text());
      } else{
        $("#Sender_Id").parent('.field').find('.error_main').css("display","none");
      } 

      if( unicodeType1 == "" ){
          $("#unicodeType").parent('.field').find('.error_main').css("display","inline-block");
          $('#unicodeType').closest('.form-group').addClass('has-error');
        }
      else{
        $("#unicodeType").parent('.field').find('.error_main').css("display","none");
      }
    });

    $('.ContentTemplatesForm').bootstrapValidator({
        message: 'Please enter valid input',
        feedbackIcons: { },
        fields: {
            "TemplateName": {
                validators: {
                    notEmpty: {
                        message: 'Please enter template name'
                    }
                }
            },
            "PrincipleEntityId": {
                validators: {
                    notEmpty: {
                        message: 'Please enter principle entity id'
                    }
                }
            },
            "TemplateId": {
                validators: {
                    notEmpty: {
                        message: 'Please enter template id'
                    }
                }
            },
            "content_type": {
                validators: {
                    notEmpty: {
                        message: 'Please select content type'
                    }
                }
            },
            "category_type": {
                validators: {
                    notEmpty: {
                        message: 'Please select category type'
                    }
                }
            },
            "Sender_Id": {
                validators: {
                    notEmpty: {
                        message: 'Please select sender id'
                    }
                }
            },
            "unicodeType": {
                validators: {
                    notEmpty: {
                        message: 'Please select template type'
                    }
                }
            },
            "TemplateContents": {
                validators: {
                    notEmpty: {
                        message: 'Please enter template content'
                    }
                }
            }
        }
    }).on('success.form.bv', function (event, data) {

        event.preventDefault();

        var form  = $(this);
        var url   = form.attr('action');
        form      = new FormData(form[0]);
        $.ajax({
          type    : "POST",
          url     : url,
          data    : form,
          dataType  : "json",
          processData : false,
          contentType : false,
          success: function(data) {

            if(data.status == 'true') {

              $.alert({
                title: 'Success!',
                content: data.msg,
                type: 'dark',
                typeAnimated: true,
                buttons: {
                        Ok: function () {
                            $('button[data-action="reset"]').trigger('click');
                            //$('#create_contentTemplateModal').modal('toggle');
                            $("#create_contentTemplateModal .close").click();
                            $('.ContentTemplatesForm').bootstrapValidator('resetForm', true);
                        }
                    }
              });

            }else{
              $.alert({
                title: 'Alert!',
                content: data.msg,
                type: 'dark',
                typeAnimated: true,
              });
            }
          }
        });

        return false;
    });
});
/* Custom Content Templates Form Modal in Campaigns bootstrap validation Script End */

//GET SENDER ID'S
$('#create_contentTemplate').click(function(){

  $("#Sender_Id").html('');
  $.ajax({
          type    : "POST",
          url     : "../../client/res/templates/bulk_message/contentTemplate/getSenderId.php",
          dataType  : "json",
          success: function(data) {
             if(data.status == 'true'){

                $("#Sender_Id").html('');
                $("#Sender_Id").html('<option value="" >Select Sender Id</option>');

                if(data.senderIds){
                  $.each(data.senderIds, function (key, val) {
                    $("#Sender_Id").append('<option value="'+val+'" >'+key+' </option>');
                  });
                }
                
                $("#Sender_Id").customA11ySelect('refresh');
                $('#Sender_Id-button').addClass('form-control');
                $('#create_contentTemplateModal .custom-a11yselect-container .custom-a11yselect-btn .custom-a11yselect-text').css('color','#9999A6');
             }
          }
        });
});

//GET SELECTED SENDER ID CONTENT TEMPLATES FOR SEND SMS FORM
$('.select-sender-id').change( function(){
  
  var senderId   = $('.select-sender-id').val();

  $.ajax({
      type    : "GET", 
      url     : "../../client/res/templates/bulk_message/contentTemplate/getContentTemplateName.php?senderId="+senderId,
      dataType  : "json",
      success: function(data) {
         if(data.status == 'true'){

            $("#sms_content_template").html('');
            $("#sms_content_template").html('<option value="" > Select Content Template </option>');

             if(data.contentTemplateName){
                $.each(data.contentTemplateName, function (key, val) {
                    $("#sms_content_template").append('<option value="'+val+'" >'+key+' </option>');
                });
             }

             $("#sms_content_template").customA11ySelect('refresh');

             $('#send-sms-form').bootstrapValidator('addField', 'sms_content_template', {
                validators: {
                    notEmpty: {
                        message: 'Please select content template.'
                    }
                }
             });                
         }
      }
    });
});

//GET SMS BODY CONTENT FOR SEND SMS FORM
$('#sms_content_template').change( function(){

  var smsContentTemplate   = $('#sms_content_template').val();

  $.ajax({
      type    : "GET", 
      url     : "../../client/res/templates/bulk_message/contentTemplate/getContentTemplateDetails.php?smsContentTemplate="+smsContentTemplate,
      dataType  : "json",
      success: function(data) {
         if(data.status == 'true'){

            $('#sms_text').val(data.contentTemplateBody);
            $('.sendSmsBodyLenght').html(data.smsLengthCount);
            $('.sendSmscount').html(data.smsCount);

            //$('#send-sms-form').bootstrapValidator('enableFieldValidators', 'sms_text', false); 
            $('#send-sms-form').bootstrapValidator('addField', 'sms_text', {
                validators: {
                    notEmpty: {
                        message: 'Please enter message.'
                    }
                }
            });             
         }
      }
    });
});

//GET SELECTED SENDER ID CONTENT TEMPLATES FOR ADD SMS REMINDER FORM
$('#smssenderid').change( function(){
  
  var senderId   = $('#smssenderid').val();

  $.ajax({
      type    : "GET", 
      url     : "../../client/res/templates/bulk_message/contentTemplate/getContentTemplateName.php?senderId="+senderId,
      dataType  : "json",
      success: function(data) {
         if(data.status == 'true'){

            $("#smscontent_template").html('');
            $("#smscontent_template").html('<option value="" > Select Content Template </option>');

             if(data.contentTemplateName){
                $.each(data.contentTemplateName, function (key, val) {
                    $("#smscontent_template").append('<option value="'+val+'" >'+key+' </option>');
                });
             }

             $("#smscontent_template").customA11ySelect('refresh');

             $('#add-sms-reminder-form').bootstrapValidator('addField', 'smscontent_template', {
                validators: {
                    notEmpty: {
                        message: 'Please select content template.'
                    }
                }
             });                
         }
      }
    });
});

//GET SMS BODY CONTENT FOR ADD SMS REMINDER FORM
$('#smscontent_template').change( function(){

  var smsContentTemplate   = $('#smscontent_template').val();
$('#smscontent_template-button').addClass('form-control');
  $.ajax({
      type    : "GET", 
      url     : "../../client/res/templates/bulk_message/contentTemplate/getContentTemplateDetails.php?smsContentTemplate="+smsContentTemplate,
      dataType  : "json",
      success: function(data) {
         if(data.status == 'true'){

            $('#smsBody1').val(data.contentTemplateBody);
            $('.Add_smsBodyLenght').html(data.smsLengthCount);
            $('.Add_smscount').html(data.smsCount);

            $('#add-sms-reminder-form').bootstrapValidator('revalidateField', 'smsBody1');              
         }
      }
    });
});
</script>
<!-- Custom Content Templates Form Modal in Campaigns Script End -->


<!-- Custom Approved Sender IDs Script Start -->

<script type="text/javascript">
  var approvedSenderId = $("#create").attr('href');
  if(approvedSenderId =='#SenderID/create'){
    $("#create").css('display','none');
  }
</script>

<!-- Custom Approved Sender IDs Script End -->
