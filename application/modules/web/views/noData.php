<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="notfound">
            <div class="no_dt_found watchListNo" style="height: auto !important;">
                <img src="<?= base_url('assets/images/no_list_found.png'); ?>" class="img-fluid" alt="no list found">
                <h5 class="m-0 text-center text-white"><?= $this->lang->line('No-data-found')?></h5>
                <!-- <p class="mb-0 text_ac"><?//= $this->lang->line('No-list-found')?></p> -->
                <a href="<?php echo base_url(); ?>" class="pt-2"><?= $this->lang->line('back_to_home')?></a>
            </div>
            </div>
        </div>
    </div>
</div>