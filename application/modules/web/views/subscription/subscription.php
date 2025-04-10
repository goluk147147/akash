<style>
  .disable {
    pointer-events: none;
    color: gray !important;
  }

  .promo-flex {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .promo_remove {
    color: var(--pbc);
    font-size: 16px;
    padding-left: 0;
    padding: 0;
    line-height: normal;
    margin: -3px 0 0 0;
  }

  .applyCodeActive:disabled {
    background: #414040;
    cursor: default;
  }

  #toast-container>.toast-success {
    background-image: url("<?= base_url('assets/images/success.svg'); ?>") !important;
  }

  #toast-container>.toast-info {
    background-image: url("<?= base_url('assets/images/info-img.png'); ?>") !important;
  }

  #toast-container>.toast-warning {
    background-image: url("<?= base_url('assets/images/warning-img.png'); ?>") !important;
  }

  #toast-container>.toast-error {
    background-image: url("<?= base_url('assets/images/error.svg'); ?>") !important;
  }
  #promoInput {
    text-transform: uppercase;
  }
  .lineragradienttop{
    display:none;
  }
  .bg-blc{
    background:inherit !important;
  }
  .positionab  {
    background: rgb(0 0 55 / 99%) !important;
  }

  .publisher_plan_price input:checked+.radio-btn{
    border:1.5px solid #9b782d !important;
    background:inherit !important;
  }
  .publisher_plan_price .radio-btn{
   justify-content:center;
   padding:15px 15px !important;
  }
  .plan_pblisher_dt{
    margin-top:10px;
  }
  .plan_pblisher_dt p{
    font-size:18px;
    font-family: 'AnekLatin-Medium' !important;
    font-weight:500;
    margin-bottom:0;
  }
  .plan_pblisher_dt .hobbies-icon{
    width:100%;
  }
  .plan_pblisher_dt img{
    width:20px  !important;
    height:20px;
    margin-bottom:0 !important;
  }
  .publisher_plan_price .hobbies-icon .h5{
    justify-content:center;
  }
  .text-subscription-head{
    line-height:normal;
    text-transform: capitalize;
  }
  .subscription-table thead th{
   background: rgba(0, 0, 55, 1);
  }
/* 
    .radio-buttonss{
      display:inherit !important;
      white-space: nowrap;
    } */
     .blurBG{
      background:inherit !important;
     }
 
</style>


