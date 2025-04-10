<style>
    #iframe-container {
        width: 100%;
        height: 100vh; /* Or a specific height you want */
        position: relative;
    }
    iframe {
        width: 100%;
        height: 100%;
        border: 0;
    } 
    #myIframe .close{
        position:absolute;
        right:15px;
        top:15px;
        z-index:9999;
    }
    .iframe_modal .modal-content{
        margin:auto;
    }
    .modal-xlgs{
        height:60vh;
    }
    .iframe_modal{
        --bs-modal-margin:0 !important;
    }
    .modal-xlgs{
        max-width:100% !important;
    }
    .my_video_banner {
        width: 100%;
        height: auto;
    }
    .viewll_dt{
        position:relative;
        z-index:11;
    }
    .epub_control{
        position:fixed;
        bottom:10px;
    }
    #epubModal{
        background:#fff;
    }
    #epubModal .close{
        position:absolute;
        right:15px;
        top:15px;
        z-index:9999;
    }
    /* #epubModal .modal-content{
        background:#fff !important;
    } */
    #ondc-iframe-container {
        width: 100%;
        height: 100vh; /* Or a specific height you want */
        position: relative;
    }
    iframe {
        width: 100%;
        height: 100%;
        border: 0;
    } 
    #ondc_iframe .close{
        position:absolute;
        right:15px;
        top:15px;
        z-index:9999;
    }
    .iframe_modal .modal-content{
        margin:auto;
    }
    .modal-xlgs{
        height:60vh;
    }
    .iframe_modal{
        --bs-modal-margin:0 !important;
    }
</style>
<style>
        #epub_viewer {
            width: 100%;
            height: 600px;
            border: 1px solid #ccc;
            overflow: hidden;
        }
        #controls {
            margin: 10px 0;
        }
        #toc {
            list-style-type: none;
            padding: 0;
        }
        #toc li {
            margin: 5px 0;
        }
    </style>
<?php
//$type = 4;
$authors = ""; 
$file_format = "image"; $ebook_url = "";
if(isset($extra_json["ageAppropriateness"])){
    $age = $extra_json["ageAppropriateness"];
} 
function getCurrentPageURL() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    
    return $protocol . $host . $uri;
}
$currentURL = getCurrentPageURL();

$formatted_genres = ""; $gaming_class = "";
if(isset($genres)){
    $formatted_genres = explode(",", $genres);
    $formatted_genres = array_map('strtoupper', $formatted_genres);
    $separator = " | ";
    if($type == "4" ||$type == "7"){
        $separator = '<span class="dotspan">●</span>';
    }
    $formatted_genres = implode($separator,$formatted_genres);
}
$button_text = $rating = $related_text = $release_year = $trailer_url = ""; 
$download_url = $thumbnail??"";
$by = $this->lang->line('author');
$pages = $language = $game_url = "";
$mobile_exists = "YES"; $game_url_status = "NO";
if($type == "4" || $type == "7"){
    $authors = $extra_json["photoBy"];
    $by = $this->lang->line('photo_by');
    $button_text = ($this->session->userdata('id'))?$this->lang->line('view_now'):$this->lang->line('login_to_view');
    $download_url = $thumbnail??"";
    $f_url = isset($season[0]['videos'][0]['file_url'])?$season[0]['videos'][0]['file_url']:'';
    preg_match('/\.([a-zA-Z0-9]+)$/', $f_url, $matches);
    $extension = isset($matches[1]) ? $matches[1] : null;   
     $format_type = strtolower($extension);
    if(($format_type == "htm"||$format_type == "html")){
        $file_format = "ebook";
        if (!empty($season)) {
            $ebook_url = (isset($season[0]['videos'][0]['file_url']))?$season[0]['videos'][0]['file_url']:base_url();
        }
    }
    //pre($ebook_url); die;
    $related_text = $this->lang->line('similar_to_this');
} else if($type == "5"){ 
    if(isset($extra_json["authors"])){
        $authors = implode(", ", $extra_json["authors"]);
    }
    $by = $this->lang->line('author');
    $button_text = ($this->session->userdata('id'))?$this->lang->line('read_now'):$this->lang->line('login_to_read');
    $download_url = $extra_json['documentUrl']??"";
    //$download_url = "https://s3.amazonaws.com/epubjs/books/moby-dick.epub";
    $pages = $extra_json['numberOfPages']??"";
    $language = $language_title??"";
    $related_text = $this->lang->line('similar_to_this');
} else if($type == "6"){ // Games
    //pre($this->session->userdata()); die;
    $mobile_exists = "NO";
    if($this->session->userdata('mobile') && $this->session->userdata('mobile') != ""){
        $mobile_exists = "YES";
    }
    if($mobile_exists == "NO") $this->session->set_userdata('complete_profile_for_game',$enc_id);
    $by = $this->lang->line('developer');
    $authors = $extra_json["game_developer"]??$publisher_name;
    $button_text = ($this->session->userdata('id'))?$this->lang->line('get_game'):$this->lang->line('login_to_play');
    $website_url = $webview_frontend??$website_url;
    $website_url = (isset($website_url))?remove_hidden_characters($website_url):"";
    //pre($website_url); die;
    //$website_url = "https://pb.mudgames.in/auth";
    //"AccessKey"=>'ry9DxjvDD9sK3sC4XHqZB9tfttNfV1b0',
    //"SecretKey"=>'R@0PYLeS=5`zQ5y"`:{`rxf0kgWKje,z',
    //"GamingId"=>"LOK01"
    $download_url = $website_url;
    $language = $language_title??"";
    $related_text = $this->lang->line('more_games');
    // pre(strlen('R@0PYLeS=5`zQ5y"`:{`rxf0kgWKje,z'));
    // pre(unpack('H*', 'R@0PYLeS=5`zQ5y"`:{`rxf0kgWKje,z'));
    // pre(unpack('H*', $secret_key));
    // pre(strlen($secret_key)); die;
    // var_dump('R@0PYLeS=5`zQ5y"`:{`rxf0kgWKje,z');
    // var_dump($secret_key); die;
    
    if($this->session->userdata('id')){ //pre($this->session->userdata());
        //pre($extra_json); die;
        if(isset($access_key)){
            $partner = ["AccessKey"=>$access_key,//"538CA35F7C24C6E85E5CC32547C64",  
                        "SecretKey"=>$secret_key,//"w6BKGMteemroEbcWdO1zFNCDGEPjHCNp", //gFq4iK7iULPBTupXcf64ELh18s1mvK7T
                        "web_url"=>$website_url ?? "",
                        "GamingId"=>$extra_json['game_id'] ?? "",
                   ];
            //pre($partner); //die; 

            // Remove trailing slash if it exists
            $cleaned_website_url = rtrim($website_url, '/');

            $date = new DateTime('now', new DateTimeZone('UTC'));
            // Add 20 minutes to the current time
            $date->modify('+1440 minutes');
            $formatted_date = $date->format('Y-m-d\TH:i:s.u\Z');
            
            $profile_id_encoded = rawurlencode(base64_encode(aes_cbc_encryption_games($this->session->userdata('uuid'),AEC_CBC_KEY,true)));
            $username = rawurlencode($this->session->userdata('name'));
            $lang = rawurlencode($this->session->userdata('lang_id')??"English");
            $access_key = rawurlencode($partner['AccessKey']);
            //$timestamp = rawurlencode("2024-09-02T07:27:14.681406Z"); 
            //pre($formatted_date);
            $timestamp = rawurlencode($formatted_date);
            
            
            $game_base_url = $cleaned_website_url.'/game/'.rawurlencode($partner['GamingId']).'/profile/'.$profile_id_encoded.'/name/'.$username.'/language/'.$lang.'/accessKey/'.$access_key .'/timestamp/'.$timestamp;
            //echo "<b>Base_url:</b> ".rawurlencode($game_base_url)."<br><br>";
            $enc_type = (isset($extra_json['encryption_type']))?$extra_json['encryption_type']:"AES";
            if($enc_type == "HMAC"){
                $hash_token = rawurlencode(base64_encode(hash_hmac("sha256", $game_base_url,$partner['SecretKey'])));
            } else { 
                $hash_token = rawurlencode(aes_cbc_encryption_games($game_base_url,$partner['SecretKey']));
            }
            //echo "<b>Hash:</b>: ".rawurlencode($hash_token)."<br><br>";
            $game_url = $game_base_url."/hash/".$hash_token;
            $game_url_status = "YES";
            //echo "<b>Final_url:</b>: ".$game_url."<br><br>"; //die;

            //echo aes2_cbc_decryptionn($hash_token,$partner['SecretKey']); die;

            
           
        }
    }
    
    //pre($partner); die;
     
    //$extra_json['trailer_url'] = "https://demo.unified-streaming.com/k8s/features/stable/video/tears-of-steel/tears-of-steel.ism/.m3u8";
    if(isset($extra_json['trailer_url']) && $extra_json['trailer_url'] != "" && remoteFileExists($extra_json['trailer_url'])){
        if (strpos($extra_json['trailer_url'], "youtube.com") === false) {
            $trailer_url = $extra_json['trailer_url'];
        }
        
    } 
    //pre($trailer_url); die;

}

