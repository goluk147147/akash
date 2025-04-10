<section class="section_top mb-5 section_top-foooter">
    <div class="container-fluid">
        <div class="row mt-5 mb-3">
            <div class="col-md-12">
                <nav>
                    <a onclick="history.go(-1)" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>
                        <h5 class="ms-4 mb-0 text-white watch_cont">Live Events</h5>
                        <input type='hidden' value='1' id='pageNum'>
                    </a>
                </nav>
            </div>
        </div>

    </div>

</section>
<section class="mb-4 viewAllSection mt-2 ">
    <div class="container-fluid">
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="d-flex mb-2 view-dtsd d-none">
                    <h6 class="defaultColr mt-2 mb-4 pl_5 delayed-element">
                        Upcoming Live
                    </h6>

                    <a onClick="urls_call('${category_id}')" class="defaultColr mt-1 mb-3  view_m_btn" onmouseover="this.style.color='var(--pbc)'; this.style.borderColor='var(--pbc)';" onmouseout="this.style.color=''; this.style.borderColor='';">
                        <?= $this->lang->line('viewall') ?> <i class="fas fa-solid fa-arrow-right"></i>
                    </a>

                </div>
                <div class="carousel_bott4 owl-carousel owl-theme">
                    <?php for ($j = 0; $j <= 8; $j++) { ?>
                        <div class="item">
                            <a href="javascript:void()">
                                <div class="pb_card_details">
                                    <div class="pb_card_img">
                                        <div class="live_upcoming">
                                            <img src="<?= base_url('assets/images/upcoming_imgs.png') ?>" class="img-fluid" alt="upcoming">
                                        </div>

                                        <img src="<?= base_url('assets/images/img-pdf.jpg') ?>" class="img-fluid as_ratio" alt="thumbnail">
                                    </div>

                                    <div class="pb_card_img2">
                                        <div class="pb_card_vd-2 position-relative">

                                            <img src="<?= base_url('assets/images/img-pdf.jpg') ?>" class="img-fluid" alt="poster banner">


                                        </div>
                                        <div class="pb_card_content">

                                            <h6>hi</h6>
                                            <p class="discription_gen">hello</p>
                                            <p class="discription_dt">hello</p>
                                            <div class="d-flex align-items-center mt-1 pb_add_btns pb_card_watch categaryAddBtn">

                                                <a href="javascript:void(0)" class="pb_watch_btn d-block">
                                                    <img class="img-fluid watchCardImg" src="<?= base_url('assets/images/playBtn.png') ?>" alt="watch card">
                                                    watch now
                                                </a>



                                                <a href="javascript:void(0);" class="pb_add ms-2 d-none">
                                                    <img class="img-fluid playAdd" src="<?= base_url('assets/images/jointWatch.png') ?>" alt="join watch"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        $('.view-dtsd').removeClass('d-none');
        // $('.carousel_bott4').owlCarousel('destroy'); // Destroy the existing instance
        var owl = $(".carousel_bott4").owlCarousel({
            items: 8,
            loop: false,
            margin: 5,
            nav: true,
            dots: false,
            stagePadding: 30,


            navText: [
                '<a class="class_btn"><i class="fa fa-chevron-left"></i></a>',
                '<a class="class_next"><i class="fa fa-chevron-right"></i></a>'
            ],
            responsive: {
                0: {
                    //mouseDrag: true,
                    stagePadding: 5,
                    nav: false,
                    items: 3
                },
                380: {

                    stagePadding: 10,
                    nav: false,
                    items: 3
                },
                600: {

                    stagePadding: 10,
                    nav: false,
                    items: 5
                },

                900: {

                    stagePadding: 10,
                    nav: false,
                    items: 6,
                    margin: 7
                },

                1024: {
                    stagePadding: 10,
                    items: 6,
                    slideBy: 3
                },
                1025: {

                    items: 6,
                    margin: 20,
                    slideBy: 3
                },

                1450: {

                    items: 7,
                    margin: 20,
                    slideBy: 3
                },


                1800: {

                    items: 8,
                    margin: 20,
                    slideBy: 3
                }
            }
        });

    });
    $(document).ready(function() {
        if ($(window).width() > 1024) {
            $(document).on('mouseover', '.carousel_bott4 .owl-item', function() {
                //  alert(this);

                $(".carousel_bott4 .owl-stage-outer").addClass("overflow");
                $(".carousel_bott4").addClass("overflow");
                $(this).addClass("z4");
                $('.owl-carousel').css('z-index', 0)
                $(this).parents('.owl-carousel').css('z-index', 1)
            });
            $(document).on('mouseleave', '.carousel_bott4 .owl-item', function() {
                $(".carousel_bott4 .owl-stage-outer").removeClass("overflow");
                $(".carousel_bott4").removeClass("overflow");
                //alert(this+" r");
                $(this).removeClass("z4");
                $('.owl-carousel').css('z-index', 1)
            });
        }
    })
    $(document).ready(function() {
        $('.owl-carousel').each(function() {
            const owl = $(this);

            // Function to get nth-child selector based on width
            function getNthChildSelector() {
                const width = $(window).width();
                if (width > 1000 && width <= 1449) {
                    return 6;
                } else if (width > 1450 && width <= 1799) {
                    return 7;
                } else {
                    return 8;
                }
            }

            // Function to update hover effects
            function updateHoverEffects() {
                const nthChildIndex = getNthChildSelector();

                // Remove previous hover events
                owl.find('.pb_card_details').off('mouseenter mouseleave');

                // Apply hover effect to the first active item
                owl.find('.owl-item.active:first .pb_card_details').hover(
                    function() {
                        $(this).addClass('transformed');
                    },
                    function() {
                        $(this).removeClass('transformed');
                    }
                );

                // Apply hover effect to the nth active item
                owl.find('.owl-item.active').eq(nthChildIndex - 1).find('.pb_card_details').hover(
                    function() {
                        $(this).addClass('transformed2');
                    },
                    function() {
                        $(this).removeClass('transformed2');
                    }
                );
            }

            // Initial setup
            updateHoverEffects();

            // Update hover effects when the slider changes
            owl.on('changed.owl.carousel', function(event) {
                setTimeout(function() { // Ensure the active class is properly updated
                    updateHoverEffects();
                }, 0);
            });

            // Update hover effects on window resize
            $(window).on('resize', function() {
                updateHoverEffects();
            });
        });
    });
</script>