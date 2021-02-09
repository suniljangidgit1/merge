<script>
$(document).ready(function(){

  var FacebookLead = $("#integration-header").text();

  $(".integration-Subpanel").css("display","none");
  $(".Facebook").css("display","none");
  $(".Google").css("display","none");
  $(".99acres").css("display","none");
  $(".indiaMart").css("display","none");
  $(".magicbricks").css("display","none");

  if(FacebookLead  == 'Facebook Lead Ads'){
    $("#integration-content .panel").css("display","none");
    $(".button-container").css("display","none");
    $('#header_input_img').attr('src', '{{basePath}}client/img/facebook.png');
    $(".integration-Subpanel").css("display","block");
    $(".Google").css("display","none");
    $(".99acres").css("display","none");
    $(".indiaMart").css("display","none");
    $(".Facebook").css("display","block");
  }

  if(FacebookLead  == 'Google Lead Form Extensions'){
    $("#integration-content .panel").css("display","none");
    $(".button-container").css("display","none");
    $('#header_input_img').attr('src', '{{basePath}}client/img/google.png');
    $(".integration-Subpanel").css("display","block");
    $(".Facebook").css("display","none");
    $(".99acres").css("display","none");
    $(".indiaMart").css("display","none");
    $(".Google").css("display","block");
  }

  if(FacebookLead  == '99acres.com'){
    $("#integration-content .panel").css("display","none");
    $(".button-container").css("display","none");
    $('#header_input_img').attr('src', '{{basePath}}client/img/99acres.png');
    $(".integration-Subpanel").css("display","block");
    $(".Facebook").css("display","none");
    $(".Google").css("display","none");
    $(".indiaMart").css("display","none");
    $(".99acres").css("display","block");
  }

  if(FacebookLead  == 'indiaMart.com'){
    $("#integration-content .panel").css("display","none");
    $(".button-container").css("display","none");
    $('#header_input_img').attr('src', '{{basePath}}client/img/indiaMart.png');
    $(".integration-Subpanel").css("display","block");
    $(".Facebook").css("display","none");
    $(".Google").css("display","none");
    $(".99acres").css("display","none");
    $(".indiaMart").css("display","block");
  }

  if(FacebookLead  == 'magicbricks.com'){
    $("#integration-content .panel").css("display","none");
    $(".button-container").css("display","none");
    $('#header_input_img').attr('src', '{{basePath}}client/img/magicbricks.png');
    $(".integration-Subpanel").css("display","block");
    $(".Facebook").css("display","none");
    $(".Google").css("display","none");
    $(".99acres").css("display","none");
    $(".indiaMart").css("display","none");
    $(".magicbricks").css("display","block");
  }

  if(FacebookLead  == 'Google Maps'){
    $(".Facebook").css("display","none");
    $(".Google").css("display","none");
  }

  $(".integration-link[data-name='FacebookLead']").click(function(){
    $('#header_input_img').attr('src', '{{basePath}}client/img/facebook.png');
    $(".integration-Subpanel").css("display","block");
    $(".Facebook").css("display","block");
  });

  $(".integration-link[data-name='GoogleFormExtension']").click(function(){
    $('#header_input_img').attr('src', '{{basePath}}client/img/google.png');
    $(".integration-Subpanel").css("display","block");
    $(".Google").css("display","block");
  });

  $(".integration-link[data-name='99acres']").click(function(){
    $('#header_input_img').attr('src', '{{basePath}}client/img/99acres.png');
    $(".integration-Subpanel").css("display","block");
    $(".99acres").css("display","block");
  });

  $(".integration-link[data-name='indiaMart']").click(function(){
    $('#header_input_img').attr('src', '{{basePath}}client/img/indiaMart.png');
    $(".integration-Subpanel").css("display","block");
    $(".indiaMart").css("display","block");
  });

  $(".integration-link[data-name='magicbricks']").click(function(){
    $('#header_input_img').attr('src', '{{basePath}}client/img/magicbricks.png');
    $(".integration-Subpanel").css("display","block");
    $(".magicbricks").css("display","block");
  });

});

$(document).ready(function() {

  $(".Form_data_Main").hide();
  $(".Send_data_Main").hide();
  $(".google_Send_data_Main").hide();
  
  $("#test_review").click(function(){
    $(".Form_data_Main").show();
  });

  $("#Send_test_review").click(function(){
    $(".Send_data_Main").show();
  });

  $("#google_Send_test_review").click(function(){
    $(".google_Send_data_Main").show();
  });

});

(function() {
  var copyButton = document.querySelector('.copy .copy_button');
  var copyButtonKey = document.querySelector('.copy .copy_button_key');
  var copyInput = document.querySelector('.copy #google_name');
  var copyInputKey = document.querySelector('.copy #google_key');
  copyButton.addEventListener('click', function(e) {
    e.preventDefault();
    var text = copyInput.select();
    document.execCommand('copy');
  });

  copyButtonKey.addEventListener('click', function(e) {
    e.preventDefault();
    var textkey = copyInputKey.select();
    document.execCommand('copy');
  });

  copyInput.addEventListener('click', function() {
    this.select();
  });

  copyInputKey.addEventListener('click', function() {
    this.select();
  });
})();


var data = []; // Programatically-generated options array with > 5 options
var placeholder = "Facebook Lead Ads Account";
$(".Facebook_Select").select2({
    data: data,
    placeholder: placeholder,
    allowClear: true,
    minimumResultsForSearch: 5
});

var Acres_data = ["Mayank Agarwal", "Ayush Agarwal", "Achyut Gaikwad", "Vrushali Thorat", "Rupali Yadav"]; // Programatically-generated options array with > 5 options
var Acres_placeholder = "Assigned User";
$(".Acres_Select").select2({
    data: Acres_data,
    placeholder: Acres_placeholder,
    allowClear: true,
    minimumResultsForSearch: 5
});

var data_page = []; 
var placeholder_page = "Choose Page...";
$(".Facebook_Page_Select").select2({
    data: data_page,
    placeholder: placeholder_page,
    allowClear: true,
    minimumResultsForSearch: 5
});

