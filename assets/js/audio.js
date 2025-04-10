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
  const musicCurrentTime = document.querySelector(".music-current-time");
  const musicDurationTime = document.querySelector(".music-duration-time");
  const backgroundImage = document.querySelector("#backgroundImage");
  const music = document.querySelector("#my_video");
  const progressZone = document.querySelector(".music-progress");
  const imgElement = play.querySelector("img");
  var player;
  let isPlaying = false;
  // default select first music
  let selectedMusic = 1;

  play.addEventListener("click", () => {
    isPlaying ? pauseMusic() : playMusic();
  });

  back_timeSet.addEventListener("click", () => {
     player.currentTime(player.currentTime() - 10) ;
  });

  forward_timeSet.addEventListener("click", () => {
     player.currentTime(player.currentTime() + 10) ;
  });

  const playMusic = () => {
    player.play();
    imgElement.src = '<?=base_url('assets/images/pause_icon.svg')?>';
    isPlaying = true;
    fadeInCover();
    musicCard.classList.add("middle-weight");
    setTimeout(() => {
      musicCard.classList.remove("middle-weight");
    }, 200);
  };
  
  const pauseMusic = () => {
    player.pause();
    imgElement.src = '<?=base_url('assets/images/play_icon.svg')?>';
    isPlaying = false;
    fadeInCover();
    musicCard.classList.add("middle-weight");
    setTimeout(() => {
      musicCard.classList.remove("middle-weight");
    }, 200);
  };

  const nextMusic = () => {
    player.currentTime(player.currentTime() + 20) ;
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
    player.currentTime(player.currentTime() - 20) ;
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
    
    // console.log(duration);
    // console.log(currentTime);
    const progressPercent = (currentTime / duration) * 100;
    progressBar.style.width = `${progressPercent}%`;
  
    // if (progressPercent == 100) {
    //   setTimeout(() => {
    //     //nextMusic();
    //   }, 500);
    // }
  };

  player.on('timeupdate', function(event) {
    updateProgress(event);
    setMusicTime(event);
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
    calcSongTime(duration, musicDurationTime);
    calcSongTime(currentTime, musicCurrentTime);
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
    this.querySelectorAll(".music-card").forEach(function (boxMove) {
      const x = -(window.innerWidth / 3 - e.pageX) / 90;
      const y = (window.innerHeight / 3 - e.pageY) / 30;
      boxMove.style.transform = "rotateY(" + x + "deg) rotateX(" + y + "deg)";
    });
  }