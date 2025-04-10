<!-- Content Detail Page  Start 02-03-2024 -->

<style>
    .video-js.vjs-fluid,
    .video-js.vjs-16-9,
    .video-js.vjs-4-3 {
        margin: 0px !important;
    }

    .vjs-volume-panel,
    .fast-forward-icon,
    .vjs-paused,
    .rewindIcon,
    .vjs-playing {
        margin: 0 !important;
    }

    .slick-slide {
        height: inherit !important;
    }
    .header_dtes {
    padding-top: 0px !important;
}

    @media only screen and (min-width: 320px) and (max-width: 767px) {
        .play_epsode_btn span img {
            width: 32px !important;
            height: 32px !important;
        }
    }
    .d-none{
          display:none !important;
        }
        .category-data{
            margin-top:52px;
        }
</style>
<?php
$lang_title = ucwords($this->session->lang_id);

if (isset($nav_banner['data']['banners']) && count($nav_banner['data']['banners']) == 1) { ?>
    <style>
        .slick-dots {
            display: none;
            !important;
        }
    </style>
<?php }

// pre($nav_banner);
$cate_str = $this->input->get('category_id');
$category_id = str_replace(" ", '+', $cate_str);
$category_id = aes_cbc_decryption_($category_id);
$c_title = ($this->input->get('c_title'));
$titles = str_replace(" ", '+', $c_title);
$titlec = $titles?aes_cbc_decryption_($titles):$this->input->get('name');

// pre($titlec);die;
if (isset($nav_banner)) {
    $cate_name = array_values(array_filter($nav_banner, function ($var) use ($category_id) {
        return $var['category_id'] == $category_id && $var['banner_type'] == 0;
    }));

    $page = !empty($cate_name) ? $cate_name[0]['title'] : null;
}
if ((isset($cate_name) && !empty($cate_name))) {
    $class = 'banner-bottom-sec';
    $Banner = true;
} else { ?>
    <style>
        /* header {
            position: sticky !important;
            top: 0;
        } */
    </style>
<?php
    $class = '';
    $Banner = false;
}
// pre($cate_name);pre($nav_banner);die("sss");

if (!empty($page)) {
    // matomo_hit('CategoryPage', 'View', $category_id . "/" . $page);
}

function filterVisibleTag($tags) {
    if (!isset($tags) || empty($tags)) {
        return ''; 
    }
    $visibleTags = array_values(array_filter($tags, function($tag) {
        return $tag['visible'] == 1;
    }));
    if (!empty($visibleTags)) {
        return $visibleTags[0]['url'];
    } else {
        return ''; 
    }
}


