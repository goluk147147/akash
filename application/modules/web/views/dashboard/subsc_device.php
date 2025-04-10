<?php
$is_upgrade = false;
if(SUBSCRIPTION_CHECK == 1){
    $is_upgrade = true;
    $active_plan = $this->session->userdata('active_plan');
    if(!empty($active_plan) && isset($active_plan['is_upgradable'])){
        $is_upgrade = $active_plan['is_upgradable'];
    }   
}

?>

<style>
  /* Simple loader styling */
  #loader {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 999;
    /* Sit on top */
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border: 3px solid #f3f3f3;
    /* Light grey */
    border-radius: 50%;
    border-top: 3px solid #3498db;
    /* Blue */
    width: 40px;
    height: 40px;
    animation: spin 2s linear infinite;
    /* Animation */
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  .user-logout {
    background: rgba(14, 22, 83, 1) !important;
    padding: 7px 20px;
    border-radius: 10px !important;
    font-size: 12px;
  }

  .user-logout:hover {
    background: rgba(57, 57, 57, 1) !important;
  }
  .payment_loader2{
        background: #000000b0 !important;
    }
</style>


<div id="loader"></div> <!-- Loader element -->

<!--main content start-->
<section id="main-content">

  <section class="wrapper site-min-height">
    <div class="row">
      <div class="col-lg-12">

        <div class="positionab posti-pdft">


          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 pt-5 ps-3">
                <div class="page-title d-flex align-items-center">
                  <a onclick="history.go(-1)" class="pb_back d-flex align-items-center"><i class="fa fa-chevron-left text-white" aria-hidden="true"></i>
                    <h5 class="defaultColr mb-0 ms-4 text-white"><?= $this->lang->line('subscription_and_devices') ?></h5>
                  </a>
                </div>
              </div>
            </div>
            <div class="row mt-5">

              <div class="col-md-11 m-auto">
                <div class="term-section pt-3">


                  <?php if ($activePlan && isset($activePlan['data']['detail']['transaction_status']) == 1) { ?>
                    <div class="row flex-column-reverse flex-lg-row">
                      <div class="col-md-6 mt-2">
                        <?php
                        $expiry_date = date('jS F, Y', $activePlan['data']['detail']['expiry_date']);

                        ?>
                        <div class="f-600"><?= $this->lang->line('subscription') ?>: <span style="color: rgba(237, 185, 84, 1);"><?= $activePlan['data']['detail']['plan_name'] ?> ( <?= $activePlan['data']['detail']['pricing_title'] ?> )</span></div>
                        <small class="" style="color:rgba(176, 176, 176, 1)"><?= $this->lang->line('next_payments') ?>: <?= $expiry_date ?></small>
                      </div>
                      <div class="col-md-6 mt-2">
                        <div class="m-q-y text-end justify-content-center align-items-center ptm-sf my4 py-fos">
                          <a href="<?= base_url('upgrade-subscription'); ?>">
                            <?php
                            $btn_name = $this->lang->line('upgrade');
                            if(SUBSCRIPTION_CHECK == 1 && $is_upgrade == false){
                              $btn_name = $this->lang->line('view_plan');
                            } 
                          
                            ?>
                            <button class="active d-none" id="nav-year-tab" type="button"><?= $btn_name; ?></button>
                            <?php  ?>
                          </a>

                          <a href="<?= base_url('my_plan'); ?>">
                            <button class="" id="nav-month-tab"><?= $this->lang->line('payment_details') ?></button>
                          </a>
                          <?php if(isset($mandate_id) && $mandate_id != "" && $mandate_status == "0"){ ?>
                            <button class="" id="nav-month-tab" data-bs-target="#cancelSubs" data-bs-toggle="modal"><?= $this->lang->line('Cancel') ?></button>
                          <?php } ?>
                        </div>
                      </div>
                    </div>




                    <div class="row">
                      <div class="col-lg-4 col-sm-8 mb-2">
                        <div class="d-flex justify-content-between align-items-center py-5">
                          
                          <?php if(isset($payment_method_type) && $payment_method_type != ""){?>
                            <div>
                              <div class="sub_dc"><small><?= $this->lang->line('paid_via') ?> <?= $payment_method_type?></small></div>
                              <div class="sub_dc_card"><small>xxxxxxxxxxxxxxxx</small></div>
                            </div>
                            <div style="border-right: 1px solid #33335f;">&nbsp;</div>
                          <?php } ?>
                  
                          <div class="">
                            <div class="">
                              <div class="sub_dc"><small><?= $this->lang->line('reg_mobile_number') ?></small></div>
                              <?php $mobile = $activePlan['data']['detail']['mobile'];
                              $masked_mobile = substr($mobile, 0, 2) . '********' . substr($mobile, -2);
                              //echo $masked_mobile; // Output: +91 8********3
                              ?>
                              <div class="sub_dc_card"><small><?= $masked_mobile ?></small></div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  <?php } else {
                    //::TODO
                  ?>
                    <div class="row">
                      <div class="col-md-6 mb-2">
                        <h5 class="sub_heading_dt d-none"><?= $this->lang->line('Subscribe_enjoy') ?></h5>
                      </div>

                      <div class="col-md-6 mb-2">
                        <div class="m-q-y d-flex text-end justify-content-end align-items-center ptm-sf py-fos">
                          
                          <a href="<?= base_url('subscription') ?>">
                            <?php //echo $this->lang->line('account-subscribe') ?>
                            <button class="active d-none" id="nav-year-tab" type="button"><?= $this->lang->line('account-subscribe') ?></button>
                          </a>
                          <?php if($payment_detail_exists == true){ ?>
                          <a href="<?= base_url('my_plan'); ?>">
                            <button class="" id="nav-month-tab"><?= $this->lang->line('payment_details') ?></button>
                          </a>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <section class="border-live my-5"></section>
                  <?php } ?>






                  <div class="row">

                    <div class="col-sm-12 p-3 m-auto">
                      <?php if ($my_devices) {
                        foreach ($my_devices as $each_device) { ?>
                          <div class="mb-5">
                            <h5 class="mb-2 my-fo"><?= $this->lang->line('my_device') ?></h5>
                            <div class="p-2 row m-0 align-items-center" style="background: rgba(10, 15, 57, 1); border-radius: 10px;">
                              <div class="col-lg-8 col-sm-12">
                                <div style="color: rgba(206, 206, 206, 1);"><?= $each_device['device_model'] ?? ""; ?></div>
                                <small style="color:rgba(108, 108, 108, 1)" class="dt_size_sub"><?= $this->lang->line('last_used') ?>: <?= date('jS F, Y', $each_device['created_at']); ?></small>
                              </div>
                              <div class="col-lg-4 col-sm-12 text-end">
                                <button class="btn deregisterbtn mt-2 mb-2 user-logout log_ts" device_name="<?= $each_device['device_model'] ?? ""; ?>" user_device_info_id="<?= $each_device['user_device_info_id'] ?>" device_token="<?= $each_device['device_token'] ?>"><?= $this->lang->line('logout'); ?></button>
                              </div>
                            </div>
                          </div>
                        <?php }
                      }

                      if (!empty($other_devices)) { ?>
                        <div class="mb-5 total_device_div">
                          <h5 class="mb-2 total_devices my-fo" total_device="<?= count($other_devices); ?>"><?= $this->lang->line('other_devices') ?></h5>

                          <div class="row">
                            <?php foreach ($other_devices as $each_device) { ?>
                              <div class="col-md-6 device_id_<?= $each_device['user_device_info_id'] ?> mb-3">
                                <div class="p-2 row m-0 align-items-center" style="background: rgba(10, 15, 57, 1);border-radius: 10px">
                                  <div class="col-lg-8 col-sm-12">
                                    <div style="color: rgba(206, 206, 206, 1);"><?= $each_device['device_model'] ?? ""; ?></div>
                                    <small style="color:rgba(108, 108, 108, 1)" class="dt_size_sub"><?= $this->lang->line('last_used') ?>: <?= date('jS F, Y', $each_device['created_at']); ?></small>
                                  </div>
                                  <div class="col-lg-4 col-sm-12 text-end">
                                    <button class="btn deregisterbtn mt-2 mb-2 users_device_logout log_ts" device_name="<?= $each_device['device_model'] ?? ""; ?>" user_device_info_id="<?= $each_device['user_device_info_id'] ?>" device_token="<?= $each_device['device_token'] ?>"><?= $this->lang->line('logout'); ?></button>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>

                          </div>
                        </div>
                      <?php } ?>
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
</section>



<div class="modal fade bd-example-modal-sm " id="cancelSubs" tabindex="-1" role="dialog" aria-labelledby="cancelSubs" aria-hidden="true">
  <div class="modal-dialog modal_sm modal-dialog-centered">
    <div class="modal-content mc-content">
      <div class="modal-body p-3 ">

        <div class="d-flex align-items-center justify-content-end" style="padding: 4px 0">

          <span class="Crossmodal" data-bs-dismiss="modal" style="    margin-top: -10px;"> <i class="fas fa-times"></i></span>
        </div>

        <div class="mb-2 mt-2 text-center">
          <div class="attentionImg">
            <!-- <img src="attention.svg"> -->
            <img src="<?= base_url('assets\website_assets\images\attention.svg') ?>" alt="attention">
          </div>
          <h4 class="mb-0 text-white canc_subdt"><?= $this->lang->line('cancel_subscription') ?></h4>
          <?php $validity_string = $this->lang->line('renew_string1')." ".$valid_till. ". " .$this->lang->line('renew_string2'); ?>
          <small class="detail_canc"><?= $validity_string; ?></small>
        </div>

        <div class="mt-2">
          <button class="btn w-100 ptp mt-4"><?= $this->lang->line('keep_subscription'); ?></button>
          <div class="text-center"><button data-bs-target="#cancelSubs" data-bs-toggle="modal" class="btn text-primary"  onclick="cancel_subs('<?=$mandate_id?>')"><?= $this->lang->line('Cancel'); ?></button> </div>

        </div>

      </div>
    </div>

  </div>
</div>



<script>
  function redirectToBaseURL() {
    // Replace 'base_url_here' with your actual base URL
    var baseURL = '<?= base_url(); ?>';
    window.location.href = baseURL;
  }
</script>

<script>
  $(document).on('click', '.users_device_logout', function() {
    let device_token = $(this).attr('device_token');
    let user_device_info_id = $(this).attr('user_device_info_id');
    let total_device = $(".total_devices").attr('total_device');
    let model_name = $(this).attr('device_name');
    let confirm_msg = '<?= $this->lang->line('other_logout_p1'); ?>' + ' ' + model_name + ' ' + '<?= $this->lang->line('other_logout_p2'); ?>'
    swal({
      title: '<?= $this->lang->line('Logout'); ?>',
      text: confirm_msg,
      imageUrl: "<?= base_url('assets/images/logout.png'); ?>",
      imageWidth: 70,
      imageHeight: 70,
      confirmButtonColor: '#4845F6',
      cancelButtonColor: '#171717',
      confirmButtonText: "<?= $this->lang->line('logout'); ?>",
      showCancelButton: true,
      cancelButtonText: '<?= $this->lang->line('Cancel'); ?>',
      allowOutsideClick: false,
    }).then(function(isConfirm) { //console.log(isConfirm);
      if (isConfirm.value && isConfirm.value == true) {
        $.ajax({
          type: 'POST',
          url: '<?= base_url('/web/dashboard/logout_devices') ?>',
          dataType: "json",
          data: {
            user_device_info_id: user_device_info_id,

          },
          beforeSend: function() {
            //$('#loader').show();
            $("#overlayonajaxhit").show();
          },
          success: function(data) {
            // matomo('RegisteredDevice','DeviceRemoved',user_device_info_id +'/'+model_name);
            queueTrackingData('trackEvent', ["RegisteredDevice", "DeviceRemoved",user_device_info_id +'/'+model_name]);
            if (data.status == true) {
              $(".device_id_" + user_device_info_id).remove();
              //window.location.href = data.url;
              total_device = total_device - 1;
              $(".total_devices").attr("total_device", total_device);
              if (total_device == 0) {
                $(".total_device_div").remove();
              }
              //$('#loader').hide();
              toastr.success('<?= $this->lang->line("logged_out_successfully") ?>');
            } else {
              //$('#loader').hide();
              //$("#overlayonajaxhit").hide();
            }
          },
          complete: function(data) {
            $("#overlayonajaxhit").hide();
          }
        });
      }
    });
  });
  $(document).on('click', '#nav-month-tab', function() {
    // matomo('Setting ','Select ','Payment History');
    queueTrackingData('trackEvent', ["Setting", "Select",'PaymentHistory']);

  });

  $(window).on('load', function() {
    queueTrackingData('trackPageView', [document.location.href]);
      queueTrackingData('trackEvent', ["Page", "View", "RegisteredDevice"])

  });


  function cancel_subs(mandate_id){
    $.ajax({
          type: 'POST',
          url: '<?= base_url('/web/subscription/cancel_subscription') ?>',
          dataType: "json",
          data: {
            mandateId: mandate_id,
          },
          beforeSend: function() {
            $('#overlayonajaxhit').show();
          },
          success: function(res) {
            //console.log(res);
            if (res.status == true) {
              toastr.success(res.data);
            } else {
              toastr.error(res.data);
            }
          },
          complete: function(){
            $('#overlayonajaxhit').hide();
          }
    });
  }
</script>