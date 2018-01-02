@extends('layouts.app')

@section('content')
    <h1> {{ __('#Edit Radar') }}</h1>
    <form method ="post" action = "{{url('radars', $radar->id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input name="date" placeholder ="date" value= "{{$radar->date}}">
        <input name="number" placeholder ="number" value="{{$radar->number}}">
        <input name="distance" placeholder ="distance" value="{{$radar->distance}}">
        <input name="time" placeholder ="time" value="{{$radar->time}}">
        <button type="submit" class="btn btn-info">{{ __('buttons.update') }}</button>
    </form>
    @if (count($errors))
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert"> <p>{{ $error }}</p></div>
        @endforeach
    @endif
@endsection