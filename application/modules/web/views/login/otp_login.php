<style>
  section#main-content {
    flex-grow: inherit;
  }

  .input:-internal-autofill-selected {
    -webkit-text-fill-color: #fff !important;

  }

  header {
    display: none;
  }

  .yourNum {
    font-size: 11px;
  }

  .descrpition_title_sb_btn {
    background: var(--pbg) !important;
    border-radius: 4px;
    padding: 9px 20px !important;
    width: 100%;
    color: var(--white) !important;
    font-size: 15px;
    border: none;
  }
  .country-list {
    width: 511px;
    margin-top: 24px !important;
  }

  .bac_tohome {
    background: inherit !important;
    border: none;

  }

  .m_body {
    /* display: grid;
    align-content: center; */
    overflow: hidden;
    gap: var(--space);
    width: 100%;
    height: 100vh;
position:relative;
z-index:2;
    font-size: 1.5rem;
    line-height: 1.5;
    padding: 0 !important;
    
  }

  .number_input {
    cursor: auto;
    color: #919191;
  }

  .f-17 {
    font-size: 17px;
  }

  .lin-21 {
    margin: 0px auto 15px auto;
    width: 70%;
    font-weight: 300;
    font-size: 13px;
  }

  .login_sec_right {
    padding: 20px 30px;
  }

  .custom-field {
    position: relative;
    font-size: 14px;
    border-top: 0 solid transparent !important;
    /*margin-bottom: 22px;*/
    display: inline-block;
    --field-padding: 12px;
  }

  .custom-field input {
    border: none;

    color: #fff;
    padding: 10px;
    font-size: 14px;
    border-radius: 8px;
    width: 100%;
    outline: none;
    align-items: center;
    cursor: auto;
    display: flex;
    border: 1px solid #4b5166;
  }

  .intl-tel-input .country-list .country {
    font-size: 15px;
  }

  .country-list {
    width: 300px !important;
  }

  .custom-field .placeholder {
    position: absolute;

    width: calc(100% - (var(--field-padding) * 2));
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    top: 21px;
    font-size: 12px;
    line-height: 100%;
    font-weight: 400;
    transform: translateY(-50%);
    color: #999999;
    font-family: 'Poppins-Regular';
    transition: top 0.3s ease, color 0.3s ease, font-size 0.3s ease;
  }

  .intl-tel-input .selected-flag .iti-arrow {
    right: 0 !important;
    display: none;
  }

  .intl-tel-input .flag-container {
    top: -2px !important;

  }

  .bacto {
   padding: 25px 0 10px 25px;
    z-index: 999;
    color: #fff;
    font-size:18px;
  }

  .custom-field.one input {
    border: 1px solid rgba(255, 255, 255, 1);
    transition: border-color 0.3s ease;

  }

  .custom-field.one input+.placeholder {
    left: 8px;
    padding: 0 5px;
  }

  .custom-field.one input.dirty,
  .custom-field.one input:not(:placeholder-shown),
  .custom-field.one input:focus {
    border-color: rgba(255, 255, 255, 1);
    transition-delay: 0.1s;
  }

  .custom-field.one input.dirty+.placeholder,
  .custom-field.one input:not(:placeholder-shown)+.placeholder,
  .custom-field.one input:focus+.placeholder {
    top: 0;
    font-size: 10px;
    color: #4b5166;
    background: #030b17;
    width: auto;
  }

  .contact_login {
    width: 100px;
    align-items: center;
    border-radius: 8px;
    cursor: default;
    display: flex;
    padding: 4px 7px;
    border: 1px solid #434343;
    background: #202020;
    height: auto;
  }

  .cont_number {
    align-items: center;
    display: flex;
    justify-content: center;
    font-size: 16px;
  }

  .cont_number img {
    width: 30px;
    height: 30px;
    /* margin-left:5px;*/
  }

  .PANTHER_GREY_06 {
    color: #4b5166;
  }

  .login_form .login_title {
    margin-bottom: 0 !important;
    font-weight: 600;
  }


  .login_condition {
    font-size: 14px;
    color: #fff;
    opacity: 0.8;
  }

  .login_help {
    font-size: 16px;
    color: rgba(151, 151, 151, 1);

    display: block;
  }

  #resend_div {
    color: rgba(151, 151, 151, 1) !important;
  }

  #resend_div a {
    color: var(--pbc);
    font-family: 'AnekLatin-Bold';
  }

  .login_help_otp {
    min-height: 26px;
    max-height: 26px;
    font-size: 14px;
    color: #80807F;
  }

  .otp-field {
    flex-direction: row;
    column-gap: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .otp-field input {
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

  .otp-field input:focus {
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
  }

  .otp-field input::-webkit-inner-spin-button,
  .otp-field input::-webkit-outer-spin-button {
    display: none;
  }

  .footer-area {
    display: none;
  }

  .intl-tel-input.separate-dial-code .selected-dial-code {
    display: table-cell;
    vertical-align: middle;
    padding-left: 28px;
    line-height: 1px;
    font-size: 16px;
  }

  .error_message {
    color: red;
    font-size: 12px;
    font-family: system-ui;
  }

  .custom-field.two input {

    width: 400px !important;

  }

  .sign_countinue {
    padding: 20px 0;
  }

  .sign_countinue h1 {
    font-size: 26px;
    font-family: system-ui;
    margin-top: 50px;
    margin-bottom: 0 !important;
  }


  .text-ccc {
    color: #b6b6b6;
  }

  .login_condition a {
    color: #C82333;
  }

  .intl-tel-input.separate-dial-code .selected-dial-code {
    padding-left: 27px !important;
  }

  .num_err {
    position: absolute;
    bottom: -12px;
    font-size: 12px;
    left: 0;
  }

  .f-17 {
    font-size: 17px;
  }

  .sign_countinue {
    width: 72%;
  }



  .toast-success,
  .toast-info,
  .toast-warning {
    width: 400px !important;
    font-family: 'Poppins', sans-serif;
    font-size: 0.75rem;
    border-radius: 4px !important;
    /* background-color: #edf1fd; */
    color: #01081e !important;
    border-color: transparent !important;
  }
  #toast-container>.toast-warning{
    background:inherit !important;
    background-image: url( "<?= base_url('assets/images/warning-img.png'); ?>") !important; /* Path to your icon */
    background-size: 20px 20px;
    background-repeat: no-repeat;
    padding-left: 30px; /* Adjust the padding to avoid overlap with text */
    color: #f39c12; /* Change icon color if necessary */
}

  .closebtn {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background-color: #ccd7fc !important;
  }

  .closebtn>i {
    color: #000617;
    font-weight: 500;
  }

  .otp_policy {
    width: 70%;
    margin: auto;
    font-size: 11px;
    text-align: center;
    margin: 12px auto 0 auto !important;
    color: #e3e2e2;
  }

  .mobile_cross {
    transform: translateY(-50%);
    position: absolute;
    top: 22px;
    right: 9px;
  }

  .otp_policy a {
    color: #4845f6 !important;
  }

  .number_input:focus {
    border-color: #4845f6;
  }

  /* .otp-input:focus {
    border-color: #4845f6;
  } */

  .dynamic_number {
    display: inline-block;
    color: #b6b6b6;
    font-size: 15px;
  }

  .having_btn {
    font-size: 12px !important;
    color: #e7e7e7 !important;
  }

  .or_sign_border {
    color: #747474 !important;
    font-size: 16px;
    position: relative;
    text-align: center;
  }

  .or_sign_border:before {
    border: 1px solid;
    position: absolute;
    content: "";
    top: 40%;
    right: 56%;
    width: 150px;
  }

  .or_sign_border:after {
    border: 1px solid;
    position: absolute;
    content: "";
    top: 40%;
    left: 56%;
    width: 150px;
  }

  .login_emial p {
    color: #999999D9;
    text-align: center
  }

  .login_emial a {
    color: var(--pbc) !important;

  }

  .email_cross {
    transform: translateY(-50%);
    position: absolute;
    top: 22px;
    right: 9px;
  }

  #email_id {
    font-size: 15px;
    font-weight: initial;
  }

  @media (min-width: 992px) and (max-width: 1024px) {

    .login_form {
      width: 95% !important;
    }

    #main-content {
      min-height: inherit !important;
    }
  }


  @media (min-width: 768px) and (max-width: 991px) {
    .custom-field input {
      width: 100%;
    }

    #main-content {
      min-height: inherit !important;
    }

    .mobOtpLogin .login_position img {
      display: none;
    }

    .mobOtpLogin {
      padding: 30px 15px !important;
    }

    .login_form .otp_policy {
      width: 65% !important;
    }

    .bacto {
      /* position: relative !important;
      top: inherit;
      left: 25px; */
      z-index: 999;
      color: #fff;
    }

    .descrpition_title_sb_btn {
      width: 100%;
    }

    .or_sign_border:before {
      right: 56%;
      width: 80px;
    }

    .or_sign_border:after {
      top: 40%;
      left: 56%;
      width: 80px;
    }

    .otp-field input {
      height: 45px;
      width: 100%;
    }

    .login_form {
      width: 100% !important;
    }

    .cont_number img {
      width: 26px;
      height: 26px;
    }

    .lin-21 {
      width: 88%;
    }

    .otp_policy {
      width: 88%;
    }

  }

  @media (min-width: 100px) and (max-width: 767px) {
    .custom-field input {
      width: 100%;
    }

    .descrpition_title_sb_btn {
      width: 100%;
    }

    .otp-field input {
      height: 45px;
      width: 100%;
    }

    .mobOtpLogin {
      display: none;
    }

    .login_sec_right {
      width: 100%;
      margin: 0 auto;
    }

    .login_form {
      width: 100%;
    }

  }

  @media (min-width: 476px) and (max-width: 767px) {


    .cont_number img {
      width: 26px;
      height: 26px;

    }

  }

  @media (min-width: 320px) and (max-width: 475px) {
    .login_form {
      width: 100%;
    }

    #save_details_form label {
      width: 100%;
    }

    .or_sign_border:before {
      right: 56%;
      width: 80px;


    }

    .or_sign_border:after {
      top: 40%;
      left: 56%;
      width: 80px;
      /* height:5px; */

    }

    #save_details_form .custom-field.two input {
      width: 100% !important;
    }

    .cont_number img {
      width: 24px;
      height: 24px;
    }

    .sign_countinue {
      width: 100% !important;
    }

    .lin-21 {
      width: 100%;
    }
  }

  @media (min-width: 320px) and (max-width: 767px) {
    #main-content {
      min-height: inherit !important;
    }
 .bacto {
   padding: 15px 0 10px 25px;
    z-index: 999;
    color: #fff;
    font-size:18px;
  }
    .mobOtpLogin {
      height: 40vh;
      overflow: hidden;
    }
  }

  .login-bgimg {
    height: 100vh !important;
    overflow-y: auto;
    display: grid;
    align-items: center;
  }

  .m_body {
    background:rgba(0,0,55,1);
    background-image: url(<?= base_url('assets/images/term-img.png') ?>);
    background-repeat: repeat-x;
    background-size: contain;
    overflow-y: auto;
    padding: 20px 0;
  }

  .descrpition_title_sb_btn.btn:disabled {
    opacity: 0.6 !important;
  }

  .email_login,
  .otp_verify,
  .sign_countinue,
  .footer-area {
    display: none;
  }
  .site-min-height{
      min-height:inherit !important;
      height:inherit !important;
  }

   /* Hide arrows in WebKit browsers (Chrome, Safari) */
   input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Hide arrows in Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }
       
