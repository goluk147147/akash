<?php  
    $lang_id = ($this->session->userdata('lang_id')) ? $this->session->userdata('lang_id') : 'English';
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
    .dynamic_user_dt{
        margin-top:47px;
    }

   
    .carousel-add .item {
            display: flex;
            align-items: center;
        }
        .carousel-add .add_img img {
            width: 100%;
            height: auto;
        }
        .header_nav{
            box-shadow:inherit !important; 
        }

        #feedSeekBar{
            position:absolute;
            bottom:12px;
            content:"";
            z-index:999;
            background:red;
            width:100%;
            height:3px;
            left:0;
            display:none;
        }
        #feedSeekBar::-moz-range-thumb {
            width: 12px;
            height: 12px;
            background: #007bff;
            border-radius: 50%;
            cursor: pointer;
        }
        .shorts_para .volume_banner_dt {
  
  bottom: 12px !important;
  right: 5px;
}
.shorts_para .banner_volume {
  width: 25px !important;
  height: 25px !important;
  background: inherit !important;
  backdrop-filter:inherit !important;
  display: flex;
  align-items: center;
  border-radius: 50%;
}
       
</style>
 <div class="nav_bot_bar">
         <button id="scroll-lefts" class="scroll-left active"><i class="fas fa-chevron-left"></i></button>
         <div class="nav_bot_br_button">
              <!-- <button data-id="ALL" class="btn nav_bot_cata" onclick="filterFeedData('ALL')">All</button> -->
         </div>
         <button id="scroll-rights" class="scroll-right active"><i class="fas fa-chevron-right"></i></button>
    </div>

