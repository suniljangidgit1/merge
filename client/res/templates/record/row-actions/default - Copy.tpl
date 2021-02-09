<script>
$('.action[data-action=ContactListEdit]').attr('onclick', 'updateContactList(this)');

function updateContactList(id)
{
  var id=$(id).data('id');
  er_id=id;
  $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/bulk_message/update_contact_list.php?id="+er_id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         if(data){
            $(".view_contact_list").html(data.data);
            //$("#updateContactListModal").modal("show");
            $("#updateContactListModal").modal({
                  backdrop: 'static',
                  keyboard: false
              });

            $('#update-contactList-form').bootstrapValidator('addField', 'list_name', {
                validators: {
                    notEmpty: {
                        message: 'The List Name field is required and cannot be empty'
                    }
                }
            });    
         }
      }
    });
}

var updateContactListCount = 1;
//update contact list
$("#update-contactList-form").bootstrapValidator({
    
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

  setTimeout(function(){ updateContactListCount = 1; }, 3000);
  if(updateContactListCount == 1)
  {
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
            $.alert({
              title: 'Success!',
              content: data.msg,
              type: 'dark',
              typeAnimated: true,
            });

             $(function () {
               $('#updateContactListModal').modal('toggle');
            });

            $('button[data-action="reset"]').trigger('click');

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

  }
  updateContactListCount++;

    return false;
});
</script>
<!-- update contact list modal -->
<div class="container">
  <div class="modal fade" id="updateContactListModal" role="dialog">
    <div class="modal-dialog modal-sm" style="width: 550px;">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Edit Contact List</h4>
        </div>
      <div class="modal-body">
        <div class="container">
              <form class="reminder-form" id="update-contactList-form" action="../../client/res/templates/bulk_message/updateContactList.php" enctype="multipart/form-data" method="post" autocomplete="off" >

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 view_contact_list"></div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12"><br>
                  <button value="updateContactList" class="btn btn-orange pull-right" id="myBtn">Update</button>
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

$('.action[data-action=viewContactList]').attr('onclick', 'getContactListData(this)');

function getContactListData(id)
{ 

  //$("#viewContactsData").modal("show");
  $("#viewContactsData").modal({
            backdrop: 'static',
            keyboard: false
        });

  var id=$(id).data('id');
  er_id=id;
  var dataTable;
 // $(document).ready(function(){

     // Initialize datatable
     dataTable = $('#empTable111abcd123').DataTable({
       /*'processing': true,
       'serverSide': true,
       //'serverMethod': 'POST',*/
        'destroy': true,

        "processing": true,
        "serverSide": true,

       'ajax': {
          'type':'GET',
          'url':'../../client/res/templates/bulk_message/ajaxfile.php',
          'data': function(data){
             
             data.request = 1;
             data.list_id=id;

          },
       },
       'columns': [
          { data: 'id' },
          { data: 'user_name'},
          { data: 'user_email'},
          { data: 'phone' },
          { data: 'created_at'},
          { data: 'action' },
       ],
       'columnDefs': [ {
         'targets': [5], // column index (start from 0)
         'orderable': false, // set orderable false for selected columns
       }]
     });

     // Check all 
   $('#checkall').click(function(){
      if($(this).is(':checked')){
         $('.delete_check').prop('checked', true);
      }else{
         $('.delete_check').prop('checked', false);
      }
   });

   // Delete record
   $('#delete_record').click(function(){

      var deleteids_arr = [];
      // Read all checked checkboxes
      $("input:checkbox[class=delete_check]:checked").each(function () {
         deleteids_arr.push($(this).val());
      });

      // Check checkbox checked or not
      if(deleteids_arr.length > 0){

        $.confirm({
            title: 'Confirm!',
            content: 'Do you really want to Delete records?',
            buttons: {
                confirm: function () {
                     $.ajax({
                       type: 'GET',
                       url: '../../client/res/templates/bulk_message/ajaxfile.php',
                       data: {request: 2,deleteids_arr: deleteids_arr},
                       success: function(response){
                          dataTable.ajax.reload();
                          $('#checkall').prop('checked', false);
                       }
                    });
                },
                cancel: function () {
                }    
              }
        }); 
      }
      else
      {
        $.alert({
            title: 'Alert!',
            content: "please select any one!",
            type: 'dark',
            typeAnimated: true,
          });
      }
   });
  // });

                  // });
  $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/bulk_message/view_contacts_data.php?id="+er_id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         if(data){

           document.getElementById('list_name_res1').innerHTML = data.list_name;
           document.getElementById('list_id_res1').value = data.list_id;

           $(".view_contact_list_data").html(data.list_name);                     
         }
      }
    });
}
 function close_view_contacts_model()
 {
    $('button[data-action="reset"]').trigger('click');
     $('#viewContactsData').modal('toggle');
 }

 function close_upload_contacts_model()
 {
    $('#addContactsModalShow').modal('toggle');
    $('.entityContactsEdit').css("display","none");
    $('.entityContacts').css("display","none");
 }

</script>
<div class="container">
    <div class="modal fade" id="viewContactsData" role="dialog">
        <div class="modal-dialog model-emailwidth">
        <!-- Modal content-->
            <div class="modal-content">
                    <div class="modal-header">
                      <br><button type="button" onclick="close_view_contacts_model()" style="float: right;">&times;</button>
                        <h4 class="modal-title text-center">View Contact List: <b class="view_contact_list_data"></b> </h4>
                        <hr>
                    </div>
                    <div class="modal-body" style="padding-top: 0px;">

                        <div class="container">
                          <div class="row">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                             <button type="button" id="add_contacts" style="display: block;" class="btn btn-primary addContactsModal" onclick="showContactModel()"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;"></i>Add Contacts</button>
                          </div>
                        </div><br>
                            <!-- Table -->
                         <table id='empTable111abcd123' class='display dataTable' style="width: 100%;background: #f1efef;">
                           <thead>
                             <tr>
                               <th>id</th>
                               <th>User Name</th>
                               <th>User Email</th>
                               <th>User Phone</th>
                               <th>Create At</th>
                               <th> <input type="checkbox" class='checkall' id='checkall'><!-- <input type="button" id='delete_record' value='Delete' > --> &nbsp;<button type="button" id='delete_record' value='Delete'><span class="fas fa-prescription-bottle" style="font-size: 10px;"></span></button></th>
                             </tr>
                           </thead>
                         </table><br><br>
                      </div>
                  </div>
              </div>
          </div>
    </div>
</div>

<script>
  // uncheck 
$(document).on("click" ,".delete_check", function () {
  // $('#checkall').prop('checked', false);
  // console.log('test');
  if($(this).is(':checked')){
         //$('#checkall').prop('checked', true);
      }else{
         $('#checkall').prop('checked', false);
      }
});
</script>

<!-- add contact modal -->
<div class="container">
  <div class="modal fade" id="addContactsModalShow" role="dialog">
    <div class="modal-dialog model-emailwidth">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <br><button type="button" onclick="close_upload_contacts_model()" style="float: right;">×</button>
        <h4 class="modal-title text-center">Upload Contacts: <div id="list_name_res1"></div></h4>
      </div>
    <div class="modal-body">
      <div class="container">
          <form  class="upload-contacts-form-edit" action="../../client/res/templates/bulk_message/updateContacts.php" enctype="multipart/form-data" method="post" >

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="mrt-5">

                    <!-- hide & show nav-bar tab -->
                    <ul class="nav nav-tabs">
                      <!-- add data-toggle attribute to the anchors -->
                      <li class="active hideEntityDatatableEdit"><a data-toggle="tab" href="#upload_file">Upload File</a></li>
                      <li class="hideEntityDatatableEdit"><a data-toggle="tab" href="#copy_paste">Copy & Paste</a></li>
                      <li class="hideEntityDatatableEdit"><a data-toggle="tab" href="#individual">Individual Entry</a></li>
                      <li><a data-toggle="tab" href="#crm_contacts">CRM Contacts</a></li>
                    </ul>
                    <br>
                    <div class="tab-content">
                      <div id="upload_file" class="tab-pane fade in active">
                        <br><br>
                        <div class="bg bg-danger" style="padding: 10px;">Note:Supported File Format is CSV.<!-- ,XLS,XLSX --> <a href="../../client/res/templates/bulk_message/CSV-file-format.csv" download>Download sample file</a></div>
                        <br>
                        <label>Choose file to upload: </label><br>
                        <input type="file" name="upload_file" accept=".csv" class="form-control">
                      </div>
                      <div id="copy_paste" class="tab-pane fade">
                        <br><br>
                        <div class="bg bg-danger" style="padding: 10px;">
                          Note: Data must be comma(,) separated and you can skip a field by using space. Eg - abc, , 123456789</div>
                        <br>
                        <label>Copy & Paste Contacts:* </label><br><br>
                        <textarea placeholder="Your Name, Email, Phone" rows="5" rows="5" cols="70" name="copy_paste" class="form-control"></textarea>
                      </div>
                      <div id="individual" class="tab-pane fade">
                        <br><br>
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <label>User Name: </label><br>
                            <input class="form-control" placeholder="User Name" type="text" name="user_name" data-bv-field="User Name">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <label>Email: </label><br>
                            <input class="form-control" placeholder="Email" type="text" name="user_email" data-bv-field="User Email">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <label>Phone: </label><br>
                            <!-- maxlength="10" minlength="10" pattern="\d{10}" -->
                            <input class="form-control number-only" id="individual"  placeholder="Mobile Number" type="text" name="individual" data-bv-field="individual" autocomplete="off">
                          </div>
                          
                        </div>
                      </div>

                      <div id="crm_contacts" class="tab-pane fade">
                        <br><br>
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <label>Select Entity: </label>
                            <span class="crmEntityListEdit"></span>
                          </div>
                          
                        </div>
                      </div>
                    </div>


                    <input type="hidden" name="list_id" id="list_id_res1">
                  </div>
                </div>
              </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="mrt-10 file_name_append">
                <!-- dynamic name append. -->
              </div>
            </div><br>
            <div class="entityContactsEdit" style="display: none">
              <input type="hidden" id="crmEntityNameEdit" name="crmEntityNameEdit">
              <table id='viewEntityContactsEdit' class='display dataTable' style="width: 100%;background: #f1efef;">
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
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="mrt-10"><br>
                <button value="uploadContacts" class="btn btn-orange pull-right" id="myBtn" name="copy_paste_btn">Upload</button>
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
    function showContactModel()
    {
        $("#addContactsModalShow").modal({
            backdrop: 'static',
            keyboard: false
        });

        $.ajax({
              type    : "GET",
              url     : "../../client/res/templates/bulk_message/getCRMEntityEdit.php",
              dataType  : "json",
              processData : false,
              contentType : false,
              success: function(data)
              {
                 if(data){
                   $(".crmEntityListEdit").html(data.crmEntityList); 
                 }
              }
            });
    }

// Get Entity data
$(document).on("change" ,".getEntityContactsEdit1", function () {
    var entity_name = $('#getEntityContacts1').val();
    if(entity_name == 'select')
    {
      $('.entityContactsEdit').css("display","none");
    }
    else
    {
        $('.entityContactsEdit').css("display","block");
          document.getElementById('crmEntityNameEdit').value = entity_name;
          var dataTable;

           // Initialize datatable
           dataTable = $('#viewEntityContactsEdit').DataTable({
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
    

  });

//hide entity datatable
$('.hideEntityDatatableEdit').click(function(){
  $('.entityContactsEdit').css("display","none");
  document.getElementById('crmEntityNameEdit').value = "";
});

var uploadContactsCount = 1;
$('.upload-contacts-form-edit').submit(function(event){
// $(".upload-contacts-form-edit").bootstrapValidator({
    
//     message: 'Please enter valid input',
//         feedbackIcons: { },
//         excluded: [':disabled'],
//         fields: {
//             "individual1": {
//                 validators: {
//                     notEmpty: {
//                         message: 'The mobile is required and cannot be empty'
//                     },
//                 }
//             },
//             "user_email": {
//                 validators: {
//                     emailAddress: {
//                         message: 'The value is not a valid email address'
//                     },
//                 }
//             },
//         },

//   }).on('success.form.bv', function (event, data) {

  setTimeout(function(){ uploadContactsCount = 1; }, 3000);
  if(uploadContactsCount == 1)
  {
    
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
            $.alert({
              title: 'Success!',
              content: data.msg,
              type: 'dark',
              typeAnimated: true,
              buttons: {
                      Ok: function () {
                          //$('button[data-action="reset"]').trigger('click');
                          var table = $('#empTable111abcd123').DataTable();
                          table.ajax.reload();
                           $(function () {
                              //$('#viewContactsData').modal('toggle');
                             $('#addContactsModalShow').modal('toggle');
                          });
                           $('.upload-contacts-form-edit')[0].reset();
                           $('.entityContactsEdit').css("display","none");
                           $('.entityContacts').css("display","none");
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
   uploadContactsCount++;
  }

    return false;
});

</script>
<!-- show sent messages -->
<script>

$('.action[data-action=viewSentMessages]').attr('onclick', 'getSentMessage(this)');

function getSentMessage(id)
{ 

  var id=$(id).data('id');
  //$("#viewSentMessagesData").modal("show");
  $("#viewSentMessagesData").modal({
                  backdrop: 'static',
                  keyboard: false
              });

  var dataTable;
 // $(document).ready(function(){

     // Initialize datatable
     dataTable = $('#view_sent_messages').DataTable({
       /*'processing': true,
       'serverSide': true,
       //'serverMethod': 'POST',*/
        'destroy': true,

        "processing": true,
        "serverSide": true,

       'ajax': {
          'type':'GET',
          'url':'../../client/res/templates/bulk_message/view_sent_messages_ajax_response.php',
          'data': function(data){
             
             data.request = 1;
             data.sent_message_id=id;

          },
       },
       'columns': [
          { data: 'id' },
          { data: 'phones' },
          { data: 'status' },
          { data: 'sent_sms_date' },
       ],
       'columnDefs': [ {
         'targets': [3], // column index (start from 0)
         'orderable': false, // set orderable false for selected columns
       }]
     });

  $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/bulk_message/view_sent_messages.php?id="+id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         if(data){

            $('.append_campaigns_name').html(data.campaigns_name);   
         }
      }
    });
}
</script>
<!-- show sent messages -->
<div class="container">
    <div class="modal fade" id="viewSentMessagesData" role="dialog">
        <div class="modal-dialog model-emailwidth">
        <!-- Modal content-->
            <div class="modal-content">
                    <div class="modal-header view_contact_list_data">
                      <br><button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">View Sent Message Contacts:  <b class="append_campaigns_name"></b></h4>
                        <hr>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <!-- Table -->
                         <table id='view_sent_messages' class='display dataTable' style="width: 100%;background: #f1efef;">
                           <thead>
                             <tr>
                               <th>id</th>
                               <th>Phone</th>
                               <th>Status</th>
                               <th>SENT MESSAGE AT</th>
                             </tr>
                           </thead>
                         </table><br><br>
                      </div>
                  </div>
              </div>
          </div>
    </div>
</div>

<!-- Edit My Campaigns -->
<script>

$('.action[data-action=myCampaignsEdit]').attr('onclick', 'getMyCampaignsEdit(this)');

function getMyCampaignsEdit(id)
{ 

  var id=$(id).data('id');
  er_id=id;
  $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/bulk_message/edit_my_campaigns.php?id="+er_id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         if(data){

            $(".edit_my_campaigns_data").html(data.data);
            //$("#editMyCampaignsData").modal("show"); 
            $("#editMyCampaignsData").modal({
                backdrop: 'static',
                keyboard: false
            });
            var smsBodyLenght = $('#sms_text_edit').val().length;
            $("#smsBodyLenghtEdit").html(smsBodyLenght);

            //$('#edit-sms-form').bootstrapValidator('revalidateField', 'campaigns_name1');
            //$("#edit-sms-form").bootstrapValidator("enableFieldValidators", "campaigns_name1", true); 
            $('#edit-sms-form').bootstrapValidator('addField', 'campaigns_name', {
                validators: {
                    notEmpty: {
                        message: 'The Campaign Name field is required and cannot be empty'
                    }
                }
            });

            $('#edit-sms-form').bootstrapValidator('addField', 'sms_text', {
                validators: {
                    notEmpty: {
                        message: 'The SMS text name field is required and cannot be empty.'
                    }
                }
            });

            $('#edit-sms-form').bootstrapValidator('addField', 'send_sms', {
                validators: {
                    notEmpty: {
                        message: 'The send sms field is required.'
                    }
                }
            });

            $('#edit-sms-form').bootstrapValidator('addField', 'date', {
                validators: {
                    notEmpty: {
                          message: 'Please schedule a date for the reminder.'
                      },
                      date: {
                          format: 'DD-MM-YYYY',
                          message: 'The date format is not valid'
                      }
                }
            });

            $('#edit-sms-form').bootstrapValidator('addField', 'time', {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a time for the reminder.'
                    }
                }
            });

         }
      }
    });
}
</script>
<!-- My campaigns add model -->
<div class="container">
  <div class="modal fade" id="editMyCampaignsData" role="dialog">
    <div class="modal-dialog" style="width: 550px;">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button><br>
          <h2 class="modal-title text-center">Update My Campaign</h2>
          <hr>
        </div>
        <div class="modal-body">
          <div class="container">
            <!-- <div class="row">
              <div class="col-sm-12 remaining_messages"></div>
            </div><br> edit_my_campaigns_data-->

            <form class="reminder-form edit_my_campaigns_data" id="edit-sms-form" action="../../client/res/templates/bulk_message/update_my_campaigns.php" enctype="multipart/form-data" method="post" autocomplete="off" >
                
                
            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- close modal -->

<script>
  $(document).on("keyup" ,"#sms_text_edit", function () {
      var smsBodyLenght = $('#sms_text_edit').val().length;
      $("#smsBodyLenghtEdit").html(smsBodyLenght);
  });

  function edit_my_campaigns_date()
  {
    var selectedText2 = document.getElementById('send_sms_date1').value;
    if(selectedText2){
      $("#edit-sms-form").bootstrapValidator("enableFieldValidators", "date", false);
    }else{
      $("#edit-sms-form").bootstrapValidator("enableFieldValidators", "date", true);
    }
  }

  function edit_campaign_checkTime(){

    var selectedText1 = document.getElementById('send_sms_date1').value;
   
    if(selectedText1==""){
      $.alert({
        title: 'Alert!',
        content: 'Please select date first',
        type: 'dark',
        typeAnimated: true
      });
      
      document.getElementById('send_sms_time1').value="";
    }

    var selectedTime2= document.getElementById('send_sms_time1').value;
    if(selectedTime2)
    {
      $("#edit-sms-form").bootstrapValidator("enableFieldValidators", "time", false);
    }
    else
    {
      $("#edit-sms-form").bootstrapValidator("enableFieldValidators", "time", true);
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
      var selectedTime= document.getElementById('send_sms_time1').value;
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
              typeAnimated: true
            });

            document.getElementById('send_sms_time1').value='';
          }
        }else{
        
          $.alert({
            title: 'Alert!',
            content: 'Reminder can not be set for a past time',
            type: 'dark',
            typeAnimated: true
          });
          document.getElementById('send_sms_time1').value='';
        }


      }
    }
        //$('#send-sms-form').bootstrapValidator('revalidateField', 'send_sms_time');
  }
// send sms
var updateCampaignsCount = 1; 
$(document).ready(function(){

    $('#edit-sms-form').bootstrapValidator({
    
      message: 'Please enter valid input',
          feedbackIcons: { },
          excluded: [':disabled'],
          fields: {
              'sms_text': {
                  validators: {
                      notEmpty: {
                          message: 'The SMS text name field is required and cannot be empty.'
                      },
                  }
              },
              'campaigns_name': {
                  validators: {
                      notEmpty: {
                          message: 'The Campaign Name field is required and cannot be empty'
                      },
                  }
              },
              'copy_paste': {
                  validators: {
                      notEmpty: {
                          message: 'The recipients field is required and cannot be empty.'
                      },
                  }
              },
              'send_sms': {
                  validators: {
                      notEmpty: {
                          message: ''
                      },
                  }
              },
              'date': {
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
              'time': {
                  validators: {
                      notEmpty: {
                          message: 'Please schedule a time for the reminder.'
                      },
                  }
              },
          },

    }).on('success.form.bv', function (event, data) {

    event.preventDefault();

    // server side current date & time validation
      var selectedText1 = document.getElementById('send_sms_date1').value;

      var parts1      = selectedText1.split('/');
      var selectedText1   = parts1[1]+'-'+parts1[0]+'-'+parts1[2];
      var selectedDate1   = new Date(selectedText1);   

      var today       = new Date();

      var dd1   = selectedDate1.getDate();
      var mm1   = selectedDate1.getMonth()+1; 
      var yyyy1   = selectedDate1.getFullYear();

      var dd    = today.getDate();
      var mm    = today.getMonth()+1; 
      var yyyy  = today.getFullYear();


      if(dd== dd1 && mm==mm1 && yyyy==yyyy1){
        var selectedTime= document.getElementById('send_sms_time1').value;
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
                typeAnimated: true
              });

              document.getElementById('send_sms_time1').value='';
              return false;
            }
          }else{
          
            $.alert({
              title: 'Alert!',
              content: 'Reminder can not be set for a past time',
              type: 'dark',
              typeAnimated: true
            });
            document.getElementById('send_sms_time1').value='';
            return false;
          }


        }
      }


    setTimeout(function(){ updateCampaignsCount = 1; }, 3000);
    if(updateCampaignsCount == 1)
    {
      var form  = $(this);
      var url   = form.attr('action');
      form      = new FormData(form[0]);
      $.ajax({
        type    : 'POST',
        url     : url,
        data    : form,
        dataType  : 'json',
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
                buttons: {
                        Ok: function () {
                            
                             $('button[data-action="reset"]').trigger('click');
                             $(function () {
                               $('#editMyCampaignsData').modal('toggle');
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
              });
            }
            
        }
      });
      updateCampaignsCount++;
    }

      return false;
  });
});
</script>

