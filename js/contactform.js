$(document).ready(function() {
$("#ajax-contact-form").submit(function() {
var str = $(this).serialize();

$.ajax({
type: "POST",
url: "contact.php",
data: str,
success: function(msg) {

if(msg == 'OK') {
result = '<div class="notification_ok">Your message has been successfully sent!</div>';
$("#fields").hide();
} else {
result = msg;
}
$('#note').html(result).fadeIn().delay(3000).fadeOut("slow");

$(".btn").on( "click", function() {

$.when( effect() ).done(function() {

});
});
}
});
return false;
});
});