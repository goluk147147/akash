<section class="upcomin_programs py-5">
    <div class="container-fluid">
        <div class="row m-coninew">
            <div class="col-md-12">
                <div>
                    <a onclick="history.go(-1)" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>

                        <h5 class="ms-4 text-white watch_cont"><?= $this->lang->line("past-program") ?></h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="row m-coninew">
            <div class="col-md-12">
                <div class="upcoming_shows mt-5">
                    <nav class="episodes_tab_btns">
                        <div class="nav nav-tabs ep_tab_dt" id="nav-tab" role="tablist">
                            <?php foreach ($totalDay as $key => $value) { ?>
                                <button class="nav-link <?= ($key == 0) ? 'active' : '' ?>" id="upcoming_<?= $key ?>-tab" data-bs-toggle="tab" data-bs-target="#upcoming_<?= $key ?>" type="button" role="tab" aria-controls="upcoming_<?= $key ?>"><?= $value ?></button>
                            <?php } ?>
                        </div>
                    </nav>

                    <div class="tab-content mt-4" id="nav-tabContent">
                        <?php foreach ($totalDay as $key => $value) { ?>
                            <div class="tab-pane fade <?= ($key == 0) ? 'show active' : '' ?>" id="upcoming_<?= $key ?>" role="tabpanel" aria-labelledby="upcoming_<?= $key ?>-tab">
                                <div class="upcoming_program_details pb_channles_flex">

                                    <?php foreach ($epgDetailData['data']['past_shows'] as $skey => $svalue) { ?>
                                        <?php if (((string)$svalue['date'] === (string)$value)) { ?>
                                            <div class="channelBox upcoming-show" data-end="<?= $svalue['end'] ?>">
                                                <div class="pb_live_channel_dt">
                                                    <a href="<?= base_url('pb_live_details?id=') . aes_cbc_encryption_($svalue['id']) ?>">
                                                        <div class="upcomin_img past_sh_vi" data-epg_id="<?=$svalue['id']?>" data-channel_id="<?=$svalue['channel_id']?>" data-content_id="<?=$svalue['video_id']?>" data-title="<?=$svalue['title']?>">
                                                            <img src="<?= $svalue['thumbnail_url'] ?? base_url() . PosterPlaceholder ?>" class="img-fluid" alt="upcoming_program">
                                                        </div>
                                                    </a>
                                                    <div class="contentupcoming py-2">
                                                        <h6 class="episodeOne text-white m-0"><?= $svalue['title'] ?></h6>
                                                        <p class="mb-0"> <img src="<?= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time"><?= date('D, d F', $svalue['start']) ?> <span class="dot_upcoming"></span> <?= date('h:i A', $svalue['start']) ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                </div>
                            </div>
                        <?php } ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

</section>



<div class="modal fade" id="upcominModal" tabindex="-1" aria-labelledby="upcominModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal_sm modal-dialog-centered">
        <div class="modal-content mc-contents">

            <div class="modal-body">
                <div class="upcoming_modal_details position-relative">
                    <button type="button" class="close close_icons" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    <img src="<?= base_url('assets/images/pastimg.png'); ?>" class="img-fluid" alt="time">
                </div>
                <div class="contentupcoming pt-2 pb-3">
                    <h6 class="episodeOne text-white m-0"> <?= $this->lang->line("special-report") ?></h6>
                    <p class="mb-0 upcoming_timepara"> <img src="<?= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time">Mon, 03 March <span class="dot_upcoming"></span> 06:30 AM</p>
                </div>
                <h6 class="text-white f-18s"><?= $this->lang->line("program-yet") ?></h6>
                <div class="upcoming_go mt-5">
                    <a href="javascript:void()" class="cancelpro_btn" data-bs-dismiss="modal" aria-label="Close"><?= $this->lang->line("Cancel") ?></a>
                    <a href="javascript:void()" class="golive_btn"> <?= $this->lang->line("golive") ?></a>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="upcominpayModal" tabindex="-1" aria-labelledby="upcominpayModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal_sm modal-dialog-centered">
        <div class="modal-content mc-contents">

            <div class="modal-body">
                <div class="upcoming_modal_details position-relative">
                    <button type="button" class="close close_icons" onclick="closeModal()" onkeypress="handleKeyPress(event)" onkeydown="handleKeyDown(event)" onkeyup="handleKeyUp(event)" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    <img src="<?= base_url('assets/images/pastimg.png'); ?>" class="img-fluid" alt="time">
                </div>
                <div class="contentupcoming pt-2 py-2">
                    <h6 class="episodeOne text-white m-0">Special Reports</h6>
                    <p class="details_paraprogram">This channel is available exclusively through subscription. Please subscribe to watch your favorite shows.</p>
                </div>
                <div class="d-flex align-items-center">
                    <img src="<?= base_url('assets/website_assets/images/rental.svg'); ?>" class="img-fluid rentalpro" alt="rental">
                    <h6 class="text-white f-18s ms-2">Non Stop Hindi</h6>
                </div>
                <div class="m-q-y ep_btns my-2 d-flex align-items-center">
                    <button class="active  plan_types" type="button"><span><i class="fa-solid fa-indian-rupee-sign"></i>999</span> <span class="pl_det">&nbsp;/ Yearly</span></button>
                    <button class="plan_types" type="button"><span><i class="fa-solid fa-indian-rupee-sign"></i>999</span> <span class="pl_det">&nbsp;/ Yearly</span></button>
                    <button class="plan_types" type="button"><span><i class="fa-solid fa-indian-rupee-sign"></i>999</span> <span class="pl_det">&nbsp;/ Yearly</span></button>
                    <button class="plan_types" type="button"><span><i class="fa-solid fa-indian-rupee-sign"></i>999</span> <span class="pl_det">&nbsp;/ Yearly</span></button>
                    <button class="plan_types" type="button"><span><i class="fa-solid fa-indian-rupee-sign"></i>999</span> <span class="pl_det">&nbsp;/ Yearly</span></button>
                </div>
                <div class="pr_code_detail pb-3 mt-2">
                    <div class="cpn-mdl" style="cursor:pointer">
                        <img src="<?= base_url('assets/images/coupon.svg'); ?>" class="coupon-img pe-2">
                        <button type="button" class="btn border-botoom-dot dddd bd_0">
                            Have a promo code? </button>
                    </div>

                </div>
                <div class="pr_code_input pb-3 d-none">
                    <label for="promoInput"><?= $this->lang->line('enter_promo_code') ?></label>
                    <div class="d-flex align-items-center">
                        <input type="text" id="promoInput" value="" class="w-100 code-input" name="promo" placeholder="<?= $this->lang->line('enter_promo_code') ?>">

                        <button type="button" id="apply_button" class="promo_otp_button ms-3 apply_t" disabled>
                            <span class="applyTXT "><?= $this->lang->line('apply') ?></span>
                        </button>
                    </div>
                    <!-- <div class="coupon_f" id="coupan"></div>
                    <span class="error_name"></span> -->
                </div>
                <div class="my-2">
                    <div class="paymt_dt">
                        <p class="pay_dts"><?= $this->lang->line('you_pay') ?> :</p><span class="ms-2"> <i class="fas fa-rupee-sign"></i>939</span><span class="price_strike ms-2"><i class="fas fa-rupee-sign"></i>999 </span>
                    </div>
                </div>

                <div class="suscribe_now_btn upgrade_nav upsub mt-1">
                    <a href="javascript:void(0)"><span> <img src="<?= base_url('assets/images/Subscribe_button_icon.svg'); ?>" class="Subscribe_button_ic pe-2" alt="Subscribe_button_icon" loading="lazy"><?= $this->lang->line('account-subscribe-upgrade') ?></span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function closeModal() {
        // Get the modal element
        var modal = document.getElementById('promoCode');
        // Hide the modal
        $('.pr_code_detail').removeClass('d-none');
        $('.pr_code_input').addClass('d-none');
        $('#promoInput').val('');
        $('#coupan').html('');
        $('.error_name').html("")
        $('#apply_button').prop('disabled', true);
    }
    $(document).ready(function() {
        $('.pr_code_detail').click(function() {
            // matomo('Available Rent', 'View', 'PromoCodePopup');
            queueTrackingData('trackEvent', ['Available Rent', "View",'PromoCodePopup']);

            $('.pr_code_input').removeClass('d-none');
            $('.pr_code_detail').addClass('d-none');
        })
    })
    $(document).ready(function() {
        $('.pr_code_detail').click(function() {
            $('.pr_code_input').removeClass('d-none');
            $('.pr_code_detail').addClass('d-none');
        })
    })
    $(document).ready(function() {
        $('#promoInput').on('input', function() {
            var data = $(this).val();
            if (data == '') {
                $("#apply_button").prop('disabled', true);
            } else {
                $('.error_name').html('');
                $("#apply_button").prop('disabled', false);
            }
        });
    });

    function handleKeyPress(event) {
        if (event.key === 'Enter') {
            closeModal(); // Call closeModal() function on Enter key press
        }
    }

    function handleKeyDown(event) {
        // Your logic for key down event handling
    }

    function handleKeyUp(event) {
        // Your logic for key up event handling
    }

    function date_format(timestamp) {
        var timestamp = Number(timestamp);
        var formattedDate;
        try {
            const date = new Date(timestamp);
            formattedDate = new Intl.DateTimeFormat('en-US', {
                day: '2-digit',
                month: 'long',
                dayOfWeek: 'short'
            }).format(date);
        } catch (error) {
            formattedDate = 'N/A';
        }
        return formattedDate;
    }

    function time_format(timestamp) {
        var timestamp = Number(timestamp);
        var formattedTime;
        try {
            const time = new Date(timestamp);
            formattedTime = new Intl.DateTimeFormat('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            }).format(time);
        } catch (error) {
            formattedTime = 'N/A';
        }
        return formattedTime;
    }

    var totalDayJson = <?= $totalDayJson ?>;

    function getEpgData() {
        $.ajax({
            url: "<?= base_url('web/live/epgDetailsData') ?>",
            type: "post",
            data: {
                'id': 466,
                'key': 'past_shows'
            },
            success: function(res) {
                //console.log(res);
                var res = JSON.parse(res);
                if (res.status) {
                    var past_html = '';
                    totalDayJson.forEach((item, key) => {
                        past_html += `<div class="tab-pane fade ` + ((key == 0) ? 'show active' : '') + `" id="upcoming_` + key + `" role="tabpanel" aria-labelledby="upcoming_` + key + `-tab">
                                <div class="upcoming_program_details pb_channles_flex">`;
                        res.data.past_shows.reverse().forEach((sitem, skey) => {
                            var date = date_format(sitem.start * 1000);
                            var time = time_format(sitem.start * 1000);
                            if ((sitem.date == item)) {
                                past_html += `<div class="channelBox upcoming-show" data-end="` + sitem.end + `">
                                                <div class="pb_live_channel_dt">
                                                    <a href="<?= base_url('pb_live_details?id=') ?>` + sitem.enc_id + `">
                                                        <div class="upcomin_img">
                                                            <img src="` + sitem.thumbnail_url + `" class="img-fluid" alt="upcoming_program">
                                                        </div>
                                                    </a>
                                                    <div class="contentupcoming py-2">
                                                        <h6 class="episodeOne text-white m-0">` + sitem.title + `</h6>
                                                        <p class="mb-0"> <img src="<?= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time">` + date + ` <span class="dot_upcoming"></span> ` + time + `</p>
                                                    </div>
                                                </div>
                                            </div>`;
                            }
                        })

                        past_html += `</div>
                                                </div>`;
                    });
                    $('#nav-tabContent').html(past_html);
                }
            }
        })
    }


    const targetTimestamps = <?= $totalEndTime ?>;

    function runScriptAtTimestamp(timestamp) {
        var timestamp = Number(timestamp);
        const targetTimestamp = timestamp * 1000;
        const currentTimestamp = Date.now();
        const delay = targetTimestamp - currentTimestamp;

        if (delay > 0) {
            setTimeout(() => {
                // $('.channelBox[data-end='+timestamp+']').css('display','none');
                getEpgData();
            }, delay);
        }
    }

    // Schedule execution for each timestamp in the array
    targetTimestamps.forEach(timestamp => {
        runScriptAtTimestamp(timestamp);
    });
    $('.past_sh_vi').on('click', function(){
         var title = $(this).data('title');
         var epg_id = $(this).data('epg_id');
         var channel_id = $(this).data('channel_id');
         var content_id = $(this).data('content_id');
        //  alert(epg_id);
        //  matomo_live_tracker('PastProgram', 'ContentSelected', epg_id + '/' + channel_id +'/'+ content_id +'/'+ title +'/'+'Video');
        queueTrackingData('trackEvent', ['PastProgram', "ContentSelected",epg_id + '/' + channel_id +'/'+ content_id +'/'+ title +'/'+'Video']);

      });
      function matomo_live_tracker(user, type, title, hits = 4) {
         $.ajax({
            type: 'POST',
            url: "<?= base_url('/web/Home/matomo_hit') ?>",
            dataType: "json",
            data: {
               user: user,
               types: type, // Typo here, it should be type instead of types
               type: hits,
               title: title
            },
            success: function(data) {
               if (data.status == 1) {}
            }
         });
      }
</script>