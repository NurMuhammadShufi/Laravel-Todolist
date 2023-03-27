<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testLoginPage()
    {
        $this->get('/login')->assertSeeText("Login");
    }

    public function testLoginPageForMember()
    {
        $this->withSession([
            "user" => "Shufi"
        ])->get('/login')->assertRedirect('/');
    }

    public function testLoginSucces()
    {
        $this->post('/login', [
            "user" => "Shufi",
            "password" => "12345"
        ])->assertRedirect("/")->assertSessionHas("user", "Shufi");
    }

    public function testLoginForUserAlreadyLogin()
    {
        $this->withSession([
            "user" => "Shufi",
        ])->post('/login', [
                "user" => "Shufi",
                "password" => "12345"
            ])->assertRedirect("/");
    }

    public function testLoginValidationError()
    {
        $this->post('/login', [])->assertSeeText("User & Password is Required");
    }

    public function testLoginFailed()
    {
        $this->post('/login', [
            "user" => "False",
            "password" => "False"
        ])->assertSeeText("User Or Password is Wrong");
    }

    public function testLogout()
    {
        $this->withSession(["user" => "Shufi",
        ])->post('logout')->assertRedirect("/")->assertSessionMissing("user");
    }
}
