



var captcha = null;
var latitude = "";
var longitude = "";
$(document).ready(function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLocation);
    }
});

function showLocation(position) {
    latitude = position.coords.latitude;
    longitude = position.coords.longitude;
}
function login() {
    //var recaptcha =  grecaptcha.getResponse();
   
                    
    var e = $("#loginuser_name").val(),
            s = $("#loginpass_wrd").val(),
            a = $("#WEB_URL").val(),
            o = $("#remember_me").prop("checked");
    remember = 1 == o ? "1" : "0";
    var captchaCode = $("input[name=captcha]").val();
    var type_here = $(".type_here").val();

    if (typeof latitude == undefined || latitude.length < 1) {
        $(".error_msg").show();
        $(".error_msg").addClass("alert alert-danger");
        $(".error_msg").html("Kindly allow location access and reload page for login.").delay(5000).fadeOut();
        return false;
    }

    if (e == "" && s == "")
    {
        $(".error_msg").show();
        $(".error_msg").addClass("alert alert-danger");
        $(".error_msg").text("Enter Username/Password").delay(5000).fadeOut();
        return false;
    } else if (e == "")
    {
        $(".error_msg").show();
        $(".error_msg").addClass("alert alert-danger");
        $(".error_msg").text("Enter Email ID").delay(5000).fadeOut();
        return false;
    } else if (s == "")
    {
        $(".error_msg").show();
        $(".error_msg").addClass("alert alert-danger");
        $(".error_msg").text("Enter Password").delay(5000).fadeOut();
        return false;
    } else if (isEmail(e) != true) {
        $(".error_msg").show();
        $(".error_msg").addClass('alert alert-danger');
        $(".error_msg").text("Please enter your valid email.").delay(5000).fadeOut();

    } else if (type_here == "")
    {
        $(".error_msg").show();
        $(".error_msg").addClass("alert alert-danger");
        $(".error_msg").text("Please Enter Captcha Code").delay(5000).fadeOut();
        return false;
    } else {
        
//       var cipher =Cipher('this is my passphrase', 'aes');
// var s = cipher.encrypt (s);
//var decryptedMessage = cipher.decrypt (s);


        let password = 'czsax4,<.$~2-[WR';
        let encrypted = CryptoJSAesJson.encrypt(s, password);
//let decrypted = CryptoJSAesJson.decrypt(encrypted, password)
// console.log('Decrypted:', decrypted)
 
        $.ajax({
            dataType: "json",
            type: "post",
            data: {
                user_name: e,
                pass_word: encrypted,
                remember_me: remember,
                web_url: a,
                exam_url: $('#exam_url').val(),
                captcha_code: captchaCode,
                latitude:latitude,
                longitude:longitude
            },
            beforeSend: function () {
                $(".loading").show();
            },
            url: base_url + "web/Login_register/login",
            success: function (e) {

                $(".loading").hide();
                // console.log(e);return false;
                //var e = enc(e);
                // console.log(e);
                // var obj_json = e.ciphertext;

                // console.log("data==>"+obj_json);return false;
                // var encrypted = e.ciphertext;
                // var salt = CryptoJS.enc.Hex.parse(e.salt);
                // var iv = CryptoJS.enc.Hex.parse(e.iv);   

                // var key = CryptoJS.PBKDF2('awertyujnbvcdsw314567ikmnbsw23', salt, { hasher: CryptoJS.algo.SHA512, keySize: 64/8, iterations: 999});


                // var decrypted = CryptoJS.AES.decrypt(encrypted, key, { iv: iv});

                // var e = decrypted.toString(CryptoJS.enc.Utf8);
                // if (e==undefined || e==null) {

                // }else{
                //     e = JSON.parse(e);
                //     console.log(e);
                //     console.log(e.status);
                //     return false;
                // }
                //console.log("final data==>"+e);
                if (e.status == true) {


                    if (e.exam_url != '') {
                        window.location.href = base_url + 'web/Exam_Prep';
                        //window.location.href = e.exam_url;
                    } else {
                        1 == e.status ? window.location.href = "Feeds" == a || "DailyDose" == a || "Study" == a || "Exam_Prep" == a ? base_url + "web/" + a : "Exam_Prep_v" == a ? base_url + "web/Exam_Prep/exam_type/videos" : base_url + "/" + a : (Swal.fire({title: "Error", text: e.message, type: "warning"}));
                    }
                } else if (e.status == 1010) {

                    $(".error_msg").show();
                    $(".error_msg").addClass("alert alert-danger");
                    $(".error_msg").text(e.message).delay(5000).fadeOut();
                    captcha_string = e.captcha_code;
                    captcha.generate();
                    return false;

                } else
                {
                    $(".error_msg").show();
                    $(".error_msg").addClass("alert alert-danger");
                    $(".error_msg").text(e.message).delay(5000).fadeOut();
                    return false;
                    // Swal.fire({
                    //     title: "Error",
                    //     text: e.message,
                    //     type: "warning",
                    // });
                }
            },
            error: function (e) {
                console.log("false", e)
            }
        });
    }
}

