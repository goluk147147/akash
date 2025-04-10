<style>
    .footer-area,
    .navbar {
        display: none !important;
    }

    .seclect-profile-users {
        /* background: #000; */
        /*padding: 30px 20px 20px 20px;*/
        display: flex;
        align-items: center;
        flex-direction: column;
        border-radius: 5px;
        width: 100%;
        height: 100%;
    }

    .h7_logo {
        font-size: 20px;
    }

    .f-600 {
        font-weight: 600
    }

    .profile_user {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
        justify-content: center;
        display: flex;
        width: 100%;
        margin: 0 auto;
    }

    .user_details_pb {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        flex-direction: column;
        border-radius: 10px;
        cursor: pointer;
        transition: all .25s ease 0s;
        text-align: center;
        position: relative;
    }

    .user-images {
        width: 90px;
        height: 90px;
        padding: 5px;
        /*overflow: hidden;*/
        border-radius: 50%;
        display: block;
    }

    .user-image {
        width: 85px;
        height: 85px;
    }

    .loginProfileName {
        font-size: 12px;
        font-weight: 400;
        color: #fff;
        /* max-width:90px; */
    }

    .user-images img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .add-icons {
        width: 75px;
        height: 75px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #181818;
        color: #fff;
        border-radius: 50%;
    }

    .add-icons svg {
        width: 30px;
        height: 30px;
    }

    .add-icons svg fill {
        width: 30px;
        height: 30px;
    }

    :root {
        --radio-border-width: 2px;

    }

    .radio {
        font-size: inherit;
        margin: 0;
        position: absolute;
        right: calc(var(--card-padding) + var(--radio-border-width));
        top: calc(var(--card-padding) + var(--radio-border-width));
    }

    .profile_card {
        background: inherit !important;


    }

    .profile-owl .owl-item.center>div {
        margin: auto !important;
    }

    @supports (-webkit-appearance: none) or (-moz-appearance: none) {
        .radio_user {
            -webkit-appearance: none;
            -moz-appearance: none;
            background: #fff;
            border-radius: 50%;
            cursor: pointer;
            height: 18px;
            outline: none;
            transition: background 0.2s ease-out, border-color 0.2s ease-out;
            width: 18px;
            position: absolute;
            top: 10px;
            right: 0;
            z-index: 1;
            display: none;
        }

        /* .radio_user:checked {
            background: #4845F6;
            border-color: #4845F6;
            display: block;

        }*/

        .radio_user::after {
            border: 2px solid #fff;

            border-top: 0;
            border-left: 0;
            content: "";
            display: block;
            height: 0.75rem;
            left: 25%;
            position: absolute;
            top: 50%;
            transform: rotate(45deg) translate(-50%, -50%);
            width: 0.375rem;

        }


    }

    .owl-item img {
        border-radius: 100%;
    }

    .edit_use_btn {
        color: white;
        display: block;
        text-align: center;
        border-radius: 5px;
        font-weight: 500;
        font-size: 12px;
        text-align: center;
        width: 30%;
        background: var(--pbg);
        margin: auto;
        padding: 8px 16px;
    }

    .user-edit-icon {
        position: absolute;
        top: 36%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80px;
        height: 100%;
        display: flex;
        align-items: center;
        border-radius: 100px;
        justify-content: center;
        color: #fff;
        z-index: 1;
        background: #00000069;
        display: none;
        height: 82px;
    }

    .d-edit {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .rd_none {
        display: none !important;
    }

    .edit_user_btn,
    .btn:hover {
        color: #fff !important;
    }

    .del_icon {
        z-index: 1;
        position: absolute;
        top: -20px;
        right: 0;
    }


    button:focus {
        outline: none !important;
    }

    .profile-slider .submit-btn {
        font-size: 12px;
    }

    .profile-owl .class_btn i {
        position: absolute;
        top: 45%;
        color: #fff !important;
        font-size: 12px;
        background: #545454;
        width: 24px !important;
        height: 24px !important;
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }



    .profile-owl .class_next i {
        background: #545454;
        width: 24px !important;
        height: 24px !important;
        border-radius: 50px;
        display: flex;
        align-items: center;
        font-size: 12px;
        justify-content: center;
    }

    .profile-slider .update-btn {
        font-size: 12px;
        border: none;
    }

    .profile-owl .class_next {
        opacity: 1 !important;
        right: 14px !important;
        padding: 0 !important;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 22px !important;
        width: 22px !important;
        left: -8px;
        bottom: -1px !important;
        background-color: #bab6b6 !important;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .input:checked+.slider:before {
        -webkit-transform: translateX(29px) !important;
        -ms-transform: translateX(29px) !important;
        transform: translateX(29px) !important;
    }

    .slider {
        background-color: #383838;
    }
    @media only screen and (min-width: 1801px) and (max-width: 2400px) {
    .kids_dt {
        font-size: 16px;
        transform: translate(50%, 0px) !important;
    }
}

    @media (min-width: 768px) and (max-width: 991px) {
        /* .seclect-profile-users {
    padding: 40px 15px 40px 15px;
} */
    }

    @media (min-width: 451px) and (max-width: 767px) {
        /* .seclect-profile-users {
    padding: 39px 24px 40px 24px;
} */


        .profile_user_sl {
            text-align: center;
        }

        .profile_user {
            width: 100%;
        }
    }

    @media (min-width: 320px) and (max-width: 450px) {
        /* .seclect-profile-users {
            padding: 30px 0;
        } */


        .profile_user_sl {
            text-align: center;
        }

        .profile_user {
            width: 100%;
        }

        .edit_use_btn {
            width: 90%;
        }
    }

    .user-border {
        position: relative;
    }

    #usernameInput::placeholder {
        color: #999999 !important;
    }

    span.user-image.user-border::after {
        content: "";
        position: absolute;
        width: 10px;
        background: #4321C7;
        height: 20px;
        z-index: 9;
        top: 8px;
        right: 4px;
        padding: 10px;
        height: 20px;
        border-radius: 50%
            /* border: 30px solid red; */
    }

    .back-btn2 {
        top: 20px !important;
    }

    span.user-image.user-border::before {
        content: "✔";
        position: absolute;
        top: 4px;
        right: 8px;
        z-index: 99;

    }

    .profile_side-list a {
        background: #181818;
        color: #fff;
        border-radius: 0;
        padding: 8px 15px;
        border-radius: 5px;
        display: flex !important;
        align-items: center;
        justify-content: space-between;
    }

    .profile_pl {

        color: #4845f6;
    }

    .tet_at {
        color: #7f7f7f;
    }

    .prfile-icon {
        background: #545454;
        border-radius: 50px;
        padding: 5px 6px;
        width: 25px;
        height: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 12px;
    }

    .prfile-back {
        /* background: #000; */
        border-radius: 5px;
        height: 100vh;
    }

    .profile-owl .class_btn {
        padding: 8px 10px !important;
    }

    .profile-owl .class_btn i {
        top: 50% !important;
    }

    .profile-owl .class_next i {
        top: 50% !important;
    }

    .f-16 {
        font-size: 14px;
    }

    .d-nones {
        opacity: 0;
    }
    .serach_right_sd2{
        display:none !important;
    }
    .header_dtes {
    display:none !important;
}
</style>
<section class="back-button back-btn2 d-none" style="background:inherit !important;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-back text-white"><i class="fas fa-chevron-left"></i></div>
            </div>
        </div>
    </div>
