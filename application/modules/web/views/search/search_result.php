<style>
  .item_deatils{
    display:flex;
    flex-wrap:wrap;
  }
  .item_deatils .cardDetails{
    width:24%;
    margin-right:10px;
    position:relative;
  }
  .cardDetails:hover{
    z-index:9;
  }
  @media only screen and (min-width: 2500px){
.card__header {
    height: calc(21vw * 0.567);
}
.search_ht{
  margin-top:120px !important;
}
}

   @media only screen and (min-width: 1400px){
    .item_deatils .cardDetails{
    width:19%;
    margin-right:7px;
  }
  }
  @media(min-width:991px) and (max-width:1399px){
   .item_deatils .cardDetails{
    width:19%;
    margin-right:7px;
  }
  }
   @media(min-width:600px) and (max-width:900px){
   .item_deatils .cardDetails{
    width:32%;
    margin-right:7px;
  }
  }
  @media(min-width:320px) and (max-width:599px){
   .item_deatils .cardDetails{
    width:47%;
    margin-right:7px;
  }
  }

  </style>

<?php  if(!empty($search_data['data'])){?>
  <?php if(APP_ID==10){ ?>
   
    <section class=" mb-5  foooter " style="margin-top: 100px">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="ms-3">
          <h4 class="defaultColr mt-1 mb-2 ms-3"><?= $this->lang->line('search_data')?></h4>
        
          </div>
        </div>
        <div class="item_deatils mx-3 w-100" >
          <?php foreach ($search_data['data'] as $data) {
            $id = aes_cbc_encryption_($data['id']);
            $type_id = aes_cbc_encryption_($data['type_id']);
            $main_id = 0;
          ?>
          <?php }?>
        </div>
      </div>    
    </section>
  <?php }else{ 
    $searchQuery = htmlspecialchars($_GET['q']);
    $count=count($search_data['data']);
    ?>
    <section class=" mb-5 foooter search_ht" style="margin-top: 100px">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="ms-3">
          <h4 class="defaultColr mt-1 mb-2 ms-3">Showing result for : "<?= $searchQuery ?>"</h4>
          <h5 class="defaultColr mt-1 mb-2 ms-3">(<?= $count ?> results)</h5>
          </div>
        </div>
        <div class="item_deatils mx-3 w-100" >
          <?php foreach ($search_data['data'] as $data) { 
            $id = aes_cbc_encryption_($data['id']);
            $type_id = aes_cbc_encryption_($data['type_id']);
          ?>
              <div class="cardDetails mt-4 ">
              <?php if($this->session->id && $data['is_purchased'] == 1){?>
                  <a href="<?= base_url('play-video?id='.$id.'&&type_id='.$type_id);?>">
              <?php } else if(empty($this->session->id && $data['is_purchased'] == 0)){?>
                       <a href="<?= base_url('play-video?id='.$id.'&&type_id='.$type_id);?>">
              <?php 
            }
            else{?>
                <a href="<?= base_url('/user-login')?>">
              <?php }?>
                    <div class="card__header card_big_image">
                      <img src="<?= $data['movie_poster_url']; ?>" class="position-relative banner_image" alt="poster url">
                    </div>
                    <div class="card_youtube p-2">
                      <div class="user_g">
                        <div class="user__info_youtube">
                          <h5 class="mt-1 m-0"><?= $data['title']; ?></h5>
                          <p class="date_formate"><?= $data['description']; ?></p>
                          <!-- <small>1 month ago</small> -->
                        </div>
                      </div>
                    </div>
                  </a>
              </div>
            <!-- </div> -->
          <?php }?>
        </div>
      </div>    
    </section>



  <?php } ?>
<?php }else{?>
<section class="mb-5 foooter" style="margin-top:110px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6 m-auto text-center watchListNo">
        <img src="<?= base_url('assets/images/no_data.png'); ?>" class="img-fluid" alt="no data found">
        <h5 class="m-0 text-center text-white"><?= NoDataFound; ?></h5>
        <p class="mb-0 text_ac"><?= NoListFound; ?></p>
     </div>
   </div>
 </div>
</section>
<?php }?>
<script>
    $(document).ready(function () {
        // Function to go back to the last page
        function goBack() {
            window.history.back();
        }

        // Attach click event to the button
        $('#backButton').on('click', goBack);
        $('#backButton').hover(
        function () {
            $(this).css('transform', 'scale(1.2)');
        },
        function () {
            $(this).css('transform', 'scale(1)');
        }
    );
    });
</script>