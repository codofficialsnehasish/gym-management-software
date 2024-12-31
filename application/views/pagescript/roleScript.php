
        <!-- Sweet Alerts js -->
        <script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>

        <!-- Sweet alert init js-->
        <script src="<?= base_url('assets/js/pages/sweet-alerts.init.js');?>"></script>

		<script src="<?= base_url('assets/libs/select2/js/select2.min.js');?>"></script>

		<script src="<?= base_url('assets/js/pages/form-advanced.init.js');?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>
	$(document).ready(function(){
		const getUrl = window.location;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";

		$(document).on("change", "#role_id", function () {
			const roleid= $(this).val();
            $.ajax({
                url: base_url + "role-permission/get-permission",
                type: "post",
				data:{role_id : roleid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                dataType: "json",
                beforeSend: function() {
                    $('#permissionList').addClass('text-center');
                    $('#permissionList').html('<span class="spinner-border text-primary me-1" role="status" aria-hidden="true"></span>Loading...');
                },
                success: function (response) {
                    $('#permissionList').removeClass('text-center');
                    // console.log(response);
                    if (response.result == 1) {
                        $('#permissionList').html(response.html_content);
                    }else{
                        $('#permissionList').html('No Permission Available. Please Choose Valid Role');  
                    }
                }
        });
	});

    ////get permission by user
    $(document).on("change", "#user_id", function () {
			const userid= $(this).val();
            $("#roleId").html('');
            $.ajax({
                url: base_url + "role-permission/get-user-role",
                type: "post",
				data:{user_id : userid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                dataType: "json",
                beforeSend: function() {
                    $('#userPermissionList').addClass('text-center');
                    $('#userPermissionList').html('<span class="spinner-border text-primary me-1" role="status" aria-hidden="true"></span>Loading...');
                },
                success: function (response) {
                    $('#userPermissionList').removeClass('text-center');
                    // console.log(response);
                    if (response.result == 1) {
                        $('#userName').html(response.user_name);
                        $('#userPermissionList').html(response.html_content);
                        $("#roleId").append('<option value="0">Select</option>');
                        $.each(response.roleList , function(index, item) { 
                                $("#roleId").append('<option value="'+item.id+'">'+item.name+'</option>');
                            });
                    }else{
                        $('#userPermissionList').html('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Sorry!</strong> No Role Asign Yet. Please Choose Valid Role.</div>');  
                    }
                }
        });
	});




 ////submit asign role
 $(document).on("submit", "#asignRoleForm", function (event) {
            $('.roleBtn').prop("disabled", true);
            $('.roleBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            var form = $("#asignRoleForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "role-permission/user-role",
                type: "post",
                data: serializedData,
                dataType: "json",
                beforeSend: function() {
                   // showToast('info','','Processing Your Request');
                },
                success: function (response) {
                    clearTost();
                     console.log(response);
                    if (response.status == 1) {
                        getUserRole($('#user_id').val());
                            showToast('success','',response.msg); 
                            $('.roleBtn').prop("disabled", false);
                           $('.roleBtn').html('Asign Role');
                            
                    }else{
                           $('.roleBtn').prop("disabled", false);
                           $('.roleBtn').html('Asign Role');
                           let numbersArray = response.msg.split('\n');
                          $.each(numbersArray, function(index, value) { 
                          showToast('error','',value);
                        });
                    }
                }
        });
        event.preventDefault();

});




});



//////get user role
function getUserRole(userid){
    const getUrl = window.location;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";

   // const userid= $('#user_id').val();
            $("#roleId").html('');
            $.ajax({
                url: base_url + "role-permission/get-user-role",
                type: "post",
				data:{user_id : userid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                dataType: "json",
                beforeSend: function() {
                    $('#userPermissionList').addClass('text-center');
                    $('#userPermissionList').html('<span class="spinner-border text-primary me-1" role="status" aria-hidden="true"></span>Loading...');
                },
                success: function (response) {
                    $('#userPermissionList').removeClass('text-center');
                    // console.log(response);
                    if (response.result == 1) {
                        $('#userName').html(response.user_name);
                        $('#userPermissionList').html(response.html_content);
                        $("#roleId").append('<option value="0">Select</option>');
                        $.each(response.roleList , function(index, item) { 
                                $("#roleId").append('<option value="'+item.id+'">'+item.name+'</option>');
                            });
                    }else{
                        $('#userPermissionList').html('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Sorry!</strong> No Role Asign Yet. Please Choose Valid Role.</div>');  
                    }
                }
        });
}
/////check all
    function checkAll(ele,moduleId) {
     var checkboxes = document.getElementsByClassName('submodule' + moduleId);
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
 
 
 function checkAllModule(ele,moduleId) {
     var checkboxes = document.getElementsByClassName('module' + moduleId);
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
 
  
 function checkAllEntireModule(ele) {
     var checkboxes = document.getElementsByClassName('form-check-input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
</script>