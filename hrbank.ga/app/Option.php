<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;

    public function requirement()
    {
        return $this->hasOne(Requirement::class);
    }
}
