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

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Producto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="<?=base_url?>Producto/guardar" class="form-horizontal" enctype="multipart/form-data">
              <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" name="nombre" class="form-control" id="inputEmail3" placeholder="Nombre del Producto" required>
                  </div>
                </div>
                </div>
                <div class="col-md-6">
                <label for="inputEmail3" class="col-sm-2 control-label">Codigo</label>
                  <div class="col-sm-10">
                    <input type="number" name="codigo" class="form-control" id="inputEmail3" placeholder="Codigo del Producto" required>
                  </div>
                </div>
              </div><!--Cierre del row-->

              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Costo</label>
                  <div class="col-sm-10">
                    <input type="text" value="00.00" name="costo" class="form-control" id="inputEmail3" placeholder="Costo del Producto" required>
                  </div>
                </div>
                </div>
                <div class="col-md-6">
                <label for="inputEmail3" class="col-sm-2 control-label">Precio</label>
                  <div class="col-sm-10">
                    <input type="text" value="00.00" name="precio" class="form-control" id="inputEmail3" placeholder="Codigo del Producto" required>
                  </div>
                </div>

              </div><!--Cierre del row-->


              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Precio Por Mayor</label>
                  <div class="col-sm-10">
                    <input type="text" value="00.00" name="precio_mayor" class="form-control" id="inputEmail3" placeholder="Descripcion del Producto" required>
                  </div>
                </div>
                </div>
                <div class="col-md-6">
                <label for="inputEmail3" class="col-sm-2 control-label">Unidad</label>
                  <div class="col-sm-10">
                  <select name="unidad" class="form-control">
                    <option>UNIDAD</option>
                    <option>CAJA</option>
                    <option>SACO</option>
                    <option>PAQUETE</option>
                    <option>HUACAL</option>
                    <option>DOCENA</option>
                  </select>
                </div>
                </div>
              </div><!--Cierre del row-->

              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Cantidad</label>
                  <div class="col-sm-10">
                    <input type="number" name="cantidad" class="form-control" value="1" placeholder="Cantidad del Producto">
                  </div>
                </div>
                </div>
                
                
                <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Descripcion</label>
                  <div class="col-sm-10">
                  <textarea name="descripcio" class="form-control" id="descripcio" cols="5" rows="5"></textarea>
                  </div>
                </div>
                </div>

              </div><!--Cierre del row-->
              
              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail5" class="col-sm-2 control-label">Imagen</label>
                  <div class="col-md-10">
                    <input type="file" name="imagen" class="form-control">
                  </div>
                </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail5" class="col-sm-2 control-label">Descuento</label>
                  <div class="col-md-9">
                    <input type="number" name="descuento" class="form-control">
                  </div>
                </div>
                </div>
              </div><!--Cierre del row-->

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Guardar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

<?php require_once 'views/layouts/footer.php';?>