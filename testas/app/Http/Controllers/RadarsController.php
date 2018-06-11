<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Radar;
use App\Repositories\RadarRepository;
use Illuminate\Support\Facades\Auth;

class RadarsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $radarRepository;

    public function __construct(RadarRepository $radarRepository)
    {
        $this->middleware('auth');
        $this->radarRepository = $radarRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radars = $this->radarRepository->list(10);
        return view('radars.index', compact('radars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radars.create');
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
            'date' => 'required | date',
            'number' => 'required | string | max:6 |',
            'distance' => 'required | numeric',
            'time' => 'required | numeric'
        ]);

        $radar = new Radar;
        $radar->date = $request->input('date');
        $radar->number = $request->input('number');
        $radar->distance = $request->input('distance');
        $radar->time = $request->input('time');
        $radar->user_id = Auth::user()->id;
        $radar->creator_id = Auth::user()->id;
        $radar->save();

        return redirect('/radars');
    }

    /**
     * Display the specified resource.
     *
     * @param  Radar   $radar
     * @return \Illuminate\Http\Response
     */
    public function show(Radar $radar)
    {
        return view('radars.show', compact('radar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Radar   $radar
     * @return \Illuminate\Http\Response
     */
    public function edit(Radar $radar)
    {
        return view('radars.edit', compact('radar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Radar   $radar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Radar $radar)
    {
        $this->validate($request, [
            'date' => 'required | date',
            'number' => 'required | string | max:6 |',
            'distance' => 'required | numeric',
            'time' => 'required | numeric',
        ]);

        $radar->date = $request->input('date');
        $radar->number = $request->input('number');
        $radar->distance = $request->input('distance');
        $radar->time = $request->input('time');
        $radar->user_id = Auth::user()->id;
        $radar->updator_id = Auth::user()->id;
        $radar->save();

        return redirect('/radars');
    }

    public function delete(Radar $radar)
    {
        return view('radars.destroy', compact('radar'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Radar   $radar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Radar $radar)
    {
        $this->radarRepository->delete($radar);

        return redirect('/radars');
    }
}
