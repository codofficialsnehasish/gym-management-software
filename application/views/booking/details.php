<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Invoice</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">Veltrix</a></li>
                                        <li class="breadcrumb-item"><a href="#">Extra Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-cog me-2"></i> Settings
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->



                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="invoice-title">
                                                    <h4 class="float-end font-size-16"><strong>Order # 12345</strong></h4>
                                                    <h3>
                                                        Booking Details
                                                    </h3>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-4">
                                                      <div class="card">
                                                         <div class="card-header bg-primary text-light">
                                                            Booking Info
                                                         </div>
                                                         <div class="card-body">
                                                            <address>
                                                                <div class="row mb-2">
                                                                    <div class="col-sm-6">Date of Booking:</div>
                                                                    <div class="col-sm-6"><strong><?= formated_date($item->booked_on);?></strong></div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-sm-6">Check In:</div>
                                                                    <div class="col-sm-6"><strong><?= formated_date($item->start_date);?></strong></div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-sm-6">Check Out:</div>
                                                                    <div class="col-sm-6"><strong><?= formated_date($item->end_date);?></strong></div>
                                                                </div>
                                                               <strong>No. of Days:</strong>John Smith<br>
                                                               <strong>No of Heads:</strong>John Smith<br>
                                                               <strong>No. of Room(s):</strong>John Smith<br>
                                                               <strong>Booked By::</strong>John Smith<br>
                                                            </address>
                                                         </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-4">
                                                      <div class="card">
                                                         <div class="card-header bg-primary text-light">
                                                         Occupant Details
                                                         </div>
                                                         <div class="card-body">
                                                           <address>
                                                               <strong>Date of Booking:</strong>John Smith<br>
                                                               <strong>Check In:</strong>John Smith<br>
                                                               <strong>Check Out:</strong>John Smith<br>
                                                               <strong>No. of Days:</strong>John Smith<br>
                                                               <strong>No of Heads:</strong>John Smith<br>
                                                               <strong>No. of Room(s):</strong>John Smith<br>
                                                               <strong>Booked By::</strong>John Smith<br>
                                                            </address>
                                                         </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-4">
                                                      <div class="card">
                                                         <div class="card-header bg-primary text-light">
                                                            Payment Info
                                                         </div>
                                                         <div class="card-body">
                                                           <address>
                                                               <strong>Date of Booking:</strong>John Smith<br>
                                                               <strong>Check In:</strong>John Smith<br>
                                                               <strong>Check Out:</strong>John Smith<br>
                                                               <strong>No. of Days:</strong>John Smith<br>
                                                               <strong>No of Heads:</strong>John Smith<br>
                                                               <strong>No. of Room(s):</strong>John Smith<br>
                                                               <strong>Booked By::</strong>John Smith<br>
                                                            </address>
                                                         </div>
                                                      </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-6 mt-4">
                                                       
                                                    </div>
                                                    <div class="col-6 mt-4 text-end">
                                                        <address>
                                                            <strong>Order Date:</strong><br>
                                                            January 16, 2019<br><br>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>Order summary</strong></h3>
                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td><strong>Item</strong></td>
                                                                    <td class="text-center"><strong>Price</strong></td>
                                                                    <td class="text-center"><strong>Quantity</strong>
                                                                    </td>
                                                                    <td class="text-end"><strong>Totals</strong></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                                <tr>
                                                                    <td>BS-200</td>
                                                                    <td class="text-center">$10.99</td>
                                                                    <td class="text-center">1</td>
                                                                    <td class="text-end">$10.99</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>BS-400</td>
                                                                    <td class="text-center">$20.00</td>
                                                                    <td class="text-center">3</td>
                                                                    <td class="text-end">$60.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>BS-1000</td>
                                                                    <td class="text-center">$600.00</td>
                                                                    <td class="text-center">1</td>
                                                                    <td class="text-end">$600.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="thick-line"></td>
                                                                    <td class="thick-line"></td>
                                                                    <td class="thick-line text-center">
                                                                        <strong>Subtotal</strong></td>
                                                                    <td class="thick-line text-end">$670.99</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line text-center">
                                                                        <strong>Shipping</strong></td>
                                                                    <td class="no-line text-end">$15</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line text-center">
                                                                        <strong>Total</strong></td>
                                                                    <td class="no-line text-end"><h4 class="m-0">$685.99</h4></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
        
                                                        <div class="d-print-none">
                                                            <div class="float-end">
                                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                                <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div> <!-- end row -->
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
