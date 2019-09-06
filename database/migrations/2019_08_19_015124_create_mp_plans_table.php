<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mp_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('media_id');
            $table->bigInteger('campaign_id');
            $table->bigInteger('ad_group_id')->nullable();
            $table->string('area_name');
            $table->dateTime('period_from');
            $table->dateTime('period_to');
            $table->tinyInteger('flag_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mp_plans');
    }
}
