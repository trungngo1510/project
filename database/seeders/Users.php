<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user') -> insert([
            'name' =>  str::random(10),
            'email' => str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),

        ]);
    }
}
