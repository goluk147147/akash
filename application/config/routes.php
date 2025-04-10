<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  | example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  | https://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  | $route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  | $route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  | $route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples: my-controller/index -> my_controller/index
  |   my-controller/my-method -> my_controller/my_method
 */

$route['default_controller'] = 'web/home/index';
//$route['default_controller'] = 'web/dashboard/index';
$route['404']             = "web/My_404";
$route['404_override']    = 'web/My_404';
$route['translate_uri_dashes'] = FALSE;


$route['all'] = 'web/Dashboard';
$route['dashboard-details'] = 'web/Dashboard/category';
// $route['gener_list/(:num)/(:any)'] = 'web/Dashboard/genre_list/$1/$2';
$route['agregator_list'] = 'web/Dashboard/agregator_list';
$route['user-login'] = 'web/Login_register/OTP_login';
$route['continue-details'] = 'web/Dashboard/continue_watching_details';
$route['settings_details'] = 'web/Login_register/settings_details';
$route['sub_devices'] = 'web/Login_register/sub_devices';
$route['my_user_deatails'] = 'web/Login_register/my_user_deatails';
$route['my_account'] = 'web/Login_register/my_account';
$route['forgot-password'] = 'web/Login_register/forgot_password';
$route['prasar_login'] = 'web/Login_register/prasar_login';
$route['delete-account'] = 'web/Login_register/delete_account';
$route['profile_parse'] = 'web/Login_register/profile_parse';
$route['watching-profile'] = 'web/Login_register/watching_profile';
$route['error-404'] = 'web/Dashboard/error';
$route['video-details'] = 'web/Dashboard/video_details';
$route['article-details'] = 'web/Dashboard/get_article_details';
$route['audio-details-list'] = 'web/Dashboard/get_audio_details';
$route['profile-details'] = 'web/Dashboard/profile_details';
$route['audio-details'] = 'web/Dashboard/audio_details';
$route['play-video'] = 'web/Dashboard/play_video';
$route['media'] = 'web/Player/playMedia';
// $route['play-media'] = 'web/Dashboard/play_media';
$route['play-media'] = 'web/Player/play';
$route['play-video-url'] = 'web/Dashboard/play_video_url';
$route['pdf-details'] = 'web/Dashboard/pdf_s';
$route['youtube'] = 'web/Dashboard/youtube';
$route['watchlist-details'] = 'web/Dashboard/watchlistDetails';
$route['test'] = 'web/Dashboard/test';
// $route['play-episode'] = 'web/Dashboard/play_episode_audio';
$route['play-episode'] = 'web/Player/playMedia';
$route['play-episode-test'] = 'web/Dashboard/play_episode_test';
$route['play-episode-test-youtube'] = 'web/Dashboard/play_episode_youtube_test';


$route['play-episode-hls'] = 'web/Dashboard/play_episode_hls';
$route['play-audio'] = 'web/Dashboard/play_audio';
$route['dashboard'] = 'web/Dashboard/index';
$route['afterplay'] = 'web/Dashboard/afterplay';
$route['details'] = 'web/Dashboard/video_details';
$route['watching-details'] = 'web/Dashboard/continue_watching_details';
$route['gener_list'] = 'web/Dashboard/genre_list';
$route['web-series'] = 'web/Dashboard/web_series';
$route['news'] = 'web/Dashboard/news';
$route['tv-serials'] = 'web/Dashboard/tv_serial';
$route['view-all'] = 'web/Dashboard/view_all';
$route['contact_us'] = 'web/Dashboard/contact_us';
$route['contact-us'] = 'web/Dashboard/contactus';
$route['pb_live_details'] = 'web/Live/live_channel';
$route['pb_live'] = 'web/Live/pb_live';
$route['favorite'] = 'web/Live/favorite';
$route['search'] = 'web/Search/allsearch';

