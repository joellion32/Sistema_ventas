<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

<h3><i class="fa fa-user"></i> Usuarios</h3>
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
              <h3 class="box-title">Usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Nombre Usuario</th>
                  <th>Rol</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php while($usuario = $usuarios->fetch_object()):?>
                <tr>
                <td><?=$usuario->id?></td>
                <td><?=$usuario->nombre?></td>
                <td><?=$usuario->rol?></td>
                <td>
                  <a href="<?=base_url?>Usuario/editarusuario&id=<?=$usuario->id?>" class="btn btn-warning btn-sm">Editar</a>
                  <a href="<?=base_url?>Usuario/eliminarusuario&id=<?=$usuario->id?>" onclick="confirm('estas seguro de que quieres eliminar');" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
                </tr>
                <?php endwhile;?>
                </tbody>
              </table>
            </div>
   </div><!--Cierre del BOx-->

   <button class="btn btn-primary btn-block mt-2" data-toggle="modal" data-target="#exampleModalCenter">Crear Usuario</button>

   <!---MODAL--->
   <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc; color:white">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url?>Usuario/guardarusuario" method="post">
        <div class="form-group">
        <label for="exampleInputPassword1">Nombre</label>
        <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre del usuario" required>
        </div>

        <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Contraseña del usuario" required>
        </div>

        <div class="form-group">
        <label for="exampleInputPassword1">Rol</label>
        <select name="rol" class="form-control" id="rol">
      <option value="administrador">administrador</option>
      <option value="usuario">usuario</option>
    </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php require_once 'views/layouts/footer.php';?>