<!-- Shaka Player CSS and JS from CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/controls.min.css" />
<!-- <script src="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/shaka-player.compiled.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/shaka-player.ui.js"></script>

<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/player_timer.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/shaka_ui.js') ?>"></script>
<style>
  /* video {
      width: 100%;
    } */

  /* .shaka-backward-button::before {
      content: "⏪";
    }
    .shaka-forward-button::before {
      content: "⏩";
    } */
  .next_episode_d {
    z-index: 999;
  }

  #progress {
    stroke-dasharray: 283;
    stroke-dashoffset: 283;
  }

  .shaka-seek-bar-container {
    position: absolute;
    right: 0px;
    top: -20px;
  }

  .shaka-bottom-controls {
    position: relative;
  }

  .shaka-tooltips-on>[class*="shaka-tooltip"]:hover:after {
    z-index: 11;
  }

  .shaka-overflow-menu,
  .shaka-settings-menu,
  .shaka-overflow-menu {
    background: rgb(55 55 55);
    / padding: 10px 0;/ border-radius: 6px;
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
    /* background-color: #202020; */
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

  #video-container {
    height: 100vh;
  }
  .clickable-btn{
    background:var(--pbg) !important;
  }
  .shaka-small-play-button {
    font-size: 40px !important;
    line-height: 0;
  }
  .shaka-mute-button {
    font-size: 30px !important;
    line-height: 0;
  }
  .shaka-volume-bar-container{
    display: none;
  }
  .material-icons-round {
    padding: 0 10px !important;
  }
  .video-ads{    
    position: absolute;
    bottom: 0px;
    height: 2px;
    background: var(--pbg);
    z-index: 9;
  }
  .shaka-settings-menu button:not(:first-child)::after {
    content: '';
    width: 20px;
    height: 20px;
    border: 1px solid #ccc;
    right: 12px;
    position: absolute;
    border-radius: 100px;
  }
  .shaka-settings-menu button:not(:first-child){
    justify-content: space-between;
  }
  .shaka-settings-menu button i{
    font-size: 18px !important;
    padding-right: 12px;
    position: relative;
    z-index:1;
    color:#fff;
  }
  @media only screen and (min-width: 320px) and (max-width: 767px) {
    #video-container{
      height:94vh !important;
    }
    #main-content{
      background:#000;
      height:100vh;
    }
  }
  .shaka-client-side-ad-container{
    cursor:pointer;
  }
  div:where(.swal2-container) div:where(.swal2-popup){
      padding:20px !important;
   }
   #video-container{
    overflow:hidden;
   }
</style>

<?php
   $video_id = $video_details['data']['id'] ?? 0;
   $season_check = '';
   $episodeNO = '';
   $seasonNo = '';

  $seasonData = $content_details['data']['season'];
      usort($seasonData, function($a, $b) {
      return $b['number'] - $a['number'];
      });
   foreach ($seasonData  as $season_index => $season) {
    if (isset($season['videos']) && !empty($season['videos'])) {
        $filtered_videos = array_values(array_filter($season['videos'], function ($var) use ($video_id) {
            return $var['id'] == $video_id;
        }));
        if (!empty($filtered_videos)) {
            $season_check = $filtered_videos[0];
            $episodeNO = 1+array_search($season_check, $season['videos']);
            $seasonNo = 1+$season_index;
        }
    }
  }

  $eventtitle = '';
  $eventseason = '';
   $paid_check =  $video_details['data']['is_paid'] ;
  if ($paid_check == 0) {
   $paid_d = "(VOD)";
  } else if ($paid_check == 1) {
    $paid_d = "(SVOD)";
  } else {
    $paid_d = "(TVOD)";
  } 
  if (isset($content_details['data']['id']) && !empty($content_details['data']['id'])) {
    $content_data =  $content_details['data']['id'] . '/' . $content_details['data']['title'];
  } else {
    $content_data =  $video_details['data']['id'] . '/' . $video_details['data']['title'];
  }
  $category_title = ($content_details['data']['category_title']) ?? '';
  $season_id = isset($season_check['season_id']) ? $season_check['season_id'] : '';
  $season_name = isset($season_check['season']) ? $season_check['season'] : '';
  $episode_name = isset($season_check['title']) ? $season_check['title'] : '';
  $data = @$video_details['data']['transcribe_data'];
 if(isset($content_details['data']['skip_season']) && $content_details['data']['skip_season'] == 1){
   $eventtitle = $content_details['data']['id']."/".$content_details['data']['title'].'-'.$video_details['data']['title'];
   $eventseason = '';
  $title_video = $content_details['data']['id']."/".($content_details['data']['title'] .'-'. $video_details['data']['title']);
 }else{
   $title_video =  $content_details['data']['id']."/".$content_details['data']['title'].'-S'. $seasonNo." E". $episodeNO." ".$video_details['data']['title'];
   $eventtitle = $content_details['data']['id']."/".$content_details['data']['title'].'-S'. $seasonNo." E". $episodeNO." ".$video_details['data']['title'];
   $eventseason = '/'. $season_id .'/'.$seasonNo.'/'.$video_details['data']['id'].'/'.$video_details['data']['title'];
 }
 $v_type ='';
 if($types == 'continue_watching'){
   $v_type = 'ContinueWatching';
 }
  ?>
