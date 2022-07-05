<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'admin',
                'login'=>'dell',
                'password'=>bcrypt('dell123'),
                'role'=>'admin'
            ]
            ];

            foreach ($users as $key => $value){
                User::create($value);
            }
    }
}
