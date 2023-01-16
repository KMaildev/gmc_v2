@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Cash Trial
                        </h5>

                        @include('reporting.cash_trial.filter_action')
                    </div>
                </div>


                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">

                        <table class="table-bordered main-table" style="margin-bottom: 10px">

                            <thead class="tbbg">
                                <tr>
                                    <td rowspan="2"
                                        style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                        Sr.No
                                    </td>

                                    <td rowspan="2"
                                        style="background-color: #296166; color: white; text-align: left; width: 10%;">

                                    </td>

                                    <td colspan="1"
                                        style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        Deposit
                                    </td>
                                    <td colspan="1"
                                        style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        Withdraw
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        MMK
                                    </td>
                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        MMK
                                    </td>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" id="tablecontents">
                                @php
                                    $all_total_in = [];
                                    $all_total_out = [];
                                @endphp
                                @foreach ($cash_trials as $key => $cash_trial)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $cash_trial->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_in = $cash_trial->cash_books_table->sum('cash_in');
                                                $bank_in = $cash_trial->cash_books_table->sum('bank_in');
                                                $total_in = $cash_in + $bank_in;
                                                echo number_format($total_in, session('decimal'));
                                                $all_total_in[] = $total_in;
                                            @endphp
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_out = $cash_trial->cash_books_table->sum('cash_out');
                                                $bank_out = $cash_trial->cash_books_table->sum('bank_out');
                                                $total_out = $cash_out + $bank_out;
                                                echo number_format($total_out, session('decimal'));
                                                $all_total_out[] = $total_out;
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2">
                                        Total
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $all_total_in = array_sum($all_total_in);
                                            echo number_format($all_total_in, session('decimal'));
                                        @endphp
                                    </td>

                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $all_total_out = array_sum($all_total_out);
                                            echo number_format($all_total_out, session('decimal'));
                                        @endphp
                                    </td>
                                </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
