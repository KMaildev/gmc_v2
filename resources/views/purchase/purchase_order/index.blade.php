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

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Particular
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                            </th>
                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                            </th>
                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Status
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Actions
                            </th>
                        </thead>

                        <tbody class="table-border-bottom-0">
                            @foreach ($purchase_orders as $key => $purchase_order)
                                {{-- Invoice --}}
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
                                                            href="{{ route('purchase_operation_create', $purchase_order->id) }}">
                                                            Operation
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('arrival_management_create', $purchase_order->id) }}">
                                                            Arrival Management
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('purchase_order.edit', $purchase_order->id) }}">
                                                            Edit
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <form
                                                            action="{{ route('purchase_order.destroy', $purchase_order->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="dropdown-item del_confirm"
                                                                id="confirm-text">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Products Info --}}
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

                                    <td></td>
                                    <td></td>
                                    <td></td>
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

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach

                                {{-- Product Payment Info --}}
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
                                    <td></td>
                                </tr>

                                {{-- Operation Info --}}
                                @foreach ($purchase_order->purchase_operation_infos_table as $key => $purchase_operation_info)
                                    <tr style="background-color: #DDEBF7; color: black;">
                                        <td style="text-align: center; width: 1%;">
                                            #
                                        </td>

                                        <td></td>

                                        <td style="text-align: center">
                                            {{ $purchase_operation_info->operation_date ?? '' }}
                                        </td>

                                        <td style="text-align: center">
                                            {{ $purchase_operation_info->particular ?? '' }}
                                        </td>

                                        {{-- Amount USD --}}
                                        <td style="text-align: center">
                                            {{ $purchase_operation_info->payment_operation ?? '' }}
                                        </td>

                                        <td style="text-align: center">
                                            Amount USD
                                        </td>

                                        <td style="text-align: center">
                                            Exchange Rate
                                        </td>

                                        <td style="text-align: center">
                                            Total MMK
                                        </td>

                                        <td style="text-align: center; color: red;">
                                            {{ $purchase_operation_info->operation_status ?? '' }}
                                        </td>
                                    </tr>

                                    {{-- Operation Items --}}
                                    @foreach ($purchase_operation_info->purchase_operation_items_table as $key => $purchase_operation_item)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>

                                            <td style="text-align: center">
                                                {{ $purchase_operation_item->purchase_items_table->brands_table->name ?? '' }}
                                            </td>

                                            <td style="text-align: center">
                                                {{ $purchase_operation_item->purchase_items_table->type_of_models_table->title ?? '' }}
                                            </td>

                                            <td style="text-align: right">
                                                @php
                                                    $particular_qty = $purchase_operation_item->particular_qty ?? 0;
                                                    echo $particular_qty;
                                                @endphp
                                            </td>

                                            <td style="text-align: right">
                                                @php
                                                    $payment_operation_amount = $purchase_operation_item->payment_operation_amount ?? 0;
                                                    echo number_format($payment_operation_amount, 2);
                                                @endphp
                                            </td>

                                            {{-- Amount USD --}}
                                            <td style="text-align: right">
                                                @php
                                                    $amount_usd = $particular_qty * $payment_operation_amount;
                                                    echo number_format($amount_usd, 2);
                                                @endphp
                                            </td>

                                            {{-- Exchange Rate --}}
                                            <td style="text-align: right">
                                                @php
                                                    $exchange_rate = $purchase_operation_item->exchange_rate ?? 0;
                                                    echo number_format($exchange_rate, 2);
                                                @endphp
                                            </td>

                                            <td style="text-align: right">
                                                @php
                                                    $total_mmk = $amount_usd * $exchange_rate;
                                                    echo number_format($total_mmk, 2);
                                                @endphp
                                            </td>

                                            <td></td>
                                        </tr>
                                    @endforeach
                                @endforeach
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
