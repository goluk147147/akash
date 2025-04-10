<style type="text/css">
  /* == Player watermark Please don't romeve css ==; */
  .vjs-quality-button.vjs-menu-button.vjs-menu-button-popup.vjs-control.vjs-button {
    opacity: 1 !important;
    display: block !important;
    overflow: visible !important;
  }


  .music-card {
    z-index: 0 !important;
  }

  .vjs-loading-spinner {
    display: none;
    visibility: visible;
    z-index: 99999999999;
    margin-top: -33%
  }

  .positionRelative {
    position: absolute !important;
    width: fit-content;
    right: 0;
    margin-top: -3px;
    cursor: pointer;
  }

  .qualitymenu {
    right: 0;
    top: -170px !important;

  }

  .video-js.vjs-paused:not(.vjs-has-started) .vjs-loading-spinner,
  .video-js.vjs-paused:not(.vjs-has-started) .vjs-loading-spinner {
    z-index: 99999999999;
    -webkit-animation: vjs-spinner-spin 1.1s cubic-bezier(0.6, 0.2, 0, 0.8) infinite, vjs-spinner-fade 1.1s linear infinite;
    animation: vjs-spinner-spin 1.1s cubic-bezier(0.6, 0.2, 0, 0.8) infinite, vjs-spinner-fade 1.1s linear infinite;
  }

  button.vjs-quality-button.vjs-icon-hd.vjs-icon-placeholder.vjs-menu-button.vjs-menu-button-popup.vjs-button {
    opacity: 1 !important;
    display: block !important;
    overflow: visible !important;
  }

  .vjs-button>.vjs-icon-placeholder:before {
    font-size: 1.8em;
    line-height: 1.67;
    color: red;
    filter: invert(0);
  }

 
  .ad_setting_pb {
    opacity: 0;
  }

  

  .drm-audio-new-wrpaer button.vjs-fullscreen-control.vjs-control.vjs-button {
    display: none;
  }

  .vjs-icon-circle:before,
  .video-js .vjs-play-progress:before,
  .video-js .vjs-volume-level:before {
    color: var(--pbc) !important;
  }

  .drm-audio-new-wrpaer .vjs-current-time.vjs-time-control.vjs-control {
    display: none;
  }

  .drm-audio-new-wrpaer .vjs-duration.vjs-time-control.vjs-control {
    display: none;
  }

  span.vjs-icon-placeholder {
    display: none;
  }

  .vjs-time-control.vjs-time-divider {
    display: none;
  }

  .vjs-menu-button-popup .vjs-menu {
    top: 0 !important;
    padding: 0;
  }

  .vjs-menu-button-popup .vjs-menu {
    width: 0 !important;
  }

  .vjs-menu-button-popup .vjs-menu .vjs-menu-content {
    bottom: -3em !important;
    right: -39px !important;
    left: inherit !important;
  }

  .section {
    overflow-y: auto !important;
  }

  /* ------------------------Episode Css Start 01-03-2024 -------------------- */

  .play_epsode_btn span img {
    width: 40px !important;
    height: 40px !important;
  }

  .share_btn_icon {
    font-size: 18px;
    background: #2b2b2b;
    padding: 0px 12px;
    border-radius: 5px;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .nav-audio-list {
    align-items: center;
    font-size: 18px;
  }

  .pb_vd_card .pb_card_content {
    height: 25% !important;
  }

  .pb_episode_cont {
    position: relative;
    margin-top: -270 px;
    z-index: 999;
  }

  .bg_btn_color {
    color: var(--pbc) !important;
  }

  .episodeOne {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    font-size: 18px;
    font-weight: 500;
    overflow: hidden;
    line-height: 24px;
  }

  .pb_episode_cont {
    position: relative;
    margin-top: -230px;
  }

  @media only screen and (min-width: 320px) and (max-width: 767px) {
    .play_epsode_btn span img {
      width: 32px !important;
      height: 32px !important;
    }

    .vjs-icon-hd:before {
      width: 22px !important;
      height: 22px !important;
      top: 2px !important;
      display: inline-block;
    }

    .drm-audio-new-wrpaer .vjs-quality-button.vjs-menu-button.vjs-menu-button-popup.vjs-control.vjs-button {
      margin-left: 93%;
      z-index: 9999999999999;
      right: 18px !important;
      top: 109px !important;
    }

    .vjs-icon-cog:before {
      width: 22px !important;
      height: 22px !important;
      top: 5px !important;
      display: inline-block;
    }

    .pb_episode_cont {
      position: relative;
      margin-top: 00px;
    }

    .episodeOne {
      font-size: 15px;
    }

    .share_btn_icon {
      font-size: 16px;
      padding: 0px 12px;
    }

  }

  @media only screen and (min-width: 768px) and (max-width: 1024px) {
    .pb_episode_cont {
      position: relative;
      margin-top: -90px;
    }
  }

  @media only screen and (min-width: 1801px) and (max-width: 2050px) {
    .play_epsode_btn span img {
      width: 54px !important;
      height: 54px !important;
    }

    .share_btn_icon {
      font-size: 24px;
      background: #2b2b2b;
      padding: 0px 17px;
    }

    .music-card {
      max-width: 650px !important;
      width: 100%;
    }

    .music-card__content {
      width: 650px !important;
      height: auto;
    }

    .music-div {
      position: relative;
      width: 100%;
      height: 366px !important;
    }
  }
  

  @media only screen and (min-width: 1801px) and (max-width: 2400px) {
    .play_epsode_btn span img {
      width: 54px !important;
      height: 54px !important;
    }

    .share_btn_icon {
      font-size: 24px;
      background: #2b2b2b;
      padding: 0px 17px;
    }
   
    .music-card {
      max-width: 650px !important;
      width: 100%;
    }

    .music-card__content {
      width: 650px !important;
      height: auto;
    }

    .music-div {
      position: relative;
      width: 100%;
      height: 366px !important;
    }
  }

  @media only screen and (min-width: 2101px) and (max-width: 2400px) {
    .play_epsode_btn span img {
      width: 54px !important;
      height: 54px !important;
    }

    .share_btn_icon {
      font-size: 24px;
      background: #2b2b2b;
      padding: 0px 17px;
    }
  }

  @media only screen and (min-width: 2401px) {
    .play_epsode_btn span img {
      width: 54px !important;
      height: 54px !important;
    }

    .music-card {
      max-width: 650px !important;
      width: 100%;
    }

    .music-card__content {
      width: 650px !important;
      height: auto;
    }

    .music-div {
      position: relative;
      width: 100%;
      height: 366px !important;
    }

    .share_btn_icon {
      font-size: 24px;
      background: #2b2b2b;
      padding: 0px 17px;
      border-radius: 5px;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  }

  .player_img {
    display: flex;
    justify-content: center;
    margin-top: 100px;
  }
</style>
<style>
  .music-card__wrapper {
    display: flex;
    align-items: center;
    height: 100%;
  }

  .music-div {
    position: relative;
    width: 100%;
    height: 300px;
  }

  .music-div .music-image {
    width: 100%;
    height: auto !important;
    border-radius: 5px;
    /* margin: auto !important; */
    max-height: 100%;
  }

  .audio-nav {
    position: relative;
    z-index: 11;
  }

  .nav-audio-list {
    border: none !important;
    background: none !important;

  }

  .section {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100vh;
  }

  .section__background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    opacity: 0.5;
    backdrop-filter: blur(25px);
  }

  .section__background:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    backdrop-filter: blur(30px);
    z-index: 11;
  }

  .section__background-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .music-card {
    margin: 1rem auto;
    position: relative;
    max-width: 436px;
    width: 100%;
    height: auto;
    /* border-radius: 25px; */
    transform-style: preserve-3d;
    transition: all .2s linear;
    z-index: 2;
  }

  .music-card.right-weight {
    transform: rotateY(4deg) rotateX(-5deg);
  }

  .music-card.left-weight {
    transform: rotateY(-4deg) rotateX(-5deg);
  }

  .music-card__wrapper {
    position: relative;
    z-index: 1;
  }

  .music-card__content {

    width: 435px;

    height: auto;
  }

  .music-card:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    z-index: -1;
  }

  .music-image {
    position: relative;
    width: 100%;
aspect-ratio: 16/9;
    object-fit: contain;
    filter: drop-shadow(-20px 10px 10px rgba(0, 0, 0, 0.25)) !important;
  }

  .music-info {
    padding-inline: 20px;
  }

  .music-name {
    font-size: 1.4em;
    color: rgba(255, 255, 255, .8);
    margin-bottom: 4px;
    line-height: 1;
  }

  .music-artist {
    font-size: 1em;
    color: rgba(255, 255, 255, .5);
  }

  .music-controls {
    display: flex;
    justify-content: space-between;
    padding-top: 25px;
  }

  .music-controls-item {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    padding: 6px;
    border-radius: 50%;
    cursor: pointer;
    transition: ease-in-out .2s;
  }

  .play-icon-background {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: #4845F6;
    z-index: -1;
    opacity: 0;
    pointer-events: none;
    filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, .25));
    transition: all .2s;
  }

  #seek-prev img {
    width: 30px;
    height: 30px;
  }

  #prev img {
    width: 25px;
    height: 25px;
  }

  #seek-next img {
    width: 30px;
    height: 30px;
  }

  #play img {
    width: auto;
    height: 60px;
  }

  #next img {
    width: 25px;
    height: 25px;
  }

  .music-controls-item#play .play-icon {
    filter: drop-shadow(2px 4px 6px rgba(0, 0, 0, .3));
    transition: all .2s;
  }

  .music-controls-item#play:hover .play-icon-background {
    animation-name: playIconBackgroundAnimate;
    animation-duration: .3s;
    animation-iteration-count: 1;
    opacity: 1;
  }

  .music-controls-item#play:hover .play-icon {
    animation-name: playIconAnimate;
    animation-duration: .3s;
    animation-iteration-count: 1;
  }

  .music-controls-item--icon {
    font-size: 1.2em;
    color: #fff;
  }

  .music-progress {
    position: relative;
    width: calc(100% - 0px);
    margin-top: 16px;
    margin-bottom: 10px !important;
    opacity: 0 !important;

  }


  .music-progress-bar {
    position: relative;
    width: 100%;
    height: 5px;
    border-radius: 5px;
    background-color: #4845F6;
    cursor: pointer;
    opacity: 0 !important;
  }

  .music-progress-bar {
    /* border: solid 2px #82CFD0; */
    background: linear-gradient(to right, rgb(72, 69, 246) 0%, rgb(72, 69, 246) 0%, rgb(255, 255, 255) 0%, white 100%);
    background: -webkit-linear-gradient(to right, rgb(72, 69, 246) 0%, rgb(72, 69, 246) 0%, rgb(255, 255, 255) 0%, white 100%);

    border-radius: 8px;
    height: 6px;
    width: 100%;
    outline: none;
    transition: background 450ms ease-in;
    -webkit-appearance: none;
  }

  .music-progress-bar::-webkit-slider-thumb {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    -webkit-appearance: none;
    cursor: pointer;
    background: #4845F6;
  }

  .music-progress-bar::-moz-range-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    background: #4845F6;

    border: none;
    border-radius: 50%;
  }


  .music-progress-bar:after {
    /* content: ''; */
    position: absolute;
    right: -6px;
    top: 50%;
    transform: translateY(-50%);
    width: 12px;
    height: 12px;
    background: #4845F6;
    filter: drop-shadow(0px 0px 4px rgba(46, 45, 45, 1));
    border-radius: 50%;
    box-sizing: border-box;
  }

  .music-progress:before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    height: 5px;
    background: rgba(255, 255, 255, .3);
    border-radius: 5px;
    z-index: -1;
  }

  .music-progress__time {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .music-progress__time-item {
    color: #fff;
    font-size: 12px;
    opacity: .4;
  }

  .pb-audio_pl {
    position: absolute;
    top: 50%;
    left: 50%;
    background: rgba(0, 0, 0, 0.7);
    content: "";
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    font-size: 16px !important;
    color: var(--white);
  }

  .pb_audio_txt {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
  }

  @keyframes coverAnimate {
    0% {
      transform: scale(1);
    }

    50% {
      transform: scale(0.98);
    }

    100% {
      transform: scale(1);
    }
  }

  @-webkit-keyframes coverAnimate {
    0% {
      transform: scale(1);
    }

    50% {
      transform: scale(0.98);
    }

    100% {
      transform: scale(1);
    }
  }

  @keyframes playIconAnimate {
    0% {
      transform: scale(1);
    }

    20% {
      transform: scale(1);
    }

    85% {
      transform: scale(1.2);
    }

    100% {
      transform: scale(1);
    }
  }

  @keyframes playIconBackgroundAnimate {
    0% {
      opacity: 1;
      transform: scale(0.7);
      filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, .1));
    }

    65% {
      transform: scale(1.1);
      filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, .25));
    }

    85% {
      transform: scale(1);
      filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, .18));
      opacity: 1;
    }

    100% {
      transform: scale(1);
      filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, .18));
      opacity: 1;
    }
  }

  @media screen and (max-width: 480px) {
    .music-image {
      width: 100%;
      max-width: calc(100% - 0px);
      /* margin: 20px; */
      left: unset;
      top: unset;
      height: auto;
      /* border-radius: 12px; */
      filter: drop-shadow(0px 10px 10px rgba(0, 0, 0, 0.20));
    }

    .music-card {
      width: 100%;
      max-width: calc(100% - 20px);
      margin-inline: auto;
    }

    .music-div .music-image {
      border-radius: 5px;
      height: auto !important;

      /* max-height: 100%; */
    }

    .music-card__content {
      padding-bottom: 20px;
      width: 100% !important;
      height: auto;
    }

  }

  @media only screen and (min-width: 320px) and (max-width: 767px) {
    .section {
      height: 100vh;
      overflow: auto;
    }

    .music-image {
      width: 100%;
      max-width: calc(100% - 0px);
      /* margin: 20px; */
      left: unset;
      top: unset;
      height: auto;
      /* border-radius: 12px; */
      filter: drop-shadow(0px 10px 10px rgba(0, 0, 0, 0.20));
    }

    .music-card {
      width: 100%;
      max-width: calc(100% - 20px);
      margin-inline: auto;
    }

    .music-div .music-image {
      border-radius: 5px;
      height: auto !important;
      

      /* max-height: 100%; */
    }

    .music-card__content {
      padding-bottom: 20px;
      width: 100% !important;
      height: auto;
    }

    .audio-nav {
      top: 0;
      padding: 0 !important;
    }

    .music-card__wrapper {
      height: 100vh;
    }

    .section__background {
      height: 100vh;
    }
  }

  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .vjs-loading-spinner {
      margin-top: -35% !important;
    }
  }

  @media only screen and (min-width: 320px) and (max-width: 450px) {
    .vjs-loading-spinner {
      margin-top: -121px !important;
    }
  }

  .vjs-icon-cog {
    font-family: VideoJS;
    font-weight: normal;
    font-style: initial;
    display: flex;
    justify-content: end;
    margin-top: -41px;
  }

  .disable_icon {
    pointer-events: none;
    opacity: 0.4;
  }

  .ad_seeting {
    display: none;
    border: 1px solid #474747;
  }

  .ad_setting_pb:hover .ad_seeting {
    display: block;
    position: absolute;
    bottom: 40px;
    background: rgba(55, 55, 55, 0.83);
    min-width: 14em;
    border-radius: 5px;
    right: 0;
    z-index: 9999999 !important;
  }

  .ad_seeting ul {
    list-style: none;
    margin: 0;
    padding-left: 0;
  }

  .ad_seeting ul li {
    list-style: none;
    padding: 10px !important;
    font-size: 14px;
  }

  .audioSection {
    display: none;
    position: absolute !important;
    z-index: 999;
    width: 100%;
  }

  .positionRelative {
    position: relative;
  }


  .qualitymenu {

    right: 0;
    top: -71px;

    background: rgba(55, 55, 55, 0.83) !important;
    position: absolute;
    width: 13em !important;
    max-height: 25em;
    border-radius: 4px;
    border: 1px solid #474747;
    z-index: 99999999;
    display: none;
  }

  .positionRelative:hover .qualitymenu {
    display: block
  }


  .qualitymenu .vjs-menu-item.selected {
    background-color: #202020;
    color: #625df5;
  }

  .qualitymenu .vjs-menu-item {
    padding: 10px;
    cursor: pointer;
  }

  .vjs-control-bar {
    display: block !important;
  }



  .music-controls-item .ad_setting_pb {
    opacity: 1 !important;
  }

  .add-hove:hover .ad_seeting {
    display: block !important;
    position: absolute;
    bottom: 40px;
    background: rgba(55, 55, 55, 0.83);
    width: 14em;
    border-radius: 5px;
    z-index: 9999999 !important;
    right: 0;
  }

  #video{
 display:none !important;
  }
  .shaka-range-container {
  position: relative;
  top: 33px !important;
  left: 0;
  margin: calc((12px - 4px)/ 2) 1px !important;
  height: 4px;
  border-radius: 4px;
  background: #fff;
}
.shaka-bottom-controls{
  width:100% !important;
}
#shaka-player-ui-thumbnail-container{
  display:none !important;
  opacity:0 !important;
}
#shaka-player-ui-time-container{
  display:none !important;
}
.clickable-btn{
    background:var(--pbg) !important;
  }
   .lineragradienttop{
    background:inherit !important;
  }
  /* .shaka-settings-menu.shaka-hidden.shaka-resolutions{
    display:block !important;
  } */
   .shaka-overflow-button.shaka-resolution-button{
   display: block !important;
    position: absolute !important;
    bottom:-120px !important;
    right: 6px;
   }
   .shaka-settings-menu i{
    opacity:0 !important;
    position:relative;
   }
   .shaka-settings-menu button[aria-selected="true"]:not(:first-child)::after {
    background: var(--pbg) !important;
    content: '';
    border: none !important;
    display:none !important;
}
.shaka-settings-menu button:not(:first-child)::after{
  display:none !important;
}
.shaka-back-to-overflow-button i{
  display: none !important;
}
 #my-audio-div .shaka-settings-menu button[aria-selected="true"] {
    background-color: #202020;
    font-weight: 600;
    color: var(--pbc) !important;
}
 #my-audio-div .shaka-settings-menu {
    bottom: -70px !important;
    right: 3px !important;
}
@media only screen and (min-width: 320px)  and (max-width:767px){
   
    .shaka-overflow-button.shaka-resolution-button {
    display: block !important;
    position: absolute !important;
    bottom: -118px !important;
    right: 2px;
}
.shaka-back-to-overflow-button span{
  font-size:18px !important;
}
}
@media only screen and (min-width: 1801px) {
    .shaka-overflow-button.shaka-resolution-button i{
        font-size:28px !important;
    }
    .shaka-overflow-button.shaka-resolution-button {
    display: block !important;
    position: absolute !important;
    bottom: -118px !important;
    right: 6px;
}
.shaka-back-to-overflow-button span{
  font-size:18px !important;
}
}
@media only screen and (min-width: 2401px) {
    .shaka-overflow-button.shaka-resolution-button i{
        font-size:24px !important;
    }
    .shaka-overflow-button.shaka-resolution-button {
    display: block !important;
    position: absolute !important;
    bottom: -117px !important;
    right: 6px;
}
.shaka-back-to-overflow-button span{
  font-size:18px !important;
}
}
#my-audio-div .shaka-ad-controls{
    padding-bottom: 1% !important;
}
#my-audio-div .shaka-bottom-controls {
padding-bottom: 2.5% !important;
}
#my-audio-div .shaka-back-to-overflow-button{
  display:none !important;
}
.shaka-controls-button-panel {
    opacity: 1 !important;
}
</style>


