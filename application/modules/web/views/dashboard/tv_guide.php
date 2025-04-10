
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/tv_guide.css'); ?>"> 
<style>
    .payment_loader2{
        background: #000000b0 !important;
    }
   .tab-top-padd{
    padding-top:30px;
   }
   body{
    background: inherit !important;
    background-color:inherit !important;
   }
   .footer-area.footer_bg_col{
        margin-top:0 !important;
   }
   .no-channel-data{
        /* border:1px solid #ccc;
        border-radius: 5px; */
   }
    .no-channel-data .watchListNo{
         display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        height:inherit !important;
        padding-top:20px;
   }
   .show_height_none{
    height:inherit !important;
    overflow:inherit !important;
   }
   .margin-20{
        height:calc(95vh * 0.49)!important;
   }
    .header_dtes {
    padding-top: 0 !important;
}
</style>
<script src="<?= base_url('assets/website_assets/js/jquery.min.js'); ?>"></script>
<?php 
$is_login = ($this->session->userdata('id'))?"YES":"NO";
$is_fav = (isset($fav_page))?"YES":"NO";
$types = "channels";
$padd_class = "";
if($is_fav == "YES"){ 
    $padd_class = "tab-top-padd";
?>

<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
<?php } ?>
<section class="py-5 channel_guide channel_guides px-5 pt-5">
    <?php if($is_fav == "YES"){ ?>
        <div class="align-items-center videoBack d-flex">
            <a onclick="window.history.go(-1); return false;" class="pb_back" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-chevron-left text-white"></i>
            </a>
            <h5 class="text-white f-600 ms-4 search_pb"><?= $this->lang->line('favorites') ?></h5>
        </div>
    <?php } ?>
    <div class="for_brdr pt-5">
        <ul class="nav nav-tabs pb_live_channel" role="tablist">
            <li class="nav-item live_ch" role="presentation">
                <a class="nav-link nav-channel-content <?= ($types == 'channels') ? 'active' : '' ?>" id="Channels-tab" data-bs-toggle="tab" href="#Channels" role="tab" aria-controls="Channels" aria-selected="true"><?= $this->lang->line('channels') ?></a>
            </li>
            <li class="nav-item live_ra" role="presentation">
                <a class="nav-link nav-channel-content <?= ($types == 'radio') ? 'active' : '' ?>" id="Redio-tab" data-bs-toggle="tab" href="#Redio" role="tab" aria-controls="Redio" aria-selected="false"><?= $this->lang->line('radio') ?></a>
            </li>
        </ul>
    </div>
    <?php if($is_fav == "NO" && $is_login == "YES"){ ?>
        <div class="container-fluid mt-2 px-4">
        <div class="pb-1 col-sm-12 text-right m-auto d-flex justify-content-end"> 
            <button class="btn favoritesBtn" onclick="goto_fav()"> <i class="fa-regular fa-heart"></i> &nbsp; <?= $this->lang->line('favorites'); ?>&nbsp; <i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>
    <?php } ?>
    <div class="tab-content <?=$padd_class;?>" id="live_pb">
        <div class="container-fluid tab-pane mt-0 fade show active" id="Channels" role="tabpanel" aria-labelledby="Channels-tab">
            <div class="container_epg">
                <div class="days-bar">
                    <button class="scroll-left"><i class="fas fa-chevron-left"></i></button>
                    <div class="days-wrapper">
                        <div class="days"></div>
                    </div>
                    <button class="scroll-right"><i class="fas fa-chevron-right"></i></button>
                </div>
                
                <div class="channels">
                    <div class="shows-wrapper">
                    <div class="time-bar-wrapper">
                        <div class="time-bar">
                            <!-- <button class="live-button">Go Live</button> -->
                        </div>
                    </div>
                    <div class="current-time-indicator">
                        <div class="marker"></div>
                    </div>
                    <div class="flex position-absolute pt-3">
                        <div class="channel-names"></div>
                        <div class="shows-container">
                    </div>
                    </div>
                        <div class="now-vertical-line" style="left: 574px;width: 50%;">
                        <div class="vert-line"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0 tab-pane fade <?= ($types == 'radio') ? 'show active' : '' ?>" id="Redio" role="tabpanel" aria-labelledby="Redio-tab">
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
                            <div class="d-flex no-channel-data flex-column justify-content-center w-100">
                                <div class="col-md-6 m-auto text-center watchListNo">
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
                if($is_fav == "NO"){
                    if (isset($live['data']['radio']) && !empty($live['data']['radio'])) {
                        foreach ($live['data']['radio'] as $lives) {
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
                                <div class="d-flex no-channel-data flex-column justify-content-center w-100">
                                    <div class="col-md-6 m-auto text-center watchListNo">
                                        <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no-list">
                                        <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                        <p class="mb-0 text_ac"><?= NoListFound; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php   } 
                } 
                ?>
            </div>
        </div>
    </div>
</section>


<script src="<?php echo base_url('assets/website_assets/js/moment.min.js'); ?>"></script>
<script src="<?= base_url('assets/website_assets/js/cookies_min.js'); ?>"></script> 
<?php 

$marker_position = 29.695;    //01:00(24.5) 17:00(29.61), 18:00(29.63) 23:00(29.695)
$marker_position_past = 9692;
$marker_position_future = 1;

$marker_display_status = "YES";
 ?>
<script>
    var pageType = "<?= $this->input->get('type')??'tv' ?>";
    if(pageType=='radio'){
        var tabEl = document.querySelector('#Redio-tab');
        var tab = new bootstrap.Tab(tabEl);
        tab.show();
    }

    marker_position = null;
    $(document).ready(async function () {
        document.getElementById('Channels-tab').addEventListener('click', function () {
            refresh_tv_guide();
            changeQueryParameter('type', 'channel');
        });
        document.getElementById('Redio-tab').addEventListener('click', function () {
            changeQueryParameter('type', 'radio');
        });

        function changeQueryParameter(key, value) {
            let url = new URL(window.location.href);
            url.searchParams.set(key, value);
            window.history.pushState({}, '', url);
        }

        let cat_param = 0; let currentPage = 1;
        let todayDate = moment().format('YYYY-MM-DD');

        const all_days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        let date = new Date();
        
        let timeNow = date.getHours() * 60 + date.getMinutes();
        for (let i = -7; i <= 7; i++) {
            const day = new Date(date);
            day.setDate(date.getDate() + i);
            const dayName = i === 0 ? 'Today' : all_days[day.getDay()];
            let active_day_class = "";
            if(dayName == "Today"){
                active_day_class = "today active";
            }
            let formated_date = moment(day.toISOString()).format("Do MMM");
            $('.days').append(`<div class="day ${i === 0 ? active_day_class : ''}" data-date="${day.toISOString()}">${formated_date}</div>`);
        }
        // $(".days-wrapper").scrollLeft = 1200;

        // Generate time slots for 24 hours in 30 minute intervals
        for (let i = 0; i < 24 * 2; i++) {
            const hour = Math.floor(i / 2);
            const minute = i % 2 === 0 ? '00' : '30';
            $('.time-bar').append(`<div class="time-slot">${hour}:${minute}</div>`);
        }

        let all_tv_data = await fetch_tv_channel_data(cat_param,todayDate,currentPage);
        let is_fav = "<?=$is_fav?>";
        if(is_fav == "YES"){
            let fav_ids = await favouriteData();
            all_tv_data.channels = await findByIds(all_tv_data.channels, fav_ids);
        }
        //localStorage.setItem("pb_epg_page",currentPage);
        console.log("all_tv_data",all_tv_data); //return;
        await set_html_for_channel_guide(all_tv_data, date, null, currentPage);

        let daysWrapper = $('.days-wrapper');
        let days = $('.days');
        let dayWidth = $('.days').outerWidth(true); // Width including margin
        var screenWidth = window.screen.width;
        let dynamic_scroll_width = 900;
        if(screenWidth >= 720){
            dynamic_scroll_width = 450;
        } else if(screenWidth < 720 && screenWidth >= 640){
            dynamic_scroll_width = 700;
        } 
        days.animate({
            scrollLeft: '+=' + dynamic_scroll_width
        }, 100);
        
        $(".disabled").on("click", function(){
            disabled_div();
        })

        


        

        $(document).on('click', 'span.fav i', function(){
            if($(this).hasClass('fa-regular')){
                $(this).addClass('fa-solid').removeClass('fa-regular')
            }else{
                $(this).removeClass('fa-solid').addClass('fa-regular')
            }
        });

        $(".channel_cat").on("click", function(){
            $(".channel_cat").removeClass('active');
            let cat = $(this).attr("channel_cat");
            $(this).addClass("active");
        }); 
       
        $(".live_ch").on("click", function(){
            var is_favourite = '<?=$is_faourite?>'
        //   matomo(is_favourite ,'Select','Live Channel');
          queueTrackingData('trackEvent', [is_favourite, "Select",'Live Channel']);
          
        }); 
        $(".live_ra").on("click", function(){
             var is_favourite = '<?=$is_faourite?>'
        //   matomo(is_favourite ,'Select','Live Radio')
          queueTrackingData('trackEvent', [is_favourite, "Select",'Live Radio']);
        }); 
        
        $('.scroll-right').click(async function(){ 
            currentPage = 1;
            //localStorage.removeItem("scroll_completed");
            const currentIndex = getCurrentIndex();
            if (currentIndex < 14) {
                $('.days .day.active').removeClass('active').next('.day').addClass('active');
                days.animate({
                    scrollLeft: '+=' + 150
                }, 100);
                updateButtons();
                let get_date = $(".day.active").attr('data-date');
                let date = new Date(get_date);
                let date_status = compare_date(date);
                marker_position = null;
                if(date_status == "past_date"){
                    marker_position = parseInt("<?=$marker_position_past;?>");
                } else if(date_status == "upcoming_date"){
                    marker_position = parseInt("<?=$marker_position_future;?>");
                }
                let formatted_date = moment(date).format("YYYY-MM-DD");
                all_tv_data = await fetch_tv_channel_data(0,formatted_date,currentPage);
                let is_fav = "<?=$is_fav?>";
                if(is_fav == "YES"){
                    let fav_ids = await favouriteData();
                    all_tv_data.channels = await findByIds(all_tv_data.channels, fav_ids);
                }
                await set_html_for_channel_guide(all_tv_data, date, marker_position);
                //alert(get_date);
            }
            
        });

        $('.scroll-left').click(async function(){ 
            //localStorage.removeItem("scroll_completed");
            //console.log(dayWidth)
            currentPage = 1;
            const currentIndex = getCurrentIndex();
            if (currentIndex > 0) { // Changed from 1 to 0
                $('.days .day.active').removeClass('active').prev('.day').addClass('active');
                days.animate({
                    scrollLeft: '-=' + 150
                }, 100);
                updateButtons();
                let get_date = $(".day.active").attr('data-date');
                let date = new Date(get_date);
                let date_status = compare_date(date);
                marker_position = null;
                if(date_status == "past_date"){
                    marker_position = parseInt("<?=$marker_position_past;?>");
                } else if(date_status == "upcoming_date"){
                    marker_position = parseInt("<?=$marker_position_future;?>");
                }
                let formatted_date = moment(date).format("YYYY-MM-DD");
                all_tv_data = await fetch_tv_channel_data(0,formatted_date,currentPage);
                let is_fav = "<?=$is_fav?>";
                if(is_fav == "YES"){
                    let fav_ids = await favouriteData();
                    all_tv_data.channels = await findByIds(all_tv_data.channels, fav_ids);
                }
                await set_html_for_channel_guide(all_tv_data, date, marker_position);
            }
        });

        $('.day').click(async function(){ 
            //localStorage.removeItem("scroll_completed");
            //console.log(dayWidth)
            currentPage = 1;
            let get_date = $(".days .day.active").attr('data-date');
            let selected_date = $(this).attr('data-date');
            ///console.log("get_date",get_date); console.log("selected_date",selected_date);
            if(get_date == selected_date){ 
                return true;
            } else { //alert(get_date);
                let currentIndex = getCurrentIndex();
                //console.log('currentIndex',currentIndex);
                if (currentIndex >= 0) { // Changed from 1 to 0
                    $('.days .day.active').removeClass('active');
                    $(this).addClass('active');
                
                    let get_date = $(".day.active").attr('data-date');
                    //console.log("get_date",get_date);
                    let date = new Date(get_date);
                    let date_status = compare_date(date);
                    marker_position = null;
                    //console.log("date_status",date_status);
                    if(date_status == "past_date"){
                        marker_position = parseInt("<?=$marker_position_past;?>");
                        days.animate({
                            scrollLeft: '-=' + 150
                        }, 100);
                    } else if(date_status == "upcoming_date"){
                        marker_position = parseInt("<?=$marker_position_future;?>");
                        days.animate({
                            scrollLeft: '+=' + 150
                        }, 100);
                    }
                    let formatted_date = moment(date).format("YYYY-MM-DD");
                    all_tv_data = await fetch_tv_channel_data(0,formatted_date,currentPage);
                    //console.log("all_tv_data",all_tv_data);
                    
                    let is_fav = "<?=$is_fav?>";
                    if(is_fav == "YES"){
                        let fav_ids = await favouriteData();
                        all_tv_data.channels = await findByIds(all_tv_data.channels, fav_ids);
                    }
                    //console.log();
                    await set_html_for_channel_guide(all_tv_data, date, marker_position);
                }
            }
        });

        

        async function findByIds(channels, search_ids) {
            let filtered_data = [];
            if(search_ids.length){
                filtered_data = channels.filter(each => search_ids.includes(each.show_id));
            }
            return filtered_data;
        }

        function getCurrentIndex() {
            return $('.days .day').index($('.days .day.active'));
        }

        function updateButtons() {
            const currentIndex = getCurrentIndex();
            if (currentIndex <= 0) { // 0 is the fist index for 14 days
                $('.scroll-left').removeClass('active');
            } else {
                $('.scroll-left').addClass('active');
            }

            if (currentIndex > 13) { // 12 is the last index for 14 days
                $('.scroll-right').removeClass('active');
            } else {
                $('.scroll-right').addClass('active');
            }
        }

        async function refresh_tv_guide(){ //alert('refresh');
            //localStorage.removeItem("scroll_completed");
            currentPage = 1;
            let date = new Date();
            let is_fav = "<?=$is_fav?>";
            if(is_fav == "YES"){
                let fav_ids = await favouriteData();
                all_tv_data.channels = await findByIds(all_tv_data.channels, fav_ids);
            }
            
            //console.log("all_tv_data",all_tv_data); //return;
            await set_html_for_channel_guide(all_tv_data, date, null, currentPage);
        }

        updateButtons(); // Initial call to set button states


        
        // Detect scroll event to load more channels
        let previousScrollTop = 0; // To track the previous scroll position
        let debounceTimer; // Timer for debouncing

        $('.shows-wrapper').on('scroll', async function () { 
            let pageSize = 10;
            const scrollTop = $(this).scrollTop();
            const innerHeight = $(this).innerHeight();
            const scrollHeight = this.scrollHeight;

            let total_height = innerHeight + scrollTop;
            //console.log("total_height",total_height,"|","scrollHeight",scrollTop);
            // Check if scrolling down and close to the bottom
            clearTimeout(debounceTimer); // Clear the timer on every scroll event
            let scroll_completed = "0";
            debounceTimer = setTimeout(async () => {
                const totalHeight = $(this).scrollTop() + $(this).innerHeight();
                const scrollHeight = this.scrollHeight;
                let scroll_status = localStorage.getItem("scroll_completed");
                if(scroll_status){
                    scroll_completed = scroll_status;
                }

                if (totalHeight >= scrollHeight - 50 && scroll_completed == "0") { // Check if near the bottom
                    console.log("Load next page triggered.");
                    ++currentPage;
                    let selected_date = $(".day.active").attr('data-date');
                    
                    let date = new Date(selected_date);
                    
                    selected_date = moment(selected_date).format("YYYY-MM-DD");
                    //console.log("selected_date",selected_date);
                    let all_tv_data = await fetch_tv_channel_data(cat_param, selected_date, currentPage, true);
                    if(is_fav == "YES" && all_tv_data.hasOwnProperty('channels')){
                        let fav_ids = await favouriteData();
                        all_tv_data.channels = await findByIds(all_tv_data.channels, fav_ids);
                    }
                    let totalChannels = (all_tv_data.hasOwnProperty('channels'))?all_tv_data.channels.length:0;
                    let startIndex = (currentPage - 1) * pageSize;
                    let endIndex = Math.min(startIndex + pageSize, totalChannels);
                    
                    //if (startIndex >= totalChannels) return; // Stop if no more channels
                    //console.log("go");
                    let date_status = compare_date(date);
                    let marker_position = null;
                    if(date_status == "past_date"){
                        marker_position = parseInt("<?=$marker_position_past;?>");
                    } else if(date_status == "upcoming_date"){
                        marker_position = parseInt("<?=$marker_position_future;?>");
                    }
                    await set_html_for_channel_guide(all_tv_data, date, marker_position, currentPage,true);
                }
            }, 100); // Adjust the delay (200 ms) as needed
            
            // Update previous scroll position
            previousScrollTop = scrollTop;
        });

    });

    

   

    async function set_html_for_channel_guide(all_tv_data,date,currentTimePosition, currentPage =  1, scroll = false){
        let $is_fav = "<?= $is_fav; ?>";
        if(scroll == false){
            $('.channel-names').empty();
            $('.shows-container').empty();
        }
        
        let timeNow = date.getHours() * 60 + date.getMinutes();
        //console.log("timeNow",timeNow);
        // Channels array to simulate dynamic loading
        let channel_placeholder = "assets/website_assets/images/dd.png";
        let get_market_position = getMrakerIniPosition();
        //let position_value = parseFloat("<?//= $marker_position ?>");   // Marker position
        let totalChannels = (all_tv_data.hasOwnProperty('channels'))?all_tv_data.channels.length:0;
        // Load initial channels
        await loadChannels(date, currentPage);
        

        async function loadChannels(date, page) { //console.log("currentPage",currentPage);

            const fragment = $(document.createDocumentFragment());
           
            //all_tv_data.channels = [];
            //console.log("all_tv_data",all_tv_data);
            if(all_tv_data.hasOwnProperty('channels') && all_tv_data.channels.length){ 
                $('.shows-wrapper').removeClass('show_height_none');
                //for (let i = startIndex; i < endIndex; i++) {
                for(let channel of all_tv_data.channels){ //console.log("channel",channel);
                        //let channel = all_tv_data.channels[i];
                        let show_id = channel.show_id;
                        let channel_id = channel.id;
                        let channel_name = channel.name;
                        let channel_enc_id = channel.enc_id;
                        let channel_image = (channel.logo != "")?channel.logo:channel_placeholder;
                        let channel_programs = (channel.programs.length)?channel.programs:[];
                        let fav_class = "fa-heart fa-regular";
                        // if(channel.hasOwnProperty('is_fav') && channel.is_fav == true){
                        //     fav_class = "fa-heart fa-solid";
                        // }

                        // console.log("channel",channel); 
                        if(channel.hasOwnProperty('is_on_favlist')){
                            if(channel.is_on_favlist == 1){
                                fav_class = "fa-heart fa-solid";
                            }
                        }
                        //console.log('channel',channel);
                        
                        if('<?= $is_fav ?>' == "YES" || '<?= $is_login ?>' == "NO"){
                            fav_class = "";
                        }

                        if(channel_image){

                        }
                        
                        if(show_id && channel_id){
                            $('.channel-names').append(`<div class="channel-name" title="${channel_name}" onclick="add_channel_to_fav('${show_id}','${channel_id}','${channel_enc_id}','${channel_image}','${channel_image}' ,'${channel_name}')" id="${'fav_'+channel_id}" data-activity="${(channel.is_on_favlist == 1)?3:1}"><span class="fav"><i class="${fav_class}"></i></span><img src="${channel_image}" class="channelImage"></div>`);
                        }else{
                            $('.channel-names').append(`<div class="channel-name" title="${channel_name}" id="${'fav_'+channel_id}" data-activity="${(channel.is_on_favlist == 1)?3:1}"><span class="fav"></span><img src="${channel_image}" class="channelImage"></div>`);
                        }
                        let showsDiv = await generateShows(timeNow, channel_programs, date, channel);
                        //i++;
                        fragment.append(showsDiv);
                    //}
                }
                $('.shows-container').append(fragment);  
            } else {
                //alert('blank');
                if(scroll == false){
                    let tv_guide_url = `urls_call("<?= base_url('tv-guide')?>")`;
                    let is_fav = "<?= $is_fav; ?>";
                    let NoDataFound = (is_fav == "YES")?"<?= NoDataFoundFav; ?>":"<?= NoDataFoundTv; ?>";
                    let NoListFound = (is_fav == "YES")?"<?= NoListFoundFav; ?>":"<?= NoListFoundTv; ?>";
                    let html = '<div class="container"><div class="row"><div class="d-flex no-channel-data margin-20 flex-column justify-content-center w-100"><div class="col-md-6 m-auto text-center watchListNo"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+ NoDataFound +'</h5><p class="mb-0 text_ac">'+ NoListFound +'</p></div></div></div></div>';
                    if(is_fav == "YES"){
                        html += '<center><div class="col-md-4 col-sm-10"><button class="internal_sv_btn mt-2" onclick='+tv_guide_url+'><?= EXPLORE_NOW; ?></button></div></center>';
                    }
                    $('#Channels').html(html);
                }
             }
             
            
            
        }

        // Calculate time positions
        const timeSlotWidth = $('.time-slot').outerWidth();
        //console.log("timeSlotWidth",timeSlotWidth);
        if(!currentTimePosition){
            //currentTimePosition = timeNow * timeSlotWidth / position_value;   ///vertical timeline position
            currentTimePosition = (timeNow * get_market_position) + 92;   ///vertical timeline position 
        }
        //console.log("currentTimePosition",currentTimePosition);
        var containerWidth = $('.shows-container').width();
        //console.log("containerWidth",containerWidth);
        var containerHeight = $('.shows-container').height();
        $('.now-vertical-line').css('left', currentTimePosition);

        // Set current time indicator position
        $('.current-time-indicator').css('left', currentTimePosition);
        $('.center-text').css('left', currentTimePosition);
        var finalWidth =  containerWidth-currentTimePosition;
        finalWidth = finalWidth + 92;  /// width adjustment
        if(finalWidth == 0){
            //finalWidth = 150;
        }
        $('.center-text').css('width', finalWidth+'px');
        $('.now-vertical-line').css('width', finalWidth+'px');
        $('.current-time-indicator, .now-vertical-line').css('height', (containerHeight)+'px');


        let date_status = compare_date(date);

        // Update current time indicator position every minute
        let cookie_name = "today_intervalId";
        //alert(date_status);
        if(date_status == "today_date"){
            //alert('set interval');
            try{
                var intervalId  = setInterval(function () {
                    move_pointer_with_time(all_tv_data,date);
                }, 60000);
                let today_intervalId =  Cookies.set(cookie_name, intervalId, { expires: 1 });  //expire in one day
            } catch(err){
                console.warn(err);
            }
        } else {
            //alert('remove interval');
            let intervalId = Cookies.get(cookie_name);
            if(intervalId){
                clearInterval(intervalId);
                Cookies.remove(cookie_name);
            }    
        } 
        
        // Live button functionality
        $('.live-button').on('click', function () {
            liveLine();
        });

        function liveLine(){
            let get_market_position = getMrakerIniPosition();
            const now = new Date();
            const nowTime = now.getHours() * 60 + now.getMinutes(); 
            //console.log("nowTime_updated",nowTime);
            //const nowPosition = nowTime * timeSlotWidth / position_value;
            const nowPosition = (nowTime * get_market_position) + 92;
            //console.log("nowPosition",nowPosition);
            //console.log($('.time-bar-wrapper').width());
            let time_bar_wrapper_position = Math.floor(nowPosition) - $('.time-bar-wrapper').width() / 2;
            //console.log(time_bar_wrapper_position)
            $('.time-bar-wrapper').scrollLeft(time_bar_wrapper_position);
            $('.shows-wrapper').scrollLeft(Math.floor(nowPosition) - $('.shows-wrapper').width() / 2);
            //alert(marker_position);
            if(marker_position == 1){ 
                $('.current-time-indicator').hide();
            } else if(marker_position == 9692){ 
                $('.current-time-indicator').hide();
            } else {
                $('.current-time-indicator').show();
            }
            
        }


        $(document).ready(function(){
            liveLine();
        });


        // Synchronize scrolling between time bar and shows wrapper
        $('.time-bar-wrapper').on('scroll', function () {
            const scrollLeft = $(this).scrollLeft();
            $('.shows-wrapper').scrollLeft(scrollLeft);
        });

        // Set shows wrapper position to current time slot
        $('.shows-wrapper').scrollLeft(currentTimePosition);

        // Set time bar position to current time slot
        $('.time-bar-wrapper').scrollLeft(currentTimePosition);

        // Initial scroll position for days-wrapper to show only the current day plus next 7 days
        $('.days-wrapper').scrollLeft(0);  /// it was 0
    }

    async function move_pointer_with_time(all_tv_data,date){
        //let position_value = parseFloat("<?= $marker_position ?>");   // Marker position
        let get_market_position = getMrakerIniPosition();
        var timeSlotWidth = $('.time-slot').outerWidth();
        var containerWidth = $('.shows-container').width();
        var containerHeight = $('.shows-container').height();

        let now = new Date();
        let nowTime = now.getHours() * 60 + now.getMinutes();
        //console.log("nowTime_updated1",nowTime)
        //let nowPosition = nowTime * timeSlotWidth / position_value;
        let nowPosition = (nowTime * get_market_position) + 92; // 92 is margin in timeline
        
        $('.current-time-indicator').css('left', nowPosition);
        $('.now-vertical-line').css('left', nowPosition);
        $('.center-text').css('left',  nowPosition);
        $('.now-vertical-line').css('width', (containerWidth-nowPosition)+'px');
        $('.center-text').css('width', (containerWidth-nowPosition)+'px');
        $('.current-time-indicator, .now-vertical-line').css('height', (containerHeight)+'px');

        let currentTime = moment();
        //console.log(currentTime.format("hh:mm A"));
        $('.activeShow').each(function () {
            let endtime = $(this).attr('endtime');
            //console.log("endtime",endtime);
            let endtime_obj = moment(endtime,"hh:mm A");
            if (endtime_obj.isBefore(currentTime, 'seconds')) {
                var isLiveDiv = $(this).find('.isLive');
                if (isLiveDiv.length > 0) {
                    isLiveDiv.removeClass('isLive');
                    var nextDiv = $(this).first().next();
                    nextDiv.addClass('activeShow');
                    var findNextLive = nextDiv.find('.live_program');
                    findNextLive.addClass('isLive');
                }
            } 
        });
    }

    // Function to generate shows for a channel
    async function generateShows(timeNow, programs, fetched_date, channel_data) { 
        let channel_name = "";
        if(channel_data.hasOwnProperty('name')){
            channel_name = channel_data.name
        }
        //console.log('channel_name',channel_name);
        //console.log("date",fetched_date);
        const showsDiv = $('<div class="shows"></div>');
        let startTime = 0, endTime = 0;
        
        let today = new Date();
        let now = new Date(fetched_date);
        let fetched_data = compare_date(now);

        //programs = [];
        //console.log("programs",programs);
        if(programs.length){ //console.log('program exists');
            let updated_programs = await fill_Missing_Programs(programs,fetched_date,channel_name);
            var fetched_date_endTimestamp = moment(fetched_date).endOf('day').unix();
            if(fetched_date_endTimestamp != ""){
                fetched_date_endTimestamp = fetched_date_endTimestamp + 1;
            }
            
            //console.log("fetched_date_endTimestamp",fetched_date_endTimestamp); 
            let program_date = moment(fetched_date).format('DD MM YYYY');
            let last_prog_etime = 0;
            let total_programs = updated_programs.length;
            let program_sno = 0;
            let channel_div_width = 9600;
            let total_width_used = 0;
            for(let program of updated_programs){
                    ++program_sno;
                    // let p_dur = [10,60, 60];
                    // var randomIndex = Math.floor(Math.random() * p_dur.length);
                    // let rand_du = p_dur[randomIndex];
                    const duration = Math.round(program.duration/60); // Random duration between 30 and 150 minutes
                    const endTime = Math.min((startTime) + duration, 24 * 60);
                    //console.log("startTime",startTime); console.log("endTime",endTime);
                    let width = (Math.round((endTime - startTime) * 100 / 30)) * 2;
                    total_width_used += width;
                    if(program_sno == total_programs){
                        //console.log("total_width_used",total_width_used);
                        if(total_width_used > channel_div_width){
                            let extra_width = total_width_used - channel_div_width
                            width = (width - extra_width);
                        }
                    }
                    
                    let isPast = startTime < timeNow;
                    let showClass = isPast ? 'show past-show' : 'show';
                    let active_show = "";
                    
                    //console.log(timeNow);
                    var start_duration = moment.duration(startTime, 'minutes');
                    //console.log(start_duration);
                    var program_starttime = moment().startOf('day').add(start_duration).format('hh:mm A');
                    var end_duration = moment.duration(endTime, 'minutes');
                    var program_endtime = moment().startOf('day').add(end_duration).format('hh:mm A');
                    //console.log(program_starttime);
                    var time_string = program_starttime + " - " + program_endtime;


                    var cur_timeNow = moment.duration(timeNow, 'minutes');
                    var program_timeNow = moment().startOf('day').add(cur_timeNow).format('hh:mm A');

                    
                    var time_start = new Date(now.toDateString() + ' ' + program_starttime);
                    var time_end = new Date(now.toDateString() + ' ' + program_endtime);

                    //console.log("time_start",time_start); console.log("time_end",time_end);
                    //console.log("cur_timeNow",program_timeNow); 
                    let channel_status = (isPast)?"past":"upcoming";
                    if (today >= time_start && today <= time_end) { 
                        active_show = "isLive";
                    } else if (time_start.getTime() === time_end.getTime()){ 
                        active_show = "isLive";
                    }
                    if(active_show != ""){
                        channel_status = "live"
                    }
                    if(fetched_data == "upcoming_date"){
                        active_show = "";
                        channel_status = "upcoming";
                        showClass = "show"
                    } else if(fetched_data == "past_date"){
                        active_show = "";
                        channel_status = "past";
                        showClass = "show past-show";
                    }
                    if(program.filler){ 
                        showClass += " disabled";
                        channel_status = "past";
                    } 
                    if(active_show != ""){ 
                        showClass = showClass + " activeShow";
                    }
                    //console.log("showClass",showClass);
                    let filler_program = (program.hasOwnProperty('filler') && program.filler == true)?true:false;
                    
                    program.date = program_date;
                    program.start_time = program_starttime;
                    program.end_time = program_endtime;
                    //let channel_id = channel.title;
                    let program_id = program.id;
                    let program_title = program.title;
                    let program_timing = program.start;
                    //console.log("program",program);
                    let program_banner = program.thumbnail_url;  // else case default banner image
                    let onclick = `onclick="get_channel_details('${program_id}','${channel_status}','${program_title}','${program_timing}','${program_banner}')"`;
                    if(channel_status == "past"){
                        showClass = "show past-show";
                        onclick = 'onclick="disabled_div()"';
                    }
                    //console.log("channel_status",channel_status);
                    
                    if(program_sno == total_programs){ // last program
                        program.end = fetched_date_endTimestamp;
                    }
                    if(last_prog_etime != program_endtime && program.end <= fetched_date_endTimestamp){
                        if(filler_program == false){
                            showsDiv.append(`<div class="Programmedetail ${showClass}" endtime="${program_endtime}" ${onclick}  style="width: ${width}px;"  title="${program.title}">
                                            <div class="w-100">
                                                <div class="c-title">${program.title}</div>
                                            </div>
                                            <div class="live_program ${active_show}"></div>    
                                            </div>`);
                        } else {
                            //showClass = "show disabled";
                            showClass = "show";
                            let onclickk = 'onclick="disabled_div()"';
                            showsDiv.append(`<div class="Programmedetail ${showClass}" ${onclickk} endtime="${program_endtime}" style="width: ${width}px;" title="${program.title}">
                                            <div class="w-100">
                                                <div class="c-title">${program.title}</div>
                                            </div>
                                            <div class="live_program ${active_show}"></div>    
                                            </div>`);
                            //////////////////////////////////////////////////////////////////////////////
                                        
                            // let show_id = (channel_data.hasOwnProperty('show_id'))?channel_data.show_id:"";
                            // let drm_protected = (channel_data.hasOwnProperty('is_drm_protected'))?channel_data.is_drm_protected:0;
                            // let vdc_id = (channel_data.hasOwnProperty('vdc_id'))?channel_data.vdc_id:"";
                            // let file_url = (channel_data.hasOwnProperty('file_url'))?channel_data.file_url:"";
                            
                            // //console.log(time_string);
                            // file_url = "";
                            // show_id = "";
                            // let channel_text = channel_name; //"Go Live";
                            // if((drm_protected == "0" || drm_protected == 0) && file_url == ""){
                            //     channel_text = "No Data";
                            // } else if((drm_protected == "1" || drm_protected == 1) && (show_id == "" || vdc_id == "")){
                            //     channel_text = "No Data";
                            // }
                            // if(channel_text != "No Data"){ 
                            //     showClass =  "show activeShow";
                            // } else {
                            //     showClass =  "show disabled";
                            // }
                            // //console.log("showClass",showClass);
                            // showsDiv.append(`<div class="Programmedetail ${showClass}" endtime="${program_endtime}" onclick="go_to_live_player('${show_id}','${vdc_id}','${drm_protected}','${file_url}', 'filler')" style="width: ${width}px;">
                            //                 <div class="w-100">
                            //                 <div class="c-title center-text">${channel_text}</div>
                            //                 </div>
                            //                 <div class="live_program ${active_show}"></div>    
                            //                 </div>`
                            //             );
                        }
                    }
                    if((program_sno -1)  == (total_programs -1)){ // 2nd last program
                        program_endtime = "11:59 PM";
                    }
                    last_prog_etime = program_endtime;
                    startTime = endTime;
                
            }
        } else{ //console.log('program not exists');
            add_blank_program(showsDiv,channel_data, channel_name);
        }
        return showsDiv;
    }

    function add_blank_program(showsDiv,channel_data, channel_name){
        let startTime = 0, endTime = 1439;
        let showClass = "show";
        let channel_status = "past", active_show = "";
        let total_width = endTime - startTime;
        let width = (Math.round((total_width) * 100 / 30)) * 2;
        
        var start_duration = moment.duration(startTime, 'minutes');
        var program_starttime = moment().startOf('day').add(start_duration).format('hh:mm A');

        var end_duration = moment.duration(endTime, 'minutes');
        var program_endtime = moment().startOf('day').add(end_duration).format('hh:mm A');
        var time_string = program_starttime + " - " + program_endtime;
        
        let show_id = (channel_data.hasOwnProperty('show_id'))?channel_data.show_id:"";
        let drm_protected = (channel_data.hasOwnProperty('is_drm_protected'))?channel_data.is_drm_protected:0;
        let vdc_id = (channel_data.hasOwnProperty('vdc_id'))?channel_data.vdc_id:"";
        let file_url = (channel_data.hasOwnProperty('file_url'))?channel_data.file_url:"";
        
        //console.log(time_string);
        let channel_text = channel_name; //"Go Live";
        //let onclick = `onclick="go_to_live_player('${show_id}','${vdc_id}','${drm_protected}','${file_url}')"`;
        let onclick = 'onclick="disabled_div()"';
        if((drm_protected == "0" || drm_protected == 0) && file_url == ""){
            //channel_text = "";
            onclick = 'onclick="disabled_div()"';
            showClass = "show";
        } else if((drm_protected == "1" || drm_protected == 1) && (show_id == "" || vdc_id == "")){
            //channel_text = "";
            onclick = 'onclick="disabled_div()"';
            showClass = "show";
        }
        //console.log("onclick",onclick);
        showsDiv.append(`<div class="Programmedetail ${showClass}"  ${onclick}  endtime="${program_endtime}"  style="width: ${width}px;" title="${channel_text}">
                        <div class="w-100">
                        <div class="c-title center-text">${channel_text}</div>
                        </div>
                        <div class="live_program ${active_show}"></div>    
                        </div>`);
    }

    async function fill_Missing_Programs(programs,fetched_date,channel_name) { //console.log("programs",programs);
        let total_programs = programs.length;
        // Get the Unix timestamp (in seconds)
        var fetched_date_startTimestamp = moment(fetched_date).startOf('day').unix();
        var fetched_date_endTimestamp = moment(fetched_date).endOf('day').unix();
        //console.log("fetched_date_endTimestamp",fetched_date_endTimestamp);

        // Sort the programs array by start time
        programs.sort((a, b) => parseInt(a.start) - parseInt(b.start));

        const filledPrograms = [];
        /// Handled NO program before the first program
        if((parseInt(programs[0].start) - fetched_date_startTimestamp) >= 60){   
            let currentEnd =  fetched_date_startTimestamp;
            let nextStart = parseInt(programs[0].start);
            let filledPrograms_data = fill_program_data(currentEnd,nextStart,channel_name);
            filledPrograms.push(filledPrograms_data); 
        }

        for (let i = 0; i < total_programs - 1; i++) {
            filledPrograms.push(programs[i]);
            let currentEnd = parseInt(programs[i].end);
            let nextStart = parseInt(programs[i + 1].start);
            //console.log(parseInt(programs[i].start)+" - "+currentEnd);
            if ((nextStart - currentEnd) > 1) {
                //console.log("There is a gap, fill it with a new object");
                let filledPrograms_data = fill_program_data(currentEnd,nextStart,channel_name);
                filledPrograms.push(filledPrograms_data); 
            }
        }

        // Add the last program in the array
        filledPrograms.push(programs[programs.length - 1]);

        /// Handled NO program after the last program
        if((fetched_date_endTimestamp - parseInt(programs[total_programs - 1].end)) >= 60){   
            let currentEnd = parseInt(programs[total_programs - 1].end);
            let nextStart = fetched_date_endTimestamp -  1;
            let filledPrograms_data = fill_program_data(currentEnd,nextStart,channel_name);

            filledPrograms.push(filledPrograms_data);
        }
        return filledPrograms;
    }

    function fill_program_data(currentEnd,nextStart,channel_name = ""){
        return {
                id: null,
                title: channel_name,
                title: "",
                description: [
                    {
                        content: "Filler Program",
                        language: "english"
                    }
                ],
                episode_number: "",
                cast_info: "",
                audio_language: "",
                category: "",
                genres: "",
                start: currentEnd.toString(),
                end: nextStart.toString(),
                duration: nextStart - currentEnd,
                vdc_id: "",
                channel_id: null,
                still_live: 0,
                filler:true,
            }
    }

    function compare_date(date){
        let today = new Date();
        let fetched_data = "today_date";
        if(date){
            if(today.getDate() == date.getDate()){
                fetched_data = "today_date";
            } else if(today > date){
                fetched_data = "past_date";
            } else if(today < date){
                fetched_data = "upcoming_date";
            }
        }
        return fetched_data;
    }

    function goto_fav(){
        let is_login = "<?=$is_login?>";
        let redirect_url = "<?= base_url('fav-channels'); ?>";
        if(is_login == "NO"){
            redirect_url = "<?= base_url('user-login'); ?>";
        }
        let nav_link_value = $('.nav-channel-content.active').attr('href');
        let type = (nav_link_value == "#Redio")?"?type=radio":"";
        redirect_url = redirect_url + type;
        //alert(nav_link_value);
        //alert(redirect_url);
        //window.location.href = redirect_url;
        // matomo('Page' ,'View','Favourites');
        queueTrackingData('trackEvent', ['Page', "View",'Favourites']);
        $("#overlayonajaxhit").show();
        urls_call(redirect_url);
    }

    function add_channel_to_fav(show_id,channel_id,enc_id,thumbnail,poster_url,channel_name = ""){ 
        // alert(channel_name);
        var activity = $('#fav_'+channel_id).data('activity');
        var m_data= show_id+"/"+channel_id+"/"+channel_name+"/Live"
        if(activity == 1){
            queueTrackingData('trackEvent', ['LiveChannel', 'Favourite', m_data]);

        }else{
            queueTrackingData('trackEvent', ['LiveChannel', 'Unfavourite', m_data]);
   
        }
        // alert(activity);

        var favKey0 = "<?= ($this->session->profile_id ?? 0) . '-0favourites' ?>";
        var data = {
            show_id: show_id,
            channel_id: channel_id,
            id: channel_id,
            enc_id: enc_id,
            type: 0,
            thumbnail: thumbnail,
            poster_url: poster_url,
            still_live: 0
         };
         try{            
            updateFavouriteCache(favKey0, data, activity);
            if(activity == 1){
                $('#fav_'+channel_id).data('activity',3);
            }else{
                $('#fav_'+channel_id).data('activity',1);
            }
         } catch(err){
            console.log(err);
         }
    }

    async function go_to_live_player(show_id = "", vdc_id = "", drm_protected = 0, file_url = "", filler = ""){
        let file_url_params = "show_id="+show_id+"&vdc_id="+vdc_id;
        if(drm_protected ==  "0" && drm_protected ==  0){ 
            if(file_url == ""){
                if(filler == ""){
                    let err_title = "";
                    let err_msg = "<?= $this->lang->line("live_yet"); ?>";
                    toastr.error(err_msg,err_title);
                } else {
                    let err_title = "";
                    let err_msg = "<?= $this->lang->line("live_yet"); ?>";
                    toastr.error(err_msg,err_title);
                }
                return false;
            }
            file_url_params = "file_url="+file_url;
        } else { 
            if(show_id == "" || vdc_id == ""){
                if(filler == ""){
                    let err_title = "";
                    let err_msg = "<?= $this->lang->line("live_yet"); ?>";
                    toastr.error(err_msg,err_title);
                } else {
                    let err_title = "";
                    let err_msg = "<?= $this->lang->line("live_yet"); ?>";
                    toastr.error(err_msg,err_title);
                }
                return false;
            }
        }
        let redirect_url = "<?= base_url('pb_live_details?');?>"+file_url_params;
        //alert(redirect_url);
        $("#overlayonajaxhit").show();
        urls_call(redirect_url); 
        //window.location.href = redirect_url;
    }


    
    
    ////////////////////// function for fetching tv channel details. ///////////////////////
    async function fetch_tv_channel_data(cat_param = 0,todayDate, currentPage=1,scroll = false){ // default for TV channels
        //console.log(todayDate);
        let return_tv_channel_data = {};
        let main_key = (cat_param == 0)?"tv_guide_":"radio_guide_";
        let cache_key = main_key + todayDate;
       
        let fetched_cache_data = "<?= $fetch_data_from_cache; ?>";
        let tv_guide_data = {};   //global variable

        
        if(fetched_cache_data == "1"){
            try{
                const currentDate = moment(todayDate, "YYYY-MM-DD");

                // check cache data for current date key
                tv_guide_data = await get_tv_guide_data(cache_key,currentPage);

                // check cache data for next date key
                if($.isEmptyObject(tv_guide_data)){
                    const nextDay = currentDate.clone().add(1, 'days').format("YYYY-MM-DD");
                    let cache_key_next = main_key + nextDay;
                    tv_guide_data = await get_tv_guide_data(cache_key_next,currentPage);
                }

                // check cache data for prev date key
                if($.isEmptyObject(tv_guide_data)){
                    const previousDay = currentDate.clone().subtract(1, 'days').format("YYYY-MM-DD");
                    let cache_key_prev = main_key + previousDay;
                    tv_guide_data = await get_tv_guide_data(cache_key_prev,currentPage);
                }
                //console.log('cache_data_found',tv_guide_data);
                // If no cache data found
                if($.isEmptyObject(tv_guide_data)){
                    console.log("currentPage_before",currentPage);
                    let exitsing_page_count = get_tv_guide_data_count();
                    if(exitsing_page_count > currentPage){
                        currentPage = exitsing_page_count;
                    }
                    console.log("currentPage_after",currentPage);
                    tv_guide_data = await ajax_fetch_tv_data(cat_param,cache_key,todayDate,currentPage);
                }
            } catch(err){
                console.log(err);
                tv_guide_data = await ajax_fetch_tv_data(cat_param,cache_key,todayDate,currentPage);
            }
        } else {
            tv_guide_data = await ajax_fetch_tv_data(cat_param,cache_key,todayDate,currentPage);
        }
        tv_guide_data = await check_favourite(tv_guide_data);

        //console.log("tv_guide_data",tv_guide_data);
        if(tv_guide_data && tv_guide_data.hasOwnProperty('status') && tv_guide_data.status == true){
            //console.log("todayDate",todayDate);
            if(tv_guide_data.data.length){
                for(let each_day of tv_guide_data.data){ 
                    let data_filtered_date = moment.unix(each_day.date).format('YYYY-MM-DD');
                    if(data_filtered_date == todayDate){ //console.log("data found",each_day);
                        return_tv_channel_data = each_day;
                    }
                }
            } else {
                if(scroll == false){
                    handle_no_channel_data();
                }
            }
        } else{
            if(scroll == false){
                handle_no_channel_data();
            }
        }
        return return_tv_channel_data;
    }

    async function ajax_fetch_tv_data(cat_param,cache_key,date,page){ 
        //console.log("date",date);
        await manageFavourites(favKey0, 2);
        try {
            localStorage.removeItem("scroll_completed");
            let tv_guide_data = {};
            await $.ajax({
                type: 'POST',
                url: '<?= base_url('/web/Epg/tv_guide_data'); ?>',
                dataType: "json",
                data: {
                    param: cat_param,
                    date:date,
                    page:page
                },
                beforeSend: function() {
                    $('#overlayonajaxhit').show(); // Show loader before sending the request
                },
                success: async function(response) { 
                    if (response.status == true) {
                        tv_guide_data = response;
                        //tv_guide_data = check_favourite(tv_guide_data);

                        let now = moment();
                        // Set the end time to 23:59:59 of today
                        let endOfDay = moment().endOf('day');
                        // Calculate the difference in seconds
                        let secondsToEndOfDay = endOfDay.diff(now, 'seconds');
                        let cache_exp_time = secondsToEndOfDay * 1000;
                        if(response.data && response.data.length){
                            await set_tv_guide_data(tv_guide_data,cache_key,cache_exp_time,page);
                        } else{
                            localStorage.setItem("scroll_completed","1");
                        }
                    } else {
                        localStorage.setItem("scroll_completed","1");
                    }
                },
                complete: function() {
                    $('#overlayonajaxhit').hide(); // Hide loader after request completion
                }
            });
            return tv_guide_data;
        } catch (error) {
            console.log(error);
            return {};
        }
    }

    async function check_favourite(epgData) {
        epgData = JSON.parse(JSON.stringify(epgData));
        if(epgData.status == false){
            return {};
        }
        var favKey0 = "<?= ($this->session->profile_id ?? 0) . '-0favourites' ?>";
        await fetchCacheData(favKey0).then((res) => {
            //console.log("fav_data",res.data);
            if (res.data) {
                for(let dailyData_key in epgData.data){
                    for(let channel_key in epgData.data[dailyData_key].channels){
                        let channel_id = epgData.data[dailyData_key].channels[channel_key].show_id;
                        //console.log("channel_id",channel_id);
                        let is_fav_exists = res.data.find(each => (parseInt(each.show_id) == parseInt(channel_id)));
                        //console.log("is_fav_exists",is_fav_exists);
                        let is_on_favlist = (is_fav_exists)?true:false;
                        if(is_on_favlist){
                            //console.log(epgData.data[dailyData_key].channels[channel_key].is_on_favlist);
                            epgData.data[dailyData_key].channels[channel_key].is_on_favlist = is_on_favlist
                        }
                    }
                }
            }
        });
        return epgData;
    }

    function handle_no_channel_data(){
            // $('#live_pb').remove();
            // swal({
            //     imageUrl: "<?//= base_url('assets/images/tick.png'); ?>",
            //     imageWidth: 70,
            //     imageHeight: 70,
            //     title: "Channel guide data not found",
            //     allowOutsideClick: false,
            //     confirmButtonText: "<?//= $this->lang->line("ok") ?>",
            // }).then((result) => {
            //     let html = '<div class="container"><div class="row"><div class="d-flex flex-column justify-content-center w-100"><div class="col-md-6 m-auto text-center watchListNo"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+"<?= NoDataFound; ?>"+'</h5><p class="mb-0 text_ac">'+"<?= NoListFound; ?>"+'</p></div></div></div></div>';
            //     $('#Channels').html(html);
            // });
            // let html = '<div class="container"><div class="row"><div class="d-flex no-channel-data flex-column justify-content-center w-100"><div class="col-md-6 m-auto text-center watchListNo"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+"<?= NoDataFound; ?>"+'</h5><p class="mb-0 text_ac">'+"<?= NoListFound; ?>"+'</p></div></div></div></div>';
            // $('#Channels').html(html);

            let tv_guide_url = `urls_call("<?= base_url('tv-guide')?>")`;
            let is_fav = "<?= $is_fav; ?>";
            let NoDataFound = (is_fav == "YES")?"<?= NoDataFoundFav; ?>":"<?= NoDataFoundTv; ?>";
            let NoListFound = (is_fav == "YES")?"<?= NoListFoundFav; ?>":"<?= NoListFoundTv; ?>";
            let html = '<div class="container"><div class="row"><div class="d-flex no-channel-data margin-20 flex-column justify-content-center w-100"><div class="col-md-6 m-auto text-center watchListNo"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+ NoDataFound +'</h5><p class="mb-0 text_ac">'+ NoListFound +'</p></div></div></div></div>';
            if(is_fav == "YES"){
                html += '<center><div class="col-md-4 col-sm-10"><button class="internal_sv_btn mt-2" onclick='+tv_guide_url+'><?= EXPLORE_NOW; ?></button></div></center>';
            } 
            $('#Channels').html(html);
    }


    async function favouriteData(){
        let key = "<?=($this->session->profile_id??0).'-0favourites'?>";
        let show_ids = [];
        try{
            var cache = await caches.open('appCache');
            var cachedResponse = await cache.match(key);
            if (cachedResponse) {
              var cachedData = await cachedResponse.json();
              //console.log("cachedData",cachedData);
              if (cachedData.data) {
                var count = 0;
                cachedData.data.forEach((item)=>{
                    if (item.is_deleted != 1) {
                        show_ids.push(parseInt(item.show_id));
                    }
                });
                
              }
            }
        }catch (error){
            html += '<div class="container"><div class="row"><div class="d-flex no-channel-data flex-column justify-content-center w-100"><div class="col-md-6 m-auto text-center watchListNo"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+"<?= NoDataFound; ?>"+'</div>';
        }
        //console.log("show_ids",show_ids);
        return show_ids;
    }
    
    ///////////////////// Cache Functions /////////////////////////////
    async function get_tv_guide_data(key, currentPage){
        let return_data = {};
        try {
            //console.log('key',key);
            const cache = await caches.open('appCache');
            var cachedResponse = await cache.match(key);
            if (cachedResponse) {
                var cachedData = await cachedResponse.json();
                if(cachedData.cacheExpiration){
                    var current_time = moment().unix();
                    if(cachedData.cacheExpiration > current_time){
                        let cachedAllData = cachedData.data;
                        if(cachedAllData && cachedAllData.hasOwnProperty('page')){
                            let cachedPage = cachedAllData.page;
                            if(currentPage <= cachedPage){
                                return_data = cachedAllData.channelData;
                            }
                        }
                    }
                }
            } 
        } catch (err) {
            console.log('local cache error:', err);
        }
        return return_data;
    }

    async function get_tv_guide_data_count(key){
        let return_data = 1;
        try {
            //console.log('key',key);
            const cache = await caches.open('appCache');
            var cachedResponse = await cache.match(key);
            if (cachedResponse) {
                var cachedData = await cachedResponse.json();
                if(cachedData.cacheExpiration){
                    var current_time = moment().unix();
                    if(cachedData.cacheExpiration > current_time){
                        let cachedAllData = cachedData.data;
                        //console.log("cachedAllData",cachedAllData);
                        if(cachedAllData && cachedAllData.hasOwnProperty('channelData')){
                           let total_count = cachedAllData.channelData[0].channels.length;
                           //console.log("existing_channels",total_count);
                           return_data = Math.ceil(total_count/10) + 1;
                        }
                    }
                }
            } 
        } catch (err) {
            console.log('local cache error:', err);
        }
        return return_data;
    }

    async function set_tv_guide_data(data, key, cacheTime = (1 * 24 * 60 * 60 * 1000), page = 1) { // set data for one day
        let return_data = false;
        try {
            const cache = await caches.open('appCache');

            let existing_data = {};
            var cachedResponse = await cache.match(key);
            if (cachedResponse) {
                var cachedData = await cachedResponse.json();
                if(cachedData.cacheExpiration){
                    var current_time = moment().unix();
                    if(cachedData.cacheExpiration > current_time){
                        let cachedAllData = cachedData.data;
                        if(cachedAllData && cachedAllData.hasOwnProperty('page')){
                            let cachedPage = cachedAllData.page;
                            if(page > cachedPage){
                                existing_data = cachedAllData.channelData;
                            }
                        }
                    }
                }
            }
            //console.log("existing_data",existing_data); 
            if(existing_data && existing_data.hasOwnProperty('data') && existing_data.data.length){
                for(let each of data.data){
                    let date_key = each.date;
                    let existing_data_channels = existing_data.data.find(each => each.date == date_key);
                    //console.log("existing_data_channels",existing_data_channels);
                    if(existing_data_channels){
                        let mergedArray = existing_data_channels.channels.concat(each.channels);
                        //console.log("mergedArray",mergedArray);
                        each.channels = mergedArray
                    }
                }
            }
            
            //console.log("data_tobe_set",data);

            var cacheExpirationTime = Date.now() + cacheTime;
            let set_data = {};
            set_data.page = page;
            set_data.channelData = data
            cachedData = {
                data: set_data,
                cacheExpiration: cacheExpirationTime
            };
            await cache.put(key, new Response(JSON.stringify(cachedData)));
            return_data = true;
        } catch (error) {
            console.log('local cache error:', error);
        }
        return return_data;
    }
    ///////////////////// End of Cache Functions /////////////////////////////

</script>

<?php if($is_fav == "YES"){ ?>
    <script>
        var favKey1 = "<?=($this->session->profile_id??0).'-1favourites'?>";
        async function favouriteRadioData(key,id){ //alert(key);
            var html = '';
            try{
                var cache = await caches.open('appCache');
                var cachedResponse = await cache.match(key);
                if (cachedResponse) {
                var cachedData = await cachedResponse.json();
                if (cachedData.data) {
                    var count = 0;
                    cachedData.data.forEach((item)=>{ 
                        if (item.is_deleted != 1) { //console.log("fav_con",item);
                            count += 1;
                            item.poster_url = item.poster_url?item.poster_url:'<?=base_url(PosterPlaceholder)?>';
                            html += '<div class="channelBox"><div class="pb_live_channel_dt position-relative fav_cha"><a href="'+base_url+'pb_live_details?id='+item.enc_id+'&type=radio"><div class="pb_card"><div class="pb_img2 "><img src="'+ item.poster_url +'" class="img-fluid" alt="background"></div>';
                                if (item.still_live) {
                            html += '<a href="javascript:void();" class="pb_live_ch"><img src="'+ base_url +'assets/images/newlive1.gif" class="img-fluid" alt="pb live png">'
                                + '</a>';

                                }
                            html += '</div></a></div></div>';
                                                    
                        }
                    });
                    if (count == 0) {
                        html += '<div class="container"><div class="row"><div class="d-flex no-channel-data flex-column justify-content-center w-100"><div class="col-md-6 m-auto text-center watchListNo"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+"<?= NoDataFound; ?>"+'</h5><p class="mb-0 text_ac">'+"<?= NoListFound; ?>"+'</p></div></div></div></div>';
                    }
                }else{
                    html += '<div class="container"><div class="row"><div class="d-flex no-channel-data flex-column justify-content-center w-100"><div class="col-md-6 m-auto text-center watchListNo"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+"<?= NoDataFound; ?>"+'</h5><p class="mb-0 text_ac">'+"<?= NoListFound; ?>"+'</p></div></div></div></div>';
                }
                }else{
                    html += '<div class="container"><div class="row"><div class="d-flex no-channel-data flex-column justify-content-center w-100"><div class="col-md-6 m-auto text-center watchListNo"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+"<?= NoDataFound; ?>"+'</h5><p class="mb-0 text_ac">'+"<?= NoListFound; ?>"+'</p></div></div></div></div>';
                }
                $('#'+id).html(html);
            }catch (error){
                html += '<div class="container"><div class="row"><div class="d-flex no-channel-data flex-column justify-content-center w-100"><div class="col-md-6 m-auto text-center watchListNo"><img src="'+ base_url +'assets/images/no_list_found.png" class="img-fluid" alt="no-list"><h5 class="m-0 text-center text-white">'+"<?= NoDataFound; ?>"+'</div>';
                $('#'+id).html(html);
            }
        }

        favouriteRadioData(favKey1,'audList');

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
<?php } ?>
<script>
     $(window).on('load', function() {
        const pathname = window.location.pathname;
        const segments = pathname.split('/');
        const lastSegment = segments.pop() || segments[segments.length - 1];
        if(lastSegment == 'fav-channels'){
            var eventtypes = 'fav.Channel';
        }else{
            var eventtypes = 'Radio.Channel';
        }
        var type = "<?=$this->input->get('type')?>";
        if(type != 'radio'){
            if(lastSegment == 'fav-channels'){
            var eventtypes = 'Fav.Channel';
            }else{
            var eventtypes = 'Live';
            } 
            queueTrackingData('trackEvent', ['Page', 'View',eventtypes]);
        }else{
            if(lastSegment == 'fav-channels'){
            var eventtypes = 'Radio.Channel';
            }else{
            var eventtypes = 'Radio';
            } 
            queueTrackingData('trackEvent', ['Page', 'View',eventtypes]);
        }
    })
</script>

<script>
    function disabled_div(){
        let err_title = "";
        let err_msg = "<?= $this->lang->line("past_program"); ?>";
        //let err_msg = "<?= $this->lang->line("no_program_available"); ?>";
        toastr.error(err_msg,err_title);
    }
    
    function getMrakerIniPosition() {
        // Array of values for each hour
        // var hourlyValues = [
        //     16.0, 25.03, 25.56, 26.09, 26.62, 28.65, 28.78, 28.91,
        //     29.04, 29.17, 29.35, 29.376, 29.402, 29.428, 29.454, 29.48,
        //     29.506, 29.532, 29.558, 29.584, 29.61, 29.636, 29.662, 29.695
        // ];
        // // Get the current hour
        // var currentHour = new Date().getHours();
        // return hourlyValues[currentHour] || 28.013; // average value as default
        return 6.67;
    }
</script>



