<div class="table-responsive">
    <?php if(!empty($allroles)){?>
    <table class="table table-striped mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Role Name</th>
                <th>Asigned By</th>
                <th>Created On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;
            foreach($allroles as $role){?>
            <tr>
                <th scope="row"><?= $i++;?></th>
                <td><?= select_value_by_id('role','id',$role->role_id,'name');?></td>
                <td><?= select_value_by_id('users','id',$role->created_by,'full_name');?></td>
                <td><?= formated_date($role->created_at);?></td>
                <td>
                    <a class="btn btn-danger btn-sm edit" onclick="confirmDeleteRole(this.id,<?= $role->user_id;?>);" data-bs-toggle="tooltip" data-bs-placement="top" title="" id="<?= $role->id;?>" data-bs-original-title="Remove this Item">
                        <i class="fas fa-trash-alt" title="Remove"></i>
                    </a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <?php }else{?>
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
		   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		   <strong>Sorry!</strong> No Role Asign Yet. Please Choose Valid Role.
	   </div>
    <?php }?>
</div>