function enc(e) {
    var encrypted = e.ciphertext;
    var salt = CryptoJS.enc.Hex.parse(e.salt);
    var iv = CryptoJS.enc.Hex.parse(e.iv);

    var key = CryptoJS.PBKDF2('awertyujnbvcdsw314567ikmnbsw23', salt, {hasher: CryptoJS.algo.SHA512, keySize: 64 / 8, iterations: 999});


    var decrypted = CryptoJS.AES.decrypt(encrypted, key, {iv: iv});

    var e = decrypted.toString(CryptoJS.enc.Utf8);
    e = JSON.parse(e);
    return e;

}
function isEmail(e) {
    return /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(e)
}
$(document).ready(function () {
    $("#enter_email_mobile").click(function () {
        $(".error_forget").remove();
        var e = $("#email_mobile").val();
        if (e == "") {
            $(".error_msg").show();
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Please enter email.").delay(5000).fadeOut();
            return false;
        } else {
            var regEx = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var validEmail = regEx.test(e);
            if (!validEmail) {
                $(".error_msg").show();
                $(".error_msg").addClass("alert alert-danger");
                $(".error_msg").text("Please Enter a valid email").delay(5000).fadeOut();
                return false;
            }
        }
        $("#ajax_mobile").attr("hidden_mobile", e), $.ajax({
            type: "POST",
            dataType: "JSON",
            url: base_url + "web/Home/send_forget_otp",
            data: {
                email_mobile: e
            },
            beforeSend: function () {
                $(".loading").show();
            },
            success: function (e) {
                $(".loading").hide();

                if (e.status == true) {
                    $(".error_msg").show();
                    $(".error_msg").removeClass("alert alert-danger");
                    $(".error_msg").addClass("alert alert-success");
                    $(".error_msg").text(e.message).delay(5000).fadeOut();

                    $("#enter_email_mobile").css("display", "none");
                    $(".send-otp").css("display", "none");
                    $(".enter-otp").css("display", "block");
                    $("#enter_otps").hide();
                    $("#timer-forget").show();
                    timerforget(120);

                } else {
                    $(".error_msg").show();
                    $(".error_msg").removeClass("alert alert-success");
                    $(".error_msg").addClass("alert alert-danger");
                    $(".error_msg").text(e.message).delay(5000).fadeOut();
                    return false;
                }
            }
        });
    });
    $("#enter_otps").click(function () {
        $(".error_forget").remove();
        var e = $("#email_mobile").val();
        if (e == "") {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass(" alert-danger");
            $(".error_msg").text("Please enter email.").delay(5000).fadeOut();
            return false;
        } else {
            var regEx = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var validEmail = regEx.test(e);
            if (!validEmail) {
                $(".error_msg").show();
                $(".error_msg").removeClass("alert-success");
                $(".error_msg").addClass("alert alert-danger");
                $(".error_msg").text("Please Enter a valid email").delay(5000).fadeOut();
                return false;
            }
        }
        $("#ajax_mobile").attr("hidden_mobile", e);
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: base_url + "web/Home/send_forget_otp",
            data: {
                email_mobile: e
            },
            beforeSend: function () {
                $(".loading").show();
            },
            success: function (e) {
                $(".loading").hide();
                if (e.status == true) {

                    $("#enter_otp").css({'pointer-events': 'auto'});

                    timerforget(120);
                    $("#enter_otps").hide();
                    $("#timer-forget").show();

                    $(".error_msg").show();
                    $(".error_msg").removeClass("alert alert-danger");
                    $(".error_msg").addClass("alert alert-success");
                    $(".error_msg").text(e.message).delay(5000).fadeOut();



                } else {
                    $(".error_msg").show();
                    $(".error_msg").removeClass("alert alert-success");
                    $(".error_msg").addClass("alert alert-danger");
                    $(".error_msg").text("This E-Mail ID is not registered with social login").delay(5000).fadeOut();
                }
            }
        });
    });
    $("#enter_otp").click(function () {
        var email_mobile = $("#email_mobile").val();
        var regExOTP = /^([0-9])*$/;
        var e = $("#enter_your_otp").val();
        if (!regExOTP.test(e)) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Please OTP in digit only").delay(5000).fadeOut();
            return false;

        } else if (e.length > 4 || e.length < 4) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("OTP should be contain 4 digit only.").delay(5000).fadeOut();
            return false;
        } else {

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: base_url + "web/Home/verify_forget_pass_otp",
                data: {
                    userOtp: e,
                    emailMobile: email_mobile
                },
                beforeSend: function () {
                    $(".laoding").show();
                },
                success: function (e) {
                    $(".laoding").hide();
                    if (e.status == true) {
                        $("#enter_otp").css({
                            'pointer-events': 'auto'
                        });
                        $(".error_msg").show();
                        $(".error_msg").removeClass("alert alert-danger");
                        $(".error_msg").addClass("alert alert-success");
                        $(".error_msg").text(e.message).delay(5000).fadeOut();
                        $(".enter-otp").css("display", "none");
                        $(".changepassword").css("display", "block");
                    } else {
                        $(".error_msg").show();
                        $(".error_msg").removeClass("alert alert-success");
                        $(".error_msg").addClass("alert alert-danger");
                        $(".error_msg").text(e.message).delay(5000).fadeOut();
                        var indexofExpire = e.message.indexOf('expire');
                        if (indexofExpire != -1) {
                            $("#enter_otp").css({
                                'pointer-events': 'none'
                            });
                            $("#enter_otps").show();
                            $("#timer-forget").hide();
                            timerforget(2);
                        }
                    }
                }
            });
        }
    });
    $("#enter_password").click(function () {
        var np = $("#new_password").val();
        var cp = $("#confirm_password").val();
        var o = $("#email_mobile").val();
        var regExOTP = /^([0-9])*$/;
        var passRegx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        var e = $("#enter_your_otp").val();
        if (!regExOTP.test(e)) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Please OTP in digit only").delay(5000).fadeOut();
            return false;

        } else if (e.length > 4 || e.length < 4) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("OTP should be contain 4 digit only.").delay(5000).fadeOut();
            return false;
        } else if (np == "") {
            $(".error_msg").show();
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Please Enter Your New Password").delay(5000).fadeOut();
            return false;
        } else if (cp == "")
        {
            $(".error_msg").show();
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Please Enter Your Confirm Password").delay(5000).fadeOut();
            return false;
        } else if (!passRegx.test(np)) {
            $(".error_msg").show();
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Password should contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character.").delay(5000).fadeOut();
            return false;
        } else if (!passRegx.test(cp)) {
            $(".error_msg").show();
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Password should contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character.").delay(5000).fadeOut();
            return false;
        } else if (np != cp) {
            $(".error_msg").show();
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Your Confirm Password Should Be Same As New Password").delay(5000).fadeOut();
            return false;
        } else {

            $.ajax({
                type: "POST",
                dataType: "json",
                url: base_url + "web/home/verify_otp_change_password",
                data: {
                    userOtp: e,
                    new_password: np,
                    hidden_mobile: o
                },
                async: false,
                beforeSend: function () {
                    $(".loading").show();
                },
                success: function (e) {
                    $(".loading").hide();

                    if (e.status) {
                        $(".error_msg").show();
                        $(".error_msg").removeClass('alert-danger');
                        $(".error_msg").addClass('alert-success');
                        $(".error_msg").html(e.message).delay(5000).fadeOut();
                        $(".changepassword").css("display", "none");
                        window.location.reload();
                    } else {
                        $(".error_msg").show();
                        $(".error_msg").removeClass('alert-success');
                        $(".error_msg").addClass('alert-danger');
                        $(".error_msg").html(e.message).delay(5000).fadeOut();
                        var indexofExpire = e.message.indexOf('Session');
                        if (indexofExpire != -1) {

                            $(".changepassword").css("display", "none");
                            $(".enter-otp").css("display", "block");
                            $(".error_msg").addClass('alert-danger');
                            $(".error_msg").html(e.message + " Kindly resend otp for verify again.").delay(5000).fadeOut();
                            $("#enter_otp").css({'pointer-events': 'none'});
                        }
                    }
                }
            });
        }
    });

