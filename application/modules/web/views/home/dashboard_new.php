<?php  $lang_id = ($this->session->userdata('lang_id')) ? $this->session->userdata('lang_id') : 'English';
 ?>
<style>
    .categeryBox{
        padding-top: 30px !important;
    }
    .banner-play-btn{
        display: flex;
    }
    .play_w{

  background: #2b2b2b;
  border-radius: 5px;
  width: 45px;
  height: 45px;
  text-align: center;
  display:flex !important;
  align-items: center;
  justify-content: center;
    }
    .play_w img{
        width:18px !important;
        height:18px !important;
    }
    .d-none {
        display: none !important;
    }
</style>

<section id="data-section">
<div id="banners_new" class="banner_load_af12"></div>

    <div id="banners" class="banner_load_af12 d-none"></div>
    <div id="continue_watching" class="banner_load_af12"></div>



    <div id="trending" class="banner_load_af12"></div>


    <div id="content_languages" class="banner_load_af12"></div>
    <div id="geners_data" class="banner_load_af12"></div>


    
</section>

<section id="shimmer-section">
    <div class="banner_loader banner-place12">
        <div class="">
            <div class="loader-shimmer-banner">
                <div class="banner-position">
                    <div class="loader-shimmer-banner ">
                        <div class="content_banner_dt dt_w col_768_after_display_none disply_768">
                            <div class="conten_holder bnnr_content1">
                                <div class="bannerSubImg shimmer-animation mb-3"></div>
                                <p class="description_dt h-28 shimmer-animation sam_pb">
                                </p>
                                <p class="descrpition_title_dt h-30 shimmer-animation"></p>
                                <p class="pb_ban_action h-28 shimmer-animation "></p>
                            </div>
                            <div class=" home_bnnr_btn">
                                <div class="bnnr_play_btn shimmer-animation"></div>
                            </div>
                        </div>
                    </div>
                    <img src="<?= base_url('assets/images/pb_banner.png'); ?>" class="img-fluid card_shimmer_op" alt="Placeholder" >
                </div>
            </div>
        </div>
    </div>
    <div class=" banner_loader_af banner-place12">
    <?php for ($i = 0; $i <= 4; $i++) { ?>
        <div class="container-fluid">
            <div class="row mt-1 mb-2 m-0 bm">
                <div class="col-md-12 d-flex">
                    <h6 class="defaultColr mt-2 mb-4 ms-3 pl_5 delayed-element d-block shimmer-animation">
                        <p class="mb-0 card_shimmer_op">movies</p>
                    </h6>
                    <a class="defaultColr mt-1 mb-3 pr_5 view_m_btn d-block shimmer-animation">
                        <span class="mb-0 card_shimmer_op">View all</span>
                    </a>
                </div>

            </div>

            <div class="carousel_bott4">
                <?php for ($j = 0; $j <= 8; $j++) { ?>
                    <div class="card_shimmer">
                        <img src="<?= base_url('assets/images/placholder-img.png'); ?>" class="img-fluid card_shimmer_op" alt="Placeholder">

                    </div>
                <?php } ?>
            </div>
        </div>
    <?php
    } ?>
</div>
<div class="banner_loader_af banner-place12">
    <?php for ($i = 0; $i <= 1; $i++) { ?>
        <div class="container-fluid">
            <div class="row mt-1 mb-2 m-0 bm">
                <div class="col-md-12 d-flex">
                    <h6 class="defaultColr mt-2 mb-4 ms-3 pl_5 delayed-element d-block shimmer-animation">
                        <p class="mb-0 card_shimmer_op">movies</p>
                    </h6>
                    <a class="defaultColr mt-1 mb-3 pr_5 view_m_btn d-block shimmer-animation">
                        <span class="mb-0 card_shimmer_op">View all</span>
                    </a>
                </div>

            </div>

            <div class="carousel_bott4">
                <?php for ($j = 0; $j <= 8; $j++) { ?>
                    <div class="card_shimmer">
                        <img src="<?= base_url('assets/images/placeholder-poster-img.png'); ?>" class="img-fluid card_shimmer_op" alt="Placeholder">

                    </div>
                <?php } ?>
            </div>
        </div>
    <?php
    } ?>
</div>
</section>

<!-- <?php //if (empty($Banner) && empty($c_watch) && empty($home) && empty($genre) && empty($cont_lang)) { ?>

    <div class="col-md-6 m-auto text-center watchListNo">
        <div class="no_dt_found">
            <img src="<?//= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
            <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
            <p class="mb-0 text_ac"><?= NoListFound; ?></p>
        </div>
    </div>

<?php // } ?> -->

<!-- Modal -->

<!-- <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style='max-width: 72%;'>
        <div class="modal-content vds_cont">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <video id='hls-example' class="video-js vjs-default-skin" width="400" height="300" controls>
                    <source type="application/x-mpegURL" src="">
                </video>
            </div>
        </div>
    </div>
</div> -->

<!-- Dashboard Section End -->

<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->

