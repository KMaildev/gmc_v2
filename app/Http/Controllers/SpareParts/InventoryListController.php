<?php

namespace App\Http\Controllers\SpareParts;

use App\Http\Controllers\Controller;
use App\SparePartItem;
use Illuminate\Http\Request;

class InventoryListController extends Controller
{
    public function index(Request $request)
    {
        $invoice_date = '2022-01-01';
        $invoice_end_date = '2022-01-31';

        $spare_part_items = SparePartItem::with('part_purchase_items_table')->get();
        return view('spare_parts.inventory_list.index', compact('spare_part_items'));
    }
}