//        $(".next").click(function() {
    function validate_registration() {
        var username = $(".register_name").val();
        var emailid = $(".register_emailid").val();
        var password = $(".register_pwd").val();
        var signup_mobile = $(".signup_mobile").val();
        var check_username = username.length;
        var check_password = password.length;
        $(".error_registration").remove();
        if (username == "") {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Enter your name").delay(5000).fadeOut();

            // $('.register_name').after('<span class="error_registration" style="color:red">Enter your  name</span>');
            return false;
        }
        if (check_username < 2) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Name must be at least min 2 and  max 30 characters in length").delay(5000).fadeOut();
            // $('.register_name').after('<span class="error_registration" style="color:red">Name must be at least min 2 and  max 30 characters in length</span>');
            return false;
        }
        if (emailid == "") {
            $('.register_emailid').after('<span class="error_registration" style="color:red">Enter your email id</span>');
            return false;
        } else {
            var regEx = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var validEmail = regEx.test(emailid);
            if (!validEmail) {
                $(".error_msg").show();
                $(".error_msg").removeClass("alert-success");
                $(".error_msg").addClass("alert alert-danger");
                $(".error_msg").text("Enter a valid email").delay(5000).fadeOut();
                // $('.register_emailid').after('<span class="error_registration" style="color:red">Enter a valid email</span>');
                return false;
            }
        }
        var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

        if (filter.test(signup_mobile)) {
            if (signup_mobile.length == 10) {
                var validate = true;
            } else {
                var validate = false;
            }
        } else {
            var validate = false;
        }

        if (validate == false) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Enter a valid mobile").delay(5000).fadeOut();
            //$('.signup_mobile').after('<span class="error_registration" style="color:red">Enter a valid mobile</span>');
            return false;
        }
        if (password == "") {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Enter your password").delay(5000).fadeOut();
            //$('.register_pwd').after('<span class="error_registration" style="color:red">Enter your password</span>');
            return false;
        }
        if (check_password < 8) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("The password must be at least min 8 and max 32 characters in length.").delay(5000).fadeOut();
            //$('.register_pwd').after('<span class="error_registration" style="color:red">The password must be at least min 8 and max 32 characters in length.</span>');
            return false;
        }
        $("#popup_register1").addClass("show"), $("#popup_register1").css({
            display: "block"
        });
