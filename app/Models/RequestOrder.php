<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestOrder extends Model
{
        protected $fillable = ['supplier_id', 'material_id', 'status_id', 'attachment', 'detail', 'created_at', 'updated_at'];

        public function status()
        {
            return $this->belongsTo(Status::class, 'status_id');
        }

        public function supplier()
        {
            return $this->belongsTo(Supplier::class, 'supplier_id');
        }

        public function material()
        {
            return $this->belongsTo(Material::class, 'material_id');
        }
}
