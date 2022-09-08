<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseOperationInfo;
use App\Models\Brand;
use App\Models\PurchaseItem;
use App\Models\PurchaseOperationInfo;
use App\Models\PurchaseOperationItem;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\User;
use Illuminate\Http\Request;

class OperationController extends Controller
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

    public function operation_create($id)
    {
        $purchase_order = PurchaseOrder::findOrFail($id);
        $purchase_items = PurchaseItem::where('purchase_order_id', $id)->get();
        $supplier_id = $purchase_order->supplier_id;
        $supplier = Supplier::findOrFail($supplier_id);
        $users = User::all();

        return view('purchase.operation.create', compact('supplier', 'purchase_order', 'purchase_items', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseOperationInfo $request)
    {
        $operation_info = new PurchaseOperationInfo();
        $operation_info->operation_date = $request->operation_date;
        $operation_info->particular = $request->particular;
        $operation_info->payment_operation = $request->payment_operation;
        $operation_info->remark = $request->remark;
        $operation_info->operation_status = $request->operation_status;
        $operation_info->purchase_order_id = $request->purchase_order_id;
        $operation_info->user_id = auth()->user()->id ?? 0;
        $operation_info->save();

        $operation_info_id = $operation_info->id;
        $purchase_order_id = $request->purchase_order_id;

        foreach ($request->inputFields as $key => $value) {
            if ($value['particular_qty'] != NULL || $value['particular_qty'] != 0) {
                $insert[$key]['particular_qty'] = $value['particular_qty'];
                $insert[$key]['payment_operation_amount'] = $value['payment_operation_amount'];
                $insert[$key]['exchange_rate'] = $value['exchange_rate'];
                $insert[$key]['purchase_order_id'] = $purchase_order_id;
                $insert[$key]['purchase_operation_info_id'] = $operation_info_id;
                $insert[$key]['user_id'] = auth()->user()->id ?? 0;
                $insert[$key]['purchase_item_id'] = $value['purchase_item_id'];
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }
        }

        PurchaseOperationItem::insert($insert);
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