<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="width:100px !important;">
  <hr>
  <div class="cabecera">
    <h2><?=$empresas->nombre_empresa?></h2>
    <p>Direccion: <?=$empresas->localidad?></p>
    <p>RNC: <?=$empresas->rnc?></p>
    <p>Telefono: <?=$empresas->telefono?></p>
    <p>Correo: <?=$empresas->email?></p>
  </div>

<div class="tabla1">
<p>Numero de Factura: <?=$facturas->no_factura?></p>

<table>
  <tr>
    <th>Cliente: <?=$facturas->cliente?></th>
    <td>Fecha: <?=$facturas->fecha?></td>
  </tr>
  <tr>
    <th rowspan="1">Vendedor: <?=$facturas->nombre?></th>
    <td></td>
  </tr>
</table>
</div>

<br><br>
<div class="tabla2">
<table>
  <tr>
    <th>Cantidad</th>
    <th>Producto</th>
    <th>Valor Unit.</th>
    <th>Valor Total</th>
  </tr>
    <?php while($producto = $productos->fetch_object()):?>
    <tr>
                <td><?=$producto->unidades?></td>
                <td><?=$producto->nombre_producto?></td>
                <td>RD$ <?=$producto->costo?></td>
                <td><?=$producto->precio?></td>
    </tr>
      <?php endwhile?>          
</table>
</div>

<br><br>
<div class="tabla3">
<table>
  <tr>
    <th>Neto:</th>
    <td>$ <?=$facturas->total_factura?></td>
  </tr>
  <tr>
  <th>Impuesto:</th>
  <td>$ 0.00</td>
  </tr>
  <tr>
  <th>Total:</th>
  <td>$ <?=$facturas->total_factura?></td>
  </tr>
</table>
</div>

<br><br>
<hr>
<h4 class="texto">Gracias por elegirnos</h4>


  <style>
  .cabecera{
  line-height : 1px;
  margin: auto;
  text-align: center;
  }

.tabla1 p{
color: red;
font-size: 15px;
  }

.tabla2 table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  width:35%
}

.tabla3 table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  width:35%;
  margin-left:49%;
}

.tabla1 table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  width:70%
}

th, td {
  padding: 5px;
  text-align: left;    
}

.texto{
  text-align: center;
}
  </style>
</body>
</html>