@extends('layouts.backend.app',[
	'title' => 'Manage Users',
	'contentTitle' => 'Manage Users',
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
				<a href="{{route('admin.users.addView')}}" class="btn btn-primary btn-sm">Tambah Data</a>
			</div>
			<div class="card-body table-responsive">
				<table id="dataTable1" class="table table-bordered table-hover">
				<thead>
				<tr>
                    <th>No</th>
				  <th>User Nama</th>
				  <th>Kode Kolektor</th>
				  <th>Cabang</th>
				  <th>View Laporan</th>
				  <th>Melakukan Transaksi</th>
				  <th>Otorisasi</th>
				  <th>Limit Nominal Otorisasi</th>
				  <th>Privelege Add User</th>
				  <th>Relasi User MBS Online</th>
				</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
				<tr>
				  <td>{{ $loop->index + 1 }}</td>
				  <td>{{ $user['name'] }}</td>
				  <td>{{ $user['kodekolector'] }}</td>
				  <td>{{ $user['cabang'] }}</td>
				  <td>{{ $user['viewreport'] == true ? 'Y' : 'T' }}</td>
				  <td>{{ $user['transsetoran'] == true ? 'Y' : 'T' }}</td>
				  <td>{{ $user['viewotorisasi'] == true ? 'Y' : 'T' }}</td>
				  <td>{{ $user['limitotorisasi'] }}</td>
				  <td>{{ $user['adduser'] == true ? 'Y' : 'T' }}</td>
				  <td>{{ $user['corebankid'] }}</td>
				  <td>
					<a href="{{route('admin.users.update.view', $user['userid'])}}" class="btn btn-primary btn-sm">Ubah</a>
                    <a href="{{route('admin.users.destroy', $user['userid'])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
