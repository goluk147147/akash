<style type="text/css">
   /* == Player watermark Please don't romeve css ==; */
   .plyr::before {
      box-sizing: border-box;
      content: <?= TITLE; ?>;
      z-index: 100;
      color: #fff;
      font-weight: 500;
      left: 7px;
      font-size: 14px;
      top: 3px;
      position: absolute;
   }

   .play_ep_btn {
      BACKGROUND: WHITE;
      WIDTH: 111PX;
      BORDER-RADIUS: 23PX;
      HEIGHT: 32PX;
   }

   .vjs-icon-hd:before {
      top: 2px !important;
   }

   .video-js .vjs-progress-control:hover .vjs-time-tooltip,
   .video-js .vjs-progress-control:hover .vjs-progress-holder:focus .vjs-time-tooltip {
      display: none !important;
      font-size: 0.6em;
      visibility: visible;
   }

   .video-js.vjs-user-inactive .vjs-progress-control .vjs-mouse-display {
      visibility: hidden;
      opacity: 0 !important;
      transition: visibility 1s, opacity 1s;
   }

   .video-js.vjs-user-inactive .vjs-progress-control .vjs-mouse-display {
      display: none !important;
   }

   .vjs-progress-control:hover .vjs-current-time {
      display: none !important;
   }

   .vjs-icon-cog:before {
      font-size: 17px;
   }

   header {
      display: none !important;
   }

   .fa-arrow-left {
      font-size: 22px;
   }

   .w_text {
      width: 24px;
   }

   .vjs-title {
      left: 24px !important;

   }

   .vjs-title span {
      margin-left: 20px !important;
   }

   .lv_text_ap {
      display: flex;
   }

   .lv_text_ap .vjs-title {

      position: inherit;
   }

   .vjs-progress-control.vjs-control.vjs-hidden {
      display: flex !important;
   }

   .vjs-control.vjs-button.rewindIcon,
   .vjs-control.vjs-button.fast-forward-icon,
   .vjs-control.vjs-button.vjs-picture-in-picture-control,
   .vjs-subs-caps-button.vjs-menu-button.vjs-menu-button-popup.vjs-control.vjs-button,
   .vjs-audio-button.vjs-menu-button.vjs-menu-button-popup.vjs-control.vjs-button,
   .vjs-live-display {
      display: none;
   }

   .vjs-play-progress.vjs-slider-bar {
      width: 100% !important;
   }


   .live_blinker {
      transform: scale(1.1);
   }

   .nav-video-list {
      align-items: center;
      font-size: 18px;
   }

   /* 
   .vjs-volume-panel {
      display: none !important;
   } */

   .vjs-control-bar .vjs-current-time {
      display: none !important;
   }

   .vjs-control-bar .vjs-time-control {
      display: none !important;
   }

   .vjs-control-bar .vjs-duration {
      display: none !important;
   }

   .vjs-volume-panel {
      margin-right: auto !important;
   }

   .vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar {
      opacity: 1 !important;
   }

   /* .video-js.vjs-playing.vjs-user-inactive,
   .video-js.vjs-playing.vjs-user-inactive {
      display: block !important;
   }
   .vjs-user-inactive{
      display:block !important;
   }

   .video-js.vjs-playing.vjs-user-active,
   .video-js.vjs-playing.vjs-user-active {
      display: block !important;
   } */

   /* Hide the pip button in Firefox */
   @-moz-document url-prefix() {
      .vjs-picture-in-picture-control {
         display: none !important;
      }
   }

   .hide-pip {
      display: none !important;
   }

   @media (min-width: 320px) and (max-width: 767px) {
      .vjs-title {
         left: 5px !important;

      }
   }

   #progress {
        stroke-dasharray: 283;
        stroke-dashoffset: 283;
      }
      .shaka-seek-bar-container {
        position: absolute !important;
        right: 0px;
        top: -20px !important;
      }

      .shaka-bottom-controls {
        position: relative;
      }

      .shaka-tooltips-on > [class*="shaka-tooltip"]:hover:after {
        z-index: 11;
      }

      .shaka-overflow-menu,
      .shaka-settings-menu,
      .shaka-overflow-menu {
        background: rgb(55 55 55);
        / padding: 10px 0; /
        border-radius: 6px;
      }
      .shaka-overflow-menu button,
      .shaka-settings-menu button {
        color: #fff;
        padding: 8px 4px;
      }

      .shaka-overflow-menu button:hover,
      .shaka-settings-menu button:hover {
        background: #202020;
      }

      .shaka-settings-menu button[aria-selected="true"] {
        background-color: #202020; / Adjust as needed /
        color: #625df5;
        font-weight: 600;
      }
      .shaka-controls-button-panel {
        justify-content: center !important;
      }

      .shaka-current-selection-span {
        color: #ccc;
      }
     
      .skipvalue {
        right: 5px !important;
        background: rgba(98, 93, 245, 1);
        display: block;
        position: absolute !important;
        top: -54px;
    }
    .shaka-video-container .material-icons-round {
      font-family: "Material Icons Round" !important;
    }
    #video-container{
      height:calc(70vw * 0.567);
    }
    .live_blinker_gif{
      position:absolute;
      top:-50px;
      width:50px;
      right:0;
    }
    .shaka-go-live-button{
      display:none;
    }
    .clickable-btn{
      background:var(--pbg) !important;
    }
    #video {
      width: 100vw;
      height: 100vh;
      object-fit: cover;
    }
   .video-ads{    
      position: absolute;
      bottom: 0px;
      height: 2px;
      background: var(--pbg);
      z-index: 9;
   }
   .shaka-seek-bar-container {
    display: none !important;
}
.shaka-current-time{
   display:none !important;
}
.shaka-skip-ad-container{
   display:none !important;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/controls.min.css"/>
<!-- <script src="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/shaka-player.compiled.js"></script> -->
<script src="<?php echo base_url('assets/website_assets/js/shaka-player.ui.js'); ?>"></script>

<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
<!-- <script type="text/javascript" src="<?//= base_url('assets/js/shaka_ui.js') ?>"></script> -->
<script src="<?php echo base_url('assets/website_assets/js/sweetalert2@8.js'); ?>"></script>

</head>

<body>
   <?php
   // pre($epgDetailData['data']['details']['is_live']);die;
   $time = time();
   $end = isset($epgDetailData['data']['details']['end'])?$epgDetailData['data']['details']['end']:'';
   $video_types = '/Video';
   if($time < $end){
   $video_types = "/Live";   
   }
  // pre( $video_types);die;
  $title_video = isset($epgDetailData['data']['details']['id'], $epgDetailData['data']['details']['title']) 
  ? $epgDetailData['data']['details']['id'] . '/' . $epgDetailData['data']['details']['title'] 
  : '';
 if ((isset($epgDetailData['status']) && $epgDetailData['status'] == true && !empty($epgDetailData['data'])) || (isset($file_url) && $file_url) || ((isset($drm_file_url) && $drm_file_url) && (isset($drm_token) && $drm_token))) { 
//$matomo_title =  $epgDetailData['data']['details']['id']."/".$epgDetailData['data']['details']['title'];?>
      <section class="position-relative live_ch_sect">
         <div class="">
            <div class="chnnl_vid">
               <div class="position-relative pb_sh_live">
               <div id="video-container">
                  <video
                     id="video"
                     disablePictureInPicture
                     data-matomo-title=""
                     poster=""
                     autoplay
                     class="h-100" 
                     data-matomo-title="<?=$title_video?>"
                     title="<?=$title_video ?>">
                  </video>
               </div>
               </div>
            </div>
         </div>
      </section>
      <section class="pt-3 pb-5">
         <div class="container-fluid">
            <div class="row m-0 mob-s">
               <div class="col-lg-12 mx-auto">
                  <div class="">
                     <div class="row m-0">
                        <?php

                        $lang_title = ucwords($this->session->lang_id);

                        $descriptions = '';
                        if (isset($epgDetailData['data']['details']['description']) && is_array($epgDetailData['data']['details']['description'])) {
                           // First, check for the English description
                           foreach ($epgDetailData['data']['details']['description'] as $desc) {
                              if ($desc['language'] === "English") {
                                 $descriptions = $desc['content'];
                                 break;
                              }
                           }

                           // If lang_title is set, check for the description in that language
                           if (isset($lang_title)) {
                              foreach ($epgDetailData['data']['details']['description'] as $desc) {
                                 if ($desc['language'] === $lang_title) {
                                    $descriptions = $desc['content'];
                                    break;
                                 }
                              }
                           }
                        }
                        $timeDuration = '';
                        if(isset($epgDetailData['data']['details']['end']) && !empty($epgDetailData['data']['details']['end'])){
                           $differenceInSeconds = $epgDetailData['data']['details']['end'] - $epgDetailData['data']['details']['start'];
                           $hours = floor($differenceInSeconds / 3600);
                           $minutes = floor(($differenceInSeconds % 3600) / 60);
                           $timeDuration = sprintf("%dh %dm", $hours, $minutes);
                        }
                        ?>

                        <div class="py-3 col-md-8">
                           <div class="d-flex live_pb_head d-none">
                              <img src="<?= FLOGO ?>" class="img-fluid" alt="logo">
                              <h5 class="text-white m-0 ms-2"><?= $this->lang->line('bharat_ott') ?></h5>
                           </div>
                           <div class="pt-3">
                              <h4 class="text_e7 txt_98"><?= $epgDetailData['data']['details']['title']??''; ?></h4>
                              <?php if(isset($epgDetailData['data']['details']['start']) && !empty($epgDetailData['data']['details']['start'])){ ?>
                                 <p class="line21 tex-fo-500 text-white"><?= date('D, d F', $epgDetailData['data']['details']['start']) ?> <span class="dot_upcoming mx-2"></span> <span><?= date('h:i A', $epgDetailData['data']['details']['start']) ?></span>
                              <?php } ?>
                              <?php if(!empty($timeDuration)){ ?>
                                 <!-- <span class="dot_upcoming mx-2"></span><span><?//= $timeDuration ?></span> -->
                              <?php } ?>
                              <?php if(!empty($epgDetailData['data']['details']['genres'])){ 
                                 if(isset($epgDetailData['data']['details']['start']) && !empty($epgDetailData['data']['details']['start'])){ ?>
                                 <span class="dot_upcoming mx-2"></span>
                                 <?php } ?>
                                 <span><?= $epgDetailData['data']['details']['genres']??''; ?></span></p>
                              <?php } ?>
                              <p class="line21 pb_live_p"><?= $descriptions; ?></p>
                           </div>
                        </div>
                        <div class="col-md-4 py-3">
                           <div class="d-flex align-items-center liveev_flex justify-content-end">
                              <div class="lik-posetin me-2 <?=($videoType != 'live events')?'d-none':''?>">
                                    <span class="share_btn_icon disLike position-relative" id="likeSection">
                                       <a href="javascript:void(0)" class="like-btn d-flex">
                                          <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislikelike" class="img-fluid likeSlect like-img ">
                                          <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid likeSlectSen like-img d-none">
                                          <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid d-none dislikeSlect like-img">
                                       </a>
                                    </span>
                                    <div class="likeDislike d-none">
                                       <a class="likethis" href="javascript:void(0)" onclick="manage_like('likeSlectSen','like')">
                                          <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislike" class="img-fluid to-like not-bg ">
                                          <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid to-like with-bg d-none">
                                          <p class="m-0">Like It</p>
                                       </a>
                                       <a class="notLike" href="javascript:void(0)" onclick="manage_like('dislikeSlect','dislike')">
                                          <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislike" class="img-fluid to-dislike not-bg ">
                                          <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid to-dislike with-bg d-none">
                                          <p class="m-0"><?= $this->lang->line('not_for_me'); ?></p>
                                       </a>
                                    </div>
                              </div>
                           <div class="d-flex align-items-center justify-content-end live_tool sha_btv position-relative">
                              <span class="share_btn_icon share_btn_icon1 liveVideo sh_lv tooltip-text" tooltip="<?= $this->lang->line('share'); ?>">
                                 <a class="shareMedia" href="javascript:void(0)">
                                    <img class="shareMedia" src="<?= base_url('assets/images/shareNew.svg') ?>">
                                 </a>
                              </span>
                              <div class="share_hl_popup d-none share_hl_bt">
                                 <form class="mb-0">
                                    <div class="share_bg">
                                       <div class="form-group mb-0 w-100 position-relative">
                                          <?php
                                          $currentUrl = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                          ?>
                                          <img src="<?= base_url('assets/images/copy_img.svg') ?>" class="img-fluid copy_share" alt="copy">
                                          <input type="text" class="form-control shadow-none share_input" name="inputText" id="inputText" value="<?= $currentUrl ?>" placeholder="Link Address" readonly>
                                       </div>
                                       <a class="b_t_n b_t_n2 bg_btn_color" id="copyBtn" href="javascript:void(0)" onclick="copy_link()" style="color:#fff !important;background: var(--pbg);"><?= $this->lang->line('copy') ?></a>
                                    </div>
                                 </form>
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

        <?php
   //  pre($epgDetailData['data']['similar']);
   if (isset($epgDetailData) && $epgDetailData['status'] == true && !empty($epgDetailData['data'])) { ?>
       <?php if (isset($epgDetailData['data']['similar']) && !empty($epgDetailData['data']['similar'])) { ?>
      <section class="border-live"></section>
      <?php } ?>

      <section class="py-5 <?=($videoType == 'live events')?'d-none':''?>">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12 mx-auto">
                  <div class="w-100">
                     <?php if (isset($epgDetailData['data']['similar']) && !empty($epgDetailData['data']['similar'])) { ?>
                        <h4 class="text-white m-0 liveVideoHead">Similar Channels</h4>

                        <div class="carousel_bott owl-carousel owl-theme pt-4 liveVedioArrow banner-place" style="display:none;">
                           <?php if (isset($epgDetailData['data']['similar']) && !empty($epgDetailData['data']['similar'])) {
                              foreach ($epgDetailData['data']['similar'] as $res) {
                                 // pre($res);
                                 $id = aes_cbc_encryption_($res['id']);
                           ?>
                                 <div class="card_shimmer">
                                    <img src="<?= base_url('assets/images/placeholder-poster-img.png'); ?>" class="img-fluid card_shimmer_op" alt="placeholder">

                                 </div>
                           <?php }
                           } ?>
                        </div>



                        <div class="carousel_bott owl-carousel owl-theme pt-4 liveVedioArrow banner_load_af">
                           <?php
                           foreach ($epgDetailData['data']['similar'] as $res) {
                               //pre($res);
                              $res['still_live'] = 0;
                              $time = time();
                              $end = isset($res['end'])?$res['end']:'';
                              if($time < $end){
                                 $res['still_live'] = 1;
                              }
                              $id = aes_cbc_encryption_($res['id']);
                           ?>
                              <div class="cardDetails shadow card_hover_item videoCard">
                                 <a href="<?= site_url('pb_live_details?id=' . $id); ?>">
                                    <div class="pb_card">
                                       <div class="pb_img pb_l_img">
                                          <img src="<?= $res['thumbnail_url']??base_url('assets/images/placeholder-poster-img.png'); ?>" class="img-fluid as4" alt="<?=$res['title']?>">
                                       </div>

                                    </div>
                                 </a>
                                 <?php if ($res['still_live'] == 1) { ?>
                                    <a href="javascript:void();" class="pb_live_ch">
                                       <img src="<?= base_url('assets/images/newlive1.gif'); ?>" class="img-fluid" alt="live png"> 
                                    </a>
                                 <?php } ?>
                              </div>
                        <?php }
                        } ?>
                        </div>
                  </div>
               </div>
            </div>
      </section>
      <?php }?>

      <?php if(isset($epgDetailData['data']['upcoming_shows']) && !empty($epgDetailData['data']['upcoming_shows'])){ ?>
         <section class="py-4 d-none">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12 mx-auto">
                     <div class="w-100">
                        <div class="categeryHeading d-flex justify-content-between upcom_show">
                           <h4 class="text-white m-0 liveVideoHead ">Upcoming Shows</h4>
                           <a href="<?= base_url('tv-upcoming-program?id='.$video) ?>" class="defaultColr mt-1 mb-3 pr_5 view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';" onFocus="handleFocus(this)" onBlur="handleBlur(this)">
                              View All <i class="fas fa-solid fa-arrow-right"></i>
                           </a>
                        </div>
                        <div class='upcoming_data'>
                           <div class="carousel_bott upcoming_program_details owl-carousel owl-theme pt-2 liveVedioArrow banner_load_af">
                              <?php foreach($epgDetailData['data']['upcoming_shows'] as $key => $value){ ?>
                                 <?php if($key > 9){ break; } ?>
                                 <div class="item">
                                    <a href="javascript:void(0)">
                                    <div class="pb_live_channel_dt upcoming-show" onclick="get_channel_details('<?= $value['id'] ?>', 'upcoming', '<?= $value['title'] ?>', '<?= $value['start'] ?>', '<?= $value['thumbnail_url'] ?>', 2)" data-id="<?= $value['id'] ?>" data-channel_id="<?= $value['channel_id'] ?>" data-video_id="<?= $value['video_id'] ?>" data-title="<?= $value['title'] ?>" data-date="<?= date('D, d F', $value['start']) ?>" data-time="<?= date('h:i A', $value['start']) ?>">                                          <div class="upcomin_img">
                                             <img src="<?= $value['thumbnail_url']??(base_url().PosterPlaceholder) ?>" class="img-fluid" alt="upcoming_program">
                                          </div>
                                          <div class="contentupcoming py-2">
                                             <h6 class="episodeOne text-white m-0"><?= $value['title'] ?></h6>
                                             <p class="mb-0"> <img src="<?= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time"><?= date('D, d F', $value['start']) ?> <span class="dot_upcoming"></span> <?= date('h:i A', $value['start']) ?> </p>
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              <?php } ?>


                           </div>
                        </div>

                     </div>

                  </div>
               </div>
            </div>

         </section>
      <?php } ?>

      <?php if(isset($epgDetailData['data']['past_shows']) && !empty($epgDetailData['data']['past_shows'])){ ?>
         <section class="py-4 d-none">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12 mx-auto">
                     <div class="w-100">
                        <div class="categeryHeading d-flex justify-content-between past_show">
                           <h4 class="text-white m-0 liveVideoHead">Past Program</h4>
                           <a href="<?= base_url('tv-past-program?id='.$video) ?>" class="defaultColr mt-1 mb-3 pr_5 view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';" onFocus="handleFocus(this)" onBlur="handleBlur(this)">
                              View All <i class="fas fa-solid fa-arrow-right"></i>
                           </a>
                        </div>
                        <div class='past_data'>
                           <div class="carousel_bott upcoming_program_details owl-carousel owl-theme pt-2 liveVedioArrow banner_load_af">
                           <?php foreach($epgDetailData['data']['past_shows'] as $key => $value){ ?>
                              <?php if($key > 9){ break; } ?>   
                              <div class="item">
                                    <a href="<?= base_url('pb_live_details?id='.aes_cbc_encryption_($value['id']).'&past=past') ?>">
                                       <div class="pb_live_channel_dt">
                                          <div class="upcomin_img past_showing" data-id="<?= $value['id'] ?>" data-title="<?= $value['title'] ?>" data-channel_id="<?= $value['channel_id'] ?>" data-video_id="<?= $value['video_id'] ?>">
                                             <img src="<?= $value['thumbnail_url']??(base_url().PosterPlaceholder) ?>" class="img-fluid" alt="upcoming_program">
                                          </div>
                                          <div class="contentupcoming py-2">
                                             <h6 class="episodeOne text-white m-0"><?= $value['title'] ?></h6>
                                             <p class="mb-0"> <img src="<?= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time"><?= date('D, d F', $value['start']) ?> <span class="dot_upcoming"></span> <?= date('h:i A', $value['start']) ?></p>
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              <?php } ?>
                           </div>

                        </div>
                     </div>

                  </div>
               </div>
            </div>

         </section>
      <?php } ?>

   <?php } else { ?>
      <div class="col-md-6 m-auto text-center">
         <div class="no_dt_found">
            <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
            <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
            <p class="mb-0 text_ac"><?= NoListFound; ?></p>
         </div>
      </div>
   <?php } ?>

   <?php
      // $url = $trick_url;

      // $newUrl = str_replace('trick_play_images.zip', '', $url);
      // $finalUrl = $newUrl . "Thumbnail_{index}.jpg";
   // } else {
      $finalUrl = '';
   // }
   ?>

   <script>
        var livestring = 'LiveChannel';
      var favKey0 = "<?= ($this->session->profile_id ?? 0) . '-0favourites' ?>";
      var logIn = "<?= $this->session->id ?? 0 ?>";
      var file_url = "<?= $file_url??'' ?>";
      var drm_file_url = "<?= $drm_file_url??'' ?>";
      var drm_token = "<?= $drm_token??'' ?>";
      var adParams = <?= $adParams??"0" ?>;
      var adEnabled = "<?= $adEnabled??false ?>";
      var isAddOnPlay = false;
      if(adEnabled.length > 0){
         adEnabled = true;
      }else{
         adEnabled = false;
      }
      if(adEnabled){
         try{
            adParams = JSON.parse(adParams);
         }catch(err){
            adParams = adParams;
         }
         
      }
      const pathnames = window.location.pathname;
      const segments = pathnames.split('/');
      const lastSegments = segments.pop() || segments[segments.length - 1];

        if(lastSegments == 'live'){
         livestring = 'LiveEvent'
        }
      $('.upcoming-show').on('click', function(){
         var title = $(this).data('title');
         var date = $(this).data('date');
         var time = $(this).data('time');
         var id = $(this).data('id');
         var video_id = $(this).data('video_id');
         var channel_id = $(this).data('channel_id');
         // $('#upcoming-title').html(title);
         // $('#upcoming-date').html('<img src="<?//= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time">'+date+' <span class="dot_upcoming"></span> '+time);
         // $('#upcominModal').modal('show');
         queueTrackingDataWithDelay('trackEvent', ["UpcomingShows", 'Select', id + '/' + title],10);
         queueTrackingDataWithDelay('trackEvent', ["UpcomingShows", 'ContentSelected',  id + '/'+channel_id+'/'+ video_id +'/' + title],110);
      });

      $('.past_showing').on('click', function(){
         var title = $(this).data('title');
         var id = $(this).data('id');
         var channel_id = $(this).data('channel_id');
         var video_id = $(this).data('video_id');
         queueTrackingDataWithDelay('trackEvent', ["PastProgram", 'Select', id + '/' + title],10);
         queueTrackingDataWithDelay('trackEvent', ["PastProgram", 'ContentSelected',  id + '/'+channel_id+'/'+ video_id +'/' + title],110);
       
      });

      $(document).ready(function(){
         $.data(this, 'timer', setTimeout(function() {
               $('.pro_gresss').hide();
         }, 2500));
         var back_nav_btn = '<div class="d-flex align-items-center"><div class="back-button bactrm" onclick="'+'window.history.back()'+'"> <i class = "fa fa-chevron-left text-white back-buttonnn"> </i>  &nbsp;&nbsp;<span class="bac-btn-title">'+"<?= $epgDetailData['data']['details']['title']??''; ?>"+'</span> </div></div>';
         $('#video-container').append(back_nav_btn);
         var progress_fixed = '<div class="pro_gresss "><div class="prog_dts"></div></div>';
         // const buttonPanel = document.querySelector('.shaka-controls-button-panel');
         // buttonPanel.prepend(progress_fixed);
         $('#video-container').append(progress_fixed);

         $('#video-container').on('mousemove touchstart', function() {
            if(isAddOnPlay){
               return false;
            }
            $('.pro_gresss').show();
            clearTimeout($.data(this, 'timer'));
            
            // Hide seekbar after 3 seconds if no interaction
            $.data(this, 'timer', setTimeout(function() {
                  $('.pro_gresss').hide();
            }, 3500));
         });  
         $('.golive_btn').on('click', function(){
            window.location.href='#';
            $('#upcominModal').modal('hide');
         });
      });

      $(document).ready(function(){
         $('.golive_btn').on('click', function(){
            queueTrackingData('trackEvent', ["UpcomingShows", 'Popup', 'Go Live']);
         });
      });

      $(document).ready(function(){
         $('.back-button').on('click', function(event){
            event.stopPropagation();  
         
            queueTrackingDataWithDelay('trackEvent', [livestring, 'Stop', '<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A'). $video_types ?>'],10);
               queueTrackingDataWithDelay('trackContentInteraction', [livestring + '/' + 'Stop', '<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A'). $video_types ?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],100);
               queueTrackingDataWithDelay('trackContentImpression', ['<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A'). $video_types ?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],200);      
            
            //  matomo_live_tracker('UpcomingShows', 'Popup', 'Go Live');
         });
      });

      $(document).ready(function(){
         $('.cancelpro_btn').on('click', function(){
            queueTrackingData('trackEvent', ["UpcomingShows", 'Popup', 'Cancel']);
         });
      });

      $(document).ready(function(){
         $('.upcom_show').on('click', function(){
            queueTrackingData('trackEvent', ["Page", 'View', 'Upcoming Shows']);
         });
      });

      $(document).ready(function(){
         $('.past_show').on('click', function(){
            queueTrackingData('trackEvent', ["Page", 'View', 'PastProgram']);
         });
      });

      function check_favourite() {
         var show_id = "<?= ($epgDetailData['data']['details']['id']??0); ?>";
         fetchCacheData(favKey0)
         .then((res) => {
            if (res.data) {
               res.data.forEach((item, key) => {
                  if (item.show_id == show_id) {
                     if (item.is_deleted == 1) {
                        $('.notlikebtn').removeClass("d-none");
                        $('.likebtn').addClass("d-none");
                        $('.likeAudio').attr('tooltip', '<?= $this->lang->line("favourite_lang") ?>');
                     } else {
                        $('.notlikebtn').addClass("d-none");
                        $('.likebtn').removeClass("d-none");
                        $('.likeAudio').attr('tooltip', '<?= $this->lang->line("added_lang") ?>');
                     }
                  }
               });
            }
         })
      }

      $(document).ready(function() {
         check_favourite();
      })

      function base64DecodeUint8Array(input) {
         var raw = window.atob(input);
         var rawLength = raw.length;
         var array = new Uint8Array(new ArrayBuffer(rawLength));

         for (i = 0; i < rawLength; i++)
            array[i] = raw.charCodeAt(i);

         return array;
      }

      function base64EncodeUint8Array(input) {
         var keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
         var output = "";
         var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
         var i = 0;

         while (i < input.length) {
            chr1 = input[i++];
            chr2 = i < input.length ? input[i++] : Number.NaN;
            chr3 = i < input.length ? input[i++] : Number.NaN;

            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;

            if (isNaN(chr2)) {
               enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {
               enc4 = 64;
            }
            output += keyStr.charAt(enc1) + keyStr.charAt(enc2) +
               keyStr.charAt(enc3) + keyStr.charAt(enc4);
         }
         return output;
      }

      function arrayToString(array) {
         var uint16array = new Uint16Array(array.buffer);

         return String.fromCharCode.apply(null, uint16array);
      }

      function changeSpanName(oldName, newName){
         var spans = document.querySelectorAll('span');
         spans.forEach(span => {
            if (span.innerHTML.trim() === oldName) {
               span.innerHTML = newName;
            }
         });
      }

      function getBrowserName() {
         var userAgent = navigator.userAgent;
         var browserName = "Unknown";

         if (userAgent.indexOf("Chrome") != -1) {
            browserName = "Google Chrome";
         } else if (userAgent.indexOf("Firefox") != -1) {
            browserName = "Mozilla Firefox";
         } else if (userAgent.indexOf("Safari") != -1) {
            browserName = "Apple Safari";
         } else if (userAgent.indexOf("Edge") != -1) {
            browserName = "Microsoft Edge";
         } else if (userAgent.indexOf("MSIE") != -1 || userAgent.indexOf("Trident/") != -1) {
            browserName = "Internet Explorer";
         }

         return browserName;
      }

      function play_paused(arg) {
         if (arg == true) {
            $('.vjs-big-play-button').addClass('d-block').removeClass('d-none')
            $('.vjs-big-pausedm').removeClass('d-block').addClass('d-none');
            var epgId = "<?=($epgDetailData['data']['details']['id']??'N/A')?>"
            if (epgId != 'N/A') {
               queueTrackingDataWithDelay('trackEvent', [livestring, 'Pause', '<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A'). $video_types ?>'],0);
               queueTrackingDataWithDelay('trackContentInteraction', [livestring + '/' + 'Pause', '<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A'). $video_types ?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],100);
               queueTrackingDataWithDelay('trackContentImpression', ['<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A'). $video_types ?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],200);      
            }
         } else {
            $('.vjs-big-play-button').removeClass('d-block').addClass('d-none')
            $('.vjs-big-pausedm').addClass('d-block').removeClass('d-none')
            if (epgId != 0) {
               queueTrackingDataWithDelay('trackEvent', [livestring, 'Resume', '<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A'). $video_types  ?>'],0);
               queueTrackingDataWithDelay('trackContentInteraction', [livestring + '/' + 'Resume', '<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A'). $video_types ?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],100);
               queueTrackingDataWithDelay('trackContentImpression', ['<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A') . $video_types ?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],200);      
            }
         }

         setTimeout(function() {
            $('.vjs-big-play-button').removeClass('d-block').addClass('d-none')
            $('.vjs-big-pausedm').removeClass('d-block').addClass('d-none')
         }, 500)
      }

      var temp = "<?= $this->session->tempuuid ?>";
      var guest_end = '';

      $(document).ready(function() {
         if (logIn == 0) {
            get_live_time().then(function(result) {
               guest_end = result.live_video;
            });
         }
      });

      //guest_end= get_live_time();
      var url;
      var drm;
      var token;
      var player;
      <?php if (isset($epgDetailData['data']['details']) && !empty($epgDetailData['data']['details'])) { ?>
         url = "<?= $epgDetailData['data']['details']['file_url'] ?>";
         drm = "<?= $epgDetailData['data']['details']['is_drm_protected'] ?? 0; ?>";
         token = "<?= !empty($epgDetailData['data']['details']['token']) ? $epgDetailData['data']['details']['token'] : null ?>";
      <?php } else if(isset($epgDetailData['data']['details']) && $epgDetailData['data']['details']['file_url']) { ?>
         url = "<?= $epgDetailData['data']['details']['file_url'] ?>";
         drm = 0;
         token = null;
      <?php } else if($file_url) { ?>
         url = "<?= $file_url ?>";
         drm = 0;
         token = null;
      <?php } else if($drm_file_url && $drm_token) { ?>
         url = "<?= $drm_file_url ?>";
         drm = 1;
         token = "<?= $drm_token ?>";
      <?php } ?>
      var browser = "<?= $DeviceType??1 ?>";
      //const video = document.getElementById("my-video");

      $(document).ready(function(){
         player_config(url, browser, token);
      });

      var fairplayCertUri =  "https://license-global.pallycon.com/ri/fpsKeyManager.do?siteId=<?= SITE_ID ?>";
      
      video.addEventListener('timeupdate', () => {
         
         var check_time = localStorage.getItem('guestPlayTime' + temp);
         var startTime = Date.now();
         let session = "<?= $this->session->id ?>";
         // console.log("startTime", startTime);
         // console.log("check_time", check_time);

         is_free = 1;
         if (startTime >= check_time && !session && (is_free == 1)) {
            video.pause();
            Swal.fire({
               text: "<?= $this->lang->line('free_create_account') ?>",
               title: "<?= $this->lang->line('free_time_up') ?>",
               imageUrl: "<?= base_url('assets/images/timeer.svg') ?>",
               imageWidth: 70,
               imageHeight: 70,
               imageAlt: "Custom image",
               showCancelButton: true,
               showConfirmButton: true,
               confirmButtonText: "<?= $this->lang->line('Login') ?>",
               cancelButtonText: "<?= $this->lang->line('Cancel') ?>"
            }).then(async (result) => {
               var redirect_url = '';
               if (result.value) {
                  redirect_url = "<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>"
                  // matomo('Page', 'View', 'LoginPopup');
                  queueTrackingData('trackEvent', ["Page", 'View', 'LoginPopup']);
                  await set_userdata(redirect_url);
                  //window.location.href = "<?= base_url('user-login') ?>";
                  video.pause();
                  urls_call('user-login');
               } else if (result.dismiss) {
                  // matomo('Page', 'View', 'CancelPopup');
                  queueTrackingData('trackEvent', ["Page", 'View', 'CancelPopup']);
                  // set_userdata(redirect_url);
                  video.pause();
                  // urls_call('pb_live');
               }
            });

         }
      });

      function getAdsData(file_url, mediaTailorAdsParams, uri){
        $.ajax({
          url:file_url,
          type:"post",
          data:JSON.stringify(mediaTailorAdsParams),
          dataType: "json",
          success:async function(res){
            var url = uri.split('cloudfront.net/')[0]+'cloudfront.net'+res.trackingUrl;
            await fetch(url, {
              method: 'GET'
            })
            .then(response => {
               // Check if the response status is OK (status code 200-299)
               if (!response.ok) {
               throw new Error('Network response was not ok ' + response.statusText);
               }
               return response.json(); // Parse the JSON response
            })
            .then(data => {
               //console.log('Success:', data); // Handle the response data
            })
            .catch(error => {
               console.error('Error:', error); // Handle any errors
            });
          }
         })
      }

      var isAdPlaying =  false;
      async function player_config(url, browser,token=''){
         var homeKey = 'masterContent-'+(feedType??0);
         var video_id = "<?=$epgDetailData['data']['details']['id']?>";
         var is_live = "<?=isset($epgDetailData['data']['details']['is_live'])?$epgDetailData['data']['details']['is_live']:''?>";
         if(is_live >1){
            video_check(homeKey, video_id);
         removeBannerData(homeKey, video_id);

         }
         $(document).ready(function() {
            if (logIn == 0) {
               get_live_time().then(function(result) {
                  setGuestEnd(result.live_video);
               });
            }
         });

         function setGuestEnd(value) {
            guest_end = value;
            // console.log('value',value);
            var test = localStorage.getItem('guestPlayTime' + temp);
            var guest_date = Date.now() + (guest_end * 1000);
            // console.log('test',test);
            if (test == null) {
               localStorage.setItem('guestPlayTime' + temp, guest_date);
            }
         }
         const videoElement = document.getElementById("video");
         const videoContainer = document.getElementById("video-container");
         const player = new shaka.Player(videoElement);
         window.player = player;
         shaka.polyfill.installAll();
         const ui = new shaka.ui.Overlay(player, videoContainer, videoElement);
         const controls = ui.getControls();
         const container = controls.getServerSideAdContainer();
         const netEngine = player.getNetworkingEngine();
         const adManager = player.getAdManager();
         //   const PlayEventManager = player.EventManager();
         //   console.log(trickPlayEventManager);
         adManager.initMediaTailor(container, netEngine, videoElement);

         class LiveButton extends shaka.ui.Element {
            constructor(parent, controls, player) {
            super(parent, controls);
            this.player_ = player;

            // Create the button element
            this.button_ = document.createElement('button');
            // this.button_.textContent = '<b>Live</b>';
            this.button_.innerHTML = '<img src="<?= base_url('assets/images/newlive1.gif') ?>" class="img-fluid live_blinker_gif" alt="pb live png">';
            this.button_.classList.add('shaka-live-button');
            // this.button_.setAttribute('aria-label', 'Skip Intro');

            // Append the button to the parent element
            parent.appendChild(this.button_);

            // Add a click event listener to the button
            this.button_.addEventListener('click', () => {
               //video.currentTime = skip_end;
            });
            }
         }

         class LiveButtonFactory {
            create(rootElement, controls, player) {
            return new LiveButton(rootElement, controls, player);
            }
         }

         shaka.ui.Controls.registerElement('LiveButton', 
            new LiveButtonFactory()
         );

         class GoLiveButton extends shaka.ui.Element {
            constructor(parent, controls, player) {
            super(parent, controls);
            this.player_ = player;

            // Create the button element
            this.button_ = document.createElement('button');
            this.button_.textContent = 'Go live';
            // this.button_.innerHTML = '<img src="<?//= base_url('assets/images/newlive1.gif') ?>" class="img-fluid live_blinker_gif" alt="pb live png">';
            this.button_.classList.add('shaka-go-live-button','live_blinker_gif');
            // this.button_.setAttribute('aria-label', 'Skip Intro');

            // Append the button to the parent element
            parent.appendChild(this.button_);

            // Add a click event listener to the button
            this.button_.addEventListener('click', () => {
               //video.currentTime = skip_end;
            });
            }
         }

         class GoLiveButtonFactory {
            create(rootElement, controls, player) {
            return new GoLiveButton(rootElement, controls, player);
            }
         }

         shaka.ui.Controls.registerElement('GoLiveButton', 
            new GoLiveButtonFactory()
         );

         var mediaTailorAdsParams = {};
         if(Object.keys(adParams).length > 0){
            mediaTailorAdsParams = {
            "adsParams": adParams
            };
         }else{
            mediaTailorAdsParams = {
            "adsParams": {}
            };
         }
         const HLSmanifestUri = url;
         const file_url=url;
         const defaultConfig = {
            controlPanelElements: [
               "time_and_duration",
               //"backward",
                "play_pause",
                "LiveButton",
               // "forward",
               "spacer",
               "skipRecap",
               "skipIntro",
               "spacer",
               "volume",
               "mute",
               // "language",
               // "text_settings",
               // "captions",
               //  "overflow_menu",
               //"playback_rate",
               // "cast",
               // "lock_ui",
               // "Unlock_ui",
               // "picture_in_picture",
               "quality",
               "fullscreen",
            ],
            // overflowMenuButtons: [
            //    // "quality"
            //    // "language",
            //    // "playback_rate",
            
            // ],
            seekBarColors: {
               base: "rgba(115, 133, 159, 0.5)",
               buffered: "rgba(115, 133, 159, 0.85)",
               played: "rgba(236, 0, 140, 1)",
            },
            enableTooltips: true,
            // textTrackVisibility: true,
            // playbackRates: [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2],
            // fastForwardRates: [2, 4, 8, 1],
            // rewindRates: [-1, -2, -4, -8],
            // customContextMenu: true,
            // contextMenuElements: ["statistics"],
            // statisticsList: ["width", "height", "playTime", "bufferingTime"],
         };

         // const adConfig = {
         //   controlPanelElements: [
         //     "time_and_duration",
         //     "mute",
         //     "volume",
         //     "fullscreen",
         //   ],
         // };

         // const lockConfig = {
         //   controlPanelElements: ["Unlock_ui"],
         // };

         ui.configure(defaultConfig);
         ui.getControls();

         player.addEventListener('buffering', function(event) {
            if (event.buffering) {
               var liveLatency = player.getStats().liveLatency;
               if (liveLatency > 30) {
                  $('.shaka-current-time').html('Go Live');
               }else{
                  $('.shaka-current-time').html('NNLive');
               }
            }
         });

         try {

            var fairplayCertUri =  "https://license-global.pallycon.com/ri/fpsKeyManager.do?siteId=2LSX";
            var licenseURI = `<?= BASEURLAPI ?><?= BASEVERSION ?>onRequestCreateVideoLicense`;
            if (browser == 2) {

               function getFairplayCert() {
                  var xmlhttp;
                  if (window.XMLHttpRequest) {
                     xmlhttp = new XMLHttpRequest();
                  } else {
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.open("GET", fairplayCertUri, false);
                  xmlhttp.send();

                  var fpsCert = shaka.util.Uint8ArrayUtils.fromBase64(xmlhttp.responseText);
                  return fpsCert;
               }

               const fairplayCert = getFairplayCert();
               player.configure({
                  drm: {
                     servers: {
                        'com.apple.fps': licenseURI
                     },
                     advanced: {
                        'com.apple.fps': {
                        serverCertificate: fairplayCert
                        }
                     },
                  },
                  streaming: {
                     autoLowLatencyMode: true
                  }
               });

               player.getNetworkingEngine()
               .registerRequestFilter(function(type, request) {
                  if (type == shaka.net.NetworkingEngine.RequestType.LICENSE) {
                     const originalPayload = new Uint8Array(request.body);
                     const base64Payload = shaka.util.Uint8ArrayUtils.toBase64(originalPayload);
                     const params = 'spc=' + encodeURIComponent(base64Payload);

                     request.body = shaka.util.StringUtils.toUTF8(params);
                     request.headers['Content-Type'] = 'application/x-www-form-urlencoded';
                     request.headers["pallycon-customdata-v2"] = token;
                  }
               });

               player.getNetworkingEngine()
               .registerResponseFilter(function(type, response) {
                  // Alias some utilities provided by the library.
                  if (type == shaka.net.NetworkingEngine.RequestType.LICENSE) {
                     const responseText = shaka.util.StringUtils.fromUTF8(response.data)
                        .trim();
                     response.data = shaka.util.Uint8ArrayUtils.fromBase64(responseText)
                        .buffer;
                     parsingResponse(response);
                  }
               });

            }else {

               let drmConfig = {
                  servers: {
                     "com.widevine.alpha": licenseURI,
                     // "com.microsoft.playready": licenseURI,               
                  },
                  advanced: {
                     "com.widevine.alpha": {
                        videoRobustness: "SW_SECURE_DECODE", // Specify video robustness level
                        audioRobustness: "SW_SECURE_CRYPTO" // Specify audio robustness level
                     }
                  }
               };
               player.configure({
                  drm: drmConfig,
                  streaming: {
                     autoLowLatencyMode: true
                  }
               });

               player.getNetworkingEngine()
               .registerRequestFilter(function(type, request) {
                  if (type == shaka.net.NetworkingEngine.RequestType.LICENSE) {
                     request.headers["pallycon-customdata-v2"] = token;
                  }
               });

            }

            if(adEnabled){
               var uri = await adManager.requestMediaTailorStream(file_url, mediaTailorAdsParams);
               // getAdsData(file_url, mediaTailorAdsParams, uri);
            }else{
               var uri = HLSmanifestUri;
            }
            // uri = uri + '?start=1726209341&end=1726210541';
            // try{
            //    var uri = await adManager.requestMediaTailorStream(file_url, mediaTailorAdsParams);
            //    getAdsData(file_url, mediaTailorAdsParams, uri);
            // }catch(error){
            //    var uri = HLSmanifestUri;
            // }
            // uri += uri+'?start=1729229400000&end=1729231684000';
            if("<?= $this->lang->line('plr_lang') ?>"){
               localization = ui.getControls().getLocalization();
               const translations = new Map([
                     ['PLAY', "<?= $this->lang->line('plr_play') ?>"],
                     ['PAUSE', "<?= $this->lang->line('plr_pause') ?>"],
                     ['MUTE', "<?= $this->lang->line('plr_mute') ?>"],
                     ['UNMUTE', "<?= $this->lang->line('plr_unmute') ?>"],
                     ['CAPTIONS', "<?= $this->lang->line('plr_captions') ?>"],
                     ['RESOLUTION', "<?= $this->lang->line('plr_resolution') ?>"],
                     ['LANGUAGE', "<?= $this->lang->line('plr_language') ?>"],
                     ['PLAYBACK_RATE', "<?= $this->lang->line('plr_playback') ?>"],
                     ['FULL_SCREEN', "<?= $this->lang->line('plr_fullscreen') ?>"],
                     ['EXIT_FULL_SCREEN', "<?= $this->lang->line('plr_exitfullscreen') ?>"],
                     ['MORE_SETTINGS', "<?= $this->lang->line('plr_more_settings') ?>"],
                  ]);

               localization.insert("<?= $this->lang->line('plr_lang') ?>", translations);
               localization.changeLocale(["<?= $this->lang->line('plr_lang') ?>"]);
            }

           var strmingnot = "<?= $this->lang->line('staming_not') ?>";
            await player.load(uri)
            .then((res)=>{ 
               const stats = player.getStats();  
             
            })
            .catch((err)=>{
               toastr.error(strmingnot);
               console.log('err',err);
            });

            videoElement.addEventListener('ended', function() {
               var videoid = "<?=$epgDetailData['data']['details']['id']?>";
               if (!player.isLive() ) {
                  video_check(homeKey, video_id);
                  
               }
               // console.log("playerended");
               //removeBannerData(homeKey, video_id);
            });

       

            changeSpanName('Captions', 'Subtitles');
            var controlBar = document.querySelector('.shaka-controls-container');
            var adDiv = `<div class="video_ads_after"><div class="video-ads">  </div></div>`;
            controlBar.insertAdjacentHTML('afterend', adDiv);

            const english =
            "https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/transcript/3336892/master_1718289064_20240613201433.vtt?v=1720512567";
            const hindi =
            "https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/transcript/3336892/master_1718289064_20240613201348.vtt?v=1720512567";
            const textTracks = [
            {
               uri: hindi,
               language: "hi",
               kind: "subtitles",
            },
            {
               uri: english,
               language: "en",
               kind: "subtitles",
            },
            ];

            // textTracks.map((text) => {
            //    console.log('text',text);
            //    if(text.uri && text.language && text.kind){
            //       player.addTextTrackAsync(english, text.language, text.kind);
            //    }
            // });

            const audioTracks = player
            .getVariantTracks()
            .filter((track) => track.type === "variant");
            if (audioTracks.length > 0) {
               player.selectVariantTrack(audioTracks[0]);
            }
            
            // adManager.addEventListener('ad_can_skip', function() {
            //    const skipCont = document.querySelector('.shaka-skip-ad-container');
            //    const skipButton = document.querySelector('.shaka-skip-ad-button');
            //    if (skipButton) {
            //       // Set the button to clickable
            //       skipCont.classList.add('clickable-btn');
            //       skipButton.classList.add('clickable-btn');
            //    }
            // });

            adManager.addEventListener(shaka.ads.Utils.AD_BREAK_READY, (e) => {
               console.log("AD_BREAK_READY");
            });

            adManager.addEventListener(shaka.ads.Utils.AD_BUFFERING, (e) => {
            console.log("AD_BUFFERING");
            });

            adManager.addEventListener(shaka.ads.Utils.AD_CLICKED, (e) => {
            console.log("AD_CLICKED");
            });

            adManager.addEventListener(shaka.ads.Utils.AD_CLOSED, (e) => {
            console.log("AD_CLOSED");
            });

            adManager.addEventListener(shaka.ads.Utils.AD_COMPLETE, (e) => {
               console.log("AD_COMPLETE");
               isAddOnPlay = false;
               isAdPlaying = false;
               $('.video-ads').css('width',"0%");
            });

            adManager.addEventListener(
            shaka.ads.Utils.AD_CONTENT_ATTACH_REQUESTED,
            (e) => {
               console.log("AD_CONTENT_ATTACH_REQUESTED");
            }
            );

            adManager.addEventListener(
            shaka.ads.Utils.AD_CONTENT_PAUSE_REQUESTED,
            (e) => {
               console.log("AD_CONTENT_PAUSE_REQUESTED");
            }
            );

            adManager.addEventListener(
            shaka.ads.Utils.AD_CONTENT_RESUME_REQUESTED,
            (e) => {
               console.log("AD_CONTENT_RESUME_REQUESTED");
            }
            );

            adManager.addEventListener(
            shaka.ads.Utils.AD_DURATION_CHANGED,
            (e) => {
               console.log("AD_DURATION_CHANGED");
            }
            );

            adManager.addEventListener(shaka.ads.Utils.AD_ERROR, (e) => {
            console.log("AD_ERROR");
            });

            adManager.addEventListener(
            shaka.ads.Utils.AD_FIRST_QUARTILE,
            (e) => {
               console.log("AD_FIRST_QUARTILE");
            }
            );

            adManager.addEventListener(shaka.ads.Utils.AD_IMPRESSION, (e) => {
               console.log("AD_IMPRESSION");
               let skipCont = document.querySelector('.shaka-skip-ad-container');
               let skipButton = document.querySelector('.shaka-skip-ad-button');
               skipCont.classList.remove('clickable-btn');
               skipButton.classList.remove('clickable-btn');
            });

            adManager.addEventListener(shaka.ads.Utils.AD_INTERACTION, (e) => {
               console.log("AD_INTERACTION");
            });

            adManager.addEventListener(
               shaka.ads.Utils.AD_LINEAR_CHANGED,
               (e) => {
                  console.log("AD_LINEAR_CHANGED");
               }
            );

            adManager.addEventListener(shaka.ads.Utils.AD_LOADED, (e) => {
               console.log("AD_LOADED");
            });

            adManager.addEventListener(shaka.ads.Utils.AD_METADATA, (e) => {
               console.log("AD_METADATA");
            });

            adManager.addEventListener(shaka.ads.Utils.AD_MIDPOINT, (e) => {
               console.log("AD_MIDPOINT");           
            });

            adManager.addEventListener(shaka.ads.Utils.AD_MUTED, (e) => {
               console.log("AD_MUTED");
            });

            adManager.addEventListener(shaka.ads.Utils.AD_PAUSED, (e) => {
               console.log("AD_PAUSED");
            });

            adManager.addEventListener(shaka.ads.Utils.AD_PROGRESS, (e) => {
               console.log("AD_PROGRESS");
            });

            adManager.addEventListener(
               shaka.ads.Utils.AD_RECOVERABLE_ERROR,
               (e) => {
                  console.log("AD_RECOVERABLE_ERROR");
                  isAdPlaying = false;
                  $('.video-ads').css('width',"0%");
                  $(".video_ads_after").css('display','none');
               }
            );

            adManager.addEventListener(shaka.ads.Utils.AD_RESUMED, (e) => {
               console.log("AD_RESUMED");
            });

            adManager.addEventListener(
               shaka.ads.Utils.AD_SKIP_STATE_CHANGED,
               (e) => {
                  console.log("AD_SKIP_STATE_CHANGED",e);
                  let skipCont = document.querySelector('.shaka-skip-ad-container');
                  let skipButton = document.querySelector('.shaka-skip-ad-button');
                  skipCont.classList.add('clickable-btn');
                  skipButton.classList.add('clickable-btn');
               }
            );

            adManager.addEventListener(shaka.ads.Utils.AD_SKIPPED, (e) => {
               console.log("AD_SKIPPED");
               isAddOnPlay = false;
               isAdPlaying = false;
               $('.video-ads').css('width',"0%");
               $(".video_ads_after").css('display','none');
            });

            adManager.addEventListener(shaka.ads.Utils.AD_STARTED, (e) => {
               console.log("AD_STARTED");
               $('.pro_gresss').hide();
               isAddOnPlay = true;
               isAdPlaying = true;
               var adDuration = e.ad.getDuration();
               if(video.playbackRate > 0){
                  playbackRate = video.playbackRate;
               }
               var time = video.currentTime;
               video.playbackRate = 1;
               //ui.configure(adConfig);
               $(".shaka-backward-button").addClass("shaka-hidden");
               $(".lockButton").addClass("shaka-hidden");
               $(".shaka-overflow-button").addClass("shaka-hidden");
               $(".shaka-forward-button").addClass("shaka-hidden");
               $(".video_ads_after").css('display','block');
               video.addEventListener("timeupdate", () => {
                  if (isAdPlaying) {
                     var adseekupdate = Math.ceil((video.currentTime-time)*(100/(adDuration)));
                     console.log('adseekupdate',adseekupdate);
                     $('.video-ads').css('width',adseekupdate+"%");
                  }
               });  
               const sdkAdObject = e["sdkAdObject"];
               const originalEvent = e["originalEvent"];
            });

            adManager.addEventListener(shaka.ads.Utils.AD_STOPPED, (e) => {
               console.log("AD_STOPPED");
               $('.pro_gresss').show();
               isAddOnPlay = true;
               video.playbackRate = playbackRate;
               // ui.configure(defaultConfig);
               $(".shaka-backward-button").removeClass("shaka-hidden");
               $(".shaka-forward-button").removeClass("shaka-hidden");
               $(".lockButton").removeClass("shaka-hidden");
               $(".shaka-overflow-button").removeClass("shaka-hidden");
               $(".video_ads_after").css('display','none');
            });

            adManager.addEventListener(
               shaka.ads.Utils.AD_THIRD_QUARTILE,
               (e) => {
                  console.log("AD_THIRD_QUARTILE");
               }
            );

            adManager.addEventListener(
               shaka.ads.Utils.AD_VOLUME_CHANGED,
               (e) => {
                  console.log("AD_VOLUME_CHANGED");
               }
            );

            adManager.addEventListener(shaka.ads.Utils.ADS_LOADED, (e) => {
               console.log("ADS_LOADED");
            });

            adManager.addEventListener(
               shaka.ads.Utils.ALL_ADS_COMPLETED,
               (e) => {
                  console.log("ALL_ADS_COMPLETED");
               }
            );

            adManager.addEventListener(
               shaka.ads.Utils.CUEPOINTS_CHANGED,
               (e) => {
                  console.log("CUEPOINTS_CHANGED");
               }
            );

         } catch (error) {
            console.error("Error loading manifest:", error);
         }
      }

      function parsingResponse(response) {
         let responseText = arrayBufferToString(response.data);
         responseText = responseText.trim();
         try {
            const pallyconObj = JSON.parse(responseText);
            if (pallyconObj && pallyconObj.errorCode && pallyconObj.message) {
                  if ("8002" != errorCode) {
                     console.log("PallyCon Error : " + pallyconObj.message + "(" + pallyconObj.errorCode + ")");
                     //window.alert('No Rights. Server Response ' + responseText);
                  } else {
                     var errorObj = JSON.parse(pallyconObj.message);
                     console.log("Error : " + errorObj.MESSAGE + "(" + errorObj.ERROR + ")");
                  }
            }
         } catch (e) {}
      }

      function arrayBufferToString(buffer) {
         var arr = new Uint8Array(buffer);
         var str = String.fromCharCode.apply(String, arr);
         // if(/[\u0080-\uffff]/.test(str)){
         //     throw new Error("this string seems to contain (still encoded) multibytes");
         // }
         return str;
      }
      
      video.addEventListener('play', function() {
         playPauseCallback();
      });

      video.addEventListener('pause', function() {
         playPauseCallback();
      });

      function playPauseCallback() {
         var time = '<?= time();?>'
            var tiem_la=  time_format(time*1000);
            var time_date= formatTimestampToDate(time);
         if (video.paused) {
            queueTrackingDataWithDelay('trackEvent', [livestring, 'Pause', time_date + ' '+ tiem_la  +'/'+'<?= ($epgDetailData['data']['details']['id']??'N/A').'/'.($epgDetailData['data']['details']['channel_id']??'N/A').'/'.($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A') . $video_types?>'],0);
            queueTrackingDataWithDelay('trackContentInteraction', [livestring + '/' + 'Pause', time_date + ' '+ tiem_la  +'/'+'<?= ($epgDetailData['data']['details']['id']??'N/A').'/'.($epgDetailData['data']['details']['channel_id']??'N/A').'/'.($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A') . $video_types?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],100);
            queueTrackingDataWithDelay('trackContentImpression', [time_date + ' '+ tiem_la  +'/'+'<?= ($epgDetailData['data']['details']['id']??'N/A').'/'.($epgDetailData['data']['details']['channel_id']??'N/A').'/'.($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A') . $video_types ?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],200);
         }else{
            queueTrackingDataWithDelay('trackEvent', [livestring, 'Play', time_date + ' '+ tiem_la  +'/'+'<?= ($epgDetailData['data']['details']['id']??'N/A').'/'.($epgDetailData['data']['details']['channel_id']??'N/A').'/'.($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A') . $video_types ?>'],0);
            queueTrackingDataWithDelay('trackContentInteraction', [livestring + '/' + 'Play', time_date + ' '+ tiem_la  +'/'+'<?= ($epgDetailData['data']['details']['id']??'N/A').'/'.($epgDetailData['data']['details']['channel_id']??'N/A').'/'.($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A') . $video_types?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],100);
      queueTrackingDataWithDelay('trackContentImpression', [time_date + ' '+ tiem_la  +'/'+'<?= ($epgDetailData['data']['details']['id']??'N/A').'/'.($epgDetailData['data']['details']['channel_id']??'N/A').'/'.($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A') . $video_types?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],200);
                }
      }

      function initialize_player(url, drm = 0, token = null) {
         // $(document).ready(function() {
         //    if (logIn == 0) {
         //       get_live_time().then(function(result) {
         //          setGuestEnd(result.live_video);
         //       });
         //    }
         // });

         // function setGuestEnd(value) {
         //    guest_end = value;
         //    console.log('value',value);
         //    var test = localStorage.getItem('guestPlayTime' + temp);
         //    var guest_date = Date.now() + (guest_end * 1000);
         //    console.log('test',test);
         //    if (test == null) {
         //       localStorage.setItem('guestPlayTime' + temp, guest_date);
         //    }
         // }
      }

      document.addEventListener('keydown', function(e) {
         var activeElement = document.activeElement;
         var tagName = activeElement.className.toLowerCase();
         switch (e.code) {
            case "Space":
            e.preventDefault();
            if(e.code == 'Space' && tagName.includes("shaka-seek-bar")){
               if (!video.paused) {
                  video.play();
               } else {
                  video.pause();
               }
            }else{
               if (video.paused) {
                  video.play();
               } else {
                  video.pause();
               }
            }
            break;
         } 
         if (e.key === 'Enter') {
            handleEnterKey(e);
         }
      });
      
      function handleEnterKey(event) {
         const activeElement = document.activeElement;
         if (activeElement) {
            // Handle various button actions
            if (activeElement.classList.contains('shaka-play-pause-button')) {
               activeElement.click();
            } else if (activeElement.classList.contains('shaka-mute-button')) {
               activeElement.click();
            } else if (activeElement.classList.contains('shaka-fullscreen-button')) {
               activeElement.click();
            } else if (activeElement.classList.contains('shaka-forward-button')) {
               activeElement.click();
            } else if (activeElement.classList.contains('shaka-backward-button')) {
               activeElement.click();
            } else if (activeElement.classList.contains('shaka-pip-button')) {
               activeElement.click();
            } else if (activeElement.classList.contains('shaka-more-settings-button')) {
               activeElement.click();
            } else if (activeElement.classList.contains('back-button')) {
               // Trigger the click event handler
               if (typeof update_data === 'function') {
                     update_data();
               } else {
                     console.error('update_data function is not defined.');
               }
            }
         }
      }
         
      document.querySelectorAll('#video-container button').forEach((btn, index) => {
            //console.log(`Button ${index} is focusable: ${btn.tabIndex >= 0}`);
      });

   </script>

   <script>
      $(document).ready(function() {

         $("#copyBtn").click(function() {
            var copyText = $("#inputText");
            copyText.val();
            var copyButton = $('#copyBtn');
            navigator.clipboard.writeText(copyText.val());

            // Copy the selected text to clipboard
            document.execCommand('copy');
            $('#copyBtn').html('<?= $this->lang->line('copied') ?>')
            $('.bg_btn_color').addClass('copy_share_btn');
            //Swal.fire('Link Copied ', '', 'success');
            $("#share_btn").modal('hide');
            setTimeout(function() {
               copyButton.html('<?= $this->lang->line('copy') ?>'); // Change 'Copy' to the original text you want to display
               $('.bg_btn_color').removeClass('copy_share_btn');
            }, 2000);
            //location.reload();
            // Deselect the text
            //window.getSelection().removeAllRanges();
         });
      });
   </script>

   <script>
      $(document).ready(function() {
         $('.rating_commemt-img').on('click', function() {
            $('.rating_commemt-img').removeClass('active');
            $(this).addClass('active');
         });
      });

      function moveSeekButton() {
         // / $('.vjs-seek-button.skip-back').insertBefore($('.vjs-play-control.vjs-control.vjs-button'));
         setTimeout(() => {
            $('.vjs-quality-button .vjs-menu .vjs-menu-content').prepend('<div class="textQuality">Quality</div>');

            $('.vjs-audio-button .vjs-menu .vjs-menu-content').prepend('<div class="textQuality">Audio Language</div>');

            $('.vjs-subs-caps-button .vjs-menu .vjs-menu-content').prepend('<div class="textQuality">Subtitle</div>');

            $('.vjs-subs-caps-button').removeClass('vjs-hidden');
            $('.vjs-audio-button').removeClass('vjs-hidden');
            //$('.vjs-quality-button').removeClass('vjs-hidden');
         }, 1000)
      }

      $(window).on("load", function() {
         moveSeekButton();
      });

      $('.likeAudio').click(function() {
         var activity = 1;
         var tooltip = '<?= $this->lang->line("added_lang") ?>';
         if ($('.notlikebtn').hasClass("d-none")) {
            var epgId = "<?= ($epgDetailData['data']['details']['id']??0) ?>"
            if (epgId != 0) {
               queueTrackingData('trackEvent', [livestring, 'Unfavourite',  '<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['channel_id']??'N/A'). "/" . ($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A').'/'.'Live'?>']);
            }

            activity = 3;
            tooltip = '<?= $this->lang->line("favourite_lang") ?>';
         } else if (epgId != 0) {
            queueTrackingData('trackEvent', [livestring, 'Favourite',  '<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['channel_id']??'N/A'). "/" . ($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A').'/'.'Live'?>']);
         }

         $("#overlayonajaxhit").removeClass('d-none');
         if(epgId != 0){
            var data = {
               show_id: "<?= ($epgDetailData['data']['details']['id']??0); ?>",
               enc_id: "<?= $enc_id??($epgDetailData['data']['details']['id']??0) ?>",
               type: "<?= $epgDetailData['data']['details']['media_type']??0; ?>",
               thumbnail: "<?= ($epgDetailData['data']['details']['thumbnail_url']??''); ?>",
               poster_url: "<?= ($epgDetailData['data']['details']['thumbnail_url']??''); ?>",
               still_live: "<?= $epgDetailData['data']['details']['still_live']??0; ?>"
            }
            updateFavouriteCache(favKey0, data, activity);
            $("#overlayonajaxhit").addClass('d-none');
            $('.likeAudio').attr('tooltip', tooltip)
            $('.likeMedia').toggleClass('d-none');
         }
      });
   </script>

   <script>
      $(document).on('click', function(event) {
         if ((!$(event.target).closest('.share_btn_icon1').length) && (!$(event.target).closest('.share_hl_popup').length)) {
            // if (!$('.share_hl_popup').hasClass('d-none')) {
            $('.share_hl_popup').addClass('d-none');
            $('#copyBtn').html("<?= $this->lang->line('copy') ?>");
            // }
         }
         //$(".share_hl_popup").addClass("d-none");
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

      function matomo_live_tracker_evnt(user, type, title, hits = 44) {
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
      
      $(".share_btn_icon1").click(function() {
         var tooltipElement = $(".share_hl_popup");
         tooltipElement.toggleClass("d-none");
         $('.share_btn_icon1').attr('tooltip', '');
         setTimeout(function() {
            tooltipElement.addClass("d-none");
         }, 3000);
      });

      $(".share_btn_icon1").hover(
         function() {
            if ($(".share_hl_popup").hasClass("d-none")) {
               $('.share_btn_icon1').attr('tooltip', '<?= $this->lang->line('share'); ?>');
            }
         },
         function() {
            // No need to do anything on mouse leave
         }
      );
   </script>

   <script>
      $(document).ready(function() {
         //$("#pboverlaydiv").css("display", "none");
         window.addEventListener('online', handleConnectionChange);
         window.addEventListener('offline', handleConnectionChange);

      });

      function handleConnectionChange(event) {
         $("#pboverlaydiv").css("display", "none");
         if (event.type == "offline") {
            $('body').append('<h4 class="no_intrnt_text text-white network_bott"> <?= $this->lang->line("nointernet-connection") ?></h4>');
         }
         if (event.type == "online") {
            $('body').find('.no_intrnt_text').remove();
            $('body').append('<h4 class="intrnt_text text-white network_bott"><span class="network_size">✓</span> <?= $this->lang->line("internet-connection") ?></h4>');
            setTimeout(() => {
               $('body').find('.intrnt_text').remove();
            }, 2000)
         }
      }

      async function set_userdata(url) {
         return new Promise((resolve, reject) => {
            $.ajax({
               url: "<?= base_url('web/login_register/set_session') ?>",
               type: "post",
               data: { url },
               success: function(res) {
                  resolve(true); // Resolve the promise with true if the request is successful
               },
               error: function(err) {
                  reject(err); // Reject the promise with the error if the request fails
               }
            });
         });
      }


      const targetTimestamps = <?= ($totalEndTime??0) ?>;
      function runScriptAtTimestamp(timestamp) {
         var timestamp = Number(timestamp);
         const targetTimestamp = timestamp * 1000;
         const currentTimestamp = Date.now();
         const delay = targetTimestamp - currentTimestamp;

         if (delay > 0) {
               setTimeout(() => {
                  getEpgData();
               }, delay);
         }
      }
      if(targetTimestamps!=0){
         targetTimestamps.forEach(timestamp => {
            runScriptAtTimestamp(timestamp);
         });
      }

      function getEpgData(){
         $.ajax({
            url:"<?=base_url('web/live/getEpgData')?>",
            type:"post",
            data:{'id':466},
            success:function(res){
               var res = JSON.parse(res);
               if(res.status){
                  var upcoming_html = `<div class="carousel_bott upcoming_program_details owl-carousel owl-theme pt-2 liveVedioArrow banner_load_af">`;
                  var past_html = `<div class="carousel_bott upcoming_program_details owl-carousel owl-theme pt-2 liveVedioArrow banner_load_af">`;
                  res.data.upcoming_shows.forEach((item,key)=>{
                     if(key > 10){
                        return;
                     }
                     var date = date_format(item.start*1000);
                     var time = time_format(item.start*1000);
                     upcoming_html += `<div class="item">
                           <a href="javascript:void(0)">
                              <div class="pb_live_channel_dt upcoming-show" onclick="get_channel_details('${item.id}', 'upcoming', '${item.title}', '${item.start}', '${item.thumbnail_url}')" data-title="${item.title}" data-date="`+date+`" data-time="`+time+`">
                                 <div class="upcomin_img">
                                    <img src="${item.thumbnail_url}" class="img-fluid" alt="upcoming_program">
                                 </div>
                                 <div class="contentupcoming py-2">
                                    <h6 class="episodeOne text-white m-0">${item.title}</h6>
                                    <p class="mb-0"> <img src="<?= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time">`+date+` <span class="dot_upcoming"></span> `+time+` </p>
                                 </div>
                              </div>
                           </a>
                        </div>`;
                  });
                  upcoming_html += `</div>`;
                  res.data.past_shows.reverse().forEach((item,key)=>{
                     if(key > 10){
                        return;
                     }
                     var date = date_format(item.start*1000);
                     var time = time_format(item.start*1000);
                     past_html += `<div class="item">
                                    <a href="javascript:void(0)">
                                       <div class="pb_live_channel_dt">
                                          <div class="upcomin_img">
                                             <img src="${item.thumbnail_url}" class="img-fluid" alt="upcoming_program">
                                          </div>
                                          <div class="contentupcoming py-2">
                                             <h6 class="episodeOne text-white m-0">${item.title}</h6>
                                             <p class="mb-0"> <img src="<?= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time">`+date+` <span class="dot_upcoming"></span> `+time+`</p>
                                          </div>
                                       </div>
                                    </a>
                                 </div>`;
                  });
                  $('.upcoming_data').html(upcoming_html);
                  $('.past_data').html(past_html);
                  init_carousel();
               }
            }
         })
      }

      function init_carousel(){
         $('.carousel_bott').owlCarousel({
            loop: false,
            margin: 5,
            nav: true,
            dots: false,
            stagePadding: 30,
            onInitialized: adjustStretchHeader,

            navText: [
               '<a class="class_btn"><i class="fa fa-chevron-left"></i></a>',
               '<a class="class_next"><i class="fa fa-chevron-right"></i></a>'
            ],
            responsive: {
               0: {
               //mouseDrag: true,
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
      }

      function date_format(timestamp){
         const date = new Date(timestamp);
         const formattedDate = new Intl.DateTimeFormat('en-US', {
         day: '2-digit',
         month: 'long',
         dayOfWeek: 'short'
         }).format(date);
         return formattedDate;
      }

      function formatTimestampToDate(timestamp) {
         const date = new Date(timestamp * 1000);
         const year = date.getFullYear();
         const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-based
         const day = String(date.getDate()).padStart(2, '0'); // Days are 1-based

         return `${year}-${month}-${day}`;
      }

      function time_format(timestamp){
         const time = new Date(timestamp);
         const formattedTime = new Intl.DateTimeFormat('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
         }).format(time);
         return formattedTime;
      }

      function copy_link() {
         var time = '<?= time();?>'
         var tiem_la=  time_format(time*1000);
         var time_date= formatTimestampToDate(time);
         queueTrackingDataWithDelay('trackEvent', [livestring, 'Share', time_date + ' '+ tiem_la  +'/'+'<?= ($epgDetailData['data']['details']['id']??'N/A').'/'.($epgDetailData['data']['details']['channel_id']??'N/A').'/'.($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A') . $video_types?>'],0);
		  queueTrackingDataWithDelay('trackContentInteraction', ["Share" + '/' + livestring,'<?= ($epgDetailData['data']['details']['id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A')?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],100);
       queueTrackingDataWithDelay('trackContentImpression', ['<?= ($epgDetailData['data']['details']['id']??'N/A') ."/" .($epgDetailData['data']['details']['title']??'N/A')?>','<?= ($epgDetailData['data']['details']['genres']??'N/A') ?? "-" ?>'],200);
      }

      function matomo_live(user, type, title, hits = 4) {
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

      $(window).on('load', function() {
      //    var urlcheck = "<?//= $_GET['past']??'' ?>";
        var time = '<?= time();?>'
         var tiem_la=  time_format(time*1000);
         var time_date= formatTimestampToDate(time);
         _paq.push(['setCustomDimension', 4, livestring ]);
         queueTrackingDataWithDelay('trackEvent', [livestring, 'Selected', time_date + ' '+ tiem_la  +'/'+'<?= ($epgDetailData['data']['details']['id']??'N/A').'/'.($epgDetailData['data']['details']['channel_id']??'N/A').'/'.($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A') . $video_types?>'],100);
         queueTrackingDataWithDelay('trackEvent', [livestring, 'View', time_date + ' '+ tiem_la  +'/'+'<?= ($epgDetailData['data']['details']['id']??'N/A').'/'.($epgDetailData['data']['details']['channel_id']??'N/A').'/'.($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A') . $video_types?>'],300);

      //    if(urlcheck == 'past'){
      //       queueTrackingDataWithDelay('trackEvent', ["Page", 'View', 'Past'],100);
      //    }else{
      //       queueTrackingDataWithDelay('trackEvent', [livestring, 'View', time_date + ' '+ tiem_la  +'/'+'<?= ($epgDetailData['data']['details']['id']??'N/A').'/'.($epgDetailData['data']['details']['channel_id']??'N/A').'/'.($epgDetailData['data']['details']['video_id']??'N/A') . "/" . ($epgDetailData['data']['details']['title']??'N/A') . $video_types?>'],100);
      //    }
      })

   </script>
   <script>
      $(".disLike").click(function() {
        $(".likeDislike").removeClass("d-none");
    });
        function show_like_dislike() {
        fetchCacheData(ratingKey)
        .then((result) => {
            if (result.data) {
            result.data.forEach((item, key) => {
                if (item.show_id == showID) {
                if (item.rating == 'like') {
                    $('.likeSlect').addClass('d-none');
                    $('.dislikeSlect').addClass('d-none');
                    $('.likeSlectSen').removeClass('d-none');

                    $('.to-like').toggleClass('d-none');
                    $('.to-dislike.with-bg').addClass('d-none');
                    $('.to-dislike.not-bg').removeClass('d-none');
                } else if (item.rating == 'dislike') {
                    $('.likeSlect').addClass('d-none');
                    $('.dislikeSlect').removeClass('d-none');
                    $('.likeSlectSen').addClass('d-none');

                    $('.to-dislike').toggleClass('d-none');
                    $('.to-like.with-bg').addClass('d-none');
                    $('.to-like.not-bg').removeClass('d-none');
                } else {
                    $('.likeSlect').removeClass('d-none');
                    $('.dislikeSlect').addClass('d-none');
                    $('.likeSlectSen').addClass('d-none');
                }
                }
            })
            }
        });
    }
      $(document).ready(function() {
         show_like_dislike();
      });
    $(document).on('click', function(event) {
        if ((!$(event.target).closest('.likeDislike').length) && (!$(event.target).closest('.like-btn').length)) {
            if (!$('.likeDislike').hasClass('d-none')) {
                $('.likeDislike').addClass('d-none');
            }
        }
    });
    var showID = "<?= $epgDetailData['data']['details']['show_id']??null ?>";
      function manage_like(type, action) {
        //var rate = media_type;
        var rate='';
        if (!$('.' + type).hasClass('d-none')) {
            action = '';
            $('.like-img').addClass('d-none');
            $('.likeDislike').addClass('d-none');
            $('.' + type).removeClass('d-none');
        }
        var data = {
            show_id: showID,
            rating: action
         }
         rate = rate == 0 ? 'RateVideo' : 'RateAudio';
         if (action == '' && type == 'likeSlectSen') {
            actions = 'LikeDisable';
         } else if (action == '' && type == 'dislikeSlect') {
            actions = 'DislikeDisable';
         } else {
            actions = type == 'likeSlectSen' ? 'LikeEnable' : 'DislikeEnable';
         }
         var titles = "<?= $epgDetailData['data']['details']['id']?>"+"/"+"<?= $epgDetailData['data']['details']['title']?>";
         var des_gener = '';
         ManageLikeEvent(actions,titles,des_gener,livestring);
         //if (titles) {
            // matomo('Rate', 'View', titles);
            // if (type_med != 0) {
            //    ManageLikeEvent(actions,titles,des_gener,'Audio');
            // } else {
            //    ManageLikeEvent(actions,titles,des_gener,'Video');
            // }

         //}
         //titles = '';
         if(showID){
            if (action == '') {
               updateRatingCache(ratingKey, data, 3);
            } else {
               updateRatingCache(ratingKey, data);
            }
         }
        if (action == '' && type == 'likeSlectSen') {  
            actions = 'LikeDisable';
            // matomo('Rate', 'View', titles);
        } else if (action == '' && type == 'dislikeSlect') {
            actions = 'DislikeDisable';
            // matomo('Rate', 'View', titles);
        } else {
            actions = type == 'likeSlectSen' ? 'LikeEnable' : 'DislikeEnable';
            
        }
        $('.like-img').addClass('d-none');
        $('.likeDislike').addClass('d-none');
        if (action == '') {
            $('.not-bg').removeClass('d-none');
            $('.with-bg').addClass('d-none');
            $('.likeSlect').removeClass('d-none');
        } else {
            if (action == 'like') {
                $('.to-like').toggleClass('d-none');
                $('.to-dislike.with-bg').addClass('d-none');
                $('.to-dislike.not-bg').removeClass('d-none');
            }
            if (action == 'dislike') {
                $('.to-dislike').toggleClass('d-none');
                $('.to-like.with-bg').addClass('d-none');
                $('.to-like.not-bg').removeClass('d-none');
            }
            $('.' + type).removeClass('d-none');
        }
   }

   function ManageLikeEvent(actions,titles,des_gener,type){
      queueTrackingDataWithDelay('trackEvent', ["Rate", 'View' , titles],0);
      queueTrackingDataWithDelay('trackEvent', [type, actions, titles],100);
      queueTrackingDataWithDelay('trackContentInteraction', [type+ '/'+actions , titles, des_gener],200);
      queueTrackingDataWithDelay('trackContentImpression', [titles, des_gener],300);
  }

  function video_check(homeKey, video_id) {
   $.ajax({
            type: 'POST',
            url: "<?= base_url('/web/Player/check_video_id') ?>",
            dataType: "json",
            data: {
               video_id:video_id
            },
            success: function(data) {
                console.log(homeKey,'ssssss',video_id);
               if (data.status == 1) {
                  removeBannerData(homeKey, video_id);
               }
            }
         });
      }

      async function removeBannerData(homeKey, video_id, callback = null) {
               try {
                  var cache = await caches.open('appCache');
                  var cachedResponse = await cache.match(homeKey);
                  if (cachedResponse) {
                     var cachedData = await cachedResponse.json();
                     if (video_id != 'all') {
                        cachedData.data.home_data.data = cachedData.data.home_data.data.map((item) => {
                           if (item.playlist_type_id == 2) {
                              item.list = item.list.filter((video) => video.video_id != video_id);
                           }
                           return item;
                        });
                        await cache.put(homeKey, new Response(JSON.stringify(cachedData)));
                     } else {
                        await cache.delete(homeKey);
                     }
                  }
               } catch (err) {
                  console.warn('Error :', err);
               }
            }
   </script>
</body>
</html>