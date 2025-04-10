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
</style>

<script src="<?php echo base_url('assets/website_assets/js/sweetalert2@8.js'); ?>"></script>
</head>

<body>
   <?php
   //pre($content_details['data']);
   if ($content_details['status'] == true && !empty($content_details['data'])) { ?>

      <!-- <section class="">
         <div class="container-fluid">
            <div class="row mb-4">
               <div class="col-md-12 mx-auto mt-3 col-12">
                  <nav class="lv_text_ap">
                     <a href="#" onclick="history.go(-1)" class=" nav-video-list d-flex text-decoration-none d-flex align-items-center text-white">
                        <i class="fa fa-chevron-left text-white"></i>
                        <span class="ms-4 text-white">Live Video</span>
                     </a>
                  </nav>
               </div>
            </div>

         </div>
      </section> -->
      <section class="position-relative live_ch_sect">
         <div class="">
            <div class="chnnl_vid">
               <div class="position-relative">
                  <video id="my-video" class="video-js vjs-default-skin vjs-big-play-centered player_load" data-id='<?= @$content_details['data']['id']; ?>' poster="<?= @$content_details['data']['poster_url'] ?>" preload="auto" width="400" height="300" controls disablePictureInPicture>
                     <?php $data = $content_details['data']['transcribe_data'] ?? ''; ?>
                     <?php
                     if (!empty($data)) {
                        $srtFiles = array_filter($data, function ($entry) {
                           return isset($entry['subtitle_file_format']) && $entry['subtitle_file_format'] == 1;
                        });
                     } else {
                        $srtFiles = array();
                     }
                     ?>
                     <?php if (!empty($srtFiles)) { ?>
                        <?php foreach ($srtFiles as $item) { ?>
                           <track kind='captions' src='<?= $item['transcript_url'] ?? '' ?>' srclang='en' label='<?= $item['lang_option'] ?>' default>
                        <?php } ?>
                     <?php } else { ?>

                     <?php } ?>
                  </video>
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
                        ?>

                        <div class="py-3 col-md-8">
                           <div class="d-flex live_pb_head">
                              <img src="<?= base_url('assets/images/dd_nation_white-sm.svg'); ?>" class="img-fluid" alt="logo">
                              <h5 class="text-white m-0 ms-2"><?= $this->lang->line('bharat_ott') ?></h5>
                           </div>
                           <div class="pt-3">
                              <h4 class="text_e7"><?= $epgDetailData['data']['details']['program_title']??''; ?></h4>
                              <!-- <p class="line21 text-white">Mon 04 Mar, <span>08:25 PM</span></p> -->
                              <p class="line21 pb_live_p"><?= $descriptions; ?></p>
                           </div>
                        </div>
                        <div class="col-md-4 py-3">
                           <div class="d-flex align-items-center justify-content-end live_tool sha_btv position-relative">
                              <?php if ($this->session->id) { ?>
                                 <span class="share_btn_icon me-3 likeAudio liveVideo tooltip-text" tooltip="<?= $this->lang->line("favourite_lang") ?>">
                                    <a href="javascript:void(0);" data-toggle="modal" show-id="<?= $content_details['data']['id']; ?>" data-target="#share_btn">
                                       <img id="likeMedia" class="likeMedia notlikebtn " src="<?= base_url('assets/images/suscribe2.png') ?>">
                                       <img id="likeMedia" class="likeMedia likebtn d-none" src="<?= base_url('assets/images/likeClick.svg') ?>">
                                    </a>
                                 </span>
                              <?php } ?>
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
                                       <a class="b_t_n b_t_n2 bg_btn_color" id="copyBtn" href="javascript:void(0)" style="color:#fff !important;background: var(--pbg);"><?= $this->lang->line('copy') ?></a>
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
      </section>

      <?php if(isset($epgDetailData['data']['upcoming_shows']) && !empty($epgDetailData['data']['upcoming_shows'])){ ?>
         <section class="py-4">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12 mx-auto">
                     <div class="w-100">
                        <div class="categeryHeading d-flex justify-content-between">
                           <h4 class="text-white m-0 liveVideoHead">Upcoming Shows</h4>
                           <a href="javascript:void(0);" class="defaultColr mt-1 mb-3 pr_5 view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';" onFocus="handleFocus(this)" onBlur="handleBlur(this)">
                              View All <i class="fas fa-solid fa-arrow-right"></i>
                           </a>
                        </div>
                        <div class='upcoming_data'>
                           <div class="carousel_bott upcoming_program_details owl-carousel owl-theme pt-2 liveVedioArrow banner_load_af">
                              <?php foreach($epgDetailData['data']['upcoming_shows'] as $key => $value){ ?>
                                 <?php if($key > 9){ break; } ?>
                                 <div class="item">
                                    <a href="javascript:void(0)">
                                       <div class="pb_live_channel_dt upcoming-show" data-title="<?= $value['title'] ?>" data-date="<?= date('D, d F', $value['start']) ?>" data-time="<?= date('h:i A', $value['start']) ?>">
                                          <div class="upcomin_img">
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
         <section class="py-4">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12 mx-auto">
                     <div class="w-100">
                        <div class="categeryHeading d-flex justify-content-between">
                           <h4 class="text-white m-0 liveVideoHead">Past Program</h4>
                           <a href="javascript:void(0);" class="defaultColr mt-1 mb-3 pr_5 view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';" onFocus="handleFocus(this)" onBlur="handleBlur(this)">
                              View All <i class="fas fa-solid fa-arrow-right"></i>
                           </a>
                        </div>
                        <div class='past_data'>
                           <div class="carousel_bott upcoming_program_details owl-carousel owl-theme pt-2 liveVedioArrow banner_load_af">
                           <?php foreach($epgDetailData['data']['past_shows'] as $key => $value){ ?>
                              <?php if($key > 9){ break; } ?>   
                              <div class="item">
                                    <a href="javascript:void(0)">
                                       <div class="pb_live_channel_dt">
                                          <div class="upcomin_img">
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
      <div class="col-md-6 m-auto text-center watchListNo">
         <div class="no_dt_found">
            <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
            <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
            <p class="mb-0 text_ac"><?= NoListFound; ?></p>
         </div>
      </div>
   <?php } ?>

   <?php $trick_play = (json_decode(($content_details['data']['trick_play'] ?? ''), TRUE));
   if (!empty($trick_play)) {

      $trick_url = $trick_play['url'];

   ?>
   <?php
      $url = $trick_url;

      $newUrl = str_replace('trick_play_images.zip', '', $url);
      $finalUrl = $newUrl . "Thumbnail_{index}.jpg";
   } else {
      $finalUrl = '';
   }
   ?>

  
   <script src="<?= base_url() ?>assets/js/cache.js"></script>
   <script src="<?php echo base_url('assets/website_assets/js/moment.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/website_assets/js/video.js'); ?>"></script>
   <script src="<?php echo base_url('assets/website_assets/js/shaka-player.compiled.debug.js'); ?>"></script>
   <script src="<?php echo base_url('assets/website_assets/js/videojs-shaka.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/website_assets/js/shaka-player.ui.js'); ?>"></script>
   <script src="<?php echo base_url('assets/website_assets/js/videojs.hotkeys.min.js'); ?>"></script>
   <script src="<?= base_url('assets/website_assets/js/fullscreen.js') ?>"></script>
   <script src="<?php echo base_url('assets/website_assets/js/videojs-contrib-eme.min.js'); ?>"></script>

   <script>
      var favKey0 = "<?= ($this->session->profile_id ?? 0) . '-0favourites' ?>";
      var logIn = "<?= $this->session->id ?? 0 ?>";

      $('.upcoming-show').on('click', function(){
         var title = $(this).data('title');
         var date = $(this).data('date');
         var time = $(this).data('time');
         $('#upcoming-title').html(title);
         $('#upcoming-date').html('<img src="<?= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time">'+date+' <span class="dot_upcoming"></span> '+time);
         $('#upcominModal').modal('show');
      });

      $(document).ready(function(){
         $('.golive_btn').on('click', function(){
            window.location.href='#';
            $('#upcominModal').modal('hide');
         });
      });

      function check_favourite() {
         var show_id = "<?= $content_details['data']['id']; ?>";
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

      function arrayBufferToString(buffer) {
         var arr = new Uint8Array(buffer);
         var str = String.fromCharCode.apply(String, arr);
         return str;
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




      videojs.Hls.xhr.beforeRequest = function(options) {
         /*
          * Modifications to requests that will affect every player.
          */

         let newUri = options.uri.includes('.ts') ? options.uri + "?q=testDePrueba" : options.uri;

         return {
            ...options,
            uri: newUri
         };

      };

      function play_paused(arg) {
         //console.log(arg)
         if (arg == true) {
            //console.log(arg, 'if')
            $('.vjs-big-play-button').addClass('d-block').removeClass('d-none')
            $('.vjs-big-pausedm').removeClass('d-block').addClass('d-none')
            if ('<?= $content_details['data']['id'] ?>') {
               matomo_live_tracker('LiveChannel', 'Pause', '<?= $content_details['data']['id'] . "/" . $content_details['data']['title'], ($content_details['data']['genres']) ?? "" ?>');
            }
         } else {
            //console.log(arg, 'else')
            $('.vjs-big-play-button').removeClass('d-block').addClass('d-none')
            $('.vjs-big-pausedm').addClass('d-block').removeClass('d-none')
            if ('<?= $content_details['data']['id'] ?>') {
               matomo_live_tracker('LiveChannel', 'Resume', '<?= $content_details['data']['id'] . "/" . $content_details['data']['title'], ($content_details['data']['genres']) ?? "" ?>');
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
      <?php } else { ?>
         url = "<?= $epgDetailData['data']['details']['file_url'] ?>";
         drm = 0;
         token = null;
      <?php } ?>

      function initialize_player(url, drm = 0, token = null) {
         $(document).ready(function() {
            if (logIn == 0) {
               get_live_time().then(function(result) {
                  setGuestEnd(result.live_video);
               });
            }
         });

         function setGuestEnd(value) {
            guest_end = value;
            var test = localStorage.getItem('guestPlayTime' + temp);
            console.log('test', test);
            var guest_date = Date.now() + (guest_end * 1000);
            console.log(guest_date, 'guest_date');
            if (test == null) {
               localStorage.setItem('guestPlayTime' + temp, guest_date);
            }
         }

         if (drm == 1) {
            licenseUri = `<?= BASEURLAPI ?><?= BASEVERSION ?>onRequestCreateVideoLicense`;
            widevineToken = token;
            dashUri = url;
            var fairplayCertUri = 'https://license-global.pallycon.com/ri/fpsKeyManager.do?siteId=2LSX';
            if (dashUri.includes('.m3u8')) {
               player = videojs('my-video');
               player.eme();
               playerConfig = {
                  // controls: true,
                  src: dashUri,
                  playbackRates: [0.5, 1, 1.5, 2, 4],
                  type: 'application/x-mpegurl',
                  keySystems: {
                     'com.apple.fps.1_0': {
                        getCertificate: function(emeOptions, callback) {
                           videojs.xhr({
                              url: fairplayCertUri,
                              method: 'GET',
                           }, function(err, response, responseBody) {
                              if (err) {
                                 callback(err)
                                 return
                              }
                              callback(null, base64DecodeUint8Array(responseBody));
                           })
                        },
                        getContentId: function(emeOptions, initData) {
                           const contentId = arrayToString(initData);
                           return contentId.substring(contentId.indexOf('skd://') + 6);
                        },
                        getLicense: function(emeOptions, contentId, keyMessage, callback) {
                           videojs.xhr({
                              url: licenseUri,
                              method: 'GET',
                              method: 'POST',
                              responseType: 'text',
                              body: 'spc=' + base64EncodeUint8Array(keyMessage),
                              headers: {
                                 'Content-type': 'application/x-www-form-urlencoded',
                                 'pallycon-customdata-v2': widevineToken
                              }
                           }, function(err, response, responseBody) {
                              if (err) {
                                 callback(err)
                                 return
                              }
                              callback(null, base64DecodeUint8Array(responseBody))
                           })
                        }
                     }
                  }
               };
               player.qualityPickerPlugin();
               player.src(playerConfig);
            } else {
               player = videojs('my-video', {
                  html5: {
                     hls: {
                        overrideNative: true
                     },
                     nativeAudioTracks: true,
                  },
                  liveui: true,
                  techOrder: ['shaka'],
                  headers: {
                     'custom-header': 'some value'
                  },
                  // playbackRates: [0.5, 1, 1.5, 2, 4],
                  shaka: {
                     debug: true,
                     sideload: true,
                     configuration: {
                        drm: {
                           servers: {
                              'com.widevine.alpha': licenseUri
                           },
                           advanced: {
                              'com.widevine.alpha': {
                                 'videoRobustness': 'SW_SECURE_CRYPTO',
                                 'audioRobustness': 'SW_SECURE_CRYPTO'
                              }
                           }
                        },
                     },
                     licenseServerAuth: function(type, request) {
                        request.headers['pallycon-customdata-v2'] = widevineToken;
                        if (type === shaka.net.NetworkingEngine.RequestType.LICENSE) {
                           // Handle specific logic if needed
                        }
                     }
                  }
               });
               // player.aspectRatio('16:9');
               player.qualityPickerPlugin();

               player.src([{
                  type: 'application/dash+xml',
                  src: dashUri
               }]);
            }
         } else {


            player = videojs('my-video', {
               sources: [{
                  src: url,
                  type: 'application/x-mpegURL'
               }]
            });
         }



         // let player = videojs("my-video", {
         //    html5: {
         //       hls: {
         //          overrideNative: true
         //       },
         //       nativeAudioTracks: true,
         //    }
         // }, () => {

         player.one("loadedmetadata", () => {

            // $('.vjs-text-track-display div').addClass('sliding-text').text("<?= $content_details['data']['title']; ?>")
            $('.vjs-subs-caps-button').removeClass('vjs-hidden');
            $('.vjs-audio-button').removeClass('vjs-hidden');
            $('.vjs-quality-button').removeClass('vjs-hidden');
            $('.vjs-progress-control, .vjs-remaining-time').addClass('vjs-hidden');
            $('.vjs-live-control').removeClass('vjs-hidden');
            player.muted(true);
            player.play();
            player.on('play', function() {
               $('.next-episode-in-10').hide();
               play_paused(true)
            });

            // player.spriteThumbnails({
            //    url: '<?= $finalUrl ?>',
            //    width: 250,
            //    height: 150,
            //    columns: 7,
            //    rows: 7
            // });

            // Event listener for when the video is paused
            player.on('pause', function() {
               console.log('Video is paused');
               play_paused(false)
            });
            player.landscapeFullscreen({
               fullscreen: {
                  enterOnRotate: true,
                  alwaysInLandscapeMode: true,
                  iOS: true
               }
            });

            // $(document).on('click', '.vjs-big-pausedm', function() {
            //    player.play();
            // })
            $(document).on('click', '.vjs-big-play-button', function() {

               player.play();
               if ('<?= $content_details['data']['id'] ?>') {
                  matomo_live_tracker('LiveVideo', 'Play', '<?= $content_details['data']['id'] . "/" . $content_details['data']['title'], ($content_details['data']['genres']) ?? "" ?>');
               }
            });
            <?php $base_url = base_url("pb_live"); ?>

            // var title = document.createElement('div');
            // title.className = 'vjs-title';
            // title.textContent = "<?= $content_details['data']['title'] ?? '' ?>";

            // var back_nav_btn = '<a href="<?php echo $base_url; ?>" class="img-fluid" alt="log"><i class="fa fa-chevron-left text-white"></i></a>';
            // // $('#my-video').append(back_nav_btn);
            // title.append(back_nav_btn);

            // $('#my-video').append(title);


            var title = document.createElement('div');
            title.className = 'vjs-title';

            // Create span for text content
            var textSpan = document.createElement('span');
            textSpan.textContent = "<?= $content_details['data']['title'] ?? '' ?>";

            var backNavBtn = document.createElement('a');
            backNavBtn.href = "<?php echo $base_url; ?>";
            backNavBtn.className = "me-2 py-2";

            var icon = document.createElement('i');
            icon.className = "fa fa-chevron-left text-white backNavBtns";

            backNavBtn.appendChild(icon);

            title.appendChild(backNavBtn);
            title.appendChild(textSpan);

            $('#my-video').append(title);

            $('.backNavBtns').on('click', function(e) {
               e.preventDefault();
               if ('<?= $content_details['data']['id'] ?>') {
                  matomo_live_tracker('LiveVideo', 'Stop', '<?= $content_details['data']['id'] . "/" . $content_details['data']['title'], ($content_details['data']['genres']) ?? "" ?>');
               }
               window.location.href = "<?php echo $base_url; ?>";
            });



            function getVolumePercentage() {
               return Math.round(myVideo.volume() * 100);
            }

            function displayVolume() {
               var volumeDisplay = $('.voll');
               volumeDisplay.innerText = getVolumePercentage() + '%';
            }


            player.on('timeupdate', function() {
               var check_time = localStorage.getItem('guestPlayTime' + temp)
               console.log("sss", check_time);
               var startTime = Date.now();
               console.log("startTime", startTime);
               let session = "<?= $this->session->id ?>";
               var Ctime = 3;
               free_time = 10;
               is_free = 1;
               if (startTime >= check_time && !session && (is_free == 1)) {
                  player.pause();
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
                  }).then((result) => {
                     var redirect_url = '';
                     if (result.value) {
                        redirect_url = "<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>"
                        matomo('Page', 'View', 'LoginPopup');
                        set_userdata(redirect_url);
                        //window.location.href = "<?= base_url('user-login') ?>";
                        player.pause();
                        urls_call('user-login');
                     } else if (result.dismiss) {
                        matomo('Page', 'View', 'CancelPopup');
                        // set_userdata(redirect_url);
                        player.pause();
                        // urls_call('pb_live');
                     }
                  });

               }
            });
            // player.on('timeupdate', function() {

            //    var Ctime = Math.ceil(player.currentTime());
            //    var t_time = Math.ceil(player.duration());
            //    console.log('Ctime');

            //    var skip_time = 40;

            //    var timeDifference = t_time - Ctime;
            //    if (timeDifference > 0 && timeDifference <= 10) {
            //       // alert(timeDifference);
            //       $('.next-episode-in-10').show();
            //       $('.next-episode-in-10').html(`Playing Episode 1 in ${timeDifference}`);

            //    } else {
            //       $('.next-episode-in-10').hide();
            //    }

            //    if (Ctime > 0 && Ctime < skip_time) {
            //       $("#skipvalue").hide();
            //    } else {
            //       $("#skipvalue").hide();
            //    }

            // });

            var Button = videojs.getComponent("Button");
            var rewind = videojs.extend(Button, {
               constructor: function() {
                  Button.apply(this, arguments);
                  this.addClass("rewindIcon");
               },
               handleClick: function() {
                  player.currentTime(player.currentTime() - 10);
                  animateNotificationIn(true);
               },
            });
            videojs.registerComponent("rewind", rewind);

            player.getChild("ControlBar").addChild("rewind", {}, 0);


            var fastForward = videojs.extend(Button, {
               constructor: function() {
                  Button.apply(this, arguments);
                  this.addClass("fast-forward-icon");
               },
               handleClick: function() {
                  player.currentTime(player.currentTime() + 10);
                  animateNotificationIn(false);
               },
            });
            videojs.registerComponent("fastForward", fastForward);

            player.getChild("ControlBar").addChild("fastForward", {}, 2);


            var pictureInPictureToggle = videojs.extend(Button, {
               constructor: function() {
                  Button.apply(this, arguments);
                  this.addClass("vjs-picture-in-picture-control");
               },
               handleClick: function() {

                  if (this.player_) {

                     if ('pictureInPictureEnabled' in document) {

                        var videoElement = this.player_.el().getElementsByTagName('video')[0];

                        if (videoElement && videoElement.requestPictureInPicture) {
                           if (document.pictureInPictureElement) {
                              document.exitPictureInPicture();
                           } else {
                              videoElement.requestPictureInPicture();
                           }
                        } else {
                           console.error('Picture-in-Picture not supported for this video element.');
                        }
                     } else {
                        console.error('Picture-in-Picture not supported in this browser.');
                     }


                  }
               },
            });

            $(document).ready(function() {
               var browserName = getBrowserName();

               if (browserName == 'Mozilla Firefox') {
                  console.log('pip disabled')

                  //$('.vjs-subs-caps-button').css('margin-left', 'auto')
                  $('.textQuality').addClass('quality-weight');
               } else {
                  videojs.registerComponent("pictureInPictureToggle", pictureInPictureToggle);
                  player.getChild("ControlBar").addChild("pictureInPictureToggle", {}, 6);
               }
            });
            //$('.vjs-quality-button').css('margin-left', 'auto')
            $('.vjs-quality-button').removeClass('vjs-hidden');
            $('.vjs-volume-panel').css('margin-right', 'auto !important')



            const notifications = $('.notification');

            function animateNotificationIn(isRewinding) {
               // console.log(isRewinding, "----");
               isRewinding ? $('.notification').eq(0).addClass('animate-in') : $('.notification').eq(1).addClass('animate-in');

               setTimeout(() => {
                  $('.notification').removeClass('animate-in')
               }, 500)
            }



            function logVolume() {
               var currentVolume = player.volume() * 100;
               var displayVol = currentVolume.toFixed(2).split('.')
               $('.voll').html(displayVol[0] + '%').addClass('d-block');
               setTimeout(function() {
                  $('.voll').removeClass('d-block')
               }, 300)
               console.log('Current Volume:', currentVolume.toFixed(2) + '%');
            }
            $(document).on("keydown", async (e) => {
               const playerVolume = player.volume();
               const playerCurrentTime = player.currentTime();
               switch (e.code) {
                  case "Space":
                     e.preventDefault();
                     if (player.paused()) {
                        e.preventDefault();
                        player.play();
                        //alert('ssj');
                     } else {
                        e.preventDefault();
                        player.pause();

                     }
                     break;
                     // case "ArrowRight":
                     //    e.preventDefault();
                     //    await player.currentTime(playerCurrentTime + 10);
                     //    await animateNotificationIn(false);
                     //    break;
                     // case "ArrowLeft":
                     //    e.preventDefault();
                     //    await player.currentTime(playerCurrentTime - 10);
                     //    await animateNotificationIn(true);
                     //    break;
                     // case "ArrowUp":
                     //    e.preventDefault();
                     //    player.volume(playerVolume + 0.1);
                     //    logVolume()

                     //    break;
                     // case "ArrowDown":
                     //    e.preventDefault();
                     //    player.volume(playerVolume - 0.1);
                     //    logVolume()
                     //    break;
                     // case "KeyM":
                     //    e.preventDefault();
                     //    player.volume(0);
                     //    logVolume()
                     //    break;

                  default:
                     return;
               }
            });


            // videojs.registerComponent("pictureInPictureToggle", pictureInPictureToggle);
            // player.getChild("ControlBar").addChild("pictureInPictureToggle", {}, 10);



            //next episode code
            player.on("ended", function() {
               // alert('The player is ended');

               $("#skipvalue").hide();
            });


            let calidades = player.
            tech({
               IWillNotUseThisInPlugins: true
            }).
            hls.representations();


            crearBotonesCalidades({
               class: "item",
               calidades: calidades,
               father: player.controlBar.el_
            });



            //  player.play();



            var panumatIplay = `<button class="vjs-big-pausedm d-none" type="button" title="Play Paused" aria-disabled="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span></button>`;

            var contro22 = document.querySelector('.vjs-loading-spinner'); // Get the control bar element
            contro22.insertAdjacentHTML('afterend', panumatIplay);


            function crearBotonAutoCalidad(params) {
               let button = document.createElement("div");

               button.id = "auto";
               button.innerText = `Auto`;

               button.classList.add("selected");

               if (params && params.class) button.classList.add(params.class);

               button.addEventListener("click", () => {
                  removeSelected(params);
                  button.classList.add("selected");
                  // calidades.map(calidad => calidad.enabled(true));
               });

               return button;
            }


            var customDiv = `<div class="video-rewind-notify rewind notification">
         <div class="rewind-icon icon">
         <i class="left-triangle triangle">◀◀◀</i>
         <span class="rewind">10 seconds</span>
         </div>
         </div>
         <div class="video-forward-notify forward notification">
         <div class="forward-icon icon">
         <i class="right-triangle triangle">▶▶▶</i>
         <span class="forward">10 seconds</span>
         </div>
         </div>
         <div class="voll upO">volume 90%</div>
         
         `;

            var controlBar = document.querySelector('.vjs-control-bar'); // Get the control bar element
            controlBar.insertAdjacentHTML('afterend', customDiv);

            // controlBar.addClass('hello');

            let goLv = document.createElement('button');
            goLv.classList.add('golive_chnnl_btn');
            goLv.classList.add('live_chnnl_btn');
            goLv.classList.add('live_blinker');
            // goLv.classList.add('pb_live_ch');
            var imgTag = '<img src="<?= base_url('assets/images/newlive1.gif'); ?>" alt="libe" width="55px" alt="pb live png"/>';
            goLv.innerHTML = imgTag;
            //goLv.innerHTML = 'Live';
            console.log(goLv, '--------')

            controlBar.appendChild(goLv);
            // $(controlBar).after(goLv);

            setInterval(() => {
               goLv.classList.toggle('live_blinker');
            }, 500)

            var current = new Date().getTime();


            $(document).ready(function() {
               var playButton = $('.vjs-play-control');
               $('.golive_chnnl_btn').click(function() {
                  player.duration();
                  console.log('live');
               });

               player.on('play', function() {
                  //  player.currentTime(current);
                  $('.golive_chnnl_btn').addClass('live_chnnl_btn');
                  var imgTag = '<img src="<?= base_url('assets/images/pb_live_icon.png'); ?>" alt="live" width="17px" alt="pb live"/> Live';
                  $('.live_chnnl_btn').html(imgTag);
                  // $('.golive_chnnl_btn').text('Live');
                  // console.log('Video is playing');
               });



            });


            $(document).keyup(function(e) {
               if (e.keyCode == 32 && e.target == document.body) {
                  if (player.paused()) {
                     player.play();
                  } else {
                     player.pause();
                  }
                  return false;
               }
            });


            function crearBotonesCalidades(params) {

               let contentMenu = document.createElement('div');
               let skipvalue = document.createElement('div');
               let next_eps = document.createElement('div');
               let menu = document.createElement('div');
               let golive = document.createElement('div');
               let icon = document.createElement('div');
               let skip = document.createElement('button');
               let next = document.createElement('button');
               let pblivebtn = document.createElement('button');
               let qualityTxt = document.createElement("div");
               qualityTxt.innerText = `Quality`;
               qualityTxt.classList.add('textQuality');

               menu.appendChild(qualityTxt);
               let fullscreen = params.father.querySelector('.vjs-fullscreen-control');
               contentMenu.appendChild(icon);
               contentMenu.appendChild(menu);
               skipvalue.appendChild(skip);
               next_eps.appendChild(next);
               contentMenu.appendChild(skipvalue);
               // golive.appendChild(pblivebtn);
               contentMenu.appendChild(next_eps);
               fullscreen.before(contentMenu);

               menu.classList.add('menu');
               skip.classList.add('skip');
               next.classList.add('nxt');
               // pblivebtn.classList.add('golive_chnnl_btn');
               skip.innerHTML = 'Skip Intro';
               next.innerHTML = 'Next Episode';
               // pblivebtn.innerHTML = 'Go Live';
               icon.classList.add('icon', 'vjs-icon-cog');
               contentMenu.classList.add('contentMenu');
               skipvalue.classList.add('skipvalue');
               next_eps.classList.add('next_eps');
               skipvalue.id = "skipvalue";
               next_eps.id = "next_eps";

               var type_id = '<?= $content_details['data']['id']; ?>';
               if (type_id == 241) {
                  let nextEpisodeIn10Button = document.createElement('button');
                  nextEpisodeIn10Button.classList.add('next-episode-in-10');
                  nextEpisodeIn10Button.innerHTML = 'Playing Episode 1 in 10';
                  contentMenu.appendChild(nextEpisodeIn10Button);
               }

               let botonAuto = crearBotonAutoCalidad(params);

               menu.appendChild(botonAuto);


               calidades.sort((a, b) => {
                  return a.height > b.height ? 1 : 0;
               });

               calidades.map(calidad => {
                  let button = document.createElement("div");

                  if (params && params.class) button.classList.add(params.class);

                  button.id = `${calidad.height}`;
                  button.innerText = calidad.height + "p";

                  button.addEventListener("click", () => {
                     resetCalidad(params);
                     button.classList.add("selected");
                     calidad.enabled(true);
                  });

                  menu.appendChild(button);
               });



               function removeSelected(params) {
                  document.querySelector("#auto").classList.remove("selected");
                  [...document.querySelectorAll(`.${params.class}`)].map(calidad => {
                     calidad.classList.remove("selected");
                  });
               }

               function resetCalidad(params) {
                  removeSelected(params);

                  for (let calidad of params.calidades) {
                     calidad.enabled(false);
                  }
               }



            }


         });
      }
      initialize_player(url, drm, token);
      // });

      // function updateTimerDisplay(crTime, dur) {
      //    var currentTime = sessionStorage.getItem("curreTime");
      //    var video_duration = sessionStorage.getItem("duration");
      //    var video_id = '<?= $content_details['data']['id']; ?>';
      //    var show_id = '<?= $content_details['data']['id']; ?>';
      //    var id = '<?= @$play_id; ?>';
      //    var watch_time = '<?= @$content_details['data']['total_watch_time'] ?>';
      //    var remaining_time = '<?= @$content_details['data']['remaining_time'] ?>';
      //    var twice_time = '<?= @$content_details['data']['twice_time'] ?>';
      //    var total_watch_time = watch_time + crTime;



      //    //alert("bh dchg");
      //    $.ajax({
      //       type: 'POST',
      //       url: '<?= base_url('/web/MVF/Continue_watching/update_continue_time'); ?>',
      //       dataType: "json",
      //       data: {
      //          pause_time: crTime,
      //          total_time: dur,
      //          video_id: video_id,
      //          show_id: video_id,
      //          id: id,
      //          total_watch_time: total_watch_time,
      //          total_remaining_time: remaining_time,
      //          activity: activity,
      //          twice_time: twice_time
      //       },
      //       //console.log(data);
      //       success: function(data) {

      //       }
      //    });

      // }
   </script>



   <script>
      $(document).ready(function() {
         $("#copyBtn").click(function() {

            // Select the text in the input field
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


      $(window).on("load", function() {

         // $('.vjs-progress-control, .vjs-remaining-time').addClass('vjs-hidden')

         setTimeout(function() {
            // $('.vjs-live-control').removeClass('vjs-hidden');
            // console.log('live====>')
         }, 500);

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
            if ('<?= $content_details['data']['id'] ?>') {
               matomo_live_tracker('LiveChannel', 'Unfavourite', '<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>', 4);
            }

            activity = 3;
            tooltip = '<?= $this->lang->line("favourite_lang") ?>';
         } else if ('<?= $content_details['data']['id'] ?>') {
            matomo_live_tracker('LiveChannel', 'Favourite', '<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>', 4);
         }

         $("#overlayonajaxhit").removeClass('d-none');
         var data = {
            show_id: "<?= $content_details['data']['id']; ?>",
            enc_id: "<?= $enc_id ?>",
            type: "<?= $content_details['data']['type']; ?>",
            thumbnail: "<?= $content_details['data']['thumbnail']; ?>",
            poster_url: "<?= $content_details['data']['poster_url']; ?>",
            still_live: "<?= $content_details['data']['still_live']; ?>"
         }
         //console.log("updateFavouriteCache",data,activity);
         updateFavouriteCache(favKey0, data, activity);
         $("#overlayonajaxhit").addClass('d-none');
         $('.likeAudio').attr('tooltip', tooltip)
         $('.likeMedia').toggleClass('d-none');
      });


      $('.backNavBtns').on('click', function(e) {
         e.preventDefault();
         if ('<?= $content_details['data']['id'] ?>') {
            matomo_live_tracker('LiveVideo', 'Stop', '<?= $content_details['data']['id'] . "/" . $content_details['data']['title'], ($content_details['data']['genres']) ?? "" ?>');
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

         queueTrackingDataWithDelay('trackEvent', [user, type, title],0);
      queueTrackingDataWithDelay('trackContentInteraction', [user, type, title],100);
      queueTrackingDataWithDelay('trackContentImpression', [title],200);

         // $.ajax({
         //    type: 'POST',
         //    url: "<?= base_url('/web/Home/matomo_hit') ?>",
         //    dataType: "json",
         //    data: {
         //       user: user,
         //       types: type, // Typo here, it should be type instead of types
         //       type: hits,
         //       title: title
         //    },
         //    success: function(data) {
         //       if (data.status == 1) {}
         //    }
         // });
      }

      // $(".share_btn_icon1").click(function() {
      //    $(".share_hl_popup").toggleClass("d-none");
      // })
      // $(".share_btn_icon1").click(function() {

      //    $(".share_hl_popup").toggleClass("d-none");
      //    $('.share_btn_icon1').attr('tooltip', '');
      // });
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
            //console.log('offline ==>');
            //overlay("Please wait.. internet is Not available.");
         }
         if (event.type == "online") {
            $('body').find('.no_intrnt_text').remove();
            $('body').append('<h4 class="intrnt_text text-white network_bott"><span class="network_size">✓</span> <?= $this->lang->line("internet-connection") ?></h4>');
            setTimeout(() => {
               $('body').find('.intrnt_text').remove();
            }, 2000)
            //overlay("");
            //console.log('online ==>');
         }
      }


      function set_userdata(url) {
         $.ajax({
            url: "<?= base_url('web/login_register/set_session') ?>",
            type: "post",
            data: {
               url
            },
            success: function(res) {

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
                  getEpgData();
               }, delay);
         }
      }

      // Schedule execution for each timestamp in the array
      targetTimestamps.forEach(timestamp => {
         runScriptAtTimestamp(timestamp);
      });

      function getEpgData(){
         $.ajax({
            url:"<?=base_url('web/live/getEpgData')?>",
            type:"post",
            data:{'id':466},
            success:function(res){
               console.log(res);
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
                              <div class="pb_live_channel_dt upcoming-show" data-title="${item.title}" data-date="`+date+`" data-time="`+time+`">
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

      function time_format(timestamp){
         const time = new Date(timestamp);
         const formattedTime = new Intl.DateTimeFormat('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
         }).format(time);
         return formattedTime;
      }
   </script>


</body>

</html>