{{#if actionList.length}}
<div class="list-row-buttons btn-group pull-right">
    <button type="button" class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu pull-right">
    {{#each actionList}}
        <li><a {{#if link}}href="{{link}}"{{else}}href="javascript:"{{/if}} class="action" {{#if action}} data-action={{action}}{{/if}}{{#each data}} data-{{@key}}="{{./this}}"{{/each}}>{{#if html}}{{{html}}}{{else}}{{translate label scope=../../scope}}{{/if}}</a></li>
    {{/each}}
    </ul>
</div>
{{/if}}

<!-- Edit Email Reminder Modal -->
<div class="modal fade" id="editReminderModal" role="dialog">
  <div class="modal-dialog modal-emailwidth">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Edit Email Reminder</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 ">
            <form class="reminder-form" id="edit-reminder-form" action="" enctype="multipart/form-data" method="post" autocomplete="off" >
              <div class="edit_email_reminderForm">
                 
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Edit Email Reminder Modal -->
<div class="modal fade" id="editSmsReminderModal1" role="dialog">
  <div class="modal-dialog modal-emailwidth">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Edit SMS Reminder</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 ">
            <form id="edit-sms-reminder-form" enctype="multipart/form-data" method="post" autocomplete="off" >
              <div class="container edit_sms_reminderForm">
                                   
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- View Attachment Invoice Modal -->
<!-- Invoice Attachment Modal -->
  <div class="modal fade" id="invoice_attachments" role="dialog">
    <div class="modal-dialog" style="width:410px;">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Attachments</h4>
        </div>
        <div class="modal-body" style="padding-top:0px;" id="invoice_attachment_data">
         

              
          

          <button class="btn btn-success" id="" style="visibility: hidden;margin-bottom: 20px;">Add Item</button> 
        </div>
        
      </div>
      
    </div>
  </div>
 <!-- End of Invoice Attachment Modal --> 
<!-- View estimate attachment Modal -->
<!-- Modal -->
  <div class="modal fade" id="estimate_attachments" role="dialog">
    <div class="modal-dialog" style="width:410px;">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Attachments</h4>
        </div>
        <div class="modal-body" style="padding-top:0px;" id="estimate_attachment_data">
         

              
          

          <button class="btn btn-success" id="" style="visibility: hidden;margin-bottom: 20px;">Add Item</button> 
        </div>
        
      </div>
      
    </div>
  </div>
<!-- End of Estimate Attachment Modal --> 
<script type="text/javascript">
var afterhash = window.location.hash;
if(afterhash=='#ClosedTask')
{
      $('a[data-action="quickView"]').css("display","none");
      $('a[data-action="quickEdit"]').css("display","none");
      $('a[data-action="setCompleted"]').css("display","none");
}

if(afterhash=='#Estimate' || afterhash=='#Invoice' || afterhash=='#Payments')
{
      $('.action[data-action="quickView"]').css("display","none");
      $('.action[data-action="quickEdit"]').css("display","none");
      $('.action[data-action="quickRemove"]').css("display","none");
}
</script>

<script>
//Edit Estimate
$('.action[data-action=Edit_estimate]').unbind().click(function(){
     var dataId = $(this).attr("data-id");
     // var url="client/res/templates/financial_changes/Edit_Estimate.php?id="+dataId;
     // window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=900,height=700,directories=no,location=no') 
      $.ajax({
        type: "GET",
        url: "../../client/res/templates/financial_changes/Edit_Estimate.php",
        data: {dataId:dataId},
        success: function (data){
            //alert("IN SUCCESS FUNCTION OF EDIT ESTIMATE AJAX");
            //alert(data);

            $(".edit_estimate_Form").html(data);
            // $("#financialModal").text("Estimate Modal");
            $("#edit_estimateModal").modal();    
        }
     });


});

//Edit Invoice
$('.action[data-action=Edit_invoice]').unbind().click(function(){
     var dataId = $(this).attr("data-id");

     // alert(dataId);
     // var url="client/res/templates/financial_changes/Edit_Invoice.php?id="+dataId;
     // window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=900,height=700,directories=no,location=no') 
     $.ajax({
        type: "GET",
        url: "../../client/res/templates/financial_changes/Edit_Invoice.php",
        data: {dataId:dataId},
        success: function (data){
            //alert("IN SUCCESS FUNCTION OF EDIT ESTIMATE AJAX");
     // alert(data);

            $(".edit_invoice_Form").html(data);
            // $("#financialModal").text("Invoice Modal");
            $("#edit_invoiceModal").modal();    
        }
     });
});

//Edit Billing Entity
$('.action[data-action=Edit_billingentity]').unbind().click(function(){
     var dataId = $(this).attr("data-id");
     $.ajax({
        type: "GET",
        url: "../../client/res/templates/financial_changes/Edit_billing_entity.php",
        data: {dataId:dataId},
        success: function (data){
            $(".edit_billingentity_Form").html(data);
            $("#edit_billingentityModal").modal();
            //$(".Select_state").customA11ySelect();
            //$(".gst_state_edit").customA11ySelect();
            $(".bank_account_type_edit").customA11ySelect();    
        }
     });
});

//Convert to Invoice
$('.action[data-action=Convert]').unbind().click(function(){
     var dataId = $(this).attr("data-id");
     // var url="client/res/templates/financial_changes/convert_to_invoice.php?id="+dataId;
     // window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=900,height=700,directories=no,location=no') 

      $.ajax({
        type: "GET",
        url: "../../client/res/templates/financial_changes/convert_to_invoice.php",
        data: {dataId:dataId},
        success: function (data){
            //alert("IN SUCCESS FUNCTION OF EDIT ESTIMATE AJAX");
            // alert(data);

            $(".convert_ToInvoice_Form").html(data);
            // $("#financialModal").text("Invoice Modal");
            $("#convert_ToInvoiceModal").modal();    
        }
     });
});

//Edit payment
$('.action[data-action=Edit_payment]').unbind().click(function(){
     var dataId = $(this).attr("data-id");
     // var url="client/res/templates/Edit_Payment.php?id="+dataId;
     // window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1045,height=700,directories=no,location=no') 

    $.ajax({
        type: "GET",
        url: "../../client/res/templates/financial_changes/Edit_Payment.php",
        data: {dataId:dataId},
        success: function (data){
            //alert("IN SUCCESS FUNCTION OF EDIT ESTIMATE AJAX");
            // alert(data);

            $(".edit_payment_Form").html(data);
            // $("#financialModal").text("Invoice Modal");
            $("#edit_paymentModal").modal();    
        }
     }); 
});

//Payment summary
$('.action[data-action=View_payments]').unbind().click(function(){
 var dataId = $(this).attr("data-id");
    $.ajax({
        type: "GET",
        url: "../../client/res/templates/financial_changes/Payment_summary.php",
        data: {dataId:dataId},
        success: function (data){
            $(".payment_SummaryForm").html(data);
            $("#payment_SummaryModal").modal();    
        }
    }); 

});

// Remove Estimate 
$('.action[data-action=Remove_Estimate]').unbind().click(function(){
    
    var dataId = $(this).attr("data-id");
    
    $.confirm({
        title: 'Warning!',
        content: 'Are you sure want to remove Estimate!',
        buttons: {
            Yes: function () {
               window.location='http://'+domain_name+'/'+folder_name+'/client/res/templates/financial_changes/remove_Estimate.php?id='+dataId; 
                },
            No: function () {  }
        }

    });

});

// Remove Billing Entity 
$('.action[data-action=Remove_billing_entity]').unbind().click(function(){
    
    var dataId = $(this).attr("data-id");
    
    $.confirm({
        title: 'Warning!',
        content: 'Are you sure want to remove Billing Entity!',
        buttons: {
            Yes: function () {
               window.location='http://'+domain_name+'/'+folder_name+'/client/res/templates/financial_changes/remove_Billingentity.php?id='+dataId; 
                },
            No: function () {  }
        }

    });

});

//Remove Payments
$('.action[data-action=Remove_Payment]').unbind().click(function(){
    
    var dataId = $(this).attr("data-id");
    $.confirm({
        title: 'Warning!',
        content: 'Are you sure want to remove Payment!',
        buttons: {
            Yes: function () {
                window.location='http://'+domain_name+'/'+folder_name+'/client/res/templates/financial_changes/remove_Payment.php?id='+dataId; 
            },
            No: function () { }
        }

    });

});

//Remove Invoice
$('.action[data-action=Remove_Invoice]').unbind().click(function(){
    
    var dataId = $(this).attr("data-id");

    $.ajax({

        url: "../../client/res/templates/financial_changes/check_payment_history.php?id="+dataId,type: "get", 
        async: false,
        success: function(result)  {
            assign_val22(result);
       
        }

    });


    function assign_val22(result) {
        sessionStorage.removeItem("result_val22"); 
        sessionStorage.setItem("result_val22",result);
    }


    if (sessionStorage.length != 0)  {
        var result_val22=sessionStorage.getItem("result_val22");
    }
 

    if(result_val22==0) {
       
       sessionStorage.removeItem("result_val22"); 

        $.confirm({
            
            title: 'Warning!',
            content: 'Are you sure want to remove Invoice!',
            buttons: {
                Yes: function () {
                   window.location='http://'+domain_name+'/'+folder_name+'/client/res/templates/financial_changes/remove_Invoice.php?id='+dataId; 
                },
                No: function () { }
            }

        });
    
    } else if(result_val22==1) {

        sessionStorage.removeItem("result_val22"); 
        $.confirm({
            title: 'Warning!',
            content: 'Payment has been recorded for this invoice,hence they can not be deleted!',
                buttons: {
            Ok: function () {
                
            }
            }
        });
   }
    

});


//PDF
$('.action[data-action=PDF]').attr('target','blank');

$('.action[data-action=EmailReminderEdit]').attr('onclick', 'getData(this)');
$('.action[data-action=SMSReminderEdit]').attr('onclick', 'getData1(this)');
$('.action[data-action=Active]').attr('onclick', 'getDataForActive(this)');
$('.action[data-action=InActive]').attr('onclick', 'getDataForInActive(this)');
$('.action[data-action=SMSInActive]').attr('onclick', 'getDataForSMSInActive(this)');
$('.action[data-action=SMSActive]').attr('onclick', 'getDataForSMSActive(this)');

// Get Data function for edit email reminder...

 function getData(id){
  //alert(id);

  //alert("In get data");  
  var id=$(id).data('id');
  //console.log(id);

  //alert(id);
  er_id=id;
  $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/email_reminder/edit_email_reminder.php?id="+er_id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         //console.log(data);
         if(data){
            $(".edit_email_reminderForm").html(data.data);
            $("#editReminderModal").modal("show");   
              $('.input-group.date15').datepicker({format: "dd/mm/yyyy",}); 

  var date_input1   = $('input[name="date15"]'); //our date input has the name "date"
  var container1    = $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  date_input1.datepicker({
    format      : 'dd/mm/yyyy',
    container     : container1,
    todayHighlight  : true,
    autoclose     : true,
    
    startDate   : new Date(),
    endDate     : new Date(new Date().setDate(new Date().getDate() + 365))
  });


            $('#edit-reminder-form').bootstrapValidator('addField', 'date15', {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a date for the reminder.'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The date format is not valid'
                    },
                }
            });

            $('#edit-reminder-form').bootstrapValidator('addField', 'time15', {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a time for the reminder.'
                    }
                }
            });

            $('#edit-reminder-form').bootstrapValidator('addField', 'to1', {
                validators: {
                    notEmpty: {
                        message: 'Please enter recipient e-mail id for the reminder.'
                    }
                }
            });

         }
         
        // if(data.status == 'true'){
        //   var sendEmailDate= data.data.er_sendEmailDate;
        // //   alert(sendEmailDate);alert(data.data.er_sendEmailTime);
        //   $("#date15").val(sendEmailDate);
        //   $("#time15").val(data.data.er_sendEmailTime);
        //   $("#to1").val(data.data.email_to);
        //   $("#cc1").val(data.data.email_cc);
        //   $("#subject1").val(data.data.subject);
        //   $("#er_id").val(data.data.id);

        //             //console.log(data.data);
        //             var array = data.data.file_name.split(',');
        //             console.log(array.length);

        //             if( array.length > 0 ){
        //                 $.each(array, function( index, value ) {
        //                     //alert(value);
        //                     if( value != "" ){
        //                         $(".file_name_exists").append("<p> "+value+" <i class='fa fa-trash unlinkFile ' data-id='"+data.data.id+"' data-name='"+value+"'  aria-hidden='true' ></i></p>");
        //                     }
        //                 });
        //             }
        //    $("#editor201").val(data.data.email_body);
        //   // CKEDITOR.instances.editor201.setData(data.data.email_body);
        //   $("#editReminderModal").modal("show");

        // }else{


        // }
      }
    });

   //
}

var count=0;
    function checkDate1() {
  
      count++;
      
       
          var selectedText = document.getElementById("date15").value;

          // alert(selectedText);
          var parts =selectedText.split('/');
        var selectedText= parts[1]+"-"+parts[0]+"-"+parts[2];
          var selectedDate = new Date(selectedText);
          // alert(selectedDate);
          var now = new Date();
          // alert(now);
      now.setDate(now.getDate() - 1);
      //if(count==2)
      if (now > selectedDate) {
        if(count=="2"){
        $.alert({
              title: 'Alert!',
              content: 'Reminder can not be set for a past date',
              type: 'dark',
              typeAnimated: true,
          });
        document.getElementById('date15').value='';
        count=0;
      }
      }else{
        count=0;
      }
      // }
        $('#edit-reminder-form').bootstrapValidator('revalidateField', 'date15');
    }

    function checkTime1(){
        var selectedText1 = document.getElementById('date15').value;
    
        if(selectedText1==""){
            $.alert({
                  title: 'Alert!',
                  content: 'Please select date first',
                   type: 'dark',
                   typeAnimated: true
              });
           // alert("Please select date first");
            document.getElementById('time15').value="";
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

      var selectedTime  = document.getElementById('time15').value;
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
              });

          
              document.getElementById('time15').value='';
            }

        }else{

            $.alert({
                title: 'Alert!',
                content: 'Reminder can not be set for a past time',
                type: 'dark',
                typeAnimated: true,
            });
            document.getElementById('time15').value='';
        }


      }
    }
        $('#edit-reminder-form').bootstrapValidator('revalidateField', 'time15');
    }

    function validateMultipleEmailsCommaSeparatedEdit(element) {
    //  alert(element);
//   var toemail = document.getElementById('to').value;
   var toemail = element.value;
//   alert(toemail);
  if(toemail)
  {
    var result = toemail.split(',');
    if(result.length >= 6)
    {
      $("#emailToMaxFiveEdit").css('display','block');
      document.getElementById("updateEmailReminder").disabled = true;
      return false;  
    }
    else
    {
      $("#emailToMaxFiveEdit").css('display','none');
      document.getElementById("updateEmailReminder").disabled = false;
      //return true;
    }
    for(var i = 0;i < result.length;i++)
    if(!validateEmail(result[i])) 
    {
      $("#emailerror121").css('display','block');
      document.getElementById("updateEmailReminder").disabled = true;
        return false;  

    }
    $("#emailerror121").css('display','none');
    document.getElementById("updateEmailReminder").disabled = false;
    return true;
  }else
  {
    $("#emailerror121").css('display','none');
  }
}

function validateMultipleEmailsCcCommaSeparatedEdit(element) {
  var toemail = element.value;;
//   alert(toemail);
  if(toemail)
  {
    var result = toemail.split(',');
    if(result.length >= 6)
    {
      $("#emailCcMaxFiveEdit").css('display','block');
      document.getElementById("updateEmailReminder").disabled = true;
      return false;  
    }
    else
    {
      $("#emailCcMaxFiveEdit").css('display','none');
      document.getElementById("updateEmailReminder").disabled = false;
    }
    for(var i = 0;i < result.length;i++)
    if(!validateEmail(result[i])) 
    {
      $("#emailccerror1211").css('display','block');
      document.getElementById("updateEmailReminder").disabled = true;
        return false;  

    }
    $("#emailccerror1211").css('display','none');
    document.getElementById("updateEmailReminder").disabled = false;
    return true;
  }else
  {
    $("#emailccerror1211").css('display','none');
  }
}

var count=0;
    function checkDate1() {
  
      count++;
      
       
          var selectedText = document.getElementById("date15").value;

          // alert(selectedText);
          var parts =selectedText.split('/');
        var selectedText= parts[1]+"-"+parts[0]+"-"+parts[2];
          var selectedDate = new Date(selectedText);
          // alert(selectedDate);
          var now = new Date();
          // alert(now);
      now.setDate(now.getDate() - 1);
      //if(count==2)
      if (now > selectedDate) {
        if(count=="2"){
        $.alert({
              title: 'Alert!',
              content: 'Reminder can not be set for a past date',
              type: 'dark',
              typeAnimated: true,
          });
        document.getElementById('date15').value='';
        count=0;
      }
      }else{
        count=0;
      }
      // }
        $('#edit-reminder-form').bootstrapValidator('revalidateField', 'date15');
    }

    function checkTime1(){
        var selectedText1 = document.getElementById('date15').value;
    
        if(selectedText1==""){
            $.alert({
                  title: 'Alert!',
                  content: 'Please select date first',
                   type: 'dark',
                   typeAnimated: true
              });
           // alert("Please select date first");
            document.getElementById('time15').value="";
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

      var selectedTime  = document.getElementById('time15').value;
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
              });

          
              document.getElementById('time15').value='';
            }

        }else{

            $.alert({
                title: 'Alert!',
                content: 'Reminder can not be set for a past time',
                type: 'dark',
                typeAnimated: true,
            });
            document.getElementById('time15').value='';
        }


      }
    }
        $('#edit-reminder-form').bootstrapValidator('revalidateField', 'time15');
    }
    // UPDATE EMAIL REMINDER...
     var count_edit_email=1;

    $("#edit-reminder-form").bootstrapValidator({
    
    message: 'Please enter valid input',
        feedbackIcons: { },
        excluded: [':disabled'],
        fields: {
            "date15": {
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
            "time15": {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a time for the reminder.'
                    },
                }
            },
            "to1": {
               validators: {
                    notEmpty: {
                        message: 'Please enter recipient e-mail id for the reminder.'
                    },
                }
            },
            
        },

  }).on('success.form.bv', function (event, data) {

  setTimeout(function(){ count_edit_email = 1; }, 3000);
  if(count_edit_email == 1)
  {
    //pase time server side validation

      var selectedText1 = document.getElementById('date15').value;
      // alert(selectedText1);

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
            var selectedTime= document.getElementById('time15').value;
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
                    typeAnimated: true
                  });

                  document.getElementById('time15').value='';
                  count_edit_email++;
                  return false;
                }
              }else{
              
                $.alert({
                  title: 'Alert!',
                  content: 'Reminder can not be set for a past time',
                  type: 'dark',
                  typeAnimated: true
                });
                document.getElementById('time15').value='';
                count_edit_email++;
                return false;
              }
            }
          }
      }

    var subject = document.getElementById('subject1').value;
    if(!subject)
    {
      var check = confirm("Do you want to schedule without any subject?");
      if(!check)
      {
        document.getElementById("subject1").focus();
        // document.getElementById("updateEmailReminder").disabled = false;
        count_edit_email++;
        return false;
      }
    }
    
    event.preventDefault();
    var form  = $(this);
    var url   = form.attr('action');
    form      = new FormData(form[0]);
    $.ajax({
      type    : "POST",
      url     : "../../client/res/templates/email_reminder/update_email_reminder.php",
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
              buttons: {
                      Ok: function () {
                          $('button[data-action="reset"]').trigger('click');
                          $("#editReminderModal").modal("hide");
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
    count_edit_email++;
    }

    return false;
});
    function getDataForActive(id){
  var id=$(id).data('id');
 //alert(id);

  $.ajax({
       type    : "GET",
      url     : "../../client/res/templates/email_reminder/active_email_reminder.php?id="+id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
        if(data==1){
           $.alert({
                title: 'Alert!',
                content: 'Reminder activated to deliver at scheduled date and time!',
                buttons: {
                    Ok: function () {
                        // $.alert('Confirmed!');
                        $('button[data-action="reset"]').trigger('click');
                    }
                }
            });
        }else{
          $.alert("This reminder is already active.");
        }
        
      }
  });
}


    function getDataForInActive(id){
  var id=$(id).data('id');

  $.ajax({
       type    : "GET",
      url     : "../../client/res/templates/email_reminder/inactive_email_reminder.php?id="+id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
        if(data==1){
           $.alert({
                title: 'Alert!',
                content: 'Reminder deactivated!',
                buttons: {
                    Ok: function () {
                        // $.alert('Confirmed!');
                        $('button[data-action="reset"]').trigger('click');
                    }
                }
            });
        }else{
          $.alert("This reminder is already inactive.");
        }
        
      }
  });
}
</script>

<script>
  // Datetime Picker - Edit
  function getData1(id){
  var id=$(id).data('id');

     $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/sms_reminder/edit_sms_reminder.php?sr_id="+id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
        if(data){

          $(".edit_sms_reminderForm").html(data.data);
          $("#editSmsReminderModal1").modal("show");
          $('.input-group .smsDate2').datepicker({format: "dd/mm/yyyy",}); 

          var sms_date_input1   = $('input[name="smsDate2"]'); //our date input has the name "date"
          var sms_container1    = $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
          sms_date_input1.datepicker({
            format      : 'dd/mm/yyyy',
            container     : sms_container1,
            todayHighlight  : true,
            autoclose     : true,
           
            startDate   : new Date(),
            endDate     : new Date(new Date().setDate(new Date().getDate() + 365))
          });

          $('#edit-sms-reminder-form').bootstrapValidator('addField', 'smsDate2', {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a date for the reminder.'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The date format is not valid'
                    },
                }
            });

            $('#edit-sms-reminder-form').bootstrapValidator('addField', 'smsTime2', {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a time for the reminder.'
                    }
                }
            });

            $('#edit-sms-reminder-form').bootstrapValidator('addField', 'smsMobileNo2', {
                validators: {
                    notEmpty: {
                        message: 'Please enter recipient mobile number for the reminder.'
                    }
                }
            });

            $('#edit-sms-reminder-form').bootstrapValidator('addField', 'smsBody2', {
                validators: {
                    notEmpty: {
                        message: 'Please enter a reminder message.'
                    }
                }
            });

        }else{

          $.alert({
            title: 'Alert!',
            content: data.msg,
            type: 'dark',
            typeAnimated: true
          });
        }
        
      }
     }); 
    
}

  function smsTimeCheck2(){
        var selectedText1 = document.getElementById('smsDate2').value;
    
        if(selectedText1==""){
            $.alert({
                title: 'Alert!',
                content: 'Please select date first',
                type: 'dark',
                typeAnimated: true
            });
            // alert("Please select date first");
            document.getElementById('smsTime2').value="";
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

      var selectedTime  = document.getElementById('smsTime2').value;
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
              });
              document.getElementById('smsTime2').value='';
            }

        }else{

            $.alert({
                title: 'Alert!',
                content: 'Reminder can not be set for a past time',
                type: 'dark',
                typeAnimated: true,
            });
            document.getElementById('smsTime2').value='';
        }


      }
    }
    $('#edit-sms-reminder-form').bootstrapValidator('revalidateField', 'smsTime2');
    }


  var count=0;
    function smsDatecheck2() {
  
      count++;
      
      // if(count=="2"){
          var selectedText = document.getElementById("smsDate2").value;
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
          });
        document.getElementById('smsDate2').value='';
        count=0;
      }else{
        count=0;
      }
      // }
      $('#edit-sms-reminder-form').bootstrapValidator('revalidateField', 'smsDate2');
    }
      var count2=0;
    $("#edit-sms-reminder-form").bootstrapValidator({
    
    message: 'Please enter valid input',
        feedbackIcons: { },
        excluded: [':disabled'],
        fields: {
            "smsDate2": {
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
            "smsTime2": {
                validators: {
                    notEmpty: {
                        message: 'Please schedule a time for the reminder.'
                    },
                }
            },
            "smsMobileNo2": {
                validators: {
                    notEmpty: {
                        message: 'Please enter recipient mobile number for the reminder.'
                    },
                }
            },
            "smsBody2": {
                validators: {
                    notEmpty: {
                        message: 'Please enter a reminder message. '
                    },
                }
            },
        },

  }).on('success.form.bv', function (event, data) {

  setTimeout(function(){ count2 = 0; }, 3000);
  if(count2 == 0)
  {

    var selectedText1 = document.getElementById('smsDate2').value;
              // alert('selectedText1');
              // return false;

              if(selectedText1)
              {
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


                  if(dd== dd1 && mm==mm1 && yyyy==yyyy1)
                  {
                    // time validatio#n
                    var d = new Date();
                    var n = d.getHours();
                    var m = d.getMinutes();
                    var current_time = n+':'+m;
                    var time = document.getElementById('smsTime2').value;
                    
                    if(current_time >= time)
                    {
                      document.getElementById("smsTime2").focus();
                      //$("#sms_time_error1").css('display','block');
                       // document.getElementById("update_sms_reminder").disabled = true;
                       $.alert({
                          title: 'Alert!',
                          content: 'Reminder can not be set for a past date',
                          type: 'dark',
                          typeAnimated: true,
                      });
                    //document.getElementById('smsDate2').value='';
                    count2=1;
                        
                        return false;
                    }
                  }
              }
    
    event.preventDefault();
    var form  = $(this);
    var url   = form.attr('action');
    form      = new FormData(form[0]);
    $.ajax({
      type    : "POST",
      url     : "../../client/res/templates/sms_reminder/update_sms_reminder.php",
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
              buttons: {
                      Ok: function () {
                          $('button[data-action="reset"]').trigger('click');
                          $("#editSmsReminderModal1").modal("hide");
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
   count2++;
  }

    return false;
});
    function getDataForSMSInActive(id){
  var id=$(id).data('id');
  $.ajax({
       type    : "GET",
      url     : "../../client/res/templates/sms_reminder/smsinactive_email_reminder.php?id="+id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
        if(data==1){
          $.alert({
                title: 'Alert!',
                content: 'Reminder deactivated!',
                buttons: {
                    Ok: function () {
                        // $.alert('Confirmed!');
                        $('button[data-action="reset"]').trigger('click');
                    }
                }
            });
        
        }else{
          $.alert("This reminder is already inactive.");
        }
        
      }
  });
}

function getDataForSMSActive(id){
    var id=$(id).data('id');
    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/sms_reminder/smsactive_email_reminder.php?id="+id,
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            if(data==1){
                $.alert({
                    title: 'Alert!',
                    content: 'Reminder activated to deliver at scheduled date and time!',
                    buttons: {
                        Ok: function () {
                            // $.alert('Confirmed!');
                            $('button[data-action="reset"]').trigger('click');
                        }
                    }
                });
               
            }else{
                $.alert("This reminder is already active");
            }
        }
    });
}





var folder_name = window.location.pathname;
folder_name.indexOf(1);

var domain_name=window.location.hostname; 


var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2]; 

