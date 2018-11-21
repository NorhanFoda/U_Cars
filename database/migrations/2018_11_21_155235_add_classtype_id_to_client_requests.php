<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClasstypeIdToClientRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_requests', function (Blueprint $table) {

          $table->integer('classtype_id')->unsigned()->index()->nullable();
          $table->foreign('classtype_id')->references('id')->on('class_types')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_requests', function (Blueprint $table) {
            //
        });
    }
}
