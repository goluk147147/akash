$(document).ready(function () {

    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const today = new Date();
    const timeNow = today.getHours() * 60 + today.getMinutes();

    // Generate days of the week
    for (let i = -7; i <= 7; i++) {
        const day = new Date(today);
        day.setDate(today.getDate() + i);
        const dayName = i === 0 ? 'Today' : days[day.getDay()];
        $('.days').append(`<div class="day ${i === 0 ? 'today active' : ''}" data-date="${day.toISOString()}">${dayName}</div>`);
    }

    // Generate time slots for 24 hours in 30 minute intervals
    for (let i = 0; i < 24 * 2; i++) {
        const hour = Math.floor(i / 2);
        const minute = i % 2 === 0 ? '00' : '30';
        $('.time-bar').append(`<div class="time-slot">${hour}:${minute}</div>`);
    }


const channelsTitile = [
    { title: 'ENG vs IND 2022 T20 HLs', time: '01h 54m left' },
    { title: 'Breaking News: Market Crash', time: '02h 30m left' },
    { title: 'The Big Bang Theory S12E5', time: '00h 45m left' },
    { title: 'Cooking with Gordon Ramsay', time: '01h 15m left' },
    { title: 'Tech Talk: AI Innovations', time: '03h 20m left' },
    { title: 'Live Concert: Coldplay', time: '02h 00m left' },
    { title: 'Wildlife Documentary: The Serengeti', time: '01h 40m left' },
    { title: 'Soccer: World Cup Qualifiers', time: '01h 30m left' },
    { title: 'Movie: Inception', time: '02h 28m left' },
    { title: 'News Hour with John Doe', time: '01h 00m left' },
    { title: 'Fitness: Morning Yoga', time: '00h 50m left' },
    { title: 'History: Ancient Egypt', time: '01h 20m left' },
    { title: 'Cartoon: Spongebob Squarepants', time: '00h 25m left' },
    { title: 'Comedy Special: Stand-up Night', time: '01h 10m left' },
    { title: 'Travel Show: Exploring Japan', time: '02h 15m left' },
    { title: 'DIY: Home Improvement Tips', time: '01h 05m left' },
    { title: 'Horror Movie: The Conjuring', time: '01h 50m left' },
    { title: 'Science: Space Exploration', time: '01h 35m left' },
    { title: 'Music: Top 40 Hits', time: '01h 45m left' },
    { title: 'Drama: Grey\'s Anatomy S18E3', time: '01h 10m left' }
];

 

    // Channels array to simulate dynamic loading
    let img_path = "assets/website_assets/images/dd.png";
    const channels = [img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path, img_path];
    let loadedChannels = 0;
    const channelsPerLoad = 40;

    // Function to generate shows for a channel
    function generateShows(timeNow, channel) {
        const showsDiv = $('<div class="shows"></div>');
        let startTime = 0;
        while (startTime < 24 * 60) {
            const duration = Math.floor(Math.random() * 120) + 30; // Random duration between 30 and 150 minutes
            const endTime = Math.min(startTime + duration, 24 * 60);
            const width = (endTime - startTime) * 100 / 30;
            const isPast = startTime < timeNow;
            const showClass = isPast ? 'show past-show' : 'show';
            showsDiv.append(`<div class="Programmedetail ${showClass}" style="width: ${width}px;">
                               <div class="w-100">
                                 <div class="c-title">${channel.title}</div>
                                 <div class="c-time">${channel.time}</div>
                               </div>
                               <div class="isLive"></div>    
                              </div>`);
            startTime = endTime;
        }
        return showsDiv;
    }

    // Function to load more channels
    function loadMoreChannels() {
        const fragment = $(document.createDocumentFragment());
        for (let i = 0; i < channelsPerLoad && loadedChannels < channels.length; i++, loadedChannels++) {
            const channel = channels[loadedChannels];
            $('.channel-names').append(`<div class="channel-name"><span class="fav"><i class="fa-regular fa-heart"></i></span><img src="${channel}" class="channelImage"></div>`);
            const showsDiv = generateShows(timeNow, channelsTitile[i]);
            fragment.append(showsDiv);
        }
        $('.shows-container').append(fragment);  
    }

    // Load initial channels
    loadMoreChannels();

    // Observer to detect scrolling to the bottom
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            loadMoreChannels();
        }
    }, { threshold: 1 });

    // Add a sentinel div at the bottom to trigger loading more channels
    const sentinel = $('<div></div>').css('height', '1px');
    $('.shows-container').append(sentinel);
    observer.observe(sentinel[0]);

    // Calculate time positions
    const timeSlotWidth = $('.time-slot').outerWidth();

    const currentTimePosition = timeNow * timeSlotWidth / 30;
   var containerWidth = $('.shows-container').width();
   var containerHeight = $('.shows-container').height();
    $('.now-vertical-line').css('left', currentTimePosition)

    // Set current time indicator position
    $('.current-time-indicator').css('left', currentTimePosition);
    var finalWidth =  containerWidth-currentTimePosition;
     finalWidth = finalWidth+50;
    $('.now-vertical-line').css('width', finalWidth+'px')
     $('.current-time-indicator, .now-vertical-line').css('height', (containerHeight-7)+'px')




    // Update current time indicator position every minute
    setInterval(function () {
        const now = new Date();
        const nowTime = now.getHours() * 60 + now.getMinutes();
        const nowPosition = nowTime * timeSlotWidth / 30;
        $('.current-time-indicator').css('left', nowPosition);
        $('.now-vertical-line').css('left', nowPosition)
        $('.now-vertical-line').css('width', (containerWidth-nowPosition)+'px')
        $('.current-time-indicator, .now-vertical-line').css('height', (containerHeight-7)+'px')
       // alert(nowPosition)
        $('.shows-container .show').each(function () {
            const showStart = parseFloat($(this).css('left'));
            if (showStart < nowPosition) {
                $(this).addClass('past-show');
            }
        });
    }, 60000);

    // Live button functionality
    $('.live-button').on('click', function () {
        liveLine()
    });

    function liveLine(){
        const now = new Date();
        const nowTime = now.getHours() * 60 + now.getMinutes();
        const nowPosition = nowTime * timeSlotWidth / 30;
       // console.log(nowPosition)
        $('.time-bar-wrapper').scrollLeft(Math.floor(nowPosition) - $('.time-bar-wrapper').width() / 2);
        $('.shows-wrapper').scrollLeft(nowPosition - $('.shows-wrapper').width() / 2);
    }

    $(document).ready(function(){
        liveLine()
    })

    
    // Synchronize scrolling between time bar and shows wrapper
    $('.time-bar-wrapper').on('scroll', function () {
        const scrollLeft = $(this).scrollLeft();
        $('.shows-wrapper').scrollLeft(scrollLeft);
    });

    // Set shows wrapper position to current time slot
    $('.shows-wrapper').scrollLeft(currentTimePosition);

    // Set time bar position to current time slot
    $('.time-bar-wrapper').scrollLeft(currentTimePosition);

    // Initial scroll position for days-wrapper to show only the current day plus next 3 days
    $('.days-wrapper').scrollLeft(0);



   
});





  $('.scroll-right').click(function() {
            var position = $(this).position();
            var corresponding = $(this).data("id");
            scroll = $('.days').scrollLeft();
            $('.days').animate({'scrollLeft': scroll + position.left - 30}, 200);
           
            
            $('.days .day.active').removeClass('active').next('.day').addClass('active')

            $(this).addClass('active');
          });
  $('.scroll-left').click(function() {
            var position = $(this).position();
            var corresponding = $(this).data("id");
            scroll = $('.days').scrollLeft();
            $('.days').animate({'scrollLeft': scroll + position.left - 30}, 200);
           
            
            $('.days .day.active').removeClass('active').prev('.day').addClass('active')

            $(this).addClass('active');
          });




