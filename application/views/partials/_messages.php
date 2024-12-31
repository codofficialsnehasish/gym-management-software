<?php if ($this->session->flashdata('errors')): 
 $arr = explode('<p>',$this->session->flashdata('errors'));
 $i=1;
foreach($arr as $er){
      if($i>1){
   $msg = rtrim(str_replace("</p>","",$er));
 ?>
      <script>
         $(document).ready(function(){
            showToast('error','Error','<?= $msg;?>');
         });
         </script>
<?php      }
   $i++;}
   endif; 
 ?>

<?php if ($this->session->flashdata('error')): ?>
   <script>
      $(document).ready(function(){
         showToast('error','Error','<?= $this->session->flashdata('error'); ?>');
      });
      </script>    
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
     <script>
      $(document).ready(function(){
         showToast('success','Success','<?= $this->session->flashdata('success'); ?>');
      });
      </script>
<?php endif; ?>


<?php if ($this->session->flashdata('info')): ?>
     <script>
      $(document).ready(function(){
         showToast('info','Info','<?= $this->session->flashdata('info'); ?>');
      });
      </script>
<?php endif; ?>


<?php if ($this->session->flashdata('warning')): ?>
     <script>
      $(document).ready(function(){
         showToast('warning','Warning','<?= $this->session->flashdata('warning'); ?>');
      });
      </script>
<?php endif; ?>
