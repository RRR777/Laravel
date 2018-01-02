<?php

namespace App\Repositories;
use App\Radar;

class RadarRepository
{

    public function list($page)
    {
         $radars = Radar::orderBy('date', 'desc')->paginate($page);
         return $radars;
    }
/*     public function get($id)
    {
        return Radar::find($id);
    } */

    public function save($request)
    {
        $radar = new Radar;
        $radar->date = $request->input('date');
        $radar->number = $request->input('number');
        $radar->distance = $request->input('distance');
        $radar->time = $request->input('time');
        $radar->user_id = Auth::user()->id;
        $radar->creator_id = Auth::user()->id;
        $radar->save();
    }

    public function update($request, Radar $radar)
    {
        $radar->date = $request->input('date');
        $radar->number = $request->input('number');
        $radar->distance = $request->input('distance');
        $radar->time = $request->input('time');
        $radar->user_id = Auth::user()->id;
        $radar->updator_id = Auth::user()->id;        
        $radar->save();
    }

    public function delete(Radar $radar)
    {
        $radar->delete();
    }
}