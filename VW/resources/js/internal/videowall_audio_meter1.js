$(document).ready(function() {
	
	function sleepFor(sleepDuration){
	    var now = new Date().getTime();
	    while(new Date().getTime() < now + sleepDuration){ /* Do nothing */ }
	}
	/*$(document).on("keyup",".searchInput",function() {   
        var searchTerm = $(this).val().toUpperCase();
        var checkboxes = $(this).parents('.wrappersClas').find('.overflow_container1').find('.checkboxselect');

      
        $(checkboxes).each(function() {
            var span = $(this).next().find('span');
            var name = span.text();
            if (name.toUpperCase().includes(searchTerm)) {

                $(this).parent('.md-checkbox').css('display', 'block');
           } else {
                $(this).parent('.md-checkbox').css('display', 'none');
           }
      });
      });


$(document).on("change", ".checkboxselect", function() {
     const d = new Date();
     let time = d.getTime();

    var check = $(this);
    var id = check.attr('id');
    var vid = 'vid'+time;
    var src = check.data('src');
    var title = check.data('title');

    if (!check.prop('checked')) {
        $('.maindiv[data-videoId="' + id + '"]').remove();
        initializedPlayers.delete(vid);

    } else {

        console.log(id, vid, src, title)
       
    }
});




$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
  // $(".maindiv").removeClass("col-md-3").addClass('col-md-4');
  $(".maindiv").removeClass("col-lg-3");
  //$('#videoC').addClass('align_by_grid');
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
  // $(".maindiv").addClass("col-md-3").removeClass('col-md-4');
  $(".maindiv").addClass("col-lg-3");
 // $('#videoC').removeClass('align_by_grid');
});*/

	const audioCtx = new AudioContext();

	const buttonElement = document.getElementById('ctx-button');
	buttonElement.addEventListener('click', () => {
	  if (audioCtx.state === 'suspended') {
	    audioCtx.resume();
	  } else {
	    audioCtx.suspend();
	  }
	});
	
	const ctxStatus = document.getElementById('ctx-status');
	setInterval(() => {
	  ctxStatus.innerText = audioCtx.state;
	  if (audioCtx.state === 'suspended') {
	    buttonElement.innerText = 'Resume';
	  } else {
	    buttonElement.innerText = 'Suspend';
	  }
	}, 100);

	const videoWall = document.getElementById('videowall');
	const lstVideos = [
		{"videoid":"1","title":"DD Bharati","srcurl":"https://dncx01d0xjt51.cloudfront.net/out/v1/d94799429a3d4c15b08021b5444574a4/index.m3u8"},
		{"videoid":"2","title":"DD News(HD)","srcurl":"http://203.122.4.126/hls/segs/master.m3u8"},
		{"videoid":"3","title":"Radio Channel","srcurl":"https://air.pc.cdn.bitgravity.com/air/live/pbaudio001/chunklist.m3u8"}//,
		//{"videoid":"4","srcurl":"http://203.122.4.126/hls/02/playlist.m3u8"}				
	];
	
	var leftManu = '';
    lstVideos.forEach((item, id) => {
        leftManu += `<div class="md-checkbox">
                       <input value="${item.videoid}" id="${item.videoid}" type="checkbox"  class="checkboxselect classcheckboxselect" checked name="filterGroup" data-src="${item.srcurl}"  data-title="${item.title}">
                           <label for="${item.videoid}"><span title="${item.title}">${item.title}</span></label>
                    </div>`;

    });
    $('.overflow_container1').append(leftManu);
	
	//{"srcurl":"https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/vod_non_drm_ios/3932529/1706111402_9436403167744454/1706105194383_777159821265519700_video_VOD.m3u8"}/*,
	//{"srcurl":"https://d505fpscewy5o.cloudfront.net/HLS/20022024/JS-DS-1.m3u8"},
	//{"srcurl":"https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/vod_non_drm_ios/3948950/1707995961_3210423941524692/1707995949382_308288343285821440_video_VOD.m3u8"},
	//{"srcurl":"https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/vod_non_drm_ios/3932529/1706111402_9436403167744454/1706105194383_777159821265519700_video_VOD.m3u8"},
	//{"srcurl":"https://d505fpscewy5o.cloudfront.net/HLS/20022024/JS-DS-1.m3u8"},
	//{"srcurl":"https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/vod_non_drm_ios/3948950/1707995961_3210423941524692/1707995949382_308288343285821440_video_VOD.m3u8"},
	//{"srcurl":"https://d1wxh31cdpnls0.cloudfront.net/file_library/videos/vod_non_drm_ios/3932529/1706111402_9436403167744454/1706105194383_777159821265519700_video_VOD.m3u8"}*/
		
	const options = {
		  backgroundColor: '#555',
		  peakHoldDuration: 2000,
		  borderSize:2,
		  fontSize:8,
		  //tickColor:'red',
		  //labelColor:'blue',
		  //gradient:['red 1%', '#ff0 16%', 'lime 45%', '#080 100%']
		  //dbRangeMin:-48,
		  //dbRangeMax:0,
		  //dbTickSize:6,
		  maskTransition:"0.2s",
		  //audioMeterStandard:"peak-sample"
		};
		
	for (var i = 0; i < lstVideos.length; i++) {
		//sleepFor(1000);
		oVideo = lstVideos[i];
		createVideo(oVideo);
		
		
		
		//var  elementOneA = document.getElementById("meter-" + oVideo["videoid"]);
		//var  meterOneA = new webAudioPeakMeter.WebAudioPeakMeter(sourceNodeOne, elementOneA,options);
		
		
		/*
		vertical (boolean): if set to true, displays a vertical meter (default: false)
		borderSize (number): the number of pixels to use as a border (default: 2)
		fontSize (number): the font size in pixels used by the labels (default: 9)
		backgroundColor (string): the background of the meter - can take any css format, for example #123456, rgba(0,0,0, 0.5), or slategray (default: black),
		tickColor (string): the color of the ticks - can take any css format (default: lightgray),
		labelColor (string): the color of the held peak labels - can take any css format (default: lightgray),
		gradient (string[]): an array of space delimited color/percentage pairs to be used by the meter bars (default: ['red 1%', '#ff0 16%', 'lime 45%', '#080 100%']),
		dbRangeMin (number): the decibel level of the floor of the metter (default: -48)
		dbRangeMax (number): the decibel level of the ceiling of the metter (default: 0)
		dbTickSize (number): the number of decibels to have between ticks (default: 6)
		maskTransition (string): value used for the transition property of the meter bars. Use a longer value for a smoother animation and a shorter value for faster updates (default: 0.1s)
		audioMeterStandard (string): Can be either peak-sample, or true-peak (default: peak-sample)
		peakHoldDuration (number): the number, in milliseconds, to hold the peak value before resetting (default: 0, meaning never reset)
		*/
		
		
		/*const elementOneB = document.getElementById('meter-one-b');
		const optionsOneB = {
		  backgroundColor: '#555',
		  peakHoldDuration: 2000,
		};
		const meterOneB = new webAudioPeakMeter.WebAudioPeakMeter(sourceNodeOne, elementOneB, optionsOneB);
		const elementTwoA = document.getElementById('meter-two-a');
		const optionsTwoA = {
		  vertical: true,
		};
		const meterTwoA = new webAudioPeakMeter.WebAudioPeakMeter(sourceNodeTwo, elementTwoA, optionsTwoA);
		*/
	}
	
	
	
	
	/*<div class="video-wrapper">
      <video id="video3" controls></video>
      <div class="audio-meter">
        <div class="fill"></div>
      </div>
    </div>*/
    
	function createVideo(oVideo){
		
		var divOuter = document.createElement('div');
		divOuter.className = 'video-wrapper';
		
		var divAudioMeter = document.createElement('div');
		divAudioMeter.id = "meter-" + oVideo["videoid"];
		divAudioMeter.setAttribute('style','height:30px;width:320px;');
		
//		<div id="meter-" style="height: 40px"></div>
		/*var divAudio = document.createElement('div');
		divAudio.className = 'audio-meter';
		var divFill = document.createElement('div');
		divFill.className = 'fill';
		divAudio.appendChild(divFill);*/
		
		
		var video = document.createElement('video');
		video.id = oVideo["videoid"];
		video.crossorigin = true;
		video.playsinline = true;
		//video.controls = true;
		//video.muted = true;
		//video.play();
		//video.height = 240; // in px
		video.width = 320; // in px
		
		divOuter.appendChild(video);
		divOuter.appendChild(divAudioMeter);
		

		videoWall.appendChild(divOuter);
		
		if (video.canPlayType('application/vnd.apple.mpegurl')) {
			video.src = oVideo["srcurl"];
		} else if (Hls.isSupported()) {
			var hls = new Hls();
			hls.loadSource(oVideo["srcurl"]);
			hls.attachMedia(video);
			
			hls.on(Hls.Events.MEDIA_ATTACHED, function () {
			  
		      //video.muted = true;
		      	video.play();
		      	var audioElementOne  = document.getElementById(oVideo["videoid"]);
				var  sourceNodeOne = audioCtx.createMediaElementSource(audioElementOne);
				sourceNodeOne.connect(audioCtx.destination);
				
				var  elementOneA = document.getElementById("meter-" + oVideo["videoid"]);
				var  meterOneA = new webAudioPeakMeter.WebAudioPeakMeter(sourceNodeOne, elementOneA,options);
		    });
		    
		    /*hls.on(Hls.Events.MANIFEST_LOADED, function(event, data) {
			  // Access manifest data here
			  console.log("Manifest data:", data);
			});*/
			
			hls.on(Hls.Events.LEVEL_SWITCHED, function(event, data) {
	          // Potentially update audio meter based on level change (bitrate/rendition)
	          console.log("Level switched:", data);
	        });
		}
		
		
		
		
		
	}
});

