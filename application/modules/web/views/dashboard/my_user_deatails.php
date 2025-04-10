<style>
.form_group_dt .user_dt_label:before {
    content: inherit !important;
}

.pe-none {
    pointer-events: none !important
}


.user_acount_form .form_group_dt input {
    background: #000;
    border:1px solid rgba(255, 255, 255, 0.8);
    transition: border-color 0.3s ease;
    font-size: 14px;
    font-weight: initial;
    color: #fff;
    padding: 10px;
    height: inherit !important
}

input::placeholder {
    font-size: 14px !important;
}

.form_group_dt label {
    display: inline-block;
    margin-bottom: 5px !important;
}

.gender_dts {
    margin-bottom: 16px;
}

div.radio-with-Icon {
    display: block;
    width: 100%;

}

.gender_flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
}

div.radio-with-Icon p.radioOption-Item {
    display: block;
    width: 100%;
}

div.radio-with-Icon p.radioOption-Item label {
    justify-content: center;
    align-items: center;
    display: flex;
    height: 100%;
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid rgba(14, 22, 83, 1) !important;
    color: rgba(159, 159, 159, 1);
    cursor: pointer;
    transition: none;
    font-size: 14px;
    text-align: center;
    margin: 0 !important;
    gap: 10px;
    background: rgba(35, 35, 37, 1);
}

.radioOption-Item img {
    height: 14px;
    width: 14px;
}

div.radio-with-Icon p.radioOption-Item label:hover,
div.radio-with-Icon p.radioOption-Item label:focus,
div.radio-with-Icon p.radioOption-Item label:active {
    margin: 0 !important;
}

div.radio-with-Icon p.radioOption-Item label::after,
div.radio-with-Icon p.radioOption-Item label:after,
div.radio-with-Icon p.radioOption-Item label::before,
div.radio-with-Icon p.radioOption-Item label:before {
    opacity: 0 !important;
    width: 0 !important;
    height: 0 !important;
    margin: 0 !important;
}

div.radio-with-Icon p.radioOption-Item input[type="radio"] {
    opacity: 0 !important;
    width: 0 !important;
    height: 0 !important;
    display:block;
}

div.radio-with-Icon p.radioOption-Item input[type="radio"]:active~label {
    opacity: 1;
}

div.radio-with-Icon p.radioOption-Item input[type="radio"]:checked~label {
    opacity: 1;
    border: none;
    background: var(--pbg);
    color: #fff;
}

div.radio-with-Icon p.radioOption-Item input[type="radio"]:hover,
div.radio-with-Icon p.radioOption-Item input[type="radio"]:focus,
div.radio-with-Icon p.radioOption-Item input[type="radio"]:active {
    margin: 0 !important;
}

div.radio-with-Icon p.radioOption-Item input[type="radio"]+label:before,
div.radio-with-Icon p.radioOption-Item input[type="radio"]+label:after {
    margin: 0 !important;
}

.save_details_btn {
    background: var(--pbg);
    /* color: rgba(151, 151, 151, 1); */
    color: white;
    opacity:0.6;
    padding: 9px 20px !important;
    width: 100%;
    font-size: 15px;
    border-radius: 8px !important;
    border: inherit !important;
}



.send_otp_email {
    border: 1px solid rgba(51, 51, 51, 1);
    color: rgba(51, 51, 51, 1);
    border-radius: 5px;
    padding: 6px 16px;
    white-space: nowrap;
    font-size: 14px;
    background: inherit;
}

.gend_position {
    position: relative;
    top: 15px;
}

.mobile_cross_dt {
    transform: translateY(-50%);
    position: absolute;
    top: 50px;
    right: 9px;
}

.email_cross_dt {
    transform: translateY(-50%);
    position: absolute;
    top: 55px;
    right: 9px;
}

.otp-field {
    display: flex;
    gap: 15px;
}

.otp-input {
    width: 40px;
    height: 40px;
    text-align: center;
    font-size: 24px;
}

.user_otp_modal .modal-dialog {
    max-width: 550px !important;
}

.user_otp_modal {
    background: #000 !important;
}

.user_otp_modal .modal-content {
   background: rgba(14, 22, 83, 1);
    border-radius: 30px;
}

.user_otp_modal .close {
    background: transparent !important;
    border-radius: 100%;
    opacity: 1;
    font-weight: 100;
    height: 40px;
    width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: -10p;
    z-index: 22;
    display: block;
    position: absolute;
    right: 10px;
    top: 11px;
}

.user_otp_modal .modal-body {
    padding: 2rem;
}

.user_otp_modal .close img {
    width: 100%;
}

.user_otp_modal .modal-header {
    border-bottom: none !important;
}

.text-ccc {
    color: #b6b6b6;
}

.users_otp .lin-21 {
    line-height: 20px;
    margin: 0px auto 15px auto;
    width: 70%;
    font-weight: 300;
    font-size: 15px;
}

.login_title {
    font-size: 22px;
    margin-bottom: 0 !important;
    font-weight: 600;
}

.users_otp .otp-field input {
    color: #fff;
    background: none;
    height: 50px;
    width: 13%;
    border-radius: 6px;
    outline: none;
    font-size: 1.125rem;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 1);

}

.users_otp .otp-field input {
    font-size: 20px !important;
}

.datepicker-cell.next:not(.disabled),
.datepicker-cell.prev:not(.disabled) {
    color: #7a7a7a;
}

.datepicker-cell.day {
    color: #7a7a7a;
}

.uset_opt {
    width: 100% !important;
    font-size: 16px !important;
    color: rgba(170, 170, 170, 1) !important;
}

