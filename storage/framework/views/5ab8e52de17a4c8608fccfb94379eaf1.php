

<?php $__env->startSection('title', 'Editar Producto'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Editar Producto</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="name">Nombre del Producto:</label>
        <input type="text" name="name" id="name" value="<?php echo e(old('name', $product->name)); ?>" required>

        <label for="description">Descripción:</label>
        <textarea name="description" id="description"><?php echo e(old('description', $product->description)); ?></textarea>

        <label for="price">Precio:</label>
        <input type="number" name="price" id="price" value="<?php echo e(old('price', $product->price)); ?>" required>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="<?php echo e(old('stock', $product->stock)); ?>" required>

        <label for="category_id">Categoría:</label>
        <select name="category_id" id="category_id" required>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id', $product->category_id) == $category->id ? 'selected' : ''); ?>>
                    <?php echo e($category->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="image">Imagen:</label>
        <input type="file" name="image" id="image">

        <button type="submit">Actualizar Producto</button>
    </form>

    <a href="<?php echo e(route('products.index')); ?>">Volver a la lista</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\products\edit.blade.php ENDPATH**/ ?>
