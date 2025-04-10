<style>
    .suscribe_now_btn a {
        font-family: 'Poppins-SemiBold';
        font-weight: 700;
    }

    .my-account_img .img-circle {
        width: 80px !important;
        height: 80px !important;
    }

    .my-account_img h6 {
        font-size: 17px !important;
    }

    .my-account_img .num {
        font-size: 14px !important;
    }

    .time-color {
        color: #4845f6 !important;
    }

    .suscribe_now_btn {
        border-radius: 9px;
        background: linear-gradient(78.99deg, #A77800 8.14%, #FFF5E0 58.44%, #FFDAA3 72.94%, #AE8800 114.84%);
        padding: 2px;
    }

    .suscribe_now_btn a {
        border-radius: 6px;
        display: block;
        background: #000;
        color: #ffff;

        width: 100%;
        font-size: 13px;

        padding: 6px;
        text-align: center;
       background:rgba(0,0,55,1) !important;
    }

    .suscribe_now_btn a span {
        background: linear-gradient(78.99deg, #A77800 8.14%, #FFF5E0 58.44%, #FFDAA3 72.94%, #AE8800 114.84%);
        -webkit-text-fill-color: transparent;
        -webkit-background-clip: text;
    }

    .my_acount_list_icon {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        background: rgba(21, 21, 21, 1);
        border-radius: 10px;
        padding: 8px;

    }

    .my_acount_list_user {
        display: flex;
        align-items: center;
    }

    .my_acount_list_user img {
        width: 20px;
        height: 20px;
    }

    .my_acount_list_user p {
        font-size: 13px;
        color: rgba(239, 239, 239, 1);
    }

    .logout_details_btns .logout_pb {
        background: var(--pbg);
        color: var(--white);
        padding: 8px 20px !important;
        width: 100% !important;
        font-size: 15px !important;
        cursor: inherit !important;
        border-radius: 8px !important;
        cursor: pointer;
    }

    .logout_details_btns .logout_pb:hover {
        background-color: var(--pbhover) !important;
    }
</style>
<?php //pre($_SESSION);die;
 $name = $this->session->userdata('master_name'); ?>
<section class="py-5 useer_details_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto col-12">
                <nav class>
                    <a href="javascript:void(0);" onclick="history.go(-1)" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>

                        <h5 class="ms-4 text-white watch_cont"><?= $this->lang->line('my-account') ?></h5>
                    </a>
                </nav>
            </div>

        </div>
        <div class="row pt-5">
            <div class="col-lg-4 col-md-6 m-auto">
                <div class="my_aaccount_user">
                    <div class="p-0 d-flex align-items-center gap-1 my-account_img">
                        <img class="img-circle" src="<?= $this->session->userdata('pro_imga') ?>" alt="profile pic" srcset loading="lazy">

                        <div class="active-user-content ms-3 pe-4">
                            <?php //pre($profiles);
                            //$name = (is_array($profiles) && $profiles[0]["username"])?$profiles[0]["username"]:"You"; 
                            ?>
                            <h6 class="active-user m-0"><?php echo $this->session->userdata('master_name') ? ($this->session->userdata('master_name')) : 'You'; ?></h6>
                            <?php if (!empty($this->session->email) && empty($this->session->mobile)) {  ?>
                                <?= $this->session->email; ?>
                            <?php } else { ?>
                                <span class="m-0 mt-1 num"><?= $this->session->userdata('country_code'); ?>
                                    <?= $this->session->userdata('mobile') ?>
                                </span>
                            <?php } ?>
                        </div>
                        <span class="m-0 icon_badge"><i class="fas fa-chevron-right"></i></span>

                    </div>

                    <?php if (SUBSCRIPTION_CHECK == 1) { ?>
                        <div class=""><?= $this->lang->line('subscription') ?> : <span style="color:#EDB954"><?=(isset($activePlan['data']['detail']))?$activePlan['data']['detail']['plan_name']:""?> ( <?=(isset($activePlan['data']['detail']))?$activePlan['data']['detail']['pricing_title']:""?> )</span></div>
                    <?php } else { ?>
                        <div class="suscribe_now_btn mt-3 d-none">

                            <a href="<?= base_url('subscription?type=myaccount') ?>"><span><img src="<?= base_url('assets/images/Subscribe_button_icon.svg'); ?>" class="Subscribe_button_ic pe-2" alt="Subscribe_button_icon" loading="lazy"><?= $this->lang->line('account-subscribe') ?></span></a>
                        </div>
                    <?php } ?>
                    <div class="my_acount_list mt-3">
                        <a href="<?= base_url('my_user_deatails'); ?>" class="my_acount_list_icon">
                            <div class="my_acount_list_user">
                                <span class="profile_pl me-1"><img src="<?= base_url('assets/images/user_ac_image.svg') ?>" alt="user-deatils"></span>
                                <p class="f-16"><?= $this->lang->line('user-details-text') ?></p>
                            </div>
                            <span class="prfile-icon">
                                <i class="fas fa-chevron-right"></i></span>
                        </a>
                    </div>
                    <!-- settings -->
                    <div class="my_acount_list mt-3">
                        <a href="<?= base_url('settings_details'); ?>" class="my_acount_list_icon">
                            <div class="my_acount_list_user">
                                <span class="profile_pl me-1"><img src="<?= base_url('assets/images/account-seeting.svg') ?>" alt="setting"></span>
                                <p class="f-16"><?= $this->lang->line('settings') ?></p>
                            </div>
                            <span class="prfile-icon">
                                <i class="fas fa-chevron-right"></i></span>
                        </a>
                    </div>
                    <!-- settings -->
                    <div class="pt-5 logout_details_btns w-75 m-auto">
                        <button class="logout_pb user-logout_p" style="cursor:pointer !important">
                            <?= $this->lang->line('Logout'); ?>
                        </button>
                        <div class="w-75 m-auto text-center mt-2  d-none">
                            <button class="delate_acount time-color" onclick="delete_user_account()">
                                <?= $this->lang->line('Delete-Account'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<script>
    function delete_user_account() {
        swal({
            title: '<?= $this->lang->line('delete_acct') ?>',
            text: '<?= $this->lang->line('delete_conform') ?>',
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
                    success: function(data) { //console.log(data);
                        localStorage.removeItem('pb_session');
                        if (data.status == true) {
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
        queueTrackingData('trackEvent', ["Page", "View", "MyAccount"]);

  });
</script>