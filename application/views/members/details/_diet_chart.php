<div class="card">
    <div class="card-body">
    <h4 class="card-title">Diet Chart</h4>
    <p class="card-title-desc"><?= $user->full_name;?></p>
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Diet Name </th>
                    <th>Meal Type </th>
                    <th>Food Item</th>
                    <th>Carbs</th>
                    <th>Protein</th>
                    <th>Fats</th>
                    <th>Calories</th>
                    <th>Do's</th>
                    <th>Dont's</th>
                    <?php if ($this->permission->method('diet_chart', 'delete')->access()) { ?>
                    <th>Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody id="dietchartdata"></tbody>
        </table>
   </div>
</div>
<?php if ($this->permission->method('diet_chart', 'create')->access()) {  ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add New Weight Chart</h4>
        <p class="card-title-desc">&nbsp;</p>
        <form class="row g-3 custom-validation" id="member_diet_logs" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?= $this->uri->segment(3); ?>" >
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Diet Name</label>
                <input type="text" class="form-control" name="diet_name" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Meal Type</label>
                <select class="form-select" name="meal_type" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Snack">Snack</option>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Food Item</label>
                <input type="text" class="form-control" name="food_items" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Carbs</label>
                <input type="number" step="0.01" class="form-control" name="carbs" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Protein</label>
                <input type="number" step="0.01" class="form-control" name="protein" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Fats</label>
                <input type="number" step="0.01" class="form-control" name="fats" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Calories</label>
                <input type="number" class="form-control" name="calories" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Do's <span class="text-danger">Add coma(,) seperated to show bullet</span></label>
                <textarea class="form-control" name="dos" id="validationCustom01" placeholder=""></textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Dont's <span class="text-danger">Add coma(,) seperated to show bullet</span></label>
                <textarea class="form-control" name="donts" id="validationCustom01" placeholder=""></textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary qinfoBtn" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
<?php } ?>