//        });
    }

    $(".next1").click(function () {
        //alert();
        msg_id = "msg";
        "register" == $(this).closest("form").attr("id") ? (msg_id = "msg", username = $("#register_name").val(), password = $("#register_pwd").val(), emailid = $("#register_emailid").val()) : (msg_id = "msg1", username = $("#register_name1").val(), password = $("#register_pwd1").val(), emailid = $("#register_emailid1").val());
        var e = password.length;
        $("#" + msg_id).html(""), "" == username && "" == emailid && "" == password ? $("#" + msg_id).html("Enter Username, email and password") : "" == username ? $("#" + msg_id).html("Enter Username") : "" == emailid ? $("#" + msg_id).html("Enter Email Id") : isEmail(emailid) ? "" == password ? $("#" + msg_id).html("Enter Password!!") : e < "8" ? $("#" + msg_id).html("Password must be 8 characters") : ($("#registration-login-form-popup").removeClass("show"), $("#registration-login-form-popup").css({
            display: "none"
        }),
                $("#popup_register1").addClass("show"), $("#popup_register1").css({
            display: "block"
        })) : $("#" + msg_id).html("Enter Your Valid Email Id")
    });
    var swal_count = 0;
/////////////////Validate OTP Request/////////////////    
    $("#validate_otp_signup").click(function () {
        var regExOTP = /^([0-9])*$/;
        var otp_entered = $("#enter_your_otp_signup").val();
        var mobile_signup = $(".signup_mobile").val();
        var mailid = $(".register_emailid").val();//$("#mailid").val();

        if (!regExOTP.test(otp_entered)) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("OTP should be in digit only.").delay(5000).fadeOut();
            return false;
        } else if (otp_entered.length > 4 || otp_entered.length < 4) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Please enter 4 digit OTP code.").delay(5000).fadeOut();
            return false;
        } else {
            $.ajax({
                data: {
                    otp_code: otp_entered,
                    mobile: mobile_signup,
                    mailid: mailid,
                },
                dataType: 'json',
                type: 'post',
                url: base_url + 'web/login_register/verify_signup_otp',
                async: false,
                beforeSend: function () {
                    $(".loading").show();
                },
                success: function (results) {
                    $(".loading").hide();
                    // console.log(results);return false;
                    if (results.status) {
                        register_user(otp_entered);
//                        window.location.href = base_url + "signup-thanks";
                    } else if (results.error_code == 1) {

                        $(".error_msg").show();
                        $(".error_msg").removeClass("alert-sucess");
                        $(".error_msg").addClass("alert alert-danger");
                        $(".error_msg").text(results.message).delay(5000).fadeOut();

                    } else {

                        $(".error_msg").show();
                        $(".error_msg").removeClass("alert-sucess");
                        $(".error_msg").addClass("alert alert-danger");

                        var indexofExpire = results.message.indexOf('expire');
                        if (indexofExpire != -1) {
                            $("#validate_otp_signup").css({"pointer-events": "none"});
                            $("#timer").hide();
                            $("#enter_otps_resend").show();
                        }
                        $(".error_msg").text(results.message).delay(5000).fadeOut();
                    }
                }
            });
        }

    });
