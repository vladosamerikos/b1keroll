
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
                    <a href="<?php echo e(route('sponsor.generateinvoicepdf', $sponsor)); ?>" class="btn btn-primary">
                      <i class="icon-download"></i> Descargar
                    </a>
                  </div>
                </div>
              </div>
              <!-- Row end -->
  
              <!-- Row start -->
              <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <img width='100' heigth='50' class="invoice-logo" src="<?php echo e(asset('storage/' .$sponsor['logo'])); ?>" alt="" srcset="">

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <address class="text-right">
                    Bikeroll , 45 NorthWest Street.<br>
                    Badalona, Barcelona.<br>
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
                      <?php echo e($sponsor->name); ?><br>
                      <?php echo e($sponsor->address); ?>

                    </address>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                  <div class="invoice-details">
                    <div class="invoice-num">
                      <div><?php echo e(date('d/m/Y' ,strtotime( date('Y-m-d')))); ?></div>
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
                          <th >Articulos</th>
                          <th></th>
                          <th >Precio</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $races; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $race): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td >
                            Patrocionamiento de <?php echo e($race->name); ?>

                          </td>
                          <td></td>
                          <td ><?php echo e($race->price); ?> €</td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if($sponsor['main_plain']==1): ?>
                          <tr>
                            <td >
                              Logo en el plano principal 
                            </td>
                            <td></td>
                            <td >200 €</td>
                          </tr>
                        <?php endif; ?>

                        <tr>
                          <td>&nbsp;</td>
                          <td >
                            <p>
                              Sub total<br>
                              IVA<br>
                            </p>
                            <h5 class="text-success"><strong>Total</strong></h5>
                          </td>			
                          <td>
                            <p>
                              <?php echo e($subtotal); ?> €<br>
                              21 %<br>
                            </p>
                            <h5 class="text-success"><strong><?php echo e($total); ?> €</strong></h5>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Row end -->
  
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\b1keroll\resources\views/admin/sponsor/invoice.blade.php ENDPATH**/ ?>