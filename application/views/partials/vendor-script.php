<!-- JAVASCRIPT -->
<script src="<?= base_url('assets/libs/jquery/jquery.min.js');?>"></script>
<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js');?>"></script>
<script src="<?= base_url('assets/libs/simplebar/simplebar.min.js');?>"></script>
<script src="<?= base_url('assets/libs/node-waves/waves.min.js');?>"></script>

<!-- toast message -->
<script src="<?= base_url('assets/libs/toast/toastr.js');?>"></script>
<script src="<?= base_url('assets/js/pages/toastr.init.js');?>"></script>
<!-- toast message -->

<script src="<?= base_url('assets/libs/select2/js/select2.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/spectrum-colorpicker2/spectrum.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/pages/form-advanced.init.js'); ?>"></script>

 <?php PageSpecScript($pagescript);?>

 <?php $this->load->view('partials/_messages');?>    
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

</script>