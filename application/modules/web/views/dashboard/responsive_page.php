<style>
    .banner_pp {
        width: 100%;
        position: relative;
        top: 72px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: inherit;
        height: auto;
        background-image: url(https://prod4-sprcdn-assets.sprinklr.com/200105/bfc97f65-2c44-436c-8605-29dfdcce5fc5-596334514/JioCinemaBannerBackground.jpeg.jpg);
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<section class="pt-5 out_sid_pg">

    <div class="container apicontent">
        <!-- <div class="col-sm-12 mt-5 mb-4 p-0">
            <a href="<?php //echo base_url() ?>" > Home </a>&nbsp;/&nbsp;<strong><?php //echo isset($privacy_policy['data'])??$privacy_policy['data']['title'] ?></strong>            
        </div> -->
        <?php //print_r($privacy_policy);
        if (empty($privacy_policy['data']['description'])) {
        ?>
            <div class="alert alert-danger text-center">
                <strong><?= $this->lang->line('no_record')?></strong>
            </div>
        <?php
        } else {
            echo $privacy_policy['data']['description']; 
        }
        ?>
    </div>

</section>