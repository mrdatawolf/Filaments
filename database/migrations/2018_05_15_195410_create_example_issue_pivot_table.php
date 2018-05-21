<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExampleIssuePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('example_issue', function (Blueprint $table) {
            $table->integer('example_id')->unsigned()->index();
            $table->foreign('example_id')->references('id')->on('examples')->onDelete('cascade');
            $table->integer('issue_id')->unsigned()->index();
            $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
            $table->primary(['example_id', 'issue_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('example_issue');
    }
}
