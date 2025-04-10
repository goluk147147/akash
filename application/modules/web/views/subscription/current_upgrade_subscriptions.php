<style>
  .u-plan {
    background: rgb(234, 192, 27) !important;
  }

  .upgrad_maindiv {
    border: none
  }

  .modal.fade .modal-dialog {
    transition: -webkit-transform .3s ease-out;
    transition: transform .3s ease-out;
    transition: transform .3s ease-out, -webkit-transform .3s ease-out;
    -webkit-transform: translate(0, -50px);
    transform: translate(0, -50px);
  }

  .channelRadioUpgradMainDiv .child-card {
    width: 45% !important;
    border: 1px solid rgba(137, 137, 137, 1);
    height: 150px !important;
    border-radius: 20px;

  }

  .child-card .text_colr {
    color: var(--pbc);
    font-size: 12px
  }


  .imgchannel {
    text-align: center;
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .imgchannel svg {
    width: 64px;
    height: 64px;

  }

  .bg-black {
    background: #000;
  }


  .buyNow {
    position: fixed;
    bottom: -2px;
    width: 100%;
    padding: 5px 10px;
    z-index: 999999;
  }

  @media only screen and (min-width: 320px) and (max-width: 767px) {
    .sub_headingmax {
      width: 86%;
      font-size: 12px;
    }

    .child-card .text_colr {
      color: var(--pbc);
      font-size: 10px;
    }
  }

  .child-card .text_colr {
    color: var(--pbc) !important;
    font-size: 10px;
  }
  .bg-black{
    background:rgba(0,0,55,1) !important;

  }
</style>
<?php
$activeChannels = [];
foreach ($activePlan['data']['channels'] as $val) {
  $activeChannels[] = $val['id'];
}
foreach ($activePlan['data']['radio'] as $val) {
  $activeChannels[] = $val['id'];
}
$max_channels = 0;
$subs_channel = count($activePlan['data']['channels']) + count($activePlan['data']['radio']);
?>
<section id="main-content">

  <section class="wrapper site-min-height">
    <div class="row">
      <div class="col-lg-12">


        <section class="">

          <div class="term-image pt-5" style="margin-bottom: 43vh">



            <div class="positionab_ ">


              <div class="container-fluid p-0">
                <div class="row">
                  <div class="col-md-12 p-0">
                    <div class="page-title d-flex align-items-center ps-3">
                      <div class="back-btn ps-3"><a href="<?= base_url() ?>"><i class="fa fa-chevron-left text-white" aria-hidden="true"></i></a></div>

                    </div>
                  </div>
                </div>
                <div class="row m-0">
                  <div class="col-md-12 m-auto">
                    <div class="term-section">

                      <div class="row">
                        <div class="col-md-5 col-sm-12 col-md-12">

                          <div class="plan-dashobard p-lg-1 mb-4">
                            <small class="mb-1"><?= $this->lang->line('current_plan') ?></small>
                            <div class="d-flex justify-content-between">
                              <h4 class="mb-0 " style="color:rgba(210, 210, 20, 1)"><?= $activePlan['data']['plan']['title']['en'] ?></h4>
                              <div class="d-flex align-items-center">
                                <h4 class="mb-0 text-white">₹<?= $activePlan['data']['detail']['plan_amount'] ?></h4>
                                <div style="margin-top:2px;"><?= ' / ' . $activePlan['data']['detail']['pricing_title'] ?></div>

                              </div>
                            </div>

                            <div class="plan-card">
                              <div class="row ">
                                <?php if (isset($activePlan['data']['plan']['features'][0]) && !empty($activePlan['data']['plan']['features'][0])) { ?>
                                  <?php foreach ($activePlan['data']['plan']['features'] as $fkey => $fvalue) { ?>
                                    <?php
                                    $pattern = '/\{\{(\d+)\}\}/';
                                    if (preg_match($pattern, $fvalue['value'], $matches)) {
                                      $value = $matches[1];
                                      $max_channels = $value;
                                      // pre($max_channels);
                                    } else {
                                      $value = $fvalue['value'];
                                    }
                                    ?>
                                    <div class="d-flex align-items-center col-lg-12">
                                      <span class="me-2 checkicon"><i class="fas fa-check"></i></span>
                                      <span><?= $fvalue['title'] . ' : ' . $value ?></span>
                                    </div>
                                  <?php } ?>
                                <?php } ?>

                              </div>
                              <div class="clearfixBorder my-2"></div>
                              <div>
                                Duration: <span class="dallColor"><?= date('jS F, Y', $activePlan['data']['detail']['purchase_date']) . ' - ' . date('jS F, Y', $activePlan['data']['detail']['expiry_date']) ?></span>
                              </div>
                            </div>
                          </div>



                        </div>
                        <!-- <?php pre($max_channels); ?> -->
                        <? php // pre(count($max_channels));die; 
                        ?>
                        <div class="col-md-7 col-sm-12 p-3 d-none">
                          <div class="upgrad_maindiv p-lg-4 p-md-2">
                            <?php if (($max_channels > $subs_channel)) { ?>

                              <div class="d-flex justify-content-between">
                                <h4 class="text-white mb-0">My Channels</h4>
                                <span class="cursor-pointer text-pri-color" data-bs-target="#selectChannelRadio" data-bs-toggle="modal">+ Add More</span>
                              </div>
                            <?php } ?>

                            <div class="channelRadioUpgradMainDiv">
                              <div class="d-flex align-items-center justify-content-between">

                                <div class="child-card">
                                  <div class="imgchannel">
                                    <svg width="90" height="100" viewBox="0 0 115 119" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M67.5065 30.8931H91.1853C105.279 30.8931 114.374 40.0142 114.374 54.0823C114.374 68.1504 114.374 81.9609 114.374 95.9002C114.374 108.963 105.743 118.497 92.7054 118.703C69.104 119.064 45.4854 119.064 21.8496 118.703C8.81211 118.522 0.103289 109.015 0.0517578 96.029C0.0517578 81.9437 0.0517578 67.8412 0.0517578 53.7216C0.0517578 40.0142 9.30167 30.9189 23.2409 30.8674H45.4253L46.2498 29.6048C39.6022 23.1892 32.8773 16.722 26.3071 10.3321C23.7305 7.91008 19.5822 5.17892 23.7305 1.44288C27.8788 -2.29315 30.2492 1.8036 32.7485 4.30288C40.7874 12.3676 48.7748 20.5096 57.1487 28.9865C59.5191 26.7191 61.5804 24.8382 63.5644 22.88C70.2892 16.1809 77.0399 9.45601 83.7132 2.70538C86.0837 0.309163 88.686 -1.26252 91.4429 1.64901C94.1999 4.56054 92.0871 6.80217 89.9485 8.94073L67.5065 30.8931ZM57.0456 109.994C68.4599 109.994 79.8483 109.994 91.2626 109.994C100.384 109.994 105.64 104.609 105.666 95.4364C105.666 81.6946 105.666 67.9529 105.666 54.2112C105.666 45.0901 100.358 39.7823 91.1595 39.7566C68.4856 39.7566 45.8203 39.7566 23.1637 39.7566C14.0683 39.7566 8.78636 45.1931 8.7606 54.34C8.7606 68.0817 8.7606 81.8235 8.7606 95.5652C8.7606 104.661 14.1456 109.942 23.2925 109.994C34.5006 110.046 45.786 109.994 57.0456 109.994Z" fill="#E0E0E0" />
                                      <path d="M46.0175 67.5836C42.7452 71.0362 39.9367 74.025 37.0767 76.9881C34.9897 79.1782 32.5935 80.3634 30.0685 77.8899C27.5434 75.4164 28.4967 73.0975 30.7126 70.9074C33.5468 68.1247 36.278 65.2389 39.138 62.5078C43.9304 57.9215 48.5683 57.8699 53.2576 62.5078C57.947 67.1456 62.8167 72.2214 68.7171 78.2764C71.7575 74.7722 74.4371 71.5515 77.2456 68.4081C79.4099 65.9861 82.0122 64.8267 84.5888 67.5579C87.1654 70.289 85.671 72.4791 83.5324 74.5661C80.6982 77.3488 77.967 80.2346 75.0812 82.94C70.3919 87.3717 65.9344 87.4232 61.2965 82.94C56.6587 78.4567 51.454 73.046 46.0175 67.5836Z" fill="#E0E0E0" />
                                    </svg>
                                  </div>
                                  <div class="text_colr" data-bs-target="#liveChannal" data-bs-toggle="modal"><?= $this->lang->line('live_tv_channels') ?><i class="fas fa-chevron-right ms-2"></i></div>
                                </div>
                                <div class="child-card">
                                  <div class="imgchannel">
                                    <svg width="65" height="90" viewBox="0 0 84 122" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M45.5061 0C47.9117 0.445535 50.2768 1.08778 52.5773 1.92022C57.1639 3.6971 61.1058 6.81952 63.8854 10.8775C66.6651 14.9355 68.1525 19.7392 68.1524 24.6579C68.4572 36.1487 68.1524 47.6699 68.1524 59.1912C67.9829 65.6047 65.3595 71.7088 60.8229 76.2454C56.2863 80.782 50.1822 83.4053 43.7688 83.5748C38.9781 83.985 34.1605 83.1995 29.7482 81.2888C25.4159 79.3558 21.7416 76.2011 19.1754 72.2111C16.6093 68.2211 15.2628 63.5693 15.3009 58.8255C15.0875 47.548 15.3009 36.2706 15.3009 24.9932C15.3261 18.8992 17.5662 13.0222 21.6037 8.45753C25.6413 3.89288 31.2008 0.951972 37.2461 0.18287C37.4742 0.140115 37.6985 0.078963 37.9167 0H45.5061ZM22.4331 45.5059V53.522H22.7379H27.8584C28.3644 53.4664 28.8764 53.5179 29.3611 53.6732C29.8459 53.8285 30.2925 54.084 30.672 54.4232C31.0515 54.7625 31.3553 55.1778 31.5637 55.6422C31.7722 56.1065 31.8805 56.6096 31.8817 57.1186C31.872 57.6264 31.7567 58.1267 31.543 58.5874C31.3293 59.0482 31.022 59.4594 30.6407 59.7949C30.2593 60.1304 29.8123 60.3828 29.328 60.536C28.8437 60.6892 28.3329 60.7398 27.8279 60.6847H22.5855C22.5487 61.0699 22.5487 61.4577 22.5855 61.8429C23.1595 65.1342 24.6736 68.189 26.945 70.639C29.2165 73.0889 32.1484 74.8293 35.3869 75.6501C37.9348 76.2308 40.5476 76.4768 43.1592 76.3816C46.9639 76.3572 50.661 75.1163 53.71 72.8405C56.7591 70.5647 59.0002 67.3733 60.1058 63.7327C60.3801 62.7878 60.5325 61.782 60.7763 60.6847H55.4424C54.9472 60.7263 54.4487 60.6666 53.9773 60.5092C53.506 60.3518 53.0716 60.0999 52.7008 59.7691C52.33 59.4382 52.0306 59.0352 51.8207 58.5848C51.6108 58.1343 51.4949 57.6458 51.4801 57.1491C51.4726 56.6389 51.5738 56.133 51.7769 55.665C51.98 55.197 52.2803 54.7775 52.658 54.4345C53.0356 54.0915 53.4819 53.8327 53.9672 53.6754C54.4526 53.518 54.9658 53.4658 55.4729 53.522H60.9287V45.4145C57.8808 45.4145 54.589 45.4145 51.4496 45.4145C50.5038 45.4145 49.5968 45.0387 48.928 44.37C48.2592 43.7012 47.8835 42.7941 47.8835 41.8484C47.8835 40.9026 48.2592 39.9955 48.928 39.3267C49.5968 38.658 50.5038 38.2823 51.4496 38.2823H60.9287V30.1747H55.4424C54.9443 30.2207 54.4422 30.1623 53.9679 30.0032C53.4937 29.8442 53.0579 29.5879 52.6883 29.2509C52.3187 28.9139 52.0234 28.5034 51.8214 28.0458C51.6194 27.5882 51.5151 27.0935 51.5151 26.5933C51.5151 26.0931 51.6194 25.5985 51.8214 25.1409C52.0234 24.6833 52.3187 24.2729 52.6883 23.9358C53.0579 23.5988 53.4937 23.3426 53.9679 23.1835C54.4422 23.0244 54.9443 22.966 55.4424 23.012H60.7458V22.3415C60.7607 22.1895 60.7607 22.0363 60.7458 21.8843C60.2187 18.9398 58.9677 16.1726 57.1056 13.8316C55.2434 11.4906 52.8285 9.64927 50.078 8.4733C47.0738 7.30062 43.8462 6.81127 40.6294 7.04076C38.1007 6.99796 35.5922 7.49821 33.2734 8.50776C30.9546 9.51732 28.8794 11.0127 27.1879 12.8928C24.513 15.6739 22.8401 19.2663 22.4331 23.1035H28.2242C29.17 23.1035 30.077 23.4792 30.7458 24.148C31.4146 24.8167 31.7903 25.7238 31.7903 26.6696C31.7903 27.6154 31.4146 28.5224 30.7458 29.1912C30.077 29.86 29.17 30.2357 28.2242 30.2357C26.243 30.2357 24.2923 30.2357 22.3416 30.2357V38.3432H31.2417C31.758 38.2827 32.2797 38.2827 32.7961 38.3432C33.6513 38.5406 34.4037 39.0465 34.9092 39.764C35.4147 40.4815 35.6379 41.3602 35.536 42.232C35.4341 43.1037 35.0143 43.9073 34.357 44.4888C33.6996 45.0704 32.8508 45.3891 31.9732 45.384C28.9252 45.5364 25.7553 45.5059 22.4331 45.5059Z" fill="#E0E0E0" />
                                      <path d="M45.3231 98.8146V114.816H64.068C64.5754 114.75 65.0912 114.792 65.5808 114.941C66.0705 115.09 66.5228 115.342 66.9074 115.679C67.2921 116.017 67.6003 116.432 67.8114 116.899C68.0226 117.365 68.1318 117.871 68.1318 118.383C68.1318 118.894 68.0226 119.4 67.8114 119.866C67.6003 120.332 67.2921 120.748 66.9074 121.086C66.5228 121.423 66.0705 121.675 65.5808 121.824C65.0912 121.973 64.5754 122.015 64.068 121.949H19.385C18.8775 122.015 18.3618 121.973 17.8721 121.824C17.3825 121.675 16.9302 121.423 16.5455 121.086C16.1608 120.748 15.8526 120.332 15.6415 119.866C15.4304 119.4 15.3211 118.894 15.3211 118.383C15.3211 117.871 15.4304 117.365 15.6415 116.899C15.8526 116.432 16.1608 116.017 16.5455 115.679C16.9302 115.342 17.3825 115.09 17.8721 114.941C18.3618 114.792 18.8775 114.75 19.385 114.816H38.0689V99.0584C34.4375 98.3234 30.8545 97.3666 27.3401 96.1934C20.256 93.6743 14.0026 89.2527 9.26577 83.4137C4.52899 77.5747 1.49191 70.5439 0.487677 63.0926C0.228187 61.2539 0.0755284 59.4017 0.0304796 57.5454C-0.0360058 57.0379 0.00656788 56.5221 0.155354 56.0325C0.30414 55.5428 0.555699 55.0905 0.893251 54.7059C1.2308 54.3212 1.64658 54.013 2.11276 53.8019C2.57895 53.5907 3.08481 53.4815 3.59658 53.4815C4.10835 53.4815 4.61424 53.5907 5.08042 53.8019C5.5466 54.013 5.96236 54.3212 6.29991 54.7059C6.63746 55.0905 6.88902 55.5428 7.03781 56.0325C7.18659 56.5221 7.22916 57.0379 7.16268 57.5454C7.1593 63.0609 8.50444 68.4936 11.0809 73.3703C13.6574 78.2471 17.3871 82.42 21.9452 85.5255C26.7433 88.8877 32.3185 90.9727 38.1452 91.584C43.972 92.1953 49.8585 91.3128 55.2498 89.0196C60.6412 86.7265 65.3598 83.0982 68.9609 78.4769C72.5621 73.8555 74.9271 68.3932 75.8331 62.6049C76.081 60.9597 76.2236 59.3003 76.2598 57.6368C76.222 57.1299 76.2894 56.6207 76.4577 56.1411C76.626 55.6614 76.8917 55.2218 77.238 54.8498C77.5843 54.4777 78.0038 54.1812 78.4701 53.979C78.9364 53.7767 79.4395 53.673 79.9478 53.6745C80.4464 53.6924 80.936 53.813 81.3859 54.0288C81.8358 54.2446 82.2363 54.5508 82.5624 54.9284C82.8886 55.3061 83.1333 55.7469 83.2812 56.2234C83.4292 56.6999 83.4773 57.2018 83.4225 57.6977C83.3132 67.1271 80.0154 76.2418 74.066 83.5582C68.1166 90.8746 59.8659 95.9618 50.657 97.9917C48.9197 98.2965 47.1823 98.5098 45.3231 98.8146Z" fill="#E0E0E0" />
                                    </svg>
                                  </div>
                                  <div class="text_colr" data-bs-target="#radioChannal" data-bs-toggle="modal"><?= $this->lang->line('live_radio_channels') ?><i class="fas fa-chevron-right ms-2"></i></div>
                                </div>

                              </div>

                              <div class="sub_headingmax sub_heading-auto"><?= $this->lang->line('addonly') ?> <?= $subs_channel ?><?= $this->lang->line('channelsout') ?> <?= $max_channels ?>. <?= $this->lang->line('ypuadd') ?> <?= ($max_channels - $subs_channel) ?> <?= $this->lang->line('more channels.') ?></div>
                            </div>




                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
        </section>
      </div>

    </div>
  </section>
</section>


<div class="buyNow bg-black">
  <div class="row">
    <div class="col-md-12 col-sm-12 m-auto">
      <div class="main-container mt-3">
        <div class="my-4 d-f lex justify-content-center align-items-center">
          <div class="mWeb text-center">
            <div>
              <a href="<?= base_url('upgrade-subscription') ?>" class="btn w-100 ptp mt-4" disabled><?= $this->lang->line('upgrade-plan') ?></a>
              <!-- <div class="text-center mt-4 d-none"> <a href="#" class="cance_btn"><//?= $this->lang->line('Cancel') ?></a>
                                    </div> -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="liveChannal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog  modal-dialog-centered modal-scrollable m-dialog" role="document">
      <div class="modal-content" style="    height: -webkit-fill-available;">

        <div class="modal-body" style="background: rgba(0, 0, 0, 1)">
          <div class=" search_md mt-4">
            <a href="javascript:void(0);" class="pb_back d-flex align-items-center" data-bs-dismiss="modal">
              <i class="fa fa-chevron-left text-white"></i>
              <h5 class="defaultColr mb-0 ms-4 text-white"><?= $this->lang->line('channels') ?></h5>
            </a>


          </div>
          <div class="p-4 pb_sg">
            <div class=" pt-3 foooter search_ht">
              <div class="popular_search hide-div">
                <section class=" mb-4 mt-2">
                  <div class="">
                    <div class="row mt-1">

                      <?php if (!empty($activePlan['data']['channels'])) { ?>
                        <div class="searchSectionBoxSubs">
                          <?php foreach ($activePlan['data']['channels'] as $key => $value) {
                            $id = aes_cbc_encryption_($value['id']);
                          ?>

                            <div class="searcSection">
                              <a href="<?= site_url('pb_live_details?id=' . $id); ?>">
                                <div class="channelfullList">
                                  <img src="<?= $value['poster_url'] ?>" class="img-fluid  w-100" alt="thumbnnail">
                                </div>
                              </a>
                            </div>

                          <?php } ?>
                        </div>
                      <?php } else { ?>
                        <div class="col-md-6 m-auto text-center">
                          <div class="no_dt_found categaryNo">
                            <img src="<?= base_url('assets/images/info_image.svg') ?>" class="img-fluid" alt="no list found">
                            <h5 class="m-0 text-center text-white" style="margin-top: 20px !important;font-size: 22px;"><?= $this->lang->line('welcome') ?></h5>
                            <p class="mb-0 text_ac" style="font-size: 16px;line-height: 35px;"> <?= $this->lang->line('build_channel') ?></p>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="radioChannal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog  modal-dialog-centered modal-scrollable m-dialog" role="document">
      <div class="modal-content" style="    height: -webkit-fill-available;">

        <div class="modal-body" style="background: rgba(0, 0, 0, 1)">
          <div class="d-flex align-items-center search_md mt-4">
            <a href="javascript:void(0);" class="pb_back d-flex align-items-center" data-bs-dismiss="modal">
              <i class="fa fa-chevron-left text-white"></i>
              <h5 class="defaultColr mb-0 ms-4 text-white"><?= $this->lang->line('radio_channels') ?></h5>
            </a>


          </div>
          <div class="p-4 pb_sg">
            <div class=" pt-3 foooter search_ht">
              <div class="popular_search hide-div">
                <section class=" mb-4 mt-2">


                  <div class="">
                    <div class="row mt-1">
                      <?php if (!empty($activePlan['data']['radio'])) { ?>
                        <div class="searchSectionBoxSubs">
                          <?php foreach ($activePlan['data']['radio'] as $key => $value) {
                            $id = aes_cbc_encryption_($value['id']);
                          ?>

                            <div class="searcSection">
                              <a href="<?= site_url('pb_live_details?id=' . $id); ?>">
                                <div class="channelfullList">
                                  <img src="<?= $value['poster_url'] ?>" class="img-fluid  w-100" alt="thumbnnail">
                                </div>
                              </a>
                            </div>

                          <?php } ?>
                        </div>
                      <?php } else { ?>
                        <div class="col-md-6 m-auto text-center">
                          <div class="no_dt_found categaryNo">
                            <img src="<?= base_url('assets/images/info_image.svg') ?>" class="img-fluid" alt="no list found">
                            <h5 class="m-0 text-center text-white" style="margin-top: 20px !important;font-size: 22px;"><?= $this->lang->line('welcome') ?></h5>
                            <p class="mb-0 text_ac" style="font-size: 16px;line-height: 35px;"> <?= $this->lang->line('build_channel') ?></p>
                          </div>
                        </div>
                      <?php } ?>


                    </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bd-example-modal-sm " id="selectChannelRadio" tabindex="-1" role="dialog" aria-labelledby="selectChannelRadio" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content mc-content">
        <div class="modal-body p-3 ">

          <div class="d-flex align-items-center justify-content-between" style="padding: 4px 0">
            <span><?= $this->lang->line('select_live_channel_radio') ?></span>
            <span class="Crossmodal" data-bs-dismiss="modal"> <i class="fas fa-times"></i></span>
          </div>

          <div class="mb-2 mt-2">
            <ul class="nav nav-pills justify-content-around radioChannelUl" id="pills-tab" role="tablist" style="background: #262626; margin: 0px -14px;    border: 1px solid #3C3C3C;">
              <?php if (!empty($channels['data']['channels'])) { ?>
                <li class="nav-item" role="presentation">
                  <button class="btn nav-link active" id="channel-tab" data-bs-toggle="pill" data-bs-target="#channel" type="button" role="tab" aria-controls="channel" aria-selected="true"><?= $this->lang->line('live_channel') ?></button>
                </li>
              <?php } ?>
              <?php if (!empty($channels['data']['radio'])) { ?>
                <li class="nav-item" role="presentation">
                  <button class="btn nav-link" id="radio-tab" data-bs-toggle="pill" data-bs-target="#radio" type="button" role="tab" aria-controls="radio" aria-selected="false"><?= $this->lang->line('radio') ?></button>
                </li>
              <?php } ?>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="p-2 addedmain">
              </div>

              <h6 class=" textRadioChannel"><?= $this->lang->line('added_lang') ?> <span class="cls"><?= $subs_channel ?></span> <?= $this->lang->line('of') ?> <span id="max-limit"><?= $max_channels ?></span> <?= $this->lang->line('livchannel') ?> </h6>
              <div class="tab-pane fade show active" id="channel" role="tabpanel" aria-labelledby="channel-tab">


                <div class="selectchannelRadio mt-2 mb-2">
                  <!-- <h6 class="mb-0 textRadioChannel">Added <span>6</span> of <span>50</span> Live Channels </h6> -->
                  <div style="max-height: 20vw;overflow: auto;">

                    <?php foreach ($channels['data']['channels'] as $key => $value) { ?>
                      <div class="channelLinstingMain w-100">
                        <label class="d-flex justify-content-between w-100 align-items-center">
                          <div class="d-flex align-items-center">
                            <div class="img_"><img src="<?= $value['poster_url'] ?>" alt="poster_url"></div>
                            <div class="channelName">
                              <h4 class="mb-0"><?= $value['title'] ?></h4>
                              <!-- <span class="channelCat">News</span> -->
                            </div>
                          </div>

                          <div class="me-2">
                            <?php if (in_array($value['id'], $activeChannels)) { ?>
                              <input class="channel-checkbox check<?= $value['id'] ?>" type="checkbox" checked disabled value="<?= $value['id'] ?>" data-imgurl="<?= $value['poster_url'] ?>" value="<?= $value['id'] ?>">
                            <?php } else { ?>
                              <input class="channel-checkbox check<?= $value['id'] ?>" data-imgurl="<?= $value['poster_url'] ?>" type="checkbox" value="<?= $value['id'] ?>">
                            <?php } ?>
                          </div>
                        </label>
                      </div>
                    <?php } ?>


                    <!-- <div class="channelLinstingMain w-100">
                       <label class="d-flex justify-content-between w-100 align-items-center">
                        <div class="d-flex align-items-center">
                          <div class="img_"><img src="<? //=base_url('assets/website_assets/images/2.png')
                                                      ?>"></div>
                          <div class="channelName">
                            <h4 class="mb-0">DD News HD</h4>
                            <span class="channelCat">News</span>
                          </div>
                        </div>
                       
                       <div class="me-2"><input type="checkbox"></div>
                    </label>
                    </div> -->
                    <!-- <div class="channelLinstingMain w-100">
                       <label class="d-flex justify-content-between w-100 align-items-center">
                        <div class="d-flex align-items-center">
                          <div class="img_"><img src="<? //=base_url('assets/website_assets/images/3.png')
                                                      ?>"></div>
                          <div class="channelName">
                            <h4 class="mb-0">DD News HD</h4>
                            <span class="channelCat">News</span>
                          </div>
                        </div>
                       
                       <div class="me-2"><input type="checkbox"></div>
                    </label>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="radio" role="tabpanel" aria-labelledby="radio-tab">


                <div class="selectchannelRadio mt-2 mb-2">
                  <div style="max-height: 20vw;overflow: auto;">
                    <?php foreach ($channels['data']['radio'] as $key => $value) { ?>
                      <div class="channelLinstingMain w-100">
                        <label class="d-flex justify-content-between w-100 align-items-center">
                          <div class="d-flex align-items-center">
                            <div class="img_"><img src="<?= $value['poster_url'] ?>" alt="poster_url"></div>
                            <div class="channelName">
                              <h4 class="mb-0"><?= $value['title'] ?></h4>
                              <!-- <span class="channelCat">News</span> -->
                            </div>
                          </div>

                          <div class="me-2 ">
                            <?php if (in_array($value['id'], $activeChannels)) { ?>
                              <input class="channel-checkbox check<?= $value['id'] ?>" type="checkbox" checked disabled value="<?= $value['id'] ?>" data-imgurl="<?= $value['poster_url'] ?>">
                            <?php } else { ?>
                              <input class="channel-checkbox check<?= $value['id'] ?>" data-imgurl="<?= $value['poster_url'] ?>" type="checkbox" value="<?= $value['id'] ?>">
                            <?php } ?>
                          </div>
                        </label>
                      </div>
                    <?php } ?>


                    <!-- <div class="channelLinstingMain w-100">
                       <label class="d-flex justify-content-between w-100 align-items-center">
                        <div class="d-flex align-items-center">
                          <div class="img_"><img src="<? //=base_url('assets/website_assets/images/2.png')
                                                      ?>"></div>
                          <div class="channelName">
                            <h4 class="mb-0">DD News HD</h4>
                            <span class="channelCat">News</span>
                          </div>
                        </div>
                       
                       <div class="me-2"><input type="checkbox"></div>
                    </label>
                    </div> -->
                    <!-- <div class="channelLinstingMain w-100">
                       <label class="d-flex justify-content-between w-100 align-items-center">
                        <div class="d-flex align-items-center">
                          <div class="img_"><img src="<? //=base_url('assets/website_assets/images/3.png')
                                                      ?>"></div>
                          <div class="channelName">
                            <h4 class="mb-0">DD News HD</h4>
                            <span class="channelCat">News</span>
                          </div>
                        </div>
                       
                       <div class="me-2"><input type="checkbox"></div>
                    </label>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="pb-22">
            <button class="btn w-100 applyCodeActive" onclick="getChannel()"><?= $this->lang->line('submit_btn') ?></button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script>
    var channelIdsString; // Declare channelIdsString variable outside event handlers
    function getChannel() {
      var selectedChannels = [];
      $(".channel-checkbox:checked").each(function() {
        selectedChannels.push($(this).val());
      });
      channelIdsString = selectedChannels.join(',');
      $.ajax({
        url: "<?= base_url('web/subscription/updateChannel') ?>",
        type: "post",
        data: {
          channelIdsString
        },
        success: function(res) {
          try {
            var res = JSON.parse(res);
            if (res.status) {
              toastr.success(res.message);
              setTimeout(() => {
                location.reload();
              }, 1000);
            } else {
              toastr.error(res.message);
            }
          } catch (error) {
            console.log(error);
          }
        }
      })
      $('#selectChannelRadio').modal('hide');
    }

    $(".plan_type").on('click', function() {
      $(".plan_type").removeClass('active')
      type = $(this).val();
      $('.radio-buttons').addClass('d-none');
      $('#' + type).removeClass('d-none');
      // planTab(type)
      $(this).addClass('active')
    });

    $('.custom-radio').on('click', function() {
      var is_upgrade = $(this).find('.upgrade_plan').val();
      var showDiv = $(this).data('title');
      if (is_upgrade) {
        $('.hide-plan-div').addClass('d-none');
        $('.hide-plan-div#' + showDiv).removeClass('d-none');
      }
      if (is_upgrade) {
        $('#proceed').attr('disabled', false);
        var price = Number($(this).find('.price').val());
        var gst_amount = Number($(this).find('.gst_amount').val());
        var newAmt = Number($(this).find('.s_price').val());
        $('#total-amt').html('₹ ' + price.toFixed(2));
        $('#dis-amt').html('₹ ' + (price - newAmt).toFixed(2));
        $('#pay-amt').html('You Pay : ₹ ' + (newAmt + gst_amount).toFixed(2));
        $('#rem-amt').html('₹ ' + (newAmt + gst_amount).toFixed(2));
        $('#price-info').removeClass('d-none');
      } else {
        // $('#price-info').addClass('d-none');
        // $('#proceed').attr('disabled',true);    
      }
    });

    $(document).on('click', '#proceed', function() {
      if (channelIdsString != '' && channelIdsString != undefined) {
        var chanel_id = channelIdsString;
      } else {
        var chanel_id = "";
      }
      //console.log('chanel_id',chanel_id);
      //return false;
      var pid = $('.plan_type.active').val();
      // Find the nearest form and submit it
      var price = $("#" + pid + " input[name=price-tab-plan]:checked");
      if (price.length < 1) {
        return false;
      }
      var amount = $(price).parent('.custom-radio').find('.price').val();
      var plan_id = $(price).parent('.custom-radio').find('.plan_id').val();
      var id = $(price).parent('.custom-radio').find('.id').val();
      var validity = $(price).parent('.custom-radio').find('.validity').val();
      var gst_amount = $(price).parent('.custom-radio').find('.gst_amount').val();
      var s_price = $(price).parent('.custom-radio').find('.s_price').val();
      var final_mrp = $('#final_mrp').val();
      $('.channel_id_checkout').val(chanel_id);
      $('.plan_id_checkout').val(plan_id);
      $('.id_checkout').val(id);
      $('.validity_checkout').val(validity);
      $('.gst_amount_checkout').val(gst_amount);
      if (final_mrp > 0) {
        $('.s_price_checkout').val(final_mrp);
      } else {
        $('.s_price_checkout').val(s_price);
      }

      $('.price_checkout').val(amount);

      $('.custom-radio-form').submit();
    });



    var channelLimit = "<?= $max_channels ?>";
    const originalModalContent = $('#selectChannelRadio .modal-content').html();
    $('.add-btn').on('click', function() {
      var dataLimit = $(this).data('limit');
      channelLimit = dataLimit;
      $('#max-limit').html(dataLimit);
      channelIdsString = '';
    });


    $(document).on('click', '.removeList', function() {
      var current = $(this).parents('.added-channel').attr('data-id');
      $('input.check' + current).prop('checked', false);
      $(this).parents('.added-channel').remove();
      var len = $('input.channel-checkbox:checked').length;
      $('.textRadioChannel .cls').text(len)
    })

    $(document).on('change', 'input.channel-checkbox', function() {
      var current = $(this).val();
      var url = $(this).attr('data-imgURL');
      var len = $('input.channel-checkbox:checked').length;
      if (len > channelLimit) {
        toastr.error('you can not select more than ' + channelLimit + ' channel')
        $(this).prop('checked', false);
        return false
      }
      if ($(this).prop('checked')) {
        $('.textRadioChannel .cls').text(len)
        $('.addedmain').prepend(`<div class="added-channel" id="shubham${current}" data-id="${current}">
          <img src="${url}" alt="poster_url">
         <span class="removeList"><i class="fas fa-times"></i></span>
      </div>`)
      } else {
        $('#shubham' + current).remove()
        $('.textRadioChannel .cls').text(len)

      }
    });


    $(document).ready(function() {
      window.history.pushState({
        page: 1
      }, document.title, "");
      window.history.replaceState({
        page: 2
      }, document.title, "");
      $(window).on('popstate', function(event) {
        window.location.href = "<?= base_url() ?>";
      });
    });

    $(window).on('load', function() {
  var type = "<?=$type ?>";
    queueTrackingData('trackPageView', [document.location.href]);
    queueTrackingData('trackEvent', ['Page', 'View', 'Upgrade']);
  })
  </script>