<style type="text/css">
  /*== Player watermark Please don't romeve css ==; */
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

  #my-video {
    min-width: 100%;
    min-height: 100%;
  }



  .banner_after_navbar .vjs-poster {
    height: 100% !important;
  }

  .vjs-time-divider {
    display: none !important;
  }



  .vjs-current-time {
    display: none !important;
  }

  .vjs-duration {
    display: none !important;
  }

  .item {
    padding: 10px;
  }

  .item:hover {
    background: #c82222;
  }

  /* .video-js {
    height: calc(65vw * 0.5625) !important;
  } */

  .vjs-subs-caps-button .vjs-quality-button {
    margin-left: auto !important;
  }

  .vjs-button>.vjs-icon-placeholder::before {
    font-size: 21px !important;
    line-height: 1.67;
  }

  .skip-back {
    order: -1;
  }

  .vjs-control-bar {
    display: flex;
  }

  #progress {
    stroke-dasharray: 283;
    stroke-dashoffset: 283;
  }

  /* .vjs-audio-button {
    margin-left: auto !important;
  } */

  .skipintros {
    position: absolute;
    right: 37px;
    top: -37px;
    padding: 10px 30px;
    background: #7c5ee3 !important;
    color: #fff !important;
  }

  .vjs-audio-button.vjs-hidden {
    display: block !important;
  }

  .vjs-subs-caps-button.vjs-hidden {
    display: block !important;
  }

  .vjs-quality-button.vjs-hidden {
    display: block !important;
  }

  .vjs-icon-hd.vjs-hidden {
    display: block !important;
  }

  .vjs-picture-in-picture-control {
    margin-left: auto !important;
  }

  .skip-back.vjs-hidden {
    display: block !important;
  }

  .skip-forward.vjs-hidden {
    display: block !important;
  }

  .vjs-volume-panel.vjs-hidden {
    display: block !important;
  }
</style>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/videojs-thumbnails/0.1.1/videojs.thumbnails.css" rel="stylesheet"> -->
<?php 
// pre($video_details); die;
$genn = $content_details['data']['genres'];
$timeing =$video_details['data']['video_duration'];
$hours = floor($timeing / 3600);
$minutes = floor(($timeing % 3600) / 60);
$seconds = $timeing % 60;

// Format the time
$formatted_time = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

?>
<?php 
  if (isset($video_details['data']) && !empty($video_details['data'])) {  //print_r($video_details['data']);
    $video_id = $video_details['data']['id'];

    if (!$this->session->userdata('profile_id')) {
      $userId = $this->session->userdata('tempuuid');
    } else {
      $type = $this->session->userdata('Iskid') == 0 ? 'Adult' : 'Child';
      $userId = $this->session->userdata('id') . '_' . $this->session->userdata('profile_id') . '_' . $type;
    }
    $video_details['data']['title'] = str_replace('-', ' ', $video_details['data']['title']);
?>
  <section class="pb_pl_video position-relative banner_after_navbar pp-videodt">
    <div class="video-container">
      <!-- <button class="back-button" onclick="update_data()">
        <i class="fa fa-chevron-left text-white"></i>
      </button>  -->
      <video data-matomo-title="<?=  $content_details['data']['title']."-".$video_details['data']['title'] ?>" title="" id="my-video" poster="" controls preload="auto" class="video-js vjs-default-skin">
      </video>
    </div>
  </section>



  <!--+++++++++++++++++++++++++++++++ DRM++++++++++++++++++++++++++++++++ -->
  <?php
  $current_vid = $video_details['data']['id'] ?? null;
  $next_vid = array(
    'id' => 0,
    'similar' => 0,
    'title' => '',
    'poster_url' => '',
    'description' => '',
  );
  ?>
  <?php
  $video_id = $video_details['data']['id'] ?? 0;
  $season_check = '';
  if (isset($content_details['data']['season']) && !empty($content_details['data']['season'])) {
    $season_check = array_values(array_filter($content_details['data']['season'][0]['videos'], function ($var) use ($video_id) {
      return $var['id'] ==   $video_id;
    }));
  }
  
  if (isset($content_details['data']['id']) && !empty($content_details['data']['id'])) {
    $content_data =  $content_details['data']['id'] . '/' . $content_details['data']['title'];
  } else {
    $content_data =  $video_details['data']['id'] . '/' . $video_details['data']['title'];
  }
  $category_title = ($content_details['data']['category_title']) ?? '';
  $season_id = isset($season_check[0]['season_id']) ? $season_check[0]['season_id'] : '';
  $season_name = isset($season_check[0]['season']) ? $season_check[0]['season'] : '';
  $episode_name = isset($season_check[0]['title']) ? $season_check[0]['title'] : '';

  $moto_title = $content_data;
  if (isset($content_details['data']['season']) && ($content_details['data']['skip_season'] != 1)) {
    $moto_title = $content_data . '/' . $category_title . '/' .   $season_id . '/' . $season_name . '/' . $episode_id . '/' . $episode_name;
    foreach ($content_details['data']['season'] as $key => $value) {
      foreach ($value['videos'] as $mkey => $mvalue) {
        if ($mvalue['id'] == $current_vid) {
          if (isset($content_details['data']['season'][$key]['videos'][$mkey + 1])) {
            if ($content_details['data']['season'][$key]['videos'][$mkey + 1]['is_trailer'] == 1) {
                $mkey = $mkey + 1;
            }
        }
          $next_vid = array(
            'id' => $content_details['data']['season'][$key]['videos'][$mkey + 1]['id'] ?? 0,
            'similar' => 0,
            'title' => $content_details['data']['season'][$key]['videos'][$mkey + 1]['title'] ?? '',
            'poster_url' => $content_details['data']['season'][$key]['videos'][$mkey + 1]['poster_url'] ?? '',
            'description' => $content_details['data']['season'][$key]['videos'][$mkey + 1]['description'] ?? ''
          );

          if (($next_vid['id'] == 0) && isset($content_details['data']['season'][$key + 1]['videos'][0]['id'])) {
            $next_vid = array(
              'id' => $content_details['data']['season'][$key + 1]['videos'][0]['id'] ?? 0,
              'similar' => 0,
              'title' => $content_details['data']['season'][$key + 1]['videos'][0]['title'] ?? '',
              'poster_url' => $content_details['data']['season'][$key + 1]['videos'][0]['poster_url'] ?? '',
              'description' => $content_details['data']['season'][$key + 1]['videos'][0]['description'] ?? ''
            );
          }
        }
      }
    }

    if (($next_vid['id'] == 0) && isset($content_details['data']['related'])) {
      $next_vid = array(
        'id' => $content_details['data']['related'][0]['id'] ?? 0,
        'similar' => 1,
        'title' => $content_details['data']['related'][0]['title'] ?? '',
        'poster_url' => $content_details['data']['related'][0]['poster_url'] ?? '',
        'description' => $content_details['data']['related'][0]['description'] ?? ''
      );
    }
  } else {
    if (isset($content_details['data']['related'])) {
      $next_vid = array(
        'id' => $content_details['data']['related'][0]['id'] ?? 0,
        'similar' => 1,
        'title' => $content_details['data']['related'][0]['title'] ?? '',
        'poster_url' => $content_details['data']['related'][0]['poster_url'] ?? '',
        'description' => $content_details['data']['related'][0]['description'] ?? ''
      );
    }
  }
  ?>

  <!--+++++++++++++++++++++++++++++++ DRM++++++++++++++++++++++++++++++++ -->



<?php } else { ?>
  <div class="col-md-6 m-auto text-center">
    <div class="no_dt_found no_pg_foun">
      <img src="<?= base_url('assets/images/404-imge.svg'); ?>" class="img-fluid" alt="404 image">
      <h5 class="mt-4 mb-3 text-center text-white"><?= $this->lang->line('oops_page_not_found') ?></h5>
      <p class="text_ac"><?= $this->lang->line('page_looking') ?></p>
      <a href="<?= base_url() ?>" class="go_to_page mt-4"><?= $this->lang->line('go_to_home') ?></a>
    </div>
  </div>
<?php }
$guest_user = ($this->session->id) ? 'Video' : 'GuestUserVideo'; ?>

