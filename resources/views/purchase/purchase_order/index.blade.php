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
                        <thead class="tbbg">
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 1%;">
                                #
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Purchase No
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Date
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Name
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                PH
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Purchase Representative
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Total
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Actions
                            </th>
                        </thead>
                        <tbody class="table-border-bottom-0 t">
                            @foreach ($purchase_orders as $key => $purchase_order)
                                <tr style="background-color: #418107; color: white;">
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $purchase_order->purchase_no ?? '' }}
                                    </td>
                                    <td>
                                        {{ $purchase_order->purchase_date ?? '' }}
                                    </td>
                                    <td>
                                        {{ $purchase_order->supplier_table->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $purchase_order->supplier_table->phone ?? '' }}
                                    </td>
                                    <td>
                                        {{ $purchase_order->users_table->name ?? '' }}
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="demo-inline-spacing">
                                            <div class="btn-group">
                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('purchase_order.edit', $purchase_order->id) }}">Edit</a>
                                                    </li>

                                                    <li>
                                                        <form action="{{ route('purchase_order.destroy', $purchase_order->id) }}"
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
                                @php
                                    $total_qty = [];
                                    $total_unit_price = [];
                                @endphp
                                @foreach ($purchase_order->purchase_items_table as $key => $purchase_item)
                                    <tr>
                                        <td style="text-align: center">
                                            {{ $key + 1 }}
                                        </td>
                                        <td style="text-align: center">
                                            {{ $purchase_item->products_table->type ?? '' }}
                                        </td>
                                        <td style="text-align: center">
                                            {{ $purchase_item->products_table->product ?? '' }}
                                        </td>
                                        <td style="text-align: center">
                                            {{ $purchase_item->description ?? '' }}
                                        </td>
                                        <td style="text-align: right">
                                            {{ $purchase_item->qty ?? 0 }}
                                        </td>
                                        <td style="text-align: right">
                                            {{ number_format($purchase_item->unit_price ?? 0, 2) }}
                                        </td>
                                        <td style="text-align: right">
                                            @php
                                                $qty = $purchase_item->qty ?? 0;
                                                $total_qty[] = $qty;
                                                $unit_price = $purchase_item->unit_price ?? 0;
                                                $total = $qty * $unit_price;
                                                echo number_format($total, 2);
                                                $total_unit_price[] = $total;
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        Total
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_qty = array_sum($total_qty);
                                            echo number_format($total_qty);
                                        @endphp
                                    </td>
                                    <td></td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_unit_price = array_sum($total_unit_price);
                                            echo number_format($total_unit_price, 2);
                                        @endphp
                                    </td>
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