</style>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.all.min.js"></script>
<div class="" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="" role="document">
    <div class="login_content login-bgimg">

      <div class=" m_body">
        <div class="" style="position: relative;">
          <div class="bacto" id="mob_chng"><button class="text-white bac_tohome"><i class="fas fa-chevron-left"></i></button></div>
        </div>
        <div class="row align-items-center rows_dt_cetr">

          <div class="otphg">
            <div class="login_sec_right">

              <div class="login_form ">
                <div class="login_div">
                  <div class="text-center login_logo">
                    <img src="<?= LOGO; ?>" class="img-fluid" alt="logo">
                  </div>
                  <h1 class="text-white mt-4 login_title text-center"> <?= $this->lang->line('Login-to-your-accoun') ?><br/><?= $this->lang->line('Login-to-your-account') ?></h1>
                  <p class="text-ccc f-14 lin-21 text-center et_num email_text_string otps-string"> <?= $this->lang->line('Login-enter-nos') ?></p>
                  <form id="login_form">
                    <div class="login_mobile">
                      <div class="d-flex align-items-center mb-3">

                        <div style="display: grid; position:relative; width:100%;">
                          <label class="custom-field one m-0 w-100">
                          <input type="text" class="number_input mobile_input" id="mobile_no" placeholder="<?= $this->lang->line('acc-mob') ?>" autofocus />

                            <!-- <span class="placeholder">Enter Phone Number</span> -->
                            <span class="mobile_cross"></span>
                          </label>
                          <p class="otp_se mt-1"><?= $this->lang->line('otp-sends') ?></p>
                          <!-- <small class="text-danger num_err "></small> -->
                        </div>
                      </div>
                    </div>
                    <div class="email_login">
                      <!-- <h6 class="text-white mb-2 pt-1 enterMobileNum"><//?= $this->lang->line('email_address') ?></h6> -->
                      <div class="mb-3">
                        <div style="display: grid; position:relative; width:100%;">
                          <label class="custom-field one m-0">
                            <input type="email" class="mail_input" id="email_id" maxlength="60" placeholder="<?= $this->lang->line('email_address1') ?>" aria-label="Enter Email Address" autofocus />
                            <span class="email_cross">&times;</span>
                          </label>
                          <p class="otp_se mt-1"><?= $this->lang->line('otp-emailsends') ?></p>
                          <!-- <small class="text-danger num_err "></small> -->
                        </div>
                      </div>
                    </div>
                    <div class="or_sign_email pt-3 pb-3">
                      <h6 class="mb-0 or_sign_border"><?= $this->lang->line('or') ?></h6>
                    </div>
                    <div class="login_emial pt-3 pb-4">
                      <p class="mb-0"><?= $this->lang->line('login_with') ?> <a class="email_txt"><?= $this->lang->line('email_address') ?></a><a class="loginmob_txt"><?= $this->lang->line('mobile_number') ?></a></p>
                    </div>
                    <!-- <p class="text-ccc pt-1 mb-4 text-center yourNum"><//?= $this->lang->line('sms-verify') ?></p> -->

                    <div class="mb-5">
                      <div class="w-75 m-auto">
                        <button type="submit" class="descrpition_title_sb_btn shadow-none btn align-self-center me-2 p-2 " id="otp_send"> <?= $this->lang->line('Send-OTP') ?></button>
                      </div>
                        <div class="w-75 m-auto mt-3">
                          <button type="button" class="skip_browser shadow-none btn me-2 p-2" onclick="skip_login()"> <?= $this->lang->line('Skip-browser') ?></button>
                        </div>
                    </div>
                  </form>
                  <!-- <p class="login_condition mt-3 d-block otp_policy"> <//?= $this->lang->line('confirm-that-agree') ?><a href="<//?= base_url() ?>privacy-policy?type=PrivacyPolicy" target="_blank" rel="noopener"> <//?= $this->lang->line('Privacy-Policy') ?></a> <//?= $this->lang->line('and') ?><a href="<//?= base_url() ?>terms-conditions?type=TearmsAndConditions" target="_blank" rel="noopener"> <//?= $this->lang->line('Term&Conditions') ?> </a><//?= $this->lang->line('sahmat') ?></p> -->
                  <div c;ass="w-75 m-auto">
                    <p class="text-center having_txt"><?= $this->lang->line('having-trable') ?> <a href=" <?= base_url('faq-content') ?>" class="hel_btn help_ma" ><?= $this->lang->line('help') ?></a></p>
                  </div>
                </div>
                <div class="otp_verify">
                  <form id="otp_verify_form">
                    <div class="text-center login_logo">
                      <img src="<?= LOGO; ?>" class="img-fluid" alt="logo">
                    </div>
                    <h1 class="text-white mt-4 login_title text-center"> <?= $this->lang->line('Login-to-your-accoun') ?><br/><?= $this->lang->line('Login-to-your-account') ?></h1>
                    <p class="text-ccc f-14 lin-21 text-center et_num email_text_string"> <?= $this->lang->line('enter-otps') ?></p>
                       <span class="login_help_otp d-block text-center" id="mob_chng">
                        <h6 class="dynamic_number line21"> <span class="ml-2" onclick='history_go()' style="color:#4845f6"><i class="fas fa-pencil-alt"></i></span></h6>
                      </span>
                    <div class="otp-field mb-2 mt-4 pt-4 otp-wid">
                      <input type="number" pattern="\d" class="otp-input" maxlength="1" id="otp1" autofocus />
                      <input type="number" pattern="\d" class="otp-input" maxlength="1" id="otp2" disabled />
                      <input type="number" pattern="\d" class="otp-input" maxlength="1" id="otp3" disabled />
                      <input type="number" pattern="\d" class="otp-input" maxlength="1" id="otp4" disabled />
                      <input type="number" pattern="\d" class="otp-input" maxlength="1" id="otp5" disabled />
                      <input type="number" pattern="\d" class="otp-input" maxlength="1" id="otp6" disabled />
                      <!-- <small class="text-danger otp_err d-none"></small> -->
                    </div>

                    <div class="otp-wid mb-3">
                      <div class="login_help_otp text-left">
                        <p id="resend_div"> <?= $this->lang->line('not-receive-code') ?>
                          <a href="javascript:void(0)"> <?= $this->lang->line('Resend') ?></a>

                          <!-- <a href="javascript:void(0)" id="resend_div" class="descrpition_title_sb_btn btn shadow-none align-self-center me-2 p-2"  style="display:none; color:#ffffff!important">Resend OTP </a> -->
                        </p>
                        <span class="login_help" id="some_div"> </span>
                      </div>
                    </div>
                    <div class=" mb-4 w-75 m-auto">
                      <button type="submit" class="descrpition_title_sb_btn shadow-none btn align-self-center me-2 p-2" id="verify"><?= $this->lang->line('next') ?></button>
                      <!-- <a class="descrpition_title_sb_btn btn shadow-none align-self-center me-2 p-2" id="verify" href="javascript:void(0)" onclick="verify_otp()" style="color:#ffffff!important ">Verify OTP</a>  -->
                    </div>
                    <!-- <div class="">
                      <button class="having_btn"> <//?= $this->lang->line('Having-Issue?') ?> <a href="<//?= base_url('faq-content') . '?type=ContactUs' ?>" class="time-color" target="_blank" rel="noopener"> <//?= $this->lang->line('Contact-Us') ?> </a></button>
                    </div> -->
                    <div class="w-75 m-auto mt-5">
                      <p class="text-center having_txt"><?= $this->lang->line('having-trable') ?> <a href=" <?= base_url('faq-content') ?>" class="hel_btn" target="_blank"><?= $this->lang->line('help') ?></a></p>
                      <!-- <div class="login_help_otp" id="mob_chng"><b><a href="javascript:void(0)"><i class="fas fa-pencil me-2"></i>Change Mobile Number</a></b></div> -->
                    </div>

                  </form>
                </div>


              </div>

              <div class="sign_countinue" style="display:none">
                <h1 class="text-white login_title"> <?= $this->lang->line('Login-to-your-account') ?></h1>
                <form id="save_details_form">
                  <div>
                    <label class="custom-field one two  mb-0">
                      <input type="text" name="name" class="number_input" placeholder="" />
                      <span class="placeholder">Name*</span>
                    </label>
                    <p class="error_message" id="name_err" style="display:none">Please enter your name*</p>
                  </div>
                  <div>
                    <label class="custom-field one two mb-0">
                      <input type="tel" name="mob" class="number_input" id="mob" maxlength="10" val="" placeholder="" />
                      <span class="placeholder">Mobile No.</span>
                    </label>
                    <!-- <p class="error_message">Please enter your Mobile*</p>  -->
                  </div>
                  <div>
                    <label class="custom-field one two mb-0">
                      <input type="email" name="email" class="number_input" placeholder="" />
                      <span class="placeholder">Email Addresss</span>
                    </label>
                    <p class="error_message" id="email_err" style="display:none">Please enter your email*</p>
                  </div>

                  <div class=" mt-3 mb-3">
                    <button type="submit" class="descrpition_title_sb_btn btn align-self-center me-2 p-2 cont-btn">Save Details</button>
                  </div>

                </form>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<div id="overlayonajaxhit" class="payment_loader2">
  <div class="cv-spinner">
    <span class="spinner"><span class="loader_spn"></span></span>
  </div>
