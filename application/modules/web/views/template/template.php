<?php 
//pre(session_id()); die;
// $this->session->sess_destroy();
// $activePlanUrl = "activePlan";
// $activePlan = call_curl_by_get_method($activePlanUrl, []);
// pre($activePlan['data']); die; 
//pre($this->session->userdata()); die;
// $this->session->set_userdata("payment_process","true");
// $this->session->set_userdata("is_rental","NO");
//pre(SUBSCRIPTION_CHECK_17); die; //lionsgate

$cur_pub_ip = get_server_ip();
if(($cur_pub_ip != $this->session->userdata('ip')) || !$this->session->userdata('country_name')){
    $country_data = get_client_ip_and_country();
    if($country_data){
        $this->session->set_userdata('ip',$country_data['ip']);
        $this->session->set_userdata('country_code',$country_data['country_code']);
        $this->session->set_userdata('country_name',$country_data['country_name']);
        if($this->session->userdata('saved_country_name') != $country_data['country_name']){
            $this->session->set_userdata('session_expired',"country_changed");
        } 
        $this->session->set_userdata('saved_country_name',$country_data['country_name']); 
    }
}
$transaction_exists = ($this->session->userdata('transaction_exists') == true)?"YES":"NO";
if($this->session->userdata('id') && !$this->session->userdata('manage_device_flag')){
    $controller = $this->router->fetch_class();
    $method = $this->router->fetch_method();
    $current_route = $controller . '/' . $method;

    $exclude_methods = array(
        "Dashboard/manage_device",
        "subscription/upgrade_subscriptions",
        "subscription/razorpost",
        "dashboard/razor_verify",
        "subscription/subscription_status",
        "subscription/transaction_history",
        "subscription/verify-payment",
        "dashboard/logout_devices",
        "Login_register/logout",
        "subscription/billdesk_subscription_status"
    );
    if(!in_array($current_route,$exclude_methods)){
        $version = modules::run('web/home/check_version');
        if($version){ 
            $activePlan = json_decode($version,true);
            //pre($activePlan); die;
            if(isset($activePlan['statusCode']) && $activePlan['statusCode'] == "401"){ 
                $this->session->set_userdata('session_expired',"getVersion");
            } else if(isset($activePlan['data'])){
                if(isset($activePlan['data']['plan'])){
                    $this->session->set_userdata('active_plan',$activePlan['data']['plan']);
                }
                $profile_data = $this->session->userdata('profile_data');
                if($profile_data && isset($activePlan['data']['publishers'])){
                    try{
                        foreach ($profile_data as $pkey => $pvalue) {
                            $profile_data[$pkey]['subscriptions'] = $activePlan['data']['publishers'];
                        }
                    } catch (Exception $e) {
                        log_message('info',"active plan data could not be set in session");
                    }
                    $this->session->set_userdata('profile_data', $profile_data);
                }
                if(isset($activePlan['data']['detail']['tvod_discount'])){
                    $price = $activePlan['data']['detail']['tvod_discount'];
                    $this->session->set_userdata('tvod_discount',$price);
                }
            }
        } else{
            $this->session->set_userdata('session_expired',"getVersion");
        }  
    }
} else{
    if(!$this->session->userdata('tempuuid')){
        $uuid = $this->session->tempuuid ?? vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
        $this->session->set_userdata('tempuuid', $uuid);
    }  
}
$sess_token = base64_encode(json_encode($_SESSION)); 

$lang_id = ($this->session->userdata('lang_id')) ? $this->session->userdata('lang_id'): 1 ;
include_once('header.php');
?>

<script>
    async function fetchJsonData(json_url) {
        const localStorageKey = 'pb_strings'; // A key to store/fetch the data from localStorage

        function toBase64(str) {
            return btoa(unescape(encodeURIComponent(str))); // Encode string to Base64
        }

        function fromBase64(str) {
            return decodeURIComponent(escape(atob(str))); // Decode from Base64 to string
        }

        return new Promise((resolve, reject) => {
            const cachedData = localStorage.getItem(localStorageKey);
            if (cachedData) {
                //console.log("Fetching data from localStorage.");
                resolve(JSON.parse(fromBase64(cachedData)));
            } else {
                //console.log("Fetching data from the URL.");
                $.getJSON(json_url, function(data) {
                    localStorage.setItem(localStorageKey, toBase64(JSON.stringify(data)));
                    resolve(data); // Resolve the Promise with the fetched data
                }).fail(function() {
                    reject("Failed to load the JSON file."); // Reject the Promise if an error occurs
                });
            }
        });
    }

    function findKeyByValue(obj, searchValue) {
        //console.log("obj",obj); console.log("searchValue",searchValue);
        for (const [key, value] of Object.entries(obj)) {
            if (value === searchValue) {
                return key; // Return the key if the value matches
            }
        }
        return null; // Return null if no match is found
    }
    let stringsData = {};
    let cur_lang_id = "<?= $this->session->userdata('lang_id') ?>";
    let local_strings, local_strings_en;
    
    fetchJsonData("<?= base_url('assets/website_assets/static_strings.json'); ?>")
        .then((stringsData) => {
            //console.log("stringsData", stringsData);
            local_strings = stringsData.hasOwnProperty(cur_lang_id) ? stringsData[cur_lang_id] : null;
            local_strings_en = stringsData.hasOwnProperty("english") ? stringsData.english : null;
            })
        .catch((error) => {
            console.error("Error fetching strings data:", error);
        });
    
    
</script>

<?php
$is_login = ($this->session->userdata('id'))?"YES":"NO";
if (!$this->session->userdata('temp_lang_set') && $is_login == 'NO') { 
?>
<script>
    if (window.top !== window.self) {
        window.top.location = window.self.location;
    }
    $(document).ready(async function() {
        ///////////////////// Cache Functions /////////////////////////////
        async function get_cache_data(key) {
        let return_data;
        try {
            const cache = await caches.open('appCache');
            var cachedResponse = await cache.match(key);
            if (cachedResponse) {
            var cachedData = await cachedResponse.json();
            //alert(cachedData.data);
            if (cachedData.hasOwnProperty('data')) {
                //     let current_time = moment().unix();
                //     if (cachedData.cacheExpiration > current_time) {
                return_data = cachedData.data;
                //     }
            }
            }
        } catch (err) {
            //console.log('local cache error:', err);
        }
        return return_data;
        }

        async function set_cache_data(data, key, cacheTime = (30 * 24 * 60 * 60 * 1000)) { // set data for 30 day
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
            //console.log('local cache error:', error);
        }
        return return_data;
        }
    });
    ///////////////////// End of Cache Functions /////////////////////////////
