<div class="container content">
    <div class="col-md-2 col-md-offset-5 col-sm-8 col-sm-offset-2">
    <div id="login" class="panel panel-default">
        <div class="panel-heading">
            <div class="logo-container">
                <img src="{{logoSrc}}" class="logo">
            </div>
            <div class="row welcome">
                    <div class="">
                        <p class="sign_in_text text-center">Welcome back!</p>
                    </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="login-main-form">
                <form id="login-form" onsubmit="return false;">
                    <div class="form-group">
                        <!-- <label for="field-username">{{translate 'Username'}}</label> -->
                        <i class="material-icons-outlined usernameicon">person </i>
                        <input type="text" name="username" value="" id="field-userName" class="form-control" autocapitalize="off" autocorrect="off" tabindex="1" autocomplete="username" placeholder="User ID">
                    </div>
                    <div class="form-group">
                        <!-- <label for="login">{{translate 'Password'}}</label> -->
                        <i class="material-icons-outlined usernameicon">vpn_key</i>
                        <input type="password" name="password" value="" id="field-password" class="form-control" tabindex="2" autocomplete="current-password" placeholder="Password">
                        <span toggle="#field-password" class="fa fa-fw fa-eye-slash field-icon toggle-password passwordeyeicon"></span>
                         <!-- <i class="material-icons-outlined eye passwordeyeicon">remove_red_eye</i> -->
                    </div>
                    <div class="form-group">
                        {{#if showForgotPassword}}<a href="javascript:" class="btn btn-link pull-right" data-action="passwordChangeRequest" tabindex="4">{{translate 'Forgot Password?' scope='User'}}</a>{{/if}}
                        <button type="submit" class="btn btn-primary" id="btn-login" tabindex="3">{{translate 'Login' scope='User'}}</button>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                <a  class=" forgot_pass pull-right" href="#"><u>Forgot password?</u></a>
                            </div>
                        </div> 
                    </div>
                    <!-- <div class="form-group row Sign_up_now">
                        <div class="col-lg-12 text-center mt-3">
                            <span class=""> Don't have FinCRM account? <a href="sign_up.php" class="ml-2"><u>Sign Up Now</u></a></span>
                        </div>
                    </div> -->
                </form>
            </div>
            <div class="registered-email-form hidden" style="margin-top:25px;">
                <form id="registered_email" class="ForgotPasswordForm">

                    <div class="form-group">
                        <label for="" class="text-center" style="display: inherit;margin-bottom: 15px;">Enter your user id</label>
                        <input type="text" name="fUserName" value="" id="fUserName" class="register-email form-control" >
                        <span class="temp-error text-danger login_errors" style="display: none;">Please Enter Your user id</span>
                        <span class="temp-error-invalid text-danger login_errors" style="display: none;">Please Enter Valid user id</span>
                        <span class="login_errors text-danger ajaxMsgAppend">
                            <!-- Append ajax error or success message here -->
                        </span>
                        <input type="hidden" name="" value="" id="fEmail" class="form-control" >
                        <input type="hidden" name="" value="" id="fUserId" class="form-control" >
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary form-control" id="login-send-otp">Send OTP</button>
                    </div>
                </form>
            </div>
            <div class="otp-form hidden" style="margin-top:25px;">
                <form id="Send-Otp" class="ForgotPasswordForm">

                    <div class="form-group">
                        <h4 class="text-center form-group" style="font-weight: 600;">OTP Sent Successfully</h4>
                        <label for="" class="text-center" style="display: inherit;margin-bottom: 15px;font-size: 13px;">OTP has been sent to your registered email id and phone no.</label>
                        <input type="text" id="fOtp" name="otp" value="" class="sent-otp form-control" placeholder="Enter OTP" onkeyup="validationOTP(this)" required>
                        <div class="row" style="font-size: 12px;margin-top: 5px;">
                            <div class="col-xs-6 timerAppend">
                                <div>Expires in <span id="time" class="timer">03:00</span></div>
                            </div>
                            <div class="col-xs-6">
                                <div class="pull-right">
                                    <a href="javascript:void(0);" class="anchorResendOtp" style="color:black;"><u>Resend OTP</u></a>
                                </div>
                            </div>
                        </div>
                        <span class="temp-error text-danger login_errors" style="display: none;">Please Enter Your OTP</span>
                        <span class="login_errors text-danger ajaxMsgAppend">
                            <!-- Append ajax error or success message here -->
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary form-control" id="login-verify-otp">Verify OTP</button>
                    </div>
                </form>
            </div>
            <div class="reset-password-form hidden" style="margin-top:25px;">
                <form id="reset-password" class="ForgotPasswordForm">

                    <div class="form-group">
                        <h4 class="form-group text-center" style="font-weight: 600;">Reset your password</h4>
                        <div class="form-group newpwd">
                            <label for="">New password</label>
                            <input type="password" name="newpassword" id="New-password" value="" class="new-password form-control fPassword" placeholder="Enter a new password" onkeyup="validatePwd(this)" required>
                            <span toggle="#New-password" class="fa fa-fw fa-eye-slash field-icon toggle-password passwordeyeicon"></span>

                            <span class="temp-error text-danger login_errors" style="display: none;">Please Enter Your New Password</span>
                            <span class="temp-error-unmatch text-danger login_errors" style="display: none;">Password Doesn't Match</span>
                            <span class="temp-error-hint text-danger login_errors" style="display: none;">Password must have atleast 1 capital letter, 1 small letter, 1 special character, 1 digit and should be 8-13 characters long.</span>

                        </div>
                        <div class="form-group confirmpwd">
                            <label for="">Confirm New Password</label>
                            <input type="password" name="confirmpassword" id="Confirm-password" value="" class="confirm-password form-control fCnfPassword" placeholder="Confirm your new password" onkeyup="validatePwd(this)" required>
                            <span toggle="#Confirm-password" class="fa fa-fw fa-eye-slash field-icon toggle-password passwordeyeicon"></span>
                            <span class="temp-error text-danger login_errors" style="display: none;">Please Enter Your Confirm Password</span>
                            <span class="temp-error-unmatch text-danger login_errors" style="display: none;">Password Doesn't Match</span>
                            <span class="temp-error-hint text-danger login_errors" style="display: none;">Password must have atleast 1 capital letter, 1 small letter, 1 special character, 1 digit and should be 8-13 characters long.</span>

                        </div>
                        <span class="login_errors text-danger ajaxMsgAppend">
                            <!-- Append ajax error or success message here -->
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary form-control" id="login-reset-password">Reset my password</button>
                    </div>
                </form>
            </div>
            <div class="success-password-form hidden" style="margin-top:25px;">
                <form id="" class="ForgotPasswordForm">
                    <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                     <div class="swal2-success-circular-line-left" style="background-color: #EFF3F6;"></div>
                       <span class="swal2-success-line-tip"></span>
                       <span class="swal2-success-line-long"></span>
                       <div class="swal2-success-ring"></div> 
                       <div class="swal2-success-fix" style="background-color: #EFF3F6;"></div>
                       <div class="swal2-success-circular-line-right" style="background-color: #EFF3F6;"></div>
                      </div>
                    <div class="form-group">
                        <h4 class="text-center form-group" style="font-weight: 600;">Successful password reset!</h4>
                        <label for="" class="text-center" style="display: inherit;margin-bottom: 15px;font-size: 13px;">You can now use your new password to log in to your account!</label>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary form-control" id="login-success-password">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- <footer class="container">{{{footer}}}</footer> -->

<script type="text/javascript">
  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

</script> 
 
<script type="text/javascript">


    /* RESEND OTP */
    var append_timer = '<div>Expires in <span id="time" class="timer"></span></div>';
    var clearTimeCounter;

    function startTimer(duration, display) {
        
        var timer = duration, minutes, seconds;
        
        setInterval(function () {
            
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            
            display.textContent = minutes + ":" + seconds;
                
            if (--timer < 0) {
                timer = 0;
                if(timer == 0)
                {
                
                }
            }
                 
        }, 1000);
    }
     

    function timecounter() {
        
        $(".timerAppend").html("");
        $(".timerAppend").html(append_timer);
        
        var fiveMinutes = 60 * 3,
            display = document.querySelector('#time');
            
        // clearInterval(existingIntervalId);  
        startTimer(fiveMinutes, display);
    }


    function clearcounter() {
      
        var fiveMinutes = 0 * 3,
            display = document.querySelector('#time');
            
        // clearInterval(existingIntervalId);  
        startTimer(fiveMinutes, display);

        // clear time counter
        clearTimeout(clearTimeCounter);
    }



    /* RESEND OTP */
    $(document).on('click','.anchorResendOtp',function(){

        $(".anchorResendOtp").css("display", "none");

        if( sendOtp() == "true" ) {
        
            // clear existing timer
            clearcounter();

            // reset timer
            timecounter();
        }

        $(".anchorResendOtp").css("display", "block");

    });


    /* SEND OTP */
    function sendOtp() {

        var result = "false";
        var fUserName = $("#fUserName").val();

        $("#registered_email .ajaxMsgAppend").html("");
        $("#fEmail").val("");
        $("#fUserId").val("");

        $.ajax({
            url         : "../../../../../client/res/templates/custom_login/forgotPasswordController.php",
            type        : "get",
            datType     : "json",
            "async"       : false,
            data        : { methodName : "sendOtp", fUserName : fUserName },
            success     : function( response ) {
                
                if( response.status == "true" ) {
                    // Success
                    // $(".ajaxMsgAppend").html("<p>"+response.msg+"</p>");
                    $("#fEmail").val(response.data.fEmail);
                    $("#fUserId").val(response.data.id);
                    result = "true";
                }else{
                    // Error
                    $("#registered_email .ajaxMsgAppend").html("<p>"+response.msg+"</p>");
                    result = "false";
                }
            },
        });

        return result;

    }


    /* VERIFY OTP */
    function verifyOtp() {

        var result  = "false";
        var fUserId = $("#fUserId").val();
        var fOtp    = $("#fOtp").val();

        $("#Send-Otp .ajaxMsgAppend").html("");

        $.ajax({
            url         : "../../../../../client/res/templates/custom_login/forgotPasswordController.php",
            type        : "get",
            datType     : "json",
            "async"       : false,
            data        : { methodName : "verifyOtp", fUserId : fUserId, fOtp : fOtp },
            success     : function( response ) {
                
                if( response.status == "true" ) {
                    // Success
                    // $(".ajaxMsgAppend").html("<p>"+response.msg+"</p>");
                    result = "true";
                }else{
                    // Error
                    $("#Send-Otp .ajaxMsgAppend").html("<p>"+response.msg+"</p>");
                    result = "false";
                }
            },
        });

        return result;

    }


    /* RESET PASSWORD */
    function resetPassword() {

        var result          = "false";
        var fEmail          = $("#fEmail").val();
        var fUserId         = $("#fUserId").val();
        var fPassword       = $(".fPassword").val();
        var fCnfPassword    = $(".fCnfPassword").val();

        $("#reset-password .ajaxMsgAppend").html("");

        $.ajax({
            url         : "../../../../../client/res/templates/custom_login/forgotPasswordController.php",
            type        : "get",
            datType     : "json",
            "async"       : false,
            data        : { methodName : "resetPassword", fUserId : fUserId, fEmail : fEmail, fPassword : fPassword, fCnfPassword : fCnfPassword },
            success     : function( response ) {
                
                if( response.status == "true" ) {
                    // Success
                    // $(".ajaxMsgAppend").html("<p>"+response.msg+"</p>");
                    result = "true";
                }else{
                    // Error
                    $("#reset-password .ajaxMsgAppend").html("<p>"+response.msg+"</p>");
                    result = "false";
                }
            },
        });

        return result;

    }


    var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    function verifyEmail(element)
    {
        var val=$(element).val();
        if(val=="")
        {
            $(element).closest(".form-group").find(".temp-error").css("display","inline-block");
        }
        else if(val!="" && reg.test($(element).val()) == false)
        {
            $(element).closest(".form-group").find(".temp-error").css("display","none");
            $(element).closest(".form-group").find(".temp-error-invalid").css("display","inline-block");
        }
        else
        {
            $(element).closest(".form-group").find(".temp-error,.temp-error-invalid").css("display","none");
        }

    }


    function validationOTP(element)
    {
        $(element).closest(".form-group").find(".temp-error").css("display","none")
        if( $(element).val().length < 4 || $(element).val().length > 4)
        {
            $(element).closest(".form-group").find(".temp-error").css("display","inline-block");

        }
    }

    var regpass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,13}$/;

    function validatePwd(element)
    {
        if($(element).val()=="")
        {
            $(element).closest(".form-group").find(".temp-error").css("display","inline-block");
            $(element).closest(".form-group").find(".temp-error-hint,.temp-error-unmatch").css("display","none");

        }
        else if($(element).val()!="" && regpass.test($(element).val()) == false )
        {
         $(element).closest(".form-group").find(".temp-error,.temp-error-unmatch").css("display","none");
         $(element).closest(".form-group").find(".temp-error-hint").css("display","inline-block");
        }
        else if($(element).val()!="" && regpass.test($(element).val()) == true)
        {
         $(element).closest(".form-group").find(".temp-error-hint").css("display","none");

        }
        
        if(regpass.test($('.confirm-password').val()) == true && regpass.test($('.new-password').val()) == true && $('.confirm-password').val() != $('.new-password').val())
        {
          $(element).closest(".form-group").find(".temp-error,.temp-error-hint").css("display","none");
         $(element).closest(".form-group").find(".temp-error-unmatch").css("display","inline-block");
        }
        else if( $('.confirm-password').val() == $('.new-password').val())
        {
         $(".newpwd").find(".temp-error,.temp-error-hint,.temp-error-unmatch").css("display","none");
         $(".confirmpwd").find(".temp-error,.temp-error-hint,.temp-error-unmatch").css("display","none");
        }

    }


    $('.forgot_pass').click(function(){
        $('.welcome').hide();
        $('.login-main-form').addClass('hidden');
        $('.registered-email-form').removeClass('hidden');
    });

    $('#login-send-otp').click(function(){

        if($('.register-email').val() != '' )
        {

            if( sendOtp() == "true" ) {

                // clear existing timer
                clearcounter();

                // reset timer
                timecounter();

                $('.welcome').hide();
                $('.registered-email-form').addClass('hidden');
                $('.otp-form').removeClass('hidden');
            }
            
        }
        else
        {
            if($('.register-email').val()=="")
            {
              $(".registered-email-form .temp-error").css("display","inline-block");
            }
        }
    });

    $('#login-verify-otp').click(function(){

        if($('.sent-otp').val() != '' && $('.sent-otp').val().length == 4 )
        {
            if( verifyOtp() == "true" ) {
                $('.welcome').hide();
                $('.otp-form').addClass('hidden');
                $('.reset-password-form').removeClass('hidden');
                $(".sent-otp").val("");
            }
        }
        else
        {
            if($('.sent-otp').val() == '')
            {
                $(".otp-form .temp-error").css("display","inline-block");
            }
        }
    });

    $(document).on('click','#login-reset-password',function(){  
        
        if($('.new-password').val()==$('.confirm-password').val() && regpass.test($(".new-password").val()) == true && regpass.test($(".confirm-password").val()) == true)
        {
            if( resetPassword() == "true" ) {
                $('.welcome').hide();
                $('.reset-password-form').addClass('hidden');
                $('.success-password-form').removeClass('hidden');
                $('.new-password,.confirm-password').val("");
            }
        }
        else
        {
            if($('.new-password').val() == '')
            {
                $(".newpwd .temp-error").css("display","inline-block");
            }
            if($('.confirm-password').val() == '')
            {
                $(".confirmpwd .temp-error").css("display","inline-block");
            }
            if($('.new-password').val() != '' && regpass.test($(".new-password").val()) == false)
            {
                $(".newpwd .temp-error-hint").css("display","inline-block");

            }
            if($('.confirm-password').val() != '' && regpass.test($(".confirm-password").val()) == false)
            {
                $(".confirmpwd .temp-error-hint").css("display","inline-block");

            }
        }

    });

    $(document).on('click','#login-success-password',function(){
        $('.welcome').show();
        $('.success-password-form').addClass('hidden');
        $('.login-main-form').removeClass('hidden');
        $(".register-email,sent-otp,.new-password,.confirm-password").val('');
    });


    $('#fUserName').on('keypress',function(e) {
    if(e.which == 13) {
       $('#login-send-otp').trigger('click');
       return false;
    }

    });

    $('#fOtp').on('keypress',function(e) {
    if(e.which == 13) {
       $('#login-verify-otp').trigger('click');
       return false;
    }
    });

    $('#New-password,#Confirm-password').on('keypress',function(e) {
    if(e.which == 13) {
       $('#login-reset-password').trigger('click');
       return false;
    }
    });
</script>