$('.action[data-action=view_attachments_invoice]').unbind().click(function(){
    
    var dataId = $(this).attr("data-id");

    if(first=='portal') {

             $.ajax({
                url: "../../client/res/templates/financial_changes/invoice_attachments.php?id="+dataId,type: "get", 
                async: false,dataType: 'json',
                success: function(result)
                {
                  $("#invoice_attachment_data").empty();
                  $('#invoice_attachments').modal('toggle');
                  if(result==null)
                  {
                     $("#invoice_attachment_data").append("<h6>No Data Available</h6>"); 
                  }
                  else
                  {
                     var len=result.length;

                     ul = $("<ul style='padding-left:0px;'>");      
                      for (var i = 0; i < len; i++) 
                      {
                          ul.append('<li style="display: inline;list-style-type: none;">' + result[i].original_filename + '</li>');
                          ul.append('<li style="display: inline;list-style-type: none;float:right"><span class="glyphicon glyphicon-download-alt"><a style="margin-left:-22px" target="blank" href="' + result[i].link + '">&nbsp; Download</a></span></li><br>');
                      }
                      $("#invoice_attachment_data").append(ul); 

                  }       
   
                }

              });

    } else {
        
        $.ajax({
            url: "../../client/res/templates/financial_changes/invoice_attachments.php?id="+dataId,type: "get", 
            async: false,dataType: 'json',success: function(result)
            {
                $("#invoice_attachment_data").empty();
                $('#invoice_attachments').modal('toggle');
                if(result==null)
                {
                    $("#invoice_attachment_data").append("<h6>No Data Available</h6>"); 
                }
                else
                {
                    var len=result.length;
                    ul = $("<ul style='padding-left:0px;'>");      
                    for (var i = 0; i < len; i++) 
                    {
                        ul.append('<li style="display: inline;list-style-type: none;">' + result[i].original_filename + '</li>');
                        ul.append('<li style="display: inline;list-style-type: none;float:right"><span class="glyphicon glyphicon-download-alt" ><a style="margin-left:-22px" target="blank" href="' + result[i].link + '">&nbsp; Download</a></span></li><br>');
                    }
                    $("#invoice_attachment_data").append(ul); 
                }
            }
        });
    }
});
// VIEW Attachment fOR Invoice

$('.action[data-action=view_attachments]').unbind().click(function(){
    
    var dataId = $(this).attr("data-id");
    // alert(dataId);
    if(first=='portal')  {
        
        $.ajax({
          url: "../../client/res/templates/financial_changes/estimate_attachments.php?id="+dataId,type: "get", 
          async: false,dataType: 'json',success: function(result)
          {
              $("#estimate_attachment_data").empty();
              $('#estimate_attachments').modal('toggle');
              if(result==null)
              {
                 $("#estimate_attachment_data").append("<h6>No Data Available</h6>"); 
              }
              else
              {
                  var len=result.length;
                  ul = $("<ul style='padding-left:0px;'>");      
                  for (var i = 0; i < len; i++) 
                  {
                      ul.append('<li style="display: inline;list-style-type: none;">' + result[i].original_filename + '</li>');
                      ul.append('<li style="display: inline;list-style-type: none;float:right"><span class="glyphicon glyphicon-download-alt"><a style="margin-left:-22px"target="blank" href="' + result[i].link + '">&nbsp; Download</a></span></li>< br>');
                  }
                  $("#estimate_attachment_data").append(ul); 
              }       
          }
        });
    
    } else {

        $.ajax({
            url: "../../client/res/templates/financial_changes/estimate_attachments.php?id="+dataId,type: "get", 
            async: false,dataType: 'json',success: function(result)
            {
                $("#estimate_attachment_data").empty();
                $('#estimate_attachments').modal('toggle');
                if(result==null)
                {
                    $("#estimate_attachment_data").append("<h6>No Data Available</h6>"); 
                }
                else
                {
                    var len=result.length;
                    ul = $("<ul style='padding-left:0px;'>");      
                    for (var i = 0; i < len; i++) 
                    {
                        ul.append('<li style="display: inline;list-style-type: none;">' + result[i].original_filename + '</li>');
                        ul.append('<li style="display: inline;list-style-type: none;float:right"><span class="glyphicon glyphicon-download-alt"><a style="margin-left:-22px" target="blank" href="' + result[i].link + '">&nbsp; Download</a></span></li><br>');
                    }
                    $("#estimate_attachment_data").append(ul); 
                }       
              }
        });

    } 

});
 </script>   
 <script type="text/javascript">
  //Sent Email Data
$('.action[data-action=viewEmailData]').attr('onclick', 'getSentEmailData(this)');

function getSentEmailData(id)
{ 
  var id=$(id).data('id');
  er_id=id;
  $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/email_reminder/view_email_data.php?id="+er_id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         if(data){
            $(".view_send_email_data").html(data.data);
            $("#viewSendEmailData").modal("show");   
         }
      }
    });
}

//Sent SMS Data
$('.action[data-action=viewSMSData]').attr('onclick', 'getSentSMSData(this)');

function getSentSMSData(id)
{ 
  var id=$(id).data('id');
  er_id=id;
  $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/sms_reminder/view_sms_data.php?id="+er_id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         if(data){
            $(".view_sent_sms_data").html(data.data);
            $("#viewSentSMSData").modal("show");   
         }
      }
    });
}
</script>
<!-- View Sent Email Data Modal -->
<div id="viewSendEmailData" class="modal fade" role="dialog">
  <div class="modal-dialog container">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Sent Email Data</h4>
        <hr>

      </div>
      <div class="view_send_email_data" style="padding-left: 15px;
    padding-right: 15px;">
        
      </div><br>
      <div class="modal-footer container">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- View Sent Email Data Modal -->
<div id="viewSentSMSData" class="modal fade" role="dialog">
  <div class="modal-dialog container">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Sent SMS Data</h4>
        <hr>

      </div>
      <div class="modal-body">
      <div class="view_sent_sms_data" style="">
        
      </div>
    </div>
      <div class="modal-footer container">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>

