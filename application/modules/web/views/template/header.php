<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <meta charset="UTF-8"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	
	<?php if(ENVIRONMENT == "production") { ?>
	<meta name="robots" content="index, follow"/>
	<?php } else { ?>
	<meta name="robots" content="noindex, nofollow"/>
	<?php } ?>
	<!-- title -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= FLOGO ?>">
	
	<title><?= TITLE ?></title>
	<!-- favicon -->
	<!-- <link rel="shortcut icon" href="<//?= base_url('assets/favicon.ico'); ?>"> -->
	<script type="text/javascript">var base_url = "<?=base_url()?>";</script>
	<link rel="stylesheet" href="<?= base_url() ?>assets/website_assets/css/video-js.css">
	<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
	<?php if(!$this->session->userdata('jwt') && !$this->session->userdata('payment_process')){ 
	$controller = $this->router->fetch_class();
	$method = $this->router->fetch_method();
	
	$current_route = $controller . '/' . $method;
	if($current_route != "subscription/billdesk_subscription_status"){ ?>
	<script type="text/javascript" src="<?= base_url('assets/js/set_session.js') ?>"></script>
	<?php } } 
	/*if(ENVIRONMENT != "QA" || ENVIRONMENT != "DEV"){ ?>
	<script type="text/javascript" src="<?= base_url('assets/js/new_relic.js') ?>"></script>
	<?php } */ ?>
	
	<script src="<?= base_url('assets/website_assets/js/jquery.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/slickmin.css'); ?>">

	<script src="<?= base_url('assets/js/encryption.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/website_assets/js/slickmin.js') ?>"></script>
	<script src="<?= base_url('assets/website_assets/js/bootstrap.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/owl.carousel.min.css'); ?>" />

	<script src="<?= base_url('assets/website_assets/js/owl.carousel.min.js'); ?>"></script>
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/pb-subscription.css'); ?>">
	<!-- mean menu css -->

	<!-- main style -->
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/main.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/subscription.css'); ?>">
	<!-- custom style -->
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/custom.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/webcustom.css'); ?>">
	<!-- responsive -->
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/responsive.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/prsar_responsive.css'); ?>">
	
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/toastrmin.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/sweetalertmin.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/sweetalert2min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/fontawesome-free-5.15.4-web/css/all.css'); ?>">


	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/datepickermin.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/select2min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/intelinputmin.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/shojumora.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/interfont.css'); ?>">
	
	<script src="<?= base_url('assets/js/sweetalert2.all.min.js') ?>"></script>
	<script src="<?= base_url('assets/website_assets/js/toastrmin.js') ?>"></script>
	<script src="<?= base_url() ?>assets/website_assets/js/propermin.js"></script>
	<script src="<?= base_url() ?>assets/website_assets/js/datepickermin.js"></script>
	<script src="<?= base_url() ?>assets/website_assets/js/intelinputmin.js"></script>
	
</head>

<div id="overlayonajaxhit" class="payment_loader2">
  <div class="cv-spinner">
    <span class="spinner"><span class="loader_spn"></span></span>
  </div>
</div>

<?php
$lang_ids = ($this->session->userdata('lang_id')) ? $this->session->userdata('lang_id') : 'English';

$url = 'getMasterHit';
//$nav_banner = call_curl_by_get_method($url, $document = array());
//$lang_id = ($this->session->userdata('lang_id')) ? $this->session->userdata('lang_id') : 1;
$lang_id = ($this->session->userdata('lang_id')) ? $this->session->userdata('lang_id') : 'english';

$is_upgrade = false; $show_ads = true; 
$resolution_limit = 0;
if($this->session->userdata('id')){
    $resolution_limit = DEFAULT_RESOLUTION;
    //pre($resolution_limit); die;
}

