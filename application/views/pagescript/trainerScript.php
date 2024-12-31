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
                    $("#pr_state_id").html('');
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
                    $("#pm_state_id").html('');
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
                     console.log(response);
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
                url: base_url + "trainer/basicinfo",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.binfoBtn').prop("disabled", false);
                    $('.binfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                     console.log(response);
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
        $(document).on("submit", "#contactInfoForm", function (event) {
            $('.cinfoBtn').prop("disabled", true);
            $('.cinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#contactInfoForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "trainer/contactinfo",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.cinfoBtn').prop("disabled", false);
                    $('.cinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                     console.log(response);
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

        //document form
        $(document).on("submit", "#documentForm", function (event) {
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
                url: base_url + "trainer/documentinfo",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (response) {
                    $('.cinfoBtn').prop("disabled", false);
                    $('.cinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                     console.log(response);
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

        //qualification form
        $(document).on("submit", "#qualification", function (event) {
            $('.qinfoBtn').prop("disabled", true);
            $('.qinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#qualification");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "trainer/qualificationinfo",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.qinfoBtn').prop("disabled", false);
                    $('.qinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                           form[0].reset();  
                           qualification();
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });

        function qualification(){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "trainer/getQualification",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: <?= $this->uri->segment(3); ?>
                },
                dataType: "html",
                success: function (resp) {
                    $("#qualificationdata").html(resp);
                }
            });
        }
        qualification();

        function delete_qualification(delid){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "trainer/deleteQualification",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: delid
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == 1) {
                        qualification();
                        showToast('success','Success',response.msg);                         
                    }else{
                        showToast('error','Error',response.msg);
                    }
                }
            });
        }

        $(document).on('click', '.delete-qualification-btn', function () {
            const delid = $(this).attr('id');
            delete_qualification(delid);
        });


        //work exprence form
        $(document).on("submit", "#workexprenceinfo", function (event) {
            $('.workxpBtn').prop("disabled", true);
            $('.workxpBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            // var form = $("#workexprenceinfo");
            // var serializedData = form.serializeArray();
            // serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            var form = $("#workexprenceinfo")[0];
            var formData = new FormData(form);
            formData.append("csrf_modesy_token", getCookie('csrf_modesy_token'));
            $.ajax({
                url: base_url + "trainer/workexprenceinfo",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (response) {
                    $('.workxpBtn').prop("disabled", false);
                    $('.workxpBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    if (response.status == 1) {
                        // form[0].reset();  
                        form.reset();
                        $("#workexpblah").hide();
                        exprence();
                        showToast('success','Success',response.msg);                         
                    }else{
                        showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });
        function exprence(){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "trainer/getworkExprence",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: <?= $this->uri->segment(3); ?>
                },
                dataType: "html",
                success: function (resp) {
                    $("#work_exprence").html(resp);
                }
            });
        }
        exprence();

        $(document).on('click', '.delete-exprence-btn', function () {
            const delid = $(this).attr('id');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "trainer/deleteworkExprence",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: delid
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == 1) {
                        exprence();
                        showToast('success','Success',response.msg);                         
                    }else{
                        showToast('error','Error',response.msg);
                    }
                }
            });
        });




        //achievements form
        $(document).on("submit", "#achievementsinfo", function (event) {
            $('.achieveBtn').prop("disabled", true);
            $('.achieveBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            // var form = $("#achievementsinfo");
            // var serializedData = form.serializeArray();
            // serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});

            var form = $("#achievementsinfo")[0];
            var formData = new FormData(form);
            formData.append("csrf_modesy_token", getCookie('csrf_modesy_token'));
            $.ajax({
                url: base_url + "trainer/achievementsinfo",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (response) {
                    $('.achieveBtn').prop("disabled", false);
                    $('.achieveBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                    //  console.log(response);
                    if (response.status == 1) {
                        form.reset();
                        $("#achivementblah").hide();
                           achievements();
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });
        function achievements(){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "trainer/getachievements",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: <?= $this->uri->segment(3); ?>
                },
                dataType: "html",
                success: function (resp) {
                    $("#achievements").html(resp);
                }
            });
        }
        achievements();

        $(document).on('click', '.delete-achievements-btn', function () {
            const delid = $(this).attr('id');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "trainer/deleteachievements",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: delid
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == 1) {
                        achievements();
                        showToast('success','Success',response.msg);                         
                    }else{
                        showToast('error','Error',response.msg);
                    }
                }
            });
        });


        //bank_account form
        $(document).on("submit", "#bank_account", function (event) {
            $('.bankBtn').prop("disabled", true);
            $('.bankBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#bank_account");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "trainer/bankinfo",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.bankBtn').prop("disabled", false);
                    $('.bankBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                           form[0].reset();  
                           bankaccounts();
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });
        function bankaccounts(){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "trainer/getbankaccounts",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: <?= $this->uri->segment(3); ?>
                },
                dataType: "html",
                success: function (resp) {
                    $("#bankaccounts").html(resp);
                }
            });
        }
        bankaccounts();

        $(document).on('click', '.delete-bankaccounts-btn', function () {
            const delid = $(this).attr('id');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            $.ajax({
                url: base_url + "trainer/deletebankaccounts",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: delid
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == 1) {
                        bankaccounts();
                        showToast('success','Success',response.msg);                         
                    }else{
                        showToast('error','Error',response.msg);
                    }
                }
            });
        });

        //salary configaration form
        $(document).on("submit", "#salaryconfigForm", function (event) {
            $('.sinfoBtn').prop("disabled", true);
            $('.sinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#salaryconfigForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "trainer/salary-configuration",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.sinfoBtn').prop("disabled", false);
                    $('.sinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                     console.log(response);
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

        $(document).on("submit", "#changepasswordform", function (event) {
            $('.binfoBtn').prop("disabled", true);
            $('.binfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#changepasswordform");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "trainer/change-trainer-password",
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
</script>