$route['privacy-policy'] = 'web/Dashboard/privacy_policy';
$route['privacy_policy'] = 'web/Dashboard/privacy_policy_mobile';
$route['terms-conditions'] = 'web/Dashboard/terms_conditions';
$route['terms_conditions'] = 'web/Dashboard/terms_conditions_mobile';
$route['about-us'] = 'web/Dashboard/about_us';
$route['help_support'] = 'web/Dashboard/help_support_mobile';
$route['help-support'] = 'web/Dashboard/help_support';
$route['faq-content'] = 'web/dashboard/help_support_content';
$route['Help-Support'] = 'web/dashboard/help_support_content';
$route['faq-content-details'] = 'web/dashboard/help_support_content_details';
$route['about_us'] = 'web/Dashboard/about_us_mobile';
$route['hls'] = 'web/Dashboard/hls';
$route['user-agreement-mobile'] = 'web/Dashboard/user_agree_mobile';
$route['refund-cancellations-policy'] = 'web/Dashboard/refund_cancellations_policy';
$route['packages-us'] = 'web/Dashboard/packages';
$route['about-us'] = 'web/Dashboard/about_us';
$route['copy-right'] = 'web/Dashboard/copyrights';
$route['save_language/(:any)/(:num)'] = 'web/Dashboard/set_cookie/$1/$2';
$route['chnage-language/(:any)'] = 'web/Dashboard/change_language/$1';
$route['detailssearch'] = 'web/Search';
$route['prasarsearch'] = 'web/Search/prasarsearch';
$route['search_prasar/(:num)/(:num)'] = 'web/Search/prasarsearchroute/$1/$2';
$route['watchlist'] = 'web/Watchlist/get_watchlist';
$route['user-agreement'] = 'web/Dashboard/user_agree';

$route['binding-terms'] = 'web/Dashboard/binding_terms';


/*routing for api panel start */
$route['api-panel'] = 'api_doc/Admin';
$route['data_model/videos'] = 'data_model/videos/Video_control/home_page_videos';
$route['privacy-policy'] = 'web/Dashboard/privacy_policy';
$route['subscription'] = 'web/subscription/subscription_pay';
$route['subscription-status'] = 'web/subscription/subscription_status';
$route['upgrade-subscription'] = 'web/subscription/upgrade_subscriptions';
$route['mobile-upgrade-subscription'] = 'web/subscription/mobile_upgrade_subscriptions';
$route['razorpay'] = 'web/subscription/buy_subscription';
$route['razorpost'] = 'web/subscription/razorpost';
$route['razorpost_rental'] = 'web/subscription/razorpost_rental';
$route['verify-payment'] = 'web/subscription/razor_verify';
$route['verify-payment-rental'] = 'web/subscription/razor_verify_rental';
$route['my_plan'] = 'web/subscription/transaction_history';
$route['success'] = 'web/Dashboard/Subscriptions/success/$1';
$route['subscription-and-rental'] = 'web/Dashboard/subscription_and_rental';
$route['search-page'] = 'web/Dashboard/search_page';
$route['manage-device'] = 'web/Dashboard/manage_device';

$route['no-data'] = 'web/My_404/noData';
$route['tv-guide'] = 'web/Epg/tv_guide';
$route['billdesk-subscription-status'] = 'web/subscription/billdesk_subscription_status';
$route['tv-past-program'] = 'web/Epg/tv_past_program';
$route['fav-channels'] = 'web/Epg/fav_channels';


$route['tv-upcoming-program'] = 'web/Epg/tv_upcoming_program';
$route['language'] = 'web/home/language';
$route['index-new2'] = 'web/home/index_new2';
$route['content-detail'] = 'web/Dashboard/content_detail';
$route['image-viewerall'] = 'web/Dashboard/image_viewerall';
$route['download'] = 'web/Dashboard/download_file';
$route['game-view'] = 'web/Dashboard/game_view';
$route['edit-profiles'] = 'web/Dashboard/edit_profiles';
$route['app-in-list'] = 'web/home/app_in_list';
$route['provider'] = 'web/home/provider';
$route['live-events'] = 'web/home/live_events';
$route['live'] = 'web/live/live';
$route['primary'] = 'web/home/primary';
$route['epub-reader'] = 'web/Dashboard/epub_reader';
$route['test_page'] = 'web/Dashboard/check_header';
$route['view-episode'] = 'web/Dashboard/view_episode';
$route['videopage'] = 'web/Dashboard/videopage';
$route['deleteAccount'] = 'web/Login_register/newotp_login';
$route['demoinvoice'] = 'web/Dashboard/demoinvoice';
$route['invoiceprint'] = 'web/Dashboard/invoiceprint';

// end here