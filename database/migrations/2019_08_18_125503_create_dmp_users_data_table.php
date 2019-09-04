<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmpUsersDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmp_users_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->smallInteger('age');
            $table->tinyInteger('gender');
            $table->string('domain');
            $table->string('product');
            $table->integer('view');
            $table->integer('buy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dmp_users_data');
    }
}
