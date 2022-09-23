@extends('layouts.menus.inventory')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-12 col-12 mb-lg-0 mb-4">

            <div class="card invoice-preview-card">
                <div class="card-body">

                    <div class="row p-sm-3 p-0">
                        <div class="col-md-6">
                            <dl class="row mb-2">

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm"
                                            value="{{ $supplier->name ?? '' }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm"
                                            value="{{ $supplier->address ?? '' }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label">PH</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm"
                                            value="{{ $supplier->phone ?? '' }}" readonly>
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
                                            value="{{ $purchase_order->purchase_no ?? '' }}" name="purchase_no" readonly>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label">
                                        Invoice Date
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="date_picker form-control form-control-sm"
                                            value="{{ $purchase_order->purchase_date ?? '' }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label">
                                        Arrival Date
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="date_picker form-control form-control-sm @error('arrival_date') is-invalid @enderror"
                                            name="arrival_date" value="{{ $arrival_information->arrival_date ?? '' }}"
                                            readonly>
                                    </div>
                                </div>

                            </dl>
                        </div>
                    </div>
                    <hr class="mx-n4" />

                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <span style="color: black; font-weight: bold;">
                                Shipping Quantity
                            </span>
                            <table class="table table-bordered table-sm" style="margin-bottom: 10px;">
                                <thead class="tbbg">
                                    <tr>
                                        <th style="color: white; text-align: center; width: 1%;">
                                            Sr
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Product Name
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Models
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Order Quantity
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            CIF Yangon ( USD )
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Amount USD
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Shipping Quantity
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>

                                        <td>
                                            {{ $arrival_item->purchase_items_table->brands_table->name ?? '' }}
                                        </td>

                                        <td>
                                            {{ $arrival_item->purchase_items_table->type_of_models_table->title ?? '' }}
                                        </td>

                                        <td style="text-align: right; font-weight: bold;">
                                            {{ $arrival_item->purchase_items_table->qty ?? 0 }}
                                        </td>

                                        <td style="text-align: right; font-weight: bold;">
                                            {{ number_format($arrival_item->purchase_items_table->cif_usd, 2) }}
                                        </td>

                                        <td style="text-align: right; font-weight: bold;">
                                            @php
                                                $item_total_amount = $arrival_item->purchase_items_table->qty * $arrival_item->purchase_items_table->cif_usd ?? 0;
                                                echo number_format($item_total_amount, 2);
                                            @endphp
                                        </td>

                                        {{-- Shipping Quantity --}}
                                        <td style="text-align: right; font-weight: bold;">
                                            {{ $arrival_item->shipping_qty ?? 0 }}
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <div class="col-md-12 col-lg-12 col-sm-12 py-5">
                            <table class="table table-bordered table-sm" style="margin-bottom: 10px;">
                                <thead class="tbbg">
                                    <tr>

                                        <th style="color: white; text-align: center; width: 1%;">
                                            Sr.No
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Brand Name
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Product
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Type
                                        </th>

                                        <th style="color: white;  text-align: center; width: 10%;">
                                            Model No
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Model Year
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Configuration
                                        </th>

                                        <th style="color: white;  text-align: center; width: 10%;">
                                            Engine Power
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Chessi No
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Engine No.
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Weight
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Door
                                        </th>

                                        <th style="color: white;  text-align: center; width: 10%;">
                                            Seater
                                        </th>

                                        <th style="color: white;  text-align: center; width: 10%;">
                                            Vehicle No.
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Quantity
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Action
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreShippingChassisManagement', '#import-form') !!}
@endsection
