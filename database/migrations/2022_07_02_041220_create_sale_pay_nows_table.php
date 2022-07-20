<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePayNowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_pay_nows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sales_invoice_id')->nullable();
            $table->integer('sales_invoices_payment_id')->nullable();
            $table->integer('receive_by')->nullable();
            $table->text('payment_status')->nullable();
            $table->text('payment_time')->nullable();
            $table->text('remark')->nullable();
            $table->text('received_date')->nullable();
            $table->text('pay_amount')->nullable();
            $table->text('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_pay_nows');
    }
}