var data_Form = [];
var placeholder_Form = "Choose Form ...";
$(".Facebook_Form_Select").select2({
    data: data_Form,
    placeholder: placeholder_Form,
    allowClear: true,
    minimumResultsForSearch: 5
});

var data_title = ["Title One", "Title Two", "Title Three", "Title Four", "Title Five"]; // Programatically-generated options array with > 5 options
var placeholder_title = "Default(Any Title)";
$(".Facebook_Title_Select").select2({
    data: data_title,
    placeholder: placeholder_title,
    allowClear: true,
    minimumResultsForSearch: 5
});

var data_Description = ["Description One", "Description Two", "Description Three", "Description Four", "Description Five"]; // Programatically-generated options array with > 5 options
var placeholder_Description = "Name: John Doe";
$(".Facebook_Description_Select").select2({
    data: data_Description,
    placeholder: placeholder_Description,
    allowClear: true,
    minimumResultsForSearch: 5
});

var data_UserEmail = ["UserEmail One", "UserEmail Two", "UserEmail Three", "UserEmail Four", "UserEmail Five"]; // Programatically-generated options array with > 5 options
var placeholder_UserEmail = "Choose Value...";
$(".Facebook_User_Email_Select").select2({
    data: data_UserEmail,
    placeholder: placeholder_UserEmail,
    allowClear: true,
    minimumResultsForSearch: 5
});

var data_Tags = ["Tags One", "Tags Two", "Tags Three", "Tags Four", "Tags Five"]; // Programatically-generated options array with > 5 options
var placeholder_Tags = "Choose Value...";
$(".Facebook_Tags_Select").select2({
    data: data_Tags,
    placeholder: placeholder_Tags,
    allowClear: true,
    minimumResultsForSearch: 5
});

var data_Creation_Date = ["Creation_Date One", "Creation_Date Two", "Creation_Date Three", "Creation_Date Four", "Creation_Date Five"]; // Programatically-generated options array with > 5 options
var placeholder_Creation_Date = "Choose Value...";
$(".Facebook_Creation_Date_Select").select2({
    data: data_Creation_Date,
    placeholder: placeholder_Creation_Date,
    allowClear: true,
    minimumResultsForSearch: 5
});

$('.accordion--EmailId__invalid').hide();

var fbFieldsMappingValidationCount = 0;
$('.accordion--form__next-btn').on('click touchstart', function() {

  var LeadIntegration = $("#integration-header").text();

  var parentWrapper = $(this).parent().parent();
  var nextWrapper = $(this).parent().parent().next('.accordion--form__fieldset');
  var sectionFields = $(this).siblings().find('.required');

  //Validate the .required fields in this section
  var empty = $(this).siblings().find('.required').filter(function() {
    return this.value === "";
  });

  var regExp = /^([\w\.\+]{1,})([^\W])(@)([\w]{1,})(\.[\w]{1,})+$/;
  $('.accordion--EmailId__invalid').hide();
  
  if (empty.length) {
    $('.accordion--form__invalid').show();
    empty.first().focus();
    fbFieldsMappingValidationCount = 1;
  }
  
  else if(regExp.test($("#User_Mail").val())==false && regExp.test($("#magicbricks_User_Mail").val())==false && regExp.test($("#indiaMart_User_Mail ").val())==false && LeadIntegration  != 'Google Lead Form Extensions' && LeadIntegration  != 'Facebook Lead Ads' ) {

      $('.accordion--EmailId__invalid').show();
      $("[type='email']").focus();
    }
  else {
      $('.accordion--EmailId__invalid').hide();
      $('.accordion--form__invalid').hide();
      fbFieldsMappingValidationCount = 2;

    //On the next fieldset -> accordion wrapper, toggle the active class
    nextWrapper.find('.accordion--form__wrapper').addClass('accordion--form__wrapper-active');

    //Close the others
    parentWrapper.find('.accordion--form__wrapper').removeClass('accordion--form__wrapper-active');

    //Add a class to the parent legend
    nextWrapper.find('.accordion--form__legend').addClass('accordion--form__legend-active');

    //Remove the active class from the other legends
    parentWrapper.find('.accordion--form__legend').removeClass('accordion--form__legend-active');

    parentWrapper.find('.accordion--form__legend').prepend('<span class="material-icons down_arrow">keyboard_arrow_down</span>');
    parentWrapper.find('.accordion--form__legend').append('<span class="material-icons check_circle">check_circle</span>');
  }
  return false;
});

$(document).on("change", ".Facebook_Select, .Facebook_Page_Select, .Facebook_Form_Select, .Facebook_Mapping_Select", function(){

    var facebookSelect  = $(this).val();
    if(facebookSelect){
      $(".accordion--form__invalid").hide();
    }else{
      $(".accordion--form__invalid").show();
    }
});
</script>

