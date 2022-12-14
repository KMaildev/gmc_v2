<form class="store_cashbook">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            Cash Book Edit
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
                        class="form-control input-text-center form-control-sm date_picker @error('date') is-invalid @enderror"
                        name="date" id="cashDateField" required
                        value="{{ $edit_cash_book_data->cash_book_date }}" />
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </td>

                <td>
                    <input type="text"
                        class="form-control-custom input-text-center form-control-sm @error('month') is-invalid @enderror"
                        name="month" id="EditMonth" readonly required value="{{ $edit_cash_book_data->month }}" />
                    @error('month')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </td>

                <td>
                    <input type="text"
                        class="form-control-custom input-text-center form-control-sm @error('year') is-invalid @enderror"
                        name="year" id="EditYear" readonly required value="{{ $edit_cash_book_data->year }}" />
                    @error('year')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </td>

                <td>
                    <input type="text"
                        class="form-control-custom input-text-center form-control-sm @error('iv_one') is-invalid @enderror"
                        name="iv_one" value="{{ $edit_cash_book_data->iv_one }}" />
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
                    <input type="text" class="form-control-custom input-text-center form-control-sm" name="iv_two"
                        value="" />
                    @error('iv_two')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </td>

                {{-- Principle/Interest --}}
                <td>
                    <span id="PrincipleInterest">
                        <select class=" form-select form-select-sm" data-allow-clear="false" id="qPrincipleAndInterest">
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
                    <select class="form-select form-select-sm" data-allow-clear="false" name="purchase_order_id">
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
                    <select class="form-select form-select-sm" data-allow-clear="false" id="AccountCodeSelect">
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
                    <input type="text" class="form-control-custom input-text-center form-control-sm" id="accountHead"
                        readonly />
                </td>

                <td>
                    <input type="text" class="form-control-custom input-text-center form-control-sm" id="accountName"
                        readonly />
                </td>

                <td>
                    <input type="text"
                        class="form-control-custom input-text-center form-control-sm @error('description') is-invalid @enderror"
                        name="description" value="{{ $edit_cash_book_data->description }}" />
                    @error('description')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </td>


                <td>
                    <select class="form-select form-select-sm" data-allow-clear="false" id="CashAccountSelect">
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
                        name="cash_in" value="{{ $edit_cash_book_data->cash_in }}" />
                    @error('cash_in')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </td>

                <td>
                    <input type="text"
                        class="form-control-custom input-text-center form-control-sm @error('cash_out') is-invalid @enderror"
                        name="cash_out" value="{{ $edit_cash_book_data->cash_out }}" />
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
                    <select class="form-select form-select-sm" data-allow-clear="false" id="BankAccountSelect">
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
                        name="bank_in" value="{{ $edit_cash_book_data->bank_in }}" />
                    @error('bank_in')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </td>

                <td>
                    <input type="text"
                        class="form-control-custom input-text-center form-control-sm @error('bank_out') is-invalid @enderror"
                        name="bank_out" value="{{ $edit_cash_book_data->bank_out }}" />
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
