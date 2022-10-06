@extends('layouts.backend.app',[
	'title' => 'Setting',
	'contentTitle' => 'Setting',
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

        {{-- <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> --}}
        
	<div class="col-12">
		<div class="card">
			<div class="card-header">
			</div>

			<div class="card-body">
				<form method="POST" action="{{route('admin.setting.addViewSetting')}}">
				@csrf

                @if($setting['code']=='200')
                    @foreach($setting['data'] as $data)
                
                    <div class="form-group">
                        <label for="">ID</label>
                        <input type="text" name="id" value="{{$data['id']}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Iklan Promo</label>
                        <input type="text" name="promo" value="{{$data['promo']}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Call Center</label>
                        <input type="text" name="callcenter" value="{{$data['callcenter']}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Limit Nominal Penarikan</label>
                        <input type="number" name="limittarik" value="{{number_format($data['limittarik'],0)}}" placeholderid="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Limit Nominal Setoran</label>
                        <input type="number" name="limitsetor" value="{{$data['limitsetor']}}" placeholderid="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">SMS Center</label>
                        <input type="text" name="smscenter" value="{{$data['smscenter']}}" placeholderid="" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="">Pin Penarikan Aktif</label>
                        <select name="pintarik" id="" class="form-control">
                            <option value="{{$data['pintarik'] ? '1' : '0'}}">{{$data['pintarik'] ? 'Ya' : 'Tidak'}}</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                    
					@endforeach
				@endif
					<div class="form-group">
                        <a href="{{ route('admin.setting') }}" class="btn btn-success btn-sm">Kembali</a>
						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
						<button type="reset" name="reset" value="Reset" class="btn btn-primary btn-sm">Reset</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop


