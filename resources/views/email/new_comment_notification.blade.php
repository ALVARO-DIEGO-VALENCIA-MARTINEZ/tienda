<!DOCTYPE html>
<html>
<head>
    <title>Nuevo comentario en tu artículo</title>
</head>
<body>
    <h1>Hola, tienes un nuevo comentario en tu artículo</h1>
    <p><strong>Usuario:</strong> {{ $comment->username }}</p>
    <p><strong>Email:</strong> {{ $comment->email }}</p>
    <p><strong>Comentario:</strong> {{ $comment->content }}</p>
</body>
</html>
