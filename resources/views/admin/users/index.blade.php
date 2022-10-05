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
				<a href="{{route('admin.users.addView')}}" class="btn btn-primary btn-sm {{ Session::get('AddUser') ? "" : "disabled" }}">Tambah Data</a>
			</div>
			<div class="card-body table-responsive">
				<table id="dataTable1" class="table table-bordered table-hover">
				<thead>
				<tr>
                  <th>No</th>
				  <th>User Nama</th>
				  <th>Kode Kolektor</th>
				  <th>View Laporan</th>
				  <th>Melakukan Transaksi</th>
				  <th>Otorisasi</th>
				  <th>Limit Nominal Otorisasi</th>
				  <th>Privelege Add User</th>
				  <th>Relasi User MBS Online</th>
				  <th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				{{-- @dd($users) --}}
				@if($users['code']=='200')
				@foreach($users['data'] as $user)
				<tr>
				  <td>{{ $loop->index + 1 }}</td>
				  <td>{{ $user['name'] }}</td>
				  <td>{{ $user['kodekolector'] }}</td>
				  <td>{{ $user['viewreport'] == 1 ? "Ya" : "Tidak" }}</td>
				  <td>{{ $user['transsetoran'] == 1 ? "Ya" : "Tidak" }}</td>
				  <td>{{ $user['viewotorisasi'] == 1 ? "Ya" : "Tidak" }}</td>
				  <td>{{ $user['limitotorisasi'] }}</td>
				  <td>{{ $user['adduser'] == 1 ? "Ya" : "Tidak" }} </td>
				  <td>{{ $user['corebankid'] }}</td>
				  <td>
					@if(Session::get('AddUser'))
						<a href="{{route('admin.users.update.view', $user['userid'])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit fa-fw"></i></a>
                    	<a href="{{route('admin.users.destroy', $user['userid'])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
					@endif
				  </td>
				</tr>
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
