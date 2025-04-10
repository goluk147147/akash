<?php
if (!empty($all_data['data'])) {
?>
  <?php if (APP_ID == 10) { ?>
    <section class=" mb-5 section_top foooter footer_dt_top">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-md-11 mx-auto mt-4">
            <h5 class="text-white view_all_h5"><?= $all_data['data']['genre_name']; ?></h5>
          </div>
          <div class="col-md-11 m-auto">
            <div class="row">
              <?php foreach ($all_data['data']['content_list'] as $data) {
                $id = aes_cbc_encryption_($data['id']);
                $type_id = aes_cbc_encryption_($data['type_id']);
                $main_id_str = $this->input->get('category_id');
                $main_id_enc = str_replace(" ", '+', $main_id_str);
              ?>
                <div class="col-lg-2 col-md-3 col-sm-6  mt-3 card_detail_sec">
                  <div class="cardDetails cardRes">
                    <?php if ($this->session->id) { ?>
                      <a href="<?= base_url('play-video?id=' . $id . '&&type_id=' . $type_id); ?>">
                      <?php } else { ?>
                        <a href="<?= base_url('/user-login') ?>">
                        <?php } ?>
                        <div class="card__header">
                          <!-- <div class="video-play-button  class_play_image"><span></span></div> -->
                          <img src="<?= $data['movie_poster_url']; ?>" class="position-relative banner_image" alt="poster image">
                        </div>
                        <div class="card_youtube">
                          <div class="user_g p-2">
                            <div class="user__info_youtube">
                              <h5 class="mt-1 m-0"><?= $data['title'] ?></h5>
                              <p class="date_formate_viewall "><?= $data['description'] ?></p>
                            </div>
                          </div>
                          <?php if ($data['ppv_status'] == 0 && $data['ppv_paid'] == 0 || $data['ppv_status'] == 1) { ?>
                            <div class="payment-box">
                              <form action="<?= base_url('/razorpay') ?>" method="POST" class="mb-0 mt-0">
                                <input type="text" name="pid" value="<?= $data['id'] ?>" hidden="">
                                <input type="text" name="TXN_AMOUNT" value="<?= $data['ppv_amount'] ?>" hidden="">
                                <?php if ($data['ppv_amount'] != 0) { ?>
                                  <button type="button" class="cursor_none price_video">₹ <?php echo $data['ppv_amount']; ?>/-</button>
                                  <button type="submit" value="1" name="submit" class="price_video">Buy to Play</button>
                                <?php } else { ?>
                                  <a href="<?= base_url('play-video?id=' . $id . '&&type_id=' . $type_id); ?>"><button type="button" class="price_video">Play Video</button></a>
                                <?php } ?>
                              </form>
                            </div>
                          <?php } else { ?>
                            <a href="<?= base_url('play-video?id=' . $id . '&&type_id=' . $type_id); ?>"><button type="button" class="price_video">Play Video</button></a>
                          <?php } ?>
                        </div>
                        </a>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } else { ?>

    <section class=" mb-5 section_top foooter">
      <div class="container-fluid">
        <div class="row mt-4 m-0">
          <div class="col-md-12 mx-auto mt-3">
            <h5 class="text-white mb-2  d-flex align-items-center view_all_h5 ml-2">
              <!--<a href="" class="mr-2">Webseries</a> <i class="fas fa-angle-right mr-2"></i> Action <i class="fas fa-angle-right ml-2 mr-2"></i>--> <?php echo $all_data['data']['genre_name']; ?>
            </h5>
          </div>
          <div class="mt-2">
            <div class="item_deatils_all mx-4 w-100">
              <?php foreach ($all_data['data']['content_list'] as $data) {
                $id = aes_cbc_encryption_($data['id']);
                $type_id = aes_cbc_encryption_($data['type_id']);
              ?>
                <!--  <div class="item owl_pading"> -->
                <div class="cardDetails mb-4">
                  <?php if ($this->session->id) { ?>
                    <a href="<?= base_url('play-video?id=' . $id . '&&type_id=' . $type_id); ?>">
                    <?php } else if (empty($this->session->id) && $data['is_free'] == 0) { ?>
                      <a href="<?= base_url('play-video?id=' . $id . '&&type_id=' . $type_id); ?>">
                      <?php } else { ?>
                        <a href="<?= base_url('/user-login') ?>">
                        <?php } ?>
                        <?php if ($data['poster_style'] == 1) { ?>
                          <div class="card__header card_big_image">
                            <?php if ($data['is_free'] == 1) { ?>
                              <img class="premium_content" src="<?= base_url('assets/images/prasar_icon.png'); ?>" alt="premium icon">
                            <?php } ?>
                            <?php if ($data['video_type'] == 8 || $data['video_type'] == 4  && $data['is_live'] == 1) { ?>
                              <span class="live_blink"><i class="fa fa-circle fa-fw red"></i>LIVE</span>
                            <?php
                            } ?>
                            <!-- <div class="video-play-button  class_play_image"><span></span></div> -->
                            <img src="<?= $data['movie_poster_url']; ?>" class="position-relative banner_image" alt="poster image">
                          </div>
                        <?php } else { ?>
                          <div class="card__header card_big_image">
                            <?php if ($data['is_free'] == 1) { ?>
                              <img class="premium_content" src="<?= base_url('assets/images/prasar_icon.png'); ?>" alt="premium icon">
                            <?php } ?>
                            <?php if ($data['video_type'] == 8 || $data['video_type'] == 4  && $data['is_live'] == 1) { ?>
                              <span class="live_blink"><i class="fa fa-circle fa-fw red"></i>LIVE</span>
                            <?php
                            } ?>
                            <!-- <div class="video-play-button  class_play_image"><span></span></div> -->
                            <?php if ($all_data['data']['poster_style'] == 0) { ?>
                              <img src="<?= $data['thumbnail_url']; ?>" class="position-relative banner_image" alt="thumbnail">
                            <?php } else { ?>
                              <img src="<?= $data['movie_poster_url']; ?>" class="position-relative banner_image" alt="poster image">
                            <?php } ?>
                          </div>


                        <?php  } ?>


                        <div class="card_youtube">
                          <div class="user_g p-2">
                            <div class="user__info_youtube">
                              <h5 class="mt-1 m-0"><?= $data['title'] ?></h5>
                              <!-- <?= $seconds = $data['playtime']; ?></p>  -->
                              <?php
                              $hours = floor($seconds / 3600);
                              $minutes = floor(($seconds / 60) % 60);
                              $seconds -= $minutes * 60;
                              ?>
                              <p> <span><?= $data['genres_name'] ?> <?php echo date('Y', strtotime($data['released_date'])); ?></span>&nbsp;</p>
                              <p class="date_formate_viewall "><?= $data['description'] ?></p>


                            </div>
                          </div>
                        </div>
                        </a>
                </div>
                <!-- </div> -->
              <?php } ?>
            </div>

          </div>
        </div>
      </div>
    </section>
  <?php } ?>
<?php } else { ?>
  <section class=" mb-5 foooter" style="margin-top:110px;">
    <div class="container">
      <div class="row">

        <div class="col-md-6 m-auto text-center watchListNo">
          <img src="<?= base_url('assets/images/no_data.png'); ?>" class="img-fluid" alt="no data found">
          <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
          <p class="mb-0 text_ac"><?= NoListFound; ?></p>
        </div>
      </div>
    </div>
  </section>
<?php } ?>