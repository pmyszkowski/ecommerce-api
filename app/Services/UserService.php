<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function __construct()
    {
    }

    public function index()
    {
        return User::all();
    }

    public function create(array $attributes)
    {
        return User::create( $attributes );;
    }

    public function view(User $user)
    {
        return $user;
    }

    public function update(array $all, User $user)
    {
        $user->update( $all );
        return $user;
    }

    public function firstOrCreate($email)
    {
        return User::firstOrCreate([
            'email' => $email,
        ]);
    }
}
