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
              draggable: false,
               buttons: {
                      Ok: function () {
                          $('button[data-action="reset"]').trigger('click');
                          $("#updateContactListModal").modal("hide");
                          $(".modal-backdrop.in").remove();
                          $(".modal-open").removeClass();
                      }
                  }
            });

            //  $(function () {
            //    $('#updateContactListModal').modal('toggle');
            // });

            // $('button[data-action="reset"]').trigger('click');
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

  }
  updateContactListCount++;

    return false;
});
</script>
<!-- update contact list modal -->
<div class="container">
  <div class="modal fade" id="updateContactListModal" role="dialog">
    <div class="modal-dialog modal-emailwidth">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Rename Contact List</h4>
        </div>
      <div class="modal-body">
        <div class="">
              <form class="reminder-form" id="update-contactList-form" action="../../client/res/templates/bulk_message/updateContactList.php" enctype="multipart/form-data" method="post" autocomplete="off" >

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 view_contact_list"></div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12"><br>
                    <button value="updateContactList" class="btn btn-primary pull-right" id="myBtn">Update</button>
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
            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                   draggable: false,
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

 // function close_view_contacts_model()
 // {
 //    $('#viewContactsData').modal('toggle');
 //    $('button[data-action="reset"]').trigger('click');
 // }
 // close add contact model
 $('#viewContactListModel').click( function(){
    // $("#viewContactListModel .close").click();
    // $(".modal-backdrop.in").remove();
    // $(".modal-open").removeClass();
    $('button[data-action="reset"]').trigger('click');
    //$('#uploadContactListModal').modal('toggle');
  });

 function close_upload_contacts_model()
 {
    $('#addContactsModalShow').modal('toggle');
    $('.entityContactsEdit').css("display","none");
    $('.entityContacts').css("display","none");
 }

</script>
<script type="text/javascript">
  //reset upload contact modal forms while clicking on close button start

  $('#addContactsModalShow').on('hidden.bs.modal', function () {
    $('#addContactsModalShow form')[0].reset();
    $('.entityContactsEdit').hide();
    $('.upload-contacts-form-edit .nav-tabs li').removeClass('active');
    $('.upload-contacts-form-edit .nav-tabs li:first').addClass('active');
    $('.upload-contacts-form-edit .tab-content .tab-pane').removeClass('active in');
    $('.upload-contacts-form-edit .tab-content .tab-pane:first').addClass('active in');
    });

  //reset upload contact modal forms while clicking on close button End

  function resetSelectEntityEdit(){
    $.ajax({
    type : "GET",
    url : "../../client/res/templates/bulk_message/getCRMEntityEdit.php",
    dataType : "json",
    processData : false,
    contentType : false,
    success: function(data)
    {
    if(data){
        $("#crm_contacts .crmEntityListEdit").empty();
        $("#crm_contacts .crmEntityListEdit").append(data.crmEntityList);
        $("#crm_contacts #getEntityContacts1").customA11ySelect('refresh');
      }
    }
    });
  }

  //reset upload contact modal forms while clicking on new tab Start
  var active_tab_edit = '';
  function activeTabsEdit(elementedit){
  active_tab_edit = $(elementedit).text();
  previous_active_tab_edit = $('.upload-contacts-form-edit .nav-tabs li.activetab a').text();
  $('.upload-contacts-form-edit .nav-tabs li').removeClass('activetab');
  $(elementedit).closest('li').addClass('activetab');
  //alert(active_tab_edit);
  var crmcontactEdit = $("#crm_contacts select").children("option:selected").val();
  if(crmcontactEdit != "select"){
    $('.entityContactsEdit').show();
  }
  }

 var flag = 0;
  function tabeventEdit(active_tab_edit){
    flag = 0;
    var a_edit = $(".upload-contacts-form-edit #upload_file input[name='upload_file']").val();
    var b_edit = $(".upload-contacts-form-edit #copy_paste textarea[name='copy_paste']").val();
    var c_edit = $(".upload-contacts-form-edit #individual input[name='user_name']").val();
    var d_edit = $(".upload-contacts-form-edit #individual input[name='user_email']").val();
    var e_edit = $(".upload-contacts-form-edit #individual input[name='individual']").val();
    var f_edit = $(".upload-contacts-form-edit #crm_contacts select").children("option:selected").val();

    //alert(f);

    if(active_tab_edit == 'Upload File'){
      if(b_edit != '' || c_edit != '' || d_edit != '' || e_edit != '' || f_edit != 'select'){
        flag = 1;
      }
    }
    else if(active_tab_edit == 'Copy & Paste'){
      if(a_edit != '' || c_edit != '' || d_edit != '' || e_edit != '' || f_edit != 'select'){
        flag = 1;
      }
    }
    else if(active_tab_edit == 'Individual Entry'){
      if(a_edit != '' || b_edit != '' || f_edit != 'select'){
        flag = 1;
      }
    }
    else if(active_tab_edit == 'CRM Contacts'){
      if(a_edit != '' || b_edit != '' || c_edit != '' || d_edit != '' || e_edit != ''){
        flag = 1;
      }
    }


    if(flag==1){
      $.confirm({
        title: 'Confirm!',
        content: 'You have entered data using other input method. Do you wish to change your input? This will reset your earlier selection',
        type: 'dark',
        typeAnimated: true,
        buttons: {
            ok: function () {
                $(".upload-contacts-form-edit #upload_file input[name='upload_file']").val('');
                $(".upload-contacts-form-edit #copy_paste textarea[name='copy_paste']").val('');
                $(".upload-contacts-form-edit #individual input[name='user_name']").val('');
                $(".upload-contacts-form-edit #individual input[name='user_email']").val('');
                $(".upload-contacts-form-edit #individual input[name='individual']").val('');
                //$("#crm_contacts select").prop('selectedIndex',0);

                resetSelectEntityEdit();
                $('.entityContactsEdit').hide();  
            },
            cancel: function () {
              //$("#crm_contacts select").prop('selectedIndex',0);
              if(previous_active_tab_edit == 'Upload File'){
                  if(a_edit != ''){
                    //$("#crm_contacts select").prop('selectedIndex',0);
                    $('.upload-contacts-form-edit .nav-tabs li').removeClass('active activetab'); 
                    $("a[href='#upload_file']").closest('li').addClass('active activetab');   
                    $(".tab-content .tab-pane").removeClass('active in');   
                    $(".tab-content #upload_file").addClass('active in'); 
                    resetSelectEntityEdit();
                    $('.entityContactsEdit').hide();
                  }
                }

              else if(previous_active_tab_edit == 'Copy & Paste'){
                  if(b_edit != ''){
                    //$("#crm_contacts select").prop('selectedIndex',0);
                    $('.upload-contacts-form-edit .nav-tabs li').removeClass('active activetab'); 
                    $("a[href='#copy_paste']").closest('li').addClass('active activetab');   
                    $(".tab-content .tab-pane").removeClass('active in');   
                    $(".tab-content #copy_paste").addClass('active in');  
                    resetSelectEntityEdit();
                    $('.entityContactsEdit').hide();
                  }
                }

              else if(previous_active_tab_edit == 'Individual Entry'){
                  if(c_edit != '' || d_edit != '' || e_edit != ''){
                    //$("#crm_contacts select").prop('selectedIndex',0);
                    $('.upload-contacts-form-edit .nav-tabs li').removeClass('active activetab'); 
                    $("a[href='#individual']").closest('li').addClass('active activetab');   
                    $(".tab-content .tab-pane").removeClass('active in');   
                    $(".tab-content #individual").addClass('active in'); 
                    resetSelectEntityEdit();
                    $('.entityContactsEdit').hide();
                  }
                }

              else if(previous_active_tab_edit == 'CRM Contacts'){
                  if(f_edit != 'select'){
                    $('.upload-contacts-form-edit .nav-tabs li').removeClass('active activetab'); 
                    $("a[href='#crm_contacts']").closest('li').addClass('active activetab');   
                    $(".tab-content .tab-pane").removeClass('active in');   
                    $(".tab-content #crm_contacts").addClass('active in');  
                    $('.entityContactsEdit').show();
                  }
                }
            }
        }
    });
    }
  }

  $(".upload-contacts-form-edit #individual input[name='user_name'] ,.upload-contacts-form-edit #individual input[name='user_email'], .upload-contacts-form-edit #individual input[name='individual'], .upload-contacts-form-edit #upload_file input[name='upload_file'] , .upload-contacts-form-edit #copy_paste textarea[name='copy_paste']").focus(function(eventedit){
    eventedit.preventDefault();
    eventedit.stopImmediatePropagation();
    //alert("in Focus");
    tabeventEdit(active_tab_edit);
  });


//reset upload contact modal forms while clicking on new tab End

</script>




<div class="container">
    <div class="modal fade" id="viewContactsData" role="dialog">
        <div class="modal-dialog model-emailwidth">
        <!-- Modal content-->
            <div class="modal-content">
                    <div class="modal-header">
                      <!-- <button type="button" class="modal-close-btn" onclick="close_view_contacts_model()" style="float: right;">&times;</button> -->
                      <button type="button" class="close" data-dismiss="modal" id="viewContactListModel">×</button>

                        <h4 class="modal-title text-center">View Contact List: <b class="view_contact_list_data"></b> </h4>
                    </div>
                    <div class="modal-body" style="padding-top: 0px;">

                        <div class="">
                          <div class="row">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                             <button type="button" id="add_contacts" style="display: block;" class="btn btn-primary addContactsModal pull-right" onclick="showContactModel()"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;"></i>Add Contacts</button>
                          </div>
                        </div><br>
                            <!-- Table -->
                        <div class="table-responsive">
                         <table id='empTable111abcd123' class='display dataTable' style="width: 100%;background: #f1efef;">
                           <thead>
                             <tr>
                               <th>id</th>
                               <th>User Name</th>
                               <th>User Email</th>
                               <th>User Phone</th>
                               <th>Created At</th>
                               <th> <input type="checkbox" class='checkall' id='checkall'><!-- <input type="button" id='delete_record' value='Delete' > --> &nbsp;<!-- <button type="button"  value='Delete'> --><span class="material-icons-outlined" id='delete_record' style="top:4px;cursor: pointer;">delete_outline</span><!-- </button> -->
                               </th>
                             </tr>
                           </thead>
                         </table>
                       </div>
                         <br><br>
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
        <button type="button" class="modal-close-btn" onclick="close_upload_contacts_model()" style="float: right;">×</button>
        <h4 class="modal-title text-center">Upload Contacts: <div id="list_name_res1"></div></h4>
      </div>
    <div class="modal-body">
      <div class="container pl0 pr0">
          <form  class="upload-contacts-form-edit" action="../../client/res/templates/bulk_message/updateContacts.php" enctype="multipart/form-data" method="post" >

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="mrt-5">

                    <!-- hide & show nav-bar tab -->
                    <ul class="nav nav-tabs">
                      <!-- add data-toggle attribute to the anchors -->
                      <li class="active hideEntityDatatableEdit"><a data-toggle="tab" href="#upload_file" onclick="activeTabsEdit(this)">Upload File</a></li>
                      <li class="hideEntityDatatableEdit"><a data-toggle="tab" href="#copy_paste" onclick="activeTabsEdit(this)">Copy & Paste</a></li>
                      <li class="hideEntityDatatableEdit"><a data-toggle="tab" href="#individual" onclick="activeTabsEdit(this)">Individual Entry</a></li>
                      <li><a data-toggle="tab" href="#crm_contacts" onclick="activeTabsEdit(this)">CRM Contacts</a></li>
                    </ul>
                    <br>
                    <div class="tab-content">
                      <div id="upload_file" class="tab-pane fade in active">
                        <div class="bg bg-danger" style="padding: 10px;white-space: pre-line;"><span>Note:Supported File Format is CSV.<!-- ,XLS,XLSX --> <a href="../../client/res/templates/bulk_message/FinCRM-Sample-File.csv" download>Download sample file</a></span></div>

                        <br>
                        <label>Choose file to upload: </label><br>
                        <input type="file" name="upload_file" accept=".csv" class="form-control">
                      </div>
                      <div id="copy_paste" class="tab-pane fade">
                        <div class="bg bg-danger">
                          <span  style="padding: 10px;white-space: pre-line;display: inline-block;">Note: Data must be comma(,) separated and you can skip a field by using space. Eg - abc, , 123456789</span>
                        </div>
                        <br>
                        <label>Copy & Paste Contacts:</label>
                        <textarea placeholder="Your Name, Email, Phone" rows="5" rows="5" cols="70" name="copy_paste" class="form-control"></textarea>
                      </div>
                      <div id="individual" class="tab-pane fade">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label>User Name: </label><br>
                            <input class="form-control" placeholder="User Name" type="text" name="user_name" data-bv-field="User Name">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label>Email: </label><br>
                            <input class="form-control" placeholder="Email" type="text" name="user_email" data-bv-field="User Email">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label>Phone: </label><br>
                            <!-- maxlength="10" minlength="10" pattern="\d{10}" -->
                            <input class="form-control number-only" id="individual"  placeholder="Mobile Number" type="text" name="individual" data-bv-field="individual" autocomplete="off">
                          </div>
                          
                        </div>
                      </div>

                      <div id="crm_contacts" class="tab-pane fade">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
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
                   $(".getEntityContactsEdit1").customA11ySelect();
                 }
              }
            });
    }

// Get Entity data
$(document).on("change" ,".getEntityContactsEdit1", function (eventedit1) {
  eventedit1.preventDefault();
    eventedit1.stopImmediatePropagation();
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
    
    //reset upload contact form While changing tabs
    tabeventEdit(active_tab_edit);

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
 $(".loader_gif").show();
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
             $(".loader_gif").hide();
            $.alert({
              title: 'Success!',
              content: data.msg,
              type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
          // { data: 'status' },
          { data: 'sent_sms_date' },
       ],
       'columnDefs': [ {
         'targets': [2], // column index (start from 0)
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">View Sent Message Contacts:  <b class="append_campaigns_name"></b></h4>
                     
                    </div>
                    <div class="modal-body">

                        <div class="">
                            <!-- Table -->
                         <table id='view_sent_messages' class='display dataTable' style="width: 100%;background: #f1efef;">
                           <thead>
                             <tr>
                               <th>id</th>
                               <th>Phone</th>
                               <!-- <th>Status</th> -->
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
         if(data.status == 'true'){

            $(".edit_my_campaigns_data").html(data.data);
            //$("#editMyCampaignsData").modal("show"); 
            $("#editMyCampaignsData").modal({
                backdrop: 'static',
                keyboard: false
            });
            var smsBodyLenght = $('#sms_text_edit').val().length;
            $("#smsBodyLenghtEdit").html(smsBodyLenght);

            $("#edit-sms-form select[name=sms_from]").customA11ySelect();
             $(".addRecipientsList #sms_recipients,#editSmsSenderId,#editSmsContentTemplate").customA11ySelect();


            /*Checkbox validation in edit send sms my campaigns while date is selected script Start*/ 

            var editdatePicker_sendSMS = $('.input-group #send_sms_date1').val();
            if(editdatePicker_sendSMS == ""){
              $(".edit_hideDateTime").attr('checked', true);
              $("#edit_sendsms_showDateTime").addClass("hidden");
            }
            else{
              $(".edit_showDateTime").attr('checked', true);
              $("#edit_sendsms_showDateTime").removeClass("hidden");
            }

            /*Checkbox validation in edit send sms my campaigns while date is selected script End*/

            //$('#edit-sms-form').bootstrapValidator('revalidateField', 'campaigns_name1');
            //$("#edit-sms-form").bootstrapValidator("enableFieldValidators", "campaigns_name1", true); 
            $('#edit-sms-form').bootstrapValidator('addField', 'campaigns_name', {
                validators: {
                    notEmpty: {
                        message: 'Please enter campaign name.'
                    }
                }
            });

            $('#edit-sms-form').bootstrapValidator('addField', 'sms_text', {
                validators: {
                    notEmpty: {
                        message: 'Please enter message.'
                    }
                }
            });

            $('#edit-sms-form').bootstrapValidator('addField', 'send_sms', {
                validators: {
                    notEmpty: {
                        message: 'Please select one option.'
                    }
                }
            });

            $('#edit-sms-form').bootstrapValidator('addField', 'date', {
                validators: {
                    notEmpty: {
                          message: 'Please schedule a date for the reminder.'
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

            $('#edit-sms-form').bootstrapValidator('addField', 'editSmsSenderId', {
                validators: {
                    notEmpty: {
                        message: 'Please select sender id.'
                    }
                }
            });

            $('#edit-sms-form').bootstrapValidator('addField', 'editSmsContentTemplate', {
                validators: {
                    notEmpty: {
                        message: 'Please select content template.'
                    }
                }
            });

            $('.editSmsBodyLenght').html(data.smsLengthCount);
            $('.editSmscount').html(data.smsCount);

         } else {
            $.alert({
              title: 'Alert!',
              content: 'Record Not exists',
              type: 'dark',
              typeAnimated: true
            });
         }
      }
    });
}
</script>
<!-- My campaigns add model -->
<div class="container">
  <div class="modal fade" id="editMyCampaignsData" role="dialog">
    <div class="modal-dialog modal-emailwidth">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update My Campaign</h4>
        </div>
        <div class="modal-body">
          <div class="container panel-body-margin">
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
  // SMS Datetime Picker -Set Scroll position
   $("#editMyCampaignsData").scroll(function() {
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
      $(".send_sms_time1").removeClass("clockpicker_position");
      $(e).addClass("clockpicker_position");
    }

    // Datepicker adjust position on

    function getDateEvent(e){
    $(".update_campaigns_date").removeClass("date_position");
    $(e).addClass("date_position");
  }

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
                   typeAnimated: true,
                   draggable: false,
      });
      
      document.getElementById('send_sms_time1').value="";
    }

    var selectedTime2= document.getElementById('send_sms_time1').value;
    // if(selectedTime2)
    // {
    //   $("#edit-sms-form").bootstrapValidator("enableFieldValidators", "time", false);
    // }
    // else
    // {
    //   $("#edit-sms-form").bootstrapValidator("enableFieldValidators", "time", true);
    // }

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
                   typeAnimated: true,
                   draggable: false,
            });

            document.getElementById('send_sms_time1').value='';
          }
        }else{
        
          $.alert({
            title: 'Alert!',
            content: 'Reminder can not be set for a past time',
            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
          });
          document.getElementById('send_sms_time1').value='';
        }


      }
    }
    //$('#send-sms-form').bootstrapValidator('revalidateField', 'time');
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
                          message: 'Please enter message.'
                      },
                  }
              },
              'campaigns_name': {
                  validators: {
                      notEmpty: {
                          message: 'Please enter campaign name.'
                      },
                  }
              },
              'copy_paste': {
                  validators: {
                      notEmpty: {
                          message: 'Please enter recipients.'
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
              // 'date1': {
              //     validators: {
              //         notEmpty: {
              //             message: 'Please schedule a date for the reminder.'
              //         },
              //         date: {
              //             format: 'DD/MM/YYYY',
              //             message: 'The date format is not valid'
              //         },
              //     }
              // },
              // 'time11': {
              //     validators: {
              //         notEmpty: {
              //             message: 'Please schedule a time for the reminder.'
              //         },
              //     }
              // },
              'editSmsSenderId': {
                  validators: {
                      notEmpty: {
                          message: 'Please select sender id.'
                      },
                  }
              },

              'editSmsContentTemplate': {
                  validators: {
                      notEmpty: {
                          message: 'Please select content template.'
                      },
                  }
              },
          },

    }).on('success.form.bv', function (event, data) {

    event.preventDefault();
    event.stopImmediatePropagation();

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

      var editSendSmsType = $('input[name=edit_send_sms]:checked', '#edit-sms-form').val();

      if(dd== dd1 && mm==mm1 && yyyy==yyyy1 && editSendSmsType == 'edit_sms_date'){
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
                   typeAnimated: true,
                   draggable: false,
              });

              document.getElementById('send_sms_time1').value='';
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
                   draggable: false,
                buttons: {
                        Ok: function () {
                            
                             $('button[data-action="reset"]').trigger('click');
                             //$("#editMyCampaignsData").modal("hide");
                             $("#editMyCampaignsData .close").click();
                             $(".modal-backdrop.in").remove();
                             $(".modal-open").removeClass();
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
      updateCampaignsCount++;
    }

      return false;
  });
});


//Select validation edit send sms my campaigs start

  $(document).on("click",".edit_showDateTime", function(){
    $("#edit_sendsms_showDateTime").removeClass('hidden');
    $('#edit-sms-form').bootstrapValidator('enableFieldValidators', 'date', true);
    $('#edit-sms-form').bootstrapValidator('enableFieldValidators', 'time', true);
  });

  $(document).on("click",".edit_hideDateTime", function(){
    $("#edit_sendsms_showDateTime").addClass('hidden');
    $('#edit-sms-form').bootstrapValidator('enableFieldValidators', 'date', false);
    $('#edit-sms-form').bootstrapValidator('enableFieldValidators', 'time', false);
  });

//Select validation edit send sms my campaigs end
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
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="emptyAttachments">&times;</button>
        <h4 class="modal-title">Edit Email Reminder</h4>
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
        <h4 class="modal-title">Edit SMS Reminder</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 ">
            <form id="edit-sms-reminder-form" enctype="multipart/form-data" method="post" autocomplete="off" >
              <div class="edit_sms_reminderForm">
                                   
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

<!-- Email estimate Modal Starts -->
<div class="modal fade" id="estimate_send_mail" role="dialog">
    <div class="modal-dialog" style="width:600px;">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Estimate To Mail</h4>
        </div>
        <div class="modal-body" style="padding-top:0px;" id="estimate_send_email_form">
          <!-- <button class="btn btn-success" id="" style="visibility: hidden;margin-bottom: 20px;">Send</button>  -->
          <form name="sendEstimateEmail" id="sendEstimateEmail" method="post" autocomplete="off">
            <div class="row form-group">
              <div class="col-md-12">
                <label><span class="pull-right">From</span></label>
                <input type="hidden" name="estimate_recordId" id="estimate_recordId" class="form-control" value="" />
                
                <input type="text" name="estimate_from" id="estimate_from" class="form-control" value="" placeholder="From: test@test.com"  onkeyup="validateEstimateFrom(this)" required />
                <span id="estimate_fromemailerror" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">Please enter a valid e-mail id</span>
                <input type="hidden" name="estimate_from_hidden" id="estimate_from_hidden" class="form-control" value="" />
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <label><span class="pull-right">To</span></label>
                <input type="text" name="estimate_to" id="estimate_to" class="form-control" value="" placeholder="To: Email id 1, Email id 2 ..."  onkeyup="validateEstimateMultipleEmailsCommaSeparated(this)" required />
                <!-- <span id="estimate_emailerror" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">Please enter a valid e-mail id</span> -->
                <span id="estimate_emailToMaxFive" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">You can enter a maximum of 5 E-mail ids</span>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <label><span class="pull-right">CC</span></label>
                <input name="estimate_cc" id="estimate_cc" class="form-control" placeholder="CC: Email id 1, Email id 2 ..." type="text" value="" onkeyup="validateEstimateMultipleEmailsCcCommaSeparated(this)" />
                <span id="estimate_emailccerror" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">Please enter a valid e-mail id</span>
                <span id="estimate_emailCcMaxFive" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">You can enter a maximum of 5 E-mail ids</span>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">

                <label><span class="pull-right">Subject</span></label>
                <input name="estimate_subject" id="estimate_subject" class="form-control" placeholder="Subject" type="text" value="" />
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <label><span class="pull-right">Message</span></label>
                <textarea name="estimate_mail_body" id="estimate_mail_body" class="form-control textarea-content"></textarea>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <input type="checkbox" name="send_pdf_attachment" id="send_pdf_attachment" />
                <label><span class=""> &nbsp;Attach the estimate as a PDF</span></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <div class="clearfix" style="margin-bottom: 15px;">
                    <button type="submit" class="btn btn-primary pull-right" id="sendEstimateEmailBtn">Send</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!-- Email estimate Modal Ends -->

