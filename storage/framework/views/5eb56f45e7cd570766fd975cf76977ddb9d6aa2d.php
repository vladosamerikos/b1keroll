

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <h2>Patrocinadores</h2>
        <div class="mb-3 d-flex justify-content-end">
            <a class="btn btn-dark btn-block" href="<?php echo e(route('sponsor.create')); ?>">Crear patrocinador</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">CIF</th>
                  <th scope="col">Logo</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Plano principal</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $sponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="align-middle">
                        <th><?php echo e($sponsor->cif); ?></th>
                        <th><img class="rounded" width="100" src="<?php echo e(asset('storage/' .$sponsor->logo)); ?>" /></th>
                        <td><?php echo e($sponsor->name); ?></td>
                        <td><?php echo e($sponsor->address); ?></td>
                        <td><?php if($sponsor->main_plain == 1){
                            echo"Si";
                        }else{
                           echo"No";
                        }?></td>
                        <td><a href="<?php echo e(route('sponsor.edit', $sponsor)); ?>"><img width="40" height="40" src="<?php echo e(asset('img/edit.svg')); ?>" alt="" srcset=""></a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
        </table>
        

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\b1keroll\resources\views/admin/sponsor/list.blade.php ENDPATH**/ ?>