<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdGroupsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_groups_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('period_from');
            $table->dateTime('period_to');
            $table->integer('ag_period_budget');
            $table->integer('ag_period_budget_from');
            $table->integer('ag_period_budget_to');
            $table->integer('std_daily_budget');
            $table->tinyInteger('std_bidding_method_id')->nullable();
            $table->integer('std_bidding_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_groups_detail');
    }
}
