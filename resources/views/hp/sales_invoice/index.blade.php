@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            HP Sales Invoices
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

                            @can('hp_sales_invoice_create')
                                <a href="{{ route('hp_sales_invoices.create') }}"
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
                            <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                Sr.No
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Name
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Dealer
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Join Date
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Invoice
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Year
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Model
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Vehicle Type
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Chassis No.
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Sale Price
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Downpayment
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                HP Principle
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Principle Receice
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Principle Balance
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                HP Interest
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Interest Receice
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Interest Balance
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Total Sale
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Down Percentage
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Balance
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Actions
                            </th>

                        </thead>
                        <tbody class="table-border-bottom-0 row_position" id="tablecontents">
                            @foreach ($sales_invoices as $key => $sales_invoice)
                                <tr style="background-color: white;">
                                    <td class="sticky-col first-col">
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->customers_table->name ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->customers_table->customers_table->name ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->invoice_date }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->invoice_no }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->hp_sales_sales_items_table->products_table->model_year ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->hp_sales_sales_items_table->products_table->product ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->hp_sales_sales_items_table->products_table->type ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->hp_sales_sales_items_table->products_table->chessi_no ?? '' }}
                                    </td>

                                    {{-- Sale Price --}}
                                    <td>
                                        {{ $sales_invoice->sales_invoices_payments_table->total_amount ?? 0 }}
                                    </td>

                                    {{-- Downpayment --}}
                                    <td>
                                        {{ $sales_invoice->sales_invoices_payments_table->hp_total_downpayment ?? 0 }}
                                    </td>

                                    {{-- HP Principle --}}
                                    <td>

                                    </td>

                                    {{-- Principle Receice --}}
                                    <td>

                                    </td>

                                    {{-- Principle Balance --}}
                                    <td>

                                    </td>

                                    {{-- HP Interest --}}
                                    <td>

                                    </td>

                                    {{-- Interest Receice --}}
                                    <td>

                                    </td>

                                    {{-- Interest Balance --}}
                                    <td>

                                    </td>


                                    {{-- Total Sale --}}
                                    <td>

                                    </td>

                                    {{-- Down Percentage --}}
                                    <td>

                                    </td>

                                    {{-- Balance --}}
                                    <td>

                                    </td>

                                    {{-- Actions --}}
                                    <td>
                                        <div class="demo-inline-spacing">
                                            <div class="btn-group">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('hp_invoice_view', $sales_invoice->id) }}"
                                                            target="_blank">
                                                            Invoice
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('hp_sales_invoices.show', $sales_invoice->id) }}">
                                                            Payment Table
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('sales_invoices.edit', $sales_invoice->id) }}">
                                                            Edit
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
