<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierMaterial extends Model
{
    protected $fillable = ['supplier_id', 'material_id', 'created_at', 'updated_at'];

    protected $with = ['material:id,title'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
