<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

<h3><i class="fa fa-users"></i> Clientes</h3>
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
              <h3 class="box-title">Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Nombre Cliente</th>
                  <th>Cedula</th>
                  <th>Telefono</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php while($cliente = $clientes->fetch_object()):?>
                <tr>
                <td><?=$cliente->id?></td>
                <td><?=$cliente->nombre_cliente?></td>
                <td><?=$cliente->cedula?></td>
                <td><?=$cliente->telefono?></td>
                <td>
                  <a href="<?=base_url?>Cliente/detallecliente&id=<?=$cliente->id?>" class="btn btn-primary btn-sm">Ver</a>
                  <a href="<?=base_url?>Cliente/editarcliente&id=<?=$cliente->id?>" class="btn btn-warning btn-sm">Editar</a>
                  <a href="<?=base_url?>Cliente/eliminarcliente&id=<?=$cliente->id?>" onclick="confirm('estas seguro de que quieres eliminar');" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
                </tr>
                <?php endwhile;?>
                </tbody>
              </table>
            </div>
   </div><!--Cierre del BOx-->


<?php require_once 'views/layouts/footer.php';?>