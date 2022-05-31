<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('brand')->nullable();
            $table->string('category')->nullable();
            $table->string('product')->nullable();
            $table->string('slider')->nullable();
            $table->string('cupons')->nullable();
            $table->string('banner')->nullable();
            $table->string('shipping')->nullable();
            $table->string('returnorder')->nullable();
            $table->string('review')->nullable();
            $table->string('pos')->nullable();
            $table->string('orders')->nullable();
            $table->string('stock')->nullable();
            $table->string('alluser')->nullable();
            $table->string('reports')->nullable();
            $table->string('setting')->nullable();
            $table->string('adminuserrole')->nullable();
            $table->string('employee')->nullable();
            $table->string('supplier')->nullable();
            $table->string('department')->nullable();
            $table->string('employee_salary')->nullable();
            $table->string('purchase')->nullable();
             $table->string('supplier_dashboard')->nullable();
             $table->string('admin_dashboard')->nullable();
             $table->string('websetting')->nullable();
            $table->string('expence')->nullable();
            $table->string('banner_caregory')->nullable();
            $table->integer('type')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
