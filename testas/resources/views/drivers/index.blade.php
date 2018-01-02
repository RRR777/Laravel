@extends('layouts.app')

@section('content')
    <h1>#Drivers</h1>
     <form>
        <button onclick="location.href='{{url('radars')}}'" type="button" class="btn btn-info">{{ __('buttons.radars') }}</button>
      {{--    <button onclick="location.href='{{url('drivers')}}'" type="button">Vairuotojai</button>  --}}
        <button onclick="location.href='{{url('drivers/create')}}'" type="button" class="btn btn-info">{{ __('buttons.new_driver') }}</button><br>
    </form><br>
    <table border="1" class = "table table-hover">
        <tr>
            <td bgcolor="#CCCCCC"><b>{{__('id') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{__('Name') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{__('City') }}</b></td> 
            <td bgcolor="#CCCCCC"><b>{{__('User id') }}</b></td> 
            <td bgcolor="#CCCCCC"><b>{{__('Creator id') }}</b></td>
            <td bgcolor="#CCCCCC"><b>{{__('Updator id') }}</b></td>  
            <td bgcolor="#CCCCCC"><b></b></td>  
            <td bgcolor="#CCCCCC"><b></b></td>   
            <td bgcolor="#CCCCCC"><b></b></td>              
        </tr>        
        @foreach ($drivers as $driver)
            <tr>
                <td> {{$driver->id}} </td>
                <td> <a href = "{{url('drivers', $driver->id) }}">{{$driver->name}}</a> </td>
                <td> {{$driver->city}} </td>  
                <td> {{$driver->user_id}} </td> 
                <td> {{$driver->creator_id}} </td> 
                <td> {{$driver->updator_id}} </td> 
                <td align='center'> <a href = "{{url('drivers', $driver->id) }}">{{__('More') }}</a> </td>
                <td align='center'> <a href = "{{url('drivers', $driver->id) .'/edit' }}">{{__('Edit') }}</a> </td> 
                <td align='center'> <a href = "{{url('drivers', $driver->id) . '/delete' }}">{{__('Delete') }}</a> </td>                     
            </tr> 
        @endforeach                       
    </table>
@endsection