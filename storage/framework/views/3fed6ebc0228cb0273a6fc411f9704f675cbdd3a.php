

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <h2>Carreras</h2>
        <div class="mb-3 d-flex justify-content-end">
          <a class="btn btn-dark btn-block" href="<?php echo e(route('race.create')); ?>">Crear carrera</a>
      </div>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descipcion</th>
                  <th scope="col">Desnivel</th>
                  <th scope="col">Poster</th>
                  <th scope="col">Mapa</th>
                  <th scope="col">Participantes</th>
                  <th scope="col">Longitud</th>
                  <th scope="col">Dia</th>
                  <th scope="col">Hora</th>
                  <th scope="col">Salida</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $races; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $race): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="align-middle">
                        <th><?php echo e($race->name); ?></th>
                        <td><?php echo e($race->description); ?></td>
                        <td><?php echo e($race->unevenness); ?></td>
                        <td><img class="rounded" width="100" src="<?php echo e(asset('storage/' .$race->promotional_poster)); ?>" /></td>
                        <td><iframe src="<?php echo e($race->map_frame); ?>"
                        width="100" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </td>
                        <td><?php echo e($race->number_of_competitors); ?></td>
                        <td><?php echo e($race->length); ?></td>
                        <td><?php echo e(date('d/m/Y' ,strtotime($race->start_date))); ?></td>
                        <td><?php echo e($race->start_time); ?></td>
                        <td><?php echo e($race->start_point); ?></td>
                        <td><?php echo e($race->price); ?> €</td>
                        <td><a href="<?php echo e(route('race.edit', $race)); ?>"><img width="40" height="40" src="<?php echo e(asset('img/edit.svg')); ?>" alt="" srcset=""></a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
        </table>
        

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\b1keroll\resources\views/admin/race/list.blade.php ENDPATH**/ ?>