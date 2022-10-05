@extends('layouts.backend.app',[
	'title' => 'Tambah Users',
	'contentTitle' => 'Tambah Users',
])
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
				<a href="{{ route('admin.users') }}" class="btn btn-success btn-sm">Kembali</a>
			</div>

			<div class="card-body">
				<form method="POST" action="{{route('admin.users.update.store')}}">
					@csrf
                    
					<div class="form-group">
						<label for="name">Level</label>
						<select name="levels" id="" class="form-control">
                            @foreach ($levels as $item)
                                <option value="{{$item['levelid']}}" {{ $item['levelid'] == $data[0]['level'] ? "selected" : "" }}>{{$item['levelname']}}</option>
                            @endforeach
                        </select>
					</div>

					<div class="form-group">
						<label for="name">Cluster</label>
						<select name="cluster" id="" class="form-control">
                            @foreach ($clusters as $item)
                                <option value="{{$item['clusterid']}}" {{ $item['clusterid'] == $data[0]['cluster'] ? "selected" : "" }}>{{$item['clustername']}}</option>
                            @endforeach
                        </select>
					</div>

					<div class="form-group">
						<label for="name">Client</label>
						<select name="client" id="" class="form-control">
                            @foreach ($clients as $item)
                                <option value="{{$item['clientid']}}" {{ $item['clientid'] == $data[0]['client'] ? "selected" : "" }}>{{$item['clientname']}}</option>
                            @endforeach
                        </select>
					</div>

                    <div class="form-group">
						<label for="name">Cabang</label>
						<select name="cabang" id="" class="form-control">
                            @foreach ($branches as $item)
                                <option value="{{$item['clientid']}}" {{ $item['clientid'] == $data[0]['cabang'] ? "selected" : "" }}>{{$item['clientname']}}</option>
                            @endforeach
                        </select>
					</div>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" value="{{$data[0]['userid']}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{$data[0]['email']}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" value="{{$data[0]['passwd']}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input type="text" name="nama_user" value="{{$data[0]['name']}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">View Laporan</label>
                        <select name="view_report" id="" class="form-control">
                            <option value="{{$data[0]['viewreport'] ? '1' : '0'}}">{{$data[0]['viewreport'] ? 'Ya' : 'Tidak'}}</option>
                            <option value="">====================</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">View Transaksi</label>
                        <select name="view_trx" id="" class="form-control">
                            <option value="{{$data[0]['viewtrans'] ? '1' : '0'}}">{{$data[0]['viewtrans'] ? 'Ya' : 'Tidak'}}</option>
                            <option value="">====================</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Melakukan Transaksi</label>
                        <ul>
                            <li>
                                <label for="">Setoran</label>
                                <input type="checkbox" name="setoran" id="" {{ $data[0]['transsetoran'] ? "checked" : "" }}>
                            </li>
                            <li>
                                <label for="">Penarikan</label>
                                <input type="checkbox" name="penarikan" id="" {{ $data[0]['transpenarikan'] ? "checked" : "" }}>
                            </li>
                            <li>
                                <label for="">Angsuran Kredit</label>
                                <input type="checkbox" name="angsuran_kredit" id="" {{ $data[0]['transanggsuran'] ? "checked" : "" }}>
                            </li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="">Otorisasi</label>
                        <select name="otorisasi" id="" class="form-control">
                            <option value="{{$data[0]['viewotorisasi'] ? '1' : '0'}}">{{$data[0]['viewotorisasi'] ? 'Ya' : 'Tidak'}}</option>
                            <option value="">====================</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Limit Otorisasi</label>
                        <input type="number" value="{{$data[0]['limitotorisasi']}}" name="limit_otorisasi" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Previledge Tambah User</label>
                        <select name="add_user" id="" class="form-control">
                            <option value="{{$data[0]['adduser'] ? '1' : '0'}}">{{$data[0]['adduser'] ? 'Ya' : 'Tidak'}}</option>
                            <option value="">====================</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Relasi MBS Online</label>
                        <select name="relasi_mbs_online" id="" class="form-control">
                            @foreach ($relations as $item)
                                <option value="{{$item['userid']}}" {{ $item['userid'] == $data[0]['corebankid'] ? "selected" : "" }}>{{$item['username']}}</option>
                            @endforeach
                        </select>
                    </div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
