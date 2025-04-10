<style>
    .langauge_selected {
        background: rgba(255, 116, 42, 0.3) !important;
    }
    .langauge_selection {
        background:#000;
        background-image: url(<?= base_url('assets/images/term-img.png') ?>);
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        overflow-y: auto;
        display: grid;
        align-items: center;
        padding:40px 0;
    }
</style>
<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
<div id="lang" </div>

<!-- <section class="langauge_selection">
    <div class="m_bod">
        <div class="row m-0">
            
            <form name="lang_option" method="post">
                <div class="col-lg-7 col-md-8 col-12 col-sm-8 m-auto">
                <div class="lnaguage_pref">
                    <h1 class="mb-2">Select Your App Language Preference</h1>
                    <p>Select your preferred language for app</p>
                    <div class="langu_select">
                        <div class="mt-5 langiage-flex row m-0 set_lang">
                            
                        </div>
                        <div class="mt-5">
                            <button type="button" class="language_btn">Proceed</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            
        </div>
    </div>
</section> -->
<div id="overlayonajaxhit" class="payment_loader2">
  <div class="cv-spinner">
    <span class="spinner"><span class="loader_spn"></span></span>
  </div>
</div>
<?php 
$is_login = ($this->session->userdata('id'))?"YES":"NO";
$transaction_exists = ($this->session->userdata('transaction_exists') == true)?"YES":"NO";
?>
<script src="<?= base_url('assets/website_assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
<script src="<?php echo base_url('assets/website_assets/js/moment.min.js'); ?>"></script>
<script>
    $(document).ready(async function (e) {
        $('.language_btn').prop('disabled', true);
        let lang_cache_key = "all_lang";
        let all_langs = await get_all_lang(lang_cache_key);
        //console.log("all_langs",all_langs); //return;

        async function get_all_lang(key){
            let return_data = [];
            try {
                //console.log('key',key);
                const cache = await caches.open('appCache');
                var cachedResponse = await cache.match(key);
                if (cachedResponse) { //console.log('if');
                    var cachedData = await cachedResponse.json();
                    if(cachedData.cacheExpiration){
                        var current_time = moment().unix();
                        if(cachedData.cacheExpiration > current_time){
                            try{
                                return_data = JSON.parse(cachedData.data)
                            } catch(e){
                                return_data = cachedData.data;
                            }
                        }
                    }
                } else { //console.log('else');
                    await $.ajax({    
                        type: 'POST',
                        url: '<?= base_url('/web/Home/ajax_get_all_lang'); ?>',
                        dataType: "json",
                        data: {},
                        beforeSend: function() {
                            $('#overlayonajaxhit').show(); // Show loader before sending the request
                        },
                        success: async function(res) {
                            if (res.status == true) {
                                localStorage.setItem('carouselTime',res.data.sldr);
                                localStorage.setItem('nskipable_start',res.data.nskipable_start);
                                localStorage.setItem('nskipable_end',res.data.nskipable_end);
                                return_data = res.data.lang;
                                await Promise.all([set_lang_data(res.data.lang,lang_cache_key), set_lang_data(res.data.pages,"static_pages"), set_lang_data(res.data.hns,"help_support")]);
                                
                            } else {
                               show_something_went_wrong();
                            }
                        },
                        error: function(){
                            show_something_went_wrong();
                        },
                        complete: function() {
                            $('#overlayonajaxhit').hide(); // Hide loader after request completion
                        }
                    })
                    return return_data;
                } 
            } catch (err) {
                console.log('local cache error:', err);
            }
            return return_data;
        }

        async function set_lang_data(data, key, cacheTime = (30 * 24 * 60 * 60 * 1000)) { // set data for 30 day
            let return_data = false;
            try {
                const cache = await caches.open('appCache');
                var cacheExpirationTime = Date.now() + cacheTime;
                cachedData = {
                    data: data,
                    cacheExpiration: cacheExpirationTime
                };
                await cache.put(key, new Response(JSON.stringify(cachedData)));
                return_data = true;
            } catch (error) {
                console.log('local cache error:', error);
            }
            return return_data;
        }
       
                        

            let lang_html = "";
            if(all_langs && all_langs.length){
            lang_html += `<section class="langauge_selection">
            <div class="m_bod">
            <div class="row m-0">
            <form name="lang_option" method="post">
            <div class="col-lg-7 col-md-8 col-12 col-sm-8 m-auto">
            <div class="lnaguage_pref">
            <h1 class="mb-2">Select Your App Language Preference</h1>
            <p>Select your preferred language for app</p>
            <div class="langu_select">
            <div class="mt-5 langiage-flex row m-0 set_lang">`;
            for(let each_lang of all_langs){ //console.log(each_lang);
            let img_url = (each_lang.hasOwnProperty('icon') && each_lang.icon != "")?each_lang.icon:"<?=base_url('assets/images/language-active.png')?>";
            lang_html += '<div class="radio-with-langauge col-md-6 col-lg-4 col-6 p-0 pe-1 lang_code" lang_option="' + each_lang.title +'" lang_id="' + each_lang.id +'">'+ 
           '<a href="#ch_language">'+
            '<p class="radioOption-langauge">'+
            '<label for="language_sl langauge_selected">'+
            '<span class="lan-details">'+
            '<span class="language_head">'+ each_lang.translate_title +'</span>'+
            '<span class="language_gr">(' + each_lang.title + ')</span>'+
            '</span>'+
            '<span class="lan_flex">'+
            '<img src="'+ img_url + '" class="img-fluid language-blend " alt="language">'+
            '</span>'+
            '</label>'+
            '</p>'+
            '</a>'+
            '</div>';
            }
            lang_html += `</div>
            <div class="mt-5">
            <button type="button" class="language_btn" id="ch_language" disabled>Proceed</button>
            </div>
            </div>
            </div>
            </div>
            </form>

            </div>
            </div>
            </section>`;
            }

        ///$(".set_lang").html(lang_html); 
        // <div id="trending" class="banner_load_af12"></div>
        $('#lang').append(lang_html);

        $('.lang_code').on('click', function(e) { 
            //e.preventDefault();
            $('.lang_code').removeClass("selected");
            $(this).addClass("selected");
            $('.language_btn').prop('disabled', false);

            $(document).on('keydown', function(event) {
                if (event.key === 'Enter' || event.keyCode === 13) {
                    event.preventDefault(); // Prevent the default action
                    $('.language_btn').click(); // Trigger the submit button's click event
                }
            });
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.lang_code').length && !$(e.target).is('.lang_code')) {
                $('.lang_code').removeClass("selected");
                $('.language_btn').prop('disabled', true);
                $(document).off('keydown'); // Unbind the keydown event
            }
        });

        $('.language_btn').on('click', function(e) {
            e.preventDefault();
            let lang = $('.lang_code.selected').attr('lang_option');
            let lang_id = $('.lang_code.selected').attr('lang_id');
            let is_login = "<?=$is_login?>";
            _paq.push(['setCustomDimension', 5, lang]);
            //alert(is_login);
            if(lang_id){ 
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('/web/Login_register/set_temp_lang'); ?>',
                    dataType: "json",
                    data: {
                        lang_id: lang_id,
                        lang: lang,
                    },
                    success: async function(data) {
                      //  langs = lang.toUpperCase();
                        //console.log(data);
                        let redirect_url = "<?= base_url('language');?>";
                        if (data.status == true) {
                            redirect_url = "<?= base_url('user-login?lang=');?>"+lang_id;
                        } 
                        if(is_login == "YES"){
                            // await removeCacheData('masterContent', 'all');
                            // await removeCacheData('contentDetail', 'all');
                            Promise.all([deleteAllMasterContentKeys(),removeCacheData('contentDetail', 'all')]);
                            let cache_key = "lang_set";
                            localStorage.setItem(cache_key,lang);
                            //await set_lang_data(lang_id, cache_key);
                            redirect_url = "<?= base_url();?>";
                        }
                        //alert(redirect_url);
                        queueTrackingData('trackEvent', ['App', 'Select', 'LanguagePreference ('+ lang +')']);
                        urls_call(redirect_url);
                    }
                })
            }
        });

        

        function urls_call(link, name = '') {
            const loader = document.getElementById('overlayonajaxhit');
            if (loader) {
            loader.style.display = 'block';
            }
        
            setTimeout(() => {
            location.href = link;
            }, 300);

            if (name) {
                matomo_hit(1, name);
            }
        }
    });

    
    $(window).on('load', function() {
        queueTrackingData('trackEvent', ['Page', 'View', 'Language']);
    })
</script>

<script>
    $(document).ready(function(){
        let subscription_plan_exists = localStorage.getItem('pb_subs');
        //subscription_plan_exists = 1;
        //alert(subscription_plan_exists);
        //console.log("subscription_plan_exists",subscription_plan_exists);
        let transaction_exists = "<?= $transaction_exists; ?>";
        if(transaction_exists != "YES"){ //alert('if');
            $('.package_tab').addClass("d-none");
        } else { //alert('else');
            $('.package_tab').removeClass("d-none");
        }
        if(subscription_plan_exists == 0){ 
            $('.suscribe_now_btn').addClass("d-none");
            $('.border_lines_user').addClass("d-none");
            $('#nav-year-tab').addClass("d-none");
            $('.sub_heading_dt').addClass("d-none");
        } else { 
            $('.suscribe_now_btn').removeClass("d-none");
            $('.border_lines_user').removeClass("d-none");
            $('#nav-year-tab').removeClass("d-none");
            $('.sub_heading_dt').removeClass("d-none");
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('.radio-with-langauge').click(function() {
            var target = $($(this).attr('href'));
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 9000);
        });
    });
</script>

