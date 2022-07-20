@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Sales Journal
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
                                Date
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Customer Name-Account Debited
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Post Ref.
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Account Receivable ( Vehicle )-Debited
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Revenue (Vehicle)-Credited
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Action
                            </th>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if ($form_status == 'is_create')
                                @include('accounting.sales_journal.form.create_form')
                            @elseif ($form_status == 'is_edit')
                                @include('accounting.sales_journal.form.edit_form')
                            @endif

                            @foreach ($sales_journals as $key => $sales_journal)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $sales_journal->sales_invoices_table->invoice_no ?? '' }}
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
                                                            href="{{ route('sales_journal.edit', $sales_journal->id) }}">Edit</a>
                                                    </li>

                                                    <li>
                                                        <form
                                                            action="{{ route('sales_journal.destroy', $sales_journal->id) }}"
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
                                {{ number_format($sales_journals->sum('debited'), 2) }}
                            </td>
                            <td style="text-align: right; font-weight: bold">
                                {{ number_format($sales_journals->sum('credited'), 2) }}
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
