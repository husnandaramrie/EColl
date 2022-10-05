@extends('layouts.backend.app',[
	'title' => 'Dashboard',
	'contentTitle' => 'Dashboard',
])
@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>100</h3>
        {{-- <h3>@count('admin')</h3> --}}

        <p>Management User</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-tie"></i>
      </div>
      <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>100</h3>
        {{-- <h3>@count('admin.users.index')</h3> --}}

        <p>Dashboard</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-tie"></i>
      </div>
      <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>100</h3>
        {{-- <h3>@count('admin.dashboard.index')</h3> --}}

        <p>Transaksi</p>
      </div>
      <div class="icon">
        <i class="fas fa-image"></i>
      </div>
      <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>100</h3>
        {{-- <h3>@count('admin.transaksi.index')</h3> --}}

        <p>Tracking User</p>
      </div>
      <div class="icon">
        <i class="fas fa-list"></i>
      </div>
      <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
<!-- /.row -->
@stop
