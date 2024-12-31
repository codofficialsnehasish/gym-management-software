<script>
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


$(document).on("click", "#basic-default-password2", function (event) {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    $('.vv').removeClass('mdi-eye-off');
    $('.vv').addClass('mdi-eye-outline');
  } else {
    x.type = "password";
    $('.vv').addClass('mdi-eye-off');
    $('.vv').removeClass('mdi-eye-outline');

  }
});

$( "#password" ).on( "focus", function() {
  $('#basic-default-password2').prop('style','border: 1px solid #626ed4');
} );
$( "#password" ).on( "focusout", function() {
    focusout++;
    $('#basic-default-password2').prop( 'style', "border: 1px solid #d9dee3;" );
  } ).on( "blur", function() {
    $('#basic-default-password2').prop( 'style', "border: 1px solid #d9dee3;" );
  } );
<?= get_custom_javascript();?>
</script>