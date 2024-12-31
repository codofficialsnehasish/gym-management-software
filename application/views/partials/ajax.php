<?php $this->load->view('partials/customScript');?>
<script>
        const getUrl = window.location;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";

    $(document).ready(function() {

        $(document).on("submit", "#loginForm", function (event) {
            $('.login').prop("disabled", true);
            $('.login').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            var form = $("#loginForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "auth-process",
                type: "post",
                data: serializedData,
                dataType: "json",
                beforeSend: function() {
                    showToast('info','','Processing Your Request');
                },
                success: function (response) {
                    clearTost();
                   // $('.loader2').hide();
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                            form[0].reset();  
                            showToast('success','',response.msg); 
                            setTimeout("pageRedirect()", 3000);
                    }else{
                           $('.login').prop("disabled", false);
                           $('.login').html('login');
                           let numbersArray = response.msg.split('\n');
                          $.each(numbersArray, function(index, value) { 
                         // console.log(index + ': ' + value);
                          showToast('error','',value);
                        });
                    }
                }
        });
        event.preventDefault();
    });

 });

 console.log(`Base Url= ${base_url}`);
function pageRedirect() {
        window.location.replace(base_url + "dashboard");
    }      
   

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function isMobile(mobile){
    var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
    return re.test(mobile);
}


</script>