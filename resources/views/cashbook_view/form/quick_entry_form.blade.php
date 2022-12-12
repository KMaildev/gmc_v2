<div class="modal fade" id="quickEntryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <form class="store_cashbook">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Cash Book Entry
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="" style="margin-bottom: 2px; width: 100%;">
                        <thead>
                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Date
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Month
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Year
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                IV-No
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Sale Type
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                IV-No2
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Principle/Interest/Other
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Purchase IV
                            </th>
                        </thead>

                        <tbody>
                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm date_picker @error('date') is-invalid @enderror"
                                    name="date" id="cashDateField" required />
                                @error('date')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm @error('month') is-invalid @enderror"
                                    name="month" id="Month" readonly required />
                                @error('month')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm @error('year') is-invalid @enderror"
                                    name="year" id="Year" readonly required />
                                @error('year')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm @error('iv_one') is-invalid @enderror"
                                    name="iv_one" />
                                @error('iv_one')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            {{-- Sale Type --}}
                            <td>
                                <select class="form-select form-select-sm" id="SaleType">
                                    <option value="">-- Sale Type --</option>
                                    <option value="dealer">Dealer Invoice</option>
                                    <option value="hp">HP Invoice</option>
                                    <option value="cash_sale">Cash Sale Invoice</option>
                                    <option value="purchase_orders">Purchase Invoice</option>
                                </select>
                            </td>

                            <!-- INV TWO -->
                            <td>
                                <select class="form-select form-select-sm" data-allow-clear="false" id="SaleInvoiceId">
                                    <option value="">--Select Invoice --</option>
                                </select>
                                @error('account_code')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td hidden>
                                <input type="text" class="form-control-custom input-text-center form-control-sm"
                                    name="iv_two" value="" />
                                @error('iv_two')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            {{-- Principle/Interest --}}
                            <td>
                                <span id="PrincipleInterest">
                                    <select class=" form-select form-select-sm" data-allow-clear="false"
                                        id="qPrincipleAndInterest">
                                        <option value="">-- Select Type --</option>
                                        <option value="down_payment">Down Payment</option>
                                        <option value="Principle">Principle</option>
                                        <option value="Interest">Interest</option>
                                        <option value="service_fee">Service Fee</option>
                                    </select>
                                </span>
                            </td>

                            {{-- Purchase Invoice --}}
                            <td>
                                <select class="form-select form-select-sm" data-allow-clear="false"
                                    name="purchase_order_id">
                                    <option value="">-- Select Pruchase IV --</option>
                                    @foreach ($purchase_orders as $purchase_order)
                                        <option value="{{ $purchase_order->id }}">
                                            {{ $purchase_order->purchase_no ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tbody>
                    </table>

                    <table class="" style="margin-bottom: 2px; width: 100%;">
                        <thead>
                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                A/C Code
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                A/C Head
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                A/C Name
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Description
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Cash AC
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Cash-In
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Cash-Out
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Balance
                            </th>
                        </thead>

                        <tbody>
                            <td>
                                <select class="form-select form-select-sm" data-allow-clear="false"
                                    id="AccountCodeSelect">
                                    <option value="">--Select A/C Code --</option>
                                    @foreach ($chartof_accounts as $chartof_account)
                                        <option value="{{ $chartof_account->id }}">
                                            {{ $chartof_account->coa_number }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('account_code')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td>
                                <input type="text" class="form-control-custom input-text-center form-control-sm"
                                    id="accountHead" readonly />
                            </td>

                            <td>
                                <input type="text" class="form-control-custom input-text-center form-control-sm"
                                    id="accountName" readonly />
                            </td>

                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm @error('description') is-invalid @enderror"
                                    name="description" />
                                @error('description')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>


                            <td>
                                <select class="form-select form-select-sm" data-allow-clear="false"
                                    id="CashAccountSelect">
                                    <option value="">--Please Select Cash --</option>
                                    @foreach ($chartof_accounts as $chartof_account)
                                        @if ($chartof_account->id == 1)
                                            <option value="{{ $chartof_account->id }}">
                                                {{ $chartof_account->coa_number }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('cash_account')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm  @error('cash_in') is-invalid @enderror"
                                    name="cash_in" value="0" />
                                @error('cash_in')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm @error('cash_out') is-invalid @enderror"
                                    name="cash_out" value="0" />
                                @error('cash_out')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td></td>
                        </tbody>
                    </table>

                    <table style="margin-bottom: 2px; width: 100%;">
                        <thead>
                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Bank AC
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Bank-In
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Bank-Out
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Bank-Balance
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Deposit(Cash+Bank)
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Withdraw(Cash+Bank)
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Bank Name
                            </th>
                        </thead>

                        <tbody>
                            <td>
                                <select class="form-select form-select-sm" data-allow-clear="false"
                                    id="BankAccountSelect">
                                    <option value="">--Please Select Bank --</option>
                                    @foreach ($chartof_accounts as $chartof_account)
                                        @if ($chartof_account->chartof_account_id == 2)
                                            <option value="{{ $chartof_account->id }}">
                                                {{ $chartof_account->coa_number }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('bank_account')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm @error('bank_in') is-invalid @enderror"
                                    name="bank_in" value="0" />
                                @error('bank_in')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm @error('bank_out') is-invalid @enderror"
                                    name="bank_out" value="0" />
                                @error('bank_out')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                                <input type="text" class="form-control-custom input-text-center" id="bankName" />
                            </td>

                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

                <input type="hidden" class="form-control" id="account_type_id" name="account_type_id" />
                <input type="hidden" name="account_code" id="AccountCode">
                <input type="hidden" name="cash_account" id="CashAccount">
                <input type="hidden" name="bank_account" id="BankAccount">
                <input type="hidden" name="sales_invoice_id" id="SaleInvoiceIdValue" value="0">
                <input type="hidden" name="sale_type" id="SaleTypeValue">
                <input type="hidden" name="principle_interest" id="qPrincipleAndInterestValue">
            </form>
        </div>
    </div>

</div>

<script script type="text/javascript">
    var accountHead = document.getElementById("qaccountHead");
    var accountName = document.getElementById("qaccountName");
    var bankName = document.getElementById("qbankName");
    var QMonth = document.getElementById("qMonth");
    var Year = document.getElementById("qYear");
    var account_type_id = document.getElementById("qaccount_type_id");
    var AccountCode = document.getElementById("qAccountCode");
    var CashAccount = document.getElementById("qCashAccount");
    var BankAccount = document.getElementById("qBankAccount");

    $(document).ready(function() {
        $('select[id="AccountCodeSelect"]').on('change', function() {
            var mainAccountCode = $(this).val();
            AccountCode.value = mainAccountCode;
            if (mainAccountCode) {
                $.ajax({
                    url: '/chartofaccountdependent/ajax/' + mainAccountCode,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        accountName.value = data.description;
                        getAccountType(data.account_type_id);
                    }
                });
            }

        });
    });

    function getAccountType(id) {
        var accountTypeId = id;
        if (accountTypeId) {
            $.ajax({
                url: '/accounttypedependent/ajax/' + accountTypeId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    accountHead.value = data.description;
                    account_type_id.value = data.id;
                }
            });
        }
    }


    $(document).ready(function() {
        $('select[id="CashAccountSelect"]').on('change', function() {
            CashAccount.value = $(this).val();
        });
    });


    $(document).ready(function() {
        $('select[id="SaleInvoiceId"]').on('change', function() {
            SaleInvoiceIdValue.value = $(this).val();
        });
    });


    $(document).ready(function() {
        $('select[id="BankAccountSelect"]').on('change', function() {
            var mainAccountCode = $(this).val();
            BankAccount.value = mainAccountCode;
            if (mainAccountCode) {
                $.ajax({
                    url: '/chartofaccountdependent/ajax/' + mainAccountCode,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        bankName.value = data.description;
                    }
                });
            }

        });
    });


    $(document).ready(function() {
        function getCashBookDate(e) {
            var dateArr = e.srcElement.value.split('-');
            if (dateArr.length > 1) {
                QMonth.value = dateArr[1];
                Year.value = dateArr[0];
                console.log(dateArr[1] + '/' + dateArr[2] + '/' + dateArr[0]);
            }
        }
        document.getElementById("qcashDateField").addEventListener("blur", getCashBookDate)
    });


    $(document).ready(function() {
        $('select[id="SaleType"]').on('change', function() {
            var SaleTypeValue = $(this).val();
            document.getElementById("SaleTypeValue").value = SaleTypeValue;

            if (SaleTypeValue === 'hp') {
                $("#qPrincipleInterest").show();
            } else {
                $("#qPrincipleInterest").hide();
            }

            $.ajax({
                url: '/get_sales_invoices_ajax/' + SaleTypeValue,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $('#SaleInvoiceId').empty();
                        $('#SaleInvoiceId').append($('<option>', {
                            text: "--Please Select Invoice--"
                        }));
                        $.each(data, function(key, value) {
                            $('#SaleInvoiceId').append($('<option>', {
                                value: value.id,
                                text: value.invoice_no
                            }));
                        });
                    } else {
                        $('#SaleInvoiceId').empty();
                    }
                }
            });
        });
        $("#qPrincipleInterest").hide();
    });

    $(document).ready(function() {
        $('select[id="PrincipleAndInterest"]').on('change', function() {
            document.getElementById("qPrincipleAndInterestValue").value = $(this).val();
        });
    });

    $('.store_cashbook').submit(function(e) {
        e.preventDefault();
        let form = $(this);
        const cash_book_date = form.find("input[name=date]").val();
        const month = form.find("input[name=month]").val();
        const year = form.find("input[name=year]").val();
        const iv_one = form.find("input[name=iv_one]").val();
        const iv_two = form.find("input[name=iv_two]").val();
        const account_code_id = form.find("input[name=account_code]").val();
        const account_type_id = form.find("input[name=account_type_id]").val();
        const description = form.find("input[name=description]").val();
        const cash_account_id = form.find("input[name=cash_account]").val();
        const bank_account = form.find("input[name=bank_account]").val();
        const cash_in = form.find("input[name=cash_in]").val();
        const cash_out = form.find("input[name=cash_out]").val();
        const bank_in = form.find("input[name=bank_in]").val();
        const bank_out = form.find("input[name=bank_out]").val();
        const sales_invoice_id = form.find("input[name=sales_invoice_id]").val();
        const sale_type = form.find("input[name=sale_type]").val();
        const principle_interest = form.find("input[name=principle_interest]").val();
        const purchase_order_id = form.find("input[name=purchase_order_id]").val();

        if (cash_book_date == null || cash_book_date == "" || month == null || month == "" || year == null ||
            year == "") {
            error_alert('Something went wrong please try again.')
            return false;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = '{{ url('cash_book_ajax_store') }}';
        $.ajax({
            method: 'POST',
            url: url,
            data: {
                "_token": "{{ csrf_token() }}",
                cash_book_date: cash_book_date,
                month: month,
                year: year,
                iv_one: iv_one,
                iv_two: iv_two,
                account_code_id: account_code_id,
                account_type_id: account_type_id,
                description: description,
                cash_account_id: cash_account_id,
                bank_account: bank_account,
                cash_in: cash_in,
                cash_out: cash_out,
                bank_in: bank_in,
                bank_out: bank_out,
                sales_invoice_id: sales_invoice_id,
                sale_type: sale_type,
                rinciple_interest: principle_interest,
                purchase_order_id: purchase_order_id,
            },
            success: function(data) {
                success_alert('Your processing has been completed.')
            },
            error: function(data) {
                console.log(data)
            }
        });
    })
</script>
