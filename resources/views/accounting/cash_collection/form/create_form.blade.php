<form action="{{ route('cash_collection.store') }}" method="POST" autocomplete="off" id="create-form">
    @csrf
    <tr>
        <td></td>


        <td>
            <select class="select2 form-select form-select-sm @error('sales_invoice_id') is-invalid @enderror"
                data-allow-clear="false" id="SalesInvoiceID" name="sales_invoice_id" required>
                <option value="">-- Invoice No --</option>
                @foreach ($form_sales_invoices as $form_sales_invoice)
                    <option value="{{ $form_sales_invoice->id }}">
                        {{ $form_sales_invoice->invoice_no }}
                    </option>
                @endforeach
            </select>
            @error('sales_invoice_id')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Date --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm date_picker  @error('cash_collection_date') is-invalid @enderror"
                name="cash_collection_date" style="width: 100%" />
            @error('cash_collection_date')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>


        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('customer_id') is-invalid @enderror"
                style="width: 100%" id="CustomerName" readonly />

            <input type="hidden" class="form-control-custom input-text-center form-control-sm" name="customer_id"
                style="width: 100%" id="CustomerID" required />
            @error('customer_id')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>


        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" name="post_ref"
                style="width: 100%" id="PostRef" />

            <input type="hidden"
                class="form-control-custom input-text-center form-control-sm @error('sales_journal_id') is-invalid @enderror"
                name="sales_journal_id" style="width: 100%" id="SaleJournalID" />
            @error('sales_journal_id')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>


        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('cash_debited') is-invalid @enderror"
                name="cash_debited" style="width: 100%" id="Debited" value="0" />
            @error('cash_debited')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>


        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('sale_discount_debited') is-invalid @enderror"
                name="sale_discount_debited" style="width: 100%" value="0" />
            @error('sale_discount_debited')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('credited') is-invalid @enderror"
                name="credited" style="width: 100%" id="Credited" value="0" />
            @error('credited')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td></td>

        <td>
            <button type="submit" class="btn btn-primary btn-sm" style="width: 100%">Save</button>
        </td>
    </tr>
</form>

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreCashCollection', '#create-form') !!}
    <script>
        $(document).ready(function() {

            $('select[id="SalesInvoiceID"]').on('change', function() {
                var SalesInvoiceID = $(this).val();
                if (SalesInvoiceID) {
                    $.ajax({
                        url: '/get_sales_invoices/' + SalesInvoiceID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            get_customer_ajax(data.customer_id)
                            get_sales_items_ajax(data.id)
                            get_sales_journals_ajax(data.id)
                        }
                    });
                }
            });


            function get_customer_ajax(customerID) {
                if (customerID) {
                    $.ajax({
                        url: '/get_customer_ajax/' + customerID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            CustomerName.value = data.name;
                            CustomerID.value = data.id;
                        }
                    });
                }
            }


            function get_sales_items_ajax(SalesInvoicesID) {
                if (SalesInvoicesID) {
                    $.ajax({
                        url: '/get_sales_items/' + SalesInvoicesID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            Debited.value = data;
                            Credited.value = data;
                        }
                    });
                }
            }

            function get_sales_journals_ajax(SalesInvoicesID) {
                if (SalesInvoicesID) {
                    $.ajax({
                        url: '/get_sales_journals/' + SalesInvoicesID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            PostRef.value = data.post_ref;
                            SaleJournalID.value = data.id;
                        }
                    });
                }
            }

        });
    </script>
@endsection
