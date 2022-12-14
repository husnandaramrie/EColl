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
					<tfoot>
						<tr>
							<th colspan="8">Total : </th>
							<th colspan="2"></th>
						</tr>
					</tfoot>
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
<script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/jquery/sum().js"></script>
<script>
  $(function () {
    var table = $('#dataTable1').DataTable({
		footerCallback: function (row, data, start, end, display) {
            var api = this.api();
 
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
 
            // Total over all pages
            total = api
                .column(8)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Total over this page
            pageTotal = api
                .column(8, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Update footer
            $(api.column(8).footer()).html('Rp. ' + new Intl.NumberFormat().format(pageTotal) + ' (Rp. ' + Intl.NumberFormat().format(total) + ' total)');
        },
	});
   });
 </script>
{{-- <script>
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
 --}}
 @endpush