.uset_opt .dynamic_number {
    font-size: 16px !important;
    color: rgba(170, 170, 170, 1) !important;

}

.datepicker-view.datepicker-grid .datepicker-cell {
    height: 4.5rem;
    line-height: 4.5rem;
    color: rgba(51, 51, 51, 1);
}

#resend_div_otp {
    font-size: 13px !important;
}

.datepicker-cell.focused:not(.selected) {
    background: var(--pbg);
    color: var(--white);
}

.savr_btn {
    background: var(--pbg) !important;
}

.savr_btn:hover {
    background: var(--pbhover) !important;
}

.pgactivess {
    background: var(--pbg) !important;
    cursor: pointer !important;
    opacity:1;
}

.pgactivess:hover {
    background: var(--pbhover) !important;
}

.login_help_otp {
    min-height: 25px;
    text-align:left;
}
#country_code{
width: 37px;
    border-radius: 5px;
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
    border-right: inherit;
    padding: 10px 6px 10px 10px;
    border: 1px solid rgba(255, 255, 255, 0.4) !important;
    border-right:none !important;
}
#mob_num{
    /* border-left: inherit; */
  /* border-bottom-left-radius: 0;
  border-top-left-radius: 0; */
  padding-left: 2px;
}
.form-control:focus{
    box-shadow: none !important;
}
@media only screen and (min-width: 1801) {
    .user_otp_modal .modal-dialog {
        max-width: 750px !important;
    }

    .users_otp .otp-field input {
        width: 60px !important;
        height: 60px !important;
        font-size: 22px !important;
        font-weight: 500;
    }
}

@media (min-width: 320px) and (max-width: 767px) {
    .user_otp_modal .modal-body {
        padding: 1.5rem;
    }

    .user_p {
        padding: 0;
    }
}

.p-events {
    pointer-events: none;
}

.datepicker-cell {
    color: black !important;
}

button[disabled]:hover {
    cursor: not-allowed;

}

#resend_div {
    color: rgba(151, 151, 151, 1) !important;
}
 #resend_div a {
    color: var(--pbc);
    font-family: 'AnekLatin-Bold';
  }
  #update_data:disabled{
    opacity:0.6 !important;
  }
  #update_data{
    opacity:1 !important;
    cursor:pointer !important;
  }
#toast-container{
    z-index:9999999999999999999 !important;
}
</style>

