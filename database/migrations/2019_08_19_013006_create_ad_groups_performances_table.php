<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdGroupsPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_groups_performances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('campaign_id');
            $table->string('campaign_name');
            $table->integer('ad_group_id');
            $table->string('ad_group_name');
            $table->dateTime('report_datetime');
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
        Schema::dropIfExists('ad_groups_performances');
    }
}
