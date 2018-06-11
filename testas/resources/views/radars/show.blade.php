@extends('layouts.app')

@section('content')
    <h1>{{ __('#Radar') }}</h1>

    <div>id: {{ $radar->id }}</div>
    <div>Date: {{ $radar->date }}</div>
    <div>Number: {{ $radar->number }}</div>
    <div>Distance: {{ $radar->distance }}</div>
    <div>Time: {{ $radar->time }}</div>
    <div>Speed: {{ $radar->distance/$radar->time*3.6 }}</div>
    <br>
    <form>
        <button onclick='location.href="{{ url('/') .'/radars' }}"'
            type="button"
            class="btn btn-info">{{ __('buttons.back') }}
        </button>
    </form>
@endsection
