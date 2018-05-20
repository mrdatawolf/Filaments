<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintersTypesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printers_types', function (Blueprint $table) {
            $table->integer('printers_id')->unsigned()->index();
            $table->foreign('printers_id')->references('id')->on('printers')->onDelete('cascade');
            $table->integer('types_id')->unsigned()->index();
            $table->foreign('types_id')->references('id')->on('types')->onDelete('cascade');
            $table->primary(['printers_id', 'types_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('printers_types');
    }
}
