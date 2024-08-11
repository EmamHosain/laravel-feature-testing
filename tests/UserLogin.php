<?php
namespace Tests;

use App\Models\User;

trait UserLogin
{

    // custom login authentications system
    public $user;
    public function userAuthSet()
    {
        // create a user
        $this->user = User::factory()->create();

        // auth user
        $resposne = $this->from(route('login'))->post(route('login.auth'), [
            'email' => $this->user->email,
            'password' => 'password',
        ]);

        // user should be authenticated
        $this->assertAuthenticated();
        return $resposne;

    }
}