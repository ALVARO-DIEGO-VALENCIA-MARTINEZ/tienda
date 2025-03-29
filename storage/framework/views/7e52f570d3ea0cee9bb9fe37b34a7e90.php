<!DOCTYPE html>
<html>
<head>
    <title>Nuevo comentario en tu artículo</title>
</head>
<body>
    <h1>Hola, tienes un nuevo comentario en tu artículo</h1>
    <p><strong>Usuario:</strong> <?php echo e($comment->username); ?></p>
    <p><strong>Email:</strong> <?php echo e($comment->email); ?></p>
    <p><strong>Comentario:</strong> <?php echo e($comment->content); ?></p>
</body>
</html>
<?php /**PATH C:\Users\lauso\Desktop\ecommerce-blog\resources\views\email\new_comment_notification.blade.php ENDPATH**/ ?>
