@extends('layouts.backend.app',[
	'title' => 'PIN Transaksi',
	'contentTitle' => 'PIN Transaksi',
])
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
<x-alert></x-alert>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<a href="{{ route('admin.pintransaksi.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
			</div>
			<div class="card-body table-responsive">
				<table id="dataTable1" class="table table-bordered table-hover">
				<thead>
				<tr>
				  <th>No</th>
				  <th>Username</th>
				  <th>Nama</th>
				  <th>Kantor</th>
				  <th>Tanggal</th>
				  <th>PIN</th>
				  <th>Limit</th>
				  <th>Waktu Max</th>
                  <th>Saldo Awal</th>
                  <th>Saldo Akhir</th>
                  <th>Kode Open</th>
                  <th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				@php 
					$no=1;
				@endphp

				@foreach($users as $user)
				<tr>
				  <td>{{ $no++ }}</td>
				  <td>{{ $user->username }}</td>
				  <td>{{ $user->nama }}</td>
				  <td>{{ $user->kantor }}</td>
				  <td>{{ $user->tanggal }}</td>
				  <td>{{ $user->pin }}</td>
				  <td>{{ $user->limit }}</td>
				  <td>{{ $user->waktumax }}</td>
				  <td>{{ $user->saldoawal }}</td>
                  <td>{{ $user->saldoakhir }}</td>
                  <td>{{ $user->kodeopen }}</td>
				  <td>
					{{-- Button back --}}
					<button type="submit" class="btn btn-danger btn-sm ml-2"><i class="fas fa-back fa-fw">Back</i></button>
					{{-- Button Save --}}
					<button onclick="return confirm('')" type="submit" class="btn btn-danger btn-sm ml-2"><i class="fas fa-back fa-fw"></i></button>
					{{-- Button Delete --}}
					<div class="row ml-2">
				  		<a href="{{ route('admin.pintransaksi.edit',$user->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit fa-fw"></i></a>
				  		<form method="POST" action="{{ route('admin.pintransaksi.destroy',$user->id) }}">
				  			@csrf
				  			@method('DELETE')
				  			<button onclick="return confirm('Yakin hapus ?')" type="submit" class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash fa-fw"></i></button>
						</form>
				  	</div>
				  </td>
			<div class="card-header">
				<a href="{{ route('admin.pintransaksi.index') }}" class="btn btn-success btn-sm">Kembali</a>
			</div>
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