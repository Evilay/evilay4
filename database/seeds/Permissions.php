<?php

use Illuminate\Database\Seeder;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'id' => '1',
            'name' => 'ucreate',
            'display_name' => 'UCreate',
            'description' => 'Позволяет создавать пользователей',
        ]);
        DB::table('permissions')->insert([
            'id' => '2',
            'name' => 'rcreate',
            'display_name' => 'RCreate',
            'description' => 'Позволяет создавать роли',
        ]);
        DB::table('permissions')->insert([
            'id' => '3',
            'name' => 'pcreate',
            'display_name' => 'PCreate',
            'description' => 'Позволяет создавать разрешения',
        ]);
        DB::table('permissions')->insert([
            'id' => '4',
            'name' => 'uremove',
            'display_name' => 'URemove',
            'description' => 'Позволяет удалить пользователей',
        ]);
        DB::table('permissions')->insert([
            'id' => '5',
            'name' => 'rremove',
            'display_name' => 'RRemove',
            'description' => 'Позволяет удалить роли',
        ]);
        DB::table('permissions')->insert([
            'id' => '6',
            'name' => 'premove',
            'display_name' => 'PRemove',
            'description' => 'Позволяет удалить разрешения',
        ]);

        DB::table('permissions')->insert([
            'id' => '7',
            'name' => 'uview',
            'display_name' => 'UView',
            'description' => 'Позволяет смотреть пользователей',
        ]);
        DB::table('permissions')->insert([
            'id' => '8',
            'name' => 'rview',
            'display_name' => 'RView',
            'description' => 'Позволяет смотреть роли',
        ]);
        DB::table('permissions')->insert([
            'id' => '9',
            'name' => 'pview',
            'display_name' => 'PView',
            'description' => 'Позволяет смотреть разрешения',
        ]);
        DB::table('permissions')->insert([
            'id' => '10',
            'name' => 'uchange',
            'display_name' => 'UСhange',
            'description' => 'Позволяет изменять пользователей',
        ]);
        DB::table('permissions')->insert([
            'id' => '11',
            'name' => 'rchange',
            'display_name' => 'RСhange',
            'description' => 'Позволяет изменять роли',
        ]);
        DB::table('permissions')->insert([
            'id' => '12',
            'name' => 'pchange',
            'display_name' => 'PСhange',
            'description' => 'Позволяет изменять разрешения',
        ]);
    }
}
