

<?php $__env->startSection('title', 'Lista de Categorías'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Lista de Categorías</h1>

    <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary">Agregar Categoría</a>

    <?php if(session('success')): ?>
        <p style="color: green;"><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <?php if($categories->count() > 0): ?>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($category->name); ?></td>
                    <td>
                        <a href="<?php echo e(route('categories.edit', $category)); ?>">Editar</a>
                        <form action="<?php echo e(route('categories.destroy', $category)); ?>" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar esta categoría?');" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" style="color: red;">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>

        <?php echo e($categories->links()); ?>

    <?php else: ?>
        <p>No hay categorías disponibles.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\categories\index.blade.php ENDPATH**/ ?>
