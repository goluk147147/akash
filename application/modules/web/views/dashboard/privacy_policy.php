<style>
    p {
        margin: 0;
    }

    .termCondition {
        background: rgba(0, 0, 55, 1);
        background-image: url(<?= base_url('assets/images/term-img.png') ?>);
        background-repeat: repeat-x;
        background-size: contain;
        height: 100%;
    }
    .term_pol_det{
        height:100vh !important;
        overflow: auto;
    }

    .positionab {
        background: inherit !important;
    }

    .back-btn {
        font-size: 18px;
    }



    .term-section p {
        margin-bottom: 10px;
    }

    .footer-area {
        display: none !important;
    }

    .no_dt_found {
        height: 90vh !important;
    }

    .no_dt_found img {
        height: 150px;
    }
</style>
<?php //pre($privacy_policy);
?>

<section class="termCondition term_pol_det py-5">
    <div class="term-image p-0">

        <div class="positionab">

            <div class="container-fluid">
                <div class="row m-0">
                    <div class="col-md-12 p-0">
                        <div class="page-title d-flex align-items-center">
                            <a onclick="history.go(-1)" class="pb_back d-flex align-items-center"><i class="fa fa-chevron-left text-white" aria-hidden="true"></i>
                                <h5 class="ms-4 text-white watch_cont"><?= isset($privacy_policy['data']) ? $privacy_policy['data']['title']:''; ?></h5>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-12 m-auto">
                        <div class="term-section text-section-pad">

                            <?php //print_r($privacy_policy);
                            if (empty($privacy_policy['data']['description'])) {
                            ?>
                                <div class="row">
                                    <div class="col-md-6 m-auto text-center no_dt_found">
                                        <div class="">
                                            <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no data found">
                                            <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
                                            <!-- <p class="mb-0 text_ac"><?= NoListFound; ?></p> -->
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else { ?>
                                <p> <?php echo isset($privacy_policy['data']['description']) ? $privacy_policy['data']['description'] : ''; ?> </p> <?php
                                                                                                                                                }
                                                                                                                                                    ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- 
<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
        style="width:70%">
        <span class="sr-only">70% Complete</span>
    </div>
</div> -->

<script>
<?php $name = isset($_GET['type']) ? 'Login' : 'Page'; ?>
var page = "<?= $page?>";
var pagename = "<?= $name ?>";
    $(window).on('load', function() {
    queueTrackingData('trackPageView', [document.location.href]);
    if(page == "AboutUs"){
        queueTrackingData('trackEvent', [pagename, 'View', 'AboutUs']);
    }else if(page == "privacy_policy"){
       queueTrackingData('trackEvent', [pagename, 'View', 'PrivacyPolicy']);
    }else if(page == "ContactUs"){
        queueTrackingData('trackEvent', [pagename, 'View', 'ContactUs']);
    }else if(page == "terms_conditions"){
        queueTrackingData('trackEvent', [pagename, 'View', 'TermsAndCondition']);
    }

  })
    </script>