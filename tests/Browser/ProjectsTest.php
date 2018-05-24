<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProjectsTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function create_and_view_project()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/projects/create')
                    ->type('name', 'My first project')
                    ->type('description', 'This is my first project.')
                    ->type('client_name', 'Foobar Inc.')
                    ->type('project_manager', 'Nancy')
                    ->type('product_owner', 'John')
                    ->type('technical_leader', 'Robert')
                    ->type('urls', 'https://someproject.test')
                    ->type('source_code', 'https://github.com/foo/bar')
                    ->click('#create')
                    ->assertPathIs('/projects')
                    ->assertSee('Project successfully created!')
                    ->clickLink('My first project')
                    ->assertPathBeginsWith('/projects')
                    ->assertSeeIn('#name', 'My first project')
                    ->assertSeeIn('#description', 'This is my first project.')
                    ->assertSeeIn('#client_name', 'Foobar Inc.')
                    ->assertSeeIn('#project_manager', 'Nancy')
                    ->assertSeeIn('#product_owner', 'John')
                    ->assertSeeIn('#urls', 'https://someproject.test')
                    ->assertSeeIn('#source_code', 'https://github.com/foo/bar')
                    ->clickLink('Edit project')
                    ->assertPathBeginsWith('/projects');
        });
    }
}
