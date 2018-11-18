<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreeServiceSubServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_service_sub_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_service_id')->unsigned()->index();
            $table->foreign('sub_service_id')->references('id')->on('sub_services')->onDelete('cascade');
            $table->integer('free_service_id')->unsigned()->index();
            $table->foreign('free_service_id')->references('id')->on('sub_services')->onDelete('cascade');
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
        Schema::dropIfExists('free_service_sub_service');
    }
}
