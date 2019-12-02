<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>


<div class="box">
        <div class="box-header with-border">
          <h2 class="box-title">Actualizar <?=$productos->nombre_producto?></h2>

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
             <form action="<?=base_url?>Producto/actualizarproducto&id=<?=$productos->id?>" method="post" enctype="multipart/form-data">
             <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Nombre</label>

                  <div class="col-sm-10">
                    <input type="text" name="nombre" class="form-control" id="inputEmail3" value="<?=$productos->nombre_producto?>">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Codigo</label>

                  <div class="col-sm-10">
                  <input type="text" name="codigo" class="form-control" id="inputEmail3" value="<?=$productos->codigo_producto?>">
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Costo</label>

                  <div class="col-sm-10">
                  <input type="text" name="costo" class="form-control" id="inputEmail3" value="<?=$productos->costo?>">
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Precio</label>

                  <div class="col-sm-10">
                  <input type="text" name="precio" class="form-control" id="inputEmail3" value="<?=$productos->precio?>">
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Precio Mayor</label>

                  <div class="col-sm-10">
                  <input type="text" name="precio_mayor" class="form-control" id="inputEmail3" value="<?=$productos->precio_por_mayor?>">
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Descuento</label>
                  <div class="col-sm-10">
                    <input type="number" name="descuento" class="form-control" value="<?=$productos->descuento?>">
                  </div>
                </div>
                

                <br>
                <div class="form-group">
                  <label for="inputEmail4"  class="col-sm-2 control-label">Unidad</label>

                  <div class="col-sm-10">
                  <select value="<?=$productos->unidad?>" name="unidad" class="form-control">
                    <option>UNIDAD</option>
                    <option>CAJA</option>
                    <option>SACO</option>
                    <option>PAQUETE</option>
                    <option>HUACAL</option>
                    <option>DOCENA</option>
                  </select>   
                </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Cantidad</label>
                  <div class="col-sm-10">
                    <input type="number" name="cantidad" class="form-control" value="<?=$productos->cantidad?>">
                  </div>
                </div>

            
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Descripcion</label>

                  <div class="col-sm-10">
                  <input type="text" name="descripcio" class="form-control" id="inputEmail3" value="<?=$productos->descripcion?>">
                  </div>
                </div>
            </div><!--Cierre de la columna-->
        
             <div class="col-md-4">
               <div class="box">
                   <img src="<?=base_url?>uploads/images/<?=$productos->imagen?>" class="imagen-detalle" alt="imagen">               
                   <input name="imagen" type="file" class="btn btn-danger btn-block">
                   </div>  
             </div>   
            </div><!--Cierre del row-->
        </div>
        <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
        </div>
  </form>
</div><!--Cierre del Box-->
      
    



<style>
.imagen-detalle{
height: 250px;
display: block;
margin:10px auto;
}
</style>
<?php require_once 'views/layouts/footer.php';?>