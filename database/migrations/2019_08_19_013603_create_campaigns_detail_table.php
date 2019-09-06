<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class
CreateCampaignsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->nullable();
            $table->integer('kpi')->nullable();
            $table->tinyInteger('objective_id');
            $table->dateTime('period_from');
            $table->dateTime('period_to');
            $table->tinyInteger('budget_type_id');
            $table->integer('campaign_period_budget');
            $table->integer('std_daily_budget');
            $table->tinyInteger('std_bidding_method_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns_detail');
    }
}
