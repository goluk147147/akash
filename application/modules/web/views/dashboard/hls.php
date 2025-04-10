<?php    //$currentUrl = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
?>
<?php $lang_id = ($this->session->userdata('lang_id')) ? $this->session->userdata('lang_id') : 'English';
?>
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
  .header_dtes {
    padding-top: 0 !important;
}
  .f-12size{
      color: rgba(169, 169, 169, 1);
      font-size:13px;
    }
    .f-12sizes{
      color:var(--white);
      font-size:13px;
    }

  .d-none {
    display: none !important;
  }

  .cateaogry_banner .vjs-fluid {
    padding-top: 0 !important;
    position: relative;
    height: calc(98vw* 0.567) !important;
    width: 100%;
  }

  .cateaogry_banner video {
    height: 100% !important;
    object-fit: cover;
    width: 100%;
  }

  .cateaogry_banner .vjs-poster {
    background-size: cover !important;
  }

  .pb_episode_cont {
    position: relative;
    /* margin-top: -90px; */
  }

  .cateaogry_banner .vjs-poster {
    height: calc(98vw* 0.567) !important;
  }

  .cateaogry_banner video {
    height: calc(98vw * 0.567) !important;
    object-fit: cover;
  }


  /* START TOOLTIP STYLES */
  [tooltip] {
    position: relative;
    /* opinion 1 */
  }

  /* Applies to all tooltips */
  [tooltip]::before,
  [tooltip]::after {
    text-transform: none;
    /* opinion 2 */
    font-size: 14px;
    /* opinion 3 */
    line-height: 1;
    user-select: none;
    pointer-events: none;
    position: absolute;
    display: none;
    opacity: 0;
  }

  [tooltip]::before {
    content: '';
    border: 5px solid transparent;
    /* opinion 4 */
    z-index: 1001;
    /* absurdity 1 */
  }

  [tooltip]::after {
    content: attr(tooltip);
    text-align: center;
    min-width: 3em;
    max-width: 21em;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding: 1ch 2ch;
    border-radius: .3ch;
    box-shadow: 0 1em 2em -.5em rgba(0, 0, 0, 0.35);
    background: #111;
    color: #fff;
    z-index: 1000;
    border: 1px solid #242424;
    border-radius: 10px !important;
  }

  /* Make the tooltips respond to hover */
  [tooltip]:hover::before,
  [tooltip]:hover::after {
    display: block;
  }

  /* don't show empty tooltips */
  [tooltip='']::before,
  [tooltip='']::after {
    display: none !important;
  }

  /* FLOW: UP */
  [tooltip]:not([flow])::before,
  [tooltip][flow^="up"]::before {
    bottom: 100%;
    border-bottom-width: 0;
    border-top-color: #111;
  }

  [tooltip]:not([flow])::after,
  [tooltip][flow^="up"]::after {
    bottom: calc(100% + 5px);
  }

  [tooltip]:not([flow])::before,
  [tooltip]:not([flow])::after,
  [tooltip][flow^="up"]::before,
  [tooltip][flow^="up"]::after {
    left: 50%;
    transform: translate(-50%, -.5em);
  }

  /* FLOW: DOWN */
  [tooltip][flow^="down"]::before {
    top: 100%;
    border-top-width: 0;
    border-bottom-color: #333;
  }

  [tooltip][flow^="down"]::after {
    top: calc(100% + 5px);
  }

  [tooltip][flow^="down"]::before,
  [tooltip][flow^="down"]::after {
    left: 50%;
    transform: translate(-50%, .5em);
  }

  /* FLOW: LEFT */
  [tooltip][flow^="left"]::before {
    top: 50%;
    border-right-width: 0;
    border-left-color: #333;
    left: calc(0em - 5px);
    transform: translate(-.5em, -50%);
  }

  [tooltip][flow^="left"]::after {
    top: 50%;
    right: calc(100% + 5px);
    transform: translate(-.5em, -50%);
  }

  /* FLOW: RIGHT */
  [tooltip][flow^="right"]::before {
    top: 50%;
    border-left-width: 0;
    border-right-color: #333;
    right: calc(0em - 5px);
    transform: translate(.5em, -50%);
  }

  [tooltip][flow^="right"]::after {
    top: 50%;
    left: calc(100% + 5px);
    transform: translate(.5em, -50%);
  }

  /* KEYFRAMES */
  @keyframes tooltips-vert {
    to {
      opacity: .9;
      transform: translate(-50%, 0);
    }

    /* Make the tooltips respond to hover */
    [tooltip]:hover::before,
    [tooltip]:hover::after {
      display: block;
    }

    /* don't show empty tooltips */
    [tooltip='']::before,
    [tooltip='']::after {
      display: none !important;
    }

    /* FLOW: UP */
    [tooltip]:not([flow])::before,
    [tooltip][flow^="up"]::before {
      bottom: 100%;
      border-bottom-width: 0;
      border-top-color: #242424;
    }

    [tooltip]:not([flow])::after,
    [tooltip][flow^="up"]::after {
      bottom: calc(100% + 5px);
    }

    [tooltip]:not([flow])::before,
    [tooltip]:not([flow])::after,
    [tooltip][flow^="up"]::before,
    [tooltip][flow^="up"]::after {
      left: 50%;
      transform: translate(-50%, -.3em);
    }

    /* FLOW: DOWN */
    [tooltip][flow^="down"]::before {
      top: 100%;
      border-top-width: 0;
      border-bottom-color: #333;
    }

    [tooltip][flow^="down"]::after {
      top: calc(100% + 5px);
    }

    [tooltip][flow^="down"]::before,
    [tooltip][flow^="down"]::after {
      left: 50%;
      transform: translate(-50%, .5em);
    }

    /* FLOW: LEFT */
    [tooltip][flow^="left"]::before {
      top: 50%;
      border-right-width: 0;
      border-left-color: #333;
      left: calc(0em - 5px);
      transform: translate(-.5em, -50%);
    }

    [tooltip][flow^="left"]::after {
      top: 50%;
      right: calc(100% + 5px);
      transform: translate(-.5em, -50%);
    }

    /* FLOW: RIGHT */
    [tooltip][flow^="right"]::before {
      top: 50%;
      border-left-width: 0;
      border-right-color: #333;
      right: calc(0em - 5px);
      transform: translate(.5em, -50%);
    }

    [tooltip][flow^="right"]::after {
      top: 50%;
      left: calc(100% + 5px);
      transform: translate(.5em, -50%);
    }

    /* KEYFRAMES */
    @keyframes tooltips-vert {
      to {
        opacity: .9;
        transform: translate(-50%, 0);
      }
    }

    @keyframes tooltips-horz {
      to {
        opacity: .9;
        transform: translate(0, -50%);
      }
    }

    /* FX All The Things */
    [tooltip]:not([flow]):hover::before,
    [tooltip]:not([flow]):hover::after,
    [tooltip][flow^="up"]:hover::before,
    [tooltip][flow^="up"]:hover::after,
    [tooltip][flow^="down"]:hover::before,
    [tooltip][flow^="down"]:hover::after {
      animation: tooltips-vert 300ms ease-out forwards;
    }

    [tooltip][flow^="left"]:hover::before,
    [tooltip][flow^="left"]:hover::after,
    [tooltip][flow^="right"]:hover::before,
    [tooltip][flow^="right"]:hover::after {
      animation: tooltips-horz 300ms ease-out forwards;
    }

    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      font-family: sans-serif;
      background: #ededed;
    }


    aside a {
      color: inherit;
      text-decoration: none;
      font-weight: bold;
      display: inline-block;
      padding: .4em 1em;
    }

    .banner-position .content_banner_dt {
      width: 32% !important;
    }


    @media only screen and (min-width: 320px) and (max-width: 767px) {
      .play_epsode_btn span img {
        width: 32px !important;
        height: 32px !important;
      }

      .pb_episode_cont {
        position: relative;
        margin-top: 00px;
      }

      .cateaogry_banner video {
        height: calc(100vw* 0.567) !important;
        object-fit: cover;
      }

      .d-none {
        display: none !important;
      }
    }
    
</style>
<?php $similar = $this->input->get('similar');
$rating = ''; ?>
<section id="data-section">
  <div id="detail_banner"></div>
  <div id="episode_season" class="eps_caro"></div>
  <div id="related_details"></div>
</section>

<section id="shimmer-section">
  <div class="banner_loader banner-place12 position-relative">
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
          <img src="<?= base_url('assets/images/pb_banner.png'); ?>" class="img-fluid card_shimmer_op" alt="Placeholder" style="aspect-ratio:16/9;">
        </div>
      </div>
    </div>
  </div>
  <div class="banner_loader_af banner-place12">

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

  </div>
  <div class=" banner_loader_af banner-place12">

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

  </div>
</section>
<section id="ep_seasion" class="d-none">
  <div class="banner_loader_af banner-place12">
   
        <div class="container-fluid">
            

            <div class="carousel_bott owl-carousel owl-theme">
                <?php for ($j = 0; $j <= 4; $j++) { ?>
                    <div class="card_shimmer" style="aspect-ratio:16/9;">
                        <img src="<?= base_url('assets/images/placeholder-poster-img.png'); ?>" class="img-fluid card_shimmer_op" alt="Placeholder" style="aspect-ratio:16/9;">

                    </div>
                <?php } ?>
            </div>
        </div>
   
</div>
</section>

<?php //} 
?>


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

