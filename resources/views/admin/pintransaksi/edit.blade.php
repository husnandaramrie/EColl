@extends('layouts.backend.app',[
	'title' => 'Edit Pin Transaksi',
	'contentTitle' => 'Edit Pin Transaksi',
])
{{-- <script>
	function resetForm() {
		document.getElementById("myForm").reset();
	}
</script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $(".reset-btn").click(function(){
        $("#myForm").trigger("reset");
    });
});
</script>
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
			</div>

			<div class="card-body">
				<form method="POST" action="{{route('admin.pintransaksi.editPin.store')}}">
					@csrf
					{{-- @if(count($data)>0) --}}
				
					@foreach($pintransaksi as $data)

					{{-- @dd($data)  --}}
                    <div class="form-group">
                        <label for="">User ID </label>
                        <input type="text" name="userid" value="{{$data['userid']}}" class="form-control" readonly>
                    </div>

					<div class="form-group">
						<label for="">PIN</label>
						<input type="text" name="pin" value="{{$data['pin']}}" class="form-control" readonly>
					</div>					

                    <div class="form-group">
                        <label for="">Limit Transaksi</label>
                        <input type="text" name="userlimit" value="{{number_format($data['userlimit'],0)}}" class="form-control">
                    </div>

					
                    <div class="form-group">
						<label for="">Maximal Waktu Transaksi</label>
                        <input type="datetime-local" name="maxtime" value="{{$data['maxtime']}}" class="form-control">
                    </div>
					
{{-- 					<div class="form-group">
						<label for="">Saldo Awal</label>
						<input type="text" name="saldoawal" value="{{$data['saldoawal']}}" class="form-control">
					</div>
 --}}
					<div class="form-group">
						<label for="">Kode Open</label>
						<input type="text" name="refno" value="{{$data['refno']}}" class="form-control" readonly>
					</div>

			@endforeach
			{{-- @endif --}}
			<div class="form-group">
				<a href="{{ route('admin.pintransaksi') }}" class="btn btn-success btn-sm">Kembali</a>
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				<form action="{{route('admin.pintransaksi.editPin.view', $data['refno'])}}" method="post" id="myForm">
				{{-- <button type="button" class="btn btn-primary btn-sm">Reset</button> --}}
					<button type="button" class="btn btn-primary btn-sm" onclick="resetForm();">Reset</button>
				</form>
				{{-- <button onclick="document.getElementById('selectform').reset(); document.getElementById('from').value = null; return false;">Reset</button> --}}
			</div>
		</form>
	</div>
</div>
</div>
</div>
@stop
