<?php
/**
 * Created by PhpStorm.
 * User: andela
 * Date: 10/26/15
 * Time: 4:54 PM
 */

use LearnTube\User as User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginPageTest extends TestCase
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

    public function testLoginPageLoadsCorrectly()
    {
        $this->call('GET', '/login');
        $this->assertResponseOk();
    }

    public function testLoginPageHasLogo()
    {
        $this->visit('/login')
            ->see('LEARNTUBE');
    }

    public function testLoginPageHasNoLogoutLink()
    {
        $this->visit('/login')
            ->dontSeeLink('/logout');
    }

    public function testPageHasFaceBookLogin()
    {
        $this->visit('/login')
            ->see('Facebook');
    }
    public function testPageHasTwitterLogin()
    {
        $this->visit('/login')
            ->see('Twitter');
    }
    public function testPageHasGithubLogin()
    {
        $this->visit('/login')
            ->see('Github');
    }
    /**
     * Test if a user can log in to the system
     *
     * This test presumes that the user exists
     */
    public function testLoginFormWorksCorrectly()
    {
        //create a user
        $this->createUser();
        $this->visit('/login')
            ->type('john@doe.com','email')
            ->type('password', 'password')
            ->press('action')
            ->seePageIs('/');
    }
    public function createUser()
    {
        User::create([
            'username' => 'learneryemisi',
            'email' => 'yemisi@yemisi.com',
            'password'=> bcrypt('password')
        ]);
    }
}