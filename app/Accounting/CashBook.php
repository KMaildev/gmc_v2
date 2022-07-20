<?php

namespace App\Accounting;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CashBook extends Model
{
    use LogsActivity;
    protected static $logName = 'cash_books_log';
    protected static $logAttributes = ['cash_book_date', 'month', 'year', 'iv_one', 'iv_two', 'description', 'cash_in', 'cash_out', 'bank_in', 'bank_out', 'created_at', 'updated_at'];

    public function chartof_account_table()
    {
        return $this->belongsTo(ChartofAccount::class, 'account_code_id', 'id');
    }

    public function account_types_table()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id', 'id');
    }

    public function get_bank_account()
    {
        return $this->belongsTo(ChartofAccount::class, 'bank_account', 'id');
    }


    public function get_cash_account()
    {
        return $this->belongsTo(ChartofAccount::class, 'cash_account_id', 'id');
    }
}
