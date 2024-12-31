<style>
    .activeImg{
        border:2px solid #26d926;
    } 
 </style>  
<script src="<?= base_url('assets/admin/libs/dropzone/min/dropzone.min.js');?>"></script>
 <script type="text/javascript">
    $(document).ready(function() {
      
      $('#openLibrary,#getLibrabry').click(function(){
     const  base_url= '<?= base_url();?>';
          $.ajax({
              url : "<?= admin_url('media/getLibrary'); ?>",
              //data:{id : id},
              method:'GET',
              dataType:'json',
              beforeSend: function(){
                $("#respon").append('<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>');
                    $("#openLibrary").append('<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>');
                },
              success:function(response) {
                  $('#fullscreenModal').modal('show');
                $.each(response , function(index, item) { 
              $("#respon").append('<img id="'+item.media_id+'"  class="img-thumbnail rounded me-2 mediaImg" alt="100x100" width="100" style="max-width: 100px;margin-bottom: 15px;" src="'+base_url+item.media_img_url+'" data-holder-rendered="true">');
               });
               $('.spinner-border').hide();
            }
          });
      });

      $('#fullscreenModal').on('hidden.bs.modal', function () {
        $("#respon").html('');
});
   
$('#categoryWiseGallery').on('hidden.bs.modal', function () {
        $("#categoryRespon").html('');
});

   
      


    $(document).on("click",".mediaImg",function(e){
              var listItems = $(".mediaImg");
             // console.log(listItems.length); 
              for (let i = 0; i < listItems.length; i++) {
                  listItems[i].classList.remove("activeImg");
              }
              this.classList.add("activeImg");
              $('#media_id').val(this.id);
              $('#blah').attr('style','display:block;');
              $('#blah').attr('src',$('#'+this.id).attr('src'));

            //   $('#categoryblah').attr('style','display:block;');
            //   $('#categoryblah').attr('src',$('#'+this.id).attr('src'));         
    });

    $(document).on("click",".catImg",function(e){
              var listItems = $(".catImg");
              var sl = $('#sll').val();
           
             // console.log(listItems.length); 
              for (let i = 0; i < listItems.length; i++) {
                  listItems[i].classList.remove("activeImg");
              }
              this.classList.add("activeImg");
              $('#media_id_'+sl).val(this.id);
              $('#categoryblah_'+sl).attr('style','display:block;width:80px;');
              $('#categoryblah_'+sl).attr('src',$('#'+this.id).attr('src'));         
    });

    



          $('#uploadFromComputer').on('click', function () {
             $("#respon").html('');
          });
          
 });

imgInp.onchange = evt => {
   const [file] = imgInp.files
   if (file) {
   blah.style.display='block';
   blah.src = URL.createObjectURL(file);
   $('#media_id').val('');
   }
}

imgInp2.onchange = evt => {
   const [file] = imgInp2.files
   if (file) {
   blah2.style.display='block';
   blah2.src = URL.createObjectURL(file);
   $('#media_id').val('');
   }
}

workexpimgInp.onchange = evt => {
   const [file] = workexpimgInp.files
   if (file) {
   workexpblah.style.display='block';
   workexpblah.src = URL.createObjectURL(file);
   $('#media_id').val('');
   }
}

achivementimgInp.onchange = evt => {
   const [file] = achivementimgInp.files
   if (file) {
      achivementblah.style.display='block';
      achivementblah.src = URL.createObjectURL(file);
      $('#media_id').val('');
   }
}
///////
imgInplogo.onchange = evt => {
   const [file] = imgInplogo.files
   if (file) {
   blahlogo.style.display='block';
   blahlogo.src = URL.createObjectURL(file);
   $('#logo_media_id').val('');
   }
}

///////
imgInplogoemail.onchange = evt => {
  const [file] = imgInplogoemail.files
  if (file) {
    blahlogoemail.style.display='block';
    blahlogoemail.src = URL.createObjectURL(file);
    $('#email_logo_media_id').val('');
  }
}
///////
imgInpfav.onchange = evt => {
  const [file] = imgInpfav.files
  if (file) {
    blahFav.style.display='block';
    blahFav.src = URL.createObjectURL(file);
    $('#favicon_media_id').val('');
  }
}


function getCategoryWiseImage(id,sl){
     const  base_url= '<?= base_url();?>';
     $("#categoryRespon").append('<input type="hidden" class="sll" value="" />');
          $.ajax({
              url : "<?= admin_url('media/getCategoryLibrary'); ?>",
              data:{cat_id : id},
              method:'GET',
              dataType:'json',
              beforeSend: function(){
                $("#respon").append('<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>');
                    $("#openLibrary").append('<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>');
                },
              success:function(response) {
                  $('#categoryWiseGallery').modal('show');
                  $("#categoryRespon").append('<input type="hidden" id="sll" value="'+sl+'" />');
                $.each(response , function(index, item) { 
              $("#categoryRespon").append('<img id="'+item.media_id+'"  class="img-thumbnail rounded me-2 catImg" alt="100x100" width="100" style="max-width: 100px;margin-bottom: 15px;" src="'+base_url+item.media_img_url+'" data-holder-rendered="true">');
              
            });
               $('.spinner-border').hide();
            }
          });
      }

</script>
    <!-- sample modal content -->
<div id="fullscreenModal" class="modal fade" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Media
               Gallery
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
               aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="getLibrabry" data-bs-toggle="tab" href="#home" role="tab">
                  <span class="d-none d-md-block">Media Library</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="uploadFromComputer"  data-bs-toggle="tab" href="#profile" role="tab">
                  <span class="d-none d-md-block">Upload From Computer</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                  </a>
               </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
               <div class="tab-pane active p-3" id="home" role="tabpanel">
                  <div class="col-md-12 mb-0 mx-auto" id="respon">                      
                  </div>
                  <div class="modal-footer">
                     <button type="button"
                        class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal">Set Image
                     </button>
                  </div>
               </div>
               <div class="tab-pane p-3" id="profile" role="tabpanel">
                  <p class="mb-0">
                     <?php echo form_open_multipart('admin/media/process', array('class' => 'dropzone'));?>        
                  <div class="fallback">
                     <input name="file" type="file" multiple="multiple">
                  </div>
                  <div class="dz-message needsclick">
                     <div class="mb-3">
                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                     </div>
                     <h4>Drop files here or click to upload.</h4>
                  </div>
                  <?php echo form_close();?>
                  </p>
               </div>
            </div>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div id="categoryWiseGallery" class="modal fade" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Media
               Gallery
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
               aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="getLibrabry" data-bs-toggle="tab" href="#home" role="tab">
                  <span class="d-none d-md-block">Media Library</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="uploadFromComputer"  data-bs-toggle="tab" href="#profile" role="tab">
                  <span class="d-none d-md-block">Upload From Computer</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                  </a>
               </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
               <div class="tab-pane active p-3" id="home" role="tabpanel">
                  <div class="col-md-12 mb-0 mx-auto" id="categoryRespon">                      
                  </div>
                  <div class="modal-footer">
                     <button type="button"
                        class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal">Set Image
                     </button>
                  </div>
               </div>
               <div class="tab-pane p-3" id="profile" role="tabpanel">
                  <p class="mb-0">
                     <?php echo form_open_multipart('admin/media/process', array('class' => 'dropzone'));?>        
                  <div class="fallback">
                     <input name="file" type="file" multiple="multiple">
                  </div>
                  <div class="dz-message needsclick">
                     <div class="mb-3">
                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                     </div>
                     <h4>Drop files here or click to upload.</h4>
                  </div>
                  <?php echo form_close();?>
                  </p>
               </div>
            </div>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->