<script src="<?= base_url('assets/js/cache.js') ?>"></script>
<script src="<?= base_url('assets/website_assets/js/thumbnail.js') ?>"></script>
<script src="<?= base_url('assets/website_assets/js/video.js') ?>"></script>
<script src="<?php echo base_url('assets/website_assets/js/shaka-player.compiled.debug.js'); ?>"></script>
<script src="<?php echo base_url('assets/website_assets/js/video.js'); ?>"></script>
<script src="<?php echo base_url('assets/website_assets/js/videojs-shaka.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/website_assets/js/shaka-player.ui.js'); ?>"></script>
<script src="<?php echo base_url('assets/website_assets/js/videojs-seek-buttons.min.js'); ?>"></script>
<link href="<?php echo base_url('assets/website_assets/css/video-js.css'); ?>" rel="stylesheet">
<script>
  var profile_id = "<?= $_SESSION['profile_id'] ?? ''; ?>";
  var video_id = '<?= $video_details['data']['id']; ?>';
  var cachekey = profile_id + '-continueWatching';
  var skipSeason = "<?= $content_details['data']['skip_season']??1 ?>";

  $("#my-video").click(function() {
    var ct = player.currentTime();
    var dur = player.duration();
    if (player.paused) {
      updateTimerDisplay(ct, dur);
    } else {
      updateTimerDisplay(ct, dur);
    }
  });

  async function updateTimerDisplay(crTime, dur, activity = 1) {
    $("#overlayonajaxhit").fadeOut(10);
    var currentTime = sessionStorage.getItem("curreTime");
    var video_duration = sessionStorage.getItem("duration");
    var type_id = '<?= @$video_details['data']['type_id']; ?>';
    var show_id = '<?= $video_details['data']['id']; ?>';
    var title = "<?= $video_details['data']['title']; ?>";
    var thumbnail = '<?= $video_details['data']['thumbnail_url']; ?>';
    var poster_url = '<?= $video_details['data']['poster_url']; ?>';

    var id = '<?= @$video_details['data']['show_id']; ?>';
    var watch_time = '<?= @$video_details['data']['total_watch_time'] ?>';
    var remaining_time = '<?= @$video_details['data']['remaining_time'] ?>';
    var encrypted_id = '<?= $encrypted_id ?>';
    var twice_time = '<?= @$video_details['data']['twice_time'] ?>';
    var total_watch_time = watch_time + crTime;
    if ((dur - crTime) < 36) {
      activity = 3;
    }

    let update_data = {
      "title": title,
      "poster_url": poster_url,
      "show_id": id,
      "video_id": show_id,
      "encrypted_id": encrypted_id,
      "crTime": crTime,
      "dur": dur
    }
    if ((type_id != 2 || type_id != 3) && (crTime > 0)) {
      update_cache(cachekey, show_id, update_data, activity);
    }
  }

  <?php
  $ep = 3; //$video_details['data']['ep_no']; 
  $tobeplayed = 2; //$ep ;
  // if (!empty($video_details['data']['episodes'][$tobeplayed]['id'])) {
  //   $shubham = aes_cbc_encryption_($video_details['data']['episodes'][$tobeplayed]['id']);
  //   $sarthak = aes_cbc_encryption_($video_details['data']['episodes'][$tobeplayed]['type_id']);
  //   //pre($sarthak);die;
  //   $no_of_eps = sizeof($video_details['data']['episodes']);
  // }

  ?>
