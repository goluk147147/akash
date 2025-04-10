

$(document).ready(function() {
 $(".log_web").click(function() {
  var e = $(this).attr("url");
  $("#WEB_URL").val(e)
 }), $(".custom-fa-fa").click(function() {
  $(".Navbar__Items--right").toggle(100), $(".Navbar__Items").attr("style", "display: block !important")
 })
});


