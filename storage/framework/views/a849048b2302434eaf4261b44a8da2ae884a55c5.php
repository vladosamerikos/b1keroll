

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Patrocionar carreras')); ?></div>

                <div class="card-body">
                    <form method="POST"  action=" <?php echo e(route('sponsor.storesponsoring', $sponsor)); ?>">
                        <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>

                        <div>
                            <div class="mb-3 d-flex justify-content-center">
                                <img src="<?php echo e(asset('storage/' .$sponsor['logo'])); ?>"
                                alt="old logo" style="width: 300px;" />
                            </div>
                        </div>

                        <div style="text-align:center;" class="form group mb-3">
                            <label for="races" class="col-form-label text-center"><?php echo e(__('Seleciona las carreras a las que quieres patrocionar')); ?></label>
                            <select multiple name="races[]" class="form-control">
                                <?php $__currentLoopData = $races; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $race): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($race['id']); ?>"><?php echo e($race['name']." - ".$race['price']." €"); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <?php $__errorArgs = ['races'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            
                        </div>
                        
                        <div class="row mb-0 ">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Guardar')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\b1keroll\resources\views/admin/sponsor/sponsoring.blade.php ENDPATH**/ ?>