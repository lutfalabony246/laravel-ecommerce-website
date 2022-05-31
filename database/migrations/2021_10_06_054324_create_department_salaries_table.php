<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id')->nullable();
            $table->integer('employee_id')->nullable();
            $table->integer('paid_salary')->nullable();
            $table->integer('due_salary')->nullable();
            $table->integer('advance_salary')->nullable();
            $table->date('salary_date')->nullable();
            $table->integer('total_salary')->nullable();
            $table->integer('bonus')->nullable();
            $table->date('advance_salary_date')->nullable();
            $table->string('added_by')->nullable();

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
        Schema::dropIfExists('department_salaries');
    }
}