<!-- Estimate mail send successful Modal Ends -->
<div class="modal fade" id="estimate_send_mail_success" role="dialog">
  <div class="modal-dialog" style="width:600px;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Estimate send successfully</h4>
      </div>
      <div class="modal-body" style="padding-top:0px;" id="estimate_send_email_successful">

      </div>
    </div>
  </div>
</div>
<!-- Estimate mail send successful Modal Ends -->

<!-- Email invoice Modal Starts -->
<div class="modal fade" id="invoice_send_mail" role="dialog">
    <div class="modal-dialog" style="width:600px;">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Invoice To Mail</h4>
        </div>
        <div class="modal-body" style="padding-top:0px;" id="invoice_send_email_form">
          <!-- <button class="btn btn-success" id="" style="visibility: hidden;margin-bottom: 20px;">Send</button>  -->
          <form name="sendInvoiceEmail" id="sendInvoiceEmail" method="post" autocomplete="off">
            <div class="row form-group">
              <div class="col-md-12">
                <label><span class="pull-right">From</span></label>
                <input type="hidden" name="invoice_recordId" id="invoice_recordId" class="form-control" value="" />
                
                <input type="text" name="invoice_from" id="invoice_from" class="form-control" value="" placeholder="From: test@test.com"  onkeyup="validateInvoiceFrom(this)" required />
                <span id="invoice_fromemailerror" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">Please enter a valid e-mail id</span>
                <input type="hidden" name="invoice_from_hidden" id="invoice_from_hidden" class="form-control" value="" />
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <label><span class="pull-right">To</span></label>
                <input type="text" name="invoice_to" id="invoice_to" class="form-control" value="" placeholder="To: Email id 1, Email id 2 ..."  onkeyup="validateInvoiceMultipleEmailsCommaSeparated(this)" required />
                <span id="invoice_emailerror" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">Please enter a valid e-mail id</span>
                <span id="invoice_emailToMaxFive" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">You can enter a maximum of 5 E-mail ids</span>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <label><span class="pull-right">CC</span></label>
                <input name="invoice_cc" id="invoice_cc" class="form-control" placeholder="CC: Email id 1, Email id 2 ..." type="text" value="" onkeyup="validateInvoiceMultipleEmailsCcCommaSeparated(this)" />
                <span id="invoice_emailccerror" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">Please enter a valid e-mail id</span>
                <span id="invoice_emailCcMaxFive" class="text-danger" class="text-danger_error" style="display: none; font-size: 12px;">You can enter a maximum of 5 E-mail ids</span>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">

                <label><span class="pull-right">Subject</span></label>
                <input name="invoice_subject" id="invoice_subject" class="form-control" placeholder="Subject" type="text" value="" />
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <label><span class="pull-right">Message</span></label>
                <textarea name="invoice_mail_body" id="invoice_mail_body" class="form-control textarea-content"></textarea>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <input type="checkbox" name="send_pdf_attachment" id="send_pdf_attachment" />
                <label><span class="">Attach the invoice as a PDF</span></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <div class="clearfix" style="margin-bottom: 15px;">
                    <button type="submit" class="btn btn-primary pull-right" id="sendInvoiceEmailBtn">Send</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!-- Email invoice Modal Ends -->
<!-- Invoice mail send successful Modal start -->
<div class="modal fade" id="invoice_send_mail_success" role="dialog">
  <div class="modal-dialog" style="width:600px;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Invoice send successfully</h4>
      </div>
      <div class="modal-body" style="padding-top:0px;" id="invoice_send_email_successful">

      </div>
    </div>
  </div>
</div>
<!-- Invoice mail send successful Modal Ends -->

<script type="text/javascript">
var afterhash = window.location.hash;

var site_protocol = window.location.protocol;

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
      $('.action[data-action="quickRemove"]').closest("li").remove();
}
</script>

<script>
//Edit Estimate
$('.action[data-action=Edit_estimate]').unbind().click(function(){

    $.ajax({
        type : "GET",
        url : "../../../../client/res/templates/financial_changes/estimate_file_upload.php",
        dataType : "json",
        data : { methodName: "estimate_deleteFolder"},

        success: function(data)
        {
        }
    });

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
            
            /*var s = document.createElement('script');
            s.type = "text/javascript";
            s.innerHTML = "../../client/js/financial_estimate_calculations_edit.js";
            $("#edit_estimateModal").append(s);*/
            $(".edit_estimate_Form").html(data);
            // $("#financialModal").text("Estimate Modal");
            $("#edit_estimateModal").modal();  
            var total_items = $("#edit_total_items").val();
            for(var s=0;s<total_items;s++)
            {
              // For Discount dropdown
              var n = $("#edit_participantTable .edit_participantRow").find(".main-group").eq(s);
              var disc_type = n.next().next().find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
              n.next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-option button:contains('"+disc_type+"')").closest('li').addClass("custom-a11yselect-focused custom-a11yselect-selected");

              // For GST dropdown
              var gst_type = n.next().next().next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
              n.next().next().next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-option button:contains('"+gst_type+"')").closest('li').addClass("custom-a11yselect-focused custom-a11yselect-selected");

              // For GST rate dropdown
              var gst_rate_type = n.next().next().next().find(".rate_data .custom-a11yselect-btn .custom-a11yselect-text").text();
              n.next().next().next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-option button:contains('"+gst_rate_type+"')").closest('li').addClass("custom-a11yselect-focused custom-a11yselect-selected");


              /*if(disc_type!="Select Type")
              {
                $("#edit_estimate_items_discount_selected").val(1);

              }
              else
              {
                $("#edit_estimate_items_discount_selected").val(0);

              }

              if(gst_type!="Select Type")
              {
                $("#edit_estimate_items_gst_type_selected").val(1);

              }
              else
              {
                $("#edit_estimate_items_gst_type_selected").val(0);

              }*/

            }

            $('#edit_estimateModal input[type=file]').customFile();   
             var item_length=$("#edit_total_items").val();
            $(".edit_participantRow .sno span").text("");
            for(var a=0;a<item_length;a++)
            {
              var sno=a+1;
              $(".edit_participantRow .main-group").eq(a).find(".sno span").text(sno);
            }  

            var items_selected_disc = $("#edit_estimate_items_discount_selected").val();
            var items_selected_gst = $("#edit_estimate_items_gst_type_selected").val();
            // console.log(items_selected_disc+" "+items_selected_gst);

            if(items_selected_disc == 1 && items_selected_gst == 1){
                $("#edit_estimateModal #edit_estimate_calculation .panel-heading").addClass("remove-panel-color");
            }
            else
            {
                $("#edit_estimateModal #edit_estimate_calculation .panel-heading").removeClass("remove-panel-color");

            }
        }
     });
});

//Edit Invoice
$('.action[data-action=Edit_invoice]').unbind().click(function(){

    $.ajax({
        type : "GET",
        url : "../../../../client/res/templates/financial_changes/invoice_file_upload.php",
        dataType : "json",
        data : { methodName: "deleteFolder"},

        success: function(data)
        {
        }
    });


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
             $('#edit_invoiceModal input[type=file]').customFile();  

             var item_length=$("#edit_invoice_total_items").val();
            $(".edit_invoice_participantRow .sno span").text("");
            for(var a=0;a<item_length;a++)
            {
              var sno=a+1;
              $(".edit_invoice_participantRow .main-group").eq(a).find(".sno span").text(sno);
            }

            // var total_items = $("#edit_total_items").val();

            // alert(item_length);

            for(var s=0;s<item_length;s++)
            {
              // For Discount dropdown

              var n = $("#edit_invoiceModal .edit_invoice_participantRow").find(".main-group").eq(s);

              var disc_type = n.next().next().find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
              n.next().next().find(".discount_section .custom-a11yselect-menu .custom-a11yselect-option button:contains('"+disc_type+"')").closest('li').addClass("custom-a11yselect-focused custom-a11yselect-selected");

              // For GST dropdown
              var gst_type = n.next().next().next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
              n.next().next().next().find(".GST_section .custom-a11yselect-menu .custom-a11yselect-option button:contains('"+gst_type+"')").closest('li').addClass("custom-a11yselect-focused custom-a11yselect-selected");

              // For GST rate dropdown
              var gst_rate_type = n.next().next().next().find(".rate_data .custom-a11yselect-btn .custom-a11yselect-text").text();
              n.next().next().next().find(".rate_data .custom-a11yselect-menu .custom-a11yselect-option button:contains('"+gst_rate_type+"')").closest('li').addClass("custom-a11yselect-focused custom-a11yselect-selected");
           }


            // Remove color when for any item both discount & gst is selected
            var items_inv_selected_disc = $("#edit_invoice_items_discount_selected").val();
            var items_inv_selected_gst = $("#edit_invoice_items_gst_type_selected").val();
            if(items_inv_selected_disc==1 && items_inv_selected_gst==1){
                $("#edit_invoiceModal #edit_invoice_calculation").find(".panel-heading").addClass("remove-panel-color");
            }
            else
            {
              $("#edit_invoiceModal #edit_invoice_calculation").find(".panel-heading").removeClass("remove-panel-color");
            }


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
            var p_len=parseInt($("#totalBankDetails").val());
            
            if(p_len>1)
            {
              $(".main_bank_deatils_edit .newedit .bank_deleteBtn").css("display","inline-block");
            }
            if(p_len<=1)
            {
             $(".main_bank_deatils_edit .bank_deleteBtn").css("display","none");
            }

            $(".bank_account_type_edit").customA11ySelect();    
            
            label_count($("#totalBankDetails").val());
            gst_label_count($("#totalGST_count").val());

        }
     });
});

//Convert to Invoice
$('.action[data-action="Convert"]').unbind().click(function(){
    var dataId = $(this).attr("data-id");
    $.ajax({
        type: "GET",
        url: "../../../../client/res/templates/financial_changes/convert_to_invoice.php",
        data: {dataId:dataId},
        success: function (data){
            $("#convert_ToInvoice_Form").html(data);
            $("#convert_ToInvoiceModal").modal(); 
            $('#convert_ToInvoiceModal input[type=file]').customFile();   
            // alert("hehehe");
            var item_length =$("#convert_total_items").val();

            $(".convert_participantRow .sno span").text("");
            for(var s=0;s<item_length;s++)
            { 
                var sno=s+1;
                $(".convert_participantRow .main-group").eq(s).find(".sno span").text(sno);

                // For Discount dropdown
                
                var n = $("#convert_ToInvoiceModal .convert_participantRow").find(".main-group").eq(s);
                var disc_type = n.next().next().find(".discount_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                

                // For GST dropdown
                var gst_type = n.next().next().next().find(".GST_section .custom-a11yselect-btn .custom-a11yselect-text").text();
                

                // alert(disc_type+" "+gst_type);

                if(disc_type!="Select Type")
                {
                  $("#Selected_disc_hidden_val").val(1);

                }
                else
                {
                  $("#Selected_disc_hidden_val").val(0);

                }

                if(gst_type!="Select Type")
                {
                  $("#Selected_gst_hidden_val").val(1);

                }
                else
                {
                  $("#Selected_gst_hidden_val").val(0);

                }

              } 
              // Remove color when for any item both discount & gst is selected
              var items_inv_selected_disc = $("#Selected_disc_hidden_val").val();
              var items_inv_selected_gst = $("#Selected_gst_hidden_val").val();
              if(items_inv_selected_disc==1 && items_inv_selected_gst==1)
              {
                $("#convert_ToInvoiceModal #convert_estimate_calculation .panel-heading").addClass("remove-panel-color");
              }
              else
              {
                 $("#convert_ToInvoiceModal #convert_estimate_calculation .panel-heading").removeClass("remove-panel-color");
              }
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
            $(".edit_payment_mode_history").customA11ySelect();
        }
     }); 
});

//Payment summary
$('.action[data-action=View_payments]').unbind().click(function(){
 var dataId = $(this).attr("data-id");
    $.ajax({
        type: "GET",
        url: "../../../../client/res/templates/financial_changes/Payment_summary.php",
        data: {dataId:dataId},
        success: function (data){
            $(".payment_SummaryForm").html(data);
            $("#payment_SummaryModal").modal();    
        }
    }); 

});

$(document).ready(function(){
  var afterhash = window.location.hash;
  if(afterhash === "#BillingEntity")
  {
      $("#main .list-container .list .table").attr("id", "billingEntityTable");
  }
  else if(afterhash === "#Estimate")
  {
      $("#main .list-container .list .table").attr("id", "estimateTable");
  }
  else if(afterhash === "#Invoice")
  {
      $("#main .list-container .list .table").attr("id", "invoiceTable");
  }
  else if(afterhash === "#Payments")
  {
      $("#main .list-container .list .table").attr("id", "paymentTable");
  }
});

// Remove Estimate 
$('.action[data-action=Remove_Estimate]').unbind().click(function(){
    
    var dataId = $(this).attr("data-id");
    $.confirm({
        title: 'Warning!',
        content: 'Are you sure want to remove Estimate?',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
        buttons: {
            Yes: function () {
                // window.location = site_protocol+'//'+domain_name+'/'+folder_name+'/client/res/templates/financial_changes/remove_Estimate.php?id='+dataId;
                $.ajax({
                  url: '../../../../client/res/templates/financial_changes/remove_Estimate.php?id='+dataId, 
                  async: false,
                  dataType : "JSON",
                  success: function(result){
                    $("#estimateTable").find("tbody tr").each(function(){
                      var trDataID = $(this).data("id");
                      if(trDataID == dataId)
                      {
                        $(this).remove();
                        $("#main .list-container .list-buttons-container .total-count-span").text(result.estimate_count);
                      }
                    });

                    if(result)
                    {
                      $.alert({
                          title: 'Alert!',
                          content: result.msg,
                          type: 'dark',
                          typeAnimated: true,
                          draggable: false,
                          buttons: {
                            OK: function(){
                              if(result.estimate_count == 0)
                              {
                                $("#estimateTable").hide();
                                $("#main .list-container .list-buttons-container").remove();
                                $("#main .list-container .list").remove();
                                $(".search-container").css("border-radius", "0px 0px 15px 15px");
                                $("#main .list-container").prepend('<br/><div class="No_data">No Data</div>');
                              }
                            },
                          }
                      });
                    }
                  }
                }); 
            },
            No: function(){  }
        }
    });
});

// Remove Billing Entity 
$('.action[data-action=Remove_billing_entity]').unbind().click(function(){
    
    var dataId = $(this).attr("data-id");
    
    $.confirm({
        title: 'Warning!',
        content: 'Are you sure want to remove Billing Entity?',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
        buttons: {
            Yes: function () {
                // window.location = site_protocol+'//'+domain_name+'/'+folder_name+'/client/res/templates/financial_changes/remove_Billingentity.php?id='+dataId;
                $.ajax({
                    url: '../../../../client/res/templates/financial_changes/remove_Billingentity.php?id='+dataId, 
                    async: false,
                    dataType : "JSON",
                    success: function(result){
                      $("#billingEntityTable").find("tbody tr").each(function(){
                        var trDataID = $(this).data("id");
                        if(trDataID == dataId)
                        {
                          $(this).remove();
                          $("#main .list-container .list-buttons-container .total-count-span").text(result.billentity_count);
                        }
                      });

                      if(result)
                      {
                        $.alert({
                            title: 'Alert!',
                            content: result.msg,
                            type: 'dark',
                            typeAnimated: true,
                            draggable: false,
                            buttons: {
                              OK: function(){
                                if(result.billentity_count == 0)
                                {
                                  $("#billingEntityTable").hide();
                                  $("#main .list-container .list-buttons-container").remove();
                                  $("#main .list-container .list").remove();
                                  $(".search-container").css("border-radius", "0px 0px 15px 15px");
                                  $("#main .list-container").prepend('<br/><div class="No_data">No Data</div>');
                                }
                              },
                            }
                        });
                      }
                    }
                }); 
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
        content: 'Are you sure want to remove Payment?',
        type: 'dark',
        typeAnimated: true,
        draggable: false,
        buttons: {
            Yes: function () {
                // window.location = site_protocol+'//'+domain_name+'/'+folder_name+'/client/res/templates/financial_changes/remove_Payment.php?id='+dataId;

                $.ajax({
                    url: '../../../../client/res/templates/financial_changes/remove_Payment.php?id='+dataId, 
                    async: false,
                    dataType : "JSON",
                    success: function(result){
                      $("#paymentTable").find("tbody tr").each(function(){
                        var trDataID = $(this).data("id");
                        if(trDataID == dataId)
                        {
                          $(this).remove();
                          $("#main .list-container .list-buttons-container .total-count-span").text(result.payment_count);
                        }
                      });

                      if(result)
                      {
                        $.alert({
                            title: 'Alert!',
                            content: result.msg,
                            type: 'dark',
                            typeAnimated: true,
                            draggable: false,
                            buttons: {
                              OK: function(){
                                if(result.payment_count == 0)
                                {
                                  $("#paymentTable").hide();
                                  $("#main .list-container .list-buttons-container").remove();
                                  $("#main .list-container .list").remove();
                                  $(".search-container").css("border-radius", "0px 0px 15px 15px");
                                  $("#main .list-container").prepend('<br/><div class="No_data">No Data</div>');
                                }
                              },
                            }
                        });
                      }
                    }
                });
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
            content: 'Are you sure want to remove Invoice?',
            type: 'dark',
            typeAnimated: true,
            draggable: false,
            buttons: {
                Yes: function () {
                   // window.location = site_protocol+'//'+domain_name+'/'+folder_name+'/client/res/templates/financial_changes/remove_Invoice.php?id='+dataId; 
                  $.ajax({
                    url: '../../../../client/res/templates/financial_changes/remove_Invoice.php?id='+dataId, 
                    async: false,
                    dataType : "JSON",
                    success: function(result){
                      $("#invoiceTable").find("tbody tr").each(function(){
                        var trDataID = $(this).data("id");
                        if(trDataID == dataId)
                        {
                          $(this).remove();
                          $("#main .list-container .list-buttons-container .total-count-span").text(result.invoice_count);
                        }
                      });

                      if(result)
                      {
                        $.alert({
                            title: 'Alert!',
                            content: result.msg,
                            type: 'dark',
                            typeAnimated: true,
                            draggable: false,
                            buttons: {
                              OK: function(){
                                if(result.invoice_count == 0)
                                {
                                  $("#invoiceTable").hide();
                                  $("#main .list-container .list-buttons-container").remove();
                                  $("#main .list-container .list").remove();
                                  $(".search-container").css("border-radius", "0px 0px 15px 15px");
                                  $("#main .list-container").prepend('<br/><div class="No_data">No Data</div>');
                                }
                              },
                            }
                        });
                      }
                    }
                  });
                },
                No: function () { }
            }

        });
    
    } else if(result_val22==1) {

        sessionStorage.removeItem("result_val22"); 
        $.confirm({
            title: 'Warning!',
            content: 'Payment has been recorded for this invoice,hence they can not be deleted!',
            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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

  //alert("In get data");  
  var id=$(id).data('id');
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
         if(data.status == "true"){
         if(data){
            $(".edit_email_reminderForm").html(data.data);
            //$("#editReminderModal").modal("show"); 
            $("#editReminderModal").modal({
                backdrop: 'static',
                keyboard: false
            });
              $('.input-group.date15').datepicker({format: "dd/mm/yyyy",autoclose:true,container:'#date15',}); 

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

  /*Checkbox validation while date is selected script Start*/

          var email_remindereditdatePicker = $('.input-group #date15').val();
          if(email_remindereditdatePicker == ""){
          $(".edit_emailReminder_hideDateTime").attr('checked', true);
          $("#edit_email_reminderDateTime").addClass("hidden");
          }
          else{
          $(".edit_emailReminder_showDateTime").attr('checked', true);
          $("#edit_email_reminderDateTime").removeClass("hidden");
          }

  /*Checkbox validation while date is selected script End*/

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
       }else{
        $.alert({
              title: 'Alert!',
              content: 'Something went wrong, Please try later!',
              type: 'dark',
              typeAnimated: true,
          });

          $('button[data-action="reset"]').trigger('click');

       }
      }
    });

   //
}

$(document).on("change",".edit-upload",function(event){
      event.preventDefault();
      event.stopImmediatePropagation();

      var form_data       = $("#edit-reminder-form");
      form_data           = new FormData(form_data[0]);
      form_data.append('methodName', 'edit_file_upload');
      $.ajax({
          type    : "POST",
          url     : "../../../../client/res/templates/email_reminder/file_upload.php",
          dataType  : "json",
          data    : form_data,
          processData: false,
          contentType: false,
          success: function(data)
          {
            var $fileHtml = '';

            if(data.fileSuccess){

              $.each(data.fileSuccess, function (key,val) {

                $fileHtml = $fileHtml+"<div class='row edit_emailattachment_remove'><div class='col-xs-6'><span class='email_reminder_attachment'>"+key+"</span></div><div class='col-xs-6'><span class='material-icons-outlined unlinkFile' data-id='' data-name='"+key+"'  aria-hidden='true' onclick='unLinkfile(this);' style='cursor: pointer;' >close</span></div></div>";

              });

              $("#file-input1").val("");

            } 

            if(data.fileError) {

              $.each(data.fileError, function (key,val) {

                  $fileHtml = $fileHtml+"<div class='row text-danger'><div class='col-xs-12'>"+key + " - " +  val +"</div></div>";

              });
                
            }
            
            $(".file_name_append1").append($fileHtml);
          }
      });
 });

     function deletefile(event){

      $(event).closest("p").remove();
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

    $(document).on("click","#editReminderModal .close",function(){
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
                   draggable: false,
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
                   typeAnimated: true,
                   draggable: false,
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
                   draggable: false,
              });

          
              document.getElementById('time15').value='';
            }

        }else{

            $.alert({
                title: 'Alert!',
                content: 'Reminder can not be set for a past time',
                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
    document.getElementById("updateEmailReminder").disabled = false;
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
                   draggable: false,
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
                   typeAnimated: true,
                   draggable: false,
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
                   draggable: false,
              });

          
              document.getElementById('time15').value='';
            }

        }else{

            $.alert({
                title: 'Alert!',
                content: 'Reminder can not be set for a past time',
                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                   typeAnimated: true,
                   draggable: false,
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
                   typeAnimated: true,
                   draggable: false,
                });
                document.getElementById('time15').value='';
                count_edit_email++;
                return false;
              }
            }
          }
      }

    // var subject = document.getElementById('subject1').value;
    // if(!subject)
    // {
    //   var check = confirm("Do you want to schedule without any subject?");
    //   if(!check)
    //   {
    //     document.getElementById("subject1").focus();
    //     // document.getElementById("updateEmailReminder").disabled = false;
    //     count_edit_email++;
    //     return false;
    //   }
    // }
    
    CKEDITOR.instances.editor201.updateElement();
    event.preventDefault();
    var form  = $(this);
    form      = new FormData(form[0]);
    
    function update_submit(){
     
      // show loader
      $(".email-loader").show();
      $(".email-blur-effect").show();

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
                   draggable: false,
              buttons: {
                      Ok: function () {
                          $('button[data-action="reset"]').trigger('click');
                          $("#editReminderModal").modal("hide");
                          $(".modal-backdrop.in").remove();
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

           //hide loader
         $(".email-loader").hide();
         $(".email-blur-effect").hide();
      }
    });
    }

    var subject = document.getElementById('subject1').value;
    var body = document.getElementById('editor201').value;
    if(!subject || !body)
    {
      if(!subject){
         $.alert({
            title: 'Alert!',
            content: "Do you want to schedule without any subject?",
            type: 'dark',
            typeAnimated: true,
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
                            update_submit();
                      },

                      CANCEL: function(){
                        
                        document.getElementById("editor201").focus();
                        // document.getElementById("myBtn").disabled = false;
                        count_edit_email++;
                      },
              
                    }
                    });
                  }else{
                    update_submit();
                  }
                  

              },

              CANCEL: function(){
                
                document.getElementById("subject1").focus();
                // document.getElementById("myBtn").disabled = false;
                count_edit_email++;
                
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
                update_submit();
          },

          CANCEL: function(){
            
            document.getElementById("editor201").focus();
            // document.getElementById("myBtn").disabled = false;
            count_edit_email++;
          },
              
        }
        });
      }else{
            update_submit();
      }

      
      // if(!check)
      // {
      //   document.getElementById("subject11").focus();
      //   document.getElementById("myBtn").disabled = false;
      //   return false;
      // }
    }else{
      update_submit();
    }   
    

    
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
        if(data.status == 'true'){
            $.alert({
                title: 'Alert!',
                content: data.msg,
                type: 'dark',
                typeAnimated: true,
                draggable: false,
                buttons: {
                    Ok: function () {
                        $('button[data-action="reset"]').trigger('click');
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
                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                buttons: {
                    Ok: function () {
                        // $.alert('Confirmed!');
                        $('button[data-action="reset"]').trigger('click');
                    }
                }
            });
        }else{
          $.alert({
                title: 'Alert!',
                content: 'This reminder is already inactive.',
                type: 'dark',
                typeAnimated: true,
            });
        }
        
      }
  });
}



