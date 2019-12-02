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

<div class="box">
        <div class="box-header with-border">
          <h2 class="box-title">Actualizar Datos</h2>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="row">
            <form onsubmit="validar();" action="<?=base_url?>Empresa/guardarempresa&id=<?=$empresas->id?>" method="post">
            
                <br>

                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Nombre Empresa o Negocio</label>

                  <div class="col-sm-10">
                    <input name="nombre_negocio" type="text" class="form-control" id="inputEmail3" value="<?=$empresas->nombre_empresa?>" required>
                  </div>
                </div>

                <br><br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Email del Negocio</label>

                  <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" id="inputEmail3" value="<?=$empresas->email?>" required>
                  </div>
                </div>

                <br><br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Rnc del Negocio</label>

                  <div class="col-sm-10">
                  <input type="text" name="rnc" class="form-control" id="inputEmail3" value="<?=$empresas->rnc?>" required>
                  </div>
                </div>

                <br><br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Telefono del Negocio</label>

                  <div class="col-sm-10">
                  <input name="telefono" type="text" class="form-control" id="inputEmail3" value="<?=$empresas->telefono?>" required>
                  </div>
                </div>

                   <br><br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Direccion del Negocio</label>

                  <div class="col-sm-10">
                  <input name="direccion" type="text" class="form-control" id="inputEmail3" value="<?=$empresas->localidad?>" required>
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