<script type="text/javascript">
var lang_title = "<?= ucwords($lang_id )?>";

    var c_class = 'banner-bottom-sec';
    $(".close").click(function() {
        location.reload();
    });
    var elementsToCheck = [];

    var call = true;

     
    var bannerfound = false;
    function renderBanners_new(bannerData) {
        console.log(bannerData,"fsdsgs");
        if (Array.isArray(bannerData) && bannerData.length > 0) {
        elementsToCheck.push({ id: 'banners', name: 'Banners Section' });
        }
        var length = 0;
        const initializeSlickSlider = new Promise((resolve, reject) => {
        var copy = '<?= $this->lang->line('copy') ?>'
        var banner_base = '<?php echo base_url() ?>';
        // $(".banner_load_af1").show();
        var banner_data = '<section class="mb-3 banner_after_navbar position-relative">' +
        
            '<div class="carousel_top2 ">';
        bannerData.forEach(function(item) {

            var descriptions ='';
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


            // var cat_tit = item.category_title ? item.category_title + ' | ' : '';
            item.banner_url = (item.banner_url?item.banner_url:'<?=base_url(BannerPlaceholder)?>')
            var geners = item.genre_titles ? item.genre_titles.replace(/,/g, ' | ') : '';
            var cattitle=(item.category_title)?item.category_title +" | ":'';
            const action = cattitle+ geners.split('|').map(items => items.trim()).slice(0, 3).join(' | ');
            //var action = (item.genre_titles) ? item.genre_titles.replace(/,/g, ' | ') : '';
            var siturl1 = 'play-media?id=' + item.video_ids+'&type='+'banners';

            if(!item.is_paid){
                item.is_paid = 0;
            }
            if((isSubscribed != 1) && (item.is_paid==1) && (sess_id!=="")){
                var message = (item.media_type == 0) ? subscribe_watch :subscribe_listen;
            }
            else if((isSubscribed != 1) && (item.is_paid==1) && (sess_id=="")){
                var message = (item.media_type == 0) ? subscribe_watch :subscribe_listen;
            }
            else if ((item.is_paid==2)  && (item.is_rented != 1)) {
                var message = (item.media_type == 0) ? available_to_rent :available_to_rent;
                siturl1 = 'play-video?id=' + item.ids+'&type='+'banners'; 
            }
            else if( (item.is_paid==2) && (item.is_rented == 1)){
                var message = (item.media_type == 0) ? watch_app :listen;
                siturl1 = 'play-media?id=' + item.ids+'&type='+'banners'; 
            }
            else{
                var message = (item.media_type == 0) ? watch_app :listen;
                
            }
            var siturl = 'play-video?id=' + item.ids+'&type='+'banners';
            var seconds = item.video_duration ;
            var hours = Math.floor(seconds / 3600);
            var remainingSeconds = seconds % 3600;
            var minutes = Math.floor(remainingSeconds / 60);

            var timeLeftString;
            
            if (hours >= 1) {
                timeLeftString = hours + "h " + minutes + "m";
            } else if (seconds > 0 && minutes == 0) {
                timeLeftString = "1m";
            } else {
                if (parseInt(minutes) < 0) {
                    minutes = 0;
                }
                timeLeftString = minutes + "m";
            }
            //console.log(timeLeftString);
            if(item.skip_season == 0){
                timeLeftString="";
                if (item.season_count == 1) {
                    timeLeftString=item.season_count + " Season";
                }else if(item.season_count > 1){
                    timeLeftString=item.season_count + " Seasons";
                }
            }

            if ((item.banner_type == 0) && (item.id > 0)) {
                   length++;
                bannerfound = true;
                banner_data += '<div class="item video_play" data-url="' + item.file_url + '" data-id="' + item.id + '">' +
                    '<div class="w-100">' +
                    '<div class="img_cara responsive_banner ">' +
                    '<div class="row m-0">' +
                    '<div class="col-lg-12 col-sm-12 p-0 col-title_img">' +
                   
                    '<div class="banner-position play_hover_video" data-id="' + item.id + '" data-genres="' + item.genre_titles + '" data-title="' + item.title + '" data-url="' + item.file_url + '" data-banner="' + item.banner_url + '">' +
                    '<div class="volume_banner_dt">'+
        '<div class="tooltip-text" id="mute-tooltip-'+item.id+'" tooltip="<?= $this->lang->line("unmute-tra") ?>">'+
                    '<a href="javascript:void(0);" class="banner_volume ban-vol-btn" data-id="'+item.id+'">'+
                    '<img id="mute-icon-'+item.id+'" src="<?= base_url('assets/website_assets/css/video_player_icons/mute1.svg') ?>" class="img-fluid">'+
                    '</a>'+
                    '</div>'+
                    '</div>'+
                    '<div class="content_banner_dt col_768_after_display_none disply_768 banner_pos_dt">' +
                    '<a onClick="urls_call(\'' + siturl + '\')" class="pb_banner_vd">' +
                    '<div class="conten_holder bnnr_content">' +
                    '<div class="bannerSubImg">' +
                    (item.banner_thumbnail ? '<img src="' + item.banner_thumbnail + '" class="img-fluid banner_img" alt="thumbnail" loading="lazy">' : '') +
                    '</div>' +
                     '<p class="description_dt ml23 d-flex ml25 mb-1 align-items-center">';
                    if ((item.released_on!=null) && (item.released_on!=0)) {
                       banner_data += item.released_on + ' <span class="dotspan">&#9679;</span> ';
                    }
                    if ((hours > 0) || (minutes > 0)) {
                       banner_data += timeLeftString + ' <span class="dotspan">&#9679;</span> ';
                    }
                    if (item.language) {
                        banner_data += item.language;
                    }
                var stringa = JSON.stringify(item.rating_json);
                var check_imdb = JSON.parse(stringa);
                banner_data += item.certificate ? ' <span class="dotspan">●</span><span class="ua_16 ua-banner">' + item.certificate + '</span>' : '';
                if (check_imdb && check_imdb.length >= 2) {
                    if (check_imdb[0].agency) {
                if (!item.certificate || item.certificate.length === 0) {
                banner_data += '<span class="dotspan">●</span>';
                }
                banner_data += 
                '<span class="imd_image_banner"><img src="<?= base_url('assets/images/imd_banne_img.svg'); ?>" class="imd_banne_imgs" alt="imd_banne_img"></span>' +
                '<span class="imd_rating ua-banner">' + (check_imdb[0].rating ? check_imdb[0].rating : '') + '</span>';
                } else if (check_imdb[0].agency.length === 0 && check_imdb[1].agency) {
                if (!item.certificate || (item.certificate.length === 0 && check_imdb[0].agency.length === 0)) {
                banner_data += '<span class="dotspan">●</span>';
                }
                banner_data += 
                '<span class="imd_image_banner"><img src="<?= base_url('assets/images/Rotten_Tomatoes.svg'); ?>" class="imd_banne_imgs" alt="imd_banne_img"></span>' +
                '<span class="imd_rating ua-banner">' + (check_imdb[1].rating ? check_imdb[1].rating : '') + '</span>';
                }
                }else{
                var rating_icons = '';
                if(check_imdb[0].agency == 'Rotten Tomato'){
                rating_icons = "<?= base_url("assets/images/Rotten_Tomatoes.svg"); ?>";
                }else{
                rating_icons = "<?= base_url("assets/images/imd_banne_img.svg"); ?>";
                }
                if (check_imdb[0] && check_imdb[0].agency) {
                if (!item.certificate || item.certificate.length === 0) {
                banner_data += '<span class="dotspan">●</span>';
                }
                banner_data += 
                '<span class="imd_image_banner"><img src="'+rating_icons+'" class="imd_banne_imgs" alt="imd_banne_img"></span>' +
                '<span class="imd_rating ua-banner">' + (check_imdb[0].rating ? check_imdb[0].rating : '') + '</span>';
                }
                }

                    banner_data +=  '<p class="descrpition_title_dt">' +
                    descriptions +
                    '</p>' +
                    '<div class="d-flex align-items-center">' +
                    '<p class="pb_ban_action me-1 mb-0">' + action + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</a>' +
                    '<div class="home_bnnr_btn">' +
                    '<div class="banner-playe d-flex align-items-center py-1 w-100">' +
                    '<div class="d-flex align-items-center">' +
                    '<button class="bnnr_play_btn bnner_play_color bannerPlayBtn" onClick="urls_call(\'' + siturl1 + '\')">' +
                    '<img class="img-fluid" src="<?= base_url('assets/images/playBtn.png') ?>" alt="play icon" loading="lazy">' +
                    message +
                    '</button>' +
                    '</div>' +
                    '<div class="banner-play-btn">' +
                    
                    '';

                    if ("<?=$this->session->profile_id?>") {

                        banner_data += `<div class="ms-3 wt-add tooltip-text watc_pb" id="watchlist_toggle_'+item.show_id+'"><div id="fav-${item.show_id}" data-id="${item.show_id}" data-title="${item.title}" data-is_paid="${item.is_paid??0}" data-poster="${item.poster_url}" data-thumbnail="${item.thumbnail}" data-description="${descriptions.replace('"',' ')}" data-encshowid="${item.ids}" data-genres="${item.genre_titles}" data-mediatype="${item.media_type}">`;
                        var nadded = '';
                        var added = '';
                        if (item.in_watchlist != 1) {
                            nadded = 'd-none';
                        }else{
                            added = 'd-none';
                        }
                        
                            banner_data += `<a href = "javascript:void(0);" class="play_w fav-item-${item.show_id} ${added}" onclick="addToWatchList(${item.show_id},1)" tooltip="<?= $this->lang->line('add_to_watchlist'); ?>">
                            <img class = "img-fluid playAdd" src="assets/images/jointWatch.png" alt = "joinwatch" >
                           </a>`;
                           banner_data += `<a href="javascript:void(0);" class="play_w bg-green fav-item-${item.show_id} ${nadded}"  onclick="addToWatchList(${item.show_id},3)" tooltip="<?= $this->lang->line('added_to_watchlist'); ?>">
                                 <img class="img-fluid playAdd" src="assets/images/click.svg" alt="joinwatch">
                                </a></div></div>`;
                    }
                    banner_data += '<div class="share_hl  ms-3 tooltip-text" tooltip="<?= $this->lang->line('share'); ?>">' +
                      '<span class="shareHls" data-id="'+item.id+'"data-genres="'+item.genre_titles+'"data-title="'+item.title+'" >' +
                        '<a href="javascript:void(0)">' +
                        '<img src="<?= base_url('assets/images/shareNew.svg') ?>" id="shareHls-'+item.id+'" alt="share" class="img-fluid">' +
                        '</a>' +
                        '</span>' +
                        '<div class="share_hl_popup-'+item.id+' share_hl_popup d-none">' +
                            '<form class="mb-0">' +
                            '<div class="share_bg">' +
                            '<div class="form-group mb-0 w-100 position-relative">' +
                            '<img src="<?= base_url('assets/images/copy_img.svg') ?>" alt="copy" class="img-fluid copy_share" style="margin-top:2px; height:18px !important">' +
                            '<input type="text" class="form-control shadow-none share_input" name="inputText" id="inputText-'+item.id+'" value="' + banner_base+siturl + '" placeholder="Link Address" readonly>' +
                            '</div>' +
                            '<a class="b_t_n b_t_n2 bg_btn_color" id="copyBtn-'+item.id+'" href="javascript:void(0)" style="color:#fff !important;background: var(--pbg);">' + copy + '</a>' +
                            '</div>' +
                            '</form>' +
                        '</div>' +
                    '</div>' +
                    '</div>' +
                    '<input type="hidden" id="product_id" value="' + item.id + '">' +
                    '<div class="banner-watch-btn ms-4" style="display:none;">' +
                    '<a href="javascript:void(0)" onclick="add_to_watchlist(' + item.show_id + ',' + item.video_id + ',1)"></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<p class="c_over col_768_after_display_none">&nbsp;</p>' +
                     
                    '<a onClick="urls_call(\'' + siturl + '\')" class="pb_banner_vd">' +
                    '<div class="position-relative">' +
                     
                    '<div data-vjs-player>' +
                    '<video id="my_video_' + item.id + '" width="1920" height="1080" class="video-js my_video" disablePictureInPicture poster="' + item.banner_url + '" preload="auto"></video>' +
                    '</div>' +
                    '<p class="c_over_bott c_over_bott_dt mb-0">&nbsp;</p>' +
                    '</div>' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' + '</div>';
                    // checkWatchlist(item.show_id);
            }

        });
        banner_data += '</div>' +
            '</section>';
        $('#banners_new').html(banner_data);
         resolve();
         muteunmute();
    });
}

    async function manageMasterContent() {  
        // $('#overlayonajaxhit').css('display','block');      
        var homeKey = 'masterContent-'+(feedType??0);
        fetchCacheData(homeKey)
            .then(async (cache_data) => {
                if (cache_data.data) {
                    let time = Date.now();
                    if (time > cache_data.cacheExpiration) {
                        await removeCacheData(homeKey, 'all');
                        cache_data = null;
                        fetchMasterContentAndUpdateCache(null, cache_data);
                    } else {
                        if (call) {
                            call = false;
                            renderBanners(cache_data.data.nav_banner.data.banners);
                            renderTrendingSections(cache_data.data.home_data.data);
                            renderGenres(cache_data.data.nav_banner.data.genres);
                            renderContentLanguages(cache_data.data.nav_banner.data.content_languages);
                            // if (!bannerfound) {
                            //     if ($('.bottom_banner').hasClass('banner-bottom-sec')) {
                            //         $('.bottom_banner').removeClass('banner-bottom-sec');
                            //         $('.bottom_banner').addClass('categeryBox');
                            //     }
                            // }
                        }
                    }
                } else {
                    // await fetchMasterContentAndUpdateCache(null, cache_data);
                }
            });
            // setTimeout(()=>{$('#overlayonajaxhit').css('display','none');},1000);        
    }

    var i = 1;
    async function continueWatching(key) {
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
                            c_class = '';
                            $('.bottom_banner').removeClass('banner-bottom-sec');
                            
                            continue_watching(cache_data.data);
                        }
                        // continue_watching(cache_data.data);
                    }
                } else {                    
                    if (i==1) {
                        i = 2;
                        fetchWatchingDetailsAndUpdateCache(null, cache_data);
                    }
                    continueWatching(contKey);
                }
            });
    }

    var contKey = "<?= ($this->session->profile_id) . '-continueWatching' ?>";
    $(document).ready(function() {
        var session_id = "<?= $this->session->profile_id ?? 0 ?>";
        if (session_id != 0) {
            continueWatching(contKey);
        }
        // manageMasterContent();
        // $('#overlayonajaxhit').css('display', 'none');
        $('.delayed-element').css('display', 'block');
        // $('.banner-place1').hide();
    });

    var check = '<?= ($this->session->userdata('id')) ?? 0 ?>';
    var c_watch = false;
    // let key = "<?= ($_SESSION['profile_id']) ?? 0 ?>-continueWatching";
    // $(document).ready(function() {

    //     fetchCacheData(key)
    //         .then((result) => {
    //             if(result.data){
    //                 c_watch = true;
    //                 continue_watching(result.data);
    //                 console.log("true",c_watch);
    //             } else {
    //                 console.log("false");
    //             }

    //             console.log(result.data);
    //         })
    //         .catch((error) => {
    //             console.error("Error fetching cache data:", error);
    //         });

    // });

    var c_watch = false;
    var request = new Request("<?= base_url('web/home/ajax_data_new') ?>");
    var data;
    var banner = '';
    var banner_data = '';
    var generes_data = '';
    var content_languages = '';
    var trending = '';


    caches.open('appCache').then(async function(cache) {
        cache.delete(request); 
        var watchData = '';
        var catchData = '';  
        var countd = '';
        // var watch = await cache.match(key);
        // if (watch) {
        //     watchData = await watch.json();
        //      console.log(watchData,'continue_watchingssss');
        //      watchData.data.forEach(function(item) {
        //         if(item.is_deleted==0){
        //             countd = countd+1;
        //         }
        //      });

        // if (check && countd >0) {
        //         c_class = '';
        //         continue_watching(watchData.data);
        //     }
        // }
        var all_data = await cache.match(request);
        if (all_data) {
            catchData = await all_data.json();
        } else {
            var all_data = await fetch(request);
            catchData = await all_data.json();
            cache.put(request, new Response(data));
            await cache.put(request, new Response(JSON.stringify(catchData)));
        }
        // Example of calling renderBanners_new
        catchData.data.forEach(item => {
            if(item.playlist_type=='banner'){
                console.log(item.playlist_type,'akash');
              //  $('#banners').hide();
                renderBanners_new(item.list);
            }
            });

        // catchData.data.forEach(function(item) {
        //     if(item.playlist_type=='banner'){
        //         console.log(item.playlist_type,'akash');
        //         renderBanners_new(item.list);
        //     }

        // });
      //  $("div.banner-place1").hide();
        // renderBanners(item.list);
        // renderTrendingSections(catchData.home_data.data);
        // renderGenres(catchData.nav_banner.data.genres);
        // renderContentLanguages(catchData.nav_banner.data.content_languages);
    });

    var bannerfound = false;
    function renderBanners(bannerData) {//console.log(bannerData);
        if (Array.isArray(bannerData) && bannerData.length > 0) {
        elementsToCheck.push({ id: 'banners', name: 'Banners Section' });
        }
        var length = 0;
        const initializeSlickSlider = new Promise((resolve, reject) => {
        var copy = '<?= $this->lang->line('copy') ?>'
        var banner_base = '<?php echo base_url() ?>';
        // $(".banner_load_af1").show();
        var banner_data = '<section class="mb-3 banner_after_navbar position-relative">' +
        
            '<div class="carousel_top2 ">';
        bannerData.forEach(function(item) {

            var descriptions ='';
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


            // var cat_tit = item.category_title ? item.category_title + ' | ' : '';
            item.banner_url = (item.banner_url?item.banner_url:'<?=base_url(BannerPlaceholder)?>')
            var geners = item.genre_titles ? item.genre_titles.replace(/,/g, ' | ') : '';
            var cattitle=(item.category_title)?item.category_title +" | ":'';
            const action = cattitle+ geners.split('|').map(items => items.trim()).slice(0, 3).join(' | ');
            //var action = (item.genre_titles) ? item.genre_titles.replace(/,/g, ' | ') : '';
            var siturl1 = 'play-media?id=' + item.video_ids+'&type='+'banners';

            if(!item.is_paid){
                item.is_paid = 0;
            }
            if((isSubscribed != 1) && (item.is_paid==1) && (sess_id!=="")){
                var message = (item.media_type == 0) ? subscribe_watch :subscribe_listen;
            }
            else if((isSubscribed != 1) && (item.is_paid==1) && (sess_id=="")){
                var message = (item.media_type == 0) ? subscribe_watch :subscribe_listen;
            }
            else if ((item.is_paid==2)  && (item.is_rented != 1)) {
                var message = (item.media_type == 0) ? available_to_rent :available_to_rent;
                siturl1 = 'play-video?id=' + item.ids+'&type='+'banners'; 
            }
            else if( (item.is_paid==2) && (item.is_rented == 1)){
                var message = (item.media_type == 0) ? watch_app :listen;
                siturl1 = 'play-media?id=' + item.ids+'&type='+'banners'; 
            }
            else{
                var message = (item.media_type == 0) ? watch_app :listen;
                
            }
            var siturl = 'play-video?id=' + item.ids+'&type='+'banners';
            var seconds = item.video_duration ;
            var hours = Math.floor(seconds / 3600);
            var remainingSeconds = seconds % 3600;
            var minutes = Math.floor(remainingSeconds / 60);

            var timeLeftString;
            
            if (hours >= 1) {
                timeLeftString = hours + "h " + minutes + "m";
            } else if (seconds > 0 && minutes == 0) {
                timeLeftString = "1m";
            } else {
                if (parseInt(minutes) < 0) {
                    minutes = 0;
                }
                timeLeftString = minutes + "m";
            }
            //console.log(timeLeftString);
            if(item.skip_season == 0){
                timeLeftString="";
                if (item.season_count == 1) {
                    timeLeftString=item.season_count + " Season";
                }else if(item.season_count > 1){
                    timeLeftString=item.season_count + " Seasons";
                }
            }

            if ((item.banner_type == 0) && (item.id > 0)) {
                   length++;
                bannerfound = true;
                banner_data += '<div class="item video_play" data-url="' + item.file_url + '" data-id="' + item.id + '">' +
                    '<div class="w-100">' +
                    '<div class="img_cara responsive_banner ">' +
                    '<div class="row m-0">' +
                    '<div class="col-lg-12 col-sm-12 p-0 col-title_img">' +
                   
                    '<div class="banner-position play_hover_video" data-id="' + item.id + '" data-genres="' + item.genre_titles + '" data-title="' + item.title + '" data-url="' + item.file_url + '" data-banner="' + item.banner_url + '">' +
                    '<div class="volume_banner_dt">'+
        '<div class="tooltip-text" id="mute-tooltip-'+item.id+'" tooltip="<?= $this->lang->line("unmute-tra") ?>">'+
                    '<a href="javascript:void(0);" class="banner_volume ban-vol-btn" data-id="'+item.id+'">'+
                    '<img id="mute-icon-'+item.id+'" src="<?= base_url('assets/website_assets/css/video_player_icons/mute1.svg') ?>" class="img-fluid">'+
                    '</a>'+
                    '</div>'+
                    '</div>'+
                    '<div class="content_banner_dt col_768_after_display_none disply_768 banner_pos_dt">' +
                    '<a onClick="urls_call(\'' + siturl + '\')" class="pb_banner_vd">' +
                    '<div class="conten_holder bnnr_content">' +
                    '<div class="bannerSubImg">' +
                    (item.banner_thumbnail ? '<img src="' + item.banner_thumbnail + '" class="img-fluid banner_img" alt="thumbnail" loading="lazy">' : '') +
                    '</div>' +
                     '<p class="description_dt ml23 d-flex ml25 mb-1 align-items-center">';
                    if ((item.released_on!=null) && (item.released_on!=0)) {
                       banner_data += item.released_on + ' <span class="dotspan">&#9679;</span> ';
                    }
                    if ((hours > 0) || (minutes > 0)) {
                       banner_data += timeLeftString + ' <span class="dotspan">&#9679;</span> ';
                    }
                    if (item.language) {
                        banner_data += item.language;
                    }
                var stringa = JSON.stringify(item.rating_json);
                var check_imdb = JSON.parse(stringa);
                banner_data += item.certificate ? ' <span class="dotspan">●</span><span class="ua_16 ua-banner">' + item.certificate + '</span>' : '';
                if (check_imdb && check_imdb.length >= 2) {
                    if (check_imdb[0].agency) {
                if (!item.certificate || item.certificate.length === 0) {
                banner_data += '<span class="dotspan">●</span>';
                }
                banner_data += 
                '<span class="imd_image_banner"><img src="<?= base_url('assets/images/imd_banne_img.svg'); ?>" class="imd_banne_imgs" alt="imd_banne_img"></span>' +
                '<span class="imd_rating ua-banner">' + (check_imdb[0].rating ? check_imdb[0].rating : '') + '</span>';
                } else if (check_imdb[0].agency.length === 0 && check_imdb[1].agency) {
                if (!item.certificate || (item.certificate.length === 0 && check_imdb[0].agency.length === 0)) {
                banner_data += '<span class="dotspan">●</span>';
                }
                banner_data += 
                '<span class="imd_image_banner"><img src="<?= base_url('assets/images/Rotten_Tomatoes.svg'); ?>" class="imd_banne_imgs" alt="imd_banne_img"></span>' +
                '<span class="imd_rating ua-banner">' + (check_imdb[1].rating ? check_imdb[1].rating : '') + '</span>';
                }
                }else{
                var rating_icons = '';
                if(check_imdb[0].agency == 'Rotten Tomato'){
                rating_icons = "<?= base_url("assets/images/Rotten_Tomatoes.svg"); ?>";
                }else{
                rating_icons = "<?= base_url("assets/images/imd_banne_img.svg"); ?>";
                }
                if (check_imdb[0] && check_imdb[0].agency) {
                if (!item.certificate || item.certificate.length === 0) {
                banner_data += '<span class="dotspan">●</span>';
                }
                banner_data += 
                '<span class="imd_image_banner"><img src="'+rating_icons+'" class="imd_banne_imgs" alt="imd_banne_img"></span>' +
                '<span class="imd_rating ua-banner">' + (check_imdb[0].rating ? check_imdb[0].rating : '') + '</span>';
                }
                }

                    banner_data +=  '<p class="descrpition_title_dt">' +
                    descriptions +
                    '</p>' +
                    '<div class="d-flex align-items-center">' +
                    '<p class="pb_ban_action me-1 mb-0">' + action + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</a>' +
                    '<div class="home_bnnr_btn">' +
                    '<div class="banner-playe d-flex align-items-center py-1 w-100">' +
                    '<div class="d-flex align-items-center">' +
                    '<button class="bnnr_play_btn bnner_play_color bannerPlayBtn" onClick="urls_call(\'' + siturl1 + '\')">' +
                    '<img class="img-fluid" src="<?= base_url('assets/images/playBtn.png') ?>" alt="play icon" loading="lazy">' +
                    message +
                    '</button>' +
                    '</div>' +
                    '<div class="banner-play-btn">' +
                    
                    '';

                    if ("<?=$this->session->profile_id?>") {

                        banner_data += `<div class="ms-3 wt-add tooltip-text watc_pb" id="watchlist_toggle_'+item.show_id+'"><div id="fav-${item.show_id}" data-id="${item.show_id}" data-title="${item.title}" data-is_paid="${item.is_paid??0}" data-poster="${item.poster_url}" data-thumbnail="${item.thumbnail}" data-description="${descriptions.replace('"',' ')}" data-encshowid="${item.ids}" data-genres="${item.genre_titles}" data-mediatype="${item.media_type}">`;
                        var nadded = '';
                        var added = '';
                        if (item.in_watchlist != 1) {
                            nadded = 'd-none';
                        }else{
                            added = 'd-none';
                        }
                        
                            banner_data += `<a href = "javascript:void(0);" class="play_w fav-item-${item.show_id} ${added}" onclick="addToWatchList(${item.show_id},1)" tooltip="<?= $this->lang->line('add_to_watchlist'); ?>">
                            <img class = "img-fluid playAdd" src="assets/images/jointWatch.png" alt = "joinwatch" >
                           </a>`;
                           banner_data += `<a href="javascript:void(0);" class="play_w bg-green fav-item-${item.show_id} ${nadded}"  onclick="addToWatchList(${item.show_id},3)" tooltip="<?= $this->lang->line('added_to_watchlist'); ?>">
                                 <img class="img-fluid playAdd" src="assets/images/click.svg" alt="joinwatch">
                                </a></div></div>`;
                    }
                    banner_data += '<div class="share_hl  ms-3 tooltip-text" tooltip="<?= $this->lang->line('share'); ?>">' +
                      '<span class="shareHls" data-id="'+item.id+'"data-genres="'+item.genre_titles+'"data-title="'+item.title+'" >' +
                        '<a href="javascript:void(0)">' +
                        '<img src="<?= base_url('assets/images/shareNew.svg') ?>" id="shareHls-'+item.id+'" alt="share" class="img-fluid">' +
                        '</a>' +
                        '</span>' +
                        '<div class="share_hl_popup-'+item.id+' share_hl_popup d-none">' +
                            '<form class="mb-0">' +
                            '<div class="share_bg">' +
                            '<div class="form-group mb-0 w-100 position-relative">' +
                            '<img src="<?= base_url('assets/images/copy_img.svg') ?>" alt="copy" class="img-fluid copy_share" style="margin-top:2px; height:18px !important">' +
                            '<input type="text" class="form-control shadow-none share_input" name="inputText" id="inputText-'+item.id+'" value="' + banner_base+siturl + '" placeholder="Link Address" readonly>' +
                            '</div>' +
                            '<a class="b_t_n b_t_n2 bg_btn_color" id="copyBtn-'+item.id+'" href="javascript:void(0)" style="color:#fff !important;background: var(--pbg);">' + copy + '</a>' +
                            '</div>' +
                            '</form>' +
                        '</div>' +
                    '</div>' +
                    '</div>' +
                    '<input type="hidden" id="product_id" value="' + item.id + '">' +
                    '<div class="banner-watch-btn ms-4" style="display:none;">' +
                    '<a href="javascript:void(0)" onclick="add_to_watchlist(' + item.show_id + ',' + item.video_id + ',1)"></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<p class="c_over col_768_after_display_none">&nbsp;</p>' +
                     
                    '<a onClick="urls_call(\'' + siturl + '\')" class="pb_banner_vd">' +
                    '<div class="position-relative">' +
                     
                    '<div data-vjs-player>' +
                    '<video id="my_video_' + item.id + '" width="1920" height="1080" class="video-js my_video" disablePictureInPicture poster="' + item.banner_url + '" preload="auto"></video>' +
                    '</div>' +
                    '<p class="c_over_bott c_over_bott_dt mb-0">&nbsp;</p>' +
                    '</div>' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' + '</div>';
                    // checkWatchlist(item.show_id);
            }

        });
        banner_data += '</div>' +
            '</section>';
        $('#banners').html(banner_data);
         resolve();
         muteunmute();
    });

        // initializeSlickSlider.then(() => {
    // $('.carousel_top2').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     dots: true,
    //     prevArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-left"></i></button>',
    //     nextArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-right"></i></button>',
    //     speed: 500,
    //     cssEase: 'linear',
    //     autoplay: true,
    //     autoplaySpeed: 10000,
    //    // dots: $('.carousel_top2').find('.slick-slide').length > 1 ? true : false
    // });
// });
   // if (length == 1) {
   //      var slickDotsElement = document.querySelector('.slick-dots li.slick-active');
   //       console.log("ssstestxxx",slickDotsElement);
   //      if (slickDotsElement) {
   //          console.log("ssstest");
   //      slickDotsElement.style.display = 'none';
        
   //      }
   //    }
        // $(document).ready(function() {
            var id = 0;
            $(document).on('click', function(event) {
                if (!$(event.target).closest('.shareHls').length && !$(event.target).closest('#copyBtn-'+id).length) {
                    $('.share_hl_popup').addClass('d-none');
                    $('#copyBtn-'+id).html('<?= $this->lang->line('copy') ?>');
                }
                if ($(event.target).is('a#copyBtn-'+id)) {
                    var copyButton = $('#copyBtn-' + id);
                    $('#copyBtn-'+id).text("<?=$this->lang->line('copied')?>");
                    $('#copyBtn-'+id).addClass('copy_share_btn');
                    // var inputText = $("#inputText").val();
                    // copyToClipboard(inputText);
                    var link = $('#inputText-'+id).val();
                    navigator.clipboard.writeText(link);
                      setTimeout(function() {
                    copyButton.html('<?= $this->lang->line('copy') ?>'); // Change 'Copy' to the original text you want to display
                    $('.bg_btn_color').removeClass('copy_share_btn');
                }, 2000);
                    //console.log(link);
                }
            });

            $(".shareHls").click(function() {
                id = $(this).data('id');
                geners = $(this).data('genres');
                title = $(this).data('title');
                matomo('Share', 'Share', id+'/'+title, geners);
                console.log('title',title);
                // $(".share_hl_popup-"+id).toggleClass("d-none");
                 var tooltipElement = $(".share_hl_popup-" + id);

                 tooltipElement.toggleClass("d-none");
                $('.share_hl').attr('tooltip', '');
                setTimeout(function() {
                    tooltipElement.addClass("d-none");
                }, 3000);
         // tooltipElement.toggleClass("d-none");
            });
             $(".shareHls").hover(
      function() {
        if ($(".share_hl_popup"+id).hasClass("d-none")) {
          $('.share_hl').attr('tooltip', '<?= $this->lang->line('share'); ?>');
        }
      },
      function() {
        // No need to do anything on mouse leave
      }
    );
            // $('#container').on('click', '.copyBtn', function() {

        // });


        // function copyToClipboard(text) {
        //     const el = document.createElement('textarea');
        //     el.value = text;
        //     document.body.appendChild(el);
        //     el.select();
        //     document.execCommand('copy');
        //     document.body.removeChild(el);
        //     $('#copyBtn').html('Copied');
        // }



    }

    async function checkWatchlist(showID) {
        html = `<span class="wt-add tooltip-text d-inline-block" tooltip="<?= $this->lang->line('add_to_watchlist'); ?>"><a href="javascript:void(0);" onclick="add_to_watchList(1)" >
            <img class="img-fluid add_watch remove_watch" src="assets/images/add.svg" alt="joinwatch">
            </a></span>`;
        $('#watchlist_toggle_'+showID).html(html);
        let watchKey = watchListCacheKey;
        await fetchCacheData(watchKey)
          .then((result) => {
            if (result) {
              result.data.forEach((item, key) => {
                if (item.show_id == showID) {
                  if (item.is_deleted != 1) {
                    html = `<span class="wt-remove tooltip-text d-inline-block" id="remove_watchlist" tooltip="<?= $this->lang->line('added_to_watchlist'); ?>"><a href="javascript:void(0);" onclick="add_to_watchList(3)">
                  <img src="assets/images/click.svg" alt="joinwatch" class=" img-fluid add_watch remove_watch">
                  </a></span>`;
                  }
                }
              })
            }
          });
        $('#watchlist_toggle_'+showID).html(html);
        $('.d-none').css('display', 'none !important');
    }

    function copyUrl(id){
    // $("#copyBtn-"+id).click(function() {
         matomo('Share', 'Share', title, geners);
        var copyText = $("#inputText-"+id);
        copyText.val();
        navigator.clipboard.writeText(copyText.val());
        // console.log(copyText)
        // Copy the selected text to clipboard
        document.execCommand('copy');
        $('#copyBtn-'+id).html("<?=$this->lang->line('copied')?>")
        // $("#share_btn").modal('hide');
        //location.reload();
        // Deselect the text
        //window.getSelection().removeAllRanges();
      // });
    }


    function renderTrendingSections(homeData) {
        console.log(homeData);return false;
        // $(".banner_load_af1").show();
        if (Array.isArray(homeData) && homeData.length > 0) {
            elementsToCheck.push({ id: 'trending', name: 'Home Content Section ' });
        }
        let j = 1;
        let k = 1;
        homeData.forEach(function(item) { 
            const category_id = 'dashboard-details?category_id==' + item.category_id;
            if (!item.shows.length) {
                return; // Skip this iteration if shows array is empty
            }
            const home = true;
            let video_data_id = "";
            if(item.is_trending == 1){
                video_data_id = "trending_"
            }
            if(item.recommendation == 1){
                video_data_id = "recommendation_"
            }

            const trending = `
                <section class="mb-4 mt-2 viewAllSection ${(j == 1) ? 'bottom_banner '+c_class : ''}">
                    <div class="container-fluid" >
                        <div class="row mt-1">
                        <div class="col-md-12">
                        <div class="d-flex mb-2 view-dtsd">
                            <h6 class="defaultColr mt-2 mb-4 pl_5 delayed-element">
                                ${item.title}
                            </h6>
                            ${!item.is_trending  && !item.recommendation && item.shows.length >= 10 ? `
                        <a onClick="urls_call('${category_id}')" class="defaultColr mt-1 mb-3 pr_5 view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';">
                            View All <i class="fas fa-solid fa-arrow-right"></i>
                        </a>
                        </div>
                    ` : ''}
                        </div>
                        <div class="carousel_bott4 owl-carousel owl-theme banner_load_af ${(k == 1) ? 'tobSlider' : ''}">
                            ${item.shows.slice(0, 10).map(data => { 

                                if((isSubscribed != 1) && (data.is_paid!=0 && data.is_paid!=2) && (sess_id!=="")){
                                    var message = (data.type == 0) ? subscribe_watch :subscribe_listen;
                                    var siturl = 'play-video?id=' + data.ids;
                                    // var siturl1 = 'subscription';
                                    var siturl1 = 'play-episode?id=' + data.ids;
                                }
                                else if((isSubscribed != 1) && (data.is_paid!=0 && data.is_paid!=2) && (sess_id=="")){
                                    var message = (data.type == 0) ? subscribe_watch :subscribe_listen;
                                    var siturl = 'play-video?id=' + data.ids;
                                     var siturl1 = 'subscription';
                                    //var siturl1 = 'play-episode?id=' + data.ids;
                                }
                                else if (data.is_paid==2 && (data.is_rented != 1)) {
                                    var message = (data.type == 0) ? available_to_rent :available_to_rent;
                                    var siturl = 'play-video?id=' + data.ids;
                                    // var siturl1 = 'user-login';
                                    var siturl1 = 'play-video?id=' + data.ids;
                                }
                                else if (data.is_paid==2 && data.is_rented) {
                                    var message = (data.type == 0) ? watch_app :listen;
                                    var siturl = 'play-video?id=' + data.ids;
                                    // var siturl1 = 'user-login';
                                    var siturl1 = 'play-episode?id=' + data.ids;
                                }
                                // else if( (data.is_paid==2) && (sess_id!="")){
                                //     var message = (data.type == 0) ? subscribe_listen :subscribe_listen;
                                //     var siturl = 'play-video?id=' + data.ids;
                                //     // var siturl1 = 'user-login';
                                //     var siturl1 = 'play-episode?id=' + data.ids;
                                // }
                                else{
                                    var message = (data.type == 0) ? watch_app :listen;
                                    var siturl = 'play-video?id=' + data.ids;
                                    var siturl1 = 'play-episode?id=' + data.ids;
                                } 
                                                    
                                data.thumbnail = data.thumbnail?data.thumbnail:'<?=base_url(ThumbnailPlaceholder)?>';
                                data.poster_url = data.poster_url?data.poster_url:'<?=base_url(PosterPlaceholder)?>';
                                var genre = data.genres;
                                var is_paid=data.is_paid;
                                if (genre) { 
                                    genre = data.genres.replace(/,/g, ' | ');
                                }
                                var descriptions ='';
                                if (Array.isArray(data.description)) {
                                const sessionDescription = data.description.find(desc => desc.language === "English");
                                if (sessionDescription) {
                                 descriptions = sessionDescription.content;
                                }
                                if(lang_title){
                                 const sessionDescription = data.description.find(desc => desc.language === lang_title);
                                if (sessionDescription) {
                                 descriptions = sessionDescription.content;
                                }
                                }
                               }


                                var html = `
                                    <div class="item">
                                        <a onClick="urls_call('${siturl}')">
                                            <div class="pb_card_details play_hover_show ${(data.is_paid == 0) ? '' : 'pb_card_outer' }" data-type="${data.is_paid??0}" data-id="${video_data_id + data.id}" data-banner="${data.thumbnail}" data-url="${data.file_url}">
                                                <div class="pb_card_img ${item.is_trending &&  item.is_trending == 1 ? 'home_main_trend' : ''}">
                                                ${data.is_paid == 1 ? `<div class="premium_icondt"><img src="<?= base_url('assets/images/premium-icon.svg') ?>" alt="premium"></div>` : (data.is_paid == 2 ? `<div class="premium_icondt"><img src="<?= base_url('assets/website_assets/images/rental.svg') ?>" alt="rental"></div>` : '')}

                                                 ${item.is_trending &&  item.is_trending == 1 ? `<h1 class="countTop">${j++}</h1>` : ''}
                                                    <img src="${data.thumbnail}" class="img-fluid" alt="thumbnail" loading="lazy">
                                                </div>
                                                <div class="pb_card_img2">
                                                    <div class="pb_card_vd-2 position-relative">
                                                        ${(data.file_url && data.is_drm_protected != 1) ? `
                                                            <div data-vjs-player>
                                                                <video id="my_showw_${video_data_id + data.id}" class="video-js my_show" poster="${data.poster_url}" preload="auto"></video>
                                                            </div>` : `
                                                            <img src="${data.poster_url}" class="img-fluid" alt="poster image" loading="lazy">
                                                        `}
                                                        <div class="volume_banner_dt" id="mute-toltip-${video_data_id+data.id}">
                                                           <a href="javascript:void(0);" class="banner_volume card_volume" data-id=${video_data_id+data.id}>
                                                             <img id="mute-icn-${video_data_id+data.id}" src="<?= base_url('assets/website_assets/css/video_player_icons/mute1.svg') ?>" alt="mute" class="img-fluid">
                                                           </a>
                                                          </div>
                                                    </div>
                                                    <div class="pb_card_content">
                                                        <h6>${data.title}</h6>
                                                        <p class="discription_gen">${ genre }</p>
                                                        <p class="discription_dt">${descriptions}</p>
                                                        <div class="d-flex align-items-center mt-1 pb_add_btns pb_card_watch categaryAddBtn">

                                                            <a onClick="${data.is_paid == 2 ? `urls_call('${siturl1}')` : `urls_call('${siturl1}')`}" class="pb_watch_btn d-block">
                                                                ${data.is_paid == 2 ? `<img class="img-fluid watchCardImg" src="<?= base_url('assets/images/vector.svg') ?>">` : `<img class="img-fluid watchCardImg" src="<?= base_url('assets/images/playBtn.png') ?>">`}
                                                              ${message}
                                                            </a>`;
                                                        if("<?=$this->session->profile_id?>"){
                                                            html += `<div id="fav-${data.id}" data-id="${data.id}" data-title="${data.title}" data-poster="${data.poster_url}" data-is_paid="${data.is_paid??0}" data-thumbnail="${data.thumbnail}" data-description="${descriptions}" data-encshowid="${data.ids}" data-genres="${data.genres}" data-mediatype="${data.media_type}">`;

                                                            var added = '';
                                                            var nadded = '';
                                                            if (data.in_watchlist != 1) {
                                                                nadded = 'd-none';
                                                            }else{
                                                                added = 'd-none';
                                                            }
                                                                html += ` <a href = "javascript:void(0);"class = "pb_add d-block ms-2 fav-item-${data.id} ${added}" onclick = "addToWatchList(${data.id},1)">
                                                                <img class = "img-fluid playAdd" src = "assets/images/jointWatch.png"alt = "joinwatch" >
                                                               </a>`;
                                                               html += `<a href="javascript:void(0);" class="pb_add bg-green d-block ms-2 fav-item-${data.id} ${nadded}"  onclick="addToWatchList(${data.id},3)">
                                                                     <img class="img-fluid playAdd" src="assets/images/click.svg" alt="joinwatch">
                                                                    </a>`;
                                                             html += `
                                                            </div>`
                                                        }
                                                        html += `</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                `;
            return html;
        }).join('')
    } </div> </div> </section>`;
    k++;
    $('#trending').append(trending);
    
    $(document).ready(function() {
    // $('.carousel_bott4').owlCarousel('destroy'); // Destroy the existing instance
        $('.carousel_bott4').owlCarousel({
            loop: false,
            margin: 5,
            nav: true,
            dots: false,
            stagePadding: 30,


            navText: [
                '<a class="class_btn"><i class="fa fa-chevron-left"></i></a>',
                '<a class="class_next"><i class="fa fa-chevron-right"></i></a>'
            ],
            responsive: {
                0: {
                    //mouseDrag: true,
                    stagePadding: 5,
                    nav: false,
                    items: 3
                },
                380: {

                    stagePadding: 10,
                    nav: false,
                    items: 3
                },
                600: {

                    stagePadding: 10,
                    nav: false,
                    items: 5
                },

                900: {

                    stagePadding: 10,
                    nav: false,
                    items: 6,
                    margin: 7
                },

                1024: {
stagePadding: 10,
                    items: 6,
                   
                },
                 1025: {

                    items: 6,
                    margin: 20
                },
                
                1450: {

                    items: 7,
                    margin: 20
                },


                1800: {

                    items: 8,
                    margin: 20
                }
            }
        });
    });
    $(document).ready(function() {
        $('.owl-carousel').each(function() {
            const owl = $(this);

            // Function to get nth-child selector based on width
            function getNthChildSelector() {
            const width = $(window).width();
            if (width > 1000 && width <= 1449) {
                return 6;
            } else if (width > 1450 && width <= 1799) {
                return 7;
            } else {
                return 8;
            }
            }

            // Function to update hover effects
            function updateHoverEffects() {
            const nthChildIndex = getNthChildSelector();

            // Remove previous hover events
            owl.find('.pb_card_details').off('mouseenter mouseleave');

            // Apply hover effect to the first active item
            owl.find('.owl-item.active:first .pb_card_details').hover(
                function() {
                $(this).addClass('transformed');
                },
                function() {
                $(this).removeClass('transformed');
                }
            );

            // Apply hover effect to the nth active item
            owl.find('.owl-item.active').eq(nthChildIndex - 1).find('.pb_card_details').hover(
                function() {
                $(this).addClass('transformed2');
                },
                function() {
                $(this).removeClass('transformed2');
                }
            );
            }

            // Initial setup
            updateHoverEffects();

            // Update hover effects when the slider changes
            owl.on('changed.owl.carousel', function(event) {
            setTimeout(function() { // Ensure the active class is properly updated
                updateHoverEffects();
            }, 0);
            });

            // Update hover effects on window resize
            $(window).on('resize', function() {
            updateHoverEffects();
            });
        });
    });

    });
    muteunmute(2);
    }
    let popular_genre = "<?= $this->lang->line('popular-genre')?>";
    function renderGenres(genresData) {
        if (Array.isArray(genresData) && genresData.length > 0) {
        elementsToCheck.push({ id: 'geners_data', name: popular_genre });
        }
        call = false;
        // $(".banner_load_af1").show();
        var generes_data = `<section class="mb-4 mt-2 viewAllSection <?= empty($home) ? '' : 'some-class'; ?>">
        <div class = "container-fluid">
    <div class = "row mt-1">
    <h6 class = "defaultColr mt-2 mb-4 ms-3 pl_5 delayed-element"> `+popular_genre+` </h6> </div>
     <div class = "geners_data owl-carousel owl-theme banner_load_af pgn"> `;
        genresData.forEach(function(item) {
            item.thumbnail = item.thumbnail?item.thumbnail:'<?=base_url(PosterPlaceholder)?>';
            var url = "<?php echo base_url('gener_list?genre=') ?>" + item.id+'&g_title='+item.title;
            generes_data += ` <div class = "item owl_pading">
        <div class = "cardDetails shadow card_hover_item">
        <a onClick = "urls_call('${url}')">
        <div class = "card__header" >
        <img src = "${item.thumbnail}"class = "position-relative banner_image"alt = "thumbnail" loading="lazy">
        </div> <div class = "card_youtube bottomSet d-none">
    <div class = "user_g p-2"> </div> </div> </a> </div> </div>`;
        });
        generes_data += `
        </div>
        </div>
        </section>`;
        $('#geners_data').append(generes_data);
    }

    // Function to render content languages
    function renderContentLanguages(contentLanguagesData) {
        let watch_lang = '<?= $this->lang->line('watch-lang')?>';
            if (Array.isArray(contentLanguagesData) && contentLanguagesData.length > 0) {
            elementsToCheck.push({ id: 'content_languages', name: watch_lang });
            }
        // $(".banner_load_af1").show();
var content_languages = `<section class="mb-4 mt-2 viewAllSection <?= empty($home) ? '' : 'some-class'; ?>">
        <div class="container-fluid">
        <div class="row mt-1">
        <h6 class="defaultColr mt-2 mb-4 ms-3 pl_5 delayed-element">`+watch_lang+`</h6>
        </div>
        <div class="geners_data owl-carousel owl-theme banner_load_af pgn">`;
        contentLanguagesData.forEach(function(item) {
            item.thumbnail = item.thumbnail?item.thumbnail:'<?=base_url(PosterPlaceholder)?>';
            var url = "<?php echo base_url('gener_list?content_language_id=') ?>" + item.id + '&title=' + item.title;
            content_languages += `
        <div class="item owl_pading">
        <div class="cardDetails shadow card_hover_item">
        <a onClick="urls_call('${url}')">
        <div class="card__header">
        <img src="${item.thumbnail}" class="position-relative banner_image" alt="thumbnail" loading="lazy">
        </div>
        <div class="card_youtube bottomSet d-none">
        <div class="user_g p-2"></div>
        </div>
        </a>
        </div>
        </div>`;
        });
        content_languages += `
        </div>
        </div>
        </section>`;
        $('#content_languages').append(content_languages);
        $(document).ready(function() {
            $('.geners_data').owlCarousel('destroy'); // Destroy the existing instance

            $('.geners_data').owlCarousel({
                loop: false,
                margin: 5,
                nav: true,
                dots: false,
                stagePadding: 30,
                navText: [
                    '<a class="class_btn"><i class="fa fa-chevron-left"></i></a>',
                    '<a class="class_next"><i class="fa fa-chevron-right"></i></a>'
                ],
                responsive: {
                    0: {
                        stagePadding: 5,
                        nav: false,
                        items: 2
                    },
                    380: {
                        stagePadding: 10,
                        nav: false,
                        items: 2
                    },
                    600: {
                        stagePadding: 10,
                        nav: false,
                        items: 3
                    },
                    900: {
                        stagePadding: 10,
                        nav: false,
                        items: 4
                    },
                    1024: {
                         stagePadding: 10,
                        items: 4,
                       
                    },
                    1025: {
                        items: 4,
                        margin: 15
                    },
                    1400: {
                        items: 4,
                        margin: 15
                    },
                    1800: {
                        items: 5,
                        margin: 15
                    }
                }
            });
        });
    }

    function continue_watching(continue_watchings) {

        if (Array.isArray(continue_watchings) && continue_watchings.length > 0) {
        elementsToCheck.push({ id: 'continue_watching', name: 'ContinueWatching Section' });
        }
        var show_hide = '';
        var continue_watchings = continue_watchings.sort((a,b)=>{
            return a.updated_at - b.updated_at;
        });
        continue_watchings.forEach(function(item) {
            if (item.is_deleted == 0) {
                c_class = '';
                show_hide = '<?= $this->lang->line('Continue-Watching')?>'
            }
        });
        // $(".banner_load_af1").show();
        $('#continue_watching').html('');
        var continue_watching = `
    <section id="cont-watch-sec" class=" mb-4 mt-2 viewAllSection banner-bottom-sec" >
        <div class="container-fluid">
            <div class="row mt-1">
            <div class="col-md-12">
            <div class="d-flex mb-2 view-dtsd">
                <h6 class="defaultColr mt-2 mb-3 ms-3 pl_5 delayed-element">${show_hide}</h6>`;

        if (continue_watchings.length >= 10) {
            continue_watching += `
                <a href="<?= base_url('watching-details'); ?>" class="defaultColr mt-1 mb-3 pr_5 view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';">
                    View All <i class="fas fa-solid fa-arrow-right"></i>
                </a>`;
        }

        continue_watching += `
            </div>
            </div>
            </div>
            <div class="geners_data  owl-carousel owl-theme ">`;

        var i = 0;
        var type = '<?php echo htmlspecialchars(aes_cbc_encryption_('continue_watching')); ?>';
        continue_watchings.reverse().forEach(function(item) {
            if (i >= 10) {
                return; // Stop processing if we've reached 10 items
            }
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
                }else{
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
                var url = (item.poster_url) ? item.poster_url : '<?= base_url(PosterPlaceholder) ?>';
                var percentage = Math.round((item.paused_at / item.video_duration) * 100);
                var id = item.show_id; //aes_cbc_encryption_(item.show_id);
                var wt_id = item.video_id; //aes_cbc_encryption_(item.video_id);'<?= site_url('/play-episode?id=') ?>'+wt_id + '&cid='+id ;

                continue_watching += `
                <div class="item owl_pading ">
                    <div class="cardDetails shadow">
                        <div class="card__header card_watch_img">`;

                if (item.pause_at) {
                    continue_watching += `
                            <a href=""><i class="fas fa-times delete_btn"></i></a>`;
                } else {
                    continue_watching += `
                           <span onclick="remove_from_watchlist(${item.id},${item.video_id},'${item.title}')">
                                <img class="img-fluid premium_content_s delete_btn delete_bt" src="<?= base_url('assets/images/closeVid.png') ?>" alt="Premium">
                            </span>
                            <a onClick='urls_call("${siturl}","${item.title}")'>`;
                }

                continue_watching += `
                            <div class="position-relative">
                                <img src="${url}" class="position-relative banner_image" alt="poster image" loading="lazy">
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
                        </div>
                    </div>
                </div>`;
                i++;
            }

        });

        continue_watching += `
        </div>
        </div>
    </section>`;

        $('#continue_watching').append(continue_watching);
        $(document).ready(function() {
            $('.geners_data').owlCarousel('destroy');

            $('.geners_data').owlCarousel({
                loop: false,
                margin: 5,
                nav: true,
                dots: false,
                stagePadding: 30,
                navText: [
                    '<a class="class_btn"><i class="fa fa-chevron-left"></i></a>',
                    '<a class="class_next"><i class="fa fa-chevron-right"></i></a>'
                ],
                responsive: {
                    0: {
                        stagePadding: 5,
                        nav: false,
                        items: 2
                    },
                    380: {
                        stagePadding: 10,
                        nav: false,
                        items: 2
                    },
                    600: {
                        stagePadding: 10,
                        nav: false,
                        items: 3
                    },
                    900: {
                        stagePadding: 10,
                        nav: false,
                        items: 4
                    },
                    1024: {
                        stagePadding: 10,
                        items: 4,
                        
                    },
                     1025: {
                        items: 4,
                        margin: 15
                    },
                    1400: {
                        items: 4,
                        margin: 15
                    },
                    1800: {
                        items: 5,
                        margin: 15
                    }
                }
            });
        });
    }

     function isElementVisible(element) { 
            const elementTop = element.offsetTop; 
            const elementBottom = elementTop + element.offsetHeight; 
            const viewportTop = window.pageYOffset; 
            const viewportBottom = viewportTop + window.innerHeight; 

            return ( 
            elementBottom > viewportTop && 
            elementTop < viewportBottom
            ); 
            }

            let lastScrollTop = 0;
            let loggedElements = new Set(); // Set to keep track of logged elements

            window.addEventListener('scroll', () => { 
            const currentScrollTop = window.pageYOffset;

            // Check if scrolling down
            if (currentScrollTop > lastScrollTop) {
            for (const element of elementsToCheck) {
            const elementDom = document.getElementById(element.id);
            if (isElementVisible(elementDom) && !loggedElements.has(element.id)) {
                matomo('HomePage','VerticalScrolling',element.name);
            loggedElements.add(element.id); // Mark this element as logged
            }
            }
            }

            // Update lastScrollTop to the current scroll position
            lastScrollTop = currentScrollTop;
            });

        function matomo(user, type, title) {
        $.ajax({
        type: 'POST',
        url: '<?= base_url('/web/Home/matomo_hit') ?>',
        dataType: "json",
        data: {
        user: user,
        types: type, // Typo here, it should be type instead of types
        type: 6,
        title: title
        },
        success: function(data) {
        if (data.status == 1) {

        }

        }

        });
        }
        
