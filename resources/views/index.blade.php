@extends('layouts.master')

@section('title','Dashboard')

@section('css')
    
@endsection

@section('content')
<h1>@section('title', 'Dashboard')</h1>
    <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"
                    ><i class="fas fa-cog"></i>
                  </span>

                  <div class="info-box-content">
                    <span class="info-box-text">Total Pendapatan Hari Ini</span>
                    <span class="info-box-number">
                      Rp. {{ number_format($total_pendapatan) }},-
                    </span>
                  </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-danger elevation-1"
                    ><i class="fas fa-truck"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Supplier</span>
                    <span class="info-box-number">{{ $total_supplier }}</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"
                    ><i class="fas fa-cubes"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Produk</span>
                    <span class="info-box-number">{{ $total_produk }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"
                    ><i class="fas fa-download"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Pembelian</span>
                    <span class="info-box-number">{{ $total_pembelian }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
@endsection

@section('js')
    <!-- ChartJS -->
    <script src="{{ asset('asset/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('asset/dist/js/pages/dashboard2.js') }}"></script>
    <script>
      var data_bar = '{!! json_encode($data_bar) !!}'

      $(function() {
        var areaChartData = {
          labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'],
          datasets: JSON.parse(data_bar)
          }
          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = $.extend(true, {}, areaChartData)

          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
          }

          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
          })
      });
    </script>
@endsection