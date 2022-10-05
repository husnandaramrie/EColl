@extends('layouts.backend.app',[
	'title' => 'Dashboard',
	'contentTitle' => 'Dashboard',
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
				<form method="POST" action="{{route('admin.dashboard.updateDashboard.store')}}">
					@csrf
                    
					<div class="form-group">
						<label for="name">Dashboard Tipe</label>
						<select name="refType" id="" class="form-control">
                            @foreach ($levels as $dashboard)
                                <option value="{{$dashboard['refType']}}">{{$dashboard['refType']}}</option>
                            @endforeach
                        </select>
					</div>

                    <div class="form-group">
                        <label for="">refID</label>
                        <input type="textarea" name="refID" value="{{$dashboard[0]['refID']}}" class="form-control">
                    </div>
                    
					<div class="form-group">
                        <label for="">refDate</label>
                        <input type="textarea" name="refDate" value="{{$dashboard[0]['refDate']}}" class="form-control">
                    </div>

					<div class="form-group">
                        <label for="">refType</label>
                        <input type="textarea" name="refType" value="{{$dashboard[0]['refType']}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Expired</label>
                        <input type="textbox" name="expdate" value="{{$dashboard[0]['expdate']}}" class="form-control">
                    </div>

					<div class="form-group">
                        <label for="">content</label>
                        <input type="textarea" name="content" value="{{$dashboard[0]['content']}}" class="form-control">
                    </div>
					
                    <div class="form-group">
                        <label for="">Status</label>
                        <input type="textbox" name="status" value="{{$dashboard[0]['status']}}" class="form-control">
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
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-success btn-sm">Kembali</a>
						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
						<button type="submit" class="btn btn-primary btn-sm">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