</div>
<script src="<?= base_url('assets/website_assets/js/sweetalert2@8.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
<script type="module" src="<?= base_url('assets/js/firebase-config.js') ?>"></script>
<script>

  function history_go(){
    //e.preventDefault();
    if ($(".login_div").is(':visible')) {
      history.go(-1);
    } else {
      $('.login_div').show();
    }
    $('.otp_verify').hide();
  }

  function skip_login() {
    let lang = "<?= ucwords($this->session->userdata('lang_id')) ?? "English"; ?>";
    let lang_id = "<?= $this->session->userdata('langid') ?? '1'; ?>";
      if (lang_id) {
        $.ajax({
          type: 'POST',
          url: '<?= base_url('/web/Login_register/set_temp_lang'); ?>',
          dataType: "json",
          data: {
            lang_id: lang_id,
            lang: lang,
            skip: true
          },
          success: async function(data) {
            //console.log(data, "Sss");
            let cache_key = "lang_set";
            localStorage.setItem(cache_key,lang);
            let redirect_url = "<?= base_url('language'); ?>";
            if (data.status == true) {
              try {
                
                // await set_cache_data("<//?= $this->session->userdata("lang_id"); ?>", cache_key);
                // await removeCacheData('masterContent', 'all');
                // await removeCacheData('contentDetail', 'all');
                
                if(lang != "English"){
                  Promise.all([deleteAllMasterContentKeys(),removeCacheData('contentDetail', 'all')]);
                }
              } catch (err) {
                console.log(err);
              }
              let redirectUrl = "<?= base_url(); ?>";
              // if(data.url){
              //   redirectUrl = data.url;
              // }
              redirect_url = redirectUrl;
            }
            //alert(redirect_url)
            //window.location.href = redirect_url;
            urls_call(redirect_url);
          },
        })
      }
   }

  $(document).ready(function() {
    $('#otp_send').prop('disabled', true);
    $('#verify').prop('disabled', true);

    $('#mobile_no').on('input', function() {
      var phoneNumber = $(this).val();
      var c_code = $('.iti__selected-dial-code').text();
      if (c_code == "+91") {
        $('#mobile_no').attr('maxlength', '10');
        if (phoneNumber.length > 0) {
          let first_mobile_char = phoneNumber.charAt(0);
          var regex = /^[6-9]$/; // Regular expression to match only numbers 6, 7, 8, or 9
          if (!regex.test(first_mobile_char)) {
            $('#mobile_no').val("");
          }
        }
        // Assuming 'send_otp' is the ID of your button
        $('#otp_send').prop('disabled', phoneNumber.length !== 10);
      } else {
        $('#mobile_no').attr('maxlength', '12');
      }

    });


    $(document).ready(function() {
      let mobile_text = "<?= $this->lang->line('Login-enter-nos') ?>";
      let email_text = "<?= $this->lang->line('Login-enter-no-email') ?>";
      // $('.email_login').hide();
      $('.loginmob_txt').hide();
      //$('.email_txt').hide();
      $('.email_txt').click(function() {
        $('.otps-string').text(email_text);
        $('#mobile_no').val('');
        $('.email_cross').html('');
        $('#otp_send').removeClass('pgactiveg');
        $('.login_mobile').hide();
        $('.email_login').show();
        $('.loginmob_txt').show();
        $('.email_txt').hide();
        $('.mail_input').focus();
        var text = "<?= $this->lang->line('email-verify') ?>";
        $('.yourNum').html(text);
      })
      $('.loginmob_txt').click(function() {
        $('.otps-string').text(mobile_text);
        //var mobileNumber = $('#mobile_no').val();
        $('#email_id').val('');
        $('.mobile_cross').html('');
        var text = "<?= $this->lang->line('sms-verify') ?>";
        $('.yourNum').html(text);

        $('#otp_send').removeClass('pgactiveg');
        $('.email_login').hide();
        $('.login_mobile').show();
        $('.email_txt').show();
        $('.loginmob_txt').hide();
        $('.mobile_input').focus();
      })
    })


    toastr.options = {
      'closeButton': true,
      'debug': false,
      'newestOnTop': true,
      'progressBar': false,
      'positionClass': 'toast-top-right',
      'preventDuplicates': false,
      'showDuration': '1000',
      'hideDuration': '1000',
      'timeOut': '5000',
      'extendedTimeOut': '1000',
      'showEasing': 'swing',
      'hideEasing': 'linear',
      'showMethod': 'fadeIn',
      'hideMethod': 'fadeOut',
    }
  
  });
