<style>
    .video_hv_page {
        height: 100vh;
        background: #fff;
    }

    .page-wrapper {
        background: #fff;
        height: 100vh;
    }

    .page-wrapper .page-content {
        overflow-x: hidden;
    }

    #show-sidebar {
        position: fixed;
        right: 0;
        top: 4px;
        background: #ff9700;
        color: #fff;
        border-radius: 4px;
        width: 35px;
        transition-delay: 0.3s;
        z-index: 1;
    }

    .page-wrapper.toggled .sidebar-wrapper {
        right: 0px;
    }

    .page-wrapper.toggled #show-sidebar {
        right: -40px;
    }

    .sidebar-wrapper {
        width: 260px;
        height: 100%;
        max-height: 100%;
        position: fixed;
        top: 0;
        right: -300px;
        z-index: 999;
        background: #fff;
    }

    .sidebar-content {
        overflow-y: auto;
        position: relative;
    }

    .sidebar-wrapper .sidebar-brand #close-sidebar {
        cursor: pointer;
        font-size: 20px;
        display: flex;
        justify-content: end;
        color: #000;
    }

    .lineragradienttop {
        background: #fff !important;
        background-image: none !important;
    }

    .bg-white {
        background-color: #fff !important;
    }

    .border-bottom {
        border-bottom: 1px solid #e3e6f0 !important;
    }

    .searchInput {
        color: #121212;
        font-size: 12px;
    }

    .md-checkbox {
        position: relative;
        margin-right: 10px;
        margin-top: 5px;
        text-align: left;
        min-height: 30px;
    }

    .md-checkbox input[type="checkbox"] {
        outline: 0;
        visibility: hidden;
        width: 1.25em;
        margin: 0;
        display: block;
        float: left;
        font-size: inherit;
    }

    .md-checkbox label:before {
        width: 1.05em;
        height: 1.05em;
        background: #fff;
        border: 2px solid rgba(0, 0, 0, 0.54);
        border-radius: 0.125em;
        cursor: pointer;
    }

    .md-checkbox label:before,
    .md-checkbox label:after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
    }

    .md-checkbox label {
        cursor: pointer;
        display: inline;
        line-height: 1.25em;
        vertical-align: top;
        clear: both;
        padding-left: 1px;
    }

    .md-checkbox label:not(:empty) {
        padding-left: 0.75em;
    }

    .md-checkbox input[type="checkbox"]:checked+label:before {
        background: #ff9700;
        border: none;
    }

    .md-checkbox input[type="checkbox"]:checked+label:after {
        transform: translate(0.25em, 0.3365384615em) rotate(-45deg);
        width: 0.55em;
        height: 0.275em;
        border: 0.125em solid #fff;
        border-top-style: none;
        border-right-style: none;
    }

    .video-wrapper {
        float: left;
        padding: 2px;
    }

    .maindiv video {
        width: 100%;
        height: auto !important;
        margin-bottom: 0 !important;
        border-radius: 0 !important
    }

    .page-wrapper.toggled .page-content {
        padding-right: 250px;
    }

    .md-checkbox label span {
        color: #444;
        font-size: 12px;
        font-stretch: normal;
        font-style: normal;
        font-weight: 400;
        letter-spacing: normal;
        top: -2px;
        line-height: 1.4;
        position: absolute;
        text-align: left;
        width: 90%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .vds_botton_btn .vds_play_btn {
        background: #ff9700;
        font-size: 14px;
        color: #fff;
        padding: 4px 10px;
        border-radius: 5px;

    }

    .vds_botton_btn {
        text-align: center;
        background: #ccc;
        padding: 2px;
        margin-top: 0px;
    }

    .shorts_dets_li{
        background:darkgray;
    }
    .shaka-controls-container{
        display:none !important;
    }
</style>


<section class="page-wrapper chiller-theme">
    <a id="show-sidebar" class="btn btn-sm" href="#">
        <i class="fas fa-chevron-left"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand pt-2 pb-1">
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>

            <!-- sidebar-search  -->
            <ul class="w-100 h-100 bg-white">
                <div class="cost_explore_DataFilter">
                    <div class="pb-2 ps-2 pe-1  border-bottom">
                        <div class="wrappersClas">
                            <span class="filterData">
                                <select class="live-channels form-control searchBarFilter" multiple id="channelSelect" style="width: 100%;">
                                    <option value="-1" selected>all</option>
                                    <?php $sn = 0; foreach ($live['data']['channels'] as $key => $value) { ++$sn; ?>
                                        <option value="<?= $value['id'] ?>"><?= $sn.". ".$value['title'] ?></option>
                                    <?php } ?>
                                </select>

                            </span>
                        </div>
                    </div>
                </div>
            </ul>

            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->

    </nav>
    <main class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 disp_video_dt">
                    <div class="vidall row" id="videowall">
                        <?php foreach ($live['data']['channels'] as $key => $value) { ?>
                                <div class="shorts_img channel-element-<?=$value['id']?>" >
                                    <div class="shorts_para">
                                        <img src="<?=$value['poster_url']?>" class="img-fluid as4" alt="<?=$value['title']?>" id="feedImg-<?=$value['id']?>">
                                        <div class="video-container position-relative " id="video-container-<?=$value['id']?>">
                                            <video class="img-fluid as4 mb-0" poster="<?=$value['poster_url']?>" id="feedElement-<?=$value['id']?>" disablepictureinpicture muted=""></video>
                                            <div class="volume_banner_dt" id="mute-toltip-<?=$value['id']?>">
                                                <a href="javascript:void(0);" data-valumetype="card" class="homeFeed_volume card_volume d-block" data-id="<?=$value['id']?>">
                                                    <img id="mute-icn-<?=$value['id']?>" src="<?=base_url('assets/images/mute.svg')?>" alt="mute" class="img-fluid">
                                                </a>
                                            </div>
                                        <!-- <input type="range" id="feedSeekBar" value="0" max="100" style="width: 100%;"> -->
                                        </div>
                                    </div>
                                    <div class="shorts_dets_li">
                                        <div class="shorttxt d-flex align-items-center">
                                            <a href="javascript:void(0)">
                                                <h4><?=($key+1   ).'. '.$value['title']?></h4>
                                            </a>
                                            <div class="play-channel" data-id="<?=$value['id']?>" data-title="<?=$value['title']?>" data-poster_url="<?=$value['poster_url']?>">
                                                <span class="vds_play_btn"><i class="fas fa-play"></i></span>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                        <?php } ?>  
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/controls.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" />
<script src="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/shaka-player.ui.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/shaka_ui.js') ?>"></script>
<script>
    var player = {};
    var browser = "<?= $DeviceType ?? 1 ?>";;
    async function initialize_player(channel_id, channel_details){
        let videoElement = document.getElementById('feedElement-'+channel_id);
        let videoContainer = document.getElementById("video-container-"+channel_id);
        let playerInstance = new shaka.Player(videoElement);
        shaka.polyfill.installAll();
        const ui = new shaka.ui.Overlay(playerInstance, videoContainer, videoElement);
        const controls = ui.getControls();
        controls.configure({
            controlPanelElements: [] // An empty array removes all controls
        });
        const container = controls.getServerSideAdContainer();
        const netEngine = playerInstance.getNetworkingEngine();
        const adManager = playerInstance.getAdManager();
        adManager.initMediaTailor(container, netEngine, videoElement);
        var mediaTailorAdsParams = {};
        if(channel_details.data.adParams && Object.keys(channel_details.data.adParams).length > 0){
            mediaTailorAdsParams = {
                "adsParams": channel_details.data.adParams
            };
        }else{
            mediaTailorAdsParams = {
                "adsParams": {}
            };
        }
        const HLSmanifestUri = channel_details.data.file_url;
        const file_url = channel_details.data.file_url;
        var fairplayCertUri = "https://license-global.pallycon.com/ri/fpsKeyManager.do?siteId=2LSX";
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
          playerInstance.configure({
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

          playerInstance.getNetworkingEngine()
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

          playerInstance.getNetworkingEngine()
          .registerRequestFilter(function(type, request) {
            if (type == shaka.net.NetworkingEngine.RequestType.LICENSE) {
              const originalPayload = new Uint8Array(request.body);
              const base64Payload = shaka.util.Uint8ArrayUtils.toBase64(originalPayload);
              const params = 'spc=' + encodeURIComponent(base64Payload);
              request.body = shaka.util.StringUtils.toUTF8(params);
              request.headers['Content-Type'] = 'application/x-www-form-urlencoded';
              request.headers["pallycon-customdata-v2"] = channel_details.data.token;
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
          playerInstance.configure({
            drm: drmConfig,
            streaming: {
              autoLowLatencyMode: true
            }
          });

          playerInstance.getNetworkingEngine()
          .registerRequestFilter(function(type, request) {
            if (type == shaka.net.NetworkingEngine.RequestType.LICENSE) {
              request.headers["pallycon-customdata-v2"] = channel_details.data.token;
            }
          });
        }
        if(channel_details.data.adEnabled){
            var uri = await adManager.requestMediaTailorStream(channel_details.data.file_url, mediaTailorAdsParams);
        }else{
            var uri = HLSmanifestUri;
        }
        videoElement.autoplay = true;
        videoElement.muted = true;        
        player[channel_id] = playerInstance;
        await playerInstance.load(uri)
        .then(function(res) {
            videoElement.play()
            .then(function() {
                videoElement.addEventListener('play', function() {

                });
            }).catch(function(error) {
                videoElement.muted = true;
                videoElement.play();
            });            
            manage_mute_icon(channel_id);
        })
        .catch((err)=>{
            toastr.error('Video not available for '+channel_details.data.title)
        })
    }

    function manage_mute_icon(channel_id,action='show'){
        let currentElement = player[channel_id].getMediaElement();
        if(currentElement && action=='show'){
            $('#mute-toltip-'+channel_id).css('display','block');
        }else{
            $('#mute-toltip-'+channel_id).css('display','none');
        }

        currentElement.addEventListener('play', function(){
            currentElement.currentTime=Date.now();
            $(currentElement.closest('.shorts_para'))
                            .siblings('.shorts_dets_li')
                            .find('.fas.fa-play')
                            .removeClass('fa-play')
                            .addClass('fa-pause');
        });

        currentElement.addEventListener('pause', function(){
            $(currentElement.closest('.shorts_para'))
                            .siblings('.shorts_dets_li')
                            .find('.fas.fa-pause')
                            .removeClass('fa-pause')
                            .addClass('fa-play');
        });

        $('#mute-toltip-'+channel_id).click(function(){
            if(currentElement.muted){
                currentElement.muted = false;
                $('#mute-icn-'+channel_id).attr('src',"<?=base_url('assets/images/unmute.svg')?>");
            }else{
                currentElement.muted = true;
                $('#mute-icn-'+channel_id).attr('src',"<?=base_url('assets/images/mute.svg')?>");
            }
        })
    }

    function manage_visibility(){
        if(player){   
            Object.entries(player).forEach((item,key)=>{
                if($('.channel-element-'+item[0]).hasClass('d-none')){
                    player[item[0]].getMediaElement().pause();
                }
            })
        }
    }

    $(document).ready(function(){
        $('#channelSelect').select2({
            placeholder: "Select channels",
            allowClear: true,
            width: '100%',
            closeOnSelect: false
        });

        $('#channelSelect').on('change', function () {
            let selectedValues = $(this).val();
            if (selectedValues.includes('-1')) {
                $('.shorts_img').removeClass('d-none');
                return false;
            }
            $('.shorts_img').addClass('d-none');
            selectedValues.forEach((item)=>{
                $('.channel-element-'+item).removeClass('d-none');
            });
            manage_visibility();
        });

        $('.play-channel').click(function(){
            let channel_id = $(this).data('id');
            if(player[channel_id]){
                if(player[channel_id].getMediaElement().paused){
                    player[channel_id].getMediaElement().play();
                }else{
                    player[channel_id].getMediaElement().pause();
                }
                return false;
            }
            if(channel_id){
                $.ajax({
                    url:"<?= base_url('web/player/channel_details') ?>",
                    type:"post",
                    data:{channel_id},
                    success:function(response){
                        var res = JSON.parse(response);
                        if(res.status && res.data){
                            $('#feedImg-'+channel_id).addClass('d-none');
                            $('#feedElement-'+channel_id).removeClass('d-none');
                            initialize_player(channel_id,res);
                        }
                    }
                })
            }
        })
    });
    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
        $(".maindiv").removeClass("col-lg-3");
    });
    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");

        $(".maindiv").addClass("col-lg-3");
    });
    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");

    });
    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");

    });
    $(document).ready(function() {
        // $(".vds_play_btn").click(function() {
        //     var currentIcon = $(this).find("i").attr("class");

        //     if (currentIcon.includes("fa-play")) {
        //         // Change the icon to pause
        //         $(this).find("i").removeClass("fas fa-play").addClass("fas fa-pause");
        //     } else if (currentIcon.includes("fa-pause")) {
        //         // Change the icon back to play
        //         $(this).find("i").removeClass("fas fa-pause").addClass("fas fa-play");
        //     }
        // });
    });
</script>