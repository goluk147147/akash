<style>
    header {
        position: relative !important;
    }

    .helpHead h3 {
        font-size: 20px;
    }

    .subPart {
        background-color: #222222;
        border: 1px solid #393939;
        border-radius: 3px;
    }

    .subPart i {
        font-size: 14px;
    }

    .cusSuport {
        font-size: 18px;
        margin-top: 100px;
        color: #5B5B5B;
        text-transform: uppercase;
    }

    .contTittle p {
        font-size: 12px;
        line-height: normal
    }

    .linkSec {
        gap: 10px;
    }

    .linkSec i {
        background: rgba(72, 69, 246, 0.2);
        width: 34px;
        height: 34px;
        text-align: center;
        font-size: 14px;
        border-radius: 3px;
        line-height: 34px;
        color: #4845F6;
    }

    .fa-phone-alt {
        transform: rotate(90deg);
    }

    /*.text-blue {
        color: #4845F6;
    }*/
</style>

<div class="container-fluid">
    <div class="row m-0">
        <div class="col-lg-12 mx-auto">
            <div class="helpHead my-5">
            <a onclick="urls_call('<?=base_url();?>')" class="pb_back d-flex align-items-center">
                <i class="fas fa-chevron-left text-white"></i>

                <h3 class="text-white ms-4 w-100"><?= $this->lang->line('help_support') ?></h3>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="faqSubSection mt-2 help_padiing">
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-lg-12 mx-auto">
                <div class="row">
                    <?php foreach ($faq['data'] as $faq_value) {
                        $id = aes_cbc_encryption_($faq_value['category_id']);  ?>
                        <div class="col-md-4 mb-2 calldetails">
                            <a href="<?= base_url('faq-content-details?id=' . $id) ?>">
                                <div class="subPart  d-flex align-items-center justify-content-between p-2 px-3">
                                    <p class="m-0"><?= $faq_value['category_name']; ?></p>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                    <?php  } ?>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="supportVoice supt_padd">
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-lg-12 mx-auto">
                <p class="cusSuport"><?= $this->lang->line('ottcustomer_support') ?></p>

                <div class="d-flex align-items-center help_fl">
                    <div class="linkSec  d-flex align-items-center">
                        <i class="fa fa-phone-alt"></i>
                        <div class="contTittle">
                            <p class="m-0 counT"><?= $this->lang->line('contact_number') ?></p>
                            <p class="m-0 text-white "><a class="mobT" href="tel:+91"></a></p>
                        </div>
                    </div>

                    <div class="linkSec  d-flex align-items-center ms-4">
                        <i class="fa fa-envelope"></i>
                        <div class="contTittle">
                            <p class="m-0"><?= $this->lang->line('email_address') ?></p>
                            <p class="m-0 "><a class="text-blue" href="mailto:"></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="supportVoice supt_padd pt-3">
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-lg-12 mx-auto">
                <p class="cusSuport"><?= $this->lang->line('shopping_customer_support') ?></p>

                <div class="d-flex align-items-center help_fl">
                    <div class="linkSec  d-flex align-items-center">
                        <i class="fa fa-phone-alt"></i>
                        <div class="contTittle">
                            <p class="m-0 counT"><?= $this->lang->line('contact_number') ?></p>
                            <p class="m-0 text-white "><a href="tel:+91  <?= faqmob?>"><?= faqmob?></a></p>
                        </div>
                    </div>

                    <div class="linkSec  d-flex align-items-center ms-4">
                        <i class="fa fa-envelope"></i>
                        <div class="contTittle">
                            <p class="m-0"><?= $this->lang->line('email_address') ?></p>
                            <p class="m-0"><a href="mailto:<?= faqemail?>"><?= faqemail?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="faqSubSection pt-3 mt-3 help_padiing d-none" id="partenerSupport">
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-lg-12 mx-auto">
                <div class="row">
                  
                        <div class="col-md-4 mb-2 calldetails">
                            <a href="<?= base_url('faq-content-details?type=partener') ?>">
                                <div class="subPart  d-flex align-items-center justify-content-between p-2 px-3">
                                    <p class="m-0">For Gaming</p>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                </div>
            </div>


        </div>
    </div>
</div>

<script>

$(window).on('load', function() {
  <?php  $pages = isset($_GET['type']) ? 'Login' : 'Page';
        $pagename = isset($_GET['type']) ? 'ContactUs' : 'Help & Support';
 ?>
        if("<?=$page?>"=='ContactUsc'){
            queueTrackingData('trackEvent', ["<?= $pages?>","View","<?=  $pagename?>"]);
        }else{
            queueTrackingData('trackEvent', ['Page', 'View', 'HelpAndSupport']);

        }

  });

  $(document).ready(async function(){
    var homeContent = await fetchCacheData('masterContent-'+(feedType??0));
    var partenerSupport = homeContent.data.nav_banner.data.partner_support;
    if(partenerSupport.length > 0){
        $('#partenerSupport').removeClass('d-none');
    }
  });
    </script>