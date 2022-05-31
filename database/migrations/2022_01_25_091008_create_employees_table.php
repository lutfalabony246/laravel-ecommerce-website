<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_id');
            $table->string('employee_office_id');
            $table->string('employee_name');
            $table->string('email_id' , 40) -> unique() ;
            $table->string('password')->nullable();
            $table->string('employee_img')->nullable();
            $table->string('employee_phone');
            $table->string('employee_fathers_name');
            $table->string('employee_mother_name');
            $table->string('employee_present_address');
            $table->string('employee_permanent_address');
            $table->integer('employee_salary');
            $table->string('designation');
            $table->date('employee_date_of_birth');
            $table->date('employee_joing_date');
            $table->integer('employee_status')->default(1);
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
        Schema::dropIfExists('employees');
    }
}