<div class="button-container">
    <button class="btn btn-primary" data-action="save">{{translate 'Save'}}</button>
    <button class="btn btn-default" data-action="cancel">{{translate 'Cancel'}}</button>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-body panel-body-form">
                <div class="cell form-group" data-name="enabled">
                    <label class="control-label" data-name="enabled">{{translate 'enabled' scope='Integration' category='fields'}}</label>
                    <div class="field" data-name="enabled">{{{enabled}}}</div>
                </div>
                {{#each dataFieldList}}
                    <div class="cell form-group" data-name="{{./this}}">
                        <label class="control-label" data-name="{{./this}}">{{translate this scope='Integration' category='fields'}}</label>
                        <div class="field" data-name="{{./this}}">{{{var this ../this}}}</div>
                    </div>
                {{/each}}
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        {{#if helpText}}
        <div class="well">
            {{complexText ../helpText}}
        </div>
        {{/if}}
    </div>
</div>

<!------------------------- FACEBOOK INTEGRATION SCRIPTS ---------------------------->
<script>
  //GET APP ID
  var FACEBOOKAPPID = '';
  $.ajax({
      type: "GET",
      url: '../../client/res/templates/lead_api/facebook/getAppId.php',
      dataType  : "json",
      success: function(data) {
          FACEBOOKAPPID   = data.appId;
      }
  });

  window.fbAsyncInit = function() {
    FB.init({
      appId      : FACEBOOKAPPID,
      xfbml      : true,
      version    : 'v9.0'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  function subscribeApp(page_id, page_access_token) {

    /* leadgenration forms fields mapping */
    FB.api(
        '/' + page_id + '/leadgen_forms/',
        {access_token: page_access_token},

        function (response) {

          if (response && !response.error) {

            /* handle the result */
            var forms =   response.data;
            var j     =   1;

            //EMPTY FORM SELECT
            $(".Facebook_Form_Select").val('');

            var data_Form = '<option value=""></option>';

            for (var i = 0, len = forms.length; i < len; i++) {
              var form = forms[i];
              data_Form += '<option value="'+form.id+','+page_id+','+page_access_token+'">'+ form.name + '</option>';
            }

            //CHOOSE FORM
            $('.Facebook_Form_Select').empty();
            $('.Facebook_Form_Select').html(data_Form);

            //HIDE VALIDATION
            $(".accordion--form__invalid").hide();

          } else {
            console.log('leadgen forms error' + JSON.stringify(response));
          }
        }
    );

    // subscribed page
    FB.api(
      '/' + page_id + '/subscribed_apps',
      'post',
      {access_token: page_access_token, subscribed_fields: ['leadgen']},
      function(response) {
        //console.log('Successfully subscribed page', response);
      }
    );
  }

  var facebookUserId = '';

  // Only works after `FB.init` is called
  function myFacebookLogin() {

    FB.login( function( response ) {

      FB.api('/me?fields=name,email', function(response) {

        //ADD SELECT ACCOUNT USERS
        $('.Facebook_Select').empty();
        var data = ["",response.name];
        var placeholder = "Facebook Lead Ads Account";
        $(".Facebook_Select").select2({
            data: data,
            placeholder: placeholder,
            allowClear: true,
            minimumResultsForSearch: 5
        });

        $(".accordion--form__invalid").hide();

        //SET USER LOGIN IMAGE
        var userImage = "//graph.facebook.com/"+response.id +"/picture?type=large";
        $('.input_img').attr('src', userImage);

        facebookUserId = response.id;

        insertUserDetails(page.name,page.id, page.access_token, response.id, response.name,response.email, userImage);

        //RETRIVE ALL PAGES
        FB.api('/me/accounts', function(response1) {

          var pages       =  response1.data;
          var data_page   =  [""];

          //var ul = document.getElementById('.Facebook_Page_Select');
          for (var i = 0, len = pages.length; i < len; i++) {
            var page = pages[i];
            var page_access_token = page.access_token;

            //INSERT USER DETAILS
            insertUserDetails(page.name,page.id, page.access_token, response.id, response.name,response.email, '');

            data_page.push(page.name);
          }

          //ADD CHOOSE PAGES OPTIONS
          $('.Facebook_Page_Select').empty();
          var placeholder_page = "Choose Page...";
          $(".Facebook_Page_Select").select2({
              data: data_page,
              placeholder: placeholder_page,
              allowClear: true,
              minimumResultsForSearch: 5
          });

          //HIDE VALIDATION
          $(".accordion--form__invalid").hide();

        });
      });
    }, {scope: ['leads_retrieval','public_profile','email','pages_show_list']}); //'manage_pages','ads_management',
  }

  // showing selected form fields data
  function getFormFields( form_id, page_id, pageAccessToken, facebookUserId ) {
     
    // get fields data
    FB.api(
        '/' + form_id + '/leads',
      {access_token: pageAccessToken},
        function (response) {

          if (response && !response.error) {

            //GET FORM FIELD MAPPING
            formFieldMapping(JSON.stringify(response.data), page_id, form_id, facebookUserId); 

          }else {
            console.log('forms fields error' + JSON.stringify(response));
          }
        }
    );
  }

  // SAVE USER DETAILS
  function insertUserDetails(page_name, page_id, page_access_token, user_id, user_name, user_email, user_image) {

    $.ajax({
        type: "GET",
        url: '../../client/res/templates/lead_api/facebook/saveUserDetails.php',
        data: { page_name : page_name, page_id : page_id, page_access_token : page_access_token, user_id : user_id,user_name : user_name,user_email : user_email, user_image : user_image  },
        dataType  : "json",
        success: function(data) { 
            if(data.status == 'error') {
              $.alert({
                title: 'Alert!',
                content: data.msg,
                type: 'dark',
                typeAnimated: true
              });

              $('.facebook_login_set').find('.accordion--form__wrapper').removeClass('accordion--form__wrapper-active');

              $('.facebook_login_set').find('.accordion--form__wrapper').addClass('accordion--form__wrapper-active');

              $(".facebook_login_set").find('.accordion--form__legend .down_arrow').remove();

              $(".facebook_login_set").find('.accordion--form__legend .check_circle').remove();
            }
         }
    });
  }

  // SHOWING FORM FIELD MAPPING
  function formFieldMapping(response, page_id, form_id, facebookUserId) {

    $.ajax({
        type: "GET",
        url: '../../client/res/templates/lead_api/facebook/formFieldsData.php',
        data: { formFields : response, page_id : page_id, form_id : form_id, facebookUserId : facebookUserId  },
        dataType : 'html',
        success: function(data) {
            $('.facebookFieldMappingHtml').html(data);
            $('.Facebook_Mapping_Select').select2({
               data: [""],
              placeholder: "Please Select",
              allowClear: true
            });
        }
    });
  }

  //GET SELECTED PAGE ID & ACCESS TOKEN
  $(document).on("change" , ".Facebook_Page_Select", function (event) {

    event.preventDefault();
    event.stopImmediatePropagation();

    var pageName          =   $(".Facebook_Page_Select").val();
    var pageId            =   '';
    var pageAccessToken   =   '';

    $.ajax({
          type: "GET",
          url: '../../client/res/templates/lead_api/facebook/getPageDetails.php',
          data: { pageName : pageName, facebookUserId : facebookUserId  },
          dataType  : "json",
          success: function(data) {
              pageId           = data.pageId;
              pageAccessToken  = data.pageAccessToken;
              //console.log("page id = "+ pageId + "--access token = "+ pageAccessToken);
              subscribeApp(pageId, pageAccessToken);
          }
      });
  });

  //GET SELECTED FORM ID & PAGE ID
  $(document).on("change" , ".Facebook_Form_Select", function (event) {
    
    event.preventDefault();
    event.stopImmediatePropagation();

    var formId          = '';
    var pageId          = '';
    var pageAccessToken = '';

    var facebookUser    =   $(".Facebook_Form_Select").val();

    facebookUser    =   facebookUser.split(',');
    formId          =   facebookUser[0];
    pageId          =   facebookUser[1];
    pageAccessToken =   facebookUser[2];

    //GET SELETECTED FORM FIELDS
    getFormFields(formId, pageId, pageAccessToken, facebookUserId);

  });

  //SUBMIT FORM
  $(".facebookFormSumbmit").click( function(){

    if(fbFieldsMappingValidationCount == 2){

      var form  = $('.facebookForm');
      form      = new FormData(form[0]);
      $.ajax({
        type   : "POST",
        url   : '../../client/res/templates/lead_api/facebook/savaFacebookFiledMapping.php',
        data    : form,
        dataType  : "json",
        processData : false,
        contentType : false,
        success: function(data) {
          
          if(data.status == 'true') {
            $.alert({
              title: 'Alert!',
              content: data.msg,
              type: 'dark',
              typeAnimated: true,
            });

            $(".Facebook_Select").val("");
            $(".Facebook_Form_Select").val("");
            $(".Facebook_Page_Select").val("");
            $(".Facebook_Mapping_Select").val("");

            //LOGOUT USER
            FB.logout();
          }else {
            $.alert({
              title: 'Alert!',
              content: data.msg,
              type: 'dark',
              typeAnimated: true
            });

            $('.facebook_field_set').find('.accordion--form__wrapper').removeClass('accordion--form__wrapper-active');

            $('.facebook_field_set').find('.accordion--form__wrapper').addClass('accordion--form__wrapper-active');

            $(".facebook_field_set").find('.accordion--form__legend .down_arrow').remove();

            $(".facebook_field_set").find('.accordion--form__legend .check_circle').remove();
          }
        }
      });
    }
  });
</script>

<!----------------------- END FACEBOOK INTEGRATION SCRIPTS ------------------------->

<div class="Lead_Integration Facebook">
   <div class="row">
      <div class="col-md-8 plr0">
         <form class="accordion--form facebookForm" method="POST">
            <fieldset class="accordion--form__fieldset facebook_login_set" id="fieldset-one">
               <legend class="accordion--form__legend accordion--form__legend-active">Choose Account</legend>
               <div class="accordion--form__wrapper accordion--form__wrapper-active">
                  <div class="col-md-12">
                     <div class="form-group" style="position: relative;">
                        <span class="btn btn-primary" style="width:100%;" scope="public_profile,email" onclick="myFacebookLogin()">Sign in to Facebook Lead Ads</span>
                        <div class="Facebook_img">
                           <img src="{{basePath}}client/img/facebook.png" id="input_img">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">Facebook Lead Ads Account <span class="text-danger">*</span></label> <br />
                        <select class="accordion--form__text required Facebook_Select" name="name" id="name" required style="width: 100%"></select>
                        <img src="{{basePath}}client/img/facebook.png" class="input_img">
                     </div>
                  </div>
                  <div class="accordion--form__invalid">Please enter required fields</div>
                  <a class="accordion--form__next-btn text-uppercase btn btn-primary col-md-12" style="width: 98%;">To Continue, Finish Rqequired Fields</a>
               </div>
            </fieldset>
            <fieldset class="accordion--form__fieldset" id="fieldset-two">
               <legend class="accordion--form__legend">Choose Page & Form</legend>
               <div class="accordion--form__wrapper">
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="Page">Page <span class="text-danger">*</span></label> <br />
                        <select class="accordion--form__textarea required Facebook_Page_Select for form-control" name="page" id="page" style="width: 100%" required>
                        </select>
                        <img src="{{basePath}}client/img/facebook.png" class="input_img">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="form">Form <span class="text-danger">*</span></label> <br />
                        <select class="accordion--form__textarea required Facebook_Form_Select for form-control" name="form" id="form" style="width: 100%">
                        </select>
                        <img src="{{basePath}}client/img/facebook.png" class="input_img">
                     </div>
                  </div>
                  <div class="accordion--form__invalid">Please enter all required fields</div>
                 
                  <a class="accordion--form__next-btn btn btn-primary text-uppercase" style="width: 98%">Continue</a>
               </div>
            </fieldset>
            <fieldset class="accordion--form__fieldset facebook_field_set" id="fieldset-four">
               <legend class="accordion--form__legend"> Field Mapping</legend>
               <div class="accordion--form__wrapper">
                  <div class="accordion--form__row facebookFieldMappingHtml">
                    
                  </div>
                  <a class="accordion--form__next-btn btn btn-primary text-uppercase facebookFormSumbmit" style="width: 98%">Continue</a>
               </div>
            </fieldset>
            <!-- <fieldset class="accordion--form__fieldset" id="fieldset-five">
               <legend class="accordion--form__legend"> Send Data</legend>
               <div class="accordion--form__wrapper">
                   <div class="accordion--form__row col-xs-12">
                        <div class="col-xs-7 find_data" style="margin-top: -25px;">
                            <h5>Send Test Lead to FinCRM</h5>
                            <p>To Test FinCRM, We need to create a new lead. This is what will be created:</p>
                        </div>
                   </div>
                  <div class="accordion--form__row Send_data">
                     <div class="col-md-12">
                        <div class="form-group">
                           <p class="Send_data_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                     </div>
                  </div>
                  <div class="accordion--form__row">
                     <div class="col-md-6">
                        <div class="">
                           <input class="accordion--form__button btn btn-info" id="Send_test_review" type="button" name="button" value="Test & Review" style="width: 100%;">
                           <img src="{{basePath}}client/img/loader.gif" class="loader_img" alt="loader">
                        </div>
                     </div>
                  </div>
                  <a class="accordion--form__next-btn btn btn-primary text-uppercase" style="width: 45%;position: relative;top: -9px;">Test & Continue</a>
                  <div class="accordion--form__row Send_data_Main">
                     <div class="col-md-12">
                        <div class="form-group">
                           <p class="Send_data_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <button class="btn btn-info pull-right text-uppercase">Continue</button>
                     </div>
                  </div>
               </div>
            </fieldset> -->
         </form>
      </div>
   </div>
</div>

<script type="text/javascript">
  var today       = new Date();
  var dd    = today.getDate();
  var mm    = today.getMonth()+1; 
  var yyyy  = today.getFullYear();

  var hrs     = today.getHours();
  var mints   = today.getMinutes();
  var sec     = today.getSeconds();

  document.getElementById("google_key").value = 'FinCRM@' + hrs + dd + mints + mm + sec + yyyy + hrs  + mints  + sec;
  //console.log('FinCRM@' + dd + '-' + mm + '-' + yyyy + '-' + hrs  + mints  + sec);
</script>

<div class="Lead_Integration Google">
   <div class="row">
      <div class="col-md-8 plr0">
         <form class="accordion--form" id="add-google-form" action="../../client/res/templates/lead_api/google.com/saveUserDetails.php" enctype="multipart/form-data" method="post" autocomplete="off">
            <fieldset class="accordion--form__fieldset" id="fieldset-one">
               <legend class="accordion--form__legend accordion--form__legend-active">Set Up Webhook</legend>
               <div class="accordion--form__wrapper accordion--form__wrapper-active">
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">Webhook URL for Google Lead Form Extensions <span class="text-danger">*</span></label> <br />

                      <div class="copy form-group">
                        <div class="copy_contents">
                          <input type="text" class="accordion--form__text required form-control " name="google_name" id="google_name" value="" required style="width:100%;" readonly="">
                          <img src="{{basePath}}client/img/google.png" class="input_img">
                          <button type="button" class="btn copy_button">Copy</button>
                        </div>
                      </div>
                                            
                     </div>
                  </div>

                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">Google Key <span class="text-danger">*</span></label> <br />

                        <div class="copy form-group">
                          <div class="copy_contents">
                            <input type="text" class="accordion--form__text required form-control" name="google_key" id="google_key" value="" required style="width:100%;" readonly="">
                            <img src="{{basePath}}client/img/google.png" class="input_img">
                            <button type="button" class="btn copy_button_key">Copy</button>
                          </div>
                        </div>
                     </div>
                     <div class="find_data">
                       <p>Log into Google Ads and paste the above values into the Webhook URL & google key field for your lead form.</p>
                     </div>
                  </div>
                  <div class="accordion--form__invalid">Please enter required field</div>
                  <a class="accordion--form__next-btn text-uppercase btn btn-primary col-md-12" style="width: 98%;">Continue</a>
               </div>
            </fieldset>
            <fieldset class="accordion--form__fieldset" id="fieldset-three">
               <legend class="accordion--form__legend"> Find Data</legend>
               <div class="accordion--form__wrapper text-center">
                  <div class="accordion--form__row">
                     <div class="col-md-12">
                        <h4 class="text-center">Test your trigger</h4>
                        <div class="find_data text-center">
                           <p>Send a request to this webhook URL:</p>
                           <p>https://www.google.com/ then test your trigger.</p>
                        </div>
                     </div>
                  </div>
                  <a class="accordion--form__next-btn btn btn-primary text-center get_field_mapping_data">Test trigger</a>
                  <div class="accordion--form__row Form_data_Main">
                     <div class="col-md-12">
                        <div class="form-group">
                           <p class="Form_data_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                     </div>
                  </div>
                   <a class="accordion--form__next-btn btn btn-info text-uppercase pull-right Form_data_Main">Continue</a>
               </div>
            </fieldset>
            <fieldset class="accordion--form__fieldset google_field_set" id="fieldset-four">
               <legend class="accordion--form__legend"> Field Mapping</legend>
               <div class="accordion--form__wrapper">
                  <div class="accordion--form__row">
                    <!-- field mapping data -->
                    <div class="field_mapping_data"></div>
                    <div class="col-md-12">
                       <div class="accordion--form__row" style="position: relative;">
                          <label class="accordion--form__label" for="name">Assigned User <span class="text-danger">*</span></label> <br />

                          <div class="form-group">
                            <div class="99acres_contents">
                              <select class="form-control accordion--form__text required Acres_Select add-assigned-user" name="assigned_user" required style="width: 100%">
                              </select>
                              <img src="{{basePath}}client/img/google.png" class="input_img">
                            </div>
                          </div>
                       </div>
                    </div>

                   <div class="accordion--form__invalid">Please enter all required fields</div>

                    <div class="col-md-12">
                       <div class="form-group">
                        <span class="btn btn btn-info get_field_mapping_data" style="cursor: pointer;"><span class="material-icons-outlined">refresh</span> Refresh Field</span>
                        </div>
                    </div>
                  </div>
                  <!--  <a class="accordion--form__prev-btn">Prev</a> -->
                  <a class="accordion--form__next-btn btn btn-primary text-uppercase" style="width: 98%" id="submit_google_form">Submit</a>
                 
               </div>
            </fieldset>
         </form>
      </div>
   </div>
</div>

<script>
  var callbackURL   =  window.location.origin;
  callbackURL       =  callbackURL + '/task_cron/api_crons/callbackURL.php';
  $('#google_name').val(callbackURL);
  var google_testing = 0;
 //get a google form field mapping data
 $(".get_field_mapping_data").click( function(){
  var google_key = $('#google_key').val();

    $.ajax({
      type    : "GET",
      url     : "../../client/res/templates/lead_api/google.com/get_field_mapping_data.php?google_key="+google_key,
      dataType  : "json",
      processData : false,
      contentType : false,
      success: function(data)
      {
         if(data.status == 'true'){
           $('.field_mapping_data').html(data.data);
           google_testing = 1;
         }
         else{
            $('.field_mapping_data').html(data.data);
            google_testing = 2;
         }
      }
    });
});

  //submit google form
  $("#submit_google_form").click( function(){

    if(google_testing == 2)
    {
       $.alert({
              title: 'Alert!',
              content: "Please add callback URL & google key in your google ads manager and refresh field if there are any changes.",
              buttons: {
                  Ok: {
                      keys: ['Y'],
                      action:function(){
                           
                         $('.google_field_set').find('.accordion--form__wrapper').removeClass('accordion--form__wrapper-active');

                         $('.google_field_set').find('.accordion--form__wrapper').addClass('accordion--form__wrapper-active');

                          $(".google_field_set").find('.accordion--form__legend .down_arrow').remove();

                          $(".google_field_set").find('.accordion--form__legend .check_circle').remove();
                      },
                      btnClass: 'btn-primary'
                  }
              },
              type: 'dark',
              typeAnimated: true
          });
      return false;
    }
  //event.preventDefault();
    var form  = $('#add-google-form');
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
        if(data.status == 'true')
        {
          $.alert({
                    title: 'Alert!',
                    content: data.msg,
                     type: 'dark',
                     typeAnimated: true,
                });
        }
        else{
              $.alert({
              title: 'Alert!',
              content: data.msg,
              type: 'dark',
              typeAnimated: true
          });
        }
      }
    });

    return false;
});

</script>


<div class="Lead_Integration 99acres lead_acres" id="99acres_show_panel">
   <div class="row">
      <div class="col-md-8 plr0">
         <form class="accordion--form" id="add-99acres-form" action="../../client/res/templates/lead_api/99acres.com/saveUserDetails.php" enctype="multipart/form-data" method="post" autocomplete="off" >
            <input type="hidden" name="lead_sorce" value="99acres.com">
            <fieldset class="accordion--form__fieldset" id="account_details">
               <legend class="accordion--form__legend accordion--form__legend-active" >Enter Account Details</legend>
               <div class="accordion--form__wrapper accordion--form__wrapper-active">
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">User Name <span class="text-danger">*</span></label> <br />

                        <div class="form-group">
                          <div class="99acres_contents">
                            <input type="text" class="accordion--form__text required form-control" name="User_Name" id="User_Name" placeholder="User Name" value="" required style="width:100%;">
                            <img src="{{basePath}}client/img/99acres.png" class="input_img">
                          </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">Email-Id <span class="text-danger">*</span></label> <br />

                        <div class="form-group">
                          <div class="99acres_contents">
                            <input type="email" class="accordion--form__text required form-control User_Mail" name="User_Mail" placeholder="Email_Id" id="User_Mail" value="" required style="width:100%;">
                            <img src="{{basePath}}client/img/99acres.png" class="input_img">
                          </div>
                        </div>
                     </div>
                     <span class="accordion--EmailId__invalid text-danger">Please enter valid email_id.</span>
                  </div>
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">Assigned User <span class="text-danger">*</span></label> <br />

                        <div class="form-group">
                          <div class="99acres_contents">
                            <select class="form-control accordion--form__text required Acres_Select add-assigned-user" name="assigned_user" required style="width: 100%">
                            </select>
                              <img src="{{basePath}}client/img/99acres.png" class="input_img">
                            <!-- <select class="accordion--form__text required Acres_Select" name="Assigned_User" id="Assigned_User" required style="width: 100%"></select>
                            <img src="{{basePath}}client/img/99acres.png" class="input_img"> -->
                            
                          </div>
                        </div>
                     </div>
                  </div>
                  <div class="accordion--form__invalid">Please enter all required fields</div>
                  <a class="accordion--form__next-btn text-uppercase btn btn-primary col-md-12 99acres_submit" style="width: 98%;">Continue</a>
               </div>
            </fieldset>
             <fieldset class="accordion--form__fieldset" id="Instruction_detail">
               <legend class="accordion--form__legend"> Instructions to Setup Email Forwarding</legend>
               <div class="accordion--form__wrapper">
                  <div class="accordion--form__row Send_data">
                     <div class="col-md-12">
                        <div class="form-group">
                           <p class="Instructions">
                                <ul>
                                    <li>Go to your email settings.</li>
                                    <li>Click on 'Forwarding and POP/IMAP'</li>
                                    <li>Click on "Add a forwarding address" and enter this email id "99acres.fincrm@gmail.com" and click Next. </li>
                                    <li>A confirming forwarding address window will appear. Press proceed.</li>
                                    <li>Within few moments, you will receive the confirmation OTP on your email. </li>
                                    <li>Check your email. Enter the code recieved in the forwarding settings and click on verify.</li>
                                    <li>Then click on "Filters & Blocked Addresses"</li>
                                    <li>After that click on "Create New Filter".</li>
                                    <li>In the from field, type "no-reply@99acres.com" (only forwards mails from this email id)</li>
                                    <li>Click on create filter.</li>
                                    <li>Select Forward it to: 99acres.fincrm@gmail.com from the list of options.</li>
                                    <li>Click on create filter.</li>
                                    <li>Your email forwarding setup is now complete.</li>
                                </ul>
                           </p>
                        </div>
                     </div>
                  </div>
                  <a id="add_99acres_form" class="accordion--form__next-btn btn btn-primary text-uppercase" style="width: 98%;">Submit</a>
               </div>
            </fieldset>
         </form>
      </div>
   </div>
</div>
<script>
  //add 99acres form
  $("#add_99acres_form").click( function(){

  //event.preventDefault();
    var form  = $('#add-99acres-form');
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
        if(data.status == 'true')
        {
          $.alert({
                    title: 'Alert!',
                    content: data.msg,
                     type: 'dark',
                     typeAnimated: true,
                });
        }
        if(data.status != 'true'){
              $.alert({
              title: 'Alert!',
              content: data.msg,
              buttons: {
                  Ok: {
                      keys: ['Y'],
                      action:function(){
                           
                          $('#Instruction_detail').find('.accordion--form__wrapper').removeClass('accordion--form__wrapper-active');

                          $('#Instruction_detail').find('.accordion--form__legend').removeClass('accordion--form__legend-active');

                          $('#account_details').find('.accordion--form__wrapper').addClass('accordion--form__wrapper-active');

                          $('#account_details').find('.accordion--form__legend').addClass('accordion--form__legend-active');

                           

                          $("#account_details").find('.accordion--form__legend .down_arrow').remove();

                          $("#account_details").find('.accordion--form__legend .check_circle').remove();

                          $("#Instruction_detail").find('.accordion--form__legend .down_arrow').remove();

                          $("#Instruction_detail").find('.accordion--form__legend .check_circle').remove();

                      },
                      btnClass: 'btn-primary'
                  }
              },
              type: 'dark',
              typeAnimated: true
          });
        }
      }
    });

    return false;
});

</script>

<div class="Lead_Integration indiaMart">
   <div class="row">
      <div class="col-md-8 plr0">
         <form class="accordion--form" id="add-indiaMart-form" action="../../client/res/templates/lead_api/99acres.com/saveUserDetails.php" enctype="multipart/form-data" method="post" autocomplete="off">
            <input type="hidden" name="lead_sorce" value="indiaMart.com" >
            <fieldset class="accordion--form__fieldset" id="indiamart_account_details">
               <legend class="accordion--form__legend accordion--form__legend-active">Enter Account Details</legend>
               <div class="accordion--form__wrapper accordion--form__wrapper-active">
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">User Name <span class="text-danger">*</span></label> <br />

                        <div class="form-group">
                          <div class="indiaMart_contents">
                            <input type="text" class="accordion--form__text required form-control" name="User_Name" id="indiaMart_User_Name" placeholder="User Name" value="" required style="width:100%;">
                            <img src="{{basePath}}client/img/indiaMart.png" class="indiaMart_input_img">
                          </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">Email-Id <span class="text-danger">*</span></label> <br />

                        <div class="form-group">
                          <div class="indiaMart_contents">
                            <input type="email" class="accordion--form__text required form-control User_Mail" name="User_Mail"  placeholder="Email_Id" id="indiaMart_User_Mail" value="" required style="width:100%;">
                            <img src="{{basePath}}client/img/indiaMart.png" class="indiaMart_input_img">
                          </div>
                        </div>
                     </div>
                     <span class="accordion--EmailId__invalid text-danger">Please enter valid email_id.</span>
                  </div>
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">Assigned User <span class="text-danger">*</span></label> <br />

                        <div class="form-group">
                          <div class="indiaMart_contents">
                            <select class="form-control accordion--form__text required Acres_Select add-assigned-user" name="assigned_user" required style="width: 100%">
                            </select>
                            <!-- <select class="accordion--form__text required Acres_Select" name="indiaMart_Assigned_User" id="indiaMart_Assigned_User" required style="width: 100%"></select>-->
                            <img src="{{basePath}}client/img/indiaMart.png" class="indiaMart_input_img">
                          </div>
                        </div>
                     </div>
                  </div>
                  <div class="accordion--form__invalid">Please enter all required fields</div>
                  <a class="accordion--form__next-btn text-uppercase btn btn-primary col-md-12 indiaMart_submit" style="width: 98%;">Continue</a>
               </div>
            </fieldset>
             <fieldset class="accordion--form__fieldset" id="indiamart_instructions_details">
               <legend class="accordion--form__legend"> Instructions to Setup Email Forwarding</legend>
               <div class="accordion--form__wrapper">
                  <div class="accordion--form__row Send_data">
                     <div class="col-md-12">
                        <div class="form-group">
                           <p class="Instructions">
                                <ul>
                                    <li>Go to your email settings.</li>
                                    <li>Click on 'Forwarding and POP/IMAP'</li>
                                    <li>Click on "Add a forwarding address" and enter this email id "indiamart.fincrm@gmail.com" and click Next. </li>
                                    <li>A confirming forwarding address window will appear. Press proceed.</li>
                                    <li>Within few moments, you will receive the confirmation OTP on your email. </li>
                                    <li>Check your email. Enter the code recieved in the forwarding settings and click on verify.</li>
                                    <li>Then click on "Filters & Blocked Addresses"</li>
                                    <li>After that click on "Create New Filter".</li>
                                    <li>In the from field, type "buyershelp+enq@indiamart.com" (only forwards mails from this email id)</li>
                                    <li>Click on create filter.</li>
                                    <li>Select Forward it to: indiamart.fincrm@gmail.com from the list of options.</li>
                                    <li>Click on create filter.</li>
                                    <li>Your email forwarding setup is now complete.</li>
                                </ul>
                           </p>
                        </div>
                     </div>
                  </div>
                  <a id="add_indiaMart_form" class="accordion--form__next-btn btn btn-primary text-uppercase" style="width: 98%;">Submit</a>
                  <!--  <a class="accordion--form__prev-btn">Prev</a> -->
               </div>
            </fieldset>
         </form>
      </div>
   </div>
</div>
<script>
  //add india mart form
  $("#add_indiaMart_form").click( function(){

  //event.preventDefault();
    var form  = $('#add-indiaMart-form');
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
        if(data.status == 'true')
        {
          $.alert({
                    title: 'Alert!',
                    content: data.msg,
                     type: 'dark',
                     typeAnimated: true,
                });
        }
        
        if(data.status != 'true'){
              $.alert({
              title: 'Alert!',
              content: data.msg,
              buttons: {
                  Ok: {
                      keys: ['Y'],
                      action:function(){
                           
                          $('#indiamart_instructions_details').find('.accordion--form__wrapper').removeClass('accordion--form__wrapper-active');

                          $('#indiamart_instructions_details').find('.accordion--form__legend').removeClass('accordion--form__legend-active');

                          $('#indiamart_account_details').find('.accordion--form__wrapper').addClass('accordion--form__wrapper-active');

                          $('#indiamart_account_details').find('.accordion--form__legend').addClass('accordion--form__legend-active');

                          $("#indiamart_account_details").find('.accordion--form__legend .down_arrow').remove();

                          $("#indiamart_account_details").find('.accordion--form__legend .check_circle').remove();

                          $("#indiamart_instructions_details").find('.accordion--form__legend .down_arrow').remove();

                          $("#indiamart_instructions_details").find('.accordion--form__legend .check_circle').remove();


                      },
                      btnClass: 'btn-primary'
                  }
              },
              type: 'dark',
              typeAnimated: true
          });
        }
      }
    });

    return false;
});

