<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['module_id', 'title', 'created_at', 'updated_at'];

    public function modules(){
        return $this->belongsTo(Module::class, 'module_id');
    }
}
