<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<h4>Login to our Account</h4>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '244980656911492',
      xfbml      : true,
      version    : 'v6.0'
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
    console.log('Subscribing page to app! ' + page_id);

    /* publishing your post on selected facebook page  */
      // FB.api(
      //     "/443194073112437/feed",
      //     {access_token: page_access_token},
      //     "POST",
      //     {
      //         "message": "This is a test message"
      //     },
      //     function (response) {
      //       if (response && !response.error) {
      //         /* handle the result */
      //         console.log('shear post Successfully ' + JSON.stringify(response));
      //       }
      //       else
      //       {
      //         console.log('shear post error ' + JSON.stringify(response));
      //       }
      //     }
      // );


    /* leadgenration forms fields mapping */
    FB.api(
        '/' + page_id + '/leadgen_forms/',
      {access_token: page_access_token},
        function (response) {
          if (response && !response.error) {
            /* handle the result */
            console.log('leadgen forms details ' + JSON.stringify(response.data));
            var forms = response.data;
            var ul = document.getElementById('list1');
            var j = 1;

            for (var i = 0, len = forms.length; i < len; i++) {
              var form = forms[i];
              var li = document.createElement('li');
              // var a = document.createElement('a');
              // a.href = 'getFormFields.php/'+form.id;

              //a.onclick = subscribeApp.bind(this, form.id, form.access_token);
              document.getElementById("demo").innerHTML = "<input id='at' type='hidden' value='"+page_access_token+"'>";
              li.innerHTML ='<a href="#" onclick = "getFormFields('+form.id+','+page_id+')">' + j + '> '+ form.name + '</a>';
              j++;
               //li.appendChild(a);
              ul.appendChild(li);
            }

          }
          else
          {
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
        console.log('Successfully subscribed page', response);
      }
    );
  }


  // Only works after `FB.init` is called
  function myFacebookLogin() {
    FB.login(function(response){
      console.log('Successfully logged in', response);

      FB.api('/me?fields=name,email', function(response) {
        console.log('Successful login for: ' + JSON.stringify(response));
        document.getElementById('status').innerHTML =
          'Thanks for logging in, ' + response.name + '!<br>Email  : '+ response.email + '<br><img src="//graph.facebook.com/'+response.id +'/picture?type=small">';
          document.getElementById('logout').innerHTML = '<a href="#" onclick="LogOut1()">LogOut</a>';

            //retrive all pages
            FB.api('/me/accounts', function(response1) {
              console.log('Successfully retrieved pages', JSON.stringify(response1));

              var pages = response1.data;
              var ul = document.getElementById('list');
              for (var i = 0, len = pages.length; i < len; i++) {
                var page = pages[i];
                var li = document.createElement('li');
                var a = document.createElement('a');
                a.href = "#";
                var page_access_token = page.access_token;
                a.onclick = subscribeApp.bind(this, page.id, page.access_token);
                a.innerHTML = page.name;
                li.appendChild(a);
                ul.appendChild(li);
                insertData(page.name,page.id, page.access_token,response.id,response.name,response.email);
              }
            });
      });


      // //retrive all pages
      //     FB.api('/me/accounts', function(response) {
      //       console.log('Successfully retrieved pages', JSON.stringify(response));

      //       var pages = response.data;
      //       var ul = document.getElementById('list');
      //       for (var i = 0, len = pages.length; i < len; i++) {
      //         var page = pages[i];
      //         var li = document.createElement('li');
      //         var a = document.createElement('a');
      //         a.href = "#";
      //         var page_access_token = page.access_token;
      //         a.onclick = subscribeApp.bind(this, page.id, page.access_token);
      //         a.innerHTML = page.name;
      //         li.appendChild(a);
      //         ul.appendChild(li);
      //         insertData(page.name,page.id, page.access_token);
      //       }
      //     });

      
    }, {scope: ['manage_pages','leads_retrieval','ads_management','public_profile','email']});
  }

// showing selected form fields data
  function getFormFields(form_id,page_id)
    {
      var page_access_token = document.getElementById('at').value;
     
      // get fields data
        FB.api(
            '/' + form_id + '/leads',
          {access_token: page_access_token},
            function (response) {
              if (response && !response.error) {

                formFieldMapping(JSON.stringify(response.data),page_id,form_id);

                /* handle the result */
                console.log('forms fields details ' + JSON.stringify(response.data));

                var forms_data = response.data;
                var ul = document.getElementById('list2');
                var j = 1;
               
                for (var i = 0, len = forms_data.length; i < len; i++) {
                  var form_data = forms_data[i];
                  var innerdata = form_data.field_data;
                  var innerlen  = innerdata.length;

                  for(var j=0; j < innerlen; j++)
                  {
                    
                    var node = document.createElement("LI");                 
                    var textnode = document.createTextNode(JSON.stringify(form_data.field_data[j]));        
                    node.appendChild(textnode);                              
                    document.getElementById("myList").appendChild(node);
                  }

                  //alert(JSON.stringify(innerlen[2]));
                  return false;

                   document.getElementById('demo1').innerHTML = JSON.stringify(form_data.field_data[1]);
                   return false;
                  
                }
               
              }
              else
              {
                console.log('forms fields error' + JSON.stringify(response));
              }
            }
        );
    }

    // LogOut to our account

    function LogOut1() {
      FB.logout(function(response) {
         // Person is now logged out
         console.log('Successful LogOut');
          location.reload();  
      });
    }

  // Inserted Login User Data
  function insertData(page_name,page_id,page_access_token,user_id,user_name,user_email)
  {
      $(document).ready(function() {
                $.ajax({
                    type: "POST",
                    url: 'insertLeadData.php',
                    data: { page_name : page_name, page_id : page_id, page_access_token : page_access_token, user_id : user_id,user_name : user_name,user_email : user_email  },
                    success: function(data)
                    {
                        //alert(data);
                        console.log("record inserted Successfully");
                    }
                });
        });
  }

  // Showing form field mapping
  function formFieldMapping(response,page_id,form_id)
  {
      $(document).ready(function() {
                $.ajax({
                    type: "POST",
                    url: 'formFieldsData.php',
                    data: { formFields : response, page_id : page_id, form_id : form_id  },
                    dataType : 'html',
                    success: function(data)
                    {
                        //alert(data);
                        //console.log("record inserted Successfully");
                        $('#formFields').html(data);
                    }
                });
        });
  }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<button scope="public_profile,email" onclick="myFacebookLogin()">Login with Facebook</button>

<br>
<div id="status">
</div>

<div id="logout">
</div>


<h4>Select Page </h4>
<ul id="list"></ul>

<h4>Select Page Forms </h4>
<ul id="list1"></ul>

<h4>Form Fields Mapping : </h4>
<div id="demo"></div>

<div id="demo1"></div>

<ul id="myList"></ul>


<h4>PHP Form Fields Mapping : </h4>
<div id="formFields"></div>

</body>
</html>

