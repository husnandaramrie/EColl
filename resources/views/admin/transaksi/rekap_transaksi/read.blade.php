@extends('layouts.backend.app',[
	'title' => 'Rekap Transaksi',
	'contentTitle' => 'Rekap Transaksi',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="card-body table-responsive">
        <table id="dataTable1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Petugas</th>
          <th>Setoran</th>
          <th>Penarikan</th>
          <th>Angsuran</th>
        </tr>
        </thead>
        <tbody>
{{-- 					@if($rekap['code']=='200')
            @foreach($rekap['data'] as $data)
            <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $data['refdate'] }}</td>
            <td>{{ $data['userid'] }}</td>
            <td>{{ $data['jenis'] }}</td>
            <td>
                {{-- <a href="{{route('admin.data_transaksi.destroyDataTrans', $data['refno'])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> 
            </td>
            </tr>
            @endforeach
            @endif --}}

        </tbody>
        </table>
    </div>
</div>
