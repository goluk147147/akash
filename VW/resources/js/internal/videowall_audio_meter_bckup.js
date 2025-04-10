$(document).ready(function () {
  function sleepFor(sleepDuration) {
    var now = new Date().getTime();
    while (new Date().getTime() < now + sleepDuration) {
      /* Do nothing */
    }
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

  const buttonElement = document.getElementById("ctx-button");
  buttonElement.addEventListener("click", () => {
    if (audioCtx.state === "suspended") {
      audioCtx.resume();
    } else {
      audioCtx.suspend();
    }
  });

  const ctxStatus = document.getElementById("ctx-status");
  setInterval(() => {
    ctxStatus.innerText = audioCtx.state;
    if (audioCtx.state === "suspended") {
      buttonElement.innerText = "Resume";
    } else {
      buttonElement.innerText = "Suspend";
    }
  }, 100);

  const videoWall = document.getElementById("videowall");
  const lstVideos = [
    {
      videoid: "1",
      title: "DD India",
      srcurl:"https://d3qs3d2rkhfqrt.cloudfront.net/out/v1/ceda14583477426aa162a65392d8ea07/index.m3u8",
    },
    {
      videoid: "2",
      title: "DD News",
      srcurl: "https://d3qs3d2rkhfqrt.cloudfront.net/out/v1/0811cd8c37ca4c409d5385a6cd2fa18b/index.m3u8",
    },
    {
      videoid: "3",
      title: "DD Bharti",
      srcurl: "https://d2lk5u59tns74c.cloudfront.net/out/v1/67cec794d8b14f9ba21f73924ac65797/index.m3u8",
    },
    {
      videoid: "4",
      title: "DD Kisan",
      srcurl: "https://d2lk5u59tns74c.cloudfront.net/out/v1/4f053f2c12a24641bf701fb7f2376750/index.m3u8",
    }
    
  ];

  const options = {
    backgroundColor: "#555",
    peakHoldDuration: 2000,
    borderSize: 2,
    fontSize: 8,
    //tickColor:'red',
    //labelColor:'blue',
    //gradient:['red 1%', '#ff0 16%', 'lime 45%', '#080 100%']
    //dbRangeMin:-48,
    //dbRangeMax:0,
    //dbTickSize:6,
    maskTransition: "0.2s",
    //audioMeterStandard:"peak-sample"
  };
 
 $("#loadWall").click(function() {	
  var leftManu = "";
  lstVideos.forEach((item, id) => {
    leftManu += `<div class="md-checkbox">
                    <input value="${item.videoid}" id="video${item.videoid}" 
					       type="checkbox"  
						   class="checkboxselect classcheckboxselect" checked 
						   name="filterGroup" 
						   data-src="${item.srcurl}"  data-title="${item.title}">
                       <label for="video${item.videoid}">
					   <span title="${item.title}">${item.title}</span>
					   </label>
                    </div>`;
  });
  $(".overflow_container1").html(leftManu);
  	 
  for (var i = 0; i < lstVideos.length; i++) {
    //sleepFor(1000);
    oVideo = lstVideos[i];
    createVideo(oVideo);

    
  }
  $(this).hide();
});

  function createVideo(oVideo) {
    var divOuter = $("<div>").addClass("video-wrapper col-lg-3 maindiv");
    divOuter.attr("data-videoId", oVideo.videoid);

    var divAudioMeter = $("<div>")
      .attr("id", "meter-" + oVideo.videoid)
      .attr("class", "meterClass");

    var video = $("<video>").attr({
      id: oVideo.videoid,
      crossorigin: true,
      playsinline: true,
      width: "320",
      //controls:true
    });

    divOuter.append(video);
    divOuter.append(divAudioMeter);

    $(videoWall).append(divOuter);

    if (video[0].canPlayType("application/vnd.apple.mpegurl")) {
      video.attr("src", oVideo.srcurl);
    } else if (Hls.isSupported()) {
		var config = {
			xhrSetup: function (xhr,url) {
				var newurl = url+"?username=Pankaj";
				xhr.open('GET', newurl, true);
				}
		}
      var hls = new Hls(config);
      
      hls.loadSource(oVideo.srcurl);
      hls.attachMedia(video[0]);

      hls.on(Hls.Events.MEDIA_ATTACHED, function () {
		  video[0].play();
        var audioElementOne = $("#" + oVideo.videoid)[0];
        var sourceNodeOne = audioCtx.createMediaElementSource(audioElementOne);
        sourceNodeOne.connect(audioCtx.destination);

        var elementOneA = $("#meter-" + oVideo.videoid)[0];
        var meterOneA = new webAudioPeakMeter.WebAudioPeakMeter(
          sourceNodeOne,
          elementOneA,
          options
        );
      });
      
      

      hls.on(Hls.Events.LEVEL_SWITCHED, function (event, data) {
        console.log("Level switched:", data);
      });
    }
  }

  //============Checkbox select unselect=================//

  $(document).on("change", ".checkboxselect", async function () {
    const d = new Date();
    let time = d.getTime();

    var check = $(this);
    var currentValue = $(this).val();
    var vid = "vid" + time;
    var src = check.data("src");
    var title = check.data("title");

    console.log();

    if (!check.prop("checked")) {
      $('.maindiv[data-videoId="' + currentValue + '"]').remove();
      // initializedPlayers.delete(vid);
    } else {
      console.log(vid, src, title);

      var loopT = {
        videoid: currentValue,
        title: title,
        srcurl: src,
      };

      createVideo(loopT);
    }
  });

  $("#close-sidebar").click(function () {
    $(".page-wrapper").removeClass("toggled");
    
  });
  $("#show-sidebar").click(function () {
    $(".page-wrapper").addClass("toggled");
    // $(".maindiv").addClass("col-md-3").removeClass('col-md-4');
    // $(".maindiv").addClass("col-lg-3");
    // $("#videowall").removeClass("align_by_grid");
  });
});
