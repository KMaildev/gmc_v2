@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <form action="{{ route('purchase_order.update', $purchase_order->id) }}" method="POST" autocomplete="off" id="create-form">
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
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                id="SupplierID" name="supplier_id">
                                                <option value="">--Please Select Supplier --</option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id ?? '' }}"
                                                        @if ($supplier->id == $purchase_order->supplier_id) selected @endif>
                                                        {{ $supplier->name ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('supplier_id')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Address">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">PH</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Ph">
                                        </div>
                                    </div>
                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Purchase No
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
                                        <th style="color: white; text-align: center;">Model</th>
                                        <th style="color: white; text-align: center;">Type</th>
                                        <th style="color: white; text-align: center;">Description</th>
                                        <th style="color: white; text-align: center;">Qty</th>
                                        <th style="color: white; text-align: center;">Price</th>
                                        <th style="color: white; text-align: center;">Amount (MMK)</th>
                                        <th style="color: white; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tr>

                                    <td></td>

                                    {{-- Model --}}
                                    <td>
                                        <input type="text" class="form-control" id="Model">
                                    </td>

                                    {{-- Chassis No.& Vehicle No --}}
                                    <td>
                                        <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                            id="ChessiNO">
                                            <option value="">--Select Type --</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->type ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('chessi_no')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </td>

                                    {{-- Description --}}
                                    <td>
                                        <input type="text" class="form-control" id="Description">
                                    </td>

                                    {{-- Qty --}}
                                    <td>
                                        <input type="text" class="form-control" required id="Qty"
                                            oninput="SetCalculator()" />
                                    </td>

                                    {{-- Price --}}
                                    <td>
                                        <input type="text" class="form-control" id="UnitPrice" oninput="SetCalculator()">
                                    </td>

                                    {{-- Amount --}}
                                    <td>
                                        <input type="text" class="form-control" id="TotalAmount">
                                    </td>

                                    <td>
                                        <input type="button" value="Add" class="btn btn-sm btn-primary"
                                            onclick="setSaleInvoiceCart()">
                                    </td>
                                </tr>
                                <tbody id="TemporarySalesItemsList">
                                    @php
                                        $amount_total = [];
                                    @endphp
                                </tbody>

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
                                                {{ $purchase_item->products_table->product ?? '' }}
                                            </td>

                                            <td>
                                                {{ $purchase_item->products_table->type ?? '' }}
                                            </td>

                                            <td>
                                                {{ $purchase_item->description ?? '' }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ $purchase_item->qty ?? 0 }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ number_format($purchase_item->unit_price, 2) }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                @php
                                                    $item_total_amount = $purchase_item->qty * $purchase_item->unit_price ?? 0;
                                                    echo number_format($item_total_amount, 2);
                                                    $amount_total[] = $item_total_amount;
                                                @endphp
                                            </td>

                                            <td>
                                                <a href="{{ route('purchase_item_remove', $purchase_item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    Remove
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Purchase Representative
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="purchase_representative_id">
                                                <option value="">-- Select Purchase Representative --</option>
                                                @foreach ($sales_persons as $sales_person)
                                                    <option value="{{ $sales_person->id }}"
                                                        @if ($sales_person->id == $purchase_order->purchase_representative_id) selected @endif>
                                                        {{ $sales_person->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('purchase_representative_id')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </dl>
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
                                                style="text-align: right;" id="totalAmountShow"
                                                value="{{ number_format($total_amount, 2) }}">

                                            <input type="hidden" value="{{ $total_amount }}" name="total_amount"
                                                id="totalAmountSave">
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
    <script>
        var totalAmountShow = document.getElementById("totalAmountShow");
        var totalAmountSave = document.getElementById("totalAmountSave");

        // Qty * Price
        function SetCalculator() {
            var Qty = document.getElementById("Qty").value;
            var UnitPrice = document.getElementById("UnitPrice").value;
            var AmountTotal = Qty * UnitPrice;
            TotalAmount.value = AmountTotal;
        }

        function setSaleInvoiceCart() {
            var ChessiNO = document.getElementById("ChessiNO").value;
            var Qty = document.getElementById("Qty").value;
            var UnitPrice = document.getElementById("UnitPrice").value;
            var Description = document.getElementById("Description").value;

            if (ChessiNO == null || ChessiNO == "") {
                alert("Chassis No.& Vehicle No.");
                return false;
            } else if (Qty == null || Qty == "" || isNaN(Qty)) {
                alert("Enter Numeric value only.");
                return false;
            } else if (UnitPrice == null || UnitPrice == "" || isNaN(UnitPrice)) {
                alert("Enter Numeric value only.");
                return false;
            }

            var url = '{{ url('add_cart_temporary') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    ChessiNO: ChessiNO,
                    Qty: Qty,
                    Price: UnitPrice,
                    Description: Description,
                },
                success: function(data) {
                    getTemporarySalesItems();
                },
                error: function(data) {}
            });
        }

        $('select[id="ChessiNO"]').on('change', function() {
            var ChessiNO = $(this).val();
            if (ChessiNO) {
                $.ajax({
                    url: '/get_products_ajax/' + ChessiNO,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Model.value = data.product;
                    }
                });
            }
        });


        function getTemporarySalesItems() {
            var url = '{{ url('get_temporary_sales_items') }}';
            $.ajax({
                url: url,
                method: "GET",
                success: function(data) {
                    let sales_items = '';
                    var totalAmount = 0;
                    $.each(JSON.parse(data), function(key, value) {
                        totalAmount += value.qty * value.price;
                        let k = key + 1;
                        sales_items += '<tr>';
                        sales_items += '<td>' + k + '</td>' //Sr.No	


                        // Model 
                        sales_items += '<td>'
                        sales_items += value.products_table.product;
                        sales_items += '</td>'

                        // Chassis No.& Vehicle No
                        sales_items += '<td>'
                        sales_items += value.products_table.type;

                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][product_id]" value="' + value.products_table.id + '" required />'

                        sales_items += '</td>'

                        // Description
                        sales_items += '<td>'
                        sales_items += value.description;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][description]" value="' + value.description + '" required />'
                        sales_items += '</td>'

                        // Qty
                        sales_items += '<td>'
                        sales_items += value.qty;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][qty]" value="' + value.qty + '" required />'
                        sales_items += '</td>'

                        // Price	
                        sales_items += '<td>'
                        sales_items += value.price;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][price]" value="' + value.price + '" required />'
                        sales_items += '</td>'

                        // Amount
                        sales_items += '<td>'
                        sales_items += value.qty * value.price;
                        sales_items += '</td>'

                        // Action
                        sales_items += '<td>'
                        sales_items += '<a href="javascript:void(0);" class="remove_item" data-id="' +
                            value.id + '"> Remove</a>'
                        sales_items += '</td>'
                        sales_items += '</tr>';
                    });
                    $('#TemporarySalesItemsList').html(sales_items);
                    totalAmountShow.value = (totalAmount).toLocaleString('en');
                    totalAmountSave.value = totalAmount;
                }
            });
        }

        getTemporarySalesItems();

        // RemoveItem
        $(document).on("click", ".remove_item", function() {
            var id = $(this).data('id');
            $.ajax({
                url: `/temporary_sales_items_remove/${id}`,
                method: "GET",
                success: function(data) {
                    getTemporarySalesItems();
                }
            });
        });


        $('select[id="SupplierID"]').on('change', function() {
            var supplierID = $(this).val();
            if (supplierID) {
                $.ajax({
                    url: '/get_supplier_ajax/' + supplierID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Address.value = data.address;
                        Ph.value = data.phone;
                    }
                });
            }
        });

        function getSupplierAjaxAuto() {
            var supplierID = '{{ $purchase_order->supplier_id }}'
            if (supplierID) {
                $.ajax({
                    url: '/get_supplier_ajax/' + supplierID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Address.value = data.address;
                        Ph.value = data.phone;
                    }
                });
            }
        }
        getSupplierAjaxAuto();
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\UpdatePurchaseOrder', '#create-form') !!}
@endsection
