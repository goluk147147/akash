<style>
  <!--do not mess with this you will messs it up 
  -->
  *:focus
  {
  outline:
  none;
  }
  body
  {
  font-family:
  Helvetica,
  Arial;
  margin:
  0;
  /*
  background-color:
  #ffeff0;
  */
  }
  #app-cover
  {
  position:
  absolute;
  bottom:
  2%;
  right:
  0;
  left:
  0;
  width:
  1000px;
  height:
  100px;
  margin:
  0px
  auto;
  }
  #bg-artwork
  {
  /*
  position:
  fixed;
  */
  top:
  -30px;
  right:
  -30px;
  bottom:
  -30px;
  left:
  -30px;
  background-image:
  url("https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_1.jpg");
  background-repeat:
  no-repeat;
  background-size:
  cover;
  background-position:
  50%;
  filter:
  blur(40px);
  -webkit-filter:
  blur(40px);
  z-index:
  1;
  }
  #bg-layer
  {
  /*
  position:
  fixed;
  */
  top:
  0;
  right:
  0;
  bottom:
  0;
  left:
  0;
  background-color:
  #fff;
  opacity:
  0.51;
  z-index:
  2;
  }
  #player
  {
  position:
  relative;
  height:
  100%;
  z-index:
  3;
  }
  #player-track
  {
  position:
  absolute;
  top:0;
  right:15px;
  left:15px;
  padding:13px
  22px
  10px
  184px;
  /*
  background-color:
  #fff7f7;
  */
  border-radius:
  15px
  15px
  0
  0;
  transition:
  0.3s
  ease
  top;
  z-index:
  1;
  visibility:
  hidden;
  }
  #player-track.active
  {
  top:
  -111px;
  visibility:
  visible;
  transition:
  all
  0.5s;
  }
  #album-name
  {
  color:
  #fff;
  font-size:
  17px;
  font-weight:
  bold;
  }
  #track-name
  {
  color:
  #999;
  font-size:
  13px;
  margin:
  2px
  0
  9px
  0;
  }
  #track-time
  {
  height:
  16px;
  margin-bottom:
  3px;
  overflow:
  hidden;
  }
  #current-time
  {
  float:
  left;
  }
  #track-length
  {
  float:
  right;
  }
  #current-time,
  #track-length
  {
  color:
  transparent;
  font-size:
  11px;
  background-color:
  #ffe8ee;
  border-radius:
  10px;
  transition:
  0.3s
  ease
  all;
  }
  #track-time.active
  #current-time,
  #track-time.active
  #track-length
  {
  color:
  #f86d92;
  background-color:
  transparent;
  }
  #s-area,
  #seek-bar
  {
  position:
  relative;
  height:
  4px;
  border-radius:
  4px;
  }
  #s-area
  {
  background-color:
  #ffe8ee;
  cursor:
  pointer;
  }
  #ins-time
  {
  position:
  absolute;
  top:
  -29px;
  color:
  #fff;
  font-size:
  12px;
  white-space:
  pre;
  padding:
  5px
  6px;
  border-radius:
  4px;
  display:
  none;
  }
  #s-hover
  {
  position:
  absolute;
  top:
  0;
  bottom:
  0;
  left:
  0;
  opacity:
  0.2;
  z-index:
  2;
  }
  #ins-time,
  #s-hover
  {
  background-color:
  #3b3d50;
  }
  #seek-bar
  {
  content:
  "";
  position:
  absolute;
  top:
  0;
  bottom:
  0;
  left:
  0;
  width:
  0;
  background-color:
  #fd6d94;
  transition:
  0.2s
  ease
  width;
  z-index:
  1;
  }
  #player-content
  {
  position:
  relative;
  height:
  100%;
  /*
  background-color:
  #fff;
  */
  box-shadow:
  0
  30px
  80px
  #656565;
  border-radius:
  15px;
  z-index:
  2;
  }
  #album-art
  {
  position:
  absolute;
  top:
  -40px;
  width:
  115px;
  height:
  115px;
  margin-left:
  40px;
  transform:
  rotateZ(0);
  transition:
  0.3s
  ease
  all;
  box-shadow:
  0
  0
  0
  10px
  #fff;
  border-radius:
  50%;
  overflow:
  hidden;
  }
  #album-art.active
  {
  top:
  -60px;
  box-shadow:
  0
  0
  0
  4px
  #fff7f7,
  0
  30px
  50px
  -15px
  #afb7c1;
  }
  #album-art:before
  {
  content:
  "";
  position:
  absolute;
  top:
  50%;
  right:
  0;
  left:
  0;
  width:
  20px;
  height:
  20px;
  margin:
  -10px
  auto
  0
  auto;
  background-color:
  #d6dee7;
  border-radius:
  50%;
  box-shadow:
  inset
  0
  0
  0
  2px
  #fff;
  z-index:
  2;
  }
  #album-art
  img
  {
  display:
  block;
  position:
  absolute;
  top:
  0;
  left:
  0;
  width:
  100%;
  height:
  100%;
  opacity:
  0;
  z-index:
  -1;
  }
  #album-art
  img.active
  {
  opacity:
  1;
  z-index:
  1;
  }
  #album-art.active
  img.active
  {
  z-index:
  1;
  animation:
  rotateAlbumArt
  3s
  linear
  0s
  infinite
  forwards;
  }
  @keyframes
  rotateAlbumArt
  {
  0%
  {
  transform:
  rotateZ(0);
  }
  100%
  {
  transform:
  rotateZ(360deg);
  }
  }
  #buffer-box
  {
  position:
  absolute;
  top:
  50%;
  right:
  0;
  left:
  0;
  height:
  13px;
  color:
  #1f1f1f;
  font-size:
  13px;
  font-family:
  Helvetica;
  text-align:
  center;
  font-weight:
  bold;
  line-height:
  1;
  padding:
  6px;
  margin:
  -12px
  auto
  0
  auto;
  background-color:
  rgba(255,
  255,
  255,
  0.19);
  opacity:
  0;
  z-index:
  2;
  }
  #album-art
  img,
  #buffer-box
  {
  transition:
  0.1s
  linear
  all;
  }
  #album-art.buffering
  img
  {
  opacity:
  0.25;
  }
  #album-art.buffering
  img.active
  {
  opacity:
  0.8;
  filter:
  blur(2px);
  -webkit-filter:
  blur(2px);
  }
  #album-art.buffering
  #buffer-box
  {
  opacity:
  1;
  }
  #player-controls
  {
  width:
  250px;
  height:
  100%;
  margin:
  0
  5px
  0
  141px;
  float:
  right;
  overflow:
  hidden;
  display:
  flex;
  align-items:
  center;
  }
  .control
  {
  width:
  33.333%;
  float:
  left;
  padding:
  12px
  0;
  }
  .button
  {
  width:
  26px;
  height:
  26px;
  padding:
  25px;
  border-radius:
  6px;
  cursor:
  pointer;
  display:flex;
  justify-content:center;
  align-items:
  center;
  }
  .button
  i
  {
  display:
  block;
  color:
  #d6dee7;
  font-size:
  26px;
  text-align:
  center;
  line-height:
  1;
  }
  .button,
  .button
  i
  {
  transition:
  0.2s
  ease
  all;
  }
  .button:hover
  {
  background-color:
  #d6d6de;
  }
  .button:hover
  i
  {
  color:
  #000;
  }
  .player_heart
  i
  {
  color:#fff;
  }
  .top-header-area
  {
  position:
  sticky
  !important;
  top:0px
  !important;
  }
  @media
  (min-width:
  768px)
  and
  (max-width:
  991px)
  {
  #app-cover
  {
  width:
  100%;
  height:
  100px;
  margin:
  0px
  auto;
  }
  #album-art
  {
  position:
  absolute;
  top:
  -40px;
  width:
  80px;
  height:
  80px;
  margin-left:
  21px;
  transform:
  rotateZ(0);
  transition:
  0.3s
  ease
  all;
  box-shadow:
  0
  0
  0
  10px
  #fff;
  border-radius:
  50%;
  overflow:
  hidden;
  }
  .control
  {
  width:
  20.333%;
  float:
  left;
  padding:
  12px
  0;
  }
  #player-controls
  {
  justify-content:
  end;
  }
  #player
  {
  margin:
  0
  10px
  !important;
  }
  #preloader_1
  {
  top:
  25px
  !important;
  left:
  50%
  !important;
  transform:
  translateX(-10%)
  !important;
  }
  }
  @media
  (min-width:
  577px)
  and
  (max-width:
  767px)
  {
  #app-cover
  {
  width:
  100%;
  height:
  100px;
  margin:
  0px
  auto;
  }
  #album-art
  {
  position:
  absolute;
  top:
  -40px;
  width:
  80px;
  height:
  80px;
  margin-left:
  21px;
  transform:
  rotateZ(0);
  transition:
  0.3s
  ease
  all;
  box-shadow:
  0
  0
  0
  10px
  #fff;
  border-radius:
  50%;
  overflow:
  hidden;
  }
  .control
  {
  width:
  20.333%;
  float:
  left;
  padding:
  12px
  0;
  }
  #player-controls
  {
  justify-content:
  end;
  }
  #player
  {
  margin:
  0
  10px
  !important;
  }
  #preloader_1
  {
  top:
  25px
  !important;
  left:
  50%
  !important;
  transform:
  translateX(-22%)
  !important;
  }
  }
  @media
  (min-width:
  320px)
  and
  (max-width:
  576px)
  {
  #app-cover
  {
  width:
  100%;
  height:
  100px;
  margin:
  0px
  auto;
  }
  #album-art
  {
  position:
  absolute;
  top:
  -40px;
  width:
  80px;
  height:
  80px;
  margin-left:
  21px;
  transform:
  rotateZ(0);
  transition:
  0.3s
  ease
  all;
  box-shadow:
  0
  0
  0
  10px
  #fff;
  border-radius:
  50%;
  overflow:
  hidden;
  }
  .control
  {
  width:
  20.333%;
  float:
  left;
  padding:
  12px
  0;
  }
  #player-controls
  {
  justify-content:
  end;
  }
  #player
  {
  margin:
  0
  10px
  !important;
  }
  #preloader_1
  {
  top:
  25px
  !important;
  left:
  50%
  !important;
  transform:
  translateX(-22%)
  !important;
  }
  }
  /*music
  palyer*/
  #preloader_1
  {
  position:
  relative;
  margin-top:
  10%;
  top:
  25px;
  left:
  50%;
  /*
  right:
  0;
  */
  transform:
  translateX(-10%);
  }
  #preloader_1
  span
  {
  display:
  block;
  bottom:
  0px;
  width:
  4px;
  height:
  20px;
  background-image:
  linear-gradient(to
  right
  top,
  blue,
  black,
  red);
  position:
  absolute;
  animation:
  preloader_1
  1.5s
  infinite
  ease-in-out;
  }
  #preloader_1
  span:nth-child(2)
  {
  left:
  11px;
  animation-delay:
  0.2s;
  }
  #preloader_1
  span:nth-child(3)
  {
  left:
  22px;
  animation-delay:
  0.4s;
  }
  #preloader_1
  span:nth-child(4)
  {
  left:
  33px;
  animation-delay:
  0.6s;
  }
  #preloader_1
  span:nth-child(5)
  {
  left:
  44px;
  animation-delay:
  0.8s;
  }
  #preloader_1
  span:nth-child(6)
  {
  left:
  55px;
  animation-delay:
  1.0s;
  }
  #preloader_1
  span:nth-child(7)
  {
  left:
  66px;
  animation-delay:
  1.2s;
  }
  #preloader_1
  span:nth-child(8)
  {
  left:
  77px;
  animation-delay:
  1.4s;
  }
  #preloader_1
  span:nth-child(9)
  {
  left:
  88px;
  animation-delay:
  1.6s;
  }
  #preloader_1
  span:nth-child(10)
  {
  left:
  99px;
  animation-delay:
  1.8s;
  }
  #preloader_1
  span:nth-child(11)
  {
  left:
  110px;
  animation-delay:
  2.0s;
  }
  #preloader_1
  span:nth-child(12)
  {
  left:
  121px;
  animation-delay:
  2.2s;
  }
  #preloader_1
  span:nth-child(13)
  {
  left:
  132px;
  animation-delay:
  2.4s;
  }
  #preloader_1
  span:nth-child(14)
  {
  left:
  143px;
  animation-delay:
  2.6s;
  }
  #preloader_1
  span:nth-child(15)
  {
  left:
  154px;
  animation-delay:
  2.8s;
  }
  #preloader_1
  span:nth-child(16)
  {
  left:
  165px;
  animation-delay:
  3.0s;
  }
  #preloader_1
  span:nth-child(17)
  {
  left:
  176px;
  animation-delay:
  3.2s;
  }
  @keyframes
  preloader_1
  {
  0%
  {
  height:
  15px;
  transform:
  translateY(0px);
  background-image:
  linear-gradient(to
  right
  top,
  blue,
  red);
  }
  25%
  {
  height:
  90px;
  transform:
  translateY(45px);
  background-image:
  linear-gradient(to
  right
  top,
  black,
  blue);
  }
  50%
  {
  height:
  15px;
  transform:
  translateY(0px);
  background-image:
  linear-gradient(to
  right
  top,
  red,
  black);
  }
  100%
  {
  height:
  15px;
  transform:
  translateY(0px);
  background-image:
  linear-gradient(to
  right
  top,
  blue,
  red);
  }
  }

