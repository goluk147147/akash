<!-- main style -->
<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/main.css'); ?>">
<!-- custom style -->
<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/custom.css'); ?>">
<script src="<?php echo base_url('assets/website_assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url('assets/js/cache.js') ?>"></script>

<?php //pre($this->session->userdata()); 
$sess_token = base64_encode(json_encode($_SESSION));
?>
<div id="overlayonajaxhit" class="payment_loader2">
  <div class="cv-spinner">
    <span class="spinner"><span class="loader_spn"></span></span>
  </div>
</div>
<script> 
    $('#overlayonajaxhit').show(); 
</script>
<form name="sdklaunch" id="sdklaunch" action="<?= BILLDESK_URL; ?>" method="POST">
    <input type="" id="bdorderid" name="bdorderid" value="<?= $bdorderid ?>">
    <input type="" id="merchantid" name="merchantid" value="<?= BILLDESK_MERCHANT_ID ?>">
    <input type="" id="rdata" name="rdata" value="<?= $rdata ?>">
    <input name='submit' class="payment_submit" type='submit' value='Complete your Payment' />
</form>
<script> 
    localStorage.setItem('pb_session', "<?= $sess_token; ?>");
    $('.payment_submit').click(); 
</script>

