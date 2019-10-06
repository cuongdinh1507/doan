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
            $table->smallInteger('id')->unsigned()->autoIncrement();
            $table->smallInteger('title_id')->unsigned();
            $table->text('abstract');
            $table->string('keyword', 100);
            $table->string('funding', 100);
            $table->string('yearStart',4);
            $table->string('yearEnd',4);
            $table->string('publication',100);
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
        Schema::dropIfExists('project_description');
    }
}
