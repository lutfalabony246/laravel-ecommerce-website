<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_dones', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('total_qty');
            $table->integer('total_amount');
            $table->integer('discount');
            $table->integer('grand_total');
            $table->integer('payment')->nullable();
            $table->integer('return_amount');
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
        Schema::dropIfExists('order_dones');
    }
}