</style>
</head>

<div>
  <div class="container">
    <!-- music -->
    <div class="row">
      <div class="col-md-12 m-auto">
        <div id="preloader_1">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>

        </div>
      </div>

      <div id="app-cover">



        <div id="bg-artwork"></div>
        <div id="bg-layer">

        </div>
        <div id="player">
          <div id="player-track">
            <div id="album-name"></div>
            <div id="track-name"></div>
            <div id="track-time">
              <div id="current-time"></div>
              <div id="track-length"></div>
            </div>
            <div id="s-area">
              <div id="ins-time"></div>
              <div id="s-hover"></div>
              <div id="seek-bar"></div>
            </div>
          </div>
          <div id="player-content">
            <div id="album-art">
              <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/perception-album-cover.png" class="active" id="_1" alt="cover image">
              <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/silence-album-cover.jpg" id="_2" alt="silence">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeF8jZE27NKvhKz8w2Cn4tG49_0YkFyqhdI8fficlY0usVn4KFP4sYPyeqR5nWAlDrZpI:https://i.ytimg.com/vi/y-yyB1OMPAY/sddefault.jpg&usqp=CAU" id="_3" alt="default">



              <div id="buffer-box">Buffering ...</div>
            </div>
            <div id="player-controls">
              <div class="control">
                <div class="button" id="play-previous">
                  <i class="fas fa-backward"></i>
                </div>
              </div>
              <div class="control">
                <div class="button" id="play-pause-button">
                  <i class="fas fa-play"></i>
                </div>
              </div>
              <div class="control">
                <div class="button" id="play-next">
                  <i class="fas fa-forward"></i>
                </div>
              </div>
              <div class="control">
                <div class="button player_heart">
                  <i class="far fa-heart"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$temp = [];
