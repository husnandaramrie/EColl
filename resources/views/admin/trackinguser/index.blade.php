<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
<div class="container">
    <h1>Laracoll</h1>
    <div class="card">
        <div class="card-body">
{{--             @if($currentUserInfo)
                <h4>IP: {{ $currentUserInfo->ip }}</h4>
                <h4>Country Name: {{ $currentUserInfo->countryName }}</h4>
                <h4>Country Code: {{ $currentUserInfo->countryCode }}</h4>
                <h4>Region Code: {{ $currentUserInfo->regionCode }}</h4>
                <h4>Region Name: {{ $currentUserInfo->regionName }}</h4>
                <h4>City Name: {{ $currentUserInfo->cityName }}</h4>
                <h4>Zip Code: {{ $currentUserInfo->zipCode }}</h4>
                <h4>Latitude: {{ $currentUserInfo->latitude }}</h4>
                <h4>Longitude: {{ $currentUserInfo->longitude }}</h4>
            @endif
 --}}        </div>
    </div>
</div>
  
</body>
</html>

{{-- @extends('layouts.app')

@section('title', 'Tracks')

@section('head')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row pb-2">
            <a href="{{ route('tracking-user.create') }}" class="btn btn-info btn-lg btn-block">Create</a>
        </div>
        <div class="row">
            {{ $tracks->links() }}
            <table class="table table-bordered table-responsive-lg table-striped">
                <thead>
                <tr>
                    <th>Last update</th>
                    <th>code</th>
                    <th>from</th>
                    <th>to</th>
                    <th>delivered</th>
                    <th>status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tracks as $track)
                    <tr>
                        <td>
                            @if($track->is_update_expired)
                                <b class="text-danger">{{ $track->updated_at->diffForHumans() }}</b>
                            @else
                                {{ $track->updated_at->diffForHumans() }}
                            @endif
                        </td>
                        <td>{{ $track->code }}</td>
                        <td>{{ $track->from }}</td>
                        <td>{{ $track->to }}</td>
                        <td>{{ $track->delivered }}</td>
                        <td>
                            @switch($track->status)
                                @case(0)
                                0
                                @break
                                @case(1)
                                1
                                @break
                                @case(2)
                                2
                                @break
                                @case(3)
                                3
                                @break
                                @case(4)
                                4
                                @break
                            @endswitch
                        </td>
                        <td>
                            <div class='btn-group'>
                                <a href="{{route('tracking-user.edit',$track->id)}}" class='btn btn-secondary btn-sm'>
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                <a href="" class='btn btn-danger btn-sm'
                                   onclick="event.preventDefault(); document.getElementById('destroy_form{{$loop->iteration}}').submit();">
                                    <i class="material-icons">delete</i>
                                </a>
                                <form action="{{route('tracking-user.destroy',$track->id)}}" method="post"
                                      id='destroy_form{{$loop->iteration}}'>
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $tracks->links() }}
        </div>
    </div>
@endsection --}}