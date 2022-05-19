@extends('admin.layout.layout') 
{{-- đừng xóa title bên đây nó bug ak --}}
@section('title')
{{$title}}
@endsection 
 {{-- itemt navbar --}}

 
 {{-- content  --}}
@section('main-content')
<script type="text/javascript">
  var data = {!! json_encode($statisticsGroupProduct) !!}

</script>
<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>150</h3>

          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable ui-sortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="card">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Sales
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="revenue-chart-canvas" height="375" style="height: 300px; display: block; width: 694px;" width="867" class="chartjs-render-monitor"></canvas>
             </div>
            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
              <canvas id="sales-chart-canvas" height="0" style="height: 0px; display: block; width: 0px;" width="0" class="chartjs-render-monitor"></canvas>
            </div>
          </div>
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Donut Chart</h3>
      
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas id="donutChart"  width="200" height="212" class="chartjs-render-monitor"></canvas>
        </div>
        <!-- /.card-body -->
      </div>


  
      <!-- /.card -->
    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable ui-sortable">

      <!-- Map card -->
      <div class="card bg-gradient-primary">
        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title">
            <i class="fas fa-map-marker-alt mr-1"></i>
            Visitors
          </h3>
          <!-- card tools -->
          <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
              <i class="far fa-calendar-alt"></i>
            </button>
            <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
       
        <!-- /.card-body-->
        <div class="card-footer bg-transparent">
          <div class="row">
            <div class="col-4 text-center">
              <div id="sparkline-1"><canvas width="100" height="62" style="width: 80px; height: 50px;"></canvas></div>
              <div class="text-white">Visitors</div>
            </div>
            <!-- ./col -->
            <div class="col-4 text-center">
              <div id="sparkline-2"><canvas width="100" height="62" style="width: 80px; height: 50px;"></canvas></div>
              <div class="text-white">Online</div>
            </div>
            <!-- ./col -->
            <div class="col-4 text-center">
              <div id="sparkline-3"><canvas width="100" height="62" style="width: 80px; height: 50px;"></canvas></div>
              <div class="text-white">Sales</div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.card -->

      <!-- solid sales graph -->
      <div class="card bg-gradient-info">
        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title">
            <i class="fas fa-th mr-1"></i>
            Sales Graph
          </h3>

          <div class="card-tools">
            <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas class="chart chartjs-render-monitor" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 694px;" width="867" height="312"></canvas>
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-transparent">
          <div class="row">
            <div class="col-4 text-center">
              <div style="display:inline;width:60px;height:60px;"><canvas width="75" height="75" style="width: 60px; height: 60px;"></canvas><input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

              <div class="text-white">Mail-Orders</div>
            </div>
            <!-- ./col -->
            <div class="col-4 text-center">
              <div style="display:inline;width:60px;height:60px;"><canvas width="75" height="75" style="width: 60px; height: 60px;"></canvas><input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

              <div class="text-white">Online</div>
            </div>
            <!-- ./col -->
            <div class="col-4 text-center">
              <div style="display:inline;width:60px;height:60px;"><canvas width="75" height="75" style="width: 60px; height: 60px;"></canvas><input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

              <div class="text-white">In-Store</div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    
      <!-- /.card -->
    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->
</div>

@endsection