<section style="background:#000; padding-top: 10px!important; padding-bottom: 10px;">
    <div class="text-center" style="margin-bottom: 30px;    margin-top:110px;">
        <h2 class="text-white"><?= $this->lang->line('policy')?></h2>
    </div>
    <div class="pagebreadcrumb">
        <div class="row">
            <div class="col-sm-12" style="text-align: center !important;">
                <a href="<?php echo base_url() ?>"> <?= $this->lang->line('home')?> </a>&nbsp;/&nbsp;<strong><?= $this->lang->line('policy')?></strong>
            </div>
        </div>
    </div>
</section>
<section class="pt-5 out_sid_pg">
    <div class="container apicontent">
        <?php
        if ($master_hit == "") {
        ?>
            <div class="alert alert-danger text-center">
                <strong><?= $this->lang->line('no_record')?></strong>
            </div>
        <?php
        } else {
            echo $master_hit;
        }
        ?>
    </div>
</section>