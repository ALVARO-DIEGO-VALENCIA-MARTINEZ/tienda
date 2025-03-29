

<?php $__env->startSection('title', $article->title); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($article->title); ?></h1>
    <p>Autor: <?php echo e($article->author->name); ?></p>
    <p><?php echo e($article->content); ?></p>

    <?php if($article->image): ?>
        <img src="<?php echo e(asset('storage/' . $article->image)); ?>" alt="Imagen destacada">
    <?php endif; ?>

    <h2>Comentarios</h2>
    <?php $__currentLoopData = $article->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <strong><?php echo e($comment->username); ?></strong> (<?php echo e($comment->email); ?>)
            <p><?php echo e($comment->content); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <h3>Añadir un comentario</h3>
    <form action="<?php echo e(route('comments.store', $article)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label>Nombre:</label>
        <input type="text" name="username" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Comentario:</label>
        <textarea name="content" required></textarea>

        <button type="submit">Enviar</button>
    </form>

    <a href="<?php echo e(route('articles.index')); ?>">Volver a la lista</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\articles\show.blade.php ENDPATH**/ ?>
