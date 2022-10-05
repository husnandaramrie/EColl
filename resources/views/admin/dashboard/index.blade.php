@extends('layouts.backend.app',[
	'title' => 'Dashboard',
	'contentTitle' => 'Dashboard',
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
				<a href="{{route('admin.dashboard.addView')}}" class="btn btn-primary btn-sm">Tambah Pesan Dashboard</a>
			</div>

			<div class="card-body table-responsive">
				<table id="dataTable1" class="table table-bordered table-hover">
				<thead>
				<tr>
                  <th>No</th>
				  {{-- <th>ID</th> --}}
				  <th>Tanggal</th>
				  <th>Expired</th>
				  <th>Tipe</th>
				  <th>Message</th>
				  <th>status</th>
				  <th>Aksi</th>
				</tr>
				</thead>
				<tbody>
					{{-- @dd($dashboard) --}}
				@if(count($dashboard)>0)
					{{-- Check Apakah Minimum 1 item --}}
					@foreach($dashboard as $refid)
					<tr>
					<td>{{ $loop->index + 1 }}</td>
					{{-- <td>{{ $refid['refid'] }}</td> --}}
					<td>{{ $refid['refdate'] }}</td>
					<td>{{ $refid['expdate'] }}</td>
					<td>{{ $refid['reftype'] }}</td>
					<td>{{ $refid['news'] }}</td>
					<td>{{ $refid['status'] }}</td>
					<td>
						{{-- <a href="{{route('admin.dashboard.updateViewDashboard.view', $refid['refid'])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit fa-fw"></i></a> --}}
						{{-- <a href="{{route('admin.dashboard.destroyDashboard', $userid['userid'])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
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
{{-- @section --}}
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
