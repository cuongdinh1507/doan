<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_description', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('abstract');
            $table->string('keyword');
            $table->string('funding');
            $table->date('yearStart');
            $table->date('yearEnd');
            $table->string('publication');
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
        Schema::dropIfExists('project_description');
    }
}