function aes2_cbc_decryptionn($encoded_string,$key) {
    //pre($key);// die;
    $encoding_type = "aes-256-cbc";
    $ivLength = openssl_cipher_iv_length("aes-256-cbc");

    // Decode hash into base64
    $base64_decoded_string = base64_decode(rawurldecode($encoded_string));
    
    $iv = substr($base64_decoded_string, 0, $ivLength);
    

    // Extract the encrypted data from the hash
    $ciphertext = substr($base64_decoded_string, $ivLength, -32);

   
    // Calculate SHA-256 hash of the encrypted data and IV
    $hash = substr($base64_decoded_string, -32);
    
    $calculatedHash = hash('sha256', $ciphertext . $iv, true);

    $decoded_string = openssl_decrypt($ciphertext, $encoding_type, $key, OPENSSL_RAW_DATA, $iv);
    
    return $decoded_string;
}



function remove_hidden_characters($string) {
    // Remove non-printable ASCII characters (control characters) from the string
    if($string != ""){
        return preg_replace('/[[:^print:]]/', '', $string);
    }
}





function remoteFileExists($url) { //pre($url); die;
    //return true;
    if(!is_array($url) && $url != ""){
        try{
            $headers = @get_headers($url);
            //pre($headers); die;
            if ($headers && strpos($headers[0], '200') !== false) {
                return true;
            }
        } catch(Exeception $e){
            return false;
        }
        
    } 
    return false;
}



$this->session->set_userdata('redirect_url',$currentURL);

