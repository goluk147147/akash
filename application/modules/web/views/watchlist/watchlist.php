<style>
    header {
        position: relative !important;
    }

    .hide {
        display: none;
    }

    .delete-btn {
        color: #fff !important;
    }

    .custom-checkbox .custom-control-label::before {
        border-radius: 999px;
    }

    .pb_wl_card .pb_card_details {
        width: 16.6%;
        margin-right: 0px !important;
        padding: 8px;
        transition: all 0.5s;
        position: relative;
    }

    .check_card {
        right: 3px;
        position: absolute;
        margin-top: 6px;
    }

    .text_ac {
        color: #acacac;
    }

    a.delete-btn {
        color: #4845f6;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        display: inline-block;
    }

    .form-groups input {
        padding: 0;
        height: initial;
        width: initial;
        margin-bottom: 0;
        display: none;
        cursor: pointer;
    }

    .form-groups label {
        position: relative;
        cursor: pointer;
    }

    .form-groups label:before {
        content: "";
        -webkit-appearance: none;
        background-color: #2B2B2B;
        border: 1px solid #f6f6f6;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
        border-radius: 50px;
        padding: 10px;
        display: inline-block;
        position: relative;
        vertical-align: middle;
        cursor: pointer;
        margin-right: 5px;
        margin-top: -4px;
        /* background-color: #4845F6; */

    }

    .form-groups input:checked+label:after {
        content: "";
        display: block;
        position: absolute;
        top: 4px;
        left: 7px;
        width: 6px;
        height: 14px;
        border: solid #fff;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    .form-groups input:checked+label:before {
        background-color: #4845f6 !important;
        border: none;
    }

    .premium_icondt {
        z-index: 99 !important;
    }

    .cancel-btns {
        background-color: #4845f6;
    }

    .pb_card_details .delete_continue_btn {
        position: absolute;
        top: 15px;
        right: 6px;
        z-index: 9999;
        display: none;
    }

    .pb_card_details:hover .delete_continue_btn {
        display: block;
    }

    .watchListNo {
        height: 85vh !important;
    }

    @media (min-width: 1800px) {
        .pb_wl_card .pb_card_details {
            width: 12%;
        }
    }

    @media (min-width: 1450px) and (max-width:1800px) {
        .pb_wl_card .pb_card_details {
            width: 13.7%;
        }
    }

    @media (min-width: 901px) and (max-width: 1199px) {
        .pb_wl_card .pb_card_details {
            width: 15.7%;
        }
    }

    @media (min-width: 601px) and (max-width: 900px) {
        .pb_wl_card .pb_card_details {
            width: 20% !important;
            padding: 5px;
        }
    }

    @media (min-width: 320px) and (max-width: 600px) {
        .pb_wl_card .pb_card_details {
            width: 33% !important;
            padding: 5px !important;
        }
    }

    @media (min-width: 320px) and (max-width: 767px) {
        .watch_cont {
            margin-left: 10px !important;
        }
    }
</style>

<?php  $lang_id = ($this->session->userdata('lang_id')) ? $this->session->userdata('lang_id') : 'English'; ?> 

