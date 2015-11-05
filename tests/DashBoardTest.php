<?php
/**
 * Created by PhpStorm.
 * User: andela
 * Date: 10/26/15
 * Time: 4:38 PM
 */

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DashBoardTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testDashboardLoads()
    {
        $user = factory(\LearnTube\User::class)->create();
        $this->actingAs($user);
        $this->call('GET', '/videos');
        $this->assertResponseOk();
    }
    public function testUserDetailsLoadOnDashboard()
    {
        $user = factory(\LearnTube\User::class)->create();
        $this->actingAs($user);
        $this->call('GET', '/videos');
        $this->seePageIs('/videos');
        $this->assertViewHas('user');
    }
}
