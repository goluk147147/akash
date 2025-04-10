<style>
  .coupoon_code_text {
      text-transform: uppercase;
    }
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
    color: var(--pbg);
    font-size: 15px;
    padding-left: 0;
  }

  .applyCodeActive:disabled {
    background: #414040;
    cursor: default;
  }
.plan-name-tab {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  padding: 4px 0;
  /* background: #000; */
}

.bg-black {
  background: rgba(0,0,55,1) !important;
}

.price-color {
  color: rgba(98, 93, 245, 1);
  font-size: 25px;
  font-weight: 600;
}

.mWeb {
  overflow-x: auto;
  width: 100%;
  white-space: nowrap;
  display: block;
}

.mWeb::-webkit-scrollbar,
.plan-name-tab::-webkit-scrollbar {
  width: 6px;
  height: 2px;
}

.plan-name-tab label {
  background: rgba(14,22,83,1);
  border: none;
  color: #8f8f8f;
  border-radius: 6px;
  padding: 4px 10px;
  margin: 0 2px;
  color: #fff;
  font-size: 14px;
   font-family: 'AnekLatin-SemiBold' !important;
    font-weight:600;
}

.plan-name-tab label.active {
  background: var(--pbg);
  color: #fff;
}


.mWeb button {
  background: rgba(14,22,83,1);
  border: none;
  color: #8f8f8f;
  padding: 4px 17px;
  margin: 0 -2px;
}

.mWeb button:nth-child(1) {
  border-radius: 20px 0 0 20px;
}

.mWeb button:last-child {
  border-radius: 0 20px 20px 0;
}

.mWeb button.active {
  background: var(--pbg);
  color: var(--white);
}

.text-subscription-head-mweb {
  color: #dbdbdb;
  font-size: 24px;
}

.buyNow {
  position: fixed;
  bottom: 0px;
  width: 100%;
  padding: 10px 10px;
  z-index:999999;
}

.f-tile{
  background:var(--pbg) !important;
  color:var(--white) !important;
}
.main_type_button{
   position: fixed;
    bottom: 116px;
    z-index: 1;
    width: 93%;
    
}


.modal.fade .modal-dialog-custom {
    -webkit-transform: translate(0, 200px);
    transform: translate(0, 200px);
}

.modal.show .modal-dialog-custom {
    -webkit-transform: none !important;
    transform: none !important;
}
.text-subscription-head {
    color: #dbdbdb;
    font-size: 22px;
    line-height: 30px;
}
 .termCondition{
    height:100%;
  }
  /* #main-content{
    background: #000;
  } */
  .single_plan_radius{
    border-radius:20px !important;
  }
  .blurBG{
    height:inherit !important;
  }
  .border-botoom-dot{
    font-size:11px;
  }
  .blurBG{
    background:rgba(14,22,83,1) !important;
  }

    
  
</style>