<body>
 
  <div id="video-container">  
    <video data-matomo-title="<?=$title_video?>" title="<?=$title_video ?>" disablePictureInPicture id="video" poster="" autoplay class="h-100"></video>
  </div>

  <?php
  // pre($video_details); die;
  $genn = $content_details['data']['genres'];
  $timeing = $video_details['data']['video_duration'];
  $hours = floor($timeing / 3600);
  $minutes = floor(($timeing % 3600) / 60);
  $seconds = $timeing % 60;
  $formatted_time = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
  ?>
  <?php
 
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
  $video_details['data']['title'] = str_replace('-', ' ', $video_details['data']['title']);
  $play_id = $this->input->get('play-video')??'';
  $similar = $this->input->get('similar')??'';
  ?>
  <?php
  $current_vid = $video_details['data']['id'] ?? null;
  $next_vid = array(
    'id' => 0,
    'similar' => 0,
    'title' => '',
    'poster_url' => '',
    'description' => '',
  );
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
  $video_details['data']['title'] =  str_replace('-', ' ', $video_details['data']['title']);

  $video_type= '/Movie';
  if (isset($content_details['data']['season']) && ($content_details['data']['skip_season'] != 1)) {
     $video_type = '/WebSeries';
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
  <!-- Modal -->
  <?php
  $guest_user = ($this->session->id) ? 'Video' : 'GuestUserVideo';
  if( $v_type  == 'ContinueWatching'){
    $guest_user = 'ContinueWatching';

  }
  if($similar == 'Watchlist'){
    $guest_user = 'Watchlist';
  }
 
  ?>
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
              <div class="epiose_close_icon" onclick="$('#play_episode_list').modal('hide')">
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
                                  <p class="episodeTittle mb-2"><?= $mvalue['description'][0]['content'] ?? '' ?></p>
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
    var sess_id = "<?= $this->session->id ?? 0 ?>";
    var max_res = "<?= $max_res ?? DEFAULT_RESOLUTION ?>";
    var id_title = "<?= $moto_title . '/' ?>";
    var profile_id = `<?= $_SESSION['profile_id'] ?? ''; ?>`;
    var video_id = `<?= $video_details['data']['id'] ?? 0; ?>`;
    var cachekey = profile_id + '-continueWatching';
    var isAddOnPlay = false;
    var playbackRate = 1;
    var firstAdEnd = 0;
    var adParams = <?= $adParams ?>;
    var adEnabled = "<?= $adEnabled ?>";
    var paid_check = '<?= $video_details['data']['is_paid'] ?>';
    var lastAdPlayTime = null;
    var lastAdskipTime = 0;
    var didInterfere = false;

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

    var skip_intro_per = true;
    var recape_intro_per = true;
    var nxt_ep_status = false;
    var next_episode_cont = false;
    var next_episode_start = "<?= $video_details['data']['next_episode_start'] ?>";
    var is_next_episode = "<?= $video_details['data']['is_next_episode'] ?>";
    var next_episode_end = "<?= $video_details['data']['next_episode_end'] ?>";
    var queryParams = "<?= $queryParams??'' ?>";
    var check_intro = "<?= $video_details['data']['skip_intro'] ?>";
    var skip_start = "<?= $video_details['data']['skip_time'] ?>";
    var skip_end = "<?= $video_details['data']['skip_end'] ?>";
    var check_recap = "<?= $video_details['data']['is_recap'] ?>";
    var recap_start = "<?= $video_details['data']['recap_start'] ?>";
    var recap_end = "<?= $video_details['data']['recap_end'] ?>";
    var video_duration = "<?= $video_details['data']['video_duration']??0 ?>";
    if((is_next_episode == 1) && (next_episode_start == 0)){
      var nskipable_end = localStorage.getItem('nskipable_end')??0;
      if((nskipable_end) && (nskipable_end > 0) && (video_duration > 0)){
        next_episode_start = video_duration - nskipable_end;
        next_episode_end = video_duration;
      }
    }
    <?php
    if ($video_details['data']['is_free'] == 1) {
      $time = ($video_details['data']['free_episode'] == 1) ? 86400 : $video_details['data']['free_time'];
    } else {
      $time = 0;
    }
    $ep = 3;
    $tobeplayed = 2;
    ?>
    let session = "<?= $this->session->id ?>";
    let is_free = "<?= $video_details['data']['free_episode'] ?>";
    let free_time = Math.floor("<?= $time ?>"); //"<?//= $video_details['data']['free_time'] ?>";
    var times = '';
    var sess_id = "<?= $this->session->id ?? 0 ?>";
    var max_res = "<?= $max_res ?? DEFAULT_RESOLUTION ?>";
    var id_title = "<?= $moto_title . '/' ?>";
    var profile_id = `<?= $_SESSION['profile_id'] ?? ''; ?>`;
    var video_id = `<?= $video_details['data']['id'] ?? 0; ?>`;
    var cachekey = profile_id + '-continueWatching';
    var lastPlay = 0;
    var times = '';
    var dur_times = '';
    var uuid = '<?= $_SESSION['uuid'] ?? 0 ?>';
    var login_chcek = uuid;
    uuid = uuid + '<?= $video_id ?>';
    var preroll = "<?=$_GET['preroll']??null?>";

    // below code is ---
   

    // $(document).ready(function(){
    //   changeSpanName('Undetermined', 'Unknown');
    //   $('button').click(function(){
    //     changeSpanName('Undetermined', 'Unknown');
    //   });        
    // });

    async function updateTimerDisplay(crTime, dur, activity = 1,lastAd=null) {
      if(isAddOnPlay){
        return false;
      }
      $("#overlayonajaxhit").fadeOut(10);
      var type_id = "<?= @$video_details['data']['type_id']; ?>";
      var show_id = "<?= @$video_details['data']['id']; ?>";
      var title = "<?= @$video_details['data']['title'] ?>";
      var poster_url = "<?= $content_details['data']['poster_url']??($video_details['data']['poster_url']??''); ?>";
      var id = "<?= @$video_details['data']['show_id']; ?>";
      var encrypted_id = "<?= $encrypted_id ?>";
      if ((dur - crTime) < 39) {
        activity = 3;
      }

      let update_data = {
        "title": title,
        "poster_url": poster_url,
        "show_id": id,
        "video_id": show_id,
        "encrypted_id": encrypted_id,
        "crTime": crTime,
        "dur": dur,
        "lastAd":lastAd
      }
      if ((type_id != 2 || type_id != 3) && (crTime > 0)) {
        update_cache(cachekey, show_id, update_data, activity);
      }
    }

    function changeSpanName(oldName, newName){
      var spans = document.querySelectorAll('span');
      spans.forEach(span => {
          if (span.innerHTML.trim() === oldName) {
              span.innerHTML = newName;
          }
      });
    }

    function loadLastPlayTime(state = null) {
      var lastPlayTime = false;
      if ("<?= $this->session->id ?>") {
        if ("<?= $dur ?>") {
          setTimeout(() => {            
            video.currentTime = "<?= $dur ?>";
          }, 200);
          lastPlay = "<?= $dur ?>";
        }
      }
      fetchCacheData(cachekey).then((result) => {
        if (result.data) {
          result.data.forEach((item) => {
            if (item.video_id == video_id && item.is_deleted != 1) {
              lastAdPlayTime = item.lastAd;
              lastAdskipTime = item.paused_at;
              video.currentTime = item.paused_at;
              lastPlay = item.paused_at;
              lastPlayTime = true;
            }
          })
        }
      }).finally(()=>{
          didInterfere = false;
      });
      if (lastPlayTime) {
        video.play();
      }
      if (state == 'back') {
        window.history.back();
      }
    }

    $("#copyBtn").click(function() {
      $("#inputText").select();
      document.execCommand('copy');
      Swal.fire('Link Copied ', '', 'success');
      window.getSelection().removeAllRanges();
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

    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    function playPauseCallback() {
      var  similar_to = getQueryParam('similar') || 'NA';
      if(similar_to != 'NA'){
        var search_jao = similar_to;
        _paq.push(['setCustomDimension', 4, similar_to ]);
      }
      else{
        var search_jao = '';
      }
      var Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>"+"/"+ convertTimes(video.currentTime);
     
      if (video.paused) {
        if ((is_free != 1 && free_time > 0) && !session) {
          pause_timer();
        }

  queueTrackingDataWithDelay('trackEvent', ["<?= $guest_user ?>", 'Pause',  Ititle],0);
        Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>";
        var interaction  = "<?= $guest_user ?>"+'/Pause';
        if("<?=$guest_user=='Watchlist' ||$guest_user== 'ContinueWatching'?>"){
        queueTrackingDataWithDelay('trackContentInteraction', [interaction,Ititle,genres],50);
        queueTrackingDataWithDelay('trackContentImpression', [Ititle,genres],100);
        }

        return false;
      }
      c_tim = convertTimes(video.currentTime);
      if (c_tim > '00:00:01') { 
        if ((is_free != 1 && free_time > 0) && !session) {
          resume_timer();
        }
        if ("<?= $video_details['data']['title'] ?>" || 1 == 1) {
          var  similar_to = getQueryParam('similar') || 'NA';
        if(similar_to !='NA'){
          var search_jao = similar_to;
        }else{
          var search_jao = '';
        }
        var Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>"+"/"+ convertTimes(video.currentTime);
        queueTrackingDataWithDelay('trackEvent', ["<?= $guest_user ?>", 'Resume',Ititle],0);
         Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>";
        var interaction  = "<?= $guest_user ?>"+'/Resume';
        if("<?=$guest_user=='Watchlist'?>"){
        queueTrackingDataWithDelay('trackContentInteraction', [interaction,Ititle,genres],50);
        queueTrackingDataWithDelay('trackContentImpression', [Ititle,genres],100);
        }

      }
    } else {
      
      times = convertTimes(video.currentTime);
      var  similar_to = getQueryParam('similar') || 'NA';
      if(search_jao !='NA'){
        var search_jao = similar_to;
   
      var Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>"+"/"+ convertTimes(video.currentTime);
      if ("<?= $video_details['data']['title'] ?>") {
      }
      if(similar_to == 'Search'){

        queueTrackingDataWithDelay('trackEvent', ["Search", "Play","<?=$content_details['data']['id']."/".$content_details['data']['title']?>"],0);
      }
        queueTrackingDataWithDelay('trackEvent', ["<?= $guest_user ?>", 'Play',  Ititle],10);
         Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>";
        var interaction  = "<?= $guest_user ?>"+'/Play';
        if("<?=$guest_user=='Watchlist'?>"){
        queueTrackingDataWithDelay('trackContentInteraction', [interaction,Ititle,genres],50);
        queueTrackingDataWithDelay('trackContentImpression', [Ititle,genres],100);
        }
      }
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


  const dashUri = '<?= $video_details['data']['file_url'] ?>';
  const token = '<?= ($video_details['data']['token']) ?? "" ?>';
  const browser = "<?= $DeviceType ?? 1 ?>";
  player_config(dashUri, browser, token);

  $("#video-container").click(function() {
    if (isAddOnPlay) {
      return false;
    }
    var ct = video.currentTime;
    var dur = video.duration;
    if (video.paused) {
      updateTimerDisplay(ct, dur);
    } else {
      updateTimerDisplay(ct, dur);
    }
  });

  // video.addEventListener('ratechange', function() {
  //   didInterfere = true;
  // });

  // video.addEventListener('ratechange', function() {
  //     var newSpeed = (1000/video.playbackRate);
  //     resume_timer(newSpeed);
  // });

  var lastUpdateTime = 0;
  var fullAdDuration = 0;
  var isSubscribed = "<?= $isSubscribed??false ?>";
  video.addEventListener('timeupdate', () => {
    var currentTime = Number(Math.floor(video.currentTime));
    timeElapsed = currentTime - fullAdDuration;
    if (currentTime < lastUpdateTime) {
      if(adMetaData){
        var rewinDuration = adMetaData.find((item) => {
          if (currentTime >= item.startTimeInSeconds && currentTime <= (item.startTimeInSeconds + item.durationInSeconds)) {
            return true;
          }
        })?.durationInSeconds
      }else{
        var rewinDuration = 0;
      }
      if(rewinDuration){
        video.currentTime = (currentTime-(rewinDuration+10));
      }
      currentTime = Number(Math.floor(video.currentTime));
    }
    if (isAddOnPlay) {

      return false;
    }
    if ((currentTime - lastUpdateTime) >= 1) {
      if(lastAdtime != null && video.playbackRate != 0){
        lastAdtime = Number((lastAdtime+(1/video.playbackRate)).toFixed(2));
      }
      var Ctime = currentTime;
      if ((is_free != 1) && (Ctime > free_time && (Ctime >= 1) && (Ctime > firstAdEnd))) {
        if(session && (!isSubscribed || isSubscribed == '0') && (free_time > 0) && 1==2){
          video.pause();
          if (document.fullscreenElement) {
            document.exitFullscreen();
          }
          Swal.fire({
            text: "Subscribe to continue.",
            title: "<?= $this->lang->line('free_time_up') ?>",
            imageUrl: "<?= base_url('assets/images/timeer.svg') ?>",
            imageWidth: 70,
            imageHeight: 70,
            imageAlt: "Custom image",
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: "Subscribe",
            cancelButtonText: "<?= $this->lang->line('Cancel') ?>"
          }).then(async (result) => {
            var redirect_url = '';
            if (result.value) {
              // matomo('Page', 'View', 'LoginPopup', 5);
              queueTrackingData('trackEvent', ["Page", 'View', 'LoginPopup']);
              redirect_url = "<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" + '&dur=' + Ctime;
              await set_userdata(redirect_url);
              window.location.href = "<?= base_url('subscription') ?>";
            } else if (result.dismiss) {
              // matomo('Page', 'View', 'CancelPopup', 5);
              queueTrackingData('trackEvent', ["Page", 'View', 'CancelPopup']);
              await set_userdata(redirect_url);
              video.currentTime = (free_time);
              lastUpdateTime = 0;
            }
          });
        }else if(!session){
          video.pause();
          if (document.fullscreenElement) {
            document.exitFullscreen();
          }
          $('#circle-timer').hide();
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
              // matomo('Page', 'View', 'LoginPopup', 5);
              queueTrackingData('trackEvent', ["Page", 'View', 'LoginPopup']);
              redirect_url = "<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" + '&dur=' + Ctime;
              await set_userdata(redirect_url);
              window.location.href = "<?= base_url('user-login') ?>";
            } else if (result.dismiss) {
              // matomo('Page', 'View', 'CancelPopup', 5);
              queueTrackingData('trackEvent', ["Page", 'View', 'CancelPopup']);
              await set_userdata(redirect_url);
              video.currentTime = (free_time);
              lastUpdateTime = 0;
            }
          });
        }
      }

      var t_time = Math.ceil(video.duration);
      if (Ctime >= next_episode_start && Ctime <= next_episode_end && next_episode_start != '' && is_next_episode == 1) {
        if (next_episode_cont) {
          $('#nxt-episode').show(500);
          $('.shaka-bottom-controls').css('display', 'none');
          $('#progress').css('stroke-dasharray', 283 + ((Ctime - next_episode_start) * (277 / (next_episode_end - next_episode_start))));
          nxt_ep_status = true;
          if ((next_episode_end - Ctime) <= 1) {
            window.location.href = "<?= base_url((($next_vid['similar'] != 1) ? 'play-media?id=' : 'play-episode?id=')) . aes_cbc_encryption_($next_vid['id']) . '&play-video=' . $play_id ?>";
          }
        }
      } else {
        if (nxt_ep_status) {
          next_episode_cont = true;
          $('#nxt-episode').hide(500);
          $('.shaka-bottom-controls').css('display', 'block');
          // $('.shaka-controls-container').show();
          // $('.shaka-controls-container').css('display', 'flex').show();
        }
      }

      var nxt_time = t_time - Ctime;
      var episodetobe = <?= $tobeplayed ?>;
      var timeDifference = t_time - Ctime;
      if (timeDifference > 0 && timeDifference <= 10) {
        $('.next-episode-in-10').hide();
        $('.next-episode-in-10').html(`Playing Episode ${episodetobe} in ${timeDifference}`);
      } else {
        $('.next-episode-in-10').hide();
      }
      if ((Ctime > skip_start) && (Ctime < skip_end) && (check_intro == 1) && skip_intro_per == true) {
        $('.shaka-skip-Intro-button').removeClass('shaka-hidden');
      } else {
        if (Ctime > skip_end) {
          skip_intro_per = false;
        }
        $('.shaka-skip-Intro-button').addClass('shaka-hidden');
      }

      if ((Ctime >= recap_start) && (Ctime < recap_end) && (check_recap == 1) && recape_intro_per == true) {
        $('.shaka-skip-recap-button').removeClass('shaka-hidden');
      } else {
        if (Ctime > recap_end) {
          recape_intro_per = false;
        }
        $('.shaka-skip-recap-button').addClass('shaka-hidden');
      }
      var episodes_id_current = 2;
      var episodes_id_next = 4;
    }
    lastUpdateTime = currentTime;
  });

var currentAd;
var currentAdClickTracking;
var currentAdClickThrough;
  $(document).on("keydown", (e) => {
    const playerVolume = video.volume;
    const playerCurrentTime = video.currentTime;
    var activeElement = document.activeElement;
    var tagName = activeElement.className.toLowerCase();
    switch (e.code) {
      case "Space":
      case "KeyK":
      case "Enter":
        e.preventDefault();
        if(e.code == 'Space' && tagName.includes("shaka-seek-bar")){
          if (!video.paused) {
            video.play();
            showIcon(false)
          } else {
            video.pause();
            showIcon(true)
          }
        }else{
          if (video.paused) {
            video.play();
            showIcon(false)
          } else {
            video.pause();
            showIcon(true)
          }
        }
        break;      
      case "KeyM":
        e.preventDefault();
        video.muted = !video.muted;
        logVolume();
        break;
    }

    if(isAddOnPlay){
      return false;
    }
    switch (e.code) {
      case "ArrowRight":
      case "KeyL":
        e.preventDefault();
        video.currentTime = (playerCurrentTime + 10);
        didInterfere = true;
        animateNotificationIn(false);
        break;
      case "ArrowLeft":
      case "KeyJ":
        e.preventDefault();
        video.currentTime = (playerCurrentTime - 10);
        didInterfere = true;
        animateNotificationIn(true);
        break;
      case "ArrowUp":
        e.preventDefault();
        video.muted = false;
        video.volume = Math.min(playerVolume + 0.1, 1); // Ensure volume doesn't exceed 1
        logVolume();
        break;
      case "ArrowDown":
        e.preventDefault();
        video.volume = Math.max(playerVolume - 0.1, 0); // Ensure volume doesn't go below 0
        if (video.volume == 0) {
          video.muted = true;
        }
        logVolume();
        break;
      case "KeyF":
        e.preventDefault();
        //toggleFullscreen();
        break;
      default:
        return; // Exit if the key doesn't match any case
    }
  });

  function parseHLSManifest(manifestContent) {
    const lines = manifestContent.split('\n');
    for (let i = 0; i < lines.length; i++) {
      const line = lines[i].trim(); // Trim to remove any extra whitespace
      if (line.endsWith('.m3u8')) { // Check if the line contains a .m3u8 URL
        return line.replace('../../../../../../../../', ''); // Return the first URL found
      }
    }
    return null;
  }

  async function parseDRMManifest(drmContent){
    return new Promise((resolve,reject)=>{
      const parser = new DOMParser();
      const xmlDoc = parser.parseFromString(drmContent, "application/xml");
      // Get the first BaseURL element
      try{
        var childBaseurl = xmlDoc.getElementsByTagName("BaseURL")[1].textContent;
      }catch(err){
        var childBaseurl = xmlDoc.getElementsByTagName("BaseURL")[0].textContent;
      }
      
      const segmentTemplate = xmlDoc.querySelector('Representation > SegmentTemplate');
      const initialization = segmentTemplate.getAttribute('initialization');
      if(childBaseurl && initialization){
        resolve(childBaseurl+initialization);
      }else{
        reject(null);
      }
    })    
  }

  async function getAdsData(file_url, mediaTailorAdsParams) {
    return new Promise((resolve, reject) => {
      $.ajax({
        url: file_url,
        type: "post",
        data: JSON.stringify(mediaTailorAdsParams),
        dataType: "json",
        success: async function(res) {
          try {
            // Build the URLs for manifest and tracking
            const baseUrl = file_url.split('cloudfront.net/')[0] + 'cloudfront.net';
            var manifestUrl = baseUrl + res.manifestUrl;
            var trackingUrl = baseUrl + res.trackingUrl;
            var manifestResponse = await fetch(manifestUrl);
            var manifetRes = await manifestResponse.text();
            if(token){
              var childUrl = await parseDRMManifest(manifetRes);
            }else{
              var childUrl = parseHLSManifest(manifetRes);
              childUrl = baseUrl + '/v1/' +childUrl;
            }            
            if (!manifestResponse.ok) {
              throw new Error('Failed to fetch manifest: ' + manifestResponse.statusText);
            }
            var childResponse = await fetch(childUrl);
            if (!manifestResponse.ok) {
              throw new Error('Failed to fetch manifest: ' + manifestResponse.statusText);
            }

            // Fetch the tracking data
            const trackingResponse = await fetch(trackingUrl);
            if (!trackingResponse.ok) {
              throw new Error('Failed to fetch tracking data: ' + trackingResponse.statusText);
            }
            const trackingData = await trackingResponse.json();
            trackingData.avails.forEach((item,key)=>{
              if(item.startTimeInSeconds == 0){
                firstAdEnd = item.durationInSeconds
              }
            });
            resolve(manifestUrl);
          } catch (error) {
            console.error('Error during fetch operations:', error);
            reject(error);
          }
        },
        error: function(err) {
          console.error('AJAX Error:', err);
          reject(err); // Reject if the AJAX request fails
        }
      });
    });
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
                    <div class="voll upO">volume 90%</div>`;

  var controlBar = document.querySelector('.shaka-controls-container');
  controlBar.insertAdjacentHTML('afterend', customDiv);

  var adDiv = `<div class="video_ads_after"><div class="video-ads">  </div></div>`;
  controlBar.insertAdjacentHTML('afterend', adDiv);

  var spaceicon = '<div class="playPauseIcon"> <img id="playIcon" src="<?= base_url("assets/website_assets/css/video_player_icons/play.svg") ?>" alt="Play Icon" class="d-none"><img id="pauseIcon" src="assets/website_assets/css/video_player_icons/pause.svg" alt="Pause Icon" class="d-none"></div>';
  $('#video-container').append(spaceicon);

  var isAdPlaying =  false;
  var lastAdtime = null;
  var adMetaData = null;
  var localization;
  var pausedAt = 0;

  async function player_config(url, browser, token = '') {
    if((is_next_episode == 1) && (next_episode_start == 0)){
      var nskipable_data = await getSkipableTime();
      if((nskipable_data.nskipable_end) && (nskipable_data.nskipable_end > 0) && (video_duration > 0)){
        next_episode_start = video_duration - nskipable_data.nskipable_end;
        next_episode_end = video_duration;
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
    adManager.initMediaTailor(container, netEngine, videoElement);
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
  
  

  videoElement.addEventListener('ended', function() {
    var ct = video.currentTime;
    var dur = video.duration;
    updateTimerDisplay(ct, dur, 3);
    <?php if (!empty($next_vid['id'])): ?>
        setTimeout(() => {
            window.location.href = "<?= base_url(($next_vid['similar'] != 1 ? 'play-media?id=' : 'play-episode?id=') . aes_cbc_encryption_($next_vid['id']) . '&play-video=' . $play_id) ?>";
        }, 2000);
    <?php endif; ?>
  });

  function hitAdsTracker(url, method = 'GET') {
    if(url){
      var n_url = new URL(url);
      if (n_url.search) {
          n_url.search += `&${queryParams}`;
      } else {
          n_url.search = queryParams;
      }
      url = n_url.toString();
    }
    return fetch(url, {
      method: method,
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response;
    })
    .then(response => {
      console.log(`Request to ${url} with method ${method} was successful.`);
    })
    .catch(error => {
      console.error(`There was a problem with the request: ${error.message}`);
    });
  }


  $('.shaka-client-side-ad-container').click(function(){
    currentAdClickTracking.forEach((item)=>{
      if(item){
        hitAdsTracker(item);
      }
    });
    if(currentAdClickThrough){
      video.pause();
      window.open(currentAdClickThrough, '_blank');
    }
  });

    const HLSmanifestUri = url;
    const file_url = url;
    var skipToDuration = 0;

    class SkipRecapButton extends shaka.ui.Element {
      constructor(parent, controls, player) {
        super(parent, controls);
        this.player_ = player;
        
        this.button_ = document.createElement('button');
        this.button_.textContent = '<?=$this->lang->line('skip_recap')?>';
        this.button_.classList.add('shaka-skip-recap-button', 'shaka-tooltip', 'shaka-hidden', 'skipvalue');
        this.button_.setAttribute('aria-label', '<?=$this->lang->line('skip_recap')?>');
        parent.appendChild(this.button_);
        this.button_.addEventListener('click', () => {
          video.currentTime = recap_end;
        });
      }
    }

    class SkipRecapButtonFactory {
      create(rootElement, controls, player) {
        return new SkipRecapButton(rootElement, controls, player);
      }
    }
    shaka.ui.Controls.registerElement('skipRecap',
      new SkipRecapButtonFactory()
    );

    class SkipIntroButton extends shaka.ui.Element {
      constructor(parent, controls, player) {
        super(parent, controls);
        this.player_ = player;

        this.button_ = document.createElement('button');
        this.button_.textContent = '<?=$this->lang->line('skip_intro')?>';
        this.button_.classList.add('shaka-skip-Intro-button', 'shaka-tooltip', 'shaka-hidden', 'skipvalue');
        this.button_.setAttribute('aria-label', '<?=$this->lang->line('skip_intro')?>');
        parent.appendChild(this.button_);
        this.button_.addEventListener('click', () => {
          video.currentTime = skip_end;
        });
      }
    }

    class SkipIntroButtonFactory {
      create(rootElement, controls, player) {
        return new SkipIntroButton(rootElement, controls, player);
      }
    }
    shaka.ui.Controls.registerElement('skipIntro',
      new SkipIntroButtonFactory()
    );
<?php
// Determine if the user is logged in
$isUserLoggedIn = $this->session->userdata('id');
?>
    const defaultConfig = {
      controlPanelElements: [
        "backward",
        "play_pause",
        "forward",
        "time_and_duration",
        "mute",
        "volume",
        "spacer",
        "skipRecap",
        "skipIntro",
        "spacer",
        // "language",
        // "text_settings",
       
        "overflow_menu",
        //"playback_rate",
        // "cast",
        //  "lock_ui",
        //   "Unlock_ui",      
        //"quality",
        //"episode",
        "fitToWidthButton",
        "fullscreen",
      ],
      overflowMenuButtons: [
        "quality",
        "captions",
        "language",
        "playback_rate"
      ],
      seekBarColors: {
        base: "rgba(115, 133, 159, 0.5)",
        buffered: "rgba(115, 133, 159, 0.85)",
        played: "rgba(236, 0, 140, 1)",
      },
      enableTooltips: true,
      // textTrackVisibility: true,
      playbackRates: [0.5, 0.75, 1, 1.5, 2],
      // fastForwardRates: [2, 4, 8, 1],
      // rewindRates: [-1, -2, -4, -8],
      // customContextMenu: true,
      // contextMenuElements: ["statistics"],
      // statisticsList: ["width", "height", "playTime", "bufferingTime"],
    };

    // const adConfig = {
    //   addSeekBar: true,
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

    player.addEventListener('error', onPlayerErrorEvent);
    controls.addEventListener('error', onUIErrorEvent);
    player.getNetworkingEngine().registerRequestFilter((type, request) => {
    if (request.uris[0].includes("mercury.akamaized.net/cm/e.gif") || request.uris[0].includes("mercury.akamaized.net/cm/i.gif")) {
      const url = new URL(request.uris[0]);
      if (url.search) {
            url.search += `&${queryParams}`;
      } else {
            url.search = queryParams;
      }
      request.uris[0] = url.toString();
      request.method = "GET";
    }
    //console.log(type);
    // console.log(request);
    });

    function onPlayerErrorEvent(errorEvent) {
      // Extract the shaka.util.Error object from the event.
      onPlayerError(event.detail);
    }
    
    function onPlayerError(error) {
      // Handle player error
      console.error('Error code', error.code, 'object', error);
    }
    
    function onUIErrorEvent(errorEvent) {
      // Extract the shaka.util.Error object from the event.
      onPlayerError(event.detail);
    }
    
    function initFailed(errorEvent) {
      // Handle the failure to load; errorEvent.detail.reasonCode has a
      // shaka.ui.FailReasonCode describing why.
      console.error('Unable to load the UI library!');
    }


    try {

      $('.shaka-mute-button').hover(function(){
        $('.shaka-volume-bar-container').addClass('d-block');
      });

      $('.shaka-mute-button').mouseleave(function(){
        setTimeout(function(){ $('.shaka-volume-bar-container').removeClass('d-block')},2000);
      })

      var fairplayCertUri = "<?= $video_details['data']['fairplayUrl'] ?>";
      var licenseURI = "<?= $video_details['data']['licenceUrl'] ?>";
      var is_drm_protected = "<?= $video_details['data']['is_drm_protected']??0 ?>";
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
              autoLowLatencyMode: true,
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

          player.getNetworkingEngine()
          .registerRequestFilter(function(type, request) {
            if (type == shaka.net.NetworkingEngine.RequestType.LICENSE) {
              const originalPayload = new Uint8Array(request.body);
              const base64Payload = shaka.util.Uint8ArrayUtils.toBase64(originalPayload);
              const params = 'spc=' + encodeURIComponent(base64Payload);
              request.body = shaka.util.StringUtils.toUTF8(params);
              request.headers['Content-Type'] = 'application/x-www-form-urlencoded';
              request.headers["<?=$video_details['data']['header']?>"] = token;
            }
          });

      }else {

          if(is_drm_protected){
            var drmConfig = {
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
          }else{
            var drmConfig = {}
          }
          
          player.configure({
            drm: drmConfig,
            streaming: {
              autoLowLatencyMode: true
            }
          });

          player.getNetworkingEngine()
          .registerRequestFilter(function(type, request) {
            if (type == shaka.net.NetworkingEngine.RequestType.LICENSE) {
              request.headers["<?=$video_details['data']['header']?>"] = token;
            }
          });
      }
      
      player.getNetworkingEngine().registerResponseFilter(function(type, response) {
          if (response.uri.includes('tracking')) {
              const responseBody = new TextDecoder().decode(response.data);
              try {
                  const jsonResponse = JSON.parse(responseBody);
                  adMetaData = jsonResponse.avails;
                  jsonResponse.avails.forEach((item,key)=>{
                    item.durationInSeconds = Number(item.durationInSeconds);
                    item.startTimeInSeconds = Number(item.startTimeInSeconds);
                    next_episode_start = Number(next_episode_start);
                    next_episode_end = Number(next_episode_end);
                    skip_start = Number(skip_start);
                    skip_end = Number(skip_end);
                    recap_start = Number(recap_start);
                    recap_end = Number(recap_end);
                    free_time = Number(free_time);
                    if(free_time >= item.startTimeInSeconds){
                      free_time += item.durationInSeconds;
                    }
                    if(next_episode_start >= item.startTimeInSeconds){
                      next_episode_start += item.durationInSeconds;
                      next_episode_end += item.durationInSeconds;
                    }

                    if(next_episode_start < item.startTimeInSeconds){
                      $('#nxt-episode a').attr('href',$('#nxt-episode a').attr('href')+'&preroll=1'); 
                    }
                    if(skip_start >= item.startTimeInSeconds){
                      skip_start += item.durationInSeconds;
                      skip_end += item.durationInSeconds;
                    }
                    if(recap_start >= item.startTimeInSeconds){
                      recap_start += item.durationInSeconds;
                      recap_end += item.durationInSeconds;
                    }

                  })
              } catch (error) {
                  console.error('Failed to parse response as JSON:', error);
              }
          }
      });

      var uri = HLSmanifestUri;
      if(adEnabled){
          var uri = await adManager.requestMediaTailorStream(file_url, mediaTailorAdsParams);
          //await getAdsData(file_url, mediaTailorAdsParams);
      }else{
        var uri = HLSmanifestUri;
      }
      //uri = 'https://content.jwplatform.com/v2/media/0bnx8dcv/manifest.mpd?policy_id=8MiuKioE&version=v2&token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MjY2NzM5NjEsInJlc291cmNlIjoiL3YyL21lZGlhLzBibng4ZGN2L21hbmlmZXN0Lm1wZD9wb2xpY3lfaWQ9OE1pdUtpb0UmdmVyc2lvbj12MiJ9.ITdNblJPoHfkdDh4EPs2cjgHi9OuYeIpaX-8q5KUzOA';
      
      // await player.load(uri);
      //video.muted=false;
      video.autoplay = true;
      video.muted = false;
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
      if((max_res > 0)){
          let height = Number(max_res);
          player.configure({
            restrictions: {
              maxHeight: height
            },
          });
          // player.setMaxHardwareResolution(width,height);
      }

      function hideUnknownLanguage(){
        var noValidLang = true;
        var variants = player.getVariantTracks();
        const buttons = document.querySelectorAll('.shaka-settings-menu.shaka-audio-languages button');
        variants.forEach((item)=>{
            if(item.language == 'und'){
                buttons.forEach(button => {
                    const span = button.querySelector('span.shaka-chosen-item'); // Find the span inside the button
                    if (span && (span.textContent.trim() === 'Undetermined' || span.textContent.trim() === 'Unknown')) {
                        button.style.display = 'none'; // Hide the button
                    }
                });
            }else{
              noValidLang = false;
            }
        });
        if(noValidLang){
          var menu = document.querySelector('.shaka-overflow-button.shaka-language-button');
          menu.style.display = 'none';
        }
      }

      await player.load(uri)
      .then(function(res) {
        video.play()
        .then(function() {
          video.addEventListener('play', function() {

         });
        })
        .catch(function(error) {
          video.muted = true;
          video.play();
        });
        setTimeout(() => {
          hideUnknownLanguage();
        }, 700);
      })
      .catch((err)=>{
        toastr.error('<?= $this->lang->line('video_unavailable') ?>');
        $('#circle-timer').css('display', 'none');
      })

        
      if ((is_free != 1 && free_time > 0) && (!session)) {
        player_timer(free_time);
      }  
  // if ((is_free != 1 && !session) ||true) {
  //     videoElement.addEventListener('play', alert('play'));
  //     videoElement.addEventListener('paused', alert('paused'));
  //     videoElement.addEventListener('playing', alert('resumed'));
  // }
      if(session){
        loadLastPlayTime();
      }      
      
      setTimeout(() => {
        $('button').click(function(){
          changeSpanName('Unrecognized (gu)', 'ગુજરાતી');
          changeSpanName('Unrecognised (gu)', 'ગુજરાતી');
        });
      }, 100);

      setTimeout(() => {
        $('.shaka-audio-languages').click(function(){
          changeSpanName('Unrecognized (gu)', 'ગુજરાતી');
          changeSpanName('Unrecognised (gu)', 'ગુજરાતી');
        })
      }, 1000);
      // changeSpanName('Captions', 'Subtitles');

      video.addEventListener('play', () => {
        showIcon(false);
        if ((is_free != 1 && free_time > 0) && (!session)) {
          resume_timer();
        }
      });
      video.addEventListener('pause', () => {
        showIcon(true);
        if ((is_free != 1 && free_time > 0) && (!session)) {
          pause_timer();
        }
      });
      const english =
        "https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/transcript/3336892/master_1718289064_20240613201433.vtt?v=1720512567";
      const hindsi =
        "https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/transcript/3336892/master_1718289064_20240613201348.vtt?v=1720512567";
      const textTracks = [{
          uri: hindsi,
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
      //   player.addTextTrackAsync(text.uri, text.language, text.kind);
      // });

      // const audioTracks = player
      //   .getVariantTracks()
      //   .filter((track) => track.type === "variant");
      // if (audioTracks.length > 0) {
      //   player.selectVariantTrack(audioTracks[0]);
      // }

      ///===============================================================================================

      var adDuration = 0;

      adManager.addEventListener(shaka.ads.Utils.ADS_LOADED, (e) => {
        // console.log('metadata-AD_METADATA', e);
      });

      adManager.addEventListener(shaka.ads.Utils.AD_BREAK_READY, (e) => {
        // console.log("AD_BREAK_READY");
      });

      adManager.addEventListener(shaka.ads.Utils.AD_BUFFERING, (e) => {
        // console.log("AD_BUFFERING");
      });

      adManager.addEventListener(shaka.ads.Utils.AD_CLICKED, (e) => {
        // console.log("AD_CLICKED");
      });

      adManager.addEventListener(shaka.ads.Utils.AD_CLOSED, (e) => {
        // console.log("AD_CLOSED");
        lastAdtime = 0;
        let ct = pausedAt;//video.currentTime+adDuration;
        let dur = video.duration;
        let currtime = Date.now();
        updateTimerDisplay(ct, dur, 1, currtime);
      });

      adManager.addEventListener(shaka.ads.Utils.AD_COMPLETE, (e) => {
        // console.log("AD_COMPLETE");
        isAddOnPlay = false;
        isAdPlaying = false;
        $('.video-ads').css('width',"0%");
      });

      adManager.addEventListener(
        shaka.ads.Utils.AD_CONTENT_ATTACH_REQUESTED,
        (e) => {
          // console.log("AD_CONTENT_ATTACH_REQUESTED");
        }
      );

      adManager.addEventListener(
        shaka.ads.Utils.AD_CONTENT_PAUSE_REQUESTED,
        (e) => {
          // console.log("AD_CONTENT_PAUSE_REQUESTED");
        }
      );

      adManager.addEventListener(
        shaka.ads.Utils.AD_CONTENT_RESUME_REQUESTED,
        (e) => {
          // console.log("AD_CONTENT_RESUME_REQUESTED");
        }
      );

      adManager.addEventListener(
        shaka.ads.Utils.AD_DURATION_CHANGED,
        (e) => {
          // console.log("AD_DURATION_CHANGED");
        }
      );

      adManager.addEventListener(shaka.ads.Utils.AD_ERROR, (e) => {
        console.log("AD_ERROR");
      });

      adManager.addEventListener(
        shaka.ads.Utils.AD_FIRST_QUARTILE,
        (e) => {
          // console.log("AD_FIRST_QUARTILE");
        }
      );

      adManager.addEventListener(shaka.ads.Utils.AD_IMPRESSION, (e) => {
        // console.log("AD_IMPRESSION");
        skipToDuration = video.currentTime;
        adMetaData.forEach((item, key) => {
          const timeDifference = video.currentTime - item.startTimeInSeconds;
          if (timeDifference >= 0 && timeDifference <= 10) {
            fullAdDuration += item.durationInSeconds;
            skipToDuration += item.durationInSeconds;
            if(item.isplayed){
              setTimeout(() => {
                video.currentTime += (item.durationInSeconds+0.5);
              }, 10);
            }
          }
        }); 
        if(lastAdPlayTime && (Date.now()-lastAdPlayTime < ("<?= ADBREAKTIME??0 ?>"*1000)) && (video.currentTime < lastAdskipTime) && !preroll){
          setTimeout(() => {
            video.currentTime = lastAdskipTime+0.5;
          }, 10);
        }
        if(lastAdtime && (lastAdtime < "<?= ADBREAKTIME??0 ?>") && didInterfere){
          let curAdDur = null;
          adMetaData.some((item) => {
            const timeDifference = video.currentTime - item.startTimeInSeconds;
            if (timeDifference >= 0 && timeDifference <= 10) {
              curAdDur = item.durationInSeconds;
              return true;
            }
          });
          setTimeout(() => {
            if(curAdDur){
              video.currentTime += curAdDur+0.5;
            }
          },10);
        }
        const skipCont = document.querySelector('.shaka-skip-ad-container');
        const skipButton = document.querySelector('.shaka-skip-ad-button');
        skipCont.classList.remove('clickable-btn');
        skipButton.classList.remove('clickable-btn');
      });

      adManager.addEventListener(shaka.ads.Utils.AD_INTERACTION, (e) => {
        // console.log("AD_INTERACTION");
      });

      adManager.addEventListener(
        shaka.ads.Utils.AD_LINEAR_CHANGED,
        (e) => {
          // console.log("AD_LINEAR_CHANGED");
        }
      );

      adManager.addEventListener(shaka.ads.Utils.AD_LOADED, (e) => {
        // console.log("AD_LOADED");
      });

      adManager.addEventListener(shaka.ads.Utils.AD_METADATA, (e) => {
        // console.log("AD_METADATA");
      });

      adManager.addEventListener(shaka.ads.Utils.AD_MIDPOINT, (e) => {
        // console.log("AD_MIDPOINT");
      });

      adManager.addEventListener(shaka.ads.Utils.AD_MUTED, (e) => {
        // console.log("AD_MUTED");
      });

      adManager.addEventListener(shaka.ads.Utils.AD_PAUSED, (e) => {
        // console.log("AD_PAUSED");
      });

      adManager.addEventListener(shaka.ads.Utils.AD_PROGRESS, (e) => {
        // console.log("AD_PROGRESS");
      });

      adManager.addEventListener(
        shaka.ads.Utils.AD_RECOVERABLE_ERROR,
        (e) => {
          isAdPlaying = false;
          $('.video-ads').css('width',"0%");
          $(".video_ads_after").css('display','none');
          // console.log("AD_RECOVERABLE_ERROR");
        }
      );

      adManager.addEventListener(shaka.ads.Utils.AD_RESUMED, (e) => {
        // console.log("AD_RESUMED");
      });

      adManager.addEventListener(
        shaka.ads.Utils.AD_SKIP_STATE_CHANGED,
        (e) => {
          // console.log("AD_SKIP_STATE_CHANGED");
          const skipCont = document.querySelector('.shaka-skip-ad-container');
          const skipButton = document.querySelector('.shaka-skip-ad-button');
          skipCont.classList.add('clickable-btn');
          skipButton.classList.add('clickable-btn');
        }
      );

      adManager.addEventListener(shaka.ads.Utils.AD_SKIPPED, (e) => {
        // console.log("AD_SKIPPED");
        isAddOnPlay = false;
        isAdPlaying = false;
        video.currentTime = skipToDuration;
        $('.video-ads').css('width',"0%");
        $(".video_ads_after").css('display','none');
        lastAdtime = 0;
        let ct = pausedAt;//video.currentTime+adDuration;
        let dur = video.duration;
        let currtime = Date.now();
        updateTimerDisplay(ct, dur, 1, currtime);
      });

      adManager.addEventListener(shaka.ads.Utils.AD_STARTED, (e) => {
        // console.log("AD_STARTED");
        $('#circle-timer').css('display', 'none');
        $('.shaka-overflow-menu').addClass('shaka-hidden');
        $('.shaka-settings-menu shaka-resolutions').addClass('shaka-hidden');
        currentAd = e.ad;
        currentAdClickTracking = [];
        currentAdClickThrough = '';
        currentAd.h.trackingEvents.forEach((item)=>{
          if(item.eventType == "clickTracking"){
            currentAdClickTracking = item.beaconUrls;
          }
          if(item.eventType == "clickThrough"){
            currentAdClickThrough = item.beaconUrls[0]??'';
          }
        });
        if(!currentAdClickThrough){
          $('.shaka-client-side-ad-container').css('cursor','default');
        }else{
          $('.shaka-client-side-ad-container').css('cursor','pointer');
        }
        adDuration = e.ad.getDuration();
        if(lastAdPlayTime && (Date.now()-lastAdPlayTime < ("<?= ADBREAKTIME??0 ?>"*1000)) && (video.currentTime < lastAdskipTime)){          
          return false;
        }
        if(lastAdtime && (lastAdtime < "<?= ADBREAKTIME??0 ?>") && didInterfere){
          return false;
        }
        isAddOnPlay = true;
        isAdPlaying = true;
        var time = video.currentTime;
        if(video.playbackRate > 0){
          playbackRate = video.playbackRate;
        }          
        video.playbackRate = 1;
        $(".shaka-backward-button").addClass("shaka-hidden");
        $(".lockButton").addClass("shaka-hidden");
        //$(".shaka-overflow-button").addClass("shaka-hidden");
        $(".shaka-forward-button").addClass("shaka-hidden");
        $(".video_ads_after").css('display','block');
        video.addEventListener("timeupdate", () => {
          if (isAdPlaying) {
            var adseekupdate = Math.ceil((video.currentTime-time)*(100/(adDuration)));
            $('.video-ads').css('width',adseekupdate+"%");
          }
        }); 
        adMetaData.forEach((item, key) => {
            const timeDifference = video.currentTime - item.startTimeInSeconds;
            var isLastAd = (item.startTimeInSeconds+item.durationInSeconds)-video.currentTime;
            if (timeDifference >= 0 && timeDifference <= adDuration) {
              adMetaData[key]['isplayed'] = true;
              pausedAt = (item.startTimeInSeconds>0)?(item.startTimeInSeconds-1):item.startTimeInSeconds;
            }
            if(isLastAd <= adDuration){
              pausedAt = (item.startTimeInSeconds+item.durationInSeconds);
            }
          });       
        const sdkAdObject = e["sdkAdObject"];
        const originalEvent = e["originalEvent"];
        cosnole.log("SDK OBJECT = " + sdkAdObject);
        cosnole.log("ORIGINAL EVENT = " + originalEvent);
      });

      adManager.addEventListener(shaka.ads.Utils.AD_STOPPED, (e) => {
        // console.log("AD_STOPPED");
        if ((is_free != 1 && free_time > 0) && (!session)) {
          $('#circle-timer').css('display', 'block');
        }
        isAddOnPlay = false;
        video.playbackRate = playbackRate;
        // ui.configure(defaultConfig);
        $(".shaka-backward-button").removeClass("shaka-hidden");
        $(".shaka-forward-button").removeClass("shaka-hidden");
        $(".lockButton").removeClass("shaka-hidden");
        // $(".shaka-overflow-button").removeClass("shaka-hidden");
        $(".video_ads_after").css('display','none');
        lastAdtime = 0;
        let ct = pausedAt;//video.currentTime+adDuration;
        let dur = video.duration;
        let currtime = Date.now();
        updateTimerDisplay(ct, dur, 1, currtime);
      });

      adManager.addEventListener(
        shaka.ads.Utils.AD_THIRD_QUARTILE,
        (e) => {
          //console.log("AD_THIRD_QUARTILE");
        }
      );

      adManager.addEventListener(
        shaka.ads.Utils.AD_VOLUME_CHANGED,
        (e) => {
          //console.log("AD_VOLUME_CHANGED");
        }
      );

      adManager.addEventListener(shaka.ads.Utils.ADS_LOADED, (e) => {
        //console.log("ADS_LOADED");
      });

      adManager.addEventListener(
        shaka.ads.Utils.ALL_ADS_COMPLETED,
        (e) => {
          //console.log("ALL_ADS_COMPLETED");
        }
      );

      adManager.addEventListener(
        shaka.ads.Utils.CUEPOINTS_CHANGED,
        (e) => {
          //console.log("CUEPOINTS_CHANGED");
        }
      );
      
    } catch (error) {
      console.error("Error loading manifest:", error);
    }

  }

  <?php if (!empty($next_vid['id'])) { ?>
    next_episode_cont = true;
    let nextepUrl = "<?= base_url((($next_vid['similar'] != 1) ? 'play-media?id=' : 'play-episode?id=')) . aes_cbc_encryption_($next_vid['id']) . '&play-video=' . $play_id ?>";
    let next_ep = ' <div class="next_episode_d" id="nxt-episode"> <div class = "nex_ep"><div class = "nex_ep_head"><h5 class = "mb-0"> Next Up </h5> <img class = "img-fluid player_remove_btn" src="<?= base_url('assets/images/closeVid.png') ?>" alt = "" > </div> <a href = "'+nextepUrl+'"><div class = "ep_cen_img my-epiosode-bar"> <img src = "' + "<?= !empty($next_vid['poster_url'])?$next_vid['poster_url']:base_url(PosterPlaceholder) ?>" + '" class = "img-fluid" alt = "img"><div class="play_episode_timer"> <div class = "eps_dt_play"><div class = "play_ep_position"><span class = "eps_play_circle" role = "progressbar" aria-valuenow = "0" style = "width: 45px; height: 45px; transform: rotate(-90deg);"> <svg class="eps_progress_play" viewBox="0 0 100 100"><circle cx="50" cy="50" r="45" fill="none" class="eps_dt_1" /><path id="progress" d="M 50, 5a 45,45 0 0,1 0,90a 45,45 0 0,1 0,-90" fill="none" stroke-linecap="round" stroke-width="8" stroke="#fff" /></svg> </span></div> </div> </div> <div class="progress_ep" id="progress_episode"><div class="inner"><div class = "player_episode_icon"><img src="<?= base_url('assets/images/next_ep_play.svg') ?>" alt="ep" class = "img-fluid" alt = "play"></div> </div> </div > </div> </a> <p class = "nex_ep_dt h7"> ' + "<?= $next_vid['title'] ?>" + ' </p> </div > </div>';

    var controlBar = document.querySelector('.shaka-controls-container');
    controlBar.insertAdjacentHTML('afterend', next_ep);
    $('#nxt-episode').hide();
    nxt_ep_status = true;
  <?php } ?>

  $('.player_remove_btn').on('click', function() {
    next_episode_cont = false;
    $('#nxt-episode').hide('slow');
    $('.shaka-bottom-controls').css('display', 'block');
    nxt_ep_status = true;
    // $('.shaka-controls-container').show();
    //$('.shaka-controls-container').css('display', 'flex').show();
  });
  var genres =  "<?= $content_details['data']['genres'] ?>";

$('.shaka-forward-button').on('click', function() {
  var videoElement = document.getElementById("video");
  var current_timee = videoElement.currentTime;
  var added_time = current_timee + 10;
  var formattedTime = formatTime(current_timee);
  var forward_time = formatTime(added_time);


  var title = "<?= $video_details['data']['title'] ?>";
  var c_title = "<?= $content_details['data']['title'] ?>";
  var id = '<?= $video_details['data']['id'] ?>';
 
  if(title){
    // queueTrackingData('trackEvent', ["<?= $guest_user ?>", 'Forward', 'Forward', '/ From :' + formattedTime + '/ Forward: 10 Seconds /To: ' + forward_time + '/' + id + '/' + title + '-' + c_title + '/' + paid_d + '/' + id + '/' + title]);
  var Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>";
 var interaction  = "<?= $guest_user ?>"+'/Forward -From :' + formattedTime + '/ Forward: 10 Seconds /To: ' + forward_time;
    queueTrackingDataWithDelay('trackContentInteraction', [interaction,Ititle,genres],0);
    queueTrackingDataWithDelay('trackContentImpression', [Ititle,genres],100);
  }
  
});

$('.shaka-backward-button').on('click', function() {
  var videoElement = document.getElementById("video");
  var current_timee = videoElement.currentTime;
  var added_time = current_timee;
  var formattedTime = formatTime(current_timee);
  var forward_time = formatTime(added_time);


  var title = "<?= $video_details['data']['title'] ?>";
  var c_title = "<?= $content_details['data']['title'] ?>";
  var id = '<?= $video_details['data']['id'] ?>';

 var Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>";
 var interaction  = "<?= $guest_user ?>"+'/Rewind -From :' + formattedTime + '/ Rewind: 10 Seconds /To: ' + forward_time;
  if(title){
   
    // queueTrackingData('trackEvent', ["<?= $guest_user ?>", 'Rewind','/ From :' + formattedTime + '/ Rewind: 10 Seconds /To: ' + forward_time + '/' + id + '/' + title + '-' + c_title + '/' + paid_d + '/' + id + '/' + title]);
    queueTrackingDataWithDelay('trackContentInteraction', [interaction, Ititle, genres],0);
    queueTrackingDataWithDelay('trackContentImpression', [Ititle,genres],100);
  }    
});

$('.shaka-forward-button, .shaka-backward-button, .shaka-seek-bar').click(function(){
  didInterfere = true;
});
// video.addEventListener('rewind', function(e) {
//   alert('hii');
//   console.log('e',e);
//   });

$('.shaka-range-element').on('click', function() {
  var videoElement = document.getElementById("video");
  var current_timee = videoElement.currentTime;
  var added_time = current_timee;
  var formattedTime = formatTime(current_timee);
  var forward_time = formatTime(added_time);

  var title = "<?= $video_details['data']['title'] ?>";
  var c_title = "<?= $content_details['data']['title'] ?>";
  var id = '<?= $video_details['data']['id'] ?>';

   var Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>";
 var interaction  = "<?= $guest_user ?>"+'/Seekbar -From :' + formattedTime + '/ Seekbar: 10 Seconds /To: ' + forward_time;
  if(title){
   // queueTrackingData('trackEvent', ["<?= $guest_user ?>", 'Seekbar', '/ From :' + formattedTime + '/ Seekbar: 10 Seconds /To: ' + forward_time + '/' + id + '/' + title + '-' + c_title + '/' + paid_d + '/' + id + '/' + title]);
    queueTrackingDataWithDelay('trackContentInteraction', [interaction, Ititle,genres],0);
    queueTrackingDataWithDelay('trackContentImpression', [Ititle, genres],100);
  }
});


  function formatTime(seconds) {
    var hours = Math.floor(seconds / 3600);
    var minutes = Math.floor((seconds % 3600) / 60);
    var seconds = Math.floor(seconds % 60);

    var formattedTime =
      (hours < 10 ? '0' : '') + hours + ':' +
      (minutes < 10 ? '0' : '') + minutes + ':' +
      (seconds < 10 ? '0' : '') + seconds;

    return formattedTime;
  }

  function parsingResponse(response) {
    let responseText = arrayBufferToString(response.data);
    // Trim whitespace.
    responseText = responseText.trim();

    try {
      const pallyconObj = JSON.parse(responseText);
      if (pallyconObj && pallyconObj.errorCode && pallyconObj.message) {
        if ("8002" != errorCode) {
          console.warn("PallyCon Error : " + pallyconObj.message + "(" + pallyconObj.errorCode + ")");
          //window.alert('No Rights. Server Response ' + responseText);
        } else {
          var errorObj = JSON.parse(pallyconObj.message);
          console.warn("Error : " + errorObj.MESSAGE + "(" + errorObj.ERROR + ")");
        }
      }
    } catch (e) {}
  }

  function arrayToString(array) {
    var uint16array = new Uint16Array(array.buffer);
    return String.fromCharCode.apply(null, uint16array);
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
  })

  video.addEventListener('pause', function() {
    playPauseCallback();
  })
  

  $('.shaka-skip-Intro-button').click(function() {
    if ("<?= $video_details['data']['title'] ?>") {
      var c_time=  convertTimes(video.currentTime);
      var Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>"+"/"+ convertTimes(video.currentTime);

      queueTrackingData('trackEvent', ["Video", 'SkipIntro',Ititle]);
    }
  });

  $('.shaka-skip-recap-button').click(function() {
    if ("<?= $video_details['data']['title'] ?>") {
      var cc_time=  convertTimes(video.currentTime);
      var Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>"+"/"+ convertTimes(video.currentTime);

      queueTrackingData('trackEvent', ["Video", 'SkipRecap', Ititle]);

    }
  });

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

  function matomo(user, type, title, hits = 4) {
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

  function matomo_sk_for(user, type, title, hits = 9) {
    $.ajax({
      type: 'POST',
      url: "<?= base_url('/web/Home/matomo_hit') ?>",
      dataType: "json",
      data: {
        user: user,
        types: type, // Typo here, it should be type instead of types
        type: hits,
        title: title,
        genres: 'comedy'
      },
      success: function(data) {
        if (data.status == 1) {

        }

      }

    });
  }

  window.history.pushState({
    page: 1
  }, document.title, "");
  window.history.replaceState({
    page: 2
  }, document.title, "");
  // Listen for the popstate event
  //var player = videojs('my-video');
  var total_episode = 0;
var episode_dets = `
  <div class="episode_body d-none episode_bodys">
    <div class="pb-2 epd-h">
      <div class="d-flex align-item-center">
        <img class="img-fluid epsode-img_dts" src="<?= base_url('assets/images/episode.svg') ?>" alt="close">
        <h5 class="ep_heading">
            <?= $this->lang->line('episodes'); ?>
        </h5>
      </div>
      <div class="epiose_close_icon">
        <img class="img-fluid" src="<?= base_url('assets/images/closeVid.png') ?>" alt="close">
      </div>
    </div>
    <div class="episodes_tab_btns pt-4">
      <nav>
        <div class="nav nav-tabs ep_tab_dt" id="nav-tab" role="tablist">`;
        <?php if(isset($content_details['data']['season']) && !empty($content_details['data']['season'])){ ?>
          <?php foreach($content_details['data']['season'] as $key => $value){ ?>
            episode_dets += `<a class="nav-link <?=($key==0)?'active':''?>" id="season<?=$key+1?>-tab" data-bs-toggle="tab" href="#season<?=$key+1?>" role="tab" aria-controls="season<?=$key+1?>" aria-selected="true">Season<?=$key+1?></a>`;
          <?php } ?>
        <?php } ?>
          episode_dets += `</div>
      </nav>
      <div class="tab-content pt-5" id="nav-tabContent">`;
        <?php if(isset($content_details['data']['season']) && !empty($content_details['data']['season'])){ ?>
          <?php foreach($content_details['data']['season'] as $key => $value){ ?>
            episode_dets += `<div class="tab-pane fade show <?=($key==0)?'active':''?>" id="season<?=$key+1?>" role="tabpanel" aria-labelledby="season<?=$key+1?>-tab">
                <div class="episodeSEction">`;
                  <?php foreach($value['videos'] as $ckey => $cvalue){ ?>
                    <?php if($cvalue['is_trailer']==1) continue; ?>
                    total_episode += 1;
                    episode_dets += `<div class="playepsode_list <?=($cvalue['id']==$video_details['data']['id'])?'current-episode':'' ?>">
                        <div class="episodeFullBox_detail episodeFullBox">
                          <a href="<?= base_url('play-media?id='.aes_cbc_encryption_($cvalue['id'])) ?>">
                            <div class="position-relative epd">
                              <img class="img-fluid w-100" src="<?= !empty($cvalue['poster_url'])?$cvalue['poster_url']:base_url(PosterPlaceholder) ?>" alt="episode">
                              
                            </div>
                            <div class="py-2">
                              <p class="episodeOne text-white m-0"><?= $cvalue['title'] ?></p>
                              
                            </div>
                          </a>
                        </div>
                      </div>`;
                  <?php } ?>
                  episode_dets += `</div>
                                </div>`;
          <?php } ?>
        <?php } ?>

        
        `<div class="tab-pane fade" id="season2" role="tabpanel" aria-labelledby="season2-tab">
          <div class="episodeSEction">
            <div class="playepsode_list">
              <div class="episodeFullBox_detail episodeFullBox">
                <a href="javascript:void(0);">
                  <div class="position-relative epd">
                    <img class="img-fluid w-100" src="<?= base_url('assets/images/posterPlaceholder.png') ?>" alt="episode">
                   
                  </div>
                  <div class="py-2">
                    <p class="episodeOne text-white m-0">Hello</p>
                   
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>`;

$('#video-container').append(episode_dets);
$('.epiose_close_icon').click(function(){
  $('.episode_body').addClass('d-none');
})
var ep_free_timer='<canvas id="circle-timer" width="100" height="100"></canvas>';
$('#video-container').append(ep_free_timer);
var add_sponsered_de = `
    <div class="add_sp_de">
        <div class="add_right_s">
            <div class="add_sp_img">
                <img class="img-fluid" src="<?php echo base_url('assets/images/reottpg.jpg'); ?>" alt="Sponsored Image">
            </div>
            <div class="ads_right_str">
                <h4>Perfumr</h4>
                <p>gmail.com</p>
            </div>
            </div>
            <div class="add_sp_visit_btn">
                <a href="javascript:void(0);">Visit Now</a>
            </div>
        
    </div>
`;

  $(document).ready(function() {
    if(total_episode <= 1){
      $('.shaka-episode-button').addClass('shaka-hidden');
    }
    window.addEventListener('online', handleConnectionChange);
    window.addEventListener('offline', handleConnectionChange);
  });

  function handleConnectionChange(event) {
    if (event.type == "offline") {
      $("#pboverlaydiv").css("display", "none");
      $('#video-container').append('<h4 class="no_intrnt_text text-white network_bott"><?= $this->lang->line("nointernet-connection") ?></h4>');
      //overlay("Please wait.. internet is Not available.");
    }
    if (event.type == "online") {
      $('#video-container').find('.no_intrnt_text').remove();
      $('#video-container').append('<h4 class="intrnt_text text-white network_bott"><span class="network_size">✓</span> <?= $this->lang->line("internet-connection") ?></h4>');
      setTimeout(() => {
        $('#video-container').find('.intrnt_text').remove();
      }, 1000)
    }
  }

  function exitFullScreenIfNeeded() {
    if (document.fullscreenElement || 
        document.webkitFullscreenElement || 
        document.mozFullScreenElement || 
        document.msFullscreenElement) {
      // The document is currently in fullscreen mode
      document.exitFullscreen().catch((err) => {
        console.error("Error exiting full screen: ", err);
      });
    }
  }

  function update_data() {
    exitFullScreenIfNeeded();
    var redirect = "<?= $video_details['data']['redirtct'] ?>";
    var play_url = "<?= $play_id ?>";
    var id = "<?= $video_details['data']['id'] ?>";
    var title= "<?= $video_details['data']['title'] ?>"; 
    var gen = "<?= $content_details['data']['genres'] ?>";
    if (!isAddOnPlay) {
      times = id_title + convertTimes(video.currentTime);
      var Ititle= "<?=$eventtitle ?>"+"<?= $paid_d?>"+"<?=$video_type?>"+"<?=$eventseason?>"+"/"+ convertTimes(video.currentTime);

      if ("<?= $video_details['data']['title'] ?>") {
        queueTrackingDataWithDelay('trackEvent', ["<?= $guest_user ?>", 'Stop', Ititle,],20);
        //queueTrackingDataWithDelay('trackEvent', ["ContinueWatching", 'Add', id + '/' + title,gen],50);
        queueTrackingDataWithDelay('trackContentInteraction', ["ContinueWatching" + '/' + 'Add', id + '/' + title, gen],100);
        queueTrackingDataWithDelay('trackContentImpression', [id + '/' + title, gen],150);
      }

      var ct = video.currentTime;
      var dur = video.duration;
      if ((dur - ct) <= 5) {
        updateTimerDisplay(ct, dur, 3);
      } else {
        updateTimerDisplay(ct, dur);
      }
      localStorage.setItem('lastPlayTime' + uuid, video.currentTime);
    }
    setTimeout(function() {
      if (redirect == 1) {
        window.location.href = "<?= base_url() ?>";

      } else if (play_url) {
        window.location.href = "<?= base_url()  . $play_id ?>";
      } else {
        if(document.referrer !=''){
          window.history.back();
        }else{
          window.location.href = "<?= base_url() ?>";
        }
        //window.location.href = "<?//= base_url() . 'play-video?id=' . $urlencrypted_id ?>";
      }
      //window.history.back();
    }, 500);
  }

  $(document).ready(function() {
    var back_nav_btn = '<div class="d-flex align-item-center back-button"><button class=" bcktfy bacflyil" onclick="update_data()"> <svg width="24px" height="24px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z" fill="#ffffff" stroke="#ffffff" stroke-width="80" /></svg>  &nbsp;&nbsp;  </button><span class="bac-btn-title">' + "<?= $video_details['data']['title'] ?>" + ' </span></div>';
    $('#video-container').append(back_nav_btn);
    var back_nav_title = '<div class="vjs-title"> </div>';
    $('#video-container').append(back_nav_title);

    if ('<?= $play_id ?>') {
      if ("<?= $video_details['data']['title'] ?>") {
        // matomo('Episode', 'Select', "<?= $moto_title ?>", 5);
      }

    }
    var profile_id = "<?= $_SESSION['profile_id'] ?? ''; ?>";
    var video_id = '<?= $video_details['data']['id']; ?>';
    var cachekey = profile_id + '-continueWatching';

    $(window).on('popstate', function(event) {
      try {
        var crTime = video.currentTime;
        var dur = video.duration;
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

        if ((type_id != 2 || type_id != 3) && (crTime > 0) && !isAddOnPlay) {
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

  function matomo_con(user, type,titles, geners = '',tt=4) {
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
        type: tt
        
      },
      success: function(data) {
      },
      error: function(xhr, status, error) {
        //  console.error("Error: " + error);
      }
    });
  }
  
  function matomo_sear(user, type, titles, geners = '',search_jao) {
    var url = '<?= base_url("/web/Home/matomo_hit"); ?>';
    $.ajax({
      url: url,
      type: "POST",
      dataType: "json",
      async: "true",
      data: {
        user: user,
        types: type, // Typo here, it should be type instead of types
        type:5,
        geners: geners,
        title: titles,
        search_jao :search_jao
        
      },
      success: function(data) {
      },
      error: function(xhr, status, error) {
        //  console.error("Error: " + error);
      }
    });
  }

  document.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        handleEnterKey(event);
    }
  });
      
  function handleEnterKey(event) {
    const activeElement = document.activeElement;
    if (activeElement) {
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
      
  // Log focusable buttons
  // document.querySelectorAll('#video-container button').forEach((btn, index) => {
  //     console.log(`Button ${index} is focusable: ${btn.tabIndex >= 0}`);
  // });
  // console.log(window.location.href,"ssssss"); // Logs the last visited URL


  </script>

</body>

</html>