/////////////////Validate OTP Request/////////////////

/////////////////Function for Register User/////////////////////////
    function register_user(otp_entered) {
        var username = $(".register_name").val();
        var password = $(".register_pwd").val();
        var emailid = $(".register_emailid").val();
        var mobile = $(".signup_mobile").val();
        var stream = $(".stream_id").val();
        var web_url = $("#WEB_URL").val();
        var otp_verified = $("#otp_verified_signup").val();
        var mobile_signup = $("#mobile_signup").val(mobile);

        $.ajax({
            type: "post",
            data: {
                first_name: username,
                mobile: mobile,
                pwd: password,
                emailid: emailid,
                stream_id: stream,
                web_url: web_url,
                otp_code: otp_entered
            },
            url: base_url + "web/Login_register/register",
            beforeSend: function () {
                $(".loading").show();
            },
            dataType: 'json',
            success: function (e) {
                $(".loading").hide();
                if (e.status = '1' && e.message == "success") {
                    window.location.href = base_url + "signup-thanks";
                } else if (e.status = '0') {
                    if (e.class.length > 0) {
                        $(".error_msg").show();
                        $(".error_msg").removeClass("alert-success");
                        $(".error_msg").addClass("alert alert-danger");
                        $(".error_msg").text(e.message).delay(5000).fadeOut();
                    } else {

//                                        $("#registration-login-form-popup").addClass("show");
//                                        $("#registration-login-form-popup").css({display: "block"});
//                                        $("#profile1").addClass("hide");
//                                        $("#home1").addClass("show");
//                                        $("#popup_register1").addClass("hide");
//                                        $("#popup_register1").removeClass("show");
//                                        $("#popup_register1").css({display: "none"});
//                                        $("#msg").html(e), $(".loader").css({display: "none"});
                        $(".error_msg").show();
                        $(".error_msg").removeClass("alert alert-success");
                        $(".error_msg").addClass("alert alert-danger");
                        $(".error_msg").text(e.message).delay(5000).fadeOut();
                    }
                }
            },
            error: function (e) {
                console.log("eror", e)
            }
        });
    }
/////////////////Function for Register User/////////////////

