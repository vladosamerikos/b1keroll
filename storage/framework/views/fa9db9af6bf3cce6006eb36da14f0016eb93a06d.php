

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <h2>Carreras</h2>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descipcion</th>
                  <th scope="col">Desnivel</th>
                  <th scope="col">Participantes</th>
                  <th scope="col">Longitud</th>
                  <th scope="col">Dia</th>
                  <th scope="col">Hora</th>
                  <th scope="col">Salida</th>
                  <th scope="col">Precio</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $races; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $race): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($race->name); ?></th>
                        <td><?php echo e($race->description); ?></td>
                        <td><?php echo e($race->unevenness); ?></td>
                        <td><?php echo e($race->number_of_competitos); ?></td>
                        <td><?php echo e($race->length); ?></td>
                        <td><?php echo e($race->start_date); ?></td>
                        <td><?php echo e($race->start_time); ?></td>
                        <td><?php echo e($race->start_point); ?></td>
                        <td><?php echo e($race->price); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
        </table>
        

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\b1keroll\resources\views/admin/racelist.blade.php ENDPATH**/ ?>