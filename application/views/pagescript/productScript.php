<!-- <link href="<?= base_url('assets/admin/libs/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css">
 --><script src="<?= base_url('assets/admin/libs/parsleyjs/parsley.min.js');?>"></script>
<script src="<?= base_url('assets/admin/js/pages/form-validation.init.js');?>"></script>
<script src="<?= base_url('assets/admin/libs/spectrum-colorpicker2/spectrum.min.js');?>"></script>
 <!--tinymce js-->
<script src="<?= base_url('assets/admin/libs/tinymce/tinymce.min.js');?>"></script>
<script src="<?= base_url('assets/admin/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js');?>"></script>
<!-- init js -->
<script src="<?= base_url('assets/admin/js/pages/form-editor.init.js');?>"></script>
<script src="<?= base_url('assets/admin/js/pages/form-advanced.init.js');?>"></script>
<!-- <script src="<?= base_url('assets/admin/libs/dropzone/min/dropzone.min.js');?>"></script>
 -->
 <script src="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- Sweet alert init js-->
<script src="<?= base_url('assets/admin/js/pages/sweet-alerts.init.js');?>"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/file-uploader/js/jquery.dm-uploader.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/file-uploader/js/demo-ui.js"></script>

<script>
    const getUrl = window.location;
    const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
              
    //add product variation post
    $("#form_add_product_variation").submit(function (event) {
        event.preventDefault();
        var input_variation_label = $.trim($('#input_variation_label').val());
        if (input_variation_label.length < 1) {
            $('#input_variation_label').addClass("is-invalid");
            return false;
        } else {
            $('#input_variation_label').removeClass("is-invalid");
        }
        var form = $(this);
        var serializedData = form.serializeArray();
      // console.log(base_url + "add-variation-post");
      serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
      //  serializedData.push({name: "sys_lang_id", value: sys_lang_id});
        $.ajax({
            url: base_url + "add-variation-post",
            type: "post",
            data: serializedData,
            success: function (response) {
                
                $("#input_variation_label").val('');
                form[0].reset();
                $(".bs-example-modal-center").modal('hide');
              //  $(".variation-options-container").empty();

                var obj = JSON.parse(response);
                console.log(obj.result);
                if (obj.result == 1) {
                    document.getElementById("response_product_variations").innerHTML = obj.html_content;
                }
            }
        });
    });

   //add product variation option
   function add_product_variation_option(id) {
        $("#btn-variation-text-add-" + id).css("visibility", "hidden");
        $("#sp-options-add-" + id).show();
        var data = {
            "variation_id": id,
            "csrf_modesy_token": getCookie('csrf_modesy_token')
        };
      //  csrf_modesy_token
       // data[csfr_token_name] = $.cookie(csfr_cookie_name);
        $.ajax({
            url: base_url + "add-variation-option",
            type: "post",
            data: data,
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.result == 1) {
                    document.getElementById("response_product_add_variation_option").innerHTML = obj.html_content;
                }
                setTimeout(
                    function () {
                        $('#colorpicker-showinput-intial').spectrum();
                        $("#addVariationOptionModal").modal('show');
                        $("#btn-variation-text-add-" + id).css("visibility", "visible");
                        $("#sp-options-add-" + id).hide();
                    }, 250);
            }
        });
    }


        //view product variation options
        function view_product_variation_options(id) {
        $("#btn-variation-text-options-" + id).css("visibility", "hidden");
        $("#sp-options-" + id).show();
        var data = {
            "variation_id": id,
            "csrf_modesy_token": getCookie('csrf_modesy_token')
        };
      //  data[csfr_token_name] = $.cookie(csfr_cookie_name);
        $.ajax({
            url: base_url + "view-variation-options",
            type: "post",
            data: data,
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.result == 1) {
                    document.getElementById("response_product_variation_options_edit").innerHTML = obj.html_content;
                }
                setTimeout(
                    function () {
                        $("#viewVariationOptionsModal").modal('show');
                        $("#btn-variation-text-options-" + id).css("visibility", "visible");
                        $("#sp-options-" + id).hide();
                    }, 250);
            }
        });
    }

