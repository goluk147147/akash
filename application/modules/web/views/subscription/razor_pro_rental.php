<style>
    .payment_loader {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999999;
        width: 100%;
        height: 100%;
        /* display: none; */
        background: #000;
    }

    .payment_loader img {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100px;
        height: 100px;
        margin: auto auto;
        transform: translate(-50%, -50%);
        position: absolute;
        top: 50%;
        left: 50%;
    }
</style>
<?php $displayCurrency = "INR"; ?>

<script src="<?php echo base_url('assets/website_assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>
<input type="hidden" name="shopping_order_id" id="shopping_order_id" value="<?= $pre_transaction_id ?>">
<input type="hidden" name="subscription" id="subscription" value="<?= $subscription ?>">
<input type="hidden" name="price" id="price_id" value="<?= $TXN_AMOUNT ?>">
<input type="hidden" name="movie_id" id="movie_id" value="<?= $movie_id ?>">
<input type="hidden" name="pro_id" id="pro_id" value="<?= $pro_id ?>">
<input type="hidden" name="validity" id="validity" value="<?= $validity ?>">

<script src="<?php echo base_url('assets/website_assets/js/checkout.js'); ?>"></script>
<?php
$is_rental_video = "NO"; 
if(isset($is_rental_video) && $is_rental_video == true){
    $is_rental_video = "YES";
}
?>
<script>
    var rzp1; // Declare the Razorpay instance globally
    function initializeRazorpay() {
        var options = {
            "key": "<?= RAZOR_KEY ?>", // Enter the Key ID generated from the Dashboard
            "amount": "<?= $displayAmount ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "<?= TITLE ?>",
            "description": "Transaction",
            "image": "<?= LOGO ?>",
            "order_id": "<?= $razorpay_order_id ?>", // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function(response) {
                var url = "<?= base_url('/verify-payment') ?>";
                var pre_transaction_id = document.getElementById("shopping_order_id").value;
                var subscription = document.getElementById("subscription").value;
                var price_id = document.getElementById("price_id").value;
                var razorpay_order_id = response.razorpay_order_id;
                var movie_id = document.getElementById("movie_id").value;
                var pro_id = document.getElementById("pro_id").value;
                var validity = document.getElementById("validity").value;
                "<?php $this->session->set_userdata('payment_success',true); ?>"
                $('.response').html('<div class="payment_loader"><img alt="loader" src="<?= base_url('assets/images/payment_loader.gif'); ?>" /></div>');
                try{
                    jQuery.ajax({
                        url: "<?= base_url('verify-payment') ?>",
                        type: 'post',
                        data: {
                            razorpay_order_id: razorpay_order_id,
                            pre_transaction_id: pre_transaction_id,
                            price_id: price_id,
                            subscription: subscription,
                            movie_id: movie_id,
                            pro_id: pro_id,
                            validity: validity
                        },
                        dataType: 'json',
                        success: function(res) {
                            matomo_hit('Success');   
                            deleteAllMasterContentKeys();
                            removeCacheData('contentDetail','all');
                            <?php
                                $this->session->set_flashdata('msg_status', "200");
                                $this->session->set_flashdata('toast_msg', 'Transaction successfully completed.');
                            ?>
                            window.location = '<?= base_url('play-video?id=').$show_id ?>';
                        },
                        error: function(res) {
                            <?php
                              $this->session->set_flashdata('msg_status', "400");
                              $this->session->set_flashdata('toast_msg', 'Transaction Failed');
                            ?>
                            window.location = '<?= base_url('play-video?id=').$show_id ?>';
                            // var subs = "<?//= SUBSCRIPTION_CHECK ?? 0 ?>";
                            // if (subs==1) {
                            //     window.location = "<?//= base_url('upgrade-subscription') ?>";
                            // } else {
                            //     window.location = "<?//= base_url('subscription') ?>";
                            // }
                        }
                    });
                } catch(e){
                    window.location = '<?= base_url('play-video?id=').$show_id ?>';
                }
                
            },
            "prefill": {
                "name": "<?= $this->session->userdata('name') ?>",
                "email": "<?= $this->session->userdata('email') ?>",
                "contact": "<?= $this->session->userdata('mobile') ?>"
            },
            "notes": {
                "address": ""
            },
            "theme": {
                "color": "#3399cc"
            },
            "modal": {
                "ondismiss": function() {
                    matomo_hit('Failed');
                    <?php
                        $this->session->set_flashdata('msg_status', "400");
                        $this->session->set_flashdata('toast_msg', 'Transaction canceled');
                    ?>
                    window.location = '<?= base_url('play-video?id=').$show_id ?>';
                    // var redirectUrl = '<?//= base_url('/verify-payment') ?>';
                    // window.location.replace(redirectUrl);
                }
            }
        };
        rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            // Handle payment failure here
            matomo_hit('Failed');
            <?php
                $this->session->set_flashdata('msg_status', "400");
                $this->session->set_flashdata('toast_msg', 'Transaction Failed');
            ?>
            "<?php $this->session->set_userdata('payment_failed',true); ?>"
            // var redirectUrl = '<?//= base_url('/verify-payment') ?>';
            window.location = '<?= base_url('play-video?id=').$show_id ?>';
            // window.location.replace(redirectUrl);
            console.log(response.error.description);
        });
        rzp1.open();
    }

    window.onload = function() {
        if (!rzp1) {
            initializeRazorpay(); // Ensure initialization happens once
        }
        
    }
    function matomo_hit(title) {
    var url = '<?= base_url("/web/Home/matomo_hit"); ?>';
    $.ajax({
      url: url,
      type: "POST",
      dataType: "json",
      async: "true",
      data: {
        user: 'Subscription',
        types: 'PaymentStatus', // Typo here, it should be type instead of types
        type: 5,
        title: title
      },
      success: function(data) {
        // console.log("Data: ", data);
      },
      error: function(xhr, status, error) {
        //  console.error("Error: " + error);
      }
    });
  }
</script>

<div class='response'></div>
