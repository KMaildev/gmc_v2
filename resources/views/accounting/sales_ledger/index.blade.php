@extends('layouts.menus.accounting')
@section('content')
    <div class="row">

        <div class="col-md-8 col-sm-12 col-lg-8">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Sales Ledger
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="#" class="dt-button create-new btn btn-success btn-sm"
                                onclick="alert('Build in progress')">
                                <span>
                                    <i class="bx bx-file me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">
                                        Excel
                                    </span>
                                </span>
                            </a>
                        </div>
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
                                    Dealer Name
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
                            @foreach ($sales_journals as $key => $sales_journal)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $sales_journal->sales_journal_date ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_journal->customers_table->name ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_journal->post_ref ?? '' }}
                                    </td>

                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $debited = $sales_journal->debited ?? 0;
                                            echo number_format($debited, 2);
                                        @endphp
                                    </td>

                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $credited = $sales_journal->credited ?? 0;
                                            echo number_format($credited, 2);
                                        @endphp
                                    </td>

                                    {{-- debited Balance --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $debited = $sales_journal->debited ?? 0;
                                            echo number_format($debited, 2);
                                        @endphp
                                    </td>

                                    {{-- credited balance --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $credited = $sales_journal->credited ?? 0;
                                            echo number_format($credited, 2);
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="4">Total:</td>
                            <td style="text-align: right; font-weight: bold">
                                {{ number_format($sales_journals->sum('debited'), 2) }}
                            </td>
                            <td style="text-align: right; font-weight: bold">
                                {{ number_format($sales_journals->sum('credited'), 2) }}
                            </td>
                            <td style="text-align: right; font-weight: bold">
                                {{ number_format($sales_journals->sum('debited'), 2) }}
                            </td>
                            <td style="text-align: right; font-weight: bold">
                                {{ number_format($sales_journals->sum('credited'), 2) }}
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-4 col-sm-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Sales Ledger Group
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="#" class="dt-button create-new btn btn-success btn-sm"
                                onclick="alert('Build in progress')">
                                <span>
                                    <i class="bx bx-file me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">
                                        Excel
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="">
                    <table class="" style="margin-bottom: 1px !important;">
                        <thead class="tbbg">
                            <tr>
                                <td rowspan="2" style="color: white; text-align: center; width: 1%;">
                                    Sr.No
                                </td>
                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Dealer Name
                                </td>
                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Revenue
                                </td>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($sales_journals_groups as $k => $sales_journals_group)
                                <tr>
                                    <td>
                                        {{ $k + 1 }}
                                    </td>

                                    <td>
                                        {{ $sales_journals_group->customers_table->name ?? '' }}
                                    </td>

                                    <td style="text-align: right; font-weight: bold;">
                                        {{ number_format($sales_journals_group->debited, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="2">
                                Total:
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                {{ number_format($sales_journals_groups->sum('debited'), 2) }}
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