<?php $gender = $this->session->userdata('gender');
$dob = $this->session->userdata('dob');
$name = $this->session->userdata('master_name');
$country_code = $this->session->userdata('country_code');
$email = $this->session->userdata('email');
$mobile = $this->session->userdata('mobile');
$check = ($mobile=='')?'mob_num_int': 'flgint';
//    pre($_SESSION);
//echo $gender; die;
$defaultDate = date('Y-m-d', strtotime('-18 years'));
$redirected_from_game = "NO"; $game_id = "";
if($this->session->userdata('complete_profile_for_game')){
    $redirected_from_game = "YES";
    $game_id = $this->session->userdata('complete_profile_for_game');
}
?>
<section class="py-5 useer_details_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto col-12">
                <nav class="">
                    <a href="javascript:void(0);" onclick="history.go(-1)"
                        class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>

                        <h5 class="ms-4 text-white watch_cont"><?= $this->lang->line('user-details-text') ?></h5>
                    </a>
                </nav>
            </div>

        </div>
        <div class="row pt-5">
            <div class="col-lg-5 col-md-8 m-auto">
                <div class="user_dt">
                    <form class="user_acount_form" id="update_user_details">
                        <input type='hidden' id='primary_url' value=''>
                        <div class="form-group form_group_dt">
                            <label for="username" class="user_dt_label"><?= $this->lang->line('acc-username') ?></label>
                            <input type="text" name="username" class="form-control" id="username" maxlength='30'
                                placeholder="<?= $this->lang->line('acc-enterusername') ?>"
                                value="<?php echo $this->session->userdata('master_name') ? ($this->session->userdata('master_name')) : 'You'; ?>"  onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9 ]/g, '')" onkeypress="handleChange()">
                            <input type="hidden" value="<?= $this->session->login_via; ?>" name="login_via">
                            <span class="text-danger" id="span_username"></span>
                        </div>
                        <div class="form-group">
                            <div class="d-flex w-100 align-items-center" style="gap:10px;">
                                
                                <div class=" form_group_dt w-100 position-relative">
                                    <label for="mob_num"
                                        class="user_dt_label"><?= $this->lang->line('acc-mobile') ?></label>
                                        <div class="d-flex">
                                    <input type="text" class="form-control  <?= $check != 'flgint'?'d-none':''?>" readonly id="country_code" name="country_code"
                                        value="<?= !empty($_SESSION['country_code']) ? $_SESSION['country_code'] : '+91';?>">
                                    <input type="text" class="form-control clear_detail <?= $check ?>" id="mob_num" name="mobile"
                                        placeholder="<?= $this->lang->line('acc-entermobile') ?>"
                                        value="<?php echo isset($mobile) ?$mobile : ''; ?>" pattern="[0-9]{10}"
                                        maxlength='10' <?= ($this->session->mobile != '') ? 'readonly' : '' ?>>
                                    </div>
                                    <?php if ($this->session->mobile == '') { ?>
                                    <span class="mobile_cross_dt">&times;</span>
                                    <?php } ?>


                                </div>
                                <?php $mobileClass = !empty($_SESSION['mobile']) ? "gend_position d-none": "gend_position";  ?>
                                <div class="<?php echo $mobileClass; ?>">
                                    <button type="button" onclick="send_otp('email','mobile',1)"
                                        class="send_otp_email <?= ($this->session->mobile != '') ? 'p-events' : '' ?>"
                                        data-bs-toggle="modal"
                                        data-type="mobile"><?= ($this->session->mobile == '') ? $this->lang->line("Send-OTP") : ''  ?></button>
                                </div>
                            </div>
                            <span class="text-danger" id="span_mob_num"></span>
                        </div>
                        <div class="form-group">
                            <div class="d-flex w-100 align-items-center" style="gap:10px;">
                                <div class=" form_group_dt w-100 position-relative">
                                    <label for="email_ids"
                                        class="user_dt_label"><?= $this->lang->line('acc-email') ?></label>
                                    <input type="text" class="form-control clear_detail" name="email_id" id="email_ids"
                                        placeholder="<?= $this->lang->line('acc-enteremail') ?>"
                                        value="<?php echo isset($email) ? $email : ''; ?>"
                                        <?= ($this->session->email != '') ? 'readonly' : '' ?>>
                                    <?php if ($this->session->email == '') { ?>
                                    <span class="email_cross_dt">&times;</span>
                                    <?php } ?>


                                </div>

                                <?php $emailClass = !empty($_SESSION['email']) ? "gend_position d-none": "gend_position";  ?>
                                <div class="<?php echo $emailClass; ?>">
                                <button onclick="send_otp('mobile','email',1)" type="button"
                                class="send_otp_email otp_emails <?php echo ($this->session->email != '') ? 'p-events' : ''; ?>"
                                data-bs-toggle="modal"
                                data-type="email"
                                <?php echo ($this->session->email == '') ? 'disabled' : ''; ?>>
                                <?php echo ($this->session->email == '') ? $this->lang->line("Send-OTP") : ''; ?>
                                </button>
                                </div>



                            </div>
                            <span class="text-danger d-none" id="span_email_ids"></span>
                        </div>

                        <div class="gender_dts">
                            <label class="user_dt_label"><?= $this->lang->line('acc-Gender') ?></label>
                            <div class="gender_flex">
                                <div class="radio-with-Icon">
                                    <p class="radioOption-Item">
                                        <input type="radio" name="gender" id="male_gender" value="1"
                                            class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false"
                                            <?php if ($gender == 1) echo 'checked'; ?> onchange="handleGenderChange(1)">
                                        <label for="male_gender">
                                            <img src="<?= base_url('assets/images/male_user.svg') ?>"
                                                class=" img-fluid male_bg" alt="male_bg">
                                            <img src="<?= base_url('assets/images/male_white.png') ?>"
                                                class="img-fluid male_white d-none" alt="male-white">
                                            <?= $this->lang->line('acc-Gender1') ?>
                                        </label>
                                    </p>
                                </div>
                                <div class="radio-with-Icon">
                                    <p class="radioOption-Item">
                                        <input type="radio" name="gender" id="female_gender" value="2"
                                            class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false"
                                            <?php if ($gender == 2) echo 'checked'; ?>  onchange="handleGenderChange(2)">
                                        <label for="female_gender">
                                            <img src="<?= base_url('assets/images/feamil_white.png') ?>"
                                                class="img-fluid male_white d-none" alt="white">
                                            <img src="<?= base_url('assets/images/feamile_user.png') ?>"
                                                class="img-fluid male_bg" alt="white"> <?= $this->lang->line('acc-Gender2') ?>
                                        </label>
                                    </p>
                                </div>
                                <div class="radio-with-Icon">
                                    <p class="radioOption-Item">
                                        <input type="radio" name="gender" id="others_gender" value="3"
                                            class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false"
                                            <?php if ($gender == 3) echo 'checked'; ?> onchange="handleGenderChange(3)">
                                        <label for="others_gender">
                                            <img src="<?= base_url('assets/images/others_white.png') ?>"
                                                class="img-fluid male_white d-none" alt="white">
                                            <img src="<?= base_url('assets/images/others_user.png') ?>"
                                                class="img-fluid male_bg" alt="white">
                                            <?= $this->lang->line('acc-Gender3') ?>
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <span class="text-danger" id="span_gender"></span>
                        </div>
                        <div class="form-group form_group_dt">
                            <label for="datepicker1" class="user_dt_label"><?= $this->lang->line('acc-dob') ?></label>
                            <input type="text" class="form-control datepicker_input" readonly name="dob" id="datepicker1"
                                placeholder="YYYY-MM-DD" value="<?php echo (isset($dob) && $dob !== '1970-01-01') ? $dob : ''; ?>">
                            <span class="text-danger" id="span_dob"></span>
                        </div>

                        <div class="pt-5 text-center">
                            <button type="submit" class="save_details_btn savr_btn btn btn-primary w-75 m-auto" disabled id="update_data">
                                <?= $this->lang->line('acc-save') ?></button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->

