<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loggers_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('time');
            $table->string('duration');
            $table->string('ip');
            $table->text('url');
            $table->text('method');
            $table->text('input');
            $table->text('headers');
            $table->text('response');
            $table->text('queries');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loggers_requests');
    }
}