</section>
<section class="seclect-profile-users">
    <div class="container-fluid">
        <!--    <div class="row">
            <div class="col-md-12">
                <div class="profile-back text-white"><a href="<?= base_url() ?>"><i class="fas fa-chevron-left me-5" ></i> My Profile</a></div>
            </div>
        </div> -->

        <div class="row ">
            <div class="col-md-12 prfile-back">


                <div class="row align-items-center h-100">
                    <div class="w-100 ">
                        <div class="profile_user_sl mb-5 text-center">
                            <p class="text-white f-600 h7_logo"><?= $this->lang->line('Who’sWatching?'); ?></p>
                        </div>

                        <div class="profile_user pt-3 pb-2">

                            <?php $i = 1;
                            foreach ($profiles as $profile) {
                                $url = base_url() . "assets/images/person_1.png";  //echo $i; 
                            ?>

                                <div class="card profile_card">

                                    <input name="plan" class="radio_user update_user" id="<?= $profile['profile_id'] ?>" type="radio">
                                    <label for="<?= $profile['profile_id']; ?>">
                                        <span class="user_details_pb">
                                            <span class="user-images position-relative">
                                                <img src="<?php if ($profile['profile']) {
                                                                echo $profile['profile'];
                                                            } else {
                                                                echo $url;
                                                            } ?>" alt="<?= $profile['username'] ?>">
                                                              <?php if($profile['is_kid'] == 1){ ?>
                                                      <span class="kids_dt">kids</span>
                                                      <?php } ?>
                                                          
                                            </span>

                                        </span>

                                        <span class="pb-user-names text-center loginProfileName" style="text-align: center;"><?= $profile['username'] ?></span>

                                        </span>
                                    </label>

                                    <div class="user-edit-icon" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" id="<?= $profile['profile_id']; ?>" name="<?= $profile['username'] ?>" iskid="<?= $profile['is_kid']; ?>" prof="<?= $profile['profile']; ?>" isdefault="<?= $profile['is_default']; ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>

                                </div>
                            <?php $i++;
                            }
                            if ($_SESSION['count'] < 5) { ?>

                                <span class="add-user user_details_pb" tabindex="0" data-bs-toggle="modal" data-bs-target="#new_user">
                                    <span class="add-icons">

                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 12H20M12 4V20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                    <span class="text-white f-16"><?= $this->lang->line('Add'); ?></span>
                                </span>
                            <?php } ?>

                        </div>
                        <div class="w-100 text-center mt-5">
                            <button class="edit_use_btn btn mt-5" id="editProfile"><span class="me-2"></span><?= $this->lang->line('Edit-Profile'); ?></button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



