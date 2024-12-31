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
    const getUrl = window.location;
    const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";

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
					url:"<?= admin_url('category/update-category-order')?>",
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
       
    //add product variation post
        $(document).on('click', '#btn_add_variation_option', function () {
            // event.preventDefault();
            // console.log(123);
            var opt_name = $.trim($('#opt_name').val());
            var opt_weightage = $.trim($('#opt_weightage').val());
            if (opt_name.length < 1) {
                $('#opt_name').addClass("is-invalid");
                return false;
            } else {
                $('#opt_name').removeClass("is-invalid");
            }

            if ($('#has_child').is(":checked")) {
                $(".weightage").hide();
               console.log('checked');
            }else{
            if (opt_weightage.length < 1) {
                $('#opt_weightage').addClass("is-invalid");
                return false;
            } else {
                $('#opt_weightage').removeClass("is-invalid");
            }
            }
            

                var form = $("#form_add_option");
                var serializedData = form.serializeArray();
                console.log(base_url + "add-variation-post");
                serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
                //  serializedData.push({name: "sys_lang_id", value: sys_lang_id});
                $.ajax({
                    url: base_url + "add-option-post",
                    type: "post",
                    data: serializedData,
                    success: function (response) {
                        
                        $("#opt_name").val('');
                         $("#opt_weightage").val('');
                        form[0].reset();
                        $(".bs-example-modal-center").modal('hide');
                        //  $(".variation-options-container").empty();

                        var obj = JSON.parse(response);
                        console.log(obj.result);
                        if (obj.result == 1) {
                            document.getElementById("response_add_option").innerHTML = obj.html_content;
                        }
                    }
                });
        });

    //update product variation post
        $(document).on('click', '#btn_update_variation_option', function () {
            // event.preventDefault();
            // console.log(123);
            var opt_name = $.trim($('#opt_name').val());
            var opt_weightage = $.trim($('#opt_weightage').val());
            if (opt_name.length < 1) {
                $('#opt_name').addClass("is-invalid");
                return false;
            } else {
                $('#opt_name').removeClass("is-invalid");
            }

            if (opt_weightage.length < 1) {
                $('#opt_weightage').addClass("is-invalid");
                return false;
            } else {
                $('#opt_weightage').removeClass("is-invalid");
            }

                var form = $("#form_update_option");
                var serializedData = form.serializeArray();
               // console.log(base_url + "update-variation-post");
                serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
                //  serializedData.push({name: "sys_lang_id", value: sys_lang_id});
                $.ajax({
                    url: base_url + "update-option-post",
                    type: "post",
                    data: serializedData,
                    success: function (response) {
                        
                        $("#opt_name").val('');
                        form[0].reset();
                        $(".bs-example-modal-center").modal('hide');
                        //  $(".variation-options-container").empty();
                        //get_options(ques_id);
                        var obj = JSON.parse(response);
                        console.log(obj.result);
                        if (obj.result == 1) {
                            document.getElementById("response_edit_option").innerHTML = obj.html_content;
                        }
                    }
                });
        });

  //update child variation post
        $(document).on('click', '#btn_update_variation_child_option', function () {
            // event.preventDefault();
            // console.log(123);
            var opt_name = $.trim($('#child_opt_name').val());
            var opt_weightage = $.trim($('#child_opt_weightage').val());
            if (opt_name.length < 1) {
                $('#child_opt_name').addClass("is-invalid");
                return false;
            } else {
                $('#child_opt_name').removeClass("is-invalid");
            }

            if (opt_weightage.length < 1) {
                $('#child_opt_weightage').addClass("is-invalid");
                return false;
            } else {
                $('#child_opt_weightage').removeClass("is-invalid");
            }

                var form = $("#form_update_child_option");
                var serializedData = form.serializeArray();
               // console.log(base_url + "update-variation-post");
                serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
                //  serializedData.push({name: "sys_lang_id", value: sys_lang_id});
                $.ajax({
                    url: base_url + "update-child-option-post",
                    type: "post",
                    data: serializedData,
                    success: function (response) {
                        
                        $("#child_opt_name").val('');
                        form[0].reset();
                        $(".bs-example-modal-center").modal('hide');
                        //  $(".variation-options-container").empty();
                        //get_options(ques_id);
                        var obj = JSON.parse(response);
                        console.log(obj.result);
                        if (obj.result == 1) {
                            document.getElementById("response_edit_child_option").innerHTML = obj.html_content;
                        }
                    }
                });
        });
        ///////add child options
          //add product variation post
        $(document).on('click', '#btn_add_child_variation_option', function () {
            // event.preventDefault();
            // console.log(123);
            var opt_name = $.trim($('#opt_name').val());
            var opt_weightage = $.trim($('#opt_weightage').val());
            if (opt_name.length < 1) {
                $('#opt_name').addClass("is-invalid");
                return false;
            } else {
                $('#opt_name').removeClass("is-invalid");
            }

            if (opt_weightage.length < 1) {
                $('#opt_weightage').addClass("is-invalid");
                return false;
            } else {
                $('#opt_weightage').removeClass("is-invalid");
            }
                var form = $("#form_add_child_option");
                var serializedData = form.serializeArray();
                console.log(base_url + "add-variation-post");
                serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
                //  serializedData.push({name: "sys_lang_id", value: sys_lang_id});
                $.ajax({
                    url: base_url + "add-child-option-post",
                    type: "post",
                    data: serializedData,
                    success: function (response) {
                        
                        $("#opt_name").val('');
                         $("#opt_weightage").val('');
                        form[0].reset();
                       // $(".bs-example-modal-center").modal('hide');
                        //  $(".variation-options-container").empty();

                        var obj = JSON.parse(response);
                        console.log(obj.result);
                        if (obj.result == 1) {
                            document.getElementById("response_add_child_option").innerHTML = obj.html_content;
                        }
                    }
                });
        });
    
	});

	 //add product variation option
	 function add_option(id) {
       // $("#btn-variation-text-add-" + id).css("visibility", "hidden");
      //  $("#sp-options-add-" + id).show();
        var data = {
            "question_id": id,
            "csrf_modesy_token": getCookie('csrf_modesy_token')
        };
      //  csrf_modesy_token
       // data[csfr_token_name] = $.cookie(csfr_cookie_name);
        $.ajax({
            url: base_url + "add-question-option",
            type: "post",
            data: data,
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.result == 1) {
                    document.getElementById("response_add_option").innerHTML = obj.html_content;
                }
                setTimeout(
                    function () {
                        $("#addOptionModal").modal('show');
                       // $("#btn-variation-text-add-" + id).css("visibility", "visible");
                        $("#sp-options-add-" + id).hide();
                    }, 250);
            }
        });
    }

