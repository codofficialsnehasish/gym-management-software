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
         $("#consumerType").on('change', function(){ 
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
                        
                            },
                        success:function(response) {
                            $("#facilityType").append('<option value="">None</option>');
                            $.each(response , function(index, item) { 
                             $("#facilityType").append('<option value="'+item.id+'">'+item.facility_name+'</option>');
                        });
                        //  $('.spinner-border').hide();
                        }
                    });


        });



        ///////////////////////
        $("#facilityType").on('change', function(){ 
            $("#annual_cost").html('');
           const facilityType= $(this).val();
           const getUrl = window.location;
           const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/admin/";
                console.log(baseUrl);
                console.log(consumerType);
                    $.ajax({
                        url : baseUrl + "bidding-fees/get-annual-cost",
                        data:{facility_type : facilityType,csrf_modesy_token:getCookie('csrf_modesy_token')},
                        method:'post',
                        dataType:'json',
                        beforeSend: function(){
                        
                            },
                        success:function(response) {
                            $("#annual_cost").append('<option value="">None</option>');
                            $.each(response , function(index, item) { 
                             $("#annual_cost").append('<option value="'+item.id+'">'+item.cost_value+'</option>');
                        });
                        //  $('.spinner-border').hide();
                        }
                    });


        });
    });



</script>