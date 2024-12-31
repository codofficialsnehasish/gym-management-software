        <!-- Required datatable js -->
        <script src="<?= base_url('assets/libs/datatables.net/js/jquery.dataTables.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
        <!-- Buttons examples -->
        <script src="<?= base_url('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/jszip/jszip.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/pdfmake/build/pdfmake.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/pdfmake/build/vfs_fonts.js');?>"></script>
        <script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js');?>"></script>
        <!-- Responsive examples -->
        <script src="<?= base_url('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js');?>"></script>

        <!-- Datatable init js -->
        <script src="<?= base_url('assets/js/pages/datatables.init.js');?>"></script> 
        <!-- Sweet Alerts js -->
        <script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>
        <!-- Sweet alert init js-->
        <script src="<?= base_url('assets/js/pages/sweet-alerts.init.js');?>"></script>
		<script src="<?= base_url('assets/js/pages/form-advanced.init.js');?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="<?= base_url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js');?>"></script>
        <script src="<?= base_url('assets/js/pages/form-validation.init.js');?>"></script>

         <script src="<?= base_url('assets/libs/dropzone/min/dropzone.min.js');?>"></script>
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
	});
</script>

<script>
    $(document).ready(function() {
        // When the 'Assign Member' button is clicked
        $('#assign').on('click',function() {
            alert('clicked');
            // Get item id and members list from data attributes
            var itemId = $(this).data('id');
            var membersList = $(this).data('members');

            // Set the item ID (you can use this for backend processing)
            $('#item-id').val(itemId); // Make sure you have an element with ID 'item-id' in your form

            // Get the select dropdown
            var membersSelect = $('#members-select');

            // Clear existing options
            membersSelect.empty();

            // Add members dynamically to the select dropdown
            $.each(membersList, function(index, member) {
                membersSelect.append($('<option>', {
                    value: member.id, // Assuming each member has an 'id' field
                    text: member.full_name // Assuming each member has a 'full_name' field
                }));
            });
        });
    });

</script>