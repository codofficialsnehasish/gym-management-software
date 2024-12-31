<style>
   td{
      text-align: center;
   }
</style>
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Custom Fields</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('custom-fields')?>">Custom Fields</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add new Custom Field</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('custom-fields/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                     <i class="fas fa-arrow-left me-2"></i> Back
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row mb-5">
      <?php $this->load->view('admin/partials/_messages');?>
      </div>
      <!-- end page title -->
      <?= form_open_multipart('admin/custom-fields/update-process', 'class="custom-validation"');?>
      
         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                        Custom Fields
                     </div>
                  <div class="card-body">
                  <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                <th>Sl No.</th>
                                                <th>Type</th>
                                                <th>Label Name</th>
                                                <th>Class Name(optional)</th>
                                                <th>Required</th>
                                                <th>Readonly</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allfields as $field):?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><?= select_value_by_id($this->type_master,'type_id',$field->type_id,'type_name');;?></td>
                                                    <td><?= $field->label_name;?></td>
                                                    <td><?= $field->class_name;?> </td>
                                                    <td><?= check_TrueFlase($field->required);?> </td>
                                                    <td><?= check_TrueFlase($field->readonly);?> </td>
                                                   
                                                    <td>
                                                        <!-- <a href="<?= admin_url('custom-fields/edit-meta/'.$field->page_id);?>" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                                                <i class="fas fa-pencil-alt" title="Edit"></i>
                                                            </a> -->
                                                            <a  href="<?= admin_url('custom-fields/delete-meta/'.$field->id);?>" class="btn btn-danger btn-sm edit"  onclick="return confirm('Are you sure you want to delete this item?');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $field->id;?>">
                                                                <i class="fas fa-trash-alt" title="Remove"></i>
                                                            </a></td>
                                                </tr>
                                                <?php endforeach;?>
                                               
                                            </tbody>
                                        </table>

                           <table width="100%" cellpadding="5" cellspacing="5" id="table_repeter">
                              <tr>
                                 <th width="20%">Type</th>
                                 <th width="30%">Label Name</th>
                                 <th width="30%">Class Name(optional)</th>
                                 <th width="8%">Required</th>
                                 <th width="8%">Readonly</th>
                                 <th width="4%">&nbsp;</th>
                              </tr>
                              <tr>
                                 <td>
                                 <select class="form-select" name="type_id[]"  id="type_id_1" onchange="setoptionval(this.value,1);" aria-label="Default select example">
                                 <option value="">None</option>
                                 <?php foreach($type_master as $type){?>
                                       <option value="<?= $type->type_id;?>"><?= $type->type_name;?></option>
                                       <?php }?> 
                                 </select>
                              </td>
                              <td>
                              <input type="text" name="label_name[]" id="label_name_1" class="form-control"/>
                              <input type="text" class="form-control mt-3" name="option[]" id="option_1" placeholder="e.g opt1,opt2,opt3" style="display:none;"/>
                              </td>
                              <td>
                              <input type="text" name="class_name[]" id="class_name_1" class="form-control" placeholder="eg. form-control btn"/>
                              </td>
                              <td>
                                 <input type="checkbox" name="required[]" class="form-check-input me-2" id="customCheck1">
                              </td>
                              <td>
                                 <input type="checkbox" name="readonly[]" class="form-check-input me-2" id="customCheck1">
                              </td>
                              </tr>
                           </table>
                           <div  id="more1"><a class="btn btn-success btn-sm float-end" href="javascript:;" onClick="showMore_edit('field_1');"><i class="fa fa-plus"></i>Add More</a></div>
                           <p>&nbsp;</p>
                           <input type="hidden" name="cont" id="cont" value="1" />
                  </div>
               </div>
               
            </div>
            <!-- end col -->
            <div class="col-lg-3">
            <div class="card">
                  <div class="card-header bg-primary text-light">
                     Template
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <select class="form-select" name="page_id" aria-label="Default select example" required>
                        <option value="">Choose a Page</option>
                        <?php foreach($allpages as $page):?>
                        <option value="<?= $page->page_id?>" <?= $field->page_id==$page->page_id?'selected':'';?>><?= $page->page_title;?></option>
                        <?php endforeach;?>
                        </select>
                     </div>
                  </div>
               </div>

               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Publish
                  </div>
                  <div class="card-body">
                  <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" <?= check_uncheck($field->is_visible,1);?>>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0" <?= check_uncheck($field->is_visible,0);?>>
                           <label class="form-check-label" for="customRadioInline2">Hide</label>
                        </div>
                     </div>
                   
                     <div class="mb-0">
                        <div>
                           <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                           Save & Publish
                           </button>
                           <!-- <button type="reset" class="btn btn-secondary waves-effect">
                              Cancel
                              </button> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end col -->
         </div>
         <!-- end row -->
      <?= form_close();?>
   </div>
   <!-- container-fluid -->
</div>

<script type="text/javascript">
              function showMore_edit(id)
              {
                var idd = id.split("_");
                var idty = parseInt(idd[1]);
                idty = idty + 1;
                var table = document.getElementById("table_repeter");
                var rowCount = table.rows.length;
                var row = table.insertRow(rowCount);
                var cell0 = row.insertCell(0);
                var rowCount = table.rows.length;
                var row = table.insertRow(rowCount);
                var cell1 = row.insertCell(0);
				var cell2 = row.insertCell(1);
				var cell3 = row.insertCell(2);
				var cell4 = row.insertCell(3);
				var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
                document.getElementById("cont").value = idty;
               
				
			    cell1.innerHTML = '<select class="form-select" name="type_id[]" id="type_id_'+idty+'" aria-label="Default select example" onchange="setoptionval(this.value,'+idty+');"><?php foreach($type_master as $type){?><option value="<?= $type->type_id;?>"><?= $type->type_name;?></option><?php }?></select>';
				
				 cell2.innerHTML = '<input type="text" class="form-control" name="label_name[]" id="label_name_'+idty+'" /><input type="text" class="form-control mt-3" name="option[]" id="option_'+idty+'" placeholder="e.g opt1,opt2,opt3" style="display:none;"/>';

				 cell3.innerHTML = '<input type="text" class="form-control" name="class_name[]" id="class_name_'+idty+'" placeholder="eg. form-control btn" />';

             cell4.innerHTML = '<input type="checkbox" class="form-check-input me-2" name="required[]" id="required_'+idty+'" />';
				  
				 cell5.innerHTML = '<input type="checkbox" class="form-check-input me-2" name="readonly[]" id="readonly_'+idty+'" />';
                 
             cell6.innerHTML = "<a  href=\"javascript:;\" class=\"btn btn-danger btn-sm\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Remove this Item\" onClick=\"deleteRow(this)\"><i class=\"ti-trash\"></i></a>";

				  
			 document.getElementById("more1").innerHTML = "<a class=\"btn btn-success btn-sm float-end\" href=\"javascript:;\" onClick=\"showMore_edit('field_" + idty + "');\"><i class=\"fa fa-plus\"></i>Add More</a>";
                
                
            }
      
	  
	  function setoptionval(valu,id)
	  {
		  if(valu==10 || valu==17)
		  {
		  $('#option_'+id).show();
		  }
		  else
		  {
		  $('#option_'+id).hide();
		  }
	  }
      function deleteRow(btn) {
            if (confirm("Are You Sure?") == true) {
                var row = btn.parentNode.parentNode;
                    row.parentNode.removeChild(row);
            } else {
            }
		}
 
 </script>

                                            
