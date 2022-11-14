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
        @php $jum = 0 @endphp
        @if($users['code'] == '200')
          @php $jum = count($users['data']) @endphp
        @endif
        <h3>{{ $jum }}</h3>
        <p>Management User</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-tie"></i>
      </div>
      <a href="{{ route('admin.users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-secondary">
      <div class="inner">
        @php $jumnews = 0 @endphp
        @if($news['code'] == '200')
          @php $jumnews = count($news['data']) @endphp
        @endif
        <h3>{{ $jumnews }}</h3>
        <p>Dashboard</p>
      </div>
      <div class="icon">
        <i class="fas fa-image"></i>
      </div>
      <a href="{{ route('admin.board') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        @php $jumtrans = 0 @endphp
        @if($trans['code'] == '200')
          @php $jumtrans = count($trans['data']) @endphp
        @endif
        <h3>{{ $jumtrans }}</h3>
        <p>Transaksi</p>
      </div>
      <div class="icon">
        <i class="fas fa-list"></i>
      </div>
      <a href="{{ route('admin.data_transaksi') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        @php $jumtrans = 0 @endphp
        @if($valids['code'] == '200')
          @php $jumtrans = count($valids['data']) @endphp
        @endif
        <h3>{{ $jumtrans }}</h3>
        <p>Validasi</p>
      </div>
      <div class="icon">
        <i class="fas fa-list"></i>
      </div>
      <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        @php $i = 0 @endphp
        @if($pins['code'] == '200')
        @foreach($pins['data'] as $pin)
            @if($pin['status'] == "Open PIN")
                  @php $i++ @endphp
            @endif
        @endforeach
        @endif
        <h3>{{ $i }}</h3>
        <p>PIN Open</p>
      </div>
      <div class="icon">
        <i class="fas fa-list"></i>
      </div>
      <a href="{{ route('admin.pintransaksi') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
<!-- /.row -->
@stop
