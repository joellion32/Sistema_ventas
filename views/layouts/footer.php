</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Inventory System</a>.</strong> Todos los derechos son reservados.
  </footer>
<!-- REQUIRED JS SCRIPTS -->


<!-- jQuery 3 -->
<script src="<?=base_url?>assets/bower_components/jquery/dist/jquery.min.js"></script>


<!-- Scripts Ajax -->
<script src="<?=base_url?>assets/js/ajax.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?=base_url?>assets/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="<?=base_url?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Select2 -->
<script src="<?=base_url?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- ChartJS -->
<script src="<?=base_url?>assets/bower_components/chart.js/Chart.js"></script>

<script>
//-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  });
</script>

      <!-- Modal -->
      <div class="modal fade" id="ventas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc; color:white">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <h4 class="modal-title" id="myModalLabel">Cerrar Caja</h4>
      </div>
      <div class="modal-body">
      <form action="<?=base_url?>Caja/guardarcaja" method="post">
        <div class="form-group">
        <label for="exampleInputPassword1">Total de ventas</label>
        <input name="ganancias" type="text" class="form-control" id="ganancias" value="<?=$_SESSION['ganancias'][0];?>" readonly>
        </div>

        <div class="form-group">
        <label for="exampleInputPassword1">Facturas Generadas</label>
        <input name="facturadia" type="text" class="form-control" id="facturadia" value="<?=$_SESSION['facturastotal'][0]?>" readonly>
        </div>

        <div class="form-group">
        <label for="exampleInputPassword1">Vendedor</label>
        <input name="vendedor" type="text" class="form-control" id="vendedor" value="<?=$_SESSION['identificar']->nombre?>" readonly>
    </select>
        </div>

        <div class="form-group">
        <label for="exampleInputPassword1">Hora de Cierre</label>
        <input name="hora" type="text" class="form-control" id="hora" value="<?=$_SESSION['hora']?>" readonly>
    </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Cerrar Caja</a>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>