//pre($type); die;
$allowed_type = ['4','5','7'];  // photo, pdf, poster
if(in_array($type,$allowed_type)){
?>
<section class=" img_pdf_details_icon">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto mt-3 col-12">
                <nav class="">
                    <a onclick="history.go(-1)" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="imf_pdf_category">
    <div class="container-fluid">
        <div class="row img_row_reverse align-items-center">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="img_pdf_text">
                    <?php if($title != ""){ ?>
                    <h1><?= $title??"";  ?></h1>
                    <?php } if($authors != ""){ ?>
                    <h2><?= $by; ?>: <?=$authors;?></h2>
                    <?php } ?>

                    <div class="discr_left-right">
                        <button id="scroll-left" class="scroll-left active"><i class="fas fa-chevron-left"></i></button>
                        <p class="description_dt d-flex ml23 ml25 mb-1 align-items-center">
                        <?php if($type == "4" || $type == "7"){
                                $options = [];
                                if(isset($extra_json['photoClickedOn']) && $extra_json['photoClickedOn'] != "" && false){
                                    $timestamp = strtotime(str_replace('/', '-', $extra_json['photoClickedOn']));
                                    $release_year =  date("Y",$timestamp);
                                    $options[] = $release_year;
                                }
                                if($age){ 
                                    $options[] = $this->lang->line('age').$age;
                                } if($formatted_genres){
                                    $options[] = $formatted_genres;
                                } 
                                if($options){
                                    echo implode(' ● ', $options);
                                }
                            } else if($type == "5"){
                                $options = [];
                                if(isset($extra_json['publicationDate']) && false){
                                    $timestamp = strtotime(str_replace('/', '-', $extra_json['publicationDate']));
                                    $release_year =  date("Y",$timestamp); 
                                    $options[] = $release_year;
                                } 
                                if($language){
                                    $options[] = $language;
                                } if($pages){
                                    $options[] = $pages.$this->lang->line('pages');
                                } if($age){
                                    $options[] = $this->lang->line('age').$age;
                                }
                                if($options){
                                    echo implode(' ● ', $options);
                                }
                            } ?>
                        </p>
                        <button id="scroll-right" class="scroll-right active"><i class="fas fa-chevron-right"></i></button>
                    </div>
                    <p class="descrpition_title_dt"><?= $description??"";  ?></p>
                    <?php if($type == "5"){?><p class="pb_ban_action"><?= $formatted_genres;?></p><?php } ?>

                    <div class="home_bnnr_btn img_pdf_bnn_btn">
                        <div class="banner-playe ban_playes d-flex align-items-center py-1 w-100">
                            <?php 
                            $btn_id = "open-login";
                            if($this->session->userdata('id')){
                                if($type == "4" || $type == "7"){
                                    $btn_id = ($file_format == "image")?"open-modal":"open-file";
                                    // $pattern = '/https?:\/\/[^\s]+\.html/';
                                    // // Search the string for the pattern
                                    // if (preg_match($pattern, $download_url, $matches)) {
                                    //     $btn_id = "open-file";
                                    // } 
                                } else if($type == "5") {
                                    $pattern = '/https?:\/\/[^\s]+\.epub/';
                                    if (preg_match($pattern, $download_url, $matches)) {
                                        $btn_id = "open-epub";
                                    }  else {
                                        $btn_id = "open-file";
                                    }
                                    //$btn_id = "open-file"; // Hold for now
                                } 
                            }?>
                            <button class="bnnr_play_btn bnner_play_color bannerPlayBtn" id="<?=$btn_id;?>">
                                <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_13798_4459)">
                                        <path d="M0.000541534 7.76803C0.20145 7.2671 0.513339 6.81825 0.912744 6.45525C2.154 5.02292 3.5735 3.75537 5.13663 2.68349C6.67179 1.5891 8.42058 0.83093 10.2688 0.458522C11.9215 0.165877 13.6217 0.302439 15.2065 0.855131C17.4038 1.62018 19.4081 2.85446 21.0803 4.47221C21.9806 5.30905 22.7976 6.23712 23.6305 7.14932C23.8602 7.38486 23.9887 7.70082 23.9887 8.02979C23.9887 8.35877 23.8602 8.67472 23.6305 8.91026C22.2557 10.6156 20.6452 12.1166 18.8474 13.3681C17.3119 14.4628 15.5634 15.2222 13.7153 15.5971C12.0626 15.8915 10.362 15.7549 8.7775 15.2005C6.58734 14.4399 4.58859 13.2125 2.91959 11.6032C2.00738 10.7585 1.18244 9.81056 0.337659 8.8944C0.194004 8.69489 0.0742083 8.47926 -0.0192871 8.25189L0.000541534 7.76803ZM12.0019 2.4138C10.5216 2.4117 9.10097 2.99746 8.05234 4.04237C7.00372 5.08728 6.4129 6.50581 6.40975 7.98616C6.40447 9.46478 6.98626 10.885 8.02734 11.9351C9.06842 12.9851 10.4837 13.5789 11.9623 13.5863C12.6973 13.5889 13.4256 13.4464 14.1054 13.1669C14.7852 12.8874 15.4031 12.4765 15.9238 11.9577C16.4444 11.4389 16.8575 10.8224 17.1394 10.1436C17.4213 9.46481 17.5664 8.73703 17.5664 8.00203C17.5685 6.52341 16.9837 5.1044 15.9404 4.05663C14.897 3.00886 13.4805 2.418 12.0019 2.4138Z" fill="white" />
                                        <path d="M15.8529 8.00606C15.8524 8.51264 15.752 9.01415 15.5576 9.48193C15.3631 9.9497 15.0784 10.3746 14.7196 10.7322C14.3608 11.0899 13.9351 11.3733 13.4667 11.5663C12.9984 11.7594 12.4965 11.8582 11.99 11.8571C11.4836 11.8566 10.9822 11.7562 10.5147 11.5617C10.0471 11.3672 9.62252 11.0824 9.26518 10.7236C8.90784 10.3648 8.62477 9.93899 8.43219 9.47064C8.2396 9.00229 8.14128 8.50056 8.14284 7.99416C8.14284 7.48776 8.24271 6.98633 8.43675 6.51858C8.63078 6.05083 8.91515 5.62593 9.2736 5.26822C9.63205 4.91051 10.0575 4.62701 10.5257 4.43395C10.9938 4.24088 11.4955 4.14203 12.0019 4.14307C13.0246 4.14518 14.0048 4.55322 14.7269 5.27755C15.449 6.00189 15.854 6.98327 15.8529 8.00606ZM11.7084 5.6264C11.4299 5.62217 11.1534 5.67362 10.8951 5.77776C10.6367 5.88189 10.4019 6.03661 10.2042 6.2328C10.0065 6.429 9.85003 6.66273 9.74396 6.92025C9.63789 7.17777 9.58435 7.45389 9.5865 7.7324H10.816C10.8281 7.52009 10.914 7.31868 11.0588 7.16298C11.2036 7.00729 11.3983 6.90707 11.6092 6.87968C11.6353 6.87053 11.6585 6.85476 11.6766 6.83389C11.6947 6.81302 11.707 6.78779 11.7123 6.7607C11.7044 6.36806 11.7044 5.98731 11.7044 5.61053L11.7084 5.6264Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_13798_4459">
                                            <rect width="23.9988" height="15.44" fill="white" transform="translate(0.000488281 0.280029)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <?= $button_text; ?>
                            </button>
                            <?php if($this->session->userdata('id')){ ?>
                                <div class="play_ep_btnn play_epsode_btn shv_dts d-flex image_pdf_flex">

                                    <div class="share_hl tooltip-text ms-3 me-3 shv_nn" tooltip="<?= $this->lang->line('share'); ?>">
                                        <span class="shareHls shv_nn">
                                            <a href="javascript:void(0)">
                                                <img src="<?= base_url('assets/images/shareNew.svg') ?>" id="shareHls" class="img-fluid">
                                            </a>
                                        </span>
                                        <div class="share_hl_popup d-none">
                                            <form class="mb-0">
                                                <div class="share_bg">
                                                    <div class="form-group mb-0 w-100 position-relative">
                                                        <img src="<?= base_url('assets/images/copy_img.svg') ?>" alt="copy" class="img-fluid copy_share" style="margin-top:2px; height:18px !important">

                                                        <input type="text" class="form-control shadow-none share_input" name="inputText" id="inputText" value="<?=$currentURL;?>" placeholder="Link Address" readonly="">
                                                    </div>
                                                    <a class="b_t_n b_t_n2 bg_btn_color" id="copyBtn" href="javascript:void(0)" style="color:#fff !important;background: var(--pbg);" onclick="copy_link()"><?= $this->lang->line('copy') ?></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="lik-posetin">
                                        <span class="share_btn_icon disLike position-relative" id="likeSection">
                                            <a href="javascript:void(0)" class="like-btn">
                                                <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislikelike" class="img-fluid likeSlect like-img <?= !empty($rating) ? 'd-none' : ''; ?>">
                                                <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid likeSlectSen like-img <?= ($rating == 'dislike' || $rating == '') ? 'd-none' : ''; ?>">
                                                <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid <?= ($rating == 'like' || $rating == '') ? 'd-none' : ''; ?> dislikeSlect like-img">
                                            </a>
                                        </span>
                                        <div class="likeDislike d-none">
                                            <a class="likethis" href="javascript:void(0)" onclick="manage_like('likeSlectSen','like')">
                                                <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislike" class="img-fluid to-like not-bg <?= ($rating == 'like') ? 'd-none' : ''; ?>">
                                                <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid to-like with-bg <?= ($rating != 'like') ? 'd-none' : ''; ?>">
                                                <p class="m-0"><?= $this->lang->line('like_it'); ?></p>
                                            </a>
                                            <a class="notLike" href="javascript:void(0)" onclick="manage_like('dislikeSlect','dislike')">
                                                <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislike" class="img-fluid to-dislike not-bg <?= ($rating == 'dislike') ? 'd-none' : ''; ?>">
                                                <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid to-dislike with-bg <?= ($rating != 'dislike') ? 'd-none' : ''; ?>">
                                                <p class="m-0"><?= $this->lang->line('not_for_me'); ?></p>
                                            </a>
                                        </div>
                                    </div>
                                    <?php if($type != "7" && remoteFileExists($download_url) && $file_format != "ebook"){ ?>
                                    <div class="dowmload_img_btn ms-3">
                                        <span class="" tooltip="<?= $this->lang->line('download') ?>">
                                            <a href="javascript:void(0);" onclick="download_image()">
                                                <img src="<?= base_url('assets/images/Download_img.svg') ?>" alt="download" class="img-fluid">
                                            </a>
                                        </span>
                                    </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>


                    </div>
                    <?php if($this->session->userdata('id') && $type == "7"){ ?>
                    <a class="img_get_this" data-bs-toggle="modal" data-bs-target="#welcomeModal">
                        <?= $this->lang->line('how_i_get_this');?>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="right_image_pdf">
                    <div class="right_image_pdf_dt">
                         <?php
                                    if($thumbnail == ""){ 
                                        $thumbnail = base_url('assets/images/placeholder.png');
                                    }
                                    //pre($thumbnail);
                                    ?>
                        <img src="<?= $thumbnail; ?>" alt="<?= $title??''; ?>" class="img-fluid <?=($type == "5")?"pdf-red":""?>">
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php } 
$allowed_type = ['6'];  // game
if(in_array($type,$allowed_type)){
?>
<section class="banner_after_navbar cateaogry_banner gameing_views">
    <div class="item">
        <div class="w-100">
            <div class="img_cara responsive_banner ">
                <div class="row m-0">
                    <div class="col-lg-12 col-sm-12 p-0 col-title_img">
                        <div class="banner-position gaming_vies_pos play_hover_video"  data-id="<?=$id??0?>" data-genres="<?=$genres??''?>" data-title="<?=$category_title??''?>" data-url="<?=$trailer_url?>" data-banner="<?=$poster_url?>" data-isdrm="<?=$is_drm_protected??0?>" data-vdcid="<?=$vdc_id??0?>" data-mediaid="<?=$id?>">
                            <nav class="game_pos_icons">
                                <a onclick="history.go(-1)" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                                    <i class="fa fa-chevron-left text-white"></i>
                                </a>
                            </nav>
                            <div class="volume_banner_dt">
                                <div class="tooltip-text" id="mute-tooltip-335" tooltip="Unmute Trailer">
                                    <a href="javascript:void(0);" data-valumeType="banner" class="banner_volume ban-vol-btn"  data-id="<?=$id?>">
                                        <img id="mute-icon-<?=$id?>" src="<?= base_url('assets/images/mute.svg') ?>" class="img-fluid" alt="volume">
                                    </a>
                                </div>
                            </div>

                            <div class="content_banner_dt col_768_after_display_none disply_768 gaming_position_icons">
                                <div class="conten_holder bnnr_content img_pdf_text">
                                <?php if($title != ""){ ?>
                                <h1><?= $title??"";  ?></h1>
                                <?php } if($authors != ""){ ?>
                                <h2><?= $by; ?>: <?=$authors;?></h2>
                                <?php } ?>
                                    <p class="description_dt ml23 d-flex ml25 mb-1 align-items-center">
                                       <?php if($type == "6"){
                                            $options = [];
                                            if(isset($extra_json['release_date']) && false){
                                                $timestamp = strtotime(str_replace('/', '-', $extra_json['release_date']));
                                                $release_year = date("Y",$timestamp);
                                                $options[] = $release_year;
                                            }
                                            if($age){
                                                $options[] = $this->lang->line('age').$age;
                                            }  
                                            if(!empty($options)){
                                                echo implode(' ● ', $options);
                                            }
                                        } ?>
                                    </p>
                                    <p class="descrpition_title_dt"><?= $description??"";  ?></p>
                                    <?php if($type == "6"){?><p class="pb_ban_action"><?= $formatted_genres;?></p><?php } ?>
                                </div>
                                <div class="home_bnnr_btn gaming_bnn_btn">
                                    <div class="banner-playe ban_playes d-flex align-items-center py-1 w-100">
                                    <?php 
                                    $btn_id = "open-login";
                                    if($this->session->userdata('id')){
                                        if($type == "6") {
                                            $btn_id = "get-games";
                                        }
                                    }?>
                                        <button class="bnnr_play_btn bnner_play_color bannerPlayBtn" id="<?=$btn_id;?>">
                                            <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_13798_4459)">
                                                    <path d="M0.000541534 7.76803C0.20145 7.2671 0.513339 6.81825 0.912744 6.45525C2.154 5.02292 3.5735 3.75537 5.13663 2.68349C6.67179 1.5891 8.42058 0.83093 10.2688 0.458522C11.9215 0.165877 13.6217 0.302439 15.2065 0.855131C17.4038 1.62018 19.4081 2.85446 21.0803 4.47221C21.9806 5.30905 22.7976 6.23712 23.6305 7.14932C23.8602 7.38486 23.9887 7.70082 23.9887 8.02979C23.9887 8.35877 23.8602 8.67472 23.6305 8.91026C22.2557 10.6156 20.6452 12.1166 18.8474 13.3681C17.3119 14.4628 15.5634 15.2222 13.7153 15.5971C12.0626 15.8915 10.362 15.7549 8.7775 15.2005C6.58734 14.4399 4.58859 13.2125 2.91959 11.6032C2.00738 10.7585 1.18244 9.81056 0.337659 8.8944C0.194004 8.69489 0.0742083 8.47926 -0.0192871 8.25189L0.000541534 7.76803ZM12.0019 2.4138C10.5216 2.4117 9.10097 2.99746 8.05234 4.04237C7.00372 5.08728 6.4129 6.50581 6.40975 7.98616C6.40447 9.46478 6.98626 10.885 8.02734 11.9351C9.06842 12.9851 10.4837 13.5789 11.9623 13.5863C12.6973 13.5889 13.4256 13.4464 14.1054 13.1669C14.7852 12.8874 15.4031 12.4765 15.9238 11.9577C16.4444 11.4389 16.8575 10.8224 17.1394 10.1436C17.4213 9.46481 17.5664 8.73703 17.5664 8.00203C17.5685 6.52341 16.9837 5.1044 15.9404 4.05663C14.897 3.00886 13.4805 2.418 12.0019 2.4138Z" fill="white" />
                                                    <path d="M15.8529 8.00606C15.8524 8.51264 15.752 9.01415 15.5576 9.48193C15.3631 9.9497 15.0784 10.3746 14.7196 10.7322C14.3608 11.0899 13.9351 11.3733 13.4667 11.5663C12.9984 11.7594 12.4965 11.8582 11.99 11.8571C11.4836 11.8566 10.9822 11.7562 10.5147 11.5617C10.0471 11.3672 9.62252 11.0824 9.26518 10.7236C8.90784 10.3648 8.62477 9.93899 8.43219 9.47064C8.2396 9.00229 8.14128 8.50056 8.14284 7.99416C8.14284 7.48776 8.24271 6.98633 8.43675 6.51858C8.63078 6.05083 8.91515 5.62593 9.2736 5.26822C9.63205 4.91051 10.0575 4.62701 10.5257 4.43395C10.9938 4.24088 11.4955 4.14203 12.0019 4.14307C13.0246 4.14518 14.0048 4.55322 14.7269 5.27755C15.449 6.00189 15.854 6.98327 15.8529 8.00606ZM11.7084 5.6264C11.4299 5.62217 11.1534 5.67362 10.8951 5.77776C10.6367 5.88189 10.4019 6.03661 10.2042 6.2328C10.0065 6.429 9.85003 6.66273 9.74396 6.92025C9.63789 7.17777 9.58435 7.45389 9.5865 7.7324H10.816C10.8281 7.52009 10.914 7.31868 11.0588 7.16298C11.2036 7.00729 11.3983 6.90707 11.6092 6.87968C11.6353 6.87053 11.6585 6.85476 11.6766 6.83389C11.6947 6.81302 11.707 6.78779 11.7123 6.7607C11.7044 6.36806 11.7044 5.98731 11.7044 5.61053L11.7084 5.6264Z" fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_13798_4459">
                                                        <rect width="23.9988" height="15.44" fill="white" transform="translate(0.000488281 0.280029)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <?= $button_text; ?>
                                        </button>
                                        <?php if($this->session->userdata('id')){ ?>
                                        <div class="play_ep_btnn play_epsode_btn shv_dts d-flex image_pdf_flex">
                                            <div class="share_hl tooltip-text ms-3 me-3 shv_nn" tooltip="<?= $this->lang->line('share'); ?>">
                                                <span class="shareHls shv_nn">
                                                    <a href="javascript:void(0)">
                                                        <img src="<?= base_url('assets/images/shareNew.svg') ?>" id="shareHls" class="img-fluid">
                                                    </a>
                                                </span>
                                                <div class="share_hl_popup d-none">
                                                    <form class="mb-0">
                                                        <div class="share_bg">
                                                            <div class="form-group mb-0 w-100 position-relative">
                                                                <img src="<?= base_url('assets/images/copy_img.svg') ?>" alt="copy" class="img-fluid copy_share" style="margin-top:2px; height:18px !important">

                                                                <input type="text" class="form-control shadow-none share_input" name="inputText" id="inputText" value="<?=$currentURL;?>" placeholder="Link Address" readonly="">
                                                            </div>
                                                            <a class="b_t_n b_t_n2 bg_btn_color" id="copyBtn" href="javascript:void(0)" style="color:#fff !important;background: var(--pbg);" onclick="copy_link()"><?= $this->lang->line('copy') ?></a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="lik-posetin">
                                                <span class="share_btn_icon disLike position-relative" id="likeSection">
                                                    <a href="javascript:void(0)" class="like-btn">
                                                        <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislikelike" class="img-fluid likeSlect like-img ">
                                                        <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid likeSlectSen like-img d-none">
                                                        <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid d-none dislikeSlect like-img">
                                                    </a>
                                                </span>
                                                <div class="likeDislike d-none">
                                                    <a class="likethis" href="javascript:void(0)" onclick="manage_like('likeSlectSen','like')">
                                                        <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislike" class="img-fluid to-like not-bg ">
                                                        <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid to-like with-bg d-none">
                                                        <p class="m-0">Like It</p>
                                                    </a>
                                                    <a class="notLike" href="javascript:void(0)" onclick="manage_like('dislikeSlect','dislike')">
                                                        <img src="<?= base_url('assets/images/dislike.svg') ?>" alt="dislike" class="img-fluid to-dislike not-bg ">
                                                        <img src="<?= base_url('assets/images/like.svg') ?>" alt="like" class="img-fluid to-dislike with-bg d-none">
                                                        <p class="m-0"><?= $this->lang->line('not_for_me'); ?></p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                            <p class="c_over col_768_after_display_none ">&nbsp;</p>
                            <p class="c_over_bott c_over_bott_dt mb-0">&nbsp;</p>
                            <div class="position-relative">
                            <?php if($trailer_url != ""){ ?>
                                <div class="hlsVideo" data-vjs-player>
                                    <video id="my_video_<?=$id?>" width="1920" height="1080" disablePictureInPicture autoplay preload="auto">
                                    <source src="<?=$trailer_url?>" type="video/mp4">
                                    </video>
                                </div>
                            <?php } else { ?>
                                <div class="position-relative gms-dts" id="hlsImg">
                                    <?php
                                    if($detail_banner == "" || remoteFileExists($detail_banner) == false){ 
                                        $detail_banner = base_url('assets/images/bannerPlaceholder.png');
                                    }
                                    //pre($detail_banner);
                                    ?>
                                    <img src="<?= $detail_banner; ?>" alt="game" class="img-fluid">
                                </div>
                            <?php } ?>
                            <!--  -->
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>
<?php 
$gaming_class = "banner-bottom-sec";
} if(!empty($related)){ 
    $related = array_filter($related, function ($obj) use ($type) {
        return $obj['type'] == $type;   // allowed type
    });
if(!empty($related) && $type != "6"){ 
?>
<section class="seasionBor <?= $gaming_class;?>"></section>
<section class="mb-4 viewAllSection mt-2 viewll_dt">
    <div class="container-fluid">
        <div class="row mt-1 ">
            <div class="col-md-12 mb-2">
                <div class="d-flex mb-2 view-dtsd">
                    <h6 class="defaultColr mt-2 mb-3 pl_5 delayed-element"><?= $related_text; ?></h6>

                </div>
            </div>
            <div class="carousel_bott4 owl-carousel owl-theme">
                <?php foreach($related as $each_rel){ 
                    //$thumb_url = base_url('assets/images/thumbnailPlaceholder.png'); 
                    $thumb_url = "";
                    if(isset($each_rel['thumbnail']) && $each_rel['thumbnail'] != ""){
                        $thumb_url = $each_rel['thumbnail'];
                    }
                    
                    ?>
                        <div class="item">
                            <a href="<?= base_url('content-detail?id=').$each_rel['enc_id'];?>">
                                <div class="pb_card_details img_pdf_dets">
                                    <div class="pb_img_pdf">
                                        <img src="<?= $thumb_url; ?>" class="img-fluid" alt="<?= $each_rel['title']??"image";?>">
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>
<?php }} 

$allowed_type = ['6'];  // game
if(in_array($type,$allowed_type)){
?>
<section class="mb-4 mt-2 games_more_dt <?= $gaming_class;?>">
    <div class="conatiner-fluid">
        <div class="row mt-1">
            <div class="col-md-12 mb-2">
                <div class="d-flex mb-2 view-dtsd">
                    <h6 class="defaultColr mt-2 mb-3 pl_5 delayed-element"><?= $this->lang->line('more_details') ?></h6>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="more_g_dt">
                    <div class=" row ">
                        <div class="col-md-6 p12">
                            <div class="d-flex mord_game_cat">
                                <p class="cat_gmt_bg"><?= $this->lang->line('category') ?></p>
                                <?php $category = "--";
                                    if(isset($extra_json['keywords']) && !empty($extra_json['keywords'])){
                                        $category = implode(" | ",$extra_json['keywords']);
                                    }
                                ?>
                                <p class="cat_gmt_bg tx-col"><?= $category; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 p12">
                            <div class="d-flex mord_game_cat">
                                <p class="cat_gmt_bg"><?= $this->lang->line('competibility') ?></p>
                                <?php $minimum_system_requirements = "--";
                                    if(isset($extra_json['minimum_system_requirements']) && !empty($extra_json['minimum_system_requirements'])){
                                        $minimum_system_requirements = implode(" | ",$extra_json['minimum_system_requirements']);
                                    }
                                ?>
                                <p class="cat_gmt_bg tx-col"><?= $minimum_system_requirements; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 p12">
                            <div class="d-flex mord_game_cat">
                                <p class="cat_gmt_bg"><?= $this->lang->line('maturity_rating') ?></p>
                                <p class="cat_gmt_bg tx-col"><?= $age; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 p12">
                            <div class="d-flex mord_game_cat">
                                <p class="cat_gmt_bg"><?= $this->lang->line('languages') ?></p>
                                <p class="cat_gmt_bg tx-col"><?= $language; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 p12">
                            <div class="d-flex mord_game_cat">
                                <p class="cat_gmt_bg"><?= $this->lang->line('modes') ?></p>
                                <?php $modes = "--";
                                    if(isset($extra_json['modes']) && !empty($extra_json['modes'])){
                                        $modes = implode(" | ",$extra_json['modes']);
                                    }
                                ?>
                                <p class="cat_gmt_bg tx-col"><?= $modes; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 p12">
                            <div class="d-flex mord_game_cat">
                                <p class="cat_gmt_bg"><?= $this->lang->line('supports_controllers') ?></p>
                                <p class="cat_gmt_bg tx-col"><?= $extra_json['supports_controllers']??"No"; ?></p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 p12">
                            <div class="d-flex mord_game_cat">
                                <p class="cat_gmt_bg"><?= $this->lang->line('players') ?></p>
                                <p class="cat_gmt_bg tx-col"><?= $extra_json['players']??"--"; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 p12">
                            <div class="d-flex mord_game_cat">
                                <p class="cat_gmt_bg"><?= $this->lang->line('developer') ?></p>
                                <p class="cat_gmt_bg tx-col"><?= $extra_json['game_developer']??"--"; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 p12">
                            <div class="d-flex mord_game_cat">
                                <p class="cat_gmt_bg"><?= $this->lang->line('requires_internet') ?></p>
                                <p class="cat_gmt_bg tx-col"><?= $extra_json['requires_internet']??"--"; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 p12">
                            <div class="d-flex mord_game_cat">
                                <p class="cat_gmt_bg"><?= $this->lang->line('release_year') ?></p>
                                <p class="cat_gmt_bg tx-col"><?= $release_year??"--"; ?></p>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
<?php } ?>
<div class="modal fade iframe_modal gaming_frame" id="myIframe" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-xlgs modal-dialog-centered img_modal-body">
        <div class="modal-content">
            <button type="button" data-bs-dismiss="modal" class="close gmaing_frame" onclick="myFunction()" aria-label="Close">&times;</button>
            <!-- <span data-bs-dismiss="modal" class="close gmaing_frame" aria-label="Close"> <img src="<?//= base_url('assets/images/sunscription_close.svg'); ?>" class="img-fluid" alt="image"></span> -->
            <div id="iframe-container"></div>
        </div>
    </div>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close"> <img src="<?= base_url('assets/images/fullimage.svg'); ?>" class="img-fluid" alt="image"></span>
        <div class="viewer">
            <img src="<?= $thumbnail; ?>" class="img-fluid" id="image-viewer" alt="image">
        </div>
        <div class="zoom-buttons">
            <button id="zoom-in"><i class="fas fa-search-plus"></i></button>
            <button id="zoom-out"><i class="fas fa-search-minus"></i></button>
            <!-- <button id="download-btn"><i class="fas fa-download"></i></button> -->
        </div>
    </div>
</div>


<div class="modal fade get_img_mod" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered img_modal-body">
        <div class="modal-content mc-content">
            <div class="modal-body img-pd">
                <div class="get_poster_soon wel_txte">
                    <h6><?= $this->lang->line('poster_purchase');?></h6>
                    <p><?= $this->lang->line('stay_tuned_for_luanch');?></p>
                </div>
                <div class="pt-5">
                    <button type="button" class="btn okay_btns" data-bs-dismiss="modal" aria-label="Close"><?= $this->lang->line('okay,go') ?></button>
                </div>
            </div>

        </div>
    </div>
</div>
<?php if($type == "4" || $type == "7"){ ?>
<script src="<?= base_url('assets/website_assets/js/images_viwer.js'); ?>"></script>
<?php }  ?>
<!-- <div class="modal fade iframe_modal" id="ebook_iframe" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-xlgs modal-dialog-centered img_modal-body">
        <div class="modal-content">
            <button type="button" class="close ebook_frame" aria-label="Close">&times;</button> -->
            <!-- <span data-bs-dismiss="modal" class="close ondc_frame" aria-label="Close"> <img src="<?//= base_url('assets/images/sunscription_close.svg'); ?>" class="img-fluid" alt="image"></span> -->
            <!-- <div id="ebook-iframe-container"></div>
        </div>
    </div>
</div> -->

<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
<script>const showID = "<?= $id; ?>";</script>

<script>
 
//console.log("download_url","<?php echo $download_url; ?>");
    function copy_link() { 
        var copybtn = "<?= $this->lang->line('copied') ?>";
        var type = "<?= $type;?>";
        var id = "<?= $id;?>";
        var title  = "<?= $title;?>";
        var genres  = "<?= $genres;?>";
        var copyButton = $('#copyBtn');
        var copyText = $("#inputText");
        let copied_text = copyText.val();
        //alert(copied_text);
        if(type==4){
            managematomoshare("Image",id,title,genres);
        //     (type,id,title,genres)
        // queueTrackingDataWithDelay('trackEvent', ["Image", 'Share', id+'/'+ title],0);
        // queueTrackingDataWithDelay('trackContentInteraction', ["Share" + '/' + 'Image', id+'/'+ title,genres],100);
        // queueTrackingDataWithDelay('trackContentImpression', [id+'/'+ title,genres],200);
            
        }
        else if(type==5){
            managematomoshare("PDF",id,title,genres);

        //     var watch ="test";
        //     var showID ="900";

        // // queueTrackingDataWithDelay('trackEvent', ["PDF", 'Share', id+'/'+ title],0);
        // // queueTrackingDataWithDelay('trackContentInteraction', ["Share" + '/' + 'PDF', id+'/'+ title,genres],100);
        // // queueTrackingDataWithDelay('trackContentImpression', [id+'/'+ title,genres],200);
        // queueTrackingDataWithDelay('trackEvent', ["Watchlist", watch, showID + "/" + title],0);
        //   queueTrackingDataWithDelay('trackContentInteraction', ["Watchlist" + '/' + watch, id + "/" + title, genres],100);
        //   queueTrackingDataWithDelay('trackContentImpression', [showID + "/" + title, genres], 200);
        }
        else if(type==6){
            managematomoshare("Games",id,title,genres);

        // queueTrackingDataWithDelay('trackEvent', ["Game", 'Share', id+'/'+ title],0);
        // queueTrackingDataWithDelay('trackContentInteraction', ["Share" + '/' + 'Game', id+'/'+ title,genres],100);
        // queueTrackingDataWithDelay('trackContentImpression', [id+'/'+ title,genres],200);
        }
        else if(type==7){
             managematomoshare("Poster",id,title,genres);

        // queueTrackingDataWithDelay('trackEvent', ["Poster", 'Share', id+'/'+ title],0);
        // queueTrackingDataWithDelay('trackContentInteraction', ["Share" + '/' + 'Poster', id+'/'+ title,genres],100);
        // queueTrackingDataWithDelay('trackContentImpression', [id+'/'+ title,genres],200);
        }
        else{

        }
        //alert(copied_text);
        navigator.clipboard.writeText(copied_text);

        document.execCommand('copy');
        $('#copyBtn').html(copybtn);
        $('.bg_btn_color').addClass('copy_share_btn');
        setTimeout(function() {
            copyButton.html('<?= $this->lang->line('copy') ?>'); // Change 'Copy' to the original text you want to display
            $('.bg_btn_color').removeClass('copy_share_btn');
        }, 2000);
    };



    $(document).on('click', function(event) {
        if ((!$(event.target).closest('.shareHls').length) && (!$(event.target).closest('.share_hl_popup').length)) {
            $('.share_hl_popup').addClass('d-none');
            $('#copyBtn').html("<?= $this->lang->line('copy') ?>");
        }
    });

    $(".shareHls").click(function() {
        //var id = $(this).data('id');
        var tooltipElement = $(".share_hl_popup");
        tooltipElement.toggleClass("d-none");
        $('.share_hl').attr('tooltip', '');
        setTimeout(function() {
            tooltipElement.addClass("d-none");
        }, 3000);
    });

    $(".bannerPlayBtn").click(function() {
        var type= '<?=$type?>'
        var id= '<?=$id?>'
        var title = "<?=$title?>"
        if(type==4){
        
        queueTrackingDataWithDelay('trackEvent', ["Image", 'ViewNow', id+'/'+title],0);

        }
        if(type==6){
        queueTrackingDataWithDelay('trackEvent', ["Games", 'PlayGames', id+'/'+title],0);
        }
        
    });



    $(".shareHls").hover(
        function() {
            if ($(".share_hl_popup").hasClass("d-none")) {
                $('.share_hl').attr('tooltip', '<?= $this->lang->line('share'); ?>');
            }
        },
        function() {}
    );
    
</script>


<script>
    // $(document).ready(function() { 
    //     muteunmute(0);
        $('#get-games').on("click", function(){ 
            get_games();
            $('.footer-area').addClass('foot-index');
        });
        $('#open-login').on("click", function(){ 
            urls_call("<?= base_url('user-login');?>");
        });
        $('#open-file').on("click", function(){ 
            var id =  "<?= $id; ?>";
            var title= "<?= $title; ?>";
            var fileUrl = "<?= $download_url; ?>";
            var is_ebook = "<?= ($file_format == 'ebook')?'YES':'NO' ?>";
            if(is_ebook == "YES"){
                fileUrl = "<?= $ebook_url; ?>";
            queueTrackingDataWithDelay('trackEvent', ["Image", 'ViewNow', id +'/'+ title],0);

            }else{
                queueTrackingDataWithDelay('trackEvent', ["PDF", 'ReadNow', id +'/'+ title],0);

            }
           
            // window.location.href = "<?//=base_url('web/dashboard/image_viewer?file_url=')?>"+fileUrl;
            // Create a temporary anchor element
            var link = document.createElement('a');
            link.href = fileUrl;
            link.target = '_blank';

            // Append the anchor to the body
            document.body.appendChild(link);

            // Trigger a click event on the anchor
            link.click();

            // Remove the anchor from the document
            document.body.removeChild(link);
        });
        // $('#open-iframe').on("click", function(){ 
        //     var fileUrl = "<?= $download_url; ?>";
        //     console.log(fileUrl);
        //     var iframe = $('<iframe>', {
        //         src: fileUrl, // Use a URL that allows embedding
        //         sandbox: 'allow-scripts allow-forms', // Allow forms for file upload
        //         allow: 'same-origin' // Allow geolocation and other permissions if needed
        //     });
        //     //console.log("iframe",iframe);
        //     //alert(redirect_url);
        //     $('#ebook-iframe-container').append(iframe);
        //     $('#ebook_iframe').modal('show');
        // });
        // $(".ebook_frame").on("click", function(){
        //     //alert("ok");
        //     $('#ebook-iframe-container').empty();
        //     $('#ebook_iframe').modal('hide');
        // });
        $(".epubClose").on("click", function(){
            
            $("#epub_viewer").empty();
            $('#epubModal').modal('hide');
            $('footer-area').removeClass('foot-index');
        });
        $('.owl-carousel').each(function() {
            const owl = $(this);

            // Function to get nth-child selector based on width
            function getNthChildSelector() {
                const width = $(window).width();
                if (width > 1000 && width <= 1449) {
                    return 6;
                } else if (width > 1450 && width <= 1799) {
                    return 7;
                } else {
                    return 8;
                }
            }

            // Function to update hover effects
            function updateHoverEffects() {
                const nthChildIndex = getNthChildSelector();

                // Remove previous hover events
                owl.find('.pb_card_details').off('mouseenter mouseleave');

                // Apply hover effect to the first active item
                owl.find('.owl-item.active:first .pb_card_details').hover(
                    function() {
                        $(this).addClass('transformed');
                    },
                    function() {
                        $(this).removeClass('transformed');
                    }
                );

                // Apply hover effect to the nth active item
                owl.find('.owl-item.active').eq(nthChildIndex - 1).find('.pb_card_details').hover(
                    function() {
                        $(this).addClass('transformed2');
                    },
                    function() {
                        $(this).removeClass('transformed2');
                    }
                );
            }

            // Initial setup
            updateHoverEffects();

            // Update hover effects when the slider changes
            owl.on('changed.owl.carousel', function(event) {
                setTimeout(function() { // Ensure the active class is properly updated
                    updateHoverEffects();
                }, 0);
            });

            // Update hover effects on window resize
            $(window).on('resize', function() {
                updateHoverEffects();
            });
        });

        $(".gmaing_frame").on("click", function(){
            $('#iframe-container').empty();
            $('#myIframe').modal('hide');
        });
    //});
</script>

<script>
     function myFunction(){
        var id = '<?=$id?>';
        var title = "<?=$title?>";
        queueTrackingDataWithDelay('trackEvent', ["Games", 'Close', id+'/'+title],0);

        }
    async function download_image() {
        var type = '<?=$type?>';
        // alert(type);
        var id = '<?=$id?>';
        var title = "<?=$title?>";
            var genres = "<?=$genres??''?>";
        // alert(type);
        if(type==5){
            queueTrackingDataWithDelay('trackEvent', ["PDF", 'DownloadPDF', id+'/'+title],0);
            queueTrackingDataWithDelay('trackContentInteraction', ["Download/PDF" , id+'/'+title, genres],100);
        queueTrackingDataWithDelay('trackContentImpression', [id+'/'+title, genres],200);
        }
        if(type==4){
            queueTrackingDataWithDelay('trackEvent', ["Image", 'DownloadImage', id+'/'+title],0);
            queueTrackingDataWithDelay('trackContentInteraction', ["Download/Image" , id+'/'+title, genres],100);
            queueTrackingDataWithDelay('trackContentImpression', [id+'/'+title, genres],200);
        }
        if(type==7){
            queueTrackingDataWithDelay('trackEvent', ["Poster", 'DownloadPoster', id+'/'+title],0);
            queueTrackingDataWithDelay('trackContentInteraction', ["Download/Poster", id+'/'+title, genres],100);
            queueTrackingDataWithDelay('trackContentImpression', [id+'/'+title, genres],200);
        }
        var fileUrl = "<?= $download_url; ?>"; // URL of the image  
        let download_url = "<?= base_url('download?file=')?>"+fileUrl;         
        var fileName = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
        // Create a temporary anchor element
        var link = document.createElement('a');
        link.href = download_url;
        link.download = fileName;
        // Append the anchor to the body
        document.body.appendChild(link);
        // Trigger a click event on the anchor
        link.click();
        // Remove the anchor from the document
        document.body.removeChild(link);
    }
</script>

<script>
    $(".disLike").click(function() {
        $(".likeDislike").removeClass("d-none");
    });
        function show_like_dislike() {
        fetchCacheData(ratingKey)
        .then((result) => {
            if (result.data) {
            result.data.forEach((item, key) => {
                if (item.show_id == showID) {
                if (item.rating == 'like') {
                    $('.likeSlect').addClass('d-none');
                    $('.dislikeSlect').addClass('d-none');
                    $('.likeSlectSen').removeClass('d-none');

                    $('.to-like').toggleClass('d-none');
                    $('.to-dislike.with-bg').addClass('d-none');
                    $('.to-dislike.not-bg').removeClass('d-none');
                } else if (item.rating == 'dislike') {
                    $('.likeSlect').addClass('d-none');
                    $('.dislikeSlect').removeClass('d-none');
                    $('.likeSlectSen').addClass('d-none');

                    $('.to-dislike').toggleClass('d-none');
                    $('.to-like.with-bg').addClass('d-none');
                    $('.to-like.not-bg').removeClass('d-none');
                } else {
                    $('.likeSlect').removeClass('d-none');
                    $('.dislikeSlect').addClass('d-none');
                    $('.likeSlectSen').addClass('d-none');
                }
                }
            })
            }
        });
    }
        $(document).ready(function() {
        show_like_dislike();
    });
    $(document).on('click', function(event) {
        if ((!$(event.target).closest('.likeDislike').length) && (!$(event.target).closest('.like-btn').length)) {
            if (!$('.likeDislike').hasClass('d-none')) {
                $('.likeDislike').addClass('d-none');
            }
        }
    });
    function manage_like(type, action) {
        let title = "<?= $title??''; ?>", showID = "<?= $id; ?>", media_type = "<?= $type; ?>";
        titles = showID + '/' + title;
        var genres = "<?= $genres??''; ?>";
        //var rate = media_type;
        var rate='';
        if (!$('.' + type).hasClass('d-none')) {
            action = '';
            $('.like-img').addClass('d-none');
            $('.likeDislike').addClass('d-none');
            $('.' + type).removeClass('d-none');
        }
        var data = {
            show_id: showID,
            rating: action
        }
        rate = rate == 0 ? 'RateVideo' : 'RateAudio';
        // if (action == '' && type == 'likeSlectSen') {
        //     actions = 'LikeDisable';
        // } else if (action == '' && type == 'dislikeSlect') {
        //     actions = 'DislikeDisable';
        // } else {
        //     actions = type == 'likeSlectSen' ? 'LikeEnable' : 'DislikeEnable';
        // }
        // if (titles) {
        //     // matomo('Rate', 'View', titles);
        //     // if (type_med != 0) {
        //     //     matomo_like('RateAudio', 'Audio /' + actions, titles, des_gener);
        //     // } else {
        //     //     matomo_like('RateVideo', 'Video /' + actions, titles, des_gener);
        //     // }

        // }

        if (action == '' && type == 'likeSlectSen') {  
            actions = 'LikeDisable';
            // matomo('Rate', 'View', titles);
        } else if (action == '' && type == 'dislikeSlect') {
            actions = 'DislikeDisable';
            // matomo('Rate', 'View', titles);
        } else {
            actions = type == 'likeSlectSen' ? 'LikeEnable' : 'DislikeEnable';
            
        } 
        if(media_type==4){
        if (titles) {
            managematomolikeE_D("Image",actions,titles,genres);
            // matomo('Rate', 'View', titles);
            // queueTrackingDataWithDelay('trackEvent', ["Image", actions, titles],0);
            // queueTrackingDataWithDelay('trackContentInteraction', ["Image/"+actions, titles, genres],100);
            // queueTrackingDataWithDelay('trackContentImpression', [titles, genres],200);


        }
    }
        if(media_type==5){
        if (titles) {
            // matomo('Rate', 'View', titles);
            managematomolikeE_D("PDF",actions,titles,genres);

            // queueTrackingDataWithDelay('trackEvent', ["PDF", actions, titles],0);
            // queueTrackingDataWithDelay('trackContentInteraction', ["PDF/"+actions, titles, genres],100);
            // queueTrackingDataWithDelay('trackContentImpression', [titles, genres],200);
        }
    }
    
    if(media_type==6){
        if (titles) {
            managematomolikeE_D("Games",actions,titles,genres);

        //     queueTrackingDataWithDelay('trackEvent', ["Games", actions, titles],0);
        //     queueTrackingDataWithDelay('trackContentInteraction', ["Games/"+actions, titles, genres],100);
        // queueTrackingDataWithDelay('trackContentImpression', [titles, genres],200);
        }
    }
    if(media_type==7){
        if (titles) {
            managematomolikeE_D("Poster",actions,titles,genres);

        //     queueTrackingDataWithDelay('trackEvent', ["Poster", actions, titles],0);
        //     queueTrackingDataWithDelay('trackContentInteraction', ["Poster/"+actions, titles, genres],100);
        // queueTrackingDataWithDelay('trackContentImpression', [titles, genres],200);
        }
    }



        titles = '';
        if (action == '') {
            updateRatingCache(ratingKey, data, 3);
        } else {
            updateRatingCache(ratingKey, data);
        }
        $('.like-img').addClass('d-none');
        $('.likeDislike').addClass('d-none');
        if (action == '') {
            $('.not-bg').removeClass('d-none');
            $('.with-bg').addClass('d-none');
            $('.likeSlect').removeClass('d-none');
        } else {
            if (action == 'like') {
                $('.to-like').toggleClass('d-none');
                $('.to-dislike.with-bg').addClass('d-none');
                $('.to-dislike.not-bg').removeClass('d-none');
            }
            if (action == 'dislike') {
                $('.to-dislike').toggleClass('d-none');
                $('.to-like.with-bg').addClass('d-none');
                $('.to-like.not-bg').removeClass('d-none');
            }
            $('.' + type).removeClass('d-none');
        }
    }


    function get_games(){ 
        $mobile_exists = "<?=$mobile_exists?>";
        if($mobile_exists == "NO"){
            urls_call('<?=base_url('my_user_deatails');?>');
        } else {
            let game_url_status = "<?= $game_url_status;?>";
            if(game_url_status == "YES"){
                var iframe = $('<iframe>', {
                    src: '<?=$game_url;?>', // Use a URL that allows embedding
                    sandbox: 'allow-scripts allow-same-origin' // Add sandbox attributes as needed
                });
                console.log("game_url",'<?=$game_url;?>');
                $('#iframe-container').append(iframe);
                $('#myIframe').modal('show');
            } else {
                toastr.error("Game not available","Error");
            }
            
        }  
    }

    
    function matomo_sear(user, type, titles, geners = '') {
    var url = '<?= base_url("/web/Home/matomo_hit"); ?>';
    $.ajax({
        url: url,
        type: "POST",
        dataType: "json",
        async: "true",
        data: {
        user: user,
        types: type, // Typo here, it should be type instead of types
        type:4,
        geners: geners,
        title: titles
        
        },
        success: function(data) {
        },
        error: function(xhr, status, error) {
        //  console.error("Error: " + error);
        }
    });
    }
    
</script>

<script>
    function download_file(){

        var fileUrl = "<?= $download_url; ?>"; // URL of the image  
        // let download_url = "<?= base_url('download?file=')?>"+fileUrl;         
        var fileName = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);

        if (fileUrl) {
            var xhr = new XMLHttpRequest();
            var encoded_file_url = "<?= base_url('download?file=')?>" + encodeURIComponent(fileUrl);
            //alert(encoded_file_url);
            xhr.open('GET', encoded_file_url, true);
            xhr.responseType = 'blob';
            
            xhr.onprogress = function(event) {
                if (event.lengthComputable) {
                    var percentComplete = (event.loaded / event.total) * 100;
                    $('#progressBar div').css('width', percentComplete + '%').text(Math.round(percentComplete) + '%');
                }
            };

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var blob = xhr.response;
                    var downloadLink = document.createElement('a');
                    var url = window.URL.createObjectURL(blob);
                    downloadLink.href = url;
                    downloadLink.download = fileUrl.split('/').pop();
                    document.body.appendChild(downloadLink);
                    downloadLink.click();
                    document.body.removeChild(downloadLink);
                    window.URL.revokeObjectURL(url);
                }
            };

            xhr.send();
        } else {
            alert('Please enter a file URL.');
        }
    }
