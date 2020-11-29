<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $guarded = [];

    protected $appends = ['title', 'created'];

    public function getTitleAttribute()
    {
        return $this->position->title;
    }

    public function getCreatedAttribute()
    {
        $date = Carbon::parse($this->created_at);
        return 'Создана: '.$date->format('d F Y');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function position()
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }
}