// get assigned users
$.ajax({
  type    : "GET",
  url     : "../../client/res/templates/lead_api/assigned_users.php",
  dataType  : "json",
  processData : false,
  contentType : false,
  success: function(data)
  {
     if(data){
       $('.add-assigned-user').html(data.data);
       var Acres_placeholder = "Assigned User";
        $(".Acres_Select").select2({
            placeholder: Acres_placeholder,
            allowClear: true,
            minimumResultsForSearch: 5
        });
     }
  }
});
</script>
<div class="Lead_Integration magicbricks">
   <div class="row">
      <div class="col-md-8 plr0">
         <form class="accordion--form" id="add-magicbricks-form" action="../../client/res/templates/lead_api/99acres.com/saveUserDetails.php" enctype="multipart/form-data" method="post" autocomplete="off">
            <input type="hidden" name="lead_sorce" value="magicbricks.com">
            <fieldset class="accordion--form__fieldset" id="magicbricks_account_details">
               <legend class="accordion--form__legend accordion--form__legend-active">Enter Account Details</legend>
               <div class="accordion--form__wrapper accordion--form__wrapper-active">
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">User Name <span class="text-danger">*</span></label> <br />

                        <div class="form-group">
                          <div class="magicbricks_contents">
                            <input type="text" class="accordion--form__text required form-control" name="User_Name" id="magicbricks_User_Name" placeholder="User Name" value="" required style="width:100%;">
                            <img src="{{basePath}}client/img/magicbricks.png" class="magicbricks_input_img">
                          </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">Email-Id <span class="text-danger">*</span></label> <br />

                        <div class="form-group">
                          <div class="magicbricks_contents">
                            <input type="email" class="accordion--form__text required form-control User_Mail" name="User_Mail"  placeholder="Email_Id" id="magicbricks_User_Mail" value="" required style="width:100%;">
                            <img src="{{basePath}}client/img/magicbricks.png" class="magicbricks_input_img">
                          </div>
                        </div>
                     </div>
                     <span class="accordion--EmailId__invalid text-danger">Please enter valid email_id.</span>
                  </div>
                  <div class="col-md-12">
                     <div class="accordion--form__row" style="position: relative;">
                        <label class="accordion--form__label" for="name">Assigned User <span class="text-danger">*</span></label> <br />

                        <div class="form-group">
                          <div class="magicbricks_contents">
                            <select class="form-control accordion--form__text required Acres_Select add-assigned-user" name="assigned_user" required style="width: 100%">
                            </select>
                           <!--  <select class="accordion--form__text required Acres_Select" name="magicbricks_Assigned_User" id="magicbricks_Assigned_User" required style="width: 100%"></select> -->
                           
                            <img src="{{basePath}}client/img/magicbricks.png" class="magicbricks_input_img">
                          </div>
                        </div>
                     </div>
                  </div>
                  <div class="accordion--form__invalid">Please enter all required fields</div>
                  <a class="accordion--form__next-btn text-uppercase btn btn-primary col-md-12 magicbricks_submit" style="width: 98%;">Continue</a>
               </div>
            </fieldset>
             <fieldset class="accordion--form__fieldset" id="magicbricks_instructions_details">
               <legend class="accordion--form__legend"> Instructions to Setup Email Forwarding</legend>
               <div class="accordion--form__wrapper">
                  <div class="accordion--form__row Send_data">
                     <div class="col-md-12">
                        <div class="form-group">
                           <p class="Instructions">
                                <ul>
                                    <li>Go to your email settings.</li>
                                    <li>Click on 'Forwarding and POP/IMAP'</li>
                                    <li>Click on "Add a forwarding address" and enter this email id "magicbricks.fincrm@gmail.com" and click Next. </li>
                                    <li>A confirming forwarding address window will appear. Press proceed.</li>
                                    <li>Within few moments, you will receive the confirmation OTP on your email. </li>
                                    <li>Check your email. Enter the code recieved in the forwarding settings and click on verify.</li>
                                    <li>Then click on "Filters & Blocked Addresses"</li>
                                    <li>After that click on "Create New Filter".</li>
                                    <li>In the from field, type "info@magicbricks.com" (only forwards mails from this email id)</li>
                                    <li>Click on create filter.</li>
                                    <li>Select Forward it to: magicbricks.fincrm@gmail.com from the list of options.</li>
                                    <li>Click on create filter.</li>
                                    <li>Your email forwarding setup is now complete.</li>
                                </ul>
                           </p>
                        </div>
                     </div>
                  </div>
                  <a id="add_magicbricks_form" class="accordion--form__next-btn btn btn-primary text-uppercase" style="width: 98%;">Submit</a>
                  <!--  <a class="accordion--form__prev-btn">Prev</a> -->
               </div>
            </fieldset>
         </form>
      </div>
   </div>
