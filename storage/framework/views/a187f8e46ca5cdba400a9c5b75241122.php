

<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($product->name); ?></h1>
    <p><?php echo e($product->description); ?></p>
    <p>Precio: $<?php echo e($product->price); ?></p>
    <img src="<?php echo e(asset('images/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>">
    <a href="<?php echo e(route('products.index')); ?>">Volver a la tienda</a>

    <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?');">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit">Eliminar</button>
    </form>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\products\show.blade.php ENDPATH**/ ?>
