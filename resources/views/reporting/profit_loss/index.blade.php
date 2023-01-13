@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Profit and Loss
                        </h5>
                        @include('reporting.profit_loss.filter_action')
                    </div>
                </div>


                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">

                        <table class="table-bordered main-table" style="margin-bottom: 10px">
                            {{-- Revenue --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    Revenue
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                    MMK
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                    MMK
                                </th>
                            </thead>
                            <tbody class="table-border-bottom-0" id="tablecontents">
                                @php
                                    $all_total_revenue = [];
                                @endphp
                                @foreach ($revenues as $key => $revenue)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $revenue->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_in = $revenue->cash_books_table->sum('cash_in');
                                                $bank_in = $revenue->cash_books_table->sum('bank_in');
                                                $total_debit = $cash_in + $bank_in;
                                                
                                                $cash_out = $revenue->cash_books_table->sum('cash_out');
                                                $bank_out = $revenue->cash_books_table->sum('bank_out');
                                                $total_credit = $cash_out + $bank_out;
                                                
                                                $total_revenue = $total_credit - $total_debit;
                                                echo number_format($total_revenue, 2);
                                                $all_total_revenue[] = $total_revenue;
                                            @endphp
                                        </td>

                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">
                                        Total
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $all_total_revenue = array_sum($all_total_revenue);
                                            echo number_format($all_total_revenue, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>



                            {{-- Cost of Sale --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    Cost of Sale
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                    MMK
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                    MMK
                                </th>
                            </thead>
                            <tbody class="table-border-bottom-0" id="tablecontents">
                                @php
                                    $all_total_cost_of_sale = [];
                                @endphp
                                @foreach ($cost_of_sales as $key => $cost_of_sale)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $cost_of_sale->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_in = $cost_of_sale->cash_books_table->sum('cash_in');
                                                $bank_in = $cost_of_sale->cash_books_table->sum('bank_in');
                                                $total_debit = $cash_in + $bank_in;
                                                
                                                $cash_out = $cost_of_sale->cash_books_table->sum('cash_out');
                                                $bank_out = $cost_of_sale->cash_books_table->sum('bank_out');
                                                $total_credit = $cash_out + $bank_out;
                                                
                                                $total_cost_of_sale = $total_debit - $total_credit;
                                                echo number_format($total_cost_of_sale, 2);
                                                $all_total_cost_of_sale[] = $total_cost_of_sale;
                                            @endphp
                                        </td>

                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">
                                        Total
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $all_total_cost_of_sale = array_sum($all_total_cost_of_sale);
                                            echo number_format($all_total_cost_of_sale, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>






                            {{-- Other Income --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    Other Income
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                    MMK
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                    MMK
                                </th>
                            </thead>
                            <tbody class="table-border-bottom-0" id="tablecontents">
                                @php
                                    $all_total_cost_of_sale = [];
                                @endphp
                                @foreach ($cost_of_sales as $key => $cost_of_sale)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $cost_of_sale->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_in = $cost_of_sale->cash_books_table->sum('cash_in');
                                                $bank_in = $cost_of_sale->cash_books_table->sum('bank_in');
                                                $total_debit = $cash_in + $bank_in;
                                                
                                                $cash_out = $cost_of_sale->cash_books_table->sum('cash_out');
                                                $bank_out = $cost_of_sale->cash_books_table->sum('bank_out');
                                                $total_credit = $cash_out + $bank_out;
                                                
                                                $total_cost_of_sale = $total_debit - $total_credit;
                                                echo number_format($total_cost_of_sale, 2);
                                                $all_total_cost_of_sale[] = $total_cost_of_sale;
                                            @endphp
                                        </td>

                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">
                                        Total
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $all_total_cost_of_sale = array_sum($all_total_cost_of_sale);
                                            echo number_format($all_total_cost_of_sale, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