</div>

<script>
  //add magicBricks form
  $("#add_magicbricks_form").click( function(){

  //event.preventDefault();
    var form  = $('#add-magicbricks-form');
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
        if(data.status == 'true')
        {
          $.alert({
                    title: 'Alert!',
                    content: data.msg,
                     type: 'dark',
                     typeAnimated: true,
                });
        }
        
        if(data.status != 'true'){
              $.alert({
              title: 'Alert!',
              content: data.msg,
              buttons: {
                  Ok: {
                      keys: ['Y'],
                      action:function(){
                           
                          $('#magicbricks_instructions_details').find('.accordion--form__wrapper').removeClass('accordion--form__wrapper-active');

                          $('#magicbricks_instructions_details').find('.accordion--form__legend').removeClass('accordion--form__legend-active');

                          $('#magicbricks_account_details').find('.accordion--form__wrapper').addClass('accordion--form__wrapper-active');

                          $('#magicbricks_account_details').find('.accordion--form__legend').addClass('accordion--form__legend-active');

                         $("#magicbricks_account_details").find('.accordion--form__legend .down_arrow').remove();

                          $("#magicbricks_account_details").find('.accordion--form__legend .check_circle').remove();

                          $("#magicbricks_instructions_details").find('.accordion--form__legend .down_arrow').remove();

                          $("#magicbricks_instructions_details").find('.accordion--form__legend .check_circle').remove();

                      },
                      btnClass: 'btn-primary'
                  }
              },
              type: 'dark',
              typeAnimated: true
          });
        }
      }
    });

    return false;
});


$(document).ready(function(){
  $('.Acres_Select').one('select2:open', function(e) {
    $('input.select2-search__field').prop('placeholder', 'Search...');
  });
});


</script>