/////////////////Registration form request/////////////////
    $(".registeration").click(async function () {
        var global = true;
        var reqExName = /^[a-zA-Z]+(\s+[a-zA-Z]+)*$/;
        var username = $(".register_name").val();
        var emailid = $(".register_emailid").val();
        var password = $(".register_pwd").val();
        var signup_mobile = $(".signup_mobile").val();
        var stream_id = $(".stream_id").val();
        var check_username = username.length;
        var check_password = password.length;
        $(".error_registration").remove();
        if (username == "") {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Enter your name").delay(5000).fadeOut();
            return false;
        }

        if (check_username < 2) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Name must be at least min 2 and  max 30 characters in length.").delay(5000).fadeOut();
            return false;
        }
        if (!reqExName.test(username)) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Name should be contain alphabets and space only between name.").delay(5000).fadeOut();
            return false;
        }
        if (emailid == "") {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Enter your email id").delay(5000).fadeOut();
            return false;
        } else {
            var regEx = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var validEmail = regEx.test(emailid);
            if (!validEmail) {
                $(".error_msg").show();
                $(".error_msg").removeClass("alert-success");
                $(".error_msg").addClass("alert alert-danger");
                $(".error_msg").text("Enter a valid email").delay(5000).fadeOut();
                return false;
            }

        }

        var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

        if (filter.test(signup_mobile)) {
            if (signup_mobile.length == 10) {
                var validate = true;
            } else {
                var validate = false;
            }
        } else {
            var validate = false;
        }

        if (stream_id == "") {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Select Your Stream").delay(5000).fadeOut();
            return false;
        }

        if (validate == false) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Enter a valid mobile").delay(5000).fadeOut();
            return false;
        }


        if (password == "") {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Enter your password").delay(5000).fadeOut();
            return false;
        }
        var passRegx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (!passRegx.test(password)) {
            $(".error_msg").show();
            $(".error_msg").removeClass("alert-success");
            $(".error_msg").addClass("alert alert-danger");
            $(".error_msg").text("Password should contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character.").delay(5000).fadeOut();
            return false;
        }

        if (global == false) {
            alert();
            return false;
        }

        var username = $(".register_name").val();
        var password = $(".register_pwd").val();
        var emailid = $(".register_emailid").val();
        var mobile = $(".signup_mobile").val();
        var stream = $(".stream_id").val();
        var web_url = $("#WEB_URL").val();
        var otp_verified = $("#otp_verified_signup").val();
        var mobile_signup = $("#mobile_signup").val(mobile);

        // sendRegisterOtp(mobile,emailid);
        sendRegisterOtp(mobile, emailid, username, stream_id, password);
    });
/////////////////Registration form request/////////////////

/////////////////OTP Request/////////////////

    // function sendRegisterOtp(mobile,emailid){
    //     $.ajax({
    //         type: "post",
    //         dataType: "json",
    //         data: {
    //             mobile: mobile,
    //             emailid: emailid
    //         },
    //         url: base_url + "web/Login_register/send_register_otp",
    //         beforeSend: function () {
    //             $(".loader").css({display: "block"});
    //         },
    //         success: function (e) {
    //             console.log(e);return false;
    //             if (e.status) {

    //                 $("#validate_otp_signup").css({"pointer-events":"auto"});

    //                 $(".error_msg").show();
    //                 $(".error_msg").removeClass("alert-danger");
    //                 $(".error_msg").addClass("alert alert-success");
    //                 $(".error_msg").text(e.message).delay(5000).fadeOut();
    //                 $("#popup_register1").css({display: "block"});
    //                 $("#enter_otp_singup,#enter_otps_resend,#validate_otp_signup,#timer").show();
    //                 $("#registration_continou,#registration-login-form-popup,#enter_otps_resend").hide();
    //                 timer(120);
    //             }else {
    //                 $(".error_msg").show();
    //                 $(".error_msg").removeClass("alert-success");
    //                 $(".error_msg").addClass("alert alert-danger");
    //                 $(".error_msg").text("Email/Mobile Already Exist.").delay(5000).fadeOut();
    //             }
    //         },
    //         error: function (e) {
    //             console.log("eror", e)
    //         }
    //     });
    // }

    function sendRegisterOtp(mobile, emailid, username, stream_id, password) {
        $.ajax({
            type: "post",
            dataType: "json",
            data: {
                mobile: mobile,
                emailid: emailid,
                username: username,
                stream_id: stream_id,
                password: password
            },
            url: base_url + "web/Login_register/send_register_otp",
            beforeSend: function () {
                $(".loader").css({display: "block"});
            },
            success: function (e) {
                // console.log(e);return false;
                if (e.status) {

                    $("#validate_otp_signup").css({"pointer-events": "auto"});

                    $(".error_msg").show();
                    $(".error_msg").removeClass("alert-danger");
                    $(".error_msg").addClass("alert alert-success");
                    $(".error_msg").text(e.message).delay(5000).fadeOut();
                    $("#popup_register1").css({display: "block"});
                    $("#enter_otp_singup,#enter_otps_resend,#validate_otp_signup,#timer").show();
                    $("#registration_continou,#registration-login-form-popup,#enter_otps_resend").hide();
                    timer(120);
                } else if (e.error_code == 1) {

                    $(".error_msg").show();
                    $(".error_msg").removeClass("alert-success");
                    $(".error_msg").addClass("alert alert-danger");
                    $(".error_msg").text(e.message).delay(5000).fadeOut();
                    return false;

                } else {
                    $(".error_msg").show();
                    $(".error_msg").removeClass("alert-success");
                    $(".error_msg").addClass("alert alert-danger");
                    $(".error_msg").text("Email/Mobile Already Exist.").delay(5000).fadeOut();
                }
            },
            error: function (e) {
                console.log("eror", e)
            }
        });
    }

