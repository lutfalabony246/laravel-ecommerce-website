<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//Table: * expense_date *expense_type *expense_payment_type *expense_amount *expense_refrence * expense_img ** expense_img *description
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->date('expense_date');
            $table->string('expense_type');
            $table->string('expense_payment_type');
            $table->float('expense_amount');
            $table->string('expense_refrence');
            $table->string('expense_img')->nullable();
            $table->string('description');
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
        Schema::dropIfExists('expenses');
    }
}
