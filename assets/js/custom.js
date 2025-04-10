/* ------------- Home slider ----------------- */

$('#home_slider').owlCarousel({
    loop: true,
    dots: false,
    nav: true,
    items: 1,
    navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>']
})

/* ---------------- related course slider -------------------- */

$('#related_course_slider').owlCarousel({
    stagePadding: 2,
    loop: true,
    dots: false,
    nav: true,
    margin: 25,
    navText: ['<i class="fa fa-chevron-right"></i>', '<i class="fa fa-chevron-left"></i>'],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1024: {
            items: 3
        },
    }
});


$('#book_slider').owlCarousel({
    stagePadding: 2,
    loop: false,
    autoplay: false,
    dots: false,
    nav: true,
    margin: 25,
    // navText: ['<i class="fa fa-chevron-right"></i>', '<i class="fa fa-chevron-left"></i>'],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1024: {
            items: 4
        },
    }
});

$('#book_slider_two').owlCarousel({
    stagePadding: 2,
    loop: false,
    autoplay: false,
    dots: false,
    nav: true,
    margin: 25,
    // navText: ['<i class="fa fa-chevron-right"></i>', '<i class="fa fa-chevron-left"></i>'],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1024: {
            items: 4
        },
    }
});




/*---------------------------- progress bar ------------------- */

$(".animated-progress span").each(function() {
    $(this).animate({
            width: $(this).attr("data-progress") + "%",
        },
        1000
    );
});

$(".panel-heading").click(function(){
    var selector= $(this).find(".more-less");
    if(selector.hasClass("fa-minus")){
     selector.removeClass("fa-minus").addClass("fa-plus");
    }else{
     selector.removeClass("fa-plus").addClass("fa-minus");
    }
 });
     $(".subaccordian").click(function(){
    var selector= $(this).find(".more-less1");
    if(selector.hasClass("fa-minus")){
     selector.removeClass("fa-minus").addClass("fa-plus");
    }else{
     selector.removeClass("fa-plus").addClass("fa-minus");
    }
 });



function otpTimer() {
    var myTimer, timing = 60;
    $('#timing').html(timing);
    $('.otpExpire').show();
    myTimer = setInterval(function() {
      --timing;
      $('#timing').html(timing);
      if (timing === 0) {
        $('.resendOtp').show();
        $('.otpExpire').hide();
        clearInterval(myTimer);
      }
    }, 1000);
 }
 var myTimer, timing = 60;
 function otpTimerone() {
    if(timing == 0){
        myTimer, timing = 60;
    }
    $('#timingone').html(timing);
    $('.otpExpireone').show();
    myTimer = setInterval(function() {
      --timing;
      $('#timingone').html(timing);
      if (timing === 0) {
        $('.resendOtpone').show();
        $('.otpExpireone').hide();
        clearInterval(myTimer);
      }
    }, 1000);
 };



 

