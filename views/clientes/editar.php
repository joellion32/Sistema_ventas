<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

<div class="box">
        <div class="box-header with-border">
          <h2 class="box-title">Actualizar cliente <?=$clientes->nombre_cliente?></h2>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="row">
            <form action="<?=base_url?>Cliente/actualizar&id=<?=$clientes->id?>" method="post">
             <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Nombre</label>

                  <div class="col-sm-10">
                    <input name="nombre" type="text" class="form-control" id="inputEmail3" value="<?=$clientes->nombre_cliente?>">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Cedula</label>

                  <div class="col-sm-10">
                  <input type="text" name="cedula" class="form-control" id="inputEmail3" value="<?=$clientes->cedula?>">
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Telefono</label>

                  <div class="col-sm-10">
                  <input name="telefono" type="text" class="form-control" id="inputEmail3" value="<?=$clientes->telefono?>">
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Direccion</label>

                  <div class="col-sm-10">
                  <input name="direccion" type="text" class="form-control" id="inputEmail3" value="<?=$clientes->direccion?>">
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Sector</label>

                  <div class="col-sm-10">
                  <input name="sector" type="text" class="form-control" id="inputEmail3" value="<?=$clientes->sector?>">
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Provincia</label>

                  <div class="col-sm-10">
                  <input name="provincia" type="text" class="form-control" id="inputEmail3" value="<?=$clientes->provincia?>">
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Fecha de Creacion</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$clientes->fecha?>" disabled>
                  </div>
                </div>
               </div><!--Cierre del row-->
             </div><!--Cierre del box-body-->
        <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
        </div>
        </form>
</div><!--Cierre del Box-


<?php require_once 'views/layouts/footer.php';?>