<div class="modal fade user_otp_modal" id="send_otpModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="<?= base_url('assets/images/profileClose.png') ?>" alt="close">
                </button>
            </div>
            <div class="modal-body text-center users_otp">

                <div class="row">
                    <div class="col-md-11 col-12 m-auto user_p">
                        <h1 class="text-white  login_title f-22 text-center">
                            <?= $this->lang->line('OTP-Verification') ?></h1>
                        <h6 class="text-ccc mb-2 f-14 text-center lin-21 uset_opt">
                            <?= $this->lang->line('verification-code') ?>

                            <span class="login_help_otp" id="mob_chng">
                                <h6 class="dynamic_number line21 d-inline-block"> <span class="ms-2" style="color:var(--pbc)"><i
                                            class="fas fa-edit"></i>
                        </h6></span><?= $this->lang->line('par-bheje') ?>  </span></h6>
                          
                        <input type="hidden" name="phone" id="ephone">
                        <input type="hidden" name="ccode" id="ccode">
                        <input type="hidden" name="ccode" id="click_via">
                        <div class="otp-field mb-2 pt-4 otp-wid">
                           
                            <input type="number" pattern="\d" class="otp-input" maxlength="1" id="otp1" />
                            <input type="number" pattern="\d" class="otp-input otp-input_d" maxlength="1" id="otp2" disabled />
                            <input type="number" pattern="\d" class="otp-input otp-input_d" maxlength="1" id="otp3" disabled />
                            <input type="number" pattern="\d" class="otp-input otp-input_d" maxlength="1" id="otp4" disabled />
                            <input type="number" pattern="\d" class="otp-input otp-input_d" maxlength="1" id="otp5" disabled />
                            <input type="number" pattern="\d" class="otp-input otp-input_d" maxlength="1" id="otp6" disabled />
                        </div>

                        <div class="otp-wid mb-3">
                            <div class="login_help_otp">
                                <p id="resend_div"> <?= $this->lang->line('not-receive-code') ?>
                                    <a href="javascript:void(0)">
                                        <?= $this->lang->line('Resend') ?></a>

                                    <!-- <a href="javascript:void(0)" id="resend_div" class="descrpition_title_sb_btn btn shadow-none align-self-center me-2 p-2"  style="display:none; color:#ffffff!important">Resend OTP </a> -->
                                </p>
                                <span class="login_help text-left" id="some_div"> </span>
                            </div>
                        </div>
                        <div class="pt-2 mb-4 w-75 m-auto">
                            <button type="submit" class="verify_otp save_details_btn " style="pointer-events: none;"
                                id="verify-otp"> <?= $this->lang->line('next') ?></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- <script>
    $('#send_otpModal').modal('show');
</script> -->
<?php
    $array_gender = [1 => 'Male', 2 => 'Female', 3 => 'Others'];
    ?>
      
<script>
      var genderLabels = <?php echo json_encode($array_gender); ?>;
$('#update_data').click(function(e) {
    e.preventDefault();
    var form = $('#update_user_details')[0];
    var formData = new FormData(form);
    var username = $("#username").val();

    if (username != '') {
        let firstChar = username.charAt(0);
       var isValid = /^[a-zA-Z][a-zA-Z0-9 ]*$/.test(username);
        if (!isValid) {
            $('#span_username').html('Username must start with a letter (A-Z).');
            $('#username').focus();
            return false;
        } else {
            $('#span_username').html('');
        }
    } else {
        $('#span_username').html('');
    }

    var email = $("#email_ids").val();
    if (email != '') {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email) || (email == '')) {
            $('.otp_emails').removeClass('send_otp_active');
            $('.email_cross_dt').html('<i class="fas fa-times"></i>');
            $("#span_email_ids").removeClass("d-none");
            $("#span_email_ids").text("Please enter valid email");
            $("#email_ids").focus();
            if (email == '') {
                $('.email_cross_dt').html('');
                $("#span_email_ids").text('');
            }
            return false;
        }
    }
    var mobile = $("#mob_num").val();
    // if (mobile.length < 10) {
    //     $("#span_mob_num").text("Please enter valid mobile no.");
    //     $("#mob_num").focus();
    //     return false;
    // }
    $.ajax({
        url: '<?= base_url('/web/Login_register/updateMasterUserProfile'); ?>',
        type: 'POST',
        data: formData,
        dataType: 'Json',
        processData: false,
        contentType: false,
        success: function(res) {
         
            if (res.status == true) {
                //localStorage.setItem('pb_session', (res.token));
                var base64Decoded = atob(res.enc);
                var originalData = JSON.parse(base64Decoded);
                //console.log(originalData);
                var m_data = originalData.username + '/' +
                originalData.mobile + '/' +
                (originalData.email_id.length > 0 ? originalData.email_id : '') + '/' +
                (originalData.gender > 0 ? genderLabels[originalData.gender] : '') + '/' +
                (originalData.dob.length > 0 ? originalData.dob : '');
                queueTrackingDataWithDelay('trackEvent', ['UserDetails', 'Update',m_data],200);
                $('.mobile_cross_dt,.email_cross_dt').html('');
                swal({
                    imageUrl: "<?= base_url('assets/images/tick.png'); ?>",
                    imageWidth: 70,
                    imageHeight: 70,
                    title: res.message,
                    text: '',
                    allowOutsideClick: false,
                    imageAlt: 'Custom image',
                    confirmButtonText: "<?= $this->lang->line("ok") ?>",
                }).then((result) => {
                   // location.relaod();
                });
            } else {
                swal({
                    imageUrl: "<?= base_url('assets/images/error.svg'); ?>",
                     imageWidth: 60,
                    imageHeight: 60,
                    title: res.message,
                    text: " ",
                    confirmButtonText: "<?= $this->lang->line("ok") ?>"
                });
            }
        }
    })


});
</script>
<script>
$('#username').on('input', function(event) { // validate username
    var username = $(this).val();
    if (username != '') {
        let firstChar = username.charAt(0);
        var isValid = /^[a-zA-Z][a-zA-Z0-9]*$/.test(username);
        // if (!isValid) {
        //     $('#span_username').html('Username must start with a letter (A-Z)'
        //     );
        // }
    } else {
        $('#span_username').html('');
    }
});

