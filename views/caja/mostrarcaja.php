<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

<h3><i class="fa fa-bar-chart"></i> Cierre de Caja</h3>
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
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Total en venta</th>
                  <th>Facturas generadas</th>
                  <th>Vendedor</th>
                  <th>Hora de Cierre</th>
                </tr>
                </thead>
                <tbody>
                <?php while($caja = $cajas->fetch_object()):?>
                <tr>
                <td><?=$caja->id?></td>
                <td>$ <?=$caja->total_venta?></td>
                <td><?=$caja->facturas?></td>
                <td><?=$caja->vendedor?></td>
                <td><?=$caja->fecha?></td>
                </tr>
                <?php endwhile;?>
                </tbody>
              </table>
            </div>
   </div><!--Cierre del BOx-->


<?php require_once 'views/layouts/footer.php';?>