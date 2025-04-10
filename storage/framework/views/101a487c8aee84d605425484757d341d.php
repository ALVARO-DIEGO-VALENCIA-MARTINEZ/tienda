

<?php $__env->startSection('title', 'Crear Categoría'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Crear Nueva Categoría</h1>

    
    <form action="<?php echo e(route('categories.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="description">Descripción:</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Guardar</button>
    </form>

    <a href="<?php echo e(route('categories.index')); ?>">Volver a la lista</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\categories\create.blade.php ENDPATH**/ ?>