/////////////////////////////////////////////
$(document).on('click', '#btn_add_variation_option', function () {
        var input_variation_option = $.trim($('#input_variation_option_name').val());
        if (input_variation_option.length < 1) {
            $('#input_variation_option_name').addClass("is-invalid");
            return false;
        } else {
            $('#input_variation_option_name').removeClass("is-invalid");
        }
        var form = $("#form_add_product_variation_option");
        var serializedData = form.serializeArray();
        serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
     //  serializedData.push({name: "sys_lang_id", value: sys_lang_id});
        $(".input-variation-label").val('');
        $.ajax({
            url: base_url + "add-variation-option-post",
            type: "post",
            data: serializedData,
            success: function (response) {
              
                var obj = JSON.parse(response);
                if (obj.result == 1) {
                    $('#colorpicker-showinput-intial').spectrum();
                    document.getElementById("response_product_add_variation_option").innerHTML = obj.html_content;
                }
            }
        });
    });
/////////////////////////////////////


    $(document).on('change', '#checkbox_discount_rate_variation', function () {
        if (!this.checked) {
            $("#discount_input_container_variation").show();
        } else {
            $('#input_discount_rate_variation').val("0");
            $("#discount_input_container_variation").hide();
        }
    });
    $(document).on('change', '#checkbox_price_variation', function () {
        if (!this.checked) {
            $("#price_input_container_variation").show();
        } else {
            $('#price_input_container_variation input').val("0");
            $("#price_input_container_variation").hide();
        }
    });
    $(document).on('change', '#checkbox_price_variation', function () {
        if (!this.checked) {
            $("#price_input_container_variation").show();
        } else {
            $('#price_input_container_variation input').val("0");
            $("#price_input_container_variation").hide();
        }
    });

    $(document).on('change', 'input[name=is_default]', function () {
        var value = $('input[name=is_default]:checked').val();
        if (value == 1) {
            $(".hide-if-default").addClass("d-none");
        } else {
            $(".hide-if-default").removeClass("d-none");
        }
    });


    $(document).ready(function() {
         $("#cat_id").on('change', function(){ // 1st way
            $("#subcat_id").html('');
           const cat_id= $(this).val();
           const getUrl = window.location;
           const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/admin/";
                console.log(baseUrl);
                console.log(cat_id);
                    $.ajax({
                        url : baseUrl + "products/get-subcategory",
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



///////////////////////////////////

// Dropzone.autoDiscover = false;
//   var FileDropzone = new Dropzone(".dropzone", { 
//      maxFilesize: 2, //set file upload size
//      acceptedFiles: ".jpeg,.jpg,.png", // accepted files format
//      addRemoveLinks: true,
//      dictRemoveFile: "Remove",
//      maxFiles: 4,
//      success: function(file, response){
//         console.log(file.upload.uuid);
//       //  console.log(JSON.parse(file.xhr.response));
//                // alert(file.name);
//      },
//      removedfile: function(file) {
//        var fileName = file.name;  
//        $.ajax({
//          type: 'POST',
//          url: '<?= base_url('admin/products/remove-tmpimages')?>',
//          data: {name: fileName,request: 'remove'},
//          sucess: function(data){
//             console.log('success: ' + data);
//          }
//        });
//        var _ref;
//         return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
//      }
//   });
</script>

<!-- File item template -->
<script type="text/html" id="files-template-image">
    <li class="media">
        <img class="preview-img" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="bg">
        <div class="media-body">
            <div class="progress">
                <div class="dm-progress-waiting">Waiting...</div>
                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </li>
</script>

<script>
    $(function () {
        $('#drag-and-drop-zone').dmUploader({
            url: base_url + 'admin/products/media-process',
            maxFileSize: 5242880,
            maxFiles: 2,
            queue: true,
            allowedTypes: 'image/*',
            extFilter: ["jpg", "jpeg", "png", "gif"],
            extraData: function (id) {
                return {
                    "file_id": id,
                    "product_id": <?= $this->uri->segment(4)?>,
                    "csrf_modesy_token": getCookie('csrf_modesy_token')
                };
            },
            onDragEnter: function () {
                this.addClass('active');
            },
            onDragLeave: function () {
                this.removeClass('active');
            },
            onInit: function () {
            },
            onComplete: function (id) {
            },
            onNewFile: function (id, file) {
                ui_multi_add_file(id, file, "image");
                if (typeof FileReader !== "undefined") {
                    var reader = new FileReader();
                    var img = $('#uploaderFile' + id).find('img');

                    reader.onload = function (e) {
                        img.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            },
            onBeforeUpload: function (id) {
                $('#uploaderFile' + id + ' .dm-progress-waiting').hide();
                ui_multi_update_file_progress(id, 0, '', true);
                ui_multi_update_file_status(id, 'uploading', 'Uploading...');
            },
            onUploadProgress: function (id, percent) {
                ui_multi_update_file_progress(id, percent);
            },
            onUploadSuccess: function (id, data) {
                var data = {
                    "file_id": id,
                    "product_id": <?= $this->uri->segment(4)?>,
                    "csfr_token_name":getCookie('csrf_modesy_token')
                };
                $.ajax({
                    type: "POST",
                    url: base_url + 'get-product-temp-images',
                    data: data,
                    success: function (response) {
                        document.getElementById("uploaderFile" + id).innerHTML = response;
                    }
                });
                ui_multi_update_file_status(id, 'success', 'Upload Complete');
                ui_multi_update_file_progress(id, 100, 'success', false);
            },
            onUploadError: function (id, xhr, status, message) {
                // ui_multi_update_file_status(id, 'danger', message);
                // ui_multi_update_file_progress(id, 0, 'danger', false);  

            //    console.log('hello');
                console.log(message);
                if (message == "Not Acceptable") {
                    $("#uploaderFile" + id).remove();
                    $(".error-message-img-upload").show();
                    $(".error-message-img-upload p").html("You can upload 5 files.");
                    setTimeout(function () {
                        $(".error-message-img-upload").fadeOut("slow");
                    }, 4000)
                }
            },
            onFallbackMode: function () {
            },
            onFileSizeError: function (file) {
                $(".error-message-img-upload").html("File Size to Big");
                setTimeout(function () {
                    $(".error-message-img-upload").empty();
                }, 4000);
            },
            onFileTypeError: function (file) {
            },
            onFileExtError: function (file) {
                $(".error-message-img-upload").html("Invalid File Type");
                setTimeout(function () {
                    $(".error-message-img-upload").empty();
                }, 4000);
            },
        });
    });

    $(document).on("click", ".btn-delete-product-img", function () {
    var b = $(this).attr("data-file-id");
    var a = {    
                "file_id": b,
                "product_id": <?= $this->uri->segment(4)?>,
                "csfr_token_name":getCookie('csrf_modesy_token')
            };
    $.ajax({
        type: "POST",
        url: base_url + "delete-product-images",
        data: a,
        success: function () {
            $("#uploaderFile" + b).remove();
        },
    });
});

$(document).on("click", ".btn-set-image-main", function () {
    var b = $(this).attr("data-file-id");
    var a = {    
                "file_id": b,
                "product_id": <?= $this->uri->segment(4)?>,
                "csfr_token_name":getCookie('csrf_modesy_token')
            };
    $(".badge-is-image-main").removeClass("btn-primary");
    $(".badge-is-image-main").addClass("btn-secondary");
    $(this).removeClass("btn-secondary");
    $(this).addClass("btn-primary");
    $.ajax({ type: "POST", url: base_url + "set-main-product-image", 
        data: a, 
        success: function (c) {
            document.getElementById("files-image").innerHTML = c; 
    } });
});



///////////////////////////21/08/2022

$(document).on('change', '#checkbox_discount_rate', function () {
    if (!this.checked) {
        $("#discount_input_container").show();
    } else {
        $('#input_discount_rate').val("0");
        $("#discount_input_container").hide();
    }
});
$(document).on('change', '#checkbox_gst_included', function () {
    if (!this.checked) {
        $("#gst_input_container").show();
        $(".calculated_gst_container").show();
    } else {
        $('#input_gst_rate').val("0");
        $('#input_gst_rate').change();
        $("#gst_input_container").hide();
        $(".calculated_gst_container").hide();
    }
});
</script>

<script>
        //calculate product earned value
        var thousands_separator = '<?php echo $this->thousands_separator; ?>';
        var commission_rate = '<?php echo $this->general_settings->commission_rate; ?>';
        $(document).on("input keyup paste change", "#product_price_input", function () {
            calculate_earn_amount();
        });
        $(document).on("input keyup paste change", "#input_discount_rate", function () {
            var val = parseInt($(this).val());
            if (val == "" || val == null || isNaN(val)) {
                val = 0;
            }
            if (val > 99) {
                val = 99;
            }
            if ($(this).val() < 0) {
                val = 0;
            }
            $(this).val(val);
            calculate_earn_amount();
        });
        $(document).on("input keyup paste change", "#input_gst_rate", function () {
            var val = parseInt($(this).val());
            if (val == "" || val == null || isNaN(val)) {
                val = 0;
            }
            if (val > 100) {
                val = 100;
            }
            if ($(this).val() < 0) {
                val = 0;
            }
            $(this).val(val);
            calculate_earn_amount();
        });

        $(document).on("change", ".commissionType", function () {
            calculate_earn_amount();
        });

        function calculate_earn_amount() {
            var input_price = $("#product_price_input").val();
            var discount = 0;
            var gst = 0;
            if ($('#input_discount_rate').val() != "" && $('#input_discount_rate').val() != null) {
                discount = $("#input_discount_rate").val();
            }
            if ($('#input_gst_rate').val() != "" && $('#input_gst_rate').val() != null) {
                gst = $("#input_gst_rate").val();
            }
            input_price = input_price.replace(',', '.');
            var price = parseFloat(input_price);
            commission_rate = parseInt(commission_rate);
//////////////////////////////////////////////////////////////
            const commission_type = $("input[name='commission_type']:checked").val();
           
/////////////////////////////////////////////////////////////




            //calculate
            var calculated_amount = 0;
            var gst_amount = 0;
            var earned_amount = 0;
            var price_amount = 0;
            var commission_amount = 0;
            var afterDiscountPrice = 0;
            if (!Number.isNaN(price)) {

                if (commission_type == 1) {
                     price_amount = price;                  
                } else {
                     price_amount = price + ((price * commission_rate) / 100);  
                }
                afterDiscountPrice = price - ((price * discount) / 100);
                calculated_amount = price_amount - ((price_amount * discount) / 100);
                console.log(`Discount= ${((price * discount) / 100)}`);
                
                console.log(`After Discount= ${afterDiscountPrice}`);
                console.log(`Calculated Amount= ${calculated_amount}`);

                commission_amount=((afterDiscountPrice * commission_rate) / 100);
                if (commission_type == 1) {
                gst_amount = ((calculated_amount-commission_amount) * gst) / 100;
                price_amount = price;
                 } else {
                gst_amount = (calculated_amount * gst) / 100;
                price_amount = afterDiscountPrice + commission_amount;  
                }
                earned_amount = calculated_amount + gst_amount;

                earned_amount = earned_amount - commission_amount;
               
                
                earned_amount = earned_amount.toFixed(2);
                calculated_amount = calculated_amount.toFixed(2);
                gst_amount = gst_amount.toFixed(2);
                commission_amount = commission_amount.toFixed(2);
                price_amount = price_amount.toFixed(2);
                if (thousands_separator == ',') {
                    calculated_amount = calculated_amount.replace('.', ',');
                    gst_amount = gst_amount.replace('.', ',');
                    earned_amount = earned_amount.replace('.', ',');
                    commission_amount=commission_amount.replace('.', ',');
                    price_amount=price_amount.replace('.', ',');
                }
            } else {
                calculated_amount = '0' + thousands_separator + '00';
                gst_amount = '0' + thousands_separator + '00';
                earned_amount = '0' + thousands_separator + '00';
                commission_amount = '0' + thousands_separator + '00';
                price_amount='0' + thousands_separator + '00';
            }


            $("#calculated_amount").html(calculated_amount);
            $("#gst_amount").html(gst_amount);
            $("#earned_amount").html(earned_amount);
            $("#price_amount").html(price_amount);
            $("#commission_amount").html(commission_amount);

            $("#calculated_amount_txt").val(calculated_amount);
            $("#gst_amount_txt").val(gst_amount);
            $("#earned_amount_txt").val(earned_amount);
            $("#price_amount_txt").val(price_amount);
            $("#commission_amount_txt").val(commission_amount);
            // console.log(`Calculated Amount ${calculated_amount}`);
            // console.log(`Gst Amount ${gst_amount}`);
            // console.log(`Earn Amount ${earned_amount}`);
        }


        $('#checkbox_discount_rate').change(function () {
        if (!this.checked) {
            $("#discount_input_container").show();
        } else {
            $('#input_discount_rate').val("0");
            $('#input_discount_rate').change();
            $("#discount_input_container").hide();
        }
    });
    $('#checkbox_gst_included').change(function () {
        if (!this.checked) {
            $("#gst_input_container").show();
            $(".calculated_gst_container").show();
        } else {
            $('#input_gst_rate').val("0");
            $('#input_gst_rate').change();
            $("#gst_input_container").hide();
            $(".calculated_gst_container").hide();
        }
    });
    </script>