</script>
<script>
  ! function(e, t) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = t(require("video.js")) : "function" == typeof define && define.amd ? define(["video.js"], t) : (e = e || self).videojsSpriteThumbnails = t(e.videojs)
  }(this, function(e) {
    "use strict";
    var t = (e = e && Object.prototype.hasOwnProperty.call(e, "default") ? e.default : e).getPlugin("plugin"),
      o = {
        url: "",
        width: 0,
        height: 0,
        interval: 1,
        responsive: 600
      },
      r = function(t) {
        var r, i;

        function n(r, i) {
          var n;
          return (n = t.call(this, r) || this).options = e.mergeOptions(o, i), n.player.ready(function() {
            ! function(t, o) {
              var r = o.url,
                i = o.height,
                n = o.width,
                a = o.responsive,
                p = e.dom || e,
                s = t.controlBar,
                u = s.progressControl,
                l = u.seekBar,
                d = l.mouseTimeDisplay;
              if (r && i && n && d) {
                var c = p.createEl("img", {
                    src: r
                  }),
                  f = function(e) {
                    Object.keys(e).forEach(function(t) {
                      var o = e[t],
                        r = d.timeTooltip.el().style;
                      "" !== o ? r.setProperty(t, o) : r.removeProperty(t)
                    })
                  },
                  h = function() {
                    var e = c.naturalWidth,
                      u = c.naturalHeight;
                    if (t.controls() && e && u) {
                      var h = parseFloat(d.el().style.left);
                      if (h = t.duration() * (h / l.currentWidth()), !isNaN(h)) {
                        h /= o.interval;
                        var g = t.currentWidth(),
                          m = a && g < a ? g / a : 1,
                          v = e / n,
                          b = n * m,
                          y = i * m,
                          x = Math.floor(h % v) * -b,
                          k = Math.floor(h / v) * -y,
                          j = e * m + "px " + u * m + "px",
                          w = p.getBoundingClientRect(s.el()).top,
                          O = p.getBoundingClientRect(l.el()).top,
                          P = -y - Math.max(0, O - w);
                        f({
                          width: b + "px",
                          height: y + "px",
                          "background-image": "url(" + r + ")",
                          "background-repeat": "no-repeat",
                          "background-position": x + "px " + k + "px",
                          "background-size": j,
                          top: P + "px",
                          color: "#fff",
                          "text-shadow": "1px 1px #000",
                          border: "1px solid #000",
                          margin: "0 1px"
                        })
                      }
                    }
                  };
                f({
                  width: "",
                  height: "",
                  "background-image": "",
                  "background-repeat": "",
                  "background-position": "",
                  "background-size": "",
                  top: "",
                  color: "",
                  "text-shadow": "",
                  border: "",
                  margin: ""
                }), u.on("mousemove", h), u.on("touchmove", h), t.addClass("vjs-sprite-thumbnails")
              }
            }(n.player, n.options)
          }), n
        }
        return i = t, (r = n).prototype = Object.create(i.prototype), r.prototype.constructor = r, r.__proto__ = i, n
      }(t);
    return r.defaultState = {}, r.VERSION = "0.5.3", e.registerPlugin("spriteThumbnails", r), r
  });
</script>
<script src="<?= base_url() ?>assets/website_assets/js/sprite_thumb.js"></script>
<script src="<?php echo base_url('assets/website_assets/js/shaka-player.compiled.debug.js'); ?>"></script>
    <script src="<?php echo base_url('assets/website_assets/js/videojs-contrib-eme.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/website_assets/js/videojs-shaka.min.js'); ?>"></script>
<?php $trick_play = ($video_details['data']['trick_play_url'] ?? '');
if (!empty($trick_play)) {

  $trick_url = $trick_play['url'];

?>
<?php
  $finalUrl = '';
  $url = $trick_url;

  $newUrl = str_replace('trick_play_images.zip', '', $url);
  $finalUrl = $newUrl . "Thumbnail_{index}.jpg";
}
//$timess = date('H:i:s');
$play_id = $this->input->get('play-video');
$similar = $this->input->get('similar');

?>