</script>
<?php }

if (($without_head != 1) && ($without_head != 2) || ($without_head == 3)) {
    include_once('navbar.php');
} 

$is_rent = $payment_process_status = $swal_title = $swal_text = $swal_image = $event_name = '';
if(isset($_SESSION['payment_process'])){
    // $activePlan = call_curl_by_get_method("activePlan", []);
    // //pre($activePlan['data']); die; 
    // if(isset($activePlan['data'])){
    //     if(isset($activePlan['data']['plan'])){
    //         $this->session->set_userdata('active_plan',$activePlan['data']['plan']);
    //     }
    //     $profile_data = $this->session->userdata('profile_data');
    //     if($profile_data && isset($activePlan['data']['publishers'])){
    //         try{
    //             foreach ($profile_data as $pkey => $pvalue) {
    //                 $profile_data[$pkey]['subscriptions'] = $activePlan['data']['publishers'];
    //             }
    //         } catch (Exception $e) {
    //             log_message('info',"active plan data could not be set in session");
    //         }
    //         $this->session->set_userdata('profile_data', $profile_data);
    //     }
    //     if(isset($activePlan['data']['detail']['tvod_discount'])){
    //         $price = $activePlan['data']['detail']['tvod_discount'];
    //         $this->session->set_userdata('tvod_discount',$price);
    //     }
    // }

    $partner_payment = (isset($_SESSION['partner_payment']))?"YES":"NO";
    $payment_process_status = false;
    $event_status = "Failure";
    $is_rent = $this->input->get('payment');
    if($_SESSION['payment_process'] === "true" || $_SESSION['payment_process'] === true){ 
        $event_status = "Success";
        $payment_process_status = true;
    }
    //pre($payment_process_status);
    $swal_title =  ($payment_process_status == true)?$this->lang->line("swal_payment_success"):$this->lang->line("swal_payment_failed");
    $swal_text =  ($payment_process_status == true)?$this->lang->line("swal_payment_success_des"):$this->lang->line("swal_payment_failed_des");
    $swal_image =  ($payment_process_status == true)?base_url('assets/website_assets/images/swal_success.svg'):base_url('assets/website_assets/images/swal_failed.svg');
    $event_name = "Subscription";
    if($this->session->userdata('is_rental') == "YES"){
        $event_name = "AvailableToRent";
        if($this->session->userdata('payment_process') == "true"){ // Paymnent success case
            $swal_text =  $this->lang->line("rent_sucs");
        }
    } 
    if($event_status == "Success"){ ?>
    <script>
        deleteAllMasterContentKeys();
        removeCacheData('contentDetail','all');
    </script>
    <?php }
    ?>
<?php } ?>

<script type="text/javascript">
    var env = "<?= ENVIRONMENT; ?>";
    var http_host = "<?= $_SERVER['HTTP_HOST']; ?>";
    let host = "<?= base_url(); ?>";
    localStorage.setItem("host",host);
    var is_login = "<?= ($this->session->userdata('id'))?'YES':'NO';?>"
    var toggels_check = "<?= ($this->session->userdata('toggels_check') && $this->session->userdata('toggels_check') == 1)?'YES':'NO';?>"
    function show_something_went_wrong(){
        $(".internal_server_error").removeClass('d-none');
    }
    let plan_exists = localStorage.getItem('pb_subs');
    if(plan_exists == 0){
        let currentUrl = window.location.href;
        let urlExcludes = base_url + "subscription";
        if(currentUrl == urlExcludes){
            window.location.href = base_url + "no-data";
        }
    } 
</script>
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row m-0">
            <div class="col-md-12 p-0">
                <?php echo $page_data ?? ''; ?>
            </div>

        </div>
    </section>
