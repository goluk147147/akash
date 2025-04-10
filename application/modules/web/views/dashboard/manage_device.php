<style>
    .user-logout{
        background:inherit !important;
    }
    .user-logout:hover{
        background:inherit !important;
    }
    /* Simple loader styling */
    #loader {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 999; /* Sit on top */
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border: 3px solid #f3f3f3; /* Light grey */
        border-radius: 50%;
        border-top: 3px solid #3498db; /* Blue */
        width: 40px;
        height: 40px;
        animation: spin 2s linear infinite; /* Animation */
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<div id="loader"></div> <!-- Loader element -->
<section class="pt-5">
    <div class="container-fluid">
        <div class="row m-coninew">
            <div class="col-lg-12">
                <div class="back-btn pe-4 mb-3 text-end">
                    <a href="javascript:void(0)" data-bs-target="#cancelSubs" data-bs-toggle="modal">
                        <img src="<?= base_url('assets/images/sunscription_close.svg'); ?>" class="subscription_close_img" alt="subscription_close">
                    </a>
                </div>
            </div>
        </div>
        <div class="row m-coninew">
            <div class="col-lg-<?=($has_best_plan == true)?6:12;?> <?= ($has_best_plan == true)?'m-auto':''; ?>">
                <div class="manage_device_users pt-3">
                    <div class="row">
                        <div class="col-md-<?=($has_best_plan == true)?12:6;?> col-sm-12 <?= ($has_best_plan == true)?'m-auto':''; ?>">
                            <div class="multi_userdevice mb-4">
                                <div class="mut_user_dt">
                                    <div class="mut_userlogin">
                                        <img src="<?= base_url('assets/images/manage_device_dt.svg'); ?>" alt="mange_device">
                                    </div>
                                    <div class="multi_login_dv">
                                        <p><?= $this->lang->line('to_many_login'); ?></p>
                                    </div>
                                    <p class="many_dvtext"><?= $this->lang->line('to_many_login_text'); ?></p>

                                    <div class="devic_user_details">
                                    <?php if($all_devices){ 
                                        foreach($all_devices as $each){ ?>
                                            <div class="device_names_dt device_id_<?=$each['user_device_info_id']?>">
                                                <div class="names_device_flex">
                                                    <p><?= $each['device_model']??"";?></p>
                                                    <span> <?= $this->lang->line('last_used')??'Last Used' ?>: <?= date("jS F Y", $each['created_at']);?></span>
                                                </div>
                                                <button class="users_device_logout" device_model="<?= $each['device_model']??"";?>" user_device_info_id="<?=$each['user_device_info_id']?>" device_token="<?=$each['device_token'] ?>"><?= $this->lang->line('Logout'); ?></button>
                                            </div>
                                    <?php } } ?>
                                    </div>
                                    <p class="manage_allow_device"><?=$all_devices_count; ?> devices are currently streaming out of <?=$all_devices_count; ?> allowed devices.</p>

                                </div>

                            </div>
                        </div>
                        <?php if($has_best_plan == false){ 
                            $lang_code = $this->session->userdata['lang_code']??"en";?>
                            
                        <div class="col-md-6 col-sm-12 manhage-border-right">
                            <div class="manage-plan-dashboard">
                                <div class="plan-dashobard">
                                <form class="custom-radio-form" method="post" action="<?= base_url('razorpost'); ?>">
                                    <span class="mb-1 upagrde_deviceplan">Upgrade your plan for <?= $subscription_plans['device_feature']['value'][0]??0; ?> devices</span>
                                    <div class="d-flex justify-content-between">
                                        <h4 class="mb-0 text-white"><?= ($subscription_plans['title'] && $lang_code)?$subscription_plans['title'][$lang_code]:''; ?></h4>
                                        <div class="d-flex">
                                            <h4 class="mb-0 text-white">₹<?= number_format(($subscription_plans['pricing'][0]['s_price'] + $subscription_plans['pricing'][0]['gst_amount']),2);?></h4>
                                            <div class="plan_cata"> / <?= $subscription_plans['pricing'][0]['type'];?></div>
                                                <input type="hidden" class="price_checkout" name="price" value="<?=$subscription_plans['pricing'][0]['mrp'];?>">
                                                <input type="hidden" class="validity_checkout" name="validity" value="<?=$subscription_plans['pricing'][0]['validity']?>">
                                                <input type="hidden" class="plan_id_checkout" name="plan_id" value="<?=$subscription_plans['pricing'][0]['plan_id']?>">
                                                <input type="hidden" class="channel_id_checkout" name="channel_id" value="">
                                                <input type="hidden" class="upgrade" name="upgrade" value="1">
                                                <input type="hidden" class="id_checkout" name="id" value="<?=$subscription_plans['pricing'][0]['id']?>">
                                                <input type="hidden" class="gst_amount_checkout" name="gst_amount" value="<?=$subscription_plans['pricing'][0]['new_gst_amount']?>">
                                                <input type="hidden" class="s_price_checkout" name="s_price" value="<?=$subscription_plans['pricing'][0]['new_amount']?>">
                                                <input type="hidden" class="couponApplied" name="couponApplied" value="0">
                                                <input type="hidden" class="referer" name="referer" value="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                                        </div>
                                    </div>
                                    <div class="plan-card">
                                        <div class="row">
                                            <?php if($subscription_plans['features']){ foreach($subscription_plans['features'] as $each_feature){ ?>
                                                <div class="d-flex align-items-center col-lg-12 plan_basic_check">
                                                    <span class="me-2 checkicon"><i class="fas fa-check"></i></span>
                                                    <span class="plan_basic_tt"><?php
                                                    $channel_value = $each_feature['value'];

                                                    if ($channel_value == 1 && stripos($each_feature['title'], " ads") !== false) { 
                                                        $channel_value = '<img src="' . base_url('assets/images/tick.svg') . '" alt="tick">';
                                                    } else if ($channel_value == 0 && stripos($each_feature['title'], " ads") !== false) {
                                                        $channel_value = '<img src="' . base_url('assets/images/cross.svg') . '" alt="cross" height="13px">';
                                                    } else if (strtolower($channel_value) == 'true') {
                                                        $channel_value = '<img src="' . base_url('assets/images/tick.svg') . '" alt="tick">';
                                                    } else if (strtolower($channel_value) == 'false') {
                                                        $channel_value = '<img src="' . base_url('assets/images/cross.svg') . '" alt="cross" height="13px">';
                                                    }
                                                    
                                                    $search1 = "P)"; $search2 = "p)";
                                                    if (stripos($each_feature['value'], $search1) !== false || stripos($each_feature['value'], $search2) !== false) {
                                                        $channel_value = preg_replace('/\s*\(.*$/', '', $each_feature['value']); 
                                                    } 
                                            
                                                    $feature_strings = $each_feature['title'] . " : " . $channel_value;
                                                    if($each_feature['title'] == "Live Channel"){
                                                        $pattern = '/{{(.*?)}}/';
                                                        // Use preg_match_all to find all matches
                                                        preg_match_all($pattern, $feature_strings, $matches);
                                                        $channel_value = "";
                                                        if(!empty($matches) && isset($matches[1][0])){
                                                            $channel_value = $matches[1][0];
                                                        }
                                                        $channel_value = $each_feature['value'];
                                                        if ($channel_value == 'true' || $channel_value == 'True' || $channel_value == 1) {
                                                            $channel_value = '<img src="' . base_url('assets/images/tick.svg') . '" alt="tick">';
                                                        } else if ($channel_value == 'False' || $channel_value == 'false' || $channel_value === 0) {
                                                            $channel_value = '<img src="' . base_url('assets/images/cross.svg') . '" alt="cross" height="13px">';
                                                        }
                                                        $feature_strings = $each_feature['title'] . " : ". $channel_value;
                                                    }
                                                    echo $feature_strings;
                                                    ?></span>
                                                </div>
                                            <?php }}?>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <button type="submit" class="continue_premuim_btn"><?= $this->lang->line('to_continue_preminum'); ?></a>
                                    </div>
                                    <div class="mt-3">
                                        <a href="<?= base_url('upgrade-subscription');?>" class="go_otherplan"><?= $this->lang->line('to_continue_plans'); ?></a>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade bd-example-modal-sm chhose_dv_detail" id="cancelSubs" tabindex="-1" role="dialog" aria-labelledby="cancelSubs" aria-hidden="true">
    <div class="modal-dialog modal_sm modal-dialog-centered">
        <div class="modal-content mc-content">
            <div class="modal-body p-4 ">


                <div class="mb-2 mt-2 text-center">
                    <div class="attentionImg2">
                        <img src="<?= base_url('assets/images/go_back_img.svg'); ?>" alt="goback">
                    </div>
                    <div class="my-4">
                        <h4 class="mb-0 text-white user_manage_head "><?= $this->lang->line('to_continue_goback'); ?></h4>
                        <p class="log_dts"><?= $this->lang->line('to_continue_logout'); ?></p>
                    </div>
                </div>

                <div class="mt-2">
                    <button class="btn w-100 ptp mt-4" data-bs-dismiss="modal"><?= $this->lang->line('to_device_logout'); ?></button>
                    <div class="text-center mb-3">
                        <a href="javascript:void(0);" class="btn btn_log_in user-logout"><?= $this->lang->line('to_device_login'); ?></a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click','.users_device_logout', function() {
        let device_token = $(this).attr('device_token');
        let user_device_info_id = $(this).attr('user_device_info_id');
        let model_name = $(this).attr('device_model');
        let confirm_msg = '<?= $this->lang->line('other_logout_p1'); ?>'+' '+ model_name +' '+'<?= $this->lang->line('other_logout_p2'); ?>'
        swal({
            title: '<?= $this->lang->line('logging_out'); ?>',
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
                        user_device_info_id:user_device_info_id,
                    },
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    success: function(data) { 
                        if(data.status == true){
                            localStorage.removeItem('pb_session', data.token);
                            $('#loader').hide();
                            $(".device_id_"+user_device_info_id).remove();
                            toastr.success('<?= $this->lang->line("logged_out_successfully") ?>');
                            window.location.href = data.url;
                        } else {
                            $('#loader').hide();
                        }
                    }
                }); 
            } 
        });
    });

</script>