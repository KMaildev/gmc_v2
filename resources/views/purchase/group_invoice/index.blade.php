@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Group Invoice
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="{{ route('group_invoice.create') }}"
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
                        <thead class="">
                            <th style="background-color: #2e696e; color: white; text-align: center; width: 1%;">
                                Sr
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
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 2%;">
                                Status
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 1%;">
                                Actions
                            </th>
                        </thead>

                        <tbody class="table-border-bottom-0">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
