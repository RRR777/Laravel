@extends('layouts.app')

@section('content')
    <h1 class="content">#About Driver</h1>

    <div> id: {{ $driver->id }}</div>
    <div> Name: {{ $driver->name }}</div>
    <div> City: {{ $driver->city }}</div>
    <br>
    <form>
        <button onclick="location.href='{{ url('/') . '/drivers' }}'" type="button" class="btn btn-info">{{ __('buttons.back') }}</button>
    </form>
@endsection
