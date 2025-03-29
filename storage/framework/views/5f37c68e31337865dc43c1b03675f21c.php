

<?php $__env->startSection('content'); ?>
    <h1>Lista de Artículos</h1>

    <?php if(isset($articles) && $articles->count() > 0): ?>
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <h2><?php echo e($article->title); ?></h2>
                <p><?php echo e($article->content); ?></p>
                <p><strong>Autor:</strong> <?php echo e($article->author->name ?? 'Desconocido'); ?></p>
                <p><strong>Publicado:</strong> <?php echo e($article->published_at); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo e($articles->links()); ?> <!-- Paginación -->
    <?php else: ?>
        <p>No hay artículos disponibles.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views/articles/index.blade.php ENDPATH**/ ?>