<!--main content start-->
<section id="main-content">

  <div class="wrapper site-min-height container-fluid  p-0">
    <div class="row m-0">
      <div class="col-md-12 ">


        <section class="termCondition" style="margin-bottom: 43vh">

          <div class="term-image pt-5">
          <div class="back-btn pe-4 mb-3">
                  <a onclick="history.go(-1)"
                    ><i class="fas fa-arrow-left"></i
                  ></a>
                </div>

                <div class="row mt-3">
                  <div class="col-lg-12">
                    <h5 class="text-subscription-head mb-4">
                      
                      <?php if($handled_default_case == false){ ?>
                      <?= $this->lang->line('subscription_heading')." ".strtolower($publisher_name) ?> 
                      <?php } else { ?>
                        <?= $this->lang->line('Subscribewatch') ?> 
                      <?php } ?>

                    </h5>
                  </div>
                </div>


                <div class = "active_plan_info d-none">
                <?php
                                $schemPlans = [];
                                $totalPlans = [];
                                $i = 0;
                                foreach ($subscriptions['data']['plans'] as $plan_data) {
                                   $planids = []; 
                                    $planids[] = $plan_data['id'];
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

                                    <button class="d-none <?php if ($i == 0) { echo 'active';
                                                    } ?> plan_type" data-id="<?= $planids[0] ?? '' ?>" id="nav-year-tab" value="<?= str_replace(['@', '#', '!', '*','-','+',' '], '_', $pla['type']) ?>" type="button"><?= $pla['type'] ?></button>
                                <?php
                                    if ($i == 0) {
                                      $typename = $pla['type'];
                                    }
                                    $i++;
                                  }
                                }

                                ?>
                  </div>
                    
                            <!-- <div class="radio-buttons"> -->
                            <?php $k = 0; ?>
                            <?php foreach ($totalPlans as $key => $plan) { ?>
                              
                              <div id="<?= str_replace(['@', '#', '!', '*','-','+',' '], '_', $key) ?>" class="  plan-name-tab <?= ($schemPlans[0] != $key) ? 'd-none' : '' ?>">
                                <?php foreach ($plan as $skey => $splan) { ?>
                                    <label   class="custom-radio plan_type <?= ($k == 0) ? 'f-tile' : '' ?> customRadio_<?= $splan['id'] ?>" data-id="<?= $splan['id'] ?>" data-title="<?= str_replace(['@', '#', '!', '*','-','+',' '], '_', $splan['title']['en']) ?>" for="IDRadio_<?= $splan['pricing']['id'] ?>">
                                    <?= $splan['title']['en'] ?>
                  
                                    <input type="radio" name="price-tab-plan" id="IDRadio_<?= $splan['pricing']['id'] ?>" class="d-none">
                                  
                                       
                                         
                                    
                                        <input type="hidden" class="price" name="price" value="<?= $splan['pricing']['mrp'] ?>">
                                        <input type="hidden" class="validity" name="validity" value="<?= $splan['pricing']['validity'] ?>">
                                        <input type="hidden" class="plan_id" name="plan_id" value="<?= $splan['pricing']['plan_id'] ?>">
                                        <input type="hidden" class="id" name="id" value="<?= $splan['pricing']['id'] ?>">
                                        <input type="hidden" class="gst_amount" name="gst_amount" value="<?= $splan['pricing']['gst_amount'] ?>">
                                        <input type="hidden" class="s_price" name="s_price" value="<?= $splan['pricing']['s_price'] ?>">
                                        <input type="hidden" class="type" name="type" value="<?= ($splan['pricing']['type']) ?? '' ?>">
                                        <input type="hidden" class="title" name="title" value="<?= $splan['title']['en'] ?? '' ?>">
                                   
                                  </label>
                                  <?php $k++; ?>
                                <?php } ?>
                              </div>
                            <?php } ?>

                
           <?php $j = 0; ?>     
        <?php  foreach ($subscriptions['data']['plans'] as $key => $value) {?>
          <div class="py-3 bg-black hide-plan-div <?= ($j == 0) ? '' : 'd-none' ?>" id="<?= str_replace(['@', '#', '!', '*','-','+',' '], '_', $value['title']['en']) ?>">
            
                <?php  $subscriptions_plan_class = ($publisher_id != 0)?"d-none":""; ?>
                  <div class="plan-card">
                    <div class="row">
                      <?php foreach ($value['features'] as $key =>  $fvalue) { ?>
                      <div class="d-flex align-items-center col-lg-12 <?= $subscriptions_plan_class; ?>">
                        <span class="me-2 checkicon"><i class="fas fa-check"></i></span>
                        <?php  
                          $vq_string = false;
                          $search1 = "P)"; $search2 = "p)";
                          if (stripos($fvalue['value'], $search1) !== false || stripos($fvalue['value'], $search2) !== false) {
                              $vq_string = true;
                          } 

                          if ($vq_string == true) { 
                           $updated_value = preg_replace('/\s*\(.*$/', '', $fvalue['value']); 
                          ?>
                          <span><?=$fvalue['title']?>: <?=$updated_value;?></span>
                          <?php } else {

                          if(stripos($fvalue['title'], " ads") !== false && $fvalue['value'] == 1){
                            //$fvalue['value'] = "Yes";
                            $fvalue['value'] = '<img src="' . base_url('assets/images/tick.svg') . '" alt="tick">';
                          } else if(stripos($fvalue['title'], " ads") !== false && $fvalue['value'] == 0){
                            //$fvalue['value'] = "No";
                            $fvalue['value'] = '<img src="' . base_url('assets/images/cross.svg') . '" alt="cross" height="13px">';
                          } else if(strtolower($fvalue['value']) == "true"){
                            //$fvalue['value'] = "Yes";
                            $fvalue['value'] = '<img src="' . base_url('assets/images/tick.svg') . '" alt="tick">';
                          } else if(strtolower($fvalue['value']) == "false"){
                            //$fvalue['value'] = "No";
                            $fvalue['value'] = '<img src="' . base_url('assets/images/cross.svg') . '" alt="cross" height="13px">';
                          }
                          
                          ?>
                          
                          <span><?=$fvalue['title']?>: <?=$fvalue['value']?></span>
                        <?php }  ?>
                                            
                        
                        <?php 
                        foreach ($fvalue as $item) {
                        if (strpos($item, '{{') !== false) {
                           $pattern = '/\{\{(\d+)\}\}/';
                                        if (preg_match($pattern, $item, $matches)) {
                                          $number = $matches[1];
                                           
                                        } else {
                                          $number = $values;

                                        }?>
                           <span class="text-primary cursor-pointer add-btn  btn_<?= $planids[$k] ?? '' ?>" data-bs-target="#selectChannelRadio" data-bs-toggle="modal" data-limit="<?= $number ?>">+<?= $this->lang->line('add') ?></span>
                            
                       <?php } 
                    }
                        ?>
                      </div>
                    <?php }?>
                      
                    </div>
                    <div class="clearfixBorder my-2 <?= $subscriptions_plan_class; ?>"></div>
                    <?php $plan_price_class = ($total_plans == 1)?"justify-content-center":""; ?>
                  <div class="d-flex align-items-center <?=$plan_price_class;?>">
                      <span class="price-color d-flex align-items-center"
                        ><svg
                          width="11"
                          height="16"
                          viewBox="0 0 11 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M6.38365 15.9724C6.12035 15.7046 5.85281 15.4408 5.60224 15.1848C3.8313 13.2158 2.04337 11.2941 0.16625 9.42752C0.110437 9.3763 0.0668366 9.31478 0.0383043 9.24694C0.00977197 9.1791 -0.00306197 9.10645 0.000615387 9.03372C0.000615387 8.60448 0.000615387 8.17129 0.000615387 7.73811C0.000615387 7.43095 0.153487 7.301 0.48899 7.29706C1.16424 7.29706 1.8395 7.29707 2.51051 7.26163C3.32287 7.24252 4.11078 6.9999 4.7741 6.5646C5.1945 6.27679 5.48741 5.8568 5.59799 5.38321H0.552704C0.480572 5.38722 0.408241 5.38722 0.336109 5.38321C0.253279 5.37854 0.175159 5.34592 0.116482 5.29151C0.0578042 5.2371 0.0226271 5.16466 0.0175935 5.08786C0.0175935 4.66256 0.0175935 4.23726 0.0175935 3.80802C0.0217022 3.73196 0.0561306 3.66004 0.114201 3.60619C0.172271 3.55234 0.249837 3.52042 0.331858 3.51661C0.409588 3.51073 0.487701 3.51073 0.565431 3.51661H5.41538L5.44933 3.47724C5.33601 3.32817 5.2141 3.18487 5.08411 3.04799C4.68706 2.68103 4.1706 2.44573 3.61471 2.37853C3.11285 2.30449 2.60648 2.25979 2.09857 2.24465C1.56771 2.22496 1.04108 2.24465 0.51447 2.24465C0.153486 2.24465 0.00486641 2.10288 0.00486641 1.76815C0.00486641 1.32972 0.00486641 0.892597 0.00486641 0.456795C0.00486641 0.118129 0.132265 0 0.501743 0H10.4904C10.8514 0 10.9873 0.126009 10.9915 0.460737V1.36647C10.9915 1.76026 10.8684 1.89022 10.4352 1.89022H7.75541C7.86035 2.02871 7.95539 2.1734 8.03994 2.32339C8.19566 2.66731 8.33722 3.01386 8.46463 3.36302C8.5071 3.48116 8.55805 3.52449 8.69395 3.52449C9.28851 3.52449 9.88309 3.52449 10.4819 3.52449C10.8811 3.52449 11 3.63475 11 4.00886C11 4.38296 11 4.65469 11 4.97761C11 5.30052 10.8641 5.41078 10.5286 5.41078H8.7067C8.59629 5.41078 8.54532 5.41077 8.51984 5.5486C8.37407 6.32711 8.00141 7.05384 7.44223 7.65009C6.88305 8.24634 6.15864 8.6894 5.34741 8.93133C4.79532 9.12429 4.20925 9.22273 3.64866 9.3645L3.76334 9.48657C5.65744 11.3847 7.42416 13.3773 9.19085 15.3739C9.4032 15.6101 9.35222 15.8228 9.04645 16L6.38365 15.9724Z"
                            fill="rgba(236, 0, 140, 1)"
                          />
                        </svg>
                      </span
                      >
                    
                            <!-- <input type="hidden" class="price_shub" name="shub" value="<?//= htmlspecialchars(json_encode($pricee)); ?>"> -->

                        <span class="price_view_class_<?=$value['pricing'][0]['plan_id'] ?>"><?=$value['pricing'][0]['s_price']+$value['pricing'][0]['gst_amount'] ?></span>
                        
                      
                   

                    </div> 
                  </div>
                  
                <div class="main-container mt-3 main_type_button mstd_buton">
                
                  <div class=" d-f lex justify-content-center align-items-center bg-black">
                    <div class="mWeb text-center">
                    <?php $single_plan_radius = ($total_plans == 1)?"single_plan_radius":""; ?>
                    <?php $i=0; foreach ($value['pricing'] as $pricee) { ?>
                         <button class="<?=$single_plan_radius; ?> <?php if ($i == 0) {  echo 'active';  } ?> plan_type_myq " data-price="<?= ($pricee['s_price'] + $pricee['gst_amount']) ?>" data-plan_id="<?= $pricee['plan_id'] ?>"
                         data-pricing_id="<?= $pricee['id']?>" data-gst_amount="<?= $pricee['gst_amount']?>"
                         data-s_price="<?= $pricee['s_price']?>" 
                         data-validity="<?= $pricee['validity']?>" data-mrp="<?= $pricee['mrp']?>" id="nav-year-tab" value="<?= str_replace(['@', '#', '!', '*','-','+',' '], '_', $pricee['type']) ?>" type="button"><?= $pricee['type'] ?></button>
                      <?php $i++; }?>
                </div>
                </div>
                </div>
                </div>


                 <?php 
                 $j++;
                }?>
          </div>
          <!--  -->
        </section>
      </div>

    </div>
        </div>
