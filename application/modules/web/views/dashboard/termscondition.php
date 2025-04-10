<style>
    .term_condition_section {
        background-image: url(<?= base_url('assets/images/plan-banner.png') ?>);
        background-size: cover;
        background-repeat: no-repeat;
        height: 200px;
        width: 100%;
        position: relative;
        background-position: center;
        display: flex;
        align-items: center;
    }
</style>



<section class="term_condition_section">
    <div class="container">
        <div class="term-position">
            <div class="text-center">
                <h1 class="text-accent"><?= $this->lang->line('terms_condition')?></h1>
            </div>
            <div class="smalllines mx-auto mb-3 mt-1"></div>
        </div>

    </div>
</section>

<section class="term-condistion-text">
    <div class="container">
        <div class="term-text">
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
    </div>
</section>