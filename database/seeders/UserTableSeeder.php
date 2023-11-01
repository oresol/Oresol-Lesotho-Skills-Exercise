<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Tsepo Mphongoa',
            'email' => 'tsepo@test.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /*
        $data = [
            ['name' => 'Tsepo Mphongoa', 'email'=> 'test@test.com', 'password' => '12345678'],
        ];*/

        //Model::insert($data); // Eloquent approach
       // DB::table('users')->insert($data); // Query Builder approach
    }
}