</section>
<section class="internal_server_error d-none">
    <div class="inter_server_er">
        <div class="row">
            <div class=col-md-6">
                <div class="inter_sev_txt">
                    <img src="<?= base_url('assets/website_assets/images/internal_server.svg') ?>" alt="internal_server">
                    <h5 class="mt-4 mb-0">Oops...</h5>
                    <p class="pt-4">Something went wrong. Please try again later.</p>
                    <a class="internal_sv_btn mt-5" href="<?= base_url();?>">Retry</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pb_network" id="pboverlaydiv" style="">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="pb_network_eroors text-center">
          <svg width="150" height="150" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_15454_7920)">
                <g opacity="0.25">
                <path d="M164.728 10.3418H17.93C12.982 10.3418 8.498 12.3478 5.252 15.5938C2.006 18.8378 0 23.3218 0 28.2738C0 38.1758 8.028 46.2058 17.93 46.2058H44.746C48.922 46.2058 52.762 47.6318 55.81 50.0258C67.15 45.5978 79.302 42.7918 91.982 41.8958C93.762 41.7698 95.4 42.8738 95.94 44.5738L96.54 46.4558C96.878 47.5218 96.74 48.6818 96.158 49.6358L91.268 57.6578L98.412 63.4918L104.666 68.6018L95.034 89.1478L91.268 97.1878L102.17 88.9398L124.322 72.1758L120.52 65.3578L117.124 59.2618C116.36 57.8898 116.518 56.1918 117.524 54.9878L125.294 45.6558C126.028 44.7738 127.194 44.3738 128.316 44.6298C131.808 45.4178 135.242 46.3558 138.614 47.4318C140.634 46.6398 142.834 46.2078 145.134 46.2078H164.73C169.682 46.2078 174.166 44.2018 177.41 40.9538C180.656 37.7098 182.662 33.2258 182.662 28.2758C182.662 18.3718 174.636 10.3438 164.73 10.3438L164.728 10.3418ZM88.962 36.8358L81.216 31.3058L88.586 25.9458L90.944 35.4918C91.228 36.6438 89.926 37.5258 88.962 36.8358ZM110.456 25.6238L103.342 46.4618C102.952 47.6018 101.344 47.6178 100.934 46.4838L93.394 25.6458C93.092 24.8138 93.708 23.9338 94.594 23.9338H109.248C110.122 23.9338 110.74 24.7958 110.456 25.6218V25.6238ZM127.422 37.8738L117.996 42.7018C116.884 43.2718 115.7 42.0698 116.286 40.9678L120.734 32.5918C121.096 31.9118 121.974 31.7038 122.602 32.1518L127.58 35.6978C128.358 36.2538 128.272 37.4378 127.422 37.8738Z" fill="#CCD2D6"/>
                <path d="M171.824 153.792H166.48C161.362 153.792 156.744 151.648 153.478 148.21C149.848 150.9 145.356 152.49 140.492 152.49C133.252 152.49 126.83 148.968 122.858 143.538L113.872 152.524C115.138 154.8 115.856 157.42 115.856 160.204C115.856 168.962 108.756 176.064 99.998 176.064C91.24 176.064 84.142 168.962 84.142 160.204C84.142 157.11 85.028 154.222 86.562 151.782L86.536 151.76L66.244 132.264L45.628 112.462L27.266 94.8218L14.358 82.4238C10.84 83.1318 7.692 84.8738 5.248 87.3198C2.006 90.5658 0 95.0478 0 99.9998C0 109.9 8.026 117.932 17.93 117.932H28.232C38.134 117.932 46.166 125.96 46.166 135.862C46.166 137.362 45.982 138.818 45.634 140.21L70.444 149.45C71.884 149.986 71.684 152.082 70.17 152.338L32.244 158.752C31.218 158.928 30.33 158.028 30.514 157.004L31.138 153.56C30.192 153.714 29.224 153.794 28.234 153.794H19.312C14.36 153.794 9.876 155.8 6.632 159.048C3.384 162.292 1.378 166.776 1.378 171.728C1.378 181.628 9.408 189.66 19.312 189.66H171.826C176.774 189.66 181.26 187.654 184.504 184.406C187.752 181.162 189.758 176.676 189.758 171.728C189.758 161.824 181.728 153.794 171.826 153.794L171.824 153.792ZM58.226 138.252L49.056 133.026C48.322 132.608 48.078 131.668 48.514 130.944L50.63 127.442C51.168 126.55 52.428 126.464 53.084 127.272L60.136 136.002C61.18 137.292 59.666 139.072 58.224 138.252H58.226Z" fill="#CCD2D6"/>
                <path d="M184.204 82.1934L173.042 93.3574H173.04L155.038 111.361H155.036L153.386 113.011C155.746 114.739 157.746 116.927 159.254 119.447C161.464 118.471 163.908 117.929 166.482 117.929H182.072C187.022 117.929 191.504 115.923 194.75 112.675C197.996 109.431 200.002 104.949 200.002 99.9974C200.002 90.8134 193.102 83.2454 184.206 82.1914L184.204 82.1934ZM182.328 113.569L170.012 112.781C168.524 112.687 168.068 110.715 169.366 109.977L179.468 104.229C180.286 103.763 181.33 104.157 181.634 105.053L183.848 111.591C184.19 112.603 183.396 113.641 182.328 113.571V113.569Z" fill="#CCD2D6"/>
                <path d="M48.7001 53.0596C41.1801 56.5536 34.0701 60.7776 27.4621 65.6456C27.4281 65.2556 27.4121 64.8636 27.4121 64.4656C27.4121 56.8996 33.5461 50.7656 41.1121 50.7656C43.9201 50.7656 46.5281 51.6116 48.7001 53.0596Z" fill="#CCD2D6"/>
                <path d="M183.12 135.448C183.12 143.014 176.986 149.146 169.422 149.146C164.81 149.146 160.73 146.866 158.248 143.374C160.134 140.746 161.452 137.68 162.02 134.36C162.228 133.154 162.336 131.914 162.336 130.646C162.336 128.452 162.012 126.334 161.41 124.334C163.664 122.706 166.43 121.746 169.422 121.746C176.986 121.746 183.12 127.88 183.12 135.446V135.448Z" fill="#CCD2D6"/>
                <path d="M178.442 64.4676C178.442 65.8316 178.242 67.1496 177.872 68.3936C168.792 61.1836 158.676 55.2236 147.784 50.7676H164.744C172.31 50.7676 178.442 56.9016 178.442 64.4676Z" fill="#CCD2D6"/>
                <path d="M39.3802 135.739C39.3802 136.445 39.3282 137.141 39.2222 137.819L36.0022 136.619C35.1262 136.291 34.1662 136.837 34.0022 137.757L32.1802 147.801C30.2462 148.847 28.0342 149.439 25.6842 149.439H23.4422C15.8762 149.439 9.74219 143.305 9.74219 135.739C9.74219 128.173 15.8762 122.039 23.4422 122.039H25.6842C33.2502 122.039 39.3822 128.173 39.3822 135.739H39.3802Z" fill="#CCD2D6"/>
                </g>
                <path opacity="0.5" d="M98.412 63.4945C70.472 64.1545 45.31 76.0445 27.266 94.8245L13.746 81.8345C12.488 80.6265 12.478 78.6245 13.716 77.4005C34.132 57.2005 61.54 44.0485 91.982 41.8945C93.762 41.7685 95.4 42.8725 95.94 44.5725L96.542 46.4545C96.88 47.5185 96.742 48.6805 96.16 49.6345L91.27 57.6585L98.414 63.4925L98.412 63.4945Z" fill="#CCD2D6"/>
                <path opacity="0.5" d="M186.298 80.1003L173.042 93.3583H173.04C158.974 79.2923 140.826 69.3143 120.522 65.3563L117.126 59.2623C116.36 57.8903 116.52 56.1923 117.524 54.9863L125.294 45.6543C126.028 44.7703 127.196 44.3723 128.316 44.6263C150.458 49.6323 170.35 60.5623 186.242 75.6643C187.504 76.8643 187.53 78.8683 186.298 80.0983V80.1003Z" fill="#CCD2D6"/>
                <path opacity="0.75" d="M104.666 68.6021L95.0361 89.1481C75.6661 90.6041 58.3061 99.2681 45.6301 112.464L27.2681 94.8261C45.3121 76.0461 70.4721 64.1561 98.4141 63.4961L104.668 68.6041L104.666 68.6021Z" fill="#CCD2D6"/>
                <path opacity="0.75" d="M173.04 93.3614L155.038 111.365H155.036C141.458 97.7874 122.804 89.2834 102.17 88.9414L124.322 72.1774L120.522 65.3594C140.826 69.3174 158.974 79.2954 173.04 93.3614Z" fill="#CCD2D6"/>
                <path opacity="0.5" d="M155.036 111.365L153.384 113.017C149.772 110.367 145.314 108.805 140.492 108.805C131.606 108.805 123.962 114.109 120.546 121.723C114.54 119.021 107.88 117.515 100.868 117.515C87.262 117.515 74.978 123.175 66.242 132.267L45.626 112.465C58.302 99.2694 75.662 90.6054 95.032 89.1494L91.264 97.1894L102.166 88.9414C122.8 89.2834 141.454 97.7874 155.032 111.365H155.036Z" fill="#CCD2D6"/>
                <path opacity="0.75" d="M122.86 143.54L113.874 152.526C111.172 147.65 105.974 144.35 100 144.35C94.3361 144.35 89.3681 147.32 86.5641 151.786L86.5381 151.762L66.2441 132.266C74.9801 123.174 87.2641 117.514 100.87 117.514C107.88 117.514 114.542 119.018 120.548 121.722C119.328 124.446 118.648 127.468 118.648 130.648C118.648 131.914 118.756 133.154 118.962 134.362C119.542 137.754 120.906 140.878 122.858 143.542L122.86 143.54Z" fill="#CCD2D6"/>
                <path d="M27.284 95.6725L13.33 82.2665C12.606 81.5705 12.202 80.6345 12.194 79.6305C12.186 78.6245 12.576 77.6805 13.292 76.9725C23.67 66.7065 35.628 58.4165 48.836 52.3345C62.44 46.0705 76.942 42.3565 91.938 41.2965C94.006 41.1505 95.886 42.4225 96.51 44.3925L97.11 46.2745C97.502 47.5065 97.342 48.8465 96.668 49.9485L92.05 57.5245L100.046 64.0545L98.424 64.0925C71.5 64.7285 46.382 75.7905 27.696 95.2385L27.28 95.6705L27.284 95.6725ZM92.262 42.4845C92.184 42.4845 92.104 42.4865 92.024 42.4925C62.732 44.5645 35.072 57.1125 14.138 77.8265C13.654 78.3045 13.39 78.9425 13.396 79.6225C13.402 80.3005 13.674 80.9325 14.162 81.4025L27.252 93.9785C36.36 84.6045 47 77.1505 58.884 71.8185C70.866 66.4405 83.612 63.4585 96.792 62.9465L90.484 57.7965L95.646 49.3265C96.138 48.5205 96.256 47.5405 95.97 46.6405L95.368 44.7585C94.934 43.3945 93.678 42.4865 92.262 42.4865V42.4845Z" fill="#CCD2D6"/>
                <path d="M173.29 93.9601H172.792L172.614 93.7841C158.264 79.4341 140.21 69.8081 120.406 65.9461L120.132 65.8921L116.6 59.5541C115.722 57.9801 115.906 55.9901 117.062 54.6021L124.832 45.2721C125.716 44.2081 127.102 43.7381 128.448 44.0421C150.242 48.9701 170.37 59.7541 186.656 75.2301C187.386 75.9241 187.794 76.8601 187.806 77.8661C187.818 78.8701 187.434 79.8141 186.724 80.5241L173.292 93.9581L173.29 93.9601ZM120.91 64.8221C140.648 68.7261 158.656 78.2921 173.04 92.5141L185.874 79.6781C186.354 79.1981 186.614 78.5601 186.604 77.8821C186.596 77.2021 186.32 76.5701 185.828 76.1021C169.7 60.7761 149.766 50.0941 128.182 45.2161C127.278 45.0121 126.348 45.3281 125.754 46.0421L117.984 55.3741C117.144 56.3821 117.01 57.8281 117.648 58.9721L120.908 64.8241L120.91 64.8221Z" fill="#CCD2D6"/>
                <path d="M45.646 113.313L26.418 94.8426L26.834 94.4106C36.034 84.8346 46.818 77.2326 58.882 71.8186C71.35 66.2226 84.646 63.2206 98.398 62.8966L98.62 62.8906L105.408 68.4346L95.43 89.7206L95.08 89.7466C76.456 91.1466 59.048 99.3626 46.062 112.881L45.646 113.313ZM28.116 94.8106L45.614 111.619C58.678 98.2286 76.052 90.0606 94.642 88.5786L103.926 68.7746L98.206 64.1026C71.566 64.7886 46.706 75.6846 28.118 94.8126L28.116 94.8106Z" fill="#CCD2D6"/>
                <path d="M155.286 111.965H154.788L154.61 111.789C140.59 97.7694 121.962 89.8694 102.158 89.5414L100.418 89.5134L123.542 72.0154L119.366 64.5254L120.634 64.7734C140.674 68.6794 158.942 78.4194 173.462 92.9394L173.886 93.3634L155.284 111.967L155.286 111.965ZM103.894 88.3894C123.172 89.1294 141.252 96.9434 155.034 110.519L172.188 93.3634C158.216 79.5534 140.788 70.1854 121.678 66.2054L125.098 72.3414L103.892 88.3894H103.894Z" fill="#CCD2D6"/>
                <path d="M66.2617 133.114L44.7817 112.482L45.1977 112.05C58.3897 98.3198 76.0737 89.9738 94.9917 88.5518L96.0157 88.4758L92.8417 95.2498L101.974 88.3398L102.182 88.3438C122.3 88.6758 141.222 96.7018 155.462 110.944L155.886 111.368L153.446 113.808L153.03 113.504C149.378 110.824 145.042 109.408 140.494 109.408C132.134 109.408 124.518 114.34 121.096 121.972L120.85 122.52L120.302 122.274C114.178 119.518 107.64 118.12 100.872 118.12C87.8477 118.12 75.7037 123.294 66.6777 132.688L66.2617 133.12V133.114ZM46.4797 112.448L66.2297 131.42C70.6277 126.952 75.7597 123.424 81.4917 120.93C87.6157 118.266 94.1357 116.914 100.87 116.914C107.604 116.914 114.128 118.266 120.252 120.934C123.98 113.18 131.86 108.204 140.494 108.204C145.128 108.204 149.55 109.594 153.32 112.232L154.186 111.366C140.266 97.6578 121.894 89.9198 102.366 89.5438L89.6957 99.1318L94.0537 89.8318C76.0157 91.4338 59.1797 99.4358 46.4797 112.45V112.448Z" fill="#CCD2D6"/>
                <path d="M113.734 153.512L113.348 152.816C110.658 147.964 105.544 144.948 100 144.948C94.456 144.948 89.884 147.622 87.072 152.102L86.688 152.714L86.13 152.198L65.396 132.28L65.812 131.848C70.302 127.176 75.576 123.502 81.492 120.928C87.616 118.264 94.136 116.912 100.87 116.912C107.604 116.912 114.512 118.346 120.794 121.172L121.34 121.418L121.096 121.964C119.87 124.702 119.248 127.622 119.248 130.646C119.248 131.862 119.35 133.076 119.554 134.258C120.102 137.464 121.412 140.55 123.344 143.186L123.648 143.602L113.736 153.514L113.734 153.512ZM100 143.748C105.716 143.748 111.008 146.718 113.998 151.55L122.074 143.474C120.198 140.784 118.92 137.678 118.37 134.46C118.156 133.212 118.046 131.93 118.046 130.646C118.046 127.656 118.622 124.76 119.76 122.028C113.792 119.43 107.44 118.112 100.87 118.112C88.046 118.112 76.076 123.128 67.094 132.25L86.458 150.852C89.538 146.39 94.546 143.748 99.998 143.748H100Z" fill="#CCD2D6"/>
                <path opacity="0.5" d="M115.856 160.206C115.856 168.964 108.758 176.064 100 176.064C91.242 176.064 84.144 168.964 84.144 160.206C84.144 157.112 85.032 154.226 86.564 151.784C89.368 147.318 94.336 144.348 100 144.348C105.972 144.348 111.17 147.648 113.874 152.524C115.138 154.798 115.858 157.418 115.858 160.204L115.856 160.206Z" fill="#CCD2D6"/>
                <path d="M99.9999 176.664C90.9259 176.664 83.5439 169.28 83.5439 160.206C83.5439 157.106 84.4119 154.082 86.0559 151.466C89.0899 146.634 94.3019 143.75 99.9999 143.75C105.98 143.75 111.496 147.002 114.398 152.236C115.744 154.658 116.456 157.416 116.456 160.206C116.456 169.282 109.074 176.664 99.9999 176.664ZM99.9999 144.948C94.7179 144.948 89.8839 147.622 87.0719 152.102C85.5479 154.528 84.7439 157.33 84.7439 160.204C84.7439 168.618 91.5879 175.462 99.9999 175.462C108.412 175.462 115.256 168.616 115.256 160.204C115.256 157.616 114.596 155.062 113.348 152.816C110.658 147.962 105.544 144.948 99.9999 144.948Z" fill="#CCD2D6"/>
                <path opacity="0.5" d="M153.384 113.013C149.772 110.363 145.314 108.801 140.492 108.801C131.606 108.801 123.962 114.105 120.546 121.719C119.326 124.443 118.646 127.465 118.646 130.645C118.646 131.911 118.754 133.151 118.96 134.359C119.54 137.751 120.904 140.875 122.856 143.539C126.83 148.967 133.25 152.489 140.49 152.489C151.286 152.489 160.254 144.653 162.016 134.359C162.224 133.151 162.33 131.911 162.33 130.645C162.33 123.403 158.806 116.983 153.38 113.013H153.384ZM149.724 137.971L147.818 139.877C147.182 140.513 146.152 140.513 145.518 139.877L140.494 134.853L135.466 139.877C134.832 140.513 133.802 140.513 133.166 139.877L131.26 137.971C130.622 137.335 130.622 136.305 131.26 135.669L136.284 130.645L136.02 130.381L131.262 125.621C130.626 124.987 130.624 123.959 131.262 123.321L133.168 121.415C133.804 120.779 134.834 120.779 135.468 121.415L140.23 126.173L140.494 126.437L145.518 121.413C146.152 120.777 147.182 120.777 147.818 121.413L149.724 123.319C150.362 123.957 150.36 124.985 149.724 125.619L144.7 130.645L148.414 134.359L149.724 135.669C150.362 136.305 150.362 137.335 149.724 137.971Z" fill="#CCD2D6"/>
                <path d="M140.494 153.089C133.364 153.089 126.59 149.651 122.376 143.893C120.336 141.109 118.95 137.847 118.372 134.459C118.158 133.211 118.048 131.929 118.048 130.645C118.048 127.453 118.706 124.367 120 121.473C123.616 113.411 131.66 108.201 140.494 108.201C145.3 108.201 149.88 109.697 153.74 112.529C159.498 116.743 162.936 123.515 162.936 130.645C162.936 131.929 162.828 133.211 162.612 134.459C161.73 139.613 159.038 144.331 155.034 147.741C150.984 151.189 145.82 153.089 140.494 153.089ZM140.494 109.401C132.134 109.401 124.518 114.333 121.096 121.965C119.87 124.703 119.248 127.623 119.248 130.647C119.248 131.863 119.35 133.077 119.554 134.259C120.102 137.465 121.412 140.551 123.344 143.187C127.334 148.637 133.746 151.893 140.494 151.893C150.876 151.893 159.68 144.477 161.43 134.261C161.634 133.079 161.736 131.865 161.736 130.649C161.736 123.899 158.482 117.489 153.032 113.501C149.38 110.821 145.044 109.405 140.496 109.405L140.494 109.401Z" fill="#CCD2D6"/>
                <path d="M146.664 140.956C146.07 140.956 145.512 140.724 145.092 140.302L140.494 135.704L135.89 140.304C135.472 140.724 134.914 140.956 134.318 140.956H134.316C133.722 140.956 133.162 140.724 132.74 140.304L130.834 138.396C130.412 137.976 130.18 137.416 130.18 136.82C130.18 136.224 130.412 135.664 130.836 135.244L135.434 130.646L130.834 126.044C130.414 125.624 130.18 125.066 130.18 124.472C130.18 123.878 130.412 123.318 130.834 122.896L132.74 120.99C133.162 120.568 133.72 120.336 134.316 120.336H134.318C134.912 120.336 135.47 120.568 135.89 120.99L140.492 125.588L145.092 120.99C145.51 120.57 146.07 120.338 146.664 120.336H146.666C147.26 120.336 147.82 120.568 148.242 120.988L150.148 122.896C150.57 123.318 150.802 123.878 150.802 124.474C150.802 125.068 150.568 125.626 150.148 126.046L145.55 130.646L150.148 135.246C150.57 135.666 150.802 136.226 150.802 136.822C150.802 137.418 150.57 137.978 150.146 138.398L148.24 140.304C147.818 140.726 147.26 140.956 146.664 140.956ZM140.494 134.008L145.942 139.456C146.136 139.65 146.392 139.758 146.666 139.758C146.94 139.758 147.198 139.65 147.392 139.456L149.3 137.548C149.496 137.354 149.602 137.096 149.602 136.822C149.602 136.548 149.494 136.29 149.3 136.096L143.852 130.648L149.3 125.198C149.496 125.004 149.602 124.746 149.602 124.474C149.602 124.2 149.494 123.942 149.3 123.746L147.394 121.84C147.2 121.646 146.942 121.538 146.668 121.538C146.394 121.538 146.138 121.646 145.944 121.838L140.496 127.286L135.044 121.838C134.85 121.644 134.594 121.536 134.32 121.536C134.046 121.536 133.788 121.644 133.594 121.838L131.688 123.744C131.492 123.94 131.386 124.198 131.386 124.472C131.386 124.746 131.494 125.002 131.688 125.196L137.136 130.646L131.688 136.094C131.492 136.29 131.384 136.548 131.384 136.822C131.384 137.096 131.492 137.354 131.686 137.548L133.594 139.456C133.788 139.65 134.046 139.758 134.32 139.758C134.594 139.758 134.85 139.65 135.044 139.458L140.496 134.01L140.494 134.008Z" fill="#CCD2D6"/>
                <path opacity="0.75" d="M149.724 137.971L147.818 139.877C147.182 140.513 146.15 140.513 145.516 139.877L140.492 134.853L135.466 139.877C134.832 140.513 133.8 140.513 133.164 139.877L131.258 137.971C130.62 137.335 130.62 136.303 131.258 135.667L136.282 130.645L131.258 125.619C130.622 124.985 130.62 123.955 131.258 123.317L133.164 121.411C133.8 120.775 134.832 120.775 135.466 121.411L140.492 126.435L145.516 121.411C146.15 120.775 147.182 120.775 147.818 121.411L149.724 123.317C150.362 123.955 150.36 124.985 149.724 125.619L144.7 130.645L149.724 135.667C150.362 136.303 150.362 137.335 149.724 137.971Z" fill="#CCD2D6"/>
                <g opacity="0.5">
                <path d="M100.934 46.4835L93.3939 25.6455C93.0919 24.8135 93.7099 23.9355 94.5939 23.9355H109.248C110.124 23.9355 110.738 24.7955 110.456 25.6235L103.342 46.4615C102.952 47.6035 101.344 47.6175 100.934 46.4835Z" fill="#CCD2D6"/>
                <path d="M116.288 40.9679L120.736 32.5919C121.098 31.9099 121.976 31.7039 122.604 32.1519L127.582 35.6999C128.362 36.2559 128.274 37.4399 127.424 37.8759L117.998 42.7039C116.886 43.2739 115.702 42.0719 116.288 40.9699V40.9679Z" fill="#CCD2D6"/>
                <path d="M88.9618 36.8373L81.2178 31.3053L88.5878 25.9453L90.9438 35.4933C91.2278 36.6433 89.9278 37.5273 88.9618 36.8373Z" fill="#CCD2D6"/>
                </g>
                <g opacity="0.75">
                <path d="M70.4421 149.448L36.0001 136.62C35.1241 136.294 34.1641 136.84 33.9981 137.76L30.5121 157.002C30.3261 158.026 31.2141 158.924 32.2401 158.75L70.1681 152.336C71.6821 152.08 71.8821 149.984 70.4421 149.448Z" fill="#CCD2D6"/>
                <path d="M58.2262 138.253L49.0582 133.029C48.3242 132.611 48.0802 131.671 48.5162 130.947L50.6322 127.443C51.1702 126.551 52.4322 126.465 53.0862 127.275L60.1382 136.003C61.1822 137.295 59.6682 139.075 58.2262 138.253Z" fill="#CCD2D6"/>
                <path d="M169.364 109.98L179.466 104.232C180.286 103.766 181.328 104.162 181.632 105.056L183.846 111.592C184.188 112.604 183.394 113.642 182.328 113.574L170.012 112.786C168.524 112.69 168.068 110.718 169.366 109.982L169.364 109.98Z" fill="#CCD2D6"/>
                </g>
                <path d="M102.134 47.9259C101.334 47.9259 100.644 47.4419 100.37 46.6879L92.83 25.8499C92.622 25.2759 92.708 24.6339 93.058 24.1339C93.408 23.6339 93.984 23.3359 94.594 23.3359H109.248C109.852 23.3359 110.422 23.6299 110.774 24.1199C111.126 24.6119 111.218 25.2459 111.024 25.8179L103.91 46.6559C103.65 47.4199 102.958 47.9179 102.152 47.9259C102.146 47.9259 102.14 47.9259 102.134 47.9259ZM94.596 24.5359C94.372 24.5359 94.17 24.6399 94.042 24.8239C93.914 25.0079 93.884 25.2319 93.96 25.4419L101.5 46.2799C101.652 46.6979 102.036 46.7239 102.142 46.7259C102.254 46.7259 102.632 46.6879 102.776 46.2679L109.89 25.4299C109.962 25.2199 109.928 24.9979 109.8 24.8179C109.672 24.6379 109.47 24.5359 109.25 24.5359H94.596Z" fill="#CCD2D6"/>
                <path d="M117.404 43.4507C116.918 43.4507 116.446 43.2567 116.078 42.8847C115.49 42.2887 115.364 41.4267 115.758 40.6867L120.206 32.3107C120.46 31.8327 120.906 31.4887 121.432 31.3647C121.958 31.2407 122.512 31.3487 122.952 31.6627L127.93 35.2107C128.468 35.5947 128.76 36.2167 128.712 36.8747C128.664 37.5327 128.284 38.1067 127.696 38.4087L118.27 43.2367C117.99 43.3807 117.694 43.4487 117.404 43.4487V43.4507ZM116.818 41.2507C116.602 41.6567 116.852 41.9607 116.934 42.0427C117.016 42.1267 117.314 42.3807 117.724 42.1707L127.15 37.3427C127.366 37.2327 127.498 37.0307 127.516 36.7907C127.534 36.5487 127.43 36.3307 127.234 36.1907L122.256 32.6427C122.096 32.5287 121.9 32.4887 121.708 32.5347C121.516 32.5807 121.358 32.7007 121.266 32.8767L116.818 41.2527V41.2507Z" fill="#CCD2D6"/>
                <path d="M89.7039 37.6776C89.3239 37.6776 88.9439 37.5596 88.6139 37.3236L80.1919 31.3076L88.9579 24.9336L91.5279 35.3476C91.7179 36.1176 91.4159 36.9036 90.7599 37.3496C90.4379 37.5676 90.0719 37.6776 89.7059 37.6776H89.7039ZM89.3119 36.3476C89.6679 36.6016 89.9939 36.4196 90.0859 36.3576C90.1779 36.2956 90.4679 36.0596 90.3619 35.6356L88.2199 26.9536L82.2439 31.2996L89.3119 36.3476Z" fill="#CCD2D6"/>
                <path d="M31.9899 159.371C31.4319 159.371 30.8919 159.149 30.4939 158.747C30.0119 158.261 29.7979 157.567 29.9199 156.895L33.4059 137.653C33.5179 137.039 33.8919 136.509 34.4339 136.201C34.9759 135.893 35.6239 135.841 36.2079 136.057L70.6499 148.885C71.5539 149.221 72.0999 150.093 72.0099 151.053C71.9179 152.013 71.2179 152.767 70.2679 152.927L32.3399 159.341C32.2239 159.361 32.1059 159.371 31.9899 159.371ZM35.4759 137.123C35.3219 137.123 35.1679 137.163 35.0299 137.241C34.7979 137.373 34.6359 137.601 34.5879 137.865L31.1019 157.107C31.0479 157.401 31.1379 157.691 31.3479 157.903C31.5579 158.115 31.8459 158.207 32.1399 158.159L70.0679 151.745C70.5719 151.659 70.7839 151.273 70.8159 150.941C70.8479 150.607 70.7099 150.189 70.2319 150.011L35.7899 137.183C35.6879 137.145 35.5819 137.125 35.4739 137.125L35.4759 137.123Z" fill="#CCD2D6"/>
                <path d="M58.99 139.062C58.634 139.062 58.27 138.968 57.93 138.772L48.762 133.548C48.266 133.264 47.912 132.804 47.768 132.252C47.624 131.698 47.708 131.124 48.002 130.636L50.118 127.132C50.472 126.546 51.092 126.168 51.774 126.122C52.456 126.074 53.122 126.366 53.552 126.898L60.604 135.626C61.26 136.436 61.246 137.514 60.57 138.308C60.15 138.802 59.578 139.062 58.988 139.062H58.99ZM51.92 127.316C51.898 127.316 51.878 127.316 51.856 127.318C51.558 127.338 51.3 127.496 51.146 127.752L49.03 131.256C48.904 131.466 48.868 131.712 48.93 131.95C48.992 132.188 49.144 132.386 49.356 132.506L58.524 137.73C59.004 138.002 59.424 137.806 59.658 137.53C59.892 137.254 60.018 136.808 59.672 136.378L52.62 127.65C52.446 127.434 52.194 127.314 51.92 127.314V127.316Z" fill="#CCD2D6"/>
                <path d="M182.424 114.176C182.38 114.176 182.334 114.176 182.288 114.172L169.972 113.384C169.022 113.324 168.272 112.686 168.058 111.758C167.844 110.832 168.24 109.928 169.066 109.458L179.168 103.71C179.716 103.398 180.366 103.348 180.954 103.572C181.542 103.796 181.996 104.266 182.198 104.862L184.412 111.398C184.638 112.064 184.516 112.794 184.09 113.352C183.69 113.874 183.074 114.176 182.422 114.176H182.424ZM169.66 110.502C169.23 110.746 169.154 111.172 169.228 111.49C169.302 111.806 169.556 112.156 170.05 112.188L182.366 112.976C182.676 112.996 182.954 112.868 183.14 112.624C183.326 112.38 183.376 112.076 183.278 111.786L181.064 105.25C180.978 104.994 180.782 104.792 180.53 104.696C180.278 104.6 179.998 104.622 179.764 104.756L169.662 110.504L169.66 110.502Z" fill="#CCD2D6"/>
                </g>
                <defs>
                <clipPath id="clip0_15454_7920">
                <rect width="200" height="200" fill="white"/>
                </clipPath>
                </defs>
                </svg>

          <h5 class="mt-3 mb-3 text-white"><?= $this->lang->line("network-error") ?></h5>
          <p class="text-ac"><?= $this->lang->line("network-unable") ?></p>
          <div class="mt-5">
            <a href="javascript:void(0);" class="pb_retry pb_h" onclick="location.reload()"><?= $this->lang->line("network-retry") ?></a>
          </div>
          <!-- <div class="mt-3">
            <a href="javascripot:void(0);" class="pb_open pb_h">Open Setting</a>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</section>

