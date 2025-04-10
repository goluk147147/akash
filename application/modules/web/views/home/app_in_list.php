<?php $name = $_GET['name']??''; 
$id = $_GET['publisher_id']??''; ?>
<section class="section_top mb-5 foooter footer_dt_top footer_dt_top no_data_found_yes">
    <div class="container-fluid">
        <div class="row mt-5 mb-3">
            <div class="col-md-12">
                <nav>
                    <a onclick="history.go(-1)" class="d-flex w_text text-decoration-none d-flex align-items-center text-white pb_back">
                        <i class="fa fa-chevron-left text-white"></i>
                        <h5 class="ms-4 mb-0 text-white watch_cont"><?= $name  ?></h5>
                        <input type='hidden' value='1' id='pageNum'>
                    </a>
                </nav>
            </div>
        </div>
        <div class="row  m-coninew ">
            <div class="col-md-12 mts-5">
                <div class="m-0">
                    <div class="app_card_flex">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    var id = "<?= $id ?>";
    var getData = true;
    var hasscroll = false;
    function retriveData(){
        var page = Number($('#pageNum').val());
        hasscroll = true;
        if(getData){
            $.ajax({
                url:"<?=base_url('web/home/getPublisherData')?>",
                type:"post",
                data:{
                    "is_home_page":0,
                    "page":page,
                    "id":id
                },
                success:function(res){
                    var res = JSON.parse(res);
                    var html = '';
                    if(res.status && (res.data.length > 0)){
                        res.data.forEach((item,key)=>{
                            var base_url = "<?php echo base_url(); ?>";
                            var provider = base_url+'provider?id=' +item.ids
                            if (!item.thumbnail) {
                                item.thumbnail = "<?=base_url(PosterPlaceholder)?>";
                            }
                            html += `<div class="app_incard_dt">
                                <a href="${provider}">
                                    <div class="app_card_sub_dt position-relative">`;
                                    if(item.is_paid != 0 ){
                                         html += `<div class="premium_icondt">
                                            <img src="<?= base_url('assets/images/premium-icon.svg') ?>" class="premium_app_inapp" alt="premium">
                                        </div>`;
                                    }
                                       html += `<img src="`+item.thumbnail+`" class="img-fluid bd8" alt="Images">
                                    </div>
                                </a>
                            </div>`;
                        });
                        if(page == 1){
                            $('.app_card_flex').html(html);
                        }else{
                            $('.app_card_flex').append(html);
                        }
                        $('#pageNum').val((page+1));
                        hasscroll = false;
                    }else{
                        var html = `<div class="row">
                            <div class="col-md-6 m-auto text-center" style="margin-top:110px !important" ;>
                                <img src="<?= base_url('assets/images/404-imge.svg'); ?>" class="img-fluid" alt="404-image">
                                <h5 class="m-0 mt-3 text-center text-white"><?= NoDataFound; ?></h5>
                            </div>
                        </div>`;
                        if(page == 1){
                            $('.m-coninew').html(html);
                        }
                        getData = false;
                    }
                    var distanceFromBottom = $(document).height() - ($(document).scrollTop());
                    if ((distanceFromBottom <= 2*$(window).height()) && hasscroll == false) {
                        retriveData();
                    }
                }
            })
        }
    }

    $(document).ready(function(){
        retriveData();
        $(window).on('scroll', function() {
            var distanceFromBottom = $(document).height() - ($(document).scrollTop());
            if ((distanceFromBottom <= 2*$(window).height()) && hasscroll == false) {
                retriveData();
            }
        });
    });
</script>