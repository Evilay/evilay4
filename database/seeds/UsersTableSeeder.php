<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '2',
            'f_name' => 'Глеб',
            'l_name' => 'Вишневский',
            'm_name' => 'Алексеевич',
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => '2020-01-08 00:00:00',
            'password' => 'password',
            'remember_token' => 'qwer',
            'created_at' => '2020-01-15 00:00:00',
            'updated_at' => '2020-01-09 00:00:00',
            'phone' => '89090000000',
        ]);
    }
}
