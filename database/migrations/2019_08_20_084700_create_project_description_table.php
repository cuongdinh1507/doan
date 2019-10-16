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
            $table->text('abstract')->nullable();
            $table->string('keyword', 100)->nullable();
            $table->string('funding', 100)->nullable();
            $table->string('yearStart',4)->nullable();
            $table->string('yearEnd',4)->nullable();
            $table->string('publication',100)->nullable();
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
