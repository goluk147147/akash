<style type="text/css">
    header {
        position: relative !important;
    }
     .watchListNo {
    height: 75vh;
}
</style>


<!-- <section class=" mb-5" style="margin-top:100px;">
        <div class="col-md-6 m-auto text-center watchListNo">
            <div class="no_dt_found">
                <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
                <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                <p class="mb-0 text_ac"><?= NoListFound; ?></p>
            </div>
        </div>
    </section> -->


<section class="py-5 useer_details_sec">
    <div class="container-fluid">
        <div class="row mt-1 mb-4 m- oa">
            <div class="col-md-12 m-auto">
                <nav class="">
                    <a href="javascript:void(0)" onclick="history.go(-1)" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>
                        <h5 class="ms-4 text-white watch_cont"><?= $this->lang->line('Continue-Watching') ?></h5>
                    </a>
                </nav>
            </div>
        </div>
        <div class="row m-coninew">
            <div class="col-md-12 m-auto col-12 ">

                <div class="continue_watch_flex w-100 banner_load_af">

                </div>
            </div>
        </div>
    </div>
</section>

<section id="shimmer-section">
    <div class=" banner_loader_af banner-place12">
        <?php for ($i = 0; $i <= 1; $i++) { ?>
            <div class="container-fluid">
                <div class="row mt-1 mb-2 m-0 bm">
                    <div class="col-md-12 d-flex">
                        <!-- <h6 class="defaultColr mt-2 mb-4 ms-3 pl_5 delayed-element d-block shimmer-animation">
                        <p class="mb-0 card_shimmer_op">movies</p>
                    </h6>
                    <a class="defaultColr mt-1 mb-3 pr_5 view_m_btn d-block shimmer-animation">
                        <span class="mb-0 card_shimmer_op">View all</span>
                    </a> -->
                    </div>

                </div>

                <div class="carousel_bott4">
                    <?php for ($j = 0; $j <= 5; $j++) { ?>
                        <div class="card_shimmer">
                            <img src="<?= base_url('assets/images/placholder-img.png'); ?>" class="img-fluid card_shimmer_op" alt="Placeholder">

                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php
        } ?>
    </div>
</section>
<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
<script type="text/javascript">
    const redirect = (link, name = '') => {
        // var loader = document.getElementById('overlayonajaxhit');
        // loader.style.display = 'block';
        location.href = link;
        // setTimeout(function() {
        // }, 500);
        // if (name != '') {
        //   // matomo_hit(1, name);
        // }
    };

    // function remove_from_watchlist(id, show_id, video_id) {
    //     var uuid = '<//?= $_SESSION['uuid'] ?>';
    //     uuid = uuid + video_id;
    //     localStorage.removeItem('lastPlayTime' + uuid);

    //     if ($.isNumeric(id) && $.isNumeric(show_id)) {
    //         $.ajax({
    //             url: "<?= base_url('/web/Continue_watching/update_continue_time'); ?>",
    //             type: "post",
    //             data: {
    //                 id: video_id,
    //                 show_id: show_id,
    //                 activity: 3
    //             },
    //             success: function(data) {
    //                 res = JSON.parse(data);
    //                 if (res.status == 200) {
    //                     Swal.fire({
    //                         icon: "success",
    //                         title: res.msg,
    //                         allowOutsideClick: false,
    //                         showConfirmButton: false,
    //                         timer: 2000
    //                     });
    //                     setTimeout(() => {
    //                         location.reload()
    //                     }, 2000);
    //                 } else {
    //                     Swal.fire(res.msg, '', 'error');
    //                 }
    //                 // if (data.status == true) {
    //                 //     location.reload();
    //                 // }
    //             }
    //         })
    //     }
    // }
    var key = "<?= ($this->session->profile_id) . '-continueWatching' ?>";

    async function remove_watchlist(id, show_id, title = '') {
        var targetDiv = $(event.target).closest('.cardDetails');
        if ($.isNumeric(show_id)) {
            await update_cache(key, show_id, null, 3).then((res) => {
                fetchCacheData(key).then((result) => {
                    targetDiv.css('display', 'none');
                    let countd = 0;
                    result.data.forEach(function(item) {
                        if (item.is_deleted == 0) {
                            countd = countd + 1;
                        }
                    });
                    
                    if (countd == 0) {
                        continue_watching = `<div class="col-md-6 m-auto text-center watchListNo">
                        <div class="no_dt_found">
                            <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
                            <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                            <p class="mb-0 text_ac"><?= NoListFound; ?></p>
                        </div>
                    </div>`;
                        $('.continue_watch_flex').html(continue_watching);
                    }
                });
            });
            // title = id + '_' + title;
            // if (title != '') {
            //   matomo_hit(2, title);
            // }
        }
        $('#overlayonajaxhit').css('display', 'none');
    }

    $(document).ready(function() {
        continueWatchingData(key);
    })

    var i = 1;
    async function continueWatchingData(key) {
        var countd = 0;
        var contKey = "<?= ($this->session->profile_id) . '-continueWatching' ?>";
        fetchCacheData(key)
            .then(async (cache_data) => {
                if (cache_data.data) {
                    let time = Date.now();
                    if (time > cache_data.cacheExpiration) {
                        removeCacheData(key, 'all');
                        cache_data = null;
                        fetchWatchingDetailsAndUpdateCache(null, cache_data);
                    } else {
                        cache_data.data.forEach(function(item) {
                            if (item.is_deleted == 0) {
                                countd = countd + 1;
                            }
                        });
                        
                        if (countd > 0) {
                            // c_class = '';
                            renderHtml(cache_data.data);
                        } else {
                            continue_watching = `<div class="col-md-6 m-auto text-center watchListNo">
                                <div class="no_dt_found">
                                    <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
                                    <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                    <p class="mb-0 text_ac"><?= NoListFound; ?></p>
                                </div>
                            </div>`;
                            $('.continue_watch_flex').html(continue_watching);
                        }
                        // renderHtml(cache_data.data);
                    }
                } else {
                    if (i == 1) {
                        i = 2;
                        await fetchWatchingDetailsAndUpdateCache(null, cache_data);
                    }
                    continueWatchingData(contKey);
                      continue_watching = `<div class="col-md-6 m-auto text-center watchListNo">
                                <div class="no_dt_found">
                                    <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
                                    <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                    <p class="mb-0 text_ac"><?= NoListFound; ?></p>
                                </div>
                            </div>`;
                            $('.continue_watch_flex').html(continue_watching);
                }
            });
        shimmer('hide');
    }


    function renderHtml(continue_watchings) {
        var show_hide = '';
        // continue_watchings.forEach(function(item) {
        //     if (item.is_deleted == 0) {
        //         c_class = '';
        //         show_hide = 'Continue Watching'
        //     }
        // });
        // $(".banner_load_af1").show();
        $('#continue_watching').html('');
        var continue_watching = ``;

        continue_watching += ``;

        var count = 0;
        var type = '<?php echo aes_cbc_encryption_('continue_watching') ?>';
        var continue_watchings_details = continue_watchings.sort((a, b) => {
            return a.updated_at - b.updated_at;
        });
        continue_watchings_details.reverse().forEach(function(item) {
            if (item.is_deleted != 1) {

                var time_left = item.video_duration - item.paused_at;
                var timeLeftString = "";
                if (time_left > 3600) {
                    let h = Math.floor(time_left / 3600);
                    let m = Math.round((time_left - (3600 * h)) / 60);
                    if (m == 0) {
                        m = 1;
                    }
                    timeLeftString = h + "h " + m + "m left";
                } else {
                    let m = Math.round((time_left) / 60);
                    if (m == 0) {
                        m = 1;
                    }
                    timeLeftString = m + "m left";
                }
                const siturl = 'play-media?id=' + item.encrypted_id + '&type=' + type;

                // if (h >= 1) {
                //     timeLeftString = h + "h " + m + "m left";
                // } else if (s > 0 && m == 0) {
                //     timeLeftString = "1m left";
                // } else {
                //     timeLeftString = m + "m left";
                // }
                var url = item.poster_url ? item.poster_url : '<?= base_url('assets/website_assets/images/Frame_358268.png') ?>';
                var percentage = Math.round((item.paused_at / item.video_duration) * 100);
                var id = item.show_id; //aes_cbc_encryption_(item.show_id);
                var wt_id = item.video_id; //aes_cbc_encryption_(item.video_id);'<?= site_url('/play-episode?id=') ?>'+wt_id + '&cid='+id ;

                continue_watching += `<div class="cardDetails shadow">
                    <div class="card__header card_watch_img" data-title = '${item.title}' data-id = '${item.show_id}'>`;

                if (item.pause_at) {
                    continue_watching += `
                            <a href=""><i class="fas fa-times delete_btn"></i></a>`;
                } else {
                    continue_watching += `
                           <span onclick="remove_watchlist(${item.id},${item.video_id},'${item.title}')">
                                <img class="img-fluid premium_content_s delete_btn delete_bt" src="<?= base_url('assets/images/closeVid.png') ?>" alt="Premium">
                            </span>
                            <a onClick='redirect("${siturl}","${item.title}")'>`;
                }

                continue_watching += `
                            <div class="position-relative">
                                <img src="${url}" class="position-relative banner_image co-wa-imfg" alt="poster image" loading="lazy">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:${percentage}%;">
                                    </div>
                                </div>
                            </div>
                            <div class="card_youtube bottomSet continue_bottomset ">
                                <div class="user_g p-2 continue_user">
                                    <div class="user__info_youtube ">
                                        <h5 class="mt-1 m-0">
                                            ${item.title}
                                        </h5>
                                        <p class="date_formate">
                                            ${timeLeftString}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div></div>`;
                count++;
            }

        });

        continue_watching += `
        </div>`;
        if (count == 0) {
            continue_watching = `<div class="col-md-6 m-auto text-center watchListNo">
                <div class="no_dt_found">
                    <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
                    <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                    <p class="mb-0 text_ac"><?= NoListFound; ?></p>
                </div>
            </div>`;
        }
        $('.continue_watch_flex').html(continue_watching);
    }
    $(document).on("click", ".card_watch_img ", function() {
        var title = $(this).data('title');
        var id = $(this).data('id');
        queueTrackingData('trackEvent', ['Continue watching', 'ContentSelected', id +'/'+ title]);

    })
    $(window).on('load', function() {
    queueTrackingData('trackEvent', ['Page', 'View', 'Continue Watching details']);

  })
</script>