$(document).on('click', 'span.fav i', function(){
    if($(this).hasClass('fa-regular')){
        $(this).addClass('fa-solid').removeClass('fa-regular')
    }else{
        $(this).removeClass('fa-solid').addClass('fa-regular')
    }
})



// var $scrollableDiv = $('.shows-wrapper');

// $scrollableDiv.on('scroll', function() {

//   if (stickyElement) {
//     const scrollLeft = $scrollableDiv.scrollLeft();

//     console.log('Scroll left:', scrollLeft);
//     stickyElement.style.position = scrollLeft > 1200 ?  'fixed' : 'sticky';
//   } else {
//     console.log('Element not found');
//   }
// });

 
// $(document).ready(function() {
//     var $scrollableDiv = $('.shows-wrapper');
//     var lastScrollTop = 0;
//     var lastScrollLeft = 0;
  

//      setTimeout(()=>{
//            var height = $('.shows-wrapper').height();
//            console.log(height,'height')
//     $('.current-time-indicator').css('height', height+'px')
//         },500)
  
//     $scrollableDiv.on('scroll', function() {
//         const stickyElement = document.querySelector('.channel-names');
//         var scrollTop = $scrollableDiv.scrollTop();
//         var scrollLeft = $scrollableDiv.scrollLeft();

//         if (scrollTop !== lastScrollTop) {
//             // Handle vertical scrolling
//             $('.shows-wrapper, body').css('overflow-y', 'auto');
//         } else if (scrollLeft !== lastScrollLeft) {
//             // Handle horizontal scrolling
//             stickyElement.style.position = scrollLeft > 1200 ? 'fixed' : 'sticky';
//             $('.shows-wrapper').css('overflow-y', 'hidden');
//         }

//         lastScrollTop = scrollTop;
//         lastScrollLeft = scrollLeft;
//         setTimeout(()=>{
//             $('.shows-wrapper').css('overflow-y', 'auto');
//             stickyElement.style.position = 'sticky';
//         },500)
//     });
// });
