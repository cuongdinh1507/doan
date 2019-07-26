<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Discover extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discover', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_resource');
            $table->string('abstract');
            $table->string('author');
            $table->string('availability');
            $table->string('contributor')->nullable();
            $table->string('coverage_type')->nullable();
            $table->datetime('created');
            $table->string('east')->nullable();
            $table->string('eastlimit')->nullable();
            $table->datetime('end_date');
            $table->datetime('modified');
            $table->string('northlimit')->nullable();
            $table->string('resource_type');
            $table->string('southlimit')->nullable();
            $table->datetime('start_date');
            $table->string('subject');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("discover");
    }
}
