        <!-- Required datatable js -->
        <script src="<?= base_url('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
        <!-- Buttons examples -->
        <script src="<?= base_url('assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/jszip/jszip.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/pdfmake/build/pdfmake.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/pdfmake/build/vfs_fonts.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js');?>"></script>
        <!-- Responsive examples -->
        <script src="<?= base_url('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js');?>"></script>

        <!-- Datatable init js -->
        <script src="<?= base_url('assets/admin/js/pages/datatables.init.js');?>"></script> 
        <!-- Sweet Alerts js -->
        <script src="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.min.js');?>"></script>

        <!-- Sweet alert init js-->
        <script src="<?= base_url('assets/admin/js/pages/sweet-alerts.init.js');?>"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>
	$(document).ready(function(){
		$("#post_list" ).sortable({
			placeholder : "ui-state-highlight",
			update  : function(event, ui)
			{
				var post_order_ids = new Array();
				$('#post_list li').each(function(){
					post_order_ids.push($(this).data("post-id"));
				});
                $(".alert-success").hide();
				$.ajax({
					url:"<?= admin_url('questions/update-question-order')?>",
					method:"POST",
					data:{post_order_ids:post_order_ids},
					success:function(data)
					{
					 if(data){
						$('#post_list').html(data);
					 	$(".alert-danger").hide();
					 	$(".alert-success").show();
                        $(".alert-success").fadeOut(5000);
					 }else{
					 	$(".alert-success").hide();
					 	$(".alert-danger").show();
					 }
					}
				});
			}
		});
		
		
		
	
         $("#ques_id").on('change', function(){ // 1st way
            $("#opt_id").html('');
            $("#sub_opt_id").html('');
              const ques_id= $(this).val();
              const getUrl = window.location;
              const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/admin/";
                console.log(baseUrl);
               // console.log(cat_id);
                    $.ajax({
                        url : baseUrl + "riskprofile/get-options",
                        data:{ques_id : ques_id,csrf_modesy_token:getCookie('csrf_modesy_token')},
                        method:'post',
                        dataType:'json',
                        beforeSend: function(){
                            $("#opt_id").append('<option value="">Loading...</option>');
                        // <div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>
                        // $("#respon").append('<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>');
           //   $("#subcat_id").append('<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>');
                            },
                        success:function(response) {
                             $("#opt_id").html('');
                              $("#sub_opt_id").html('None');
                            $("#opt_id").append('<option value="">None</option>');
                            $.each(response , function(index, item) { 
                             $("#opt_id").append('<option value="'+item.opt_id+'">'+item.opt_name+'</option>');
                        });
                        //  $('.spinner-border').hide();
                        }
                    });


        });


         $("#opt_id").on('change', function(){ // 1st way
            $("#sub_opt_id").html('');
              const opt_id= $(this).val();
              const getUrl = window.location;
              const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/admin/";
                console.log(baseUrl);
               // console.log(cat_id);
                    $.ajax({
                        url : baseUrl + "riskprofile/get-sub-options",
                        data:{parent_id : opt_id,csrf_modesy_token:getCookie('csrf_modesy_token')},
                        method:'post',
                        dataType:'json',
                        beforeSend: function(){
                            $("#sub_opt_id").append('<option value="">Loading...</option>');
                        // <div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>
                            },
                        success:function(response) {
                             $("#sub_opt_id").html('');
                            $("#sub_opt_id").append('<option value="">None</option>');
                            $.each(response , function(index, item) { 
                             $("#sub_opt_id").append('<option value="'+item.opt_id+'">'+item.opt_name+'</option>');
                        });
                        //  $('.spinner-border').hide();
                        }
                    });


        });

		
		
		
	});
</script>