<!-- Modal -->
<section class="edit-inner">
    <div class="modal fade " id="new_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="modal-head">
                        <p class="h7 profileHead"><?= $this->lang->line('Add-Profile'); ?></p>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <img class="close-img-mds" src="<?= base_url('assets/images/sunscription_close.svg') ?>">
                    </button>
                    <div class="profile-slider pb-4">


                        <div class="profile-owl owl-carousel owl-theme px-4">
                            <?php foreach ($this->session->userdata('avtar') as $avtar) {  ?>
                                <div class="item profileImg">
                                    <div class="profile-inner">
                                        <img src="<?php if ($avtar['url']) {
                                                        echo $avtar['url'];
                                                    } ?>">

                                    </div>
                                </div>
                            <?php } ?>


                        </div>
                        <div class="row justify-content-center  profileContent">
                            <div class="col-md-8">
                                <div class="profile-input">
                                    <input type="text" name="new_user" id="usernameInput" class="number_input" maxlength="30" placeholder="<?= $this->lang->line('placeholder-profile'); ?>" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9\s]/g, '')">
                                    <div id="name_err" class="text-danger error"></div>
                                </div>

                                <div class="kid-profile">
                                    <div class="row">
                                        <div class="col-md-8 col-8">
                                            <div class="kid-profile-inner">
                                                <p><?= $this->lang->line('Kid’sprofile?'); ?></p>
                                                <p><?= $this->lang->line('Onlyshowkid-friendlyvideos'); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4 d-flex align-items-center justify-content-end p-1">

                                            <label class="switch switch_toggle " style="margin-top:15px;">
                                                <input type="checkbox" class="addcheckbox">
                                                <span class="slider round"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <input type="submit" value="<?= $this->lang->line('Add'); ?>" class="submit-btn">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>



<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
    Launch demo modal
