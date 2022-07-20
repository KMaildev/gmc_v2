<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cash_collection_date')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('sales_invoice_id')->nullable();
            $table->integer('sales_journal_id')->nullable();
            $table->text('cash_debited')->nullable();
            $table->text('sale_discount_debited')->nullable();
            $table->text('credited')->nullable();
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
        Schema::dropIfExists('cash_collections');
    }
}
