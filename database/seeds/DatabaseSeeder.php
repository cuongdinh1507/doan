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
        DB::table("users")->insert([
            'name'=> "Cuong Dinh",
            'institution'=> "Khong co",
            'address'=> "Ha noi",
            'country'=> "Viet Nam",
            'position'=> "Student",
            'email'=> "cuongdz1507@gmail.com",
            'phone'=> "0123456789",
            'password'=> bcrypt("123123123"),
            'isAdmin'=> 1,
        ]);
    }
}
