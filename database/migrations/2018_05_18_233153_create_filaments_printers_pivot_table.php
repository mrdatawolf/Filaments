<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilamentsPrintersPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filaments_printers', function (Blueprint $table) {
            $table->integer('filaments_id')->unsigned()->index();
            $table->foreign('filaments_id')->references('id')->on('filaments')->onDelete('cascade');
            $table->integer('printers_id')->unsigned()->index();
            $table->foreign('printers_id')->references('id')->on('printers')->onDelete('cascade');
            $table->primary(['filaments_id', 'printers_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('filaments_printers');
    }
}