foreach ($details_data->data as $audio) {
  $data[]   = $audio->url;
}
$temp = $data;
$datta = json_encode($temp);
// print_r($temp);
// pre($datta);
?>

<?php
$temp = [];
foreach ($details_data->data as $audio) {
  $dataa[]   = $audio->title;
}
$tempp = $dataa;
$da = json_encode($tempp);
// print_r($temp);
// pre($datta);
?>

<script>
  $(function() {
    var trackUrl = <?= $datta; ?>;
    var trackTitles = <?= $da; ?>;

    var playerTrack = $("#player-track"),
      bgArtwork = $("#bg-artwork"),
      bgArtworkUrl,
      albumName = $("#album-name"),
      trackName = $("#track-name"),
      albumArt = $("#album-art"),
      sArea = $("#s-area"),
      seekBar = $("#seek-bar"),
      trackTime = $("#track-time"),
      insTime = $("#ins-time"),
      sHover = $("#s-hover"),
      playPauseButton = $("#play-pause-button"),
      i = playPauseButton.find("i"),
      tProgress = $("#current-time"),
      tTime = $("#track-length"),
      seekT,
      seekLoc,
      seekBarPos,
      cM,
      ctMinutes,
      ctSeconds,
      curMinutes,
      curSeconds,
      durMinutes,
      durSeconds,
      playProgress,
      bTime,
      nTime = 0,
      buffInterval = null,
      tFlag = false,
      albums = [<?= $da; ?>

      ],
      trackNames = [
        "NP",
        "Disturbed",
        "Dax",
        "Dax",

      ],

      albumArtworks = ["_1", "_2", "_3", "_4", "_5", "_6", "_7", "_8", "_9", "_10", "_11", "_12", "_13", "_14", "_15", "_16", "_17", "_18", "_19", "_20", "_21", "_22", "_23", "_24"],




      playPreviousTrackButton = $("#play-previous"),
      playNextTrackButton = $("#play-next"),
      currIndex = -1;


    function playPause() {
      setTimeout(function() {
        if (audio.paused) {
          playerTrack.addClass("active");
          albumArt.addClass("active");
          checkBuffering();
          i.attr("class", "fas fa-pause");
          audio.play();
          if('<?=$video_details['data']['title']?>'){
          <?php matomo_hit('Audio', 'Play', $video_details['data']['title']); ?>
          }
        } else {
          playerTrack.removeClass("active");
          albumArt.removeClass("active");
          clearInterval(buffInterval);
          albumArt.removeClass("buffering");
          i.attr("class", "fas fa-play");
          audio.pause();
          if('<?=$video_details['data']['title']?>'){
          <?php matomo_hit('Audio', 'Pause', $video_details['data']['title']); ?>
          }
        }
      }, 300);
    }

    function showHover(event) {
      seekBarPos = sArea.offset();
      seekT = event.clientX - seekBarPos.left;
      seekLoc = audio.duration * (seekT / sArea.outerWidth());

      sHover.width(seekT);

      cM = seekLoc / 60;

      ctMinutes = Math.floor(cM);
      ctSeconds = Math.floor(seekLoc - ctMinutes * 60);

      if (ctMinutes < 0 || ctSeconds < 0) return;

      if (ctMinutes < 0 || ctSeconds < 0) return;

      if (ctMinutes < 10) ctMinutes = "0" + ctMinutes;
      if (ctSeconds < 10) ctSeconds = "0" + ctSeconds;

      if (isNaN(ctMinutes) || isNaN(ctSeconds)) insTime.text("--:--");
      else insTime.text(ctMinutes + ":" + ctSeconds);

      insTime.css({
        left: seekT,
        "margin-left": "-21px"
      }).fadeIn(0);
    }

    function hideHover() {
      sHover.width(0);
      insTime.text("00:00").css({
        left: "0px",
        "margin-left": "0px"
      }).fadeOut(0);
    }

    function playFromClickedPos() {
      audio.currentTime = seekLoc;
      seekBar.width(seekT);
      hideHover();
    }

    function updateCurrTime() {
      nTime = new Date();
      nTime = nTime.getTime();

      if (!tFlag) {
        tFlag = true;
        trackTime.addClass("active");
      }

      curMinutes = Math.floor(audio.currentTime / 60);
      curSeconds = Math.floor(audio.currentTime - curMinutes * 60);

      durMinutes = Math.floor(audio.duration / 60);
      durSeconds = Math.floor(audio.duration - durMinutes * 60);

      playProgress = (audio.currentTime / audio.duration) * 100;

      if (curMinutes < 10) curMinutes = "0" + curMinutes;
      if (curSeconds < 10) curSeconds = "0" + curSeconds;

      if (durMinutes < 10) durMinutes = "0" + durMinutes;
      if (durSeconds < 10) durSeconds = "0" + durSeconds;

      if (isNaN(curMinutes) || isNaN(curSeconds)) tProgress.text("00:00");
      else tProgress.text(curMinutes + ":" + curSeconds);

      if (isNaN(durMinutes) || isNaN(durSeconds)) tTime.text("00:00");
      else tTime.text(durMinutes + ":" + durSeconds);

      if (
        isNaN(curMinutes) ||
        isNaN(curSeconds) ||
        isNaN(durMinutes) ||
        isNaN(durSeconds)
      )
        trackTime.removeClass("active");
      else trackTime.addClass("active");

      seekBar.width(playProgress + "%");

      if (playProgress == 100) {
        i.attr("class", "fa fa-play");
        seekBar.width(0);
        tProgress.text("00:00");
        albumArt.removeClass("buffering").removeClass("active");
        clearInterval(buffInterval);
      }
    }

    function checkBuffering() {
      clearInterval(buffInterval);
      buffInterval = setInterval(function() {
        if (nTime == 0 || bTime - nTime > 1000) albumArt.addClass("buffering");
        else albumArt.removeClass("buffering");

        bTime = new Date();
        bTime = bTime.getTime();
      }, 100);
    }

    function selectTrack(flag) {
      if (flag == 0 || flag == 1) {
        currIndex += flag;
      } else {
        currIndex = flag;
      }

      if (currIndex < 0) {
        currIndex = trackTitles.length - 1;
      } else if (currIndex >= trackTitles.length) {
        currIndex = 0;
      }

      if (flag == 0) {
        i.attr("class", "fa fa-play");
      } else {
        albumArt.removeClass("buffering");
        i.attr("class", "fa fa-pause");
      }

      seekBar.width(0);
      trackTime.removeClass("active");
      tProgress.text("00:00");
      tTime.text("00:00");

      currAlbum = trackTitles[currIndex];
      currTrackName = trackNames[currIndex];
      currArtwork = albumArtworks[currIndex];

      audio.src = trackUrl[currIndex];

      nTime = 0;
      bTime = new Date();
      bTime = bTime.getTime();

      if (flag != 0) {
        audio.play();
        playerTrack.addClass("active");
        albumArt.addClass("active");

        clearInterval(buffInterval);
        checkBuffering();
      }

      albumName.text(currAlbum);
      trackName.text(currTrackName);
      albumArt.find("img.active").removeClass("active");
      $("#" + currArtwork).addClass("active");

      bgArtworkUrl = $("#" + currArtwork).attr("src");

      bgArtwork.css({
        "background-image": "url(" + bgArtworkUrl + ")"
      });
    }


    function initPlayer() {
      audio = new Audio();

      selectTrack(0);

      audio.loop = false;

      playPauseButton.on("click", playPause);

      sArea.mousemove(function(event) {
        showHover(event);
      });

      sArea.mouseout(hideHover);

      sArea.on("click", playFromClickedPos);

      $(audio).on("timeupdate", updateCurrTime);

      playPreviousTrackButton.on("click", function() {
        selectTrack(-1);
      });
      playNextTrackButton.on("click", function() {
        selectTrack(1);
      });
    }

    initPlayer();
  });
</script>