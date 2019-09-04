<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdGroupsPerformanceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_groups_performance_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('actual_impressions');
            $table->integer('actual_cost');
            $table->integer('actual_clicks');
            $table->integer('actual_views');
            $table->integer('actual_25per_completions')->nullable();
            $table->integer('actual_50per_completions')->nullable();
            $table->integer('actual_75per_completions')->nullable();
            $table->integer('actual_100per_completions')->nullable();
            $table->integer('actual_sum_of_skips')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_groups_performance_detail');
    }
}
