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
		<script src="<?= base_url('assets/admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>"></script>
        <!-- Datatable init js -->
        <script src="<?= base_url('assets/admin/js/pages/datatables.init.js');?>"></script> 
        <!-- Sweet Alerts js -->
        <script src="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.min.js');?>"></script>

        <!-- Sweet alert init js-->
        <script src="<?= base_url('assets/admin/js/pages/sweet-alerts.init.js');?>"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>
    const getUrl = window.location;
    const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";

	$(document).ready(function(){
        
	});

	function set_payment(id){
	const amount=$('#amount_' + id).val();
	//const pack=$('#package_' + id).val();
	const paydate=$('#pay_date_' + id).val();
	$.ajax({
		url:'<?= base_url('admin/technicians/set-payment/')?>',
		type:'POST',
		data:{user_id:id,pay_amount:amount,pay_date:paydate,csrf_modesy_token:getCookie('csrf_modesy_token')},
		dataType:'html',
		beforeSend: function() {
		$('#btn_' + id).hide();
		$('#res_' + id).html('<i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i>');
		},
		success:function(response){
		if(response==1){
		$('#res_' + id).attr('style', 'color:green');
		$('#res_' + id).html('Paid Successfully');
		let seconds = 5;  
        $("#dvCountDown_" + id).show();  
        $("#lblCount_" + id).html(seconds);  
        setInterval(function () {  
            seconds--;  
            $("#lblCount_" + id).html(seconds);  
            if (seconds == 0) {  
                $("#dvCountDown_" + id).hide();  
                window.location = "<?= current_url();?>";  
            }  
        }, 1000);  

		}else{
		$('#btn_' + id).show();	
		$('#res_' + id).attr('style', 'color:red');
		$('#res_' + id).html('Please fill all the details');
		return true;

		 }
		}
		
		});
}

function set_subscription(id){
	const samount=$('#samount_' + id).val();
	const pack=$('#package_' + id).val();
	const spaydate=$('#spay_date_' + id).val();
	$.ajax({
		url:'<?= base_url('admin/technicians/set-subscription/')?>',
		type:'POST',
		data:{user_id:id,subscribed_amount:samount,package:pack,subscribed_on:spaydate,csrf_modesy_token:getCookie('csrf_modesy_token')},
		dataType:'html',
		beforeSend: function() {
		$('#sbtn_' + id).hide();
		$('#sres_' + id).html('<i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i>');
		},
		success:function(response){
		if(response==1){
		$('#sres_' + id).attr('style', 'color:green');
		$('#sres_' + id).html('Subscription fees paid Successfully');
		let seconds = 5;  
        $("#sdvCountDown_" + id).show();  
        $("#slblCount_" + id).html(seconds);  
        setInterval(function () {  
            seconds--;  
            $("#slblCount_" + id).html(seconds);  
            if (seconds == 0) {  
                $("#sdvCountDown_" + id).hide();  
                window.location = "<?= current_url();?>";  
            }  
        }, 1000);  

		}else{
		$('#sbtn_' + id).show();	
		$('#sres_' + id).attr('style', 'color:red');
		$('#sres_' + id).html('Please fill all the details');
		return true;

		 }
		}
		
		});
}
function set_register(id){
	const register=$('#register_date_' + id).val();
	$.ajax({
		url:'<?= base_url('admin/technicians/set-register/')?>',
		type:'POST',
		data:{user_id:id,register_date:register,csrf_modesy_token:getCookie('csrf_modesy_token')},
		dataType:'html',
		beforeSend: function() {
		$('#regrbtn_' + id).hide();
		$('#regrres_' + id).html('<i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i>');
		},
		success:function(response){
		if(response==1){
		$('#regrres_' + id).attr('style', 'color:green');
		$('#regrres_' + id).html('Registered Successfully');
		let seconds = 5;  
        $("#regrdvCountDown_" + id).show();  
        $("#regrlblCount_" + id).html(seconds);  
        setInterval(function () {  
            seconds--;  
            $("#regrlblCount_" + id).html(seconds);  
            if (seconds == 0) {  
                $("#regrdvCountDown_" + id).hide();  
                window.location = "<?= current_url();?>";  
            }  
        }, 1000);  

		}else{
		$('#regrbtn_' + id).show();	
		$('#regrres_' + id).attr('style', 'color:red');
		$('#regrres_' + id).html('Please fill register date');
		return true;

		 }
		}
		
		});
}

