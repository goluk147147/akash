
(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('video.js')) :
    typeof define === 'function' && define.amd ? define(['video.js'], factory) :
    (global = typeof globalThis !== 'undefined' ? globalThis : global || self, global.videojsSpriteThumbnails = factory(global.videojs));
  })(this, (function (videojs) { 'use strict';
  
    function _interopDefaultLegacy (e) { return e && typeof e === 'object' && 'default' in e ? e : { 'default': e }; }
  
    var videojs__default = /*#__PURE__*/_interopDefaultLegacy(videojs);
  
    function _assertThisInitialized(self) {
      if (self === void 0) {
        throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
      }
      return self;
    }
  
    function _setPrototypeOf(o, p) {
      _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function _setPrototypeOf(o, p) {
        o.__proto__ = p;
        return o;
      };
      return _setPrototypeOf(o, p);
    }
  
    function _inheritsLoose(subClass, superClass) {
      subClass.prototype = Object.create(superClass.prototype);
      subClass.prototype.constructor = subClass;
      _setPrototypeOf(subClass, superClass);
    }
  
    /**
     * Set up sprite thumbnails for a player.
     *
     * @function spriteThumbs
     * @param {Player} player
     *        The current player instance.
     * @param {Plugin} plugin
     *        The current spriteThumbnails plugin instance.
     * @param {Object} options
     *        Plugin configuration options.
     */
    var spriteThumbs = function spriteThumbs(player, plugin, options) {
      var url;
      var height;
      var width;
      var downlink;
      var cached;
      var dl;
      var navigator = window.navigator;
      var connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
      var dom = videojs__default["default"].dom || videojs__default["default"];
      var merge = videojs__default["default"].mergeOptions;
      var sprites = {};
      var defaultState = merge({}, plugin.state);
      var controls = player.controlBar;
  
      // default control bar component tree is expected
      // https://docs.videojs.com/tutorial-components.html#default-component-tree
      var progress = controls && controls.progressControl;
      var seekBar = progress && progress.seekBar;
      var mouseTimeTooltip = seekBar && seekBar.mouseTimeDisplay && seekBar.mouseTimeDisplay.timeTooltip;
      var tooltipEl = mouseTimeTooltip && mouseTimeTooltip.el();
      var tooltipStyleOrig = tooltipEl && tooltipEl.style;
      var resetMouseTooltip = function resetMouseTooltip() {
        if (tooltipEl && tooltipStyleOrig) {
          tooltipEl.style = tooltipStyleOrig;
        }
      };
      var hijackMouseTooltip = function hijackMouseTooltip(evt) {
        const sprite = sprites[url];
        const imgWidth = sprite.naturalWidth;
        const imgHeight = sprite.naturalHeight;
        const seekBarEl = seekBar.el();
        const columns = options.columns;
        const rowDuration = options.interval * columns;
        const duration = player.duration();
        const interval = options.interval;
         let rows = options.rows || Math.ceil(duration / rowDuration);
      // spriteDuration is needed to calculate idx and rows of last sprite
         const spriteDuration = rowDuration * rows;
          
          
          /*console.log("ROWS = " + rows);
          console.log("spriteDuration = " + spriteDuration);
          console.log("pankaj");
          console.log(sprite.complete);
          console.log(imgWidth);
          console.log(imgHeight);*/
          
        //if (sprite.complete && imgWidth && imgHeight) {
          //console.log("pankaj agarwal");
          //var seekBarEl = seekBar.el();
          
          var position = dom.getPointerPosition(seekBarEl, evt).x * duration;
          position = position / options.interval;
          
          var idx = Math.floor(position / spriteDuration);
  
          position = (position - spriteDuration * idx) / interval;
          if (idx === Math.floor(duration / spriteDuration)) {
            rows -= Math.floor((spriteDuration * (idx + 1) - duration) / rowDuration);
          }
          
          var d = (idx+1).toString(); 
          if (d.length < 9) {
              var zerosToAdd = 9 - d.length;
               idx = '0'.repeat(zerosToAdd) + d;
          }
        //   idx = parseInt(idxx);
        //   console.log("IDX = " + idx);
          
          var responsive = options.responsive;
          var playerWidth = player.currentWidth();
          const scaleFactor = responsive && playerWidth < responsive ? playerWidth / responsive : 1;
          //const columns = imgWidth / width;
          const scaledWidth = options.width * scaleFactor;
      const scaledHeight = options.height * scaleFactor;
      const cleft = Math.floor(position % columns) * -scaledWidth;
      const ctop = Math.floor(position / columns) * -scaledHeight;
          var bgSize = `${imgWidth * scaleFactor}px ${imgHeight * scaleFactor}px`;
          var controlsTop = dom.findPosition(controls.el()).top;
          var seekBarTop = dom.findPosition(seekBarEl).top;
          // top of seekBar is 0 position
          var topOffset = -scaledHeight - Math.max(0, seekBarTop - controlsTop);
          var tooltipStyle = {
             backgroundImage: `url("${options.url.replace('{index}', idx)}")`,
            backgroundPosition: `${cleft}px ${ctop}px`,
            
            backgroundSize: `${scaledWidth * columns}px ${scaledHeight * rows}px`,
            top: `${topOffset}px`,
            
            color: '#fff',
            textShadow: '1px 1px #000',
            // box-sizing: border-box inherited from .video-js
            border: '1px solid #000',
            // border should not overlay thumbnail area
            width: `${scaledWidth + 2}px`,
            height: `${scaledHeight + 2}px`
          };
          Object.keys(tooltipStyle).forEach(function (key) {
            tooltipEl.style[key] = tooltipStyle[key];
          });
        //}
      };
      var init = function init() {
        // if present, merge source config with current config
        var plugName = plugin.name;
        var spriteSource = player.currentSources().filter(function (source) {
          return source.hasOwnProperty(plugName);
        })[0];
        var spriteOpts = spriteSource && spriteSource[plugName];
        if (spriteOpts) {
          plugin.setState(defaultState);
          options = merge(options, spriteOpts);
  
          // url from source always takes precedence, even if empty
          options.url = spriteOpts.url;
        }
  
        // update script variables
        url = options.url;
        height = options.height;
        width = options.width;
        downlink = options.downlink;
        dl = !connection || connection.downlink >= downlink;
        cached = !!sprites[url];
        plugin.setState({
          ready: !!(mouseTimeTooltip && width && height && url && (cached || dl)),
          diagnostics: true
        });
      };
      plugin.on('statechanged', function () {
        var pstate = plugin.state;
        var spriteEvents = ['mousemove', 'touchmove'];
        var log = plugin.log || videojs__default["default"].log;
        var debug = log.debug || log;
        if (pstate.ready) {
          var msg = "loading " + url;
          debug('ready to show thumbnails');
          if (!cached) {
            sprites[url] = dom.createEl('img', {
              src: url
            });
          } else {
            msg = "re" + msg;
          }
          debug(msg);
          progress.on(spriteEvents, hijackMouseTooltip);
        } else {
          progress.off(spriteEvents, hijackMouseTooltip);
          resetMouseTooltip();
          if (pstate.diagnostics) {
            debug('resetting');
            ['url', 'width', 'height'].forEach(function (key) {
              if (!options[key]) {
                log("no thumbnails " + key + " given");
              }
            });
            if (connection && !dl) {
              log.warn("connection.downlink < " + downlink);
            }
          }
        }
      });
  
      // load configuration from a source
      player.on('loadstart', init);
  
      // load plugin configuration
      init();
      player.addClass('vjs-sprite-thumbnails');
    };
  
    var version = "1.1.1";
  
    var Plugin = videojs__default["default"].getPlugin('plugin');
  
    /**
     * Default plugin options
     *
     * @param {String} url
     *        Sprite location. Must be set by user.
     * @param {Integer} width
     *        Width in pixels of a thumbnail. Must be set by user.
     * @param {Integer} height
     *        Height in pixels of a thumbnail. Must be set by user.
     * @param {Number} interval
     *        Interval between thumbnail frames in seconds. Default: 1.
     * @param {Integer} responsive
     *        Width of player below which thumbnails are reponsive. Default: 600.
     * @param {Number} downlink
     *        Minimum of NetworkInformation downlink where supported. Default: 1.5.
     *        https://developer.mozilla.org/docs/Web/API/NetworkInformation/downlink
     */
    var defaults = {
      url: '',
      width: 0,
      height: 0,
      interval: 1,
      responsive: 600,
      downlink: 1.5
    };
  
    /**
     * An advanced Video.js plugin. For more information on the API
     *
     * See: https://blog.videojs.com/feature-spotlight-advanced-plugins/
     */
    var SpriteThumbnails = /*#__PURE__*/function (_Plugin) {
      _inheritsLoose(SpriteThumbnails, _Plugin);
      /**
       * Create a SpriteThumbnails plugin instance.
       *
       * @param  {Player} player
       *         A Video.js Player instance.
       *
       * @param  {Object} [options]
       *         An optional options object.
       */
      function SpriteThumbnails(player, options) {
        var _this;
        // the parent class will add player under this.player
        _this = _Plugin.call(this, player, options) || this;
        _this.options = videojs__default["default"].mergeOptions(defaults, options);
        _this.player.ready(function () {
          spriteThumbs(_this.player, _assertThisInitialized(_this), _this.options);
        });
        return _this;
      }
      return SpriteThumbnails;
    }(Plugin); // Define default values for the plugin's `state` object here.
    SpriteThumbnails.defaultState = {
      ready: false,
      diagnostics: false
    };
  
    // Include the version number.
    SpriteThumbnails.VERSION = version;
  
    // Register the plugin with video.js.
    videojs__default["default"].registerPlugin('spriteThumbnails', SpriteThumbnails);
  
    return SpriteThumbnails;
  
  }));