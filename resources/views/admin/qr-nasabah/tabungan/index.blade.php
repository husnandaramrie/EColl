@extends('layouts.backend.app',[
	'title' => 'QR Nasabah Tabungan',
	'contentTitle' => 'QR Nasabah Tabungan',
])
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    @if (Session::has('success'))
    <div class="col-12">
        <div class="alert alert-success">{{Session::get('success')}}</div>
    </div>
	
    @endif
    @if (Session::has('error'))
    <div class="col-12">
        <div class="alert alert-danger">{{Session::get('error')}}</div>
    </div>
    @endif

	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<form method="POST" action="{{route('admin.tabungan.cari')}}">
					@csrf
					<div class="form-row">
						<div class="col-2">
							<input type="text" name="norek" class="form-control" value="{{ $status['code'] == 'new' ? "" : $barcodes['data'][0]['norek'] }}">
						</div>
						<div class="col-3">
							<button type="submit" class="btn btn-primary btn-sm mb-1" name="tags" value="views">Cari Data</button>
							<button type="submit" class="btn btn-primary btn-sm mb-1" name="tags" value="prints">Print</button>
										{{-- <a href="{{ route('admin.tabungan.cetak') }}" class="btn btn-primary btn-sm">Print</a> --}}
						</div>
					</div>
				</form>
			</div>
			<div class="card-body table-responsive">
				<table id="dataTable1" class="table table-bordered table-hover">
				<thead>
					<tr></tr>
				</thead>
				<tbody class="text-center">
				@foreach($barcodes['data'] as $bc)
				@php 
					$col = 1;
					$count = $loop->count; 
				@endphp
				@endforeach
				
				<tr>
				@for($i = 0; $i < $count; $i++)
					@if($col > 3)
						<tr>
					@endif
						@if($col < 4)
						<td>
							<div class="card text-center">
								<p class="text-center mx-auto"><br>
 								{!! QrCode::size(150)->generate($barcodes['data'][$i]['norek']); !!}
								</p>
								<div class="card-footer text-muted">
									<p class="h5"> {{ $barcodes['data'][$i]['norek'] }}</p>
									<p class="h7"> {{ $barcodes['data'][$i]['nama'] }}</p>
								</div>
							</div>
 						</td>
						@endif
					@if($col > 3)
					</tr>
					@php $col = 0; @endphp
					@endif	
					@php $col++ @endphp				
 				@endfor
				</tr>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@stop
@push('js')
<!-- DataTables -->
<script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#dataTable1").DataTable();
    $('#dataTable2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
@endpush