</script>
<script>
  const inputs = document.querySelectorAll(".otp-field > input");
  const button = document.querySelector(".btn");

  window.addEventListener("load", () => inputs[0].focus());
  //button.removeAttribute("disabled", "disabled");

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
    button.removeAttribute("disabled", "disabled");

  });

  inputs.forEach((input, index1) => {
    input.addEventListener("keyup", (e) => {
      const currentInput = input;
      const nextInput = input.nextElementSibling;
      const prevInput = input.previousElementSibling;

      if (currentInput.value.length > 1) {
        currentInput.value = "";
        return;
      }

      if (
        nextInput &&
        nextInput.hasAttribute("disabled") &&
        currentInput.value !== ""
      ) {
        nextInput.removeAttribute("disabled");
        nextInput.focus();
      }

      // if (e.key === "Backspace") {
      //   inputs.forEach((input, index2) => {
      //     if (index1 <= index2 && prevInput) {
      //       input.setAttribute("disabled", true);
      //       input.value = "";
      //       prevInput.focus();
      //     }
      //   });
      // }

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
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var mobileNumberRegex = /^\{10}$/;
    //       $("#mobile_no").on("keyup", function () {
    //     var inputValue = $(this).val();

    //     // Check if the input matches the mobile number regex
    //     if (mobileNumberRegex.test(inputValue)) {
    //         // Valid mobile number
    //         $('.num_err').text("").addClass('d-none');
    //         $('#otp_send').attr('disabled', false)
    //         // You can add additional logic or styles for a valid number
    //     } else {
    //         // Invalid mobile number
    //         $('.num_err').text("Invalid mobile number");
    //          $('#otp_send').attr('disabled', true).removeClass('d-none')
    //         // You can add additional logic or styles for an invalid number
    //     }
    // });
  })

  var telInput = $("#mobile"),
    errorMsg = $("#error-msg"),
    validMsg = $("#valid-msg");

  // initialise plugin
  telInput.intlTelInput({

    allowExtensions: true,
    formatOnDisplay: true,
    autoFormat: true,
    autoHideDialCode: true,
    autoPlaceholder: true,
    defaultCountry: "in",
    ipinfoToken: "yolo",

    nationalMode: true,
    numberType: "MOBILE",
    //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    preferredCountries: ['in', 'sa', 'ae', 'qa', 'om', 'bh', 'kw', 'ma'],
    preventInvalidNumbers: true,
    separateDialCode: true,
    initialCountry: "in",
    geoIpLookup: function(callback) {
      $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        callback(countryCode);
      });
    },
    utilsScript: "<?= base_url('assets/website_assets/js/utils.js'); ?>"
  });

  var reset = function() {
    telInput.removeClass("error");
    errorMsg.addClass("hide");
    validMsg.addClass("hide");
  };

  // on blur: validate
  telInput.blur(function() {
    reset();
    if ($.trim(telInput.val())) {
      // var mobile= $('#field_number').val("");
      //  var code =$('.selected-flag .selected-dial-code').html();
      //  var regEx = /^[6-9]/;
      //  var validmobile = regEx.test(mobile);
      if (telInput.intlTelInput("isValidNumber")) {
        // if(code==="+91"){
        //     if (!validmobile) {
        //       document.getElementById('err_number').innerHTML="Enter a valid mobile";
        //        $('#field_number').val("");
        //       $('#field_number').focus();
        //       return false;
        //     }
        // } 

        //  validMsg.removeClass("hide");
      } else {
        telInput.addClass("error");
        //  errorMsg.removeClass("hide");
        $('#field_number').val("");
        Swal.fire("invalid number ", '', 'warning');

      }
    }
  });

  // on keyup / change flag: reset
  telInput.on("keyup change", reset);

  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }

  $(document).ready(function() {
    $('.mobile-valid').on('keypress', function(e) {
      var $this = $(this);

      var regex = new RegExp("^[0-9\b]+$");
      var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
      // for 10 digit number only
      let mobile_no_len = 10
      var c_code = $('.iti__selected-dial-code').text();
      if (c_code != "+91") {
        mobile_no_len = 4
      }

      if ($this.val().length >= mobile_no_len) {
        e.preventDefault();
        return false;
      }


      if (e.charCode < 54 && e.charCode > 47) {
        if ($this.val().length == 0) {
          e.preventDefault();
          return false;
        } else {
          return true;
        }

      }
      if (regex.test(str)) {
        return true;
      }
      e.preventDefault();
      return false;
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
    //var countryCode = $('.selected-flag .selected-dial-code').html();
    var countryCode = $('.iti__selected-dial-code').text();
    var resend = 0;
    var otp = "";
    var click_via = 0;
    // let formattedNumber = phone.substring(0, 2) + '******' + phone.substring(8);
    // var phone_c = "<?= $this->lang->line('n-number') ?> +91" + " " + formattedNumber;
    // if (email_id != '') {
    //   phone_c = "<?= $this->lang->line('e-email') ?>" + " " + formattedNumber;
    // }

    let formattedNumber = "";

    if (email_id) {
      var parts = email_id.split('@');
      var username = parts[0];
      var domain = parts[1];
      let visibile_char = 5;
      let star_string = '';
      if (username.length > visibile_char) {
        star_string = "*****";
        if (username.length <= 10) {
          let star_count = 10 - username.length;
          star_string = "*";
          for ($i = 0; $i > star_count; $i++) {
            star_string += star_string;
          }
        }
      }
      let shortenedUsername = username.substring(0, visibile_char) + star_string;
      formattedNumber = shortenedUsername + '@' + domain;
      phone_c = "<?= $this->lang->line('e-email') ?> " + formattedNumber;
    } else {
      formattedNumber = phone.substring(0, 2) + '******' + phone.substring(8);
      phone_c = "<?= $this->lang->line('n-number') ?> +91" + " " + formattedNumber;
      click_via = 1;
    }
    if (click_via == 1) {
                  queueTrackingDataWithDelay('trackEvent', ['Login', 'Select', 'WithMobileNumber'],10);
                } else {
                  queueTrackingDataWithDelay('trackEvent', ['Login', 'Select', 'WithEmailId'],20);
                }
    // var phone_c = "+91" + " " + formattedNumber;
    // console.log(phone,countryCode,resend,otp,phone_c)
    $('#mob_chng h6').html(phone_c + "<span class='ms-2' onclick='history_go()' style='color:#4845f6'><i class='fas fa-pencil-alt'></i></span>");


    if (phone == "") {
      $('.num_err').text('Please enter mobile number').removeClass('d-none');
      return false;
    }
    mobile_no_len = 10
    var c_code = $('.iti__selected-dial-code').text();
    if (c_code != "+91") {
      mobile_no_len = 4
    }

    if (phone.length < mobile_no_len) {
      $('.num_err').text('Please enter valid mobile number').removeClass('d-none')
      return false;
    } else {

      $.ajax({
        type: 'POST',
        url: '<?= base_url('/web/Login_register/send_otp'); ?>',
        dataType: "json",
        data: {
          phone: phone,
          countryCode: countryCode,
          otp: otp,
          user_detail: 0,
          email_id: email_id,
          resend: resend
        },

        success: async function(data) {
          if (data.status == 1) {
            queueTrackingData('trackEvent', ['Login', 'SendOTP',phone]);
            // toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
            toastr.success('<?= $this->lang->line("otp_sent") ?>', '<?= $this->lang->line("success") ?>');
            $('.otp_verify').show();
            $("#some_div").show();
            $('#verify').show();
            $('#otp_send').prop('disabled', false);
            $('.login_div').hide();
            startCountdown();
            var $input = $('#otp1');
            $input.focus();
            //$input[0].setSelectionRange($input.val().length, $input.val().length);
            try {
              await deleteAllMasterContentKeys();
              await removeCacheData('contentDetail', 'all');

            } catch (err) {
              console.log(err);
            }
            // pullCache(id, data);
          } else {
            $("#overlayonajaxhit").fadeOut();
            toastr.error(data.message, '<?= $this->lang->line("error") ?>');
            // toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
            //toastr.error(data.message, 'Error Message');
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

  $('#resend_div a').click(function() {
    stopCountdown()
    $('#resend_div').hide();
    $('#verify').removeClass('pgactiveg');
    timeLeft = 60;
    $("#overlayonajaxhit").fadeIn();
    var phone = $('#mobile_no').val();
    var email_id = $('#email_id').val();

    //var countryCode = $('.selected-flag .selected-dial-code').html();
    var countryCode = $('.iti__selected-dial-code').text();
    var resend = 1;
    var otp = "";
    if (phone == "" && email_id == "") {
      $('.num_err').text('Please enter mobile number').removeClass('d-none')

      return false;
    }
    let mobile_no_len = 10;
    var c_code = $('.iti__selected-dial-code').text();
    if (c_code != "+91") {
      mobile_no_len = 4;
    }
    if (phone.length < mobile_no_len && email_id == '') {
      $('.num_err').text('Please enter valid mobile number').removeClass('d-none')
      return false;
    } else {
      if (phone == '' && email_id != '') {
        phone = email_id;
      }
      $.ajax({
        type: 'POST',
        url: '<?= base_url('/web/Login_register/send_otp'); ?>',
        dataType: "json",
        data: {
          phone: phone,
          countryCode: countryCode,
          otp: otp,
          resend: resend
        },

        success: function(data) {

          if (data.status == 1) {
            queueTrackingData('trackEvent', ['Login', 'ResendOTP',phone]);

            $("#overlayonajaxhit").fadeOut();

            // toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
            toastr.success('<?= $this->lang->line("resent_otp") ?>', '<?= $this->lang->line("success") ?>');

            // Swal.fire('OTP Sent', '', 'success');
            //  $('#otp1, #otp2, #otp3, #otp4, #otp5, #otp6').prop('disabled', false);
            $('.login_div').hide();
            $("#resend_div").hide();
            $('#verify').removeAttr("disabled");
            $('.otp_verify').show();
            $("#some_div").show();
            startCountdown();
            var $input = $('#otp1');
            $input.focus();
            //$input[0].setSelectionRange($input.val().length, $input.val().length);

          } else {
            $("#overlayonajaxhit").fadeOut();
            // toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
            toastr.error(data.message, '<?= $this->lang->line("error") ?>');
          }
        }
      }).done(function() {
        setTimeout(function() {
          $("#overlayonajaxhit").fadeOut(300);
        }, 500);
      });
    }
  })
  $('#otp_verify_form').submit(function(e) {
    e.preventDefault();
    var phone = $('#mobile_no').val();
    var email_id = $('#email_id').val();
    if (phone == "") {
      phone = email_id;
    }
    $("#overlayonajaxhit").fadeIn();
    var countryCode = $('.iti__selected-dial-code').text();
    var resend = 0;
    var otp1 = $('#otp1').val();
    var otp2 = $('#otp2').val();
    var otp3 = $('#otp3').val();
    var otp4 = $('#otp4').val();
    var otp5 = $('#otp5').val();
    var otp6 = $('#otp6').val();


    var otp = otp1.toString() + otp2.toString() + otp3.toString() + otp4.toString() + otp5.toString() + otp6.toString();

    if (otp == "" || otp == null) {

      // $('.otp_err').text('Please enter valid OTP').removeClass('d-none');
      toastr.success('<?= $this->lang->line("enter_valid_otp") ?>', '<?= $this->lang->line("error") ?>');

      return false;
    }
    var otpLength = otp.length;
    // alert(otplength);
    if (otpLength < 6) {
      $("#overlayonajaxhit").fadeOut();
      // $('.otp_err').text('Please enter valid OTP').removeClass('d-none');
      toastr.error('<?= $this->lang->line("enter_six_digit_valid") ?>', '<?= $this->lang->line("error") ?>');
      return false;
    } else {
      let lang_id = "<?= $this->input->get('lang') ?? 1; ?>";
      $.ajax({
        type: 'POST',
        url: '<?= base_url('/web/Login_register/verify_otp'); ?>',
        dataType: "json",
        data: {
          phone: phone,
          countryCode: countryCode,
          otp: otp,
          resend: resend,
          lang_id: lang_id
        },
        success: async function(data) {
            var env = "<?= ENVIRONMENT ?>";
            if (data.status == true) {
                localStorage.setItem('pb_session', (data.token));
                let cache_key = "lang_set";
                //let get_lang_val = await set_cache_data("<//?= $this->session->userdata("lang_id") ?? "english"; ?>", cache_key);
                localStorage.setItem(cache_key,"<?= ($this->session->userdata("lang_id") && $this->session->userdata("lang_id") != "")?ucwords($this->session->userdata("lang_id")) : "English"; ?>");
                if (data.device_limit_exceed && data.device_limit_exceed == true) {} else {
                  toastr.success('<?= $this->lang->line("OTP-Verification") ?>', '<?= $this->lang->line("success") ?>');
                }
                queueTrackingDataWithDelay('trackEvent', ['Login', 'VerifiedOTP',phone],30);
                window.location.href = data.url.replace(/&amp;/g, '&');
                //sendProfileSessionDataToServer(env,data.url);
            } else {
              toastr.error(data.message, 'Error', {
                timeOut: 5000
            });
          }
        }
      }).done(function() {
        setTimeout(function() {
          $("#overlayonajaxhit").fadeOut(300);
        }, 500);
      });
    }

  });

  async function set_cache_data(data, key, cacheTime = (30 * 24 * 60 * 60 * 1000)) { // set data for 30 day
    //alert(data); alert(key);
    let return_data = false;
    try {
      const cache = await caches.open('appCache');
      var cacheExpirationTime = Date.now() + cacheTime;
      cachedData = {
        data: data,
        cacheExpiration: cacheExpirationTime
      };
      await cache.put(key, new Response(JSON.stringify(cachedData)));
      return_data = true;
    } catch (error) {
      console.log('local cache error:', error);
    }
    return return_data;
  }



  $(document).ready(function() {

    $('.otp-input').on('input', function() {
      var otp1 = $('#otp1').val();
      var otp2 = $('#otp2').val();
      var otp3 = $('#otp3').val();
      var otp4 = $('#otp4').val();
      var otp5 = $('#otp5').val();
      var otp6 = $('#otp6').val();
      if ((otp1.length == 0) || (otp2.length == 0) || (otp3.length == 0) || (otp4.length == 0) || (otp5.length == 0) || (otp6.length == 0)) {
        $('#verify').prop('disabled', true);
        $('#verify').removeClass('pgactiveg');
      } else {
        $('#verify').prop('disabled', false);
        $('#verify').addClass('pgactiveg');
      }
    });

    $('#mobile_no').on('input', function() {
      var inputValue = $(this).val();
      let mobile_no_len = 10;
      var c_code = $('.iti__selected-dial-code').text();
      if (c_code != "+91") {
        mobile_no_len = 4;
      }
      //alert(mobile_no_len);
      if (inputValue.length >= mobile_no_len) {
        $('.num_err').text("")
        $('.mobile_cross').html('<i class="fas fa-times"></i>');
        $('#otp_send').addClass('pgactiveg');
        $('#otp_send').prop('disabled', false);
      } else if (inputValue.length == 1) {
        $('.mobile_cross').html('<i class="fas fa-times"></i>');
        $('#otp_send').prop('disabled', true);
      } else if (inputValue.length == 0) {
        $('#otp_send').removeClass('pgactiveg');
        $('.mobile_cross').html('');
        $('#otp_send').prop('disabled', true);
      } else {
        $('#otp_send').removeClass('pgactiveg');
        $('#otp_send').prop('disabled', true);
      }
      // Remove any non-numeric characters
      inputValue = inputValue.replace(/[^0-9]/g, '');

      // Update the input value
      $(this).val(inputValue);
    });

    $('#email_id').on('keypress input', function(event) {
      var email = $(this).val();
      if (email.length > 70) {
        event.preventDefault();
      }

      var emailRegex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;

      // Split email to check if it contains exactly one '@'
      var atSplit = email.split('@');
      if (atSplit.length === 2 && emailRegex.test(email)) {
        $('#otp_send').removeClass('pgactiveg');
        $('.email_cross').html('<i class="fas fa-times"></i>');
        $('#otp_send').prop('disabled', false);
      } else {

        // toastr.error("Email format is incorrect", 'Error', {
        //   timeOut: 1000
        // });
        $('.email_cross').html('<i class="fas fa-times"></i>');
        $('#otp_send').addClass('pgactiveg');
        $('#otp_send').prop('disabled', true);
      }

      // if (!emailRegex.test(email)) {
      //   $('#otp_send').removeClass('pgactiveg');
      //   $('.email_cross').html('<i class="fas fa-times"></i>');
      //   $('#otp_send').prop('disabled', false);
      //   //console.log("Invalid email format");
      //   // You can add more actions here for invalid email format
      // } else {
      //   $('.email_cross').html('<i class="fas fa-times"></i>');
      //   $('#otp_send').addClass('pgactiveg');
      //   $('#otp_send').prop('disabled', false);

      //   //console.log("Valid email format");
      //   // You can add more actions here for valid email format
      // }
    });

    $(document).on("click", ".email_cross i", function() {
      $('#email_id').val('');
      $('.email_cross').html('');
      $('#otp_send').prop('disabled', true);
      $('#otp_send').removeClass('pgactiveg');

    });

    $(document).on("click", ".mobile_cross i", function() {
      $('#mobile_no').val('');
      $('.mobile_cross').html('');
      $('#otp_send').prop('disabled', true);
      $('#otp_send').removeClass('pgactiveg');

    });


    $('#mob').on('input', function() {
      var inputValue = $(this).val();
      let mobile_no_len = 10;
      var c_code = $('.iti__selected-dial-code').text();
      if (c_code != "+91") {
        mobile_no_len = 4;
      }
      if (inputValue.length >= mobile_no_len) {
        $('.num_err').text("")
      }
      // Remove any non-numeric characters
      inputValue = inputValue.replace(/[^0-9]/g, '');

      // Update the input value
      $(this).val(inputValue);
    });
    $('#mob_chng').click(function(e) {
      e.preventDefault();
      if ($(".login_div").is(':visible')) {
        // var newUrl = '<?//= base_url(); ?>';
        // window.location.href = newUrl;
        history.go(-1);
      } else {
        $('.login_div').show();
      }
      $('.otp_verify').hide();

    })


    $('#save_details_form').submit(function(e) {
      e.preventDefault();
      var username = $('input[name="name"]').val();
      var mobile = $('input[name="mob"]').val();
      var email = $('input[name="email"]').val();
      if (username == "") {
        // toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
        toastr.error("Please enter your name", "");
        // $('#name_err').show();
        return false;

      }
      // if(email == ""){
      //   $('#email_err').show();
      //   return false;
      // }
      else {

        $.ajax({
          type: 'POST',
          url: '<?= base_url('/web/Login_register/save_details'); ?>',
          dataType: "json",
          data: {
            username: username,
            email: email,

          },

          success: function(data) {

            if (data.status == '1') {
              // toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
              toastr.success('Profile Creation Completed<br> Welcome to Prasar Bharti', "Success");
              var newUrl = '<?= base_url(); ?>';
              window.location.href = newUrl;

            } else {
              // toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
              toastr.error('Cannot Update Details', "error");
              var newUrl = '<?= base_url(); ?>';
              window.location.href = newUrl;

            }




          }
        });
      }

    })

  });
</script>
<script>
  $(document).ready(function() {
    $('#otp6').on('input', function() {

      $(this).val(function(_, val) {
        return val.charAt(0); // Keeps only the first digit
      });
    });

    $('#otp6').on('input', function() {
      var otp6Value = $(this).val();
      $('#verify').prop('disabled', otp6Value.length !== 1);
      $('#verify').removeClass('pgactiveg');
      // Check if the last OTP field is filled
      if (otp6Value.length === 1) {
        $('#verify').addClass('pgactiveg');
        // Trigger the click event for the "Verify OTP" button
        //$('#verify').click();
      }
    });
    $('input[name="name"]').on('input', function() {
      var inputValue = $(this).val();
      var isValid = /^[A-Za-z\s]+$/.test(inputValue);

      if (!isValid) {
        // alert("Please enter only alphabets and white space");
        $(this).val(''); // Clear the input field
        // You can also take other actions like preventing form submission.
      }
    });


  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var otpInputs = document.querySelectorAll(".otp-input");
    var emailOtpInputs = document.querySelectorAll(".email-otp-input");

    function setupOtpInputListeners(inputs) {
      inputs.forEach(function(input, index) {
        input.addEventListener("paste", function(ev) {
          var clip = ev.clipboardData.getData('text').trim();
          $('#verify').addClass('pgactiveg');
          $('#verify').prop('disabled', false);

          if (!/^\d{6}$/.test(clip)) {
            ev.preventDefault();
            return;
          }

          var characters = clip.split("");
          inputs.forEach(function(otpInput, i) {
            otpInput.value = characters[i] || "";
          });

          enableNextBox(inputs[0], 0);
          inputs[5].removeAttribute("disabled");
          inputs[5].focus();
          updateOTPValue(inputs);
        });


        input.addEventListener("input", function() {
          var currentIndex = Array.from(inputs).indexOf(this);
          var inputValue = this.value.trim();

          if (!/^\d$/.test(inputValue)) {
            //this.value = "";
            this.value = inputValue;
            return;
          }

          if (inputValue && currentIndex < 5) {
            inputs[currentIndex + 1].removeAttribute("disabled");
            inputs[currentIndex + 1].focus();
          }

          if (currentIndex === 4 && inputValue) {
            inputs[5].removeAttribute("disabled");
            inputs[5].focus();
          }
          updateOTPValue(inputs);
        });

        input.addEventListener("keydown", function(ev) {
          var currentIndex = Array.from(inputs).indexOf(this);

          if (!this.value && ev.key === "Backspace" && currentIndex > 0) {
            inputs[currentIndex - 1].focus();
          }
        });
      });
    }

    function enableNextBox(input, currentIndex) {
      var inputValue = input.value;

      if (inputValue === "") {
        return;
      }

      var nextIndex = currentIndex + 1;
      var nextBox = otpInputs[nextIndex] || emailOtpInputs[nextIndex];

      if (nextBox) {
        nextBox.removeAttribute("disabled");
      }
    }

    function updateOTPValue(inputs) {
      var otpValue = "";

      inputs.forEach(function(input) {
        otpValue += input.value;
      });

      // if (inputs === otpInputs) {
      //   document.getElementById("verificationCode").value = otpValue;
      // } else if (inputs === emailOtpInputs) {
      //   document.getElementById("emailverificationCode").value = otpValue;
      // }
    }

    setupOtpInputListeners(otpInputs);
    // setupOtpInputListeners(emailOtpInputs);

    otpInputs[0].focus(); // Set focus on the first OTP input field
    //  emailOtpInputs[0].focus(); // Set focus on the first email OTP input field

    otpInputs[5].addEventListener("input", function() {
      updateOTPValue(otpInputs);
    });

    // emailOtpInputs[5].addEventListener("input", function () {
    //   updateOTPValue(emailOtpInputs);
    // });
  });

  // //document.addEventListener("DOMContentLoaded", function() {
  //     var emailInput = document.getElementById('email_id');
  //     var emailCross = document.querySelector('.email_cross');
  //     var maxLength = parseInt(emailInput.getAttribute('maxlength'));

  //     // emailCross.addEventListener('click', function() {
  //     //     emailInput.value = '';
  //     //     emailInput.focus();
  //     //     this.style.display = 'none'; // Hide the cross icon when input is cleared
  //     // });

  //     emailInput.addEventListener('input', function(e) {
  //         // Ensure the input length doesn't exceed maxlength
  //       consol
  //         if (this.value.length > 70) {
  //           e.preventDefault();
  //             this.value = this.value.slice(0, maxLength);
  //         }
  //         // Show/hide the cross icon based on input value
  //         // if (this.value.length > 0) {
  //         //     emailCross.style.display = 'block';
  //         // } else {
  //         //     emailCross.style.display = 'none';
  //         // }
  //     });
  // //});
  $(window).on('load', function() {
    //$('.otp_verify').show();   // for testing purpose.
    var mobile = $('#mobile_no').val();
    let mobile_no_len = 10;
    var c_code = $('.iti__selected-dial-code').text();
    if (c_code != "+91") {
      mobile_no_len = 4;
    }
    if (mobile.length >= mobile_no_len) {
      $('.mobile_cross').html('<i class="fas fa-times"></i>');
      $('#otp_send').addClass('pgactiveg');
      $('#otp_send').prop('disabled', false);
    }

  });
</script>

<script>
  $(document).ready(function() {
    // Initialize intlTelInput
    var input = $(".mobile_input");
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
    input.on('countrychange', function() {
      $(".mobile_input").val('');
      var c_code = $('.iti__selected-dial-code').text();
          if (c_code != "+91") {
        
            toastr.info('<?= $this->lang->line('Login-country_change') ?>');

          $('.login_mobile').hide();
          $('.email_login').show();
          $('.loginmob_txt').show();
          $('.email_txt').hide();
          var email_text = "<?= $this->lang->line('Login-enter-no-email') ?>";
          $('.otps-string').text(email_text);
          $('.iti__selected-dial-code').text('+91');
         
    $(".mobile_input").intlTelInput("destroy");
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
      
      }
      $('#otp_send').prop('disabled', true);
    });

    // // Capture input field change event
    // input.on('input', function() {

    // });
  });

  // $(".mobile_input").intlTelInput({
  //               autoHideDialCode: true,
  //               autoPlaceholder: "ON",
  //               dropdownContainer: document.body,
  //               formatOnDisplay: true,
  //               initialCountry: "in",
  //               placeholderNumberType: "MOBILE",
  //               separateDialCode: true,
  //               onlyCountries: ["in"] // Restrict to only India
  //           });

  function urls_call(link, name = '') {
    const loader = document.getElementById('overlayonajaxhit');
    if (loader) {
      loader.style.display = 'block';
    }
    setTimeout(() => {
      location.href = link;
    }, 200);
    if (name) {
      matomo_hit(1, name);
    }
  }
</script>
<script>
  $(document).ready(function() {
    $('#mobile_no').focus();
  });
  
  
  $(document).ready(function() {
    $('.help_ma').click(function() {
      // matomo('Login', 'Select', 'Help');
      queueTrackingData('trackEvent', ["Login", "Select",'Help']);
    })
  });
  function matomo(user, type, titles, geners = '') {
    $.ajax({
      type: 'POST',
      url: '<?= base_url('/web/Watchlist/add_to_watchlist') ?>',
      dataType: "json",
      data: {
        user: user,
        types: type, // Typo here, it should be type instead of types
        geners: geners,
        title: titles
      },
      success: function(data) {
        if (data.status == 1) {

        }
      }
    });
  }

  document.getElementById('mobile_no').addEventListener('input', function() {
    // Restrict the input length to 10 characters
    //const maxLength = 10;
    const input = this.value;
    var c_code = $('.iti__selected-dial-code').text();
    let maxLength;
     if (c_code == "+91") {
        maxLength = 10;
          //  const input = this.value;
   
    }else{
       maxLength = 20;
         //  const input = this.value;

    }


    // Remove any non-numeric characters
    const numericInput = input.replace(/\D/g, '');

    if (numericInput.length > maxLength) {
        this.value = numericInput.slice(0, maxLength);
    } else {
        this.value = numericInput;
    }
});
    $(window).on('load', function() {
     // queueTrackingData('trackEvent', ["Login", "Login"])

  });

</script>
<script>
    const inputField = document.getElementById('mobile_no');
    inputField.addEventListener('keydown', function(event) {
        // Check if the key pressed is 'e' or '-'
        if (event.key === 'e' || event.key === '-') {
            // Prevent the default action
            event.preventDefault();
        }
    });

    $(document).ready(function(){
      setTimeout(async () => {
        fetchMasterContentAndUpdateCache(null,null,"1");
      }, 100);
    });

 

</script>




