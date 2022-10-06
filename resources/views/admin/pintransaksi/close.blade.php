@extends('layouts.backend.app',[
    'title' => 'Closing PIN Transaksi',
    'contentTitle' => 'Closing PIN Transaksi'
])

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote') }}/summernote-bs4.min.css">
@endpush

@section('content')
<div class="row">
    @if (Session::has('error'))
    <div class="col-12">
        <div class="alert alert-danger">{{Session::get('error')}}</div>
    </div>
    @endif

	<div class="col-12">
		<div class="card">

			<div class="card-header">
				<a href="{{ route('admin.pintransaksi') }}" class="btn btn-success btn-sm">Kembali</a>
			</div>

			<div class="card-body">
				<form method="POST" action="{{route('admin.pintransaksi.destroyPin')}}">
					@csrf

                    @foreach ($pintransaksi as $data)

                    <div class="form-group">
                        <label for="name">Pin Transaksi</label>
                        <input type="text" name="pinuser" value="{{$data['norek']}}"  class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Saldo Akhir</label>
                        <input type="text" name="saldoakhir" value="{{number_format($data['saldo'],0)}}"  class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Kode Open</label>
                        <input type="text" name="refno" value="{{$pinrefno['refno']}}"  class="form-control" readonly>
                    </div>

                    @endforeach

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm">Close Saldo</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
@stop