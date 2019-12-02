<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

<h3><i class="fa fa-bar-chart"></i> Facturas</h3>
<br>
<!--para captura de mensajes-->
<?php if(isset($_SESSION['mensaje'])):?>
<div class="alert alert-success" role="alert"><?=$_SESSION['mensaje'];?></div>
<?php endif;?>

<?php if(isset($_SESSION['error'])):?>
<div class="alert alert-danger" role="alert"><?=$_SESSION['error'];?></div>
<?php endif;?>

<?php Utils::deletesession('mensaje')?>
<?php Utils::deletesession('error')?>
<!--cierre captura de mensajes-->

 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Facturas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Nombre Cliente</th>
                  <th>Autorizada Por</th>
                  <th>No_factura</th>
                  <th>Fecha</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php while($factura = $facturas->fetch_object()):?>
                <tr>
                <td><?=$factura->id?></td>
                <td><?=$factura->nombre_cliente?></td>
                <td><?=$factura->nombre?></td>
                <td><?=$factura->no_factura?></td>
                <td><?=$factura->fecha?></td>
                <td>
                  <a href="<?=base_url?>Factura/detallefactura&id=<?=$factura->id?>" class="btn btn-primary btn-sm">Ver</a>
                  <a href="<?=base_url?>Factura/imprimirfactura&id=<?=$factura->id?>" class="btn btn-warning btn-sm">Imprimir</a>
                  <a href="<?=base_url?>Factura/eliminarfactura&id=<?=$factura->id?>" onclick="confirm('estas seguro de que quieres eliminar');" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
                </tr>
                <?php endwhile;?>
                </tbody>
              </table>
            </div>
   </div><!--Cierre del BOx-->


<?php require_once 'views/layouts/footer.php';?>