/* Select send email option in add Email reminder Start */
$(document).on('click','.edit_emailReminder_showDateTime', function(){
  //alert("alert in time and date");
$("#edit_email_reminderDateTime").removeClass('hidden');
$('#edit-reminder-form').bootstrapValidator('enableFieldValidators', 'date15', true);
$('#edit-reminder-form').bootstrapValidator('enableFieldValidators', 'time15', true);
});

$(document).on('click','.edit_emailReminder_hideDateTime', function(){
$("#edit_email_reminderDateTime").addClass('hidden');
$('#edit-reminder-form').bootstrapValidator('enableFieldValidators', 'date15', false);
$('#edit-reminder-form').bootstrapValidator('enableFieldValidators', 'time15', false);
});



/* Select send email option in add Email reminder End */
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
        if(data.status == "true"){
        if(data){

          $(".edit_sms_reminderForm").html(data.data);
          $("#editSmsReminderModal1").modal("show");
          $("#edit_smscontent_template, #edit_smssenderid").customA11ySelect();
          $("#edit_smscontent_template-button, #edit_smssenderid-button").addClass('form-control');
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

          /*Checkbox validation while date is selected script Start*/ 

          var editdatePicker = $('.input-group #smsDate2').val();
          if(editdatePicker == ""){
            $(".edit_SMS_hideDateTime").attr('checked', true);
            $("#edit_showDateTimeInput").css("display","none");
          }
          else{
            $(".edit_SMS_showDateTime").attr('checked', true);
            $("#edit_showDateTimeInput").css("display","block");
          }

          /*Checkbox validation while date is selected script End*/

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

            $('#edit-sms-reminder-form').bootstrapValidator('addField', 'edit_smssenderid', {
                validators: {
                    notEmpty: {
                        message: 'Please select sender id.'
                    }
                }
            });

            $('#edit-sms-reminder-form').bootstrapValidator('addField', 'edit_smscontent_template', {
                validators: {
                    notEmpty: {
                        message: 'Please select content template.'
                    }
                }
            });

            $('.edit_smsBodyLenght').html(data.smsLengthCount);
            $('.edit_smscount').html(data.smsCount);

        }else{

          $.alert({
            title: 'Alert!',
            content: data.msg,
            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
          });
        }

        }else{
        $.alert({
              title: 'Alert!',
              content: 'Something went wrong, Please try later!',
              type: 'dark',
              typeAnimated: true,
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
                   typeAnimated: true,
                   draggable: false,
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
                   draggable: false,
              });
              document.getElementById('smsTime2').value='';
            }

        }else{

            $.alert({
                title: 'Alert!',
                content: 'Reminder can not be set for a past time',
                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                   draggable: false,
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

      event.preventDefault();
      event.stopImmediatePropagation();
      //Select sender id and content template  click event validation Edit SMS Reminder Start

      var editsenderIdCount = 0;
      var edit_SMS_Sender_Id = $("#edit_smssenderid").val();
      var edit_SMS_content_type = $("#edit_smscontent_template").val();

      if(edit_SMS_Sender_Id == ""){
         $("#edit_smssenderid").parent('.field').find('.edit_SMS_error_main').css("display","inline-block");
         //console.log($("#edit_smssenderid").parent('.field').find('.edit_SMS_error_main').text());
         editsenderIdCount++;
      } else{
        $("#edit_smssenderid").parent('.field').find('.edit_SMS_error_main').css("display","none");
      } 

      if(edit_SMS_content_type == "") {
        $("#edit_smscontent_template").parent('.field').find('.edit_SMS_error_main').css("display","inline-block");
        //console.log($("#edit_smscontent_template").parent('.field').find('.edit_SMS_error_main').text());
        editsenderIdCount++;
      }else{
        $("#edit_smscontent_template").parent('.field').find('.edit_SMS_error_main').css("display","none");
      } 

      if(editsenderIdCount>0){
        return false;
      }



      //Select sender id and content template  click event validation Edit SMS Reminder End
  setTimeout(function(){ count2 = 0; }, 3000);
  if(count2 == 0)
  { 
    var selectedText1 = document.getElementById('smsDate2').value;
              // alert('selectedText1');
              // return false;
              var sendSmsType = $('input[name=edit_send_sms]:checked', '#edit-sms-reminder-form').val();
              if(selectedText1 && sendSmsType == 'sms_date')
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


                  // if(dd== dd1 && mm==mm1 && yyyy==yyyy1)
                  // {
                  //   // time validatio#n
                  //   var d = new Date();
                  //   var n = d.getHours();
                  //   var m = d.getMinutes();
                  //   var current_time = n+':'+m;
                  //   var time = document.getElementById('smsTime2').value;
                    
                  //   if(current_time >= time)
                  //   {
                  //     document.getElementById("smsTime2").focus();
                  //     //$("#sms_time_error1").css('display','block');
                  //      // document.getElementById("update_sms_reminder").disabled = true;
                  //      $.alert({
                  //         title: 'Alert!',
                  //         content: 'Reminder can not be set for a past date',
                  //         type: 'dark',
                  //         typeAnimated: true,
                  //     });
                  //   //document.getElementById('smsDate2').value='';
                  //   count2=1;
                        
                  //       return false;
                  //   }
                  // }

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
                      
                        if(mints>=selMints){
                        
                          $.alert({
                              title: 'Alert!',
                              content: 'Reminder can not be set for a past time',
                              type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                          });
                          document.getElementById('smsTime2').value='';
                          count2=1;
                        
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
                        document.getElementById('smsTime2').value='';
                        count2=1;
                        
                        return false;

                    }


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
                   draggable: false,
              buttons: {
                      Ok: function () {
                          //$("#editSmsReminderModal1").modal("hide");
                          $("#editSmsReminderModal1 .close").click();
                          $('button[data-action="reset"]').trigger('click');
                          $(".modal-backdrop.in").remove();
                          $(".modal-open").removeClass();
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
   count2++;
  }

    return false;
});
    function getDataForSMSInActive(id){
  var id=$(id).data('id');
  $.ajax({
       type    : "GET",
      url     : "../../client/res/templates/sms_reminder/inactive_sms_reminder.php?id="+id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
        if(data==1){
          $.alert({
                title: 'Alert!',
                content: 'Reminder deactivated!',
                type: 'dark',
                typeAnimated: true,
                draggable: false,
                buttons: {
                    Ok: function () {
                        // $.alert('Confirmed!');
                        $('button[data-action="reset"]').trigger('click');
                    }
                }
            });
        
        }else{
          $.alert({
                title: 'Alert!',
                content: 'This reminder is already inactive.',
                type: 'dark',
                typeAnimated: true,
            });
        }
        
      }
  });
}

function getDataForSMSActive(id){
    var id=$(id).data('id');
    $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/sms_reminder/active_sms_reminder.php?id="+id,
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            if(data.status == 'true'){
                $.alert({
                    title: 'Alert!',
                    content: data.msg,
                    type: 'dark',
                    typeAnimated: true,
                    buttons: {
                        Ok: function () {
                            $('button[data-action="reset"]').trigger('click');
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
}





var folder_name = window.location.pathname;
folder_name.indexOf(1);

var domain_name=window.location.hostname; 


var first1 = window.location.pathname;
first1.indexOf(1);
first1.toLowerCase();
first1 = first1.split("/")[1]; 

$('.action[data-action=view_attachments_invoice]').unbind().click(function(){
    
    var dataId = $(this).attr("data-id");

    if(first1=='portal') {

             $.ajax({
                url: "../../../../client/res/templates/financial_changes/invoice_attachments.php?id="+dataId,type: "get", 
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
                          ul.append('<li style="display: inline-block;list-style-type: none;">' + result[i].original_filename + '</li>');
                          ul.append('<li style="display: inline-block;list-style-type: none;float:right"><span class="glyphicon glyphicon-download-alt"><a style="margin-left:-22px" target="blank" href="' + result[i].link + '">&nbsp; Download</a></span></li><br>');
                      }
                      ul.append("</ul>");
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

$(document).on("click", "#download_invoice_attachment", function(){
  var dataFileName = $(this).data("name");
  $.ajax({
      url: "../../client/res/templates/financial_changes/download_estimate_attachments.php?filename='"+dataFileName+"'",
      type: "get",
      async: false,
      dataType: 'json',
      success: function(result)
      {

      } 
  });
});

$(document).on("click", "#download_viewed_invoice_attachment", function(){
  var dataFileName = $(this).data("name");
  $.ajax({
      url: "../../../../client/res/templates/financial_changes/download_invoice_attachments.php?filename='"+dataFileName+"'",
      type: "get",
      async: false,
      dataType: 'json',
      success: function(result)
      {

      } 
  });
});
// VIEW Attachment fOR Invoice

$('.action[data-action=view_attachments]').unbind().click(function(){
    
    var dataId = $(this).attr("data-id");
    // alert(dataId);
    if(first1=='portal')  {
        
        $.ajax({
          url: "../../../../client/res/templates/financial_changes/estimate_attachments.php?id="+dataId,type: "get", 
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
                      ul.append('<li style="display: inline-block;list-style-type: none;">' + result[i].original_filename + '</li>');
                      ul.append('<li style="display: inline-block;list-style-type: none;float:right"><span class="glyphicon glyphicon-download-alt"><a data-name="'+result[i].original_filename+'" id="down_estimate_attachment" style="margin-left:-22px" href="' + result[i].link + '">&nbsp; Download</a></span></li><br>');
                  }
                  ul.append("</ul>");
                  $("#estimate_attachment_data").append(ul); 
              }       
          }
        });
    
    } else {

        $.ajax({
            url: "../../../../client/res/templates/financial_changes/estimate_attachments.php?id="+dataId,type: "get", 
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
                        ul.append('<li style="display: inline;list-style-type: none;float:right"><span class="glyphicon glyphicon-download-alt"><a data-name="'+result[i].original_filename+'" id="down_estimate_attachment" style="margin-left:-22px" href="' + result[i].link + '">&nbsp; Download</a></span></li><br>');
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

$(document).on("click", "#download_estimate_attachment", function(){
  var dataFileName = $(this).data("name");
  $.ajax({
      url: "../../client/res/templates/financial_changes/download_estimate_attachments.php?filename='"+dataFileName+"'",
      type: "get",
      async: false,
      dataType: 'json',
      success: function(result)
      {

      } 
  });
});

$(document).on("click", "#download_viewed_estimate_attachment", function(){
  var dataFileName = $(this).data("name");
  $.ajax({
      url: "../../../../client/res/templates/financial_changes/download_estimate_attachments.php?filename='"+dataFileName+"'",
      type: "get",
      async: false,
      dataType: 'json',
      success: function(result)
      {

      } 
  });
});

</script> 

<!-- Code for sending estimate by mail starts -->
<script>
  $('.action[data-action=email_estimate]').unbind().click(function(){
      var dataId = $(this).attr("data-id");
      resetEstimate_Invoice_forms('estimate_send_mail', 'estimate');
      $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_estimate_data_for_mail.php?dataId="+dataId,
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            $("#estimate_send_mail").modal("show");
            $(".modal-content").show();
            $("#estimate_send_email_form").find("#err_message").hide();
            if(data){
              $("#sendEstimateEmail").show();
              $("#estimate_recordId").val(data.estimate_id);
              $("#estimate_from").val(data.from_email);
              $("#estimate_to").val(data.email_id);
              $("#estimate_subject").val(data.mail_subject);
            }
            else {
              $("#sendEstimateEmail").hide();
              $("#estimate_to").val("");
              $("#estimate_send_email_form").append("<h6 id='err_message'>No email available</h6>");
            }
        }
      });
  });
</script>
<!-- Code for sending estimate by mail ends -->
<!-- Code for sending invoice by mail starts -->
<script>
  $('.action[data-action=email_invoice]').unbind().click(function(){
      var dataId = $(this).attr("data-id");
      resetEstimate_Invoice_forms('invoice_send_mail', 'invoice');
      $.ajax({
        type    : "GET",
        url     : "../../client/res/templates/financial_changes/get_invoice_data_for_mail.php?dataId="+dataId,
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            $("#invoice_send_mail").modal("show");
            $(".modal-content").show();
            $("#invoice_send_email_form").find("#err_message").hide();
            if(data){
              $("#sendInvoiceEmail").show();
              $("#invoice_recordId").val(data.invoice_id);
              $("#invoice_from").val(data.from_email);
              $("#invoice_to").val(data.email_id);
              $("#invoice_subject").val(data.mail_subject);
            }
            else {
              $("#sendInvoiceEmail").hide();
              $("#invoice_to").val("");
              $("#invoice_send_email_form").append("<h6 id='err_message'>No email available</h6>");
            }
        }
      });
  });

  function resetEstimate_Invoice_forms(form_id, formModel){
    $("#"+form_id+" #"+formModel+"_fromemailerror").hide();
    $("#"+form_id+" #"+formModel+"_emailerror").hide();
    $("#"+form_id+" #"+formModel+"_emailToMaxFive").hide();
    $("#"+form_id+" #"+formModel+"_emailccerror").hide();
    $("#"+form_id+" #"+formModel+"_emailCcMaxFive").hide();
    $("#"+form_id+" #"+formModel+"_mail_body").html("");
    $("#"+form_id+" #send_pdf_attachment").prop('checked', false);
  }
</script>
<!-- Code for sending invoice by mail ends -->


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
            //$("#viewSendEmailData").modal("show");
            $("#viewSendEmailData").modal({
                backdrop: 'static',
                keyboard: false
            });   
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
        <button type="button" class="close" data-dismiss="modal" id="emptyAttachments">&times;</button>
        <h4 class="modal-title">View Sent Email Data</h4>
      </div>
      <div class="modal-body">
        <div class="view_send_email_data">
          
        </div>
      </div>
    </div>

  </div>
</div>

<!-- View Sent Email Data Modal -->
<div id="viewSentSMSData" class="modal fade" role="dialog">
  <div class="modal-dialog modal-emailwidth">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Sent SMS Data</h4>
      </div>
      <div class="modal-body">
      <div class="view_sent_sms_data" style="">
        
      </div>
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
                        <div class="">
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
                     <button type="button" class="close edit_close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="financialModal">Edit Estimate</h4>
                  </div>
                  <div class="modal-body">
                        <div class="">
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
                              <th style="color:black" class="th-sm">City
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
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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


            // var table = $('#estimate_example1').dataTable({
            //     "bProcessing": true,
            //     "sAjaxSource": "../../../../client/res/templates/financial_changes/generate_account_table.php",
            //     "bPaginate": true,
            //     "sPaginationType": "full_numbers",
            //     "iDisplayLength": 5,
            //      "destroy": true,
            //     "aoColumns": [{
            //             mData: 'Name',
            //             "render": function(data) {

            //                 // alert(data);
            //                 return "<a href='javascript:void(0);' onclick='account(\"" + data + "\")'>" + data + "</a>";
            //             }
            //         },
            //         {
            //             mData: 'Country'
            //         },
            //     ]
            // });
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
                                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                   draggable: false,
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
                   draggable: false,
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
                   draggable: false,
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
              type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                            $('#edit_estimateModal').modal('toggle');
                                        });
                                       // $('#updateEstimateForm')[0].reset();
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
                     <h4 class="modal-title" id="financialModal">Convert To Invoice</h4>
                  </div>
                  <div class="modal-body">
                        <div class="">
                        <div id="convert_ToInvoice_Form"></div>
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
                              <th style="color:black" class="th-sm">City
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


            // var table = $('#Convert_to_example1').dataTable({
            //     "bProcessing": true,
            //     "sAjaxSource": "../../../../client/res/templates/financial_changes/generate_account_table.php",
            //     "bPaginate": true,
            //     "sPaginationType": "full_numbers",
            //     "iDisplayLength": 5,
            //     "destroy": true,
            //     "aoColumns": [{
            //             mData: 'Name',
            //             "render": function(data) {

            //                 // alert(data);
            //                 return "<a href='javascript:void(0);' onclick='convert_To(\"" + data + "\")'>" + data + "</a>";
            //             }
            //         },
            //         {
            //             mData: 'Country'
            //         },
            //     ]
            // });
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
$(document).on("change",".invoice_number", function(e){
e.stopImmediatePropagation();
no=$('#convert_invoiceno').val();
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
            $('#convert_invoiceno').val("");
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
            $('#convert_invoiceno').val("");
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
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                     if(data.status == "true")
                             {
                                 $.confirm({
                                    title: 'Success!',
                                    content: data.msg,
                                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                             else{
                              
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
                   draggable: false,
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
                   draggable: false,
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
                                       draggable: false,
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
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
            $.alert("Due date can not be before invoice date.");
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
      orientation: "top"
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
                       <h4 class="modal-title" id="billingentityModal">Edit Billing Entity</h4>
                    </div>
                    <div class="modal-body">
                      <div class="">
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
                     <h4 class="modal-title" id="financialModal">Edit Invoice</h4>
                  </div>
                  <div class="modal-body">
                    <div class="">
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
                              <th style="color:black" class="th-sm">City
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
                   typeAnimated: true,
                   draggable: false,
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
                   draggable: false,
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
                              type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                  type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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

                          // var table = $('#example').dataTable({
                          //     "bProcessing": true,
                          //     "sAjaxSource": "../../../../client/res/templates/financial_changes/generate_account_table.php",
                          //     "bPaginate": true,
                          //     "sPaginationType": "full_numbers",
                          //     "iDisplayLength": 5,
                          //     "destroy": true,
                          //     "aoColumns": [{
                          //             mData: 'Name',
                          //             "render": function(data) {

                          //                 return "<a href='javascript:void(0);' onclick='setcount(\"" + data + "\")'>" + data + "</a>";
                          //             }
                          //         },
                          //         {
                          //             mData: 'Country'
                          //         },
                          //     ]
                          // });
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
                                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                   draggable: false,
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
                   draggable: false,
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
                   draggable: false,
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
              type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
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
                    
                     if(data.status == "true")
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
                                         $('#edit_invoiceModal').modal('toggle');
                                          });
                                         //$('#updateEstimateForm')[0].reset();
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
            <div class="modal-dialog modal-record_payment_width">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="financialModal">Payment Modal</h4>
                  </div>
                  <div class="modal-body">
                        <div class="">
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
                                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                                    buttons: {
                                      Ok: function () {
                                        //window.location.reload();
                                        $('button[data-action="reset"]').trigger('click');
                                        $(function () {
                                         $('#edit_paymentModal').modal('toggle');
                                          });
                                          $(".modal-backdrop.in").remove();
                                          $(".modal-open").removeClass();
                                          
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
   $(document).on("focus", "#datepicker", function(){
        $("#datepicker").datepicker({format: "dd/mm/yyyy",
      autoclose: true, 
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,
    });
    });
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
    // var due_amount1 = due_amount - (tds1 + net_amount1);
    var due_amount1 = due_amount - tds1 ;

    // alert(due_amount1);

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
      // $.alert("The amount entered is more than the balance due for selected invoice");
      $.alert({
          title: 'Alert!',
          content: "The amount entered is more than the balance due for selected invoice.",
          type: 'dark',
          typeAnimated: true,
          draggable: false,
      });
       
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
    
    // var due_amount1 = due_amount- (tds1 + net_amount1);
    var due_amount1 = due_amount- net_amount1;
    if(due_amount1 > 0)
    {
      
        $("#net_amount1").val(net_amount1);
        $("#due_amount").val(due_amount1);
    }
    else if(due_amount1 < 0)

    {
     
        $("#net_amount1").val("0");
        $("#due_amount").val(due_amount);
        // $.alert("The amount entered is more than the balance due for selected invoice");
        $.alert({
          title: 'Alert!',
          content: "The amount entered is more than the balance due for selected invoice.",
          type: 'dark',
          typeAnimated: true,
          draggable: false,
        });
      
    }
    // counttot=0;

  // }
  // counttot++;
});

</script>
<!-- Edit Payment alculation script End -->

<!-- BILLING ENTITY SCRIPT STARTS HERE -->
<!-- Billing Entity Update data Script Starts. --> 

<!-- Validate billing entity bank details -->
<script type="text/javascript">
var cnt1=1;
var count1=0;
var count_1=1;
var txtVal=0;
var gstVal=0;


function label_count(no)
{
  $(".main_bank_deatils_edit .newedit .bank_title").text("");  

  for(var t=0;t<no;t++)
  {
    var s=t+1;
    $(".main_bank_deatils_edit .newedit").eq(t).find(".bank_title").text("Bank Account "+s);
  }


}

function gst_label_count(no)
{
  $(".GST_details_Panel_edit .GST_added_panel_edit .gst_title").text("");   
  for(var t=0;t<no;t++)
  {
    var s=t+1;
    $(".GST_details_Panel_edit .GST_added_panel_edit").eq(t).find(".gst_title").text("GST "+s);
  }


}


function add_more_bank_details(){
  
    var len = $(".editbankdetails").length+1;

    var check = validation_edit();

    txtVal = $("#totalBankDetails").val();

    if (!check) {

          txtVal++;
      

        //My change 
        $(".main_bank_deatils_edit").append('<div class="panel-body panel-body-form newedit"><div id="editbankdetails'+len+'" class="editbankdetails "><div class="row"><div class="col-md-12"><div class="panel-heading"style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;"><h4 class="panel-title text-uppercase bank_title" style="display:inline-block;"> </h4><button type="button" class="btn btn-danger bank_deleteBtn pull-right" onclick="delete_panel_edit(this, '+len+', 0)" style="display:none;"><span class="material-icons-outlined">close</span></button></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group Beneficiary_group_edit"><label for="">Beneficiary Name</label><input type="text" name="billingentity_bank_beneficiary[]" value="" class="form-control beneficiary_nm_edit" placeholder="Beneficiary name"><span class="temp-error display_none text-danger">Please Enter Beneficiary Name</span></div></div><div class="col-sm-6 col-md-6"><div class="form-group bankName_group_edit"><label for="">Name of Bank</label><input type="text" value="" class="form-control bank_nm_edit" placeholder="Bank name" name="billingentity_bank_name[]"><span class="temp-error display_none text-danger">Please Enter Bank Name</span></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group IFSC_group_edit"><label for="">IFSC Code</label><input type="text" name="billingentity_bank_ifc[]" value="" class="form-control bank_ifsc_edit" placeholder="IFSC Code"><span class="temp-error display_none text-danger">Please Enter IFSC Code</span></div></div><div class="col-sm-6 col-md-6"><div class="form-group account_group_edit"><label for="">Account No</label><input type="text" name="billingentity_bank_accountno[]" value="" class="form-control bank_ano_edit" placeholder="Account no" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"><span class="temp-error display_none text-danger">Please Enter Account No</span></div></div></div><div class="row"><div class="col-md-6"><div class="form-group accounttype_group_edit"><label>Account Type</label><select class="form-control bank_account_type_edit" name="billingentity_bank_accounttype[]" id="edit_billingentity_bank_accounttype'+len+'"><option value="">Select Account Type</option><option value="Saving">Saving</option><option value="Current">Current</option><option value="Cash Credit">Cash Credit</option><option value="Overdraft">Overdraft</option></select><span class="temp-error display_none text-danger">Please Select Account Type</span></div></div><div class="col-md-6"><div class="form-group UPI_group_edit"><label for="">UPI Id</label><input type="text" name="billingentity_bank_upi[]" class="form-control bank_upiId_edit" placeholder="UPI ID"><span class="temp-error display_none text-danger">Please Enter UPI ID</span></div></div></div></div></div>');

        $(".bank_account_type_edit").customA11ySelect();
        
        if (txtVal > 1) {
            $(".main_bank_deatils_edit .newedit .bank_deleteBtn").css("display", "none");
            $(".main_bank_deatils_edit .newedit .bank_deleteBtn").css("display", "inline-block");
            
        }
    }

    len++;
    
    count1++;
    cnt1++;
    $("#totalBankDetails").val(txtVal);

    label_count(txtVal);
}

/*delete panel*/

function delete_panel_edit_old_bk(element, data_id, db_id) {
    
    txtVal = $("#totalBankDetails").val();
    
    if (txtVal >= 1) {
      $.confirm({
            title: 'Warning',
            content: 'Do you want to remove bank details?',
            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
            buttons: {
                Ok: function() {

                  if(db_id){
                      
                      $.ajax({
                        url: "../../client/res/templates/financial_changes/delete_billingentity_bankdetails.php?id=" + db_id,
                        type: "post",
                        async: false,
                        success: function(result) {
                            if (result == 1) {
                                $(element).closest('.newedit').remove();
                                $.confirm({
                                    title: 'Success!',
                                    content: 'Bank details removed successfully!',
                                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                                    buttons: {
                                        Ok: function() {

                                          $(element).closest('.newedit').remove();
                                          txtVal--;
                                          
                                          $("#totalBankDetails").val(txtVal);

                                          label_count(txtVal);

                                          if(txtVal<=1)
                                          {
                                            $(".main_bank_deatils_edit .newedit .bank_deleteBtn").css("display", "none");
                                            
                                          }


                                        }
                                    }
                                });
                            }
                        }
                    });
                  }
                  else {
                    
                    $(element).closest('.newedit').remove();

                    txtVal--;
                    $("#totalBankDetails").val(txtVal);

                    label_count(txtVal);

                    if(txtVal<=1)
                    {
                      $(".main_bank_deatils_edit .newedit .bank_deleteBtn").css("display", "none");
                      
                    }


                  }
                },
                Cancel: function() {
                }
            }
        });


        
    }

}



function delete_panel_edit(element, data_id, db_id) {
    
    txtVal = $("#totalBankDetails").val();
    
    if (txtVal >= 1) {
        $.confirm({
            title: 'Warning',
            content: 'Do you want to remove bank details?',
            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
            buttons: {
                Ok: function() {
                  $(element).closest('.newedit').remove();
                  $.confirm({
                      title: 'Success!',
                      content: 'Bank details removed successfully!',
                      type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                      buttons: {
                          Ok: function() {
                            $(element).closest('.newedit').remove();
                            txtVal--;
                            
                            $("#totalBankDetails").val(txtVal);

                            label_count(txtVal);

                            if(txtVal<=1)
                            {
                              $(".main_bank_deatils_edit .newedit .bank_deleteBtn").css("display", "none");
                              
                            }
                          }
                      }
                  });
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

function add_more_gst_details()

  {
    var len = $(".edit_billingentity_gstdetails").length+1;
    var check = gst_validation_edit();
    if($("#totalGST_count").val()==''){
      var cnt3 = count_1;
      var cnt4 = cnt2;
    }
    else {
      var cnt3 = parseInt($("#totalGST_count").val());
      var cnt4 = parseInt($("#totalGST_count").val()) + 1;
    }

    gstVal = $("#totalGST_count").val();
     
      if (!check) {

        gstVal++;

        $(".GST_details_Panel_edit").append('<div id="edit_billingentity_gstdetails'+count_1+'"  class="GST_added_panel_edit"><div class="row"><div class="col-md-12"><button type="button" class="btn btn-danger GST_deleteBtn pull-right" onclick="delete_gst_panel_edit(this, '+count_1+', 0)"><span class="material-icons-outlined">close</span></button></div></div><div class="row"><div class="col-sm-6 col-md-6"><div class="form-group gst_no_group_edit"><label for="" class="gst_title"></label><input type="text" name="billingentity_gst[]" class="form-control gst_deatils_GST_1_edit" placeholder="GST No" onblur="getGST_state_edit(this.value, '+count_1+')" onchange="GSTChange(this)" ><span class="temp-error display_none text-danger">Please Enter GST NO</span></div></div><div class="col-sm-6 col-md-6"><div class="form-group gst_addr_group_edit"><label>Address</label><input type="text" name="billingEntityGSTAddressStreet[]" class="form-control gst_addr_edit" placeholder="Street" maxlength="56"> <span class="temp-error display_none text-danger">Please Enter Your Address</span></div><div class="row"><div class="col-md-4"style="padding-right: 0px;"><div class="form-group gst_city_group_edit"><input type="text" name="billingEntityGSTAddressCity[]" class="form-control gst_city_edit" placeholder="City"> <span class="temp-error display_none text-danger">Please Enter City</span></div></div><div class="col-md-4"style="padding-right: 0px;"><div class="form-group gst_state_group_edit"><input type="text" class="form-control gst_state_edit" id="gst_state_'+count_1+'" data-id="edit_billingEntityGSTAddressState'+count_1+'" data-name="billingEntityGSTAddressState[]" name="billingEntityGSTAddressState[]" value="" placeholder="State" autocomplete="espo-state" maxlength="255"><span class="temp-error display_none text-danger">Please Enter State</span></div></div><div class="col-md-4"><div class="form-group gst_postal_group_edit"><input type="text" name="billingEntityGSTAddressPostalCode[]" id="GST_Details_postal_code_edit'+count_1+'" class="form-control GST_Details_postal_code_edit gst_postal_code_edit" placeholder="Postal Code" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> <span class="temp-error display_none text-danger">Please Enter Postal Code</span><span class="digit-temp-error display_none text-danger">Please Enter 6 Digit Postal Code</span></div></div></div></div></div></div>');

        var length = $("#totalGST_count").val();

        if (length > 0) {
            $("#main_gst_deatils_edit1 .GST_details_Panel_edit .GST_added_panel_edit").eq(0).find(".GST_deleteBtn").css("display", "inline-block");
        }

    }
    cnt2++;
    cnt3++;
    cnt4++;
    count1++;
    count_1++;

     $("#totalGST_count").val(gstVal);

     gst_label_count(gstVal);


}


/*delete GST Details panel*/

// function delete_gst_panel_edit_bk(element, data_id, db_id) {
//     var length=$("#totalGST_count").val();

//      if (length >= 1) {
//        $.confirm({
//             title: 'Warning',
//             content: 'Do you want to remove GST details?',
//             type: 'dark',
//             typeAnimated: true,
//             buttons: {
//                 Ok: function() {
//                     if(db_id){
//                       $.ajax({
//                           url: "../../client/res/templates/financial_changes/delete_billingentity_gstdetails.php?id=" + db_id,
//                           type: "post",
//                           async: false,
//                           success: function(result) {
//                               var newVal = result.split(",");
//                               if (newVal[0] == 1) {
//                                   $(element).closest(".GST_added_panel_edit").remove();

//                                   $.confirm({
//                                       title: 'Success!',
//                                       content: 'GST details removed successfully!',
//                                       type: 'dark',
//                                       typeAnimated: true,
//                                       buttons: {
//                                           Ok: function() {
//                                             $(element).closest(".GST_added_panel_edit").remove();
//                                             gstVal--;
//                                             gst_label_count(gstVal);

//                                           $("#totalGST_count").val(gstVal);
//                                             if(newVal[1] == 0){
//                                               $("#main_gst_deatils_edit1").hide();
//                                               $("#main_GSTIN_fields_edit1").show();
//                                             }
//                                             $("input[type='radio'][value='No']").prop('checked', true);
//                                           }
//                                       }
//                                   });
//                               }
//                           }
//                       });
//                     }
//                     else {

//                        $(element).closest(".GST_added_panel_edit").remove();

//                        gstVal--;
                       
//                        $("#totalGST_count").val(gstVal);
//                        gst_label_count(gstVal);
//                        $("#main_gst_deatils_edit1").hide();
//                        $("#main_GSTIN_fields_edit1").show();
//                        $("input[type='radio'][value='No']").prop('checked', true);
//                     }
//                 },
//                 Cancel: function() {
//                 }
//             }
//         });
//     } else {
//         $.confirm({
//             title: 'Warning',
//             content: 'Do you want to remove GST details?',
//             type: 'dark',
//             typeAnimated: true,
//             buttons: {
//                 Ok: function() {
//                     if(db_id){
//                       $.ajax({
//                           url: "../../client/res/templates/financial_changes/delete_billingentity_gstdetails.php?id=" + db_id,
//                           type: "post",
//                           async: false,
//                           success: function(result) {
//                               if (result == 1) {
//                                   $(element).closest(".GST_added_panel_edit").remove();

//                                   $("#main_gst_deatils_edit1").hide();
//                                   $("#main_GSTIN_fields_edit1").show();
//                                   $.confirm({
//                                       title: 'Success!',
//                                       content: 'GST details removed successfully!',
//                                       type: 'dark',
//                                       typeAnimated: true,
//                                       buttons: {
//                                           Ok: function() {
//                                             $(element).closest(".GST_added_panel_edit").remove();
//                                             // $("#edit_billingentity_gstdetails"+data_id).remove();
//                                             gstVal--;
//                                             gst_label_count(gstVal);

//                                             $("#main_gst_deatils_edit1").hide();
//                                             $("#main_GSTIN_fields_edit1").show();
//                                             $("input[type='radio'][value='No']").prop('checked', true);
//                                           }
//                                       }
//                                   });
//                               }
//                           }
//                       });
//                     }
//                     else {
//                       $(element).closest(".GST_added_panel_edit").remove();

//                       gstVal--;
                      
//                       $("#main_gst_deatils_edit1").hide();
//                       $("#main_GSTIN_fields_edit1").show();
//                       $("input[type='radio'][value='No']").prop('checked', true);
//                       gst_label_count(gstVal);

//                     }
//                 },
//                 Cancel: function() {
//                 }
//             }
//         });
//     }
// }


// function delete_gst_panel_edit_new(element, data_id, db_id) {

//   var html_val='<div class="GST_added_panel_edit edit_billingentity_gstdetails" id="noRec"><div class="row"><div class="col-md-12"><button type="button" class="btn btn-danger GST_deleteBtn pull-right" onclick="delete_gst_panel_edit(this, 0, 0)" style=""><span class="material-icons-outlined">close</span></button></div></div> <div class="row"><div class="col-sm-6 col-md-6"><div class="form-group gst_no_group_edit"><label for="" class="gst_title">GST 1</label><input type="text" name="billingentity_gst[]" class="form-control gst_deatils_GST_1_edit" placeholder="GST No" onblur="getGST_state_edit(this.value, 0);" onchange="GSTChange(this)"><span class="temp-error display_none text-danger">Please Enter GST NO</span></div></div><div class="col-sm-6 col-md-6"><div class="form-group gst_addr_group_edit"><label >Address</label><input type="text" name="billingEntityGSTAddressStreet[]" class="form-control gst_addr_edit" placeholder="Street" maxlength="56"><span class="temp-error display_none text-danger">Please Enter Your Address</span></div><div class="row"><div class="col-md-4" style="padding-right: 0px;"><div class="form-group gst_city_group_edit"> <input type="text" name="billingEntityGSTAddressCity[]" class="form-control gst_city_edit" placeholder="City" ><span class="temp-error display_none text-danger">Please Enter City</span></div></div><div class="col-md-4" style="padding-right: 0px;"><div class="form-group gst_state_group_edit"><input type="text" class="form-control gst_state_edit" id="gst_state_0" data-id="billingEntityGSTAddressState_0" data-name="billingEntityGSTAddressState[]" name="billingEntityGSTAddressState[]" value="" placeholder="State" autocomplete="espo-state" maxlength="255"> <span class="temp-error display_none text-danger">Please Enter State</span></div></div><div class="col-md-4"><div class="form-group gst_postal_group_edit"><input type="text" name="billingEntityGSTAddressPostalCode[]" class="form-control GST_Details_postal_code_edit gst_postal_code_edit" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><span class="temp-error display_none text-danger">Please Enter Postal Code</span><span class="digit-temp-error display_none text-danger">Please Enter 6 Digit Postal Code</span></div></div> </div></div></div>'
    
//     var length=$("#totalGST_count").val();
    
//     if (length >= 1) {

//       // alert("length in if = > "+length);
//         $.confirm({
//             title: 'Warning',
//             content: 'Do you want to remove GST details?',
//             type: 'dark',
//             typeAnimated: true,
//             buttons: {
//                 Ok: function() {

//                     $(element).closest(".GST_added_panel_edit").remove();
//                     $.confirm({
//                         title: 'Success!',
//                         content: 'GST details removed successfully!',
//                         type: 'dark',
//                         typeAnimated: true,
//                         buttons: {
//                             Ok: function() {
//                               $(element).closest(".GST_added_panel_edit").remove();
//                               // gstVal--;

//                               var g=$("#totalGST_count").val();

//                               g--;

//                               gst_label_count(g);
//                               $("#totalGST_count").val(g);

//                               if($("#totalGST_count").val()<=0)
//                               {
//                                 $("#totalGST_count").val(0);
//                                 $("#main_gst_deatils_edit1").hide();
//                                 $("#main_GSTIN_fields_edit1").show();
//                                 $("input[type='radio'][value='No']").prop('checked', true);
//                                 $(".GST_details_Panel_edit").append(html_val);
//                               }
                              
//                             }
//                         }
//                     });
//                 },
//                 Cancel: function() {
//                 }
//             }
//         });
//     } else {
//         $.confirm({
//             title: 'Warning',
//             content: 'Do you want to remove GST details?',
//             type: 'dark',
//             typeAnimated: true,
//             buttons: {
//                 Ok: function() {
//                     $("#edit_billingentity_gstdetails"+data_id).remove();
//                     $.confirm({
//                         title: 'Success!',
//                         content: 'GST details removed successfully!',
//                         type: 'dark',
//                         typeAnimated: true,
//                         buttons: {
//                             Ok: function() {
//                                 $(element).closest(".GST_added_panel_edit").remove();
//                                 // gstVal--;

//                                 var g=$("#totalGST_count").val();

//                                 g--;

//                                 gst_label_count(g);
//                                  // alert(gstVal);
//                                  $("#totalGST_count").val(g);

//                                   if($("#totalGST_count").val()<=0)
//                                   {
//                                     $("#totalGST_count").val(0);
//                                     $("#main_gst_deatils_edit1").hide();
//                                     $("#main_GSTIN_fields_edit1").show();
//                                     $("input[type='radio'][value='No']").prop('checked', true);
//                                     $(".GST_details_Panel_edit").append(html_val);
//                                   }

//                              }
//                         }
//                     });
//                 },
//                 Cancel: function() {
//                 }
//             }
//         });
//     }


// }


function delete_gst_panel_edit(element, data_id, db_id) {

  var html_val='<div class="GST_added_panel_edit edit_billingentity_gstdetails" id="noRec"><div class="row"><div class="col-md-12"><button type="button" class="btn btn-danger GST_deleteBtn pull-right" onclick="delete_gst_panel_edit(this, 0, 0)" style=""><span class="material-icons-outlined">close</span></button></div></div> <div class="row"><div class="col-sm-6 col-md-6"><div class="form-group gst_no_group_edit"><label for="" class="gst_title">GST 1</label><input type="text" name="billingentity_gst[]" class="form-control gst_deatils_GST_1_edit" placeholder="GST No" onblur="getGST_state_edit(this.value, 0);" onchange="GSTChange(this)"><span class="temp-error display_none text-danger">Please Enter GST NO</span></div></div><div class="col-sm-6 col-md-6"><div class="form-group gst_addr_group_edit"><label >Address</label><input type="text" name="billingEntityGSTAddressStreet[]" class="form-control gst_addr_edit" placeholder="Street" maxlength="56"><span class="temp-error display_none text-danger">Please Enter Your Address</span></div><div class="row"><div class="col-md-4" style="padding-right: 0px;"><div class="form-group gst_city_group_edit"> <input type="text" name="billingEntityGSTAddressCity[]" class="form-control gst_city_edit" placeholder="City" ><span class="temp-error display_none text-danger">Please Enter City</span></div></div><div class="col-md-4" style="padding-right: 0px;"><div class="form-group gst_state_group_edit"><input type="text" class="form-control gst_state_edit" id="gst_state_0" data-id="billingEntityGSTAddressState_0" data-name="billingEntityGSTAddressState[]" name="billingEntityGSTAddressState[]" value="" placeholder="State" autocomplete="espo-state" maxlength="255"> <span class="temp-error display_none text-danger">Please Enter State</span></div></div><div class="col-md-4"><div class="form-group gst_postal_group_edit"><input type="text" name="billingEntityGSTAddressPostalCode[]" class="form-control GST_Details_postal_code_edit gst_postal_code_edit" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><span class="temp-error display_none text-danger">Please Enter Postal Code</span><span class="digit-temp-error display_none text-danger">Please Enter 6 Digit Postal Code</span></div></div> </div></div></div>'
    
    var length=$("#totalGST_count").val();
    
    if (length >=1) {
      $.confirm({
            title: 'Warning',
            content: 'Do you want to remove GST details?',
           type: 'dark',
                   typeAnimated: true,
                   draggable: false,
            buttons: {
                Ok: function() {

                    $.confirm({
                        title: 'Success!',
                        content: 'GST details removed successfully!',
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                        buttons: {
                            Ok: function() {

                              if($("#totalGST_count").val()==1)
                              {
                                $("#totalGST_count").val(0);
                                $("#main_gst_deatils_edit1").hide();
                                $("#main_GSTIN_fields_edit1").show();
                                $(element).closest(".GST_added_panel_edit").remove();
                                $("input[type='radio'][value='No']").prop('checked', true);
                                $(".GST_details_Panel_edit").append(html_val);
                              }
                              else if($("#totalGST_count").val()>1)
                              {
                               $(element).closest(".GST_added_panel_edit").remove();
                              }
                              gstVal--;
                              gst_label_count(gstVal);
                              $("#totalGST_count").val(gstVal);
                              
                            }
                        }
                    });
                },
                Cancel: function() {
                }
            }
        });
    } else {
        $.confirm({
            title: 'Warning',
            content: 'Do you want to remove GST details?',
            type: 'dark',
                   typeAnimated: true,
                   draggable: false,
            buttons: {
                Ok: function() {
                    $("#edit_billingentity_gstdetails"+data_id).remove();
                    $.confirm({
                        title: 'Success!',
                        content: 'GST details removed successfully!',
                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                        buttons: {
                            Ok: function() {

                                $(element).closest(".GST_added_panel_edit").remove();
                                gstVal--;
                                gst_label_count(gstVal);
                                 
                                 if($("#totalGST_count").val()<=0)
                                  {
                                    $("#totalGST_count").val(0);
                                    $("#main_gst_deatils_edit1").hide();
                                    $("#main_GSTIN_fields_edit1").show();
                                    $("input[type='radio'][value='No']").prop('checked', true);
                                    $(".GST_details_Panel_edit").append(html_val);
                                  }

                             }
                        }
                    });
                },
                Cancel: function() {
                }
            }
        });
    }


}







</script>


<script type = "text/javascript" >

$(".bank_account_type_edit").customA11ySelect();

</script>

<script >

function GSTChange(element)
  {    
        // var inputvalues = $(this).val();
        var inputvalues = $(element).val();
        // alert(inputvalues);
        var gstinformat = new RegExp('^[0-9]{2}[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}[1-9A-Za-z]{1}[Zz][0-9A-Za-z]{1}$');
        if (gstinformat.test(inputvalues)) {
            return true;
        } else {
            $.alert({
                title: 'Warning!',
                content: 'Please Enter Valid GSTIN Number',
                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
            });
            // $(this).val('');
            $(element).val('');
            $(".gst_deatils_GST_1_edit").focus();
            $(element).closest(".GST_added_panel_edit").find(".gst_state_edit").val("");
        }
  }

  
 $(document).on('change', ".overview_postal_code_edit", function() 
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
</script>

<script type="text/javascript">
   

$(document).on("keyup",".name_edit",function() {

      if ($(this).val().length > 0) 
      {
          $(".name_group .temp-error").addClass("display_none");
          $(".name_group").removeClass("has-error");
      } 
      else 
      {
          $(".name_group .temp-error").removeClass("display_none");
          $(".name_group").addClass("has-error");
      }

});

var gstinformat_invoice = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}$');

$(document).on('keyup', ".overview_panno_edit", function(e) {


    var inputvalues_invoice = $(".overview_panno_edit").val().toUpperCase();

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

$(document).on('keyup', ".email_edit", function(e) {

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


$(document).on('keyup', ".beneficiary_nm_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");

});

$(document).on('keyup', ".bank_ifsc_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});

$(document).on('keyup', ".bank_nm_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});

$(document).on('keyup', ".bank_ano_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});

$(document).on('keyup', ".gst_no_group_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});

$(document).on('keyup', ".gst_addr_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});

$(document).on('keyup', ".gst_city_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
});


$(document).on('keyup', ".gst_postal_code_edit", function(e) {


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

$(document).on('change', ".bank_account_type_edit", function(e) {

    $(this).closest(".form-group").find(".temp-error").addClass("display_none");
    $(this).closest(".form-group").removeClass("has-error");
    $(this).closest(".form-group .custom-a11yselect-btn").removeClass("form-control");
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

    // var Current = $(".main_bank_deatils_edit .panel-body .editbankdetails");
    var Current = $(".main_bank_deatils_edit .newedit");

    var beneficiary_nm = Current.eq(p).find(".beneficiary_nm_edit").val();
    var bank_ifsc = Current.eq(p).find(".bank_ifsc_edit").val();
    var accountType = Current.eq(p).find(".accounttype_group_edit .custom-a11yselect-menu .custom-a11yselect-selected").attr('data-val');
    var bank_nm = Current.eq(p).find('.bank_nm_edit').val();
    var accountNo = Current.eq(p).find('.bank_ano_edit').val();
    var UPI_Id = Current.eq(p).find('.bank_upiId_edit').val();

    // console.log('check_empty_fields_edit === C_name = '+C_name+ 'C_overview_panno = ' +C_overview_panno+ 'beneficiary_nm = ' +beneficiary_nm+ 'bank_ifsc  = ' +bank_ifsc+ 'accountType =' +accountType+ 'bank_nm =' +bank_nm+ 'accountNo =' +accountNo);

    $check_empty = false;

    // name and pan no validation

    if (C_name != "" && C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == true && beneficiary_nm != "" && bank_ifsc != "" && accountType != "" && bank_nm != "" && accountNo != "") {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");
        $(".name_group,.pan_no_group").removeClass("has-error");

        $check_empty = false;

        if (C_email != "") {
            if (email_reg.test($(".email_edit").val().toLowerCase()) == true) {
                $(".email_group .temp-error,.email_group .Invalid-temp-error").addClass("display_none");
                $(".email_group").removeClass("has-error");
                $check_empty = false;
            } else {
                $check_empty = true;
            }
        }

    } else {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");
         $(".name_group,.pan_no_group").removeClass("has-error");
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
            Current.eq(p).find(".Beneficiary_group_edit .temp-error").removeClass("display_none");
            Current.eq(p).find(".Beneficiary_group_edit").addClass("has-error");
        }

        if (bank_ifsc == "") {
            Current.eq(p).find(".IFSC_group_edit .temp-error").removeClass("display_none");
            Current.eq(p).find(".IFSC_group_edit").addClass("has-error");
        }

        if (accountType == "") {
            Current.eq(p).find(".accounttype_group_edit .temp-error").removeClass("display_none");
            Current.eq(p).find(".accounttype_group_edit").addClass("has-error");
            Current.eq(p).find(".accounttype_group_edit .custom-a11yselect-btn").addClass("form-control");
        }

        if (bank_nm == "") {
            Current.eq(p).find(".bankName_group_edit .temp-error").removeClass("display_none");
            Current.eq(p).find(".bankName_group_edit").addClass("has-error");
        }

        if (accountNo == "") {
            Current.eq(p).find(".account_group_edit .temp-error").removeClass("display_none");
            Current.eq(p).find(".account_group_edit").addClass("has-error");
        
        }

    }
    return $check_empty;
}

// called on add more of bank details

function validation_edit() {

    var p_body_length_edit = $("#totalBankDetails").val();

    var $addMore = "";

    var flag = 0;

    for (var p = 0; p < p_body_length_edit; p++) {
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
    var C_overview_panno = $(".overview_panno_edit").val().toUpperCase();
    
    var Current = $(".main_bank_deatils_edit .newedit");

    // var Current =$(".main_bank_deatils_edit .panel-body .editbankdetails");

    var beneficiary_nm = Current.eq(p).find(".beneficiary_nm_edit").val();
    var bank_ifsc = Current.eq(p).find(".bank_ifsc_edit").val();
    var accountType = Current.eq(p).find(".accounttype_group_edit .custom-a11yselect-menu .custom-a11yselect-selected").attr('data-val');
    var bank_nm = Current.eq(p).find('.bank_nm_edit').val();
    var accountNo = Current.eq(p).find('.bank_ano_edit').val();
    
    // console.log("for_empty_bank_details_check_edit  =  ======  "+" "+p+" "+'C_name = '+C_name+ 'C_overview_panno = ' +C_overview_panno+ 'beneficiary_nm = ' +beneficiary_nm+ 'bank_ifsc  = ' +bank_ifsc+ 'accountType =' +accountType+ 'bank_nm =' +bank_nm+ 'accountNo =' +accountNo);

    $check_empty = false;

    // name and pan no validation

    if (C_name != "" && C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == true) {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");
        $(".name_group,.pan_no_group").removeClass("has-error");
        Current.eq(p).find(".temp-error").addClass("display_none");
        Current.eq(p).find(".form-group").removeClass("has-error");
        
        $check_empty = false;

        // email validation

        if (C_email != "" && beneficiary_nm == "" && bank_ifsc == "" && accountType == "" && bank_nm == "" && accountNo == "") {

            Current.eq(p).find(".temp-error").addClass("display_none");
            Current.eq(p).find(".form-group").removeClass("has-error");

            if (email_reg.test($(".email_edit").val().toLowerCase()) == true) {
                $(".email_group .temp-error,.email_group .Invalid-temp-error").addClass("display_none");
                $(".email_group").removeClass("has-error");
                $check_empty = false;
            } else {
                $check_empty = true;
            }

        } else if (C_email == "" && (beneficiary_nm != "" || bank_ifsc != "" || accountType != "" || bank_nm != "" || accountNo != "")) {

            $check_empty = true;

            if (beneficiary_nm == "") {
                Current.eq(p).find(".Beneficiary_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".Beneficiary_group_edit").addClass("has-error");
            }

            if (bank_ifsc == "") {
                Current.eq(p).find(".IFSC_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".IFSC_group_edit").addClass("has-error");
            }

            if (accountType == "") {
                Current.eq(p).find(".accounttype_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".accounttype_group_edit").addClass("has-error");
                Current.eq(p).find(".accounttype_group_edit .custom-a11yselect-btn").addClass("form-control");
            }

            if (bank_nm == "") {
                Current.eq(p).find(".bankName_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".bankName_group_edit").addClass("has-error");
            }

            if (accountNo == "") {
                Current.eq(p).find(".account_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".account_group_edit").addClass("has-error");
            }

            if (beneficiary_nm != "" && bank_ifsc != "" && accountType != "" && bank_nm != "" && accountNo != "")
            {
                Current.eq(p).find(".temp-error").addClass("display_none");
                Current.eq(p).find(".form-group").removeClass("has-error");
                $check_empty = false;
            }

        } else if (C_email != "" && (beneficiary_nm != "" || bank_ifsc != "" || accountType != "" || bank_nm != "" || accountNo != "")) {

            $check_empty = true;

            if (email_reg.test($(".email_edit").val().toLowerCase()) == false) {
                $(".email_group .Invalid-temp-error").removeClass("display_none");
                $(".email_group").addClass("has-error");
            }

            if (beneficiary_nm == "") {
                Current.eq(p).find(".Beneficiary_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".Beneficiary_group_edit").addClass("has-error");
            }

            if (bank_ifsc == "") {
                Current.eq(p).find(".IFSC_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".IFSC_group_edit").addClass("has-error");
            }

            if (accountType == "") {
                Current.eq(p).find(".accounttype_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".accounttype_group_edit").addClass("has-error");
                Current.eq(p).find(".accounttype_group_edit .custom-a11yselect-btn").addClass("form-control");
            }

            if (bank_nm == "") {
                Current.eq(p).find(".bankName_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".bankName_group_edit").addClass("has-error");
            }

            if (accountNo == "") {
                Current.eq(p).find(".account_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".account_group_edit").addClass("has-error");
            }

            if (beneficiary_nm != "" && bank_ifsc != "" && accountType != "" && bank_nm != "" && accountNo != "" && email_reg.test($(".email_edit").val().toLowerCase()) == true) {
                $(".email_group .temp-error,.email_group .Invalid-temp-error").addClass("display_none");
                $(".email_group,.email_group").removeClass("has-error");
                Current.eq(p).find(".temp-error").addClass("display_none");
                Current.eq(p).find(".form-group").removeClass("has-error");
                $check_empty = false;
            }
        }
    } else {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");
        $(".name_group,.pan_no_group").removeClass("has-error");

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


        if(beneficiary_nm != "" || bank_ifsc != "" || accountType != "" || bank_nm != "" || accountNo != "")
        {
            if (beneficiary_nm == "") {
                Current.eq(p).find(".Beneficiary_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".Beneficiary_group_edit").addClass("has-error");
            }

            if (bank_ifsc == "") {
                Current.eq(p).find(".IFSC_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".IFSC_group_edit").addClass("has-error");
            }

            if (accountType == "") {
                Current.eq(p).find(".accounttype_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".accounttype_group_edit").addClass("has-error");
                Current.eq(p).find(".accounttype_group_edit .custom-a11yselect-btn").addClass("form-control");
            }

            if (bank_nm == "") {
                Current.eq(p).find(".bankName_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".bankName_group_edit").addClass("has-error");
            }

            if (accountNo == "") {
                Current.eq(p).find(".account_group_edit .temp-error").removeClass("display_none");
                Current.eq(p).find(".account_group_edit").addClass("has-error");
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

function onSaveCheckFields_edit() {

    var p_body_length =$("#totalBankDetails").val();

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
    var C_overview_panno = $(".overview_panno_edit").val().toUpperCase();
    
    var current = $(".GST_details_Panel_edit .GST_added_panel_edit");
    
    // gst values

    var gst_no = current.eq(g).find(".gst_deatils_GST_1_edit").val();
    var gst_addr = current.eq(g).find(".gst_addr_edit").val();
    var gst_city = current.eq(g).find(".gst_city_edit").val();
    var gst_state = current.eq(g).find(".gst_state_edit").val();
    var gst_code = current.eq(g).find(".gst_postal_code_edit").val();
    
    $gst_chek_empty = false;

    // alert("For "+g+" "+C_name+"=== "+C_overview_panno+"=== "+gst_no+"=== "+gst_addr+"=== "+gst_city+"=== "+gst_state+"=== "+gst_code);

    if (C_name != "" && C_overview_panno != "" && gstinformat_invoice.test(C_overview_panno) == true && gst_no != "" && gst_addr != "" && gst_city != "" && gst_state != "" && gst_code != "" && gst_code.length==6) {

        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");
        $(".name_group,.pan_no_group").removeClass("has-error");

        $gst_chek_empty = false;

        current.eq(g).find(".temp-error,.digit-temp-error").addClass("display_none");
        current.eq(g).find(".form-group").removeClass("has-error");
    } else {
        $(".name_group .temp-error,.pan_no_group .temp-error,.pan_no_group .Invalid-temp-error").addClass("display_none");
        $(".name_group,.pan_no_group").removeClass("has-error");
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
            current.eq(g).find(".gst_no_group_edit .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_no_group_edit").addClass("has-error");
        }

        if (gst_addr == "") {
            current.eq(g).find(".gst_addr_group_edit .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_addr_group_edit").addClass("has-error");
        }

        if (gst_city == "") {
            current.eq(g).find(".gst_city_group_edit .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_city_group_edit").addClass("has-error");
        }

        if (gst_state == "") {
            current.eq(g).find(".gst_state_group_edit .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_state_group_edit").addClass("has-error");
        }

        if (gst_code == "") {
            current.eq(g).find(".gst_postal_group_edit .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_postal_group_edit .digit-temp-error").addClass("display_none");
            current.eq(g).find(".gst_postal_group_edit").addClass("has-error");
        }

        if (gst_code != "" && gst_code.length!=6) {
            current.eq(g).find(".gst_postal_group_edit .temp-error").addClass("display_none");
            current.eq(g).find(".gst_postal_group_edit .digit-temp-error").removeClass("display_none");
            current.eq(g).find(".gst_postal_group_edit").addClass("has-error");
        }
    }
    
    return $gst_chek_empty;

}

//  Called On GST hTml append


function gst_validation_edit() {

    var gst_len =$("#totalGST_count").val();

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
    var gst_state = current.eq(g).find(".gst_state_edit").val();
    var gst_code = current.eq(g).find(".gst_postal_code_edit").val();

    // alert(gst_no+"=== "+gst_addr+"=== "+gst_city+"=== "+gst_state+"=== "+gst_code);

    $gst_chek_empty = false;

    if (gst_no != "" || gst_addr != "" || gst_city != "" || gst_state != "" || gst_code != "") {

        $gst_chek_empty = true;

        if (gst_no == "") {
           current.eq(g).find(".gst_no_group_edit .temp-error").removeClass("display_none");
           current.eq(g).find(".gst_no_group_edit").addClass("has-error");
        }

        if (gst_addr == "") {
            current.eq(g).find(".gst_addr_group_edit .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_addr_group_edit").addClass("has-error");
        }

        if (gst_city == "") {
            current.eq(g).find(".gst_city_group_edit .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_city_group_edit").addClass("has-error");
        }

        if (gst_state == "") {
            current.eq(g).find(".gst_state_group_edit .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_state_group_edit").addClass("has-error");
        }

        if (gst_code == "") {
            current.eq(g).find(".gst_postal_group_edit .temp-error").removeClass("display_none");
            current.eq(g).find(".gst_postal_group_edit").addClass("has-error");
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


function onSaveGstCheckFields_edit() {

    var gst_len = $("#totalGST_count").val();

    var $empty1 = "",
        $empty2 = "",
        f = 0;

    for (var g = 0; g < gst_len; g++) {
        if (g < gst_len - 1) {

         $empty1 = gst_check_empty_fields_edit(g);
            if (f == 0 && $empty1 == true) {
                f = 1;
            }
        }
        if (g == gst_len - 1) {
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


   function saveButtonFun()
    {
    var radioValue = $("#GSTIN_fields_edit input[name='optradio']:checked").val();

    var bank_check = onSaveCheckFields_edit();

    var gst_check ="";

    gst_check = onSaveGstCheckFields_edit();
    // console.log("In save Button = > "+bank_check+" "+gst_check);

    if ((bank_check == false && gst_check == false)) {

      var formdata=$('#updateBillingEntityForm');
      form      = new FormData(formdata[0]);

      $(".main_bank_deatils_edit .newedit .temp-error").addClass("display_none");

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
                content: 'Details updated successfully!',
                type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                buttons: {
                Ok: function () {
                  $('button[data-action="reset"]').trigger('click');
                  $(function () {
                    $('#edit_billingentityModal').modal('toggle');
                  });

                  $('#updateBillingEntityForm')[0].reset();
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
  function getGST_state_edit(stCode, id){

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
            $("#gst_state_"+id).val(obj[0][stCode]);
            $("#gst_state_"+id).next().closest('span').addClass("display_none");
          }
          else{
            $("#gst_state_"+id).val('');
          }

          return true;
        }
        else {
          $.alert({
              title: 'Warning!',
              content: 'Please Enter Valid GSTIN Number for test',
              type: 'dark',
                   typeAnimated: true,
                   draggable: false,
          });
          $("#gst_state_"+id).val('');
          $("#gst_state_"+id).focus();
        }
      }
  }


  function radio_check(radio_btn_value){

    // alert(radio_btn_value);
    
    if (radio_btn_value == "Yes") {
        $("#main_GSTIN_fields_edit1").hide();
        $("#main_gst_deatils_edit1").show();

        $(".GST_added_panel_edit input").val("");

        $(".GST_added_panel_edit .digit-temp-error,.GST_added_panel_edit .temp-error").addClass("display_none");

        $("#totalGST_count").val(1);
        gst_label_count($("#totalGST_count").val());

        // $("#totalBankDetails").val(txtVal);
    }
    else {
        $(".GST_details_Panel_edit .GST_added_panel_edit .temp-error").addClass("display_none");
        $("#main_gst_deatils_edit1").hide();
        $("#main_GSTIN_fields_edit1").show();
        $(".GST_details_Panel_edit").show();
        $(".GST_added_panel_edit").show();


    }
  }


function checkAccountType(n1,n2)
{
  for(var n=0;n<n2;n++)
  {
    $(".accounttype_group_edit .custom-a11yselect-menu li[data-val='"+n1+"']").addClass("custom-a11yselect-selected");
  }
}


</script>
<!-- Get state name automatically from GST number -->
<!-- BILLING ENTITY SCRIPTS ENDS HERE -->


<!-- ESTIMATE SCRIPTS STARTS HERE -->
<script>
// $("#estimate_send_mail").on('hide.bs.modal', function(){
$(document).on('click',"#estimate_send_mail .close", function(){
            $('#sendEstimateEmail .form-group').removeClass('has-success');
            $('#sendEstimateEmail .form-group').removeClass('has-error');
            $('#sendEstimateEmail').bootstrapValidator('resetForm', true);
        });

  // Validation of popup form for estimate email
  $(document).on("click", "#sendEstimateEmailBtn", function(){
      $("#sendEstimateEmail").bootstrapValidator({
        fields: {
            estimate_to: {
                validators: {
                    notEmpty: {
                        message: 'To field is required'
                    },
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    }
                }
            }
        },
      }).on('error.form.bv', function (e) {
          e.preventDefault();

          // prevent form submission if preventDefault() not working
          $('#sendEstimateEmail').submit(false);

          // other validation error handlings
          $("#sendEstimateEmailBtn").removeAttr("disabled");

     }).on('success.form.bv', function (event, data) {
          var recordId = $("#estimate_recordId").val();
          event.stopImmediatePropagation();
          event.preventDefault();

          var estimate_subject = document.getElementById('estimate_subject').value;
          if(!estimate_subject)
          {
            $.alert({
              title: 'Alert!',
              content: "Do you want to send estimate without any subject?",
              type: 'dark',
                   typeAnimated: true,
                   draggable: false,
              buttons: {
                OK: function () {
                    submit_estimate();
                },
                CANCEL: function(){
                  document.getElementById("estimate_subject").focus();
                  document.getElementById("sendEstimateEmailBtn").disabled = false;
                },
                
              }
            });
          }
          else {
            submit_estimate();
          }
      });
  });

  function submit_estimate()
  {
      var formdata= $('#sendEstimateEmail');
      form      = new FormData(formdata[0]);

      // url     : "../../client/res/templates/financial_changes/send_estimate_mail.php",
      $.ajax({
        type    : "POST",
        url     : "../../pdf/estimate.php",
        data    : form,
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            if(data == 1)
            {
                $("#sendEstimateEmailBtn").removeAttr("disabled"); 
                $('#estimate_send_mail').modal("hide");
                $('#estimateForm')[0].reset();
                // $('#estimate_send_mail_success').modal();
                $.confirm({
                    title: 'Success!',
                    content: "Mail sent successfully.",
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                    buttons: {
                        Ok: function () {
                            // $('#estimate_send_mail_success').modal();
                        }
                    }
                });
            }
            else
            {
              $("#estimate_to").val("");
              $("#estimate_cc").val("");
              $("#estimate_subject").val("");
              $("#estimate_mail_body").val("");
              $("#sendEstimateEmail").hide();
              $(".modal-content").hide();
              // $("#estimate_send_email_form").append("<h6 id='err_message'>Email not send</h6>");
              $.alert({
                  title: 'Alert!',
                  content: 'Email not send, please try again',
                  type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                  buttons: {
                      ok: function() {
                          $("#sendEstimateEmailBtn").removeAttr("disabled"); 
                          $('#estimate_send_mail').modal("hide");
                          $('#estimateForm')[0].reset();
                      }
                  }
              });
            }
        }
      });
      return false;
  }

  function validateEstimateMultipleEmailsCommaSeparated(e) {
    var toestimate_email = e.value;
    if(toestimate_email)
    {
      var estimate_result = toestimate_email.split(',');
      if(estimate_result.length >= 6)
      {
        $("#estimate_emailToMaxFive").css('display','block');
        document.getElementById("sendEstimateEmailBtn").disabled = false;
        return false;  
      }
      else
      {
        $("#estimate_emailToMaxFive").css('display','none');
        document.getElementById("sendEstimateEmailBtn").disabled = false;
        //return true;
      }
      for(var i = 0;i < estimate_result.length;i++)
      if(!validateEmail(estimate_result[i])) 
      {
        $("#estimate_emailerror").css('display','block');
        document.getElementById("sendEstimateEmailBtn").disabled = false;
        return false;
      }
      $("#estimate_emailerror").css('display','none');
      document.getElementById("sendEstimateEmailBtn").disabled = false;
      return true;
    }
    else
    {
      $("#estimate_emailerror").css('display','none');
    }
  }

  function validateEstimateFrom(e) {
    var fromestimate_email = e.value;
    if(fromestimate_email)
    {
      if(!validateEmail(fromestimate_email)) 
      {
        $("#estimate_fromemailerror").css('display','block');
        document.getElementById("sendEstimateEmailBtn").disabled = false;
        return false;
      }
      $("#estimate_fromemailerror").css('display','none');
      document.getElementById("sendEstimateEmailBtn").disabled = false;
      return true;
    }
    else
    {
      $("#estimate_fromemailerror").css('display','none');
    }
  }

  function validateEstimateMultipleEmailsCcCommaSeparated(e) {
    var toestimate_email = e.value;;
    //   alert(toemail);
    if(toestimate_email)
    {
      var estimate_result = toestimate_email.split(',');
      if(estimate_result.length >= 6)
      {
        $("#estimate_emailCcMaxFive").css('display','block');
        document.getElementById("sendEstimateEmailBtn").disabled = false;
        return false;  
      }
      else
      {
        $("#estimate_emailCcMaxFive").css('display','none');
        document.getElementById("sendEstimateEmailBtn").disabled = false;
      }
      for(var i = 0;i < estimate_result.length;i++)
      if(!validateEmail(estimate_result[i])) 
      {
        $("#estimate_emailccerror").css('display','block');
        document.getElementById("sendEstimateEmailBtn").disabled = false;
        return false;
      }
      $("#estimate_emailccerror").css('display','none');
      document.getElementById("sendEstimateEmailBtn").disabled = false;
      return true;
    }
    else
    {
      $("#estimate_emailccerror").css('display','none');
    }
  }
</script>
<!-- ESTIMATE SCRIPTS ENDS HERE -->

 <!-- BILLING ENTITY SCRIPTS ENDS HERE -->



<!-- ESTIMATE SCRIPTS START HERE -->
<!-- Accept Estimate Script Start here -->

<script type="text/javascript">
    $('.action[data-action=Accept]').unbind().click(function(){
        var dataId = $(this).data("id");
        $.confirm({
            title: '',
            content: '<div style="font-size:18px;margin-bottom:10px;">Are you sure you want to accept this estimate?</div>' +
                '<form id="accept_Estimate" action="" class="survey" autocomplete="off">' +
                '<div class="form-group">' +
                '<label><b style="color:#000;">Comments</b></label>' +
                '<textarea name="comment" id="comment" type="text" placeholder="Comment here..." class="form-control"></textarea>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Yes',
                    btnClass: 'btn-dark text-capitalize',
                    action: function(){
                        $.ajax({
                            type: "GET",
                            url: "../../../../client/res/templates/financial_changes/Accept_Estimate.php",
                            data: {dataId:dataId,comment: $("#comment").val()},
                            success: function (data){
                                if(data)
                                {
                                    $.confirm({
                                        title: 'Success!',
                                        content: "Estimate accepted successfully!",
                                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                                        buttons: {
                                            Ok: function (){
                                                $('button[data-action="reset"]').trigger('click');
                                            }
                                        }
                                    });
                                }
                                
                            }
                        });
                    }
                },
                formCancel: {
                  text: 'No', 
                  btnClass: 'btn-default text-capitalize',
                action: function() {
                }
              }
            }
        })
    });
</script>
<!-- Accept Estimate Script End here -->

<!-- Reject Estimate Script Start here -->

<script type="text/javascript">
    $('.action[data-action=Reject]').unbind().click(function(){
        var dataId = $(this).data("id");
        $.confirm({
            title: '',
            content: '<div style="font-size:18px;margin-bottom:10px;">Are you sure you want to reject this estimate?</div>' +
                '<form id="reject_Estimate" action="" class="survey" autocomplete="off">' +
                '<div class="form-group">' +
                '<label><b style="color:#000;">Comments</b></label>' +
                '<textarea name="comment1" id="comment1" type="text" placeholder="Comment here..." class="form-control"></textarea>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Yes',
                    btnClass: 'btn-dark text-capitalize',
                    action: function(){
                        $.ajax({
                            type: "GET",
                            url: "../../../../client/res/templates/financial_changes/Reject_Estimate.php",
                            data: {dataId:dataId,comment: $("#comment1").val()},
                            success: function (data){
                                if(data)
                                {
                                    $.confirm({
                                        title: 'Success!',
                                        content: "Estimate rejected successfully!",
                                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                                        buttons: {
                                            Ok: function (){
                                                // window.location.reload();
                                                $('button[data-action="reset"]').trigger('click');
                                            }
                                        }
                                    });
                                }
                                
                            }
                        });
                    }
                },
                formCancel: {
                  text: 'No', 
                  btnClass: 'btn-default text-capitalize',
                action: function() {
                }
              }
            }
        })
    });
</script>
<!-- Reject Estimate Script End here -->

<!-- View Estimate Script Start here -->
<script type="text/javascript">
    $('.action[data-action=View_estimate]').unbind().click(function(){

        $.ajax({
            type : "GET",
            url : "../../../../client/res/templates/financial_changes/estimate_file_upload.php",
            dataType : "json",
            data : { methodName: "estimate_deleteFolder"},

            success: function(data)
            {
            }
        });

        var dataId = $(this).data("id");
        // alert(dataId);
        $.ajax({
            type: "GET",
            url: "../../../../client/res/templates/financial_changes/View_Estimate.php",
            data: {dataId:dataId},
            success: function (data){

                $(".viewEstimateForm").html(data);
                $("#view_Modal").modal();   
                $("#view_Modal .custom-a11yselect-btn").prop('disabled','disabled');  
                $("#view_Modal .custom-a11yselect-btn").css('background-color','#eee');  
                $("#view_Modal .custom-a11yselect-icon.icon-carrat-down").hide();


              var item_length=$("#edit_total_items").val();
              $(".edit_participantRow .sno span").text("");
              for(var a=0;a<item_length;a++)
              {
                var sno=a+1;
                $(".edit_participantRow .main-group").eq(a).find(".sno span").text(sno);
              } 

              }
        });
    });

    $(document).on("click", "#view_Modal,#estimate_attachments .close", function(){
        $.ajax({
            type : "GET",
            url : "../../../../client/res/templates/financial_changes/estimate_file_upload.php",
            dataType : "json",
            data : { methodName: "estimate_deleteFolder"},

            success: function(data)
            {
            }
        });
    });

    $(document).on("click", "#view_invoiceModal,#invoice_attachments .close", function(){
        $.ajax({
            type : "GET",
            url : "../../../../client/res/templates/financial_changes/invoice_file_upload.php",
            dataType : "json",
            data : { methodName: "deleteFolder"},

            success: function(data)
            {
            }
        });
    });
</script>

<!-- View_Estimate Modal Start -->
<div class="modal fade" id="view_Modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="viewEstimateModal">Estimate</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="viewEstimateForm"></div>
                </div>
            </div>
            <!--modal-body close -->
        </div>
        <!--modal-content close -->
    </div>
    <!--modal-dialog close -->
</div>
<!--View_Estimate modal close -->
<!-- View_Estimate Script End here -->


<!-- View_Comment Script Start here -->

<script type="text/javascript">
    var folder_name = window.location.pathname;
    folder_name.indexOf(1);
    var domain_name=window.location.hostname; 


    var first = window.location.pathname;
    first.indexOf(2);
    first.toLowerCase();
    first = first.split("/")[2]; 

    $('.action[data-action=view_comments]').unbind().click(function(){
        var dataId = $(this).data("id");
        if(first=='portal')
        {    
            $.ajax({
                type: "GET",
                url: "../../../../client/res/templates/financial_changes/View_Comment.php",
                data: {dataId:dataId},
                success: function (result)
                {
                    // console.log(result);
                    $(".commentForm").html(result);
                    $("#estimate_comment").modal({backdrop: 'static', keyboard: false});
                     $('#estimate_comment input[type=file]').customFile();
                    $(".custom-file-upload,.post_btn").css("display","none");


                    var len=result.list_arr.length;
                    // alert(len);return false;
                    ul = $("<ul style='padding-left:0px;'>");      
                    for (var i = 0; i < len; i++)
                    { 

                        var all_postedComments= '<li data-id="" class="list-group-item list-row"><div class="pull-right stream-date-container"> <span class="text-muted small"><span title='+result.list_arr[i].date+'>'+result.list_arr[i].date+'</span></span></div><div class="stream-head-container"><div class="pull-left"> <img class="avatar" width="20" src="../../../../client/res/templates/dailysheet/assets/dist/img/stream.png"></div><div class="stream-head-text-container stream-head-text1"> <span class="text-muted message"><span class="estimate_comments_name">'+result.list_arr[i].user_name+'</span>  Posted</span></div></div><div class="stream-post-container"> <span class="cell cell-post"><div class="complex-text-container" style="max-height: 200px;"><div class="complex-text"><p>'+result.list_arr[i].comment+'</p></div></div> </span></div><div class="stream-attachments-container"><span class="cell cell-attachments">';

                        var split_files=result.list_arr[i].filenames.split(",");
                        var total_files=split_files.length;
                        // alert(total_files);
                        for(var k=0; k<total_files; k++){
                            if(split_files[k]!=""){
                                all_postedComments += '<div class="download_attach" data-estimate_id="'+dataId+'" data-filename="'+split_files[k]+'"><span class="fas fa-paperclip text-soft small"></span> <a >'+split_files[k]+'</a><br/><div>';
                            }
                            
                        }
                        all_postedComments += '</div></span></div></li>';


                        $(".feedback_existing_append").prepend(all_postedComments);
                    }

                    if(len >5){
                        $('#estimate_comment #comment_form .estimate_comments .feedback_existing_append').addClass("feedback_existing_append_height");
                      }
                      else{
                        $('#estimate_comment #comment_form .estimate_comments .feedback_existing_append').removeClass("feedback_existing_append_height");
                      }

                }  
            });
        }
        else
        {
            $.ajax({
                type: "GET",
                url: "../../../../client/res/templates/financial_changes/View_Comment.php",
                data: {dataId:dataId},
                success: function (result)
                {
                    $(".commentForm").html(result.popup_form);
                    $("#estimate_comment").modal({backdrop: 'static', keyboard: false});
                    $('#estimate_comment input[type=file]').customFile();
                    $(".custom-file-upload,.post_btn").css("display","none");

                    var len=result.list_arr.length;
                    // alert(len);return false;

                    ul = $("<ul style='padding-left:0px;'>");      
                    for (var i = 0; i < len; i++)
                    { 
                        var all_postedComments= '<li data-id="" class="list-group-item list-row"><div class="pull-right stream-date-container"> <span class="text-muted small"><span title='+result.list_arr[i].date+'>'+result.list_arr[i].date+'</span></span></div><div class="stream-head-container"><div class="pull-left"> <img class="avatar" width="20" src="../../../../client/res/templates/dailysheet/assets/dist/img/stream.png"></div><div class="stream-head-text-container stream-head-text1"> <span class="text-muted message"><span class="estimate_comments_name">'+result.list_arr[i].user_name+'</span>  Posted</span></div></div><div class="stream-post-container"> <span class="cell cell-post"><div class="complex-text-container" style="max-height: 200px;"><div class="complex-text"><p>'+result.list_arr[i].comment+'</p></div></div> </span></div><div class="stream-attachments-container"><span class="cell cell-attachments">';


                        var split_files=result.list_arr[i].filenames.split(",");
                        var total_files=split_files.length;
                        // alert(total_files);
                        for(var k=0; k<total_files; k++){
                            if(split_files[k]!=""){
                                all_postedComments += '<div class="download_attach" data-estimate_id="'+dataId+'" data-filename="'+split_files[k]+'"><span class="fas fa-paperclip text-soft small"></span> <a >'+split_files[k]+'</a><br/><div>';
                            }
                            
                        }
                        all_postedComments += '</div></span></div></li>';
                        $(".feedback_existing_append").prepend(all_postedComments);
                    }

                    //alert(len);
                      if(len >5){
                        $('#estimate_comment #comment_form .estimate_comments .feedback_existing_append').addClass("feedback_existing_append_height");
                      }
                      else{
                        $('#estimate_comment #comment_form .estimate_comments .feedback_existing_append').removeClass("feedback_existing_append_height");
                      }

                }  
            });
        }

    });
</script>

<!-- View_Comment Modal Start -->
<div class="modal fade" id="estimate_comment" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" style="padding-top:0px;" id="estimate_comment_data">
                <div class="container">
                    <div class="commentForm">
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--View_Comment modal close -->

<!--Get and Append comments onclick post button Start -->
<script type="text/javascript">
$(document).on("change",".feedback-custom-file-upload",function(){
    // alert("on change file");
    event.preventDefault();
    var form_data = $("#comment_form");
    form_data = new FormData(form_data[0]);
    form_data.append('methodName', 'estimate_feedback_file_upload');
    $.ajax({
        type : "POST",
        url : "../../../../client/res/templates/financial_changes/estimate_comment_fileUpload.php",
        dataType : "json",
        data : form_data,
        processData: false,
        contentType: false,
        success: function(data)
        {
        }
    });
});

 function getFileInfo(){

       $fileHtml="";
        var files = $('#feedback_attachment').prop("files");
        // alert(files)
        var names = $.map(files, function(val) { 
          // $(".review_file").append("<p>"+val.name+"</p>");
          var fileName = val.name;
          fileName=fileName.replace(/ /g,"_");  
          $fileHtml= $fileHtml+"<li><div class='col-xs-6'>"+fileName+"</div><div class='col-xs-6'><span class='material-icons-outlined feedback_unlinkFile' data-id='' data-name='"+fileName+"' aria-hidden='true' onclick='feedback_unLinkfile(this);' style='cursor: pointer; font-size: 14px;top: 3px; margin-left: 5px;' >close</span></div></li>";
        
        });
          $(".review_file").append($fileHtml);

    }

    function feedback_unLinkfile(event){
      $(event).closest("li").remove();
      var deleteFile = $(event).closest("span").attr("data-name");
      $.ajax({
        type : "GET",
        url : "../../../../client/res/templates/financial_changes/estimate_comment_fileUpload.php",
        dataType : "json",
        data : { methodName: "estimate_feedback_delete_current_file", deleteFile: deleteFile},

        success: function(data)
        {
          $("#feedback_attachment").val('');
        }
      });
    }

    $(document).on("click", "#user_feedback", function(event){
      $("#comment_form").submit(function(event) {
        $(".review_file").empty();
        event.preventDefault();
        event.stopImmediatePropagation();
        var formdata= $('#comment_form');
        form      = new FormData(formdata[0]);
        jQuery.each(jQuery('#feedback_attachment')[0].files, function(i, file) {
            form.append('feedback_attachment['+i+']', file);
        });
        
        $.ajax({
            url: "../../../../client/res/templates/financial_changes/get_Comment.php",
            type: 'POST',
            dataType  : "json",
            processData : false,
            contentType : false,
            data:form,
            async  : false,
         
            success: function (response) 
            {   
                // console.log(response);

                var len=response.length;
                ul = $("<ul style='padding-left:0px;'>");      
                for (var i = 0; i < len; i++)
                { 
                
                    var post_Comment= '<li data-id="" class="list-group-item list-row"><div class="pull-right stream-date-container"> <span class="text-muted small"><span title='+response[i].date+'>'+response[i].date+'</span></span></div><div class="stream-head-container"><div class="pull-left"> <img class="avatar" width="20" src="../../../../client/res/templates/dailysheet/assets/dist/img/stream.png"></div><div class="stream-head-text-container stream-head-text1"> <span class="text-muted message"><span class="estimate_comments_name">'+response[i].user_name+'</span>  Posted</span></div></div><div class="stream-post-container"> <span class="cell cell-post"><div class="complex-text-container" style="max-height: 200px;"><div class="complex-text"><p>'+response[i].comment+'</p></div></div> </span></div><div class="stream-attachments-container">';
                      if(response[i].filenames!=""){
                       var split_files=response[i].filenames.split(",");
                        var total_files=split_files.length;
                        // alert(total_files);
                        for(var k=0; k<total_files; k++){
                            if(split_files[k]!=""){
                                post_Comment += '<div class="download_attach" data-estimate_id="'+response[i].dataId+'" data-filename="'+split_files[k]+'"><span class="fas fa-paperclip text-soft small"></span> <a >'+split_files[k]+'</a><br/><div>';
                            }
                            
                        }
                      }
                        post_Comment += '</div></span></div></li>';



                    $(".feedback_existing_append").prepend(post_Comment);

                    $(".messanger-text-field").val("");
                    $(".custom-file-upload,.post_btn").css("display","none");
                    $("#selected_files").val("");
                    $("#feedback_attachment").html("");
                }
            }
        });
      });


      var feedback_existing_append_height_btn = $("#estimate_comment #comment_form .panel .feedback_existing_append li").length;

      if(feedback_existing_append_height_btn > 15){
            $('#estimate_comment #comment_form .estimate_comments .feedback_existing_append').addClass("feedback_existing_append_height");
          }
      else{
          $('#estimate_comment #comment_form .estimate_comments .feedback_existing_append').removeClass("feedback_existing_append_height");
        }
    });   
</script>
<!--Get and Append comments onclick post button Start -->
<!--Download attachments Start -->
<script type="text/javascript">
$(document).on("click", ".download_attach", function(event){
        event.preventDefault();
        event.stopImmediatePropagation();

        var est_id = $(this).data("estimate_id");
        var file_names = $(this).data("filename");
        // alert(file_names);
        window.location="../../../../client/res/templates/financial_changes/download_comments.php?est_id="+est_id+"&file_names="+file_names;
});   
</script>
<!--Download attachments End -->

<!-- display post and file attch button script start here -->
<script type="text/javascript">
    $(document).on("click","#feedback",function()
    {
        $(".custom-file-upload,.post_btn").css("display","inline-block");
        $("#selected_files").val("");
        $(".custom-file-upload").val("");
    });
</script>
<!-- display post and file attch button script end here -->

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

    
    
</script>
<!-- convert attach file icon to material icon script end here -->
<!-- View Comment Script End here -->

<!-- INVOICE SCRIPTS START HERE -->
<!-- Accept Invoice Script Start here -->

<script type="text/javascript">
    $('.action[data-action=Accept_invoice]').unbind().click(function(){
        var dataId = $(this).data("id");
        $.confirm({
            title: '',
            content: '<div style="font-size:18px;margin-bottom:10px;">Are you sure you want to accept this invoice?</div>' +
                '<form id="accept_Invoice" action="" class="survey" autocomplete="off">' +
                '<div class="form-group">' +
                '<label><b style="color:#000;">Comments</b></label>' +
                '<textarea name="comment" id="comment" type="text" placeholder="Comment here..." class="form-control"></textarea>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Yes',
                    btnClass: 'btn-dark text-capitalize',
                    action: function(){
                        $.ajax({
                            type: "GET",
                            url: "../../../../client/res/templates/financial_changes/Accept_Invoice.php",
                            data: {dataId:dataId,comment: $("#comment").val()},
                            success: function (data){
                                if(data)
                                {
                                    $.confirm({
                                        title: 'Success!',
                                        content: "Invoice accepted successfully!",
                                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                                        buttons: {
                                            Ok: function (){
                                                $('button[data-action="reset"]').trigger('click');
                                            }
                                        }
                                    });
                                }
                                
                            }
                        });
                    }
                },
                formCancel: {
                  text: 'No', 
                  btnClass: 'btn-default text-capitalize',
                action: function() {
                }
              }
            }
        })
    });
</script>
<!-- Accept Invoice Script End here -->

<!-- Reject Invoice Script Start here -->

<script type="text/javascript">
    $('.action[data-action=Reject_invoice]').unbind().click(function(){
        var dataId = $(this).data("id");
        $.confirm({
            title: '',
            content: '<div style="font-size:18px;margin-bottom:10px;">Are you sure you want to reject this invoice?</div>' +
                '<form id="reject_Invoice" action="" class="survey" autocomplete="off">' +
                '<div class="form-group">' +
                '<label><b style="color:#000;">Comments</b></label>' +
                '<textarea name="comment1" id="comment1" type="text" placeholder="Comment here..." class="form-control"></textarea>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Yes',
                    btnClass: 'btn-dark text-capitalize',
                    action: function(){
                        $.ajax({
                            type: "GET",
                            url: "../../../../client/res/templates/financial_changes/Reject_Invoice.php",
                            data: {dataId:dataId,comment: $("#comment1").val()},
                            success: function (data){
                                if(data)
                                {
                                    $.confirm({
                                        title: 'Success!',
                                        content: "Invoice rejected successfully!",
                                        type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                                        buttons: {
                                            Ok: function (){
                                                // window.location.reload();
                                                $('button[data-action="reset"]').trigger('click');
                                            }
                                        }
                                    });
                                }
                                
                            }
                        });
                    }
                },
                formCancel: {
                  text: 'No', 
                  btnClass: 'btn-default text-capitalize',
                action: function() {
                }
              }
            }
        })
    });
</script>
<!-- Reject Invoice Script End here -->

<script type="text/javascript">
    var folder_name = window.location.pathname;
    folder_name.indexOf(1);
    var domain_name=window.location.hostname; 


    var first = window.location.pathname;
    first.indexOf(2);
    first.toLowerCase();
    first = first.split("/")[2]; 

    $('.action[data-action=View_invoice_comment]').unbind().click(function(){
        var dataId = $(this).data("id");
        if(first=='portal')
        {    
            $.ajax({
                type: "GET",
                url: "../../../../client/res/templates/financial_changes/invoice_View_Comment.php",
                data: {dataId:dataId},
                success: function (result)
                {
                    // console.log(result);
                    $(".invoice_commentForm").html(result);
                    $("#invoice_comment").modal({backdrop: 'static', keyboard: false});
                    $(".custom-file-upload,.post_btn").css("display","none");


                    var len=result.list_arr.length;
                    // alert(len);return false;
                    ul = $("<ul style='padding-left:0px;'>");      
                    for (var i = 0; i < len; i++)
                    { 

                        var all_postedComments= '<li data-id="" class="list-group-item list-row"><div class="pull-right stream-date-container"> <span class="text-muted small"><span title='+result.list_arr[i].date+'>'+result.list_arr[i].date+'</span></span></div><div class="stream-head-container"><div class="pull-left"> <img class="avatar" width="20" src="../../../../client/res/templates/dailysheet/assets/dist/img/stream.png"></div><div class="stream-head-text-container stream-head-text1"> <span class="text-muted message"><span class="invoice_comments_name">'+result.list_arr[i].user_name+'</span>  Posted</span></div></div><div class="stream-post-container"> <span class="cell cell-post"><div class="complex-text-container" style="max-height: 200px;"><div class="complex-text"><p>'+result.list_arr[i].comment+'</p></div></div> </span></div><div class="stream-attachments-container"><span class="cell cell-attachments">';

                        var split_files=result.list_arr[i].filenames.split(",");
                        var total_files=split_files.length;
                        // alert(total_files);
                        for(var k=0; k<total_files; k++){
                            if(split_files[k]!=""){
                                all_postedComments += '<div class="invoice_download_attach" data-invoice_id="'+dataId+'" data-filename="'+split_files[k]+'"><span class="fas fa-paperclip text-soft small"></span> <a >'+split_files[k]+'</a><br/><div>';
                            }
                            
                        }
                        all_postedComments += '</div></span></div></li>';


                        $(".invoice_feedback_existing_append").prepend(all_postedComments);
                    }
                    if(len >5){
                        $('#invoice_comment #invoice_comment_form .invoice_comments .invoice_feedback_existing_append').addClass("feedback_existing_append_height");
                      }
                      else{
                        $('#invoice_comment #invoice_comment_form .invoice_comments .invoice_feedback_existing_append').removeClass("feedback_existing_append_height");
                      }
                }  
            });
        }
        else
        {
            $.ajax({
                type: "GET",
                url: "../../../../client/res/templates/financial_changes/invoice_View_Comment.php",
                data: {dataId:dataId},
                success: function (result)
                {
                    $(".invoice_commentForm").html(result.popup_form);
                    $("#invoice_comment").modal({backdrop: 'static', keyboard: false});
                    $('#invoice_comment input[type=file]').customFile();
                    $(".custom-file-upload,.post_btn").css("display","none");

                    var len=result.list_arr.length;
                    // alert(len);return false;
                    ul = $("<ul style='padding-left:0px;'>");      
                    for (var i = 0; i < len; i++)
                    { 
                        var all_postedComments= '<li data-id="" class="list-group-item list-row"><div class="pull-right stream-date-container"> <span class="text-muted small"><span title='+result.list_arr[i].date+'>'+result.list_arr[i].date+'</span></span></div><div class="stream-head-container"><div class="pull-left"> <img class="avatar" width="20" src="../../../../client/res/templates/dailysheet/assets/dist/img/stream.png"></div><div class="stream-head-text-container stream-head-text1"> <span class="text-muted message"><span class="invoice_comments_name">'+result.list_arr[i].user_name+'</span>  Posted</span></div></div><div class="stream-post-container"> <span class="cell cell-post"><div class="complex-text-container" style="max-height: 200px;"><div class="complex-text"><p>'+result.list_arr[i].comment+'</p></div></div> </span></div><div class="stream-attachments-container"><span class="cell cell-attachments">';


                        var split_files=result.list_arr[i].filenames.split(",");
                        var total_files=split_files.length;
                        // alert(total_files);
                        for(var k=0; k<total_files; k++){
                            if(split_files[k]!=""){
                                all_postedComments += '<div class="invoice_download_attach" data-invoice_id="'+dataId+'" data-filename="'+split_files[k]+'"><span class="fas fa-paperclip text-soft small"></span> <a >'+split_files[k]+'</a><br/><div>';
                            }
                            
                        }
                        all_postedComments += '</div></span></div></li>';
                        $(".invoice_feedback_existing_append").prepend(all_postedComments);
                    }

                    if(len >5){
                        $('#invoice_comment #invoice_comment_form .invoice_comments .invoice_feedback_existing_append').addClass("feedback_existing_append_height");
                      }
                      else{
                        $('#invoice_comment #invoice_comment_form .invoice_comments .invoice_feedback_existing_append').removeClass("feedback_existing_append_height");
                      }
                }  
            });
        }
    });
</script>

<!-- View_Comment Modal Start -->
<div class="modal fade" id="invoice_comment" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" style="padding-top:0px;" id="invoice_comment_data">
                <div class="container">
                    <div class="invoice_commentForm">
                        <div class="abc"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--View_Comment modal close -->

<!--Get and Append comments onclick post button Start -->
<script type="text/javascript">

$(document).on("change",".invoice-feedback-custom-file-upload",function(){
    // alert("on change file");
    event.preventDefault();
    var form_data = $("#invoice_comment_form");
    form_data = new FormData(form_data[0]);
    form_data.append('methodName', 'invoice_feedback_file_upload');
    $.ajax({
        type : "POST",
        url : "../../../../client/res/templates/financial_changes/invoice_comment_file_upload.php",
        dataType : "json",
        data : form_data,
        processData: false,
        contentType: false,
        success: function(data)
        {
        }
    });
});

 function invoicegetFileInfo(){

       $fileHtml="";
        var files = $('#invoice_feedback_attachment').prop("files");
        // alert(files)
        var names = $.map(files, function(val) { 
          // $(".review_file").append("<p>"+val.name+"</p>");
          var fileName = val.name;
          fileName=fileName.replace(/ /g,"_");  
          $fileHtml= $fileHtml+"<li><div class='col-xs-6'>"+fileName+"</div><div class='col-xs-6'><span class='material-icons-outlined invoicefeedback_unLinkfile' data-id='' data-name='"+fileName+"' aria-hidden='true' onclick='invoicefeedback_unLinkfile(this);' style='cursor: pointer; font-size: 14px;top: 3px; margin-left: 5px;' >close</span></div></li>";
        
        });
          $(".invoice_review_file").append($fileHtml);

    }

    function invoicefeedback_unLinkfile(event){
    $(event).closest("li").remove();
      var deleteFile = $(event).closest("span").attr("data-name");
      $.ajax({
        type : "GET",
        url : "../../../../client/res/templates/financial_changes/invoice_comment_file_upload.php",
        dataType : "json",
        data : { methodName: "invoice_feedback_delete_current_file", deleteFile: deleteFile},

        success: function(data)
        {
          $("#invoice_feedback_attachment").val(''); 
          $(event).html('');
        }
      });
    } 

    $(document).on("click", "#invoice_user_feedback", function(event){
      $("#invoice_comment_form").submit(function(event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        $(".invoice_review_file").empty();

        var formdata= $('#invoice_comment_form');
        form      = new FormData(formdata[0]);
        jQuery.each(jQuery('#invoice_feedback_attachment')[0].files, function(i, file) {
            form.append('invoice_feedback_attachment['+i+']', file);
        });
        
        $.ajax({
            url: "../../../../client/res/templates/financial_changes/invoice_get_Comment.php",
            type: 'POST',
            dataType  : "json",
            processData : false,
            contentType : false,
            data:form,
            async  : false,
         
            success: function (response) 
            {   
                // console.log(response);

                var len=response.length;
                ul = $("<ul style='padding-left:0px;'>");      
                for (var i = 0; i < len; i++)
                { 
                
                    var post_Comment= '<li data-id="" class="list-group-item list-row"><div class="pull-right stream-date-container"> <span class="text-muted small"><span title='+response[i].date+'>'+response[i].date+'</span></span></div><div class="stream-head-container"><div class="pull-left"> <img class="avatar" width="20" src="../../../../client/res/templates/dailysheet/assets/dist/img/stream.png"></div><div class="stream-head-text-container stream-head-text1"> <span class="text-muted message"><span class="invoice_comments_name">'+response[i].user_name+'</span>  Posted</span></div></div><div class="stream-post-container"> <span class="cell cell-post"><div class="complex-text-container" style="max-height: 200px;"><div class="complex-text"><p>'+response[i].comment+'</p></div></div> </span></div><div class="stream-attachments-container">';
                      if(response[i].filenames!= ""){
                       var split_files=response[i].filenames.split(",");
                        var total_files=split_files.length;
                        // alert(total_files);
                        for(var k=0; k<total_files; k++){
                            if(split_files[k]!=""){
                                post_Comment += '<div class="invoice_download_attach" data-invoice_id="'+response[i].dataId+'" data-filename="'+split_files[k]+'"><span class="fas fa-paperclip text-soft small"></span> <a >'+split_files[k]+'</a><br/><div>';
                            }
                            
                        }

                      }
                        post_Comment += '</div></span></div></li>';



                    $(".invoice_feedback_existing_append").prepend(post_Comment);

                    $(".messanger-text-field").val("");
                    $(".custom-file-upload,.post_btn").css("display","none");
                }
            }
        });
      });

      var feedback_existing_append_height_btn1 = $('#invoice_comment #invoice_comment_form .invoice_comments .invoice_feedback_existing_append li').length;

        if(feedback_existing_append_height_btn1 > 16){
            $('#invoice_comment #invoice_comment_form .invoice_comments .invoice_feedback_existing_append').addClass("feedback_existing_append_height");
        }
        else{
          $('#invoice_comment #invoice_comment_form .invoice_comments .invoice_feedback_existing_append').removeClass("feedback_existing_append_height");
        }

    });   
</script>
<!--Get and Append comments onclick post button Start -->
<!--Download attachments Start -->
<script type="text/javascript">
$(document).on("click", ".invoice_download_attach", function(event){
        event.preventDefault();
        event.stopImmediatePropagation();

        var inv_id = $(this).data("invoice_id");
        var inv_file_names = $(this).data("filename");
        // alert(file_names);
        window.location="../../../../client/res/templates/financial_changes/invoice_download_comments.php?inv_id="+inv_id+"&inv_file_names="+inv_file_names;
});   
</script>
<!--Download attachments End -->

<!-- display post and file attch button script start here -->
<script type="text/javascript">
    $(document).on("click","#invoice_feedback",function()
    {
        $(".custom-file-upload,.post_btn").css("display","inline-block");
        $("#selected_files").val("");

    });
</script>
<!-- display post and file attch button script end here -->


<!-- View Estimate Script Start here -->
<script type="text/javascript">
    $('.action[data-action=View_invoice]').unbind().click(function(){
        var dataId = $(this).data("id");
        // alert(dataId);
        $.ajax({
            type: "GET",
            url: "../../../../client/res/templates/financial_changes/View_Invoice.php",
            data: {dataId:dataId},
            success: function (data){

                $(".viewInvoiceForm").html(data);
                $("#view_invoiceModal").modal();   
                $("#view_invoiceModal .custom-a11yselect-btn").prop('disabled','disabled');  
                $("#view_invoiceModal .custom-a11yselect-btn").css('background-color','#eee');  
                $("#view_invoiceModal .custom-a11yselect-icon.icon-carrat-down").hide();  

                var item_length=$("#edit_invoice_total_items").val();
                $(".edit_invoice_participantRow .sno span").text("");

                for(var a=0;a<item_length;a++)
                {
                  var sno=a+1;
                  $(".edit_invoice_participantRow .main-group").eq(a).find(".sno span").text(sno);
                } 
            }
        });
    });
</script>

<!-- View_Invoice Modal Start -->
<div class="modal fade" id="view_invoiceModal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="viewInvoiceModal">Invoice</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="viewInvoiceForm"></div>
                </div>
            </div>
            <!--modal-body close -->
        </div>
        <!--modal-content close -->
    </div>
    <!--modal-dialog close -->
</div>
<!--View_Invoice modal close -->
<!-- View_Invoice Script End here -->
<!-- INVOICE SCRIPTS START HERE -->


<script>
  // Validation of popup form for invoice email
  $(document).on("click", "#sendInvoiceEmailBtn", function(){
      $("#sendInvoiceEmail").bootstrapValidator({
        fields: {
            estimate_to: {
                validators: {
                    notEmpty: {
                        message: 'To field is required'
                    },
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    }
                }
            }
        },
      }).on('error.form.bv', function (e) {
          e.preventDefault();

          // prevent form submission if preventDefault() not working
          $('#sendInvoiceEmail').submit(false);

          // other validation error handlings
          $("#sendInvoiceEmailBtn").removeAttr("disabled");

     }).on('success.form.bv', function (event, data) {
          var recordId = $("#invoice_recordId").val();
          event.stopImmediatePropagation();
          event.preventDefault();

          var estimate_subject = document.getElementById('invoice_subject').value;
          if(!estimate_subject)
          {
            $.alert({
              title: 'Alert!',
              content: "Do you want to send invoice without any subject?",
              type: 'dark',
                   typeAnimated: true,
                   draggable: false,
              buttons: {
                OK: function () {
                    submit_estimate();
                },
                CANCEL: function(){
                  document.getElementById("invoice_subject").focus();
                  document.getElementById("sendInvoiceEmailBtn").disabled = false;
                },
                
              }
            });
          }
          else {
            submit_invoice();
          }
      });
  });

  function submit_invoice()
  {
      var formdata= $('#sendInvoiceEmail');
      form      = new FormData(formdata[0]);

      // url     : "../../client/res/templates/financial_changes/send_estimate_mail.php",
      $.ajax({
        type    : "POST",
        url     : "../../pdf/invoice.php",
        data    : form,
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data)
        {
            if(data == 1)
            {
                $("#sendInvoiceEmailBtn").removeAttr("disabled"); 
                $('#invoice_send_mail').modal("hide");
                $('#invoiceForm')[0].reset();
                // $('#estimate_send_mail_success').modal();
                $.confirm({
                    title: 'Success!',
                    content: "Invoice send in mail successfully.",
                    type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                    buttons: {
                        Ok: function () {
                            // $('#estimate_send_mail_success').modal();
                        }
                    }
                });
            }
            else
            {
              $("#invoice_to").val("");
              $("#invoice_cc").val("");
              $("#invoice_subject").val("");
              $("#invoice_mail_body").val("");
              $("#sendInvoiceEmail").hide();
              $(".modal-content").hide();
              // $("#estimate_send_email_form").append("<h6 id='err_message'>Email not send</h6>");
              $.alert({
                  title: 'Alert!',
                  content: 'Email not send, please try again',
                  type: 'dark',
                   typeAnimated: true,
                   draggable: false,
                  buttons: {
                      ok: function() {
                          $("#sendInvoiceEmailBtn").removeAttr("disabled"); 
                          $('#invoice_send_mail').modal("hide");
                          $('#invoiceForm')[0].reset();
                      }
                  }
              });
            }
        }
      });
      return false;
  }

  function validateInvoiceMultipleEmailsCommaSeparated(e) {
    var toestimate_email = e.value;
    if(toestimate_email)
    {
      var estimate_result = toestimate_email.split(',');
      if(estimate_result.length >= 6)
      {
        $("#invoice_emailToMaxFive").css('display','block');
        document.getElementById("sendInvoiceEmailBtn").disabled = true;
        return false;  
      }
      else
      {
        $("#invoice_emailToMaxFive").css('display','none');
        document.getElementById("sendInvoiceEmailBtn").disabled = false;
        //return true;
      }
      for(var i = 0;i < estimate_result.length;i++)
      if(!validateEmail(estimate_result[i])) 
      {
        $("#invoice_emailerror").css('display','block');
        document.getElementById("sendInvoiceEmailBtn").disabled = true;
        return false;
      }
      $("#invoice_emailerror").css('display','none');
      document.getElementById("sendInvoiceEmailBtn").disabled = false;
      return true;
    }
    else
    {
      $("#invoice_emailerror").css('display','none');
    }
  }

  function validateInvoiceFrom(e) {
    var fromestimate_email = e.value;
    if(fromestimate_email)
    {
      if(!validateEmail(fromestimate_email)) 
      {
        $("#invoice_fromemailerror").css('display','block');
        document.getElementById("sendInvoiceEmailBtn").disabled = true;
        return false;
      }
      $("#invoice_fromemailerror").css('display','none');
      document.getElementById("sendInvoiceEmailBtn").disabled = false;
      return true;
    }
    else
    {
      $("#invoice_fromemailerror").css('display','none');
    }
  }

  function validateInvoiceMultipleEmailsCcCommaSeparated(e) {
    var toestimate_email = e.value;;
    //   alert(toemail);
    if(toestimate_email)
    {
      var estimate_result = toestimate_email.split(',');
      if(estimate_result.length >= 6)
      {
        $("#invoice_emailCcMaxFive").css('display','block');
        document.getElementById("sendInvoiceEmailBtn").disabled = true;
        return false;  
      }
      else
      {
        $("#invoice_emailCcMaxFive").css('display','none');
        document.getElementById("sendInvoiceEmailBtn").disabled = false;
      }
      for(var i = 0;i < estimate_result.length;i++)
      if(!validateEmail(estimate_result[i])) 
      {
        $("#invoice_emailccerror").css('display','block');
        document.getElementById("sendInvoiceEmailBtn").disabled = true;
        return false;
      }
      $("#invoice_emailccerror").css('display','none');
      document.getElementById("sendInvoiceEmailBtn").disabled = false;
      return true;
    }
    else
    {
      $("#invoice_emailccerror").css('display','none');
    }
  }
</script>

<!-- INVOICE SCRIPTS ENDS HERE -->



<!-- Record Payment for invoice Script Start here -->
<script type="text/javascript">
$('.action[data-action=Record_payment]').unbind().click(function(){
     var dataId = $(this).attr("data-id");
     $.ajax({
        type: "GET",
        url: "../../../../client/res/templates/financial_changes/Record_Payment.php",
        data: {dataId:dataId},
        success: function (data){
            $(".record_payment_Form").html(data);
            $("#record_paymentModal").modal();  
            $('#mode_name').customA11ySelect();
        }
     });
});
</script>
<!-- Record Payment for invoice Script End here -->

<!--record payment modal start -->
<div class="modal fade" id="record_paymentModal" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg modal-record_payment_width">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="financialModal">Create Payment History</h4>
                  </div>
                  <div class="modal-body">
                    <div class="">
                        <div class="record_payment_Form"></div>
                    </div>
                  </div>
                  <!--modal-body close -->
               </div>
               <!--modal-content close -->
            </div>
            <!--modal-dialog close -->
         </div>
<!--record payment modal close -->

<!-- calculation script for record payment modal start-->
<script type="text/javascript">
$(document).on('change', ".payment_tds", function(e){
  e.stopImmediatePropagation();
  e.preventDefault();

  var payment_due_amount= parseFloat($("#payment_due_amount").val());
  var payment_tds = parseFloat($("#payment_tds").val());
  var payment_invoice_amount = parseFloat($("#payment_invoice_amount").val());
  var payment_net_amount1 = parseFloat($("#payment_net_amount1").val());
  var due_amount1 = parseFloat($("#due_amount1").val());

  var payment_due_amount1 = due_amount1 - payment_tds - payment_net_amount1;

  if(payment_due_amount1 >= 0)
  { 
    $("#payment_net_amount1").val(payment_net_amount1);
    $("#payment_due_amount").val(payment_due_amount1);
  }
  else if(payment_due_amount1 < 0)
  {
    // $("#payment_tds").val("0");
    // $("#payment_net_amount1").val("0");
    $("#payment_due_amount").val(payment_due_amount1);
    // $.alert("The amount entered is more than the balance due for selected invoice");
    $.alert({
        title: 'Alert!',
        content: "The amount entered is more than the balance due for selected invoice",
        type: 'dark',
        typeAnimated: true,
        draggable: false,
        buttons: {
          Ok: function () {
            $("#payment_tds").val("0");
            due_amount1 = due_amount1 - payment_net_amount1; 
            $("#payment_due_amount").val(due_amount1);
          }
        },
    });
         
  }
});


var counttot=0;
$(document).on('change', ".payment_net_amount1", function(e) {

  e.stopImmediatePropagation();
  e.preventDefault();

    var payment_due_amount=$("#payment_due_amount").val();
    var payment_tds = parseFloat($("#payment_tds").val());
    var payment_invoice_amount = parseFloat($("#payment_invoice_amount").val());
    var payment_net_amount1 = parseFloat($("#payment_net_amount1").val());
    var due_amount1 = parseFloat($("#due_amount1").val());
    
    // var payment_due_amount1 = payment_due_amount-payment_tds;
    var payment_due_amount1 = due_amount1 - payment_net_amount1 - payment_tds;
    if(payment_due_amount1 >= 0)
    { 
        $("#payment_net_amount1").val(payment_net_amount1);
        $("#payment_due_amount").val(payment_due_amount1);
    }
    else if(payment_due_amount1 < 0)
    {
        // $("#payment_net_amount1").val("0");
        $("#payment_due_amount").val(payment_due_amount1);
        // $.alert("The amount entered is more than the balance due for selected invoice");
        $.alert({
            title: 'Alert!',
            content: "The amount entered is more than the balance due for selected invoice",
            type: 'dark',
            typeAnimated: true,
            draggable: false,
            buttons: {
              Ok: function () {
                $("#payment_net_amount1").val("0");
                due_amount1 = due_amount1 - payment_tds; 
                $("#payment_due_amount").val(due_amount1);
              }
            },
        });
      
    }
    // counttot=0;

  // }
  // counttot++;
});

</script>

<!-- calculation creipt for record payment modal end-->

<script type="text/javascript">
        // var uppdatePaymentBtn=0;
          $(document).on("click", "#save_recordpaymentBTN", function(event){
          // $("#updatePaymentForm").submit(function(event) {
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
                  url     : "../../client/res/templates/financial_changes/save_record_payment.php",
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
                                    content: 'Save record payment successfully!',
                                    type: 'dark',
                                    typeAnimated: true,
                                    draggable: false,
                                    buttons: {
                                      Ok: function () {
                                        //window.location.reload();
                                        $('button[data-action="reset"]').trigger('click');
                                        $(function () {
                                         $('#record_paymentModal').modal('toggle');
                                          });
                                        $(".modal-backdrop.in").remove();
                                        $(".modal-open").removeClass();
                                      }
                                    }
                                 });
                             }
 

                  }
                });
          // });
          });
      </script>
<!-- edit invoice Date validation script start  -->

<script>

        var count=0;
        var count1=0;
        $(document).on("change","#edit_invoice_date",function(event){
            event.preventDefault();
            event.stopImmediatePropagation();
            var val1= $(".edit_invoice_date").val();
            var val= document.getElementById("edit_due_date").value;
            var parts =val1.split('/');
            var selectedINVDate= parts[1]+"-"+parts[0]+"-"+parts[2];
            var selectedINVDate = new Date(selectedINVDate);

            var parts1 =val.split('/');
            var selectedORDDate= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
            var selectedORDDate = new Date(selectedORDDate);

            if(selectedINVDate  >  selectedORDDate){
              count1++;
              if(count1== 3){
                $.alert("Due date can not be before invoice date.");
                // $(".edit_due_date").val(val1);
                $(".edit_due_date").val("");
                // $(".edit_invoice_date").val("");
                count1=0;
              }
            }

            // alert("success");
            $(this).removeAttr('style');
            $(this).closest(".input-group").parent().find(".err").remove();
        });

        $(document).on("change","#convert_invoice_date",function(){
            $(this).removeAttr('style');
            $(this).closest(".input-group").parent().find(".err").remove();
        });

         $(document).on("change","#edit_due_date",function(event){
            event.preventDefault();
            event.stopImmediatePropagation();
            var val1= $(".edit_invoice_date").val();
            var val= document.getElementById("edit_due_date").value;
            var parts =val1.split('/');
            var selectedINVDate= parts[1]+"-"+parts[0]+"-"+parts[2];
            var selectedINVDate = new Date(selectedINVDate);

            var dueDate= new Date(val);
            var parts1 =val.split('/');
            var selectedDUEDate= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
            var selectedDUEDate = new Date(selectedDUEDate);

            if(selectedINVDate > selectedDUEDate){
              count++;
              if(count== 3){
                $.alert("Due date can not be before invoice date.");
                // document.getElementById("due_date").val(val1);
                // $(".edit_due_date").val(val1);
                $(".edit_due_date").val("");
                count=0;
              }  
            }
         });   
</script>

<!-- convert to invoicec date validation script start -->
<script>

        var count3=0;
        $(document).on("change","#convert_invoice_date",function(event){
          // alert("hi");
            event.preventDefault();
            event.stopImmediatePropagation();
            var val1= $(".convert_invoice_date").val();
            var val= document.getElementById("convert_due_date").value;
            var parts =val1.split('/');
            var selectedINVDate= parts[1]+"-"+parts[0]+"-"+parts[2];
            var selectedINVDate = new Date(selectedINVDate);

            var parts1 =val.split('/');
            var selectedORDDate= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
            var selectedORDDate = new Date(selectedORDDate);

            if(selectedINVDate  >  selectedORDDate){
              count3++;
              if(count3== 3){
                $.alert("Due date can not be before invoice date.");
                // $(".convert_due_date").val(val1);
                $(".convert_due_date").val('');
                // $(".convert_invoice_date").val("");
                count3=0;
              }
            }

            $(this).removeAttr('style');
            $(this).closest(".input-group").parent().find(".err").remove();

        });

        var count4=0;
         $(document).on("change","#convert_due_date",function(event){
            event.preventDefault();
            event.stopImmediatePropagation();
            var val1= $(".convert_invoice_date").val();
            var val= document.getElementById("convert_due_date").value;
            var parts =val1.split('/');
            var selectedINVDate= parts[1]+"-"+parts[0]+"-"+parts[2];
            var selectedINVDate = new Date(selectedINVDate);

            var dueDate= new Date(val);
            var parts1 =val.split('/');
            var selectedDUEDate= parts1[1]+"-"+parts1[0]+"-"+parts1[2];
            var selectedDUEDate = new Date(selectedDUEDate);

            if(selectedINVDate > selectedDUEDate){
              count4++;
              if(count4==3){
                $.alert("Due date can not be before invoice date.");
                // document.getElementById("due_date").val(val1);
                $(".convert_due_date").val('');
                count4=0;
              }  
            }
         });   
</script>


<!-- Edit Estimate datepicker popover position -->
<script type="text/javascript">
//  for datepicker position start

    $("#edit_estimateModal .datepicker").removeClass("date_position2");
function edit_estimate_getDateEvent(e){
    $(e).addClass("date_position2");
}

$("#edit_estimateModal").scroll(function() {
     var add_date2=$("input[class$='date_position2']");
    // alert(" GetDateEvent "+add_date2);

      if(add_date2.length)
      {
        var date_topPos = add_date2.offset().top;
        var date_leftPos = add_date2.offset().left;
        $(".datepicker").css("top", date_topPos+35);
        $(".datepicker").css("left", date_leftPos);
      }
  });

function edit_estimate_focus_datepicker(e)
{
  $(e).closest("div").find("input").focus();
  edit_estimate_getDateEvent($(e).closest("div").find("input"));
}


// for datepicker position end


$("#edit_estimateModal .edit_close").click(function(){
  $("#edit_estimateModal #edit_estimate_calculation .panel-heading ").removeClass("remove-panel-color");
  $("#edit_estimate_items_discount_selected").val(0);
  $("#edit_estimate_items_gst_type_selected").val(0);
});


</script>


<!-- for edit invoice datepicker position  -->

<script type="text/javascript">

  function editInvoice_getEvent(e)
  {
      $(".editInvoiceDate").removeClass("editInvoice_datepicker_position");
      $(e).addClass("editInvoice_datepicker_position");
  }
  function editInvoice_getAddEvent(e)
  {
      $(".editInvoiceDate").removeClass("editInvoice_datepicker_position");
      $(e).closest("div").find(".editInvoiceDate").addClass("editInvoice_datepicker_position");
      // $(e).closest(".input-group").find("input").removeAttr('style');
      // $(e).closest(".input-group").parent().find(".err").remove();
  }

    $("#edit_invoiceModal").scroll(function() {
     var editInvoice_datePicker=$("input[class$='editInvoice_datepicker_position']");
      if(editInvoice_datePicker.length)
      {
         var topPos = editInvoice_datePicker.offset().top;
         var leftPos = editInvoice_datePicker.offset().left;
         $(".datepicker").css("top", topPos+35);
         $(".datepicker").css("left", leftPos);
      }

      
  });
  </script>

  <script type="text/javascript">
  $(".convert_to_InvoiceDate").datepicker({format: "dd/mm/yyyy",autoclose:true,todayHighlight: true});
  function convert_to_Invoice_getEvent(){}
  // function convert_to_Invoice_getEvent(e)
  // {
    $(document).on("focus", ".convert_to_InvoiceDate", function(e){
      // $("#convertEstimateForm.convert_to_InvoiceDate").removeClass("convert_to_Invoice_datepicker_position");
      $(".convert_to_InvoiceDate").datepicker({format: "dd/mm/yyyy",autoclose:true,todayHighlight: true});
      // $(e).addClass("convert_to_Invoice_datepicker_position");
    });
  // }
  function convert_to_Invoice_getAddEvent(e)
  {
      $("#convertEstimateForm .convert_to_InvoiceDate").removeClass("convert_to_Invoice_datepicker_position");
      $(e).closest("div").find(".convert_to_InvoiceDate").addClass("convert_to_Invoice_datepicker_position");
  }

  function onclickEventFunction()
  {
    alert("Inside onclickEventFunction");
  }



    $("#convert_ToInvoiceModal").scroll(function() {
     var convert_to_Invoice_datePicker=$("input[class$='convert_to_Invoice_datepicker_position']");
      if(convert_to_Invoice_datePicker.length)
      {
         var topPos = convert_to_Invoice_datePicker.offset().top;
         var leftPos = convert_to_Invoice_datePicker.offset().left;
         $(".datepicker").css("top", topPos+35);
         $(".datepicker").css("left", leftPos);
      }

      
  });
  </script>

  <!-- Edit invoice modal close -->
  <script type="text/javascript">
    $("#edit_invoiceModal .close").click(function(){
      $("#edit_invoice_items_discount_selected,#edit_invoice_items_gst_type_selected").val(0);
    });

  </script>

  <!-- Convert to invoice modal close -->
  <script type="text/javascript">
    $("#convert_ToInvoiceModal .close").click(function(){
      $("#Selected_disc_hidden_val,#Selected_gst_hidden_val").val(0);
    });

  </script>

 <!-- BILLING ENTITY SCRIPTS ENDS HERE -->


<!-- Custom Edit Content Templates Form Modal in Campaigns Start -->

<!-- Modal -->
<div id="edit_contentTemplateModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-emailwidth">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Content Template</h4>
      </div>
      <div class="modal-body">
        <form class="edit_ContentTemplatesForm" action="../../client/res/templates/bulk_message/contentTemplate/update_content_template.php" method="POST" style="border: 1px solid #ccc;padding: 15px;border-radius: 15px;">
        </form>
      </div>
    </div>

  </div>
</div>

<!-- Custom Edit Content Templates Form Modal in Campaigns End -->



<!-- Custom Edit Content Templates Form Modal in Campaigns Script Start -->
<script type="text/javascript">
  $('.action[data-action=ContentTemplateEdit]').attr('onclick', 'getContentTemplateEdit(this)');

function getContentTemplateEdit(id) { 

  var id=$(id).data('id');

  //get data
  $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/bulk_message/contentTemplate/edit_content_template.php?id="+id,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         if(data.status == 'true'){

            $(".edit_ContentTemplatesForm").html(data.data);

            $("#edit_contentTemplateModal").modal({
                backdrop: 'static',
                keyboard: false
            });

            if ($(window).width() < 767)
            {
            $("#edit_addVariable").text('');
            $("#edit_addVariable").html('<i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i>');
            }

            $("#edit_content_type, #edit_category_type, #edit_unicodeType, #edit_Sender_Id").customA11ySelect();

            $('#edit_content_type-button,#edit_category_type-button,#edit_unicodeType-button,#edit_Sender_Id-button').addClass('form-control');

            $('.edit_ContentTemplatesForm').bootstrapValidator('addField', 'edit_TemplateName', {
                validators: {
                    notEmpty: {
                        message: 'Please enter template name'
                    }
                }
            });

            $('.edit_ContentTemplatesForm').bootstrapValidator('addField', 'edit_PrincipleEntityId', {
                validators: {
                    notEmpty: {
                        message: 'Please enter principle entity id'
                    }
                }
            });

            $('.edit_ContentTemplatesForm').bootstrapValidator('addField', 'edit_TemplateId', {
                validators: {
                    notEmpty: {
                        message: 'Please enter template id'
                    }
                }
            });

            $('.edit_ContentTemplatesForm').bootstrapValidator('addField', 'edit_TemplateContents', {
                validators: {
                    notEmpty: {
                        message: 'Please enter template content'
                    }
                }
            });

            $('.edit_ContentTemplatesForm').bootstrapValidator('addField', 'edit_Sender_Id', {
                validators: {
                    notEmpty: {
                        message: 'Please select sender id'
                    }
                }
            });

         } else {
            $.alert({
              title: 'Alert!',
              content: 'Record Not exists',
              type: 'dark',
              typeAnimated: true
            });
         }
      }
    });
}
</script>

<script type="text/javascript">
$(document).ready(function() {
    $("#edit_content_type, #edit_category_type, #edit_unicodeType, #edit_Sender_Id").customA11ySelect();

    // Append a text in textarea on add variable btn click
    $(document).on('click',"#edit_addVariable",function(eventVariable){
      //$('#edit_TemplateContents').append('{#var#}');
      eventVariable.preventDefault();
      eventVariable.stopImmediatePropagation();
      var char = $("#edit_TemplateContents").val()+"{#var#}";
      $("#edit_TemplateContents").empty("");
      $("#edit_TemplateContents").val(char);
    });

    // Count Characters in textarea on type
    var edit_SMSCount = 1;
    var edit_smsBodyLenght1 = 0;
     // $(document).on('keyup',"#edit_TemplateContents",function(event){

     //    event.preventDefault();
     //    event.stopImmediatePropagation();
     //    console.log('test');
     // });
    // $('#edit_TemplateContents').on("keyup", function(event) {
    $(document).on('keyup',"#edit_TemplateContents",function(event){

        event.preventDefault();
        event.stopImmediatePropagation();

      edit_smsBodyLenght1 = $(this).val().length;
      if(edit_SMSCount == 0){
        edit_SMSCount = 1;
       }
    $(".edit_smsBodyLenght").html(edit_smsBodyLenght1);
    if(edit_smsBodyLenght1%160 == 0){
      if (event.keyCode == 8 || event.keyCode == 46) {
        if (edit_SMSCount >=1){
          edit_SMSCount--;
        }
          
         event.preventDefault();
      }
      else{
      edit_SMSCount++;
      }
    }

      $(".edit_smscount").html(edit_SMSCount); 

    });


    $( "#inputBank" ).change(function() {
    $(this).closest('form').bootstrapValidator('revalidateField', $(this).prop('name'));
    });

    // $('#edit_contentTemplateModal').on('hide.bs.modal', function(){
    $(document).on('click','#edit_contentTemplateModal .close', function(){
            $('.cell').removeClass('has-success');
            $('.cell').removeClass('has-error');
            $('.edit_ContentTemplatesForm').bootstrapValidator('resetForm', true);
            $(".edit_smsBodyLenght").html(0);
            $(".edit_smscount").html(0); 
            $(".content_edit_error_main").hide(); 
            $("#edit_content_type, #edit_category_type, #edit_unicodeType, #edit_Sender_Id").customA11ySelect('refresh');
        });

    $('#edit_contentTemplateModal input[type="text"],#edit_contentTemplateModal select,#edit_contentTemplateModal textarea').focus(function(){
      $('.cell').removeClass('has-success');
    });

  /*All select Change event jquery validation Start*/


  $(document).on("change","#edit_content_type",function(e_edit_content_type){
      e_edit_content_type.preventDefault();
      e_edit_content_type.stopImmediatePropagation();
    var edit_content_type = $(this).val();
    if(edit_content_type == "" ) {
        $("#edit_content_type").parent('.field').find('.content_edit_error_main').css("display","inline-block");
        $(this).closest('.form-group').addClass('has-error');
      }else{
        $("#edit_content_type").parent('.field').find('.content_edit_error_main').css("display","none");
        $(this).closest('.form-group').removeClass('has-error');
      } 
  });

  $(document).on("change","#edit_category_type",function(e_edit_category_type){
      e_edit_category_type.preventDefault();
      e_edit_category_type.stopImmediatePropagation();
    var edit_category_type = $(this).val();
    if( edit_category_type == "" ){
        $("#edit_category_type").parent('.field').find('.content_edit_error_main').css("display","inline-block");
        $(this).closest('.form-group').addClass('has-error');
      } else{
        $("#edit_category_type").parent('.field').find('.content_edit_error_main').css("display","none");
        $(this).closest('.form-group').removeClass('has-error');
      } 
  });

    $(document).on("change","#edit_Sender_Id",function(e_edit_Sender_Id){
      e_edit_Sender_Id.preventDefault();
      e_edit_Sender_Id.stopImmediatePropagation();
    var edit_Sender_Id = $(this).val();
    if( edit_Sender_Id == ""){
         $("#edit_Sender_Id").parent('.field').find('.content_edit_error_main').css("display","inline-block");
         $(this).closest('.form-group').addClass('has-error');
         //alert($("#edit_Sender_Id").parent('.field').find('.content_edit_error_main').text());
      } else{
        $("#edit_Sender_Id").parent('.field').find('.content_edit_error_main').css("display","none");
        $(this).closest('.form-group').removeClass('has-error');
      }  
  });

      $(document).on("change","#edit_unicodeType",function(e_edit_unicodeType){
      e_edit_unicodeType.preventDefault();
      e_edit_unicodeType.stopImmediatePropagation();
    var edit_unicodeType = $(this).val();
    if( edit_unicodeType == "" ){
          $("#edit_unicodeType").parent('.field').find('.content_edit_error_main').css("display","inline-block");
          $(this).closest('.form-group').addClass('has-error');
        }
      else{
        $("#edit_unicodeType").parent('.field').find('.content_edit_error_main').css("display","none");
        $(this).closest('.form-group').removeClass('has-error');
      } 
  });

  /*All select Change event jquery validation End*/

/*Custom Content Templates Form Modal in Campaigns bootstrap validation Script Start*/
   /* $(document).on("click","#edit_save_changes",function(e_edit_save_changes){
       e_edit_save_changes.preventDefault();
      e_edit_save_changes.stopImmediatePropagation();
      var edit_content_type_btn1 = $("#edit_content_type").val();
      var edit_category_type_btn1 = $("#edit_category_type").val();
      var edit_Sender_Id_btn1 = $("#edit_Sender_Id").val();
      var edit_unicodeType_btn1 = $("#edit_unicodeType").val();
      if(edit_content_type_btn1 == "" ) {
        $("#edit_content_type").parent('.field').find('.content_edit_error_main').css("display","inline-block");
      }else{
        $("#edit_content_type").parent('.field').find('.content_edit_error_main').css("display","none");
      } 

      if( edit_category_type_btn1 == "" ){
        $("#edit_category_type").parent('.field').find('.content_edit_error_main').css("display","inline-block");
      } else{
        $("#edit_category_type").parent('.field').find('.content_edit_error_main').css("display","none");
      } 

      if( edit_Sender_Id_btn1 == ""){
         $("#edit_Sender_Id").parent('.field').find('.content_edit_error_main').css("display","inline-block");
         //alert($("#edit_Sender_Id").parent('.field').find('.content_edit_error_main').text());
      } else{
        $("#edit_Sender_Id").parent('.field').find('.content_edit_error_main').css("display","none");
      } 

      if( edit_unicodeType_btn1 == "" ){
          $("#edit_unicodeType").parent('.field').find('.content_edit_error_main').css("display","inline-block");
        }
      else{
        $("#edit_unicodeType").parent('.field').find('.content_edit_error_main').css("display","none");
      }
    });*/

    $('.edit_ContentTemplatesForm').bootstrapValidator({
        message: 'Please enter valid input',
        feedbackIcons: { },
        fields: {
            "edit_TemplateName": {
                validators: {
                    notEmpty: {
                        message: 'Please enter template name'
                    }
                }
            },
            "edit_PrincipleEntityId": {
                validators: {
                    notEmpty: {
                        message: 'Please enter principle entity id'
                    }
                }
            },
            "edit_TemplateId": {
                validators: {
                    notEmpty: {
                        message: 'Please enter template id'
                    }
                }
            },
            "edit_content_type": {
                validators: {
                    notEmpty: {
                        message: 'Please select content type'
                    }
                }
            },
            "edit_category_type": {
                validators: {
                    notEmpty: {
                        message: 'Please select category type'
                    }
                }
            },
            "edit_Sender_Id": {
                validators: {
                    notEmpty: {
                        message: 'Please select sender id'
                    }
                }
            },
            "edit_unicodeType": {
                validators: {
                    notEmpty: {
                        message: 'Please select template type'
                    }
                }
            },
            "edit_TemplateContents": {
                validators: {
                    notEmpty: {
                        message: 'Please enter template content'
                    }
                }
            }
        }
    }).on('success.form.bv', function (event, data) {

      event.preventDefault();
      event.stopImmediatePropagation();

      var edit_ContentTemplateCount =0;
      var edit_content_type_btn = $("#edit_content_type").val();
      var edit_category_type_btn = $("#edit_category_type").val();
      var edit_Sender_Id_btn = $("#edit_Sender_Id").val();
      var edit_unicodeType_btn = $("#edit_unicodeType").val();

      if(edit_content_type_btn == "") {
        $("#edit_content_type").parent('.field').find('.content_edit_error_main').css("display","inline-block");
        edit_ContentTemplateCount++;
      }else{
        $("#edit_content_type").parent('.field').find('.content_edit_error_main').css("display","none");
        $("#edit_save_changes").removeAttr("disabled");
      } 

$("#edit_save_changes").removeAttr("disabled");
      if( edit_category_type_btn == ""){
        $("#edit_category_type").parent('.field').find('.content_edit_error_main').css("display","inline-block");
        edit_ContentTemplateCount++;
      } else{
        $("#edit_category_type").parent('.field').find('.content_edit_error_main').css("display","none");
        $("#edit_save_changes").removeAttr("disabled");
      } 

      if( edit_Sender_Id_btn == ""){
         $("#edit_Sender_Id").parent('.field').find('.content_edit_error_main').css("display","inline-block");
         //alert($("#edit_Sender_Id").parent('.field').find('.content_edit_error_main').text());
         edit_ContentTemplateCount++;
      } else{
        $("#edit_Sender_Id").parent('.field').find('.content_edit_error_main').css("display","none");
        $("#edit_save_changes").removeAttr("disabled");
      } 

      if( edit_unicodeType_btn == ""){
          $("#edit_unicodeType").parent('.field').find('.content_edit_error_main').css("display","inline-block");
          edit_ContentTemplateCount++;
        }
      else{
        $("#edit_unicodeType").parent('.field').find('.content_edit_error_main').css("display","none");
        $("#edit_save_changes").removeAttr("disabled");
      }


      if(edit_ContentTemplateCount>0){
      //$('.edit_ContentTemplatesForm').bootstrapValidator('resetForm', true);
      return false;
      }

      //submit form
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
      success: function(data) {

          if(data.status == 'true'){

            $.alert({
              title: 'Success!',
              content: data.msg,
              type: 'dark',
              typeAnimated: true,
              buttons: {
                      Ok: function () {
                          
                           //$("#edit_contentTemplateModal").modal("hide");
                           $("#edit_contentTemplateModal .close").click();
                           $('button[data-action="reset"]').trigger('click');
                           $(".modal-backdrop.in").remove();
                           $(".modal-open").removeClass();
                           // $('.edit_ContentTemplatesForm').bootstrapValidator('resetForm', true);
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
        
    });
});
/* Custom Content Templates Form Modal in Campaigns bootstrap validation Script End */


</script>

<!-- Custom Edit Content Templates Form Modal in Campaigns Script End -->


<!-- Custom Edit Reminder Form Modal Script Start -->

<script type="text/javascript">
  //Select validation add sms reminder start

  $(document).on("click",".edit_SMS_showDateTime", function(){
    $("#edit_showDateTimeInput").css('display','inline-block');
    $('#edit-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'smsDate2', true);
    $('#edit-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'smsTime2', true);
    $("#edit_showDateTimeInput .input-group-addon").css({'background-color':'transparent','border-color':'#d1d5d6','color':'#0a6783 !important'});
    $("#edit_showDateTimeInput .form-control").css({'border':' 1px solid #d1d5d6','box-shadow':'unset'});
  });

  $(document).on("click",".edit_SMS_hideDateTime", function(){
    $("#edit_showDateTimeInput").css('display','none');

    $('#edit-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'smsDate2', false);
    $('#edit-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'smsTime2', false);
  });




  // ADD SMS Reminder Count Characters in textarea on type
    var edit_SMSCount = 1;
    var edit_smsBodyLenght1 = 0;
    $(document).on("keyup","#smsBody2", function(event_editsms) {
     edit_smsBodyLenght1 = $(this).val().length;

    if(edit_SMSCount == 0){
      edit_SMSCount = 1;
    }
     //console.log(edit_smsBodyLenght1);
    $(".edit_smsBodyLenght").html(edit_smsBodyLenght1);
    if(edit_smsBodyLenght1%160 == 0){
      if (event_editsms.keyCode == 8 || event_editsms.keyCode == 46) {
        if (edit_SMSCount >=1){
          edit_SMSCount--;
        }
          
         event_editsms.preventDefault();
      }
      else{
      edit_SMSCount++;
      }
    }

      $(".edit_smscount").html(edit_SMSCount); 

    });


    //Added  select dropdown validation in add sms reminder start

    // $(document).on("change","#edit_smssenderid",function(event_smssenderid){

    //   event_smssenderid.preventDefault();
    //   event_smssenderid.stopImmediatePropagation();
      
    //   var edit_SMS_Sender_Id2 = $(this).val();
    //   if( edit_SMS_Sender_Id2 == ""){
    //      $("#edit_smssenderid").parent('.field').find('.edit_SMS_error_main').css("display","inline-block");
    //      //console.log($("#edit_smssenderid").parent('.field').find('.edit_SMS_error_main').text());
    //   } else{
    //     $("#edit_smssenderid").parent('.field').find('.edit_SMS_error_main').css("display","none");
    //   } 
    // });

    // $(document).on("change","#edit_smscontent_template",function(event_smscontent_template){
    //   event_smscontent_template.preventDefault();
    //   event_smscontent_template.stopImmediatePropagation();
    //   var edit_SMS_content_type1 = $(this).val();

    //   if(edit_SMS_content_type1 == "") {
    //     $("#edit_smscontent_template").parent('.field').find('.edit_SMS_error_main').css("display","inline-block");
    //   }else{
    //     $("#edit_smscontent_template").parent('.field').find('.edit_SMS_error_main').css("display","none");
    //   } 
    // });


    //Added  select dropdown validation in add sms reminder End

//GET SELECTED SENDER ID CONTENT TEMPLATES
$(document).on("change","#editSmsSenderId",function(senderId){

      senderId.preventDefault();

      var senderIds = $('#editSmsSenderId').val();

      $.ajax({
      type    : "GET", 
      url     : "../../client/res/templates/bulk_message/contentTemplate/getContentTemplateName.php?senderId="+senderIds,
      dataType  : "json",
      success: function(data) {
         if(data.status == 'true'){

            $("#editSmsContentTemplate").html('');
            $("#editSmsContentTemplate").html('<option value="" > Select Content Template </option>');

             if(data.contentTemplateName){
                $.each(data.contentTemplateName, function (key, val) {
                    $("#editSmsContentTemplate").append('<option value="'+val+'" >'+key+' </option>');
                });
             }

             $("#editSmsContentTemplate").customA11ySelect('refresh');                
         }
      }
    });
});

//GET SMS BODY CONTENT
$(document).on("change","#editSmsContentTemplate",function(senderId){

  senderId.preventDefault();

  var smsContentTemplate   = $('#editSmsContentTemplate').val();

  $.ajax({
      type    : "GET", 
      url     : "../../client/res/templates/bulk_message/contentTemplate/getContentTemplateDetails.php?smsContentTemplate="+smsContentTemplate,
      dataType  : "json",
      success: function(data) {
         if(data.status == 'true'){ 

            $('#sms_text_edit').val(data.contentTemplateBody);
            $('.editSmsBodyLenght').html(data.smsLengthCount);
            $('.editSmscount').html(data.smsCount);

            $('#edit-sms-form').bootstrapValidator('enableFieldValidators', 'editSmsContentTemplate', true);

            if(data.contentTemplateBody){
              $('#edit-sms-form').bootstrapValidator('enableFieldValidators', 'sms_text', false);
            }else {
              $('#edit-sms-form').bootstrapValidator('enableFieldValidators', 'sms_text', true);
            } 

         }
      }
    });
});

//GET SELECTED SENDER ID CONTENT TEMPLATES FOR EDIT SMS REMINDER
$(document).on("change","#edit_smssenderid",function(senderId){

      senderId.preventDefault();

      var senderIds = $('#edit_smssenderid').val();

      $.ajax({
      type    : "GET", 
      url     : "../../client/res/templates/bulk_message/contentTemplate/getContentTemplateName.php?senderId="+senderIds,
      dataType  : "json",
      success: function(data) {
         if(data.status == 'true'){

            $("#edit_smscontent_template").html('');
            $("#edit_smscontent_template").html('<option value="" > Select Content Template </option>');

             if(data.contentTemplateName){
                $.each(data.contentTemplateName, function (key, val) {
                    $("#edit_smscontent_template").append('<option value="'+val+'" >'+key+' </option>');
                });
             }

             $("#edit_smscontent_template").customA11ySelect('refresh');

         }
      }
    });
});

//GET SMS BODY CONTENT FOR EDIT SMS REMINDER
$(document).on("change","#edit_smscontent_template",function(senderId){

  senderId.preventDefault();

  var smsContentTemplate   = $('#edit_smscontent_template').val();
    $("#edit_smscontent_template-button").addClass('form-control');
  $.ajax({
      type    : "GET", 
      url     : "../../client/res/templates/bulk_message/contentTemplate/getContentTemplateDetails.php?smsContentTemplate="+smsContentTemplate,
      dataType  : "json",
      success: function(data) {
         if(data.status == 'true'){ 

            $('#smsBody2').val(data.contentTemplateBody);
            $('.edit_smsBodyLenght').html(data.smsLengthCount);
            $('.edit_smscount').html(data.smsCount);

            $('#edit-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'edit_smscontent_template', true);

            $('#edit-sms-reminder-form').bootstrapValidator('enableFieldValidators', 'smsBody2', true);
         }
      }
    });
});
</script>

<script type="text/javascript">
  // SMS Datetime Picker -Set Scroll position

    $("#editReminderModal,#editSmsReminderModal1").scroll(function() {
        var add_clockpicker=$("input[class$='edit_clockpicker_position']");
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

  // clockpicker adjust position on

    function editgetEvent(e){
      $("#time15,#smsTime2").removeClass("edit_clockpicker_position");
      $(e).addClass("edit_clockpicker_position");
    }

    // Datepicker adjust position on

    function editgetDateEvent(e){
    $("#date15,#smsDate2").removeClass("date_position");
    $(e).addClass("date_position");
  }

  // clockpicker adjust position on

    function editgetEvent1(e){
      $("#smsTime2").removeClass("edit_clockpicker_position");
      $(e).addClass("edit_clockpicker_position");
    }

    // Datepicker adjust position on

    function editgetDateEvent1(e){
    $("#smsDate2").removeClass("date_position");
    $(e).addClass("date_position");
  }



  $(document).on("click","#emptyAttachments",function(emptyAttachments){

    emptyAttachments.stopImmediatePropagation();
    $.ajax({
      type    : "POST", 
      url     : "../../client/res/templates/email_reminder/emptyAttachment.php",
      dataType  : "json",
      success: function(data) {

      }
    });
  });
</script>
<!-- Custom Edit Reminder Form Modal Script End -->