<script>
  var times = '';
  var dur_times = '';
  var uuid = '<?= $_SESSION['uuid'] ?? 0; ?>';
  uuid = uuid + '<?= $video_id ?>';

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

  function change_ui() {
    var parentElement = $('.vjs-quality-button');
    var hdIcons = parentElement.find('.vjs-icon-hd');
    hdIcons.removeClass('vjs-icon-hd').addClass('vjs-icon-cog');

  }
  var player;
  var sess_id = "<?=$this->session->id??0?>";
  var max_res = "<?=$max_res??0?>";
  document.addEventListener('DOMContentLoaded', function() {
    var fileurl = '<?= @$finalUrl ?>';
    var vtt = <?php echo json_encode($video_details['data']['vtt_files']); ?>;
    var video_type = '<?= $video_details['data']['is_drm_protected'] ?>';

    var id = "my-video";
    let dashUri = '<?= $video_details['data']['file_url'] ?>';
    licenseUri = `<?= BASEURLAPI ?><?= BASEVERSION ?>onRequestCreateVideoLicense`;
    widevineToken = '<?= ($video_details['data']['token']) ?? "" ?>';
    var fairplayCertUri = 'https://license-global.pallycon.com/ri/fpsKeyManager.do?siteId=<?= SITE_ID ?>';
    if (widevineToken != "") {
      if (dashUri.includes('.m3u8')) {
        var player = videojs(id);
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

        // Define your shaka configuration object
        var shakaConfiguration = {
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
          debug: false,
          sideload: true
        };

        // Apply restrictions if sess_id is greater than 0
        if ((sess_id > 0) && (Number(max_res) > 0)) {
          shakaConfiguration.restrictions = {
            maxHeight: Number(max_res),
            maxBandwidth: 2000000
          };
        }

        player = videojs(id, {
          techOrder: ['shaka'],
          html5: {
            hls: {
              overrideNative: true
            },
            nativeAudioTracks: true,
          },
          headers: {
            'custom-header': 'some value'
          },
          shaka: {
            licenseServerAuth: function(type, request) {
              request.headers['pallycon-customdata-v2'] = widevineToken;
              if (type === shaka.net.NetworkingEngine.RequestType.LICENSE) {
                // Handle specific logic if needed
              }
            },
            configuration: shakaConfiguration
          },
          tracks: [
            <?php foreach ($video_details['data']['vtt_files'] as $vtt) { ?> {
                src: '<?= $vtt['transcript_url']; ?>', // Path to your SRT subtitle file
                kind: 'captions', // Indicate the kind of track (captions, subtitles, descriptions, chapters, or metadata)
                srclang: '<?= $vtt['lang_option']; ?>', // Specify the language of the subtitle track
                label: '<?= $vtt['lang_option']; ?>' // Label to be displayed in the player settings
              },
            <?php } ?>
          ]
        });
        player.src([{
          type: 'application/dash+xml',
          src: dashUri
        }]);

      }

      var mediaHit = true;
      var skip_intro_per = true;
      var recape_intro_per = true;
      var nxt_ep_status = false;
      var next_episode_cont = false;
      var is_next_episode = '<?= $video_details['data']['is_next_episode'] ?>';
      var next_episode_start = '<?= $video_details['data']['next_episode_start'] ?>';
      var next_episode_end = '<?= $video_details['data']['next_episode_end'] ?>';
      var check_intro = '<?= $video_details['data']['skip_intro'] ?>';
      var skip_start = '<?= $video_details['data']['skip_time'] ?>';
      var skip_end = '<?= $video_details['data']['skip_end'] ?>';
      var check_recap = '<?= $video_details['data']['is_recap'] ?>';
      var recap_start = '<?= $video_details['data']['recap_start'] ?>';
      var recap_end = '<?= $video_details['data']['recap_end'] ?>';

      var video = document.querySelector('video');
      player.on('pause', function() {
        // _paq.push(['setUserId', '<?= $userId ?>']);
        // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
        // _paq.push(['trackPageView']);

        // _paq.push(['trackEvent', 'Media', 'Pause', '<?= $video_id . '/' . $video_details['data']['title'] ?>']);
        times = player.currentTime()
        times = convertTimes(times);
        dur_times = player.duration();
        updateTimerDisplay(times, dur_times);
        if ("<?= $video_details['data']['title'] ?>") {
          matomo('<?= $guest_user ?>', 'Pause', "<?= $moto_title . '/' ?>" + times,5);
        }
      });
      var lastPlay = 0;
      player.on('play', function() {
        $('video').attr('data-matomo-title', "<?=  $content_details['data']['title']."-".$video_details['data']['title'] ?>");
        if (lastPlay > 1) {
          // _paq.push(['setUserId', '<?= $userId ?>']);
          // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
          // _paq.push(['trackPageView']);
          // _paq.push(['trackEvent', 'Media', 'Resume', "<?= $moto_title ?>"]);
          times = player.currentTime()
          times = convertTimes(times);
          if ("<?= $video_details['data']['title'] ?>") {
            matomo('<?= $guest_user ?>', 'Resume', "<?= $moto_title . '/' ?>" + times,5);
          }
        } else {
          // _paq.push(['setUserId', '<?= $userId ?>']);
          // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
          // _paq.push(['trackPageView']);
          // _paq.push(['trackEvent', 'Media', 'Play', "<?= $moto_title ?>"]);
          times = player.currentTime();
          times = convertTimes(times);
          if ("<?= $video_details['data']['title'] ?>") {
            matomo('<?= $guest_user ?>', 'Play', "<?= $moto_title . '/' ?>" + times,5);
          }
        }
        times = player.currentTime();
        dur_times = player.duration();
        updateTimerDisplay(times, dur_times);
      });

      player.on('ended', function() {
        times = player.currentTime();
        dur_times = player.duration();
        updateTimerDisplay(times, dur_times, 3);
      });
      <?php if (!empty($next_vid['id'])) { ?>
        next_episode_cont = true;



        let next_ep = ' <div class="next_episode_d" id="nxt-episode"> <div class = "nex_ep"><div class = "nex_ep_head"><h5 class = "mb-0"> Next Up </h5> <img class = "img-fluid player_remove_btn" src="<?= base_url('assets/images/closeVid.png') ?>" alt = "" > </div> <a href = "' + "<?= base_url((($next_vid['similar'] != 1) ? 'play-media?id=' : 'play-episode?id=')) . aes_cbc_encryption_($next_vid['id']) . '&play-video=' . $play_id ?>" + '"><div class = "ep_cen_img my-epiosode-bar"> <img src = "' + "<?= $next_vid['poster_url'] ?>" + '" class = "img-fluid" alt = "img"><div class="play_episode_timer"> <div class = "eps_dt_play"><div class = "play_ep_position"><span class = "eps_play_circle" role = "progressbar" aria-valuenow = "0" style = "width: 45px; height: 45px; transform: rotate(-90deg);"> <svg class="eps_progress_play" viewBox="0 0 100 100"><circle cx="50" cy="50" r="45" fill="none" class="eps_dt_1" /><path id="progress" d="M 50, 5a 45,45 0 0,1 0,90a 45,45 0 0,1 0,-90" fill="none" stroke-linecap="round" stroke-width="8" stroke="#fff" /></svg> </span></div> </div> </div> <div class="progress_ep" id="progress_episode"><div class="inner"><div class = "player_episode_icon"><img src="<?= base_url('assets/images/next_ep_play.svg') ?>" alt="next_ep" class = "img-fluid" alt = "play"></div> </div> </div > </div> </a> <p class = "nex_ep_dt h7"> ' + "<?= $next_vid['title'] ?>" + ' </p> </div > </div>';



        var controlBar = document.querySelector('.vjs-control-bar');
        controlBar.insertAdjacentHTML('afterend', next_ep);
        $('#nxt-episode').hide();
        nxt_ep_status = true;
      <?php } ?>

      $('.player_remove_btn').on('click', function() {
        next_episode_cont = false;
        $('#nxt-episode').hide('slow');
        nxt_ep_status = true;
        // $('.vjs-control-bar').show();
        $('.vjs-control-bar').css('display', 'flex').show();
      });

      let session = "<?= $this->session->id ?>";
      let is_free = "<?= $video_details['data']['is_free'] ?>";
      let free_time = "<?= $video_details['data']['free_time'] ?>";
      let free_episode = "<?= $video_details['data']['free_episode'] ?>";
      let deletedata = true;
      player.on('timeupdate', function() {
        if(mediaHit==true){
          media_hit();
        }
        $('.currentTime-duration span:nth-child(1)').html(HHMMSS(parseInt(player.currentTime())))
        //localStorage.setItem('lastPlayTime' + uuid, player.currentTime());
        // lastPlay = localStorage.getItem('lastPlayTime' + uuid);
        var Ctime = Math.ceil(player.currentTime());
        var t_time = Math.ceil(player.duration());
        // if (((t_time - Ctime) <= 5) && (deletedata == true)) {
        //   deletedata = false;
        //   console.log('deleted');
        //   updateTimerDisplay(Ctime, t_time, 3);
        // }else{
        //   deletedata = true;
        // }
        if (Ctime >= free_time && !session && (Ctime > 1)) {
          player.pause();
          if (player.isFullscreen()) {
            player.exitFullscreen();
          }
          Swal.fire({
            text: "<?= $this->lang->line("free_create_account") ?>",
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
              redirect_url = "<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" + '&dur=' + Ctime;
              matomo('Page', 'View', 'LoginPopup',5);
              await set_userdata(redirect_url);
              window.location.href = "<?= base_url('user-login') ?>";
            } else if (result.dismiss) {
              matomo('Page', 'View', 'cancelPopup',5);
              await set_userdata(redirect_url);
              player.currentTime(0);
            }
          });
        }
        if (Ctime >= next_episode_start && Ctime <= next_episode_end && next_episode_start != '' && is_next_episode == 1) {
          if (next_episode_cont) {
            $('#nxt-episode').show(500);

            $('#progress').css('stroke-dasharray', 283 + ((Ctime - next_episode_start) * (277 / (next_episode_end - next_episode_start))));
            nxt_ep_status = true;
            // $('.vjs-control-bar').hide();
            $('.vjs-control-bar').css('display', 'flex').hide();
            if ((next_episode_end - Ctime) <= 0) {
              window.location.href = "<?= base_url((($next_vid['similar'] != 1) ? 'play-media?id=' : 'play-episode?id=')) . aes_cbc_encryption_($next_vid['id']) . '&play-video=' . $play_id ?>"
            }
          }
        } else {
          if (nxt_ep_status) {
            next_episode_cont = true;
            $('#nxt-episode').hide(500);
            // $('.vjs-control-bar').show();
            $('.vjs-control-bar').css('display', 'flex').show();
          }
        }
        // console.log(Ctime);console.log(skip_start +"---"+skip_end+"---"+check_intro+"--"+skip_intro_per);

        if ((Ctime > skip_start) && (Ctime < skip_end) && (check_intro == 1) && skip_intro_per == true) {
          $("#skipvalue").show();
          $('.vjs-time-divider').addClass('d-none');
          $('.vjs-current-time').addClass('d-none');
          $('.vjs-duration.vjs-time-control.vjs-control').addClass('d-none');
          $('#skipvalue').css({
            'position': 'absolute',
            'top': '-45px'
          });

        } else {
          if (Ctime > skip_end) {
            skip_intro_per = false;
          }
          $("#skipvalue").hide();
          $('.vjs-time-divider').addClass('d-block');
          $('.vjs-current-time').addClass('d-block');
          $('.vjs-duration.vjs-time-control.vjs-control').addClass('d-block');
        }
        // console.log(Ctime);console.log(recap_start +"---"+recap_end+"---"+check_recap+"--"+recape_intro_per);
        if ((Ctime >= recap_start) && (Ctime < recap_end) && (check_recap == 1) && recape_intro_per == true) {
          // console.log("-----iner==");
          $("#recape").show();
          $('.vjs-time-divider').addClass('d-none');
          $('.vjs-current-time').addClass('d-none');
          $('.vjs-duration.vjs-time-control.vjs-control').addClass('d-none');
          $('#recape').css({
            'position': 'absolute',
            'top': '-45px'
          });
        } else {
          if (Ctime > recap_end) {
            recape_intro_per = false;
          }
          $("#recape").hide();
          $('.vjs-time-divider').addClass('d-block');
          $('.vjs-current-time').addClass('d-block');
          $('.vjs-duration.vjs-time-control.vjs-control').addClass('d-block');
        }
      });

      function loadLastPlayTime(state = null) {
        // var lastPlayTime = localStorage.getItem('lastPlayTime' + uuid);
        var lastPlayTime = false;
        if ("<?= $this->session->id ?>") {
          if ("<?= $dur ?>") {
            player.currentTime("<?= $dur ?>");
          }
        }
        fetchCacheData(cachekey).then((result) => {
          if (result.data) {
            result.data.forEach((item) => {
              if (item.video_id == video_id && item.is_deleted != 1) {
                player.currentTime(item.paused_at);
                lastPlayTime = true;
              }
            })
          }
        });
        if (lastPlayTime) {
          player.play();
        }
        if (state == 'back') {
          window.history.back();
        }
      }


      // Load the last play time from localStorage

      if ("<?= $this->session->id ?>") {
        loadLastPlayTime();
      }
      times = player.currentTime();
      dur_times = player.duration();
      if (player.paused) {
        //player.play();
        //  play_paused(true)
        updateTimerDisplay(times, dur_times);
      } else {
        //player.play(); 
        //play_paused(false)
        updateTimerDisplay(times, dur_times);
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

      player.one("loadedmetadata", () => {
        var controlBar = document.querySelector('.vjs-control-bar'); // Get the control bar element
        controlBar.insertAdjacentHTML('afterend', customDiv);
        var currentTime_duration = $(`
          <div class="currentTime-duration">
            <span></span>
            <span>/</span>
            <span></span>
          </div>
       `)

        $('.vjs-progress-control').before(currentTime_duration);
        $('.currentTime-duration span:nth-child(3)').html(HHMMSS(parseInt(player.duration())))



      });


      function HHMMSS(secondss) {

        //console.log(secondss, 'secondss')
        if (isNaN(secondss)) {
          $('.currentTime-duration').addClass('d-none')
        } else {
          let totalSeconds = secondss;
          let hours = Math.floor(totalSeconds / 3600);
          totalSeconds %= 3600;
          let minutes = Math.floor(totalSeconds / 60);
          let seconds = totalSeconds % 60;
          minutes = String(minutes).padStart(2, "0");
          hours = String(hours).padStart(2, "0");
          seconds = String(seconds).padStart(2, "0");

          if (hours == '00') {
            return +minutes + ":" + seconds;
          } else {
            return hours + ":" + minutes + ":" + seconds;
          }
        }
      }

      function displayVolume() {
        var volumeDisplay = $('.voll');
        volumeDisplay.innerText = getVolumePercentage() + '%';
      }

      function logVolume() {
        var currentVolume = player.volume() * 100;
        var displayVol = currentVolume.toFixed(2).split('.')
        $('.voll').html(displayVol[0] + '%').addClass('d-block');
        setTimeout(function() {
          $('.voll').removeClass('d-block')
        }, 300)
      }

      function toggleFullscreen() {
        if (document.fullscreenElement || document.webkitFullscreenElement ||
          document.mozFullScreenElement || document.msFullscreenElement) {
          // If the document is currently in fullscreen mode, exit fullscreen
          if (document.exitFullscreen) {
            document.exitFullscreen();
          } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
          } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
          } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
          }
        } else {
          // If the document is not in fullscreen mode, enter fullscreen
          if (player.requestFullscreen) {
            player.requestFullscreen();
          } else if (player.webkitRequestFullscreen) {
            player.webkitRequestFullscreen();
          } else if (player.mozRequestFullScreen) {
            player.mozRequestFullScreen();
          } else if (player.msRequestFullscreen) {
            player.msRequestFullscreen();
          }
        }
      }

      $(document).on("keydown", async (e) => {
        const playerVolume = player.volume();
        const playerCurrentTime = player.currentTime();
        switch (e.code) {
          case "Space":
          case "KeyK":
          case "Enter":
            e.preventDefault();
            if (player.paused()) {
              player.play();
            } else {
              player.pause();
            }
            break;
          case "ArrowRight":
          case "KeyL":
            e.preventDefault();
            await player.currentTime(playerCurrentTime + 10);
            await animateNotificationIn(false);
            break;
          case "ArrowLeft":
          case "KeyJ":
            e.preventDefault();
            await player.currentTime(playerCurrentTime - 10);
            await animateNotificationIn(true);
            break;
          case "ArrowUp":
            e.preventDefault();
            player.muted(false);
            player.volume(Math.min(playerVolume + 0.1, 1)); // Ensure volume doesn't exceed 1
            logVolume();
            break;
          case "ArrowDown":
            e.preventDefault();
            player.volume(Math.max(playerVolume - 0.1, 0)); // Ensure volume doesn't go below 0
            logVolume();
            break;
          case "KeyF":
            e.preventDefault();
            toggleFullscreen();
            break;
          case "KeyM":
            e.preventDefault();
            player.muted(!player.muted());
            logVolume();
            break;
          default:
            return; // Exit if the key doesn't match any case
        }
      });




      var Button = videojs.getComponent("Button");
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

      // videojs.registerComponent("pictureInPictureToggle", pictureInPictureToggle);
      // player.getChild("ControlBar").addChild("pictureInPictureToggle", {}, 6);

      $(document).ready(function() {
        var browserName = getBrowserName();

        if (browserName == 'Mozilla Firefox') {
          $('.vjs-subs-caps-button').css('margin-left', 'auto')
          $('.textQuality').addClass('quality-weight');

        } else {
          videojs.registerComponent("pictureInPictureToggle", pictureInPictureToggle);
          player.getChild("ControlBar").addChild("pictureInPictureToggle", {}, 6);
        }
      });

      function animateNotificationIn(isRewinding) {
        // console.log(isRewinding, "----");
        isRewinding ? $('.notification').eq(0).addClass('animate-in') : $('.notification').eq(1).addClass('animate-in');
        setTimeout(() => {
          $('.notification').removeClass('animate-in')
        }, 500)
      }


      $(document).on('click', '.skip-back.skip-10', function() {
        time = player.currentTime();
        //console.log(times);
        times = convertTimes(time);
        timm= convertTimes(time+10);
        // _paq.push(['setUserId', '<?= $userId ?>']);
        // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
        // _paq.push(['trackPageView']);
        // _paq.push(['trackEvent', 'Media', 'Rewind', "<?= $moto_title . '/' ?>" + times]);
        animateNotificationIn(true);
        matomo_for_back('<?= $guest_user ?>'+'/ total duration :<?=$formatted_time?>'+ '/ from duration: '+ times, ' Rewind:10 seconds/to duration: '+ timm, "<?= $moto_title . '/' ?>" +'/<?=$genn?>'); 

        //matomo('<?= $guest_user ?>', 'Rewind', "<?= $moto_title . '/' ?>" + times);
      })

      $(document).on('click', '.skip-forward.skip-10 ', function() {
        time = player.currentTime();
        //console.log(times);
        times = convertTimes(time);
        timm= convertTimes(time+10);
       // console.log(timm);
        
        // _paq.push(['setUserId', '<?= $userId ?>']);
        // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
        // _paq.push(['trackPageView']);
        // _paq.push(['trackEvent', 'Media', 'Skip-Forword', "<?= $moto_title . '/' ?>" + times]);
        animateNotificationIn(false);
        matomo_for_back('<?= $guest_user ?>'+'/ total duration :<?=$formatted_time?>'+ '/ from duration: '+ times, ' forward:10 seconds/to duration: '+ timm, "<?= $moto_title . '/' ?>" +' /<?=$genn?>'); })


      player.aspectRatio('16:9');
      player.qualityPickerPlugin();
      player.seekButtons({
        forward: 10,
        back: 10
      });
      player.landscapeFullscreen({
        fullscreen: {
          enterOnRotate: true,
          alwaysInLandscapeMode: true,
          iOS: true
        }
      });



      change_ui();
      if (fileurl) {
        player.spriteThumbnails({
          url: '<?= @$finalUrl ?>',
          width: '<?= @$trick_play['width'] ?>',
          height: '<?= @$trick_play['height'] ?>',
          columns: '<?= @$trick_play['columns'] ?>',
          rows: '<?= @$trick_play['rows'] ?>'
        });
      }
      document.addEventListener('DOMContentLoaded', e => {
        var video = document.getElementById("my-video");
        var menudisplay = document.getElementById("menudisplay");
        video.addEventListener('ended', e => {
          menudisplay.style.display = "block";
          video.style.display = "none";

        });


      });

      var title = document.createElement('div');
      title.className = 'vjs-title';
      title.textContent = "<?= $video_details['data']['title'] ?? '' ?>";
      $('#my-video').append(title);



      var skipButn = $(`<button class="btn skipintros" id="skipvalue">Skip Intro</button>`)
      $('.vjs-control-bar').append(skipButn);
      var skipButn1 = $(`<button class="btn skipintros" id="recape">Recap</button>`)
      $('.vjs-control-bar').append(skipButn1);

      var back_nav_btn = '<button class="back-button" onclick="update_data()"> <i class = "fa fa-chevron-left text-white"> </i> </button>';
      $('#my-video').append(back_nav_btn);
      var vd_shadow_title = '<div class="vd_upper-shadow"> </div>';
      $('#my-video').append(vd_shadow_title);
       var vd_touchcustome='<div class="vd_screen_sub3"><button class="rewindIcon rewindicon_touch" type="button"><img src="<?= base_url('assets/website_assets/css/video_player_icons/back10.svg'); ?>" class="img-fluid" alt="back10"></button><button class="vjs-paly_touch vjs-play-control vjs-control vjs-button vjs-paused" type="button" title="Play" aria-disabled="false"><img id="play-pause-icon"src="<?= base_url('assets/website_assets/css/video_player_icons/play.svg'); ?>" class="img-fluid" alt="play"></button><button class="fast-forward-icon fast-forword-icon-touch" type="button" aria-disabled="false"><img src="<?= base_url('assets/website_assets/css/video_player_icons/for10.svg'); ?>" class="img-fluid" alt="for10"></button></div>';
