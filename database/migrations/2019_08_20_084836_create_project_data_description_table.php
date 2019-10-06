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
            $table->smallInteger('id')->unsigned()->autoIncrement();
            $table->string('name',50);
            $table->string('typeOfData',10);
            $table->text('description');
            $table->string('typeOfAnalysis',30);
            $table->string('when',100);
            $table->string('where',120);
            $table->string('link',80);
            $table->string('typeOfFile',10);
            $table->smallInteger('title_id')->unsigned();
            $table->smallInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('title_id')->references('id')->on('project_info')->onDelete('cascade');
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