</section>

<div class="buyNow bg-black ">
      <div class="row">
        <div class="col-md-12 col-sm-12 m-auto">
          <div class="main-container mt-3 d-none">
            <div class="my-4 d-f lex justify-content-center align-items-center">
              <div class="mWeb text-center">
                   <?php
                      $schemPlans = [];
                      $totalPlans = [];
                                $i = 0;
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
                        
                          <button class="<?php if ($i == 0) {  echo 'active';  } ?> plan_type_myq " data-id="<?= $planids[0] ?? '' ?>" id="nav-year-tab" value="<?= str_replace(['@', '#', '!', '*','-','+',' '], '_', $pla['type']) ?>" type="button"><?= $pla['type'] ?></button>
                                <?php if ($i == 0) {
                                      $typename = $pla['type'];
                                     }
                                    $i++;
                                  }
                                }

                                ?>
                 
 
              </div>
            </div>
          </div>

          <div class="main-container mt-3 ">
            <div class="promo-flex mt-2">
               <div class="text-center cpn-mdl" style="cursor:pointer">
                 <img src="<?= base_url('assets/images/coupon.svg') ?>" class="coupon-img pe-2">
                 <button type="button" class="btn border-botoom-dot dddd">
                                  <?= $this->lang->line('have_promo') ?>
                  </button>
                </div>
              <div clas="d-flex align-items-center" id="coupan"></div>
            </div>
            <div
              class="w-100 d-flex justify-content-between align-items-center"
            >
              <button class="btn w-100 ptp mt-3" id="proceed">
                 Pay <span class= "proceed"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="modal fade bd-example-modal-sm " id="promoCode" tabindex="-1" role="dialog" aria-labelledby="promoCode" aria-hidden="true">
  <div class="modal-dialog modal_sm modal-dialog-custom" style="bottom: -10px; position: fixed;">
    <div class="modal-content mc-content" style="width:100vw">
      <div class="modal-body p-3 ">

        <div class="d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #292929;padding: 4px 0">
          <span class="f-16s"><?= $this->lang->line('promo_code') ?></span>
          <span class="Crossmodal cross_modal_dt closecross" data-bs-dismiss="modal"> <img src="<?= base_url('assets/images/sunscription_close.svg'); ?>" class="subscription_close_img" alt="subscription_close"></span>
        </div>

        <div class="mb-4 mt-2">
          <label for="promoInput" class="f-15s"><?= $this->lang->line('enter_promo_code') ?></label>
          <input type="text" id="promoInput" value="" class="w-100 code-input coupoon_code_text" name="promo" placeholder="<?= $this->lang->line('enter_promo_code') ?>">
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
<form class="custom-radio-form" method="post" action="<?= base_url('razorpost'); ?>">
    <input type="hidden" class="price_checkout" id="price_checkout" name="price" value="<?=$subscriptions['data']['plans'][0]['pricing'][0]['mrp']?>">
    <input type="hidden" class="validity_checkout" id="validity" name="validity" value="<?=$subscriptions['data']['plans'][0]['pricing'][0]['validity']?>">
    <input type="hidden" class="plan_id_checkout" id="plan_id" name="plan_id" value="<?=$subscriptions['data']['plans'][0]['pricing'][0]['plan_id']?>">
    <input type="hidden" class="channel_id_checkout" id="channel_id" name="channel_id" value="">
    <input type="hidden" class="id_checkout" id="p_id" name="id" value="<?=$subscriptions['data']['plans'][0]['pricing'][0]['id']?>">
    <input type="hidden" class="gst_amount_checkout" id="gst_amount" name="gst_amount" value="<?=$subscriptions['data']['plans'][0]['pricing'][0]['gst_amount']?>">
    <input type="hidden" class="s_price_checkout" id="s_price" name="s_price" value="<?=$subscriptions['data']['plans'][0]['pricing'][0]['s_price']?>">
    <input type="hidden" class="couponApplied" id="coupan_applied" name="couponApplied" value="0">
    <input type="hidden" class="plan_title" name="plan_title" value="0">
    <input type="hidden" class="plan_typeValue" name="plan_type" value="0">
    <input type="hidden" class="referer" name="referer" value="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
