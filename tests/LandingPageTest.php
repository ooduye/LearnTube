<?php
/**
 * Created by PhpStorm.
 * User: andela
 * Date: 10/26/15
 * Time: 4:43 PM
 */

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LandingPageTest extends TestCase
{

    /**
     * Test the loading of the homepage
     */
    public function testHomePageLoadsCorrectly()
    {
        $this->call('GET','/');
        $this->assertResponseOk();
    }
    /**
     * See logo on page nav bar
     */
    public function testHomePageHasLogo()
    {
        $this->visit('/')
            ->see('LEARNTUBE');
    }
    /**
     * See login link
     */
    public function testHomePageHasLoginLink()
    {
        $this->visit('/')
            ->seeLink('Login');
    }
    /**
     * see Register link
     */
    public function testHomePageHasRegisterLink()
    {
        $this->visit('/')
            ->seeLink('Sign Up');
    }
    /**
     * see Logout link
     */
    public function testLogoutLinkNotOnHomePage()
    {
        $this->visit('/')
            ->dontSeeLink('Logout');
    }
}