

<?php $__env->startSection('title', 'Blog'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Blog</h1>

    
    <a href="<?php echo e(route('articles.create')); ?>">Crear Nuevo Artículo</a>

    
    <a href="<?php echo e(route('blog-categories.create')); ?>">Crear Categoría</a>

    <?php if($articles->count() > 0): ?>
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="article-card">
                <h2><?php echo e($article->title); ?></h2>
                <p><?php echo e(Str::limit($article->content, 150)); ?></p>
                <p>Autor: <?php echo e($article->author->name ?? 'Anónimo'); ?></p>
                <p>Categoría: <?php echo e($article->category->name ?? 'Sin categoría'); ?></p>
                <a href="<?php echo e(route('articles.show', $article)); ?>">Leer más</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo e($articles->links()); ?> 
    <?php else: ?>
        <p>No hay artículos disponibles.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\blog_categories\index.blade.php ENDPATH**/ ?>