/////////child option
//add product variation option
	 function add_child_option(ques_id,opt_id) {
       // $("#btn-variation-text-add-" + id).css("visibility", "hidden");
      //  $("#sp-options-add-" + id).show();
        var data = {
            "ques_id": ques_id,
            "opt_id": opt_id,
            "csrf_modesy_token": getCookie('csrf_modesy_token')
        };
      //  csrf_modesy_token
       // data[csfr_token_name] = $.cookie(csfr_cookie_name);
        $.ajax({
            url: base_url + "add-child-option",
            type: "post",
            data: data,
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.result == 1) {
                    document.getElementById("response_add_child_option").innerHTML = obj.html_content;
                }
                setTimeout(
                    function () {
                        $("#addChildOptionModal").modal('show');
                       // $("#btn-variation-text-add-" + id).css("visibility", "visible");
                        $("#sp-options-add-" + id).hide();
                    }, 250);
            }
        });
    }




  //get question option
  function get_options(id) {
       // $("#btn-variation-text-add-" + id).css("visibility", "hidden");
      //  $("#sp-options-add-" + id).show();
        var data = {
            "question_id": id,
            "csrf_modesy_token": getCookie('csrf_modesy_token')
        };
      //  csrf_modesy_token
       // data[csfr_token_name] = $.cookie(csfr_cookie_name);
        $.ajax({
            url: base_url + "get-question-option",
            type: "post",
            data: data,
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.result == 1) {
                    document.getElementById("response_option").innerHTML = obj.html_content;
                    
                  //  getTooltip();
                  // $('#viewopt').tooltip('hide');
                }
                setTimeout(
                    function () {
                        $("#OptionModal").modal('show');
                       // $("#btn-variation-text-add-" + id).css("visibility", "visible");
                        //$("#sp-options-add-" + id).hide();
                    }, 250);
            }
        });
    }


  //get child option
  function get_child_options(ques_id,opt_id) {
       // $("#btn-variation-text-add-" + id).css("visibility", "hidden");
      //  $("#sp-options-add-" + id).show();
      
        var data = {
            "opt_id": opt_id,
            "ques_id": ques_id,
            "csrf_modesy_token": getCookie('csrf_modesy_token')
        };
      //  csrf_modesy_token
       // data[csfr_token_name] = $.cookie(csfr_cookie_name);
        $.ajax({
            url: base_url + "get-question-child-option",
            type: "post",
            data: data,
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.result == 1) {
                    document.getElementById("response_child_option").innerHTML = obj.html_content;
                  //  getTooltip();
                }
                setTimeout(
                    function () {
                        $("#childOptionModal").modal('show');
                       // $("#btn-variation-text-add-" + id).css("visibility", "visible");
                        //$("#sp-options-add-" + id).hide();
                    }, 250);
            }
        });
    }

    //edit product variation option
	 function edit_question_option(ques_id,opt_id) {
       // $("#btn-variation-text-add-" + id).css("visibility", "hidden");
      //  $("#sp-options-add-" + id).show();
        var data = {
            "ques_id": ques_id,
            "opt_id": opt_id,
            "csrf_modesy_token": getCookie('csrf_modesy_token')
        };
      //  csrf_modesy_token
       // data[csfr_token_name] = $.cookie(csfr_cookie_name);
        $.ajax({
            url: base_url + "edit-question-option",
            type: "post",
            data: data,
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.result == 1) {
                    document.getElementById("response_edit_option").innerHTML = obj.html_content;
                }
                setTimeout(
                    function () {
                        $("#editOptionModal").modal('show');
                       // $("#btn-variation-text-add-" + id).css("visibility", "visible");
                        //$("#sp-options-add-" + id).hide();
                    }, 250);
            }
        });
    }