<section id="data-section" class="bot_navs_dts dynamic_user_continue_watching(dt">
    <div id="banners" class="banner_load_af12"></div>
    <div id="continue_watching" class="banner_load_af12 d-none"></div>



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
                    <img src="<?= base_url('assets/images/pb_banner.png'); ?>" class="img-fluid card_shimmer_op as4" alt="Placeholder" >
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

            <div class="carousel_bott4 owl-carousel owl-theme">
                <?php for ($j = 0; $j <= 8; $j++) { ?>
                    <div class="card_shimmer as3">
                        <img src="<?= base_url('assets/images/placholder-img.png'); ?>" class="img-fluid card_shimmer_op as3" alt="Placeholder">

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

            <div class="carousel_bott4 owl-carousel owl-theme">
                <?php for ($j = 0; $j <= 8; $j++) { ?>
                    <div class="card_shimmer as4">
                        <img src="<?= base_url('assets/images/placeholder-poster-img.png'); ?>" class="img-fluid card_shimmer_op as4" alt="Placeholder">

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
    _paq.push(['setCustomDimension', 5, lang_title]);
    var c_class = 'banner-bottom-sec';
    $(".close").click(function() {
        location.reload();
    });
    var elementsToCheck = [];

    var call = true;
    async function manageMasterContent() {  
        // $('#overlayonajaxhit').css('display','block');
        $('#trending').html('');     
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
                           // renderBanners(cache_data.data.nav_banner.data.banners);
                            renderTrendingSections(cache_data.data.home_data);
                            // renderGenres(cache_data.data.nav_banner.data.genres);
                            // renderContentLanguages(cache_data.data.nav_banner.data.content_languages);
                            // if (!bannerfound) {
                            //     if ($('.bottom_banner').hasClass('banner-bottom-sec')) {
                            //         $('.bottom_banner').removeClass('banner-bottom-sec');
                            //         $('.bottom_banner').addClass('categeryBox');
                            //     }
                            // }
                        }
                    }
                } else {
                    //await fetchMasterContentAndUpdateCache(null, cache_data);
                }
            });
            // setTimeout(()=>{$('#overlayonajaxhit').css('display','none');},1000);        
    }


    var contKey = "<?= ($this->session->profile_id) . '-continueWatching' ?>";
    $(document).ready(function() {
        var mfeedType = localStorage.getItem('mfeedType')??'0';
        if(mfeedType == 0){
            queueTrackingData('trackEvent', ['Page', 'View', 'Home']);
        }
        localStorage.setItem('mfeedType',1);

        var session_id = "<?= $this->session->profile_id ?? 0 ?>";
        if (session_id != 0) {
            //continueWatching(contKey);
        }
        // manageMasterContent();
        // $('#overlayonajaxhit').css('display', 'none');
        $('.delayed-element').css('display', 'block');
        // $('.banner-place1').hide();
    });

    var check = '<?= ($this->session->userdata('id')) ?? 0 ?>';
    var c_watch = false;
    var c_watch = false;
    var data;
    var banner = '';
    var banner_data = '';
    var generes_data = '';
    var content_languages = '';
    var trending = '';

    var bannerfound = false;  


    async function ajax_fetch_live_data(cachekey){ 
        let liveKey = 'liveContent';
        let return_data = [];
        let cacheTime = cachekey ;  // 15 mins
        var live_data = await fetchCacheData(liveKey);
        //console.log("live_cache_data",live_data);
        if(live_data && live_data.data){
            let time = Date.now();
            if (time <= live_data.cacheExpiration) {
                return_data = live_data.data;
            }
        } 
        //console.log("return_data",return_data);
        if(return_data.length == 0) {
            try {
                await $.ajax({
                    type: 'POST',
                    url: '<?= base_url('/web/home/ajax_live_data'); ?>',
                    dataType: "json",
                    data: {},
                    success: async function(response) { 
                        if (response.status == true) {
                            return_data = response.data;
                            if(return_data.length){
                                // let cur_time = "<//?= time(); ?>"
                                // if(return_data[0].hasOwnProperty('live_end_time') && return_data[0]['live_end_time'] != 0){
                                //     cacheTime = (return_data[0]['live_end_time'] - cur_time);
                                // }
                                localStorage.setItem('pb_live_status',true);
                            } else {
                                localStorage.removeItem('pb_live_status');
                            }
                            putCache(return_data, liveKey, null, 0, cacheTime);
                        }
                    }
                });
            } catch (error) {
                console.log(error);
            }
        }
        return return_data;
    }


    var startsWith = 0;
    var repeatPlaylist = 0;
    var homeSectionData;

    async function renderTrendingSections(homeData) { //console.log("homeData",homeData);
        var session_id = "<?= $this->session->profile_id ?? 0 ?>";
        var contPlaylistIndex = homeData.data.findIndex(function(item) {
        return item.playlist_type_id == 3;
        });
        
        // Remove the item at the found index
        if (contPlaylistIndex !== -1) {
        if (session_id == 0) {
              homeData.data.splice(contPlaylistIndex, 1);
            }else{
                if(watchingData && watchingData.length== 0){
                    homeData.data.splice(contPlaylistIndex, 1);
                }
            }
        }
            let filteredItemss = []; var adscount = 0;
            homeData.data.forEach(({ playlist_type_id, list }) => {
            if (playlist_type_id === 2) {
            filteredItemss = list.filter(({ banner_type }) => banner_type === 0);
            //console.log(filteredItemss); 
            }
            });
            const bannerPlaylistIndex = homeData.data.findIndex(item => item.playlist_type_id === 2);
            if (bannerPlaylistIndex !== -1) {
            if ( filteredItemss.length === 0) {
            homeData.data.splice(bannerPlaylistIndex, 1);
            }
            }

                    
        
        homeSectionData = homeData;
        if(homeSectionData.data.length == 0){
           var trendings = no_datas();
            $('#trending').append(trendings);
            shimmer('hide');
        //    return false;
        }else{
        // home feed get data
        var feedKey = localStorage.getItem('feedType')??'0';
        var shortsData = await getShortsData(feedKey);
        $('.nav_bot_cata').removeClass('active'); // these two lines for adding actice class in home feed navbar
        $('.nav_bot_cata[data-id="'+feedKey+'"]').addClass('active');

        let j = 1;
        let k = 1;
        let indexData = 0;

        // check if live playlist exists
        var livePlaylistIndex = homeData.data.findIndex(function(item) {
            return item.playlist_type_id == 12;
        });
        var cachedur = homeData["data"].hasOwnProperty(livePlaylistIndex) && homeData["data"][livePlaylistIndex]['cache_duration']!=null?homeData["data"][livePlaylistIndex]['cache_duration']:0;
        if(repeatPlaylist == 0){
            var live_data = await ajax_fetch_live_data(cachedur);
        }else{
            var live_data = [];
        }
        
        if(live_data && live_data.length > 0){
            if(livePlaylistIndex && homeData["data"].hasOwnProperty(livePlaylistIndex) && homeData["data"][livePlaylistIndex]['nature'] == 1){
                homeData["data"][livePlaylistIndex]['list'] = live_data;
            }
        } else {
            homeData["data"] = homeData["data"].filter(function(item) {
                return item.playlist_type_id !== 12;
            });
        }
        let live_button_display = (localStorage.getItem('pb_live_status'))?true:false;
        if(live_button_display == true){
            $('.live_ev_show').removeClass('d-none');
        }

        var newkey ='';

        (async function() {
            for (const [key, items] of homeData.data.entries()) { // iterate each playlist
                 
                if(repeatPlaylist > 0 && (!items.is_repeated || items.is_repeated != 1 || items.list.length == 0)){
                   continue; // don't repeat playlist even if we still have home feed
                }
                // console.log('items.playlist_type',items.title[0].content);
                // console.log('items.is_repeated',items.is_repeated);
                
                // css conditions for the playlist that comes after banner
                var next_type_id = 0;
                var newclas ='';
                var newclas1 ='mt-2';
                if(key == indexData){
                    newclas = "top_margin_sec";
                }               
                if(items.playlist_type_id  == 2 ){
                    var currentTime = Math.floor(Date.now()/1000);
                    const filteredItems = items.list.filter(listItem => listItem.banner_type === 0 && (listItem.type != 9||  listItem.live_date_time!=0|| listItem.live_end_time > currentTime) );
                    if(filteredItems.length > 0){
                        newkey = key+1;
                    }
                }
               
                if(key === newkey){
                    newclas1 = 'banner-bottom-sec';
                }

                // check home feed dynamically if it has ended then don't repeat any playlist
                var options = {};
                options.homeClass = newclas1;
                ({ shortsData, startsWith } =  await checkHomeFeed(shortsData,startsWith));              
                if(repeatPlaylist > 0 && ((shortsData.length == 0)  || (shortsData.totalCount < startsWith))){
                    endFeed = true;
                    continue;
                }else{
                    endFeed = false; 
                }

                // check if we need to render feed data before/after current playlist
                if(shortsData.data && items.above_recomendation && items.above_recomendation > 0){
                    if(homeData.data[key-1]){
                        var shortsHtml = await renderShortsData(shortsData, (items.above_recomendation+homeData.data[key-1].below_recomendation), startsWith, options);
                        $('#trending').append(shortsHtml);
                        startsWith += (items.above_recomendation+homeData.data[key-1].below_recomendation);
                    }else{
                        var shortsHtml = await renderShortsData(shortsData, items.above_recomendation, startsWith, options);
                        $('#trending').append(shortsHtml);
                        startsWith += items.above_recomendation;
                    }
                    if(shortsHtml != ''){
                        newclas1 ='mt-2';
                    }
                }

                var titles ='';
                if (Array.isArray(items.title)) {
                    const sessiontitles = items.title.find(desc => desc.language === "English");
                    if (sessiontitles) {
                        titles = sessiontitles.content;
                    }
                    if(lang_title){ 
                        const sessiontitles = items.title.find(desc => desc.language === lang_title);
                        if (sessiontitles) {
                            titles = sessiontitles.content;
                        }
                    }
                }
                titles = titles.replace(/[^a-zA-Z0-9\s]/g, '');
                // create dynamic url when user click on view all button above playlist
                var category_id = 'dashboard-details?category_id=' + items.category_id+'&name='+titles;
                if(items.playlist_type_id == 8){
                    category_id = 'gener_list?genre=' + items.genres_id+'&playlist='+items.id+'&title=' +titles;
                }
                if(items.playlist_type_id == 12){
                    category_id =  "provider?id=ZyLZ+GCDoMAAQIZ6N9R70w==:MTIzNDU2Nzg5MDEyMzQ1Ng=";
                }
                var mtype = '';
                if(items.playlist_type_id == 19){
                    mtype = "Tag";
                    category_id = 'gener_list?tag=' + items.tag_id+'&playlist='+items.id+'&title=' +titles;
                }
                // for matomo generating title
                const home = true;
                let video_data_id = items.playlist_type_id;
                let video_tit ="";
                if(items.playlist_type_id == 4){
                    video_data_id = "trending_"
                    video_tit = "trending_"
                }
                if(items.recommendation == 1){
                    video_data_id = "recommendation_"
                    video_tit = "recommendation_"
                }


                var trending ='';

                if(items.playlist_type_id == 2){ // for homepage banner
                    var length = 0;

                    const initializeSlickSlider = new Promise((resolve, reject) => {
                        var copy = '<?= $this->lang->line('copy') ?>'
                        var banner_base = '<?php echo base_url() ?>';
                        var banner_data = '<section class="mb-3 banner_after_navbar zoods position-relative "'+newclas+'">'+
                        '<div class="carousel_top3 " id="'+titles+'" name="'+titles+'">';

                        // render and manage each banner
                        items.list.forEach(function(item) { 
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

                            // check subscription for partener content                  
                            if (item.hasOwnProperty('owned_by')) {
                                if (item.owned_by > 0) {                                    
                                    const validSubscriptions = "<?= json_encode(SUBSCRIBEUSER)?>";
                                    if (typeof validSubscriptions !== 'undefined') {
                                        if (validSubscriptions.includes(item.owned_by)) {
                                            isSubscribed = 1;  
                                        }else{
                                        isSubscribed = 0;  
                                    } 
                                    }else{
                                        isSubscribed = 0;   
                                    } 
                                } 
                            }

                            var plybtn = "<?= base_url('assets/images/playBtn.png') ?>";
                            item.banner_url = (item.banner_url?item.banner_url:'<?=base_url(BannerPlaceholder)?>');
                            var geners = item.genre_titles ? item.genre_titles.replace(/,/g, ' | ') : '';
                            var cattitle=(item.category_title)?item.category_title + " | ":'';
                            const action = cattitle+ geners.split('|').map(items => items.trim()).slice(0, 3).join(' | ');
                            var siturl1 = 'play-media?id=' + item.video_ids+'&type='+'banners';

                            if(!item.is_paid){
                                item.is_paid = 0;
                            }
                            var message = subscribe_watch;
                            if((isSubscribed != 1) && (item.is_paid==1) && (sess_id!="")){
                                plybtn = "<?= base_url('assets/images/playBtn.png') ?>";
                                message = (item.media_type == 1) ? subscribe_listen :subscribe_watch;
                                siturl1 = '<?= site_url('subscription?type=banners&publisherid=') ?>'+item.owned_by;
                            }
                            else if((isSubscribed != 1) && (item.is_paid==1) && (sess_id=="")){
                                plybtn = "<?= base_url('assets/images/playBtn.png') ?>";
                                message = (item.media_type == 1) ? subscribe_listen :subscribe_watch;;
                                siturl1 = '<?= site_url('subscription?type=banners&publisherid=') ?>'+item.owned_by;
                            }
                            else if ((item.is_paid==2)  && (item.is_rented != 1)) {
                                plybtn = "<?= base_url('assets/images/vector.svg') ?>";
                                message = (item.media_type == 0) ? available_to_rent :available_to_rent;
                                siturl1 = 'play-video?id=' + item.ids+'&type='+'banners';
                            }
                            else if( (item.is_paid==2) && (item.is_rented == 1)){
                                message = (item.media_type == 1) ? listen: watch_app;
                                siturl1 = 'play-media?id=' + item.ids+'&type='+'banners'; 
                            }
                            else{
                                message = (item.media_type == 1) ? listen: watch_app;
                            }
                            var currentTime = Math.floor(Date.now()/1000);
                            var liveStartTime = item?.live_date_time??null;
                            var liveEndTime = item?.live_end_time??null;
                            var stillLive = item?.is_live;
                            var siturl = 'play-video?id=' + item.ids+'&type='+'banners';
                            
                            // handle live case
                            var livecheck = 'd-none';
                            var livecheckw='';
                            var hidebtn='';
                            //if((currentTime > liveStartTime) && (liveEndTime == 0 || liveEndTime > currentTime) && (stillLive==1)){
                                    var live = '';
                            if((currentTime > liveStartTime ) && item.type==9 ){ // check if video is live
                                livecheckw='d-none'; 
                                livecheck = '';
                                siturl = 'live?id=' + item.ids;
                                siturl1 =  'live?id=' + item.ids;
                                var livehtml = "<?= $this->lang->line("Live") ?>";
                                live = `<div class="live_upcomings"> <div class="live_up_lang"><span></span><p class="mb-0">${livehtml}</p></div></div>`;
                                
                            }else{
                                if (item.type==9 &&  currentTime < liveStartTime){ // check if video is in upcoming state
                                    item.file_url = '';
                                    item.vdc_id = '';
                                    hidebtn='d-none';
                                    livecheck = '';
                                    var upcominghtml = "<?= $this->lang->line("upcoming") ?>";
                                    live = `<div class="live_upcomings"> <div class="live_up_lang"><p class="mb-0">${upcominghtml}</p></div></div>`;
                                    siturl1 = siturl;
                                    var Datetime = formatTimestamp(item.live_date_time);
                                    var  buttonText =  "<?= $this->lang->line("began_on") ?>"+" "+Datetime;
                                    message = buttonText;
                                }
                            }

                            // format some metadata to show on banner
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

                            if(item.redirection_type == 3){
                                siturl = 'pb_live_details?id=' + item.ids+'&type='+'banners';
                                siturl1 = siturl;
                            }else if(item.redirection_type == 2){
                                siturl = item.hyperlink??'';
                                siturl1 = siturl;
                                message = "<?= $this->lang->line('play_now') ?>";
                            }else if(item.redirection_type == 4){
                                siturl = 'content-detail?id=' + item.ids;
                                siturl1 = siturl;
                                message = "<?= $this->lang->line('get_game') ?>";
                            }else if(item.redirection_type == 5){
                                return;
                            }
                            
                            if(item.skip_season == 0){ // check if item type is webseries
                                timeLeftString="";
                                if (item.season_count == 1) {
                                    timeLeftString=item.season_count + " Season";
                                }else if(item.season_count > 1){
                                    timeLeftString=item.season_count + " Seasons";
                                }
                            }
                            if ((item.banner_type == 0) && (item.id > 0 || item.redirection_type == 2) && (item.type != 9 || item.live_date_time != 0 || liveEndTime > currentTime)) {
                                length++;
                                bannerfound = true;
                                banner_data += '<div class="item video_play" data-url="' + item.file_url + '" data-id="' + item.id + '">' +
                                    '<div class="w-100">' +
                                    '<div class="img_cara responsive_banner ">' +
                                    '<div class="row m-0">' +
                                    '<div class="col-lg-12 col-sm-12 p-0 col-title_img">' +
                                
                                    '<div class="banner-position play_hover_video play_hover_click" data-hyperlink="'+item.hyperlink+'" data-cmtype="'+item.type+'"  data-ctype="'+item.redirection_type+'"  data-id="' + item.id + '" data-genres="' + item.genre_titles + '" data-title="' + item.title + '" data-url="' + item.file_url + '" data-banner="' + item.banner_url + '" data-isdrm="' + item.is_drm_protected + '" data-vdcid="' + item.vdc_id + '" data-mediaid="' + item.video_id  + '"data-trailer="'+ item.video_id + '">' +
                                    '<div class="live_upcoming '+ livecheck+'">'+
                                    live+
                                    '</div>'+
                                    '<div class="volume_banner_dt" >'+
                                    '<div class="tooltip-text" id="mute-tooltip-'+item.id+'" tooltip="<?= $this->lang->line("unmute-tra") ?>">'+
                                    '<a href="javascript:void(0);" data-valumeType="banner" class="banner_volume ban-vol-btn" data-id="'+item.id+'">'+
                                    '<img id="mute-icon-'+item.id+'" src="<?= base_url('assets/images/mute.svg') ?>" class="img-fluid">'+
                                    '</a>'+
                                    '</div>'+
                                    '</div>'+
                                    '<div class="content_banner_dt col_768_after_display_none disply_768 banner_pos_dt ">';
                                    if(item.redirection_type == 2){
                                        banner_data += '<a href="' + siturl + '" class="pb_banner_vd" target="_blank">'
                                    }else{
                                        banner_data += '<a onClick="urls_call(\'' + siturl + '\')" class="pb_banner_vd">'
                                    }

                                    banner_data += '<div class="conten_holder bnnr_content">' +
                                    '<div class="bannerSubImg'+ (item.banner_icon ? "" : 'bannertitle')+'">' +
                                    (item.banner_icon ? '<img src="' + item.banner_icon + '" class="img-fluid banner_img" alt="'+item.title+'" loading="lazy">' : ' <h2 class="banner-tt_details">'+item.title+'</h2>') +
                                    '</div>' +
                                    '<p class="description_dt ml23 d-flex ml25 mb-1 align-items-center">';
                                    var options = [];
                                if(item.type == 9){  // check if video is live, upcoming or recent
                                    if(item.live_date_time > 0 && false){                                   
                                        var date = new Date(item.live_date_time * 1000);
                                        var day = date.getDate();
                                        var hour = date.getHours() % 12 || 12; // Convert to 12-hour format
                                        var period = date.getHours() >= 12 ? "PM" : "AM"; 
                                        var year = date.getFullYear(); 
                                        var min = date.getMinutes();
                                        //min = 0;
                                        var tt = min > 0 ?hour+":"+min+" "+period:hour+" "+period;
                                        var formattedDate = `${hour}${period}${day}`;
                                        // banner_data += tt+' <span class="dotspan">&#9679;</span> ' +year ;
                                        if(tt){                                            
                                            options.push(tt);
                                        }
                                        if(year){                                            
                                            options.push(year);
                                        }
                                    }
                                }
                                if ((item.released_on!=null) && (item.released_on!=0) && false) {
                                    // if(item.type == 9){
                                    //     banner_data += ' <span class="dotspan">&#9679;</span> ' +item.released_on;   
                                    // }else{
                                    //     banner_data += item.released_on+' <span class="dotspan">&#9679;</span> ' ;

                                    // }
                                    if(item.released_on){                                            
                                        options.push(item.released_on);
                                    }
                                }
                                if ((hours > 0) || (minutes > 0)) {
                                    // banner_data += timeLeftString+' <span class="dotspan">&#9679;</span> ';
                                    if(timeLeftString){                                            
                                        options.push(timeLeftString);
                                    }                                    
                                }
                                if (item.language) {
                                    if(timeLeftString == '0m'){
                                        // banner_data += ' <span class="dotspan">&#9679;</span> ';  
                                    }
                                    // banner_data += item.language;
                                    if(item.language){                                            
                                        options.push(item.language);
                                    }
                                }
                                if(options.length > 0){
                                    banner_data += options.join(' ● ');
                                }                                   
                                var stringa = JSON.stringify(item.rating_json);
                                var check_imdb = JSON.parse(stringa);
                                banner_data += item.certificate ? ' <span class="dotspan">●</span><span class="ua_16 ua-banner">' + item.certificate +((item.age > 0)?(' '+item.age+'+'):'')+ '</span> <span class="dotspan">●</span>' : '';
                                // if(item.certificate){                                            
                                //     options.push(item.certificate);
                                // }
                                // if(item.age){                                            
                                //     options.push(item.age);
                                // }
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
                                        '<span class="imd_rating ua-banner">' + (check_imdb[1].rating ? check_imdb[1].rating+"%" : '') + '</span>';
                                    }
                                }else{
                                    var rating_icons = '';
                                    var rating_value = '';
                                    if(check_imdb[0] ){
                                        if (check_imdb[0] && check_imdb[0].agency == 'Rotten Tomatoes' ||check_imdb[0] && check_imdb[0].agency == 'Rotten Tomato' ) {
                                            rating_value = check_imdb[0].rating+"%";
                                            rating_icons = "<?= base_url("assets/images/Rotten_Tomatoes.svg"); ?>";
                                        }else{
                                            rating_value = check_imdb[0].rating;
                                            rating_icons = "<?= base_url("assets/images/imd_banne_img.svg"); ?>";
                                        }
                                    }
                                    if (check_imdb[0] && check_imdb[0].agency) { // check if there is rating in content
                                        if (!item.certificate || item.certificate.length === 0) {
                                            banner_data += '<span class="dotspan">●</span>';
                                        }
                                        banner_data += '<span class="imd_image_banner"><img src="'+rating_icons+'" class="imd_banne_imgs" alt="imd_banne_img"></span>' +
                                        '<span class="imd_rating ua-banner">' + (check_imdb[0].rating ?rating_value : '') + '</span>';
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
                                
                                '<div class="d-flex align-items-center">';
                                if(item.redirection_type == 2){
                                    banner_data += `<a class="bnnr_play_btn bnner_play_color bannerPlayBtn" data-hyperlink="${item.hyperlink}" data-cmtype="${item.type}" data-id="${item.id}" data-title="${item.title}" data-geners="${item.geners_title}"  data-ctype="${item.redirection_type}"  href="${siturl1}" target="_blank">
                                        <img
                                            class="img-fluid  ${hidebtn}" 
                                            src="${plybtn}" 
                                            alt="play icon" 
                                            loading="lazy">
                                        ${message}
                                    </a>`;
                                }else{
                                    banner_data += `<a class="bnnr_play_btn bnner_play_color bannerPlayBtn" data-hyperlink="${item.hyperlink}" data-cmtype="${item.type}" data-id="${item.id}" data-title="${item.title}" data-geners="${item.geners_title}" data-ctype="${item.redirection_type}"  onClick="urls_call('${siturl1}')">
                                        <img
                                            class="img-fluid  ${hidebtn}" 
                                            src="${plybtn}" 
                                            alt="play icon" 
                                            loading="lazy">
                                        ${message}
                                    </a>`;
                                }
                                
                                banner_data += '</div>' +
                                '<div class="banner-play-btn">' +
                                '';
                                
                                if (item.type != 9 && item.redirection_type!=3 && item.redirection_type!=2){ // if not live
                                    if ("<?=$this->session->profile_id?>") { // if user logged in
                                        banner_data += `<div class="ms-3 ${livecheckw} wt-add tooltip-text watc_pb" id="watchlist_toggle_'+item.show_id+'"><div id="fav-${item.show_id}" data-id="${item.show_id}" data-title="${item.title}" data-is_paid="${item.is_paid??0}" data-poster="${item.poster_url}" data-thumbnail="${item.thumbnail}" data-description="${descriptions.replace('"',' ')}" data-encshowid="${item.ids}" data-genres="${item.genre_titles}" data-mediatype="${item.media_type}">`;
                                        var nadded = '';
                                        var added = '';
                                        if (item.in_watchlist != 1) { // if item not in watchlist
                                            nadded = 'd-none';
                                        }else{
                                            added = 'd-none';
                                        }
                                        
                                        
                                        banner_data += `<a href = "javascript:void(0);" class="play_w fav-item-${item.show_id} ${added}" onclick="addToWatchList(event,${item.show_id},1)" tooltip="<?= $this->lang->line('add_to_watchlist'); ?>">
                                            <img class = "img-fluid playAdd" src="assets/images/add.svg" alt = "joinwatch" >
                                        </a>`;
                                        banner_data += `<a href="javascript:void(0);" class="play_w bg-green fav-item-${item.show_id} ${nadded}"  onclick="addToWatchList(event,${item.show_id},3)" tooltip="<?= $this->lang->line('added_to_watchlist'); ?>">
                                                <img class="img-fluid playAdd" src="assets/images/clicks.svg" alt="joinwatch">
                                                </a></div></div>`;
                                    }
                                }
                                banner_data += '<div class="share_hl  ms-3 tooltip-text d-none" tooltip="<?= $this->lang->line('share'); ?>">' +
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
                                    '<p class="c_over col_768_after_display_none">&nbsp;</p>';
                                    if(item.redirection_type == 2){
                                        banner_data += '<a href="' + siturl + '" class="pb_banner_vd" target="_blank">'
                                    }else{
                                        banner_data += '<a onClick="urls_call(\'' + siturl + '\')" class="pb_banner_vd">'
                                    }
                                    banner_data += '<div class="position-relative">' +
                                    '<div class="video-container">'+
                                        '<video id="my_video_' + item.id + '" width="1920" height="1080" poster="' + item.banner_url + '" autoplay disablePictureInPicture class="my_video vzooms"></video>'+
                                    '</div>'+
                                    '<p class="c_over_bott c_over_bott_dt mb-0">&nbsp;</p>' +
                                    '</div>' +
                                    '</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' + '</div>';
                            }
                        });
                        banner_data += '</div>' +
                            '</section>';
                        trending  += banner_data;
                        resolve();
                        muteunmute();
                    });
                    
                    $(document).ready(function(){
                        //$('.carousel_top3').css('visibility', 'hidden');
                        // Initialize the carousel if it exists
                        if ($('.carousel_top3').length > 0) {
                            $('.carousel_top3').on('init', function(event, slick) {
                                // Show the carousel once Slick is fully initialized
                                $(this).css('visibility', 'visible');
                                // Check the number of slides and adjust visibility of dots
                                var slideCount = $('.carousel_top3 .slick-slide').length;
                                if (slideCount > 1) {
                                    $('.carousel_top3 .slick-dots').show();
                                } else {
                                    $('.carousel_top3 .slick-dots').hide();
                                }
                            });

                            // Initialize Slick carousel
                            $('.carousel_top3').slick({
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: true,
                                fade: true,
                                prevArrow: '<button type="button" class="slick-next"><img src="<?= base_url('assets/images/prev.svg') ?>" alt="logo" loading="lazy"></button>',
                                nextArrow: '<button type="button" class="slick-prev"><img src="<?= base_url('assets/images/next.svg') ?>" alt="logo" loading="lazy"></button>',
                                speed: 100,
                                cssEase: 'linear',
                                autoplay: true,
                                autoplaySpeed: carouselTime,
                                pauseOnFocus: false
                            });
                            // Force re-calculation of layout after a slight delay
                            setTimeout(function() {
                                $('.carousel_top3').slick('setPosition');
                            }, 100);
                        }
                    });

                }else if(items.playlist_type_id == 14){ // check if it is Kisaan playlist
                    var kisan = `<section class="mb-4 mt-2 px-3 position-relative kisan" id="${titles}" name="${titles}">
                                    <div class="container-fluid">
                                        <div class="row m-0">
                                            <div class="col-md-12">
                                                <div>
                                                    <img src="${item.banner}" alt="images" class="img-fluid position-relative">
                                                    <div class="geners_data2">
                                                        <div class="row mt-1">
                                                            <div class="col-md-12">
                                                                <div class="d-flex mb-2 view-dtsd d-none">
                                                                    <h6 class="defaultColr mt-2 mb-4  pl_5 d-block delayed-element">${titles}</h6>
                                                                    <a class="defaultColr mt-1 mb-3  view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';">
                                                                        <?= $this->lang->line('viewall') ?> <i class="fas fa-solid fa-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="geners_data3 owl-carousel owl-theme">`;
                                                            items.list.forEach(function(item) {
                                                                var siturl = 'play-video?id=' + item.ids;
                                                                kisan +=  `<div class="item">
                                                                                <a onClick='urls_call("${siturl}","${item.title}")'>
                                                                                    <div class="cardDetails shadow card_hover_item">
                                                                                        <div class="card-header">
                                                                                            <img src="${item.poster_url}" alt="images" class="img-fluid landscape_img">
                                                                                        </div>
                                                                                    </div>                                                                    
                                                                                </a>
                                                                            </div> `;
                                                            });
                                            kisan  +=   `</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>`;
                    trending  += kisan;

                    $(document).ready(function(){
                        $('.geners_data3').owlCarousel({
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
                                    items: 3
                                },
                                1024: {
                                    stagePadding: 10,
                                    items: 3,
                                slideBy:3
                                },
                                1025: {
                                    items: 3,
                                    margin: 15,
                                    slideBy:3
                                },
                                1400: {
                                
                                    items: 3,
                                    margin: 15,
                                    slideBy:3
                                },
                                1800: {
                                    
                                    items: 4,
                                    margin: 15,
                                    slideBy:3
                                }
                            }
                        });
                    });

                }else if(items.playlist_type_id == 3){ // check if playlist is continue watching
                    var show_hide = '';
                    var continue_watchings = [];
                    // check if data exist then sort it based on last updated time
                    if(watchingData && watchingData.length > 0){
                        continue_watchings =  watchingData.sort((a,b)=>{
                            return a.updated_at - b.updated_at;
                        });
                    }
                    let cont_watching_title = items.title;
                    if(cont_watching_title.length){
                        let landId = ("<?=$lang_id;?>").toLowerCase();
                        //console.log("landId",landId);
                        let filtered_title = cont_watching_title.find(each => (each.language).toLowerCase() == landId);
                        //console.log("filtered_title",filtered_title);
                        if(filtered_title){
                            show_hide = filtered_title.content;
                        }
                    }
                    //console.log("continue_watch_data",items);
                    // show this section only if it has content
                    continue_watchings.forEach(function(item) { 
                        if (item.is_deleted == 0) {
                            c_class = '';
                            //show_hide = '<?= $this->lang->line('Continue-Watching')?>'
                        }
                    });
                   //console.log( continue_watchings.length,'continue_watchings');
                    var continue_watching1 = `
                        <section id="cont-watch-sec" class=" mb-4 mt-2 viewAllSection  ${newclas} ${newclas1}"  name="${titles}">
                            <div class="container-fluid">
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <div class="d-flex view-dtsd d-none">
                                            <h6 class="defaultColr mt-2 mb-3 pl_5 delayed-element">${show_hide}</h6>`;
                                            if (continue_watchings.length > 10) {
                                                continue_watching1 += `
                                                    <a href="<?= base_url('watching-details'); ?>" class="defaultColr mt-1 mb-3  view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';">
                                                        <?= $this->lang->line('viewall') ?> <i class="fas fa-solid fa-arrow-right"></i>
                                                    </a>`;
                                            }

                    continue_watching1 += `
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
                                timeLeftString = h + "h " + m + "m <?= $this->lang->line('leftTime') ?>";
                            }else{
                                let m = Math.round((time_left) / 60);
                                if (m == 0) {
                                    m = 1;
                                }
                                timeLeftString = m + "m <?= $this->lang->line('leftTime') ?>";
                            }
                            const siturl = 'play-media?id=' + item.encrypted_id + '&type=' + type;
                            var url = (item.poster_url) ? item.poster_url : '<?= base_url(PosterPlaceholder) ?>';
                            var percentage = Math.round((item.paused_at / item.video_duration) * 100);
                            var id = item.show_id; //aes_cbc_encryption_(item.show_id);
                            var wt_id = item.video_id; //aes_cbc_encryption_(item.video_id);'<?//= site_url('/play-episode?id=') ?>'+wt_id + '&cid='+id ;

                            continue_watching1 += `
                                <div class="item owl_pading ">
                                    <div class="cardDetails shadow">
                                        <div class="card__header card_watch_img" data-title = '${item.title}' data-id = '${item.show_id}'>`;
                                        if (item.pause_at) {
                                            continue_watching1 += `
                                                    <a href=""><i class="fas fa-times delete_btn"></i></a>`;
                                        } else {
                                            continue_watching1 += `
                                                    <span onclick="remove_from_watchlist(${item.id},${item.video_id},'${item.title}', this)">
                                                        <img class="img-fluid premium_content_s delete_btn delete_bt" src="<?= base_url('assets/images/closeVid.png') ?>" alt="Premium">
                                                    </span>
                                                    <a onClick='urls_call("${siturl}","${item.title}")'>`;
                                        }

                                        continue_watching1 += `
                                                        <div class="position-relative">
                                                            <img src="${url}" class="position-relative banner_image banner-as landscape_img" alt="${item.title}" loading="lazy">
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
                    continue_watching1 += `
                    </div>
                </div>
            </section>`;
            trending  += continue_watching1;
        }else if (items.playlist_type_id == 1){
            adscount = adscount+1
            trending += advertisment(items,newclas,newclas1,titles,adscount);
        } else if (items.playlist_type_id == 9 || items.playlist_type_id == 10 || items.playlist_type_id == 11) {
            trending += landscape_design(items,newclas,newclas1,titles);
        }else{
            trending += potrate(items,newclas,newclas1,titles,category_id,video_data_id,mtype);
        }    
        k++;
        $('#trending').append(trending);

        // manage home feed
        if(items.below_recomendation && items.below_recomendation > 0){ // check if we need to add feed data below this playlist
            if(!homeData.data[key+1] || (homeData.data[key+1].above_recomendation==0)){ // and this is last playlist or upcoming playlist have no above feed
                if(items.playlist_type_id  == 2 ){
                    const filteredItems = items.list.filter(listItem => listItem.banner_type === 0);
                    if(filteredItems.length > 0){
                        options.homeClass = 'banner-bottom-sec';
                    }
                }
                var shortsHtml = await renderShortsData(shortsData, items.below_recomendation, startsWith, options);
                $('#trending').append(shortsHtml);
                startsWith += items.below_recomendation;
                if(shortsHtml != ''){
                    newclas1 ='mt-2';
                }
            }
        } 
    
        $(document).ready(function() {
            $('.view-dtsd').removeClass('d-none');
               $(".carousel_bott4").owlCarousel({
                items:8,
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
                        slideBy: 3
                    
                    },
                    1025: {

                        items: 6,
                        margin: 20,
                        slideBy: 3
                    },
                    
                    1450: {

                        items: 7,
                        margin: 20,
                        slideBy: 3
                    },


                    1800: {

                        items: 8,
                        margin: 20,
                        slideBy: 3
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

        $(document).ready(function() {
           // $('.geners_data').owlCarousel('destroy'); // Destroy the existing instance
         $(".geners_data").owlCarousel ({
                items:5,
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
                        slideBy: 3
                       
                    },
                    1025: {
                        items: 4,
                        margin: 15,
                        slideBy: 3
                    },
                    1400: {
                        items: 4,
                        margin: 15,
                        slideBy: 3
                    },
                    1800: {
                        items: 5,
                        margin: 15,
                        slideBy: 3
                    }
                }
            });
           
        });
        shimmer('hide');
    }
    hasscroll = false;
    // manage class 'banner-bottom-sec'
    $('section').removeClass('banner-bottom-sec');
    const bannerSection = document.querySelector('.banner_after_navbar');
    if (bannerSection && bannerSection.nextElementSibling) {
        bannerSection.nextElementSibling.classList.add('banner-bottom-sec');
    }
    
})();

    

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
    const elementsToCheck = document.querySelectorAll('#trending section');

    window.addEventListener('scroll', () => {
        const currentScrollTop = window.pageYOffset;
        if (currentScrollTop > lastScrollTop) {
            for (const element of elementsToCheck) {
              
                if (isElementVisible(element) && !loggedElements.has(element.id)) {
                    const elementName = element.getAttribute('name');
                    if(elementName !=null){
                  //  queueTrackingDataWithDelay('trackEvent', ["HomePage", "VerticalScrolling", elementName],0);    
                    }
                     // matomo('HomePage','VerticalScrolling',elementName);
                    loggedElements.add(element.id); // Mark this element as logged
                }
            }
        }
        lastScrollTop = currentScrollTop;
    });
    muteunmute();
    }
}

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
                   // console.log(link);
                }
            });

            $(document).on('click', '.shareHls', function() {
                id = $(this).data('id');
                geners = $(this).data('genres');
                title = $(this).data('title');
                queueTrackingDataWithDelay('trackEvent', ["Share", "Share",id+'/'+title, geners],0);
		//queueTrackingData('trackContentImpression', ["Share", "content_type"]);
		// queueTrackingData('trackContentInteraction', ["Share" + '/' + "view", "pageaction", "content_type"]);

                //matomo('Share', 'Share', id+'/'+title, geners);
                // console.log('title',title);
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
         //matomo('Share', 'Share', title, geners);
         queueTrackingDataWithDelay('trackEvent', ["Share", "Share",title, geners],0);
        var copyText = $("#inputText-"+id);
        copyText.val();
        navigator.clipboard.writeText(copyText.val());
     //   console.log(copyText)
        // Copy the selected text to clipboard
        document.execCommand('copy');
        $('#copyBtn-'+id).html("<?=$this->lang->line('copied')?>")
        // $("#share_btn").modal('hide');
        //location.reload();
        // Deselect the text
        //window.getSelection().removeAllRanges();
      // });
    }


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
    <section class="mb-4 viewAllSection  ${newclas} ${newclas1}  " id="${titles}" name="${titles}">
        <div class="container-fluid">
            <div class="row mt-1">
            <div class="col-md-12">
        <div class="d-flex mb-2 view-dtsd view_gendts d-none">
                <h6 class="defaultColr mt-2 mb-4 pl_5 delayed-element con-lg">${titles}</h6>`;
                            if (item.playlist_type_id == 11) {
                                if ( item.list.length > 10) {

                   content_languages += ` <a onClick="urls_call('app-in-list?publisher_id=${item.id}&name=${titles}')" class="defaultColr mt-1 mb-3  view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';">
                             <?= $this->lang->line('viewall') ?> <i class="fas fa-solid fa-arrow-right"></i>
                        </a>`;
                                }
            }
            content_languages += ` </div>
           </div>
            </div>
            <div class="geners_data owl-carousel owl-theme banner_load_af pgn">`;
        item.list.forEach(function(languageItem) {
        // if(!languageItem.thumbnail){
        //     return false;
        // }
        var  premium ='';
        if (item.playlist_type_id == 11) {
        if(languageItem.is_paid != 0){
            premium ='<div class="premium_icondt pr_coint"><img src="<?= base_url('assets/images/premium-icon.svg') ?>" alt="premium"></div>';
        }
         }
        languageItem.thumbnail = languageItem.thumbnail ? languageItem.thumbnail : '<?= base_url(PosterPlaceholder) ?>';
        var base_url = "<?php echo base_url(); ?>";
        var url;
        if (item.playlist_type_id == 9) {
        url = base_url + 'gener_list?content_language_id=' + encodeURIComponent(languageItem.ids) + '&title=' + encodeURIComponent(languageItem.titles);
        } else if (item.playlist_type_id == 10) {
        url = base_url + 'gener_list?genre=' + encodeURIComponent(languageItem.ids) + '&title=' + encodeURIComponent(languageItem.title);
        } else {
        url = base_url + 'provider?id=' + encodeURIComponent(languageItem.ids) ;
        }

       
        content_languages += `
            <div class="item owl_pading">
                <div class="cardDetails shadow card_hover_item lang" data-title="${languageItem.title}" data-playlist_title="${titles}" data-playlist_type="${item.playlist_type_id}" data-id="${languageItem.id}" >
                    <a onClick="urls_call('${url}')">
                        <div class="card__header">${premium}
                            <img src="${languageItem.thumbnail}" class="position-relative banner_image banner-as landscape_img" alt="${languageItem.title}" loading="lazy">
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
        $(document).ready(function() {
            $('.geners_data').owlCarousel('destroy'); // Destroy the existing instance

        $(".geners_data").owlCarousel({
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
                        slideBy: 3
                       
                    },
                    1025: {
                        items: 4,
                        margin: 15,
                        slideBy: 3
                    },
                    1400: {
                        items: 4,
                        margin: 15,
                        slideBy: 3
                    },
                    1800: {
                        items: 5,
                        margin: 15,
                        slideBy: 3
                    }
                }
            });
             
        });
        return content_languages;

    }


    function potrate(item,newclas,newclas1,titles,category_id,video_data_id,mtype) {
        var mfeedType = localStorage.getItem('feedType')??'0';
        if(mfeedType >0){
            mfeedType = 'TagPage';   
        }

        let j = 1;
        let k = 1;        var trending = `
                <section class="mb-4  viewAllSection ${newclas} ${newclas1} " id="${titles}" name="${titles}">
                    <div class="container-fluid" >
                        <div class="row mt-1">
                        <div class="col-md-12">
                        <div class="d-flex mb-2 view-dtsd d-none">
                            <h6 class="defaultColr mt-2 mb-4 pl_5 delayed-element">
                                ${titles}
                            </h6>
                            ${ item.list.length >= 10 && item.playlist_type_id != 6 && item.playlist_type_id != 4? `
                        <a onClick="urls_call('${category_id}','${mtype}','${item.id+"/"+titles}','${titles}')" class="defaultColr mt-1 mb-3  view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';">
                            <?= $this->lang->line('viewall') ?> <i class="bannerPlayBtn fas fa-solid fa-arrow-right"></i>
                        </a>
                        </div>
                    ` : ''}
                        </div>
                        <div class="carousel_bott4 owl-carousel owl-theme banner_load_af ${(k == 1) ? 'tobSlider' : ''}">`;
    j=1;
    trending += `${item.list.slice(0, 10).map(data => {
                                let visibleTag='';
                                if (data.tags && data.tags.length > 0) {
                                    let foundTag = data.tags.find(tag => tag.visible === 1);
                                    if (foundTag && foundTag.url) { 
                                     visibleTag = foundTag.url;
                                    } 
                                }
                            
                                if (data.hasOwnProperty('owned_by')) {
                                    if (data.owned_by > 0) {                                    
                                        const validSubscriptions = "<?= json_encode(SUBSCRIBEUSER)?>";
                                        if (typeof validSubscriptions !== 'undefined') {
                                        if (validSubscriptions.includes(data.owned_by)) {
                                            isSubscribed = 1;  
                                        }else{
                                        isSubscribed = 0;  
                                       } 
                                      }else{
                                        isSubscribed = 0;  
                                    }
                                } 
                               }  
                                var plybtn = "<?= base_url('assets/images/playBtn.png') ?>"; 
                                if((isSubscribed != 1) && (data.is_paid!=0 && data.is_paid!=2) && (sess_id!=="")){
                                    plybtn = "<?= base_url('assets/images/playBtn.png') ?>";
                                    var message = (data.type == 0) ? subscribe_watch :subscribe_listen;
                                    var siturl = 'play-video?id=' + data.ids;
                                    // var siturl1 = 'subscription';
                                    var siturl1 = 'play-episode?id=' + data.ids;
                                }
                                else if((isSubscribed != 1) && (data.is_paid!=0 && data.is_paid!=2) && (sess_id=="")){
                                    plybtn = "<?= base_url('assets/images/playBtn.png') ?>";
                                    var message = (data.type == 0) ? subscribe_watch :subscribe_listen;
                                    var siturl = 'play-video?id=' + data.ids;
                                     var siturl1 = 'subscription?publisherid='+data.owned_by;
                                    //var siturl1 = 'play-episode?id=' + data.ids;
                                }
                                else if (data.is_paid==2 && (data.is_rented != 1)) {
                                    plybtn = "<?= base_url('assets/images/vector.svg') ?>";
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
                                    if(item.playlist_type_id != 6){
                                    var siturl1 = 'play-episode?id=' + data.ids;
                                    }else{
                                        var siturl = 'play-video?id=' + data.ids+'&similar=Recommendation';
                                        var siturl1 = 'play-episode?id=' + data.ids +'&similar=Recommendation';
                                    }
                                } 
                               
                                                    
                                data.thumbnail = data.thumbnail?data.thumbnail:'<?=base_url(ThumbnailPlaceholder)?>';
                                data.poster_url = data.poster_url?data.poster_url:'<?=base_url(PosterPlaceholder)?>';
                                var genre = data.genres;
                                var is_paid=data.is_paid;
                                if (genre) { 
                                 //   genre = data.genres.replace(/,/g, ' | ');
                                    var geners = data.genres ? data.genres.replace(/,/g, ' | ') : '';
                                     genre =  geners.split('|').map(items => items.trim()).slice(0, 3).join(' | ');
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
                               var html = '';
                               if(data.type ==1 ||data.type ==0|| data.type == 9){
                                var Datetime = formatTimestamp(data.live_date_time);
                                var  buttonText =  "<?= $this->lang->line("began_on") ?>"+" "+Datetime;
                                var live = "<?= LIVEEVENT?>";
                                var watchlist ='';
                                         var upcoming = "<?= UPCOMINGEVENT ?>";   
                                       if( item.playlist_type_id ==12 ||  data.type == 9){
                                        watchlist = 'd-none';
                                        if( item.playlist_type_id ==12){
                                        data.file_url = '';
                                        data.vdc_id = '';
                                        }
                                        var htmls = '';
                                        var btndisable = '';
                                        if(data.is_live == 1){
                                            message = watch_app; 
                                            siturl = siturl1 = 'live?id=' + data.ids;
                                            htmls += `<div class="live_upcoming"> <div class="live_up_lang"><span></span><p class="mb-0"><?= $this->lang->line("Live") ?></p></div></div>`;
                                        }else if(data.is_live == 0){
                                            message = buttonText;
                                            plybtn = '';
                                            btndisable = '';
                                            htmls += `<div class="live_upcoming"> <div class="live_up_lang"><p class="mb-0"><?= $this->lang->line("upcoming") ?></p></div></div>`;
                                            siturl = siturl1 =siturl;
                                        }else if(data.is_live == 4){
                                            message = "<?= $this->lang->line("since_text") ?>"+" "+Datetime;
                                            plybtn = '';
                                          //  btndisable = 'disabled';
                                           // htmls += `<div class="live_upcoming"> <div class="live_up_lang"><p class="mb-0"><?= $this->lang->line("live_event_not") ?></p></div></div>`;
                                           siturl = siturl1 =siturl;
                                        }
                                    }
                                 html += `<div class="item">
                                        <a onClick="urls_call('${siturl}')">
                                            <div class="pb_card_details play_hover_show ${(data.is_paid == 0) ? '' : 'pb_card_outer' }" data-type="${data.is_paid??0}" data-id="${video_data_id + data.id}"  data-meid="${data.id}" data-title="${data.title}" data-playlist_type_id="${item.playlist_type_id}" data-playlist_title="${titles}" data-playlist_type="${video_data_id}"  data-genres="${data.genres}" data-banner="${data.thumbnail}" data-url="${data.file_url}" data-isdrm="${data.is_drm_protected}" data-mediaid="${data.video_id}" data-vdcid="${data.vdc_id}" data-trailer="${data.video_id}">`;
                                            var pb_watch_width = '';
                                            if( item.playlist_type_id ==12 || data.type == 9){
                                                pb_watch_width = 'pb_watch_width'
                                            html +=htmls;   
                                            }    
                                                html += `<div class="pb_card_img ${item.playlist_type_id &&  item.playlist_type_id == 4 ? 'home_main_trend' : ''}">
                                                ${data.is_paid == 1 ? `<div class="premium_icondt"><img src="<?= base_url('assets/images/premium-icon.svg') ?>" alt="premium"></div>` : (data.is_paid == 2 ? `<div class="premium_icondt"><img src="<?= base_url('assets/website_assets/images/rental.svg') ?>" alt="rental"></div>` : '')}
                                                                 
                                                 ${item.playlist_type_id && item.playlist_type_id == 4 ? `<div class="toptrendimg"><img src="${'<?= base_url() ?>'}assets/images/${j++}.svg" class="img-fluid" alt="toptrend"></div>` : ''}
                                                    <img src="${data.thumbnail}" class="img-fluid as_ratio portrait_img" alt="${data.title}" loading="lazy">`
                                                    if( visibleTag != ''){
                                                        html +=  `<div class="pre_tags"><img src="${visibleTag}" class="img-fluid" alt="tags_img"></div>`;  
                                                    }
                                                    html += `</div>
                                                <div class="pb_card_img2">
                                                    <div class="pb_card_vd-2 position-relative">
                                                        ${(data.file_url ||  data.is_drm_protected == 1) ? `
                                                            <div class="video-container">
                                                                <video id="my_showw_${video_data_id + data.id}" poster="${data.poster_url}" autoplay class="my_show"></video>
                                                            </div>` : `
                                                            <img src="${data.poster_url}" class="img-fluid" alt="${data.title}" loading="lazy">
                                                        `}
                                                        <div class="volume_banner_dt" id="mute-toltip-${video_data_id+data.id}" >
                                                           <a href="javascript:void(0);" data-valumeType="card" class="banner_volume card_volume" data-id=${video_data_id+data.id}>
                                                             <img id="mute-icn-${video_data_id+data.id}" src="<?= base_url('assets/images/mute.svg') ?>" alt="mute" class="img-fluid">
                                                           </a>
                                                          </div>
                                                    </div>
                                                    <div class="pb_card_content">
                                                        <h6>${data.title}</h6>
                                                        <p class="discription_gen">${ genre }</p>
                                                        <p class="discription_dt">${descriptions}</p>
                                                        <div class="d-flex align-items-center mt-1 pb_add_btns pb_card_watch categaryAddBtn" >

                                                            <button  ${btndisable} onClick="${data.is_paid == 2 ? `urls_call('${siturl1}')` : `urls_call('${siturl1}')`}" class="pb_watch_btn d-block  ${pb_watch_width}">
                                                                ${data.is_paid == 2 ? `<img class="img-fluid watchCardImg" src="${plybtn}">` : `<img class="img-fluid watchCardImg"  src="${plybtn}">`}
                                                              ${message}
                                                            </button>`;
                                                           if("<?=$this->session->profile_id?>"){
                                                            html += `<div class="${watchlist}" id="fav-${data.id}" data-id="${data.id}" data-title="${data.title}" data-poster="${data.poster_url}" data-is_paid="${data.is_paid??0}" data-thumbnail="${data.thumbnail}" data-description="${descriptions}" data-encshowid="${data.ids}" data-genres="${data.genres}" data-mediatype="${data.media_type}">`;

                                                            var added = '';
                                                            var nadded = '';
                                                            if (data.in_watchlist != 1) {
                                                                nadded = 'd-none';
                                                            }else{
                                                                added = 'd-none';
                                                            }
                                                            if( item.playlist_type_id !=12){
                                                                html += ` <a href = "javascript:void(0);"class = "pb_add d-block ms-2 fav-item-${data.id} ${added}" onclick = "addToWatchList(event,${data.id},1,'card')">
                                                                <img class = "img-fluid playAdd" src = "assets/images/jointWatch.svg"alt = "joinwatch" >
                                                               </a>`;
                                                               html += `<a href="javascript:void(0);" class="pb_add bg-green d-block ms-2 fav-item-${data.id} ${nadded}"  onclick="addToWatchList(event,${data.id},3,'card')">
                                                                     <img class="img-fluid playAdd" src="assets/images/click.svg" alt="joinwatch">
                                                                    </a>`;
                                                                }
                                                             html += `
                                                            </div>`
                                                           
                                                           }
                                                           html += `</div>
                                                         </div>
                                                    </div>
                                            </div>
                                        </a>
                                    </div>`;}
                                    if(data.type >= 2 && data.type != 8 && data.type != 9){
                                        var live = "<?= LIVEEVENT?>";
                                         var upcoming = "<?= UPCOMINGEVENT ?>";   
                                       if( item.playlist_type_id ==12){
                                        var htmls = '';
                                        if(data.is_live == 1){
                                            siturl = 'live?id=' + data.ids;
                                            htmls += `<div class="live_upcoming"> <div class="live_up_lang"><span></span><p class="mb-0"><?= $this->lang->line("Live") ?></p></div></div>`;
                                        }else if(data.is_live == 0){
                                            htmls += `<div class="live_upcoming"> <div class="live_up_lang"><p class="mb-0"><?= $this->lang->line("upcoming") ?></p></div></div>`;
                                            siturl = siturl;
                                        }
                                       }else{
                                        siturl = 'content-detail?id=' + data.ids;
                                       }
                                   html += `<div class="item">
                     <a onClick="urls_call('${siturl}')">
                        <div class="pb_card_details img_pdf_dets">`;
                        if( item.playlist_type_id ==172){
                        html +=htmls;   
                        }                                           
                        html += `${item.playlist_type_id && item.playlist_type_id == 4 ? `<div class="toptrendimg"><img src="${'<?= base_url() ?>'}assets/images/${j++}.svg" class="img-fluid" alt="toptrend"></div>` : ''}
                            <div class="pb_img_pdf">
                                <img src="${data.thumbnail}" class="img-fluid" alt="${data.title}">

                            </div>

                        </div>
                    </a>

                </div>`;
                                    }  else if(data.type == 8) {
                                        siturl = data.redirect_url;
                                   html += `<div class="item">
                     <a onClick="ini_ondc('${siturl}')">
                        <div class="pb_card_details img_pdf_dets">                                              
                        ${item.playlist_type_id && item.playlist_type_id == 4 ? `<div class="toptrendimg"><img src="${'<?= base_url() ?>'}assets/images/${j++}.svg" class="img-fluid" alt="toptrend"></div>` : ''}
                            <div class="pb_img_pdf">
                                <img src="${data.thumbnail}" class=" portrait_img" alt="${data.title}">

                            </div>

                        </div>
                    </a>

                </div>`;
                                    }           

            return html;
            }).join('')
        }  
        </div> </div> </section>`;
        return  trending ;
    }


    function advertisment(item, newclas, newclas1, titles,position) {
        var ads = `
    <section class="advertice_section1 py-5 ${newclas}" id="${titles}" name="${titles}">
        <div class="container-fluid">
            <div class="row g-0">
                <div class="col-12">
                    <div class="card advertice_card owl-carousel owl-theme">`;

    item.list.forEach(function(ads_item) {
        ads += `   <div class="item">
    <div class="row g-0">
            <div class="col-md-4">
                 <a href="${ads_item.ads_url}" target="_blank" data-ads_url="${ads_item.ads_url}" data-context_title="${ads_item.context_title}" data-title="${ads_item.title}" data-id="${ads_item.id}" data-position="${position}" class="adsclick">
                <div class="add_img">
                    <p class="ak_ads"></p>
                    <img src="${ads_item.banner}" class="img-fluid" alt="${ads_item.title}">
                </div>
                  </a>
            </div>
            <div class="col-md-8">
        
                <div class="card-body add_body add_body_download">
                <a href="${ads_item.ads_url}" target="_blank" class="adsclick" data-ads_url="${ads_item.ads_url}" data-context_title="${ads_item.context_title}" data-title="${ads_item.title}" data-id="${ads_item.id}" data-position="${position}">
                    <div class="add_text">
                        <p class="add_p">${ads_item.context_title}</p>
                        <h4 class="add_h4">${ads_item.title}</h4>
                    </div>
                    <div class="add_btn">
                        <a href="${ads_item.ads_url}" class="btn add_visit_btn adsclick" data-ads_url="${ads_item.ads_url}" data-context_title="${ads_item.context_title}" data-title="${ads_item.title}" data-id="${ads_item.id}" data-position="${position}" target="_blank">${ads_item.cta_button}</a>
                    </div>
                      </a>
                </div>
                 
            </div>
    </div>
</div>`;
    });

    ads += `
                    </div>
                </div>
            </div>
        </div>
    </section>`;

    // Ensure Owl Carousel is initialized after document is ready
  $(document).ready(function() {
    // Initialize Owl Carousel
    var owl = $(".advertice_card").owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });

    // Once the carousel is fully initialized, change display to block
    owl.on('initialized.owl.carousel', function() {
        $(".advertice_card").css('display', 'block');  // Change display to block
        owl.trigger('refresh.owl.carousel');  // Refresh carousel layout if needed
    });
});

    $(document).on("click", ".adsclick", function(event) {
       // event.preventDefault(); 
        var ads_id = $(this).data('id');
        var ads_name = $(this).data('title');
        var ads_context = $(this).data('context_title');
        var ads_position = $(this).data('position');
        var ads_url = $(this).data('ads_url');
        _paq.push(['setCustomDimension', 4, 'Ad' ]);
        queueTrackingDataWithDelay('trackEvent', ["WAVESPBAD", "AdClicked",ads_position+"/"+ ads_id + '/' +ads_context +"-"+ads_name +"/"+ads_url], 0);

    });
    return ads;

}
$(document).on("click", ".play_hover_click ",  function(event) {
    event.stopPropagation();  

  var c_id = $(this).data('id');
    var hyperlink = $(this).data('hyperlink');
    var cmtype = $(this).data('cmtype');
    var ctype = $(this).data('ctype');
    var c_name = $(this).data('title');
    var gen = $(this).data('genres') || '-'; // Use || as a fallback in case data('genres') is undefined
      var mtype = ''; 
    if(ctype == 1){
            ctype = 'Video'+"/"+c_id + '/' + c_name;
            mtype = 'WatchNow'
        }
        if(ctype == 3){
            ctype = 'LiveChannel'+"/"+c_id + '/' + c_name;
            mtype = "WatchNow";
        }
        if(ctype == 4){
            ctype = 'Games'+"/"+c_id + '/' + c_name;
            mtype = 'PlayNow'
        }
        if(ctype == 2){
            ctype = 'Hyperlink/Banner'+hyperlink;
            mtype = 'PlayNow'
        }
        if(cmtype == 9){
            ctype = 'LiveEvent'+"/"+c_id + '/' + c_name;
            mtype = 'WatchNow' 
        }
    queueTrackingDataWithDelay('trackEvent', ["Banner", "Select", ctype], 0);
    queueTrackingDataWithDelay('trackContentInteraction', ["Banner/Selected", ctype, gen], 100);
    queueTrackingDataWithDelay('trackContentImpression', [c_id + "/" + c_name, "-"], 200);
//   matomo('Banner','Select',c_id +'/'+ c_name );
//   matomo('Banner','Watch Now',c_id +'/'+ c_name , gen);
    });

    $(document).on("click", ".bannerPlayBtn", function(event) { 
    event.stopPropagation(); // Ensure the event is passed to stopPropagation

    // Get the necessary data attributes from the clicked element
    var c_id = $(this).data('id');
    var hyperlink = $(this).data('hyperlink');
    var cmtype = $(this).data('cmtype');
    var ctype = $(this).data('ctype');
    var c_name = $(this).data('title');
    var gen = $(this).data('genres') || '-'; // Use || as a fallback in case data('genres') is undefined
      var mtype = ''; 
    if(ctype == 1){
            ctype = 'Video'+"/"+c_id + '/' + c_name;
            mtype = 'WatchNow'
        }
        if(ctype == 3){
            ctype = 'LiveChannel'+"/"+c_id + '/' + c_name;
            mtype = "WatchNow";
        }
        if(ctype == 4){
            ctype = 'Games'+"/"+c_id + '/' + c_name;
            mtype = 'PlayNow'
        }
        if(ctype == 2){
            ctype = 'Hyperlink/Banner'+hyperlink;
            mtype = 'PlayNow'
        }
        if(cmtype == 9){
            ctype = 'LiveEvent'+"/"+c_id + '/' + c_name;
            mtype = 'WatchNow' 
        }
    // Tracking interactions
    queueTrackingDataWithDelay('trackEvent', ["Banner", mtype, ctype], 300);
    queueTrackingDataWithDelay('trackContentInteraction', ["Banner/"+mtype, ctype, gen], 400);
    queueTrackingDataWithDelay('trackContentImpression', [c_id + "/" + c_name, gen], 500);
});


