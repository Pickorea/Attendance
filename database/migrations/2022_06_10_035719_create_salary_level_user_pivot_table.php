<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalaryLevelUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_level_user', function (Blueprint $table) {
            $table->integer('salary_level_id')->index()->unsigned();
            // $table->foreign('salary_level_id')->references('id')->on('salary_levels')->onDelete('cascade');
            $table->integer('user_id')->index()->unsigned();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('leave_entitlement');
            $table->primary(['salary_level_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_level_user');
    }
}
