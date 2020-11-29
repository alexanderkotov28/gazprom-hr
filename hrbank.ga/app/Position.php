<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $guarded = [];

    protected $appends = ['created', 'route'];

    public function getCreatedAttribute()
    {
        $date = Carbon::parse($this->created_at);
        return $date->format('d F Y');
    }

    public function getRouteAttribute()
    {
        return route('admin.positions.edit', $this->id);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }
}
