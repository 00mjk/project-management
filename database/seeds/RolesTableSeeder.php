<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class)->create(['name' => 'Client']);

        factory(App\Role::class)->create(['name' => 'Project manager']);

        factory(App\Role::class)->create(['name' => 'Product owner']);

        factory(App\Role::class)->create(['name' => 'Technical leader']);
    }
}
