<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Radar extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];



    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function updator()
    {
        return $this->belongsTo(User::class, 'updator_id');
    }
}