<script>
   var fullUrl = window.location.href;
    var urlObj = new URL(fullUrl);
    var lastPart = urlObj.pathname.substring(urlObj.pathname.lastIndexOf("/") + 1) + urlObj.search;  
  var paid = '';
  var type_med = '';
  var des_gener = '';
  var lang_title = "<?= ucwords($lang_id) ?>";

  function toggle_section(e) {
    var selectedOption = e.target.options[e.target.selectedIndex];
    //console.log("selectedOption",selectedOption);
    var titleImg = $(selectedOption).data('titleimg');
    var poster = $(selectedOption).data('poster');
    var genre = $(selectedOption).data('genre');
    var descriptionep = $(selectedOption).data('description');
    if(poster.length > 0){
      $('#hlsImg img').attr('src',poster);
    }
    if (titleImg && typeof titleImg === 'string' && titleImg.length > 0) {
    $('.bannerSubImg img').attr('src', titleImg);
    }

    $('.conten_holder .pb_ban_action').html(genre);
    $('.descrpition_title_dt').html(descriptionep);

    $('#ep_seasion').removeClass('d-none');
   
    var option_val = $('.episodeDrop option:selected').val();
    var option_title = $('.episodeDrop option:selected').html();
    if (showID && title) {
      if (paid == 0) {
        // matomo('ContentDetailPage', 'SeasonSelect', showID + '/ ' + title + ' (VOD) ' + '/ ' + option_val + '/ ' + option_title + '/ ' + episode_id + '/ ' + episode_title, geners);
        queueTrackingData('trackEvent', ["ContentDetailPage", 'SeasonSelect',  showID + '/ ' + title + ' (VOD) ' + '/ ' + option_val + '/ ' + option_title + '/ ' + episode_id + '/ ' + episode_title,geners]);
      } else if (paid == 1) {
        // matomo('ContentDetailPage', 'SeasonSelect', showID + '/ ' + title + ' (SVOD) ' + '/ ' + option_val + '/ ' + option_title + '/ ' + episode_id + '/ ' + episode_title, geners);
        queueTrackingData('trackEvent', ["ContentDetailPage", 'SeasonSelect',  showID + '/ ' + title + ' (SVOD) ' + '/ ' + option_val + '/ ' + option_title + '/ ' + episode_id + '/ ' + episode_title,geners]);


      } else {
        // matomo('ContentDetailPage', 'SeasonSelect', showID + '/ ' + title + ' (SVOD) ' + ' / ' + option_val + '/ ' + option_title + '/ ' + episode_id + '/ ' + episode_title, geners);
        queueTrackingData('trackEvent', ["ContentDetailPage", 'SeasonSelect',  showID + '/ ' + title + ' (TVOD) ' + '/ ' + option_val + '/ ' + option_title + '/ ' + episode_id + '/ ' + episode_title,geners]);


      }
    }
    $('#ep_seasion').addClass('d-none');

    $('.home-section').addClass('d-none');
    $('#home-' + option_val).removeClass('d-none');
  }
  $(document).ready(function() {
    manageContentDetail("<?= $content_id ?>");

  });

  var watch_app = '<?= $this->lang->line('Watchnow') ?>';
  var subscribe_watch = '<?= $this->lang->line('Subscribewatch') ?>';
  var subscribe_listen = '<?= $this->lang->line('Subscribelisten') ?>';
  var Login_Watch = '<?= $this->lang->line('LoginToWatch') ?>';
  var listen = '<?= $this->lang->line('Listennow') ?>';
  var isSubscribed = "<?= SUBSCRIPTION_CHECK ?>";
  var sess_id = "<?php echo $this->session->id; ?>";
  var generese_share = '';
  


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
      $('.vjs-big-pausedm').removeClass('d-block').addClass('d-none')
    } else {
      $('.vjs-big-play-button').removeClass('d-block').addClass('d-none')
      $('.vjs-big-pausedm').addClass('d-block').removeClass('d-none')
    }

    setTimeout(function() {
      $('.vjs-big-play-button').removeClass('d-block').addClass('d-none')
      $('.vjs-big-pausedm').removeClass('d-block').addClass('d-none')
    }, 500)
  }


    let player = videojs("my-tlr-video", {}, () => {

    player.one("loadedmetadata", () => {
      var browser_language, track_language, audioTracks;
      // +++ Get the browser language +++
      browser_language = navigator.language || navigator.userLanguage; // IE <= 10
      browser_language = browser_language.substr(0, 2);

      // +++ Get the audio tracks +++
      audioTracks = player.audioTracks();

      // +++ Loop through audio tracks +++
      for (var i = 0; i < audioTracks.length; i++) {
        track_language = audioTracks[i].language.substr(0, 2);

        // +++ Set the enabled audio track language +++
        if (track_language) {
          // When the track language matches the browser language, then enable that audio track
          if (track_language === browser_language) {
            // When one audio track is enabled, others are automatically disabled
            audioTracks[i].enabled = true;
          }
        }
      }


      $('.vjs-text-track-display div').addClass('sliding-text').text(title)

      player.on('play', function() {
        $('.next-episode-in-10').hide();
        play_paused(true)
      });




      player.spriteThumbnails({
        url: '<?= $finalUrl ?>',
        width: 250,
        height: 150,
        columns: 7,
        rows: 7
      });





      // Event listener for when the video is paused
      player.on('pause', function() {
        play_paused(false)
      });

      $(document).on('click', '.vjs-big-pausedm', function() {
        player.play();
      })
      $(document).on('click', '.vjs-big-play-button', function() {
        player.pause();
      });


      function getVolumePercentage() {
        return Math.round(myVideo.volume() * 100);
      }

      function displayVolume() {
        var volumeDisplay = $('.voll');
        volumeDisplay.innerText = getVolumePercentage() + '%';
      }


      player.on('timeupdate', function() {
        var Ctime = Math.ceil(player.currentTime());
        var t_time = Math.ceil(player.duration());

        var skip_time = 40;

        var timeDifference = t_time - Ctime;
        if (timeDifference > 0 && timeDifference <= 10) {
          // alert(timeDifference);
          $('.next-episode-in-10').show();
          $('.next-episode-in-10').html(`Playing Episode 1 in ${timeDifference}`);

        } else {
          $('.next-episode-in-10').hide();
        }

        if (Ctime > 0 && Ctime < skip_time) {
          $("#skipvalue").hide();
        } else {
          $("#skipvalue").hide();
        }
        <?php
        $sarthakl = 241; //$content_details['data']['episodes'][0]['type_id'];

        if ($sarthakl == 241) {
        ?>

          var html = `<a  class="btn" href="<?= base_url('play-episode?id=' . @$shubham . '&&type_id=' . @$sarthak); ?>"> Play Episode 1 </a>`;
        <?php
        } else {

        ?>
          $('.play_ep_btn').remove();



        <?php } ?>


        if (Ctime > skip_time) {

          // $sarthak = $content_details['data']['episodes'][0]['type_id'];

          // $('#next_eps').show();


          //console.log(html);
          //alert(html);
          //$('.play_ep_btn').html(html);
        } else {
          $('#next_eps').hide();
        }

      });
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
          // Ensure that this.player_ is referencing the player instance
          if (this.player_) {
            // Check if the browser supports the Picture-in-Picture API
            if ('pictureInPictureEnabled' in document) {
              // Get the video element from the player
              var videoElement = this.player_.el().getElementsByTagName('video')[0];

              // Check if the video element and requestPictureInPicture are available
              if (videoElement && videoElement.requestPictureInPicture) {
                // Toggle picture-in-picture mode
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
            // player.getChild("ControlBar").addChild(pictureInPictureToggle, {}, 4);

          }
        },
      });

      const notifications = $('.notification');

      function animateNotificationIn(isRewinding) {
        // console.log(isRewinding, "----");
        isRewinding ? $('.notification').eq(0).addClass('animate-in') : $('.notification').eq(1).addClass('animate-in');
        setTimeout(() => {
          $('.notification').removeClass('animate-in')
        }, 500)
      }

      // function animateNotificationOut() {
      //   $(this).removeClass('animate-in');
      // }


      // notifications.each(function() {
      //   $(this).on('animationend', animateNotificationOut);
      // });



      // function animateNotificationOut() {

      //   console.log('Animation ended');
      // }



      function logVolume() {
        var currentVolume = player.volume() * 100;
        var displayVol = currentVolume.toFixed(2).split('.')
        $('.voll').html(displayVol[0] + '%').addClass('d-block');
        setTimeout(function() {
          $('.voll').removeClass('d-block')
        }, 300)
      }

      player.on("keydown", (e) => {
        const playerVolume = player.volume();
        const playerCurrentTime = player.currentTime();
        switch (e.code) {
          case "Space":
            e.preventDefault();
            if (player.paused()) {
              e.preventDefault();
              player.play();

            } else {
              e.preventDefault();
              player.pause();

            }
            break;
          case "ArrowRight":
            e.preventDefault();
            player.currentTime(playerCurrentTime + 10);
            animateNotificationIn(false);
            break;
          case "ArrowLeft":
            e.preventDefault();
            player.currentTime(playerCurrentTime - 10);
            animateNotificationIn(true);
            break;
          case "ArrowUp":
            e.preventDefault();
            player.volume(playerVolume + 0.1);
            logVolume()

            break;
          case "ArrowDown":
            e.preventDefault();
            player.volume(playerVolume - 0.1);
            logVolume()
            break;
          case "KeyM":
            e.preventDefault();
            player.volume(0);
            logVolume()
            break;
          default:
            return;
        }
      });

      // $(document).ready( function() {
      //     var browserName = getBrowserName();
      //     console.log("Browser Name: " + browserName);

      //      if(browserName == 'Mozilla Firefox'){
      //        console.log('pip disabled')
      //      }
      //    else{
      videojs.registerComponent("pictureInPictureToggle", pictureInPictureToggle);
      player.getChild("ControlBar").addChild("pictureInPictureToggle", {}, 17);
      //      }
      // });




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



      player.play();
      // player.aspectRatio('16:9');
      player.fluid(true);
      var k = 0;
      var user_id = '<?= $this->session->id ? $this->session->id : '0'; ?>';
      videojs.Hls.xhr.beforeRequest = function(options) {
        var segment = get_current_segment_info(player, k++);
        if (segment != false) {
          let newUri = options.uri.includes('.ts') ? options.uri + "?user_id=" + user_id + "&duration=" + segment : options.uri;
          return {
            ...options,
            uri: newUri
          };
        }
      };

      function get_current_segment_info(obj, le, old_segment = null) {
        var target_media = obj.tech().hls.playlists.media();
        var snapshot_time = obj.currentTime();
        var dur = target_media.segments[le];
        if (le < target_media.segments.length) {

          return dur.duration;
        } else {
          return false;
        }

      }

      var panumatIplay = `<button class="vjs-big-pausedm d-none" type="button" title="Play Paused" aria-disabled="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span></button>`;

      var contro22 = document.querySelector('.vjs-loading-spinner'); // Get the control bar element
      contro22.insertAdjacentHTML('afterend', panumatIplay);





      // ---------------------------------------------- //


      function crearBotonAutoCalidad(params) {
        let button = document.createElement("div");

        button.id = "auto";
        button.innerText = `Auto`;

        button.classList.add("selected");

        if (params && params.class) button.classList.add(params.class);

        button.addEventListener("click", () => {
          removeSelected(params);
          button.classList.add("selected");
          calidades.map(calidad => calidad.enabled(true));
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
      controlBar.insertAdjacentHTML('afterend', customDiv);;





      function crearBotonesCalidades(params) {

        let contentMenu = document.createElement('div');
        let skipvalue = document.createElement('div');
        let next_eps = document.createElement('div');
        let menu = document.createElement('div');
        let icon = document.createElement('div');
        let skip = document.createElement('button');
        let next = document.createElement('button');


        let fullscreen = params.father.querySelector('.vjs-fullscreen-control');
        contentMenu.appendChild(icon);
        contentMenu.appendChild(menu);
        skipvalue.appendChild(skip);
        next_eps.appendChild(next);
        contentMenu.appendChild(skipvalue);
        contentMenu.appendChild(next_eps);
        fullscreen.before(contentMenu);

        menu.classList.add('menu');
        skip.classList.add('skip');
        next.classList.add('nxt');
        skip.innerHTML = 'Skip Intro';
        next.innerHTML = 'Next Episode';
        icon.classList.add('icon', 'vjs-icon-cog');
        contentMenu.classList.add('contentMenu');
        skipvalue.classList.add('skipvalue');
        next_eps.classList.add('next_eps');
        skipvalue.id = "skipvalue";
        next_eps.id = "next_eps";

        var type_id = showID;
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

        setInterval(() => {
          let auto = document.querySelector("#auto");
          current = player.
          tech({
            IWillNotUseThisInPlugins: true
          }).
          hls.selectPlaylist().attributes.RESOLUTION.height;
          // console.log(current);

          document.querySelector("#auto").innerHTML = auto.classList.contains(
              "selected") ?

            `Auto <span class='current'>${current}p</span>` :
            "Auto";
        }, 1000);


      }

      $("#my-video").click(function() {
        var ct = player.currentTime();
        var dur = player.duration();
        if (player.paused) {
          //player.play();
          //  play_paused(true)
          updateTimerDisplay(ct, dur);
        } else {
          //player.play(); 
          //play_paused(false)
          updateTimerDisplay(ct, dur);

        }
      });

      //  $('.nxt').click(function(){
      //   alert("next episode");
      //  })


      $(".vjs-progress-control").click(function() {
        var ct = player.currentTime();
        var dur = player.duration();
        if (ct != 0 && dur != 0) {
          updateTimerDisplay(ct, dur);
        }
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




      $('#skipvalue').click(function() {
        var skip_time = 12;
        player.pause();
        player.currentTime(skip_time);
        player.play();
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

    });

  });

  function updateTimerDisplay(crTime, dur) {
    $("#overlayonajaxhit").fadeOut(010);
    var currentTime = sessionStorage.getItem("curreTime");
    var video_duration = sessionStorage.getItem("duration");
    var video_id = showID;
    var show_id = showID;
    var id = '<?= @$play_id; ?>';
    var watch_time = '<?= @$content_details['data']['total_watch_time'] ?>';
    var remaining_time = '<?= @$content_details['data']['remaining_time'] ?>';
    var twice_time = '<?= @$content_details['data']['twice_time'] ?>';
    var total_watch_time = watch_time + crTime;
    var activity = '<?= ($activity) ?? 1 ?>';


    //alert("bh dchg");
    $.ajax({
      type: 'POST',
      url: '<?= base_url('/web/Continue_watching/update_continue_time'); ?>',
      dataType: "json",
      data: {
        pause_time: crTime,
        total_time: dur,
        video_id: video_id,
        show_id: video_id,
        id: id,
        total_watch_time: total_watch_time,
        total_remaining_time: remaining_time,
        activity: activity,
        twice_time: twice_time
      },
      //console.log(data);
      success: function(data) {

      }
    });

  }
</script>


<script type="text/javascript">
  var title = '';
  var season = [];
  var geners = '';

  var ratingKey = `<?= ($this->session->profile_id ?? 0) . '-ratings' ?>`;
  var watchKey = `<?= ($this->session->profile_id ?? 0) . '-watchList' ?>`;
  var showID = '';
  var is_paid = 0;
  var poster = '';
  var thumbnail = '';
  var description = '';
  var media_type = '';
  var encshowid = "<?= ($enc_id ?? 0) ?>";

  async function checkWatchlist() {
    html = `<span class="wt-add tooltip-text d-inline-block" tooltip="<?= $this->lang->line('add_to_watchlist'); ?>"><a href="javascript:void(0);" onclick="add_to_watchList(1)" >
            <img class="img-fluid add_watch remove_watch" src="assets/images/add.svg" alt="joinwatch">
            </a></span>`;
    $('#watchlist_toggle').html(html);

    await fetchCacheData(watchKey)
      .then((result) => {
        if (result) {
          result.data.forEach((item, key) => {
            if (item.show_id == showID) {
              if (item.is_deleted != 1) {
                html = `<span class="wt-remove tooltip-text d-inline-block shv_nn" id="remove_watchlist" tooltip="<?= $this->lang->line('added_to_watchlist'); ?>"><a href="javascript:void(0);" onclick="add_to_watchList(3)">
                  <img src="assets/images/clicks.svg" alt="joinwatch" class=" img-fluid add_watch ads_vt remove_watch" style="height:100%">
                  </a></span>`;
              }
            }
          })
        }
      });
    $('#watchlist_toggle').html(html);
    $('.d-none').css('display', 'none !important');
  }

  async function add_to_watchList(cat = 1) {
    var descriptionas = '';
    if (Array.isArray(description)) {
      const sessionDescription = description.find(desc => desc.language === "English");
      if (sessionDescription) {
        descriptionas = sessionDescription.content;
      }
      if (lang_title) {
        const sessionDescription = description.find(desc => desc.language === lang_title);
        if (sessionDescription) {
          descriptionas = sessionDescription.content;
        }
      }
    }
    var watch = cat == 1 ? 'Add' : 'Delete';
    var timestamp = Math.floor(new Date().getTime() / 1000);
    var date = new Date(timestamp * 1000); // Multiply by 1000 to convert seconds to milliseconds
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    hours = ('0' + hours).slice(-2);
    minutes = ('0' + minutes).slice(-2);
    seconds = ('0' + seconds).slice(-2);
    var date = hours + ':' + minutes + ':' + seconds;
    title1 = showID + '_' + title + '_' + date;
    // $('#overlayonajaxhit').css('display', 'block');
    var data = {
      show_id: showID,
      is_paid: is_paid,
      enc_show_id: encshowid,
      title: title,
      geners: geners,
      poster_url: poster,
      thumbnail: thumbnail,
      description: descriptionas,
      media_type: media_type
    }
   
    
    if (showID && title && poster) {
      await updateWatchlistCache(watchListCacheKey, data, cat);
      updateHomeContent(0, cat);
      checkWatchlist();
    }
    $('#overlayonajaxhit').css('display', 'none');
    if (title) {
      ManageWatchEvent(watch,showID,title);
    }
  }

  $(document).ready(function() {
    $('.back-button').click(function() {

    })
  });


  $(document).ready(function() {
    $('.rating_commemt-img').on('click', function() {
      $('.rating_commemt-img').removeClass('active');
      $(this).addClass('active');
    });
  });

  var hoverTimeout;

  function playShowWithDelay(fileUrl, id, bannerImg) {
    hoverTimeout = setTimeout(function() {
      playVideo(fileUrl, id, bannerImg);
    }, 1000);
  }

  function cancelPlayShow() {
    clearTimeout(hoverTimeout);
  }

  function initVideoPlayer(url, id, bannerImg) {
    var videoPlayer = videojs('my_video_' + id);
    videoPlayer.src({
      type: 'application/x-mpegURL',
      src: url
    });
    videoPlayer.muted(true);
    videoPlayer.on('ended', function() {
      $('.my_video .vjs-poster').css({
        'background-image': 'url("' + bannerImg + '")',
        'display': 'block'
      });
    });
    return videoPlayer;
  }

  var activeBannerPlayers = {};


  function playVideo(url, id, bannerImg) {
    if (activeBannerPlayers[id]) {
      pause_vdo(id);
    }
    //setTimeout(() =>{
    if (!activeBannerPlayers[id]) {
      activeBannerPlayers[id] = initVideoPlayer(url, id, bannerImg);
    }
    var videoPlayer = activeBannerPlayers[id];
    if (!videoPlayer.paused()) {
      return;
    }

    //videoPlayer.play();
    var promise = new Promise(function(resolve, reject) {
      try {
        videoPlayer.play();
        videoPlayer.fluid(true);
        resolve(); // Resolve the promise if pause is successful
        $('.volume_banner_dt').show();
      } catch (error) {
        reject(error); // Reject the promise if an error occurs
      }
    });
    promise.then(() => {
      $('.my_video .vjs-poster').css({
        'background-image': 'url("' + bannerImg + '")',
        'display': 'none'
      });
    });
    //},3000 )

  }

  function pause_vdo(id, bannerImg) {
    var videoPlayer = activeBannerPlayers[id];
    if (videoPlayer) {
      var promise = new Promise(function(resolve, reject) {
        try {
          videoPlayer.pause();
          resolve(); // Resolve the promise if pause is successful
          $('.volume_banner_dt').hide();
        } catch (error) {
          reject(error); // Reject the promise if an error occurs
        }
      });
      promise.then(function() {
        $('.my_video .vjs-poster').css({
          'background-image': 'url("' + bannerImg + '")',
          'display': 'block'
        });
      });
      //videoPlayer.posterImage.show();
      //delete activeBannerPlayers[id];
    }

  }

  var drpCount = season.length;


  $(document).ready(function() {
    $(".episodeDrop").select2({
      // placeholder: "Select a programming language",
      allowClear: true,
      minimumResultsForSearch: -1
    });
  });

  function playVideo(url, id, bannerImg) {
    if (activeBannerPlayers[id]) {
      pause_vdo(id);
    }
    //setTimeout(() =>{
    if (!activeBannerPlayers[id]) {
      activeBannerPlayers[id] = initVideoPlayer(url, id, bannerImg);
    }
    var videoPlayer = activeBannerPlayers[id];
    if (!videoPlayer.paused()) {
      return;
    }

    //videoPlayer.play();
    var promise = new Promise(function(resolve, reject) {
      try {
        videoPlayer.play();
        videoPlayer.fluid(true);
        resolve(); // Resolve the promise if pause is successful
        $('.volume_banner_dt').show();
      } catch (error) {
        reject(error); // Reject the promise if an error occurs
      }
    });
    promise.then(() => {
      $('.my_video .vjs-poster').css({
        'background-image': 'url("' + bannerImg + '")',
        'display': 'none'
      });
    });
    //},3000 )

  }

  function pause_vdo(id, bannerImg) {
    var videoPlayer = activeBannerPlayers[id];
    if (videoPlayer) {
      var promise = new Promise(function(resolve, reject) {
        try {
          videoPlayer.pause();
          resolve();
          $('.volume_banner_dt').hide();
        } catch (error) {
          reject(error);
        }
      });
      promise.then(function() {
        $('.my_video .vjs-poster').css({
          'background-image': 'url("' + bannerImg + '")',
          'display': 'block'
        });
      });
      //videoPlayer.posterImage.show();
      //delete activeBannerPlayers[id];
    }

  }


  // $(document).ready(function() {
  //   $(".episodeDrop").select2({
  //     // placeholder: "Select a programming language",
  //     allowClear: true,
  //     minimumResultsForSearch: -1
  //   });
  //   if (drpCount <= 1) {
  //     $('.select2-selection__arrow').css('display', 'none');
  //   }else{
  //     $('.select2-selection__arrow').css('display', 'block');

  //   }

  // });
  // if (drpCount <= 1) {
  //   $('.select2-selection__arrow').css('display', 'none');
  // }else{
  //     $('.select2-selection__arrow').css('display', 'block');

  //   }

  // });

  // jQuery(function() {

  //   var minimized_elements = $('p.descrpition_title_dt');

  //   minimized_elements.each(function() {
  //     var t = $(this).text();
  //     if (t.length < 259) return;

  //     $(this).html(
  //       t.slice(0, 259) + '<span>... </span><a href="#" class="bannerMoreore">View All</a>' +
  //       '<span style="display:none;">' + t.slice(259, t.length) + '<a href="#" class="bannerLess">View Less</a></span>'
  //     );

  //   });

  //   $('a.bannerMoreore', minimized_elements).click(function(event) {
  //     event.preventDefault();
  //     $(this).hide().prev().hide();
  //     $(this).next().show();
  //   });

  //   $('a.bannerLess', minimized_elements).click(function(event) {
  //     event.preventDefault();
  //     $(this).parent().hide().prev().show().prev().show();
  //   });

  // });










  // var request = new Request("<?= base_url('web/Dashboard/ajax_data_details?id=') . $enc_id ?>");
  // var data;
  // var banner = '';
  // var banner_data = '';
  // var generes_data = '';
  // var content_languages = '';
  // var trending = '';


  // caches.open('appCaches').then(async function(cache) {
  //   //cache.delete(request); 
  //   var watchData = '';
  //   var catchData = '';
  //   var countd = '';

  //   var all_data = await cache.match(request);
  //   if (all_data) {
  //     catchData = await all_data.json();
  //   } else {
  //     var all_data = await fetch(request);
  //     catchData = await all_data.json();
  //     cache.put(request, new Response(data));
  //     await cache.put(request, new Response(JSON.stringify(catchData)));
  //   }
  //   renderBanners_data(catchData.content_details.data);
  //   renderrelated_data(catchData.content_details.data);
  //   episode_dt_data(catchData.content_details.data);
  //   console.log(catchData.content_details.data, "catchddata");

  // });
  function formatTimestamp(timestamp) {
    const date = new Date(timestamp * 1000);
    const day = date.getDate();
    const daySuffix = (day) => {
      if (day % 10 === 1 && day !== 11) return `${day}st`;
      if (day % 10 === 2 && day !== 12) return `${day}nd`;
      if (day % 10 === 3 && day !== 13) return `${day}rd`;
      return `${day}th`;
    };
    const dayWithSuffix = daySuffix(day);
    const options = {
      month: "short",
      year: "numeric",
      hour: "numeric",
      minute: "numeric",
      hour12: true
    };
    const formattedDate = date.toLocaleString("en-US", options);
    const [monthDate, time] = formattedDate.split(", ");
    return `${dayWithSuffix} ${monthDate}, ${time}`;
  }

  async function removeDetailCache(profilekey, video_id) {
    try {
      var cache = await caches.open('appCache');
      var cachedResponse = await cache.match(profilekey);
      var newData = [];
      if (cachedResponse) {
        var cachedData = await cachedResponse.json();
        if (video_id != 'all') {
          cachedData.data = cachedData.data.filter(value => value && value.id !== video_id);
          await cache.put(profilekey, new Response(JSON.stringify(cachedData)));
        } else {
          await cache.delete(profilekey);
        }
      }
    } catch (err) {
      console.warn('Error :', err);
    }
  }

function manage_live(renderBanners_datas){
  if(renderBanners_datas.type == 9){
    var data = renderBanners_datas?.season?.[0]?.videos?.[0]??null;
    if(data){
      var currentTime = Math.floor(Date.now()/1000);
      var liveStartTime = data?.live_date_time??null;
      var liveEndTime = data?.live_end_time??null;
      var stillLive = data?.is_live;
      var upcoming = 0;
      var recent = 0;
      var img = null;
      var link = 'javascript:void(0)';
      var buttonText = (data.media_type==1)?listen:watch_app;
      var disableButton = '';
        
       if( (stillLive==1)){
         // if((currentTime > liveStartTime ) && (liveEndTime == 0 || liveEndTime > currentTime) ){
        var livehtml = "<?= $this->lang->line("Live") ?>";
        stillLive = 1;
        img =`<div class="live_upcoming"> <div class="live_up_lang"><span></span><p class="mb-0">${livehtml}</p></div></div>`;
        // if(data.enc_id){
        //   link = 'live?id='+data.enc_id;
        // }else{
          link = 'live?id=<?=$enc_id?>';
        // }
        if(liveEndTime > 0){
          var refresh = (liveEndTime-currentTime)*1000;
        }else{
          var refresh = 300000;
        }
        // setTimeout(async () => {
        //   await removeDetailCache('contentDetail',renderBanners_datas.id);
        //   manageContentDetail(renderBanners_datas.id)
        // }, (refresh));
      }else if( (stillLive==0)){
        upcoming = 1;
        // if(data.enc_id){
        //   link = 'play-episode?id='+data.enc_id;
        // }else{
        disableButton = 'disabled';
        var upcominghtml = "<?= $this->lang->line("upcoming") ?>";
        img = `<div class="live_upcoming"> <div class="live_up_lang"><p class="mb-0">${upcominghtml}</p></div></div>`;
        var Datetime = formatTimestamp(liveStartTime);
        buttonText =  "<?= $this->lang->line("began_on") ?>"+" " +Datetime;
        // setTimeout(async () => {
        //   await removeDetailCache('contentDetail',renderBanners_datas.id);
        //   manageContentDetail(renderBanners_datas.id)
        // }, (liveStartTime-currentTime)*1000);
      }else if((currentTime > liveStartTime) && (liveEndTime < currentTime) || (stillLive == 2 || stillLive == 3)){
        recent = 1;
        // if(data.enc_id){
        //   link = 'play-episode?id='+data.enc_id;
        // }else{
          link = 'play-episode?id=<?=$enc_id?>'+'&play-video=' + lastPart;
        // }
      }
      if( stillLive == 4){
        removeDetailCache('contentDetail',renderBanners_datas.id);
        var upcominghtml = "<?= $this->lang->line("upcoming") ?>";
        var Datetime = formatTimestamp(liveStartTime);
        buttonText =  "<?= $this->lang->line("since_text") ?>"+" " +Datetime;
        img = '';//`<div class="live_upcoming"> <div class="live_up_lang"><p class="mb-0">${upcominghtml}</p></div></div>`;
    //    disableButton = ' ';
    dis = '';
      //  buttonText = " <?= $this->lang->line("live_event_not") ?>";
        // setTimeout(async () => {
        //   manageContentDetail(renderBanners_datas.id)
        // }, 300*1000);
      }
      var response = {
          img,
          link,
          buttonText,
          disableButton
      }
      return response;
    }else{
      return null;
    }
  }
}

 var des_gener='';

  async function renderBanners_data(renderBanners_datas) {
    if(Object.keys(renderBanners_datas).length <= 2){
      window.location.href = "<?= base_url('no-data') ?>";
    }
    $('#detail_banner').html('');
    des_gener = renderBanners_datas.genres;
    paid = renderBanners_datas.is_paid;
    type_med = renderBanners_datas.type;
    // console.log(paid);
    var ban = '<?= $banners ?>';
    var n_type = '<?= $n_type ?>';
    var publisher_id = renderBanners_datas.publisher_id;
    var publisher_name = renderBanners_datas.publisher_name;
    var pid_name = '';
    title = renderBanners_datas.title;
    if (publisher_name != "" && publisher_name !=null ) {
      pid_name =  publisher_id + '/' + publisher_name;
    }
    var pid_names=(pid_name)?pid_name:'0/Null';
    _paq.push(['setCustomDimension', 6, pid_names ]);

    // if (ban == 'banners' && showID != '' && showID != 'null') {
    //   // matomo('Banner', 'Select', showID + '/' + title);
    //   queueTrackingDataWithDelay('trackEvent', ["Banner", 'Select', showID + '/' + title],0);
    //   queueTrackingDataWithDelay('trackContentInteraction', ["Banner/Select", showID + "/" + title, "-"], 100);
    //   queueTrackingDataWithDelay('trackContentImpression', [showID + "/" + title, "-"], 200);
    // }
    var media_type = (type_med==0)?'Video':"Audio";
    if(type_med == 9){
      await removeDetailCache('contentDetail',renderBanners_datas.id);
      media_type = 'LiveEvents';
    }
    // console.log(media_type,'media_type');
    if (n_type == 'notification' && showID != '' && showID != 'null') {
      // matomo('Notification', 'Select', showID + '/' + title);
      queueTrackingDataWithDelay('trackEvent', ["NotificationListing", 'Select', showID + '/' + title],0);
      queueTrackingDataWithDelay('trackContentInteraction', ["NotificationListing/Select", showID + "/" + title,media_type], 100);
      queueTrackingDataWithDelay('trackContentImpression', [showID + "/" + title,media_type], 200);
    }
    if (showID != '' && showID != 'null' && showID != 'undefined') {
      if (paid == 0) {
        ManageViewEvent(showID,title,des_gener,pid_name,'(VOD)',0);
      } else if (paid == 1) {
        ManageViewEvent(showID,title,des_gener,pid_name,'(SVOD)',1);
      } else if (paid == 2) {
        ManageViewEvent(showID,title,des_gener,pid_name,'(TVOD)',2);
      }

    }
    // var rating_json = JSON.parse(renderBanners_datas.rating_json);
    // console.log(rating_json,'rating_json');
    // console.log(rating_json.imdb_data,'rating_json');
    var protocol = window.location.protocol;
    var host = window.location.host;
    var path = window.location.pathname;

    var currentUrl = 'http<?= isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '' ?>://' + '<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>';


    // Loop through each item in renderBanners_datas (if necessary)
    // renderBanners_datas.forEach(function(item) {

    // Fixing the template string
    var  similar_to = getQueryParam('similar') || 'NA';
        if(similar_to !='NA'){
          _paq.push(['setCustomDimension', 4, similar_to ]);
          var search_jao = similar_to;
          //console.log(search_jao);
        }
        else{
          var search_jao = '';
        }
       
        if (renderBanners_datas.hasOwnProperty('owned_by')) {
                                    if (renderBanners_datas.owned_by > 0) {                                    
                                        const validSubscriptions = "<?= json_encode(SUBSCRIBEUSER)?>";
                                        if (typeof validSubscriptions !== 'undefined') {
                                        if (validSubscriptions.includes(renderBanners_datas.owned_by)) {
                                            isSubscribed = 1;  
                                        }else{
                                        isSubscribed = 0;  
                                       }  
                                      }else{
                                        isSubscribed = 0;
                                      }
                                } 
                               }
                               var playbtn = "<?= base_url('assets/images/playBtn.png') ?>";

      var session_id = '<?= isset($_SESSION['id']) ?? '' ?>';
      if ((isSubscribed != 1) && (renderBanners_datas.is_paid != 0 && renderBanners_datas.is_paid != 2) && (sess_id !== "")) {
        if(renderBanners_datas.owned_by==0){
          var message =  (renderBanners_datas.type != 1) ?  subscribe_watch: subscribe_listen;
        }else{
          var message =  (renderBanners_datas.type != 1) ?  subscribe_watch+' '+renderBanners_datas.publisher_name : subscribe_listen+' '+renderBanners_datas.publisher_name;
          message = (renderBanners_datas.publisher_name ) ? `<p class="mb-0 rent_height ret_wat">${message}</p>`:message;      var siturl = '<?= site_url('play-video?id=' . $id) ?>';
        }
      } else if ((isSubscribed != 1) && (renderBanners_datas.is_paid != 0 && renderBanners_datas.is_paid != 2) && (sess_id == "")) {
        if(renderBanners_datas.owned_by==0){
          var message =  (renderBanners_datas.type != 1) ?  subscribe_watch: subscribe_listen;
        }else{
          var message =  (renderBanners_datas.type != 1) ?  subscribe_watch+' '+renderBanners_datas.publisher_name : subscribe_listen+' '+renderBanners_datas.publisher_name;
          message = (renderBanners_datas.publisher_name ) ? `<p class="mb-0 rent_height ret_wat">${message}</p>`:message;      var siturl = '<?= site_url('play-video?id=' . $id) ?>';
        }
     
      } else if ((renderBanners_datas.is_paid == 2)) {
      if (renderBanners_datas.is_rented == 1) {

        var message = (renderBanners_datas.type != 1) ? "<?= $this->lang->line('LoginToWatch') ?>" : "<?= $this->lang->line('ListenToWatch') ?>";
        var siturl1 = '<?= site_url('play-episode?id=' . $id) . '&play-video='  ?>' +lastPart+ '&similar=' + encodeURIComponent(search_jao);
      } else {
        playbtn = "<?= base_url('assets/images/vector.svg') ?>";
        var message = (renderBanners_datas.type != 1) ? available_to_rent : available_to_rent;
      }
      var discountRate = "<?= $tvod_discount ?>";
      var pricingId = renderBanners_datas.pricing.pricing_id;
      var show_id = renderBanners_datas.pricing.id;
      var PlanId = renderBanners_datas.pricing.plan_id;
      var gst_amount = renderBanners_datas.pricing.gst_amount;
      var s_price = renderBanners_datas.pricing.s_price;
      var s_price_num = parseFloat(s_price);
      var gst_amount_num = parseFloat(gst_amount);
      var disc_payable_amount = 0;
      if(discountRate > 0){
        var disc_s_price = (s_price - (s_price*discountRate)/100);
        var disc_gst_amount = (gst_amount - (gst_amount*discountRate)/100);
        disc_payable_amount = (disc_s_price+disc_gst_amount);
      }
      var payable_amount = (s_price_num + gst_amount);
      var mrp = renderBanners_datas.pricing.mrp;
      var validity = renderBanners_datas.pricing.validity;
      var siturl = '<?= site_url('play-video?id=' . $id) ?>';
      var siturl1 = '<?= site_url('play-episode?id=' . $id) . '&play-video='  ?>' +lastPart+ '&similar=' + encodeURIComponent(search_jao);
      if ((renderBanners_datas.is_paid == 2) && (session_id == "")) {
        playbtn = "<?= base_url('assets/images/vector.svg') ?>";
        var message = (renderBanners_datas.type != 1) ? available_to_rent : available_to_rent;
        playbtn = "<?= base_url('assets/images/vector.svg') ?>";
        var siturl1 = '<?= site_url('play-episode?id=' . $id) . '&play-video=' ?>' +lastPart+ '&similar=' + encodeURIComponent(search_jao);
      }
    } else if ((renderBanners_datas.is_paid == 2) && (session_id == "")) {
      playbtn = "<?= base_url('assets/images/vector.svg') ?>";
      var message = (renderBanners_datas.type != 1) ? available_to_rent : available_to_rent;
      var siturl1 = '<?= site_url('user-login') ?>';
    } else {
      var siturl = '<?= site_url('play-video?id=' . $id) ?>';
      var siturl1 = '<?= site_url('play-episode?id=' . $id) . '&play-video=' ?>' +lastPart+'&similar=' + encodeURIComponent(search_jao);
      var message = (renderBanners_datas.type != 1) ? "<?= $this->lang->line('LoginToWatch') ?>" : "<?= $this->lang->line('ListenToWatch') ?>";
      var inContinueWatch = await checkElementInLocalCache(renderBanners_datas.id, cacheKey);
      if(inContinueWatch){
        let ep_id = await aes_cbc_encryption_(inContinueWatch);
        message = "<?= !empty($this->lang->line('resume_now'))?$this->lang->line('resume_now'):'Resume Now' ?>";
        siturl1 = base_url+'play-media?id='+ep_id+'&play-video='+lastPart+'&similar=' + encodeURIComponent(search_jao);
      }      
    }
    if ((renderBanners_datas.is_paid == 1) && (isSubscribed != 1)) {
      var siturl1 = '<?= site_url('subscription?type=details&publisherid=') ?>'+renderBanners_datas.owned_by;

    }

    var cat_tit = renderBanners_datas.category_title ? renderBanners_datas.category_title + ' | ' : '';
    var geners = renderBanners_datas.genres ? renderBanners_datas.genres.replace(/,/g, ' | ') : '';
    const limitedCategoriess = geners.split('|').map(item => item.trim()).slice(0, 3).join(' | ');
    const limitedCategories=  renderBanners_datas.genres ? renderBanners_datas.genres.replace(/,/g, ' | ') : '';
    renderBanners_datas.detail_banner = renderBanners_datas.detail_banner ? renderBanners_datas.detail_banner : '<?= base_url(BannerPlaceholder) ?>';
    var ban = 'd-none'; var dis ='disabled';var imgdn='d-none';var hidetag = 'd-none';
 

    if(renderBanners_datas.type != 9){
      imgdn ='';
    ban='volume_banner_dt';
    dis = '';
    hidetag = '';
    }
    var upcoming = "<?=UPCOMINGEVENT?>";
    if (renderBanners_datas.type == 9) {
      var data = manage_live(renderBanners_datas);
      message = data.buttonText;
      siturl1 = '<?= site_url() ?>'+data.link;
      upcoming = data.img;
      dis = data.disableButton;
    }
    if(renderBanners_datas.skip_season ==0){
  if (renderBanners_datas.season[0].assets.length > 0) {
    let titleImg =  renderBanners_datas.banner_icon ;
    let bannerImg = renderBanners_datas.detail_banner; 

    renderBanners_datas.season[0].assets.forEach((sitem) => {
    if (sitem.platform === 'WEB' && sitem.img_type === 'TitleLogo') {
    if (sitem.img_url.length > 0) {
    titleImg = sitem.img_url; // Assign if there's an image URL
    }
    }
    if (sitem.platform === 'WEB' && sitem.img_type === 'BannerNoTitle') {
    if (sitem.img_url.length > 0) {
    bannerImg = sitem.img_url; // Assign if there's an image URL
    }
    }
    });
    renderBanners_datas.banner_icon = titleImg;
    renderBanners_datas.detail_banner = bannerImg;
   
    }
  }
var upcominghtml = "<?= $this->lang->line("upcoming") ?>";
     var detailBanner = `
    <section class="banner_after_navbar cateaogry_banner cat-bann-dtf">
      <div class="banner-place" style="display:none;">
        <div class="portrait_loaders">
          <div class="banner_img">
            <img src="<?= base_url('assets/images/loader_with_banner.gif'); ?>" class="img-fluid" alt="Loader">
          </div>
        </div>
      </div>
      <div class="item video_play banner_load_af" data-url="${renderBanners_datas.file_url}" data-id="${renderBanners_datas.id}">
        <div class="w-100">
          <div class="img_cara responsive_banner ">
            <div class="row m-0">
              <div class="col-lg-12 col-sm-12 p-0 col-title_img">
                <div class="banner-position hlsBanner cathslbn play_hover_video ${renderBanners_datas.file_url ? ' play_hover_video2' : ''}" data-id="${renderBanners_datas.id}" data-title="${renderBanners_datas.title}" data-type="${renderBanners_datas.type}" data-url="${renderBanners_datas.file_url}" data-banner="${renderBanners_datas.detail_banner}" data-is_paid="${renderBanners_datas.is_paid}" data-isdrm="${renderBanners_datas.is_drm_protected}" data-vdcid="${renderBanners_datas.vdc_id}" data-trailer="${renderBanners_datas.season[0]['id']}" data-mediaid="${renderBanners_datas.media_id??renderBanners_datas.id}" data-owned_by="${renderBanners_datas.owned_by??renderBanners_datas.owned_by}" data-content_id="${renderBanners_datas.contentId??renderBanners_datas.contentId}" data-access_key="${renderBanners_datas.access_key??renderBanners_datas.access_key}">`;
                if(renderBanners_datas.type == 9){
                  if(upcoming){
                    detailBanner+=upcoming;
                  }
                }
                detailBanner+=`<div class="${ban}" >
        <div class="tooltip-text" id="mute-tooltip-${renderBanners_datas.id}" tooltip="<?= $this->lang->line("unmute-tra") ?>">
                    <a href="javascript:void(0);" data-valumeType="banner" class="banner_volume ban-vol-btn" data-id="${renderBanners_datas.id}"><img id="mute-icon-${renderBanners_datas.id}" src="<?= base_url('assets/images/mute.svg') ?>" class="img-fluid "></a></div></div>
                  <div class="content_banner_dt col_768_after_display_none disply_768 cat-nob-gh">
                    <div class="conten_holder bnnr_content">`;
                    if(renderBanners_datas.owned_by>0)
                   detailBanner += `<div class="categry_tti_img">
                    <img src="${renderBanners_datas.publisher_logo??''}" class="img-fluid" alt="title">
                    </div>`;
                    // ${hidetag}
                    detailBanner +=`<div class="bannerSubImg  ${renderBanners_datas.banner_icon ? "" : 'bannertitle'}">
                        ${renderBanners_datas.banner_icon ?  `<img src="${renderBanners_datas.banner_icon}" class="img-fluid banner_img">`  : ` <h2 class="banner-tt_details">${renderBanners_datas.title}</h2>`}
                      </div>

                      <p class="description_dt ml23 d-flex ml25 mb-1 align-items-center ">`;
                      var options = [];
                      if(renderBanners_datas.type == 9 && false){
                        
                        var data = renderBanners_datas?.season?.[0]?.videos?.[0]??null;
                        var date = new Date(data.live_date_time * 1000);                 
                               var day = date.getDate();
                        var hour = date.getHours() % 12 || 12; // Convert to 12-hour format
                        var period = date.getHours() >= 12 ? "PM" : "AM"; 
                        var year = date.getFullYear(); 
                        var formattedDate = `${hour}${period}${day}`;
                        //detailBanner +=hour+period+' <span class="dotspan">&#9679;</span> ' +year;
                        if(hour){
                          options.push(hour+period);
                        }
                        // if((renderBanners_datas.language_title != ''&& renderBanners_datas.language_title != null) ){
                        //   detailBanner += ' <span class="dotspan">&#9679;</span>' ;

                        // }
                        if(year){
                          options.push(year);
                        }
                     }
    if (renderBanners_datas.type != 9 && renderBanners_datas.released_on != null && renderBanners_datas.released_on != '' && renderBanners_datas.released_on !="0" && false) {
      // detailBanner += `${renderBanners_datas.released_on ?? ''}
                          // <span class="dotspan">&#9679;</span>`;
        if(renderBanners_datas.released_on){
          options.push(renderBanners_datas.released_on);
        }
    }

    if ((renderBanners_datas.video_time > 0) && (renderBanners_datas.skip_season == 1)) {
      // detailBanner += `${renderBanners_datas.video_time ? calculateTimeLeft(renderBanners_datas.video_time) : ''}
                          // <span class="dotspan">&#9679;</span>`;
        if(renderBanners_datas.video_time){
          options.push(calculateTimeLeft(renderBanners_datas.video_time));
        }
    } else if (renderBanners_datas.skip_season != 1) {
      if (renderBanners_datas.season_count == 1) {
        // detailBanner += `${renderBanners_datas.season_count + ' Season'}
                          // <span class="dotspan">&#9679;</span>`;
        if(renderBanners_datas.season_count){
          options.push((renderBanners_datas.season_count + ' Season'));
        }
      } else if (renderBanners_datas.season_count > 1) {
        // detailBanner += `${renderBanners_datas.season_count + ' Seasons'}
                          // <span class="dotspan">&#9679;</span>`;
        if(renderBanners_datas.season_count){
          options.push((renderBanners_datas.season_count + ' Seasons'));
        }
      }
    }

    if(options && options.length > 0){
      detailBanner += options.join(' ● ');
    }

    if (renderBanners_datas.language_title != '') {
      if(options && options.length > 0){
        detailBanner += `<span class="dotspan">&#9679;</span>`;
      }
      detailBanner += `<span id="langSpann">${renderBanners_datas.language_title ?? ''}</span>`;
    }
    var descriptions = '';
    if (renderBanners_datas.skip_season === 0 &&renderBanners_datas.season[0].description!= null && renderBanners_datas.season[0].description.length > 0) {
      if (Array.isArray(renderBanners_datas.season[0].description)) {
    const sessionDescription = renderBanners_datas.season[0].description.find(desc => desc.language === "English");
    if (sessionDescription) {
    descriptions = sessionDescription.content;
    }
    if (lang_title) {
    const sessionDescription = renderBanners_datas.season[0].description.find(desc => desc.language === lang_title);
    if (sessionDescription) {
    descriptions = sessionDescription.content;
    }
    }
    }
    }
    if (Array.isArray(renderBanners_datas.description)) {
      const sessionDescription = renderBanners_datas.description.find(desc => desc.language === "English");
      if (sessionDescription) {
        descriptions = sessionDescription.content;
      }
      if (lang_title) {
        const sessionDescription = renderBanners_datas.description.find(desc => desc.language === lang_title);
        if (sessionDescription) {
          descriptions = sessionDescription.content;
        }
      }
    }


    // detailBanner += renderBanners_datas.certificate ? `<span class="ua_16 ua-banner">${renderBanners_datas.certificate}</span>` : '';
    // detailBanner += renderBanners_datas.is_imdb ? `<span class="imd_image_banner">
    //     <img src="<?= base_url('assets/images/imd_banne_img.svg'); ?>" class="imd_banner_imgs" alt="IMD banner image">
    // </span>
    // <span class="imd_rating ua-banner">${renderBanners_datas.rating_json.imdb_data}</span>`:'';
    // detailBanner +=  (renderBanners_datas.is_imdb!=1 && renderBanners_datas.is_rottentomato ==1)? `<span class="imd_image_banner">
    //     <img src="<?= base_url('assets/images/Rotten_Tomatoes.svg'); ?>" class="imd_banner_imgs" alt="IMD banner image">
    // </span>
    // <span class="imd_rating ua-banner">${renderBanners_datas.rating_json.rotten_data}</span>`:'';
    var stringa = JSON.stringify(renderBanners_datas.rating_json);
    var check_imdb = JSON.parse(stringa);
    detailBanner += renderBanners_datas.certificate && renderBanners_datas.type !=9 ?
      ' <span class="dotspan">●</span><span class="ua_16 ua-banner">' + renderBanners_datas.certificate+((renderBanners_datas.age > 0)?(' '+renderBanners_datas.age+'+'):'') + '</span>' : '';
    if (check_imdb && check_imdb.length >= 2) {
      if (check_imdb[0] && check_imdb[0].agency) {
        // if (!renderBanners_datas.certificate || renderBanners_datas.certificate.length == 0) {
        //   detailBanner += '<span class="dotspan">●</span>';
        // }
        detailBanner +=
          '<span class="dotspan">●</span><span class="imd_image_banner"><img src="<?= base_url("assets/images/imd_banne_img.svg"); ?>" class="imd_banne_imgs" alt="imd_banne_img"></span>' +
          '<span class="imd_rating ua-banner">' + (check_imdb[0].rating ? check_imdb[0].rating : '') + '</span>';
      } else if (!check_imdb[0].agency && check_imdb[1].agency) {
        // if (!renderBanners_datas.certificate || (renderBanners_datas.certificate.length == 0 && check_imdb[0].agency.length === 0)) {
        //    detailBanner += '<span class="dotspan">●</span>';
        // }
        detailBanner +=
          '<span class="dotspan">●</span><span class="imd_image_banner"><img src="<?= base_url("assets/images/Rotten_Tomatoes.svg"); ?>" class="imd_banne_imgs" alt="imd_banne_img"></span>' +
          '<span class="imd_rating ua-banner">' + (check_imdb[1].rating ? check_imdb[1].rating + "%" : '') + '</span>';
      }
    } else {
      var rating_icons = '';
      var rating_value = '';
      if (check_imdb && check_imdb.length >0) {
      if (check_imdb[0] && check_imdb[0].agency == 'Rotten Tomatoes' ||check_imdb[0].agency == 'Rotten Tomato' ) {
        rating_value = check_imdb[0].rating + "%";
        rating_icons = "<?= base_url("assets/images/Rotten_Tomatoes.svg"); ?>";
      } else {
        rating_value = check_imdb[0].rating;
        rating_icons = "<?= base_url("assets/images/imd_banne_img.svg"); ?>";
      }

      if (check_imdb[0] && check_imdb[0].agency) {
        // if (!renderBanners_datas.certificate || renderBanners_datas.certificate.length == 0) {
        //   detailBanner += '<span class="dotspan">●</span>';
        // }
        detailBanner +=
          '<span class="dotspan">●</span><span class="imd_image_banner"><img src="' + rating_icons + '" class="imd_banne_imgs" alt="imd_banne_img"></span>' +
          '<span class="imd_rating ua-banner">' + (check_imdb[0].rating ? rating_value : '') + '</span>';
      }
    }
    }

    detailBanner += `</p>
                      <p class="descrpition_title_dt">${descriptions ?? ''}
                      </p>
                      <div class="d-flex align-items-center">
                        <p class="pb_ban_action me-1">${limitedCategories}</p>
                      </div>
                    </div>
                    <div class="home_bnnr_btn cat-home_nabb">
                      <div class="banner-playe ban-catply ban_playes d-flex align-items-center py-1 w-100">
                  <button class="bnnr_play_btn bnner_play_color bannerPlayBtn" ${renderBanners_datas?.season?.[0]?.videos?.[0].is_live ==0 && renderBanners_datas.type == 9?'disabled':''} onclick="if (${renderBanners_datas.is_paid} === 2 && ${renderBanners_datas.is_rented} != 1 && ${session_id !=""} ) { openModal('${pricingId}','${PlanId}','${gst_amount}','${s_price}','${mrp}','${validity}','${renderBanners_datas.title.replace("'"," ")}','${disc_payable_amount}'); } else { sinceyet('${siturl1}','${renderBanners_datas?.season?.[0]?.videos?.[0].is_live??0}','${renderBanners_datas.type}') }">
                        ${renderBanners_datas.is_paid == 2 ? `<img class="img-fluid ${imgdn}" src="${playbtn}">` : `<img class="img-fluid  ${imgdn}" src="${playbtn}">`}
                        ${(renderBanners_datas.is_paid == 2 && renderBanners_datas.is_rented != 1 ) ? `<p class="mb-0 rent_height">${message}<br>₹ ${(disc_payable_amount > 0)?disc_payable_amount+'&nbsp;&nbsp;<del>'+payable_amount+'</del>':payable_amount}</p>` : message}

                       
                        </button>
                        <div class="play_ep_btnn play_epsode_btn shv_dts d-flex">`;

   if (session_id && renderBanners_datas.type != 9) {

      detailBanner += `<div class="ms-3 wt-add tooltip-text watc_pb" id="watchlist_toggle">
                        </div>
                        <div class="share_hl tooltip-text ms-3 me-3 shv_nn" tooltip="<?= $this->lang->line('share'); ?>">
                          <span class="shareHls shv_nn">
                              <a href="javascript:void(0)">
                                  <img src="<?= base_url('assets/images/shareNew.svg') ?>" id="shareHls" class="img-fluid">
                              </a>
                          </span>
                          <div class="share_hl_popup d-none">
                              <form class="mb-0">
                                  <div class="share_bg">
                                      <div class="form-group mb-0 w-100 position-relative">
                                          <img src="<?= base_url('assets/images/copy_img.svg') ?>" alt="copy" class="img-fluid copy_share" style="margin-top:2px; height:18px !important">
                                          
                                          <input type="text" class="form-control shadow-none share_input" name="inputText" id="inputText" value="${currentUrl}" placeholder="Link Address" readonly>
                                      </div>
                                      <a class="b_t_n b_t_n2 bg_btn_color" id="copyBtn" href="javascript:void(0)" onclick="copy_link()" style="color:#fff !important;background: var(--pbg);"><?= $this->lang->line('copy') ?></a>
                                  </div>
                              </form>
                          </div>
                        </div>
                        <div class="lik-posetin">
                        <span class="share_btn_icon disLike position-relative" id="likeSection">
                            <a href="javascript:void(0)" class="like-btn">
                                <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislikelike" class="img-fluid likeSlect like-img <?= !empty($rating) ? 'd-none' : ''; ?>">
                                <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid likeSlectSen like-img <?= ($rating == 'dislike' || $rating == '') ? 'd-none' : ''; ?>">
                                <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid <?= ($rating == 'like' || $rating == '') ? 'd-none' : ''; ?> dislikeSlect like-img">
                            </a>
                        </span>
                        <div class="likeDislike d-none">
                            <a class="likethis" href="javascript:void(0)" onclick="manage_like('likeSlectSen','like')">
                                <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislike" class="img-fluid to-like not-bg <?= ($rating == 'like') ? 'd-none' : ''; ?>">
                                <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid to-like with-bg <?= ($rating != 'like') ? 'd-none' : ''; ?>">
                                <p class="m-0"><?= $this->lang->line('like_it'); ?></p>
                            </a>
                            <a class="notLike" href="javascript:void(0)" onclick="manage_like('dislikeSlect','dislike')">
                                <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislike" class="img-fluid to-dislike not-bg <?= ($rating == 'dislike') ? 'd-none' : ''; ?>">
                                <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid to-dislike with-bg <?= ($rating != 'dislike') ? 'd-none' : ''; ?>">
                                <p class="m-0"><?= $this->lang->line('not_for_me'); ?></p>
                            </a>
                        </div></div>`;
    } else {
      if(renderBanners_datas.type != 9){
      detailBanner += `<div class="share_hl tooltip-text ms-3" tooltip="<?= $this->lang->line('share'); ?>">
                        <span class="shareHls">
                            <a href="javascript:void(0)">
                                <img src="<?= base_url('assets/images/shareNew.svg') ?>" id="shareHls" class="img-fluid" alt="share">
                            </a>
                        </span>
                        <div class="share_hl_popup d-none">
                            <form class="mb-0">
                                <div class="share_bg">
                                    <div class="form-group mb-0 w-100 position-relative">
                                        <img src="<?= base_url('assets/images/copy_img.svg') ?>" alt="copy" class="img-fluid copy_share" style=" height:18px !important">

                                        <input type="text" class="form-control shadow-none share_input" name="inputText" id="inputText" value="${currentUrl}" placeholder="Link Address" readonly>
                                    </div>
                                    <a class="b_t_n b_t_n2 bg_btn_color" id="copyBtn"  onclick="copy_link()" href="javascript:void(0)" style="color:#fff !important;background: var(--pbg);"><?= $this->lang->line('copy') ?></a>
                                </div>
                            </form>
                        </div>
                    </div>`
   }
  }
    detailBanner += `</div>
  
                    </div>
                 
                  <p class="mt-3 mb-0 rent_txt" ${renderBanners_datas.is_paid == 2  ? '' : 'style="display: none;"'}>
                      Rental include ${validity} days to watch this content from the day of purchase
                  </p>
                  </div>
                  </div>
                  <p class="c_over col_768_after_display_none ">&nbsp;</p>
                  <p class="c_over_bott c_over_bott_dt mb-0">&nbsp;</p>
                  <div id="hlsImg">
                    ${renderBanners_datas.file_url ? `<div class="hlsVideo" data-vjs-player>
                                      <video id="my_video_${renderBanners_datas.id}" width="1920" height="1080" class="my_video" disablePictureInPicture poster="${renderBanners_datas.detail_banner}" preload="auto"></video>
                                   </div>` : `<img src="${renderBanners_datas.detail_banner}" class="img-fluid banner_img hl_img" alt="banners_details">`}
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>`;
    // Append detailBanner to the element with id 'detail_banner'
// console.log(detailBanner,'detailBanner');
    $('#detail_banner').append(detailBanner);
    // End of loop
    // });

    $(document).on('click', function(event) {
      if ((!$(event.target).closest('.shareHls').length) && (!$(event.target).closest('.share_hl_popup').length)) {

        // if (!$('.share_hl_popup').hasClass('d-none')) {
        $('.share_hl_popup').addClass('d-none');
        $('#copyBtn').html("<?= $this->lang->line('copy') ?>");
        // }
      }
      //$(".share_hl_popup").addClass("d-none");
    });
    muteunmute(1);
    if ("<?= $this->session->profile_id ?? 0 ?>") {
      checkWatchlist();
    }
    // $(".shareHls").click(function() {
    //   $(".share_hl_popup").toggleClass("d-none");
    // })
    // $(".shareHls").click(function() {
    //   $(".share_hl_popup").toggleClass("d-none");
    //   $('.share_hl').attr('tooltip', '');
    // });
    $(".shareHls").click(function() {
      //var id = $(this).data('id');
      var tooltipElement = $(".share_hl_popup");

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


    $(document).ready(function() {

      $('#sendBtn').click(function() {
        var comment = $('#message').val();
        var selectedRating = $('.rating_commemt-img.active p').text();
        var type_id = 2;
        var id = showID;

        $.ajax({
          url: '<?= base_url('/web/dashboard/user_coment'); ?>', // Replace with your actual AJAX endpoint URL
          type: 'POST',
          data: {
            comment: comment,
            rating: selectedRating,
            type_id: type_id,
            id: id

          },
          success: function(response) {

            setTimeout(function() {
              $('#comment_sec').hide();
              window.location.reload(true);
            }, 1000);
          },
          error: function(error) {
            // Handle errors (if any)
            console.error('Error:', error);
          }
        });
      });
    });
  }
  function copy_link() {
    var copybtn = "<?= $this->lang->line('copied') ?>";
    var copyButton = $('#copyBtn');
    var geners= des_gener; 
    var titlem ='';   
    titlem = showID + '/' + title;
    // console.log(type_med);
    if (titlem) {
      var media_type = (type_med==0)?'Video':"Audio";
    if(type_med == 9){
      media_type = 'LiveEvents';
    }
      if (type_med == 0) {
      ManageShareEvent(titlem,geners,media_type);        
      } else {
      ManageShareEvent(titlem,geners,media_type);        
      }
    }
    var copyText = $("#inputText");
    copyText.val();
    navigator.clipboard.writeText(copyText.val());
    // console.log(copyText)
    // Copy the selected text to clipboard
    document.execCommand('copy');
    $('#copyBtn').html(copybtn);
    $('.bg_btn_color').addClass('copy_share_btn');
    setTimeout(function() {
      copyButton.html('<?= $this->lang->line('copy') ?>'); // Change 'Copy' to the original text you want to display
      $('.bg_btn_color').removeClass('copy_share_btn');
    }, 2000);

    // $("#share_btn").modal('hide');
    //location.reload();
    // Deselect the text
    //window.getSelection().removeAllRanges();
  };

  function manage_like(type, action) {
    var titles ='';
   titles = showID + '/' + title ;
    var rate = media_type;

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
    if (titles) {
      var media_type = (type_med==0)?'Video':"Audio";
    if(type_med == 9){
      media_type = 'LiveEvents';
    }
      // matomo('Rate', 'View', titles);
      if (type_med != 0) {
         ManageLikeEvent(actions,titles,des_gener,media_type);
      } else {
         ManageLikeEvent(actions,titles,des_gener,media_type);
      }

    }
    titles = '';
    if (action == '') {
      updateRatingCache(ratingKey, data, 3);
    } else {
      updateRatingCache(ratingKey, data);
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
      queueTrackingDataWithDelay('trackEvent', ["Rate"+type, actions, titles],100);
      queueTrackingDataWithDelay('trackContentInteraction', [type+ '/'+actions , titles, des_gener],200);
      queueTrackingDataWithDelay('trackContentImpression', [titles, des_gener],300);
      titles = '';
  }

  function calculateTimeLeft(seconds) {
    let hours = Math.floor(seconds / 3600);
    let remainingSeconds = seconds % 3600;
    let minutes = Math.floor(remainingSeconds / 60);

    if (hours >= 1) {
      if(minutes > 0){
        return `${hours}h ${minutes}m`;
      }else{
        return `${hours}h`;
      }
    } else if (seconds > 0 && minutes == 0) {
      return "1m";
    } else {
      minutes = Math.max(0, parseInt(minutes)); // Ensure minutes is non-negative
      return `${minutes}m`;
    }
  }

  async function renderrelated_data(renderrelated_datas) {
    // console.log(renderrelated_datas.type,'renderrelated_datas');
      var renderrelated_datas1 = renderrelated_datas.related.filter(item => {
      return item.type === renderrelated_datas.type;
    });
    //  console.log(renderrelated_datas1,'renderrelated_dassstas');
    var detailBanners = '';
    if (renderrelated_datas.type == 0 && renderrelated_datas.skip_season == 1 && renderrelated_datas.season.length > 0 && renderrelated_datas.season[0].artist.length > 0 && renderrelated_datas.type !=9) {

      detailBanners += '<div class="artistSec artist_dt_pb">' +
        '<p class="episodeCast_headding mt-3"><?= $this->lang->line('cast_crew') ?></p>' +
        '<div class="artistList">';
      renderrelated_datas.season[0].artist.forEach(function(art, index) {
        var artist_img = (art.profile_image) ? art.profile_image : '<?= base_url('assets/images/placholder-img1.png'); ?>';
        detailBanners += '<div class="artistDetail mb-2">' +
          '<img class="img-fluid" src="' + artist_img + '">' +
          '<p>' + art.artists_name + '</p>' +
          '</div>';
      });
      detailBanners += '</div>' +
        '</div>' ;
        if (renderrelated_datas1.length > 0 && renderrelated_datas.type !=9) {
         detailBanners +='<div class="seasionBor"></div>';
        }
    }
  
    if (renderrelated_datas1.length > 0 && renderrelated_datas.type !=9) {
      detailBanners += `
        <section class="mb-5 mt-3 viewAllSection">
            <div class="container-fluid">
                <div class="row mt-1">
                    <h6 class="defaultColr mt-1 mb-4 ms-3 pl_5 delayed-element con-lg" style="z-index:1"><?= $this->lang->line('similar_to_this') ?></h6>
                </div>

                <div class="carousel_bott4 owl-carousel owl-theme banner_load_af simil_car"></div>
            </div>
        </section>`;
    }
    //console.log(detailBanners, "Details Banners");

    // Append detailBanners to the element with id 'related_details'
    $('#related_details').append(detailBanners);
    //console.log(detailBanners, "Details Banners");

    // Assuming you have related data in renderrelated_datas.related
    var relatedData = renderrelated_datas1;//renderrelated_datas.related;
    var watchData = await fetchCacheData("<?= $this->session->profile_id . '-watchList' ?>");

    if (watchData && watchData.data && watchData.data.length > 0) {
      watchData = watchData.data;
    } else {
      watchData = [];
    }
    // Construct HTML for each related item
    var relatedItemsHtml = relatedData.map(function(data) {
      var id = data.id;
      var html = '';
      var enc_id = data.enc_id;
      var thumbnail = data.thumbnail ? data.thumbnail : '<?= base_url(ThumbnailPlaceholder) ?>';
      var genres = data.genres;
      var description = data.description;

      var descriptionsn = '';
      if (Array.isArray(data.description)) {
        const sessionDescription = data.description.find(desc => desc.language === "English");
        if (sessionDescription) {
          descriptionsn = sessionDescription.content;
        }
        if (lang_title) {
          const sessionDescription = data.description.find(desc => desc.language === lang_title);
          if (sessionDescription) {
            descriptionsn = sessionDescription.content;
          }
        }
      }
      var fileUrl = data.file_url;
      var posterUrl = data.poster_url ? data.poster_url : '<?= base_url(PosterPlaceholder) ?>';
      var ownedby = 0 ;
      if (data.hasOwnProperty('owned_by')) {
                                    if (data.owned_by > 0) {                                    
                                        const validSubscriptions = "<?= json_encode(SUBSCRIBEUSER)?>";
                                        if (validSubscriptions.includes(data.owned_by)) {
                                            isSubscribed = 1;  
                                        } else{
                                              isSubscribed = 0;
                                        }
                                        ownedby = data.owned_by;
                                } 
                               }

      if ((isSubscribed != 1) && (data.is_paid == 1) && (sess_id !== "")) {
        var message = (data.type == 0) ? subscribe_watch : subscribe_listen;
        var siturl1 = 'subscription?type=details&publisherid='+ownedby;
      } else if ((isSubscribed != 1) && (data.is_paid == 1) && (sess_id == "")) {
        var message = (data.type == 0) ? subscribe_watch : subscribe_listen;
        var siturl1 = 'subscription?type=details&publisherid='+ownedby;
      } else if ((data.is_paid == 2) ) {
        playbtn = "<?= base_url('assets/images/vector.svg') ?>";
        var message = (data.type == 0) ? available_to_rent : available_to_rent;
        var siturl1 = 'play-video?id=' + data.enc_id + '&similar=SimilarToThis';
      } else {
        var message = (data.type == 0) ? watch_app : listen;
        var siturl1 = 'play-episode?id=' + data.enc_id + '&play-video='  +lastPart+ '&similar=SimilarToThis';
      }

      let visibleTag='';
      if (data.tags && data.tags.length > 0) {
        let foundTag = data.tags.find(tag => tag.visible === 1);
        if (foundTag && foundTag.url) {
          visibleTag = foundTag.url;
        }
      }
      var tit = data.title;

      html = `<div class="item">
                <a onclick = "matoma_hit_similar('${id}','${tit}')" href="${fileUrl == '' ? 'play-video?id=' + enc_id+'&similar=SimilarToThis' : 'play-video?id=' + enc_id+'&play-video='+'<?= $id ?>'+'&similar=SimilarToThis'}">
                    <div class="pb_card_details ${(data.is_paid == 0) ? '' : 'pb_card_outer'}">
                        <div class="pb_card_img">
                          ${(data.is_paid==1)?'<div class="premium_icondt"><img src="<?= base_url('assets/images/premium-icon.svg') ?>" alt="premium"></div>':''}
                            <img src="${thumbnail}" class="img-fluid as_ratio" alt="${tit}">`;
      if (visibleTag != '') {
        html += `<div class="pre_tags"><img src="${visibleTag}" class="img-fluid" alt="tags_img"></div>`;
      }
      html += `</div>
                        <div class="pb_card_img2">
                            <div class="pb_card_vd-2 position-relative">
                                ${fileUrl !== '' ? `<div data-vjs-player><video id="my_show_${id}" class="video-js my_show" poster="${posterUrl}" preload="auto"></video></div>` : `<img src="${posterUrl}" class="img-fluid" alt="poster">`}
                               
                            </div>
                            <div class="pb_card_content">
                                <h6>${data.title}</h6>
                                <p class="discription_gen">${genres.replace(/,/g, ' | ')}</p>
                                <p class="discription_dt">${descriptionsn}</p>
                                <div class="d-flex align-items-center mt-1 pb_add_btns">
                                    <a href="${siturl1}" class="pb_watch_btn d-block">
                                        <img class="img-fluid watchCardImg" src="assets/images/playBtn.png" alt="watchCardImg">
                                        ${message}
                                    </a>`;
      if ("<?= $this->session->profile_id ?>") {
        html += `<div id="fav-${data.id}" data-id="${data.id}" data-title="${data.title}" data-poster="${data.poster_url}" data-thumbnail="${data.thumbnail}" data-description="${descriptionsn}" data-encshowid="${data.enc_id}" data-genres="${data.genres}" data-mediatype="${data.type}">`;
        if (data.in_watchlist == 1) {
          var nadded = '';
          var added = 'd-none';
        } else {
          var added = '';
          var nadded = 'd-none';
        }

        watchData.forEach((witem, wkey) => {
          if (witem.show_id == data.id) {
            if (witem.is_deleted != 1) {
              nadded = '';
              added = 'd-none';
            }
          }
        });
        // if (data.in_watchlist != 1) {
        //     nadded = 'd-none';
        // }else{
        //     added = 'd-none';
        // }
        html += ` <a href = "javascript:void(0);"class = "pb_add ms-2 d-block fav-item-${data.id} ${added}" onclick = "addToWatchList(event,${data.id},1,'card')">
                                            <img class = "img-fluid playAdd" src = "assets/images/jointWatch.png"alt = "joinwatch" >
                                           </a>`;
        html += `<a href="javascript:void(0);" class="pb_add bg-green fav-item-${data.id} ${nadded}"  onclick="addToWatchList(event,${data.id},3,'card')">
                                                 <img class="img-fluid playAdd" src="assets/images/click.svg" alt="joinwatch">
                                                </a>`;
        html += `
                                        </div>`;
      }
      html += `</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>`;
      return html;
    }).join('');

    // Append all related items to the carousel within the related_details section
    $('#related_details .carousel_bott4').append(relatedItemsHtml);
   $(document).ready(function() {
    // Initialize Owl Carousel after all items are appended
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
         
        },
        1024: {
          stagePadding: 10,
          items: 6,
          slideBy:3
        }, 
        1025: {
          items: 6,
          margin: 20,
          slideBy:3
        },
        1450: {
          items: 7,
          margin: 20,
          slideBy:3
        },
        1800: {
          items: 8,
          margin: 20,
          slideBy:3
        }
      }
    });
    owl.trigger('refresh.owl.carousel');
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

  }

  var episode_id = '';
  var episode_title = '';

 async function episode_dt_data(episode_dt_datas) {
  var enc_ids = await aes_cbc_encryption_(episode_dt_datas.id);
  var baseurl = "<?=base_url('view-episode?id=')?>";
// console.log(enc_ids,'enc_ids');
    // console.log(episode_dt_datas.id,'episode_dt_datas');
    var episodename = (episode_dt_datas.type ==0)?"<?= $this->lang->line('episodes'); ?>":"<?= $this->lang->line('track'); ?>";
    var episodeSection = `
        <section class="pb_episode_cont banner-bottom-">
            <div class="container-fluid">
                <div class="episodeSlection">
                    <select class="episodeDrop" onchange="toggle_section(event)">`;
    
    episodeSlection = episode_dt_datas.season.sort((a, b) =>  b.number - a.number);

    // Iterate over each season in the data and generate options for the select dropdown
    episode_dt_datas.season.forEach(function(season, index) {
      var active = index == 0 ? 'active' : '';
      var titleImg = episode_dt_datas.banner_icon;
      var bannerImg = (episode_dt_datas.detail_banner.length > 0)?episode_dt_datas.detail_banner:"<?= base_url(BannerPlaceholder) ?>";
      season.assets.forEach((sitem)=>{
        if(sitem.platform=='WEB' && sitem.img_type=='TitleLogo'){
          if(sitem.img_url.length > 0){
            titleImg = sitem.img_url;
          }
        }
        if(sitem.platform=='WEB' && sitem.img_type=='BannerNoTitle'){
          if(sitem.img_url.length > 0){
            bannerImg = sitem.img_url;
          }
        }
      });
      var geners = episode_dt_datas.genres??'';
      if(season.genres!=null && season.genres !=''){
       geners = (season.genres.length > 0)?season.genres:episode_dt_datas.genres;
      geners = geners ? geners.replace(/,/g, ' | ') : '';
      }
      var season_description = '';
      var season_dsc = (season.description.length > 0)?season.description:episode_dt_datas.description;
      if (Array.isArray(season_dsc)) {
        const sessionDescription = season_dsc.find(desc => desc.language === "English");
        if (sessionDescription) {
          season_description = sessionDescription.content;
        }
        if (lang_title) {
          const sessionDescription = season_dsc.find(desc => desc.language === lang_title);
          if (sessionDescription) {
            season_description = sessionDescription.content;
          }
        }
      }
      episodeSection += `<option value="${season.id}" ${active} data-poster="${bannerImg}" data-titleImg="${titleImg}" data-genre="${geners}" data-description="${season_description}">${season.title}</option>`;
    });

    episodeSection += `
                    </select>
                </div>
                <div class="">`;

    // Iterate over each season again to generate HTML for each season and its episodes
    episode_dt_datas.season.forEach(function(season, index) {
      //console.log("seasons",season.videos)
      if (season.videos.length > 0) {
        let similiar_video_title_condition = false;
        if (season.videos.find(each => each.is_trailer == 0)) {
          similiar_video_title_condition = true;
        }
        if (similiar_video_title_condition == true) {
          var active = index > 0 ? 'd-none' : '';
          episodeSection += `
                  <div id="home-${season.id}" class="tab-pane home-section ${active}">
                      <div class="seasion">
                      <div class="d-flex view_dtsd view_dtsdf">
                          <h6 class="defaultColr mt-1 mb-4 pl_5 delayed-element d-block">${episodename}</h6>`;
                            if( season.videos.length >4){ 
                             let cur_season = season.hasOwnProperty('number')?season.number:0;
                             lastPart = lastPart + "&dgh=" + cur_season;
                             episodeSection += `<a href="${baseurl + enc_ids+'&play-video=' + lastPart}" class="defaultColr mt-1 mb-3  view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';">
                                                        <?= $this->lang->line('viewall') ?> <i class="fas fa-solid fa-arrow-right"></i>
                                                    </a>`;
                            }
          episodeSection += ` </div>                       
                      </div>
                      <div class="carousel_bott owl-carousel owl-theme banner_load_af">`;

          // Iterate over each episode in the season and generate HTML for each episode${base_url('play-media?id=' + season_id)}
          var episode_count = 0;
          //season.videos.forEach(function(episode) {
          for(let episode of season.videos){
            episode.poster_url = episode.poster_url ? episode.poster_url : '<?= base_url(PosterPlaceholder) ?>';
            let url = "<?= base_url('play-media?id=') ?>" + episode.enc_id + '&play-video=' + lastPart;
            episode_id = episode.id;
            episode_title = episode.title;
            if (episode.is_trailer == 0) {
              var season_id = episode.id;
             // console.log(episode);
              episodeSection += `
                          <div class="">
                              <div class="mb-3 episodeFullBox" data-content_id='${season_id}' data-episode_title='${episode_title}' data-content_title='${episode_dt_datas.title}' data-is_paid='${episode.is_paid}' data-season_id='${episode.season_id}' data-episode_id='${episode_id}' >
                                  <a href="javascript:void(0)" onclick="urls_call('${url}')">
                                      <div class="position-relative">
                                          <img class="img-fluid as4" src="${episode.poster_url}" alt="${episode.title}">
                                          <p class="epiTime"> </p>
                                      </div>
                                      <div class="py-2">
                                          <p class="episodeOne text-white m-0">${episode.title}</p>
                                      </div>
                                  </a>
                              </div>
                          </div>`;
                          episode_count ++ ;
            }
            //console.log(episode_count,'episode_count');
            if(episode_count>=10){
           break;
            }
          };


          episodeSection += `
                      </div>`;

          // If there are artists for this season, generate HTML for them
          if (season.artist && season.artist.length > 0) {

            episodeSection += `
                      <div class="artistSec">
                          <p class="episodeCast_heading mt-3"><?= $this->lang->line('cast_crew') ?></p>
                          <div class="artistList">`;

            season.artist.forEach(function(art) {
              var artist_img = (art.profile_image) ? art.profile_image : '<?= base_url('assets/images/placholder-img1.png'); ?>';

              episodeSection += `
                          <div class="artistDetail mb-2">
                              <img class="img-fluid" src="${artist_img}" alt="">
                              <p>${art.artists_name}</p>
                          </div>`;
            });

            episodeSection += `
                          </div>
                          
                      </div><div class="seasionBor"></div>`;
          }

          episodeSection += `
                  </div>`;
        }

      }
    });

    episodeSection += `
            </div>
        </div>
    </section>`;

    // Log the generated HTML
    $('#episode_season').append(episodeSection); // Append the HTML to the specified element
    $(document).ready(function() {
      $('.episodeFullBox').on('click', function() {
        var episode_title = $(this).data('episode_title');
        var content_title = $(this).data('content_title');
        var season_id = $(this).data('season_id');
        var episode_id = $(this).data('episode_id');
        var content_id = $(this).data('content_id');
        var is_paid = $(this).data('is_paid');
        if(is_paid==0){ 
          var vod= 'Vod';
        }
        else if(is_paid==1){
          var vod= 'SVod';
        }
        else{
           var vod= 'TVod';
        }
        // matomo('ContentDetailPage', 'EpisodeSelect', content_id + '/' + content_title + '('+ vod +')' + '/' + season_id + '/' + episode_id + '/' + episode_title);
        queueTrackingDataWithDelay('trackEvent', ["ContentDetailPage", 'EpisodeSelect' , content_id + '/' + content_title + '('+ vod +')' + '/' + season_id + '/' + episode_id + '/' + episode_title],0);
          //  matomo('Episode', 'Select', episode_id +'/'+ episode_title, 5);
          queueTrackingDataWithDelay('trackEvent', ["Episode", 'Select',episode_id +'/'+ episode_title],100);

      });
    });
    // Initialize Owl Carousel after document is ready
    $(document).ready(function() {
      // $('.carousel_bott').owlCarousel('destroy');
      var owl = $(".carousel_bott").owlCarousel({
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
            slideBy:3
          },
          1025: {
            items: 4,
            margin: 15,
            slideBy:3
          },
          1400: {
            items: 4,
            margin: 15,
            slideBy:3
          },
          1800: {
            items: 5,
            margin: 15,
            slideBy:3
          }
        }
      });
       owl.trigger('refresh.owl.carousel');
    });

    drpCount = episode_dt_datas.season.length;
    
    $(document).ready(function() {
      $(".episodeDrop").select2({
        // placeholder: "Select a programming language",
        allowClear: true,
        minimumResultsForSearch: -1
      });
      if (drpCount <= 1) {
        $('.episodeSlection').addClass('d-none');
        $('.eps _caro').addClass('eps_to_caro')
        $('.episodeDrop').prop('disabled',true);
        $('.select2-selection__arrow').css('display', 'none');
      } else {
        $('.select2-selection__arrow').css('display', 'block');

      }

    });
  }
</script>
<script>
  $(window).on('load', function() {
    //shimmer('');
  });
</script>
<div class="modal fade bd-example-modal-sm " id="promoCode" tabindex="-1" role="dialog" aria-labelledby="promoCode" aria-hidden="true">
  <div class="modal-dialog modal_sm modal-dialog-centered">
    <div class="modal-content mc-content">
      <form id="paymentForm" method="post" action="<?= base_url('razorpost_rental') ?>">
        <div class="modal-body p-3 ">
          <input type="hidden" class="hh" name="rental" value="2">
          <input type="hidden" class="validity" name="validity" value="">
          <input type="hidden" class="plan_id" id="plan_id" name="plan_id" value="">
          <input type="hidden" class="show_id" id="show_id" name="show_id" value="">
          <input type="hidden" class="id" id="id" name="id" value="">
          <input type="hidden" class="gst_amount" name="gst_amount" value="">
          <input type="hidden" class="s_price" name="s_price" value="">
          <input type="hidden" class="couponApplied" name="couponApplied" value="0">
          <div class="d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #292929;padding: 4px 0">
            <span><?= $this->lang->line('payment_details') ?></span>
            <span class="Crossmodal cross_modal_dt" onclick="closeModal()" onkeypress="handleKeyPress(event)" onkeydown="handleKeyDown(event)" onkeyup="handleKeyUp(event)" tabindex="0" style="cursor: pointer;"> <img src="<?= base_url('assets/images/sunscription_close.svg'); ?>" class="subscription_close_img" alt="subscription_close"></span>
          </div>
          <div class="mb-3">
            <div style="border-bottom: 1px solid #292929;padding: 8px 0">
            <div class="d-flex align-items-center justify-content-between">
              <span class="mb-0 f-600"><?= $this->lang->line('amount') ?></span>
              <span class="mb-0 f-600 "><i class="fa-solid fa-indian-rupee-sign ps-1"></i> <span class="price-value"></span></span>
            </div>
            <?php if($tvod_discount > 0){ ?>
              <div class="d-flex align-items-center justify-content-between">
                <span class="mb-0 f-600 f-12size"><?= $tvod_discount ?>% <?= $this->lang->line('discount_applied') ?></span>
                <span class="mb-0 f-600 f-12sizes"><i class="fa-solid fa-indian-rupee-sign ps-1"></i> <del class="disc-price-value"></del></span>
              </div>
            <?php } ?>
</div>
            
            
          </div>

          <div class="pr_code_detail pb-3" style="cursor:pointer; ">
            <img src="<?= base_url('/assets/images/coupon.svg') ?>" class="coupon-img pe-2" alt="coupon">
            <button type="button" class="btn border-botoom-dot dddd">
              <?= $this->lang->line('have_promo') ?> </button>
          </div>
          <div class="pr_code_input pb-3 d-none">
            <label for="promoInput"><?= $this->lang->line('enter_promo_code') ?></label>
            <div class="d-flex align-items-center">
              <input type="text" id="promoInput" value="" class="w-100 code-input" name="promo" placeholder="<?= $this->lang->line('enter_promo_code') ?>" autofocus>

              <button type="button" id="apply_button" class="promo_otp_button ms-3" disabled>
                <span class="applyTXT"><?= $this->lang->line('apply') ?></span>
                <span class="applyLoading"></span>
              </button>
            </div>
            <div class="coupon_f" id="coupan"></div>
            <span class="error_name"></span>
          </div>
          <div class="pb-2 pt-2">
            <button type="submit" class="btn w-100 applyCodeActive" id="applyButton"><?= $this->lang->line('cont_to_pay') ?> ₹ <span class="pay"></span></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#promoCode').on('shown.bs.modal', function () {
        $(".code-input").focus();
    });
});
</script>
<!-- Your HTML code for the modal goes here -->
<script>
  function openModal(pricingId, PlanId, gst_amount, s_price, mrp, validity, title, disc_payable_amount) {
    // matomo('AvailableToRent', 'Select', showID + "/" + title);
    // matomo('AvailableToRent', 'View', 'Payment Detail');
    queueTrackingData('trackEvent', ["AvailableToRent", 'View ', 'Payment Detail']);
    var modal = document.getElementById('promoCode');
    var discountRate = "<?= $tvod_discount ?>";
    // Display the modal
    modal.style.display = "block";
    modal.style.opacity = 1;

    $('.plan_id').val(PlanId);
    $('.show_id').val(showID);
    $('.id').val(pricingId);
    $('.gst_amount').val((gst_amount - (gst_amount*discountRate)/100));
    $('.s_price').val((s_price - (s_price*discountRate)/100));
    $('.validity').val(validity);



    // Set values in hidden fields
    var priceElement = $('.modal-content .price-value');
    if (s_price !== '') {
      var s_price_num = parseFloat(s_price);
      var gst_amount_num = parseFloat(gst_amount);
      var payable_amount = (s_price_num + gst_amount_num);
      if(disc_payable_amount > 0){
        priceElement.text('₹ '+disc_payable_amount);
        $('.modal-content .disc-price-value').text('₹ '+payable_amount);
      }else{
        priceElement.text('₹ '+payable_amount);
      }
    }
    var priceElement_pay = $('.modal-content .pay');
    
    if(disc_payable_amount > 0){
      
      priceElement_pay.text(disc_payable_amount);
    }else{
      priceElement_pay.text(payable_amount);
    }
  }

  function closeModal() {
    // Get the modal element
    var modal = document.getElementById('promoCode');
    // Hide the modal
    modal.style.display = "none";
    modal.style.opacity = 0;
    $('.pr_code_detail').removeClass('d-none');
    $('.pr_code_input').addClass('d-none');
    $('#promoInput').val('');
    $('#coupan').html('');
    $('.error_name').html("")
    $('#apply_button').prop('disabled', true);
     $(".code-input").focus();
  }
  $(document).ready(function() {
    $('.pr_code_detail').click(function() {
      // matomo('AvailableToRent', 'View', 'PromoCodePopup');
      queueTrackingData('trackEvent', ["AvailableToRent", 'View', 'PromoCodePopup']);
      $('.pr_code_input').removeClass('d-none');
      $('.pr_code_detail').addClass('d-none');
      $('#promoInput').val('');
       $(".code-input").focus();
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
      var data = $(this).val().toUpperCase();
      if (data == '') {
        $("#apply_button").prop('disabled', true);
      } else {
        $('.error_name').html('');
        $("#apply_button").prop('disabled', false);
      }
    });
  });
  $(document).ready(function() {
    $(".applyCodeActive").click(function() {
      var price = $("input[name=price-tab-plan]:checked");
      queueTrackingDataWithDelay('trackEvent', ["AvailableToRent", "PaymentInitialize",(Number($('.s_price').val())+Number($('.gst_amount').val())) ],20);
      queueTrackingDataWithDelay('trackEvent', ["AvailableToRent", "PaymentPopup" ],100);

      var plan_id = $(price).parent('.custom-radio').find('.plan_id').val();
      var id = $(price).parent('.custom-radio').find('.id').val();
    });
  });



  $(document).ready(function() {
    $("#apply_button").click(function() {
      let applied = "<?= $this->lang->line('applied') ;?>"
      let applying = "<?= $this->lang->line('applying') ;?>"
      let apply = "<?= $this->lang->line('apply') ;?>"

      $(this).find('.applyLoading').html(`<div class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden"></span>
              </div>`);
      $(this).find('.applyTXT').text(applying)
      var promoCode = $("#promoInput").val();
      
      var id = $("#id").val();
      var plan_id = $("#plan_id").val();
      // alert(promoCode);

      $.ajax({
        url: "<?= base_url('web/subscription/apply_code') ?>",
        method: "POST", // Method type
        data: {
          promoCode: promoCode,
          plan_id: plan_id,
          id: id

        },
        success: function(response) {
          res = JSON.parse(response);
          if (res.status == true) {
            // console.log(res.data);
            // matomo('AvailableToRent', 'Applied', 'promocode' + '(' + promoCode + ')');
            queueTrackingData('trackEvent', ["AvailableToRent", 'Applied', 'promocode' + '(' + promoCode + ')']);
            var final_mrp = res.data.final_mrp;
            var discount = res.data.discount;
            var final_gst_amount = res.data.final_gst_amount;
            var s_price_final_num = parseFloat(final_mrp);
            var gst_amount_final_num = parseFloat(final_gst_amount);
            var final_pay = (s_price_final_num + gst_amount_final_num);
            var priceElement_pay = $('.modal-content .pay');
            priceElement_pay.text(final_pay);
            //  alert("Coupan Applied");
            $('.s_price').val(final_mrp);
            $('.couponApplied').val(res.data.coupon_id);
            $('.gst_amount').val(final_gst_amount);
            $('#coupan').html(`<span class="promo_applied">${promoCode} ${applied} </span>(<span class="saved_discount">Saved ₹ ${discount}</span>) <button type="button" class="btn promo_remove ms-1 remove copon_rem"></button>`);
            $('.error_name').html("")
            $('.applyLoading').html('')
            $('.applyTXT').text(apply)

          } else {
            $('.error_name').html(res.message).css('color', 'red');
            $('#coupan').html('')
            $('.applyLoading').html('')
            $('.applyTXT').text(apply)
          }

        },
        error: function(xhr, status, error) {

        }
      });
    });
  });
</script>
<script>
  function matoma_hit_similar(id, tit) {
    if (id != "") {
      var data = (id + '/' + tit);

      // matomo_sr('SimilarToThis - ContentSelected', data);
      queueTrackingData('trackEvent', ["SimilarToThis", 'ContentSelected',data ]);

    }
  }
  function matomo_sr(user, type, titles, geners = '') {
    var url = '<?= base_url("/web/Home/matomo_hit"); ?>';
    $.ajax({
      url: url,
      type: "POST",
      dataType: "json",
      async: "true",
      data: {
        user: user,
        types: type, // Typo here, it should be type instead of types
        geners: geners,
        title: titles,
        search_jao :'SimilarToThis'
        
      },
      success: function(data) {
      },
      error: function(xhr, status, error) {
        //  console.error("Error: " + error);
      }
    });
  }
</script>

<script>
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
</script>
<script>
  function matomo_dim(user, type, titles, geners = '', event = 2, pid_name) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url('/web/Watchlist/add_to_watchlist_dim') ?>',
      dataType: "json",
      data: {
        user: user,
        types: type, // Typo here, it should be type instead of types
        title: titles,
        geners: geners,
        event: event,
        pid_name: pid_name
      },
      success: function(data) {
        if (data.status == 1) {

        }
      }
    });
  }
  function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}
