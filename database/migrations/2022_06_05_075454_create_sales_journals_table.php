<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_journals', function (Blueprint $table) {
            $table->increments('id');
            $table->text('sales_journal_date')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('sales_invoice_id')->nullable();
            $table->text('post_ref')->nullable();
            $table->text('debited')->nullable();
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
        Schema::dropIfExists('sales_journals');
    }
}
