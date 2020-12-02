<?php

use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Bouncer::role()->firstOrCreate([
            'id' => 1,
            'name' => 'superadmin',
            'title' => 'Super Admin'
        ]);

        Bouncer::allow($admin)->everything();
    }
}
