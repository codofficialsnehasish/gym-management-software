<!-- <link href="<?= base_url('assets/admin/libs/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css">
 --><script src="<?= base_url('assets/admin/libs/parsleyjs/parsley.min.js');?>"></script>
<script src="<?= base_url('assets/admin/js/pages/form-validation.init.js');?>"></script>
 <!--tinymce js-->
<script src="<?= base_url('assets/admin/libs/tinymce/tinymce.min.js');?>"></script>
<script src="<?= base_url('assets/admin/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js');?>"></script>
<!-- init js -->
<script src="<?= base_url('assets/admin/js/pages/form-editor.init.js');?>"></script>
<script src="<?= base_url('assets/admin/js/pages/form-advanced.init.js');?>"></script>
 <script src="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- Sweet alert init js-->
<script src="<?= base_url('assets/admin/js/pages/sweet-alerts.init.js');?>"></script>

<script>
    $(document).ready(function() {
         $("#cat_id").on('change', function(){ // 1st way
            $("#subcat_id").html('');
           const cat_id= $(this).val();
           const getUrl = window.location;
           const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/admin/";
                console.log(baseUrl);
                console.log(cat_id);
                    $.ajax({
                        url : baseUrl + "services/get-subcategory",
                        data:{catId : cat_id,csrf_modesy_token:getCookie('csrf_modesy_token')},
                        method:'post',
                        dataType:'json',
                        beforeSend: function(){
                        
                        // $("#respon").append('<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>');
           //   $("#subcat_id").append('<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>');
                            },
                        success:function(response) {
                        //   $('#fullscreenModal').modal('show');
                        // if(cat_id==2){
                        //     $('#auc').show();
                        // }else{
                        //     $('#auc').hide();
                        // }
                            $("#subcat_id").append('<option value="">None</option>');
                            $.each(response , function(index, item) { 
                             $("#subcat_id").append('<option value="'+item.cat_id+'">'+item.cat_name+'</option>');
                        //  $("#respon").append('<img id="'+item.media_id+'"  class="img-thumbnail rounded me-2 mediaImg" alt="100x100" width="100" style="max-width: 100px;margin-bottom: 15px;" src="'+base_url+item.media_img_url+'" data-holder-rendered="true">');
                        });
                        //  $('.spinner-border').hide();
                        }
                    });


        });
    });
    </script>