<style>
    .top-result {
        color: #cdcdcd;
    }

    .addnot {
        display: none;
    }

    .no_dt_founds-notif {
        min-height: 100% !important;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .border_lines_user {
        border: 1px solid rgba(63, 63, 63, 1);

    }

    .subscribe_img img {
        width: 100%;
        margin-top: 8px;
    }

    .subscribe_text_dt {
        display: flex;
        align-items: center;
    }

    .subscribe_text_dt p {
        font-size: 11px;
        margin: 0;
        color: rgba(255, 255, 255, 1);

    }

    .subscribe_text_dt h5 {
        font-size: 11px;
        color: rgba(237, 185, 84, 1);
        margin: 0;
        margin-left: 3px;
    }


    .img-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .list-unstyled {
        margin-bottom: 0;
    }

    .sidenav a .int-searc-res {
        width: 100% !important;
        margin: 0;
    }

    .m-dialog {
        width: 100% !important;
        height: 100;
        margin: 0 !important;
        background: #000;
    }

    .sidenav {
        background: linear-gradient(to bottom, #0A0A0A 80%, #0A0A0A 100%, #0A0A0A 100%);
        width: 270px;
        top: 49px;
        right: -270px;
        transition: all 0.5s ease-in-out;
    }

    .toggle_navs {
        right: 0px;
    }

    #search_page .close {

        width: auto !important;
    }

    .search_all_shows_container {
        display: none;
    }

    #search_page .modal-body {
        height: 100vh !important;
    }

    .pb_wl_card {
        display: flex;
        flex-wrap: wrap;
    }

    .pb_card_vd-2 img {
        width: 100%;
    }

    .text_ac {
        color: #acacac;
    }

    .pb_wl_card .pb_card_details {
        width: 16.6%;
        margin-right: 7px;
        transition: all 0.5s;
        position: relative;
        margin-bottom: 20px;
    }

    .pb_wl_card .pb_card_details:hover {
        z-index: 999;
    }

    @media only screen and (min-width: 1801px) {
        .subscribe_text_dt h5 {
            font-size: 16px;
        }

        .subscribe_text_dt p {
            font-size: 15px;
        }

        .subscribe_img img {
            width: 100%;
            margin-top: 0px;
        }
    }

    @media only screen and (min-width: 320px) and (max-width: 767px) {
    

        .rent_height {

            font-size: 10px !important;
        }
    }
    .nav_bot_br_button .nav_bot_catass{
        margin-right:10px;
    }
    .nav_bot_cata.live-tag {
        text-transform: capitalize !important;
    }
</style>

