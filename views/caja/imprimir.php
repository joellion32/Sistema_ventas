<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
</head>
<body>
<hr>
  <div class="cabecera">
    <h2 style="text-align:center;">Reporte Total de Ventas</h2>
  </div>

  <table id="t01">
  <tr>
    <th>Numero Factura</th>
    <th>Producto</th> 
    <th>Precio</th> 
    <th>Cantidad</th>
  </tr>
  <?php while($producto = $productos->fetch_object()):?>
  <tr>
    <td><?=$producto->no_factura?></td>
    <td><?=$producto->nombre_producto?></td>
    <td>RD$ <?=$producto->precio?></td>
    <td><?=count($producto->nombre_producto)?></td>
  </tr>
</table>


<h4 style="text-align:center;">Total: RD$ <?=$producto->total?></h4>
<?php endwhile;?>

  <style>
table {
  width:100%;
  margin: auto;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
</style>
</body>
</html>