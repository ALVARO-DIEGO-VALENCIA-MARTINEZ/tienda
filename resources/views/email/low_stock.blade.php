<!DOCTYPE html>
<html>
<head>
    <title>Stock Bajo</title>
</head>
<body>
    <h1>Alerta de Stock Bajo</h1>
    <p>El producto <strong>{{ $product->name }}</strong> tiene un stock bajo.</p>
    <p>Stock actual: {{ $product->stock }}</p>
    
</body>
</html>
