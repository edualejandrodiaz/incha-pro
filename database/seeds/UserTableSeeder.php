<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $token = Str::random(60);
        
        DB::table('users')->insert([
            'customer_group_id' => 1,
            'rut'=>'159548457',
            'firstname'=>'Eduardo',
            'lastname'=>'Díaz',
            'email'=>'edu.alejandrodiaz@gmail.com',
            'telephone'=>'968954365',
            'password'=>Hash::make('lealtad360'),
            'token'=>Hash::make($token),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'status'=>1,
            'ip'=>'123.098.0'
            
        ]);

        DB::table('oc_customer')->insert([
            'customer_group_id' => 1,
            'rut'=>'159548457',
            'firstname'=>'Eduardo',
            'lastname'=>'Díaz',
            'email'=>'edu.alejandrodiaz@gmail.com',
            'telephone'=>'968954365',
            'password'=>Hash::make('lealtad360'),
            'token'=>Hash::make($token),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'status'=>1,
            'ip'=>'123.098.0'
            
        ]);

        DB::table('oc_customer')->insert([
            'customer_group_id' => 1,
            'rut'=>'87430103',
            'firstname'=>'José',
            'lastname'=>'Díaz',
            'email'=>'josediazedu@gmail.com',
            'telephone'=>'968954365',
            'password'=>Hash::make('creacion7'),
            'token'=>Hash::make($token),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'status'=>1,
            'ip'=>'190.098.0'
            
        ]);


       
    }
}
