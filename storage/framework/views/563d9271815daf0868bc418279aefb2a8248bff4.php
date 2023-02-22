

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <h2>Seguros</h2>
        <div class="mb-3 d-flex justify-content-end">
          <a class="btn btn-dark btn-block" href="<?php echo e(route('insurance.create')); ?>">Crear seguro</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">CIF</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $insurances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insurance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="align-middle">
                        <th><?php echo e($insurance->cif); ?></th>
                        <td><?php echo e($insurance->name); ?></td>
                        <td><?php echo e($insurance->address); ?></td>
                        <td><?php echo e($insurance->price_per_race); ?> €</td>
                        <td><a href="<?php echo e(route('insurance.edit', $insurance)); ?>"><img width="40" height="40" src="<?php echo e(asset('img/edit.svg')); ?>" alt="" srcset=""></a></td>
                        <td><?php if($insurance->active == 1){?>
                          <a href="<?php echo e(route('insurance.storestatus', $insurance)); ?>"><img width="40" height="40" src="<?php echo e(asset('img/on.svg')); ?>" alt="" srcset=""></a>
                        <?php }
                        else{?>
                          <a href="<?php echo e(route('insurance.storestatus', $insurance)); ?>"><img width="40" height="40" src="<?php echo e(asset('img/off.svg')); ?>" alt="" srcset=""></a>
                        <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
        </table>
        

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\b1keroll\resources\views/admin/insurance/list.blade.php ENDPATH**/ ?>