<div class="header_dtes">
<header style="background: <?= TOP_NAVBAR; ?>">
    <nav class="navbar navbar-expand-lg navbar-light header_nav">
        <a class="pb_logo" href="javascript:void(0)" onclick="urls_call('<?=base_url()?>')">
            <img src="<?= LOGO ?>" alt='logo' loading="lazy">
        </a>

        <div class="menu_item_resp" id="navbarSupportedContent">
    
        </div>

        <div class="d-flex align-items-center three_btn header-icons">
           
            <!-- <div class="live_ev_show">
               <a href="<?//= base_url('provider?id=ZyLZ+GCDoMAAQIZ6N9R70w==:MTIzNDU2Nzg5MDEyMzQ1Ng==')?>"><img src="<?= base_url('assets/images/live_event_btn.svg'); ?>" alt='live'></a>
            </div> -->

            <?php if (SUBSCRIPTION_CHECK == 1 && !isMobile()) { if($is_upgrade == true){ ?>

                <div class="suscribe_now_btn subscribe_bts d-none u_subs">
                    <a href="<?= base_url('upgrade-subscription') ?>"><span> <img src="<?= base_url('assets/images/Subscribe_button_icon.svg'); ?>" class="Subscribe_button_ic pe-2 " alt="Subscribe_button_icon" loading="lazy"><?= $this->lang->line('upgrade') ?></span></a>
                </div>
            <?php } } 
            else if(SUBSCRIPTION_CHECK ==1 && isMobile() && $is_upgrade == true){ if($is_upgrade == true){ ?>
            <div class="suscribe_now_btn subscribe_bts d-none u_subs">
                    <a href="<?= base_url('mobile-upgrade-subscription') ?>"><span> <img src="<?= base_url('assets/images/Subscribe_button_icon.svg'); ?>" class="Subscribe_button_ic pe-2 " alt="Subscribe_button_icon" loading="lazy"><?= $this->lang->line('upgrade') ?></span></a>
                </div>
            
            
           <?php } } else { ?>
                <div class="suscribe_now_btn subscribe_bts d-none subs">
                    <a href="<?= base_url('subscription') ?>"><span><img src="<?= base_url('assets/images/Subscribe_button_icon.svg'); ?>" class="Subscribe_button_ic pe-2" alt="Subscribe_button_icon " loading="lazy"><?= $this->lang->line('subscribe_') ?></span></a>
                </div>
            <?php } ?>
              <div class="serach_right_sd">
                <div class="hed_search">
                    <span class="heade_searc_img">
                        <img src="<?= base_url('assets/images/search_header.svg'); ?>" class="" alt="search">
                    </span>
                         <input type="text" value="" class=" serach_glbs" name="search_header" placeholder="<?= $this->lang->line('search_language') ?>" autofocus="">
                    <span class="header_speech">
                             <img src="<?= base_url('assets/images/speech search.svg'); ?>" class=" " alt="speech">
                    </span>
                </div>
            </div>
            <!--  -->
            <?php if ($this->session->userdata('id')) {
                $url = 'getNotificationList';
                $document = array();
                // $notification = radis_hit('master_hit', $url, $document, 'GET');

                $notification = call_curl_by_get_method($url, $document);

                $notification_file = base_url('assets/images/notification.svg');
                if ($notification && isset($notification['data']) && !empty($notification['data'])) {
                    $notification_file = base_url('assets/images/notification.png');
                }
                //pre($notification);
            ?>
                <div class="pb_notification_icon">
                    <img class="img-fluid" src="<?= $notification_file ?>" alt='Notification' loading="lazy">
                    <input type="hidden" id="start_n" value="1">

                </div>
                <div class="pb_notification_details">

                </div>
                <div id="notification-shimmer">
                    <div class="pb_notification_details notfie_dt">
                        <?php for ($i = 0; $i <= 4; $i++) { ?>
                            <ul>
                                <li>
                                    <a class="" href="javascript:void(0);">
                                        <div class="notiPic">
                                            <div class="shimmer-animation">
                                                <img class="img-fluid card_shimmer_op" src="<?= base_url('assets/images/notification-img-shimmer.jpg') ?>" alt="NotiImg">
                                            </div>
                                            <div>
                                                <p class="notiHead notification-shimmer-para shimmer-animation"></p>
                                                <span class="">
                                                    <p class="notification-shimmer-para shimmer-animation"></p>

                                                </span>
                                            </div>
                                        </div>
                                        <div class="notification-shimmer-day">
                                            <p class="notiDay shimmer-animation"></p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        <?php
                        } ?>
                    </div>
                </div>
                <div id="notification-notdata" style="display: none;">
                    <div class="pb_notification_details notfie_dt">
                        <div class="no_dt_founds-notif ">
                            <img src="<?= base_url('assets/images/no_notifications.svg') ?>" class="img-fluid" alt="no data found">
                            <div class="mt-4">
                                <h5 class="m-0 text-center text-white"><?= $this->lang->line('no-notfication') ?></h5>
                                <p class=""><?= $this->lang->line('notfication-dt') ?></p>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>


            <div class="pb_language_icon">
                <img class="img-fluid" src="<?= base_url('assets/images/language-img.svg') ?>" alt='img' loading="lazy">
            </div>
            <div class="pb_language_detail">
                <div class="">
                    <ul class="nav nav-tabs pb_live_lang languagesclick" id="conatnt_language" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="multiple_langauage_pb-tab" data-bs-toggle="tab" href="#multiple_langauage_pb" role="tab" aria-controls="multiple_langauage_pb" aria-selected="true"><?= $this->lang->line('app_language') ?></a>
                        </li>
                    </ul>

                    <div class="tab-content pb_lang_t" id="conatnt_language">
                        <div class="tab-pane fade show active" id="multiple_langauage_pb" role="tabpanel" aria-labelledby="multiple_langauage_pb-tab">
                            
                            <div class="content_language_pb py-2">
                                <button class="pb_change_btn"><?= $this->lang->line('Change-Language') ?></button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- <div class="search_info me-2">
                <a href="<//?= base_url('search-page')?>">
                <img class="img-fluid" id="for_search12" src="<//?= base_url('assets/images/searchIconHead.png') ?>" alt='search image' loading="lazy">
                        </a>
            </div> -->


            <button class="navbar-toggler nav_menu  me-2" type="button">
                <i class="fas fa-bars"></i>
            </button>


            <div id="mySidenav" class="sidenav">
                <div class="rounded_1 card card-bg mx-3 py-2">
                    <ul class="list-unstyled">
                        <?php if ($this->session->id) {
                            $i = 1;
                        ?>

                            <li>
                                <a href="<?= site_url('prasar_login'); ?>" class="m-0 px-2">
                                    <div class="p-0 d-flex align-items-center gap-1">
                                        <img class="img-circle" src="<?= $this->session->pro_img; ?>" alt="profile pic" srcset="" loading="lazy">

                                        <div class="active-user-content ms-3 pe-4">
                                            <h6 class="active-user m-0 truncateText"><?php echo $this->session->userdata('username') ? ($this->session->userdata('username')) : 'You'; ?></h6>
                                            <?php if (!empty($this->session->email) && empty($this->session->mobile)) {
                                            ?>
                                                <span class="m-0 num email_span"> <?= $this->session->email; ?></span>
                                            <?php } else { ?>
                                                <span class="m-0 num"><?= $this->session->country_code; ?> <?= $this->session->mobile; ?></span>
                                            <?php  }  ?>
                                        </div>

                                        <? php // if($i==1){ 
                                        ?>
                                        <span class="m-0 icon_badge"><i class="fas fa-chevron-right"></i></span>
                                        <? php // } 
                                        ?>

                                    </div>
                                    <div class="border_lines_user mt-3 mb-2"></div>
                                    <?php if (!(isset($this->session->razorpay_order_id) && !empty($this->session->razorpay_order_id))) { ?>
                                        <div class="subscribe_text_dt">

                                        </div>
                                    <?php } else { ?>
                                        <div class="subscribe_text_dt">
                                        
                                        </div>
                                    <?php } ?>
                                </a>
                               
                                <?php if (SUBSCRIPTION_CHECK == 1) { ?>
                                    
                                    <div class="mb-2 sub_navbar"><?= $this->lang->line('subscription'); ?> : <span style="color:#EDB954"><?=(isset($active_plan['title'][$this->session->userdata('lang_code')]))?$active_plan['title'][$this->session->userdata('lang_code')]:""?> (<?=(isset($active_plan['pricing_title']))?$active_plan['pricing_title']:""?>)</span></div>
                                    <!-- <div class="mb-2 sub_navbar"><?= $this->lang->line('subscription') ?>: <span style="color:#EDB954">()</span></div> -->
                                    <?php if($is_upgrade == true){ ?>
                                    <div class="suscribe_now_btn upgrade_nav mt-1 u_subs">
                                        <a href="<?= base_url('upgrade-subscription') ?>"><span> <img src="<?= base_url('assets/images/Subscribe_button_icon.svg'); ?>" class="Subscribe_button_ic pe-2" alt="Subscribe_button_icon" loading="lazy"><?= $this->lang->line('account-subscribe-upgrade') ?></span></a>
                                    </div>
                                <?php } }else { ?>
                                    <div class="suscribe_now_btn upgrade_nav mt-1 subs">
                                        <a href="<?= base_url('subscription') ?>"><span><img src="<?= base_url('assets/images/Subscribe_button_icon.svg'); ?>" class="Subscribe_button_ic pe-2" alt="Subscribe_button_icon" loading="lazy"><?= $this->lang->line('account-subscribe') ?></span></a>
                                    </div>
                                <?php } ?>
                               
                            </li>
                            
                        <?php 
                        } else {      ?>
                            <li>
                                <div class="div_ul_li userInfoPro">
                                    <a href="<?= site_url('user-login'); ?>" class="w-100 ">
                                        <div class="user_p_l">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center loginSetup">
                                                    <div class="user-picture_s">
                                                        <img src="<?= base_url('assets/images/profile_default.svg'); ?>" alt="user pic" loading="lazy">
                                                    </div>
                                                    <div class="ms-3 user_p_n">
                                                        <h5 class="text-white mb-0"><?= $this->lang->line('Guest'); ?></h5>
                                                        <small class="btn btn-primary btn-sm headLogin d-block"><?= $this->lang->line('Login'); ?></small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php if ($this->session->id) { ?>

                    <div class="rounded_1 card card-bg mx-3 py-1 my-2">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?= base_url('my_account') ?>" class="m-0 px-2">
                                    <div class="d-flex justify-content-start align-items-center gap-1">
                                        <img class="img-fluid me-2 nav_s_img" src="<?= base_url('assets/images/my_account_icon.svg') ?>" alt='h&s' loading="lazy">
                                        <p class="side-user-title2 m-0"><?= $this->lang->line('my-account') ?></p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="rounded_1 card card-bg mx-3 py-1 my-2">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?= base_url('subscription-and-rental') ?>" class="m-0 px-2">
                                    <div class="d-flex justify-content-start align-items-center gap-1">
                                        <img class="img-fluid me-2 nav_s_img" src="<?= base_url('assets/images/sub_rental.svg') ?>" alt='h&s' loading="lazy">
                                        <p class="side-user-title2 m-0"><?= $this->lang->line('rental'); ?></p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="rounded_1 card card-bg mx-3 py-1 my-2">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?= base_url('watchlist') ?>" class="m-0 px-2">
                                    <div class="d-flex justify-content-start align-items-center gap-1">
                                        <img class="img-fluid me-2 nav_s_img" src="<?= base_url('assets/images/watchlist-icon.svg') ?>" alt='h&s' loading="lazy">
                                        <p class="side-user-title2 m-0"><?= $this->lang->line('Watchlist'); ?></p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>


                <?php } ?>
                <div class="rounded_1 card card-bg mx-3 py-1 my-2">
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?= base_url('faq-content') ?>" class="m-0 px-2">
                                <div class="d-flex justify-content-start align-items-center gap-1">
                                    <img class="img-fluid me-2 nav_s_img" src="<?= base_url('assets/images/help_support.svg') ?>" alt='h&s' loading="lazy">
                                    <p class="side-user-title2 m-0"><?= $this->lang->line('Help&Support'); ?></p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="rounded_1 card card-bg mx-3 py-1 my-2">
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?= base_url('privacy-policy'); ?>" class="m-0 px-2">
                                <div class="d-flex justify-content-start align-items-center gap-1">

                                    <img class="img-fluid me-2 nav_s_img" src="<?= base_url('assets/images/privacy.svg') ?>" alt='Privacy policy' loading="lazy">
                                    <p class="side-user-title2 m-0"><?= $this->lang->line('Privacy-Policy'); ?></p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="rounded_1 card card-bg mx-3 py-1 my-2">
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?= base_url('terms-conditions'); ?>" class="m-0 px-2">
                                <div class="d-flex justify-content-start align-items-center gap-1">

                                    <img class="img-fluid me-2 nav_s_img" src="<?= base_url('assets/images/term_con.svg') ?>" alt='t&c' loading="lazy">
                                    <p class="side-user-title2 m-0"><?= $this->lang->line('Term&Conditions'); ?></p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="rounded_1 card card-bg mx-3 py-1 my-2">
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?= base_url('about-us'); ?>" class="m-0 px-2">
                                <div class="d-flex justify-content-start align-items-center gap-1">

                                    <img class="img-fluid me-2 nav_s_img" src="<?= base_url('assets/images/about.svg') ?>" alt='about us' loading="lazy">
                                    <p class="side-user-title2 m-0"><?= $this->lang->line('About-Us'); ?></p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php if ($this->session->id) { ?>
                    <div class="rounded_1 card card-bg mx-3 py-1 my-2 d-none">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?= base_url('my_plan'); ?>" class="m-0 px-2">
                                    <div class="d-flex justify-content-start align-items-center gap-1">

                                        <img class="img-fluid me-2 nav_s_img" src="<?= base_url('assets/images/transaction_history.svg') ?>" alt='transaction history' loading="lazy">
                                        <p class="side-user-title2 m-0"><?= $this->lang->line('trans-history'); ?></p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>

                <?php if ($this->session->userdata('id')) { ?>

                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <button style="width: 88%;font-size:11px; " type="button" class="btn btn-primary user-logout"><?= $this->lang->line('Logout'); ?></button>
                    </div>
                <?php } ?>
            </div>



            <?php if (!$this->session->userdata('id')) { ?>
                <div class="position-relative image_hover_profile ">
                    <a href="javascript:void(0);" onclick="openNav()" class="display-picture" aria-expanded="false" aria-haspopup="true">
                        <img class="img-fluid" src="<?= base_url('assets/images/profile_default.svg') ?>" alt='pic' loading="lazy">
                    </a>
                    <div class="card card_profilecard hidden" style="top:32px !important;">
                    </div>
                </div>
        </div>

    <?php } else { ?>

        <div class="img-hover_dt position-relative">
            <div class="user_info">
                <a onclick="openNav()" href="javascript:void(0);" class="display-picture">
                    <?php if (empty($this->session->pro_img)) { ?>
                        <img src="<?= base_url('assets/images/user.jpg'); ?>" alt="user" loading="lazy">
                    <?php } else { ?>
                        <img src="<?= $this->session->pro_img; ?>" alt="user" loading="lazy">
                    <?php } ?>
                </a>
            </div>

        </div>
    <?php } ?>
    </div>


    </nav>
   
</header>
</div>
 <div class="serach_right_sd2">
                <div class="hed_search">
                    <span class="heade_searc_img">
                        <img src="<?= base_url('assets/images/search_header.svg'); ?>" class="" alt="search">
                    </span>
                         <input type="text" value="" class=" serach_glbs" name="search_header" placeholder="<?= $this->lang->line('search_language') ?>" autofocus="">
                    <span class="header_speech">
                             <img src="<?= base_url('assets/images/speech search.svg'); ?>" class=" " alt="speech">
                    </span>
                </div>
</div>


<div class="modal fade bd-example-modal-sm warning_pop" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        </div>
    </div>
</div>
</div>
<?php
$url =  "getSearchRecommendations";
$datalist = call_curl_by_get_method($url, array());
$_catId = $catId;

if (!$_catId) {
    $_catId = $this->input->get('category_id');
    if (!empty($_catId)) {
        $_catId = aes_cbc_decryption_(str_replace(" ", "+", $_catId));
    }
}
?>


<?php
$status = !empty($this->session->flashdata('status')) ? $this->session->flashdata('status') : '0';
$message = !empty($this->session->flashdata('message')) ? $this->session->flashdata('message') : '0';
?>

<script>
    var feedType = localStorage.getItem('feedType')??'0';
    var fairplayCertUri =  "https://license-global.pallycon.com/ri/fpsKeyManager.do?siteId=2LSX";
    var licenseURI = `<?= BASEURLAPI ?><?= BASEVERSION ?>onRequestCreateVideoLicense`;
    $(document).ready(async function(){
        let lang_cache_key = "all_lang";
        let all_langs = await get_all_lang(lang_cache_key);

        async function get_all_lang(key){
            let return_data = [];
            try {
                //console.log('key',key);
                const cache = await caches.open('appCache');
                var cachedResponse = await cache.match(key);
                if (cachedResponse) { //console.log('if');
                    var cachedData = await cachedResponse.json();
                    if(cachedData.cacheExpiration){
                        var current_time = moment().unix();
                        if(cachedData.cacheExpiration > current_time){
                            try{
                                return_data = JSON.parse(cachedData.data)
                            } catch(e){
                                return_data = cachedData.data;
                            }
                        }
                    }
                } else { //console.log('else');
                    await $.ajax({    
                        type: 'POST',
                        url: '<?= base_url('/web/Home/ajax_get_all_lang'); ?>',
                        dataType: "json",
                        data: {},
                        beforeSend: function() {
                            $('#overlayonajaxhit').show(); // Show loader before sending the request
                        },
                        success: async function(res) {
                            if (res.status == true) {
                                return_data = res.data.lang;
                                await Promise.all([set_lang_data(res.data.lang,lang_cache_key), set_lang_data(res.data.pages,"static_pages"), set_lang_data(res.data.hns,"help_support")]);
                                
                            }
                        },
                        complete: function() {
                            $('#overlayonajaxhit').hide(); // Hide loader after request completion
                        }
                    })
                    return return_data;
                } 
            } catch (err) {
                console.log('local cache error:', err);
            }
            return return_data;
        }

        async function set_lang_data(data, key, cacheTime = (30 * 24 * 60 * 60 * 1000)) { // set data for 30 day
            let return_data = false;
            try {
                const cache = await caches.open('appCache');
                var cacheExpirationTime = Date.now() + cacheTime;
                cachedData = {
                    data: data,
                    cacheExpiration: cacheExpirationTime
                };
                await cache.put(key, new Response(JSON.stringify(cachedData)));
                return_data = true;
            } catch (error) {
                console.log('local cache error:', error);
            }
            return return_data;
        }

        //console.log("all_langs",all_langs);
        let lang_html = "";
        lang_html +='<div class="change_lang_scroll">';
        if(all_langs && all_langs.length){
            for(let each_lang of all_langs){ //console.log(each_lang);
                let img_url = (each_lang.hasOwnProperty('icon') && each_lang.icon != "")?each_lang.icon:"<?=base_url('assets/images/language-active.png')?>";
                let checked_status = "";
                let select_lang = "<?=$lang_id?>";
                if(each_lang.title.toLowerCase() == select_lang.toLowerCase()){
                    checked_status = "checked";
                }
                lang_html +=   '<div class="checkbox-group">'+
                                    '<input class="rounded-checkbox" name="truc" value="'+each_lang.id+'" id="'+each_lang.title+'" type="radio" '+checked_status+'>'+
                                    '<label for="'+each_lang.title+'"><span class="text-white lang-f">'+each_lang.translate_title+'</span> <span class="ms-4 text_act f-600">('+each_lang.title+')</span></label>'+
                                '</div>';
                                
            }
        }
        lang_html +='</div>';
        lang_html += '<div class="content_language_pb py-2">'+
                        '<button class="pb_change_btn"><?= $this->lang->line('Change-Language') ?></button>'+
                    '</div>';
        $("#multiple_langauage_pb").html(lang_html);

        $('.pb_change_btn').click(function() {
            var lang_id = $(".rounded-checkbox:checked").val();
            var lang_title = $(".rounded-checkbox:checked").attr('id');
            _paq.push(['setCustomDimension', 5, lang_title ]);
            // matomo_hit('Page', 'AppLanguage', 'LanguagePrefrence'.' ( '.$_POST['lang_title'] . ')');
             queueTrackingData('trackEvent', ['Page', 'AppLanguage', 'LanguagePrefrence'+' ( '+ lang_title+')']);      

            $.ajax({
                type: 'POST',
                url: '<?= base_url('/web/Home/change_content_lang'); ?>',
                data: {
                    lang_id: lang_id,
                    lang_title: lang_title
                },
                success: async function(json_data) {
                    let data = JSON.parse(json_data);
                    if (data.lang) {
                        let cache_key = "lang_set";
                        // await set_cache_data("<//?= $this->session->userdata("lang_id"); ?>", cache_key);
                        // await removeCacheData('masterContent', 'all');
                        // await removeCacheData('contentDetail', 'all');
                        localStorage.setItem(cache_key,lang_title);
                        Promise.all([deleteAllMasterContentKeys(),removeCacheData('contentDetail', 'all')]);
                        swal({
                            imageUrl: "<?= base_url('assets/images/tick.png'); ?>",
                            imageWidth: 70,
                            imageHeight: 70,
                            title: data.lang,
                            allowOutsideClick: false,
                            confirmButtonText: data.button_text,
                        }).then((result) => {
                            location.reload();
                        });
                    }
                }
            });

        });
    });

</script>
<script>
    var watchingData = [];
    $(document).ready(function(){  
        const baseurl = "<?= base_url() ?>";
        const currentUrl = window.location.href;
        if(currentUrl == baseurl){  
            if("<?=$this->session->id?>"){
                var contKey = "<?= ($this->session->profile_id) . '-continueWatching' ?>";
                continueWatching(contKey);
            } 
        }
    })


    var i = 1;
    
    async function continueWatching(key) {
        var countd = 0;
        var contKey = "<?= ($this->session->profile_id) . '-continueWatching' ?>";
        return fetchCacheData(key)
            .then(async (cache_data) => {
                if (cache_data.data) {
                    let time = Date.now();
                    if (time > cache_data.cacheExpiration) {
                        removeCacheData(key, 'all');
                        cache_data = null;
                        await fetchWatchingDetailsAndUpdateCache(null, cache_data);
                    } else {
                        cache_data.data.forEach(function(item) {
                            if (item.is_deleted == 0) {
                                countd += 1;
                            }
                        });

                        if (countd > 0) {
                            c_class = '';
                            $('.bottom_banner').removeClass('banner-bottom-sec');
                            watchingData = cache_data.data;
                        }
                    }
                } else {
                    if (i == 1) {
                        i = 2;
                        await fetchWatchingDetailsAndUpdateCache(null, cache_data);
                        await continueWatching(contKey);  // Wait for the recursive call to finish
                    }
                }
            });
    }

</script>

<script>

    var hasscroll = false;
    var popular_search = true;
    var top_search = false;
    var _catId = "<?= $_catId ?>";
    if (_catId) {
        localStorage.setItem('_catId', _catId);
    }

    function hide_modal() {
        $('#gsearch').val('');
        $('#search_page').modal('hide');
        $('#overlayonajaxhit').hide();
        $('.top-result').addClass('d-none');
        $('.popular_search').removeClass('d-none');
        $('.pb_wl_card').addClass('d-none');
      
    }

    <?php
    if (!empty($status)) {
        if ($status == 200) { ?>
            toastr.success("<?= $message ?>");
        <?php    } else { ?>
            toastr.error("<?= $message ?>");
    <?php    }
    }
    ?>

    $('.nav_menu').click(function() {
        $('.menu_item_resp').toggleClass('w-100');
    });

   
    $(document).on("click", ".u_subs", function(event) {
        event.stopPropagation();
        queueTrackingData('trackEvent', ["Profile", "Select", "UpgradeSubscription"]);  
    

    });
    $(document).on("click", ".subs", function(event) {
        event.stopPropagation();
        queueTrackingData('trackEvent', ["Profile", "Select", "Subscription"]);

    });
   
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.nav_menu, .menu_item_resp').length) {
            $('.menu_item_resp').removeClass('w-100');
        }
    });

    $('.menu_item_resp').click(function(e) {
        e.stopPropagation();
    });
 