$('#my-video').append(vd_touchcustome);
var clickTimeout;
var clickDelay = 300; // Maximum time between clicks to register as double click

function handleRewind() {
  //alert("hi");
  var playerCurrentTime = player.currentTime();
  player.currentTime(playerCurrentTime - 10);
}

function handleFastForward() {
  var playerCurrentTime = player.currentTime();
  player.currentTime(playerCurrentTime + 10);
}

function detectDoubleClick(callback) {
  return function() {
    if (clickTimeout) {
      clearTimeout(clickTimeout);
      clickTimeout = null;
      callback();
    } else {
      clickTimeout = setTimeout(function() {
        clickTimeout = null;
      }, clickDelay);
    }
  };
}

$(document).ready(function() {
  $('.rewindicon_touch').on('click', detectDoubleClick(handleRewind));
  $('.fast-forword-icon-touch').on('click', detectDoubleClick(handleFastForward));

  function updatePlayPauseIcon() {
    if (player.paused()) {
      $('#play-pause-icon').attr('src', '<?= base_url('assets/website_assets/css/video_player_icons/play.svg'); ?>'); // Replace with actual path
    } else {
      $('#play-pause-icon').attr('src', '<?= base_url('assets/website_assets/css/video_player_icons/pause.svg'); ?>'); // Replace with actual path
    }
  }

  // Initial icon state
  updatePlayPauseIcon();

  // Listen for play and pause events
  player.on('play', updatePlayPauseIcon);
  player.on('pause', updatePlayPauseIcon);

  $('.vjs-paly_touch').on('click', function() {
    if (player.paused()) {
      player.play();
    } else {
      player.pause();
    }
  });
});

    }
    $('#skipvalue').click(function() {
      if ("<?= $video_details['data']['title'] ?>") {
        matomo('video', 'SkipIntro', "<?= $moto_title ?>",5);
      }
      player.pause();
      player.currentTime(skip_end);
      player.play();
    });

    $('#recape').click(function() {
      if ("<?= $video_details['data']['title'] ?>") {
        matomo('video', 'SkipRecap', "<?= $moto_title ?>",5);
      }
      player.pause();
      player.currentTime(recap_end);
      player.play();
    });


  });
