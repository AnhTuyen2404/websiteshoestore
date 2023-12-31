@extends('admin.layouts.master')
@section('title','ShoeStore || DASHBOARD')
@section('main-content')
<div class="container-fluid">
    @include('admin.layouts.notification')
  {{-- </div> --}}
  <div class="content-body">
    <!-- row -->
<div class="container-fluid">
<div class="row">
  <div class="col-xl-12">
    <div class="row">
      <div class="col-xl-6">
        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-header border-0 flex-wrap">
                <h4 class="fs-20 font-w700 mb-2">Project Statistics</h4>
                <div class="d-flex align-items-center project-tab mb-2">	
                  <div class="card-tabs mt-3 mt-sm-0 mb-3 ">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#monthly" role="tab">Monthly</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Weekly" role="tab">Weekly</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Today" role="tab">Today</a>
                      </li>
                    </ul>
                  </div>
                  <div class="dropdown ms-2">
                    <div class="btn-link" data-bs-toggle="dropdown">
                      <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5"></circle>
                        <circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5"></circle>
                        <circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5"></circle>
                      </svg>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                      <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                    </div>
                  </div>
                </div>	
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                  <div class="d-flex">
                    <div class="d-inline-block position-relative donut-chart-sale mb-3">
                      <span class="donut1" data-peity='{ "fill": ["rgba(136,108,192,1)", "rgba(241, 234, 255, 1)"],   "innerRadius": 20, "radius": 15}'>5/8</span>
                    </div>
                    <div class="ms-3">
                      <h4 class="fs-24 font-w700 ">246</h4>
                      <span class="fs-16 font-w400 d-block">Total Projects</span>
                    </div>
                  </div>
                  <div class="d-flex">	
                    <div class="d-flex me-5">
                      <div class="mt-2">
                        <svg width="13" height="13" viewbox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="6.5" cy="6.5" r="6.5" fill="#FFCF6D"></circle>
                        </svg>
                      </div>
                      <div class="ms-3">
                        <h4 class="fs-24 font-w700 ">246</h4>
                        <span class="fs-16 font-w400 d-block">On Going</span>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="mt-2">
                        <svg width="13" height="13" viewbox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="6.5" cy="6.5" r="6.5" fill="#FFA7D7"></circle>
                        </svg>

                      </div>
                      <div class="ms-3">
                        <h4 class="fs-24 font-w700 ">28</h4>
                        <span class="fs-16 font-w400 d-block">Unfinished</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-content">
                  <div class="tab-pane fade active show" id="monthly">
                    <div id="chartBar" class="chartBar"></div>
                  </div>	
                  <div class="tab-pane fade" id="Weekly">
                    <div id="chartBar1" class="chartBar"></div>
                  </div>
                  <div class="tab-pane fade" id="Today">
                    <div id="chartBar2" class="chartBar"></div>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <label class="form-check-label font-w400 fs-16 mb-0" for="flexSwitchCheckChecked1">Number</label>
                  <div class="form-check form-switch toggle-switch">
                    <input class="form-check-input custome" type="checkbox" id="flexSwitchCheckChecked1" checked="">
                   
                  </div>
                  <label class="form-check-label font-w400 fs-16 mb-0 ms-3" for="flexSwitchCheckChecked2">Analytics</label>	
                  <div class="form-check form-switch toggle-switch">
                    <input class="form-check-input custome" type="checkbox" id="flexSwitchCheckChecked2" checked="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12">
            <div class="card">
              <div class="card-header border-0 pb-0">
                <h4 class="fs-20 font-w700 mb-0">Completion Project Rate</h4>
                <div class="dropdown ">
                  <div class="btn-link" data-bs-toggle="dropdown">
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5"></circle>
                      <circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5"></circle>
                      <circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5"></circle>
                    </svg>
                  </div>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                    <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                  </div>
                </div>
              </div>
              <div class="card-body pb-0">
                <div id="revenueMap" class="revenueMap"></div>
              </div>
            </div>
          </div>
          <div class="col-xl-12">
            
          </div>
        </div>
        
      </div>
      <div class="col-xl-6">
        <div class="row">
          <div class="col-xl-12">
            <div class="row">
              <div class="col-xl-6 col-sm-6">
                <div class="card">
                  <div class="card-body d-flex px-4 pb-0 justify-content-between">
                    <div>
                      <h4 class="fs-18 font-w600 mb-4 text-nowrap">Total Clients</h4>
                      <div class="d-flex align-items-center">
                        <h2 class="fs-32 font-w700 mb-0">68</h2>
                        <span class="d-block ms-4">
                          <svg width="21" height="11" viewbox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.49217 11C0.590508 11 0.149368 9.9006 0.800944 9.27736L9.80878 0.66117C10.1954 0.29136 10.8046 0.291359 11.1912 0.661169L20.1991 9.27736C20.8506 9.9006 20.4095 11 19.5078 11H1.49217Z" fill="#09BD3C"></path>
                          </svg>
                          <small class="d-block fs-16 font-w400 text-success">+0,5%</small>
                        </span>
                      </div>
                    </div>
                    <div id="columnChart"></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-sm-6">
                <div class="card">
                  <div class="card-body px-4 pb-0">
                    <h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Clients</h4>
                    <div class="progress default-progress">
                      <div class="progress-bar bg-gradient1 progress-animated" style="width: 40%; height:10px;" role="progressbar">
                        <span class="sr-only">45% Complete</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                      <span>76 left from target</span>
                      <h4 class="mb-0">42</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-sm-6">
                <div class="card">
                  <div class="card-body d-flex px-4  justify-content-between">
                    <div>
                      <div class="">
                        <h2 class="fs-32 font-w700">562</h2>
                        <span class="fs-18 font-w500 d-block">Total Clients</span>
                        <span class="d-block fs-16 font-w400"><small class="text-danger">-2%</small> than last month</span>
                      </div>
                    </div>
                    <div id="NewCustomers"></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-sm-6">
                <div class="card">
                  <div class="card-body d-flex px-4  justify-content-between">
                    <div>
                      <div class="">
                        <h2 class="fs-32 font-w700">892</h2>
                        <span class="fs-18 font-w500 d-block">New Projects</span>
                        <span class="d-block fs-16 font-w400"><small class="text-success">-2%</small> than last month</span>
                      </div>
                    </div>
                    <div id="NewCustomers1"></div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-6 col-sm-6">
                    <div class=" owl-carousel card-slider">
                      <div class="items">
                        <h4 class="fs-20 font-w700 mb-4">Fillow Company Profile Website Project</h4>
                        <span class="fs-14 font-w400">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque </span>
                      </div>	
                      <div class="items">
                        <h4 class="fs-20 font-w700 mb-4">Fillow Company Profile Website Project</h4>
                        <span class="fs-14 font-w400">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque </span>
                      </div>	
                      <div class="items">
                        <h4 class="fs-20 font-w700 mb-4">Fillow Company Profile Website Project</h4>
                        <span class="fs-14 font-w400">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque </span>
                      </div>	
                    </div>
                  </div>
                  <div class="col-xl-6 redial col-sm-6">
                    <div id="redial"></div>
                    <span class="text-center d-block fs-18 font-w600">On Progress <small class="text-success">70%</small></span>	
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-lg-12">
            <div class="row">
              <div class="col-xl-6 col-xxl-12 col-sm-6">
                <div class="card">
                  <div class="card-header border-0">
                    <div>
                      <h4 class="fs-20 font-w700">Email Categories</h4>
                      <span class="fs-14 font-w400 d-block">Lorem ipsum dolor sit amet</span>
                    </div>	
                  </div>	
                  <div class="card-body">
                    <div id="emailchart"> </div>
                    <div class="mb-3 mt-4">
                      <h4 class="fs-18 font-w600">Legend</h4>
                    </div>
                    <div>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                        <span class="fs-18 font-w500">	
                          <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="6" fill="#886CC0"></rect>
                          </svg>
                          Primary (27%)
                        </span>
                        <span class="fs-18 font-w600">763</span>
                      </div>
                      <div class="d-flex align-items-center justify-content-between  mb-4">
                        <span class="fs-18 font-w500">	
                          <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="6" fill="#26E023"></rect>
                          </svg>
                          Promotion (11%)
                        </span>
                        <span class="fs-18 font-w600">321</span>
                      </div>
                      <div class="d-flex align-items-center justify-content-between  mb-4">
                        <span class="fs-18 font-w500">	
                          <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="6" fill="#61CFF1"></rect>
                          </svg>
                          Forum (22%)
                        </span>
                        <span class="fs-18 font-w600">69</span>
                      </div>
                      <div class="d-flex align-items-center justify-content-between  mb-4">
                        <span class="fs-18 font-w500">	
                          <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="6" fill="#FFDA7C"></rect>
                          </svg>
                          Socials (15%) 
                        </span>
                        <span class="fs-18 font-w600">154</span>
                      </div>
                      <div class="d-flex align-items-center justify-content-between  mb-4">
                        <span class="fs-18 font-w500">	
                          <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="6" fill="#FF86B1"></rect>
                          </svg>
                          Spam (25%) 
                        </span>
                        <span class="fs-18 font-w600">696</span>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer border-0 pt-0">
                    <a href="javascript:void(0);" class="btn btn-outline-primary d-block btn-rounded">Update Progress</a>		
                  </div>
                </div>
              </div>	
            </div>	
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
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