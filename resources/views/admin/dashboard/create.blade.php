@extends('layouts.backend.app',[
	'title' => 'Dashboard',
	'contentTitle' => 'Tambah Pesan Dashboard',
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
				<a href="{{ route('admin.dashboard') }}" class="btn btn-success btn-sm">Kembali</a>
			</div>

			<div class="card-body">
				<form method="POST" action="{{route('admin.dashboard.storeDashboard')}}">
					@csrf
					@if(count($setting)>0)
					
					<div class="form-group">
                        <label for="">ID</label>
                        <input type="text" name="refid" value="{{$dashboard[0]['refid']}}" class="form-control">
                    </div>

					<div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="textarea" name="refdate" value="{{$dashboard[0]['refdate']}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Expired</label>
                        <input type="date" name="expdate" value="{{$dashboard[0]['expdate']}}" class="form-control" date(format,timestamp)>
                    </div>

                    <div class="form-group">
                        <label for="">Tipe</label>
                        <input type="textarea" name="reftype" value="{{$dashboard[0]['reftype']}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Message</label>
                        <input type="textarea" name="news" value="{{$dashboard[0]['news']}}" class="form-control">
                    </div>
					
					{{-- <div class="form-group">
						<label for="name">Status</label>
						<select name="status" id="" class="form-control">
                            @foreach ($status as $dashboard)
                                <option value="{{$dashboard['status']}}">{{$dashboard['status']}}</option>
                            @endforeach
                        </select>
					</div> --}}

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="{{$setting[0]['status'] ? '1' : '0'}}">{{$setting[0]['status'] ? 'Ya' : 'Tidak'}}</option>
                            <option value="">====================</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

					{{-- @foreach($track->photos()->get() as $photo)
					<div class="col-md-4">
						<div class="card">
							<a href="{{ Storage::url($photo->filename) }}">
								<img src="{{ Storage::url($photo->filename) }}" width="100%" class="card-img-top">
							</a>
						</div>
					</div>
					@endforeach --}}

					<div class="form-group">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-success btn-sm">Kembali</a>
						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <button type="button" class="btn btn-primary btn-sm">Reset</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
@stop