</script>

<div class="modal fade bd-example-modal-sm " id="promoCode" tabindex="-1" role="dialog" aria-labelledby="promoCode" aria-hidden="true">
  <div class="modal-dialog modal_sm modal-dialog-centered">
    <div class="modal-content mc-content">
      <div class="modal-body p-3 ">

        <div class="d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #292929;padding: 4px 0">
          <span><?= $this->lang->line('promo_code') ?></span>
          <span class="Crossmodal cross_modal_dt" onclick="closeModal()" onkeypress="handleKeyPress(event)" onkeydown="handleKeyDown(event)" onkeyup="handleKeyUp(event)"> <img src="<?= base_url('assets/images/sunscription_close.svg'); ?>" class="subscription_close_img" alt="subscription_close"></span>
        </div>
          <div class="mb-4 mt-2">
             <div class="d-flex align-items-center justify-content-between">
                <span class="mb-0 f-600">Amount</span>
                <span class="mb-0 f-600"><i class="fa-solid fa-indian-rupee-sign ps-1"></i>450</span>
             </div>
          </div>
        <div class="mb-4 mt-2">
          <label for="promoInput"><?= $this->lang->line('enter_promo_code') ?></label>
          <input type="text" id="promoInput" value="" class="w-100 code-input" name="promo" placeholder="Enter code">
          <span class="error_name"></span>
        </div>
        <div class="pb-2">
          <button class="btn w-100 applyCodeActive" id="applyButton" disabled><?= $this->lang->line('apply_code_btn') ?></button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Your HTML code for the modal goes here -->

