

<?php $__env->startSection('title', 'Lista de Productos'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Lista de Productos</h1>

    
    <form method="GET" action="<?php echo e(route('products.index')); ?>">
        <label for="category">Filtrar por categoría:</label>
        <select name="category" id="category">
            <option value="">Todas las categorías</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                    <?php echo e($category->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button type="submit">Filtrar</button>
    </form>

    
    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">Agregar Producto</a>

    
    <?php if(session('success')): ?>
        <p style="color: green;"><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    
    <?php if($products->count() > 0): ?>
        <div class="product-list">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-card">
                    <h2><?php echo e($product->name); ?></h2>
                    <p>Precio: $<?php echo e(number_format($product->price, 2)); ?></p>
                    <p>Stock: <?php echo e($product->stock); ?></p>
                    <p>Categoría: <?php echo e($product->category->name ?? 'Sin categoría'); ?></p>
                    <a href="<?php echo e(route('products.show', $product)); ?>">Ver más</a>
                    <a href="<?php echo e(route('products.edit', $product)); ?>">Editar</a>

                    
                    <form action="<?php echo e(route('products.destroy', $product)); ?>" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" style="color: red;">Eliminar</button>
                    </form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <?php echo e($products->links()); ?>

    <?php else: ?>
        <p>No hay productos disponibles.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\products\index.blade.php ENDPATH**/ ?>
