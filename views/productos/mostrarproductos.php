<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>


<div class="box">
        <div class="box-header with-border">
          <h2 class="box-title"><?=$productos->nombre_producto?></h2>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="row">
             <div class="col-md-8">
             <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Nombre</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" value="<?=$productos->nombre_producto?>" disabled>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Codigo</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$productos->codigo_producto?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Costo</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="RD$ <?=$productos->costo?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Precio</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="RD$ <?=$productos->precio?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Descuento</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="RD$ <?=$productos->descuento?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Precio Mayor</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="RD$ <?=$productos->precio_por_mayor?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Unidad</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$productos->unidad?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Cantidad</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$productos->cantidad?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Descripcion</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$productos->descripcion?>" disabled>
                  </div>
                </div>
            </div><!--Cierre de la columna-->
  
             <div class="col-md-4">
               <div class="box">
                   <img src="<?=base_url?>uploads/images/<?=$productos->imagen?>" class="imagen-detalle" alt="imagen">
               </div>  
             </div>   
            </div><!--Cierre del row-->
        </div>
      </div>



<style>
.imagen-detalle{
height: 250px;
display: block;
margin:10px auto;
}
</style>
<?php require_once 'views/layouts/footer.php';?>