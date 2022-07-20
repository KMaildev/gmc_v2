@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Cash Book
                        </h5>
                    </div>
                </div>

                <div class="">
                    <table class="" style="margin-bottom: 1px !important;">
                        <thead class="tbbg">
                            <tr>
                                <td rowspan="2" style="color: white; text-align: center; width: 1%;">
                                    Sr.No
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Date
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Particular
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Post Ref.
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Debit
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Credit
                                </td>
                                <td colspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Balance
                                </td>
                            </tr>
                            <tr>
                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Debit
                                </td>
                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Credit
                                </td>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php
                                $debit_total = [];
                                $credit_total = [];
                                $balance_debit_total = [];
                                $balance_credit_total = [];
                            @endphp
                            @foreach ($cash_collections as $key => $cash_collection)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $cash_collection->sales_invoices_table->invoice_date ?? '' }}
                                    </td>

                                    <td>
                                        {{ $cash_collection->customers_table->name ?? '' }}
                                    </td>

                                    <td>
                                        {{ $cash_collection->sales_journals_table->post_ref ?? '' }}
                                    </td>

                                    {{-- Debit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $sale_journal_credited = $cash_collection->sales_journals_table->credited ?? 0;
                                            echo number_format($sale_journal_credited, 2);
                                            $debit_total[] = $sale_journal_credited;
                                        @endphp
                                    </td>

                                    {{-- Credit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $cash_collection_credited = $cash_collection->credited ?? 0;
                                            echo number_format($cash_collection_credited, 2);
                                            $credit_total[] = $cash_collection_credited;
                                        @endphp
                                    </td>

                                    {{-- Balance Debit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $balance_debit = $sale_journal_credited - $cash_collection_credited;
                                            echo number_format($balance_debit, 2);
                                            $balance_debit_total[] = $balance_debit;
                                        @endphp
                                    </td>

                                    {{-- Balance Credit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $balance_credit = $cash_collection_credited - $sale_journal_credited;
                                            echo number_format($balance_credit, 2);
                                            $balance_credit_total[] = $balance_credit;
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="4">Total:</td>
                            <td style="text-align: right; font-weight: bold">
                                @php
                                    $debit_total = array_sum($debit_total);
                                    echo number_format($debit_total, 2);
                                @endphp
                            </td>
                            <td style="text-align: right; font-weight: bold">
                                @php
                                    $credit_total = array_sum($credit_total);
                                    echo number_format($credit_total, 2);
                                @endphp
                            </td>
                            <td style="text-align: right; font-weight: bold">
                                @php
                                    $balance_debit_total = array_sum($balance_debit_total);
                                    echo number_format($balance_debit_total, 2);
                                @endphp
                            </td>
                            <td style="text-align: right; font-weight: bold">
                                @php
                                    $balance_credit_total = array_sum($balance_credit_total);
                                    echo number_format($balance_credit_total, 2);
                                @endphp
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
