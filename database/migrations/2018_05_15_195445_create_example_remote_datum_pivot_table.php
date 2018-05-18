<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExampleRemoteDatumPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('example_remote_datum', function (Blueprint $table) {
            $table->integer('example_id')->unsigned()->index();
            $table->foreign('example_id')->references('id')->on('examples')->onDelete('cascade');
            $table->integer('remote_datum_id')->unsigned()->index();
            $table->foreign('remote_datum_id')->references('id')->on('remote_data')->onDelete('cascade');
            $table->primary(['example_id', 'remote_datum_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('example_remote_datum');
    }
}
