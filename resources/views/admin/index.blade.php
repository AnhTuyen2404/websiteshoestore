@extends('admin.layouts.master')
@section('title','E-SHOP || DASHBOARD')
@section('main-content')
<div class="container-fluid">
    @include('admin.layouts.notification')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Category -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Category</div>
                {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Category::countActiveCategory()}}</div> --}}
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Products -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Products</div>
                {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Product::countActiveProduct()}}</div> --}}
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-cubes fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Order -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Order</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{\App\Models\Order::countOrder()}}</div> --}}
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                  </div>

                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Posts-->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Blog</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Order::counblog()}}</div> --}}
              </div>
              <div class="col-auto">
                <i class="fas fa-folder fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Doanh thu</h6>

          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body" style="overflow:hidden">
            <div id="pie_chart" style="width:300px; height:320px;">
              <canvas id="orderChart"></canvas>
            </div>
        </div>
      </div>
    </div>
    <!-- Content Row -->

  </div>
@endsection

@push('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- pie chart --}}
      {{-- <script>
        var data = @json($data);

        var labels = data.map(item => item.year + '-' + item.month);
        var totals = data.map(item => item.total);

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Doanh thu',
              data: totals,
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script> --}}

      {{-- <script>
        var data = <?php echo json_encode($data); ?>;

        var labels = data.map(function(entry) {
          return entry.year + '-' + entry.month;
        });

        var orderCounts = data.map(function(entry) {
          return entry.order_count;
        });

        var ctx = document.getElementById('orderChart').getContext('2d');
        var orderChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: 'Số đơn',
              data: orderCounts,
              borderColor: 'rgba(75, 192, 192, 1)',
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderWidth: 1,
              fill: true,
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
                title: {
                  display: true,
                }
              },
              x: {
                title: {
                  display: true,
                  text: 'Năm - tháng'
                }
              }
            }
          }
        });
      </script> --}}

@endpush