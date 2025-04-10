<style type="text/css">
    header {
        position: relative !important;
    }
    .pb_card_img .gen_rat_dts{
    border-radius: 5px;
    aspect-ratio: 3 / 4;
    width:100%;
}
.site-min-height{
    min-height:inherit !important;
}
    @media (min-width: 320px) and (max-width: 600px) {
        .pb_wl_card .pb_card_details {
            width: 33% !important;
            padding:5px;
        }
    }

    @media (min-width: 601px) and (max-width: 900px) {
        .pb_wl_card .pb_card_details {
            width: 18.7%;
        }
    }
</style>
<?php //pre($g_title);die("hshshs");
?>
<section id="shimmer-section" class="py-5">

    <div class=" banner_loader_af banner-place12">

        <div class="container-fluid">


            <div class="pb_wl_card">
                <?php for ($j = 0; $j <= 18; $j++) { ?>
                    <div class="pb_card_details">
                        <div class="card_shimmer">

                            <img src="<?= base_url('assets/images/placholder-img.png'); ?>" class="img-fluid card_shimmer_op" alt="Placeholder">

                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>

</section>
<section class=" mb-5 section_top foooter footer_dt_top no_data_found_yes geners_shimmer_show" style="display:none;">
    <div class="container-fluid">

        <div class="row mt-5 mb-4">
            <div class="col-md-12 m-auto mt-3 col-12">
                <nav class="">
                    <a onclick="history.go(-1)" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>

                        <h5 class="ms-4 text-white watch_cont"></h5>
                    </a>
                </nav>
                <nav class="breadcrumb_device d-none">
                    <ul class="breadcrumb-links">
                        <li>
                        <a href="#" class="breadcrumb-box">
                            <svg class="breadcrumb-icon-home" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                            </svg>
                            <span href="#" class="breadcrumb-text">Home</span>
                        </a>
                        </li>
                        <li>
                        <div class="breadcrumb-box">
                            <svg class="breadcrumb-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                            <a href="#" class="breadcrumb-text">Page one</a>
                        </div>
                        </li>
                        <li>
                        <div class="breadcrumb-box">
                            <svg class="breadcrumb-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                            <a href="#" class="breadcrumb-text">Page two</a>
                        </div>
                        </li>
                        <li>
                        <div class="breadcrumb-box">
                            <svg class="breadcrumb-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                            <a href="#" class="breadcrumb-text">Page three</a>
                        </div>
                        </li>
                    </ul>
                </nav>
                <input type="hidden" id="start" value="1">
            </div>
        </div>
        <div class="row m-coninew">
            <div class="col-md-12 m-auto col-12">
                <div class="mt-2 m-0">
                    <div class="pb_wl_card pb_es_cad">


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<section class=" mb-5 foooter no_data_found" style="display: none;">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12 m-auto mt-3 col-12">
                <nav class="">
                    <a href="<?= base_url(); ?>" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>

                        <h5 class="ms-4 text-white watch_cont1"></h5>
                    </a>
                </nav>
                <input type="hidden" id="start" value="1">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 m-auto text-center" style="margin-top:110px !important" ;>
                <img src="<?= base_url('assets/images/404-imge.svg'); ?>" class="img-fluid" alt="404-image">
                <h5 class="m-0 mt-3 text-center text-white"><?= NoDataFound; ?></h5>
                <p class="mb-0 text_ac"><?= NoListFound; ?></p>
            </div>
        </div>
    </div>
</section>
<?php 
$gen_id = aes_cbc_decryption_($genre);
$lang_id = aes_cbc_decryption_($content_language_id);
//$publisher_id = aes_cbc_decryption_($publisher_id);

?>

<script>
   var genre = "<?= $genre ?>";
    var gen_id = "<?= $gen_id ?>";
    var tag_id = "<?= $tag_id??'' ?>";
    var category = "<?= $category ?>";
    var content_language_id = "<?= $content_language_id??'' ?>";
    var publisher_id = "<?= $publisher_id??'' ?>";
    var playlist = "<?= $playlist??'' ?>";
    var lang_id = "<?= $lang_id ?>";
    var title = "<?= $title ?>";
    var g_title = "<?= $g_title ?? '' ?>";
    var startData = 0;
    var catname = "<?= $catName ??''?>";
    var catId = "<?=$catId ??'' ?>";
    var catTitle = "<?=$catTitle ?>";
    var live = "<?=$live??false ?>";
    var lives = "<?=$lives??false ?>";


    function fetchData() {
        var start = Number($('#start').val());
        if (startData >= start) {
            return false;
        }
        startData = start;
        $.ajax({
            url: "<?= base_url('web/dashboard/get_data') ?>",
            type: 'post',
            data: {
                start,
                category,
                genre,
                content_language_id,
                live,
                lives,
                tag_id,
                publisher_id,
                playlist
            },
            success: function(response) {
                //$('#shimmer-section').remove();
                //applyRowStyles();

                //$('.geners_shimmer_show').css('display', 'none');
                var res = JSON.parse(response);
                if (res.status) {
                    $('.no_data_found_yes').show();
                    $('.no_data_found').hide();
                    if (title == "") {
                        catTitle = res.genres;
                        if(local_strings && local_strings_en){
                            let local_string_key = findKeyByValue(local_strings_en,catTitle);
                            if(local_string_key){
                                catTitle = local_strings.hasOwnProperty(local_string_key)?local_strings[local_string_key]:catTitle
                            }
                        }
                        $('.watch_cont').text(catTitle);
                        queueTrackingDataWithDelay('trackEvent', [catname,"View",catId+"/"+catTitle],1);

                    } else {
                        let page_title = title;
                        if(local_strings && local_strings_en){
                            let local_string_key = findKeyByValue(local_strings_en,page_title);
                            if(local_string_key){
                                page_title = local_strings.hasOwnProperty(local_string_key)?local_strings[local_string_key]:page_title
                            }
                        }
                        $('.watch_cont').text(page_title);
                    }
                    $('#start').val((start + 1));
                    $(".pb_wl_card").append(res.html).show().fadeIn("slow");
                    applyRowStyles()
                } else if (start == 1) {
                    if (title == "") {
                        catTitle = g_title;
                        if(local_strings && local_strings_en){
                            let local_string_key = findKeyByValue(local_strings_en,catTitle);
                            if(local_string_key){
                                catTitle = local_strings.hasOwnProperty(local_string_key)?local_strings[local_string_key]:catTitle
                            }
                        }
                        $('.watch_cont1').text(catTitle);
                        $('.no_data_found_yes').hide();
                        $('.no_data_found').show();
                    } else {
                        catTitle = g_title;
                        if(local_strings && local_strings_en){
                            let local_string_key = findKeyByValue(local_strings_en,catTitle);
                            if(local_string_key){
                                catTitle = local_strings.hasOwnProperty(local_string_key)?local_strings[local_string_key]:catTitle
                            }
                        }
                        $('.watch_cont1').text(catTitle);
                        $('.no_data_found_yes').hide();
                        $('.no_data_found').show();
                        // $('.no_data_found_yes').hide();
                        // $('.no_data_found').show();
                        //$('.watch_cont1').text(title);
                    }
                }
                
                if(($(document).height() ) <= 2*($(window).height())){
                    fetchData();
                }
                $('#shimmer-section').remove();
                hasscroll = false;
            }
        });
    }

    fetchData();
    var hasscroll = false;
    $(window).on('scroll', function() {
        var distanceFromBottom = $(document).height() - ($(window).scrollTop() + $(window).height());
        if (distanceFromBottom <= (2*$(window).height()) && hasscroll == false) {
            //start++;
            fetchData();
            hasscroll = true;
            applyRowStyles();
        } 
        // else if (distanceFromBottom >= ($(window).height()) && hasscroll == true) {
        //     hasscroll = false;
        // }
    });

    $(document).on('click','.pb_card_details',function() {
        var $this = $(this);  // Use jQuery to refer to the clicked element
    var idc = $this.data('id');  // Get the data-id attribute
    var titlec = $this.data('title');
     if(catname == 'Language'){
    //  matomo('Genres', 'ContentSelected', gen_id +'/'+ title);
     queueTrackingData('trackEvent', ['ContentLanguage', "ContentSelected","("+catTitle+")"+idc +'/'+ titlec]);
         }else if(catname == 'Genres'){
            queueTrackingData('trackEvent', ['PopularGenres', "ContentSelected","("+catTitle+")"+idc +'/'+ titlec]);
            // matomo('Genres', 'ContentSelected', lang_id +'/'+ title);
        }else{
            queueTrackingData('trackEvent', [catname, "ContentSelected",catTitle+"/"+idc +'/'+ titlec]);

        }

  });
    function applyRowStyles() {
        const container = document.querySelector('.pb_wl_card');

        if (!container) {
            console.error('Container not found');
            return;
        }

        const items = container.querySelectorAll('.pb_card_details');

        if (items.length === 0) {
            console.error('No items found');
            return;
        }

        const itemWidth = items[0].offsetWidth;
        const marginRight = parseFloat(getComputedStyle(items[0]).marginRight) || 0;
        const itemsPerRow = Math.floor(container.offsetWidth / (itemWidth + marginRight));

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
</script>
<script>
    
    function matomo(user, type, titles, geners = '') {
    $.ajax({
      type: 'POST',
      url: '<?= base_url('/web/Watchlist/add_to_watchlist') ?>',
      dataType: "json",
      data: {
        user: user,
        types: type, // Typo here, it should be type instead of types
        geners: geners,
        title: titles
      },
      success: function(data) {
        if (data.status == 1) {

        }
      }
    });
  }

  $(window).on('load', function() {
    var catname = "<?= $catName??'' ?>";

        // if(catname == 'Language'){
        // queueTrackingData('trackEvent', ["Home","Select","Content"+catname+"("+catTitle+")"]);
        // }else if(catname == 'Genres'){
        // queueTrackingData('trackEvent', ["Home","Select","Popular"+catname+"("+catTitle+")"]);
        // }else{
        //     queueTrackingData('trackEvent', ["Home","Select",catname+"("+catTitle+")"]);

        // }
        if(catTitle){
        queueTrackingDataWithDelay('trackEvent', [catname+"Page","View",catId+"/"+catTitle],10);

        queueTrackingDataWithDelay('trackEvent', [catname,"List",catId+"/"+catTitle],50);
        }

  })

  function queueTrackingDataWithDelay(method, params, delay) {
    setTimeout(() => {
        queueTrackingData(method, params);
    }, delay);
}

   </script>
