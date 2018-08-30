<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['title', 'created_at', 'updated_at'];

    public function supplierMaterial()
    {
        return $this->hasMany(SupplierMaterial::class, 'material_id');
    }

    public function requestOrder()
    {
        return $this->hasMany(RequestOrder::class, 'material_id');
    }
}
