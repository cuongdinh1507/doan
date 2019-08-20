<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDataDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_data_description', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('typeOfData');
            $table->string('description');
            $table->string('typeOfAnalysis');
            $table->string('when');
            $table->string('where');
            $table->string('link');
            $table->string('typeOfFile');
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
        Schema::dropIfExists('project_data_description');
    }
}
