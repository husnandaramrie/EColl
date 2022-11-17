@extends('layouts.backend.app',[
	'title' => 'board',
	'contentTitle' => 'Edit Pesan board',
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
			</div>
          
			<div class="card-body">
                
				<form method="POST" action="{{route('admin.board.updateViewBoard.store')}}">
					@csrf
                    {{-- @dd($data); --}}
                    <div class="form-group">
                        <label for="">ID</label>
                        <input type="textarea" name="refid" value="{{$data[0]['refid']}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tipe</label>
                        <select name="reftype" id="" class="form-control">
                            {{-- <option value="">{{$data[0]['reftype']}}</option>
                            <option value="">=========================</option> --}}
                            <option value="0" {{ $data[0]['reftype'] == 'Semua' ? "selected" : ""}}>Semua</option>
                            <option value="1" {{ $data[0]['reftype'] == 'MBS Publikasi' ? "selected" : ""}}>MBS Publikasi</option>
                            <option value="2" {{ $data[0]['reftype'] == 'MBS Otorisasi' ? "selected" : ""}}>MBS Otorisasi</option>
                            <option value="3" {{ $data[0]['reftype'] == 'Ecollector' ? "selected" : ""}}>Ecollector</option>                       
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Message</label>
                        <input type="textarea" name="news" value="{{$data[0]['news']}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" name="refdate" value="{{ \Carbon\Carbon::parse($data[0]['refdate'])->format('Y-m-d')}}"  class="form-control" required>
                        {{-- <input type="date" name="refdate" value="{{ date("Y-m-d") }}" class="form-control"> --}}
                    </div>                    

                    <div class="form-group">
                        <label for="">Expired</label>
                        <input type="date" name="expdate" value="{{ \Carbon\Carbon::parse($data[0]['expdate'])->format('Y-m-d')}}"  class="form-control">
                    </div>                    

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                             <option value="1"{{ $data[0]['status'] == 'Aktif' ? "selected" : ""}}>Aktif</option>
                            <option value="0"{{ $data[0]['status'] == 'Non Aktif' ? "selected" : ""}}>Non Aktif</option>
                        </select>
                    </div>

					<div class="form-group">
                        <a href="{{ route('admin.board') }}" class="btn btn-success btn-sm">Kembali</a>
						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
						<button type="reset" class="btn btn-primary btn-sm">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
