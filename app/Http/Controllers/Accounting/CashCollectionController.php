<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCashCollection;
use App\Http\Requests\UpdateCashCollection;
use App\Models\CashCollection;
use App\Models\SalesInvoices;
use App\Models\SalesJournal;
use Illuminate\Http\Request;

class CashCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // For Form
        $form_status = 'is_create';
        $form_sales_invoices = SalesInvoices::all();

        // For List 
        $cash_collections = CashCollection::all();
        return view('accounting.cash_collection.index', compact('form_status', 'form_sales_invoices', 'cash_collections'));
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
    public function store(StoreCashCollection $request)
    {
        $cash_collection = new CashCollection();
        $cash_collection->cash_collection_date = $request->cash_collection_date;
        $cash_collection->customer_id = $request->customer_id;
        $cash_collection->sales_invoice_id = $request->sales_invoice_id;
        $cash_collection->sales_journal_id = $request->sales_journal_id;
        $cash_collection->cash_debited = $request->cash_debited;
        $cash_collection->sale_discount_debited = $request->sale_discount_debited;
        $cash_collection->credited = $request->credited;
        $cash_collection->user_id = auth()->user()->id ?? 0;
        $cash_collection->save();
        return redirect()->back()->with('success', 'Process is completed.');
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
        // For Form
        $form_status = 'is_edit';
        $form_sales_invoices = SalesInvoices::all();

        // For Edit Data 
        $cash_collections_data = CashCollection::findOrFail($id);

        // For List 
        $cash_collections = CashCollection::all();
        return view('accounting.cash_collection.index', compact('form_status', 'form_sales_invoices', 'cash_collections', 'cash_collections_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashCollection $request, $id)
    {
        $cash_collection = CashCollection::findOrFail($id);
        $cash_collection->cash_collection_date = $request->cash_collection_date;
        $cash_collection->customer_id = $request->customer_id;
        $cash_collection->sales_invoice_id = $request->sales_invoice_id;
        $cash_collection->sales_journal_id = $request->sales_journal_id;
        $cash_collection->cash_debited = $request->cash_debited;
        $cash_collection->sale_discount_debited = $request->sale_discount_debited;
        $cash_collection->credited = $request->credited;
        $cash_collection->user_id = auth()->user()->id ?? 0;
        $cash_collection->update();
        return redirect()->route('cash_collection.index')->with('success', 'Process is completed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = CashCollection::findOrFail($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Process is completed.');
    }
}