</script>
<script src="<?= base_url('assets/website_assets/js/fullscreen.js') ?>"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/videojs-landscape-fullscreen@1.4.6/dist/videojs-landscape-fullscreen.min.js"></script> -->


<script>
  $(document).ready(function() {
    $("#recape").hide();
    $("#skipvalue").hide();

    if ("<?= $similar ?>") {
      if ("<?= $video_details['data']['title'] ?>") {
        matomo('SimilarToThis', 'Select', "<?= $moto_title ?>",5);
      }

    }
    $("#copyBtn").click(function() {
      // Select the text in the input field
      $("#inputText").select();

      // Copy the selected text to clipboard
      document.execCommand('copy');
      Swal.fire('Link Copied ', '', 'success');

      // Deselect the text
      window.getSelection().removeAllRanges();
    });
    $('.back-button').click(function() {
      //               _paq.push(['setUserId', '<?//= $userId ?>']);

      //       _paq.push(['setDocumentTitle', '<?//= $video_details['data']['title'] ?>']);
      //       _paq.push(['trackPageView']);
      //       _paq.push(['trackEvent', 'Media', 'Stop', '<?//= $moto_title ?>']);
      //       times = player.currentTime()
      //       times = convertTimes(times);
      //       matomo('<?//= $guest_user ?>', 'Stop', '<?//= $moto_title . '/' ?>'+times);
      //  matomo('ContinueWatching', 'Add', '<?//= $moto_title . '/' ?>'+times);
    })

  });

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


  function moveSeekButton() {
    // / $('.vjs-seek-button.skip-back').insertBefore($('.vjs-play-control.vjs-control.vjs-button'));
    setTimeout(() => {
      $('.vjs-quality-button .vjs-menu .vjs-menu-content').prepend('<div class="textQuality">Quality</div>');

      $('.vjs-audio-button .vjs-menu .vjs-menu-content').prepend('<div class="textQuality">Audio Language</div>');

      $('.vjs-subs-caps-button .vjs-menu .vjs-menu-content').prepend('<div class="textQuality">Subtitle</div>');

      $('.vjs-subs-caps-button').removeClass('vjs-hidden');
      $('.vjs-audio-button').removeClass('vjs-hidden');

    }, 1000)
  }
  $(window).on("load", function() {
    moveSeekButton();
  });


  var type = '<?= $video_details['data']['is_live'] ?>';
  if (type == 1) {
    $(window).on("load", function() {
      $('.vjs-live-control').removeClass('vjs-hidden');
      $('.vjs-progress-control, .vjs-remaining-time').addClass('vjs-hidden');


    });
  }

  window.onload = function() {
    setTimeout(function() {

      $('.vjs-audio-button').removeClass('vjs-hidden');
    }, 2000);
  };

  $(document).ready(function() {


    // Get the video player instance
    player = videojs('my-video');
    player.muted(true);

    player.play();
    player.volume(0);
    // Add event listener to the subtitles button
    $(document).on('click', '.vjs-button', function() {
      // Get the menu element
      var menu = $(this).next('.vjs-menu');

      // Remove the class 'vjs-lock-showing' from the menu element
      menu.removeClass('vjs-lock-showing');
    });

  });





  // Load the last play time from localStorage
  // loadLastPlayTime();
  // function update_data() {
  //   times = player.currentTime();
  //   dur_times = player.duration();
  //   updateTimerDisplay(times, dur_times);
  //   localStorage.setItem('lastPlayTime' + uuid, times);
  //   setTimeout(function() {
  //     window.history.back();
  //   }, 500);

  // }


  function update_data() {

    var play_url = '<?= $play_id ?>';
    var redirect = "<?= $video_details['data']['redirtct'] ?>";
    // _paq.push(['setUserId', '<?= $userId ?>']);
    // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
    // _paq.push(['trackPageView']);
    // _paq.push(['trackEvent', 'Media', 'Stop', "<?= $moto_title ?>"]);
    times = player.currentTime()
    times = convertTimes(times);
    if ("<?= $video_details['data']['title'] ?>") {
      matomo('<?= $guest_user ?>', 'Stop', "<?= $moto_title . '/' ?>" + times,5);
      matomo('ContinueWatching', 'Add', "<?= $moto_title . '/' ?>" + times);
    }
    var ct = player.currentTime();
    var dur = player.duration();
    if ((dur - ct) <= 5) {
      updateTimerDisplay(ct, dur, 3);
    } else {
      updateTimerDisplay(ct, dur);
    }
    setTimeout(function() {
      if (redirect == 1) {
        window.location.href = "<?= base_url() ?>";

      } else if (play_url) {
        window.location.href = "<?= base_url() . 'play-video?id=' . $play_id ?>";
      } else {
        window.history.back();
      }
    }, 500);
  }

  $(document).ready(function() {
    window.addEventListener('online', handleConnectionChange);
    window.addEventListener('offline', handleConnectionChange);
  });

  function handleConnectionChange(event) {
    if (event.type == "offline") {
      $('#my-video').append('<h4 class="no_intrnt_text text-white network_bott"><?= $this->lang->line("nointernet-connection") ?></h4>');
      //console.log('offline ==>');
      //overlay("Please wait.. internet is Not available.");
    }
    if (event.type == "online") {
      $('#my-video').find('.no_intrnt_text').remove();
      $('#my-video').append('<h4 class="intrnt_text text-white network_bott"><span class="network_size">✓</span> <?= $this->lang->line("internet-connection") ?></h4>');
      setTimeout(() => {
        $('#my-video').find('.intrnt_text').remove();
      }, 1000)
      //overlay("");
      //console.log('online ==>');
    }
  }


  function matomo(user, type, title,hits=4) {

    $.ajax({
      type: 'POST',
      url: '<?= base_url('/web/Home/matomo_hit') ?>',
      dataType: "json",
      data: {
        user: user,
        types: type, // Typo here, it should be type instead of types
        type: hits,
        title: title,
        genres: '<?= $content_details['data']['genres'] ?>'
      },
      success: function(data) {
        if (data.status == 1) {

        }

      }

    });
  }

  function matomo_for_back(user, type, title,hits=9) {

$.ajax({
  type: 'POST',
  url: '<?= base_url('/web/Home/matomo_hit') ?>',
  dataType: "json",
  data: {
    user: user,
    types: type, // Typo here, it should be type instead of types
    type: hits,
    title: title,
  },
  success: function(data) {
    if (data.status == 1) {

    }

  }

});
}

  async function set_userdata(url) {
    return new Promise((resolve,reject)=>{
      $.ajax({
        url: "<?= base_url('web/login_register/set_session') ?>",
        type: "post",
        data: {
          url
        },
        success: function(res) {

        }
      })
    })    
  }
