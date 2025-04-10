<style>
   #usernameInput::placeholder {
      color: #999999 !important;
   }

   .se_users {
      height: 100% !important;
      overflow-y: auto !important;
   }

   .footer-area,
   .navbar {
      display: none !important;
   }

   .seclect-profile-users {

      padding: 40px 25px 20px 25px;
      display: flex;
      align-items: center;
      flex-direction: column;
      border-radius: 5px;
      width: 100%;
      height: 100%;
   }

   .f-600 {
      font-weight: 600
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
      right: -10px !important;
   }

   .slider {
      background-color: #383838;
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

   .pb-user-names {
      font-size: 14px !important;
      font-weight: 400;
      color: #fff;
      /* max-width: 90px; */
      -webkit-line-clamp: 1;
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
      background-color: #323232;
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
      margin: auto;
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
      color: var(--pbc);
      display: block;
      text-align: center;
      border-radius: 5px;
      font-weight: 500;
      font-size: 16px;
   }

   .user-edit-icon {
      position: absolute;
      top: 38%;
      left: 53%;
      transform: translate(-50%, -50%);
      width: 76px;
      height: 100%;
      display: flex;
      align-items: center;
      border-radius: 100px;
      justify-content: center;
      color: #fff;
      z-index: 1;
      background: #00000069;
      display: none;
      height: 76px;
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

   .pro_center {
      display: flex;
      align-items: center;
      height: 80%;
      width: 100%;
      flex-direction: column;
      justify-content: center;
   }

   .logout_pb {
      background: var(--pbg);
      color: var(--white);
      border-radius: 5px;
      font-weight: 500;
      padding: 10px 16px;
      width: 25%;
      border: none;
      margin: auto;
      font-weight: 500;
   }

   .profile-back {
      color: #fff;
      font-weight: 600;
      font-size: 20px;
   }

   button:focus {
      outline: none !important;
   }

   .edit_use_btn:hover {
      color: var(--pbc) !important;
   }

   @media (min-width: 768px) and (max-width: 991px) {
      .seclect-profile-users {
         padding: 40px 25px 40px 25px;
      }

      .logout_pb {
         width: 40%;
      }
   }

   @media (min-width: 451px) and (max-width: 767px) {
      .seclect-profile-users {
         padding: 39px 24px 40px 24px;
      }

      .edit_use_btn {
         display: flex;
         justify-content: end;
      }

      .profile_user_sl {
         text-align: center;
      }

      .profile_user {
         width: 100%;
      }

      .logout_pb {
         width: 60%;
      }
   }

   @media (min-width: 320px) and (max-width: 450px) {
      .seclect-profile-users {
         padding: 30px 0;
      }

      .edit_use_btn {
         display: flex;
         justify-content: end;
      }

      .seclect-profile-users {
         overflow-x: auto !important;
         height: 100% !important;
      }

      .logout_pb {
         width: 90%;
      }

      .profile_user_sl {
         text-align: center;
      }

      .profile_user {
         width: 100%;
      }
   }

   .user-border {
      position: relative;
   }

   .edit_user_btn {
      display: flex;
      justify-content: end;
   }

   span.user-image.user-border::after {
      content: "";
      position: absolute;
      width: 10px;
      background: #1DDB25;
      height: 20px;
      z-index: 9;
      right: 3px;
      padding: 10px;
      height: 20px;
      border-radius: 50%;
      bottom: 16px;
   }

   span.user-image.user-border::before {
      content: "✔";
      position: absolute;
      right: 8px;
      z-index: 99;
      bottom: 13px;
   }

   .profile-slider .submit-btn {
      font-size: 12px;
   }

   .profile_side-list a {
      background: #181818;
      color: #fff;
      border-radius: 0;
      padding: 8px 8px;
      border-radius: 5px;
      display: flex !important;
      align-items: center;
      justify-content: space-between;
   }

   .profile_pl {
      color: #4845f6;
      line-height: 14px;
   }

   .prfile-icon {
      background: #545454;
      border-radius: 50px;
      padding: 5px 6px;
      width: 20px;
      height: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 10px;
   }

   .edit_use_btn {
      float: right;
   }

   .prfile-back {
      background: #181818;
      border-radius: 5px;
      height: 80vh;
   }

   .profile-owl .class_btn {
      padding: 8px 10px !important;
   }

   .tet_at {
      color: #7f7f7f;
   }

   .profile-owl .class_btn i {
      top: 50% !important;
   }

   .profile-owl .class_next i {
      top: 50% !important;
   }

   .f-16 {
      font-size: 16px;
   }

   .f-18 {
      font-size: 14px;
   }

   .swal2-title {
      font-size: 16px !important;
      font-weight: 500 !important;
      width: 80%;
      text-align: center !important;
      margin: auto !important;
   }

   .swal2-content {
      color: #a7a7a7;
      font-size: 15px !important;
      font-weight: 500 !important;
      width: 85%;
      margin: 12px auto 10px auto !important;
   }
    .serach_right_sd2{
        display:none !important;
    }
    .header_dtes {
    display:none !important;
}
.lineragradienttop{
   background-image:none !important;
}
.modal-backdrop.show {
    opacity:0  !important;
}
   /* .swal2-popup .swal2-styled {
      padding: 8px 55px !important;
      margin: 4px 3px !important;
   } */
</style>
<!-- <section class="py-5">
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
               <div class="profile-back text-white"><i class="fas fa-chevron-left"></i></div>
           </div>
       </div>
   </div>
   </section> -->

<section class="seclect-profile-users se_users">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 p-0">
            <div class="profile-back text-white d-flex align-items-center ">
               <a onclick="history.go(-1)" class="pb_back">
                  <i class="fa fa-chevron-left text-white"></i>
               </a>
               <h5 class="mb-0 text-white ms-4"><?= $this->lang->line('My-Profile'); ?></h5>
            </div>
         </div>
      </div>
      <div class="row my-3">
         <!-- <div class="col-md-2 mb-3 p-0 mobWatchList">
            <div class="profile_side-list">
               <a href="<//?= base_url('watchlist') ?>">
                  <div class="watchingList">
                     <span class="profile_pl me-1"><i class="fas fa-plus"></i></span>
                     <p class="f-16"><//?= $this->lang->line('Watchlist'); ?></p>
                  </div>
                  <span class="prfile-icon">
                     <i class="fas fa-chevron-right"></i></span>
               </a>
            </div>
         </div> -->
         <div class="col-md-12">
            <div class="row m-0">
               <div class="w-100 prfile-back">
                  <!-- <div class="profile_user_sl mb-4 text-center">
                     <h2 class="text-white f-600">Who’s Watching ?</h2>
                     </div> -->
                  <button class="edit_use_btn edts btn pt-3 pe-3"><span class="me-2"><i class="fas fa-pencil-alt"></i></span><?= $this->lang->line('Edit'); ?></button>
                  <div class="pro_center">
                     <div class="profile_user pt-4">
                        <?php $i = 1;
                        foreach ($profiles as $profile) {
                           $url = base_url() . "assets/images/person_1.png";  //echo $i; 
                           $profile_selected = "no";
                        ?>
                           <div class="card profile_card">
                              <input name="plan" class="radio_user <?php if ($profile['profile_id'] == $this->session->userdata('profile_id')) {
                                                                        $profile_selected = "yes";
                                                                        echo "user-border";
                                                                     } else {
                                                                        echo "update_user";
                                                                     } ?>" type="radio" id="<?= $profile['profile_id']; ?>">
                              <label for="<?= $profile['profile_id']; ?>">
                                 <span class="user_details_pb">
                                    <span class="user-images position-relative">

                                       <span class="user-image <?php if ($profile['profile_id'] == $this->session->userdata('profile_id')) {
                                                                  echo "user-border";
                                                               } ?> ">
                                          <img src="<?php if ($profile && isset($profile['profile']) && !empty($profile['profile'])) {
                                                         echo $profile['profile'];
                                                      } else {
                                                         echo $url;
                                                      } ?>" alt="<?= $profile['username'] ?>">
                                                      <?php if($profile['is_kid'] == 1){ ?>
                                                      <span class="kids_dt">kids</span>
                                                      <?php } ?>
                                       </span>
                                    </span>
                                    <span class="pb-user-names text-center" style="text-align: center;">
                                       <?= $profile['username'] ?>
                                    </span>
                                 </span>
                              </label>
                              <div class="user-edit-icon" data-bs-toggle="modal" isSelected="<?= $profile_selected ?>" data-bs-target="#exampleModalCenter" id="<?= $profile['profile_id']; ?>" name="<?= $profile['username'] ?>" iskid="<?= $profile['is_kid']; ?>" prof="<?= ($profile && isset($profile['profile']) && !empty($profile['profile'])) ? $profile['profile'] : ""; ?>" isdefault="<?= $profile['is_default']; ?>">
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
                              <span class="text-white f-18 addProText"><?= $this->lang->line('Add'); ?></span>
                           </span>
                        <?php } ?>
                     </div>
                     <div class="w-100 text-center mt-5">
                        <button class="logout_pb user-logout">
                           <?= $this->lang->line('Logout'); ?>
                        </button>
                     </div>
                     <div class="w-100 text-center mt-2 d-none">
                        <button class="delate_acount" onclick="delete_user_account()">
                           <?= $this->lang->line('Delete-Account'); ?>
                        </button>
                     </div>
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
                  <img src="<?= base_url('assets/images/sunscription_close.svg') ?>" alt="delete icon " class="close-img-mds">
               </button>
               <div class="profile-slider pb-4">
                  <div class="profile-owl owl-carousel owl-theme px-4">
                     <?php foreach ($this->session->userdata('avtar') as $avtar) {  ?>
                        <div class="item profileImg">
                           <div class="profile-inner">
                              <?php
                              $avatar_img = base_url('assets/images/kids.png');
                              if (isset($avtar['url']) && !empty($avtar['url'])) {
                                 $avatar_img = $avtar['url'];
                              }
                              ?>
                              <img src="<?php echo $avatar_img; ?>" alt="profile-avatar">
                           </div>
                        </div>
                     <?php } ?>
                  </div>
                  <div class="row justify-content-center profileContent">
                     <div class="col-md-8">
                        <div class="profile-input">
                           <input type="text" name="new_user" id="usernameInput" class="number_input" maxlength="30" placeholder="<?= $this->lang->line('placeholder-profile'); ?>" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9 ]/g, '')">
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
                              <div class=" col-md-4 col-4 d-flex align-items-center justify-content-end p-1">
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
                  <p class="h7  profileHead"><?= $this->lang->line('Edit-Profile'); ?></p>
               </div>
               <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <img src="<?= base_url('assets/images/sunscription_close.svg') ?>" alt="delete img" class="close-img-mds">
                  <input type="hidden" class="prof_copy">
               </button>
               <div class="profile-slider pb-4">
                  <div class="profile-owl owl-carousel owl-theme px-4">
                     <?php foreach ($this->session->userdata('avtar') as $avtar) {
                     ?>
                        <div class="item">
                           <div class="profile-inner profileImg">
                              <?php
                              $avatar_img = base_url('assets/images/kids.png');
                              if (isset($avtar['url']) && !empty($avtar['url'])) {
                                 $avatar_img = $avtar['url'];
                              }
                              //pre($avatar_img);

                              ?>
                              <img src="<?= $avatar_img; ?>" alt="profile-avatar">
                           </div>
                        </div>
                     <?php } ?>
                  </div>
                  <div class="row justify-content-center profileContent">
                     <div class="col-md-8">
                        <div class="profile-input">
                           <input type="text" id="name" name="name" maxlength="30" placeholder="<?= $this->lang->line('placeholder-profile'); ?>" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9 ]/g, '')">
                           <input type="hidden" id="updateProfileId" name="updateProfileId" value="">
                           <div id="edit_name_err" class="text-danger error"></div>
                        </div>

                        <div class="row mt-2 d-none">
                           <div class="col-md-8 col-8">
                              <div class="kid-profile-inner m-0">
                                 <p><?= $this->lang->line('Kid’sprofile?'); ?></p>
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

                        <div class="row justify-content-center mt-2 pt-2">
                           <div class="col-md-12 text-center">
                              <input type="submit" value="<?= $this->lang->line('edit_update') ?>" class="update-btn btn btn-info">
                              <a class="delete-btn"><?= $this->lang->line('Delete-Profile'); ?></a>
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

      $('#new_user').on('shown.bs.modal', function() {
         $('.error').html('');

      })
      $('.edit_use_btn').click(function() {
         $(".add-user").removeClass('d-none');
         var status = $('.radio_user').attr('disabled');
         var change_status = false;
         if (status == undefined) {
            $(".add-user").addClass('d-none');
            change_status = true;
            $(this).html('<?= $this->lang->line('Cancel'); ?>');
         } else {
            $(".add-user").removeClass('d-none');

            $(this).html('<span class="me-2"><i class= "fas fa-pencil-alt" ></i ></span > <?= $this->lang->line('Edit'); ?>');
            change_status = false;
         }
         $('.user-edit-icon').toggleClass('d-edit');
         $('.radio_user').addClass('rd_none').prop('disabled', change_status);

      })
      $('#name').keyup(function() {
         var name = $('#name').val();
         var sname = name.replace(/\s+/g, ' ');
         $('#name').val(sname);
      });
      $('#usernameInput').keyup(function() {

         var name = $('#usernameInput').val();
         var sname = name.replace(/\s+/g, ' ');
         $('#usernameInput').val(sname);
      });

      $('.user-edit-icon ').click(function() {
         var id = $(this).attr('id');
         var name = $(this).attr('name');
         var iskid = $(this).attr('iskid');
         var profile = $(this).attr('prof');
         var isdefault = $(this).attr('isdefault');
         var isSelected = $(this).attr('isSelected');
         //alert(isSelected);
         if (isdefault == 1 || isSelected == "yes") {
            $('.delete-btn').addClass('d-none');
            $('#iskid-check').prop('disabled', true);
         } else {
            $('.delete-btn').removeClass('d-none');
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
   });


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
      $('#name_err').html('')
      e.preventDefault();
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
      // swal({
      //       title: 'Do you want to add user profile?',
      //       animation: false,
      //       imageUrl: "<?= base_url('assets/image/delete.png'); ?>",
      //       imageWidth: 70,
      //       imageHeight: 70,
      //       confirmButtonColor: '#006BB6',
      //       allowOutsideClick: false,
      //       cancelButtonColor: '#d33',
      //       confirmButtonText: "Confirm",
      //       showCancelButton: true,
      //       cancelButtonText: 'Cancel',
      //    // confirmButtonClass: 'btn btn-success me-2',
      //    // cancelButtonClass: 'btn btn-danger',
      //   }).then((result) => {
      //       if (result.value) {

      $.ajax({
         type: 'POST',
         url: '<?= base_url('/web/Login_register/add_user'); ?>',
         dataType: "json",
         data: {
            username: username,
            is_kid: $('.addcheckbox').is(':checked'),
            profile: image
         },
         success: function(data) {
            if (data.status == 1) {
             var iskid = ($('.addcheckbox').is(':checked') !=  'true')?"Adult":"Child";
             var profileId = "<?=$this->session->userdata('profile_id')?>";
             var string = username+"/"+iskid;
             queueTrackingData('trackEvent', ["Profile","Add",string]);      
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
            } else {
               swal({
                  title: data.message,
                  allowOutsideClick: false,
                  confirmButtonText: "<?= $this->lang->line("ok") ?>",
               }).then((result) => {
                  //location.reload();
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
      //     } 
      // })
   })

   $('.update-btn').click(function(e) {
      $('#edit_name_err').html('');
      e.preventDefault();
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
      // swal({
      //   title: 'Do you want to update user profile?',
      //   imageUrl: "<?= base_url('assets/image/delete.png'); ?>",
      //   imageWidth: 70,
      //   imageHeight: 70,
      //   animation: false,
      //   confirmButtonColor: '#006BB6',
      //   allowOutsideClick: false,
      //   cancelButtonColor: '#d33',
      //    confirmButtonText: "Confirm",
      //    showCancelButton: true,
      //    cancelButtonText: 'Cancel',
      //    // confirmButtonClass: 'btn btn-success me-2',
      //    // cancelButtonClass: 'btn btn-danger',
      //   }).then((result) => {
      //if (result.value) {
      $.ajax({
         type: 'POST',
         url: '<?= base_url('/web/Login_register/add_user'); ?>',
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
               var iskid = ($('.toggle-input').is(':checked') != 'true')?"Adult":"Child";
             var profileId = "<?=$this->session->userdata('profile_id')?>";
             var string = profileId+"/"+username+"/"+iskid;
             queueTrackingData('trackEvent', ["Profile","Edit",string]);
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
                  confirmButtonText: "<?= $this->lang->line("ok") ?>",
               }).then((result) => {
                  //location.reload();
                  // location.href = '<?php echo base_url(); ?>';
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
   })
   $('.update_user').on('click', function() {
      var pid = "<?= $this->session->profile_id ?>";
      var id = $(this).attr('id');
      logout_user(2);
      var key = pid+'-continueWatching';
      removeCacheData(key, 'all');
      swal({

         title: '<?= $this->lang->line("change_account") ?>',
         text: '<?= $this->lang->line('move_account') ?>',
         imageUrl: "<?= base_url('assets/images/chenage_profile.svg'); ?>",
         imageWidth: 70,
         imageHeight: 70,
         animation: false,
         confirmButtonColor: '#006BB6',
         allowOutsideClick: false,
         cancelButtonColor: '#d33',
         confirmButtonText: "<?= $this->lang->line('Confirm') ?>",
         showCancelButton: true,
         cancelButtonText: "<?= $this->lang->line('Cancel') ?>",
         confirmButtonClass: 'btn btn-success me-2',
         cancelButtonClass: 'btn btn-danger',
      }).then((result) => {
         if (result.value) {
              <?php 
                  $profiles = $this->session->userdata('profile_data');
                  foreach ($profiles as  $value) {
                  if ($value['profile_id'] == $this->session->profile_id) {
                  $flag = true;
                  $ses_data = array(
                  'username' => $value['username'],
                  'profile_id' => $value['profile_id'],
                  'pro_img' => ($value['profile']) ?? $img_url,
                  'name' => $value['username'],
                  'Iskid' => $value['is_kid']

                  );                   
                  $ses_data['Iskid'] = ($ses_data['Iskid'] == 0) ? 'Adult' : 'Child';
                  }

                  }
                  ?>
                  var string = "<?=$ses_data['profile_id']?>"+"/"+"<?=$ses_data['username']?>"+"/"+"<?=$ses_data['Iskid']?>";

                  if ("<?=$this->session->userdata('profile_count')?>") {
                  queueTrackingData('trackEvent', ['Profile', 'Switch',string]); 
                  } else {
                  queueTrackingData('trackEvent', ['Profile', 'Select',string]); 
                  } 
            pullCache(pid);
            $.ajax({
               type: 'POST',
               url: '<?= base_url('/web/Login_register/change_user'); ?>',
               dataType: "json",
               data: {
                  profile_id: id
               },
               success: async function(data) {
                  if (data.status == 1) {

                     var key = id+'-continueWatching';
                     await removeCacheData(key, 'all');
                     await removeCacheData('contentDetail', 'all');
                     location.href = '<?php echo base_url(); ?>';
                  } else {
                     swal({
                        title: data.message,
                        allowOutsideClick: false,
                        confirmButtonText: "<?= $this->lang->line("ok") ?>",
                     }).then((result) => {
                        //location.reload();
                        location.href = '<?php echo base_url(); ?>';
                     });
                     //alert('Something went wrong');
                     // window.location.reload();
                  }


               }
            });
         } else {
            return false;
         }
      }).done(function() {
         setTimeout(function() {
            $("#overlayonajaxhit").fadeOut(300);
         }, 500);
      });
   });
   // function change_user(id){

   //    }

   $('.delete-btn').click(function(e) {
      $('#edit_name_err').html('');
      e.preventDefault();
      var id = $('#updateProfileId').val();
      var username = $('#name').val();
      swal({
         title: '<?= $this->lang->line('delete_acct') ?>',
         text: '<?= $this->lang->line('delete_conform') ?>',
         imageUrl: "<?= base_url('assets/images/delete.png'); ?>",
         imageWidth: 70,
         imageHeight: 70,
         animation: false,
         confirmButtonColor: '#006BB6',
         allowOutsideClick: false,
         cancelButtonColor: '#d33',
         confirmButtonText: "<?= $this->lang->line('Confirm') ?>",
         showCancelButton: true,
         cancelButtonText: '<?= $this->lang->line('Cancel') ?>',
         // confirmButtonClass: 'btn btn-success me-2',
         // cancelButtonClass: 'btn btn-danger',
      }).then((result) => {
         if (result.value) {
            $.ajax({
               type: 'POST',
               url: '<?= base_url('/web/Login_register/add_user'); ?>',
               dataType: "json",
               data: {
                  profile_id: id,
                  username: username,
                  activity: 3
               },
               success: function(data) { //alert(data);
                  if (data.status == 1) {
             var iskid = ($('.toggle-input').is(':checked') !=  'true')?"Adult":"Child";
             var profileId = "<?=$this->session->userdata('profile_id')?>";
             var string = profileId+"/"+username+"/"+iskid;
             queueTrackingData('trackEvent', ["Profile","Delete",string]);
                     swal({
                        imageUrl: "<?= base_url('assets/images/tick.png'); ?>",
                        imageWidth: 70,
                        imageHeight: 70,
                        title: data.message,
                        allowOutsideClick: false,
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
                        //location.reload();
                        location.href = '<?php echo base_url(); ?>';
                     });
                  }
               }
            });
         }
      });
   });

   function delete_user_account() {
      swal({
         title: '<?= $this->lang->line('delete_acct') ?>',
         text: '<?php echo SUBSCRIPTION_CHECK == 1 ? $this->lang->line('delete_conform_paid') : $this->lang->line('delete_conform'); ?>',
         imageUrl: "<?= base_url('assets/images/delete.png'); ?>",
         imageWidth: 70,
         imageHeight: 70,
         animation: false,
         confirmButtonColor: '#006BB6',
         allowOutsideClick: false,
         cancelButtonColor: '#d33',
         confirmButtonText: "<?= $this->lang->line('Confirm') ?>",
         showCancelButton: true,
         cancelButtonText: '<?= $this->lang->line('Cancel') ?>',
         // confirmButtonClass: 'btn btn-success me-2',
         // cancelButtonClass: 'btn btn-danger',
      }).then((result) => {
         if (result.value) {
            $.ajax({
               type: 'POST',
               url: '<?= base_url('/web/Login_register/delete_account'); ?>',
               dataType: "json",
               // data: {
               //    profile_id: id,
               //    username:username,
               //    activity: 3
               // },
               success: function(data) { //console.log(data);
                  localStorage.removeItem('pb_session');
                  if (data.status == true) {
                     swal({
                        imageUrl: "<?= base_url('assets/images/tick.png'); ?>",
                        imageWidth: 70,
                        imageHeight: 70,
                        title: data.message,
                        allowOutsideClick: false,
                        confirmButtonText: "<?= $this->lang->line("ok") ?>",
                     }).then((result) => {
                        location.href = '<?php echo base_url(); ?>';
                     });
                  } else {
                     swal({
                        title: data.message,
                        allowOutsideClick: false,
                        confirmButtonText: "<?= $this->lang->line("ok") ?>",
                     }).then((result) => {
                        //location.reload();
                        location.href = '<?php echo base_url(); ?>';
                     });
                  }


               }
            });
         }
      });
   }

   $(window).on('load', function() {
    queueTrackingData('trackPageView', [document.location.href]);
    queueTrackingData('trackEvent', ['Page', 'View', 'LoginPopup']);
    queueTrackingData('trackEvent', ['Page', 'View', 'MyProfile']);

  })
</script>