$('#mob_num').on('input', function() { // mobile validation 
    var value = $(this).val();
    $(this).on("keypress", function(event) {
    if (event.key === "Enter") {
            // Cancel the default action, if needed
            event.preventDefault();
            if(value.length == 10){
                $(".send_otp_email[data-type='mobile']").click();
            }
        }
    });
    value = value.replace(/[^0-9]/g, '');
    if (value.length > 0 && value[0] <= '5') { 
        value = value.slice(1);
    }
    if (value.length > 10) {
        value = value.slice(0, 10);
    }
    if (value.length < 10) {
        $('.send_otp_email').removeClass('send_otp_active');
        $('.mobile_cross_dt').html('<i class="fas fa-times"></i>');
        $("#update_data").prop('disabled', true);
      
    }
    if (value.length == '') {
        $('.send_otp_email').removeClass('send_otp_active');
        $('.mobile_cross_dt').html('');
        $("#span_mob_num").text("");
        $("#update_data").prop('disabled', true);
    }
    if(value.length == 10){
        $("#span_mob_num").text("");
        $('.send_otp_email').addClass('send_otp_active');
        $("#update_data").prop('disabled', false);
    }
    $(this).val(value);
});
</script>
<script>
$("#email_ids").on({ // email validation with send otp button validation
    keyup: function(event) {
        var email = $(this).val();
        if (email.length > 70) {
            event.preventDefault();
        }
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email) || (email == '')) {
            $('.otp_emails').removeClass('send_otp_active');
            $('.email_cross_dt').html('<i class="fas fa-times"></i>'); 
            if (email == '') {
                $('.email_cross_dt').html('');
                $("#span_email_ids").text('');
                $("#update_data").prop('disabled', true);
            }
        } else {
            $('.email_cross_dt').html('<i class="fas fa-times"></i>');
            $('.otp_emails').addClass('send_otp_active');
            $(".send_otp_email").prop('disabled', false);
            $("#span_email_ids").text('');
            $("#update_data").prop('disabled', false);
        }
    }

});


$(document).on("click", ".email_cross_dt i", function() {
    $(this).closest(".form_group_dt").find(".clear_detail").val('');
    $('.email_cross_dt').html('');
    $('.otp_emails').removeClass('send_otp_active');
    $("#update_data").prop('disabled', true);
    if ($('#email_ids').val() == '') {}
});

$(document).on("click", ".mobile_cross_dt i", function() {
    $('.send_otp_email').removeClass('send_otp_active');
    $(this).closest(".form_group_dt").find(".clear_detail").val('');
    $('.mobile_cross_dt').html('');
    $('.gend_position').removeClass('send_otp_active');
    $("#update_data").prop('disabled', true);
    if ($('#mob_num').val() == '') {}
});

$(document).ready(function() {
    $('.email_cross_dt').html('');
    $('.mobile_cross_dt').html('');

});
</script>

<script>
        var resend = 0;

function send_otp(otp_medium, validate_medium, primary_url = '') {
    var validate_id = validate_medium == 'email' ? "email_ids" : "mob_num";
    var validateVal = $('#' + validate_id).val();

    if (validate_medium != 'email') {
        if (validateVal.length < 10) {
            $("#span_mob_num").text("Please enter valid mobile no.");
            return false;
        }
    } else {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(validateVal) || (validateVal == '')) {
            $("#span_email_ids").text("Please enter valid email");
            if (!emailRegex.test(validateVal)) {
                return false;
            }

        } else {
            $("#span_email_ids").text('');
        }
    }

    var id = otp_medium == 'email' ? "email_ids" : "mob_num";
    var mediumVal = $('#' + id).val();
    var country_code = otp_medium == 'email' ? "" : $("#country_code").val();

        
    timeLeft = 59;
    stopCountdown()

    if (mediumVal == '') {
        toastr.error(otp_medium + 'field is required');
        return false;
    }