</script>
<script type="text/javascript">
   
    $(".ss").click(function() {
        var search = $("#searchh").val();
        if (search == "") {
            //$(".warning_pop").modal("show");
            setTimeout(function() {
                $('.warning_pop').modal('hide')
            }, 2000);
            return false;
        } else {
            var location_url = "<?= base_url('/detailssearch?q='); ?>";
            window.location.href = location_url + search;
        }
    });

    let search_start = 1;
    var isSubscribed = "<?= SUBSCRIPTION_CHECK ?>";
    var sess_id = "<?php echo $this->session->userdata('id'); ?>";
    var watch_app = '<?= $this->lang->line('Watchnow') ?>';
    var subscribe_watch = '<?= $this->lang->line('Subscribewatch') ?>';
    var available_to_rent = '<?= $this->lang->line('available_to_rent') ?>';
    var subscribe_listen = '<?= $this->lang->line('Subscribelisten') ?>';
    var Login_Watch = '<?= $this->lang->line('LoginToWatch') ?>';
    var listen = '<?= $this->lang->line('Listennow') ?>';

    var search_key = '';
    var prev_search = '';
    var prev_start = '';
   

    function search_query() {
        $(".mean-bar").addClass("z_index_1");
        $(".search_click_mobile").addClass("d-block");
        $(".main-menu-wrap").addClass("p-0");
        $(".top-header-area").addClass("p-0");
        $("#search_mobile").focus();
        $("#remove_z").addClass("z_in-1");
    }

    $("#close_fun_search").click(function() {
        $(".mean-bar").removeClass("z_index_1");
        $(".search_click_mobile").removeClass("d-block");
        $(".main-menu-wrap").removeClass("p-0");
        $(".top-header-area").removeClass("p-0");
        $("#remove_z").removeClass("z_in-1");
    });

    $('#searchsubmit_mobile').submit(function(e) {
        e.preventDefault();
        var search = $("#search_mobile").val();
        if (search == "") {
            $(".warning_pop").modal("show");
            setTimeout(function() {
                $('.warning_pop').modal('hide')
            }, 2000);
            return false;
        } else {
            var redirect_url = location_url + search;
            window.location.href = redirect_url;
        }
    });


    $('#searchsubmit').keyup(function(e) {
        e.preventDefault();
        var search = $("#search").val();
        if (search == "") {
            $(".warning_pop").modal("show");
            setTimeout(function() {
                $('.warning_pop').modal('hide')
            }, 2000);
            return false;
        } else {
            var redirect_url = location_url + search;
            window.location.href = redirect_url;
            $('#searchh').val(search);

        }
    });

    $(document).ready(function() {
        $("._icon_118nr_48").click(function() {
            $("._root_118nr_5").toggleClass("search-width");
            $("._icon_118nr_48").toggleClass("slide-ser")



        });

        $("._cancelIcon_118nr_85").click(function() {
            $("._root_118nr_5").removeClass("search-width");
            $("._icon_118nr_48").removeClass("slide-ser");

        });
    });
