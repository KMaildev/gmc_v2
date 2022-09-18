<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Imports\ShippingChassisManagementImport;
use App\Models\ArrivalInformation;
use App\Models\ArrivalItem;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ChassisManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function CreateChassisManagement($id = null)
    {
        $arrival_item = ArrivalItem::findOrFail($id);

        $purchase_order_id = $arrival_item->purchase_order_id;
        $purchase_order = PurchaseOrder::findOrFail($purchase_order_id);

        $supplier_id = $purchase_order->supplier_id;
        $supplier = Supplier::findOrFail($supplier_id);

        $arrival_information_id = $arrival_item->arrival_information_id;
        $arrival_information = ArrivalInformation::findOrFail($arrival_information_id);

        $arrival_item = ArrivalItem::findOrFail($id);

        return view('inventory.chassis_management.create', compact('purchase_order', 'supplier', 'arrival_information', 'arrival_item'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importShippingChassisManagement()
    {
        Excel::import(new ShippingChassisManagementImport, request()->file('file'));
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }
}
