@extends('layouts.backend.print',[
	'title' => 'Data Transaksi',
	'contentTitle' => 'Data Transaksi',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    {{-- @if (Session::has('success'))
    <div class="col-12">
        <div class="alert alert-success">{{Session::get('success')}}</div>
    </div>
	
    @endif
    @if (Session::has('error'))
    <div class="col-12">
        <div class="alert alert-danger">{{Session::get('error')}}</div>
    </div>
    @endif --}}

	<div class="col-12">
		{{-- <div class="card"> --}}
			{{-- <div class="card-header"> --}}
				{{-- <a href="{{route('admin.data_transaksi.addView')}}" class="btn btn-primary btn-sm">Filter Transaksi</a>
				<a href="{{route('admin.data_transaksi.addView')}}" class="btn btn-primary btn-sm">Cetak</a> --}}
			{{-- </div> --}}

			{{-- <div class="card-body table-responsive"> --}}
				<table id="dataTable0" class="table table-sm table-borderless">
				<thead>
				@if($data_user['code'] == '200')
				@foreach($data_user['data'] as $user)
					<tr>
						<th colspan="9" class="text-center">Laporan Transaksi</th>
					</tr>
					<tr>
						<th colspan="9" class="text-center">AGM - {{ $user['cabangname'] }}</th>
					</tr>
					<tr>
						<th colspan="9" class="text-center">{{ $user['clientname'] }}</th>
					</tr>
					<tr>
						<th colspan="9" class="text-center">Petugas {{ $user['name'] }}</th>
					</tr>
				@endforeach
				@endif
				</thead>
				</table>

				<table id="dataTable1" class="table table-bordered table-hover table-sm">
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
				  {{-- <th>Status</th> --}}
				  {{-- <th>Aksi</th> --}}
				</tr>
				</thead>
				<tbody>
					@if($data_transaksi['code']=='200')
					@foreach($data_transaksi['data'] as $data)
						@php
							$no = $loop->index + 1;	
						@endphp
						<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{ \Carbon\Carbon::parse($data['refdate'])->format('d/m/Y H:i') }}</td>
						<td>{{ $data['userid'] }}</td>
						<td>{{ $data['jenis'] }}</td>
						<td>{{ $data['tipe'] }}</td>
						<td>{{ $data['refno'] }}</td>
						<td>{{ $data['norek'] }}</td>
						<td>{{ $data['name'] }}</td>
						<td class="d-flex justify-content-end">{{ number_format($data['amount'],0) }}</td>
						{{-- <td>{{ $data['status'] }}</td> --}}
						{{-- <td>
							<a href="{{route('admin.data_transaksi.destroyDataTrans', $data['refno'])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
						</td> --}}
						</tr>
					@endforeach
					@endif
					@if($data_saldo['code']=='200')
					@foreach($data_saldo['data'] as $saldo)	
					<tfoot>
						<tr>
							<th colspan="8">Jumlah : </th>
							<th class="d-flex justify-content-end">{{ number_format($saldo['saldoakhir'] - $saldo['saldoawal'],0) }}</th>
						</tr>
						<tr>
							<th colspan="8">Saldo Awal : </th>
							<th class="d-flex justify-content-end">{{ number_format($saldo['saldoawal'],0) }}</th>
						</tr>
						<tr>
							<th colspan="8">Saldo Akhir : </th>
							<th class="d-flex justify-content-end">{{ number_format($saldo['saldoakhir'],0) }}</th>
						</tr>
					</tfoot>
					@endforeach
					@endif
				</tbody>
				</table>
			{{-- </div> --}}
		{{-- </div> --}}
	</div>
</div>

{{-- @stop --}}
{{-- @push('js') --}}
<!-- DataTables -->
{{-- <script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables/jquery.dataTables.js"></script>
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
            // $(api.column(8).footer()).html('Rp. ' + new Intl.NumberFormat().format(pageTotal) + ' (Rp. ' + Intl.NumberFormat().format(total) + ' total)');
			$(api.column(8).footer()).html('Rp. ' + new Intl.NumberFormat().format(pageTotal));
        },
	});
   });
 </script>
@endpush --}}
@stop