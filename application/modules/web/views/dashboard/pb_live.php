<?php

$type = "channels";
if($this->input->get('type')){
    $type = $this->input->get('type');
}
//pre($types); die;
?>
<div class="fav-data"></div>
<section id="data-section" class="d-none">
    <section class="py-3 favourite">
        <div class="container-fluid">
            <div class="row m-0">
                <div class="col-lg-11 mx-auto p-0">
                    <div class="align-items-center videoBack d-none">
                        <a href="javascript:void(0);" class="pb_back" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-chevron-left text-white"></i>
                        </a>
                        <h5 class="text-white f-600 ms-4 search_pb"><?= $this->lang->line('favorites') ?></h5>

                    </div>

                    <div class="for_brdr">
                        <ul class="nav nav-tabs pb_live_channel" id="live_pb" role="tablist">

                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?= ($type == 'channels') ? 'active' : '' ?>" id="Channels-tab" data-bs-toggle="tab" href="#Channels" role="tab" aria-controls="Channels" aria-selected="true"><?= $this->lang->line('channels') ?></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?= ($type == 'radio') ? 'active' : '' ?>" id="Redio-tab" data-bs-toggle="tab" href="#Redio" role="tab" aria-controls="Redio" aria-selected="false"><?= $this->lang->line('radio') ?></a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="tab-content" id="live_pb">

                        <div class="tab-pane fade <?= ($type == 'channels') ? 'show active' : '' ?>" id="Channels" role="tabpanel" aria-labelledby="Channels-tab">
                            <?php if ($this->session->profile_id) { ?>
                                <div class="videoFavorites text-right-gh">
                                    <?php $types = 'channels'; ?>
                                    <a href="<?= site_url('favorite?type=' . $types); ?>" class="d-ils">
                                        <div class="favLive viedoFavClick">
                                            <i class="fas fa-heart"></i>
                                            <p class="m-0"><?= $this->lang->line('favorites') ?></p>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                              <div class="nav_bot_chaneel_buttons">
                            <?php if(!empty($channelTags)){ ?>
                                <?php $lang_id = ucwords(($this->session->userdata('lang_id')) ? $this->session->userdata('lang_id') : 'English'); ?>
                                <?php foreach ($channelTags as $key => $value) {
                                    $title = '';
                                    foreach ($value['title'] as $skey => $svalue) {
                                        if(ucwords($svalue['language']) == $lang_id){
                                            $title = $svalue['content'];
                                            break;
                                        }
                                    } ?>
                                    <button class="btn nav_bot_cata fil-btn-<?=$value['id']?>" onclick="filter_live_data(<?=$value['id']?>)"><?= $title ?></button>
                                <?php } ?>
                            <?php } ?>
                              </div>
                            <div class="pb_channles_flex banner-place" style="display:none;">
                                <?php
                                if (isset($live['data']['channels']) && !empty($live['data']['channels'])) {
                                    foreach ($live['data']['channels'] as $lives) {   /* pre($lives); */
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
                                            <div class="d-flex flex-column justify-content-center w-100">
                                                <div class="col-md-6 m-auto text-center watchListNo">
                                                    <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no-found">
                                                    <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                                    <p class="mb-0 text_ac"><?= NoListFound; ?></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php   } ?>
                            </div>


                            <div class="pb_channles_flex banner_load_af video-section">
                                <?php
                                if (isset($live['data']['channels']) && !empty($live['data']['channels'])) {
                                    foreach ($live['data']['channels'] as $lives) {   /* pre($lives); */
                                        $lives['poster_url'] = !empty($lives['poster_url']) ? $lives['poster_url'] : base_url(PosterPlaceholder);
                                        $id = aes_cbc_encryption_($lives['id']); ?>
                                        <div class="channelBox">
                                            <div class="pb_live_channel_dt position-relative">
                                                <a href="<?= site_url('pb_live_details?id=' . $id); ?>">
                                                    <div class="pb_card">
                                                        <div class="pb_img">
                                                            <img src="<?= $lives['poster_url']; ?>" class="img-fluid" alt="background image">
                                                        </div>
                                                        <?php if ($lives['still_live']) { ?>
                                                            <a href="javascript:void();" class="pb_live_ch">
                                                                <img src="<?= base_url('assets/images/newlive1.gif'); ?>" class="img-fluid" alt="live image">
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
                                            <div class="d-flex flex-column justify-content-center w-100">
                                                <div class="col-md-6 m-auto text-center watchListNo">
                                                    <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no-found">
                                                    <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                                    <p class="mb-0 text_ac"><?= NoListFound; ?></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php   } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade <?= ($type == 'radio') ? 'show active' : '' ?>" id="Redio" role="tabpanel" aria-labelledby="Redio-tab">
                            <?php if ($this->session->profile_id) { ?>
                                <div class="videoFavorites">
                                    <?php $types = 'radio'; ?>
                                    <a href="<?= site_url('favorite?type=' . $types); ?>">
                                        <div class="favLive viedoFavClick">
                                            <i class="fas fa-heart"></i>
                                            <p class="m-0"><?= $this->lang->line('favorites') ?></p>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>

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
                                            <div class="d-flex flex-column justify-content-center w-100">
                                                <div class="col-md-6 m-auto text-center watchListNo">
                                                    <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no-found">
                                                    <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                                    <p class="mb-0 text_ac"><?= NoListFound; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php   } ?>
                            </div>

                            <div class="pb_channles_flex banner_load_af radio-section">
                                <?php
                                if (isset($live['data']['radio']) && !empty($live['data']['radio'])) {
                                    foreach ($live['data']['radio'] as $lives) {
                                        $lives['poster_url'] = !empty($lives['poster_url']) ? $lives['poster_url'] : base_url(PosterPlaceholder);
                                        $id = aes_cbc_encryption_($lives['id']); ?>
                                        <div class="channelBox">
                                            <div class="pb_live_channel_dt position-relative">
                                                <a href="<?= site_url('pb_live_details?id=' . $id.'&type=radio'); ?>">
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
                                            <div class="d-flex flex-column justify-content-center w-100">
                                                <div class="col-md-6 m-auto text-center watchListNo">
                                                    <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no-found">
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
</section>

<section id="shimmer-section" class="py-5">

    <div class=" banner_loader_af banner-place12">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-11 m-auto p-0">
                    <div class="for_brdr">
                        <ul class="nav nav-tabs pb_live_channel mb-4">

                            <li class="nav-item shimmer-animation" role="presentation">
                                <a class="nav-link card_shimmer_op"><?= $this->lang->line('channels') ?></a>
                            </li>
                            <li class="nav-item shimmer-animation" role="presentation">
                                <a class="nav-link card_shimmer_op"><?= $this->lang->line('channels') ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="favLive viedoFavClick shimmer-animation mb-3">

                        <p class="m-0 card_shimmer_op">Favorites</p>

                    </div>

                    <div class="pb_channles_flex">
                        <?php for ($j = 0; $j <= 7; $j++) { ?>
                            <div class="channelBox">
                                <div class="card_shimmer">

                                    <img src="<?= base_url('assets/images/placeholder-poster-img.png'); ?>" class="img-fluid card_shimmer_op" alt="Placeholder">

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>

</section>
<script type="text/javascript">

    document.getElementById('Channels-tab').addEventListener('click', function () {
        matomo("Live", "Select", "LiveChannel");
        changeQueryParameter('type', "<?=$channels?>");
    });
    document.getElementById('Redio-tab').addEventListener('click', function () {
        matomo("Live", "Select", "LiveRadio");
        changeQueryParameter('type', "<?=$radio?>");
    });

    function changeQueryParameter(key, value) {
        let url = new URL(window.location.href);
        url.searchParams.set(key, value);
        window.history.pushState({}, '', url);
    }
    $(document).ready(function() {
        filter_live_data(0, 0);
        filter_live_data(0, 1);
        //remove_shimmer();
    });

    function tile_shimmer(type=0){
        var html = `<div class="pb_channles_flex">
                        <?php for ($j = 0; $j <= 7; $j++) { ?>
                            <div class="channelBox">
                                <div class="card_shimmer">

                                    <img src="<?= base_url('assets/images/placeholder-poster-img.png'); ?>" class="img-fluid card_shimmer_op" alt="Placeholder">

                                </div>
                            </div>
                        <?php } ?>
                    </div>`;
        if(type != 1){
            $('.video-section').html(html);
        }else{
            $('.radio-section').html(html);
        }   
    }

    function filter_live_data(id, type=0){
        if(id >= 0){
            tile_shimmer(type);
            $('.nav_bot_cata').removeClass('active');
            $('.fil-btn-'+id).addClass('active');
            $.ajax({
                url:"<?=base_url('web/live/filter_live_data')?>",
                type:"post",
                data:{id, type},
                success:async function(response){
                    var res = JSON.parse(response);
                    console.log('htmlhtml',res);
                    if(res.status){                        
                        var html = await generate_html(res.data, type);
                        if(type != 1){
                            $('.video-section').html(html);
                        }else{
                            $('.radio-section').html(html);
                        }
                    }else{
                        var html = `<div class="container">
                                        <div class="row">
                                            <div class="d-flex flex-column justify-content-center w-100">
                                                <div class="col-md-6 m-auto text-center watchListNo pb_notfound">
                                                    <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no-found">
                                                    <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                        if(type != 1){
                            $('.video-section').html(html);
                        }else{
                            $('.radio-section').html(html);
                        }
                    }
                    setTimeout(() => {
                        remove_shimmer();
                    }, 200);
                }
            })
        }
    }

    function remove_shimmer(){
        shimmer("hide");
        $('#data-section').removeClass('d-none');
    }

    async function generate_html(data, type){
        var html = '';
        for (let item of data){
            let ids = await aes_cbc_encryption_(item.id);
            let stillLiveHtml = `<a href="javascript:void();" class="pb_live_ch">
                                    <img src="${base_url+'assets/images/newlive1.gif'}" class="img-fluid" alt="live image">
                                </a>`
            html += `<div class="channelBox">
                <div class="pb_live_channel_dt position-relative">
                    <a href="${base_url+'pb_live_details?id='+ids+((type==1)?'&type=radio':'')}">
                        <div class="pb_card">
                            <div class="pb_img">
                                <img src="${item.poster_url}" class="img-fluid" alt="background image">
                            </div>
                            ${item.still_live?stillLiveHtml:''}
                        </div>
                    </a>
                </div>
            </div>`;
        }

        return html;
    }
</script>