if(SUBSCRIPTION_CHECK == 1){
    $is_upgrade = true;
    $active_plan = $this->session->userdata('active_plan');
    //pre($active_plan); die;
    if(!empty($active_plan) && isset($active_plan['features'])){
        $features = $active_plan['features'];
        foreach ($features as $feature) {
            if ($feature['type'] == 5 && $feature['value'] == 0) {
               $show_ads = false;
            }
            // lowest priority for select resolutions
            if(isset($feature['type']) && ($feature['type']==14)){  // for new api changes
                preg_match('/\((\d+)[Pp]\)/', $feature['value'], $matches);
                if (!empty($matches)) {
                    $resolution_limit = $matches[1];
                }
            } else if(isset($feature['type']) && ($feature['type']==6)){ // for old api changes
                preg_match('/\((\d+)[Pp]\)/', $feature['value'], $matches);
                if (!empty($matches)) {
                    $resolution_limit = $matches[1];
                }
            }
        }
        // highest priority for select resolutions
        $plan_feature = $this->session->userdata('plan_features')??[]; 
        //pre($plan_feature); die;
        if(!empty($plan_feature)){
            foreach($plan_feature as $each_plan_feature){
                if($each_plan_feature['planid'] == $active_plan['id']){
                    $resolution_limit = $each_plan_feature['resolution'];
                    $resolution_limit = preg_replace('/\D/', '', $resolution_limit); // Removes all non-numeric characters
                }
            }
        }
    }
    if(!empty($active_plan) && isset($active_plan['is_upgradable'])){
        $is_upgrade = $active_plan['is_upgradable'];
    }
}
// pre($resolution_limit); die;
//pre($show_ads); die;
$this->session->set_userdata('max_quality',$resolution_limit);
$this->session->set_userdata('show_ads',$show_ads);

?>

<script>
	var feedType = localStorage.getItem('feedType')??'0';
	let current_Url= window.location.href;
    let url_Obj = new URL(current_Url);
    let path_name = url_Obj.pathname;
    let last_Segment = path_name.split('/').filter(Boolean).pop(); 
	if(last_Segment != "language"){
        check_lan_set();
    }
   
    function check_lan_set() { 
        let url_Obj1 = new URL(window.location.href);
        let path_name1 = url_Obj1.pathname;
        let last_Segment1 = path_name1.split('/').filter(Boolean).pop();  
		const baseurl = "<?= base_url() ?>";
		if(url_Obj1 !=baseurl ){
			localStorage.removeItem("mfeedType");
	
		}
        let lang_set_cond = false;
        let cache_key = "lang_set";
        //let get_lang_val = await get_cache_data(cache_key);
        let get_lang_val = localStorage.getItem(cache_key);
        //alert(get_lang_val);
        if (get_lang_val 
		|| last_Segment1 =='primary' 
		|| last_Segment1 =='faq-content'
		|| last_Segment1 =='privacy-policy'
		|| last_Segment1 =='terms-conditions'
		|| last_Segment1 =='terms_conditions'
		|| last_Segment1 =='about-us'
		|| last_Segment1 =='deleteAccount'
		|| last_Segment1 =='videopage'    
		|| last_Segment1 =='subscription'    
		|| last_Segment1 =='faq-content-details' 
		|| last_Segment1 =='user-login') {
            lang_set_cond = true;
        }
        if (lang_set_cond == false) {
			let api_url = `${base_url}web/Login_register/save_redirect`;
			fetch(api_url, {
				method: 'POST',
				headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
				},
				body: 'redirect_url=' + window.location.href
			})
			window.location.href = "<?= base_url('language'); ?>"; 
        }
    }
</script>

<script>
	overlayonajaxhit();
	function overlayonajaxhit() { //alert();
		const loader = document.getElementById('overlayonajaxhit');
		if (loader) {
			loader.style.display = 'none';
		}
	}

	async function deleteAllMasterContentKeys() {
		const cache = await caches.open('appCache');
		const keys = await cache.keys();
		localStorage.setItem('feedType', 0);
		await Promise.all(
			keys.map(async (request) => {
				if (request.url.includes('masterContent-')) {
					await cache.delete(request);
				}
			})
		);
	}

	$(document).ready(function() {
		if ($('.carousel_bott4').length) {
			var owl = $(".carousel_bott4").owlCarousel({
			items:8, 
			loop: false,
			margin: 5,
			nav: true,
			dots: false,
			stagePadding: 30,
			onInitialized: adjustStretchHeader,

			navText: [
				'<a class="class_btn"><i class="fa fa-chevron-left"></i></a>',
				'<a class="class_next"><i class="fa fa-chevron-right"></i></a>'
			],
			responsive: {
				0: {
				//mouseDrag: true,
				stagePadding: 5,
				nav: false,
				items: 3
				},
				380: {

				stagePadding: 10,
				nav: false,
				items: 3
				},
				600: {

				stagePadding: 10,
				nav: false,
				items: 5
				},

				900: {

				stagePadding: 10,
				nav: false,
				items: 6,
				margin: 7
				},

				1024: {
				stagePadding: 10,
				items: 6,
                slideBy:3
				},
				1025: {

				items: 6,
				margin: 20,
				slideBy:3
				},

				1450: {

				items: 7,
				margin: 20,
				slideBy:3
				},


				1800: {

				items: 8,
				margin: 20,
				slideBy:3
				}
			}
			});
			owl.trigger('refresh.owl.carousel');
		}
	});
	