</form>

<div class="modal fade bd-example-modal-sm " id="selectChannelRadio" tabindex="-1" role="dialog" aria-labelledby="selectChannelRadio" aria-hidden="true">
 <div class="modal-dialog modal-dialog-custom" style="bottom: -10px; position: fixed;">
    <div class="modal-content mc-content" style="    width: 100vw;">
      <div class="modal-body p-3 ">

        <div class="d-flex align-items-center justify-content-between" style="padding: 4px 0">
          <h3 class="mb-0 f-16s"><span><?= $this->lang->line('select_live_channel_radio') ?></span></h3>
          <span class="Crossmodal cross_modal_dt" data-bs-dismiss="modal"> <img src="<?= base_url('assets/images/sunscription_close.svg'); ?>" class="subscription_close_img" alt="subscription_close"></span>
        </div>

        <div class="mb-4 mt-2">
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
            <h6 class=" textRadioChannel mb-3">Added <span class="cls">0</span> of <span id="max-limit">5</span> Live Channels </h6>
            <div class="tab-pane fade show active" id="channel" role="tabpanel" aria-labelledby="channel-tab">
              <div class="selectchannelRadio mt-2 mb-2">

                <?php foreach ($channels['data']['channels'] as $channel) { ?>
                  <div class="channelLinstingMain w-100">
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
                <div class="channelLinstingMain w-100">
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
          <button class="btn btn-primary w-100" id="channels" onclick="getChannel()"><?= $this->lang->line('submit_btn') ?></button>
        </div>

      </div>
    </div>
  </div>
</div>
</body>

</html>
<script>

  var channelIdsString; // Declare channelIdsString variable outside event handlers

  function getChannel() {
    var selectedChannels = [];
    $(".channel-checkbox:checked").each(function() {
      selectedChannels.push($(this).val());
    });
    channelIdsString = selectedChannels.join(',');

    $('#selectChannelRadio').modal('hide');
  }
  // $(document).ready(function() {
  //   $('.f-tile').trigger('click');
   
  // });


  $(document).ready(function() {
    var month = "<?= $typename ?>";
    var type = "<?= $typename ?>";
    //console.log('type', "<?= $typename ?>");
     
  });

  $(".plan_type_myq").on('click', function() {
    let id = $(this).data('id');

    $('.plan_type_myq').prop('disabled', false)
    //$('.plan-name-tab ').addClass('d-none');
    $(".plan_type_myq").removeClass('active');
    let type = $(this).val();
    $('#final_mrp').val(0);
    $('#final_gst').val(0);
    $('.couponApplied').val(0);
    $('#coupan').text("");
    $('.coupan').hide();
    $('.dddd').show();
    $("#promoInput").val('');
     $('.radio-buttons').addClass('d-none');
   
    //$('#' + type).removeClass('d-none');
    $(this).addClass('active');
    $(this).prop('disabled', true)
   var price =$(this).attr('data-price');
   var plan_id =$(this).attr('data-plan_id');
   $('.price_view_class_'+plan_id).html(price);
    // var plan_id = $(this).attr('data-plan_id');
    // alert(plan_id);
    var pricing_id = $(this).attr('data-pricing_id');
    var gst_amount = $(this).attr('data-gst_amount');
    var validity = $(this).attr('data-validity');
    var mrp = $(this).attr('data-mrp');
    var s_price = $(this).attr('data-s_price');
    $('#price_checkout').val(price);
    $('#s_price').val(s_price);
    $('#gst_amount').val(gst_amount);
    $('#validity').val(validity);
    $('#plan_id').val(plan_id);
    $('#p_id').val(pricing_id);

   
  });


  $('.cpn-mdl').on('click', function(){
    matomoEventsTracker('Subscription', 'View', 'PromoCodePopup', 6);
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
    $('.radio-buttons').html(loaderR);

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
                                        <div class="h5 d-flex align-items-center"><span><i class="fa-solid fa-indian-rupee-sign"></i>${value.pricing.mrp}</span> <sub>&nbsp;${value.pricing.validity}${value.pricing.type}</sub></div>

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

        $('.radio-buttons').html(code);
      }
    });
  }

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


  function matomoEventsTracker(user, type, title, action=6 ) {
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
    var mrp= $('#price_checkout').val();
    var s_price = $('#s_price').val();
    var gst_amount = $('#gst_amount').val();
    var validity = $('#validity').val();
    var p_id= $('#p_id').val();
    var id = $('#plan_id').val();
    // var plan_id= $('#price_checkout').val();
     var chanel_id = channelIdsString;
    var final_mrp = $('#final_mrp').val();
    var final_gst = $('#final_gst').val();
    $('#channel_id').val(chanel_id);
    // $('.plan_title').val(title);
    // $('.plan_typeValue').val(type);
    $('#plan_id').val(id);
    $('#p_id').val(p_id);
    $('#validity').val(validity);
    $('#gst_amount').val(gst_amount);
    if (final_mrp > 0) {
      $('#s_price').val(final_mrp);
      $('#gst_amount').val(final_gst);
    } else {
      $('#s_price').val(s_price);
      $('#gst_amount').val(gst_amount);
    }

    $('#price_checkout').val(mrp);

    $('.custom-radio-form').submit();
  });


  $(document).ready(function() {


    $(".applyCodeActive").click(function() {
      //var price = $("input[name=price-tab-plan]:checked");

      var id= $('#p_id').val();
      var plan_id = $('#plan_id').val();


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
            toastr.success(res['message'], 'Success');
            $('#coupan').show();
            var discount = res.data.discount;
            var mrp = res.data.mrp;
            var ggg = res.data.final_gst_amount;
            
            var final_mrp = res.data.final_mrp;
            $('#final_mrp').val(final_mrp);
            $(".proceed").text(' ₹ ' + (final_mrp + ggg).toFixed(2));
            $('#final_gst').val(ggg);
            $('.couponApplied').val(res.data.coupon_id);
            $('#promoCode').modal('hide');
            $('#coupan').html(" You save Rs " + discount + " from " + promoCode + '<button type="button" class="btn promo_remove ms-1 remove">Remove</button>');
            $('.error_name').html('');
            $('.dddd').hide();
          } else {
            toastr.error(res['message'], 'Error');
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
      var data = $(this).val().toUpperCase();
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
  $(document).on('change', '.radioInput', function() {

    let id = $(this).data('id');
    $('.dd-plan').removeClass('active');

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
    $(".proceed").text('');
    $('.custom-radio-form input[name="couponId"]').remove();
    $('.custom-radio-form input[name="coupon_applied_final_price"]').remove();
  });

   $('.custom-radio.plan_type').on('click', function() {

     var showDiv = $(this).data('title');
     var id = $(this).data('id');
      $('.hide-plan-div').addClass('d-none');
      //alert('.hide-plan-div#' + showDiv);
      $('.hide-plan-div#' + showDiv).removeClass('d-none');
      $(".custom-radio").removeClass('f-tile');
      $(this).addClass('f-tile');
      $(this).prop('disabled', true);
      setTimeout(() =>{
       
        $('.mWeb button.plan_type_myq:first-child').trigger('click').addClass('active')

        var pID2 = $('#'+showDiv).find('.mWeb button.plan_type_myq.active:first-child').attr('data-price')
        var pID3 = $('#'+showDiv).find('.mWeb button.plan_type_myq.active:first-child').attr('data-plan_id')
        var pI4 = $('#'+showDiv).find('.mWeb button.plan_type_myq.active:first-child').attr('data-pricing_id')
        var pId5 = $('#'+showDiv).find('.mWeb button.plan_type_myq.active:first-child').attr('data-gst_amount')
        var pI6 = $('#'+showDiv).find('.mWeb button.plan_type_myq.active:first-child').attr('data-s_price')
        var pId7 = $('#'+showDiv).find('.mWeb button.plan_type_myq.active:first-child').attr('data-mrp')
        var pID8 = $('#'+showDiv).find('.mWeb button.plan_type_myq.active:first-child').attr('data-validity')

        pID2 =  parseInt(pID2)
        pId5 =  parseInt(pId5)

        $('#price_checkout').val(pID2+pId5);
        $('#s_price').val(pI6);
        $('#gst_amount').val(pId5);
        $('#validity').val(pID8);
        $('#plan_id').val(pID3);
        $('#p_id').val(pI4);

      },250)
  });

  $(window).on('load', function() {
  var type = "<?=$type??'' ?>";
    queueTrackingData('trackEvent', ['Page', 'View', 'Subscription']);
        if (type == 'details') {
          queueTrackingData('trackEvent', ["ContentDetailPage", "Select", "SubscribeToWatchNow"]);
        }
        if (type == 'myaccount') {
          queueTrackingData('trackEvent', ["MyAccount", "Select", "Subscription"]);
        }
  })
</script>
