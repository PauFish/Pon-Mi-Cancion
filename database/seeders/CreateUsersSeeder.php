<?php

namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
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
               'name'=>'Admin ',
               'email'=>'admin@ponmicancion.com',
               'password'=> bcrypt('12345678'),
               'phone'=>'675849554',
               'role_id'=>'3',
            ],
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'password'=> bcrypt('12345678'),
                'phone'=>'652849584',
                'role_id'=>'2',
             ],
            [
               'name'=>'Manager User DJ',
               'email'=>'manager@gmail.com',
               'password'=> bcrypt('12345678'),
               'phone'=>'675359584',
               'role_id'=>'1',
            ],
          
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