</script>
<style>
	@media(min-width:1200px) {
		section#main-content {
			flex-grow: 1;
		}

		body,
		body.swal2-shown.swal2-height-auto {
			display: flex !important;
			flex-direction: column !important;
			height: 100vh !important;
		}
	}

	.premium_icondt {
		z-index: 0;
	}

	#toast-container>.toast-success {
		background-image: url("<?= base_url('assets/images/success.svg'); ?>") !important;
		background-repeat: no-repeat !important;
		background-position-y: center !important;
		background-position-x: 12px !important;
	}

	#toast-container>.toast-info {
		background-image: url("<?= base_url('assets/images/info-img.png'); ?>") !important;
		background-repeat: no-repeat !important;
		background-position-y: center !important;
		background-position-x: 12px !important;
	}

	#toast-container>.toast-warning {
		background-image: url("<?= base_url('assets/images/warning-img.png'); ?>") !important;
		background-repeat: no-repeat !important;
		background-position-y: center !important;
		background-position-x: 12px !important;
	}

	#toast-container>.toast-error {
		background-image: url("<?= base_url('assets/images/error.svg'); ?>") !important;
		background-repeat: no-repeat !important;
		background-position-y: center !important;
		background-position-x: 12px !important;
	}
	
</style>


<body>
	<div class="lineragradienttop"></div>
	<?php
	if (!$this->session->userdata('id')) {
		$userId = $this->session->userdata('tempuuid');
	} else {
		$type = $this->session->userdata('Iskid') == 0 ? 'Adult' : 'Child';
		$userId = $this->session->userdata('id') . '_' . $this->session->userdata('profile_id') . '_' . $type;
	}

	if (isset($_SESSION['gender'])) {
		if ($_SESSION['gender'] == 1) {
			$gender = "Male";
		} else if ($_SESSION['gender'] == 2) {

			$gender = "Female";
		} else {
			$gender = "Not Available";
		}
	} else {
		$gender = "Not Available";
	}

	if (isset($_SESSION['dob'])) {
		if ($_SESSION['dob'] != "") {
			$dob = $_SESSION['dob'];

			$dobDateTime = new DateTime($dob);
			$todayDate = date('Y-m-d');
			$date2006 = new DateTime($todayDate);
			//pre($date2006);die;
			$diff = $dobDateTime->diff($date2006)->y;
			$diffYears = $diff . ' Years Old';
		} else {
			$diffYears = "Not Available";
		}
	} else {
		$diffYears = "Not Available";
	}
	if (isset($_SESSION['lang_id'])) {
		if ($_SESSION['lang_id'] != "") {
			$lang_id_name =ucwords($_SESSION['lang_id']);
		} else {
			$lang_id_name = "English";
		}
	} else {
		$lang_id_name = "English";
	}

	if (isset($_SESSION['mobile'])) {
		if ($_SESSION['mobile'] != "") {
			$mobile = $_SESSION['mobile'];
		}
		else{
		$mobile = $_SESSION['email'];
		}
	} else { 
		$mobile = "Not Available";
	}


	?>

