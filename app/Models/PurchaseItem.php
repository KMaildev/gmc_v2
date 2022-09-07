<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    public function products_table()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    public function brands_table()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function type_of_models_table()
    {
        return $this->belongsTo(TypeOfModel::class, 'type_of_model_id', 'id');
    }
}
