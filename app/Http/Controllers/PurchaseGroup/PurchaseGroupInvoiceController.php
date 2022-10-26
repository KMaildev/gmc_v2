<?php

namespace App\Http\Controllers\PurchaseGroup;

use App\Http\Controllers\Controller;
use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use App\TemporaryPurchaseGroupItem;
use App\User;
use Illuminate\Http\Request;

class PurchaseGroupInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchase_group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sales_persons = User::all();
        $purchase_orders = PurchaseOrder::all();
        $purchase_order_id = null;
        return view('purchase_group.create', compact('sales_persons', 'purchase_orders', 'purchase_order_id'));
    }


    public function purchase_group_invoice_create($purchase_order_id = null)
    {
        $sales_persons = User::all();
        $purchase_orders = PurchaseOrder::all();
        $purchase_order_data = PurchaseOrder::findOrFail($purchase_order_id);
        $purchase_items = PurchaseItem::where('purchase_order_id', $purchase_order_id)->get();
        $purchase_order_id = $purchase_order_id;

        $session_id = session()->getId();
        $temporary_purchase_group_items = TemporaryPurchaseGroupItem::where('session_id', $session_id)->get();
        return view('purchase_group.create', compact('sales_persons', 'purchase_orders', 'purchase_order_data', 'purchase_items', 'purchase_order_id', 'temporary_purchase_group_items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
