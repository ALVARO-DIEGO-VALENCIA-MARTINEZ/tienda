

<?php $__env->startSection('title', 'Crear Artículo'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Crear Nuevo Artículo</h1>

    <form action="<?php echo e(route('articles.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <label for="title">Título:</label>
        <input type="text" name="title" required>

        <label for="content">Contenido:</label>
        <textarea name="content" required></textarea>

        <label for="image">Imagen destacada:</label>
        <input type="file" name="image">

        <label for="category">Categoría:</label>
        <select name="category_id" required>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <button type="submit">Guardar</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\blog\create.blade.php ENDPATH**/ ?>
