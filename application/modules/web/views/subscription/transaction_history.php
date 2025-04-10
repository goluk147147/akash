  <script type="text/javascript">
    var base_url = "https://sandbox.pb-online.co.in/";
  </script>

  <style>
    .pb_back {
      font-size: 18px;
    }

    .positionab h5 {
      font-size: inherit !important;
    }
    .no_dt_found{
      min-height:60vh !important;
    }
  </style>


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
                    <a onclick="history.go(-1)" class="d-flex align-items-center pb_back"><i class="fa fa-chevron-left text-white" aria-hidden="true"></i>
                      <h5 class="defaultColr mb-0 ms-4 text-white"><?= $this->lang->line('payment_details') ?></h5>
                    </a>
                  </div>
                </div>
              </div>
              <?php 
              $active_subs_tab = "d-none"; $active_subs_data = "d-none"; $active_rent_tab = "d-none"; $active_rent_data = "d-none";
              if($subs_transaction_exists == true){
                $active_subs_tab = "active";
                $active_subs_data = "show active";
              } 
              if($rent_transaction_exists == true) {
                $active_rent_tab = ($subs_transaction_exists == false)?"active":"";
                $active_rent_data = ($subs_transaction_exists == false)?"show active":"show";
              }
              $show_payment_details = ""; 
              if($subs_transaction_exists == false && $rent_transaction_exists == false){
                $show_payment_details = "d-none"; 
              }
              
              ?>
              <div class="row m-0 my-5 <?=$show_payment_details;?>">
                <div class="col-md-12">
                  <div class="episodes_tab_btns" style="display:block;">
                    <nav>
                      <div class="nav nav-tabs ep_tab_dt py-fose" id="nav-tab" role="tablist">
                        <a class="nav-link <?=$active_subs_tab;?>" id="nav-package_deatil-tab" data-bs-toggle="tab" href="#package_deatil" role="tab" aria-controls="package_deatil" aria-selected="true"><?= $this->lang->line('package_dt') ?></a>
                        <a class="nav-link <?=$active_rent_tab;?>" id="nav-rent_details-tab" data-bs-toggle="tab" href="#rent_details" role="tab" aria-controls="rent_details" aria-selected="true"><?= $this->lang->line('rent_dt') ?></a>
                      </div>
                    </nav>
                    <div class="tab-content pt-3" id="nav-tabContent">
                      <div class="tab-pane fade <?=$active_subs_data;?>" id="package_deatil" role="tabpanel" aria-labelledby="package_deatil-tab">
                        <div class="episodeSEction">
                          <div class="playepsode_list">
                            <div class="episodeFullBox_detail episodeFullBox">
                              <div class="row">

                                <div class="col-md-12 m-auto">
                                  <div class="term-section">
                                    <div class="row">
                                      <div class="col-sm-12 m-auto">
                                        <div class="mb-2">
                                        <?php if (isset($subs_status['data']) && !empty($subs_status['data'])) { ?>
                                          <div class="row m-0 table-responsive" style="background: rgba(14, 22, 83, 1); border-radius: 10px; border: 1px solid #33335f;">
                                            <table class="table text-white paymentTable">
                                              <thead>
                                                <tr>
                                                  <th class="dallColor f-500 f-heading"> <?= $this->lang->line('plan_dets') ?></th>
                                                  <th class="dallColor f-500 f-heading"><?= $this->lang->line('amount') ?></th>
                                                  <th class="dallColor f-500 f-heading nowrap"><?= $this->lang->line('subscription_status') ?></th>
                                                  <th class="dallColor f-500 f-heading nowrap"><?= $this->lang->line('payment_dets') ?></th>
                                                  <th>&nbsp;</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                if (isset($subs_status['data'])) {
                                                  foreach ($subs_status['data'] as $tran) { ?>
                                                    <?php
                                                    $purchased_date = date('Y-m-d ', $tran['purchase_date']);
                                                    $expiry_date = date('Y-m-d ', $tran['expiry_date']);
                                                    ?>
                                                    <tr>
                                                      <td>


                                                        <div class="f-600 f-heading my-2"><?= $tran['plan_name'] ?></div>

                                                        <div class="dallColor f-12 my-2"><?= $this->lang->line('duration') ?> : <?php echo date('jS F, Y', strtotime($purchased_date)); ?> - <?php echo date('jS F, Y', strtotime($expiry_date)); ?></div>
                                                        <?php if(isset($tran['post_transaction_id']) && $tran['post_transaction_id'] != ""){ ?>
                                                        <div class="dallColor f-12 my-2"><?= $this->lang->line('order_id') ?> : <?= @$tran['post_transaction_id'] ?> </div>
                                                        <?php } ?>
                                                        <div class="dallColor f-12 my-2"><?= $this->lang->line('transaction_id') ?> : <?= $tran['pre_transaction_id'] ?></div>
                                                      </td>
                                                      <td>
                                                        <div class="f-600 f-heading">₹<?= $tran['amount'] + $tran['tax'] ?></div>
                                                        <div class="dallColor f-12"> via <?= $tran['pay_via'] ?></div>
                                                      </td>

                                                      <td>
                                                        <div class="f-600 f-heading"><?= $this->lang->line('next_payments') ?></div>
                                                        <div class="dallColor f-12"><?php echo date('jS F, Y', strtotime($expiry_date)); ?></div>
                                                      </td>
                                                      <td>
                                                        <div class="f-600 f-heading">
                                                          <?php
                                                          if ($tran['transaction_status'] == 1) { ?>
                                                            <span style="color:green"><?= $this->lang->line('success') ?> </span>
                                                          <?php } else if ($tran['transaction_status'] == 2) { ?>
                                                            <span style="color:red"> <?= $this->lang->line('faliure') ?></span>
                                                          <?php } else { ?>
                                                            <span style="color:#a17128"> <?= $this->lang->line('pending') ?></span>
                                                          <?php } ?>
                                                        </div>

                                                      </td>

                                                       <td style="vertical-align:bottom;">
                                                        <?php if ($tran['invoice_url'] != "") { ?>
                                                          <div class="mt-3 text-center">
                                                            <button class="btn w-dynamic ptp f-12 nowrap downloadInvoiceBtn" data-url="<?php echo $tran['invoice_url']; ?>"> <?= $this->lang->line("download_invoice") ?></button>
                                                          </div>
                                                        <?php } ?>

                                                      </td>
                                                    </tr>
                                                <?php }
                                                } ?>

                                              </tbody>
                                            </table>
                                          </div>
                                        <?php }else{ ?>
                                          <div class="col-md-6 m-auto text-center">
                                            <div class="no_dt_found watchListNo categaryNo">
                                                <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
                                                <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                                <!-- <p class="mb-0 text_ac"><//?= NoListFound; ?></p> -->
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


                      </div>
                      <div class="tab-pane fade <?=$active_rent_data;?>" id="rent_details" role="tabpanel" aria-labelledby="rent_details-tab">
                        <div>
                          <div class="row">

                            <div class="col-md-12 m-auto">
                              <div class="term-section">
                                <div class="row">
                                  <div class="col-sm-12 m-auto">
                                    <div class="mb-2">                                      
                                      <?php if (isset($transaction['data']) && !empty($transaction['data'])) { ?>
                                        <div class="row m-0 table-responsive" style="background: rgba(14, 22, 83, 1); border-radius: 10px; border: 1px solid #33335f;">                                      
                                          <table class="table text-white paymentTable">
                                            <thead>
                                              <tr>
                                                <th class="dallColor f-500 f-heading"> <?= $this->lang->line('plan_dets') ?></th>
                                                <th class="dallColor f-500 f-heading"><?= $this->lang->line('amount') ?></th>
                                                <th class="dallColor f-500 f-heading nowrap"><?= $this->lang->line('subscription_status') ?></th>
                                                <th class="dallColor f-500 f-heading nowrap"><?= $this->lang->line('payment_dets') ?></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($transaction['data'] as $tran) { ?>
                                                  <?php
                                                  $purchased_date = date('Y-m-d ', $tran['purchase_date']);
                                                  $expiry_date = date('Y-m-d ', $tran['expiry_date']);
                                                  ?>
                                                  <tr>
                                                    <td>
                                                      <div class="f-600 f-heading my-2"><?= $tran['plan_name'] ?></div>

                                                      <div class="dallColor f-12 my-2"><?= $this->lang->line('duration') ?> : <?php echo date('jS F, Y', strtotime($purchased_date)); ?> - <?php echo date('jS F, Y', strtotime($expiry_date)); ?></div>
                                                      <?php if(isset($tran['post_transaction_id']) && $tran['post_transaction_id'] != ""){ ?>
                                                      <div class="dallColor f-12 my-2"><?= $this->lang->line('order_id') ?> : <?= $tran['post_transaction_id'] ?> </div>
                                                      <?php } ?>
                                                      <div class="dallColor f-12 my-2"><?= $this->lang->line('transaction_id') ?> : <?= $tran['pre_transaction_id'] ?></div>
                                                    </td>
                                                    <td>
                                                      <div class="f-600 f-heading">₹<?= $tran['amount']+ $tran['tax'] ?></div>
                                                      <div class="dallColor f-12"> via <?= $tran['pay_via'] ?></div>
                                                    </td>

                                                    <td>
                                                      <div class="f-600 f-heading"><?= $this->lang->line('next_payments') ?></div>
                                                      <div class="dallColor f-12"><?php echo date('jS F, Y', strtotime($expiry_date)); ?></div>
                                                    </td>
                                                    <td>
                                                      <div class="f-600 f-heading">
                                                        <?php
                                                        if ($tran['transaction_status'] == 1) { ?>
                                                          <span style="color:green"> <?= $this->lang->line('success') ?> </span>
                                                        <?php } else if ($tran['transaction_status'] == 2) { ?>
                                                          <span style="color:red"> <?= $this->lang->line('faliure') ?></span>
                                                        <?php } else { ?>
                                                          <span style="color:#a17128"> <?= $this->lang->line('pending') ?></span>
                                                        <?php } ?>
                                                      </div>
                                                      

                                                    </td>
                                                     <td style="vertical-align:bottom;">
                                                     
                                                      <?php if ($tran['invoice_url'] != "") { ?>
                                                        <div class="mt-3 text-center">
                                                          <button class="btn w-dynamic ptp f-12 nowrap downloadInvoiceBtn" data-url="<?php echo $tran['invoice_url']; ?>"><?= $this->lang->line("download_invoice") ?></button>
                                                        </div>
                                                      <?php } ?>

                                                    </td>
                                                  </tr>
                                              <?php } ?>
                                            </tbody>
                                          </table>
                                        </div>
                                      <?php }else{ ?>
                                        <div class="col-md-6 m-auto text-center">
                                            <div class="no_dt_found watchListNo categaryNo">
                                                <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
                                                <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                                <!-- <p class="mb-0 text_ac"><//?= NoListFound; ?></p> -->
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
              <img src="attention.svg" alt="attenstion">
            </div>
            <h4 class="mb-0 text-white"><?= $this->lang->line("cancel_subscription") ?></h4>
            <small>Your Plan Will not be auto renewed but you can watch until 10 Aug, 2024. No refunds will be made.</small>
          </div>

          <div class="mt-2">
            <button class="btn w-100 ptp mt-4"><?= $this->lang->line("keep_subscription") ?></button>
            <div class="text-center"><button data-bs-target="#cancelSubs" data-bs-toggle="modal" class="btn text-primary "><?= $this->lang->line("Cancel") ?></button> </div>
          </div>

        </div>
      </div>
    </div>
  </div>


      <script>
        $(".downloadInvoiceBtn").on("click", function(e) {
          var fileUrl = $(this).data('url'); // URL of the image
          let download_url = "<?= base_url('download?file=')?>"+fileUrl;  
          //alert(download_url); return;       
          var fileName = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
          // Create a temporary anchor element
          var link = document.createElement('a');
          link.href = download_url;
          link.download = fileName;
          // Append the anchor to the body
          document.body.appendChild(link);
          // Trigger a click event on the anchor
          link.click();
          // Remove the anchor from the document
          document.body.removeChild(link);
        });

        $(window).on('load', function() {
          queueTrackingDataWithDelay('trackEvent', ["Setting", "View", "CurrentPlan"],0);
          queueTrackingDataWithDelay('trackEvent', ["PaymentHistory", "List"],100);

    
  })
      </script>
        