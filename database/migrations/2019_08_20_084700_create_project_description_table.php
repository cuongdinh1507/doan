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
            $table->string('keyword')->nullable();
            $table->string('funding')->nullable();
            $table->string('startDate',10)->nullable();
            $table->string('endDate',10)->nullable();
            $table->string('publication')->nullable();
            $table->float('lat', 8, 2)->nullable();
            $table->float('lng', 8, 2)->nullable();
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
