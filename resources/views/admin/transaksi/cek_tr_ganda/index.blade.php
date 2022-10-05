@extends('layouts.backend.app',[
	'title' => 'Manage Data Ganda',
	'contentTitle' => 'Data Ganda',
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
				{{-- <a href="#" class="btn btn-primary btn-sm">Filter Transaksi</a>
				<a href="#" class="btn btn-primary btn-sm">Print</a> --}}
			</div>
			<div class="card-body table-responsive">
				<table id="dataTable1" class="table table-bordered table-hover">
				<thead>
				<tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Kode Transaksi</th>
                  <th>Jumlah</th>
				  <th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				@foreach($cek_tr_ganda as $data)
				<tr>
				  <td>{{ $loop->index + 1 }}</td>
				  <td>{{ $data['refdate'] }}</td>
				  <td>{{ $data['name'] }}</td>
				  <td>{{ $data['refno'] }}</td>
				  <td>{{ $data['amount'] }}</td>
				  <td>
					<a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
