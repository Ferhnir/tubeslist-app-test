@extends('layouts.app')

@section('content')
    <h1 class="my-md-5">Table widget</h1>
    <div class="card">
        <div class="card-body">
            <h1>{{ $tubeDetails->name }}</h1>
            <h5>Last update: {{ $lastUpdate }}</h5>
            <p>
               @if(isset($tubeDetails->lineStatuses[0]->reason))
                    {{ $tubeDetails->lineStatuses[0]->reason }}
               @else
                    There are currently no reported on the {{ $tubeDetails->name }} lane
               @endif
            </p>
            <a href="{{ route('travel.index') }}">Go back</a>
        </div>
    </div>
@endsection