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
				<form method="POST" action="{{route('admin.pintransaksi.storePin')}}">
					@csrf

					{{-- <div class="form-group">
						<label for="name">User</label>
						<select name="userid" id="" class="form-control">
                            @foreach ($userid as $item)
                                <option value="{{$item['userid']}}">{{$item['userid']}}</option>
                            @endforeach
                        </select>
					</div> --}}

                    {{-- <div class="form-group">
                        <label for="name">User</label>
                        <input type="combobox" name="userid" class="form-control">
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control">
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="name">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" date(format,timestamp)>
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="name">Pin Kode</label>
                        <input type="number" name="pin" class="form-control">
                    </div> --}}

                    @foreach ($pintransaksi as $data)

                    <div class="form-group">
                        <label for="name">Limit Transaksi</label>
                        <input type="text" name="pinuser" value="{{$data['norek']}}"  class="form-control">
                    </div>

                    {{-- <div class="form-group">
                        <label for="name">Maximal Waktu Transaksi</label>
                        <input type="datetime-local" name="maxtime" class="form-control" date(format,timestamp)>
                    </div> --}}

                    <div class="form-group">
                        <label for="name">Saldo Awal / Buka Kas</label>
                        <input type="text" name="saldoakhir" value="{{$data['saldo']}}"  class="form-control">
                    </div>

                    @endforeach

                    {{-- <div class="form-group">
                        <label for="name">Saldo Akhir / Buka Kas</label>
                        <input type="text" name="saldoakhir" class="form-control">
                    </div> --}}

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
@stop