</script>
<script type="text/javascript">
    /* Simple appearence with animation AN-1*/
    var shivwm = 'pb_language_detail_div';
    $(document).on('click', function(event) {
        var starts = 'pb_notification_details_div';
        if (!$(event.target).closest('.display-picture').length) {
            $('#mySidenav').removeClass('toggle_navs');
        }
        if (!$(event.target).closest('.pb_language_icon').length && !$(event.target).closest('.pb_language_detail').length) {

            $('.pb_language_detail').removeClass(shivwm);
        }

        if (!$(event.target).closest('.pb_notification_icon').length && !$(event.target).closest('.pb_notification_details').length) {
            $('.pb_notification_details').removeClass('pb_notification_details_div');
        }

    });

    function openNav() {
        $('#mySidenav').toggleClass('toggle_navs');
    }

    function closeNavs() {
        popular_search = true;
        top_search = false;
        $('.top-result').addClass('d-none');
        $('.cross').addClass('d-none');
        $('#gsearch').val('');
        $('.popular_search').removeClass('d-none');
        $('.pb_wl_card').addClass('d-none');
    }
    
    /* Simple appearence with animation AN-1*/
</script>

<script>
    $(document).ready(function() {
        // if (!$(event.target).closest('.pb_language_icon').length) {
        //     $('.pb_language_detail').removeClass('pb_language_detail_div');
        // }
        // Toggle class on icon click
        $('.pb_language_icon').click(function() {
            if (!$('.pb_language_detail').hasClass('pb_language_detail_div')) {

                // matomo("Page", "View", "WatchInYourLanguage");
            }
            $('.pb_language_detail').toggleClass('pb_language_detail_div');
        });
        $('.pb_notification_icon').click(function() {

            var start = Number($('#start_n').val());
            $.ajax({
                url: "<?= base_url('web/dashboard/notification') ?>",
                type: 'post',
                data: {
                    start
                },
                success: function(response) {
                    starts = '';
                    var res = JSON.parse(response);
                    if (res.status == true) {
                        $('#overlayonajaxhit').hide();
                        $('#notification-shimmer').hide();
                        $('#start_n').val((start + 1));
                        $(".pb_notification_details").append(res.html);
                    } else if (start == 1) {
                        $('#notification-shimmer').hide();
                        $('#notification-notdata').show();
                    }
                }
            });
            if (!$('.pb_notification_details').hasClass('pb_notification_details_div')) {
                queueTrackingData('trackEvent', ["Page", "View", "NotificationListing"]);      
            }

            $('.pb_notification_details').toggleClass('pb_notification_details_div');
        });
        $('#gsearch').on('blur', function() {

            if ($('#gsearch').val() == '')
                $('.cross').addClass('d-none');

        });

    });

    $(".pb_notification_details").on("scroll", function() {
        // Check if scroll position is at the bottom
        if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
            // Your code to execute when scrolling down
            // alert("sss");
        }
    });

    // var request = new Request("<?//= base_url('web/home/ajax_data') ?>");
    // fetchCacheData('masterContent')
    // .then(async function(cache) {
    //     // cache.delete(request); 
    //     var catchData = '';
    //     var watch = await cache.match(request);
    //     if (watch) {
    //     catchData = await watch.json(); 
    //     } 
    //     else {
    //     var all_data = await fetch(request);
    //     catchData = await all_data.json();
    //     cache.put(request, new Response(data));
    //     await cache.put(request, new Response(JSON.stringify(catchData)));
    //     }
    //      navbar_data(catchData.nav_banner.data.categories);
    // });



    async function handleCacheExpiration(homeKey, cache_data) {
        try {
            await removeCacheData(homeKey, 'all');
            fetchMasterContentAndUpdateCache(null, null);
        } catch (error) {
            console.error('Error handling cache expiration:', error);
        }
    }

    async function handleCachedData(cache_data) {
        try {
            navbar_data(cache_data.data.nav_banner.data.categories,cache_data.data.nav_banner.data);
            const baseurl = "<?= base_url() ?>";
            const currentUrl = window.location.href;
            if(currentUrl == baseurl){  
            await Promise.all([
             //  renderBanners_new(cache_data.data.home_data),
                renderTrendingSections(cache_data.data.home_data),
                // renderGenres(cache_data.data.nav_banner.data.genres),
                // renderContentLanguages(cache_data.data.nav_banner.data.content_languages)
            ]);
            }else{
                if (currentUrl.includes('/dashboard-details?category_id')) {
                    await Promise.all([
                    renderBanners_new(cache_data.data.home_data),
                //renderTrendingSections(cache_data.data.home_data),
                // renderGenres(cache_data.data.nav_banner.data.genres),
                // renderContentLanguages(cache_data.data.nav_banner.data.content_languages)
            ]);  }           }

            await checkBanner();
            // settimeout(initializeCarousel, 700);
            // settimeout(() => shimmer('hide'), 500);
            // settimeout(initializeCarousel, 700);
            // setTimeout(() => {
            //     shimmer('hide');
            // }, 500);
            setTimeout(() => {
                initializeCarousel();
            }, 700);
            // Uncomment if required:
            // if (!bannerfound) {
            //     if ($('.bottom_banner').hasClass('banner-bottom-sec')) {
            //         $('.bottom_banner').removeClass('banner-bottom-sec');
            //         $('.bottom_banner').addClass('categeryBox');
            //     }
            // }
        } catch (error) {
            console.error('Error handling cached data:', error);
            // shimmer('hide');
        }
    }

    function initializeCarousel() {
        // shimmer('hide');
        // var carouselTime = localStorage.getItem('carouselTime')??2000;

        if ($('.carousel_top2').length > 0) {
            $('.carousel_top2').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                lazyLoad: 'ondemand',
                dots: true,
                fade:true,
                prevArrow: '<button type="button" class="slick-next"><img src="<?= base_url('assets/images/prev.svg') ?>" alt="logo" loading="lazy"></button>',
                nextArrow: '<button type="button" class="slick-prev"><img src="<?= base_url('assets/images/next.svg') ?>" alt="logo" loading="lazy"></button>',
                speed: 500,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: carouselTime,
                 pauseOnHover: false,
                  pauseOnFocus: false
                // dots: $('.carousel_top2').find('.slick-slide').length > 1 ? true : false
            });
        }
        $(document).ready(function() {
            // shimmer('hide');
            var slideCount = $('.carousel_top2').find('.slick-slide').length;
            if (slideCount >= 1) {
            $('.categorylist_1').addClass('banner-bottom-sec');
            }else{
                $('.categorylist_1').removeClass('banner-bottom-sec');
            }   
            if (slideCount > 1) {
                $('.carousel_top2').find('.slick-dots').show();
            } else {
                $('.carousel_top2').find('.slick-dots').hide();
            }
        });
    }

    function initTrendCarousel() {
         var owl = $(".carousel_bott4").owlCarousel({
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

                1000: {

                    items: 6,
                    margin: 7,
                    slideBy: 3
                },

                1450: {

                    items: 7,
                    margin: 7,
                    slideBy: 3
                },


                1800: {

                    items: 8,
                    margin: 7,
                    slideBy: 3
                }
            }
        });
        owl.trigger('refresh.owl.carousel');
    }

    



    async function navbar_data(navbar_datas,master_data = []) { //console.log("master_data",master_data);
        const _catId = localStorage.getItem('_catId');
        var home = '<?= $this->lang->line('Home'); ?>';
        var live = '<?= $this->lang->line('Live'); ?>';
        var class_name = 'current-list-item';
        var redirect = '<?= base_url('dashboard-details?category_id=') ?>';
        var page = '<?= ($page) ?? '' ?>';
        // var siturl = '<?= site_url('tv-guide'); ?>';
        var siturl = '<?= site_url('pb_live'); ?>';

        var base_url = '<?= base_url() ?>';
        if (page != 'dashboard') {
            class_name = "";
        }

        var navbars = '<ul class="navbar-nav me-auto nav_items ps-4 pb_navmenu">';
        navbars += '<li class="' + class_name + '"><a onClick="urls_call(\'' + base_url + '\')"  style="">' + home + '</a></li>';
        var cate_str = '<?= $this->input->get('category_id'); ?>';
        cate_str = cate_str.replace(/ /g, '+');

        
        //console.log("stringsData",stringsData);
        //console.log("navbar_datas",navbar_datas);
        if (navbar_datas) {
            var homeFeedBtn = '';
            //console.log("filtered_tage",master_data.filterTags);
            master_data.filterTags.forEach(function(item, key){
                $lang_id = "<?=($this->session->userdata('lang_id')) ? $this->session->userdata('lang_id') : 'English'?>";
                var lang_title = "<?= ucwords($lang_id )?>";
                var ctitle;
                if(Array.isArray(item.title)){
                    item.title.forEach(function(sItem, sKey){
                        if(sItem.language == lang_title){
                            ctitle = sItem.content??'filter tag';
                        }
                    })
                }else{
                    ctitle =  item.title??'filter tag';
                }
                if(item.is_live==1){
                    homeFeedBtn = `<a class=" nav_bot_catass" href="${'<?=base_url('provider?id=ZyLZ+GCDoMAAQIZ6N9R70w==:MTIzNDU2Nzg5MDEyMzQ1Ng==')?>'}">
                    <button data-id="${(item.id)}" class="btn nav_bot_cata ${((item.is_live==1)?'live-tag':'')}">${((item.is_live==1)?'<span></span>':'')+ctitle}</button>
                    </a>`;
                    // homeFeedBtn += '<button data-id="'+(item.id)+'" class="btn nav_bot_cata '+((item.is_live==1)?'live-tag':'')+'" onclick="filterFeedData('+"'"+(item.id)+"'"+')">'+((item.is_live==1)?'<span></span>':'')+ctitle+'</button>';
                }else{
                    // homeFeedBtn = '<button data-id="'+(item.id)+'" class="btn nav_bot_cata '+((item.id==feedType)?'active':'')+'" onclick="filterFeedData('+"'"+(item.id)+"'"+","+"(ctitle)"')">'+ctitle+'</button>';
                    homeFeedBtn = '<button data-id="'+(item.id)+'" class="btn nav_bot_cata '+((item.id==feedType)?'active':'')+'" onclick="filterFeedData(\''+(item.id)+'\', \''+ctitle+'\')">'+ctitle+'</button>';

                }                
                $('.nav_bot_br_button').append(homeFeedBtn);
            })
            navbar_datas.forEach(function(category) {
                if (category.is_header == 1) {
                    let cat_title = (category.hasOwnProperty('title'))?category.title:"";
                    if(cat_title != ""){
                        if(local_strings && local_strings_en){
                            let local_string_key = findKeyByValue(local_strings_en,cat_title);
                            if(local_string_key){
                                cat_title = local_strings.hasOwnProperty(local_string_key)?local_strings[local_string_key]:cat_title;
                            }
                        }
                    }
                    
                    
                    //console.log("local_string_key",cat_title);
                    
                    if ((page != 'dashboard') && (category.id == _catId) && (page != 'live')) {
                        // queueTrackingData('trackEvent', ["Categories", "Select",category.id +'/'+ category.title]);      
                        // queueTrackingData('trackEvent', ["CategoryPage","View",category.id +'/'+ category.title]);      
                        class_name = "current-list-item";
                    } else {
                        class_name = ""; // Reset class_name if not needed
                    }
                    if(page == ''){
                        class_name = ""; 
                    }
                    var category_id = '';

                    var cate_id = cate_str.replace(" ", '+');
                    cate_id = '';
                    navbars += '<li class="' + class_name + '">';
                    navbars += '<a onClick="urls_call(\'' + redirect + category.ids + '&c_title=' + category.titles + '\')"   style="">' + cat_title + '</a>';
                    navbars += '</li>';
                }
            });
        }
        var ondc = (master_data.hasOwnProperty('e-commerce'))?master_data['e-commerce']['ondc']:{};
        //console.log("ondc_data",ondc);
        if(ondc){
            let shopping = encodeURIComponent(btoa(ondc.redirect_url));
        } else{
            let shopping = encodeURIComponent(btoa("https://ondc.org"));
        }
        var shopping_string = '<?= $this->lang->line('shopping'); ?>';
        if (page == 'live') {
            class_name = "current-list-item";
        } else {
            class_name = '';
        }
        navbars += '<li class="' + class_name + '"><a onClick="urls_call(\'' + siturl + '\')">' + live + '</a></li>';
        // navbars += '<li><a onclick="ini_ondc(\'' + shopping + '\')">' + shopping_string + '</a></li>';
        navbars += '</ul>';
        $('#navbarSupportedContent').html(navbars);

        /// Set all Apps Links(Apple, Android)
        // var applink = (master_data.hasOwnProperty('app_link'))?master_data['app_link']:{};
        // if(applink){
        //     $('.apple_link').attr('href', applink.ios_link);
        //     $('.android_link').attr('href', applink.android_link);
        // }
    }

   
    function eventfire(title, dec_id) {
            var dd = dec_id +'/'+ title;
            // matomo_sear('Search', 'Play', dd);
           // queueTrackingData('trackEvent', ["NotificationListing", "Select",dd]);

    }

    async function getSkipableTime() {
        let nskipable_start = localStorage.getItem('nskipable_start');
        let nskipable_end = localStorage.getItem('nskipable_end');

        if (!nskipable_start || !nskipable_end) {
            try {
                const res = await $.ajax({
                    url: "<?= base_url('web/home/getSkipableTime') ?>",
                    type: "post",
                    data: { timestamp: "0000000000" },
                });
                var response = JSON.parse(res);
                if (response.status && response.nskipable_start && response.nskipable_end) {
                    nskipable_start = response.nskipable_start;
                    nskipable_end = response.nskipable_end;

                    localStorage.setItem('nskipable_start', nskipable_start);
                    localStorage.setItem('nskipable_end', nskipable_end);
                } else {
                    console.error('Invalid response data:', response);
                }
            } catch (error) {
                console.error('Error fetching skippable time:', error);
            }
        }
        return { nskipable_start, nskipable_end };
    }


    async function getCarouselTime(){
        var timeDiff = localStorage.getItem('carouselTime')??'';
        if(!timeDiff){
            await $.ajax({
                url:"<?= base_url('web/home/getCarouselTime') ?>",
                type:"post",
                data:{timestamp:"0000000000"},
                success:function(res){
                    timeDiff = res;
                }
            })
        }
        return timeDiff;
    }

    var carouselTime = 10000;
    var nskipable_start = 0;
    var nskipable_end = 0;
    $(document).ready(async function(){
        carouselTime = localStorage.getItem('carouselTime')??3000;
        if(!carouselTime){
            carouselTime = await getCarouselTime();
            carouselTime = Number(carouselTime);
            localStorage.setItem('carouselTime',carouselTime);
        }
        
        var nskipable_data = await getSkipableTime();
        nskipable_start = nskipable_data.nskipable_start;
        nskipable_end = nskipable_data.nskipable_end;
    })
 
</script>