<script type="text/javascript">
    // Initialize _paq if it doesn't already exist
    var user = 'GuestUser';
    var isSubscribe = "<?= SUBSCRIPTION_CHECK ?>";
    var sess_idd = "<?php echo $this->session->userdata('id'); ?>";
    if (isSubscribe == 1) {
        user = 'PaidUser';
    } else if (sess_idd !== '') {
        user = 'FreeUser';
    }
    var webversion = "<?= WEB_VERSION ?>";
    var diffYears = "<?= $diffYears ?>"; 
    var gender = "<?= $gender ?>";
    var lang_id_name = "<?= $lang_id_name ?>"; 
    var mobile = "<?= $mobile ?>";
    var userId = "<?= $userId ?>";
    var _paq = window._paq || [];
	_paq.push(['setUserId', userId]);
	_paq.push(['setCustomDimension', 1, webversion]); // Set custom dimension 1 (replace with your version name)
	_paq.push(['setCustomDimension', 2, diffYears ]); // Set custom dimension 2 (replace with your constant value)
	_paq.push(['setCustomDimension', 3, gender ]);
	_paq.push(['setCustomDimension', 5, lang_id_name ]);
	_paq.push(['setCustomDimension', 7, mobile ]);
	_paq.push(['setCustomDimension', 8, user ]);
	_paq.push(['trackPageView']);
	_paq.push(['enableLinkTracking']);
	var dispatchInterval = 500; // Delay in milliseconds (1 second)
	if(sess_idd){
	dispatchInterval = 500	
	}
    // Interval in milliseconds (2 minutes)
    var cacheName = 'appCache'; // Name of the cache

    // Function to open the cache
    function openCache() {
        return caches.open(cacheName);
    }
  var track = "ltrackingData"+sess_idd; 
    // Function to queue tracking data
    function queueTrackingData(method, params) {
        openCache().then((cache) => {
            cache.match(track).then((response) => {
                let trackingQueue = [];
                if (response) {
                    response.json().then((data) => {
                        trackingQueue = data;
                        trackingQueue.push([method].concat(params));
                        cache.put(track, new Response(JSON.stringify(trackingQueue)));
                    });
                } else {
                    trackingQueue.push([method].concat(params));
                    cache.put(track, new Response(JSON.stringify(trackingQueue)));
                }
            });
        });
    }

	function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

	var delayBetweenDispatches = 0; // Delay in milliseconds (1 second)
	if(sess_idd){
	delayBetweenDispatches = 0	
	}

var time = new Date().toISOString(); // Use ISO string for current time

