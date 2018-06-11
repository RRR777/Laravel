@extends('layouts.app')

@section('content')
    <h1 class="content">#New Driver</h1>
    <form method ="post" action = "{{ url('drivers') }}">
        {{ csrf_field() }}
        <input name="name" placeholder ="name">
        <input name="city" placeholder ="city">
        <button type="submit" class="btn btn-info">{{ __('buttons.save') }}</button>
    </form>
    @if (count($errors))
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert"> <p>{{ $error }}</p></div>
        @endforeach
    @endif
@endsection