<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['module_id', 'title', 'created_at', 'updated_at'];

    public function modules()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function supplier()
    {
        return $this->hasMany(Supplier::class, 'status_id');
    }

    public function request()
    {
        return $this->hasMany(RequestOrder::class, 'status_id');
    }
}