// console.log('response',otp_medium);
            if(otp_medium != "email" ){
                queueTrackingDataWithDelay('trackEvent', ['UserDetail', 'Select', 'WithMoileNumber'],10);
                } else {
                queueTrackingDataWithDelay('trackEvent', ['UserDetail', 'Select', 'WithEmailId'],20);
                }
                $('.send_otp_email').prop('disabled', true);
                 $('.send_otp_email').removeClass('send_otp_active');
    $.ajax({
        url: '<?= base_url('/web/Login_register/send_otp'); ?>',
        type: "POST",
        dataType: "json",
        data: {
            phone: mediumVal,
            user_detail : 1,
            countryCode: country_code,
            primary_url : primary_url,
            resend:resend
        },
        success: function(response) {
            
            if (response.status == true) {
                if(resend ==0){
                queueTrackingDataWithDelay('trackEvent', ['UserDetails', 'SendOtp'],30);
                }else{
                queueTrackingDataWithDelay('trackEvent', ['UserDetails', 'ResendOtp'],50);
                }
                $('#send_otpModal').on('hidden.bs.modal', function () {
                    $(this).removeData('bs.modal');          // Clear modal data
                });
                $('#send_otpModal').modal('hide');
                //alert(mediumVal);
                $("#primary_url").val(primary_url);
                var phone_c = '';
                var click_via = 2;
                let formattedNumber = "";
                
                if (mediumVal.length == 10 && !(mediumVal.includes("@"))) {
                    formattedNumber = mediumVal.substring(0, 2) + '******' + mediumVal.substring(8);
                    phone_c = "<?= $this->lang->line('n-number') ?> +91" + " " + formattedNumber;
                    click_via = 1;
                } else{
                    var parts = mediumVal.split('@');
                    var username = parts[0];
                    var domain = parts[1];
                    let visibile_char = 5;
                    let star_string = '';
                    if(username.length > visibile_char){ 
                        star_string= "*****";
                        if(username.length <= 10){
                            let star_count = 10 - username.length;
                            star_string= "*";
                            for($i=0;$i>star_count;$i++){
                                star_string += star_string;
                            }
                        }
                    }
                    let shortenedUsername = username.substring(0, visibile_char) + star_string;
                    formattedNumber = shortenedUsername + '@' + domain;
                    phone_c = "<?= $this->lang->line('e-email') ?> " + formattedNumber;
                }
                //alert("ok");
                $("#resend_div").hide();
                $('#mob_chng h6').html(phone_c + "<span class='ms-2' style='color:var(--pbc)'></span>");
                $('#ephone').val(mediumVal);
                $('#ccode').val("+91");
                //$('#send_otpModal').modal('show');
                setTimeout(function() {
                    $('#send_otpModal').modal('show');
                }, 1000);
                $('#send_otpModal').on('shown.bs.modal', function() {
                    var $input = $('#otp1');
                    $input.focus();
                    // $input[0].setSelectionRange($input.val().length, $input.val().length);
                });
                $('#click_via').val(click_via);
                $("#some_div").show();
                startCountdown();
                toastr.success(response.message, 'Success');//<?//= $this->lang->line("success") ?>');

            } else {
                if (validate_id == 'mob_num') {
               // $('.gend_position').removeClass('d-none');
                 $('.send_otp_email').removeClass('send_otp_active');
                }
                toastr.error(response.message, 'Error');//<?//= $this->lang->line("error") ?>');
            }

        },
        error: function(xhr, status, error) {
            // Handle error
            console.error("Error sending mobile OTP: " + error);
        }
    }).done(function() {
        setTimeout(function() {
            $("#overlayonajaxhit").fadeOut(300);
        }, 500);
    });

}

$(document).ready(function() {
    var count = 0;
    $(".user_otp_modal .verify_otp").click(function() {
        var otp = "";
        //timeLeft = 60;
        //stopCountdown();
        var mediumValue = $('#ephone').val();
        var click_via = $('#click_via').val();
        var ccode = $('#ccode').val();
        var primary_url = $("#primary_url").val();
        $(".otp-input").each(function() {
            otp += $(this).val();
        });
        let redirected_from_game = "<?= $redirected_from_game; ?>";
        //alert(redirected_from_game);
        $.ajax({
            url: '<?= base_url('/web/Login_register/sendOtpVerification'); ?>',
            type: "POST",
            dataType: "json",
            data: {
                otp: otp,
                mediumValue: mediumValue,
                countryCode: ccode,
                click_via: click_via,
                primary_url: primary_url,
            },
            success: function(response) {
                //console.log(response);
                var varified = '<?=$this->lang->line("acc-varified")?>';
                if (response.status == true) {
                   
                    queueTrackingDataWithDelay('trackEvent', ['UserDetails', 'VerifiedOTP'],40);
                    toastr.success('<?= $this->lang->line("OTP-Verification") ?>',
                    '<?= $this->lang->line("success") ?>');
                    $('#send_otpModal').modal('hide');
                    $('.mobile_cross_dt,.email_cross_dt').html('');
                    $(".gend_position").addClass('d-none');
                    $('#verify-otp').css('pointer-events', 'none');
                    $('#verify-otp').removeClass('pgactivess');
                    if (click_via == 1) {
                        $("#mob_num").attr('readonly', true);
                        $(".send_otp_email[data-type='mobile']").text(varified);
                        $(".send_otp_email[data-type='mobile']").addClass('pe-none');
                        
                        if (count == 0) {
                            count++;
                            send_otp('email');
                        }
                        if(redirected_from_game == "YES"){
                            let game_url = "<?= base_url('content-detail?id=').$game_id;?>";
                            //alert(game_url);
                            urls_call(game_url);
                        }
                    }
                    if (click_via == 2) {
                        $("#email_ids").attr('readonly',true);
                        $(".send_otp_email[data-type='email']").text(varified);
                        $(".send_otp_email[data-type='email']").addClass('pe-none');

                        if (count == 0) {
                            count++;
                            send_otp('mobile');
                        }
                    }
                    
                } else {
                     toastr.error(response.message, 'Error');
                    // toastr.error(response.message, '<?= $this->lang->line("error") ?>');
                }
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error("Error Verifying OTP: " + error);
            }
        });
    });
});
</script>
<script>
   
var timeLeft = 59;
var elem = document.getElementById('some_div');
var timerId;

function startCountdown() {
    timerId = setInterval(countdown, 1000);
    $('#otp1, #otp2, #otp3, #otp4, #otp5, #otp6').val('');
}

function stopCountdown() {
    clearInterval(timerId);
}
$("#resend_div").hide();

function countdown() {
    if (timeLeft === 0) {
        clearTimeout(timerId);
        $(".time-color").html("");
        $("#some_div").hide();
        $("#resend_div").show();
       
    } else {
        elem.innerHTML = '<span class="rs_time"><?= $this->lang->line('Resend-OTP-in') ?> </span> <span class="time-color" >' + timeLeft + "s" + '</span>';
        $("#resend_div").hide();
        timeLeft--;
    }
}
const inputs = document.querySelectorAll(".otp-field > input");
const button = document.querySelector(".btn");

window.addEventListener("load", () => inputs[0].focus());

