

<?php $__env->startSection('title', 'Inicio'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Bienvenido a Mi E-commerce</h1>
    <p>Descubre nuestros productos y artículos del blog.</p>
    <a href="<?php echo e(route('products.index')); ?>">Ver tienda</a>
    <a href="<?php echo e(route('blog.index')); ?>">Leer blog</a>
    <a href="<?php echo e(route('categories.index')); ?>">crear categoria</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\home.blade.php ENDPATH**/ ?>
