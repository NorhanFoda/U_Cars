<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('class_cat_id')->unsigned()->index();
            $table->foreign('class_cat_id')->references('id')->on('class_cats')->onDelete('cascade');
            $table->integer('sub_service_id')->unsigned()->index()->nullable();
            $table->foreign('sub_service_id')->references('id')->on('sub_services')->onDelete('cascade');
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
        Schema::dropIfExists('class_types');
    }
}
