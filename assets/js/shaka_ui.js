


   // ForwardButton class
   class lockUnlock extends shaka.ui.Element {
    constructor(parent, controls, player) {
      super(parent, controls);
      this.player_ = player;
      this.button_ = $("<button>", {
        html: `<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,300,150" style="overflow: visible;">
<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(9.84615,9.84615)"><path d="M7,0c-2.21094,0 -4.12109,0.91797 -5.3125,2.40625c-1.19141,1.48828 -1.6875,3.41797 -1.6875,5.5v3.09375h3v-3.09375c0,-1.57812 0.39063,-2.82031 1.03125,-3.625c0.64063,-0.80469 1.51172,-1.28125 2.96875,-1.28125c1.46094,0 2.32813,0.44922 2.96875,1.25c0.64063,0.80078 1.03125,2.05859 1.03125,3.65625v1.09375h3v-1.09375c0,-2.09375 -0.52734,-4.04297 -1.71875,-5.53125c-1.19141,-1.48828 -3.07422,-2.375 -5.28125,-2.375zM9,10c-1.65625,0 -3,1.34375 -3,3v10c0,1.65625 1.34375,3 3,3h14c1.65625,0 3,-1.34375 3,-3v-10c0,-1.65625 -1.34375,-3 -3,-3zM16,15c1.10547,0 2,0.89453 2,2c0,0.73828 -0.40234,1.37109 -1,1.71875v2.28125c0,0.55078 -0.44922,1 -1,1c-0.55078,0 -1,-0.44922 -1,-1v-2.28125c-0.59766,-0.34766 -1,-0.98047 -1,-1.71875c0,-1.10547 0.89453,-2 2,-2z"></path></g></g>
</svg>`,
        class: "lockButton shaka-tooltip",
        "aria-label": "Lock",
      });

      $(this.parent).append(this.button_);
      this.locked = false;
      $(this.button_).on("click", () => {
        $(".shaka-backward-button").addClass("shaka-hidden");
        $(".shaka-forward-button").addClass("shaka-hidden");
        $(".UnlockButton").removeClass("shaka-hidden");
        $(".lockButton").addClass("shaka-hidden");
        $(".shaka-small-play-button").addClass("shaka-hidden");
        $(".shaka-current-time").addClass("shaka-hidden");
        $(".shaka-mute-button").addClass("shaka-hidden");
        $(".shaka-range-container").addClass("shaka-hidden");
        $(".shaka-overflow-menu-button").addClass("shaka-hidden");
        $(".shaka-range-container").css("display",'none');
        $(".shaka-overflow-button").addClass("shaka-hidden");
        $(".shaka-pip-button").addClass("shaka-hidden");
        $(".shaka-fullscreen-button").addClass("shaka-hidden");
      });
    }
  }
  class lockUnlockFactory {
    create(rootElement, controls, player) {
      return new lockUnlock(rootElement, controls, player);
    }
  }

  // Register the forward button with the controls
  shaka.ui.Controls.registerElement("lock_ui", new lockUnlockFactory());

  // ForwardButton class
  class Unlock extends shaka.ui.Element {
    constructor(parent, controls, player) {
      super(parent, controls);
      this.player_ = player;
      this.button_ = $("<button>", {
        html: `<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M25,3c-6.63672,0 -12,5.36328 -12,12v5h-4c-1.69922,0 -3,1.30078 -3,3v24c0,1.69922 1.30078,3 3,3h32c1.69922,0 3,-1.30078 3,-3v-24c0,-1.69922 -1.30078,-3 -3,-3h-4v-5c0,-6.63672 -5.36328,-12 -12,-12zM25,5c5.56641,0 10,4.43359 10,10v5h-20v-5c0,-5.56641 4.43359,-10 10,-10zM25,30c1.69922,0 3,1.30078 3,3c0,0.89844 -0.39844,1.6875 -1,2.1875v2.8125c0,1.10156 -0.89844,2 -2,2c-1.10156,0 -2,-0.89844 -2,-2v-2.8125c-0.60156,-0.5 -1,-1.28906 -1,-2.1875c0,-1.69922 1.30078,-3 3,-3z"></path></g></g>
</svg>`,
        class: "UnlockButton shaka-tooltip shaka-hidden",
        "aria-label": "Unlock",
      });

      $(this.parent).append(this.button_);
      this.locked = false;
      $(this.button_).on("click", () => {
        $(".shaka-backward-button").removeClass("shaka-hidden");
        $(".shaka-forward-button").removeClass("shaka-hidden");
        $(".UnlockButton").addClass("shaka-hidden");
        $(".lockButton").removeClass("shaka-hidden");
        $(".shaka-small-play-button").removeClass("shaka-hidden");
        $(".shaka-current-time").removeClass("shaka-hidden");
        $(".shaka-mute-button").removeClass("shaka-hidden");
        $(".shaka-range-container").removeClass("shaka-hidden");
        $(".shaka-overflow-menu-button").removeClass("shaka-hidden");
        $(".shaka-range-container").css("display",'block');
        $(".shaka-overflow-button").removeClass("shaka-hidden");
         $(".shaka-pip-button").removeClass("shaka-hidden");
         $(".shaka-fullscreen-button").removeClass("shaka-hidden");
      });
    }
  }
  class UnlockFactory {
    create(rootElement, controls, player) {
      return new Unlock(rootElement, controls, player);
    }
  }

  // Register the forward button with the controls
  shaka.ui.Controls.registerElement("Unlock_ui", new UnlockFactory());

  // ForwardButton class
  class ForwardButton extends shaka.ui.Element {
    constructor(parent, controls, player) {
      super(parent, controls);
      this.player_ = player;
      this.button_ = $("<button>", {
        html: `<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.45 20.67C4.16 19.54 1 15.64 1 11C1 5.48 5.44 1 11 1C17.67 1 21 6.56 21 6.56M21 6.56V2M21 6.56H18.99H16.56" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M21 11C21 16.52 16.52 21 11 21" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M8.35861 7.72727V15H7.25776V8.82812H7.21515L5.47509 9.96449V8.91335L7.28972 7.72727H8.35861ZM12.8579 15.1207C12.2968 15.1184 11.8174 14.9704 11.4197 14.6768C11.022 14.3833 10.7177 13.956 10.507 13.3949C10.2963 12.8338 10.191 12.1579 10.191 11.3672C10.191 10.5788 10.2963 9.9053 10.507 9.34659C10.7201 8.78788 11.0255 8.36174 11.4232 8.06818C11.8233 7.77462 12.3016 7.62784 12.8579 7.62784C13.4142 7.62784 13.8913 7.7758 14.289 8.07173C14.6867 8.36529 14.991 8.79143 15.2017 9.35014C15.4147 9.90649 15.5213 10.5788 15.5213 11.3672C15.5213 12.1603 15.4159 12.8374 15.2052 13.3984C14.9945 13.9571 14.6903 14.3845 14.2926 14.6804C13.8948 14.974 13.4166 15.1207 12.8579 15.1207ZM12.8579 14.1726C13.3503 14.1726 13.735 13.9323 14.012 13.4517C14.2914 12.9711 14.4311 12.2763 14.4311 11.3672C14.4311 10.7635 14.3671 10.2533 14.2393 9.83665C14.1138 9.41761 13.9327 9.10038 13.696 8.88494C13.4616 8.66714 13.1822 8.55824 12.8579 8.55824C12.3678 8.55824 11.9831 8.79972 11.7038 9.28267C11.4244 9.76562 11.2836 10.4605 11.2812 11.3672C11.2812 11.9732 11.3439 12.4858 11.4694 12.9048C11.5972 13.3215 11.7784 13.6375 12.0127 13.853C12.2471 14.0661 12.5288 14.1726 12.8579 14.1726Z" fill="white"/>
                      </svg>
                      `,
        class: "shaka-forward-button shaka-tooltip",
        "aria-label": "Forward 10 seconds",
      });
      $(this.parent).append(this.button_);
      $(this.button_).on("click", () => {
        video.currentTime += 10;
       
      });
       animateNotificationIn(false);
    }
  }
  class ForwardButtonFactory {
    create(rootElement, controls, player) {
      return new ForwardButton(rootElement, controls, player);
    }
  }

  // Register the forward button with the controls
  shaka.ui.Controls.registerElement(
    "forward",
    new ForwardButtonFactory()
  );

  // BackwardButton class
  class BackwardButton extends shaka.ui.Element {
    constructor(parent, controls, player) {
      super(parent, controls);
      this.player_ = player;
      this.button_ = $("<button>", {
        html: `<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.55 20.67C17.84 19.54 21 15.64 21 11C21 5.48 16.56 1 11 1C4.33 1 1 6.56 1 6.56M1 6.56V2M1 6.56H3.01H5.44" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M1 11C1 16.52 5.48 21 11 21" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.37814 7.72678V14.9995H8.27729V8.82764H8.23468L6.49462 9.964V8.91286L8.30925 7.72678H9.37814ZM13.8774 15.1203C13.3164 15.1179 12.8369 14.9699 12.4392 14.6764C12.0415 14.3828 11.7373 13.9555 11.5266 13.3944C11.3159 12.8333 11.2105 12.1574 11.2105 11.3667C11.2105 10.5783 11.3159 9.90481 11.5266 9.3461C11.7396 8.78739 12.045 8.36125 12.4428 8.06769C12.8429 7.77413 13.3211 7.62735 13.8774 7.62735C14.4338 7.62735 14.9108 7.77532 15.3085 8.07124C15.7063 8.36481 16.0105 8.79094 16.2212 9.34965C16.4343 9.906 16.5408 10.5783 16.5408 11.3667C16.5408 12.1598 16.4354 12.8369 16.2247 13.3979C16.014 13.9567 15.7098 14.384 15.3121 14.6799C14.9144 14.9735 14.4361 15.1203 13.8774 15.1203ZM13.8774 14.1721C14.3699 14.1721 14.7546 13.9318 15.0316 13.4512C15.3109 12.9706 15.4506 12.2758 15.4506 11.3667C15.4506 10.763 15.3867 10.2528 15.2588 9.83616C15.1334 9.41713 14.9522 9.09989 14.7155 8.88445C14.4811 8.66665 14.2018 8.55775 13.8774 8.55775C13.3874 8.55775 13.0027 8.79923 12.7233 9.28218C12.444 9.76514 12.3031 10.46 12.3007 11.3667C12.3007 11.9728 12.3635 12.4853 12.4889 12.9043C12.6168 13.321 12.7979 13.6371 13.0323 13.8525C13.2666 14.0656 13.5484 14.1721 13.8774 14.1721Z" fill="white"/>
                    </svg>
                    `,
        class: "shaka-backward-button shaka-tooltip",
        "aria-label": "Rewind 10 seconds",
      });
      $(this.parent).append(this.button_);
      $(this.button_).on("click", () => {
        video.currentTime -= 10;
        
      });
      animateNotificationIn(true);
    }
  }
  class BackwardButtonFactory {
    create(rootElement, controls, player) {
      return new BackwardButton(rootElement, controls, player);
    }
  }

  // Register the backward button with the controls
  shaka.ui.Controls.registerElement(
    "backward",
    new BackwardButtonFactory()
  );



  class EpisodeButton extends shaka.ui.Element {
    constructor(parent, controls, player) {
      super(parent, controls);
      this.player_ = player;
      this.button_ = $("<button>", {
        html: `<svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M21.6472 20.0468V10.5173C21.6472 8.76298 20.225 7.34082 18.4707 7.34082H4.17649C2.42216 7.34082 1 8.76298 1 10.5173V20.0468C1 21.8011 2.42216 23.2232 4.17649 23.2232H18.4707C20.225 23.2232 21.6472 21.8011 21.6472 20.0468Z" stroke="#E8E8E8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M24.8235 20.048V8.93855C24.8235 6.30707 22.6902 4.17383 20.0587 4.17383H20.0505L5.76453 4.19852" stroke="#E8E8E8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M28.0001 16.8714V7.35297C28.0001 3.84432 25.1558 1 21.6471 1C21.6435 1 21.6398 1 21.6361 1L8.94116 1.02194" stroke="#E8E8E8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                    `,
        class: "shaka-episode-button shaka-tooltip",
        "aria-label": "episode",
      });
      $(this.parent).append(this.button_);
      $(this.button_).on("click", () => {
       
        $('.episode_body').removeClass('d-none');
        
      });
   
    }
  }
  class EpisodeButtonFactory {
    create(rootElement, controls, player) {
      return new EpisodeButton(rootElement, controls, player);
    }
  }

  // Register the backward button with the controls
  shaka.ui.Controls.registerElement(
    "episode",
    new EpisodeButtonFactory()
  );
  function animateNotificationIn(isRewinding) {
        // console.log(isRewinding, "----");
        isRewinding ? $('.notification').eq(0).addClass('animate-in') : $('.notification').eq(1).addClass('animate-in');
        setTimeout(() => {
          $('.notification').removeClass('animate-in')
        }, 500)
      }
       function getVolumePercentage() {
        return Math.round(myVideo.volume() * 100);
      }

      function displayVolume() {
        var volumeDisplay = $('.voll');
        volumeDisplay.innerText = getVolumePercentage() + '%';
      }
       function logVolume() {
        var currentVolume = video.volume * 100;
        var displayVol = currentVolume.toFixed(2).split('.')
        $('.voll').html(displayVol[0] + '%').addClass('d-block');
        setTimeout(function() {
          $('.voll').removeClass('d-block')
        }, 300)
      }



       function showIcon(isPaused) {
            if (isPaused) {
                $('#playIcon').addClass('d-block').removeClass('d-none');
                $('#pauseIcon').addClass('d-none').removeClass('d-block');
            } else {
                $('#playIcon').addClass('d-none').removeClass('d-block');
                $('#pauseIcon').addClass('d-block').removeClass('d-none');
            }

            setTimeout(function() {
                $('#playIcon').addClass('d-none').removeClass('d-block');
                $('#pauseIcon').addClass('d-none').removeClass('d-block');
            }, 500);
        }

        class Progress extends shaka.ui.Element {
        constructor(parent, controls, player) {
            super(parent, controls);

            // Store player instance for future use
            this.player_ = player;

            // Create the custom progress element
            this.div_ = $("<div>", {
                html: `
                <div class="pro_gresss">
                    <div class="prog_dts"></div>
                </div>
            `,
                class: "pro_gresssdt",
                "aria-label": "Progress Bar",
            });

            // Append the created element to the parent
            $(parent).append(this.div_);
        }
    }

    // Factory class for creating the custom progress bar
    class ProgressFactory {
        create(rootElement, controls, player) {
            return new Progress(rootElement, controls, player);
        }
    }

    // Register the custom progress bar with the Shaka Player UI
    shaka.ui.Controls.registerElement(
        "progresss", // Unique name for the element
        new ProgressFactory()
    );

    
    class fitToWidthButton extends shaka.ui.Element {
      constructor(parent, controls, player) {
        super(parent, controls);
        this.player_ = player;

        this.button_ = document.createElement('button');
        this.button_.classList.add('shaka-skip-fitwidth-button', 'shaka-tooltip');
        this.button_.setAttribute('aria-label', 'Standard Mode');

        const img = document.createElement('img');
        img.src = base_url+'assets/images/zoom_ins.svg';
        img.alt = 'Fit to Screen';
        img.style.width = '17px';
        img.style.height = '17px';
        this.button_.appendChild(img);
        
        parent.appendChild(this.button_);
        this.button_.addEventListener('click', () => {
          if (video.style.transform == 'scale(1.4)') {
            video.style.transform = 'scale(1)';
            this.button_.setAttribute('aria-label', 'Standard Mode');           
          } else {
           
            video.style.transform = 'scale(1.4)';
            this.button_.setAttribute('aria-label', 'Fill Screen');
          }
        });
      }
    }

    class fitToWidthButtonFactory {
      create(rootElement, controls, player) {
        return new fitToWidthButton(rootElement, controls, player);
      }
    }
    shaka.ui.Controls.registerElement('fitToWidthButton',
      new fitToWidthButtonFactory()
    );
    
    async function getSkipableTime() {
      let nskipable_start = localStorage.getItem('nskipable_start');
      let nskipable_end = localStorage.getItem('nskipable_end');

      if (!nskipable_start || !nskipable_end) {
          try {
              const res = await $.ajax({
                  url: base_url+"web/home/getSkipableTime",
                  type: "post",
                  data: { timestamp: "0000000000" },
              });
              var response = JSON.parse(res);
              if (response.status && response.nskipable_start && response.nskipable_end) {
                  nskipable_start = response.nskipable_start;
                  nskipable_end = response.nskipable_end;

                  localStorage.setItem('nskipable_start', nskipable_start);
                  localStorage.setItem('nskipable_end', nskipable_end);
              } else {
                  console.error('Invalid response data:', response);
              }
          } catch (error) {
              console.error('Error fetching skippable time:', error);
          }
      }
      return { nskipable_start, nskipable_end };
  }