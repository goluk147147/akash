<style type="text/css">
  /*== Player watermark Please don't romeve css ==; */
  /*.plyr::before {
    box-sizing: border-box;
    content: <?= TITLE; ?>;
    z-index: 100;
    color: #fff;
    font-weight: 500;
    left: 7px;
    font-size: 14px;
    top: 3px;
    position: absolute;
  }*/

  .item {
    position: relative;
    border: 0;
    padding: 10px;
  }

  .ppl_vd {
    overflow: hidden;
  }

  .vjs-time-divider {
    display: none !important;
  }

  .vjs-current-time {
    display: none !important;
  }

  .banner_after_navbar .vjs-poster {
    height: 100% !important;
  }

  .vjs-duration {
    display: none !important;
  }

  .item:hover {
    background: #c82222;
  }

  .video-js *,
  .video-js ::before,
  .video-js ::after {
    box-sizing: inherit;

  }

  .vjs-icon-hd::before {
    content: "\f114";

  }

  *,
  ::after,
  ::before {
    box-sizing: border-box;

  }

  .contentMenu .icon {
    font-size: 21px !important;
  }

  .vjs-subs-caps-button .contentMenu {
    margin-left: auto !important;
  }

  .ppl_video {
    overflow: hidden;
  }

  .vjs-control-bar {
    display: flex;
  }

  @media only screen and (min-width: 320px) and (max-width: 767px) {
    .ppl_vd {
      overflow: auto;
    }
  }

  #nxt-episode {
    display: none;
  }

  .no_intrnt_text {
    width: 100%;
    text-align: center;
    position: absolute;
    /*    top: 50%;*/
    bottom: 0px;

    /*    transform: translate(-50%, -50%);*/
    background: #474a58c2;
    font-size: 13px;
    /*    border-radius: 5px;*/
    padding: 2px 0px;
  }

  .intrnt_text {
    width: 100%;
    text-align: center;
    position: absolute;
    /*    top: 50%;*/
    bottom: 0px;

    /*    transform: translate(-50%, -50%);*/
    background: #095ae5;
    font-size: 13px;
    /*    border-radius: 5px;*/
    padding: 2px 0px;
  }

  .episode_list {
    /*position: absolute !important;
    left: 35%;*/
    /* width: 7em !important; */
    /* margin-left: auto !important; */
    /* text-transform: capitalize !important; */
  }

  .next_ep {
    /* position: absolute !important;
    left: 42%;*/
    width: 12em !important;
    text-transform: capitalize !important;
  }

  /* .vjs-play-control {
    order: -1;
  } */


  .ep_heading {
    font-size: 22px;
    color: var(--white);
  }

  #play_episode_list .modal-dialog {
    width: 100% !important;
    max-width: 100% !important;
  }

  #play_episode_list .modal-content {
    background: #000;
  }

  .epiose_close_icon {
    width: 35px;
    height: 35px;
    background: rgba(41, 41, 41, 1);
    border-radius: 50%;
  }

  .episode_body .modal-header {
    border-bottom: none !important;
  }

  .episode_body {
    padding: 40px !important;
  }

  #play_episode_list .modal-dialog {
    width: 100% !important;
    max-width: 100% !important;
    margin: 0 !important;
    height: 100%;
  }

  .episodes_tab_btns {
    padding: 30px 0;
  }

  .episodes_tab_btns .ep_tab_dt {
    border-bottom: none;
    white-space: nowrap;
    overflow-x: auto;
    width: 100%;
    flex-wrap: nowrap;
  }

  .ep_tab_dt .nav-link.active {
    background-color: var(--pbg);
    color: var(--white);
    border-color: none;
    font-size: 14px;
    padding: 7px 30px;
  }

  .ep_tab_dt .nav-link {
    background-color: rgba(37, 37, 37, 1);
    color: rgba(138, 138, 138, 1);
    border: none;
    font-size: 14px;
    padding: 7px 30px;
    margin-right: 20px;
    border-radius: 7px !important;
  }

  .episodeSEction {
    display: flex;
    flex-wrap: wrap;
  }

  .playepsode_list {
    width: 24%;
    margin: 0 10px 20px 0;
  }

  .ep_tab_dt::-webkit-scrollbar {
    width: inherit !important;
    height: 2px;
  }

  @media (min-width: 576px) {
    #play_episode_list .modal-dialog {
      width: 100% !important;
      max-width: 100% !important;
      margin: 0 !important;
      height: 100%;
    }
  }

  @media only screen and (min-width: 320px) and (max-width: 767px) {
    .playepsode_list {
      width: 49%;
      margin: 0 10px 20px 0;
    }

    .episode_body {
      padding: 15px !important;
    }

    .playepsode_list {
      width: 47.5%;
      margin: 0 7px 20px 0;
    }
  }

  @media only screen and (min-width: 601px) and (max-width: 901px) {
    .playepsode_list {
      width: 32% !important;
      margin: 0 7px 20px 0;
    }

    .episode_body {
      padding: 15px !important;
    }

    .playepsode_list {
      width: 47.5%;
      margin: 0 7px 20px 0;
    }
  }

  @media(min-width:1800px) {
    .playepsode_list {
      width: 19.3%;
      margin: 0 10px 20px 0;
    }
  }

  #progress {
    stroke-dasharray: 283;
    stroke-dashoffset: 283;
  }

  .vjs-audio-button.vjs-hidden {
    display: block !important;
  }

  .vjs-subs-caps-button.vjs-hidden {
    display: block !important;
  }

  .contentMenu.vjs-hidden {
    display: block !important;
  }

  .vjs-icon-hd.vjs-hidden {
    display: block !important;
  }

  .rewindIcon.vjs-hidden {
    display: block !important;
  }

  .fast-forward-icon.vjs-hidden {
    display: block !important;
  }

  .vjs-volume-panel.vjs-hidden {
    display: block !important;
  }
</style>
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

