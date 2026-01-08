

<?php $__env->startSection('content'); ?>
<h2 class="mb-4">✏️ Editar Seudónimo</h2>

<form action="<?php echo e(route('seudonimos.update', $seudonimo->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="mb-3">
        <label class="form-label">Autor</label>
        <select name="autor_id" class="form-control" required>
            <?php $__currentLoopData = $autores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($autor->id); ?>"
                    <?php echo e(old('autor_id', $seudonimo->autor_id) == $autor->id ? 'selected' : ''); ?>>
                    <?php echo e($autor->nombre_real); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre pluma</label>
        <input type="text"
               name="nombre_pluma"
               class="form-control"
               value="<?php echo e(old('nombre_pluma', $seudonimo->nombre_pluma)); ?>"
               required>
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="<?php echo e(route('seudonimos.index')); ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-biblioteca\resources\views/seudonimos/edit.blade.php ENDPATH**/ ?>