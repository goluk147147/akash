<section class=" mb-5 section_top foooter footer_dt_top no_data_found_yes">
    <div class="container-fluid">

        <div class="row mt-5 mb-4">
            <div class="col-md-12 m-auto mt-3 col-12">
                <nav class="">
                    <a onclick="history.go(-1)" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>

                        <h5 class="ms-4 text-white watch_cont"></h5>
                    </a>
                </nav>
            </div>
        </div>
        <div class="row m-coninew">
            <div class="col-md-12 m-auto col-12">
                <div class="mt-2 m-0">
                    <div class="pb_wl_card">
                        <?php for ($j = 0; $j <= 18; $j++) { ?>
                            <a href="javascript:void();" class="display_viwer_content">
                                <div class="pb_card_details mb-3 img_pdf_dets">
                                    <div class="pb_img_pdf">
                                        <img src="<?= base_url('assets/images/img-pdf.jpg'); ?>" class="img-fluid" alt="image">

                                    </div>

                                </div>
                            </a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class=" mb-5 foooter no_data_found" style="display: none;">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12 m-auto mt-3 col-12">
                <nav class="">
                    <a href="<?= base_url(); ?>" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>

                        <h5 class="ms-4 text-white watch_cont1"></h5>
                    </a>
                </nav>
                <input type="hidden" id="start" value="1">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 m-auto text-center" style="margin-top:110px !important" ;>
                <img src="<?= base_url('assets/images/404-imge.svg'); ?>" class="img-fluid" alt="404-image">
                <h5 class="m-0 mt-3 text-center text-white"><?= NoDataFound; ?></h5>
                <p class="mb-0 text_ac"><?= NoListFound; ?></p>
            </div>
        </div>
    </div>
</section>
<script>
    function applyRowStyles() {
        const container = document.querySelector('.pb_wl_card');

        if (!container) {
            console.error('Container not found');
            return;
        }

        const items = container.querySelectorAll('.pb_card_details');

        if (items.length === 0) {
            console.error('No items found');
            return;
        }

        const itemWidth = items[0].offsetWidth;
        const marginRight = parseFloat(getComputedStyle(items[0]).marginRight) || 0;
        const itemsPerRow = Math.floor(container.offsetWidth / (itemWidth + marginRight));

        if (itemsPerRow <= 0) {
            console.error('Invalid number of items per row');
            return;
        }

        items.forEach((item, index) => {
            item.classList.remove('first-in-row', 'last-in-row');

            if (index % itemsPerRow === 0) {
                item.classList.add('first-in-row');
            }

            if ((index + 1) % itemsPerRow === 0) {
                item.classList.add('last-in-row');
            }
        });
    }

    // Initial application
    applyRowStyles();

    // Reapply on window resize
    window.addEventListener('resize', applyRowStyles);
</script>