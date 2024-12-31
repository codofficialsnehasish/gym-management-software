<?php 
$page_id=$this->uri->segment(4);
if(!empty($custom_fields)){?>
   <div class="card">
                  <div class="card-header bg-primary text-light">
                     Custom Fields
                  </div>
                  <div class="card-body">
                     <?php foreach($custom_fields as $field): 
                       $required=$field->required==1?'required':'';
                       $readonly=$field->readonly==1?'readonly="readonly"':'';
                        ?>

                     <?php if($field->type_name=='editor' || $field->type_name=='textarea'): ?>
                          <div class="mb-3">
                           <label class="form-label"><?= $field->label_name;?></label>
                        <div>
                           <textarea name="<?= $field->field_name;?>" id="<?= $field->field_id;?>" class="form-control <?= $field->type_name.' '.$field->class_name;?>" rows="5"  <?= $required;?> <?= $readonly;?>><?= get_custom_field_value($page_id,$field->field_name);?></textarea>
                        </div>
                        </div>
                     <?php  elseif($field->type_name=='radio'):
                         $option=explode(',',$field->options);
                        ?>
                   <div class="mb-3">
                        <label class="form-label mb-3 d-flex"><?= $field->label_name;?></label>
                        <?php 
                        $i=1;
                        foreach($option as $opt):?>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="<?= $field->field_id.$i;?>" name="<?= $field->field_name;?>" class="form-check-input <?= $field->class_name;?>" value="<?= $opt;?>"  <?= check_custom_radio_button(get_custom_field_value($page_id,$field->field_name),$opt);?>>
                           <label class="form-check-label" for="<?= $field->field_id.$i;?>"><?= $opt;?></label>
                        </div>
                           <?php 
                           $i++;
                           endforeach;
                           ?>
                  </div>
                  <?php elseif($field->type_name=='select'):
                     $selectoption=explode(',',$field->options);
                     ?>
                     <div class="mb-3">
                        <label class="form-label"><?= $field->label_name;?></label>
                        <div>
                           <select class="form-select" name="<?= $field->field_name;?>" id="<?= $field->field_id;?>" aria-label="Default select example">
                           <option value="deault" selected> Choose an Options</option>
                           <?php
                           foreach ($selectoption as $sopt) {?>
                           <option value="<?= $sopt;?>"  <?= check_custom_select_box(get_custom_field_value($page_id,$field->field_name),$sopt);?>><?= $sopt;?></option>
                           <?php
                           }?>
                           </select>
                        </div>
                  </div>

                     <?php elseif($field->type_name=='checkbox'):?>
                     <div class="mb-3">
                        <div class="">
                           <input type="<?= $field->type_name;?>" name="<?= $field->field_name;?>" <?= $required;?> <?= $readonly;?>  class="form-check-input me-2 <?= $field->class_name;?>" 
                           id="<?= $field->field_id;?>" value="1" <?= check_uncheck(get_custom_field_value($page_id,$field->field_name),1);?>>
                           <label class="form-label" for="<?= $field->field_id;?>"><?= $field->label_name;?></label>
                         </div>
                     </div>
                     <?php elseif($field->type_name=='file'):?>
                     <div class="mb-3">
                        <label class="form-label"><?= $field->label_name;?></label>
                        <div>
                           <?php if(get_custom_field_value($page_id,$field->field_name)!=''){?>
                        <p><img src="<?= get_image(get_custom_field_value($page_id,$field->field_name));?>" class="img-thumbnail rounded me-2" style="width: 150px;" /></p>
                        <?php }?>
                           <input data-parsley-type="alphanum" id="<?= $field->field_id;?>" type="<?= $field->type_name;?>"
                              class="form-control <?= $field->class_name;?>" 
                              placeholder="" name="<?= $field->field_name;?>" <?= $required;?> <?= $readonly;?> value="">
                              <input type="hidden" name="<?= $field->field_name;?>_hdn_file" value="<?= get_custom_field_value($page_id,$field->field_name);?>">
                           </div>
                     </div>
                     <?php else:?>
                     <div class="mb-3">
                        <label class="form-label"><?= $field->label_name;?></label>
                        <div>
                           <input data-parsley-type="alphanum" id="<?= $field->field_id;?>" type="<?= $field->type_name;?>"
                              class="form-control <?= $field->class_name;?>" 
                              placeholder="" name="<?= $field->field_name;?>" <?= $required;?> <?= $readonly;?> value="<?= get_custom_field_value($page_id,$field->field_name)?>">
                        </div>
                     </div>
                     <?php endif;
                   endforeach;?>
                     
                  </div>
    </div>
   <?php }?>
    