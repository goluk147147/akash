<style>
  .sub_plan_banner {
    background-image: url(<?= base_url('assets/website_assets/images/plan-banner.png'); ?>);
    background-size: cover;
    background-repeat: no-repeat;
    height: 750px;
    width: 100%;
    position: relative;
    background-position: center;
    display: flex;
    align-items: center;
  }

  .sub_plan_banner::before {
    position: absolute;
    content: "";
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #000;
    opacity: 0.8;
  }

  .smalllines {
    width: 100px;
    height: 1px;
    border: 1px solid #C82333;
  }

  h1.text-accent {
    font-size: 40px;
    font-weight: 600;
    color: #DFDFDF;
    font-family: system-ui;
    margin: 90px 0 40px 0;
  }

  .plan-img-curnt {
    position: absolute;
    top: -13px;
  }


  .fs-500 {
    font-size: 1.3125rem;
    margin: 0;
  }

  .mb {
    margin-bottom: 0.5em;
  }

  /* .plans {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin: 2em 0;
} */

  .plan {
    /* width: 16.5rem; */
    padding: 2em;
    border-radius: 1em;
    margin: 0 0.5em 1em;
  }

  .plan--light {

    background: #2D3C4B;
  }

  .plan--light:hover {

    background: #202B36;
  }

  .plan--light .plan-price {
    color: #DFDFDF;
  }

  .plan-lines {
    border-top: 1px solid #ffffff38;
    width: 100%;
  }

  .plan--light .btn {
    color: #fff;
    background: #4e4e4e;
  }

  .plan--accent {
    color: #fff;
    background: linear-gradient(-45deg, #00a1ab, #3741a0);
  }

  .plan--accent .btn {
    color: #4e4e4e;
    background: #fff;
  }

  .plan-titles {
    text-transform: uppercase;
    font-size: 20px;
    font-family: system-ui;
    color: #DFDFDF;
  }

  .plan-prices {
    margin: 0 !important;
    font-size: 26px;
    line-height: 1;
    font-weight: 700;
    font-family: system-ui;
    color: #DFDFDF;
  }

  /* .plan-price span {
    display: block;
    font-size: 1.5625rem;
    font-weight: 300;
} */

  .plan-descriptions {
    margin: 0 !important;
    line-height: 1.5;
    font-size: 16px;
    color: #DFDFDF;
    font-family: system-ui;
  }

  .plan-btn-upgrd .btn {
    display: inline-block;
    padding: 0.5em 4em;
    border-radius: 0.25em;
    text-transform: uppercase;
    text-decoration: none;
    font-weight: 700;
    color: #fff;
    background: #C82333;
    transition: 0.3s;
    font-family: system-ui;
  }

  .btn:hover {
    background: #e8152a;
  }

  .btn-mb {
    margin-bottom: 3em;
  }

  .btn--light {
    color: #4e4e4e;
    background: #fff;
  }

  .btn--dark {
    color: #fff;
    background: #4e4e4e;
  }

  .plan-p {
    font-size: 16px;
    font-family: system-ui;
    color: #DFDFDF;
  }

  .plan-small {
    font-size: 70% !important;
    color: #DFDFDF;
  }

  .plan_span i.fa-mobile {
    color: #DFDFDF !important;
  }

  .plan-span-text {
    font-size: 14px;
    color: #DFDFDF;
    font-weight: 600;
    font-family: system-ui;
  }

  @media(min-width:1200px) and (max-width:1400px) {
    .sub_plan_banner {
      height: auto !important;

    }

    .btn-mb {
      margin-bottom: 0em !important;
      margin-top: 1em !important;
    }

    h1.text-accent {
      font-size: 30px;

      margin: 40px 0 15px 0;
    }
  }

  @media(min-width:1025px) and (max-width:1199px) {

    .sub_plan_banner {
      height: auto !important;

    }

    .plan {
      /* width: 16.5rem; */
      padding: 1em;
      border-radius: 1em;
      margin: 10px 0 !important;
    }

    h1.text-accent {
      font-size: 30px;

      margin: 40px 0 15px 0;
    }

    .btn-mb {
      margin-bottom: 0em !important;
      margin-top: 1em !important;
    }

    .plan-img-curnt {
      position: absolute;
      top: -4px;
      left: 6px;

    }

    .plan-p {
      font-size: 14px;

    }

    .plan-small {
      font-size: 65% !important;

    }

    .plan-span-text {
      font-size: 12px;
    }
  }

  @media(min-width:992px) and (max-width:1024px) {
    .sub_plan_banner {
      height: auto !important;

    }

    .plan {
      /* width: 16.5rem; */
      padding: 1em;
      border-radius: 1em;
      margin: 10px 0 !important;
    }

    h1.text-accent {
      font-size: 30px;

      margin: 40px 0 15px 0;
    }

    .btn-mb {
      margin-bottom: 0em !important;
      margin-top: 1em !important;
    }

    .plan-img-curnt {
      position: absolute;
      top: -4px;
      left: 6px;

    }

    .plan-p {
      font-size: 14px;

    }

    .plan-small {
      font-size: 65% !important;

    }

    .plan-span-text {
      font-size: 12px;
    }


  }


  @media(min-width:768px) and (max-width:991px) {
    .sub_plan_banner {
      height: auto !important;

    }

    .plan {
      /* width: 16.5rem; */
      padding: 2em;
      border-radius: 1em;
      margin: 10px 0 !important;
    }

    h1.text-accent {
      font-size: 30px;

      margin: 40px 0 40px 0;
    }

    .btn-mb {
      margin-bottom: 0em !important;
    }

    .plan-img-curnt {
      position: absolute;
      top: -4px;
      left: 6px;

    }

    .plan-p {
      font-size: 14px;

    }

    .plan-small {
      font-size: 65% !important;

    }

    .plan-span-text {
      font-size: 12px;
    }
  }

  @media(min-width:481px) and (max-width:767px) {
    .sub_plan_banner {
      height: auto !important;

    }

    .plan {
      /* width: 16.5rem; */
      padding: 2em;
      border-radius: 1em;
      margin: 0 43px 40px;
    }

    h1.text-accent {
      font-size: 30px;

      margin: 40px 0 40px 0;
    }

    .btn-mb {
      margin-bottom: 0em !important;
    }

    .plan-img-curnt {
      position: absolute;
      top: -13px;
      margin-left: 34px;
    }

    .plan-p {
      font-size: 14px;

    }

    .plan-small {
      font-size: 65% !important;

    }

    .plan-span-text {
      font-size: 12px;
    }

  }

  @media(min-width:320px) and (max-width:480px) {
    .sub_plan_banner {
      height: auto !important;

    }

    .plan {
      /* width: 16.5rem; */
      padding: 1em;
      border-radius: 1em;
      margin-bottom: 40px;
    }

    h1.text-accent {
      font-size: 30px;

      margin: 40px 0 40px 0;
    }

    .btn-mb {
      margin-bottom: 0em !important;
    }

    .plan-p {
      font-size: 14px;

    }

    .plan-small {
      font-size: 65% !important;

    }

    .plan-span-text {
      font-size: 12px;
    }
  }









  .plan-contact {
    margin-top: 35px;
  }

  .contact_img img {
    width: 100%;
  }

  /* .contact-div{
  padding: 10px;
} */

  ul.contact_list {
    padding: 0 !important;
  }

  .contact_list li {
    list-style: none;
    margin-bottom: 20px;
    display: flex;
  }

  .contact_txt {
    font-size: 16px;
    font-family: system-ui;
  }

  .contact_ind p {
    font-size: 16px;
    font-family: system-ui;
  }
</style>


<section class="sub_plan_banner pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="text-center">
          <h1 class="text-accent"><?= $this->lang->line('Contact-Us') ?></h1>
        </div>
        <div class="">
          <!-- <div class="plan-img-curnt">
            <img src="current.png">
          </div> -->
          <div class="plan plan--light plan-position">

            <div class="text-center">
              <h4 class="plan-titles mb-0"><?= $this->lang->line('prasar_bharti') ?></h4>
              <div class="smalllines mx-auto mb-3 mt-1"></div>
              <?php if (APP_ID == 53) { ?>
                <div class="contact_ind">
                  <p><?= $this->lang->line('ind_broadcast') ?></p>
                </div>
              <?php  } ?>

            </div>



            <div class="plan-contact">

              <div class="row mb-2">
                <div class="col-lg-7 col-md-6 ">
                  <div class="px-2">
                    <div class="contact_ind mb-3">
                      <p><?= Client_Name ?></p>
                    </div>
                    <div class="contact-div">
                      <ul class="contact_list">
                        <?php if (Client_Address != "" || Client_Address != null) { ?>
                          <li><span class="mr-2 mt-1"><i class="fas fa-map-marker-alt mr-2"></i><?= Client_Address ?></span></li>
                        <?php } ?>
                        <?php if (MOBILE != "" || MOBILE != null) { ?>
                          <li><span class="mr-2 mt-1"><i class="fas fa-phone-alt mr-2"></i></span><span class="contact_txt"><?= MOBILE ?></span></li>
                        <?php } ?>
                        <?php if (EMAIL != "" || EMAIL != null) { ?>
                          <li><span class="mr-2 mt-1"><i class="fas fa-inbox mr-2"></i></span><span class="contact_txt"><?= EMAIL ?></span></li>
                        <?php } ?>
                        <?php if (FACEBOOK != "" || FACEBOOK != null) { ?>
                          <a href="<?= FACEBOOK ?>">
                            <li><span class="mr-2 mt-1"><i class="fab fa-facebook-square mr-2"></i></span><span class="contact_txt">@<?= Client_Name ?></span></li>
                          </a>
                        <?php } ?>
                        <?php if (TIWTTER != "" || TIWTTER != null) { ?>
                          <a href="<?= TIWTTER ?>">
                            <li><span class="mr-2 mt-1"><i class="fab fa-twitter mr-2"></i></span><span class="contact_txt">@<?= Client_Name ?></span></li>
                          </a>
                        <?php } ?>
                        <?php if (YOUTUBE != "" || YOUTUBE != null) { ?>
                          <a href="<?= YOUTUBE ?>">
                            <li><span class="mr-2 mt-1"><i class="fab fa-youtube mr-2"></i></span><span class="contact_txt">@<?= Client_Name ?></span></li>
                          </a>
                        <?php } ?>
                        <?php if (INSTAGRAM != "" || INSTAGRAM != null) { ?>
                          <a href="<?= INSTAGRAM ?>">
                            <li><span class="mr-2 mt-1"><i class="fab fa-instagram mr-2"></i></span><span class="contact_txt">@<?= Client_Name ?></span></li>
                          </a>
                        <?php } ?>



                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 col-md-6 ">
                  <div class="contact_img">
                    <img src="<?= base_url('assets/images/OTT GIF.gif'); ?>" alt="giphy">
                  </div>
                </div>
              </div>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>