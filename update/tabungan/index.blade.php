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
				{{-- <a href="#" class="btn btn-primary btn-sm">Cari Data</a> --}}
				<a href="#" class="btn btn-primary btn-sm">Print</a>
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
									
					@for($i = 0; $i < $count; $i++)
					@if($col > 3)
						<tr>
					@endif
						@if($col < 4)
						<td>
							<div class="card text-center">
								<p class="text-center mx-auto">
								{!! QrCode::size(200)->generate($bc['norek']); !!} <br> 
							</p>
							<div class="card-footer text-muted">
								<p class="h4"> {{ $bc['norek'] }}</p>
								<p class="h4"> {{ $bc['nama'] }} </p>
							</div>
						</div>
					</td>
						<td>
							{!! QrCode::size(200)->generate($bc['norek']); !!} <br> 
							<p class="h4"> {{ $bc['norek'] }}</p>
							<p class="h4"> {{ $bc['nama'] }} </p>
						</td>
						<td>
							{!! QrCode::size(200)->generate($bc['norek']); !!} <br> 
							<p class="h4"> {{ $bc['norek'] }}</p>
							<p class="h4"> {{ $bc['nama'] }} </p>
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
