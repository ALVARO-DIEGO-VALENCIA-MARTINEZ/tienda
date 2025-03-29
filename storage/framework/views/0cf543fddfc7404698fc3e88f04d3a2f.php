

<?php $__env->startSection('title', 'Agregar Producto'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Agregar Producto</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>" required>

        <label for="description">Descripción:</label>
        <textarea name="description"><?php echo e(old('description')); ?></textarea>

        <label for="price">Precio:</label>
        <input type="number" name="price" value="<?php echo e(old('price')); ?>" step="0.01" required>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?php echo e(old('stock')); ?>" required>

        <label for="category_id">Categoría:</label>
        <select name="category_id" required>
            <option value="">Seleccione una categoría</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="image">Imagen:</label>
        <input type="file" name="image">

        <button type="submit">Guardar Producto</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\products\create.blade.php ENDPATH**/ ?>