$data = @$video_details['data']['transcribe_data'];
// $srtFiles = array_filter($data, function($entry) {
//   return isset($entry['subtitle_file_format']) && @$entry['subtitle_file_format'] == 1;
// });


// Output the filtered array
//pre($video_details['data']);
if (!$this->session->userdata('id')) {
  $userId = $this->session->userdata('tempuuid');
} else {
  $type = $this->session->userdata('Iskid') == 0 ? 'Adult' : 'Child';
  $userId = $this->session->userdata('id') . '_' . $this->session->userdata('profile_id') . '_' . $type;
}

$play_id = $this->input->get('play-video');
$similar = $this->input->get('similar');


?>
<?php if (isset($video_details['data']['id'])) { ?>
  <section class="position-relative banner_after_navbar pb_pl_video">
    <div class="video-container">
      <!--  <button class="back-button" onclick="update_data()">
        <i class="fa fa-chevron-left text-white"></i>
      </button> -->
      <video data-matomo-title="<?=$content_details['data']['title']."-".$video_details['data']['title'] ?>" title="" id="my-video" poster="" preload="auto" class="video-js vjs-default-skin  vjs-big-play-centered ppl_video" controls>
        <source src="<?= @$video_details['data']['file_url'] ?>" type="application/x-mpegURL">
        <?php if (!empty($data)) { ?>
          <?php foreach ($srtFiles as $item) { ?>
            <track kind='captions' src="<?= $item['transcript_url'] ?>" srclang='en' label="<?= $item['lang_option'] ?>" Unknown>
          <?php } ?>
        <?php } else { ?>

        <?php } ?>
      </video>
    </div>
  </section>

  <?php
  $current_vid = $video_details['data']['id'] ?? null;
  $next_vid = array(
    'id' => 0,
    'similar' => 0,
    'title' => '',
    'poster_url' => '',
    'description' => '',
  );
  $video_details['data']['title'] =  str_replace('-', ' ', $video_details['data']['title']);

  ?>
  <!-- Modal -->
  <?php 
  $moto_title = $content_data;
  if (isset($content_details['data']['season']) && ($content_details['data']['skip_season'] != 1)) { 
    $moto_title = $content_data . '/' . $category_title . '/' .   $season_id . '/' . $season_name . '/' . $episode_id . '/' . $episode_name;
    ?>
    <div class="modal fade" id="play_episode_list" tabindex="-1" aria-labelledby="play_episode_listLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-body episode_body">
            <div class="modal-header p-0">
              <h5 class="modal-title ep_heading">Episodes</h5>
              <div class="epiose_close_icon" onclick="$('#play_episode_list').modal('hide')" onkeypress="handleKeyPress(event)" onkeydown="handleKeyDown(event)" onkeyup="handleKeyUp(event)" tabindex="0" style="cursor: pointer;">
                <img class="img-fluid" src="<?= base_url('assets/images/closeVid.png') ?>" alt="">
              </div>
            </div>
            <div class="episodes_tab_btns">
              <nav>
                <div class="nav nav-tabs ep_tab_dt" id="nav-tab" role="tablist">
                  <?php foreach ($content_details['data']['season'] as $key => $value) { ?>
                    <a class="nav-link <?= (($key + 1) == 1) ? 'active' : ''; ?>" id="nav-season<?= $key + 1 ?>-tab" data-toggle="tab" href="#season<?= $key + 1 ?>_ep" role="tab" aria-controls="season<?= $key + 1 ?>_ep" aria-selected="true">season<?= $key + 1 ?></a>
                  <?php } ?>
                </div>
              </nav>
              <div class="tab-content pt-5" id="nav-tabContent">
                <?php foreach ($content_details['data']['season'] as $key => $value) { ?>
                  <div class="tab-pane fade <?= (($key + 1) == 1) ? 'show active' : ''; ?>" id="season<?= $key + 1 ?>_ep" role="tabpanel" aria-labelledby="season<?= $key + 1 ?>_ep-tab">
                    <div class="episodeSEction">
                      <?php foreach ($value['videos'] as $mkey => $mvalue) {
                        if ($mvalue['is_trailer'] != 1) { ?>
                          <div class="playepsode_list">
                            <div class="episodeFullBox_detail episodeFullBox">
                              <a href="<?= base_url('play-media?id=') . aes_cbc_encryption_($mvalue['id']) ?>">
                                <div class="position-relative">
                                  <img class="img-fluid w-100" src="<?= $mvalue['poster_url'] ?>">
                                  <p class="epiTime"> </p>
                                </div>
                                <div class="py-2">
                                  <p class="episodeOne text-white m-0"><?= $mvalue['title'] ?></p>
                                  <p class="episodeTittle mb-2"><?= $mvalue['description'] ?></p>
                                </div>

                              </a>
                            </div>
                          </div>
                      <?php
                        }
                        if ($content_details['data']['skip_season'] == 0) {
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
                      ?>

                    </div>
                  </div>
                <?php }
                if ((($next_vid['id'] == 0) || $content_details['data']['skip_season'] == 1) && isset($content_details['data']['related'])) {
                  $next_vid = array(
                    'id' => $content_details['data']['related'][0]['id'] ?? 0,
                    'similar' => 1,
                    'title' => $content_details['data']['related'][0]['title'] ?? '',
                    'poster_url' => $content_details['data']['related'][0]['poster_url'] ?? '',
                    'description' => $content_details['data']['related'][0]['description'] ?? ''
                  );
                }
                ?>
                <!-- <div class="tab-pane fade" id="season_2_ep" role="tabpanel"
                                aria-labelledby="season_2_ep-tab">...3</div>
                            <div class="tab-pane fade" id="season_3_ep" role="tabpanel"
                                aria-labelledby="season_3_ep-tab">...4</div> -->
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
  <?php } else {
    if (isset($content_details['data']['related'])) {
      $next_vid = array(
        'id' => $content_details['data']['related'][0]['id'] ?? 0,
        'similar' => 1,
        'title' => $content_details['data']['related'][0]['title'] ?? '',
        'poster_url' => $content_details['data']['related'][0]['poster_url'] ?? '',
        'description' => $content_details['data']['related'][0]['description'] ?? ''
      );
    }
  } ?>


  <?php

  $guest_user = ($this->session->id) ? 'Video' : 'GuestUserVideo';

  $epi_ids = @$found_key + 1;
  // if(sizeof(@$ids)==@$epi_ids){ 
  //     $epi_id = aes_cbc_encryption_(@$found_key); 
  //  }else{
  //      $epi_id = aes_cbc_encryption_(@$ids[$epi_ids]);
  //  }
  $type_id = aes_cbc_encryption_(@$video_details['data']['episodes'][0]['type_id']);
  $array_size = 0; //sizeof($ids);
  // echo $found_key;echo $array_size;die;

  ?>
  <input type="hidden" name="player_chk" id="player_chk" value="">
<?php } else { ?>
  <div class=" col-md-6 m-auto text-center  watchListNo">
    <div class="no_dt_found">
      <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no-found">
      <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
      <p class="mb-0 text_ac"><?= NoListFound; ?></p>
    </div>
  </div>
<?php } ?>
<script src="<?= base_url('assets/website_assets/js/thumbnail.js') ?>"></script>
<!-- <script>
  // Using the ready event provided by Video.js
  videojs('my-video').ready(function() {
    // Get the video element
    var myVideo = this;



  });
</script> -->
<script src="<?= base_url('assets/website_assets/js/fullscreen.js') ?>"></script>
<script src="<?= base_url('assets/website_assets/js/videojs-contrib-quality-levels.min.js') ?>"></script>
<script src="<?= base_url('assets/website_assets/js/progressbar.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
<script>
  <?php
  $ep = 3;
  $tobeplayed = 2; //$ep ;
  if (!empty($video_details['data']['episodes'][$tobeplayed]['id'])) {
    $played_id = aes_cbc_encryption_($video_details['data']['episodes'][$tobeplayed]['id']);
    $played_type_id = aes_cbc_encryption_($video_details['data']['episodes'][$tobeplayed]['type_id']);
    $no_of_eps = sizeof($video_details['data']['episodes']);
  }
  ?>
  var times = '';
  var sess_id = "<?=$this->session->id??0?>";
  var max_res = "<?=$max_res??0?>";
  var id_title = "<?= $moto_title . '/' ?>";
  var profile_id = `<?= $_SESSION['profile_id'] ?? ''; ?>`;
  var video_id = `<?= $video_details['data']['id'] ?? 0; ?>`;
  var cachekey = profile_id + '-continueWatching';

  async function updateTimerDisplay(crTime, dur, activity = 1) {
    $("#overlayonajaxhit").fadeOut(10);
    var currentTime = sessionStorage.getItem("curreTime");
    var video_duration = sessionStorage.getItem("duration");
    var type_id = "<?= @$video_details['data']['type_id']; ?>";
    var show_id = "<?= @$video_details['data']['id']; ?>";
    var title = "<?= @$video_details['data']['title'] ?>";
    var thumbnail = "<?= @$video_details['data']['thumbnail_url']; ?>";
    var poster_url = "<?= @$video_details['data']['poster_url']; ?>";
    var id = "<?= @$video_details['data']['show_id']; ?>";
    var watch_time = "<?= @$video_details['data']['total_watch_time'] ?>";
    var remaining_time = "<?= @$video_details['data']['remaining_time'] ?>";
    var encrypted_id = "<?= $encrypted_id ?>";
    var twice_time = "<?= @$video_details['data']['twice_time'] ?>";
    var total_watch_time = watch_time + crTime;
    if ((dur -crTime)< 39 ){
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

  var skip_season = "<?= @$content_details['data']['skip_season'] ?>";

  function append_button() {
    var button = videojs.getComponent('Button');
    var closeButton = videojs.extend(button, {
      constructor: function() {
        button.apply(this, arguments);
        this.addClass('btn');
        this.addClass('episode_list');
        this.textEl_ = videojs.dom.createEl('span', {
          className: 'btn text-white'
        });
        // Append the span element to the button
        this.el().appendChild(this.textEl_);
        // Set the initial text
        this.updateText("episodes");
      },
      handleClick: function() {
        // this.player().dispose();
        player.pause();
        $('#play_episode_list').modal('show');
      },
      // Method to update the text on the button
      updateText: function(text) {
        this.textEl_.textContent = text;
      }
    });
    var nextButton = videojs.extend(button, {
      constructor: function() {
        button.apply(this, arguments);
        this.addClass('btn');
        this.addClass('next_ep');
        this.textEl_ = videojs.dom.createEl('span', {
          className: 'btn text-white'
        });
        // Append the span element to the button
        this.el().appendChild(this.textEl_);
        // Set the initial text
        this.updateText("next episode");
      },
      handleClick: function() {
        // this.player().dispose();
        player.pause();
        window.location.href = "<?= base_url('play-media?id=') . aes_cbc_encryption_(@$next_vid['id']) ?>";
      },
      // Method to update the text on the button
      updateText: function(text) {
        this.textEl_.textContent = text;
      }
    });
    videojs.registerComponent('nextButton', nextButton);
    videojs.registerComponent('closeButton', closeButton);
    if (skip_season == 0) {
      player.addChild('closeButton', {}, 4);
      player.addChild('nextButton', {}, 5);
    }
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

  var uuid = "<?= $_SESSION['uuid'] ?? 0 ?>";
  var login_chcek = uuid;
  uuid = uuid + "<?= $video_id ?>";


  player = videojs("my-video", {
    html5: {
      hls: {
        overrideNative: true
      },
      nativeAudioTracks: true,
    },
    //playbackRates:[1, 1.5, 2, 3],
    tracks: [
      <?php if (!empty($video_details['data']['vtt_files'])) {
        foreach ($video_details['data']['vtt_files'] as $vtt) { ?> {
            src: "<?= $vtt['transcript_url']; ?>", // Path to your SRT subtitle file
            kind: 'captions', // Indicate the kind of track (captions, subtitles, descriptions, chapters, or metadata)
            srclang: "<?= $vtt['lang_option']; ?>", // Specify the language of the subtitle track
            label: "<?= $vtt['lang_option']; ?>" // Label to be displayed in the player settings
          },
        <?php }
      } else { ?>

      <?php } ?>
    ],

    controls: true,
    liveui: true
  }, () => {
    // var hls = player.tech().hls;
    // hls.on('loadedmetadata', function() {
    //   var representations = hls.representations();
    //   representations.forEach(function(rep) {
    //     if (rep.height > max_res) {
    //       rep.enabled(false);
    //     }
    //   });
    // });

    // Function to load the last play time from localStorage
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
    loadLastPlayTime();

    // document.addEventListener('DOMContentLoaded', e => {
    //   var video = document.getElementById("my-video");
    //   var menudisplay = document.getElementById("menudisplay");
    //   video.addEventListener('ended', e => {
    //     menudisplay.style.display = "block";
    //     video.style.display = "none";
    //   });
    // });

    player.landscapeFullscreen({
      fullscreen: {
        enterOnRotate: true,
        alwaysInLandscapeMode: true,
        iOS: true
      }
    });



    document.addEventListener('DOMContentLoaded', function() {
      var myPlayer = videojs('my-video');
    });

    player.on("loadedmetadata", () => {
        var qualityLevels = player.qualityLevels();

          for (var i = qualityLevels.length - 1; i >= 0; i--) {
            var qualityLevel = qualityLevels[i];
            if (qualityLevel.height > max_res) {
              qualityLevels.removeQualityLevel(qualityLevel);
            }
          }
      // $('.vjs-text-track-display div').addClass('sliding-text').text("<?= $video_details['data']['title']; ?>")


      player.ready(function() {
        
        $(".contentMenu .icon.vjs-icon-cog").removeClass("vjs-icon-cog").addClass("vjs-icon-hd");
        var qualityLevels = player.qualityLevels();

        // Check quality levels and disable levels greater than max_res
        qualityLevels.on('addqualitylevel', function(event) {
          var qualityLevel = event.qualityLevel;
          if (qualityLevel.height > max_res) {
            qualityLevel.enabled = false;
          }
        });
      });
      var lastPlay = 0;
      player.on('play', function() {
        times = id_title + convertTimes(player.currentTime());
        if (lastPlay > 1) {
          // _paq.push(['setUserId', "<?= $userId ?>"]);
          // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
          // _paq.push(['trackPageView']);
          // _paq.push(['trackEvent', 'Media', 'Resume', times]);
          if ("<?= $video_details['data']['title'] ?>" || 1==1) {
            matomo("<?= $guest_user ?>", 'Resume', times,5);
          }
        } else {
          // _paq.push(['setUserId', "<?= $userId ?>"]);
          // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
          // _paq.push(['trackPageView']);
          // _paq.push(['trackEvent', 'Media', 'Play', id_title]);
          times = convertTimes(player.currentTime());
          if ("<?= $video_details['data']['title'] ?>") {
            matomo("<?= $guest_user ?>", 'Play', times,5);
          }
        }
        play_paused(true);

      });


      // setTimeout(() => {
      //   player.play();
      // }, 2000)
      player.on('pause', function() {
        // _paq.push(['setUserId', "<?= $userId ?>"]);
        // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
        // _paq.push(['trackPageView']);
        // _paq.push(['trackEvent', 'Media', 'Pause', "<?= $video_id . '/' . $video_details['data']['title'] ?>"]);

        times = id_title + convertTimes(player.currentTime());
        if ("<?= $video_details['data']['title'] ?>") {
          matomo("<?= $guest_user ?>", 'Pause', times,5);
        }
        play_paused(false)

      });

      $(document).on('click', '.vjs-big-pausedm', function() {
        player.play();

      })

      // $(document).on("keydown", (e)
      // $(document).ready(function() {
      //   $('.vjs-big-pausedm').on('load', function() {
      //     player.play();
      //   });
      // });

      // $(document).on('click', '.vjs-big-play-button', function() {
      //   player.pause();
      // });


      window.onload = function() {
        setTimeout(function() {

          $('.vjs-subs-caps-button').removeClass('vjs-hidden');
          $('.vjs-audio-button').removeClass('vjs-hidden');
        }, 2000);
      };

      function adjustBitrate(max_res){
        var menuContainers = document.querySelectorAll('.menu');
        menuContainers.forEach(function(menu) {
          var textQualityElement = menu.querySelector('.textQuality.quality-weight');
          if (textQualityElement) {
            // Loop through all item elements within this menu container
            var items = menu.querySelectorAll('.item');
            items.forEach(function(item) {
              if(item.id>max_res){
                $(item).css('display','none');
              }
            });
          }
        });
        Array.from(player.qualityLevels()).forEach(quality => {
          if(quality.height==max_res){
            quality.enabled = quality.height == max_res;
          }
        }); 
      }

      function getVolumePercentage() {
        return Math.round(myVideo.volume() * 100);
      }

      function displayVolume() {
        var volumeDisplay = $('.voll');
        volumeDisplay.innerText = getVolumePercentage() + '%';
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

      // if (player.duration() === Infinity) {
      //   $('.vjs-play-progress').css('color','red');
      //   $('.vjs-play-progress').css('width','100% !important');
      //     player.controlBar.progressControl.seekBar.el().classList.add('live-progress');
      // } else {
      //     player.controlBar.progressControl.seekBar.el().classList.remove('live-progress');
      // }

      var mediaHit = true;
      var skip_intro_per = true;
      var recape_intro_per = true;
      var nxt_ep_status = false;
      var next_episode_cont = false;
      var next_episode_start = "<?= $video_details['data']['next_episode_start'] ?>";
      var is_next_episode = "<?= $video_details['data']['is_next_episode'] ?>";
      var next_episode_end = "<?= $video_details['data']['next_episode_end'] ?>";
      var check_intro = "<?= $video_details['data']['skip_intro'] ?>";
      var skip_start = "<?= $video_details['data']['skip_time'] ?>";
      var skip_end = "<?= $video_details['data']['skip_end'] ?>";
      var check_recap = "<?= $video_details['data']['is_recap'] ?>";
      var recap_start = "<?= $video_details['data']['recap_start'] ?>";
      var recap_end = "<?= $video_details['data']['recap_end'] ?>";
      // "<?= $video_details['data']['is_next_episode'] = 1 ?>";
      <?php if (!empty($next_vid['id']) &&  ($video_details['data']['is_next_episode'] == 1)) { ?>
        next_episode_cont = true;

        let next_ep = ' <div class="next_episode_d" id="nxt-episode"> <div class = "nex_ep"><div class = "nex_ep_head"><h5 class = "mb-0"> Next Up </h5> <img class = "img-fluid player_remove_btn" src="<?= base_url('assets/images/closeVid.png') ?>" alt = "" > </div> <a href = "' + "<?= base_url((($next_vid['similar'] != 1) ? 'play-media?id=' : 'play-episode?id=')) . aes_cbc_encryption_($next_vid['id']) . '&play-video=' . $play_id ?>" + '"><div class = "ep_cen_img my-epiosode-bar"> <img src = "' + "<?= $next_vid['poster_url'] ?>" + '" class = "img-fluid" alt = "img"><div class="play_episode_timer"> <div class = "eps_dt_play"><div class = "play_ep_position"><span class = "eps_play_circle" role = "progressbar" aria-valuenow = "0" style = "width: 45px; height: 45px; transform: rotate(-90deg);"> <svg class="eps_progress_play" viewBox="0 0 100 100"><circle cx="50" cy="50" r="45" fill="none" class="eps_dt_1" /><path id="progress" d="M 50, 5a 45,45 0 0,1 0,90a 45,45 0 0,1 0,-90" fill="none" stroke-linecap="round" stroke-width="8" stroke="#fff" /></svg> </span></div> </div> </div> <div class="progress_ep" id="progress_episode"><div class="inner"><div class = "player_episode_icon"><img src="<?= base_url('assets/images/next_ep_play.svg') ?>" alt="ep" class = "img-fluid" alt = "play"></div> </div> </div > </div> </a> <p class = "nex_ep_dt h7"> ' + "<?= $next_vid['title'] ?>" + ' </p> </div > </div>';



        var controlBar = document.querySelector('.vjs-control-bar');
        controlBar.insertAdjacentHTML('afterend', next_ep);

        nxt_ep_status = true;
      <?php }
      if ($video_details['data']['is_free'] == 1) {
        $time = ($video_details['data']['free_episode'] == 1) ? 86400 : $video_details['data']['free_time'];
      } else {
        $time = 1;
      }

      ?>
      let session = "<?= $this->session->id ?>";
      let is_free = "<?= $video_details['data']['is_free'] ?>";
      let free_time = "<?= $time ?>"; //"<?= $video_details['data']['free_time'] ?>";
      //let free_episode = 1;//"<?= $video_details['data']['free_episode'] ?>";
      $('.player_remove_btn').on('click', function() {
        next_episode_cont = false;
        $('#nxt-episode').hide('slow');
        nxt_ep_status = true;
        // $('.vjs-control-bar').show();
        $('.vjs-control-bar').css('display', 'flex').show();
      });
      player.on('timeupdate', function() {
        if(mediaHit==true){
          media_hit();
          if((sess_id > 0) && (Number(max_res) > 0)){
            adjustBitrate(max_res);
          }
        }
        $('.currentTime-duration span:nth-child(1)').html(HHMMSS(parseInt(player.currentTime())))
        localStorage.setItem('lastPlayTime' + uuid, player.currentTime());
        lastPlay = localStorage.getItem('lastPlayTime' + uuid);
        var Ctime = Math.ceil(player.currentTime());
        if (Ctime >= free_time && !session && (Ctime > 1)) {
          player.pause();
          if (player.isFullscreen()) {
            player.exitFullscreen();
          }
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
              redirect_url = "<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" + '&dur=' + Ctime;
              await set_userdata(redirect_url);
              window.location.href = "<?= base_url('user-login') ?>";
            } else if (result.dismiss) {
              await set_userdata(redirect_url);
              player.currentTime(0);
            }
          });
        }
        var t_time = Math.ceil(player.duration());
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

        var nxt_time = t_time - Ctime;
        var episodetobe = <?= $tobeplayed ?>;
        var timeDifference = t_time - Ctime;
        if (timeDifference > 0 && timeDifference <= 10) {
          // alert(timeDifference);
          $('.next-episode-in-10').hide();
          $('.next-episode-in-10').html(`Playing Episode ${episodetobe} in ${timeDifference}`);

        } else {
          $('.next-episode-in-10').hide();
        }
        //console.log(Ctime + "--st" + skip_start + "check_intro" + check_intro + 'skip_intro' + skip_intro_per);
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

        var episodes_id_current = 2;
        var episodes_id_next = 4;
        // console.log("current"+episodes_id_current); alert(episodes_id_next);

        if (nxt_time <= 120 && (episodes_id_current < episodes_id_next)) {

          //alert('hello');
          // $('#next_eps').hide();
        } else {
          // $('#next_eps').hide();
        }
      });



      var title = document.createElement('div');
      title.className = 'vjs-title';
      title.textContent = "<?= $video_details['data']['title'] ?? '' ?>";
      $('#my-video').append(title);

      var k = 0;
      var user_id = "<?= $this->session->id ? $this->session->id : '0'; ?>";
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
      var Button = videojs.getComponent("Button");
      var rewind = videojs.extend(Button, {
        constructor: function() {
          Button.apply(this, arguments);
          this.addClass("rewindIcon");
        },
        handleClick: function() {
          timesss = id_title + convertTimes(player.currentTime());
          // _paq.push(['setUserId', "<?= $userId ?>"]);
          // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
          // _paq.push(['trackPageView']);
          // _paq.push(['trackEvent', 'Media', 'Rewind', times]);
          console.log(timesss);
          player.currentTime(player.currentTime() - 10);

          time = player.currentTime();
        //console.log(times);
        times = convertTimes(time);
        timm= convertTimes(time-10);
        matomo_for_back('<?= $guest_user ?>'+'/ total duration :<?=$formatted_time?>'+ '/ from duration: '+ times, ' Rewind:10 seconds/to duration: '+ timesss, "<?= $moto_title . '/' ?>" +' /<?=$genn?>'); 

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
          // times = id_title + convertTimes(player.currentTime());
          // _paq.push(['setUserId', "<?= $userId ?>"]);
          // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
          // _paq.push(['trackPageView']);
          // _paq.push(['trackEvent', 'Media', 'Skip-Forward', times]);
          time = player.currentTime();
        //console.log(times);
        times = convertTimes(time);
        timm= convertTimes(time+10);
          // matomo("<?= $guest_user ?>", 'Skip-Forward', times);
          matomo_for_back('<?= $guest_user ?>'+'/ total duration :<?=$formatted_time?>'+ '/ from duration: '+ times, ' Forward:10 seconds/to duration: '+ timm, "<?= $moto_title . '/' ?>" +' /<?=$genn?>');
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

      // const volls = $('.voll');

      //  function volumeIn(isRewinding) {
      //    isRewinding ? $('.voll').eq(0).addClass('animate-in') : $('.voll').eq(1).addClass('animate-in');
      //  }

      // function animateNotificationOut() {

      //   console.log('Animation ended');
      // }

      // volls.each(function () {
      //   $(this).on('animationend', animateNotificationOut);
      // });

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

      var spaceBtn = true;
      $(document).on("keyup", (e) => {
        spaceBtn = true;
      });

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
      <?php if (isset($content_details['data']['season'])) { ?>
        append_button();
      <?php } ?>




      //next episode code
      player.on("ended", function() {
        // alert('The player is ended');
        localStorage.removeItem('lastPlayTime' + uuid);
        $("#skipvalue").hide();
      });


      let calidades = player.
      tech({
        IWillNotUseThisInPlugins: true
      }).hls.representations();


      crearBotonesCalidades({
        class: "item",
        calidades: calidades,
        father: player.controlBar.el_
      });



      player.play();


      // player.fluid(true);
      player.aspectRatio('16:9');



      var panumatIplay = `<button class="vjs-big-pausedm d-none" type="button" title="Play Paused" aria-disabled="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span></button>`;

      var contro22 = document.querySelector('.vjs-loading-spinner'); // Get the control bar element
      contro22.insertAdjacentHTML('afterend', panumatIplay);



      //  var titletrk = `<div class="sliding-text" ><?= $video_details['data']['title']; ?></div>`;

      // var trackT = document.querySelector('.vjs-loading-spinner'); // Get the control bar element
      //     trackT.insertAdjacentHTML('afterend', titletrk); 

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
      var currentTime_duration = $(`
          <div class="currentTime-duration">
            <span></span>
            <span>/</span>
            <span></span>
          </div>
       `)

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
                      <div class="voll upO">volume 90%</div>`;

      var controlBar = document.querySelector('.vjs-control-bar');
      controlBar.insertAdjacentHTML('afterend', customDiv);
      $('.vjs-progress-control').before(currentTime_duration);

      $('.currentTime-duration span:nth-child(3)').html(HHMMSS(parseInt(player.duration())))
      //   console.log(player.duration(), typeof(player.duration()))


      function HHMMSS(secondss) {
        // console.log(secondss, typeof(secondss))

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

      function crearBotonesCalidades(params) {

        let contentMenu = document.createElement('div');
        let skipvalue = document.createElement('div');
        let recape = document.createElement('div');
        let next_eps = document.createElement('div');
        let menu = document.createElement('div');
        let icon = document.createElement('div');
        let skip = document.createElement('button');
        let rcap = document.createElement('button');
        let next = document.createElement('button');
        let qualityTxt = document.createElement("div");
        qualityTxt.innerText = `Quality`;
        qualityTxt.classList.add('textQuality');

        $('.vjs-subs-caps-button .vjs-menu .vjs-menu-content').prepend(
          `<div class="textQuality">Subtitle</div>`
        );
        //$('.vjs-subs-caps-button .vjs-menu .vjs-menu-content .vjs-menu-item-text').text('Subtitle off');

        $('.vjs-audio-button .vjs-menu .vjs-menu-content').prepend(
          `<div class="textQuality">Audio Language</div>`);

        // $('.vjs-audio-button .vjs-menu .vjs-menu-content .vjs-menu-item-text').text('Unknown');
        // vjs - paused vjs - user - active

        menu.appendChild(qualityTxt);
        let fullscreen = params.father.querySelector('.vjs-fullscreen-control');
        contentMenu.appendChild(icon);
        contentMenu.appendChild(menu);
        skipvalue.appendChild(skip);
        recape.appendChild(rcap);
        next_eps.appendChild(next);
        contentMenu.appendChild(skipvalue);
        contentMenu.appendChild(recape);
        //  contentMenu.appendChild(next_eps);
        $('#my-video').append(next_eps);
        fullscreen.before(contentMenu);

        menu.classList.add('menu');
        skip.classList.add('skip');
        next.classList.add('nxt');
        skip.innerHTML = 'Skip Intro';
        rcap.innerHTML = 'Recap';
        next.innerHTML = 'Next Episode';
        icon.classList.add('icon', 'vjs-icon-cog');
        contentMenu.classList.add('contentMenu');
        contentMenu.classList.add('vjs-control');
        skipvalue.classList.add('skipvalue');
        recape.classList.add('skipvalue');
        next_eps.classList.add('next_eps');
        skipvalue.id = "skipvalue";
        recape.id = "recape";
        next_eps.id = "next_eps";

        var type_id = 23;
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
      player.on('ended', function() {
        var ct = player.currentTime();
        var dur = player.duration();
        updateTimerDisplay(ct, dur, 3);
  
      });



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
        if ("<?= $video_details['data']['title'] ?>") {
          matomo('Video', 'SkipIntro', "<?= $moto_title ?>",5);
        }
        player.pause();
        player.currentTime(skip_end);
        player.play();
      });

      $('#recape').click(function() {
        if ("<?= $video_details['data']['title'] ?>") {
          matomo('Video', 'SkipRecap', "<?= $moto_title ?>",5);
        }

        player.pause();
        player.currentTime(recap_end);
        player.play();
      });



      // $('#next_eps').click(function() {
      //   var episodes_id23 = 233;

      //   var episodes_id_current = 23;
      //   var episodes_id_next = 23;


      //   var episode_current_type = 233;

      //   var episodes_did = "<?php $episodes_did = aes_cbc_encryption_(@$video_details['data']['episodes'][$episode_current_type]['id']); ?>";
      //   window.location.href = "<?= base_url('play-media?id=' . $episodes_did . '&&type_id=' . $type_id); ?>";
      //   s
      // });

    });

    // $(document).ready(function() {
    //   setTimeout(function() {
    //     player.play();
    //     console.log('1');
    //     $('.vjs-big-play-button').click();
    //     $('.vjs-poster').click();
    //   }, 1000);
    // });

    $(document).on('click', '.vjs-big-play-button', function() {
      player.play();
    });

    player.muted(true);

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


    player.on('userinactive', function() {
      checkPlayerState();
    });
    player.on('mouseover', function() {
      // if ($('.vjs-playing.vjs-user-active').length > 0) {
      //   $('.next_ep').show();
      //   $('.episode_list').show();
      // }
    });
    checkPlayerState();

    function checkPlayerState() {
      // if ($('.vjs-paused.vjs-user-active').length > 0) {
      //   $('.episode_list').show();
      //   console.log('showwww');
      //   $('.next_ep').show();
      // } else if ($('.vjs-paused.vjs-user-inactive').length > 0) {
      //   $('.episode_list').show();
      //   $('.next_ep').show();
      // } else if ($('.vjs-playing.vjs-user-inactive').length > 0) {
      //   $('.next_ep').hide();
      //   $('.episode_list').hide();
      // }
    }

  });
  // user - active
  // $(document).ready(function() {
  //     var player = videojs('my-video');
  //     player.muted(true);
  //     setTimeout(function() {
  //         player.muted(false);
  //         console.log('gfdsa');
  //         player.play();
  //     }, 1000);
  // });
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


<?php $trick_play = ($video_details['data']['trick_play_url'] ?? '');
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
<script type="text/javascript">
  player.spriteThumbnails({
    url: "<?= @$finalUrl ?>",
    width: "<?= @$trick_play['width'] ?>",
    height: "<?= @$trick_play['height'] ?>",
    columns: "<?= @$trick_play['columns'] ?>",
    rows: "<?= @$trick_play['rows'] ?>"
  });
</script>
<!-- <script>
  document.addEventListener('DOMContentLoaded', function() {
    var myPlayer = videojs('my-video');
    var count = 12;
    var nowplay = 2;


    // myPlayer.on('ended', function() {
    //   myPlayer.currentTime(0); // Set the current time to 0 to restart
    //     if(nowplay < count){
    //       window.location.href = "<?= base_url('play-media?id=' . @$played_id . '&&type_id=' . @$played_type_id); ?>";
    //     }else{
    //       location.reload();
    //     }

    // });
  });
</script> -->
<script src="<?= base_url('assets/website_assets/js/sweetalert2@8.js') ?>"></script>
<script type="text/javascript">
  $("#watchlist_toggle").click(function() {
    var product_id = $('#product_id').val();
    var type_id = $('#type_id').val();
    var main_id = type_id;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('/web/Watchlist/add_to_watchlist'); ?>",
      dataType: "json",
      data: {
        main_id: main_id,
        product_id: product_id,
        type_id: type_id
      },
      success: function(data) {
        if (data.status == 1) {
          Swal.fire('Added To Watchlist', '', 'success');
          var delayInMilliseconds = 2000; //1 second
          setTimeout(function() {
            location.reload();
          }, delayInMilliseconds);
        }
      }
    }).done(function() {
      setTimeout(function() {
        $("#overlayonajaxhit").fadeOut(300);
      }, 500);
    });
  });


  /* Remove from watchlist script start */
  $('#remove_watchlist').click(function() {
    var product_id = $('#product_id').val();
    var type_id = $('#type_id').val();
    var main_id = type_id;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('/web/Watchlist/remove_from_watchlist'); ?>",
      dataType: "json",
      data: {
        product_id: product_id,
        type_id: type_id,
        main_id: main_id
      },
      success: function(data) {
        if (data.status == 1) {

          Swal.fire('Removed from Watchlist ', '', 'success');
          var delayInMilliseconds = 2000; //1 second
          setTimeout(function() {
            location.reload();
          }, delayInMilliseconds);
        }
      }
    }).done(function() {
      setTimeout(function() {
        $("#overlayonajaxhit").fadeOut(300);
      }, 500);
    });
  });
  /* Remove from watchlist script start */
</script>
<script>
  $(document).ready(function() {
    if ("<?= $video_details['data']['title'] ?>") {
      if ("<?= $play_id ?>") {
        matomo('Episode', 'Select', "<?= $moto_title ?>",5);
      }
      if ("<?= $similar ?>") {
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
      //         _paq.push(['setUserId', "<?//= $userId ?>"]);
      // _paq.push(['setDocumentTitle', "<?//= $video_details['data']['title'] ?>"]);
      // _paq.push(['trackPageView']);
      // _paq.push(['trackEvent', 'Media', 'Stop', "<?//= $video_id . '/' . $video_details['data']['title'] ?>"]);

      //          times = id_title+convertTimes(player.currentTime());
      //     matomo("<?//= $guest_user ?>", 'Stop', times);
      // matomo('ContinueWatching', 'Add', times);
    })
  });
</script>
<script>
  $(document).ready(function() {

    // Add event listener to the subtitles button
    $(document).on('click', '.vjs-button', function() {
      var menu = $(this).next('.vjs-menu');
      menu.removeClass('vjs-lock-showing');
    });

  });

  function update_data() {
    var play_url = "<?= $play_id ?>";
    var redirect = "<?= $video_details['data']['redirtct'] ?>";
    // _paq.push(['setDocumentTitle', "<?= $video_details['data']['title'] ?>"]);
    // _paq.push(['trackPageView']);
    // _paq.push(['trackEvent', 'Media', 'Stop', "<?= $video_details['data']['title'] ?>"]);
    times = id_title + convertTimes(player.currentTime());
    if ("<?= $video_details['data']['title'] ?>") {
      matomo("<?= $guest_user ?>", 'Stop', times,5);
      matomo('ContinueWatching', 'Add', times);
    }

    var ct = player.currentTime();
    var dur = player.duration();
    if ((dur - ct) <= 5) {
      updateTimerDisplay(ct, dur, 3);
    } else {
      updateTimerDisplay(ct, dur);
    }
    localStorage.setItem('lastPlayTime' + uuid, player.currentTime());
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
      $('#my-video').append('<h4 class="no_intrnt_text text-white network_bott"> <?= $this->lang->line("nointernet-connection") ?></h4>');
      //overlay("Please wait.. internet is Not available.");
    }
    if (event.type == "online") {
      $('#my-video').find('.no_intrnt_text').remove();
      $('#my-video').append('<h4 class="intrnt_text text-white network_bott"><span class="network_size">✓</span>  <?= $this->lang->line("internet-connection") ?></h4>');
      setTimeout(() => {
        $('#my-video').find('.intrnt_text').remove();
      }, 1000)
      //overlay("");
    }
  }
  // $(document).ready(function() {
  //   setTimeout(function() {
  //     var player = videojs('my-video');
  //     player.play();
  //     $('.vjs-big-play-button').trigger('click');
  //     $('.vjs-poster').click();
  //     console.log('asas');
  //   }, 1000);

  //   $(document).on('click', '.vjs-big-play-button', function() {
  //     var player = videojs('my-video');
  //     player.play();
  //   });
  // });
</script>

<script type="text/javascript">
  // $(window).on('load', function() {
  $(window).ready(function() {
    setTimeout(() => {
      let e_time = $('.vjs-duration-display').text();
      if (e_time.length === 4) {
        $('.vjs-time-divider').css({
          'position': 'absolute',
          'right': '56.5px'
        });
      } else if (e_time.length === 5) {
        $('.vjs-time-divider').css({
          'position': 'absolute',
          'right': '61.5px'
        });
      } else if (e_time.length > 5) {
        $('.vjs-current-time, .vjs-time-divider').css({
          'position': 'absolute',
          'right': '80px'
        });
      }
    }, 500);




  });


  function matomo(user, type, title,hits=4) {

    $.ajax({
      type: 'POST',
      url: "<?= base_url('/web/Home/matomo_hit') ?>",
      dataType: "json",
      data: {
        user: user,
        types: type, // Typo here, it should be type instead of types
        type: hits,
        title: title,
        genres: "<?= $content_details['data']['genres'] ?>"
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
  // });
</script>
<!-- Matomo -->

<!-- End Matomo Code -->



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
    var profile_id = "<?= $_SESSION['profile_id'] ?? ''; ?>";
    var video_id = "<?= $video_details['data']['id']; ?>";
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
        var type_id = "<?= @$video_details['data']['type_id']; ?>";
        var show_id = "<?= $video_details['data']['id']; ?>";
        var title = "<?= $video_details['data']['title']; ?>";
        var thumbnail = "<?= $video_details['data']['thumbnail_url']; ?>";
        var poster_url = "<?= $video_details['data']['poster_url']; ?>";

        var id = "<?= @$video_details['data']['show_id']; ?>";
        var watch_time = "<?= @$video_details['data']['total_watch_time'] ?>";
        var remaining_time = "<?= @$video_details['data']['remaining_time'] ?>";
        var encrypted_id = "<?= $encrypted_id ?>";
        var twice_time = "<?= @$video_details['data']['twice_time'] ?>";
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
          //console.log("update_data", update_data);
          update_cache(cachekey, show_id, update_data, activity);
        }
        //alert("final");
      } catch (e) {
        //console.log(e);
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
        $(document).on('click', '.vjs-button', function() {

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
     $(document).ready(function() {
      // Add event listener to the subtitles button
      if ($(window).width() <= 1024) {
        $(document).on('click', '.vjs-icon-hd', function() {

          var menus = $(this).next('.menu');

          // Check if the menu is currently visible or hidden
          if (menus.hasClass('d-none') || !menus.hasClass('d-block')) {
            menus.removeClass('d-none').addClass('d-block');
          } else {
            menus.removeClass('d-block').addClass('d-none');
          }

        });
      }
    });
</script>
<script>
function handleKeyPress(event) {
    // Check if Enter key is pressed
    if (event.key === 'Enter') {
        $('#play_episode_list').modal('hide'); // Close modal on Enter key press
    }
}

function handleKeyDown(event) {
    // Your logic for key down event handling
}

function handleKeyUp(event) {
    // Your logic for key up event handling
}

</script>