////////////////////////////////////////
function set_subscribed(id){
	const subscribed=$('#subscribed_date_' + id).val();
	$.ajax({
		url:'<?= base_url('admin/technicians/set-subscribed/')?>',
		type:'POST',
		data:{user_id:id,subscribed_on:subscribed,csrf_modesy_token:getCookie('csrf_modesy_token')},
		dataType:'html',
		beforeSend: function() {
		$('#subscredbtn_' + id).hide();
		$('#subscredres_' + id).html('<i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i>');
		},
		success:function(response){
		if(response==1){
		$('#subscredres_' + id).attr('style', 'color:green');
		$('#subscredres_' + id).html('Subscribed Successfully');
		let seconds = 5;  
        $("#subscreddvCountDown_" + id).show();  
        $("#subscredlblCount_" + id).html(seconds);  
        setInterval(function () {  
            seconds--;  
            $("#subscredlblCount_" + id).html(seconds);  
            if (seconds == 0) {  
                $("#subscreddvCountDown_" + id).hide();  
                window.location = "<?= current_url();?>";  
            }  
        }, 1000);  

		}else{
		$('#subscredbtn_' + id).show();	
		$('#subscredres_' + id).attr('style', 'color:red');
		$('#subscredres_' + id).html('Please fill subscription date');
		return true;

		 }
		}
		
		});
}



function set_status(id){
	const techstatus=$('#techstatus_' + id).val();
	$.ajax({
		url:'<?= base_url('admin/technicians/set-status/')?>',
		type:'POST',
		data:{user_id:id,tech_status:techstatus,csrf_modesy_token:getCookie('csrf_modesy_token')},
		dataType:'html',
		beforeSend: function() {
		$('#stsbtn_' + id).hide();
		$('#stsres_' + id).html('<i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i>');
		},
		success:function(response){
		if(response==1){
		$('#stsres_' + id).attr('style', 'color:green');
		$('#stsres_' + id).html('Status Changed Successfully');
		let seconds = 5;  
        $("#stsdvCountDown_" + id).show();  
        $("#stslblCount_" + id).html(seconds);  
        setInterval(function () {  
            seconds--;  
            $("#stslblCount_" + id).html(seconds);  
            if (seconds == 0) {  
                $("#stsdvCountDown_" + id).hide();  
                window.location = "<?= current_url();?>";  
            }  
        }, 1000);  

		}else{
		$('#stsbtn_' + id).show();	
		$('#stsres_' + id).attr('style', 'color:red');
		$('#stsres_' + id).html('Please Slect status');
		return true;

		 }
		}
		
		});
}

function shwcc(){
		var myOffcanvas = document.getElementById('offcanvasExample')
        var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
        bsOffcanvas.show();
	}


function gettechnicianDetails(usderid,type){
	const getUrl = window.location;
      const base_url = getUrl.protocol + "//" + getUrl.host + "/akdts/admin/technicians/" ;
      $.ajax({
          url : base_url + "getSingleTechnician",
          data:{user_id : usderid,type:type,csrf_modesy_token:getCookie('csrf_modesy_token')},
          method:'post',
          dataType:'json',
          beforeSend: function(){
          
          },
          success:function(response) {
            shwcc();
             $('#offcanvasExample').html(response.html_content);
             console.log(response.html_content);
          }
      });
}


function getCustomerDetails(usderid){
	const getUrl = window.location;
      const base_url = getUrl.protocol + "//" + getUrl.host + "/akdts/admin/technicians/" ;
      $.ajax({
          url : base_url + "getSingleCustomer",
          data:{user_id : usderid,csrf_modesy_token:getCookie('csrf_modesy_token')},
          method:'post',
          dataType:'json',
          beforeSend: function(){
          
          },
          success:function(response) {
            shwcc();
             $('#offcanvasExample').html(response.html_content);
             console.log(response.html_content);
          }
      });
}




//////////////Set head technician
function set_headtechnician(id){
	const setas= $("input[name='set_as']:checked").val();
	$.ajax({
		url:'<?= base_url('admin/dashboard/set-head-technician/')?>',
		type:'POST',
		data:{user_id:id,set_as:setas},
		dataType:'json',
		beforeSend: function() {
		$('#hbtn_' + id).hide();
		$('#hres_' + id).html('<i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i>');
		},
		success:function(response){
		if(response.status==1){
		$('#hres_' + id).attr('style', 'color:green');
		$('#hres_' + id).html(response.msg);
		let seconds = 5;  
        $("#hdvCountDown_" + id).show();  
        $("#hlblCount_" + id).html(seconds);  
        setInterval(function () {  
            seconds--;  
            $("#hlblCount_" + id).html(seconds);  
            if (seconds == 0) {  
                $("#hdvCountDown_" + id).hide();  
                window.location = "<?= current_url();?>";  
            }  
        }, 1000);  

		}else if(response.status==0){
		$('#hbtn_' + id).show();	
		$('#hres_' + id).attr('style', 'color:red');
		$('#hres_' + id).html(response.msg);
		return true;
		 }else if(response.status==2){
		$('#hbtn_' + id).show();	
		$('#hres_' + id).attr('style', 'color:red');
		$('#hres_' + id).html(response.msg);
		 }else{
		$('#hbtn_' + id).show();	
		$('#hres_' + id).attr('style', 'color:red');
		$('#hres_' + id).html(response.msg);
		 }
		}
		
		});
}

</script>