inputs[0].addEventListener("paste", function(event) {
    event.preventDefault();

    const pastedValue = (event.clipboardData || window.clipboardData).getData(
        "text"
    );

    const otpLength = inputs.length;

    for (let i = 0; i < otpLength; i++) {
        if (i < pastedValue.length) {
            inputs[i].value = pastedValue[i];
            inputs[i].removeAttribute("disabled");
            inputs[i].focus;
        } else {
            inputs[i].value = ""; // Clear any remaining inputs
            inputs[i].focus;
        }
    }
});

inputs.forEach((input, index1) => {
    input.addEventListener("keyup", (e) => {
        

        const currentInput = input;
        const nextInput = input.nextElementSibling;
        const prevInput = input.previousElementSibling;
       
        if (currentInput.value.length > 1) {
            return false;
            //currentInput.value = '' ;
        }
        
        if (nextInput &&  nextInput.hasAttribute("disabled") &&  currentInput.value !== "") { 
            nextInput.removeAttribute("disabled");
            nextInput.focus();
        }

        button.classList.remove("active");
        button.setAttribute("disabled", "disabled");

        const inputsNo = inputs.length;
        if (!inputs[inputsNo - 1].disabled && inputs[inputsNo - 1].value !== "") {
            button.classList.add("active");
            button.removeAttribute("disabled");
            return;
        }
    });
});

$(document).ready(function() {
    $('#otp6').on('input', function(event) {
        let otpvalue = $(this).val();
        if(otpvalue.length > 1){
            $('#otp6').val(otpvalue.charAt(0));
            return false;
        }
    });
   $('#otp6').on('keyup', function(event) {
        if (event.key === 'Enter') {
            $('#verify-otp').click();
        }
    });
});
$(document).ready(function() {
    $('.otp-input').on('keyup', function() {
        var otp1 = $('#otp1').val();
        var otp2 = $('#otp2').val();
        var otp3 = $('#otp3').val();
        var otp4 = $('#otp4').val();
        var otp5 = $('#otp5').val();
        var otp6 = $('#otp6').val();

        if ((otp1.length != 0) && (otp2.length != 0) && (otp3.length != 0) && (otp4.length != 0) && (otp5.length != 0) && (otp6.length != 0)) {
            $('#verify-otp').css('pointer-events', '');
            $('#verify-otp').css('background', '');
            $('#verify-otp').addClass('pgactivess');
        } else {  
            $('#verify-otp').css('pointer-events', 'none');
          $('#verify-otp').removeClass('pgactivess');
        }
    });
});


$('#resend_div a').click(function() {
    stopCountdown();
    $('#resend_div').hide();
    resend = 1;
    timeLeft = 59;
    $("#overlayonajaxhit").fadeIn();
    var click_via = $('#click_via').val();
    if (click_via != 1) {
        $(".send_otp_email[data-type='mobile']").click();
    } else {
        $(".send_otp_email[data-type='email']").click();
    }

});









$('#login_form').submit(function(e) {
    $('.num_err').html('');
    $('#otp_send').prop('disabled', true);
    $("#overlayonajaxhit").fadeIn();
    timeLeft = 59;
    e.preventDefault()
    stopCountdown()
    var phone = $('#mobile_no').val();
    var email_id = $('#email_id').val();
    if (phone == "") {
        phone = email_id;
    }
    var countryCode = $('.iti__selected-dial-code').text();
    var otp = "";

    let formattedNumber = "";
    var phone_c = "number +91" + " " + formattedNumber;
    let visibile_char = 5;
    if (email_id != '') {
      var parts = email_id.split('@');
      var username = parts[0];
      var domain = parts[1];
      let visibile_char = 5;
      let star_string = '';
      if(username.length > visibile_char){ 
        star_string= "*****";
        if(username.length <= 10){
            let star_count = 10 - username.length;
            star_string= "*";
            for($i=0;$i>star_count;$i++){
                star_string += star_string;
            }
        }
      }
      let shortenedUsername = username.substring(0, visibile_char) + star_string;
        formattedNumber = shortenedUsername + '@' + domain;
        phone_c = "email" + " " + formattedNumber;
    } else {
        phone.substring(0, 2) + '******' + phone.substring(8);
        phone_c = "number +91" + " " + formattedNumber;
    }
    //alert("ok1");
    // var phone_c = "+91" + " " + formattedNumber;
    // console.log(phone,countryCode,resend,otp,phone_c)
    $('#mob_chng h6').html(phone_c + "<span class='ms-2' style='color:var(--pbc)'></span>");


    if (phone == "") {
        $('.num_err').text('Please enter mobile number').removeClass('d-none')

        return false;
    }

    if (phone.length < 10) {
        $('.num_err').text('Please enter valid mobile number').removeClass('d-none')

        return false;
    } else {
        //console.log('respinneronse',email_id);
            if(email_id != " " ){
                queueTrackingDataWithDelay('trackEvent', ['UserDetail', 'Select', 'WithMoileNumber'],15);
                } else {
                queueTrackingDataWithDelay('trackEvent', ['UserDetail', 'Select', 'WithEmailId'],25);
                }
        $.ajax({
            type: 'POST',
            url: '<?= base_url('/web/Login_register/send_otp'); ?>',
            dataType: "json",
            data: {
                phone: phone,
                countryCode: countryCode,
                otp: otp,
                email_id: email_id,
                resend: resend
            },

            success: function(data) {
                if (data.status == 1) {
                  

                    // toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
                    toastr.success('<?= $this->lang->line("otp_sent") ?>',
                        '<?= $this->lang->line("success") ?>');

                } else {
                    toastr.error(data.message, '<?= $this->lang->line("error") ?>');
                    $('#otp_send').prop('disabled', false);
                }
            }
        }).done(function() {
            setTimeout(function() {
                $("#overlayonajaxhit").fadeOut(300);
            }, 500);
        });
    }
})




