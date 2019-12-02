<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

<h3><i class="fa fa-cart-plus"></i> Productos</h3>
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
              <h3 class="box-title">Productos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Nombre Producto</th>
                  <th>Codigo Producto</th>
                  <th>Cantidad Agregada</th>
                  <th>Precio</th>
                  <th>Descuento</th>
                  <th>Imagen</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php while($producto = $productos->fetch_object()):?>
                <tr>
                <td><?=$producto->id?></td>
                <td><?=$producto->nombre_producto?></td>
                <td><?=$producto->codigo_producto?></td>
                <td><?=$producto->cantidad?></td>
                <td>RD$ <?=$producto->precio?></td>
                <td>RD$ <?=$producto->descuento?></td>
                <td><img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito" alt="imagen"></td>
                <?php if(isset($_SESSION['admin'])):?>
                <td>
                  <br>
                  <a href="<?=base_url?>Producto/mostrarproducto&id=<?=$producto->id?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                  <a href="<?=base_url?>Producto/editarproducto&id=<?=$producto->id?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                  <a href="<?=base_url?>Producto/eliminarproducto&id=<?=$producto->id?>" onclick="confirm('estas seguro de que quieres eliminar');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
                <?php else:?>
                <td>
                  <a href="<?=base_url?>Producto/mostrarproducto&id=<?=$producto->id?>" class="btn btn-primary btn-sm">Ver Producto</a>
                </td>
                <?php endif;?>
                </tr>
                <?php endwhile;?>
                </tbody>
              </table>
            </div>
   </div><!--Cierre del BOx-->


<?php require_once 'views/layouts/footer.php';?>