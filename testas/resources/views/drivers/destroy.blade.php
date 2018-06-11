@extends('layouts.app')

@section('content')
    <h1> #Delete Driver</h1>
    <form method ="post" action = "{{ url('drivers', $driver->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div> id: {{ $driver->id }} </div>
        <div> Name: {{ $driver->name }} </div>
        <div> City: {{ $driver->city }} </div>
        <br>
        <form>
            <button type="submit" class="btn btn-info">{{ __('buttons.delete') }}</button>
        </form>
@endsection