$(document).on("click", ".play_hover_show ", function() {
  var c_id = $(this).data('meid');
  var c_name = $(this).data('title');
  var gen = $(this).data('genres');
  var video_data_id='';
  var playlist_type_id = $(this).data('playlist_title');
  video_data_id = playlist_type_id;
//  if(playlist_type_id==4){ 
//     var video_data_id =  "Trending";
//  }
//  if(playlist_type_id==6){ 
//     var video_data_id =  "RecommendedForYou ";
//  }
 if(video_data_id!=''){
  //  console.log(playlist_type_id);
   queueTrackingDataWithDelay('trackEvent', ["Home", "ContentSelected ",video_data_id +'/' + c_id +'/'+ c_name ],10);

}

//  matomo_ho('Home','ContentSelected', video_data_id +' ' + c_id +'/'+ c_name ,video_data_id, gen);
//   function matomo_ho(user = '' ,type, title,video_data_id) {
//     var url = '<?= base_url("/web/Home/matomo_hit"); ?>';
//     $.ajax({
//       url: url,
//       type: "POST",
//       dataType: "json",
//       async: "true",
//       data: {
//         user: user,
//         types: type, // Typo here, it should be type instead of types
//         title: title,
//         search_jao:video_data_id
//       },
//       success: function(data) {
//         // console.log("Data: ", data);
//       },
//       error: function(xhr, status, error) {
//         //  console.error("Error: " + error);
//       }
//     });
//   }
    });

    $(document).on("click", ".card_hover_item ", function() {
  var c_id = $(this).data('id');
  var c_name = $(this).data('title');
  var gen = $(this).data('genres');
  var video_data_id='';
  var playlist_type_id = $(this).data('playlist_title');
  video_data_id = playlist_type_id;
//  if(playlist_type_id==4){ 
//     var video_data_id =  "Trending";
//  }
//  if(playlist_type_id==6){ 
//     var video_data_id =  "RecommendedForYou ";
//  }
 if(video_data_id!=''){
    // console.log(playlist_type_id);
   queueTrackingDataWithDelay('trackEvent', ["Home", "Select ",video_data_id +'(' + c_name+')' ],10);

}
});


