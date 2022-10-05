@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-12 col-12 mb-lg-0 mb-4">
            <form action="{{ route('purchase_order.store') }}" method="POST" autocomplete="off" id="create-form">
                @csrf
                <div class="card invoice-preview-card">
                    <div class="card-body">

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Invoice No.
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('purchase_no') is-invalid @enderror"
                                                value="{{ old('purchase_no') }}" name="purchase_no">
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
                                                value="{{ old('purchase_date') }}" name="purchase_date">
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
                                        <th style="color: white; text-align: center; width: 5%;">Purchase No</th>
                                        <th style="color: white; text-align: center; width: 7%;">Product Name</th>
                                        <th style="color: white; text-align: center; width: 7%;">Models</th>
                                        <th style="color: white; text-align: center; width: 7%;">Order Quantity</th>
                                        <th style="color: white; text-align: center; width: 7%;">Entry Quantity</th>
                                        <th style="color: white; text-align: center; width: 10%;">CIF Yangon(USD)</th>
                                        <th style="color: white; text-align: center; width: 10%;">Amount USD</th>
                                        <th style="color: white; text-align: center; width: 10%;">Description</th>
                                        <th style="color: white; text-align: center; width: 5%;">Action</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td></td>

                                    {{-- Purchase No --}}
                                    <td>
                                        <select class="form-select" id="PurchaseOrderId" style="width: 200px;">
                                            <option value="">--Select Purchase No --</option>
                                            @foreach ($purchase_orders as $purchase_order)
                                                <option value="{{ $purchase_order->id }}">
                                                    {{ $purchase_order->purchase_no ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </td>

                                    {{-- Product Name --}}
                                    <td>
                                        <input type="text" id="ProductName" class="form-control" readonly>
                                        <input type="hidden" id="BrandId" class="form-control" readonly>
                                    </td>

                                    {{-- Models --}}
                                    <td>
                                        <div id="Models"></div>
                                    </td>


                                    {{-- Order Quantity --}}
                                    <td>
                                        <input type="text" id="OrderQuantity" class="form-control" readonly
                                            style="text-align: right">
                                    </td>


                                    {{-- Entry Quantity --}}
                                    <td>
                                        <input type="text" class="form-control" style="text-align: right"
                                            id="EntyQuantity" oninput="SetCalculator()">
                                    </td>

                                    {{-- CIF Yangon(USD) --}}
                                    <td>
                                        <input type="text" class="form-control" style="text-align: right"
                                            oninput="SetCalculator()" id="CIFUSD">
                                    </td>

                                    {{-- Amount USD --}}
                                    <td>
                                        <input type="text" class="form-control" style="text-align: right"
                                            id="TotalAmountUSD">
                                    </td>


                                    {{-- Description --}}
                                    <td>
                                        <input type="text" class="form-control" style="text-align: right"
                                            id="Description">
                                    </td>

                                    <td>
                                        <input type="button" value="Add" class="btn btn-sm btn-primary"
                                            onclick="setPurchaseGroupInvoiceCart()">
                                    </td>
                                </tr>

                                <tbody id="TemporaryPurchaseItemsList">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('select[id="PurchaseOrderId"]').on('change', function() {
            var PurchaseOrderId = $(this).val();
            if (PurchaseOrderId) {
                $.ajax({
                    url: '/get_purchase_items_ajax/' + PurchaseOrderId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // Product Name
                        document.getElementById("ProductName").value = data.purchase_item.brands_table
                            .name;
                        document.getElementById("BrandId").value = data.purchase_item.brand_id;


                        // Models
                        let models =
                            '<select class="form-select" id="purchaseItemId" onchange="getPurchaseItemDetail()">';
                        models += '<option value="">--Please Select--</option>';
                        $.each(data.purchase_items, function(key, value) {
                            var id = value.id;
                            var model_title = value.type_of_models_table.title;
                            models += '<option value=' + id + '>' + model_title + '</option>';
                        });
                        models += '</select>';
                        $('#Models').html(models);
                    }
                });
            }
        });

        function getPurchaseItemDetail() {
            var purchaseItemId = document.getElementById("purchaseItemId").value;
            $.ajax({
                url: '/get_purchase_item_detail_ajax/' + purchaseItemId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    document.getElementById("OrderQuantity").value = data.purchase_item.qty;
                }
            });
        }

        // Qty * Price
        function SetCalculator() {
            var Qty = document.getElementById("EntyQuantity").value;
            var CIFUSD = document.getElementById("CIFUSD").value;
            var AmountTotal = Qty * CIFUSD;
            TotalAmountUSD.value = AmountTotal;
        }

        function setPurchaseGroupInvoiceCart() {
            var PurchaseOrderId = document.getElementById("PurchaseOrderId").value;
            var purchaseItemId = document.getElementById("purchaseItemId").value;

            var EntyQuantity = document.getElementById("EntyQuantity").value;
            var CIFUSD = document.getElementById("CIFUSD").value;
            var Description = document.getElementById("Description").value;


            if (PurchaseOrderId == null || PurchaseOrderId == "") {
                alert("Please Select Purchase No");
                return false;
            } else if (purchaseItemId == null || purchaseItemId == "") {
                alert("Please Select Models");
                return false;
            }

            var url = '{{ url('store_temporary_purchase_group_item') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    purchase_order_id: PurchaseOrderId,
                    purchase_item_id: purchaseItemId,
                    qty: EntyQuantity,
                    cif_usd: CIFUSD,
                    description: Description,
                },
                success: function(data) {
                    getTemporaryPurchaseGroupItems();
                },
                error: function(data) {}
            });
        }

        function getTemporaryPurchaseGroupItems() {
            var url = '{{ url('get_temporary_purchase_group_item') }}';
            $.ajax({
                url: url,
                method: "GET",
                success: function(data) {
                    let sales_items = '';
                    var totalAmount = 0;
                    $.each(JSON.parse(data), function(key, value) {
                        totalAmount += value.qty * value.cif_usd;
                        let k = key + 1;
                        sales_items += '<tr>';
                        sales_items += '<td>' + k + '</td>' //Sr.No	

                        // Purchase No
                        sales_items += '<td>'
                        sales_items += value.purchase_order_table.purchase_no;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][purchase_order_id]" value="' + value.purchase_order_id +
                            '" required />'
                        sales_items += '</td>'

                        // Product Name	 
                        sales_items += '<td>'
                        sales_items += value.brands_table.name;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][brand_id]" value="' + value.brand_id + '" required />'
                        sales_items += '</td>'

                        // Models
                        sales_items += '<td>'
                        sales_items += value.type_of_models_table.title;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][type_of_model_id]" value="' + value.type_of_model_id + '" required />'
                        sales_items += '</td>'


                        // Order Quantity	
                        sales_items += '<td>'
                        sales_items += value.purchase_item.qty;
                        sales_items += '</td>'


                        // Entry Quantity	
                        sales_items += '<td>'
                        sales_items += value.qty;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][brand_id]" value="' + value.qty + '" required />'
                        sales_items += '</td>'


                        // CIF Yangon ( USD )		
                        sales_items += '<td>'
                        sales_items += value.cif_usd;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][cif_usd]" value="' + value.cif_usd + '" required />'
                        sales_items += '</td>'

                        // Amount USD	
                        sales_items += '<td>'
                        sales_items += value.qty * value.cif_usd;
                        sales_items += '</td>'


                        // Description
                        sales_items += '<td>'
                        sales_items += value.description;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][description]" value="' + value.description + '" required />'
                        sales_items += '</td>'

                        // Action
                        sales_items += '<td>'
                        sales_items += '<a href="javascript:void(0);" class="remove_item" data-id="' +
                            value.id + '"> Remove</a>'
                        sales_items += '</td>'
                        sales_items += '</tr>';
                    });
                    $('#TemporaryPurchaseItemsList').html(sales_items);
                    totalAmountShow.value = (totalAmount).toLocaleString('en');
                    totalAmountSave.value = totalAmount;
                }
            });
        }
        getTemporaryPurchaseGroupItems();


        // RemoveItem
        $(document).on("click", ".remove_item", function() {
            var id = $(this).data('id');
            $.ajax({
                url: `/remove_temporary_purchase_group_items/${id}`,
                method: "GET",
                success: function(data) {
                    getTemporaryPurchaseGroupItems();
                }
            });
        });
    </script>
@endsection
