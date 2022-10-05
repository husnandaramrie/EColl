@extends('layouts.backend.app',[
	'title' => 'QR Nasabah Kredit',
	'contentTitle' => 'QR Nasabah Kredit',
])
@push('css')
<!-- DataTables -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
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
					
					<tr>
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
						<td>
							{!! QrCode::size(200)->generate($bc['norek']); !!} <br> 
							<p class="h4"> {{ $bc['norek'] }}</p>
							<p class="h4"> {{ $bc['nama'] }} </p>
						</td>
					</tr>
				@endforeach
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
