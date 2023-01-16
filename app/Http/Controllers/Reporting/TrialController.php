<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrialController extends Controller
{
    public function index(Request $request)
    {
        return view('reporting.trial.index');
    }
}