// $(document).on("click", ".lang ", function() {
//   var c_id = $(this).data('title');
//    var playlist_type = $(this).data('playlist_type');
// if(playlist_type==10){
//   matomo2('Home','Select','ContentLanguage'+'('+ c_id  +')');
  
// }else{
//     matomo2('Home','Select','PopularGenres '+'('+ c_id  +')');
// }
//     });

    $(document).on("click", ".card_watch_img ", function() {
  var title = $(this).data('title');
  var id = $(this).data('id');
  matomo2('ContinueWatching','ContentSelected',  id +'/'+ title);
    });
    
    function matomo2(user, type, titles, geners = '') {
        if(geners.length < 1){
            queueTrackingDataWithDelay('trackEvent', [user,type,titles],0);      
    }else{
      queueTrackingDataWithDelay('trackEvent', [user,type,titles],0);  
		 queueTrackingDataWithDelay('trackContentInteraction', [user + '/' +type, titles,geners],20);
         queueTrackingDataWithDelay('trackContentImpression', [titles, geners],40);

    }
  }


//   $(window).on('load', function() {
//     queueTrackingData('trackEvent', ['Page', 'View', 'Home']);
//   })

    var hasscroll = false;
    var endFeed = true;
    $(window).on('scroll', async function() {
        // var distanceFromBottom = $(document).height() - ($(window).scrollTop() + $(window).height());
        // // console.log('endFeed',endFeed)
        // if (distanceFromBottom <= ($(window).height()) && hasscroll == false && endFeed==false && gofor) {
        //     hasscroll = true;
        //     repeatPlaylist += 1;
        //     await renderTrendingSections(homeSectionData);
        // } else if (distanceFromBottom >= ($(window).height()) && hasscroll == true) {
        //     //hasscroll = false;
        // }
        var distanceFromBottom = $(document).height() - ($(document).scrollTop());
        if ((distanceFromBottom <= 2*$(window).height()) && hasscroll == false && endFeed==false) {
            hasscroll = true;
            repeatPlaylist += 1;
            await renderTrendingSections(homeSectionData);            
        }
    });

    </script>

    <script>
      $(document).ready(function() {
    // Scroll container
    const $scrollContainer = $('.nav_bot_br_button');
    const $scrollLeft = $('#scroll-lefts');
    const $scrollRight = $('#scroll-rights');

    // Function to check overflow and show/hide buttons
    function checkOverflow() {
        const container = $scrollContainer[0];
        const isOverflowing = container.scrollWidth > container.clientWidth;

        if (isOverflowing) {
            $scrollLeft.show();
            $scrollRight.show();
            checkScrollPosition();
        } else {
            $scrollLeft.hide();
            $scrollRight.hide();
        }
    }

    // Function to check the current scroll position and show/hide left/right buttons
    function checkScrollPosition() {
        const scrollLeftPos = $scrollContainer.scrollLeft();
        const scrollWidth = $scrollContainer[0].scrollWidth;
        const clientWidth = $scrollContainer[0].clientWidth;

        if (scrollLeftPos === 0) {
            $scrollLeft.hide();
        } else {
            $scrollLeft.show();
        }

        if (scrollLeftPos + clientWidth >= scrollWidth) {
            $scrollRight.hide();
        } else {
            $scrollRight.show();
        }
    }

    // Initial check for overflow
    checkOverflow();

    // Click event for left button
    $scrollLeft.click(function() {
        $scrollContainer.animate({
            scrollLeft: '-=150'
        }, 400, checkScrollPosition);
    });

    // Click event for right button
    $scrollRight.click(function() {
        $scrollContainer.animate({
            scrollLeft: '+=150'
        }, 400, checkScrollPosition);
    });

    // Check overflow and scroll position on window resize
    $(window).resize(function() {
        checkOverflow();
        checkScrollPosition();
    });
});

function no_datas(){
var trending = `<div class="col-md-6 m-auto text-center categaryNo">
            <div class="no_dt_found watchListNo categaryNoss">
                <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no list found">
                <h5 class="m-0 text-center text-white"><?= $this->lang->line('nolive_heading'); ?></h5>
                <p class="mb-0 text_ac"><?= $this->lang->line('CatNolistFound'); ?></p>
            </div>
        </div>`;
        return  trending ;
}


</script>
