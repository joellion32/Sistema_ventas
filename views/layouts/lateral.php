

<li class="header">HEADER</li>
<?php if(isset($_SESSION['admin'])):?>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="<?=base_url?>Usuario/panel"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-cart-plus"></i> <span>Productos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?=base_url?>Producto/verproducto"><i class="fa fa-circle-o"></i><span>Ver Producto</span></a></li> 
          <li><a href="<?=base_url?>Producto/crearproducto"><i class="fa fa-circle-o"></i><span>Crear Producto</span></a></li>          
        </ul>
        </li>
        <li class="treeview">
            <a href="#"><i class="fa fa-users"></i> <span>Clientes</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="<?=base_url?>Cliente/vercliente"><i class="fa fa-circle-o"></i><span>Ver Cliente</span></a></li> 
            <li><a href="<?=base_url?>Cliente/crearcliente"><i class="fa fa-circle-o"></i><span>Crear Cliente</span></a></li>          
          </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-user"></i> <span>Usuarios</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="<?=base_url?>Usuario/administrar"><i class="fa fa-circle-o"></i><span>Administrar usuarios</span></a></li> 
          </ul>
          </li>
          
          <li class="treeview">
            <a href="#"><i class="fa fa-dollar"></i> <span>Ventas</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="<?=base_url?>Factura/ventas"><i class="fa fa-circle-o"></i><span>Realizar venta</span></a></li> 
            <li><a href="<?=base_url?>Factura/mostrarventas"><i class="fa fa-circle-o"></i><span>Detalles de ventas</span></a></li>          
          </ul>
          </li>
<!--cierre de caja y mas-->
          <li class="treeview">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Caja</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="<?=base_url?>Caja/mostrarcierre"><i class="fa fa-circle-o"></i><span>Cierre de Caja</span></a></li> 
          </ul>
          </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-gear"></i> <span>Opciones</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url?>Empresa/actualizar"><i class="fa fa-circle-o"></i>Actualizar datos del negocio</a></li>
          </ul>
        </li>
      </ul>
      <!--para la parte del vendedor-->
      <?php else:?>
      <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#"><i class="fa fa-cart-plus"></i> <span>Productos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?=base_url?>Producto/verproducto"><i class="fa fa-circle-o"></i><span>Almacen de productos</span></a></li> 
        </ul>
        </li>

        <li class="treeview">
            <a href="#"><i class="fa fa-dollar"></i> <span>Ventas</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="<?=base_url?>Factura/ventas"><i class="fa fa-circle-o"></i><span>Realizar venta</span></a></li> 
            <li><a href="<?=base_url?>Factura/ventasdia"><i class="fa fa-circle-o"></i><span>Ventas del dia</span></a></li> 
          </ul>
          </li>

        <li class="treeview">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Reportes</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="<?=base_url?>Factura/reportes"><i class="fa fa-circle-o"></i><span>Ver Reportes</span></a></li> 
          </ul>
          </li>

      <?php endif;?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content container-fluid">