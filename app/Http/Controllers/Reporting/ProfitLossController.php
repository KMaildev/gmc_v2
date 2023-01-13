<?php

namespace App\Http\Controllers\Reporting;

use App\Accounting\ChartofAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfitLossController extends Controller
{

    public function index(Request $request)
    {
        // revenues
        $revenues = ChartofAccount::where('account_type_id', 23)
            ->get();

        $cost_of_sales = ChartofAccount::where('account_type_id', 26)
            ->get();

        $other_incomes = ChartofAccount::where('account_type_id', 25)
            ->get();

        return view('reporting.profit_loss.index', compact('revenues', 'cost_of_sales', 'other_incomes'));
    }
}
