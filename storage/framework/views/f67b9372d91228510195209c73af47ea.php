

<?php $__env->startSection('title', 'Lista de Categorías de Blog'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Categorías de Blog</h1>

    <?php if(session('success')): ?>
        <p style="color: green;"><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <a href="<?php echo e(route('blog-categories.create')); ?>">Crear Nueva Categoría</a>

    <ul>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <strong><?php echo e($category->name); ?></strong> - <?php echo e($category->description); ?>

                <a href="<?php echo e(route('blog-categories.edit', $category)); ?>">Editar</a>
                <form action="<?php echo e(route('blog-categories.destroy', $category)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar esta categoría?')">Eliminar</button>
                </form>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php echo e($categories->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\articles\index.blade.php ENDPATH**/ ?>
