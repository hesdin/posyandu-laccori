@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row align-items-center mb-2">
        <div class="col">
          <h2 class="h5 page-title">Hi Admin!</h2>
        </div>
      </div>
      {{-- Start Widgets --}}
      <div class="row my-4">
        <div class="col-md-4">
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">
                  <small class="text-muted mb-1">Page Views</small>
                  <h3 class="card-title mb-0">1168</h3>
                  <p class="small text-muted mb-0"><span class="fe fe-arrow-down fe-12 text-danger"></span><span>-18.9% Last week</span></p>
                </div>
                <div class="col-4 text-right">
                  <span class="sparkline inlineline"><canvas style="display: inline-block; width: 73.1667px; height: 32px; vertical-align: top;" width="73" height="32"></canvas></span>
                </div>
              </div> <!-- /. row -->
            </div> <!-- /. card-body -->
          </div> <!-- /. card -->
        </div> <!-- /. col -->
        <div class="col-md-4">
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">
                  <small class="text-muted mb-1">Conversion</small>
                  <h3 class="card-title mb-0">68</h3>
                  <p class="small text-muted mb-0"><span class="fe fe-arrow-up fe-12 text-warning"></span><span>+1.9% Last week</span></p>
                </div>
                <div class="col-4 text-right">
                  <span class="sparkline inlinepie"><canvas style="display: inline-block; width: 32px; height: 32px; vertical-align: top;" width="32" height="32"></canvas></span>
                </div>
              </div> <!-- /. row -->
            </div> <!-- /. card-body -->
          </div> <!-- /. card -->
        </div> <!-- /. col -->
        <div class="col-md-4">
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">
                  <small class="text-muted mb-1">Visitors</small>
                  <h3 class="card-title mb-0">108</h3>
                  <p class="small text-muted mb-0"><span class="fe fe-arrow-up fe-12 text-success"></span><span>37.7% Last week</span></p>
                </div>
                <div class="col-4 text-right">
                  <span class="sparkline inlinebar"><canvas style="display: inline-block; width: 40px; height: 32px; vertical-align: top;" width="40" height="32"></canvas></span>
                </div>
              </div> <!-- /. row -->
            </div> <!-- /. card-body -->
          </div> <!-- /. card -->
        </div> <!-- /. col -->
      </div>
      {{-- End Widgets --}}
    </div>
  </div>
</div>

@endsection