

<?php $__env->startSection('title', 'Editar Artículo'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Editar Artículo</h1>

    <form action="<?php echo e(route('articles.update', $article)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label>Título:</label>
        <input type="text" name="title" value="<?php echo e($article->title); ?>" required>

        <label>Contenido:</label>
        <textarea name="content" required><?php echo e($article->content); ?></textarea>

        <label>Imagen destacada:</label>
        <input type="file" name="image">
        <?php if($article->image): ?>
            <img src="<?php echo e(asset('storage/' . $article->image)); ?>" alt="Imagen actual" width="150">
        <?php endif; ?>

        <label>Categoría:</label>
        <select name="category_id" required>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php echo e($article->category_id == $category->id ? 'selected' : ''); ?>>
                    <?php echo e($category->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <button type="submit">Actualizar</button>
    </form>

    <a href="<?php echo e(route('articles.index')); ?>">Volver a la lista</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\articles\edit.blade.php ENDPATH**/ ?>
