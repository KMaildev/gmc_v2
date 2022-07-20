<link rel="stylesheet" href="{{ asset('assets/css/cash_book_form.css') }}" />
<form action="{{ route('cashbook.store') }}" method="POST" autocomplete="off" id="create-form">
    @csrf
    <tr>
        <td></td>
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm date_picker @error('date') is-invalid @enderror"
                name="date" id="cashDateField" />
            @error('date')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('month') is-invalid @enderror"
                name="month" id="Month" readonly />
            @error('month')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('year') is-invalid @enderror"
                name="year" id="Year" readonly />
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

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('iv_two') is-invalid @enderror"
                name="iv_two" />
            @error('iv_two')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="AccountCodeSelect">
                <option value="">--Please Select A/C Code --</option>
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
            <center>
                <input type="text"
                    class="form-control-custom input-text-center form-control-sm @error('description') is-invalid @enderror"
                    name="description" style="padding-left: 100px; padding-right: 100px" />
                @error('description')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </center>
        </td>


        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="CashAccountSelect">
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

        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="BankAccountSelect">
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

        <td>
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </td>

    </tr>

    <input type="hidden" class="form-control" id="account_type_id" name="account_type_id" />
    <input type="hidden" name="account_code" id="AccountCode">
    <input type="hidden" name="cash_account" id="CashAccount">
    <input type="hidden" name="bank_account" id="BankAccount">
</form>

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreCashBook', '#create-form') !!}

    <script script type="text/javascript">
        var accountHead = document.getElementById("accountHead");
        var accountName = document.getElementById("accountName");
        var bankName = document.getElementById("bankName");
        var Month = document.getElementById("Month");
        var Year = document.getElementById("Year");
        var account_type_id = document.getElementById("account_type_id");
        var AccountCode = document.getElementById("AccountCode");
        var CashAccount = document.getElementById("CashAccount");
        var BankAccount = document.getElementById("BankAccount");

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
                    Month.value = dateArr[1];
                    Year.value = dateArr[0];
                    console.log(dateArr[1] + '/' + dateArr[2] + '/' + dateArr[0]);
                }
            }
            document.getElementById("cashDateField").addEventListener("blur", getCashBookDate)
        });
    </script>
@endsection
