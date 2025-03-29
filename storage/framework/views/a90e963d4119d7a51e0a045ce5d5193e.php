<!DOCTYPE html>
<html>
<head>
    <title>Stock Bajo</title>
</head>
<body>
    <h1>Alerta de Stock Bajo</h1>
    <p>El producto <strong><?php echo e($product->name); ?></strong> tiene un stock bajo.</p>
    <p>Stock actual: <?php echo e($product->stock); ?></p>
    
</body>
</html>
<?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\email\low_stock.blade.php ENDPATH**/ ?>
