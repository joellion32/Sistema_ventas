<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

<div class="row">
<?php if(isset($_SESSION['admin'])):?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Clientes</span>
              <span class="info-box-number"><?=$clientes[0];?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ventas</span>
              <span class="info-box-number">$ <?=$facturas[0];?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Productos</span>
              <span class="info-box-number"><?=$productos[0];?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bar-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Facturas</span>
              <span class="info-box-number"><?=$contarfs[0];?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
          
<!---Ventas últimos 30 días-->
<div class="row">
  		<div class="col-sm-12">
  			<div class="box box-primary">
  				<div class="box-header">
         			<h3 class="box-title">Grafico de Ventas</h3>
         		</div>
	            <div class="box-body">
              <div id="curve_chart" style="width: 100%; height: 400px"></div>

      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Ventas'],
          <?php while($fecha = $fechas->fetch_row()):?>
          ['<?=$fecha[1] .'-'. $fecha[2]?>',     <?=$fecha[0]?>],
          <?php endwhile;?>
        ]);

        var options = {
          title: 'Ventas Generadas Mensualmente',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>          
</div>
<!-- /.box-body -->
</div>
</div>
  </div>
<!---Ventas últimos 30 días-->

<!---Año fiscal actual de ventas-->
<div class="row">
  <div class="col-sm-6">
  <div class="box box-primary">
    <div class="box-header">
         <h3 class="box-title">Productos más vendidos</h3>
       </div>
        <div class="box-body">
        <div id="donutchart" style="width: 100%; height: 400px;"></div>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php while($vendido = $vendidos->fetch_row()):?>
          ['<?=$vendido[1]?>',     <?=$vendido[0]?>],
          <?php endwhile;?>
        ]);

        var options = {
        pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script> 
</div><!-- /.box-body -->
</div><!-- box box-primary-->
</div><!--col-sm-6 -->

      <div class="col-sm-6">
  			<div class="box box-primary">
  				<div class="box-header">
         			<h3 class="box-title">Productos agregados recientemente</h3>
         		</div>
	            <div class="box-body">
              <ul class="nav nav-stacked">
              <?php if($mostrarps->num_rows == 0):?>
              <li><p style="text-align:center; font-size:15px;">No hay productos que mostrar</p></li>
              <?php else:?>
                <?php while($mostrarp = $mostrarps->fetch_object()):?>
                <li><a href="<?=base_url?>Producto/mostrarproducto&id=<?=$mostrarp->id?>"><?=$mostrarp->nombre_producto?> <span class="pull-right badge bg-blue">$ <?=$mostrarp->precio?></span></a></li>
                <?php endwhile;?>
              </ul>   
        <p style="text-align:center;"><a href="<?=base_url?>Producto/verproducto">Mostrar todos los productos</a></p>
        <?php endif;?>                

      </div><!-- /.box-body -->
      </div><!-- box box-primary-->
    </div><!--col-sm-6 -->
    <?php else:?>  
      <h1>Bievenido</h1>
    <?php endif;?>
      </div><!--row-->
      
      
<?php require_once 'views/layouts/footer.php';?>