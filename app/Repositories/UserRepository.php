<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository
{
    public function findAll()
    {
        return User::all();
    }

    public function findById(string $id)
    {
        return User::findOrFail($id);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function save(array $data)
    {
        return User::create($data);
    }

    public function update(string $id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }
}
