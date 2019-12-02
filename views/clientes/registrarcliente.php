<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

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

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Cliente</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?=base_url?>Cliente/guardar" method="POST">
              <div class="box-body">

              <div class="form-group">
                  <label for="exampleInputEmail1">Id Usuario</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?=$_SESSION['identificar']->id?>" disabled>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre Cliente</label>
                  <input type="text" name="nombre" class="form-control" id="exampleInputEmail2" placeholder="Nombre del Cliente">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Cedula</label>
                  <input type="text" name="cedula" class="form-control" id="exampleInputPassword1" placeholder="Cedula del Cliente">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Telefono</label>
                  <input type="text" name="telefono" class="form-control" id="exampleInputPassword1" placeholder="Telefono del Cliente">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Direccion</label>
                  <input type="text" name="direccion" class="form-control" id="exampleInputPassword1" placeholder="Direccion del Cliente">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Sector</label>
                  <input type="text" name="sector" class="form-control" id="exampleInputPassword1" placeholder="Sector del Cliente">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Provincia</label>
                  <input type="text" name="provincia" class="form-control" id="exampleInputPassword1" placeholder="Provincia del Cliente">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
              </div>
            </form>
          </div>

<?php require_once 'views/layouts/footer.php';?>