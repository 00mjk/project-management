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
        factory(App\Role::class)->create([
            'name' => 'Client',
            'slug' => 'client'
        ]);

        factory(App\Role::class)->create([
            'name' => 'Project manager',
            'slug' => 'project-manager'
        ]);

        factory(App\Role::class)->create([
            'name' => 'Product owner',
            'slug' => 'product-owner'
        ]);

        factory(App\Role::class)->create([
            'name' => 'Technical leader',
            'slug' => 'technical-leader'
        ]);
    }
}