<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->

</head>
<body>
  <?php if (isset($video_details['data']) && !empty($video_details['data'])) { ?>
    <?php
    $current_vid = $video_details['data']['id'] ?? null;
    $next_vid = array(
      'id' => 0,
      'similar' => 0,
      'title' => '',
      'poster_url' => '',
      'description' => '',
    );
    $prev_vid = array(
      'id' => 0,
      'similar' => 0,
      'title' => '',
      'poster_url' => '',
      'description' => '',
    );
    ?>
    <?php
    if (isset($content_details['data']['season'])) {
      foreach ($content_details['data']['season'] as $key => $value) {
        foreach ($value['videos'] as $mkey => $mvalue) {
          if ($mvalue['id'] == $current_vid) {
            $next_vid = array(
              'id' => $content_details['data']['season'][$key]['videos'][$mkey + 1]['id'] ?? 0,
              'similar' => 0,
              'title' => $content_details['data']['season'][$key]['videos'][$mkey + 1]['title'] ?? '',
              'poster_url' => $content_details['data']['season'][$key]['videos'][$mkey + 1]['poster_url'] ?? '',
              'description' => $content_details['data']['season'][$key]['videos'][$mkey + 1]['description'] ?? ''
            );
            $prev_vid = array(
              'id' => $content_details['data']['season'][$key]['videos'][$mkey - 1]['id'] ?? 0
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
            if ($prev_vid['id'] == 0 && isset($content_details['data']['season'][$key - 1]['videos'])) {
                $videos = $content_details['data']['season'][$key - 1]['videos'];
                $prev_vid = array(
                    'id' => $videos ? end($videos)['id'] ?? 0 : 0
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
    }
    $video_id = $video_details['data']['id'] ?? 0;
    ?>


    <section class="pb-audio-player">

      <div class="conatiner-fluid">
        <div class="row">
          <div class="col-lg-11 mx-auto col-12">
          </div>
        </div>
      </div>

      <div class="section" id="my-audio_pb">

        <div class=" section__background">

          <img id="backgroundImage" class="section__background-image" src="<?= $video_details['data']['poster_url'] ?>" alt="banner image">
        </div>

        <nav class="audio-nav py-0 back-buttontt">
          <a onclick="history.go(-1)" class="d-flex nav-audio-list text-decoration-none list-group-item d-block text-white">
            <!-- <a onclick="history.go(-1)" class="d-flex nav-audio-list back-button text-decoration-none list-group-item d-block text-white"> -->
            <i class="fa fa-chevron-left text-white"></i>
            <span class="ms-4 text-white"><b><?= $video_details['data']['title'] ?></b></span>
          </a>
        </nav>
        <div class="music-card__wrapper">
          <div class="music-card">
            <div class="music-card__content">
              <div class="music-div">
                <img class="music-image" src="<?= $video_details['data']['poster_url'] ?>" alt="poster url">
                <p class=" audio_bott_dt mb-0">&nbsp;</p>
                <div class="audioLoder ">
                  <div class="loading"></div>
                </div>
              </div>
              <div class="music-info">
                <h2 class="music-name"></h2>
                <p class="music-artist"></p>
              </div>

              <!-- season number or episode number  -->
<?php
   $video_id = $video_details['data']['id'] ?? 0;
   $season_check = ''; 
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
    $title_audio = ($video_details['data']['id']??'')."/".($content_details['data']['title'] .'-'. $video_details['data']['title']);
  }else{
    $title_audio = ($video_details['data']['id']??'')."/".$content_details['data']['title'].'- S'. $seasonNo." E". $episodeNO." ".$video_details['data']['title'];
  }
?>
               <!-- End code -->

              <div class=" drm-audio-new-wrpaer" id="my-audio-div">
              <div id="video-container">
                <audio data-matomo-title="<?= $title_audio?>" disablePictureInPicture title="<?= $title_audio ?>"
                  id="video"
                  poster=""
                  autoplay
                  class="h-100">
                </audio>
              </div>
              </div>
              <div class="music-progress">
                <input type="range" min="0" max="100" step=".5" id="progress-bar" class="music-progress-bar" value="0" style="opacity:0;" />

              </div>
              <div class="music-progress__time">
                <span class="music-progress__time-item music-current-time">00:00</span>
                <span class="music-progress__time-item music-duration-time">00:00</span>
              </div>

              <div class="music-controls">
                <div id="prev" class="music-controls-item ">
                  <img src="<?= base_url('assets/website_assets/css/video_player_icons/vlolume_h.svg') ?>" alt="language" class="">
                </div>
                <div id="seek-prev" data-id='<?= $prev_vid['id'] ?>' class="music-controls-item <?= ($prev_vid['id'] == 0) ? 'disable_icon' : '' ?>">
                  <a href="<?= base_url('play-media?id=') . aes_cbc_encryption_($prev_vid['id']) . '&type=' . aes_cbc_encryption_('prev') ?>">
                    <img src="<?= base_url('assets/images/previous_icon.svg') ?>" alt="Previous">
                  </a>
                  <!-- <img src="<? //= base_url('assets/images/backword_icon.svg') 
                                  ?>" alt="prev svg"> -->
                </div>

                <div id="play" class="music-controls-item">
                  <img src="<?= base_url('assets/images/play_icon.svg') ?>" alt="play svg">
                  <div class="play-icon-background"></div>
                </div>
                <div id="seek-next" data-id='<?= $next_vid['id'] ?>' class="music-controls-item <?= ($next_vid['id'] == 0) ? 'disable_icon' : '' ?>">
                  <a href="<?= base_url((($next_vid['similar'] != 1) ? 'play-media?id=' : 'play-episode?id=')) . aes_cbc_encryption_($next_vid['id']) . '&type=' . aes_cbc_encryption_('next') ?>">
                    <img src="<?= base_url('assets/images/next_icon.svg') ?>" alt="forward svg">
                  </a>
                </div>

                <div id="next" class="music-controls-item ad_setting_pb <?= ($video_details['data']['is_drm_protected'] == 2) ? 'disable_icon' : ''; ?>">
                  <img src="<?= base_url('assets/images/seeting-ad.svg') ?>" alt="setting svg" class="d-none">
                  <div class="ad_seeting">
                    <!-- <ul>
                      <li class="textQuality disable_icon" disab>Quality</li>
                      <?php foreach ($bandwidth as $key => $value) { ?>
                        <li data-url="<?= $value ?>" class="ch_bit"><?= floor($key / 1000) . ' kbps' ?></li>
                      <?php } ?>
                    </ul> -->
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>


        <!-- -Section Audio Player -->

        <div class="audioSection audio_pip_icons" id="audio_pip">
          <div class="audioImg">
            <img class="music-image_pip" src="<?= $video_details['data']['poster_url'] ?>" alt="poster image">
            <p class="mb-0 audiopip_hov"></p>
            <div class="audioClose">
              <span class="hide_pip" onclick="$('.audioSection').hide()" style="cursor: pointer;">&times;</span>
            </div>

            <div class="backToaudio hide_pip" onclick="$('.audioSection').hide()">
              <p class="m-0">Back to tab</p>
              <img class="img-fluid " src="<?= base_url('assets/images/backToTab.svg') ?>" alt="back to tab" style="cursor: pointer;">
            </div>
            <div class="subAudio" onclick="isPlaying ? pauseMusic() : playMusic();">
              <img class="img-fluid" src="<?= base_url('assets/images/play_icon.svg') ?>" style="cursor: pointer;" alt="play image">
            </div>
          </div>

        </div>

    </section>
    <?php
    $guest_user = ($this->session->id) ? 'Audio' : 'GuestUserAudio';
    $genres = $content_details['data']['genres']??'-';
    ?>
<script>
      queueTrackingData('trackEvent', ["Page", "View","Podcast"]);

</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/controls.min.css"/>
<!-- <script src="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/shaka-player.compiled.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/shaka-player.ui.js"></script>

<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/shaka_ui.js') ?>"></script>
<script src="<?php echo base_url('assets/website_assets/js/sweetalert2@8.js'); ?>"></script>

<script>
  var times = '';
  var adParams = <?= $adParams??'' ?>;
  var adEnabled = "<?= $adEnabled??false ?>";
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
  <?php $time = ($video_details['data']['free_episode'] == 1) ? 86400 : $video_details['data']['free_time'] ?>
  let session = "<?= $this->session->id ?>";
  let is_free = "<?= $video_details['data']['is_free'] ?>";
  let free_time = "<?= $time ?>";
  dragElement(document.getElementById("audio_pip"));

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

  function changeSpanName(oldName, newName){
    var spans = document.querySelectorAll('span');
    spans.forEach(span => {
        if (span.innerHTML.trim() === oldName) {
            span.innerHTML = newName;
        }
    });
  }

  function dragElement(elmnt) {
    var pos1 = 0,
      pos2 = 0,
      pos3 = 0,
      pos4 = 0;
    if (document.getElementById(elmnt.id)) {
      /* if present, the header is where you move the DIV from:*/
      document.getElementById(elmnt.id).onmousedown = dragMouseDown;
    } else {
      /* otherwise, move the DIV from anywhere inside the DIV:*/
      elmnt.onmousedown = dragMouseDown;
    }

    function dragMouseDown(e) {
      e = e || window.event;
      e.preventDefault();
      // get the mouse cursor position at startup:
      pos3 = e.clientX;
      pos4 = e.clientY;
      document.onmouseup = closeDragElement;
      // call a function whenever the cursor moves:
      document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
      e = e || window.event;
      e.preventDefault();
      // calculate the new cursor position:
      pos1 = pos3 - e.clientX;
      pos2 = pos4 - e.clientY;
      pos3 = e.clientX;
      pos4 = e.clientY;
      // set the element's new position:
      elmnt.style.top = elmnt.offsetTop - pos2 + "px";
      elmnt.style.left = elmnt.offsetLeft - pos1 + "px";
    }

    function closeDragElement() {
      /* stop moving when mouse button is released:*/
      document.onmouseup = null;
      document.onmousemove = null;
    }
  }
</script>

<script>
  var ptype = '(TVOD)';
  var ispaid = "<?=$video_details['data']['is_paid']?>";
  if (ispaid == 0 ) {
  ptype = '(VOD)';
  }else if(ispaid == 1){
  ptype = '(SVOD)';
  }
  var Etitle =  '<?= $video_details['data']['id'] ?>' + '/' + "<?= $video_details['data']['title'] ?>" + '-' + "<?= $content_details['data']['title'] ?>" + ptype +   times;
  var Ititle = '<?= $video_details['data']['id'] ?>' + '/' + "<?= $video_details['data']['title'] ?>" + '-' + "<?= $content_details['data']['title'] ?>";
  var types =  "<?= $guest_user ?>";
  $('.back-buttontt').click(function(e) {
    e.preventDefault();
    if ("<?= $video_details['data']['title'] ?>") {
      ManagePlayerEvent(types,Etitle,Ititle,'Stop');

      }     // window.location.href = "<?= base_url("pb_live?type=radio"); ?>";
  });
 </script>

<script>
  let addclass = true;
  $(document).ready(function() {
    $('.ad_seeting ul li').click(function() {
      $('.audioLoder').css('display', 'flex');
      $('.ad_seeting ul li').removeClass('selected_ad');
      $(this).addClass('selected_ad');
      addclass = false;
    });

    video.muted = true;
    changeIcon();
    playMusic();

    $('#prev').on('click', function() {
      if (video.muted) {
        video.muted = false;
      } else {
        video.muted = true;
      }
      changeIcon();
    });
  });

  function changeIcon() {
    var Vicon = "<?php echo base_url('assets/website_assets/css/video_player_icons/vlolume_h.svg'); ?>";
    var Micon = "<?php echo base_url('assets/website_assets/css/video_player_icons/mute1.svg'); ?>";
    if (video.muted) {
      $('#prev img').attr('src', Micon);
    } else {
      $('#prev img').attr('src', Vicon);
    }
    if(video.paused){
      imgElement.src = "<?= base_url('assets/images/play_icon.svg') ?>";
      pipimgElement.src = "<?= base_url('assets/images/play_icon.svg') ?>";
      isPlaying = false;
    }else{
      imgElement.src = "<?= base_url('assets/images/pause_icon.svg') ?>";
      pipimgElement.src = "<?= base_url('assets/images/pause_icon.svg') ?>";
      isPlaying = true;
    }
  }

  const next = document.querySelector("#next");
  const play = document.querySelector("#play");
  const prev = document.querySelector("#prev");
  const progressBar = document.querySelector("#progress-bar");
  const musicCard = document.querySelector(".music-card");
  const musicCover = document.querySelector(".music-image");
  const musicCurrentTime = document.querySelector(".music-current-time");
  const musicDurationTime = document.querySelector(".music-duration-time");
  const backgroundImage = document.querySelector("#backgroundImage");
  const music = document.querySelector("#my_video");
  const progressZone = document.querySelector(".music-progress");
  const imgElement = play.querySelector("img");
  const pipimgElement = document.querySelector(".subAudio").querySelector("img");
  var player;
  let isPlaying = false;
  let isAddOnPlay = false;
  // default select first music
  let selectedMusic = 1;
  let url = "<?= $video_details['data']['file_url'] ?>";
  let type = "<?= $video_details['data']['is_drm_protected'] ?>";
  let token = "<?= $video_details['data']['token'] ?? null; ?>";
  var base_url = "<?= $baseurl ?>";

  play.addEventListener("click", () => {
    isPlaying ? pauseMusic() : playMusic();
  });

  $('.hide_pip').on('click', function() {
    $('.music-image').css('filter', 'blur(0px)');
  });

  $('.music-div').on('click', function() {
    isPlaying ? pauseMusic() : playMusic();
  });

  let spacePressed = false;
  $(document).on("keyup", function() {
    spacePressed = false;
  });

  $(document).on("keydown", async (e) => {
    switch (e.code) {
      case "Space":
      case "KeyK":
      case "Enter":
        e.preventDefault();
        if (!spacePressed) {
          spacePressed = true;
          isPlaying ? pauseMusic() : playMusic();
        }
        break;        
      case "KeyM":
        e.preventDefault();
        if (video.muted) {
          video.muted = false;
        } else {
          video.muted = true;
        }
        changeIcon();
        break;
    }
    if(isAddOnPlay){
      return false;
    }
    const playerVolume = video.volume;
    const playerCurrentTime = video.currentTime;
    switch (e.code) {        
      case "ArrowUp":
        e.preventDefault();
        video.muted = false;
        video.volume = (playerVolume + 0.1);
        // logVolume();
        break;
      case "ArrowDown":
        e.preventDefault();
        video.volume = (playerVolume - 0.1);
        // logVolume()
        break;
      case "ArrowRight":
        e.preventDefault();
        player.currentTime = (playerCurrentTime + 10);
        animateNotificationIn(false);
        break;
      case "ArrowLeft":
        e.preventDefault();
        player.currentTime = (playerCurrentTime - 10);
        animateNotificationIn(true);
        break;

      default:
        return;
    }
  });

  var isDragging = false;
  var time_update = true;
  $('.music-progress').on('mousedown', function(event) {
    isDragging = true;
  });

  $('.music-progress').on('mousemove', function(event) {
    if (isDragging) {
      var seekPosition = (event.offsetX / this.offsetWidth) * video.duration;
      var progressPercent = (seekPosition / video.duration) * 100;
      progressPercent = Math.round(progressPercent);
      progressBar.addEventListener('input', function() {
        const value = this.value;
        this.style.background = `linear-gradient(to right, #4845F6 0%, #4845F6 ${progressPercent}%, #fff ${progressPercent}%, white 100%)`
      })
    }
  });

  $('.music-progress').on('mouseup', function(event) {
    var seekPosition = (event.offsetX / this.offsetWidth) * video.duration;
    video.currentTime = seekPosition;
    isDragging = false;
  });

  var lastPlay = 0;
  const playMusic = () => {
    video.play().then(function() {
      //changeIcon();
    }).catch(function(error) {
      video.muted = false;
      pauseMusic();
    }).finally(function() {
      changeIcon(); // This will run whether play succeeded or failed
    });
    times = "/" + convertTimes(video.currentTime);
      if (lastPlay > 1) {

      var  similar_to = getQueryParam('similar') || 'NA';
      if(similar_to !='NA'){
        var search_jao = similar_to;
        _paq.push(['setCustomDimension', 4, similar_to ]);

      }else{
        var search_jao = '';
      }
      if ("<?= $video_details['data']['title'] ?>") {
        if("<?= $video_details['data']['is_paid']==0 ?>"){              
          matomo_sear("<?= $guest_user ?>", 'Resume', "<?= $title_audio.'(AOD)' ?>" , 5,search_jao);
        }else if("<?= $video_details['data']['is_paid']==1 ?>"){
          matomo_sear("<?= $guest_user ?>", 'Resume', "<?= $title_audio.'(SOD)' ?>" , 5,search_jao);
        }else{
          matomo_sear("<?= $guest_user ?>", 'Resume', "<?= $title_audio.'(TOD)' ?>" , 5,search_jao);
        }
      }

    } else {

      var  similar_to = getQueryParam('similar') || 'NA';
      if(similar_to !='NA'){
        var search_jao = similar_to;
      }else{
        var search_jao = '';
      }
      if ("<?= $video_details['data']['title'] ?>") {
        if("<?= $video_details['data']['is_paid']==0 ?>"){
          
          matomo_sear("<?= $guest_user ?>", 'Play', "<?= $title_audio.'(AOD)' ?>" , 5,search_jao);
        }else if("<?= $video_details['data']['is_paid']==1 ?>"){
          matomo_sear("<?= $guest_user ?>", 'Play', "<?= $title_audio.'(SOD)' ?>" , 5,search_jao);
        }else{
          matomo_sear("<?= $guest_user ?>", 'Play', "<?= $title_audio.'(TOD)' ?>" , 5,search_jao);
        }
      }

    }
    imgElement.src = "<?= base_url('assets/images/pause_icon.svg') ?>";
    pipimgElement.src = "<?= base_url('assets/images/pause_icon.svg') ?>";
    isPlaying = true;
    fadeInCover();
    musicCard.classList.add("middle-weight");
    setTimeout(() => {
      musicCard.classList.remove("middle-weight");
    }, 200);
  };

  const pauseMusic = () => { 
    video.pause();
    imgElement.src = "<?= base_url('assets/images/play_icon.svg') ?>";
    pipimgElement.src = "<?= base_url('assets/images/play_icon.svg') ?>";
    isPlaying = false;
    fadeInCover();
    musicCard.classList.add("middle-weight");
    setTimeout(() => {
      musicCard.classList.remove("middle-weight");
    }, 200);
    times = "/" + convertTimes(video.currentTime);
    if ("<?= $video_details['data']['title'] ?>") {
      var  similar_to = getQueryParam('similar') || 'NA';
      if(similar_to !='NA'){
        var search_jao = similar_to;
      }else{
        var search_jao = '';
      }
      if("<?= $video_details['data']['is_paid']==0 ?>"){
        
        matomo_sear("<?= $guest_user ?>", 'Pause', "<?= $title_audio.'(AOD)' ?>", 5,search_jao);
      }else if("<?= $video_details['data']['is_paid']==1 ?>"){
        matomo_sear("<?= $guest_user ?>", 'Pause', "<?= $title_audio.'(SOD)' ?>", 5,search_jao);
      }else{
        matomo_sear("<?= $guest_user ?>", 'Pause', "<?= $title_audio.'(TOD)' ?>", 5,search_jao);
      }
    }
  };

  const nextMusic = () => {
    // logic here
  };

  const prevMusic = () => {
    $('.music-image').css('filter', 'blur(3px)');
    $('.audioSection').show('slow');

  };

  function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
  }

  function matomo_sear(user, type, titles, geners = '',search_jao) {
    queueTrackingDataWithDelay('trackEvent', [user, type, titles],0);
    // var url = '<?= base_url("/web/Home/matomo_hit"); ?>';
    // $.ajax({
    //   url: url,
    //   type: "POST",
    //   dataType: "json",
    //   async: "true",
    //   data: {
    //     user: user,
    //     types: type, // Typo here, it should be type instead of types
    //     geners: geners,
    //     title: titles,
    //     search_jao :search_jao
        
    //   },
    //   success: function(data) {
    //   },
    //   error: function(xhr, status, error) {
    //     //  console.error("Error: " + error);
    //   }
    // });
  }

  const calcSongTime = (time, selectTime) => {
    time = Number(time);
    const m = Math.floor((time % 3600) / 60);
    const s = Math.floor((time % 3600) % 60);
    if (m < 10) {
      minute = "0" + m;
    } else {
      minute = m;
    }
    if (s < 10) {
      second = "0" + s;
    } else {
      second = s;
    }

    return (selectTime.textContent = `${minute}:${second}`);
  };

  const fadeInCover = () => {
    musicCover.classList.add("animate");
    setTimeout(() => {
      musicCover.classList.remove("animate");
    }, 300);
  };

  const updateProgress = (e) => {
    var duration = video.duration;
    const currentTime = video.currentTime;
    var progressPercent = (currentTime / duration) * 100;
    progressPercent = Math.round(progressPercent);
    progressBar.value = progressPercent;
    progressBar.style.background = `linear-gradient(to right, #4845F6 0%, #4845F6 ${progressPercent}%, #fff ${progressPercent}%, white 100%)`;
  };

  var uuid = "<?= $_SESSION['uuid'] ?? 0 ?>";
  var login_chcek = uuid;
  uuid = uuid + "<?= $video_id ?>";
  lastPlay = localStorage.getItem('lastPlayTime' + uuid);
  video.currentTime = lastPlay;

  const setMusicTime = (e) => {
    // var { duration, currentTime } = e.srcElement;
    var duration = video.duration;
    lastPlay = localStorage.getItem('lastPlayTime' + uuid);
    if ("<?= $this->session->id ?>") {
      if ("<?= $dur ?>") {
        lastPlay = "<?= $dur ?>";
      }
    }
    const currentTime = lastPlay; //player.currentTime();
    if (isNaN(duration)) {
      duration = 0;
    }
    calcSongTime(duration, musicDurationTime);
    calcSongTime(currentTime, musicCurrentTime);
  };

  video.addEventListener('timeupdate', function(event) {
    if(!$('.shaka-controls-container').attr('shown')){
      $('.shaka-controls-container').attr('shown', true);
    }
    localStorage.setItem('lastPlayTime' + uuid, video.currentTime);
    var Ctime = Math.ceil(video.currentTime);
    is_free = 1;
    if (Ctime > free_time && !session && (Ctime > 1)) {
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
          // matomo('Page', 'View', 'LoginPopup', 5);
          queueTrackingData('trackEvent', ["Page", "View", 'LoginPopup']);
          redirect_url = "<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" + '&dur=' + Ctime;
          await set_userdata(redirect_url);
          window.location.href = "<?= base_url('user-login') ?>";
        } else if (result.dismiss) {
          // matomo('Page', 'View', 'CancelPopup', 5);
          queueTrackingData('trackEvent', ["Page", "View", 'CancelPopup']);

          await set_userdata(redirect_url);
          video.currentTime = 0;
          pauseMusic();
        }
      });
    }

    if (time_update) {
      updateProgress(event);
      setMusicTime(event);
    } else {
      time_update = true;
    }
  });

  video.addEventListener('ended', function(event) {
    pauseMusic();
    progressBar.value = 0
    progressBar.style.width = `0%`;
    <?php if (!empty($next_vid['id'])): ?>
        setTimeout(() => {
            window.location.href = "<?= base_url(($next_vid['similar'] != 1 ? 'play-media?id=' : 'play-episode?id=') . aes_cbc_encryption_($next_vid['id'])) ?>";
        }, 2000);
    <?php endif; ?>
   // calcSongTime(0, musicCurrentTime);
  });

  progressBar.addEventListener('input', function(e) {
    const value = this.value;
    const setPoint = e.offsetX;
    this.style.background = `linear-gradient(to right, #4845F6 0%, #4845F6 ${value}%, #fff ${value}%, white 100%)`;
    var duration = video.duration;
    video.currentTime = (setPoint / value) * duration;
  });

  next.addEventListener("click", nextMusic);
  prev.addEventListener("click", prevMusic);

  function cardAnimate(e) {
    this.querySelectorAll(".music-card").forEach(function(boxMove) {
      const x = -(window.innerWidth / 3 - e.pageX) / 90;
      const y = (window.innerHeight / 3 - e.pageY) / 30;
      boxMove.style.transform = "rotateY(" + x + "deg) rotateX(" + y + "deg)";
    });
  }
</script>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
        $id = aes_cbc_encryption_($video_details['data']['id']);
        $watch_id = aes_cbc_encryption_($video_details['data']['show_id']);
        ?>
        <input type="hidden" id="product_id" value="<?= $id ?>">
        <input type="hidden" id="watch_id" value="<?= $watch_id; ?>">
      </div>
    </div>
  </div>

  <?php } else { ?>
    <div class="col-md-6 m-auto text-center watchListNo">
      <div class="no_dt_found">
        <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
        <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
        <p class="mb-0 text_ac"><?= NoListFound; ?></p>
      </div>
    </div>
  <?php } ?>

  <script>
    $('.play-music').on('click', function() {
      var id = $(this).data('id');
      if ($.isNumeric(id)) {
        $.ajax({
          url: "<?= base_url('web/dashboard/getMediaUrl') ?>",
          type: "post",
          data: {
            "id": id
          },
          success: function(res) {
            data = JSON.parse(res);


          }
        }).done(function() {
          setTimeout(function() {
            $("#overlayonajaxhit").fadeOut(300);
          }, 500);
        });
      }
    })
  </script>

  <script>
    $(document).ready(function() {
      window.addEventListener('online', handleConnectionChange);
      window.addEventListener('offline', handleConnectionChange);

      // $('.back-button').click(function() {
      //   if ("<?= $video_details['data']['title'] ?>") {
      //     if ("<?= $video_details['data']['is_paid'] == 0 ?>") {
      //       matomo("<?= $guest_user ?>", 'Stop', '<?= $video_details['data']['id'] ?>' + '/' + '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(VOD)' +   times, 5);
      //     }else if("<?= $video_details['data']['is_paid'] == 1?>" ){
      //       matomo("<?= $guest_user ?>", 'Stop', '<?= $video_details['data']['id'] ?>' + '/' + '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(SVOD)' +  times, 5);
      //     }else{
      //       matomo("<?= $guest_user ?>", 'Stop', '<?= $video_details['data']['id'] ?>' + '/' + '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(TVOD)' +  times, 5);
      //     }
      //   }
      // })
    });
    
    function handleConnectionChange(event) {
      if (event.type == "offline") {
        $("#pboverlaydiv").css("display", "none");
        $('#my-audio_pb').append('<h4 class="no_intrnt_text text-white network_bott"><?= $this->lang->line("nointernet-connection") ?></h4>');
      }
      if (event.type == "online") {
        $('#my-audio_pb').find('.no_intrnt_text').remove();
        $('#my-audio_pb').append('<h4 class="intrnt_text text-white network_bott"><span class="network_size">✓</span> <?= $this->lang->line("internet-connection") ?></h4>');
        setTimeout(() => {
          $('#my-audio_pb').find('.intrnt_text').remove();
        }, 1000)
      }
    }

    function matomo(user, type, title, hits = 4) {
      var geners = "<?= $genres ?>";
          queueTrackingData('trackEvent', [user, type, title]);
          // queueTrackingDataWithDelay('trackContentInteraction', [user + '/' +type,title,geners],100);
          // queueTrackingDataWithDelay('trackContentImpression', [title,geners],200);

      // $.ajax({
      //   type: 'POST',
      //   url: "<?= base_url('/web/Home/matomo_hit') ?>",
      //   dataType: "json",
      //   data: {
      //     user: user,
      //     types: type, // Typo here, it should be type instead of types
      //     type: hits,
      //     title: title
      //   },
      //   success: function(data) {
      //     if (data.status == 1) {}
      //   }
      // });
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
  </script>

  <script>
    $(document).ready(function() {
      $('#seek-next').click(function() {
        var id = $(this).data('id');
        if (id != 0 || id != "") {
          if ("<?= $video_details['data']['is_paid'] == 0 ?>") {
              matomo("<?= $guest_user ?>", 'Next', '<?= $video_details['data']['id'] ?>' + '/' + '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(VOD)'  + times, 5);
          }else if("<?= $video_details['data']['is_paid'] == 1?>" ){
            matomo("<?= $guest_user ?>", 'Next', '<?= $video_details['data']['id'] ?>' + '/' + '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(SVOD)'  + times, 5);
          }else{
            matomo("<?= $guest_user ?>", 'Next', '<?= $video_details['data']['id'] ?>' + '/' + '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(TVOD)'  + times, 5);
          }
        } else {
          if ("<?= $video_details['data']['is_paid'] == 0 ?>") {
              matomo("<?= $guest_user ?>", 'Next', '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(VOD)'  + times, 5);
          }else if("<?= $video_details['data']['is_paid'] == 1?>" ){
            matomo("<?= $guest_user ?>", 'Next', '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(SVOD)'  + times, 5);
          }else{
            matomo("<?= $guest_user ?>", 'Next','<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(TVOD)'  + times, 5);
          }
        }
      });
    });

    $(document).ready(function() {
      $('#seek-prev').click(function() {
        var id = $(this).data('id');
        if (id != 0 || id != "") {
          if ("<?= $video_details['data']['is_paid'] == 0 ?>") {
              matomo("<?= $guest_user ?>", 'Previous', '<?= $video_details['data']['id'] ?>' + '/' + '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(VOD)'  + times, 5);
          }else if("<?= $video_details['data']['is_paid'] == 1?>" ){
            matomo("<?= $guest_user ?>", 'Previous', '<?= $video_details['data']['id'] ?>' + '/' + '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(SVOD)'  + times, 5);
          }else{
            matomo("<?= $guest_user ?>", 'Previous', '<?= $video_details['data']['id'] ?>' + '/' + '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(TVOD)'  + times, 5);
          }
        } else {
          if ("<?= $video_details['data']['is_paid'] == 0 ?>") {
              matomo("<?= $guest_user ?>", 'Previous',  '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(VOD)'  + times, 5);
          }else if("<?= $video_details['data']['is_paid'] == 1?>" ){
            matomo("<?= $guest_user ?>", 'Previous', '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(SVOD)'  + times, 5);
          }else{
            matomo("<?= $guest_user ?>", 'Previous', '<?= $video_details['data']['title'] ?>' + '-' + '<?= $content_details['data']['title'] ?>' + '(TVOD)'  + times, 5);
          }
        }
      });
    });

    $(document).ready(function() {
      $(document).on('click', '.vjs-button', function() {
        var menu = $(this).next('.vjs-menu');
        menu.removeClass('vjs-lock-showing');
      });
    });

    $(document).ready(function() {
      const dashUri = '<?= $video_details['data']['file_url'] ?>';
      const token = '<?= ($video_details['data']['token']) ?? "" ?>';
      const browser = "<?= $DeviceType??1 ?>";
      player_config(dashUri,browser,token);
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

    async function getAdsData(file_url, mediaTailorAdsParams, uri){
      $.ajax({
        url:file_url,
        type:"post",
        data:JSON.stringify(mediaTailorAdsParams),
        dataType: "json",
        success:function(res){
          var url = uri.split('aws.com/')[0]+'aws.com'+res.trackingUrl;
          fetch(url, {
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

  async  function player_config(url, browser,token=''){
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
    const HLSmanifestUri = url;
    const file_url=url;

    const defaultConfig = {
        controlPanelElements: [
          //"backward",
          //"play_pause",
          //"forward",
          //"time_and_duration",
          //"spacer",
          //"skipRecap",
          //"skipIntro",
          //"spacer",
          //"volume",
          //"mute",
          // "language",
          // "text_settings",
         
          //"overflow_menu",
          //"playback_rate",
          // "cast",
          //"lock_ui",
         // "Unlock_ui",
         // "picture_in_picture",
          "quality",
         // "fullscreen",
        ],
        overflowMenuButtons: [
          //"quality",
          // "captions",
         // "language",
         // "playback_rate",

        
        ],
        seekBarColors: {
            base: "rgba(115, 133, 159, 0.5)",
            buffered: "rgba(115, 133, 159, 0.85)",
            played: "rgba(236, 0, 140, 1)",
          },
        enableTooltips: false,
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
      
    player.addEventListener('error', onPlayerErrorEvent);
    controls.addEventListener('error', onUIErrorEvent);
    player.getNetworkingEngine().registerRequestFilter((type, request) => {
    if (request.uris[0].includes("mercury.akamaized.net/cm/e.gif") || request.uris[0].includes("mercury.akamaized.net/cm/i.gif")) {
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

      var fairplayCertUri =  "https://license-global.pallycon.com/ri/fpsKeyManager.do?siteId=<?= SITE_ID ?>";
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
              autoLowLatencyMode: true,
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
          //getAdsData(file_url, mediaTailorAdsParams, uri);
      }else{
          var uri = HLSmanifestUri;
      }

      //video.autoplay = true;
      video.muted = false;
      await player.load(uri)
      .then(function() {
        video.play().then(function() {
          changeIcon();
        }).catch(function(error) {
          video.muted = false;
          pauseMusic();
        });
      }).catch(function(error) {
          video.muted = false;
          pauseMusic();
      }).finally(function() {
        changeIcon();
      });
      
      changeSpanName('Captions', 'Subtitles');

      const english =
        "https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/transcript/3336892/master_1718289064_20240613201433.vtt?v=1720512567";
      const hindsi =
        "https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/transcript/3336892/master_1718289064_20240613201348.vtt?v=1720512567";
      const textTracks = [
        {
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

      textTracks.map((text) => {
        player.addTextTrackAsync(text.uri, text.language, text.kind);
      });

      const audioTracks = player
        .getVariantTracks()
        .filter((track) => track.type === "variant");
      if (audioTracks.length > 0) {
        player.selectVariantTrack(audioTracks[0]);
      }
      
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
      });

      adManager.addEventListener(shaka.ads.Utils.AD_COMPLETE, (e) => {
        // console.log("AD_COMPLETE");
        isAddOnPlay = false;
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
        let skipCont = document.querySelector('.shaka-skip-ad-container');
        let skipButton = document.querySelector('.shaka-skip-ad-button');
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
          console.log("AD_RECOVERABLE_ERROR");
        }
      );

      adManager.addEventListener(shaka.ads.Utils.AD_RESUMED, (e) => {
        // console.log("AD_RESUMED");
      });

      adManager.addEventListener(
        shaka.ads.Utils.AD_SKIP_STATE_CHANGED,
        (e) => {
          // console.log("AD_SKIP_STATE_CHANGED");
          let skipCont = document.querySelector('.shaka-skip-ad-container');
          let skipButton = document.querySelector('.shaka-skip-ad-button');
          skipCont.classList.add('clickable-btn');
          skipButton.classList.add('clickable-btn');
        }
      );

      adManager.addEventListener(shaka.ads.Utils.AD_SKIPPED, (e) => {
        // console.log("AD_SKIPPED");
        isAddOnPlay = false;
      });

      adManager.addEventListener(shaka.ads.Utils.AD_STARTED, (e) => {
        // console.log("AD_STARTED");
        isAddOnPlay = true;
        if(video.playbackRate > 0){
          playbackRate = video.playbackRate;
        }
        video.playbackRate = 1;
        //ui.configure(adConfig);
        $(".shaka-backward-button").addClass("shaka-hidden");
        $(".lockButton").addClass("shaka-hidden");
        $(".shaka-overflow-button").addClass("shaka-hidden");
        $(".shaka-forward-button").addClass("shaka-hidden");
        const sdkAdObject = e["sdkAdObject"];
        const originalEvent = e["originalEvent"];
      });

      adManager.addEventListener(shaka.ads.Utils.AD_STOPPED, (e) => {
        // console.log("AD_STOPPED");
        isAddOnPlay = false;
        video.playbackRate = playbackRate;
       // ui.configure(defaultConfig);
        $(".shaka-backward-button").removeClass("shaka-hidden");
        $(".shaka-forward-button").removeClass("shaka-hidden");
        $(".lockButton").removeClass("shaka-hidden");
        $(".shaka-overflow-button").removeClass("shaka-hidden");
      });

      adManager.addEventListener(
        shaka.ads.Utils.AD_THIRD_QUARTILE,
        (e) => {
          // console.log("AD_THIRD_QUARTILE");
        }
      );

      adManager.addEventListener(
        shaka.ads.Utils.AD_VOLUME_CHANGED,
        (e) => {
          // console.log("AD_VOLUME_CHANGED");
        }
      );

      adManager.addEventListener(shaka.ads.Utils.ADS_LOADED, (e) => {
        // console.log("ADS_LOADED");
      });

      adManager.addEventListener(
        shaka.ads.Utils.ALL_ADS_COMPLETED,
        (e) => {
          // console.log("ALL_ADS_COMPLETED");
        }
      );

      adManager.addEventListener(
        shaka.ads.Utils.CUEPOINTS_CHANGED,
        (e) => {
          // console.log("CUEPOINTS_CHANGED");
        }
      );

    } catch (error) {

      console.error("Error loading manifest:", error);

    }
  }

  function ManagePlayerEvent(type,Etitle,Ititle,event){      
          queueTrackingDataWithDelay('trackEvent', [type, event, Etitle+times],0);
          // queueTrackingDataWithDelay('trackContentInteraction', [type + '/' + event, Ititle],100);
          // queueTrackingDataWithDelay('trackContentImpression', [Ititle],200);
    }
  function queueTrackingDataWithDelay(method, params, delay) {
    setTimeout(() => {
        queueTrackingData(method, params);
    }, delay);
  }
    
</script>

</body>
</html>