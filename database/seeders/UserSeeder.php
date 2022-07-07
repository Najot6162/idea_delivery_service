<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CarModel;
use App\Models\BranchRegion;
use App\Models\ConfigTime;
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
                'email'=>'admin@gmail.com',
                'is_admin'=>1,
                'phone'=>'+998901234567',
                'address'=>'Yunusobod',
                'active'=>1,
                'branch_id'=>1,
                'name'=>'admin',
                'login'=>'dell',
                'password'=>bcrypt('dell123'),
                'role'=>'admin'
            ],
            [
                'email'=>'driver@gmail.com',
                'is_admin'=>0,
                'phone'=>'+998901234567',
                'address'=>'Yunusobod',
                'car_model'=>'LABO 01097FHA',
                'active'=>1,
                'branch_id'=>1,
                'name'=>'driver',
                'login'=>'driver',
                'password'=>bcrypt('driver'),
                'role'=>'driver'
            ]
            ];
        $car_models = [
         [
            'number'=>'01268YGA',
            'model'=>'LABO',
            'active'=>1,
            'is_del'=>0,
            'used'=>12
        ]
        ]; 

        $regions = [
            [
                'name'=>'Не указанные филиалы',
            ],
            [
                'name'=>'Ташкентская область',
            ],
            [
                'name'=>'Город Ташкент',
            ],
            [
                'name'=>'Кашкадарьинская область',
            ],
            [
                'name'=>'Навоийская область',
            ],
            [
                'name'=>'Андижанская область',
            ],
            [
                'name'=>'Ферганская область',
            ]
            ];

            $config_time = [
                [
                    'user_id'=>1,
                    'time'=>48,
                    'active'=>1,
                ],
                [
                    'user_id'=>2,
                    'time'=>72,
                    'active'=>0,
                ],
                [
                    'user_id'=>1,
                    'time'=>36,
                    'active'=>0,
                ]
            ];


            foreach ($users as $key => $value){
                User::create($value);
            }

            foreach ($car_models as $key => $value){
                CarModel::create($value);
            }

            foreach ($regions as $key => $value){
                BranchRegion::create($value);
            }
            foreach ($config_time as $key => $value){
                ConfigTime::create($value);
            }
    }
}
