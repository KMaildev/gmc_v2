<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\ArrivalInformation;
use App\Models\ArrivalItem;
use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\User;
use Illuminate\Http\Request;

class ArrivalManagementController extends Controller
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

    public function arrival_management_create($id)
    {
        $purchase_order = PurchaseOrder::findOrFail($id);
        $purchase_items = PurchaseItem::where('purchase_order_id', $id)->get();
        $supplier_id = $purchase_order->supplier_id;
        $supplier = Supplier::findOrFail($supplier_id);
        $users = User::all();

        return view('purchase.arrival_management.create', compact('supplier', 'purchase_order', 'purchase_items', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arrival_info = new ArrivalInformation();
        $arrival_info->arrival_date = $request->arrival_date;
        $arrival_info->remark = $request->remark;
        $arrival_info->arrival_status = $request->arrival_status;
        $arrival_info->purchase_order_id = $request->purchase_order_id;
        $arrival_info->user_id = $request->user_id;
        $arrival_info->save();

        $arrival_information_id = $arrival_info->id;
        $purchase_order_id = $request->purchase_order_id;
        $arrival_date = $request->arrival_date;

        foreach ($request->inputFields as $key => $value) {
            if ($value['shipping_qty'] != NULL || $value['shipping_qty'] != 0) {
                $insert[$key]['shipping_qty'] = $value['shipping_qty'];
                $insert[$key]['arrival_date'] = $arrival_date;
                $insert[$key]['purchase_item_id'] = $value['purchase_item_id'];
                $insert[$key]['purchase_order_id'] = $purchase_order_id;
                $insert[$key]['arrival_information_id'] = $arrival_information_id;
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }
        }
        ArrivalItem::insert($insert);
        return redirect()->back()->with('success', 'Your processing has been completed.');
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