<section class="py-3 paddin-yud">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto col-12">
                <nav class="watchnav_back">
                    <a onclick="history.go(-1)" class="d-flex align-items-center pb_back mt-4 ">
                        <i class="fa fa-chevron-left text-white"></i>
                        <h5 class="text-white f-600 ms-4 search_pb"><?= $this->lang->line('Watchlist'); ?></h5>
                    </a>
                    <input type="hidden" id="start" value="1">
                </nav>
            </div>
        </div>
    </div>
    <div id="watchList">
        <div class="container-fluid mb-5">
            <div class="row m-coninew">
                <div class="col-md-12 m-auto col-12">
                    <div class="pt-4">
                        <div class="pb_wl_card apnd-watchlist">

                        </div>
                    </div>
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

                <div class="carousel_bott4 owl-carousel owl-theme">
                    <?php for ($j = 0; $j <= 6; $j++) { ?>
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
<script>
    var watchKey = "<?= ($this->session->profile_id ?? 0) . '-watchList' ?>";
    var html = '';
    //var start = Number($('#start').val());
    var start = 1;
    $('#start').val(start);
    var foundData = true;


    async function updateHomeContentCache(html = 1) {
        var homeKey = 'masterContent-'+(feedType??0);
        var watchKey = "<?= ($this->session->profile_id ?? 0) . '-watchList' ?>";
        Promise.all([fetchCacheData(homeKey), fetchCacheData(watchKey)])
            .then(async (result) => {
                var homeData = result[0];
                var watchData = result[1];
                homeData.data.home_data.data.forEach((citem, ckey) => {
                    citem.list.forEach((sitem, skey) => {
                        var found = false;
                        watchData.data.forEach((item, key) => {
                            if (item.show_id == sitem.id && item.is_deleted != 1) {
                                found = true;
                                homeData.data.home_data.data[ckey].list[skey].in_watchlist = 1;
                            }
                        });
                        if (found == false) {
                            homeData.data.home_data.data[ckey].list[skey].in_watchlist = 0;
                        }
                    })
                });
                homeData.data.nav_banner.data.banners.forEach((sitem, skey) => {
                    var bannerFound = false;
                    if (watchData) {
                        watchData.data.forEach((item, key) => {
                            if (item.show_id == sitem.show_id) {
                                bannerFound = true;
                                if (item.is_deleted != 1) {
                                    homeData.data.nav_banner.data.banners[skey].in_watchlist = 1;
                                } else {
                                    homeData.data.nav_banner.data.banners[skey].in_watchlist = 0;
                                }
                            }
                        });
                    }
                    if (bannerFound == false) {
                        homeData.data.nav_banner.data.banners[skey].in_watchlist = 0;
                    }
                });

                var cache = await caches.open('appCache');
                await cache.put(homeKey, new Response(JSON.stringify(homeData)));
                // if (html == 1) {
                //     renderTrendingSections(homeData.data.home_data.data);
                // }
            });
    }

    cacheWatchlist();
    var deletedData = [];
    async function cacheWatchlist() {
        if (!foundData) {
            return false;
        }
        start = Number($('#start').val());
        var last_updated = '0000000000';
        if (start == 1) {
            var watchData = await fetchCacheData(watchKey);

            var totalCount = 0;
            var syncedCount = 0;
            if (watchData.data) {
                watchData.data.forEach((item) => {
                    if (item.is_deleted != 1) {
                        totalCount += 1;
                        if (item.is_synced == 1) {
                            syncedCount += 1;
                            if (item.last_updated > last_updated) {
                                last_updated = item.last_updated;
                            }
                        }
                    } else {
                        deletedData.push(item.show_id);
                    }
                });
            }
        }
        hasscroll == true;
        $.ajax({
            url: "<?= base_url('web/watchlist/get_data') ?>",
            type: 'post',
            data: {
                start,
                last_updated
            },
            success: function(response) {
                hasscroll == false;
                var res = JSON.parse(response);
                if (res.data.length == 0 && start > 3) {
                    foundData = false;
                }
                $('#start').val((start + 1));
                putWatchDataInCache(res.data);
            }
        });
    }

    var hasscroll = false;
    $(window).on('scroll', function() {
        var distanceFromBottom = $(document).height() - ($(window).scrollTop() + $(window).height());
        if (distanceFromBottom <= ($(window).height()) && hasscroll == false) {
            //start++;
            cacheWatchlist();
            hasscroll = true;
            applyRowStyles();
        } else if (distanceFromBottom >= ($(window).height()) && hasscroll == true) {
            hasscroll = false;
        }
    });

    var iteration = 1;
    async function putWatchDataInCache(data) {
        var start = Number($('#start').val());
        var cache = await caches.open('appCache');
        var noData = true;
        var cachedResponse = await cache.match(watchKey);
        if (cachedResponse) {
            var cachedData = await cachedResponse.json();
            if (data.length == 0 && (start <= 2)) {
                watchListData(cachedData.data);
                return false;
            } else if (data.length == 0) {
                return false;
            }
            if (cachedData.data) {
                var objArray = cachedData.data;
                var count = 0;
                var newData = [];
                data.forEach((item) => {
                    var new_data = true;
                    if (iteration <= 2) {
                        cachedData.data.forEach((value, key) => {
                            if (value != null) {
                                if ((value.show_id == item.show_id)) {
                                    count += 1;
                                    if (value.is_deleted == 1) {
                                        cachedData.data[key].is_deleted = 1;
                                    } else {
                                        cachedData.data[key].is_deleted = item.is_deleted;
                                    }
                                    cachedData.data[key].is_synced = 0;
                                    new_data = false;
                                }
                            }
                        });
                    }
                    if (new_data && item != null && (item.is_deleted != 1)) {
                        count += 1;
                        newData.push(item);
                        var new_key = Object.keys(cachedData.data).length;
                        var description = [
                        {
                        content: item.description,
                        language: "English"
                        }
                        ];
                        var new_cache = {
                            "id": "0",
                            "show_id": item.show_id,
                            "enc_show_id": item.enc_show_id,
                            "title": item.title,
                            "poster_url": item.poster_url,
                            "thumbnail_url": item.thumbnail,
                            "description": item.description,
                            "media_type": item.media_type,
                            // "video_id": item.video_id,
                            //"enc_video_id": item.enc_video_id,
                            "is_synced": 1,
                            "last_updated": item.last_updated,
                            "is_deleted": 0
                        }
                        cachedData.data[new_key] = new_cache;
                    }
                });
                // start = Math.floor(count/20);
                // if (start < 2) {
                //   $('#start').val(start+1);
                // }
                // $('#start').val(start);
                // if (start == 1) {
                watchListData(cachedData.data, start);
                // }else{
                //   watchListData(newData,0);
                // }
                await cache.put(watchKey, new Response(JSON.stringify(cachedData)));
                await applyRowStyles();
            } else {
                var cachedData = [];
                data.forEach((item) => {
                    var description = [
                    {
                    content: item.description,
                    language: "English"
                    }
                    ];
                    var new_cache = {
                        "id": "0",
                        "show_id": item.show_id,
                        "enc_show_id": item.enc_show_id,
                        "title": item.title,
                        "poster_url": item.poster_url,
                        "thumbnail_url": item.thumbnail,
                        "description":item.description,
                        "media_type": item.media_type,
                        // "video_id": item.video_id,
                        // "enc_video_id": item.enc_video_id,
                        "is_synced": 1,
                        "last_updated": item.last_updated,
                        "is_deleted": 0
                    }
                    cachedData.push(new_cache);
                });
                watchListData(data);
                await put_cache(cachedData, watchKey, null, 0);
            }
        } else {
            var cachedData = [];
            data.forEach((item) => {
                var description = [
                {
                content: item.description,
                language: "English"
                }
                ];
                var new_cache = {
                    "id": "0",
                    "show_id": item.show_id,
                    "enc_show_id": item.enc_show_id,
                    "title": item.title,
                    "poster_url": item.poster_url,
                    "thumbnail_url": item.thumbnail,
                    "description": item.description,
                    "media_type": item.media_type,
                    // "video_id": item.video_id,
                    // "enc_video_id": item.enc_video_id,
                    "is_synced": 1,
                    "last_updated": item.last_updated,
                    "is_deleted": 0
                }
                cachedData.push(new_cache);
            });
            watchListData(data);
            await put_cache(cachedData, watchKey, null, 0);
            await applyRowStyles();
        }
        iteration += 1;
    }
    var lang_title = "<?= ucwords($lang_id )?>";

    var isSubscribed = "<?= SUBSCRIPTION_CHECK ?>";
    var sess_id = "<?php echo $this->session->id; ?>";
    var watch_app = '<?= $this->lang->line('Watchnow') ?>';
    var subscribe_watch = '<?= $this->lang->line('Subscribewatch') ?>';
    var available_to_rent = '<?= $this->lang->line('available_to_rent') ?>';
    var subscribe_listen = '<?= $this->lang->line('Subscribelisten') ?>';
    var Login_Watch = '<?= $this->lang->line('LoginToWatch') ?>';
    var listen = '<?= $this->lang->line('Listennow') ?>';
    var watchlist = '<?= aes_cbc_encryption_('watchlist') ?>';
    async function watchListData(cachedResponse, activity = 1) {
        $('#shimmer-section').remove();
        try {
            // var cache = await caches.open('appCache');
            var noData = true;
            // var cachedResponse = await cache.match(watchKey);
            if (cachedResponse) {
                // var cachedData = await cachedResponse.json();
                var cachedData = cachedResponse;
                if (cachedData) {
                    var length = cachedData.length;
                    html = '';
                    var cachedData = cachedData.sort((a, b) => {
                        return b.updated_at - a.updated_at;
                    })
                    cachedData.forEach((item, key) => {
                        var descriptions =item.description;
                                if (Array.isArray(item.description)) {
                                const sessionDescription = item.description.find(desc => desc.language === "English");
                                if (sessionDescription) {
                                 descriptions = sessionDescription.content;
                                }
                                if(lang_title){
                                 const sessionDescription = item.description.find(desc => desc.language === lang_title);
                                if (sessionDescription) {
                                 descriptions = sessionDescription.content;
                                }
                                }
                               }
                        var genres =  item.genres?item.genres.replace(/,/g, ' | ') : '';
                        const action = genres.split('|').map(items => items.trim()).slice(0, 3).join(' | ');
                        if (item.is_deleted != 1) {
                            noData = false;
                            item.thumbnail_url = (item.thumbnail_url != 'undefined' && item.thumbnail_url != '' ? item.thumbnail_url : '<?= base_url(ThumbnailPlaceholder) ?>');
                            item.poster_url = (item.poster_url != 'undefined' && item.poster_url != '' ? item.poster_url : '<?= base_url(PosterPlaceholder) ?>');
                            var siturl = "<?= base_url('play-video?id=') ?>" + item.enc_show_id +'&similar=Watchlist';
                            if ((isSubscribed != 1) && (item.is_paid == 1) && (sess_id !== "")) {
                                var message = (item.media_type == 0) ? subscribe_watch : subscribe_listen;
                                // var siturl1 = "<?= base_url('subscription') ?>";
                                var siturl1 = "<?= base_url('play-episode?id=') ?>" + item.enc_show_id + '&type=' + watchlist;
                            } else if ((isSubscribed != 1) && (item.is_paid == 1) && (sess_id == "")) {
                                var message = (item.media_type == 0) ? subscribe_watch : subscribe_listen;
                                // var siturl1 = "<?= base_url('user-login') ?>";
                                var siturl1 = "<?= base_url('play-episode?id=') ?>" + item.enc_show_id + '&type=' + watchlist;
                            } else if ((item.is_paid == 2) && (sess_id != "")) {
                                var rented = item.is_rented ?? 0;
                                if (rented == 1) {
                                    var message = (item.media_type == 0) ? watch_app : listen;
                                    var siturl1 = "<?= base_url('play-video?id=') ?>" + item.enc_show_id + '&type=' + watchlist;
                                } else {
                                    var message = (item.media_type == 0) ? available_to_rent : available_to_rent;
                                    var siturl1 = "<?= base_url('play-video?id=') ?>" + item.enc_show_id + '&type=' + watchlist;
                                }
                            } else if ((item.is_paid == 2)) {
                                var message = (item.media_type == 0) ? available_to_rent : available_to_rent;
                                var siturl1 = "<?= base_url('play-video?id=') ?>" + item.enc_show_id + '&type=' + watchlist;
                            } else {
                                var message = (item.media_type == 0) ? watch_app : listen;
                                var siturl1 = "<?= base_url('play-episode?id=') ?>" + item.enc_show_id + '&type=' + watchlist +'&similar=Watchlist';
                            }

                            html += `<div class="pb_card_details mb-3 ' + (item.is_paid == 0 ? '' : 'pb_card_outer') + '" data-id=${item.show_id} data-title=${item.title} data-genres=${item.genres} >`;
                            
                            if (item.is_paid == 1) {
                                html += '<div class="premium_icondt"><img src="' + base_url + 'assets/images/premium-icon.svg' + '" alt="premium"></div>';
                            } else if (item.is_paid == 2) {
                                html += '<div class="premium_icondt"><img src="' + base_url + 'assets/website_assets/images/rental.svg' + '" alt="rental"></div>';
                            }
                            html += '<div class="check_card hide"><div class="form-groups"><input class="check_all" type="checkbox" id="checkbox" /><label for="checkbox"></label></div></div><span class="delete_continue_btn" data-thumbnail="' + item.thumbnail_url + '" data-id="' + item.id + '" data-genres="' + item.genres + '" data-title="' + item.title + '" onclick="removeWatchList(event,' + item.show_id + ')"><img class="img-fluid  premium_content_s delete_btn delete_bt watchlistClose" src="' + base_url + 'assets/images/closeVid.png' + '" alt=""></span><a class="text-decoration-none watchList" href="' + siturl + '"><div class="pb_card_img"><img class="img-fluid as3" src="' + (item.thumbnail_url) + '"></div><div class="pb_card_img2"><div class="pb_card_vd-2"><img class="img-fluid" src="' + (item.poster_url) + '"></div><div class="pb_card_content"><h6>' + item.title + '</h6><p class="discription_gen"> ' + action + ' </p><p class="discription_dt">' + descriptions + '</p><div class="d-flex align-items-center mt-1 pb_add_btns pb_card_watch categaryAddBtn"  data-id="'+item.show_id+'" data-title= "'+ item.title +'" data-genres="'+item.genres+'"><a href="' + siturl1 + ' " class="text-decoration-none pb_watch_btn d-block watchListBtn"><img class="img-fluid watchCardImg" src="' + base_url + 'assets/images/playBtn.png' + '"> ';
                            if (item.media_type == 1) {
                                html += message;
                            } else {
                                html += message;
                            }

                            html += ' </a></div></div></div></a></div>';

                        }
                    });
                    html += '';
                    //console.log('html',html);
                    $('.apnd-watchlist').html(html);

                } else {
                    html = '<div class="col-md-6 m-auto text-center"><div class="d-flex justify-content-center flex-column align-items-center watchListNo"><img src="' + base_url + 'assets/images/no_list_found.png' + '" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">' + "<?= $this->lang->line('nowatchlist_heading') ?>" + '</h5><p class="mb-0 text_ac">' + "<?= $this->lang->line('nowatchlist_paragraph') ?>" + '</p></div></div>';
                    $('#watchList').html(html);
                }
            }
            if (noData) {
                html = '<div class="col-md-6 m-auto text-center"><div class="d-flex justify-content-center flex-column align-items-center watchListNo"><img src="' + base_url + 'assets/images/no_list_found.png' + '" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">' + "<?= $this->lang->line('nowatchlist_heading') ?>" + '</h5><p class="mb-0 text_ac">' + "<?= $this->lang->line('nowatchlist_paragraph') ?>" + '</p></div></div>';
                if (activity == 1) {
                    $('#watchList').html(html);
                }
            }
        } catch (error) {
            html = '<div class="col-md-6 m-auto text-center"><div class="d-flex justify-content-center flex-column align-items-center watchListNo"><img src="' + base_url + 'assets/images/no_list_found.png' + '" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">' + "<?= $this->lang->line('nowatchlist_heading') ?>" + '</h5><p class="mb-0 text_ac">' + "<?= $this->lang->line('nowatchlist_paragraph') ?>" + '</p></div></div>';
            if (activity == 1) {
                $('#watchList').html(html);
            }
        }

        setTimeout(function() {
            applyRowStyles();
            // console.log('0000000000')
        }, 500)
        shimmer('hide');
    }

    // watchListData();

    async function removeWatchList(event,show_id) {
        event.stopPropagation();
        var id = $(event.target.closest('.delete_continue_btn')).data('id');
        var title = $(event.target.closest('.delete_continue_btn')).data('title');
        var generes = $(event.target.closest('.delete_continue_btn')).data('genres');
        queueTrackingDataWithDelay('trackEvent', ["Watchlist", 'Delete', show_id + "/" + title],0);
         queueTrackingDataWithDelay('trackContentInteraction', ["Watchlist/Delete" , show_id + '/' + title, generes],100);
         queueTrackingDataWithDelay('trackContentImpression', [show_id + '/' + title, generes],200);
        var data = {
            show_id
        }
        var closestAncestor = event.target.closest('.pb_card_details');

        if (show_id) {
            await updateWatchlistCache(watchKey, data, 3)
                .then((res) => {
                    // watchListData();
                    let count = 0;
                    res.data.forEach((item, key) => {
                        if (item.is_deleted != 1) {
                            count += 1;
                        }
                    });
                    if (closestAncestor) {
                        closestAncestor.style.display = 'none';
                    }
                    if (count == 0) {
                        html = '<div class="col-md-6 m-auto text-center"><div class="d-flex justify-content-center flex-column align-items-center watchListNo"><img src="' + base_url + 'assets/images/no_list_found.png' + '" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">' + "<?= $this->lang->line('nowatchlist_heading') ?>" + '</h5><p class="mb-0 text_ac">' + "<?= $this->lang->line('nowatchlist_paragraph') ?>" + '</p></div></div>';
                        $('#watchList').html(html);
                    }
                    updateHomeContentCache(0);
                });
        }
    }

    function redirectToPlayer(enc_id) {
        if (enc_id) {
            window.location.href = base_url + 'play-episode?id=' + enc_id;
        }
    }

    $('#del_popUp').on("click", function(e) {
        e.preventDefault();
        $('.hide_del').addClass('hide');
        $('.pop_card').removeClass('hide');
        $('.check_card').removeClass('hide');
    });

    $('.cancel').on("click", function(e) {
        e.preventDefault();
        $('.pop_card').addClass('hide');
        $('.hide_del').removeClass('hide');
        $('.check_card').addClass('hide');
        $('.check_all').prop('checked', false);
    });

    $(document).ready(function() {
        $('#selectall').on("click", function(e) {
            e.preventDefault();
            $('.check_all').prop('checked', true);
        });
    });

    $('.delete_continue_btn').on('click', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        //var title = $(this).data('title');
        remove_watchlist(id);
    });

    $('.backNavBtns').on('click', function(e) {
        e.preventDefault();
        //matomo('Watchlist', 'Play', 'View'); 
    });


    function matomo(user, type, title, geners) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('/web/Watchlist/add_to_watchlist') ?>',
            dataType: "json",
            data: {
                user: user,
                types: type, // Typo here, it should be type instead of types
                geners: geners,
                title: title
            },
            success: function(data) {
                if (data.status == 1) {

                }
            }
        });
    }
    async function applyRowStyles() {
        const container = await document.querySelector('.pb_wl_card');

        if (!container) {
            //console.error('Container not found');
            return;
        }

        const items = await container.querySelectorAll('.pb_card_details');

        if (items.length === 0) {
            //console.error('No items found');
            return;
        }

        const itemWidth = await items[0].offsetWidth;
        const marginRight = await parseFloat(getComputedStyle(items[0]).marginRight) || 0;
        const itemsPerRow = await Math.floor(container.offsetWidth / (itemWidth + marginRight));

        if (itemsPerRow <= 0) {
            console.error('Invalid number of items per row');
            return;
        }

        items.forEach((item, index) => {
            item.classList.remove('first-in-row', 'last-in-row');

            if (index % itemsPerRow === 0) {
                item.classList.add('first-in-row');
            }

            if ((index + 1) % itemsPerRow === 0) {
                item.classList.add('last-in-row');
            }
        });
    }
    // Initial application
    // applyRowStyles();

    // Reapply on window resize
    window.addEventListener('resize', applyRowStyles);
