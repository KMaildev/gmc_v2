@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-12 col-12 mb-lg-0 mb-4">
            <form action="{{ route('purchase_order.update', $purchase_order->id) }}" method="POST" autocomplete="off"
                id="create-form">
                @csrf
                @method('PUT')
                <div class="card invoice-preview-card">
                    <div class="card-body">

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $supplier->name ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $supplier->address ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">PH</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $supplier->phone ?? '' }}">
                                        </div>
                                    </div>
                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Invoice No.
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('purchase_no') is-invalid @enderror"
                                                value="{{ $purchase_order->purchase_no ?? '' }}" name="purchase_no">
                                            @error('purchase_no')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('purchase_date') is-invalid @enderror"
                                                value="{{ $purchase_order->purchase_date ?? '' }}" name="purchase_date">
                                            @error('purchase_date')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                </dl>
                            </div>
                        </div>
                        <hr class="mx-n4" />

                        <div class="row">
                            <table class="table table-bordered table-sm">
                                <thead class="tbbg">
                                    <tr>
                                        <th style="color: white; text-align: center; width: 1%;">Sr.No</th>
                                        <th style="color: white; text-align: center;">Product Name</th>
                                        <th style="color: white; text-align: center;">Models</th>
                                        <th style="color: white; text-align: center;">Description</th>
                                        <th style="color: white; text-align: center;">Order Quantity</th>
                                        <th style="color: white; text-align: center;">CIF Yangon ( USD )</th>
                                        <th style="color: white; text-align: center;">Amount USD</th>
                                        <th style="color: white; text-align: center;">Particular</th>
                                        <th style="color: white; text-align: center;">Payment Operation</th>
                                        <th style="color: white; text-align: center;">Amount</th>
                                        <th style="color: white; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $amount_total = [];
                                    @endphp
                                    @foreach ($purchase_items as $item => $purchase_item)
                                        <tr>
                                            <td>
                                                {{ $item + 1 }}
                                            </td>

                                            <td>
                                                {{ $purchase_item->brands_table->name ?? '' }}
                                            </td>

                                            <td>
                                                {{ $purchase_item->type_of_models_table->title ?? '' }}
                                            </td>

                                            <td>
                                                {{ $purchase_item->description ?? '' }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ $purchase_item->qty ?? 0 }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ number_format($purchase_item->cif_usd, 2) }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                @php
                                                    $item_total_amount = $purchase_item->qty * $purchase_item->cif_usd ?? 0;
                                                    echo number_format($item_total_amount, 2);
                                                    $amount_total[] = $item_total_amount;
                                                @endphp
                                            </td>

                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" list="particular">
                                                    <datalist id="particular">
                                                        <option value="Deposit ( USD )">
                                                        <option value="Balance Units">
                                                        <option value="Order Quantity">
                                                        <option value="Allocation-1">
                                                        <option value="Allocation-2">
                                                        <option value="Allocation-3">
                                                        <option value="Allocation-4">
                                                        <option value="Allocation-5">
                                                    </datalist>
                                                    <input type="text" class="form-control" placeholder="QTY" style="text-align: right">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" list="payment_operation">
                                                    <datalist id="payment_operation">
                                                        <option value="30% Payment">
                                                        <option value="70% Payment">
                                                        <option value="Deposit ( USD )">
                                                        <option value="2nd Payment">
                                                        <option value="3rd Payment">
                                                        <option value="4th Payment">
                                                    </datalist>
                                                    <input type="text" class="form-control" placeholder="Amount" style="text-align: right">
                                                </div>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control">
                                            </td>

                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    Save
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">

                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Total Amount
                                        </label>
                                        <div class="col-sm-8">
                                            @php
                                                $total_amount = array_sum($amount_total);
                                            @endphp
                                            <input type="text" class="form-control form-control-sm"
                                                style="text-align: right;" value="{{ number_format($total_amount, 2) }}">

                                            <input type="hidden" value="{{ $total_amount }}" name="total_amount"
                                                id="totalAmountSave">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Exchange Rate
                                        </label>
                                        <div class="col-sm-8">
                                            @php
                                                $total_amount = array_sum($amount_total);
                                            @endphp
                                            <input type="text" class="form-control form-control-sm"
                                                style="text-align: right;" value="{{ number_format($total_amount, 2) }}">

                                            <input type="hidden" value="{{ $total_amount }}" name="total_amount"
                                                id="totalAmountSave">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Total MMK
                                        </label>
                                        <div class="col-sm-8">
                                            @php
                                                $total_amount = array_sum($amount_total);
                                            @endphp
                                            <input type="text" class="form-control form-control-sm"
                                                style="text-align: right;" value="{{ number_format($total_amount, 2) }}">

                                            <input type="hidden" value="{{ $total_amount }}" name="total_amount"
                                                id="totalAmountSave">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Status
                                        </label>
                                        <div class="col-sm-8">
                                            <select class="form-select" name="order_status">
                                                <option value="Ordered">
                                                    Ordered
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary" style='float: right;'>
                                                Save
                                            </button>
                                        </div>
                                    </div>

                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
