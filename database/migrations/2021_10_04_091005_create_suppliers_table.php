<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplyer_id_code');
            $table->string('supplyer_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('supplyer_email')->nullable();
            $table->string('supplyer_phone')->nullable();
            $table->string('supplyer_phone2')->nullable();
            $table->longText('supplyer_bank_info')->nullable();
            $table->longText('supplyer_mobile_bank_info')->nullable();
            $table->longText('supplyer_address')->nullable();
            $table->string('supplyer_photo')->nullable();
            $table->string('supplyer_status')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