</button> -->
<section class="edit-inner">
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="modal-head">
                        <h5 class="text-white profileHead"><?= $this->lang->line('Edit-Profile'); ?></h5>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <img class="close-img-mds" src="<?= base_url('assets/images/sunscription_close.svg') ?>">
                    </button>
                    <div class="profile-slider pb-4">

                        <input type="hidden" class="prof_copy">
                        <div class="profile-owl owl-carousel owl-theme px-4">
                            <?php foreach ($this->session->userdata('avtar') as $avtar) {
                            ?>
                                <div class="item profileImg">
                                    <div class="profile-inner">
                                        <img src="<?php if ($avtar['url']) {
                                                        echo $avtar['url'];
                                                    } ?>">

                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="row justify-content-center profileContent">
                            <div class="col-md-8">
                                <div class="profile-input">
                                    <input type="text" id="name" name="name" maxlength="30" placeholder="<?= $this->lang->line('placeholder-profile'); ?>" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9\s]/g, '')">
                                    <input type="hidden" id="updateProfileId" name="updateProfileId" value="">
                                    <div id="edit_name_err" class="text-danger error"></div>
                                </div>

                                <div class="row mt-2 d-none">
                                    <div class="col-md-8 col-8">
                                        <div class="kid-profile-inner m-0">
                                            <h6><?= $this->lang->line('Kid’sprofile?'); ?></h6>
                                            <p><?= $this->lang->line('Onlyshowkid-friendlyvideos'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-4 d-flex align-items-center justify-content-end">
                                        <div class="position-relative">

                                            <label class="switch" style="pointer-events:none;">
                                                <input type="checkbox" id="iskid-check" class="toggle-input">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row justify-content-center mt-2">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" value="<?= $this->lang->line('edit_update') ?>" class="update-btn btn btn-info">
                                        <!-- <a class="delete-btn">Delete Profile</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $('.edit_use_btn,.back-button').click(function() {
            var status = $('.radio_user').attr('disabled');
            var change_status = false;
            if (status == undefined) {
                change_status = true
            } else {
                change_status = false
            }

            $('.user-edit-icon').toggleClass('d-edit');
            if ($('.user-edit-icon').hasClass("d-edit")) {
                $('.h7_logo').text('<?= $this->lang->line('Edit-Profile'); ?>');
                $('.back-button').removeClass('d-none');
                $('.edit_use_btn').addClass('d-nones');
                $(".add-user").addClass('d-none');
            } else {
                $(".add-user").removeClass('d-none');
                $('.h7_logo').text('<?= $this->lang->line('Who’sWatching?'); ?>');
                $('.back-button').addClass('d-none');
                $('.edit_use_btn').removeClass('d-nones');
            }
            $('.radio_user').addClass('rd_none').prop('disabled', change_status);

        })
        $('#name').keyup(function() {
            var name = $('#name').val();
            var sname = name.replace(/[^a-zA-Z0-9\s]/g, '');
            $('#name').val(sname);
        });
        $('#usernameInput').keyup(function() {
            var name = $('#usernameInput').val();
            var sname = name.replace(/[^a-zA-Z0-9\s]/g, '');
            $('#usernameInput').val(sname);
        });

        $('.user-edit-icon ').click(function() {
            var id = $(this).attr('id');
            var name = $(this).attr('name');
            var iskid = $(this).attr('iskid');
            var profile = $(this).attr('prof');
            var isdefault = $(this).attr('isdefault');
            if (isdefault == 1) {
                $('#iskid-check').prop('disabled', true);
            } else {
                $('#iskid-check').prop('disabled', false);
            }
            $('#iskid-check').prop('checked', false);
            if (iskid == 1) {
                $('#iskid-check').prop('checked', true);
            }
            $('#name').val(name);
            $('#updateProfileId').val(id);
            $('.prof_copy').attr('value', profile);

        });
    })

    $(document).ready(function() {
        $('.profile-owl').owlCarousel({
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
                    items: 3
                },
                450: {
                    items: 5
                },
                600: {
                    items: 5
                },
                1000: {
                    items: 5
                }
            }
        });


    });

    $('#exampleModalCenter').on('shown.bs.modal', function() {
        var profile = $('.prof_copy').val();
        $('#exampleModalCenter').find('.profile-owl .center .item img').attr('src', profile);
    })

    $('.submit-btn').click(function(e) {
        e.preventDefault();
        $('#name_err').html('');
        $("#overlayonajaxhit").fadeIn();
        var username = $('input[name="new_user"]').val();
        var image = $('.owl-item.active.center img').attr('src');
        //alert(username); 
        if (username == "" || username == " ") {
            $("#overlayonajaxhit").fadeOut();
            $('#name_err').html('<?= $this->lang->line("error_name") ?>');
            return false;
        } else {
            $('.submit-btn').prop('disabled', 'true');
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('/web/Login_register/add_user/1'); ?>',
            dataType: "json",
            data: {
                username: username,
                is_kid: $('.addcheckbox').is(':checked'),
                profile: image
            },
            success: function(data) {
                if (data.status == 1) {
                    swal({
                        imageUrl: "<?= base_url('assets/images/tick.png'); ?>",
                        imageWidth: 70,
                        imageHeight: 70,
                        title: data.message,
                        allowOutsideClick: false,
                        showConfirmButton: true, // Show the "OK" button
                        confirmButtonText: "<?= $this->lang->line("ok") ?>",
                    }).then((result) => {
                        location.reload();
                        //location.href ='<?php echo base_url(); ?>';
                    });
                } else {
                    swal({
                        title: data.message,
                        allowOutsideClick: false,
                        confirmButtonText: "<?= $this->lang->line("ok") ?>",
                    }).then((result) => {

                        //location.href = '<?php echo base_url(); ?>';
                    });
                }

                $('.submit-btn').prop('disabled', 'false');
            }
        }).done(function() {
            setTimeout(function() {
                $("#overlayonajaxhit").fadeOut(300);
            }, 500);
        });
    })

    $('.update-btn').click(function(e) {
        e.preventDefault();
        $('#edit_name_err').html('');
        $("#overlayonajaxhit").fadeIn();
        var username = $('input[name="name"]').val();
        //alert($('.toggle-input').is(':checked'));
        //  alert(username);
        var image = $('.owl-item.active.center img').attr('src');
        var profile_id = $('#updateProfileId').val();
        //alert(username); 
        if (username == "" || username == " ") {
            $("#overlayonajaxhit").fadeOut();
            $('#edit_name_err').html('<?= $this->lang->line("error_name") ?>');
            return false;
        } else {
            $('.update-btn').prop('disabled', 'true');
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('/web/Login_register/add_user/1'); ?>',
            dataType: "json",
            data: {
                username: username,
                is_kid: $('.toggle-input').is(':checked'),
                profile: image,
                activity: 2,
                profile_id: profile_id
            },
            success: function(data) {
                if (data.status == 1) {
                    swal({
                        imageUrl: "<?= base_url('assets/images/tick.png'); ?>",
                        imageWidth: 70,
                        imageHeight: 70,
                        title: data.message,
                        allowOutsideClick: false,
                        confirmButtonText: "<?= $this->lang->line("ok") ?>",
                    }).then((result) => {
                        location.reload();
                        //location.href ='<?php echo base_url(); ?>';
                    });
                    // window.location.reload();
                } else {
                    swal({
                        title: data.message,
                        allowOutsideClick: false,
                    }).then((result) => {
                        <?php
                        if (!empty($this->session->redirect_url)) {
                            // $url = $this->session->redirect_url;
                            // $this->session->unset_userdata('redirect_url');
                            // redirect($url);
                            // die;
                        }
                        ?>
                        //location.href = '<?php echo base_url(); ?>';
                    });
                }

                $('.update-btn').prop('disabled', 'false');
            }
        }).done(function() {
            setTimeout(function() {
                $("#overlayonajaxhit").fadeOut(300);
            }, 500);
        });
        //  } 
        //})
    });

    $('.update_user').on('click', function() {
     
   
        var id = $(this).attr('id');
        var main_profile_id = "<?= $this->session->userdata('profile_id');?>";
        $("#overlayonajaxhit").fadeIn();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('/web/Login_register/change_user'); ?>",
            dataType: "json",
            data: {
                profile_id: id
            },
            success: async function(data) {
                // console.log('data',data);return false;
                if (data.status == true) {
                    var string = '';
                    var profile_datas = <?php echo json_encode($this->session->userdata('profile_data')); ?>;
                    profile_datas.forEach(function(value) {
                        if (value.profile_id ==id) {
                            var iskidcheck = value.is_kid === 0 ? 'Adult' : 'Child';
                             string = value.profile_id + "/" + value.username + "/" + iskidcheck;
                        }
                    });
                    // console.log(string,'string');
                    // return false; 
                    data.url = data.url.replace(/&amp;/g, '&');
                    var key = id+'-continueWatching';
                    if(main_profile_id != id){
                        try {
                            await removeCacheData(key, 'all');
                            await deleteAllMasterContentKeys();
                            await removeCacheData('contentDetail', 'all');
                        } catch (err) {
                        }
                        pullCache(id, data);
                    } else {
                        window.location.href = data.url;
                    }
                    //localStorage.setItem('pb_session', (data.token));
                    queueTrackingDataWithDelay('trackEvent', ['Profile', 'Select',string],50); 
                } else {
                    swal({
                        title: data.message,
                        allowOutsideClick: false,
                        confirmButtonText: "<?= $this->lang->line("ok") ?>",
                    }).then((result) => {
                        data.url = data.url.replace(/&amp;/g, '&');
                        location.href = data.url;
                    });
                }
            }
        }).done(function() {
            //setTimeout(function() {
                $("#overlayonajaxhit").show();
            //}, 500);
        });
    });

    // $('.update_user').on('click', function() {
    //     var id = $(this).attr('id');
    //     $.ajax({
    //         type: 'POST',
    //         url: '<?//= base_url('/web/Login_register/change_user'); ?>',
    //         dataType: "json",
    //         data: {
    //             profile_id: id
    //         },
    //         success: function(data) {
    //             if (data.status == true) {
    //                 fetchWatchingDetailsAndUpdateCache(data.url); // Fetch watching details and update cache
    //                 // location.href = data.url;
    //             } else {
    //                 swal({
    //                     title: data.message,
    //                     allowOutsideClick: false,
    //                 }).then((result) => {
    //                     location.href = data.url;
    //                 });
    //             }
    //         }
    //     });
    // });


    function fetchWatchListAndUpdateCache(redirectToUrl, cache_data = null) {
        if (cache_data != null && cache_data.last_updated) {
            var timestamp = cache_data.last_updated;
        } else {
            var timestamp = '0000000000';
        }
        $.ajax({
            url: base_url + 'web/login_register/get_watchlist',
            type: "post",
            data: {
                timestamp
            },
            success: function(res) {
                var res = JSON.parse(res);
                if (res.last_updated > 0) {
                    var last_updated = res.last_updated;
                } else {
                    var last_updated = cache_data.last_updated;
                }
                if (cache_data != null && cache_data.data) {
                    var unsyncedData = Array();
                    var newobj;
                    var new_key = Object.keys(cache_data.data).length;
                    if (res.data) {
                        res.data.forEach((item) => {
                            var add = true;
                            cache_data.data.forEach((c_item) => {
                                if (item.video_id == c_item.video_id) {
                                    add = false;
                                }
                            });
                            if (add) {
                                cache_data.data[new_key] = {
                                    "id": item.id,
                                    "show_id": item.show_id,
                                    "enc_show_id": item.enc_show_id,
                                    //"enc_video_id":item.enc_video_id,
                                    "media_type": item.media_type,
                                    "title": item.title,
                                    "poster_url": item.poster_url,
                                    "thumbnail_url": item.thumbnail_url,
                                    "description": item.description,
                                    "last_updated": item.last_updated,
                                    "is_deleted": 0,
                                    "is_synced": 1
                                }
                                new_key += 1;
                            }
                        });
                        put_cache(cache_data.data, res.key, redirectToUrl, last_updated);
                    }

                    if (unsyncedData.length > 0) {
                        fetchWatchListAndUpdateCache(redirectToUrl, cache_data.last_updated);
                    }

                } else {
                    put_cache(res.data, res.key, redirectToUrl, last_updated);
                }
            }
        });
    }
    $(window).on('load', function() {
    queueTrackingData('trackEvent', ['Login',"Who’sWatching"]);
  })
</script>
<script>
    $(document).ready(function(){
      setTimeout(async () => {
        var main_profile_id = "<?= $this->session->userdata('profile_id');?>";
        //alert(main_profile_id);
        pullCache(main_profile_id);
      }, 100);
    });
</script>