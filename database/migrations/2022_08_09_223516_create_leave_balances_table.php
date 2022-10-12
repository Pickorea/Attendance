<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_balances', function (Blueprint $table) {
            $table->id();
            $table->integer('leave_category_id');
            $table->integer('created_by');
            // $table->integer('employee_id');
            $table->integer('year')->comment('There will be one record per employee + year + type of leave (vacation/sick/...) Year number probably means the calendar year stored as an integer.,');
            $table->integer('total_leave_balance')->nullable();
            // $table->integer('leave_eligibility')->comment('leave days allowed');
            $table->integer('total_leave_taken')->comment('derived by sum of leave taken that falls within the year,');
            // $table->integer('total_leave_balance')->comment('leave_eligibility - total leave taken is equal leave balance,');
			// $table->tinyInteger('publication_status')->default(0);
			// $table->tinyInteger('deletion_status')->default(0);
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
        Schema::dropIfExists('leave_balances');
    }
}
