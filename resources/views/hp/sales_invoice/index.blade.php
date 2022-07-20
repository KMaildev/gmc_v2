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

                            <a href="{{ route('sales_invoices.create') }}"
                                class="dt-button create-new btn btn-primary btn-sm">
                                <span>
                                    <i class="bx bx-plus me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Create</span>
                                </span>
                            </a>
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
                                Invoice No.
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Date
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Company
                                Name
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Dealer Name
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Brand Name
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Type
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Model
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Color
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Chassis No.
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Vehicle No.
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Qty
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Unit Price
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Sales Value
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Total Amount
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Down
                                Payment
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Discount
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Dealer Percentage
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Balance to Pay
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Dealer Percentage
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Amount
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Status
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Date
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Action
                            </th>

                        </thead>
                        <tbody class="table-border-bottom-0 row_position" id="tablecontents">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
