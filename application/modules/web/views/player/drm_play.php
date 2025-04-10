<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shaka Player Example</title>
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="https://qa.videocrypt.com/auth_assets/core/img/favicon.ico"
    />
    <!-- Shaka Player CSS and JS from CDN -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/controls.min.css"
    />
    <!-- <script src="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/shaka-player.compiled.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/shaka-player@4.10.9/dist/shaka-player.ui.js"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      video {
        width: 100%;
      }

      /* .shaka-backward-button::before {
        content: "⏪";
      }
      .shaka-forward-button::before {
        content: "⏩";
      } */
    </style>
  </head>
  <body>
    <div id="video-container" style="width: 640px">
      <video
        id="video"
        poster="//shaka-player-demo.appspot.com/assets/poster.jpg"
        autoplay
      ></video>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const videoElement = document.getElementById("video");
        const videoContainer = document.getElementById("video-container");
        const player = new shaka.Player(videoElement);
        window.player = player;
        // UI setup
        const ui = new shaka.ui.Overlay(player, videoContainer, videoElement);
        const controls = ui.getControls();
        // Configure custom buttons after controls are ready
        // forwardButton.js
        class ForwardButton extends shaka.ui.Element {
          constructor(parent, controls, player) {
            super(parent, controls);

            this.player_ = player;

            // The actual button that will be displayed
            this.button_ = document.createElement("button");
            this.button_.textContent = "⏩";
            this.button_.classList.add("shaka-forward-button");
            this.button_.classList.add("shaka-tooltip");
            this.button_.setAttribute("aria-label", "Forward 10 seconds");
            this.parent.appendChild(this.button_);

            // Listen for clicks on the button to seek 10s forward
            this.eventManager.listen(this.button_, "click", () => {
              videoElement.currentTime += 10;
            });
          }
        }

        // Factory that will create a button at run time.
        class ForwardButtonFactory {
          create(rootElement, controls, player) {
            return new ForwardButton(rootElement, controls, player);
          }
        }

        // Register our factory with the controls, so controls can create button instances.
        shaka.ui.Controls.registerElement(
          "forward",
          new ForwardButtonFactory()
        );
        // backwardButton.js
        class BackwardButton extends shaka.ui.Element {
          constructor(parent, controls, player) {
            super(parent, controls);

            this.player_ = player;

            // The actual button that will be displayed
            this.button_ = document.createElement("button");
            this.button_.textContent = "⏪";
            this.button_.classList.add("shaka-backward-button");
            this.button_.classList.add("shaka-tooltip");
            this.button_.setAttribute("aria-label", "Rewind 10 seconds");
            this.parent.appendChild(this.button_);

            // Listen for clicks on the button to seek 10s backward
            this.eventManager.listen(this.button_, "click", () => {
              videoElement.currentTime -= 10;
            });
          }
        }

        // Factory that will create a button at run time.
        class BackwardButtonFactory {
          create(rootElement, controls, player) {
            return new BackwardButton(rootElement, controls, player);
          }
        }

        // Register our factory with the controls, so controls can create button instances.
        shaka.ui.Controls.registerElement(
          "backward",
          new BackwardButtonFactory()
        );

        ui.configure({
          controlPanelElements: [
            "backward",
            "play_pause",
            "forward",
            "time_and_duration",
            "spacer",
            "volume",
            "mute",
            "language",
            "text_settings",
            "captions",
            "overflow_menu", // 3 dots inside quality speed and pip
            //"playback_rate",
            "cast",
            "lock",
            //"picture_in_picture",
            //"quality",
            "fullscreen",
          ],
          enableTooltips: true,
          // textTrackVisibility: true,

          // playbackRates: [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2],
          // fastForwardRates: [2, 4, 8, 1],
          // rewindRates: [-1, -2, -4, -8],
          // customContextMenu: true,
          // contextMenuElements: ["statistics"],
          // statisticsList: ["width", "height", "playTime", "bufferingTime"],
        });
        ui.getControls();

        async function fetchVideoDetails() {
          const api = "https://qa.videocrypt.com/getVideoDetailsDrm";
          const DRM = "3337410_0_8011227583004645";
          // const DRM = "3337408_0_2420575780383740";
          const formData = new FormData();
          formData.append("flag", 1);
          formData.append("name", DRM);

          return $.ajax({
            url: api,
            type: "POST",
            headers: {
              accessKey: "TTdBSlNPVVFWRUs0RzJORDY5SFA=",
              secretKey:
                "WHc3QmhnS0VSNUZBK1ZRQ29HWk1wc2M2UFMyYUltM2pmSFR5TGtPdg==",
              "Device-Type": 1,
              "User-Id": "10000097",
              "Device-Id": "10000097",
              Version: "2",
              "Device-Name": "ChromeCDM",
              "Account-Id": "10000097",
            },
            data: formData,
            processData: false,
            contentType: false,
          });
        }

        async function loadVideo() {
          try {
            const res = await fetchVideoDetails();
            const data = JSON.parse(res);
            // const dashUri =
            //   "https://d1wxh31cdpnls0.cloudfront.net/videoCrypt/video/download/vod_non_drm_ios/3336322/1720423139_1582676779078811/1720423090403_415695363755277200_video_VOD.m3u8"; // Multi-Language
            // const dashUri =
            //   "https://devstreaming-cdn.apple.com/videos/streaming/examples/img_bipbop_adv_example_fmp4/master.m3u8"; //caption subtitle
            const dashUri = '<?= $video_details['data']['file_url'] ?>';
            const token = '<?= ($video_details['data']['token']) ?? "" ?>';
            //console.log("Fetched Video Details:", data);
            var fairplayCertUri = 'https://license-global.pallycon.com/ri/fpsKeyManager.do?siteId=2LSX';
            var licenseURI =
            `<?= BASEURLAPI ?><?= BASEVERSION ?>onRequestCreateVideoLicense`;
            // Configure DRM and license request filters
            player.configure({
              drm: {
                servers: {
                  "com.widevine.alpha": licenseURI,
                  "com.microsoft.playready": licenseURI,
                },
                advanced: {
                  "com.apple.fps.1_0": {
                    serverCertificateUri: fairplayCertUri,
                  },
                },
              },
            });

            player
              .getNetworkingEngine()
              .registerRequestFilter(function (type, request) {
                // Only add headers to license requests:
                if (type == shaka.net.NetworkingEngine.RequestType.LICENSE) {
                  request.headers["pallycon-customdata-v2"] = token;
                }
              });

            // Load the video manifest
            await player.load(dashUri);
            console.log("The video has now been loaded!");
            // const Hindi =
            //   "https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/transcript/3336892/master_1718289064_20240613201348.vtt?v=1720512580";

            // const textTracks = [
            //   {
            //     uri: Hindi,
            //     language: "hi-IN", // Use 'language' instead of "lang" for consistency with Shaka Player API
            //     kind: "subtitles",
            //     mime: "text/vtt",
            //     label: "Hindi",
            //   },
            //   {
            //     uri: vttUrl,
            //     language: "en-IN", // Use 'language' instead of "lang" for consistency with Shaka Player API
            //     kind: "subtitles",
            //     mime: "text/vtt",
            //     label: "English",
            //   },
            // ];

            const Hindi = {
              uri: "sample.vtt",
              language: "hi-IN",
              kind: "subtitles",
              mime: "text/vtt",
              label: "Hindi",
            };

            console.log("Adding Hindi Track:", Hindi); // Check the URL in the console

            player
              .addTextTrackAsync(
                Hindi.uri,
                Hindi.language,
                Hindi.kind,
                Hindi.mime,
                Hindi.label
              )
              .then(() => {
                console.log("Hindi track added successfully!");
              })
              .catch((error) => {
                console.error("Error adding Hindi track:", error);
              });

            const audioTracks = player
              .getVariantTracks()
              .filter((track) => track.type === "variant");
            if (audioTracks.length > 0) {
              player.selectVariantTrack(audioTracks[0]); // Select first audio track
            }
          } catch (error) {
            console.error("Error loading manifest:", error);
          }
        }

        loadVideo();
      });
    </script>
  </body>
</html>