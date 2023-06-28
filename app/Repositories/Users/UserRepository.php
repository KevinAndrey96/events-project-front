<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\Contracts\Users\UserRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getUsers($role)
    {
        return User::where('role', $role)->get();
    }

    public function saveUser(string $name, string $email, string $role, string $password)
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->role = $role;
        $user->password = Hash::make($password);
        $user->save();
    }

    public function changeStatus(string $pk):bool
    {
        $client = new Client();
        
    }
}