/////////////////OTP Request/////////////////

/////////////////Section for otp timer/////////////////
    let timerOn = true;
    function timer(remaining) {
        var m = Math.floor(remaining / 60);
        var s = remaining % 60;

        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        document.getElementById('timer').innerHTML = m + ':' + s;
        remaining -= 1;

        if (remaining >= 0 && timerOn) {
            setTimeout(function () {
                timer(remaining);
            }, 1000);
            return;
        }

        if (!timerOn) {
            return;
        }
        // Do timeout stuff here
        $("#timer").hide();
        $("#enter_otps_resend").show();
    }
/////////////////Section for otp timer/////////////////

/////////////////Section for otp timer forget password/////////////////
    let timerforgetOn = true;
    function timerforget(remaining) {
        var m = Math.floor(remaining / 60);
        var s = remaining % 60;

        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        document.getElementById('timer-forget').innerHTML = m + ':' + s;
        remaining -= 1;

        if (remaining >= 0 && timerforgetOn) {
            setTimeout(function () {
                timerforget(remaining);
            }, 1000);
            return;
        }

        if (!timerforgetOn) {
            return;
        }
        // Do timeout stuff here
        $("#timer-forget").hide();
        $("#enter_otps").show();
    }
/////////////////Section for otp timer forget password/////////////////

    $('#register_name').keypress(function (event) {
        if (event.keyCode == 13) {

            if ($('#register_name').val() == "") {
                return false;
            } else {
                $(".registeration").click();
                // $('#register_emailid').focus();

            }
        }
    });
    $('#register_emailid').keypress(function (event) {
        if (event.keyCode == 13) {

            if ($('#register_emailid').val() == "") {
                return false;
            } else {
                $(".registeration").click();
                //   $('#register_pwd').focus();

            }
        }
    });
    //        
    //        $('#register_emailid').keypress(function(event) {
    //            if (event.keyCode == 13) {
    //
    //                if ($('#register_emailid').val() == "") {
    //                    return false;
    //                } else {
    //                    $('#register_pwd').focus();
    //
    //                }
    //            }
    //        });

    //        $('#reg_enter').keypress(function(event) {
    //            if (event.keyCode == 13) {
    //            $(".registeration").click() ;
    //            }
    //        });

    /*$(window).on({
     
     keyup: function (event) {
     // var class_name= $('#registration_continou').hasClass('registeration');
     if (event.which === 13) {
     $(".registeration").click();
     }
     }
     });*/

    $('#register_pwd').keypress(function (event) {
        if (event.keyCode == 13) {

            if ($('#register_pwd').val() == "") {
                return false;
            } else {
                //$('#loginpass_word').focus();
                $(".registeration").click();

            }
        }
    });


    $('#loginpass_word').keypress(function (event) {
        if (event.keyCode == 13) {

            if ($('#loginpass_word').val() == "") {
                return false;
            } else {

                $('#normal_login').focus();
                $('#normal_login').click();

            }
        }
    });

    $("#normal_login").click(function () {
        login()
    });
    $('.close').click(function () {
        $('#msg').html('');
        $('#msg1').html('');
    });
    $(".close1").click(function () {
        $("#registration-login-form-popup").addClass("show"), $("#registration-login-form-popup").css({
            display: "block"
        }), $("#popup_register1").addClass("hide"), $("#popup_register1").removeClass("show"), $("#popup_register1").css({
            display: "none"
        }), $("#popup_register1").modal("fadeOut")
    });
    $('.checkmark').click(function () {
        var id = $(this).attr('id');
        var mainid = $(this).attr('main-id');
        if ($(this).hasClass('checked-sec')) {
            //$('#checkpops'+id).attr("checked", false);
            $('#checkpops' + id).attr("checked", !$('#checkpops' + id).prop("checked"));
            $('#checkpops' + id).attr("checked", false);
            $(this).removeClass('checked-sec');
        } else {
            $('#checkpops' + id).attr("checked", !$('#checkpops' + id).prop("checked"));
            $('#checkpops' + id).attr("checked", true);
            $(this).addClass('checked-sec');
        }

        if ($(this).hasClass('checked-sec')) {
            var isAllChecked = 0;
            var totalCheck = 0;
            $("#data" + mainid + " .checkmark").each(function () {
                totalCheck++;
            });
            $("#data" + mainid + " .checkmark").each(function () {
                if ($(this).hasClass('checked-sec')) {
                    isAllChecked++;
                }
            });
            if (isAllChecked == totalCheck) {
                $(".fd" + mainid).html("Unselect All");
            }
        } else {
            $(".fd" + mainid).html("Select All");
        }

    });

    //        $(".checkmark1").click(function (){
    //            var e = $(this).attr("id"),s = $(this).attr("main-id");
    //            if($(this).hasClass("checked-sec") ? ($("#checkpops" + e).attr("checked", !$("#checkpops" + e).prop("checked")), $(this).removeClass("checked-sec")) : ($("#checkpops" + e).attr("checked", !$("#checkpops" + e).prop("checked")), $(this).addClass("checked-sec")), $(this).hasClass("checked-sec"))
    //            {
    //                var a = 0,o = 0;
    //                $("#data" + s + " .checkmark1").each(function (){
    //                    o++;
    //                });
    //                $("#data" + s + " .checkmark1").each(function (){
    //                        $(this).hasClass("checked-sec") && a++;
    //                });
    //                a == o && $(".fd" + s).html("Unselect All");
    //            }
    //            else{
    //                $(".fd" + s).html("Select All");
    //            }
    //	});
    $(".checkmark2").click(function () {

        var e = $(this).attr("id");
        if ($(".selectall" + e).hasClass("checked-sec")) {
            $(".checks" + e).attr("checked", !$(".checks" + e).prop("checked", false));
            $(".check" + e).attr("checked", !$(".checks" + e).prop("checked", false));
            $(".selectall" + e).removeClass("checked-sec"), $(".fd" + e).html("Select all");
        } else {
            $(".checks" + e).attr("checked", !$(".checks" + e).prop("checked"));
            $(".check" + e).attr("checked", !$(".checks" + e).prop("checked"));
            $(".selectall" + e).addClass("checked-sec");
            $(".fd" + e).html("Unselect all");
        }
    });

    $("#showregistration,#showregistrationmodal").click(function () {
        $("#home1").show(), $("#profile1").hide(), $("#forgot").hide()
    }), $("#indexshowregistration").click(function () {
        $("#home1").show(), $("#profile1").hide(), $("#forgot").hide()
    }), $("#showrlogin").click(function () {
        $("#home1").hide(), $("#forgot").hide(), $("#profile1").show()
    }), $("#forgetlogin").click(function () {
        $("#home1").hide(), $("#forgot").hide(), $("#profile1").show(), $(".error_msg").removeClass("alert alert-danger"),
                $(".error_msg").text("")
    }), $("#showforgot").click(function () {
        $("#home1").hide(), $("#profile1").hide(), $("#forgot").show(), $(".error_msg").removeClass("alert alert-danger"),
                $(".error_msg").text("")
    })
}),
        $(window).scroll(function () {
    $(window).scrollTop() >= 300 ? $(".back-to-top").removeClass("custom-back-to-top") : $(".back-to-top").addClass("custom-back-to-top")
});
$(".back-to-top").on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: 0}, '300');
});


