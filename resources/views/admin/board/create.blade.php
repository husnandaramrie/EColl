@extends('layouts.backend.app',[
	'title' => 'board',
	'contentTitle' => 'Tambah Pesan board',
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
				<a href="{{ route('admin.board') }}" class="btn btn-success btn-sm">Kembali</a>
			</div>

			<div class="card-body">
				<form method="POST" action="{{route('admin.board.storeBoard')}}">
					@csrf
                    <div class="form-group">
                        <label for="">Tipe</label>
                        <select name="reftype" id="" class="form-control">
                            <option value="0">Semua</option>
                            <option value="1">MBS Publikasi</option>
                            <option value="2">MBS Otorisasi</option>
                            <option value="3">Ecollector</option>                       
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Message</label>
                        <input type="textarea" name="content" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Expired</label>
                        <input type="date" name="expdate" class="form-control" required>
                    </div>                    

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                
                    {{-- @endif --}}
					<div class="form-group">
                        <a href="{{ route('admin.board') }}" class="btn btn-success btn-sm">Kembali</a>
						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <button type="button" class="btn btn-primary btn-sm">Reset</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
@stop
