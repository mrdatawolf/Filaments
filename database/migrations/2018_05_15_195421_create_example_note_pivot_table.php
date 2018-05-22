<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExampleNotePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('example_note', function (Blueprint $table) {
            $table->integer('example_id')->unsigned()->index();
            $table->foreign('example_id')->references('id')->on('examples')->onDelete('cascade');
            $table->integer('note_id')->unsigned()->index();
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
            $table->primary(['example_id', 'note_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('example_note');
    }
}