<script>
    function openModal() {
        // Get the modal element
        var modal = document.getElementById('promoCode');
        // Display the modal
        modal.style.display = "block";
        modal.style.opacity = 1;
    }

    function closeModal() {
        // Get the modal element
        var modal = document.getElementById('promoCode');
        // Hide the modal
        modal.style.display = "none";
        modal.style.opacity = 0;
    }


    function handleKeyPress(event) {
    if (event.key === 'Enter') {
        closeModal(); 
    }
}

function handleKeyDown(event) {
}

function handleKeyUp(event) {
}

function landscape_design(item,newclas,newclas1,titles) {
    var content_languages = `
    <section class="mb-4 viewAllSection  ${newclas} ${newclas1}  ">
        <div class="container-fluid">
            <div class="row mt-1">
                <h6 class="defaultColr mt-2 mb-4 ms-3 pl_5 delayed-element">${titles}</h6>
            </div>
            <div class="geners_data owl-carousel owl-theme banner_load_af pgn">`;
        item.list.forEach(function(languageItem) {
        languageItem.thumbnail = languageItem.thumbnail ? languageItem.thumbnail : '<?= base_url(PosterPlaceholder) ?>';
        var base_url = "<?php echo base_url(); ?>";
        var url;
        if (item.playlist_type_id == 9) {
        url = base_url + 'gener_list?content_language_id=' + encodeURIComponent(languageItem.ids) + '&title=' + encodeURIComponent(languageItem.titles);
        } else if (item.playlist_type_id == 10) {
        url = base_url + 'gener_list?genre=' + encodeURIComponent(languageItem.ids) + '&title=' + encodeURIComponent(languageItem.title);
        } else {
        url = base_url; 
        }


       
        content_languages += `
            <div class="item owl_pading">
                <div class="cardDetails shadow card_hover_item">
                    <a onClick="urls_call('${url}')">
                        <div class="card__header">
                            <img src="${languageItem.thumbnail}" class="position-relative banner_image" alt="thumbnail" loading="lazy">
                        </div>
                        <div class="card_youtube bottomSet d-none">
                            <div class="user_g p-2"></div>
                        </div>
                    </a>
                </div>
            </div>
        `;
    });

    content_languages += `
                </div>
            </div>
        </section>
    `;
    return content_languages;
        $(document).ready(function() {
            $('.geners_data').owlCarousel('destroy'); // Destroy the existing instance

            $('.geners_data').owlCarousel({
                loop: false,
                margin: 5,
                nav: true,
                dots: false,
                stagePadding: 30,
                navText: [
                    '<a class="class_btn"><i class="fa fa-chevron-left"></i></a>',
                    '<a class="class_next"><i class="fa fa-chevron-right"></i></a>'
                ],
                responsive: {
                    0: {
                        stagePadding: 5,
                        nav: false,
                        items: 2
                    },
                    380: {
                        stagePadding: 10,
                        nav: false,
                        items: 2
                    },
                    600: {
                        stagePadding: 10,
                        nav: false,
                        items: 3
                    },
                    900: {
                        stagePadding: 10,
                        nav: false,
                        items: 4
                    },
                    1024: {
                         stagePadding: 10,
                        items: 4,
                       
                    },
                    1025: {
                        items: 4,
                        margin: 15
                    },
                    1400: {
                        items: 4,
                        margin: 15
                    },
                    1800: {
                        items: 5,
                        margin: 15
                    }
                }
            });
        });
    }


    function potrate(item,newclas,newclas1,titles,category_id,video_data_id) {

        let j = 1;
        let k = 1;        var trending = `
                <section class="mb-4  viewAllSection ${newclas} ${newclas1} ">
                    <div class="container-fluid" >
                        <div class="row mt-1">
                        <div class="col-md-12">
                        <div class="d-flex mb-2 view-dtsd">
                            <h6 class="defaultColr mt-2 mb-4 pl_5 delayed-element">
                                ${titles}
                            </h6>
                            ${ item.list.length >= 6 ? `
                        <a onClick="urls_call('${category_id}')" class="defaultColr mt-1 mb-3  view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';">
                            View All <i class="fas fa-solid fa-arrow-right"></i>
                        </a>
                        </div>
                    ` : ''}
                        </div>
                        <div class="carousel_bott4 owl-carousel owl-theme banner_load_af ${(k == 1) ? 'tobSlider' : ''}">`;
    j=1;
    trending += `${item.list.slice(0, 10).map(data => { 
                               // console.log('inside loop',data);return;

                                if((isSubscribed != 1) && (data.is_paid!=0 && data.is_paid!=2) && (sess_id!=="")){
                                    var message = (data.type == 0) ? subscribe_watch :subscribe_listen;
                                    var siturl = 'play-video?id=' + data.ids;
                                    // var siturl1 = 'subscription';
                                    var siturl1 = 'play-episode?id=' + data.ids;
                                }
                                else if((isSubscribed != 1) && (data.is_paid!=0 && data.is_paid!=2) && (sess_id=="")){
                                    var message = (data.type == 0) ? subscribe_watch :subscribe_listen;
                                    var siturl = 'play-video?id=' + data.ids;
                                     var siturl1 = 'subscription';
                                    //var siturl1 = 'play-episode?id=' + data.ids;
                                }
                                else if (data.is_paid==2 && (data.is_rented != 1)) {
                                    var message = (data.type == 0) ? available_to_rent :available_to_rent;
                                    var siturl = 'play-video?id=' + data.ids;
                                    // var siturl1 = 'user-login';
                                    var siturl1 = 'play-video?id=' + data.ids;
                                }
                                else if (data.is_paid==2 && data.is_rented) {
                                    var message = (data.type == 0) ? watch_app :listen;
                                    var siturl = 'play-video?id=' + data.ids;
                                    // var siturl1 = 'user-login';
                                    var siturl1 = 'play-episode?id=' + data.ids;
                                }
                                else if( (data.is_paid==2) && (sess_id!="")){
                                    var message = (data.type == 0) ? subscribe_listen :subscribe_listen;
                                    var siturl = 'play-video?id=' + data.ids;
                                    // var siturl1 = 'user-login';
                                    var siturl1 = 'play-episode?id=' + data.ids;
                                }
                                else{
                                    var message = (data.type == 0) ? watch_app :listen;
                                    var siturl = 'play-video?id=' + data.ids;
                                    var siturl1 = 'play-episode?id=' + data.ids;
                                } 
                               
                                                    
                                data.thumbnail = data.thumbnail?data.thumbnail:'<?=base_url(ThumbnailPlaceholder)?>';
                                data.poster_url = data.poster_url?data.poster_url:'<?=base_url(PosterPlaceholder)?>';
                                var genre = data.genres;
                                var is_paid=data.is_paid;
                                if (genre) { 
                                    genre = data.genres.replace(/,/g, ' | ');
                                }
                                var descriptions ='';
                                if (Array.isArray(data.description)) {
                                const sessionDescription = data.description.find(desc => desc.language === "English");
                                if (sessionDescription) {
                                 descriptions = sessionDescription.content;
                                }
                                if(lang_title){
                                 const sessionDescription = data.description.find(desc => desc.language === lang_title);
                                if (sessionDescription) {
                                 descriptions = sessionDescription.content;
                                }
                                }
                               }

                                var html = `
                                    <div class="item">
                                        <a onClick="urls_call('${siturl}')">
                                            <div class="pb_card_details play_hover_show ${(data.is_paid == 0) ? '' : 'pb_card_outer' }" data-type="${data.is_paid??0}" data-id="${video_data_id + data.id}" data-banner="${data.thumbnail}" data-url="${data.file_url}">
                                                <div class="pb_card_img ${item.playlist_type_id &&  item.playlist_type_id == 4 ? 'home_main_trend' : ''}">
                                                ${data.is_paid == 1 ? `<div class="premium_icondt"><img src="<?= base_url('assets/images/premium-icon.svg') ?>" alt="premium"></div>` : (data.is_paid == 2 ? `<div class="premium_icondt"><img src="<?= base_url('assets/website_assets/images/rental.svg') ?>" alt="rental"></div>` : '')}
                                                                 
                                                 ${item.playlist_type_id && item.playlist_type_id == 4 ? `<h1 class="countTop">${j++}</h1>` : ''}
                                                    <img src="${data.thumbnail}" class="img-fluid" alt="thumbnail" loading="lazy">
                                                </div>
                                                <div class="pb_card_img2">
                                                    <div class="pb_card_vd-2 position-relative">
                                                        ${(data.file_url && data.is_drm_protected != 1) ? `
                                                            <div data-vjs-player>
                                                                <video id="my_showw_${video_data_id + data.id}" class="video-js my_show" poster="${data.poster_url}" preload="auto"></video>
                                                            </div>` : `
                                                            <img src="${data.poster_url}" class="img-fluid" alt="poster image" loading="lazy">
                                                        `}
                                                        <div class="volume_banner_dt" id="mute-toltip-${video_data_id+data.id}" >
                                                           <a href="javascript:void(0);" data-valumeType="card" class="banner_volume card_volume" data-id=${video_data_id+data.id}>
                                                             <img id="mute-icn-${video_data_id+data.id}" src="<?= base_url('assets/website_assets/css/video_player_icons/mute1.svg') ?>" alt="mute" class="img-fluid">
                                                           </a>
                                                          </div>
                                                    </div>
                                                    <div class="pb_card_content">
                                                        <h6>${data.title}</h6>
                                                        <p class="discription_gen">${ genre }</p>
                                                        <p class="discription_dt">${descriptions}</p>
                                                        <div class="d-flex align-items-center mt-1 pb_add_btns pb_card_watch categaryAddBtn">

                                                            <a onClick="${data.is_paid == 2 ? `urls_call('${siturl1}')` : `urls_call('${siturl1}')`}" class="pb_watch_btn d-block">
                                                                ${data.is_paid == 2 ? `<img class="img-fluid watchCardImg" src="<?= base_url('assets/images/vector.svg') ?>">` : `<img class="img-fluid watchCardImg" src="<?= base_url('assets/images/playBtn.png') ?>">`}
                                                              ${message}
                                                            </a>`;
                                                        if("<?=$this->session->profile_id?>"){
                                                            html += `<div id="fav-${data.id}" data-id="${data.id}" data-title="${data.title}" data-poster="${data.poster_url}" data-is_paid="${data.is_paid??0}" data-thumbnail="${data.thumbnail}" data-description="${descriptions}" data-encshowid="${data.ids}" data-genres="${data.genres}" data-mediatype="${data.media_type}">`;

                                                            var added = '';
                                                            var nadded = '';
                                                            if (data.in_watchlist != 1) {
                                                                nadded = 'd-none';
                                                            }else{
                                                                added = 'd-none';
                                                            }
                                                                html += ` <a href = "javascript:void(0);"class = "pb_add d-block ms-2 fav-item-${data.id} ${added}" onclick = "addToWatchList(${data.id},1)">
                                                                <img class = "img-fluid playAdd" src = "assets/images/jointWatch.svg"alt = "joinwatch" >
                                                               </a>`;
                                                               html += `<a href="javascript:void(0);" class="pb_add bg-green d-block ms-2 fav-item-${data.id} ${nadded}"  onclick="addToWatchList(${data.id},3)">
                                                                     <img class="img-fluid playAdd" src="assets/images/click.svg" alt="joinwatch">
                                                                    </a>`;
                                                             html += `
                                                            </div>`
                                                        }
                                                        html += `</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                `;
                              

            return html;
            }).join('')
        }  
        </div> </div> </section>`;
        return  trending ;
    }

    trending += landscape_design(item,newclas,newclas1,titles);


    trending += potrate(item,newclas,newclas1,titles,category_id,video_data_id);


</script>
