<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertiserAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertiser_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email',100)->unique();
            $table->string('account_name')->nullable();
            $table->integer('media_id')->nullable();
            $table->string('client_name')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('advertiser_accounts');
    }
}
