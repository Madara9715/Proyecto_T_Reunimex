<!DOCTYPE html>
<html>
<head>
	<title>Alerta Cliente</title>
</head>
<body>
    <h1>Recordatorio de pago:</h1>
     <ul>
    @foreach ($datosadeudo as $item)
    <li>Cliente: {{$item->nombre_cliente}} {{$item->apellido_p}} {{$item->apellido_m}}</li>
    <li>Deuda: ${{$deuda=$item->monto_restante}} (Pesos)</li>
    <li>Fecha Limite: {{\Carbon\Carbon::parse($fechalimite=$item->fecha_limite)->format('Y-m-d')}}
    <li>Fecha: {{date("Y-m-d")}} </li>
    </ul>
    
    @endforeach
    <p> Estimado cliente,</p>
    <blockquote>
    <p>Le recordamos, muy gentilmente, que tiene pendiente una cuenta con nosotros
     por la cantidad de ${{$deuda}} (pesos) que debio cubrise antes de la fecha {{\Carbon\Carbon::parse($fechalimite)->format('Y-m-d')}},
     la cual aun no ha sido pagada.</p>
     <p>Agradecemos que usted pueda efectuar el pago lo antes posible para normalizar su situación.
     Las demoras de este tipo ocasionan dificultades en nuestra contabilidad y por ende no podemos 
     ofrecerle nuestros servicios de la mejor manera.</p>

     <p>Esperando que nuestra solicitud será atendida y que adoptará las medidas oportunas para
     que no se repitan situaciones como ésta en el futuro. Nos despedimos con un saludo cordial.</p>
     </blockquote>
   
</body>
</html>