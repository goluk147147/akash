  
 <script type="text/javascript">
          var base_url = "https://sandbox.pb-online.co.in/";
</script>

<style>
  .pb_back{
    font-size:18px;
  }
  .positionab h5{
    font-size:inherit !important;
  }

  .mNavtabs .nav-tabs{
    border: none;
  }

  .mNavtabs .nav-tabs .nav-link {
    border: none ; 
    text-align: center;
    width: 50%;
    background: none;
}

.mNavtabs .nav-link.active{
  color: var(--pbc);
  border-bottom: 2px solid var(--pbc) !important;
}
  
.downloadBtn { color: var(--pbc);
        border: 1px solid  var(--pbc);
        font-size: 10px

}

</style>


        <!--main content start-->
        <section id="main-content">

          <section class="wrapper site-min-height">
             <div class="row">
                  <div class="col-lg-12">

                      <div class="positionab">


                  <div class="container-fluid p-0">
                    <div class="row">
                          <div class="col-md-12 pt-3 pl-3" style="background:rgba(39, 39, 39, 1)">
                              <div class="page-title d-flex align-items-center">
                                   <a onclick="history.go(-1)" class="d-flex align-items-center pb_back"><i class="fa fa-chevron-left text-white" aria-hidden="true"></i>
                                <h5 class="defaultColr mb-0 ml-4 text-white">Payment History</h5>
                             </a>
                              </div>
                          </div>
                          </div>
          <div class="row">
              <div class="col-md-12 p-0">
                <div class="episodes_tab_btns" style="display:block;">
                  <nav style="background:rgba(39, 39, 39, 1)" class="mNavtabs">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-link active" id="nav-package_deatil-tab" data-toggle="tab"
                        href="#package_deatil" role="tab" aria-controls="package_deatil"
                        aria-selected="true">Package Details
                      </a>
                      <a class="nav-link" id="nav-rent_details-tab" data-toggle="tab"
                        href="#rent_details" role="tab" aria-controls="rent_details"
                        aria-selected="true">Rent Details
                      </a>
                    </div>
                  </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="package_deatil" role="tabpanel"
                  aria-labelledby="package_deatil-tab">
                  <div class="episodeSEction">
                    <div class="playepsode_list">
                      <div class="episodeFullBox_detail episodeFullBox">
                      <div class="row m-0">
                        
                        <div class="col-md-12 m-auto p-0">
                            <div class="term-section">
                                <div class="row m-0">
                                      <div class="col-sm-12 pr-0 m-auto">
                                         <?php if(isset($subs_status['data'])) {
                                                          foreach($subs_status['data'] as $tran){ ?>
                                                            <?php
                                                          $purchased_date = date('Y-m-d ', $tran['purchase_date']);
                                                          $expiry_date = date('Y-m-d ', $tran['expiry_date']);

                                                          ?>
                                          <div class="mb-2">
                                            <div class="row m-0" style="background: rgba(14, 14, 14, 1); border: 1px solid rgba(47, 47, 47, 1);">
                                                   <div class="p-2 col-md-12 px-3">
                                              <div class="d-flex justify-content-between align-items-center w-100">
                                                <div class="text-white"><?= $tran['plan_name']?></div>
                                                <div class="d-flex align-items-center">
                                                  <svg
                                                            width="10"
                                                            height="10"
                                                            viewBox="0 0 11 16"
                                                            fill="none"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                          >
                                                            <path
                                                              d="M6.38365 15.9724C6.12035 15.7046 5.85281 15.4408 5.60224 15.1848C3.8313 13.2158 2.04337 11.2941 0.16625 9.42752C0.110437 9.3763 0.0668366 9.31478 0.0383043 9.24694C0.00977197 9.1791 -0.00306197 9.10645 0.000615387 9.03372C0.000615387 8.60448 0.000615387 8.17129 0.000615387 7.73811C0.000615387 7.43095 0.153487 7.301 0.48899 7.29706C1.16424 7.29706 1.8395 7.29707 2.51051 7.26163C3.32287 7.24252 4.11078 6.9999 4.7741 6.5646C5.1945 6.27679 5.48741 5.8568 5.59799 5.38321H0.552704C0.480572 5.38722 0.408241 5.38722 0.336109 5.38321C0.253279 5.37854 0.175159 5.34592 0.116482 5.29151C0.0578042 5.2371 0.0226271 5.16466 0.0175935 5.08786C0.0175935 4.66256 0.0175935 4.23726 0.0175935 3.80802C0.0217022 3.73196 0.0561306 3.66004 0.114201 3.60619C0.172271 3.55234 0.249837 3.52042 0.331858 3.51661C0.409588 3.51073 0.487701 3.51073 0.565431 3.51661H5.41538L5.44933 3.47724C5.33601 3.32817 5.2141 3.18487 5.08411 3.04799C4.68706 2.68103 4.1706 2.44573 3.61471 2.37853C3.11285 2.30449 2.60648 2.25979 2.09857 2.24465C1.56771 2.22496 1.04108 2.24465 0.51447 2.24465C0.153486 2.24465 0.00486641 2.10288 0.00486641 1.76815C0.00486641 1.32972 0.00486641 0.892597 0.00486641 0.456795C0.00486641 0.118129 0.132265 0 0.501743 0H10.4904C10.8514 0 10.9873 0.126009 10.9915 0.460737V1.36647C10.9915 1.76026 10.8684 1.89022 10.4352 1.89022H7.75541C7.86035 2.02871 7.95539 2.1734 8.03994 2.32339C8.19566 2.66731 8.33722 3.01386 8.46463 3.36302C8.5071 3.48116 8.55805 3.52449 8.69395 3.52449C9.28851 3.52449 9.88309 3.52449 10.4819 3.52449C10.8811 3.52449 11 3.63475 11 4.00886C11 4.38296 11 4.65469 11 4.97761C11 5.30052 10.8641 5.41078 10.5286 5.41078H8.7067C8.59629 5.41078 8.54532 5.41077 8.51984 5.5486C8.37407 6.32711 8.00141 7.05384 7.44223 7.65009C6.88305 8.24634 6.15864 8.6894 5.34741 8.93133C4.79532 9.12429 4.20925 9.22273 3.64866 9.3645L3.76334 9.48657C5.65744 11.3847 7.42416 13.3773 9.19085 15.3739C9.4032 15.6101 9.35222 15.8228 9.04645 16L6.38365 15.9724Z"
                                                              fill="white"
                                                            />
                                                          </svg><?= $tran['amount'] ?>
                                                        </div>
                                                    </div>
                                                    <small class="text-white mt-2">Plan Duration: <?php echo date('jS F, Y', strtotime($purchased_date)); ?> - <?php echo date('jS F, Y', strtotime($expiry_date)); ?></small>

                                                    <div class="d-flex justify-content-between align-items-center w-100 mt-2">
                                                      <div class="paymentMode d-flex align-items-center">
                                                         <span>UPI</span>
                                                         <span>************0676</span>
                                                      </div>
                                                      <?php if($tran['invoice_url']!=""){?>
                                                      <div class="invoiceDownload">
                                                        <button class="btn downloadBtn">Download Invoice</button>
                                                      </div>
                                                       <?php }?>
                                                    </div>
                                              </div>
                                            
                                            
                                           </div>
                                        </div>


                                 <?php }}?>
                                        <!-- jbdcw -->

                                    </div>

                            </div>
                        </div>
                    </div>
          </div>
        </div>

      </div>
    </div>
    
                           
  </div>
  <div class="tab-pane fade" id="rent_details" role="tabpanel" aria-labelledby="rent_details-tab">
 <div class="playepsode_list">
                      <div class="episodeFullBox_detail episodeFullBox">
                      <div class="row m-0">
                        
                        <div class="col-md-12 m-auto p-0">
                            <div class="term-section">
                                <div class="row m-0">
                                      <div class="col-sm-12 pr-0 m-auto">
                                         <?php if(isset($transaction['data'])) {
                                                          foreach($transaction['data'] as $tran){ ?>
                                                            <?php
                                                          $purchased_date = date('Y-m-d ', $tran['purchase_date']);
                                                          $expiry_date = date('Y-m-d ', $tran['expiry_date']);

                                                          ?>
                                          <div class="mb-2">
                                            <div class="row m-0" style="background: rgba(14, 14, 14, 1); border: 1px solid rgba(47, 47, 47, 1);">
                                                   <div class="p-2 col-md-12 px-3">
                                              <div class="d-flex justify-content-between align-items-center w-100">
                                                <div class="text-white"><?= $tran['plan_name']?></div>
                                                <div class="d-flex align-items-center">
                                                  <svg
                                                            width="10"
                                                            height="10"
                                                            viewBox="0 0 11 16"
                                                            fill="none"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                          >
                                                            <path
                                                              d="M6.38365 15.9724C6.12035 15.7046 5.85281 15.4408 5.60224 15.1848C3.8313 13.2158 2.04337 11.2941 0.16625 9.42752C0.110437 9.3763 0.0668366 9.31478 0.0383043 9.24694C0.00977197 9.1791 -0.00306197 9.10645 0.000615387 9.03372C0.000615387 8.60448 0.000615387 8.17129 0.000615387 7.73811C0.000615387 7.43095 0.153487 7.301 0.48899 7.29706C1.16424 7.29706 1.8395 7.29707 2.51051 7.26163C3.32287 7.24252 4.11078 6.9999 4.7741 6.5646C5.1945 6.27679 5.48741 5.8568 5.59799 5.38321H0.552704C0.480572 5.38722 0.408241 5.38722 0.336109 5.38321C0.253279 5.37854 0.175159 5.34592 0.116482 5.29151C0.0578042 5.2371 0.0226271 5.16466 0.0175935 5.08786C0.0175935 4.66256 0.0175935 4.23726 0.0175935 3.80802C0.0217022 3.73196 0.0561306 3.66004 0.114201 3.60619C0.172271 3.55234 0.249837 3.52042 0.331858 3.51661C0.409588 3.51073 0.487701 3.51073 0.565431 3.51661H5.41538L5.44933 3.47724C5.33601 3.32817 5.2141 3.18487 5.08411 3.04799C4.68706 2.68103 4.1706 2.44573 3.61471 2.37853C3.11285 2.30449 2.60648 2.25979 2.09857 2.24465C1.56771 2.22496 1.04108 2.24465 0.51447 2.24465C0.153486 2.24465 0.00486641 2.10288 0.00486641 1.76815C0.00486641 1.32972 0.00486641 0.892597 0.00486641 0.456795C0.00486641 0.118129 0.132265 0 0.501743 0H10.4904C10.8514 0 10.9873 0.126009 10.9915 0.460737V1.36647C10.9915 1.76026 10.8684 1.89022 10.4352 1.89022H7.75541C7.86035 2.02871 7.95539 2.1734 8.03994 2.32339C8.19566 2.66731 8.33722 3.01386 8.46463 3.36302C8.5071 3.48116 8.55805 3.52449 8.69395 3.52449C9.28851 3.52449 9.88309 3.52449 10.4819 3.52449C10.8811 3.52449 11 3.63475 11 4.00886C11 4.38296 11 4.65469 11 4.97761C11 5.30052 10.8641 5.41078 10.5286 5.41078H8.7067C8.59629 5.41078 8.54532 5.41077 8.51984 5.5486C8.37407 6.32711 8.00141 7.05384 7.44223 7.65009C6.88305 8.24634 6.15864 8.6894 5.34741 8.93133C4.79532 9.12429 4.20925 9.22273 3.64866 9.3645L3.76334 9.48657C5.65744 11.3847 7.42416 13.3773 9.19085 15.3739C9.4032 15.6101 9.35222 15.8228 9.04645 16L6.38365 15.9724Z"
                                                              fill="white"
                                                            />
                                                          </svg><?= $tran['amount'] ?>
                                                        </div>
                                                    </div>
                                                    <small class="text-white mt-2">Plan Duration: <?php echo date('jS F, Y', strtotime($purchased_date)); ?> - <?php echo date('jS F, Y', strtotime($expiry_date)); ?></small>

                                                    <div class="d-flex justify-content-between align-items-center w-100 mt-2">
                                                      <div class="paymentMode d-flex align-items-center">
                                                         <span>UPI</span>
                                                         <span>************0676</span>
                                                      </div>
                                                      <?php if($tran['invoice_url']!=""){?>
                                                      <div class="invoiceDownload">
                                                        <button class="btn downloadBtn">Download Invoice</button>
                                                      </div>
                                                       <?php }?>
                                                    </div>
                                              </div>
                                            
                                            
                                           </div>
                                        </div>


                                 <?php }}?>
                                        <!-- jbdcw -->

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
                
                 <span class="Crossmodal"data-dismiss="modal" style="    margin-top: -10px;"> <i class="fas fa-times"></i></span>
              </div> 

              <div class="mb-2 mt-2 text-center">
                <div class="attentionImg">
                  <img src="attention.svg" alt="attenstion">
                </div>
                <h4 class="mb-0 text-white">Cancel Subscription</h4>
               <small>Your Plan Will not be auto renewed but you can watch until 10 Aug, 2024. No refunds will be made.</small>
              </div>

              <div class="mt-2"> 
                <button class="btn w-100 ptp mt-4">I will keep my subscription</button>                                        
                 <div class="text-center"><button data-target="#cancelSubs" data-toggle="modal" class="btn text-primary ">Cancel</button>  </div>
              </div>

          </div>
      </div>
  </div>
  </div>

        </body>

        </html>
<?php foreach($transaction['data'] as $tran) { 
    if ($tran['invoice_no'] == 0) { ?>
        <script>
            document.getElementById("downloadInvoiceBtn").addEventListener("click", function() {
                var invoiceUrl = "<?php echo $tran['invoice_url']; ?>"; 
                var link = document.createElement('a');
                link.href = invoiceUrl;
                link.setAttribute('download', ''); 
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        </script>
<?php   } 
} ?>

