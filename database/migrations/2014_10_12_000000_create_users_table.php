<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('created_by')->nullable();
			$table->string('employee_id')->nullable();
			$table->string('name');
			$table->string('email', 100)->unique()->nullable();
			$table->string('password');
			$table->string('present_address')->nullable();
			$table->text('pf_number')->nullable();
			$table->text('academic_qualification')->nullable();
			$table->date('joining_date')->nullable();
			$table->tinyInteger('id_name')->nullable()->comment('1 for NID, 2 Passport, 3 for Driving License');
			$table->string('id_number')->nullable();
			$table->string('emergency_contact', 30)->nullable();
			$table->string('gender', 1)->nullable();
			$table->date('date_of_birth')->nullable();
			$table->tinyInteger('marital_status')->nullable()->comment('1 for Married, Single, 3 for Divorced, 4 for Separated, 5 for Widowed');
			$table->string('picture')->nullable();
			$table->integer('designation_id')->nullable();
			$table->integer('department_id')->nullable();
			$table->string('P')->default('0')->comment('P referes to sign in or sign out');
			$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
