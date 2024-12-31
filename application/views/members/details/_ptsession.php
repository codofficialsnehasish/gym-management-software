<div class="card">
    <div class="card-body">
        <h4 class="card-title">Workouts</h4>
        <p class="card-title-desc"><?= $user->full_name;?></p>
        <table id="" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>From Date</th>
                    <th>No Of Days Repeat</th>
                    <th>Days</th>
                    <th>Workout</th>
                    <th>Weight (Kg)</th>
                    <th>Sets</th>
                    <th>Reps</th>
                    <th>Rest (min)</th>
                    <th>Description</th>
                    <?php if ($this->permission->method('workouts', 'delete')->access()) {  ?>
                    <th>Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody id="workoutchartdata"></tbody>
        </table>
   </div>
</div>
<?php if ($this->permission->method('workouts', 'create')->access()) { ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add New Workout</h4>
        <p class="card-title-desc">&nbsp;</p>
        <form class="row g-3 needs-validation" id="workoutInfoForm" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?= $user->id;?>" />    
            <div class="col-md-6">
                <label class="form-label">From Date</label>
                <div class="input-group" id="datepicker2">
                    <!-- <input type="text" class="form-control" placeholder="dd M, yyyy"
                        data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                        data-date-autoclose="true" name="form_date"> -->
                        
                    <input type="date" class="form-control"  name="form_date" required>

                    <!-- <span class="input-group-text"><i class="mdi mdi-calendar"></i></span> -->
                </div><!-- input-group -->
            </div>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">No Of Days Repeat</label>
                <input type="number" class="form-control" id="validationCustom01" placeholder="No Of Days Repeat" name="days_repeat" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="row mt-5">
                <h2 class="text-center">Workouts</h2>
                <table width="100%" cellpadding="5" cellspacing="5" id="table_repeter">
                    <tr>
                        <th width="15%">Days</th>
                        <th width="15%">Workout</th>
                        <th width="15%">Weight (Kg)</th>
                        <th width="15%">Sets</th>
                        <th width="15%">Reps</th>
                        <th width="15%">Rest (min)</th>
                        <th width="20%">Description</th>
                        <th width="4%">&nbsp;</th>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-select" name="days[]" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="SaturDay">SaturDay</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="workout[]" required>
                                <option selected disabled value="">Choose...</option>
                                <?php if(!empty($catagory_masters)):
                                    foreach($catagory_masters as $catagory_master):
                                ?>
                                <option value="<?= $catagory_master->id;?>"><?= $catagory_master->name;?></option>
                                <?php 
                                    endforeach;    
                                endif;?>
                            </select>
                        </td>
                        <td>
                            <input type="number" class="form-control" placeholder="Weight" name="weight[]" required>
                        </td>
                        <td>
                            <input type="number" class="form-control" placeholder="Sets" name="sets[]" required>
                        </td>
                        <td>
                            <input type="number" class="form-control" placeholder="Reps" name="reps[]" required>
                        </td>
                        <td>
                            <input type="number" class="form-control" placeholder="Rest" name="rest[]" required>
                        </td>
                        <td>
                            <textarea class="form-control" placeholder="Description" name="description[]"></textarea>
                        </td>
                    </tr>
                </table>
                <div  id="more1"><a class="btn btn-success btn-sm float-end" href="javascript:;" onClick="showMore_edit('field_1');"><i class="fa fa-plus"></i>Add More</a></div>
                <p>&nbsp;</p>
                <input type="hidden" name="cont" id="cont" value="1" />
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
<?php } ?>