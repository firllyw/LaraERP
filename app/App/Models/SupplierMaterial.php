<?php

namespace App\App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierMaterial extends Model
{
    protected $fillable = ['supplier_id', 'material_name', 'material_id', 'created_at', 'updated_at'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
