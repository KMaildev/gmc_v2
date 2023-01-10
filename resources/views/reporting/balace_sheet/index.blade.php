@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Balance Sheet
                        </h5>

                        @include('reporting.balace_sheet.filter_action')
                    </div>
                </div>



                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">

                        {{-- FIXED ASSETS --}}
                        <table class="table-bordered main-table" style="margin-bottom: 10px">
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    FIXED ASSETS
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
                                    $all_total_non_current_asset = [];
                                @endphp
                                @foreach ($non_current_assets as $key => $non_current_asset)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $non_current_asset->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_out = $non_current_asset->cash_books_table->sum('cash_out');
                                                $bank_out = $non_current_asset->cash_books_table->sum('bank_out');
                                                $total_non_current_asset = $cash_out + $bank_out;
                                                echo number_format($total_non_current_asset, 2);
                                                $all_total_non_current_asset[] = $total_non_current_asset;
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
                                            $all_total_non_current_asset = array_sum($all_total_non_current_asset);
                                            echo number_format($all_total_non_current_asset, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- CURRENT ASSETS  --}}
                        <table class="table-bordered main-table" style="margin-bottom: 10px">
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    CURRENT ASSETS
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                </th>
                            </thead>
                            <tbody class="table-border-bottom-0" id="tablecontents">
                                @php
                                    $all_total_non_current_asset = [];
                                @endphp
                                @foreach ($non_current_assets as $key => $non_current_asset)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $non_current_asset->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_out = $non_current_asset->cash_books_table->sum('cash_out');
                                                $bank_out = $non_current_asset->cash_books_table->sum('bank_out');
                                                $total_non_current_asset = $cash_out + $bank_out;
                                                echo number_format($total_non_current_asset, 2);
                                                $all_total_non_current_asset[] = $total_non_current_asset;
                                            @endphp
                                        </td>

                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">
                                        Total
                                    </td>
                                    <td style="text-align: right;">
                                        @php
                                            $all_total_non_current_asset = array_sum($all_total_non_current_asset);
                                            echo number_format($all_total_non_current_asset, 2);
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
