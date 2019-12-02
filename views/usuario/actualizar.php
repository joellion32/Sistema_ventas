<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

<div class="box">
        <div class="box-header with-border">
          <h2 class="box-title">Actualizar usuario <?=$usuarios->nombre?></h2>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="row">
            <form action="<?=base_url?>Usuario/actualizarusuario&id=<?=$usuarios->id?>" method="post">
             <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Nombre</label>

                  <div class="col-sm-10">
                    <input name="nombre" type="text" class="form-control" id="inputEmail3" value="<?=$usuarios->nombre?>">
                  </div>
                </div>
                <br><br>

                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Rol del usuario</label>

                  <div class="col-sm-10">
                  <input type="text" name="rol" class="form-control" id="inputEmail3" value="<?=$usuarios->rol?>">
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