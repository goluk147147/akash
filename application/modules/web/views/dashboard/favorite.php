<style>
    /* header {
        position: sticky !important;
        top: 0;
    } */
</style>
<section class="py-5">
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-lg-11 mx-auto p-0">
                <div class="align-items-center videoBack d-flex">
                    <a onclick="window.history.go(-1); return false;" class="pb_back" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-chevron-left text-white mt-1"></i>
                    </a>
                    <h5 class="text-white f-600 ms-4 search_pb"><?= $this->lang->line('favorites') ?></h5>

                </div>

                <div class="for_brdr">
                    <ul class="nav nav-tabs pb_live_channel" id="live_pb" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?= ($types == 'channels') ? 'active' : '' ?>" id="Channels-tab" data-bs-toggle="tab" href="#Channels" role="tab" aria-controls="Channels" aria-selected="true"><?= $this->lang->line('channels') ?></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?= ($types == 'radio') ? 'active' : '' ?>" id="Redio-tab" data-bs-toggle="tab" href="#Redio" role="tab" aria-controls="Redio" aria-selected="false"><?= $this->lang->line('radio') ?></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="live_pb">

                    <div class="tab-pane fade <?= ($types == 'channels') ? 'show active' : '' ?>" id="Channels" role="tabpanel" aria-labelledby="Channels-tab">

                        <!-- <div class="videoFavorites hide">
                        <div class="favLive viedoFavClick" >
                            <i class="fa-regular fa-heart"></i>
                            <p class="m-0">Favorites</p>
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div> -->


                        <div class="pb_channles_flex banner-place" style="display:none;">
                            <?php
                            if (isset($live['data']['channels']) && !empty($live['data']['channels'])) {
                                foreach ($live['data']['channels'] as $lives) {   // pre($lives); 
                                    $id = aes_cbc_encryption_($lives['id']); ?>
                                    <div class="channelBox card_shimmer mb-3">
                                        <div class="">
                                            <img src="<?= base_url('assets/images/placeholder-poster-img.png'); ?>" class="img-fluid card_shimmer_op" alt="placeholder">

                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="d-flex flex-column justify-content-center watchListNo w-100">
                                            <div class="col-md-6 m-auto text-center ">
                                                <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no-list">
                                                <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                                <p class="mb-0 text_ac"><?= NoListFound; ?></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php   } ?>
                        </div>


                        <div class="pb_channles_flex banner_load_af" id="chanList">
                            <!-- channels list append here -->

                        </div>
                    </div>
                    <div class="tab-pane fade <?= ($types == 'radio') ? 'show active' : '' ?>" id="Redio" role="tabpanel" aria-labelledby="Redio-tab">


                        <div class="pb_channles_flex banner-place" style="display:none;">
                            <?php
                            if (isset($live['data']['radio']) && !empty($live['data']['radio'])) {
                                foreach ($live['data']['radio'] as $lives) {
                                    $id = aes_cbc_encryption_($lives['id']); ?>
                                    <div class="channelBox card_shimmer mb-3">
                                        <div class="">
                                            <img src="<?= base_url('assets/images/placeholder-poster-img.png'); ?>" class="img-fluid card_shimmer_op" alt="placeholder">

                                        </div>
                                    </div>

                                <?php }
                            } else { ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="d-flex flex-column justify-content-center watchListNo w-100">
                                            <div class="col-md-6 m-auto text-center ">
                                                <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no-list">
                                                <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                                <p class="mb-0 text_ac"><?= NoListFound; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php   } ?>
                        </div>

                        <div class="pb_channles_flex banner_load_af" id="audList">
                            <?php
                            if (isset($live['data']['radio']) && !empty($live['data']['radio'])) {
                                foreach ($live['data']['radio'] as $lives) {
                                    $id = aes_cbc_encryption_($lives['id']); ?>
                                    <div class="channelBox">
                                        <div class="pb_live_channel_dt position-relative">
                                            <a href="<?= site_url('pb_live_details?id=' . $id); ?>">
                                                <div class="pb_card">
                                                    <div class="pb_img2">
                                                        <img src="<?= $lives['poster_url']; ?>" class="img-fluid" alt="background">

                                                    </div>
                                                    <?php if ($lives['still_live']) { ?>
                                                        <a href="javascript:void();" class="pb_live_ch">
                                                            <img src="<?= base_url('assets/images/newlive1.gif'); ?>" class="img-fluid" alt="pb live png"> 
                                                        </a>

                                                    <?php } ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                <?php }
                            } else { ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="d-flex flex-column justify-content-center watchListNo w-100">
                                            <div class="col-md-6 m-auto text-center">
                                                <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no-list">
                                                <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                                <p class="mb-0 text_ac"><?= NoListFound; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php   } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    var favKey0 = "<?=($this->session->profile_id??0).'-0favourites'?>";
    var favKey1 = "<?=($this->session->profile_id??0).'-1favourites'?>";

    async function favouriteData(key,id='chanList'){
        var html = '';
        try{
            var cache = await caches.open('appCache');
            var cachedResponse = await cache.match(key);
            if (cachedResponse) {
              var cachedData = await cachedResponse.json();
              if (cachedData.data) {
                var count = 0;
                cachedData.data.forEach((item)=>{
                    if (item.is_deleted != 1) {
                        count += 1;
                        item.poster_url = item.poster_url?item.poster_url:'<?=base_url(PosterPlaceholder)?>';
                        html += '<div class="channelBox"><div class="pb_live_channel_dt position-relative fav_cha"><a href="'+base_url+'pb_live_details?id='+item.enc_id+ ((id=='audList')?'&type=radio':'')+'"><div class="pb_card"><div class="pb_img2 "><img src="'+ item.poster_url +'" class="img-fluid" alt="background"></div>';
                            if (item.still_live) {
                        html += '<a href="javascript:void();" class="pb_live_ch"><img src="'+ base_url +'assets/images/newlive1.gif" class="img-fluid" alt="pb live png">'
                              + '</a>';

                            }
                        html += '</div></a></div></div>';
                                                
                    }
                });
                if (count == 0) {
                    html += '<div class="container"><div class="row"><div class="d-flex flex-column justify-content-center w-100 watchListNo"><div class="col-md-6 m-auto text-center"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+"<?= NoDataFound; ?>"+'</h5><p class="mb-0 text_ac">'+"<?= NoListFound; ?>"+'</p></div></div></div></div>';
                }
              }else{
                html += '<div class="container"><div class="row"><div class="d-flex flex-column justify-content-center w-100 watchListNo"><div class="col-md-6 m-auto text-center"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+"<?= NoDataFound; ?>"+'</h5><p class="mb-0 text_ac">'+"<?= NoListFound; ?>"+'</p></div></div></div></div>';
              }
            }else{
                html += '<div class="container"><div class="row"><div class="d-flex flex-column justify-content-center watchListNo w-100"><div class="col-md-6 m-auto text-center"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+"<?= NoDataFound; ?>"+'</h5><p class="mb-0 text_ac">'+"<?= NoListFound; ?>"+'</p></div></div></div></div>';
            }
            $('#'+id).html(html);
        }catch (error){
            html += '<div class="container"><div class="row"><div class="d-flex flex-column justify-content-center w-100 watchListNo"><div class="col-md-6 m-auto text-center"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+"<?= NoDataFound; ?>"+'</div>';
            $('#'+id).html(html);
        }
    }

    favouriteData(favKey0,'chanList');
    favouriteData(favKey1,'audList');

    document.getElementById('Channels-tab').addEventListener('click', function () {
        changeQueryParameter('type', "<?=$channels?>");
    });
    document.getElementById('Redio-tab').addEventListener('click', function () {
        changeQueryParameter('type', "<?=$radio?>");
    });

    function changeQueryParameter(key, value) {
        let url = new URL(window.location.href);
        url.searchParams.set(key, value);
        window.history.pushState({}, '', url);
    }
    
</script>
<script>
  $(document).on('click','.fav_cha',function() {
    //  matomo('Fav.Channel', 'Select', 'LiveChannel');
    queueTrackingData('trackEvent', ["Fav.Channel", "Select",'LiveChannel']);

  }); 

$(document).ready(function() {
    $('#Channels-tab').on('click', function() {
        // matomo('Page', 'View', 'Fav.Channel');
        queueTrackingData('trackEvent', ["Page", "View",'Fav.Channel']);
    });
  });
  $(document).ready(function() {
    $('#Redio-tab').on('click', function() {
        // matomo('Page', 'View', 'Fav.Radio');
        queueTrackingData('trackEvent', ["Page", "View",'Fav.Radio']);
    });
  });
  
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
</script>