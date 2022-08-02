<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    public function supplier_table()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function users_table()
    {
        return $this->belongsTo(User::class, 'purchase_representative_id', 'id');
    }

    public function purchase_items_table()
    {
        return $this->hasMany(PurchaseItem::class, 'purchase_order_id', 'id');
    }
}
