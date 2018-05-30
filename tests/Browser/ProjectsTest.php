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
                    ->type('urls', 'https://foobar.test')
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
                    ->assertSeeIn('#technical_leader', 'Robert')
                    ->assertSeeIn('#urls', 'https://foobar.test')
                    ->assertSeeIn('#source_code', 'https://github.com/foo/bar')
                    ->clickLink('Edit project')
                    ->assertPathBeginsWith('/projects')
                    ->type('name', 'My first project update')
                    ->type('description', 'This is my first project updated.')
                    ->type('client_name', 'Some Corp.')
                    ->type('project_manager', 'Mike')
                    ->type('product_owner', 'Jonathan')
                    ->type('technical_leader', 'David')
                    ->type('urls', 'https://somecorp.test')
                    ->type('source_code', 'https://github.com/some/corp')
                    ->click('#update')
                    ->assertSee('Project successfully updated!')
                    ->clickLink('My first project update')
                    ->assertSeeIn('#name', 'My first project update')
                    ->assertSeeIn('#description', 'This is my first project updated.')
                    ->assertSeeIn('#client_name', 'Some Corp.')
                    ->assertSeeIn('#project_manager', 'Mike')
                    ->assertSeeIn('#product_owner', 'Jonathan')
                    ->assertSeeIn('#technical_leader', 'David')
                    ->assertSeeIn('#urls', 'https://somecorp.test')
                    ->assertSeeIn('#source_code', 'https://github.com/some/corp')
                    ->click('#delete')
                    ->assertSee('Project successfully deleted!');
        });
    }
}