$("#loginuser_name,#register_name,#register_emailid,#stream_id,#signup_mobile,#register_pwd,#loginuser_name,#enter_your_otp_signup,#eenter_your_otp,#new_name").focusout(function (e) {
    // alert(1);
    var reg = /<(.|\n)*?>/g;
    if (reg.test($(this).val()) == true) {
        Swal.fire({title: "Error", text: "HTML Tag are not allowed", type: "warning"})

    }
    e.preventDefault();
});


// $('#loginuser_name').on('keyup keypress', function(e) {
//     var keyCode = e.keyCode || e.which;
//     if (keyCode === 13) {
//         e.preventDefault();
//         $('#normal_login').click();
//     }
// });

$(document).ready(function () {
    captchaGenrate();
    $(".refresh").click(function () {
        localStorage.setItem("email", $("#login_username").val());
        window.location.reload();
    });
});
//captcha block
let is_captcha_success = 0;

function captchaGenrate() {
    document.body.scrollTop; //force css repaint to ensure cssom is ready
    var timeout; //global timout variable that holds reference to timer
    captcha = new $.Captcha({
        onFailure: function () {
            is_captcha_success = 0;
            $(".error_msg").show();
            $(".error_msg").html("Enter correct Captcha Code.").delay(5000).fadeOut();
        },
        onSuccess: function () {
            is_captcha_success = 1;
        }
    });
    captcha.generate();
}