<?php require_once 'views/layouts/header.php';?>
<?php require_once 'views/layouts/lateral.php';?>

<h3><i class="fa fa-bar-chart"></i> Reportes </h3>
<br>

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
          ['Dia', 'Ventas'],
          <?php while($ventad = $ventadias->fetch_row()):?>
          ['<?=$ventad[0]?>',     <?=$ventad[1]?>],
          <?php endwhile;?>
        ]);

        var options = {
          title: 'Ventas Generadas Diariamente',
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
<div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="<?=base_url?>assets/img/avatar.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?=$_SESSION['identificar']->nombre?></h3>
              <h5 class="widget-user-desc">vendedor</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Total de ventas <span class="pull-right badge bg-blue">RD$ <?=$_SESSION['ganancias'][0];?></span></a></li>
                <li><a href="#">Facturas generadas <span class="pull-right badge bg-aqua"><?=$_SESSION['facturastotal'][0]?></span></a></li>
                <li><a href="#">Descuentos aplicados<span class="pull-right badge bg-green"><?=$descuentos[0]?></span></a></li>
              </ul>
            </div>
          </div>		
</div>



<?php require_once 'views/layouts/footer.php';?>