</script>

<script>
    $(document).ready(function() {
    // Scroll container
    const $scrollContainer = $('.description_dt');
    const $scrollLeft = $('#scroll-left');
    const $scrollRight = $('#scroll-right');

    // Function to check overflow and show/hide buttons
    function checkOverflow() {
        const container = $scrollContainer[0];
        const isOverflowing = container.scrollWidth > container.clientWidth;

        if (isOverflowing) {
            $scrollLeft.show();
            $scrollRight.show();
            checkScrollPosition();
        } else {
            $scrollLeft.hide();
            $scrollRight.hide();
        }
    }

    // Function to check the current scroll position and show/hide left/right buttons
    function checkScrollPosition() {
        const scrollLeftPos = $scrollContainer.scrollLeft();
        const scrollWidth = $scrollContainer[0].scrollWidth;
        const clientWidth = $scrollContainer[0].clientWidth;

        if (scrollLeftPos === 0) {
            $scrollLeft.hide();
        } else {
            $scrollLeft.show();
        }

        if (scrollLeftPos + clientWidth >= scrollWidth) {
            $scrollRight.hide();
        } else {
            $scrollRight.show();
        }
    }

    // Initial check for overflow
    checkOverflow();

    // Click event for left button
    $scrollLeft.click(function() {
        $scrollContainer.animate({
            scrollLeft: '-=150'
        }, 400, checkScrollPosition);
    });

    // Click event for right button
    $scrollRight.click(function() {
        $scrollContainer.animate({
            scrollLeft: '+=150'
        }, 400, checkScrollPosition);
    });

    // Check overflow and scroll position on window resize
    $(window).resize(function() {
        checkOverflow();
        checkScrollPosition();
    });
});