// Function to dispatch tracked data with delay
async function dispatchTrackingData() {
    try {
        const cache = await openCache();
        const response = await cache.match(track);
        
        if (response) {
            const trackingQueue = await response.json();
            
            if (Array.isArray(trackingQueue) && trackingQueue.length > 0) {
                for (const item of trackingQueue) {                    
                    const method = item[0];
                    const params = item.slice(1);
                    _paq.push([method].concat(params)); // Dispatch the data
                    //console.log(new Date().toISOString() + " - Dispatched item:", item);
                    // Wait for the specified delay before dispatching the next item
                    await delay(delayBetweenDispatches);
                }
                
                // Clear the cache after dispatching data
                await cache.delete(track);
                
                // console.log('All tracking data dispatched.');
            }
        } else {
            // console.log('No tracking data found in cache.');
        }
    } catch (error) {
        // console.error('Error dispatching tracking data:', error);
    }
}




    // Set an interval to dispatch the queued data
    setInterval(dispatchTrackingData, dispatchInterval);

    // Use Page Visibility API to dispatch data when the page is hidden
    // document.addEventListener('visibilitychange', function() {
    //     if (document.visibilityState === 'hidden') {
    //         dispatchTrackingData(); // Ensure data is sent before the page is hidden
    //     }
    // });

    // Fetch Matomo URL from the session data
    var urlmatomo = '<?= $this->session->userdata("matamo_url") ?>';
    var newUrl = urlmatomo.replace("matomo.php", "");



    // Queue initial tracking data
 
    //queueTrackingData('enableLinkTracking', []);

    // Load the Matomo tracking script
    (function() {
        try {
            var u = newUrl;
            _paq.push(['setTrackerUrl', u + 'matomo.php']);
            _paq.push(['setSiteId', 1]); // Replace with your site ID

            var d = document,
                g = d.createElement('script'),
                s = d.getElementsByTagName('script')[0];

            g.type = 'text/javascript';
            g.async = true;
            g.src = u + 'matomo.js';

            s.parentNode.insertBefore(g, s);

            g.onload = function() {
                //console.log('Matomo script loaded successfully.');
                // Dispatch any remaining data when Matomo is ready
               // dispatchTrackingData();
            };
            g.onerror = function(error) {
                console.warn('Error loading Matomo script:', error);
            };
        } catch (innerError) {
            console.log('Failed to load Matomo script:', innerError);
            setTimeout(function() {
                if (window._paq) {
                    window._paq = [];
                }
            }, 120000); // 2 minutes
        }
    })();



		function detectBrowser() {
			var userAgent = navigator.userAgent,
				tem,
				matchTest = userAgent.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];

			if (/trident/i.test(matchTest[1])) {
				tem = /\brv[ :]+(\d+)/g.exec(userAgent) || [];
				return {
					name: 'IE',
					version: (tem[1] || '')
				};
			}

			if (matchTest[1] === 'Chrome') {
				tem = userAgent.match(/\b(OPR|Edge)\/(\d+)/);
				if (tem != null) return {
					name: tem.slice(1)[0].replace('OPR', 'Opera'),
					version: tem[1]
				};
			}

			matchTest = matchTest[2] ? [matchTest[1], matchTest[2]] : [navigator.appName, navigator.appVersion, '-?'];

			if ((tem = userAgent.match(/version\/(\d+)/i)) != null) matchTest.splice(1, 1, tem[1]);

			return {
				name: matchTest[0],
				version: matchTest[1]
			};
		}
		$(document).ready(function() {
			toastr.options = {
				'closeButton': true,
				'debug': false,
				'newestOnTop': true,
				'progressBar': false,
				'positionClass': 'toast-top-right',
				'preventDuplicates': false,
				'showDuration': '1000',
				'hideDuration': '1000',
				'timeOut': '5000',
				'extendedTimeOut': '1000',
				'showEasing': 'swing',
				'hideEasing': 'linear',
				'showMethod': 'fadeIn',
				'hideMethod': 'fadeOut'
			};

			var toast_status = "<?= $this->session->flashdata('msg_status') ?? 0 ?>";
			if (toast_status != 0) {
				var toast_msg = "<?= $this->session->flashdata('toast_msg') ?? '' ?>";
				if (toast_msg != '') {
					if (toast_status == 200) {
						toastr.success(toast_msg, 'Success', {
							iconClass: 'toast-success'
						});
					} else if(toast_status == 300) {
						toastr.error(toast_msg, '', {
							iconClass: 'toast-info'
						});
					}else{
						toastr.error(toast_msg, 'Failed', {
							iconClass: 'toast-error'
						});
					}
				}
			}
		});

		function queueTrackingDataWithDelay(method, params, delay) {
		setTimeout(() => {
		queueTrackingData(method, params);
		}, delay);
		}

	</script>
	<script>
		$(document).ready(function() {
  //  if ($(window).width() > 1024) {
      $(document).on('mouseover', '.geners_data .owl-item', function() {
        //  alert(this);

        $(".geners_data .owl-stage-outer").addClass("overflow");
        $(".geners_data").addClass("overflow");
        $(this).addClass("z4");
      });
      $(document).on('mouseleave', '.geners_data .owl-item', function() {
        $(".geners_data .owl-stage-outer").removeClass("overflow");
        $(".geners_data").removeClass("overflow");
        //alert(this+" r");
        $(this).removeClass("z4");

      });
   // }
  })

</script>

<script>
  $(document).ready(function(){
    let home_Key = 'masterContent-0';
    let retryCount = 1;
    let maxRetries = 10;
    function fetchDataWithRetry() {
      //console.log("retryCount",retryCount);
      setTimeout(async () => {
        while (retryCount < maxRetries) {
          try {
            let cache_data = await fetchCacheData(home_Key);
            if (cache_data && cache_data.data) {
              // Cache data found, process it
              let master_homedata = cache_data.data.nav_banner;
              let applink = master_homedata.hasOwnProperty('app_link') ? master_homedata['app_link'] : {};
              let applinkd = master_homedata.data.hasOwnProperty('app_link') ? master_homedata['data']['app_link'] : {};

              if (applink.hasOwnProperty('ios_link')) {
                $('.apple_link').attr('href', applink.ios_link);
                $('.android_link').attr('href', applink.android_link);
              } else if (applinkd.hasOwnProperty('ios_link')) {
                $('.apple_link').attr('href', applinkd.ios_link);
                $('.android_link').attr('href', applinkd.android_link);
              }
              return; // Exit the loop if data is successfully processed
            }
          } catch (error) {
            //console.error('Error fetching or processing cache data:', error);
          }

          retryCount++;
          //console.log(`Retrying... (${retryCount}/${maxRetries})`);
        }
      }, 1000);

      //console.warn('Maximum retries reached. Data not available.');
      // shimmer('hide');
    }
    fetchDataWithRetry();
  });
</script>