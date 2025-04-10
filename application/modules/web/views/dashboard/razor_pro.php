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
<?php $displayCurrency = "INR"; 
$idd= $_SESSION['dataa']['id'];
?>

<script src="<?php echo base_url('assets/website_assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="shopping_order_id" id="shopping_order_id" value="<?= $pre_transaction_id ?>">
<input type="hidden" name="subscription" id="subscription" value="<?= $subscription ?>">
<input type="hidden" name="price" id="price_id" value="<?= $TXN_AMOUNT ?>">
<input type="hidden" name="movie_id" id="movie_id" value="<?= $movie_id ?>">
<input type="hidden" name="pro_id" id="pro_id" value="<?= $pro_id ?>">
<input type="hidden" name="validity" id="validity" value="<?= $validity ?>">

<script src="<?=base_url('assets/js/caches.js')?>"></script>
<script src="<?php echo base_url('assets/website_assets/js/checkout.js'); ?>"></script>

<script>
    async function removeCacheData(profilekey, video_id, callback = null) {
        try {
            var cache = await caches.open('appCache');
            var cachedResponse = await cache.match(profilekey);
            if (cachedResponse) {
            var cachedData = await cachedResponse.json();
            if (video_id != 'all') {
                cachedData.data.forEach((value, key) => {
                if (value != null) {
                    if (value.video_id == video_id) {
                    cachedData.data[key].is_deleted = 1;
                    }
                }
                });

                await cache.put(profilekey, new Response(JSON.stringify(cachedData)));
                if (callback != null) {
                callback(cachedData.data);
                }

            } else {
                await cache.delete(profilekey);
            }
            }
        } catch (err) {
            console.error('Error :', err);
        }
        }
    var rzp1; // Declare the Razorpay instance outside
    
    function initializeRazorpay() {
        var options = {
            "key": "<?= RAZOR_KEY ?>", // Enter the Key ID generated from the Dashboard
            "amount": "<?= $displayAmount ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "<?= TITLE ?>",
            "description": "Transaction",
            "image": "<?= LOGO ?>",
            "order_id": "<?= $razorpay_order_id ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function(response) {
                var url = "<?= base_url('/verify-payment-rental') ?>";
                var pre_transaction_id = document.getElementById("shopping_order_id").value;
                var subscription = document.getElementById("subscription").value;
                var price_id = document.getElementById("price_id").value;
                var razorpay_order_id = response.razorpay_order_id;
                var movie_id = document.getElementById("movie_id").value;
                var pro_id = document.getElementById("pro_id").value;
                var validity = document.getElementById("validity").value;

                $('.response').html('<div class="payment_loader"><img alt="loader" src="<?= base_url('assets/images/payment_loader.gif'); ?>" /></div>');
                jQuery.ajax({
                    url: "<?= base_url('verify-payment-rental') ?>",
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
                    success: async function(res) {
                        matomo('Subscription','PaymentStatus','Success');
                        await deleteAllMasterContentKeys();
                        await removeCacheData('contentDetail', 'all');
                        window.location = '<?= base_url('play-video?id='.$idd) ?>';
                    },
                    error: function(res) {
                        var subs = "<?= SUBSCRIPTION_CHECK ?? 0 ?>";
                        // if (subs==1) {
                        //     window.location = "<?//= base_url('upgrade-subscription') ?>";
                        // }else{
                        //     window.location = "<?//= base_url('subscription') ?>";
                        // }
                    }
                });
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
                "ondismiss": async function() {
                    matomo('Subscription','PaymentStatus','Dismissed');
                    await deleteAllMasterContentKeys();
                    await removeCacheData('contentDetail', 'all');
                    window.location = '<?= base_url('play-video?id='.$idd) ?>';
                }
            }
        };
        rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            matomo('Subscription','PaymentStatus','Failed');
            window.location = '<?= base_url('play-video?id='.$idd) ?>';
        });
    }

    window.onload = function() {
        if (!rzp1) {
            initializeRazorpay();
        }
        rzp1.open();
    }

    function matomo(user, type, title, geners = '') {
        $.ajax({
        type: 'POST',
        url: '<?= base_url('/web/Watchlist/add_to_watchlist') ?>',
        dataType: "json",
        data: {
            user: user,
            types: type, // Typo here, it should be type instead of types
            geners: geners,
            title: title
        },
        success: function(data) {
            if (data.status == 1) {

            }
        }
        });
    }
</script>
<div class='response'></div>
