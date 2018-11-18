<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_service_id')->unsigned()->index();
            $table->foreign('sub_service_id')->references('id')->on('sub_services')->onDelete('cascade');
            $table->integer('color_id')->unsigned()->index()->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->integer('image_id')->unsigned()->index()->nullable();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->integer('class_id')->unsigned()->index()->nullable();
            $table->foreign('class_id')->references('id')->on('class_cats')->onDelete('cascade');
            $table->integer('free_service_id')->unsigned()->index()->nullable();
            $table->foreign('free_service_id')->references('id')->on('free_services')->onDelete('cascade');
            $table->integer('client_id')->unsigned()->index()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->string('price')->nullable();
            $table->boolean('discount_request')->default('0');
            $table->string('discount')->nullable();
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
        Schema::dropIfExists('client_requests');
    }
}
