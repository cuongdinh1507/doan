<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table("discover")->insert([
        	"id_resource" => $id_resource,
        	"abstract" => $abstract,
        	"author" => $author,
        	"availability" => $availability,
        	"contributor" => $contributor,
        	"coverage_type" => $coverage_type,
        	"created" => $created,
        	"east" => $east,
        	"eastlimit" => $eastlimit,
        	"end_date" => $end_date,
        	"modified" => $modified,
        	"northlimit" => $northlimit,
        	"resource_type" => $resource_type,
        	"southlimit" => $southlimit,
        	"start_date" => $start_date,
        	"subject" => $subject,
        ]);
    }
}
