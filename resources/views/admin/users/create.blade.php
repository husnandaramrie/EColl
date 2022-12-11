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
				<form method="POST" action="{{route('admin.users.store')}}">
					@csrf

					<div class="form-group">
						<label for="name">Level</label>
						<select name="levels" id="" class="form-control">
                            @foreach ($levels as $item)
                                <option value="{{$item['levelid']}}">{{$item['levelname']}}</option>
                            @endforeach
                        </select>
					</div>

					<div class="form-group">
						<label for="name">Cluster</label>
						<select name="cluster" id="" class="form-control">
                            @foreach ($clusters as $item)
                                <option value="{{$item['clusterid']}}">{{$item['clustername']}}</option>
                            @endforeach
                        </select>
					</div>

					<div class="form-group">
						<label for="name">Client</label>
						<select name="client" id="client" class="form-control" required>
                            <option value="">== Pilih Client ==</option>
                            @foreach ($clients as $item)
                                <option data-id= "{{$item['clientid']}}" value="{{$item['clientid']}}">{{$item['clientname']}}</option>
                            @endforeach
                        </select> 
					</div>

                    <div class="form-group">
						<label for="name">Cabang</label>
						<select name="cabang" id="cabang" class="form-control" required>
                            <option value="">== Pilih Cabang ==</option>
                            @foreach ($branches as $item)
                                <option value="{{$item['clientid']}}">{{$item['clientname']}}</option>
                            @endforeach                          
                        </select>
					</div>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" id="" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" id="" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input type="text" name="nama_user" id="" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">View Laporan</label>
                        <select name="view_report" id="" class="form-control">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">View Transaksi</label>
                        <select name="view_trx" id="" class="form-control">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Melakukan Transaksi</label>
                        <ul>
                            <li>
                                <label for="">Setoran</label>
                                <input type="checkbox" name="setoran" id="">
                            </li>
                            <li>
                                <label for="">Penarikan</label>
                                <input type="checkbox" name="penarikan" id="">
                            </li>
                            <li>
                                <label for="">Angsuran Kredit</label>
                                <input type="checkbox" name="angsuran_kredit" id="">
                            </li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="">Otorisasi</label>
                        <select name="otorisasi" id="" class="form-control">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Limit Otorisasi</label>
                        <input type="number" name="limit_otorisasi" id="" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Previledge Tambah User</label>
                        <select name="add_user" id="" class="form-control">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Relasi MBS Online</label>
                        <select name="relasi_mbs_online" id="" class="form-control" required>
                            <option value="">Pilih User</option>
                            @foreach ($relations as $item)
                                <option value="{{$item['userid']}}">{{$item['username']}}</option>
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
{{-- <script>
    var url = "https://cors-anywhere.herokuapp.com/http://117.53.45.236:8002/api/User/Divisi"
    const cbbCabang = document.getElementById("cabang")
    const cbbClient = document.getElementById("client")

    client.addEventListener("change", async () => {
        cbbCabang.innerHTML = ''
        const res = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type" : "application/json",
                "Authorization" : "Bearer {{ Session::get('token') }}"
            }, 
            body: JSON.stringify({divisiid: cbbClient.value})})
        const json = await res.json()
        // console.log(json);
        if (json.code == 200) {
            json.data.map((val) => {
            const newEl = document.createElement("option");
            cbbCabang.appendChild(newEl)
            newEl.setAttribute("value", val.clientid)
            newEl.innerHTML = val.clientname
           })
        } else {
            const newEl = document.createElement("option");
            cbbCabang.appendChild(newEl)
            newEl.innerHTML = "Tidak Ada Cabang"
        }
        
    })
</script>
 --}}@stop

