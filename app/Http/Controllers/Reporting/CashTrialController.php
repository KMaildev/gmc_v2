<?php

namespace App\Http\Controllers\Reporting;

use App\Accounting\ChartofAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashTrialController extends Controller
{
    public function index(Request $request)
    {
        $cash_trials = ChartofAccount::all();
        return view('reporting.cash_trial.index', compact('cash_trials'));
    }
}
