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
                'email' => 'admin@gmail.com',
                'is_admin' => 1,
                'phone' => '998901234561',
                'address' => 'Yunusobod',
                'active' => 1,
                'branch_id' => 1,
                'name' => 'admin',
                'password' => bcrypt('123456'),
                'role_id' => 1
            ],
            [
                'email' => 'xxx@gmail.com',
                'is_admin' => 0,
                'phone' => '998901234562',
                'address' => 'Yunusobod',
                'car_model_id' => 1,
                'active' => 1,
                'branch_id' => 1,
                'name' => 'driver',
                'password' => bcrypt('123456'),
                'role_id' => 4
            ],
            [
                'email' => 'zzz@gmail.com',
                'is_admin' => 0,
                'phone' => '998901234563',
                'address' => 'Yunusobod',
                'car_model_id' => 1,
                'active' => 1,
                'branch_id' => 1,
                'name' => 'driver',
                'password' => bcrypt('123456'),
                'role_id' => 3
            ],
            [
                'email' => 'driver@gmail.com',
                'is_admin' => 1,
                'phone' => '998901234564',
                'address' => 'Yunusobod',
                'active' => 1,
                'branch_id' => 1,
                'name' => 'admin',
                'password' => bcrypt('123456'),
                'role_id' => 4
            ],
            [
                'email' => 'driver5@gmail.com',
                'is_admin' => 0,
                'phone' => '998901234565',
                'address' => 'Yunusobod',
                'car_model_id' => 1,
                'active' => 1,
                'branch_id' => 1,
                'name' => 'driver',
                'password' => bcrypt('123456'),
                'role_id' => 5
            ]
        ];
        $car_models = [
            [
                'number' => '01268YGA',
                'model' => 'LABO',
                'active' => 1,
                'is_del' => 0,
                'used' => 12
            ],
            [
                'number' => '01268YGA',
                'model' => 'LABO',
                'active' => 1,
                'is_del' => 0,
                'used' => 12
            ],
            [
                'number' => '01268YGA',
                'model' => 'LABO',
                'active' => 0,
                'is_del' => 0,
                'used' => 12
            ]
        ];

        $regions = [
            [
                'name' => 'Не указанные филиалы',
            ],
            [
                'name' => 'Ташкентская область',
            ],
            [
                'name' => 'Город Ташкент',
            ],
            [
                'name' => 'Кашкадарьинская область',
            ],
            [
                'name' => 'Навоийская область',
            ],
            [
                'name' => 'Андижанская область',
            ],
            [
                'name' => 'Ферганская область',
            ]
        ];

        $config_time = [
            [
                'user_id' => 1,
                'time' => 48,
                'active' => 1,
            ],
            [
                'user_id' => 2,
                'time' => 72,
                'active' => 0,
            ],
            [
                'user_id' => 1,
                'time' => 36,
                'active' => 0,
            ]
        ];

        $role_lists = [
            [
                'name' => 'Administrators',
            ],
            [
                'name' => 'Office',
            ],
            [
                'name' => 'Service Center',
            ],
            [
                'name' => 'Водители и доставщики',
            ],
            [
                'name' => 'филиал',
            ]
        ];

        $menus = [
            [
                'name' => 'Перемещения',
                'type'=>0,
                'name_path'=>'relocation'
            ],
            [
                'name' => 'Заявки',
                'type'=>0,
                'name_path'=>'pick-list'
            ],
            [
                'name' => 'Колл-центр',
                'type'=>0,
                'name_path'=>'call_center'
            ],
            [
                'name' => 'Водители',
                'type'=>0,
                'name_path'=>'pickup-driver'

            ],
            [
                'name' => 'Машины',
                'type'=>0,
                'name_path'=>'pickup-car'
            ],
            [
                'name' => 'Меню пользователя',
                'type'=>0,
                'name_path'=>'setting-menu_group'
            ],
            [
                'name' => 'Поля заявки',
                'type'=>0,
                'name_path'=>'setting-menu_app_field'
            ],
            [
                'name' => 'Срок доставки',
                'type'=>0,
                'name_path'=>'setting-config_time_list'
            ],
            [
                'name' => 'Филиалы',
                'type'=>0,
                'name_path'=>'branch'
            ],
            [
                'name' => 'Список сервис',
                'type'=>0,
                'name_path'=>'service-list'
            ],

            [
                'name' => 'Список ползаватели',
                'type'=>0,
                'name_path'=>'service-user_add'
            ],

            [
                'name' => 'Сервисный центр',
                'type'=>0,
                'name_path'=>'service'
            ],

            //menus for mobile
            [
                'name'=>'Склад',
                'type'=> 1,
                'step'=>0
            ],
            [
                'name'=>'Доставка',
                'type'=> 1,
                'step'=>0
            ],
            [
                'name'=>'Доставлено',
                'type'=> 1,
                'step'=>0
            ],
            [
                'name'=>'Склад',
                'type'=> 1,
                'step'=>1
            ],
            [
                'name'=>'Доставка',
                'type'=> 1,
                'step'=>1
            ],
            [
                'name'=>'Доставлено',
                'type'=> 1,
                'step'=>1
            ],
            [
                'name'=>'Входящие заявки от другого',
                'type'=> 1
            ],
            [
                'name'=>'Входящие заявки',
                'type'=> 1
            ],
            [
                'name'=>'Принято',
                'type'=> 1
            ],
            [
                'name'=>'Оставлен в сервис центре',
                'type'=> 1
            ],
            [
                'name'=>'Забрали из сервис центра',
                'type'=> 1
            ],
            [
                'name'=>'Отправлен в магазин',
                'type'=> 1
            ],
            [
                'name'=>'Заполненные заявки',
                'type'=> 1
            ],
        ];
        $user_permissions = [
            [
                'role_id' => 1,
                'menu_id' => 1,
                'value' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 2,
                'value' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 3,
                'value' => 0,
            ],
            [
                'role_id' => 1,
                'menu_id' => 4,
                'value' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 5,
                'value' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 6,
                'value' => 0,
            ],
            [
                'role_id' => 1,
                'menu_id' => 7,
                'value' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 8,
                'value' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 9,
                'value' => 0,
            ],
            [
                'role_id' => 1,
                'menu_id' => 10,
                'value' => 0,
            ],
            [
                'role_id' => 1,
                'menu_id' => 11,
                'value' => 1,
            ]
            ,
            [
                'role_id' => 1,
                'menu_id' => 12,
                'value' => 1,
            ],
            [
                'role_id' => 2,
                'menu_id' => 1,
                'value' => 0,
            ],
            [
                'role_id' => 2,
                'menu_id' => 2,
                'value' => 1,
            ],
            [
                'role_id' => 2,
                'menu_id' => 3,
                'value' => 1,
            ],
            [
                'role_id' => 2,
                'menu_id' => 4,
                'value' => 0,
            ],
            [
                'role_id' => 2,
                'menu_id' => 5,
                'value' => 0,
            ],
            [
                'role_id' => 2,
                'menu_id' => 6,
                'value' => 1,
            ],
            [
                'role_id' => 2,
                'menu_id' => 7,
                'value' => 1,
            ],
            [
                'role_id' => 2,
                'menu_id' => 8,
                'value' => 0,
            ],
            [
                'role_id' => 2,
                'menu_id' => 9,
                'value' => 1,
            ],
            [
                'role_id' => 2,
                'menu_id' => 10,
                'value' => 1,
            ],
            [
                'role_id' => 2,
                'menu_id' => 11,
                'value' => 0,
            ],
            [
                'role_id' => 2,
                'menu_id' => 12,
                'value' => 1,
            ],
            [
                'role_id' => 4,
                'menu_id' => 13,
                'value' => 1,
            ],
            [
                'role_id' => 4,
                'menu_id' => 14,
                'value' => 0,
            ],
            [
                'role_id' => 4,
                'menu_id' => 15,
                'value' => 0,
            ],
            [
                'role_id' => 4,
                'menu_id' => 16,
                'value' => 1,
            ]
            ,
            [
                'role_id' => 4,
                'menu_id' => 17,
                'value' => 1,
            ],
            [
                'role_id' => 4,
                'menu_id' => 18,
                'value' => 0,
            ]
            ,
            [
                'role_id' => 4,
                'menu_id' => 19,
                'value' => 1,
            ],
            [
                'role_id' => 4,
                'menu_id' => 20,
                'value' => 0,
            ]
            ,
            [
                'role_id' => 4,
                'menu_id' => 21,
                'value' => 1,
            ],
            [
                'role_id' => 4,
                'menu_id' => 22,
                'value' => 0,
            ]
            ,
            [
                'role_id' => 4,
                'menu_id' => 23,
                'value' => 1,
            ],
            [
                'role_id' => 4,
                'menu_id' => 24,
                'value' => 0,
            ],
            [
                'role_id' => 4,
                'menu_id' => 25,
                'value' => 0,
            ]
        ];


        foreach ($menus as $key => $value) {
            Menus::create($value);
        }
        foreach ($role_lists as $key => $value) {
            RoleList::create($value);
        }
        foreach ($user_permissions as $key => $value) {
            UserPermission::create($value);
        }
        foreach ($users as $key => $value) {
            User::create($value);
        }

        foreach ($car_models as $key => $value) {
            CarModel::create($value);
        }

        foreach ($regions as $key => $value) {
            BranchRegion::create($value);
        }
        foreach ($config_time as $key => $value) {
            ConfigTime::create($value);
        }
    }
}
