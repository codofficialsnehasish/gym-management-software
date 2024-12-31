<script src="<?= base_url('assets/libs/parsleyjs/parsley.min.js');?>"></script>

<script src="<?= base_url('assets/js/pages/form-validation.init.js');?>"></script>
        <!--tinymce js-->

<script src="<?= base_url('assets/libs/select2/js/select2.min.js');?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js');?>"></script>
        <!-- init js -->
<script src="<?= base_url('assets/js/pages/form-editor.init.js');?>"></script>
<script src="<?= base_url('assets/js/pages/form-advanced.init.js');?>"></script>
           <!-- Sweet Alerts js -->
 <script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>

<!-- Sweet alert init js-->
<script src="<?= base_url('assets/js/pages/sweet-alerts.init.js');?>"></script>     
<script>
  // function saveBooking(id){
  //     $('#'+id).removeClass('active');
  //     console.log(id);
  //     $('#'+id).addClass('active');
  // }
  $(document).on("click", ".time", function(e) {
    var listItems = $(".time");
    // console.log(listItems.length); 
    for (let i = 0; i < listItems.length; i++) {
      listItems[i].classList.remove("active");
    }
    this.classList.add("active");
    $('#slot_id').val(this.id);
    let slotDate = $('#hdn_date' + this.id).val();
    // console.log(slotDate);
    $('#slot_date').val(slotDate);
    $('.invalid-tooltip').removeClass('d-block');
  });

  $(document).ready(function() {
    $(".step2").submit(function(event) {
      // event.preventDefault();
      if ($('#slot_id').val() == "") {
        $('.invalid-tooltip').addClass('d-block');
        return false;
      } else {
        $('.invalid-tooltip').removeClass('d-block');
        return true;
      }
    });
    $(document).on("click", ".next,.prev", function(e) {
      let nextdate = this.id;
    //  alert(nextdate);
      $.ajax({
        type: 'POST',
        url: ' <?= base_url('admin/virtual-energy-audit/getnext-date/'); ?> ',
        data : {
          next_date: nextdate,
          id:$('#energy_id').val(),
          csrf_modesy_token: getCookie('csrf_modesy_token')
        },
        dataType: "html",
        beforeSend: function() {
            $('.loading').attr('style','display: flex !important;');
				$('.loading').show();
        },
        success: function(response) {
           $('.custom_calender_container').html(response);
           $('.loading').fadeOut("slow");
        }
      });
    });
  });
</script>