<?php
$lang_ids = ($this->session->userdata('lang_id')) ? $this->session->userdata('lang_id') : 'English';
$url =  "getSearchRecommendations";
$datalist = call_curl_by_get_method($url, array());
?>
<section class="pt-4 pb-4 sear_page_def">
    <div class="container-fluid">

    <div class="d-flex align-items-center search_md">
        <div class="p-3 d-flex align-items-center">
            <a href=" <?= base_url(); ?>" class=" pb_back ">
                <i class="fa fa-chevron-left text-white"></i>
            </a>
            <h5 class="text-white f-600 ms-4 search_pb"><?= $this->lang->line('Search'); ?></h5>
        </div>
    </div>

    <div class="p-4 pb_sg">
        <div class="row">
            <div class="col-md-12">
                <div class="serach_new_page p-3">
                    <div class="search_new_result d-flex align-items-center">
                        <div class="int-searc-res">
                            <span class="search-icon-pos"><i class="fas fa-search"></i></span>
                            <input type="text" id="gsearch" value="" class=" serach_glb" name="gsearch" placeholder="<?= $this->lang->line('searchplaceholder'); ?>" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9-_/()!{}. ]/g,'')" autofocus>
                            <input type="hidden" id="start" value="1">
                            <!-- <span class="search_bar_mic"><i class="fas fa-microphone"></i></span> -->
                            <span class="search_bar_mic">
                                <a onclick="closeNavs()"><img src="<?= base_url('assets/images/searchClear.svg') ?>" alt="search" class="cross d-none" loading="lazy"></a>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class=" pt-3 foooter search_ht">
            <div class="container-fluid pb_dt_sg">
                <div class="row">

                </div>
                <div class="row mt-1">
                    <h4 class="defaultColr mb-3 ms-3 text-white top-result d-none ps-1"><?= $this->lang->line('Top-Results'); ?></h4>
                </div>
                <div class="pb_wl_card w-100">

                </div>

                <div class="popular_search hide-div">
                    <section class=" mb-4 mt-2">
                        <div class="">
                            <div class="row mt-1">
                                <h4 class="defaultColr mt-1 mb-2 ms-3 searchHead ps-0"><?= $this->lang->line('Popular-Searches'); ?></h4>
                            </div>
                            <div class="searchSectionBox ps-1">

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<script>
    var hasscroll = false;
    var popular_search = true;
    var top_search = false;


    function hide_modal() {
        $('#gsearch').val('');
        $('#search_page').modal('hide');
        $('#overlayonajaxhit').hide();
        $('.top-result').addClass('d-none');
        $('.popular_search').removeClass('d-none');
        $('.pb_wl_card').addClass('d-none');
        // $('.pb_dt_sg').hide();
        // $('.popular_search').show();
    }

    function fetchData() {
        var start = Number($('#start').val());
        $.ajax({
            url: "<?= base_url('web/dashboard/get_popular_data') ?>",
            type: 'post',
            data: {
                start
            },
            success: function(response) {
                var res = JSON.parse(response);
               
                if (res.status) {
                    $('#start').val((start + 1));
                    $(".searchSectionBox").append(res.html).show().fadeIn("slow");
                    $('input[name="gsearch"]').focus();
                    //$('#gsearch').focus();
                    if(($(document).height() ) <= 2*($(window).height())){
                        fetchData();
                    }
                    hasscroll = false;
                } else {
                    popular_search = false;
                }
            }
        });
    }


    <?php
    if (!empty($status)) {
        if ($status == 200) { ?>
            toastr.success("<?= $message ?>");
        <?php    } else { ?>
            toastr.error("<?= $message ?>");
    <?php    }
    }
    ?>

    $(document).ready(function() {
        $('#for_search').click(function() {
            $('#search_page').modal('show');
            $('#search_page').on('shown.bs.modal', function() {
                var $input = $('#gsearch');
                $input.focus();
                $input[0].setSelectionRange($input.val().length, $input.val().length);
            });
        });
        fetchData();

    });
    //  });


    // Prevent clicks inside the menu from closing it
    $('.menu_item_resp').click(function(e) {
        e.stopPropagation();
    });
