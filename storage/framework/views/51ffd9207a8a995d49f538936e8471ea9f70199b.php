

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Edicion de Patrocinador')); ?></div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('sponsor.storeedit', $sponsor)); ?>">
                        <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Nombre')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name', $sponsor['name'])); ?>" required autocomplete="name" autofocus>

                                <?php $__errorArgs = ['name'];
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
                        </div>

                        <div>
                            <div class="mb-3 d-flex justify-content-center">
                                <img src="<?php echo e(asset('storage/' .$sponsor['logo'])); ?>"
                                alt="old logo" style="width: 300px;" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="inputImage">Cambiar Imagen</label>
                                    <input 
                                type="file" 
                                name="image" 
                                id="inputImage"
                                class="form-control d-none <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
              
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3 mt-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Dirección')); ?></label>

                            <div class="col-md-6">
                                <textarea id="address"  class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" required autocomplete="address" autofocus><?php echo e(old('address' , $sponsor['address'])); ?></textarea>

                                <?php $__errorArgs = ['address'];
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
                        </div>

                        <div class="row mb-3">
                            <label for="cif" class="col-md-4 col-form-label text-md-end"><?php echo e(__('CIF')); ?></label>

                            <div class="col-md-6">
                                <input readonly id="cif" type="text" class="form-control <?php $__errorArgs = ['cif'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cif" value="<?php echo e(old('cif', $sponsor['cif'])); ?>" required autocomplete="cif" autofocus>

                                <?php $__errorArgs = ['cif'];
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
                        </div>

                        <div class="row mb-3">
                            <label for="main_plain" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Plano Principal?')); ?></label>

                            <div class="col-md-6">
                                <select name="main_plain" class="form-select">
                                    <?php if($sponsor['main_plain']==1): ?>
                                        <option selected value="1">Sí</option>
                                        <option value="0">No</option>
                                    <?php else: ?>
                                        <option value="1">Sí</option>
                                        <option selected  value="0">No</option>
                                    <?php endif; ?>
                                </select>

                                <?php $__errorArgs = ['main_plain'];
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\b1keroll\resources\views/admin/sponsor/edit.blade.php ENDPATH**/ ?>