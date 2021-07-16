<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uri');
            $table->string('method');
            $table->string('controllerMethod');
            $table->text('middleware');
            $table->text('headers');
            $table->text('payload');
            $table->unsignedInteger('responseCode');
            $table->text('response');
            $table->unsignedBigInteger('duration');
            $table->unsignedInteger('memory');
            $table->ipAddress('ip');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_logs');
    }
}