</script>
<script>
        $(document).on("click", ".pb_card_details", function(event) {
            event.stopPropagation();  

           var id = $(this).data('id');
           var title = $(this).data('title');
           var genres = $(this).data('genres')!='undefined'? $(this).data('genres'):'-';
         queueTrackingData('trackEvent', ["Watchlist", 'ContentSelected', id + '/' + title],0);
         queueTrackingDataWithDelay('trackContentInteraction', ["Watchlist/ContentSelected" , id + '/' + title, genres],100);
         queueTrackingDataWithDelay('trackContentImpression', [id + '/' + title, genres],200);

        });

        $(document).on("click", ".categaryAddBtn", function(event) {
            event.stopPropagation();  

           var id = $(this).data('id');
           var title = $(this).data('title');
           var genres = $(this).data('genres')!='undefined'? $(this).data('genres'):'-';
           queueTrackingDataWithDelay('trackEvent', ["Watchlist", 'Play', id + '/' + title],300);
           queueTrackingDataWithDelay('trackContentInteraction', ["Watchlist/Play" , id + '/' + title, genres],400);
         queueTrackingDataWithDelay('trackContentImpression', [id + '/' + title, genres],500);

        });


function matomo_hit_watch(user = '' ,type, title,genres) {
    var url = '<?= base_url("/web/Home/matomo_hit"); ?>';
    $.ajax({
      url: url,
      type: "POST",
      dataType: "json",
      async: "true",
      data: {
        user: user,
        types: type, // Typo here, it should be type instead of types
        type: 4,
        title: title,
        genres :genres,
        search_jao:'Watchlist'
      },
      success: function(data) {
        // console.log("Data: ", data);
      },
      error: function(xhr, status, error) {
        //  console.error("Error: " + error);
      }
    });
  }
   $(window).on('load', function() {
    queueTrackingDataWithDelay('trackEvent', ['Page', 'View', 'Watchlist'],0);
    queueTrackingDataWithDelay('trackEvent', ['Watchlist', 'List'],100);

  })
    </script>