<!DOCTYPE html>
<html>
<head>
    <title>Comprobante de Servicio #{{ $servicio->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .details { margin: 20px 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Comprobante de Servicio</h1>
    </div>
    
    <div class="details">
        <p><strong>ID:</strong> {{ $servicio->id }}</p>
        <p><strong>Estudiante:</strong> {{ $servicio->estudiante->nombres }}</p>
        <p><strong>Servicio:</strong> {{ $servicio->nombre_servicio }}</p>
        <p><strong>Fecha de Pago:</strong> {{ $servicio->fecha_pago }}</p>
        <p><strong>Valor:</strong> ${{ number_format($servicio->valor, 2) }}</p>
    </div>

    @if($servicio->imagen)
        <div class="image">
            <img src="{{ storage_path('app/public/' . $servicio->imagen) }}" width="300">
        </div>
    @endif
</body>
</html>


<header><h1>Unidad Educativa Alessandro Volta</h1></header>  
<nav>  
  <a href="/inicio/">Inicio</a>  
  <a href="/mision/">Misión</a>  
  <a href="/valores/">Valores</a>  
</nav>  
{% block content %}{% endblock %}  



