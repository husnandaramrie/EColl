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
	<div class="col-12">
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
						<th colspan="9" class="text-center text-capitalize">Petugas {{ $user['name'] }}</th>
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
						<td class="text-capitalize">{{ $data['name'] }}</td>
						<td class="d-flex justify-content-end">{{ number_format($data['amount'],0) }}</td>
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
				@if ($data_saldo['code']=='200')
					@foreach ($data_saldo['data'] as $saldo)
						<table class="table table-borderless table-sm">
							<thead>
								<tr>
									<th>Mengetahui Petugas</th>
								</tr>
								<tr>
									<th></th>
								</tr>
								<tr>
									<th class="text-capitalize">{{ $saldo['username'] }}</th>
								</tr>
							</thead>
						</table>
					@endforeach
				@endif
	</div>
</div>
@stop