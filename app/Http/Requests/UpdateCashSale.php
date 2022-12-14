<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCashSale extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sales_invoices_payments_id' => 'required',

            'customer_id' => 'required',
            'invoice_no' => 'required',
            'invoice_date' => 'required',
            'showroom_name' => 'required',
            'sales_type' => 'required',
            'payment_team' => 'required',
            'post_ref' => 'required',

            'productFields.*.product_id' => 'required',
            'productFields.*.qty' => 'required|numeric',
            'productFields.*.price' => 'required|numeric',

            'sales_persons_id' => 'required',
            'delivery_date' => 'required',

            'balance_to_pay' => "numeric",
            'balance_to_pay_date' => "required",
            'discount' => "numeric",
        ];
    }
}
