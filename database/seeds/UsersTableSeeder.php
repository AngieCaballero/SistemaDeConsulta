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
            'name' => 'admin',
            'password' => bcrypt('secret'),
            'admin' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'userX1',
            'password' => bcrypt('holis'),
            'admin' => false,
        ]);
    }
}
