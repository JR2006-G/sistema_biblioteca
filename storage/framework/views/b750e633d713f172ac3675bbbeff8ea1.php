

<?php $__env->startSection('content'); ?>
<h2 class="mb-3">✍️ Seudónimos</h2>

<a href="<?php echo e(route('seudonimos.create')); ?>" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Nuevo Seudónimo
</a>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>Autor</th>
            <th>Nombre pluma</th>
            <th width="150">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $seudonimos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($s->autor->nombre_real); ?></td>
            <td><?php echo e($s->nombre_pluma); ?></td>
            <td>
                <!-- EDITAR -->
                <a href="<?php echo e(route('seudonimos.edit', $s->id)); ?>" 
                   class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i>
                </a>

                <!-- ELIMINAR -->
                <form action="<?php echo e(route('seudonimos.destroy', $s->id)); ?>" 
                      method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Eliminar este seudónimo?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-biblioteca\resources\views/seudonimos/index.blade.php ENDPATH**/ ?>