// Filter visible tag URL
?>


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
                    <img src="<?= base_url('assets/images/pb_banner.png'); ?>" class="img-fluid card_shimmer_op as4" alt="Placeholder">
                </div>
            </div>
        </div>
    </div>
    <div class=" banner_loader_af banner-place12">
        <?php for ($i = 0; $i <= 6; $i++) { ?>
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

</section>

<div id="banners" class="banner_load_af12"></div>

<section id="data-section">
 

    <?php if (isset($details_data['data']) && !empty($details_data['data'])) { ?>
        <?php $i = 1;
        $json_url = base_url('assets/website_assets/static_strings.json');
        $json_string_data = json_decode(@file_get_contents($json_url), true);
        $lang_code = $this->session->userdata('lang_id')??"english";
        $en_strings = "";
        if (isset($json_string_data) && !empty($json_string_data)) {
            $en_strings = $json_string_data['english'];
        }


        function search_string_key($object,$searchValue){
            $foundKey = null;
            foreach ($object as $key => $value) {
                if (strtolower($value) == strtolower($searchValue)) {
                    $foundKey = $key;
                    break; // Stop the loop once the key is found
                }
            }
            return $foundKey;
        }
        
        //pre($en_strings); die;

        foreach ($details_data['data'] as $key => $value) {
            $publisherid = $this->input->get('publisher_id')??'';
            $genre_id = aes_cbc_encryption_($value['genres_id']);
            $main_id_str = $this->input->get('category_id');
            $main_id_enc = str_replace(" ", '+', $main_id_str);
        ?>
            <section class="categorylist_<?= $i?> categeryBox <?= ($i == 1) ? 'category-data ' . $class : '' ?>">

                <div class="container-fluid">

                    <div class="categeryHeading d-flex justify-content-between playlistTitle d-none">

                        <?php
                            $gen_name = $value['genres_name']??"";
                            if($gen_name != ""){
                                if (isset($json_string_data) && !empty($json_string_data)) {
                                    if(isset($json_string_data['english'])){
                                       if ($en_strings && array_key_exists($lang_code, $json_string_data)) {
                                            $lang_data = $json_string_data[$lang_code];
                                            $string_key_exists = search_string_key($en_strings,$gen_name);
                                            //pre($string_key_exists);
                                            if($string_key_exists && isset($lang_data[$string_key_exists])){
                                                $gen_name = $lang_data[$string_key_exists];
                                            }
                                        } 
                                    }
                                }
                            }
                        ?>
                        <h6 class="defaultColr  generes"><?= $gen_name; ?></h6>
                        <?php if (isset($value['shows']) && count($value['shows']) >= 6) { ?>
                            <a href="<?= base_url('gener_list?category=' . $category_id . '&genre=' . $genre_id.'&publisher_id='. $publisherid); ?>" href="<?= base_url('gener_list?category=' . $category_id . '&genre=' . $genre_id); ?>" class="defaultColr mt-1 mb-3 pr_5 view_m_btn  gen_class" data-id = <?= $value['genres_id']; ?> data-gen_name= <?= $value['genres_name']; ?> onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';" onFocus="handleFocus(this)" onBlur="handleBlur(this)">
                                <?= $this->lang->line('viewall') ?> <i class="fas fa-solid fa-arrow-right"></i>
                            </a>

                        <?php } ?>
                    </div>


                    <div class="carousel_bott4 owl-carousel owl-theme banner-place" style="display:none;">
                        
                        <?php if(isset($value['shows'])){ foreach ($value['shows'] as $key => $data) {
                            //$id = aes_cbc_encryption_($data['id']);
                        ?>
                            <div class="">
                                <div class="">

                                    <div class="pb_card_img home_main_trend card_shimmer as3">
                                        <img src="<?= base_url('assets/images/placholder-img.png'); ?>" class="img-fluid card_shimmer_op as3" alt="placeholder image">
                                        
                                    </div>
                                </div>
                            </div>
                        <?php $i++;
                        } }?>
                    </div>


                    <div class="carousel_bott4 owl-carousel owl-theme banner_load_af">
                        <?php if(isset($value['shows'])){ foreach ($value['shows'] as $key => $data) {
                            $plybtn = base_url('assets/images/playBtn.png');
                            $id = aes_cbc_encryption_($data['id']);
                            $v_id = aes_cbc_encryption_($data['video_id']);
                            
                                    $isSubscribed = SUBSCRIPTION_CHECK;
                                    if (isset($data['owned_by'])) {
                                        if ($data['owned_by'] > 0) {
                                            $constantName = 'SUBSCRIPTION_CHECK' . "_" .$data['owned_by'];
                                          
                                            if (defined($constantName)) {
                                                $isSubscribed = constant($constantName);
                                            }else{
                                                $isSubscribed = 0;
                                            }
                                        }
                                    }
                                if (!empty($this->session->id)) {
                                    if ($data['is_paid'] != 0 && $data['is_paid'] != 2 && $isSubscribed != 1) {
                                        $messge = ($data['type'] == 0) ? $this->lang->line('Subscribewatch') : $this->lang->line('Subscribelisten');
                                    } else if ($data['is_paid'] == 2 && $data['is_rented'] == 0) {
                                        $plybtn = base_url('assets/images/vector.svg');
                                        $messge = $this->lang->line('available_to_rent');
                                    } else {
                                        $messge = ($data['type'] == 0) ? $this->lang->line('Watchnow') : $this->lang->line('ListenToWatch');
                                    }
                                } else {
                                    if ($data['is_paid'] != 0 && $data['is_paid'] != 2 && $isSubscribed != 1) {
                                        $messge = ($data['type'] == 0) ? $this->lang->line('Subscribewatch') : $this->lang->line('Subscribelisten');
                                    } else if ($data['is_paid'] == 2 && $data['is_rented'] == 0) {
                                        $plybtn = base_url('assets/images/vector.svg');
                                        $messge = $this->lang->line('available_to_rent');
                                    } else {
                                        $messge = ($data['type'] == 0) ? $this->lang->line('Watchnow') : $this->lang->line('ListenToWatch');
                                    }
                                }
                                $siturl = ($data['is_paid'] == 2) ? site_url('play-video?id=' . $id) : site_url('play-episode?id=' . $id);
                                
                                if($data['type']<2){ ?>
                              <div class="item">
                                <a href="<?= base_url('play-video?id=' . $id); ?>">
                                    <div class="pb_card_details play_hover_show <?= ($key == 0) ? 'cat-img-box' : ''; ?> <?= ($data['is_paid'] == 0) ? '' : 'pb_card_outer'; ?>" data-id="<?= $data['id'] ?>" data-title="<?= $data['title'] ?>" data-titles="<?= $value['genres_name'] ?>" >
                                        <?php if ($data['is_paid'] == 1) { ?>
                                            <div class="premium_icondt "><img src="<?= base_url('assets/images/premium-icon.svg') ?>" alt="premium"></div>
                                        <?php } else if ($data['is_paid'] == 2) { ?>
                                            <div class="premium_icondt"><img src="<?= base_url('assets/website_assets/images/rental.svg') ?>" alt="rental"></div>
                                        <?php } else { ?>

                                        <?php } ?>
                                        <div class="pb_card_img">
                                            <?php 
                                            $tag = filterVisibleTag($data['tags']); if($tag != ''){  ?>
                                            <div class="pre_tags"><img src="<?=$tag; ?>" class="img-fluid" alt="tags_img"></div>
                                            <?php } ?>
                                            <img src="<?= !empty($data['thumbnail']) ? $data['thumbnail'] : base_url(ThumbnailPlaceholder) ?>" class="img-fluid as_ratio" alt="<?= $data['title'] ?>">
                                        </div>
                                        <div class="pb_card_img2">
                                            <div class="pb_card_vd-2 position-relative">
                                                <?php //if (!empty($data['file_url'])) { 
                                                ?>
                                                <!-- <div data-vjs-player>
                                            <video id="my_show_<?= $data['id'] ?>" class="video-js my_show"
                                                poster="<? //=$data['poster_url']
                                                        ?>">
                                            </video>
                                        </div> -->
                                                <?php //}else{ 
                                                ?>
                                                <img src="<?= !empty($data['poster_url']) ? $data['poster_url'] : base_url(PosterPlaceholder) ?>" class="img-fluid" alt="poster banner">
                                                <?php //} 
                                                ?>

                                            </div>
                                            <div class="pb_card_content">
                                                <?php
                                                $descriptions = '';
                                                if (is_array($data['description'])) {
                                                    // First, check for the English description
                                                    foreach ($data['description'] as $desc) {
                                                        if ($desc['language'] === "English") {
                                                            $descriptions = $desc['content'];
                                                            break;
                                                        }
                                                    }

                                                    // If lang_title is set, check for the description in that language
                                                    if (isset($lang_title)) {
                                                        foreach ($data['description'] as $desc) {
                                                            if ($desc['language'] === $lang_title) {
                                                                $descriptions = $desc['content'];
                                                                break;
                                                            }
                                                        }
                                                    }
                                                }
                                                $genres =((!empty($data['genres'])) ? implode(' | ', array_slice(explode(',', $data['genres']), 0, 3)) : '');//  isset($item['genres']) ? str_replace(',', ' | ', $item['genres']) : '';   

                                                ?>
                                                <h6><?= $data['title'] ?></h6>
                                                <p class="discription_gen"><?=  $genres //str_replace(',', ' | ', $data['genres']); ?></p>
                                                <p class="discription_dt"><?= $descriptions ?></p>
                                                <div class="d-flex align-items-center mt-1 pb_add_btns pb_card_watch categaryAddBtn">
                                                    <?php if ($data['is_paid'] == 2) { ?>
                                                        <a href="<?= $siturl ?>" class="pb_watch_btn d-block">
                                                            <img class="img-fluid watchCardImg" src="<?=   $plybtn ?>" alt="watch card">
                                                            <?= $messge ?>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="<?= $siturl ?>" class="pb_watch_btn d-block">
                                                            <img class="img-fluid watchCardImg" src="<?=   $plybtn ?>" alt="watch card">
                                                            <?= $messge ?>

                                                            <a href="javascript:void(0);" class="pb_add ms-2 d-none">
                                                                <img class="img-fluid playAdd" src="<?= base_url('assets/images/jointWatch.png') ?>" alt="join watch"></i>
                                                            </a>
                                                        <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php }else{ 
                                $siturl = 'content-detail?id='.$id; ?>
                                <div class="item">
                                <a  href="<?= base_url($siturl); ?>">
                                    <div class="pb_card_details img_pdf_dets">
                                <div class="pb_img_pdf">
                                <img src="<?= !empty($data['thumbnail']) ? $data['thumbnail'] : base_url(ThumbnailPlaceholder) ?>" class="img-fluid" alt="thumbnail">

                                </div>

                                </div>
                                </a>

                                </div> 
                                <?php }?>

                        <?php $i++;
                        } }?>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php } ?>

    <?php if (($Banner == false) && isset($details_data['data']) &&  empty($details_data['data'])) { ?>

        <div class="col-md-6 m-auto text-center watchListNo catwatcno">
            <div class="no_dt_found watchListNo categaryNo">
                <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no list found">
                <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                <p class="mb-0 text_ac"><?= NoListFound; ?></p>
            </div>
        </div>

    <?php } ?>
</section>



<script type="text/javascript">
  
    
   
    $(document).ready(function() {
        muteunmute();
        // shimmer('hide');
    });


    $(".close").click(function() {
        location.reload();
    });
    var id = 0;

    function copyUrl(id) {
        // $("#copyBtn-"+id).click(function() {
        var copyText = $("#inputText-" + id);
        var copyButton = $('#copyBtn-' + id);
        copyText.val();
        navigator.clipboard.writeText(copyText.val());
        // console.log(copyText)
        // Copy the selected text to clipboard
        document.execCommand('copy');
        $('#copyBtn-' + id).html('<?= $this->lang->line('copied') ?>')
        $('.bg_btn_color').addClass('copy_share_btn');
        setTimeout(function() {
            copyButton.html('<?= $this->lang->line('copy') ?>'); // Change 'Copy' to the original text you want to display
            $('.bg_btn_color').removeClass('copy_share_btn');
        }, 2000);
        // $("#share_btn").modal('hide');
        //location.reload();
        // Deselect the text
        //window.getSelection().removeAllRanges();
        // });
    }

    $(document).on('click', function(event) {
        if ((!$(event.target).closest('.shareHls').length) && (!$(event.target).closest('.share_hl_popup-' + id).length)) {
            // if (!$('.share_hl_popup').hasClass('d-none')) {
            $('.share_hl_popup-' + id).addClass('d-none');
            $('#copyBtn-' + id).html('<?= $this->lang->line('copy') ?>');
            // }
        }
        //$(".share_hl_popup").addClass("d-none");
    });

    // $(".shareHls").click(function() {
    //     id = $(this).data('id');
    //     $(".share_hl_popup-" + id).toggleClass("d-none");
    //     $('.share_hl').attr('tooltip', '');
    // })
    $(".shareHls").click(function() {
        var id = $(this).data('id');
        var tooltipElement = $(".share_hl_popup-" + id);

        tooltipElement.toggleClass("d-none");
        $('.share_hl').attr('tooltip', '');


        setTimeout(function() {
            tooltipElement.addClass("d-none");
        }, 3000);
    });

    $(".shareHls").hover(
        function() {
            if ($(".share_hl_popup").hasClass("d-none")) {
                $('.share_hl').attr('tooltip', '<?= $this->lang->line('share'); ?>');
            }
        },
        function() {
            // No need to do anything on mouse leave
        }
    );
</script>


<script>
    
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

    function handleFocus(element) {
        element.style.color = 'var(--pbc)';
        element.style.borderColor = 'var(--pbc)';
        // Additional logic if needed
    }

    function handleBlur(element) {
        // Your logic for handling blur event
    }

    function renderBanners_new(homeData) {
   
      var lang_title = "<?= $lang_title ?>";
      homeData.data.forEach(function(item,key) { 
      if(item.playlist_type_id == 2){
        var length = 0;
        const initializeSlickSlider = new Promise((resolve, reject) => {
        var copy = '<?= $this->lang->line('copy') ?>'
        var banner_base = '<?php echo base_url() ?>';
        var count = 0 ;
        var banner_data = '<section class="mb-3 banner_after_navbar zoods position-relative ">'+
        '<div class="carousel_top2 ">';
        item.list.forEach(function(item) {
            if('<?=$category_id?>' == item.category_id){
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

            item.banner_url = (item.banner_url?item.banner_url:'<?=base_url(BannerPlaceholder)?>')
            var geners = item.genre_titles ? item.genre_titles.replace(/,/g, ' | ') : '';
            var cattitle=(item.category_title)?item.category_title +" | ":'';
            const action = cattitle+ geners.split('|').map(items => items.trim()).slice(0, 3).join(' | ');
            //var action = (item.genre_titles) ? item.genre_titles.replace(/,/g, ' | ') : '';
            var siturl1 = 'play-media?id=' + item.video_ids+'&type='+'banners';
            var playbtn = "<?= base_url('assets/images/playBtn.png') ?>";                   
            if(!item.is_paid){
                item.is_paid = 0;
            }
            var publisher_id = 0;
            
                                if (item.hasOwnProperty('owned_by')) {
                                    if (item.owned_by > 0) {                                    
                                        const validSubscriptions = "<?= json_encode(SUBSCRIBEUSER)?>";
                                        if (typeof validSubscriptions !== 'undefined') {
                                        if (validSubscriptions.includes(item.owned_by)) {
                                            isSubscribed = 1;  
                                            publisher_id = item.owned_by;
                                        }else{
                                        isSubscribed = 0;  
                                       }  
                                    }else{
                                        isSubscribed = 0;  
                                       } 
                                } 
                               }
            if((isSubscribed != 1) && (item.is_paid==1) && (sess_id!=="")){
                var message = (item.media_type == 0) ? subscribe_watch :subscribe_listen;       
                siturl1 = '<?= site_url('subscription?type=banners&publisherid=') ?>'+publisher_id;
            }
            else if((isSubscribed != 1) && (item.is_paid==1) && (sess_id=="")){
                var message = (item.media_type == 0) ? subscribe_watch :subscribe_listen;
                siturl1 = '<?= site_url('subscription?type=banners&publisherid=') ?>'+publisher_id;

            }
            else if ((item.is_paid==2)  && (item.is_rented != 1)) {
                playbtn = "<?= base_url('assets/images/vector.svg') ?>";
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
                   
                    '<div class="banner-position play_hover_video" data-id="' + item.id + '" data-genres="' + item.genre_titles + '" data-title="' + item.title + '" data-url="' + item.file_url + '" data-banner="' + item.banner_url + '" data-isdrm="' + item.is_drm_protected + '" data-vdcid="' + item.vdc_id + '" data-mediaid="' + item.video_id + '"data-trailer="'+ item.video_id + '">' +
                    '<div class="volume_banner_dt" >'+
        '<div class="tooltip-text" id="mute-tooltip-'+item.id+'" tooltip="<?= $this->lang->line("unmute-tra") ?>">'+
                    '<a href="javascript:void(0);" data-valumeType="banner" class="banner_volume ban-vol-btn" data-id="'+item.id+'">'+
                    '<img id="mute-icon-'+item.id+'" src="<?= base_url('assets/images/mute.svg') ?>" class="img-fluid">'+
                    '</a>'+
                    '</div>'+
                    '</div>'+
                    '<div class="content_banner_dt col_768_after_display_none disply_768 banner_pos_dt ">' +
                    '<a onClick="urls_call(\'' + siturl + '\')" class="pb_banner_vd">' +
                    '<div class="conten_holder bnnr_content">' +
                    '<div class="bannerSubImg'+ (item.banner_icon ? "" : 'bannertitle')+'">' +
                    (item.banner_icon ? '<img src="' + item.banner_icon + '" class="img-fluid banner_img" alt="thumbnail" loading="lazy">' : ' <h2 class="banner-tt_details">'+item.title+'</h2>') +
                    '</div>' +
                     '<p class="description_dt ml23 d-flex ml25 mb-1 align-items-center">';
                    if ((item.released_on!=null) && (item.released_on!=0)) {
                       banner_data += item.released_on ;
                    }
                    if ((hours > 0) || (minutes > 0)) {
                       banner_data += ' <span class="dotspan">&#9679;</span> '+timeLeftString;
                    }
                    if (item.language) {
                        banner_data +=  ' <span class="dotspan">&#9679;</span> '+item.language;
                    }
                var stringa = JSON.stringify(item.rating_json);
                var check_imdb = JSON.parse(stringa);
                banner_data += item.certificate ? ' <span class="dotspan">●</span><span class="ua_16 ua-banner">' + item.certificate +((item.age > 0)?(' '+item.age+'+'):'')+ '</span> <span class="dotspan">●</span>' : '';
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
                    var rating_value = '';
                    if (check_imdb[0] && check_imdb[0].agency == 'Rotten Tomatoes' ||check_imdb[0].agency == 'Rotten Tomato' ) {
                        rating_value = check_imdb[0].rating+"%";
                rating_icons = "<?= base_url("assets/images/Rotten_Tomatoes.svg"); ?>";
                }else{
                    rating_value = check_imdb[0].rating;
                rating_icons = "<?= base_url("assets/images/imd_banne_img.svg"); ?>";
                }
                if (check_imdb[0] && check_imdb[0].agency) {
                if (!item.certificate || item.certificate.length === 0) {
                banner_data += '<span class="dotspan">●</span>';
                }
                banner_data += 
                '<span class="imd_image_banner"><img src="'+rating_icons+'" class="imd_banne_imgs" alt="imd_banne_img"></span>' +
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
                    '<div class="d-flex align-items-center">' +
                    '<button class="bnnr_play_btn bnner_play_color bannerPlayBtn" onClick="urls_call(\'' + siturl1 + '\')">' +
                    '<img class="img-fluid" src="'+playbtn+'" alt="play icon" loading="lazy">' +
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
                        
                            banner_data += `<a href = "javascript:void(0);" class="play_w fav-item-${item.show_id} ${added}" onclick="addToWatchList(event,${item.show_id},1)" tooltip="<?= $this->lang->line('add_to_watchlist'); ?>">
                            <img class = "img-fluid playAdd" src="assets/images/add.svg" alt = "joinwatch" >
                           </a>`;
                           banner_data += `<a href="javascript:void(0);" class="play_w bg-green fav-item-${item.show_id} ${nadded}"  onclick="addToWatchList(event,${item.show_id},3)" tooltip="<?= $this->lang->line('added_to_watchlist'); ?>">
                                 <img class="img-fluid playAdd" src="assets/images/clicks.svg" alt="joinwatch">
                                </a></div></div>`;
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
        }
        count++;
        });
        if(count>0){
            <?php    $class = 'banner-bottom-sec';
                    $Banner = true; ?> 
        }
        banner_data += '</div>' +
            '</section>';
            $('#banners').html(banner_data);
        resolve();
            muteunmute();
           // $('.playlistTitle').removeClass('d-none');
        });
        }
        shimmer('hide');
        initializeCarousel();
    });
 }
</script>

<script>
    $(document).ready(function() {
        $('.gen_class').on("click", function() {
           var gen_id = $(this).data('id');
           var gen_name = $(this).data('gen_name');
           if(gen_id && gen_name){
            queueTrackingDataWithDelay('trackEvent', ["GenrePage", 'View', gen_id + "/" + gen_names],0);
            queueTrackingDataWithDelay('trackEvent', ["Genres", 'Select', gen_id + "/" + gen_name],100);
           }           
        });
        
        queueTrackingDataWithDelay('trackEvent', ["ContentSelected", 'Select', "<?=$category_id ?>"+ "/" + "<?=$titlec?>"],100);
        queueTrackingDataWithDelay('trackEvent', ["Categories", "Select","<?=$category_id ?>" +'/'+  "<?=$titlec?>"],300);      
        queueTrackingDataWithDelay('trackEvent', ["CategoryPage","View","<?=$category_id ?>" +'/'+  "<?=$titlec?>"],400);      
    });

    $(document).on("click", ".play_hover_video ", function() {
    var c_id = $(this).data('id');
    var c_name = $(this).data('title');
    var gen = $(this).data('genres');
    queueTrackingDataWithDelay('trackEvent', ["CategoryPageBanner", "Select",c_id +'/'+ c_name],0);
//   matomo('Banner','Select',c_id +'/'+ c_name );
//   matomo('Banner','Watch Now',c_id +'/'+ c_name , gen);
    });

    $(document).on("click", ".play_hover_show ", function() {
        var c_id = $(this).data('id');
        var c_name = $(this).data('title');
        var video_data_id='';
        var playlist_type_id = $(this).data('titles');
        video_data_id = playlist_type_id;
        //  if(playlist_type_id==4){ 
        //     var video_data_id =  "Trending";
        //  }
        //  if(playlist_type_id==6){ 
        //     var video_data_id =  "RecommendedForYou ";
        //  }
        if(video_data_id!=''){
            console.log(playlist_type_id);
        queueTrackingDataWithDelay('trackEvent', ["CategoryPage", "ContentSelected ",video_data_id +'/' + c_id +'/'+ c_name ],10);

        }
    });


   
    $(window).on('load', function() {
    shimmer("hide");
        setTimeout(() => {
        $('.playlistTitle').removeClass('d-none');
    }, 400);
       
    });
    </script>
