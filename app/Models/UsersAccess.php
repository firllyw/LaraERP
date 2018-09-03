<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UsersAccess extends Model
{
     protected $fillable = ['users_id', 'module_id', 'created_at', 'updated_at'];

     public function users()
     {
         return $this->belongsTo(User::class, 'users_id');
     }

     public function modules()
     {
         return $this->belongsTo(Module::class, 'module_id');
     }
}
