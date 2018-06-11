@extends('layouts.app')

@section('content')
    <h1>{{ __('#Radars') }}</h1>
    <form>
       {{--   <button onclick="location.href='{{url('radars')}}'" type="button">Automobiliai</button>  --}}
        <button onclick="location.href='{{ url('drivers') }}'"
            type="button"
            class="btn btn-info">{{ __('buttons.drivers') }}
        </button>
        <button onclick="location.href='{{ url('radars/create') }}'"
            type="button"
            class="btn btn-info">{{ __('buttons.new_radar') }}
        </button>
        <br>
    </form>
    <br>

    <table border="1" class = "table table-hover table-sm ">
        <tr>
            <td bgcolor="#CCCCCC"><b>{{ __('id') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{ __('Date') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{ __('Number') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{ __('Speed') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{ __('driver_id') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{ __('Name') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{ __('City') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{ __('User id') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{ __('Creator id') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{ __('Updator id') }}</b></td>
            <td bgcolor="#CCCCCC"><b></b></td>
            <td bgcolor="#CCCCCC"><b></b></td>
            <td bgcolor="#CCCCCC"><b></b></td>
        </tr>
        @foreach ($radars as $radar)
            <tr>
                <td> {{ $radar->id }} </td>
                <td> {{ $radar->dat }} </td>
                <td><a href = "{{ url('radars', $radar->id) }}">{{ $radar->number }}</a></td>
                <td align='center'>{{ round($radar->distance/$radar->time*3.6, 2) }}</td>
                <td align='center'>{{ $radar->driver_id }}</td>
                <td align='center'>{{ $radar->driver ? $radar->driver->name :'' }}</td>
                <td align='center'>{{ $radar->driver ? $radar->driver->city :'' }}</td>
                <td align='center'>{{ $radar->user_id }}</td>
                <td align='center'>{{ $radar->creator_id }}</td>
                <td align='center'>{{ $radar->updator_id }}</td>
                <td align='center'><a href = "{{ url('radars', $radar->id)}}">{{ __('More') }}</a></td>
                <td align='center'><a href = "{{ url('radars', $radar->id) . '/edit'}}">{{ __('Edit') }}</a></td>
                <td align='center'><a href = "{{ url('radars', $radar->id) .'/delete' }}">{{ __('Delete') }}</a></td>
            </tr>
        @endforeach
    </table>
    {{ $radars->links() }}
@endsection
