<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->nullable();
            $table->string('creative_preview');
            $table->tinyInteger('creative_type_id');
            $table->integer('spent')->nullable();
            $table->integer('click_through_rate')->nullable();;
            $table->integer('cost_bidding')->nullable();;
            $table->dateTime('period_from');
            $table->dateTime('period_to');
            $table->integer('ads_period_budget');
            $table->integer('ads_period_budget_from');
            $table->integer('ads_period_budget_to');
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
        Schema::dropIfExists('ads_detail');
    }
}