</script>
<script>
    $(".ss").click(function() {
        var search = $("#searchh").val();
        if (search == "") {
            //$(".warning_pop").modal("show");
            setTimeout(function() {
                $('.warning_pop').modal('hide')
            }, 2000);
            return false;
        } else {
            //var location_url = "<?= base_url('/detailssearch?q='); ?>";
            window.location.href = location_url + search;
        }
    });


    let search_start = 1;
    var isSubscribed = "<?= SUBSCRIPTION_CHECK ?>";
    var sess_id = "<?php echo $this->session->id; ?>";
    var watch_app = '<?= $this->lang->line('Watchnow') ?>';
    var subscribe_watch = '<?= $this->lang->line('Subscribewatch') ?>';
    var available_to_rent = '<?= $this->lang->line('available_to_rent') ?>';
    var subscribe_listen = '<?= $this->lang->line('Subscribelisten') ?>';
    var Login_Watch = '<?= $this->lang->line('LoginToWatch') ?>';
    var listen = '<?= $this->lang->line('Listennow') ?>';

    var search_key = '';
    var prev_search = '';
    var prev_start = '';

    function matomo_search() {
        $('.pb_card_img2').click(function(e){
            // e.preventDefault();
            var title = $(this).data('title');
            var id = $(this).data('id');
            var dd = id +'/'+ title;
            
            // matomo_sear('Search', 'ContentSelected', dd);
            queueTrackingData('trackEvent', ["Search", "ContentSelected",dd]);
        });
    }

    var hideLength = 0;
    var base_url = '<?=base_url()?>';
    var shimmerSectionHTML = `
                <section id="shimmer-section" class="py-5">
                    <div class="banner_loader_af banner-place12">
                        <div class="container-fluid">
                            <div class="pb_wl_card">
                                ${Array.from({ length: 18 }, () => `
                                    <div class="pb_card_details">
                                        <div class="card_shimmer">
                                            <img src="${base_url + 'assets/images/placholder-img.png'}" class="img-fluid card_shimmer_op" alt="Placeholder">
                                        </div>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    </div>
                </section>`;

    $(document).ready(function(e) {
        var time_diff;
        let search_key = getSearchKeyFromUrl();
        if (search_key && search_key.length > 0) {
            $('#gsearch').val(search_key);
            $('.cross').removeClass('d-none');
            search_data(search_key, true);
        }
        document.getElementById('gsearch').addEventListener('keyup', function(e) {
            e.preventDefault();
            // $('.pb_wl_card').html(shimmerSectionHTML);
            search_key = $(this).val().trim();
            popular_search = false;
            top_search = true;
            var search = false;
            if((search_key.length > 2) || e.key === 'Enter'){
                if(search_key != prev_search){
                    $('.showing_result h4').html("");
                    $('.showing_result h5').html('');
                    // $('.pb_wl_card').html('');
                }
                var element = document.querySelector('.pb_wl_card');
                if (element && !element.querySelector('section.searcNodata')) {                
                    $('.top-result').removeClass('d-none');
                }
                $('.popular_search').addClass('d-none');
                $(element).removeClass('d-none');
            }else{
                var element = document.querySelector('.pb_wl_card');
                if (element && !element.querySelector('section.searcNodata')) {                
                    $('.top-result').addClass('d-none');
                }
                $('.popular_search').removeClass('d-none');
                $(element).addClass('d-none');
            }
            if ((e.type === 'keyup' && search_key.length >= 3) || e.key === 'Enter') {
                search = true;
            }else{
                return false;
            }
            search_start = 1;
            clearTimeout(time_diff);
            time_diff = setTimeout(() => {
                search_data(search_key, search, true);
                applyRowStyles()
            }, 300);
            
        });

        $('#gsearch').on('click keydown', function(e) {
            if (e.which == 8) {
                search_key = '';
                // Update the URL
                let newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?q=' + encodeURIComponent(search_key);
                window.history.pushState({
                    path: newUrl
                }, '', newUrl);
            }
        });

       
        $('#searchh').keyup(function(e) {
            e.preventDefault();
            var search = $(this).val();
            if (search != '') {
                $.ajax({
                    url: "<?= base_url('/detailssearch'); ?>",
                    //method:"POST",
                    data: {
                        q: search
                    },
                    success: function(data) {
                        $('#searchResult').html(data);
                    }
                })
            } else {
                $('#searchResult').html('');
                //load_data();
            }
        });

        $('#search_mobile').keyup(function(e) {
            e.preventDefault();
            var search = $(this).val();
            if (search != '') {
                $.ajax({
                    url: "<?= base_url('/detailssearch'); ?>",
                    //method:"POST",
                    data: {
                        q: search
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#searchResult_mob').html(data);
                    }
                })
            } else {
                $('#searchResult_mob').html('');
                //load_data();
            }
        });

        $('#searchh').on("keyup", function() {
            var search = this.value; //alert(search)
            //  var search = $("#search").val(); 
            //console.log(search);
            if (search == "") {
                $('.suggetion_dv').addClass('d-none');
                return false;
            } else {
                $('.suggetion_dv').removeClass('d-none')
            }

        });

        // var scrollTriggered = false; 
        // $(window).on('scroll', function() {
        //     // if (scrollTriggered) return;

        //     var distanceFromBottom = $(document).height() - $(window).scrollTop() - $(window).height();
        //     console.log('distanceFromBottom',distanceFromBottom);
        //     if (distanceFromBottom <= 400) { 
        //         if (popular_search === true) {
        //             fetchData();
        //         } else if (top_search === true && search_start > 1) {
        //             search_data();
        //         }
        //         scrollTriggered = true; 
        //     }
        // });

        $(window).on('scroll', function() {
            var distanceFromBottom = $(document).height() - ($(document).scrollTop());
            if (popular_search == true) {
                if ((distanceFromBottom <= 2*$(window).height()) && hasscroll == false) {
                    fetchData();
                    hasscroll = true;
                }
            } else if (top_search == true) {
                distanceFromBottom = $(document).height() - ($(document).scrollTop());
                if ((distanceFromBottom <= 2*$(window).height()) && hasscroll == false && (search_start > 1)) {
                // if (($(window).scrollTop() + $(window).height() >= $(document).height() - 100) && hasscroll == false && (search_start > 1)) {
                    search_data();
                    hasscroll = true;
                } 
                // else if (distanceFromBottom >= $(window).height() && hasscroll == true) {
                // // } else if (($(window).scrollTop() + $(window).height() >= $(document).height() - 100) && hasscroll == true) {
                //     hasscroll = false;
                // }
            }
        });
    });

    function search_query() {
        $(".mean-bar").addClass("z_index_1");
        $(".search_click_mobile").addClass("d-block");
        $(".main-menu-wrap").addClass("p-0");
        $(".top-header-area").addClass("p-0");
        $("#search_mobile").focus();
        $("#remove_z").addClass("z_in-1");
    }

    $("#close_fun_search").click(function() {
        $(".mean-bar").removeClass("z_index_1");
        $(".search_click_mobile").removeClass("d-block");
        $(".main-menu-wrap").removeClass("p-0");
        $(".top-header-area").removeClass("p-0");
        $("#remove_z").removeClass("z_in-1");
    });

    $('#searchsubmit_mobile').submit(function(e) {
        e.preventDefault();
        var search = $("#search_mobile").val();
        if (search == "") {
            $(".warning_pop").modal("show");
            setTimeout(function() {
                $('.warning_pop').modal('hide')
            }, 2000);
            return false;
        } else {
            //var location_url = "<?= base_url('/detailssearch?q='); ?>";

            var redirect_url = location_url + search;
            window.location.href = redirect_url;


        }
    });


    $('#searchsubmit').keyup(function(e) {
        e.preventDefault();
        var search = $("#search").val();
        if (search == "") {
            $(".warning_pop").modal("show");
            setTimeout(function() {
                $('.warning_pop').modal('hide')
            }, 2000);
            return false;
        } else {
            //var location_url = "<?= base_url('/detailssearch?q='); ?>";
            var redirect_url = location_url + search;
            window.location.href = redirect_url;
            $('#searchh').val(search);

        }
    });

    $(document).ready(function() {
        $("._icon_118nr_48").click(function() {
            $("._root_118nr_5").toggleClass("search-width");
            $("._icon_118nr_48").toggleClass("slide-ser")



        });

        $("._cancelIcon_118nr_85").click(function() {
            $("._root_118nr_5").removeClass("search-width");
            $("._icon_118nr_48").removeClass("slide-ser");

        });
    });

    function openNav() {
        $('#mySidenav').toggleClass('toggle_navs');
    }

    function closeNavs() {
        popular_search = true;
        top_search = false;
        $('.top-result').addClass('d-none');
        $('.cross').addClass('d-none');
        $('#gsearch').val('');
        $('.popular_search').removeClass('d-none');
        $('.pb_wl_card').addClass('d-none');
        search_key = '';
        let newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?q=' + encodeURIComponent(search_key);
        window.history.pushState({
            path: newUrl
        }, '', newUrl);
    }
    $('#gsearch').on('blur', function() {

        if ($('#gsearch').val() == '')
            $('.cross').addClass('d-none');

    });

    document.querySelector('input').addEventListener('keydown', function(event) {
    var searchData = $('#gsearch').val();

    if (event.key === 'Backspace' && searchData.length < 3) {
        handleSearchReset();
    }
});

document.querySelector('input').addEventListener('input', function() {
    // var searchData = $('#gsearch').val();

    // if (searchData.length < 3) {
    //     handleSearchReset();
    // } else {
    //     let search_key = getSearchKeyFromUrl();
    //     search_data(search_key, true);
    //     updateUrl(searchData);
    // }
});

function handleSearchReset() {
    var searchKey = '';
    var popular_search = true;
    var top_search = false;
    $('.top-result').addClass('d-none');
    $('.cross').addClass('d-none');
    $('.popular_search').removeClass('d-none');
    $('.pb_wl_card').addClass('d-none');

    updateUrl(searchKey);
}

function updateUrl(searchKey) {
    let newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?q=' + encodeURIComponent(searchKey);
    window.history.pushState({
        path: newUrl
    }, '', newUrl);
}


    function getSearchKeyFromUrl() {
        let searchParams = new URLSearchParams(window.location.search);
        return searchParams.get('q') || '';
    }


    async function applyRowStyles() {
        const container = await document.querySelector('.pb_wl_card');

        if (!container) {
            //console.error('Container not found');
            return;
        }

        const items = await container.querySelectorAll('.pb_card_details');

        if (items.length === 0) {
            //console.error('No items found');
            return;
        }

        const itemWidth = await items[0].offsetWidth;
        const marginRight = await parseFloat(getComputedStyle(items[0]).marginRight) || 0;
        const itemsPerRow = await Math.floor(container.offsetWidth / (itemWidth + marginRight));

        if (itemsPerRow <= 0) {
            console.error('Invalid number of items per row');
            return;
        }

        items.forEach((item, index) => {
            item.classList.remove('first-in-row', 'last-in-row');

            if (index % itemsPerRow === 0) {
                item.classList.add('first-in-row');
            }

            if ((index + 1) % itemsPerRow === 0) {
                item.classList.add('last-in-row');
            }
        });
    }
    // Initial application
    applyRowStyles();

    // Reapply on window resize
    window.addEventListener('resize', applyRowStyles);

    async function applyRowStyless() {
        const container = await document.querySelector('.searchSectionBox');
        const items = await container.querySelectorAll('.searcSection .pb_card_details');
        //const itemsPerRow = await Math.floor(container.offsetWidth / (items[0].offsetWidth + 8));
        if (items[0] !== undefined) {
        var itemsPerRow = Math.floor(container.offsetWidth / (items[0].offsetWidth + 8));
        }
        items.forEach((item, index) => {
            item.classList.remove('first-in-row', 'last-in-row');

            if (index % itemsPerRow === 0) {
                item.classList.add('first-in-row');
            }

            if ((index + 1) % itemsPerRow === 0) {
                item.classList.add('last-in-row');
            }
        });
    }


    applyRowStyless()

    window.addEventListener('resize', applyRowStyless);

    function search_data(search_key = '', search = true, newhtml=false) {
            $('.popular_search').addClass('d-none');
            $('.cross').removeClass('d-none');
            search_key = $('#gsearch').val().trim();
            if ((prev_search == search_key) && (prev_start == search_start)) {
                return false;
            }
            prev_search = search_key;
            prev_start = search_start;
            var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?q=' + search_key;
            window.history.pushState({
                path: newUrl
            }, '', newUrl);

            if (search_key != '' && (search == true || search_key.length >= 3)) {


                $('.showing_result h4').html("Showing Result for : '" + search_key + "'");
                if(search_start==1){
                    $('.pb_wl_card').html(shimmerSectionHTML);
                }

                hideLength = search_key;
                $.ajax({
                    url: "<?= base_url('/prasarsearch'); ?>",
                    method: "POST",
                    data: {
                        q: search_key,
                        start: search_start
                    },
                    success: function(data) {
                        //console.log("search_data",data);
                        if(newhtml==true){
                            $('.pb_wl_card').empty();
                        }
                        var res = JSON.parse(data);
                        var total = String(res.data).trim().length;
                        if (res.status == true) {
                            queueTrackingData('trackEvent', [ 'Search','Search',search_key]);
                            prev_start = search_start;
                            search_start += 1;
                            var parentDiv = $('.pb_wl_card');
                            if (search_start == 2) {
                                $('.popular_search').addClass('d-none');
                                $('.pb_wl_card').removeClass('d-none');
                                $('.showing_result h5').html("(" + total + " results)");
                                $('.showing_result').show();
                                parentDiv.empty();
                            }
                            var id = '';
                            var html = '';
                            applyRowStyles();
                            res.data.forEach(function(item,key) {
                                html = '';
                                var siturl = "<?= base_url('play-video?id=') ?>" + item.id +'&similar=Search';
                                var owned_by = 0;
                                //console.log("item",item);
                                if (item.hasOwnProperty('owned_by')) {  //console.log("else case");    
                                    if (item.owned_by > 0) {  
                                        owned_by = item.owned_by;                                  
                                        const validSubscriptions = "<?= json_encode(SUBSCRIBEUSER)?>";
                                        if (typeof validSubscriptions !== 'undefined') {
                                        if (validSubscriptions.includes(item.owned_by)) {
                                            isSubscribed = 1;  
                                        }else{
                                            isSubscribed = 0;
                                        } 
                                    } else{
                                        isSubscribed = 0;  
                                    } 
                                } 
                               }
                               //console.log("owned_by",owned_by);
                               var playbtn = "<?=base_url('assets/images/playBtn.png')?>";
                                if ((isSubscribed != 1) && (item.is_paid != 0 && item.is_paid != 2) && (sess_id !== "")) {
                                    var message = (item.type == 0) ? subscribe_watch : subscribe_listen;
                                    var siturl1 = "<?= base_url('subscription?publisherid=') ?>"+owned_by;
                                } else if ((isSubscribed != 1) && (item.is_paid != 0 && item.is_paid != 2) && (sess_id == "")) {
                                    var message = (item.type == 0) ? subscribe_watch : subscribe_listen;
                                    var siturl1 = "<?= base_url('subscription?publisherid=') ?>"+owned_by;
                                } else if ((item.is_paid == 2)) {
                                    if (item.is_rented == 0) {
                                        playbtn = "<?=base_url('assets/images/vector.svg')?>";
                                        var message = (item.type == 0) ? available_to_rent : available_to_rent;
                                        var siturl1 = "<?= base_url('play-video?id=') ?>" + item.id +'&similar=Search';
                                    } else {
                                        var message = (item.type == 0) ? watch_app : listen;
                                        var siturl1 = "<?= base_url('play-episode?id=') ?>" + item.id;
                                    }
                                } else {
                                    var message = (item.type == 0) ? watch_app : listen;
                                    var siturl1 = "<?= base_url('play-episode?id=') ?>" + item.id +'&similar=Search';
                                    if (item.still_live == 1) {
                                        siturl1 = "<?= base_url('pb_live_details?id=') ?>" + item.id;
                                    }
                                }
                                var lang_title = "<?= ucwords($lang_ids) ?>";
                                var descriptions = '';
                                if (Array.isArray(item.description)) {
                                    const sessionDescription = item.description.find(desc => desc.language === "English");
                                    if (sessionDescription) {
                                        descriptions = sessionDescription.content;
                                    }
                                    if (lang_title) {
                                        const sessionDescription = item.description.find(desc => desc.language === lang_title);
                                        if (sessionDescription) {
                                            descriptions = sessionDescription.content;
                                        }
                                    }
                                }
                                var action = (item.genres) ? item.genres.replace(/,/g, ' | ') : '';
                                if (action) { 
                                 //   genre = data.genres.replace(/,/g, ' | ');
                                    var geners = item.genres ? item.genres.replace(/,/g, ' | ') : '';
                                    action =  geners.split('|').map(items => items.trim()).slice(0, 3).join(' | ');
                                }
                               

                                id = item.id;
                                item.thumbnail = item.thumbnail ? item.thumbnail : '<?= base_url(ThumbnailPlaceholder) ?>';
                                item.poster_url = item.poster_url ? item.poster_url : '<?= base_url(PosterPlaceholder) ?>';
                                var ref = "<?= base_url('play-video?id=') ?>" + id +'&similar=Search';
                                // if (item.still_live == 1) {
                                //     ref = "<?//= base_url('pb_live_details?id=') ?>" + id;
                                // }
                                if(item.type < 2 || item.type == 9){
                                   // item.is_live = 0;
                                 //  item.is_live = 4;
                                   var pb_watch_width ='';
                                   var hide_btns=''; var btndisable = '';   var tags = `<a href="${ref}">`;
                                   var last_tag = `</a>`;
                                //    var upcoming = "<//?= UPCOMINGEVENT?>";
                                var livehtml="<?= $this->lang->line("Live") ?>";
                                var upcominghtml="<?= $this->lang->line("upcoming") ?>"; 
                                    if(item.type == 9 && item.hasOwnProperty('is_live') && (item.is_live == 1 ) ){
                                        siturl = siturl1 = ref= 'live?id=' + id;
                                        pb_watch_width = 'pb_watch_width';
                                        message = watch_app ;
                                    }else if(item.type == 9 && item.hasOwnProperty('is_live') && item.is_live == 0 ||  item.is_live == null){
                                        var Datetime = formatTimestamp(item.live_start_time ? item.live_date_time :Math.floor(Date.now() / 1000) + 60);
                                        var  buttonText =  "<?= $this->lang->line("began_on") ?>"+" "+Datetime;
                                        message = buttonText;
                                        pb_watch_width = 'pb_watch_width';
                                        siturl1 = ref;
                                        hide_btns='d-none';
                                    }else if(item.type == 9 && item.hasOwnProperty('is_live') && (item.is_live == 2 ) ){
                                        siturl = siturl1 = ref= "<?= base_url('play-episode?id=') ?>" + item.id +'&similar=Search';
                                        pb_watch_width = 'pb_watch_width';
                                        message = watch_app ;
                                     }else if(item.type == 9 && item.hasOwnProperty('is_live') && item.is_live == 4){
                                        var Datetime = formatTimestamp(item.live_date_time ? item.live_date_time :Math.floor(Date.now() / 1000) + 60);
                                        var  buttonText =  "<?= $this->lang->line("since_text") ?>"+" "+Datetime;                                        message = buttonText;
                                        pb_watch_width = 'pb_watch_width';
                                        siturl1 = ref = "<?= base_url('play-video?id=') ?>" + item.id +'&similar=Search';
                                        hide_btns='d-none';
                                        // btndisable = 'disabled';
                                        // tags = '';
                                        // last_tag = '';
                                     }
                                        html = tags;
                                       html += ` <div class="pb_card_details ${(item.is_paid == 0) ? '' : 'pb_card_outer'}">`;
                                    if (item.type == 9 && item.hasOwnProperty('is_live') && item.is_live == 1) {
                                        html += `<div class="live_upcomingss"> <div class="live_up_lang"><span></span><p class="mb-0">${livehtml}</p></div></div>`;
                                    }else{
                                        if(item.type == 9 && item.hasOwnProperty('is_live') && item.is_live == 0){
                                        html += `<div class="live_upcomingss"> <div class="live_up_lang"><p class="mb-0">${upcominghtml}</p></div></div>`;
   
                                        }
                                    }
                                    let visibleTag='';
                                    let visibleTagUrl='';
                                    if (item.tags && item.tags.length > 0) {
                                         visibleTag = item.tags.find(tag => tag.visible === 1);
                                        if (visibleTag) {
                                            visibleTagUrl = visibleTag.url;
                                        }
                                    }

                                    html += `<div class="pb_card_img">
                                    ${(item.is_paid==2)?'<div class="premium_icondt"><img src="<?= base_url('assets/website_assets/images/rental.svg') ?>" alt="rental"></div>':((item.is_paid==1)?'<div class="premium_icondt"><img src="<?= base_url('assets/images/premium-icon.svg') ?>" alt="premium"></div>':'')}
                                    
                                            <img src="${item.thumbnail}" class="img-fluid as3" alt="${item.title}" loading="lazy">`;
                                            if(visibleTagUrl != ''){
                                                html += `<div class="pre_tags"><img src="${visibleTagUrl }" class="img-fluid" alt="tags_img"></div>`;
                                            }
                                            html += `</div>
                                    <div class="pb_card_img2" data-title =${item.title} data-id=${item.dec_id} >
                                        <div class="pb_card_vd-2">
                                            <img src="${item.poster_url}" class="img-fluid" alt="logo" loading="lazy">
                                        </div>
                                        <div class="pb_card_content">
                                            <h6>${item.title}</h6>
                                            <p class="discription_gen">${action}</p>
                                            <p class="discription_dt">${descriptions??''}</p>
                                            <div class="d-flex align-items-center mt-1 pb_add_btns" >
                                            <a href="${siturl1}" handleButtonClick('${item.title}', ${item.dec_id})" class="pb_watch_btn d-block ${pb_watch_width}">
                                            <img src="${playbtn}" class="img-fluid watchCardImg ${hide_btns}" alt="watch" loading="lazy">${message}
                                            </a>

                                            </div>
                                    </div>
                                    </div>`;
                                     html += last_tag;
                                }else{ 
                                    ref = 'content-detail?id='+ item.id;
                                    html += `<div class="pb_card_details mb-3  img_pdf_dtes"><a href="${ref}">
                                                <div class=" pb_img_pdf"><img class="img-fluid" src="${ item.thumbnail}" ></div>
                                                </a>                
                                        </div>`;
                                }
                                $('.top-result').removeClass('d-none');
                                parentDiv.append(html);
                                if(($(document).height() ) <= 2*($(window).height())){
                                    //search_data();
                                }
                                hasscroll = false;
                            });
                        } else {
                            top_search = false;
                            if (search_start == 1 || ($('.pb_wl_card').html()=='')) {
                                $('.popular_search').addClass('d-none');
                                $('.pb_wl_card').removeClass('d-none');
                                $('.showing_result h4').html("Showing Result for : '" + search_key + "'");
                                $('.showing_result h5').html("(0 result)");
                                $('.showing_result').show();
                                var html = `<section class=" mb-5  w-100 searcNodata search-nod"">
                            <div class="container">
                                <div class="row">
                                    <div class="d-flex flex-column justify-content-center w-100">
                                        <div class="col-md-6 m-auto text-center watchListNo searchNo">
                                            <img src="<?= base_url('assets/images/NoSearchResult.png'); ?>" class="img-fluid " alt='no search ' loading="lazy">
                                            <h5 class="m-0 text-center text-white"> <?= $this->lang->line('nosearch_heading'); ?></h5>
                                            <p class="text_ac"><?= $this->lang->line('nosearch_paragraph'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>`;
                                $('.pb_wl_card').html(html);
                                $('.top-result').addClass('d-none');
                                $('.cross').removeClass('d-none');
                            }

                        }
                        matomo_search()
                    }
                });
            } else {
                popular_search = true;
                top_search = false;
                $('.cross').removeClass('d-none');
                $('.top-result').addClass('d-none');
                $('.popular_search').removeClass('d-none');
                // Handle the case when search is empty
                $('.showing_result h4').html("");
                $('.showing_result h5').html('');
                $('.pb_wl_card').html('');
            }
        }
</script>
<script>
function handleButtonClick(title, dec_id) {
            var dd = dec_id +'/'+ title;
            // matomo_sear('Search', 'Play', dd);
            queueTrackingDataWithDelay('trackEvent', ["Search", "Play",dd],50);

}
function matomo_sear(user, type, titles, geners = '') {
    var url = '<?= base_url("/web/Home/matomo_hit"); ?>';
    $.ajax({
      url: url,
      type: "POST",
      dataType: "json",
      async: "true",
      data: {
        user: user,
        types: type,
        geners: geners,
        title: titles,
        search_jao :'Search'
        
      },
      success: function(data) {
      },
      error: function(xhr, status, error) {
        //  console.error("Error: " + error);
      }
    });
  }
</script>

<script>

$(window).on('load', function() {
    _paq.push(['setCustomDimension', 4, 'search' ]);
    queueTrackingData('trackEvent', ["Page", "View", "search"]);

  })
    </script>