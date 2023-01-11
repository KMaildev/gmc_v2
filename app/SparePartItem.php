<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SparePartItem extends Model
{
    protected $fillable = [
        'part_number', 'part_name', 'remark', 'user_id', 'created_at', 'updated_at',
    ];

    public function part_purchase_items_table()
    {
        return $this->hasMany(PartPurchaseItem::class, 'spare_part_item_id', 'id');
    }
}
