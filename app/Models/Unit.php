<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['title'];

    public function material()
    {
        return $this->hasMany(Unit::class, 'unit_id');
    }
}
