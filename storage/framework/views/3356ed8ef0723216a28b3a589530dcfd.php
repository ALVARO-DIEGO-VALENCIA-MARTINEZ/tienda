

<?php $__env->startSection('title', 'Editar Categoría'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Editar Categoría</h1>

    
    <?php if($errors->any()): ?>
        <div style="color: red;">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <form action="<?php echo e(route('categories.update', $category)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <label for="name">Nombre de la Categoría:</label>
        <input type="text" id="name" name="name" value="<?php echo e(old('name', $category->name)); ?>" required>
        <button type="submit">Actualizar</button>
    </form>

    <a href="<?php echo e(route('categories.index')); ?>">Volver a la lista</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\categories\edit.blade.php ENDPATH**/ ?>
