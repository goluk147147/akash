<!-- player -->
<link rel="stylesheet" href="<?= base_url() ?>assets/website_assets/css/video-js.css">
<script src="<?= base_url() ?>assets/website_assets/js/video.js"></script>
<script src="<?= base_url() ?>assets/website_assets/js/videocontrib.js"></script>


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
    /* top: 10px; */
    margin-top: -3px;
    cursor: pointer;
  }

  .qualitymenu {
    right: 0;
    top: inherit !important;
    bottom: 41px !important;

  }
.section{
  background:#000;
}
  /* .vjs-loading-spinner {
            border: 8px solid rgba(0, 0, 0, 0.1);
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        } */

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

  .drm-audio-new-wrpaer .vjs-quality-button.vjs-menu-button.vjs-menu-button-popup.vjs-control.vjs-button {
    /* margin-bottom: -54%; */
    /* position: absolute; */
    margin-left: 63%;
    z-index: 9999999999999;
  }

  .drm-audio-new-wrpaer .vjs-menu-button-popup .vjs-menu {
    top: 0 !important;
    padding: 0;
  }

  .drm-audio-new-wrpaer .video-js {
    height: 0px !important;
  }

  .ad_setting_pb {
    opacity: 0;
  }

  .drm-audio-new-wrpaer .vjs-progress-holder.vjs-slider.vjs-slider-horizontal {
    display: none;
  }

  .drm-audio-new-wrpaer button.vjs-fullscreen-control.vjs-control.vjs-button {
    display: none;
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

  /* .vjs-menu-button-popup .vjs-menu .vjs-menu-content {
    bottom: -3em !important;
    right: -39px !important;
    left: inherit !important;
  } */



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

  .sha_btv {
    position: relative;
  }



  .sha_btv .share_hl_bt2 {
    position: absolute;
    width: 300px;
    right: 17px !important;
    z-index: 9999;
    left: inherit !important;
    transform: inherit !important;
  }

  /* ------------------------Episode Css Start 01-03-2024 -------------------- */
  .episodeSizeBox {
    padding: 0px 20px;
    display: flex;
    flex-wrap: wrap;
    width: 100%;
  }

  .episodeWidth {
    transition: all 0.5s;
    width: 24%;
    position: relative;
    margin: 0 10px 20px 0;
    transition: all 0.5s;
  }

  .episodeNav {
    gap: 10px;
    padding: 0 20px;
    white-space: nowrap;
    width: 100%;
    overflow-x: auto;

    flex-wrap: inherit;
  }

  .episodeNav::-webkit-scrollbar {
    width: 0 !important;
    height: 3px !important;
  }

  .episodeNav .nav-link {
    border-radius: 0.25rem;
    color: #8A8A8A;
    background-color: #252525;
  }

  .episodeNav .nav-link:hover {
    color: #fff;
    background-color: #4321c7;
  }

  .episodeNav .nav-link.active {
    color: #fff;
    background-color: var(--pbg) !important;
  }

  .episodeSubTittle {
    color: #757575;
    font-size: 16px;
    line-height: normal;
  }

  .episodeTittle {
    font-size: 14px;
    line-height: normal;
    overflow-wrap: break-word;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
    color: #898989;
  }

  .epiTime {
    position: absolute;
    width: fit-content;
    padding: 0px 10px;
    border-radius: 3px;
    right: 8px;
    bottom: 9px;
    font-size: 9px;
  }

  .artistSec {
    padding: 0px 20px;
  }

  .episodeCast_headding {
    font-size: 20px;
    color: #999999;
  }

  .artistList {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }

  .artistDetail {
    text-align: center;
    max-width: 100%;
  }

  .artistDetail p {
    font-size: 12px;
    line-height: normal;
    margin-top: 10px;
    color: #7F7F7F;
  }

  .tab-content {
    width: 100%;
  }

  .episodeFullBox {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  .episodeFullBox img {
    border-radius: 5px;
  }

  .artistDetail img {
    width: 100px;
    height: 100px;
    object-fit: contain;
    border: 1px solid #ccc;
    border-radius: 50%;
  }

  .cateaogry_banner .vjs-fluid {
    padding-top: 0 !important;
    position: relative;
    height: calc(70vw* 0.567) !important;
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

  .artist_dt_pb {
    margin-top: -70px;
    position: relative;
    z-index: 99;
  }

  .pb_add_btns {
    position: absolute;
    bottom: 6px;
    width: 100%;
    left: 0;
  }

  .nav-audio-list {
    align-items: center;
    font-size: 18px;
  }

  .pb_vd_card .pb_card_vd-2 {
    height: 75% !important;
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

  .cateaogry_banner .vjs-poster {
    height: calc(70vw* 0.567) !important;
  }

  .cateaogry_banner video {
    height: calc(70vw * 0.567) !important;
    object-fit: cover;
  }

  @media only screen and (min-width: 320px) and (max-width: 600px) {
    .episodeWidth {
      width: 46.5%;

    }
  }

  @media only screen and (min-width: 601px) and (max-width: 1199px) {
    .episodeWidth {
      width: 31.5%;

    }
  }


  @media only screen and (min-width: 320px) and (max-width: 767px) {
    .play_epsode_btn span img {
      width: 32px !important;
      height: 32px !important;
    }

    .music-card {
      margin: 4rem auto !important;
    }

    .more_sec {
      margin-top: 0;
    }

    .music-progress {
      margin-top: 16px !important;
    }

    .pb_episode_cont {
      position: relative;
      margin-top: 00px;
    }

    .cateaogry_banner .vjs-fluid {
      height: 100% !important;
    }

    .cateaogry_banner .vjs-poster {
      height: 100% !important;
    }

    .cateaogry_banner video {
      height: 100% !important;
    }

    .artistSec {
      padding: 0;
    }

    .artistList {
      gap: 18px;
    }

    .artistDetail img {
      width: 80px;
      height: 80px;
    }

    .episodeSizeBox {
      padding: 0;
    }

    .episodeOne {
      font-size: 15px;
    }

    .episodeTittle {
      font-size: 12px;
    }

    .episodeNav {
      padding: 0;
    }

    .episodeNav .nav-link.active {
      font-size: 14px;
    }

    .episodeNav .nav-link {
      font-size: 14px;
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

    .cateaogry_banner .vjs-fluid {
      height: 100% !important;
    }

    .cateaogry_banner .vjs-poster {
      height: 100% !important;
    }

  }

  @media only screen and (min-width: 1800px) {
    .episodeWidth {
      width: 19.4%;

    }
        .nav-audio-list {
        padding: 0 !important;
        font-size: 24px !important;
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

    .section {
      height: 800px;
    }

    .music-progress {
      margin-top: 10px !important;
    }

    .music-div {
      height: 366px !important;
    }

    .music-card__content {
      width: 649px !important;
      height: auto;
    }

    .music-card {
      max-width: 650px !important;
      width: 100%;
    }
  }

  @media only screen and (min-width: 1801px) and (max-width: 2400px) {


    .section {
      height: 850px !important;
    }

    .music-progress {
      margin-top: 15px !important;
    }

    .music-div {
      height: 366px !important;
    }

    .music-card__content {
      width: 649px !important;
      height: auto;
    }

    .music-card {
      max-width: 649px !important;
      width: 100%;
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

    .section {
      height: 950px !important;
    }

    .music-progress {
      margin-top: 15px !important;
    }

    .music-div {
      height: 366px !important;
    }

    .music-card__content {
      width: 649px !important;
      height: auto;
    }

    .music-card {
      max-width: 650px !important;
      width: 100%;
    }
  }

  /*header{
    position: relative !important;
  }*/
  .player_img {
    display: flex;
    justify-content: center;
    margin-top: 100px;
  }
</style>
<style>
  .music-div {
    position: relative;
    width: 100%;
    height: 290px;
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
    z-index: 1;
    width: 100%;
  }

  .nav-audio-list {
    border: none !important;
    background: none !important;

  }


  .section {
    position: relative;
    display: flex;
    flex-direction: column;
    /*align-items: center;
            justify-content: center;*/
    width: 100%;
    height: 720px;
    /* perspective: 1000px; */
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
    /*            background-color: rgba(31, 31, 31, .8);*/
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

  /* .music-card.middle-weight {
    transform: rotateY(0) rotateX(-5deg);
  } */

  .music-card.left-weight {
    transform: rotateY(-4deg) rotateX(-5deg);
  }

  .music-card__wrapper {
    position: relative;
    z-index: 1;
  }

  .music-card__content {
    padding-bottom: 20px;
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
    /* background-color: rgba(255, 255, 255, .2); */
    /*            backdrop-filter: blur(10px);*/
    /* border-radius: 20px; */
    z-index: -1;
  }

  .music-image {
    position: relative;
    width: 100%;
    /* height: 400px;
            left: 20px;
            top: -20px;
            border-radius: 20px; */
    object-fit: contain;
    aspect-ratio: 16/9;
    filter: drop-shadow(-20px 10px 10px rgba(0, 0, 0, 0.25));
  }

  /* .music-image.animate {
    animation-name: coverAnimate;
    animation-duration: .3s;
    animation-iteration-count: 1;
    animation-direction: alternate;
    animation-timing-function: ease-out;
    animation-fill-mode: forwards;
  } */

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
    /*            align-items: center;*/
    justify-content: space-between;
    padding-top: 25px;
    /*margin-inline: auto;
            width: 270px;*/
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

  .audio_bott_dt {
    background: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.9) 20%, rgba(0, 0, 0, 0) 40%);
    z-index: 1;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
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

  /* .music-controls-item:hover:not(#play) {
            background: #a5a5a5;
        }*/

  .music-controls-item--icon {
    font-size: 1.2em;
    color: #fff;
  }

  .music-progress {
    position: relative;
    width: calc(100% - 0px);
    margin-top: -7px;

    cursor: pointer;
  }

  .music-progress-bar {
    position: relative;
    width: 100% !important;
    height: 5px;
    border-radius: 5px;
    background-color: var(--pbg);
  }

  .music-progress-bar:after {
    content: '';
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
    position: absolute;
    top: 12px;
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

  .ad_seeting {
    display: none;
    border: 1px solid #474747;
  }

  .ad_setting_pb:hover .ad_seeting {
    display: block;
    position: absolute;
    bottom: 40px;
    background: rgba(55, 55, 55, 0.83);
    width: 14em;
    border-radius: 5px;
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
      height: auto;
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

    .vjs-icon-hd:before {
      width: 22px !important;
      height: 22px !important;
      top: 2px !important;
      display: inline-block;
    }

    .drm-audio-new-wrpaer .vjs-quality-button.vjs-menu-button.vjs-menu-button-popup.vjs-control.vjs-button {
      /* margin-bottom: -22%; */
      /* position: absolute; */
      margin-left: 93%;
      z-index: 9999999999999;
      right: 20px !important;
      top: 102px !important;
    }

    .vjs-icon-cog:before {
      width: 25px !important;
      height: 25px !important;
      top: 5px !important;
      display: inline-block;
    }
  }

  .disable_icon {
    pointer-events: none;
    opacity: 0.4;
  }

  /* .music-progress-bar::after {
    background: #E10C0C !important;
  } */


  .positionRelative {
    position: relative;
  }


  .qualitymenu {

    right: 0;


    background: rgba(0,0,55,1) !important;
    position: absolute;
    width: 8em;
    max-height: 25em;
    border-radius: 4px;
    border: 1px solid rgba(0,0,50,1);
    z-index: 99999999;
    display: none;
  }

  .positionRelative:hover .qualitymenu {
    display: block
  } 


  .qualitymenu .vjs-menu-item.selected {
  /* border: 1px solid rgba(68, 68, 68, 1) !important; */

    color: var(--pbc) !important;
    font-family: 'AnekLatin-SemiBold';
    font-weight: 700;
  }

  .qualitymenu .vjs-menu-item {
    padding: 5px;
    cursor: pointer;
    color: rgba(162, 162, 162, 1) !important;
     font-family: 'AnekLatin-SemiBold';
    font-weight: 700;
  }

  .vjs-icon-cog {
    font-family: VideoJS;
    font-weight: normal;
    font-style: initial;
    display: flex;
    justify-content: end;
    margin-top: -41px;
    margin-right: 0px;
  }

  .disable_icon {
    /* pointer-events: none;
    opacity: 0.4;*/
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

    background: rgb(0,0,55,1) !important;
    position: absolute;
    width: 13em !important;
    max-height: 25em;
    border-radius: 4px;
    border: 1px solid #474747;
    z-index: 99999999;
    display: none;
    padding:5px;
  }

  /* .positionRelative:hover .qualitymenu {
    display: block
  } */


  .qualitymenu .vjs-menu-item.selected {
    background: rgba(14,22,83,1) !important;
    color: #625df5;
  }

  .qualitymenu .vjs-menu-item {
    padding: 10px;
    cursor: pointer;
    padding-left:25px;
    border-radius:6px;
  }
 .qualitymenu .vjs-menu-item:hover{
  background: rgba(23 23 92) !important;
 }
  .vjs-control-bar {
    display: block !important;
  }

  .drm-audio-new-wrpaer .vjs-quality-button.vjs-menu-button.vjs-menu-button-popup.vjs-control.vjs-button {
    /* margin-bottom: -22%; */
    position: absolute;
    margin-left: 93%;
    z-index: 9999999999999;
    right: 0;
    top: 125px !important;
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

  .vjs-icon-cog:before {
    width: 64px !important;
    height: 25px !important;
    top: 7px !important;
    right:-26px !important;
  }

  .vjs-menu-button-popup .vjs-menu .vjs-menu-content {
    bottom: 0.1em !important;
    right: -44px !important;
    left: inherit !important;
  }

  .vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar {
    visibility: visible;
    opacity: 1 !important;
    transition: visibility 1s, opacity 1s;
  }

  .vjs-menu li.vjs-menu-item {
    color: rgba(192, 192, 192, 1) !important;
  }

  .vjs-menu li.vjs-selected {
    color: var(--pbc) !important;
    font-weight: 900;
  }

  .vjs-menu-button-popup .vjs-menu .vjs-menu-content {
    background: rgba(55, 55, 55, 0.98) !important;
  }

  .music-card__wrapper{
    margin-top:30px;
  }
  /* #my-audio-div .vjs-quality-button{
  width:30px !important;
  height:25px !important
} */
 .vjs-control-bar{
  background: transparent !important;
 }
</style>

<script src="<?php echo base_url('assets/website_assets/js/videojs-contrib-eme.min.js'); ?>"></script>
</head>

<body>
  <?php

  // pre($content_details);die;
   if (isset($video_details['data']['file_url']) && !empty($video_details['data']['file_url'])) { 
    $title_audio =   $content_details['data']['id']."/".$content_details['data']['title'];

    ?>
    <section class="pb-audio-player">
      <?php
      $prev = 0;
      $next = 0;
      $nexttitle = '';
      if (!empty($video_details['data']['similar'])) {
        $id = $video_details['data']['id'];
        $curr = $id;
        foreach ($video_details['data']['similar'] as $key => $value) {
            $next = $value['id'];
            $nexttitle = $value['title'];
            break;
        }
      }
      ?>

      <input type="hidden" name="" data-meid="<?= $next?>" data-metitle="<?= $nexttitle?>"  id="next-data" value="<?= ($next > 0) ? aes_cbc_encryption_($next) . '&type=' . 'radio' : 0; ?>">
      <input type="hidden" name="" id="prev-data" value=""  data-pmeid="" data-pmetitle="" >
      <div class="conatiner-fluid">
        <div class="row">
          <div class="col-lg-11 mx-auto col-12">

          </div>
        </div>
      </div>

      <div class="section">

        <div class="section__background">
          <img id="backgroundImage" class="section__background-image" src="<?= $video_details['data']['poster_url'] ?>" alt="poster background">
          <p class=" audio_bott_dt mb-0">&nbsp;</p>
        </div>
        <nav class="audio-nav py-0">
          <a href="javascript:void(0)" class="d-flex nav-audio-list  text-decoration-none list-group-item d-block back-buttontt text-white ">
            <i class="fa fa-chevron-left text-white"></i>
            <span class="ms-4 text-white"><b><?= $video_details['data']['title'] ?></b></span>
          </a>
        </nav>
        <div class="music-card__wrapper">


          <div class="music-card">
            <div class="music-card__content">
              <div class="music-div">
                <img class="music-image" src="<?= $video_details['data']['poster_url'] ?>" alt="poster image">
                <div class=""> <a href="javascript:void()" class="pb_live_ch"> <img src="<?= base_url('assets/images/newlive1.gif'); ?>" class="img-fluid" alt="live"></a></div>
              </div>
              <div class="music-info">
                <h2 class="music-name"></h2>
                <p class="music-artist"></p>
              </div>
              <div class="d-non drm-audio-new-wrpaer" id="my-audio-div">
                <audio data-matomo-title="<?=$title_audio?>" id="my_video" class="video-js" poster="<?= $video_details['data']['poster_url']; ?>" controls muted autoplay>
                </audio>
              </div>
              <div class="music-progress">
                <div id="progress-bar" class="music-progress-bar"></div>
                <!-- <div class="music-progress__time">
                    <span class="music-progress__time-item music-current-time">00:00</span>
                    <span class="music-progress__time-item music-duration-time">00:00</span>
                  </div> -->
              </div>
              <div class="music-controls ">
                <div id="prev" class="music-controls-item">
                  <img id="previmg" src="<?= base_url('assets/website_assets/css/video_player_icons/mute1.svg') ?>" alt="language" class="">
                </div>
                <div id="seek-prev" class="music-controls-item disable_icon">
                  <img src="<?= base_url('assets/images/previous_icon.svg') ?>" alt="prev image">
                </div>

                <div id="play" class="music-controls-item">
                  <img src="<?= base_url('assets/images/play_icon.svg') ?>" alt="play icon">
                  <div class="play-icon-background"></div>
                </div>

                <div id="seek-next" class="music-controls-item <?= ($next == 0) ? 'disable_icon' : ''; ?>">
                  <img src="<?= base_url('assets/images/next_icon.svg') ?>" alt="next icon">
                </div>

                <div id="next" class="music-controls-item <?= ($content_details['data']['is_drm_protected'] == 2 || true) ? 'disable_icon' : ''; ?>">
                  <img src="<?= base_url('assets/website_assets/css/video_player_icons/setting.svg') ?>" alt="setting">
                  <div class="ad_seeting">
                    <!-- <ul>
                      <li class="textQuality disable_icon" disab>Quality</li>
                      <?php foreach ($bitrate as $key => $value) { ?>
                        <li data-url="<?= $value ?>" class="ch_bit"><?= floor($key / 1000) . ' kbps' ?></li>
                      <?php } ?>
                    </ul> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <?php


    $lang_title = ucwords($this->session->lang_id);
    $descriptions = '';
    if (is_array($content_details['data']['description'])) {
      // First, check for the English description
      foreach ($content_details['data']['description'] as $desc) {
        if ($desc['language'] === "English") {
          $descriptions = $desc['content'];
          break;
        }
      }

      // If lang_title is set, check for the description in that language
      if (isset($lang_title)) {
        foreach ($content_details['data']['description'] as $desc) {
          if ($desc['language'] === $lang_title) {
            $descriptions = $desc['content'];
            break;
          }
        }
      }
    }
    ?>


    <section class="pt-3 pb-5 more_sec">
      <div class="container-fluid">
        <div class="row m-0 mob-s">
          <div class="col-lg-12 mx-auto">
            <div class="">
              <div class="row m-0">
                <div class="py-3 col-md-8">
                  <div class="d-flex live_pb_head">
                    <!-- <img src="<?= base_url('assets/images/dd_nation_white-sm.svg'); ?>" class="img-fluid" alt="logo"> -->
                    <h5 class="text-white m-0 "><?= $this->lang->line('bharat_ott') ?></h5>
                  </div>
                  <div class="pt-3">
                    <h4 class="text_e7 txt_98"><?= $content_details['data']['title']; ?></h4>
                    <!-- <p class="line21 text-white">Mon 04 Mar, <span>08:25 PM</span></p> -->
                    <p class="line21 pb_live_p"><?= $descriptions; ?></p>
                  </div>
                </div>
                <div class="col-md-4 py-3">
                  <div class="play_ep_btnn play_epsode_btn d-flex justify-content-end audioLike sha_btv">
                    <?php if ($this->session->id) { ?>
                      <span class="share_btn_icon me-3 likeAudio liveVideo tooltip-text" tooltip="<?= $this->lang->line("favourite_lang") ?>">
                        <a href="javascript:void(0)" data-toggle="modal" show-id="<?= $content_details['data']['id']; ?>" data-target="#share_btn">
                          <img id="likeMedia" class="likeMedia notlikebtn" src="<?= base_url('assets/images/suscribe2.png') ?>">
                          <img id="likeMedia" class="likeMedia likebtn d-none" src="<?= base_url('assets/images/likeClick.svg') ?>">
                        </a>
                      </span>
                    <?php } ?>
                    <span class="share_btn_icon1 share_btn_icon liveVideo sh_lv tooltip-text" tooltip="<?= $this->lang->line('share'); ?>">
                      <a class="shareMedia" href="javascript:void(0);">
                        <img class="shareMedia" src="<?= base_url('assets/images/shareNew.svg') ?>">
                      </a>
                    </span>
                    <div class="share_hl_popup d-none share_hl_bt2">
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

    </section>
    <?php if (isset($content_details['data']['similar']) && !empty($content_details['data']['similar'])) { ?>
      <section class="border-live"></section>
    <?php } ?>
    <script src="<?= base_url() ?>assets/js/cache.js"></script>
    <script src="<?php echo base_url('assets/website_assets/js/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/website_assets/js/video.js'); ?>"></script>
    <script src="<?php echo base_url('assets/website_assets/js/shaka-player.compiled.debug.js'); ?>"></script>
    <script src="<?php echo base_url('assets/website_assets/js/videojs-audio-shaka.js'); ?>"></script>
    <script src="<?php echo base_url('assets/website_assets/js/shaka-player.ui.js'); ?>"></script>
    <script src="<?php echo base_url('assets/website_assets/js/videojs.hotkeys.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/website_assets/js/videojs-contrib-eme.min.js'); ?>"></script>
    <script>
              queueTrackingDataWithDelay('trackEvent', ["LiveRadio", "Listen", "<?= $content_details['data']['id'] . '/' . $content_details['data']['title'] ?>" ],0);

    </script>
    <script>

      var favKey1 = "<?= ($this->session->profile_id ?? 0) . '-1favourites' ?>";
      var temp = "<?= $this->session->tempuuid ?>";
      var guest_end = '';
      var logIn = "<?= $this->session->id ?? 0 ?>";

      // code for previous audio (start)
      var currentId = `<?= $enc_id ?>`;
      var m_id =  "<?= $content_details['data']['id']?>";
      var m_title =  "<?= $content_details['data']['title']?>";
      var prevId = 0;
      var prevItem = localStorage.getItem('prevItem');
      if (prevItem) {
        const item = JSON.parse(prevItem);
         console.log("iteam",item);
        if (Date.now() < item.expiry) {
          prevId = item.value;
          if(prevId != currentId){
            $('#seek-prev').removeClass('disable_icon');
            $('#prev-data').val(prevId);
            $('#prev-data').attr('data-pmeid', item.pm_id);
            $('#prev-data').attr('data-pmetitle', item.pm_title);


          }
        }
      }
      prevItem = {
        value: currentId,
        pm_id: m_id,
        pm_title: m_title, 
        expiry: (Date.now()+(24 * 60 * 60 * 1000))
      };
      if(prevItem.value){
        localStorage.setItem('prevItem', JSON.stringify(prevItem));
      }      
      // code for previous audio (end)
      
      $(document).ready(function() {
        
        if (logIn == 0) {
          get_live_time().then(function(result) {
            guest_end = result.live_audio;
            //console.log(guest_end, 'guest_end'); // Output the array with the result
          });
        }
        setTimeout(() => {
          player.muted(true);
          playMusic();
          changeIcon();
          changePlayPauseIcon();
        }, 1000);

        $('#prev').on('click', function() {
          $('.vjs-loading-spinner').addClass('d-none');
          if (player.muted()) {
            player.muted(false);
          } else {
            player.muted(true);
          }
          changeIcon();
        });

      });

      function changeIcon() {
        var Vicon = '<?=base_url()?>' + 'assets/website_assets/css/video_player_icons/vlolume_h.svg';
        var Micon = '<?=base_url()?>' + 'assets/website_assets/css/video_player_icons/mute1.svg';
        if (player.muted()) {
          $('#previmg').attr('src', Micon);
        } else {
          $('#previmg').attr('src', Vicon);
        }
      }

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


      function check_favourite() {
        var show_id = "<?= $content_details['data']['id']??0; ?>";
        fetchCacheData(favKey1)
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

      check_favourite();

      const next = document.querySelector("#next");
      const play = document.querySelector("#play");
      const prev = document.querySelector("#prev");
      const back_timeSet = document.querySelector("#seek-prev");
      const forward_timeSet = document.querySelector("#seek-next");


      const progressBar = document.querySelector("#progress-bar");
      // const musicTitle = document.querySelector(".music-name");
      const musicCard = document.querySelector(".music-card");
      // const musicArtist = document.querySelector(".music-artist");
      const musicCover = document.querySelector(".music-image");
      // const musicCurrentTime = document.querySelector(".music-current-time");
      // const musicDurationTime = document.querySelector(".music-duration-time");
      const backgroundImage = document.querySelector("#backgroundImage");
      const music = document.querySelector("#my_video");
      const progressZone = document.querySelector(".music-progress");
      const imgElement = play.querySelector("img");
      var player;
      let isPlaying = false;
      // default select first music
      let selectedMusic = 1;
      var m_id = "<?=$content_details['data']['id'] ?>";
      var m_title = "<?=$content_details['data']['title'] ?>";


      back_timeSet.addEventListener("click", () => {
        let c_id = $('#prev-data').val();
        var pmeid = $('#prev-data').data('pmeid');
        alert(pmeid);
        var pmetitle = $('#prev-data').data('pmetitle');
        queueTrackingDataWithDelay('trackEvent', ["LiveRadio", "Previous",pmeid+"/"+pmetitle ],0);
        if (c_id != 0) {
          window.location.href = "<?= base_url('pb_live_details?id=') ?>" + c_id+"&type=radio";
        }
        //player.currentTime(player.currentTime() - 10);
      });
      
      forward_timeSet.addEventListener("click", () => {
        var n_id = $('#next-data').val();
        var nmeid = $('#next-data').data('meid');
        // alert(nmeid);
        var nmetitle = $('#next-data').data('metitle');
        queueTrackingDataWithDelay('trackEvent', ["LiveRadio", "Next",nmeid+"/"+nmetitle ],0);
        //console.log('n_id',n_id);
        if (n_id != 0) {
          window.location.href = "<?= base_url('pb_live_details?id=') ?>" + n_id+"&type=radio";
        }
        //player.currentTime(player.currentTime() + 10);
      });

      const loadMusic = (url, type, token = null) => {
        $(document).ready(function() {
          if (logIn == 0) {
            get_live_time().then(function(result) {
              setGuestEnd(result.live_audio);
            });
          }
        });

        function setGuestEnd(value) {
          guest_end = value;
          var test = localStorage.getItem('guestPlayTimea' + temp);
          //console.log('test', test);
          var guest_date = Date.now() + (guest_end * 1000);
          //console.log(guest_date, 'guest_date');
          if (test == null) {
            localStorage.setItem('guestPlayTimea' + temp, guest_date);
          }
        }
        if (type == 1) {

          licenseUri = `<?= BASEURLAPI ?><?= BASEVERSION ?>onRequestCreateVideoLicense`;
          widevineToken = token;
          var fairplayCertUri = 'https://license-global.pallycon.com/ri/fpsKeyManager.do?siteId=<?= SITE_ID ?>';
          dashUri = url;
          if (dashUri.includes('.m3u8')) {
            player = videojs('my_video');
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
            player = videojs('my_video', {
              muted: true,
              techOrder: ['shaka'],
              headers: {
                'custom-header': 'some value'
              },
              // playbackRates: [0.5, 1, 1.5, 2, 4],
              shaka: {
                debug: false,
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
            player.qualityPickerPlugin();
            player.src([{
              type: 'application/dash+xml',
              src: dashUri
            }]);
          }
        } else {
          player = videojs('my_video', {
            muted: true,
            sources: [{
              src: url,
              type: 'application/x-mpegURL'
            }]
          });

          player.ready(function() {
            this.hotkeys({
              volumeStep: 0.1,
              seekStep: 5
            });
          });


          player.on("loadedmetadata", () => {
            setTimeout(() => {              
              var calidades = player.tech().hls.representations();
              crearBotonesCalidades({
                class: "vjs-menu-item",
                calidades: calidades,
                // father: player.controlBar.el_,
              }, calidades);
            }, 400);
          });

          function crearBotonAutoCalidad(params, calidades) {
            let button = document.createElement("div");
            button.id = "auto";
            button.innerText = `Auto`;
            button.classList.add("selected");
            if (params && params.class) button.classList.add(params.class);
            button.addEventListener("click", () => {
              removeSelected(params);
              button.classList.add("selected");
              calidades.map((calidad) => calidad.enabled(true));
            });
            return button;
          }

          function crearBotonesCalidades(params, calidades) {
            $('#next').addClass('ad_setting_pb');
            let contentMenu = document.createElement("div");
            let menu = document.createElement("div");
            let icon = document.createElement("div");
            let fullscreen = document.querySelector(".music-controls");
            fullscreen.after('');
            contentMenu.appendChild(icon);
            contentMenu.appendChild(menu);
            fullscreen.after(contentMenu);
            menu.classList.add("qualitymenu");
            icon.classList.add("icon", "vjs-icon-cog");
            contentMenu.classList.add("positionRelative");
            let botonAuto = crearBotonAutoCalidad(params, calidades);
            menu.appendChild(botonAuto);
            calidades.sort((a, b) => {
              return a.bandwidth > b.bandwidth ? 1 : 0;
            });
            calidades.map((calidad) => {
              let button = document.createElement("div");
              if (params && params.class) button.classList.add(params.class);
              button.id = `${calidad.bandwidth}`;
              button.innerText = Math.floor(calidad.bandwidth / 1000) + "Kbps";
              button.addEventListener("click", () => {
                resetCalidad(params);
                button.classList.add("selected");
                calidad.enabled(true);
              });
              menu.appendChild(button);
            });
            // setInterval(() => {
            let auto = document.querySelector("#auto");
            document.querySelector("#auto").innerHTML = "Auto";

          }

          function removeSelected(params) {
            document.querySelector("#auto").classList.remove("selected");
            [...document.querySelectorAll(`.${params.class}`)].map((calidad) => {
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
        player.muted(true);
      }

      let url = "<?= $video_details['data']['file_url'] ?>";
      let type = "<?= $video_details['data']['is_drm_protected'] ?>";
      let token = "<?= $video_details['data']['token'] ?? null; ?>";
      loadMusic(url, type, token);
      // player.play();
      // isPlaying = true;
      // function change_bitrate(base_url){
      //   let val = $('#bit_rate option:selected').val();
      //   var time_ = player.currentTime();
      //   const sources = [{src: base_url+val, type: 'application/x-mpegURL'}];
      //   player.src(sources);
      //   player.one('loadedmetadata', function() {
      //       player.currentTime(time_);
      //   });
      //   player.play();
      //   isPlaying = true;
      // }

      $('.ch_bit').on('click', function() {
        let segment = $(this).data('url');
        var time_ = player.currentTime();

        player.src(sources);
        player.one('loadedmetadata', function() {
          player.currentTime(time_);
        });
        isPlaying ? playMusic() : pauseMusic();
      });

      play.addEventListener("click", () => {
        isPlaying ? pauseMusic() : playMusic();
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

      function matomo_live_audio(user, type, title, hits = 55) {
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

      // const playList = [
      //   {
      //     artist: "Post Malone",
      //     cover: "https://yildirimzlm.s3.us-east-2.amazonaws.com/post-malone-2.jpeg",
      //     musicName: "Rockstar ft. 21 Savage",
      //     musicPath: `https://yildirimzlm.s3.us-east-2.amazonaws.com/Post+Malone+-+rockstar+ft.+21+Savage+(Official+Audio).mp3`
      //   },
      //   {
      //     artist: "Unlike Pluto",
      //     cover: "https://yildirimzlm.s3.us-east-2.amazonaws.com/unlike-pluto.jpeg",
      //     musicName: "No Scrubs ft. Joanna Jones",
      //     musicPath: `https://yildirimzlm.s3.us-east-2.amazonaws.com/Unlike+Pluto+-+No+Scrubs+ft.+Joanna+Jones+(Cover).mp3`
      //   },
      //   {
      //     artist: "Post Malone",
      //     cover: "https://yildirimzlm.s3.us-east-2.amazonaws.com/circles.jpeg",
      //     musicName: "Circles",
      //     musicPath: `https://yildirimzlm.s3.us-east-2.amazonaws.com/Post+Malone+-+Circles+(Lyrics).mp3`
      //   },
      //   {
      //     artist: "Lil Nas X",
      //     cover: "https://yildirimzlm.s3.us-east-2.amazonaws.com/montero.jpeg",
      //     musicName: "MONTERO (Call Me By Your Name)",
      //     musicPath: `https://yildirimzlm.s3.us-east-2.amazonaws.com/Lil+Nas+X+-+MONTERO+(Call+Me+By+Your+Name)+(Lyrics).mp3`
      //   },
      //   {
      //     artist: "Post Malone",
      //     cover: "https://yildirimzlm.s3.us-east-2.amazonaws.com/post-malone-1.jpeg",
      //     musicName: "Better Now",
      //     musicPath: `https://yildirimzlm.s3.us-east-2.amazonaws.com/Post+Malone+-+Better+Now.mp3`
      //   }
      // ];
var lastPlay = 0;
      $(document).on("keyup", async (e) => {
        const playerVolume = player.volume();
        const playerCurrentTime = player.currentTime();
        switch (e.code) {
          case "Space":
            e.preventDefault();
            isPlaying ? pauseMusic() : playMusic();
            break;
          case "ArrowUp":
            e.preventDefault();
            player.muted(false);
            player.volume(playerVolume + 0.1);

            break;
          case "ArrowDown":
            e.preventDefault();
            player.volume(playerVolume - 0.1);
            break;
          case "KeyM":
            e.preventDefault();
            if (player.muted()) {
              player.muted(false);
            } else {
              player.muted(true);
            }
            break;

          default:
            return;
        }
      });

      function playMusic(){
        try{
          player.play();
        }catch(error){
          player.pause();
        }
        if(lastPlay == 0){
          lastPlay = 10;
          queueTrackingData('trackEvent', ["LiveRadio", "Play", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>"]);
        queueTrackingDataWithDelay('trackContentInteraction', ["LiveRadio" + '/' + "Play", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],100);
        queueTrackingDataWithDelay('trackContentImpression', ["<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],200);
         
        //   queueTrackingDataWithDelay('trackEvent', ["LiveRadio", "Play", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>"],30);
        // queueTrackingDataWithDelay('trackContentInteraction', ["LiveRadio" + '/' + "Play", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],100);
        // queueTrackingDataWithDelay('trackContentImpression', ["<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],200);
         }else{
             queueTrackingDataWithDelay('trackEvent', ["LiveRadio", "Resume", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>"],0);
        queueTrackingDataWithDelay('trackContentInteraction', ["LiveRadio" + '/' + "Resume", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],100);
        queueTrackingDataWithDelay('trackContentImpression', ["<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],200);
         }
        var current = new Date().getTime();
        //player.currentTime(current);
        imgElement.src = '<?= base_url('assets/images/pause_icon.svg') ?>';
        isPlaying = true;
        fadeInCover();
        musicCard.classList.add("middle-weight");
        setTimeout(() => {
          musicCard.classList.remove("middle-weight");
        }, 200);
      };

      function changePlayPauseIcon(){
        if(!player.paused()){
          imgElement.src = '<?= base_url('assets/images/pause_icon.svg') ?>';
        }else{
          imgElement.src = '<?= base_url('assets/images/play_icon.svg') ?>';
        }
      }

      const pauseMusic = () => {
        player.pause();
        queueTrackingDataWithDelay('trackEvent', ["LiveRadio", "Pause", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>"],0);
        queueTrackingDataWithDelay('trackContentInteraction', ["LiveRadio" + '/' + "Pause", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],100);
        queueTrackingDataWithDelay('trackContentImpression', ["<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],200);

        imgElement.src = '<?= base_url('assets/images/play_icon.svg') ?>';
        isPlaying = false;
        fadeInCover();
        musicCard.classList.add("middle-weight");
        setTimeout(() => {
          musicCard.classList.remove("middle-weight");
        }, 200);
      };




      const nextMusic = () => {
        player.currentTime(player.currentTime() + 20);
        // selectedMusic = (selectedMusic + 1) % playList.length;
        // loadMusic(playList[selectedMusic]);
        // music.duration = 0;
        // if (isPlaying) {
        //   music.play();
        // }
        // musicCard.classList.add("right-weight");
        // progressBar.style.width = `0%`;
        // setTimeout(() => {
        //   musicCard.classList.remove("right-weight");
        // }, 200);
      };

      const prevMusic = () => {
        player.currentTime(player.currentTime() - 20);
        // selectedMusic = (selectedMusic - 1 + playList.length) % playList.length;
        // loadMusic(playList[selectedMusic]);
        // if (isPlaying) {
        //   music.play();
        // }
        // musicCard.classList.add("left-weight");
        // progressBar.style.width = `0%`;
        // setTimeout(() => {
        //   musicCard.classList.remove("left-weight");
        // }, 200);
      };



      const fadeInCover = () => {
        musicCover.classList.add("animate");
        setTimeout(() => {
          musicCover.classList.remove("animate");
        }, 300);
      };

      // Update progress
      const updateProgress = (e) => {
        //const { duration, currentTime } = e.srcElement;
        const duration = player.duration();
        const currentTime = player.currentTime();
        const progressPercent = (currentTime / duration) * 100;
        //progressBar.style.width = `${progressPercent}%`;

        // if (progressPercent == 100) {
        //   setTimeout(() => {
        //     //nextMusic();
        //   }, 500);
        // }
      };

      player.on('ended', function(event) {
        pauseMusic();
      });

      setTimeout(() => {   
        player.play();           
        changePlayPauseIcon();
        var calidades = player.tech().hls.representations();
        crearBotonesCalidades({
          class: "vjs-menu-item",
          calidades: calidades,
          // father: player.controlBar.el_,
        }, calidades);
      }, 400);


      player.on('timeupdate', function(event) {
        updateProgress(event);
        setMusicTime(event);
        var check_time = localStorage.getItem('guestPlayTimea' + temp);
        var startTime = Date.now();
        let session = "<?= $this->session->id ?>";
        var Ctime = 3;
        free_time = 10;
        is_free = 1;
        lastPlay = 10;
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
          }).then(async (result) => {
            var redirect_url = '';
            if (result.value) {
              redirect_url = "<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>"
              // matomo('Page', 'View', 'LoginPopup');
              queueTrackingDataWithDelay('trackEvent', ["Page", 'View', "LoginPopup"],0);

              await set_userdata(redirect_url);
              //window.location.href = "<?= base_url('user-login') ?>";
              player.pause();
              urls_call('user-login');
            } else if (result.dismiss) {
              // matomo('Page', 'View', 'CancelPopup');
              queueTrackingDataWithDelay('trackEvent', ["Page", 'View', "CancelPopup"],0);

              // await set_userdata(redirect_url);
              pauseMusic();
              //urls_call('pb_live');
            }
          });
        }
      });

      // Set progress
      function setProgress(e) {
        const width = this.clientWidth;
        const setPoint = e.offsetX;
        const duration = player.duration();
        player.currentTime((setPoint / width) * duration);
      }

      // Set time area
      const setMusicTime = (e) => {
        // var { duration, currentTime } = e.srcElement;
        const duration = player.duration();
        const currentTime = player.currentTime();
        if (duration == NaN) {
          duration = 0;
        }
        // calcSongTime(duration, musicDurationTime);
        // calcSongTime(currentTime, musicCurrentTime);
      };

      const calcSongTime = (time, selectTime) => {
        time = Number(time);
        const m = Math.floor((time % 3600) / 60);
        const s = Math.floor((time % 3600) % 60);
        if (m < 10) {
          minute = "0" + m;
        } else minute = m;
        if (s < 10) {
          second = "0" + s;
        } else second = s;

        return (selectTime.textContent = `${minute}:${second}`);
      };

      next.addEventListener("click", nextMusic);
      prev.addEventListener("click", prevMusic);
      // music.addEventListener("timeupdate", updateProgress);
      // music.addEventListener("timeupdate", setMusicTime);
      progressZone.addEventListener("click", setProgress);

      function cardAnimate(e) {
        this.querySelectorAll(".music-card").forEach(function(boxMove) {
          const x = -(window.innerWidth / 3 - e.pageX) / 90;
          const y = (window.innerHeight / 3 - e.pageY) / 30;
          boxMove.style.transform = "rotateY(" + x + "deg) rotateX(" + y + "deg)";
        });
      }
    </script>

    <script>
      $(document).ready(function() {
        $('.ad_seeting ul li').click(function() {
          $('.ad_seeting ul li').removeClass('selected_ad');
          $(this).addClass('selected_ad');
        });

        setTimeout(() => {
          // $('#play').trigger('click');
          $('#prev').trigger('click');
        }, 500);
      });
    </script>


    <?php if (isset($video_details['data']['similar']) && !empty($video_details['data']['similar'])) { ?>
      <section class=" py-5">
        <div class="container-fluid">
          <div class="row mt-2 mts-34">
            <h6 class="defaultColr mt-2 mb-4 ms-3 pl_5 delayed-element d-block"><?= $this->lang->line("similar_channel") ?></h6>
          </div>

          <div class="carousel_bott owl-carousel owl-theme pt-4 liveVedioArrow banner-place" style="display:none;">
            <?php if (isset($content_details['data']['similar']) && !empty($content_details['data']['similar'])) {
              foreach ($content_details['data']['similar'] as $res) {
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
            <?php if (isset($content_details['data']['similar']) && !empty($content_details['data']['similar'])) {
              foreach ($content_details['data']['similar'] as $res) {
                // pre($res);
                $id = aes_cbc_encryption_($res['id']);
            ?>
                <div class="cardDetails shadow card_hover_item videoCard" data-id="<?= $res['id'] ?>">
                  <a href="<?= site_url('pb_live_details?id=' . $id.'&type=radio'); ?>">
                    <div class="pb_card">
                      <div class="pb_img">
                        <img src="<?= $res['poster_url']; ?>" class="img-fluid" alt="poster image">
                      </div>

                    </div>
                  </a>
                  <?php if ($res['still_live'] == 1) { ?>
                    <a href="javascript:void();" class="pb_live_ch">
                      <img src="<?= base_url('assets/images/newlive1.gif'); ?>" class="img-fluid" alt="live icon">
                    </a>
                  <?php } ?>
                </div>
            <?php }
            } ?>

          </div>
        </div>
      </section>

    <?php } ?>

  <?php } else { ?>
    <div class="col-md-6 m-auto text-center watchListNo">
      <div class="no_dt_found">
        <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
        <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
        <!-- <p class="mb-0 text_ac"><?//= NoListFound; ?></p> -->
      </div>
    </div>
  <?php } ?>

  <?php //$trick_play = (json_decode(($video_details['data']['trick_play'] ?? ''), TRUE));
  if (!empty($trick_play)) {

    //$trick_url = $trick_play['url'];

  ?>
  <?php
    // $url = $trick_url;

    // $newUrl = str_replace('trick_play_images.zip', '', $url);
    // $finalUrl = $newUrl . "Thumbnail_{index}.jpg";
  } else {
    $finalUrl = '';
  }
  ?>

  <script src="<?= base_url() ?>assets/website_assets/js/sprite_thumb.js"></script>

  <script>
    $('.likeAudio').click(function() {
      var activity = 1;
      var tooltip = '<?= $this->lang->line("added_lang") ?>';
      if ($('.notlikebtn').hasClass("d-none")) {
        queueTrackingDataWithDelay('trackEvent', ["LiveRadio", "Unfavourite", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>"],30);
        queueTrackingDataWithDelay('trackContentInteraction', ["LiveRadio" + '/' + "Unfavourite", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],60);
        queueTrackingDataWithDelay('trackContentImpression', ["<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],90);


        activity = 3;
        tooltip = '<?= $this->lang->line("favourite_lang") ?>';
      } else {
        queueTrackingDataWithDelay('trackEvent', ["LiveRadio", "Favourite", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>"],30);
        queueTrackingDataWithDelay('trackContentInteraction', ["LiveRadio" + '/' + "Favourite", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],60);
        queueTrackingDataWithDelay('trackContentImpression', ["<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ?? "-" ?>'],90);

        
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
      updateFavouriteCache(favKey1, data, activity);
      $("#overlayonajaxhit").addClass('d-none');
      $('.likeAudio').attr('tooltip', tooltip)
      $('.likeMedia').toggleClass('d-none');
    })
  </script>

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

            if (data.status == true && data.file_url != '') {
              // $('#my-audio-div').html('<audio id="my_video" class="video-js" poster="'+data.poster_url+'" controls></audio>');
              // if (data.drm == 1) {
              // loadMusic(data.file_url,data.poster_url,1,data.token);                
              // }else{                
              // loadMusic(data.file_url,data.poster_url,0);
              // }              
              // $('.cover-img').html('');
              // $('#cover-'+data.id).html('<p class="pb-audio_pl h7"><span class="pb_audio_txt">Now Playing</span></p>');

              // music.duration = 0;
              // if (isPlaying) {
              //   music.play();
              // }
              // musicCard.classList.add("right-weight");
              // progressBar.style.width = `0%`;
              // setTimeout(() => {
              //   musicCard.classList.remove("right-weight");
              // }, 200);
            }
          }
        })
      }
    })
    // function getBrowserName() {
    //   var userAgent = navigator.userAgent;
    //   var browserName = "Unknown";

    //   if (userAgent.indexOf("Chrome") != -1) {
    //     browserName = "Google Chrome";
    //   } else if (userAgent.indexOf("Firefox") != -1) {
    //     browserName = "Mozilla Firefox";
    //   } else if (userAgent.indexOf("Safari") != -1) {
    //     browserName = "Apple Safari";
    //   } else if (userAgent.indexOf("Edge") != -1) {
    //     browserName = "Microsoft Edge";
    //   } else if (userAgent.indexOf("MSIE") != -1 || userAgent.indexOf("Trident/") != -1) {
    //     browserName = "Internet Explorer";
    //   }
    //   return browserName;
    // }


    // function play_paused(arg) {
    //   if (arg == true) {
    //     console.log(arg, 'if')
    //     $('.vjs-big-play-button').addClass('d-block').removeClass('d-none')
    //     $('.vjs-big-pausedm').removeClass('d-block').addClass('d-none')
    //   } else {
    //     console.log(arg, 'else')
    //     $('.vjs-big-play-button').removeClass('d-block').addClass('d-none')
    //     $('.vjs-big-pausedm').addClass('d-block').removeClass('d-none')
    //   }

    //   setTimeout(function() {
    //     $('.vjs-big-play-button').removeClass('d-block').addClass('d-none')
    //     $('.vjs-big-pausedm').removeClass('d-block').addClass('d-none')
    //   }, 500)
    // }


    // let player = videojs("my-video", {}, () => {

    //   player.one("loadedmetadata", () => {




    //     var browser_language, track_language, audioTracks;
    //     // +++ Get the browser language +++
    //     browser_language = navigator.language || navigator.userLanguage; // IE <= 10
    //     browser_language = browser_language.substr(0, 2);

    //     // +++ Get the audio tracks +++
    //     audioTracks = player.audioTracks();
    //     console.log("aaaaaaaa" + audioTracks);

    //     // +++ Loop through audio tracks +++
    //     for (var i = 0; i < audioTracks.length; i++) {
    //       track_language = audioTracks[i].language.substr(0, 2);

    //       // +++ Set the enabled audio track language +++
    //       if (track_language) {
    //         // When the track language matches the browser language, then enable that audio track
    //         if (track_language === browser_language) {
    //           // When one audio track is enabled, others are automatically disabled
    //           audioTracks[i].enabled = true;
    //         }
    //       }
    //     }


    //     $('.vjs-text-track-display div').addClass('sliding-text').text("<?= $video_details['data']['title']; ?>")

    //     player.on('play', function() {
    //       $('.next-episode-in-10').hide();
    //       play_paused(true)
    //     });




    //     player.spriteThumbnails({
    //       url: '<?= $finalUrl ?>',
    //       width: 250,
    //       height: 150,
    //       columns: 7,
    //       rows: 7
    //     });





    //     // Event listener for when the video is paused
    //     player.on('pause', function() {
    //       console.log('Video is paused');
    //       play_paused(false)
    //     });

    //     $(document).on('click', '.vjs-big-pausedm', function() {
    //       player.play();
    //     })
    //     $(document).on('click', '.vjs-big-play-button', function() {
    //       player.pause();
    //     });


    //     function getVolumePercentage() {
    //       return Math.round(myVideo.volume() * 100);
    //     }

    //     function displayVolume() {
    //       var volumeDisplay = $('.voll');
    //       volumeDisplay.innerText = getVolumePercentage() + '%';
    //     }


    //     player.on('timeupdate', function() {
    //       var Ctime = Math.ceil(player.currentTime());
    //       var t_time = Math.ceil(player.duration());

    //       var skip_time = 40;

    //       var timeDifference = t_time - Ctime;
    //       if (timeDifference > 0 && timeDifference <= 10) {
    //         // alert(timeDifference);
    //         $('.next-episode-in-10').show();
    //         $('.next-episode-in-10').html(`Playing Episode 1 in ${timeDifference}`);

    //       } else {
    //         $('.next-episode-in-10').hide();
    //       }

    //       if (Ctime > 0 && Ctime < skip_time) {
    //         $("#skipvalue").hide();
    //       } else {
    //         $("#skipvalue").hide();
    //       }
    //       <?php
              //       $sarthakl = 241; //$video_details['data']['episodes'][0]['type_id'];

              //       if ($sarthakl == 241) {
              //       
              //
              ?>

    //         var html = `<a  class="btn" href="<?= base_url('play-episode?id=' . @$shubham . '&&type_id=' . @$sarthak); ?>"> Play Episode 1 </a>`;
    //       <?php
              //       } else {

              //       
              //
              ?>
    //         $('.play_ep_btn').remove();



    <?php //} 
    ?>

    $('.back-buttontt').click(function(e) {
      e.preventDefault();
      queueTrackingData('trackEvent', ["LiveRadio", "Stop", '<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>']);
      queueTrackingDataWithDelay('trackContentInteraction', ["LiveRadio" + '/' + "Stop", '<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>', '<?= ($content_details['data']['genres']) ?? "-"?>'],100);
      queueTrackingDataWithDelay('trackContentImpression', ['<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>', '<?= ($content_details['data']['genres']) ?? "-"?>'],200);
      if(document.referrer !=''){
          window.history.back();
      }else{
          window.location.href = "<?= base_url() ?>";
      }
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#copyBtn").click(function() {
        // Select the text in the input field
        var copyText = $("#inputText");
        var copyButton = $('#copyBtn');
        copyText.val();
        navigator.clipboard.writeText(copyText.val());

        document.execCommand('copy');
        $('#copyBtn').html('<?= $this->lang->line('copied') ?>')
        $('.bg_btn_color').addClass('copy_share_btn');
        //Swal.fire('Link Copied ', '', 'success');
        $("#share_btn").modal('hide');
        setTimeout(function() {
          copyButton.html('<?= $this->lang->line('copy') ?>'); // Change 'Copy' to the original text you want to display
          $('.bg_btn_color').removeClass('copy_share_btn');
        }, 2000);

      });

    });
    $(document).on('click', function(event) {
      if ((!$(event.target).closest('.share_btn_icon1').length) && (!$(event.target).closest('.share_hl_popup').length)) {
        // if (!$('.share_hl_popup').hasClass('d-none')) {
        $('.share_hl_popup').addClass('d-none');
        $('#copyBtn').html('<?= $this->lang->line('copy') ?>');
        // }
      }
      //$(".share_hl_popup").addClass("d-none");
    });

    // $(".share_btn_icon1").click(function() {
    //   $(".share_hl_popup").toggleClass("d-none");
    //   $('.share_btn_icon1').attr('tooltip', '');
    // })

    // $(".share_btn_icon1").click(function() {

    //   $(".share_hl_popup").toggleClass("d-none");
    //   $('.').attr('tooltip', '');
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


    $(document).ready(function() {

      // Add event listener to the subtitles button
      $(document).on('click', '.vjs-button', function() {
        var menu = $(this).next('.vjs-menu');
        menu.removeClass('vjs-lock-showing');
      });

    });

    // $(document).ready(function() {
    //   $('#seek-next').click(function() { 
    //     alert("sdce");
    //     var id = '<?=$video_details['data']['id'];?>'
    //     if (id != 0 || id != "") {
    //       matomo("Live Radio", 'Next', id + '/' + "<?php echo $video_details['data']['title'] ?>",
    //         5);
    //     } else {
    //       matomo("Live Radio", 'Next', "<?php echo $video_details['data']['title'] ?>",
    //         5);

    //     }
    //   });
    // });

 $(document).on('click', '#seek-next', function() {
  var id = '<?=$video_details['data']['id'];?>'
  if (id != 0 || id != "") {
  //  queueTrackingDataWithDelay('trackEvent', ["Live Radio", "Next", id + '/' + "<?php echo $video_details['data']['title'] ?>"],0);
  } else {
   // queueTrackingDataWithDelay('trackEvent', ["Live Radio", "Next",  "<?php echo $video_details['data']['title'] ?>"],0);
  }
});

$(document).on('click', '#seek-prev', function() {
  var id = '<?=$video_details['data']['id'];?>'
    if (id != 0 || id != "") {
    //  queueTrackingDataWithDelay('trackEvent', ["Live Radio", "Previous", id + '/' + "<?php echo $video_details['data']['title'] ?>"],0);
    } else {
    //  queueTrackingDataWithDelay('trackEvent', ["Live Radio", "Previous", "<?php echo $video_details['data']['title'] ?>"],0);
    }
});

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

    function copy_link() {
      queueTrackingDataWithDelay('trackEvent', ["LiveRadio", "Share", "<?= $content_details['data']['id'] . '/' . $content_details['data']['title'] ?>"],0);
      queueTrackingDataWithDelay('trackContentInteraction', ["Share" + '/' + "LiveRadio", "<?= $content_details['data']['id'] . '/' . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ??"-" ?>'],100);
      queueTrackingDataWithDelay('trackContentImpression', ["<?= $content_details['data']['id'] . '/' . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ??"-" ?>'],200);

    }

    let isScrolledToTop = false;      
    function handleKeyEvent(event) {
        if (event.key === ' ' || event.keyCode === 32 || event.target.id === 'prev' || event.target.id === 'seek-prev' || event.target.id === 'seek-next' || event.target.id === 'next') {
            event.preventDefault(); 

            if (!isScrolledToTop) {
                window.scrollTo({ top: 0, behavior: 'smooth' }); 
                isScrolledToTop = true; 
            }
        }
    }
    window.addEventListener('keydown', handleKeyEvent);


$(window).on('load', function() {
  queueTrackingData('trackEvent', ["LiveRadio", "Selected", "<?= $content_details['data']['id'] . "/" . $content_details['data']['title'] ?>"]);

  })

//  $(document).ready(function() {
//     // Toggle quality menu on cog icon click
//     $(document).on('click', '.vjs-icon-cog', function(event) {
//         event.stopPropagation(); // Prevent click from bubbling to the document click handler

//         var menu = $(this).next('.qualitymenu');

//         // Ensure all other menus are hidden first
//         $('.qualitymenu').removeClass('d-block').addClass('d-none');

//         // Add 'd-block' on first click if it's hidden
//         if (menu.hasClass('d-none')) {
//             menu.removeClass('d-none').addClass('d-block'); // Show the clicked menu
//         } else {
//             menu.removeClass('d-block').addClass('d-none'); // Hide if it's visible
//         }
//     });

//     // Hide the quality menu when clicking outside of the menu and icon
//     $(document).on('click', function(event) {
//         if (!$(event.target).closest('.vjs-icon-cog, .qualitymenu').length) {
//             // If the click is outside the icon or menu, hide all quality menus
//             $('.qualitymenu').removeClass('d-block').addClass('d-none');
//         }
//     });
// });

function matomo_event(type){
queueTrackingDataWithDelay('trackEvent', ["LiveRadio", "Share", "<?= $content_details['data']['id'] . '/' . $content_details['data']['title'] ?>"],0);
queueTrackingDataWithDelay('trackContentInteraction', ["Share" + '/' + "LiveRadio", "<?= $content_details['data']['id'] . '/' . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ??"-" ?>'],100);
queueTrackingDataWithDelay('trackContentImpression', ["<?= $content_details['data']['id'] . '/' . $content_details['data']['title'] ?>",'<?= ($content_details['data']['genres']) ??"-" ?>'],200);

}
  </script>

</body>

</html>