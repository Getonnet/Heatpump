<?php

use App\User;
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
        User::firstOrCreate(['id' => 1, 'email' => 'admin@admin.com'],[
            'name' => 'Super Admin',
            'password' => bcrypt('12345678'),
            'user_types' => 'Super Admin',
            'phone' => '01675870047'
        ]);
    }
}
