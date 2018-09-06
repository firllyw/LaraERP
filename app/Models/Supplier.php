<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['title', 'detail', 'address', 'phone', 'representative', 'representative_position', 'status_id', 'documents', 'country_id', 'province_id', 'city_id', 'created_at', 'updated_at'];

    public function supplierMaterial()
    {
        return $this->hasMany(SupplierMaterial::class, 'supplier_id');
    }

    public function requestOrder()
    {
        return $this->hasMany(RequestOrder::class, 'supplier_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
