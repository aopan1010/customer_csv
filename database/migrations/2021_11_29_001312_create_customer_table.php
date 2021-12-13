<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->date('date');
            $table->integer('classification');
            $table->integer('red');
            $table->string('customer_code');
            $table->string('customer_name');
            $table->integer('tax');
            $table->integer('tax_classification');
            $table->integer('manager');
            $table->string('customer_code2');
            $table->string('customer_name2');
            $table->date('expected_billing_date');
            $table->integer('item_number');
            $table->integer('item_classification');
            $table->string('item_code');
            $table->string('item_name');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('purchasing_price');
            $table->integer('billing_amount');
            $table->integer('sticky_note1');
            $table->integer('sticky_note2');
            $table->string('advance_payment');
            $table->string('deposit_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
