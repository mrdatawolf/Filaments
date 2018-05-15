<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamplesNotesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examples_notes', function (Blueprint $table) {
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
        Schema::drop('examples_notes');
    }
}
