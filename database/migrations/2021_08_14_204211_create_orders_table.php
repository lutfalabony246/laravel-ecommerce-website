<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('division_id')->nullable();

            $table->string('totalitem')->nullable();
            $table->string('totalAmount')->nullable();
            $table->string('totalDiscount')->nullable();
            $table->string('spesial_discount')->nullable();
            $table->string('vat')->nullable();
            $table->string('cash_grand_tot')->nullable();
            $table->string('cashPaid_show')->nullable();
            $table->string('changeAmount')->nullable();


            $table->string('street_address')->nullable();
            $table->string('district_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('floor_no')->nullable();
            $table->string('appartment_no')->nullable();

            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->integer('post_code')->nullable();
            $table->text('notes')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency')->nullable();;
            $table->float('amount',8,2)->nullable();;
            $table->string('order_number')->nullable();
            $table->string('invoice_no');
            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');
            $table->string('confirmed_date')->nullable();
            $table->string('processing_date')->nullable();
            $table->string('picked_date')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('delivered_date')->nullable();
            $table->string('cancel_date')->nullable();
            $table->string('return_date')->nullable();
            $table->string('return_order')->default(0);
            $table->string('return_reason')->nullable();
            $table->string('delivery_date',100)->nullable();
            $table->string('delivery_time',100)->nullable();
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
}
