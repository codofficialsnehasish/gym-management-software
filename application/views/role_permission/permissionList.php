<div class="card">
    <?php if(!empty($allmodules)){
            foreach($allmodules as $module){

                $subModuleConditions=array(
                    'tblName' => 'sub_module',
                    'where'   => array(
                        'module_id' => $module->id,
                        'is_visible' => 1
                    )
                    );
                 $allSubModules = $this->select->getResult($subModuleConditions);
            
    ?>
   
    <div class="card-header bg-secondary">
    <input type="checkbox" class="form-check-input me-2" onchange="checkAllModule(this,<?= $module->id;?>)" name="chk[]" id=""> <?= $module->name;?> 
    </div>

    <div class="card-body">
       
        <?php if(!empty($allSubModules)){?>
        <table id="" class="table table-sm mb-0">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>All</th>
                    <th>Create</th>
                    <th>Read</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php 
                 $i=1;
                 foreach($allSubModules as $submodule){?>
                <tr>
                    <td><?= $i++?></td>
                    <td>
                        <?= $submodule->name; ?>
                        <input type="hidden" name="module_id[]" value="<?= $submodule->id;?>">
                    </td>
                    <td><input type="checkbox" class="form-check-input me-2 module<?= $module->id;?>" onchange="checkAll(this,<?= $submodule->id;?>)" name="chk[]" id=""></td>
                    <td><input type="checkbox" class="submodule<?= $submodule->id;?> module<?= $module->id;?> form-check-input me-2" <?= check_permission($role_id,$submodule->id,'create');?> name="create<?= $submodule->id;?>" id="" value="1"></td>
                    <td><input type="checkbox" class="submodule<?= $submodule->id;?> module<?= $module->id;?> form-check-input me-2"  <?= check_permission($role_id,$submodule->id,'read');?> name="read<?= $submodule->id;?>" id="" value="1"></td>
                    <td><input type="checkbox" class="submodule<?= $submodule->id;?> module<?= $module->id;?> form-check-input me-2"  <?= check_permission($role_id,$submodule->id,'update');?> name="update<?= $submodule->id;?>" id="" value="1"></td>
                    <td><input type="checkbox" class="submodule<?= $submodule->id;?> module<?= $module->id;?> form-check-input me-2"  <?= check_permission($role_id,$submodule->id,'delete');?> name="delete<?= $submodule->id;?>" id="" value="1"></td>
                </tr>
            <?php }?>
            <tbody>
            
            
            </tbody>
        </table>
        <?php }?>
    </div>
    <?php 
            }//end module
}?>
</div> 

