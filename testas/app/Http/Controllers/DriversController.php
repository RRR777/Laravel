<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required | string ',
            'city' => 'required | string ', 
        ]);

        $driver = new Driver;
        $driver->name = $request->input('name');
        $driver->city = $request->input('city');
        $driver->user_id = Auth::user()->id;
        $driver->creator_id = Auth::user()->id;
        $driver->save();

        return redirect('/drivers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $this->validate($request, [
            'name' => 'required | string ',
            'city' => 'required | string ', 
        ]);

        $driver->name = $request->input('name');
        $driver->city = $request->input('city');
        $driver->user_id = Auth::user()->id;
        $driver->updator_id = Auth::user()->id;
        $driver->save();

        return redirect('/drivers');
    }

    public function delete(Driver $driver)
    {
        return view('drivers.destroy', compact('driver'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect('/drivers');
    }
}
