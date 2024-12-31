<script src="<?= base_url('assets/libs/parsleyjs/parsley.min.js');?>"></script>

<script src="<?= base_url('assets/js/pages/form-validation.init.js');?>"></script>

<!--tinymce js-->
<script src="<?= base_url('assets/libs/tinymce/tinymce.min.js');?>"></script>

<script src="<?= base_url('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js');?>"></script>
<!-- init js -->
<script src="<?= base_url('assets/js/pages/form-editor.init.js');?>"></script>

<script src="<?= base_url('assets/js/pages/form-advanced.init.js');?>"></script>

<script src="<?= base_url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>"></script>

<!-- form repeater js -->
<script src="<?= base_url('assets/libs/jquery.repeater/jquery.repeater.min.js');?>"></script>

<script src="<?= base_url('assets/js/pages/form-repeater.int.js');?>"></script>

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
        

        $("#is-continue-charge").on("change", function () {
            if ($(this).is(":checked")) {
                $("#continueChargeSection").show().prop("required", true);
            } else {
                $("#continueChargeSection").hide().prop("required", false);
                $("#continueChargeSection").val(""); // Reset selection
            }
            calculateAmount();
            // calculateGst(); // Recalculate GST when toggled
        });

        $("#continueChargeSection").on('change', function(){ 
            calculateAmount()
            // alert(123);
                const continueid= $(this).val();
                // console.log(base_url);
                // $.ajax({
                //     url : base_url + "get-continue-charge",
                //     data:{continue_id : continueid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                //     method:'post',
                //     dataType:'json',
                //     beforeSend: function(){
                //         //   $('#pm_state_id').html('<option value="">Loading...</option>'); 
                //         },
                //     success:function(response) {
                //         // console.log(response);
                //         $("#duration").val(response.duration + ' ' + response.duration_type);
                //         $("#amount").val(response.amount);
                //         $("#hdnAmount").val(response.amount);
                //         calculateGst();
                //     }
                // });
        });

        $("#package_id").on('change', function(){ 
            // alert(123);
            calculateAmount()
                const packageid= $(this).val();
                // console.log(base_url);
                // $.ajax({
                //     url : base_url + "get-package",
                //     data:{package_id : packageid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                //     method:'post',
                //     dataType:'json',
                //     beforeSend: function(){
                //         //   $('#pm_state_id').html('<option value="">Loading...</option>'); 
                //         },
                //     success:function(response) {
                //         // console.log(response);
                //         $("#duration").val(response.duration + ' ' + response.duration_type);
                //         $("#amount").val(response.amount);
                //         $("#hdnAmount").val(response.amount);
                //         calculateGst();
                //     }
                // });
        });



        function get_package(packageid){
            return $.ajax({
                url : base_url + "get-package",
                data:{package_id : packageid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                method:'post',
                dataType:'json',
            });
        }
        function get_continus_charge(continueid){
            return $.ajax({
                url : base_url + "get-continue-charge",
                data:{continue_id : continueid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                method:'post',
                dataType:'json',
            });
        }
        function delay(milliseconds) {
            return new Promise((resolve) => setTimeout(resolve, milliseconds));
        }
        async function calculateAmount(){
            const continueId = $("#continueChargeSection").val();
            const packageId = $("#package_id").val();
    
            let package_resp = { duration: 0, amount: 0 };
            let continue_charge_resp = { duration: 0, amount: 0 };

            if (packageId) {
                package_resp = await get_package(packageId);
            }
            if(continueId){
                continue_charge_resp = await get_continus_charge(continueId);
            }

            const duration = parseInt(package_resp.duration || 0) + parseInt(continue_charge_resp.duration || 0);
            const amount = parseFloat(package_resp.amount || 0) + parseFloat(continue_charge_resp.amount || 0);
            $("#duration").val(duration + ' Days');
            $("#amount").val(amount);
            $("#hdnAmount").val(amount);

            calculateGst();
        }
    });



 
    function calculateGst(){
        let amount =  $("#hdnAmount").val();
        let gstType = $("#gstType").val();
        let gstAmount =0;
        // console.log(gstType);
        // console.log(amount);
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
        // console.log(gstAmount);
    }
 

        // function OnFocusInput (input) {
        //     input.style.color = "red";
        //     input.value = "";
        // }

        // function OnBlurInput (input) {
        //     input.style.color = "";
        //     input.value = 0;
        // }

        function OnChangeInput () {
            if($('.noh').val()!=''){
                $('.noh').val(0);
            }
           
        }

</script>