@extends('layouts.master')
@section('title')
  Home-news programme
@stop
@section('css')
  <!--  Owl-carousel css-->
  <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
  <!-- Maps css -->
  <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">
          INTERNATIONAL NEWS AGENCY
        </h2>
        <p class="mg-b-0">Trending News </p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13">Customer Ratings</label>
        <div class="main-star">
          <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
            class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i>
          <span>(14,873)</span>
        </div>
      </div>
      <div>
        <label class="tx-13">Online Sales</label>
        <h5>563,275</h5>
      </div>
      <div>
        <label class="tx-13">Offline Sales</label>
        <h5>783,675</h5>
      </div>
    </div>
  </div>
  <!-- /breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  <div class="row row-sm">

    {{-- Get All About News --}}

    @foreach ($news as $ne)
      <div class="col-12  col-lg-12 col-xl-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $ne->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $ne->category['cate_name'] }}</h6>
            <p class="card-text">
              .{{ $ne->content }}</p>
            <span>
              @foreach ($ne->tags as $tag)
                <span class="tag tag-blue">{{ $tag['tag_name'] }}</span>
              @endforeach
            </span>
            <div class="card-footer bd-t tx-left">
              Share <i class="icon ion-logo-facebook mg-l-5 mg-r-5"></i>
              <i class="icon ion-logo-twitter"></i>
            </div>
            <span>{{ date('d-m-Y ', strtotime($ne->created_at)) }}</span>

          </div>
        </div>
      </div>
    @endforeach

  </div>
  <!-- row closed -->

  <!-- row opened -->
  <div class="row row-sm">
    <div class="col-md-12 col-lg-12 col-xl-7">
      <div class="card">
        <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
          <div class="d-flex justify-content-between">
            <h4 class="card-title mb-0">Order status</h4>
            <i class="mdi mdi-dots-horizontal text-gray"></i>
          </div>
          <p class="tx-12 text-muted mb-0">Order Status and Tracking. Track your order from ship date to arrival.
            To begin, enter your order number.</p>
        </div>
        <div class="card-body">
          <div class="total-revenue">
            <div>
              <h4>120,750</h4>
              <label><span class="bg-primary"></span>success</label>
            </div>
            <div>
              <h4>56,108</h4>
              <label><span class="bg-danger"></span>Pending</label>
            </div>
            <div>
              <h4>32,895</h4>
              <label><span class="bg-warning"></span>Failed</label>
            </div>
          </div>
          <div id="bar" class="sales-bar mt-4"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-xl-5">
      <div class="card card-dashboard-map-one">
        <label class="main-content-label">Sales Revenue by Customers in USA</label>
        <span class="d-block mg-b-20 text-muted tx-12">Sales Performance of all states in the United States</span>
        <div class="">
          <div class="vmap-wrapper ht-180" id="vmap2"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- row closed -->




  <!-- /row -->
  </div>
  </div>
  <!-- Container closed -->
@endsection
@section('js')
  <!--Internal  Chart.bundle js -->
  <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
  <!-- Moment js -->
  <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
  <!--Internal  Flot js-->
  <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
  <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
  <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
  <!--Internal Apexchart js-->
  <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
  <!-- Internal Map -->
  <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
  <!--Internal  index js -->
  <script src="{{ URL::asset('assets/js/index.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
