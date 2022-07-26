<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CarModel;
use App\Models\BranchRegion;
use App\Models\ConfigTime;
use App\Models\Menus;
use App\Models\RoleList;
use App\Models\UserPermission;

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
                'login'=>'dell1',
                'password'=>bcrypt('dell123'),
                'role_id'=>1
            ],
            [
                'email'=>'xxx@gmail.com',
                'is_admin'=>0,
                'phone'=>'+998901234567',
                'address'=>'Yunusobod',
                'car_model_id'=>1,
                'active'=>1,
                'branch_id'=>1,
                'name'=>'driver',
                'login'=>'driver2',
                'password'=>bcrypt('driver'),
                'role_id'=>2
            ],
            [
                'email'=>'zzz@gmail.com',
                'is_admin'=>0,
                'phone'=>'+998901234567',
                'address'=>'Yunusobod',
                'car_model_id'=>1,
                'active'=>1,
                'branch_id'=>1,
                'name'=>'driver',
                'login'=>'driver3',
                'password'=>bcrypt('driver'),
                'role_id'=>3
            ],
            [
                'email'=>'driver@gmail.com',
                'is_admin'=>1,
                'phone'=>'+998901234567',
                'address'=>'Yunusobod',
                'active'=>1,
                'branch_id'=>1,
                'name'=>'admin',
                'login'=>'dell121',
                'password'=>bcrypt('dell123'),
                'role_id'=>4
            ],
            [
                'email'=>'driver5@gmail.com',
                'is_admin'=>0,
                'phone'=>'+998901234567',
                'address'=>'Yunusobod',
                'car_model_id'=>1,
                'active'=>1,
                'branch_id'=>1,
                'name'=>'driver',
                'login'=>'1245',
                'password'=>bcrypt('driver'),
                'role_id'=>5
            ]   
            ];
        $car_models = [
         [
            'number'=>'01268YGA',
            'model'=>'LABO',
            'active'=>1,
            'is_del'=>0,
            'used'=>12
         ],
         [
            'number'=>'01268YGA',
            'model'=>'LABO',
            'active'=>1,
            'is_del'=>0,
            'used'=>12
         ],
         [
            'number'=>'01268YGA',
            'model'=>'LABO',
            'active'=>0,
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

            $role_lists = [
                [
                    'name'=>'Administrators',
                ],
                [
                    'name'=>'Office',
                ],
                [
                    'name'=>'Service Center',
                ],
                [
                    'name'=>'Водители и доставщики',
                ],
                [
                    'name'=>'филиал',
                ]
                ];

            $menus = [
                [
                    'name'=>'Заявки'
                ],
                [
                    'name'=>'Водители'
                ],
                [
                    'name'=>'Сотрудники'
                ],
                [
                    'name'=>'Машины'
                ],
                [
                    'name'=>'Меню пользователя'
                ],
                [
                    'name'=>'Список заявок'
                ],
                [
                    'name'=>'Поля заявки'
                ],
                [
                    'name'=>'Срок доставки'
                ],
                [
                    'name'=>'Заявки'
                ],
                [
                    'name'=>'Отклоненные заказы'
                ],
                [
                    'name'=>'Перемещения'
                ],
                [
                    'name'=>'Колл-центр'
                ],
                [
                    'name'=>'CRM'
                ],
                [
                    'name'=>'Филиалы'
                ],
                [
                    'name'=>'Список сервис'
                ],
                [
                    'name'=>'Список ползаватели'
                ],
                [
                    'name'=>'Сервисный центр'
                ]
                ]; 
                
                $user_permissions = [
                    [
                        'role_id'=>1,
                        'menu_id'=>1,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>2,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>3,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>4,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>5,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>6,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>7,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>8,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>9,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>10,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>11,
                        'value'=>1,
                    ]
                    ,
                    [
                        'role_id'=>1,
                        'menu_id'=>12,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>13,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>14,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>15,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>16,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>1,
                        'menu_id'=>17,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>1,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>2,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>3,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>4,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>5,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>6,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>7,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>8,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>9,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>10,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>11,
                        'value'=>1,
                    ]
                    ,
                    [
                        'role_id'=>2,
                        'menu_id'=>12,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>13,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>14,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>15,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>16,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>2,
                        'menu_id'=>17,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>1,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>2,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>3,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>4,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>5,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>6,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>7,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>8,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>9,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>10,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>11,
                        'value'=>1,
                    ]
                    ,
                    [
                        'role_id'=>3,
                        'menu_id'=>12,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>13,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>14,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>15,
                        'value'=>1,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>16,
                        'value'=>0,
                    ],
                    [
                        'role_id'=>3,
                        'menu_id'=>17,
                        'value'=>0,
                    ]
                    ];

            foreach($menus as $key => $value){
                Menus::create($value);
            }        
            foreach($role_lists as $key => $value){
                RoleList::create($value);
            }
            foreach($user_permissions as $key => $value){
                UserPermission::create($value);
            }
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
