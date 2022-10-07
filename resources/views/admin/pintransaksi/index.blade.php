@extends('layouts.backend.app',[
	'title' => 'PIN Transaksi',
	'contentTitle' => 'PIN Transaksi',
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
				<a href="{{route('admin.pintransaksi.addView')}}" class="btn btn-primary btn-sm">Tambah Data</a>
			</div>

			<div class="card-body table-responsive">
				<table id="dataTable1" class="table table-bordered table-hover">
				<thead>
				<tr>
				  <th>User ID</th>
				  <th>PIN</th>
				  <th>Cabang</th>
				  <th>Limit</th>
				  <th>Waktu Max</th>
                  <th>Saldo Awal</th>
				  <th>Saldo Akhir</th>
                  <th>Kode Open</th>
                  <th>Aksi</th>
				  <th>Status</th>
				</tr>
				</thead>
				<tbody>
					@if($pintransaksi['code']=='200')
				
					@foreach($pintransaksi['data'] as $userid)
					<tr>
					  <td>{{ $userid['userid'] }}</td>
					  <td>{{ $userid['pin'] }}</td>
					  <td>{{ $userid['cabang'] }}</td>
					  <td>{{ $userid['userlimit'] }}</td>
					  <td>{{ \Carbon\Carbon::parse($userid['maxtime'])->format('d/m/Y H:i') }}</td>
					  <td>{{ $userid['saldoawal'] }}</td>
					  <td>{{ number_format($userid['saldoakhir'],0) }}</td>
					  <td>{{ $userid['refno'] }}</td>
					  <td>
						@if($userid['status'] == "Open PIN")
							<a href="{{route('admin.pintransaksi.updateViewPin.view', $userid['userid'])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit fa-fw"></i></a>
						@endif
					  </td>
					  <td>
						@if($userid['status'] == "Open PIN")
						  <a href="{{ route('admin.pintransaksi.closePin', [$userid['userid'], $userid['refno']]) }}" class="btn btn-warning">Close Pin</a>					
						@else
						<p class="font-weight-bold">Closed Pin</p>
						@endif  
						{{-- {{ : "Closed Pin" }} --}}
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