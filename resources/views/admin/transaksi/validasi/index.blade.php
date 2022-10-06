@extends('layouts.backend.app',[
	'title' => 'Validasi Transaksi',
	'contentTitle' => 'Validasi Transaksi',
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
				{{-- <a href="{{route('admin.validasi.addView')}}" class="btn btn-primary btn-sm">Filter Transaksi</a>
				<a href="{{route('admin.validasi.addView')}}" class="btn btn-primary btn-sm">Cetak</a> --}}
			</div>

			<div class="card-body table-responsive">
				<table id="dataTable1" class="table table-bordered table-hover">
				<thead>
				<tr>
				  <th>No</th>
				  <th>Tanggal</th>
				  <th>Petugas</th>
				  <th>Jenis</th>
                  <th>Tipe</th>
                  <th>Kode Transaksi</th>
				  <th>Rekening</th>
				  <th>Nama</th>
				  <th>Jumlah</th>
				  <th>Status</th>
				</tr>
				</thead>
				<tbody>
					@if($validasi['code']=='200')
					@foreach($validasi['data'] as $data)
					<tr>
					<td>{{ $loop->index + 1 }}</td>
					<td>{{ \Carbon\Carbon::parse($data['refdate'])->format('d/m/Y H:i') }}</td>
					<td>{{ $data['userid'] }}</td>
					<td>{{ $data['jenis'] }}</td>
					<td>{{ $data['tipe'] }}</td>
					<td>{{ $data['refno'] }}</td>
					<td>{{ $data['norek'] }}</td>
					<td>{{ $data['name'] }}</td>
					<td>{{ number_format($data['amount'],0) }}</td>
					<td>{{ $data['status'] }}</td>
					</td>
					@endforeach
				@endif
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