<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilamentPrinterPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filament_printer', function (Blueprint $table) {
            $table->integer('filament_id')->unsigned()->index();
            $table->foreign('filament_id')->references('id')->on('filaments')->onDelete('cascade');
            $table->integer('printer_id')->unsigned()->index();
            $table->foreign('printer_id')->references('id')->on('printers')->onDelete('cascade');
            $table->primary(['filament_id', 'printer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *`
     * @return void
     */
    public function down()
    {
        Schema::drop('filament_printer');
    }
}
