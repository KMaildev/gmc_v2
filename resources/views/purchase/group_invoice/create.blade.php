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
                                        <th style="color: white; text-align: center; width: 15%;">Purchase No</th>
                                        <th style="color: white; text-align: center; width: 7%;">Product Name</th>
                                        <th style="color: white; text-align: center; width: 7%;">Models</th>
                                        <th style="color: white; text-align: center; width: 10%;">Order Quantity</th>
                                        <th style="color: white; text-align: center; width: 10%;">Entry Quantity</th>
                                        <th style="color: white; text-align: center; width: 10%;">Amount USD</th>
                                        <th style="color: white; text-align: center; width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td></td>
                                    <td>
                                        <select class="form-select" id="PurchaseOrderId">
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
                                        <div id="Brand">
                                            <select class="form-select" style="width: 170px;">
                                                <option value="">--Please Select--</option>
                                            </select>
                                        </div>
                                    </td>

                                    {{-- Models --}}
                                    <td class="text-align">
                                        <div id="Models">
                                            <select class="form-select" style="width: 170px;">
                                                <option value="">--Please Select--</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
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
                        let models = '<select name="type_of_model_id" class="form-select">';
                        $.each(data.purchase_items, function(key, value) {
                            var id = value.id;
                            var model_title = value.type_of_models_table.title;
                            models += '<option value=' + id + '>' + model_title + '</option>';
                        });
                        models += '</select>';
                        $('#Models').html(models);




                        // Brand 
                        let brand = '<select name="type_of_model_id" class="form-select">';
                        $.each(data.purchase_items, function(k, value) {
                            var id = value.id;
                            var brand_name = value.brands_table.name;
                            brand += '<option value=' + id + '>' + brand_name + '</option>';
                        });
                        brand += '</select>';
                        $('#Brand').html(brand);
                    }

                });
            } else {
                let models = '<select class="form-select" style="width: 170px;">';
                models += '<option>--Please Select--</option>';
                models += '</select>';
                $('#Models').html(models);
            }
        });
    </script>
@endsection
