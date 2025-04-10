
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
                           <h5 class="defaultColr mb-0 ms-4 text-white"><?= $this->lang->line('settings') ?></h5>
                           </a>
                            </div>
                        </div>
                        </div>
                    <div class="row m-0">
                        <div class="col-md-11 m-auto">
                            <div class="term-section">
                              
                                     <div class="row">
                                      
                                      <div class="col-md-6 col-sm-12 p-3 m-auto">
                                                             <div class="d-flex justify-content-between align-items-center mb-2 py-3 mx-2">
                                                                <div class""><?= $this->lang->line('notifications') ?></div>                                                               
                                                                  <div class="custom-control custom-switch ps-0">
                                                                      <!-- <input type="checkbox" class="custom-control-input" id="customSwitch1"> -->
                                                                        <label class="switch switch_toggle ">
                                                                        <input type="checkbox" class="custom-control-input addcheckbox" id="customSwitch1" <?php echo ($this->session->userdata('toggels_check') == true) ? 'checked' : ''; ?>>
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                    </div>
                                                                  </div>
                                                                  <div class="setting_hov_user px-2">
                                                                 <a href="<?= base_url('sub_devices'); ?>" class="chevron-link deatils_setting_hov py-4">
                                                                  <div class="d-flex justify-content-between align-items-center">
                                                                  <div><?= $this->lang->line('subscription_and_devices') ?></div>

                                                                  <div><i class="fas fa-chevron-right"></i></div>

                                                                  
                                                              </div>
                                                              </a>
                                                              </div>
                                                              <div class="setting_hov_user px-2">
                                                              <!-- <a href="javascript:void(0)" class="deatils_setting_hov hov_border py-4">
                                                              <div class="d-flex justify-content-between align-items-center">
                                                                <div> <?= $this->lang->line('clear_search_history') ?></div>
                                                                <div><i class="fas  fa-chevron-right"></i></div>
                                                              </div>
                                                              </a> -->
                                                               </div>
                                                              <div class="d-flex justify-content-center align-items-center mt-2 mb-2 py-3 mx-2">
                                                                <button class="btn w-70 ptp mt-4" onclick="delete_user_account()">
                                                                <?= $this->lang->line('Delete-Account'); ?>
                                                                </button>                                        
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
              
               <span class="Crossmodal"data-bs-dismiss="modal" style="    margin-top: -10px;"> <i class="fas fa-times"></i></span>
            </div> 

            <div class="mb-2 mt-2 text-center">
              <div class="attentionImg">
                <img src="attention.svg" alt="attention">
              </div>
              <h4 class="mb-0 text-white">Cancel Subscription</h4>
             <small>Your Plan Will not be auto renewed but you can watch until 10 Aug, 2024. No refunds will be made.</small>
            </div>

            <div class="mt-2"> 
                            <button class="btn w-100 ptp mt-4">I will keep my subscription</button>                                        
                                 <div class="text-center"><button data-bs-target="#cancelSubs" data-bs-toggle="modal" class="btn text-primary ">Cancel</button>  </div>

           </div>

        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('.addcheckbox').change(function() {
            var isChecked = $(this).is(':checked') ? 1 : 0;
            if(isChecked==1){
                queueTrackingDataWithDelay('trackEvent', ['AppSetting', 'Notifications',"Status(Enable)"]);
  
            }else{
                queueTrackingDataWithDelay('trackEvent', ['AppSetting', 'Notifications',"Status(Disabled)" ]);

            }
            $.ajax({
                type: 'POST',
                url: '<?= base_url('/web/home/notification_toggle'); ?>',
                data: {
                    toggle_status: isChecked
                },
                dataType: "json",
                success: function(data) {},
                error: function(xhr, status, error) {
                    // console.error('Error updating toggle status:', error);
                }
            });
        });
    });
</script>

<script>
    function delete_user_account() {
        swal({
            title: '<?= $this->lang->line('delete_acct') ?>',
            text: '<?php echo SUBSCRIPTION_CHECK == 1 ? $this->lang->line('delete_conform_paid') : $this->lang->line('delete_conform'); ?>',
            imageUrl: "<?= base_url('assets/images/delete.png'); ?>",
            imageWidth: 70,
            imageHeight: 70,
            animation: false,
            confirmButtonColor: '#006BB6',
            allowOutsideClick: false,
            cancelButtonColor: '#d33',
            confirmButtonText: "<?= $this->lang->line('Confirm') ?>",
            showCancelButton: true,
            cancelButtonText: '<?= $this->lang->line('Cancel') ?>',
            // confirmButtonClass: 'btn btn-success me-2',
            // cancelButtonClass: 'btn btn-danger',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('/web/Login_register/delete_account'); ?>',
                    dataType: "json",
                    // data: {
                    //    profile_id: id,
                    //    username:username,
                    //    activity: 3
                    // },
                    success: async function(data) { //console.log(data);
                        localStorage.removeItem('pb_session');
                        if (data.status == true) {
                            <?php $id= $_SESSION['profile_data'][0]['user_id']; ?>
                            queueTrackingDataWithDelay('trackEvent', ['AppSetting', 'Delete' +'/'+"<?=$id?>"],0);

                            try {
                            await deleteAllMasterContentKeys();
                            await removeCacheData('contentDetail', 'all');

                            } catch (err) {
                            console.log(err);
                            }
                            swal({
                                imageUrl: "<?= base_url('assets/images/tick.png'); ?>",
                                imageWidth: 70,
                                imageHeight: 70,
                                title: data.message,
                                allowOutsideClick: false,
                                confirmButtonText: "<?= $this->lang->line("ok") ?>",
                            }).then((result) => {
                                location.href = '<?php echo base_url(); ?>';
                            });
                        } else {
                            swal({
                                title: data.message,
                                allowOutsideClick: false,
                                confirmButtonText: "<?= $this->lang->line("ok") ?>",
                            }).then((result) => {
                                //location.reload();
                                location.href = '<?php echo base_url(); ?>';
                            });
                        }


                    }
                });
            }
        });
    }

    $(window).on('load', function() {
        queueTrackingDataWithDelay('trackEvent', ["Page", "View", "AppSetting"],0)

  });
</script>