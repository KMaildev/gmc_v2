<?php

namespace App\Http\Controllers\CashBook;

use App\Accounting\CashBook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashBookViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $cash_books = CashBook::paginate(10);

        // $from_date = '2019-06-01';
        // // Closing Clash and Bank Balance
        // $beforeFirstDays = DB::table('cash_books')
        //     ->whereDate('cash_book_date', '<', $from_date)
        //     ->get();
        // return view('cashbook_view.index', compact('cash_books', 'beforeFirstDays'));


        $cash_books =  CashBook::paginate(30);

        // Closing Clash and Bank Balance
        $from_date = '2019-06-01';
        $beforeFirstDays = DB::table('cash_books')
            ->whereDate('cash_book_date', '<', $from_date)
            ->get();

        if ($request->ajax()) {
            $view = view('cashbook_view.table_render', compact('cash_books', 'beforeFirstDays'))->render();
            return response()->json(['html' => $view]);
        }
        return view('cashbook_view.index', compact('cash_books', 'beforeFirstDays'));
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
}
