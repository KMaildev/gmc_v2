<?php

namespace App\Http\Controllers\SpareParts;

use App\Http\Controllers\Controller;
use App\SparePartItem;
use Illuminate\Http\Request;

class InventoryListController extends Controller
{
    public function index(Request $request)
    {
        $invoice_date_start = '2022-01-01';
        $invoice_date_end = '2022-01-31';

        // $spare_part_items = SparePartItem::with('part_purchase_items_table', 'part_sale_items_table')->get();

        // $spare_part_items =  SparePartItem::all();

        $spare_part_items = SparePartItem::whereHas('part_sale_items_table', function ($query) {
            $query->where('invoice_date', '2022-01-01');
        })->whereHas('part_purchase_items_table', function ($query) {
            $query->where('invoice_date', '2022-01-01');
        })->get();

        return view('spare_parts.inventory_list.index', compact('spare_part_items', 'invoice_date_start'));
    }
}
