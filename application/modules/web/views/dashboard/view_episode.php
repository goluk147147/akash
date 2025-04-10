<?php $lang_title = ucwords($this->session->lang_id); 
$cur_season = $this->input->get('dgh')?$this->input->get('dgh'):0;
if(!is_numeric($cur_season)){
    $cur_season = 1;
}
$cur_season = $cur_season - 1;
if($cur_season < 0 || ($cur_season >= count($sessons))){
    $cur_season = 0;
}
//pre(json_encode($sessons)); die;
?>
<section class="mb-5 section_top foooter episode_body episode_bodys vie_spd footer_dt_top no_data_found_yes">
    <div class="container-fluid">
        <div class="row mt-5 mb-4">
            <div class="col-md-12 m-auto mt-3 col-12">
                <nav class="epd-h">
                    <a onclick="history.go(-1)" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>
                        <h5 class="ep_heading ms-4"><?= $this->lang->line('episodes'); ?></h5>
                    </a>
                </nav>
            </div>
        </div>
        <div class="row m-coninew p-2">
            <div class="episodes_tab_btns pt-4">
            <?php 
            
            if(is_array($sessons) && count($sessons)){ 
                usort($sessons, function ($a, $b) {
                    return $a['number'] - $b['number'];
                });
            }
            
            if ($sessons): ?>
                <?php if (count($sessons) > 1): ?>
                    <nav class="mb-3">
                        <div class="nav nav-tabs ep_tab_dt" id="nav-tab" role="tablist">
                            <?php foreach ($sessons as $key => $sess): 
                                $activeClass = ($key === $cur_season) ? 'active' : '';
                            ?>
                                <a class="nav-link <?= $activeClass ?>" id="season<?= $sess['id'] ?>-tab" data-bs-toggle="tab" href="#season<?= $sess['id'] ?>" role="tab" aria-controls="season<?= $sess['number'] ?>" aria-selected="<?= ($key === 0) ? 'true' : 'false' ?>">
                                    <?= $sess['title'] ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </nav>
                <?php endif; ?>

                <div class="tab-content pt-2" id="nav-tabContent">
                    <?php foreach ($sessons as $key => $sess): 
                        $activeClass = ($key === $cur_season) ? 'show active' : 'fade';
                    ?>
                        <div class="tab-pane <?= $activeClass ?>" id="season<?= $sess['id'] ?>" role="tabpanel" aria-labelledby="season<?= $sess['id'] ?>-tab">
                            <div class="episodeSEction">
                                <?php if (isset($sess['videos']) && $sess['videos']): ?>
                                    <?php foreach ($sess['videos'] as $vod):  
                                        // Only show non-trailer videos
                                        if ($vod['is_trailer'] != 1): 
                                            $descriptions = '';
                                            
                                            // Set description based on available language data
                                            if (is_array($vod['description'])) {
                                                foreach ($vod['description'] as $desc) {
                                                    if ($desc['language'] === "English") {
                                                        $descriptions = $desc['content'];
                                                        break;
                                                    }
                                                }

                                                // Check for description in the current language
                                                if (isset($lang_title)) {
                                                    foreach ($vod['description'] as $desc) {
                                                        if ($desc['language'] === $lang_title) {
                                                            $descriptions = $desc['content'];
                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                            
                                            // Retrieve the video ID and prepare encrypted URL
                                            $lasts = isset($_GET['play-video']) ? $_GET['play-video'] : '';
                                            $enc_id = aes_cbc_encryption_($vod['id']);
                                            ?>
                                            <div class="playepsode_list">
                                                <div class="episodeFullBox_detail episodeFullBox">
                                                    <a href="<?= base_url('play-media?id=' . $enc_id . '&play-video=' . $lasts) ?>">
                                                        <div class="position-relative epd">
                                                            <img class="img-fluid w-100" src="<?= $vod['poster_url'] ?? base_url('assets/images/placeholder-poster-img.png') ?>" alt="<?= htmlspecialchars($vod['title'], ENT_QUOTES) ?>">
                                                        </div>
                                                        <div class="py-2">
                                                            <p class="episodeOne text-white m-0"><?= htmlspecialchars($vod['title'], ENT_QUOTES) ?></p>
                                                            <span class="epsid_desc"><?= htmlspecialchars($descriptions, ENT_QUOTES) ?></span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-white">No videos available for this season.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>
            </div>
        </div>
    </div>
</section>
