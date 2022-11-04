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
			</div>

			<div class="card-body">
                <form method="POST" action="{{route('admin.rekap.read')}}">
				@csrf

			{{-- @if($rekap['code']=='200')
        @foreach($rekap['data'] as $data) --}}

{{-- 					<div class="form-group">
                        <label for="">BPR</label>
                        <select name="" id="" class="form-control">
                            @foreach ($clients as $item)
                                <option value="{{$item['clientid']}}">{{$item['clientname']}}</option>
                            @endforeach
                        </select>
                    </div>

					<div class="form-group">
                        <label for="">Cabang</label>
                        <select name="" id="" class="form-control">
							@foreach ($branches as $item)
								<option value="{{$item['clientid']}}">{{$item['clientname']}}</option>
							@endforeach                        
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <label for="">Tanggal Awal</label>
                        <input type="date" name="sdate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Akhir</label>
                        <input type="date" name="edate" class="form-control">
                    </div>
		{{-- @endforeach
				@endif --}}
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm"><i class="nav-icon fa fa-search"> Filter Transaksi</i></button>
						{{-- <a href="{{route('admin.rekap.filterRekap')}}" class="btn btn-success btn-sm"><i class="nav-icon fa fa-search"> Filter Transaksi</i></a> --}}
						{{-- <a href="{{route('admin.rekap.PrintRekap')}}" class="btn btn-success btn-sm"><i class="nav-icon fa fa-print"> Print</i></a> --}}
                    </div>
				</form>
			</div>
		</div>
	</div>

	@if($rekap['code']=='200')
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				{{-- <a href="{{route('admin.rekap.addView')}}" class="btn btn-primary btn-sm">Filter Transaksi</a>
				<a href="{{route('admin.rekap.addView')}}" class="btn btn-primary btn-sm">Cetak</a> --}}
			</div>

			<div class="card-body table-responsive">
				<table id="dataTable1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<td colspan="8">
							<p class="h4 text-center">Tanggal : {{ \Carbon\Carbon::parse(Request::input('sdate'))->format('d/m/Y') }} s/d {{ \Carbon\Carbon::parse(Request::input('edate'))->format('d/m/Y') }}</p>
						</td>
					</tr>
				<tr>
				  <th>No</th>
				  <th>Petugas</th>
				  <th>Setoran</th>
				  <th></th>
				  {{-- <th colspan="2">Penarikan</th>
                  <th colspan="2">Angsuran</th> --}}
				</tr>
				</thead>
				<tbody>
					{{-- @if($rekap['code']=='200') --}}
					@foreach($rekap['data'] as $data)
					<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{ $data['name'] }}</td>
						<td>{{ $data['nosetor'] }}</td>
						<td>{{ number_format($data['asetor'],0) }}</td>
						{{-- <td>{{ $data['notarik'] }}</td>
						<td>{{ $data['atarik'] }}</td>
						<td>{{ $data['noangsuran'] }}</td>
						<td>{{ $data['aangsuran'] }}</td> --}}
					</tr>
					@endforeach
					{{-- @endif --}}
					<tfoot>
						<tr>
							<th colspan="3">Total : </th>
							<th></th>
						</tr>
					</tfoot>

				</tbody>
				</table>
			</div>
		</div>
	</div>
	@endif
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
                .column(3)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Total over this page
            pageTotal = api
                .column(3, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Update footer
            $(api.column(3).footer()).html('Rp.' + pageTotal + ' ( Rp.' + total + ' total)');
        },
	});
   });
 </script>
{{-- <script>
  $(function () {
    // $("#dataTable1").DataTable();
    $('#dataTable1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
 --}}@endpush