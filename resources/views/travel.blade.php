@extends('layouts.app')

@section('content')
    <h1 class="my-md-5">Table widget</h1>
    <div class="card">
        <div class="card-body">
        <p class="text-left">
            Last update: {{ $lastUpdate }}
        </p>
        <table class="table">
            @include('_include.table.header')
            @include('_include.table.body', ['tubesStatus' => $tubesStatus])
        </table>
        </div>
    </div>
@endsection