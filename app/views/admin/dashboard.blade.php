@extends('partials.admin.base')
@section('content')
<div class="contents">
   <div class="atbd-page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb-main">
                  <h4 class="text-capitalize breadcrumb-title">ADMIN DASHBOARD</h4>
                  <div class="breadcrumb-action justify-content-center flex-wrap">
                     <div class="action-btn">
                        <div class="form-group mb-0">
                           <div class="input-container icon-left position-relative">
                              <span class="input-icon icon-left">
                              <span data-feather="calendar"></span>
                              </span>
                              <input type="text" class="form-control form-control-default date-ranger" name="date-ranger" placeholder="Oct 30, 2019 - Nov 30, 2019">
                              <span class="input-icon icon-right">
                              <span data-feather="chevron-down"></span>
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="dropdown action-btn">
                        <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download"></i> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                           <span class="dropdown-item">Export With</span>
                           <div class="dropdown-divider"></div>
                           <a href="" class="dropdown-item">
                           <i class="la la-print"></i> Printer</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-file-pdf"></i> PDF</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-file-text"></i> Google Sheets</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-file-excel"></i> Excel (XLSX)</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-file-csv"></i> CSV</a>
                        </div>
                     </div>
                     <div class="dropdown action-btn">
                        <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-share"></i> Share
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                           <span class="dropdown-item">Share Link</span>
                           <div class="dropdown-divider"></div>
                           <a href="" class="dropdown-item">
                           <i class="la la-facebook"></i> Facebook</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-twitter"></i> Twitter</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-google"></i> Google</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-feed"></i> Feed</a>
                           <a href="" class="dropdown-item">
                           <i class="la la-instagram"></i> Instagram</a>
                        </div>
                     </div>
                     <div class="action-btn">
                        <a href="" class="btn btn-sm btn-primary btn-add">
                        <i class="la la-plus"></i> Add New</a>
                     </div>
                  </div>
               </div>
            </div>
           
            <div class="col-lg-12">

               @if (session('user')->account_type == 'admin')
                  @if(in_array('view-charts', session('user')->roles))
                     <div class="row">
                        <div class="col-lg-6">
                           <h4><u>Top 10 most searched categories</u></h4>
                           <div class="loading-chart"></div>
                           <canvas id="categoriesCanvas" class="shadow mt-3"></canvas>
                        </div>
                        <div class="col-lg-6">
                           <h4><u>Top 10 most searched Items</u></h4>
                           <div class="loading-chart"></div>
                           <canvas id="itemsCanvas" class="shadow mt-3"></canvas>
                        </div>
                     </div>

                     <div class="row mt-5">
                        <div class="col-lg-6">
                           <h4><u>Doughnut Chart showing percentage (%) of top 10 most searched categories</u></h4>
                           <div class="loading-chart"></div>
                           <canvas id="pieChartcategoriesCanvas" class="shadow mt-3"></canvas>
                        </div>
                        <div class="col-lg-6">
                           <h4><u>Pie Chart showing percentage (%) of top 10 most searched Items</u></h4>
                           <div class="loading-chart"></div>
                           <canvas id="pieChartitemsCanvas" class="shadow mt-3"></canvas>
                        </div>
                     </div>
                  @else 
                     <div class="alert alert-info">
                        Oops, you do not have privileges to view content on this page.
                     </div>
                  @endif
               @endif

               @if (session('user')->account_type == 'super')
               @if(in_array('view-charts', session('user')->roles))
                  <div class="row">
                     <div class="col-lg-6">
                        <h4><u>A Bar graph showing number of supermarket customers and supermarket admins</u></h4>
                        <div class="loading-chart"></div>
                        <canvas id="usersBarCanvas" class="shadow mt-3"></canvas>
                     </div>
                     <div class="col-lg-6">
                        <h4><u>A Doughnut graph showing number of percentage supermarket customers and supermarket admins</u></h4>
                        <div class="loading-chart"></div>
                        <canvas id="usersChartCanvas" class="shadow mt-3"></canvas>
                     </div>
                  </div>
                  <div class="row mt-3">
                     <div class="col-lg-6">
                        <h4><u>A Bar graph showing number of customers per supermarket</u></h4>
                        <div class="loading-chart"></div>
                        <canvas id="visitorsBarCanvas" class="shadow mt-3"></canvas>
                     </div>
                     <div class="col-lg-6">
                        <h4><u>A Doughnut graph showing percenatege of customers per supermarket</u></h4>
                        <div class="loading-chart"></div>
                        <canvas id="visitorsChartCanvas" class="shadow mt-3"></canvas>
                     </div>
                  </div>
                  <div class="sup-expiry" style="position: fixed; bottom: 10px; right: 0;">
                     
                  </div>
               @endif
               
               @endif
            </div>
            <!-- ends: .col-lg-6 -->
         </div>
      </div>
   </div>
   <!-- ends: .atbd-page-content -->
</div>
@endsection
@section('scripts')
   <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>
   <script src="{{ asset('js/data-visualization.js') }}"></script>
@endsection