$(document).ready(function() {
    $('.male_white').addClass('d-none');
    $('.ng-valid').click(function() {
        var index = $('.ng-valid').index(this);

        // Hide all male_white divs and show all male_bg divs
        $('.male_white').addClass('d-none');
        $('.male_bg').removeClass('d-none');

        // Show the clicked button's corresponding male_white div and hide its male_bg div
        $('.male_bg').eq(index).addClass('d-none');
        $('.male_white').eq(index).removeClass('d-none');
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll(".otp-input");

    inputs[0].focus();

    inputs.forEach((input, index) => {  
        input.addEventListener("keydown", (event) => {
            
            if (event.code === "Backspace" && input.value === "") {  
                if (index > 0) {
                    inputs[index - 1].focus();
                }
            }else if (event.code === "Backspace" && input.value !== "") {  
                
                    inputs[index].focus();
                
               }
             
        });

        input.addEventListener("input", (event) => {  
            input.value = input.value.replace(/[^0-9]/g, ''); // Ensure only digits are entered
            if (input.value.length > 1) {
                input.value = input.value.slice(0, 1);
            }
            if (input.value.length === 1 && index < inputs.length - 1 ) {
                inputs[index + 1].focus();
            }
        });

        input.addEventListener("paste", (event) => {
            event.preventDefault();
            const pasteData = event.clipboardData.getData("text/plain").split("");
            fillData(index, pasteData);
        });
    });

    function fillData(index, data) {
        for (let i = index; i < inputs.length && data.length > 0; i++) {
            inputs[i].value = data.shift().replace(/[^0-9]/g, ''); // Ensure only digits are entered
            if (inputs[i].value !== "" && i < inputs.length - 1) {
                inputs[i + 1].focus();
            }
        }
    }
});
</script>
<script>
const getDatePickerTitle = (elem) => {
    // From the label or the aria-label
    const label = elem.nextElementSibling;
    let titleText = "";
    if (label && label.tagName === "LABEL") {
        titleText = label.textContent;
    } else {
        titleText = elem.getAttribute("aria-label") || "";
    }
    return titleText;
};

function getTodayDate() {
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0'); // Months start at 0!
    const dd = String(today.getDate()).padStart(2, '0');
    return `${yyyy}-${mm}-${dd}`;
}



const elems = document.querySelectorAll(".datepicker_input");
for (const elem of elems) {
    // Check if elem is indeed a valid DOM element
    if (elem instanceof Element) {
        // Calculate the date less than 18 years from today
        const maxDate = new Date();
        maxDate.setFullYear(maxDate.getFullYear() - 12);

        const datepicker = new Datepicker(elem, {
            format: "yyyy-mm-dd", // Change format to match the desired format
            title: getDatePickerTitle(elem), // Assuming getDatePickerTitle() function is defined
            maxDate: maxDate, // Set the maxDate to less than 18 years from today
            changeMonth: true,
            changeYear: true,
            yearRange: "c-100:c",
            autohide: true, // Assuming autohide is supported by your Datepicker library
           
        });
        elem.addEventListener('changeDate', function (event) {
            const selectedDate = event.detail.date; // Assuming the event object carries the selected date
            // alert('Selected date: ' + selectedDate.toISOString().split('T')[0]);
            var dates = selectedDate.toISOString().split('T')[0];
            $("#update_data").prop('disabled', false);
            queueTrackingDataWithDelay('trackEvent', ['UserDetails', 'DateOfBirth', "DOB ( " +dates+ ")"],0);

        });
        
    }
}


$(document).on("click", ".close", function() {
    //location.reload();
    var emails = "<?=$email?>";
    // var mobile="<//?=$mobile?>";
   // $("#email_ids").val('');
  if(emails.length>0){
   $(".send_otp_email").prop('disabled', false);
    $("#mob_num").val('');
    $(".mobile_cross_dt").html('');

  }else{
    //  / /alert('hi')
   $("#email_ids").val('');
  
   $(".email_cross_dt").html('');
  }



    // $('.gend_position').removeClass('d-none');
    // $('.send_otp_email').addClass('send_otp_active');
});



</script>
<script>

    $(document).ready(function() {
        var c_code = "<?php echo htmlspecialchars($_SESSION['country_code'], ENT_QUOTES, 'UTF-8'); ?>";
        // Initialize intlTelInput
    var input = $(".mob_num_int");
    var iti = input.intlTelInput({
      autoHideDialCode: true,
      autoPlaceholder: "ON",
      dropdownContainer: document.body,
      formatOnDisplay: true,
      initialCountry: "in",
      placeholderNumberType: "MOBILE",
      preferredCountries: ["in", "us", "gb", "au"],
      separateDialCode: true
    });

    // Capture the change event
    // input.on('countrychange', function() {
    //   $(".mobile_input").val('');
    //   $('#otp_send').prop('disabled', true);
    // });

    // // Capture input field change event
    // input.on('input', function() {

    // });
  });
   

  function handleGenderChange(selectedGender) {
    $('#update_data').prop('disabled',false);
    queueTrackingDataWithDelay('trackEvent', ['UserDetails', 'Gender', "SelectedGender( " + genderLabels[selectedGender] + ")"],110);
    }
    function handleChange() {
        $('#update_data').prop('disabled',false);
    }
  $(window).on('load', function() {
    
    queueTrackingDataWithDelay('trackEvent', ['Page', 'View', 'UserDetails'],0);
    })

    

  
</script>