function sinceyet(url,is_live,type){
    if(is_live==4 && type == 9 ){
      toastr.info("<?= $this->lang->line("live_event_not") ?>");
    }else if(is_live > 0 && is_live < 4){
      window.location.href=url;
    }else if(type !=9){
      window.location.href=url;
    } 
      }
</script>

<script>
  document.getElementById('promoInput').addEventListener('input', function() {
    this.value = this.value.toUpperCase();
  });
    function ManageWatchEvent(watch,showID,title){
          queueTrackingDataWithDelay('trackEvent', ["Watchlist", watch, showID + "/" + title], 0);
          queueTrackingDataWithDelay('trackContentInteraction', ["Watchlist" + '/' + watch, showID + "/" + title, geners], 100);
          queueTrackingDataWithDelay('trackContentImpression', [showID + "/" + title, geners], 200);
    }
    function ManageViewEvent(showID,title,des_gener,pid_name,v_type,type){
          if(type == 2){
            queueTrackingDataWithDelay('trackEvent', ["AvailableToRent", 'Select',  showID + "/" + title],50);
            queueTrackingDataWithDelay('trackEvent', ["Page", 'View', 'AvailableToRent'],150);

          }
          var tevents =showID + '/' + title + v_type;
          queueTrackingDataWithDelay('trackEvent', ["ContentDetailPage", 'View', tevents],300);
          queueTrackingDataWithDelay('trackContentInteraction', ["Content Detail Page" , showID + '/' +title, des_gener],400);
          queueTrackingDataWithDelay('trackContentImpression', [showID + '/' +title, des_gener],500);

    }
    function ManageShareEvent(title,geners,type){      
          queueTrackingDataWithDelay('trackEvent', [type, 'Share', title],0);
          queueTrackingDataWithDelay('trackContentInteraction', ['Share' + '/' + type, title, geners],100);
          queueTrackingDataWithDelay('trackContentImpression', [title, geners],200);
    }

   
</script>

<?php if($this->input->get('via') == "payment"){ 
  $video_id = $this->input->get('id');
  ?>
  <script> 
    $('#overlayonajaxhit').show(); 
    removeCacheData('contentDetail','all');
    let redirect_url = "<?= base_url('play-video?id=').$video_id;?>";
    window.location.href = redirect_url;

    
  </script>
<?php }?>



