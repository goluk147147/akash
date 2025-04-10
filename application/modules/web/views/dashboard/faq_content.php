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

    /* .text-blue {
        color: #4845F6;
    }*/

    .card {
        background-color: transparent;
        border-bottom: 1px solid #2D2D2D !important;
        border: 0px;
        border-radius: 0px;
    }

    .card-header {
        border: 0px;
        background-color: transparent;
    }

    .card-header a {
        font-size: 16px;
        color: #fff;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-body p {
        font-size: 13px;
        color: #c0c0c0;
    }

    #accordion a[aria-expanded="true"] i.fa.fa-angle-down {
        transform: rotate(180deg) !important;
    }

    #accordion a[aria-expanded="false"] i.fa.fa-angle-down {
        transform: rotate(0deg) !important;
    }
</style>
<div class="container-fluid">
    <div class="row m-0">
        <div class="col-lg-12 mx-auto">
            <div class="helpHead my-5">
                <a onclick="history.go(-1)" class="pb_back d-flex align-items-center">
                    <i class="fas fa-chevron-left text-white"></i>
                    <h3 class="text-white ms-4 w-100"><?= $this->lang->line('help_support') ?></h3>
                </a>
            </div>
        </div>
    </div>
</div>


    <?php $i = 0;
    if($type != 'partener'){
        foreach ($faq as $faq_content) {  ?>
            <div class="faqSubSection mt-2 help_padiing">
                <div class="container-fluid">
                    <div class="row m-0">
                        <div class="col-lg-12 mx-auto">
                            <h4 class="text-white w-100 faqDetailHead"><?= $faq_content['category_name']; ?></h4>
                            <div id="accordion">
                                <?php foreach ($faq_content['faq_content'] as $faq_value) {
                                    if (!empty($faq_value)) {  ?>
                                        <div class="card ">
                                            <div class="card-header px-0 justify-content-between align-items-center d-flex">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#collapseOne<?= $faq_value['id'] ?>">
                                                    <span> <?= $faq_value['title']; ?></span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>

                                            </div>
                                            <div id="collapseOne<?= $faq_value['id'] ?>" class="collapse" data-parent="#accordion">
                                                <div class="card-body px-0">
                                                    <p class="m-0"><?= $faq_value['description']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                <?php  }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php $i++;
        } ?>



        <div class="supportVoice supt_padd">
            <div class="container-fluid">
                <div class="row m-auto m-0">
                    <div class="col-lg-12 mx-auto">
                        <p class="cusSuport"><?= $this->lang->line('ottcustomer_support') ?></p>

                        <div class="d-flex align-items-center help_fl">
                            <div class="linkSec  d-flex align-items-center">
                                <i class="fa fa-phone-alt"></i>
                                <div class="contTittle">
                                    <p class="m-0 counT"><?= $this->lang->line('contact_number') ?></p>
                                    <p class="m-0 text-white"><a class="mobT" href="tel:+91"></a></p>
                                </div>
                            </div>

                            <div class="linkSec  d-flex align-items-center ms-4">
                                <i class="fa fa-envelope"></i>
                                <div class="contTittle">
                                    <p class="m-0"><?= $this->lang->line('email_address') ?></p>
                                    <p class="m-0"><a class="text-blue" href="mailto:"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="supportVoice supt_padd pt-3">
            <div class="container-fluid">
                <div class="row m-auto m-0">
                    <div class="col-lg-12 mx-auto">
                        <p class="cusSuport"><?= $this->lang->line('shopping_customer_support') ?></p>

                        <div class="d-flex align-items-center help_fl">
                            <div class="linkSec  d-flex align-items-center">
                                <i class="fa fa-phone-alt"></i>
                                <div class="contTittle">
                                    <p class="m-0 counT"><?= $this->lang->line('contact_number') ?></p>
                                    <p class="m-0 text-white"><a href="tel:<?= faqmob?>"><?= faqmob?></a></p>
                                </div>
                            </div>

                            <div class="linkSec  d-flex align-items-center ms-4">
                                <i class="fa fa-envelope"></i>
                                <div class="contTittle">
                                    <p class="m-0"><?= $this->lang->line('email_address') ?></p>
                                    <p class="m-0 "><a href="mailto:<?= faqemail?>"><?= faqemail?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php }else{ ?> 

        <div class="faqSubSection mt-3 help_padiing" id="partenerSupport">
                <div class="container-fluid">
                    <div class="row m-0">
                        <div class="col-lg-12 mx-auto">
                            <h4 class="text-white w-100 faqDetailHead">Gaming Partners</h4>
                            <div id="accordion1">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ?>
<script>
    $(window).on('load', function() {
        queueTrackingData('trackEvent', ['Page', 'View', 'Help & Support Detail']);

    });

    $(document).ready(async function(){
        var homeContent = await fetchCacheData('masterContent-'+(feedType??0));
        var partenerSupport = homeContent.data.nav_banner.data.partner_support;
        //console.log('partenerSupport',partenerSupport);
        if(partenerSupport.length > 0){
            var html = '';
            partenerSupport.forEach((item)=>{
                html += `<div class="card ">
                                    <div class="card-header px-0 justify-content-between align-items-center d-flex">
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapseOne">
                                            <span> ${item.title} </span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>

                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion1">
                                        <div class="card-body px-0">
                                            <div class="d-flex align-items-center help_fl">
                                                <div class="linkSec  d-flex align-items-center">
                                                    <i class="fa fa-phone-alt"></i>
                                                    <div class="contTittle">
                                                        <p class="m-0 counT"><?= $this->lang->line('contact_number') ?></p>
                                                        <p class="m-0 text-white"><a href="tel:+91  ${item.support_contact}"> +91 ${item.support_contact}</a></p>
                                                    </div>
                                                </div>

                                                <div class="linkSec  d-flex align-items-center ms-5">
                                                    <i class="fa fa-envelope"></i>
                                                    <div class="contTittle">
                                                        <p class="m-0"><?= $this->lang->line('email_address') ?></p>
                                                        <p class="m-0"><a href="mailto:${item.support_email}">${item.support_email}</a></p>
                                                    </div>
                                                </div>
                                                <div class="linkSec  d-flex align-items-center ms-5">
                                                    <i class="fas fa-globe"></i>
                                                    <div class="contTittle">
                                                        <p class="m-0"><?= $this->lang->line('website') ?></p>
                                                        <p class="m-0 "><a href="${item.website}">${item.website}</a></p>
                                                    </div>
                                                </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>`;
            });
            $('#accordion1').html(html);
            $('#partenerSupport').removeClass('d-none');
        }
    });
</script>