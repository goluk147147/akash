<style>
    .d-none {
        display: none !important;
    }
    .watchListNo {
    height: 72vh !important;
}
.no_dt_found{
min-height:inherit !important;
}
@media only screen and (min-width: 1450px) {
     .watchListNo {
    height: 80vh !important;
}
}

</style>
<?php  $lang_title = ($this->session->lang_id)?ucwords($this->session->lang_id):"English";
                                                  $descriptions = ''; ?>
<section class="py-3">
    <div class="container-fluid">
        <div class="row m-coninew">
            <div class="col-md-12 m-auto col-12">
                <nav class="watchnav_back">
                    <a onclick="history.go(-1)" class="d-flex align-items-center pb_back mt-4 ">
                        <i class="fa fa-chevron-left text-white"></i>
                        <h5 class="text-white f-600 ms-4 search_pb"><?=  $this->lang->line('rental');?></h5>
                    </a>
                </nav>
            </div>
        </div>
        <div class="row pt-5 m-0s">
            <div class="col-lg-12 mb-4 d-none">
                <div class="w-100">
                    <h4 class="text-white m-0 liveVideoHead live-vid-m"><?=  $this->lang->line('subscribed-channels');?></h4>
                    <div class="carousel_bott owl-carousel owl-theme pt-4 liveVedioArrow banner_load_af">

                        <div class="cardDetails shadow card_hover_item videoCard">
                            <a href="javascript:void(0);">
                                <div class="pb_card">
                                    <div class="pb_img">
                                        <img src="<?= base_url('assets/images/poster_tv.png'); ?>" class="img-fluid" alt="poster image">
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div class="cardDetails shadow card_hover_item videoCard">
                            <a href="javascript:void(0);">
                                <div class="pb_card">
                                    <div class="pb_img">
                                        <img src="<?= base_url('assets/images/poster_tv.png'); ?>" class="img-fluid" alt="poster image">
                                    </div>

                                </div>
                            </a>

                        </div>


                    </div>
                </div>

            </div>
            <div class="col-lg-12">
                <div class="w-100 mt-2">
                    <?php  if (isset($t_vod['data'])  && (!empty($t_vod['data']))) {?>
                    <h4 class="text-white m-0 liveVideoHead live-vid-m"><?=  $this->lang->line('rental');?></h4> 
                    <?php } ?>
                    <div class="pb_wl_card liveVideoHead pt-3">
                        
                         <?php 
                         if (isset($t_vod['data']) && is_array($t_vod['data']) && (!empty($t_vod['data']))) {
                         foreach($t_vod['data'] as $vod){
                            $id = aes_cbc_encryption_($vod['id']);
                            ?>
                            <a href="<?= base_url('play-video?id=') . $id ?>">
                                <div class="pb_card_details" data-id="<?= $vod['id']; ?>" data-title="<?= $vod['title']; ?>" data-genres="<?=  $vod['genres']; ?>">

                                    <div class="pb_card_img ">
                                        <img src="<?=$vod['thumbnail']?>" class="img-fluid" alt="thumbnail" loading="lazy">
                                    </div>

                                    <div class="pb_card_img2">
                                        <div class="pb_card_vd-2 position-relative">
                                            <img src="<?=$vod['poster_url']?>" class="img-fluid" alt="poster image" loading="lazy">
                                        </div>
                                        <div class="pb_card_content">
                                            <h6><?=$vod['title']?></h6>
                                                 <?php
                                                  if (is_array($vod['description'])) {
                                                      foreach ($vod['description'] as $desc) { 
                                                          if ($desc['language'] === $lang_title) {
                                                              $descriptions = $desc['content'];
                                                              break;
                                                          }
                                                      }
                                                      
                                                  }
                                                  $genres =((!empty($vod['genres'])) ? implode(' | ', array_slice(explode(',', $vod['genres']), 0, 3)) : '');//  isset($item['genres']) ? str_replace(',', ' | ', $item['genres']) : '';   

                                                ?>
                                            <p class="discription_gen"><?= $genres?></p>
                                            <p class="discription_dt"><?= $descriptions?></p>
                                            <div class="d-flex align-items-center mt-1 pb_add_btns pb_card_watch categaryAddBtn">
                                                <a href="<?= base_url('play-episode?id=') . $id ?>" class="pb_watch_btn d-block">
                                                    <img class="img-fluid watchCardImg" src="<?= base_url('assets/images/playBtn.png') ?>" alt="watch card">
                                                   <?= $this->lang->line('Watchnow')?>
                                                </a>
                                                <div>
                                                    <!-- <a href="javascript:void(0);" class="pb_add d-block ">
                                                        <img class="img-fluid playAdd" src="<?= base_url('assets/images/jointWatch.png') ?>" alt="join watch">
                                                    </a> -->
                                                    <!-- <a href="<?= base_url('play-episode?id=') . $id ?>" class="pb_add bg-green d-block ms-2 d-none">
                                                        <img class="img-fluid playAdd" src="<?= base_url('assets/images/click.svg') ?>" alt="join watch">
                                                    </a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php }
                            }else{
                            ?>
                            <div class="col-md-12 m-auto text-center watchListNo">
                            <div class="no_dt_found">
                            <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
                            <h5 class="m-0 text-center text-white"><?= $this->lang->line('norental_heading'); ?></h5>
                            <p class="mb-0 text_ac"><?= $this->lang->line('norental_paragraph'); ?></p>
                            </div>
                            </div>
                                <?php } ?>

                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<script>
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

    $(window).on('load', function() {
        
        queueTrackingDataWithDelay('trackEvent', ['Page', 'View', 'Subscription&Rental'],100);
        queueTrackingDataWithDelay('trackEvent', ['Subscription&Rental', 'List'],200);

  })

   $(document).on("click", ".pb_card_details", function(event) {
        event.stopPropagation();
        var id = $(this).data('id');
           var title = $(this).data('title');
           var genres = $(this).data('genres')!='undefined'? $(this).data('genres'):'-';
           queueTrackingData('trackEvent', ["Subscription&Rental", 'ContentSelected', id + '/' + title],0);    
    });
</script>