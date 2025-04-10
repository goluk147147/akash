<section class="upcomin_programs py-5">
    <div class="container-fluid">
        <div class="row m-coninew">
            <div class="col-md-12">
                <div>
                    <a onclick="history.go(-1)" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>

                        <h5 class="ms-4 text-white watch_cont"><?= $this->lang->line("upcoming-program") ?></h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="row m-coninew">
            <div class="col-md-12">
                <div class="upcoming_shows mt-5">
                    <nav class="episodes_tab_btns">
                        <div class="nav nav-tabs ep_tab_dt" id="nav-tab" role="tablist">
                            <?php foreach ($totalDay as $key => $value) { ?>
                                <button class="nav-link <?= ($key == 0) ? 'active' : '' ?>" id="upcoming_<?= $key ?>-tab" data-bs-toggle="tab" data-bs-target="#upcoming_<?= $key ?>" type="button" role="tab" aria-controls="upcoming_<?= $key ?>"><?= $value ?></button>
                            <?php } ?>
                        </div>
                    </nav>

                    <div class="tab-content mt-4" id="nav-tabContent">
                        <?php foreach ($totalDay as $key => $value) { ?>
                            <div class="tab-pane fade <?= ($key == 0) ? 'show active' : '' ?>" id="upcoming_<?= $key ?>" role="tabpanel" aria-labelledby="upcoming_<?= $key ?>-tab">
                                <div class="upcoming_program_details pb_channles_flex">

                                    <?php foreach ($epgDetailData['data']['upcoming_shows'] as $skey => $svalue) { ?>
                                        <?php if (((string)$svalue['date'] === (string)$value)) { ?>
                                            <div class="channelBox " data-title="<?= $svalue['title'] ?>" data-date="<?= date('D, d F', $svalue['start']) ?>" data-time="<?= date('h:i A', $svalue['start']) ?>">
                                                <a href="javascript:void(0)">
                                                    <div class="pb_live_channel_dt upcoming-show" onclick="get_channel_details('<?= $svalue['id'] ?>', 'upcoming', '<?= $svalue['title'] ?>', '<?= $svalue['start'] ?>', '<?= $svalue['thumbnail_url'] ?>')">
                                                        <div class="upcomin_img past_sh_vi" data-epg_id="<?=$svalue['id']?>" data-channel_id="<?=$svalue['channel_id']?>" data-content_id="<?=$svalue['video_id']?>" data-title="<?=$svalue['title']?>">
                                                            <img src="<?= $svalue['thumbnail_url'] ?? base_url() . PosterPlaceholder ?>" class="img-fluid" alt="upcoming_program">
                                                        </div>
                                                        <div class="contentupcoming py-2">
                                                            <h6 class="episodeOne text-white m-0"><?= $svalue['title'] ?></h6>
                                                            <p class="mb-0"> <img src="<?= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time"><?= date('D, d F', $svalue['start']) ?> <span class="dot_upcoming"></span> <?= date('h:i A', $svalue['start']) ?></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                </div>
                            </div>
                        <?php } ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<Script>
    // function open_modal() {
    //     $('.upcoming-show').on('click', function() {
    //         var title = $(this).data('title');
    //         var date = $(this).data('date');
    //         var time = $(this).data('time');
    //         $('#upcoming-title').html(title);
    //         $('#upcoming-date').html('<img src="<?= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time">' + date + ' <span class="dot_upcoming"></span> ' + time);
    //         $('#upcominModal').modal('show');
    //     });
    // }
    // $(document).ready(function() {
    //     open_modal();
    // })

    function date_format(timestamp) {
        var timestamp = Number(timestamp);
        var formattedDate;
        try {
            const date = new Date(timestamp);
            formattedDate = new Intl.DateTimeFormat('en-US', {
                day: '2-digit',
                month: 'long',
                dayOfWeek: 'short'
            }).format(date);
        } catch (error) {
            formattedDate = 'N/A';
        }
        return formattedDate;
    }

    function time_format(timestamp) {
        var timestamp = Number(timestamp);
        var formattedTime;
        try {
            const time = new Date(timestamp);
            formattedTime = new Intl.DateTimeFormat('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            }).format(time);
        } catch (error) {
            formattedTime = 'N/A';
        }
        return formattedTime;
    }

    var totalDayJson = <?= $totalDayJson ?>;

    function getEpgData() {
        $.ajax({
            url: "<?= base_url('web/live/epgDetailsData') ?>",
            type: "post",
            data: {
                'id': 466,
                'key': 'upcoming_shows'
            },
            success: function(res) {
                console.log(res);
                var res = JSON.parse(res);
                if (res.status) {
                    var past_html = '';
                    totalDayJson.forEach((item, key) => {
                        past_html += `<div class="tab-pane fade ` + ((key == 0) ? 'show active' : '') + `" id="upcoming_` + key + `" role="tabpanel" aria-labelledby="upcoming_` + key + `-tab">
                                <div class="upcoming_program_details pb_channles_flex">`;
                        res.data.upcoming_shows.forEach((sitem, skey) => {
                            var date = date_format(sitem.start * 1000);
                            var time = time_format(sitem.start * 1000);
                            if ((sitem.date == item)) {
                                past_html += `<div class="channelBox " data-title="` + sitem.title + `" data-date="` + date + `" data-time="` + time + `">
                                                <div class="pb_live_channel_dt upcoming-show">
                                                    <div class="upcomin_img">
                                                        <img src="` + sitem.thumbnail_url + `" class="img-fluid" alt="upcoming_program">
                                                    </div>
                                                    <div class="contentupcoming py-2">
                                                        <h6 class="episodeOne text-white m-0">` + sitem.title + `</h6>
                                                        <p class="mb-0"> <img src="<?= base_url('assets/images/time.svg'); ?>" class="img-fluid" alt="time">` + date + ` <span class="dot_upcoming"></span> ` + time + `</p>
                                                    </div>
                                                </div>
                                            </div>`;
                            }
                        })

                        past_html += `</div>
                                                </div>`;
                    });
                    $('#nav-tabContent').html(past_html);
                    // open_modal();
                }
            }
        })
    }


    const targetTimestamps = <?= $totalEndTime ?>;

    function runScriptAtTimestamp(timestamp) {
        var timestamp = Number(timestamp);
        const targetTimestamp = timestamp * 1000;
        const currentTimestamp = Date.now();
        const delay = targetTimestamp - currentTimestamp;

        if (delay > 0) {
            setTimeout(() => {
                // $('.channelBox[data-end='+timestamp+']').css('display','none');
                getEpgData();
            }, delay);
        }
    }

    // Schedule execution for each timestamp in the array
    targetTimestamps.forEach(timestamp => {
        runScriptAtTimestamp(timestamp);
    });
    $('.past_sh_vi').on('click', function(){
         var title = $(this).data('title');
         var epg_id = $(this).data('epg_id');
         var channel_id = $(this).data('channel_id');
         var content_id = $(this).data('content_id');
        //  alert(epg_id);
        //  matomo_live_tracker('Upcoming', 'ContentSelected', epg_id + '/' + channel_id +'/'+ content_id +'/'+ title +'/'+'Video');
         queueTrackingData('trackEvent', ['Upcoming', "ContentSelected",epg_id + '/' + channel_id +'/'+ content_id +'/'+ title +'/'+'Video']);

        
      });
      function matomo_live_tracker(user, type, title, hits = 4) {
         $.ajax({
            type: 'POST',
            url: "<?= base_url('/web/Home/matomo_hit') ?>",
            dataType: "json",
            data: {
               user: user,
               types: type, // Typo here, it should be type instead of types
               type: hits,
               title: title
            },
            success: function(data) {
               if (data.status == 1) {}
            }
         });
      }
</script>