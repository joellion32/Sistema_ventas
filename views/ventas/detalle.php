<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

<div class="box">
        <div class="box-header with-border">
          <h2 class="box-title"><b>Ver Factura No: <?=$factura->no_factura?></b></h2>

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
                  <label for="inputEmail4" class="col-sm-2 control-label">Nombre del Cliente:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" value="<?=$factura->cliente?>" disabled>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Autorizado Por:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" value="<?=$factura->nombre?>" disabled>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">No. Factura:</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$factura->no_factura?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Cantidad Pagada:</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="RD$ <?=$factura->cantidad_pagada?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Descuento Aplicado:</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="RD$ <?=$factura->descuento?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Total Factura:</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="RD$ <?=$factura->total_factura?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Total a Devolver:</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="RD$ <?=$factura->sobrante?>" disabled>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Fecha de Creacion:</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="<?=$factura->fecha?>" disabled>
                  </div>
                </div>

               <br><br>
            <div class="box-header">
              <h3 class="box-title"><b>Productos vendidos</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Nombre Producto</th>
                  <th>Codigo Producto</th>
                  <th>Precio</th>
                  <th>Unidades</th>
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
                <td>RD$ <?=$producto->precio?></td>
                <td><?=$producto->unidades?></td>
                <td><img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito" alt="imagen"></td>
                <td>
                  <br>
                  <a href="<?=base_url?>Producto/mostrarproducto&id=<?=$producto->id?>" class="btn btn-primary btn-sm"><i class="fa fa-eyes"></i> Ver Producto</a>
                </td>
                </tr>
                <?php endwhile;?>
                </tbody>
              </table>
            </div>

                
            </div><!--Cierre del row-->
        </div><!--Cierre del box-body-->
</div><!--Cierre del Box-->


<?php require_once 'views/layouts/footer.php';?>