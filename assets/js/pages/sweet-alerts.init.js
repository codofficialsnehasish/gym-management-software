function confirmDelete(val, returnUrl) {
    const getUrl = window.location;
    // if (getUrl.host == 'localhost') {
    //         callBcak = "/admin/" + returnUrl;
    // } else {
    //         callBcak = "/" + returnUrl;
    // }
    const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" + returnUrl + "/";
    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
            if (result.isConfirmed) {
                    $.ajax({
                            url: baseUrl + "delete/",
                            type: "POST",
                            data: {
                                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                                    id: val
                            },
                            dataType: "html",
                            success: function () {
                                    Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                    ).then((e) => {
                                            window.location.href = baseUrl;
                                    })
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                    swal("Error deleting!", "Please try again", "error");
                            }
                    });

            }
    })

}

function confirmDeleteRole(val,userid) {
        const getUrl = window.location;
        // if (getUrl.host == 'localhost') {
        //         callBcak = "/admin/" + returnUrl;
        // } else {
        //         callBcak = "/" + returnUrl;
        // }
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/role-permission/";
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                                url: baseUrl + "user-role-delete/",
                                type: "POST",
                                data: {
                                        csrf_modesy_token: getCookie('csrf_modesy_token'),
                                        id: val
                                },
                                dataType: "html",
                                success: function () {
                                        Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                        ).then((e) => {
                                                getUserRole(userid);
                                                // $.ajax({
                                                //         url: baseUrl + "get-user-role",
                                                //         type: "post",
                                                //         data:{user_id : userid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                                                //         dataType: "json",
                                                //         beforeSend: function() {
                                                //             $('#userPermissionList').addClass('text-center');
                                                //             $('#userPermissionList').html('<span class="spinner-border text-primary me-1" role="status" aria-hidden="true"></span>Loading...');
                                                //         },
                                                //         success: function (response) {
                                                //                 $("#roleId").html('');
                                                //             $('#userPermissionList').removeClass('text-center');
                                                //             // console.log(response);
                                                //                 if (response.result == 1) {
                                                //                     $('#userName').html(response.user_name);
                                                //                     $('#userPermissionList').html(response.html_content);
                                                //                     $("#roleId").append('<option value="0">Select</option>');
                                                //                     $.each(response.roleList , function(index, item) { 
                                                //                             $("#roleId").append('<option value="'+item.id+'">'+item.name+'</option>');
                                                //                         });
                                            
                                                //             }else{
                                                //                 $('#userPermissionList').html('<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Sorry!</strong> No Role Asign Yet. Please Choose Valid Role.</div>');  
                                                //             }
                                                //         }
                                                // });
                                        
                                               // window.location.href = baseUrl + 'asign-role';
                                        })
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                        swal("Error deleting!", "Please try again", "error");
                                }
                        });
    
                }
        })
    
    }