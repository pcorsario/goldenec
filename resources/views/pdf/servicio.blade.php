<!DOCTYPE html>
<html>
<head>
    <title>Comprobante de Pago</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        .header { text-align: center; margin-bottom: 15px; }
        .logo { height: 80px; margin-bottom: 10px; } /* Ajusta según el tamaño de tu logo */
        .numero-comprobante { text-align: right; font-weight: bold; margin-bottom: 20px; }
        .fecha { text-align: right; margin-bottom: 30px; }
        .concepto { margin: 25px 0; }
        .linea { border-top: 1px dashed #000; margin: 15px 0; }
        .firma { margin-top: 50px; }
        .footer { text-align: center; font-size: 12px; margin-top: 40px; }
        .text-uppercase { text-transform: uppercase; }
    </style>
</head>
<body>
    <!-- Logo y número de comprobante -->
    <div class="header">
        <img src="{{ public_path('LogoGB-sf.png') }}" class="logo" alt="Golden Brain">
        <div class="numero-comprobante">N° {{ str_pad($servicio->id, 7, '0', STR_PAD_LEFT) }}</div>
    </div>

    <!-- Fecha -->
    <div class="fecha">
        <strong>FECHA</strong><br>
        <span>{{ $servicio->fecha_pago }}</span>
    </div>

    <!-- Datos del pago -->
    <div class="concepto">
        <p><strong>Recibí de:</strong> {{ $servicio->estudiante->nombres }}</p>
        <p><strong>La Suma de:</strong> ${{ number_format($servicio->valor, 2) }} dólares</p>
        <p><strong>Por concepto de:</strong> {{ $servicio->nombre_servicio }}</p>
    </div>

    <!-- Forma de pago -->
    <div class="linea"></div>
    <p><strong>FORMA DE PAGO:</strong> {{ $servicio->forma_pago }}</p>
    @if($servicio->nrocomprobante)
        <p><strong>N° Transacción:</strong> {{ $servicio->nrocomprobante }}</p>
    @endif

    <!-- Total y saldo pendiente -->
    <div class="linea"></div>
    <p><strong>TOTAL:</strong> ${{ number_format($servicio->valor, 2) }}</p>
    <p><strong>SALDO PENDIENTE:</strong> $0.00</p> <!-- Ajusta si hay saldos -->

    <!-- Firma y footer -->
    <div class="firma">
        <p>_________________________</p>
        <!-- <p><strong>SECRETARIO</strong></p> -->
    </div>

    <div class="footer">
        <p>Dirección: Av. Chone s/n y Antonio Ante • Teléfono: 098 681 0177</p>
        <p>Santo Domingo de los Tsáchilas - Ecuador</p>
    </div>
</body>
</html>