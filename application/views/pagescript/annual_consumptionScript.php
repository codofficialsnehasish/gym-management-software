<script src="<?= base_url('assets/admin/libs/parsleyjs/parsley.min.js');?>"></script>

<script src="<?= base_url('assets/admin/js/pages/form-validation.init.js');?>"></script>
        <!--tinymce js-->

<script src="<?= base_url('assets/admin/libs/select2/js/select2.min.js');?>"></script>
<script src="<?= base_url('assets/admin/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js');?>"></script>
        <!-- init js -->
<script src="<?= base_url('assets/admin/js/pages/form-editor.init.js');?>"></script>
<script src="<?= base_url('assets/admin/js/pages/form-advanced.init.js');?>"></script>
           <!-- Sweet Alerts js -->
 <script src="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.min.js');?>"></script>

<!-- Sweet alert init js-->
<script src="<?= base_url('assets/admin/js/pages/sweet-alerts.init.js');?>"></script>     

<script>
   $(document).ready(function() {
         $("#consumerType").on('change', function(){ // 1st way
            $("#facilityType").html('');
           const consumerType= $(this).val();
           const getUrl = window.location;
           const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/admin/";
                console.log(baseUrl);
                console.log(consumerType);
                    $.ajax({
                        url : baseUrl + "solutions-facility-map/get-facility-list",
                        data:{consumer_type : consumerType,csrf_modesy_token:getCookie('csrf_modesy_token')},
                        method:'post',
                        dataType:'json',
                        beforeSend: function(){
                        
                        // $("#respon").append('<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>');
           //   $("#facilityType").append('<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>');
                            },
                        success:function(response) {
                        //   $('#fullscreenModal').modal('show');
                        // if(consumerType==2){
                        //     $('#auc').show();
                        // }else{
                        //     $('#auc').hide();
                        // }
                            $("#facilityType").append('<option value="">None</option>');
                            $.each(response , function(index, item) { 
                             $("#facilityType").append('<option value="'+item.id+'">'+item.facility_name+'</option>');
                        //  $("#respon").append('<img id="'+item.media_id+'"  class="img-thumbnail rounded me-2 mediaImg" alt="100x100" width="100" style="max-width: 100px;margin-bottom: 15px;" src="'+base_url+item.media_img_url+'" data-holder-rendered="true">');
                        });
                        //  $('.spinner-border').hide();
                        }
                    });


        });
    });



</script>