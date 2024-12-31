<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Booking</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('booking')?>">Booking</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add New Booking</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('booking/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                     <i class="fas fa-arrow-left me-2"></i> Back
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row mb-5">
      <?php $this->load->view('partials/_messages');?>
      </div>
      <!-- end page title -->
      <?= form_open_multipart('booking/process', 'class="needs-validation repeater" novalidate' );?>
      
         <div class="row">
         <div class="col-lg-4">
            <div class="card">
               <div class="card-header bg-primary text-light">
                  Occupant Details
               </div>
               <div class="card-body">
                  <div class="mb-3">
                     <label class="form-label">Date</label>
                     <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                           <input type="text" class="form-control" name="start_date" placeholder="Check In" autocomplete="off" required/>
                           <!-- <div class="invalid-feedback">This Field is Required</div> -->
                           <input type="text" class="form-control" name="end_date" placeholder="Check Out" autocomplete="off" required/>
                           <div class="invalid-feedback">This Field is Required</div>
                     </div>
                  </div>

                  <div class="mb-3">
                     <label class="form-label">Name</label>
                     <div>
                        <input data-parsley-type="text" type="text"
                           class="form-control" required
                           placeholder="" name="name" value="" required>
                           <div class="invalid-feedback">This Field is Required</div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Phone</label>
                     <div>
                        <input data-parsley-type="text" type="text"
                           class="form-control" required
                           placeholder="" name="phone" value="" required>
                           <div class="invalid-feedback">This Field is Required</div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Address</label>
                     <div>
                        <textarea
                           class="form-control" required
                           placeholder="" name="addr"  required></textarea>
                        <div class="invalid-feedback">This Field is Required</div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Id Proof</label>
                     <div>
                            <select class="form-select" name="doc_proof" aria-label="Default select example" required>
                                 <option value="">Choose</option>
                                 <?php if(!empty($documents)):
                                       foreach($documents as $doc):
                                    ?>
                                 <option value="<?= $doc->id?>"><?= $doc->name;?></option>
                                 <?php endforeach;
                                    endif;
                                    ?>
                           </select>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Id No.</label>
                     <div>
                        <input data-parsley-type="text" type="text"
                           class="form-control" required
                           placeholder="" name="id_no" value="" required>
                           <div class="invalid-feedback">This Field is Required</div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Mode of Transportation</label>
                     <div>
                        <input data-parsley-type="text" type="text"
                           class="form-control" required
                           placeholder="" name="mode_of_transport" value="" required>
                           <div class="invalid-feedback">This Field is Required</div>
                     </div>
                  </div>

                  </div>
            </div>
            
         </div>
           <div class="col-lg-8">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                    Package Details
                  </div>
                  <div class="card-body">
                  <div data-repeater-list="group-a">
                     <div data-repeater-item class="row">
                           <div  class="mb-3 col-lg-3">
                              <label class="form-label" for="name">Room</label>
                                 <select class="form-select" name="room" aria-label="Default select example"  required>
                                    <option value="">Choose</option>
                                    <?php if(!empty($allrooms)):
                                          foreach($allrooms as $room):
                                       ?>
                                    <option value="<?= $room->id?>"><?= $room->name;?></option>
                                    <?php endforeach;
                                       endif;
                                     ?>
                                 </select>
                           </div>

                           <div  class="mb-3 col-lg-3">
                              <label class="form-label" for="email">Rate</label>
                              <input type="text" name="rate" id="rate" class="form-control" required/>
                           </div>

                           <div  class="mb-3 col-lg-3">
                              <label class="form-label" for="subject">No of Heads</label>
                              <input type="number" name="no_of_heads"  class="form-control noh" onblur="OnBlurInput (this)" onfocus="OnFocusInput (this)" value="" required/>
                           </div>

                           <div class="mb-3 col-lg-2">
                              <label class="form-label" for="resume">Child</label>
                              <input type="number" name="child" onblur="OnBlurInput (this)" onfocus="OnFocusInput (this)" value="" class="form-control noh" required />
                              
                           </div>
<!-- 
                           <div class="mb-3 col-lg-2">
                              <label class="form-label" for="resume">Driver</label>
                              <input type="number" name="driver" class="form-control" id="resume">
                              
                           </div> -->

                           
                           <div class="col-lg-1 col-sm-4 align-self-center">
                              <div class="d-grid">
                                 <button data-repeater-delete type="button" class="btn btn-danger mb-2">
                                  <i class="fas fa-trash-alt" title="Remove"></i>
                                 </button>
                              </div>    
                           </div>
                           
                     </div>
                     
                  </div>
                  <button data-repeater-create type="button" class="btn btn-success mt-2 mt-sm-0" >
                  <i class="fas fa-plus"></i> Add More</button>
                   </div>
               </div>


               <div class="card">
                  <div class="card-body">
                  <div class="row">
                      <div class="col-lg-8">
                        <div class="mb-3">
                           <label class="form-label">Driver</label>
                            <div>
                              <input data-parsley-type="text" type="text"
                                 class="form-control" required
                                 placeholder="" name="driver" onblur="OnBlurInput (this)" onfocus="OnFocusInput (this)"  value="0" required>
                                 <div class="invalid-feedback">This Field is Required</div>
                           </div>
                       </div>
                       </div>
                       <div class="col-lg-4 mt-4">
                      <div class="mb-0 ">
                        <div>
                           <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                           Save & Publish
                           </button>
                        </div>
                     </div>
                   </div>
                  </div>
                  </div>
               </div>

            </div>

          
         </div>
         <!-- end row -->
      <?= form_close();?>
   </div>
   <!-- container-fluid -->
</div>