<script>
    if(is_login == "YES"){
        localStorage.setItem('pb_session', "<?= $sess_token; ?>");
    }
    $(document).ready(function(){
        let live_button_display = (localStorage.getItem('pb_live_status'))?true:false;
        if(live_button_display == true){
            $('.live_ev_show').removeClass('d-none');
        }

        let subscription_plan_exists = localStorage.getItem('pb_subs');
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
<?php if ((($without_head != 1) || ($without_head == 2)) && ($without_head != 3)) {
    include_once('footer.php');
}

if($this->session->flashdata('error') == "Transaction Failed."){ 
    $this->session->unset_userdata('error');
    $this->session->unset_userdata('msg_status');
    $this->session->unset_userdata('toast_msg');
}


if($this->session->userdata('payment_process')){ 
    $this->session->unset_userdata('payment_process');
    $this->session->unset_userdata('billdesk_data');
    $this->session->unset_userdata('is_rental');
    $this->session->unset_userdata('partner_payment');
    ?>
  <script>
    let partner_payment = "<?=$partner_payment?>";
    if(partner_payment == "NO"){
        Swal.fire({
            title: "<?= $swal_title; ?>",
            text: "<?= $swal_text; ?>",
            imageUrl: "<?= $swal_image; ?>",
            imageWidth: 70,
            imageHeight: 70,
            confirmButtonText: "<?php echo $this->lang->line('ok'); ?>",
            imageAlt: "Custom image",
            customClass: {
                popup: "custom_swal",
            }
        });
    } else{
        Swal.fire({
            title: "<?= $swal_title; ?>",
            text: "<?= $swal_text; ?>",
            imageUrl: "<?= $swal_image; ?>",
            imageWidth: 70,
            imageHeight: 70,
            confirmButtonText: "<?php echo $this->lang->line('ok'); ?>",
            imageAlt: "Custom image",
            customClass: {
                popup: "custom_swal",
            },
            allowOutsideClick: false,
        }).then(function(isConfirm) { //console.log(isConfirm);
            if (isConfirm.value && isConfirm.value == true) {
                location.reload();
            }
        });
    }
        
    queueTrackingData('trackEvent', ["<?=$event_name;?>", "PaymentStatus", "<?=$event_status;?>"]);
  </script>
<?php 
}

if($this->session->userdata('session_expired')){ 
    $expiration_type = $this->session->userdata('session_expired'); //"getVersion";
    if($expiration_type == "country_changed"){
        $this->session->unset_userdata('session_expired');
    }
    ?>
    <script src="<?= base_url('assets/website_assets/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
    <script src="<?= base_url('assets/website_assets/js/sweetalertall2min.js'); ?>"></script>
    <script>
        let expiration_type = "<?=$expiration_type?>";
        if(expiration_type == "country_changed"){
            deleteAllMasterContentKeys();
            location.reload();
        } else {
            var env = "<?= ENVIRONMENT ?>";
            localStorage.removeItem('pb_session');
            swal({
            title: '<?= $this->lang->line('session_expired'); ?>',
            text: "<?= $this->lang->line('redirect_message'); ?>",
            imageUrl: "<?= base_url('assets/images/logout.png'); ?>",
            imageWidth: 70,
            imageHeight: 70,
            confirmButtonColor: '#4845F6',
            confirmButtonText: "<?= $this->lang->line('btn_ok'); ?>",
            showCancelButton: false,
            allowOutsideClick: false,
            }).then(function(isConfirm) { //console.log(isConfirm);
                if (isConfirm.value && isConfirm.value == true) {
                    deleteAllMasterContentKeys();
                    Promise.all([
                    unsyncedContinueWatchData(cacheKey),
                    unsyncedWatchList(watchListCacheKey),
                    unsyncedRatingList(ratingKey),
                    unsyncedFavourites(favKey0),
                    unsyncedFavourites(favKey1)
                    ]).then((results) => {
                        var contWatchData = results[0];
                        var watchListData = results[1];
                        var ratingData = results[2];
                        var favData0 = results[3];
                        var favData1 = results[4];
                        $.ajax({
                            type: 'POST',
                            url: "<?= base_url('web/Login_register/logout'); ?>",
                            dataType: "json",
                            data: {
                            contWatchData: contWatchData,
                            watchListData: watchListData,
                            ratingData: ratingData,
                            favData0: favData0,
                            favData1: favData1,
                            logout: 1
                            },
                            success: function(data) {
                                if (data.status == true) {
                                    Promise.all([
                                    update_bulk_cache(watchListCacheKey, watchListData, data.watchList_lastupdated),
                                    update_bulk_cache(cacheKey, contWatchData, data.cont_lastupdated),
                                    update_bulk_cache(ratingKey, ratingData, data.rating_lastupdated),
                                    update_bulk_cache(favKey0, favData0, data.fav_lastupdated0),
                                    update_bulk_cache(favKey1, favData1, data.fav_lastupdated1)
                                    ]).then((res) => {
                                    window.location.href = '<?php echo base_url(); ?>';
                                    });
                                } 
                            },
                            complete: function(){
                                window.location.href = '<?php echo base_url(); ?>';
                            }
                        });
                    });
                }
            });
        }
    </script>
    <?php
} ?>


<script>
     function homeconnection(event) {
    if (event.type == "offline") {
      $("#pboverlaydiv").css("display", "grid");
      //console.log('offline');
      //overlay("Please wait.. internet is Not available.");
    }
    if (event.type == "online") {
      $("#pboverlaydiv").css("display", "none");
      //..console.log('online');
      //overlay("");
    }
  }
  window.addEventListener('online', homeconnection);
  window.addEventListener('offline', homeconnection);

  function formatTimestamp(timestamp) {
    const date = new Date(timestamp * 1000);
    const day = date.getDate();
    const daySuffix = (day) => {
      if (day % 10 === 1 && day !== 11) return `${day}st`;
      if (day % 10 === 2 && day !== 12) return `${day}nd`;
      if (day % 10 === 3 && day !== 13) return `${day}rd`;
      return `${day}th`;
    };
    const dayWithSuffix = daySuffix(day);
    const options = {
      month: "short",
      year: "numeric",
      hour: "numeric",
      minute: "numeric",
      hour12: true
    };
    const formattedDate = date.toLocaleString("en-US", options);
    const [monthDate, time] = formattedDate.split(", ");
    return `${dayWithSuffix} ${monthDate}, ${time}`;
  }
</script>
