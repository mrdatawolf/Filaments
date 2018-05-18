<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandFilamentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_filament', function (Blueprint $table) {
            $table->integer('brands_id')->unsigned()->index();
            $table->foreign('brands_id')->references('id')->on('brands')->onDelete('cascade');
            $table->integer('filaments_id')->unsigned()->index();
            $table->foreign('filaments_id')->references('id')->on('filaments')->onDelete('cascade');
            $table->primary(['brands_id', 'filaments_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('brand_filament');
    }
}
