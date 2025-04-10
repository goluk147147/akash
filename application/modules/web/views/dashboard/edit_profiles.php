<section class="edit_profiles_use py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="profile-back text-white d-flex align-items-center ">
                    <a onclick="history.go(-1)" class="pb_back">
                        <i class="fa fa-chevron-left text-white"></i>
                    </a>
                    <h5 class="mb-0 text-white ms-4"><?= $this->lang->line('Edit-Profile') ?></h5>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10 m-auto pt-2 clefite">
                <div class="w-100">
                    <div class="profile_user profile-owls owl-carousel owl-theme">
                        <div class="item">
                            <div class="profile-inner profileImg">
                                <img src="https://d3u46owbs61oyy.cloudfront.net/avtar/25383181714825773_you1.png" alt="profile-avatar">
                            </div>
                        </div>
                        <div class="item">
                            <div class="profile-inner profileImg">
                                <img src="https://d3u46owbs61oyy.cloudfront.net/avtar/25383181714825773_you1.png" alt="profile-avatar">
                            </div>
                        </div>
                        <div class="item">
                            <div class="profile-inner profileImg">
                                <img src="https://d3u46owbs61oyy.cloudfront.net/avtar/25383181714825773_you1.png" alt="profile-avatar">
                            </div>
                        </div>
                        <div class="item">
                            <div class="profile-inner profileImg">
                                <img src="https://d3u46owbs61oyy.cloudfront.net/avtar/25383181714825773_you1.png" alt="profile-avatar">
                            </div>
                        </div>
                        <div class="item">
                            <div class="profile-inner profileImg">
                                <img src="https://d3u46owbs61oyy.cloudfront.net/avtar/25383181714825773_you1.png" alt="profile-avatar">
                            </div>
                        </div>
                        <div class="item">
                            <div class="profile-inner profileImg">
                                <img src="https://d3u46owbs61oyy.cloudfront.net/avtar/25383181714825773_you1.png" alt="profile-avatar">
                            </div>
                        </div>
                        <div class="item">
                            <div class="profile-inner profileImg">
                                <img src="https://d3u46owbs61oyy.cloudfront.net/avtar/25383181714825773_you1.png" alt="profile-avatar">
                            </div>
                        </div>
                        <div class="item">
                            <div class="profile-inner profileImg">
                                <img src="https://d3u46owbs61oyy.cloudfront.net/avtar/25383181714825773_you1.png" alt="profile-avatar">
                            </div>
                        </div>
                        <div class="item">
                            <div class="profile-inner profileImg">
                                <img src="https://d3u46owbs61oyy.cloudfront.net/avtar/25383181714825773_you1.png" alt="profile-avatar">
                            </div>
                        </div>
                        <div class="item">
                            <div class="profile-inner profileImg">
                                <img src="https://d3u46owbs61oyy.cloudfront.net/avtar/25383181714825773_you1.png" alt="profile-avatar">
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-4 pt-3">
            <div class="col-md-8 m-auto">
                <div class="profile-input edit_prof_input">
                    <input type="text" id="name" name="name" maxlength="30" placeholder="<?= $this->lang->line('placeholder-profile') ?>">
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-2 mb-4 pt-5">
            <div class="col-md-12 text-center">
                <!-- <input type="submit" value="Update" class="update-btn btn btn-info"> -->
                <a href="javascript:void();" class="update-btn btn btn-info"><?= $this->lang->line('edit_update') ?></a>

            </div>
            <div class="col-md-12 text-center">
                <!-- <input type="submit" value="Update" class="update-btn btn btn-info"> -->
                <a href="javascript:void();" class="deleteprofile-btn btn">Delete Profile</a>

            </div>
        </div>

    </div>

</section>

<script>
    $(document).ready(function() {
        $('.profile-owls').owlCarousel({
            loop: true,
            margin: 8,
            center: true,
            nav: true,
            navText: [
                '<a class="class_btn"><i class="fa fa-chevron-left"></i></a>',
                '<a class="class_next"><i class="fa fa-chevron-right"></i></a>'
            ],
            dots: false,
            responsive: {
                0: {
                    items: 3,
                    margin: 0
                },
                450: {
                    items: 5,
                    margin: 0
                },
                600: {
                    items: 5,
                    margin: 0
                },
                1000: {
                    items: 9,
                    margin: 0
                }
            }
        });


    });
</script>