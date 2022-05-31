<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals_times', function (Blueprint $table) {
            $table->id();
            $table->date('hot_deals')->nullable();
            $table->date('special_deals')->nullable();
            $table->date('special_offer')->nullable();
            $table->date('featured')->nullable();
            $table->unsignedBigInteger('product_id');
            
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
        Schema::dropIfExists('deals_times');
    }
}
