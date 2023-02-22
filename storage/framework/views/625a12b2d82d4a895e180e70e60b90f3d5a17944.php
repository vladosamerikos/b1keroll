
<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('css/pdf.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
        <div class="card-body p-0">
          <div class="invoice-container">
            <div class="invoice-header">
  
              <!-- Row start -->
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="custom-actions-btns mb-5">
                    <a href="#" class="btn btn-primary">
                      <i class="icon-download"></i> Download
                    </a>
                    <a href="#" class="btn btn-secondary">
                      <i class="icon-printer"></i> Print
                    </a>
                  </div>
                </div>
              </div>
              <!-- Row end -->
  
              <!-- Row start -->
              <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  <a href="index.html" class="invoice-logo">
                    <img width='100' heigth='50' src="<?php echo e(asset('storage/' .$sponsor['logo'])); ?>" alt="" srcset="">
                  </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <address class="text-right">
                    Maxwell admin Inc, 45 NorthWest Street.<br>
                    Sunrise Blvd, San Francisco.<br>
                    00000 00000
                  </address>
                </div>
              </div>
              <!-- Row end -->
  
              <!-- Row start -->
              <div class="row gutters">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                  <div class="invoice-details">
                    <address>
                      Alex Maxwell<br>
                      150-600 Church Street, Florida, USA
                    </address>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                  <div class="invoice-details">
                    <div class="invoice-num">
                      <div>Invoice - #009</div>
                      <div>January 10th 2020</div>
                    </div>
                  </div>													
                </div>
              </div>
              <!-- Row end -->
  
            </div>
  
            <div class="invoice-body">
  
              <!-- Row start -->
              <div class="row gutters">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="table-responsive">
                    <table class="table custom-table m-0">
                      <thead>
                        <tr>
                          <th>Items</th>
                          <th>Product ID</th>
                          <th>Quantity</th>
                          <th>Sub Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            Wordpress Template
                            <p class="m-0 text-muted">
                              Reference site about Lorem Ipsum, giving information on its origins.
                            </p>
                          </td>
                          <td>#50000981</td>
                          <td>9</td>
                          <td>$5000.00</td>
                        </tr>
                        
                        <tr>
                          <td>&nbsp;</td>
                          <td colspan="2">
                            <p>
                              Subtotal<br>
                              Shipping &amp; Handling<br>
                              Tax<br>
                            </p>
                            <h5 class="text-success"><strong>Grand Total</strong></h5>
                          </td>			
                          <td>
                            <p>
                              $5000.00<br>
                              $100.00<br>
                              $49.00<br>
                            </p>
                            <h5 class="text-success"><strong>$5150.99</strong></h5>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Row end -->
  
            </div>
  
            <div class="invoice-footer">
              Thank you for your Business.
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\b1keroll\resources\views/admin/sponsor/invoicePDF.blade.php ENDPATH**/ ?>