</script>


<script>
  // Add an entry to the history stack to handle popstate correctly
  window.history.pushState({
    page: 1
  }, document.title, "");
  window.history.replaceState({
    page: 2
  }, document.title, "");
  // Listen for the popstate event
  //var player = videojs('my-video');

  $(document).ready(function() {
    if ('<?= $play_id ?>') {
      if ("<?= $video_details['data']['title'] ?>") {
        matomo('Episode', 'Select', "<?= $moto_title ?>",5);
      }

    }
    var profile_id = "<?= $_SESSION['profile_id'] ?? ''; ?>";
    var video_id = '<?= $video_details['data']['id']; ?>';
    var cachekey = profile_id + '-continueWatching';

    $(window).on('popstate', function(event) {
      //alert(player);
      //alert('Back button was pressed.');
      try {
        var crTime = player.currentTime();
        var dur = player.duration();
        let activity = 1;


        var currentTime = sessionStorage.getItem("curreTime");
        var video_duration = sessionStorage.getItem("duration");
        var type_id = '<?= @$video_details['data']['type_id']; ?>';
        var show_id = '<?= $video_details['data']['id']; ?>';
        var title = "<?= $video_details['data']['title']; ?>";
        var thumbnail = '<?= $video_details['data']['thumbnail_url']; ?>';
        var poster_url = '<?= $video_details['data']['poster_url']; ?>';

        var id = '<?= @$video_details['data']['show_id']; ?>';
        var watch_time = '<?= @$video_details['data']['total_watch_time'] ?>';
        var remaining_time = '<?= @$video_details['data']['remaining_time'] ?>';
        var encrypted_id = '<?= $encrypted_id ?>';
        var twice_time = '<?= @$video_details['data']['twice_time'] ?>';
        var total_watch_time = watch_time + crTime;
        if ((dur - 6) < crTime) {
          activity = 3;
        }

        let update_data = {
          "title": title,
          "poster_url": poster_url,
          "show_id": id,
          "video_id": show_id,
          "encrypted_id": encrypted_id,
          "crTime": crTime,
          "dur": dur
        }

        if ((type_id != 2 || type_id != 3) && (crTime > 0)) {
          update_cache(cachekey, show_id, update_data, activity);
        }
        //alert("final");
      } catch (e) {
        console.log(e);
      } finally {
        window.history.back();
      }
    });
  });


  function convertTimes(timeInSeconds) {
    var minutes = Math.floor(timeInSeconds / 60);
    var seconds = Math.round(timeInSeconds % 60);
    var hours = Math.floor(minutes / 60);
    minutes = minutes % 60;

    // Add leading zeros to hours, minutes, and seconds
    var formattedHours = ('0' + hours).slice(-2);
    var formattedMinutes = ('0' + minutes).slice(-2);
    var formattedSeconds = ('0' + seconds).slice(-2);

    // Combine the formatted components into the desired format
    var time = formattedHours + ':' + formattedMinutes + ':' + formattedSeconds;
    return time;
  }

  function media_hit() {
  if (player.duration() > 0) {
    mediaHit = false;
    // Fetch the Matomo URL from the session data
    var urlmatomo = '<?= $this->session->userdata("matamo_url") ?>';
    var newUrl = urlmatomo.replace("matomo.php", "");
    // Initialize the _paq array if not already initialized
    window._paq = window._paq || [];

    (function() {
      var u = newUrl;
      window._paq.push(['setTrackerUrl', u + 'matomo.php']);
      window._paq.push(['setSiteId', 1]);

      var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
      g.type = 'text/javascript'; g.async = true; g.defer = true; g.src = u + 'matomo.js'; s.parentNode.insertBefore(g, s);

      // Once Matomo is loaded, configure the tracker
      g.onload = function() {
        window._paq.push(['setUserId', '<?= $userId ?>']);
        window._paq.push(['setCustomDimension', 1, '<?= WEB_VERSION ?>']); // Custom dimension 1
        window._paq.push(['setCustomDimension', 2, 'Website']); // Custom dimension 2
        window._paq.push(['setCustomDimension', 3, detectBrowser().name]); // Custom dimension 3

        // Tracker methods like "setCustomDimension" should be called before "trackPageView"
        window._paq.push(['trackPageView']);
        window._paq.push(['enableLinkTracking']);
      };
    })();
  }
}

</script>
<script>
  $(document).ready(function() {
      // Add event listener to the subtitles button
      if ($(window).width() <= 1024) {
        $(document).on('click', '.vjs-menu-button', function() {

          var menu = $(this).next('.vjs-menu');

          // Check if the menu is currently visible or hidden
          if (menu.hasClass('d-none') || !menu.hasClass('d-block')) {
            menu.removeClass('d-none').addClass('d-block');
          } else {
            menu.removeClass('d-block').addClass('d-none');
          }

        });
      }
    });
</script>