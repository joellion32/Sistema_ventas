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

<h3>Crear Venta</h3>

<section class="content">
<div class="row">
<div class="col-lg-6 col-xs-12">
<div class="box box-success">
<div class="box-header with-border"></div>
<div class="box-body">
  <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
                <form action="<?=base_url?>Factura/guardarfactura" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                    <input type="text" class="form-control" id="nuevoVendedor"  value="<?=$_SESSION['identificar']->nombre?>" readonly>
                  </div>
                </div> 

                
  <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================--> 

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                    <input type="text" name="cliente" class="form-control" id="nuevoVendedor"  value="Consumidor Final">
                  </div>
                </div> 

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================--> 

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="text" class="form-control" id="nuevaVenta" name="no_factura" value="<?=$_SERVER['numero'];?>" readonly>
                  </div>
                </div>


                  <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 
                <?php if(isset($carrito)):?>
                <?php foreach($carrito as $indice => $elemento): $producto = $elemento['producto'];?>
                <div class="form-group row nuevoProducto">
                    <!-- Descripción del producto -->
                    <div class="col-xs-6" style="padding-right:0px">
                      <div class="input-group">
                        <span class="input-group-addon"><a href="<?=base_url?>Factura/down&index=0" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a></span>
                        <input type="text" class="form-control" id="agregarProducto" value="<?=$producto->nombre_producto?>" required>
                      </div>
                    </div>

                  
                  <div class="col-xs-3">
                  <?=$elemento['unidades']?>
                <a href="<?=base_url?>Factura/up&index=<?=$indice?>" class="btn btn-success btn-sm">+</a>
                <a href="<?=base_url?>Factura/down&index=<?=$indice?>" class="btn btn-success btn-sm">-</a>
                </div>
                   <!-- Precio del producto -->
                   <div class="col-xs-3" style="padding-left:0px">
                     <div class="input-group">
                       <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                       <input type="number" min="1" class="form-control" id="nuevoPrecioProducto"  value="<?=$producto->precio?>" readonly required>
                     </div>
                   </div> 
                  </div><!--Cierre nuevoProducto-->
                  <?php endforeach;?>
                  <?php endif?>

                  <div class="row">

                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->
                  
                  <div class="col-xs-8 pull-right">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Total Descuento</th>
                          <th>Total</th>      
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="width: 50%">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                          <input style="display:none;" type="number" name="descuento" value="<?php if(isset($_SESSION['descuento'])){
                            echo $_SESSION['descuento'];} else{echo 0;}?>">
                          <input type="number" min="1" class="form-control" id="nuevoTotalVenta" value="<?=$_SESSION['totaldescuento']?>" readonly required>
                          </div>
                        </td>
                           <td style="width: 50%">
                            <div class="input-group">
                            <?php $status = Utils::statuscarrito()?>
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                              <input type="number" min="1" class="form-control" id="nuevoTotalVenta" name="total" value="<?=$status['total']?>" readonly required>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              
                 <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->
                <div class="form-group row">
                  <div class="col-xs-6" style="padding-right:0px">
                     <div class="input-group">
                      <select class="form-control" id="nuevoMetodoPago" required>
                        <option value="">Seleccione método de pago</option>
                        <option value="efectivo">Efectivo</option>                  
                      </select>   
                    </div>
                  </div>
                  <div class="col-xs-6" style="padding-left:0px"> 
                    <div class="input-group">
                      <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="cantidad" placeholder="Monto"  required>
                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#descuento">Aplicar descuento</button>
                <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>
              </div>
</form>
</div><!--Cierre del box-body-->
</div><!--Cierre del box-->
</div> <!--Cierre columna1--> 

<div class="col-xs-6" style="padding-right:0px">
<div class="box box-warning">
<div class="box-header with-border"></div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped dt-responsive tablas">
              <thead>
                <tr>
                 <th style="width: 10px">#</th>
                 <th>Imagen</th>
                 <th>Código</th>
                 <th>Nombre</th>
                 <th>Cantidad</th>
                 <th>Acciones</th>
               </tr>
             </thead>
             <tbody>
               <?php while($producto = $productos->fetch_object()):?>
                <tr>
                <td><?=$producto->id?></td>
                <td><img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img-thumbnail" width="40px" alt="imagen"></td>
                <td><?=$producto->codigo_producto?></td>
                <td><?=$producto->nombre_producto?></td>
                <td><?=$producto->cantidad?></td>
                <td>
                   <div class="btn-group">
                    <a class="btn btn-primary pull-right" href="<?=base_url?>Factura/addcarrito&id=<?=$producto->id?>">Agregar</a>
                  </div>
                 </td>
               </tr>
              <?php endwhile;?>
             </tbody>
           </table>
</div><!--Cierre del body-->
</div><!--Cierre del box-->
</div><!--Cierre columna2-->
</div><!--Cierre del row-->
</section>

<div class="modal fade" id="descuento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc; color:white">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <h4 class="modal-title" id="myModalLabel">Aplicar descuento</h4>
      </div>
      <div class="modal-body">
      <form action="<?=base_url?>Factura/descuento" method="post">
      <div class="input-group">
      <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="totaldescuento" placeholder="Monto"  required>
      <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Aplicar</button>
        </form>
      </div>
    </div>
  </div>
</div>



<?php require_once 'views/layouts/footer.php';?>