{{!--// 18-05-2020 : Sunil Jangid - Custom export--}}
<script>

    var downloadCnt = 0;
    
    $('.action[data-action=download]').attr('onclick', 'downloadExportCsv(this)');
    
    function downloadExportCsv(element){
        
        var tableId = $(element).data("id");
        
        // if( downloadCnt == "0" ){
            window.location.href = "../../client/res/templates/export_custom/downloadExportCsv.php?tableId="+tableId; 
            // downloadCnt = 0;
        // }
        
        // downloadCnt++;
        
        /*$.ajax({
          type    : "GET",
          url     : "../../client/res/templates/export_custom/downloadExportCsv.php?tableId="+tableId,
          dataType  : "json",
          processData : false,
          contentType : false,
          success: function(response) {
              
                console.log(response);
              
                if(response.status == "true"){
                    // download here
                    window.open(response.data,'_blank');
                }
            }
        });*/
        
    }
</script>
{{!--// 18-05-2020 : Sunil Jangid - Custom export--}}

<!-- edit Estimate modal Start here-->

  <div class="container">
         <!-- Estimate Modal Start -->
         <div class="modal fade" id="payment_SummaryModal" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="paymentSummary">Payment Summary</h4>
                  </div>
                  <div class="modal-body">
                        <div class="container">
                        <div class="payment_SummaryForm"></div>
                    </div>
                  </div>
                  <!--modal-body close -->
               </div>
               <!--modal-content close -->
            </div>
            <!--modal-dialog close -->
         </div>
       </div>
<!--Estimate modal close -->
{{!--// 05-06-2020 : Sayali - Edit Estimate--}}
<!-- edit Estimate modal Start here-->

  <div class="container">
         <!-- Estimate Modal Start -->
         <div class="modal fade" id="edit_estimateModal" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="financialModal">Estimate Modal</h4>
                  </div>
                  <div class="modal-body">
                        <div class="container">
                        <div class="edit_estimate_Form"></div>
                    </div>
                  </div>
                  <!--modal-body close -->
               </div>
               <!--modal-content close -->
            </div>
            <!--modal-dialog close -->
         </div>
<!--Estimate modal close -->

<!-- Create Account Modal Start here -->
         <div class="modal fade" id="estimate_create_account_modal" role="dialog">
            <div class="modal-dialog modal-lg">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Account</h4>
                    
                  </div>
                  <div class="modal-body">
                    <div class="container">
                                  <button type="button" id="estimate_create_account1"  class="btn btn-primary" data-toggle="modal" data-target="#estimate_create_account">Create Account</button>
                                 <!--  <button type="button" class="btn btn-default">Cancel</button> -->
                              
                     <table id="estimate_example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
<!-- Create Account Modal close-->

<!-- Create Account For Estimate Modal Start -->
         <div class="modal fade" id="estimate_create_account" role="dialog">
            <div class="modal-dialog modal-lg">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Create Account</h4>
                  </div>
                  <div class="modal-body">
                     <div class="container">
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
                              <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 50px;">
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
                                 <input type="text"  name="estimate_account_no" id="estimate_account_no" class="form-control"  minlength="10"  maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="" >
                              </div>
                           </div>
                        </div>
                        <button class="btn btn-success" id="" style="visibility: hidden;margin-bottom: 20px;">Add Item</button> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
<!-- Create Account For Estimate Modal close -->
</div>

<!--Edit Estimate validation Script Starts -->

<!-- Estimate edit_gstinnumber in Bill From start-->
    <script>
        var countgst=0;
        $(document).on('change', ".edit_gstinnumber", function() {  
        if(countgst==12){     
            var inputvalues = $(this).val();
            var inputvaluesship = $('.editship_gstinnumber').val();
            var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
            if (inputvalues == "") {
               return true;
            }else if (inputvalues == inputvaluesship) {
                $.alert({
                    title: 'Warning!',
                    content: 'GSTIN Number should not be equal',
                    buttons: {
                        Ok: function() {
                            $(".edit_gstinnumber,.editship_gstinnumber").val('');
                        }
                    }
                });
            }else{
  
                if (gstinformat.test(inputvalues)) {
                    return true;
                }else{
                    $.alert({
                        title: 'Warning!',
                        content: 'Please Enter Valid GSTIN Number',
                    });
                    $(".edit_gstinnumber").val('');
                    $(".edit_gstinnumber").focus();
                }
            }countgst=0;
        }
        countgst++;
  
        });
    </script>
<!-- Estimate edit_gstinnumber in Bill From end-->

<!-- Estimate editship_gstinnumber in Bill To start-->
    <script>
        var countgst=0;
        $(document).on('change', ".editship_gstinnumber", function() {  
            if(countgst==10){     
                var inputvalues = $(this).val();
                var inputvaluesship = $('.edit_gstinnumber').val();
                var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
                if (inputvalues == "") {
                  return true;

                }else if (inputvalues == inputvaluesship) {
                    $.alert({
                        title: 'Warning!',
                        content: 'GSTIN Number should not be equal',
                        buttons: {
                            Ok: function() {
                                $(".editship_gstinnumber,.edit_gstinnumber").val('');
                            }
                        }
                    });
                }else {
      
                    if (gstinformat.test(inputvalues)) {
                        return true;
                    }else{
                        $.alert({
                            title: 'Warning!',
                            content: 'Please Enter Valid GSTIN Number',
                        });
                        $(".editship_gstinnumber").val('');
                        $(".editship_gstinnumber").focus();
                    }
                }countgst=0;
            }
            countgst++;
        });
    </script>
<!-- Estimate editship_gstinnumber in Bill To  end--> 

<!-- Estimate edit_pannumber in Bill From start--> 
    <script>
      var count=0;
        $(document).on('change', ".edit_pannumber", function() {
            if(count==10){

                var inputvalues_pan = $(this).val().toUpperCase();
                var inputvaluesship_pan = $('.editship_pannumber').val().toUpperCase();
                var gstinformat_pan = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');
                if (inputvalues_pan == "") {
                    return true;
                } else if (inputvalues_pan == inputvaluesship_pan) {

                    $.alert({
                        title: 'Warning!',
                        content: 'PAN Number should not be equal',
                        buttons: {
                            Ok: function() {
                                $(".edit_pannumber,.editship_pannumber").val('');
                            }
                        }
                    });
            
                } else {
                    if (gstinformat_pan.test(inputvalues_pan)) {
                        return true;
                    } else {
                        $.alert({
                            title: 'Warning!',
                            content: 'Please Enter Valid PAN Number',
                        });
                        $(".edit_pannumber").val('');
                        $(".edit_pannumber").focus();
                    }
                }count=0;
            }count++;
        });
    </script>
<!-- Estimate edit_pannumber in Bill From end-->

<!-- Estimate editship_pannumber in Bill From Start--> 
    <script>
        var count=0;
        $(document).on('change', ".editship_pannumber", function() {
            if(count==10){
                var inputvalues_pan1 = $(this).val().toUpperCase();
                var inputvaluesship_pan1 = $('.edit_pannumber').val().toUpperCase();
                var gstinformat_pan1 = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');
                if (inputvalues_pan1 == "") {
                    return true;
                }else if (inputvalues_pan1 == inputvaluesship_pan1) {
                  
                    $.alert({
                        title: 'Warning!',
                        content: 'PAN Number should not be equal',
                        buttons: {
                            Ok: function() {
                                $(".editship_pannumber,.edit_pannumber").val('');
                            }
                        }
                    });
                
                   } else {
                    if (gstinformat_pan1.test(inputvalues_pan1)) {
                        return true;
                    } else {
                        $.alert({
                            title: 'Warning!',
                            content: 'Please Enter Valid PAN Number',
                        });
                            $(".editship_pannumber").val('');
                            $(".editship_pannumber").focus();
                    }
                }count=0;

            }count++;
        });
    </script>
<!-- Estimate editship_pannumber in Bill From end-->

<!-- Estimate edit_postalcode in Bill From start--> 
    <script>
        $(document).on('change', ".edit_postalcode", function() {
            var inputvalues_pcode = $(this).val();
            var gstinformat_pcode = new RegExp('^[1-9][0-9]{5}$');
             if (inputvalues_pcode == "") {
                return true;
            }
            else if (gstinformat_pcode.test(inputvalues_pcode)) {
                return true;
            } 
            else {
                    $.alert({
                        title: 'Warning!',
                        content:'Postal code must be of 6 digits',
                    });
                    $(".edit_postalcode").val('');
                    $(".edit_postalcode").focus();
            }
              
        });
    </script>
<!-- Estimate edit_postalcode in Bill From end-->

<!-- Estimate editship_postalcode in Bill From start--> 
    <script>

        $(document).on('change', ".editship_postalcode", function() {
            var inputvalues_pcode = $(this).val();
            var gstinformat_pcode = new RegExp('^[1-9][0-9]{5}$');
             if (inputvalues_pcode == "") {
                return true;
            }

            else if (gstinformat_pcode.test(inputvalues_pcode)) {
                return true;
            } 
            else {
                    $.alert({
                        title: 'Warning!',
                        content:'Postal code must be of 6 digits',
                    });
                    $(".editship_postalcode").val('');
                    $(".editship_postalcode").focus();
            }
              
        });
    </script>
<!-- Estimate edit_postalcode in Bill From end-->

<!--Edit Estimate validation Script End  -->

<!-- Estimate Example Datatable script start -->
      <script>
        $(document).ready(function() {


            var table = $('#estimate_example1').dataTable({
                "bProcessing": true,
                "sAjaxSource": "../../client/res/templates/financial_changes/generate_account_table.php",
                "bPaginate": true,
                "sPaginationType": "full_numbers",
                "iDisplayLength": 5,
                 "destroy": true,
                "aoColumns": [{
                        mData: 'Name',
                        "render": function(data) {

                            // alert(data);
                            return "<a href='javascript:void(0);' onclick='account(\"" + data + "\")'>" + data + "</a>";
                        }
                    },
                    {
                        mData: 'Country'
                    },
                ]
            });
        });

        function account(data) {
            $("input[name=account_id]").val(data);
            $('#estimate_create_account_modal').modal('toggle');
        }

        var first = window.location.pathname;
        first.indexOf(2);
        first.toLowerCase();
        first = first.split("/")[2];
        $('#estimate_no').blur(function(e) {

          e.stopImmediatePropagation();

            no = $('#estimate_no').val();
            if (first == 'portal') {
                $.ajax({
                    url: "../../client/res/templates/financial_changes/check_estimate_no.php?no=" + no,
                    type: "post",
                    async: false,
                    success: function(result) {

                        if (result == 1) {
                            $.confirm({
                                title: 'Warning!',
                                content: 'Estimate number exist,please enter another one!',
                                buttons: {
                                    Ok: function() {
                                        $('#estimate_no').val("");
                                    }
                                }

                            });
                        }
                    }

                });
            } else {
                $.ajax({
                    url: "../../client/res/templates/financial_changes/check_estimate_no.php?no=" + no,
                    type: "post",
                    async: false,
                    success: function(result) {
                        if (result == 1) {
                            $.confirm({
                                title: 'Warning!',
                                content: 'Estimate number exist,please enter another one!',
                                buttons: {
                                    Ok: function() {
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
<!-- Estimate Example Datatable script End -->

 <!-- Estimate Save account Script Start -->
      <script>
        // var count=0;
            $("#estimate_account_save").click(function(e) {
            // if (count==7){
            e.stopImmediatePropagation();

            var name = $("#estimate_account_name").val();
            var email = $("#estimate_account_email").val();
            var no = $("#estimate_account_no").val();
           
            if (name == '') {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please Enter Name',
                    buttons: {
                        Ok: function() {

                             $("#estimate_account_name").val("");

                        }
                    }
            

                });
    
            } else if (email != '' && IsEmail(email) == false) {

                $.confirm({
                    title: 'Warning!',
                    content: 'Please Enter Valid Email Address',
                    buttons: {
                        Ok: function() {
                            $("#estimate_account_email").val("");
                        }
                    }

                });
            } else if (no != '' && no.length != 10) {

                $.confirm({
                    title: 'Warning!',
                    content: 'Please Enter 10 Digit Mobile Number',
                    buttons: {
                        Ok: function() {
                            $("#estimate_account_no").val("");
                        }
                    }

                });

            } else {

                $.ajax({
                    url: "../../client/res/templates/financial_changes/save_account.php?name=" + name + "&email=" + email + "&no=" + no,
                    type: "get",
                    async: false,
                    success: function(result) {
                        if (result == 1) {
                            $("#estimate_account_id").val(name);
                            $("#estimate_account_name").val("");
                            $("#estimate_account_no").val("");
                            $("#estimate_account_email").val("");
                            $('#estimate_create_account').modal('toggle');
                            $('#estimate_create_account_modal').modal().modal('toggle');
                        } else {

                            $.confirm({
                                title: 'Warning!',
                                content: 'Failed to create account',
                                buttons: {
                                    Ok: function() {}
                                }
                            });
                        }
                    }
                });
            }



            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }
            // count=0;
        // }
        // count++;

        });
           
      </script>

<!-- Estimate Save account Script end -->

<!-- Edit Estimate  GST valiadtion Script Start-->
    <script>
        function getVal(){
           //alert("HI")
           var val= document.getElementById('edit_g_s_t').value;
         
           if(val=="IGST"){
             $("#SGST_BLOCK").css("display", "none");
             $("#CGST_BLOCK").css("display", "none");
             $("#IGST_BLOCK").css("display", "block");
           }else{
             $("#IGST_BLOCK").css("display", "none");
             $("#SGST_BLOCK").css("display", "block");
             $("#CGST_BLOCK").css("display", "block");
           }
           //alert(val);
        }

         var getGSTVal= $("#edit_g_s_t").val();
         if(getGSTVal=="IGST"){
              $("#IGST_BLOCK").css("display", "block");
         }else if(getGSTVal=="CGST/SGST"){
             $("#SGST_BLOCK").css("display", "block");
              $("#CGST_BLOCK").css("display", "block");
         }
    </script>
<!-- Edit Estimate  GST valiadtion Script End--> 

<!-- Edit Estimate edit_discount_type valiadtion Script start-->
    <script type="text/javascript">
        
         $(document).on('change',"#edit_discount_type", function(){ 
             var item = this.value ;

         
             if(item=='At item level'){
               $("#discount_estimate").show();
               $(".discount_estimate").show();
                $(".edit_dynamic_discount_est").show();
                $("#discount_esti").hide();
             }
             else if(item== 'At invoice level'){
                $("#discount_estimate").hide();
                $(".discount_estimate").hide();
                $(".edit_dynamic_discount_est").hide();
                $("#discount_esti").show();
             }
             else if(item == 'Select Discount Type'){
                $("#discount_estimate").hide();
                $(".discount_estimate").hide();
                 $("#discount_esti").hide();
                 $(".edit_dynamic_discount_est").hide();
             }
         
            });
      </script>
 <!-- Edit Estimate edit_discount_type valiadtion Script End-->
 <!--Remove Estimate Item btnUpdate3 Start --> 
      <script type="text/javascript">

        // var alreadyItemsCount=0;
         $(document).on("click", ".btnUpdate3", function(e) {
          e.stopImmediatePropagation();

            // if(alreadyItemsCount==19){
            var id = $(this).data("update-id");
            var et_id = $(this).data("db-id");
            // alert(id);
            $.confirm({

                title: 'Warning',
                content: 'Do you want to remove item?',
                type: 'dark',
                typeAnimated: true,
                buttons: {
                    Ok: function() {

                      $.ajax({

                            url: "../../client/res/templates/financial_changes/delete_estimate_item.php?id=" + et_id,
                            type: "post",
                            async: false,
                            success: function(result) {
                                if (result == 1) {
                                    $("#" + id).closest("div").remove();

                                    $.confirm({

                                        title: 'Success!',
                                        content: 'Item removed successfully!',
                                        type: 'dark',
                                        typeAnimated: true,
                                        buttons: {
                                            Ok: function() {

                                            }
                                        }
                                    });
                                }
                            }
                        });
                      },
                      Cancel: function() {
                      }
                }
            });
            // alreadyItemsCount=0;
            // }
            // alreadyItemsCount++;
        });
      </script>
<!-- Remove Estimate Item btnUpdate3 End -->

<!-- Estimate Add items Script Start -->
    <script>  
         // var count=0;
         var countForDiv= 0;
            $(document).on("click", "#Add", function(e) {
                e.stopImmediatePropagation();

                var inputvalues = $('.edit_gstinnumber').val(); 
                var item_dynamic = $('#edit_discount_type').val();

                $("#textboxDivDemo").append('<div class="item" id="'+countForDiv+'" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;overflow: hidden;"><div class="" style=""><div class="row" style=" margin-top:10px;"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Item Name<span class="text-danger">*</span></label><input type="text"  name="item_name[]" class="form-control" placeholder="" maxlength="40" required></div></div><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Description</label><textarea  type="text"  name="description[]" class="form-control" placeholder="" maxlength="180"></textarea></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">HSN/SAC</label><input type="text"  name="hsn[]" class="form-control" placeholder=""></div></div><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Quantity<span class="text-danger">*</span></label><input type="text"  name="quantity[]" id="quantity" class="form-control quantity_esti" placeholder=""  onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></div></div></div><div class="row" style="padding-bottom:5px;"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Rate<span class="text-danger">*</span></label><input type="text"  name="rate[]" id="rate_esti" class="form-control rate_esti" placeholder=""  onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></div></div><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Gst Rate</label><select class="form-control edit_gst_rate_estimate" name="gst_rate[]" id="edit_dynamic_gst_rate'+countForDiv+'"  ><option value="">Select GST Rate</option><option>0</option><option>1</option><option>2</option><option>3</option><option>5</option><option>6</option><option>12</option><option>18</option><option>28</option></select></div></div></div></div><div class="row edit_dynamic_discount_est" id="edit_dynamic_discount_est'+countForDiv+'"  style="padding-bottom:5px;"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Discount</label><div class="input-group discount_estimate"><input id="edit_dynamic_discount" type="text" class="form-control edit_dynamic_discount" name="estimate_discount_amount_item[]" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><span class="input-group-addon" style="padding: 0px;"><select name="estimate_discount_option_item[]" id="discount_option" style="padding: 6px 3px;border: none;" ><option>%</option><option>Rs</option></select></span></div></div></div><div class=" col-sm-6 col-md-6"></div></div><div class="row"><div class="col-md-12"><a class="btn btn-primary btnUpdate2" data-update-id="'+countForDiv+'" id="remove_field'+countForDiv+'" style="margin-bottom:10px;">Remove Item</a></div></div></div>')
         
                    if(inputvalues == "")
                    {
                      // $('#edit_dynamic_gst_rate'+countForDiv).attr('disabled', 'true');
                    }
                    else
                    {
                      // $('#edit_dynamic_gst_rate'+countForDiv).prop("disabled", false);
                    }
                

                    if(item_dynamic =='At item level'){
                    $('#edit_dynamic_discount_est'+count).css('display','inline-block');;
                     $("#discount_esti").css('display','none');   
                  }
                  else if(item_dynamic == 'At invoice level'){
                    
                     $('#edit_dynamic_discount_est'+count).css('display','none');
                      $('.edit_dynamic_discount_est'+count).css('display','none');
                     $('#discount_estimate'+count).css('display','none');

                     $("#discount_esti").css('display','inline-block');;
                   
                  }
                  else if(item_dynamic == 'Select Discount Type'){
                     $('#edit_dynamic_discount_est'+count).css('display','none');
                     $("#discount_esti").css('display','none');
                    

                  }
                        countForDiv++;
            });  
    </script>
<!-- Estimate Add items Script Start -->
<!-- Estimate Remove items Script Start -->
          <script>
                  // var countd=0;
            $(document).on("click",".btnUpdate2",function(e)
            {
                e.stopImmediatePropagation();
                var id=$(this).data("update-id");
                    $.confirm({
                        title: 'Warning',
                        content: 'Do you want to remove item?',
                        type: 'dark',
                        typeAnimated: true,
                        buttons: {
                            Ok: function () {
                            $("#"+id).closest("div").remove();
                            },
                            Cancel: function () {

                            }
                        }
                    });
                    
            });      
        </script> 
<!-- Estimate Remove items Script End -->

<!-- Edit Estimate adjustmemt_calculate_estimate valiadtion Script Start-->
        <script>
      
            $(document).on("blur", "#adjustmemt_calculate_estimate", function(e){
                e.stopImmediatePropagation();
                var formdata=$('#updateEstimateForm').serialize();
                    $.ajax({
                        url: "../../client/res/templates/financial_changes/calculate_EditEstimate.php",
                        type: "GET", 
                        async: false,
                        dataType: "json",
                        data : formdata,
                        success: function(result)
                        {
                            var len=result.length;
                            for (var i = 0; i < len; i++) 
                            {
                                $("#totalEst").val(result[i].total_amount);
                            }
                        }
                    });
            });

            $(document).on("click", "#calculate_estimate", function(e){
                e.stopImmediatePropagation();
                var formdata=$('#updateEstimateForm').serialize();
                    $.ajax({
                        url: "../../client/res/templates/financial_changes/calculate_EditEstimate.php",
                        type: "get", 
                        async: false,
                        dataType: "json",
                        data : formdata,
                        success: function(result)
                        {
                            var len=result.length;
                            for (var i = 0; i < len; i++) 
                            {
                                $("#subtotalEst").val(result[i].subtotal);
                                $("#totalEst").val(result[i].total_amount);
                                $("#IGSTEst").val(result[i].IGST);
                                $("#SGSTEst").val(result[i].SGST);
                                $("#CGSTEst").val(result[i].CGST);
                            }
                        }
                    });
            });
        </script>

<!-- Edit Estimate adjustmemt_calculate_estimate valiadtion Script End-->

<!-- Edit Estimate Discount_calculation valiadtion Script Start-->
    <script>
        $(document).on("change",".edit_dynamic_discount", function(e){ 
            e.stopImmediatePropagation();
            var discount = this.value ;
            var parent = $(this).closest(".item");

            var option = parent.find("#discount_option").val();
            var rate = parent.find(".rate_esti").val();
            var quantity = parent.find(".quantity_esti").val();

            if(option == "Rs")
            {
                var total = quantity * rate;
              
                if(total < discount)
                {
                    $.alert("Discount cannot be more than product value.");
                    $(this).val("");
                }
            }
            else if(option == "%")
            {
                if(discount>100)
                {
                    $.alert("Discount % cannot be more than 100%.");
                    $(this).val("");
                }
            }
        });

    </script>

    <script type="text/javascript">
        
        $(document).on("change","#discount_calculate_estimate", function(e){ 
            e.stopImmediatePropagation();
            var discount = this.value ; 
            var option = $("#option_discount").val();
            var rate = $(".rate_esti").val();
            var quantity = $(".quantity_esti").val();

            if(option == 'Rs')
            {
                var total = quantity * rate;
                
                if(total < discount)
                {
                    $.alert("Discount cannot be more than product value.");
                    $(this).val("");
                }
            }
            else if(option == '%')
            {
                if(discount>100)
                {
                    $.alert("Discount % cannot be more than 100%.");
                    $(this).val("");
                }
            }
        });
    </script>
<!-- Edit Estimate Discount_calculation valiadtion Script End-->

<!-- Estimate Delete File script start -->        
    <script>
      $(document).on("click", ".delete_file", function (e){
            e.stopImmediatePropagation();
            var dataId = $(this).attr("data-id");
            // alert(dataId);
          // if(removeFileCount==12){
             $.confirm({

              title: 'Warning!',
              content: 'Are you sure want to remove file from server!',
              buttons: {
                Yes: function () {
                
                  $.ajax({
                      url: "../../client/res/templates/financial_changes/remove_estimate_file.php?id="+dataId,
                      type: "get", 
                      async: false,
                      success: function(result)
                       {
                          
                            if(result==1)
                             {
                                 $.confirm({
                                  title: 'Success!',
                                    content: 'File removed successfully from server!',
                                    buttons: {
                                      Ok: function () {
                                          // $("#" + dataId).closest(".row").remove();
                                          // $(this).closest('.li').remove();

                                        // return false;
                                        // window.location.reload();\
                                        var elem = document.getElementById(dataId+"1");
                                        elem.parentNode.removeChild(elem);
                                       
                                    }
                                  }
                                 });
                             }
                             else if(result==0)
                             {
                                $.confirm({
                                    title: 'Warning!',
                                    content: 'Failed to remove file!',
                                    buttons: {
                                      Ok: function () {
                                      }
                                    }
                                });
                             }
                       }
                    });
         
                  },
                  No: function () {
           
                  }
                }
         
            });
            // removeFileCount=0;
             // }
            // removeFileCount++;
          });  
    </script>
<!-- Estimate Delete File script End -->


<!-- Estimate Update data Script Starts. --> 
    <script type="text/javascript">
        // var uppdateEstimateBtn=0;
        $(document).on("click", "#update_estimateBTN", function(event){
            $("#updateEstimateForm").submit(function(event) {
                event.preventDefault();
                event.stopImmediatePropagation();

                var formdata=$('#updateEstimateForm');
                form      = new FormData(formdata[0]);
                jQuery.each(jQuery('#attachment')[0].files, function(i, file) {
                    form.append('attachment['+i+']', file);
                });
                $.ajax({
                    type    : "POST",
                    url     : "../../client/res/templates/financial_changes/update_estimate.php",
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
                                content: 'Updated successfully!',
                                buttons: {
                                    Ok: function () {
                                        //window.location.reload();
                                        $('button[data-action="reset"]').trigger('click');
                                        $(function () {
                                            $('#edit_estimateModal').modal('toggle');
                                        });
                                       // $('#updateEstimateForm')[0].reset();
                                    }
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>
    <script>
   $(document).on("click", "#date20", function(){
        $( "#date20" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
    } );
    </script>
<!-- Estimate Update data Script Ends. -->
<!-- Edit Estimate Script Ends. -->


<!-- Convert-to-Invoice script Start -->
<!-- Convert-to-invoice modal start -->

  <div class="container">
         <!-- Convert-to-invoice Modal Start -->
         <div class="modal fade" id="convert_ToInvoiceModal" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="financialModal">Convert-to-invoice</h4>
                  </div>
                  <div class="modal-body">
                        <div class="container">
                        <div class="convert_ToInvoice_Form"></div>
                    </div>
                  </div>
                  <!--modal-body close -->
               </div>
               <!--modal-content close -->
            </div>
            <!--modal-dialog close -->
         </div>
  <!--Convert-to-invoice modal close -->

  <!-- Create Account Modal start -->
         <div class="modal fade" id="Convert_to_create_account_modal" role="dialog">
            <div class="modal-dialog modal-lg">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Account</h4>
                    
                  </div>
                  <div class="modal-body">
                    <div class="container">
                                  <button type="button" id="Convert_to_create_account1"  class="btn btn-primary" data-toggle="modal" data-target="#Convert_to_create_account">Create Account</button>
                                 <!--  <button type="button" class="btn btn-default">Cancel</button> -->
                              
                     <table id="Convert_to_example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
  <!-- Create Account Modal close-->
  
  <!-- Create Account For Convert-to-invoice start -->
         <div class="modal fade" id="Convert_to_create_account" role="dialog">
            <div class="modal-dialog modal-lg">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Create Account</h4>
                  </div>
                  <div class="modal-body">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="">
                                 <button type="submit" id="Convert_to_account_save" class="btn btn-primary">save</button>
                                 <!--  <button type="button" class="btn btn-default">Cancel</button> -->
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 50px;">
                                 <h4>Overview</h4>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6 col-md-6" >
                              <div class="form-group">
                                 <label for="">Name<span class="text-danger">*</span></label>
                                 <input type="text"  name="Convert_to_account_name" id="Convert_to_account_name" class="form-control" placeholder="" required>
                              </div>
                           </div>
                           <div class="col-sm-6 col-md-6" >
                              <div class="form-group">
                                 <label for="">Email</label>
                                 <input type="email" name="estimate_account_email" id="Convert_to_account_email" class="form-control" placeholder="" >
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6 col-md-6" >
                              <div class="form-group">
                                 <label for="">Mobile Number</label>
                                 <input type="text"  name="Convert_to_account_no" id="Convert_to_account_no" class="form-control"  minlength="10"  maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="" >
                              </div>
                           </div>
                        </div>
                        <button class="btn btn-success" id="" style="visibility: hidden;margin-bottom: 20px;">Add Item</button> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
   <!-- Create Account For Convert-to-invoice modal close -->
  </div>

    
    
 <!-- Convert-to-invoice Datatable script start -->
      <script>
        $(document).ready(function() {


            var table = $('#Convert_to_example1').dataTable({
                "bProcessing": true,
                "sAjaxSource": "../../client/res/templates/financial_changes/generate_account_table.php",
                "bPaginate": true,
                "sPaginationType": "full_numbers",
                "iDisplayLength": 5,
                "destroy": true,
                "aoColumns": [{
                        mData: 'Name',
                        "render": function(data) {

                            // alert(data);
                            return "<a href='javascript:void(0);' onclick='convert_To(\"" + data + "\")'>" + data + "</a>";
                        }
                    },
                    {
                        mData: 'Country'
                    },
                ]
            });
        });

        function convert_To(data) {
            $("input[name=account_id_convert]").val(data);
            $('#Convert_to_create_account_modal').modal('toggle');
        }  

</script>
<!-- Convert-to-invoice Datatable script End -->
<!-- var first = window.location.pathname;
first.indexOf(2);
first.toLowerCase();
first = first.split("/")[2]; -->
<!-- Convert-to-invoice Invoice-no validation script start -->
<script type="text/javascript">
// $('.invoiceno').blur(function(e){
$(document).on("change",".invoiceno", function(e){
e.stopImmediatePropagation();
no=$('#invoiceno').val();
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
            buttons: {
        Ok: function () {
            $('#invoiceno').val("");
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
            buttons: {
        Ok: function () {
            $('#invoiceno').val("");
            }
        }

    });
          }      
               
    }

    });
    }
     });
  </script>

 <!--Convert-to-invoice Invoice-no validation Script End -->

 <!--Convert-to-invoice Save Account Script Start -->
      <script>
        // var count=0;
            $("#Convert_to_account_save").click(function(e) {
              e.stopImmediatePropagation();
              e.preventDefault();
            // if (count==7){
            var name = $("#Convert_to_account_name").val();
            var email = $("#Convert_to_account_email").val();
            var no = $("#Convert_to_account_no").val();
           
            if (name == '') {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please Enter Name',
                    buttons: {
                        Ok: function() {

                             $("#Convert_to_account_name").val("");

                        }
                    }
            

                });
    
            } else if (email != '' && IsEmail(email) == false) {

                $.confirm({
                    title: 'Warning!',
                    content: 'Please Enter Valid Email Address',
                    buttons: {
                        Ok: function() {
                            $("#Convert_to_account_email").val("");
                        }
                    }

                });
            } else if (no != '' && no.length != 10) {

                $.confirm({
                    title: 'Warning!',
                    content: 'Please Enter 10 Digit Mobile Number',
                    buttons: {
                        Ok: function() {
                            $("#Convert_to_account_no").val("");
                        }
                    }

                });

            } else {

                $.ajax({
                    url: "../../client/res/templates/financial_changes/save_account.php?name=" + name + "&email=" + email + "&no=" + no,
                    type: "get",
                    async: false,
                    success: function(result) {
                        if (result == 1) {
                            $("#account_id_convert").val(name);
                            $("#Convert_to_account_name").val("");
                            $("#Convert_to_account_no").val("");
                            $("#Convert_to_account_email").val("");
                            $('#Convert_to_create_account').modal('toggle');
                            $('#Convert_to_create_account_modal').modal().modal('toggle');
                        } else {

                            $.confirm({
                                title: 'Warning!',
                                content: 'Failed to create account',
                                buttons: {
                                    Ok: function() {}
                                }
                            });
                        }
                    }
                });
            }



            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }
            // count=0;
        // }
        // count++;

        });
           
      </script>

      <!-- Convert_to_Invoice Save Account script end -->
       
<!-- Convert_to_Invoice Convert data script start -->
       <script type="text/javascript">
        // var uppdateEstimateBtn=0;
          $(document).on("click", "#convert_invoiceBTN", function(event){

              $("#convert_InvoiceForm").submit(function(event) {

            event.preventDefault();
            event.stopImmediatePropagation();
                      
            // alert("in fun");
            // if(uppdateEstimateBtn==19){

                 var formdata=$('#convert_InvoiceForm');
                 form      = new FormData(formdata[0]);
                jQuery.each(jQuery('#file_convert')[0].files, function(i, file) {
                    form.append('file_convert['+i+']', file);
                });
                
               $.ajax({
                  type    : "POST",
                  url     : "../../client/res/templates/financial_changes/submit_convert_to_invoice.php",
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
                                    content: 'Estimate Successfully Converted to Invoice!',
                                    buttons: {
                                      Ok: function () {
                                        // window.location.reload();
                                         $('button[data-action="reset"]').trigger('click');

                                          $(function () {
                                         $('#convert_ToInvoiceModal').modal('toggle');
                                          });
                                      }
                                    }
                                 });
                             }
 

                  }
                });
                // alert("IN UPDATE ESTIMATE BTN METHOD");
                // uppdateEstimateBtn=0;
                
            // }
            // uppdateEstimateBtn++;
          });
});

      </script>
<!-- Convert_to_Invoice Convert data script end -->
 
  <!--  calculate_convert_to_invoice  Script Start-->
      <script>
        var adjustmentCount=0;
         // $("#adjustmemt_calculate_estimate").blur(function(){
         $(document).on("blur", "#adjustmemt_calculate_convert_to", function(){
         
         if(adjustmentCount==2){
         var formdata=$('#convert_InvoiceForm').serialize();
         
         
         $.ajax({
         url: "../../client/res/templates/financial_changes/calculate_convert_to_invoice.php",
         type: "GET", 
         async: false,
         dataType: "json",
         data : formdata,
         success: function(result)
         {
            var len=result.length;
         
         
           for (var i = 0; i < len; i++) {
             // $("#subtotal").val(result[i].subtotal);
             $("#total").val(result[i].total_amount);
            //  //if(result[i].GSTTOTAL!=""){
            //    $("#IGST").val(result[i].IGST);
            // // }else{
            //    $("#SGST").val(result[i].SGST);
            //    $("#CGST").val(result[i].CGST);

         
            // }
           }
           
         }
         });
         adjustmentCount=0;
         }
         adjustmentCount++;
         });

         // var discount_estimateCount=0;
         // $(document).on("blur", "#discount_calculate_convert_to", function(){
         // if(discount_estimateCount==10){
         // var formdata=$('#convert_InvoiceForm').serialize();
         // $.ajax({
         // url: "../../client/res/templates/calculate_convert_to_invoice.php",
         // type: "get", 
         // async: false,
         // dataType: "json",
         // data : formdata,
         // success: function(result)
         // {
         
         //    var len=result.length;
         
         
         //   for (var i = 0; i < len; i++) {
         //     $("#subtotal").val(result[i].subtotal);
         //     $("#total").val(result[i].total_amount);
         //       $("#IGSTCon").val(result[i].IGST);
         //       $("#SGSTCon").val(result[i].SGST);
         //       $("#CGSTCon").val(result[i].CGST);
        
         //   }
           
         // }
         // });
         // discount_estimateCount=0;
         // }
         // discount_estimateCount++;
         // });


         // var calculate_estimateCount=0;
        $(document).on("click", "#calculate_convert_to", function(e){
            e.stopImmediatePropagation();
            e.preventDefault();
       // alert("hi");
         // if(calculate_estimateCount==10){
         var formdata=$('#convert_InvoiceForm').serialize();
         
         
         $.ajax({
         url: "../../client/res/templates/financial_changes/calculate_convert_to_invoice.php",
         type: "get", 
         async: false,
         dataType: "json",
         data : formdata,
         success: function(result)
         {
            var len=result.length;
         // alert($("#IGSTEst").val());
         
           for (var i = 0; i < len; i++) {
             $("#subtotal_con").val(result[i].subtotal);
               // alert(result[i].subtotal) ;
             $("#total_con").val(result[i].total_amount);
                // alert(result[i].total_amount) ;
               $("#IGSTCon").val(result[i].IGST);
                // alert($("#IGST").val());
               $("#SGSTCon").val(result[i].SGST);
               $("#CGSTCon").val(result[i].CGST);
         
          
           }
           
         }
         });
         // calculate_estimateCount=0;
         // }
         // calculate_estimateCount++;
         });
         
      </script>
  <!-- Calculate Conert_to_invoice Script End-->

<!-- Discount validation Script Start-->
 <script type="text/javascript">
        
         $(document).on("change",".edit_dynamic_discount_to ", function(){       
          var discount_convert = this.value ; 

          var parent = $(this).closest(".item");
          var option_con= parent.find("#option_con").val();
          var qtyVal = parent.find(".quantity_convert").val();
          var rateVal = parent.find(".rate_convert").val();


          if(option_con=="Rs"){

          var total = qtyVal * rateVal;

          if(total < discount_convert)
          {
            $.alert("Discount cannot be more than product value.");
            $(this).val("");
          }
        }
        else if(option_con=="%"){

          if(discount_convert>100)
          {
              $.alert("Discount % cannot be more than 100%.");
               $(this).val("");
          }
        }
        });

  </script>


 <script type="text/javascript">
        
         $(document).on("change",".discount_calculate_convert_to", function(){ 
           
          var discount_convert = this.value ; 
          var option_con1= $("#option_con1").val();
          var quantity_convert = $(".quantity_convert").val();
          var rate_convert = $(".rate_convert").val();

         if(option_con1=="Rs"){
          var total = quantity_convert * rate_convert;
          if(total < discount_convert)
          {
            $.alert("Discount cannot be more than product value. ");
            $(this).val("");
          }
        }
        else if(option_con1=="%"){
          if(discount_convert>100){
            $.alert("Discount % cannot be more than 100%.");
            $(this).val("");
          }
        }
        });

  </script>
<!-- Discount validation Script end-->

 <!-- convertToInvoice Add items script Start -->
      <script>  
         var countto=0;
         var countForDivto= 0;
                  $(document).on("click", "#convertToInvoice", function(e) {
                    e.stopImmediatePropagation();
                      e.preventDefault();
                    // if(countto==14){
                        
                        countto=0;
              
                  var inputvalues = $('.billingaddressgstin_convert').val(); 
                  var item_dynamic = $('#discount_type_convert').val();
         
                      $("#con").append('<div class="item" id="'+countForDivto+'" style=""><div class="" style=""><div class="row" style=" margin-top:10px;"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Item Name<span class="text-danger">*</span></label><input type="text"  name="item_name_convert[]" class="form-control" placeholder="" maxlength="40" required></div></div><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Description</label><textarea  type="text"  name="description_convert[]" class="form-control" placeholder="" maxlength="180"></textarea></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">HSN/SAC</label><input type="text"  name="hsn_convert[]" class="form-control" placeholder=""></div></div><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Quantity<span class="text-danger">*</span></label><input type="text"  name="quantity_convert[]" class="form-control quantity_convert" placeholder=""  onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></div></div></div><div class="row" style="padding-bottom:5px;"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Rate<span class="text-danger">*</span></label><input type="text"  name="rate_convert[]" class="form-control rate_convert" placeholder=""  onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></div></div><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Gst Rate</label><select class="form-control edit_gst_rate_estimate" name="gst_rate_convert[]" id="edit_dynamic_gst_rate_to'+countForDivto+'"  ><option value="">Select GST Rate</option><option>0</option><option>1</option><option>2</option><option>3</option><option>5</option><option>6</option><option>12</option><option>18</option><option>28</option></select></div></div></div></div><div class="row edit_dynamic_discount_to" id="edit_dynamic_discount_to'+countForDivto+'"  style="padding-bottom:5px;"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Discount</label><div class="input-group"><input id="discount_convert" type="text" class="form-control edit_dynamic_discount_to " name="estimate_discount_amount_item_convert[]" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><span class="input-group-addon" style="padding: 0px;"><select name="estimate_discount_option_item_convert[]" id="option_con" style="padding: 6px 3px;border: none;"><option>%</option><option>Rs</option></select></span></div></div></div><div class=" col-sm-6 col-md-6"></div></div><div class="row"><div class="col-md-12"><a class="btn btn-primary btnUpdate2_Convertto" data-update-id="'+countForDivto+'" id="remove_field'+countForDivto+'" style="margin-bottom:10px;">Remove Item</a></div></div></div>');
         
                       if(inputvalues == ""){
                          // $('#edit_dynamic_gst_rate_to'+countto).attr('disabled', 'true');
                        }
                    else{
                      // $('#edit_dynamic_gst_rate_to'+countto).prop("disabled", false);
                    }
         
         
                  if(item_dynamic =='At item level'){
                    $('#edit_dynamic_discount_to'+countto).show();
                     $("#discount_esti_invoice_to").hide();
                  }
                  else if(item_dynamic == 'At invoice level'){
                     $('#edit_dynamic_discount_to'+countto).hide();
                     $("#discount_esti_invoice_to").show();
                  }
                  else if(item_dynamic == 'Select Discount Type'){
                     $('#edit_dynamic_discount_to'+countto).hide();
                      $("#discount_esti_invoice_to").hide();
                  }
                  
                // }
               countForDivto=0;
                
                       countto++;
                   
                  }); 
              </script>
 <!-- convertToInvoice Add items script End -->   
 
 <!-- convertToInvoice Remove add items script Start -->   
              <script>
                      // var countto=0;
                   $(document).on("click",".btnUpdate2_Convertto",function(e)
                  {
                     e.stopImmediatePropagation();
                      e.preventDefault();
                    // alert("IN BTN UPDATE 2");
                    // alert(count);
                    // if(countto==14){


                    var id=$(this).data("update-id");
                    //alert(id);
                     $.confirm({
                      title: 'Warning',
                      content: 'Do you want to remove item?',
                      type: 'dark',
                      typeAnimated: true,
                      buttons: {
                          Ok: function () {
                              $("#"+id).closest("div").remove();
         
                          },
                           Cancel: function () {
                            
         
                          }
                      }
                  });
                     // countto=0;
         
                   // }
                    // countto++;
                  });
         
               // });  
          
      </script> 
      <!-- convertToInvoice  Remove Add items End -->

     <!-- convertToInvoice Remove items script Start -->   
      <script type="text/javascript">

        // var alreadyItemsCount=0;
         $(document).on("click", ".btnUpdate3_convert", function(e) {
           e.stopImmediatePropagation();
            e.preventDefault();
            // if(alreadyItemsCount==12){
            var id = $(this).data("update-id");
            var et_id = $(this).data("db-id");
            // alert(id);
            $.confirm({
                title: 'Warning',
                content: 'Do you want to remove item?',
                type: 'dark',
                typeAnimated: true,
                buttons: {
                    Ok: function() {
                      $.ajax({
                            url: "../../client/res/templates/financial_changes/delete_estimate_item.php?id=" + et_id,
                            type: "post",
                            async: false,
                            success: function(result) {
                                if (result == 1) {
                                    $("#" + id).closest("div").remove();
                                    $.confirm({
                                        title: 'Success!',
                                        content: 'Item removed successfully!',
                                        type: 'dark',
                                        typeAnimated: true,
                                        buttons: {
                                            Ok: function() {

                                            }
                                        }
                                    });
                                }
                            }
                        });
                      },
                      Cancel: function() {
                      }
                }
            });
            // alreadyItemsCount=0;
            // }
            // alreadyItemsCount++;
        });
      </script>
  <!-- convertToInvoice Remove items script End -->  

<!-- convertToInvoice  GST valiadtion Script Start-->
      <script>
         function getVal_Convert(){
           //alert("HI")
           var val= document.getElementById('g_s_t_convert').value;
         // alert(val);
           if(val=="IGST"){
             $("#SGST_BLOCK_CON").css("display", "none");
             $("#CGST_BLOCK_CON").css("display", "none");
             $("#IGST_BLOCK_CON").css("display", "block");
           }else{
             $("#IGST_BLOCK_CON").css("display", "none");
             $("#SGST_BLOCK_CON").css("display", "block");
             $("#CGST_BLOCK_CON").css("display", "block");
           }
           //alert(val);
         }
         var getGSTVal= $("#g_s_t_convert").val();
         if(getGSTVal=="IGST"){
              $("#IGST_BLOCK_CON").css("display", "block");
         }else if(getGSTVal=="CGST/SGST"){
             $("#SGST_BLOCK_CON").css("display", "block");
              $("#CGST_BLOCK_CON").css("display", "block");
         }
      </script>
 <!-- convertToInvoice  GST valiadtion Script End--> 

<!-- convertToInvoice postalcode validation in Bill From start--> 
   <script type="text/javascript">
                  function postal_code_Convert() {
                      var val1 = $('#billing_address_postal_code_convert').val();

                      if (val1 == "") {
                          $.alert({
                              title: 'Alert!',
                              content: 'Please enter postal code',
                              type: 'dark',
                              typeAnimated: true
                          });
                      } else {
                          if (/^\d{6}$/.test(val1)) {

                          } else {
                              $.alert({
                                  title: 'Alert!',
                                  content: 'Postal code must be of 6 digits',
                                  type: 'dark',
                                  typeAnimated: true,
                                  buttons: {
                                      ok: function() {
                                          if (val1) {
                                              $('#billing_address_postal_code_convert').val("");
                                          }

                                      }
                                  }
                              });
                          }
                      }
                  }
                </script>
<!-- convertToInvoice postalcode validation in Bill From end-->

<!-- convertToInvoice postalcode validation in Bill From start--> 
    <script type="text/javascript">
                  function shipping_postal_code_Convert() {
                      var val1 = $('#shipping_address_postal_code_convert').val();

                      if (val1 == "") {
                          $.alert({
                              title: 'Alert!',
                              content: 'Please enter postal code',
                              type: 'dark',
                              typeAnimated: true
                          });
                      } else {
                          if (/^\d{6}$/.test(val1)) {

                          } else {
                              $.alert({
                                  title: 'Alert!',
                                  content: 'Postal code must be of 6 digits',
                                  type: 'dark',
                                  typeAnimated: true,
                                  buttons: {
                                      ok: function() {
                                          if (val1) {
                                              $('#shipping_address_postal_code_convert').val("");
                                          }

                                      }
                                  }
                              });
                          }
                      }
                  }
                </script>
<!-- convertToInvoice postalcode validation in Bill From end-->

<!-- convertToInvoice gstinnumber validation in Bill From start-->
    <script>
        var countgst=0;
        $(document).on('change', "#billingaddressgstin_convert", function() {  
        if(countgst==12){     
            var inputvalues = $(this).val();
            var inputvaluesship = $('#shippingaddressgstin_convert').val();
            var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
            if (inputvalues == "") {
               return true;
            }else if (inputvalues == inputvaluesship) {
                $.alert({
                    title: 'Warning!',
                    content: 'GSTIN Number should not be equal',
                    buttons: {
                        Ok: function() {
                            $("#billingaddressgstin_convert,#shippingaddressgstin_convert").val('');
                        }
                    }
                });
            }else{
  
                if (gstinformat.test(inputvalues)) {
                    return true;
                }else{
                    $.alert({
                        title: 'Warning!',
                        content: 'Please Enter Valid GSTIN Number',
                    });
                    $("#billingaddressgstin_convert").val('');
                    $("#billingaddressgstin_convert").focus();
                }
            }countgst=0;
        }
        countgst++;
  
        });
    </script>
<!-- convertToInvoice gstinnumber validation in Bill From end-->

<!-- convertToInvoice gstinnumber validation in Bill To start-->
    <script>
        var countgst=0;
        $(document).on('change', "#shippingaddressgstin_convert", function() {  
            if(countgst==12){     
                var inputvalues = $(this).val();
                var inputvaluesship = $('#billingaddressgstin_convert').val();
                var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
                if (inputvalues == "") {
                  return true;

                }else if (inputvalues == inputvaluesship) {
                    $.alert({
                        title: 'Warning!',
                        content: 'GSTIN Number should not be equal',
                        buttons: {
                            Ok: function() {
                                $("#shippingaddressgstin_convert,#billingaddressgstin_convert").val('');
                            }
                        }
                    });
                }else {
      
                    if (gstinformat.test(inputvalues)) {
                        return true;
                    }else{
                        $.alert({
                            title: 'Warning!',
                            content: 'Please Enter Valid GSTIN Number',
                        });
                        $("#shippingaddressgstin_convert").val('');
                        $("#shippingaddressgstin_convert").focus();
                    }
                }countgst=0;
            }
            countgst++;
        });
    </script>
<!-- convertToInvoice gstinnumber validation in Bill To  end--> 

<!-- convertToInvoice pannumber validation in Bill From start--> 
    <script>
      var count=0;
        $(document).on('change', "#billingaddresspan_no_convert", function() {
            if(count==12){

                var inputvalues_pan = $(this).val().toUpperCase();
                var inputvaluesship_pan = $('#shippingaddresspan_no_convert').val().toUpperCase();
                var gstinformat_pan = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');
                if (inputvalues_pan == "") {
                    return true;
                } else if (inputvalues_pan == inputvaluesship_pan) {

                    $.alert({
                        title: 'Warning!',
                        content: 'PAN Number should not be equal',
                        buttons: {
                            Ok: function() {
                                $("#billingaddresspan_no_convert,#shippingaddresspan_no_convert").val('');
                            }
                        }
                    });
            
                } else {
                    if (gstinformat_pan.test(inputvalues_pan)) {
                        return true;
                    } else {
                        $.alert({
                            title: 'Warning!',
                            content: 'Please Enter Valid PAN Number',
                        });
                        $("#billingaddresspan_no_convert").val('');
                        $("#billingaddresspan_no_convert").focus();
                    }
                }count=0;
            }count++;
        });
    </script>
<!-- convertToInvoice pannumber validation in Bill From end-->

<!-- convertToInvoice pannumber validation in Bill From Start--> 
    <script>
        var count=0;
        $(document).on('change', "#shippingaddresspan_no_convert", function(e) {
           e.stopImmediatePropagation();
            e.preventDefault();
            if(count==12){
                var inputvalues_pan1 = $(this).val().toUpperCase();
                var inputvaluesship_pan1 = $('#billingaddresspan_no_convert').val().toUpperCase();
                var gstinformat_pan1 = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');
                if (inputvalues_pan1 == "") {
                    return true;
                }else if (inputvalues_pan1 == inputvaluesship_pan1) {
                  
                    $.alert({
                        title: 'Warning!',
                        content: 'PAN Number should not be equal',
                        buttons: {
                            Ok: function() {
                                $("#shippingaddresspan_no_convert,#billingaddresspan_no_convert").val('');
                            }
                        }
                    });
                
                   } else {
                    if (gstinformat_pan1.test(inputvalues_pan1)) {
                        return true;
                    } else {
                        $.alert({
                            title: 'Warning!',
                            content: 'Please Enter Valid PAN Number',
                        });
                            $("#shippingaddresspan_no_convert").val('');
                            $("#shippingaddresspan_no_convert").focus();
                    }
                }count=0;

            }count++;
        });
    </script>
<!-- convertToInvoice pannumber validation in Bill From end-->

<!-- convertToInvoice Discount type validation script Start -->  
<script type="text/javascript">
            $(document).on('change',"#discount_type_convert", function(){ 
             var item = this.value ;
          // alert(item);
                  if(item=="At item level"){
                    $("#discount_convert_to_invoice").show();
                     $(".discount_convert_to_invoice").show();
                     $(".edit_dynamic_discount_to").show();
                     $("#discount_esti_invoice_to").hide();
                  }
                  else if(item=="At invoice level"){
                     $("#discount_convert_to_invoice").hide();
                     $(".discount_convert_to_invoice").hide();
                     $(".edit_dynamic_discount_to").hide();
                     $("#discount_esti_invoice_to").show();
         
         
                  }
                  else if(item == "Select Discount Type"){
                     $("#discount_convert_to_invoice").hide();
                       $(".discount_convert_to_invoice").hide();
                      $(".discount_esti_invoice_to").hide();
                      $("#edit_dynamic_discount_to").hide();
                  }
         
          });
      </script>
      <!-- Convert to Invoice Discount type Validation Script End -->

<!-- Convert to Invoice Date Validation Script Start -->

<script type="text/javascript">
        var date=0;
        $(document).on("change",".con_invDate3", function(e){ 
          e.preventDefault();
          e.stopImmediatePropagation();
          if(date==2){
          
          var invoice_date = this.value;
          var order_date= $(".con_orderDate3").val();


          if(invoice_date<order_date){
            $.alert("INVOICE DATE NOT THE PAST DATE OF ORDER DATE");
            $(this).val("");
          }
         date=0;
       }
         date++;
         });

</script>

<script type="text/javascript">
  var date=0;
   $(document).on("change",".con_dueDate3", function(e){ 
         e.preventDefault();
          e.stopImmediatePropagation();

          if(date==2){
          var due_date = this.value;
          var invoice_date= $(".con_invDate3").val();


          if(invoice_date>due_date)
          {
            $.alert("DUE DATE NOT THE PAST DATE OF INVOICE DATE");
            $(this).val("");
          }
         date=0;
       }
       date++;
         });

</script>
<!-- Convert to Invoice Date Validation Script End -->
<!-- Convert to Invoice Date Picker Script Start -->
 <script>
   $(document).on("click", ".date", function(){
        $( ".date" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
    } );
    </script>

     <script>
   $(document).on("click", ".con_invDate3", function(){
        $( ".con_invDate3" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
    } );
    </script>

     <script>
   $(document).on("click", ".con_dueDate3", function(){
        $( ".con_dueDate3" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
    } );
    </script>

    <script>
   $(document).on("click", ".con_orderDate3", function(){
        $( ".con_orderDate3" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
    } );
    </script>
<!-- Convert to Invoice Date Picker Script End -->
<!-- Convert-to-Invoice Sript End here -->


<!-- edit Invoice Sript Start here -->
<!-- edit Invoice modal Start here -->

  <div class="container">
            <!-- Invoice Modal Start -->
           <div class="modal fade" id="edit_billingentityModal" role="dialog" data-backdrop="static">
              <div class="modal-dialog modal-lg">
                 <!-- Billing Entity content-->
                 <div class="modal-content">
                    <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title" id="billingentityModal">Billing Entity Modal</h4>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                          <div class="edit_billingentity_Form"></div>
                      </div>
                    </div>
                    <!--modal-body close -->
                 </div>
                 <!--modal-content close -->
              </div>
              <!--modal-dialog close -->
           </div>
        <!--Billing Entity modal close -->

         <!-- Invoice Modal Start -->
         <div class="modal fade" id="edit_invoiceModal" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="financialModal">Invoice Modal</h4>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                        <div class="edit_invoice_Form"></div>
                    </div>
                  </div>
                  <!--modal-body close -->
               </div>
               <!--modal-content close -->
            </div>
            <!--modal-dialog close -->
         </div>
<!--Invoice modal close -->

<!-- Create Account Modal -->
         <div class="modal fade" id="Create_invoice_account_Modal" role="dialog">
            <div class="modal-dialog modal-lg">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Account</h4>
                    
                  </div>
                  <div class="modal-body">
                    <div class="container">
                                  <button type="button" id="invoice_create_account1"  class="btn btn-primary" data-toggle="modal" data-target="#invoice_create_account">Create Account</button>
                                 <!--  <button type="button" class="btn btn-default">Cancel</button> -->
                              
                     <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
 <!-- Create Account Modal close-->

  <!-- Create Account For Invoice Modal Start-->
         <div class="modal fade" id="invoice_create_account" role="dialog">
            <div class="modal-dialog modal-lg">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Create Account</h4>
                  </div>
                  <div class="modal-body">
                     <div class="container">
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
                              <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 50px;">
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
                                 <input type="text"  name="invoice_account_no" id="invoice_account_no" class="form-control"  minlength="10"  maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="" >
                              </div>
                           </div>
                        </div>
                        <button class="btn btn-success" id="" style="visibility: hidden;margin-bottom: 20px;">Add Item</button> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
<!-- Create Account  close -->
</div>

<!-- Edit Invoice billing_address_postal_code_invoice valiadtion Script Start--> 
      <script type="text/javascript">
                  function postal_code() {
                      var val1 = $('#billing_address_postal_code_invoice').val();

                      if (val1 == "") {
                          $.alert({
                              title: 'Alert!',
                              content: 'Please enter postal code',
                              type: 'dark',
                              typeAnimated: true
                          });
                      } else {
                          if (/^\d{6}$/.test(val1)) {

                          } else {
                              $.alert({
                                  title: 'Alert!',
                                  content: 'Postal code must be of 6 digits',
                                  type: 'dark',
                                  typeAnimated: true,
                                  buttons: {
                                      ok: function() {
                                          if (val1) {
                                              $('#billing_address_postal_code_invoice').val("");
                                          }

                                      }
                                  }
                              });
                          }
                      }
                  }
                </script>

              <!-- Edit Invoice billing_address_postal_code_invoice valiadtion Script End-->  


              <!-- Edit Invoice shipping_address_postal_code valiadtion Script Start-->    

                <script type="text/javascript">
                  function shipping_postal_code_invoice() 
                  {
                      var val1 = $('#shipping_address_postal_code_invoice').val();

                      if (val1 == "") 
                      {
                          $.alert({
                              title: 'Alert!',
                              content: 'Please enter postal code',
                              type: 'dark',
                              typeAnimated: true
                          });
                      } else 
                      {
                          if (/^\d{6}$/.test(val1)) {

                          } else 
                          {
                              $.alert({
                                  title: 'Alert!',
                                  content: 'Postal code must be of 6 digits',
                                  type: 'dark',
                                  typeAnimated: true,
                                  buttons: {
                                      ok: function() {
                                          if (val1) {
                                              $('#shipping_address_postal_code_invoice').val("");
                                          }

                                      }
                                  }
                              });
                          }
                      }
                  }
                </script>

              <!-- Edit Invoice shipping_address_postal_code valiadtion Script End-->
      
  
    <!-- edit_gstinnumber_invoice validation script Start -->
  
                <script>
                    // var countgst=0;
                  $(document).on('change', ".edit_gstinnumber_invoice", function(e) {
                    e.stopImmediatePropagation();
                    // if(countgst==12){
                      var inputvalues_invoice = $(this).val();
                      var inputvaluesship_invoice = $('.edit_gstinnumber_shipping_invoice').val();
                      //alert(inputvalues_invoice);
                      var gstinformat_invoice =new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');

                      if (inputvalues_invoice == "") {
                          $('#edit_invoice_gst_rate').attr('disabled', 'true');
                          $('.edit_invoice_gst_rate').attr('disabled', 'true');
                          $('#edit_invoice_g_s_t').attr('disabled', 'true');
                          $('.edit_invoice_dynamic_gst_rate').attr('disabled', 'true');

                      }
                      if (inputvalues_invoice == inputvaluesship_invoice) {

                          $.alert({

                              title: 'Warning!',
                              content: 'GSTIN Number should not be equal',
                              buttons: {
                                  Ok: function() {
                                      $('.edit_gstinnumber_invoice,.edit_gstinnumber_shipping_invoice').val("");
                                  }
                              }
                          });
                      } else {
                          if (gstinformat_invoice.test(inputvalues_invoice)) {
                              $('#edit_invoice_gst_rate').removeAttr('disabled');
                              $('.edit_invoice_gst_rate').removeAttr('disabled');
                              $('#edit_invoice_g_s_t').removeAttr('disabled');
                              $('.edit_invoice_dynamic_gst_rate').prop("disabled", false);
                              return true;
                          } else {

                              $.alert({

                                  title: 'Warning!',
                                  content: 'Please Enter Valid GSTIN Number',
                              });
                              //$.alert('Please Enter Valid GSTIN Number');
                              $(".edit_gstinnumber_invoice").val('');
                              $(".edit_gstinnumber_invoice").focus();
                          }
                      }
                      // countgst=0;
                  // }countgst++;
                  }); 
                </script> 

              <!-- edit_gstinnumber_invoice validation script End -->


              <!-- edit_gstinnumber_shipping_invoice validation script Start -->

                <script>
                    // var countgst=0;
                  $(document).on('change', ".edit_gstinnumber_shipping_invoice", function(e) {
                    e.stopImmediatePropagation();
                    // if(countgst==12){
                    var inputvalues_invoice1 = $(this).val();
                    var inputvaluesship_invoice1 = $('.edit_gstinnumber_invoice').val();
                    var gstinformat_invoice =new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');

                    if (inputvalues_invoice1 == inputvaluesship_invoice1) {

                        $.alert({
                          
                            title: 'Warning!',
                            content: 'GSTIN Number should not be equal',
                            buttons: {
                                Ok: function() {
                                    $('.edit_gstinnumber_invoice,.edit_gstinnumber_shipping_invoice').val("");
                                }
                            }
                        });
                    } else {

                        if (gstinformat_invoice.test(inputvalues_invoice1)) {
                            return true;
                        } else {

                            $.alert({
                                title: 'Warning!',
                                content: 'Please Enter Valid GSTIN Number',
                            });
                            //$.alert('Please Enter Valid GSTIN Number');
                            $(".edit_gstinnumber_shipping_invoice").val('');
                            $(".edit_gstinnumber_shipping_invoice").focus();
                        }
                    }
                    // countgst=0;
                // }countgst++;
                });
                </script>

              <!-- edit_gstinnumber_shipping_invoice validation script End -->


               <!-- Invoice edit_pannumber in Bill To Start--> 
                    <script>
                        // var countpan=0;
                       $(document).on('change', ".edit_pannnumber_invoice", function(e) {
                        e.stopImmediatePropagation();
                        // if(countpan==12){
                            var inputvalues = $(this).val().toUpperCase();
                            var inputvaluesship = $('.edit_pannumber_shipping_invoice').val().toUpperCase();
                            var gstinformat = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');
                            if (inputvalues == "") {
                                return true;
                            } else if (inputvalues == inputvaluesship) {

                                $.alert({
                                    title: 'Warning!',
                                    content: 'PAN Number should not be equal',
                                    buttons: {
                                        Ok: function() {
                                            $('.edit_pannnumber_invoice,.edit_pannumber_shipping_invoice').val("");
                                        }
                                    }
                                });
                            } else {
                                if (gstinformat.test(inputvalues)) {
                                    return true;
                                } else {
                                  
                                    $.alert({
                                        title: 'Warning!',
                                        content: 'Please Enter Valid PAN Number',
                                    });
                                    $(".edit_pannnumber_invoice").val('');
                                    $(".edit_pannnumber_invoice").focus();
                                }
                            }
                            // countpan=0;
                        // }countpan++;
                         });
                    </script>
                    <!-- Invoice edit_pannumber in Bill To end-->


                <!-- Invoice edit_pannumber in Bill From Start--> 
                    <script>
                        // var countpan=0;
                       $(document).on('change', ".edit_pannumber_shipping_invoice", function(e) {
                        e.stopImmediatePropagation();
                        // if(countpan==12){
                            var inputvalues = $(this).val().toUpperCase();
                            var inputvaluesship = $('.edit_pannnumber_invoice').val().toUpperCase();
                            var gstinformat = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');
                            if (inputvalues == "") {
                                return true;
                            } else if (inputvalues == inputvaluesship) {
                                $.alert({
                                    title: 'Warning!',
                                    content: 'PAN Number should not be equal',
                                    buttons: {
                                        Ok: function() {
                                            $('.edit_pannumber_shipping_invoice,.edit_pannnumber_invoice').val("");
                                        }
                                    }
                                });
                            } else {
                                if (gstinformat.test(inputvalues)) {
                                    return true;
                                } else {
                                    $.alert({
                                        title: 'Warning!',
                                        content: 'Please Enter Valid PAN Number',
                                    });
                                    $(".edit_pannumber_shipping_invoice").val('');
                                    $(".edit_pannumber_shipping_invoice").focus();
                                }
                            }
                            // countpan=0;
                        // }countpan++;
                         });
                    </script>
                    <!-- Invoice edit_pannumber in Bill From end-->

                    <!-- Edit Invoice Datatable script Start -->
                
                <script>
                  $(document).ready(function() {

                          var table = $('#example').dataTable({
                              "bProcessing": true,
                              "sAjaxSource": "../../client/res/templates/financial_changes/generate_account_table.php",
                              "bPaginate": true,
                              "sPaginationType": "full_numbers",
                              "iDisplayLength": 5,
                              "destroy": true,
                              "aoColumns": [{
                                      mData: 'Name',
                                      "render": function(data) {

                                          return "<a href='javascript:void(0);' onclick='setcount(\"" + data + "\")'>" + data + "</a>";
                                      }
                                  },
                                  {
                                      mData: 'Country'
                                  },
                              ]
                          });
                           });

                          function setcount(data) {
                              $("input[name=account_id_invoice]").val(data);
                              $('#Create_invoice_account_Modal').modal('toggle');
                          }

        var first = window.location.pathname;
        first.indexOf(2);
        first.toLowerCase();
        first = first.split("/")[2];
        $('#invoice_no').blur(function(e) {
          e.stopImmediatePropagation();
                      e.preventDefault();
            no = $('#invoice_no').val();
            if (first == 'portal') {
                $.ajax({
                    url: "../../client/res/templates/financial_changes/check_invoice_no.php?no=" + no,
                    type: "post",
                    async: false,
                    success: function(result) {

                        if (result == 1) {
                            $.confirm({
                                title: 'Warning!',
                                content: 'Estimate number exist,please enter another one!',
                                buttons: {
                                    Ok: function() {
                                        $('#invoice_no').val("");
                                    }
                                }

                            });
                        }
                    }

                });
            } else {
                $.ajax({
                    url: "../../client/res/templates/financial_changes/check_invoice_no.php?no=" + no,
                    type: "post",
                    async: false,
                    success: function(result) {
                        if (result == 1) {
                            $.confirm({
                                title: 'Warning!',
                                content: 'Invoice number exist,please enter another one!',
                                buttons: {
                                    Ok: function() {
                                        $('#invoice_no').val("");
                                    }
                                }

                            });
                        }

                    }

                });
            }
        });
                </script>
                
<!-- Edit Invoice Datatable script End -->



 <!-- Edit Invoice Save Account Scripts Start -->         

      <script>
        // var count=0;
            $("#invoice_account_save").click(function(e) {
              e.stopImmediatePropagation();
                      e.preventDefault();
            // if (count==10){
            var name = $("#invoice_account_name").val();
            var email = $("#invoice_account_email").val();
            var no = $("#invoice_account_no").val();
           
            if (name == '') {
                $.confirm({
                    title: 'Warning!',
                    content: 'Please Enter Name',
                    buttons: {
                        Ok: function() {

                             $("#invoice_account_name").val("");

                        }
                    }
            

                });
    
            } else if (email != '' && IsEmail(email) == false) {

                $.confirm({
                    title: 'Warning!',
                    content: 'Please Enter Valid Email Address',
                    buttons: {
                        Ok: function() {
                            $("#invoice_account_email").val("");
                        }
                    }

                });
            } else if (no != '' && no.length != 10) {

                $.confirm({
                    title: 'Warning!',
                    content: 'Please Enter 10 Digit Mobile Number',
                    buttons: {
                        Ok: function() {
                            $("#invoice_account_no").val("");
                        }
                    }

                });

            } else {

                $.ajax({
                    url: "../../client/res/templates/financial_changes/save_account.php?name=" + name + "&email=" + email + "&no=" + no,
                    type: "get",
                    async: false,
                    success: function(result) {
                        if (result == 1) {
                            $("#account_id_invoice").val(name);
                            $("#invoice_account_name").val("");
                            $("#invoice_account_no").val("");
                            $("#invoice_account_email").val("");
                            $('#invoice_create_account').modal('toggle');
                            $('#Create_invoice_account_Modal').modal().modal('toggle');
                        } else {

                            $.confirm({
                                title: 'Warning!',
                                content: 'Failed to create account',
                                buttons: {
                                    Ok: function() {}
                                }
                            });
                        }
                    }
                });
            }



            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }
            // count=0;
        // }
        // count++;

        });
           
      </script>
<!-- Edit Invoice Save Account Scripts End -->  
<!-- Edit Invoice  GST valiadtion Script Start-->
      <script>
         function getval_invoice(){
           //alert("HI")
           var val= document.getElementById('edit_invoice_g_s_t').value;
         
           if(val=="IGST"){
             $("#SGST_BLOCK").css("display", "none");
             $("#CGST_BLOCK").css("display", "none");
             $("#IGST_BLOCK").css("display", "block");
           }else{
             $("#IGST_BLOCK").css("display", "none");
             $("#SGST_BLOCK").css("display", "block");
             $("#CGST_BLOCK").css("display", "block");
           }
           //alert(val);
         }
         var getGSTVal= $("#edit_invoice_g_s_t").val();
         if(getGSTVal=="IGST"){
              $("#IGST_BLOCK").css("display", "block");
         }else if(getGSTVal=="CGST/SGST"){
             $("#SGST_BLOCK").css("display", "block");
              $("#CGST_BLOCK").css("display", "block");
         }
      </script>
  <!-- Edit Invoice  GST valiadtion Script End-->

   <!-- Edit Invoice Discount Type valiadtion Script Start-->

                <script type="text/javascript">
                     /*$("#discount_invoice").hide();
                       $("#discount_esti_invoice").hide();*/
                     $(document).on('change', "#edit_discount_type_invoice", function() {
                         var item = $(this).val();
                         // var item = this.value;

                         if (item == 'At item level') {
                             $("#discount_invoice").show();
                             $(".discount_invoice").show();
                             $(".edit_dynamic_discount_invoice").show();
                             $("#discount_esti_invoice").hide();
                         } else if (item == 'At invoice level') {
                             $("#discount_invoice").hide();
                             $(".discount_invoice").hide();
                             $(".edit_dynamic_discount_invoice").hide();
                             $("#discount_esti_invoice").show();
                             // $("#discount_calculate_invoice").show();

                         } else if (item == 'Select Discount Type') {
                             $("#discount_invoice").hide();
                             $(".discount_invoice").hide();
                             $("#discount_esti_invoice").hide();
                             $(".edit_dynamic_discount_invoice").hide();
                         }

                     });
                </script>

              <!-- Edit Invoice Discount type valiadtion Script End-->


<!-- Edit Invoice Remove Item script Start -->

                 <script type="text/javascript">
                    // var itemsCount=0;
                    $(document).on("click", ".btnUpdate3_invoice", function(e) {
                      e.stopImmediatePropagation();
                      e.preventDefault();
                      // if(itemsCount==12){
                      var id = $(this).data("update-id");
                      var et_id = $(this).data("db-id");

                      $.confirm({
                          title: 'Warning',
                          content: 'Do you want to remove item?',
                          type: 'dark',
                          typeAnimated: true,
                          buttons: {
                              Ok: function() {
                                  $.ajax({
                                      url: "../../client/res/templates/financial_changes/delete_invoice_items.php?id=" + et_id,
                                      type: "post",
                                      async: false,
                                      success: function(result) {
                                          if (result == 1) {
                                              $("#" + id).closest("div").remove();
                                              $.confirm({
                                                  title: 'Success!',
                                                  content: 'Item removed successfully!',
                                                  type: 'dark',
                                                  typeAnimated: true,
                                                  buttons: {
                                                      Ok: function() {

                                                      }
                                                  }
                                              });
                                          }
                                      }
                                  });
                              },
                              Cancel: function() {
                              }
                          }
                      });
                      // itemsCount=0;
                    // }itemsCount++;
                  });
                 </script>
<!-- Edit Invoice Remove Item script End -->
             
<!-- Edit Invoice Add Item script Start -->

                <script>
                  var count=0;
                    var count_invoice = 0;
                    // $(document).ready(function(){

                          // $("#Add_invoice").on("click", function() {
                            $(document).on("click", "#addInvoice", function(e){
                              // if(count==12){
                                e.stopImmediatePropagation();
                                 e.preventDefault();
                                  count=0;
                              // alert("IN ADD INVOICE ITEM");
                              var inputvalues_invoice = $('.edit_gstinnumber_invoice').val();
                              var item_dynamic = $('#edit_discount_type_invoice').val();


                             $("#invoiceAdd").append('<div class="item" id="'+count_invoice+'" style=" "> <div class=" " style=""><div class="row" style=" margin-top:10px;"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Item Name<span class="text-danger">*</span></label><input type="text"  name="item_invoice_name[]" class="form-control" placeholder="" maxlength="40" required></div></div><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Description</label><textarea  type="text"  name="description_invoice[]" class="form-control" placeholder="" maxlength="180"></textarea></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">HSN/SAC</label><input type="text"  name="hsn_invoice[]" class="form-control" placeholder=""></div></div><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Quantity<span class="text-danger">*</span></label><input type="text"  name="quantity_invoice[]" class="form-control quantity_invoice" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></div></div></div><div class="row" style="padding-bottom:5px;"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Rate<span class="text-danger">*</span></label><input type="text"  name="rate_invoice[]" class="form-control rate_invoice" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></div></div><div class="col-sm-6  col-md-6"><div class="form-group"><label for="">Gst Rate</label><select class="form-control edit_invoice_dynamic_gst_rate" name="gst_rate_invoice[]" id="edit_invoice_dynamic_gst_rate' + count_invoice + '" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><option value="">Select GST Rate</option><option>0</option><option>1</option><option>2</option><option>3</option><option>5</option><option>6</option><option>12</option><option>18</option><option>28</option></select></div></div></div></div><div class="row edit_dynamic_discount_invoice" id="edit_dynamic_discount_invoice'+count_invoice+'"  style="padding-bottom:5px;"><div class="col-sm-6 col-md-6"><div class="form-group"><label for="">Discount</label><div class="input-group discount_estimate"><input id="discount_invoice" type="text" class="form-control discount_invoice" name="estimate_discount_amount_item_invoice[]" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><span class="input-group-addon" style="padding: 0px;"><select name="estimate_discount_option_item_invoice[]" id="option_invoice" style="padding: 6px 3px;border: none;"><option>%</option><option>Rs</option></select></span></div></div></div><div class=" col-sm-6 col-md-6"></div></div><div class="row"><div class="col-md-12"><a class="btn btn-primary btn2" data-update-id="'+count_invoice+'" id="remove_field'+count_invoice+'" style="margin-bottom:10px;">Remove Item</a></div></div></div>');

                             // alert("hello");
                              if (inputvalues_invoice == "") {
                                  // $('#edit_invoice_dynamic_gst_rate'+count).attr('disabled', 'true');
                              } else {
                                  // $('#edit_invoice_dynamic_gst_rate'+count).prop("disabled", false);
                              }

                              if (item_dynamic == 'At item level') {
                                  $('#edit_dynamic_discount_invoice' +count).show();
                                  $("#discount_esti_invoice").hide();
                              } else if (item_dynamic == 'At invoice level') {
                                  $('#edit_dynamic_discount_invoice' +count).hide();
                                  $("#discount_esti_invoice").show();
                              } else if (item_dynamic == 'Select Discount Type') {
                                  $('#edit_dynamic_discount_invoice' +count).hide();
                                  $("#discount_esti_invoice").hide();
                              }
                              
                            // }
                            count_invoice=0;
                            count++;
                          });


                      </script>
      <!-- Edit Invoice Add Item script End -->

      <!-- Edit Invoice Remove Add Item script Start -->
                      <script>
                        var count=0;
                         $(document).on("click", ".btn2", function(e) {
                          e.stopImmediatePropagation();
                      e.preventDefault();
                          // if(count==12){
                              var id = $(this).data("update-id");
                              $.confirm({
                                  title: 'Warning',
                                  content: 'Do you want to remove item?',
                                  type: 'dark',
                                  typeAnimated: true,
                                  buttons: {
                                      Ok: function() {
                                          $("#" + id).closest("div").remove();
                                      },
                                      Cancel: function() {
                                      }
                                  }
                              });
                              // count=0;
                            // }count++;
                          });
                      
                </script>

              <!-- Edit Invoice Remove Add Item script End -->

   <!-- Edit Invoice adjustmemt_calculate_invoice valiadtion Script Start-->

              <script>
                var addcount=0;
                $(document).on("blur", "#adjustmemt_calculate_invoice", function(){

                  if(addcount=10){
                  var formdata = $('#updateInvoiceForm').serialize();

                  $.ajax({
                      url: "../../client/res/templates/financial_changes/calculate_EditInvoice.php",
                      type: "get",
                      async: false,
                      dataType: "json",
                      data: formdata,

                      success: function(result) {

                          var len = result.length;
                          for (var i = 0; i < len; i++) {
                              // $("#subtotal_invoice").val(result[i].subtotal_invoice);
                              $("#total_invoice").val(result[i].total_amount);
                          }
                      }
                  });addcount=0;
                }addcount++;
                });


                // var dis_count=0;
                // $(document).on("blur", "#discount_calculate_invoice", function(){
                // if(dis_count=10){
                //   var formdata = $('#updateInvoiceForm').serialize();

                //     $.ajax({
                //         url: "../../client/res/templates/calculate_invoice.php",
                //         type: "get",
                //         async: false,
                //         dataType: "json",
                //         data: formdata,
                //         success: function(result) {

                //             var len = result.length;
                //             for (var i = 0; i < len; i++) {
                //                 $("#subtotal_invoice").val(result[i].subtotal);
                //                 $("#total_invoice").val(result[i].total_amount);
                //                 $("#IGSTEst").val(result[i].IGST);
                //                 $("#SGSTEst").val(result[i].SGST);
                //                 $("#CGSTEst").val(result[i].CGST);
         

                //             }
                //         }
                //     });dis_count=0;
                //   }dis_count++;
                //   });


                // var cal_count=0;
                $(document).on("click", "#calculate_invoice", function(e){
                  e.stopImmediatePropagation();
                      e.preventDefault();
                  // if(cal_count=10){
                      var formdata = $('#updateInvoiceForm').serialize();

                       $.ajax({
                          url: "../../client/res/templates/financial_changes/calculate_EditInvoice.php",
                          type: "get",
                          async: false,
                          dataType: "json",
                          data: formdata,
                          success: function(result) {
                           
                              var len = result.length;
                              // alert($("#IGSTEst").val());
                              for (var i = 0; i < len; i++) {
                                  $("#subtotal_invoice").val(result[i].subtotal);
                                  $("#total_invoice").val(result[i].total_amount);
                                  $("#IGSTEst").val(result[i].IGST);
                                  $("#SGSTEst").val(result[i].SGST);
                                  $("#CGSTEst").val(result[i].CGST);
         
                              }
                          }
                      });
                      // cal_count=0;
                     // }cal_count++;
                    });

              </script>  

<!-- Edit Invoice adjustmemt_calculate_invoice valiadtion Script End-->
   
<!-- Edit Invoice Discount valiadtion Script start-->
 <script type="text/javascript">
     
         $(document).on("change",".discount_invoice", function(){ 
          var discount_invoice = this.value ; 

          var parent = $(this).closest(".item");
          var option_invoice = parent.find("#option_invoice").val();
          var rateVal = parent.find(".rate_invoice").val();
          var qtyVal = parent.find(".quantity_invoice").val();

          if(option_invoice=="Rs"){
          var total = qtyVal * rateVal;

          if(total < discount_invoice)
          {
            $.alert("Discount cannot be more than product value.");
            $(this).val("");
          }
        }
        else if(option_invoice=="%"){
          if(discount_invoice>100){
            $.alert("Discount % cannot be more than 100%.");
            $(this).val("");
          }
        }
        });

  </script>

 <script type="text/javascript">
         
        $(document).on("change","#discount_calculate_invoice", function(){ 
        var discount = this.value ; 
        var parent = $(this).closest(".item");

        var invoice_option = $("#invoice_option").val();
        var rateVal = $(".rate_invoice").val();
        var qtyVal = $(".quantity_invoice").val();

        if(invoice_option=="Rs"){

          var total = qtyVal * rateVal;

          if(total < discount)
          {
            $.alert("Discount cannot be more than product value.");
            $(this).val("");
          }
        }
        else if(invoice_option=="%"){

          if(discount>100){

            $.alert("Discount % cannot be more than 100%.");
             $(this).val("");
          }
        }
        });

  </script>
<!-- Edit Invoice Discount valiadtion Script End-->

 <!-- Edit Invoice delete_file_invoice valiadtion Script Start-->
  <script>
        $(document).on("click", ".delete_file_invoice", function (e){
            e.stopImmediatePropagation();
            var dataId = $(this).attr("data-id");
            // alert(dataId);
          // if(removeFileCount==12){
             $.confirm({

              title: 'Warning!',
              content: 'Are you sure want to remove file from server!',
              buttons: {
                Yes: function () {
                
                  $.ajax({
                      url: "../../client/res/templates/financial_changes/remove_invoice_file.php?id="+dataId,
                      type: "get", 
                      async: false,
                      success: function(result)
                       {
                          
                            if(result==1)
                             {
                                 $.confirm({
                                  title: 'Success!',
                                    content: 'File removed successfully from server!',
                                    buttons: {
                                      Ok: function () {
                                          // $("#" + dataId).closest(".row").remove();
                                          // $(this).closest('.li').remove();

                                        // return false;
                                        // window.location.reload();\
                                        var elem = document.getElementById(dataId+"1");
                                        elem.parentNode.removeChild(elem);
                                       
                                    }
                                  }
                                 });
                             }
                             else if(result==0)
                             {
                                $.confirm({
                                    title: 'Warning!',
                                    content: 'Failed to remove file!',
                                    buttons: {
                                      Ok: function () {
                                      }
                                    }
                                });
                             }
                       }
                    });
         
                  },
                  No: function () {
           
                  }
                }
         
            });
            // removeFileCount=0;
             // }
            // removeFileCount++;
          });  
  </script> 
<!-- Edit Invoice delete_file_invoice valiadtion Script End-->


<!-- Edit Invoice Update data Scripts Start -->
 <script type="text/javascript">
        // var uppdateInvoiceBtn=0;
          $(document).on("click", "#update_invoiceBTN", function(event){
        $("#updateInvoiceForm").submit(function(event) {

            event.preventDefault();
             event.stopImmediatePropagation();
    
            // if(uppdateInvoiceBtn==12)
            // {
                 var formdata=$('#updateInvoiceForm');
                 form      = new FormData(formdata[0]);
                jQuery.each(jQuery('#file_invoice')[0].files, function(i, file) {
                    form.append('file_invoice['+i+']', file);
                });
  

               $.ajax({
                  type    : "POST",
                  url     : "../../client/res/templates/financial_changes/update_invoice.php",
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
                                    content: 'Updated successfully!',
                                    buttons: {
                                      Ok: function () {
                                        //window.location.reload();
                                        $('button[data-action="reset"]').trigger('click');
                                        $(function () {
                                         $('#edit_invoiceModal').modal('toggle');
                                          });
                                         //$('#updateEstimateForm')[0].reset();
                                         //return false;
                                      }
                                    }
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
 <!-- Edit Invoice Update data Scripts End -->

 <!-- Edit Invoice Date Validation Script Start -->

<script type="text/javascript">
        var date=0;
        $(document).on("change",".invDate1", function(e){ 
          e.preventDefault();
          e.stopImmediatePropagation();
          if(date==2){
          
          var invoice_date = this.value;
          var order_date= $(".orderDate1").val();

            if(invoice_date<order_date)
            {
              $.alert("INVOICE DATE NOT THE PAST DATE OF ORDER DATE");
              $(this).val("");
            }
         date=0;
        }
         date++;
    });

</script>

<script type="text/javascript">
   var date=0;
        $(document).on("change",".dueDate1", function(e){ 
          e.preventDefault();
          e.stopImmediatePropagation();
          if(date==2){
          
            var dueDate = this.value;
            var invDate= $(".invDate1").val();

            if(invDate>dueDate)
            {
              $.alert("INVOICE DATE NOT THE PAST DATE OF ORDER DATE");
              $(this).val("");
            }
         date=0;
        }
         date++;
    });
</script>
<!-- Edit Invoice Date Validation Script End -->

<!-- Edit Invoice Date Picker Script Start -->
 <script>
   $(document).on("click", "#date", function(){
        $( "#date" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
    } );
    </script>
     <script>
   $(document).on("click", "#date_invoice1", function(){
        $( "#date_invoice1" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
    } );
    </script>
     <script>
   $(document).on("click", "#date_invoice2", function(){
        $( "#date_invoice2" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
    } );
    </script>
    <script>
   $(document).on("click", "#date_invoice3", function(){
        $( "#date_invoice3" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
    } );
    </script>
<!-- Edit Invoice Date Picker Script End -->

 <!-- Edit Invoice Scripts End -->



 <!-- Edit Payment Scripts Start -->
  <!-- Edit Payment modal Start here -->

  <div class="container">
         <!-- Payment Modal Start -->
         <div class="modal fade" id="edit_paymentModal" role="dialog" data-backdrop="static">
            <div class="modal-dialog" style="width:1320px;">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="financialModal">Payment Modal</h4>
                  </div>
                  <div class="modal-body">
                        <div class="container">
                        <div class="edit_payment_Form"></div>
                    </div>
                  </div>
                  <!--modal-body close -->
               </div>
               <!--modal-content close -->
            </div>
            <!--modal-dialog close -->
         </div>
  <!-- Edit Payment modal close -->
</div>


  <!-- Edit Payment Update data script Start -->
 <script type="text/javascript">
        // var uppdatePaymentBtn=0;
          $(document).on("click", "#update_paymentBTN", function(event){
            event.preventDefault();
            event.stopImmediatePropagation();
                      
            // if(uppdatePaymentBtn==19){
                 var formdata=$('#updatePaymentForm');
                 form      = new FormData(formdata[0]);
                // jQuery.each(jQuery('#attachment')[0].files, function(i, file) {
                //     form.append('attachment['+i+']', file);
                // });
                
                

               $.ajax({
                  type    : "POST",
                  url     : "../../client/res/templates/financial_changes/update_payment.php",
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
                                    content: 'Updated successfully!',
                                    buttons: {
                                      Ok: function () {
                                        //window.location.reload();
                                        $('button[data-action="reset"]').trigger('click');
                                        $(function () {
                                         $('#edit_paymentModal').modal('toggle');
                                          });
                                      }
                                    }
                                 });
                             }
 

                  }
                });
                // alert("IN UPDATE ESTIMATE BTN METHOD");
                // uppdatePaymentBtn=0;
                
            // }
            // uppdatePaymentBtn++;
          });
      </script>
<!-- Edit Payment Update data script End -->   
   <script>
         $(".readonly").on('keydown paste', function(e){
               e.preventDefault();
          });
      </script>
<!-- Payment Datepicker script start -->
<script>
   $(document).on("click", "#datepicker", function(){
        $( "#datepicker" ).datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
    } );
    </script>
 <!-- Payment Datepicker script end -->




<!-- Edit Payment alculation script Start -->
<script type="text/javascript">
  // var  total=0; 
  $(document).on('change', ".tds1", function(e)  
// $("#tds1").blur(function()
{
  e.stopImmediatePropagation();
    e.preventDefault();
// alert("in fun");
// if(total==6){

    var due_amount= $("#due_amount").val();
    var tds1= parseFloat($("#tds1").val());
    var invoice_amount= parseFloat($("#invoice_amount").val());
    var net_amount1= parseFloat($("#net_amount1").val());
    
    var due_amount1 = invoice_amount - (tds1 + net_amount1);

    if(due_amount1 >= 0)
    {
      
        $("#net_amount1").val(net_amount1);
        $("#due_amount").val(due_amount1);
    }
    else if(due_amount1 < 0)
    {
      $("#tds1").val("0");
      $("#net_amount1").val("0");
      $("#due_amount").val(due_amount);
      $.alert("The amount entered is more than the balance due for selected invoice");
       
    }
// total=0;
// }total++;
});


var counttot=0;
$(document).on('change', ".net_amount1", function(e) {
// $("#net_amount1").blur(function()
e.stopImmediatePropagation();
e.preventDefault();
// alert("in net ");
 // if(counttot==7){
    var due_amount=$("#due_amount").val();
    var tds1= parseFloat($("#tds1").val());
    var invoice_amount= parseFloat($("#invoice_amount").val());
    var net_amount1= parseFloat($("#net_amount1").val());
    
    var due_amount1 = invoice_amount- (tds1 + net_amount1);
    if(due_amount1 > 0)
    {
      
        $("#net_amount1").val(net_amount1);
        $("#due_amount").val(due_amount1);
    }
    else if(due_amount1 < 0)

    {
     
        $("#net_amount1").val("0");
        $("#due_amount").val(due_amount);
        $.alert("The amount entered is more than the balance due for selected invoice");
      
    }
    // counttot=0;

  // }
  // counttot++;
});

</script>
<!-- Edit Payment alculation script End -->

<!-- BILLING ENTITY SCRIPT STARTS HERE -->
<!-- Billing Entity Update data Script Starts. --> 
<script type="text/javascript">
  // var uppdateEstimateBtn=0;
  $(document).on("click", "#save", function(event){

    $("#updateBillingEntityForm").submit(function(event) {
      event.preventDefault();
      event.stopImmediatePropagation();

      var bank_check = onSaveCheckFields_edit();

      var gst_check = "";

      //if (radioValue == 'Yes') {
          gst_check = onSaveGstCheckFields_edit();
      //}

      if ((bank_check == false && gst_check == false)) {
        var formdata=$('#updateBillingEntityForm');
        form      = new FormData(formdata[0]);
        $.ajax({
          type    : "POST",
          url     : "../../client/res/templates/financial_changes/update_billing_entity.php",
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
                content: 'Updated successfully!',
                buttons: {
                  Ok: function () {
                      //window.location.reload();
                      $('button[data-action="reset"]').trigger('click');
                      $(function () {
                          $('#edit_billingentityModal').modal('toggle');
                      });
                  }
                }
              });
            }
          }
        });
      }
      else {
        $.alert({
            title: 'Alert!',
            content: 'Oops !!! form submission fail',
             type: 'dark',
             typeAnimated: true,
             buttons: {
              ok: function () {

              }
            }
        });
      }
    });
  });
</script>


<script>
  var count=0;
  var count_bk = 0;
  var count_1=1;
  // $(document).ready(function(){

    // $("#Add_invoice").on("click", function() {
      $(document).on("click", "#Add_billingentitybankdetails_edit", function(e){
        var cnt2 = parseInt($("#totalBank_count").val()) + 1;
        // if(count==12){
          e.stopImmediatePropagation();
           e.preventDefault();
            count=0;
        
       $("#bankDetRow_billingentity_edit").append('<div id="billentbank'+count_bk+'" class="col-md-12"><div class="row"><div class="col-md-6"><div class="form-group"><label>Bank account '+cnt2+'</label></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_bank_beneficiary[]" data-id="'+count_bk+'" id="billingentity_bank_beneficiary'+cnt2+'" class="form-control" placeholder="Beneficiary name" maxlength="56" onblur="checkBankValidation('+cnt2+')"></div></div><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_bank_name[]" data-id="'+count_bk+'" id="billingentity_bank_name'+cnt2+'" class="form-control" placeholder="Bank name" maxlength="56" onblur="checkBankValidation('+cnt2+')"></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_bank_ifc[]" data-id="'+count_bk+'" id="billingentity_bank_ifc'+cnt2+'" class="form-control" placeholder="IFSC Code" maxlength="56" onblur="checkBankValidation('+cnt2+')"></div></div><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_bank_accountno[]" data-id="'+count_bk+'" id="billingentity_bank_accountno'+cnt2+'" class="form-control" placeholder="Account no" maxlength="56"onkeypress="return event.charCode >= 48 && event.charCode <= 57" onblur="checkBankValidation('+cnt2+')"></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><select value="" name="billingentity_bank_accounttype[]" data-id="'+count_bk+'" id="billingentity_bank_accounttype'+cnt2+'" class="form-control" placeholder="Account type" onchange="checkBankValidation('+cnt2+')"><option value="">Select Account Type</option><option value="Savings">Savings</option><option value="Current">Current</option><option value="Cash Credit">Cash Credit</option><option value="Overdraft">Overdraft</option></select></div></div><div class="col-md-6"><div class="form-group"><input type="text" value="" name="billingentity_bank_upi[]" id="billingentity_bank_upi'+cnt2+'" class="form-control" placeholder="UPI ID" maxlength="56"></div></div></div><button class="btn btn-primary btnUpdate3_billingentity" data-update-id3="'+count_bk+'" id="remove_field3'+count_bk+'" style="margin-bottom:10px;">Remove bank details</button></div>');

      count_bk=0;
      count++;
      count1++;
    });


</script>



<script type="text/javascript">
    // var itemsCount=0;
    $(document).on("click", ".btnUpdate3_billingentity", function(e) {
      e.stopImmediatePropagation();
      e.preventDefault();
      // if(itemsCount==12){
      var id = $(this).data("update-id");
      var et_id = $(this).data("db-id");
      var div_id = $(this).data("id");

      $.confirm({
          title: 'Warning',
          content: 'Do you want to remove bank details?',
          type: 'dark',
          typeAnimated: true,
          buttons: {
              Ok: function() {
                  $.ajax({
                      url: "../../client/res/templates/financial_changes/delete_billingentity_bankdetails.php?id=" + et_id,
                      type: "post",
                      async: false,
                      success: function(result) {
                          if (result == 1) {
                              $("#" + id).closest("div").remove();
                              $.confirm({
                                  title: 'Success!',
                                  content: 'Bank details removed successfully!',
                                  type: 'dark',
                                  typeAnimated: true,
                                  buttons: {
                                      Ok: function() {
                                        $("#edit_billingentity_bankdetails"+div_id).remove();
                                      }
                                  }
                              });
                          }
                      }
                  });
              },
              Cancel: function() {
              }
          }
      });
      // itemsCount=0;
    // }itemsCount++;
  });
 </script>


 <script>
  var count=0;
  var count_gst = 0;
  var count_1=1;
  // $(document).ready(function(){
    // $("#Add_invoice").on("click", function() {
      $(document).on("click", "#Add_billingentitygst_edit", function(e){
        var cnt2 = parseInt($("#totalGST_count").val()) + 1;
        // if(count==12){
          e.stopImmediatePropagation();
           e.preventDefault();
            count=0;
        
       $("#gstDetRow_billingentity_edit").append('<div id="billentgst'+count1+'" class="col-md-12"><div class="row"><div class="col-md-6"><div class="form-group"><label >GST '+(cnt2)+'</label><input type="text" value="" name="billingentity_gst[]" data-id="'+cnt2+'" id="edit_billingentity_gst'+cnt2+'" class="form-control" placeholder="GST NO" maxlength="56" onblur="getGST_state_edit(this.value, '+cnt2+')"></div></div><div class="cell col-sm-6 form-group" data-name="billingEntityGSTAddress"><label class="control-label" data-name="billingEntityGSTAddress"><span class="label-text">Address '+(cnt1)+'</span></label><div class="field" data-name="billingEntityGSTAddress"><textarea class="form-control auto-height" data-id="edit_billingEntityGSTAddressStreet'+cnt2+'" name="billingEntityGSTAddressStreet[]" rows="1" placeholder="Street" autocomplete="espo-street" maxlength="255"></textarea><div class="row"><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" data-id="edit_billingEntityGSTAddressCity'+cnt2+'" data-name="billingEntityGSTAddressCity" name="billingEntityGSTAddressCity[]" value="" placeholder="City" autocomplete="espo-city" maxlength="255"></div><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" id="edit_billingEntityGSTAddressState'+cnt2+'" data-id="billingEntityGSTAddressState'+cnt2+'" data-name="billingEntityGSTAddressState" name="billingEntityGSTAddressState[]" value="" placeholder="State" autocomplete="espo-state" maxlength="255"></div><div class="col-sm-4 col-xs-4"><input type="text" class="form-control" data-id="edit_billingEntityGSTAddressPostalCode'+cnt2+'" data-name="billingEntityGSTAddressPostalCode" name="billingEntityGSTAddressPostalCode[]" value="" placeholder="Postal Code" autocomplete="espo-postalCode" minlength="6" maxlength="6"></div></div></div></div></div><button class="btn btn-primary btnUpdate4_billingentity" data-update-id4="'+count1+'" id="remove_field4'+count_gst+'" style="margin-bottom:10px;">Remove GST details</button></div>');

      count_bk=0;
      count++;
      count1++;
    });


</script>


 <script type="text/javascript">
    // var itemsCount=0;
    $(document).on("click", ".btnUpdate4_billingentity", function(e) {
      e.stopImmediatePropagation();
      e.preventDefault();
      // if(itemsCount==12){
      var id = $(this).data("update-id");
      var et_id = $(this).data("db-id");
      var div_id = $(this).data("id");

      $.confirm({
          title: 'Warning',
          content: 'Do you want to remove GST details?',
          type: 'dark',
          typeAnimated: true,
          buttons: {
              Ok: function() {
                  $.ajax({
                      url: "../../client/res/templates/financial_changes/delete_billingentity_gstdetails.php?id=" + et_id,
                      type: "post",
                      async: false,
                      success: function(result) {
                          if (result == 1) {
                              $("#" + id).closest("div").remove();
                              $.confirm({
                                  title: 'Success!',
                                  content: 'GST details removed successfully!',
                                  type: 'dark',
                                  typeAnimated: true,
                                  buttons: {
                                      Ok: function() {
                                        $("#edit_billingentity_gstdetails"+div_id).remove();
                                      }
                                  }
                              });
                          }
                      }
                  });
              },
              Cancel: function() {
              }
          }
      });
      // itemsCount=0;
    // }itemsCount++;
  });
 </script>

<!-- Validate billing entity bank details -->
 <script>
  function checkBankValidation(id){
    if($("#billingentity_bank_beneficiary"+id).val() != ''){
      $("#billingentity_bank_beneficiary"+id).removeAttr('required');
      $("#billingentity_bank_name"+id).attr('required', true);
      $("#billingentity_bank_ifc"+id).attr('required', true);
      $("#billingentity_bank_accountno"+id).attr('required', true);
      $("#billingentity_bank_accounttype"+id).attr('required', true);
      return false;
    }
    if($("#billingentity_bank_name"+id).val() != ''){
      $("#billingentity_bank_name"+id).removeAttr('required');
      $("#billingentity_bank_beneficiary"+id).attr('required', true);
      $("#billingentity_bank_ifc"+id).attr('required', true);
      $("#billingentity_bank_accountno"+id).attr('required', true);
      $("#billingentity_bank_accounttype"+id).attr('required', true);
      return false;
    }
    if($("#billingentity_bank_ifc"+id).val() != ''){
      $("#billingentity_bank_ifc"+id).removeAttr('required');
      $("#billingentity_bank_beneficiary"+id).attr('required', true);
      $("#billingentity_bank_name"+id).attr('required', true);
      $("#billingentity_bank_accountno"+id).attr('required', true);
      $("#billingentity_bank_accounttype"+id).attr('required', true);
      return false;
    }
    if($("#billingentity_bank_accountno"+id).val() != ''){
      $("#billingentity_bank_accountno"+id).removeAttr('required');
      $("#billingentity_bank_beneficiary"+id).attr('required', true);
      $("#billingentity_bank_name"+id).attr('required', true);
      $("#billingentity_bank_ifc"+id).attr('required', true);
      $("#billingentity_bank_accounttype"+id).attr('required', true);
      return false;
    }
    if($("#billingentity_bank_accounttype"+id).val() != ''){
      $("#billingentity_bank_accounttype"+id).removeAttr('required');
      $("#billingentity_bank_beneficiary"+id).attr('required', true);
      $("#billingentity_bank_name"+id).attr('required', true);
      $("#billingentity_bank_ifc"+id).attr('required', true);
      $("#billingentity_bank_accountno"+id).attr('required', true);
      return false;
    }
    else {
      $("#billingentity_bank_beneficiary"+id).removeAttr('required');
      $("#billingentity_bank_name"+id).removeAttr('required');
      $("#billingentity_bank_ifc"+id).removeAttr('required');
      $("#billingentity_bank_accountno"+id).removeAttr('required');
      $("#billingentity_bank_accounttype"+id).removeAttr('required');
      return true;
    }
  }
</script>
<!-- Validate billing entity bank details -->
<!-- Get state name automatically from GST number -->
<script>
  function getGST_state1(stCode, id){

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
            "34":"Puducherry",
            "35":"Andaman & Nicobar",
            "36":"Telangana",
            "37":"Andhrapradesh(New)",
            "38":"Ladakh",
          }];

          var stCode = stCode.substring(0, 2);

          if ( stCode in obj[0] ) {
            $("#edit_billingEntityGSTAddressState"+id).val(obj[0][stCode]);
          }
          else{
            $("#edit_billingEntityGSTAddressState"+id).val('');
          }

          return true;
        }
        else {
          $.alert({
              title: 'Warning!',
              content: 'Please Enter Valid GSTIN Number for edit',
          });
          //$.alert('Please Enter Valid GSTIN Number');
          $("#billingentity_gst"+id).val('');
          $("#billingentity_gst"+id).focus();
        }
      }
    //});
  }
</script>

<script type="text/javascript">
var cnt1=1;
var count1=0;
var count_1=1;

$(document).on('click',"#add_bank_deatils_edit", function(){

    var len = $(".editbankdetails").length+1;
    var check = validation_edit();
    //var check = check_validation_edit(len);

    //var cnt3 = parseInt($("#totalBank_count").val());
    //var cnt4 = parseInt($("#totalBank_count").val()) + 1;
    
    if (!check) {

        //My change 
        $(".main_bank_deatils_edit").append('<div class="panel-body panel-body-form"><div id="editbankdetails'+len+'" class="editbankdetails"><div class="row"><div class="col-md-12"><div class="panel-heading"style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;"><h4 class="panel-title text-uppercase" style="display:inline-block;">Bank account '+len+'</h4><button type="button" class="btn btn-danger bank_deleteBtn pull-right" onclick="delete_panel_edit(this, '+len+', 0)"><span class="material-icons-outlined">close</span></button></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group Beneficiary_group_edit"><label for="">Beneficiary Name</label><input type="text" name="billingentity_bank_beneficiary[]" value="" class="form-control beneficiary_nm_edit" placeholder="Beneficiary name"><span class="temp-error display_none text-danger">Please Enter Beneficiary Name</span></div></div><div class="col-sm-6 col-md-6"><div class="form-group bankName_group_edit"><label for="">Name of Bank</label><input type="text" value="" class="form-control bank_nm_edit" placeholder="Bank name" name="billingentity_bank_name[]"><span class="temp-error display_none text-danger">Please Enter Bank Name</span></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group IFSC_group_edit"><label for="">IFSC Code</label><input type="text" name="billingentity_bank_ifc[]" value="" class="form-control bank_ifsc_edit" placeholder="IFSC Code"><span class="temp-error display_none text-danger">Please Enter IFSC Code</span></div></div><div class="col-sm-6 col-md-6"><div class="form-group account_group_edit"><label for="">Account No</label><input type="text" name="billingentity_bank_accountno[]" value="" class="form-control bank_ano_edit" placeholder="Account no" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"><span class="temp-error display_none text-danger">Please Enter Account No</span></div></div></div><div class="row"><div class="col-md-6"><div class="form-group accounttype_group_edit"><label>Account Type</label><select class="form-control bank_account_type_edit" name="billingentity_bank_accounttype[]" id="edit_billingentity_bank_accounttype'+len+'"><option value="">Select Account Type</option><option value="Saving">Saving</option><option value="Current">Current</option><option value="Cash Credit">Cash Credit</option><option value="Overdraft">Overdraft</option></select><span class="temp-error display_none text-danger">Please Select Account Type</span></div></div><div class="col-md-6"><div class="form-group UPI_group_edit"><label for="">UPI Id</label><input type="text" name="billingentity_bank_upi[]" class="form-control bank_upiId_edit" placeholder="UPI ID"><span class="temp-error display_none text-danger">Please Enter UPI ID</span></div></div></div></div></div>');

        $(".bank_account_type_edit").customA11ySelect();
        var length = $(".main_bank_deatils_edit .panel-body").length;
        if (length > 0) {
            $(".main_bank_deatils_edit .panel-body").eq(0).find(".bank_deleteBtn").css("display", "inline-block");
        }
    }

    len++;
    //cnt3++;
    //cnt4++;
    count1++;
    cnt1++;

});

function check_validation_edit(id){
  var flag = false;

  var $html = $(".editbankdetails").last().html();
  alert($($html).prop('id'));
  var billingentity_bank_beneficiary = $($html).find("input[name='billingentity_bank_beneficiary[]']").val();
  var billingentity_bank_accountno = $($html).find("input[name='billingentity_bank_accountno[]']").val();
  var billingentity_bank_ifc = $($html).find("input[name='billingentity_bank_ifc[]']").val();
  var billingentity_bank_accountno = $($html).find("input[name='billingentity_bank_accountno[]']").val();
  var billingentity_bank_accounttype = $($html).find("input[name='billingentity_bank_accounttype[]']").val();

  if(billingentity_bank_beneficiary == ''){
    flag = true;
  }
  if(billingentity_bank_accountno == ''){
    flag = true;
  }
  if(billingentity_bank_ifc == ''){
    flag = true;
  }
  if(billingentity_bank_accountno == ''){
    flag = true;
  }
  if(billingentity_bank_accounttype == ''){
    flag = true;
  }
  return flag;
}
/*delete panel*/

function delete_panel_edit(element, data_id, db_id) {
    //My change
    //$(element).closest(".panel-body").remove();
    var length = $(".panel-body .editbankdetails1").length;
    if (length == 1) {
        //$(".main_bank_deatils_edit .panel-body").eq(0).find(".bank_deleteBtn").css("display", "none");

        $.confirm({
            title: 'Warning',
            content: 'Do you want to remove bank details?',
            type: 'dark',
            typeAnimated: true,
            buttons: {
                Ok: function() {
                  if(db_id){
                    $.ajax({
                        url: "../../client/res/templates/financial_changes/delete_billingentity_bankdetails.php?id=" + db_id,
                        type: "post",
                        async: false,
                        success: function(result) {
                            if (result == 1) {
                                $(element).closest("#editbankdetails"+data_id).remove();
                                $.confirm({
                                    title: 'Success!',
                                    content: 'Bank details removed successfully!',
                                    type: 'dark',
                                    typeAnimated: true,
                                    buttons: {
                                        Ok: function() {
                                          $("#editbankdetails"+data_id).remove();
                                        }
                                    }
                                });
                            }
                        }
                    });
                  }
                  else {
                    $("#editbankdetails"+data_id).remove();
                  }
                },
                Cancel: function() {
                }
            }
        });
    }
}


// for GST
var cnt2=2;
var count1=0;
var count_1=1;

$(document).on('click',"#gst_deatils_edit", function(){

    var len = $(".editbankdetails").length+1;
    var check = gst_validation_edit();
    var cnt3 = parseInt($("#totalGST_count").val());
    var cnt4 = parseInt($("#totalGST_count").val()) + 1;
    // alert(check);
    if (!check) {

        $(".GST_details_Panel_edit").append('<div id="edit_billingentity_gstdetails'+cnt4+'"  class="GST_added_panel_edit"><div class="row"><div class="col-md-12"><button type="button" class="btn btn-danger GST_deleteBtn pull-right" onclick="delete_gst_panel_edit(this, '+cnt4+', 0)"><span class="material-icons-outlined">close</span></button></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group gst_no_group_edit"><label for="">GST '+cnt4+'</label><input type="text" name="billingentity_gst[]" class="form-control gst_deatils_GST_1_edit" placeholder="GST No" onblur="getGST_state_edit(this.value, '+cnt3+')"><span class="temp-error display_none text-danger">Please Enter GST NO</span></div></div><div class="col-sm-6 col-md-6"><div class="form-group gst_addr_group_edit"><label>Address</label><input type="text" name="billingEntityGSTAddressStreet[]" class="form-control gst_addr_edit" placeholder="Street" maxlength="56"> <span class="temp-error display_none text-danger">Please Enter Your Address</span></div><div class="row"><div class="col-md-4"style="padding-right: 0px;"><div class="form-group gst_city_group_edit"><input type="text" name="billingEntityGSTAddressCity[]" class="form-control gst_city_edit" placeholder="City"> <span class="temp-error display_none text-danger">Please Enter City</span></div></div><div class="col-md-4"style="padding-right: 0px;"><div class="form-group gst_state_group_edit"><input type="text" class="form-control gst_state_edit" id="edit_billingEntityGSTAddressState'+count_1+'" data-id="edit_billingEntityGSTAddressState'+count_1+'" data-name="billingEntityGSTAddressState[]" name="billingEntityGSTAddressState[]" value="" placeholder="State" autocomplete="espo-state" maxlength="255"><span class="temp-error display_none text-danger">Please Enter State</span></div></div><div class="col-md-4"><div class="form-group gst_postal_group_edit"><input type="text" name="billingEntityGSTAddressPostalCode[]" id="GST_Details_postal_code_edit'+count_1+'" class="form-control GST_Details_postal_code_edit gst_postal_code_edit" placeholder="Postal Code" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> <span class="temp-error display_none text-danger">Please Enter Postal Code</span><span class="digit-temp-error display_none text-danger">Please Enter 6 Digit Postal Code</span></div></div></div></div></div></div>');

        //$(".gst_state_edit").customA11ySelect();


        var length = $(".GST_details_Panel_edit .GST_added_panel_edit").length;

        if (length > 0) {
            $("#main_gst_deatils_edit .GST_details_Panel_edit .GST_added_panel_edit").eq(0).find(".GST_deleteBtn").css("display", "inline-block");
        }

    }
    cnt2++;
    cnt3++;
    cnt4++;
    count1++;
    count_1++;


});


/*delete GST Details panel*/

function delete_gst_panel_edit(element, data_id, db_id) {
    //My change
    // $(element).closest(".GST_added_panel").remove(); 
    var length = $(".GST_details_Panel_edit .GST_added_panel_edit").length;
    //   if(length<=1)
    //   {

    //     $("#main_gst_deatils .GST_details_Panel .GST_added_panel").eq(0).find(".GST_deleteBtn").css("display","none");

    //   }
alert("Out side");
    if (length == 1) { alert("If length");
        /*$("#main_gst_deatils_edit").hide();
        $("#main_GSTIN_fields_edit").show();
        $("input[name='optradio']").prop('checked', false);*/

        $.confirm({
            title: 'Warning',
            content: 'Do you want to remove GST details?',
            type: 'dark',
            typeAnimated: true,
            buttons: {
                Ok: function() {
                    if(db_id){ alert("In if part");
                      $.ajax({
                          url: "../../client/res/templates/financial_changes/delete_billingentity_gstdetails.php?id=" + db_id,
                          type: "post",
                          async: false,
                          success: function(result) {
                              if (result == 1) {
                                  //$("#" + update_id).closest("div").remove();
                                  $(element).closest(".GST_added_panel_edit").remove();
                                  $.confirm({
                                      title: 'Success!',
                                      content: 'GST details removed successfully!',
                                      type: 'dark',
                                      typeAnimated: true,
                                      buttons: {
                                          Ok: function() {
                                            $("#edit_billingentity_gstdetails"+data_id).remove();
                                            $("#main_gst_deatils_edit").hide();
                                            $("#main_GSTIN_fields_edit").show();
                                            alert("after show");
                                          }
                                      }
                                  });
                              }
                          }
                      });
                    }
                    else { alert("In else part");
                      $("#edit_billingentity_gstdetails"+data_id).remove();
                      //$("#main_gst_deatils_edit").hide();
                      //$("#main_GSTIN_fields_edit").show();
                    }
                },
                Cancel: function() {
                }
            }
        });
    } else {
        alert("First else");
        $.confirm({
            title: 'Warning',
            content: 'Do you want to remove GST details?',
            type: 'dark',
            typeAnimated: true,
            buttons: {
                Ok: function() {
                    if(db_id){ alert("In if part");
                      $.ajax({
                          url: "../../client/res/templates/financial_changes/delete_billingentity_gstdetails.php?id=" + db_id,
                          type: "post",
                          async: false,
                          success: function(result) {
                              if (result == 1) {
                                  //$("#" + update_id).closest("div").remove();
                                  $(element).closest(".GST_added_panel_edit").remove();
                                  $("#main_gst_deatils_edit").hide();
                                  $("#main_GSTIN_fields_edit").show();
                                  $.confirm({
                                      title: 'Success!',
                                      content: 'GST details removed successfully!',
                                      type: 'dark',
                                      typeAnimated: true,
                                      buttons: {
                                          Ok: function() {
                                            $("#edit_billingentity_gstdetails"+data_id).remove();
                                          }
                                      }
                                  });
                              }
                          }
                      });
                    }
                    else { alert("In else part");
                      $("#main_gst_deatils_edit").hide();
                      $("#main_GSTIN_fields_edit").show();
                      $("#edit_billingentity_gstdetails"+data_id).remove();
                    }
                },
                Cancel: function() {
                }
            }
        });
        //$(element).closest(".GST_added_panel").remove();
    }

}

  
</script>


<script type = "text/javascript" >
    //$(".Select_state").customA11ySelect();
$(".bank_account_type_edit").customA11ySelect();
//$(".gst_state_edit").customA11ySelect();

//$('#main_GSTIN_fields_edit').hide();
/*$("#GSTIN_fields_edit input[type='radio']").click(function() {
    var radio_btn_value = $(this).closest('.form-check-label').text();
    alert(radio_btn_value);
    if (radio_btn_value == " Yes") {
        $('#main_GSTIN_fields_edit').hide();
        $('#main_gst_deatils_edit').show();
    } else {
        $(".GST_details_Panel_edit .GST_added_panel_edit .temp-error").addClass("display_none");
        $('#main_gst_deatils_edit').hide();
        $('#main_GSTIN_fields_edit').show();
    }
});*/

</script>

<script >
    $(document).on('change', ".gst_deatils_GST_1_edit", function() {
        var inputvalues = $(this).val();
        var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
        if (gstinformat.test(inputvalues)) {
            return true;
        } else {
            $.alert({
                title: 'Warning!',
                content: 'Please Enter Valid GSTIN Number',
            });
            $(this).val('');
            $(".gst_deatils_GST_1_edit").focus();
        }
    });

   $(document).on('change', ".overview_postal_code_edit", function() 
   {
        var val1 = $(this).val();

        if (val1 == "") {
            $.alert({
                title: 'Alert!',
                content: 'Please enter postal code',
                type: 'dark',
                typeAnimated: true
            });
        } else {
            if (/^\d{6}$/.test(val1)) {

            } else {
                $.alert({
                    title: 'Alert!',
                    content: 'Postal code must be of 6 digits',
                    type: 'dark',
                    typeAnimated: true,
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
    } else {
        $(".name_group .temp-error").removeClass("display_none");
    }

});

var gstinformat_invoice = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');

$(document).on('keyup', ".overview_panno_edit", function(e) {


    var inputvalues_invoice = $(".overview_panno_edit").val().toUpperCase();

    e.stopImmediatePropagation();

    $(".pan_no_group .temp-error").addClass("display_none");

    if (gstinformat_invoice.test(inputvalues_invoice)) {
        $(".pan_no_group .Invalid-temp-error").addClass("display_none");
        return true;
    } else {
        $(".pan_no_group .Invalid-temp-error").removeClass("display_none");

    }

});


var email_reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

$(document).on('keyup', ".email_edit", function(e) {

    var emailinputvalues_invoice = $(this).val().toLowerCase();

    if ($(this).val().length > 0) {
        $(".email_group .temp-error").addClass("display_none");

        if (email_reg.test(emailinputvalues_invoice)) {
            $(".email_group .Invalid-temp-error").addClass("display_none");

            return true;
        }

        $(".email_group .Invalid-temp-error").removeClass("display_none");

    }
    if ($(this).val().length == 0) {
        $(".email_group .Invalid-temp-error").addClass("display_none");

    }

});


$(document).on('keyup', ".beneficiary_nm_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

});

$(document).on('keyup', ".bank_ifsc_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

});

$(document).on('keyup', ".bank_nm_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

});

$(document).on('keyup', ".bank_ano_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

});

$(document).on('keyup', ".gst_no_group_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

});

$(document).on('keyup', ".gst_addr_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

});

$(document).on('keyup', ".gst_city_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

});

$(document).on('keyup', ".bank_ano_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

});

$(document).on('keyup', ".gst_postal_code_edit", function(e) {


    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

    if($(this).val().length!=6)
    {

    $(this).closest(".form-group").find(".digit-temp-error").removeClass("display_none");

    }
    if($(this).val().length==6)
    {
    $(this).closest(".form-group").find(".digit-temp-error").addClass("display_none");

    }

});


$(document).on('change', "#overview_state", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

});

$(document).on('change', ".gst_state_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

});

$(document).on('change', ".bank_account_type_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");

});

</script>

<!-- for bank details  -->

<script type="text/javascript">
   
var $check_empty = "";

// To show errors if all fields of bank details  are empty
function check_empty_fields_edit(p) {

    var C_name = $(".name_edit").val();
    var C_email = $(".email_edit").val();
    var C_address = $(".address_edit").val();
    var C_city = $(".city_edit").val();
    var C_state = $("#overview_state-menu .custom-a11yselect-selected").attr('data-val');
    var C_postal_code = $(".overview_postal_code_edit").val();
    var C_overview_panno = $(".overview_panno_edit").val().toUpperCase();
    var C_website = $(".website_edit").val();
    var C_phone = $(".phone_edit").val();
    var C_regno = $(".regno_edit").val();

    var Current = $(".main_bank_deatils_edit .panel-body");

    var beneficiary_nm = Current.eq(p).find(".beneficiary_nm_edit").val();
    var bank_ifsc = Current.eq(p).find(".bank_ifsc_edit").val();
    var accountType = Current.eq(p).find(".accounttype_group_edit .custom-a11yselect-menu .custom-a11yselect-selected").attr('data-val');
    var bank_nm = Current.eq(p).find('.bank_nm_edit').val();
    var accountNo = Current.eq(p).find('.bank_ano_edit').val();
    var UPI_Id = Current.eq(p).find('.bank_upiId_edit').val();

    //alert(C_name+ '==' +C_overview_panno+ '==' +beneficiary_nm+ '==' +bank_ifsc+ '==' +accountType+ '==' +bank_nm+ '==' +accountNo);

    //alert(accountType);

    $check_empty = false;

    // name and pan no validation

    if (C_name != "" && C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == true && beneficiary_nm != "" && bank_ifsc != "" && accountType != "" && bank_nm != "" && accountNo != "") {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");

        $check_empty = false;

        if (C_email != "") {
            if (email_reg.test($(".email_edit").val().toLowerCase()) == true) {
                $(".email_group .temp-error,.email_group .Invalid-temp-error").addClass("display_none");
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
        }

        if (C_overview_panno == "") {
            $(".pan_no_group .temp-error").removeClass("display_none");
        }

        if (C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == false) {
            $(".pan_no_group .Invalid-temp-error").removeClass("display_none");
        }

        if (beneficiary_nm == "") {
            Current.eq(p).find(".Beneficiary_group_edit .temp-error").removeClass("display_none");
        }

        if (bank_ifsc == "") {
            Current.eq(p).find(".IFSC_group_edit .temp-error").removeClass("display_none");
        }

        if (accountType == "") {
            Current.eq(p).find(".accounttype_group_edit .temp-error").removeClass("display_none");
        }

        if (bank_nm == "") {
            Current.eq(p).find(".bankName_group_edit .temp-error").removeClass("display_none");
        }

        if (accountNo == "") {
            Current.eq(p).find(".account_group_edit .temp-error").removeClass("display_none");
        }

    }
    //alert($check_empty);
    return $check_empty;
}

// called on add more of bank details

function validation_edit() {

    var p_body_length = $(".main_bank_deatils_edit .panel-body").length;
    //alert(p_body_length);

    var $addMore = "";

    var flag = 0;

    for (var p = 0; p < p_body_length; p++) {
        $addMore = check_empty_fields_edit(p);

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

function for_empty_bank_details_check_edit(p) {

    // overviews values

    var C_name = $(".name_edit").val();
    var C_email = $(".email_edit").val();
    var C_address = $(".address_edit").val();
    var C_city = $(".city_edit").val();
    var C_state = $("#overview_state-menu .custom-a11yselect-selected").attr('data-val');
    var C_postal_code = $(".overview_postal_code_edit").val();
    var C_overview_panno = $(".overview_panno_edit").val().toUpperCase();
    var C_website = $(".website_edit").val();
    var C_phone = $(".phone_edit").val();
    var C_regno = $(".regno_edit").val();

    var Current = $(".main_bank_deatils_edit .panel-body");

    var beneficiary_nm = Current.eq(p).find(".beneficiary_nm_edit").val();
    var bank_ifsc = Current.eq(p).find(".bank_ifsc_edit").val();
    var accountType = Current.eq(p).find(".accounttype_group .custom-a11yselect-menu .custom-a11yselect-selected").attr('data-val');
    var bank_nm = Current.eq(p).find('.bank_nm_edit').val();
    var accountNo = Current.eq(p).find('.bank_ano_edit').val();
    var UPI_Id = Current.eq(p).find('.bank_upiId_edit').val();

    $check_empty = false;

    // name and pan no validation

    if (C_name != "" && C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == true) {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");

        Current.eq(p).find(".main_bank_deatils_edit .panel-body .temp-error").addClass("display_none");

        $check_empty = false;

        // email validation

        if (C_email != "" && beneficiary_nm == "" && bank_ifsc == "" && accountType == "" && bank_nm == "" && accountNo == "") {

            if (email_reg.test($(".email_edit").val().toLowerCase()) == true) {
                $(".email_group .temp-error,.email_group .Invalid-temp-error,.main_bank_deatils_edit .temp-error").addClass("display_none");
                $check_empty = false;
            } else {
                $check_empty = true;
            }

        } else if (C_email == "" && (beneficiary_nm != "" || bank_ifsc != "" || accountType != "" || bank_nm != "" || accountNo != "")) {

            $check_empty = true;

            if (beneficiary_nm == "") {
                Current.eq(p).find(".Beneficiary_group_edit .temp-error").removeClass("display_none");
            }

            if (bank_ifsc == "") {
                Current.eq(p).find(".IFSC_group_edit .temp-error").removeClass("display_none");
            }

            if (accountType == "") {
                Current.eq(p).find(".accounttype_group_edit .temp-error").removeClass("display_none");
            }

            if (bank_nm == "") {
                Current.eq(p).find(".bankName_group_edit .temp-error").removeClass("display_none");
            }

            if (accountNo == "") {
                Current.eq(p).find(".account_group_edit .temp-error").removeClass("display_none");
            }

            if (beneficiary_nm != "" && bank_ifsc != "" && accountType != "" && bank_nm != "" && accountNo != "") {
                Current.eq(p).find(".temp-error").addClass("display_none");
                $check_empty = false;

            }

        } else if (C_email != "" && (beneficiary_nm != "" || bank_ifsc != "" || accountType != "" || bank_nm != "" || accountNo != "")) {

            $check_empty = true;

            if (email_reg.test($(".email_edit").val().toLowerCase()) == false) {
                $(".email_group .Invalid-temp-error").removeClass("display_none");
            }

            if (beneficiary_nm == "") {
                Current.eq(p).find(".Beneficiary_group_edit .temp-error").removeClass("display_none");
            }

            if (bank_ifsc == "") {
                Current.eq(p).find(".IFSC_group_edit .temp-error").removeClass("display_none");
            }

            if (accountType == "") {
                Current.eq(p).find(".accounttype_group_edit .temp-error").removeClass("display_none");
            }

            if (bank_nm == "") {
                Current.eq(p).find(".bankName_group_edit .temp-error").removeClass("display_none");
            }

            if (accountNo == "") {
                Current.eq(p).find(".account_group_edit .temp-error").removeClass("display_none");
            }

            if (beneficiary_nm != "" && bank_ifsc != "" && accountType != "" && bank_nm != "" && accountNo != "" && email_reg.test($(".email_edit").val().toLowerCase()) == true) {
                $(".email_group .temp-error,.email_group .Invalid-temp-error").addClass("display_none");

                Current.eq(p).find(".temp-error").addClass("display_none");
                $check_empty = false;

            }

        }




    } else {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");

        $check_empty = true;

        if (C_name == "") {
            $(".name_group .temp-error").removeClass("display_none");
        }

        if (C_overview_panno == "") {
            $(".pan_no_group .temp-error").removeClass("display_none");
        }

        if (C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == false) {
            $(".pan_no_group .Invalid-temp-error").removeClass("display_none");
        }

    }

    return $check_empty;

}



// called on save button (check if fields are empty then show errors)

function onSaveCheckFields_edit() {

    var p_body_length = $(".main_bank_deatils_edit .panel-body").length;

    var $empty1 = "",
        $empty2 = "",
        f = 0;

    for (var p = 0; p < p_body_length; p++) {
        if (p < p_body_length - 1) {
            $empty1 = check_empty_fields_edit(p);
            if (f == 0 && $empty1 == true) {
                f = 1;
            }
        }
        if (p == p_body_length - 1) {

            $empty2 = for_empty_bank_details_check_edit(p);
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

function gst_check_empty_fields_edit(g) {

    // overviews values

    var C_name = $(".name_edit").val();
    var C_email = $(".email_edit").val();
    var C_address = $(".address_edit").val();
    var C_city = $(".city_edit").val();
    //var C_state = $("#overview_state-menu .custom-a11yselect-selected").attr('data-val');
    var C_state = $(".gst_state_edit").val();
    var C_postal_code = $(".overview_postal_code_edit").val();
    var C_overview_panno = $(".overview_panno_edit").val().toUpperCase();
    var C_website = $(".website_edit").val();
    var C_phone = $(".phone_edit").val();
    var C_regno = $(".regno_edit").val();

    var current = $(".GST_details_Panel_edit .GST_added_panel_edit");
    //console.log(current.html());
    //var current = $("#edit_billingentity_gstdetails"+g);

    // gst values

    var gst_no = current.eq(g).find(".gst_deatils_GST_1_edit").val();
    var gst_addr = current.eq(g).find(".gst_addr_edit").val();
    var gst_city = current.eq(g).find(".gst_city_edit").val();
    //var gst_state = current.eq(g).find(".gst_state_group_edit .custom-a11yselect-menu .custom-a11yselect-selected").attr('data-val');
    var gst_state = current.eq(g).find(".gst_state_edit").val();
    var gst_code = current.eq(g).find(".GST_Details_postal_code_edit").val();
    // alert(gst_code.length);
    $gst_chek_empty = false;
    //alert(C_name+"=== "+C_overview_panno+"=== "+gst_no+"=== "+gst_addr+"=== "+gst_city+"=== "+gst_state+"=== "+gst_code);

    if (C_name != "" && C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == true && gst_no != "" && gst_addr != "" && gst_city != "" && gst_state != "" && gst_code != "" && gst_code.length==6) {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");

        $gst_chek_empty = false;

        current.eq(g).find(".temp-error,.digit-temp-error").addClass("display_none");
    } else {
        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");

        $gst_chek_empty = true;

        if (C_name == "") {
            $(".name_group .temp-error").removeClass("display_none");
        }

        if (C_overview_panno == "") {
            $(".pan_no_group .temp-error").removeClass("display_none");
        }

        if (C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == false) {
            $(".pan_no_group .Invalid-temp-error").removeClass("display_none");
        }

        if (gst_no == "") {
            current.eq(g).find(".gst_no_group_edit .temp-error").removeClass("display_none");
        }

        if (gst_addr == "") {
            current.eq(g).find(".gst_addr_group_edit .temp-error").removeClass("display_none");
        }

        if (gst_city == "") {
            current.eq(g).find(".gst_city_group_edit .temp-error").removeClass("display_none");
        }

        if (gst_state == "") {
            current.eq(g).find(".gst_state_group_edit .temp-error").removeClass("display_none");
        }

        if (gst_code == "") {
            current.eq(g).find(".gst_postal_group_edit .temp-error").removeClass("display_none");
        }

        if (gst_code != "" && gst_code.length!=6) {
            current.eq(g).find(".gst_postal_group_edit .temp-error").addClass("display_none");
            current.eq(g).find(".gst_postal_group_edit .digit-temp-error").removeClass("display_none");
        }

       
    }
    //alert($gst_chek_empty);
    return $gst_chek_empty;

}

//  Called On GST hTml append


function gst_validation_edit() {

    var gst_len = $(".GST_details_Panel_edit .GST_added_panel_edit").length;
    
    var $addMore = "";

    var flag = 0;

    for (var g = 0; g < gst_len; g++) {
        $addMore = gst_check_empty_fields_edit(g);

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

function for_last_gst_details_check_edit(g) {


    var current = $(".GST_details_Panel_edit .GST_added_panel_edit");

    var gst_no = current.eq(g).find(".gst_deatils_GST_1_edit").val();
    var gst_addr = current.eq(g).find(".gst_addr_edit").val();
    var gst_city = current.eq(g).find(".gst_city_edit").val();
    //var gst_state = current.eq(g).find(".gst_state_group .custom-a11yselect-menu  .custom-a11yselect-selected").attr('data-val');
    var gst_state = current.eq(g).find(".gst_state_edit").val();
    var gst_code = current.eq(g).find(".gst_postal_code_edit").val();

    $gst_chek_empty = false;

    if (gst_no != "" || gst_addr != "" || gst_city != "" || gst_state != "" || gst_code != "") {

        //alert("In if ");

        $gst_chek_empty = true;

        if (gst_no == "") {
         //alert("success");
            current.eq(g).find(".gst_no_group_edit .temp-error").removeClass("display_none");
        }

        if (gst_addr == "") {
            current.eq(g).find(".gst_addr_group_edit .temp-error").removeClass("display_none");
        }

        if (gst_city == "") {
            current.eq(g).find(".gst_city_group_edit .temp-error").removeClass("display_none");
        }

        if (gst_state == "") {
            current.eq(g).find(".gst_state_group_edit .temp-error").removeClass("display_none");
        }

        if (gst_code == "") {
            current.eq(g).find(".gst_postal_group_edit .temp-error").removeClass("display_none");
        }
       
        if (gst_no != "" && gst_addr != "" && gst_city != "" && gst_state != "" && gst_code != ""&& gst_code.length == 6) {
            current.eq(g).find(".temp-error,.digit-temp-error").addClass("display_none");
            $gst_chek_empty = false;

        }

    } else if (gst_no == "" && gst_addr == "" && gst_city == "" && gst_state == "" && gst_code == "") {
        current.eq(g).find(".temp-error,.digit-temp-error").addClass("display_none");
        $gst_chek_empty = false;
    }

    return $gst_chek_empty;

}


function onSaveGstCheckFields_edit() {

    var gst_len = $(".GST_details_Panel_edit .GST_added_panel_edit").length;

    var $empty1 = "",
        $empty2 = "",
        f = 0;

    for (var g = 0; g < gst_len; g++) {
        if (g < gst_len - 1) {

         // alert("In GST if "+g);
            $empty1 = gst_check_empty_fields_edit(g);
            if (f == 0 && $empty1 == true) {
                f = 1;
            }
        }
        if (g == gst_len - 1) {
         // alert("In GST else "+g);

            $empty2 = for_last_gst_details_check_edit(g);
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
   $(document).on('click', '#update_billingentityBTN', function() {
    var radioValue = $("#GSTIN_fields_edit input[name='optradio']:checked").val();

    var bank_check = onSaveCheckFields_edit();

    var gst_check = "";

    //if (radioValue == 'Yes') {
        gst_check = onSaveGstCheckFields_edit();
    //}


    if ((bank_check == false && gst_check == false)) {

      var formdata=$('#updateBillingEntityForm');
      form      = new FormData(formdata[0]);

      $(".main_bank_deatils_edit .panel-body .temp-error").addClass("display_none");

        /*$.alert({
              title: 'Alert!',
              content: 'Your form is now ready to submit',
               type: 'dark',
               typeAnimated: true,
               buttons: {
                ok: function () {

                }
              }
          });*/
        $.ajax({
          type    : "POST",
          url     : "../../client/res/templates/financial_changes/update_billing_entity.php",
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
                content: 'Update successfully!',
                buttons: {
                Ok: function () {
                  $('button[data-action="reset"]').trigger('click');
                  $(function () {
                    $('#edit_billingentityModal').modal('toggle');
                  });
                  $('#updateBillingEntityForm')[0].reset();
                  }
                }
              });
            }
          }
        });

    } else {

        $.alert({
            title: 'Alert!',
            content: 'Oops !!! form submission fail',
             type: 'dark',
             typeAnimated: true,
             buttons: {
              ok: function () {

              }
            }
        });
 }


    return false;
});

</script>
<!-- Get state name automatically from GST number -->
<script>
  function getGST_state_edit(stCode, id){

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
            "34":"Puducherry",
            "35":"Andaman & Nicobar",
            "36":"Telangana",
            "37":"Andhrapradesh(New)",
            "38":"Ladakh"
          }];

          var stCode = stCode.substring(0, 2);

          if ( stCode in obj[0] ) {
            
            $(".gst_state_group_edit .custom-a11yselect-menu li[data-val='"+obj[0][stCode]+"'] ").addClass('custom-a11yselect-selected');
            $(".gst_state_group_edit .custom-a11yselect-btn .custom-a11yselect-text").text(obj[0][stCode]);
            var a = $(".gst_state_group_edit .custom-a11yselect-menu .custom-a11yselect-selected").attr("id");
            
            $(".custom-a11yselect-container .custom-a11yselect-btn").attr("aria-activedescendant",a);
            $(".GST_details_Panel .GST_added_panel").eq(id).find(".gst_state_group .temp-error").addClass("display_none");

            $("#edit_gst_state"+id+" option[value='"+obj[0][stCode]+"']").attr("selected", "selected");

            $("#edit_gst_state"+id).val(obj[0][stCode]);
          }
          else{
            $(".gst_state_group_edit .custom-a11yselect-menu li[data-val=''] ").addClass('custom-a11yselect-selected');
            $(".gst_state_group_edit .custom-a11yselect-btn .custom-a11yselect-text").text("Select state");
            var a = $(".gst_state_group_edit .custom-a11yselect-menu .custom-a11yselect-selected").attr("id");
            
            $(".custom-a11yselect-container .custom-a11yselect-btn").attr("aria-activedescendant",a);
            $(".GST_details_Panel .GST_added_panel").eq(id).find(".gst_state_group .temp-error").removeClass("display_none");
          }

          return true;
        }
        else {
          $.alert({
              title: 'Warning!',
              content: 'Please Enter Valid GSTIN Number for test',
          });
          //$.alert('Please Enter Valid GSTIN Number');
          //$("#billingentity_gst"+id).val('');
          //$("#billingentity_gst"+id).focus();
          $("#edit_gst_state"+id).val('');
          $("#edit_gst_state"+id).focus();
        }
      }
    //});
  }


  function radio_check(radio_btn_value){
    
    if (radio_btn_value == "Yes") {
        $("#main_GSTIN_fields_edit").hide();
        $("#main_gst_deatils_edit").show();
    } else {
        $(".GST_details_Panel_edit .GST_added_panel_edit .temp-error").addClass("display_none");
        $("#main_gst_deatils_edit").hide();
        $("#main_GSTIN_fields_edit").show();
        $(".GST_details_Panel_edit").show();
        $(".GST_added_panel_edit").show();
    }
  }
</script>
<!-- Get state name automatically from GST number -->

 <!-- BILLING ENTITY SCRIPTS ENDS HERE -->