<!--main content start-->
<section id="main-content">

  <section class="wrapper site-min-height">
    <div class="row">
      <div class="col-lg-12">


        <section class="termCondition">

          <div class="term-image pt-4">

            <div class="row">
              <div class="col-lg-12 text-right blurBG">
                <div class="back-btn pe-4 mb-3 text-end"> <a href="<?= base_url() ?>"><img src="<?= base_url('assets/images/sunscription_close.svg'); ?>" class="subscription_close_img" alt="subscription_close"></a></div>
                <?php if($handled_default_case == false){ ?>
                <h4 class="text-center text-subscription-head"><b><?= $this->lang->line('subscription_heading')." ".strtolower($publisher_name) ?></b></h4>
                <?php } else { ?>
                <h4 class="text-center text-subscription-head"><b><?= $this->lang->line('Subscribewatch'); ?></b></h4>
                <?php } ?>
              </div>
            </div>

            <div class="positionab ">


              <div class="container-fluid bg-blc">

                <div class="row m-0">


                  <div class="col-md-11 col-sm-12 pse-0 m-auto">

                    <div class="term-section">

                      <div class="row mt-3 mb-5">
                        <div class="col-md-10 col-sm-12 m-auto">
                        <?php  $subscriptions_plan_class = ($publisher_id != 0)?"d-none":""; ?>
                          <div class="plan-table <?= $subscriptions_plan_class;?>">
                            <table class="tabel w-100 subscription-table">

                              <thead>

                             <tr style="vertical-align:bottom;">
                            <th class="left-sticky" id="unique-id"></th>
                            <?php
                                $gold_plan_id = 0;
                                if (isset($subscriptions['data']['plans']) && is_array($subscriptions['data']['plans'])) {
                                    $planids = [];  // Define the array to collect plan IDs
                                    foreach ($subscriptions['data']['plans'] as $plan_data) { //DEFAULT_RESOLUTION
                                        if(isset($plan_data['is_default']) && $plan_data['is_default'] == 1){
                                          $gold_plan_id = $plan_data['id'];
                                        }
                                        $planids[] = $plan_data['id'];  // Append each plan ID to the array
                                        $plan_title = isset($_SESSION['lang_id']) && $_SESSION['lang_id'] == "hindi" ? $plan_data['title']['hi'] : $plan_data['title']['en'];
                                        ?>
                                        <?php if(isset($plan_data['is_default']) && $plan_data['is_default'] == 1){ ?>
                                        <th class="dd-plan elem_<?php echo $plan_data['id']; ?>" data-id="<?php echo $plan_data['id']; ?>" id="uniq-ids"><?php echo "<div style='line-height:normal;'><img class='plan_tag' src='".base_url('assets/images/freeimg.svg')."' ></div> ". $plan_title; ?></th>
                                        <?php }  else { ?>
                                        <th class="dd-plan elem_<?php echo $plan_data['id']; ?>" data-id="<?php echo $plan_data['id']; ?>" id="uniq-ids"><?php echo $plan_title; ?></th>
                                        <?php } ?>
                                        <?php
                                    }
                                }
                                ?>
                            </tr>


                              </thead>

                              <tbody>

                                <?php if ((isset($subscriptions['data']['features']))) {
                                  foreach ($subscriptions['data']['features'] as $feature) { ?>

                                    <tr>
                                    <th class="left-sticky" id="uni-id">
                                    <?= isset($_SESSION['lang_id']) && $_SESSION['lang_id'] == "hindi" ? $feature['title']['hi'] : $feature['title']['en'] ?>
                                    </th>

                                      <?php $k = 0; ?>
                                      <?php foreach ($feature['value'] as $values) {
                                        if ($feature['type'] == 2) {
                                          $pattern = '/\{\{(\d+)\}\}/';
                                          if (preg_match($pattern, $values, $matches)) {
                                            $number = $matches[1];
                                          } else {
                                            $number = $values;
                                          }
                                        ?>
                                          <?php if ($number != -1) { ?>
                                            <td class="dd-plan ddplan<?= $planids[$k] ?? '' ?>">
                                              <span class="text-primary cursor-pointer add-btn disable btn_<?= $planids[$k] ?? '' ?>" data-bs-target="#selectChannelRadio" data-bs-toggle="modal" data-limit="<?= $number ?>">+<?= $this->lang->line('add') ?></span>
                                              <div><small>you can add <?= $number ?> channels</small></div>
                                            </td>
                                          <?php } else { ?>
                                            <td class="dd-plan ddplan<?= $planids[$k] ?? '' ?>"><span class=" add-btn disable btn_<?= $planids[$k] ?? '' ?>" data-limit="<?= $number ?>"></span>
                                              <div>All</div>
                                            </td>
                                          <?php } ?>

                                          <?php } else { 
                                            $search1 = "P)"; $search2 = "p)";
                                            if (stripos($values, $search1) !== false || stripos($values, $search2) !== false) {
                                              if($planids[$k] == $gold_plan_id){
                                                //if(DEFAULT_RESOLUTION != null && DEFAULT_RESOLUTION != ""){
                                                  //$values = DEFAULT_RESOLUTION."p";
                                                  if($this->session->userdata('all_resolution')){
                                                    $all_resolution = $this->session->userdata('all_resolution');
                                                    if(!empty($all_resolution)){
                                                      $values = ""; $platform_count = count($all_resolution,0);
                                                      $p_count = 0;
                                                      foreach($all_resolution as $each_res){
                                                          ++$p_count;
                                                          $space = "";
                                                          if($p_count < $platform_count){
                                                            $space = " |&nbsp;";
                                                          }
                                                          $values .= ucwords($each_res['platform']).": ".$each_res['resolution'].$space;
                                                      }
                                                    }
                                                  //}
                                                } else {
                                                  $values = preg_replace('/\s*\(.*$/', '', $values); 
                                                }
                                              } else {
                                                $values = preg_replace('/\s*\(.*$/', '', $values); 
                                              }
                                              ?>
                                            <td class="dd-plan ddplan<?= $planids[$k] ?? '' ?>"><?= $values ?></td>
                                          <?php } else if ($values == 1 && stripos($feature['title']['en'] , " ads") !== false) {  ?>
                                            <td class="dd-plan ddplan<?= $planids[$k] ?? '' ?>"><img src="<?= base_url('assets/images/tick.svg') ?>" alt="trick"></td>
                                          <?php } else if ($values == 0 && stripos($feature['title']['en'] , " ads") !== false) { ?>
                                            <td class="dd-plan ddplan<?= $planids[$k] ?? '' ?>"><img src="<?= base_url('assets/images/cross.svg') ?>" alt="cross" height="13px"></td>
                                          <?php } else if (strtolower($values) == 'true' || ($values === 1)) {  ?>
                                            <td class="dd-plan ddplan<?= $planids[$k] ?? '' ?>"><img src="<?= base_url('assets/images/tick.svg') ?>" alt="trick"></td>
                                          <?php } else if (strtolower($values) == 'false' || ($values === 0)) { ?>
                                            <td class="dd-plan ddplan<?= $planids[$k] ?? '' ?>"><img src="<?= base_url('assets/images/cross.svg') ?>" alt="cross" height="13px"></td>
                                          <?php } else { ?>
                                            <td class="dd-plan ddplan<?= $planids[$k] ?? '' ?>"><?= $values ?></td>
                                          <?php } ?>
                                      <?php }
                                        $k += 1;
                                      } ?>

                                    </tr>
                                <?php }
                                } ?>


                              </tbody>
                            </table>
                          </div>

                          <div class="main-container mt-3 sft-tp">
                            <div class="my-4 d-f lex justify-content-center align-items-center">
                              <di class="m-q-y text-center">

                                <!-- <button class=" active" id="nav-year-tab" type="button"><!?=$price_data['type']?></button> -->
                                <?php
                                $schemPlans = [];
                                $totalPlans = [];
                                $i = 0;
                                if (isset($subscriptions['data']['plans'])) {
                                  foreach ($subscriptions['data']['plans'] as $plan_data) {
                                    foreach ($plan_data['pricing'] as $pla) {
                                      $totalPlans[$pla['type']][] = [
                                        'id' => $plan_data['id'],
                                        'title' => $plan_data['title'],
                                        'features' => $plan_data['features'],
                                        'pricing' => $pla
                                      ];
                                      if (!in_array($pla['type'], $schemPlans)) {
                                        $schemPlans[] = $pla['type'];
                                      } else {
                                        continue;
                                      }
                                ?>

                                      <button class="<?=$subscriptions_plan_class; ?> <?php if ($i == 0) {

                                                        echo 'active';
                                                      } ?> plan_type" data-id="<?= $planids[1] ??  $planids[0] ?>" id="nav-year-tab" value="<?= str_replace(' ', '-', $pla['type']) ?>" type="button"><?= $pla['type'] ?></button>
                                <?php
                                      if ($i == 0) {
                                        $typename = $pla['type'];
                                      }
                                      $i++;
                                    }
                                  }
                                }

                                ?>
                            </div>

                          </div>




                          <div class="main-container mt-3 col-md-9 m-auto sub-ft">
                            <div class="plan_cen">

                            <!-- <div class="radio-buttonss"> -->
                            <?php $k = 0; 
                            $publisher_plan_price = ""; $plan_title = "";
                            if($publisher_id != 0){
                              $publisher_plan_price = "publisher_plan_price";
                              $plan_title = "d-none";
                            }
                            foreach ($totalPlans as $key => $plan) { ?>
                              <div id="<?= str_replace(' ', '-', $key) ?>" class="radio-buttonss <?= ($schemPlans[0] != $key) ? 'd-none' : '' ?>">
                                <?php foreach ($plan as $skey => $splan) { ?>
                                  <label class="custom-radio radioInput <?=$publisher_plan_price;?> <?= ($k == 0) ? 'f-tile' : '' ?> customRadio_<?= $splan['id'] ?>" data-id="<?= $splan['id'] ?>" data-title="<?= str_replace(' ', '-', $splan['title']['en']) ?>" for="IDRadio_<?= $splan['pricing']['id'] ?>">
                                    <input type="radio" name="price-tab-plan" id="IDRadio_<?= $splan['pricing']['id'] ?>">
                                    <span class="radio-btn">
                                      <div class="hobbies-icon">
                                        <div class="mb-0 h5 premium_ic <?= $plan_title; ?>"><?= $splan['title']['en'] ?></div>
                                        <div class="h5 d-flex align-items-center"><span><i class="fas fa-rupee-sign pe-1"></i><?= ($splan['pricing']['s_price'] + $splan['pricing']['gst_amount']) ?></span> <sub>&nbsp;<?= $splan['pricing']['type'] ?></sub></div>
                                        <?php if($publisher_id != 0){ ?>
                                        <div class="d-flex align-items-center plan_pblisher_dt"><p><?= $this->lang->line('all_content') ?></p><img src="<?= base_url('assets/images/plan_publisher.svg') ?>" alt="check" class="ms-2"></div>
                                        <?php } ?>
                                        <input type="hidden" class="price" name="price" value="<?= $splan['pricing']['mrp'] ?>">
                                        <input type="hidden" class="validity" name="validity" value="<?= $splan['pricing']['validity'] ?>">
                                        <input type="hidden" class="plan_id" name="plan_id" value="<?= $splan['pricing']['plan_id'] ?>">
                                        <input type="hidden" class="id" name="id" value="<?= $splan['pricing']['id'] ?>">
                                        <input type="hidden" class="gst_amount" name="gst_amount" value="<?= $splan['pricing']['gst_amount'] ?>">
                                        <input type="hidden" class="s_price" name="s_price" value="<?= $splan['pricing']['s_price'] ?>">
                                        <input type="hidden" class="type" name="type" value="<?= ($splan['pricing']['type']) ?? '' ?>">
                                        <input type="hidden" class="title" name="title" value="<?= $splan['title']['en'] ?? '' ?>">
                                      </div>
                                    </span>
                                  </label>
                                  <?php $k += 1; ?>
                                <?php } ?>
                              </div>
                            <?php } ?>

                            <!-- </div> -->

                               </div>
                          </div>
                          <div class="main-container mt-3 col-md-9 m-auto sub-ft">
                            <div class="mt-3">
                              <form class="custom-radio-form" method="post" action="<?= base_url('razorpost'); ?>">
                                <input type="hidden" class="price_checkout" name="price" value="">
                                <input type="hidden" class="validity_checkout" name="validity" value="">
                                <input type="hidden" class="plan_id_checkout" name="plan_id" value="">
                                <input type="hidden" class="channel_id_checkout" name="channel_id" value="">
                                <input type="hidden" class="id_checkout" name="id" value="">
                                <input type="hidden" class="gst_amount_checkout" name="gst_amount" value="">
                                <input type="hidden" class="s_price_checkout" name="s_price" value="">
                                <input type="hidden" class="couponApplied" name="couponApplied" value="0">
                                <input type="hidden" class="plan_title" name="plan_title" value="0">
                                <input type="hidden" class="plan_type" name="plan_type" value="0">
                                <input type="hidden" class="referer" name="referer" value="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                              </form>

                            </div>
                            <div class="promo-flex mt-2">
                              <div class="text-center cpn-mdl" style="cursor:pointer">
                                <img src="<?= base_url('assets/images/coupon.svg') ?>" class="coupon-img pe-2">
                                <button type="button" class="btn border-botoom-dot dddd">
                                  <?= $this->lang->line('have_promo') ?>
                                </button>
                              </div>
                              <div clas="d-flex align-items-center" id="coupan"></div>
                            </div>
                            <?php if ($logged_in == true) { ?>
                              <div class="text-center">
                              <button class="btn w-60 ptp mt-3 m-auto" id="proceed"><?= $this->lang->line('proceed_to_pay_btn') ?></button>
                              </div>
                            <?php } else { ?>
                              <div class="text-center">
                              <button class="btn w-60 ptp mt-3 m-auto" id="proceedToLogin"><?= $this->lang->line('login_to_pay') ?></button>
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
      </div>

    </div>
  </section>
</section>
<div class="modal fade bd-example-modal-sm " id="promoCode" tabindex="-1" role="dialog" aria-labelledby="promoCode" aria-hidden="true">
  <div class="modal-dialog modal_sm modal-dialog-centered">
    <div class="modal-content mc-content">
      <div class="modal-body p-3 ">

        <div class="d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #292929;padding: 4px 0">
          <span class="f-16s"><?= $this->lang->line('promo_code') ?></span>
          <span class="Crossmodal cross_modal_dt closecross" data-bs-dismiss="modal"> <img src="<?= base_url('assets/images/sunscription_close.svg'); ?>" class="subscription_close_img" alt="subscription_close"></span>
        </div>
        <div class="mb-4 mt-2">
          <label for="promoInput" class="f-15s"><?= $this->lang->line('enter_promo_code') ?></label>
          <input type="text" id="promoInput" value="" class="w-100 code-input" name="promo" placeholder="<?= $this->lang->line('enter_promo_code') ?>">
          <span class="error_name"></span>
        </div>
        <div class="pb-2">
          <button class="btn w-100 applyCodeActive" id="applyButton" disabled><?= $this->lang->line('apply_code_btn') ?></button>
        </div>

      </div>
    </div>
  </div>
</div>
<input type="hidden" id="final_mrp" value="0">
<input type="hidden" id="final_gst" value="0">

<div class="modal fade bd-example-modal-sm " id="selectChannelRadio" tabindex="-1" role="dialog" aria-labelledby="selectChannelRadio" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content mc-content">
      <div class="modal-body p-3 ">

        <div class="d-flex align-items-center justify-content-between" style="padding: 4px 0">
          <h3 class="mb-0 f-16s"><span><?= $this->lang->line('select_live_channel_radio') ?></span></h3>
          <span class="Crossmodal cross_modal_dt" data-bs-dismiss="modal"> <img src="<?= base_url('assets/images/sunscription_close.svg'); ?>" class="subscription_close_img" alt="subscription_close"></span>
        </div>

        <div class="mb-2 mt-2">
          <ul class="nav nav-pills justify-content-around radioChannelUl" id="pills-tab" role="tablist" style="background: #262626; margin: 0px -14px;    border: 1px solid #3C3C3C;border-left:none;border-right:none;">
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
              <div class="added-channel">

              </div>

            </div>
            <h6 class=" textRadioChannel mb-3"><?= $this->lang->line('added_lang') ?> <span class="cls">0</span> <?= $this->lang->line('of') ?> <span id="max-limit">5</span> <?= $this->lang->line('livchannel') ?></h6>
            <div class="tab-pane fade show active" id="channel" role="tabpanel" aria-labelledby="channel-tab">




              <div class="selectchannelRadio mt-2 mb-2">

                <?php foreach ($channels['data']['channels'] as $channel) { ?>
                  <div class="channelLinstingMain w-100" data-id="<?= $channel['id'] ?>" data-title="<?= $channel['title'] ?>" data-type="LiveChannel">
                    <label class="d-flex justify-content-between w-100 align-items-center">
                      <div class="d-flex align-items-center">
                        <div class="img_"><img src="<?= $channel['poster_url'] ?>" alt="poster"></div>
                        <div class="channelName">
                          <h4 class="mb-0"><?= $channel['title'] ?></h4>
                          <input type="hidden" id="da" value="1" class="w-100 code-input" name="1" placeholder="Enter code">

                          <span class="channelCat"><?= $channel['title'] ?></span>
                        </div>
                      </div>

                      <div class="me-2">
                        <input type="checkbox" class="channel-checkbox checkB<?= $channel['id'] ?>" value="<?= $channel['id'] ?>" data-imgURL="<?= $channel['poster_url'] ?>">
                      </div>
                    </label>

                  </div>
                <?php } ?>
              </div>

            </div>
            <div class="tab-pane fade" id="radio" role="tabpanel" aria-labelledby="radio-tab">
              <?php foreach ($channels['data']['radio'] as $radio) { ?>
                <div class="channelLinstingMain w-100" data-id="<?= $radio['id'] ?>" data-title="<?= $radio['title'] ?>" data-type="Radio">
                  <label class="d-flex justify-content-between w-100 align-items-center">
                    <div class="d-flex align-items-center">
                      <div class="img_"><img src="<?= $radio['poster_url'] ?>" alt="radio"></div>
                      <div class="channelName">
                        <h4 class="mb-0"><?= $radio['title'] ?></h4>
                        <input type="hidden" id="da" value="1" class="w-100 code-input" name="1" placeholder="Enter code">

                        <span class="channelCat"><?= $radio['title'] ?></span>
                      </div>
                    </div>

                    <div class="me-2"><input type="checkbox" class="channel-checkbox checkB<?= $radio['id'] ?>" value="<?= $radio['id'] ?>" data-imgURL="<?= $radio['poster_url'] ?>"></div>
                  </label>

                </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="pb-2">
          <button class="btn btn-primary w-100 applyCodeActivee" id="channels" onclick="getChannel()"><?= $this->lang->line('submit_btn') ?></button>
        </div>

      </div>
    </div>
  </div>
</div>
<?php     $type = $_GET['type'] ?? '';
 ?>

<script>
  var channelIdsString;
  var slct_chnl = [];
  $('#selectChannelRadio').on('shown.bs.modal', function() {
    queueTrackingData('trackEvent', ['MyChannels', 'Select', 'LiveChannel&RadioPopup']);
    $('.channelLinstingMain').on('click', function() {
      var id = $(this).data('id');
      if (!slct_chnl.includes(id)) {
        slct_chnl.push(id);
        var title = $(this).data('title');
        var type = $(this).data('type');
        queueTrackingData('trackEvent', [type, 'Select', "'" + id + "/" + title + "'"]);
      }
    });
  });


  function getChannel() {
    var selectedChannels = [];
    queueTrackingData('trackEvent', ['LiveChannel', 'SelectChannel&Radio', 'Save']);
    $(".channel-checkbox:checked").each(function() {
      selectedChannels.push($(this).val());
    });
    channelIdsString = selectedChannels.join(',');
    $('#selectChannelRadio').modal('hide');
  }
  $(document).ready(function() {
    $('.f-tile').trigger('click');
    // var channelIdsString; // Declare channelIdsString variable outside event handlers

    // $("#channels").click(function() {
    //     var selectedChannels = [];
    //     $(".channel-checkbox:checked").each(function() {
    //         selectedChannels.push($(this).val());
    //     });
    //     channelIdsString = selectedChannels.join(',');
    //     // alert(channelIdsString);
    // });

    // $(document).on('click', '#proceed', function() {
    //     // Get the values of price, validity, plan_id, and id
    //     var promoCode = $("#promoInput").val();
    //    if(promoCode!=""){
    //     var promo_code=1;
    //    }
    //    else{
    //    var promo_code=0;
    //    }
    //     var price = $("input[name=price-tab-plan]:checked");
    //     var mrp = $(price).parent('.custom-radio').find('.price').val()
    //     var validity = $(price).parent('.custom-radio').find('.validity').val()
    //     var plan_id = $(price).parent('.custom-radio').find('.plan_id').val()
    //     var gst_amount = $(price).parent('.custom-radio').find('.gst_amount').val()
    //     var id = $(price).parent('.custom-radio').find('.id').val()
    //     var s_price = $(price).parent('.custom-radio').find('.s_price').val()

    //     // Send AJAX request with the values of price, validity, plan_id, and id
    //     $.ajax({
    //         url: "<?= base_url('/razorpay'); ?>",
    //         type: 'POST',
    //         data: {
    //             channels: channelIdsString,
    //             price: mrp,
    //             validity: validity,
    //             plan_id: plan_id,
    //             gst_amount:gst_amount,
    //             id : id,
    //             promo_code:promo_code,
    //             s_price:s_price
    //         },
    //         success: function(response) {
    //             console.log(response);
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });
    // });
  });

  $(document).ready(function() {
    var month = "<?= $typename ?>";
    var type = "<?= $typename ?>";
    //console.log('type', "<?= $typename ?>");
    // planTab(month);
    // alert('ss');
  });
  $(".plan_type").on('click', function() {
    let id = $(this).data('id');
    $('.plan_type').prop('disabled', false)

    $(".plan_type").removeClass('active');
    let type = $(this).val();
    $('#final_mrp').val(0);
    $('#final_gst').val(0);
    $('.couponApplied').val(0);
    $('#coupan').text("");
    $('.coupan').hide();
    $('.dddd').show();
    $("#promoInput").val('');
    $('.radio-buttonss').addClass('d-none');
    $('#' + type).removeClass('d-none');
    $(this).addClass('active');
    $(this).prop('disabled', true)
    setTimeout(() => {
      //console.log($('#' + type))
      $('#' + type).find(`.custom-radio.customRadio_${id}`).trigger('click')
    }, 100)
  });

  $('.cpn-mdl').on('click', function() {
    queueTrackingData('trackEvent', ["Subscription", "View", 'PromoCodePopup']);
    $('#promoCode').modal('show');
  });


  var loaderR = `   <label class="custom-radio placeholder-glow">        
       
        <span class="radio-btn">
          <div class="hobbies-icon"> 
            <div class="mb-1  placeholder w-100">&emsp;&emsp;&emsp;&emsp;</div>
             <div class=" placeholder w-50">&emsp;&emsp;&emsp;&emsp;</div>
          </div>
        </span>
      </label> <label class="custom-radio placeholder-glow">        
       
        <span class="radio-btn">
          <div class="hobbies-icon"> 
            <div class="mb-1  placeholder w-100">&emsp;&emsp;&emsp;&emsp;</div>
             <div class=" placeholder w-50">&emsp;&emsp;&emsp;&emsp;</div>
          </div>
        </span>
      </label> <label class="custom-radio placeholder-glow">        
       
        <span class="radio-btn">
          <div class="hobbies-icon"> 
            <div class="mb-1  placeholder w-100">&emsp;&emsp;&emsp;&emsp;</div>
             <div class=" placeholder w-50">&emsp;&emsp;&emsp;&emsp;</div>
          </div>
        </span>
      </label>`

  // Function to load plans and render radio buttons with forms
  // Function to load plans and render radio buttons with forms
  function planTabd(type) {
    $('#coupan').hide();
    $('.radio-buttonss').html(loaderR);

    $.ajax({
      url: "<?= base_url("web/dashboard/subscription_data"); ?>",
      method: "POST",
      datatype: "JSON",
      data: {
        plan: type
      },
      success: function(res) {
        var array = JSON.parse(res);
        var code = '';
        $(array).each(function(index, value) {
          var isActive = (index === 0) ? 'checked' : '';
          code += `  <label class="custom-radio" customRadio_${value.pricing.plan_id} for="IDRadio_${value.pricing.plan_id}">
                                <input type="radio" name="price-tab-plan" id="IDRadio_${value.pricing.plan_id}" ${isActive}>
                                <span class="radio-btn">
                                    <div class="hobbies-icon"> 
                                        <div class="mb-0 h5 premium_ic">${value.title.en}</div>
                                        <div class="h5 d-flex align-items-center"><span><i class="fas fa-rupee-sign pe-1"></i>${value.pricing.mrp}</span> <sub>&nbsp;${value.pricing.validity}${value.pricing.type}</sub></div>

                                        <input type="hidden" class="price" name="price" value="${value.pricing.mrp}">
                                        <input type="hidden" class="validity" name="validity" value="${value.pricing.validity}">
                                        <input type="hidden" class="plan_id" name="plan_id" value="${value.pricing.plan_id}">
                                        <input type="hidden" class="id" name="id" value="${value.pricing.id}">
                                        <input type="hidden" class="gst_amount" name="gst_amount" value="${value.pricing.gst_amount}">
                                        <input type="hidden" class="s_price" name="s_price" value="${value.pricing.s_price}">
                                        <input type="hidden" class="type" name="type" value=" ${value.pricing.type}">
                                        <input type="hidden" class="title" name="title" value="${value.title.en}">
                                    </div>
                                </span>
                            </label>
                      `;
        });

        $('.radio-buttonss').html(code);
      }
    });
  }

  // Event handler for Proceed button


  // Call planTab function to load plans initially
  $(document).ready(function() {
    var month = "<?= $typename ?>";
    //planTab(month);
  });


  var channelLimit = 0;
  const originalModalContent = $('#selectChannelRadio .modal-content').html();
  $('.add-btn').on('click', function() {
    var dataLimit = $(this).data('limit');
    channelLimit = dataLimit;
    $('#max-limit').html(dataLimit);
    channelIdsString = '';
  });


  function matomoEventsTracker(user, type, title, action = 6) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url('/web/Home/matomo_hit') ?>',
      dataType: "json",
      data: {
        user: user,
        types: type,
        type: action,
        title: title
      },
      success: function(data) {
        if (data.status == 1) {

        }

      }

    });
  }

  // Event handler for Proceed button
  $(document).on('click', '#proceed', function() {
    var chanel_id = channelIdsString;
    //console.log('chanel_id',chanel_id);
    //return false;
    var pid = $('.plan_type.active').val();
    // Find the nearest form and submit it
    var price = $("#" + pid + " input[name=price-tab-plan]:checked");
    var amount = $(price).parent('.custom-radio').find('.price').val();
    var plan_id = $(price).parent('.custom-radio').find('.plan_id').val();
    var id = $(price).parent('.custom-radio').find('.id').val();
    var validity = $(price).parent('.custom-radio').find('.validity').val();
    var gst_amount = $(price).parent('.custom-radio').find('.gst_amount').val();
    var s_price = $(price).parent('.custom-radio').find('.s_price').val();
    var type = $(price).parent('.custom-radio').find('.type').val();
    var title = $(price).parent('.custom-radio').find('.title').val();

    queueTrackingDataWithDelay('trackEvent', ["Page", "View","CurrentPlanDetail(" + title + "/" + amount +"/" +type + ")"],20);
    queueTrackingDataWithDelay('trackEvent', ["Subscription", "Select", "Plan(" + title + "/" + type +"/" +amount + ")"],40);
    queueTrackingDataWithDelay('trackEvent', ["Subscription", "Select", "Duration(" +type + ")"],60);
    queueTrackingDataWithDelay('trackEvent', ["Subscription", "PaymentInitialize",amount ],80);
    queueTrackingDataWithDelay('trackEvent', ["Subscription", "PaymentPopup" ],100);


        // matomo_hit("Subscription", "Select", "Duration(" . @$_POST['plan_type'] . ")");
        // matomo_hit("Subscription", "PaymentInitialize", $_POST['s_price'] ?? 0);
    var final_mrp = $('#final_mrp').val();
    var final_gst = $('#final_gst').val();
    $('.channel_id_checkout').val(chanel_id);
    $('.plan_title').val(title);
    $('.plan_type').val(type);
    $('.plan_id_checkout').val(plan_id);
    $('.id_checkout').val(id);
    $('.validity_checkout').val(validity);
    $('.gst_amount_checkout').val(gst_amount);
    if (final_mrp > 0) {
      $('.s_price_checkout').val(final_mrp);
      $('.gst_amount_checkout').val(final_gst);
    } else {
      $('.s_price_checkout').val(s_price);
      $('.gst_amount_checkout').val(gst_amount);
    }

    $('.price_checkout').val(amount);

    $('.custom-radio-form').submit();
  });

  // Call planTab function to load plans initially
  $(document).ready(function() {
    var month = "<?= $typename ?>";
    //planTab(month);
  });


  $(document).ready(function() {

    $(".applyCodeActive").click(function() {
      var price = $("input[name=price-tab-plan]:checked");
      var plan_id = $(price).parent('.custom-radio').find('.plan_id').val();
      var id = $(price).parent('.custom-radio').find('.id').val();

      var promoCode = $("#promoInput").val().toUpperCase();

      $.ajax({
        url: "<?= base_url('web/subscription/apply_code') ?>",
        method: "POST", // Method type
        data: {
          promoCode: promoCode,
          plan_id: plan_id,
          id: id

        },
        success: function(response) {
          res = JSON.parse(response);
          if (res.status == true) {
            $('<input>').attr({
                type: 'hidden',
                name: 'couponId',  // Set the name attribute (optional)
                value: res.data.coupon_id      // Set the value attribute
            }).appendTo('.custom-radio-form');
            $('<input>').attr({
                type: 'hidden',
                name: 'coupon_applied_final_price',  // Set the name attribute (optional)
                value: res.data.final_mrp      // Set the value attribute
            }).appendTo('.custom-radio-form');
            toastr.success(res['message'], '<?= $this->lang->line('success') ?>');
            queueTrackingData('trackEvent', ['Promocode', 'Apply','PromoCode' + ' ' +promoCode]);

            $('#coupan').show();
            var discount = res.data.discount;
            var mrp = res.data.mrp;
            var final_mrp = res.data.final_mrp;
            $('#final_mrp').val(final_mrp);
            $('#final_gst').val(res.data.final_gst_amount);
            $('.couponApplied').val(res.data.coupon_id);
            $('#promoCode').modal('hide');
            $('#coupan').html(" You save Rs " + discount + " from " + promoCode + '<button type="button" class="btn promo_remove ms-1 remove"><?= $this->lang->line('remove') ?></button>');
            $('.error_name').html('');
            $('.dddd').hide();
          } else {
            toastr.error(res['message'], '<?= $this->lang->line('error') ?>');
            // $('.error_name').html("You have entered invalid coupan code").css('color', 'red');
            $('#coupan').hide();
            $("#promoInput").val('');
            $("#applyButton").prop('disabled', true);

          }


        },
        error: function(xhr, status, error) {

        }
      });
    });
  });

  $(document).ready(function() {
    $('#promoInput').on('input', function() {
      var data = $(this).val();
      if (data == '') {
        $("#applyButton").prop('disabled', true);
      } else {
        $('.error_name').html('');
        $("#applyButton").prop('disabled', false);
      }
    });
  });



  $(document).on('click', '.removeList', function() {
    var current = $(this).parents('.added-channel').attr('data-id')

    $('input.checkB' + current).prop('checked', false);
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
          <img src="${url}" alt="urldeatils">
         <span class="removeList"><i class="fas fa-times"></i></span>
      </div>`)
    } else {
      $('#shubham' + current).remove()
      $('.textRadioChannel .cls').text(len)

    }
  });
  var preBtn = '';
  $(document).on('ready','change', '.radioInput', function() {

    let id = $(this).data('id');
    $('.dd-plan').removeClass('active');
    $('#promoInput').val("");
    if (preBtn != id) {
      $('.elem_' + id).addClass('active');
      $('.add-btn').addClass('disable');
      $('.btn_' + id).removeClass('disable');
      $('#selectChannelRadio .modal-content').html(originalModalContent);
      $('#final_mrp').val(0);
      $('#final_gst').val(0);
      $('.couponApplied').val(0);
      $('#coupan').text("");
      $('.coupan').hide();
      $('.dddd').show();
      $('.dd-plan.ddplan' + id).addClass('active');
    } else {
      $('.elem_' + id).addClass('active');
      $(`.dd-plan.ddplan${id}`).addClass('active');
    }

    preBtn = id;

  })

    $(document).on('change', '.radioInput', function() {

    let id = $(this).data('id');
    $('.dd-plan').removeClass('active');
    $('#promoInput').val("");
    if (preBtn != id) {
      $('.elem_' + id).addClass('active');
      $('.add-btn').addClass('disable');
      $('.btn_' + id).removeClass('disable');
      $('.dd-plan.ddplan' + id).addClass('active');
    } else {
      $('.elem_' + id).addClass('active');
      $(`.dd-plan.ddplan${id}`).addClass('active');
    }

  })

  $(document).on('click', '.closecross', function() {
    $('.error_name').html('');
    $("#promoInput").val('');
  });

  $(document).on('click', '.remove', function() {
    toastr.success('<?= $this->lang->line('remove_coupan') ?>', '<?= $this->lang->line('success') ?>');
    $('#final_mrp').val(0);
    $('#final_gst').val(0);
    $('.couponApplied').val(0);
    $('#coupan').text("");
    $('.coupan').hide();
    $('.dddd').show();
    $("#promoInput").val('');
    $('.custom-radio-form input[name="couponId"]').remove();
    $('.custom-radio-form input[name="coupon_applied_final_price"]').remove();
  });
</script>

<?php 
if ($logged_in == false) { ?>

  <script>
    $(document).on('click', '#proceedToLogin', function() {
      redirect_url = "<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>";
      //alert(redirect_url);
      $.ajax({
        url: "<?= base_url('web/login_register/set_session') ?>",
        type: "post",
        data: {
          url: redirect_url
        },
        success: function(res) {
          window.location.href = "<?= base_url('user-login') ?>";

        }
      })
    });
  </script>

<?php } ?>

<script>
 
 $(document).ready(function() {
  $('#promoCode').on('show.bs.modal', function() { 
    $('#promoInput').val('').focus();
  });
});
$(window).on('load', function() {
  var type = "<?=$type ?>";
    queueTrackingData('trackEvent', ['Page', 'View', 'Subscription']);
        if (type == 'details') {
          queueTrackingData('trackEvent', ["ContentDetailPage", "Select", "SubscribeToWatchNow"]);
        }
        if (type == 'myaccount') {
          queueTrackingData('trackEvent', ["MyAccount", "Select", "Subscription"]);
        }
  })

  function queueTrackingDataWithDelay(method, params, delay) {
    setTimeout(() => {
        queueTrackingData(method, params);
    }, delay);
}

$(document).ready(function() {
    $('#promoCode').on('shown.bs.modal', function () {
        $(".code-input").focus();
    });
});
</script>

<!-- <script>
        document.getElementById('proceed').addEventListener('click', function() {
          const planType = document.querySelector('input[name="plan_type"]').value;
          const planTitle = document.querySelector('input[name="plan_title"]').value;
          // const form = document.getElementById('myForm');
          // const formData = new FormData(form);
          // const data = {};
          // formData.forEach((value, key) => {
          // data[key] = value;
          // }); 
        //   matomo_hit("Subscription", "Select", "Plan(" . @$_POST['plan_title'] . "/" . @$_POST['plan_type'] . "/" . @$_POST['price'] . ")");
        // matomo_hit("Subscription", "Select", "Duration(" . @$_POST['plan_type'] . ")");
        // matomo_hit("Subscription", "PaymentInitialize", $_POST['s_price'] ?? 0);
            document.getElementById('myForm').submit();
        });
    </script> -->

