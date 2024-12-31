<script src="<?= base_url('assets/libs/parsleyjs/parsley.min.js');?>"></script>

<script src="<?= base_url('assets/js/pages/form-validation.init.js');?>"></script>

<!--tinymce js-->
<script src="<?= base_url('assets/libs/tinymce/tinymce.min.js');?>"></script>

<script src="<?= base_url('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js');?>"></script>
<!-- init js -->
<script src="<?= base_url('assets/js/pages/form-editor.init.js');?>"></script>

<script src="<?= base_url('assets/js/pages/form-advanced.init.js');?>"></script>

<script src="<?= base_url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>"></script>
<script src="<?= base_url('assets/libs/dropzone/min/dropzone.min.js');?>"></script>

<script>
    $(document).ready(function() {
        const getUrl = window.location;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
        /////////////////////////////get state name
        $("#pr_country_id").on('change', function(){ 
            $("#pr_state_id").html('');
            const countryid= $(this).val();
            // console.log(base_url);
            $.ajax({
                url : base_url + "get-state-list",
                data:{country_id : countryid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                method:'post',
                dataType:'json',
                beforeSend: function(){
                    $('#pr_state_id').html('<option value="">Loading...</option>'); 
                },
                success:function(response) {
                    // console.log(response);
                    $("#pr_state_id").append('<option selected disabled value="">Choose...</option>');
                    $.each(response , function(index, item) { 
                        $("#pr_state_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                    });
                    //  $('.spinner-border').hide();
                }
            });
        });

        $("#pm_country_id").on('change', function(){ 
            $("#pm_state_id").html('');
            const countryid= $(this).val();
            // console.log(base_url);
            $.ajax({
                url : base_url + "get-state-list",
                data:{country_id : countryid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                method:'post',
                dataType:'json',
                beforeSend: function(){
                        $('#pm_state_id').html('<option value="">Loading...</option>'); 
                    },
                success:function(response) {
                    // console.log(response);
                    $("#pm_state_id").append('<option selected disabled value="">Choose...</option>');
                    $.each(response , function(index, item) { 
                    $("#pm_state_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                });
                //  $('.spinner-border').hide();
                }
            });
        });

        //////////////////////////////get city list
        $("#pr_state_id").on('change', function(){ 
            $("#pr_city_id").html('');
            const stateid= $(this).val();
            // console.log(base_url);
            $.ajax({
                url : base_url + "get-city-list",
                data:{state_id : stateid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                method:'post',
                dataType:'json',
                beforeSend: function(){
                    $('#pr_city_id').html('<option value="">Loading...</option>'); 
                    },
                success:function(response) {
                    $("#pr_city_id").html('');
                    $("#pr_city_id").append('<option value="">Select City</option>');
                    $.each(response , function(index, item) { 
                    $("#pr_city_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                });
                //  $('.spinner-border').hide();
                }
            });
        });

        $("#pm_state_id").on('change', function(){ 
            $("#pm_city_id").html('');
            const stateid= $(this).val();
            // console.log(base_url);
            $.ajax({
                url : base_url + "get-city-list",
                data:{state_id : stateid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                method:'post',
                dataType:'json',
                beforeSend: function(){
                    $('#pm_city_id').html('<option value="">Loading...</option>'); 
                    },
                success:function(response) {
                    $("#pm_city_id").html('');
                    $("#pm_city_id").append('<option value="">Select City</option>');
                    $.each(response , function(index, item) { 
                    $("#pm_city_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                });
                //  $('.spinner-border').hide();
                }
            });
        });
        
        $('#same_as_present').click(function () {
            if ($(this).is(':checked')) {
                // Copy values from Present Address to Permanent Address
                $('#pm_country_id').val($('#pr_country_id').val()).trigger('change');
                setTimeout(function () {
                    $('#pm_state_id').html($('#pr_state_id').html());
                    $('#pm_state_id').val($('#pr_state_id').val()).trigger('change');
                }, 1000);

                // Delay city update by 6 seconds
                setTimeout(function () {
                    $('#pm_city_id').html($('#pr_city_id').html());
                    $('#pm_city_id').val($('#pr_city_id').val()).trigger('change');
                }, 2000);

                $('#pm_zip_code').val($('#pr_zip_code').val());
                $('#pm_address').val($('#pr_address').val());
            } else {
                // Clear Permanent Address fields
                $('#pm_country_id').val('').trigger('change');
                $('#pm_state_id').html('<option selected disabled value="">Choose...</option>');
                $('#pm_city_id').html('<option selected disabled value="">Choose...</option>');
                $('#pm_zip_code').val('');
                $('#pm_address').val('');
            }
        });

        // basicInfoForm    
        $(document).on("submit", "#bodymeasurementForm", function (event) {
            $('.bmBtn').prop("disabled", true);
            $('.bmBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#bodymeasurementForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/bodymeasurement",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.bmBtn').prop("disabled", false);
                    $('.bmBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    //  console.log(response);
                    if (response.status == 1) {
                            // form[0].reset();  
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });
    
        // body measurement    
        $(document).on("submit", "#basicInfoForm", function (event) {
            $('.binfoBtn').prop("disabled", true);
            $('.binfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#basicInfoForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/basicinfo",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.binfoBtn').prop("disabled", false);
                    $('.binfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    //  console.log(response);
                    if (response.status == 1) {
                            // form[0].reset();  
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });

        // body contact info form    
        $(document).on("submit", "#contactInfoForm", function (event) {
            $('.cinfoBtn').prop("disabled", true);
            $('.cinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#contactInfoForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/contactinfo",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.cinfoBtn').prop("disabled", false);
                    $('.cinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    //  console.log(response);
                    if (response.status == 1) {
                            // form[0].reset();  
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });
 
        ///package
        $(document).on("submit", "#packageForm", function (event) {
            $('.packageBtn').prop("disabled", true);
            $('.packageBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#packageForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/package",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.packageBtn').prop("disabled", false);
                    $('.packageBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    //  console.log(response);
                    if (response.status == 1) {
                            form[0].reset();  
                            get_packages();
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });

        //document form
        $(document).on("submit", "#documentForm", function (event) {
            event.preventDefault();
            $('.cinfoBtn').prop("disabled", true);
            $('.cinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            //var form = $("#documentForm");
            //var serializedData = form.serializeArray();
            //serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});

            var form = $("#documentForm")[0];
            var formData = new FormData(form);
            formData.append("csrf_modesy_token", getCookie('csrf_modesy_token'));

            $.ajax({
                url: base_url + "members/documentinfo",
                type: "post",
                // data: serializedData,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (response) {
                    $('.cinfoBtn').prop("disabled", false);
                    $('.cinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    //  console.log(response);
                    if (response.status == 1) {
                            // form[0].reset();  
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        }); 

        $(document).on("submit", "#member_weight_logs_Form", function (event) {
            $('.cinfoBtn').prop("disabled", true);
            $('.cinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#documentForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/member-weight-logs",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.cinfoBtn').prop("disabled", false);
                    $('.cinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    //  console.log(response);
                    if (response.status == 1) {
                            // form[0].reset();  
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        }); 

        //Weigh logs form
        $(document).on("submit", "#member_weight_logs", function (event) {
            $('.qinfoBtn').prop("disabled", true);
            $('.qinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#member_weight_logs");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/member-weight-logs",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.qinfoBtn').prop("disabled", false);
                    $('.qinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    //  console.log(response);
                    if (response.status == 1) {
                            form[0].reset();  
                            weight_logs();
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });

        function weight_logs(){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "members/get-Weight-logs",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: <?= $this->uri->segment(3); ?>
                },
                dataType: "html",
                success: function (resp) {
                    $("#weightchartdata").html(resp);
                }
            });
        }
        weight_logs();



        //Weigh diet form
        $(document).on("submit", "#member_diet_logs", function (event) {
            $('.qinfoBtn').prop("disabled", true);
            $('.qinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#member_diet_logs");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/member-diet-logs",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.qinfoBtn').prop("disabled", false);
                    $('.qinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    //  console.log(response);
                    if (response.status == 1) {
                            form[0].reset();  
                            diet_logs();
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });

        function diet_logs(){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "members/get-diet-logs",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: <?= $this->uri->segment(3); ?>
                },
                dataType: "html",
                success: function (resp) {
                    $("#dietchartdata").html(resp);
                }
            });
        }
        diet_logs();

        $(document).on('click', '.delete-diet-btn', function () {
            const delid = $(this).attr('id');
            const isConfirmed = confirm("Are you sure you want to delete this workout?");
            if (isConfirmed) {
                const getUrl = window.location;
                const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
                $.ajax({
                    url: base_url + "members/delete-diet-log",
                    type: "POST",
                    data: {
                        csrf_modesy_token: getCookie('csrf_modesy_token'),
                        id: delid
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 1) {
                            diet_logs();
                            showToast('success','Success',response.mssg);                         
                        }else{
                            showToast('error','Error',response.mssg);
                        }
                    }
                });
            }
        });


        $(document).on('click', '.delete-log-btn', function () {
            const delid = $(this).attr('id');
            delete_weight_logs(delid);
        });

        $(document).on("submit", "#workoutInfoForm", function (event) {
            $('.qinfoBtn').prop("disabled", true);
            $('.qinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#workoutInfoForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/member-workout",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.qinfoBtn').prop("disabled", false);
                    $('.qinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    //  console.log(response);
                    if (response.status == 1) {
                        form[0].reset();  
                        get_workouts();
                        showToast('success','Success',response.msg);                         
                    }else{
                        showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });

        function get_workouts(){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "members/get-member-workouts",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: <?= $this->uri->segment(3); ?>
                },
                dataType: "html",
                success: function (resp) {
                    $("#workoutchartdata").html(resp);
                }
            });
        }
        get_workouts();

        $(document).on('click', '.delete-workout-btn', function () {
            const delid = $(this).attr('id');
            const isConfirmed = confirm("Are you sure you want to delete this workout?");
            if (isConfirmed) {
                const getUrl = window.location;
                const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
                $.ajax({
                    url: base_url + "members/delete-member-workouts",
                    type: "POST",
                    data: {
                        csrf_modesy_token: getCookie('csrf_modesy_token'),
                        id: delid
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 1) {
                            get_workouts();
                            showToast('success','Success',response.mssg);                         
                        }else{
                            showToast('error','Error',response.mssg);
                        }
                    }
                });
            }
        });
 
        ///package
        // $(document).on("submit", "#packageForm", function (event) {
        //     $('.packageBtn').prop("disabled", true);
        //     $('.packageBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
        //     const getUrl = window.location;
        //     const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
        //     var form = $("#packageForm");
        //     var serializedData = form.serializeArray();
        //     serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
        //     $.ajax({
        //         url: base_url + "members/package",
        //         type: "post",
        //         data: serializedData,
        //         dataType: "json",
        //         success: function (response) {
        //             $('.packageBtn').prop("disabled", false);
        //             $('.packageBtn').html('Save Changes');
        //             //var obj = JSON.parse(response);
        //             //  console.log(response);
        //             if (response.status == 1) {
        //                 form[0].reset();  
        //                 showToast('success','Success',response.msg);                         
        //             }else{
        //                 showToast('error','Error',response.msg);
        //             }
        //         }
        //     });
        //     event.preventDefault();
        // });

        function get_packages(){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "get-all-package",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: <?= $this->uri->segment(3); ?>
                },
                dataType: "html",
                success: function (resp) {
                    $("#packagedata").html(resp);
                }
            });
        }
        get_packages();


        $("#package_id").on('change', function(){ 
            // alert(123);
            const packageid= $(this).val();
            //console.log(packageid);
            $.ajax({
                url : base_url + "get-package",
                data:{package_id : packageid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                method:'post',
                dataType:'json',
                beforeSend: function(){
                    //   $('#pm_state_id').html('<option value="">Loading...</option>'); 
                },
                success:function(response) {
                    // console.log(response);
                    // $("#duration").val(response.duration + ' ' + response.duration_type);
                    $("#duration").val(response.duration);
                    $("#amount").val(response.amount);
                    $("#hdnAmount").val(response.amount);
                    //     $("#pm_state_id").append('<option selected disabled value="">Choose...</option>');
                    //     $.each(response , function(index, item) { 
                    //     $("#pm_state_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                    // });
                    //  $('.spinner-border').hide();
                    calculateGst();
                }
            });
        });


        // change password  
        $(document).on("submit", "#changepasswordform", function (event) {
            $('.binfoBtn').prop("disabled", true);
            $('.binfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#changepasswordform");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/change-member-password",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.binfoBtn').prop("disabled", false);
                    $('.binfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    //  console.log(response);
                    if (response.status == 1) {
                        form[0].reset();  
                        showToast('success','Success',response.msg);                         
                    }else{
                        showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });
 
    });

    function calculateGst(){
        let amount =  $("#hdnAmount").val();
        let gstType = $("#gstType").val();
        let gstAmount =0;
        //  console.log(gstType);
        //   console.log(amount);
        if(gstType == 'included'){
            gstAmount = ((amount / Number(118)) * 18).toFixed(2);
            amount = amount-gstAmount;
            $('#amount').val(amount);
            $('#gstText').show();
            $('#gstText').html('(18 % GST are Included)');
        }else if(gstType == 'excluded'){
            gstAmount = (amount*18)/100;
            $('#amount').val(amount);
            $('#gstText').show();
            $('#gstText').html('(18 % GST are Excluded)');
        }else{
            $('#gstText').hide();
        }
        $('#gstAmount').val(gstAmount);
        $('#payableAmount').val(Number(amount) + Number(gstAmount));
        //  console.log(gstAmount);
    }
</script>

<script>
    function showMore_edit(id){
        var idd = id.split("_");
        var idty = parseInt(idd[1]);
        idty = idty + 1;
        var table = document.getElementById("table_repeter");
        console.log(table);
        var rowCount = table.rows.length;
        
        var row = table.insertRow(rowCount);
        var cell0 = row.insertCell(0);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        console.log(cell0,cell1, cell2, cell3);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        var cell8 = row.insertCell(7);
        document.getElementById("cont").value = idty;
            
            
        cell1.innerHTML = '<select class="form-select" name="days[]" required><option selected disabled value="">Choose...</option><option value="Sunday">Sunday</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="SaturDay">SaturDay</option></select>';
            
        cell2.innerHTML = '<select class="form-select" name="workout[]" required><option selected disabled value="">Choose...</option><?php if(!empty($catagory_masters)): foreach($catagory_masters as $catagory_master): ?><option value="<?= $catagory_master->id;?>"><?= $catagory_master->name;?></option><?php endforeach; endif;?></select>';

        cell3.innerHTML = '<input type="number" class="form-control" placeholder="Weight" name="weight[]" required>';
        
        cell4.innerHTML = '<input type="number" class="form-control" placeholder="Sets" name="sets[]" required>';
        
        cell5.innerHTML = '<input type="number" class="form-control" placeholder="Reps" name="reps[]" required>';
        
        cell6.innerHTML = '<input type="number" class="form-control" placeholder="Rest" name="rest[]" required>';
        
        cell7.innerHTML = '<textarea class="form-control" placeholder="Description" name="description[]"></textarea>';
        
        cell8.innerHTML = "<a  href=\"javascript:;\" class=\"btn btn-danger btn-sm\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Remove this Item\" onClick=\"deleteRow(this)\"><i class=\"ti-trash\"></i></a>";
                

                
        document.getElementById("more1").innerHTML = "<a class=\"btn btn-success btn-sm float-end\" href=\"javascript:;\" onClick=\"showMore_edit('field_" + idty + "');\"><i class=\"fa fa-plus\"></i>Add More</a>";
            
            
    }

    function deleteRow(btn) {
        if (confirm("Are You Sure?") == true) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        } else { }
    }
</script>