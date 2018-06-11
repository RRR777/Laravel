@extends('layouts.app')

@section('content')
    <h1>#Edit Driver</h1>
    <form method ="post" action = "{{ url('drivers', $driver->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input name="name" placeholder ="name" value = "{{ $driver->name }}">
        <input name="city" placeholder ="city" value = "{{ $driver->city }}">
        <button type="submit" class="btn btn-info">{{ __('buttons.update') }}</button>
    </form>
    @if (count($errors))
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert"> <p>{{ $error }}</p></div>
        @endforeach
    @endif
@endsection
