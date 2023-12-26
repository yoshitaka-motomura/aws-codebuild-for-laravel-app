@extends('layouts.app')
@section('title', 'Demo')
@section('content')
    <div>
        <h1>Demo</h1>
        <p><a href="{{ route('demo') }}">{{ route('demo') }}</a></p>
        <p>{{ $now->toDateTimeString() }}</p>
    </div>
@endsection
