@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Cash Receipt Journal
                        </h5>
                    </div>
                </div>

                <div class="">
                    <table class="" style="margin-bottom: 1px !important;">
                        <thead class="tbbg">
                            <th style="color: white; text-align: center; width: 1%;">
                                Sr.No
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Invoice No.
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Invoice Date
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Customer Name-Account Debited
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Post Ref.
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Cash-Debited
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Sales Discount -Debited
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                AR (Vehicle )-Credited
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Payment Time
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Action
                            </th>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if ($form_status == 'is_create')
                                @include('accounting.cash_collection.form.create_form')
                            @elseif ($form_status == 'is_edit')
                                @include('accounting.cash_collection.form.edit_form')
                            @endif

                            @foreach ($cash_collections as $key => $cash_collection)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $cash_collection->sales_invoices_table->invoice_no ?? '' }}
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

                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $cash_debited = $cash_collection->cash_debited ?? 0;
                                            echo number_format($cash_debited, 2);
                                        @endphp
                                    </td>

                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $sale_discount_debited = $cash_collection->sale_discount_debited ?? 0;
                                            echo number_format($sale_discount_debited, 2);
                                        @endphp
                                    </td>

                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $credited = $cash_collection->credited ?? 0;
                                            echo number_format($credited, 2);
                                        @endphp
                                    </td>

                                    <td>
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="background-color: #296166; color: white; font-size: 12px;">
                                                    Received
                                                </td>
                                                <td style="background-color: #296166; color: white; font-size: 12px;">
                                                    Time
                                                </td>
                                                <td style="background-color: #296166; color: white; font-size: 12px;">
                                                    Amount
                                                </td>
                                            </tr>
                                            @foreach ($cash_collection->sale_pay_nows_table as $sale_pay_now)
                                                <tr>
                                                    <td style="font-size: 12px;">
                                                        {{ $sale_pay_now->received_date ?? '' }}
                                                    </td>
                                                    <td style="font-size: 12px;">
                                                        {{ $sale_pay_now->payment_time ?? '' }}
                                                    </td>
                                                    <td style="font-size: 12px;">
                                                        {{ number_format($sale_pay_now->pay_amount, 2) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
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
                                                            href="{{ route('cash_collection.edit', $cash_collection->id) }}">Edit</a>
                                                    </li>

                                                    <li>
                                                        <form
                                                            action="{{ route('cash_collection.destroy', $cash_collection->id) }}"
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
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="5">Total:</td>
                            <td style="text-align: right; font-weight: bold">
                                {{ number_format($cash_collections->sum('cash_debited'), 2) }}
                            </td>
                            <td style="text-align: right; font-weight: bold">
                                {{ number_format($cash_collections->sum('sale_discount_debited'), 2) }}
                            </td>
                            <td style="text-align: right; font-weight: bold">
                                {{ number_format($cash_collections->sum('credited'), 2) }}
                            </td>
                            <td></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
