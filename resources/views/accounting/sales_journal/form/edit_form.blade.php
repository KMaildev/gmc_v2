<form action="{{ route('sales_journal.update', $sales_journal_data->id) }}" method="POST" autocomplete="off"
    id="edit-form">
    @csrf
    @method('PUT')
    <tr>
        <td></td>

        <td>
            <select class="select2 form-select form-select-sm @error('sales_invoice_id') is-invalid @enderror"
                data-allow-clear="false" id="SalesInvoiceID" name="sales_invoice_id" required>
                <option value="">--Please Select Invoice No --</option>
                @foreach ($form_sales_invoices as $form_sales_invoice)
                    <option value="{{ $form_sales_invoice->id }}" @if ($form_sales_invoice->id == $sales_journal_data->sales_invoice_id) selected @endif>
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
                class="form-control-custom input-text-center form-control-sm date_picker  @error('sales_journal_date') is-invalid @enderror"
                name="sales_journal_date" style="width: 100%" value="{{ $sales_journal_data->sales_journal_date }}" />
            @error('sales_journal_date')
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
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('post_ref') is-invalid @enderror"
                name="post_ref" style="width: 100%" value="{{ $sales_journal_data->post_ref }}" />
            @error('post_ref')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>


        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('debited') is-invalid @enderror"
                name="debited" style="width: 100%" id="Debited" readonly value="0" />
            @error('debited')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('credited') is-invalid @enderror"
                name="credited" style="width: 100%" id="Credited" readonly value="0" />
            @error('credited')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <button type="submit" class="btn btn-primary btn-sm" style="width: 100%">Save</button>
        </td>
    </tr>
</form>

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateSalesJournal', '#edit-form') !!}
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

            var customerID = {{ $sales_journal_data->customer_id }};
            var SalesInvoicesID = {{ $sales_journal_data->sales_invoice_id }};
            get_customer_ajax(customerID);
            get_sales_items_ajax(SalesInvoicesID);
        });
    </script>
@endsection