//edit product variation option
	 function edit_question_child_option(ques_id,opt_id) {
       // $("#btn-variation-text-add-" + id).css("visibility", "hidden");
      //  $("#sp-options-add-" + id).show();
        var data = {
            "ques_id": ques_id,
            "opt_id": opt_id,
            "csrf_modesy_token": getCookie('csrf_modesy_token')
        };
      //  csrf_modesy_token
       // data[csfr_token_name] = $.cookie(csfr_cookie_name);
        $.ajax({
            url: base_url + "edit-question-child-option",
            type: "post",
            data: data,
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.result == 1) {
                    document.getElementById("response_edit_child_option").innerHTML = obj.html_content;
                }
                setTimeout(
                    function () {
                        $("#editChildOptionModal").modal('show');
                       // $("#btn-variation-text-add-" + id).css("visibility", "visible");
                        //$("#sp-options-add-" + id).hide();
                    }, 250);
            }
        });
    }


    $(document).on('click', '#has_child', function (){
            if ($(this).is(":checked")) {
                $(".weightage").hide();
               
               console.log('checked');
            } else {
                 console.log('unchecked');
                $(".weightage").show();
            }
        });


        function getTooltip(id){
         // Initialize tooltips
        // var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        // var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        // return new bootstrap.Tooltip(tooltipTriggerEl)
        // });
        $('#' + id).tooltip('show');
        }
       
</script>