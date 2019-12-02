<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

<div class="box">
        <div class="box-header with-border">
          <h2 class="box-title">Ver Cliente <?=$clientes->nombre_cliente?></h2>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="row">
             <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Nombre</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" value="<?=$clientes->nombre_cliente?>" disabled>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Autorizado Por:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" value="<?=$clientes->nombre?>" disabled>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Cedula</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$clientes->cedula?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Telefono</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$clientes->telefono?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Direccion</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$clientes->direccion?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Sector</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$clientes->sector?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Provincia</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$clientes->provincia?>" disabled>
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
</div><!--Cierre del Box-->


<?php require_once 'views/layouts/footer.php';?>