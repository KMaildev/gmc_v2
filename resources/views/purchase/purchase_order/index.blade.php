@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Purchase Order
                        </h5>
                        <div class="card-title-elements ms-auto">
                            @can('hp_sales_invoice_create')
                                <a href="{{ route('purchase_order.create') }}"
                                    class="dt-button create-new btn btn-primary btn-sm">
                                    <span>
                                        <i class="bx bx-plus me-sm-2"></i>
                                        <span class="d-none d-sm-inline-block">Create</span>
                                    </span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <table class="table table-bordered main-table py-5" style="margin-bottom: 1px !important;"
                        id="tbl_exporttable_to_xls">
                        <thead class="">
                            <th style="background-color: #2e696e; color: white; text-align: center; width: 1%;">
                                Sr.No
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Purchase No
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Date
                            </th>

                            <th colspan="3" style="background-color: #2e696e; color: white;"></th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Status
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Actions
                            </th>
                        </thead>

                        <tbody class="table-border-bottom-0">
                            @foreach ($purchase_orders as $key => $purchase_order)
                                <tr>
                                    <td style="background-color: #F6B733; text-align: center;">
                                        {{ $key + 1 }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $purchase_order->purchase_no ?? '' }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $purchase_order->purchase_date ?? '' }}
                                    </td>

                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td style="text-align: center;">
                                        {{ $purchase_order->order_status ?? '' }}
                                    </td>

                                    <td style="text-align: center;">
                                        <div class="demo-inline-spacing">
                                            <div class="btn-group">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('purchase_order.edit', $purchase_order->id) }}">Edit</a>
                                                    </li>

                                                    <li>
                                                        <form
                                                            action="{{ route('purchase_order.destroy', $purchase_order->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="dropdown-item del_confirm"
                                                                id="confirm-text" data-toggle="tooltip">Delete</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr style=" background-color: #DDEBF7; color: black">
                                    <td style="text-align: center; width: 1%;">
                                        #
                                    </td>
                                    <td style="text-align: center; width: 10%;">
                                        Product Name
                                    </td>

                                    <td style="text-align: center; width: 10%;">
                                        Models
                                    </td>

                                    <td style="text-align: center; width: 10%;">
                                        Order Quantity
                                    </td>

                                    <td style="text-align: center; width: 10%;">
                                        CIF Yangon ( USD )
                                    </td>

                                    <td style="text-align: center; width: 10%;">
                                        Amount USD
                                    </td>

                                    <td style="text-align: center; width: 10%;">
                                        Exchange Rate
                                    </td>

                                    <td style="text-align: center; width: 10%;">
                                        Total MMK
                                    </td>
                                </tr>

                                @php
                                    $total_order_qty = [];
                                    $total_CIF_USD = [];
                                    $total_amount_USD = [];
                                @endphp
                                @foreach ($purchase_order->purchase_items_table as $key => $purchase_item)
                                    <tr>
                                        <td style="text-align: center">
                                            {{ $key + 1 }}
                                        </td>

                                        <td style="text-align: center">
                                            {{ $purchase_item->brands_table->name ?? '' }}
                                        </td>

                                        <td style="text-align: center">
                                            {{ $purchase_item->type_of_models_table->title ?? '' }}
                                        </td>

                                        <td style="text-align: right">
                                            {{ $purchase_item->qty ?? 0 }}
                                        </td>

                                        <td style="text-align: right">
                                            {{ number_format($purchase_item->cif_usd, 2) }}
                                        </td>

                                        <td style="text-align: right">
                                            @php
                                                $qty = $purchase_item->qty ?? 0;
                                                $cif_usd = $purchase_item->cif_usd ?? 0;
                                                $amount_usd = $qty * $cif_usd;
                                                echo number_format($amount_usd, 2);
                                                $total_order_qty[] = $qty;
                                                $total_CIF_USD[] = $cif_usd;
                                                $total_amount_USD[] = $amount_usd;
                                            @endphp
                                        </td>

                                        <td style="text-align: right">
                                            EX Rate
                                        </td>

                                        <td style="text-align: right">
                                            Total MMk
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td style="text-align: center; width: 1%;">
                                        Total
                                    </td>
                                    <td colspan="2"></td>

                                    {{-- Total Order Quantity --}}
                                    <td style="text-align: right">
                                        @php
                                            $total_order_qty = array_sum($total_order_qty);
                                            echo number_format($total_order_qty);
                                        @endphp
                                    </td>

                                    {{-- Total CIF Yangon ( USD ) --}}
                                    <td style="text-align: right">
                                        @php
                                            $total_CIF_USD = array_sum($total_CIF_USD);
                                            echo number_format($total_CIF_USD, 2);
                                        @endphp
                                    </td>

                                    {{-- Amount USD --}}
                                    <td style="text-align: right">
                                        @php
                                            $total_amount_USD = array_sum($total_amount_USD);
                                            echo number_format($total_amount_USD, 2);
                                        @endphp
                                    </td>

                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