</script>

<script>
    $(document).ready(function() { 
        $('.my_video_banner').hover( 
            function() { // mouseenter
                //console.log('if');
                this.play();
            },
            function() { // mouseleave
                //console.log('else');
                this.pause();
                this.currentTime = 0; // Optional: reset to the beginning
            }
        );
    });
</script>
<script>
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }
    $(document).ready(function() { 
        var  similar_to = getQueryParam('similar') || 'NA';
        if(similar_to !='NA'){
          _paq.push(['setCustomDimension', 4, similar_to ]);
          var search_jao = similar_to;
          console.log(search_jao);
        }
        else{
          var search_jao = '';
        }
        var type = '<?=$type?>';
        if(type==4){
        queueTrackingDataWithDelay('trackEvent', ["Page", 'View', 'Image'],0);
        }
        else if(type==5){
        queueTrackingDataWithDelay('trackEvent', ["Page", 'View', 'Pdf'],0);
        }
        else if(type==6){
        queueTrackingDataWithDelay('trackEvent', ["Page", 'View', 'Games'],0);
        }
        else{
        queueTrackingDataWithDelay('trackEvent', ["Page", 'View', 'Poster'],0);
        }
    });
</script>

<script>
    // let content_id = "<?= $this->input->get('id'); ?>";
    // history.pushState({page: 1}, "<?=TITLE?>", "content-detail?id="+content_id);  

    // $('#myIframe').on('shown.bs.modal', function () {
    //     //console.log('Iframe is open');
    //     $(window).on('popstate', function(event) {
    //         window.history.back();
    //         //alert('Back button was pressed!'); return;
    //         $('#iframe-container').empty();
    //         $('#myIframe').modal('hide');
    //     });
    // });

    $('#welcomeModal').on('shown.bs.modal', function () {
        let contentid = "<?=$id;?>";
        let contentname = "<?=$title?>";
        queueTrackingData('trackEvent', ["Poster", 'How Can I Get This', contentid+"/"+contentname]);
    });

    $("#open-epub").on("click", function () {
        let redirect_url = "<?=base_url('epub-reader')."?xcv=".aes_cbc_encryption_($download_url);?>"+"&srf=<?=$id;?>";
        window.open(redirect_url, '_blank');
    });

    function managematomoshare(type,id,title,genres){
        queueTrackingDataWithDelay('trackEvent', [type, 'Share', id+'/'+ title],0);
        queueTrackingDataWithDelay('trackContentInteraction', ["Share" + '/' + type, id+'/'+ title,genres],100);
        queueTrackingDataWithDelay('trackContentImpression', [id+'/'+ title,genres],200);
    } 
    function managematomolikeE_D(type,actions,titles,genres){
        queueTrackingDataWithDelay('trackEvent', [type, actions, titles],0);
            queueTrackingDataWithDelay('trackContentInteraction', [type+"/"+actions, titles, genres],100);
            queueTrackingDataWithDelay('trackContentImpression', [titles, genres],200);
    }
</script>






